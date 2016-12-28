<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcFavourableControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    //$image = new EcImage(C('ec_bgcolor'));
	    $tdb=M();
        $exc = new exchange($ecs->table('ec_favourable_activity'), $tdb, 'act_id', 'act_name');
     
        /*------------------------------------------------------ */
        //-- 活动列表页
        /*------------------------------------------------------ */
        
        if ($_REQUEST['act'] == 'list')
        {
            /* 模板赋值 */
            $this->assign('full_page',   1);
            $this->assign('ur_here',     '优惠活动列表');
            $this->assign('action_link', array('href' => U('index').'&act=add', 'text' => '添加优惠活动'));
            
            $list = $this->favourable_list();

            $this->assign('favourable_list', $list['item']);
            $this->assign('filter',          $list['filter']);
            $this->assign('record_count',    $list['record_count']);
            $this->assign('page_count',      $list['page_count']);
        
            $sort_flag  = sort_flag($list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            /* 显示商品列表页面 */
            //assign_query_info();
            $this->display('favourable_list.htm');
    
        }
        
        /*------------------------------------------------------ */
        //-- 分页、排序、查询
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'query')
        {
            $list = $this->favourable_list();
            
            $this->assign('favourable_list', $list['item']);
            $this->assign('filter',          $list['filter']);
            $this->assign('record_count',    $list['record_count']);
            $this->assign('page_count',      $list['page_count']);
            
            $sort_flag  = sort_flag($list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
            
            make_json_result($this->fetch('favourable_list.htm'), '',
                array('filter' => $list['filter'], 'page_count' => $list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 删除
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove')
        {
        
            $id = intval($_GET['id']);
            $favourable = favourable_info($id);
            if (empty($favourable))
            {
                $this->make_json_error('您要操作的优惠活动不存在');
            }
            $name = $favourable['act_name'];
            $exc->drop($id);
        
            /* 记日志 */
            admin_log($name, '删除', '优惠活动');
        
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
                /* 检查权限 */
        
                $ids = $_POST['checkboxes'];
        
                if (isset($_POST['drop']))
                {
                    /* 删除记录 */
                    $sql = "DELETE FROM " . $ecs->table('ec_favourable_activity') .
                            " WHERE act_id " . db_create_in($ids);
                    M()->exe($sql);
        
                    /* 记日志 */
                    admin_log('', '批量删除', '优惠活动');
        
                    /* 清除缓存 */
                    clear_cache_files();
        
                    $links[] = array('text' => '返回优惠活动列表', 'href' => U('index').'&act=list&' . list_link_postfix());
                    $this->sys_msg('批量删除成功', 0, $links);
                }
            }
        }

        /*------------------------------------------------------ */
        //-- 修改排序
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_sort_order')
        {
            
            $id  = intval($_POST['id']);
            $val = intval($_POST['val']);
        
            $sql = "UPDATE " . $ecs->table('ec_favourable_activity') .
                    " SET sort_order = '$val'" .
                    " WHERE act_id = '$id' LIMIT 1";
            M()->exe($sql);
        
            make_json_result($val);
        }


        /*------------------------------------------------------ */
        //-- 添加、编辑
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit')
        {
            /* 是否添加 */
            $is_add = $_REQUEST['act'] == 'add';
            $this->assign('form_action', $is_add ? 'insert' : 'update');
        
            /* 初始化、取得优惠活动信息 */
            if ($is_add)
            {
                $favourable = array(
                    'act_id'        => 0,
                    'act_name'      => '',
                    'start_time'    => date('Y-m-d', time() + 86400),
                    'end_time'      => date('Y-m-d', time() + 4 * 86400),
                    'user_rank'     => '',
                    'act_range'     => FAR_ALL,
                    'act_range_ext' => '',
                    'min_amount'    => 0,
                    'max_amount'    => 0,
                    'act_type'      => FAT_GOODS,
                    'act_type_ext'  => 0,
                    'gift'          => array()
                );
            }
            else
            {
                if (empty($_GET['id']))
                {
                    $this->sys_msg('参数错误');
                }
                $id = intval($_GET['id']);
                $favourable = favourable_info($id);
                if (empty($favourable))
                {
                    $this->sys_msg('您要操作的优惠活动不存在');
                }
            }
            $this->assign('favourable', $favourable);
            
            /* 取得用户等级 */
            $user_rank_list = array();
            $user_rank_list[] = array(
                'rank_id'   => 0,
                'rank_name' => '非会员',
                'checked'   => strpos(',' . $favourable['user_rank'] . ',', ',0,') !== false
            );
            $sql = "SELECT rank_id, rank_name FROM " . $ecs->table('ec_user_rank');
            $res = M()->query($sql);
            if(!empty($res))
            {
                foreach($res as $row)
                {
                    $row['checked'] = strpos(',' . $favourable['user_rank'] . ',', ',' . $row['rank_id']. ',') !== false;
                    $user_rank_list[] = $row;
                }
            }
            
            $this->assign('user_rank_list', $user_rank_list);
            /* 取得优惠范围 */
            $act_range_ext = array();
            if ($favourable['act_range'] != FAR_ALL && !empty($favourable['act_range_ext']))
            {
                if ($favourable['act_range'] == FAR_CATEGORY)
                {
                    $sql = "SELECT cat_id AS id, cat_name AS name FROM " . $ecs->table('ec_category') .
                        " WHERE cat_id " . db_create_in($favourable['act_range_ext']);
                }
                elseif ($favourable['act_range'] == FAR_BRAND)
                {
                    $sql = "SELECT brand_id AS id, brand_name AS name FROM " . $ecs->table('ec_brand') .
                        " WHERE brand_id " . db_create_in($favourable['act_range_ext']);
                }
                else
                {
                    $sql = "SELECT goods_id AS id, goods_name AS name FROM " . $ecs->table('ec_goods') .
                        " WHERE goods_id " . db_create_in($favourable['act_range_ext']);
                }
                $act_range_ext = M()->getAll($sql);
            }
            $this->assign('act_range_ext', $act_range_ext);
            
            /* 赋值时间控件的语言 */
            $this->assign('cfg_lang',$_SESSION['language']);
 
            /* 显示模板 */
            if ($is_add)
            {
                $this->assign('ur_here', '添加优惠活动');
            }
            else
            {
                $this->assign('ur_here', '编辑优惠活动');
            }
            $href = U('index').'&act=list';
            if (!$is_add)
            {
                $href .= '&' . list_link_postfix();
            }
            $this->assign('action_link', array('href' => $href, 'text' => '优惠活动列表'));
            //assign_query_info();
            $this->display('favourable_info.htm');
            //p($act_range_ext);die;
        }
        /*------------------------------------------------------ */
        //-- 添加、编辑后提交
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'insert' || $_REQUEST['act'] == 'update')
        {
            /* 是否添加 */
            $is_add = $_REQUEST['act'] == 'insert';
            /* 检查名称是否重复 */
            $act_name = sub_str($_POST['act_name'], 255, false);
            if (!$exc->is_only('act_name', $act_name, intval($_POST['id'])))
            {
                $this->sys_msg('该优惠活动名称已存在，请您换一个');
            }
            
            /* 检查享受优惠的会员等级 */
            if (!isset($_POST['user_rank']))
            {
                $this->sys_msg('请设置享受优惠的会员等级');
            }
        
            /* 检查优惠范围扩展信息 */
            if (intval($_POST['act_range']) > 0 && !isset($_POST['act_range_ext']))
            {
                $this->sys_msg('请设置优惠范围');
            }
            /* 检查金额上下限 */
            $min_amount = floatval($_POST['min_amount']) >= 0 ? floatval($_POST['min_amount']) : 0;
            $max_amount = floatval($_POST['max_amount']) >= 0 ? floatval($_POST['max_amount']) : 0;
            if ($max_amount > 0 && $min_amount > $max_amount)
            {
                $this->sys_msg('金额下限不能大于金额上限');
            }
            /* 取得赠品 */
            $gift = array();
            if (intval($_POST['act_type']) == FAT_GOODS && isset($_POST['gift_id']))
            {
                foreach ($_POST['gift_id'] as $key => $id)
                {
                    $gift[] = array('id' => $id, 'name' => $_POST['gift_name'][$key], 'price' => $_POST['gift_price'][$key]);
                }
            }
            
            /* 提交值 */
            $favourable = array(
                'act_id'        => intval($_POST['id']),
                'act_name'      => $act_name,
                'start_time'    => local_strtotime($_POST['start_time']),
                'end_time'      => local_strtotime($_POST['end_time']),
                'user_rank'     => isset($_POST['user_rank']) ? join(',', $_POST['user_rank']) : '0',
                'act_range'     => intval($_POST['act_range']),
                'act_range_ext' => intval($_POST['act_range']) == 0 ? '' : join(',', $_POST['act_range_ext']),
                'min_amount'    => floatval($_POST['min_amount']),
                'max_amount'    => floatval($_POST['max_amount']),
                'act_type'      => intval($_POST['act_type']),
                'act_type_ext'  => floatval($_POST['act_type_ext']),
                'gift'          => serialize($gift)
            );
            //p($favourable);die;
            if ($favourable['act_type'] == FAT_GOODS)
            {
                $favourable['act_type_ext'] = round($favourable['act_type_ext']);
            }
    
            /* 保存数据 */
            if ($is_add)
            {
                $insert_id=M()->autoExecute($ecs->table('ec_favourable_activity'), $favourable, 'INSERT');
                $favourable['act_id'] = $insert_id;
            }
            else
            {
                M()->autoExecute($ecs->table('ec_favourable_activity'), $favourable, 'UPDATE', "act_id = '$favourable[act_id]'");
            }
            /* 记日志 */
            if ($is_add)
            {
                admin_log($favourable['act_name'], '添加', '优惠活动');
            }
            else
            {
                admin_log($favourable['act_name'], '编辑', '优惠活动');
            }
            /* 清除缓存 */
            clear_cache_files();
        
            /* 提示信息 */
            if ($is_add)
            {
                $links = array(
                    array('href' => U('index').'&act=add', 'text' => '继续添加优惠活动'),
                    array('href' => U('index').'&act=list', 'text' => '返回优惠活动列表')
                );
                $this->sys_msg('添加优惠活动成功', 0, $links);
            }
            else
            {
                $links = array(
                    array('href' => U('index').'&act=list&' . list_link_postfix(), 'text' => '返回优惠活动列表')
                );
                $this->sys_msg('编辑优惠活动成功', 0, $links);
            }

        }
        /*------------------------------------------------------ */
        //-- 搜索商品
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'search')
        {
            $json   = new JSON;
            $filter = $json->decode($_GET['JSON']);
            $filter->keyword = json_str_iconv($filter->keyword);
            if ($filter->act_range == FAR_ALL)
            {
                $arr[0] = array(
                    'id'   => 0,
                    'name' => '优惠范围是全部商品，不需要此操作'
                );
            }
            elseif ($filter->act_range == FAR_CATEGORY)
            {
                $sql = "SELECT cat_id AS id, cat_name AS name FROM " . $ecs->table('ec_category') .
                    " WHERE cat_name LIKE '%" . mysql_like_quote($filter->keyword) . "%' LIMIT 50";
                $arr = M()->getAll($sql);
            }
            elseif ($filter->act_range == FAR_BRAND)
            {
                $sql = "SELECT brand_id AS id, brand_name AS name FROM " . $ecs->table('ec_brand') .
                    " WHERE brand_name LIKE '%" . mysql_like_quote($filter->keyword) . "%' LIMIT 50";
                $arr = M()->getAll($sql);
            }
            else
            {
                $sql = "SELECT goods_id AS id, goods_name AS name FROM " . $ecs->table('ec_goods') .
                    " WHERE goods_name LIKE '%" . mysql_like_quote($filter->keyword) . "%'" .
                    " OR goods_sn LIKE '%" . mysql_like_quote($filter->keyword) . "%' LIMIT 50";
                $arr = M()->getAll($sql);
            }
            if (empty($arr))
            {
                $arr = array(0 => array(
                    'id'   => 0,
                    'name' => '没有找到相应记录，请重新搜索'
                ));
            }
            make_json_result($arr);
        }

	}
    
    /*
     * 取得优惠活动列表
     * @return   array
     */
    public function favourable_list()
    {
        $result = get_filter();
        if ($result === false)
        {
            /* 过滤条件 */
            $filter['keyword']    = empty($_REQUEST['keyword']) ? '' : trim($_REQUEST['keyword']);
            if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
            {
                $filter['keyword'] = json_str_iconv($filter['keyword']);
            }
            $filter['is_going']   = empty($_REQUEST['is_going']) ? 0 : 1;
            $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'act_id' : trim($_REQUEST['sort_by']);
            $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
    
            $where = "";
            if (!empty($filter['keyword']))
            {
                $where .= " AND act_name LIKE '%" . mysql_like_quote($filter['keyword']) . "%'";
            }
            if ($filter['is_going'])
            {
                $now = gmtime();
                $where .= " AND start_time <= '$now' AND end_time >= '$now' ";
            }
    
            $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_favourable_activity') .
                    " WHERE 1 $where";
            $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
    
            /* 分页大小 */
            $filter = page_and_size($filter);
    
            /* 查询 */
            $sql = "SELECT * ".
                    "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_favourable_activity') .
                    " WHERE 1 $where ".
                    " ORDER BY $filter[sort_by] $filter[sort_order] ".
                    " LIMIT ". $filter['start'] .", $filter[page_size]";
    
            $filter['keyword'] = stripslashes($filter['keyword']);
            set_filter($filter, $sql);
        }
        else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        $res = M()->query($sql);
    
        $list = array();
        if(!empty($res))
        {
            foreach($res as $row)
            {
                $row['start_time']  = local_date('Y-m-d H:i', $row['start_time']);
                $row['end_time']    = local_date('Y-m-d H:i', $row['end_time']);
        
                $list[] = $row;
            }
        }
    
        return array('item' => $list, 'filter' => $filter, 'page_count' => $filter['page_count'], 
        'record_count' => $filter['record_count']);
    }
}
