<?php


//.-----------------------------------------------------------------------------------
// |  Software: [ZHPHP framework]
// |   Version: 2014.06
// |-----------------------------------------------------------------------------------
// |    Author: 周鸿 <136871204@qq.com>
// | Copyright (c) 2014, 周鸿 <136871204@qq.com>.All Rights Reserved.
// |-----------------------------------------------------------------------------------



class ZHSession
{
    var $db             = NULL;
    var $session_table  = '';

    var $max_life_time  = 1800; // SESSION 杩囨湡鏃堕棿

    var $session_name   = '';
    var $session_id     = '';

    var $session_expiry = '';
    var $session_md5    = '';

    var $session_cookie_path   = '/';
    var $session_cookie_domain = '';
    var $session_cookie_secure = false;

    var $_ip   = '';
    var $_time = 0;

    /*function __construct(&$db, $session_table, $session_data_table, $session_name = 'ECS_ID', $session_id = '')
    {
        $this->cls_session($db, $session_table, $session_data_table, $session_name, $session_id);
    }*/

    function ZHSession(&$db, $session_table, $session_data_table, $session_name = 'ZHEC_ID', $session_id = '')
    {
        //p($_SESSION);
        $GLOBALS['_SESSION'] = $this->get_admin_session();
        //p($_SESSION);die;
        if (!empty($GLOBALS['ec_globals']['cookie_path']))
        {
            $this->session_cookie_path = $GLOBALS['ec_globals']['cookie_path'];
        }
        else
        {
            $this->session_cookie_path = '/';
        }

        if (!empty($GLOBALS['ec_globals']['cookie_domain']))
        {
            $this->session_cookie_domain = $GLOBALS['ec_globals']['cookie_domain'];
        }
        else
        {
            $this->session_cookie_domain = '';
        }

        if (!empty($GLOBALS['ec_globals']['cookie_secure']))
        {
            $this->session_cookie_secure = $GLOBALS['ec_globals']['cookie_secure'];
        }
        else
        {
            $this->session_cookie_secure = false;
        }
        
        $this->session_name       = $session_name;
        $this->session_table      = $session_table;
        $this->session_data_table = $session_data_table;

        $this->db  = &$db;
        $this->_ip = real_ip();
        
        if ($session_id == '' && !empty($_COOKIE[$this->session_name]))
        {
            $this->session_id = $_COOKIE[$this->session_name];
        }
        else
        {
            $this->session_id = $session_id;
        }
        
        if ($this->session_id)
        {
            $tmp_session_id = substr($this->session_id, 0, 32);
            if ($this->gen_session_key($tmp_session_id) == substr($this->session_id, 32))
            {
                $this->session_id = $tmp_session_id;
            }
            else
            {
                $this->session_id = '';
            }
        }

        $this->_time = time();
        //p($this->session_id);die;
        if ($this->session_id)
        {
            $this->load_session();
        }
        else
        {
            $this->gen_session_id();
            //echo 'aaa';die;
            setcookie($this->session_name, $this->session_id . $this->gen_session_key($this->session_id), 0, $this->session_cookie_path, $this->session_cookie_domain, $this->session_cookie_secure);
        }
        //$this->db->autoReplace($this->session_data_table, array('sesskey' => $this->session_id, 'expiry' => $this->_time, 'data' => 'aaa'), array('expiry' => $this->_time,'data' => 'aaa'));
        register_shutdown_function(array(&$this, 'close_session'));
    }

    function gen_session_id()
    {
        $this->session_id = md5(uniqid(mt_rand(), true));

        return $this->insert_session();
    }

    function get_admin_session()
    {
        $t_seesion=array(
                    'uid'=>$_SESSION['uid'],
                    'nickname'=>$_SESSION['nickname'],
                    'username'=>$_SESSION['username'],
                    'email'=>$_SESSION['email'],
                    'validatecode'=>$_SESSION['validatecode'],
                    'regtime'=>$_SESSION['regtime'],
                    'logintime'=>$_SESSION['logintime'],
                    'regip'=>$_SESSION['regip'],
                    'lastip'=>$_SESSION['lastip'],
                    'user_state'=>$_SESSION['user_state'],
                    'lock_end_time'=>$_SESSION['lock_end_time'],
                    'qq'=>$_SESSION['qq'],
                    'sex'=>$_SESSION['sex'],
                    'favicon'=>$_SESSION['favicon'],
                    'credits'=>$_SESSION['credits'],
                    'rid'=>$_SESSION['rid'],
                    'allow_user_set_credits'=>$_SESSION['allow_user_set_credits'],
                    'signature'=>$_SESSION['signature'],
                    'domain'=>$_SESSION['domain'],
                    'spec_num'=>$_SESSION['spec_num'],
                    'icon'=>$_SESSION['icon'],
                    'language'=>$_SESSION['language']
                );
        return $t_seesion;
    }

    function gen_session_key($session_id)
    {
        static $ip = '';

        if ($ip == '')
        {
            $ip = substr($this->_ip, 0, strrpos($this->_ip, '.'));
        }

        return sprintf('%08x', crc32(ROOT_PATH . $ip . $session_id));
    }

    function insert_session()
    {
        return $this->db->exe('INSERT INTO ' . $this->session_table . " (sesskey, expiry, ip, data) VALUES ('" . $this->session_id . "', '". $this->_time ."', '". $this->_ip ."', 'a:0:{}')");
    }

    function load_session()
    {
        
        $session = $this->db->getRowSql('SELECT userid, adminid, user_name, user_rank, discount, email, data, expiry FROM ' . $this->session_table . " WHERE sesskey = '" . $this->session_id . "'");
        
        //p($session);die;
        if (empty($session))
        {
            $this->insert_session();

            $this->session_expiry = 0;
            $this->session_md5    = '40cd750bba9870f18aada2478b24840a';
            $GLOBALS['_SESSION']  = $this->get_admin_session();;
        }
        else
        {
            //p($_SESSION);
            if (!empty($session['data']) && $this->_time - $session['expiry'] <= $this->max_life_time)
            {
                //echo 'aaa';
                //p($_SESSION);die;
                $this->session_expiry = $session['expiry'];
                $this->session_md5    = md5($session['data']);
                $t_data=unserialize($session['data']);
                $t_data=array_merge($t_data,$this->get_admin_session());
                //p($t_data);die;
                $GLOBALS['_SESSION']  = $t_data;
                $GLOBALS['_SESSION']['ec_user_id'] = $session['userid'];
                $GLOBALS['_SESSION']['ec_admin_id'] = $session['adminid'];
                $GLOBALS['_SESSION']['ec_user_name'] = $session['user_name'];
                $GLOBALS['_SESSION']['ec_user_rank'] = $session['user_rank'];
                $GLOBALS['_SESSION']['ec_discount'] = $session['discount'];
                $GLOBALS['_SESSION']['ec_email'] = $session['email'];
                //p($GLOBALS['_SESSION']);die;
                //p($_SESSION);die;
            }
            else
            {
                //p($_SESSION);die;
                $session_data = $this->db->getRowSql('SELECT data, expiry FROM ' . $this->session_data_table . " WHERE sesskey = '" . $this->session_id . "'");
                if (!empty($session_data['data']) && $this->_time - $session_data['expiry'] <= $this->max_life_time)
                {
                    $this->session_expiry = $session_data['expiry'];
                    $this->session_md5    = md5($session_data['data']);
                    $t_data=unserialize($session_data['data']);
                    $t_data=array_merge($t_data,$this->get_admin_session());
                    //p($t_data);die;
                    $GLOBALS['_SESSION']  = $t_data;
                    $GLOBALS['_SESSION']['ec_user_id'] = $session['userid'];
                    $GLOBALS['_SESSION']['ec_admin_id'] = $session['adminid'];
                    $GLOBALS['_SESSION']['ec_user_name'] = $session['user_name'];
                    $GLOBALS['_SESSION']['ec_user_rank'] = $session['user_rank'];
                    $GLOBALS['_SESSION']['ec_discount'] = $session['discount'];
                    $GLOBALS['_SESSION']['ec_email'] = $session['email'];
                    //P($GLOBALS);die;
                }
                else
                {
                    $this->session_expiry = 0;
                    $this->session_md5    = '40cd750bba9870f18aada2478b24840a';
                    $GLOBALS['_SESSION']  = $this->get_admin_session();;
                }
            }
        }
    }

    function update_session()
    {
        $adminid = !empty($GLOBALS['_SESSION']['ec_admin_id']) ? intval($GLOBALS['_SESSION']['ec_admin_id']) : 0;
        $userid  = !empty($GLOBALS['_SESSION']['ec_user_id'])  ? intval($GLOBALS['_SESSION']['ec_user_id'])  : 0;
        $user_name  = !empty($GLOBALS['_SESSION']['ec_user_name'])  ? trim($GLOBALS['_SESSION']['ec_user_name'])  : 0;
        $user_rank  = !empty($GLOBALS['_SESSION']['ec_user_rank'])  ? intval($GLOBALS['_SESSION']['ec_user_rank'])  : 0;
        $discount  = !empty($GLOBALS['_SESSION']['ec_discount'])  ? round($GLOBALS['_SESSION']['ec_discount'], 2)  : 0;
        $email  = !empty($GLOBALS['_SESSION']['ec_email'])  ? trim($GLOBALS['_SESSION']['ec_email'])  : 0;
        unset($GLOBALS['_SESSION']['ec_admin_id']);
        unset($GLOBALS['_SESSION']['ec_user_id']);
        unset($GLOBALS['_SESSION']['ec_user_name']);
        unset($GLOBALS['_SESSION']['ec_user_rank']);
        unset($GLOBALS['_SESSION']['ec_discount']);
        unset($GLOBALS['_SESSION']['ec_email']);
        
        $data        = serialize($GLOBALS['_SESSION']);
        
        $this->_time = time();

        if ($this->session_md5 == md5($data) && $this->_time < $this->session_expiry + 10)
        {
            return true;
        }

        $data = addslashes($data);

        if (isset($data{255}))
        {
            $this->db->autoReplace($this->session_data_table, array('sesskey' => $this->session_id, 'expiry' => $this->_time, 'data' => $data), array('expiry' => $this->_time,'data' => $data));

            $data = '';
        }

        return $this->db->exe('UPDATE ' . $this->session_table . " SET expiry = '" . $this->_time . "', ip = '" . $this->_ip . "', userid = '" . $userid . "', adminid = '" . $adminid . "', user_name='" . $user_name . "', user_rank='" . $user_rank . "', discount='" . $discount . "', email='" . $email . "', data = '$data' WHERE sesskey = '" . $this->session_id . "' LIMIT 1");
    }

    function close_session()
    {
        $this->update_session();

        /* 闅忔満瀵 sessions_data 鐨勫簱杩涜?鍒犻櫎鎿嶄綔 */
        if (mt_rand(0, 2) == 2)
        {
            $this->db->exe('DELETE FROM ' . $this->session_data_table . ' WHERE expiry < ' . ($this->_time - $this->max_life_time));
        }

        if ((time() % 2) == 0)
        {
            return $this->db->exe('DELETE FROM ' . $this->session_table . ' WHERE expiry < ' . ($this->_time - $this->max_life_time));
        }

        return true;
    }

    function delete_spec_admin_session($adminid)
    {
        if (!empty($GLOBALS['_SESSION']['ec_admin_id']) && $adminid)
        {
            return $this->db->query('DELETE FROM ' . $this->session_table . " WHERE adminid = '$adminid'");
        }
        else
        {
            return false;
        }
    }

    function destroy_session()
    {
        $GLOBALS['_SESSION'] = array();
        $_SESSION=array();
        setcookie($this->session_name, $this->session_id, 1, $this->session_cookie_path, $this->session_cookie_domain, $this->session_cookie_secure);

        /* ECSHOP 鑷?畾涔夋墽琛岄儴鍒 */
        if (!empty($GLOBALS['ec_globals']['ecs']))
        {
            $this->db->exe('DELETE FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_cart') . " WHERE session_id = '$this->session_id'");
        }
        /* ECSHOP 鑷?畾涔夋墽琛岄儴鍒 */

        $this->db->exe('DELETE FROM ' . $this->session_data_table . " WHERE sesskey = '" . $this->session_id . "' LIMIT 1");

        return $this->db->exe('DELETE FROM ' . $this->session_table . " WHERE sesskey = '" . $this->session_id . "' LIMIT 1");
    }

    function get_session_id()
    {
        return $this->session_id;
    }

    function get_users_count()
    {
        return $this->db->getOne('SELECT count(*) FROM ' . $this->session_table);
    }
}

?>