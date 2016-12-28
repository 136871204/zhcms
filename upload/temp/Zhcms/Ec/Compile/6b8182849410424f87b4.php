<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>str:<?php echo $user_name;?>您好！<br>
<br>
您已经进行了密码重置的操作，请点击以下链接(或者复制到您的浏览器):<br>
<br>
<a href="<?php echo $reset_email;?>" target="_blank"><?php echo $reset_email;?></a><br>
<br>
以确认您的新密码重置操作！<br>
<br>
<?php echo $shop_name;?><br>
<?php echo $send_date;?>