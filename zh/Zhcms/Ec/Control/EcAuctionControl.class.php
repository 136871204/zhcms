<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcAuctionControl extends EcControl {
    
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
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
        //-- 拍卖活动列表
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'list')
        {
            /* 取得拍卖活动总数 */
            $count = $this -> auction_count();
            if ($count > 0)
            {
                $ec_page_size=C('ec_page_size');
                /* 取得每页记录数 */
                $size = isset($ec_page_size) && intval($ec_page_size) > 0 ? intval($ec_page_size) : 10;
                /* 计算总页数 */
                $page_count = ceil($count / $size);
        
                /* 取得当前页 */
                $page = isset($_REQUEST['page']) && intval($_REQUEST['page']) > 0 ? intval($_REQUEST['page']) : 1;
                $page = $page > $page_count ? $page_count : $page;
        
            }
            if ($count > 0)
            {
                /* 取得当前页的拍卖活动 */
                $auction_list = $this ->auction_list($size, $page);
                $this->assign('auction_list',  $auction_list);
                
                /* 设置分页链接 */
                $pager = get_pager('auction.php', array('act' => 'list'), $count, $page, $size);
                $this->assign('pager', $pager);
                
            }
            $this->assign_template();
            $position = assign_ur_here();
            $this->assign('page_title', $position['title']);    // 页面标题
            $this->assign('ur_here',    $position['ur_here']);  // 当前位置
            $this->assign('categories', get_categories_tree()); // 分类树
            $this->assign('helps',      get_shop_help());       // 网店帮助
            $this->assign('top_goods',  get_top10());           // 销售排行
            $this->assign('promotion_info', get_promotion_info());
            $this -> display('template/' . C('WEB_STYLE') . '/ec/auction_list.html');
        }
        
        /*------------------------------------------------------ */
        //-- 拍卖商品 --> 商品详情
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'view')
        {
            /* 取得参数：拍卖活动id */
            $id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
            if ($id <= 0)
            {
                ec_header("Location: ".U('ec/EcIndex/index')."\n");
                exit;
            }
            
            
            
            /* 取得拍卖活动信息 */
            $auction = auction_info($id);
            if (empty($auction))
            {
                ec_header("Location: ".U('ec/EcIndex/index')."\n");
                exit;
            }
            
            //取货品信息
            if ($auction['product_id'] > 0)
            {
                $goods_specifications = get_specifications_list($auction['goods_id']);
                $good_products = get_good_products($auction['goods_id'], 'AND product_id = ' . $auction['product_id']);

                $_good_products = explode('|', $good_products[0]['goods_attr']);
                $products_info = '';
                foreach ($_good_products as $value)
                {
                    $products_info .= ' ' . $goods_specifications[$value]['attr_name'] . '：' . $goods_specifications[$value]['attr_value'];
                }
                $this->assign('products_info',     $products_info);
                unset($goods_specifications, $good_products, $_good_products,  $products_info);
            
                //p($good_products);die;
            }
            
            $auction['gmt_end_time'] = local_strtotime($auction['end_time']);
            $this->assign('auction', $auction);
        
            
            /* 取得拍卖商品信息 */
            $goods_id = $auction['goods_id'];
            $goods = goods_info($goods_id);
            if (empty($goods))
            {
                ec_header("Location: ".U('ec/EcIndex/index')."\n");
                exit;
            }
            $goods['url'] = ec_build_uri('goods', array('gid' => $goods_id), $goods['goods_name']);
            $this->assign('auction_goods', $goods);
        
            $this -> assign_template();
            $position = assign_ur_here(0, $goods['goods_name']);
            $this->assign('page_title', $position['title']);    // 页面标题
            $this->assign('ur_here',    $position['ur_here']);  // 当前位置
            $this->assign('categories', get_categories_tree()); // 分类树
            $this->assign('helps',      get_shop_help());       // 网店帮助
            $this->assign('top_goods',  get_top10());           // 销售排行
            $this->assign('promotion_info', get_promotion_info());
        
            //更新商品点击次数
            $sql = 'UPDATE ' . $ecs->table('ec_goods') . ' SET click_count = click_count + 1 '.
                   "WHERE goods_id = '" . $auction['goods_id'] . "'";
            M()->exe($sql);
            $this->assign('now_time',  gmtime());           // 当前系统时间
            $this -> display('template/' . C('WEB_STYLE') . '/ec/auction.html');
        }
        
    }
    
    /**
     * 取得某页的拍卖活动
     * @param   int     $size   每页记录数
     * @param   int     $page   当前页
     * @return  array
     */
    public function auction_list($size, $page)
    {
        $auction_list = array();
        $auction_list['finished'] = $auction_list['finished'] = array();
        
        
        $now = gmtime();
        $sql = "SELECT a.*, IFNULL(g.goods_thumb, '') AS goods_thumb " .
                "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') . " AS a " .
                    "LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g ON a.goods_id = g.goods_id " .
                "WHERE a.act_type = '" . GAT_AUCTION . "' " .
                "AND a.start_time <= '$now' AND a.end_time >= '$now' AND a.is_finished < 2 ORDER BY a.act_id DESC";
        $res = M()->selectLimit($sql, $size, ($page - 1) * $size);
        if(!empty($res))
        {
            foreach($res as $row)
            {
                $ext_info = unserialize($row['ext_info']);
                $auction = array_merge($row, $ext_info);
                $auction['status_no'] = auction_status($auction);
        
                $auction['start_time'] = local_date(C('ec_time_format'), $auction['start_time']);
                $auction['end_time']   = local_date(C('ec_time_format'), $auction['end_time']);
                $auction['formated_start_price'] = price_format($auction['start_price']);
                $auction['formated_end_price'] = price_format($auction['end_price']);
                $auction['formated_deposit'] = price_format($auction['deposit']);
                $auction['goods_thumb'] = get_image_path($row['goods_id'], $row['goods_thumb'], true);
                $auction['url'] = ec_build_uri('auction', array('auid'=>$auction['act_id']));
        
                if($auction['status_no'] < 2)
                {
                    $auction_list['under_way'][] = $auction;
                }
                else
                {
                    $auction_list['finished'][] = $auction;
                }
            }
        }
        $auction_list = @array_merge($auction_list['under_way'], $auction_list['finished']);

        return $auction_list;
    }
    
    /**
     * 取得拍卖活动数量
     * @return  int
     */
    public function auction_count()
    {
        $now = gmtime();
        $sql = "SELECT COUNT(*) " .
                "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') .
                "WHERE act_type = '" . GAT_AUCTION . "' " .
                "AND start_time <= '$now' AND end_time >= '$now' AND is_finished < 2";
    
        return M()->getOne($sql,'COUNT(*)');
    }

    
	
}
