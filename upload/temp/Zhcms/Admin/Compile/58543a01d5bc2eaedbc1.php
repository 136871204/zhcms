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
    var no_goods_id = "没有选择商品";
    var invalid_exchange_integral = "积分值为空或不是数字";
//-->
</script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/selectzone.js"></script>


<div class="main-div">
    <form  action="<?php echo U('index');?>" method="post" name="theForm" onsubmit="return validate();">
        <table width="90%" id="general-table">
            <tr>
                <td align="right">关键字</td>
                <td>
                    <input type="text" name="keywords" size="30" />
                    <input type="button" value="搜索" class="button" onclick="searchGoods()" <?php if($form_action == 'update'){?> disabled="true" <?php }?>>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticegoodsid');" title="点击此处查看提示信息">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"/>
                    </a>商品
                </td>
                <td>
                    <select name="goods_id">
                        <?php echo $goods['option'];?>
                    </select>
                    <span class="require-field">*</span>
                    <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticegoodsid">
                        需要先搜索商品，生成商品列表，然后再选择
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticepackagePrice');" title="点击此处查看提示信息">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"/>
                    </a>积分值
                </td>
                <td>
                    <input type="text" name="exchange_integral" maxlength="60" size="20" value="<?php echo $goods['exchange_integral'];?>" />
                    <span class="require-field">*</span>
                    <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticepackagePrice">
                        兑换本商品需要消耗的积分值
                    </span>
                </td>
            </tr>
            <tr>
                <td class="narrow-label">是否可兑换</td>
                <td>
                    <input type="radio" name="is_exchange" value="1" <?php if($goods['is_exchange'] == 1){?>checked<?php }?>> 可兑换 
                    <input type="radio" name="is_exchange" value="0" <?php if($goods['is_exchange'] == 0){?>checked<?php }?>> 不可兑换
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="narrow-label">是否热销</td>
                <td>
                    <input type="radio" name="is_hot" value="1" <?php if($goods['is_hot'] == 1){?>checked<?php }?>> 热销
                    <input type="radio" name="is_hot" value="0" <?php if($goods['is_hot'] == 0){?>checked<?php }?>> 非热销
                    <span class="require-field">*</span>
                </td>
            </tr>
        </table>
        <div class="button-div">
            <input type="hidden" name="act" value="<?php echo $form_action;?>" />
            <input type="submit" value="确定" class="button"  />
            <input type="reset" value="重置" class="button" />
        </div>
    </form>
</div>

<script language="JavaScript">
onload = function()
{
    // 开始检查订单
    startCheckOrder();
}

function validate()
{
    var validator = new Validator('theForm');
    validator.isNullOption("goods_id", no_goods_id);
    validator.isNumber("exchange_integral", invalid_exchange_integral, true);
    
    
    return validator.passed();
}


function searchGoods()
{
    var filter = new Object;
    filter.keyword = document.forms['theForm'].elements['keywords'].value;
    var ajaxurl=CONTROL +"&is_ajax=1&act=search_goods";
    Ajax.call(ajaxurl, filter, searchGoodsResponse, 'GET', 'JSON')
}


function searchGoodsResponse(result)
{
    var frm = document.forms['theForm'];
    var sel = frm.elements['goods_id'];
    
    if (result.error == 0)
    {
        /* 清除 options */
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
        else
        {
            var opt = document.createElement("OPTION");
            opt.value = 0;
            opt.text  = search_is_null;
            sel.options.add(opt);
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


