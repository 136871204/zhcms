<?php

/**
 * 将支付LOG插入数据表
 *
 * @access  public
 * @param   integer     $id         订单编号
 * @param   float       $amount     订单金额
 * @param   integer     $type       支付类型
 * @param   integer     $is_paid    是否已支付
 *
 * @return  int
 */
function insert_pay_log($id, $amount, $type = PAY_SURPLUS, $is_paid = 0)
{
    $sql = 'INSERT INTO ' .$GLOBALS['ec_globals']['ecs']->table('ec_pay_log')." (order_id, order_amount, order_type, is_paid)".
            " VALUES  ('$id', '$amount', '$type', '$is_paid')";
    $insert_id=M()->exe($sql);
    
    return $insert_id;
}



/**
 *  添加留言函数
 *
 * @access  public
 * @param   array       $message
 *
 * @return  boolen      $bool
 */
function add_message($message)
{
    $ec_upload_size_limit=C('ec_upload_size_limit');
    $ec_message_check=C('ec_message_check');
    $upload_size_limit = $ec_upload_size_limit == '-1' ? ini_get('upload_max_filesize') : $ec_upload_size_limit;
    $status = 1 - $ec_message_check;
    
    $last_char = strtolower($upload_size_limit{strlen($upload_size_limit)-1});
    
    switch ($last_char)
    {
        case 'm':
            $upload_size_limit *= 1024*1024;
            break;
        case 'k':
            $upload_size_limit *= 1024;
            break;
    }
    if ($message['upload'])
    {
        if($_FILES['message_img']['size'] / 1024 > $upload_size_limit)
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('文件大小超过了限制 %dKB', $upload_size_limit));
            return false;
        }
        $img_name = upload_file($_FILES['message_img'], 'feedbackimg');

        if ($img_name === false)
        {
            return false;
        }
    }
    else
    {
        $img_name = '';
    }
    if (empty($message['msg_title']))
    {
        $GLOBALS['ec_globals']['err']->add('留言标题为空');

        return false;
    }

    $message['msg_area'] = isset($message['msg_area']) ? intval($message['msg_area']) : 0;
    $sql = "INSERT INTO " . $GLOBALS['ec_globals']['ecs']->table('ec_feedback') .
            " (msg_id, parent_id, user_id, user_name, user_email, msg_title, msg_type, msg_status,  msg_content, msg_time, message_img, order_id, msg_area)".
            " VALUES (NULL, 0, '$message[user_id]', '$message[user_name]', '$message[user_email]', ".
            " '$message[msg_title]', '$message[msg_type]', '$status', '$message[msg_content]', '".gmtime()."', '$img_name', '$message[order_id]', '$message[msg_area]')";
    M()->exe($sql);

    return true;

}


/**
 * 添加商品标签
 *
 * @access  public
 * @param   integer     $id
 * @param   string      $tag
 * @return  void
 */
function add_tag($id, $tag)
{
    if (empty($tag))
    {
        return;
    }

    $arr = explode(',', $tag);

    foreach ($arr AS $val)
    {
        /* 检查是否重复 */
        $sql = "SELECT COUNT(*) FROM ". $GLOBALS['ec_globals']['ecs']->table("ec_tag").
                " WHERE user_id = '".$_SESSION['ec_user_id']."' AND goods_id = '$id' AND tag_words = '$val'";

        if (M()->getOne($sql,'COUNT(*)') == 0)
        {
            $sql = "INSERT INTO ".$GLOBALS['ec_globals']['ecs']->table("ec_tag")." (user_id, goods_id, tag_words) ".
                    "VALUES ('".$_SESSION['ec_user_id']."', '$id', '$val')";
            M()->exe($sql);
        }
    }
}


/**
 * 查询会员余额的操作记录
 *
 * @access  public
 * @param   int     $user_id    会员ID
 * @param   int     $num        每页显示数量
 * @param   int     $start      开始显示的条数
 * @return  array
 */
function get_account_log($user_id, $num, $start)
{
    $account_log = array();
    $sql = 'SELECT * FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_user_account').
           " WHERE user_id = '$user_id'" .
           " AND process_type " . db_create_in(array(SURPLUS_SAVE, SURPLUS_RETURN)) .
           " ORDER BY add_time DESC";
    $res = M()->selectLimit($sql, $num, $start);
    if ($res)
    {
        foreach($res as $rows)
        {
            $rows['add_time']         = local_date(C('ec_date_format'), $rows['add_time']);
            $rows['admin_note']       = nl2br(htmlspecialchars($rows['admin_note']));
            $rows['short_admin_note'] = ($rows['admin_note'] > '') ? sub_str($rows['admin_note'], 30) : 'N/A';
            $rows['user_note']        = nl2br(htmlspecialchars($rows['user_note']));
            $rows['short_user_note']  = ($rows['user_note'] > '') ? sub_str($rows['user_note'], 30) : 'N/A';
            $rows['pay_status']       = ($rows['is_paid'] == 0) ? '未确认' : '已完成';
            $rows['amount']           = price_format(abs($rows['amount']), false);
            
            /* 会员的操作类型： 冲值，提现 */
            if ($rows['process_type'] == 0)
            {
                $rows['type'] = '充值';
            }
            else
            {
                $rows['type'] = '提现';
            }

            /* 支付方式的ID */
            $sql = 'SELECT pay_id FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_payment').
                   " WHERE pay_name = '$rows[payment]' AND enabled = 1";
            $pid = M()->getOne($sql,'pay_id');

            /* 如果是预付款而且还没有付款, 允许付款 */
            if (($rows['is_paid'] == 0) && ($rows['process_type'] == 0))
            {
                $rows['handle'] = '<a href="user.php?act=pay&id='.$rows['id'].'&pid='.$pid.'">'.$GLOBALS['_LANG']['pay'].'</a>';
            }

            $account_log[] = $rows;

        }
        return $account_log;
    }else{
        return false;
    }
}

/**
 * 查询会员余额的数量
 * @access  public
 * @param   int     $user_id        会员ID
 * @return  int
 */
function get_user_surplus($user_id)
{
    $sql = "SELECT SUM(user_money) as tv FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_account_log').
           " WHERE user_id = '$user_id'";

    return M()->getOne($sql,'tv');
}



/**
 *  获取用户评论
 *
 * @access  public
 * @param   int     $user_id        用户id
 * @param   int     $page_size      列表最大数量
 * @param   int     $start          列表起始页
 * @return  array
 */
function get_comment_list($user_id, $page_size, $start)
{
    $sql = "SELECT c.*, g.goods_name AS cmt_name, r.content AS reply_content, r.add_time AS reply_time ".
           " FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_comment') . " AS c ".
                    " LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_comment') . " AS r ".
                        " ON r.parent_id = c.comment_id AND r.parent_id > 0 ".
                    " LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g ".
                        " ON c.comment_type=0 AND c.id_value = g.goods_id ".
            " WHERE c.user_id='$user_id'";
    $res = M()->SelectLimit($sql, $page_size, $start);

    $comments = array();
    $to_article = array();
    if(!empty($res))
    {
        foreach($res as $row)
        {
            $row['formated_add_time'] = local_date(C('ec_time_format'), $row['add_time']);
            if ($row['reply_time'])
            {
                $row['formated_reply_time'] = local_date(C('ec_time_format'), $row['reply_time']);
            }
            if ($row['comment_type'] == 1)
            {
                $to_article[] = $row["id_value"];
            }
            $comments[] = $row;
        }
    }

    if ($to_article)
    {
        $sql = "SELECT article_id , title FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_article') . " WHERE " . db_create_in($to_article, 'article_id');
        $arr = M()->getAll($sql);
        $to_cmt_name = array();
        if(!empty($arr))
        {
           foreach ($arr as $row)
            {
                $to_cmt_name[$row['article_id']] = $row['title'];
            } 
        }
        foreach ($comments as $key=>$row)
        {
            if ($row['comment_type'] == 1)
            {
                $comments[$key]['cmt_name'] = isset($to_cmt_name[$row['id_value']]) ? $to_cmt_name[$row['id_value']] : '';
            }
        }
    }

    return $comments;
}


/**
 *  获取某用户的缺货登记列表
 *
 * @access  public
 * @param   int     $user_id        用户ID
 * @param   int     $num            列表最大数量
 * @param   int     $start          列表其实位置
 *
 * @return  array   $booking
 */
function get_booking_list($user_id, $num, $start)
{
    $booking = array();
    $sql = "SELECT bg.rec_id, bg.goods_id, bg.goods_number, bg.booking_time, bg.dispose_note, g.goods_name ".
           "FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_booking_goods')." AS bg , " .
                    $GLOBALS['ec_globals']['ecs']->table('ec_goods')." AS g". 
           " WHERE bg.goods_id = g.goods_id AND bg.user_id = '$user_id' ORDER BY bg.booking_time DESC";
           
    $res = M()->SelectLimit($sql, $num, $start);


    if(!empty($res))
    {
        foreach($res as $row)
        {
            if (empty($row['dispose_note']))
            {
                $row['dispose_note'] = 'N/A';
            }
            $booking[] = array('rec_id'       => $row['rec_id'],
                               'goods_name'   => $row['goods_name'],
                               'goods_number' => $row['goods_number'],
                               'booking_time' => local_date(C('ec_date_format'), $row['booking_time']),
                               'dispose_note' => $row['dispose_note'],
                               'url'          => ec_build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']));
        }
    }
    return $booking;
}



/**
 *  获取用户的tags
 *
 * @access  public
 * @param   int         $user_id        用户ID
 *
 * @return array        $arr            tags列表
 */
function get_user_tags($user_id = 0)
{
    if (empty($user_id))
    {
        $GLOBALS['error_no'] = 1;

        return false;
    }

    $tags = get_tags(0, $user_id);

    if (!empty($tags))
    {
        color_tag($tags);
    }

    return $tags;
}




/**
 *  获取指定用户的留言
 *
 * @access  public
 * @param   int     $user_id        用户ID
 * @param   int     $user_name      用户名
 * @param   int     $num            列表最大数量
 * @param   int     $start          列表其实位置
 * @return  array   $msg            留言及回复列表
 * @return  string  $order_id       订单ID
 */
function get_message_list($user_id, $user_name, $num, $start, $order_id = 0)
{
    /* 获取留言数据 */
    $msg = array();
    $sql = "SELECT * FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_feedback');
    if ($order_id)
    {
        $sql .= " WHERE parent_id = 0 AND order_id = '$order_id' AND user_id = '$user_id' ORDER BY msg_time DESC";
    }
    else
    {
        $sql .= " WHERE parent_id = 0 AND user_id = '$user_id' AND user_name = '" . $_SESSION['ec_user_name'] . "' AND order_id=0 ORDER BY msg_time DESC";
    }

    $res = M()->SelectLimit($sql, $num, $start);

    /* 留言类型 */
    $_LANG['type'][M_MESSAGE] = '留言';
    $_LANG['type'][M_COMPLAINT] = '投诉';
    $_LANG['type'][M_ENQUIRY] = '询问';
    $_LANG['type'][M_CUSTOME] = '售后';
    $_LANG['type'][M_BUY] = '求购';
    $_LANG['type'][M_BUSINESS] = '商家留言';

    if(!empty($res))
    {
        foreach($res as $rows)
        {
            /* 取得留言的回复 */
            $reply = array();
            $sql   = "SELECT user_name, user_email, msg_time, msg_content".
                     " FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_feedback') .
                     " WHERE parent_id = '" . $rows['msg_id'] . "'";
            $reply = M()->getRowSql($sql);
            if ($reply)
            {
                $msg[$rows['msg_id']]['re_user_name']   = $reply['user_name'];
                $msg[$rows['msg_id']]['re_user_email']  = $reply['user_email'];
                $msg[$rows['msg_id']]['re_msg_time']    = local_date(C('ec_time_format'), $reply['msg_time']);
                $msg[$rows['msg_id']]['re_msg_content'] = nl2br(htmlspecialchars($reply['msg_content']));
            }
            $msg[$rows['msg_id']]['msg_content'] = nl2br(htmlspecialchars($rows['msg_content']));
            $msg[$rows['msg_id']]['msg_time']    = local_date(C('ec_time_format'), $rows['msg_time']);
            $msg[$rows['msg_id']]['msg_type']    = $order_id ? $rows['user_name'] : $_LANG['type'][$rows['msg_type']];
            $msg[$rows['msg_id']]['msg_title']   = nl2br(htmlspecialchars($rows['msg_title']));
            $msg[$rows['msg_id']]['message_img'] = EC_DATA_DIR.'/feedbackimg/'.$rows['message_img'];
            $msg[$rows['msg_id']]['order_id'] = $rows['order_id'];
        }
    }

    return $msg;
}



/**
 *  获取用户参与活动信息
 *
 * @access  public
 * @param   int     $user_id        用户id
 *
 * @return  array
 */
function get_user_prompt ($user_id)
{
    $prompt = array();
    $now = gmtime();
    /* 夺宝奇兵 */
    $sql = "SELECT act_id, goods_name, end_time " .
            "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') .
            " WHERE act_type = '" . GAT_SNATCH . "'" .
            " AND (is_finished = 1 OR (is_finished = 0 AND end_time <= '$now'))";
    $res = M()->query($sql);
    if(!empty($res))
    {
        foreach($res as $row)
        {
            $act_id = $row['act_id'];
            $result = get_snatch_result($act_id);
            if (isset($result['order_count']) && $result['order_count'] == 0 && $result['user_id'] == $user_id)
            {
                $prompt[] = array(
                       'text'=>sprintf('您夺宝奇兵竟拍到了<strong>%s</strong> ，现在去 <a href="snatch.php?act=main&amp;id=%s"><span style="color:#06c;text-decoration:underline;">购买</span></a>',
                                        $row['goods_name'], $row['act_id']),
                       'add_time'=> $row['end_time']
                );
            }
            if (isset($auction['last_bid']) && $auction['last_bid']['bid_user'] == $user_id && $auction['order_count'] == 0)
            {
                $prompt[] = array(
                    'text' => sprintf('您竟拍到了<strong>%s</strong> ，现在去 <a href="auction.php?act=view&amp;id=%s"><span style="color:#06c;text-decoration:underline;">购买</span></a>', 
                                    $row['goods_name'], $row['act_id']),
                    'add_time' => $row['end_time']
                );
            }
        
        } 
    }
    
    /* 竞拍 */
    $sql = "SELECT act_id, goods_name, end_time " .
            "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') .
            " WHERE act_type = '" . GAT_AUCTION . "'" .
            " AND (is_finished = 1 OR (is_finished = 0 AND end_time <= '$now'))";
    $res = M()->query($sql);
    if(!empty($res))
    {
        foreach($res as $row)
        {
            $act_id = $row['act_id'];
            $auction = auction_info($act_id);
            if (isset($auction['last_bid']) && $auction['last_bid']['bid_user'] == $user_id && $auction['order_count'] == 0)
            {
                $prompt[] = array(
                    'text' => sprintf('您竟拍到了<strong>%s</strong> ，现在去 <a href="auction.php?act=view&amp;id=%s"><span style="color:#06c;text-decoration:underline;">购买</span></a>', 
                                        $row['goods_name'], $row['act_id']),
                    'add_time' => $row['end_time']
                );
            }
            
        
        }
    }
    /* 排序 */
    $cmp = create_function('$a, $b', 'if($a["add_time"] == $b["add_time"]){return 0;};return $a["add_time"] < $b["add_time"] ? 1 : -1;');
    usort($prompt, $cmp);
    
    /* 格式化时间 */
    foreach ($prompt as $key => $val)
    {
        $prompt[$key]['formated_time'] = local_date(C('ec_time_format'), $val['add_time']);
    }
    return $prompt;
    
    
    
    
}


/**
 * 获取用户中心默认页面所需的数据
 *
 * @access  public
 * @param   int         $user_id            用户ID
 *
 * @return  array       $info               默认页面所需资料数组
 */
function get_user_default($user_id)
{
    $user_bonus = get_user_bonus();
    
    $sql = "SELECT pay_points, user_money, credit_line, last_login, is_validated 
            FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_users'). " WHERE user_id = '$user_id'";
    $row = M()->getRowSql($sql);
    $info = array();
    $info['username']  = stripslashes($_SESSION['ec_user_name']);
    $info['shop_name'] = C('ec_shop_name');
    $info['integral']  = $row['pay_points'] . C('ec_integral_name');
    /* 增加是否开启会员邮件验证开关 */
    $ec_member_email_validate=C('ec_member_email_validate');
    $info['is_validate'] = ($ec_member_email_validate && !$row['is_validated'])?0:1;
    $info['credit_line'] = $row['credit_line'];
    $info['formated_credit_line'] = price_format($info['credit_line'], false);
    
    //如果$_SESSION中时间无效说明用户是第一次登录。取当前登录时间。
    $last_time = !isset($_SESSION['ec_last_time']) ? $row['last_login'] : $_SESSION['ec_last_time'];
    if ($last_time == 0)
    {
        $_SESSION['ec_last_time'] = $last_time = gmtime();
    }
    $info['last_time'] = local_date(C('ec_time_format'), $last_time);
    $info['surplus']   = price_format($row['user_money'], false);
    $info['bonus']     = sprintf('共计 %d 个,价值 %s', $user_bonus['bonus_count'], price_format($user_bonus['bonus_value'], false));
    
    $sql = "SELECT COUNT(*) FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_order_info').
            " WHERE user_id = '" .$user_id. "' AND add_time > '" .local_strtotime('-1 months'). "'";
    $info['order_count'] = M()->getOne($sql,'COUNT(*)');
    
    $sql = "SELECT order_id, order_sn ".
            " FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_order_info').
            " WHERE user_id = '" .$user_id. "' AND shipping_time > '" .$last_time. "'". order_query_sql('shipped');
    $info['shipped_order'] = M()->getAll($sql);
    
    
    
    return $info;
}

/**
 * 取得用户等级信息
 * @access   public
 * @author   Xuan Yan
 *
 * @return array
 */
function get_rank_info()
{
    if (!empty($_SESSION['ec_user_rank']))
    {
        $sql = "SELECT rank_name, special_rank FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_user_rank') . " WHERE rank_id = '$_SESSION[ec_user_rank]'";
        $row = M()->getRowSql($sql);
        if (empty($row))
        {
            return array();
        }
        $rank_name = $row['rank_name'];
        if ($row['special_rank'])
        {
            return array('rank_name'=>$rank_name);
        }
        else
        {
            $user_rank = M()->getOne("SELECT rank_points FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_users') . " WHERE user_id = '$_SESSION[ec_user_id]'",'rank_points');
            $sql = "SELECT rank_name,min_points FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_user_rank') . " WHERE min_points > '$user_rank' ORDER BY min_points ASC LIMIT 1";
            $rt  = M()->getRowSql($sql);
            $next_rank_name = $rt['rank_name'];
            $next_rank = $rt['min_points'] - $user_rank;
            return array('rank_name'=>$rank_name,'next_rank_name'=>$next_rank_name,'next_rank'=>$next_rank);
        }
    }
    else
    {
        return array();
    }
}


/**
 *  获取指定用户的收藏商品列表
 *
 * @access  public
 * @param   int     $user_id        用户ID
 * @param   int     $num            列表最大数量
 * @param   int     $start          列表其实位置
 *
 * @return  array   $arr
 */
function get_collection_goods($user_id, $num = 10, $start = 0)
{
    $sql = 'SELECT g.goods_id, g.goods_name, g.market_price, g.shop_price AS org_price, '.
                "IFNULL(mp.user_price, g.shop_price * '$_SESSION[ec_discount]') AS shop_price, ".
                'g.promote_price, g.promote_start_date,g.promote_end_date, c.rec_id, c.is_attention' .
            ' FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_collect_goods') . ' AS c' .
            " LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g ".
                "ON g.goods_id = c.goods_id ".
            " LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . " AS mp ".
                "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[ec_user_rank]' ".
            " WHERE c.user_id = '$user_id' ORDER BY c.rec_id DESC";
    $res = M() -> selectLimit($sql, $num, $start);
    $goods_list = array();
    if(!empty($res))
    {
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
    
            $goods_list[$row['goods_id']]['rec_id']        = $row['rec_id'];
            $goods_list[$row['goods_id']]['is_attention']  = $row['is_attention'];
            $goods_list[$row['goods_id']]['goods_id']      = $row['goods_id'];
            $goods_list[$row['goods_id']]['goods_name']    = $row['goods_name'];
            $goods_list[$row['goods_id']]['market_price']  = price_format($row['market_price']);
            $goods_list[$row['goods_id']]['shop_price']    = price_format($row['shop_price']);
            $goods_list[$row['goods_id']]['promote_price'] = ($promote_price > 0) ? price_format($promote_price) : '';
            $goods_list[$row['goods_id']]['url']           = ec_build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']);
        }
    }
    return $goods_list;
}


/**
 * 标签着色
 *
 * @access   public
 * @param    array
 * @author   Xuan Yan
 *
 * @return   none
 */
function color_tag(&$tags)
{
    $tagmark = array(
        array('color'=>'#666666','size'=>'0.8em','ifbold'=>1),
        array('color'=>'#333333','size'=>'0.9em','ifbold'=>0),
        array('color'=>'#006699','size'=>'1.0em','ifbold'=>1),
        array('color'=>'#CC9900','size'=>'1.1em','ifbold'=>0),
        array('color'=>'#666633','size'=>'1.2em','ifbold'=>1),
        array('color'=>'#993300','size'=>'1.3em','ifbold'=>0),
        array('color'=>'#669933','size'=>'1.4em','ifbold'=>1),
        array('color'=>'#3366FF','size'=>'1.5em','ifbold'=>0),
        array('color'=>'#197B30','size'=>'1.6em','ifbold'=>1),
    );
    
    $maxlevel = count($tagmark);
    $tcount = $scount = array();
    
    foreach($tags AS $val)
    {
        $tcount[] = $val['tag_count']; // 获得tag个数数组
    }
    
    $tcount = array_unique($tcount); // 去除相同个数的tag
    
    sort($tcount); // 从小到大排序
    
    $tempcount = count($tcount); // 真正的tag级数
    $per = $maxlevel >= $tempcount ? 1 : $maxlevel / ($tempcount - 1);
    
    foreach ($tcount AS $key => $val)
    {
        $lvl = floor($per * $key);
        $scount[$val] = $lvl; // 计算不同个数的tag相对应的着色数组key
    }
    
    //$open_rewrite=C('open_rewrite');
    //$rewrite = C('open_rewrite')intval($GLOBALS['_CFG']['rewrite']) > 0;
    //TODO:rewrite全部关闭，暂时
    $rewrite=false;
    
    /* 遍历所有标签，根据引用次数设定字体大小 */
    foreach ($tags AS $key => $val)
    {
        $lvl = $scount[$val['tag_count']]; // 着色数组key

        $tags[$key]['color'] = $tagmark[$lvl]['color'];
        $tags[$key]['size']  = $tagmark[$lvl]['size'];
        $tags[$key]['bold']  = $tagmark[$lvl]['ifbold'];
        if ($rewrite)
        {
            if (strtolower(EC_CHARSET) !== 'utf-8')
            {
                $tags[$key]['url'] = 'tag-' . urlencode(urlencode($val['tag_words'])) . '.html';
            }
            else
            {
                $tags[$key]['url'] = 'tag-' . urlencode($val['tag_words']) . '.html';
            }
        }
        else
        {
            $tags[$key]['url'] = 'search.php?keywords=' . urlencode($val['tag_words']);
        }
    }
    shuffle($tags);
}