<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="box">
    <div class="box_1">
        <h3><span>最新出价</span></h3>
        <div class="boxCenterList RelaArticle">
            <ul class="clearfix">
            <?php if(is_array($price_list)):?><?php $index=0; ?><?php  foreach($price_list as $item){ ?>
                <li><?php echo $item['user_name'];?>&nbsp;&nbsp;<?php echo $item['bid_price'];?></li>
            <?php $index++; ?><?php }?><?php endif;?>
            </ul>
        </div>
    </div>
</div>
<div class="blank5"></div>