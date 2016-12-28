<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcAgencyControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
        
       
       
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    //$image = new EcImage(C('ec_bgcolor'));
	    $tdb=M();
        $exc = new exchange($ecs->table('ec_agency'), $tdb, 'agency_id', 'agency_name');
        
        /*------------------------------------------------------ */
        //-- 办事处列表
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'list')
        {
            $this->assign('ur_here',      '办事处列表');
            $this->assign('action_link',  array('text' => '添加办事处', 'href' => U('index').'&act=add'));
            $this->assign('full_page',    1);
        
            $agency_list = $this -> get_agencylist();
            $this->assign('agency_list',  $agency_list['agency']);
            $this->assign('filter',       $agency_list['filter']);
            $this->assign('record_count', $agency_list['record_count']);
            $this->assign('page_count',   $agency_list['page_count']);
        
            /* 排序标记 */
            $sort_flag  = sort_flag($agency_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            //assign_query_info();
            $this->display('agency_list.htm');
        }
        /*------------------------------------------------------ */
        //-- 排序、分页、查询
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query')
        {
            $agency_list = $this -> get_agencylist();
            $this->assign('agency_list',  $agency_list['agency']);
            $this->assign('filter',       $agency_list['filter']);
            $this->assign('record_count', $agency_list['record_count']);
            $this->assign('page_count',   $agency_list['page_count']);
        
            /* 排序标记 */
            $sort_flag  = sort_flag($agency_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('agency_list.htm'), '',
                array('filter' => $agency_list['filter'], 'page_count' => $agency_list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 列表页编辑名称
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_agency_name')
        {
        
            $id     = intval($_POST['id']);
            $name   = json_str_iconv(trim($_POST['val']));
        
            /* 检查名称是否重复 */
            if ($exc->num("agency_name", $name, $id) != 0)
            {
                make_json_error(sprintf('该办事处名称已存在，请您换一个名称', $name));
            }
            else
            {
                if ($exc->edit("agency_name = '$name'", $id))
                {
                    admin_log($name, '编辑', '办事处');
                    clear_cache_files();
                    make_json_result(stripslashes($name));
                }
                else
                {
                    make_json_result(sprintf('编辑办事处名称时出错，请您再试一次', $name));
                }
            }
        }
        /*------------------------------------------------------ */
        //-- 删除办事处
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove')
        {
            $id = intval($_GET['id']);
            $name = $exc->get_name($id);
            $exc->drop($id);
            
            /* 更新管理员、配送地区、发货单、退货单和订单关联的办事处 */
            $table_array = array('user', 'ec_region', 'ec_order_info', 'ec_delivery_order', 'ec_back_order');
            foreach ($table_array as $value)
            {
                $sql = "UPDATE " . $ecs->table($value) . " SET agency_id = 0 WHERE agency_id = '$id'";
                M()->exe($sql);
            }
            
            /* 记日志 */
            admin_log($name, '删除', '办事处');
            
            /* 清除缓存 */
            clear_cache_files();
        
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
            exit;
        }
        /*------------------------------------------------------ */
        //-- 批量操作
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'batch')
        {
            /* 取得要操作的记录编号 */
            if (empty($_POST['checkboxes']))
            {
                $this->sys_msg('没有选择记录');
            }
            else
            {
                $ids = $_POST['checkboxes'];
                if (isset($_POST['remove']))
                {
                    /* 删除记录 */
                    $sql = "DELETE FROM " . $ecs->table('ec_agency') .
                            " WHERE agency_id " . db_create_in($ids);
                    M()->exe($sql);
                    
                    /* 更新管理员、配送地区、发货单、退货单和订单关联的办事处 */
                    $table_array = array('user', 'ec_region', 'ec_order_info', 'ec_delivery_order', 'ec_back_order');
                    foreach ($table_array as $value)
                    {
                        $sql = "UPDATE " . $ecs->table($value) . " SET agency_id = 0 WHERE agency_id " . db_create_in($ids) . " ";
                        M()->exe($sql);
                    }
                    
                    /* 记日志 */
                    admin_log('', '批量删除', '办事处');
        
                    /* 清除缓存 */
                    clear_cache_files();
        
                    $links = array(
                        array('href' => U('index').'&act=list' , 'text' => '返回办事处列表')
                    );
                    $this->sys_msg('批量删除成功',0,$links);
                    
                }
            }
        }
        /*------------------------------------------------------ */
        //-- 添加、编辑办事处
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit')
        {
            /* 是否添加 */
            $is_add = $_REQUEST['act'] == 'add';
            $this->assign('form_action', $is_add ? 'insert' : 'update');
            /* 初始化、取得办事处信息 */
            if ($is_add)
            {
                $agency = array(
                    'agency_id'     => 0,
                    'agency_name'   => '',
                    'agency_desc'   => '',
                    'region_list'   => array()
                );
            }
            else
            {
                if (empty($_GET['id']))
                {
                    $this->sys_msg('invalid param');
                }
                $id = $_GET['id'];
                $sql = "SELECT * FROM " . $ecs->table('ec_agency') . " WHERE agency_id = '$id'";
                $agency = M()->getRowSql($sql);
                if (empty($agency))
                {
                    $this->sys_msg('agency does not exist');
                }
                /* 关联的地区 */
                $sql = "SELECT region_id, region_name FROM " . $ecs->table('ec_region') .
                        " WHERE agency_id = '$id'";
                $agency['region_list'] = M()->getAll($sql);
            }
            /* 取得所有管理员，标注哪些是该办事处的('this')，哪些是空闲的('free')，哪些是别的办事处的('other') */
            $sql = "SELECT uid, username, CASE " .
                    "WHEN agency_id = 0 THEN 'free' " .
                    "WHEN agency_id = '$agency[agency_id]' THEN 'this' " .
                    "ELSE 'other' END " .
                    "AS type " .
                    "FROM " . $ecs->table('user');
            $agency['admin_list'] = M()->getAll($sql);

            $this->assign('agency', $agency);
            /* 取得地区 */
            $country_list = get_regions();
            $this->assign('countries', $country_list);
            
            /* 显示模板 */
            if ($is_add)
            {
                $this->assign('ur_here', '添加办事处');
            }
            else
            {
                $this->assign('ur_here', '编辑办事处');
            }
            if ($is_add)
            {
                $href = U('index').'&act=list';
            }
            else
            {
                $href = U('index').'&act=list&' . list_link_postfix();
            }
            $this->assign('action_link', array('href' => $href, 'text' => '办事处列表'));
            //assign_query_info();
            //echo 'aaa';die;
            $this->display('agency_info.htm');
        
        }
        /*------------------------------------------------------ */
        //-- 提交添加、编辑办事处
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'insert' || $_REQUEST['act'] == 'update')
        {
            /* 是否添加 */
            $is_add = $_REQUEST['act'] == 'insert';
    
            /* 提交值 */
            $agency = array(
                'agency_id'     => intval($_POST['id']),
                'agency_name'   => sub_str($_POST['agency_name'], 255, false),
                'agency_desc'   => $_POST['agency_desc']
            );
            
            /* 判断名称是否重复 */
            if (!$exc->is_only('agency_name', $agency['agency_name'], $agency['agency_id']))
            {
                $this->sys_msg('该办事处名称已存在，请您换一个名称');
            }
            
            /* 检查是否选择了地区 */
            if (empty($_POST['regions']))
            {
                $this->sys_msg('没有设置地区');
            }
            
            /* 保存办事处信息 */
            if ($is_add)
            {
                $insert_id=M()->autoExecute($ecs->table('ec_agency'), $agency, 'INSERT');
                $agency['agency_id'] = $insert_id;
            }
            else
            {
                M()->autoExecute($ecs->table('ec_agency'), $agency, 'UPDATE', "agency_id = '$agency[agency_id]'");
            }
            
            /* 更新管理员表和地区表 */
            if (!$is_add)
            {
                $sql = "UPDATE " . $ecs->table('user') . " SET agency_id = 0 WHERE agency_id = '$agency[agency_id]'";
                M()->exe($sql);
        
                $sql = "UPDATE " . $ecs->table('ec_region') . " SET agency_id = 0 WHERE agency_id = '$agency[agency_id]'";
                M()->exe($sql);
            }
            
            if (isset($_POST['admins']))
            {
                $sql = "UPDATE " . $ecs->table('user') . " SET agency_id = '$agency[agency_id]' WHERE uid " . db_create_in($_POST['admins']);
                M()->exe($sql);
            }
    
            if (isset($_POST['regions']))
            {
                $sql = "UPDATE " . $ecs->table('ec_region') . " SET agency_id = '$agency[agency_id]' WHERE region_id " . db_create_in($_POST['regions']);
                M()->exe($sql);
            }
            
            /* 记日志 */
            if ($is_add)
            {
                admin_log($agency['agency_name'], '添加', '办事处');
            }
            else
            {
                admin_log($agency['agency_name'], '修改', '办事处');
            }
            
            /* 清除缓存 */
            clear_cache_files();
    
            /* 提示信息 */
            if ($is_add)
            {
                $links = array(
                    array('href' => U('index').'&act=add', 'text' => '继续添加新的办事处'),
                    array('href' => U('index').'&act=list', 'text' => '返回办事处列表')
                );
                $this->sys_msg('添加办事处成功', 0, $links);
            }
            else
            {
                $links = array(
                    array('href' => U('index').'&act=list&' . list_link_postfix(), 'text' => '返回办事处列表')
                );
                $this->sys_msg('编辑办事处成功', 0, $links);
            }
        }
	}

    
    /**
     * 取得办事处列表
     * @return  array
     */
    function get_agencylist()
    {
        $result = get_filter();
        if ($result === false)
        {
            /* 初始化分页参数 */
            $filter = array();
            $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'agency_id' : trim($_REQUEST['sort_by']);
            $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
    
            /* 查询记录总数，计算分页数 */
            $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_agency');
            $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
            $filter = page_and_size($filter);
    
            /* 查询记录 */
            $sql = "SELECT * FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_agency') . " ORDER BY $filter[sort_by] $filter[sort_order]";
    
            set_filter($filter, $sql);
        }
        else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        
        $res = M()->selectLimit($sql, $filter['page_size'], $filter['start']);

        $arr = array();
        if(!empty($res))
        {
            foreach($res as $rows)
            {
                $arr[] = $rows;
            }
        }

    
        return array('agency' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 
        'record_count' => $filter['record_count']);



    }
    
}
