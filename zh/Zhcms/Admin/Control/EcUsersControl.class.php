<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcUsersControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
        $_LANG['sex'][0] = '秘密';
        $_LANG['sex'][1] = '男';
        $_LANG['sex'][2] = '女';
        $this->assign('lang',   $_LANG);
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    //$image = new EcImage(C('ec_bgcolor'));
        /*$tdb=M();
        $exc = new exchange($ecs->table("ec_vote"), $tdb, 'vote_id', 'vote_name');
        $exc_opn = new exchange($ecs->table("ec_vote_option"), $tdb, 'option_id', 'option_name');*/
        


        //p($_REQUEST);die;
        if ($_REQUEST['act'] == 'list'){
            $sql = "SELECT rank_id, rank_name, min_points FROM ".$ecs->table('ec_user_rank')." ORDER BY min_points ASC ";
            
            $rs = M()->query($sql);

            $ranks = array();
            if(!empty($rs))
            {
                foreach($rs as $row)
                {
                    $ranks[$row['rank_id']] = $row['rank_name'];
                }
            }
            
            $this->assign('user_ranks',   $ranks);
            $this->assign('ur_here',      '会員リスト');
            $this->assign('action_link',  array('text' => '会員新規', 'href'=>U('index').'&act=add'));
    
            $user_list = $this -> user_list();
    
            $this->assign('user_list',    $user_list['user_list']);
            $this->assign('filter',       $user_list['filter']);
            $this->assign('record_count', $user_list['record_count']);
            $this->assign('page_count',   $user_list['page_count']);
            $this->assign('full_page',    1);
            $this->assign('sort_user_id', '<img src="'.__PUBLIC__.'/ec/images/sort_desc.gif">');

            $this->display('users_list.htm');

    
        }
        /*------------------------------------------------------ */
        //-- ajax返回用户列表
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query')
        {
            $user_list = $this -> user_list();
        
            $this->assign('user_list',    $user_list['user_list']);
            $this->assign('filter',       $user_list['filter']);
            $this->assign('record_count', $user_list['record_count']);
            $this->assign('page_count',   $user_list['page_count']);
        
            $sort_flag  = sort_flag($user_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('users_list.htm'), '', array('filter' => $user_list['filter'], 'page_count' => $user_list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 会員新規帐号
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'add')
        {
        
            $user = array(  'rank_points'   => C('ec_register_points'),
                            'pay_points'    => C('ec_register_points'),
                            'sex'           => 0,
                            'credit_line'   => 0
                            );
            /* 取出注册扩展字段 */
            $sql = 'SELECT * FROM ' . $ecs->table('ec_reg_fields') . ' WHERE type < 2 AND display = 1 AND id != 6 ORDER BY dis_order, id';
            $extend_info_list = M()->getAll($sql);
            $this->assign('extend_info_list', $extend_info_list);
        
            $this->assign('ur_here',          '会員新規');
            $this->assign('action_link',      array('text' => '会員リスト', 'href'=>U('index').'&act=list'));
            $this->assign('form_action',      'insert');
            $this->assign('user',             $user);
            $this->assign('special_ranks',    get_rank_list(true));
        
            //assign_query_info();
            $this->display('user_info.htm');
        }
        /*------------------------------------------------------ */
        //-- 会員新規帐号
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'insert')
        {
            $username = empty($_POST['username']) ? '' : trim($_POST['username']);
            $password = empty($_POST['password']) ? '' : trim($_POST['password']);
            $email = empty($_POST['email']) ? '' : trim($_POST['email']);
            $sex = empty($_POST['sex']) ? 0 : intval($_POST['sex']);
            $sex = in_array($sex, array(0, 1, 2)) ? $sex : 0;
            $birthday = $_POST['birthdayYear'] . '-' .  $_POST['birthdayMonth'] . '-' . $_POST['birthdayDay'];
            $rank = empty($_POST['user_rank']) ? 0 : intval($_POST['user_rank']);
            $credit_line = empty($_POST['credit_line']) ? 0 : floatval($_POST['credit_line']);

            
            $users =& init_users();
            
            if (!$users->add_user($username, $password, $email)){
                if ($users->error == ERR_INVALID_USERNAME)
                {
                    $msg = '無効なユーザ名称';
                }
                elseif ($users->error == ERR_USERNAME_NOT_ALLOW)
                {
                    $msg = 'ユーザ名登録できません';
                }
                elseif ($users->error == ERR_USERNAME_EXISTS)
                {
                    $msg = '同じユーザ名が存在している。';
                }
                elseif ($users->error == ERR_INVALID_EMAIL)
                {
                    $msg = '無効なメールアドレス';
                }
                elseif ($users->error == ERR_EMAIL_NOT_ALLOW)
                {
                    $msg = 'メールできません';
                }
                elseif ($users->error == ERR_EMAIL_EXISTS)
                {
                    $msg = 'メールアドレスすでに存在。';
                }
                else
                {
                    //die('Error:'.$users->error_msg());
                }
                $this->sys_msg($msg, 1);
            }
            
            $ec_register_points=C('ec_register_points');
            /* 注册送积分 */
            if (!empty($ec_register_points))
            {
                log_account_change($users['user_id'], 0, 0, $ec_register_points, $ec_register_points, '登録ポイント送る');
            }
            /*把新注册用户的扩展信息插入数据库*/
            $sql = 'SELECT id FROM ' . $ecs->table('ec_reg_fields') . ' WHERE type = 0 AND display = 1 ORDER BY dis_order, id';   //读出所有扩展字段的id
            $fields_arr = M()->getAll($sql);
            
            $extend_field_str = '';    //生成扩展字段的内容字符串
            $user_id_arr = $users->get_profile_by_name($username);
            foreach ($fields_arr AS $val)
            {
                $extend_field_index = 'extend_field' . $val['id'];
                if(!empty($_POST[$extend_field_index]))
                {
                    $temp_field_content = strlen($_POST[$extend_field_index]) > 100 ? mb_substr($_POST[$extend_field_index], 0, 99) : $_POST[$extend_field_index];
                    $extend_field_str .= " ('" . $user_id_arr['user_id'] . "', '" . $val['id'] . "', '" . $temp_field_content . "'),";
                }
            }
            $extend_field_str = substr($extend_field_str, 0, -1);
            if ($extend_field_str)      //插入注册扩展数据
            {
                $sql = 'INSERT INTO '. $ecs->table('ec_reg_extend_info') . ' (`user_id`, `reg_field_id`, `content`) VALUES' . $extend_field_str;
                M()->exe($sql);
            }
            /* 更新会员的其它信息 */
            $other =  array();
            $other['credit_line'] = $credit_line;
            $other['user_rank']  = $rank;
            $other['sex']        = $sex;
            $other['birthday']   = $birthday;
            $other['reg_time'] = local_strtotime(local_date('Y-m-d H:i:s'));
            
            $other['msn'] = isset($_POST['extend_field1']) ? htmlspecialchars(trim($_POST['extend_field1'])) : '';
            $other['qq'] = isset($_POST['extend_field2']) ? htmlspecialchars(trim($_POST['extend_field2'])) : '';
            $other['office_phone'] = isset($_POST['extend_field3']) ? htmlspecialchars(trim($_POST['extend_field3'])) : '';
            $other['home_phone'] = isset($_POST['extend_field4']) ? htmlspecialchars(trim($_POST['extend_field4'])) : '';
            $other['mobile_phone'] = isset($_POST['extend_field5']) ? htmlspecialchars(trim($_POST['extend_field5'])) : '';
            
            M()->autoExecute($ecs->table('ec_users'), $other, 'UPDATE', "user_name = '$username'");
            
            /* 记录管理员操作 */
            admin_log($_POST['username'], '新規', 'ユーザ');
    
            /* 提示信息 */
            $link[] = array('text' => 'リストに戻る', 'href'=>U('index',array('act'=>'list')));
            $this->sys_msg(sprintf('会員%s新規成功', htmlspecialchars(stripslashes($_POST['username']))), 0, $link);
            //p($other);die;
        }
        /*------------------------------------------------------ */
        //-- 编辑用户帐号
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'edit')
        {
            $sql = "SELECT u.user_name, u.sex, u.birthday, u.pay_points, u.rank_points, u.user_rank , u.user_money, u.frozen_money, u.credit_line, 
                            u.parent_id, u2.user_name as parent_username, u.qq, u.msn, u.office_phone, u.home_phone, u.mobile_phone".
                    " FROM " .$ecs->table('ec_users'). " u LEFT JOIN " . $ecs->table('ec_users') . " u2 ON u.parent_id = u2.user_id WHERE u.user_id='$_GET[id]'";
            $row = M()->GetRowSql($sql);
            $row['user_name'] = addslashes($row['user_name']);
            $users  =& init_users();
            $user   = $users->get_user_info($row['user_name']);
            
            $sql = "SELECT u.user_id, u.sex, u.birthday, u.pay_points, u.rank_points, u.user_rank , u.user_money, u.frozen_money, u.credit_line, 
                            u.parent_id, u2.user_name as parent_username, u.qq, u.msn,
                            u.office_phone, u.home_phone, u.mobile_phone".
                    " FROM " .$ecs->table('ec_users'). " u LEFT JOIN " . $ecs->table('ec_users') . " u2 ON u.parent_id = u2.user_id WHERE u.user_id='$_GET[id]'";
            
            $row = M()->GetRowSql($sql);
            if ($row)
            {
                $user['user_id']        = $row['user_id'];
                $user['sex']            = $row['sex'];
                $user['birthday']       = date($row['birthday']);
                $user['pay_points']     = $row['pay_points'];
                $user['rank_points']    = $row['rank_points'];
                $user['user_rank']      = $row['user_rank'];
                $user['user_money']     = $row['user_money'];
                $user['frozen_money']   = $row['frozen_money'];
                $user['credit_line']    = $row['credit_line'];
                $user['formated_user_money'] = price_format($row['user_money']);
                $user['formated_frozen_money'] = price_format($row['frozen_money']);
                $user['parent_id']      = $row['parent_id'];
                $user['parent_username']= $row['parent_username'];
                $user['qq']             = $row['qq'];
                $user['msn']            = $row['msn'];
                $user['office_phone']   = $row['office_phone'];
                $user['home_phone']     = $row['home_phone'];
                $user['mobile_phone']   = $row['mobile_phone'];
            }
            else
            {
                $link[] = array('text' => 'リストに戻る', 'href'=>U('index',array('act'=>'list')));
                $this -> sys_msg('無効なユーザ名称', 0, $links);
            }
            /* 取出注册扩展字段 */
            $sql = 'SELECT * FROM ' . $ecs->table('ec_reg_fields') . ' WHERE type < 2 AND display = 1 AND id != 6 ORDER BY dis_order, id';
            $extend_info_list = M()->getAll($sql);
    
            $sql = 'SELECT reg_field_id, content ' .
                   'FROM ' . $ecs->table('ec_reg_extend_info') .
                   " WHERE user_id = $user[user_id]";
            $extend_info_arr = M()->getAll($sql);
            
            $temp_arr = array();
            foreach ($extend_info_arr AS $val)
            {
                $temp_arr[$val['reg_field_id']] = $val['content'];
            }
            
            foreach ($extend_info_list AS $key => $val)
            {
                switch ($val['id'])
                {
                    case 1:     $extend_info_list[$key]['content'] = $user['msn']; break;
                    case 2:     $extend_info_list[$key]['content'] = $user['qq']; break;
                    case 3:     $extend_info_list[$key]['content'] = $user['office_phone']; break;
                    case 4:     $extend_info_list[$key]['content'] = $user['home_phone']; break;
                    case 5:     $extend_info_list[$key]['content'] = $user['mobile_phone']; break;
                    default:    $extend_info_list[$key]['content'] = empty($temp_arr[$val['id']]) ? '' : $temp_arr[$val['id']] ;
                }
            }
            
            $this->assign('extend_info_list', $extend_info_list);
            
            /* 当前会员推荐信息 */
            $ec_affiliate=C('ec_affiliate');
            $affiliate = unserialize($ec_affiliate);
            $this->assign('affiliate', $affiliate);
            
            empty($affiliate) && $affiliate = array();
            
            if(empty($affiliate['config']['separate_by']))
            {
                //推荐注册分成
                $affdb = array();
                $num = count($affiliate['item']);
                $up_uid = "'$_GET[id]'";
                for ($i = 1 ; $i <=$num ;$i++)
                {
                    echo __FILE__.'edit1';die;
                }
                if ($affdb[1]['num'] > 0)
                {
                    echo __FILE__.'edit2';die;
                }
            }
            $this->assign('ur_here',          '会員情報変更');
            $this->assign('action_link',      array('text' => '会員リスト', 'href'=>U('index').'&act=list&' . list_link_postfix()));
            $this->assign('user',             $user);
            $this->assign('form_action',      'update');
            $this->assign('special_ranks',    get_rank_list(true));
            $this->display('user_info.htm');

        
        }
        /*------------------------------------------------------ */
        //-- 更新用户帐号
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'update')
        {
            $username = empty($_POST['username']) ? '' : trim($_POST['username']);
            $password = empty($_POST['password']) ? '' : trim($_POST['password']);
            $email = empty($_POST['email']) ? '' : trim($_POST['email']);
            $sex = empty($_POST['sex']) ? 0 : intval($_POST['sex']);
            $sex = in_array($sex, array(0, 1, 2)) ? $sex : 0;
            $birthday = $_POST['birthdayYear'] . '-' .  $_POST['birthdayMonth'] . '-' . $_POST['birthdayDay'];
            $rank = empty($_POST['user_rank']) ? 0 : intval($_POST['user_rank']);
            $credit_line = empty($_POST['credit_line']) ? 0 : floatval($_POST['credit_line']);
            
            $users  =& init_users();
            
            if (!$users->edit_user(array('username'=>$username, 'password'=>$password, 'email'=>$email, 'gender'=>$sex, 'bday'=>$birthday ), 1))
            {
                if ($users->error == ERR_EMAIL_EXISTS)
                {
                    $msg = 'メールアドレスがすでに存在。';
                }
                else
                {
                    $msg = '会員情報変更失敗。';
                }
                $this -> sys_msg($msg, 1);
            }
            if(!empty($password))
            {
        			$sql="UPDATE ".$ecs->table('ec_users'). "SET `ec_salt`='0' WHERE user_name= '".$username."'";
        			M()->exe($sql);
        	}
            /* 更新用户扩展字段的数据 */
            $sql = 'SELECT id FROM ' . $ecs->table('ec_reg_fields') . ' WHERE type = 0 AND display = 1 ORDER BY dis_order, id';   //读出所有扩展字段的id
            $fields_arr = M()->getAll($sql);
            $user_id_arr = $users->get_profile_by_name($username);
            $user_id = $user_id_arr['user_id'];

            foreach ($fields_arr AS $val)       //循环更新扩展用户信息
            {
                $extend_field_index = 'extend_field' . $val['id'];
                if(isset($_POST[$extend_field_index]))
                {
                    
                    $temp_field_content = strlen($_POST[$extend_field_index]) > 100 ? mb_substr($_POST[$extend_field_index], 0, 99) : $_POST[$extend_field_index];
                    
                    $sql = 'SELECT * FROM ' . $ecs->table('ec_reg_extend_info') . "  WHERE reg_field_id = '$val[id]' AND user_id = '$user_id'";
                    //p(M()->query($sql));die;
                    $temp_data=M()->query($sql);
                    if ($temp_data)      //如果之前没有记录，则插入
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
            
            /* 更新会员的其它信息 */
            $other =  array();
            $other['credit_line'] = $credit_line;
            $other['user_rank'] = $rank;
        
            $other['msn'] = isset($_POST['extend_field1']) ? htmlspecialchars(trim($_POST['extend_field1'])) : '';
            $other['qq'] = isset($_POST['extend_field2']) ? htmlspecialchars(trim($_POST['extend_field2'])) : '';
            $other['office_phone'] = isset($_POST['extend_field3']) ? htmlspecialchars(trim($_POST['extend_field3'])) : '';
            $other['home_phone'] = isset($_POST['extend_field4']) ? htmlspecialchars(trim($_POST['extend_field4'])) : '';
            $other['mobile_phone'] = isset($_POST['extend_field5']) ? htmlspecialchars(trim($_POST['extend_field5'])) : '';
        
            M()->autoExecute($ecs->table('ec_users'), $other, 'UPDATE', "user_name = '$username'");
        
            /* 记录管理员操作 */
            admin_log($username, '変更', '会員');
    
            /* 提示信息 */
            $links[0]['text']    = '会員リストに戻る';
            $links[0]['href']    = U('index').'&act=list&' . list_link_postfix();
            $links[1]['text']    = '返回上一页';
            $links[1]['href']    = 'javascript:history.back()';
        
            $this -> sys_msg('会員情報変更成功。', 0, $links);
            
        }
        /*------------------------------------------------------ */
        //-- 批量删除会员帐号
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'batch_remove')
        {
            if (isset($_POST['checkboxes']))
            {
                $sql = "SELECT user_name FROM " . $ecs->table('ec_users') . " WHERE user_id " . db_create_in($_POST['checkboxes']);
                $col = M()->getColSql($sql);
                $usernames = implode(',',addslashes_deep($col));
                $count = count($col);
                /* 通过插件来删除用户 */
                $users =& init_users();
                $users->remove_user($col);
                
                admin_log($usernames, 'バッチ削除', '会員');
                $lnk[] = array('text' => '会員リストに戻る', 'href'=>U('index').'&act=list');
                $this -> sys_msg(sprintf('%d 個の会員を削除成功しました。', $count), 0, $lnk);
            }
            else
            {
                $lnk[] = array('text' => '会員リストに戻る', 'href'=>U('index').'&act=list');
                $this -> sys_msg('削除したい会員なし！', 0, $lnk);
            }
        }
        /*------------------------------------------------------ */
        //-- 编辑email
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_email')
        {
            $id = empty($_REQUEST['id']) ? 0 : intval($_REQUEST['id']);
            $email = empty($_REQUEST['val']) ? '' : json_str_iconv(trim($_REQUEST['val']));
        
            $users =& init_users();
        
            $sql = "SELECT user_name FROM " . $ecs->table('ec_users') . " WHERE user_id = '$id'";
            $username = M()->getOne($sql,'user_name');
            
            if (is_email($email))
            {
                if ($users->edit_user(array('username'=>$username, 'email'=>$email)))
                {
                    admin_log(addslashes($username), '変更', '会員');
        
                    make_json_result(stripcslashes($email));
                }
                else
                {
                    $msg = ($users->error == ERR_EMAIL_EXISTS) ? 'メールアドレスすでに存在。' : '会員情報変更失敗。';
                    make_json_error($msg);
                }
            }
            else
            {
                make_json_error('無効なメール入力しました。');
            }
        }
        /*------------------------------------------------------ */
        //-- 删除会员帐号
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'remove')
        {
            $sql = "SELECT user_name FROM " . $ecs->table('ec_users') . " WHERE user_id = '" . $_GET['id'] . "'";
            $username = M()->getOne($sql,'user_name');
            /* 通过插件来删除用户 */
            $users =& init_users();
            $users->remove_user($username); //已经删除用户所有数据
            /* 记录管理员操作 */
            admin_log(addslashes($username), '削除', '会員');
        
            /* 提示信息 */
            $lnk[] = array('text' => '会員リストに戻る', 'href'=>U('index').'&act=list');
            $this -> sys_msg(sprintf('会員 %s 削除成功しました。', $username), 0, $lnk);
            
        }
        /*------------------------------------------------------ */
        //--  收货地址查看
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'address_list')
        {
            $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
            $sql = "SELECT a.*, c.region_name AS country_name, p.region_name AS province, ct.region_name AS city_name, d.region_name AS district_name ".
                   " FROM " .$ecs->table('ec_user_address'). " as a ".
                   " LEFT JOIN " . $ecs->table('ec_region') . " AS c ON c.region_id = a.country " .
                   " LEFT JOIN " . $ecs->table('ec_region') . " AS p ON p.region_id = a.province " .
                   " LEFT JOIN " . $ecs->table('ec_region') . " AS ct ON ct.region_id = a.city " .
                   " LEFT JOIN " . $ecs->table('ec_region') . " AS d ON d.region_id = a.district " .
                   " WHERE user_id='$id'";
            $address = M()->getAll($sql);
            $this->assign('address',          $address);
            $this->assign('ur_here',          '受け取り住所');
            $this->assign('action_link',      array('text' => '会員リスト', 'href'=>U('index').'&act=list&' . list_link_postfix()));
            $this->display('user_address_list.htm');
        }
                        

	}
    
    /**
     *  返回用户列表数据
     *
     * @access  public
     * @param
     *
     * @return void
     */
    public function user_list()
    {
        $result = get_filter();
        if ($result === false)
        {
            /* 过滤条件 */
            $filter['keywords'] = empty($_REQUEST['keywords']) ? '' : trim($_REQUEST['keywords']);
            if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
            {
                $filter['keywords'] = json_str_iconv($filter['keywords']);
            }
            $filter['rank'] = empty($_REQUEST['rank']) ? 0 : intval($_REQUEST['rank']);
            $filter['pay_points_gt'] = empty($_REQUEST['pay_points_gt']) ? 0 : intval($_REQUEST['pay_points_gt']);
            $filter['pay_points_lt'] = empty($_REQUEST['pay_points_lt']) ? 0 : intval($_REQUEST['pay_points_lt']);
    
            $filter['sort_by']    = empty($_REQUEST['sort_by'])    ? 'user_id' : trim($_REQUEST['sort_by']);
            $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC'     : trim($_REQUEST['sort_order']);
            
            $ex_where = ' WHERE 1 ';
            if ($filter['keywords'])
            {
                $ex_where .= " AND user_name LIKE '%" . mysql_like_quote($filter['keywords']) ."%'";
            }
            if ($filter['rank'])
            {
                $sql = "SELECT min_points, max_points, special_rank FROM ".$GLOBALS['ecs']->table('user_rank')." WHERE rank_id = '$filter[rank]'";
                $row = $GLOBALS['db']->getRow($sql);
                if ($row['special_rank'] > 0)
                {
                    /* 特殊等级 */
                    $ex_where .= " AND user_rank = '$filter[rank]' ";
                }
                else
                {
                    $ex_where .= " AND rank_points >= " . intval($row['min_points']) . " AND rank_points < " . intval($row['max_points']);
                }
            }
            if ($filter['pay_points_gt'])
            {
                 $ex_where .=" AND pay_points >= '$filter[pay_points_gt]' ";
            }
            if ($filter['pay_points_lt'])
            {
                $ex_where .=" AND pay_points < '$filter[pay_points_lt]' ";
            }
            
            $filter['record_count'] = M()->getOne("SELECT COUNT(*) FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_users') . $ex_where,'COUNT(*)');

            /* 分页大小 */
            $filter = page_and_size($filter);
            $sql = "SELECT user_id, user_name, email, is_validated, user_money, frozen_money, rank_points, pay_points, reg_time ".
                    " FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_users') . $ex_where .
                    " ORDER by " . $filter['sort_by'] . ' ' . $filter['sort_order'] .
                    " LIMIT " . $filter['start'] . ',' . $filter['page_size'];
    
            $filter['keywords'] = stripslashes($filter['keywords']);
            set_filter($filter, $sql);
        }
        else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
    
        $user_list = M()->getAll($sql);
    
        $count = count($user_list);
        for ($i=0; $i<$count; $i++)
        {
            $user_list[$i]['reg_time'] = local_date(C('ec_date_format'), $user_list[$i]['reg_time']);
        }
    
        $arr = array('user_list' => $user_list, 'filter' => $filter,
            'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
    
        return $arr;
    }
    
    
    
    
}
