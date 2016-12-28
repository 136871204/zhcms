<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="zh_user_alert">
    <div class="zh_user_icon">
        <div class="ico_img">
            <a href="http://www.metacms.com/index.php?<?php echo $field['domain'];?>"><img src="http://www.metacms.com/<?php echo _default($field['icon'],'data/image/user/100.png');?>"/></a>
        </div>
    </div>
    <div class="zh_user_info">
        <div class="nickname"><?php echo $field['nickname'];?></div>
        <div class="logintime">登録時間：<?php echo date('Y-m-d',$field['regtime']);?></div>
        <div class="lasttime">最後ログイン：<?php echo date('Y-m-d',$field['logintime']);?></div>
        <div class="role">会員レベル：<?php echo $role['rname'];?></div>
        <div class="credits">
            <span>積分：</span>
            <div class="credits-bg">
                <?php if($nextRole){?>
                    <div class="credits-num" style="width:<?php echo $field['credits']/$nextRole['creditslower']*100;?>%">
                        <a href="javascript:" title="今の積分<?php echo $field['credits'];?><?php if($nextRole):?>，レベルアップ必要<?php echo $nextRole['creditslower']-$role['creditslower'];?>积分<?php endif;?>">
                            <?php echo $field['credits'];?><?php if($nextRole):?>/<?php echo $nextRole['creditslower'];?><?php endif;?>
                        </a>
                    </div>
                <?php  }else{ ?>
                    <div class="credits-num" style="width:100%">
                        <a href="javascript:" title="今の積分<?php echo $field['credits'];?>">
                            <?php echo $field['credits'];?>
                        </a>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
    <div class="description">
        <?php if($field['signature']){?>
       <?php echo $field['signature'];?>
            <?php  }else{ ?>
            こいつは怠け者で、個性サインはまだ
            <?php }?>
    </div>
    <div class="send_message">
        <?php if(isset($_SESSION['uid']) && $_SESSION['uid']!=$field['uid']):?>
            <a href="javascript:;" onclick="message.show(<?php echo $field['uid'];?>,'<?php echo $field['nickname'];?>')">メッセージする</a>
        <?php endif;?>
        <a href="http://www.metacms.com/index.php?<?php echo $field['domain'];?>">トップ</a>
        <?php if(isset($_SESSION['uid']) && $_SESSION['uid']!=$field['uid']):?>
            <a href="javascript:;" onclick="user.follow(this,<?php echo $field['uid'];?>)" class="follow"><?php echo $follow;?></a>
        <?php endif;?>
    </div>
</div>