<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcExchangeControl extends EcControl {
    
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
        /* 分页排序 */
        $_LANG['exchange_sort']['goods_id'] = '按上架时间排序';
        $_LANG['exchange_sort']['exchange_integral'] = '按积分排序';
        $_LANG['exchange_sort']['last_update'] = '按更新时间排序';
        $_LANG['sort']['goods_id'] = '按上架时间排序';
        $_LANG['sort']['shop_price'] = '按价格排序';
        $_LANG['sort']['last_update'] = '按更新时间排序';
        $_LANG['order']['DESC'] = '倒序';
        $_LANG['order']['ASC'] = '正序';

        $this->assign('lang',     $_LANG);
        
        //echo 'aaa';die;
    }
    
    public function index(){
        header("Content-type:text/html;charset=utf-8");
        $ecs=$GLOBALS['ec_globals']['ecs'];
        
        /*------------------------------------------------------ */
        //-- act 操作项的初始化
        /*------------------------------------------------------ */
        if (empty($_REQUEST['act']))
        {
            $_REQUEST['act'] = 'list';
        }
        /*------------------------------------------------------ */
        //-- 积分兑换商品列表
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'list')
        {
            $ec_page_size=C('ec_page_size');
            /* 初始化分页信息 */
            $page         = isset($_REQUEST['page'])   && intval($_REQUEST['page'])  > 0 ? intval($_REQUEST['page'])  : 1;
            $size         = isset($ec_page_size)  && intval($ec_page_size) > 0 ? intval($ec_page_size) : 10;
            $cat_id       = isset($_REQUEST['cat_id']) && intval($_REQUEST['cat_id']) > 0 ? intval($_REQUEST['cat_id']) : 0;
            $integral_max = isset($_REQUEST['integral_max']) && intval($_REQUEST['integral_max']) > 0 ? intval($_REQUEST['integral_max']) : 0;
            $integral_min = isset($_REQUEST['integral_min']) && intval($_REQUEST['integral_min']) > 0 ? intval($_REQUEST['integral_min']) : 0;
            
            
            /* 排序、显示方式以及类型 */
            $ec_show_order_type=C('ec_show_order_type');
            $ec_sort_order_method=C('ec_sort_order_method');
            $ec_sort_order_type=C('ec_sort_order_type');
            $default_display_type      = $ec_show_order_type == '0' ? 'list' : ($ec_show_order_type == '1' ? 'grid' : 'text');
            $default_sort_order_method = $ec_sort_order_method == '0' ? 'DESC' : 'ASC';
            $default_sort_order_type   = $ec_sort_order_type == '0' ? 'goods_id' : ($ec_sort_order_type == '1' ? 'exchange_integral' : 'last_update');


            $sort    = (isset($_REQUEST['sort'])  && in_array(trim(strtolower($_REQUEST['sort'])), array('goods_id', 'exchange_integral', 'last_update'))) ? trim($_REQUEST['sort'])  : $default_sort_order_type;
            $order   = (isset($_REQUEST['order']) && in_array(trim(strtoupper($_REQUEST['order'])), array('ASC', 'DESC')))                              ? trim($_REQUEST['order']) : $default_sort_order_method;
            $display = (isset($_REQUEST['display']) && in_array(trim(strtolower($_REQUEST['display'])), array('list', 'grid', 'text'))) ? trim($_REQUEST['display'])  : (isset($_COOKIE['ECS']['display']) ? $_COOKIE['ECS']['display'] : $default_display_type);
            $display  = in_array($display, array('list', 'grid', 'text')) ? $display : 'text';
            setcookie('ECS[display]', $display, gmtime() + 86400 * 7);

            $children = get_children($cat_id);
            $cat = $this -> get_cat_info($cat_id);   // 获得分类的相关信息
            
            if (!empty($cat))
            {
                $this->assign('keywords',    htmlspecialchars($cat['keywords']));
                $this->assign('description', htmlspecialchars($cat['cat_desc']));
            }
            $this->assign_template();
            
            $position = assign_ur_here('exchange');
            $this->assign('page_title',       $position['title']);    // 页面标题
            $this->assign('ur_here',          $position['ur_here']);  // 当前位置
    
            $this->assign('categories',       get_categories_tree());        // 分类树
            $this->assign('helps',            get_shop_help());              // 网店帮助
            $this->assign('top_goods',        get_top10());                  // 销售排行
            $this->assign('promotion_info',   get_promotion_info());         // 促销活动信息
            
            /* 调查 */
            $vote = get_vote();
            if (!empty($vote))
            {
                $this->assign('vote_id',     $vote['id']);
                $this->assign('vote',        $vote['content']);
            }
        
            $ext = ''; //商品查询条件扩展
            $this->assign('hot_goods',       $this->get_exchange_recommend_goods('hot',  $children, $integral_min, $integral_max));
            
            $count = $this -> get_exchange_goods_count($children, $integral_min, $integral_max);
            $max_page = ($count> 0) ? ceil($count / $size) : 1;
            if ($page > $max_page)
            {
                $page = $max_page;
            }
            $GLOBALS['display']=$display;
            $goodslist = $this -> exchange_get_goods($children, $integral_min, $integral_max, $ext, $size, $page, $sort, $order);
            if($display == 'grid')
            {
                if(count($goodslist) % 2 != 0)
                {
                    $goodslist[] = array();
                }
            }
            $this->assign('goods_list',       $goodslist);
            $this->assign('category',         $cat_id);
            $this->assign('integral_max',     $integral_max);
            $this->assign('integral_min',     $integral_min);
        
            $this->assign_pager('exchange',            $cat_id, $count, $size, $sort, $order, $page, '', '', $integral_min, $integral_max, $display); // 分页
        
            $this -> display('template/' . C('WEB_STYLE') . '/ec/exchange_list.html');
        }
        /*------------------------------------------------------ */
        //-- 积分兑换商品详情
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'view')
        {
            $goods_id = isset($_REQUEST['id'])  ? intval($_REQUEST['id']) : 0;
            
            $this->assign('image_width',  C('ec_image_width'));
            $this->assign('image_height', C('ec_image_height'));
            $this->assign('helps',        get_shop_help()); // 网店帮助
            $this->assign('id',           $goods_id);
            $this->assign('type',         0);
            
            /* 获得商品的信息 */
            $goods = $this -> get_exchange_goods_info($goods_id);
        
            if ($goods === false)
            {
                /* 如果没有找到任何记录则跳回到首页 */
                ec_header("Location: ".U('ec/EcIndex/index')."\n");
                exit;
            }
            else
            {
                if ($goods['brand_id'] > 0)
                {
                    $goods['goods_brand_url'] = ec_build_uri('brand', array('bid'=>$goods['brand_id']), $goods['goods_brand']);
                }
                $goods['goods_style_name'] = add_style($goods['goods_name'], $goods['goods_name_style']);
                
                $this->assign('goods',              $goods);
                $this->assign('goods_id',           $goods['goods_id']);
                $this->assign('categories',         get_categories_tree());  // 分类树
                
                /* meta */
                $this->assign('keywords',           htmlspecialchars($goods['keywords']));
                $this->assign('description',        htmlspecialchars($goods['goods_brief']));
                
                
                $this->assign_template();
                
                /* 上一个商品下一个商品 */
                $sql = "SELECT eg.goods_id as goods_id 
                        FROM " .$ecs->table('ec_exchange_goods'). " AS eg," . 
                                $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g 
                        WHERE eg.goods_id = g.goods_id AND eg.goods_id > " . $goods['goods_id'] . " AND eg.is_exchange = 1 AND g.is_delete = 0 LIMIT 1";
                $prev_gid = M()->getOne($sql,'goods_id');
                if (!empty($prev_gid))
                {
                    $prev_good['url'] = ec_build_uri('exchange_goods', array('gid' => $prev_gid), $goods['goods_name']);
                    $this->assign('prev_good', $prev_good);//上一个商品
                }
                
                $sql = "SELECT max(eg.goods_id)  as goods_id 
                        FROM " . $ecs->table('ec_exchange_goods') . " AS eg," . 
                                $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g 
                        WHERE eg.goods_id = g.goods_id AND eg.goods_id < ".$goods['goods_id'] . " AND eg.is_exchange = 1 AND g.is_delete = 0";
                $next_gid = M()->getOne($sql,'goods_id');
                if (!empty($next_gid))
                {
                    $next_good['url'] = ec_build_uri('exchange_goods', array('gid' => $next_gid), $goods['goods_name']);
                    $this->assign('next_good', $next_good);//下一个商品
                }
                
                /* current position */
                $position = assign_ur_here('exchange', $goods['goods_name']);
                $this->assign('page_title',          $position['title']);                    // 页面标题
                $this->assign('ur_here',             $position['ur_here']);                  // 当前位置
                
                $properties = get_goods_properties($goods_id);  // 获得商品的规格和属性
            
                $this->assign('properties',          $properties['pro']);                              // 商品属性
                $this->assign('specification',       $properties['spe']);                              // 商品规格
                
                $this->assign('pictures',            get_goods_gallery($goods_id));                    // 商品相册
                
            }
            
            $this -> display('template/' . C('WEB_STYLE') . '/ec/exchange_goods.html');
        }
        /*------------------------------------------------------ */
        //--  兑换
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'buy')
        {
            /* 查询：判断是否登录 */
            if (!isset($back_act) && isset($_SERVER['HTTP_REFERER']))
            {
                $back_act = strpos($_SERVER['HTTP_REFERER'], 'EcExchange') ? $_SERVER['HTTP_REFERER'] : U('ec/EcIndex/index');
            }
            
            /* 查询：判断是否登录 */
            if ($_SESSION['ec_user_id'] <= 0)
            {
                $this->show_message('对不起，您没有登录，不能参加兑换，请您先登录！', array('返回上一页'), array($back_act), 'error');
            }
            
            /* 查询：取得参数：商品id */
            $goods_id = isset($_POST['goods_id']) ? intval($_POST['goods_id']) : 0;
            if ($goods_id <= 0)
            {
                ec_header("Location: ".U('ec/EcIndex/index')."\n");
                exit;
            }
            
            /* 查询：取得兑换商品信息 */
            $goods = $this -> get_exchange_goods_info($goods_id);
            if (empty($goods))
            {
                ec_header("Location: ".U('ec/EcIndex/index')."\n");
                exit;
            }
            /* 查询：检查兑换商品是否有库存 */
            if($goods['goods_number'] == 0 && $_CFG['use_storage'] == 1)
            {
                $this->show_message('对不起，该商品库存不足，现在不能兑换！', array('返回上一页'), array($back_act), 'error');
            }
            /* 查询：检查兑换商品是否是取消 */
            if ($goods['is_exchange'] == 0)
            {
                $this->show_message('对不起，该商品已经取消，现在不能兑换！', array('返回上一页'), array($back_act), 'error');
            }
            $user_info   = get_user_info($_SESSION['ec_user_id']);
            $user_points = $user_info['pay_points']; // 用户的积分总数
            
            if ($goods['exchange_integral'] > $user_points)
            {
                $this->show_message('对不起，您现有的积分值不够兑换本商品！', array('返回上一页'), array($back_act), 'error');
            }
            
            /* 查询：取得规格 */
            $specs = '';
            foreach ($_POST as $key => $value)
            {
                if (strpos($key, 'spec_') !== false)
                {
                    $specs .= ',' . intval($value);
                }
            }
            $specs = trim($specs, ',');
            
            /* 查询：如果商品有规格则取规格商品信息 配件除外 */
            if (!empty($specs))
            {
                $_specs = explode(',', $specs);
        
                $product_info = get_products_info($goods_id, $_specs);
            }
            if (empty($product_info))
            {
                $product_info = array('product_number' => '', 'product_id' => 0);
            }
            //查询：商品存在规格 是货品 检查该货品库存
            if(
                    (!empty($specs)) && 
                    ($product_info['product_number'] == 0) && 
                    (C('ec_use_storage') == 1)
                )
            {
                $this->show_message('对不起，该商品库存不足，现在不能兑换！', array('返回上一页'), array($back_act), 'error');
            }
            
            /* 查询：查询规格名称和值，不考虑价格 */
            $attr_list = array();
            $sql = "SELECT a.attr_name, g.attr_value " .
                    "FROM " . $ecs->table('ec_goods_attr') . " AS g, " .
                        $ecs->table('ec_attribute') . " AS a " .
                    "WHERE g.attr_id = a.attr_id " .
                    "AND g.goods_attr_id " . db_create_in($specs);
            $res = M()->query($sql);
            if(!empty($res))
            {
                foreach($res as $row)
                {
                    $attr_list[] = $row['attr_name'] . ': ' . $row['attr_value'];
                }
            }
            $goods_attr = join(chr(13) . chr(10), $attr_list);
            
            /* 更新：清空购物车中所有团购商品 */
            clear_cart(CART_EXCHANGE_GOODS);
            
            /* 更新：加入购物车 */
            $number = 1;
            $cart = array(
                'user_id'        => $_SESSION['ec_user_id'],
                'session_id'     => SESS_ID,
                'goods_id'       => $goods['goods_id'],
                'product_id'     => $product_info['product_id'],
                'goods_sn'       => addslashes($goods['goods_sn']),
                'goods_name'     => addslashes($goods['goods_name']),
                'market_price'   => $goods['market_price'],
                'goods_price'    => 0,//$goods['exchange_integral']
                'goods_number'   => $number,
                'goods_attr'     => addslashes($goods_attr),
                'goods_attr_id'  => $specs,
                'is_real'        => $goods['is_real'],
                'extension_code' => addslashes($goods['extension_code']),
                'parent_id'      => 0,
                'rec_type'       => CART_EXCHANGE_GOODS,
                'is_gift'        => 0
            );
            M()->autoExecute($ecs->table('ec_cart'), $cart, 'INSERT');
            
            /* 记录购物流程类型：团购 */
            $_SESSION['ec_flow_type'] = CART_EXCHANGE_GOODS;
            $_SESSION['ec_extension_code'] = 'exchange_goods';
            $_SESSION['ec_extension_id'] = $goods_id;
    
            /* 进入收货人页面 */
            ec_header("Location: ".U('ec/EcFlow/index')."&step=consignee\n");
            exit;
    
        }

    }
    
    
    /**
     * 获得积分兑换商品的详细信息
     *
     * @access  public
     * @param   integer     $goods_id
     * @return  void
     */
    public function get_exchange_goods_info($goods_id)
    {
        $time = gmtime();
        $sql = 'SELECT g.*, c.measure_unit, b.brand_id, b.brand_name AS goods_brand, eg.exchange_integral, eg.is_exchange ' .
                'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . ' AS g ' .
                'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_exchange_goods') . ' AS eg ON g.goods_id = eg.goods_id ' .
                'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_category') . ' AS c ON g.cat_id = c.cat_id ' .
                'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_brand') . ' AS b ON g.brand_id = b.brand_id ' .
                "WHERE g.goods_id = '$goods_id' AND g.is_delete = 0 " .
                'GROUP BY g.goods_id';
        $row = M()->getRowSql($sql);
        if (!empty($row))
        {
            /* 处理商品水印图片 */
            $watermark_img = '';
    
            if ($row['is_new'] != 0)
            {
                $watermark_img = "watermark_new";
            }
            elseif ($row['is_best'] != 0)
            {
                $watermark_img = "watermark_best";
            }
            elseif ($row['is_hot'] != 0)
            {
                $watermark_img = 'watermark_hot';
            }
    
            if ($watermark_img != '')
            {
                $row['watermark_img'] =  $watermark_img;
            }
            /* 修正重量显示 */
            $row['goods_weight']  = (intval($row['goods_weight']) > 0) ?
                                    $row['goods_weight'] . '千克' :
                                    ($row['goods_weight'] * 1000) . '克';
        
            /* 修正上架时间显示 */
            $row['add_time']      = local_date(C('ec_date_format'), $row['add_time']);
    
            /* 修正商品图片 */
            $row['goods_img']   = get_image_path($goods_id, $row['goods_img']);
            $row['goods_thumb'] = get_image_path($goods_id, $row['goods_thumb'], true);

            return $row;
            
        }
        else
        {
            return false;
        }
    }
    
    /**
     * 获得分类下的商品
     *
     * @access  public
     * @param   string  $children
     * @return  array
     */
    public function exchange_get_goods($children, $min, $max, $ext, $size, $page, $sort, $order)
    {
        $display = $GLOBALS['display'];
        $where = "eg.is_exchange = 1 AND g.is_delete = 0 AND ".
             "($children OR " . get_extension_goods($children) . ')';

        if ($min > 0)
        {
            $where .= " AND eg.exchange_integral >= $min ";
        }
    
        if ($max > 0)
        {
            $where .= " AND eg.exchange_integral <= $max ";
        }
        /* 获得商品列表 */
        $sql = 'SELECT g.goods_id, g.goods_name, g.goods_name_style, eg.exchange_integral, ' .
                    'g.goods_type, g.goods_brief, g.goods_thumb , g.goods_img, eg.is_hot ' .
                'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_exchange_goods') . ' AS eg, ' .
                        $GLOBALS['ec_globals']['ecs']->table('ec_goods') . ' AS g ' .
                "WHERE eg.goods_id = g.goods_id AND $where $ext ORDER BY $sort $order";
        $res = M()->selectLimit($sql, $size, ($page - 1) * $size);
        $arr = array();
        if(!empty($res))
        {
            $ec_goods_name_length=C('ec_goods_name_length');
            foreach($res as $row)
            {
                /* 处理商品水印图片 */
                $watermark_img = '';
                if ($row['is_hot'] != 0)
                {
                    $watermark_img = 'watermark_hot_small';
                }
        
                if ($watermark_img != '')
                {
                    $arr[$row['goods_id']]['watermark_img'] =  $watermark_img;
                }
        
                $arr[$row['goods_id']]['goods_id']          = $row['goods_id'];
                if($display == 'grid')
                {
                    $arr[$row['goods_id']]['goods_name']    = $ec_goods_name_length > 0 ? sub_str($row['goods_name'], $ec_goods_name_length) : $row['goods_name'];
                }
                else
                {
                    $arr[$row['goods_id']]['goods_name']    = $row['goods_name'];
                }
                $arr[$row['goods_id']]['name']              = $row['goods_name'];
                $arr[$row['goods_id']]['goods_brief']       = $row['goods_brief'];
                $arr[$row['goods_id']]['goods_style_name']  = add_style($row['goods_name'],$row['goods_name_style']);
                $arr[$row['goods_id']]['exchange_integral'] = $row['exchange_integral'];
                $arr[$row['goods_id']]['type']              = $row['goods_type'];
                $arr[$row['goods_id']]['goods_thumb']       = get_image_path($row['goods_id'], $row['goods_thumb'], true);
                $arr[$row['goods_id']]['goods_img']         = get_image_path($row['goods_id'], $row['goods_img']);
                $arr[$row['goods_id']]['url']               = ec_build_uri('exchange_goods', array('gid'=>$row['goods_id']), $row['goods_name']);
            }
        }
        return $arr;
    
    }
        
    
    /**
     * 获得分类下的商品总数
     *
     * @access  public
     * @param   string     $cat_id
     * @return  integer
     */
    public function get_exchange_goods_count($children, $min = 0, $max = 0, $ext='')
    {
        $where  = "eg.is_exchange = 1 AND g.is_delete = 0 AND ($children OR " . get_extension_goods($children) . ')';
    
    
        if ($min > 0)
        {
            $where .= " AND eg.exchange_integral >= $min ";
        }
    
        if ($max > 0)
        {
            $where .= " AND eg.exchange_integral <= $max ";
        }
    
        $sql = 'SELECT COUNT(*) FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_exchange_goods') . ' AS eg, ' .
               $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g WHERE eg.goods_id = g.goods_id AND $where $ext";
    
        /* 返回商品总数 */
        return M()->getOne($sql,'COUNT(*)');
    }
    
    /**
     * 获得指定分类下的推荐商品
     *
     * @access  public
     * @param   string      $type       推荐类型，可以是 best, new, hot, promote
     * @param   string      $cats       分类的ID
     * @param   integer     $min        商品积分下限
     * @param   integer     $max        商品积分上限
     * @param   string      $ext        商品扩展查询
     * @return  array
     */
    public function get_exchange_recommend_goods($type = '', $cats = '', $min =0,  $max = 0, $ext='')
    {
        $price_where = ($min > 0) ? " AND g.shop_price >= $min " : '';
        $price_where .= ($max > 0) ? " AND g.shop_price <= $max " : '';
        
        $sql =  'SELECT g.goods_id, g.goods_name, g.goods_name_style, eg.exchange_integral, ' .
                'g.goods_brief, g.goods_thumb, goods_img, b.brand_name ' .
                'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_exchange_goods') . ' AS eg ' .
                'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . ' AS g ON g.goods_id = eg.goods_id ' .
                'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_brand') . ' AS b ON b.brand_id = g.brand_id ' .
                'WHERE eg.is_exchange = 1 AND g.is_delete = 0 ' . $price_where . $ext;
        $num = 0;
        $type2lib = array('best'=>'exchange_best', 'new'=>'exchange_new', 'hot'=>'exchange_hot');
        $num = get_library_number($type2lib[$type], 'exchange_list');
        switch ($type)
        {
            case 'best':
                $sql .= ' AND eg.is_best = 1';
                break;
            case 'new':
                $sql .= ' AND eg.is_new = 1';
                break;
            case 'hot':
                $sql .= ' AND eg.is_hot = 1';
                break;
        }
        if (!empty($cats))
        {
            $sql .= " AND (" . $cats . " OR " . get_extension_goods($cats) .")";
        }
        $order_type = C('ec_recommend_order');
        $sql .= ($order_type == 0) ? ' ORDER BY g.sort_order, g.last_update DESC' : ' ORDER BY RAND()';
        $res = M()->selectLimit($sql, $num);
        $idx = 0;
        $goods = array();
    
        if(!empty($res))
        {
            $ec_goods_name_length=C('ec_goods_name_length');
            foreach($res as $row)
            {
                $goods[$idx]['id']                = $row['goods_id'];
                $goods[$idx]['name']              = $row['goods_name'];
                $goods[$idx]['brief']             = $row['goods_brief'];
                $goods[$idx]['brand_name']        = $row['brand_name'];
                $goods[$idx]['short_name']        = $ec_goods_name_length > 0 ?
                                                        sub_str($row['goods_name'], $ec_goods_name_length) : $row['goods_name'];
                $goods[$idx]['exchange_integral'] = $row['exchange_integral'];
                $goods[$idx]['thumb']             = get_image_path($row['goods_id'], $row['goods_thumb'], true);
                $goods[$idx]['goods_img']         = get_image_path($row['goods_id'], $row['goods_img']);
                $goods[$idx]['url']               = ec_build_uri('exchange_goods', array('gid' => $row['goods_id']), $row['goods_name']);
        
                $goods[$idx]['short_style_name']  = add_style($goods[$idx]['short_name'], $row['goods_name_style']);
                $idx++;
            }
        }
        return $goods;
        
    }
    
    /**
     * 获得分类的信息
     *
     * @param   integer $cat_id
     *
     * @return  void
     */
    public function get_cat_info($cat_id)
    {
        return M()->getRowSql('SELECT keywords, cat_desc, style, grade, filter_attr, parent_id 
                                FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_category') .
                                " WHERE cat_id = '$cat_id'");
    }
    
    
	
}
