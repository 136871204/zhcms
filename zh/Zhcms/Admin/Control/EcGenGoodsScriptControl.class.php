<?php
/**
 * 管理员管理模块
 * Class AdministratorControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcGenGoodsScriptControl extends EcAdminControl{
    
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
        
        if ($_REQUEST['act'] == 'setup')
        {
        
            $_LANG['intro']['is_best'] = L('admin_ecgengoodsscript_control_index_setup1');
            $_LANG['intro']['is_new'] = L('admin_ecgengoodsscript_control_index_setup2');
            $_LANG['intro']['is_hot'] = L('admin_ecgengoodsscript_control_index_setup3');
            $_LANG['intro']['is_promote'] = L('admin_ecgengoodsscript_control_index_setup4');
            $_LANG['intro']['is_random'] = L('admin_ecgengoodsscript_control_index_setup5');
            /* 编码 */
            $lang_list = array(
                'UTF8'   => L('admin_ecgengoodsscript_control_index_setup6'),
                'GB2312' => L('admin_ecgengoodsscript_control_index_setup7'),
                'BIG5'   => L('admin_ecgengoodsscript_control_index_setup8'),
            );
        
            /* 参数赋值 */
            $ur_here = L('admin_ecgengoodsscript_control_index_setup9');
            $this->assign('ur_here',    $ur_here);
            $this->assign('cat_list',   cat_list());
            $this->assign('brand_list', get_brand_list());
            $this->assign('intro_list', $_LANG['intro']);
            $this->assign('url',        ROOT_URL);
            $this->assign('lang_list',  $lang_list);
        
            /* 显示模板 */
            //assign_query_info();
            $this->display('gen_goods_script.htm');
        }
                
    }
    
    
    
    

}
?>