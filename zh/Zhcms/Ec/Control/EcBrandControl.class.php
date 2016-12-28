<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcBrandControl extends EcControl {
    
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
        //echo 'aaa';die;
    }
    
    public function index(){
        header("Content-type:text/html;charset=utf-8");
        $ecs=$GLOBALS['ec_globals']['ecs'];
        
        /* 获得请求的分类 ID */
        if (!empty($_REQUEST['id']))
        {
            $brand_id = intval($_REQUEST['id']);
        }
        if (!empty($_REQUEST['brand']))
        {
            $brand_id = intval($_REQUEST['brand']);
        }
        if (empty($brand_id))
        {
            $this -> assign_template();
            $position = assign_ur_here('', '全てのブランド');
            $this->assign('page_title',      $position['title']);    // 页面标题
            $this->assign('ur_here',         $position['ur_here']);  // 当前位置
    
            $this->assign('categories',      get_categories_tree()); // 分类树
            $this->assign('helps',           get_shop_help());       // 网店帮助
            $this->assign('top_goods',       get_top10());           // 销售排行
            
            $this->assign('brand_list', get_brands());
            
            
            $this -> display('template/' . C('WEB_STYLE') . '/ec/brand_list.html');
            
            //$smarty->assign('brand_list', get_brands());
        }else
        {
            /* 初始化分页信息 */
            $page = !empty($_REQUEST['page'])  && intval($_REQUEST['page'])  > 0 ? intval($_REQUEST['page'])  : 1;
            $size = !empty($_CFG['page_size']) && intval($_CFG['page_size']) > 0 ? intval($_CFG['page_size']) : 10;
            $cate = !empty($_REQUEST['cat'])   && intval($_REQUEST['cat'])   > 0 ? intval($_REQUEST['cat'])   : 0;
        
            /* 排序、显示方式以及类型 */
            $ec_show_order_type=C('ec_show_order_type');
            $ec_sort_order_method=C('ec_sort_order_method');
            $ec_sort_order_type=C('ec_sort_order_type');
            $default_display_type = $ec_show_order_type == '0' ? 'list' : ($ec_show_order_type == '1' ? 'grid' : 'text');
            $default_sort_order_method = $ec_sort_order_method == '0' ? 'DESC' : 'ASC';
            $default_sort_order_type   = $ec_sort_order_type == '0' ? 'goods_id' : ($ec_sort_order_type == '1' ? 'shop_price' : 'last_update');

            
            $sort  = (isset($_REQUEST['sort'])  && in_array(trim(strtolower($_REQUEST['sort'])), array('goods_id', 'shop_price', 'last_update'))) ? trim($_REQUEST['sort'])  : $default_sort_order_type;
            $order = (isset($_REQUEST['order']) && in_array(trim(strtoupper($_REQUEST['order'])), array('ASC', 'DESC')))                              ? trim($_REQUEST['order']) : $default_sort_order_method;
            $display  = (isset($_REQUEST['display']) && in_array(trim(strtolower($_REQUEST['display'])), array('list', 'grid', 'text'))) ? trim($_REQUEST['display'])  : (isset($_COOKIE['ECS']['display']) ? $_COOKIE['ECS']['display'] : $default_display_type);
            $display  = in_array($display, array('list', 'grid', 'text')) ? $display : 'text';
            setcookie('ECS[display]', $display, gmtime() + 86400 * 7);


            $brand_info = $this->get_brand_info($brand_id);

            if (empty($brand_info))
            {
                ec_header("Location: ".U('ec/EcIndex/index')."\n");
                exit;
            }
            $this->assign('keywords',    htmlspecialchars($brand_info['brand_desc']));
            $this->assign('description', htmlspecialchars($brand_info['brand_desc']));
            
    
            $this -> assign_template();
            $position = assign_ur_here($cate, $brand_info['brand_name']);
            $this->assign('page_title',     $position['title']);   // 页面标题
            $this->assign('ur_here',        $position['ur_here']); // 当前位置
            $this->assign('brand_id',       $brand_id);
            $this->assign('category',       $cate);
            
            $this->assign('categories',     get_categories_tree());        // 分类树
            $this->assign('helps',          get_shop_help());              // 网店帮助
            $this->assign('top_goods',      get_top10());                  // 销售排行
            
            $this->assign('show_marketprice', C('ec_show_marketprice'));
            $this->assign('brand_cat_list', $this->brand_related_cat($brand_id)); // 相关分类
    
            /* 调查 */
            $vote = get_vote();
            if (!empty($vote))
            {
                $this->assign('vote_id',     $vote['id']);
                $this->assign('vote',        $vote['content']);
            }
            
            $this->assign('best_goods',      $this->brand_recommend_goods('best', $brand_id, $cate));
            $this->assign('promotion_goods', $this->brand_recommend_goods('promote', $brand_id, $cate));
            $this->assign('brand',           $brand_info);
            $this->assign('promotion_info', get_promotion_info());
            $count = $this->goods_count_by_brand($brand_id, $cate);
            
            $GLOBALS['display']=$display;
            $goodslist = $this->brand_get_goods($brand_id, $cate, $size, $page, $sort, $order);
            
            if($display == 'grid')
            {
                if(count($goodslist) % 2 != 0)
                {
                    $goodslist[] = array();
                }
            }
            $this->assign('goods_list',      $goodslist);

            $this->assign_pager('brand',              $cate, $count, $size, $sort, $order, $page, '', $brand_id, 0, 0, $display); // 分页
            
            $this -> display('template/' . C('WEB_STYLE') . '/ec/brand.html');
        }
        
        
        //$this -> display('template/' . C('WEB_STYLE') . '/ec/package.html');
    }
    
    /**
     * 获得品牌下的商品
     *
     * @access  private
     * @param   integer  $brand_id
     * @return  array
     */
    public function brand_get_goods($brand_id, $cate, $size, $page, $sort, $order)
    {
        $cate_where = ($cate > 0) ? 'AND ' . get_children($cate) : '';
        /* 获得商品列表 */
        $sql = 'SELECT g.goods_id, g.goods_name, g.market_price, g.shop_price AS org_price, ' .
                    "IFNULL(mp.user_price, g.shop_price * '$_SESSION[ec_discount]') AS shop_price, g.promote_price, " .
                    'g.promote_start_date, g.promote_end_date, g.goods_brief, g.goods_thumb , g.goods_img ' .
                'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . ' AS g ' .
                'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . ' AS mp ' .
                    "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[ec_user_rank]' " .
                "WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 AND g.brand_id = '$brand_id' $cate_where".
                "ORDER BY $sort $order";
        $res = M()->selectLimit($sql, $size, ($page - 1) * $size);
        $arr = array();
        if(!empty($res))
        {
            $ec_goods_name_length=C('ec_goods_name_length');
            foreach($res as $row)
            {
                if ($row['promote_price'] > 0)
                {
                    $promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
                }
                else
                {
                    $promote_price = 0;
                }
                $arr[$row['goods_id']]['goods_id']      = $row['goods_id'];
                if($GLOBALS['display'] == 'grid')
                {
                    $arr[$row['goods_id']]['goods_name']       = $ec_goods_name_length > 0 ? sub_str($row['goods_name'], $ec_goods_name_length) : $row['goods_name'];
                }
                else
                {
                    $arr[$row['goods_id']]['goods_name']       = $row['goods_name'];
                }
                $arr[$row['goods_id']]['market_price']  = price_format($row['market_price']);
                $arr[$row['goods_id']]['shop_price']    = price_format($row['shop_price']);
                $arr[$row['goods_id']]['promote_price'] = ($promote_price > 0) ? price_format($promote_price) : '';
                $arr[$row['goods_id']]['goods_brief']   = $row['goods_brief'];
                $arr[$row['goods_id']]['goods_thumb']   = get_image_path($row['goods_id'], $row['goods_thumb'], true);
                $arr[$row['goods_id']]['goods_img']     = get_image_path($row['goods_id'], $row['goods_img']);
                $arr[$row['goods_id']]['url']           = ec_build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
            }
        }
        return $arr;
    }
    
    
    /**
     * 获得指定的品牌下的商品总数
     *
     * @access  private
     * @param   integer     $brand_id
     * @param   integer     $cate
     * @return  integer
     */
    public function goods_count_by_brand($brand_id, $cate = 0)
    {
        $sql = 'SELECT COUNT(*) FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_goods'). ' AS g '.
                "WHERE brand_id = '$brand_id' AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0";
    
        if ($cate > 0)
        {
            $sql .= " AND " . get_children($cate);
        }
    
        return M()->getOne($sql,'COUNT(*)');
    }

    
    
    /**
     * 获得指定品牌下的推荐和促销商品
     *
     * @access  private
     * @param   string  $type
     * @param   integer $brand
     * @return  array
     */
    public function brand_recommend_goods($type, $brand, $cat = 0)
    {
        static $result = NULL;
        $time = gmtime();
        if ($result === NULL)
        {
            if ($cat > 0)
            {
                $cat_where = "AND " . get_children($cat);
            }
            else
            {
                $cat_where = '';
            }
            $sql = 'SELECT g.goods_id, g.goods_name, g.market_price, g.shop_price AS org_price, g.promote_price, ' .
                            "IFNULL(mp.user_price, g.shop_price * '$_SESSION[ec_discount]') AS shop_price, ".
                            'promote_start_date, promote_end_date, g.goods_brief, g.goods_thumb, goods_img, ' .
                            'b.brand_name, g.is_best, g.is_new, g.is_hot, g.is_promote ' .
                    'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . ' AS g ' .
                    'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_brand') . ' AS b ON b.brand_id = g.brand_id ' .
                    'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . ' AS mp '.
                        "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[ec_user_rank]' ".
                    "WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 AND g.brand_id = '$brand' AND " .
                        "(g.is_best = 1 OR (g.is_promote = 1 AND promote_start_date <= '$time' AND ".
                        "promote_end_date >= '$time')) $cat_where" .
                   'ORDER BY g.sort_order, g.last_update DESC';
            $result = M()->getAll($sql);
        }
        /* 取得每一项的数量限制 */
        $num = 0;
        $type2lib = array('best'=>'recommend_best', 
                        'new'=>'recommend_new', 
                        'hot'=>'recommend_hot', 
                        'promote'=>'recommend_promotion');
        $num = get_library_number($type2lib[$type]);
        
        $idx = 0;
        $goods = array();
        if(!empty($result))
        {
            $ec_goods_name_length=C('ec_goods_name_length');
            foreach ($result AS $row)
            {
                if ($idx >= $num)
                {
                    break;
                }
        
                if (($type == 'best' && $row['is_best'] == 1) ||
                    ($type == 'promote' && $row['is_promote'] == 1 &&
                    $row['promote_start_date'] <= $time && $row['promote_end_date'] >= $time))
                {
                    if ($row['promote_price'] > 0)
                    {
                        $promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
                        $goods[$idx]['promote_price'] = $promote_price > 0 ? price_format($promote_price) : '';
                    }
                    else
                    {
                        $goods[$idx]['promote_price'] = '';
                    }
        
                    $goods[$idx]['id']           = $row['goods_id'];
                    $goods[$idx]['name']         = $row['goods_name'];
                    $goods[$idx]['brief']        = $row['goods_brief'];
                    $goods[$idx]['brand_name']   = $row['brand_name'];
                    $goods[$idx]['short_style_name']   = $ec_goods_name_length > 0 ?
                                                       sub_str($row['goods_name'], $ec_goods_name_length) : $row['goods_name'];
                    $goods[$idx]['market_price'] = price_format($row['market_price']);
                    $goods[$idx]['shop_price']   = price_format($row['shop_price']);
                    $goods[$idx]['thumb']        = get_image_path($row['goods_id'], $row['goods_thumb'], true);
                    $goods[$idx]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
                    $goods[$idx]['url']          = ec_build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
        
                    $idx++;
                }
            }
        }
        return $goods;
    }

    
    /**
     * 获得与指定品牌相关的分类
     *
     * @access  public
     * @param   integer $brand
     * @return  array
     */
    public function brand_related_cat($brand)
    {
        $arr[] = array('cat_id' => 0,
                         'cat_name' => '全てのカテゴリ',
                         'url'      => ec_build_uri('brand', array('bid' => $brand), '全てのカテゴリ'));
        $sql = "SELECT c.cat_id, c.cat_name, COUNT(g.goods_id) AS goods_count FROM ".
                $GLOBALS['ec_globals']['ecs']->table('ec_category'). " AS c, ".
                $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g " .
                "WHERE g.brand_id = '$brand' AND c.cat_id = g.cat_id ".
                "GROUP BY g.cat_id";
        $res = M()->query($sql);
        if(!empty($res))
        {
            foreach($res as $row)
            {
                $row['url'] = ec_build_uri('brand', array('cid' => $row['cat_id'], 'bid' => $brand), $row['cat_name']);
                $arr[] = $row;
            }
        }
        return $arr;
    }
    
        
    /**
     * 获得指定品牌的详细信息
     *
     * @access  private
     * @param   integer $id
     * @return  void
     */
    public function get_brand_info($id)
    {
        $sql = 'SELECT * FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_brand') . " WHERE brand_id = '$id'";
    
        return M()->getRowSql($sql);
    }
	
}
