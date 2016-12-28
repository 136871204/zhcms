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
    var process_request = "アクセス処理中...";
    var todolist_caption = "ノート";
    var todolist_autosave = "自動保存";
    var todolist_save = "保存";
    var todolist_clear = "クリア";
    var todolist_confirm_save = "変更内容をノートに保存？";
    var todolist_confirm_clear = "内容をクリアする？";
    var no_username = "ユーザ名を入力してください。";
    var invalid_email = "メール入力してない或いはメールが正しくない。";
    var no_password = "パスワードを入力してください。";
    var less_password = "パスワード6文字以上してください。";
    var passwd_balnk = "パスワードにはスペースが入力できません";
    var no_confirm_password = "確認パスワードを入力してください。";
    var password_not_same = "二回入力したパスワード不一致です。";
    var invalid_pay_points = "ポイントが数値ではない。";
    var invalid_rank_points = "ランクポイントが数値ではない。";
    var password_len_err = "新パスと確認パス6文字以上してください";
//-->
</script>
<div class="main-div">
    <form method="post" action="<?php echo U('index');?>" name="theForm" onsubmit="return validate()">
        <table width="100%" >
            <tr>
                <td class="label">会員名称:</td>
                <td>
                    <?php if($form_action == 'update'){?>
                        <?php echo $user['user_name'];?><input type="hidden" name="username" value="<?php echo $user['user_name'];?>" />
                    <?php  }else{ ?>
                        <input type="text" name="username" maxlength="60" value="<?php echo $user['user_name'];?>" />
                        <span class="require-field">*</span>
                    <?php }?>
                </td>
            </tr>
            <?php if($form_action == 'update'){?>
                <tr>
                    <td class="label">使える資金:</td>
                    <td><?php echo $user['formated_user_money'];?> <a href="account_log.php?act=list&user_id=<?php echo $user['user_id'];?>&account_type=user_money">[ 明細を見る ]</a> </td>
                </tr>
                <tr>
                    <td class="label">凍結資金:</td>
                    <td><?php echo $user['formated_frozen_money'];?> <a href="account_log.php?act=list&user_id=<?php echo $user['user_id'];?>&account_type=frozen_money">[ 明細を見る ]</a> </td>
                </tr>
                <tr>
                    <td class="label">
                        <a href="javascript:showNotice('noticeRankPoints');" title="クリックして、ヒントを見る">
                            <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="クリックして、ヒントを見る"/>
                        </a> ランクポイント:
                    </td>
                    <td>
                        <?php echo $user['rank_points'];?> 
                        <a href="account_log.php?act=list&user_id=<?php echo $user['user_id'];?>&account_type=rank_points">[ 明細を見る ]</a> 
                        <br />
                        <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeRankPoints">
                            ランクポイントは累計するから、システムがこのポイントによって、会員ランクを判定する。
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="label">
                        <a href="javascript:showNotice('noticePayPoints');" title="クリックして、ヒントを見る">
                            <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="クリックして、ヒントを見る" />
                        </a> 消費ポイント:
                    </td>
                    <td>
                        <?php echo $user['pay_points'];?> 
                        <a href="account_log.php?act=list&user_id=<?php echo $user['user_id'];?>&account_type=pay_points">[ 明細を見る ]</a> <br />
                        <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticePayPoints">
                            消費ポイントはサイト内の金額、会員が買い物する時、一定の比率のポイントを金額として使える。
                        </span>
                    </td>
                </tr>
            <?php }?>
            <tr>
                <td class="label">メールアドレス:</td>
                <td><input type="text" name="email" maxlength="60" size="40" value="<?php echo $user['email'];?>" /><span class="require-field">*</span></td>
            </tr>
            <?php if($form_action == 'insert'){?>
                <tr>
                    <td class="label">ログインパスワード:</td>
                    <td><input type="password" name="password" maxlength="20" size="20" /><span class="require-field">*</span></td>
                </tr>
                <tr>
                    <td class="label">確認パスワード:</td>
                    <td><input type="password" name="confirm_password" maxlength="20" size="20" /><span class="require-field">*</span></td>
                </tr>
            <?php  }elseif($form_action == 'update'){ ?>
                <tr>
                    <td class="label">新パスワード:</td>
                    <td><input type="password" name="password" maxlength="20" size="20" /></td>
                </tr>
                <tr>
                    <td class="label">確認パスワード:</td>
                    <td><input type="password" name="confirm_password" maxlength="20" size="20" /></td>
                </tr>
            <?php }?>
            <tr>
                <td class="label">会員ランク:</td>
                <td>
                    <select name="user_rank">
                        <option value="0">特殊ランクではない</option>
                        <?php if(isset($special_ranks) && !empty($special_ranks)):$arr["options"]=$special_ranks;$arr["selected"]=$user['user_rank'];echo html_options($arr);endif;
?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label">性別:</td>
                <td>
                    <?php if(isset($lang['sex']) && !empty($lang['sex'])):$arr["options"]=$lang['sex'];$arr["checked"]=$user['sex'];$arr["name"]=sex;echo html_radios($arr);endif;
?>
                </td>
            </tr>
            <tr>
                <td class="label">誕生日:</td>
                <td>
                    <?php $arr["prefix"]="birthday";$arr["field_order"]="YMD";$arr["month_format"]="%m";$arr["day_value_format"]="";$arr["start_year"]="-60";$arr["end_year"]="+1";$arr["display_days"]="true";$arr["time"]=$user['birthday'];echo html_select_date($arr);?>
                </td>
            </tr>
            <tr>
                <td class="label">新規額:</td>
                <td><input name="credit_line" type="text" id="credit_line" value="<?php echo $user['credit_line'];?>" size="10" /></td>
            </tr>
            <?php if(is_array($extend_info_list)):?><?php $index=0; ?><?php  foreach($extend_info_list as $field){ ?>
                <tr>
                    <td class="label"><?php echo $field['reg_field_name'];?>:</td>
                    <td>
                        <input name="extend_field<?php echo $field['id'];?>" type="text" size="40" class="inputBg" value="<?php echo $field['content'];?>"/>
                    </td>
                </tr>
            <?php $index++; ?><?php }?><?php endif;?>
            <?php if($user['parent_id']){?>
                TODO:user_info--3;
            <?php }?>
            <?php if($affiliate['on'] == 1 and $affdb){?>
                TODO:user_info--4;
            <?php }?>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value=" 確定 " class="button" />
                    <input type="reset" value=" リセット " class="button" />
                    <input type="hidden" name="act" value="<?php echo $form_action;?>" />
                    <input type="hidden" name="id" value="<?php echo $user['user_id'];?>" />    
                </td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script>
    if (document.forms['theForm'].elements['act'].value == "insert")
    {
        document.forms['theForm'].elements['username'].focus();
    }
    else
    {
        document.forms['theForm'].elements['email'].focus();
    }
    
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
        validator = new Validator("theForm");
        validator.isEmail("email", invalid_email, true);
    
        if (document.forms['theForm'].elements['act'].value == "insert")
        {
            validator.required("username",  no_username);
            validator.required("password", no_password);
            validator.required("confirm_password", no_confirm_password);
            validator.eqaul("password", "confirm_password", password_not_same);
    
            var password_value = document.forms['theForm'].elements['password'].value;
            if (password_value.length < 6)
            {
              validator.addErrorMsg(less_password);
            }
            if (/ /.test(password_value) == true)
            {
              validator.addErrorMsg(passwd_balnk);
            }
        }
        else if (document.forms['theForm'].elements['act'].value == "update")
        {
            var newpass = document.forms['theForm'].elements['password'];
            var confirm_password = document.forms['theForm'].elements['confirm_password'];
            if(newpass.value.length > 0 || confirm_password.value.length)
            {
              if(newpass.value.length >= 6 || confirm_password.value.length >= 6)
              {
                validator.eqaul("password", "confirm_password", password_not_same);
              }
              else
              {
                validator.addErrorMsg(password_len_err);
              }
            }
        }
    
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

