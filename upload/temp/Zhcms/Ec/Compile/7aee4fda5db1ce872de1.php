<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($fittings){?>
<div class="box">
    <div class="box_1">
        <h3><span>相关配件</span></h3>
        <div class="boxCenterList clearfix">
            <?php if(is_array($fittings)):?><?php $index=0; ?><?php  foreach($fittings as $goods){ ?>
            <ul class="clearfix">
                <li class="goodsimg">
                    <a href="<?php echo $goods['url'];?>" target="_blank"><img src="<?php echo $goods['goods_thumb'];?>" alt="<?php echo $goods['name'];?>" class="B_blue" /></a>
                </li>
                <li>
                    <a href="<?php echo $goods['url'];?>" target="_blank" title="<?php echo $goods['goods_name'];?>"><?php echo $goods['short_name'];?></a><br />
                    配件价格：<font class="f1"><?php echo $goods['fittings_price'];?></font><br />
                </li>
            </ul>
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>
<div class="blank5"></div>
<?php }?>