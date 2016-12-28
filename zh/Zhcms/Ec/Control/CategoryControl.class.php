<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class CategoryControl extends PublicControl {
	//网站首页
	public function index() {
        $db_prefix=C('DB_PREFIX');
        
        $page = isset($_REQUEST['page'])   && intval($_REQUEST['page'])  > 0 ? intval($_REQUEST['page'])  : 1;
        //p(C('ec_page_size'));
        $size=C('ec_page_size');
        $size = isset($size)  && intval($size) > 0 ? intval($size) : 10;
        
        $price_max = isset($_REQUEST['price_max']) && intval($_REQUEST['price_max']) > 0 ? intval($_REQUEST['price_max']) : 0;
        $price_min = isset($_REQUEST['price_min']) && intval($_REQUEST['price_min']) > 0 ? intval($_REQUEST['price_min']) : 0;
        $filter_attr_str = isset($_REQUEST['filter_attr']) ? htmlspecialchars(trim($_REQUEST['filter_attr'])) : '0';
        $filter_attr_str = trim(urldecode($filter_attr_str));
        $filter_attr_str = preg_match('/^[\d\.]+$/',$filter_attr_str) ? $filter_attr_str : '';
        $filter_attr = empty($filter_attr_str) ? '' : explode('.', $filter_attr_str);
        
        $default_display_type=C('ec_show_order_type') == '0' ? 'list' : (C('ec_show_order_type') == '1' ? 'grid' : 'text');
        $default_sort_order_method = C('ec_sort_order_method') == '0' ? 'DESC' : 'ASC';
        $default_sort_order_type   = C('ec_sort_order_type')  == '0' ? 'goods_id' : (C('ec_sort_order_type') == '1' ? 'shop_price' : 'last_update');
   
        
        if((isset($_REQUEST['sort'])  && in_array(trim(strtolower($_REQUEST['sort'])), array('goods_id', 'shop_price', 'last_update'))))
        {
            $sort  =   trim($_REQUEST['sort']) ;
        }      
        else{
            $sort=$default_sort_order_type;
        }
        
        if((isset($_REQUEST['order']) && in_array(trim(strtoupper($_REQUEST['order'])), array('ASC', 'DESC')))){
            $order =   trim($_REQUEST['order']);
        }else{
            $order=$default_sort_order_method;
        }
        
        if((isset($_REQUEST['display']) && in_array(trim(strtolower($_REQUEST['display'])), array('list', 'grid', 'text'))))
        {
            $display=trim($_REQUEST['display']);
        }else{
            if((isset($_COOKIE['ECS']['display']) ))
            {
                $display  = $_COOKIE['ECS']['display'];
            }
            else{
                $display=$default_display_type;
            }
        }
        
        
        $this->assign('sort',       $sort);
        $this->assign('order',       $order);
        $this->assign('page',       $page);
        $this->assign('display',       $display);
        $this->assign('navigator_list',        get_navigator());
        $goodsCategoryModel=K("GoodsCategory");
        $this->assign('category_list', $goodsCategoryModel->cat_list(0, 0, true,  2, false));
        
        /* 获得请求的分类 ID */
        if (isset($_REQUEST['id']))
        {
            $cat_id = intval($_REQUEST['id']);
        }
        $brand = isset($_REQUEST['brand']) && intval($_REQUEST['brand']) > 0 ? intval($_REQUEST['brand']) : 0;
        /* 赋值固定内容 */
        if ($brand > 0)
        {
            $sql = "SELECT brand_name FROM " .$db_prefix.'brand'. " WHERE brand_id = '$brand'";
            $brand_name = M()->getOne($sql,'brand_name');
        }
        else
        {
            $brand_name = '';
        }   
        $this->assign('categories',     $goodsCategoryModel->get_categories_tree()); // 分类树
       
        $goodsCategoryModel=K('GoodsCategory');
        $cat = $goodsCategoryModel->get_cat_info($cat_id);   // 获得分类的相关信息
        //p($cat);die;
        $children = get_children($cat_id);
        
        /* 品牌筛选 */
        $sql = "SELECT 
                    b.brand_id, b.brand_name, COUNT(*) AS goods_num ".
                "FROM " . $db_prefix.'brand' . " AS b, ".
                          $db_prefix.'goods' . " AS g LEFT JOIN ". 
                          $db_prefix.'goods_cat' . " AS gc ON g.goods_id = gc.goods_id " .
                "WHERE 
                    g.brand_id = b.brand_id AND 
                    ($children OR " . 'gc.cat_id ' . db_create_in(array_unique(array_merge(array($cat_id), array_keys($goodsCategoryModel->cat_list($cat_id, 0, false))))) . ") AND 
                    b.is_show = 1 " .
                    " AND g.is_on_sale = 1 AND 
                    g.is_alone_sale = 1 AND 
                    g.is_delete = 0 ".
            "GROUP BY b.brand_id HAVING goods_num > 0 ORDER BY b.sort_order, b.brand_id ASC";
        $brands = M()->query($sql);
        if(!empty($brands)){
            foreach ($brands AS $key => $val)
            {
                $temp_key = $key + 1;
                $brands[$temp_key]['brand_name'] = $val['brand_name'];
                $brands[$temp_key]['url'] = ec_build_uri('category', array('cid' => $cat_id, 'bid' => $val['brand_id'], 'price_min'=>$price_min, 'price_max'=> $price_max, 'filter_attr'=>$filter_attr_str), $cat['cat_name']);
                /* 判断品牌是否被选中 */
                if ($brand == $brands[$key]['brand_id'])
                {
                    $brands[$temp_key]['selected'] = 1;
                }else{
                    $brands[$temp_key]['selected'] = 0;
                }
            }
        }
        $brands[0]['brand_name'] = '全部';
        $brands[0]['url'] = ec_build_uri('category', array('cid' => $cat_id, 'bid' => 0, 'price_min'=>$price_min, 'price_max'=> $price_max, 'filter_attr'=>$filter_attr_str), $cat['cat_name']);
        $brands[0]['selected'] = empty($brand) ? 1 : 0;
        $this->assign('brands', $brands);
        
        
        /* 获取价格分级 */
        if ($cat['grade'] == 0  && $cat['parent_id'] != 0)
        {
            $cat['grade'] = $goodsCategoryModel->get_parent_grade($cat_id); //如果当前分类级别为空，取最近的上级分类
        }
        if ($cat['grade'] > 1)
        {
            /* 需要价格分级 */
            /*
            算法思路：
                    1、当分级大于1时，进行价格分级
                    2、取出该类下商品价格的最大值、最小值
                    3、根据商品价格的最大值来计算商品价格的分级数量级：
                            价格范围(不含最大值)    分级数量级
                            0-0.1                   0.001
                            0.1-1                   0.01
                            1-10                    0.1
                            10-100                  1
                            100-1000                10
                            1000-10000              100
                    4、计算价格跨度：
                            取整((最大值-最小值) / (价格分级数) / 数量级) * 数量级
                    5、根据价格跨度计算价格范围区间
                    6、查询数据库
    
                可能存在问题：
                    1、
                    由于价格跨度是由最大值、最小值计算出来的
                    然后再通过价格跨度来确定显示时的价格范围区间
                    所以可能会存在价格分级数量不正确的问题
                    该问题没有证明
                    2、
                    当价格=最大值时，分级会多出来，已被证明存在
            */
            $goodsCatModel=K('GoodsCat');
            $sql = "SELECT 
                        min(g.shop_price) AS min, 
                        max(g.shop_price) as max ".
                    " FROM " . $db_prefix.'goods'. " AS g ".
                    " WHERE 
                        ($children OR " . $goodsCatModel->get_extension_goods($children) . ') AND 
                        g.is_delete = 0 AND 
                        g.is_on_sale = 1 AND g.is_alone_sale = 1  ';
                        //获得当前分类下商品价格的最大值、最小值
            $row = M()->getRowSql($sql);
            // 取得价格分级最小单位级数，比如，千元商品最小以100为级数
            $price_grade = 0.0001;
            for($i=-2; $i<= log10($row['max']); $i++)
            {
                $price_grade *= 10;
            }
            //跨度
            $dx = ceil(($row['max'] - $row['min']) / ($cat['grade']) / $price_grade) * $price_grade;
            if($dx == 0)
            {
                $dx = $price_grade;
            }
            for($i = 1; $row['min'] > $dx * $i; $i ++);
            for($j = 1; $row['min'] > $dx * ($i-1) + $price_grade * $j; $j++);
            $row['min'] = $dx * ($i-1) + $price_grade * ($j - 1);
            for(; $row['max'] >= $dx * $i; $i ++);
            $row['max'] = $dx * ($i) + $price_grade * ($j - 1);
        
            $sql = "SELECT 
                        (FLOOR((g.shop_price - $row[min]) / $dx)) AS sn, 
                        COUNT(*) AS goods_num  ".
                    " FROM " . $db_prefix.'goods' . " AS g ".
                    " WHERE 
                        ($children OR " . $goodsCatModel->get_extension_goods($children) . ') AND 
                        g.is_delete = 0 AND g.is_on_sale = 1 AND g.is_alone_sale = 1 '.
                    " GROUP BY sn ";
            $price_grade = M()->query($sql);
            if(!empty($price_grade)){
                foreach ($price_grade as $key=>$val)
                {
                    $temp_key = $key + 1;
                    $price_grade[$temp_key]['goods_num'] = $val['goods_num'];
                    $price_grade[$temp_key]['start'] = $row['min'] + round($dx * $val['sn']);
                    $price_grade[$temp_key]['end'] = $row['min'] + round($dx * ($val['sn'] + 1));
                    $price_grade[$temp_key]['price_range'] = $price_grade[$temp_key]['start'] . '&nbsp;-&nbsp;' . $price_grade[$temp_key]['end'];
                    $price_grade[$temp_key]['formated_start'] = price_format($price_grade[$temp_key]['start']);
                    $price_grade[$temp_key]['formated_end'] = price_format($price_grade[$temp_key]['end']);
                    $price_grade[$temp_key]['url'] = ec_build_uri('category', array('cid'=>$cat_id, 'bid'=>$brand, 'price_min'=>$price_grade[$temp_key]['start'], 'price_max'=> $price_grade[$temp_key]['end'], 'filter_attr'=>$filter_attr_str), $cat['cat_name']);
        
                    /* 判断价格区间是否被选中 */
                    if (isset($_REQUEST['price_min']) && $price_grade[$temp_key]['start'] == $price_min && $price_grade[$temp_key]['end'] == $price_max)
                    {
                        $price_grade[$temp_key]['selected'] = 1;
                    }
                    else
                    {
                        $price_grade[$temp_key]['selected'] = 0;
                    }
                }
                
            }
            $price_grade[0]['start'] = 0;
            $price_grade[0]['end'] = 0;
            $price_grade[0]['price_range'] = '全部';
            $price_grade[0]['url'] = ec_build_uri('category', array('cid'=>$cat_id, 'bid'=>$brand, 'price_min'=>0, 'price_max'=> 0, 'filter_attr'=>$filter_attr_str), $cat['cat_name']);
            $price_grade[0]['selected'] = empty($price_max) ? 1 : 0;
    
            $this->assign('price_grade',     $price_grade);
        }
        
        /* 属性筛选 */
        $ext = ''; //商品查询条件扩展
        if ($cat['filter_attr'] > 0)
        {
            $cat_filter_attr = explode(',', $cat['filter_attr']);       //提取出此分类的筛选属性
            $all_attr_list = array();
            foreach ($cat_filter_attr AS $key => $value)
            {
                $sql = "SELECT 
                            a.attr_name 
                        FROM " . 
                            $db_prefix.'attribute' . " AS a, " . 
                            $db_prefix.'goods_attr' . " AS ga, " . 
                            $db_prefix.'goods' . " AS g 
                        WHERE 
                            ($children OR " . $goodsCatModel->get_extension_goods($children) . ") AND 
                            a.attr_id = ga.attr_id AND 
                            g.goods_id = ga.goods_id AND 
                            g.is_delete = 0 AND 
                            g.is_on_sale = 1 AND 
                            g.is_alone_sale = 1 AND 
                            a.attr_id='$value'";
                $temp_name = M()->getOne($sql,'attr_name');
                if(!empty($temp_name)){
                    $all_attr_list[$key]['filter_attr_name'] = $temp_name;
                    $sql = "SELECT 
                                a.attr_id, 
                                MIN(a.goods_attr_id ) AS goods_id, 
                                a.attr_value AS attr_value 
                            FROM " . 
                                $db_prefix.'goods_attr' . " AS a, " 
                                . $db_prefix.'goods' ." AS g" .
                            " WHERE 
                                ($children OR " . $goodsCatModel->get_extension_goods($children) . ') AND 
                                g.goods_id = a.goods_id AND 
                                g.is_delete = 0 AND 
                                g.is_on_sale = 1 AND 
                                g.is_alone_sale = 1 '.
                                " AND a.attr_id='$value' ".
                            " GROUP BY a.attr_value";
                            //p($sql);
                    $attr_list = M()->query($sql);
                    $temp_arrt_url_arr = array();
                    for ($i = 0; $i < count($cat_filter_attr); $i++)        //获取当前url中已选择属性的值，并保留在数组中
                    {
                        $temp_arrt_url_arr[$i] = !empty($filter_attr[$i]) ? $filter_attr[$i] : 0;
                    }
                    $temp_arrt_url_arr[$key] = 0;                           //“全部”的信息生成
                    $temp_arrt_url = implode('.', $temp_arrt_url_arr);
                    $all_attr_list[$key]['attr_list'][0]['attr_value'] = '全部';
                    $all_attr_list[$key]['attr_list'][0]['url'] = ec_build_uri('category', array('cid'=>$cat_id, 'bid'=>$brand, 'price_min'=>$price_min, 'price_max'=>$price_max, 'filter_attr'=>$temp_arrt_url), $cat['cat_name']);
                    $all_attr_list[$key]['attr_list'][0]['selected'] = empty($filter_attr[$key]) ? 1 : 0;
                    
                    foreach ($attr_list as $k => $v)
                    {
                        $temp_key = $k + 1;
                        $temp_arrt_url_arr[$key] = $v['goods_id'];       //为url中代表当前筛选属性的位置变量赋值,并生成以‘.’分隔的筛选属性字符串
                        $temp_arrt_url = implode('.', $temp_arrt_url_arr);
                        
                        $all_attr_list[$key]['attr_list'][$temp_key]['attr_value'] = $v['attr_value'];
                        $all_attr_list[$key]['attr_list'][$temp_key]['url'] = ec_build_uri('category', array('cid'=>$cat_id, 'bid'=>$brand, 'price_min'=>$price_min, 'price_max'=>$price_max, 'filter_attr'=>$temp_arrt_url), $cat['cat_name']);
                        if (!empty($filter_attr[$key]) AND $filter_attr[$key] == $v['goods_id'])
                        {
                            $all_attr_list[$key]['attr_list'][$temp_key]['selected'] = 1;
                        }
                        else
                        {
                            $all_attr_list[$key]['attr_list'][$temp_key]['selected'] = 0;
                        }
                    }

                }
            }

        }
        $this->assign('filter_attr_list',  $all_attr_list);
        /* 扩展商品查询条件 */
        if (!empty($filter_attr))
        {
            $ext_sql = "SELECT 
                            DISTINCT(b.goods_id) 
                        FROM " . 
                            $db_prefix.'goods_attr' . " AS a, " . 
                            $db_prefix.'goods_attr' . " AS b " .  
                        "WHERE ";
             $ext_group_goods = array();
             foreach ($filter_attr AS $k => $v)                      // 查出符合所有筛选属性条件的商品id */
             {
                if (is_numeric($v) && $v !=0 &&isset($cat_filter_attr[$k]))
                {
                    $sql = $ext_sql . "b.attr_value = a.attr_value AND b.attr_id = " . $cat_filter_attr[$k] ." AND a.goods_attr_id = " . $v;
                    $ext_group_goods=M()->getRowSql($sql);
                    //p($ext_group_goods);
                    $ext .= ' AND ' . db_create_in($ext_group_goods, 'g.goods_id');
                }
             }
        }
        //p($ext);
        $goodsModel=K('goods');
        $this->assign('best_goods',      $goodsModel->get_category_recommend_goods('best', $children, $brand, $price_min, $price_max, $ext));
        $this->assign('category',         $cat_id);
        $this->assign('script_name', 'category');
        $this->assign('brand_id',         $brand);
        $this->assign('price_max',        $price_max);
        $this->assign('price_min',        $price_min);
        $this->assign('filter_attr',      $filter_attr_str);
        
        $goodsCategoryModel=K('GoodsCategory');
        $count = $goodsCategoryModel->get_cagtegory_goods_count($children, $brand, $price_min, $price_max, $ext);
        $max_page = ($count> 0) ? ceil($count / $size) : 1;
        if ($page > $max_page)
        {
            $page = $max_page;
        }
        $goodslist = $goodsCategoryModel->category_get_goods($children, $brand, $price_min, $price_max, $ext, $size, $page, $sort, $order,$display);
        if($display == 'grid')
        {
            if(count($goodslist) % 2 != 0)
            {
                $goodslist[] = array();
            }
        }
        //p($goodslist);
        $this->assign('goods_list',       $goodslist);
        $this->assign('show_marketprice', C('ec_show_marketprice'));
        
        $this->display();
	}
    
	
}
