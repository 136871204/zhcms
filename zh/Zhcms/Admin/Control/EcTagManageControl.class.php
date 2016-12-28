<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcTagManageControl extends EcAdminControl {

    
    public function __init() {
	}
    
    public function index() {
        $ecs=$GLOBALS['ec_globals']['ecs'];
        $_REQUEST['act'] = trim($_REQUEST['act']);
        if (empty($_REQUEST['act']))
        {
            $_REQUEST['act'] = 'list';
        }
        
        if ($_REQUEST['act'] == 'list')
        {
            /* 妯℃澘璧嬪€ */
            $this->assign('ur_here',      L('admin_ectagmanage_common1'));
            $this->assign('action_link', array('href' => U('index',array('act'=>'add')), 'text' => L('admin_ectagmanage_common2')));
            $this->assign('full_page',    1);
        
            $tag_list = $this-> get_tag_list();
            $this->assign('tag_list',     $tag_list['tags']);
            $this->assign('filter',       $tag_list['filter']);
            $this->assign('record_count', $tag_list['record_count']);
            $this->assign('page_count',   $tag_list['page_count']);
        
            $sort_flag  = sort_flag($tag_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            /* 椤甸潰鏄剧ず */
            //assign_query_info();
            $this->display('tag_manage.htm');
        }
        /*------------------------------------------------------ */
        //-- 娣诲姞 ,缂栬緫
        /*------------------------------------------------------ */
        elseif($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit')
        {

            $is_add = $_REQUEST['act'] == 'add';
            $this->assign('insert_or_update', $is_add ? 'insert' : 'update');
        
            if($is_add)
            {
                $tag = array(
                    'tag_id' => 0,
                    'tag_words' => '',
                    'goods_id' => 0,
                    'goods_name' => L('admin_ectagmanage_common3')
                );
                $this->assign('ur_here',      L('admin_ectagmanage_common2'));
            }
            else
            {
                $tag_id = $_GET['id'];
                $tag = $this-> get_tag_info($tag_id);
                $tag['tag_words']=htmlspecialchars($tag['tag_words']);
                $this->assign('ur_here',      L('admin_ectagmanage_control_index_add1'));
            }
            $this->assign('tag', $tag);
            $this->assign('action_link', array('href' =>  U('index',array('act'=>'list')), 'text' => L('admin_ectagmanage_common1')));
        
            //assign_query_info();
            $this->display('tag_edit.htm');
        }
        elseif($_REQUEST['act'] == 'insert' || $_REQUEST['act'] == 'update')
        {
            $is_insert = $_REQUEST['act'] == 'insert';
            $tag_words = empty($_POST['tag_name']) ? '' : trim($_POST['tag_name']);
            $id = intval($_POST['id']);
            $goods_id = intval($_POST['goods_id']);
            
            if ($goods_id <= 0)
            {
                $this->sys_msg(L('admin_ectagmanage_common3'));
            }
            
            if (!$this-> tag_is_only($tag_words, $id, $goods_id))
            {
                $this->sys_msg(sprintf(L('admin_ectagmanage_common4'), $tag_words));
            }
        
            if($is_insert)
            {
                $sql = 'INSERT INTO ' . $ecs->table('ec_tag') . '(tag_id, goods_id, tag_words)' .
                       " VALUES('$id', '$goods_id', '$tag_words')";
                M()->exe($sql);
        
                admin_log($tag_words, L('admin_ectagmanage_control_index_insert1'), L('admin_ectagmanage_common5'));
        
                 /* 娓呴櫎缂撳瓨 */
                clear_cache_files();
        
                $link[0]['text'] = L('admin_ectagmanage_common6');
                $link[0]['href'] = U('index',array('act'=>'list'));
        
                $this->sys_msg(L('admin_ectagmanage_control_index_insert2'), 0, $link);
            }
            else
            {
        
                $this->edit_tag($tag_words, $id, $goods_id);
        
                /* 娓呴櫎缂撳瓨 */
                clear_cache_files();
        
                $link[0]['text'] = L('admin_ectagmanage_common6');
                $link[0]['href'] = U('index',array('act'=>'list'));
        
                $this->sys_msg(L('admin_ectagmanage_control_index_insert3'), 0, $link);
            }
                    
        }
        elseif ($_REQUEST['act'] == 'query')
        {

            $tag_list = $this-> get_tag_list();
            $this->assign('tag_list',     $tag_list['tags']);
            $this->assign('filter',       $tag_list['filter']);
            $this->assign('record_count', $tag_list['record_count']);
            $this->assign('page_count',   $tag_list['page_count']);
        
            $sort_flag  = sort_flag($tag_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('tag_manage.htm'), '',
                array('filter' => $tag_list['filter'], 'page_count' => $tag_list['page_count']));
        }
        elseif ($_REQUEST['act'] == 'search_goods')
        {

            $json   = new JSON;
            $filter = $json->decode($_GET['JSON']);
            $arr    = get_goods_list($filter);
            if (empty($arr))
            {
                $arr[0] = array(
                    'goods_id'   => 0,
                    'goods_name' => ''
                );
            }
        
            make_json_result($arr);
        }
        elseif ($_REQUEST['act'] == 'batch_drop')
        {
        
            if (isset($_POST['checkboxes']))
            {
                $count = 0;
                foreach ($_POST['checkboxes'] AS $key => $id)
                {
                    $sql = "DELETE FROM " .$ecs->table('ec_tag'). " WHERE tag_id='$id'";
                    M()->exe($sql);
        
                    $count++;
                }
        
                admin_log($count, L('admin_ectagmanage_common7'), L('admin_ectagmanage_common5'));
                clear_cache_files();
        
                $link[] = array('text' => L('admin_ectagmanage_common6'), 'href'=>U('index',array('act'=>'list')));
                $this->sys_msg(sprintf(L('admin_ectagmanage_control_index_batch_drop1'), $count), 0, $link);
            }
            else
            {
                $link[] = array('text' => L('admin_ectagmanage_common6'), 'href'=>U('index',array('act'=>'list')));
                $this->sys_msg(l('admin_ectagmanage_control_index_batch_drop2'), 0, $link);
            }
        }
        elseif ($_REQUEST['act'] == 'remove')
        {
            $json = new JSON;
        
            $id = intval($_GET['id']);
        
            /* 鑾峰彇鍒犻櫎鐨勬爣绛剧殑鍚嶇О */
            $tag_name = M()->getOne("SELECT tag_words FROM " .$ecs->table('ec_tag'). " WHERE tag_id = '$id'",'tag_words');
        
            $sql = "DELETE FROM " .$ecs->table('ec_tag'). " WHERE tag_id = '$id'";
            $result = M()->exe($sql);
            if ($result)
            {
                /* 绠＄悊鍛樻棩蹇 */
                admin_log(addslashes($tag_name), L('admin_ectagmanage_common7'), L('admin_ectagmanage_common5'));
        
                $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
                ec_header("Location: $url\n");
                exit;
            }
            else
            {
                make_json_error($db->error());
            }
        }
        elseif($_REQUEST['act'] == "edit_tag_name")
        {
        
            $name = json_str_iconv(trim($_POST['val']));
            $id = intval($_POST['id']);
        
            if (!$this-> tag_is_only($name, $id))
            {
                make_json_error(sprintf(L('admin_ectagmanage_common4'), $name));
            }
            else
            {
                $this->edit_tag($name, $id);
                make_json_result(stripslashes($name));
            }
        }

    }
    
    public function tag_is_only($name, $tag_id, $goods_id = '')
    {
        if(empty($goods_id))
        {
            $sql = 'SELECT goods_id FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_tag') . " WHERE tag_id = '$tag_id'";
            $row = M()->getRowSql($sql);
            $goods_id = $row['goods_id'];
        }
        $sql = 'SELECT 
                    COUNT(*) 
                FROM ' . 
                    $GLOBALS['ec_globals']['ecs']->table('ec_tag') . " 
                WHERE 
                    tag_words = '$name'" .
                    " AND goods_id = '$goods_id' 
                    AND tag_id != '$tag_id'";
        if(M()->getOne($sql,'COUNT(*)') > 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function edit_tag($name, $id, $goods_id = '')
    {
        $db_prefix=C("DB_PREFIX");
        $sql = 'UPDATE ' . $GLOBALS['ec_globals']['ecs']->table('ec_tag') . " SET tag_words = '$name'";
        if(!empty($goods_id))
        {
            $sql .= ", goods_id = '$goods_id'";
        }
        $sql .= " WHERE tag_id = '$id'";
        M()->exe($sql);
        admin_log($name, '编辑', L('admin_ectagmanage_common5'));
    }
    
    
    public function  get_tag_list()
    {
        $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 't.tag_id' : trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
    
        $sql = "SELECT COUNT(*) FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_tag');
        $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
    
        $filter = page_and_size($filter);
    
        $sql = "SELECT t.tag_id, u.user_name, t.goods_id, g.goods_name, t.tag_words ".
                "FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_tag'). " AS t ".
                "LEFT JOIN " .$GLOBALS['ec_globals']['ecs']->table('ec_users'). " AS u ON u.user_id=t.user_id ".
                "LEFT JOIN " .$GLOBALS['ec_globals']['ecs']->table('ec_goods'). " AS g ON g.goods_id=t.goods_id ".
                "ORDER by $filter[sort_by] $filter[sort_order] LIMIT ". $filter['start'] .", ". $filter['page_size'];
        $row = M()->getAll($sql);
        foreach($row as $k=>$v)
        {
            $row[$k]['tag_words'] = htmlspecialchars($v['tag_words']);
        }
    
        $arr = array(
                        'tags' => $row, 'filter' => $filter, 
                        'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
    
        return $arr;
    }

    
    public function get_tag_info($tag_id)
    {
        $sql = 'SELECT t.tag_id, t.tag_words, t.goods_id, g.goods_name FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_tag') . ' AS t' .
               ' LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . ' AS g ON t.goods_id=g.goods_id' .
               " WHERE tag_id = '$tag_id'";
        $row = M()->getRowSql($sql);
    
        return $row;
    }
  
    
}
