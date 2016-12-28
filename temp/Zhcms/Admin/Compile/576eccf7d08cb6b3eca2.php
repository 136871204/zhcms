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
    //-->
    </script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/calendar.php?lang=<?php echo $_SESSION['language'];?>"></script>
    <link href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/calendar/calendar.css" rel="stylesheet" type="text/css" />
    <script>
    var thisfile = '<?php echo $thisfile;?>';
    var deleteck = <?php echo L("admin_ecarticleauto_js_deleteck");?>;
    var deleteid = <?php echo L("admin_ecarticleauto_js_deleteid");?>;
    </script>
    
    <div class="form-div">
        <?php if(!$crons_enable){?>
            <ul style="padding:0; margin: 0; list-style-type:none; color: #CC0000;">
                <li style="border: 1px solid #CC0000; background: #FFFFCC; padding: 10px; margin-bottom: 5px;" >
                    <?php echo L("admin_ecarticleauto_info_page_good_auto1");?>-><?php echo L("admin_ecarticleauto_info_page_good_auto2");?>
                </li>
            </ul>
        <?php }?>
        <form action="<?php echo $thisfile;?>" method="post">
            <?php echo L("admin_ecarticleauto_common2");?>
            <input type="hidden" name="act" value="list" />
            <input name="goods_name" type="text" size="25" /> 
            <input type="submit" value="<?php echo L("admin_ecarticleauto_info_page_good_auto3");?>" class="button" />
        </form>
    </div>    
    <form method="post" action="<?php echo $thisfile;?>" name="listForm">
        <div class="list-div" id="listDiv">
        
<?php }?>
            <table cellspacing='1' cellpadding='3'>
                <tr>
                    <th width="5%"><input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox"/><?php echo L("admin_ecarticleauto_info_page_good_auto4");?></th>
                    <th><?php echo L("admin_ecarticleauto_common2");?></th>
                    <th width="25%"><?php echo L("admin_ecarticleauto_info_page_good_auto5");?></th>
                    <th width="25%"><?php echo L("admin_ecarticleauto_info_page_good_auto6");?></th>
                    <th width="10%"><?php echo L("admin_ecarticleauto_info_page_good_auto7");?></th>
                </tr>
                <?php if(!empty($goodsdb)){?>
                    <?php if(is_array($goodsdb)):?><?php $index=0; ?><?php  foreach($goodsdb as $val){ ?>
                    <tr>
                        <td><input name="checkboxes[]" type="checkbox" value="<?php echo $val['goods_id'];?>" /><?php echo $val['goods_id'];?></td>
                        <td><?php echo $val['goods_name'];?></td>
                        <td align="center">
                        <span onclick="listTable.edit(this, 'edit_starttime', '<?php echo $val['goods_id'];?>');showCalendar(this.firstChild, '%Y-%m-%d', false, false, this.firstChild)"><?php if($val['starttime']){?><?php echo $val['starttime'];?><?php  }else{ ?>0000-00-00<?php }?></span>
                        </td>
                        <td align="center">
                        <span onclick="listTable.edit(this, 'edit_endtime', '<?php echo $val['goods_id'];?>');showCalendar(this.firstChild, '%Y-%m-%d', false, false, this.firstChild)"><?php if($val['endtime']){?><?php echo $val['endtime'];?><?php  }else{ ?>0000-00-00<?php }?></span>
                        </td>
                        <td align="center">
                            <span id="del<?php echo $val['goods_id'];?>">
                                <?php if($val['endtime'] or $val['starttime']){?>
                                <a href="<?php echo $thisfile;?>&goods_id=<?php echo $val['goods_id'];?>&act=del" onclick="return confirm('<?php echo L("admin_ecarticleauto_info_page_good_auto8");?>');"><?php echo L("admin_ecarticleauto_info_page_good_auto9");?></a>
                                <?php  }else{ ?>
                                -
                                <?php }?>
                            </span>
                        </td>
                    </tr>
                    <?php $index++; ?><?php }?><?php endif;?>
                <?php  }else{ ?>
                    <tr><td class="no-records" colspan="10"><?php echo L("admin_ecarticleauto_info_page_good_auto10");?></td></tr>
                <?php }?>
            </table>
            <table id="page-table" cellspacing="0">
                <tr>
                    <td>
                        <input type="hidden" name="act" value="" />
                        <input name="date" type="text" id="date" size="10" value='0000-00-00' readonly="readonly" />
                        <input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('date', '%Y-%m-%d', false, false, 'selbtn1');" value="选择" class="button"/>
                        <input type="button" id="btnSubmit1" value="<?php echo L("admin_ecarticleauto_info_page_good_auto11");?>" disabled="true" class="button" onClick="return validate('batch_start')" />
                        <input type="button" id="btnSubmit2" value="<?php echo L("admin_ecarticleauto_info_page_good_auto12");?>" disabled="true" class="button" onClick="return validate('batch_end')" />
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
    <script type="Text/Javascript" language="JavaScript">
        listTable.recordCount = <?php echo $record_count;?>;
        listTable.pageCount = <?php echo $page_count;?>;
        
          
        <?php if(is_array($filter)):?><?php $index=0; ?><?php  foreach($filter as $key=>$item){ ?>
        listTable.filter.<?php echo $key;?> = '<?php echo $item;?>';
        <?php $index++; ?><?php }?><?php endif;?>
        
        function validate(name)
        {
            if(document.listForm.elements["date"].value == "0000-00-00")
            {
                alert('<?php echo L("admin_ecarticleauto_js_validate");?>');
                return;	
            }
            else
            {
                document.listForm.act.value=name;
                document.listForm.submit();
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