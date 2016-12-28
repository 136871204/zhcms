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
            <!--  编辑时不能改商品名称 -->
            <?php if($form_action == 'insert'){?>
            <tr>
                <td align="right">请先搜索商品</td>
                <td>
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
            <?php }?>
            <tr>
                <td class="label">批发商品名称：</td>
                <td>
                    <select name="goods_id" id="goods_id" onchange="document.getElementById('price-div').innerHTML = ''; getGoodsInfo(this.value);">
                        <option value="<?php echo $wholesale['goods_id'];?>" selected="selected"><?php echo $wholesale['goods_name'];?></option>
                    </select>
                    <input name="goods_name" type="hidden" id="goods_name" value="<?php echo $wholesale['goods_name'];?>" />
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
        <hr />
        <div id="price-div">
            <?php if(is_array($wholesale['price_list'])):?><?php $index=0; ?><?php  foreach($wholesale['price_list'] as $key=>$attr_price){ ?>
                <table width="100%">
                    <!--  该商品的属性 -->
                    <?php if($attr_list){?>
                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="2">
                            <?php if(is_array($attr_list)):?><?php $index=0; ?><?php  foreach($attr_list as $attr){ ?>
                            <?php echo $attr['attr_name'];?> 
                            <select name="attr_<?php echo $attr['attr_id'];?>[<?php echo $key;?>]"> 
                                <?php if(isset($attr['goods_attr_list']) && !empty($attr['goods_attr_list'])):$arr["options"]=$attr['goods_attr_list'];$arr["selected"]=$attr_price['attr'][$attr['attr_id']];echo html_options($arr);endif;
?>
                            </select>
                            <?php $index++; ?><?php }?><?php endif;?>
                        </td>
                        <td>
                            <?php if($key == 0){?>
                                <input type="button" class="button" value=" + " onclick="addAttr(this)" />
                            <?php  }else{ ?>
                                <input type="button" class="button" value=" - " onclick="dropAttr(this)" />
                            <?php }?>
                        <td>&nbsp;</td>
                    </tr>
                    <tr><td></td><td colspan="3" style="border-bottom:1px #000 dashed;"></td><td></td></tr>
                    <?php }?>
                    <?php if(is_array($attr_price['qp_list'])):?><?php $index=0; ?><?php  foreach($attr_price['qp_list'] as $ind=>$qp){ ?>
                    <tr>
                        <td width="10%">&nbsp;</td>
                        <td> 数量 <input name="quantity[<?php echo $key;?>][]" type="text" value="<?php echo $qp['quantity'];?>" /> </td>
                        <td> 价格 <input name="price[<?php echo $key;?>][]" type="text" value="<?php echo $qp['price'];?>" /> </td>
                        <td> 
                            <?php if($index == 0){?>
                                <input type="button" class="button" value=" + " onclick="addQuantityPrice(this, '<?php echo $key;?>')" />
                            <?php  }else{ ?>
                                <input type="button" class="button" value=" - " onclick="dropQuantityPrice(this)" />
                            <?php }?>
                        </td>
                        <td width="10%">&nbsp;</td>
                    </tr>
                    <?php $index++; ?><?php }?><?php endif;?>
                </table>
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
        <table width="100%">
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" class="button" value="确定" />
                    <input type="reset" class="button" value="重置" />
                    <input type="hidden" name="act" value="<?php echo $form_action;?>" />
                    <input type="hidden" name="id" value="<?php echo $wholesale['act_id'];?>" />
                    <input type="hidden" name="seed" id="seed" value="<?php echo $key;?>" />
                </td>
            </tr>
        </table>
    </form>
</div>

<script language="JavaScript">
/**
 * 检查表单输入的数据
 */
function validate()
{
    if (parseInt(document.forms['theForm'].elements['goods_id'].value) <= 0)
    {
        alert(pls_search_goods);
        return false;
    }
    return true;
}

function searchGoods()
{
    var filter = new Object;
    filter.keyword  = document.forms['theForm'].elements['keyword'].value;
    filter.cat_id  = document.forms['theForm'].elements['cat_id'].value;
    filter.brand_id  = document.forms['theForm'].elements['brand_id'].value;
    
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
    
    var sel = document.forms['theForm'].elements['goods_id'];
    
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
        document.getElementById('price-div').innerHTML = '';
        getGoodsInfo(goods[0].goods_id);
    }
    else
    {
        getGoodsInfo(0);
    }
    
    return;
}

/**
 * 取得某商品信息
 * @param int goodsId 商品id
 */
function getGoodsInfo(goodsId)
{
    if (goodsId > 0)
    {
        var ajaxurl=CONTROL +"&m=index&is_ajax=1&act=get_goods_info";
        Ajax.call(ajaxurl, 'goods_id=' + goodsId, getGoodsInfoResponse, 'get', 'json');
    }
    else
    {
        var divObj = document.getElementById('price-div');
        divObj.innerHTML = '';
    }
}

function getGoodsInfoResponse(result)
{
    var divObj = document.getElementById('price-div');
    var tableObj = divObj.appendChild(document.createElement('TABLE'));
    tableObj.width = '100%';

    var key = getKey();

    if (result.length > 0)
    {
        var row1 = tableObj.insertRow(-1);
        var cell1 = row1.insertCell(-1);
        var cell2 = row1.insertCell(-1);
        cell2.colSpan = 2;
        var html = '';
        for (var i = 0; i < result.length; i++)
        {
            var attr = result[i];
            var re;
            html += attr.attr_name + ' <select name="attr_' + attr.attr_id + '[' + key + ']">';
            for (var goodsAttrId in attr.goods_attr_list)
            {
                if (goodsAttrId != 'toJSONString')
                {
                    // 去掉 goodsAttrId 中的字符 c
                    re = /c/g;
                    _goodsAttrId = goodsAttrId.replace(re, "");
                    
                    html += ' <option value="' + _goodsAttrId + '"> ' + attr.goods_attr_list[goodsAttrId] + '  </option> ';
                }
            }
            html += ' </select> ';
        }
        cell2.innerHTML = html;
        var cell4 = row1.insertCell(-1);
        if (divObj.childNodes.length == 1)
        {
            cell4.innerHTML = '<input type="button" class="button" value=" + " onclick="addAttr(this)" />';
        }
        else
        {
            cell4.innerHTML = '<input type="button" class="button" value=" - " onclick="dropAttr(this)" />';
        }
        var cell5 = row1.insertCell(-1);
        
        var row2 = tableObj.insertRow(-1);
        var cell1 = row2.insertCell(-1);
        var cell2 = row2.insertCell(-1);
        cell2.style.borderBottom = '1px #000 dashed';
        cell2.colSpan = 3;
        var cell5 = row2.insertCell(-1);
    }

    var row3 = tableObj.insertRow(-1);
    var cell1 = row3.insertCell(-1);
    cell1.width = '10%';
    var cell2 = row3.insertCell(-1);
    cell2.innerHTML = getQuantityHtml(key);
    var cell3 = row3.insertCell(-1);
    cell3.innerHTML = getPriceHtml(key);
    var cell4 = row3.insertCell(-1);
    cell4.innerHTML = getButtonHtml(key);
    var cell5 = row3.insertCell(-1);
    cell5.width = '10%';
}

/**
 * @param object buttonObj
 * @param int    tableIndex
 */
function addQuantityPrice(buttonObj, tableIndex)
{
    var tableObj = buttonObj.parentNode.parentNode.parentNode.parentNode;
    var newRow = tableObj.insertRow(-1);
    var cell1 = newRow.insertCell(-1);
    var cell2 = newRow.insertCell(-1);
    var cell3 = newRow.insertCell(-1);
    var cell4 = newRow.insertCell(-1);
    var cell5 = newRow.insertCell(-1);

    cell1.innerHTML = '&nbsp;';
    cell2.innerHTML = ' 数量 <input name="quantity[' + tableIndex + '][]" type="text" value="" /> ';
    cell3.innerHTML = ' 价格 <input name="price[' + tableIndex + '][]" type="text" value="" /> ';
    cell4.innerHTML = ' <input type="button" class="button" value=" - " onclick="dropQuantityPrice(this)" />';
    cell5.innerHTML = '&nbsp;';

}

/**
 * @param object buttonObj
 */
function dropQuantityPrice(buttonObj)
{
    var trObj = buttonObj.parentNode.parentNode;
    var tableObj = trObj.parentNode.parentNode;
    tableObj.deleteRow(trObj.rowIndex);
}


/**
 * @param object buttonObj
 */
function addAttr(buttonObj)
{
    getGoodsInfo(document.getElementById('goods_id').value);
}

/**
 * @param object buttonObj
 */
function dropAttr(buttonObj)
{
    var divObj = document.getElementById('price-div');
    var tableObj = buttonObj.parentNode.parentNode.parentNode.parentNode;
    divObj.removeChild(tableObj);
}

function getKey()
{
    var seedObj = document.getElementById('seed');
    seedObj.value = parseInt(seedObj.value) + 1;
    return seedObj.value;
}

function getQuantityHtml(key)
{

    var html = '数量 <input name="quantity[#][]" type="text" value="" />';
    
    return html.replace('[#]', '[' + key + ']');
}

function getPriceHtml(key)
{
  var html = '价格 <input name="price[#][]" type="text" value="" />';

  return html.replace('[#]', '[' + key + ']');
}

function getButtonHtml(key)
{
  var html = '<input type="button" class="button" value=" + " onclick="addQuantityPrice(this, [#])" />';

  return html.replace('[#]', key);
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


