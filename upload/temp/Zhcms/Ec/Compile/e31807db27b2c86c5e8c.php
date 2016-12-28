<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($pictures){?>
    <div class="picture" id="imglist">
        <?php if(is_array($pictures)):?><?php $picture_no=0; ?><?php  foreach($pictures as $picture){ ?>
            <?php if($picture_no < 1){?>
                <a  href="<?php echo $picture['img_url'];?>" rel="zoom1"  rev="<?php echo $picture['img_url'];?>" title="{$picture.img_desc">
                    <img src="<?php if($picture['thumb_url']){?><?php echo $picture['thumb_url'];?><?php  }else{ ?><?php echo $picture['img_url'];?><?php }?>" alt="<?php echo $goods['goods_name'];?>" class="onbg" />
                </a>
            <?php  }else{ ?>
                <a  href="<?php echo $picture['img_url'];?>" rel="zoom1" rev="<?php echo $picture['img_url'];?>" title="<?php echo $picture['img_desc'];?>">
                    <img src="<?php if($picture['thumb_url']){?><?php echo $picture['thumb_url'];?><?php  }else{ ?><?php echo $picture['img_url'];?><?php }?>" alt="<?php echo $goods['goods_name'];?>" class="autobg" />
                </a>
            <?php }?>
        <?php $picture_no++; ?><?php }?><?php endif;?>
    </div>
<?php }?>
<script type="text/javascript">
	mypicBg();
</script>