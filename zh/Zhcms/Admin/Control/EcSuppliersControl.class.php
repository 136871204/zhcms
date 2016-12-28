<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcSuppliersControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    //$image = new EcImage(C('ec_bgcolor'));
	    /*$tdb=M();
        $exc = new exchange($ecs->table("ec_pack"), $tdb, 'pack_id', 'pack_name');*/
        define('SUPPLIERS_ACTION_LIST', 'delivery_view,back_view');
        if ($_REQUEST['act'] == 'list'){
            /* 查询 */
            $result = $this -> suppliers_list();
        
            /* 模板赋值 */
            $this->assign('ur_here', '供货商列表'); // 当前导航
            $this->assign('action_link', array('href' => U('index').'&act=add', 'text' => '添加供货商'));
        
            $this->assign('full_page',        1); // 翻页参数
        
            $this->assign('suppliers_list',    $result['result']);
            $this->assign('filter',       $result['filter']);
            $this->assign('record_count', $result['record_count']);
            $this->assign('page_count',   $result['page_count']);
            $this->assign('sort_suppliers_id', '<img src="'.__PUBLIC__.'/ec/images/sort_desc.gif">');
        
            /* 显示模板 */
            //assign_query_info();
            $this->display('suppliers_list.htm');
        }
        
        /*------------------------------------------------------ */
        //-- 排序、分页、查询
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query')
        {
        
            $result = $this -> suppliers_list();
        
            $this->assign('suppliers_list',    $result['result']);
            $this->assign('filter',       $result['filter']);
            $this->assign('record_count', $result['record_count']);
            $this->assign('page_count',   $result['page_count']);
        
            /* 排序标记 */
            $sort_flag  = sort_flag($result['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('suppliers_list.htm'), '',
                array('filter' => $result['filter'], 'page_count' => $result['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 列表页编辑名称
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_suppliers_name')
        {
            $id     = intval($_POST['id']);
            $name   = json_str_iconv(trim($_POST['val']));
            
            /* 判断名称是否重复 */
            $sql = "SELECT suppliers_id
                    FROM " . $ecs->table('ec_suppliers') . "
                    WHERE suppliers_name = '$name'
                    AND suppliers_id <> '$id' ";
            if (M()->getOne($sql,'suppliers_id'))
            {
                make_json_error(sprintf('该供货商名称已存在，请您换一个名称', $name));
            }
            else
            {
                /* 保存供货商信息 */
                $sql = "UPDATE " . $ecs->table('ec_suppliers') . "
                        SET suppliers_name = '$name'
                        WHERE suppliers_id = '$id'";
                if ($result = M()->exe($sql))
                {
                    /* 记日志 */
                    admin_log($name, '编辑', '供应商');
        
                    clear_cache_files();
        
                    make_json_result(stripslashes($name));
                }else
                {
                    make_json_result(sprintf('编辑供应商名称时出错，请您再试一次', $name));
                }
            }
        }
        /*------------------------------------------------------ */
        //-- 删除供货商
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove')
        {
            $id = intval($_REQUEST['id']);
            $sql = "SELECT *
                    FROM " . $ecs->table('ec_suppliers') . "
                    WHERE suppliers_id = '$id'";
            $suppliers = M()->getRowSql($sql);
           
            if ($suppliers['suppliers_id'])
            {
                /* 判断供货商是否存在订单 */
                $sql = "SELECT COUNT(*)
                        FROM " . $ecs->table('ec_order_info') . "AS O, " . 
                                $ecs->table('ec_order_goods') . " AS OG, " . 
                                $ecs->table('ec_goods') . " AS G
                        WHERE O.order_id = OG.order_id
                        AND OG.goods_id = G.goods_id
                        AND G.suppliers_id = '$id'";
                $order_exists = M()->getOne($sql, 'COUNT(*)');
                if ($order_exists > 0)
                {
                    $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
                    ec_header("Location: $url\n");
                    exit;
                }
                
                /* 判断供货商是否存在商品 */
                $sql = "SELECT COUNT(*)
                        FROM " . $ecs->table('ec_goods') . "AS G
                        WHERE G.suppliers_id = '$id'";
                $goods_exists = M()->getOne($sql, 'COUNT(*)');
                if ($goods_exists > 0)
                {
                    $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
                    ec_header("Location: $url\n");
                    exit;
                }
                
                $sql = "DELETE FROM " . $ecs->table('ec_suppliers') . "
                    WHERE suppliers_id = '$id'";
                M()->exe($sql);
                
                /* 删除管理员、发货单关联、退货单关联和订单关联的供货商 */
                $sql = "UPDATE " . $ecs->table('user') . " SET suppliers_id = 0, action_list = '" . SUPPLIERS_ACTION_LIST . "' WHERE suppliers_id = '" . $suppliers['suppliers_id'] . "'";
                M()->exe($sql);
                 //p($sql);die;
                $table_array = array( 'ec_delivery_order', 'ec_back_order');
                foreach ($table_array as $value)
                {
                    $sql = "DELETE FROM " . $ecs->table($value) . " WHERE suppliers_id = '$id'";
                    M()->exe($sql);
                }
                /* 记日志 */
                admin_log($suppliers['suppliers_name'], '删除', '供应商');
        
                /* 清除缓存 */
                clear_cache_files();
                
            }
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
            ec_header("Location: $url\n");
        
            exit;
        }
        
        /*------------------------------------------------------ */
        //-- 修改供货商状态
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'is_check')
        {
        
            $id = intval($_REQUEST['id']);
            $sql = "SELECT suppliers_id, is_check
                    FROM " . $ecs->table('ec_suppliers') . "
                    WHERE suppliers_id = '$id'";
            $suppliers = M()->getRowSql($sql);
        
            if ($suppliers['suppliers_id'])
            {
                $_suppliers['is_check'] = empty($suppliers['is_check']) ? 1 : 0;
                M()->autoExecute($ecs->table('ec_suppliers'), $_suppliers, '', "suppliers_id = '$id'");
                clear_cache_files();
                make_json_result($_suppliers['is_check']);
            }
        
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
                $this->sys_msg('没有选择任何记录');
            }
            else
            {
                $ids = $_POST['checkboxes'];
                if (isset($_POST['remove']))
                {
                    $sql = "SELECT *
                            FROM " . $ecs->table('ec_suppliers') . "
                            WHERE suppliers_id " . db_create_in($ids);
                    $suppliers = M()->getAll($sql);
                    
                    if(!empty($suppliers))
                    {
                        foreach ($suppliers as $key => $value)
                        {
                            /* 判断供货商是否存在订单 */
                            $sql = "SELECT COUNT(*)
                                    FROM " . $ecs->table('ec_order_info') . "AS O, " . 
                                            $ecs->table('ec_order_goods') . " AS OG, " . 
                                            $ecs->table('ec_goods') . " AS G
                                    WHERE O.order_id = OG.order_id
                                    AND OG.goods_id = G.goods_id
                                    AND G.suppliers_id = '" . $value['suppliers_id'] . "'";
                            $order_exists = M()->getOne($sql, 'COUNT(*)');
                            if ($order_exists > 0)
                            {
                                unset($suppliers[$key]);
                            }
                            /* 判断供货商是否存在商品 */
                            $sql = "SELECT COUNT(*)
                                    FROM " . $ecs->table('ec_goods') . "AS G
                                    WHERE G.suppliers_id = '" . $value['suppliers_id'] . "'";
                            $goods_exists = M()->getOne($sql, 'COUNT(*)');
                            if ($goods_exists > 0)
                            {
                                unset($suppliers[$key]);
                            }
                            
                        }
                    }
                    if (empty($suppliers))
                    {
                        $this->sys_msg('批量删除失败');
                    }
                    $sql = "DELETE FROM " . $ecs->table('ec_suppliers') . "
                        WHERE suppliers_id " . db_create_in($ids);
                    M()->exe($sql);
                    
                    /* 更新管理员、发货单关联、退货单关联和订单关联的供货商 */
                    $sql = "UPDATE " . $ecs->table('user') . " SET suppliers_id = 0, action_list = '" . SUPPLIERS_ACTION_LIST . "' WHERE suppliers_id " . db_create_in($ids) . " ";
                    M()->exe($sql);
                    
                    $table_array = array('ec_delivery_order', 'ec_back_order');
                    foreach ($table_array as $value)
                    {
                        $sql = "DELETE FROM " . $ecs->table($value) . " WHERE suppliers_id " . db_create_in($ids) . " ";
                        M()->exe($sql);
                    }
                    /* 记日志 */
                    $suppliers_names = '';
                    foreach ($suppliers as $value)
                    {
                        $suppliers_names .= $value['suppliers_name'] . '|';
                    }
                    admin_log($suppliers_names, '删除', '供货商');
        
                    /* 清除缓存 */
                    clear_cache_files();
                    
                    $links[] = array('href' => U('index').'&act=list', 'text' => '返回供货商列表');
                    $this->sys_msg('批量删除成功', 0, $links);
                    //$this->sys_msg('批量删除成功');
                }
            }
        }
        /*------------------------------------------------------ */
        //-- 添加、编辑供货商
        /*------------------------------------------------------ */
        elseif (in_array($_REQUEST['act'], array('add', 'edit')))
        {
            if ($_REQUEST['act'] == 'add')
            {
                $suppliers = array();

                /* 取得所有管理员，*/
                /* 标注哪些是该供货商的('this')，哪些是空闲的('free')，哪些是别的供货商的('other') */
                /* 排除是办事处的管理员 */
                $sql = "SELECT uid, username, CASE
                        WHEN suppliers_id = 0 THEN 'free'
                        ELSE 'other' END AS type
                        FROM " . $ecs->table('user') . "
                        WHERE agency_id = 0
                        AND action_list <> 'all'";
                $suppliers['admin_list'] = M()->getAll($sql);
                
                $this->assign('ur_here', '添加供货商');
                $this->assign('action_link', array('href' => U('index').'&act=list', 'text' => '添加供货商'));
        
                $this->assign('form_action', 'insert');
                $this->assign('suppliers', $suppliers);
        
                //assign_query_info();
        
                $this->display('suppliers_info.htm');

            }
            elseif ($_REQUEST['act'] == 'edit')
            {
                $suppliers = array();
    
                /* 取得供货商信息 */
                $id = $_REQUEST['id'];
                $sql = "SELECT * FROM " . $ecs->table('ec_suppliers') . " WHERE suppliers_id = '$id'";
                $suppliers = M()->getRowSql($sql);
                if (count($suppliers) <= 0)
                {
                    $this->sys_msg('suppliers does not exist');
                }
                
                /* 取得所有管理员，*/
                /* 标注哪些是该供货商的('this')，哪些是空闲的('free')，哪些是别的供货商的('other') */
                /* 排除是办事处的管理员 */
                $sql = "SELECT uid, username, CASE
                        WHEN suppliers_id = '$id' THEN 'this'
                        WHEN suppliers_id = 0 THEN 'free'
                        ELSE 'other' END AS type
                        FROM " . $ecs->table('user') . "
                        WHERE agency_id = 0
                        AND action_list <> 'all'";
                $suppliers['admin_list'] = M()->getAll($sql);

                $this->assign('ur_here', '编辑供货商');
                $this->assign('action_link', array('href' => U('index').'&act=list', 'text' => '供货商列表'));
        
                $this->assign('form_action', 'update');
                $this->assign('suppliers', $suppliers);
        
                //assign_query_info();
        
                $this->display('suppliers_info.htm');
        
                
            }
        }
        /*------------------------------------------------------ */
        //-- 提交添加、编辑供货商
        /*------------------------------------------------------ */
        elseif (in_array($_REQUEST['act'], array('insert', 'update')))
        {
            if ($_REQUEST['act'] == 'insert')
            {
                /* 提交值 */
                $suppliers = array('suppliers_name'   => trim($_POST['suppliers_name']),
                                   'suppliers_desc'   => trim($_POST['suppliers_desc']),
                                   'parent_id'        => 0
                                   );
                /* 判断名称是否重复 */
                $sql = "SELECT suppliers_id
                        FROM " . $ecs->table('ec_suppliers') . "
                        WHERE suppliers_name = '" . $suppliers['suppliers_name'] . "' ";
                if (M()->getOne($sql,'suppliers_id'))
                {
                    $this->sys_msg('该供货商名称已存在，请您换一个名称');
                }
                $insert_id=M()->autoExecute($ecs->table('ec_suppliers'), $suppliers, 'INSERT');
                $suppliers['suppliers_id'] = $insert_id;
                
                if (isset($_POST['admins']))
                {
                    $sql = "UPDATE " . $ecs->table('user') . " SET suppliers_id = '" . $suppliers['suppliers_id'] . "', action_list = '" . SUPPLIERS_ACTION_LIST . "' WHERE uid " . db_create_in($_POST['admins']);
                    M()->exe($sql);
                }
                /* 记日志 */
                admin_log($suppliers['suppliers_name'], '添加', '供货商');
        
                /* 清除缓存 */
                clear_cache_files();
        
                /* 提示信息 */
                $links = array(array('href' => U('index').'&act=add',  'text' => '继续添加供货商'),
                               array('href' => U('index').'&act=list', 'text' => '返回供货商列表')
                               );
                $this->sys_msg('添加供货商成功', 0, $links);
            }
            if ($_REQUEST['act'] == 'update')
            {
                /* 提交值 */
                $suppliers = array('id'   => trim($_POST['id']));
        
                $suppliers['new'] = array('suppliers_name'   => trim($_POST['suppliers_name']),
                                   'suppliers_desc'   => trim($_POST['suppliers_desc'])
                                   );
                /* 取得供货商信息 */
                $sql = "SELECT * FROM " . $ecs->table('ec_suppliers') . " WHERE suppliers_id = '" . $suppliers['id'] . "'";
                $suppliers['old'] = M()->getRowSql($sql);
                if (empty($suppliers['old']['suppliers_id']))
                {
                    $this->sys_msg('suppliers does not exist');
                }
                
                /* 判断名称是否重复 */
                $sql = "SELECT suppliers_id
                        FROM " . $ecs->table('ec_suppliers') . "
                        WHERE suppliers_name = '" . $suppliers['new']['suppliers_name'] . "'
                        AND suppliers_id <> '" . $suppliers['id'] . "'";
                if (M()->getOne($sql,'suppliers_id'))
                {
                    $this->sys_msg('该供货商名称已存在，请您换一个名称');
                }
                /* 保存供货商信息 */
                M()->autoExecute($ecs->table('ec_suppliers'), $suppliers['new'], 'UPDATE', "suppliers_id = '" . $suppliers['id'] . "'");
                /* 清空供货商的管理员 */
                $sql = "UPDATE " . $ecs->table('user') . " SET suppliers_id = 0, action_list = '" . SUPPLIERS_ACTION_LIST . "' WHERE suppliers_id = '" . $suppliers['id'] . "'";
                M()->exe($sql);
                
                /* 添加供货商的管理员 */
                if (isset($_POST['admins']))
                {
                    $sql = "UPDATE " . $ecs->table('user') . " SET suppliers_id = '" . $suppliers['old']['suppliers_id'] . "' WHERE uid " . db_create_in($_POST['admins']);
                    M()->exe($sql);
                }
                
                /* 记日志 */
                admin_log($suppliers['old']['suppliers_name'], '编辑', '供货商');
        
                /* 清除缓存 */
                clear_cache_files();
        
                /* 提示信息 */
                $links[] = array('href' => U('index').'&act=list', 'text' => '返回供货商列表');
                $this->sys_msg('编辑供货商成功', 0, $links);
            }
        }
	}
    
    /**
     *  获取供应商列表信息
     *
     * @access  public
     * @param
     *
     * @return void
     */
    public function suppliers_list()
    {
        $result = get_filter();
        if ($result === false)
        {
            $aiax = isset($_GET['is_ajax']) ? $_GET['is_ajax'] : 0;

            /* 过滤信息 */
            $filter['sort_by'] = empty($_REQUEST['sort_by']) ? 'suppliers_id' : trim($_REQUEST['sort_by']);
            $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'ASC' : trim($_REQUEST['sort_order']);
    
            $where = 'WHERE 1 ';
    
            /* 分页大小 */
            $filter['page'] = empty($_REQUEST['page']) || (intval($_REQUEST['page']) <= 0) ? 1 : intval($_REQUEST['page']);
    
            if (isset($_REQUEST['page_size']) && intval($_REQUEST['page_size']) > 0)
            {
                $filter['page_size'] = intval($_REQUEST['page_size']);
            }
            elseif (isset($_COOKIE['ZHCMS']['page_size']) && intval($_COOKIE['ZHCMS']['page_size']) > 0)
            {
                $filter['page_size'] = intval($_COOKIE['ZHCMS']['page_size']);
            }
            else
            {
                $filter['page_size'] = 15;
            }
            /* 记录总数 */
            $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_suppliers') . $where;
            $filter['record_count']   = M()->getOne($sql,'COUNT(*)');
            $filter['page_count']     = $filter['record_count'] > 0 ? ceil($filter['record_count'] / $filter['page_size']) : 1;
            
            /* 查询 */
            $sql = "SELECT suppliers_id, suppliers_name, suppliers_desc, is_check
                    FROM " . $GLOBALS['ec_globals']['ecs']->table("ec_suppliers") . "
                    $where
                    ORDER BY " . $filter['sort_by'] . " " . $filter['sort_order']. "
                    LIMIT " . ($filter['page'] - 1) * $filter['page_size'] . ", " . $filter['page_size'] . " ";
    
            set_filter($filter, $sql);

        }
        else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        $row = M()->getAll($sql);

        $arr = array('result' => $row, 'filter' => $filter, 'page_count' => $filter['page_count'], 
                    'record_count' => $filter['record_count']);
    
        return $arr;
    
    }
    
    
}
