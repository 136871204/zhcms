<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($full_page){?>
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    var process_request = "<?php echo L("admin_eccommon_js_process_request");?>";
    var todolist_caption = "<?php echo L("admin_eccommon_js_todolist_caption");?>";
    var todolist_autosave = "<?php echo L("admin_eccommon_js_todolist_autosave");?>";
    var todolist_save = "<?php echo L("admin_eccommon_js_todolist_save");?>";
    var todolist_clear = "<?php echo L("admin_eccommon_js_todolist_clear");?>";
    var todolist_confirm_save = "<?php echo L("admin_eccommon_js_todolist_confirm_save");?>";
    var todolist_confirm_clear = "<?php echo L("admin_eccommon_js_todolist_confirm_clear");?>";
    var name_not_null = "<?php echo L("admin_ecattribute_js_name_not_null");?>";
    var values_not_null = "<?php echo L("admin_ecattribute_js_values_not_null");?>";
    var cat_id_not_null = "<?php echo L("admin_ecattribute_js_cat_id_not_null");?>";
    //-->
    </script>
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
    
    <div class="form-div">
        <form action="" name="searchForm">
            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
            <?php echo L("admin_ecattribute_info_page_table_th1");?>：
            <select name="goods_type" onchange="searchAttr(this.value)">
                <option value="0"><?php echo L("admin_ecattribute_info_page_table_th2");?></caption>
                <?php echo $goods_type_list;?>
            </select>
        </form>
    </div>
    <form method="post" action="<?php echo U('index',array('act'=>'batch'));?>" name="listForm">
        <div class="list-div" id="listDiv">
<?php }?>
            <table cellpadding="3" cellspacing="1">
                <tr>
                    <th>
                        <input onclick='listTable.selectAll(this, "checkboxes[]")' type="checkbox"/>
                        <a href="javascript:listTable.sort('attr_id'); "><?php echo L("admin_ecattribute_info_page_table_th3");?></a><?php echo $sort_attr_id;?>      
                    </th>
                    <th><a href="javascript:listTable.sort('attr_name'); "><?php echo L("admin_ecattribute_info_page_table_th4");?></a><?php echo $sort_attr_name;?></th>
                    <th><a href="javascript:listTable.sort('cat_id'); "><?php echo L("admin_ecattribute_info_page_table_th5");?></a><?php echo $sort_cat_id;?></th>
                    <th><a href="javascript:listTable.sort('attr_input_type');"><?php echo L("admin_ecattribute_info_page_table_th6");?></a><?php echo $sort['attr_input_type'];?></th>
                    <th><?php echo L("admin_ecattribute_info_page_table_th7");?></th>
                    <th><a href="javascript:listTable.sort('sort_order'); "><?php echo L("admin_ecattribute_info_page_table_th8");?></a><?php echo $sort_sort_order;?></th>
                    <th><?php echo L("admin_ecattribute_info_page_table_th9");?></th>
                </tr>
                <?php if(!empty($attr_list)){?>
                    <?php if(is_array($attr_list)):?><?php $index=0; ?><?php  foreach($attr_list as $attr){ ?>
                    <tr>
                        <td nowrap="true" valign="top">
                            <span><input value="<?php echo $attr['attr_id'];?>" name="checkboxes[]" type="checkbox"/><?php echo $attr['attr_id'];?></span>
                        </td>
                        <td class="first-cell" nowrap="true" valign="top"><span onclick="listTable.edit(this, 'edit_attr_name', <?php echo $attr['attr_id'];?>)"><?php echo $attr['attr_name'];?></span></td>
                        <td nowrap="true" valign="top"><span><?php echo $attr['cat_name'];?></span></td>
                        <td nowrap="true" valign="top"><span><?php echo $attr['attr_input_type_desc'];?></span></td>
                        <td valign="top"><span><?php echo $attr['attr_values'];?></span></td>
                        <td align="right" nowrap="true" valign="top"><span onclick="listTable.edit(this, 'edit_sort_order', <?php echo $attr['attr_id'];?>)"><?php echo $attr['sort_order'];?></span></td>
                        <td align="center" nowrap="true" valign="top">
                            <a href="<?php echo U('index',array('act'=>'edit','attr_id'=>$attr['attr_id']));?>" title="<?php echo L("admin_ecattribute_info_page_table_th10");?>"><img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_edit.gif" border="0" height="16" width="16"/></a>
                            <a href="javascript:;" onclick="removeRow(<?php echo $attr['attr_id'];?>)" title="<?php echo $lang['remove'];?>"><img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_drop.gif" border="0" height="16" width="16"/></a>
                        </td>
                    </tr>
                    <?php $index++; ?><?php }?><?php endif;?>
                <?php  }else{ ?>
                    <tr><td class="no-records" colspan="10"><?php echo L("admin_ecattribute_info_page_table_th11");?></td></tr>
                <?php }?>
            </table>
            <table cellpadding="4" cellspacing="0">
                <tr>
                  <td><input type="submit" id="btnSubmit" value="<?php echo L("admin_ecattribute_info_page_table_btn1");?>" class="button" disabled="true" /></td>
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

  
<?php if(is_array($filter)):?><?php $index=0; ?><?php  foreach($filter as $key=>$item){ ?>
listTable.filter.<?php echo $key;?> = '<?php echo $item;?>';
<?php $index++; ?><?php }?><?php endif;?>


/**
* 查询商品属性
*/
function searchAttr(goodsType)
{
    listTable.filter.goods_type = goodsType;
    listTable.filter.page = 1;
    listTable.loadList();
}

function removeRow(attr_id)
{
    var ajaxurl=CONTROL +"&is_ajax=1&act=get_attr_num&attr_id="+attr_id;
    Ajax.call(ajaxurl, '', removeRowResponse, 'GET', 'JSON');
}
function removeRowResponse(result)
{
    if (result.message.length > 0)
    {
      alert(result.message);
    }
    
    if (result.error == 0)
    {
      listTable.remove(result.content.attr_id, result.content.drop_confirm);
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
<?php }?>