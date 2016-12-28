<?php
/**
 * 商品类型
 * @author 周鸿 <136871204@qq.com>
 */
class ErpPointsLogControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("Attribute");
	}
    
    public function index(){
        $ecs=$GLOBALS['ec_globals']['ecs'];
	    $tdb=M();
	    $exc = new exchange($ecs->table("erp_points_log"), $tdb, 'log_id', 'log_title');
        /*------------------------------------------------------ */
        //-- 属性列表
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'list'){
            $company_id = isset($_GET['company_id']) ? intval($_GET['company_id']) : 0;
            $this->assign('ur_here',          '积分消费履历');
            $this->assign('action_link',      array('href' =>U('index',array('act'=>'add','company_id'=>$company_id)) , 'text' => '添加消费记录'));
            //$this->assign('goods_type_list',  goods_type_list($goods_type)); // 取得商品类型
            $this->assign('full_page',        1);
            
            $list = $this->get_pointsLoglist();
            
            $this->assign('log_list',    $list['item']);
            $this->assign('filter',       $list['filter']);
            $this->assign('record_count', $list['record_count']);
            $this->assign('page_count',   $list['page_count']);
            
            $sort_flag  = sort_flag($list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
            $this->display('points_log_list.htm');
        }
        /*------------------------------------------------------ */
        //-- 排序、翻页
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query')
        {
            $list = $this->get_pointsLoglist();
        
            $this->assign('log_list',    $list['item']);
            $this->assign('filter',       $list['filter']);
            $this->assign('record_count', $list['record_count']);
            $this->assign('page_count',   $list['page_count']);
        
            $sort_flag  = sort_flag($list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('points_log_list.htm'), '',
                array('filter' => $list['filter'], 'page_count' => $list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 添加/编辑属性
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit'){
            /* 添加还是编辑的标识 */
            $is_add = $_REQUEST['act'] == 'add';
            $this->assign('form_act', $is_add ? 'insert' : 'update');
            $company_id = isset($_GET['company_id']) ? intval($_GET['company_id']) : 0;
            /* 取得属性信息 */
            if ($is_add){
                $log = array(
                    'log_id' => 0,
                    'company_id' => $company_id,
                    'log_title' => '',
                    'log_status' => 1,
                    'log_content' => '',
                    'log_points' => 0,
                );
            }else{
                $sql = "SELECT * FROM " . $ecs->table('erp_points_log') . " WHERE log_id = '$_REQUEST[log_id]'";
                $log = M()->getRowSql($sql);
            }
            $this->assign('log', $log);
            //$this->assign('attr_groups', get_attr_groups($attr['cat_id']));
            
            /* 取得商品分类列表 */
            //$this->assign('goods_type_list', goods_type_list($attr['cat_id']));
    
            /* 模板赋值 */
            $this->assign('ur_here', $is_add ? '添加积分消费记录':'修改积分消费记录');
            $this->assign('action_link', array('href' => U('index',array('act'=>'list','company_id'=>$company_id)), 'text' => '返回积分消费履历'));
            $this->display('points_log_info.htm');
        }
        /*------------------------------------------------------ */
        //-- 插入/更新属性
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'insert' || $_REQUEST['act'] == 'update'){
            /* 插入还是更新的标识 */
            $is_insert = $_REQUEST['act'] == 'insert';
            
            /* 检查名称是否重复 */
            $exclude = empty($_POST['log_id']) ? 0 : intval($_POST['log_id']);
            if (!$exc->is_only('log_title', $_POST['log_title'], $exclude, " company_id = '$_POST[company_id]'")){
                $this->sys_msg('标题重复', 1);
            }
            $companySql = "SELECT * FROM " . $ecs->table('erp_company') . " WHERE company_id = '$_POST[company_id]'";
            $company_info=M()->getRowSql($companySql);
            
            if(empty($company_info))
            {
                $this->sys_msg('没有选定公司', 1);
            }
            ///p($company_info);die;
            if ($is_insert)
            {
                if(intval($company_info['company_points']) < intval($_POST['log_points']))
                {
                    $this->sys_msg('没有剩余积分了', 1);
                }
            }
            else
            {
                $log_sql = "SELECT * FROM " . $ecs->table('erp_points_log') . " WHERE log_id = '$_POST[log_id]'";
                $log_info=M()->getRowSql($log_sql);
                $dif_point=intval($log_info['log_points'])-intval($_POST['log_points']);
                
                $next_point=intval($company_info['company_points'])+$dif_point;
                if($next_point<0)
                {
                    $this->sys_msg('没有剩余积分了', 1);
                }
            }
            
            $company_id = $_REQUEST['company_id'];
            /* 取得属性信息 */
            $log = array(
                'company_id'          => $_POST['company_id'],
                'log_title'       => $_POST['log_title'],
                'log_status'       => $_POST['log_status'],
                'log_points'       => $_POST['log_points'],
                'log_content'       => $_POST['log_content'],
                'starttime'     => strtotime($_POST['starttime']),
            );
            
            //p($log);die;
            /* 入库、记录日志、提示信息 */
            if ($is_insert)
            {
                
                M()->autoExecute($ecs->table('erp_points_log'), $log, 'INSERT');
                admin_log($_POST['log_title'], '添加', '积分作业记录');
                
                $update_point=intval($company_info['company_points']) - intval($_POST['log_points']);
                $update_sql="UPDATE " . $ecs->table('erp_company') . " SET company_points = $update_point WHERE company_id = '$_POST[company_id]'";
                M()->exe($update_sql);
                
                
                $links = array(
                    array('text' => '继续添加作业记录', 'href' => U('index',array('act'=>'add','company_id'=>$_POST['company_id']))),
                    array('text' => '返回作业记录列表', 'href' => U('index',array('act'=>'list','company_id'=>$_POST['company_id']))),
                );
                $this->sys_msg(sprintf('添加作业记录%s成功,现在公司还剩余%s积分', $log['log_title'],$update_point.''), 0, $links);
            }else{
                M()->autoExecute($ecs->table('erp_points_log'), $log, 'UPDATE', "log_id = '$_POST[log_id]'");
                admin_log($_POST['log_title'], '修改', '积分作业记录');

                $update_sql="UPDATE " . $ecs->table('erp_company') . " SET company_points = $next_point WHERE company_id = '$_POST[company_id]'";
                M()->exe($update_sql);
                
                $links = array(
                    array('text' => '返回作业记录列表', 'href' => U('index',array('act'=>'list','company_id'=>$_POST['company_id']))),
                );
                $this->sys_msg(sprintf('修改作业记录%s成功,现在公司还剩余%s积分', $log['log_title'],$next_point.''), 0, $links);
            }
            //p($_POST);die;
        }
        /*------------------------------------------------------ */
        //-- 删除商品属性
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove')
        {
            $id = intval($_GET['id']);
            $log_sql = "SELECT * FROM " . $ecs->table('erp_points_log') . " WHERE log_id = '$id'";
            $log_info=M()->getRowSql($log_sql);
            $company_sql = "SELECT * FROM " . $ecs->table('erp_company') . " WHERE company_id = '$log_info[company_id]'";
            $company_info=M()->getRowSql($company_sql);
            $next_point=intval($company_info['company_points'])+intval($log_info['log_points']);
            M()->exe("DELETE FROM " .$ecs->table('erp_points_log'). " WHERE log_id='$id'");
            $update_sql="UPDATE " . $ecs->table('erp_company') . " SET company_points = $next_point WHERE company_id = '$log_info[company_id]'";
            M()->exe($update_sql);
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
            exit;
        }
        

    }
    

    /**
     * 获取属性列表
     *
     * @return  array
     */
    public function get_pointsLoglist(){
        /* 查询条件 */
        $filter = array();
        $filter['company_id'] = empty($_REQUEST['company_id']) ? 0 : intval($_REQUEST['company_id']);
        $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'log_id' : trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
        $where = (!empty($filter['company_id'])) ? " WHERE a.company_id = '$filter[company_id]' " : '';
        $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ec_globals']['ecs']->table('erp_points_log') . " AS a $where";
        $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
        
        /* 分页大小 */
        $filter = page_and_size($filter);
    
        /* 查询 */
        $sql = "SELECT a.*, t.company_name " .
                " FROM " . $GLOBALS['ec_globals']['ecs']->table('erp_points_log') . " AS a ".
                " LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('erp_company') . " AS t ON a.company_id = t.company_id " . $where .
                " ORDER BY $filter[sort_by] $filter[sort_order] ".
                " LIMIT " . $filter['start'] .", $filter[page_size]";
        $row = M()->query($sql);
        if(!empty($row)){
            foreach ($row AS $key => $val)
            {
                //$row[$key]['attr_input_type_desc'] = $_LANG['value_attr_input_type'][$val['attr_input_type']];
                //$row[$key]['attr_values']      = str_replace("\n", ", ", $val['attr_values']);
            }
        }
        
        $arr = array(
                    'item' => $row, 
                    'filter' => $filter, 
                    'page_count' => $filter['page_count'], 
                    'record_count' => $filter['record_count']);

        return $arr;
    }

    
    
}
