<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($group_buy_goods){?>
<div class="box">
    <div class="box_1">
        <h3>
            <span>团购商品</span>
            <a href="<?php echo U('ec/EcGroupBuy/index');?>"><img src="http://www.metacms.com/template/v5/ec/common/style/images/more.gif"/></a>
        </h3>
        <div class="centerPadd">
            <div class="clearfix goodsBox" style="border:none;">
                <?php if(is_array($group_buy_goods)):?><?php $index=0; ?><?php  foreach($group_buy_goods as $goods){ ?>
                    <div class="goodsItem">
                        <a href="<?php echo $goods['url'];?>">
                            <img src="<?php echo $goods['thumb'];?>" alt="<?php echo $goods['goods_name'];?>" class="goodsimg" />
                        </a><br />
                        <p><a href="<?php echo $goods['url'];?>" title="<?php echo $goods['goods_name'];?>"><?php echo $goods['short_style_name'];?></a></p>
                        <font class="shop_s"><?php echo $goods['last_price'];?></font>
                    </div>
                <?php $index++; ?><?php }?><?php endif;?>
            </div>
        </div>
    </div>
</div>
<div class="blank5"></div>
<?php }?>