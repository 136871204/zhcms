<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($bought_goods){?>
    <div class="box">
        <div class="box_1">
            <h3><span class="text">购买过此商品的人还购买过</span></h3>
            <div class="boxCenterList clearfix ie6" style="padding:2px;">
            <?php if(is_array($bought_goods)):?><?php $index=0; ?><?php  foreach($bought_goods as $bought_goods_data){ ?>
                <div class="goodsItem" style="padding: 10px 2px 15px 2px;">
                    <a href="<?php echo $bought_goods_data['url'];?>">
                        <img src="<?php echo $bought_goods_data['goods_thumb'];?>" alt="<?php echo $bought_goods_data['goods_name'];?>"  class="goodsimg" />
                    </a><br />
                    <p><a href="<?php echo $bought_goods_data['url'];?>" title="<?php echo $bought_goods_data['goods_name'];?>"><?php echo $bought_goods_data['short_name'];?></a></p>
                    <?php if($bought_goods_data['promote_price'] <> 0){?>
                        <font class="shop_s"><?php echo $bought_goods_data['formated_promote_price'];?></font>
                    <?php  }else{ ?>
                        <font class="shop_s"><?php echo $bought_goods_data['shop_price'];?></font>
                    <?php }?> 
                </div>
            <?php $index++; ?><?php }?><?php endif;?>
            </div>
        </div>
    </div>
    <div class="blank5"></div>
<?php }?>