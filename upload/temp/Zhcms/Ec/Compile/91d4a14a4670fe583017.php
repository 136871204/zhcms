<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($cat_list){?>
<div class="box">
    <div class="box_1">
        <div id="category_tree">
            <?php if(is_array($cat_list)):?><?php $index=0; ?><?php  foreach($cat_list as $cat){ ?>
                <dl>
                    <dt>
                        <a href="<?php echo $cat['url'];?>">
                            <?php echo $cat['cat_name'];?> 
                            <?php if($cat['goods_num']){?>
                            (<?php echo $cat['goods_num'];?>)
                            <?php }?>
                        </a>
                    </dt>
                </dl>
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>
<div class="blank5"></div>
<?php }?>
