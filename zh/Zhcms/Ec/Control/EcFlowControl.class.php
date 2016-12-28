<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcFlowControl extends EcControl {
    
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
        //echo 'aaa';die;
    }
    
    public function index()
    {
        header("Content-type:text/html;charset=utf-8");
        $ecs=$GLOBALS['ec_globals']['ecs'];
        /*------------------------------------------------------ */
        //-- INPUT
        /*------------------------------------------------------ */
        
        if (!isset($_REQUEST['step']))
        {
            $_REQUEST['step'] = "cart";
        }
        
        $this->assign_template();
        $this->assign_dynamic('EcFlow');
        $position = assign_ur_here(0, '買い物手順');
        $this->assign('page_title',       $position['title']);    // 页面标题
        $this->assign('ur_here',          $position['ur_here']);  // 当前位置
        $this->assign('categories',       get_categories_tree()); // 分类树
        $this->assign('helps',            get_shop_help());       // 网店帮助
        $this->assign('show_marketprice', C('ec_show_marketprice'));
        $this->assign('data_dir',    EC_DATA_DIR);       // 数据目录
        
        /*------------------------------------------------------ */
        //-- 添加商品到购物车
        /*------------------------------------------------------ */
        if ($_REQUEST['step'] == 'add_to_cart')
        {
            $_POST['goods']=strip_tags(urldecode($_POST['goods']));
            $_POST['goods'] = json_str_iconv($_POST['goods']);
            
            if (!empty($_REQUEST['goods_id']) && empty($_POST['goods']))
            {
                if (!is_numeric($_REQUEST['goods_id']) || intval($_REQUEST['goods_id']) <= 0)
                {
                    ec_header("Location:".U('ec/EcIndex/index')."\n");
                }
                $goods_id = intval($_REQUEST['goods_id']);
                exit;
            }
            $result = array('error' => 0, 'message' => '', 'content' => '', 'goods_id' => '');
            $json  = new Json;
            
            if (empty($_POST['goods']))
            {
                $result['error'] = 1;
                die($json->encode($result));
            }
            
            $goods = $json->decode($_POST['goods']);
            
            /* 检查：如果商品有规格，而post的数据没有规格，把商品的规格属性通过JSON传到前台 */
            if (empty($goods->spec) AND empty($goods->quick))
            {
                $sql = "SELECT a.attr_id, a.attr_name, a.attr_type, ".
                                "g.goods_attr_id, g.attr_value, g.attr_price " .
                        'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods_attr') . ' AS g ' .
                                'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_attribute') . ' AS a ON a.attr_id = g.attr_id ' .
                        "WHERE 
                                a.attr_type != 0 AND g.goods_id = '" . $goods->goods_id . "' " .
                        'ORDER BY a.sort_order, g.attr_price, g.goods_attr_id';
                $res = M()->getAll($sql);
                if (!empty($res))
                {
                    $spe_arr = array();
                    foreach ($res AS $row)
                    {
                        $spe_arr[$row['attr_id']]['attr_type'] = $row['attr_type'];
                        $spe_arr[$row['attr_id']]['name']     = $row['attr_name'];
                        $spe_arr[$row['attr_id']]['attr_id']     = $row['attr_id'];
                        $spe_arr[$row['attr_id']]['values'][] = array(
                                                                    'label'        => $row['attr_value'],
                                                                    'price'        => $row['attr_price'],
                                                                    'format_price' => price_format($row['attr_price'], false),
                                                                    'id'           => $row['goods_attr_id']);
                    }
                    $i = 0;
                    $spe_array = array();
                    foreach ($spe_arr AS $row)
                    {
                        $spe_array[]=$row;
                    }
                    $result['error']   = ERR_NEED_SELECT_ATTR;
                    $result['goods_id'] = $goods->goods_id;
                    $result['parent'] = $goods->parent;
                    $result['message'] = $spe_array;
                    die($json->encode($result));
                }
            }
            
            $ec_one_step_buy=C('ec_one_step_buy');
            if ($ec_one_step_buy == '1')
            {
                echo 'TODO:EcFlowControl---1a';die;
                //clear_cart();
            }
            /* 检查：商品数量是否合法 */
            if (!is_numeric($goods->number) || intval($goods->number) <= 0)
            {
                $result['error']   = 1;
                $result['message'] = '正しく商品数を入力してください。';
            }
            /* 更新：购物车 */
            else
            {
                
                if(!empty($goods->spec))
                {
                    foreach ($goods->spec as  $key=>$val )
                    {
                        $goods->spec[$key]=intval($val);
                    }
                }
                // 更新：添加到购物车
                if (addto_cart($goods->goods_id, $goods->number, $goods->spec, $goods->parent))
                {
                    $ec_cart_confirm=C('ec_cart_confirm');
                    if ($ec_cart_confirm > 2)
                    {
                        $result['message'] = '';
                    }
                    else
                    {
                        $result['message'] = $ec_cart_confirm == 1 ? 
                                                "该商品已添加到购物车，您现在还需要继续购物吗？\n如果您希望马上结算，请点击“确定”按钮。\n如果您希望继续购物，请点击“取消”按钮。" : 
                                                "该商品已添加到购物车，您现在还需要继续购物吗？\n如果您希望继续购物，请点击“确定”按钮。\n如果您希望马上结算，请点击“取消”按钮。";
                    }
                    $result['content'] = insert_cart_info();
                    $result['one_step_buy'] = C('ec_one_step_buy');
                }
                else
                {
                    $result['message']  = $GLOBALS['ec_globals']['err']->last_message();
                    $result['error']    = $GLOBALS['ec_globals']['err']->error_no;
                    $result['goods_id'] = stripslashes($goods->goods_id);
                    if (is_array($goods->spec))
                    {
                        $result['product_spec'] = implode(',', $goods->spec);
                    }
                    else
                    {
                        $result['product_spec'] = $goods->spec;
                    }
                }
            }
            
            $ec_cart_confirm=C('ec_cart_confirm');
            $result['confirm_type'] = !empty($ec_cart_confirm) ? $ec_cart_confirm : 2;
            die($json->encode($result));
        }
        elseif ($_REQUEST['step'] == 'link_buy')
        {
            echo 'TODO:EcFlowControl---2';die;
        }
        elseif ($_REQUEST['step'] == 'login')
        {
            echo 'TODO:EcFlowControl---3';die;
        }
        elseif ($_REQUEST['step'] == 'consignee')
        {
            if ($_SERVER['REQUEST_METHOD'] == 'GET')
            {
                /* 取得购物类型 */
                $flow_type = isset($_SESSION['ec_flow_type']) ? intval($_SESSION['ec_flow_type']) : CART_GENERAL_GOODS;
                /*
                 * 收货人信息填写界面
                 */
                if (isset($_REQUEST['direct_shopping']))
                {
                    echo 'TODO:EcFlowControl---4a';die;
                    $_SESSION['ec_direct_shopping'] = 1;
                }
                
                /* 取得国家列表、商店所在国家、商店所在国家的省列表 */
                $this->assign('country_list',       get_regions());
                $this->assign('shop_country',       C('ec_shop_country'));
                $this->assign('shop_province_list', get_regions(1, C('ec_shop_country')));
        
                /* 获得用户所有的收货人信息 */
                if ($_SESSION['ec_user_id'] > 0)
                {
                    $consignee_list = get_consignee_list($_SESSION['ec_user_id']);
                    if (count($consignee_list) < 5)
                    {
                        /* 如果用户收货人信息的总数小于 5 则增加一个新的收货人信息 */
                        $consignee_list[] = array('country' => C('ec_shop_country'), 'email' => isset($_SESSION['ec_email']) ? $_SESSION['ec_email'] : '');
                    }
                }
                else
                {
                    echo 'TODO:EcFlowControl---4b';die;
                }
                
                $this->assign('name_of_region',   array(C('ec_name_of_region_1'), C('ec_name_of_region_2'), C('ec_name_of_region_3'), C('ec_name_of_region_4')));
                $this->assign('consignee_list', $consignee_list);
                
                /* 取得每个收货地址的省市区列表 */
                $province_list = array();
                $city_list = array();
                $district_list = array();
                foreach ($consignee_list as $region_id => $consignee)
                {
                    $consignee['country']  = isset($consignee['country'])  ? intval($consignee['country'])  : 0;
                    $consignee['province'] = isset($consignee['province']) ? intval($consignee['province']) : 0;
                    $consignee['city']     = isset($consignee['city'])     ? intval($consignee['city'])     : 0;
        
                    $province_list[$region_id] = get_regions(1, $consignee['country']);
                    $city_list[$region_id]     = get_regions(2, $consignee['province']);
                    $district_list[$region_id] = get_regions(3, $consignee['city']);
                }
                $this->assign('province_list', $province_list);
                $this->assign('city_list',     $city_list);
                $this->assign('district_list', $district_list);
                
                /* 返回收货人页面代码 */
                $this->assign('real_goods_count', exist_real_goods(0, $flow_type) ? 1 : 0);

            }
            else
            {
                /*
                 * 保存收货人信息
                 */
                $consignee = array(
                    'address_id'    => empty($_POST['address_id']) ? 0  :   intval($_POST['address_id']),
                    'consignee'     => empty($_POST['consignee'])  ? '' :   compile_str(trim($_POST['consignee'])),
                    'country'       => empty($_POST['country'])    ? '' :   intval($_POST['country']),
                    'province'      => empty($_POST['province'])   ? '' :   intval($_POST['province']),
                    'city'          => empty($_POST['city'])       ? '' :   intval($_POST['city']),
                    'district'      => empty($_POST['district'])   ? '' :   intval($_POST['district']),
                    'email'         => empty($_POST['email'])      ? '' :   compile_str($_POST['email']),
                    'address'       => empty($_POST['address'])    ? '' :   compile_str($_POST['address']),
                    'zipcode'       => empty($_POST['zipcode'])    ? '' :   compile_str(make_semiangle(trim($_POST['zipcode']))),
                    'tel'           => empty($_POST['tel'])        ? '' :   compile_str(make_semiangle(trim($_POST['tel']))),
                    'mobile'        => empty($_POST['mobile'])     ? '' :   compile_str(make_semiangle(trim($_POST['mobile']))),
                    'sign_building' => empty($_POST['sign_building']) ? '' :compile_str($_POST['sign_building']),
                    'best_time'     => empty($_POST['best_time'])  ? '' :   compile_str($_POST['best_time']),
                );
                if ($_SESSION['ec_user_id'] > 0)
                {
                    /* 如果用户已经登录，则保存收货人信息 */
                    $consignee['user_id'] = $_SESSION['ec_user_id'];
        
                    save_consignee($consignee, true);
                }
                
                /* 保存到session */
                $_SESSION['ec_flow_consignee'] = stripslashes_deep($consignee);
                ec_header("Location: ".U('index')."&step=checkout\n");
                exit;
            }
            //echo 'TODO:EcFlowControl---4d';die;
        }
        elseif ($_REQUEST['step'] == 'drop_consignee')
        {
            echo 'TODO:EcFlowControl---5';die;
        }
        elseif ($_REQUEST['step'] == 'checkout')
        {
            /* 取得购物类型 */
            $flow_type = isset($_SESSION['ec_flow_type']) ? intval($_SESSION['ec_flow_type']) : CART_GENERAL_GOODS;
    
            /* 团购标志 */
            if ($flow_type == CART_GROUP_BUY_GOODS)
            {
                $this->assign('is_group_buy', 1);
            }
            /* 积分兑换商品 */
            elseif ($flow_type == CART_EXCHANGE_GOODS)
            {
                $this->assign('is_exchange_goods', 1);
            }
            else
            {
                //正常购物流程  清空其他购物流程情况
                $_SESSION['ec_flow_order']['extension_code'] = '';
            }
            /* 检查购物车中是否有商品 */
            $sql = "SELECT COUNT(*) FROM " . $ecs->table('ec_cart') .
                    " WHERE session_id = '" . SESS_ID . "' " .
                    "AND parent_id = 0 AND is_gift = 0 AND rec_type = '$flow_type'";        
            if (M()->getOne($sql,'COUNT(*)') == 0)
            {
                $this->show_message('カードには商品がありません！', '', '', 'warning');
            }
            
            /*
             * 检查用户是否已经登录
             * 如果用户已经登录了则检查是否有默认的收货地址
             * 如果没有登录则跳转到登录和注册页面
             */
            if (empty($_SESSION['ec_direct_shopping']) && $_SESSION['ec_user_id'] == 0)
            {
                /* 用户没有登录且没有选定匿名购物，转向到登录页面 */
                ec_header("Location: ".U('index')."&step=login\n");
                exit;
            }
            $consignee = get_consignee($_SESSION['ec_user_id']);
            
            
            /* 检查收货人信息是否完整 */
            if (!check_consignee_info($consignee, $flow_type))
            {
                /* 如果不完整则转向到收货人信息填写界面 */
                ec_header("Location: ".U('index')."&step=consignee\n");
                exit;
            }
            
            $_SESSION['ec_flow_consignee'] = $consignee;
            $this->assign('consignee', $consignee);
            
            /* 对商品信息赋值 */
            $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计
            $this->assign('goods_list', $cart_goods);
    
            /* 对是否允许修改购物车赋值 */
            if ($flow_type != CART_GENERAL_GOODS || C('ec_one_step_buy') == '1')
            {
                $this->assign('allow_edit_cart', 0);
            }
            else
            {
                $this->assign('allow_edit_cart', 1);
            }
            

            /*
             * 取得订单信息
             */
            $order = flow_order_info();
            $this->assign('order', $order);
            
            
            /* 计算折扣 */
            if ($flow_type != CART_EXCHANGE_GOODS && $flow_type != CART_GROUP_BUY_GOODS)
            {
                //echo 'TODO:EcFlowControl---6a';die; 
                $discount = compute_discount();
                $this->assign('discount', $discount['discount']);
                $favour_name = empty($discount['name']) ? '' : join(',', $discount['name']);
                $this->assign('your_discount', sprintf('セールイベントによって<a href="activity.php"><font color=red>%s</font></a>，%s割引があり',
                                             $favour_name, price_format($discount['discount'])));
            }
            //p($cart_goods);
            /*
             * 计算订单的费用
             */
            $total = order_fee($order, $cart_goods, $consignee);
            
            $this->assign('total', $total);
            $this->assign('shopping_money', sprintf('全商品金額は %s', $total['formated_goods_price']));
            $this->assign('market_price_desc', sprintf( '市場値段 %s より %s (%s)を節約しました', $total['formated_market_price'], $total['formated_saving'], $total['save_rate']));
            
            /* 取得配送列表 */
            $region            = array($consignee['country'], $consignee['province'], $consignee['city'], $consignee['district']);
            $shipping_list     = available_shipping_list($region);
            $cart_weight_price = cart_weight_price($flow_type);
            
            $insure_disabled   = true;
            $cod_disabled      = true;
    
            // 查看购物车中是否全为免运费商品，若是则把运费赋为零
            $sql = 'SELECT count(*) 
                    FROM ' . $ecs->table('ec_cart') . " 
                    WHERE `session_id` = '" . SESS_ID. "' AND `extension_code` != 'package_buy' AND `is_shipping` = 0";
            $shipping_count = M()->getOne($sql,'count(*)');
            
            
            if(!empty($shipping_list))
            {
                foreach ($shipping_list AS $key => $val)
                {
                    $shipping_cfg = unserialize_config($val['configure']);
                    $shipping_fee = ($shipping_count == 0 AND $cart_weight_price['free_shipping'] == 1) ? 
                                            0 : 
                                            shipping_fee($val['shipping_code'], 
                                                        unserialize($val['configure']),
                                                        $cart_weight_price['weight'], 
                                                        $cart_weight_price['amount'], 
                                                        $cart_weight_price['number']);
                    $shipping_list[$key]['format_shipping_fee'] = price_format($shipping_fee, false);
                    $shipping_list[$key]['shipping_fee']        = $shipping_fee;
                    $shipping_list[$key]['free_money']          = price_format($shipping_cfg['free_money'], false);
                    $shipping_list[$key]['insure_formated']     = strpos($val['insure'], '%') === false ?
                        price_format($val['insure'], false) : $val['insure'];
                    /* 当前的配送方式是否支持保价 */
                    if ($val['shipping_id'] == $order['shipping_id'])
                    {
                        $insure_disabled = ($val['insure'] == 0);
                        $cod_disabled    = ($val['support_cod'] == 0);
                    }
                }
            }
            $this->assign('shipping_list',   $shipping_list);
            $this->assign('insure_disabled', $insure_disabled);
            $this->assign('cod_disabled',    $cod_disabled);
            
            /* 取得支付列表 */
            if ($order['shipping_id'] == 0)
            {
                $cod        = true;
                $cod_fee    = 0;
            }
            else
            {
                $shipping = shipping_info($order['shipping_id']);
                $cod = $shipping['support_cod'];
                
                if ($cod)
                {
                    /* 如果是团购，且保证金大于0，不能使用货到付款 */
                    if ($flow_type == CART_GROUP_BUY_GOODS)
                    {
                        echo 'TODO:EcFlowControl---6a';die;
                    }
                    if ($cod)
                    {
                        $shipping_area_info = shipping_area_info($order['shipping_id'], $region);
                        $cod_fee            = $shipping_area_info['pay_fee'];
                    }
                }
                else
                {
                    $cod_fee = 0;
                }

            }
            // 给货到付款的手续费加<span id>，以便改变配送的时候动态显示
            $payment_list = available_payment_list(1, $cod_fee);
            if(isset($payment_list))
            {
                foreach ($payment_list as $key => $payment)
                {
                    if ($payment['is_cod'] == '1')
                    {
                        $payment_list[$key]['format_pay_fee'] = '<span id="ECS_CODFEE">' . $payment['format_pay_fee'] . '</span>';
                    }
                    /* 如果有易宝神州行支付 如果订单金额大于300 则不显示 */
                    if ($payment['pay_code'] == 'yeepayszx' && $total['amount'] > 300)
                    {
                        unset($payment_list[$key]);
                    }
                    /* 如果有余额支付 */
                    if ($payment['pay_code'] == 'balance')
                    {
                        /* 如果未登录，不显示 */
                        if ($_SESSION['ec_user_id'] == 0)
                        {
                            unset($payment_list[$key]);
                        }
                        else
                        {
                            if ($_SESSION['ec_flow_order']['pay_id'] == $payment['pay_id'])
                            {
                                $this->assign('disable_surplus', 1);
                            }
                        }
                    }
                }
            }
            $this->assign('payment_list', $payment_list);
            
            /* 取得包装与贺卡 */
            if ($total['real_goods_count'] > 0)
            {
                /* 只有有实体商品,才要判断包装和贺卡 */
                //TODO:ec_use_package
                //$ec_use_package=C('ec_use_package');
                $ec_use_package=1;
                //p($ec_use_package);die;
                if (!isset($ec_use_package) || $ec_use_package == '1')
                {
                    /* 如果使用包装，取得包装列表及用户选择的包装 */
                    $this->assign('pack_list', pack_list());
                }
                /* 如果使用贺卡，取得贺卡列表及用户选择的贺卡 */
                //TODO:$ec_use_card=C('ec_use_card');
                $ec_use_card=1;
                if (!isset($ec_use_card) || $ec_use_card == '1')
                {
                    $this->assign('card_list', card_list());
                }
            }
            
            $user_info = user_info($_SESSION['ec_user_id']);
            
            /* 如果使用余额，取得用户余额 */
            $ec_use_surplus=C('ec_use_surplus');
            if (
                    (!isset($ec_use_surplus) || $ec_use_surplus== '1')
                    && $_SESSION['ec_user_id'] > 0
                    && $user_info['user_money'] > 0
                )
            {
                // 能使用余额
                $this->assign('allow_use_surplus', 1);
                $this->assign('your_surplus', $user_info['user_money']);
            }
            
            /* 如果使用积分，取得用户可用积分及本订单最多可以使用的积分 */
            $ec_use_integral=C('ec_use_integral');
            if (
                    (!isset($ec_use_integral) || $ec_use_integral == '1')
                    && $_SESSION['ec_user_id'] > 0
                    && $user_info['pay_points'] > 0
                    && ($flow_type != CART_GROUP_BUY_GOODS && $flow_type != CART_EXCHANGE_GOODS)
                )
            {
                // 能使用积分
                $this->assign('allow_use_integral', 1);
                $this->assign('order_max_integral', $this -> flow_available_points());  // 可用积分
                $this->assign('your_integral',      $user_info['pay_points']); // 用户积分
            }
                        
            /* 如果使用红包，取得用户可以使用的红包及用户选择的红包 */
            $ec_use_bonus=C('ec_use_bonus');
            if (
                    (!isset($ec_use_bonus) || $ec_use_bonus == '1')
                    && ($flow_type != CART_GROUP_BUY_GOODS && $flow_type != CART_EXCHANGE_GOODS)
                )
            {
                // 取得用户可用红包
                $user_bonus = user_bonus($_SESSION['ec_user_id'], $total['goods_price']);
                if (!empty($user_bonus))
                {
                    foreach ($user_bonus AS $key => $val)
                    {
                        $user_bonus[$key]['bonus_money_formated'] = price_format($val['type_money'], false);
                    }
                    $this->assign('bonus_list', $user_bonus);
                }
        
                // 能使用红包
                $this->assign('allow_use_bonus', 1);
            }
            
            /* 如果使用缺货处理，取得缺货处理列表 */
            $ec_use_how_oos=C('ec_use_how_oos');
            if (!isset($ec_use_how_oos) || $ec_use_how_oos == '1')
            {
                /* 缺货处理 */
                $_LANG['oos'][OOS_WAIT] = '等待所有商品备齐后再发';
                $_LANG['oos'][OOS_CANCEL] = '取消订单';
                $_LANG['oos'][OOS_CONSULT] = '与店主协商';
                if (is_array($_LANG['oos']) && !empty($_LANG['oos']))
                {
                    $this->assign('how_oos_list', $_LANG['oos']);
                }
            }
            
            /* 如果能开发票，取得发票内容列表 */
            $ec_can_invoice=C('ec_can_invoice');
            $ec_invoice_content=C('ec_invoice_content');
            if (
                    (!isset($ec_can_invoice) || $ec_can_invoice == '1')
                    && isset($ec_invoice_content)
                    && trim($ec_invoice_content) != '' 
                    && $flow_type != CART_EXCHANGE_GOODS
                )
            {
                $invoice_type_type=array(
                                    0=>'1',
                                    1=>'2',
                                    2=>'',
                                );
                $invoice_type_rate=array(
                                    0=>1,
                                    1=>1.5,
                                    2=>0,
                                );
                
                $inv_content_list = explode("\n", str_replace("\r", '', C('ec_invoice_content')));
                $this->assign('inv_content_list', $inv_content_list);
                
                $inv_type_list = array();
                foreach ($invoice_type_type as $key => $type)
                {
                    if (!empty($type))
                    {
                        $inv_type_list[$type] = $type . ' [' . floatval($invoice_type_rate[$key]) . '%]';
                    }
                }
                $this->assign('inv_type_list', $inv_type_list);
                 
            }
            /* 保存 session */
            $_SESSION['ec_flow_order'] = $order;
        }
        elseif ($_REQUEST['step'] == 'select_shipping')
        {
            /*------------------------------------------------------ */
            //-- 改变配送方式
            /*------------------------------------------------------ */
            $json = new JSON;
            $result = array('error' => '', 'content' => '', 'need_insure' => 0);
            
            /* 取得购物类型 */
            $flow_type = isset($_SESSION['ec_flow_type']) ? intval($_SESSION['ec_flow_type']) : CART_GENERAL_GOODS;
            
            /* 获得收货人信息 */
            $consignee = get_consignee($_SESSION['ec_user_id']);
            
            /* 对商品信息赋值 */
            $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计
            
            if (empty($cart_goods) || !check_consignee_info($consignee, $flow_type))
            {
                $result['error'] = '您的购物车中没有商品！';
            }
            else
            {
                /* 取得订单信息 */
                $order = flow_order_info();
                
                $order['shipping_id'] = intval($_REQUEST['shipping']);
                $regions = array($consignee['country'], $consignee['province'], $consignee['city'], $consignee['district']);
                $shipping_info = shipping_area_info($order['shipping_id'], $regions);
                    
                /* 计算订单的费用 */
                $total = order_fee($order, $cart_goods, $consignee);
                $this->assign('total', $total);
        
                /* 取得可以得到的积分和红包 */
                $this->assign('total_integral', cart_amount(false, $flow_type) - $total['bonus'] - $total['integral_money']);
                $this->assign('total_bonus',    price_format(get_total_bonus(), false));

                /* 团购标志 */
                if ($flow_type == CART_GROUP_BUY_GOODS)
                {
                    $this->assign('is_group_buy', 1);
                }
                
                $result['cod_fee']     = $shipping_info['pay_fee'];
                
                if (strpos($result['cod_fee'], '%') === false)
                {
                    $result['cod_fee'] = price_format($result['cod_fee'], false);
                }
                $result['need_insure'] = ($shipping_info['insure'] > 0 && !empty($order['need_insure'])) ? 1 : 0;
                $result['content']     = $this->fetch('template/' . C('WEB_STYLE') . '/ec/common/library/order_total.lbi');
            }
            
            echo $json->encode($result);
            exit;
        }
        elseif ($_REQUEST['step'] == 'select_insure')
        {
            $json = new JSON;
            $result = array('error' => '', 'content' => '', 'need_insure' => 0);
            
            /* 取得购物类型 */
            $flow_type = isset($_SESSION['ec_flow_type']) ? intval($_SESSION['ec_flow_type']) : CART_GENERAL_GOODS;
            
            /* 获得收货人信息 */
            $consignee = get_consignee($_SESSION['ec_user_id']);

            /* 对商品信息赋值 */
            $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计
            
            if (empty($cart_goods) || !check_consignee_info($consignee, $flow_type))
            {
                $result['error'] = '您的购物车中没有商品！';
            }else
            {
                /* 取得订单信息 */
                $order = flow_order_info();
                
                $order['need_insure'] = intval($_REQUEST['insure']);
                
                /* 保存 session */
                $_SESSION['ec_flow_order'] = $order;
                
                /* 计算订单的费用 */
                $total = order_fee($order, $cart_goods, $consignee);
                $this->assign('total', $total);
                
                /* 取得可以得到的积分和红包 */
                $this->assign('total_integral', cart_amount(false, $flow_type) - $total['bonus'] - $total['integral_money']);
                $this->assign('total_bonus',    price_format(get_total_bonus(), false));
                
                /* 团购标志 */
                if ($flow_type == CART_GROUP_BUY_GOODS)
                {
                    $this->assign('is_group_buy', 1);
                }
        
                $result['content'] = $this->fetch('template/' . C('WEB_STYLE') . '/ec/common/library/order_total.lbi');

            }
            echo $json->encode($result);
            exit;
        }
        elseif ($_REQUEST['step'] == 'select_payment')
        {
            $json = new JSON;
            $result = array('error' => '', 'content' => '', 'need_insure' => 0, 'payment' => 1);
        
            /* 取得购物类型 */
            $flow_type = isset($_SESSION['ec_flow_type']) ? intval($_SESSION['ec_flow_type']) : CART_GENERAL_GOODS;
        
            /* 获得收货人信息 */
            $consignee = get_consignee($_SESSION['ec_user_id']);
        
            /* 对商品信息赋值 */
            $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计
            if (empty($cart_goods) || !check_consignee_info($consignee, $flow_type))
            {
                $result['error'] = '您的购物车中没有商品！';
            }
            else
            {
                /* 取得订单信息 */
                $order = flow_order_info();
        
                $order['pay_id'] = intval($_REQUEST['payment']);
                $payment_info = payment_info($order['pay_id']);
                $result['pay_code'] = $payment_info['pay_code'];
        
                /* 保存 session */
                $_SESSION['ec_flow_order'] = $order;
        
                /* 计算订单的费用 */
                $total = order_fee($order, $cart_goods, $consignee);
                $this->assign('total', $total);
                
                /* 取得可以得到的积分和红包 */
                $this->assign('total_integral', cart_amount(false, $flow_type) - $total['bonus'] - $total['integral_money']);
                $this->assign('total_bonus',    price_format(get_total_bonus(), false));
                
                /* 团购标志 */
                if ($flow_type == CART_GROUP_BUY_GOODS)
                {
                    $this->assign('is_group_buy', 1);
                }
        
                $result['content'] = $this->fetch('template/' . C('WEB_STYLE') . '/ec/common/library/order_total.lbi');
            }
            echo $json->encode($result);
            exit;
        }
        elseif ($_REQUEST['step'] == 'select_pack')
        {
            $json = new JSON;
            $result = array('error' => '', 'content' => '', 'need_insure' => 0);
        
            /* 取得购物类型 */
            $flow_type = isset($_SESSION['ec_flow_type']) ? intval($_SESSION['ec_flow_type']) : CART_GENERAL_GOODS;
        
            /* 获得收货人信息 */
            $consignee = get_consignee($_SESSION['ec_user_id']);
        
            /* 对商品信息赋值 */
            $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计
            if (empty($cart_goods) || !check_consignee_info($consignee, $flow_type))
            {
                $result['error'] = '您的购物车中没有商品！';
            }
            else
            {
                /* 取得订单信息 */
                $order = flow_order_info();
        
                $order['pack_id'] = intval($_REQUEST['pack']);
        
                /* 保存 session */
                $_SESSION['ec_flow_order'] = $order;
        
                /* 计算订单的费用 */
                $total = order_fee($order, $cart_goods, $consignee);
                //p($total);die;
                $this->assign('total', $total);
                
                /* 取得可以得到的积分和红包 */
                $this->assign('total_integral', cart_amount(false, $flow_type) - $total['bonus'] - $total['integral_money']);
                $this->assign('total_bonus',    price_format(get_total_bonus(), false));
        
                /* 团购标志 */
                if ($flow_type == CART_GROUP_BUY_GOODS)
                {
                    $this->assign('is_group_buy', 1);
                }
        
                $result['content'] = $this->fetch('template/' . C('WEB_STYLE') . '/ec/common/library/order_total.lbi');

            }
            echo $json->encode($result);
            exit;
    
        }
        elseif ($_REQUEST['step'] == 'select_card')
        {
            $json = new JSON;
            $result = array('error' => '', 'content' => '', 'need_insure' => 0);
        
            /* 取得购物类型 */
            $flow_type = isset($_SESSION['ec_flow_type']) ? intval($_SESSION['ec_flow_type']) : CART_GENERAL_GOODS;
        
            /* 获得收货人信息 */
            $consignee = get_consignee($_SESSION['ec_user_id']);
        
            /* 对商品信息赋值 */
            $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计
        
            if (empty($cart_goods) || !check_consignee_info($consignee, $flow_type))
            {
                $result['error'] = '您的购物车中没有商品！';
            }
            else
            {
                /* 取得订单信息 */
                $order = flow_order_info();
        
                $order['card_id'] = intval($_REQUEST['card']);
        
                /* 保存 session */
                $_SESSION['ec_flow_order'] = $order;
        
                /* 计算订单的费用 */
                $total = order_fee($order, $cart_goods, $consignee);
                $this->assign('total', $total);
        
                /* 取得可以得到的积分和红包 */
                $this->assign('total_integral', cart_amount(false, $flow_type) - $order['bonus'] - $total['integral_money']);
                $this->assign('total_bonus',    price_format(get_total_bonus(), false));
        
                /* 团购标志 */
                if ($flow_type == CART_GROUP_BUY_GOODS)
                {
                    $this->assign('is_group_buy', 1);
                }
        
                $result['content'] = $this->fetch('template/' . C('WEB_STYLE') . '/ec/common/library/order_total.lbi');
            }
            echo $json->encode($result);
            exit;
        }
        elseif ($_REQUEST['step'] == 'change_surplus')
        {
            
        }
        elseif ($_REQUEST['step'] == 'change_integral')
        {
            $json = new JSON;
            $result = array('error' => '', 'content' => '', 'need_insure' => 0);
            
            $points    = floatval($_GET['points']);
            $user_info = user_info($_SESSION['ec_user_id']);
            
            /* 取得订单信息 */
            $order = flow_order_info();
            
            $flow_points = $this -> flow_available_points();  // 该订单允许使用的积分
            $user_points = $user_info['pay_points']; // 用户的积分总数
    
            if ($points > $user_points)
            {
                $result['error'] = '您使用的积分不能超过您现有的积分。';
            }
            elseif ($points > $flow_points)
            {
                $result['error'] = sprintf("您使用的积分不能超过%d", $flow_points);
            }
            else
            {
                /* 取得购物类型 */
                $flow_type = isset($_SESSION['ec_flow_type']) ? intval($_SESSION['ec_flow_type']) : CART_GENERAL_GOODS;
                $order['integral'] = $points;
                
                /* 获得收货人信息 */
                $consignee = get_consignee($_SESSION['ec_user_id']);
                
                /* 对商品信息赋值 */
                $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计
                
                if (empty($cart_goods) || !check_consignee_info($consignee, $flow_type))
                {
                    $result['error'] = '您的购物车中没有商品！';
                }
                else
                {
                    /* 计算订单的费用 */
                    $total = order_fee($order, $cart_goods, $consignee);
                    $this->assign('total',  $total);
        
                    /* 团购标志 */
                    if ($flow_type == CART_GROUP_BUY_GOODS)
                    {
                        $this->assign('is_group_buy', 1);
                    }
        
                    $result['content'] = $this->fetch('template/' . C('WEB_STYLE') . '/ec/common/library/order_total.lbi');
                    $result['error'] = '';
                }
            }
            die($json->encode($result));
            
        }
        elseif ($_REQUEST['step'] == 'change_bonus')
        {
            $json = new JSON;
            $result = array('error' => '', 'content' => '', 'need_insure' => 0);
            
            /* 取得购物类型 */
            $flow_type = isset($_SESSION['ec_flow_type']) ? intval($_SESSION['ec_flow_type']) : CART_GENERAL_GOODS;
            
            /* 获得收货人信息 */
            $consignee = get_consignee($_SESSION['ec_user_id']);
            
            /* 对商品信息赋值 */
            $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计
    
            if (empty($cart_goods) || !check_consignee_info($consignee, $flow_type))
            {
                $result['error'] = '您的购物车中没有商品！';
            }
            else
            {
                /* 取得订单信息 */
                $order = flow_order_info();
                
                $bonus = bonus_info(intval($_GET['bonus']));
                
                if ((!empty($bonus) && $bonus['user_id'] == $_SESSION['ec_user_id']) || $_GET['bonus'] == 0)
                {
                    $order['bonus_id'] = intval($_GET['bonus']);
                }
                else
                {
                    $order['bonus_id'] = 0;
                    $result['error'] = "您选择的红包并不存在。";
                }
                
                /* 计算订单的费用 */
                $total = order_fee($order, $cart_goods, $consignee);
                $this->assign('total', $total);
        
                /* 团购标志 */
                if ($flow_type == CART_GROUP_BUY_GOODS)
                {
                    $this->assign('is_group_buy', 1);
                }
        
                $result['content'] = $this->fetch('template/' . C('WEB_STYLE') . '/ec/common/library/order_total.lbi');
            }
            die($json->encode($result));
        }
        elseif ($_REQUEST['step'] == 'change_needinv')
        {
            $json = new JSON;
            $result = array('error' => '', 'content' => '');
            
            $_GET['inv_type'] = !empty($_GET['inv_type']) ? json_str_iconv(urldecode($_GET['inv_type'])) : '';
            $_GET['invPayee'] = !empty($_GET['invPayee']) ? json_str_iconv(urldecode($_GET['invPayee'])) : '';
            $_GET['inv_content'] = !empty($_GET['inv_content']) ? json_str_iconv(urldecode($_GET['inv_content'])) : '';
            
            /* 取得购物类型 */
            $flow_type = isset($_SESSION['ec_flow_type']) ? intval($_SESSION['ec_flow_type']) : CART_GENERAL_GOODS;
            
            /* 获得收货人信息 */
            $consignee = get_consignee($_SESSION['ec_user_id']);
        
            /* 对商品信息赋值 */
            $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计
            
            
            if (empty($cart_goods) || !check_consignee_info($consignee, $flow_type))
            {
                $result['error'] = '您的购物车中没有商品！';
                die($json->encode($result));
            }
            else
            {
                /* 取得订单信息 */
                $order = flow_order_info();
                
                if (isset($_GET['need_inv']) && intval($_GET['need_inv']) == 1)
                {
                    $order['need_inv']    = 1;
                    $order['inv_type']    = trim(stripslashes($_GET['inv_type']));
                    $order['inv_payee']   = trim(stripslashes($_GET['inv_payee']));
                    $order['inv_content'] = trim(stripslashes($_GET['inv_content']));
                }
                else
                {
                    $order['need_inv']    = 0;
                    $order['inv_type']    = '';
                    $order['inv_payee']   = '';
                    $order['inv_content'] = '';
                }
                
                /* 计算订单的费用 */
                $total = order_fee($order, $cart_goods, $consignee);
                $this->assign('total', $total);
                
                /* 团购标志 */
                if ($flow_type == CART_GROUP_BUY_GOODS)
                {
                    $this->assign('is_group_buy', 1);
                }
        
                die($this->fetch('template/' . C('WEB_STYLE') . '/ec/common/library/order_total.lbi'));
            }
        }
        elseif ($_REQUEST['step'] == 'change_oos')
        {
            /*------------------------------------------------------ */
            //-- 改变缺货处理时的方式
            /*------------------------------------------------------ */
        
            /* 取得订单信息 */
            $order = flow_order_info();
        
            $order['how_oos'] = intval($_GET['oos']);
        
            /* 保存 session */
            $_SESSION['ec_flow_order'] = $order;
        }
        elseif ($_REQUEST['step'] == 'check_surplus')
        {
            /*------------------------------------------------------ */
            //-- 检查用户输入的余额
            /*------------------------------------------------------ */
            $surplus   = floatval($_GET['surplus']);
            $user_info = user_info($_SESSION['ec_user_id']);
        
            if (($user_info['user_money'] + $user_info['credit_line'] < $surplus))
            {
                die('该订单使用 %s 余额支付，现在用户余额不足');
            }
        
            exit;
        }
        elseif ($_REQUEST['step'] == 'check_integral')
        {
            /*------------------------------------------------------ */
            //-- 检查用户输入的余额
            /*------------------------------------------------------ */
            $points      = floatval($_GET['integral']);
            $user_info   = user_info($_SESSION['ec_user_id']);
            $flow_points = $this -> flow_available_points();  // 该订单允许使用的积分
            $user_points = $user_info['pay_points']; // 用户的积分总数
        
            if ($points > $user_points)
            {
                die('该订单使用 %s 积分支付，现在用户积分不足');
            }
        
            if ($points > $flow_points)
            {
                die(sprintf("您使用的积分不能超过%d", $flow_points));
            }
        
            exit;
        }
        elseif ($_REQUEST['step'] == 'done')
        {
            /* 取得购物类型 */
            $flow_type = isset($_SESSION['ec_flow_type']) ? intval($_SESSION['ec_flow_type']) : CART_GENERAL_GOODS;
            
            /* 检查购物车中是否有商品 */
            $sql = "SELECT COUNT(*) FROM " . $ecs->table('ec_cart') .
                    " WHERE session_id = '" . SESS_ID . "' " .
                    "AND parent_id = 0 AND is_gift = 0 AND rec_type = '$flow_type'";
            if (M()->getOne($sql,'COUNT(*)') == 0)
            {
                $this -> show_message('カードには商品がない！', '', '', 'warning');
            }
            
            /* 检查商品库存 */
            /* 如果使用库存，且下订单时减库存，则减少库存 */
            $ec_use_storage=C('ec_use_storage');
            $ec_stock_dec_time=C('ec_stock_dec_time');
            if ($ec_use_storage == '1' && $ec_stock_dec_time == SDT_PLACE)
            {
                $cart_goods_stock = get_cart_goods();
                $_cart_goods_stock = array();
                foreach ($cart_goods_stock['goods_list'] as $value)
                {
                    $_cart_goods_stock[$value['rec_id']] = $value['goods_number'];
                }
                $this -> flow_cart_stock($_cart_goods_stock);
                unset($cart_goods_stock, $_cart_goods_stock);
            }
            
            /*
             * 检查用户是否已经登录
             * 如果用户已经登录了则检查是否有默认的收货地址
             * 如果没有登录则跳转到登录和注册页面
             */
            if (empty($_SESSION['ec_direct_shopping']) && $_SESSION['ec_user_id'] == 0)
            {
                /* 用户没有登录且没有选定匿名购物，转向到登录页面 */
                ec_header("Location: ".U('index')."&step=login\n");
                exit;
            }
            $consignee = get_consignee($_SESSION['ec_user_id']);

            /* 检查收货人信息是否完整 */
            if (!check_consignee_info($consignee, $flow_type))
            {
                /* 如果不完整则转向到收货人信息填写界面 */
                ec_header("Location: ".U('index')."&step=consignee\n");
                exit;
            }
            
            $_POST['how_oos'] = isset($_POST['how_oos']) ? intval($_POST['how_oos']) : 0;
            $_POST['card_message'] = isset($_POST['card_message']) ? compile_str($_POST['card_message']) : '';
            $_POST['inv_type'] = !empty($_POST['inv_type']) ? compile_str($_POST['inv_type']) : '';
            $_POST['inv_payee'] = isset($_POST['inv_payee']) ? compile_str($_POST['inv_payee']) : '';
            $_POST['inv_content'] = isset($_POST['inv_content']) ? compile_str($_POST['inv_content']) : '';
            $_POST['postscript'] = isset($_POST['postscript']) ? compile_str($_POST['postscript']) : '';
            
            $order = array(
                            'shipping_id'     => intval($_POST['shipping']),
                            'pay_id'          => intval($_POST['payment']),
                            'pack_id'         => isset($_POST['pack']) ? intval($_POST['pack']) : 0,
                            'card_id'         => isset($_POST['card']) ? intval($_POST['card']) : 0,
                            'card_message'    => trim($_POST['card_message']),
                            'surplus'         => isset($_POST['surplus']) ? floatval($_POST['surplus']) : 0.00,
                            'integral'        => isset($_POST['integral']) ? intval($_POST['integral']) : 0,
                            'bonus_id'        => isset($_POST['bonus']) ? intval($_POST['bonus']) : 0,
                            'need_inv'        => empty($_POST['need_inv']) ? 0 : 1,
                            'inv_type'        => $_POST['inv_type'],
                            'inv_payee'       => trim($_POST['inv_payee']),
                            'inv_content'     => $_POST['inv_content'],
                            'postscript'      => trim($_POST['postscript']),
                            'how_oos'         => isset($_LANG['oos'][$_POST['how_oos']]) ? addslashes($_LANG['oos'][$_POST['how_oos']]) : '',
                            'need_insure'     => isset($_POST['need_insure']) ? intval($_POST['need_insure']) : 0,
                            'user_id'         => $_SESSION['ec_user_id'],
                            'add_time'        => gmtime(),
                            'order_status'    => OS_UNCONFIRMED,
                            'shipping_status' => SS_UNSHIPPED,
                            'pay_status'      => PS_UNPAYED,
                            'agency_id'       => get_agency_by_regions(array($consignee['country'], $consignee['province'], $consignee['city'], $consignee['district']))
                        );
            /* 扩展信息 */
            if (isset($_SESSION['ec_flow_type']) && intval($_SESSION['ec_flow_type']) != CART_GENERAL_GOODS)
            {
                $order['extension_code'] = $_SESSION['ec_extension_code'];
                $order['extension_id'] = $_SESSION['ec_extension_id'];
            }
            else
            {
                $order['extension_code'] = '';
                $order['extension_id'] = 0;
            }
            
            /* 检查积分余额是否合法 */
            $user_id = $_SESSION['ec_user_id'];
            if ($user_id > 0)
            {
                $user_info = user_info($user_id);
                $order['surplus'] = min($order['surplus'], $user_info['user_money'] + $user_info['credit_line']);
                if ($order['surplus'] < 0)
                {
                    $order['surplus'] = 0;
                }
                // 查询用户有多少积分
                $flow_points = $this -> flow_available_points();  // 该订单允许使用的积分
                $user_points = $user_info['pay_points']; // 用户的积分总数
                $order['integral'] = min($order['integral'], $user_points, $flow_points);
                if ($order['integral'] < 0)
                {
                    $order['integral'] = 0;
                }
            }
            else
            {
                $order['surplus']  = 0;
                $order['integral'] = 0;
            }
            
            /* 检查红包是否存在 */
            if ($order['bonus_id'] > 0)
            {
                $bonus = bonus_info($order['bonus_id']);
                if (
                        empty($bonus) || 
                        $bonus['user_id'] != $user_id || 
                        $bonus['order_id'] > 0 || 
                        $bonus['min_goods_amount'] > cart_amount(true, $flow_type)
                    )
                {
                    $order['bonus_id'] = 0;
                }
            }
            elseif (isset($_POST['bonus_sn']))
            {
                $bonus_sn = trim($_POST['bonus_sn']);
                $bonus = bonus_info(0, $bonus_sn);
                $now = gmtime();
                if (
                        empty($bonus) || 
                        $bonus['user_id'] > 0 || 
                        $bonus['order_id'] > 0 || 
                        $bonus['min_goods_amount'] > cart_amount(true, $flow_type) || $now > $bonus['use_end_date']
                    )
                {  
                }
                else
                {
                    if ($user_id > 0)
                    {
                        $sql = "UPDATE " . $ecs->table('ec_user_bonus') . " SET user_id = '$user_id' WHERE bonus_id = '$bonus[bonus_id]' LIMIT 1";
                        M()->query($sql);
                    }
                    $order['bonus_id'] = $bonus['bonus_id'];
                    $order['bonus_sn'] = $bonus_sn;
                }
            }
            
            /* 订单中的商品 */
            $cart_goods = cart_goods($flow_type);
    
            if (empty($cart_goods))
            {
                $this -> show_message('カードには商品ない！', 'トップ戻る', U('ec/EcIndex/index'), 'warning');
            }
            $ec_min_goods_amount=C('ec_min_goods_amount');
            /* 检查商品总额是否达到最低限购金额 */
            if ($flow_type == CART_GENERAL_GOODS && cart_amount(true, CART_GENERAL_GOODS) < $ec_min_goods_amount)
            {
                $this -> show_message(sprintf('購入した商品を店舗の最小金額%s 満たないから ，注文できません。', price_format($ec_min_goods_amount, false)));
            }
            
            /* 收货人信息 */
            foreach ($consignee as $key => $value)
            {
                $order[$key] = addslashes($value);
            }
            
            /* 判断是不是实体商品 */
            foreach ($cart_goods AS $val)
            {
                /* 统计实体商品的个数 */
                if ($val['is_real'])
                {
                    $is_real_good=1;
                }
            }
            
            if(isset($is_real_good))
            {
                $sql="SELECT shipping_id FROM " . $ecs->table('ec_shipping') . " 
                        WHERE shipping_id=".$order['shipping_id'] ." AND enabled =1"; 
                if(!M()->getOne($sql,'shipping_id'))
                {
                    $this -> show_message('配達方式を選択してください。');
                }
            }
            /* 订单中的总额 */
            $total = order_fee($order, $cart_goods, $consignee);
            $order['bonus']        = $total['bonus'];
            $order['goods_amount'] = $total['goods_price'];
            $order['discount']     = $total['discount'];
            $order['surplus']      = $total['surplus'];
            $order['tax']          = $total['tax'];
            
            // 购物车中的商品能享受红包支付的总额
            $discount_amout = compute_discount_amount();
            // 红包和积分最多能支付的金额为商品总额
            $temp_amout = $order['goods_amount'] - $discount_amout;
            if ($temp_amout <= 0)
            {
                $order['bonus_id'] = 0;
            }
            /* 配送方式 */
            if ($order['shipping_id'] > 0)
            {
                $shipping = shipping_info($order['shipping_id']);
                $order['shipping_name'] = addslashes($shipping['shipping_name']);
            }
            $order['shipping_fee'] = $total['shipping_fee'];
            $order['insure_fee']   = $total['shipping_insure'];
            
            /* 支付方式 */
            if ($order['pay_id'] > 0)
            {
                $payment = payment_info($order['pay_id']);
                $order['pay_name'] = addslashes($payment['pay_name']);
            }
            $order['pay_fee'] = $total['pay_fee'];
            $order['cod_fee'] = $total['cod_fee'];
            
            /* 商品包装 */
            if ($order['pack_id'] > 0)
            {
                $pack               = pack_info($order['pack_id']);
                $order['pack_name'] = addslashes($pack['pack_name']);
            }
            $order['pack_fee'] = $total['pack_fee'];
        
            /* 祝福贺卡 */
            if ($order['card_id'] > 0)
            {
                $card               = card_info($order['card_id']);
                $order['card_name'] = addslashes($card['card_name']);
            }
            $order['card_fee']      = $total['card_fee'];
            
            $order['order_amount']  = number_format($total['amount'], 2, '.', '');
            
            /* 如果全部使用余额支付，检查余额是否足够 */
            if ($payment['pay_code'] == 'balance' && $order['order_amount'] > 0)
            {
                if($order['surplus'] >0) //余额支付里如果输入了一个金额
                {
                    $order['order_amount'] = $order['order_amount'] + $order['surplus'];
                    $order['surplus'] = 0;
                }
                if ($order['order_amount'] > ($user_info['user_money'] + $user_info['credit_line']))
                {
                    $this -> show_message('残高が足りない，他の支払い方式を選んでください');
                }
                else
                {
                    $order['surplus'] = $order['order_amount'];
                    $order['order_amount'] = 0;
                }
            }
            /* 如果订单金额为0（使用余额或积分或红包支付），修改订单状态为已确认、已付款 */
            if ($order['order_amount'] <= 0)
            {
                $order['order_status'] = OS_CONFIRMED;
                $order['confirm_time'] = gmtime();
                $order['pay_status']   = PS_PAYED;
                $order['pay_time']     = gmtime();
                $order['order_amount'] = 0;
            }
            
            $order['integral_money']   = $total['integral_money'];
            $order['integral']         = $total['integral'];
            
            if ($order['extension_code'] == 'exchange_goods')
            {
                $order['integral_money']   = 0;
                $order['integral']         = $total['exchange_integral'];
            }
            
            $order['from_ad']          = !empty($_SESSION['ec_from_ad']) ? $_SESSION['ec_from_ad'] : '0';
            $order['referer']          = !empty($_SESSION['ec_referer']) ? addslashes($_SESSION['ec_referer']) : '';
            
            /* 记录扩展信息 */
            if ($flow_type != CART_GENERAL_GOODS)
            {
                $order['extension_code'] = $_SESSION['ec_extension_code'];
                $order['extension_id'] = $_SESSION['ec_extension_id'];
            }
            
            /*$affiliate = unserialize($_CFG['affiliate']);
            if(isset($affiliate['on']) && $affiliate['on'] == 1 && $affiliate['config']['separate_by'] == 1)
            {
                //推荐订单分成
                $parent_id = get_affiliate();
                if($user_id == $parent_id)
                {
                    $parent_id = 0;
                }
            }
            elseif(isset($affiliate['on']) && $affiliate['on'] == 1 && $affiliate['config']['separate_by'] == 0)
            {
                //推荐注册分成
                $parent_id = 0;
            }
            else
            {
                //分成功能关闭
                $parent_id = 0;
            }*/
            $parent_id=0;
            $order['parent_id'] = $parent_id;
            

 
            //p($order);die;
            /* 插入订单表 */
            $error_no = 0;
            do
            {
                $order['order_sn'] = get_order_sn(); //获取新订单号
                //$order['order_sn']="2015060431552";
                $info=M()->autoExecuteReturnInfo($GLOBALS['ec_globals']['ecs']->table('ec_order_info'), $order, 'INSERT');
        
                $error_no =$info['errno'];
                if ($error_no > 0 && $error_no != 1062)
                {
                    die($info['error']);
                }
            }
            while ($error_no == 1062); //如果是订单号重复则重新提交数据*/


            $new_order_id = $info['insert_id'];
            $order['order_id'] = $new_order_id;
            
            /* 插入订单商品 */
            $sql = "INSERT INTO " . $ecs->table('ec_order_goods') . "( " .
                        "order_id, goods_id, goods_name, goods_sn, product_id, goods_number, market_price, ".
                        "goods_price, goods_attr, is_real, extension_code, parent_id, is_gift, goods_attr_id) ".
                    " SELECT '$new_order_id', goods_id, goods_name, goods_sn, product_id, goods_number, market_price, ".
                        "goods_price, goods_attr, is_real, extension_code, parent_id, is_gift, goods_attr_id".
                    " FROM " .$ecs->table('ec_cart') .
                    " WHERE session_id = '".SESS_ID."' AND rec_type = '$flow_type'";
            M()->exe($sql);
            /* 修改拍卖活动状态 */
            if ($order['extension_code']=='auction')
            {
                echo 'TODO:----flowControl--done--1';die;
                $sql = "UPDATE ". $ecs->table('ec_goods_activity') ." SET is_finished='2' WHERE act_id=".$order['extension_id'];
                M()->exe($sql);
            }
            
            /* 处理余额、积分、红包 */
            if ($order['user_id'] > 0 && $order['surplus'] > 0)
            {
                //echo 'TODO:----flowControl--done--2';die;
                log_account_change($order['user_id'], $order['surplus'] * (-1), 0, 0, 0, sprintf('注文支払い %s', $order['order_sn']));
            }
            if ($order['user_id'] > 0 && $order['integral'] > 0)
            {
                //echo 'TODO:----flowControl--done--3';die;
                log_account_change($order['user_id'], 0, 0, 0, $order['integral'] * (-1), sprintf('注文支払い %s', $order['order_sn']));
            }
            if ($order['bonus_id'] > 0 && $temp_amout > 0)
            {
                //echo 'TODO:----flowControl--done--4';die;
                use_bonus($order['bonus_id'], $new_order_id);
            }
            /* 如果使用库存，且下订单时减库存，则减少库存 */
            $ec_use_storage=C('ec_use_storage');
            $ec_stock_dec_time=C('ec_stock_dec_time');
            if ($ec_use_storage == '1' && $ec_stock_dec_time == SDT_PLACE)
            {
                //echo 'TODO:----flowControl--done--5';die;
                change_order_goods_storage($order['order_id'], true, SDT_PLACE);
            }
            
            /* 给商家发邮件 */
            /* 增加是否给客服发送邮件选项 */
            $ec_send_service_email=C('ec_send_service_email');
            $ec_service_email=C('ec_service_email');
            if ($ec_send_service_email && $ec_service_email != '')
            {
                //echo 'TODO:----flowControl--done--6';die;
                $tpl = get_mail_template('remind_of_new_order');
                $this->assign('order', $order);
                $this->assign('goods_list', $cart_goods);
                $this->assign('shop_name', C('ec_shop_name'));
                $this->assign('send_date', date(C('ec_time_format')));
                $content= $this -> view->contentCompile('str:' . $tpl['template_content']);
                $mail_result = Mail::send($ec_service_email, C('ec_shop_name'), $tpl['template_subject'], $content);
            }
            
            /* 如果需要，发短信 */
            /*if ($_CFG['sms_order_placed'] == '1' && $_CFG['sms_shop_mobile'] != '')
            {
                
            }*/
            
            /* 如果订单金额为0 处理虚拟卡 */
            if ($order['order_amount'] <= 0)
            {
                echo 'TODO:----flowControl--done--7';die;
                $sql = "SELECT goods_id, goods_name, goods_number AS num FROM ".
                                $GLOBALS['ec_globals']['ecs']->table('ec_cart') .
                        " WHERE is_real = 0 AND extension_code = 'virtual_card'".
                        " AND session_id = '".SESS_ID."' AND rec_type = '$flow_type'";
                $res = M()->getAll($sql);
                $virtual_goods = array();
                
                if(!empty($res))
                {
                    foreach ($res AS $row)
                    {
                        $virtual_goods['virtual_card'][] = array('goods_id' => $row['goods_id'], 'goods_name' => $row['goods_name'], 'num' => $row['num']);
                    }
                }
                
                if ($virtual_goods AND $flow_type != CART_GROUP_BUY_GOODS)
                {
                    /* 虚拟卡发货 */
                    //if (virtual_goods_ship($virtual_goods,$msg, $order['order_sn'], true))
                }
                
                
            }
            
            /* 清空购物车 */
            clear_cart($flow_type);
            /* 清除缓存，否则买了商品，但是前台页面读取缓存，商品数量不减少 */
            //TODO:这个方法之后再考虑需要删除哪些文件
            clear_all_files();
            
            
            /* 插入支付日志 */
            $order['log_id'] = insert_pay_log($new_order_id, $order['order_amount'], PAY_ORDER);
            
            /* 取得支付信息，生成支付代码 */
            if ($order['order_amount'] > 0)
            {
                //echo 'TODO:----flowControl--done--8';die;
                $payment = payment_info($order['pay_id']);
                include_once(ROOT_PATH.'includes/modules/payment/' . $payment['pay_code'] . '.php');
                $pay_obj    = new $payment['pay_code'];
                $pay_online = $pay_obj->get_code($order, unserialize_config($payment['pay_config']));
                $order['pay_desc'] = $payment['pay_desc'];
                $this->assign('pay_online', $pay_online);

            }
            if(!empty($order['shipping_name']))
            {
                $order['shipping_name']=trim(stripcslashes($order['shipping_name']));
            }
            //echo 'TODO:----flowControl--done--9';die;
            /* 订单信息 */
            $this->assign('order',      $order);
            $this->assign('total',      $total);
            $this->assign('goods_list', $cart_goods);
            $this->assign('order_submit_back', sprintf('今 %s 或いは %s　ページへ遷移見てください', '<a href="'.U('ec/EcIndex/index').'">トップ</a>', '<a href="'.U('ec/EcUser/index').'">ユーザセンタ</a>')); // 返回提示
        
        
            unset($_SESSION['ec_flow_consignee']); // 清除session中保存的收货人信息
            unset($_SESSION['ec_flow_order']);
            unset($_SESSION['ec_direct_shopping']);
        }
        /*------------------------------------------------------ */
        //-- 更新购物车
        /*------------------------------------------------------ */
        elseif ($_REQUEST['step'] == 'update_cart')
        {
            //p($_POST);die;
            if (isset($_POST['goods_number']) && is_array($_POST['goods_number']))
            {
                $this -> flow_update_cart($_POST['goods_number']);
            }
        
            $this -> show_message('购物车更新成功，请您重新选择您需要的赠品。', '返回购物车', U('index'));
            exit;
        }
        /*------------------------------------------------------ */
        //-- 删除购物车中的商品
        /*------------------------------------------------------ */
        elseif ($_REQUEST['step'] == 'drop_goods')
        {
            $rec_id = intval($_GET['id']);
            $this -> flow_drop_cart_goods($rec_id);
        
            ec_header("Location: ".U('index')."\n");
            exit;
        }
        /* 把优惠活动加入购物车 */
        elseif ($_REQUEST['step'] == 'add_favourable')
        {
            
        }
        elseif ($_REQUEST['step'] == 'clear')
        {
            $sql = "DELETE FROM " . $ecs->table('ec_cart') . " WHERE session_id='" . SESS_ID . "'";
            M()->exe($sql);
            
            ec_header("Location:".U('index')."\n");
        }
        elseif ($_REQUEST['step'] == 'drop_to_collect')
        {
            if ($_SESSION['ec_user_id'] > 0)
            {
                $rec_id = intval($_GET['id']);
                $goods_id = M()->getOne("SELECT  goods_id FROM " .$ecs->table('ec_cart'). " WHERE rec_id = '$rec_id' AND session_id = '" . SESS_ID . "' ",'goods_id');
                $count = M()->getOne("SELECT goods_id FROM " . $ecs->table('ec_collect_goods') . " WHERE user_id = '$_SESSION[ec_user_id]' AND goods_id = '$goods_id'",'goods_id');
                if (empty($count))
                {
                    $time = gmtime();
                    $sql = "INSERT INTO " .$GLOBALS['ec_globals']['ecs']->table('ec_collect_goods'). " (user_id, goods_id, add_time)" .
                            "VALUES ('$_SESSION[ec_user_id]', '$goods_id', '$time')";
                    M()->exe($sql);
                }
                $this -> flow_drop_cart_goods($rec_id);
            }
            ec_header("Location: ".U('index')."\n");
            exit;
        }
        /* 验证红包序列号 */
        elseif ($_REQUEST['step'] == 'validate_bonus')
        {
            $bonus_sn = trim($_REQUEST['bonus_sn']);
            if (is_numeric($bonus_sn))
            {  
                $bonus = bonus_info(0, $bonus_sn);
            }
            else
            {
                $bonus = array();
            }
            
            $bonus_kill = price_format($bonus['type_money'], false);
            
            $json = new JSON;
            $result = array('error' => '', 'content' => '');
            
            /* 取得购物类型 */
            $flow_type = isset($_SESSION['ec_flow_type']) ? intval($_SESSION['ec_flow_type']) : CART_GENERAL_GOODS;
            
            /* 获得收货人信息 */
            $consignee = get_consignee($_SESSION['ec_user_id']);
            
            /* 对商品信息赋值 */
            $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计
            
            if (empty($cart_goods) || !check_consignee_info($consignee, $flow_type))
            {
                $result['error'] = '您的购物车中没有商品！';
            }
            else
            {
                /* 取得订单信息 */
                $order = flow_order_info();
                
                if (
                        (
                            (!empty($bonus) && $bonus['user_id'] == $_SESSION['ec_user_id']) || 
                            (
                                $bonus['type_money'] > 0 && 
                                empty($bonus['user_id'])
                            )
                        ) && 
                        $bonus['order_id'] <= 0
                    )
                {
                    $now = gmtime();
                    if ($now > $bonus['use_end_date'])
                    {
                        $order['bonus_id'] = '';
                        $result['error']='该红包已经过了使用期！';
                    }
                    else
                    {
                        $order['bonus_id'] = $bonus['bonus_id'];
                        $order['bonus_sn'] = $bonus_sn;
                    }
                }
                else
                {
                    $order['bonus_id'] = '';
                    $result['error'] = "您选择的红包并不存在。";
                }
                
                /* 计算订单的费用 */
                $total = order_fee($order, $cart_goods, $consignee);
                
                if($total['goods_price']<$bonus['min_goods_amount'])
                {
                   $order['bonus_id'] = ''; 
                   /* 重新计算订单 */
                   $total = order_fee($order, $cart_goods, $consignee);
                   $result['error'] = sprintf('订单商品金额没有达到使用该红包的最低金额 %s', price_format($bonus['min_goods_amount'], false));
                   
                }
                $this->assign('total', $total);
                /* 团购标志 */
                if ($flow_type == CART_GROUP_BUY_GOODS)
                {
                    $this->assign('is_group_buy', 1);
                }
        
                $result['content'] = $this->fetch('template/' . C('WEB_STYLE') . '/ec/common/library/order_total.lbi');
            }
            die($json->encode($result));
        }
        /*------------------------------------------------------ */
        //-- 添加礼包到购物车
        /*------------------------------------------------------ */
        elseif ($_REQUEST['step'] == 'add_package_to_cart')
        {
            $_POST['package_info'] = json_str_iconv($_POST['package_info']);

            $result = array('error' => 0, 'message' => '', 'content' => '', 'package_id' => '');
            $json  = new JSON;
            
            if (empty($_POST['package_info']))
            {
                $result['error'] = 1;
                die($json->encode($result));
            }
            $package = $json->decode($_POST['package_info']);
            
            $ec_one_step_buy=C('ec_one_step_buy');
            /* 如果是一步购物，先清空购物车 */
            if ($ec_one_step_buy == '1')
            {
                clear_cart();
            }
            
            $ec_cart_confirm=C('ec_cart_confirm');
            
            /* 商品数量是否合法 */
            if (!is_numeric($package->number) || intval($package->number) <= 0)
            {
                $result['error']   = 1;
                $result['message'] = '对不起，您输入了一个非法的商品数量。';
            }
            else
            {
                /* 添加到购物车 */
                if (add_package_to_cart($package->package_id, $package->number))
                {
                    
                    if ($ec_cart_confirm > 2)
                    {
                        $result['message'] = '';
                    }
                    else
                    {
                        $result['message'] =$ec_cart_confirm == 1 ? 
                                            "该商品已添加到购物车，您现在还需要继续购物吗？\n如果您希望马上结算，请点击“确定”按钮。\n如果您希望继续购物，请点击“取消”按钮。" : 
                                            "该商品已添加到购物车，您现在还需要继续购物吗？\n如果您希望继续购物，请点击“确定”按钮。\n如果您希望马上结算，请点击“取消”按钮。";
                    }
                    $result['content'] = insert_cart_info();
                    $result['one_step_buy'] = C('ec_one_step_buy');
                }
                else
                {
                    $err=$GLOBALS['ec_globals']['err'];
                    $result['message']    = $err->last_message();
                    $result['error']      = $err->error_no;
                    $result['package_id'] = stripslashes($package->package_id);
                }
            }
            $result['confirm_type'] = !empty($ec_cart_confirm) ? $ec_cart_confirm : 2;
            die($json->encode($result));
        }
        else
        {
            /* 标记购物流程为普通商品 */
            $_SESSION['ec_flow_type'] = CART_GENERAL_GOODS;
            $ec_one_step_buy=C('ec_one_step_buy');
            /* 如果是一步购物，跳到结算中心 */
            if ($ec_one_step_buy == '1')
            {
                ec_header("Location: ".U('index')."&step=checkout\n");
                exit;
            }
            
            /* 取得商品列表，计算合计 */
            $cart_goods = get_cart_goods();
            //p($cart_goods['goods_list']);die;
            $this->assign('goods_list', $cart_goods['goods_list']);
            $this->assign('total', $cart_goods['total']);
            
            //购物车的描述的格式化
            $this->assign('shopping_money',         sprintf('全商品金額は %s，', $cart_goods['total']['goods_price']));
            $this->assign('market_price_desc',      sprintf( '市場値段 %s より %s (%s)を節約しました',
            $cart_goods['total']['market_price'], $cart_goods['total']['saving'], $cart_goods['total']['save_rate']));
            
            // 显示收藏夹内的商品
            if ($_SESSION['ec_user_id'] > 0)
            {
                $collection_goods = get_collection_goods($_SESSION['ec_user_id']);
                $this->assign('collection_goods', $collection_goods);
            }
            /* 取得优惠活动 */
            $favourable_list = $this -> favourable_list($_SESSION['ec_user_rank']);
            usort($favourable_list, 'cmp_favourable');
            
            $this->assign('favourable_list', $favourable_list);
        
            /* 计算折扣 */
            $discount = compute_discount();
            $this->assign('discount', $discount['discount']);
            $favour_name = empty($discount['name']) ? '' : join(',', $discount['name']);
            $this->assign('your_discount', sprintf('根据优惠活动<a href="activity.php"><font color=red>%s</font></a>，您可以享受折扣 %s', $favour_name, price_format($discount['discount'])));
            
            /* 增加是否在购物车里显示商品图 */
            $this->assign('show_goods_thumb', C('ec_show_goods_in_cart'));

            /* 增加是否在购物车里显示商品属性 */
            $this->assign('show_goods_attribute', C('ec_show_attr_in_cart'));
    
            /* 购物车中商品配件列表 */
            //取得购物车中基本件ID
            $sql = "SELECT goods_id " .
                    "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_cart') .
                    " WHERE session_id = '" . SESS_ID . "' " .
                    "AND rec_type = '" . CART_GENERAL_GOODS . "' " .
                    "AND is_gift = 0 " .
                    "AND extension_code <> 'package_buy' " .
                    "AND parent_id = 0 ";
            $parent_list = M()->getCol($sql,'goods_id');
            //p($parent_list);die;
        
            $fittings_list = get_goods_fittings($parent_list);
            //p($fittings_list);die;
            $this->assign('fittings_list', $fittings_list);
            
            
            
        }
        $this->assign('currency_format',C('ec_currency_format'));
        $this->assign('integral_scale',  C('ec_integral_scale'));
        $this->assign('step',            $_REQUEST['step']);
        $this->assign_dynamic('EcFlow');
        $this -> display('template/' . C('WEB_STYLE') . '/ec/flow.html');
    }
    
    
    /**
     * 检查订单中商品库存
     *
     * @access  public
     * @param   array   $arr
     *
     * @return  void
     */
    public function flow_cart_stock($arr)
    {
        foreach ($arr AS $key => $val)
        {
            $val = intval(make_semiangle($val));
            if ($val <= 0 || !is_numeric($key))
            {
                continue;
            }
            $sql = "SELECT `goods_id`, `goods_attr_id`, `extension_code` FROM" .$GLOBALS['ec_globals']['ecs']->table('ec_cart').
                     " WHERE rec_id='$key' AND session_id='" . SESS_ID . "'";
            $goods = M()->getRowSql($sql);
            $sql = "SELECT g.goods_name, g.goods_number, c.product_id ".
                    "FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_goods'). " AS g, ".
                            $GLOBALS['ec_globals']['ecs']->table('ec_cart'). " AS c ".
                    "WHERE g.goods_id = c.goods_id AND c.rec_id = '$key'";
            $row = M()->getRowSql($sql);
            
            //系统启用了库存，检查输入的商品数量是否有效
            $ec_use_storage=C('ec_use_storage');
            
            if (intval($ec_use_storage) > 0 && $goods['extension_code'] != 'package_buy')
            {
                if ($row['goods_number'] < $val)
                {
                    $this -> show_message(sprintf('非常抱歉，您选择的商品 %s 的库存数量只有 %d，您最多只能购买 %d 件。', 
                                                    $row['goods_name'], $row['goods_number'], $row['goods_number']));
                    exit;
                }
                
                /* 是货品 */
                $row['product_id'] = trim($row['product_id']);
                if (!empty($row['product_id']))
                {
                    $sql = "SELECT product_number 
                            FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_products'). " 
                            WHERE goods_id = '" . $goods['goods_id'] . "' AND product_id = '" . $row['product_id'] . "'";
                    $product_number = M()->getOne($sql,'product_number');
                    if ($product_number < $val)
                    {
                        $this -> show_message(sprintf('非常抱歉，您选择的商品 %s 的库存数量只有 %d，您最多只能购买 %d 件。', 
                                                        $row['goods_name'],$row['goods_number'], $row['goods_number']));
                        exit;
                    }
                }
            }
            elseif (intval($ec_use_storage) > 0 && $goods['extension_code'] == 'package_buy')
            {
                if (judge_package_stock($goods['goods_id'], $val))
                {
                    $this -> show_message('非常抱歉，您选择的超值礼包数量已经超出库存。请您减少购买量或联系商家。');
                    exit;
                }
            }
            
        }
    }
    
    
    
    
    /**
     * 取得某用户等级当前时间可以享受的优惠活动
     * @param   int     $user_rank      用户等级id，0表示非会员
     * @return  array
     */
    public function favourable_list($user_rank)
    {
        $_LANG['far_ext'][FAR_ALL] = '全部商品';
        $_LANG['far_ext'][FAR_BRAND] = '以下品牌';
        $_LANG['far_ext'][FAR_CATEGORY] = '以下分類';
        $_LANG['far_ext'][FAR_GOODS] = '以下商品';
        $_LANG['fat_ext'][FAT_DISCOUNT] = '享受 %d%% 的折扣';
        $_LANG['fat_ext'][FAT_GOODS] = '從下面的贈品（特惠品）中選擇 %d 個（0表示不限制數量）';
        $_LANG['fat_ext'][FAT_PRICE] = '直接減少現金 %d';
        /* 购物车中已有的优惠活动及数量 */
        $used_list = $this -> cart_favourable();
        
        /* 当前用户可享受的优惠活动 */
        $favourable_list = array();
        $user_rank = ',' . $user_rank . ',';
        $now = gmtime();
        $sql = "SELECT * " .
            "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_favourable_activity') .
            " WHERE CONCAT(',', user_rank, ',') LIKE '%" . $user_rank . "%'" .
            " AND start_time <= '$now' AND end_time >= '$now'" .
            " AND act_type = '" . FAT_GOODS . "'" .
            " ORDER BY sort_order";
        $res = M()->query($sql);
        if(!empty($res))
        {
            foreach($res as $favourable)
            {
                $favourable['start_time'] = local_date(C('ec_time_format'), $favourable['start_time']);
                $favourable['end_time']   = local_date(C('ec_time_format'), $favourable['end_time']);
                $favourable['formated_min_amount'] = price_format($favourable['min_amount'], false);
                $favourable['formated_max_amount'] = price_format($favourable['max_amount'], false);
                $favourable['gift']       = unserialize($favourable['gift']);
                
                foreach ($favourable['gift'] as $key => $value)
                {
                    $favourable['gift'][$key]['formated_price'] = price_format($value['price'], false);
                    $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " WHERE is_on_sale = 1 AND goods_id = ".$value['id'];
                    $is_sale = M()->getOne($sql,'COUNT(*)');
                    if(!$is_sale)
                    {
                        unset($favourable['gift'][$key]);
                    }
                }
                $favourable['act_range_desc'] = $this-> act_range_desc($favourable);
                $favourable['act_type_desc'] = sprintf($_LANG['fat_ext'][$favourable['act_type']], $favourable['act_type_ext']);
                
                /* 是否能享受 */
                $favourable['available'] = $this -> favourable_available($favourable);
                if ($favourable['available'])
                {
                    /* 是否尚未享受 */
                    $favourable['available'] = !$this -> favourable_used($favourable, $used_list);
                }
        
                $favourable_list[] = $favourable;
        
            }
        }
        return $favourable_list;
    }
	
    
    /**
     * 根据购物车判断是否可以享受某优惠活动
     * @param   array   $favourable     优惠活动信息
     * @return  bool
     */
    public function favourable_available($favourable)
    {
        /* 会员等级是否符合 */
        $user_rank = $_SESSION['ec_user_rank'];
        if (strpos(',' . $favourable['user_rank'] . ',', ',' . $user_rank . ',') === false)
        {
            return false;
        }
    
        /* 优惠范围内的商品总额 */
        $amount = $this -> cart_favourable_amount($favourable);
    
        /* 金额上限为0表示没有上限 */
        return $amount >= $favourable['min_amount'] &&
            ($amount <= $favourable['max_amount'] || $favourable['max_amount'] == 0);
    }
    
    /**
     * 购物车中是否已经有某优惠
     * @param   array   $favourable     优惠活动
     * @param   array   $cart_favourable购物车中已有的优惠活动及数量
     */
    function favourable_used($favourable, $cart_favourable)
    {
        if ($favourable['act_type'] == FAT_GOODS)
        {
            return isset($cart_favourable[$favourable['act_id']]) &&
                $cart_favourable[$favourable['act_id']] >= $favourable['act_type_ext'] &&
                $favourable['act_type_ext'] > 0;
        }
        else
        {
            return isset($cart_favourable[$favourable['act_id']]);
        }
    }

    
    /**
     * 取得购物车中某优惠活动范围内的总金额
     * @param   array   $favourable     优惠活动
     * @return  float
     */
    function cart_favourable_amount($favourable)
    {
         /* 查询优惠范围内商品总额的sql */
        $sql = "SELECT SUM(c.goods_price * c.goods_number) as sump " .
                "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_cart') . " AS c, " . 
                        $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g " .
                "WHERE c.goods_id = g.goods_id " .
                "AND c.session_id = '" . SESS_ID . "' " .
                "AND c.rec_type = '" . CART_GENERAL_GOODS . "' " .
                "AND c.is_gift = 0 " .
                "AND c.goods_id > 0 ";
        /* 根据优惠范围修正sql */
        if ($favourable['act_range'] == FAR_ALL)
        {
            // sql do not change
        }
        elseif ($favourable['act_range'] == FAR_CATEGORY)
        {
            /* 取得优惠范围分类的所有下级分类 */
            $id_list = array();
            $cat_list = explode(',', $favourable['act_range_ext']);
            foreach ($cat_list as $id)
            {
                $id_list = array_merge($id_list, array_keys(cat_list(intval($id), 0, false)));
            }
    
            $sql .= "AND g.cat_id " . db_create_in($id_list);
        }
        elseif ($favourable['act_range'] == FAR_BRAND)
        {
            $id_list = explode(',', $favourable['act_range_ext']);
    
            $sql .= "AND g.brand_id " . db_create_in($id_list);
        }
        else
        {
            $id_list = explode(',', $favourable['act_range_ext']);
    
            $sql .= "AND g.goods_id " . db_create_in($id_list);
        }
    
        /* 优惠范围内的商品总额 */
        return M()->getOne($sql,'sump');
    }

    /**
     * 取得购物车中已有的优惠活动及数量
     * @return  array
     */
    public function cart_favourable()
    {
        $list = array();
        $sql = "SELECT is_gift, COUNT(*) AS num " .
                "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_cart') .
                " WHERE session_id = '" . SESS_ID . "'" .
                " AND rec_type = '" . CART_GENERAL_GOODS . "'" .
                " AND is_gift > 0" .
                " GROUP BY is_gift";
        $res = M()->query($sql);
        if(!empty($res))
        {
            foreach($res as $row)
            {
                $list[$row['is_gift']] = $row['num'];
            }
        }

        return $list;
    }
    
    /**
     * 取得优惠范围描述
     * @param   array   $favourable     优惠活动
     * @return  string
     */
    public function act_range_desc($favourable)
    {
        if ($favourable['act_range'] == FAR_BRAND)
        {
            $sql = "SELECT brand_name FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_brand') .
                    " WHERE brand_id " . db_create_in($favourable['act_range_ext']);
            return join(',', M()->getCol($sql,'brand_name'));
        }
        elseif ($favourable['act_range'] == FAR_CATEGORY)
        {
            $sql = "SELECT cat_name FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_category') .
                    " WHERE cat_id " . db_create_in($favourable['act_range_ext']);
            return join(',', M()->getCol($sql,'cat_name'));
        }
        elseif ($favourable['act_range'] == FAR_GOODS)
        {
            $sql = "SELECT goods_name FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') .
                    " WHERE goods_id " . db_create_in($favourable['act_range_ext']);
            return join(',', M()->getCol($sql,'goods_name'));
        }
        else
        {
            return '';
        }
    }

    /**
     * 删除购物车中的商品
     *
     * @access  public
     * @param   integer $id
     * @return  void
     */
    public function flow_drop_cart_goods($id)
    {
        /* 取得商品id */
        $sql = "SELECT * FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_cart'). " WHERE rec_id = '$id'";
        $row = M()->getRowSql($sql);
        if ($row)
        {
            //如果是超值礼包
            if ($row['extension_code'] == 'package_buy')
            {
                $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_cart') .
                        " WHERE session_id = '" . SESS_ID . "' " .
                        "AND rec_id = '$id' LIMIT 1";
            }
            //如果是普通商品，同时删除所有赠品及其配件
            elseif ($row['parent_id'] == 0 && $row['is_gift'] == 0)
            {
                /* 检查购物车中该普通商品的不可单独销售的配件并删除 */
                $sql = "SELECT c.rec_id
                        FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_cart') . " AS c, " . 
                                $GLOBALS['ec_globals']['ecs']->table('ec_group_goods') . " AS gg, " . 
                                $GLOBALS['ec_globals']['ecs']->table('ec_goods'). " AS g
                        WHERE gg.parent_id = '" . $row['goods_id'] . "'
                        AND c.goods_id = gg.goods_id
                        AND c.parent_id = '" . $row['goods_id'] . "'
                        AND c.extension_code <> 'package_buy'
                        AND gg.goods_id = g.goods_id
                        AND g.is_alone_sale = 0";
                $res = M()->query($sql);
                $_del_str = $id . ',';
                if(!empty($res))
                {
                    foreach($res as $id_alone_sale_goods) 
                    {
                        $_del_str .= $id_alone_sale_goods['rec_id'] . ',';
                    }
                }
                $_del_str = trim($_del_str, ',');
                $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_cart') .
                    " WHERE session_id = '" . SESS_ID . "' " .
                    "AND (rec_id IN ($_del_str) OR parent_id = '$row[goods_id]' OR is_gift <> 0)";
            }
            //如果不是普通商品，只删除该商品即可
            else
            {
                $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_cart') .
                        " WHERE session_id = '" . SESS_ID . "' " .
                        "AND rec_id = '$id' LIMIT 1";
            }
            M()->exe($sql);
        }
        flow_clear_cart_alone();
    }
        
    /**
     * 更新购物车中的商品数量
     *
     * @access  public
     * @param   array   $arr
     * @return  void
     */
    public function flow_update_cart($arr)
    {
        $ec_use_storage=C('ec_use_storage');
        /* 处理 */
        foreach ($arr AS $key => $val)
        {
            $val = intval(make_semiangle($val));
            if ($val <= 0 || !is_numeric($key))
            {
                continue;
            }
            //查询：
            $sql = "SELECT `goods_id`, `goods_attr_id`, `product_id`, `extension_code` 
                    FROM" .$GLOBALS['ec_globals']['ecs']->table('ec_cart').
                   " WHERE rec_id='$key' AND session_id='" . SESS_ID . "'";
            $goods = M()->getRowSql($sql);
            
            $sql = "SELECT g.goods_name, g.goods_number ".
                    "FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_goods'). " AS g, ".
                        $GLOBALS['ec_globals']['ecs']->table('ec_cart'). " AS c ".
                    "WHERE g.goods_id = c.goods_id AND c.rec_id = '$key'";
            $row = M()->getRowSql($sql);
            
            //查询：系统启用了库存，检查输入的商品数量是否有效
            if (intval($ec_use_storage) > 0 && $goods['extension_code'] != 'package_buy')
            {
                if ($row['goods_number'] < $val)
                {
                    $this -> show_message(sprintf('非常抱歉，您选择的商品 %s 的库存数量只有 %d，您最多只能购买 %d 件。', 
                                            $row['goods_name'],$row['goods_number'], $row['goods_number']));
                    exit;
                }
                /* 是货品 */
                $goods['product_id'] = trim($goods['product_id']);
                if (!empty($goods['product_id']))
                {
                    $sql = "SELECT product_number FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_products'). " 
                            WHERE goods_id = '" . $goods['goods_id'] . "' AND product_id = '" . $goods['product_id'] . "'";
                    $product_number = M()->getOne($sql,'product_number');
                    if ($product_number < $val)
                    {
                        $this -> show_message(sprintf('非常抱歉，您选择的商品 %s 的库存数量只有 %d，您最多只能购买 %d 件。', 
                                            $row['goods_name'],$product_number['product_number'], $product_number['product_number']));
                        exit;
                    }
                }
            }
            elseif (intval($ec_use_storage) > 0 && $goods['extension_code'] == 'package_buy')
            {
                if (judge_package_stock($goods['goods_id'], $val))
                {
                    $this -> show_message('非常抱歉，您选择的超值礼包数量已经超出库存。请您减少购买量或联系商家。');
                    exit;
                }
            }
            
            /* 查询：检查该项是否为基本件 以及是否存在配件 */
            /* 此处配件是指添加商品时附加的并且是设置了优惠价格的配件 此类配件都有parent_id goods_number为1 */
            $sql = "SELECT b.goods_number, b.rec_id
                    FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_cart') . " a, " .
                            $GLOBALS['ec_globals']['ecs']->table('ec_cart') . " b
                    WHERE a.rec_id = '$key'
                        AND a.session_id = '" . SESS_ID . "'
                        AND a.extension_code <> 'package_buy'
                        AND b.parent_id = a.goods_id
                        AND b.session_id = '" . SESS_ID . "'";
            $offers_accessories_res = M()->query($sql);
            
            //订货数量大于0
            if ($val > 0)
            {
                /* 判断是否为超出数量的优惠价格的配件 删除*/
                $row_num = 1;
                if(!empty($offers_accessories_res))
                {
                    echo 'TODO:EcFlowControl--flow_update_cart--1';die;
                    foreach($offers_accessories_res as $offers_accessories_row)
                    {
                        if ($row_num > $val)
                        {
                            $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_cart') .
                                    " WHERE session_id = '" . SESS_ID . "' " .
                                    "AND rec_id = '" . $offers_accessories_row['rec_id'] ."' LIMIT 1";
                            M()->exe($sql);
                        }
        
                        $row_num ++;
                    }
                }
                
                /* 处理超值礼包 */
                if ($goods['extension_code'] == 'package_buy')
                {
                    echo 'TODO:EcFlowControl--flow_update_cart--2';die;
                    //更新购物车中的商品数量
                    $sql = "UPDATE " .$GLOBALS['ecs']->table('ec_cart').
                            " SET goods_number = '$val' WHERE rec_id='$key' AND session_id='" . SESS_ID . "'";
                }
                /* 处理普通商品或非优惠的配件 */
                else
                {
                    $attr_id    = empty($goods['goods_attr_id']) ? array() : explode(',', $goods['goods_attr_id']);
                    $goods_price = get_final_price($goods['goods_id'], $val, true, $attr_id);
                    //更新购物车中的商品数量
                    $sql = "UPDATE " .$GLOBALS['ec_globals']['ecs']->table('ec_cart').
                        " SET goods_number = '$val', goods_price = '$goods_price' WHERE rec_id='$key' AND session_id='" . SESS_ID . "'";
                }
                
                
            }
            //订货数量等于0
            else
            {
                if(!empty($offers_accessories_res))
                {
                    echo 'TODO:EcFlowControl--flow_update_cart--3';die;
                }
                $sql = "DELETE FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_cart').
                        " WHERE rec_id='$key' AND session_id='" .SESS_ID. "'";
            }
            
            M()->exe($sql);
        }
        /* 删除所有赠品 */
        $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_cart') . " 
                WHERE session_id = '" .SESS_ID. "' AND is_gift <> 0";
        M()->exe($sql);
    }
    
    /**
     * 获得用户的可用积分
     *
     * @access  private
     * @return  integral
     */
    public function flow_available_points()
    {
        $sql = "SELECT SUM(g.integral * c.goods_number) as re ".
                "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_cart') . " AS c, " . 
                        $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g " .
                "WHERE c.session_id = '" . SESS_ID . "' AND c.goods_id = g.goods_id AND c.is_gift = 0 AND g.integral > 0 " .
                "AND c.rec_type = '" . CART_GENERAL_GOODS . "'";
    
        $val = intval(M()->getOne($sql,'re'));
        //p($val);die;
        return integral_of_value($val);
    }


}
