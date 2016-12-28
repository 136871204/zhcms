<?php
$globalConfig 									= require './data/config/config.inc.php';
$web1Config  									= require './data/config/1_config.inc.php';
$web2Config  									= require './data/config/2_config.inc.php';
$web3Config  									= require './data/config/3_config.inc.php';
$web5Config  									= require './data/config/5_config.inc.php';
$web6Config  									= require './data/config/6_config.inc.php';

$globalConfig['EMAIL_FORMMAIL']	=$globalConfig['EMAIL_USERNAME'];//邮箱发件人
$config = array(
    'DB_DRIVER' 							=> 'mysql', //数据库驱动
	'DB_PCONNECT' 					=> true, //数据库持久链接
	'TPL_TAGS' 								=> array('@@.Common.Lib.ContentTag'), //标签
	'AUTO_LOAD_FILE' 				=> array(
                                        'zh/Common/Functions/functions.php',
                                        'zh/Common/Functions/ecconstant.php',
                                        'zh/Common/Functions/TourPage.class.php'), //自动加载文件
	'DEFAULT_GROUP' 				=> 'Zhcms', //默认组
    '404_URL' 								=> '', //404跳转url
	'SESSION_OPTIONS' 				=> array('tpye' => 'mysql', 'table' => 'session'), //session处理
    'URL_TYPE' 								=> 2, //普通模式 GET方式
	'DEFAULT_GROUP' 				=> 'Zhcms', //默认组
    'DEFAULT_APP' 						=> 'Index', //默认应用
	'TPL_FIX' 									=> '.php', //模板后缀
    'UPLOAD_IMG_RESIZE_ON' 	=> true, //图片上传缩放开启
	'EDITOR_SAVE_PATH' 			=> ROOT_PATH . 'upload/editor/' . date('Y/m/d/'), //文件储存目录
	'TPL_ERROR' 							=> 'zh/Common/Template/error.html', //错误页面
	'TPL_SUCCESS' 						=> 'zh/Common/Template/success.html', //正确页面
	 '404_URL'								=> '?m=_404', //404跳转url
     
     /***********************EC*******************/
     'NO_PICTURE'								=> 'Static/ecimage/no_picture.gif', //404跳转url
     
);

$config['URL_REWRITE'] 			= 	intval($globalConfig['OPEN_REWRITE']);//REWRITE重写

if (intval($globalConfig['PATHINFO_TYPE'])) {
	$config['ROUTE'] 					= array(

                                                        
														//	'/^(\d+).html$/' => 'a=Index&c=Index&m=index&page=#1',
														//'/^list_(\d+)_(\d+).html$/' 			=> 'a=Index&c=Index&m=category&mid=#1&cid=#2',
														//'/^list_(\d+)_(\d+)_(\d+).html$/' 	=> 'a=Index&c=Index&m=category&mid=#1&cid=#2&page=#3',
														//'/^(\d+)_(\d+)_(\d+).html$/' 		=> 'a=Index&c=Index&m=content&mid=#1&cid=#2&aid=#3',
														);
}

$config['ROUTE']['/^([0-9a-z]+)$/']	=	'a=Member&c=Space&m=index&u=#1';//个人主页
if (!empty($globalConfig['SESSION_NAME'])) 		
    $config['SESSION_OPTIONS']['name'] 		= $globalConfig['SESSION_NAME'];
if (!empty($globalConfig['SESSION_DOMAIN']))	
    $config['SESSION_OPTIONS']['domain'] 	= $globalConfig['SESSION_DOMAIN'];
    


return array_merge($globalConfig,$web1Config,$web2Config,$web3Config,$web5Config,$web6Config,require './data/config/db.inc.php', $config);

?>