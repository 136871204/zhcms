<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
TODO:
1.画面没有完成
 -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="<?php echo $keywords;?>" />
    <meta name="Description" content="<?php echo $description;?>" />
    <title><?php echo $page_title;?></title>
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" href="animated_favicon.gif" type="image/gif" />
    <link href="<?php echo $ecs_css_path;?>" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/common.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/user.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/transport.js"></script>
</head>
<body>
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--
TODO:
1.page_hearder.lbi----$searchkeywords;
 -->
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
<script type="text/javascript">
var process_request = "処理中...";
</script>
<div class="block clearfix">
    <div class="f_l">
        <a href="<?php echo U('index/Index/index');?>" name="top">
            トップページ
        </a>&nbsp;|&nbsp;
        <a href="<?php echo U('ec/EcIndex/index');?>" name="top">
            ECデモトップ
        </a>
    </div>
    <div class="f_r log">
        <ul>
            <li class="userInfo">
                <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/transport.js"></script>
                <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/utils.js"></script>
                <font id="ECS_MEMBERZONE">
                    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--
TODO:
1.$captcha参数需要管理画面取得
 -->
<?php 
    if ($_SESSION['ec_user_id'] > 0)
    {
        $user_info=get_user_info();
    }
    else
    {
        if (!empty($_COOKIE['ECS']['ec_username']))
        {
            $ecs_username=stripslashes($_COOKIE['ECS']['ec_username']);
        }
        //$captcha = intval($GLOBALS['_CFG']['captcha']);
        $captcha = true;
        if (
                ($captcha & CAPTCHA_LOGIN) && 
                (
                    !($captcha & CAPTCHA_LOGIN_FAIL) || 
                    (
                        (
                            $captcha & CAPTCHA_LOGIN_FAIL) && 
                            $_SESSION['ec_login_fail'] > 2
                    )
                ) && 
                gd_version() > 0
            )
        {
            $enabled_captcha=1;
            $rand=mt_rand();
        }
    }
?>
<div id="append_parent"></div>
<?php if($user_info){?>
    <font style="position:relative; top:10px;">
        <font class="f4_b"><?php echo $user_info['username'];?></font>
        <a href="<?php echo U('ec/EcUser/index');?>">ユーザセンタ</a>|
        <a href="<?php echo U('ec/EcUser/index');?>&act=logout">ログアウト</a>
    </font>
<?php  }else{ ?>
    いらっしゃいませ&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo U('ec/EcUser/index');?>">ログイン</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=register">登録</a>
<?php }?>
                </font>
            </li>
            <?php if($navigator_list['top']){?>
                <li id="topNav" class="clearfix">
                    <?php if(is_array($navigator_list['top'])):?><?php $nav_top_list=0; ?><?php  foreach($navigator_list['top'] as $nav){ ?>
                        <a href="<?php echo $nav['url'];?>" <?php if($nav['opennew'] == 1){?> target="_blank" <?php }?>><?php echo $nav['name'];?></a>
                        <?php if($nav_top_list <> count($navigator_list['top'])-1){?>
                        |
                        <?php }?>
                    <?php $nav_top_list++; ?><?php }?><?php endif;?>
                    <div class="topNavR"></div>
                </li>
            <?php }?>
        </ul>
    </div>
</div>
<div  class="blank"></div>
<div id="mainNav" class="clearfix">
    <a href="<?php echo U('ec/EcIndex/index');?>"<?php if($navigator_list['config']['index'] == 1){?> class="cur"<?php }?> >トップ<span></span></a>
    <?php if(is_array($navigator_list['middle'])):?><?php $index=0; ?><?php  foreach($navigator_list['middle'] as $nav){ ?>
        <a href="<?php echo $nav['url'];?>" <?php if($nav['opennew'] == 1){?> target="_blank" <?php }?> <?php if($nav['active'] == 1){?> class="cur"<?php }?>>
            <?php echo $nav['name'];?><span></span>
        </a>
    <?php $index++; ?><?php }?><?php endif;?>
</div>
<!--search start-->
<div id="search"  class="clearfix">
    <div class="keys f_l">
        <script type="text/javascript">
             function checkSearchForm()
             {
                if(document.getElementById('keyword').value)
                {
                    return true;
                }
                else
                {
                    alert("検索キーワードを入力してください！");
                    return false;
                }
             }
        </script>
        <?php if($searchkeywords){?>
            TODO:page_hearder.lbi----$searchkeywords;
        <?php }?>
    </div>
    <form id="searchForm" name="searchForm" method="get" action="" onSubmit="return checkSearchForm()" class="f_r"  style="_position:relative; top:5px;">
        <input type="hidden" name="a" value="ec" />
        <input type="hidden" name="c" value="EcSearch" />
        <input type="hidden" name="m" value="index" />
        <select name="category" id="category" class="B_input">
            <option value="0">全てカテゴリから</option>
            <?php echo $category_list;?>
        </select>
        <input name="keywords" type="text" id="keyword" value="<?php echo $search_keywords;?>" class="B_input"  style="width:110px;"/>
        <input name="imageField" type="submit" value="検索"  style="cursor:pointer;" />
        <a href="<?php echo U('ec/EcSearch/index');?>&act=advanced_search">高級検索</a>
    </form> 
</div>

<!--search end-->


    <!--当前位置 start-->
    <div class="block box">
        <div id="ur_here">
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>当前位置: <?php echo $ur_here;?>
        </div>
    </div>
    <!--当前位置 end-->
    <div class="blank"></div>
    <!--#登录界面 start-->
    <?php if($action == 'login'){?>
    <div class="usBox clearfix">
        <div class="usBox_1 f_l">
            <div class="logtitle1">会員ログイン</div>
            <form name="formLogin" action="<?php echo U('ec/EcUser/index');?>" method="post" onSubmit="return userLogin()">
                <table width="100%" border="0" align="left" cellpadding="3" cellspacing="5">
                    <tr>
                        <td width="15%" align="right">会員名</td>
                        <td width="85%"><input name="username" type="text" size="25" class="inputBg" /></td>
                    </tr>
                    <tr>
                        <td align="right">パスワード</td>
                        <td>
                            <input name="password" type="password" size="15"  class="inputBg"/>
                        </td>
                    </tr>
                    <!-- 判断是否启用验证 -->
                    <?php if($enabled_captcha){?>
                    <tr>
                        <td align="right">検証番号</td>
                        <td>
                            <input type="text" size="8" name="captcha" class="inputBg" />
                            <img src="<?php echo U('ec/EcCaptcha/index');?>&is_login=1&<?php echo $rand;?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='<?php echo U('ec/EcCaptcha/index');?>&is_login=1&'+Math.random()" /> 
                        </td>
                    </tr>
                    <?php }?>
                    <tr>
                        <td colspan="2">
                            <input type="checkbox" value="1" name="remember" id="remember" />
                            <label for="remember">今回のログイン情報を保存する。</label>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td align="left">
                            <input type="hidden" name="act" value="act_login" />
                            <input type="hidden" name="back_act" value="<?php echo $back_act;?>" />
                            <input type="submit" name="submit" value="ログイン" class="us_Submit1" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <a href="<?php echo U('ec/EcUser/index');?>&act=qpassword_name" class="f3">パスワード問題でパスワード探す</a>&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo U('ec/EcUser/index');?>&act=get_password" class="f3">メールアドレスでパスワード探す</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="usTxt">
            <strong>会員ではない場合，登録してください</strong>  <br />
            <strong class="f4">提示：</strong><br />
            <?php if($car_off == 1){?>
                会員しなくても買い物できます<br />
            <?php }?>
            <?php if($car_off == 0){?>
                会員しか買い物できません<br />
            <?php }?>
            登録して後出来る事項：<br />
            1. 個人情報を保存<br />
            2. 気に入った商品収蔵<br />
            3. 会員ポイント制度<br />
            4. サイトの商品情報メールマガ  <br />
            <a href="<?php echo U('ec/EcUser/index');?>&act=register">すぐ登録</a>
        </div>
    </div>
    <?php }?>
    <!--#登录界面 end-->
    
    <!--*会员注册界面 start-->
    <?php if($action == 'register'){?>
        <?php if($shop_reg_closed == 1){?>
        <div class="usBox">
            <div class="usBox_2 clearfix">
                <div class="f1 f5" align="center">今会員登録を停止している</div>
            </div>
        </div>
        <?php  }else{ ?>
        <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/utils.js"></script>
        <div class="usBox">
            <div class="usBox_2 clearfix">
                <div class="regtitle1" >会員登録</div>
                <form action="<?php echo U('ec/EcUser/index');?>" method="post" name="formUser" onsubmit="return register();">
                    <table width="100%"  border="0" align="left" cellpadding="5" cellspacing="3">
                        <tr>
                            <td width="15%" align="right">ユーザ名</td>
                            <td width="85%">
                                <input name="username" type="text" size="25" id="username" onblur="is_registered(this.value);" class="inputBg"/>
                                <span id="username_notice" style="color:#FF0000"> *</span>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">email</td>
                            <td>
                                <input name="email" type="text" size="25" id="email" onblur="checkEmail(this.value);"  class="inputBg"/>
                                <span id="email_notice" style="color:#FF0000"> *</span>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">パスワード</td>
                            <td>
                                <input name="password" type="password" id="password1" onblur="check_password(this.value);" onkeyup="checkIntensity(this.value)" class="inputBg" style="width:179px;" />
                                <span style="color:#FF0000" id="password_notice"> *</span>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">パスワード強度</td>
                            <td>
                                <table width="145" border="0" cellspacing="0" cellpadding="1">
                                    <tr align="center">
                                        <td width="33%" id="pwd_lower">弱</td>
                                        <td width="33%" id="pwd_middle">中</td>
                                        <td width="33%" id="pwd_high">強</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">パスワード確認</td>
                            <td>
                                <input name="confirm_password" type="password" id="conform_password" onblur="check_conform_password(this.value);"  class="inputBg" style="width:179px;"/>
                                <span style="color:#FF0000" id="conform_password_notice"> *</span>
                            </td>
                        </tr>
                        <?php if(is_array($extend_info_list)):?><?php $index=0; ?><?php  foreach($extend_info_list as $field){ ?>
                            <?php if($field['id'] == 6){?>
                                <tr>
                                    <td align="right">パスワードピント問題</td>
                                    <td>
                                        <select name='sel_question'>
                                            <option value='0'>問題を選択してください</option>
                                            <?php if(isset($passwd_questions) && !empty($passwd_questions)):$arr["options"]=$passwd_questions;$arr["selected"]=null;echo html_options($arr);endif;
?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" <?php if($field['is_need']){?> id="passwd_quesetion" <?php }?> >問題の答え </td>
                                    <td>
                                        <input name="passwd_answer" type="text" size="25" class="inputBg" maxlengt='20'/>
                                        <?php if($field['is_need']){?> <span style="color:#FF0000"> *</span> <?php }?> 
                                    </td>
                                </tr>
                            <?php  }else{ ?>
                                <tr>
                                    <td align="right" <?php if($field['is_need']){?> id="extend_field<?php echo $field['id'];?>i"<?php }?> ><?php echo $field['reg_field_name'];?>
                                    <td>
                                        <input name="extend_field<?php echo $field['id'];?>" type="text" size="25" class="inputBg" />
                                        <?php if($field['is_need']){?> <span style="color:#FF0000"> *</span> <?php }?>
                                    </td>
                                </tr>
                            <?php }?>
                        <?php $index++; ?><?php }?><?php endif;?>
                        <!-- 判断是否启用验证码 -->
                        <?php if($enabled_captcha){?>
                        <tr>
                            <td align="right">検証番号</td>
                            <td>
                                <input type="text" size="8" name="captcha" class="inputBg" />
                                <img src="<?php echo U('ec/EcCaptcha/index');?>&<?php echo $rand;?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='<?php echo U('ec/EcCaptcha/index');?>&'+Math.random()" /> 
                            </td>
                        </tr>
                        <?php }?>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <label>
                                <input name="agreement" type="checkbox" value="1" checked="checked" />
                                すでに見て、その上受ける《<a href="<?php echo U('ec/EcArticle/index');?>&cat_id=-1" style="color:blue" target="_blank">ユーザ協議</a>》
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="left">
                                <input name="act" type="hidden" value="act_register" />
                                <input type="hidden" name="back_act" value="<?php echo $back_act;?>" />
                                <input name="Submit" type="submit" value="登録" class="us_Submit_reg1"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td class="actionSub">
                                <a href="<?php echo U('ec/EcUser/index');?>&act=login">アカウントがすでに持っている，ログインする</a><br />
                                <a href="<?php echo U('ec/EcUser/index');?>&act=get_password">パスワードを忘れましたか？</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <?php }?>
    <?php }?>
    <!--#会员注册界面 end-->
    
    <!--*找回密码界面 -->
    <?php if($action == 'get_password'){?>
        <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/utils.js"></script>
        <script type="text/javascript">
            var user_name_empty = "请输入您的用户名！";
            var email_address_empty = "请输入您的电子邮件地址！";
            var email_address_error = "您输入的电子邮件地址格式不正确！";
            var new_password_empty = "请输入您的新密码！";
            var confirm_password_empty = "请输入您的确认密码！";
            var both_password_error = "您两次输入的密码不一致！";
        </script>
        <div class="usBox">
            <div class="usBox_2 clearfix">
                <form action="<?php echo U('index');?>" method="post" name="getPassword" onsubmit="return submitPwdInfo();">
                    <br />
                    <table width="70%" border="0" align="center">
                        <tr>
                            <td colspan="2" align="center"><strong>请输入您注册的用户名和注册时填写的电子邮件地址。</strong></td>
                        </tr>
                        <tr>
                            <td width="29%" align="right">用户名</td>
                            <td width="61%"><input name="user_name" type="text" size="30" class="inputBg" /></td>
                        </tr>
                        <tr>
                            <td align="right">电子邮件地址</td>
                            <td><input name="email" type="text" size="30" class="inputBg" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="hidden" name="act" value="send_pwd_email" />
                                <input type="submit" name="submit" value="提交" class="bnt_blue" style="border:none;" />
                                <input name="button" type="button" onclick="history.back()" value="返回上一页" style="border:none;" class="bnt_blue_1" />
                            </td>
                        </tr>
                    </table>
                    <br />
                </form>
            </div>
        </div>
    <?php }?>
    
    <!--*通过问题找回密码的确认找回账号界面 -->
    <?php if($action == 'qpassword_name'){?>
        <div class="usBox">
            <div class="usBox_2 clearfix">
                <form action="<?php echo U('index');?>" method="post">
                    <br />
                    <table width="70%" border="0" align="center">
                        <tr>
                            <td colspan="2" align="center"><strong>请输入您注册的用户名以取得您的密码提示问题。</strong></td>
                        </tr>
                        <tr>
                            <td width="29%" align="right">用户名</td>
                            <td width="61%"><input name="user_name" type="text" size="30" class="inputBg" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="hidden" name="act" value="get_passwd_question" />
                                <input type="submit" name="submit" value="提交" class="bnt_blue" style="border:none;" />
                                <input name="button" type="button" onclick="history.back()" value="返回上一页" style="border:none;" class="bnt_blue_1" />
                            </td>
                        </tr>
                    </table>
                    <br />
                </form>
            </div>
        </div>
    <?php }?>
    
    <!--*根据输入账号显示密码问题界面 -->
    <?php if($action == 'get_passwd_question'){?>
        <div class="usBox">
            <div class="usBox_2 clearfix">
                <form action="<?php echo U('index');?>" method="post">
                    <br />
                    <table width="70%" border="0" align="center">
                        <tr>
                            <td colspan="2" align="center"><strong>请根据您注册时设置的密码问题输入设置的答案</strong></td>
                        </tr>
                        <tr>
                            <td width="29%" align="right">密码提示问题：</td>
                            <td width="61%"><?php echo $passwd_question;?></td>
                        </tr>
                        <tr>
                            <td align="right">密码问题答案：</td>
                            <td><input name="passwd_answer" type="text" size="20" class="inputBg" /></td>
                        </tr>
                        <!-- 判断是否启用验证码 -->
                        <?php if($enabled_captcha){?>
                        <tr>
                            <td align="right">验证码</td>
                            <td>
                                <input type="text" size="8" name="captcha" class="inputBg" />
                                <img src="<?php echo U('ec/EcCaptcha/index');?>&is_login=1&<?php echo $rand;?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='<?php echo U('ec/EcCaptcha/index');?>&is_login=1&'+Math.random()" /> 
                            </td>
                        </tr>
                        <?php }?>
                        <tr>
                            <td></td>
                            <td>
                                <input type="hidden" name="act" value="check_answer" />
                                <input type="submit" name="submit" value="提交" class="bnt_blue" style="border:none;" />
                                <input name="button" type="button" onclick="history.back()" value="返回上一页" style="border:none;" class="bnt_blue_1" />
                            </td>
                        </tr>
                    </table>
                    <br />
                </form>
            </div>
        </div>
    <?php }?>
    
    <?php if($action == 'reset_password'){?>
        <script type="text/javascript">
            var user_name_empty = "请输入您的用户名！";
            var email_address_empty = "请输入您的电子邮件地址！";
            var email_address_error = "您输入的电子邮件地址格式不正确！";
            var new_password_empty = "请输入您的新密码！";
            var confirm_password_empty = "请输入您的确认密码！";
            var both_password_error = "您两次输入的密码不一致！";
        </script>
        <div class="usBox">
            <div class="usBox_2 clearfix">
                <form action="<?php echo U('index');?>" method="post" name="getPassword2" onSubmit="return submitPwd()">
                    <br />
                    <table width="80%" border="0" align="center">
                        <tr>
                            <td>新密码:</td>
                            <td><input name="new_password" type="password" size="25" class="inputBg" /></td>
                        </tr>
                        <tr>
                            <td>确认密码:</td>
                            <td><input name="confirm_password" type="password" size="25"  class="inputBg"/></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="hidden" name="act" value="act_edit_password" />
                                <input type="hidden" name="uid" value="<?php echo $uid;?>" />
                                <input type="hidden" name="code" value="<?php echo $code;?>" />
                                <input type="submit" name="submit" value="确定" />
                            </td>
                        </tr>
                    </table>
                    <br />
                </form>
            </div>
        </div>
    <?php }?>
    <div class="blank"></div>
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--底部导航 start-->
<div id="bottomNav" class="box">
    <div class="box_1">
        <div class="bNavList clearfix">
            <div class="f_l">
                <?php if($navigator_list['bottom']){?>
                    <?php if(is_array($navigator_list['bottom'])):?><?php $index=0; ?><?php  foreach($navigator_list['bottom'] as $nav_bottom_list_key=>$nav){ ?>
                        <a href="<?php echo $nav['url'];?>" <?php if($nav['opennew'] == 1){?> target="_blank" <?php }?>><?php echo $nav['name'];?></a>
                        <?php if($nav_bottom_list_key+1 <> count($navigator_list['bottom'])){?>
                        -
                        <?php }?>
                    <?php $index++; ?><?php }?><?php endif;?>
                <?php }?>
            </div>
            <div class="f_r">
                <a href="#top">
                    <img src="http://www.metacms.com/template/v5/ec/common/style/images/bnt_top.gif" />
                </a> 
                <a href="<?php echo U('ec/EcIndex/index');?>"><img src="http://www.metacms.com/template/v5/ec/common/style/images/bnt_home.gif" /></a>
            </div>
        </div>
    </div>
</div>
<!--底部导航 end-->
<div class="blank"></div>
<!--版权 start-->
<div id="footer">
    <div class="text">
        <?php echo $copyright;?><br />
        <?php echo $shop_address;?> <?php echo $shop_postcode;?>
        <!-- 客服电话 -->
        <?php if($service_phone){?>
            Tel: <?php echo $service_phone;?>
        <?php }?>
        <!-- 邮件 -->
        <?php if($service_email){?>
            E-mail: <?php echo $service_email;?><br />
        <?php }?>
        <!-- QQ 号码 -->
        <?php if(is_array($qq)):?><?php $index=0; ?><?php  foreach($qq as $im){ ?>
            <?php if($im){?>
                <a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?php echo $im;?>&amp;Site=<?php echo $shop_name;?>&amp;Menu=yes" target="_blank">
                    <img src="http://wpa.qq.com/pa?p=1:<?php echo $im;?>:4" height="16" border="0" alt="QQ" /> <?php echo $im;?>
                </a>
            <?php }?>
        <?php $index++; ?><?php }?><?php endif;?>
        <!-- 淘宝旺旺 -->
        <?php if(is_array($ww)):?><?php $index=0; ?><?php  foreach($ww as $im){ ?>
            <?php if($im){?>
                <a href="http://amos1.taobao.com/msg.ww?v=2&uid=<?php echo $im;?>&s=2" target="_blank">
                    <img src="http://amos1.taobao.com/online.ww?v=2&uid=<?php echo $im;?>&s=2" width="16" height="16" border="0" alt="淘宝旺旺" />
                    <?php echo $im;?>
                </a>
            <?php }?>
        <?php $index++; ?><?php }?><?php endif;?>
        <!-- Yahoo Messenger -->
        <?php if(is_array($ym)):?><?php $index=0; ?><?php  foreach($ym as $im){ ?>
            <?php if($im){?>
                <a href="http://edit.yahoo.com/config/send_webmesg?.target=<?php echo $im;?>n&.src=pg" target="_blank">
                    <img src="http://www.metacms.com/template/v5/ec/common/style/images/yahoo.gif" width="18" height="17" border="0" alt="Yahoo Messenger" /> <?php echo $im;?>
                </a>
            <?php }?>
        <?php $index++; ?><?php }?><?php endif;?>
        <!-- MSN Messenger -->
        <?php if(is_array($msn)):?><?php $index=0; ?><?php  foreach($msn as $im){ ?>
            <?php if($im){?>
                <img src="http://www.metacms.com/template/v5/ec/common/style/images/msn.gif" width="18" height="17" border="0" alt="MSN" /> 
                <a href="msnim:chat?contact=<?php echo $im;?>"><?php echo $im;?></a>
            <?php }?>
        <?php $index++; ?><?php }?><?php endif;?>
        <!-- Skype -->
        <?php if(is_array($skype)):?><?php $index=0; ?><?php  foreach($skype as $im){ ?>
            <?php if($im){?>
                <img src="http://mystatus.skype.com/smallclassic/<?php echo $im;?>" alt="Skype" />
                <a href="skype:<?php echo $im;?>?call"><?php echo $im;?></a>
            <?php }?>
        <?php $index++; ?><?php }?><?php endif;?><br />
        <!-- ICP 证书 -->
        <?php if($icp_number){?>
        ICP证书或ICP备案证书号:<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo $icp_number;?></a><br />
        <?php }?>
    </div>
</div>
    
    
    
</body>
<script type="text/javascript">
var process_request = "正在处理您的请求...";
var username_empty = "- ユーザ名を入力してください。";
var username_shorter = "- 用户名长度不能少于 3 个字符。";
var username_invalid = "- 用户名只能是由字母数字以及下划线组成。";
var password_empty = "- ログインパスワードを入力してください。";
var password_shorter = "- 登录密码不能少于 6 个字符。";
var confirm_password_invalid = "- 两次输入密码不一致";
var email_empty = "- Email を入力してください。";
var email_invalid = "- Email 不是合法的地址";
var agreement = "- 您没有接受协议";
var msn_invalid = "- msn地址不是一个有效的邮件地址";
var qq_invalid = "- QQ号码不是一个有效的号码";
var home_phone_invalid = "- 家庭电话不是一个有效号码";
var office_phone_invalid = "- 办公电话不是一个有效号码";
var mobile_phone_invalid = "- 手机号码不是一个有效号码";
var msg_un_blank = "* 用户名不能为空";
var msg_un_length = "* 用户名最长不得超过7个汉字";
var msg_un_format = "* 用户名含有非法字符";
var msg_un_registered = "* 用户名已经存在,请重新输入";
var msg_can_rg = "* 可以注册";
var msg_email_blank = "* 邮件地址不能为空";
var msg_email_registered = "* 邮箱已存在,请重新输入";
var msg_email_format = "* 邮件地址不合法";
var msg_blank = "を入力してください。";
var no_select_question = "- パスワードヒント問題操作完成してません";
var passwd_balnk = "- 密码中不能包含空格";
var username_exist = "用户名 %s 已经存在";
</script>
</html>