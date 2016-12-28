<?php
/**
 * 管理员管理模块
 * Class AdministratorControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcAdminLogsControl extends EcAdminControl{
    
    //private $_db;

    public function __init() {
		//$this -> _db = K("AdminLog");
	}
    
    public function index(){
        $ecs=$GLOBALS['ec_globals']['ecs'];
	    /*$tdb=M();
	    $exc = new exchange($ecs->table("ec_ad_position"), $tdb, 'position_id', 'position_name');*/
        /* act操作项的初始化 */
        if (empty($_REQUEST['act']))
        {
            $_REQUEST['act'] = 'list';
        }
        else
        {
            $_REQUEST['act'] = trim($_REQUEST['act']);
        }

        /*------------------------------------------------------ */
        //-- 获取所有日志列表
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'list'){
            $user_id   = !empty($_REQUEST['id'])       ? intval($_REQUEST['id']) : 0;
            $admin_ip  = !empty($_REQUEST['ip'])       ? $_REQUEST['ip']         : '';
            $log_date  = !empty($_REQUEST['log_date']) ? $_REQUEST['log_date']   : '';
            
            /* 查询IP地址列表 */
            $ip_list = array();
            $res = M()->query("SELECT DISTINCT ip_address FROM " .$ecs->table('ec_admin_log'));
            if(!empty($res)){
                foreach($res as $row){
                    $ip_list[$row['ip_address']] = $row['ip_address'];
                }
            }
            $this->assign('ur_here',   '管理者ログ');
            $this->assign('ip_list',   $ip_list);
            $this->assign('full_page', 1);
            
            $log_list = $this->get_admin_logs();
            
            $this->assign('log_list',        $log_list['list']);
            $this->assign('filter',          $log_list['filter']);
            $this->assign('record_count',    $log_list['record_count']);
            $this->assign('page_count',      $log_list['page_count']);
            
            $sort_flag  = sort_flag($log_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
 
            $this->display('admin_logs.htm');
        }
        /*------------------------------------------------------ */
        //-- 排序、分页、查询
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query')
        {
            $log_list = $this->get_admin_logs();
        
            $this->assign('log_list',        $log_list['list']);
            $this->assign('filter',          $log_list['filter']);
            $this->assign('record_count',    $log_list['record_count']);
            $this->assign('page_count',      $log_list['page_count']);
        
            $sort_flag  = sort_flag($log_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('admin_logs.htm'), '',
                array('filter' => $log_list['filter'], 'page_count' => $log_list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 批量删除日志记录
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'batch_drop'){
            $drop_type_date = isset($_POST['drop_type_date']) ? $_POST['drop_type_date'] : '';
            /* 按日期删除日志 */
            if ($drop_type_date){
                if ($_POST['log_date'] == '0')
                {
                    ec_header("Location: ".U('index',array('act'=>'list'))."\n");
                    exit;
                }
                elseif ($_POST['log_date'] > '0')
                {
                    $where = " WHERE 1 ";
                    switch ($_POST['log_date']){
                        case '1':
                            $a_week = gmtime()-(3600 * 24 * 7);
                            $where .= " AND log_time <= '".$a_week."'";
                            break;
                        case '2':
                            $a_month = gmtime()-(3600 * 24 * 30);
                            $where .= " AND log_time <= '".$a_month."'";
                            break;
                        case '3':
                            $three_month = gmtime()-(3600 * 24 * 90);
                            $where .= " AND log_time <= '".$three_month."'";
                            break;
                        case '4':
                            $half_year = gmtime()-(3600 * 24 * 180);
                            $where .= " AND log_time <= '".$half_year."'";
                            break;
                        case '5':
                            $a_year = gmtime()-(3600 * 24 * 365);
                            $where .= " AND log_time <= '".$a_year."'";
                            break;
                    }
                    $sql = "DELETE FROM " .$ecs->table('ec_admin_log').$where;
                    $res = M()->exe($sql);
                    if ($res)
                    {
                        admin_log('','削除', '管理者ログ');
        
                        $link[] = array('text' => '戻す', 'href' => U('index',array('act'=>'list')));
                        $this->sys_msg('操作成功!', 1, $link);
                    }
                }
            }
            /* 如果不是按日期来删除, 就按ID删除日志 */
            else{
                $count = 0;
                foreach ($_POST['checkboxes'] AS $key => $id){
                    $sql = "DELETE FROM " .$ecs->table('ec_admin_log'). " WHERE log_id = '$id'";
                    $result = M()->exe($sql);
                    $count++;
                }
                if ($result){
                    admin_log('', '削除', '管理者ログ');
                    $link[] = array('text' => '戻す', 'href' => U('index',array('act'=>'list')));
                    $this->sys_msg(sprintf('%d 個のログ記録を削除しました', $count), 0, $link);
                }
            }
        }
        
    }
    
    /* 获取管理员操作记录 */
    /* 获取管理员操作记录 */
    public function get_admin_logs(){
        $db_prefix=C('DB_PREFIX');
        $user_id  = !empty($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
        $admin_ip = !empty($_REQUEST['ip']) ? $_REQUEST['ip']         : '';
        $filter = array();
        $filter['sort_by']      = empty($_REQUEST['sort_by']) ? 'al.log_id' : trim($_REQUEST['sort_by']);
        $filter['sort_order']   = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
        $filter['ip']=$admin_ip;
        //查询条件
        $where = " WHERE 1 ";
        if (!empty($user_id))
        {
            $where .= " AND al.user_id = '$user_id' ";
        }
        elseif (!empty($admin_ip))
        {
            $where .= " AND al.ip_address = '$admin_ip' ";
        }
        /* 获得总记录数据 */
        $sql = 'SELECT COUNT(*) FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_admin_log'). ' AS al ' . $where;
        $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
        
        $filter = page_and_size($filter);
        
        /* 获取管理员日志记录 */
        $list = array();
        $sql  = 'SELECT 
                    al.*, 
                    u.username 
                FROM ' .
                    $GLOBALS['ec_globals']['ecs']->table('ec_admin_log'). ' AS al '.
                    'LEFT JOIN ' .$db_prefix.'user'. ' AS u ON u.uid = al.user_id '.
                $where .' ORDER by '.$filter['sort_by'].' '.$filter['sort_order'];
        $res  = M()->selectLimit($sql, $filter['page_size'], $filter['start']);
        if(!empty($res)){
            foreach($res as $rows){
                $rows['log_time'] = local_date(C('EC_TIME_FORMAT'), $rows['log_time']);
                $list[] = $rows;
            }
        }
        return array(
                    'list' => $list, 
                    'filter' => $filter, 
                    'page_count' =>  $filter['page_count'], 
                    'record_count' => $filter['record_count']);
        
    }
    
    
    

}
?>