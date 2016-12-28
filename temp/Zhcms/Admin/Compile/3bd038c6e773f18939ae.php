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
    var vote_name_empty = "<?php echo L("admin_ecvote_js_vote_name_empty");?>";
    var option_name_empty = "<?php echo L("admin_ecvote_js_option_name_empty");?>";
    var drop_confirm = "<?php echo L("admin_ecvote_js_drop_confirm");?>";
    var drop = "<?php echo L("admin_ecvote_js_drop");?>";
    //-->
    </script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
    
    <div class="form-div">
        <form method="post" action="javascript:newVoteOption()" name="theForm">
            <?php echo L("admin_ecvote_page_table_th14");?>：<input type="text" name="option_name" maxlength="100" size="30" />
            <input type="hidden" name="id" value="<?php echo $id;?>" size="30" />
            <input type="submit" value="<?php echo L("admin_ecvote_page_table_btn1");?>" class="button" />
        </form>
    </div>
    

    
    <!-- start list -->
    <div class="list-div" id="listDiv">
<?php }?>
        <table cellspacing='1' cellpadding='3' id='listTable'>
            <tr>
                <th><?php echo L("admin_ecvote_page_table_th6");?></th>
                <th><?php echo L("admin_ecvote_page_table_th15");?></th>
                <th><?php echo L("admin_ecvote_page_table_th16");?></th>
                <th><?php echo L("admin_ecvote_page_table_th17");?></th>
            </tr>
            <?php if(!empty($option_arr)){?>
                <?php if(is_array($option_arr)):?><?php $index=0; ?><?php  foreach($option_arr as $list){ ?>
                <tr align="center">
                    <td align="left" class="first-cell">
                    <span onclick="javascript:listTable.edit(this, 'edit_option_name', <?php echo $list['option_id'];?>)"><?php echo $list['option_name'];?></span>
                    </td>
                    <td><span onclick="javascript:listTable.edit(this, 'edit_option_order', <?php echo $list['option_id'];?>)"><?php echo $list['option_order'];?></span></td>
                    <td><?php echo $list['option_count'];?></td>
                    <td>
                        <a href="javascript:;" onclick="listTable.remove(<?php echo $list['option_id'];?>, <?php echo L("admin_ecvote_page_table_th8");?>, 'remove_option')" title="<?php echo L("admin_ecvote_page_table_th9");?>">
                            <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_drop.gif" border="0" height="16" width="16"/>
                        </a>
                    </td>
                </tr>
                <?php $index++; ?><?php }?><?php endif;?>
            <?php  }else{ ?>
                <tr><td class="no-records" colspan="10"><?php echo L("admin_ecvote_page_table_th10");?></td></tr>
            <?php }?>
        </table> 
<?php if($full_page){?>
    </div>
<!-- end 添加货品 -->

<script type="text/javascript">
onload = function()
{
    document.forms['theForm'].elements['option_name'].focus();
    
    // 开始检查订单
    //startCheckOrder();
}


function newVoteOption()
{
    var option_name = Utils.trim(document.forms['theForm'].elements['option_name'].value);
    var id          = Utils.trim(document.forms['theForm'].elements['id'].value);
    
    if (Utils.trim(option_name).length > 0)
    {
        var ajaxurl=CONTROL +"&m=index&is_ajax=1&act=new_option";
        Ajax.call(ajaxurl, 'option_name=' + option_name +'&id=' + id, newGoodsTypeResponse, "POST", "JSON");
    }
}

function newGoodsTypeResponse(result)
{
    if (result.error == 0)
    {
        document.getElementById('listDiv').innerHTML = result.content;
        document.forms['theForm'].elements['option_name'].value = '';
        document.forms['theForm'].elements['option_name'].focus();
    }
    
    if (result.message.length > 0)
    {
        alert(result.message);
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