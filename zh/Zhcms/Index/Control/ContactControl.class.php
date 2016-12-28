<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class ContactControl extends PublicControl {
    
    
	//网站首页
	public function index() {



        //缓存时间设定
        $CacheTime = C('CACHE_INDEX') >= 1 ? C('CACHE_INDEX') : -1;
        //echo U('index/index/index/',array('webid'=>2));
        $this -> display('template/' . C('WEB_STYLE') . '/contact/index.html', $CacheTime);
	}
    
    
    public function contact_process(){
        $contactModel=K('Contact');
        $data=$_POST;
        $data['addtime']=time();
        if($contactModel->add($data)){
            echo '感谢您的咨询，我们会在24小时内联系你!';
        }else{
            echo '系统繁忙，请稍后尝试';
        }
        
        exit;
    }
}
