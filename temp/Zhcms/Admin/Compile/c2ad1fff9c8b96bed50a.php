<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    var process_request = "処理中....";
    var todolist_caption = "ノート";
    var todolist_autosave = "自動保存";
    var todolist_save = "保存";
    var todolist_clear = "クリア";
    var todolist_confirm_save = "この更新をノートに保存するか？";
    var todolist_confirm_clear = "内容を削除しますか？";
    var lang_enabled = "開く";
    var lang_remove = "削除";
    var attribute = "属性";
    var remove_confirm = "商品タイプを削除する時自動的に下の属性を削除する。\n削除しますか？";
    var type_name_empty = "商品タイプ名を入力してください！";
//-->
</script>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<div class="main-div">
    <form action="<?php echo U('index');?>" method="post" name="theForm" onsubmit="return validate();">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">商品タイプ名称:</td>
                <td>
                    <input type="text" name="cat_name" value="<?php echo htmlspecialchars($goods_type['cat_name']);?>" size="40" />
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr style="display:none">
                <td class="label">状態:</td>
                <td>
                    <?php if(isset($lang['arr_goods_status']) && !empty($lang['arr_goods_status'])):$arr["options"]=$lang['arr_goods_status'];$arr["checked"]=$goods_type['enabled'];$arr["name"]=enabled;echo html_radios($arr);endif;
?>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticeAttrGroups');" title="クリックしてヒントを見る">
                        <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="クリックしてヒントを見る"/>
                    </a> 属性グループ:
                </td>
                <td>
                    <textarea name="attr_group" rows="5" cols="40"><?php echo htmlspecialchars($goods_type['attr_group']);?></textarea><br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeAttrGroups">
                        行ずつ商品属性グループ。ソートも自然ソートします。 
                    </span>
                </td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input type="hidden" name="cat_id" value="<?php echo $goods_type['cat_id'];?>" />
                    <input type="submit" value="確定" class="button" />
                    <input type="reset" value="リセット" class="button" />
                    <input type="hidden" name="act" value="<?php echo $form_act;?>" />
                </td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript">
function validate()
{
  var validator = new Validator('theForm');
  validator.required('cat_name', type_name_empty);

  return validator.passed();
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