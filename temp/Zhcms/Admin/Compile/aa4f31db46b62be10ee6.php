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
    var process_request = "<?php echo L("admin_eccommon_js_process_request");?>";
    var todolist_caption = "<?php echo L("admin_eccommon_js_todolist_caption");?>";
    var todolist_autosave = "<?php echo L("admin_eccommon_js_todolist_autosave");?>";
    var todolist_save = "<?php echo L("admin_eccommon_js_todolist_save");?>";
    var todolist_clear = "<?php echo L("admin_eccommon_js_todolist_clear");?>";
    var todolist_confirm_save = "<?php echo L("admin_eccommon_js_todolist_confirm_save");?>";
    var todolist_confirm_clear = "<?php echo L("admin_eccommon_js_todolist_confirm_clear");?>";
    var no_content = "<?php echo L("admin_ecusermsg_js_no_content");?>";
    var no_reply_content = "<?php echo L("admin_ecusermsg_js_no_reply_content");?>";
    var no_title = "<?php echo L("admin_ecusermsg_js_no_title");?>"
    //-->
    </script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
    
    <div class="form-div">
        <form action="javascript:searchMsg()" name="searchForm">
            <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
            <?php echo L("admin_ecusermsg_page_table_th5");?>:
            <select name="msg_type">
                <option value="-1"><?php echo L("admin_ecusermsg_page_table_th6");?></option>
                <option value="0"><?php echo $lang['type'][0];?></option>
                <option value="1"><?php echo $lang['type'][1];?></option>
                <option value="2"><?php echo $lang['type'][2];?></option>
                <option value="3"><?php echo $lang['type'][3];?></option>
                <option value="4"><?php echo $lang['type'][4];?></option>
                <option value="5"><?php echo $lang['type'][5];?></option>
            </select>
            <?php echo L("admin_ecusermsg_page_table_th7");?>: <input type="text" name="keyword" /> 
            <input type="submit" class="button" value=" <?php echo L("admin_ecusermsg_page_table_btn2");?> " />
        </form>
    </div>
    
    <form method="POST" action="<?php echo U('index');?>" name="listForm" onsubmit="return confirm_bath()">
        <div class="list-div" id="listDiv">
<?php }?>
            <table cellpadding="3" cellspacing="1">
                <tr>
                    <th>
                        <input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox" />
                        <a href="javascript:listTable.sort('msg_id'); "><?php echo L("admin_ecusermsg_page_table_th8");?></a><?php echo $sort_msg_id;?>
                    </th>
                    <th><a href="javascript:listTable.sort('user_name'); "><?php echo L("admin_ecusermsg_page_table_th9");?></a><?php echo $sort_user_name;?></th>
                    <th><a href="javascript:listTable.sort('msg_title'); "><?php echo L("admin_ecusermsg_page_table_th7");?></a><?php echo $sort_msg_title;?></th>
                    <th><a href="javascript:listTable.sort('msg_type'); "><?php echo L("admin_ecusermsg_page_table_th5");?></a><?php echo $sort_msg_type;?></th>
                    <th><a href="javascript:listTable.sort('msg_time'); "><?php echo L("admin_ecusermsg_page_table_th10");?></a><?php echo $sort_msg_time;?></th>
                    <th><a href="javascript:listTable.sort('msg_status'); "><?php echo L("admin_ecusermsg_page_table_th11");?></a><?php echo $sort_msg_status;?></th>
                    <th><a href="javascript:listTable.sort('reply'); "><?php echo L("admin_ecusermsg_page_table_th12");?></a><?php echo $sort_reply;?></th>
                    <th><?php echo $lang['handler'];?></th>
                </tr>
                <?php if(!empty($msg_list)){?>
                    <?php if(is_array($msg_list)):?><?php $index=0; ?><?php  foreach($msg_list as $msg){ ?>
                    <tr>
                        <td><input type="checkbox" name="checkboxes[]" value="<?php echo $msg['msg_id'];?>" /><?php echo $msg['msg_id'];?></td>
                        <td align="center"><?php echo $msg['user_name'];?></td>
                        <td align="left"><?php echo sub_str($msg['msg_title'],40);?></td>
                        <td align="center">
                            <?php echo $msg['msg_type'];?>
                            <?php if($msg['order_id']){?>
                                <br/><a href="<?php echo U('Admin/EcOrder/index');?>&act=info&order_id=<?php echo $msg['order_id'];?>"><?php echo $msg['order_sn'];?></a>
                            <?php }?>
                        </td>
                        <td align="center"  nowrap="nowrap"><?php echo $msg['msg_time'];?></td>
                        <?php if($msg['msg_area'] == 0){?>
                        <td align="center"><?php echo L("admin_ecusermsg_page_table_th13");?></td>
                        <?php  }else{ ?>
                        <td align="center"><?php if($msg['msg_status'] == 0){?><?php echo L("admin_ecusermsg_page_table_th14");?><?php  }else{ ?><?php echo L("admin_ecusermsg_page_table_th13");?><?php }?></td>
                        <?php }?>
                        <td align="center"><?php if($msg['reply'] == 0){?><?php echo L("admin_ecusermsg_page_table_th15");?><?php  }else{ ?><?php echo L("admin_ecusermsg_page_table_th16");?><?php }?></td>
                        <td align="center">
                            <a href="<?php echo U('index');?>&act=view&id=<?php echo $msg['msg_id'];?>" title="<?php echo L("admin_ecusermsg_page_table_th17");?>">
                                <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_view.gif" border="0" height="16" width="16" />
                            </a>
                            <a href="javascript:;" onclick="listTable.remove(<?php echo $msg['msg_id'];?>, '<?php echo L("admin_ecusermsg_page_table_th18");?>')"  title="<?php echo L("admin_ecusermsg_page_table_th19");?>">
                                <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_drop.gif" border="0" height="16" width="16"/>
                            </a>
                        </td>
                    </tr>
                    <?php $index++; ?><?php }?><?php endif;?>
                <?php  }else{ ?>
                    <tr><td class="no-records" colspan="7"><?php echo L("admin_ecusermsg_page_table_th20");?></td></tr>
                <?php }?>
            </table>
            <table id="page-table" cellspacing="0">
                <tr>
                    <td>
                        <div>
                            <select name="sel_action">
                                <option value=""><?php echo L("admin_ecusermsg_page_table_th6");?></option>
                                <option value="remove"><?php echo L("admin_ecusermsg_page_table_th21");?></option>
                                <option value="allow"><?php echo L("admin_ecusermsg_page_table_th22");?></option>
                                <option value="deny"><?php echo L("admin_ecusermsg_page_table_th23");?></option>
                            </select>
                            <input type="hidden" name="act" value="batch" />
                            <input type="submit" name="drop" id="btnSubmit" value=" <?php echo L("admin_ecusermsg_page_table_btn1");?> " class="button" disabled="true" />
                        </div>
                    </td>
                    <td align="right" nowrap="true">
                        <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>      <!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
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


<script type="text/javascript">
    listTable.recordCount = <?php echo $record_count;?>;
    listTable.pageCount = <?php echo $page_count;?>;
    
    cfm = new Object();
    cfm['allow'] = '<?php echo L("admin_ecusermsg_page_table_th24");?>';
    cfm['remove'] = '<?php echo L("admin_ecusermsg_page_table_th25");?>';
    cfm['deny'] = '<?php echo L("admin_ecusermsg_page_table_th26");?>';

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
     * 搜索标题
     */
    function searchMsg()
    {
        var keyword = Utils.trim(document.forms['searchForm'].elements['keyword'].value);
        var msgType = document.forms['searchForm'].elements['msg_type'].value;
    
        listTable.filter['keywords'] = Utils.trim(document.forms['searchForm'].elements['keyword'].value);
        listTable.filter['msg_type'] = document.forms['searchForm'].elements['msg_type'].value;
        listTable.filter['page'] = 1;
        listTable.loadList();
    }
    
    function confirm_bath()
    {
        var action = document.forms['listForm'].elements['sel_action'].value;
        if (action == 'allow'||action == 'remove'||action == 'deny')
          {
              return confirm(cfm[action]);
          }
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