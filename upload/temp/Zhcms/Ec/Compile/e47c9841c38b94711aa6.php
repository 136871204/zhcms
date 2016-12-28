<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!-- 开始循环属性关联的商品-->
<?php if(is_array($attribute_linked)):?><?php $index=0; ?><?php  foreach($attribute_linked as $linked){ ?>
    <?php if($linked['goods']){?>
        <div class="box">
            <div class="box_1">
                <h3><span title="<?php echo $linked['title'];?>"><?php echo $linked['title'];?></span></h3>
                <div class="boxCenterList clearfix">
                    <?php if(is_array($linked['goods'])):?><?php $index=0; ?><?php  foreach($linked['goods'] as $linked_goods_data){ ?>
                    <ul class="clearfix">
                        <li class="goodsimg">
                            <a href="<?php echo $linked_goods_data['url'];?>" target="_blank">
                                <img src="<?php echo $linked_goods_data['goods_thumb'];?>" alt="<?php echo $linked_goods_data['name'];?>" class="B_blue" />
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $linked_goods_data['url'];?>" target="_blank" title="<?php echo $goods['linked_goods_data_name'];?>">
                                <?php echo $linked_goods_data['short_name'];?>
                            </a><br />
                            宝贝价格<font class="f1"><?php echo $linked_goods_data['shop_price'];?></font><br />
                        </li>
                    </ul>
                    <?php $index++; ?><?php }?><?php endif;?>
                </div>
            </div>
        </div>
    <?php }?>
<?php $index++; ?><?php }?><?php endif;?>
