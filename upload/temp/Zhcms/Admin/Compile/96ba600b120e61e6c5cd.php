<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($full_page){?>
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    var remove_confirm = "删除订单将清除该订单的所有信息。您确定要这么做吗？";
    var confirm_merge = "您确实要合并这两个订单吗？";
    var input_price = "自定义价格";
    var pls_search_user = "请搜索并选择会员";
    var confirm_drop = "确认要删除该商品吗？";
    var invalid_goods_number = "商品数量不正确";
    var pls_search_goods = "请搜索并选择商品";
    var pls_select_area = "请完整选择所在地区";
    var pls_select_shipping = "请选择配送方式";
    var pls_select_payment = "请选择支付方式";
    var pls_select_pack = "请选择包装";
    var pls_select_card = "请选择贺卡";
    var pls_input_note = "请您填写备注！";
    var pls_input_cancel = "请您填写取消原因！";
    var pls_select_refund = "请选择退款方式！";
    var pls_select_agency = "请选择办事处！";
    var pls_select_other_agency = "该订单现在就属于这个办事处，请选择其他办事处！";
    var loading = "加载中...";
    //-->
    </script>
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
    
    <!-- 订单搜索 -->
    <div class="form-div">
        <form action="javascript:searchOrder()" name="searchForm">
            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
            订单号<input name="order_sn" type="text" id="order_sn" size="15"/>
            收货人<input name="consignee" type="text" id="consignee" size="15"/>
            订单状态
            <select name="status" id="status">
                <option value="-1">请选择...</option>
                <?php if(isset($status_list) && !empty($status_list)):$arr["options"]=$status_list;$arr["selected"]=null;echo html_options($arr);endif;
?>
            </select>
            <input type="submit" value="搜索" class="button" />
            <a href="<?php echo U('index');?>&act=list&composite_status=<?php echo $os_unconfirmed;?>">待确认</a>
            <a href="<?php echo U('index');?>&act=list&composite_status=<?php echo $cs_await_pay;?>">待付款</a>
            <a href="<?php echo U('index');?>&act=list&composite_status=<?php echo $cs_await_ship;?>">待发货</a>
        </form>
    </div>
    
    
    <form method="post" action="<?php echo U('index');?>&act=operate" name="listForm" onsubmit="return check()">
        <div class="list-div" id="listDiv">
<?php }?>
            <table cellpadding="3" cellspacing="1">
                <tr>
                    <th>
                        <input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox" />
                        <a href="javascript:listTable.sort('order_sn', 'DESC'); ">订单号</a><?php echo $sort_order_sn;?>
                    </th>
                    <th><a href="javascript:listTable.sort('add_time', 'DESC'); ">下单时间</a><?php echo $sort_order_time;?></th>
                    <th><a href="javascript:listTable.sort('consignee', 'DESC'); ">收货人</a><?php echo $sort_consignee;?></th>
                    <th><a href="javascript:listTable.sort('total_fee', 'DESC'); ">总金额</a><?php echo $sort_total_fee;?></th>
                    <th><a href="javascript:listTable.sort('order_amount', 'DESC'); ">应付金额</a><?php echo $sort_order_amount;?></th>
                    <th>订单状态</th>
                    <th>操作</th>
                </tr>
                <?php if(!empty($order_list)){?>
                    <?php if(is_array($order_list)):?><?php $index=0; ?><?php  foreach($order_list as $order){ ?>
                    <tr>
                        <td valign="top" nowrap="nowrap">
                            <input type="checkbox" name="checkboxes" value="<?php echo $order['order_sn'];?>" />
                            <a href="<?php echo U('index');?>&act=info&order_id=<?php echo $order['order_id'];?>" id="order_<?php echo $okey;?>">
                                <?php echo $order['order_sn'];?>
                                <?php if($order['extension_code'] == 'group_buy'){?>
                                    <br />
                                    <div align="center">
                                        （团购）
                                    </div>
                                <?php  }elseif($order['extension_code'] == 'exchange_goods'){ ?>
                                    <br />
                                    <div align="center">
                                        （积分兑换）
                                    </div>
                                <?php }?>
                            </a>
                        </td>
                        <td><?php echo $order['buyer'];?><br /><?php echo $order['short_order_time'];?></td>
                        <td align="left" valign="top">
                            <a href="mailto:<?php echo $order['email'];?>"> <?php echo $order['consignee'];?></a>
                            <?php if($order['tel']){?>
                                 [TEL: <?php echo $order['tel'];?>]
                            <?php }?>
                            <br /><?php echo $order['address'];?>
                        </td>
                        <td align="right" valign="top" nowrap="nowrap"><?php echo $order['formated_total_fee'];?></td>
                        <td align="right" valign="top" nowrap="nowrap"><?php echo $order['formated_order_amount'];?></td>
                        <td align="center" valign="top" nowrap="nowrap">
                            <?php echo $lang['os'][$order['order_status']]; ?>,
                            <?php echo $lang['ps'][$order['pay_status']]; ?>,
                            <?php echo $lang['ss'][$order['shipping_status']]; ?>
                        </td>
                        <td align="center" valign="top"  nowrap="nowrap">
                            <a href="<?php echo U('index');?>&act=info&order_id=<?php echo $order['order_id'];?>">查看</a>
                            <?php if($order['can_remove']){?>
                                <br />
                                <a href="javascript:;" onclick="listTable.remove(<?php echo $order['order_id'];?>, remove_confirm, 'remove_order')">移除</a>
                            <?php }?>
                        </td>
                    </tr>
                    <?php $index++; ?><?php }?><?php endif;?>
                <?php  }else{ ?>
                    <tr><td class="no-records" colspan="10">没有找到任何记录</td></tr>
                <?php }?>
            </table>
            <!-- 分页 -->
            <table id="page-table" cellspacing="0">
                <tr>
                    <td align="right" nowrap="true">
                        <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>      <!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
      <div id="turn-page">
        <?php echo L("admin_eccommon_page_t1");?>  <span id="totalRecords"><?php echo $record_count;?></span>
        <?php echo L("admin_eccommon_page_t2");?> <span id="totalPages"><?php echo $page_count;?></span>
        <?php echo L("admin_eccommon_page_t3");?> <span id="pageCurrent"><?php echo $filter['page'];?></span>
        <?php echo L("admin_eccommon_page_t4");?> <input type='text' size='3' id='pageSize' value="<?php echo $filter['page_size'];?>" onkeypress="return listTable.changePageSize(event)" />
        <span id="page-link">
          <a href="javascript:listTable.gotoPageFirst()"><?php echo L("admin_eccommon_page_t5");?></a>
          <a href="javascript:listTable.gotoPagePrev()"><?php echo L("admin_eccommon_page_t6");?></a>
          <a href="javascript:listTable.gotoPageNext()"><?php echo L("admin_eccommon_page_t7");?></a>
          <a href="javascript:listTable.gotoPageLast()"><?php echo L("admin_eccommon_page_t8");?></a>
          <select id="gotoPage" onchange="listTable.gotoPage(this.value)">
            <?php 
                echo smarty_create_pages($filter['page'],$page_count);
            ?>
          </select>
        </span>
      </div>

                    </td>
                </tr>
            </table>
                
            
<?php if($full_page){?>
        </div>
        <div>
            <input name="confirm" type="submit" id="btnSubmit" value="确认" class="button" disabled="true" onclick="this.form.target = '_self'" />
            <input name="invalid" type="submit" id="btnSubmit1" value="无效" class="button" disabled="true" onclick="this.form.target = '_self'" />
            <input name="cancel" type="submit" id="btnSubmit2" value="取消" class="button" disabled="true" onclick="this.form.target = '_self'" />
            <input name="remove" type="submit" id="btnSubmit3" value="移除" class="button" disabled="true" onclick="this.form.target = '_self'" />
            <input name="print" type="submit" id="btnSubmit4" value="打印订单" class="button" disabled="true" onclick="this.form.target = '_blank'" />
            <input name="batch" type="hidden" value="1" />
            <input name="order_id" type="hidden" value="" />
        </div>
    </form>

<script type="text/javascript">
    listTable.recordCount = <?php echo $record_count;?>;
    listTable.pageCount = <?php echo $page_count;?>;
    
      
    <?php if(is_array($filter)):?><?php $index=0; ?><?php  foreach($filter as $key=>$item){ ?>
    listTable.filter.<?php echo $key;?> = '<?php echo $item;?>';
    <?php $index++; ?><?php }?><?php endif;?>

    onload = function()
    {
        // 开始检查订单
        startCheckOrder();
    }
    
    /**
     * 搜索订单
     */
    function searchOrder()
    {
        listTable.filter['order_sn'] = Utils.trim(document.forms['searchForm'].elements['order_sn'].value);
        listTable.filter['consignee'] = Utils.trim(document.forms['searchForm'].elements['consignee'].value);
        listTable.filter['composite_status'] = document.forms['searchForm'].elements['status'].value;
        listTable.filter['page'] = 1;
        listTable.loadList();
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
<?php }?>