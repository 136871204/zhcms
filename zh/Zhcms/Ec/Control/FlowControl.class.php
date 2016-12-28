<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class FlowControl extends EcControl {
	//网站首页
	public function index() {

        if (!isset($_REQUEST['step']))
        {
            $_REQUEST['step'] = "cart";
        }
        $this->assign('step', $_REQUEST['step']);
        $this->assign('show_marketprice',C('ec_show_marketprice'));
        
        if ($_REQUEST['step'] == 'add_to_cart')
        {
            $_POST['goods']=strip_tags(urldecode($_POST['goods']));
            define('EC_CHARSET','utf-8');
            $_POST['goods'] = json_str_iconv($_POST['goods']);
            if (!empty($_REQUEST['goods_id']) && empty($_POST['goods']))
            {
                if (!is_numeric($_REQUEST['goods_id']) || intval($_REQUEST['goods_id']) <= 0)
                {
                    ec_header("Location:./\n");
                }
                $goods_id = intval($_REQUEST['goods_id']);
                exit;
            }
            $result = array('error' => 0, 'message' => '', 'content' => '', 'goods_id' => '');
            $json  = new JSON;
            if (empty($_POST['goods']))
            {
                $result['error'] = 1;
                die($json->encode($result));
            }
            $goods = $json->decode($_POST['goods']);
            
            /* 检查：如果商品有规格，而post的数据没有规格，把商品的规格属性通过JSON传到前台 */
            if (empty($goods->spec) AND empty($goods->quick))
            {
                echo __FILE__.'----'.__METHOD__.'1';die;
                $db_prefix=C("DB_PREFIX");
                $sql = "SELECT 
                            a.attr_id, a.attr_name, a.attr_type, ".
                            "g.goods_attr_id, g.attr_value, g.attr_price " .
                        'FROM ' . 
                            $db_prefix.'goods_attr' . ' AS g ' .
                            'LEFT JOIN ' . $db_prefix.'attribute' . ' AS a ON a.attr_id = g.attr_id ' .
                        "WHERE 
                            a.attr_type != 0 AND g.goods_id = '" . $goods->goods_id . "' " .
                        'ORDER BY a.sort_order, g.attr_price, g.goods_attr_id';
                p($sql);
            }
            /* 更新：如果是一步购物，先清空购物车 */
            if (C('ec_one_step_buy') == '1')
            {
                echo __FILE__.'----'.__METHOD__.'2';die;
                //clear_cart();
            }
            /* 检查：商品数量是否合法 */
            if (!is_numeric($goods->number) || intval($goods->number) <= 0)
            {
                $result['error']   = 1;
                $result['message'] ='对不起，您输入了一个非法的商品数量。';
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
                    if (C('ec_cart_confirm') > 2)
                    {
                        $result['message'] = '';
                    }
                    else
                    {
                        $result['message'] = C('ec_cart_confirm') == 1 ? '该商品已添加到购物车，您现在还需要继续购物吗？\n如果您希望马上结算，请点击“确定”按钮。\n如果您希望继续购物，请点击“取消”按钮。': '该商品已添加到购物车，您现在还需要继续购物吗？\n如果您希望继续购物，请点击“确定”按钮。\n如果您希望马上结算，请点击“取消”按钮。';
                    }
                    $result['content'] = insert_cart_info();
                    $result['one_step_buy'] = C('ec_one_step_buy');
                }else
                {
                    $result['message']  = '错误信息';
                    $result['error']    = '错误编号';
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
            $cart_confirm=C('ec_cart_confirm');
            $result['confirm_type'] =C('ec_cart_confirm');
            $result['confirm_type'] = !empty($cart_confirm) ? $cart_confirm: 2;
            //p($result);
           //p($json->encode($result));
            die($json->encode($result));
        }elseif ($_REQUEST['step'] == 'checkout'){
            
            /* 取得购物类型 */
            $flow_type = isset($_SESSION['flow_type']) ? intval($_SESSION['flow_type']) : CART_GENERAL_GOODS;
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
                $_SESSION['flow_order']['extension_code'] = '';
            }
            $db_prefix=C("DB_PREFIX");
            /* 检查购物车中是否有商品 */
            $sql = "SELECT COUNT(*) FROM " . $db_prefix.'cart' .
                " WHERE session_id = '" .  session_id() . "' " .
                "AND parent_id = 0 AND is_gift = 0 AND rec_type = '$flow_type'";
            $count=M()->getOne($sql,'COUNT(*)');
            if ($count == 0)
            {
                $this->error('您的购物车中没有商品！');
            }
            /*
             * 检查用户是否已经登录
             * 如果用户已经登录了则检查是否有默认的收货地址
             * 如果没有登录则跳转到登录和注册页面
             */
             //p($_SESSION);
            if (empty($_SESSION['direct_shopping']) && $_SESSION['user_id'] == 0)
            {
                /* 用户没有登录且没有选定匿名购物，转向到登录页面 */
                $loginurl=U('ec/flow/index',array('step'=>'login'));
                //p($loginurl);
                ec_header("Location: ".$loginurl."\n");
                exit;
            }
            p($sql);die;
        }
        elseif ($_REQUEST['step'] == 'login'){
            /*
             * 用户登录注册
             */
            if ($_SERVER['REQUEST_METHOD'] == 'GET')
            {
                $anonymous_buy=C('ec_anonymous_buy');
                $this->assign('anonymous_buy', $anonymous_buy);
                $db_prefix=C("DB_PREFIX");
                /* 检查是否有赠品，如果有提示登录后重新选择赠品 */
                $sql = "SELECT COUNT(*) FROM " . $db_prefix.'cart' .
                        " WHERE session_id = '" . session_id() . "' AND is_gift > 0";
                        
                if (M()->getOne($sql,'COUNT(*)') > 0)
                {
                    $this->assign('need_rechoose_gift', 1);
                }
                /* 检查是否需要注册码 */
                $captcha = 1;//intval($_CFG['captcha']);
                if (
                        ($captcha & CAPTCHA_LOGIN) && 
                        (!($captcha & CAPTCHA_LOGIN_FAIL) || (($captcha & CAPTCHA_LOGIN_FAIL) && $_SESSION['login_fail'] > 2)) && gd_version() > 0)
                {
                    //echo 'aaa';
                    $this->assign('enabled_login_captcha', 1);
                    $this->assign('rand', mt_rand());
                }
                if ($captcha & CAPTCHA_REGISTER)
                {
                    //echo 'bbb';
                    $this->assign('enabled_register_captcha', 1);
                    $this->assign('rand', mt_rand());
                }
            }else
            {
                if (!empty($_POST['act']) && $_POST['act'] == 'signin')
                {
                    echo 'step=login,signin,post';die;
                }
                elseif (!empty($_POST['act']) && $_POST['act'] == 'signup')
                {
                    $captcha = 1;//intval($_CFG['captcha']);
                    $ecs = new ECS(C('DB_DATABASE'), C('DB_PREFIX'));
                    define('EC_DATA_DIR', $ecs->data_dir());
                    define('EC_IMAGE_DIR', $ecs->image_dir());
                    if ((intval($captcha) & CAPTCHA_REGISTER) && gd_version() > 0)
                    {
                        if (empty($_POST['captcha']))
                        {
                            $this->error('对不起，您输入的验证码不正确。');
                        }
                        /* 检查验证码 */
                        $validator = new EcCaptcha();
                        if (!$validator->check_word($_POST['captcha']))
                        {
                            $this->error('对不起，您输入的验证码不正确。');
                        }
                    }
                    if (register(trim($_POST['username']), trim($_POST['password']), trim($_POST['email'])))
                    {
                        /* 用户注册成功 */
                        ecs_header("Location: flow.php?step=consignee\n");
                        exit;
                    }
                    else
                    {
                        $err->show();
                    }
                }else{
                    // TODO: 非法访问的处理
                }
            }
        }
        else{
            /* 标记购物流程为普通商品 */
            $_SESSION['flow_type'] = CART_GENERAL_GOODS;
            /* 如果是一步购物，跳到结算中心 */
            if (C('ec_one_step_buy') == '1')
            {
                echo __FILE__.'----'.__METHOD__.'cart1';die;
                //ecs_header("Location: flow.php?step=checkout\n");
                exit;
            }
            /* 取得商品列表，计算合计 */
            $cart_goods = get_cart_goods();
            $this->assign('goods_list', $cart_goods['goods_list']);
            $this->assign('total', $cart_goods['total']);
            
            //购物车的描述的格式化
            $this->assign('shopping_money',         sprintf('购物金额小计 %s', $cart_goods['total']['goods_price']));
            
            /* 计算折扣 */
            $discount = compute_discount();
            $this->assign('discount', $discount['discount']);
            $favour_name = empty($discount['name']) ? '' : join(',', $discount['name']);
            $this->assign('your_discount', sprintf('根据优惠活动<a href="activity.php"><font color=red>%s</font></a>，您可以享受折扣 %s', $favour_name, price_format($discount['discount'])));
            
            /* 增加是否在购物车里显示商品图 */
            $this->assign('show_goods_thumb', C('ec_show_goods_in_cart'));
    
            /* 增加是否在购物车里显示商品属性 */
            $this->assign('show_goods_attribute', C('ec_show_attr_in_cart'));
            
        }
        
        $this->display('flow.php');
	}
    
    
}
