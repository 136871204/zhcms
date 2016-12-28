<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($brand_list){?>
    <?php if(is_array($brand_list)):?><?php $index=0; ?><?php  foreach($brand_list as $brand_foreach_key=>$brand){ ?>
        <?php if($brand_foreach_key < 11){?>
            <?php if($brand['brand_logo']){?>
                <a href="<?php echo $brand['url'];?>">
                    <img src="<?php echo $brand['brand_logo'];?>" alt="<?php echo $brand['brand_name'];?> (<?php echo $brand['goods_num'];?>)" />
                </a>
            <?php  }else{ ?>
                <a href="<?php echo $brand['url'];?>">
                    <?php echo $brand['brand_name'];?> <?php if($brand['goods_num']){?>(<?php echo $brand['goods_num'];?>)<?php }?>
                </a>
            <?php }?>
        <?php }?>
    <?php $index++; ?><?php }?><?php endif;?>
    <div class="brandsMore">
        <a href="<?php echo U('ec/EcBrand/index');?>">
            <img src="http://www.metacms.com/template/v4/ec/common/style/images/moreBrands.gif" />
        </a>
    </div>
<?php }?>