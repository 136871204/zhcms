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
    var process_request = "<?php echo L("admin_eccommon_js_process_request");?>";
    var todolist_caption = "<?php echo L("admin_eccommon_js_todolist_caption");?>";
    var todolist_autosave = "<?php echo L("admin_eccommon_js_todolist_autosave");?>";
    var todolist_save = "<?php echo L("admin_eccommon_js_todolist_save");?>";
    var todolist_clear = "<?php echo L("admin_eccommon_js_todolist_clear");?>";
    var todolist_confirm_save = "<?php echo L("admin_eccommon_js_todolist_confirm_save");?>";
    var todolist_confirm_clear = "<?php echo L("admin_eccommon_js_todolist_confirm_clear");?>";
    var goods_name_not_null = "<?php echo L("admin_ecgoods_js_goods_name_not_null");?>";
    var goods_cat_not_null = "<?php echo L("admin_ecgoods_js_goods_cat_not_null");?>";
    var category_cat_not_null = "<?php echo L("admin_ecgoods_js_category_cat_not_null");?>";
    var brand_cat_not_null = "<?php echo L("admin_ecgoods_js_brand_cat_not_null");?>";
    var goods_cat_not_leaf = "<?php echo L("admin_ecgoods_js_goods_cat_not_leaf");?>";
    var shop_price_not_null = "<?php echo L("admin_ecgoods_js_shop_price_not_null");?>";
    var shop_price_not_number = "<?php echo L("admin_ecgoods_js_shop_price_not_number");?>";
    var select_please = "<?php echo L("admin_ecgoods_js_select_please");?>";
    var button_add = "<?php echo L("admin_ecgoods_js_button_add");?>";
    var button_del = "<?php echo L("admin_ecgoods_js_button_del");?>";
    var spec_value_not_null = "<?php echo L("admin_ecgoods_js_spec_value_not_null");?>";
    var spec_price_not_number = "<?php echo L("admin_ecgoods_js_spec_price_not_number");?>";
    var market_price_not_number = "<?php echo L("admin_ecgoods_js_market_price_not_number");?>";
    var goods_number_not_int = "<?php echo L("admin_ecgoods_js_goods_number_not_int");?>";
    var warn_number_not_int = "<?php echo L("admin_ecgoods_js_warn_number_not_int");?>";
    var promote_not_lt = "<?php echo L("admin_ecgoods_js_promote_not_lt");?>";
    var promote_start_not_null = "<?php echo L("admin_ecgoods_js_promote_start_not_null");?>";
    var promote_end_not_null = "<?php echo L("admin_ecgoods_js_promote_end_not_null");?>";
    var drop_img_confirm = "<?php echo L("admin_ecgoods_js_drop_img_confirm");?>";
    var batch_no_on_sale = "<?php echo L("admin_ecgoods_js_batch_no_on_sale");?>";
    var batch_trash_confirm = "<?php echo L("admin_ecgoods_js_batch_trash_confirm");?>";
    var go_category_page = "<?php echo L("admin_ecgoods_js_go_category_page");?>";
    var go_brand_page = "<?php echo L("admin_ecgoods_js_go_brand_page");?>";
    var volume_num_not_null = "<?php echo L("admin_ecgoods_js_volume_num_not_null");?>";
    var volume_num_not_number = "<?php echo L("admin_ecgoods_js_volume_num_not_number");?>";
    var volume_price_not_null = "<?php echo L("admin_ecgoods_js_volume_price_not_null");?>";
    var volume_price_not_number = "<?php echo L("admin_ecgoods_js_volume_price_not_number");?>";
    var cancel_color = "<?php echo L("admin_ecgoods_js_cancel_color");?>";
    //-->
    </script>
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
    
    <!-- 品牌搜索 -->
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="form-div">
    <form action="javascript:searchGoods()" name="searchForm">
        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
        <?php if($_GET['act'] <> 'trash'){?>
            <!-- 分类 -->
            <select name="cat_id">
                <option value="0"><?php echo L("admin_ecgoods_info_page_info_table_search1");?></option>
                <?php echo $cat_list;?>
            </select>
            <!-- 品牌 -->
            <select name="brand_id">
                <option value="0"><?php echo L("admin_ecgoods_info_page_info_table_search2");?></option>
                <?php if(isset($brand_list) && !empty($brand_list)):$arr["options"]=$brand_list;$arr["selected"]=$_GET['brand_id'];echo html_options($arr);endif;
?>
            </select>
            <!-- 推荐 -->
            <select name="intro_type">
                <option value="0"><?php echo L("admin_ecgoods_common12");?></option>
                <?php if(isset($intro_list) && !empty($intro_list)):$arr["options"]=$intro_list;$arr["selected"]=$_GET['intro_type'];echo html_options($arr);endif;
?>
                {html_options options=$intro_list selected=$smarty.get.intro_type}
            </select>
            <?php if($suppliers_exists == 1){?>
                <!-- 供货商 -->
                <select name="suppliers_id">
                    <option value="0"><?php echo L("admin_ecgoods_common12");?></option>
                    <?php if(isset($suppliers_list_name) && !empty($suppliers_list_name)):$arr["options"]=$suppliers_list_name;$arr["selected"]=$_GET['suppliers_id'];echo html_options($arr);endif;
?>
                </select>
            <?php }?>
            <!-- 上架 -->
            <select name="is_on_sale">
                <option value=''><?php echo L("admin_ecgoods_common12");?></option>
                <option value="1"><?php echo L("admin_ecgoods_info_page_table_th5");?></option>
                <option value="0"><?php echo L("admin_ecgoods_info_page_table_select1");?></option>
            </select>
        <?php }?>
        <!-- 关键字 -->
        <?php echo L("admin_ecgoods_info_page_info_table_search3");?> <input type="text" name="keyword" size="15" />
        <input type="submit" value="<?php echo L("admin_ecgoods_info_page_info_table_search4");?>" class="button" />
    </form>
</div>

<script language="JavaScript">
function searchGoods()
{
    <?php if($_GET['act'] <> 'trash'){?>
        listTable.filter['cat_id'] = document.forms['searchForm'].elements['cat_id'].value;
        listTable.filter['brand_id'] = document.forms['searchForm'].elements['brand_id'].value;
        listTable.filter['intro_type'] = document.forms['searchForm'].elements['intro_type'].value;
        listTable.filter['is_on_sale'] = document.forms['searchForm'].elements['is_on_sale'].value;
        <?php if($suppliers_exists == 1){?>
            listTable.filter['suppliers_id'] = document.forms['searchForm'].elements['suppliers_id'].value;
        <?php }?>
    <?php }?>
    listTable.filter['keyword'] = Utils.trim(document.forms['searchForm'].elements['keyword'].value);
    listTable.filter['page'] = 1;

    listTable.loadList();
    
}
</script>
    <!-- 商品列表 -->
    <form method="post" action="" name="listForm" onsubmit="return confirmSubmit(this)">
        <!-- start goods list -->
        <div class="list-div" id="listDiv">
<?php }?>
            <table cellpadding="3" cellspacing="1">
                <tr>
                    <th>
                        <input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox" />
                        <a href="javascript:listTable.sort('goods_id'); "><?php echo L("admin_ecgoods_info_page_table_th1");?></a><?php echo $sort_goods_id;?>
                    </th>
                    <th><a href="javascript:listTable.sort('goods_name'); "><?php echo L("admin_ecgoods_info_page_table_th2");?></a><?php echo $sort_goods_name;?></th>
                    <th><a href="javascript:listTable.sort('goods_sn'); "><?php echo L("admin_ecgoods_info_page_table_th3");?></a><?php echo $sort_goods_sn;?></th>
                    <th><a href="javascript:listTable.sort('shop_price'); "><?php echo L("admin_ecgoods_info_page_table_th4");?></a><?php echo $sort_shop_price;?></th>
                    <th><?php echo L("admin_ecgoods_info_page_table_th11");?></th>
                </tr>
                <?php if(!empty($goods_list)){?>
                    <?php if(is_array($goods_list)):?><?php $index=0; ?><?php  foreach($goods_list as $goods){ ?>
                    <tr>
                        <td><input type="checkbox" name="checkboxes[]" value="<?php echo $goods['goods_id'];?>" /><?php echo $goods['goods_id'];?></td>
                        <td><?php echo htmlspecialchars($goods['goods_name']);?></td>
                        <td><?php echo $goods['goods_sn'];?></td>
                        <td align="right"><?php echo $goods['shop_price'];?></td>
                        <td align="center">
                            <a href="javascript:;" onclick="listTable.remove(<?php echo $goods['goods_id'];?>, '<?php echo L("admin_ecgoods_info_page_info_table_goods_trash1");?>', 'restore_goods')"><?php echo L("admin_ecgoods_common20");?></a> |
                            <a href="javascript:;" onclick="listTable.remove(<?php echo $goods['goods_id'];?>, '<?php echo L("admin_ecgoods_info_page_info_table_goods_trash2");?>', 'drop_goods')"><?php echo L("admin_ecgoods_js_button_del");?></a>
                        </td>
                    </tr>   
                    <?php $index++; ?><?php }?><?php endif;?>
                <?php  }else{ ?>
                    <tr><td class="no-records" colspan="10"><?php echo L("admin_ecgoods_info_page_table_tr1");?></td></tr>
                <?php }?>
            </table>
            <!-- end goods list -->
            
            <!-- 分页 -->
            <table id="page-table" cellspacing="0">
              <tr>
                <td>
                    <input type="hidden" name="act" value="batch" />
                    <select name="type" id="selAction" onchange="changeAction()">
                        <option value=""><?php echo L("admin_ecgoods_common2");?></option>
                        <option value="restore"><?php echo L("admin_ecgoods_common20");?></option>
                        <option value="drop"><?php echo L("admin_ecgoods_info_page_info_table_goods_trash3");?></option>
                    </select>
                    <select name="target_cat" style="display:none" onchange="checkIsLeaf(this)">
                        <option value="0"><?php echo $lang['select_please'];?></caption>
                        <?php echo $cat_list;?>
                    </select>
                    <input type="submit" value="<?php echo L("admin_ecgoods_info_page_table_button1");?>" id="btnSubmit" name="btnSubmit" class="button" disabled="true" />
                </td>
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
        
    </form>
<!-- end 添加货品 -->

<script type="text/javascript">
listTable.recordCount = <?php echo $record_count;?>;
listTable.pageCount = <?php echo $page_count;?>;

  
<?php if(is_array($filter)):?><?php $index=0; ?><?php  foreach($filter as $key=>$item){ ?>
listTable.filter.<?php echo $key;?> = '<?php echo $item;?>';
<?php $index++; ?><?php }?><?php endif;?>

function confirmSubmit(frm, ext)
{
    if (frm.elements['type'].value == 'restore')
    {
      return confirm("<?php echo L("admin_ecgoods_info_page_info_table_goods_trash1");?>");
    }
    else if (frm.elements['type'].value == 'drop')
    {
      return confirm("<?php echo L("admin_ecgoods_info_page_info_table_goods_trash4");?>");
    }
    else if (frm.elements['type'].value == '')
    {
        return false;
    }
    else
    {
        return true;
    }
}

function changeAction()
{
    var frm = document.forms['listForm'];
    
    if (!document.getElementById('btnSubmit').disabled &&
        confirmSubmit(frm, false))
    {
      frm.submit();
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