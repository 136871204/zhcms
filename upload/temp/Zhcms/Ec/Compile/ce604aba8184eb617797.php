<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($goods_article_list){?>
<div class="box">
    <div class="box_1">
        <h3><span>相关文章</span></h3>
        <div class="boxCenterList RelaArticle">
            <?php if(is_array($goods_article_list)):?><?php $index=0; ?><?php  foreach($goods_article_list as $article){ ?>
                <a href="<?php echo $article['url'];?>" title="<?php echo $article['title'];?>"><?php echo $article['short_title'];?></a><br />
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>
<div class="blank5"></div>
<?php }?>