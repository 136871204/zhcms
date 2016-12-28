<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcCommentControl extends EcControl {
    
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
        //echo 'aaa';die;
    }
    
    public function index(){
        header("Content-type:text/html;charset=utf-8");
        $ecs=$GLOBALS['ec_globals']['ecs'];
        
        if (!isset($_REQUEST['cmt']) && !isset($_REQUEST['act']))
        {
            /* 只有在没有提交评论内容以及没有act的情况下才跳转 */
            ec_header("Location: ".U('ec/EcIndex/index')."\n");
            exit;
        }
        $_REQUEST['cmt'] = isset($_REQUEST['cmt']) ? json_str_iconv($_REQUEST['cmt']) : '';
        $json   = new JSON;
        $result = array('error' => 0, 'message' => '', 'content' => '');
        
        if (empty($_REQUEST['act']))
        {
            /*
             * act 参数为空
             * 默认为添加评论内容
             */
            $cmt  = $json->decode($_REQUEST['cmt']);
            $cmt->page = 1;
            $cmt->id   = !empty($cmt->id)   ? intval($cmt->id) : 0;
            $cmt->type = !empty($cmt->type) ? intval($cmt->type) : 0;
            
            if (empty($cmt) || !isset($cmt->type) || !isset($cmt->id))
            {
                $result['error']   = 1;
                $result['message'] = '无效的评论内容!';
            }
            elseif (!is_email($cmt->email))
            {
                $result['error']   = 1;
                $result['message'] = '电子邮件地址格式不正确!';
            }
            else
            {
                //if ((intval($ec_captcha) & CAPTCHA_COMMENT) && gd_version() > 0)
                if(true)
                {
                    $validator = new EcCaptcha();
                    if (!$validator->check_word($cmt->captcha))
                    {
                        $result['error']   = 1;
                        $result['message'] = '对不起，您输入的验证码不正确。';
                    }
                    else
                    {
                        $ec_comment_factor=C('ec_comment_factor');
                        $factor = intval($ec_comment_factor);
                        if ($cmt->type == 0 && $factor > 0)
                        {
                            /* 只有商品才检查评论条件 */
                            switch ($factor)
                            {
                                case COMMENT_LOGIN :
                                    if ($_SESSION['ec_user_id'] == 0)
                                    {
                                        $result['error']   = 1;
                                        $result['message'] = '只有注册会员才能发表评论，请您登录后再发表评论';
                                    }
                                    break;
                                case COMMENT_CUSTOM :
                                    if ($_SESSION['ec_user_id'] > 0)
                                    {
                                        $sql = "SELECT o.order_id as o_id FROM " . $ecs->table('ec_order_info') . " AS o ".
                                               " WHERE user_id = '" . $_SESSION['ec_user_id'] . "'".
                                               " AND (o.order_status = '" . OS_CONFIRMED . "' or o.order_status = '" . OS_SPLITED . "') ".
                                               " AND (o.pay_status = '" . PS_PAYED . "' OR o.pay_status = '" . PS_PAYING . "') ".
                                               " AND (o.shipping_status = '" . SS_SHIPPED . "' OR o.shipping_status = '" . SS_RECEIVED . "') ".
                                               " LIMIT 1";
                                        $tmp = M()->getOne($sql,'o_id');
                                        if (empty($tmp))
                                         {
                                            $result['error']   = 1;
                                            $result['message'] = '评论失败。只有在本店购买过商品的注册会员才能发表评论。';
                                         }
                                    }
                                    else
                                    {
                                        $result['error'] = 1;
                                        $result['message'] = '评论失败。只有在本店购买过商品的注册会员才能发表评论。';
                                    }
                                    break;
                                case COMMENT_BOUGHT :
                                    if ($_SESSION['ec_user_id'] > 0)
                                    {
                                        $sql = "SELECT o.order_id as o_id".
                                               " FROM " . $ecs->table('ec_order_info'). " AS o, ".
                                               $ecs->table('ec_order_goods') . " AS og ".
                                               " WHERE o.order_id = og.order_id".
                                               " AND o.user_id = '" . $_SESSION['ec_user_id'] . "'".
                                               " AND og.goods_id = '" . $cmt->id . "'".
                                               " AND (o.order_status = '" . OS_CONFIRMED . "' or o.order_status = '" . OS_SPLITED . "') ".
                                               " AND (o.pay_status = '" . PS_PAYED . "' OR o.pay_status = '" . PS_PAYING . "') ".
                                               " AND (o.shipping_status = '" . SS_SHIPPED . "' OR o.shipping_status = '" . SS_RECEIVED . "') ".
                                               " LIMIT 1";
                                         $tmp = M()->getOne($sql,'o_id');
                                         if (empty($tmp))
                                         {
                                            $result['error']   = 1;
                                            $result['message'] = '评论失败。只有购买过此商品的注册用户才能评论该商品。';
                                         }
                                    }
                                    else
                                    {
                                        $result['error']   = 1;
                                        $result['message'] = '评论失败。只有购买过此商品的注册用户才能评论该商品。';
                                    }  
                            }
                        }
                        /* 无错误就保存留言 */
                        if (empty($result['error']))
                        {
                            $this -> add_comment($cmt);
                        }
                    }
                    
                }
                else
                {
                    /* 没有验证码时，用时间来限制机器人发帖或恶意发评论 */
                    if (!isset($_SESSION['ec_send_time']))
                    {
                        $_SESSION['ec_send_time'] = 0;
                    }
                    $cur_time = gmtime();
                    if (($cur_time - $_SESSION['ec_send_time']) < 30) // 小于30秒禁止发评论
                    {
                        $result['error']   = 1;
                        $result['message'] = '您至少在30秒后才可以继续发表评论!';
                    }
                    else
                    {
                        $ec_comment_factor=C('ec_comment_factor');
                        $factor = intval($ec_comment_factor);
                        if ($cmt->type == 0 && $factor > 0)
                        {
                            /* 只有商品才检查评论条件 */
                            switch ($factor)
                            {
                                case COMMENT_LOGIN :
                                    if ($_SESSION['ec_user_id'] == 0)
                                    {
                                        $result['error']   = 1;
                                        $result['message'] = '只有注册会员才能发表评论，请您登录后再发表评论';
                                    }
                                    break;
                                case COMMENT_CUSTOM :
                                    if ($_SESSION['ec_user_id'] > 0)
                                    {
                                        $sql = "SELECT o.order_id as o_id FROM " . $ecs->table('ec_order_info') . " AS o ".
                                               " WHERE user_id = '" . $_SESSION['ec_user_id'] . "'".
                                               " AND (o.order_status = '" . OS_CONFIRMED . "' or o.order_status = '" . OS_SPLITED . "') ".
                                               " AND (o.pay_status = '" . PS_PAYED . "' OR o.pay_status = '" . PS_PAYING . "') ".
                                               " AND (o.shipping_status = '" . SS_SHIPPED . "' OR o.shipping_status = '" . SS_RECEIVED . "') ".
                                               " LIMIT 1";
                                        $tmp = M()->getOne($sql,'o_id');
                                        if (empty($tmp))
                                         {
                                            $result['error']   = 1;
                                            $result['message'] = '评论失败。只有在本店购买过商品的注册会员才能发表评论。';
                                         }
                                    }
                                    else
                                    {
                                        $result['error'] = 1;
                                        $result['message'] = '评论失败。只有在本店购买过商品的注册会员才能发表评论。';
                                    }
                                    break;
                                case COMMENT_BOUGHT :
                                    if ($_SESSION['ec_user_id'] > 0)
                                    {
                                        $sql = "SELECT o.order_id as o_id".
                                               " FROM " . $ecs->table('ec_order_info'). " AS o, ".
                                               $ecs->table('ec_order_goods') . " AS og ".
                                               " WHERE o.order_id = og.order_id".
                                               " AND o.user_id = '" . $_SESSION['ec_user_id'] . "'".
                                               " AND og.goods_id = '" . $cmt->id . "'".
                                               " AND (o.order_status = '" . OS_CONFIRMED . "' or o.order_status = '" . OS_SPLITED . "') ".
                                               " AND (o.pay_status = '" . PS_PAYED . "' OR o.pay_status = '" . PS_PAYING . "') ".
                                               " AND (o.shipping_status = '" . SS_SHIPPED . "' OR o.shipping_status = '" . SS_RECEIVED . "') ".
                                               " LIMIT 1";
                                         $tmp = M()->getOne($sql,'o_id');
                                         if (empty($tmp))
                                         {
                                            $result['error']   = 1;
                                            $result['message'] = '评论失败。只有购买过此商品的注册用户才能评论该商品。';
                                         }
                                    }
                                    else
                                    {
                                        $result['error']   = 1;
                                        $result['message'] = '评论失败。只有购买过此商品的注册用户才能评论该商品。';
                                    }  
                            }
                        }
                        /* 无错误就保存留言 */
                        if (empty($result['error']))
                        {
                            $this -> add_comment($cmt);
                            $_SESSION['ec_send_time'] = $cur_time;
                        }
                    }
                }
            }
        }
        else
        {
            /*
             * act 参数不为空
             * 默认为评论内容列表
             * 根据 _GET 创建一个静态对象
             */
            $cmt = new stdClass();
            $cmt->id   = !empty($_GET['id'])   ? intval($_GET['id'])   : 0;
            $cmt->type = !empty($_GET['type']) ? intval($_GET['type']) : 0;
            $cmt->page = isset($_GET['page'])   && intval($_GET['page'])  > 0 ? intval($_GET['page'])  : 1;
        }
        
        if ($result['error'] == 0)
        {
            $comments = assign_comment($cmt->id, $cmt->type, $cmt->page);
            //p($comments);die;
            $this->assign('comment_type', $cmt->type);
            $this->assign('id',           $cmt->id);
            $this->assign('username',     $_SESSION['ec_user_name']);
            $this->assign('email',        $_SESSION['ec_email']);
            $this->assign('comments',     $comments['comments']);
            $this->assign('comments_pager',        $comments['pager']);
            
            /* 验证码相关设置 */
            //if ((intval($_CFG['captcha']) & CAPTCHA_COMMENT) && gd_version() > 0)
            if(true)
            {
                $this->assign('enabled_captcha', 1);
                $this->assign('rand', mt_rand());
            }
            $ec_comment_check=C('ec_comment_check');
            $result['message'] = $ec_comment_check ? "您的评论已成功发表, 请等待管理员的审核!" : 
                                                    '您的评论已成功发表, 感谢您的参与!';
            $result['content'] = $this->fetch('template/' . C('WEB_STYLE') . '/ec/common/library/comments_list.lbi');
    
        }
        echo $json->encode($result);die;    
    }
    
    /**
     * 添加评论内容
     *
     * @access  public
     * @param   object  $cmt
     * @return  void
     */
    public function add_comment($cmt)
    {
        /* 评论是否需要审核 */
        $ec_comment_check=C('ec_comment_check');
        $status = 1 - $ec_comment_check;
        
        $user_id = empty($_SESSION['ec_user_id']) ? 0 : $_SESSION['ec_user_id'];
        $email = empty($cmt->email) ? $_SESSION['email'] : trim($cmt->email);
        $user_name = empty($cmt->username) ? $_SESSION['ec_user_name'] : '';
        $email = htmlspecialchars($email);
        $user_name = htmlspecialchars($user_name);
        
        /* 保存评论内容 */
        $sql = "INSERT INTO " .$GLOBALS['ec_globals']['ecs']->table('ec_comment') .
               "(comment_type, id_value, email, user_name, content, comment_rank, add_time, ip_address, status, parent_id, user_id) VALUES " .
               "('" .$cmt->type. "', '" .$cmt->id. "', '$email', '$user_name', '" .$cmt->content."', '".$cmt->rank."', ".gmtime().", '".real_ip()."', '$status', '0', '$user_id')";
    
        $result = M()->exe($sql);
        clear_cache_files('comments_list.lbi');
        return $result;
    }
	
}
