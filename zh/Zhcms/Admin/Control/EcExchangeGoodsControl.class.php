<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcExchangeGoodsControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    //$image = new EcImage(C('ec_bgcolor'));
	    $tdb=M();
        $exc = new exchange($ecs->table("ec_exchange_goods"), $tdb, 'goods_id', 'exchange_integral');
        
        if ($_REQUEST['act'] == 'list'){
            /* 取得过滤条件 */
            $filter = array();
            $this->assign('ur_here',      L('admin_ecexchangegoods_common1'));
            $this->assign('action_link',  array('text' => L('admin_ecexchangegoods_common2'), 'href' => U('index').'&act=add'));
            $this->assign('full_page',    1);
            $this->assign('filter',       $filter);
        
            $goods_list = $this -> get_exchange_goodslist();
        
            $this->assign('goods_list',    $goods_list['arr']);
            $this->assign('filter',        $goods_list['filter']);
            $this->assign('record_count',  $goods_list['record_count']);
            $this->assign('page_count',    $goods_list['page_count']);
        
            $sort_flag  = sort_flag($goods_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            //assign_query_info();
            $this->display('exchange_goods_list.htm');
        }
        /*------------------------------------------------------ */
        //-- 翻页，排序
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query')
        {
        
            $goods_list = $this -> get_exchange_goodslist();
        
            $this->assign('goods_list',    $goods_list['arr']);
            $this->assign('filter',        $goods_list['filter']);
            $this->assign('record_count',  $goods_list['record_count']);
            $this->assign('page_count',    $goods_list['page_count']);
        
            $sort_flag  = sort_flag($goods_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('exchange_goods_list.htm'), '',
                array('filter' => $goods_list['filter'], 'page_count' => $goods_list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 添加商品
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'add')
        {
        
            /*初始化*/
            $goods = array();
            $goods['is_exchange'] = 1;
            $goods['is_hot']      = 0;
            $goods['option']      = '<option value="0">'.L('admin_ecexchangegoods_control_index_add1').'</option>';
        
            $this->assign('goods',       $goods);
            $this->assign('ur_here',     L('admin_ecexchangegoods_common2'));
            $this->assign('action_link', array('text' => L('admin_ecexchangegoods_common1'), 'href' => U('index').'&act=list'));
            $this->assign('form_action', 'insert');
        
            //assign_query_info();
            $this->display('exchange_goods_info.htm');
        }
        /*------------------------------------------------------ */
        //-- 添加商品
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'insert')
        {
            /*检查是否重复*/
            $is_only = $exc->is_only('goods_id', $_POST['goods_id'],0, " goods_id ='$_POST[goods_id]'");
            
            if (!$is_only)
            {
                $this->sys_msg(L('admin_ecexchangegoods_control_index_insert1'), 1);
            }
            /*插入数据*/
            $add_time = gmtime();
            
            if (empty($_POST['goods_id']))
            {
                $_POST['goods_id'] = 0;
            }
            $sql = "INSERT INTO ".$ecs->table('ec_exchange_goods')."(goods_id, exchange_integral, is_exchange, is_hot) ".
                    "VALUES ('$_POST[goods_id]', '$_POST[exchange_integral]', '$_POST[is_exchange]', '$_POST[is_hot]')";
            M()->exe($sql);
            $link[0]['text'] = L('admin_ecexchangegoods_control_index_insert2');
            $link[0]['href'] = U('index').'&act=add';
        
            $link[1]['text'] = L('admin_ecexchangegoods_common3');
            $link[1]['href'] = U('index').'&act=list';
            
            admin_log($_POST['goods_id'],L('admin_ecexchangegoods_control_index_insert3'),L('admin_ecexchangegoods_common4'));

            clear_cache_files(); // 清除相关的缓存文件
        
            $this->sys_msg(L('admin_ecexchangegoods_control_index_insert4'),0, $link);
    
        }
        /*------------------------------------------------------ */
        //-- 编辑
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'edit')
        {
            /* 取商品数据 */
            $sql = "SELECT eg.goods_id, eg.exchange_integral,eg.is_exchange, eg.is_hot, g.goods_name ".
                   " FROM " . $ecs->table('ec_exchange_goods') . " AS eg ".
                   "  LEFT JOIN " . $ecs->table('ec_goods') . " AS g ON g.goods_id = eg.goods_id ".
                   " WHERE eg.goods_id='$_REQUEST[id]'";
            $goods = M()->GetRowSql($sql);
            $goods['option']  = '<option value="'.$goods['goods_id'].'">'.$goods['goods_name'].'</option>';
        
            $this->assign('goods',       $goods);
            $this->assign('ur_here',     L('admin_ecexchangegoods_common2'));
            $this->assign('action_link', array('text' => L('admin_ecexchangegoods_common1'), 'href' => U('index').'&act=list&' . list_link_postfix()));
            $this->assign('form_action', 'update');
        
            //assign_query_info();
            $this->display('exchange_goods_info.htm');
        }
        /*------------------------------------------------------ */
        //-- 编辑
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] =='update')
        {
        
            if (empty($_POST['goods_id']))
            {
                $_POST['goods_id'] = 0;
            }
        
            if ($exc->edit("exchange_integral='$_POST[exchange_integral]', is_exchange='$_POST[is_exchange]', is_hot='$_POST[is_hot]' ", $_POST['goods_id']))
            {
                $link[0]['text'] = L('admin_ecexchangegoods_common3');
                $link[0]['href'] = U('index').'&act=list&' . list_link_postfix();
        
                admin_log($_POST['goods_id'], L('admin_ecexchangegoods_common5'), L('admin_ecexchangegoods_common4'));
        
                clear_cache_files();
                $this->sys_msg(L('admin_ecexchangegoods_control_index_insert5'), 0, $link);
            }
            else
            {
                die(L('admin_ecexchangegoods_control_index_insert6'));
            }
        }
        /*------------------------------------------------------ */
        //-- 编辑使用积分值
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_exchange_integral')
        {
        
            $id                = intval($_POST['id']);
            $exchange_integral = floatval($_POST['val']);
        
            /* 检查文章标题是否重复 */
            if ($exchange_integral < 0 || $exchange_integral == 0 && $_POST['val'] != "$goods_price")
            {
                make_json_error(L('admin_ecexchangegoods_control_index_insert7'));
            }
            else
            {
                if ($exc->edit("exchange_integral = '$exchange_integral'", $id))
                {
                    clear_cache_files();
                    admin_log($id, L('admin_ecexchangegoods_common5'), L('admin_ecexchangegoods_common4'));
                    make_json_result(stripslashes($exchange_integral));
                }
                else
                {
                    make_json_error($db->error());
                }
            }
        }
        
        /*------------------------------------------------------ */
        //-- 切换是否兑换
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'toggle_exchange')
        {
        
            $id     = intval($_POST['id']);
            $val    = intval($_POST['val']);
        
            $exc->edit("is_exchange = '$val'", $id);
            clear_cache_files();
        
            make_json_result($val);
        }
        /*------------------------------------------------------ */
        //-- 切换是否兑换
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'toggle_hot')
        {
            $id     = intval($_POST['id']);
            $val    = intval($_POST['val']);
        
            $exc->edit("is_hot = '$val'", $id);
            clear_cache_files();
        
            make_json_result($val);
        }
        
        /*------------------------------------------------------ */
        //-- 批量删除商品
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'batch_remove')
        {
        
            if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']))
            {
                $this->sys_msg(l('admin_ecexchangegoods_control_index_insert8'), 1);
            }
        
            $count = 0;
            foreach ($_POST['checkboxes'] AS $key => $id)
            {
                if ($exc->drop($id))
                {
                    admin_log($id,L('admin_ecexchangegoods_common6'),L('admin_ecexchangegoods_common4'));
                    $count++;
                }
            }
        
            $lnk[] = array('text' => L('admin_ecexchangegoods_common3'), 'href' => U('index').'&act=list');
            $this->sys_msg(sprintf(L('admin_ecexchangegoods_control_index_insert9'), $count), 0, $lnk);
        }
        /*------------------------------------------------------ */
        //-- 删除商品
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove')
        {
        
            $id = intval($_GET['id']);
            if ($exc->drop($id))
            {
                admin_log($id,L('admin_ecexchangegoods_common6'),L('admin_ecexchangegoods_common4'));
                clear_cache_files();
            }
        
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
            exit;
        }

        /*------------------------------------------------------ */
        //-- 搜索商品
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'search_goods')
        {
            $json = new JSON;
        
            $filters = $json->decode($_GET['JSON']);
        
            $arr = get_goods_list($filters);
        
            make_json_result($arr);
        }

	}
    
    /* 获得商品列表 */
    public function get_exchange_goodslist()
    {
        $result = get_filter();
        if ($result === false)
        {
            $filter = array();
            $filter['keyword']    = empty($_REQUEST['keyword']) ? '' : trim($_REQUEST['keyword']);
            if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
            {
                $filter['keyword'] = json_str_iconv($filter['keyword']);
            }
            $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'eg.goods_id' : trim($_REQUEST['sort_by']);
            $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
            
            $where = '';
            if (!empty($filter['keyword']))
            {
                $where = " AND g.goods_name LIKE '%" . mysql_like_quote($filter['keyword']) . "%'";
            }
        
            /* 文章总数 */
            $sql = 'SELECT COUNT(*) FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_exchange_goods'). ' AS eg '.
                   'LEFT JOIN ' .$GLOBALS['ec_globals']['ecs']->table('ec_goods'). ' AS g ON g.goods_id = eg.goods_id '.
                   'WHERE 1 ' .$where;
            $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
    
            $filter = page_and_size($filter);
            
            /* 获取文章数据 */
            $sql = 'SELECT eg.* , g.goods_name '.
                   'FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_exchange_goods'). ' AS eg '.
                   'LEFT JOIN ' .$GLOBALS['ec_globals']['ecs']->table('ec_goods'). ' AS g ON g.goods_id = eg.goods_id '.
                   'WHERE 1 ' .$where. ' ORDER by '.$filter['sort_by'].' '.$filter['sort_order'];
    
            $filter['keyword'] = stripslashes($filter['keyword']);
            set_filter($filter, $sql);
        
        }
        else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        $arr = array();
        $res = M()->selectLimit($sql, $filter['page_size'], $filter['start']);
        if(!empty($res))
        {
            foreach($res as $rows)
            {
                $arr[] = $rows;
            }
        }
        return array('arr' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
    }
    
	
    
    
}
