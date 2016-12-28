<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class CaptchaControl extends EcControl {
	//网站首页
	public function index() {
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
