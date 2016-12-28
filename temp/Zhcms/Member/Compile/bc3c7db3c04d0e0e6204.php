<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><ul class="nav navbar-nav navbar-right">
    <?php if($_SESSION['uid']){?>
        <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 12px;padding-bottom: 0px;padding-right:0px;">
                    <img src="<?php echo $_SESSION['icon50'];?>" style="width:30px;height:30px;border-radius: 50%;vertical-align: middle"/>
                    <?php echo $_SESSION['nickname'];?>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="http://www.metacms.com/index.php?a=Member&c=Message&m=index"> <span class="glyphicon glyphicon-envelope"></span> 私のメッセージ</a></li>
                    <li><a href="http://www.metacms.com/index.php?a=Member&c=Favorite&m=index"> <span class="glyphicon glyphicon-star-empty"></span> 私のカード</a></li>
                    <li><a href="http://www.metacms.com/index.php?a=Member&c=Follow&m=fans_list"> <span class="glyphicon glyphicon-heart"></span> 私のファン</a></li>
                    <li><a href="http://www.metacms.com/index.php?a=Member&c=Follow&m=follow_list"> 私の注目</a></li>
                    <li><a href="http://www.metacms.com/index.php?a=Member&c=Content&m=index&mid=1">私の文章</a></li>
                    <li><a href="http://www.metacms.com/index.php?<?php echo $_SESSION['domain'];?>">マイページ</a></li>
                    <li><a href="http://www.metacms.com/index.php?a=Member&c=Profile&m=edit">個人情報修正</a></li>
                    <li><a href="http://www.metacms.com/index.php?a=Member&c=Login&m=quit">ログアウト</a></li>
                </ul>
        </li>
        <li class="dropdown">
            <a href="http://www.metacms.com/index.php?a=Member&c=Message&m=index" class="message" style="padding-left:5px !important;">
                <span class="badge"><?php echo $message_count;?>のメッセージ</span>
            </a>
            <style>
                a.message:hover{
                    background: none !important;
                }
            </style>
        </li>
    <?php  }else{ ?>
        <li>
            <a href="http://www.metacms.com/index.php?a=Member&c=Login&m=login">ログイン</a>
        </li>
        <li>
            <a href="http://www.metacms.com/index.php?a=Member&c=Login&m=reg">登録</a>
        </li>
    <?php }?>
</ul>