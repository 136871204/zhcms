<?php
/**
 * 管理员管理模块
 * Class AdministratorControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcGoodsAutoControl extends EcAdminControl{
    
    //private $_db;

    public function __init() {
		//$this -> _db = K("AdminLog");
	}
    
    public function index(){
        $ecs=$GLOBALS['ec_globals']['ecs'];
        /*$image = new EcImage(C('ec_bgcolor'));
        $GLOBALS['image']=$image;*/
	    /*$tdb=M();
	    $exc = new exchange($ecs->table("ec_ad_position"), $tdb, 'position_id', 'position_name');*/
        /* act操作项的初始化 */
        /*------------------------------------------------------ */
        //-- 生成代码
        /*------------------------------------------------------ */
        
        $this->assign('thisfile', U('index'));
        if ($_REQUEST['act'] == 'list')
        {
            $goodsdb = $this-> get_auto_goods();
            $crons_enable = M()->getOne("SELECT enable FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_crons') . " WHERE cron_code='auto_manage'",'enable');
            $this->assign('crons_enable', $crons_enable);
            $this->assign('full_page',    1);
            $this->assign('ur_here', '商品自动上下架');
            //$this->assign('cfg_lang',     $_CFG['lang']);
            $this->assign('goodsdb',      $goodsdb['goodsdb']);
            $this->assign('filter',       $goodsdb['filter']);
            $this->assign('record_count', $goodsdb['record_count']);
            $this->assign('page_count',   $goodsdb['page_count']);
            //assign_query_info();
            $this->display('goods_auto.htm');
        }
        elseif ($_REQUEST['act'] == 'query')
        {
            $goodsdb = $this-> get_auto_goods();
            $this->assign('goodsdb',    $goodsdb['goodsdb']);
            $this->assign('filter',       $goodsdb['filter']);
            //$this->assign('cfg_lang',     $_CFG['lang']);
            $this->assign('record_count', $goodsdb['record_count']);
            $this->assign('page_count',   $goodsdb['page_count']);
            
            $sort_flag  = sort_flag($goodsdb['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
            
            make_json_result($this->fetch('goods_auto.htm'), '', array('filter' => $goodsdb['filter'], 'page_count' => $goodsdb['page_count']));
        }
        elseif ($_REQUEST['act'] == 'del')
        {
            $goods_id = (int)$_REQUEST['goods_id'];
            $sql = "DELETE FROM " . $ecs->table('ec_auto_manage') . " WHERE item_id = '$goods_id' AND type = 'goods'";
            M()->exe($sql);
            $links[] = array('text' => '商品自动上下架', 'href' => U('index',array('act'=>'list')));
            $this->sys_msg('操作成功', 0 ,$links);
        }
        elseif ($_REQUEST['act'] == 'edit_starttime')
        {
        
            if(! preg_match('/^\d{4}-\d{2}-\d{2}$/', trim($_POST['val'])) )
            {
                make_json_error('时间格式不正确');
            }
        
            $id    = intval($_POST['id']);
            $time = local_strtotime(trim($_POST['val']));
            if($id <= 0 || $_POST['val'] == '0000-00-00' || $time <= 0)
            {
                make_json_error('输入格式错误');
            }
        
            M()->autoReplace($ecs->table('ec_auto_manage'), array('item_id' => $id,'type' => 'goods',
                    'starttime' => $time), array('starttime' =>(string)$time));
        
            clear_cache_files();
            make_json_result(stripslashes($_POST['val']), '', array('act' => 'goods_auto', 'id' => $id));
        }
        elseif ($_REQUEST['act'] == 'edit_endtime')
        {

            if(! preg_match('/^\d{4}-\d{2}-\d{2}$/', trim($_POST['val'])) )
            {
                make_json_error('时间格式不正确');
            }
        
            $id    = intval($_POST['id']);
            $time = local_strtotime(trim($_POST['val']));
            if($id <= 0 || $_POST['val'] == '0000-00-00' || $time <= 0)
            {
                make_json_error('输入格式错误');
            }
        
            M()->autoReplace($ecs->table('ec_auto_manage'), array('item_id' => $id,'type' => 'goods',
                    'endtime' => $time), array('endtime' =>(string)$time));
        
            clear_cache_files();
            make_json_result(stripslashes($_POST['val']), '', array('act' => 'goods_auto', 'id' => $id));
        }
        //批量上架
        elseif ($_REQUEST['act'] == 'batch_start')
        {
        //p($_REQUEST);die;
            if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']))
            {
                $this-> sys_msg('没有选定商品', 1);
            }
        
            if($_POST['date'] == '0000-00-00')
            {
                $_POST['date'] = 0;
            }
            else
            {
                 $_POST['date'] = local_strtotime(trim($_POST['date']));
            }
        
            foreach($_POST['checkboxes'] as $id)
            {
                M()->autoReplace($ecs->table('ec_auto_manage'), array('item_id' => $id,'type' => 'goods',
                    'starttime' => $_POST['date']), array('starttime' =>(string)$_POST['date']));
            }
        
            $lnk[] = array('text' => '返回商品自动上下架', 'href' => U('index',array('act'=>'list')));
            $this->sys_msg('批量上架成功', 0, $lnk);
        }
        //批量下架
        elseif ($_REQUEST['act'] == 'batch_end')
        {
        
            if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']))
            {
                $this-> sys_msg('没有选定商品', 1);
            }
        
            if($_POST['date'] == '0000-00-00')
            {
                $_POST['date'] = 0;
            }
            else
            {
                 $_POST['date'] = local_strtotime(trim($_POST['date']));
            }
        
            foreach($_POST['checkboxes'] as $id)
            {
                M()->autoReplace($ecs->table('ec_auto_manage'), array('item_id' => $id,'type' => 'goods',
                    'endtime' => $_POST['date']), array('endtime' =>(string)$_POST['date']));
            }
        
            $lnk[] = array('text' => '返回商品自动上下架', 'href' => U('index',array('act'=>'list')));
            $this->sys_msg('批量下架成功', 0, $lnk);
        }
    }
    
    
    public function get_auto_goods()
    {
        $where = ' WHERE g.is_delete <> 1 ';
        if (!empty($_POST['goods_name']))
        {
            $goods_name = trim($_POST['goods_name']);
            $where .= " AND g.goods_name LIKE '%$goods_name%'";
            $filter['goods_name'] = $goods_name;
        }
        
        $result = get_filter();
        
        
        if ($result === false)
        {
            $filter['sort_by']      = empty($_REQUEST['sort_by']) ? 'last_update' : trim($_REQUEST['sort_by']);
            $filter['sort_order']   = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
            
            $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " g" . $where;
            $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
            
            /* 分页大小 */
            $filter = page_and_size($filter);
            
            /* 查询 */
            $sql = "SELECT g.*,a.starttime,a.endtime 
                    FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " g 
                            LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_auto_manage') . " a ON g.goods_id = a.item_id AND a.type='goods'" . $where .
                       " ORDER by goods_id, " . $filter['sort_by'] . ' ' . $filter['sort_order'] .
                   " LIMIT " . $filter['start'] . ",$filter[page_size]";
        
            set_filter($filter, $sql);
        }
        else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        $query = M()->query($sql);
        $goodsdb = array();
        if(!empty($query)){
            foreach($query as $rt)
            {
                if (!empty($rt['starttime']))
                {
                    $rt['starttime'] = local_date('Y-m-d',$rt['starttime']);
                }
                if (!empty($rt['endtime']))
                {
                    $rt['endtime'] = local_date('Y-m-d',$rt['endtime']);
                }
                $goodsdb[] = $rt;
            }
        }
        $arr = array(
                    'goodsdb' => $goodsdb, 'filter' => $filter, 'page_count' => $filter['page_count'], 
                    'record_count' => $filter['record_count']);

        return $arr;
    }
    
    

}
?>