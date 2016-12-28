<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="xm-box">
    <h4 class="title"><span><?php echo htmlspecialchars($goods_cat['name']);?></span> <a class="more" href="<?php echo $goods_cat['url'];?>">更多</a></h4>
    <div id="show_hot_area" class="clearfix">
        <?php if(is_array($cat_goods)):?><?php $index=0; ?><?php  foreach($cat_goods as $goods){ ?>
            <div class="goodsItem">
                <a href="<?php echo $goods['url'];?>"><img src="<?php echo $goods['thumb'];?>" alt="<?php echo htmlspecialchars($goods['name']);?>" class="goodsimg" /></a><br />
                <p class="f1"><a href="<?php echo $goods['url'];?>" title="<?php echo htmlspecialchars($goods['name']);?>"><?php echo $goods['short_name'];?></a></p>
                市场价：<font class="market"><?php echo $goods['market_price'];?></font> <br/>
                本店价：<font class="f1">
                <?php if($goods['promote_price'] <> ''){?>
                <?php echo $goods['promote_price'];?>
                <?php  }else{ ?>
                <?php echo $goods['shop_price'];?>
                <?php }?>
                </font>
            </div>
        <?php $index++; ?><?php }?><?php endif;?>
    </div>
</div>
<div class="blank"></div>