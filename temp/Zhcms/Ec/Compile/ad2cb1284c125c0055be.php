<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><ul>
    <?php if(is_array($new_articles)):?><?php $index=0; ?><?php  foreach($new_articles as $article){ ?>
    <li>
	   [<a href="<?php echo $article['cat_url'];?>"><?php echo $article['cat_name'];?></a>] 
       <a href="<?php echo $article['url'];?>" title="<?php echo $article['title'];?>">
            <?php echo $article['short_title'];?>
       </a>
	</li>
    <?php $index++; ?><?php }?><?php endif;?>
</ul>