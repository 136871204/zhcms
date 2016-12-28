<?php

/**
 * 访问权限验证
 * Class AuthControl
 */
class EcAdminControl extends AuthControl{
    public function __construct() {
        parent::__construct();
        $this->ec_init();
    }
    
    public function ec_init(){
        if (!defined('ZHPHP_PATH'))
        {
            die('Hacking attempt');
        }
        define('ECS_ADMIN', true);
        if (__FILE__ == '')
        {
            die('Fatal error code: 0');
        }
        //define('EC_CHARSET','utf-8');
        
        /* 创建 ECSHOP 对象 */
        $ecs = new ECS(C('DB_DATABASE'), C('DB_PREFIX'));
        define('EC_DATA_DIR', $ecs->data_dir());
        define('EC_IMAGE_DIR', $ecs->image_dir());
        $GLOBALS['ec_globals']['ecs']=$ecs;
        
        $this->assign('help_open',C('ec_help_open'));
        
        $this->set_ec_config();
        

        $_SESSION['discount']    = 1.00;
        $_SESSION['user_rank']   = 0;
    }
    
    public function set_ec_config(){
        /*$cookie_path    = "/";
        $cookie_domain    = "";
        $session = "1440";
        $GLOBALS['ec_globals']['cookie_path']=$cookie_path;
        $GLOBALS['ec_globals']['cookie_domain']=$cookie_domain;
        $GLOBALS['ec_globals']['session']=$session;*/
        include(ROOT_PATH.'data/config/ec_config.inc.php');

        /*define('EC_CHARSET','utf-8');
        define('ADMIN_PATH','admin');
        define('AUTH_KEY', 'this is a key');
        define('OLD_AUTH_KEY', '');
        define('API_TIME', '2015-12-07 10:30:14');*/
    }
    
    /**
     * 生成编辑器
     * @param   string  input_name  输入框名称
     * @param   string  input_value 输入框值
     */
    public function create_html_editor($input_name, $input_value = '')
    {
    
        $editor = new FCKeditor($input_name);
        //echo 
        $editor->BasePath   = __ZHPHP_EXTEND__.'/Org/fckeditor/';
        $editor->ToolbarSet = 'Normal';
        $editor->Width      = '100%';
        $editor->Height     = '320';
        $editor->Value      = $input_value;
        $FCKeditor = $editor->CreateHtml();
        $this->assign('FCKeditor', $FCKeditor);
        
    }
}
