<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcTemplateControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
        
       
       
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    //$image = new EcImage(C('ec_bgcolor'));
	    //$tdb=M();
        //$exc = new exchange($ecs->table('ec_agency'), $tdb, 'agency_id', 'agency_name');
        
        /*------------------------------------------------------ */
        //-- 办事处列表
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'setup')
        {
            $template_theme = C('WEB_STYLE');
            $curr_template  = empty($_REQUEST['template_file']) ? 'index' : $_REQUEST['template_file'];
            
            $temp_options   = array();
     
            $temp_regions   = get_template_region($template_theme, $curr_template.'.html', false);
            
        }
        
	}

    
    
    
}
