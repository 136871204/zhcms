<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcGroupBuyControl extends EcControl {
    
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
        //-- 团购商品 --> 团购活动商品列表
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'list')
        {
            /* 取得团购活动总数 */
            $count = $this -> group_buy_count();
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
                /* 取得当前页的团购活动 */
                $gb_list = $this ->group_buy_list($size, $page);
                $this->assign('gb_list',  $gb_list);
                
                /* 设置分页链接 */
                $pager = get_pager('group_buy.php', array('act' => 'list'), $count, $page, $size);
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
            //$this->assign('feed_url',         ($_CFG['rewrite'] == 1) ? "feed-typegroup_buy.xml" : 'feed.php?type=group_buy'); // RSS URL

            $this -> display('template/' . C('WEB_STYLE') . '/ec/group_buy_list.html');
        }

        /*------------------------------------------------------ */
        //-- 团购商品 --> 商品详情
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'view')
        {
            /* 取得参数：团购活动id */
            $group_buy_id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
            if ($group_buy_id <= 0)
            {
                ec_header("Location: ".U('ec/EcIndex/index')."\n");
                exit;
            }
            
            /* 取得团购活动信息 */
            $group_buy = group_buy_info($group_buy_id);
            
            if (empty($group_buy))
            {
                ec_header("Location: ".U('ec/EcIndex/index')."\n");
                exit;
            }
            $group_buy['gmt_end_date'] = $group_buy['end_date'];
            $this->assign('group_buy', $group_buy);
            
            /* 取得团购商品信息 */
            $goods_id = $group_buy['goods_id'];
            $goods = goods_info($goods_id);
            if (empty($goods))
            {
                ec_header("Location: ".U('ec/EcIndex/index')."\n");
                exit;
            }
            $goods['url'] = ec_build_uri('goods', array('gid' => $goods_id), $goods['goods_name']);
            $this->assign('gb_goods', $goods);
        
            /* 取得商品的规格 */
            $properties = get_goods_properties($goods_id);
            $this->assign('specification', $properties['spe']); // 商品规格
            
            $this -> assign_template();
            $position = assign_ur_here(0, $goods['goods_name']);
            $this->assign('page_title', $position['title']);    // 页面标题
            $this->assign('ur_here',    $position['ur_here']);  // 当前位置
            $this->assign('categories', get_categories_tree()); // 分类树
            $this->assign('helps',      get_shop_help());       // 网店帮助
            $this->assign('top_goods',  get_top10());           // 销售排行
            $this->assign('promotion_info', get_promotion_info());
            //assign_dynamic('group_buy_goods');
            
            
            //更新商品点击次数
            $sql = 'UPDATE ' . $ecs->table('ec_goods') . ' SET click_count = click_count + 1 '.
                   "WHERE goods_id = '" . $group_buy['goods_id'] . "'";
            M()->exe($sql);
           
            $this -> display('template/' . C('WEB_STYLE') . '/ec/group_buy_goods.html');
        }
                
    }
    
    /**
     * 取得某页的所有团购活动
     * @param   int     $size   每页记录数
     * @param   int     $page   当前页
     * @return  array
     */
    function group_buy_list($size, $page)
    {
        /* 取得团购活动 */
        $gb_list = array();
        $now = gmtime();
        $sql = "SELECT b.*, IFNULL(g.goods_thumb, '') AS goods_thumb, b.act_id AS group_buy_id, ".
                "b.start_time AS start_date, b.end_time AS end_date " .
            "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') . " AS b " .
                "LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g ON b.goods_id = g.goods_id " .
            "WHERE b.act_type = '" . GAT_GROUP_BUY . "' " .
            "AND b.start_time <= '$now' AND b.is_finished < 3 ORDER BY b.act_id DESC";
        $res = M()->selectLimit($sql, $size, ($page - 1) * $size);
        if(!empty($res))
        {
            foreach($res as $group_buy)
            {
                $ext_info = unserialize($group_buy['ext_info']);
                $group_buy = array_merge($group_buy, $ext_info);
                
                /* 格式化时间 */
                $group_buy['formated_start_date']   = local_date(C('ec_time_format'), $group_buy['start_date']);
                $group_buy['formated_end_date']     = local_date(C('ec_time_format'), $group_buy['end_date']);
                
                /* 格式化保证金 */
                $group_buy['formated_deposit'] = price_format($group_buy['deposit'], false);
                
                /* 处理价格阶梯 */
                $price_ladder = $group_buy['price_ladder'];
                if (!is_array($price_ladder) || empty($price_ladder))
                {
                    $price_ladder = array(array('amount' => 0, 'price' => 0));
                }
                else
                {
                    foreach ($price_ladder as $key => $amount_price)
                    {
                        $price_ladder[$key]['formated_price'] = price_format($amount_price['price']);
                    }
                }
                $group_buy['price_ladder'] = $price_ladder;
        
                /* 处理图片 */
                if (empty($group_buy['goods_thumb']))
                {
                    $group_buy['goods_thumb'] = get_image_path($group_buy['goods_id'], $group_buy['goods_thumb'], true);
                }
                /* 处理链接 */
                $group_buy['url'] = ec_build_uri('group_buy', array('gbid'=>$group_buy['group_buy_id']));
                /* 加入数组 */
                $gb_list[] = $group_buy;
            }
        }
        return $gb_list;
            
    }
        
    /* 取得团购活动总数 */
    function group_buy_count()
    {
        $now = gmtime();
        $sql = "SELECT COUNT(*) " .
                "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') .
                "WHERE act_type = '" . GAT_GROUP_BUY . "' " .
                "AND start_time <= '$now' AND is_finished < 3";
    
        return M()->getOne($sql,'COUNT(*)');
    }
    
	
}
