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
    var process_request = "<?php echo L("admin_ecnavigator_js_process_request");?>";
    var todolist_caption = "<?php echo L("admin_ecnavigator_js_todolist_caption");?>";
    var todolist_autosave = "<?php echo L("admin_ecnavigator_js_todolist_autosave");?>";
    var todolist_save = "<?php echo L("admin_ecnavigator_js_todolist_save");?>";
    var todolist_clear = "<?php echo L("admin_ecnavigator_js_todolist_clear");?>";
    var todolist_confirm_save = "<?php echo L("admin_ecnavigator_js_todolist_confirm_save");?>";
    var todolist_confirm_clear = "<?php echo L("admin_ecnavigator_js_todolist_confirm_clear");?>";
    
//-->
</script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<div class="main-div">
    <form  action="<?php echo U('index');?>" method="post" name="form" onsubmit="return checkForm();" >
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td><?php echo L("admin_ecnavigator_navigator_add_form_title1");?></td> 
                <td>
                    <select onchange="add_main(this.value);" name="menulist" id="menulist">
                        <option value='-'>-</option>
                        <?php if(is_array($sysmain)):?><?php $index=0; ?><?php  foreach($sysmain as $key=>$val){ ?>
                            <option value='<?php echo $key;?>'>
                                <?php if($val[2]){?>
                                    <?php echo $val[2];?>
                                <?php  }else{ ?>
                                    <?php echo $val[0];?>
                                <?php }?>
                            </option>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><?php echo L("admin_ecnavigator_navigator_add_form_title2");?></td> 
                <td>
                    <input type="text" name="item_name" value="<?php echo $rt['item_name'];?>" id="item_name" size="40" onKeyPress="javascript:key();" />
                </td>
            </tr>
            <tr>
                <td>
                    <a href="javascript:showNotice('notice_url');" title="<?php echo L("admin_ecnavigator_navigator_add_form_title3_notice1");?>">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="<?php echo $lang['form_notice'];?>"/><?php echo L("admin_ecnavigator_navigator_add_form_title3");?>
                    </a>
                </td> 
                <td>
                    <input type="text" name="item_url" value="<?php echo $rt['item_url'];?>" id="item_url" size="40" onKeyPress="javascript:key();" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="notice_url">
                        <?php echo L("admin_ecnavigator_navigator_add_form_title3_notice2");?>
                    </span>
                </td>
            </tr>
            <tr>
                <td><?php echo L("admin_ecnavigator_navigator_add_form_title4");?></td> 
                <td><input type="text" name="item_vieworder" value="<?php echo $rt['item_vieworder'];?>" size="40" /></td>
            </tr>
            <tr>
                <td><?php echo L("admin_ecnavigator_navigator_add_form_title5");?></td> 
                <td>
                    <select name="item_ifshow">
                        <option value='1' <?php echo $rt['item_ifshow_1'];?>><?php echo L("admin_ecnavigator_navigator_add_form_title5_select1");?></option>
                        <option value='0' <?php echo $rt['item_ifshow_0'];?>><?php echo L("admin_ecnavigator_navigator_add_form_title5_select2");?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><?php echo L("admin_ecnavigator_navigator_add_form_title6");?></td> 
                <td>
                    <select name="item_opennew">
                        <option value='0' <?php echo $rt['item_opennew_0'];?>><?php echo L("admin_ecnavigator_navigator_add_form_title6_select1");?></option>
                        <option value='1' <?php echo $rt['item_opennew_1'];?>><?php echo L("admin_ecnavigator_navigator_add_form_title6_select2");?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><?php echo L("admin_ecnavigator_navigator_add_form_title7");?></td> 
                <td>
                    <select name="item_type">
                        <option value='top' <?php echo $rt['item_type_top'];?>><?php echo L("admin_ecnavigator_navigator_add_form_title7_select1");?></option>
                        <option value='middle' <?php echo $rt['item_type_middle'];?>><?php echo L("admin_ecnavigator_navigator_add_form_title7_select2");?></option>
                        <option value='bottom' <?php echo $rt['item_type_bottom'];?>><?php echo L("admin_ecnavigator_navigator_add_form_title7_select3");?></option>
                    </select>
                </td>
            </tr>
            <tr align="center">
                <td colspan="2">
                <input type="hidden"  name="id"       value="<?php echo $rt['id'];?>" />
                <input type="hidden"  name="step"       value="2" />
                <input type="hidden"  name="act"       value="<?php echo $rt['act'];?>" />
                <input type="submit" class="button" name="Submit"       value="<?php echo L("admin_ecnavigator_navigator_add_form_op1");?>" />
                </td>
            </tr>
        </table>
    </form>
</div>

<script language="JavaScript">
var last;


function add_main(key)
{
    var sysm = new Object;
    <?php if(is_array($sysmain)):?><?php $index=0; ?><?php  foreach($sysmain as $key=>$val){ ?>
        sysm[<?php echo $key;?>] = new Array();
        sysm[<?php echo $key;?>][0] = '<?php echo $val[0];?>';
        sysm[<?php echo $key;?>][1] = '<?php echo $val[1];?>';
    <?php $index++; ?><?php }?><?php endif;?>
    if (key != '-')
    {
        if(sysm[key][0] != '-')
        {
            document.getElementById('item_name').value = sysm[key][0];
            document.getElementById('item_url').value = sysm[key][1];
            last = document.getElementById('menulist').selectedIndex;
        }else
        {
            if(last < document.getElementById('menulist').selectedIndex)
            {
                document.getElementById('menulist').selectedIndex ++;
            }else
            {
                document.getElementById('menulist').selectedIndex --;
            }
            last = document.getElementById('menulist').selectedIndex;
            document.getElementById('item_name').value = sysm[last-1][0];
            document.getElementById('item_url').value = sysm[last-1][1];
        }
    }
    else
    {
        ast = document.getElementById('menulist').selectedIndex = 1;
        document.getElementById('item_name').value = sysm[last-1][0];
        document.getElementById('item_url').value = sysm[last-1][1];
    }
}

function checkForm()
{
    if(document.getElementById('item_name').value == '')
    {
        alert('<?php echo L("admin_ecnavigator_navigator_add_js1");?>');
        return false;
    }
    if(document.getElementById('item_url').value == '')
    {
        alert('<?php echo L("admin_ecnavigator_navigator_add_js2");?>');
        return false;
    }
    return true;
}
function key()
{
    last = document.getElementById('menulist').selectedIndex = 0;
}


</script>



