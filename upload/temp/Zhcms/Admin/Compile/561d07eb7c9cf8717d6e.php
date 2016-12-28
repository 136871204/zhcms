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
    var type_name_empty = "请输入红包类型名称!";
    var type_money_empty = "请输入红包类型价格!";
    var order_money_empty = "请输入订单金额!";
    var type_money_isnumber = "类型金额必须为数字格式!";
    var order_money_isnumber = "订单金额必须为数字格式!";
    var bonus_sn_empty = "请输入红包的序列号!";
    var bonus_sn_number = "红包的序列号必须是数字!";
    var bonus_sum_empty = "请输入您要发放的红包数量!";
    var bonus_sum_number = "红包的发放数量必须是一个整数!";
    var bonus_type_empty = "请选择红包的类型金额!";
    var user_rank_empty = "您没有指定会员等级!";
    var user_name_empty = "您至少需要选择一个会员!";
    var invalid_min_amount = "请输入订单下限（大于0的数字）";
    var send_start_lt_end = "红包发放开始日期不能大于结束日期";
    var use_start_lt_end = "红包使用开始日期不能大于结束日期";
    //-->
    </script>
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
    

    <form method="POST" action="<?php echo U('index');?>&act=batch&bonus_type=<?php echo $_GET['bonus_type'];?>" name="listForm">
        <!-- start user_bonus list -->
        <div class="list-div" id="listDiv">
<?php }?>
            <table cellpadding="3" cellspacing="1">
                <tr>
                    <th>
                        <input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox"/>
                        <a href="javascript:listTable.sort('bonus_id'); ">编号</a><?php echo $sort_bonus_id;?>
                    </th>
                    <?php if($show_bonus_sn){?>
                    <th><a href="javascript:listTable.sort('bonus_sn'); ">红包序列号</a><?php echo $sort_bonus_sn;?></th>
                    <?php }?>
                    <th><a href="javascript:listTable.sort('type_name'); ">红包类型</a><?php echo $sort_type_name;?></th>
                    <th><a href="javascript:listTable.sort('order_id'); ">订单号</a><?php echo $sort_order_id;?></th>
                    <th><a href="javascript:listTable.sort('user_id'); ">使用会员</a><?php echo $sort_user_id;?></th>
                    <th><a href="javascript:listTable.sort('used_time'); ">使用时间</a><?php echo $sort_used_time;?></th>
                    <?php if($show_mail){?>
                    <th><a href="javascript:listTable.sort('emailed'); ">邮件通知</a><?php echo $sort_emailed;?></th>
                    <?php }?>
                    <th>操作</th>
                </tr>
                <?php if(!empty($bonus_list)){?>
                    <?php if(is_array($bonus_list)):?><?php $index=0; ?><?php  foreach($bonus_list as $bonus){ ?>
                    <tr>
                        <td><span><input value="<?php echo $bonus['bonus_id'];?>" name="checkboxes[]" type="checkbox"/><?php echo $bonus['bonus_id'];?></span></td>
                        <?php if($show_bonus_sn){?>
                        <td><?php echo $bonus['bonus_sn'];?></td>
                        <?php }?>
                        <td><?php echo $bonus['type_name'];?></td>
                        <td><?php echo $bonus['order_sn'];?></td>
                        <td>
                            <?php if($bonus['email']){?>
                                <a href="mailto:<?php echo $bonus['email'];?>"><?php echo $bonus['user_name'];?></a>
                            <?php  }else{ ?>
                                <?php echo $bonus['user_name'];?>
                            <?php }?>
                        </td>
                        <td align="right"><?php echo $bonus['used_time'];?></td>
                        <?php if($show_mail){?>
                        <td align="center"><?php echo $bonus['emailed'];?></td>
                        <?php }?>
                        <td align="center">
                            <a href="javascript:;" onclick="listTable.remove(<?php echo $bonus['bonus_id'];?>, '确定删除吗？', 'remove_bonus')">删除</a>
                            <?php if($show_mail and $bonus['order_id'] == 0 and $bonus['email']){?>
                            <a href="<?php echo U('index');?>&act=send_mail&bonus_id=<?php echo $bonus['bonus_id'];?>">发邮件</a>
                            <?php }?>
                        </td>
                    </tr>
                    <?php $index++; ?><?php }?><?php endif;?>
                <?php  }else{ ?>
                    <tr><td class="no-records" colspan="11">没有找到任何记录</td></tr>
                <?php }?>
            </table>
            <table cellpadding="4" cellspacing="0">
                <tr>
                    <td>
                        <input type="submit" name="drop" id="btnSubmit" value="删除" class="button" disabled="true" />
                        <?php if($show_mail){?>
                            <input type="submit" name="mail" id="btnSubmit1" value="发邮件" class="button" disabled="true" />
                        <?php }?>
                    </td>
                    <td align="right"><?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>      <!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
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
    </form>
<!-- end 添加货品 -->

<script type="text/javascript">
    listTable.recordCount = <?php echo $record_count;?>;
    listTable.pageCount = <?php echo $page_count;?>;
    listTable.query = "query_bonus";
  
    <?php if(is_array($filter)):?><?php $index=0; ?><?php  foreach($filter as $key=>$item){ ?>
    listTable.filter.<?php echo $key;?> = '<?php echo $item;?>';
    <?php $index++; ?><?php }?><?php endif;?>

    onload = function()
    {
    // 开始检查订单
    //startCheckOrder();
        document.forms['listForm'].reset();
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