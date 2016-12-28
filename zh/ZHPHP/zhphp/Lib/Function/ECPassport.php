<?php

/**
 *  ���ͼ�����֤�ʼ�
 *
 * @access  public
 * @param   int     $user_id        �û�ID
 *
 * @return boolen
 */
function send_regiter_hash ($user_id)
{
    /* ������֤�ʼ�ģ������Ҫ��������Ϣ */
    $template    = get_mail_template('register_validate');
    $hash = register_hash('encode', $user_id);
    $validate_email = __ROOT__ . '/index.php?a=ec&c=EcUser&m=index&act=validate_email&hash=' . $hash;
    
    $sql = "SELECT user_name, email FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_users') . " WHERE user_id = '$user_id'";
    $row = M()->getRowSql($sql);
    
    p($template);die;
}

/**
 *  �����ʼ���֤hash
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
 * �û�ע�ᣬ��¼����
 *
 * @access  public
 * @param   string       $username          ע���û���
 * @param   string       $password          �û�����
 * @param   string       $email             ע��email
 * @param   array        $other             ע���������Ϣ
 *
 * @return  bool         $bool
 */
function register($username, $password, $email, $other = array())
{
    //echo 'register';die;
    $shop_reg_closed=C('ec_shop_reg_closed');
    /* ���ע���Ƿ�ر� */
    if (!empty($shop_reg_closed))
    {
        $GLOBALS['ec_globals']['err']->add('��������ͣע��');
    }
    /* ���username */
    if (empty($username))
    {
        $GLOBALS['ec_globals']['err']->add('�û�������Ϊ�ա�');
    }else
    {
        if (preg_match('/\'\/^\\s*$|^c:\\\\con\\\\con$|[%,\\*\\"\\s\\t\\<\\>\\&\'\\\\]/', $username))
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('�û��� %s ���������ַ�', htmlspecialchars($username)));
        }
    }
    
    /* ���email */
    if (empty($email))
    {
        $GLOBALS['ec_globals']['err']->add('emailΪ��!');
    }
    else
    {
        if (!is_email($email))
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('%s ���ǺϷ���email��ַ', htmlspecialchars($email)));
        }
    }
    
    if ($GLOBALS['ec_globals']['err']->error_no > 0)
    {
        return false;
    }
    //echo 'aaa';die;
    /* ����Ƿ�͹���Ա���� */
    if (admin_registered($username))
    {
        $GLOBALS['ec_globals']['err']->add(sprintf('�û��� %s �Ѿ�����', $username));
        return false;
    }
    if (!$GLOBALS['ec_globals']['ec_user']->add_user($username, $password, $email))
    {

        if ($GLOBALS['ec_globals']['ec_user']->error == ERR_INVALID_USERNAME)
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('�û��� %s ���������ַ�', $username));
        }
        elseif ($GLOBALS['ec_globals']['ec_user']->error == ERR_USERNAME_NOT_ALLOW)
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('�û��� %s ������ע��', $username));
        }
        elseif ($GLOBALS['ec_globals']['ec_user']->error == ERR_USERNAME_EXISTS)
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('�û��� %s �Ѿ�����', $username));
        }
        elseif ($GLOBALS['ec_globals']['ec_user']->error == ERR_INVALID_EMAIL)
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('%s ���ǺϷ���email��ַ', $email));
        }
        elseif ($GLOBALS['ec_globals']['ec_user']->error == ERR_EMAIL_NOT_ALLOW)
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('Email %s ������ע��', $email));
        }
        elseif ($GLOBALS['ec_globals']['ec_user']->error == ERR_EMAIL_EXISTS)
        {
            $GLOBALS['ec_globals']['err']->add(sprintf('%s �Ѿ�����', $email));
        }
        else
        {
            $GLOBALS['ec_globals']['err']->add('UNKNOWN ERROR!');
        }

        //ע��ʧ��
        return false;
    }else{
        
        /* ���óɵ�¼״̬ */
        $GLOBALS['ec_globals']['ec_user']->set_session($username);
        $GLOBALS['ec_globals']['ec_user']->set_cookie($username);
        
        /* ע���ͻ��� */
        //TODO��֮���ٹ����������������
        $ec_register_points=10;
        if (!empty($ec_register_points))
        {
            //log_account_change($_SESSION['ec_user_id'], 0, 0, $ec_register_points, $ec_register_points, $ec_register_points);
        }
        
        /*�Ƽ�����*/
        //TODO��֮����
        //$affiliate  = unserialize($GLOBALS['_CFG']['affiliate']);
        
        //����other�Ϸ��ı�������
        $other_key_array = array('msn', 'qq', 'office_phone', 'home_phone', 'mobile_phone');
        $update_data['reg_time'] = local_strtotime(local_date('Y-m-d H:i:s'));
        if ($other)
        {
            foreach ($other as $key=>$val)
            {
                //ɾ���Ƿ�keyֵ
                if (!in_array($key, $other_key_array))
                {
                    unset($other[$key]);
                }
                else
                {
                    $other[$key] =  htmlspecialchars(trim($val)); //��ֹ�û�����javascript����
                }
            }
            $update_data = array_merge($update_data, $other);
        }
        M()->autoExecute($GLOBALS['ec_globals']['ecs']->table('ec_users'), $update_data, 'UPDATE', 'user_id = ' . $_SESSION['ec_user_id']);
        update_user_info();      // �����û���Ϣ
        recalculate_price();     // ���¼��㹺�ﳵ�е���Ʒ�۸�
        
        return true;
    }
}

/**
 * �жϳ�������Ա�û����Ƿ����
 * @param   string      $adminname ��������Ա�û���
 * @return  boolean
 */
function admin_registered( $adminname )
{
    $db_prefix=C("DB_PREFIX");
    $res = M()->getOne("SELECT COUNT(*) FROM " . $db_prefix.'user' .
                                  " WHERE username = '$adminname'",'COUNT(*)');
    return $res;
}