<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($full_page){?>
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo C("WEBNAME");?><?php if($ur_here){?> - <?php echo $ur_here;?> <?php }?></title>
<meta name="robots" content="noindex, nofollow"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/general.css" rel="stylesheet" type="text/css" />
<link href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/main.css" rel="stylesheet" type="text/css" />
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
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/transport.js"></script>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/common.js"></script>
<script src='http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/json2.js'></script>
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
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
    
    <div class="form-div">
        <form action="javascript:searchActivity()" name="searchForm">
            <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
             商品名称 <input type="text" name="keyword" size="30" />
            <input name="is_going" type="checkbox" id="is_going" value="1" />
            仅显示进行中的活动
            <input type="submit" value="搜索" class="button" />
        </form>
    </div>
    
    <form method="post" action="<?php echo U('index');?>" name="listForm">
        <!-- start favourable list -->
        <div class="list-div" id="listDiv">
<?php }?>
            <table cellpadding="3" cellspacing="1">
                <tr>
                    <th>
                        <input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox" />
                        <a href="javascript:listTable.sort('act_id'); ">编号</a><?php echo $sort_act_id;?>
                    </th>
                    <th><a href="javascript:listTable.sort('act_name'); ">优惠活动名称</a><?php echo $sort_act_name;?></th>
                    <th><a href="javascript:listTable.sort('start_time'); ">开始时间</a><?php echo $sort_start_time;?></th>
                    <th><a href="javascript:listTable.sort('end_time'); ">结束时间</a><?php echo $sort_end_time;?></th>
                    <th>金额下限</th>
                    <th>金额上限</th>
                    <th><a href="javascript:listTable.sort('sort_order'); ">排序</a><?php echo $sort_sort_order;?></th>
                    <th>操作</th>
                </tr>
                <?php if(!empty($favourable_list)){?>
                    <?php if(is_array($favourable_list)):?><?php $index=0; ?><?php  foreach($favourable_list as $favourable){ ?>
                    <tr>
                        <td><input value="<?php echo $favourable['act_id'];?>" name="checkboxes[]" type="checkbox"/><?php echo $favourable['act_id'];?></td>
                        <td><?php echo $favourable['act_name'];?></td>
                        <td align="right"><?php echo $favourable['start_time'];?></td>
                        <td align="right"><?php echo $favourable['end_time'];?></td>
                        <td align="right"><?php echo $favourable['min_amount'];?></td>
                        <td align="right"><?php echo $favourable['max_amount'];?></td>
                        <td align="center"><span onclick="listTable.edit(this, 'edit_sort_order', <?php echo $favourable['act_id'];?>)"><?php echo $favourable['sort_order'];?></span></td>
                        <td align="center">
                            <a href="<?php echo U('index');?>&act=edit&amp;id=<?php echo $favourable['act_id'];?>" title="编辑">
                                <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_edit.gif" border="0" height="16" width="16" />
                            </a>
                            <a href="javascript:;" onclick="listTable.remove(<?php echo $favourable['act_id'];?>,'您确认要删除这条记录吗?')" title="移除">
                                <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_drop.gif" border="0" height="16" width="16" />
                            </a>      
                        </td>
                    </tr>
                    <?php $index++; ?><?php }?><?php endif;?>
                <?php  }else{ ?>
                    <tr><td class="no-records" colspan="13">没有找到任何记录</td></tr>
                <?php }?>
            </table>
            <table cellpadding="4" cellspacing="0">
                <tr>
                    <td>
                        <input type="submit" name="drop" id="btnSubmit" value="删除" class="button" disabled="true" />
                        <input type="hidden" name="act" value="batch" />
                    </td>
                    <td align="right"><?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>      <!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
      <div id="turn-page">
        総計  <span id="totalRecords"><?php echo $record_count;?></span>
        個記録があり、全部 <span id="totalPages"><?php echo $page_count;?></span>
        ページわけ、いまは　<span id="pageCurrent"><?php echo $filter['page'];?></span>
        ページ，毎ページ <input type='text' size='3' id='pageSize' value="<?php echo $filter['page_size'];?>" onkeypress="return listTable.changePageSize(event)" />
        <span id="page-link">
          <a href="javascript:listTable.gotoPageFirst()">一ページ</a>
          <a href="javascript:listTable.gotoPagePrev()">前へ</a>
          <a href="javascript:listTable.gotoPageNext()">次へ</a>
          <a href="javascript:listTable.gotoPageLast()">末ページ</a>
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
    
      
    <?php if(is_array($filter)):?><?php $index=0; ?><?php  foreach($filter as $key=>$item){ ?>
    listTable.filter.<?php echo $key;?> = '<?php echo $item;?>';
    <?php $index++; ?><?php }?><?php endif;?>

    onload = function()
    {
        document.forms['searchForm'].elements['keyword'].focus();
        
        //startCheckOrder();
    }
    
    /**
    * 搜索团购活动
    */
    function searchActivity()
    {
    
        var keyword = Utils.trim(document.forms['searchForm'].elements['keyword'].value);
        listTable.filter['keyword'] = keyword;
        if (document.forms['searchForm'].elements['is_going'].checked)
        {
            listTable.filter['is_going'] = 1;
        }
        else
        {
            listTable.filter['is_going'] = 0;
        }
        listTable.filter['page'] = 1;
        listTable.loadList("favourable_list");
    }
</script>
<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
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