<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>str:<?php echo $user_name;?>您好！<br><br>

这封邮件是 <?php echo $shop_name;?> 发送的。你收到这封邮件是为了验证你注册邮件地址是否有效。如果您已经通过验证了，请忽略这封邮件。<br>
请点击以下链接(或者复制到您的浏览器)来验证你的邮件地址:<br>
<a href="<?php echo $validate_email;?>" target="_blank"><?php echo $validate_email;?></a><br><br>

<?php echo $shop_name;?><br>
<?php echo $send_date;?>