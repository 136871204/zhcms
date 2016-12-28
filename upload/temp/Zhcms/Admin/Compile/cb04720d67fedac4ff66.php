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
var process_request = "正在处理您的请求...";
var todolist_caption = "记事本";
var todolist_autosave = "自动保存";
var todolist_save = "保存";
var todolist_clear = "清除";
var todolist_confirm_save = "是否将更改保存到记事本？";
var todolist_confirm_clear = "是否清空内容？";
var batch_drop_confirm = "您确实要删除选中的批发方案吗？";
var pls_search_goods = "请搜索并选择批发商品";
var act_name_not_null = "请输入批发方案名称";
//-->
</script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/transport.js"></script>
<div class="main-div">
    <form method="post" action="<?php echo U('index');?>" name="theForm" enctype="multipart/form-data" onSubmit="return validate()">
        <table width="100%">
            <tr>
                <td width="14%" align="right">请先搜索商品</td>
                <td width="86%">
                    <!-- 分类 -->
                    <select name="cat_id">
                        <option value="0">所有分类</option>
                        <?php echo $cat_list;?>
                    </select>
                    <!-- 品牌 -->
                    <select name="brand_id">
                        <option value="0">所有品牌</option>
                        <?php if(isset($brand_list) && !empty($brand_list)):$arr["options"]=$brand_list;$arr["selected"]=null;echo html_options($arr);endif;
?>
                    </select>
                    <!-- 关键字 -->
                    商品编号、名称或货号<input name="keyword" type="text" id="keyword" size="10"/>
                    <!-- 搜索 -->
                    <input name="search" type="button" id="search" value="搜索" class="button" onclick="searchGoods()" />
                </td>
            </tr>
            <tr>
                <td class="label">批发商品名称：</td>
                <td>
                    <table width="100%" border="0">
                        <tr>
                            <td width="46%">
                                <select name="src_goods_lists" id="src_goods_lists" size="14" style="width:100%" multiple="true">
                                </select>
                            </td>
                            <td rowspan="2" width="8%" style="text-align:center;">
                                <p><input type="button" value=">>" id="addAllGoods" class="button" /></p>
                                <p><input type="button" value=">" id="addGoods" class="button" /></p>
                                <p><input type="button" value="<" id="delGoods" class="button" /></p>
                                <p><input type="button" value="<<" id="delAllGoods" class="button" /></p>
                            </td>
                            <td width="46%">
                                <select name="dst_goods_lists" id="dst_goods_lists" size="14" style="width:100%" multiple="true">
                                </select>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="label">适用会员等级：</td>
                <td>
                    <?php if(is_array($user_rank_list)):?><?php $index=0; ?><?php  foreach($user_rank_list as $rank){ ?>
                        <input name="rank_id[]" type="checkbox" id="rank_id[]" value="<?php echo $rank['rank_id'];?>" <?php if($rank['checked']){?>checked="checked"<?php }?> />
                        <?php echo $rank['rank_name'];?> 
                    <?php $index++; ?><?php }?><?php endif;?>
                </td>
            </tr>
            <tr>
                <td class="label">是否启用：</td>
                <td>
                    <label>
                        <input type="radio" name="enabled" value="1" <?php if($wholesale['enabled']){?>checked="checked"<?php }?> />
                        是
                    </label>
                    <label>
                        <input type="radio" name="enabled" value="0" <?php if(!$wholesale['enabled']){?>checked="checked"<?php }?> />
                        否
                    </label>    
                </td>
            </tr>
        </table>
        
        <table width="100%">
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" class="button" value="确定" />
                    <input type="reset" class="button" value="重置" />
                    <input type="hidden" name="act" value="<?php echo $form_action;?>" />
                    <input name="goods_ids" type="hidden" value="" />
                </td>
            </tr>
        </table>

    </form>
</div>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script language="JavaScript">

/**
 * 检查表单输入的数据
 */
function validate()
{	
    var dst_obj = document.forms['theForm'];
    copy_search_result(dst_obj);
    
    return true;
}

function copy_search_result(dst_obj)
{
    var goods_lists = Utils.$('dst_goods_lists');
    for (var i=0, l=goods_lists.options.length; i<l; i++)
    {
    	var separator = (i==0) ? '' : ',';
    	dst_obj.goods_ids.value += separator + goods_lists.options[i].value;
    }
}

function searchGoods()
{
    var filter = new Object;
    filter.cat_id = document.forms['theForm'].elements['cat_id'].value;
    filter.brand_id = document.forms['theForm'].elements['brand_id'].value;
    filter.keyword = document.forms['theForm'].elements['keyword'].value;
    
    var ajaxurl=CONTROL +"&m=index&is_ajax=1&act=search_goods";
    Ajax.call(ajaxurl, filter, searchGoodsResponse, 'GET', 'JSON');
}

function searchGoodsResponse(result)
{
    if (result.error == '1' && result.message != '')
    {
        alert(result.message);
        return;
    }
    
    var sel = document.forms['theForm'].elements['src_goods_lists'];
    
    sel.length = 0;
    
    /* 创建 options */
    var goods = result.content;
    if (goods)
    {
        for (i = 0; i < goods.length; i++)
        {
            var opt = document.createElement("OPTION");
            opt.value = goods[i].goods_id;
            opt.text  = goods[i].goods_name;
            sel.options.add(opt);
        }
    }
    
    return;
}

/* 操作自定义商品的Select Box */
var MySelectBox;
var MySelectBox2;
if (!MySelectBox)
{
    var global = $import("http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/global.js","js");
    global.onload = global.onreadystatechange= function()
    {
    		if(this.readyState && this.readyState=="loading")return;
    		var selectbox = $import("http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/selectbox.js","js");
    		selectbox.onload = selectbox.onreadystatechange = function()
    		{
    				if(this.readyState && this.readyState=="loading")return;
    				MySelectBox = new SelectBox('src_goods_fields', 'dst_goods_fields');
    				MySelectBox2 = new SelectBox('src_goods_lists', 'dst_goods_lists', true);
    		}
    }
}

if (Utils.$('addItem'))
{
	Utils.$('addItem').onclick = function ()
	{
		MySelectBox.addItem();
	}
}
if (Utils.$('delItem'))
{
	Utils.$('delItem').onclick = function ()
	{
		MySelectBox.delItem();
	}
}
if (Utils.$('addAllItem'))
{
	Utils.$('addAllItem').onclick = function ()
	{
		MySelectBox.addItem(true);
	}
}
if (Utils.$('delAllItem'))
{
	Utils.$('delAllItem').onclick = function ()
	{
		MySelectBox.delItem(true);
	}
}
if (Utils.$('src_goods_fields'))
{
	Utils.$('src_goods_fields').ondblclick = function ()
	{
		MySelectBox.addItem();
	}
}
if (Utils.$('dst_goods_fields'))
{
	Utils.$('dst_goods_fields').ondblclick = function ()
	{
		MySelectBox.delItem();
	}
}
if (Utils.$('mvUp'))
{
	Utils.$('mvUp').onclick = function ()
	{
		MySelectBox.moveItem('up');
	}
}
if (Utils.$('mvDown'))
{
	Utils.$('mvDown').onclick = function ()
	{
		MySelectBox.moveItem('down');
	}
}

if (Utils.$('addGoods'))
{
	Utils.$('addGoods').onclick = function ()
	{
		MySelectBox2.addItem();
	}
}
if (Utils.$('delGoods'))
{
	Utils.$('delGoods').onclick = function ()
	{
		MySelectBox2.delItem();
	}
}
if (Utils.$('addAllGoods'))
{
	Utils.$('addAllGoods').onclick = function ()
	{
		MySelectBox2.addItem(true);
	}
}
if (Utils.$('delAllGoods'))
{
	Utils.$('delAllGoods').onclick = function ()
	{
		MySelectBox2.delItem(true);
	}
}
if (Utils.$('src_goods_lists'))
{
	Utils.$('src_goods_lists').ondblclick = function ()
	{
		MySelectBox2.addItem();
	}
}
if (Utils.$('dst_goods_lists'))
{
	Utils.$('dst_goods_lists').ondblclick = function ()
	{
		MySelectBox2.delItem();
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


