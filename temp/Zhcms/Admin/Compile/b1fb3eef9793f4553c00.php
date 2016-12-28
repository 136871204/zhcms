<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>Model新規</title>
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
</head>
<body>
<form action="<?php echo U('add');?>" method="post" class="zh-form" onsubmit="return zh_submit(this,'<?php echo U(index);?>')">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="<?php echo U('index');?>">Model一覧</a></li>
                <li><a href="javascript:;" class="action">Model新規</a></li>
            </ul>
        </div>
        <div class="title-header">提示</div>
        <div class="help">
            <ul>
                <li>Modelは複雑だから。次のリンクで
                    <a href="http://www.metaphase.co.jp" target="_blank">metaphase</a>
                    ビデオ講座を見てください
                </li>
            </ul>
        </div>
        <div class="title-header">
           	 Model情報
        </div>
        <div class="right_content">
            <table class="table1">
                <tr>
                    <th class="w100">Model名称</th>
                    <td>
                        <input type="text" name="model_name" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>テーブル名</th>
                    <td>
                        <input type="text" name="table_name" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>Model説明</th>
                    <td>
                        <textarea name="description" class="w350 h80"></textarea>
                    </td>
                </tr>
                </table>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" value="確定" class="zh-success"/>
    </div>
</form>
<script>
	$("form").validate({
		model_name:{
			rule:{required:true,ajax:{url:"<?php echo U('checkModelName');?>"}},
			error:{
			 required:'必須',
            ajax:'すでに存在'}
		},
		table_name:{
			rule:{required:true,regexp:/^[a-z0-9]{1,10}$/,ajax:{url:"<?php echo U('checkTableName');?>"}},
			error:{
			 required:'必須',
            regexp:'10文字以下してください',
            ajax:'テーブル名はすでに存在'}
		}
	});
</script>
</body>
</html>