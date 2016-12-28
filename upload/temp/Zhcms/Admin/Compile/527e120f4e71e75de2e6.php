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
var please_select_goods = "<?php echo L("admin_ecgoodsbatch_js_please_select_goods");?>";
var please_input_sn = "<?php echo L("admin_ecgoodsbatch_js_please_input_sn");?>";
var goods_cat_not_leaf = "<?php echo L("admin_ecgoodsbatch_js_goods_cat_not_leaf");?>";
var please_select_cat = "<?php echo L("admin_ecgoodsbatch_js_please_select_cat");?>";
var please_upload_file = "<?php echo L("admin_ecgoodsbatch_js_please_upload_file");?>";
//-->
</script>
<div class="main-div">
    <form action="<?php echo U('index');?>&act=upload" method="post" enctype="multipart/form-data" name="theForm" onsubmit="return formValidate()">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label"><?php echo L("admin_ecgoodsbatch_info_page_table_th1");?></td>
                <td>
                    <select name="data_cat" id="data_cat">
                        <option value="0"><?php echo L("admin_ecgoodsbatch_common28");?></option>
                        <?php if(isset($data_format) && !empty($data_format)):$arr["options"]=$data_format;$arr["selected"]=null;echo html_options($arr);endif;
?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgoodsbatch_info_page_table_th2");?>：</td>
                <td>
                    <select name="cat" id="cat">
                        <option value="0"><?php echo L("admin_ecgoodsbatch_common28");?></option>
                        <?php echo $cat_list;?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgoodsbatch_info_page_table_th3");?>：</td>
                <td>
                    <select name="charset" id="charset">
                        <?php if(isset($lang_list) && !empty($lang_list)):$arr["options"]=$lang_list;$arr["selected"]=null;echo html_options($arr);endif;
?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticeFile');" title="<?php echo L("admin_ecgoodsbatch_common29");?>">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="<?php echo L("admin_ecgoodsbatch_common29");?>"/>
                    </a><?php echo L("admin_ecgoodsbatch_info_page_table_th4");?>：
                </td>
                <td>
                    <input name="file" type="file" size="40"/>
                    <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeFile">
                        <?php echo L("admin_ecgoodsbatch_info_page_table_th5");?>
                    </span>
                </td>
            </tr>
            <?php if(is_array($download_list)):?><?php $index=0; ?><?php  foreach($download_list as $charset=>$download){ ?>
            <tr>
                <td>&nbsp;</td>
                <td><a href="<?php echo U('index');?>&act=download&charset=<?php echo $charset;?>"><?php echo $download;?></a></td>
            </tr>
            <?php $index++; ?><?php }?><?php endif;?>
            <tr align="center">
                <td colspan="2"><input name="submit" type="submit" id="submit" value="<?php echo L("admin_ecgoodsbatch_info_page_table_btn1");?>" class="button" /></td>
            </tr>
        </table>
    </form>
    <table width="100%">
        <tr>
            <td>&nbsp;</td>
            <td width="80%">
                <?php echo L("admin_ecgoodsbatch_info_page_table_th6");?>：
                <ol>
                  <li><?php echo L("admin_ecgoodsbatch_info_page_table_th7");?></li>
                  <li><?php echo L("admin_ecgoodsbatch_info_page_table_th8");?></li>
                  <li><?php echo L("admin_ecgoodsbatch_info_page_table_th9");?></li>
                  <li><?php echo L("admin_ecgoodsbatch_info_page_table_th10");?></li>
                </ol>
            </td>
            <td>&nbsp;</td>
        </tr>
    </table>
</div>
<script type="text/javascript" src='http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js'></script>
<script type="text/javascript" src='http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js'></script>
<script language="JavaScript">
    var elements;
    onload = function()
    {
        // 文档元素对象
        elements = document.forms['theForm'].elements;
    }
    /**
     * 检查是否底级分类
     */
    function checkIsLeaf(selObj)
    {
        if (selObj.options[selObj.options.selectedIndex].className != 'leafCat')
        {
            alert(goods_cat_not_leaf);
            selObj.options.selectedIndex = 0;
        }
    }
    
    /**
     * 检查输入是否完整
     */
    function formValidate()
    {
        if (elements['cat'].value <= 0)
        {
            alert(please_select_cat);
            return false;
        }
        if (elements['file'].value == '')
        {
            alert(please_upload_file);
            return false;
        }
        return true;
    }
    
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
