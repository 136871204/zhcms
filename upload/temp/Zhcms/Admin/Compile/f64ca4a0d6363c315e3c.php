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
var batch_drop_confirm = "您确实要删除选中的拍卖活动吗？";
var start_price_not_number = "起拍价格式不正确（数字）";
var end_price_not_number = "一口价格式不正确（数字）";
var end_gt_start = "一口价应该大于起拍价";
var amplitude_not_number = "加价幅度格式不正确（数字）";
var deposit_not_number = "保证金格式不正确（数字）";
var start_lt_end = "拍卖开始时间不能大于结束时间";
var search_is_null = "没有搜索到任何商品，请重新搜索";
//-->
</script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/calendar.php?lang=<?php echo $_SESSION['language'];?>"></script>
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/calendar/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/transport.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>

<div class="main-div">
    <form method="post" action="<?php echo U('index');?>" name="theForm" enctype="multipart/form-data" onSubmit="return validate()">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">拍卖活动名称：</td>
                <td>
                    <input name="act_name" type="text" id="act_name" value="<?php echo $auction['act_name'];?>" maxlength="60" />
                    如果留空，取拍卖商品的名称（该名称仅用于后台，前台不会显示）
                </td>
            </tr>
            <tr>
                <td class="label">拍卖活动描述：</td>
                <td><textarea  name="act_desc" cols="60" rows="4" id="act_desc"  ><?php echo $auction['act_desc'];?></textarea></td>
            </tr>
            <tr>
                <td align="right">根据商品编号、名称或货号搜索商品</td>
                <td>
                    <input name="keyword" type="text" id="keyword"/>
                    <input name="search" type="button" id="search" value="搜索" class="button" onclick="searchGoods()" />
                </td>
            </tr>
            <tr>
                <td class="label">拍卖商品名称：</td>
                <td>
                    <select name="goods_id" id="goods_id" onchange="javascript:change_good_products();">
                        <option value="<?php echo $auction['goods_id'];?>" selected="selected"><?php echo $auction['goods_name'];?></option>
                    </select>
                    <select name="product_id" <?php if($auction['product_id'] <= 0){?>style="display:none"<?php }?>>
                        <?php if(isset($good_products_select) && !empty($good_products_select)):$arr["options"]=$good_products_select;$arr["selected"]=$auction['product_id'];echo html_options($arr);endif;
?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label">拍卖开始时间：</td>
                <td>
                    <input name="start_time" type="text" id="start_time" value="<?php echo $auction['start_time'];?>" readonly="readonly" />
                    <input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('start_time', '%Y-%m-%d %H:%M', '24', false, 'selbtn1');" value="选择" class="button" />
                </td>
            </tr>
            <tr>
                <td class="label">拍卖结束时间：</td>
                <td>
                    <input name="end_time" type="text" id="end_time" value="<?php echo $auction['end_time'];?>" readonly="readonly" />
                    <input name="selbtn2" type="button" id="selbtn2" onclick="return showCalendar('end_time', '%Y-%m-%d %H:%M', '24', false, 'selbtn2');" value="选择" class="button" />
                </td>
            </tr>
            <tr>
                <td class="label">起拍价：</td>
                <td><input name="start_price" type="text" id="start_price" value="<?php echo $auction['start_price'];?>"/></td>
            </tr>
            <tr>
                <td class="label">一口价：</td>
                <td>
                    <input name="end_price" type="text" id="end_price"  <?php if($auction['no_top']){?>disabled="true" <?php  }else{ ?> value="<?php echo $auction['end_price'];?>"<?php }?> />
                    <input name="no_top" type="checkbox" value="1" onClick="checked_no_top(this);" onChange="checked_no_top(this);" <?php if($auction['no_top']){?>checked<?php }?>/>无封顶
                </td>
            </tr>
            <tr>
                <td class="label">加价幅度：</td>
                <td><input name="amplitude" type="text" id="amplitude" value="<?php echo $auction['amplitude'];?>"/></td>
            </tr>
            <tr>
                <td class="label">保证金：</td>
                <td><input name="deposit" type="text" id="deposit" value="<?php echo $auction['deposit'];?>"/></td>
            </tr>
            <?php if($auction['act_id'] > 0){?>
            <tr>
                <td class="label">当前状态：</td>
                <td>
                    <?php echo $auction['status'];?><br />
                    <?php echo $bid_user_count;?> <a href="<?php echo U('index');?>&act=view_log&id=<?php echo $auction['act_id'];?>"> [ 查看 ]</a></td>
            </tr>
            <?php }?>
            <tr>
                <td colspan="2" align="center">
                    <?php if($auction['act_id'] == 0 or $auction['status_no'] == '0'  or $auction['status_no'] == '1'){?>
                        <input type="submit" class="button" value="确定" />
                        <input type="reset" class="button" value="重置" />
                        <input type="hidden" name="act" value="<?php echo $form_action;?>" />
                    <?php  }elseif($auction['status_no'] == '2'){ ?>
                        <?php if($auction['deposit']){?>
                            怎样处理买家的冻结资金？
                            <input type="submit" class="button" value="解冻保证金" name="unfreeze" />
                            <input type="submit" class="button" value="扣除保证金" name="deduct" />
                            <input type="hidden" name="act" value="settle_money" />
                        <?php }?>
                    <?php }?>
                    <input type="hidden" name="id" value="<?php echo $auction['act_id'];?>" />
                </td>
            </tr>
        </table>
    </form>
</div>

<script language="JavaScript">
var display_yes = (Browser.isIE) ? 'block' : 'table-row-group';


/**
 * 检查表单输入的数据
 */
function validate()
{
    validator = new Validator("theForm");
    validator.isNumber('start_price', start_price_not_number, false);
    validator.isNumber('end_price', end_price_not_number, false);

    if (document.forms['theForm'].elements['no_top'].checked == false)
    {
        validator.gt('end_price', 'start_price', end_gt_start);
    }
    validator.isNumber('amplitude', amplitude_not_number, false);
    validator.isNumber('deposit', deposit_not_number, false);
    validator.islt('start_time', 'end_time', start_lt_end);
    return validator.passed();
}

function checked_no_top(o)
{
    if (o.checked)
    {
        o.form.elements['end_price'].value = '';
        o.form.elements['end_price'].disabled = true;
    }
    else
    {
        o.form.elements['end_price'].disabled = false;
    }
}

function searchGoods()
{
    var filter = new Object;
    filter.keyword  = document.forms['theForm'].elements['keyword'].value;
    var ajaxurl=CONTROL +"&is_ajax=1&act=search_goods";
    Ajax.call(ajaxurl, filter, searchGoodsResponse, 'GET', 'JSON');
}

function searchGoodsResponse(result)
{
    if (result.error == '1' && result.message != '')
    {
        alert(result.message);
        return;
    }
    
    var frm = document.forms['theForm'];
    var sel = frm.elements['goods_id'];
    var sp = frm.elements['product_id'];
    
    if (result.error == 0)
    {
        /* 清除 options */
        sel.length = 0;
        sp.length = 0;
        
        /* 创建 options */
        var goods = result.content.goods;
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
        else
        {
            var opt = document.createElement("OPTION");
            opt.value = 0;
            opt.text  = search_is_null;
            sel.options.add(opt);
        }
        
        /* 创建 product options */
        var products = result.content.products;
        if (products)
        {
            sp.style.display = display_yes;
            
            for (i = 0; i < products.length; i++)
            {
                var p_opt = document.createElement("OPTION");
                p_opt.value = products[i].product_id;
                p_opt.text  = products[i].goods_attr_str;
                sp.options.add(p_opt);
            }
        }
        else
        {
            sp.style.display = 'none';
            
            var p_opt = document.createElement("OPTION");
            p_opt.value = 0;
            p_opt.text  = search_is_null;
            sp.options.add(p_opt);
        }
    }
    
    return;
}

function change_good_products()
{
    var filter = new Object;
    filter.goods_id = document.forms['theForm'].elements['goods_id'].value;
    var ajaxurl= "<?php echo U('index');?>&is_ajax=1&act=search_products";
    Ajax.call(ajaxurl, filter, searchProductsResponse, 'GET', 'JSON');
}

function searchProductsResponse(result)
{
    var frm = document.forms['theForm'];
    var sp = frm.elements['product_id'];
    
    if (result.error == 0)
    {
        /* 清除 options */
        sp.length = 0;
        
        /* 创建 product options */
        var products = result.content.products;
        if ( products && products.length)
        {
            sp.style.display = display_yes;
            
            for (i = 0; i < products.length; i++)
            {
                var p_opt = document.createElement("OPTION");
                p_opt.value = products[i].product_id;
                p_opt.text  = products[i].goods_attr_str;
                sp.options.add(p_opt);
            }
        }
        else
        {
            sp.style.display = 'none';
            
            var p_opt = document.createElement("OPTION");
            p_opt.value = 0;
            p_opt.text  = search_is_null;
            sp.options.add(p_opt);
        }
    }
    
    if (result.message.length > 0)
    {
        alert(result.message);
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


