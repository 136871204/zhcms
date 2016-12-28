<?php


/**
 * 调用商品购买记录
 *
 * @access  public
 * @return  string
 */
function insert_bought_notes($arr)
{
    /* 商品购买记录 */
    $sql = 'SELECT u.user_name, og.goods_number, oi.add_time, IF(oi.order_status IN (2, 3, 4), 0, 1) AS order_status ' .
           'FROM ' . 
                    $GLOBALS['ec_globals']['ecs']->table('ec_order_info') . ' AS oi LEFT JOIN ' . 
                    $GLOBALS['ec_globals']['ecs']->table('ec_users') . ' AS u ON oi.user_id = u.user_id, ' . 
                    $GLOBALS['ec_globals']['ecs']->table('ec_order_goods') . ' AS og ' .
           'WHERE 
                    oi.order_id = og.order_id AND ' . time() . ' - oi.add_time < 2592000 AND 
                    og.goods_id = ' . $arr['id'] . ' ORDER BY oi.add_time DESC LIMIT 5';
    $bought_notes = M()->getAll($sql);
    if(!empty($bought_notes))
    {
        foreach ($bought_notes as $key => $val)
        {
            $bought_notes[$key]['add_time'] = local_date("Y-m-d G:i:s", $val['add_time']);
        }
    }
    $sql = 'SELECT count(*) ' .
           'FROM ' . 
                    $GLOBALS['ec_globals']['ecs']->table('ec_order_info') . ' AS oi LEFT JOIN ' . 
                    $GLOBALS['ec_globals']['ecs']->table('ec_users') . ' AS u ON oi.user_id = u.user_id, ' . 
                    $GLOBALS['ec_globals']['ecs']->table('ec_order_goods') . ' AS og ' .
           'WHERE oi.order_id = og.order_id AND ' . time() . ' - oi.add_time < 2592000 AND og.goods_id = ' . $arr['id'];
    $count = M()->getOne($sql,'count(*)');
    p($bought_notes);die;

}




/**
 * 调用浏览历史
 *
 * @access  public
 * @return  string
 */
function insert_history()
{
    $db_prefix=C('DB_PREFIX');
    $str = '';
    if (!empty($_COOKIE['ECS']['history']))
    {
        $where = db_create_in($_COOKIE['ECS']['history'], 'goods_id');
        $sql   = 'SELECT 
                    goods_id, goods_name, goods_thumb, shop_price 
                FROM ' . $db_prefix.'ec_goods' .
                " WHERE $where AND is_on_sale = 1 AND is_alone_sale = 1 AND is_delete = 0";
        $query = M()->query($sql);
        $res = array();
        if(!empty($query)){
            foreach($query as $row){
                $goods['goods_id'] = $row['goods_id'];
                $goods['goods_name'] = $row['goods_name'];
                if( C('EC_GOODS_NAME_LENGTH') > 0 ){
                    $goods['short_name']= sub_str($row['goods_name'], C('EC_GOODS_NAME_LENGTH')) ;
                }else{
                    $goods['short_name']=$row['goods_name'];
                }
                $goods['goods_thumb'] = get_image_path($row['goods_id'], $row['goods_thumb'], true);
                $goods['shop_price'] = price_format($row['shop_price']);
                $goods['url'] = ec_build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']);
                $str.='<ul class="clearfix">
                            <li class="goodsimg">
                                <a href="'.$goods['url'].'" target="_blank">
                                    <img src="'.$goods['goods_thumb'].'" alt="'.$goods['goods_name'].'" class="B_blue" />
                                </a>
                            </li>
                            <li class="htext">
                                <a href="'.$goods['url'].'" target="_blank" title="'.$goods['goods_name'].'">'.
                                    $goods['short_name'].
                                '</a>
                                <br />'.'本店售价'.'<font class="f1">'.$goods['shop_price'].'</font><br />
                            </li>
                        </ul>';
            }
        }
        $str .= '<ul id="clear_history"><a onclick="clear_history()">' . '清空'  . '</a></ul>';
    }
    return $str;
}



/**
 * 调用指定的广告位的广告
 *
 * @access  public
 * @param   integer $id     广告位ID
 * @param   integer $num    广告数量
 * @return  string
 */
function insert_ads($arr)
{
    //var_dump($arr);die;
    static $static_res = NULL;
    $time = gmtime();
    if (!empty($arr['num']) && $arr['num'] != 1){
        echo 'insert_ads++1';
    }else{
        if ($static_res[$arr['id']] === NULL){
            $sql  = 'SELECT 
                            a.ad_id, a.position_id, a.media_type, a.ad_link, a.ad_code, a.ad_name, 
                            p.ad_width, '.'p.ad_height, p.position_style, RAND() AS rnd ' .
                    'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_ad') . ' AS a '.
                    'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_ad_position') . ' AS p ON a.position_id = p.position_id ' .
                    "WHERE enabled = 1 AND a.position_id = '" . $arr['id'] .
                        "' AND start_time <= '" . $time . "' AND end_time >= '" . $time . "' " .
                    'ORDER BY rnd LIMIT 1';
                    //p($sql);die;
            $static_res[$arr['id']] =M()->query($sql);
        }
        $res = $static_res[$arr['id']];
    }
    $ads = array();
    $position_style = '';
    foreach ($res AS $row){
        
    }
    $position_style = 'str:' . $position_style;
    
    //p($ads);die;
    //echo 'aaaa';die;
    
}



/**
 * 调用会员信息
 *
 * @access  public
 * @return  string
 */
function insert_member_info()
{
    $output="";
    //p($_SESSION);die;
    if ($_SESSION['ec_user_id'] > 0)
    {
        $user_info=get_user_info();
        //echo 'TODO:insert_member_info()--1';die;
    }else{
        if (!empty($_COOKIE['ECS']['ec_username']))
        {
            $ecs_username=stripslashes($_COOKIE['ECS']['ec_username']);
        }
        //$captcha = intval($GLOBALS['_CFG']['captcha']);
        $captcha=true;
        /*if (    
            ($captcha & CAPTCHA_LOGIN) && 
            (!($captcha & CAPTCHA_LOGIN_FAIL) || 
            (($captcha & CAPTCHA_LOGIN_FAIL) && 
            $_SESSION['login_fail'] > 2)) && gd_version() > 0)
        {
            $GLOBALS['smarty']->assign('enabled_captcha', 1);
            $GLOBALS['smarty']->assign('rand', mt_rand());
        }*/
        $enabled_captcha=1;
        $rand=mt_rand();
        //$captcha = intval($GLOBALS['_CFG']['captcha']);
    }
    if($user_info){
        $output.='你好，<a href="'.U('ec/EcUser/index').'">'.$user_info['username'].'</a> |';
        $output.='<a href="'.U('ec/EcUser/index',array('act'=>'logout')).'">退出</a> |';
    }else{
        $output.='欢迎光临本店，<a href="index.php?a=ec&c=EcUser&m=index">登录</a> | <a  href="index.php?a=ec&c=EcUser&m=index&act=register">注册</a> |';
    }
    echo  $output;
}

/**
 * 调用购物车信息
 *
 * @access  public
 * @return  string
 */
function insert_cart_info()
{
    $db_prefix=C('DB_PREFIX');
    $sql = 'SELECT SUM(goods_number) AS number, SUM(goods_price * goods_number) AS amount' .
           ' FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_cart') .
           " WHERE session_id = '" . SESS_ID . "' AND rec_type = '" . CART_GENERAL_GOODS . "'";
    $row = M()->GetRowSql($sql);
   // p($row);die;
    $number=empty($row['number'])?0:intval($row['number']);
    $number=empty($row['amount'])?0:floatval($row['number']);
    if ($row)
    {
        $number = intval($row['number']);
        $amount = floatval($row['amount']);
    }
    else
    {
        $number = 0;
        $amount = 0;
    }

    $str = sprintf('カードには %d 点の商品があり，総計金額 %s。', $number, price_format($amount, false));

    return '<a href="'.U('ec/EcFlow/index').'" title="' . 'カードを見る' . '">' . $str . '</a>';
}


/**
 * 调用在线调查信息
 *
 * @access  public
 * @return  string
 */
function insert_vote()
{
    $vote = get_vote();
    $file = ROOT_PATH.'template/'.C('WEB_STYLE') . '/ec/library/vote.lbi';
    //echo $file;

    $view = new ViewZh();
    
    if (!empty($vote))
    {
        $view->assign('vote_id',     $vote['id']);
        $view->assign('vote',        $vote['content']);
    }
   
    return $view->fetch($file);

}