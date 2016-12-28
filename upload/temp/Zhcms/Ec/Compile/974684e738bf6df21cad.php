<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($promotion_goods){?>
<div class="sale_box clearfix">
    <h3><span>特价商品</span></h3>
    <div class="clearfix">
    <?php if(is_array($promotion_goods)):?><?php $index=0; ?><?php  foreach($promotion_goods as $promotion_foreach=>$goods){ ?>
        <ul class="clearfix">
            <li class="goodsimg">
                <a href="<?php echo $goods['url'];?>">
                    <img src="<?php echo $goods['thumb'];?>" border="0" alt="<?php echo htmlspecialchars($goods['name']);?>" class="B_blue"/>
                </a>
            </li>
            <li> 
                <p>
                    <a href="<?php echo $goods['url'];?>" title="<?php echo escape($goods['name'],html);?>"><?php echo escape($goods['short_name'],html);?></a>
                </p>
                市场价：<font class="market"><?php echo $goods['market_price'];?></font> <br/>
                促销价：<font class="f1"><?php echo $goods['promote_price'];?></font>
            </li>
        </ul>
    <?php $index++; ?><?php }?><?php endif;?>
    </div>
</div>
<div class="blank" style="height:1px;"></div>
<?php }?>