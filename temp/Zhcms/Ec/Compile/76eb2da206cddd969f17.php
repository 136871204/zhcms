<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($article_categories){?>
<div class="box">
    <div class="box_1">
        <h3><span>文章分类</span></h3>
        <div class="boxCenterList RelaArticle">
            <?php if(is_array($article_categories)):?><?php $index=0; ?><?php  foreach($article_categories as $cat){ ?>
                <a href="<?php echo $cat['url'];?>"><?php echo $cat['name'];?></a><br />
                <?php if(is_array($cat['children'])):?><?php $index=0; ?><?php  foreach($cat['children'] as $child){ ?>
                    <a href="<?php echo $child['url'];?>" style="background-image:none;"><?php echo $child['name'];?></a><br />
                <?php $index++; ?><?php }?><?php endif;?>
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>
<div class="blank5"></div>
<?php }?>