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
var no_card_sn = "<?php echo L("admin_ecvirtualcard_js_no_card_sn");?>";
var separator_not_null = "<?php echo L("admin_ecvirtualcard_js_separator_not_null");?>";
var uploadfile_not_null = "<?php echo L("admin_ecvirtualcard_js_uploadfile_not_null");?>";
var updating_info = "<?php echo L("admin_ecvirtualcard_js_updating_info");?>";
//-->
</script>


<div class="main-div">
    <form name="theForm">
        <table width="100%">
            <tr>
                <td colspan="2">
                    <?php echo L("admin_ecvirtualcard_info_page_table_th5");?>：
                    <ol>
                      <li><?php echo L("admin_ecvirtualcard_info_page_table_th6");?></li>
                      <li><?php echo L("admin_ecvirtualcard_info_page_table_th7");?></li>
                      <li><?php echo L("admin_ecvirtualcard_info_page_table_th8");?></li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecvirtualcard_info_page_table_th9");?></td>
                <td><input name="old_string" type="text" id="old_string"/></td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecvirtualcard_info_page_table_th10");?></td>
                <td><input name="new_string" type="text" id="new_string"/></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div align="center">
                        <input type="button" class="button" value="<?php echo L("admin_ecvirtualcard_info_page_table_btn1");?>" onclick="start_change()" />
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>

<div class="list-div">
    <table id="change_log" cellpadding="3" cellspacing="1">
        <tr>
            <th><?php echo L("admin_ecvirtualcard_info_page_table_th11");?></th>
        </tr>
    </table>
</div>

<script language="JavaScript" type="text/javascript">
    /**
    * 开始更新：检查原串和新串
    */
    function start_change()
    {
        var old_key = document.forms['theForm'].elements['old_string'].value;
        var new_key = document.forms['theForm'].elements['new_string'].value;
        
        var ajaxurl=CONTROL +"&m=index&is_ajax=1&act=start_change";
        Ajax.call(ajaxurl, "old_key=" + old_key + "&new_key=" + new_key, start_change_response, "GET", "JSON");
    }
    
    function start_change_response(result)
    {
        if (result.error == 0)
        {
            var tbl = document.getElementById('change_log');
            var body = tbl.rows[0].parentNode;
            for (var i = body.childNodes.length - 1; i > 0; i--)
            {
                if (body.childNodes[i].tagName == 'TR')
                {
                    body.deleteRow(body.childNodes[i].rowIndex);
                }
            }
            var row = tbl.insertRow(-1);
            var cell = row.insertCell(-1);
            cell.innerHTML = result.content;

            var row = tbl.insertRow(-1);
            var cell = row.insertCell(-1);
            cell.id = 'updating';
            cell.innerHTML = updating_info;

            var row = tbl.insertRow(-1);
            var cell = row.insertCell(-1);
            //cell.innerHTML = updated_info;
            var ajaxurl=CONTROL +"&m=index&is_ajax=1&act=on_change";
            Ajax.call(ajaxurl, "updated=0", on_change_response, "GET", "JSON");
        }
        if (result.message.length > 0)
        {
            alert(result.message);
        }
    }
    
    function on_change_response(result)
    {
        if (result.error == 0)
        {
            // 没出错
            if (result.message == '')
            {
                // 未结束
                var ajaxurl=CONTROL +"&m=index&is_ajax=1&act=on_change";
                Ajax.call(ajaxurl, "updated=" + result.content, on_change_response, "GET", "JSON");
            }
            else
            {
                // 已结束
                var tbl = document.getElementById('change_log');
                var row = tbl.insertRow(-1);
                var cell = row.insertCell(-1);
                cell.innerHTML = result.message;
            }
        }
        else
        {
            // 出错了
            var tbl = document.getElementById('change_log');
            var row = tbl.insertRow(-1);
            var cell = row.insertCell(-1);
            cell.innerHTML = result.message;
        }
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
