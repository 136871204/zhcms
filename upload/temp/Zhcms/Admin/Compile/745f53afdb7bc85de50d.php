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
    
    <div class="form-div">
        <form action="javascript:searchSnatch()" name="searchForm">
            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
            活动名称  <input type="text" name="keyword" /> <input type="submit" value="搜索" class="button" />
        </form>
    </div>
    
    <!-- 添加货品 -->
    <form method="post" action="" name="listForm">
        <div class="list-div" id="listDiv">
<?php }?>
            <table cellpadding="3" cellspacing="1">
                <tr>
                    <th><a href="javascript:listTable.sort('act_id'); ">编号</a><?php echo $sort_act_id;?></th>
                    <th><a href="javascript:listTable.sort('snatch_name'); ">活动名称</a><?php echo $sort_snatch_name;?></th>
                    <th><a href="javascript:listTable.sort('goods_name'); ">商品名称</a><?php echo $sort_goods_name;?></th>
                    <th><a href="javascript:listTable.sort('start_time'); ">活动开始时间</a><?php echo $sort_start_time;?></th>
                    <th><a href="javascript:listTable.sort('end_time'); ">活动结束时间</a><?php echo $sort_end_time;?></th>
                    <th>价格下限</a></th>
                    <th>消耗积分</a></th>
                    <th>操作</th>
                </tr>
                <?php if(!empty($snatch_list)){?>
                    <?php if(is_array($snatch_list)):?><?php $index=0; ?><?php  foreach($snatch_list as $snatch){ ?>
                    <tr>
                        <td align="center"><?php echo $snatch['act_id'];?></td>
                        <td class="first-cell"><span onclick="listTable.edit(this, 'edit_snatch_name', <?php echo $snatch['act_id'];?>)"><?php echo $snatch['snatch_name'];?></span></td>
                        <td><span><?php echo $snatch['goods_name'];?></span></td>
                        <td align="center"><?php echo $snatch['start_time'];?></td>
                        <td align="center"><?php echo $snatch['end_time'];?></td>
                        <td align="right"><?php echo $snatch['start_price'];?></td>
                        <td align="right"><?php echo $snatch['cost_points'];?></td>
                        <td align="center">
                            <a href=<?php echo U('index');?>&act=view&amp;snatch_id=<?php echo $snatch['act_id'];?>" title="<?php echo $lang['view_detail'];?>"><img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_view.gif" border="0" height="16" width="16"/></a>
                            <a href="<?php echo U('index',array('act'=>'edit','id'=>$snatch['act_id']));?>" title="编辑"><img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_edit.gif" border="0" height="16" width="16"/></a>
                            <a href="javascript:;" onclick="listTable.remove(<?php echo $snatch['act_id'];?>,'您确认要删除这条记录吗?')" title="移除"><img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_drop.gif" border="0" height="16" width="16"/></a>
                        </td>
                    </tr>
                    <?php $index++; ?><?php }?><?php endif;?>
                <?php  }else{ ?>
                    <tr><td class="no-records" colspan="10">没有找到任何记录</td></tr>
                <?php }?>
                <tr>
                  <td align="right" nowrap="true" colspan="10"><?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>      <!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
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

  
<?php if(is_array($filter)):?><?php $index=0; ?><?php  foreach($filter as $key=>$item){ ?>
listTable.filter.<?php echo $key;?> = '<?php echo $item;?>';
<?php $index++; ?><?php }?><?php endif;?>

  onload = function()
  {
      document.forms['searchForm'].elements['keyword'].focus();
      // 开始检查订单
      //startCheckOrder();
  }
  /**
   * 搜索文章
   */
  function searchSnatch()
  {
    var keyword = Utils.trim(document.forms['searchForm'].elements['keyword'].value);
    listTable.filter.keywords = keyword;
    listTable.filter.page = 1;
    listTable.loadList();
  }
  
</script>
<?php }?>