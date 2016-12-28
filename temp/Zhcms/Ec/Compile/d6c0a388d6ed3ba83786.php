<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <div class="block clearfix">
        <!--left start-->
        <div class="AreaL">
            <div class="box">
                <div class="box_1">
                    <div class="userCenterBox">
                        <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="userMenu">
    <a href="<?php echo U('ec/EcUser/index');?>" <?php if($action == 'default'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u1.gif"/> ホーム</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=profile"<?php if($action == 'profile'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u2.gif"/> ユーザ情報</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=order_list"<?php if($action == 'order_list' or $action == 'order_detail'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u3.gif"/> 注文</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=address_list"<?php if($action == 'address_list'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u4.gif"/> 荷受住所</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=collection_list"<?php if($action == 'collection_list'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u5.gif"/> 収蔵</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=message_list"<?php if($action == 'message_list'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u6.gif"/> メッセージ</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=tag_list"<?php if($action == 'tag_list'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u7.gif"/> ラベル</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=booking_list"<?php if($action == 'booking_list'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u8.gif"/> 売り切れ登録</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=bonus"<?php if($action == 'bonus'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u9.gif"/> ボーナス</a>
    <?php if($affiliate['on'] == 1){?>
        <a href="user.php?act=affiliate"<?php if($action == 'affiliate'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u10.gif"/> お勧め</a>
    <?php }?>
    <a href="<?php echo U('ec/EcUser/index');?>&act=comment_list"<?php if($action == 'comment_list'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u11.gif"/> コメント</a>
    <!--<a href="user.php?act=group_buy"><?php echo $lang['label_group_buy'];?></a>-->
    <a href="<?php echo U('ec/EcUser/index');?>&act=track_packages"<?php if($action == 'track_packages'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u12.gif"/> 小包追跡</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=account_log"<?php if($action == 'account_log'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u13.gif"/> 資金管理</a>
    <?php if($show_transform_points){?>
        <a href="user.php?act=transform_points"<?php if($action == 'transform_points'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u14.gif"/> ポイント</a>
    <?php }?>
    <a href="<?php echo U('ec/EcUser/index');?>&act=logout" style="background:none; text-align:right; margin-right:10px;">ログアウト</a>
</div>
                    </div>
                </div>
            </div>
        </div>
        <!--left end-->
        <!--right start-->
        <div class="AreaR">
            <div class="box">
                <div class="box_1">
                    <div class="userCenterBox boxCenterList clearfix" style="_height:1%;">
                        <!-- 用户信息界面 start-->
                        <?php if($action == 'profile'){?>
                            <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/utils.js"></script>
                            <script type="text/javascript">
                                var bonus_sn_empty = "ボーナス番号を入力してください！";
                                var bonus_sn_error = "ボーナス番号は正しくない！";
                                var email_empty = "メールアドレスを入力してください！";
                                var email_error = "メールアドレスが正しくない！";
                                var old_password_empty = "元パスワードを入力してください！";
                                var new_password_empty = "新パスワードを入力してください！";
                                var confirm_password_empty = "確認パスワードを入力してください！";
                                var both_password_error = "二回入力したパスワードを不一致です！";
                                var msg_blank = "空には出来ません";
                                var no_select_question = "- パスワード問題の操作してない";
                            </script>
                            <h5><span>個人資料</span></h5>
                            <div class="blank"></div>
                            <form name="formEdit" action="<?php echo U('index');?>" method="post" onSubmit="return userEdit()">
                                <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                    <tr>
                                        <td width="28%" align="right" bgcolor="#FFFFFF">誕生日： </td>
                                        <td width="72%" align="left" bgcolor="#FFFFFF"> 
                                            <?php $arr["prefix"]="birthday";$arr["field_order"]="YMD";$arr["month_format"]="%m";$arr["day_value_format"]="%02d";$arr["start_year"]="-60";$arr["end_year"]="+1";$arr["display_days"]="true";$arr["time"]=$profile['birthday'];echo html_select_date($arr);?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="28%" align="right" bgcolor="#FFFFFF">性　別： </td>
                                        <td width="72%" align="left" bgcolor="#FFFFFF">
                                            <input type="radio" name="sex" value="0" <?php if($profile['sex'] == 0){?>checked="checked"<?php }?> />
                                            保密&nbsp;&nbsp;
                                            <input type="radio" name="sex" value="1" <?php if($profile['sex'] == 1){?>checked="checked"<?php }?> />
                                            男&nbsp;&nbsp;
                                            <input type="radio" name="sex" value="2" <?php if($profile['sex'] == 2){?>checked="checked"<?php }?> />
                                            女&nbsp;&nbsp; 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="28%" align="right" bgcolor="#FFFFFF">メールアドレス： </td>
                                        <td width="72%" align="left" bgcolor="#FFFFFF">
                                            <input name="email" type="text" value="<?php echo $profile['email'];?>" size="25" class="inputBg" />
                                            <span style="color:#FF0000"> *</span>
                                        </td>
                                    </tr>
                                    <?php if(is_array($extend_info_list)):?><?php $index=0; ?><?php  foreach($extend_info_list as $field){ ?>
                                        <?php if($field['id'] == 6){?>
                                            <tr>
                                                <td width="28%" align="right" bgcolor="#FFFFFF">パスワード提示問題：</td>
                                                <td width="72%" align="left" bgcolor="#FFFFFF">
                                                    <select name='sel_question'>
                                                        <option value='0'>パスワード提示問題を選択</option>
                                                        <?php if(isset($passwd_questions) && !empty($passwd_questions)):$arr["options"]=$passwd_questions;$arr["selected"]=$profile['passwd_question'];echo html_options($arr);endif;
?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="28%" align="right" bgcolor="#FFFFFF" <?php if($field['is_need']){?>id="passwd_quesetion"<?php }?>>パスワード問題の答え：</td>
                                                <td width="72%" align="left" bgcolor="#FFFFFF">
                                                    <input name="passwd_answer" type="text" size="25" class="inputBg" maxlengt='20' value="<?php echo $profile['passwd_answer'];?>"/>
                                                    <?php if($field['is_need']){?><span style="color:#FF0000"> *</span><?php }?>
                                                </td>
                                            </tr>
                                        <?php  }else{ ?>
                                            <tr>
                                                <td width="28%" align="right" bgcolor="#FFFFFF" <?php if($field['is_need']){?>id="extend_field<?php echo $field['id'];?>i"<?php }?>><?php echo $field['reg_field_name'];?>：</td>
                                                <td width="72%" align="left" bgcolor="#FFFFFF">
                                                    <input name="extend_field<?php echo $field['id'];?>" type="text" class="inputBg" value="<?php echo $field['content'];?>"/>
                                                    <?php if($field['is_need']){?><span style="color:#FF0000"> *</span><?php }?>
                                                </td>
                                            </tr>
                                        <?php }?>
                                    <?php $index++; ?><?php }?><?php endif;?>
                                    <tr>
                                        <td colspan="2" align="center" bgcolor="#FFFFFF">
                                            <input name="act" type="hidden" value="act_edit_profile" />
                                            <input name="submit" type="submit" value="変更確定" class="bnt_blue_1" style="border:none;" />
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <form name="formPassword" action="<?php echo U('index');?>" method="post" onSubmit="return editPassword()" >
                                <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                    <tr>
                                        <td width="28%" align="right" bgcolor="#FFFFFF">元パスワード：</td>
                                        <td width="76%" align="left" bgcolor="#FFFFFF"><input name="old_password" type="password" size="25"  class="inputBg" /></td>
                                    </tr>
                                    <tr>
                                        <td width="28%" align="right" bgcolor="#FFFFFF">新パスワード：</td>
                                        <td align="left" bgcolor="#FFFFFF"><input name="new_password" type="password" size="25"  class="inputBg" /></td>
                                    </tr>
                                    <tr>
                                        <td width="28%" align="right" bgcolor="#FFFFFF">確認パスワード：</td>
                                        <td align="left" bgcolor="#FFFFFF"><input name="comfirm_password" type="password" size="25"  class="inputBg" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center" bgcolor="#FFFFFF">
                                            <input name="act" type="hidden" value="act_edit_password" />
                                            <input name="submit" type="submit" class="bnt_blue_1" style="border:none;" value="変更確定" />
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        <?php }?>
                        <!--#用户信息界面 end-->
                        <!--#订单列表界面 start-->
                        <?php if($action == 'order_list'){?>
                            <h5><span>私の注文</span></h5>
                            <div class="blank"></div>
                            <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                <tr align="center">
                                    <td bgcolor="#ffffff">注文番号</td>
                                    <td bgcolor="#ffffff">注文時間</td>
                                    <td bgcolor="#ffffff">注文総金額</td>
                                    <td bgcolor="#ffffff">注文状態</td>
                                    <td bgcolor="#ffffff">操作</td>
                                </tr>
                                <?php if(is_array($orders)):?><?php $index=0; ?><?php  foreach($orders as $item){ ?>
                                    <tr>
                                        <td align="center" bgcolor="#ffffff"><a href="user.php?act=order_detail&order_id=<?php echo $item['order_id'];?>" class="f6"><?php echo $item['order_sn'];?></a></td>
                                        <td align="center" bgcolor="#ffffff"><?php echo $item['order_time'];?></td>
                                        <td align="right" bgcolor="#ffffff"><?php echo $item['total_fee'];?></td>
                                        <td align="center" bgcolor="#ffffff"><?php echo $item['order_status'];?></td>
                                        <td align="center" bgcolor="#ffffff"><font class="f6"><?php echo $item['handler'];?></font></td>
                                    </tr>
                                <?php $index++; ?><?php }?><?php endif;?>
                            </table>
                            <div class="blank5"></div>
                            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--翻页 start-->
<form name="selectPageForm" action="" method="get">
    <input type="hidden" name="m" value="<?php echo $pager['current_meth'];?>"/>
    <input type="hidden" name="c" value="<?php echo $pager['current_control'];?>"/>
    <input type="hidden" name="a" value="<?php echo $pager['current_app'];?>"/>
    <?php if($pager['styleid'] == 0){?>
        <div id="pager">
            総計 <?php echo $pager['record_count'];?> 個の商品，全部 <?php echo $pager['page_count'];?> ページ。
            <span>
                <a href="<?php echo $pager['page_first'];?>">第一ページ </a> 
                <a href="<?php echo $pager['page_prev'];?>">前</a>
                <a href="<?php echo $pager['page_next'];?>">次</a> 
                <a href="<?php echo $pager['page_last'];?>">一番末页</a>
            </span>
            <?php if(is_array($pager['search'])):?><?php $index=0; ?><?php  foreach($pager['search'] as $key=>$item){ ?>
                <?php if($key == 'keywords'){?>
                    <input type="hidden" name="<?php echo $key;?>" value="<?php echo urldecode($item);?>" />
                <?php  }else{ ?>
                    <input type="hidden" name="<?php echo $key;?>" value="<?php echo $item;?>" />
                <?php }?>
            <?php $index++; ?><?php }?><?php endif;?>
            <select name="page" id="page" onchange="selectPage(this)">
                <?php if(isset($pager['array']) && !empty($pager['array'])):$arr["options"]=$pager['array'];$arr["selected"]=$pager['page'];echo html_options($arr);endif;
?>
            </select>
        </div>
    <?php  }else{ ?>
        <!--翻页 start-->
        <div id="pager" class="pagebar">
            <span class="f_l f6" style="margin-right:10px;">総計<b><?php echo $pager['record_count'];?></b> 個の商品</span>
            <?php if($pager['page_first']){?>
                <a href="<?php echo $pager['page_first'];?>">第一ページ ...</a>
            <?php }?>
            <?php if($pager['page_prev']){?>
                <a class="prev" href="<?php echo $pager['page_prev'];?>">前</a>
            <?php }?>
            <?php if($pager['page_count'] <> 1){?>
                <?php if(is_array($pager['page_number'])):?><?php $index=0; ?><?php  foreach($pager['page_number'] as $key=>$item){ ?>
                    <?php if($pager['page'] == $key){?>
                        <span class="page_now"><?php echo $key;?></span>
                    <?php  }else{ ?>
                        <a href="<?php echo $item;?>">[<?php echo $key;?>]</a>
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
            <?php }?>
            <?php if($pager['page_next']){?>
                <a class="next" href="<?php echo $pager['page_next'];?>">次</a>
            <?php }?>
            <?php if($pager['page_last']){?>
                <a class="last" href="<?php echo $pager['page_last'];?>">...一番末页</a>
            <?php }?>
            <?php if($pager['page_kbd']){?>
                <?php if(is_array($pager['search'])):?><?php $index=0; ?><?php  foreach($pager['search'] as $key=>$item){ ?>
                    <?php if($key == 'keywords'){?>
                        <input type="hidden" name="<?php echo $key;?>" value="<?php echo urldecode($item);?>" />
                    <?php  }else{ ?>
                        <input type="hidden" name="<?php echo $key;?>" value="<?php echo $item;?>" />
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
                <kbd style="float:left; margin-left:8px; position:relative; bottom:3px;">
                    <input type="text" name="page" onkeydown="if(event.keyCode==13)selectPage(this)" size="3" class="B_blue" />
                </kbd>
            <?php }?>
        </div>
        <!--翻页 END-->
    <?php }?>
</form>
<script type="Text/Javascript" language="JavaScript">
function selectPage(sel)
{
    sel.form.submit();
}
</script>
                            <div class="blank5"></div>
                            <h5><span>注文合併</span></h5>
                            <div class="blank"></div>
                            <script type="text/javascript">
                                var from_order_empty = "合併したいサブ注文選んでください";
                                var to_order_empty = "合併したいメイン注文選んでください";
                                var order_same = "メイン注文とサブ注文は同じです，選択し直してください";
                                var confirm_merge = "この二つの注文合併するか？";
                            </script>
                            <form action="user.php" method="post" name="formOrder" onsubmit="return mergeOrder()">
                                <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                <tr>
                                    <td width="22%" align="right" bgcolor="#ffffff">メイン注文:</td>
                                    <td width="12%" align="left" bgcolor="#ffffff">
                                        <select name="to_order">
                                            <option value="0">選択して...</option>
                                            <?php if(isset($merge) && !empty($merge)):$arr["options"]=$merge;$arr["selected"]=null;echo html_options($arr);endif;
?>
                                        </select>
                                    </td>
                                    <td width="19%" align="right" bgcolor="#ffffff">サブ注文:</td>
                                    <td width="11%" align="left" bgcolor="#ffffff">
                                        <select name="from_order">
                                            <option value="0">選択して...</option>
                                            <?php if(isset($merge) && !empty($merge)):$arr["options"]=$merge;$arr["selected"]=null;echo html_options($arr);endif;
?>
                                        </select>
                                    </td>
                                    <td width="36%" bgcolor="#ffffff">
                                        &nbsp;<input name="act" value="merge_order" type="hidden" />
                                        <input type="submit" name="Submit"  class="bnt_blue_1" style="border:none;"  value="注文合併" />
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#ffffff">&nbsp;</td>
                                    <td colspan="4" align="left" bgcolor="#ffffff">
                                        注文合併は配達する前同じ状態の注文を新しいの注文に合併すること。<br />
                                        受け取り住所，配達方式はメイン注文にする。
                                    </td>
                                </tr>
                                </table>
                            </form>
                        <?php }?>
                        <!--#订单列表界面 end-->
                        <!--#收货地址页面 start-->
                        <?php if($action == 'address_list'){?>
                            <h5><span>受け取り人情報</span></h5>
                            <div class="blank"></div>
                            <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/utils.js"></script>
                            <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/transport.js"></script>
                            <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/region.js"></script>
                            <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/shopping_flow.js"></script>
                            <script type="text/javascript">
                                region.isAdmin = false;
                                var consignee_not_null = "受け取り人の姓名を入力してください！";
                                var country_not_null = "受け取り人の国を選択してください！";
                                var province_not_null = "受け取り人の省を選択してください！";
                                var city_not_null = "受け取り人の都市を選択してください！";
                                var district_not_null = "受け取り人の区域を選択してください！";
                                var invalid_email = "入力したメールアドレスが正しくない。";
                                var address_not_null = "受け取り人の詳細住所を入力してください！";
                                var tele_not_null = "電話番号を入力してください！";
                                var shipping_not_null = "配送方式を選択してください！";
                                var payment_not_null = "支払い方式を選択してください！";
                                var goodsattr_style = "1";
                                var tele_invaild = "電話番号は有効ではない";
                                var zip_not_num = "郵便番号を数値にしてください";
                                var mobile_invaild = "携帯番号は正しくない";
                                
                                
                                onload = function() {
                                    if (!document.all)
                                    {
                                        document.forms['theForm'].reset();
                                    }
                                }
                            </script>
                            <?php if(is_array($consignee_list)):?><?php $index=0; ?><?php  foreach($consignee_list as $sn=>$consignee){ ?>
                                <form action="<?php echo U('index');?>" method="post" name="theForm" onsubmit="return checkConsignee(this)">
                                    <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                        <tr>
                                            <td align="right" bgcolor="#ffffff">配送エリア：</td>
                                            <td colspan="3" align="left" bgcolor="#ffffff">
                                                <select name="country" id="selCountries_<?php echo $sn;?>" onchange="region.changed(this, 1, 'selProvinces_<?php echo $sn;?>')">
                                                    <option value="0"><?php echo $name_of_region[0];?>を選択してください</option>
                                                    <?php if(is_array($country_list)):?><?php $index=0; ?><?php  foreach($country_list as $country){ ?>
                                                        <option value="<?php echo $country['region_id'];?>" <?php if($consignee['country'] == $country['region_id']){?>selected<?php }?>><?php echo $country['region_name'];?></option>
                                                    <?php $index++; ?><?php }?><?php endif;?>
                                                </select>
                                                <select name="province" id="selProvinces_<?php echo $sn;?>" onchange="region.changed(this, 2, 'selCities_<?php echo $sn;?>')">
                                                    <option value="0"><?php echo $name_of_region[1];?>を選択してください</option>
                                                    <?php if(is_array($province_list[$sn])):?><?php $index=0; ?><?php  foreach($province_list[$sn] as $province){ ?>
                                                        <option value="<?php echo $province['region_id'];?>" <?php if($consignee['province'] == $province['region_id']){?>selected<?php }?>><?php echo $province['region_name'];?></option>
                                                    <?php $index++; ?><?php }?><?php endif;?>
                                                </select>
                                                <select name="city" id="selCities_<?php echo $sn;?>" onchange="region.changed(this, 3, 'selDistricts_<?php echo $sn;?>')">
                                                    <option value="0"><?php echo $name_of_region[2];?>を選択してください</option>
                                                    <?php if(is_array($city_list[$sn])):?><?php $index=0; ?><?php  foreach($city_list[$sn] as $city){ ?>
                                                        <option value="<?php echo $city['region_id'];?>" <?php if($consignee['city'] == $city['region_id']){?>selected<?php }?>><?php echo $city['region_name'];?></option>
                                                    <?php $index++; ?><?php }?><?php endif;?>
                                                </select>
                                                <select name="district" id="selDistricts_<?php echo $sn;?>" <?php if(!$district_list[$sn]){?>style="display:none"<?php }?>>
                                                    <option value="0"><?php echo $name_of_region[3];?>を選択してください</option>
                                                    <?php if(is_array($district_list[$sn])):?><?php $index=0; ?><?php  foreach($district_list[$sn] as $district){ ?>
                                                        <option value="<?php echo $district['region_id'];?>" <?php if($consignee['district'] == $district['region_id']){?>selected<?php }?>><?php echo $district['region_name'];?></option>
                                                    <?php $index++; ?><?php }?><?php endif;?>
                                                </select>
                                                (必須)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" bgcolor="#ffffff">姓名：</td>
                                            <td align="left" bgcolor="#ffffff">
                                                <input name="consignee" type="text" class="inputBg" id="consignee_<?php echo $sn;?>" value="<?php echo $consignee['consignee'];?>" />
                                                (必須)
                                            </td>
                                            <td align="right" bgcolor="#ffffff">メールアドレス：</td>
                                            <td align="left" bgcolor="#ffffff">
                                                <input name="email" type="text" class="inputBg" id="email_<?php echo $sn;?>" value="<?php echo $consignee['email'];?>" />
                                                (必須)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" bgcolor="#ffffff">詳細アドレス：</td>
                                            <td align="left" bgcolor="#ffffff">
                                                <input name="address" type="text" class="inputBg" id="address_<?php echo $sn;?>" value="<?php echo $consignee['address'];?>" />
                                                (必須)
                                            </td>
                                            <td align="right" bgcolor="#ffffff">郵便番号：</td>
                                            <td align="left" bgcolor="#ffffff">
                                                <input name="zipcode" type="text" class="inputBg" id="zipcode_<?php echo $sn;?>" value="<?php echo $consignee['zipcode'];?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" bgcolor="#ffffff">電話：</td>
                                            <td align="left" bgcolor="#ffffff">
                                                <input name="tel" type="text" class="inputBg" id="tel_<?php echo $sn;?>" value="<?php echo $consignee['tel'];?>" />
                                                (必須)
                                            </td>
                                            <td align="right" bgcolor="#ffffff">携帯：</td>
                                            <td align="left" bgcolor="#ffffff">
                                                <input name="mobile" type="text" class="inputBg" id="mobile_<?php echo $sn;?>" value="<?php echo $consignee['mobile'];?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" bgcolor="#ffffff">マーク建築：</td>
                                            <td align="left" bgcolor="#ffffff">
                                                <input name="sign_building" type="text" class="inputBg" id="sign_building_<?php echo $sn;?>" value="<?php echo $consignee['sign_building'];?>" />
                                            </td>
                                            <td align="right" bgcolor="#ffffff">一番好み配達時間：</td>
                                            <td align="left" bgcolor="#ffffff">
                                                <input name="best_time" type="text"  class="inputBg" id="best_time_<?php echo $sn;?>" value="<?php echo $consignee['best_time'];?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" bgcolor="#ffffff">&nbsp;</td>
                                            <td colspan="3" align="center" bgcolor="#ffffff">
                                                <?php if($consignee['consignee'] and  $consignee['email']){?>
                                                    <input type="submit" name="submit" class="bnt_blue_1" value="変更確定" />
                                                    <input name="button" type="button" class="bnt_blue"  onclick="if (confirm('この情報削除するか？'))location.href='<?php echo U('index');?>&act=drop_consignee&id=<?php echo $consignee['address_id'];?>'" value="削除" />
                                                <?php  }else{ ?>
                                                    <input type="submit" name="submit" class="bnt_blue_2"  value="受け取り住所新規"/>
                                                <?php }?>
                                                <input type="hidden" name="act" value="act_edit_address" />
                                                <input name="address_id" type="hidden" value="<?php echo $consignee['address_id'];?>" />
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            <?php $index++; ?><?php }?><?php endif;?>
                        <?php }?>
                        <!--#收货地址添加页面 end-->
                        <!--用户的红包列表 start-->
                        <?php if($action == 'bonus'){?>
                            <script type="text/javascript">
                                var bonus_sn_empty = "请输入您要添加的红包号码！";
                                var bonus_sn_error = "您输入的红包号码格式不正确！";
                                var email_empty = "请输入您的电子邮件地址！";
                                var email_error = "您输入的电子邮件地址格式不正确！";
                                var old_password_empty = "请输入您的原密码！";
                                var new_password_empty = "请输入您的新密码！";
                                var confirm_password_empty = "请输入您的确认密码！";
                                var both_password_error = "您现两次输入的密码不一致！";
                                var msg_blank = "不能为空";
                                var no_select_question = "- 您没有完成密码提示问题的操作";
                            </script>
                            <h5><span>我的红包</span></h5>
                            <div class="blank"></div>
                            <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                <tr>
                                    <th align="center" bgcolor="#FFFFFF">红包序号</th>
                                    <th align="center" bgcolor="#FFFFFF">用户红包</th>
                                    <th align="center" bgcolor="#FFFFFF">红包金额</th>
                                    <th align="center" bgcolor="#FFFFFF">最小订单金额</th>
                                    <th align="center" bgcolor="#FFFFFF">截至使用日期</th>
                                    <th align="center" bgcolor="#FFFFFF">红包状态</th>
                                </tr>
                                <?php if($bonus){?>
                                    <?php if(is_array($bonus)):?><?php $index=0; ?><?php  foreach($bonus as $item){ ?>
                                        <tr>
                                            <td align="center" bgcolor="#FFFFFF"><?php echo default_value($item['bonus_sn'],'N/A');?></td>
                                            <td align="center" bgcolor="#FFFFFF"><?php echo $item['type_name'];?></td>
                                            <td align="center" bgcolor="#FFFFFF"><?php echo $item['type_money'];?></td>
                                            <td align="center" bgcolor="#FFFFFF"><?php echo $item['min_goods_amount'];?></td>
                                            <td align="center" bgcolor="#FFFFFF"><?php echo $item['use_enddate'];?></td>
                                            <td align="center" bgcolor="#FFFFFF"><?php echo $item['status'];?></td>
                                        </tr>
                                    <?php $index++; ?><?php }?><?php endif;?>
                                <?php  }else{ ?>
                                    <tr>
                                        <td colspan="6" bgcolor="#FFFFFF">您现在还没有红包</td>
                                    </tr>
                                <?php }?>
                            </table>
                            <div class="blank5"></div>
                            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--翻页 start-->
<form name="selectPageForm" action="" method="get">
    <input type="hidden" name="m" value="<?php echo $pager['current_meth'];?>"/>
    <input type="hidden" name="c" value="<?php echo $pager['current_control'];?>"/>
    <input type="hidden" name="a" value="<?php echo $pager['current_app'];?>"/>
    <?php if($pager['styleid'] == 0){?>
        <div id="pager">
            総計 <?php echo $pager['record_count'];?> 個の商品，全部 <?php echo $pager['page_count'];?> ページ。
            <span>
                <a href="<?php echo $pager['page_first'];?>">第一ページ </a> 
                <a href="<?php echo $pager['page_prev'];?>">前</a>
                <a href="<?php echo $pager['page_next'];?>">次</a> 
                <a href="<?php echo $pager['page_last'];?>">一番末页</a>
            </span>
            <?php if(is_array($pager['search'])):?><?php $index=0; ?><?php  foreach($pager['search'] as $key=>$item){ ?>
                <?php if($key == 'keywords'){?>
                    <input type="hidden" name="<?php echo $key;?>" value="<?php echo urldecode($item);?>" />
                <?php  }else{ ?>
                    <input type="hidden" name="<?php echo $key;?>" value="<?php echo $item;?>" />
                <?php }?>
            <?php $index++; ?><?php }?><?php endif;?>
            <select name="page" id="page" onchange="selectPage(this)">
                <?php if(isset($pager['array']) && !empty($pager['array'])):$arr["options"]=$pager['array'];$arr["selected"]=$pager['page'];echo html_options($arr);endif;
?>
            </select>
        </div>
    <?php  }else{ ?>
        <!--翻页 start-->
        <div id="pager" class="pagebar">
            <span class="f_l f6" style="margin-right:10px;">総計<b><?php echo $pager['record_count'];?></b> 個の商品</span>
            <?php if($pager['page_first']){?>
                <a href="<?php echo $pager['page_first'];?>">第一ページ ...</a>
            <?php }?>
            <?php if($pager['page_prev']){?>
                <a class="prev" href="<?php echo $pager['page_prev'];?>">前</a>
            <?php }?>
            <?php if($pager['page_count'] <> 1){?>
                <?php if(is_array($pager['page_number'])):?><?php $index=0; ?><?php  foreach($pager['page_number'] as $key=>$item){ ?>
                    <?php if($pager['page'] == $key){?>
                        <span class="page_now"><?php echo $key;?></span>
                    <?php  }else{ ?>
                        <a href="<?php echo $item;?>">[<?php echo $key;?>]</a>
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
            <?php }?>
            <?php if($pager['page_next']){?>
                <a class="next" href="<?php echo $pager['page_next'];?>">次</a>
            <?php }?>
            <?php if($pager['page_last']){?>
                <a class="last" href="<?php echo $pager['page_last'];?>">...一番末页</a>
            <?php }?>
            <?php if($pager['page_kbd']){?>
                <?php if(is_array($pager['search'])):?><?php $index=0; ?><?php  foreach($pager['search'] as $key=>$item){ ?>
                    <?php if($key == 'keywords'){?>
                        <input type="hidden" name="<?php echo $key;?>" value="<?php echo urldecode($item);?>" />
                    <?php  }else{ ?>
                        <input type="hidden" name="<?php echo $key;?>" value="<?php echo $item;?>" />
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
                <kbd style="float:left; margin-left:8px; position:relative; bottom:3px;">
                    <input type="text" name="page" onkeydown="if(event.keyCode==13)selectPage(this)" size="3" class="B_blue" />
                </kbd>
            <?php }?>
        </div>
        <!--翻页 END-->
    <?php }?>
</form>
<script type="Text/Javascript" language="JavaScript">
function selectPage(sel)
{
    sel.form.submit();
}
</script>
                            <div class="blank5"></div>
                            <h5><span>添加红包</span></h5>
                            <div class="blank"></div>
                            <form name="addBouns" action="user.php" method="post" onSubmit="return addBonus()">
                                <div style="padding: 15px;">
                                    红包序列号
                                    <input name="bonus_sn" type="text" size="30" class="inputBg" />
                                    <input type="hidden" name="act" value="act_add_bonus" class="inputBg" />
                                    <input type="submit" class="bnt_blue_1" style="border:none;" value="添加红包" />
                                </div>
                            </form>
                        <?php }?>
                        <!--用户红包结束-->
                        
                        <!--#包裹状态查询界面 start-->
                        <?php if($action == 'track_packages'){?>
                            <h5><span>跟踪包裹</span></h5>
                            <div class="blank"></div>
                            <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="order_table">
                                <tr align="center">
                                    <td bgcolor="#ffffff">订单号</td>
                                    <td bgcolor="#ffffff">操作</td>
                                </tr>
                                <?php if(is_array($orders)):?><?php $index=0; ?><?php  foreach($orders as $item){ ?>
                                    <tr>
                                        <td align="center" bgcolor="#ffffff"><a href="user.php?act=order_detail&order_id=<?php echo $item['order_id'];?>"><?php echo $item['order_sn'];?></a></td>
                                        <td align="center" bgcolor="#ffffff"><?php echo $item['query_link'];?></td>
                                    </tr>
                                <?php $index++; ?><?php }?><?php endif;?>
                            </table>
                            <script>
                                var query_status = '查询状态';
                                var ot = document.getElementById('order_table');
                                for (var i = 1; i < ot.rows.length; i++)
                                {
                                    var row = ot.rows[i];
                                    var cel = row.cells[1];
                                    cel.getElementsByTagName('a').item(0).innerHTML = query_status;
                                }
                            </script>
                            <div class="blank5"></div>
                            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--翻页 start-->
<form name="selectPageForm" action="" method="get">
    <input type="hidden" name="m" value="<?php echo $pager['current_meth'];?>"/>
    <input type="hidden" name="c" value="<?php echo $pager['current_control'];?>"/>
    <input type="hidden" name="a" value="<?php echo $pager['current_app'];?>"/>
    <?php if($pager['styleid'] == 0){?>
        <div id="pager">
            総計 <?php echo $pager['record_count'];?> 個の商品，全部 <?php echo $pager['page_count'];?> ページ。
            <span>
                <a href="<?php echo $pager['page_first'];?>">第一ページ </a> 
                <a href="<?php echo $pager['page_prev'];?>">前</a>
                <a href="<?php echo $pager['page_next'];?>">次</a> 
                <a href="<?php echo $pager['page_last'];?>">一番末页</a>
            </span>
            <?php if(is_array($pager['search'])):?><?php $index=0; ?><?php  foreach($pager['search'] as $key=>$item){ ?>
                <?php if($key == 'keywords'){?>
                    <input type="hidden" name="<?php echo $key;?>" value="<?php echo urldecode($item);?>" />
                <?php  }else{ ?>
                    <input type="hidden" name="<?php echo $key;?>" value="<?php echo $item;?>" />
                <?php }?>
            <?php $index++; ?><?php }?><?php endif;?>
            <select name="page" id="page" onchange="selectPage(this)">
                <?php if(isset($pager['array']) && !empty($pager['array'])):$arr["options"]=$pager['array'];$arr["selected"]=$pager['page'];echo html_options($arr);endif;
?>
            </select>
        </div>
    <?php  }else{ ?>
        <!--翻页 start-->
        <div id="pager" class="pagebar">
            <span class="f_l f6" style="margin-right:10px;">総計<b><?php echo $pager['record_count'];?></b> 個の商品</span>
            <?php if($pager['page_first']){?>
                <a href="<?php echo $pager['page_first'];?>">第一ページ ...</a>
            <?php }?>
            <?php if($pager['page_prev']){?>
                <a class="prev" href="<?php echo $pager['page_prev'];?>">前</a>
            <?php }?>
            <?php if($pager['page_count'] <> 1){?>
                <?php if(is_array($pager['page_number'])):?><?php $index=0; ?><?php  foreach($pager['page_number'] as $key=>$item){ ?>
                    <?php if($pager['page'] == $key){?>
                        <span class="page_now"><?php echo $key;?></span>
                    <?php  }else{ ?>
                        <a href="<?php echo $item;?>">[<?php echo $key;?>]</a>
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
            <?php }?>
            <?php if($pager['page_next']){?>
                <a class="next" href="<?php echo $pager['page_next'];?>">次</a>
            <?php }?>
            <?php if($pager['page_last']){?>
                <a class="last" href="<?php echo $pager['page_last'];?>">...一番末页</a>
            <?php }?>
            <?php if($pager['page_kbd']){?>
                <?php if(is_array($pager['search'])):?><?php $index=0; ?><?php  foreach($pager['search'] as $key=>$item){ ?>
                    <?php if($key == 'keywords'){?>
                        <input type="hidden" name="<?php echo $key;?>" value="<?php echo urldecode($item);?>" />
                    <?php  }else{ ?>
                        <input type="hidden" name="<?php echo $key;?>" value="<?php echo $item;?>" />
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
                <kbd style="float:left; margin-left:8px; position:relative; bottom:3px;">
                    <input type="text" name="page" onkeydown="if(event.keyCode==13)selectPage(this)" size="3" class="B_blue" />
                </kbd>
            <?php }?>
        </div>
        <!--翻页 END-->
    <?php }?>
</form>
<script type="Text/Javascript" language="JavaScript">
function selectPage(sel)
{
    sel.form.submit();
}
</script>
                        <?php }?>
                        <!--#包裹状态查询界面 end-->
                        
                        <!--#会员余额 start-->
                        <?php if($action == 'account_raply' or $action == 'account_log' or $action == 'account_deposit' or $action == 'account_detail'){?>
                            <script type="text/javascript">
                                var surplus_amount_empty = "请输入您要操作的金额数量！";
                                var surplus_amount_error = "您输入的金额数量格式不正确！";
                                var process_desc = "请输入您此次操作的备注信息！";
                                var payment_empty = "请选择支付方式！";
                            </script>
                            <h5><span>会员余额</span></h5>
                            <div class="blank"></div>
                            <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                <tr>
                                    <td align="right" bgcolor="#ffffff">
                                        <a href="user.php?act=account_deposit" class="f6">充值</a> | 
                                        <a href="user.php?act=account_raply" class="f6">提现</a> | 
                                        <a href="user.php?act=account_detail" class="f6">查看帐户明细</a> | 
                                        <a href="user.php?act=account_log" class="f6">查看申请记录</a> 
                                    </td>
                                </tr>
                            </table>
                        <?php }?>
                        <?php if($action == 'account_log'){?>
                            <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                <tr align="center">
                                    <td bgcolor="#ffffff">操作时间</td>
                                    <td bgcolor="#ffffff">类型</td>
                                    <td bgcolor="#ffffff">金额</td>
                                    <td bgcolor="#ffffff">会员备注</td>
                                    <td bgcolor="#ffffff">管理员备注</td>
                                    <td bgcolor="#ffffff">状态</td>
                                    <td bgcolor="#ffffff">操作</td>
                                </tr>
                                <?php if(is_array($account_log)):?><?php $index=0; ?><?php  foreach($account_log as $item){ ?>
                                    <tr>
                                        <td align="center" bgcolor="#ffffff"><?php echo $item['add_time'];?></td>
                                        <td align="left" bgcolor="#ffffff"><?php echo $item['type'];?></td>
                                        <td align="right" bgcolor="#ffffff"><?php echo $item['amount'];?></td>
                                        <td align="left" bgcolor="#ffffff"><?php echo $item['short_user_note'];?></td>
                                        <td align="left" bgcolor="#ffffff"><?php echo $item['short_admin_note'];?></td>
                                        <td align="center" bgcolor="#ffffff"><?php echo $item['pay_status'];?></td>
                                        <td align="right" bgcolor="#ffffff">
                                            <?php echo $item['handle'];?>
                                            <?php if(($item['is_paid'] == 0 and $item['process_type'] == 1) or $item['handle']){?>
                                                <a href="user.php?act=cancel&id=<?php echo $item['id'];?>" onclick="if (!confirm('您确定要删除此条记录吗？')) return false;">
                                                    取消
                                                </a>
                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php $index++; ?><?php }?><?php endif;?>
                                <tr>
                                    <td colspan="7" align="right" bgcolor="#ffffff"><?php echo $lang['current_surplus'];?><?php echo $surplus_amount;?></td>
                                </tr>
                            </table>
                            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--翻页 start-->
<form name="selectPageForm" action="" method="get">
    <input type="hidden" name="m" value="<?php echo $pager['current_meth'];?>"/>
    <input type="hidden" name="c" value="<?php echo $pager['current_control'];?>"/>
    <input type="hidden" name="a" value="<?php echo $pager['current_app'];?>"/>
    <?php if($pager['styleid'] == 0){?>
        <div id="pager">
            総計 <?php echo $pager['record_count'];?> 個の商品，全部 <?php echo $pager['page_count'];?> ページ。
            <span>
                <a href="<?php echo $pager['page_first'];?>">第一ページ </a> 
                <a href="<?php echo $pager['page_prev'];?>">前</a>
                <a href="<?php echo $pager['page_next'];?>">次</a> 
                <a href="<?php echo $pager['page_last'];?>">一番末页</a>
            </span>
            <?php if(is_array($pager['search'])):?><?php $index=0; ?><?php  foreach($pager['search'] as $key=>$item){ ?>
                <?php if($key == 'keywords'){?>
                    <input type="hidden" name="<?php echo $key;?>" value="<?php echo urldecode($item);?>" />
                <?php  }else{ ?>
                    <input type="hidden" name="<?php echo $key;?>" value="<?php echo $item;?>" />
                <?php }?>
            <?php $index++; ?><?php }?><?php endif;?>
            <select name="page" id="page" onchange="selectPage(this)">
                <?php if(isset($pager['array']) && !empty($pager['array'])):$arr["options"]=$pager['array'];$arr["selected"]=$pager['page'];echo html_options($arr);endif;
?>
            </select>
        </div>
    <?php  }else{ ?>
        <!--翻页 start-->
        <div id="pager" class="pagebar">
            <span class="f_l f6" style="margin-right:10px;">総計<b><?php echo $pager['record_count'];?></b> 個の商品</span>
            <?php if($pager['page_first']){?>
                <a href="<?php echo $pager['page_first'];?>">第一ページ ...</a>
            <?php }?>
            <?php if($pager['page_prev']){?>
                <a class="prev" href="<?php echo $pager['page_prev'];?>">前</a>
            <?php }?>
            <?php if($pager['page_count'] <> 1){?>
                <?php if(is_array($pager['page_number'])):?><?php $index=0; ?><?php  foreach($pager['page_number'] as $key=>$item){ ?>
                    <?php if($pager['page'] == $key){?>
                        <span class="page_now"><?php echo $key;?></span>
                    <?php  }else{ ?>
                        <a href="<?php echo $item;?>">[<?php echo $key;?>]</a>
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
            <?php }?>
            <?php if($pager['page_next']){?>
                <a class="next" href="<?php echo $pager['page_next'];?>">次</a>
            <?php }?>
            <?php if($pager['page_last']){?>
                <a class="last" href="<?php echo $pager['page_last'];?>">...一番末页</a>
            <?php }?>
            <?php if($pager['page_kbd']){?>
                <?php if(is_array($pager['search'])):?><?php $index=0; ?><?php  foreach($pager['search'] as $key=>$item){ ?>
                    <?php if($key == 'keywords'){?>
                        <input type="hidden" name="<?php echo $key;?>" value="<?php echo urldecode($item);?>" />
                    <?php  }else{ ?>
                        <input type="hidden" name="<?php echo $key;?>" value="<?php echo $item;?>" />
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
                <kbd style="float:left; margin-left:8px; position:relative; bottom:3px;">
                    <input type="text" name="page" onkeydown="if(event.keyCode==13)selectPage(this)" size="3" class="B_blue" />
                </kbd>
            <?php }?>
        </div>
        <!--翻页 END-->
    <?php }?>
</form>
<script type="Text/Javascript" language="JavaScript">
function selectPage(sel)
{
    sel.form.submit();
}
</script>
                        <?php }?>
                        <!--#会员余额 end-->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="blank5"></div>
    <!--帮助-->
    <div class="block">
        <div class="box">
            <div class="helpTitBg clearfix">
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($helps){?>
    <?php if(is_array($helps)):?><?php $index=0; ?><?php  foreach($helps as $help_cat){ ?>
        <dl>
            <dt><a href='<?php echo $help_cat['cat_id'];?>' title="<?php echo $help_cat['cat_name'];?>"><?php echo $help_cat['cat_name'];?></a></dt>
            <?php if(is_array($help_cat['article'])):?><?php $index=0; ?><?php  foreach($help_cat['article'] as $item){ ?>
                <dd><a href="<?php echo $item['url'];?>" title="<?php echo $item['title'];?>"><?php echo $item['short_title'];?></a></dd>
            <?php $index++; ?><?php }?><?php endif;?>
        </dl>
    <?php $index++; ?><?php }?><?php endif;?>
<?php }?>
            </div>
        </div>
    </div>
    <div class="blank"></div>
    <!--帮助-->
    
    <!--友情链接 start-->
    <?php if($img_links  or $txt_links){?>
    <div id="bottomNav" class="box">
        <div class="box_1">
            <div class="links clearfix">
                <!--开始图片类型的友情链接-->
                <?php if(is_array($img_links)):?><?php $index=0; ?><?php  foreach($img_links as $link){ ?>
                <a href="<?php echo $link['url'];?>" target="_blank" title="<?php echo $link['name'];?>">
                    <img src="<?php echo $link['logo'];?>" alt="<?php echo $link['name'];?>" border="0" />
                </a>
                <?php $index++; ?><?php }?><?php endif;?>
                <!--结束图片类型的友情链接-->
                <?php if($txt_links){?>
                    <!--开始文字类型的友情链接-->
                    <?php if(is_array($txt_links)):?><?php $index=0; ?><?php  foreach($txt_links as $link){ ?>
                        [<a href="<?php echo $link['url'];?>" target="_blank" title="<?php echo $link['name'];?>"><?php echo $link['name'];?></a>]
                    <?php $index++; ?><?php }?><?php endif;?>
                    <!--结束文字类型的友情链接-->
                <?php }?>
            </div>
        </div>
    </div>
    <?php }?>
    <!--友情链接 end-->
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
</html>