<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="userMenu">
    <a href="<?php echo U('ec/EcUser/index');?>" <?php if($action == 'default'){?>class="curs"<?php }?>><img src="http://www.works.com/template/v4/ec/common/style/images/u1.gif"/> 欢迎页</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=profile"<?php if($action == 'profile'){?>class="curs"<?php }?>><img src="http://www.works.com/template/v4/ec/common/style/images/u2.gif"/> 用户信息</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=order_list"<?php if($action == 'order_list' or $action == 'order_detail'){?>class="curs"<?php }?>><img src="http://www.works.com/template/v4/ec/common/style/images/u3.gif"/> 我的订单</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=address_list"<?php if($action == 'address_list'){?>class="curs"<?php }?>><img src="http://www.works.com/template/v4/ec/common/style/images/u4.gif"/> 收货地址</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=collection_list"<?php if($action == 'collection_list'){?>class="curs"<?php }?>><img src="http://www.works.com/template/v4/ec/common/style/images/u5.gif"/> 我的收藏</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=message_list"<?php if($action == 'message_list'){?>class="curs"<?php }?>><img src="http://www.works.com/template/v4/ec/common/style/images/u6.gif"/> 我的留言</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=tag_list"<?php if($action == 'tag_list'){?>class="curs"<?php }?>><img src="http://www.works.com/template/v4/ec/common/style/images/u7.gif"/> 我的标签</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=booking_list"<?php if($action == 'booking_list'){?>class="curs"<?php }?>><img src="http://www.works.com/template/v4/ec/common/style/images/u8.gif"/> 缺货登记</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=bonus"<?php if($action == 'bonus'){?>class="curs"<?php }?>><img src="http://www.works.com/template/v4/ec/common/style/images/u9.gif"/> 我的红包</a>
    <?php if($affiliate['on'] == 1){?>
        <a href="user.php?act=affiliate"<?php if($action == 'affiliate'){?>class="curs"<?php }?>><img src="http://www.works.com/template/v4/ec/common/style/images/u10.gif"/> 我的推荐</a>
    <?php }?>
    <a href="<?php echo U('ec/EcUser/index');?>&act=comment_list"<?php if($action == 'comment_list'){?>class="curs"<?php }?>><img src="http://www.works.com/template/v4/ec/common/style/images/u11.gif"/> 我的评论</a>
    <!--<a href="user.php?act=group_buy"><?php echo $lang['label_group_buy'];?></a>-->
    <a href="<?php echo U('ec/EcUser/index');?>&act=track_packages"<?php if($action == 'track_packages'){?>class="curs"<?php }?>><img src="http://www.works.com/template/v4/ec/common/style/images/u12.gif"/> 跟踪包裹</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=account_log"<?php if($action == 'account_log'){?>class="curs"<?php }?>><img src="http://www.works.com/template/v4/ec/common/style/images/u13.gif"/> 资金管理</a>
    <?php if($show_transform_points){?>
        <a href="user.php?act=transform_points"<?php if($action == 'transform_points'){?>class="curs"<?php }?>><img src="http://www.works.com/template/v4/ec/common/style/images/u14.gif"/> 积分兑换</a>
    <?php }?>
    <a href="<?php echo U('ec/EcUser/index');?>&act=logout" style="background:none; text-align:right; margin-right:10px;"><img src="http://www.works.com/template/v4/ec/common/style/images/bnt_sign.gif"/></a>
</div>