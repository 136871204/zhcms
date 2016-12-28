<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcCommentManageControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
        $_LANG['type'] = array(L('admin_eccommentmanage_control_index_list1'),L('admin_eccommentmanage_control_index_list2'));
        $this->assign('lang',    $_LANG);
        
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    /*$image = new EcImage(C('ec_bgcolor'));
	    $tdb=M();
	    $exc = new exchange($ecs->table("ec_brand"), $tdb, 'brand_id', 'brand_name');*/
        
        /* act操作项的初始化 */
        if (empty($_REQUEST['act']))
        {
            $_REQUEST['act'] = 'list';
        }
        else
        {
            $_REQUEST['act'] = trim($_REQUEST['act']);
        }
        /*------------------------------------------------------ */
        //-- 获取没有回复的评论列表
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'list')
        {
            $this->assign('ur_here',      L('admin_eccommentmanage_common1'));
            $this->assign('full_page',    1);
            
            $list = $this->get_comment_list();
            
            $this->assign('comment_list', $list['item']);
            $this->assign('filter',       $list['filter']);
            $this->assign('record_count', $list['record_count']);
            $this->assign('page_count',   $list['page_count']);
            
            $sort_flag  = sort_flag($list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            //assign_query_info();
            $this->display('comment_list.htm');
        }
            
        /*------------------------------------------------------ */
        //-- 翻页、搜索、排序
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'query')
        {
            $list = $this->get_comment_list();
        
            $this->assign('comment_list', $list['item']);
            $this->assign('filter',       $list['filter']);
            $this->assign('record_count', $list['record_count']);
            $this->assign('page_count',   $list['page_count']);
        
            $sort_flag  = sort_flag($list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('comment_list.htm'), '',
                array('filter' => $list['filter'], 'page_count' => $list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 回复用户评论(同时查看评论详情)
        /*------------------------------------------------------ */
        if ($_REQUEST['act']=='reply'){
            $comment_info = array();
            $reply_info   = array();
            $id_value     = array();
            
            /* 获取评论详细信息并进行字符处理 */
            $sql = "SELECT * FROM " .$ecs->table('ec_comment'). " WHERE comment_id = '$_REQUEST[id]'";
            $comment_info = M()->getRowSql($sql);
            $comment_info['content']  = str_replace('\r\n', '<br />', htmlspecialchars($comment_info['content']));
            $comment_info['content']  = nl2br(str_replace('\n', '<br />', $comment_info['content']));
            $comment_info['add_time'] = local_date(C('ec_time_format'), $comment_info['add_time']);
            
            /* 获得评论回复内容 */
            $sql = "SELECT * FROM ".$ecs->table('ec_comment'). " WHERE parent_id = '$_REQUEST[id]'";
            $reply_info = M()->getRowSql($sql);
            
            if (empty($reply_info))
            {
                $reply_info['content']  = '';
                $reply_info['add_time'] = '';
            }
            else
            {
                $reply_info['content']  = nl2br(htmlspecialchars($reply_info['content']));
                $reply_info['add_time'] = local_date(C('ec_time_format'), $reply_info['add_time']);
            }
            
            /* 获取管理员的用户名和Email地址 */
            $sql = "SELECT username, email FROM ". $ecs->table('user').
                   " WHERE uid = '$_SESSION[uid]'";
            $admin_info = M()->getRowSql($sql);
            
            /* 取得评论的对象(文章或者商品) */
            if ($comment_info['comment_type'] == 0)
            {
                $sql = "SELECT goods_name FROM ".$ecs->table('ec_goods').
                       " WHERE goods_id = '$comment_info[id_value]'";
                $id_value = M()->getOne($sql,'goods_name');
            }
            else
            {
                $sql = "SELECT title FROM ".$ecs->table('ec_article').
                       " WHERE article_id='$comment_info[id_value]'";
                $id_value = M()->getOne($sql,'title');
            }
            /* 模板赋值 */
            $this->assign('msg',          $comment_info); //评论信息
            $this->assign('admin_info',   $admin_info);   //管理员信息
            $this->assign('reply_info',   $reply_info);   //回复的内容
            $this->assign('id_value',     $id_value);  //评论的对象
            $this->assign('send_fail',   !empty($_REQUEST['send_ok']));
    
            $this->assign('ur_here',      L('admin_eccommentmanage_control_index_list3'));
            $this->assign('action_link',  array('text' => L('admin_eccommentmanage_common1'),
            'href' => U('index',array('act'=>'list'))));
            
            /* 页面显示 */
            $this->display('comment_info.htm');
        }
        /*------------------------------------------------------ */
        //-- 处理 回复用户评论
        /*------------------------------------------------------ */
        if ($_REQUEST['act']=='action')
        {
            /* 获取IP地址 */
            $ip     = real_ip();
            
            /* 获得评论是否有回复 */
            $sql = "SELECT comment_id, content, parent_id FROM ".$ecs->table('ec_comment').
                   " WHERE parent_id = '$_REQUEST[comment_id]'";
            $reply_info = M()->getRowSql($sql);
            if (!empty($reply_info['content']))
            {
                /* 更新回复的内容 */
                $sql = "UPDATE ".$ecs->table('ec_comment')." SET ".
                       "email     = '$_POST[email]', ".
                       "user_name = '$_POST[user_name]', ".
                       "content   = '$_POST[content]', ".
                       "add_time  =  '" . gmtime() . "', ".
                       "ip_address= '$ip', ".
                       "status    = 0".
                       " WHERE comment_id = '".$reply_info['comment_id']."'";
            }
            else
            {
                //P($_SESSION);
                /* 插入回复的评论内容 */
                $sql = "INSERT INTO ".$ecs->table('ec_comment')." (comment_type, id_value, email, user_name , ".
                            "content, add_time, ip_address, status, parent_id) ".
                       "VALUES('$_POST[comment_type]', '$_POST[id_value]','$_POST[email]', " .
                            "'$_SESSION[username]','$_POST[content]','" . gmtime() . "', '$ip', '0', '$_POST[comment_id]')";
            }
            M()->exe($sql);
            
            /* 更新当前的评论状态为已回复并且可以显示此条评论 */
            $sql = "UPDATE " .$ecs->table('ec_comment'). " SET status = 1 WHERE comment_id = '$_POST[comment_id]'";
            M()->exe($sql);
            
            /* 邮件通知处理流程 */
            if (!empty($_POST['send_email_notice']) or isset($_POST['remail']))
            {
                //获取邮件中的必要内容
                $sql = 'SELECT user_name, email, content ' .
                       'FROM ' .$ecs->table('ec_comment') .
                       " WHERE comment_id ='$_REQUEST[comment_id]'";
                $comment_info = M()->getRowSql($sql);
                
                /* 设置留言回复模板所需要的内容信息 */
                $template    = get_mail_template('recomment');
                
                $this->assign('user_name',   $comment_info['user_name']);
                $this->assign('recomment', $_POST['content']);
                $this->assign('comment', $comment_info['content']);
                $this->assign('shop_name',   "<a href='".ROOT_URL."'>" . C('ec_shop_name') . '</a>');
                $this->assign('send_date',   date('Y-m-d'));

                $content= $this -> view->contentCompile('str:' . $template['template_content']);
                //$state = Mail::send($comment_info['email'],$comment_info['user_name'],$template['template_subject'],$content);
                $state = Mail::send("136871204@qq.com",$comment_info['user_name'],$template['template_subject'],$content);
                /* 发送邮件 */
                if ($state)
                //if (send_mail($comment_info['user_name'], $comment_info['email'], $template['template_subject'], $content, $template['is_html']))
                {
                    $send_ok = 0;
                }
                else
                {
                    $send_ok = 1;
                }
            }
            /* 清除缓存 */
            clear_cache_files();
            /* 记录管理员操作 */
            admin_log(addslashes(L('admin_eccommentmanage_info_page_table_td6')), L('admin_eccommentmanage_control_index_list7'), L('admin_eccommentmanage_common1'));
            ec_header("Location: ".U('index')."&act=reply&id=$_REQUEST[comment_id]&send_ok=$send_ok\n");
            exit;
        }
        /*------------------------------------------------------ */
        //-- 更新评论的状态为显示或者禁止
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'check')
        {
            if ($_REQUEST['check'] == 'allow')
            {
                /* 允许评论显示 */
                $sql = "UPDATE " .$ecs->table('ec_comment'). " SET status = 1 WHERE comment_id = '$_REQUEST[id]'";
                M()->exe($sql);
        
                //add_feed($_REQUEST['id'], COMMENT_GOODS);
        
                /* 清除缓存 */
                clear_cache_files();
        
                ec_header("Location: ".U('index')."&act=reply&id=$_REQUEST[id]\n");
                exit;
            }
            else
            {
                /* 禁止评论显示 */
                $sql = "UPDATE " .$ecs->table('ec_comment'). " SET status = 0 WHERE comment_id = '$_REQUEST[id]'";
                M()->exe($sql);
        
                /* 清除缓存 */
                clear_cache_files();
        
                ec_header("Location: ".U('index')."&act=reply&id=$_REQUEST[id]\n");
                exit;
            }
        }
        /*------------------------------------------------------ */
        //-- 删除某一条评论
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove')
        {
        
            $id = intval($_GET['id']);
        
            $sql = "DELETE FROM " .$ecs->table('ec_comment'). " WHERE comment_id = '$id'";
            $res = M()->exe($sql);
            if ($res)
            {
                M()->exe("DELETE FROM " .$ecs->table('ec_comment'). " WHERE parent_id = '$id'");
            }
        
            admin_log('', L('admin_eccommentmanage_control_index_list4'), L('admin_eccommentmanage_control_index_list5'));
        
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
            exit;
        }
        /*------------------------------------------------------ */
        //-- 批量删除用户评论
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'batch')
        {
            $action = isset($_POST['sel_action']) ? trim($_POST['sel_action']) : 'deny';
            if (isset($_POST['checkboxes']))
            {
                switch ($action)
                {
                    case 'remove':
                        M()->exe("DELETE FROM " . $ecs->table('ec_comment') . " WHERE " . db_create_in($_POST['checkboxes'], 'comment_id'));
                        M()->exe("DELETE FROM " . $ecs->table('ec_comment') . " WHERE " . db_create_in($_POST['checkboxes'], 'parent_id'));
                        break;
        
                   case 'allow' :
                       M()->exe("UPDATE " . $ecs->table('ec_comment') . " SET status = 1  WHERE " . db_create_in($_POST['checkboxes'], 'comment_id'));
                       break;
        
                   case 'deny' :
                       M()->exe("UPDATE " . $ecs->table('ec_comment') . " SET status = 0  WHERE " . db_create_in($_POST['checkboxes'], 'comment_id'));
                       break;
        
                   default :
                       break;
                }
                clear_cache_files();
                $action = ($action == 'remove') ? L('admin_eccommentmanage_control_index_list6') : L('admin_eccommentmanage_control_index_list7');
                admin_log('', $action, L('admin_eccommentmanage_common1'));
        
                $link[] = array('text' => L('admin_eccommentmanage_common2'), 'href' => U('index').'&act=list');
                $this-> sys_msg(sprintf(L('admin_eccommentmanage_control_index_list8').$action.L('admin_eccommentmanage_control_index_list9'), count($_POST['checkboxes'])), 0, $link);
                
            }else
            {
                /* 提示信息 */
                $link[] = array('text' => L('admin_eccommentmanage_common2'), 'href' => U('index').'&act=list');
                $this-> sys_msg(L('admin_eccommentmanage_control_index_list10'), 0, $link);
            }
        }
        
	}
    
    /**
     * 获取评论列表
     * @access  public
     * @return  array
     */
    public function get_comment_list()
    {
        /* 查询条件 */
        $filter['keywords']     = empty($_REQUEST['keywords']) ? 0 : trim($_REQUEST['keywords']);
        if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
        {
            $filter['keywords'] = json_str_iconv($filter['keywords']);
        }
        $filter['sort_by']      = empty($_REQUEST['sort_by']) ? 'add_time' : trim($_REQUEST['sort_by']);
        $filter['sort_order']   = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
    
        $where = (!empty($filter['keywords'])) ? " AND content LIKE '%" . mysql_like_quote($filter['keywords']) . "%' " : '';
    
        $sql = "SELECT count(*) FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_comment'). " WHERE parent_id = 0 $where";
        $filter['record_count'] = M()->getOne($sql,'count(*)');
        //p($sql);die;
        /* 分页大小 */
        $filter = page_and_size($filter);
        
        /* 获取评论数据 */
        $arr = array();
        $sql  = "SELECT * FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_comment'). " WHERE parent_id = 0 $where " .
                " ORDER BY $filter[sort_by] $filter[sort_order] ".
                " LIMIT ". $filter['start'] .", $filter[page_size]";
        $res  = M()->query($sql);
        if(!empty($res)){
            foreach($res as $row){
                $sql = ($row['comment_type'] == 0) ?
                "SELECT goods_name FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_goods'). " WHERE goods_id='$row[id_value]'" :
                "SELECT title FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_article'). " WHERE article_id='$row[id_value]'";
                
                $sql = ($row['comment_type'] == 0) ?
                $row['title'] = M()->getOne($sql,'goods_name'):
                $row['title'] = M()->getOne($sql,'title');
                
                $ec_time_format=C('ec_time_format');
                $row['add_time'] = local_date($ec_time_format, $row['add_time']);
                $arr[] = $row;
            }
        }

        $filter['keywords'] = stripslashes($filter['keywords']);
        $arr = array('item' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
    
        return $arr;
    }
    
    
    
}
