<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($auction_list){?>
<div class="box">
    <div class="box_1">
        <h3>
            <span>拍卖商品</span>
            <a href="<?php echo U('ec/EcAuction/index');?>"><img src="http://www.works.com/template/v4/ec/common/style/images/more.gif"/></a>
        </h3>
        <div class="centerPadd">
            <div class="clearfix goodsBox" style="border:none;">
                <?php if(is_array($auction_list)):?><?php $index=0; ?><?php  foreach($auction_list as $auction){ ?>
                    <div class="goodsItem">
                        <a href="<?php echo $auction['url'];?>">
                            <img src="<?php echo $auction['thumb'];?>" alt="<?php echo $auction['goods_name'];?>" class="goodsimg" />
                        </a><br />
                        <p><a href="<?php echo $auction['url'];?>" title="<?php echo $auction['goods_name'];?>"><?php echo $auction['short_style_name'];?></a></p>
                        <font class="shop_s"><?php echo $auction['formated_start_price'];?></font>
                    </div>
                <?php $index++; ?><?php }?><?php endif;?>
            </div>
        </div>
    </div>
</div>
<div class="blank5"></div>
<?php }?>