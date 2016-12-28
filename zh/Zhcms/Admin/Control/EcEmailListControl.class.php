<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcEmailListControl extends EcAdminControl {
   // protected $db;
    
    public function __init() {
        $_LANG['stat'][0] = '未确认';
        $_LANG['stat'][1] = '已确认';
        $_LANG['stat'][2] = '已退订';
        $this->assign('lang',   $_LANG);
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    /*$image = new EcImage(C('ec_bgcolor'));
	    $tdb=M();
	    $exc = new exchange($ecs->table("ec_brand"), $tdb, 'brand_id', 'brand_name');*/
        
        if ($_REQUEST['act'] == 'list'){
            $emaildb = $this -> get_email_list();
            $this->assign('full_page',    1);
            $this->assign('ur_here', '邮件订阅管理');
            $this->assign('emaildb',      $emaildb['emaildb']);
            $this->assign('filter',       $emaildb['filter']);
            $this->assign('record_count', $emaildb['record_count']);
            $this->assign('page_count',   $emaildb['page_count']);
            //assign_query_info();
            $this->display('email_list.htm');
    
            //p($emaildb);die;
        }
        elseif ($_REQUEST['act'] == 'export')
        {
            $sql = "SELECT email FROM " . $ecs->table('ec_email_list') . "WHERE stat = 1";
            $emails = M()->getAll($sql);
            $out = '';
            if(!empty($emails))
            {
                foreach ($emails as $key => $val)
                {
                    $out .= "$val[email]\n";
                }
            }
            
            $contentType = 'text/plain';
            $len = strlen($out);
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s',time()+31536000) .' GMT');
            header('Pragma: no-cache');
            header('Content-Encoding: none');
            header('Content-type: ' . $contentType);
            header('Content-Length: ' . $len);
            header('Content-Disposition: attachment; filename="email_list.txt"');
            echo $out;
            exit;
        }
        elseif ($_REQUEST['act'] == 'query')
        {
            $emaildb = $this -> get_email_list();
            $this->assign('emaildb',      $emaildb['emaildb']);
            $this->assign('filter',       $emaildb['filter']);
            $this->assign('record_count', $emaildb['record_count']);
            $this->assign('page_count',   $emaildb['page_count']);
        
            $sort_flag  = sort_flag($emaildb['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('email_list.htm'), '',
                array('filter' => $emaildb['filter'], 'page_count' => $emaildb['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 批量删除
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'batch_remove')
        {
            if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']))
            {
                $this->sys_msg('没有选定的Email', 1);
            }
        
            $sql = "DELETE FROM " . $ecs->table('ec_email_list') .
                    " WHERE id " . db_create_in(join(',', $_POST['checkboxes']));
            $affected_rows= M()->exe($sql);
        
            $lnk[] = array('text' => '返回邮件列表', 'href' => U('index').'&act=list');
            $this->sys_msg(sprintf('已成功删除 E-mail地址', $affected_rows), 0, $lnk);
        }
        
        /*------------------------------------------------------ */
        //-- 批量恢复
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'batch_unremove')
        {
            if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']))
            {
                $this->sys_msg('没有选定的Email', 1);
            }
        
            $sql = "UPDATE " . $ecs->table('ec_email_list') .
                    " SET stat = 1 WHERE stat <> 1 AND id " . db_create_in(join(',', $_POST['checkboxes']));
            $affected_rows=M()->exe($sql);
        
            $lnk[] = array('text' => '返回邮件列表', 'href' => U('index').'&act=list');
            $this->sys_msg(sprintf('已成功确认 E-mail地址', $affected_rows), 0, $lnk);
        }

        /*------------------------------------------------------ */
        //-- 批量退订
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'batch_exit')
        {
            //p($_POST);die;
            if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']))
            {
                $this->sys_msg('没有选定的Email', 1);
            }
        
            $sql = "UPDATE " . $ecs->table('ec_email_list') .
                    " SET stat = 2 WHERE stat <> 2 AND id " . db_create_in(join(',', $_POST['checkboxes']));
            $affected_rows= M()->exe($sql);
        
            $lnk[] = array('text' => '返回邮件列表', 'href' => U('index').'&act=list');
            $this->sys_msg(sprintf('已成功退订 E-mail地址', $affected_rows), 0, $lnk);
        }
        
                        
        
        
	}
    
    public function get_email_list()
    {
        $result = get_filter();
        if ($result === false)
        {
            $filter['sort_by']      = empty($_REQUEST['sort_by']) ? 'stat' : trim($_REQUEST['sort_by']);
            $filter['sort_order']   = empty($_REQUEST['sort_order']) ? 'ASC' : trim($_REQUEST['sort_order']);
    
            $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_email_list');
            $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
    
            /* 分页大小 */
            $filter = page_and_size($filter);
    
            /* 查询 */
    
            $sql = "SELECT * FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_email_list') .
                " ORDER BY " . $filter['sort_by'] . ' ' . $filter['sort_order'] .
                " LIMIT " . $filter['start'] . ",$filter[page_size]";
    
            set_filter($filter, $sql);
        }
        else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
    
        $emaildb = M()->getAll($sql);
    
        $arr = array('emaildb' => $emaildb, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
    
        return $arr;
    }
    
    
    
}
