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
var succeed_confirm = "此操作不可逆，您确定要设置该团购活动成功吗？";
var fail_confirm = "此操作不可逆，您确定要设置该团购活动失败吗？";
var error_goods_null = "您没有选择团购商品！";
var error_deposit = "您输入的保证金不是数字！";
var error_restrict_amount = "您输入的限购数量不是整数！";
var error_gift_integral = "您输入的赠送积分数不是整数！";
var search_is_null = "没有搜索到任何商品，请重新搜索";
var batch_drop_confirm = "您确定要删除选定的团购活动吗？"
//-->
</script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/calendar.php?lang=<?php echo $_SESSION['language'];?>"></script>
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/calendar/calendar.css" rel="stylesheet" type="text/css" />


<!-- 商品搜索 -->
<div class="form-div">
    <form action="javascript:searchGoods()" name="searchForm">
        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
        <!-- 分类 -->
        <select name="cat_id">
            <option value="0">所有分类</caption>
            <?php echo $cat_list;?>
        </select>
        <!-- 品牌 -->
        <select name="brand_id">
            <option value="0">所有品牌</caption>
            <?php if(isset($brand_list) && !empty($brand_list)):$arr["options"]=$brand_list;$arr["selected"]=null;echo html_options($arr);endif;
?>
        </select>
        <!-- 关键字 -->
        <input type="text" name="keyword" size="20" />
        <input type="submit" value="搜索" class="button" />
    </form>
</div>

<form method="post" action="<?php echo U('index');?>&act=insert_update" name="theForm" onsubmit="return validate()">
    <div class="main-div">
        <table id="group-table" cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">团购商品：</td>
                <td>
                    <select name="goods_id">
                    <?php if($group_buy['act_id']){?>
                        <option value="<?php echo $group_buy['goods_id'];?>"><?php echo $group_buy['goods_name'];?></option>
                    <?php  }else{ ?>
                        <option value="0">请先搜索商品,在此生成选项列表...</option>
                    <?php }?>
                    </select>    
                </td>
            </tr>
            <tr>
                <td class="label">活动开始时间：</td>
                <td>
                    <input name="start_time" type="text" id="start_time" size="22" value='<?php echo $group_buy['start_time'];?>' readonly="readonly" />
                    <input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('start_time', '%Y-%m-%d %H:%M', '24', false, 'selbtn1');" value="选择" class="button"/>
                </td>
            </tr>
            <tr>
                <td class="label">活动结束时间：</td>
                <td>
                    <input name="end_time" type="text" id="end_time" size="22" value='<?php echo $group_buy['end_time'];?>' readonly="readonly" />
                    <input name="selbtn2" type="button" id="selbtn2" onclick="return showCalendar('end_time', '%Y-%m-%d %H:%M', '24', false, 'selbtn2');" value="选择" class="button"/>
                </td>
            </tr>
            <tr>
                <td class="label">保证金：</td>
                <td><input name="deposit" type="text" id="deposit" value="<?php echo _default($group_buy['deposit'],0);?>" size="30"/></td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticRestrict');" title="点击此处查看提示信息">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"/>
                    </a>
                    限购数量：
                </td>
                <td>
                    <input type="text" name="restrict_amount" value="<?php echo _default($group_buy['restrict_amount'],0);?>" size="30" />
                    <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticRestrict">
                        达到此数量，团购活动自动结束。0表示没有数量限制。
                    </span>    
                </td>
            </tr>
            <tr>
                <td class="label">赠送积分数：</td>
                <td><input type="text" name="gift_integral" value="<?php echo _default($group_buy['gift_integral'],0);?>" size="30" /></td>
            </tr>
            <?php if(is_array($group_buy['price_ladder'])):?><?php $index=0; ?><?php  foreach($group_buy['price_ladder'] as $key=>$item){ ?>
                <?php if($key == 0){?>
                    <tr>
                        <td class="label">价格阶梯：</td>
                        <td>
                            数量达到<input type="text" name="ladder_amount[]" value="<?php echo $item['amount'];?>" size="8" />&nbsp;&nbsp;
                            享受价格 <input type="text" name="ladder_price[]" value="<?php echo $item['price'];?>" size="8" />
                            <a href="javascript:;" onclick="addLadder(this)"><strong>[+]</strong></a>    
                        </td>
                    </tr>
                <?php  }else{ ?>
                    <tr>
                        <td></td>
                        <td>
                            数量达到 <input type="text" name="ladder_amount[]" value="<?php echo $item['amount'];?>" size="8" />&nbsp;&nbsp;
                            享受价格 <input type="text" name="ladder_price[]" value="<?php echo $item['price'];?>" size="8" />
                            <a href="javascript:;" onclick="removeLadder(this)"><strong>[-]</strong></a>    
                        </td>
                    </tr>
                <?php }?>
            <?php $index++; ?><?php }?><?php endif;?>
            <tr>
                <td class="label">活动说明：</td>
                <td><textarea  name="act_desc" cols="40" rows="3"  ><?php echo $group_buy['act_desc'];?></textarea></td>
            </tr>
            <tr>
                <td class="label">&nbsp;</td>
                <td>
                    <input name="act_id" type="hidden" id="act_id" value="<?php echo $group_buy['act_id'];?>"/>
                    <input type="submit" name="submit" value="确定" class="button" />
                    <input type="reset" value="重置" class="button" />
                    <?php if($group_buy['status'] == 1){?>
                    <input type="submit" name="finish" value="结束活动" class="button" onclick="return confirm('（修改活动结束时间为当前时间）')"/>
                    <?php  }elseif($group_buy['status'] == 2){ ?>
                    <input type="submit" name="succeed" value="活动成功" class="button" onclick="return confirm(succeed_confirm)" />（更新订单价格）<br />
                    <input type="submit" name="fail" value="活动失败" class="button" onclick="return confirm(fail_confirm)" />（取消订单，保证金退回帐户余额，失败原因可以写到活动说明中）
                    <?php  }elseif($group_buy['status'] == 3){ ?>
                    <input type="submit" name="mail" value="发送邮件" class="button" onclick="return confirm('（通知客户付清余款，以便发货）')" />
                    <?php }?> 
                </td>
            </tr>
        </table>
    </div>
</form>

<script language="JavaScript">


    /**
    * 检查表单输入的数据
    */
    function validate()
    {
        validator = new Validator("theForm");
        var eles = document.forms['theForm'].elements;
        
        var goods_id = eles['goods_id'].value;
        if (goods_id <= 0)
        {
            validator.addErrorMsg(error_goods_null);
        }
        validator.isNumber('deposit', error_deposit, false);
        validator.isInt('restrict_amount', error_restrict_amount, false);
        validator.isInt('gift_integral', error_gift_integral, false);
        return validator.passed();
    }

    /**
     * 搜索商品
     */
    function searchGoods()
    {
        var filter = new Object;
        filter.cat_id   = document.forms['searchForm'].elements['cat_id'].value;
        filter.brand_id = document.forms['searchForm'].elements['brand_id'].value;
        filter.keyword  = document.forms['searchForm'].elements['keyword'].value;
        
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
        }
        else
        {
            var opt = document.createElement("OPTION");
            opt.value = 0;
            opt.text  = search_is_null;
            sel.options.add(opt);
        }
        
        return;
    }
    
    /**
    * 新增一个价格阶梯
    */
    function addLadder(obj, amount, price)
    {
        var src  = obj.parentNode.parentNode;
        var idx  = rowindex(src);
        var tbl  = document.getElementById('group-table');
        var row  = tbl.insertRow(idx + 1);
        var cell = row.insertCell(-1);
        cell.innerHTML = '';
        var cell = row.insertCell(-1);
        cell.innerHTML = src.cells[1].innerHTML.replace(/(.*)(addLadder)(.*)(\[)(\+)/i, "$1removeLadder$3$4-");;
    }
    
    
    /**
    * 删除一个价格阶梯
    */
    function removeLadder(obj)
    {
        var row = rowindex(obj.parentNode.parentNode);
        var tbl = document.getElementById('group-table');
        
        tbl.deleteRow(row);
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


