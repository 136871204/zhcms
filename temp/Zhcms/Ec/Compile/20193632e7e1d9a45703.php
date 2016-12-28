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
        您好，<font class="f4_b"><?php echo $user_info['username'];?></font>, 欢迎您回来！
        <a href="<?php echo U('ec/EcUser/index');?>">用户中心</a>|
        <a href="<?php echo U('ec/EcUser/index');?>&act=logout">退出</a>
    </font>
<?php  }else{ ?>
    いらっしゃいませ&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo U('ec/EcUser/index');?>">ログイン</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=register">登録</a>
<?php }?>