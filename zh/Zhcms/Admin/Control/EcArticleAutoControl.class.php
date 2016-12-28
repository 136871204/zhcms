<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcArticleAutoControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    //$image = new EcImage(C('ec_bgcolor'));
	    /*$tdb=M();
        $exc = new exchange($ecs->table("ec_article"), $tdb, 'article_id', 'title');*/
        $this->assign('thisfile', U('index'));
        //p($_REQUEST);die;
        if ($_REQUEST['act'] == 'list'){
            $goodsdb = $this -> get_auto_goods();
            $crons_enable = M()->getOne("SELECT enable FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_crons') . " WHERE cron_code='ipdel'",'enable');
            $this->assign('crons_enable', $crons_enable);
            $this->assign('full_page',    1);
            $this->assign('ur_here',      L('admin_ecarticleauto_common1'));
            $this->assign('goodsdb',      $goodsdb['goodsdb']);
            $this->assign('filter',       $goodsdb['filter']);
            $this->assign('record_count', $goodsdb['record_count']);
            $this->assign('page_count',   $goodsdb['page_count']);
            //assign_query_info();
            $this->display('goods_auto.htm');
        }
        elseif ($_REQUEST['act'] == 'query')
        {
            $goodsdb = $this -> get_auto_goods();
            
            $this->assign('goodsdb',    $goodsdb['goodsdb']);
            $this->assign('filter',       $goodsdb['filter']);
            $this->assign('record_count', $goodsdb['record_count']);
            $this->assign('page_count',   $goodsdb['page_count']);
        
            //$sort_flag  = sort_flag($goodsdb['filter']);
            //$this->assign($sort_flag['tag'], $sort_flag['img']);

            make_json_result($this->fetch('goods_auto.htm'), '', array('filter' => $goodsdb['filter'], 
                        'page_count' => $goodsdb['page_count']));
        }
        elseif ($_REQUEST['act'] == 'del')
        {
            $goods_id = (int)$_REQUEST['goods_id'];
            $sql = "DELETE FROM " . $ecs->table('ec_auto_manage') . " WHERE item_id = '$goods_id' AND type = 'article'";
            M()->exe($sql);
            $links[] = array('text' => L('admin_ecarticleauto_common1'), 'href' => U('index').'&act=list');
            $this->sys_msg(L("admin_ecarticleauto_control_index_del1"), 0 ,$links);
        }
        elseif ($_REQUEST['act'] == 'edit_starttime')
        {
        
            if(! preg_match('/^\d{4}-\d{2}-\d{2}$/', trim($_POST['val'])) )
            {
                make_json_error(L('admin_ecarticleauto_common3'));
            }
        
            $id    = intval($_POST['id']);
            $time = local_strtotime(trim($_POST['val']));
            if($id <= 0 || $_POST['val'] == '0000-00-00' || $time <= 0)
            {
                make_json_error(L('admin_ecarticleauto_common4'));
            }
        
            M()->autoReplace($ecs->table('ec_auto_manage'), array('item_id' => $id,'type' => 'article',
                    'starttime' => $time), array('starttime' =>(string)$time));
        
            clear_cache_files();
            make_json_result(stripslashes($_POST['val']), '', array('act' => 'article_auto', 'id' => $id));
        }
        elseif ($_REQUEST['act'] == 'edit_endtime')
        {
            if(! preg_match('/^\d{4}-\d{2}-\d{2}$/', trim($_POST['val'])) )
            {
                make_json_error(L('admin_ecarticleauto_common3'));
            }
        
            $id    = intval($_POST['id']);
            $time = local_strtotime(trim($_POST['val']));
            if($id <= 0 || $_POST['val'] == '0000-00-00' || $time <= 0)
            {
                make_json_error(L('admin_ecarticleauto_common4'));
            }
        
            M()->autoReplace($ecs->table('ec_auto_manage'), array('item_id' => $id,'type' => 'article',
                    'endtime' => $time), array('endtime' =>(string)$time));
        
            clear_cache_files();
            make_json_result(stripslashes($_POST['val']), '', array('act' => 'article_auto', 'id' => $id));
        }
        //批量发布
        elseif ($_REQUEST['act'] == 'batch_start')
        {
        
            if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']))
            {
               $this-> sys_msg(L('admin_ecarticleauto_common5'), 1);
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
                M()->autoReplace($ecs->table('ec_auto_manage'), array('item_id' => $id,'type' => 'article',
                    'starttime' => $_POST['date']), array('starttime' =>(string)$_POST['date']));
            }
        
            $lnk[] = array('text' => L('admin_ecarticleauto_common6'), 'href' => U('index').'&act=list');
            $this-> sys_msg(L('admin_ecarticleauto_control_index_batch_start1'), 0, $lnk);
        }
        //批量取消发布
        elseif ($_REQUEST['act'] == 'batch_end')
        {
            //p($_REQUEST);die;
            if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']))
            {
                $this-> sys_msg(L('admin_ecarticleauto_common5'), 1);
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
                M()->autoReplace($ecs->table('ec_auto_manage'), array('item_id' => $id,'type' => 'article',
                    'endtime' => $_POST['date']), array('endtime' =>(string)$_POST['date']));
            }
            $lnk[] = array('text' => L('admin_ecarticleauto_common6'), 'href' => U('index').'&act=list');
            $this-> sys_msg(L('admin_ecarticleauto_control_index_batch_end1'), 0, $lnk);
        }

	}
    
    
    
    public function get_auto_goods()
    {
        $where = '';
        if (!empty($_POST['goods_name']))
        {
            $goods_name = trim($_POST['goods_name']);
            $where = " WHERE g.title LIKE '%$goods_name%'";
            $filter['goods_name'] = $goods_name;
        }
        $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_article') . " g" . $where;
        $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
        
        $goodsdb = array();
        $filter = page_and_size($filter);
        $sql = "SELECT g.*,a.starttime,a.endtime 
                FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_article') . " g 
                LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_auto_manage') . " a ON g.article_id = a.item_id AND a.type='article'" . $where .
               " ORDER BY g. add_time DESC" .
               " LIMIT " . $filter['start'] . ",$filter[page_size]";
        $query = M()->query($sql);
        
        if(!empty($query))
        {
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
                $rt['goods_id'] = $rt['article_id'];
                $rt['goods_name'] = $rt['title'];
                $goodsdb[] = $rt;
            }
        }
        $arr = array('goodsdb' => $goodsdb, 'filter' => $filter, 'page_count' => $filter['page_count'], 
                    'record_count' => $filter['record_count']);

        return $arr;
    
    
    }
    
    
}
