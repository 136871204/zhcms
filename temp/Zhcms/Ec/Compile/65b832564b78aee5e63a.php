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