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
    var todolist_confirm_clear = "";
    var remove_confirm = "選らんだ会員ランクを削除するか？";
    var rank_name_empty = "会員ランク名を入力してください。";
    var integral_min_invalid = "ポイント下限を入力してない或いはポイント下限は数値ではない。";
    var integral_max_invalid = "ポイント上限を入力してない或いはポイント上限は数値ではない。";
    var discount_invalid = "割引率を入力してない或いは割引率を無効です。";
    var integral_max_small = "ポイント上限はポイント下限より大きいはず。";
    var lang_remove = "削除";
    //-->
    </script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
    
    <form method="post" action="<?php echo U('index');?>" name="listForm">
        <div class="list-div" id="listDiv">
<?php }?>
            <table cellspacing='1' id="list-table">
                <tr>
                    <th>会員ランク名称</th>
                    <th>ポイント下限</th>
                    <th>ポイント上限</th>
                    <th>初期割引率(%)</th>
                    <th>特殊会員グルプ</th>
                    <th>値段表示</th>
                    <th>操作</th>
                </tr>
                <?php if(is_array($user_ranks)):?><?php $index=0; ?><?php  foreach($user_ranks as $rank){ ?>
                    <tr>
                        <td class="first-cell" ><span onclick="listTable.edit(this,'edit_name', <?php echo $rank['rank_id'];?>)"><?php echo $rank['rank_name'];?></span></td>
                        <td align="right"><span <?php if($rank['special_rank'] <> 1){?> onclick="listTable.edit(this, 'edit_min_points', <?php echo $rank['rank_id'];?>)" <?php }?> ><?php echo $rank['min_points'];?></span></td>
                        <td align="right"><span <?php if($rank['special_rank'] <> 1){?> onclick="listTable.edit(this, 'edit_max_points', <?php echo $rank['rank_id'];?>)" <?php }?> ><?php echo $rank['max_points'];?></span></td>
                        <td align="right"><span onclick="listTable.edit(this, 'edit_discount', <?php echo $rank['rank_id'];?>)"><?php echo $rank['discount'];?></span></td>
                        <td align="center"><img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/<?php if($rank['special_rank']){?>yes<?php  }else{ ?>no<?php }?>.gif" onclick="listTable.toggle(this, 'toggle_special', <?php echo $rank['rank_id'];?>)" /></td>
                        <td align="center"><img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/<?php if($rank['show_price']){?>yes<?php  }else{ ?>no<?php }?>.gif" onclick="listTable.toggle(this, 'toggle_showprice', <?php echo $rank['rank_id'];?>)" /></td>
                        <td align="center">
                            <a href="javascript:;" onclick="listTable.remove(<?php echo $rank['rank_id'];?>, 'このデータを削除するか?')" title="削除">
                                <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_drop.gif" border="0" height="16" width="16"/>
                            </a>
                        </td>
                    </tr>
                <?php $index++; ?><?php }?><?php endif;?>
            </table>
            
<?php if($full_page){?>
        </div>
    </form>


<script type="text/javascript">

    onload = function()
    {
        // 开始检查订单
        //startCheckOrder();
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