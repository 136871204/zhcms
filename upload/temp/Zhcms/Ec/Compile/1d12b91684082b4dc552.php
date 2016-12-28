<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($best_goods){?>
    <?php if($cat_rec_sign <> 1){?>
        <div class="xm-box">
            <h4 class="title"><span>精品推荐</span> <a class="more" href="../search.php?intro=best">更多</a></h4>
            <div id="show_best_area" class="clearfix">
    <?php }?>
            <?php if(is_array($best_goods)):?><?php $index=0; ?><?php  foreach($best_goods as $goods){ ?>
                <div class="goodsItem">
                    <a href="<?php echo $goods['url'];?>"><img src="<?php echo $goods['thumb'];?>" alt="<?php echo htmlspecialchars($goods['name']);?>" class="goodsimg" /></a><br />
                    <p class="f1"><a href="<?php echo $goods['url'];?>" title="<?php echo htmlspecialchars($goods['name']);?>"><?php echo $goods['short_style_name'];?></a></p>
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
    <?php if($cat_rec_sign <> 1){?>
            </div>
        </div>
    <div class="blank"></div>
    <?php }?>
<?php }?>