<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcQuotationControl extends EcControl {
    
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
        //echo 'aaa';die;
    }
    
    public function index(){
        header("Content-type:text/html;charset=utf-8");
        $action  = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'default';
        if ($action == 'print_quotation')
        {
            echo 'TODO:EcQuotationControl--1';die;
        }
        $this -> assign_template();
        $position = assign_ur_here(0, '报价单');
        $this->assign('page_title', $position['title']);   // 页面标题
        $this->assign('ur_here',    $position['ur_here']); // 当前位置
        
        $this->assign('cat_list', cat_list());
        $this->assign('brand_list',   get_brand_list());
        
        
        $this->assign('helps', get_shop_help()); // 网店帮助
        
        $this -> display('template/' . C('WEB_STYLE') . '/ec/quotation.html');
        
    }
    
	
}
