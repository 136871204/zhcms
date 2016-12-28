<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
	<head>
		<title>文章修正</title>
		<link rel="shortcut icon" href="favicon.ico">
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		<link href='http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/css/bootstrap.min.css' rel='stylesheet' media='screen'>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/js/bootstrap.min.js'></script>
                <!--[if lte IE 6]>
                <link rel="stylesheet" type="text/css" href="http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
                <![endif]-->
                <!--[if lt IE 9]>
                <script src="http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/js/html5shiv.min.js"></script>
                <script src="http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/js/respond.min.js"></script>
                <![endif]-->
		<link rel="stylesheet" type="text/css" href="http://www.metacms.com/zh/Zhcms/Member/Tpl/Content/css/content.css?ver=1.0"/>
		<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Content/js/addEdit.js"></script>
		<link type="text/css" rel="stylesheet" href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Content/css/css.css"/>
	</head>
	<body>
		<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><header class="header center-block">
    <h1>
        <a href="http://www.metacms.com">metaphase</a>
    </h1>
</header>
<nav class="top-menu">
    <div class="nav center-block">
        <a href="http://www.metacms.com">トップ</a>
        <a href="http://www.metacms.com/index.php?a=Member&c=Content&m=index&mid=1">私の文章</a>
        <a href="http://www.metacms.com/<?php echo $_SESSION['domain'];?>" target="_blank">マイスペース</a>
        <a href="http://www.metacms.com/index.php?a=Member&c=Login&m=quit" class="pull-right">ログアウト</a>
    </div>
</nav>
		<form method="post" onsubmit="return false;">
			<input type="hidden" name="mid" value="<?php echo $_REQUEST['mid'];?>"/>
    		<input type="hidden" name="aid" value="<?php echo $_REQUEST['aid'];?>"/>
			<div class="main center-block">
				
				<div class="form">
					
					<div class="title-header">文章修正</div>
					<table class="table1">
						<?php foreach($form['base'] as $field):
						?>
						<tr>
							<th class="w80"> <?php echo $field['title'];?> <td> <?php echo $field['form'];?> </td>
						</tr>
						<?php endforeach; ?>
					</table>
					<div class="position-bottom" style="position: relative;">
				<input type="submit" class="zh-success" value="確認"/>
				<input type="button" class="zh-cancel" onclick="zh_close_window()" value="閉じる"/>
			</div>
				</div>
				<div class="help">
					<table class="table1">
						<?php foreach($form['nobase'] as $field):
						?>
						<tr>
							<th><?php echo $field['title'];?></th>
						</tr>
						<tr>
							<td> <?php echo $field['form'];?> </td>
						</tr>
						<?php endforeach; ?>
					</table>
					<h1 style="margin-top:20px;">ヒント</h1>
					<ul>
						<li>
							確認する前に、入力したタイトル或いは内容をチェックしてください
						</li>
						<li>
							添付ファイルアップロードする時、zip或いはrarに圧縮して後にしてください
						</li>
					</ul>
				</div>

			</div>

		</form>
	</body>
</html>