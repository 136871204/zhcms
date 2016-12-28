<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($myprice['is_end'] == false){?>
    <div class="box">
        <div class="box_1">
             <h3><span>我要出价</span></h3>
             <div class="boxCenterList">
                <form action="javascript:bid()" method="post" name="formBid" id="formBid">
                    我的积分：
                    <?php echo $myprice['pay_points'];?><br />
                    出价：
                    <input type="hidden" name="snatch_id" value="<?php echo $id;?>" />
                    <input name="price" type="text" class="inputBg" />
                    <input type="submit" name="Submit" class="bnt_blue_1" value="我要出价" style="vertical-align:middle;" />
                </form>
             </div>
        </div>
    </div>
    <div class="blank5"></div>
    <div class="box">
        <div class="box_1">
            <h3><span>我的出价</span></h3>
            <div class="boxCenterList">
                <?php if(is_array($myprice['bid_price'])):?><?php $index=0; ?><?php  foreach($myprice['bid_price'] as $item){ ?>
                    <?php echo $item['price'];?>
                    <?php if($item['is_only']){?>
                        (唯一价格)
                    <?php }?>
                    <br/>
                <?php $index++; ?><?php }?><?php endif;?>
            </div>
        </div>
    </div>
    <div class="blank5"></div>
<?php  }else{ ?>
    TODO:snatch.lbi---1;
<?php }?>