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
    var no_catname = "<?php echo L("admin_ecarticlecat_js_no_catname");?>";
    var sys_hold = "<?php echo L("admin_ecarticlecat_js_sys_hold");?>";
    var remove_confirm = "<?php echo L("admin_ecarticlecat_js_remove_confirm");?>";
//-->
</script>
<div class="main-div">
    <form method="post" action="<?php echo U('index');?>" name="theForm"  onsubmit="return validate()">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label"><?php echo L("admin_ecarticlecat_articlecat_list_page_table_th1");?></td>
                <td>
                    <input type="text" name="cat_name" maxlength="60" size = "30" value="<?php echo $cat['cat_name'];?>" />
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecarticlecat_articlecat_list_page_table_td1");?></td>
                <td>
                    <select name="parent_id" onchange="catChanged()" <?php if($disabled){?>disabled="disabled"<?php }?> >
                        <option value="0"><?php echo L("admin_ecarticlecat_articlecat_list_page_table_td2");?></option>
                        <?php echo $cat_select;?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecarticlecat_articlecat_list_page_table_td3");?>:</td>
                <td>
                    <input type="text" name='sort_order' <?php if($cat['sort_order']){?>value='<?php echo $cat['sort_order'];?>'<?php  }else{ ?> value="50"<?php }?> size="15" />
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecarticlecat_articlecat_list_page_table_td4");?>:</td>
                <td>
                    <input type="radio" name="show_in_nav" value="1" <?php if($cat['show_in_nav'] <> 0){?> checked="true"<?php }?>/> <?php echo L("admin_ecarticlecat_articlecat_list_page_table_com1");?>
                    <input type="radio" name="show_in_nav" value="0" <?php if($cat['show_in_nav'] == 0){?> checked="true"<?php }?> /> <?php echo L("admin_ecarticlecat_articlecat_list_page_table_com2");?>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('notice_keywords');" title="<?php echo L("admin_ecarticlecat_articlecat_list_page_table_com3");?>">
                        <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="<?php echo L("admin_ecarticlecat_articlecat_list_page_table_com3");?>"/>
                    </a>
                    <?php echo L("admin_ecarticlecat_articlecat_list_page_table_td5");?>
                </td>
                <td>
                    <input type="text" name="keywords" maxlength="60" size="50" value="<?php echo $cat['keywords'];?>" />
                    <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="notice_keywords">
                        <?php echo L("admin_ecarticlecat_articlecat_list_page_table_com4");?>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecarticlecat_articlecat_list_page_table_td6");?></td>
                <td><textarea  name="cat_desc" cols="60" rows="4"><?php echo $cat['cat_desc'];?></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <br />
                    <input type="submit" class="button" value="<?php echo L("admin_ecarticlecat_articlecat_list_page_table_btn1");?>" />
                    <input type="reset" class="button" value="<?php echo L("admin_ecarticlecat_articlecat_list_page_table_btn2");?>" />
                    <input type="hidden" name="act" value="<?php echo $form_action;?>" />
                    <input type="hidden" name="id" value="<?php echo $cat['cat_id'];?>" />
                    <input type="hidden" name="old_catname" value="<?php echo $cat['cat_name'];?>" />
                </td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script language="JavaScript">
/**
 * 检查表单输入的数据
 */
function validate()
{
    validator = new Validator("theForm");
    validator.required("cat_name",  no_catname);
    return validator.passed();
}

/**
 * 选取上级分类时判断选定的分类是不是底层分类
 */
function catChanged()
{
    var obj = document.forms['theForm'].elements['parent_id'];
    
    cat_type = obj.options[obj.selectedIndex].getAttribute('cat_type');
    if (cat_type == undefined)
    {
        cat_type = 1;
    }
    
    if ((obj.selectedIndex > 0) && (cat_type == 2 || cat_type == 3 || cat_type == 5))
    {
        alert(sys_hold);
        obj.selectedIndex = 0;
        return false;
    }
    
    return true;
}

onload = function()
{
    // 开始检查订单
    startCheckOrder();
}


</script>



