<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcRegionControl extends EcControl {
    
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
        //echo 'aaa';die;
    }
    
    public function index(){
        header('Content-type: text/html; charset=' . EC_CHARSET);
        $type   = !empty($_REQUEST['type'])   ? intval($_REQUEST['type'])   : 0;
        $parent = !empty($_REQUEST['parent']) ? intval($_REQUEST['parent']) : 0;
        
        $arr['regions'] = get_regions($type, $parent);
        $arr['type']    = $type;
        $arr['target']  = !empty($_REQUEST['target']) ? stripslashes(trim($_REQUEST['target'])) : '';
        $arr['target']  = htmlspecialchars($arr['target']);
        
        $json = new JSON;
        echo $json->encode($arr);die;
        
    }
    
    
	
}
