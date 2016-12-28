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
var no_name = "没有输入活动名";
var no_desc = "没有输入活动描述";
var no_goods_id = "没有选择商品";
var invalid_min_price = "价格下限为空或不是数字";
var invalid_max_price = "最多需支付的价格为空或不是数字";
var invalid_integral = "消耗积分为空或不是整数";
var invalid_starttime = "输入的起始时间格式不对，月份，时间应补足两位";
var invalid_endtime = "输入的结束时间格式不对，月份，时间应补足两位";
var invalid_gt = "输入的结束时间应大于起始日期";
var invalid_price = "输入的价格上限应大于价格下限。";
var search_is_null = "没有搜索到任何商品，请重新搜索";
//-->
</script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/calendar.php?lang="></script>
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/calendar/calendar.css" rel="stylesheet" type="text/css" />
<div class="main-div">
    <form method="post" action="<?php echo U('index');?>" name="theForm" onsubmit="return validate()">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">活动名称</td>
                <td><input type="text" name="snatch_name" maxlength="60" size="40" value="<?php echo $snatch['snatch_name'];?>" /><span class="require-field">*</span></td>
            </tr>
            <tr>
                <td align="right">商品关键字</td>
                <td>
                    <input type="text" name="keywords" size="30" />
                    <input type="button" value="搜索" class="button" onclick="searchGoods()"/>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticegoodsid');" title="点击此处查看提示信息">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"/>
                    </a>
                    活动商品
                </td>
                <td>
                    <select name="goods_id" onchange="javascript:change_good_products();">
                        <?php echo $snatch['option'];?>
                    </select>
                    <?php if($snatch["product_id"] <= 0){?>
                    <select name="product_id" style="display:none">
                    <?php  }else{ ?>
                    <select name="product_id" >
                    <?php }?>
                        <?php if(isset($good_products_select) && !empty($good_products_select)):$arr["options"]=$good_products_select;$arr["selected"]=$snatch['product_id'];echo html_options($arr);endif;
?>
                    </select>
                    <span class="require-field">*</span>
                    <br />
                    <?php if($help_open){?>
                    <span class="notice-span" style="display:block" id="noticegoodsid">
                    <?php  }else{ ?>
                    <span class="notice-span" style="display:none" id="noticegoodsid">
                    <?php }?>
                        需要先搜索商品，生成商品列表，然后再选择
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label">活动开始时间</td>
                <td>
                    <input type="text" name="start_time" maxlength="60" size="40" value="<?php echo $snatch['start_time'];?>" readonly="readonly" id="start_time_id" />
                    <input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('start_time_id', '%Y-%m-%d %H:%M', '24', false, 'selbtn1');" value="选择" class="button"/>
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">活动结束时间</td>
                <td>
                    <input type="text" name="end_time" maxlength="60" size="40" value="<?php echo $snatch['end_time'];?>"  readonly="readonly" id ="end_time_id" />
                    <input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('end_time_id', '%Y-%m-%d %H:%M', '24', false, 'selbtn1');" value="选择" class="button"/>
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticeminPrice');" title="点击此处查看提示信息">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"/>
                    </a>
                    价格下限
                </td>
                <td>
                    <input type="text" name="start_price" maxlength="60" size="20" value="<?php echo $snatch['start_price'];?>" />
                    <span class="require-field">*</span>
                    <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeminPrice">
                        用户出价范围的下限
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticemaxPrice');" title="点击此处查看提示信息">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"/>
                    </a>
                    价格上限
                </td>
                <td>
                    <input type="text" name="end_price" maxlength="60" size="20" value="<?php echo $snatch['end_price'];?>" />
                    <span class="require-field">*</span>
                    <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticemaxPrice">
                        用户出价范围的上限
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticePrice');" title="点击此处查看提示信息">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"/>
                    </a>
                    最多需支付的价格
                </td>
                <td>
                    <input type="text" name="max_price" maxlength="60" size="20" value="<?php echo $snatch['max_price'];?>" />
                    <span class="require-field">*</span>
                    <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticePrice">
                    获奖者出价高于这个价格，则以这个价格购买该商品。为0时按用户出价购买商品
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticeintegral');" title="点击此处查看提示信息">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"/>
                    </a>
                    消耗积分
                </td>
                <td>
                    <input type="text" name="cost_points" maxlength="60" size="20" value="<?php echo $snatch['cost_points'];?>" />
                    <span class="require-field">*</span>
                    <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeintegral">
                    每次出价所消耗的积分值
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label">活动描述</td>
                <td><textarea  name="desc" cols="60" rows="4"  ><?php echo $snatch['act_desc'];?></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="确定" class="button" />
                    <input type="reset" value="重置" class="button" />
                    <input type="hidden" name="act" value="<?php echo $form_action;?>" />
                    <input type="hidden" name="id" value="<?php echo $snatch['act_id'];?>" />
                </td>
            </tr>
        </table>
    </form>
</div>
<script>
var display_yes = (Browser.isIE) ? 'block' : 'table-row-group';
document.forms['theForm'].elements['snatch_name'].focus();

/**
 * 检查表单输入的数据
 */
function validate()
{
  validator = new Validator("theForm");
  validator.required("snatch_name",  no_name);
  validator.required("desc",         no_desc);
  validator.isNullOption("goods_id", no_goods_id);
  validator.isTime("start_time", invalid_starttime, true);
  validator.isTime("end_time", invalid_endtime, true);
  validator.gt("end_time", "start_time", invalid_gt);
  validator.gt("end_price", "start_price", invalid_price);
  validator.isNumber("start_price", invalid_min_price, true);
  validator.isNumber("max_price", invalid_max_price, true);
  validator.isInt("cost_points", invalid_integral, true);

  if (document.forms['theForm'].elements['act'] == "insert")
  {
      validator.required("password", no_password);
  }

  return validator.passed();
}


function searchGoods()
{
    var filter = new Object;
    filter.keyword = document.forms['theForm'].elements['keywords'].value;
    
    var ajaxurl=CONTROL +"&m=index&is_ajax=1&act=search_goods";
    Ajax.call(ajaxurl, filter, searchGoodsResponse, 'GET', 'JSON');
}



function searchGoodsResponse(result)
{
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

  if (result.message.length > 0)
  {
    alert(result.message);
  }
}

function change_good_products()
{
    var filter = new Object;
    filter.goods_id = document.forms['theForm'].elements['goods_id'].value;
    var ajaxurl=CONTROL +"&m=index&is_ajax=1&act=search_products";
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