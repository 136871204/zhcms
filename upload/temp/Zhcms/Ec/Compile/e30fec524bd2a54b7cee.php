<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="box">
    <div class="box_1">
        <h3><span>留言板</span></h3>
        <div class="boxCenterList">
            <?php if(is_array($msg_lists)):?><?php $index=0; ?><?php  foreach($msg_lists as $msg){ ?>
                <div class="f_l" style="width:100%; position:relative;">
                    [<b><?php echo $msg['msg_type'];?></b>]&nbsp;<?php echo $msg['user_name'];?>
                    <?php if($msg['user_name'] == ''){?>
                        匿名用户
                    <?php }?>
                    ：
                    <?php if($msg['id_value'] > 0){?>
                        评论了
                        <b>
                            <a class="f3" href="<?php echo $msg['goods_url'];?>" target="_blank" title="<?php echo $msg['goods_name'];?>">
                                <?php echo $msg['goods_name'];?>
                            </a>
                        </b>
                    <?php }?>
                    <font class="f4"><?php echo $msg['msg_title'];?></font> (<?php echo $msg['msg_time'];?>)
                    <?php if($msg['comment_rank'] > 0){?>
                        <img style="position:absolute; right:0px;" src="http://www.works.com/template/v4/ec/common/style/images/stars<?php echo $msg['comment_rank'];?>.gif" alt="<?php echo $msg['comment_rank'];?>" />
                    <?php }?>
                </div>
                <div class="msgBottomBorder word">
                    <?php echo $msg['msg_content'];?><br/>
                    <?php if($msg['re_content']){?>
                        <font class="f2"><?php echo $lang['shopman_reply'];?></font><br />
                        <?php echo $msg['re_content'];?>
                    <?php }?>
                </div>
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>
<div class="blank5"></div>