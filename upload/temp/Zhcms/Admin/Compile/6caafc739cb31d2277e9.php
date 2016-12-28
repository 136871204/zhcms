<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title><?php echo L("admin_index_welcome_page_title");?></title>
		<script type='text/javascript' src='http://www.works.com/zh/ZHPHP/zhphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://www.works.com/zh/ZHPHP/zhphp/../zhjs/css/zhjs.css' rel='stylesheet' media='screen'>
<script src='http://www.works.com/zh/ZHPHP/zhphp/../zhjs/js/zhjs.js'></script>
<script src='http://www.works.com/zh/ZHPHP/zhphp/../zhjs/js/slide.js'></script>
<script src='http://www.works.com/zh/ZHPHP/zhphp/../zhjs/org/cal/lhgcalendar.min.js'></script>
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
		<link type="text/css" rel="stylesheet" href="http://www.works.com/zh/Zhcms/Admin/Tpl/Index/css/welcome.css"/>
	</head>
	<body>
		<div class="wrap">
			<div class="title-header">
				<?php echo L("admin_index_welcome_page_header1");?>
			</div>
			<table class="table2">
				<tr>
					<td style="color:red;font-weight: bold;"> 
                    <?php echo L("admin_index_welcome_page_header1_message1");?>
                    </td>
				</tr>
			</table>
			<div class="title-header">
				<?php echo L("admin_index_welcome_page_header2");?>
			</div>
			<table class="table2">
				<tr>
					<td>1. <?php echo L("admin_index_welcome_page_header2_message1");?></td>
				</tr>
				<tr>
					<td>2. <?php echo L("admin_index_welcome_page_header2_message2");?></td>
				</tr>
			</table>
			<div style="height:10px;overflow: hidden">
				&nbsp;
			</div>
			<div class="title-header">
				<?php echo L("admin_index_welcome_page_header3");?>
			</div>
			<table class="table2">
				<tr>
					<td>
					<a href="http://www.metaphase.co.jp" target="_blank">
						>><?php echo L("admin_index_welcome_page_header3_message1");?>
					</a></td>
				</tr>
			</table>
			<div class="title-header">
				<?php echo L("admin_index_welcome_page_header4");?>
			</div>
			<table class="table2">
				<tr>
					<td style="color:red">
					<a href="http://www.metaphase.co.jp" target="_blank">
						<?php echo L("admin_index_welcome_page_header4_message1");?>
					</a></td>
				</tr>
			</table>
			<div style="height:10px;overflow: hidden">
				&nbsp;
			</div>
			<div class="title-header">
				<?php echo L("admin_index_welcome_page_header5");?>
			</div>
			<table class="table2">
				<tr>
					<td class="w150"><?php echo L("admin_index_welcome_page_header5_message1");?></td>
					<td> <?php echo C("ZHCMS_NAME");?> </td>
				</tr>
				<tr>
					<td class="w80"><?php echo L("admin_index_welcome_page_header5_message2");?></td>
					<td><font color="red"><?php echo C("ZHCMS_VERSION");?></font></td>
				</tr>
				<tr>
					<td class="w80"><?php echo L("admin_index_welcome_page_header5_message3");?></td>
					<td>
					<a href="http://www.metaphase.co.jp" target="_blank">
						ZHPHP
					</a></td>
				</tr>
				<tr>
					<td><?php echo L("admin_index_welcome_page_header5_message4");?></td>
					<td><?php echo PHP_OS; ?></td>
				</tr>
				<tr>
					<td><?php echo L("admin_index_welcome_page_header5_message5");?></td>
					<td> <?php echo $_SERVER['SERVER_SOFTWARE'];?> </td>
				</tr>
				<tr>
					<td><?php echo L("admin_index_welcome_page_header5_message6");?></td>
					<td><?php echo ini_get("upload_max_filesize"); ?></td>
				</tr>
				<tr>
					<td><?php echo L("admin_index_welcome_page_header5_message7");?></td>
					<td><?php echo get_size(disk_free_space(".")); ?></td>
				</tr>
			</table>
			<div style="height:10px;overflow: hidden">
				&nbsp;
			</div>
			<div class="title-header">
				<?php echo L("admin_index_welcome_page_header6");?>
			</div>
			<table class="table2">
				<tr>
					<td class="w150"><?php echo L("admin_index_welcome_page_header6_message1");?></td>
					<td>
					<a href="http://www.metaphase.co.jp" target="_blank">
						metaphase
					</a> &
					<a href="http://www.metaphase.co.jp" target="_blank">
						ZHCMS
					</a></td>
				</tr>
				<tr>
					<td><?php echo L("admin_index_welcome_page_header6_message2");?></td>
					<td> metaphase:周鸿 </td>
				</tr>
				<tr>
					<td><?php echo L("admin_index_welcome_page_header6_message3");?></td>
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
				url:'http://www.works.com/index.php?a=Admin&c=Version&m=checkVersion',
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