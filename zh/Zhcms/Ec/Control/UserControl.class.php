<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class UserControl extends EcControl {
	//网站首页
	public function index() {
	    
        $user_id = $_SESSION['user_id'];
        $action  = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'default';
        
        $affiliate='a:3:{s:6:"config";a:7:{s:6:"expire";d:24;s:11:"expire_unit";s:4:"hour";s:11:"separate_by";i:0;s:15:"level_point_all";s:2:"5%";s:15:"level_money_all";s:2:"1%";s:18:"level_register_all";i:2;s:17:"level_register_up";i:60;}s:4:"item";a:4:{i:0;a:2:{s:11:"level_point";s:3:"60%";s:11:"level_money";s:3:"60%";}i:1;a:2:{s:11:"level_point";s:3:"30%";s:11:"level_money";s:3:"30%";}i:2;a:2:{s:11:"level_point";s:2:"7%";s:11:"level_money";s:2:"7%";}i:3;a:2:{s:11:"level_point";s:2:"3%";s:11:"level_money";s:2:"3%";}}s:2:"on";i:1;}';
        $affiliate = unserialize($affiliate);
        $this->assign('affiliate', $affiliate);
        $back_act='';
        // 不需要登录的操作或自己验证是否登录（如ajax处理）的act
        $not_login_arr =
        array('login','act_login','register','act_register','act_edit_password','get_password','send_pwd_email','password', 'signin', 'add_tag', 'collect', 'return_to_cart', 'logout', 'email_list', 'validate_email', 'send_hash_mail', 'order_query', 'is_registered', 'check_email','clear_history','qpassword_name', 'get_passwd_question', 'check_answer');

        /* 显示页面的action列表 */
        $ui_arr = array('register', 'login', 'profile', 'order_list', 'order_detail', 'address_list', 'collection_list',
        'message_list', 'tag_list', 'get_password', 'reset_password', 'booking_list', 'add_booking', 'account_raply',
        'account_deposit', 'account_log', 'account_detail', 'act_account', 'pay', 'default', 'bonus', 'group_buy', 'group_buy_detail', 'affiliate', 'comment_list','validate_email','track_packages', 'transform_points','qpassword_name', 'get_passwd_question', 'check_answer');


        /* 未登录处理 */
        if (empty($_SESSION['user_id']))
        {
            if (!in_array($action, $not_login_arr))
            {
                if (in_array($action, $ui_arr))
                {
                    echo 'UserControl--1';die;
                    if (!empty($_SERVER['QUERY_STRING']))
                    {
                        $back_act = 'user.php?' . strip_tags($_SERVER['QUERY_STRING']);
                    }
                    $action = 'login';
                }
                else
                {
                    //未登录提交数据。非正常途径提交数据！
                    die('アクセスエラー。<br />登録して後操作してください。');
                }
            }
        
        }
        
        
        
        /* 如果是显示页面，对页面进行相应赋值 */
        if (in_array($action, $ui_arr)){
            echo 'UserControl--2';die;
        }
        
        //用户中心欢迎页
        if ($action == 'default'){
            
        }
        /* 验证用户注册用户名是否可以注册 */
        elseif ($action == 'is_registered'){
            $username = trim($_GET['username']);
            $username = json_str_iconv($username);
            /* 会员信息 */

            if ($user->check_user($username) || admin_registered($username))
            {
                echo 'false';
            }
            else
            {
                echo 'true';
            }
            exit;
        }
        /* 验证用户邮箱地址是否被注册 */
        elseif($action == 'check_email'){
            
            $email = trim($_GET['email']);
            if ($user->check_email($email))
            {
                echo 'false';
            }
            else
            {
                echo 'ok';
            }
            exit;
        }
	}
    
    
}
