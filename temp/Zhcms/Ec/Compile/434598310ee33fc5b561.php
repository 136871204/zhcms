<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($best_goods){?>
    <?php if($cat_rec_sign <> 1){?>
        <div class="box">
            <div class="box_2 centerPadd">
                <div class="itemTit" id="itemBest">
                    <?php if($cat_rec[1]){?>
                        <h2>
                            <a href="javascript:void(0)" onclick="change_tab_style('itemBest', 'h2', this);get_cat_recommend(1, 0);">
                                全部商品
                            </a>
                        </h2>
                        <?php if(is_array($cat_rec[1])):?><?php $index=0; ?><?php  foreach($cat_rec[1] as $rec_data){ ?>
                            <h2 class="h2bg">
                                <a href="javascript:void(0)" onclick="change_tab_style('itemBest', 'h2', this);get_cat_recommend(1, <?php echo $rec_data['cat_id'];?>)">
                                    <?php echo $rec_data['cat_name'];?>
                                </a>
                            </h2>
                        <?php $index++; ?><?php }?><?php endif;?>
                    <?php }?>
                </div>
                <div id="show_best_area" class="clearfix goodsBox">
                    <?php }?>
                    <?php if(is_array($best_goods)):?><?php $index=0; ?><?php  foreach($best_goods as $goods){ ?>
                        <div class="goodsItem">
                            <span class="best"></span>
                            <a href="<?php echo $goods['url'];?>">
                                <img src="<?php echo $goods['thumb'];?>" alt="<?php echo $goods['name'];?>" class="goodsimg" />
                            </a><br />
                            <p><a href="<?php echo $goods['url'];?>" title="<?php echo $goods['name'];?>"><?php echo $goods['short_style_name'];?></a></p>
                            <font class="f1">
                                <?php if($goods['promote_price'] <> ''){?>
                                    <?php echo $goods['promote_price'];?>
                                <?php  }else{ ?>
                                    <?php echo $goods['shop_price'];?>
                                <?php }?>
                            </font>
                        </div>
                    <?php $index++; ?><?php }?><?php endif;?>
                    <div class="more">
                        <a href="<?php echo U('ec/EcSearch/index');?>&intro=best">
                            <img src="http://www.metacms.com/template/v5/ec/common/style/images/more.gif" />
                        </a>
                    </div>
                    <?php if($cat_rec_sign <> 1){?>
                </div>
            </div>
        </div>
        <div class="blank5"></div>
    <?php }?>
<?php }?>