<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($promotion_goods){?>
    <div id="sales" class="f_l clearfix">
        <h1>
            <a href="<?php echo U('ec/EcSearch/index');?>&intro=promotion">
                <img src="http://www.works.com/template/v4/ec/common/style/images/more.gif" />
            </a>
        </h1>
        <div class="clearfix goodBox">
            <?php if(is_array($promotion_goods)):?><?php $index=0; ?><?php  foreach($promotion_goods as $promotion_foreach_key=>$goods){ ?>
                <?php if($promotion_foreach_key < 3){?>
                <div class="goodList">
                    <a href="<?php echo $goods['url'];?>">
                        <img src="<?php echo $goods['thumb'];?>" border="0" alt="<?php echo $goods['name'];?>"/>
                    </a><br />
                    <p>
                        <a href="<?php echo $goods['url'];?>" title="<?php echo $goods['name'];?>"><?php echo $goods['short_name'];?></a>
                    </p>
                    促销价：<font class="f1"><?php echo $goods['promote_price'];?></font>
                </div>
                <?php }?>
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
    </div>
<?php }?>