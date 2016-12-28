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
<div class="main-div">
    <form action="<?php echo U('index');?>" method="post" name="theForm" onsubmit="return validate()">
        <table width="100%">
            <tr>
                <td class="label">会員ランク名称: </td>
                <td><input type="text" name="rank_name" value="<?php echo $rank['rank_name'];?>" maxlength="20" /><span class="require-field">*</span></td>
            </tr>
            <tr>
                <td class="label">ポイント下限: </td>
                <td><input type="text" name="min_points" value="<?php echo $rank['min_points'];?>" size="10" maxlength="20" /></td>
            </tr>
            <tr>
                <td class="label">ポイント上限: </td>
                <td><input type="text" name="max_points" value="<?php echo $rank['max_points'];?>" size="10" maxlength="20" /></td>
            </tr>
            <tr>
                <td class="label">
                </td>
                <td>
                    <input type="checkbox" name="show_price" value="1" <?php if($rank['show_price'] == 1){?> checked="true"<?php }?> /> 表品詳細ページで該当会員ランクの値段を表示する
                </td>
            </tr>
            <tr>
                <td class="label"></td>
                <td>
                    <input type="checkbox" name="special_rank" value="1" <?php if($rank['special_rank'] == 1){?> checked="true"<?php }?> onClick="javascript:doSpecial()" /> 特殊会員グルプ 
                    <a href="javascript:showNotice('notice_special');" title="クリックしてヒントを見る">
                        <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="クリックしてヒントを見る"/>
                    </a>
                    <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="notice_special">
                        特殊会員グルプの会員はポイントの影響がなし。
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('notice_discount');" title="クリックしてヒントを見る">
                        <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="クリックしてヒントを見る"/>
                    </a>初期割引率: 
                </td>
                <td>
                    <input type="text" name="discount" value="<?php echo $rank['discount'];?>" size="10" maxlength="20" /><span class="require-field">*</span>
                    <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="notice_discount">
                        0-100の数値を入力してください,例：80を入力すると，初期割引率は8割りとする
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="hidden" name="act" value="<?php echo $form_action;?>" />
                    <input type="hidden" name="id" value="<?php echo $rank['rank_id'];?>" />
                    <input type="submit" value=" 確定 " class="button" />
                    <input type="reset" value=" リセット " class="button" />
                </td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script language="JavaScript">
    document.forms['theForm'].elements['rank_name'].focus();

    onload = function()
    {
      // 开始检查订单
      //startCheckOrder();
    }
    

    /**
    * 检查表单输入的数据
    */
    function validate()
    {
        if (!document.forms['theForm'].elements['special_rank'].checked)
        {
            if (Utils.trim(document.forms['theForm'].elements['min_points'].value) == '' ||
                !Utils.isInt(document.forms['theForm'].elements['min_points'].value))
            {
                alert(integral_min_invalid);
                return false;
            }
            
            if (Utils.trim(document.forms['theForm'].elements['max_points'].value) == '' ||
                !Utils.isInt(document.forms['theForm'].elements['max_points'].value))
            {
                alert(integral_max_invalid);
                return false;
            }
            
            if (!document.forms['theForm'].elements['special_rank'].checked &&
                (parseInt(document.forms['theForm'].elements['max_points'].value) <=
                parseInt(document.forms['theForm'].elements['min_points'].value)))
            {
                alert(integral_max_small);
                return false;
            }
            if (parseInt(document.forms['theForm'].elements['discount'].value) < 1 ||
                parseInt(document.forms['theForm'].elements['discount'].value) > 100)
            {
                alert(discount_invalid);
                return false;
            }
        }
        
        validator = new Validator("theForm");
        validator.required('rank_name', rank_name_empty);
        validator.isInt('discount', discount_invalid, true);
        return validator.passed();
    }
    
    function doSpecial()
    {
        if(document.forms['theForm'].elements['special_rank'].checked)
        {
            document.forms['theForm'].elements['max_points'].disabled = "true";
            document.forms['theForm'].elements['min_points'].disabled = "true";
        }
        else
        {
            document.forms['theForm'].elements['max_points'].disabled = "";
            document.forms['theForm'].elements['min_points'].disabled = "";
        }
    }
//-->  
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


