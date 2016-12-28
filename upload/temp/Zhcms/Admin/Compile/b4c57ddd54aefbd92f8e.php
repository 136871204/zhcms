<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo C("WEBNAME");?><?php if($ur_here){?> - <?php echo $ur_here;?> <?php }?></title>
<meta name="robots" content="noindex, nofollow"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/general.css" rel="stylesheet" type="text/css" />
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/main.css" rel="stylesheet" type="text/css" />
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
var no_name = "没有输入活动名";
var no_desc = "没有输入活动描述";
var no_goods_id = "没有选择商品";
var invalid_starttime = "输入的起始时间格式不对，月份，时间应补足两位";
var invalid_endtime = "输入的结束时间格式不对，月份，时间应补足两位";
var invalid_gt = "输入的结束时间应大于起始日期";
var search_is_null = "没有搜索到任何商品，请重新搜索";
var invalid_package_price = "礼包价格为空或不是数字";
//-->
</script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/selectzone.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/calendar.php?lang=<?php echo $_SESSION['language'];?>"></script>
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/calendar/calendar.css" rel="stylesheet" type="text/css" />

<div class="main-div">
    <form method="post" action="<?php echo U('index');?>" name="theForm" onsubmit="return validate()">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">超值礼包名称</td>
                <td>
                    <input type="text" name="package_name" maxlength="60" size="40" value="<?php echo $package['package_name'];?>" />
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">活动开始时间</td>
                <td>
                    <input type="text" name="start_time" maxlength="60" size="40" value="<?php echo $package['start_time'];?>" readonly="readonly" id="start_time_id" />
                    <input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('start_time_id', '%Y-%m-%d %H:%M', '24', false, 'selbtn1');" value="选择" class="button"/>
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">活动结束时间</td>
                <td>
                    <input type="text" name="end_time" maxlength="60" size="40" value="<?php echo $package['end_time'];?>"  readonly="readonly" id ="end_time_id" />
                    <input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('end_time_id', '%Y-%m-%d %H:%M', '24', false, 'selbtn1');" value="选择" class="button"/>
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticepackagePrice');" title="点击此处查看提示信息">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"/>
                    </a>礼包价格
                </td>
                <td>
                    <input type="text" name="package_price" maxlength="60" size="20" value="<?php echo $package['package_price'];?>" />
                    <span class="require-field">*</span>
                    <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticepackagePrice">
                        购买礼包的价格
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label">超值礼包活动描述</td>
                <td><textarea  name="desc" cols="60" rows="4"><?php echo $package['act_desc'];?></textarea></td>
            </tr>
            <!-- 商品搜索 -->
            <tr>
                <td class="label">
                    商品搜索
                </td>
                <td>
                    <select name="cat_id">
                        <option value="0">所有分类</caption>
                        <?php echo $cat_list;?>
                    </select>
                    <select name="brand_id">
                        <option value="0">所有品牌</caption>
                        <?php if(isset($brand_list) && !empty($brand_list)):$arr["options"]=$brand_list;$arr["selected"]=null;echo html_options($arr);endif;
?>
                    </select>
                    <input type="text" name="keyword" />
                    <input type="button" value="搜索" onclick="javascript:searchGoods();" class="button" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table id="groupgoods-table" align="center" style="width:70%;">
                        <!-- 商品列表 -->
                        <tr>
                            <th>可选商品</th>
                            <th>操作</th>
                            <th>该礼包的商品</th>
                        </tr>
                        <tr>
                            <td width="42%">
                                <select name="source_select" size="15" style="width:100%" onchange="this.form.elements['number'].value = 1" ondblclick="sz.addItem(false, 'add_package_goods', this.form.elements['id'].value, this.form.elements['number'].value)">
                                </select>
                            </td>
                            <td align="center">
                                <p>数量<br /><input name="number" type="text" size="6" value="1" /></p>
                                <p><input type="button" value=">>" onclick="sz.addItem(true, 'add_package_goods', this.form.elements['id'].value, this.form.elements['number'].value)" class="button" /></p>
                                <p><input type="button" value=">" onclick="sz.addItem(false, 'add_package_goods', this.form.elements['id'].value, this.form.elements['number'].value)" class="button" /></p>
                                <p><input type="button" value="<" onclick="sz.dropItem(false, 'drop_package_goods', this.form.elements['id'].value)" class="button" /></p>
                                <p><input type="button" value="<<" onclick="sz.dropItem(true, 'drop_package_goods', this.form.elements['id'].value)" class="button" /></p>
                            </td>
                            <td width="42%">
                                <select name="target_select" size="15" style="width:100%" multiple ondblclick="sz.dropItem(false, 'drop_package_goods', this.form.elements['id'].value)">
                                    <?php if(is_array($package_goods_list)):?><?php $index=0; ?><?php  foreach($package_goods_list as $package_goods){ ?>
                                    <option value="<?php echo $package_goods['g_p'];?>"><?php echo $package_goods['goods_name'];?></option>
                                    <?php $index++; ?><?php }?><?php endif;?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="确定" class="button" />
                    <input type="reset" value="重置" class="button" />
                    <input type="hidden" name="act" value="<?php echo $form_action;?>" />
                    <input type="hidden" name="id" value="<?php echo $package['id'];?>" />
                </td>
            </tr>
        </table>
    </form>
</div>

<script language="JavaScript">
document.forms['theForm'].elements['package_name'].focus();
var elements = document.forms['theForm'].elements;
var sz = new SelectZone(2, elements['source_select'], elements['target_select'], elements['number']);
 
 /**
 * 检查表单输入的数据
 */
function validate()
{
    validator = new Validator("theForm");
    validator.required("package_name",  no_name);
    //validator.isNullOption("goods_id", no_goods_id);
    validator.isTime("start_time", invalid_starttime, true);
    validator.isTime("end_time", invalid_endtime, true);
    validator.gt("end_time", "start_time", invalid_gt);
    validator.isNumber("package_price", invalid_package_price, true);

    if (document.forms['theForm'].elements['act'] == "insert")
    {
        validator.required("password", no_password);
    }

    return validator.passed();
}

function searchGoods()
{
    var filter = new Object;
    filter.keyword    = document.forms['theForm'].elements['keyword'].value;
    filter.cat_id     = document.forms['theForm'].elements['cat_id'].value;
    filter.brand_id   = document.forms['theForm'].elements['brand_id'].value;

    var ajaxurl=CONTROL +"&is_ajax=1&act=search_goods";
    Ajax.call(ajaxurl, filter, searchGoodsResponse, 'GET', 'JSON')
}

function searchGoodsResponse(result)
{
    var frm = document.forms['theForm'];
    var sel = frm.elements['source_select'];
    
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
                /*if(goods[i].products)
                {
                    
                }*/
                /* 货品 options */
                if (goods[i].products != null && goods[i].products.length > 0)
                {
                    for (var j = 0; goods[i].products[j]; j++)
                    {
                        var opt = document.createElement("OPTION");
                        opt.value = goods[i].value + '_' + goods[i].products[j].product_id;
                        opt.text  = goods[i].text + '[' + goods[i].products[j].goods_attr_str + ']';
                        sel.options.add(opt);
                    }
                }
                else
                {
                    var opt = document.createElement("OPTION");
                    opt.value = goods[i].value;
                    opt.text  = goods[i].text;
                    sel.options.add(opt);
                }
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


