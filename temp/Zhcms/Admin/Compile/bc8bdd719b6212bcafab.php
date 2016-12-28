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
    var no_title = "<?php echo L("admin_ecarticle_js_no_title");?>";
    var no_cat = "<?php echo L("admin_ecarticle_js_no_cat");?>";
    var not_allow_add = "<?php echo L("admin_ecarticle_js_not_allow_add");?>";
    var drop_confirm = "<?php echo L("admin_ecarticle_js_drop_confirm");?>";
    //-->
    </script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
    
    <div class="form-div">
        <form action="javascript:searchArticle()" name="searchForm" >
            <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
            <select name="cat_id" >
                <option value="0"><?php echo L("admin_ecarticle_info_page_article_list1");?></option>
                <?php echo $cat_select;?>
            </select>
            <?php echo L("admin_ecarticle_info_page_article_list2");?>  <input type="text" name="keyword" id="keyword" />
            <input type="submit" value="<?php echo L("admin_ecarticle_info_page_article_list3");?>" class="button" />
        </form>
    </div>

    <form method="POST" action="<?php echo U('index');?>" name="listForm">
        <!-- start list -->
        <div class="list-div" id="listDiv">
<?php }?>
            <table cellspacing='1' cellpadding='3' id='list-table'>
                <tr>
                    <th>
                        <input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox"/>
                        <a href="javascript:listTable.sort('article_id'); "><?php echo L("admin_ecarticle_info_page_article_list4");?></a><?php echo $sort_article_id;?>
                    </th>
                    <th><a href="javascript:listTable.sort('title'); "><?php echo L("admin_ecarticle_info_page_article_list2");?></a><?php echo $sort_title;?></th>
                    <th><a href="javascript:listTable.sort('cat_id'); "><?php echo L("admin_ecarticle_info_page_article_list5");?></a><?php echo $sort_cat_id;?></th>
                    <th><a href="javascript:listTable.sort('article_type'); "><?php echo L("admin_ecarticle_info_page_article_list6");?></a><?php echo $sort_article_type;?></th>
                    <th><a href="javascript:listTable.sort('is_open'); "><?php echo L("admin_ecarticle_info_page_article_list7");?></a><?php echo $sort_is_open;?></th>
                    <th><a href="javascript:listTable.sort('add_time'); "><?php echo L("admin_ecarticle_info_page_article_list8");?></a><?php echo $sort_add_time;?></th>
                    <th><?php echo L("admin_ecarticle_info_page_article_list9");?></th>
                </tr>
                <?php if(!empty($article_list)){?>
                    <?php if(is_array($article_list)):?><?php $index=0; ?><?php  foreach($article_list as $list){ ?>
                    <tr>
                        <td>
                            <span>
                                <input name="checkboxes[]" type="checkbox" value="<?php echo $list['article_id'];?>" <?php if($list['cat_id'] <= 0){?>disabled="true"<?php }?>/>
                                <?php echo $list['article_id'];?>
                            </span>
                        </td>
                        <td class="first-cell"><span onclick="javascript:listTable.edit(this, 'edit_title', <?php echo $list['article_id'];?>)"><?php echo $list['title'];?></span></td>
                        <td align="left">
                            <span>
                                <?php if($list['cat_id'] > 0){?>
                                    <?php echo htmlspecialchars($list['cat_name']);?>
                                <?php  }else{ ?>
                                    <?php echo L("admin_ecarticle_info_page_article_list10");?>
                                <?php }?>
                            </span>
                        </td>
                        <td align="center"><span><?php if($list['article_type'] == 0){?><?php echo L("admin_ecarticle_info_page_article_list11");?><?php  }else{ ?><?php echo L("admin_ecarticle_info_page_article_list12");?><?php }?></span></td>
                        <td align="center">
                            <?php if($list['cat_id'] > 0){?>
                                <span>
                                    <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/<?php if($list['is_open'] == 1){?>yes<?php  }else{ ?>no<?php }?>.gif" onclick="listTable.toggle(this, 'toggle_show', <?php echo $list['article_id'];?>)" />
                                </span>
                            <?php  }else{ ?>
                                <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/yes.gif" alt="yes" />
                            <?php }?>
                        </td>
                        <td align="center"><span><?php echo $list['date'];?></span></td>
                        <td align="center" nowrap="true">
                            <span>
                                <a href="../article.php?id=<?php echo $list['article_id'];?>" target="_blank" title="<?php echo L("admin_ecarticle_info_page_article_list13");?>">
                                    <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_view.gif" border="0" height="16" width="16" />
                                </a>&nbsp;
                                <a href="<?php echo U('index');?>&act=edit&id=<?php echo $list['article_id'];?>" title="<?php echo L("admin_ecarticle_info_page_article_list14");?>">
                                    <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_edit.gif" border="0" height="16" width="16" />
                                </a>&nbsp;
                                <?php if($list['cat_id'] > 0){?>
                                    <a href="javascript:;" onclick="listTable.remove(<?php echo $list['article_id'];?>, '<?php echo L("admin_ecarticle_info_page_article_list15");?>')" title="<?php echo L("admin_ecarticle_info_page_article_list16");?>">
                                        <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_drop.gif" border="0" height="16" width="16"/>
                                    </a>
                                <?php }?>
                            </span>
                        </td>
                    </tr>
                    <?php $index++; ?><?php }?><?php endif;?>
                <?php  }else{ ?>
                    <tr><td class="no-records" colspan="10"><?php echo L("admin_ecarticle_info_page_article_list17");?></td></tr>
                <?php }?>
                <tr>&nbsp;
                    <td align="right" nowrap="true" colspan="8"><?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>      <!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
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
        
        <div>
            <input type="hidden" name="act" value="batch" />
            <select name="type" id="selAction" onchange="changeAction()">
                <option value=""><?php echo L("admin_ecarticle_info_page_article_list18");?></option>
                <option value="button_remove"><?php echo L("admin_ecarticle_info_page_article_list19");?></option>
                <option value="button_hide"><?php echo L("admin_ecarticle_info_page_article_list20");?></option>
                <option value="button_show"><?php echo L("admin_ecarticle_info_page_article_list21");?></option>
                <option value="move_to"><?php echo L("admin_ecarticle_info_page_article_list22");?></option>
            </select>
            <select name="target_cat" style="display:none">
                <option value="0"><?php echo L("admin_ecarticle_info_page_article_list18");?></option>
                <?php echo $cat_select;?>
            </select>
            
            <input type="submit" value="<?php echo L("admin_ecarticle_info_page_article_list23");?>" id="btnSubmit" name="btnSubmit" class="button" disabled="true" />
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
        // 开始检查订单
        //startCheckOrder();
    }
    
    
    /**
    * @param: bool ext 其他条件：用于转移分类
    */
    function confirmSubmit(frm, ext)
    {
        if (frm.elements['type'].value == 'button_remove')
        {
            return confirm(drop_confirm);
        }
        else if (frm.elements['type'].value == 'not_on_sale')
        {
            return confirm(batch_no_on_sale);
        }
        else if (frm.elements['type'].value == 'move_to')
        {
            ext = (ext == undefined) ? true : ext;
            return ext && frm.elements['target_cat'].value != 0;
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
        
        // 切换分类列表的显示
        frm.elements['target_cat'].style.display = frm.elements['type'].value == 'move_to' ? '' : 'none';
        
        if (!document.getElementById('btnSubmit').disabled &&
        confirmSubmit(frm, false))
        {
            frm.submit();
        }
    }
    
    /* 搜索文章 */
    function searchArticle()
    {
        listTable.filter.keyword = Utils.trim(document.forms['searchForm'].elements['keyword'].value);
        listTable.filter.cat_id = parseInt(document.forms['searchForm'].elements['cat_id'].value);
        listTable.filter.page = 1;
        listTable.loadList();
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