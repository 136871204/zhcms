<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo C("WEBNAME");?><?php if($ur_here){?> - <?php echo $ur_here;?> <?php }?></title>
<meta name="robots" content="noindex, nofollow"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/general.css" rel="stylesheet" type="text/css" />
<link href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/main.css" rel="stylesheet" type="text/css" />
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
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/transport.js"></script>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/common.js"></script>
<script src='http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/json2.js'></script>
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
    var no_content = "<?php echo L("admin_ecusermsg_js_no_content");?>";
    var no_reply_content = "<?php echo L("admin_ecusermsg_js_no_reply_content");?>";
    var no_title = "<?php echo L("admin_ecusermsg_js_no_title");?>"
//-->
</script>
<div class="main-div">
    <table width="98%">
        <tr>
            <td style="padding: 0px 20px">
                <h3><?php echo $msg['msg_title'];?></h3>
                <hr size="1" />
                <div><?php echo nl2br($msg['msg_content']);?></div>
                <?php if($msg['message_img']){?>
                    <div align="right">
                        <a href="http://www.metacms.com/upload/ec/data/feedbackimg/<?php echo $msg['message_img'];?>" target="_bank" width="300" height="400"><?php echo L("admin_ecusermsg_page_table_th1");?></a>
                        <a href="<?php echo U('index');?>&act=drop_file&id=<?php echo $msg['msg_id'];?>&file=<?php echo $msg['message_img'];?>"><?php echo L("admin_ecusermsg_common8");?></a>
                    </div>
                <?php }?>
                <div align="right"  nowrap="nowrap">【 <?php if($msg['msg_area'] == '1'){?><?php echo L("admin_ecusermsg_page_table_th27");?><?php  }else{ ?><?php echo L("admin_ecusermsg_page_table_th28");?><?php }?> 】<a href="mailto:<?php echo $msg['user_email'];?>"><?php echo $msg['user_name'];?></a> @ <?php echo $msg['msg_time'];?></div>
            </td>
        </tr>
        <?php if($msg['msg_area'] == '1'){?>
            <tr>
                <td align="center">
                    <?php if($msg['msg_status'] == '0'){?>
                        <input type="button" onclick="location.href='<?php echo U('index');?>&act=check&check=allow&id=<?php echo $msg['msg_id'];?>'" value="允许显示" class="button" />
                    <?php  }else{ ?>
                        <input type="button" onclick="location.href='<?php echo U('index');?>&act=check&check=forbid&id=<?php echo $msg['msg_id'];?>'" value="forbid" class="button" />
                    <?php }?>
                </td>
            </tr>
        <?php }?>
    </table>
</div>

<?php if($msg['reply_id']){?>
    <div class="main-div">
        <table width="98%">
            <tr>
                <td style="padding: 0px 20px">
                    <h3><?php echo $msg['reply_name'];?> <?php echo L("admin_ecusermsg_page_table_th29");?> <?php echo $msg['reply_time'];?> <?php echo L("admin_ecusermsg_page_table_th12");?>:</h3>
                    <hr size="1" />
                    <div><?php echo nl2br($msg['reply_content']);?></div>
                </td>
            </tr>
        </table>
    </div>
<?php }?>

<?php if($send_fail){?>
<ul style="padding:0; margin: 0; list-style-type:none; color: #CC0000;">
    <li style="border: 1px solid #CC0000; background: #FFFFCC; padding: 10px; margin-bottom: 5px;" >
        <?php echo L("admin_ecusermsg_page_table_th30");?>
    </li>
</ul>
<?php }?>

<div class="main-div">
    <form method="post" action="<?php echo U('index');?>&act=action" name="theForm"  onsubmit="return validate()">
        <table border="0" width="98%">
            <tr>
                <td>email:</td>
                <td><input name="user_email" id="user_email"  type="text" value="<?php echo $msg['reply_email'];?>"/></td>
            </tr>
            <tr>
                <td><?php echo L("admin_ecusermsg_page_table_th31");?>:</td>
                <td rowspan="2">
                    <textarea name="msg_content" cols="50" rows="4" wrap="VIRTUAL" id="msg_content"><?php echo $msg['reply_content'];?></textarea>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td><input name="send_email_notice" type="checkbox" value='1'/><?php echo L("admin_ecusermsg_page_table_th32");?></td>
            </tr>
            <?php if($msg['reply_id']){?>
                <tr>
                    <td>&nbsp;</td>
                    <td><?php echo L("admin_ecusermsg_page_table_th33");?></td>
                </tr>
            <?php }?>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="hidden" name="msg_id" value="<?php echo $msg['msg_id'];?>"/>      
                    <input type="hidden" name="parent_id" value="<?php echo $msg['reply_id'];?>"/>
                    <input name="Submit" value="<?php echo L("admin_ecusermsg_page_table_btn1");?>" type="submit" class="button"/>
                    <input type="reset" value="<?php echo L("admin_ecusermsg_page_table_btn3");?>" class="button"/>
                    <?php if($msg['reply_id']){?>
                        <input type="submit" name="remail" value="<?php echo L("admin_ecusermsg_page_table_btn4");?>" class="button"/>
                    <?php }?>
                </td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script language="JavaScript">
    document.forms['theForm'].elements['msg_content'].focus();
    
    /**
     * 检查表单输入的数据
     */
    function validate()
    {
        validator = new Validator("theForm");
        validator.required("msg_content",  no_reply_content);
        return validator.passed();
    }
    
    onload = function()
    {
        // 开始检查订单
        //startCheckOrder();
    }
</script>
<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script language="JavaScript">
if (document.getElementById("listDiv"))
{
    
    document.getElementById("listDiv").onmouseover = function(e)
    {
        obj = Utils.srcElement(e);
    
        if (obj)
        {
            if (obj.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode;
            else if (obj.parentNode.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode.parentNode;
            else return;
    
            for (i = 0; i < row.cells.length; i++)
            {
                if (row.cells[i].tagName != "TH") row.cells[i].style.backgroundColor = '#F4FAFB';
            }
        }
    
    }
    
    document.getElementById("listDiv").onmouseout = function(e)
    {
        obj = Utils.srcElement(e);
        
        if (obj)
        {
            if (obj.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode;
            else if (obj.parentNode.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode.parentNode;
            else return;
            
            for (i = 0; i < row.cells.length; i++)
            {
                if (row.cells[i].tagName != "TH") row.cells[i].style.backgroundColor = '#FFF';
            }
        }
    }

    
    document.getElementById("listDiv").onclick = function(e)
    {
        var obj = Utils.srcElement(e);
    
        if (obj.tagName == "INPUT" && obj.type == "checkbox")
        {
            if (!document.forms['listForm'])
            {
                return;
            }
            var nodes = document.forms['listForm'].elements;
            var checked = false;
            
            for (i = 0; i < nodes.length; i++)
            {
                if (nodes[i].checked)
                {
                    checked = true;
                    break;
                }
            }
            
            if(document.getElementById("btnSubmit"))
            {
                document.getElementById("btnSubmit").disabled = !checked;
            }
            for (i = 1; i <= 10; i++)
            {
                if (document.getElementById("btnSubmit" + i))
                {
                    document.getElementById("btnSubmit" + i).disabled = !checked;
                }
            }
        }
    }
}
</script>


