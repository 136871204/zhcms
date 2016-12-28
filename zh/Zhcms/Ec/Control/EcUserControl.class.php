<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcUserControl extends EcControl {
    
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
        //echo 'aaa';die;
    }
    
    public function index(){
        $user=$GLOBALS['ec_globals']['ec_user'];
        $ecs=$GLOBALS['ec_globals']['ecs'];
        $user_id = isset($_SESSION['ec_user_id'])?$_SESSION['ec_user_id']:"";
        $action  = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'default';
        $back_act='';
        //p($_REQUEST);die;
        // 不需要登录的操作或自己验证是否登录（如ajax处理）的act
        $not_login_arr =array(
                            'login','act_login','register','act_register','act_edit_password',
                            'get_password','send_pwd_email','password', 'signin', 'add_tag', 'collect', 
                            'return_to_cart', 'logout', 'email_list', 'validate_email', 'send_hash_mail', 
                            'order_query', 'is_registered', 'check_email','clear_history','qpassword_name', 
                            'get_passwd_question', 'check_answer');
        /* 显示页面的action列表 */
        $ui_arr = array(
                            'register', 'login', 'profile', 'order_list', 'order_detail', 'address_list', 'collection_list',
                            'message_list', 'tag_list', 'get_password', 'reset_password', 'booking_list', 'add_booking', 'account_raply',
                            'account_deposit', 'account_log', 'account_detail', 'act_account', 'pay', 'default', 'bonus', 
                            'group_buy', 'group_buy_detail', 'affiliate', 'comment_list','validate_email','track_packages', 
                            'transform_points','qpassword_name', 'get_passwd_question', 'check_answer');

        /* 未登录处理 */
        if (empty($_SESSION['ec_user_id'])){
            if (!in_array($action, $not_login_arr)){
                if (in_array($action, $ui_arr)){
                    if (!empty($_SERVER['QUERY_STRING'])){
                        $back_act = 'index.php?'. strip_tags($_SERVER['QUERY_STRING']);
                    }
                    $action = 'login';
                }else
                {
                    //未登录提交数据。非正常途径提交数据！
                    die('アクセスエラー。<br />登録して後操作してください。');
                }
            }
            //p($back_act);die;
        }
        
        /* 如果是显示页面，对页面进行相应赋值 */
        if (in_array($action, $ui_arr)){
            $this->assign_template();
            $position = assign_ur_here(0, 'ユーザセンタ');
            $this->assign('page_title', $position['title']); // 页面标题
            $this->assign('ur_here',    $position['ur_here']);
            //$sql = "SELECT value FROM " . $ecs->table('shop_config') . " WHERE id = 419";
            $car_off=C('EC_ANONYMOUS_BUY');
            $this->assign('car_off',       $car_off);
            /* 是否显示积分兑换 */
            $this->assign('helps',      get_shop_help());        // 网店帮助
            $this->assign('data_dir',   EC_DATA_DIR);   // 数据目录
            $this->assign('action',     $action);
        }
        //echo $action;
        //用户中心欢迎页
        if ($action == 'default'){
            if ($rank = get_rank_info())
            {
                $this->assign('rank_name', sprintf('今のランクは %s ', $rank['rank_name']));
                if (!empty($rank['next_rank_name']))
                {
                    $this->assign('next_rank_name', sprintf(',後 %s ポイントがあれば %s に着きます', $rank['next_rank'] ,$rank['next_rank_name']));
                }
            }
            $this->assign('info',        get_user_default($user_id));
            $this->assign('user_notice', C('ec_user_notice'));
            $this->assign('prompt',      get_user_prompt($user_id));
            
            $this -> display('template/' . C('WEB_STYLE') . '/ec/user_clips.html');
        }
        /* 显示会员注册界面 */
        if ($action == 'register'){
            if (
                    (!isset($back_act)||empty($back_act)) && 
                    isset($GLOBALS['_SERVER']['HTTP_REFERER'])){
                $back_act = strpos($GLOBALS['_SERVER']['HTTP_REFERER'], 'EcUser') ? U('Ec/EcIndex/Index') : $GLOBALS['_SERVER']['HTTP_REFERER'];
            }
            /* 取出注册扩展字段 */
            $sql = 'SELECT * FROM ' . $ecs->table('ec_reg_fields') . ' WHERE type < 2 AND display = 1 ORDER BY dis_order, id';
            $extend_info_list = M()->getAll($sql);
            $this->assign('extend_info_list', $extend_info_list);
            /* 验证码相关设置 */
            //TODO：配置文件取得没做
            $captcha=1;
            //if ((intval($_CFG['captcha']) & CAPTCHA_REGISTER) && gd_version() > 0)
            if ((intval($captcha) & CAPTCHA_REGISTER) && gd_version() > 0)
            {
                $this->assign('enabled_captcha', 1);
                $this->assign('rand',            mt_rand());
            }
            
            /* 密码提示问题 */
            $_LANG['passwd_questions']['friend_birthday'] = '一番親友の誕生日？';
            $_LANG['passwd_questions']['old_address']     = '子供時住む住所？';
            $_LANG['passwd_questions']['motto']           = '私の座右の銘？';
            $_LANG['passwd_questions']['favorite_movie']  = '一番好きな映画？';
            $_LANG['passwd_questions']['favorite_song']   = '一番好きな歌？';
            $_LANG['passwd_questions']['favorite_food']   = '一番好きな食べ物？？';
            $_LANG['passwd_questions']['interest']        = '一番の趣味？';
            $_LANG['passwd_questions']['favorite_novel']  = '一番好きな小説？';
            $_LANG['passwd_questions']['favorite_equipe'] = '一番好きなスポーツチーム？';
            $this->assign('passwd_questions', $_LANG['passwd_questions']);
            
            /* 增加是否关闭注册 */
            //TODO：配置文件取得没做
            //$this->assign('shop_reg_closed', 1);
            $this->assign('shop_reg_closed', C('ec_shop_reg_closed'));
            
            $this -> display('template/' . C('WEB_STYLE') . '/ec/user_passport.html');
        }
        /* 用户登录界面 */
        elseif ($action == 'login'){
            if (empty($back_act))
            {
                if (empty($back_act) && isset($_SERVER['HTTP_REFERER']))
                {
                    $back_act = strpos($_SERVER['HTTP_REFERER'], 'user.php') ? './index.php' : $_SERVER['HTTP_REFERER'];
                }
                else
                {
                    $back_act = 'user.php';
                }
        
            }
    
    
            //$captcha = intval($_CFG['captcha']);
            $captcha=true;
            /*if (
                    ($captcha & CAPTCHA_LOGIN) && 
                    (!($captcha & CAPTCHA_LOGIN_FAIL) || (($captcha & CAPTCHA_LOGIN_FAIL) && $_SESSION['login_fail'] > 2)) && 
                    gd_version() > 0)
            {
                $this->assign('enabled_captcha', 1);
                $this->assign('rand', mt_rand());
            }*/
            $this->assign('enabled_captcha', 1);
            $this->assign('rand', mt_rand());
            
            $this->assign('back_act', $back_act);
            $this -> display('template/' . C('WEB_STYLE') . '/ec/user_passport.html');
        }
        /* 处理会员的登录 */
        elseif ($action == 'act_login')
        {

            $username = isset($_POST['username']) ? trim($_POST['username']) : '';
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';
            $back_act = isset($_POST['back_act']) ? trim($_POST['back_act']) : '';
            
            //TODO:这里以后需要管理画面控制
            //$captcha = intval($_CFG['captcha']);
            $captcha=true;
            /*if (
                    ($captcha & CAPTCHA_LOGIN) && 
                    (!($captcha & CAPTCHA_LOGIN_FAIL) || (($captcha & CAPTCHA_LOGIN_FAIL) && $_SESSION['login_fail'] > 2)) && 
                    gd_version() > 0)
            {
                $this->assign('enabled_captcha', 1);
                $this->assign('rand', mt_rand());
            }*/
            if($captcha)
            {
                if (empty($_POST['captcha']))
                {
                    $this -> show_message('すみません，入力した検証番号正しくない。', 'ログインしなおす', U('index'), 'error');
                }
                $validator = new EcCaptcha(ROOT_PATH . 'data/captcha/', 100, 20);
                $validator->session_word = 'captcha_login';
                if (!$validator->check_word($_POST['captcha']))
                {
                    $this->show_message('すみません，入力した検証番号正しくない。', 'ログインしなおす', U('index'), 'error');
                }
                
            }
            //p($username);die;
            if ($user->login($username, $password,isset($_POST['remember'])))
            {
                update_user_info();
                recalculate_price();
                
                $this->show_message('ログイン成功' , array('前ページ戻る', '個人情報を見る'), array($back_act,U('index')), 'info');
                
            }
            else
            {
                $_SESSION['login_fail'] ++ ;
                $this->show_message('ユーザ名或いはパスワードが間違っている', 'ログインしなおす', U('index'), 'error');
            }
            
            p($_POST);die;
        }
        /* 验证用户注册用户名是否可以注册 */
        elseif ($action == 'is_registered')
        {
            $username = trim($_GET['username']);
            $username = json_str_iconv($username);
            if ($user->check_user($username) || admin_registered($username))
            {
                echo 'false';die;
            }
            else
            {
                echo 'true';die;
            }
        }
        /* 验证用户邮箱地址是否被注册 */
        elseif($action == 'check_email')
        {
            $email = trim($_GET['email']);
            if ($user->check_email($email))
            {
                echo 'false';die;
            }
            else
            {
                echo 'ok';die;
            }
        }
        /* 注册会员的处理 */
        elseif ($action == 'act_register')
        {
            $ec_shop_reg_closed=C('ec_shop_reg_closed');
            //p();die;
            //$ec_shop_reg_closed=1;
            if($ec_shop_reg_closed)
            {
                $this->assign('action',     'register');
                $this->assign('shop_reg_closed', $ec_shop_reg_closed);
                $this -> display('template/' . C('WEB_STYLE') . '/ec/user_passport.html');
            }
            else
            {
                $username = isset($_POST['username']) ? trim($_POST['username']) : '';
                $password = isset($_POST['password']) ? trim($_POST['password']) : '';
                $email    = isset($_POST['email']) ? trim($_POST['email']) : '';
                $other['msn'] = isset($_POST['extend_field1']) ? $_POST['extend_field1'] : '';
                $other['qq'] = isset($_POST['extend_field2']) ? $_POST['extend_field2'] : '';
                $other['office_phone'] = isset($_POST['extend_field3']) ? $_POST['extend_field3'] : '';
                $other['home_phone'] = isset($_POST['extend_field4']) ? $_POST['extend_field4'] : '';
                $other['mobile_phone'] = isset($_POST['extend_field5']) ? $_POST['extend_field5'] : '';
                $sel_question = empty($_POST['sel_question']) ? '' : compile_str($_POST['sel_question']);
                $passwd_answer = isset($_POST['passwd_answer']) ? compile_str(trim($_POST['passwd_answer'])) : '';
                
                $back_act = isset($_POST['back_act']) ? trim($_POST['back_act']) : '';
                
                //$this->show_message('- 您没有接受协议');
                if(empty($_POST['agreement']))
                {
                    $this->show_message('- 協議をまだ引き受けてない');
                }
                if (strlen($username) < 3)
                {
                    $this->show_message('- ユーザ名の長さは3文字以上してください。');
                }
        
                if (strlen($password) < 6)
                {
                    $this->show_message('- ログインパスワードは6文字以上してください。');
                }
        
                if (strpos($password, ' ') > 0)
                {
                    $this->show_message('- パスワード中はスペースが入力できません');
                }
                //TODO：配置文件取得没做
                $captcha=1;
                if ((intval($captcha) & CAPTCHA_REGISTER) && gd_version() > 0)
                {
                    //$this->show_message('对不起，您输入的验证码不正确。', '注册新会员', U('ec/EcUser/index').'&act=register', 'error');
                    
                    if (empty($_POST['captcha']))
                    {
                        $this->show_message('すみません，入力した検証番号正しくない。', '新会員登録', U('ec/EcUser/index').'&act=register', 'error');
                    }
                    $validator = new EcCaptcha(ROOT_PATH . 'data/captcha/', 100, 20);
                    if (!$validator->check_word($_POST['captcha']))
                    {
                        $this->show_message('すみません，入力した検証番号正しくない。', '新会員登録', U('ec/EcUser/index').'&ct=register', 'error');
                    }
                }
                if (register($username, $password, $email, $other) !== false)
                {
                    /*把新注册用户的扩展信息插入数据库*/
                    $sql = 'SELECT id FROM ' . $ecs->table('ec_reg_fields') . ' WHERE type = 0 AND display = 1 ORDER BY dis_order, id';   //读出所有自定义扩展字段的id
                    $fields_arr = M()->getAll($sql);
                    
                    $extend_field_str = '';    //生成扩展字段的内容字符串
                    foreach ($fields_arr AS $val)
                    {
                        $extend_field_index = 'extend_field' . $val['id'];
                        if(!empty($_POST[$extend_field_index]))
                        {
                            $temp_field_content = strlen($_POST[$extend_field_index]) > 100 ? mb_substr($_POST[$extend_field_index], 0, 99) : $_POST[$extend_field_index];
                            $extend_field_str .= " ('" . $_SESSION['ec_user_id'] . "', '" . $val['id'] . "', '" . compile_str($temp_field_content) . "'),";
                        }
                    }
                    $extend_field_str = substr($extend_field_str, 0, -1);
                    if ($extend_field_str)      //插入注册扩展数据
                    {
                        $sql = 'INSERT INTO '. $ecs->table('ec_reg_extend_info') . ' (`user_id`, `reg_field_id`, `content`) VALUES' . $extend_field_str;
                        M()->exe($sql);
                    }
                    
                    /* 写入密码提示问题和答案 */
                    if (!empty($passwd_answer) && !empty($sel_question))
                    {
                        $sql = 'UPDATE ' . $ecs->table('ec_users') . " SET `passwd_question`='$sel_question', `passwd_answer`='$passwd_answer'  WHERE `user_id`='" . $_SESSION['ec_user_id'] . "'";
                        M()->exe($sql);
                    }
                    /* 判断是否需要自动发送注册邮件 */
                    //TODO:验证邮箱之后加
                    /*if ($GLOBALS['_CFG']['member_email_validate'] && $GLOBALS['_CFG']['send_verify_email'])
                    {
                        send_regiter_hash($_SESSION['user_id']);
                    }*/
                    $this->show_message(sprintf('ユーザ名 %s 登録成功', $username ), 
                                        array('前ページ戻る', '個人情報を見る'), array($back_act, 'user.php'), 'info');
                    
                }else
                {
                    $err->show($_LANG['sign_up'], 'user.php?act=register');
                }
            }
        }
        else if ($action == 'order_query')
        {
            $_GET['order_sn'] = trim(substr($_GET['order_sn'], 1));
            $order_sn = empty($_GET['order_sn']) ? '' : addslashes($_GET['order_sn']);
            $json = new JSON();
            $result = array('error'=>0, 'message'=>'', 'content'=>'');
            if(isset($_SESSION['ec_last_order_query']))
            {
                if(time() - $_SESSION['ec_last_order_query'] <= 10)
                {
                    $result['error'] = 1;
                    $result['message'] = 'アクセス頻度が高い，少し待って後調べてください。';
                    die($json->encode($result));
                }
            }
            $_SESSION['ec_last_order_query'] = time();
            
            if (empty($order_sn))
            {
                $result['error'] = 1;
                $result['message'] = '無効な注文番号';
                die($json->encode($result));
            }
            $sql = "SELECT order_id, order_status, shipping_status, pay_status, ".
                   " shipping_time, shipping_id, invoice_no, user_id ".
                   " FROM " . $ecs->table('ec_order_info').
                   " WHERE order_sn = '$order_sn' LIMIT 1";
            $row = M()->getRowSql($sql);
            //p($row);die;
            if (empty($row))
            {
                $result['error'] = 1;
                $result['message'] = '無効な注文番号';
                die($json->encode($result));
            }
            
            /* 订单状态 */
            $_LANG['os'][OS_UNCONFIRMED] = '未確認';
            $_LANG['os'][OS_CONFIRMED] = '確認';
            $_LANG['os'][OS_CANCELED] = '<font color="red"> 取り消し</font>';
            $_LANG['os'][OS_INVALID] = '<font color="red">無効</font>';
            $_LANG['os'][OS_RETURNED] = '<font color="red">返品</font>';
            $_LANG['os'][OS_SPLITED] = '已分单';
            $_LANG['os'][OS_SPLITING_PART] = '部分分单';

            $_LANG['ps'][PS_UNPAYED] = '未付款';
            $_LANG['ps'][PS_PAYING] = '付款中';
            $_LANG['ps'][PS_PAYED] = '已付款';
            
            $_LANG['ss'][SS_UNSHIPPED] = '未发货';
            $_LANG['ss'][SS_PREPARING] = '配货中';
            $_LANG['ss'][SS_SHIPPED] = '已发货';
            $_LANG['ss'][SS_RECEIVED] = '收货确认';
            $_LANG['ss'][SS_SHIPPED_PART] = '已发货(部分商品)';
            $_LANG['ss'][SS_SHIPPED_ING] = '发货中';

            $order_query = array();
            $order_query['order_sn'] = $order_sn;
            $order_query['order_id'] = $row['order_id'];
            $order_query['order_status'] = $_LANG['os'][$row['order_status']] . ',' . $_LANG['ps'][$row['pay_status']] . ',' . $_LANG['ss'][$row['shipping_status']];
                
            if ($row['invoice_no'] && $row['shipping_id'] > 0)
            {
                $sql = "SELECT shipping_code FROM " . $ecs->table('ec_shipping') . " WHERE shipping_id = '$row[shipping_id]'";
                $shipping_code = M()->getOne($sql,'shipping_code');
                $plugin = ROOT_PATH . 'includes/modules/shipping/' . $shipping_code . '.php';
                if (file_exists($plugin))
                {
                    include_once($plugin);
                    $shipping = new $shipping_code;
                    $order_query['invoice_no'] = $shipping->query((string)$row['invoice_no']);
                }
                else
                {
                    $order_query['invoice_no'] = (string)$row['invoice_no'];
                }
            }
            $order_query['user_id'] = $row['user_id'];
            /* 如果是匿名用户显示发货时间 */
            if ($row['user_id'] == 0 && $row['shipping_time'] > 0)
            {
                $order_query['shipping_date'] = local_date(C('ec_date_format'), $row['shipping_time']);
            }
            $this->assign('order_query',    $order_query);
            $result['content'] = $this->fetch('template/' . C('WEB_STYLE') . '/ec/common/library/order_query.lbi');
            //p($result);die;
            die($json->encode($result));
            
            //p($row);
        }
        //首页邮件订阅ajax操做和验证操作
        elseif ($action =='email_list')
        {
            $job = $_GET['job'];
            if($job == 'add' || $job == 'del')
            {
                if(isset($_SESSION['ec_last_email_query']))
                {
                    if(time() - $_SESSION['ec_last_email_query'] <= 30)
                    {
                        die('您的提交频率太高，歇会儿再查吧。');
                    }
                }
                $_SESSION['ec_last_email_query'] = time();
            }
            $email = trim($_GET['email']);
            $email = htmlspecialchars($email);
            if (!is_email($email))
            {
                $info = sprintf('%s 不是合法的email地址', $email);
                die($info);
            }
            $ck = M()->getRowSql("SELECT * FROM " . $ecs->table('ec_email_list') . " WHERE email = '$email'");
            if ($job == 'add')
            {
                if (empty($ck))
                {
                    $hash = substr(md5(time()), 1, 10);
                    $sql = "INSERT INTO " . $ecs->table('ec_email_list') . " (email, stat, hash) VALUES ('$email', 0, '$hash')";
                    M()->exe($sql);
                    $info = '请查收邮件进行确认操作！';
                    $url = __ROOT__ . "/index.php?a=ec&c=EcUser&m=index&act=email_list&job=add_check&hash=$hash&email=$email";
                    //send_mail('', $email, $_LANG['check_mail'], sprintf($_LANG['check_mail_content'], $email, $_CFG['shop_name'], $url, $url, $_CFG['shop_name'], local_date('Y-m-d')), 1);
                    Mail::send($email, C('WEBNAME'), '验证邮件', 
                                sprintf("%s 您好：<br><br>这是由%s发送的邮件订阅验证邮件,点击以下的链接地址,完成验证操作。<br><a href=\"%s\" target=\"_blank\">%s</a>\n<br><br>%s<br>%s", 
                                        $email, C('ec_shop_name'), $url, $url, C('ec_shop_name'), local_date('Y-m-d')));
                }
                elseif ($ck['stat'] == 1)
                {
                    $info = sprintf('邮件地址已经存在于列表中！', $email);
                }
                else
                {
                    $hash = substr(md5(time()),1 , 10);
                    $sql = "UPDATE " . $ecs->table('ec_email_list') . "SET hash = '$hash' WHERE email = '$email'";
                    M()->exe($sql);
                    $info = '已经重新发送验证邮件，请查收并确认！';
                    $url = __ROOT__ . "/index.php?a=ec&c=EcUser&m=index&act=email_list&job=add_check&hash=$hash&email=$email";
                    Mail::send($email, C('WEBNAME'), '验证邮件', 
                                sprintf("%s 您好：<br><br>这是由%s发送的邮件订阅验证邮件,点击以下的链接地址,完成验证操作。<br><a href=\"%s\" target=\"_blank\">%s</a>\n<br><br>%s<br>%s", 
                                        $email, C('ec_shop_name'), $url, $url, C('ec_shop_name'), local_date('Y-m-d')));
                }
                die($info);
            }
            elseif ($job == 'del')
            {
                if (empty($ck))
                {
                    $info = sprintf('邮件地址不在列表中！', $email);
                }
                elseif ($ck['stat'] == 1)
                {
                    $hash = substr(md5(time()),1,10);
                    $sql = "UPDATE " . $ecs->table('ec_email_list') . "SET hash = '$hash' WHERE email = '$email'";
                    M()->exe($sql);
                    $info = '请查收邮件进行确认操作！';
                    $url = __ROOT__ . "/index.php?a=ec&c=EcUser&m=index&act=email_list&job=del_check&hash=$hash&email=$email";
                    Mail::send($email, C('WEBNAME'), '验证邮件', 
                                sprintf("%s 您好：<br><br>这是由%s发送的邮件订阅验证邮件,点击以下的链接地址,完成验证操作。<br><a href=\"%s\" target=\"_blank\">%s</a>\n<br><br>%s<br>%s", 
                                        $email, C('ec_shop_name'), $url, $url, C('ec_shop_name'), local_date('Y-m-d')));
                    //send_mail('', $email, $_LANG['check_mail'], sprintf($_LANG['check_mail_content'], $email, $_CFG['shop_name'], $url, $url, $_CFG['shop_name'], local_date('Y-m-d')), 1);
                }
                else
                {
                    $info = '此邮件地址是未验证状态，不需要退订！';
                }
                die($info);
                
            }
            elseif ($job == 'add_check')
            {
                if (empty($ck))
                {
                    $info = sprintf('邮件地址不在列表中！', $email);
                }
                elseif ($ck['stat'] == 1)
                {
                    $info = '邮件已经被确认！';
                }
                else
                {
                    if ($_GET['hash'] == $ck['hash'])
                    {
                        $sql = "UPDATE " . $ecs->table('ec_email_list') . "SET stat = 1 WHERE email = '$email'";
                        M()->exe($sql);
                        $info = '邮件已经被确认！';
                    }
                    else
                    {
                        $info = '验证串错误！请核对验证串或输入email地址重新发送验证串！';
                    }
                }
                $this->show_message($info, '返回首页',U('ec/EcIndex/index'));
            }
            elseif ($job == 'del_check')
            {
                if (empty($ck))
                {
                    $info = sprintf('无效的email地址', $email);
                }
                elseif ($ck['stat'] == 1)
                {
                    if ($_GET['hash'] == $ck['hash'])
                    {
                        $sql = "DELETE FROM " . $ecs->table('ec_email_list') . "WHERE email = '$email'";
                        M()->exe($sql);
                        $info = '邮件已经被退定！';
                    }
                    else
                    {
                        $info = '验证串错误！请核对验证串或输入email地址重新发送验证串！';
                    }
                }
                else
                {
                    $info =  '此邮件地址是未验证状态，不需要退订！';
                }
                $this->show_message($info, '返回首页',U('ec/EcIndex/index'));
            }
        }
        /* 个人资料页面 */
        elseif ($action == 'profile')
        {
            $user_info = get_profile($user_id);
            
            /* 取出注册扩展字段 */
            $sql = 'SELECT * FROM ' . $ecs->table('ec_reg_fields') . ' WHERE type < 2 AND display = 1 ORDER BY dis_order, id';
            $extend_info_list = M()->getAll($sql);
            
            $sql = 'SELECT reg_field_id, content ' .
                   'FROM ' . $ecs->table('ec_reg_extend_info') .
                   " WHERE user_id = $user_id";
            $extend_info_arr = M()->getAll($sql);
            
            $temp_arr = array();
            if(!empty($extend_info_arr))
            {
                foreach ($extend_info_arr AS $val)
                {
                    $temp_arr[$val['reg_field_id']] = $val['content'];
                }
            }
            if(!empty($extend_info_arr))
            {
                foreach ($extend_info_list AS $key => $val)
                {
                    switch ($val['id'])
                    {
                        case 1:     $extend_info_list[$key]['content'] = $user_info['msn']; break;
                        case 2:     $extend_info_list[$key]['content'] = $user_info['qq']; break;
                        case 3:     $extend_info_list[$key]['content'] = $user_info['office_phone']; break;
                        case 4:     $extend_info_list[$key]['content'] = $user_info['home_phone']; break;
                        case 5:     $extend_info_list[$key]['content'] = $user_info['mobile_phone']; break;
                        default:    $extend_info_list[$key]['content'] = empty($temp_arr[$val['id']]) ? '' : $temp_arr[$val['id']] ;
                    }
                }
            }
            
            $this->assign('extend_info_list', $extend_info_list);
            
            /* 密码找回问题 */
            $_LANG['passwd_questions']['friend_birthday'] = '一番親友の誕生日？';
            $_LANG['passwd_questions']['old_address']     = '子供時住む住所？';
            $_LANG['passwd_questions']['motto']           = '私の座右の銘？';
            $_LANG['passwd_questions']['favorite_movie']  = '一番好きな映画？';
            $_LANG['passwd_questions']['favorite_song']   = '一番好きな歌？';
            $_LANG['passwd_questions']['favorite_food']   = '一番好きな食べ物？？';
            $_LANG['passwd_questions']['interest']        = '一番の趣味？';
            $_LANG['passwd_questions']['favorite_novel']  = '一番好きな小説？';
            $_LANG['passwd_questions']['favorite_equipe'] = '一番好きなスポーツチーム？';
            
            /* 密码提示问题 */
            $this->assign('passwd_questions', $_LANG['passwd_questions']);
            $this->assign('profile', $user_info);
            $this -> display('template/' . C('WEB_STYLE') . '/ec/user_transaction.html');
        }
        /* 查看订单列表 */
        elseif ($action == 'order_list')
        {
            $page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;
            $record_count = M()->getOne("SELECT COUNT(*) FROM " .$ecs->table('ec_order_info'). " WHERE user_id = '$user_id'",'COUNT(*)');
            
            $pager  = get_pager(U('index'), array('act' => $action), $record_count, $page);
            
            $orders = get_user_orders($user_id, $pager['size'], $pager['start']);
            $merge  = get_user_merge($user_id);
    
            $this->assign('merge',  $merge);
            $this->assign('pager',  $pager);
            $this->assign('orders', $orders);
            $this -> display('template/' . C('WEB_STYLE') . '/ec/user_transaction.html');
            
        }
        /* 收货地址列表界面*/
        elseif ($action == 'address_list')
        {
            /* 取得国家列表、商店所在国家、商店所在国家的省列表 */
            $this->assign('country_list',       get_regions());
            $this->assign('shop_province_list', get_regions(1, C('ec_shop_country')));
            
            /* 获得用户所有的收货人信息 */
            $consignee_list = get_consignee_list($_SESSION['ec_user_id']);
    
            if (count($consignee_list) < 5 && $_SESSION['ec_user_id'] > 0)
            {
                /* 如果用户收货人信息的总数小于5 则增加一个新的收货人信息 */
                $consignee_list[] = array('country' => C('ec_shop_country'), 'email' => isset($_SESSION['ec_email']) ? $_SESSION['ec_email'] : '');
            }
            
            $this->assign('consignee_list', $consignee_list);
            
            //取得国家列表，如果有收货人列表，取得省市区列表
            foreach ($consignee_list AS $region_id => $consignee)
            {
                $consignee['country']  = isset($consignee['country'])  ? intval($consignee['country'])  : 0;
                $consignee['province'] = isset($consignee['province']) ? intval($consignee['province']) : 0;
                $consignee['city']     = isset($consignee['city'])     ? intval($consignee['city'])     : 0;
                
                $province_list[$region_id] = get_regions(1, $consignee['country']);
                $city_list[$region_id]     = get_regions(2, $consignee['province']);
                $district_list[$region_id] = get_regions(3, $consignee['city']);
            }
            
            /* 获取默认收货ID */
            $address_id  = M()->getOne("SELECT address_id FROM " .$ecs->table('ec_users'). " WHERE user_id='$user_id'",'address_id');
            
            //赋值于模板
            $this->assign('real_goods_count', 1);
            $this->assign('shop_country',     C('ec_shop_country'));
            $this->assign('shop_province',    get_regions(1, C('ec_shop_country')));
            $this->assign('province_list',    $province_list);
            $this->assign('address',          $address_id);
            $this->assign('city_list',        $city_list);
            $this->assign('district_list',    $district_list);
            $this->assign('currency_format',  C('ec_currency_format'));
            $this->assign('integral_scale',   C('ec_integral_scale'));
            $this->assign('name_of_region',   array(C('ec_name_of_region_1'), C('ec_name_of_region_2'), C('ec_name_of_region_3'), C('ec_name_of_region_4')));
        
            $this -> display('template/' . C('WEB_STYLE') . '/ec/user_transaction.html');
    
    
        }
        /* 显示收藏商品列表 */
        elseif ($action == 'collection_list')
        {
            $page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;
            $record_count = M()->getOne("SELECT COUNT(*) FROM " .$ecs->table('ec_collect_goods').
                                " WHERE user_id='$user_id' ORDER BY add_time DESC",'COUNT(*)');
            $pager = get_pager('user.php', array('act' => $action), $record_count, $page);
            $this->assign('pager', $pager);
            $this->assign('goods_list', get_collection_goods($user_id, $pager['size'], $pager['start']));
            $this->assign('url',        __ROOT__);
            $lang_list = array(
                'UTF8'   => '国际化编码（utf8）',
                'GB2312' => '简体中文',
                'BIG5'   => '繁体中文',
            );
            $this->assign('lang_list',  $lang_list);
            $this->assign('user_id',  $user_id);
            $this -> display('template/' . C('WEB_STYLE') . '/ec/user_clips.html');
                                
        }
        /* 显示留言列表 */
        elseif ($action == 'message_list')
        {
            $page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;

            $order_id = empty($_GET['order_id']) ? 0 : intval($_GET['order_id']);
            $order_info = array();
            
            /* 获取用户留言的数量 */
            if ($order_id)
            {
                $sql = "SELECT COUNT(*) FROM " .$ecs->table('ec_feedback').
                        " WHERE parent_id = 0 AND order_id = '$order_id' AND user_id = '$user_id'";
                $order_info = M()->getRowSql("SELECT * FROM " . $ecs->table('ec_order_info') . " WHERE order_id = '$order_id' AND user_id = '$user_id'");
                $order_info['url'] = 'user.php?act=order_detail&order_id=' . $order_id;
            }
            else
            {
                $sql = "SELECT COUNT(*) FROM " .$ecs->table('ec_feedback').
                   " WHERE parent_id = 0 AND user_id = '$user_id' AND user_name = '" . $_SESSION['ec_user_name'] . "' AND order_id=0";
            }
            $record_count = M()->getOne($sql,'COUNT(*)');
            $act = array('act' => $action);
            
            if ($order_id != '')
            {
                $act['order_id'] = $order_id;
            }
            $pager = get_pager('user.php', $act, $record_count, $page, 5);

            $this->assign('message_list', get_message_list($user_id, $_SESSION['ec_user_name'], $pager['size'], $pager['start'], $order_id));
            $this->assign('pager',        $pager);
            $this->assign('order_info',   $order_info);
            $this -> display('template/' . C('WEB_STYLE') . '/ec/user_clips.html');
        }
        /* 标签云列表 */
        elseif ($action == 'tag_list')
        {
        
            $good_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        
            $this->assign('tags',      get_user_tags($user_id));
            $this->assign('tags_from', 'user');
            $this -> display('template/' . C('WEB_STYLE') . '/ec/user_clips.html');
        }
        /* 显示缺货登记列表 */
        elseif ($action == 'booking_list')
        {
        
            $page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;
        
            /* 获取缺货登记的数量 */
            $sql = "SELECT COUNT(*) " .
                    "FROM " .$ecs->table('ec_booking_goods'). " AS bg, " .
                             $ecs->table('ec_goods') . " AS g " .
                    "WHERE bg.goods_id = g.goods_id AND user_id = '$user_id'";
            $record_count = M()->getOne($sql,'COUNT(*)');
            $pager = get_pager('user.php', array('act' => $action), $record_count, $page);
        
            $this->assign('booking_list', get_booking_list($user_id, $pager['size'], $pager['start']));
            $this->assign('pager',        $pager);
            $this -> display('template/' . C('WEB_STYLE') . '/ec/user_clips.html');
        }
        /* 我的红包列表 */
        elseif ($action == 'bonus')
        {
        
            $page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;
            $record_count = M()->getOne("SELECT COUNT(*) FROM " .$ecs->table('ec_user_bonus'). " WHERE user_id = '$user_id'",'COUNT(*)');
        
            $pager = get_pager('user.php', array('act' => $action), $record_count, $page);
            $bonus = get_user_bouns_list($user_id, $pager['size'], $pager['start']);
        
            $this->assign('pager', $pager);
            $this->assign('bonus', $bonus);
            $this -> display('template/' . C('WEB_STYLE') . '/ec/user_transaction.html');
        }
        
        /* 显示评论列表 */
        elseif ($action == 'comment_list')
        {
            $page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;
        
            /* 获取用户留言的数量 */
            $sql = "SELECT COUNT(*) FROM " .$ecs->table('ec_comment').
                   " WHERE parent_id = 0 AND user_id = '$user_id'";
            $record_count = M()->getOne($sql,'COUNT(*)');
            $pager = get_pager(U('index'), array('act' => $action), $record_count, $page, 5);
        
            $this->assign('comment_list', get_comment_list($user_id, $pager['size'], $pager['start']));
            $this->assign('pager',        $pager);
            $this -> display('template/' . C('WEB_STYLE') . '/ec/user_clips.html');
        }
        /* 删除评论 */
        elseif ($action == 'del_cmt')
        {
            $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
            if ($id > 0)
            {
                $sql = "DELETE FROM " .$ecs->table('ec_comment'). " WHERE comment_id = '$id' AND user_id = '$user_id'";
                M()->exe($sql);
            }
            ec_header("Location: ".U('index')."&act=comment_list\n");
            exit;
        }
        else if ($action == 'track_packages')
        {
            $page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;
            $orders = array();
            
            $sql = "SELECT order_id,order_sn,invoice_no,shipping_id FROM " .$ecs->table('ec_order_info').
                    " WHERE user_id = '$user_id' AND shipping_status = '" . SS_SHIPPED . "'";
            $res = M()->query($sql);
            $record_count = 0;
            if(!empty($res))
            {
                foreach($res as $item)
                {
                    $shipping   = get_shipping_object($item['shipping_id']);
                    if (method_exists ($shipping, 'query'))
                    {
                        $query_link = $shipping->query($item['invoice_no']);
                    }else
                    {
                        $query_link = $item['invoice_no'];
                    }
                    if ($query_link != $item['invoice_no'])
                    {
                        $item['query_link'] = $query_link;
                        $orders[]  = $item;
                        $record_count += 1;
                    }
                }
            }
            $pager  = get_pager('user.php', array('act' => $action), $record_count, $page);
            $this->assign('pager',  $pager);
            $this->assign('orders', $orders);
            $this -> display('template/' . C('WEB_STYLE') . '/ec/user_transaction.html');
        }
        /* 会员充值和提现申请记录 */
        elseif ($action == 'account_log')
        {
        
            $page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;
        
            /* 获取记录条数 */
            $sql = "SELECT COUNT(*) FROM " .$ecs->table('ec_user_account').
                   " WHERE user_id = '$user_id'" .
                   " AND process_type " . db_create_in(array(SURPLUS_SAVE, SURPLUS_RETURN));
            $record_count = M()->getOne($sql,'COUNT(*)');
        
            //分页函数
            $pager = get_pager('user.php', array('act' => $action), $record_count, $page);
        
            //获取剩余余额
            $surplus_amount = get_user_surplus($user_id);
            if (empty($surplus_amount))
            {
                $surplus_amount = 0;
            }
        
            //获取余额记录
            $account_log = get_account_log($user_id, $pager['size'], $pager['start']);
        
            //模板赋值
            $this->assign('surplus_amount', price_format($surplus_amount, false));
            $this->assign('account_log',    $account_log);
            $this->assign('pager',          $pager);
            $this -> display('template/' . C('WEB_STYLE') . '/ec/user_transaction.html');
        }

        /* 退出会员中心 */
        elseif ($action == 'logout')
        {
            if ((!isset($back_act)|| empty($back_act)) && isset($GLOBALS['_SERVER']['HTTP_REFERER']))
            {
                $back_act = strpos($GLOBALS['_SERVER']['HTTP_REFERER'], 'user.php') ? './index.php' : $GLOBALS['_SERVER']['HTTP_REFERER'];
            }
            //p($back_act);die;
            $user->logout();
            //$ucdata = empty($user->ucdata)? "" : $user->ucdata;
            $this -> show_message('ログアウト' , array('前ページ戻る', 'トップ戻る'), array($back_act, U('ec/EcIndex/index')), 'info');
        }
        /* 添加收藏商品(ajax) */
        elseif ($action == 'collect')
        {
            $json = new JSON();
            $result = array('error' => 0, 'message' => '');
            $goods_id = $_GET['id'];
            
            if (!isset($_SESSION['ec_user_id']) || $_SESSION['ec_user_id'] == 0)
            {
                $result['error'] = 1;
                $result['message'] = '由于您还没有登录，因此您还不能使用该功能。';
                die($json->encode($result));
            }
            else
            {
                /* 检查是否已经存在于用户的收藏夹 */
                $sql = "SELECT COUNT(*) FROM " .$ecs->table('ec_collect_goods') .
                    " WHERE user_id='$_SESSION[ec_user_id]' AND goods_id = '$goods_id'";
                if (M()->GetOne($sql,'COUNT(*)') > 0)
                {
                    $result['error'] = 1;
                    $result['message'] = '该商品已经存在于您的收藏夹中。';
                    die($json->encode($result));
                }
                else
                {
                    $time = gmtime();
                    $sql = "INSERT INTO " .$ecs->table('ec_collect_goods'). " (user_id, goods_id, add_time)" .
                            "VALUES ('$_SESSION[ec_user_id]', '$goods_id', '$time')";
                    if (M()->exe($sql) === false)
                    {
                        $result['error'] = 1;
                        $result['message'] = '数据库报错';
                        die($json->encode($result));
                    }
                    else
                    {
                        $result['error'] = 0;
                        $result['message'] = '该商品已经成功地加入了您的收藏夹。';
                        die($json->encode($result));
                    }
                }
            }
        }
        /* 添加标签(ajax) */
        elseif ($action == 'add_tag')
        {
        
            $result = array('error' => 0, 'message' => '', 'content' => '');
            $id     = isset($_POST['id']) ? intval($_POST['id']) : 0;
            $tag    = isset($_POST['tag']) ? json_str_iconv(trim($_POST['tag'])) : '';
        
            if ($user_id == 0)
            {
                /* 用户没有登录 */
                $result['error']   = 1;
                $result['message'] = '对不起，只有注册会员并且正常登录以后才能提交标记。';
            }
            else
            {
                add_tag($id, $tag); // 添加tag
                clear_cache_files('goods'); // 删除缓存
        
                /* 重新获得该商品的所有缓存 */
                $arr = get_tags($id);
        
                foreach ($arr AS $row)
                {
                    $result['content'][] = array('word' => htmlspecialchars($row['tag_words']), 'count' => $row['tag_count']);
                }
            }
        
            $json = new JSON;
        
            echo $json->encode($result);
            exit;
        }
        /* ajax 发送验证邮件 */
        elseif ($action == 'send_hash_mail')
        {
            $json = new JSON();

            $result = array('error' => 0, 'message' => '', 'content' => '');
            if ($user_id == 0)
            {
                /* 用户没有登录 */
                $result['error']   = 1;
                $result['message'] = '由于您还没有登录，因此您还不能使用该功能。';
                die($json->encode($result));
            }
            /* 设置验证邮件模板所需要的内容信息 */
            $template    = get_mail_template('register_validate');
            $hash = register_hash('encode', $user_id);
            $validate_email = __ROOT__ . '/index.php?a=ec&c=EcUser&m=index&act=validate_email&hash=' . $hash;
            
            $sql = "SELECT user_name, email FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_users') . " WHERE user_id = '$user_id'";
            $row = M()->getRowSql($sql);
            
            $this->assign('user_name',         $row['user_name']);
            $this->assign('validate_email',    $validate_email);
            $this->assign('shop_name',         C('ec_shop_name'));
            $this->assign('send_date',         date(C('ec_date_format')));
            $content= $this -> view->contentCompile('str:' . $template['template_content']);
            $mail_result = Mail::send($row['email'], C('ec_shop_name'), $template['template_subject'], $content);
            
            if($mail_result)
            {
                $result['message'] = '验证邮件发送成功';
                die($json->encode($result));
            }
            else
            {
                $result['error'] = 1;
                $result['message'] = '验证邮件发送失败';
                
            }
            die($json->encode($result));
        }
        /* 验证用户注册邮件 */
        elseif ($action == 'validate_email')
        {
            $hash = empty($_GET['hash']) ? '' : trim($_GET['hash']);
            if ($hash)
            {
                $id = register_hash('decode', $hash);
                if ($id > 0)
                {
                    $sql = "UPDATE " . $ecs->table('ec_users') . " SET is_validated = 1 WHERE user_id='$id'";
                    M()->exe($sql);
                    $sql = 'SELECT user_name, email FROM ' . $ecs->table('ec_users') . " WHERE user_id = '$id'";
                    $row = M()->getRowSql($sql);
                    $this -> show_message(sprintf('%s 您好，您email %s 已通过验证', $row['user_name'], $row['email']),'查看我的个人资料', U('index'));
                }
            }
            $this -> show_message('验证失败，请确认你的验证链接是否正确');
        }
        /* 密码找回-->输入用户名界面 */
        elseif ($action == 'qpassword_name')
        {
            //显示输入要找回密码的账号表单
            $this -> display('template/' . C('WEB_STYLE') . '/ec/user_passport.html');
        }
        /* 密码找回-->根据注册用户名取得密码提示问题界面 */
        elseif ($action == 'get_passwd_question')
        {
            if (empty($_POST['user_name']))
            {
                $this -> show_message('您没有输入姓名。', '返回首页', U('ec/EcIndex/index'), 'info');
            }
            else
            {
                $user_name = trim($_POST['user_name']);
            }
            //取出会员密码问题和答案
            $sql = 'SELECT user_id, user_name, passwd_question, passwd_answer FROM ' . $ecs->table('ec_users') . " WHERE user_name = '" . $user_name . "'";
            $user_question_arr = M()->getRowSql($sql);
            
            //如果没有设置密码问题，给出错误提示
            if (empty($user_question_arr['passwd_answer']))
            {
                $this -> show_message('您没有设置密码提示问题，无法通过这种方式找回密码。', '返回首页', U('ec/EcIndex/index'), 'info');
            }
            $_SESSION['ec_temp_user'] = $user_question_arr['user_id'];  //设置临时用户，不具有有效身份
            $_SESSION['ec_temp_user_name'] = $user_question_arr['user_name'];  //设置临时用户，不具有有效身份
            $_SESSION['ec_passwd_answer'] = $user_question_arr['passwd_answer'];   //存储密码问题答案，减少一次数据库访问
            
            //TODO:captcha
            //$captcha = intval($_CFG['captcha']);
            //if (($captcha & CAPTCHA_LOGIN) && (!($captcha & CAPTCHA_LOGIN_FAIL) || (($captcha & CAPTCHA_LOGIN_FAIL) && $_SESSION['login_fail'] > 2)) && gd_version() > 0)
            if(true)
            {
                $this->assign('enabled_captcha', 1);
                $this->assign('rand', mt_rand());
            }
            /* 密码找回问题 */

            $_LANG['passwd_questions']['friend_birthday'] = '一番親友の誕生日？';
            $_LANG['passwd_questions']['old_address']     = '子供時住む住所？';
            $_LANG['passwd_questions']['motto']           = '私の座右の銘？';
            $_LANG['passwd_questions']['favorite_movie']  = '一番好きな映画？';
            $_LANG['passwd_questions']['favorite_song']   = '一番好きな歌？';
            $_LANG['passwd_questions']['favorite_food']   = '一番好きな食べ物？？';
            $_LANG['passwd_questions']['interest']        = '一番の趣味？';
            $_LANG['passwd_questions']['favorite_novel']  = '一番好きな小説？';
            $_LANG['passwd_questions']['favorite_equipe'] = '一番好きなスポーツチーム？';
    
            $this->assign('passwd_question', $_LANG['passwd_questions'][$user_question_arr['passwd_question']]);
            $this -> display('template/' . C('WEB_STYLE') . '/ec/user_passport.html');
        }
        /* 密码找回-->根据提交的密码答案进行相应处理 */
        elseif ($action == 'check_answer')
        {
            //TODO:captcha
            //$captcha = intval($_CFG['captcha']);
            //if (($captcha & CAPTCHA_LOGIN) && (!($captcha & CAPTCHA_LOGIN_FAIL) || (($captcha & CAPTCHA_LOGIN_FAIL) && $_SESSION['login_fail'] > 2)) && gd_version() > 0)
            if(true)
            {
                if (empty($_POST['captcha']))
                {
                    $this -> show_message('对不起，您输入的验证码不正确。', '返回重试', U('index').'&act=qpassword_name', 'error');
                }
        
                /* 检查验证码 */
                $validator = new EcCaptcha();
                $validator->session_word = 'captcha_login';
                if (!$validator->check_word($_POST['captcha']))
                {
                    $this -> show_message('对不起，您输入的验证码不正确。', '返回重试', U('index').'&act=qpassword_name', 'error');
                }
            }
            if (empty($_POST['passwd_answer']) || $_POST['passwd_answer'] != $_SESSION['ec_passwd_answer'])
            {
                $this -> show_message('您输入的密码答案是错误的', '返回重试', U('index').'&act=qpassword_name', 'info');
            }
            else
            {
                $_SESSION['ec_user_id'] = $_SESSION['ec_temp_user'];
                $_SESSION['ec_user_name'] = $_SESSION['ec_temp_user_name'];
                //unset($_SESSION['ec_temp_user']);
                //unset($_SESSION['ec_temp_user_name']);
                $this->assign('uid',    $_SESSION['ec_user_id']);
                $this->assign('action', 'reset_password');
                $this -> display('template/' . C('WEB_STYLE') . '/ec/user_passport.html');
            }
        
        }
        /* 修改会员密码 */
        elseif ($action == 'act_edit_password')
        {
            $old_password = isset($_POST['old_password']) ? trim($_POST['old_password']) : null;
            $new_password = isset($_POST['new_password']) ? trim($_POST['new_password']) : '';
            $user_id      = isset($_POST['uid'])  ? intval($_POST['uid']) : $user_id;
            $code         = isset($_POST['code']) ? trim($_POST['code'])  : '';
            
            if (strlen($new_password) < 6)
            {
                $this->show_message('- 登录密码不能少于 6 个字符。');
            }
            
            $user_info = $user->get_profile_by_id($user_id); //论坛记录
            if (
                    (
                        $user_info && 
                        (
                            !empty($code) && 
                            md5($user_info['user_id'] . C('ec_hash_code') . $user_info['reg_time']) == $code
                        )
                    ) || 
                    (
                        $_SESSION['ec_user_id']>0 && 
                        $_SESSION['ec_user_id'] == $user_id && 
                        $user->check_user($_SESSION['ec_user_name'], $old_password)))
            {
                
                if ($user->edit_user(
                                        array(
                                                'username'=> (empty($code) ? $_SESSION['ec_user_name'] : $user_info['user_name']), 
                                                'old_password'=>$old_password, 
                                                'password'=>$new_password
                                            ), 
                                            empty($code) ? 0 : 1
                                        )
                    )
                {

                    $sql="UPDATE ".$ecs->table('ec_users'). "SET `ec_salt`='0' WHERE user_id= '".$user_id."'";
                    M()->exe($sql);
                    $user->logout();
                    $this->show_message('您的新密码已设置成功！', '重新登录', U('index').'&act=login', 'info');
                }
                else
                {
                    $this->show_message('您输入的原密码不正确！', '返回上一页', '', 'info');
                }
            }
            else
            {
                $this->show_message('您输入的原密码不正确！', '返回上一页', '', 'info');
            }
        }
        /* 密码找回-->修改密码界面 */
        elseif ($action == 'get_password')
        {
            if (isset($_GET['code']) && isset($_GET['uid'])) //从邮件处获得的act
            {
                $code = trim($_GET['code']);
                $uid  = intval($_GET['uid']);
        
                /* 判断链接的合法性 */
                $user_info = $user->get_profile_by_id($uid);
        
                if (empty($user_info) || ($user_info && md5($user_info['user_id'] . C('ec_hash_code') . $user_info['reg_time']) != $code))
                {
                    $this->show_message('参数错误', '返回首页', U('ec/EcIndex/index'), 'info');
                }
                $this->assign('uid',    $uid);
                $this->assign('code',   $code);
                $this->assign('action', 'reset_password');
                $this -> display('template/' . C('WEB_STYLE') . '/ec/user_passport.html');
            }
            else
            {
                $this -> display('template/' . C('WEB_STYLE') . '/ec/user_passport.html');
            }
        }
        /* 发送密码修改确认邮件 */
        elseif ($action == 'send_pwd_email')
        {
            
            /* 初始化会员用户名和邮件地址 */
            $user_name = !empty($_POST['user_name']) ? trim($_POST['user_name']) : '';
            $email     = !empty($_POST['email'])     ? trim($_POST['email'])     : '';
            
            //用户名和邮件地址是否匹配
            $user_info = $user->get_user_info($user_name);
            if ($user_info && $user_info['email'] == $email)
            {
                
                $code = md5($user_info['user_id'] . C('ec_hash_code') . $user_info['reg_time']);
                
                if (empty($user_info['user_id']) || empty($user_name) || empty($email) || empty($code))
                {
                    ec_header("Location: ".U('index')."&act=get_password\n");
            
                    exit;
                }
                
    
                /* 设置验证邮件模板所需要的内容信息 */
                $template    = get_mail_template('send_password');
                $reset_email = __ROOT__ . '/index.php?a=ec&c=EcUser&m=index&act=get_password&uid=' . $user_info['user_id'] . '&code=' . $code;

                $this->assign('user_name',   $user_name);
                $this->assign('reset_email', $reset_email);
                $this->assign('shop_name',   C('ec_shop_name'));
                $this->assign('send_date',   date('Y-m-d'));
                $this->assign('sent_date',   date('Y-m-d'));
                
                
                $content= $this -> view->contentCompile('str:' . $template['template_content']);
                
                $mail_result = Mail::send($email, C('ec_shop_name'), $template['template_subject'], $content);
                if($mail_result)
                {
                    $this->show_message('重置密码的邮件已经发到您的邮箱：' . $email, '返回首页',U('ec/EcIndex/index'), 'info');
                }
                else
                {
                    //发送邮件出错
                    $this->show_message('发送邮件出错，请与管理员联系！', '返回上一页', '', 'info');
                }
                
            
            }
            else
            {
                //用户名与邮件地址不匹配
                $this -> show_message('您填写的用户名与电子邮件地址不匹配，请重新输入！', '返回上一页', '', 'info');
            }
        }
        /* 修改个人资料的处理 */
        elseif ($action == 'act_edit_profile')
        {
            $birthday = trim($_POST['birthdayYear']) .'-'. trim($_POST['birthdayMonth']) .'-'.trim($_POST['birthdayDay']);
            $email = trim($_POST['email']);
            $other['msn'] = $msn = isset($_POST['extend_field1']) ? trim($_POST['extend_field1']) : '';
            $other['qq'] = $qq = isset($_POST['extend_field2']) ? trim($_POST['extend_field2']) : '';
            $other['office_phone'] = $office_phone = isset($_POST['extend_field3']) ? trim($_POST['extend_field3']) : '';
            $other['home_phone'] = $home_phone = isset($_POST['extend_field4']) ? trim($_POST['extend_field4']) : '';
            $other['mobile_phone'] = $mobile_phone = isset($_POST['extend_field5']) ? trim($_POST['extend_field5']) : '';
            $sel_question = empty($_POST['sel_question']) ? '' : compile_str($_POST['sel_question']);
            $passwd_answer = isset($_POST['passwd_answer']) ? compile_str(trim($_POST['passwd_answer'])) : '';
            
            /* 更新用户扩展字段的数据 */
            $sql = 'SELECT id FROM ' . $ecs->table('ec_reg_fields') . ' WHERE type = 0 AND display = 1 ORDER BY dis_order, id';   //读出所有扩展字段的id
            $fields_arr = M()->getAll($sql);
            
            if(!empty($fields_arr))
            {
                foreach ($fields_arr AS $val)       //循环更新扩展用户信息
                {
                    $extend_field_index = 'extend_field' . $val['id'];
                    if(isset($_POST[$extend_field_index]))
                    {
                        $temp_field_content = strlen($_POST[$extend_field_index]) > 100 ? 
                                                    mb_substr(htmlspecialchars($_POST[$extend_field_index]), 0, 99) : 
                                                    htmlspecialchars($_POST[$extend_field_index]);
                        $sql = 'SELECT COUNT(*) FROM ' . $ecs->table('ec_reg_extend_info') . "  WHERE reg_field_id = '$val[id]' AND user_id = '$user_id'";
                        if (M()->getOne($sql,'COUNT(*)'))      //如果之前没有记录，则插入
                        {
                            $sql = 'UPDATE ' . $ecs->table('ec_reg_extend_info') . " SET content = '$temp_field_content' WHERE reg_field_id = '$val[id]' AND user_id = '$user_id'";
                        }
                        else
                        {
                            $sql = 'INSERT INTO '. $ecs->table('ec_reg_extend_info') . " (`user_id`, `reg_field_id`, `content`) VALUES ('$user_id', '$val[id]', '$temp_field_content')";
                        }
                        M()->exe($sql);
                    }
                }
            }
            
            /* 写入密码提示问题和答案 */
            if (!empty($passwd_answer) && !empty($sel_question))
            {
                $sql = 'UPDATE ' . $ecs->table('ec_users') . " SET `passwd_question`='$sel_question', `passwd_answer`='$passwd_answer'  WHERE `user_id`='" . $_SESSION['ec_user_id'] . "'";
                M()->exe($sql);
            }
            if (!empty($office_phone) && !preg_match( '/^[\d|\_|\-|\s]+$/', $office_phone ) )
            {
                $this -> show_message('- 办公电话不是一个有效号码');
            }
            if (!empty($home_phone) && !preg_match( '/^[\d|\_|\-|\s]+$/', $home_phone) )
            {
                 $this -> show_message('- 家庭电话不是一个有效号码');
            }
            if (!is_email($email))
            {
                $this -> show_message('邮件地址不合法');
            }
            if (!empty($msn) && !is_email($msn))
            {
                 $this -> show_message('- msn地址不是一個有效的郵件地址');
            }
            if (!empty($qq) && !preg_match('/^\d+$/', $qq))
            {
                 $this -> show_message('- QQ号码不是一个有效的号码');
            }
            if (!empty($mobile_phone) && !preg_match('/^[\d-\s]+$/', $mobile_phone))
            {
                $this -> show_message('- 手机号码不是一个有效号码');
            }
            $profile  = array(
                                'user_id'  => $user_id,
                                'email'    => isset($_POST['email']) ? trim($_POST['email']) : '',
                                'sex'      => isset($_POST['sex'])   ? intval($_POST['sex']) : 0,
                                'birthday' => $birthday,
                                'other'    => isset($other) ? $other : array()
                            );
            if (edit_profile($profile))
            {
                $this -> show_message('您的个人资料已经成功修改！', '查看我的个人资料', U('index').'&act=profile', 'info');
            }
            else
            {
                if ($user->error == ERR_EMAIL_EXISTS)
                {
                    $msg = sprintf('%s 已经存在', $profile['email']);
                }
                else
                {
                    $msg = '修改个人资料操作失败！';
                }
                $this -> show_message($msg, '', '', 'info');
            }
        }
        /* 添加/编辑收货地址的处理 */
        elseif ($action == 'act_edit_address')
        {
            $address = array(
                                'user_id'    => $user_id,
                                'address_id' => intval($_POST['address_id']),
                                'country'    => isset($_POST['country'])   ? intval($_POST['country'])  : 0,
                                'province'   => isset($_POST['province'])  ? intval($_POST['province']) : 0,
                                'city'       => isset($_POST['city'])      ? intval($_POST['city'])     : 0,
                                'district'   => isset($_POST['district'])  ? intval($_POST['district']) : 0,
                                'address'    => isset($_POST['address'])   ? compile_str(trim($_POST['address']))    : '',
                                'consignee'  => isset($_POST['consignee']) ? compile_str(trim($_POST['consignee']))  : '',
                                'email'      => isset($_POST['email'])     ? compile_str(trim($_POST['email']))      : '',
                                'tel'        => isset($_POST['tel'])       ? compile_str(make_semiangle(trim($_POST['tel']))) : '',
                                'mobile'     => isset($_POST['mobile'])    ? compile_str(make_semiangle(trim($_POST['mobile']))) : '',
                                'best_time'  => isset($_POST['best_time']) ? compile_str(trim($_POST['best_time']))  : '',
                                'sign_building' => isset($_POST['sign_building']) ? compile_str(trim($_POST['sign_building'])) : '',
                                'zipcode'       => isset($_POST['zipcode'])       ? compile_str(make_semiangle(trim($_POST['zipcode']))) : '',
                            );
            if (update_address($address))
            {
                $this -> show_message('受け取り住所情報を変更成功！', '住所リストに戻る', U('index').'&act=address_list');
            }
        }
        /* 删除收货地址 */
        elseif ($action == 'drop_consignee')
        {
            $consignee_id = intval($_GET['id']);
        
            if (drop_consignee($consignee_id))
            {
                ec_header("Location: ".U('index')."&act=address_list\n");
                exit;
            }
            else
            {
                $this -> show_message('删除收货地址失败！');
            }
        }
        /* 添加关注商品 */
        elseif ($action == 'add_to_attention')
        {
            $rec_id = (int)$_GET['rec_id'];
            if ($rec_id)
            {
                M()->exe('UPDATE ' .$ecs->table('ec_collect_goods'). "SET is_attention = 1 WHERE rec_id='$rec_id' AND user_id ='$user_id'" );
            }
            ec_header("Location: ".U('index')."&act=collection_list\n");
            exit;
        }
        /* 取消关注商品 */
        elseif ($action == 'del_attention')
        {
            $rec_id = (int)$_GET['rec_id'];
            if ($rec_id)
            {
                M()->exe('UPDATE ' .$ecs->table('ec_collect_goods'). "SET is_attention = 0 WHERE rec_id='$rec_id' AND user_id ='$user_id'" );
            }
            ec_header("Location: ".U('index')."&act=collection_list\n");
            exit;
        }
        /* 删除收藏的商品 */
        elseif ($action == 'delete_collection')
        {
        
            $collection_id = isset($_GET['collection_id']) ? intval($_GET['collection_id']) : 0;
        
            if ($collection_id > 0)
            {
                M()->exe('DELETE FROM ' .$ecs->table('ec_collect_goods'). " WHERE rec_id='$collection_id' AND user_id ='$user_id'" );
            }
        
            ec_header("Location: ".U('index')."&act=collection_list\n");
            exit;
        }
        /* 添加我的留言 */
        elseif ($action == 'act_add_message')
        {
            $message = array(
                            'user_id'     => $user_id,
                            'user_name'   => $_SESSION['ec_user_name'],
                            'user_email'  => $_SESSION['ec_email'],
                            'msg_type'    => isset($_POST['msg_type']) ? intval($_POST['msg_type'])     : 0,
                            'msg_title'   => isset($_POST['msg_title']) ? trim($_POST['msg_title'])     : '',
                            'msg_content' => isset($_POST['msg_content']) ? trim($_POST['msg_content']) : '',
                            'order_id'=>empty($_POST['order_id']) ? 0 : intval($_POST['order_id']),
                            'upload'      => (isset($_FILES['message_img']['error']) && $_FILES['message_img']['error'] == 0) || (!isset($_FILES['message_img']['error']) && isset($_FILES['message_img']['tmp_name']) && $_FILES['message_img']['tmp_name'] != 'none')
                             ? $_FILES['message_img'] : array()
                         );
            if (add_message($message))
            {
                $this -> show_message('发表留言成功', '返回留言列表', U('index').'&act=message_list&order_id=' . $message['order_id'],'info');
            }
            else
            {
                $err->show('返回留言列表', U('index').'&act=message_list');
            }
        }
        /* 删除留言 */
        elseif ($action == 'del_msg')
        {
            $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
            $order_id = empty($_GET['order_id']) ? 0 : intval($_GET['order_id']);
            if ($id > 0)
            {
                $sql = 'SELECT user_id, message_img FROM ' .$ecs->table('ec_feedback'). " WHERE msg_id = '$id' LIMIT 1";
                $row = M()->getRowSql($sql);
                if ($row && $row['user_id'] == $user_id)
                {
                    /* 验证通过，删除留言，回复，及相应文件 */
                    if ($row['message_img'])
                    {
                        @unlink(ROOT_PATH . EC_DATA_DIR . '/feedbackimg/'. $row['message_img']);
                    }
                    
                    $sql = "DELETE FROM " .$ecs->table('ec_feedback'). " WHERE msg_id = '$id' OR parent_id = '$id'";
                    M()->exe($sql);
                }
            }
            ec_header("Location: ".U('index')."&act=message_list&order_id=$order_id\n");
            exit;
        }

    }
    
    
	
}
