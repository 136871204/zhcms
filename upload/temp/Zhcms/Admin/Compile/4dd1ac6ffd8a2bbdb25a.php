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
    <form name="theForm" method="post" action="<?php echo U('index');?>&act=edit" onsubmit="return getGoodsIDs()">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="narrow-label"><?php echo L("admin_ecgoodsbatch_info_page_table_th22");?>：</td>
                <td>
                    <label>
                        <input name="select_method" id="sm_cat" type="radio" value="cat" checked onclick="toggleSelectMethod(this.value)"/>
                        <?php echo L("admin_ecgoodsbatch_info_page_table_th23");?>
                    </label>
                    <label>
                        <input name="select_method" id="sm_sn" type="radio" value="sn" onclick="toggleSelectMethod(this.value)"/>
                        <?php echo L("admin_ecgoodsbatch_info_page_table_th24");?>
                    </label>    
                </td>
            </tr>
            <tr id="cat_1">
                <td class="narrow-label" id="cat_2"><?php echo L("admin_ecgoodsbatch_info_page_table_th25");?>：</td>
                <td id="cat_3">
                    &nbsp;
                    <select name="cat" id="cat" onchange="getGoods()">
                        <option value="0" selected ><?php echo L("admin_ecgoodsbatch_common28");?></option>
                        <?php echo $cat_list;?>
                    </select>
                </td>
            </tr>
            <tr id="cat_7">
                <td class="narrow-label" id="cat_8"><?php echo L("admin_ecgoodsbatch_info_page_table_th26");?>：</td>
                <td id="cat_9">
                    &nbsp;
                    <select name="brand" id="brand" onchange="getGoods()">
                        <option value="0" selected><?php echo L("admin_ecgoodsbatch_common28");?></option>
                        <?php if(isset($brand_list) && !empty($brand_list)):$arr["options"]=$brand_list;$arr["selected"]=null;echo html_options($arr);endif;
?>
                    </select>
                </td>
            </tr>
            <tr id="cat_4">
                <td class="narrow-label" id="cat_5"><?php echo L("admin_ecgoodsbatch_control_index_insert2");?>：</td>
                <td valign="middle" id="cat_6">
                    <table  border="0" cellspacing="1" cellpadding="3">
                        <tr>
                            <td><?php echo L("admin_ecgoodsbatch_info_page_table_th27");?>：</td>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td><?php echo L("admin_ecgoodsbatch_info_page_table_th28");?>：</td>
                        </tr>
                        <tr>
                            <td width="45%">
                                <select name="srcList" size="10" multiple id="srcList" style="width: 100%" ondblclick="addGoods()">
                                </select>
                            </td>
                            <td align="center" valign="middle">
                                <input name="add" type="button" class="button" id="add" value="&gt;&gt;" onclick="addGoods()" /><br />
                                <input name="del" class="button" type="button" id="del" value="&lt;&lt;" onclick="delGoods()" />
                            </td>
                            <td width="45%">
                                <select name="destList" size="10" multiple id="destList" style="width: 100%" ondblclick="delGoods()">
                                </select>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr style="display:none" id="sn_1">
                <td class="narrow-label" style="display:none" id="sn_2"><?php echo L("admin_ecgoodsbatch_info_page_table_th29");?></td>
                <td style="display:none" id="sn_3"><textarea name="sn_list" rows="10" cols="40" id="sn_list"></textarea></td>
            </tr>
            <tr>
                <td class="narrow-label"><?php echo L("admin_ecgoodsbatch_info_page_table_th30");?>：</td>
                <td>
                    <label>
                        <input name="edit_method" type="radio" value="each" checked/><?php echo L("admin_ecgoodsbatch_info_page_table_th31");?>
                    </label>
                    <label>
                        <input type="radio" name="edit_method" value="all"/><?php echo L("admin_ecgoodsbatch_info_page_table_th32");?>
                    </label>    
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="submit" name="submit" value="<?php echo L("admin_ecgoodsbatch_info_page_table_th33");?>" class="button" />
                    <input type="hidden" name="goods_ids" value="" />
                </td>
            </tr>
        </table>
    </form>
</div>
<script language="JavaScript">
    var ele = document.forms['theForm'].elements;
    
    /**
    * 切换选择商品方式：
    * @param: method 当前方式 cat sn
    */
    function toggleSelectMethod(method)
    {
        if (method == 'cat')
        {
            var catDisplay = '';
            var snDisplay = 'none';
        }
        else
        {
            var catDisplay = 'none';
            var snDisplay = '';
        }
        
        for (var i = 1; i <= 9; i++)
        {
           document.getElementById('cat_' + i).style.display = catDisplay;
        }
        for (var i = 1; i <= 3; i++)
        {
           document.getElementById('sn_' + i).style.display = snDisplay;
        }
    }
    
    /**
    * 取得商品
    */
    function getGoods()
    {
        var catId   = ele['cat'].value;
        var brandId = ele['brand'].value;
        if (catId > 0 || brandId > 0)
        {
            var ajaxurl=CONTROL +"&m=index&is_ajax=1&act=get_goods";
            Ajax.call(ajaxurl, "cat_id="+catId+"&brand_id="+brandId, getGoodsResponse, "GET", "JSON");
        }
        else
        {
            ele['srcList'].options.length = 0;
        }
    }
    
    function getGoodsResponse(result)
    {
        if (result.error == 0)
        {
            ele['srcList'].options.length = 0;
            
            for (var i = 0; i < result.content.length; i++)
            {
                var opt = document.createElement('OPTION');
                opt.value = result.content[i].goods_id;
                opt.text = result.content[i].goods_name;
                ele['srcList'].options.add(opt);
            }
        }
    }
    
    /**
    * 添加商品
    */
    function addGoods()
    {
        var src = document.getElementById('srcList');
        var dest = document.getElementById('destList');
        
        for (var i = 0; i < src.options.length; i++)
        {
            if (src.options[i].selected)
            {
                var exist = false;
                for (var j = 0; j < dest.options.length; j++)
                {
                    if (dest.options[j].value == src.options[i].value)
                    {
                      exist = true;
                      break;
                    }
                }
                if (!exist)
                {
                    var opt = document.createElement('OPTION');
                    opt.value = src.options[i].value;
                    opt.text = src.options[i].text;
                    dest.options.add(opt);
                }
            }
        }
    }
    
    /**
    * 删除商品
    */
    function delGoods()
    {
        var dest = document.getElementById('destList');
        
        for (var i = dest.options.length - 1; i >= 0 ; i--)
        {
            if (dest.options[i].selected)
            {
                dest.options[i] = null;
            }
        }
    }
    
    /**
    * 取得选择的商品id，赋值给隐藏变量。同时检查是否选择或输入了商品
    */
    function getGoodsIDs()
    {
        if (document.getElementById('sm_cat').checked)
        {
            var idArr = new Array();
            var dest = document.getElementById('destList');
            for (var i = 0; i < dest.options.length; i++)
            {
                idArr.push(dest.options[i].value);
            }
            if (idArr.length <= 0)
            {
                alert(please_select_goods);
                return false;
            }
            else
            {
                document.forms['theForm'].elements['goods_ids'].value = idArr.join(',');
                return true;
            }
        }
        else
        {
            if (document.forms['theForm'].elements['sn_list'].value == '')
            {
                alert(please_input_sn);
                return false;
            }
            else
            {
                return true;
            }
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
