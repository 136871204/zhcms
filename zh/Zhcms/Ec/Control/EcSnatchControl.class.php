<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcSnatchControl extends EcControl {
    
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
        //echo 'aaa';die;
    }
    
    public function index(){
        header("Content-type:text/html;charset=utf-8");
        $ecs=$GLOBALS['ec_globals']['ecs'];
        
        /*------------------------------------------------------ */
        //-- 如果用没有指定活动id，将页面重定向到即将结束的活动
        /*------------------------------------------------------ */
        if (empty($_REQUEST['act']))
        {
            //默认显示页面
            $_REQUEST['act'] = 'main';
        }
        /* 设置活动的SESSION */
        if (empty($_REQUEST['id']))
        {
            $id = $this -> get_last_snatch();
            if ($id)
            {
                $page = ec_build_uri('snatch', array('sid'=>$id));
                ec_header("Location: $page\n");
                exit;
            }
            else
            {
                /* 当前没有任何可默认的活动 */
                $id = 0;
            }
        }
        else
        {
           $id = intval($_REQUEST['id']);
        }
        
        
        /* 显示页面部分 */
        if ($_REQUEST['act'] == 'main')
        {
            $goods = $this -> get_snatch($id);
            
            if ($goods)
            {
                $position = assign_ur_here(0,$goods['snatch_name']);
                $myprice = $this -> get_myprice($id);
                
                if ($goods['is_end'])
                {
                    echo 'TODO:EcSnatchControl.class.php---2';die;
                }
                $this->assign('id',          $id);
                $this->assign('snatch_goods',       $goods); // 竞价商品
                $this->assign('myprice',     $this -> get_myprice($id));
                if ($goods['product_id'] > 0)
                {
                    $goods_specifications = get_specifications_list($goods['goods_id']);
                    $good_products = get_good_products($goods['goods_id'], 'AND product_id = ' . $goods['product_id']);
                    $_good_products = explode('|', $good_products[0]['goods_attr']);
                    $products_info = '';
                    foreach ($_good_products as $value)
                    {
                        $products_info .= ' ' . $goods_specifications[$value]['attr_name'] . '：' . $goods_specifications[$value]['attr_value'];
                    }
                    $this->assign('products_info',     $products_info);
                    unset($goods_specifications, $good_products, $_good_products,  $products_info);
            
                }
                
            }
            else
            {
                $this -> show_message('当前没有活动');
            }
            
            /* 调查 */
            $vote = get_vote();
            if (!empty($vote))
            {
                $this->assign('vote_id', $vote['id']);
                $this->assign('vote',    $vote['content']);
            }
            
            $this -> assign_template();
            $this->assign('page_title',  $position['title']);
            $this->assign('ur_here',     $position['ur_here']);
            $this->assign('categories',  get_categories_tree()); // 分类树
            $this->assign('helps',       get_shop_help());       // 网店帮助
            $this->assign('snatch_list', $this -> get_snatch_list());     //所有有效的夺宝奇兵列表
            $this->assign('price_list',  $this -> get_price_list($id));
            $this->assign('promotion_info', get_promotion_info());
            
            $this -> display('template/' . C('WEB_STYLE') . '/ec/snatch.html');
        }
        /* 最新出价列表 */
        if ($_REQUEST['act'] == 'new_price_list')
        {
            $this->assign('price_list',  $this -> get_price_list($id));
            $this -> display('template/' . C('WEB_STYLE') . '/ec/common/library/snatch_price.lbi');
        
            exit;
        }

    }
    
    /**
     * 取得当前活动的前n个出价
     *
     * @access  public
     * @param   int  $num  列表个数(取前5个)
     *
     * @return void
     */
    function get_price_list($id, $num = 5)
    {
        $sql = 'SELECT t1.log_id, t1.bid_price, t2.user_name 
                FROM '.$GLOBALS['ec_globals']['ecs']->table('ec_snatch_log').' AS t1, '.
                        $GLOBALS['ec_globals']['ecs']->table('ec_users')." AS t2 
                WHERE snatch_id = '$id' AND t1.user_id = t2.user_id ORDER BY t1.log_id DESC LIMIT $num";
        $res = M()->query($sql);
        $price_list = array();
        if(!empty($res))
        {
            foreach($res as $row)
            {
                $price_list[] = array('bid_price'=>price_format($row['bid_price'], false),'user_name'=>$row['user_name']);
            }
        }
        return $price_list;
    }

    
    /**
     * 取的最近的几次活动。
     *
     * @access  public
     * @param
     *
     * @return void
     */
    function get_snatch_list($num = 10)
    {
        $now = gmtime();
        $sql = 'SELECT act_id AS snatch_id, act_name AS snatch_name, end_time '.
               ' FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity').
               " WHERE start_time <= '$now' AND act_type=" . GAT_SNATCH .
               " ORDER BY end_time DESC LIMIT $num";
        $snatch_list = array();
        $overtime = 0;
        $res = M()->query($sql);
        if(!empty($res))
        {
            foreach($res as $row)
            {
                $overtime = $row['end_time'] > $now ? 0 : 1;
                $snatch_list[] = array(
                    'snatch_id' => $row['snatch_id'],
                    'snatch_name' => $row['snatch_name'],
                    'overtime' => $overtime,
                    'url'=>ec_build_uri('snatch', array('sid'=>$row['snatch_id']))
                                    );
            }
        }

        return $snatch_list;
    }
        
    /**
     * 取得用户对当前活动的所出过的价格
     *
     * @access  public
     * @param
     *
     * @return void
     */
    public function get_myprice($id)
    {
        $my_only_price  = array();
        $my_price       = array();
        $pay_points     = 0;
        $bid_price      = array();
        if (!empty($_SESSION['ec_user_id']))
        {
            echo 'TODO:EcSnatchControl.class.php---1';die;
        }
        /* 活动结束时间 */
        $sql = 'SELECT end_time FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_goods_activity').
               " WHERE act_id = '$id' AND act_type=" . GAT_SNATCH;
        $end_time = M()->getOne($sql,'end_time');
        $my_price = array(
            'pay_points'    => $pay_points,
            'bid_price'     => $bid_price,
            'is_end'        => gmtime() > $end_time
            );
    
        return $my_price;
    }
    
    
    /**
     * 取得当前活动信息
     *
     * @access  public
     *
     * @return 活动名称
     */
    public function get_snatch($id)
    {
        $sql = "SELECT g.goods_id, g.goods_sn, g.is_real, g.goods_name, g.extension_code, g.market_price, g.shop_price AS org_price, product_id, " .
                    "IFNULL(mp.user_price, g.shop_price * '$_SESSION[ec_discount]') AS shop_price, " .
                    "g.promote_price, g.promote_start_date, g.promote_end_date, g.goods_brief, g.goods_thumb, " .
                    "ga.act_name AS snatch_name, ga.start_time, ga.end_time, ga.ext_info, ga.act_desc AS `desc` ".
                "FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_goods_activity'). " AS ga " .
                "LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_goods')." AS g " .
                    "ON g.goods_id = ga.goods_id " .
                "LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . " AS mp " .
                    "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[ec_user_rank]' " .
                "WHERE ga.act_id = '$id' AND g.is_delete = 0";
        $goods = M()->GetRowSql($sql);
        
        if ($goods)
        {
          
            $promote_price          = bargain_price($goods['promote_price'], $goods['promote_start_date'], $goods['promote_end_date']);
            $goods['formated_market_price']  = price_format($goods['market_price']);
            $goods['formated_shop_price']    = price_format($goods['shop_price']);
            $goods['formated_promote_price'] = ($promote_price > 0) ? price_format($promote_price) : '';
            $goods['goods_thumb']   = get_image_path($goods['goods_id'], $goods['goods_thumb'], true);
            $goods['url']           = ec_build_uri('goods', array('gid'=>$goods['goods_id']), $goods['goods_name']);
            $goods['start_time']    = local_date(C('ec_time_format'), $goods['start_time']);
    
            $info = unserialize($goods['ext_info']);
            if ($info)
            {
                foreach ($info as $key => $val)
                {
                    $goods[$key] = $val;
                }
                $goods['is_end'] = gmtime() > $goods['end_time'];
                $goods['formated_start_price'] = price_format($goods['start_price']);
                $goods['formated_end_price'] = price_format($goods['end_price']);
                $goods['formated_max_price'] = price_format($goods['max_price']);
            }
            /* 将结束日期格式化为格林威治标准时间时间戳 */
            $goods['gmt_end_time']  = $goods['end_time'];
            $goods['end_time']      = local_date(C('ec_time_format'), $goods['end_time']);
            $goods['snatch_time']   = sprintf('本次活动从 %s 到 %s 截止', $goods['start_time'], $goods['end_time']);
            return $goods;
        }
        
    }
        
    /**
     * 获取最近要到期的活动id，没有则返回 0
     *
     * @access  public
     * @param
     *
     * @return void
     */
    public function get_last_snatch()
    {
        $now = gmtime();
        $sql = 'SELECT act_id FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity').
               " WHERE  start_time < '$now' AND end_time > '$now' AND act_type = " . GAT_SNATCH .
               " ORDER BY end_time ASC LIMIT 1";

        return M()->GetOne($sql,'act_id');
    }
    
    
	
}
