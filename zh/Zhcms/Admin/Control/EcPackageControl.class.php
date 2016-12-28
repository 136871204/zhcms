<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcPackageControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    //$image = new EcImage(C('ec_bgcolor'));
	    $tdb=M();
        $exc = new exchange($ecs->table("ec_goods_activity"), $tdb, 'act_id', 'act_name');
        
        if ($_REQUEST['act'] == 'add'){
            /* 组合商品 */
            $group_goods_list = array();
            $sql = "DELETE FROM " .$ecs->table('ec_package_goods') .
                    " WHERE package_id = 0 AND admin_id = '$_SESSION[uid]'";
            M()->exe($sql);
            
            /* 初始化信息 */
            $start_time = local_date('Y-m-d H:i');
            $end_time   = local_date('Y-m-d H:i', strtotime('+1 month'));
            $package     = array('package_price'=>'', 'start_time' => $start_time, 'end_time' => $end_time);
            
            $this->assign('package',      $package);
            $this->assign('ur_here',      '添加超值礼包');
            $this->assign('action_link',  array('text' => '超值礼包', 'href'=>U('index').'&act=list'));
            $this->assign('cat_list',     cat_list());
            $this->assign('brand_list',   get_brand_list());
            $this->assign('form_action',  'insert');
            //assign_query_info();
            $this->display('package_info.htm');
        }
        elseif ($_REQUEST['act'] =='insert')
        {
            $sql = "SELECT COUNT(*) ".
                   " FROM " . $ecs->table('ec_goods_activity').
                   " WHERE act_type='" . GAT_PACKAGE . "' AND act_name='" . $_POST['package_name'] . "'" ;
            if (M()->getOne($sql,'COUNT(*)'))
            {
                $this->sys_msg(sprintf('超值礼包 %s 已经存在',  $_POST['package_name']) , 1);
            }
            
            /* 将时间转换成整数 */
            $_POST['start_time'] = local_strtotime($_POST['start_time']);
            $_POST['end_time']   = local_strtotime($_POST['end_time']);
            
            /* 处理提交数据 */
            if (empty($_POST['package_price']))
            {
                $_POST['package_price'] = 0;
            }
            $info = array('package_price'=>$_POST['package_price']);
            /* 插入数据 */
            $record = array('act_name'=>$_POST['package_name'], 'act_desc'=>$_POST['desc'],
                            'act_type'=>GAT_PACKAGE, 'start_time'=>$_POST['start_time'],
                            'end_time'=>$_POST['end_time'], 'is_finished'=>0, 'ext_info'=>serialize($info));
                            
            $insert_id=M()->AutoExecute($ecs->table('ec_goods_activity'),$record,'INSERT');
            
            /* 礼包编号 */
            $package_id = $insert_id;
            
            $this->handle_packagep_goods($package_id);
            
            admin_log($_POST['package_name'],'添加','超值礼包');
            $link[] = array('text' => '返回活动列表', 'href'=>U('index').'&act=list');
            $link[] = array('text' => '继续添加新活动', 'href'=>U('index').'&act=add');
            $this->sys_msg('添加成功',0,$link);
            
        }
        /*------------------------------------------------------ */
        //-- 编辑活动
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit')
        {
        
            $package            = get_package_info($_REQUEST['id']);
            $package_goods_list = get_package_goods($_REQUEST['id']); // 礼包商品
            //p($package);die;
            $this->assign('package',           $package);
            $this->assign('ur_here',           '编辑超值礼包活动');
            $this->assign('action_link',       array('text' => '超值礼包', 'href'=>U('index').'&act=list&' . list_link_postfix()));
            $this->assign('cat_list',     cat_list());
            $this->assign('brand_list',   get_brand_list());
            $this->assign('form_action',       'update');
            $this->assign('package_goods_list', $package_goods_list);
        
            //assign_query_info();
            $this->display('package_info.htm');
        
        }
        elseif ($_REQUEST['act'] =='update')
        {
            /* 将时间转换成整数 */
            $_POST['start_time'] = local_strtotime($_POST['start_time']);
            $_POST['end_time']   = local_strtotime($_POST['end_time']);
            
            /* 处理提交数据 */
            if (empty($_POST['package_price']))
            {
                $_POST['package_price'] = 0;
            }
            
            /* 检查活动重名 */
            $sql = "SELECT COUNT(*) ".
                   " FROM " . $ecs->table('ec_goods_activity').
                   " WHERE act_type='" . GAT_PACKAGE . "' AND act_name='" . $_POST['package_name'] . "' AND act_id <> '" .  $_POST['id'] . "'" ;
            if (M()->getOne($sql,'COUNT(*)'))
            {
                $this->sys_msg(sprintf('超值礼包 %s 已经存在',  $_POST['package_name']) , 1);
            }
            $info = array('package_price'=>$_POST['package_price']);
            
            /* 更新数据 */
            $record = array('act_name' => $_POST['package_name'], 'start_time' => $_POST['start_time'], 'end_time' => $_POST['end_time'],
                            'act_desc' => $_POST['desc'], 'ext_info'=>serialize($info));
            M()->autoExecute($ecs->table('ec_goods_activity'), $record, 'UPDATE', "act_id = '" . $_POST['id'] . "' AND act_type = " . GAT_PACKAGE );
        
            admin_log($_POST['package_name'],'编辑','超值礼包');
            $link[] = array('text' => '返回活动列表', 'href'=>U('index').'&act=list&' . list_link_postfix());
            $this->sys_msg('编辑成功',0,$link);
            
        }
        
        /*------------------------------------------------------ */
        //-- 删除指定的活动
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'remove')
        {
        
            $id = intval($_GET['id']);
        
            $exc->drop($id);
        
            $sql = "DELETE FROM " .$ecs->table('ec_package_goods') .
                    " WHERE package_id='$id'";
            M()->exe($sql);
        
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
            exit;
        }

        /*------------------------------------------------------ */
        //-- 活动列表
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'list')
        {
            $this->assign('ur_here',      '超值礼包');
            $this->assign('action_link',  array('text' => '添加超值礼包', 'href'=>U('index').'&act=add'));
        
            $packages = $this->get_packagelist();
        
            $this->assign('package_list', $packages['packages']);
            $this->assign('filter',       $packages['filter']);
            $this->assign('record_count', $packages['record_count']);
            $this->assign('page_count',   $packages['page_count']);
        
            $sort_flag  = sort_flag($packages['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            $this->assign('full_page',    1);
            //assign_query_info();
            $this->display('package_list.htm');
        }
        /*------------------------------------------------------ */
        //-- 查询、翻页、排序
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'query')
        {
            $packages = $this->get_packagelist();
        
            $this->assign('package_list', $packages['packages']);
            $this->assign('filter',       $packages['filter']);
            $this->assign('record_count', $packages['record_count']);
            $this->assign('page_count',   $packages['page_count']);
        
            $sort_flag  = sort_flag($packages['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('package_list.htm'), '',
                array('filter' => $packages['filter'], 'page_count' => $packages['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 编辑活动名称
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'edit_package_name')
        {
        
            $id = intval($_POST['id']);
            $val = json_str_iconv(trim($_POST['val']));
        
            /* 检查活动重名 */
            $sql = "SELECT COUNT(*) ".
                   " FROM " . $ecs->table('ec_goods_activity').
                   " WHERE act_type='" . GAT_PACKAGE . "' AND act_name='$val' AND act_id <> '$id'" ;
            if (M()->getOne($sql,'COUNT(*)'))
            {
                make_json_error(sprintf('超值礼包 %s 已经存在',  $val));
            }
        
            $exc->edit("act_name='$val'", $id);
            make_json_result(stripslashes($val));
        }

        /*------------------------------------------------------ */
        //-- 搜索商品
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'search_goods')
        {
            $json = new JSON;
        
            $filters = $json->decode($_GET['JSON']);
        
            $arr = get_goods_list($filters);
        
            $opt = array();
            foreach ($arr AS $key => $val)
            {
                $opt[$key] = array('value' => $val['goods_id'],
                                'text' => $val['goods_name'],
                                'data' => $val['shop_price']);
        
                $opt[$key]['products'] = get_good_products($val['goods_id']);
            }
        
            make_json_result($opt);
        }
        /*------------------------------------------------------ */
        //-- 增加一个商品
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'add_package_goods')
        {
            $json = new JSON;

        
            $fittings   = $json->decode($_GET['add_ids']);
            $arguments  = $json->decode($_GET['JSON']);
            $package_id = $arguments[0];
            $number     = $arguments[1];
        
            foreach ($fittings AS $val)
            {
                $val_array = explode('_', $val);
                if (!isset($val_array[1]) || $val_array[1] <= 0)
                {
                    $val_array[1] = 0;
                }
        
                $sql = "INSERT INTO " . $ecs->table('ec_package_goods') . " (package_id, goods_id, product_id, goods_number, admin_id) " .
                        "VALUES ('$package_id', '" . $val_array[0] . "', '" . $val_array[1] . "', '$number', '$_SESSION[uid]')";
                M()->exe($sql);
            }
        
            $arr = get_package_goods($package_id);
            $opt = array();
        
            foreach ($arr AS $val)
            {
                $opt[] = array('value'      => $val['g_p'],
                                'text'      => $val['goods_name'],
                                'data'      => '');
            }
        
            clear_cache_files();
            make_json_result($opt);
        } 
        /*------------------------------------------------------ */
        //-- 删除一个商品
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'drop_package_goods')
        {
            $json = new JSON;
        
            $fittings   = $json->decode($_GET['drop_ids']);
            $arguments  = $json->decode($_GET['JSON']);
            $package_id = $arguments[0];
        
            $goods  = array();
            $g_p    = array();
            foreach ($fittings AS $val)
            {
                $val_array = explode('_', $val);
                if (isset($val_array[1]) && $val_array[1] > 0)
                {
                    $g_p['product_id'][] = $val_array[1];
                    $g_p['goods_id'][] = $val_array[0];
                }
                else
                {
                    $goods[] = $val_array[0];
                }
            }
        
            if (!empty($goods))
            {
                $sql = "DELETE FROM " .$ecs->table('ec_package_goods') .
                        " WHERE package_id='$package_id' AND " .db_create_in($goods, 'goods_id');
                if ($package_id == 0)
                {
                    $sql .= " AND admin_id = '$_SESSION[uid]'";
                }
                M()->exe($sql);
            }
        
            if (!empty($g_p))
            {
                $sql = "DELETE FROM " .$ecs->table('ec_package_goods') .
                        " WHERE package_id='$package_id' AND " .db_create_in($g_p['goods_id'], 'goods_id') . " AND " . db_create_in($g_p['product_id'], 'product_id');
                if ($package_id == 0)
                {
                    $sql .= " AND admin_id = '$_SESSION[uid]'";
                }
                M()->exe($sql);
            }
        
            $arr = get_package_goods($package_id);
            $opt = array();
        
            foreach ($arr AS $val)
            {
                $opt[] = array('value'      => $val['goods_id'],
                                'text'      => $val['goods_name'],
                                'data'      => '');
            }
        
            clear_cache_files();
            make_json_result($opt);
        }
	}
    
    /**
     * 获取活动列表
     *
     * @access  public
     *
     * @return void
     */
    public function get_packagelist()
    {
        $result = get_filter();
        if ($result === false)
        {
            /* 查询条件 */
            $filter['keywords']   = empty($_REQUEST['keywords']) ? '' : trim($_REQUEST['keywords']);
            if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
            {
                $filter['keywords'] = json_str_iconv($filter['keywords']);
            }
            $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'act_id' : trim($_REQUEST['sort_by']);
            $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
            $where = (!empty($filter['keywords'])) ? " AND act_name like '%". mysql_like_quote($filter['keywords']) ."%'" : '';

            $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') .
                   " WHERE act_type =" . GAT_PACKAGE . $where;
            $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
            $filter = page_and_size($filter);
            
            /* 获活动数据 */
            $sql = "SELECT act_id, act_name AS package_name, start_time, end_time, is_finished, ext_info ".
                   " FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') .
                   " WHERE act_type = " . GAT_PACKAGE . $where .
                   " ORDER by $filter[sort_by] $filter[sort_order] LIMIT ". $filter['start'] .", " . $filter['page_size'];
    
            $filter['keywords'] = stripslashes($filter['keywords']);
            set_filter($filter, $sql);
        }
        else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        
        $row = M()->getAll($sql);
        
        if(!empty($row))
        {
            foreach ($row AS $key => $val)
            {
                $row[$key]['start_time'] = local_date(C('ec_time_format'), $val['start_time']);
                $row[$key]['end_time']   = local_date(C('ec_time_format'), $val['end_time']);
                $info = unserialize($row[$key]['ext_info']);
                unset($row[$key]['ext_info']);
                if ($info)
                {
                    foreach ($info as $info_key => $info_val)
                    {
                        $row[$key][$info_key] = $info_val;
                    }
                }
            }
        }
        $arr = array('packages' => $row, 'filter' => $filter, 'page_count' => $filter['page_count'], 
                'record_count' => $filter['record_count']);

        return $arr;
    }
    
    /**
     * 保存某礼包的商品
     * @param   int     $package_id
     * @return  void
     */
    public function handle_packagep_goods($package_id)
    {
        $sql = "UPDATE " . $GLOBALS['ec_globals']['ecs']->table('ec_package_goods') . " SET " .
                " package_id = '$package_id' " .
                " WHERE package_id = '0'" .
                " AND admin_id = '$_SESSION[uid]'";
        M()->exe($sql);
    }

   
	
    
    
}
