<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcVoteControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    //$image = new EcImage(C('ec_bgcolor'));
        $tdb=M();
        $exc = new exchange($ecs->table("ec_vote"), $tdb, 'vote_id', 'vote_name');
        $exc_opn = new exchange($ecs->table("ec_vote_option"), $tdb, 'option_id', 'option_name');
        
        /* act操作项的初始化 */
        if (empty($_REQUEST['act']))
        {
            $_REQUEST['act'] = 'list';
        }
        else
        {
            $_REQUEST['act'] = trim($_REQUEST['act']);
        }

        //p($_REQUEST);die;
        if ($_REQUEST['act'] == 'list'){
            /* 模板赋值 */
            $this->assign('ur_here',      L('admin_ecvote_common1'));
            $this->assign('action_link',  array('text' => L('admin_ecvote_common2'), 'href'=>U('index').'&act=add'));
            $this->assign('full_page',    1);
        
            $vote_list = $this-> get_votelist();
        
            $this->assign('lists',            $vote_list['list']);
            $this->assign('filter',          $vote_list['filter']);
            $this->assign('record_count',    $vote_list['record_count']);
            $this->assign('page_count',      $vote_list['page_count']);
        
            /* 显示页面 */
            //assign_query_info();
            $this->display('vote_list.htm');
        }
        /*------------------------------------------------------ */
        //-- 排序、分页、查询
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query')
        {
            $vote_list = $this-> get_votelist();
            $this->assign('lists',            $vote_list['list']);
            $this->assign('filter',          $vote_list['filter']);
            $this->assign('record_count',    $vote_list['record_count']);
            $this->assign('page_count',      $vote_list['page_count']);
        
            make_json_result($this->fetch('vote_list.htm'), '',
                array('filter' => $vote_list['filter'], 'page_count' => $vote_list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 添加新的投票页面
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'add')
        {
        
            /* 日期初始化 */
            $vote = array('start_time' => local_date('Y-m-d'), 'end_time' => local_date('Y-m-d', local_strtotime('+2 weeks')));
        
            /* 模板赋值 */
            $this->assign('ur_here',      L('admin_ecvote_common2'));
            $this->assign('action_link',  array('href'=> U('index').'&act=list', 'text' => L('admin_ecvote_common1')));
        
            $this->assign('action',       'add');
            $this->assign('form_act',     'insert');
            $this->assign('vote_arr',     $vote);
            //$this->assign('cfg_lang',     $_CFG['lang']);
        
            /* 显示页面 */
            //assign_query_info();
            $this->display('vote_info.htm');
        }
        elseif ($_REQUEST['act'] == 'insert')
        {
            /* 获得广告的开始时期与结束日期 */
            $start_time = local_strtotime($_POST['start_time']);
            $end_time   = local_strtotime($_POST['end_time']);
            /* 查看广告名称是否有重复 */
            $sql = "SELECT COUNT(*) FROM " .$ecs->table('ec_vote'). " WHERE vote_name='$_POST[vote_name]'";
            if (M()->getOne($sql,'COUNT(*)') == 0)
            {
                /* 插入数据 */
                $sql = "INSERT INTO ".$ecs->table('ec_vote')." (vote_name, start_time, end_time, can_multi, vote_count)
                VALUES ('$_POST[vote_name]', '$start_time', '$end_time', '$_POST[can_multi]', '0')";
                $insert_id=M()->exe($sql);
                $new_id =$insert_id;
                /* 记录管理员操作 */
                admin_log($_POST['vote_name'], L('admin_ecvote_common3'), L('admin_ecvote_common4'));
        
                /* 清除缓存 */
                clear_cache_files();
        
                /* 提示信息 */
                $link[0]['text'] = L('admin_ecvote_control_index_insert1');
                $link[0]['href'] = U('index').'&act=option&id='.$new_id;
        
                $link[1]['text'] = L('admin_ecvote_control_index_insert2');
                $link[1]['href'] = U('index').'&act=add';
        
                $link[2]['text'] = L('admin_ecvote_common5');
                $link[2]['href'] = U('index').'&act=list';
        
                $this->sys_msg(L('admin_ecvote_common3') . "&nbsp;" .$_POST['vote_name'] . "&nbsp;" . L('admin_ecvote_common6'),0, $link);


            }
            else
            {
                $link[] = array('text' => L('admin_ecvote_control_index_insert3'), 'href'=>'javascript:history.back(-1)');
                $this->sys_msg(L('admin_ecvote_control_index_insert4'), 0, $link);
            }
        }
        /*------------------------------------------------------ */
        //-- 在线调查编辑页面
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit')
        {
        
            /* 获取数据 */
            $vote_arr = M()->GetRowSql("SELECT * FROM ".$ecs->table('ec_vote')." WHERE vote_id='$_REQUEST[id]'");
            $vote_arr['start_time'] = local_date('Y-m-d', $vote_arr['start_time']);
            $vote_arr['end_time']   = local_date('Y-m-d', $vote_arr['end_time']);
        
            /* 模板赋值 */
            $this->assign('ur_here',      L('admin_ecvote_control_index_insert5'));
            $this->assign('action_link',  array('href'=> U('index').'&act=list', 'text' => L('admin_ecvote_common1')));
            $this->assign('form_act',     'update');
            $this->assign('vote_arr',     $vote_arr);
        
            //assign_query_info();
            $this->display('vote_info.htm');
        }
        elseif ($_REQUEST['act'] == 'update')
        {
            /* 获得广告的开始时期与结束日期 */
            $start_time = local_strtotime($_POST['start_time']);
            $end_time   = local_strtotime($_POST['end_time']);
        
            /* 更新信息 */
            $sql = "UPDATE " .$ecs->table('ec_vote'). " SET ".
                    "vote_name     = '$_POST[vote_name]', ".
                    "start_time    = '$start_time', ".
                    "end_time      = '$end_time', ".
                    "can_multi     = '$_POST[can_multi]' ".
                    "WHERE vote_id = '$_REQUEST[id]'";
            M()->exe($sql);
        
            /* 清除缓存 */
            clear_cache_files();
        
            /* 记录管理员操作 */
            admin_log($_POST['vote_name'], L('admin_ecvote_common7'), L('admin_ecvote_common4'));
        
            /* 提示信息 */
            $link[] = array('text' => L('admin_ecvote_common5'), 'href'=> U('index').'&act=list');
            $this->sys_msg(L('admin_ecvote_common7') .' '.$_POST['vote_name'].' '. L('admin_ecvote_common6'), 0, $link);
        }
        /*------------------------------------------------------ */
        //-- 调查选项列表页面
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'option')
        {
            $id = !empty($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
        
            /* 模板赋值 */
            $this->assign('ur_here',      L('admin_ecvote_control_index_insert6'));
            $this->assign('action_link',  array('href'=>U('index').'&act=list', 'text' => L('admin_ecvote_common1')));
            $this->assign('full_page',    1);
        
            $this->assign('id',           $id);
            $this->assign('option_arr',   $this -> get_optionlist($id));
        
            /* 显示页面 */
            //assign_query_info();
            $this->display('vote_option.htm');
        }
        /*------------------------------------------------------ */
        //-- 调查选项查询
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query_option')
        {
            $id = intval($_GET['vid']);
        
            $this->assign('id',           $id);
            $this->assign('option_arr',   $this -> get_optionlist($id));
        
            make_json_result($this->fetch('vote_option.htm'));
        }
        /*------------------------------------------------------ */
        //-- 添加新调查选项
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'new_option')
        {
            $option_name = json_str_iconv(trim($_POST['option_name']));
            $vote_id = intval($_POST['id']);
        
            if (!empty($option_name))
            {
                /* 查看调查标题是否有重复 */
                $sql = 'SELECT COUNT(*) FROM ' .$ecs->table('ec_vote_option').
                       " WHERE option_name = '$option_name' AND vote_id = '$vote_id'";
                if (M()->getOne($sql,'COUNT(*)') != 0)
                {
                    make_json_error(L('admin_ecvote_control_index_insert7'));
                }
                else
                {
                    $sql = 'INSERT INTO ' .$ecs->table('ec_vote_option'). ' (vote_id, option_name, option_count) '.
                            "VALUES ('$vote_id', '$option_name', 0)";
                    M()->exe($sql);
                    clear_cache_files();
                    admin_log($option_name, L('admin_ecvote_common3'), L('admin_ecvote_control_index_insert8'));
                    
                    $url = 'index.php?act=query_option&vid='.$vote_id.'&' . str_replace('act=new_option', '', $_SERVER['QUERY_STRING']);

                    ec_header("Location: $url\n");
                    exit;
                }
            }
            else
            {
                make_json_error(L('admin_ecvote_control_index_insert9'));
            }
        }
        /*------------------------------------------------------ */
        //-- 编辑调查主题
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_vote_name')
        {
        
            $id        = intval($_POST['id']);
            $vote_name = json_str_iconv(trim($_POST['val']));
        
            /* 检查名称是否重复 */
            if ($exc->num("vote_name", $vote_name, $id) != 0)
            {
                make_json_error(sprintf(L('admin_ecvote_control_index_insert10'), $vote_name));
            }
            else
            {
                if ($exc->edit("vote_name = '$vote_name'", $id))
                {
                    admin_log($vote_name, L('admin_ecvote_common7'), L('admin_ecvote_common4'));
                    make_json_result(stripslashes($vote_name));
                }
            }
        }
        /*------------------------------------------------------ */
        //-- 编辑调查选项
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_option_name')
        {
            $id        = intval($_POST['id']);
            $option_name = json_str_iconv(trim($_POST['val']));
        
            /* 检查名称是否重复 */
            $vote_id = M()->getOne('SELECT vote_id FROM ' .$ecs->table('ec_vote_option'). " WHERE option_id='$id'",'vote_id');
        
            $sql = 'SELECT COUNT(*) FROM ' .$ecs->table('ec_vote_option').
                   " WHERE option_name = '$option_name' AND vote_id = '$vote_id' AND option_id <> $id";
            if (M()->getOne($sql,'COUNT(*)') != 0)
            {
                make_json_error(sprintf(L('admin_ecvote_control_index_insert11'), $option_name));
            }
            else
            {
                if ($exc_opn->edit("option_name = '$option_name'", $id))
                {
                    admin_log($option_name, L('admin_ecvote_common7'), L('admin_ecvote_common8'));
                    make_json_result(stripslashes($option_name));
                }
            }
        }
        /*------------------------------------------------------ */
        //-- 编辑调查选项排序值
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_option_order')
        {
        
            $id        = intval($_POST['id']);
            $option_order = json_str_iconv(trim($_POST['val']));
        
            if ($exc_opn->edit("option_order = '$option_order'", $id))
            {
                admin_log(L('admin_ecvote_control_index_insert12'), L('admin_ecvote_common7'), L('admin_ecvote_common8'));
                make_json_result(stripslashes($option_order));
            }
        
        }
        /*------------------------------------------------------ */
        //-- 删除在线调查主题
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove')
        {
        
            $id = intval($_GET['id']);
        
            if ($exc->drop($id))
            {
                /* 同时删除调查选项 */
                M()->exe("DELETE FROM " .$ecs->table('ec_vote_option'). " WHERE vote_id = '$id'");
                clear_cache_files();
                admin_log('', L('admin_ecvote_control_index_insert13'), L('admin_ecvote_common4'));
            }
        
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
            exit;
        }        
        /*------------------------------------------------------ */
        //-- 删除在线调查选项
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove_option')
        {
        
            $id = intval($_GET['id']);
            $vote_id = M()->getOne('SELECT vote_id FROM ' .$ecs->table('ec_vote_option'). " WHERE option_id='$id'",'vote_id');
        
            if ($exc_opn->drop($id))
            {
                clear_cache_files();
                admin_log('', L('admin_ecvote_control_index_insert14'), L('admin_ecvote_common8'));
            }
        
            $url = 'index.php?act=query_option&vid='.$vote_id.'&' . str_replace('act=remove_option', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
            exit;
        }



	}
    
    /* 获取在线调查数据列表 */
    public function get_votelist()
    {
        $filter   = array();

        /* 记录总数以及页数 */
        $sql = 'SELECT COUNT(*) FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_vote');
        $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
    
        $filter = page_and_size($filter);
    
        /* 查询数据 */
        $sql  = 'SELECT * FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_vote'). ' ORDER BY vote_id DESC';
        $res  = M()->selectLimit($sql, $filter['page_size'], $filter['start']);
    
        $list = array();
        if(!empty($res))
        {
            foreach($res as $rows)
            {
                $rows['begin_date'] = local_date('Y-m-d', $rows['start_time']);
                $rows['end_date']   = local_date('Y-m-d', $rows['end_time']);
                $list[] = $rows;
            }
        }

        return array('list' => $list, 'filter' => $filter, 'page_count' => $filter['page_count'], 
                    'record_count' => $filter['record_count']);
    
            
        
    }
    
    /* 获取调查选项列表 */
    function get_optionlist($id)
    {
        $list = array();
        $sql  = 'SELECT option_id, vote_id, option_name, option_count, option_order'.
                ' FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_vote_option').
                " WHERE vote_id = '$id' ORDER BY option_order ASC, option_id DESC";
        $res  = M()->query($sql);
        
        if(!empty($res))
        {
            foreach($res as $row)
            {
                $list[] = $row;
            }
        }
    
        return $list;
    }
    
    
}
