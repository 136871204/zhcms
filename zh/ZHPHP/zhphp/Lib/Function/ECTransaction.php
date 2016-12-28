<?php

/**
 * 删除一个收货地址
 *
 * @access  public
 * @param   integer $id
 * @return  boolean
 */
function drop_consignee($id)
{
    $sql = "SELECT user_id FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_user_address') . " WHERE address_id = '$id'";
    $uid = M()->getOne($sql,'user_id');

    if ($uid != $_SESSION['ec_user_id'])
    {
        return false;
    }
    else
    {
        $sql = "DELETE FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_user_address') . " WHERE address_id = '$id'";
        $res = M()->exe($sql);

        return $res;
    }
}



/**
 *  添加或更新指定用户收货地址
 *
 * @access  public
 * @param   array       $address
 * @return  bool
 */
function update_address($address)
{
    $address_id = intval($address['address_id']);
    unset($address['address_id']);

    if ($address_id > 0)
    {
         /* 更新指定记录 */
        M()->autoExecute($GLOBALS['ec_globals']['ecs']->table('ec_user_address'), $address, 'UPDATE', 'address_id = ' .$address_id . ' AND user_id = ' . $address['user_id']);
    }
    else
    {
        /* 插入一条新记录 */
        $address_id=M()->autoExecute($GLOBALS['ec_globals']['ecs']->table('ec_user_address'), $address, 'INSERT');
        //$address_id = $GLOBALS['db']->insert_id();
    }

    if (isset($address['defalut']) && $address['default'] > 0 && isset($address['user_id']))
    {
        $sql = "UPDATE ".$GLOBALS['ec_globals']['ecs']->table('ec_users') .
                " SET address_id = '".$address_id."' ".
                " WHERE user_id = '" .$address['user_id']. "'";
        M() ->exe($sql);
    }

    return true;
}


/**
 * 修改个人资料（Email, 性别，生日)
 *
 * @access  public
 * @param   array       $profile       array_keys(user_id int, email string, sex int, birthday string);
 *
 * @return  boolen      $bool
 */
function edit_profile($profile)
{
    if (empty($profile['user_id']))
    {
        $GLOBALS['ec_globals']['err']->add('您还没有登陆');

        return false;
    }
    
    $cfg = array();
    $cfg['username'] = M()->getOne("SELECT user_name FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_users') . " WHERE user_id='" . $profile['user_id'] . "'",'user_name');
    if (isset($profile['sex']))
    {
        $cfg['gender'] = intval($profile['sex']);
    }
    if (!empty($profile['email']))
    {
        if (!is_email($profile['email']))
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('%s 不是合法的email地址', $profile['email']));

            return false;
        }
        $cfg['email'] = $profile['email'];
    }
    if (!empty($profile['birthday']))
    {
        $cfg['bday'] = $profile['birthday'];
    }
    
    if (!$GLOBALS['ec_globals']['ec_user']->edit_user($cfg))
    {
        if ($GLOBALS['ec_globals']['ec_user']->error == ERR_EMAIL_EXISTS)
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('%s 已经存在', $profile['email']));
        }
        else
        {
            $GLOBALS['ec_globals']['err']->add('DB ERROR!');
        }

        return false;
    }
    
    /* 过滤非法的键值 */
    $other_key_array = array('msn', 'qq', 'office_phone', 'home_phone', 'mobile_phone');
    foreach ($profile['other'] as $key => $val)
    {
        //删除非法key值
        if (!in_array($key, $other_key_array))
        {
            unset($profile['other'][$key]);
        }
        else
        {
            $profile['other'][$key] =  htmlspecialchars(trim($val)); //防止用户输入javascript代码
        }
    }
    /* 修改在其他资料 */
    if (!empty($profile['other']))
    {
         M()->autoExecute($GLOBALS['ec_globals']['ecs']->table('ec_users'), $profile['other'], 'UPDATE', "user_id = '$profile[user_id]'");
    }
    return true;
}

/**
 * 保存用户的收货人信息
 * 如果收货人信息中的 id 为 0 则新增一个收货人信息
 *
 * @access  public
 * @param   array   $consignee
 * @param   boolean $default        是否将该收货人信息设置为默认收货人信息
 * @return  boolean
 */
function save_consignee($consignee, $default=false)
{
    if ($consignee['address_id'] > 0)
    {
        /* 修改地址 */
        $res = M()->autoExecute($GLOBALS['ec_globals']['ecs']->table('ec_user_address'), $consignee, 'UPDATE', 'address_id = ' . $consignee['address_id']." AND `user_id`= '".$_SESSION['ec_user_id']."'");
    }
    else
    {
        /* 添加地址 */
        $res = M()->autoExecute($GLOBALS['ec_globals']['ecs']->table('ec_user_address'), $consignee, 'INSERT');
        $consignee['address_id'] = $res;
    }

    if ($default)
    {
        /* 保存为用户的默认收货地址 */
        $sql = "UPDATE " . $GLOBALS['ec_globals']['ecs']->table('ec_users') .
            " SET address_id = '$consignee[address_id]' WHERE user_id = '$_SESSION[ec_user_id]'";

        $res = M()->exe($sql);
    }

    return $res !== false;
}


/**
 *
 * @access  public
 * @param   int         $user_id         用户ID
 * @param   int         $num             列表显示条数
 * @param   int         $start           显示起始位置
 *
 * @return  array       $arr             红保列表
 */
function get_user_bouns_list($user_id, $num = 10, $start = 0)
{
    $sql = "SELECT u.bonus_sn, u.order_id, b.type_name, b.type_money, b.min_goods_amount, b.use_start_date, b.use_end_date ".
           " FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_user_bonus'). " AS u ,".
           $GLOBALS['ec_globals']['ecs']->table('ec_bonus_type'). " AS b".
           " WHERE u.bonus_type_id = b.type_id AND u.user_id = '" .$user_id. "'";
    $res = M()->selectLimit($sql, $num, $start);
    $arr = array();

    $day = getdate();
    $cur_date = local_mktime(23, 59, 59, $day['mon'], $day['mday'], $day['year']);
    
    $_LANG['not_start'] = '未开始';
    $_LANG['overdue'] = '已过期';
    $_LANG['not_use'] = '未使用';
    $_LANG['had_use'] = '已使用';


    if(!empty($res))
    {
        foreach($res as $row)
        {
            /* 先判断是否被使用，然后判断是否开始或过期 */
            if (empty($row['order_id']))
            {
                /* 没有被使用 */
                if ($row['use_start_date'] > $cur_date)
                {
                    $row['status'] = $_LANG['not_start'];
                }
                else if ($row['use_end_date'] < $cur_date)
                {
                    $row['status'] = $_LANG['overdue'];
                }
                else
                {
                    $row['status'] = $_LANG['not_use'];
                }
            }
            else
            {
                $row['status'] = '<a href="user.php?act=order_detail&order_id=' .$row['order_id']. '" >' .$_LANG['had_use']. '</a>';
            }
    
            $row['use_startdate']   = local_date(C('ec_date_format'), $row['use_start_date']);
            $row['use_enddate']     = local_date(C('ec_date_format'), $row['use_end_date']);
    
            $arr[] = $row;
        }
    }
    return $arr;
}


/**
 * 取得收货人地址列表
 * @param   int     $user_id    用户编号
 * @return  array
 */
function get_consignee_list($user_id)
{
    $sql = "SELECT * FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_user_address') .
            " WHERE user_id = '$user_id' LIMIT 5";

    return M()->getAll($sql);
}



/**
 *  获取用户可以和并的订单数组
 *
 * @access  public
 * @param   int         $user_id        用户ID
 *
 * @return  array       $merge          可合并订单数组
 */
function get_user_merge($user_id)
{
    $sql  = "SELECT order_sn FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_order_info') .
            " WHERE user_id  = '$user_id' " . order_query_sql('unprocessed') .
                "AND extension_code = '' ".
            " ORDER BY add_time DESC";
    $list = M()->GetCol($sql,'order_sn');
    $merge = array();
    if(!empty($list))
    {
        foreach ($list as $val)
        {
            $merge[$val] = $val;
        }
    }
    return $merge;
}



/**
 *  获取用户指定范围的订单列表
 *
 * @access  public
 * @param   int         $user_id        用户ID号
 * @param   int         $num            列表最大数量
 * @param   int         $start          列表起始位置
 * @return  array       $order_list     订单列表
 */
function get_user_orders($user_id, $num = 10, $start = 0)
{
    /* 取得订单列表 */
    $arr    = array();

    $sql = "SELECT order_id, order_sn, order_status, shipping_status, pay_status, add_time, " .
           "(goods_amount + shipping_fee + insure_fee + pay_fee + pack_fee + card_fee + tax - discount) AS total_fee ".
           " FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_order_info') .
           " WHERE user_id = '$user_id' ORDER BY add_time DESC";
    $res = M()->SelectLimit($sql, $num, $start);
    
    if(!empty($res))
    {
        /* 订单状态 */
        $_LANG['os'][OS_UNCONFIRMED] = '未确认';
        $_LANG['os'][OS_CONFIRMED] = '已确认';
        $_LANG['os'][OS_SPLITED] = '已确认';
        $_LANG['os'][OS_SPLITING_PART] = '已确认';
        $_LANG['os'][OS_CANCELED] = '已取消';
        $_LANG['os'][OS_INVALID] = '无效';
        $_LANG['os'][OS_RETURNED] = '退货';
        
        $_LANG['ss'][SS_UNSHIPPED] = '未发货';
        $_LANG['ss'][SS_PREPARING] = '配货中';
        $_LANG['ss'][SS_SHIPPED] = '已发货';
        $_LANG['ss'][SS_RECEIVED] = '收货确认';
        $_LANG['ss'][SS_SHIPPED_PART] = '已发货(部分商品)';
        $_LANG['ss'][SS_SHIPPED_ING] = '配货中'; // 已分单
        
        $_LANG['ps'][PS_UNPAYED] = '未付款';
        $_LANG['ps'][PS_PAYING] = '付款中';
        $_LANG['ps'][PS_PAYED] = '已付款';

        foreach($res as $row)
        {
            if ($row['order_status'] == OS_UNCONFIRMED)// 未确认
            {
                $row['handler'] = "<a href=\"user.php?act=cancel_order&order_id=" .$row['order_id']. "\" onclick=\"if (!confirm('您确认要取消该订单吗？取消后此订单将视为无效订单')) return false;\">取消</a>";
            }
            else if ($row['order_status'] == OS_SPLITED)// 已分单
            {
                /* 对配送状态的处理 */
                if ($row['shipping_status'] == SS_SHIPPED)// 已发货
                {
                    @$row['handler'] = "<a href=\"user.php?act=affirm_received&order_id=" .$row['order_id']. "\" onclick=\"if (!confirm('你确认已经收到货物了吗？')) return false;\">确认收货</a>";
                }
                elseif ($row['shipping_status'] == SS_RECEIVED)// 已收货
                {
                    @$row['handler'] = '<span style="color:red">已完成</span>';
                }
                else
                {
                    if ($row['pay_status'] == PS_UNPAYED)//未付款
                    {
                        @$row['handler'] = "<a href=\"user.php?act=order_detail&order_id=" .$row['order_id']. '">付款</a>';
                    }
                    else
                    {
                        @$row['handler'] = "<a href=\"user.php?act=order_detail&order_id=" .$row['order_id']. '">查看订单</a>';
                    }
                }
            }
            else
            {
                $row['handler'] = '<span style="color:red">'.$_LANG['os'][$row['order_status']] .'</span>';
            }
            $row['shipping_status'] = ($row['shipping_status'] == SS_SHIPPED_ING) ? SS_PREPARING : $row['shipping_status'];
            $row['order_status'] = $_LANG['os'][$row['order_status']] . ',' . $_LANG['ps'][$row['pay_status']] . ',' . $_LANG['ss'][$row['shipping_status']];
    
            $arr[] = array('order_id'       => $row['order_id'],
                           'order_sn'       => $row['order_sn'],
                           'order_time'     => local_date(C('ec_time_format'), $row['add_time']),
                           'order_status'   => $row['order_status'],
                           'total_fee'      => price_format($row['total_fee'], false),
                           'handler'        => $row['handler']);
                       
        }
    }
    return $arr;
}



/**
 * 获取用户帐号信息
 *
 * @access  public
 * @param   int       $user_id        用户user_id
 *
 * @return void
 */
function get_profile($user_id)
{
    $user=$GLOBALS['ec_globals']['ec_user'];
    /* 会员帐号信息 */
    $info  = array();
    $infos = array();
    $sql  = "SELECT user_name, birthday, sex, question, answer, rank_points, pay_points,user_money, user_rank,".
             " msn, qq, office_phone, home_phone, mobile_phone, passwd_question, passwd_answer ".
           "FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_users') . " WHERE user_id = '$user_id'";
    $infos = M()->getRowSql($sql);
    $infos['user_name'] = addslashes($infos['user_name']);
    $row = $user->get_profile_by_name($infos['user_name']); //获取用户帐号信息
    $_SESSION['ec_email'] = $row['email'];    //注册SESSION
    
    /* 会员等级 */
    if ($infos['user_rank'] > 0)
    {
        $sql = "SELECT rank_id, rank_name, discount FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_user_rank') .
               " WHERE rank_id = '$infos[user_rank]'";
    }
    else
    {
        $sql = "SELECT rank_id, rank_name, discount, min_points".
               " FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_user_rank') .
               " WHERE min_points<= " . intval($infos['rank_points']) . " ORDER BY min_points DESC";
    }

    if ($row = M()->getRowSql($sql))
    {
        $info['rank_name']     = $row['rank_name'];
    }
    else
    {
        $info['rank_name'] = $GLOBALS['_LANG']['undifine_rank'];
    }
    
    $cur_date = date('Y-m-d H:i:s');
    
    /* 会员红包 */
    $bonus = array();
    $sql = "SELECT type_name, type_money ".
           "FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_bonus_type') . " AS t1, " .
                    $GLOBALS['ec_globals']['ecs']->table('ec_user_bonus') . " AS t2 ".
           "WHERE t1.type_id = t2.bonus_type_id AND t2.user_id = '$user_id' AND t1.use_start_date <= '$cur_date' ".
           "AND t1.use_end_date > '$cur_date' AND t2.order_id = 0";
    $bonus = M()->getAll($sql);
    if ($bonus)
    {
        for ($i = 0, $count = count($bonus); $i < $count; $i++)
        {
            $bonus[$i]['type_money'] = price_format($bonus[$i]['type_money'], false);
        }
    }
    $info['discount']    = $_SESSION['ec_discount'] * 100 . "%";
    $info['email']       = $_SESSION['ec_email'];
    $info['user_name']   = $_SESSION['ec_user_name'];
    
    $info['rank_points'] = isset($infos['rank_points']) ? $infos['rank_points'] : '';
    $info['pay_points']  = isset($infos['pay_points'])  ? $infos['pay_points']  : 0;
    $info['user_money']  = isset($infos['user_money'])  ? $infos['user_money']  : 0;
    $info['sex']         = isset($infos['sex'])      ? $infos['sex']      : 0;
    $info['birthday']    = isset($infos['birthday']) ? $infos['birthday'] : '';
    $info['question']    = isset($infos['question']) ? htmlspecialchars($infos['question']) : '';
    
    
    $info['user_money']  = price_format($info['user_money'], false);
    $info['pay_points']  = $info['pay_points'] .C('ec_integral_name');
    $info['bonus']       = $bonus;
    $info['qq']          = $infos['qq'];
    $info['msn']          = $infos['msn'];
    $info['office_phone']= $infos['office_phone'];
    $info['home_phone']   = $infos['home_phone'];
    $info['mobile_phone'] = $infos['mobile_phone'];
    $info['passwd_question'] = $infos['passwd_question'];
    $info['passwd_answer'] = $infos['passwd_answer'];

    return $info;
    
    
}