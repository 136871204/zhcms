<?php

/**
 *  发送激活验证邮件
 *
 * @access  public
 * @param   int     $user_id        用户ID
 *
 * @return boolen
 */
function send_regiter_hash ($user_id)
{
    /* 设置验证邮件模板所需要的内容信息 */
    $template    = get_mail_template('register_validate');
    $hash = register_hash('encode', $user_id);
    $validate_email = __ROOT__ . '/index.php?a=ec&c=EcUser&m=index&act=validate_email&hash=' . $hash;
    
    $sql = "SELECT user_name, email FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_users') . " WHERE user_id = '$user_id'";
    $row = M()->getRowSql($sql);
    
    p($template);die;
}

/**
 *  生成邮件验证hash
 *
 * @access  public
 * @param
 *
 * @return void
 */
function register_hash ($operation, $key)
{
    if ($operation == 'encode')
    {
        $user_id = intval($key);
        $sql = "SELECT reg_time ".
               " FROM " . $GLOBALS['ec_globals']['ecs'] ->table('ec_users').
               " WHERE user_id = '$user_id' LIMIT 1";
        $reg_time = M()->getOne($sql,'reg_time');


        $hash = substr(md5($user_id .C('ec_hash_code'). $reg_time), 16, 4);

        return base64_encode($user_id . ',' . $hash);
    }
    else
    {
        $hash = base64_decode(trim($key));
        $row = explode(',', $hash);
        if (count($row) != 2)
        {
            return 0;
        }
        $user_id = intval($row[0]);
        $salt = trim($row[1]);
        if ($user_id <= 0 || strlen($salt) != 4)
        {
            return 0;
        }
        $sql = "SELECT reg_time ".
               " FROM " . $GLOBALS['ec_globals']['ecs'] ->table('ec_users').
               " WHERE user_id = '$user_id' LIMIT 1";
        $reg_time = M()->getOne($sql,'reg_time');
        $pre_salt = substr(md5($user_id . C('ec_hash_code') . $reg_time), 16, 4);
        if ($pre_salt == $salt)
        {
            return $user_id;
        }
        else
        {
            return 0;
        }
    }
}

/**
 * 用户注册，登录函数
 *
 * @access  public
 * @param   string       $username          注册用户名
 * @param   string       $password          用户密码
 * @param   string       $email             注册email
 * @param   array        $other             注册的其他信息
 *
 * @return  bool         $bool
 */
function register($username, $password, $email, $other = array())
{
    //echo 'register';die;
    $shop_reg_closed=C('ec_shop_reg_closed');
    /* 检查注册是否关闭 */
    if (!empty($shop_reg_closed))
    {
        $GLOBALS['ec_globals']['err']->add('该网店暂停注册');
    }
    /* 检查username */
    if (empty($username))
    {
        $GLOBALS['ec_globals']['err']->add('用户名不能为空。');
    }else
    {
        if (preg_match('/\'\/^\\s*$|^c:\\\\con\\\\con$|[%,\\*\\"\\s\\t\\<\\>\\&\'\\\\]/', $username))
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('用户名 %s 含有敏感字符', htmlspecialchars($username)));
        }
    }
    
    /* 检查email */
    if (empty($email))
    {
        $GLOBALS['ec_globals']['err']->add('email为空!');
    }
    else
    {
        if (!is_email($email))
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('%s 不是合法的email地址', htmlspecialchars($email)));
        }
    }
    
    if ($GLOBALS['ec_globals']['err']->error_no > 0)
    {
        return false;
    }
    //echo 'aaa';die;
    /* 检查是否和管理员重名 */
    if (admin_registered($username))
    {
        $GLOBALS['ec_globals']['err']->add(sprintf('用户名 %s 已经存在', $username));
        return false;
    }
    if (!$GLOBALS['ec_globals']['ec_user']->add_user($username, $password, $email))
    {

        if ($GLOBALS['ec_globals']['ec_user']->error == ERR_INVALID_USERNAME)
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('用户名 %s 含有敏感字符', $username));
        }
        elseif ($GLOBALS['ec_globals']['ec_user']->error == ERR_USERNAME_NOT_ALLOW)
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('用户名 %s 不允许注册', $username));
        }
        elseif ($GLOBALS['ec_globals']['ec_user']->error == ERR_USERNAME_EXISTS)
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('用户名 %s 已经存在', $username));
        }
        elseif ($GLOBALS['ec_globals']['ec_user']->error == ERR_INVALID_EMAIL)
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('%s 不是合法的email地址', $email));
        }
        elseif ($GLOBALS['ec_globals']['ec_user']->error == ERR_EMAIL_NOT_ALLOW)
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('Email %s 不允许注册', $email));
        }
        elseif ($GLOBALS['ec_globals']['ec_user']->error == ERR_EMAIL_EXISTS)
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('%s 已经存在', $email));
        }
        else
        {
            $GLOBALS['ec_globals']['err']->add('UNKNOWN ERROR!');
        }

        //注册失败
        return false;
    }else{
        
        /* 设置成登录状态 */
        $GLOBALS['ec_globals']['ec_user']->set_session($username);
        $GLOBALS['ec_globals']['ec_user']->set_cookie($username);
        
        /* 注册送积分 */
        //TODO：之后再管理画面增加这个管理
        $ec_register_points=10;
        if (!empty($ec_register_points))
        {
            //log_account_change($_SESSION['ec_user_id'], 0, 0, $ec_register_points, $ec_register_points, $ec_register_points);
        }
        
        /*推荐处理*/
        //TODO：之后做
        //$affiliate  = unserialize($GLOBALS['_CFG']['affiliate']);
        
        //定义other合法的变量数组
        $other_key_array = array('msn', 'qq', 'office_phone', 'home_phone', 'mobile_phone');
        $update_data['reg_time'] = local_strtotime(local_date('Y-m-d H:i:s'));
        if ($other)
        {
            foreach ($other as $key=>$val)
            {
                //删除非法key值
                if (!in_array($key, $other_key_array))
                {
                    unset($other[$key]);
                }
                else
                {
                    $other[$key] =  htmlspecialchars(trim($val)); //防止用户输入javascript代码
                }
            }
            $update_data = array_merge($update_data, $other);
        }
        M()->autoExecute($GLOBALS['ec_globals']['ecs']->table('ec_users'), $update_data, 'UPDATE', 'user_id = ' . $_SESSION['ec_user_id']);
        update_user_info();      // 更新用户信息
        recalculate_price();     // 重新计算购物车中的商品价格
        
        return true;
    }
}

/**
 * 判断超级管理员用户名是否存在
 * @param   string      $adminname 超级管理员用户名
 * @return  boolean
 */
function admin_registered( $adminname )
{
    $db_prefix=C("DB_PREFIX");
    $res = M()->getOne("SELECT COUNT(*) FROM " . $db_prefix.'user' .
                                  " WHERE username = '$adminname'",'COUNT(*)');
    return $res;
}