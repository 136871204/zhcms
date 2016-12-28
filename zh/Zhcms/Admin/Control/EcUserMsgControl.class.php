<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcUserMsgControl extends EcAdminControl {
   // protected $db;
    
    public function __init() {

        /* 留言类型 */
        $_LANG['type'][M_MESSAGE] = L('admin_ecusermsg_common1');
        $_LANG['type'][M_COMPLAINT] = L('admin_ecusermsg_common2');
        $_LANG['type'][M_ENQUIRY] = L('admin_ecusermsg_common3');
        $_LANG['type'][M_CUSTOME] = L('admin_ecusermsg_common4');
        $_LANG['type'][M_BUY] = L('admin_ecusermsg_common5');
        $_LANG['type'][M_BUSINESS] = L('admin_ecusermsg_common6');
        $this->assign('lang',     $_LANG);
        
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    /*$image = new EcImage(C('ec_bgcolor'));*/
	    $tdb=M();
        $exc = new exchange($ecs->table("ec_feedback"), $tdb, 'msg_id', 'msg_title');
        
        /*------------------------------------------------------ */
        //-- 发送留言
        /*------------------------------------------------------ */
        if ($_REQUEST['act']=='add')
        { 
            $user_id = empty($_GET['user_id']) ? 0 : intval($_GET['user_id']);
            $order_id = empty($_GET['order_id']) ? 0 : intval($_GET['order_id']);
            $order_sn = M()->getOne("SELECT order_sn FROM "  . $ecs->table('ec_order_info') . " WHERE order_id = '$order_id'",'order_sn');
            
            /* 获取关于订单所有信息 */
            $sql = "SELECT msg_id, user_name, msg_title, msg_type, msg_time, msg_content".
                   " FROM " . $ecs->table('ec_feedback').
                   " WHERE user_id ='$user_id' AND order_id = '$order_id'";
            $msg_list = M()->getAll($sql);
            if(!empty($msg_list))
            {
                foreach($msg_list as $key=>$val)
                {
                    $msg_list[$key]['msg_time'] = local_date(C('ec_time_format'), $val['msg_time']);
                }
            }
            $this->assign('ur_here',      sprintf(L('admin_ecusermsg_control_index_add1'), $order_sn));
            $this->assign('action_link',  array('text'=>L('admin_ecusermsg_control_index_add2'), 'href'=>U('Admin/EcOrder/index').'&act=info&order_id=' . $order_id));
            $this->assign('msg_list', $msg_list);
            $this->assign('order_id', $_GET['order_id']);
            $this->assign('user_id',  $_GET['user_id']);
            $this->display('msg_add.htm');

        }
        if ($_REQUEST['act']=='insert')
        {
            $sql = "INSERT INTO " . $ecs->table('ec_feedback') . "(parent_id, user_id, user_name, user_email, msg_title, msg_type, msg_content, msg_time, message_img, order_id)" .
                " VALUES (0, '$_POST[user_id]', '$_SESSION[username]', ' ', ".
                " '$_POST[msg_title]', 5, '$_POST[msg_content]', '" . gmtime() . "', '', '$_POST[order_id]')";
            
            M()->exe($sql);
            
            ec_header("Location: ".U('index')."&act=add&order_id=$_POST[order_id]&user_id=$_POST[user_id]\n");
            exit;
        }
        if ($_REQUEST['act'] == 'remove_msg')
        {
            $msg_id = empty($_GET['msg_id']) ? 0 : intval($_GET['msg_id']);
            $order_id = empty($_GET['order_id']) ? 0 : intval($_GET['order_id']);
            $user_id = empty($_GET['user_id']) ? 0 : intval($_GET['user_id']);
            $sql = "SELECT user_id, order_id, message_img FROM " . $ecs->table('ec_feedback') . " WHERE msg_id='$msg_id'";
            $row = M()->getRowSql($sql);
            if ($row)
            {
                if ($row['user_id'] == $user_id && $row['order_id'] == $order_id)
                {
                    if ($row['message_img'])
                    {
                        echo 'TODO:图片删除之后做';die;
                        //@unlink(ROOT_PATH. DATA_DIR . '/feedbackimg/' . $row['message_img']);
                    }
                    $sql = "DELETE FROM " . $ecs->table('ec_feedback') . " WHERE msg_id=$msg_id LIMIT 1";
                    M()->exe($sql);
                }
            }
        
            ec_header("Location: ".U('index')."&act=add&order_id=$_GET[order_id]&user_id=$_GET[user_id]\n");
            exit;
        } 
        /*------------------------------------------------------ */
        //-- 更新留言的状态为显示或者禁止
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'check')
        {
            if ($_REQUEST['check'] == 'allow')
            {
                /* 允许留言显示 */
                $sql = "UPDATE " .$ecs->table('ec_feedback'). " SET msg_status = 1 WHERE msg_id = '$_REQUEST[id]'";
                
                M()->exe($sql);

                /* 清除缓存 */
                clear_cache_files();
        
                ec_header("Location: ".U('index')."&act=view&id=$_REQUEST[id]\n");
                exit;
            }
            else
            {
                /* 禁止留言显示 */
                $sql = "UPDATE " .$ecs->table('ec_feedback'). " SET msg_status = 0 WHERE msg_id = '$_REQUEST[id]'";
                M()->exe($sql);
                
                /* 清除缓存 */
                clear_cache_files();
        
                ec_header("Location: ".U('index')."&act=view&id=$_REQUEST[id]\n");
                exit;
            }
        }
        /*------------------------------------------------------ */
        //-- 列出所有留言
        /*------------------------------------------------------ */
        if ($_REQUEST['act']=='list_all')
        {
            //assign_query_info();
            $msg_list = $this -> msg_list();
        
            $this->assign('msg_list',     $msg_list['msg_list']);
            $this->assign('filter',       $msg_list['filter']);
            $this->assign('record_count', $msg_list['record_count']);
            $this->assign('page_count',   $msg_list['page_count']);
            $this->assign('full_page',    1);
            $this->assign('sort_msg_id', '<img src="'.__PUBLIC__.'/ec/images/sort_desc.gif">');
        
            $this->assign('ur_here',      L('admin_ecusermsg_common7'));
            $this->assign('full_page',    1);
            $this->display('msg_list.htm');
        }
        /*------------------------------------------------------ */
        //-- ajax显示留言列表
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query')
        {
            $msg_list = $this -> msg_list();
        
            $this->assign('msg_list',     $msg_list['msg_list']);
            $this->assign('filter',       $msg_list['filter']);
            $this->assign('record_count', $msg_list['record_count']);
            $this->assign('page_count',   $msg_list['page_count']);
        
            $sort_flag  = sort_flag($msg_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('msg_list.htm'), '', array('filter' => $msg_list['filter'], 'page_count' => $msg_list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- ajax 删除留言
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove')
        {
            $msg_id = intval($_REQUEST['id']);
            
            $msg_title = $exc->get_name($msg_id);
            $img = $exc->get_name($msg_id, 'message_img');
            
            if ($exc->drop($msg_id))
            {
                /* 删除图片 */
                if (!empty($img))
                {
                    @unlink(ROOT_PATH. EC_DATA_DIR . '/feedbackimg/'.$img);
                }
                $sql = "DELETE FROM " . $ecs->table('ec_feedback') . " WHERE parent_id = '$msg_id' LIMIT 1";
                M()->exe($sql);
                
                admin_log(addslashes($msg_title), L('admin_ecusermsg_common8'), L('admin_ecusermsg_common7'));
                $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
                ec_header("Location: $url\n");
                exit;
            }
            else
            {
                make_json_error(L('admin_ecusermsg_control_index_remove1'));
            }
            
        }
        /*------------------------------------------------------ */
        //-- 批量操作删除、允许显示、禁止显示用户评论
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'batch')
        {
            $action = isset($_POST['sel_action']) ? trim($_POST['sel_action']) : 'def';
            
            if (isset($_POST['checkboxes']))
            {
                switch ($action)
                {
                    case 'remove':
                        M()->exe("DELETE FROM " . $ecs->table('ec_feedback') . " WHERE " . db_create_in($_POST['checkboxes'], 'msg_id'));
                        M()->exe("DELETE FROM " . $ecs->table('ec_feedback') . " WHERE " . db_create_in($_POST['checkboxes'], 'parent_id'));
                        break;
                    
                    case 'allow' :
                        M()->exe("UPDATE " . $ecs->table('ec_feedback') . " SET msg_status = 1  WHERE " . db_create_in($_POST['checkboxes'], 'msg_id'));
                        break;
                    
                    case 'deny' :
                        M()->exe("UPDATE " . $ecs->table('ec_feedback') . " SET msg_status = 0,msg_area =1  WHERE " . db_create_in($_POST['checkboxes'], 'msg_id'));
                        break;
                    
                    default :
                        break;
                }
                
                clear_cache_files();
                $action = ($action == 'remove') ? L('admin_ecusermsg_common8') : L('admin_ecusermsg_control_index_batch1');
                admin_log('', $action, L('admin_ecusermsg_control_index_batch2'));
        
                $link[] = array('text' => L('admin_ecusermsg_control_index_batch3'), 'href' => U('index').'&act=list_all');
                $this -> sys_msg(sprintf(L('admin_ecusermsg_control_index_batch4'), count($_POST['checkboxes'])), 0, $link);
            }
            else
            {
                /* 提示信息 */
                $link[] = array('text' => $_LANG['back_list'], 'href' => 'user_msg.php?act=list_all');
                $this -> sys_msg(L('admin_ecusermsg_control_index_batch5'), 0, $link);
            }
        }
        /*------------------------------------------------------ */
        //-- 回复留言
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act']=='view')
        {
            $this->assign('send_fail',   !empty($_REQUEST['send_ok']));
            $this->assign('msg',         $this->get_feedback_detail(intval($_REQUEST['id'])));
            $this->assign('ur_here',     L('admin_ecusermsg_control_index_view1'));
            $this->assign('action_link', array('text' => L('admin_ecusermsg_common7'), 'href'=>U('index').'&act=list_all'));
        
            //assign_query_info();
            $this->display('msg_info.htm');
        }
        elseif ($_REQUEST['act']=='action')
        {
            if (empty($_REQUEST['parent_id']))
            {
                $sql = "INSERT INTO ".$ecs->table('ec_feedback')." (msg_title, msg_time, user_id, user_name , ".
                    "user_email, parent_id, msg_content) ".
                        "VALUES ('reply', '".gmtime()."', '".$_SESSION['uid']."', ".
                            "'".$_SESSION['username']."', '".$_POST['user_email']."', ".
                            "'".$_REQUEST['msg_id']."', '".$_POST['msg_content']."') ";
                M()->exe($sql);
            }
            else
            {
                $sql = "UPDATE ".$ecs->table('ec_feedback')." SET user_email = '".$_POST['user_email']."', msg_content='".$_POST['msg_content']."', msg_time = '".gmtime()."' WHERE msg_id = '".$_REQUEST['parent_id']."'";
                M()->exe($sql);
            }
            /* 邮件通知处理流程 */
            /* 邮件通知处理流程 */
            if (!empty($_POST['send_email_notice']) or isset($_POST['remail']))
            {
                //获取邮件中的必要内容
                $sql = 'SELECT user_name, user_email, msg_title, msg_content ' .
                       'FROM ' .$ecs->table('ec_feedback') .
                       " WHERE msg_id ='$_REQUEST[msg_id]'";
                $message_info = M()->getRowSql($sql);
                
                /* 设置留言回复模板所需要的内容信息 */
                $template    = get_mail_template('user_message');
                $message_content = $message_info['msg_title'] . "\r\n" . $message_info['msg_content'];
                
                $this->assign('user_name',   $message_info['user_name']);
                $this->assign('message_note', $_POST['msg_content']);
                $this->assign('message_content', $message_content);
                $this->assign('shop_name',   "<a href='".U('ec/EcIndex/index')."'>" . C('ec_shop_name') . '</a>');
                $this->assign('send_date',   date('Y-m-d'));

                $content= $this -> view->contentCompile('str:' . $template['template_content']);
                
                $mail_result = Mail::send($message_info['user_email'], $message_info['user_name'], $template['template_subject'], $content);
                
                if($mail_result)
                {
                    $send_ok = 0;
                }else
                {
                    $send_ok = 1;
                }

            }
            ec_header("Location: ".U('index')."&act=view&id=".$_REQUEST['msg_id']."&send_ok=$send_ok\n");
            exit;
        }
        /*------------------------------------------------------ */
        //-- 删除会员上传的文件
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'drop_file')
        {
            /* 删除上传的文件 */
            $file = $_GET['file'];
            $file = str_replace('/','',$file);
            @unlink(ROOT_PATH. EC_DATA_DIR . '/feedbackimg/'.$file);
        
            /* 更新数据库 */
            M()->exe("UPDATE ".$ecs->table('ec_feedback')." SET message_img = '' WHERE msg_id = '$_GET[id]'");
        
            ec_header("Location: ".U('index')."&act=view&amp;id=".$_GET['id']."\n");
            exit;
        }
        
    }
    
    
    
    /**
    *
     *
     * @access  public
     * @param
     *
     * @return void
     */
    public function msg_list()
    {
        /* 过滤条件 */
        $filter['keywords']   = empty($_REQUEST['keywords']) ? '' : trim($_REQUEST['keywords']);
        if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
        {
            $filter['keywords'] = json_str_iconv($filter['keywords']);
        }
        $filter['msg_type']   = isset($_REQUEST['msg_type']) ? intval($_REQUEST['msg_type']) : -1;
        $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'f.msg_id' : trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
    
        $where = '';
        if ($filter['keywords'])
        {
            $where .= " AND f.msg_title LIKE '%" . mysql_like_quote($filter['keywords']) . "%' ";
        }
        if ($filter['msg_type'] != -1)
        {
            $where .= " AND f.msg_type = '$filter[msg_type]' ";
        }
        
        $sql = "SELECT count(*) FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_feedback'). " AS f" .
           " WHERE parent_id = '0' " . $where;
        $filter['record_count'] = M()->getOne($sql,'count(*)');
        
        /* 分页大小 */
        $filter = page_and_size($filter);
        
        $sql = "SELECT f.msg_id, f.user_name, f.msg_title, f.msg_type, f.order_id, f.msg_status, f.msg_time, f.msg_area, COUNT(r.msg_id) AS reply " .
            "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_feedback') . " AS f ".
            "LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_feedback') . " AS r ON r.parent_id=f.msg_id ".
            "WHERE f.parent_id = 0 $where " .
            "GROUP BY f.msg_id ".
            "ORDER by $filter[sort_by] $filter[sort_order] ".
            "LIMIT " . $filter['start'] . ', ' . $filter['page_size'];
        
        $msg_list = M()->getAll($sql);
        
        /* 留言类型 */
        $_LANG['type'][M_MESSAGE] = L('admin_ecusermsg_common1');
        $_LANG['type'][M_COMPLAINT] = L('admin_ecusermsg_common2');
        $_LANG['type'][M_ENQUIRY] = L('admin_ecusermsg_common3');
        $_LANG['type'][M_CUSTOME] = L('admin_ecusermsg_common4');
        $_LANG['type'][M_BUY] = L('admin_ecusermsg_common5');
        $_LANG['type'][M_BUSINESS] = L('admin_ecusermsg_common6');

        if(!empty($msg_list))
        {
            foreach ($msg_list AS $key => $value)
            {   if($value['order_id'] > 0)
                {
                    $msg_list[$key]['order_sn'] = M()->getOne("SELECT order_sn FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_order_info') ." WHERE order_id= " .$value['order_id'],'order_sn');
                }
                $msg_list[$key]['msg_time'] = local_date(C('ec_time_format'), $value['msg_time']);
                $msg_list[$key]['msg_type'] = $_LANG['type'][$value['msg_type']];
            }
        }
        $filter['keywords'] = stripslashes($filter['keywords']);
        $arr = array('msg_list' => $msg_list, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);

        return $arr;
        
    
    }
    
    /**
     * 获得留言的详细信息
     *
     * @param   integer $id
     *
     * @return  array
     */
    public function get_feedback_detail($id)
    {
        $ecs=$GLOBALS['ec_globals']['ecs'];
        //global $ecs, $db, $_CFG;
    
        $sql = "SELECT T1.*, T2.msg_id AS reply_id, T2.user_name  AS reply_name, u.email AS reply_email, ".
                    "T2.msg_content AS reply_content , T2.msg_time AS reply_time, T2.user_name AS reply_name ".
                "FROM ".$ecs->table('ec_feedback'). " AS T1 ".
                "LEFT JOIN " .$ecs->table('user'). " AS u ON u.uid='" .$_SESSION['uid']. "' ".
                "LEFT JOIN ".$ecs->table('ec_feedback'). " AS T2 ON T2.parent_id=T1.msg_id ".
                "WHERE T1.msg_id = '$id'";
        $msg = M()->GetRowSql($sql);
    
        if ($msg)
        {
            $msg['msg_time']   = local_date(C('ec_time_format'), $msg['msg_time']);
            $msg['reply_time'] = local_date(C('ec_time_format'), $msg['reply_time']);
        }
    
        return $msg;
    }
    
    
    
}
