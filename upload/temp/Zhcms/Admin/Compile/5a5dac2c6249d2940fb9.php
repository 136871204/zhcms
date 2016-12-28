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
var goods_num_must_be_int = "<?php echo L("admin_ecgengoodsscript_js_goods_num_must_be_int");?>";
var goods_num_must_over_0 = "<?php echo L("admin_ecgengoodsscript_js_goods_num_must_over_0");?>";
var rows_num_must_be_int = "<?php echo L("admin_ecgengoodsscript_js_rows_num_must_be_int");?>";
var rows_num_must_over_0 = "<?php echo L("admin_ecgengoodsscript_js_rows_num_must_over_0");?>";
//-->
</script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<div class="main-div">
    <form name="theForm" method="post" action="">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label"><?php echo L("admin_ecgengoodsscript_info_page_table_th1");?>：</td>
                <td>
                    <select name="category" id="category">
                        <option value="0" selected><?php echo L("admin_ecgengoodsscript_info_page_table_th2");?></option>
                        <?php echo $cat_list;?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgengoodsscript_info_page_table_th3");?>：</td>
                <td>
                    <select name="brand" id="brand">
                        <option value="0" selected><?php echo L("admin_ecgengoodsscript_info_page_table_th4");?></option>
                        <?php if(isset($brand_list) && !empty($brand_list)):$arr["options"]=$brand_list;$arr["selected"]=null;echo html_options($arr);endif;
?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgengoodsscript_info_page_table_th5");?>：</td>
                <td>
                    <select name="intro_type" id="intro_type">
                        <option value="all" selected><?php echo L("admin_ecgengoodsscript_info_page_table_th6");?></option>
                        <?php if(isset($intro_list) && !empty($intro_list)):$arr["options"]=$intro_list;$arr["selected"]=null;echo html_options($arr);endif;
?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgengoodsscript_info_page_table_th7");?>：</td>
                <td>        
                    <label>
                        <select name="need_image" id="need_image">
                            <option value="true" selected><?php echo L("admin_ecgengoodsscript_info_page_table_th8");?></option>
                            <option value="false"><?php echo L("admin_ecgengoodsscript_info_page_table_th9");?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgengoodsscript_info_page_table_th10");?>：</td>
                <td><input name="goods_num" type="text" id="goods_num" value="1" /></td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgengoodsscript_info_page_table_th11");?>：</td>
                <td>
                    <select name="arrange" id="arrange">
                        <option value="h" selected><?php echo L("admin_ecgengoodsscript_info_page_table_th12");?></option>
                        <option value="v"><?php echo L("admin_ecgengoodsscript_info_page_table_th13");?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgengoodsscript_info_page_table_th14");?>：</td>
                <td><input name="rows_num" type="text" id="rows_num" value="1" /></td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgengoodsscript_info_page_table_th15");?>：</td>
                <td>
                    <select name="charset" id="charset">
                        <?php if(isset($lang_list) && !empty($lang_list)):$arr["options"]=$lang_list;$arr["selected"]=null;echo html_options($arr);endif;
?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgengoodsscript_info_page_table_th16");?>：</td>
                <td><input name="sitename" type="text" id="sitename"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="button" class="button" name="gen_code" value="<?php echo L("admin_ecgengoodsscript_info_page_table_th17");?>" onclick="genCode()" />        
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <textarea name="code" cols="80" rows="5" id="code"></textarea>
                </td>
            </tr>
        </table>
    </form>
</div>
<script language="JavaScript">
    var elements = document.forms['theForm'].elements;
    var url = '<?php echo $url;?>';
    
    /**
     * 生成代码
     */
    function genCode()
    {
        // 检查输入
        if (isNaN(parseInt(elements['goods_num'].value)))
        {
            alert(goods_num_must_be_int);
            return;
        }
        if (elements['goods_num'].value < 1)
        {
            alert(goods_num_must_over_0);
            return;
        }
        if (isNaN(parseInt(elements['rows_num'].value)))
        {
            alert(rows_num_must_be_int);
            return;
        }
        if (elements['rows_num'].value < 1)
        {
            alert(rows_num_must_over_0);
            return;
        }
        
        // 生成代码
        var code = '\<script src=\"' + url + '/index.php?a=ec&c=goods_script&m=index&';
        if (elements['category'].value > 0)
        {
            code += 'cat_id=' + elements['category'].value + '&';
        }
        if (elements['brand'].value > 0)
        {
            code += 'brand_id=' + elements['brand'].value + '&';
        }
        if (elements['intro_type'].value != 'all')
        {
            code += 'intro_type=' + elements['intro_type'].value + '&';
        }
        code += 'need_image=' + elements['need_image'].value + '&';
        code += 'goods_num=' + elements['goods_num'].value + '&';
        code += 'arrange=' + elements['arrange'].value + '&';
        code += 'rows_num=' + elements['rows_num'].value + '&';
        code += 'charset=' + elements['charset'].value + '&';
        code += 'sitename=' + encodeURI(elements['sitename'].value);
        code += '\"\>\</script\>';
        elements['code'].value = code;
        elements['code'].select();
        if (Browser.isIE)
        {
            window.clipboardData.setData("Text",code);
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
