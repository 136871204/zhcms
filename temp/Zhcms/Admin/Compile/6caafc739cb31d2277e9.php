<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>METACMS,サイト建築ツール</title>
		<script type='text/javascript' src='http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/css/zhjs.css' rel='stylesheet' media='screen'>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/js/zhjs.js'></script>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/js/slide.js'></script>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
HOST = '<?php echo $GLOBALS['user']['HOST'];?>';
ROOT = '<?php echo $GLOBALS['user']['ROOT'];?>';
WEB = '<?php echo $GLOBALS['user']['WEB'];?>';
URL = '<?php echo $GLOBALS['user']['URL'];?>';
ZHPHP = '<?php echo $GLOBALS['user']['ZHPHP'];?>';
ZHPHPDATA = '<?php echo $GLOBALS['user']['ZHPHPDATA'];?>';
ZHPHPTPL = '<?php echo $GLOBALS['user']['ZHPHPTPL'];?>';
ZHPHPEXTEND = '<?php echo $GLOBALS['user']['ZHPHPEXTEND'];?>';
APP = '<?php echo $GLOBALS['user']['APP'];?>';
CONTROL = '<?php echo $GLOBALS['user']['CONTROL'];?>';
METH = '<?php echo $GLOBALS['user']['METH'];?>';
GROUP = '<?php echo $GLOBALS['user']['GROUP'];?>';
TPL = '<?php echo $GLOBALS['user']['TPL'];?>';
CONTROLTPL = '<?php echo $GLOBALS['user']['CONTROLTPL'];?>';
STATIC = '<?php echo $GLOBALS['user']['STATIC'];?>';
PUBLIC = '<?php echo $GLOBALS['user']['PUBLIC'];?>';
HISTORY = '<?php echo $GLOBALS['user']['HISTORY'];?>';
TEMPLATE = '<?php echo $GLOBALS['user']['TEMPLATE'];?>';
ROOTURL = '<?php echo $GLOBALS['user']['ROOTURL'];?>';
WEBURL = '<?php echo $GLOBALS['user']['WEBURL'];?>';
CONTROLURL = '<?php echo $GLOBALS['user']['CONTROLURL'];?>';
PHPSELF = '<?php echo $GLOBALS['user']['PHPSELF'];?>';
</script>
		<link type="text/css" rel="stylesheet" href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Index/css/welcome.css"/>
	</head>
	<body>
		<div class="wrap">
			<div class="title-header">
				ヒント
			</div>
			<table class="table2">
				<tr>
					<td style="color:red;font-weight: bold;"> 
                        METACMSは本当の100パーセントの無料のオープンソース製品、権利問題についてご心配しないでください。
                    </td>
				</tr>
			</table>
			<div class="title-header">
				安全ヒント
			</div>
			<table class="table2">
				<tr>
					<td>1. デフォルトの応用組目録zhphp（及びサブディレクトリ）の設置：750、ファイルの設置：640</td>
				</tr>
				<tr>
					<td>2. インストール目録を削除をお進めます</td>
				</tr>
			</table>
			<div style="height:10px;overflow: hidden">
				&nbsp;
			</div>
			<div class="title-header">
				METACMSについての更新情報
			</div>
			<table class="table2">
				<tr>
					<td>
					<a href="http://www.metaphase.co.jp" target="_blank">
						>>全ての情報を見る
					</a></td>
				</tr>
			</table>
			<div class="title-header">
				BUG
			</div>
			<table class="table2">
				<tr>
					<td style="color:red">
    					<a href="http://www.metaphase.co.jp" target="_blank">
    						BUG報告
    					</a>
                    </td>
				</tr>
			</table>
			<div style="height:10px;overflow: hidden">
				&nbsp;
			</div>
			<div class="title-header">
				システム情報
			</div>
			<table class="table2">
				<tr>
					<td class="w150">METACMSバージョン</td>
					<td> <?php echo C("METACMS_NAME");?> </td>
				</tr>
				<tr>
					<td class="w80">バージョン番号</td>
					<td><font color="red"><?php echo C("METACMS_VERSION");?></font></td>
				</tr>
				<tr>
					<td class="w80">コアフレーム</td>
					<td>
    					<a href="http://www.metaphase.co.jp" target="_blank">
    						ZHPHP（metaphaseが開発したphpフレーム）
    					</a>
                    </td>
				</tr>
				<tr>
					<td>PHP_OS</td>
					<td><?php echo PHP_OS; ?></td>
				</tr>
				<tr>
					<td>実行環境</td>
					<td> <?php echo $_SERVER['SERVER_SOFTWARE'];?> </td>
				</tr>
				<tr>
					<td>アップロードサイズ</td>
					<td><?php echo ini_get("upload_max_filesize"); ?></td>
				</tr>
				<tr>
					<td>空き容量</td>
					<td><?php echo get_size(disk_free_space(".")); ?></td>
				</tr>
			</table>
			<div style="height:10px;overflow: hidden">
				&nbsp;
			</div>
			<div class="title-header">
				開発チーム
			</div>
			<table class="table2">
				<tr>
					<td class="w150">所有権</td>
					<td>
					<a href="http://www.metaphase.co.jp" target="_blank">
						metaphase
					</a> &
					<a href="http://www.metaphase.co.jp" target="_blank">
						METACMS
					</a></td>
				</tr>
				<tr>
					<td>作者</td>
					<td> metaphase:周鸿 </td>
				</tr>
				<tr>
					<td>感謝</td>
					<td>
					<a href="http://www.metaphase.co.jp" target="_blank">
						metaphase
					</a>
                    </td>
				</tr>
			</table>
			<div style="height:10px;overflow: hidden">
				&nbsp;
			</div>
		</div>
		<script type="text/javascript" charset="utf-8">
            /*$.ajax({
				url:'http://www.metacms.com/index.php?a=Admin&c=Version&m=checkVersion',
				dataType:"jsonp",
				data:{version:'<?php echo C("ZHCMS_VERSION");?>'},
				crossDomain:true
			});
			function JsonpCallBack(json){
				if (json.state == 1) {
							$.modal({
				            width: 420,
				            height: 180,
				            title: "<?php echo L("admin_index_welcome_page_js_message1");?>",
				            message: json.message,
				            button_cancel: "<?php echo L("admin_index_welcome_page_js_message2");?>",
				            type:'success',//类型
        				});
        			}
			}*/
			//TODO:可以调用远程api检查版本信息，提示更新
		</script>
	</body>
</html>