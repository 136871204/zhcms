<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($hot_goods){?>
<div class="box">
    <div class="box_2 centerPadd">
        <div class="itemTit Hot" id="itemHot"></div>
        <div id="show_hot_area" class="clearfix goodsBox">
            <?php if(is_array($hot_goods)):?><?php $index=0; ?><?php  foreach($hot_goods as $goods){ ?>
            <div class="goodsItem">
                <span class="hot"></span>
                <a href="<?php echo $goods['url'];?>">
                    <img src="<?php echo $goods['thumb'];?>" alt="<?php echo $goods['name'];?>" class="goodsimg" />
                </a><br />
                <p><a href="<?php echo $goods['url'];?>" title="<?php echo $goods['name'];?>"><?php echo $goods['short_style_name'];?></a></p>
                消耗积分：<font class="f1"><?php echo $goods['exchange_integral'];?></font>
            </div>
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>
<div class="blank5"></div>
<?php }?>