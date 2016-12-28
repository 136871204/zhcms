<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo C("WEBNAME");?><?php if($ur_here){?> - <?php echo $ur_here;?> <?php }?></title>
<meta name="robots" content="noindex, nofollow"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/general.css" rel="stylesheet" type="text/css" />
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/main.css" rel="stylesheet" type="text/css" />
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
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/transport.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/common.js"></script>
<script src='http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/json2.js'></script>
<script language="JavaScript">

</script>
</head>
<body>

<h1>
<?php if($action_link){?>
<span class="action-span"><a href="<?php echo $action_link['href'];?>"><?php echo $action_link['text'];?></a></span>
<?php }?>
<?php if($action_link2){?>
<span class="action-span"><a href="<?php echo $action_link2['href'];?>"><?php echo $action_link2['text'];?></a>&nbsp;&nbsp;</span>
<?php }?>
<span class="action-span1">
    <a href="index.php?act=main"><?php echo C("WEBNAME");?></a> 
</span>
<span id="search_id" class="action-span1">
    <?php if($ur_here){?> - <?php echo $ur_here;?> <?php }?>
</span>
<div style="clear:both"></div>
</h1>

<script language="JavaScript">
<!--
// 这里把JS用到的所有语言都赋值到这里
var process_request = "<?php echo L("admin_eccommon_js_process_request");?>";
var todolist_caption = "<?php echo L("admin_eccommon_js_todolist_caption");?>";
var todolist_autosave = "<?php echo L("admin_eccommon_js_todolist_autosave");?>";
var todolist_save = "<?php echo L("admin_eccommon_js_todolist_save");?>";
var todolist_clear = "<?php echo L("admin_eccommon_js_todolist_clear");?>";
var todolist_confirm_save = "<?php echo L("admin_eccommon_js_todolist_confirm_save");?>";
var todolist_confirm_clear = "<?php echo L("admin_eccommon_js_todolist_confirm_clear");?>";
var no_content = "<?php echo L("admin_eccommentmanage_js_no_content");?>";
//-->
</script>
<!-- comment content list -->
<div class="main-div">
    <table width="100%">
        <tr>
            <td>
                <a href="mailto:<?php echo $msg['email'];?>"><b><?php if($msg['user_name']){?><?php echo $msg['user_name'];?><?php  }else{ ?><?php echo L("admin_eccommentmanage_list_page_table_td1");?><?php }?></b></a>&nbsp;<?php echo L("admin_eccommentmanage_info_page_table_td1");?>
                &nbsp;<?php echo $msg['add_time'];?>&nbsp;<?php echo L("admin_eccommentmanage_info_page_table_td2");?>&nbsp;<b><?php echo $id_value;?></b>&nbsp;<?php echo L("admin_eccommentmanage_info_page_table_td3");?>
            </td>
        </tr>
        <tr>
            <td><hr color="#dadada" size="1"/></td>
        </tr>
        <tr>
            <td>
                <div style="overflow:hidden; word-break:break-all;"><?php echo $msg['content'];?></div>
                <div align="right">
                    <b><?php echo L("admin_eccommentmanage_info_page_table_td4");?>:</b> <?php echo $msg['comment_rank'];?>&nbsp;&nbsp;
                    <b><?php echo L("admin_eccommentmanage_list_page_table_th5");?></b>: <?php echo $msg['ip_address'];?>
                </div>
            </td>
        </tr>
        <tr>
            <td align="center">
                <?php if($msg['status'] == "0"){?>
                    <input type="button" onclick="location.href='<?php echo U('index');?>&act=check&check=allow&id=<?php echo $msg['comment_id'];?>'" value="<?php echo L("admin_eccommentmanage_list_page_table_td9");?>" class="button" />
                <?php  }else{ ?>
                    <input type="button" onclick="location.href='<?php echo U('index');?>&act=check&check=forbid&id=<?php echo $msg['comment_id'];?>'" value="<?php echo L("admin_eccommentmanage_list_page_table_td10");?>" class="button" />
                <?php }?>
            </td>
        </tr>
    </table>
</div>
<?php if($reply_info['content']){?>
<!-- reply content list -->
<div class="main-div">
    <table width="100%">
        <tr>
            <td>
                <?php echo L("admin_eccommentmanage_info_page_table_td5");?>&nbsp;<a href="mailto:<?php echo $msg['email'];?>"><b><?php echo $reply_info['user_name'];?></b></a>&nbsp;<?php echo L("admin_eccommentmanage_info_page_table_td1");?>
                &nbsp;<?php echo $reply_info['add_time'];?>&nbsp;<?php echo L("admin_eccommentmanage_info_page_table_td6");?>
            </td>
        </tr>
        <tr>
            <td><hr color="#dadada" size="1"/></td>
        </tr>
        <tr>
            <td>
                <div style="overflow:hidden; word-break:break-all;"><?php echo $reply_info['content'];?></div>
                <div align="right">
                    <b><?php echo L("admin_eccommentmanage_list_page_table_th5");?></b>: <?php echo $reply_info['ip_address'];?>
                </div>
            </td>
        </tr>
    </table>
</div>
<?php }?>


<?php if($send_fail){?>
<ul style="padding:0; margin: 0; list-style-type:none; color: #CC0000;">
    <li style="border: 1px solid #CC0000; background: #FFFFCC; padding: 10px; margin-bottom: 5px;" ><?php echo L("admin_eccommentmanage_info_page_table_td7");?></li>
</ul>
<?php }?>

<div class="main-div">
    <form method="post" action="<?php echo U('index');?>&act=action" name="theForm" onsubmit="return validate()">
        <table border="0" align="center">
            <tr>
                <th colspan="2">
                    <strong><?php echo L("admin_eccommentmanage_info_page_table_td8");?></strong>
                </th>
            </tr>
            <tr>
                <td><?php echo L("admin_eccommentmanage_list_page_table_th2");?>:</td>
                <td>
                    <input name="user_name" type="text" <?php if($reply_info['user_name'] == ""){?>value="<?php echo $admin_info['username'];?>"<?php  }else{ ?> value="<?php echo $reply_info['user_name'];?>"<?php }?> size="30" readonly="true" />
                </td>
            </tr>
            <tr>
                <td><?php echo L("admin_eccommentmanage_info_page_table_td9");?>:</td>
                <td>
                    <input name="email" type="text" <?php if($reply_info['email'] == ""){?>value="<?php echo $admin_info['email'];?>"<?php  }else{ ?> value="<?php echo $reply_info['email'];?>"<?php }?> size="30" readonly="true" />
                </td>
            </tr>
            <tr>
                <td><?php echo L("admin_eccommentmanage_info_page_table_td10");?>:</td>
                <td><textarea name="content" cols="50" rows="4" wrap="VIRTUAL"><?php echo $reply_info['content'];?></textarea></td>
            </tr>
            <?php if($reply_info['content']){?>
            <tr>
                <td>&nbsp;</td>
                <td><?php echo $zh['lanuage']['admin_eccommentmanage_info_page_table_td11'];?></td>
            </tr>
            <?php }?>
            <tr>
                <td></td>
                <td><input name="send_email_notice" type="checkbox" value='1'/><?php echo L("admin_eccommentmanage_info_page_table_td12");?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input name="submit" type="submit" value="<?php echo L("admin_eccommentmanage_list_page_table_btn2");?>" class="button"/>
                    <input type="reset" value="<?php echo L("admin_eccommentmanage_list_page_table_btn3");?>" class="button"/>
                    <?php if($reply_info['content']){?>
                        <input type="submit" name="remail" value="<?php echo L("admin_eccommentmanage_info_page_table_td13");?>" class="button"/>
                    <?php }?>
                    <input type="hidden" name="comment_id" value="<?php echo $msg['comment_id'];?>"/>
                    <input type="hidden" name="comment_type" value="<?php echo $msg['comment_type'];?>"/>
                    <input type="hidden" name="id_value" value="<?php echo $msg['id_value'];?>"/>
                </td>
            </tr>
        </table>
    </form>
</div>

<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script language="JavaScript">

document.forms['theForm'].elements['content'].focus();

/**
 * 检查表单输入的数据
 */
function validate()
{
    validator = new Validator("theForm");
    validator.required("content",  no_content);
    return validator.passed();
}


</script>



