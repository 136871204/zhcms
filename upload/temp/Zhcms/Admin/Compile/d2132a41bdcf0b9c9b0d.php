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
var batch_drop_confirm = "您确实要删除选中的优惠活动吗？";
var all_need_not_search = "优惠范围是全部商品，不需要此操作";
var range_exists = "该选项已存在";
var pls_search = "请先搜索";
var price_need_not_search = "优惠方式是享受价格折扣，不需要此操作";
var gift = "赠品（特惠品）";
var price = "价格";
var act_name_not_null = "请输入优惠活动名称";
var min_amount_not_number = "金额下限格式不正确（数字）";
var max_amount_not_number = "金额上限格式不正确（数字）";
var act_type_ext_not_number = "优惠方式后面的值不正确（数字）";
var amount_invalid = "金额上限小于金额下限。";
var start_lt_end = "优惠开始时间不能大于结束时间";
//-->
</script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/calendar.php?lang=<?php echo $_SESSION['language'];?>"></script>
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/calendar/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/transport.js"></script>

<div class="main-div">
    <form method="post" action="<?php echo U('index');?>" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">优惠活动名称：</td>
                <td><input name="act_name" type="text" id="act_name" value="<?php echo $favourable['act_name'];?>" size="40" /></td>
            </tr>
            <tr>
                <td class="label">优惠开始时间：</td>
                <td>
                    <input name="start_time" type="text" id="start_time" value="<?php echo $favourable['start_time'];?>" readonly="readonly" />
                    <input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('start_time', '%Y-%m-%d %H:%M', '24', false, 'selbtn1');" value="选择" class="button" />
                </td>
            </tr>
            <tr>
                <td class="label">优惠结束时间：</td>
                <td>
                    <input name="end_time" type="text" id="end_time" value="<?php echo $favourable['end_time'];?>" readonly="readonly" />
                    <input name="selbtn2" type="button" id="selbtn2" onclick="return showCalendar('end_time', '%Y-%m-%d %H:%M', '24', false, 'selbtn2');" value="选择" class="button" />
                </td>
            </tr>
            <tr>
                <td class="label">享受优惠的会员等级：</td>
                <td>
                    <?php if(is_array($user_rank_list)):?><?php $index=0; ?><?php  foreach($user_rank_list as $user_rank){ ?>
                    <input type="checkbox" name="user_rank[]" value="<?php echo $user_rank['rank_id'];?>" <?php if($user_rank['checked']){?>checked="true"<?php }?> /><?php echo $user_rank['rank_name'];?> 
                    <?php $index++; ?><?php }?><?php endif;?>
                </td>
            </tr>
            <tr>
                <td class="label">优惠范围：</td>
                <td>
                    <select name="act_range" onchange="changeRange(this.value)">
                        <option value="0" selected="selected" <?php if($favourable['act_range'] == 0){?>selected="selected"<?php }?>>全部商品</option>
                        <option value="1" <?php if($favourable['act_range'] == 1){?>selected="selected"<?php }?>>以下分类</option>
                        <option value="2" <?php if($favourable['act_range'] == 2){?>selected="selected"<?php }?>>以下品牌</option>
                        <option value="3" <?php if($favourable['act_range'] == 3){?>selected="selected"<?php }?>>以下商品</option>
                    </select>
                    <div id="range-div">
                        <?php if(is_array($act_range_ext)):?><?php $index=0; ?><?php  foreach($act_range_ext as $item){ ?>
                            <input name="act_range_ext[]" type="checkbox" value="<?php echo $item['id'];?>" checked="checked" /><?php echo $item['name'];?> 
                        <?php $index++; ?><?php }?><?php endif;?>
                    </div>
                </td>
            </tr>
            <tr id="range_search"<?php if($favourable['act_range'] == 0){?> style="display:none"<?php }?>>
                <td align="right">搜索并加入优惠范围</td>
                <td>
                    <input name="keyword" type="text" id="keyword"/>
                    <input name="search" type="button" id="search" value="搜索" class="button" onclick="searchItem()" />
                    <select name="result" id="result">
                    </select> 
                    <input type="button" name="add_range" value="+" class="button" onclick="addRange()" />
                </td>
            </tr>
            <tr>
                <td class="label">金额下限：</td>
                <td><input name="min_amount" type="text" id="min_amount" value="<?php echo $favourable['min_amount'];?>"/></td>
            </tr>
            <tr>
                <td class="label">金额上限：</td>
                <td>
                    <input name="max_amount" type="text" id="max_amount" value="<?php echo $favourable['max_amount'];?>"/>
                     0表示没有上限
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('NoticeActType');" title="点击此处查看提示信息">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"/>
                    </a>
                    优惠方式：
                </td>
                <td>
                    <select name="act_type" id="act_type" onchange="changeType(this.value)">
                        <option value="0" <?php if($favourable['act_type'] == 0){?>selected="selected"<?php }?>>享受赠品（特惠品）</option>
                        <option value="1" <?php if($favourable['act_type'] == 1){?>selected="selected"<?php }?>>享受现金减免</option>
                        <option value="2" <?php if($favourable['act_type'] == 2){?>selected="selected"<?php }?>>享受价格折扣</option>
                    </select>
                    <input name="act_type_ext" type="text" id="act_type_ext" value="<?php echo $favourable['act_type_ext'];?>" size="10" />
                    <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="NoticeActType">
                     当优惠方式为“享受赠品（特惠品）”时，请输入允许买家选择赠品（特惠品）的最大数量，数量为0表示不限数量；<br/>
                     当优惠方式为“享受现金减免”时，请输入现金减免的金额；<br/>
                     当优惠方式为“享受价格折扣”时，请输入折扣（1－99），如：打9折，就输入90。<br/>
                    </span>
                    <div id="gift-div" style="width:60%">
                        <table id="gift-table">
                        <?php if($favourable['gift']){?>
                            <tr align="center">
                                <td><strong>赠品（特惠品）</strong></td>
                                <td><strong>价格</strong></td>
                            </tr>
                            <?php if(is_array($favourable['gift'])):?><?php $index=0; ?><?php  foreach($favourable['gift'] as $goods){ ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="gift_id[<?php echo $key;?>]" value="<?php echo $goods['id'];?>" checked="checked" />
                                        <?php echo $goods['name'];?>
                                    </td>
                                    <td align="right">
                                        <input name="gift_price[<?php echo $key;?>]" type="text" value="<?php echo $goods['price'];?>" size="10" style="text-align:right" />
                                        <input name="gift_name[<?php echo $key;?>]" type="hidden" value="<?php echo $goods['name'];?>" />
                                    </td>
                                </tr>
                            <?php $index++; ?><?php }?><?php endif;?>
                        <?php }?>
                        </table>
                    </div>
                </td>
            </tr>
            <tr id="type_search"<?php if($favourable['act_type'] <> 0){?> style="display:none"<?php }?>>
                <td align="right">搜索并加入赠品（特惠品）</td>
                <td>
                    <input name="keyword1" type="text" id="keyword1" />
                    <input name="search1" type="button" id="search1" value="搜索" class="button" onclick="searchItem1()" />
                    <select name="result1" id="result1">
                    </select>
                    <input name="add_gift" type="button" class="button" id="add_gift" onclick="addGift()" value="+" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" class="button" value="确定" />
                    <input type="reset" class="button" value="重置" />
                    <input type="hidden" name="act" value="<?php echo $form_action;?>" />
                    <input type="hidden" name="id" value="<?php echo $favourable['act_id'];?>" />    
                </td>
            </tr>
        </table>
    </form>
</div>

<script language="JavaScript">
    onload = function()
    {
        // 开始检查订单
        //startCheckOrder();
        //    changeRange(document.forms['theForm'].elements['act_range'].value);
        //    changeType(document.forms['theForm'].elements['act_type'].value);
    }
    
    /**
     * 检查表单输入的数据
     */
    function validate()
    {
        validator = new Validator("theForm");
        validator.required('act_name', act_name_not_null);
        validator.isNumber('min_amount', min_amount_not_number, true);
        validator.isNumber('max_amount', max_amount_not_number, true);
        validator.isNumber('act_type_ext', act_type_ext_not_number, true);
        validator.islt('start_time', 'end_time', start_lt_end);
        if (document.forms['theForm'].elements['max_amount'].value > 0)
        {
          validator.gt('max_amount', 'min_amount', amount_invalid);
        }
    
        return validator.passed();
    }
    
    function searchItem()
    {
        var filter = new Object;
        filter.keyword  = document.forms['theForm'].elements['keyword'].value;
        filter.act_range = document.forms['theForm'].elements['act_range'].value;
        if (filter.act_range == 0)
        {
            alert(all_need_not_search);
            return;
        }
        var ajaxurl=CONTROL +"&m=index&is_ajax=1&act=search";
        Ajax.call(ajaxurl, filter, searchResponse, 'GET', 'JSON');
    }
    
    function searchResponse(result)
    {
        if (result.error == '1' && result.message != '')
        {
            alert(result.message);
            return;
        }
        
        var sel = document.forms['theForm'].elements['result'];
        
        sel.length = 0;
        
        /* 创建 options */
        var goods = result.content;
        if (goods)
        {
            for (i = 0; i < goods.length; i++)
            {
                var opt = document.createElement("OPTION");
                opt.value = goods[i].id;
                opt.text  = goods[i].name;
                sel.options.add(opt);
            }
        }
        
        return;
    }
    
    /**
    * 改变优惠范围
    * @param int rangeId
    */
    function changeRange(rangeId)
    {
        document.getElementById('range-div').innerHTML = '';
        document.getElementById('result').length = 0;
        var row = document.getElementById('range_search');
        if (rangeId <= 0)
        {
            row.style.display = 'none';
        }
        else
        {
            row.style.display = '';
        }
    }
    
    
    function addRange()
    {
        var selRange = document.forms['theForm'].elements['act_range'];
        if (selRange.value == 0)
        {
            alert(all_need_not_search);
            return;
        }
        var selResult = document.getElementById('result');
        if (selResult.value == 0)
        {
            alert(pls_search);
            return;
        }
        var id = selResult.options[selResult.selectedIndex].value;
        var name = selResult.options[selResult.selectedIndex].text;
        
        // 检查是否已经存在
        var exists = false;
        var eles = document.forms['theForm'].elements;
        for (var i = 0; i < eles.length; i++)
        {
            if (eles[i].type=="checkbox" && eles[i].name.substr(0, 13) == 'act_range_ext')
            {
                if (eles[i].value == id)
                {
                    exists = true;
                    alert(range_exists);
                    break;
                }
            }
        }
        
        // 创建checkbox
        if (!exists)
        {
            var html = '<input name="act_range_ext[]" type="checkbox" value="' + id + '" checked="checked" />' + name + '<br />';
            document.getElementById('range-div').innerHTML += html;
        }
    }
    
    /**
    * 搜索赠品
    */
    function searchItem1()
    {
        if (document.forms['theForm'].elements['act_type'].value == 1)
        {
            alert(price_need_not_search);
            return;
        }
        var filter = new Object;
        filter.keyword  = document.forms['theForm'].elements['keyword1'].value;
        filter.act_range = 3;
        var ajaxurl=CONTROL +"&m=index&is_ajax=1&act=search";
        Ajax.call(ajaxurl, filter, searchResponse1, 'GET', 'JSON');
    }
    
    function searchResponse1(result)
    {
        if (result.error == '1' && result.message != '')
        {
            alert(result.message);
            return;
        }
        
        var sel = document.forms['theForm'].elements['result1'];
        
        sel.length = 0;
        
        /* 创建 options */
        var goods = result.content;
        if (goods)
        {
            for (i = 0; i < goods.length; i++)
            {
                var opt = document.createElement("OPTION");
                opt.value = goods[i].id;
                opt.text  = goods[i].name;
                sel.options.add(opt);
            }
        }
        
        return;
    }

    function addGift()
    {
        var selType = document.forms['theForm'].elements['act_type'];
        if (selType.value == 1)
        {
            alert(price_need_not_search);
            return;
        }
        var selResult = document.getElementById('result1');
        if (selResult.value == 0)
        {
            alert(pls_search);
            return;
        }
        var id = selResult.options[selResult.selectedIndex].value;
        var name = selResult.options[selResult.selectedIndex].text;
        
        // 检查是否已经存在
        var exists = false;
        var eles = document.forms['theForm'].elements;
        for (var i = 0; i < eles.length; i++)
        {
            if (eles[i].type=="checkbox" && eles[i].name.substr(0, 7) == 'gift_id')
            {
                if (eles[i].value == id)
                {
                    exists = true;
                    alert(range_exists);
                    break;
                }
            }
        }
        
        // 创建checkbox
        if (!exists)
        {
            var table = document.getElementById('gift-table');
            if (table.rows.length == 0)
            {
                var row = table.insertRow(-1);
                var cell = row.insertCell(-1);
                cell.align = 'center';
                cell.innerHTML = '<strong>' + gift + '</strong>';
                var cell = row.insertCell(-1);
                cell.align = 'center';
                cell.innerHTML = '<strong>' + price + '</strong>';
            }
            var row = table.insertRow(-1);
            var cell = row.insertCell(-1);
            cell.innerHTML = '<input name="gift_id[]" type="checkbox" value="' + id + '" checked="checked" />' + name;
            var cell = row.insertCell(-1);
            cell.align = 'right';
            cell.innerHTML = '<input name="gift_price[]" type="text" value="0" size="10" style="text-align:right" />' +
                     '<input name="gift_name[]" type="hidden" value="' + name + '" />';
        }
    }
    
    function changeType(typeId)
    {
        document.getElementById('gift-div').innerHTML = '<table id="gift-table"></table>';
        document.getElementById('result1').length = 0;
        var row = document.getElementById('type_search');
        if (typeId <= 0)
        {
            row.style.display = '';
        }
        else
        {
            row.style.display = 'none';
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


