<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div id="mallNews"    class="  box_1">
    <h3><span>站内快讯</span></h3>
    <div class="NewsList tc  " style="border-top:none">
        <ul>
            <?php if(is_array($new_articles)):?><?php $index=0; ?><?php  foreach($new_articles as $article){ ?>
            <li>
            <a href="<?php echo $article['url'];?>" title="<?php echo htmlspecialchars($article['title']);?>"><?php echo ec_sub_str($article['short_title'],10,true);?></a>
            </li>
            <?php $index++; ?><?php }?><?php endif;?>
        </ul>
    </div>
</div>
<div  class="blank"></div>