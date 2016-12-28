<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($promotion_info){?>
<!-- 促销信息 -->
<div class="box">
    <div class="box_1">
        <h3><span>セール情報</span></h3>
        <div class="boxCenterList RelaArticle">
            <?php if(is_array($promotion_info)):?><?php $index=0; ?><?php  foreach($promotion_info as $promotion_info_key=>$item){ ?>
                <?php if($item['type'] == 'snatch'){?>
                    <a href="<?php echo u('ec/EcSnatch/index');?>" title="[夺宝]">[夺宝]</a>
                <?php  }elseif($item['type'] == 'group_buy'){ ?>
                    <a href="<?php echo u('ec/EcGroupBuy/index');?>" title="[团购]">[团购]</a>
                <?php  }elseif($item['type'] == 'auction'){ ?>
                    <a href="<?php echo u('ec/EcAuction/index');?>" title="[拍卖]">[拍卖]</a>
                <?php  }elseif($item['type'] == 'favourable'){ ?>
                    <a href="<?php echo u('ec/EcActivity/index');?>" title="[优惠]">[优惠]</a>
                <?php  }elseif($item['type'] == 'package'){ ?>
                    <a href="<?php echo u('ec/EcPackage/index');?>" title="[礼包]">[礼包]</a>
                <?php }?>
                <a href="<?php echo $item['url'];?>" title="<?php echo $item['act_name'];?><?php echo $item['time'];?>" style="background:none; padding-left:0px;">
                    <?php echo $item['act_name'];?>
                </a><br />
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>
<div class="blank5"></div>
<?php }?>