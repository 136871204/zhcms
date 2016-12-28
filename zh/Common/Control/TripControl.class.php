<?php
/**
 * 前台使用的公共控制器
 * Class PublicControl
 */
class TripControl extends PublicControl {
	
    //缓存目录
	public $webid;
    
	// 构造函数
	public function __construct() {
	   
		parent::__construct();
        
		$webid=Q('webid',1);
        $this->webid=$webid;
        define('__WEBID__',$webid);
        $this->setWebSeo($webid);
        $this->setWebList($webid);
        $this->setWeiboWeichat($webid);
        $this->setAlldayPhone($webid);
        $this->setMainnav($webid);
	}
    
    public function setWebSeo($webid){
        $webname=C($webid.'_webname');
        $web_title=C($webid.'_web_title');
        $web_keywords=C($webid.'_keywords');
        $web_description=C($webid.'_description');

        $this -> assign("webid", $webid);
        $this -> assign("webname", $webname);
        $this -> assign("web_title", $web_title);
        $this -> assign("web_keywords", $web_keywords);
        $this -> assign("web_description", $web_description);
    }
    
    public function setWebList($webid){
        $weblistModel=K("Weblist");
        $weblist=$weblistModel->All();
        foreach($weblist as $k => &$v){
            if($webid==$v['id']){
                $this -> assign("web_site_name", $v['webname']);
            }
            $v['allday_phone']=C($v['id'].'_allday_phone');
        }
        $this -> assign("weblist", $weblist);
    }
    
    public function setWeiboWeichat($webid)
    {
        $web_weichat_qr=C($webid.'_weichat_qr');
        $this -> assign("web_weichat_qr", $web_weichat_qr);
        
        $web_weibo_link=C($webid.'_weibo_link');
        $this -> assign("web_weibo_link", $web_weibo_link);
    }
    
    public function setAlldayPhone($webid){
        $web_allday_phone=C($webid.'_allday_phone');
        $this -> assign("web_allday_phone", $web_allday_phone);
    }
    
    
    public function setMainnav($webid){
        $mainnavModel=K("Mainnav");
        $mainnav=$mainnavModel->where(" webid = $webid ")->order('  displayorder asc ')->All();

        $this -> assign("mainnav", $mainnav);
    }
    



}
