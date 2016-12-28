<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class CompanyControl extends PublicControl {
    
    
	//网站首页
	public function index() {

        //设置显示参数
        //$this->setIndexShowData();

        //缓存时间设定
        //$CacheTime = C('CACHE_INDEX') >= 1 ? C('CACHE_INDEX') : -1;
        //echo U('index/index/index/',array('webid'=>2));
        //$this -> display('template/' . C('WEB_STYLE') . '/erp/index.html');
        
        $company_id=$_SESSION['company_id'];
        $company_sql = "SELECT * FROM " . 'zh_erp_company' . " WHERE company_id = '$company_id'";
        $company_info=M()->getRowSql($company_sql);
        
        
        $uncomplete_task_sql = "SELECT * FROM " . 'zh_erp_points_log' . " WHERE company_id = '$company_id' and (log_status ='1' or log_status ='2') ";
        $uncomplete_task_list=M()->query($uncomplete_task_sql);
        
        //p($uncomplete_task_list);die;
        $this->assign('company_info', $company_info);
        $this->assign('uncomplete_task_list', $uncomplete_task_list);
        
        $this -> display('template/' . C('WEB_STYLE') . '/erp/company.html');
	}
    
}
