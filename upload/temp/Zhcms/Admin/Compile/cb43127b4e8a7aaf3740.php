<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo C("WEBNAME");?><?php if($ur_here){?> - <?php echo $ur_here;?> <?php }?></title>
<meta name="robots" content="noindex, nofollow"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/general.css" rel="stylesheet" type="text/css" />
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/main.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='http://www.works.com/zh/ZHPHP/zhphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
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
var no_brandname = "<?php echo L("admin_ecbrand_js_no_brandname");?>";
var require_num = "<?php echo L("admin_ecbrand_js_require_num");?>";
//-->
</script>
<div class="main-div">
    <form method="post" action="<?php echo U('index');?>" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label"><?php echo L("admin_ecbrand_brand_info_page_table_th1");?></td>
                <td>
                    <input type="text" name="brand_name" maxlength="60" value="<?php echo $brand['brand_name'];?>" /><span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecbrand_brand_info_page_table_th2");?></td>
                <td>
                    <input type="text" name="site_url" maxlength="60" size="40" value="<?php echo $brand['site_url'];?>" />
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('warn_brandlogo');" title="<?php echo L("admin_ecbrand_brand_info_page_table_td1");?>">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="<?php echo L("admin_ecbrand_brand_info_page_table_td1");?>"/>
                    </a><?php echo L("admin_ecbrand_brand_info_page_table_td2");?>
                </td>
                <td>
                    <input type="file" name="brand_logo" id="logo" size="45"/>
                    <?php if($brand['brand_logo'] <> ''){?>
                    <input type="button" value="<?php echo L("admin_ecbrand_brand_info_page_table_td3");?>" onclick="if (confirm('<?php echo L("admin_ecbrand_brand_info_page_table_td4");?>'))location.href='<?php echo U('index');?>&act=drop_logo&id=<?php echo $brand['brand_id'];?>'"/>
                    <?php }?>
                    <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="warn_brandlogo">
                    <?php if($brand['brand_logo'] <> ''){?>
                    <?php echo L("admin_ecbrand_brand_info_page_table_td7");?>
                    <?php  }else{ ?>
                    <?php echo L("admin_ecbrand_brand_info_page_table_td5");?>
                    <?php }?>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecbrand_brand_info_page_table_th3");?></td>
                <td><textarea  name="brand_desc" cols="60" rows="4"  ><?php echo $brand['brand_desc'];?></textarea></td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecbrand_brand_info_page_table_th4");?></td>
                <td><input type="text" name="sort_order" maxlength="40" size="15" value="<?php echo $brand['sort_order'];?>" /></td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecbrand_brand_info_page_table_th6");?></td>
                <td>
                    <input type="radio" name="is_show" value="1" <?php if($brand['is_show'] == 1){?>checked="checked"<?php }?> /> <?php echo L("admin_ecbrand_brand_info_page_table_td8");?>
                    <input type="radio" name="is_show" value="0" <?php if($brand['is_show'] == 0){?>checked="checked"<?php }?> /> <?php echo L("admin_ecbrand_brand_info_page_table_td9");?>
                    <?php echo L("admin_ecbrand_brand_info_page_table_td6");?>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <br />
                    <input type="submit" class="button" value="<?php echo L("admin_ecbrand_brand_info_page_table_btn1");?>" />
                    <input type="reset" class="button" value="<?php echo L("admin_ecbrand_brand_info_page_table_btn2");?>" />
                    <input type="hidden" name="act" value="<?php echo $form_action;?>" />
                    <input type="hidden" name="old_brandname" value="<?php echo $brand['brand_name'];?>" />
                    <input type="hidden" name="id" value="<?php echo $brand['brand_id'];?>" />
                    <input type="hidden" name="old_brandlogo" value="<?php echo $brand['brand_logo'];?>"/>
                </td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script language="JavaScript">
document.forms['theForm'].elements['brand_name'].focus();
    
  /**
 * 检查表单输入的数据
 */
function validate()
{
    validator = new Validator("theForm");
    validator.required("brand_name",  no_brandname);
    validator.isNumber("sort_order", require_num, true);
    return validator.passed();
}
//-->  
</script>
<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
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


