<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title><?php echo L("admin_personal_edit_info_page_title");?></title>
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
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Personal/js/edit_info.js"></script>
    <script>
    var admin_personal_edit_info_js_error1='<?php echo L("admin_personal_edit_info_js_error1");?>';
    var admin_personal_edit_info_js_error2='<?php echo L("admin_personal_edit_info_js_error2");?>';
    var admin_personal_edit_info_js_error3='<?php echo L("admin_personal_edit_info_js_error3");?>';
    </script>
</head>
<body>
<div class="wrap">
    <div class="title-header"><?php echo L("admin_personal_edit_info_page_title");?></div>
    <form action="<?php echo U('edit_info');?>" method="post" onsubmit="return zh_submit(this,'http://www.works.com/index.php?a=Admin&c=Personal&m=edit_info')" class="zh-form">
        <input type="hidden" name="uid" value="<?php echo $_SESSION['uid'];?>"/>
        <table class="table1">
            <tr>
                <th class="w100"><?php echo L("admin_personal_edit_info_page_form_username");?></th>
                <td>
                    <?php echo $user['username'];?>
                </td>
            </tr>
            <tr>
                <th class="w100"><?php echo L("admin_personal_edit_info_page_form_language");?></th>
                <td>
                    <select name="language">
                        <?php if(is_array($selectlan)):?><?php $index=0; ?><?php  foreach($selectlan as $lank=>$lanv){ ?>
                            <option value="<?php echo $lank;?>"
                            <?php if($user['language'] == $lank){?>selected="selected"<?php }?>
                            >
                            <?php echo $lanv;?>
                            </option>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="w100"><?php echo L("admin_personal_edit_info_page_form_logintime");?></th>
                <td>
                    <?php echo date('Y-m-d',$user['logintime']);?>
                </td>
            </tr>
            <tr>
                <th class="w100"><?php echo L("admin_personal_edit_info_page_form_lastip");?></th>
                <td>
                    <?php echo $user['lastip'];?>
                </td>
            </tr>
            <tr>
                <th class="w100"><?php echo L("admin_personal_edit_info_page_form_nickname");?></th>
                <td>
                    <input type="text" name="nickname" class="w200" value="<?php echo $user['nickname'];?>"/>
                </td>
            </tr>
            <tr>
                <th class="w100"><?php echo L("admin_personal_edit_info_page_form_email");?></th>
                <td>
                    <input type="text" name="email" class="w200" value="<?php echo $user['email'];?>"/>
                </td>
            </tr>
        </table>
        <div class="position-bottom">
            <input type="submit" class="zh-success" value="<?php echo L("admin_personal_edit_info_page_form_submit");?>"/>
        </div>
    </form>
</div>
</body>
</html>