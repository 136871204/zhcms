<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="box">
    <div class="box_2">
        <div class="top10Tit"></div>
        <div class="top10List clearfix">
            <?php if(is_array($top_goods)):?><?php $index=0; ?><?php  foreach($top_goods as $top_goods_key=>$goods){ ?>
                <?php $t_top_goods_key=$top_goods_key+1; ?>
                <ul class="clearfix">
                    <img src="http://www.works.com/template/v4/ec/common/style/images/top_<?php echo $t_top_goods_key;?>.gif" class="iteration" />
                    <?php if($t_top_goods_key < 4){?>
                        <li class="topimg">
                            <a href="<?php echo $goods['url'];?>">
                                <img src="<?php echo $goods['thumb'];?>" alt="<?php echo $goods['name'];?>" class="samllimg" />
                            </a>
                        </li>
                    <?php }?>
                    <li <?php if($t_top_goods_key < 4){?>class="iteration1"<?php }?>>
                        <a href="<?php echo $goods['url'];?>" title="<?php echo escape($goods['name'],html);?>"><?php echo $goods['short_name'];?></a><br />
                        本店售价：<font class="f1"><?php echo $goods['price'];?></font><br />
                    </li>
                </ul>
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>