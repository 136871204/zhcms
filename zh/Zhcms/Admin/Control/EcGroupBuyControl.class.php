<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcGroupBuyControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    /*$image = new EcImage(C('ec_bgcolor'));
	    $tdb=M();
        $exc = new exchange($ecs->table("ec_card"), $tdb, 'card_id', 'card_name');*/
        /* act操作项的初始化 */
        if (empty($_REQUEST['act']))
        {
            $_REQUEST['act'] = 'list';
        }
        else
        {
            $_REQUEST['act'] = trim($_REQUEST['act']);
        }
        
        /*------------------------------------------------------ */
        //-- 团购活动列表
        /*------------------------------------------------------ */
        
        if ($_REQUEST['act'] == 'list')
        {
            /* 模板赋值 */
            $this->assign('full_page',    1);
            $this->assign('ur_here',      '团购活动列表');
            $this->assign('action_link',  array('href' => U('index',array('act'=>'add')), 'text' => '添加团购活动'));
        
            $list = $this -> group_buy_list();
        
            $this->assign('group_buy_list',   $list['item']);
            $this->assign('filter',           $list['filter']);
            $this->assign('record_count',     $list['record_count']);
            $this->assign('page_count',       $list['page_count']);
        
            $sort_flag  = sort_flag($list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            /* 显示商品列表页面 */
            //assign_query_info();
            $this->display('group_buy_list.htm');
        }
        elseif ($_REQUEST['act'] == 'query')
        {
            $list = $this->group_buy_list();
        
            $this->assign('group_buy_list', $list['item']);
            $this->assign('filter',         $list['filter']);
            $this->assign('record_count',   $list['record_count']);
            $this->assign('page_count',     $list['page_count']);
        
            $sort_flag  = sort_flag($list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('group_buy_list.htm'), '',
                array('filter' => $list['filter'], 'page_count' => $list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 添加/编辑团购活动
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit')
        {
            /* 初始化/取得团购活动信息 */
            if ($_REQUEST['act'] == 'add')
            {
                $group_buy = array(
                    'act_id'  => 0,
                    'start_time'    => date('Y-m-d', time() + 86400),
                    'end_time'      => date('Y-m-d', time() + 4 * 86400),
                    'price_ladder'  => array(array('amount' => 0, 'price' => 0))
                );
            }
            else
            {
                $group_buy_id = intval($_REQUEST['id']);
                if ($group_buy_id <= 0)
                {
                    die('参数错误');
                }
                $group_buy = group_buy_info($group_buy_id);
            }
            $this->assign('group_buy', $group_buy);
        
            /* 模板赋值 */
            $this->assign('ur_here', '添加团购活动');
            $this->assign('action_link', $this-> list_link($_REQUEST['act'] == 'add'));
            $this->assign('cat_list', cat_list());
            $this->assign('brand_list', get_brand_list());
        
            /* 显示模板 */
            //assign_query_info();
            $this->display('group_buy_info.htm');
        }
        /*------------------------------------------------------ */
        //-- 添加/编辑团购活动的提交
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] =='insert_update')
        {
            /* 取得团购活动id */
            $group_buy_id = intval($_POST['act_id']);
            if (isset($_POST['finish']) || isset($_POST['succeed']) || isset($_POST['fail']) || isset($_POST['mail']))
            {
                if ($group_buy_id <= 0)
                {
                    $this->sys_msg('您要操作的团购活动不存在', 1);
                }
                $group_buy = group_buy_info($group_buy_id);
                if (empty($group_buy))
                {
                    $this->sys_msg('您要操作的团购活动不存在', 1);
                }
            }
    
            if (isset($_POST['finish']))
            {
                /* 判断订单状态 */
                if ($group_buy['status'] != GBS_UNDER_WAY)
                {
                    $this->sys_msg('当前状态不能执行该操作！', 1);
                }
                
                /* 结束团购活动，修改结束时间为当前时间 */
                $sql = "UPDATE " . $ecs->table('ec_goods_activity') .
                        " SET end_time = '" . gmtime() . "' " .
                        "WHERE act_id = '$group_buy_id' LIMIT 1";
                M()->exe($sql);
        
                /* 清除缓存 */
                clear_cache_files();
        
                /* 提示信息 */
                $links = array(
                    array('href' => U('index',array('act'=>'list')), 'text' => '返回列表')
                );
                $this->sys_msg('编辑团购活动成功。', 0, $links);
            }
            elseif (isset($_POST['succeed']))
            {
                /* 设置活动成功 */
                /* 判断订单状态 */
                if ($group_buy['status'] != GBS_FINISHED)
                {
                    $this->sys_msg('当前状态不能执行该操作！', 1);
                }
                
                /* 如果有订单，更新订单信息 */
                if ($group_buy['total_order'] > 0)
                {
                    /* 查找该团购活动的已确认或未确认订单（已取消的就不管了） */
                    $sql = "SELECT order_id " .
                            "FROM " . $ecs->table('ec_order_info') .
                            " WHERE extension_code = 'group_buy' " .
                            "AND extension_id = '$group_buy_id' " .
                            "AND (order_status = '" . OS_CONFIRMED . "' or order_status = '" . OS_UNCONFIRMED . "')";
                    $order_id_list = M()->getCol($sql,'order_id');
                    
                    /* 更新订单商品价 */
                    $final_price = $group_buy['trans_price'];
                    $sql = "UPDATE " . $ecs->table('ec_order_goods') .
                            " SET goods_price = '$final_price' " .
                            "WHERE order_id " . db_create_in($order_id_list);
                    M()->exe($sql);
                    
                    /* 查询订单商品总额 */
                    $sql = "SELECT order_id, SUM(goods_number * goods_price) AS goods_amount " .
                            "FROM " . $ecs->table('ec_order_goods') .
                            " WHERE order_id " . db_create_in($order_id_list) .
                            " GROUP BY order_id";
                    $res = M()->query($sql);
                    if(!empty($res)){
                        foreach($res as $row)
                        {
                            $order_id = $row['order_id'];
                            $goods_amount = floatval($row['goods_amount']);
                            
                            /* 取得订单信息 */
                            $order = order_info($order_id);
                            
                            /* 判断订单是否有效：余额支付金额 + 已付款金额 >= 保证金 */
                            if ($order['surplus'] + $order['money_paid'] >= $group_buy['deposit'])
                            {
                                /* 有效，设为已确认，更新订单 */
                                
                                // 更新商品总额
                                $order['goods_amount'] = $goods_amount;
                                
                                // 如果保价，重新计算保价费用
                                if ($order['insure_fee'] > 0)
                                {
                                    $shipping = shipping_info($order['shipping_id']);
                                    $order['insure_fee'] = shipping_insure_fee($shipping['shipping_code'], $goods_amount, $shipping['insure']);
                                }
                                
                                // 重算支付费用
                                $order['order_amount'] = $order['goods_amount'] + $order['shipping_fee']
                                                        + $order['insure_fee'] + $order['pack_fee'] + $order['card_fee']
                                                        - $order['money_paid'] - $order['surplus'];
                        
                                if ($order['order_amount'] > 0)
                                {
                                    $order['pay_fee'] = pay_fee($order['pay_id'], $order['order_amount']);
                                }
                                else
                                {
                                    $order['pay_fee'] = 0;
                                }
                                
                                // 计算应付款金额
                                $order['order_amount'] += $order['pay_fee'];
                                
                                // 计算付款状态
                                if ($order['order_amount'] > 0)
                                {
                                    $order['pay_status'] = PS_UNPAYED;
                                    $order['pay_time'] = 0;
                                }
                                else
                                {
                                    $order['pay_status'] = PS_PAYED;
                                    $order['pay_time'] = gmtime();
                                }
                                
                                // 如果需要退款，退到帐户余额
                                if ($order['order_amount'] < 0)
                                {
                                    // todo （现在手工退款）
                                }
            
                                // 订单状态
                                $order['order_status'] = OS_CONFIRMED;
                                $order['confirm_time'] = gmtime();
            
                                // 更新订单
                                $order = addslashes_deep($order);
                                update_order($order_id, $order);
                            }
                            else
                            {
                                /* 无效，取消订单，退回已付款 */
                                // 修改订单状态为已取消，付款状态为未付款
                                $order['order_status'] = OS_CANCELED;
                                $order['to_buyer'] = '团购失败';
                                $order['pay_status'] = PS_UNPAYED;
                                $order['pay_time'] = 0;
                                
                                /* 如果使用余额或有已付款金额，退回帐户余额 */
                                $money = $order['surplus'] + $order['money_paid'];
                                if ($money > 0)
                                {
                                    $order['surplus'] = 0;
                                    $order['money_paid'] = 0;
                                    $order['order_amount'] = $money;
                                    
                                    // 退款到帐户余额
                                    order_refund($order, 1, '团购失败' . ':' . $order['order_sn']);
                                }
                                
                                /* 更新订单 */
                                $order = addslashes_deep($order);
                                update_order($order['order_id'], $order);
                            }
                        }
                    }
                }
                /* 修改团购活动状态为成功 */
                $sql = "UPDATE " . $ecs->table('ec_goods_activity') .
                        " SET is_finished = '" . GBS_SUCCEED . "' " .
                        "WHERE act_id = '$group_buy_id' LIMIT 1";
                M()->exe($sql);
                
                /* 清除缓存 */
                clear_cache_files();
        
                /* 提示信息 */
                $links = array(
                    array('href' => U('index',array('act'=>'list')), 'text' => '返回列表')
                );
                $this -> sys_msg('编辑团购活动成功。', 0, $links);
            }
            elseif (isset($_POST['fail']))
            {
                /* 设置活动失败 */
                
                /* 判断订单状态 */
                if ($group_buy['status'] != GBS_FINISHED)
                {
                    $this -> sys_msg('当前状态不能执行该操作！', 1);
                }
                
                /* 如果有有效订单，取消订单 */
                if ($group_buy['valid_order'] > 0)
                {
                    /* 查找未确认或已确认的订单 */
                    $sql = "SELECT * " .
                            "FROM " . $ecs->table('ec_order_info') .
                            " WHERE extension_code = 'group_buy' " .
                            "AND extension_id = '$group_buy_id' " .
                            "AND (order_status = '" . OS_CONFIRMED . "' OR order_status = '" . OS_UNCONFIRMED . "') ";
                    $res = M()->query($sql);
                    
                    if(!empty($res))
                    {
                        foreach($res as $order)
                        {
                            // 修改订单状态为已取消，付款状态为未付款
                            $order['order_status'] = OS_CANCELED;
                            $order['to_buyer'] = '团购失败';
                            $order['pay_status'] = PS_UNPAYED;
                            $order['pay_time'] = 0;
            
                            /* 如果使用余额或有已付款金额，退回帐户余额 */
                            $money = $order['surplus'] + $order['money_paid'];
                            if ($money > 0)
                            {
                                $order['surplus'] = 0;
                                $order['money_paid'] = 0;
                                $order['order_amount'] = $money;
            
                                // 退款到帐户余额
                                order_refund($order, 1, '团购失败' . ':' . $order['order_sn'], $money);
                            }
            
                            /* 更新订单 */
                            $order = addslashes_deep($order);
                            update_order($order['order_id'], $order);
                        }
                    }
                }
        
                 /* 修改团购活动状态为失败，记录失败原因（活动说明） */
                $sql = "UPDATE " . $ecs->table('ec_goods_activity') .
                        " SET is_finished = '" . GBS_FAIL . "', " .
                            "act_desc = '$_POST[act_desc]' " .
                        "WHERE act_id = '$group_buy_id' LIMIT 1";
                M()->exe($sql);
        
                /* 清除缓存 */
                clear_cache_files();
        
                /* 提示信息 */
                $links = array(
                    array('href' => U('index',array('act'=>'list')), 'text' => '返回列表')
                );
                $this -> sys_msg('编辑团购活动成功。', 0, $links);
            }
            elseif (isset($_POST['mail']))
            {
                /* 发送通知邮件 */

                /* 判断订单状态 */
                if ($group_buy['status'] != GBS_SUCCEED)
                {
                    $this -> sys_msg('当前状态不能执行该操作！', 1);
                }
                
                /* 取得邮件模板 */
                $tpl = get_mail_template('group_buy');
        
                /* 初始化订单数和成功发送邮件数 */
                $count = 0;
                $send_count = 0;
                
                /* 取得有效订单 */
                $sql = "SELECT o.consignee, o.add_time, g.goods_number, o.order_sn, " .
                            "o.order_amount, o.order_id, o.email " .
                        "FROM " . $ecs->table('ec_order_info') . " AS o, " .
                            $ecs->table('ec_order_goods') . " AS g " .
                        "WHERE o.order_id = g.order_id " .
                        "AND o.extension_code = 'group_buy' " .
                        "AND o.extension_id = '$group_buy_id' " .
                        "AND o.order_status = '" . OS_CONFIRMED . "'";
                $res = M()->query($sql);
                if(!empty($res))
                {
                    foreach($res as $order)
                    {
                        /* 邮件模板赋值 */
                        $this->assign('consignee',    $order['consignee']);
                        $this->assign('add_time',     local_date(C('ec_time_format'), $order['add_time']));
                        $this->assign('goods_name',   $group_buy['goods_name']);
                        $this->assign('goods_number', $order['goods_number']);
                        $this->assign('order_sn',     $order['order_sn']);
                        $this->assign('order_amount', price_format($order['order_amount']));
                        $this->assign('shop_url',     $ecs->url() . 'user.php?act=order_detail&order_id='.$order['order_id']);
                        $this->assign('shop_name',    C('ec_shop_name'));
                        $this->assign('send_date',    local_date(C('ec_date_format')));
                        
                        $content= $this -> view->contentCompile('str:' . $tpl['template_content']);
                        //p($content);die;
                        if ($this -> add_to_maillist($order['consignee'], $order['email'], $tpl['template_subject'], $content, $tpl['is_html']))
                        {
                            $send_count++;
                        }
                        $count++;
                    }
                }
                
                /* 提示信息 */
                $this->sys_msg(sprintf('该团购活动共有 %s 个有效订单，成功发送了 %s 封邮件。', $count, $send_count));
            }
            else
            {
                /* 保存团购信息 */
                $goods_id = intval($_POST['goods_id']);
                if ($goods_id <= 0)
                {
                    $this -> sys_msg('您没有选择团购商品！');
                }
                $info = $this-> goods_group_buy($goods_id);
                if ($info && $info['act_id'] != $group_buy_id)
                {
                    $this->sys_msg('您选择的商品目前有一个团购活动正在进行！');
                }
        
                $goods_name = M()->getOne("SELECT goods_name FROM " . $ecs->table('ec_goods') . " WHERE goods_id = '$goods_id'",'goods_name');

                $act_name = empty($_POST['act_name']) ? $goods_name : sub_str($_POST['act_name'], 0, 255, false);
                $deposit = floatval($_POST['deposit']);
                if ($deposit < 0)
                {
                    $deposit = 0;
                }
                $restrict_amount = intval($_POST['restrict_amount']);
                if ($restrict_amount < 0)
                {
                    $restrict_amount = 0;
                }
                $gift_integral = intval($_POST['gift_integral']);
                if ($gift_integral < 0)
                {
                    $gift_integral = 0;
                }
                $price_ladder = array();
                $count = count($_POST['ladder_amount']);
                for ($i = $count - 1; $i >= 0; $i--)
                {
                    /* 如果数量小于等于0，不要 */
                    $amount = intval($_POST['ladder_amount'][$i]);
                    if ($amount <= 0)
                    {
                        continue;
                    }
                    
                    /* 如果价格小于等于0，不要 */
                    $price = round(floatval($_POST['ladder_price'][$i]), 2);
                    if ($price <= 0)
                    {
                        continue;
                    }
                    
                    /* 加入价格阶梯 */
                    $price_ladder[$amount] = array('amount' => $amount, 'price' => $price);
                }
                if (count($price_ladder) < 1)
                {
                    $this->sys_msg('您没有输入有效的价格阶梯！');
                }
                
                /* 限购数量不能小于价格阶梯中的最大数量 */
                $amount_list = array_keys($price_ladder);
                if ($restrict_amount > 0 && max($amount_list) > $restrict_amount)
                {
                    $this->sys_msg('限购数量不能小于价格阶梯中的最大数量');
                }
                
                ksort($price_ladder);
                $price_ladder = array_values($price_ladder);
        
                /* 检查开始时间和结束时间是否合理 */
                $start_time = local_strtotime($_POST['start_time']);
                $end_time = local_strtotime($_POST['end_time']);
                if ($start_time >= $end_time)
                {
                    $this->sys_msg('您输入了一个无效的团购时间。');
                }
                
                $group_buy = array(
                                'act_name'   => $act_name,
                                'act_desc'   => $_POST['act_desc'],
                                'act_type'   => GAT_GROUP_BUY,
                                'goods_id'   => $goods_id,
                                'goods_name' => $goods_name,
                                'start_time'    => $start_time,
                                'end_time'      => $end_time,
                                'ext_info'   => serialize(array(
                                        'price_ladder'      => $price_ladder,
                                        'restrict_amount'   => $restrict_amount,
                                        'gift_integral'     => $gift_integral,
                                        'deposit'           => $deposit
                                        ))
                            );
                /* 清除缓存 */
                clear_cache_files();
                //p($group_buy);die;
        
                /* 保存数据 */
                if ($group_buy_id > 0)
                {
                    /* update */
                    M()->autoExecute($ecs->table('ec_goods_activity'), $group_buy, 'UPDATE', "act_id = '$group_buy_id'");
                    
                    /* log */
                    admin_log(addslashes($goods_name) . '[' . $group_buy_id . ']', '编辑', '团购信息');
                    
                    /* todo 更新活动表 */

                    /* 提示信息 */
                    $links = array(
                        array('href' => U('index').'&act=list&' . list_link_postfix(), 'text' => '返回列表')
                    );
                    $this->sys_msg('编辑团购活动成功。', 0, $links);
                }
                else
                {
                    /* insert */
                    M()->autoExecute($ecs->table('ec_goods_activity'), $group_buy, 'INSERT');
        
                    /* log */
                    admin_log(addslashes($goods_name), '添加', '团购信息');
        
                    /* 提示信息 */
                    $links = array(
                        array('href' => U('index').'&act=add', 'text' => '继续添加'),
                        array('href' => U('index').'&act=list', 'text' => '返回列表')
                    );
                    $this->sys_msg('添加团购活动成功。', 0, $links);
                }
                
            }
            //p($_REQUEST);die;   
        }
        /*------------------------------------------------------ */
        //-- 批量删除团购活动
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'batch_drop')
        {
            if (isset($_POST['checkboxes']))
            {
                $del_count = 0; //初始化删除数量
                foreach ($_POST['checkboxes'] AS $key => $id)
                {
                    /* 取得团购活动信息 */
                    $group_buy = group_buy_info($id);
                    
                    /* 如果团购活动已经有订单，不能删除 */
                    if ($group_buy['valid_order'] <= 0)
                    {
                        /* 删除团购活动 */
                        $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') .
                                " WHERE act_id = '$id' LIMIT 1";
                        M()->exe($sql);
        
                        admin_log(addslashes($group_buy['goods_name']) . '[' . $id . ']', '删除', '团购信息');
                        $del_count++;
                    }
                }
                
                /* 如果删除了团购活动，清除缓存 */
                if ($del_count > 0)
                {
                    clear_cache_files();
                }
                $links[] = array('text' => '返回列表', 'href'=>U('index').'&act=list');
                $this->sys_msg(sprintf('成功删除了 %s 条团购活动记录（已经有订单的团购活动不能删除）。', $del_count), 0, $links);
            }
            else
            {
                $links[] = array('text' => '返回列表', 'href'=>U('index').'&act=list');
                $this->sys_msg('您现在没有团购活动记录！', 0, $links);
            }
        }
        /*------------------------------------------------------ */
        //-- 搜索商品
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'search_goods')
        {
        
            $json   = new JSON;
            $filter = $json->decode($_GET['JSON']);
            $arr    = get_goods_list($filter);
        
            make_json_result($arr);
        }
        /*------------------------------------------------------ */
        //-- 编辑保证金
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'edit_deposit')
        {
        
            $id = intval($_POST['id']);
            $val = floatval($_POST['val']);
        
            $sql = "SELECT ext_info FROM " . $ecs->table('ec_goods_activity') .
                    " WHERE act_id = '$id' AND act_type = '" . GAT_GROUP_BUY . "'";
            $ext_info = unserialize(M()->getOne($sql,'ext_info'));
            $ext_info['deposit'] = $val;
        
            $sql = "UPDATE " . $ecs->table('ec_goods_activity') .
                    " SET ext_info = '" . serialize($ext_info) . "'" .
                    " WHERE act_id = '$id'";
            M()->exe($sql);
        
            clear_cache_files();
        
            make_json_result(number_format($val, 2));
        }
        /*------------------------------------------------------ */
        //-- 编辑保证金
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'edit_restrict_amount')
        {
        
            $id = intval($_POST['id']);
            $val = intval($_POST['val']);
        
            $sql = "SELECT ext_info FROM " . $ecs->table('ec_goods_activity') .
                    " WHERE act_id = '$id' AND act_type = '" . GAT_GROUP_BUY . "'";
            $ext_info = unserialize(M()->getOne($sql,'ext_info'));
            $ext_info['restrict_amount'] = $val;
        
            $sql = "UPDATE " . $ecs->table('ec_goods_activity') .
                    " SET ext_info = '" . serialize($ext_info) . "'" .
                    " WHERE act_id = '$id'";
            M()->exe($sql);
        
            clear_cache_files();
        
            make_json_result($val);
        }
        /*------------------------------------------------------ */
        //-- 删除团购活动
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'remove')
        {
        
            $id = intval($_GET['id']);
        
            /* 取得团购活动信息 */
            $group_buy = group_buy_info($id);
        
            /* 如果团购活动已经有订单，不能删除 */
            if ($group_buy['valid_order'] > 0)
            {
                make_json_error('该团购活动已经有订单，不能删除！');
            }
        
            /* 删除团购活动 */
            $sql = "DELETE FROM " . $ecs->table('ec_goods_activity') . " WHERE act_id = '$id' LIMIT 1";
            M()->exe($sql);
        
            admin_log(addslashes($group_buy['goods_name']) . '[' . $id . ']', '删除', '团购信息');
        
            clear_cache_files();
        
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
            exit;
        }

	}
    
    /*
     * 取得团购活动列表
     * @return   array
     */
    public function group_buy_list()
    {
        $_LANG['gbs'][GBS_PRE_START] = '未开始';
        $_LANG['gbs'][GBS_UNDER_WAY] = '进行中';
        $_LANG['gbs'][GBS_FINISHED] = '结束未处理';
        $_LANG['gbs'][GBS_SUCCEED] = '成功结束';
        $_LANG['gbs'][GBS_FAIL] = '失败结束';

        $result = get_filter();
        if ($result === false)
        {
            /* 过滤条件 */
            $filter['keyword']      = empty($_REQUEST['keyword']) ? '' : trim($_REQUEST['keyword']);
            if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
            {
                $filter['keyword'] = json_str_iconv($filter['keyword']);
            }
            $filter['sort_by']      = empty($_REQUEST['sort_by']) ? 'act_id' : trim($_REQUEST['sort_by']);
            $filter['sort_order']   = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
    
            $where = (!empty($filter['keyword'])) ? " AND goods_name LIKE '%" . mysql_like_quote($filter['keyword']) . "%'" : '';
    
            $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') .
                    " WHERE act_type = '" . GAT_GROUP_BUY . "' $where";
            $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
    
            /* 分页大小 */
            $filter = page_and_size($filter);
    
            /* 查询 */
            $sql = "SELECT * ".
                    "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') .
                    " WHERE act_type = '" . GAT_GROUP_BUY . "' $where ".
                    " ORDER BY $filter[sort_by] $filter[sort_order] ".
                    " LIMIT ". $filter['start'] .", $filter[page_size]";
    
            $filter['keyword'] = stripslashes($filter['keyword']);
            set_filter($filter, $sql);
        }
        else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        $res = M()->query($sql);
        
        $list = array();
        if(!empty($res)){
            foreach($res as $row)
            {
                $ext_info = unserialize($row['ext_info']);
                $stat = group_buy_stat($row['act_id'], $ext_info['deposit']);
                $arr = array_merge($row, $stat, $ext_info);
                
                /* 处理价格阶梯 */
                $price_ladder = $arr['price_ladder'];
                if (!is_array($price_ladder) || empty($price_ladder))
                {
                    $price_ladder = array(array('amount' => 0, 'price' => 0));
                }
                else
                {
                    foreach ($price_ladder AS $key => $amount_price)
                    {
                        $price_ladder[$key]['formated_price'] = price_format($amount_price['price']);
                    }
                }
                
                /* 计算当前价 */
                $cur_price  = $price_ladder[0]['price'];    // 初始化
                $cur_amount = $stat['valid_goods'];         // 当前数量
                foreach ($price_ladder AS $amount_price)
                {
                    if ($cur_amount >= $amount_price['amount'])
                    {
                        $cur_price = $amount_price['price'];
                    }
                    else
                    {
                        break;
                    }
                }
                
                $arr['cur_price']   = $cur_price;

                $status = group_buy_status($arr);
        
                $arr['start_time']  = local_date(C('ec_date_format'), $arr['start_time']);
                $arr['end_time']    = local_date(C('ec_date_format'), $arr['end_time']);
                $arr['cur_status']  = $_LANG['gbs'][$status];
        
                $list[] = $arr;
        
            }
        }
        $arr = array('item' => $list, 'filter' => $filter, 'page_count' => $filter['page_count'], 
        'record_count' => $filter['record_count']);

        return $arr;
    }
        
    /**
    * 取得某商品的团购活动
    * @param   int     $goods_id   商品id
    * @return  array
    */
    function goods_group_buy($goods_id)
    {
        $sql = "SELECT * FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') .
                " WHERE goods_id = '$goods_id' " .
                " AND act_type = '" . GAT_GROUP_BUY . "'" .
                " AND start_time <= " . gmtime() .
                " AND end_time >= " . gmtime();
        
        return M()->getRowSql($sql);
    }
    
    /**
     * 列表链接
     * @param   bool    $is_add         是否添加（插入）
     * @return  array('href' => $href, 'text' => $text)
     */
    public function list_link($is_add = true)
    {
        $href = U('index').'&act=list';
        if (!$is_add)
        {
            $href .= '&' . list_link_postfix();
        }
    
        return array('href' => $href, 'text' => '团购活动列表');
    }
    
    
}
