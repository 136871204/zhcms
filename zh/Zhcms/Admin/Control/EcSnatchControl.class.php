<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcSnatchControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("Brand");
        //define('EC_CHARSET','utf-8');
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
        $db_prefix=C("DB_PREFIX");
        $tdb=M();
        $exc = new Exchange($db_prefix.'ec_goods_activity', $tdb, 'act_id', 'act_name');
        
	    if ($_REQUEST['act'] == 'add'){
            /* 初始化信息 */
            $start_time = local_date('Y-m-d H:i');
            $end_time   = local_date('Y-m-d H:i', strtotime('+1 week'));
            $snatch     = array(
                            'start_price'=>'1.00',
                            'end_price'=>'800.00',
                            'max_price'=>'0', 
                            'cost_points'=>'1',
                            'start_time' => $start_time,
                            'end_time' => $end_time,
                            'option'=>'<option value="0">'.'请先搜索商品生成选项列表'.'</option>');
            $this->assign('snatch',       $snatch);
            $this->assign('ur_here',      '添加夺宝奇兵');
            $this->assign('action_link',  array('text' => '夺宝奇兵', 'href'=>U('index',array('act'=>'list'))));
            $this->assign('cat_list',     cat_list());
            $this->assign('brand_list',   get_brand_list());
            $this->assign('form_action',  'insert');
            $this->display('snatch_info.htm');
	    }elseif ($_REQUEST['act'] =='insert'){
	       /* 检查商品是否存在 */
            $sql = "SELECT goods_name FROM ".$ecs->table('ec_goods')." WHERE goods_id = '$_POST[goods_id]'";
            $_POST['goods_name'] = M()->GetOne($sql,'goods_name');
            if (empty($_POST['goods_name']))
            {
                $this->sys_msg('你输入的商品不存在，请查证后再输入', 1);
                exit;
            }
            $sql = "SELECT COUNT(*) ".
                   " FROM " . $ecs->table('ec_goods_activity').
                   " WHERE act_type='" . GAT_SNATCH . "' AND act_name='" . $_POST['snatch_name'] . "'" ;
            if (M()->getOne($sql,'COUNT(*)'))
            {
                $this->sys_msg(sprintf('活动 %s 已经存在',  $_POST['snatch_name']) , 1);
            }
            /* 将时间转换成整数 */
            $_POST['start_time'] = local_strtotime($_POST['start_time']);
            $_POST['end_time']   = local_strtotime($_POST['end_time']);
            /* 处理提交数据 */
            if (empty($_POST['start_price']))
            {
                $_POST['start_price'] = 0;
            }
            if (empty($_POST['end_price']))
            {
                $_POST['end_price'] = 0;
            }
            if (empty($_POST['max_price']))
            {
                $_POST['max_price'] = 0;
            }
            if (empty($_POST['cost_points']))
            {
                $_POST['cost_points'] = 0;
            }
            if (isset($_POST['product_id']) && empty($_POST['product_id']))
            {
                $_POST['product_id'] = 0;
            }
            
            $info = array(
                            'start_price'=>$_POST['start_price'], 
                            'end_price'=>$_POST['end_price'], 
                            'max_price'=>$_POST['max_price'], 
                            'cost_points'=>$_POST['cost_points']
                    );
            /* 插入数据 */
            $record = array(
                            'act_name'=>$_POST['snatch_name'], 
                            'act_desc'=>$_POST['desc'],
                            'act_type'=>GAT_SNATCH, 
                            'goods_id'=>$_POST['goods_id'], 
                            'goods_name'=>$_POST['goods_name'],
                            'start_time'=>$_POST['start_time'], 
                            'end_time'=>$_POST['end_time'],
                            'product_id'=>$_POST['product_id'],
                            'is_finished'=>0, 
                            'ext_info'=>serialize($info)
                    );
            M()->AutoExecute($ecs->table('ec_goods_activity'),$record,'INSERT');
            admin_log($_POST['snatch_name'],'添加','夺宝奇兵活动');
            $link[] = array('text' =>'返回列表页', 'href'=>U('index',array('act'=>'list')));
            $link[] = array('text' =>'继续添加', 'href'=>U('index',array('act'=>'add')));
            $this->sys_msg('添加成功',0,$link);
            
	    }else if($_REQUEST['act'] == 'list'){
            $this->assign('ur_here',      '夺宝奇兵');
            
            $this->assign('action_link',  array('text' => '添加夺宝奇兵', 'href'=>U('index',array('act'=>'add'))));
            $snatchs = $this->get_snatchlist();
            $this->assign('snatch_list',  $snatchs['snatchs']);
            $this->assign('filter',       $snatchs['filter']);
            $this->assign('record_count', $snatchs['record_count']);
            $this->assign('page_count',   $snatchs['page_count']);
            $sort_flag  = sort_flag($snatchs['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
            $this->assign('full_page',    1);
            $this->display('snatch_list.htm');
	    } 
        elseif ($_REQUEST['act'] == 'query')
        {
            $snatchs = $this->get_snatchlist();
        
            $this->assign('snatch_list',  $snatchs['snatchs']);
            $this->assign('filter',       $snatchs['filter']);
            $this->assign('record_count', $snatchs['record_count']);
            $this->assign('page_count',   $snatchs['page_count']);
        
            $sort_flag  = sort_flag($snatchs['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('snatch_list.htm'), '',
                array('filter' => $snatchs['filter'], 'page_count' => $snatchs['page_count']));
        }
        elseif ($_REQUEST['act'] == 'edit_snatch_name')
        {
            $id = intval($_POST['id']);
            $val = json_str_iconv(trim($_POST['val']));
            /* 检查活动重名 */
            $sql = "SELECT COUNT(*) ".
                   " FROM " . $ecs->table('ec_goods_activity').
                   " WHERE act_type='" . GAT_SNATCH . "' AND act_name='$val' AND act_id <> '$id'" ;
            if (M()->getOne($sql,'COUNT(*)'))
            {
                make_json_error(sprintf('活动 %s 已经存在',  $val));
            }
            $exc->edit("act_name='$val'", $id);
            make_json_result(stripslashes($val));
        }
        /*------------------------------------------------------ */
        //-- 删除指定的活动
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'remove')
        {
            $id = intval($_GET['id']);

            $exc->drop($id);
        
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
            exit;
        }
        /*------------------------------------------------------ */
        //-- 编辑活动
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit'){
            $snatch        = $this->get_snatch_info($_REQUEST['id']);
            $snatch['option'] = '<option value="'.$snatch['goods_id'].'">'.$snatch['goods_name'].'</option>';
            $this->assign('snatch',               $snatch);
            $this->assign('ur_here',              '编辑活动');
            $this->assign('action_link', array('text' => '夺宝奇兵', 'href'=>U('index',array('act'=>'list')).'&' . list_link_postfix()));
            $this->assign('form_action',        'update');
            /* 商品货品表 */
            $this->assign('good_products_select', get_good_products_select($snatch['goods_id']));
            $this->display('snatch_info.htm');
            //p($snatch);die;
        }
        elseif ($_REQUEST['act'] =='update')
        {
            /* 将时间转换成整数 */
            $_POST['start_time'] = local_strtotime($_POST['start_time']);
            $_POST['end_time']   = local_strtotime($_POST['end_time']);
            /* 处理提交数据 */
            if (empty($_POST['snatch_name']))
            {
                $_POST['snatch_name'] = '';
            }
            if (empty($_POST['goods_id']))
            {
                $_POST['goods_id'] = 0;
            }
            else
            {
                $_POST['goods_name'] = M()->getOne("SELECT 
                                                        goods_name 
                                                    FROM " . $ecs->table('ec_goods') . " 
                                                    WHERE goods_id= '$_POST[goods_id]' ",'goods_name');
            }
            if (empty($_POST['start_price']))
            {
                $_POST['start_price'] = 0;
            }
            if (empty($_POST['end_price']))
            {
                $_POST['end_price'] = 0;
            }
            if (empty($_POST['max_price']))
            {
                $_POST['max_price'] = 0;
            }
            if (empty($_POST['cost_points']))
            {
                $_POST['cost_points'] = 0;
            }
            if (isset($_POST['product_id']) && empty($_POST['product_id']))
            {
                $_POST['product_id'] = 0;
            }
            if(!isset($_POST['product_id'])){
                $_POST['product_id'] = 0;
            }
            
            /* 检查活动重名 */
            $sql = "SELECT COUNT(*) ".
                    " FROM " . $ecs->table('ec_goods_activity').
                    " WHERE act_type='" . GAT_SNATCH . "' AND act_name='" . $_POST['snatch_name'] . "' AND act_id <> '" .  $_POST['id'] . "'" ;
           
            if (M()->getOne($sql,'COUNT(*)'))
            {
                $this->sys_msg(sprintf('活动 %s 已经存在',  $_POST['snatch_name']) , 1);
            }
            $info = array(
                        'start_price'=>$_POST['start_price'], 
                        'end_price'=>$_POST['end_price'], 
                        'max_price'=>$_POST['max_price'], 
                        'cost_points'=>$_POST['cost_points']);
            /* 更新数据 */
            $record = array(
                            'act_name' => $_POST['snatch_name'], 
                            'goods_id' => $_POST['goods_id'],
                            'goods_name' =>$_POST['goods_name'], 
                            'start_time' => $_POST['start_time'],
                            'end_time' => $_POST['end_time'], 
                            'act_desc' => $_POST['desc'],
                            'product_id'=>$_POST['product_id'],
                            'ext_info'=>serialize($info));
            M()->autoExecute($ecs->table('ec_goods_activity'), $record, 'UPDATE', "act_id = '" . $_POST['id'] . "' AND act_type = " . GAT_SNATCH );
            admin_log($_POST['snatch_name'], '修改', '夺宝奇兵活动');   
            $link[] = array('text' => '返回列表页', 'href'=>U('index',array('act'=>'list')).'&' . list_link_postfix());
            $this->sys_msg('修改成功',0,$link);
            
        }
        /*------------------------------------------------------ */
        //-- 查看活动详情
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'view')
        {
            $id = empty($_REQUEST['snatch_id']) ? 0 : intval($_REQUEST['snatch_id']);

            $bid_list = $this-> get_snatch_detail();
            //p($bid_list);die;
            $this->assign('bid_list',     $bid_list['bid']);
            $this->assign('filter',       $bid_list['filter']);
            $this->assign('record_count', $bid_list['record_count']);
            $this->assign('page_count',   $bid_list['page_count']);
        
            $sort_flag  = sort_flag($bid_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
            /* 赋值 */
            $this->assign('info',         $this->get_snatch_info($id));
            $this->assign('full_page',    1);
            $this->assign('result',       get_snatch_result($id));
            $this->assign('ur_here',      '查看活动详情' );
            $this->assign('action_link',  array('text' => '夺宝奇兵', 'href'=> U('index',array('act'=>'list'))));
            $this->display('snatch_view.htm');
        }
        /*------------------------------------------------------ */
        //-- 排序、翻页活动详情
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'query_bid')
        {
            $bid_list = $this-> get_snatch_detail();
        
            $this->assign('bid_list',     $bid_list['bid']);
            $this->assign('filter',       $bid_list['filter']);
            $this->assign('record_count', $bid_list['record_count']);
            $this->assign('page_count',   $bid_list['page_count']);
        
            $sort_flag  = sort_flag($bid_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('snatch_view.htm'), '',
                array('filter' => $bid_list['filter'], 'page_count' => $bid_list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 搜索货品
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'search_products')
        {
            $json = new JSON;
        
            $filters = $json->decode($_GET['JSON']);
        
            if (!empty($filters->goods_id))
            {
                $arr['products'] = get_good_products($filters->goods_id);
            }
        
            make_json_result($arr);
        }
        /*------------------------------------------------------ */
        //-- 搜索商品
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'search_goods')
        {
            $json = new JSON;
        
            $filters = $json->decode($_GET['JSON']);
        
            $arr['goods'] = get_goods_list($filters);
        
            if (!empty($arr['goods'][0]['goods_id']))
            {
                $arr['products'] = get_good_products($arr['goods'][0]['goods_id']);
            }
        
            make_json_result($arr);
        }
        
        
        //p($snatchs);
        
	}
    

    
    /**
     * 获取活动列表
     *
     * @access  public
     *
     * @return void
     */
    public function get_snatchlist(){
        $db_prefix=C("DB_PREFIX");
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
            $sql = "SELECT 
                        COUNT(*) 
                    FROM " . 
                        $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') .
                    " WHERE act_type =" . GAT_SNATCH . $where;
            $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
            $filter = page_and_size($filter);
             
            /* 获活动数据 */
            $sql = "SELECT 
                        act_id, act_name AS snatch_name, goods_name, start_time, end_time, is_finished, ext_info, product_id ".
                    " FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') .
                    " WHERE act_type = " . GAT_SNATCH . $where .
                    " ORDER by $filter[sort_by] $filter[sort_order] LIMIT ". $filter['start'] .", " . $filter['page_size'];
            $filter['keywords'] = stripslashes($filter['keywords']);
            set_filter($filter, $sql);
            
        }else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        $row = M()->query($sql);
        if(!empty($row)){
            foreach ($row AS $key => $val){
                $row[$key]['start_time'] = local_date(C('EC_TIME_FORMAT'), $val['start_time']);
                $row[$key]['end_time']   = local_date(C('EC_TIME_FORMAT'), $val['end_time']);
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
        $arr = array('snatchs' => $row, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);

        return $arr;
    }
    
    /**
     * 获取指定id snatch 的信息
     *
     * @access  public
     * @param   int         $id         snatch_id
     *
     * @return array       array(snatch_id, snatch_name, goods_id,start_time, end_time, min_price, integral)
     */
    public function get_snatch_info($id){
        $db_prefix=C("DB_PREFIX");
        $sql = "SELECT 
                    act_id, act_name AS snatch_name, goods_id, product_id, goods_name, start_time, end_time, act_desc, ext_info" .
               " FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') .
               " WHERE act_id='$id' AND act_type = " . GAT_SNATCH;
        $snatch = M()->GetRowSql($sql);
        /* 将时间转成可阅读格式 */
        $snatch['start_time'] = local_date('Y-m-d H:i', $snatch['start_time']);
        $snatch['end_time']   = local_date('Y-m-d H:i', $snatch['end_time']);
        $row = unserialize($snatch['ext_info']);
        unset($snatch['ext_info']);
        if ($row)
        {
            foreach ($row as $key=>$val)
            {
                $snatch[$key] = $val;
            }
        }
        return $snatch;
    
    }
    
    /**
     * 返回活动详细列表
     *
     * @access  public
     *
     * @return array
     */
    function get_snatch_detail()
    {
        $filter['snatch_id']  = empty($_REQUEST['snatch_id']) ? 0 : intval($_REQUEST['snatch_id']);
        $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'bid_time' : trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
    
        $where = empty($filter['snatch_id']) ? '' : " WHERE snatch_id='$filter[snatch_id]'";
        
        /* 获得记录总数以及总页数 */
        $sql = "SELECT count(*) FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_snatch_log'). $where;
        $filter['record_count'] = M()->getOne($sql,'count(*)');
        $filter = page_and_size($filter);

        /* 获得活动数据 */
        $sql = "SELECT s.log_id, u.user_name, s.bid_price, s.bid_time ".
                " FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_snatch_log')." AS s ".
                " LEFT JOIN ".$GLOBALS['ec_globals']['ecs']->table('ec_users')." AS u ON s.user_id = u.user_id  ". $where.
                " ORDER by ".$filter['sort_by']." ".$filter['sort_order'].
                " LIMIT ". $filter['start'] .", " . $filter['page_size'];
        $row = M()->getAll($sql);
    
        if(!empty($row)){
            foreach ($row AS $key => $val)
            {
                $row[$key]['bid_time'] = date(C('ec_time_format'), $val['bid_time']);
            }
        }
       // p($row);die;
    
        $arr = array('bid' => $row, 'filter' => $filter, 'page_count' => $filter['page_count'], 
                'record_count' => $filter['record_count']);
    
        return $arr;
    }
    
}
