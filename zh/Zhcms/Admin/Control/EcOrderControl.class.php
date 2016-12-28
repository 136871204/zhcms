<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcOrderControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
        
        $_LANG['cs'][OS_UNCONFIRMED] = '待确认';
        $_LANG['cs'][CS_AWAIT_PAY] = '待付款';
        $_LANG['cs'][CS_AWAIT_SHIP] = '待发货';
        $_LANG['cs'][CS_FINISHED] = '已完成';
        $_LANG['cs'][PS_PAYING] = '付款中';
        $_LANG['cs'][OS_CANCELED] = '取消';
        $_LANG['cs'][OS_INVALID] = '无效';
        $_LANG['cs'][OS_RETURNED] = '退货';
        $_LANG['cs'][OS_SHIPPED_PART] = '部分发货';
        
        /* 订单状态 */
        $_LANG['os'][OS_UNCONFIRMED] = '未确认';
        $_LANG['os'][OS_CONFIRMED] = '已确认';
        $_LANG['os'][OS_CANCELED] = '<font color="red"> 取消</font>';
        $_LANG['os'][OS_INVALID] = '<font color="red">无效</font>';
        $_LANG['os'][OS_RETURNED] = '<font color="red">退货</font>';
        $_LANG['os'][OS_SPLITED] = '已分单';
        $_LANG['os'][OS_SPLITING_PART] = '部分分单';
        
        $_LANG['ss'][SS_UNSHIPPED] = '未发货';
        $_LANG['ss'][SS_PREPARING] = '配货中';
        $_LANG['ss'][SS_SHIPPED] = '已发货';
        $_LANG['ss'][SS_RECEIVED] = '收货确认';
        $_LANG['ss'][SS_SHIPPED_PART] = '已发货(部分商品)';
        $_LANG['ss'][SS_SHIPPED_ING] = '发货中';
        
        $_LANG['ps'][PS_UNPAYED] = '未付款';
        $_LANG['ps'][PS_PAYING] = '付款中';
        $_LANG['ps'][PS_PAYED] = '已付款';
       
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    /*$image = new EcImage(C('ec_bgcolor'));
	    $tdb=M();
        $exc = new exchange($ecs->table('ec_friend_link'), $tdb, 'link_id', 'link_name');*/
        
        header("Content-type:text/html;charset=utf-8");
        
    
        /*------------------------------------------------------ */
        //-- 订单查询
        /*------------------------------------------------------ */
        
        if ($_REQUEST['act'] == 'order_query')
        {
        
        }
        /*------------------------------------------------------ */
        //-- 订单列表
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'list')
        {
            /* 模板赋值 */
            $this->assign('ur_here', '订单列表');
            $this->assign('action_link', array('href' => U('index').'&act=order_query', 'text' => '订单查询'));
        
            $this->assign('status_list', $_LANG['cs']);   // 订单状态
            $this->assign('lang', $_LANG);   // 订单状态
            
            $this->assign('os_unconfirmed',   OS_UNCONFIRMED);
            $this->assign('cs_await_pay',     CS_AWAIT_PAY);
            $this->assign('cs_await_ship',    CS_AWAIT_SHIP);
            $this->assign('full_page',        1);
            
            $order_list = $this -> order_list();
            $this->assign('order_list',   $order_list['orders']);
            $this->assign('filter',       $order_list['filter']);
            $this->assign('record_count', $order_list['record_count']);
            $this->assign('page_count',   $order_list['page_count']);
            //echo __PUBLIC__;
            $this->assign('sort_order_time', '<img src="'.__PUBLIC__.'/ec/images/sort_desc.gif">');
            
            /* 显示模板 */
            //assign_query_info();
            $this->display('order_list.htm');
    
        }
        /*------------------------------------------------------ */
        //-- 排序、分页、查询
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query')
        {
            /* 检查权限 */
            //admin_priv('order_view');
        
            $this->assign('status_list', $_LANG['cs']);   // 订单状态
            $this->assign('lang', $_LANG);   // 订单状态
            
            $order_list = $this -> order_list();
        
            $this->assign('order_list',   $order_list['orders']);
            $this->assign('filter',       $order_list['filter']);
            $this->assign('record_count', $order_list['record_count']);
            $this->assign('page_count',   $order_list['page_count']);
            $sort_flag  = sort_flag($order_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
            make_json_result($this->fetch('order_list.htm'), '', array('filter' => $order_list['filter'], 
                        'page_count' => $order_list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 订单详情页面
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'info')
        {
            /* 根据订单id或订单号查询订单信息 */
            if (isset($_REQUEST['order_id']))
            {
                $order_id = intval($_REQUEST['order_id']);
                $order = order_info($order_id);
            }
            elseif (isset($_REQUEST['order_sn']))
            {
                $order_sn = trim($_REQUEST['order_sn']);
                $order = order_info(0, $order_sn);
            }
            else
            {
                /* 如果参数不存在，退出 */
                die('invalid parameter');
            }
            
            /* 如果订单不存在，退出 */
            if (empty($order))
            {
                die('order does not exist');
            }
        
            /* 根据订单是否完成检查权限 */
            /*if (order_finished($order))
            {
                admin_priv('order_view_finished');
            }
            else
            {
                admin_priv('order_view');
            }*/
            
            /* 如果管理员属于某个办事处，检查该订单是否也属于这个办事处 */
            $sql = "SELECT agency_id FROM " . $ecs->table('user') . " WHERE uid = '$_SESSION[uid]'";
            $agency_id = M()->getOne($sql,'agency_id');
            if ($agency_id > 0)
            {
                if ($order['agency_id'] != $agency_id)
                {
                    $this -> sys_msg('对不起,您没有执行此项操作的权限!');
                }
            }
            /* 取得上一个、下一个订单号 */
            if (!empty($_COOKIE['ZHCMS']['lastfilter']))
            {
                //echo 'TODO:EcOrderControl---1';die;
                $filter = unserialize(urldecode($_COOKIE['ZHCMS']['lastfilter']));
                if (!empty($filter['composite_status']))
                {
                    $where = '';
                    //综合状态
                    switch($filter['composite_status'])
                    {
                        case CS_AWAIT_PAY :// 待付款：货到付款且已发货且未付款，非货到付款且未付款
                            $where .= order_query_sql('await_pay');
                            break;
        
                        case CS_AWAIT_SHIP :// 待发货：货到付款且未发货，非货到付款且已付款且未发货
                            $where .= order_query_sql('await_ship');
                            break;
        
                        case CS_FINISHED :// 已完成：已确认、已付款、已发货
                            $where .= order_query_sql('finished');
                            break;
        
                        default:
                            if ($filter['composite_status'] != -1)
                            {
                                $where .= " AND o.order_status = '$filter[composite_status]' ";
                            }
                    }
                }
            }
            $sql = "SELECT MAX(order_id) FROM " . $ecs->table('ec_order_info') . " as o WHERE order_id < '$order[order_id]'";
            if ($agency_id > 0)
            {
                $sql .= " AND agency_id = '$agency_id'";
            }
            if (!empty($where))
            {
                $sql .= $where;
            }
            $this->assign('prev_id', M()->getOne($sql,'MAX(order_id)'));
            $sql = "SELECT MIN(order_id) FROM " . $ecs->table('ec_order_info') . " as o WHERE order_id > '$order[order_id]'";
            if ($agency_id > 0)
            {
                $sql .= " AND agency_id = '$agency_id'";
            }
            if (!empty($where))
            {
                $sql .= $where;
            }
            $this->assign('next_id', M()->getOne($sql,'MIN(order_id)'));
    
            /* 取得用户名 */
            if ($order['user_id'] > 0)
            {
                $user = user_info($order['user_id']);
                if (!empty($user))
                {
                    $order['user_name'] = $user['user_name'];
                }
            }
            
            /* 取得所有办事处 */
            $sql = "SELECT agency_id, agency_name FROM " . $ecs->table('ec_agency');
            $this->assign('agency_list', M()->getAll($sql));
    
            /* 取得区域名 */
            $sql = "SELECT concat(IFNULL(c.region_name, ''), '  ', IFNULL(p.region_name, ''), " .
                        "'  ', IFNULL(t.region_name, ''), '  ', IFNULL(d.region_name, '')) AS region " .
                    "FROM " . $ecs->table('ec_order_info') . " AS o " .
                        "LEFT JOIN " . $ecs->table('ec_region') . " AS c ON o.country = c.region_id " .
                        "LEFT JOIN " . $ecs->table('ec_region') . " AS p ON o.province = p.region_id " .
                        "LEFT JOIN " . $ecs->table('ec_region') . " AS t ON o.city = t.region_id " .
                        "LEFT JOIN " . $ecs->table('ec_region') . " AS d ON o.district = d.region_id " .
                    "WHERE o.order_id = '$order[order_id]'";
            $order['region'] = M()->getOne($sql,'region');
            
            /* 格式化金额 */
            if ($order['order_amount'] < 0)
            {
                $order['money_refund']          = abs($order['order_amount']);
                $order['formated_money_refund'] = price_format(abs($order['order_amount']));
            }
    
            /* 其他处理 */
            $order['order_time']    = local_date(C('ec_time_format'), $order['add_time']);
            $order['pay_time']      = $order['pay_time'] > 0 ?
                local_date(C('ec_time_format'), $order['pay_time']) : $_LANG['ps'][PS_UNPAYED];
            $order['shipping_time'] = $order['shipping_time'] > 0 ?
                local_date(C('ec_time_format'), $order['shipping_time']) : $_LANG['ss'][SS_UNSHIPPED];
            $order['status']        = $_LANG['os'][$order['order_status']] . ',' . $_LANG['ps'][$order['pay_status']] . ',' . $_LANG['ss'][$order['shipping_status']];
            $order['invoice_no']    = $order['shipping_status'] == SS_UNSHIPPED || $order['shipping_status'] == SS_PREPARING ? $_LANG['ss'][SS_UNSHIPPED] : $order['invoice_no'];

            /* 取得订单的来源 */
            if ($order['from_ad'] == 0)
            {
                $order['referer'] = empty($order['referer']) ? '来自本站' : $order['referer'];
            }
            elseif ($order['from_ad'] == -1)
            {
                $order['referer'] = '商品站外JS投放' . ' ('.'来自站点：' . $order['referer'].')';
            }
            else
            {
                /* 查询广告的名称 */
                 $ad_name = M()->getOne("SELECT ad_name FROM " .$ecs->table('ec_ad'). " WHERE ad_id='$order[from_ad]'",'ad_name');
                 $order['referer'] = '广告：' . $ad_name . ' ('.'来自站点：' . $order['referer'].')';
            }
            
            /* 此订单的发货备注(此订单的最后一条操作记录) */
            $sql = "SELECT action_note FROM " . $ecs->table('ec_order_action').
                   " WHERE order_id = '$order[order_id]' AND shipping_status = 1 ORDER BY log_time DESC";
            $order['invoice_note'] = M()->getOne($sql,'action_note');
        
            /* 取得订单商品总重量 */
            $weight_price = order_weight_price($order['order_id']);
            $order['total_weight'] = $weight_price['formated_weight'];
        
            /* 参数赋值：订单 */
            $this->assign('order', $order);
            
            /* 取得用户信息 */
            if ($order['user_id'] > 0)
            {
                
                /* 用户等级 */
                if ($user['user_rank'] > 0)
                {
                    $where = " WHERE rank_id = '$user[user_rank]' ";
                }
                else
                {
                    $where = " WHERE min_points <= " . intval($user['rank_points']) . " ORDER BY min_points DESC ";
                }
                $sql = "SELECT rank_name FROM " . $ecs->table('ec_user_rank') . $where;
                $user['rank_name'] = M()->getOne($sql,'rank_name');
                // 用户红包数量
                $day    = getdate();
                $today  = local_mktime(23, 59, 59, $day['mon'], $day['mday'], $day['year']);
                $sql = "SELECT COUNT(*) " .
                        "FROM " . $ecs->table('ec_bonus_type') . " AS bt, " . 
                                    $ecs->table('ec_user_bonus') . " AS ub " .
                        "WHERE 
                            bt.type_id = ub.bonus_type_id " .
                            "AND ub.user_id = '$order[user_id]' " .
                            "AND ub.order_id = 0 " .
                            "AND bt.use_start_date <= '$today' " .
                            "AND bt.use_end_date >= '$today'";
                $user['bonus_count'] = M()->getOne($sql,'COUNT(*)');
                $this->assign('user', $user);
                // 地址信息
                $sql = "SELECT * FROM " . $ecs->table('ec_user_address') . " WHERE user_id = '$order[user_id]'";
                $this->assign('address_list', M()->getAll($sql));
                //p($user);die;
            }
            
            /* 取得订单商品及货品 */
            $goods_list = array();
            $goods_attr = array();
            $sql = "SELECT 
                        o.*, IF(o.product_id > 0, p.product_number, g.goods_number) AS storage, 
                        o.goods_attr, g.suppliers_id, IFNULL(b.brand_name, '') AS brand_name, p.product_sn
                    FROM " . $ecs->table('ec_order_goods') . " AS o
                        LEFT JOIN " . $ecs->table('ec_products') . " AS p
                            ON p.product_id = o.product_id
                        LEFT JOIN " . $ecs->table('ec_goods') . " AS g
                            ON o.goods_id = g.goods_id
                        LEFT JOIN " . $ecs->table('ec_brand') . " AS b
                            ON g.brand_id = b.brand_id
                    WHERE o.order_id = '$order[order_id]'";
            $res = M()->query($sql);
            if(!empty($res))
            {
                foreach($res as $row)
                {
                    /* 虚拟商品支持 */
                    if ($row['is_real'] == 0)
                    {
                        echo 'TODO:EcOrderControl---2';die;
                    }
                    $row['formated_subtotal']       = price_format($row['goods_price'] * $row['goods_number']);
                    $row['formated_goods_price']    = price_format($row['goods_price']);
                    $goods_attr[] = explode(' ', trim($row['goods_attr'])); //将商品属性拆分为一个数组
                    if ($row['extension_code'] == 'package_buy')
                    {
                        $row['storage'] = '';
                        $row['brand_name'] = '';
                        $row['package_goods_list'] = get_package_goods($row['goods_id']);
                    }
                    $goods_list[] = $row;
                }
            }
            
            $attr = array();
            $arr  = array();
            foreach ($goods_attr AS $index => $array_val)
            {
                foreach ($array_val AS $value)
                {
                    $arr = explode(':', $value);//以 : 号将属性拆开
                    if(empty($arr[0])||empty($arr[1]))
                    {
                        continue;
                    }
                    $attr[$index][] =  @array('name' => $arr[0], 'value' => $arr[1]);
                }
            }
    
            $this->assign('goods_attr', $attr);
            $this->assign('goods_list', $goods_list);
            
            /* 取得能执行的操作列表 */
            $operable_list = $this -> operable_list($order);
            $this->assign('operable_list', $operable_list);
            
            /* 取得订单操作记录 */
            $act_list = array();
            $sql = "SELECT * FROM " . $ecs->table('ec_order_action') . " WHERE order_id = '$order[order_id]' ORDER BY log_time DESC,action_id DESC";
            $res = M()->query($sql);
            if(!empty($res))
            {
                foreach($res as $row)
                {
                    $row['order_status']    = $_LANG['os'][$row['order_status']];
                    $row['pay_status']      = $_LANG['ps'][$row['pay_status']];
                    $row['shipping_status'] = $_LANG['ss'][$row['shipping_status']];
                    $row['action_time']     = local_date(C('ec_time_format'), $row['log_time']);
                    $act_list[] = $row;
                }
            }
            $this->assign('action_list', $act_list);
            
            /* 取得是否存在实体商品 */
            $this->assign('exist_real_goods', exist_real_goods($order['order_id']));
    
            /* 是否打印订单，分别赋值 */
            if (isset($_GET['print']))
            {
                $this->assign('shop_name',    C('ec_shop_name'));
                $this->assign('shop_url',     __ROOT__);
                $this->assign('shop_address', C('ec_shop_address'));
                $this->assign('service_phone',C('ec_service_phone'));
                $this->assign('print_time',   local_date(C('ec_time_format')));
                $this->assign('action_user',  $_SESSION['username']);

                $this->display('order_print.html');
            }
            /* 打印快递单 */
            elseif (isset($_GET['shipping_print']))
            {
                echo 'TODO:EcOrderControl---4';die;
            }
            else
            {
                /* 模板赋值 */
                $this->assign('ur_here', '订单信息');
                $this->assign('action_link', array('href' => U('index').'&act=list&' . list_link_postfix(), 'text' => '订单列表'));
            
                /* 显示模板 */
                $this->display('order_info.htm');
            }
            //p($attr);die;
        }
        /*------------------------------------------------------ */
        //-- 修改订单（载入页面）
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit')
        {
            /* 取得参数 order_id */
            $order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;
            $this->assign('order_id', $order_id);
            
            /* 取得参数 step */
            $step_list = array('user', 'goods', 'consignee', 'shipping', 'payment', 'other', 'money');
            $step = isset($_GET['step']) && in_array($_GET['step'], $step_list) ? $_GET['step'] : 'user';
            $this->assign('step', $step);
            
            /* 取得参数 act */
            $act = $_GET['act'];
            $this->assign('ur_here','添加订单');
            $this->assign('step_act', $act);
    
            /* 取得订单信息 */
            if ($order_id > 0)
            {
                $order = order_info($order_id);
                
                /* 发货单格式化 */
                $order['invoice_no'] = str_replace('<br>', ',', $order['invoice_no']);
        
                /* 如果已发货，就不能修改订单了（配送方式和发货单号除外） */
                if ($order['shipping_status'] == SS_SHIPPED || $order['shipping_status'] == SS_RECEIVED)
                {
                    if ($step != 'shipping')
                    {
                        $this -> sys_msg('您不能修改已发货的订单');
                    }
                    else
                    {
                        $step = 'invoice';
                        $this->assign('step', $step);
                    }
                }
                $this->assign('order', $order);
            }
            else
            {
                if ($act != 'add' || $step != 'user')
                {
                    die('invalid params');
                }
            }
            /* 选择会员 */
            if ('user' == $step)
            {
                // 无操作
            }
            /* 增删改商品 */
            elseif ('goods' == $step)
            {
                echo 'TODO:EcOrderControl---5';die;
            }
            // 设置收货人
            elseif ('consignee' == $step)
            {
                echo 'TODO:EcOrderControl---6';die;
            }
            // 选择配送方式
            elseif ('shipping' == $step)
            {
                echo 'TODO:EcOrderControl---7';die;
            }
            // 选择支付方式
            elseif ('payment' == $step)
            {
                /* 取得支付信息 */
                $pay_id = $_GET['pay_id'];
                $payment = payment_info($pay_id);
                
                /* 计算支付费用 */
                $order_amount = order_amount($order_id);
                if ($payment['is_cod'] == 1)//is_cod 是否货到付款，0，否；1，是
                {
                    echo 'TODO:EcOrderControl---81';die;
                    $order = order_info($order_id);
                    $region_id_list = array(
                        $order['country'], $order['province'], $order['city'], $order['district']
                    );
                    $shipping = shipping_area_info($order['shipping_id'], $region_id_list);
                    //$pay_fee = pay_fee($pay_id, $order_amount, $shipping['pay_fee']);
                }
                else
                {
                    $pay_fee = pay_fee($pay_id, $order_amount);
                }
                
                /* 保存订单 */
                $order = array(
                    'pay_id' => $pay_id,
                    'pay_name' => addslashes($payment['pay_name']),
                    'pay_fee' => $pay_fee
                );
                update_order($order_id, $order);
                $this -> update_order_amount($order_id);
        
        
        
        
                p($pay_fee);die;
                echo 'TODO:EcOrderControl---8';die;
            }
            // 选择包装、贺卡
            elseif ('other' == $step)
            {
                echo 'TODO:EcOrderControl---9';die;
            }
            // 费用
            elseif ('money' == $step)
            {
                echo 'TODO:EcOrderControl---10';die;
            }
            // 发货后修改配送方式和发货单号
            elseif ('invoice' == $step)
            {
                echo 'TODO:EcOrderControl---11';die;
            }
            p($_REQUEST);die;
        }

	}
    
    /**
     * 更新订单总金额
     * @param   int     $order_id   订单id
     * @return  bool
     */
    public function update_order_amount($order_id)
    {

        //更新订单总金额
        $sql = "UPDATE " . $GLOBALS['ec_globals']['ecs']->table('ec_order_info') .
                " SET order_amount = " . order_due_field() .
                " WHERE order_id = '$order_id' LIMIT 1";
    
        return M()->exe($sql);
    }


    
    /**
     * 返回某个订单可执行的操作列表，包括权限判断
     * @param   array   $order      订单信息 order_status, shipping_status, pay_status
     * @param   bool    $is_cod     支付方式是否货到付款
     * @return  array   可执行的操作  confirm, pay, unpay, prepare, ship, unship, receive, cancel, invalid, return, drop
     * 格式 array('confirm' => true, 'pay' => true)
     */
    public function operable_list($order)
    {
        /* 取得订单状态、发货状态、付款状态 */
        $os = $order['order_status'];
        $ss = $order['shipping_status'];
        $ps = $order['pay_status'];
        /* 取得订单操作权限 */
        $actions = $_SESSION['action_list'];
        if ($actions == 'all')
        {
            $priv_list  = array('os' => true, 'ss' => true, 'ps' => true, 'edit' => true);
        }else
        {
            $actions    = ',' . $actions . ',';
            $priv_list  = array(
                'os'    => strpos($actions, ',order_os_edit,') !== false,
                'ss'    => strpos($actions, ',order_ss_edit,') !== false,
                'ps'    => strpos($actions, ',order_ps_edit,') !== false,
                'edit'  => strpos($actions, ',order_edit,') !== false
            );
        }
        /* 取得订单支付方式是否货到付款 */
        $payment = payment_info($order['pay_id']);
        $is_cod  = $payment['is_cod'] == 1;
        
        /* 根据状态返回可执行操作 */
        $list = array();
        if (OS_UNCONFIRMED == $os)// 未确认
        {
            /* 状态：未确认 => 未付款、未发货 */
            if ($priv_list['os'])
            {
                echo 'TODO:EcOrderControl---operable_list--1';die;
            }
            
            //echo 'TODO:EcOrderControl---operable_list--11';die;
        }
        elseif (OS_CONFIRMED == $os || OS_SPLITED == $os || OS_SPLITING_PART == $os)//已确认||已分单||部分分单
        {
            /* 状态：已确认 */
            if (PS_UNPAYED == $ps)
            {
                echo 'TODO:EcOrderControl---operable_list--2';die;
            }
            else
            {
                /* 状态：已确认、已付款和付款中 */
                if (SS_UNSHIPPED == $ss || SS_PREPARING == $ss)
                {
                    /* 状态：已确认、已付款和付款中、未发货（配货中） => 不是货到付款 */
                    if ($priv_list['ss'])
                    {
                        echo 'TODO:EcOrderControl---operable_list--31';die;
                        if (SS_UNSHIPPED == $ss)
                        {
                            $list['prepare'] = true; // 配货
                        }
                        $list['split'] = true; // 分单
                    }
                    if ($priv_list['ps'])
                    {
                        echo 'TODO:EcOrderControl---operable_list--32';die;
                        $list['unpay'] = true; // 设为未付款
                        if ($priv_list['os'])
                        {
                            $list['cancel'] = true; // 取消
                        }
                    }
                }
                /* 状态：已确认、未付款、发货中 */
                elseif (SS_SHIPPED_ING == $ss || SS_SHIPPED_PART == $ss)
                {
                    // 部分分单
                    if (OS_SPLITING_PART == $os)
                    {
                        echo 'TODO:EcOrderControl---operable_list--4';die;
                        $list['split'] = true; // 分单
                    }
                    $list['to_delivery'] = true; // 去发货
                
                    
                }
                else
                {
                    /* 状态：已确认、已付款和付款中、已发货或已收货 */
                    if ($priv_list['ss'])
                    {
                        echo 'TODO:EcOrderControl---operable_list--5';die;
                    }
                    if ($priv_list['ps'] && $is_cod)
                    {
                        echo 'TODO:EcOrderControl---operable_list--6';die;
                    }
                    if ($priv_list['os'] && $priv_list['ss'] && $priv_list['ps'])
                    {
                        echo 'TODO:EcOrderControl---operable_list--7';die;
                    }
                }
            }
            
        }
        elseif (OS_CANCELED == $os)
        {
            echo 'TODO:EcOrderControl---operable_list--8';die;
        }
        elseif (OS_INVALID == $os)
        {
            echo 'TODO:EcOrderControl---operable_list--9';die;
        }
        elseif (OS_RETURNED == $os)
        {
            /* 状态：退货 */
            if ($priv_list['os'])
            {
                echo 'TODO:EcOrderControl---operable_list--10';die;
                $list['confirm'] = true;
            }
            
        }
        /* 修正发货操作 */
        if (!empty($list['split']))
        {
            echo 'TODO:EcOrderControl---operable_list--11';die;
        }
        
        /* 售后 */
        $list['after_service'] = true;
    
        return $list;
    
    }
    
    
    /**
     *  获取订单列表信息
     *
     * @access  public
     * @param
     *
     * @return void
     */
    public function order_list()
    {
        $result = get_filter();
        if ($result === false)
        {
            /* 过滤信息 */
            $filter['order_sn'] = empty($_REQUEST['order_sn']) ? '' : trim($_REQUEST['order_sn']);
            if (!empty($_GET['is_ajax']) && $_GET['is_ajax'] == 1)
            {
                $_REQUEST['consignee'] = empty($_REQUEST['consignee']) ?'' :json_str_iconv($_REQUEST['consignee']);
                //$_REQUEST['address'] = json_str_iconv($_REQUEST['address']);
            }
            $filter['consignee'] = empty($_REQUEST['consignee']) ? '' : trim($_REQUEST['consignee']);
            $filter['email'] = empty($_REQUEST['email']) ? '' : trim($_REQUEST['email']);
            $filter['address'] = empty($_REQUEST['address']) ? '' : trim($_REQUEST['address']);
            $filter['zipcode'] = empty($_REQUEST['zipcode']) ? '' : trim($_REQUEST['zipcode']);
            $filter['tel'] = empty($_REQUEST['tel']) ? '' : trim($_REQUEST['tel']);
            $filter['mobile'] = empty($_REQUEST['mobile']) ? 0 : intval($_REQUEST['mobile']);
            $filter['country'] = empty($_REQUEST['country']) ? 0 : intval($_REQUEST['country']);
            $filter['province'] = empty($_REQUEST['province']) ? 0 : intval($_REQUEST['province']);
            $filter['city'] = empty($_REQUEST['city']) ? 0 : intval($_REQUEST['city']);
            $filter['district'] = empty($_REQUEST['district']) ? 0 : intval($_REQUEST['district']);
            $filter['shipping_id'] = empty($_REQUEST['shipping_id']) ? 0 : intval($_REQUEST['shipping_id']);
            $filter['pay_id'] = empty($_REQUEST['pay_id']) ? 0 : intval($_REQUEST['pay_id']);
            $filter['order_status'] = isset($_REQUEST['order_status']) ? intval($_REQUEST['order_status']) : -1;
            $filter['shipping_status'] = isset($_REQUEST['shipping_status']) ? intval($_REQUEST['shipping_status']) : -1;
            $filter['pay_status'] = isset($_REQUEST['pay_status']) ? intval($_REQUEST['pay_status']) : -1;
            $filter['user_id'] = empty($_REQUEST['user_id']) ? 0 : intval($_REQUEST['user_id']);
            $filter['user_name'] = empty($_REQUEST['user_name']) ? '' : trim($_REQUEST['user_name']);
            $filter['composite_status'] = isset($_REQUEST['composite_status']) ? intval($_REQUEST['composite_status']) : -1;
            $filter['group_buy_id'] = isset($_REQUEST['group_buy_id']) ? intval($_REQUEST['group_buy_id']) : 0;
    
            $filter['sort_by'] = empty($_REQUEST['sort_by']) ? 'add_time' : trim($_REQUEST['sort_by']);
            $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
    
            $filter['start_time'] = empty($_REQUEST['start_time']) ? '' : (strpos($_REQUEST['start_time'], '-') > 0 ?  local_strtotime($_REQUEST['start_time']) : $_REQUEST['start_time']);
            $filter['end_time'] = empty($_REQUEST['end_time']) ? '' : (strpos($_REQUEST['end_time'], '-') > 0 ?  local_strtotime($_REQUEST['end_time']) : $_REQUEST['end_time']);
            $where = 'WHERE 1 ';
            if ($filter['order_sn'])
            {
                $where .= " AND o.order_sn LIKE '%" . mysql_like_quote($filter['order_sn']) . "%'";
            }
            if ($filter['consignee'])
            {
                $where .= " AND o.consignee LIKE '%" . mysql_like_quote($filter['consignee']) . "%'";
            }
            if ($filter['email'])
            {
                $where .= " AND o.email LIKE '%" . mysql_like_quote($filter['email']) . "%'";
            }
            if ($filter['address'])
            {
                $where .= " AND o.address LIKE '%" . mysql_like_quote($filter['address']) . "%'";
            }
            if ($filter['zipcode'])
            {
                $where .= " AND o.zipcode LIKE '%" . mysql_like_quote($filter['zipcode']) . "%'";
            }
            if ($filter['tel'])
            {
                $where .= " AND o.tel LIKE '%" . mysql_like_quote($filter['tel']) . "%'";
            }
            if ($filter['mobile'])
            {
                $where .= " AND o.mobile LIKE '%" .mysql_like_quote($filter['mobile']) . "%'";
            }
            if ($filter['country'])
            {
                $where .= " AND o.country = '$filter[country]'";
            }
            if ($filter['province'])
            {
                $where .= " AND o.province = '$filter[province]'";
            }
            if ($filter['city'])
            {
                $where .= " AND o.city = '$filter[city]'";
            }
            if ($filter['district'])
            {
                $where .= " AND o.district = '$filter[district]'";
            }
            if ($filter['shipping_id'])
            {
                $where .= " AND o.shipping_id  = '$filter[shipping_id]'";
            }
            if ($filter['pay_id'])
            {
                $where .= " AND o.pay_id  = '$filter[pay_id]'";
            }
            if ($filter['order_status'] != -1)
            {
                $where .= " AND o.order_status  = '$filter[order_status]'";
            }
            if ($filter['shipping_status'] != -1)
            {
                $where .= " AND o.shipping_status = '$filter[shipping_status]'";
            }
            if ($filter['pay_status'] != -1)
            {
                $where .= " AND o.pay_status = '$filter[pay_status]'";
            }
            if ($filter['user_id'])
            {
                $where .= " AND o.user_id = '$filter[user_id]'";
            }
            if ($filter['user_name'])
            {
                $where .= " AND u.user_name LIKE '%" . mysql_like_quote($filter['user_name']) . "%'";
            }
            if ($filter['start_time'])
            {
                $where .= " AND o.add_time >= '$filter[start_time]'";
            }
            if ($filter['end_time'])
            {
                $where .= " AND o.add_time <= '$filter[end_time]'";
            }
            //综合状态
            switch($filter['composite_status'])
            {
                case CS_AWAIT_PAY :
                    $where .= order_query_sql('await_pay');
                    break;
    
                case CS_AWAIT_SHIP :
                    $where .= order_query_sql('await_ship');
                    break;
    
                case CS_FINISHED :
                    $where .= order_query_sql('finished');
                    break;
    
                case PS_PAYING :
                    if ($filter['composite_status'] != -1)
                    {
                        $where .= " AND o.pay_status = '$filter[composite_status]' ";
                    }
                    break;
                case OS_SHIPPED_PART :
                    if ($filter['composite_status'] != -1)
                    {
                        $where .= " AND o.shipping_status  = '$filter[composite_status]'-2 ";
                    }
                    break;
                default:
                    if ($filter['composite_status'] != -1)
                    {
                        $where .= " AND o.order_status = '$filter[composite_status]' ";
                    }
            }
            /* 团购订单 */
            if ($filter['group_buy_id'])
            {
                $where .= " AND o.extension_code = 'group_buy' AND o.extension_id = '$filter[group_buy_id]' ";
            }
            /* 如果管理员属于某个办事处，只列出这个办事处管辖的订单 */
            $sql = "SELECT agency_id FROM " . $GLOBALS['ec_globals']['ecs']->table('user') . " WHERE uid = '$_SESSION[uid]'";
            $agency_id = M()->getOne($sql,'agency_id');
            if ($agency_id > 0)
            {
                $where .= " AND o.agency_id = '$agency_id' ";
            }


            /* 分页大小 */
            $filter['page'] = empty($_REQUEST['page']) || (intval($_REQUEST['page']) <= 0) ? 1 : intval($_REQUEST['page']);
    
            if (isset($_REQUEST['page_size']) && intval($_REQUEST['page_size']) > 0)
            {
                $filter['page_size'] = intval($_REQUEST['page_size']);
            }
            elseif (isset($_COOKIE['ZHCMS']['page_size']) && intval($_COOKIE['ZHCMS']['page_size']) > 0)
            {
                $filter['page_size'] = intval($_COOKIE['ZHCMS']['page_size']);
            }
            else
            {
                $filter['page_size'] = C('PAGE_SHOW_ROW');
            }

            /* 记录总数 */
            if ($filter['user_name'])
            {
                $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_order_info') . " AS o ,".
                       $GLOBALS['ec_globals']['ecs']->table('ec_users') . " AS u " . $where;
            }
            else
            {
                $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_order_info') . " AS o ". $where;
            }
            $filter['record_count']   = M()->getOne($sql,'COUNT(*)');
            $filter['page_count']     = $filter['record_count'] > 0 ? ceil($filter['record_count'] / $filter['page_size']) : 1;
            
            /* 查询 */
            $sql = "SELECT o.order_id, o.order_sn, o.add_time, o.order_status, o.shipping_status, o.order_amount, o.money_paid," .
                        "o.pay_status, o.consignee, o.address, o.email, o.tel, o.extension_code, o.extension_id, " .
                        "(" . order_amount_field('o.') . ") AS total_fee, " .
                        "IFNULL(u.user_name, '" .'Guest'. "') AS buyer ".
                    " FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_order_info') . " AS o " .
                    " LEFT JOIN " .$GLOBALS['ec_globals']['ecs']->table('ec_users'). " AS u ON u.user_id=o.user_id ". $where .
                    " ORDER BY $filter[sort_by] $filter[sort_order] ".
                    " LIMIT " . ($filter['page'] - 1) * $filter['page_size'] . ",$filter[page_size]";
                    
            foreach (array('order_sn', 'consignee', 'email', 'address', 'zipcode', 'tel', 'user_name') AS $val)
            {
                $filter[$val] = stripslashes($filter[$val]);
            }
            set_filter($filter, $sql);
   
        }
        else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        
        $row = M()->getAll($sql);
        
        if(!empty($row))
        {
            /* 格式话数据 */
            foreach ($row AS $key => $value)
            {
                $row[$key]['formated_order_amount'] = price_format($value['order_amount']);
                $row[$key]['formated_money_paid'] = price_format($value['money_paid']);
                $row[$key]['formated_total_fee'] = price_format($value['total_fee']);
                $row[$key]['short_order_time'] = local_date('m-d H:i', $value['add_time']);
                if ($value['order_status'] == OS_INVALID || $value['order_status'] == OS_CANCELED)
                {
                    /* 如果该订单为无效或取消则显示删除链接 */
                    $row[$key]['can_remove'] = 1;
                }
                else
                {
                    $row[$key]['can_remove'] = 0;
                }
            }
        }
        $arr = array('orders' => $row, 'filter' => $filter, 'page_count' => $filter['page_count'], 
                'record_count' => $filter['record_count']);

        return $arr;
        //p($row);die;
    }
    
    
}
