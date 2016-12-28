<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcCaptchaControl extends EcControl {
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
        //echo 'aaa';die;
    }
    
	//网站首页
	public function index() {
	   //p($_SESSION);die;
        //import('ZHPHP.Extend.Tool.EcCaptcha');
        $img = new EcCaptcha(ROOT_PATH . 'data/captcha/', 100, 20);
        //@ob_end_clean(); //清除之前出现的多余输入
        if (isset($_REQUEST['is_login']))
        {
            $img->session_word = 'captcha_login';
        }
        $img->generate_image();
	}
    
    
}
