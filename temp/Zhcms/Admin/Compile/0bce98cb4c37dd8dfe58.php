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
    var no_catname = "<?php echo L("admin_ecarticlecat_js_no_catname");?>";
    var sys_hold = "<?php echo L("admin_ecarticlecat_js_sys_hold");?>";
    var remove_confirm = "<?php echo L("admin_ecarticlecat_js_remove_confirm");?>";
    //-->
    </script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
    
    <form method="post" action="" name="listForm">
        <!-- start list -->
        <div class="list-div" id="listDiv">
<?php }?>
            <table width="100%" cellspacing="1" cellpadding="2" id="list-table">
                <tr>
                    <th><?php echo L("admin_ecarticlecat_articlecat_list_page_table_th1");?></th>
                    <th><?php echo L("admin_ecarticlecat_articlecat_list_page_table_th2");?></th>
                    <th><?php echo L("admin_ecarticlecat_articlecat_list_page_table_th3");?></th>
                    <th><?php echo L("admin_ecarticlecat_articlecat_list_page_table_th4");?></th>
                    <th><?php echo L("admin_ecarticlecat_articlecat_list_page_table_th5");?></th>
                    <th><?php echo L("admin_ecarticlecat_articlecat_list_page_table_th6");?></th>
                </tr>
                <?php if(!empty($articlecat)){?>
                    <?php if(is_array($articlecat)):?><?php $index=0; ?><?php  foreach($articlecat as $cat){ ?>
                    <tr align="center" class="<?php echo $cat['level'];?>" id="<?php echo $cat['level'];?>_<?php echo $cat['cat_id'];?>">
                        <td align="left" class="first-cell nowrap" valign="top" >
                            <?php if($cat['is_leaf'] <> 1){?>
                                <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/menu_minus.gif" id="icon_<?php echo $cat['level'];?>_<?php echo $cat['cat_id'];?>" width="9" height="9" border="0" style="margin-left:<?php echo $cat['level'];?>em" onclick="rowClicked(this)" />
                            <?php  }else{ ?>
                                <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/menu_arrow.gif" width="9" height="9" border="0" style="margin-left:<?php echo $cat['level'];?>em" />
                            <?php }?>
                            <span><a href="article.php?act=list&amp;cat_id=<?php echo $cat['cat_id'];?>"><?php echo $cat['cat_name'];?></a></span>
                        </td>
                        <td class="nowrap" valign="top">
                            <?php echo $cat['type_name'];?>
                        </td>
                        <td align="left" valign="top">
                            <?php echo $cat['cat_desc'];?>
                        </td>
                        <td width="10%" align="right" class="nowrap" valign="top"><span onclick="listTable.edit(this, 'edit_sort_order', <?php echo $cat['cat_id'];?>)"><?php echo $cat['sort_order'];?></span></td>
                        <td width="10%" class="nowrap" valign="top"><img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/<?php if($cat['show_in_nav'] == '1'){?>yes<?php  }else{ ?>no<?php }?>.gif" onclick="listTable.toggle(this, 'toggle_show_in_nav', <?php echo $cat['cat_id'];?>)" /></td>
                        <td width="24%" align="right" class="nowrap" valign="top">
                            <a href="<?php echo U('index');?>&act=edit&amp;id=<?php echo $cat['cat_id'];?>"><?php echo L("admin_ecarticlecat_articlecat_list_page_table_con1");?></a>
                            <?php if($cat['cat_type'] <> 2 and $cat['cat_type'] <> 3 and $cat['cat_type'] <> 4){?>
                            |<a href="javascript:;" onclick="listTable.remove(<?php echo $cat['cat_id'];?>, '<?php echo L("admin_ecarticlecat_articlecat_list_page_table_con2");?>')" title="<?php echo L("admin_ecarticlecat_articlecat_list_page_table_con3");?>"><?php echo L("admin_ecarticlecat_articlecat_list_page_table_con3");?></a>
                            <?php }?>
                        </td>
                    </tr>
                    <?php $index++; ?><?php }?><?php endif;?>
                <?php  }else{ ?>
                    <tr><td class="no-records" colspan="10"><?php echo L("admin_ecarticlecat_articlecat_list_page_table_con4");?></td></tr>
                <?php }?>
            </table>
            
            
            
<?php if($full_page){?>
        </div>
    </form>
<!-- end 添加货品 -->

<script type="text/javascript">
onload = function()
{
    // 开始检查订单
    startCheckOrder();
}


var imgPlus = new Image();
imgPlus.src = "http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/menu_plus.gif";

/**
 * 折叠分类列表
 */
function rowClicked(obj)
{
    // 当前图像
    img = obj;
    // 取得上二级tr>td>img对象
    obj = obj.parentNode.parentNode;
    // 整个分类列表表格
    var tbl = document.getElementById("list-table");
    // 当前分类级别
    var lvl = parseInt(obj.className);
    // 是否找到元素
    var fnd = false;
    var sub_display = img.src.indexOf('menu_minus.gif') > 0 ? 'none' : (Browser.isIE) ? 'block' : 'table-row' ;
    // 遍历所有的分类
    for (i = 0; i < tbl.rows.length; i++){
        var row = tbl.rows[i];
        if (row == obj)
        {
            // 找到当前行
            fnd = true;
            //document.getElementById('result').innerHTML += 'Find row at ' + i +"<br/>";
        }
        else
        {
            if (fnd == true)
            {
                var cur = parseInt(row.className);
                var icon = 'icon_' + row.id;
                if (cur > lvl)
                {
                    row.style.display = sub_display;
                    if (sub_display != 'none')
                    {
                        var iconimg = document.getElementById(icon);
                        iconimg.src = iconimg.src.replace('plus.gif', 'minus.gif');
                    } 
                }
                else
                {
                    fnd = false;
                    break;
                }
            }
        }
    }
    for (i = 0; i < obj.cells[0].childNodes.length; i++)
    {
        var imgObj = obj.cells[0].childNodes[i];
        if (imgObj.tagName == "IMG" && imgObj.src != 'http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/menu_arrow.gif')
        {
            imgObj.src = (imgObj.src == imgPlus.src) ? 'http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/menu_minus.gif' : imgPlus.src;
        }
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