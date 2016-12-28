<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($helps){?>
    <div class="left_help clearfix">
        <?php if(is_array($helps)):?><?php $index=0; ?><?php  foreach($helps as $help_cat){ ?>
            <dl>
                <dt> 
                    <img src="http://www.works.com/template/v3/ec/common/images/left_help_biao.gif"/> 
                    <a href='<?php echo $help_cat['cat_id'];?>' title="<?php echo $help_cat['cat_name'];?>"><?php echo $help_cat['cat_name'];?></a>
                </dt>
                <?php if(is_array($help_cat['article'])):?><?php $index=0; ?><?php  foreach($help_cat['article'] as $item){ ?>
                    <dd><a href="<?php echo $item['url'];?>" title="<?php echo $item['title'];?>"><?php echo $item['short_title'];?></a></dd>
                <?php $index++; ?><?php }?><?php endif;?>
            </dl>
        <?php $index++; ?><?php }?><?php endif;?>
    </div>
    <div class="blank"></div>
<?php }?>