<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcWholesaleControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	   $ecs=$GLOBALS['ec_globals']['ecs'];
	    /*
	    $image = new EcImage(C('ec_bgcolor'));
	    $tdb=M();
        $exc = new exchange($ecs->table("ec_pack"), $tdb, 'pack_id', 'pack_name');*/
        
        if ($_REQUEST['act'] == 'list'){
            /* 模板赋值 */
            $this->assign('full_page',   1);
            $this->assign('ur_here',     '批发方案列表');
            $this->assign('action_link', array('href' => U('index').'&act=add', 'text' => '添加批发方案'));
            $this->assign('action_link2',array('href' => U('index').'&act=batch_add', 'text' => '批量添加批发方案'));
        
            $list = $this -> wholesale_list();
        
            $this->assign('wholesale_list',  $list['item']);
            $this->assign('filter',          $list['filter']);
            $this->assign('record_count',    $list['record_count']);
            $this->assign('page_count',      $list['page_count']);
        
            $sort_flag  = sort_flag($list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            /* 显示商品列表页面 */
            //assign_query_info();
            $this->display('wholesale_list.htm');
        }
        /*------------------------------------------------------ */
        //-- 分页、排序、查询
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'query')
        {
            $list = $this->wholesale_list();
        
            $this->assign('wholesale_list',  $list['item']);
            $this->assign('filter',          $list['filter']);
            $this->assign('record_count',    $list['record_count']);
            $this->assign('page_count',      $list['page_count']);
        
            $sort_flag  = sort_flag($list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('wholesale_list.htm'), '',
                array('filter' => $list['filter'], 'page_count' => $list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 删除
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove')
        {
        
            $id = intval($_GET['id']);
            $wholesale = wholesale_info($id);
            if (empty($wholesale))
            {
                make_json_error('您要操作的批发方案不存在');
            }
            $name = $wholesale['goods_name'];
        
            /* 删除记录 */
            $sql = "DELETE FROM " . $ecs->table('ec_wholesale') .
                    " WHERE act_id = '$id' LIMIT 1";
            M()->exe($sql);
        
            /* 记日志 */
            admin_log($name, '删除', '批发方案');
        
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
        
                if (isset($_POST['drop']))
                {
                    /* 删除记录 */
                    $sql = "DELETE FROM " . $ecs->table('ec_wholesale') .
                            " WHERE act_id " . db_create_in($ids);
                    M()->exe($sql);
        
                    /* 记日志 */
                    admin_log('', '批量删除', '批发方案');
        
                    /* 清除缓存 */
                    clear_cache_files();
        
                    $links[] = array('text' => '返回批发方案列表', 'href' => U('index').'&act=list&' . list_link_postfix());
                    $this->sys_msg('批量删除成功', 0, $links);
                }
            }
        }

        /*------------------------------------------------------ */
        //-- 修改排序
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'toggle_enabled')
        {
        
            $id  = intval($_POST['id']);
            $val = intval($_POST['val']);
        
            $sql = "UPDATE " . $ecs->table('ec_wholesale') .
                    " SET enabled = '$val'" .
                    " WHERE act_id = '$id' LIMIT 1";
            M()->exe($sql);
        
            make_json_result($val);
        }
        /*------------------------------------------------------ */
        //-- 批量添加
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'batch_add')
        {
            $this->assign('form_action', 'batch_add_insert');
            
            /* 初始化、取得批发活动信息 */
            $wholesale = array(
                'act_id'        => 0,
                'goods_id'      => 0,
                'goods_name'    => '请先搜索商品',
                'enabled'       => '1',
                'price_list'    => array()
            );
            $wholesale['price_list'] = array(
                array(
                    'attr'    => array(),
                    'qp_list' => array(
                        array('quantity' => 0, 'price' => 0)
                    )
                )
            );
            $this->assign('wholesale', $wholesale);
            
            /* 取得用户等级 */
            $user_rank_list = array();
            $sql = "SELECT rank_id, rank_name FROM " . $ecs->table('ec_user_rank') .
                    " ORDER BY special_rank, min_points";
            $res = M()->query($sql);
            if(!empty($res))
            {
                foreach($res as $rank)
                {
                    if (!empty($wholesale['rank_ids']) && strpos($wholesale['rank_ids'], $rank['rank_id']) !== false)
                    {
                        $rank['checked'] = 1;
                    }
                    $user_rank_list[] = $rank;
                }
            }
            $this->assign('user_rank_list', $user_rank_list);

            $this->assign('cat_list', cat_list());
            $this->assign('brand_list',   get_brand_list());
            
            /* 显示模板 */
            $this->assign('ur_here', '添加批发方案');
        
            $href = U('index').'&act=list';
            $this->assign('action_link', array('href' => $href, 'text' => '批发方案列表'));
            //assign_query_info();
        
            $this->display('wholesale_batch_info.htm');
        }
        /*------------------------------------------------------ */
        //-- 批量添加入库
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'batch_add_insert')
        {
            /* 取得goods */
            $_POST['dst_goods_lists'] = array();
            if (!empty($_POST['goods_ids']))
            {
                $_POST['dst_goods_lists'] = explode(',', $_POST['goods_ids']);
            }
            if (!empty($_POST['dst_goods_lists']) && is_array($_POST['dst_goods_lists']))
            {
                foreach ($_POST['dst_goods_lists'] as $dst_key => $dst_goods)
                {
                    $dst_goods = intval($dst_goods);
                    if ($dst_goods == 0)
                    {
                        unset($_POST['dst_goods_lists'][$dst_key]);
                    }
                }
            }
            else if (!empty($_POST['dst_goods_lists']))
            {
                $_POST['dst_goods_lists'] = array(intval($_POST['dst_goods_lists']));
            }
            else
            {
                $this->sys_msg('请先搜索商品');
            }
            $dst_goods = implode(',', $_POST['dst_goods_lists']);
            $sql = "SELECT goods_name, goods_id FROM " . $ecs->table('ec_goods') .
                    " WHERE goods_id IN ($dst_goods)";
            $goods_name = M()->getAll($sql);
            if (!empty($goods_name))
            {
                $goods_rebulid = array();
                foreach ($goods_name as $goods_value)
                {
                    $goods_rebulid[$goods_value['goods_id']] = addslashes($goods_value['goods_name']);
                }
            }
            if (empty($goods_rebulid))
            {
                $this->sys_msg('invalid goods id: All');
            }
            /* 会员等级 */
            if (!isset($_POST['rank_id']))
            {
                $this->sys_msg('请设置会员等级');
            }
            /* 同一个商品，会员等级不能重叠 */
            /* 一个批发方案只有一个商品 一个产品最多支持count(rank_id)个批发方案 */
            if (isset($_POST['rank_id']))
            {
                $dst_res = array();
                foreach ($_POST['rank_id'] as $rank_id)
                {
                    $sql = "SELECT COUNT(act_id) AS num, goods_id FROM " . $ecs->table('ec_wholesale') .
                            " WHERE goods_id IN ($dst_goods) " .
                            " AND CONCAT(',', rank_ids, ',') LIKE CONCAT('%,', '$rank_id', ',%')
                              GROUP BY goods_id";
                    if($dst_res = M()->getAll($sql))
                    {
                        foreach ($dst_res as $dst)
                        {
                            $key = array_search($dst['goods_id'], $_POST['dst_goods_lists']);
                            if ($key != null && $key !== false)
                            {
                                unset($_POST['dst_goods_lists'][$key]);
                            }
                        }
                    }
                }
            }
            if (empty($_POST['dst_goods_lists']))
            {
                $this->sys_msg('请先搜索商品');
            }
            /* 提交值 */
            $wholesale = array(
                    'rank_ids'      => isset($_POST['rank_id']) ? join(',', $_POST['rank_id']) : '',
                    'prices'        => '',
                    'enabled'       => empty($_POST['enabled']) ? 0 : 1
            );
            foreach ($_POST['dst_goods_lists'] as $goods_value)
            {
                $_wholesale = $wholesale;
                $_wholesale['goods_id'] = $goods_value;
                $_wholesale['goods_name'] = $goods_rebulid[$goods_value];
        
                /* 保存数据 */
                M()->autoExecute($ecs->table('ec_wholesale'), $_wholesale, 'INSERT');
        
                /* 记日志 */
                admin_log($goods_rebulid[$goods_value], '添加', '批发方案');
            }
            /* 清除缓存 */
            clear_cache_files();
        
            /* 提示信息 */
            $links = array(
                array('href' => U('index').'&act=list', 'text' => '返回批发方案列表'),
                array('href' => U('index').'&act=add', 'text' => '继续添加批发方案')
            );
            $this->sys_msg('添加批发方案成功', 0, $links);
        }
        /*------------------------------------------------------ */
        //-- 添加、编辑
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit')
        {
            /* 是否添加 */
            $is_add = $_REQUEST['act'] == 'add';
            $this->assign('form_action', $is_add ? 'insert' : 'update');
            
            /* 初始化、取得批发活动信息 */
            if ($is_add)
            {
                $wholesale = array(
                    'act_id'        => 0,
                    'goods_id'      => 0,
                    'goods_name'    => '请先搜索商品',
                    'enabled'       => '1',
                    'price_list'    => array()
                );
            }
            else
            {
                if (empty($_GET['id']))
                {
                    $this->sys_msg('参数错误');
                }
                $id = intval($_GET['id']);
                $wholesale = wholesale_info($id);
                if (empty($wholesale))
                {
                    $this->sys_msg('您要操作的批发方案不存在');
                }
        
                /* 取得商品属性 */
                $this->assign('attr_list', get_goods_attr($wholesale['goods_id']));
            }
            if (empty($wholesale['price_list']))
            {
                $wholesale['price_list'] = array(
                    array(
                        'attr'    => array(),
                        'qp_list' => array(
                            array('quantity' => 0, 'price' => 0)
                        )
                    )
                );
            }
            $this->assign('wholesale', $wholesale);
            
            /* 取得用户等级 */
            $user_rank_list = array();
            $sql = "SELECT rank_id, rank_name FROM " . $ecs->table('ec_user_rank') .
                    " ORDER BY special_rank, min_points";
            $res = M()->query($sql);
            if(!empty($res))
            {
                foreach($res as $rank)
                {
                    if (!empty($wholesale['rank_ids']) && strpos($wholesale['rank_ids'], $rank['rank_id']) !== false)
                    {
                        $rank['checked'] = 1;
                    }
                    $user_rank_list[] = $rank;
                }
            }
            $this->assign('user_rank_list', $user_rank_list);
        
            $this->assign('cat_list', cat_list());
            $this->assign('brand_list',   get_brand_list());
            /* 显示模板 */
            if ($is_add)
            {
                $this->assign('ur_here', '添加批发方案');
            }
            else
            {
                $this->assign('ur_here', '编辑批发方案');
            }
            
            $href = U('index').'&act=list';
            if (!$is_add)
            {
                $href .= '&' . list_link_postfix();
            }
            $this->assign('action_link', array('href' => $href, 'text' => '批发方案列表'));
            //assign_query_info();
            $this->display('wholesale_info.htm');
        }
        /*------------------------------------------------------ */
        //-- 添加、编辑后提交
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'insert' || $_REQUEST['act'] == 'update')
        {
            /* 是否添加 */
            $is_add = $_REQUEST['act'] == 'insert';
    
            /* 取得goods */
            $goods_id = intval($_POST['goods_id']);
            if ($goods_id <= 0)
            {
                $this->sys_msg('请先搜索商品');
            }
            $sql = "SELECT goods_name FROM " . $ecs->table('ec_goods') .
                    " WHERE goods_id = '$goods_id'";
            $goods_name = M()->getOne($sql,'goods_name');
            $goods_name = addslashes($goods_name);
            if (is_null($goods_name))
            {
                $this->sys_msg('invalid goods id: ' . $goods_id);
            }
            
            /* 会员等级 */
            if (!isset($_POST['rank_id']))
            {
                $this->sys_msg('请设置会员等级');
            }
            /* 同一个商品，会员等级不能重叠 */
            if (isset($_POST['rank_id']))
            {
                foreach ($_POST['rank_id'] as $rank_id)
                {
                    $sql = "SELECT COUNT(*) FROM " . $ecs->table('ec_wholesale') .
                            " WHERE goods_id = '$goods_id' " .
                            " AND CONCAT(',', rank_ids, ',') LIKE CONCAT('%,', '$rank_id', ',%')";
                    if (!$is_add)
                    {
                        $sql .= " AND act_id <> '$_POST[id]'";
                    }
                    if (M()->getOne($sql,'COUNT(*)') > 0)
                    {
                        $this->sys_msg('已经存在该商品针对您选择的会员等级的批发方案了');
                    }
                }
            }
            /* 取得goods_attr */
            $sql = "SELECT a.attr_id " .
                    "FROM " . $ecs->table('ec_goods') . " AS g, " . $ecs->table('ec_attribute') . " AS a " .
                    "WHERE g.goods_id = '$goods_id' " .
                    "AND g.goods_type = a.cat_id " .
                    "AND a.attr_type = 1";
            $attr_id_list = M()->getCol($sql,'attr_id');
            /* 取得属性、数量、价格信息 */
            $prices = array();
            $key_list = array_keys($_POST['quantity']);
    
            foreach ($key_list as $key)
            {
                $attr = array();
                if(!empty($attr_id_list))
                {
                    foreach ($attr_id_list as $attr_id)
                    {
                        if($_POST['attr_' . $attr_id][$key]!=0)
                        {
                            $attr[$attr_id] = $_POST['attr_' . $attr_id][$key];
                        }
                    }
                }
                
                
                //判断商品的货品表是否存在此规格的货品
                $attr_error = false;
                if (!empty($attr))
                {
                    $_attr = $attr;
                    ksort($_attr);
                    $goods_attr = implode('|', $_attr);
                    $sql = "SELECT product_id FROM " . $ecs->table('ec_products') . " WHERE goods_attr = '$goods_attr' AND goods_id = '$goods_id'";
                    if (!M()->getOne($sql,'product_id'))
                    {
                        //echo 'aa';
                        $attr_error = true;
                        continue;
                    }
                }
                //
                $qp_list = array();
                foreach ($_POST['quantity'][$key] as $index => $quantity)
                {
                    $quantity = intval($quantity);
                    $price    = floatval($_POST['price'][$key][$index]);
                    /* 数量或价格为0或者已经存在的数量忽略 */
                    if ($quantity <= 0 || $price <= 0 || isset($qp_list[$quantity]))
                    {
                        continue;
                    }
                    $qp_list[$quantity] = $price;
                }
                ksort($qp_list);

                $arranged_qp_list = array();
                foreach ($qp_list as $quantity => $price)
                {
                    $arranged_qp_list[] = array('quantity' => $quantity, 'price' => $price);
                }
        
                /* 只记录有数量价格的数据 */
                if ($arranged_qp_list)
                {
                    $prices[] = array('attr' => $attr, 'qp_list' => $arranged_qp_list);
                }
            }
            /* 提交值 */
            $wholesale = array(
                'act_id'        => intval($_POST['id']),
                'goods_id'      => $goods_id,
                'goods_name'    => $goods_name,
                'rank_ids'      => isset($_POST['rank_id']) ? join(',', $_POST['rank_id']) : '',
                'prices'        => serialize($prices),
                'enabled'       => empty($_POST['enabled']) ? 0 : 1
            );
            /* 保存数据 */
            if ($is_add)
            {
                $insert_id=M()->autoExecute($ecs->table('ec_wholesale'), $wholesale, 'INSERT');
                $wholesale['act_id'] = $insert_id;
            }
            else
            {
                M()->autoExecute($ecs->table('ec_wholesale'), $wholesale, 'UPDATE', "act_id = '$wholesale[act_id]'");
            }
            
            /* 记日志 */
            if ($is_add)
            {
                admin_log($wholesale['goods_name'], '添加', '批发方案');
            }
            else
            {
                admin_log($wholesale['goods_name'], '编辑', '批发方案');
            }
            /* 清除缓存 */
            clear_cache_files();
    
            /* 提示信息 */
            if ($attr_error)
            {
                $links = array(
                    array('href' => U('index').'&act=list', 'text' => '返回批发方案列表')
                );
                $this-> sys_msg(sprintf('部分规格商品在商品“%s”的货品表中不存在，无法全部保存', $wholesale['goods_name']), 1, $links);
            }
        
            if ($is_add)
            {
                $links = array(
                    array('href' => U('index').'&act=add', 'text' => '继续添加批发方案'),
                    array('href' => U('index').'&act=list', 'text' => '返回批发方案列表')
                );
                $this-> sys_msg('添加批发方案成功', 0, $links);
            }
            else
            {
                $links = array(
                    array('href' => U('index').'&act=list&' . list_link_postfix(), 'text' => '返回批发方案列表')
                );
               $this->  sys_msg('编辑批发方案成功', 0, $links);
            }

        }
        /*------------------------------------------------------ */
        //-- 搜索商品
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'search_goods')
        {
            $json   = new JSON;
            $filter = $json->decode($_GET['JSON']);
            $arr    = get_goods_list($filter);
            if (empty($arr))
            {
                $arr[0] = array(
                    'goods_id'   => 0,
                    'goods_name' => '没有找到商品，请重新搜索'
                );
            }
        
            make_json_result($arr);
        }
        /*------------------------------------------------------ */
        //-- 取得商品信息
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'get_goods_info')
        {
            $json = new JSON();

            $goods_id = intval($_REQUEST['goods_id']);
            $goods_attr_list = array_values(get_goods_attr($goods_id));
        
            // 将数组中的 goods_attr_list 元素下的元素的数字下标转换成字符串下标
            if (!empty($goods_attr_list))
            {
                foreach ($goods_attr_list as $goods_attr_key => $goods_attr_value)
                {
                    if (isset($goods_attr_value['goods_attr_list']) && !empty($goods_attr_value['goods_attr_list']))
                    {
                        foreach ($goods_attr_value['goods_attr_list'] as $key => $value)
                        {
                            $goods_attr_list[$goods_attr_key]['goods_attr_list']['c' . $key] = $value;
                            unset($goods_attr_list[$goods_attr_key]['goods_attr_list'][$key]);
                        }
                    }
                }
            }
        
            echo $json->encode($goods_attr_list);die;
        }
          
	}
    
    /*
     * 取得批发活动列表
     * @return   array
     */
    public function wholesale_list()
    {
        /* 查询会员等级 */
        $rank_list = array();
        $sql = "SELECT rank_id, rank_name FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_user_rank');
        
        $res = M()->query($sql);
        if(!empty($res))
        {
            foreach($res as $row)
            {
                $rank_list[$row['rank_id']] = $row['rank_name'];
            }
        }
 
        $result = get_filter();   
        if ($result === false)
        {
            /* 过滤条件 */
            $filter['keyword']    = empty($_REQUEST['keyword']) ? '' : trim($_REQUEST['keyword']);
            if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
            {
                $filter['keyword'] = json_str_iconv($filter['keyword']);
            }
            $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'act_id' : trim($_REQUEST['sort_by']);
            $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
    
            $where = "";
            if (!empty($filter['keyword']))
            {
                $where .= " AND goods_name LIKE '%" . mysql_like_quote($filter['keyword']) . "%'";
            }
            $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_wholesale') .
                " WHERE 1 $where";
            $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
        
            /* 分页大小 */
            $filter = page_and_size($filter);
    
            /* 查询 */
            $sql = "SELECT * ".
                    "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_wholesale') .
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
                $rank_name_list = array();
                if ($row['rank_ids'])
                {
                    $rank_id_list = explode(',', $row['rank_ids']);
                    foreach ($rank_id_list as $id)
                    {
                        if (isset($rank_list[$id]))
                        {
                            $rank_name_list[] = $rank_list[$id];
                        }
                    }
                }
                $row['rank_names'] = join(',', $rank_name_list);
                $row['price_list'] = unserialize($row['prices']);
        
                $list[] = $row;
            }
        }
        
        return array('item' => $list, 'filter' => $filter, 'page_count' => $filter['page_count'], 
        'record_count' => $filter['record_count']);
            
    }
    
    
    
    
}
