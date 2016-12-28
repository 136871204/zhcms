<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcIndexControl extends EcControl {
    
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
        //echo 'aaa';die;
    }
    
    public function index(){
        $ecs=$GLOBALS['ec_globals']['ecs'];
        
        //判断是否有ajax请求
        $act = !empty($_GET['act']) ? $_GET['act'] : '';
        if ($act == 'cat_rec')
        {
            $json = new Json();
            $rec_array = array(1 => 'best', 2 => 'new', 3 => 'hot');
            $rec_type = !empty($_REQUEST['rec_type']) ? intval($_REQUEST['rec_type']) : '1';
            $cat_id = !empty($_REQUEST['cid']) ? intval($_REQUEST['cid']) : '0';
            $result   = array('error' => 0, 'content' => '', 'type' => $rec_type, 'cat_id' => $cat_id);
            $children = get_children($cat_id);
            $this->assign($rec_array[$rec_type] . '_goods',      get_category_recommend_goods($rec_array[$rec_type], $children));    // 推荐商品
            $this->assign('cat_rec_sign', 1);
            $result['content'] = $this->fetch('template/' . C('WEB_STYLE') . '/ec/common/library/recommend_' . $rec_array[$rec_type] . '.lbi');
            die($json->encode($result));
            
        }

        
        $this->assign_template();
        $position = assign_ur_here();
        $this->assign('page_title',      $position['title']);    // 页面标题
        $this->assign('ur_here',         $position['ur_here']);  // 当前位置
        $this->assign('navigator_list',        get_navigator());
        
        $this->assign('keywords',        htmlspecialchars(C('ec_shop_keywords')));
        $this->assign('description',     htmlspecialchars(C('ec_shop_desc')));
        $this->assign('shop_notice',     C('ec_shop_notice'));       // 商店公告
        $this->assign('categories',      get_categories_tree()); // 分类树
        $this->assign('top_goods',       get_top10());           // 销售排行
        $this->assign('promotion_info',  get_promotion_info()); // 增加一个动态显示所有促销信息的标签栏
        $this->assign('invoice_list',    $this -> index_get_invoice_query());  // 发货查询
        $this->assign('new_articles',    $this -> index_get_new_articles());   // 最新文章
        $this->assign('promotion_goods', get_promote_goods()); // 特价商品
        $this->assign('brand_list',      get_brands());
        $this->assign('best_goods',      get_recommend_goods('best'));    // 推荐商品
        $this->assign('new_goods',       get_recommend_goods('new'));     // 最新商品
        $this->assign('hot_goods',       get_recommend_goods('hot'));     // 热点文章
        $this->assign('auction_list',    $this -> index_get_auction());        // 拍卖活动
        $this->assign('group_buy_goods', $this -> index_get_group_buy());      // 团购商品
        
        /* 首页推荐分类 */
        $cat_recommend_res = M()->getAll("SELECT c.cat_id, c.cat_name, cr.recommend_type 
                                            FROM " . 
                                                  $ecs->table("ec_cat_recommend") . " AS cr 
                                                  INNER JOIN " . $ecs->table("ec_category") . " AS c ON cr.cat_id=c.cat_id");
        if (!empty($cat_recommend_res))
        {
            $cat_rec_array = array();
            foreach($cat_recommend_res as $cat_recommend_data)
            {
                $cat_rec[$cat_recommend_data['recommend_type']][] = array('cat_id' => $cat_recommend_data['cat_id'], 'cat_name' => $cat_recommend_data['cat_name']);
            }
            $this->assign('cat_rec', $cat_rec);
        }
        $this->assign('helps',           get_shop_help());       // 网店帮助
    
        $links = $this->index_get_links();
        $this->assign('img_links',       $links['img']);
        $this->assign('txt_links',       $links['txt']);
        
        $this->assign("flash",$this ->get_flash_xml());
        /*$this->assign_template();
        $this->assign('categories',      get_categories_tree()); // 分类树
        $this->assign('helps',           get_shop_help());       // 网店帮助
        
        $this->assign('best_goods',      get_recommend_goods('best'));    // 推荐商品
        $this->assign('new_goods',       get_recommend_goods('new'));     // 最新商品
        $this->assign('hot_goods',       get_recommend_goods('hot'));     // 热点文章
        $this->assign('promotion_goods', get_promote_goods()); // 特价商品
        

        

        $this->assign("flash",$this ->get_flash_xml());
        $this->assign('new_articles',    $this ->index_get_new_articles());   // 最新文章
        
        

        $links = $this->index_get_links();
        $this->assign('img_links',       $links['img']);
        $this->assign('txt_links',       $links['txt']);

        $this->assign_dynamic('EcIndex');
        $this->dyna_libs_replace('EcIndex','/library/cat_goods.lbi');*/
    
        $this -> display('template/' . C('WEB_STYLE') . '/ec/index.html');
    }
    
    
    /**
     * 获得最新的团购活动
     *
     * @access  private
     * @return  array
     */
    public function index_get_group_buy()
    {
        $time = gmtime();
        $limit = get_library_number('group_buy', 'EcIndex');
        
        $group_buy_list = array();
        if ($limit > 0)
        {
            $sql = 'SELECT gb.act_id AS group_buy_id, gb.goods_id, gb.ext_info, gb.goods_name, g.goods_thumb, g.goods_img ' .
                'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') . ' AS gb, ' .
                    $GLOBALS['ec_globals']['ecs']->table('ec_goods') . ' AS g ' .
                "WHERE gb.act_type = '" . GAT_GROUP_BUY . "' " .
                "AND g.goods_id = gb.goods_id " .
                "AND gb.start_time <= '" . $time . "' " .
                "AND gb.end_time >= '" . $time . "' " .
                "AND g.is_delete = 0 " .
                "ORDER BY gb.act_id DESC " .
                "LIMIT $limit" ;
            $res = M()->query($sql);
            if(!empty($res)){
                $ec_goods_name_length=C('ec_goods_name_length');
                foreach($res as $row)
                {
                    /* 如果缩略图为空，使用默认图片 */
                    $row['goods_img'] = get_image_path($row['goods_id'], $row['goods_img']);
                    $row['thumb'] = get_image_path($row['goods_id'], $row['goods_thumb'], true);
        
                    /* 根据价格阶梯，计算最低价 */
                    $ext_info = unserialize($row['ext_info']);
                    $price_ladder = $ext_info['price_ladder'];
                    if (!is_array($price_ladder) || empty($price_ladder))
                    {
                        $row['last_price'] = price_format(0);
                    }
                    else
                    {
                        foreach ($price_ladder AS $amount_price)
                        {
                            $price_ladder[$amount_price['amount']] = $amount_price['price'];
                        }
                    }
                    ksort($price_ladder);
                    $row['last_price'] = price_format(end($price_ladder));
                    $row['url'] = ec_build_uri('group_buy', array('gbid' => $row['group_buy_id']));
                    $row['short_name']   = $ec_goods_name_length > 0 ?
                                                   sub_str($row['goods_name'], $ec_goods_name_length) : $row['goods_name'];
                    $row['short_style_name']   = add_style($row['short_name'],'');
                    $group_buy_list[] = $row;
                }
            }
            return $group_buy_list;
        }
    }
    
    /**
     * 取得拍卖活动列表
     * @return  array
     */
    public function index_get_auction()
    {
        $now = gmtime();
        $limit = get_library_number('auction', 'EcIndex');
        $sql = "SELECT a.act_id, a.goods_id, a.goods_name, a.ext_info, g.goods_thumb ".
            "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') . " AS a," .
                      $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g" .
            " WHERE a.goods_id = g.goods_id" .
            " AND a.act_type = '" . GAT_AUCTION . "'" .
            " AND a.is_finished = 0" .
            " AND a.start_time <= '$now'" .
            " AND a.end_time >= '$now'" .
            " AND g.is_delete = 0" .
            " ORDER BY a.start_time DESC" .
            " LIMIT $limit";
        $res = M()->query($sql);
        $list = array();
        //p($res);die;
        if(!empty($res))
        {
            $ec_goods_name_length=C('ec_goods_name_length');
            foreach($res as $row)
            {
                $ext_info = unserialize($row['ext_info']);
                $arr = array_merge($row, $ext_info);
                $arr['formated_start_price'] = price_format($arr['start_price']);
                $arr['formated_end_price'] = price_format($arr['end_price']);
                $arr['thumb'] = get_image_path($row['goods_id'], $row['goods_thumb'], true);
                $arr['url'] = ec_build_uri('auction', array('auid' => $arr['act_id']));
                $arr['short_name']   = $ec_goods_name_length > 0 ?
                                                   sub_str($arr['goods_name'], $ec_goods_name_length) : $arr['goods_name'];
                $arr['short_style_name']   = add_style($arr['short_name'],'');
                $list[] = $arr;
            }
        }
        
        return $list;
    }
    
    /**
     * 获得最新的文章列表。
     *
     * @access  private
     * @return  array
     */
    public function index_get_new_articles(){
        $sql = 'SELECT 
                    a.article_id, a.title, ac.cat_name, a.add_time, a.file_url, a.open_type, ac.cat_id, ac.cat_name ' .
                ' FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_article') . ' AS a, ' .
                            $GLOBALS['ec_globals']['ecs']->table('ec_article_cat') . ' AS ac' .
                ' WHERE a.is_open = 1 AND a.cat_id = ac.cat_id AND ac.cat_type = 1' .
            ' ORDER BY a.article_type DESC, a.add_time DESC LIMIT ' . C('ec_article_number');
        $res =M()->query($sql);
        $arr = array();
        if(!empty($res)){
            foreach ($res AS $idx => $row){
                $arr[$idx]['id']          = $row['article_id'];
                $arr[$idx]['title']       = $row['title'];
                $article_title_length=C('ec_article_title_length');
                $arr[$idx]['short_title'] = $article_title_length > 0 ?
                                        sub_str($row['title'], $article_title_length) : $row['title'];
                $arr[$idx]['cat_name']    = $row['cat_name'];
                $arr[$idx]['add_time']    = local_date(C('ec_date_format'), $row['add_time']);
                $arr[$idx]['url']         = $row['open_type'] != 1 ?
                                                ec_build_uri('article', array('aid' => $row['article_id']), $row['title']) : trim($row['file_url']);
                $arr[$idx]['cat_url']     = ec_build_uri('article_cat', array('acid' => $row['cat_id']), $row['cat_name']);
            }
        }
        return $arr;
    }

    /**
     * 调用发货单查询
     *
     * @access  private
     * @return  array
     */
    function index_get_invoice_query()
    {
        $sql = 'SELECT o.order_sn, o.invoice_no, s.shipping_code 
                FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_order_info') . ' AS o' .
                        ' LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_shipping') . ' AS s ON s.shipping_id = o.shipping_id' .
                " WHERE invoice_no > '' AND shipping_status = " . SS_SHIPPED .
                ' ORDER BY shipping_time DESC LIMIT 10';
        $all = M()->getAll($sql);
        if(!empty($all))
        {
            //p($all);
            foreach ($all AS $key => $row)
            {
                $plugin = ROOT_PATH . 'includes/modules/shipping/' . $row['shipping_code'] . '.php';
                if (file_exists($plugin))
                {
                    include_once($plugin);
        
                    $shipping = new $row['shipping_code'];
                    $all[$key]['invoice_no'] = $shipping->query((string)$row['invoice_no']);
                }

            }
        }
        
        clearstatcache();
        //p($all);die;
        return $all;
    
    }



    /**
     * 获得所有的友情链接
     *
     * @access  private
     * @return  array
     */
    function index_get_links(){
        $sql = 'SELECT 
                    link_logo, link_name, link_url 
                FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_friend_link') . ' ORDER BY show_order';
        $res = M()->getAll($sql);
        $links['img'] = $links['txt'] = array();
        if(!empty($res)){
            foreach ($res AS $row)
            {
                if (!empty($row['link_logo']))
                {
                    $links['img'][] = array('name' => $row['link_name'],
                                            'url'  => $row['link_url'],
                                            'logo' => $row['link_logo']);
                }
                else
                {
                    $links['txt'][] = array('name' => $row['link_name'],
                                            'url'  => $row['link_url']);
                }
            }
        }
        
    
        return $links;
    }
    
    

    
    public function get_flash_xml()
    {
        $flashdb = array();
        if (file_exists(ROOT_PATH . EC_DATA_DIR . '/flash_data.xml'))
        {
            // 兼容v2.7.0及以前版本
            if (!preg_match_all('/item_url="([^"]+)"\slink="([^"]+)"\stext="([^"]*)"\ssort="([^"]*)"/', file_get_contents(ROOT_PATH . EC_DATA_DIR . '/flash_data.xml'), $t, PREG_SET_ORDER))
            {
                preg_match_all('/item_url="([^"]+)"\slink="([^"]+)"\stext="([^"]*)"/', file_get_contents(ROOT_PATH . EC_DATA_DIR . '/flash_data.xml'), $t, PREG_SET_ORDER);
            }
            if (!empty($t))
            {
                foreach ($t as $key => $val)
                {
                    $val[4] = isset($val[4]) ? $val[4] : 0;
                    $flashdb[] = array('src'=>$val[1],'url'=>$val[2],'text'=>$val[3],'sort'=>$val[4]);
    //print_r($flashdb);
                }
            }
        }
        return $flashdb;
    }

    //------------------------------------------------------------------------------------------------------
	//网站首页
	public function index2() {
	   $db_prefix=C('DB_PREFIX');
       //TODO:之后调整
        $_SESSION['user_id']     = 0;
            $_SESSION['user_name']   = '';
            $_SESSION['email']       = '';
            $_SESSION['user_rank']   = 0;
            $_SESSION['discount']    = 1.00;
       
       //
      
	   $goodsCategoryModel=K("GoodsCategory");
       $goodsModel=K("Goods");
	   if (isset($_SESSION['uid']) && $_SESSION['uid']> 0)
        {
           // echo 'TODO:get_user_info没有测试到';
           //$this->assign('user_info', get_user_info());
        }
        $this->assign('navigator_list',        get_navigator());
        $this->assign('category_list', $goodsCategoryModel->cat_list(0, 0, true,  2, false));
         
        $searchkeywords = array();
        $this->assign('searchkeywords', $searchkeywords);
        
        $this->assign('categories',     $goodsCategoryModel->get_categories_tree()); // 分类树
        $this->assign('top_goods',       $goodsModel->get_top10());           // 销售排行
        $this->assign('promotion_info',  get_promotion_info()); // 增加一个动态显示所有促销信息的标签栏
        $this->assign('invoice_list',    $this->index_get_invoice_query());  // 发货查询
        $this->assign('new_articles',    $this->index_get_new_articles());   // 最新文章
        //$smarty->assign('promotion_goods', get_promote_goods()); // 特价商品
        $this->assign('brand_list',      get_brands());
        $this->assign('shop_notice',     C('ec_shop_notice'));       // 商店公告
        $this->assign('best_goods',      $goodsModel->get_recommend_goods('best'));    // 推荐商品
        $this->assign('new_goods',       $goodsModel->get_recommend_goods('new'));     // 最新商品
        $this->assign('hot_goods',       $goodsModel->get_recommend_goods('hot'));     // 热点文章
         
         //$smarty->assign('best_goods',      get_recommend_goods('best'));    // 推荐商品
         
         /* 首页主广告设置 */
        $this->assign('index_ad',     C('ec_index_ad'));
         if (C('ec_index_ad') == 'cus')
         {
            $sql = 'SELECT ad_type, content, url FROM ' . $db_prefix."ad_custom" . ' WHERE ad_status = 1';
            $ad = M()->getRowSql($sql, true);
            $this->assign('ad', $ad);
         }

        /* 首页推荐分类 */
        $cat_recommend_res_sql="SELECT 
                                    c.cat_id, c.cat_name, cr.recommend_type 
                                FROM " . $db_prefix."cat_recommend" . " AS cr 
                                INNER JOIN " . $db_prefix."goods_category" . " AS c ON cr.cat_id=c.cat_id";
        $cat_recommend_res = M()->query($cat_recommend_res_sql);
        if (!empty($cat_recommend_res))
        {
            $cat_rec_array = array();
            foreach($cat_recommend_res as $cat_recommend_data)
            {
                $cat_rec[$cat_recommend_data['recommend_type']][] = array('cat_id' => $cat_recommend_data['cat_id'], 'cat_name' => $cat_recommend_data['cat_name']);
            }

            $this->assign('cat_rec', $cat_rec);
        }
    
        $position = assign_ur_here();
        $this->assign('page_title',      $position['title']);    // 页面标题
        $this->assign('ur_here',         $position['ur_here']);  // 当前位置
        /* meta information */
        $this->assign('keywords',        htmlspecialchars(C('ec_shop_keywords')));
        $this->assign('description',     htmlspecialchars(C('ec_shop_desc')));
        
        $this -> display('template/' . C('WEB_STYLE') . '/ec/index.html');
        
       //$this->display();
	}
    
    

}
