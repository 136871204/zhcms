<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>会員グループ管理</title>
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
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Group/js/js.js"></script>
    <script>
    var admin_group_page_js_message1='グループ名は必須';
    var admin_group_page_js_message2='会員グループはすでに存在';
    var admin_group_page_js_message3='積分は必須';
    var admin_group_page_js_message4='積分は数値でお願いします';
    </script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U('index');?>">会員グループ一覧</a></li>
            <li><a href="javascript:;" class="action">会員グループ新規</a></li>
        </ul>
    </div>
    <div class="title-header"><?php echo L("admin_group_add_page_form_header");?></div>
    <form action="<?php echo U(add);?>" method="post" class="zh-form" onsubmit="return zh_submit(this,'<?php echo U(index);?>');">
        <table class="table1">
            <tr>
                <th class="w150">会員グループ名</th>
                <td>
                    <input type="text" name="rname" class="w300" required=""/>
                </td>
            </tr>
            <tr>
                <th class="w100">積分&lt;</th>
                <td>
                    <input type="text" name="creditslower" class="w300" required=""/>
                </td>
            </tr>
            <tr>
                <th class="w100">コメント審査必要ない</th>
                <td>
                    <label>
                        <input type="radio" name="comment_state" value="1" /> YES
                    </label> 
                    <label>
                        <input type="radio" name="comment_state" value="0" checked="checked"/> NO
                    </label>
                </td>
            </tr>
            <tr>
                <th class="w100">メッセージ発表許す</th>
                <td>
                    <label>
                        <input type="radio" name="allowsendmessage" value="1"/>YES
                    </label> 
                    <label>
                        <input type="radio" name="allowsendmessage" value="0" checked="checked"/>NO
                    </label>
                </td>
            </tr>
            <tr>
                <th class="w100">説明</th>
                <td>
                    <input type="text" name="title" class="w300"/>
                </td>
            </tr>
        </table>
        <div class="position-bottom">
            <input type="submit" value="確定" class="zh-success"/>
        </div>
    </form>
</div>
</body>
</html>