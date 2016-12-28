<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="box">
    <div class="box_1">
        <h3>
            <span>商品列表</span>
            <form method="GET" class="sort" name="listform">
                显示方式：
                <a href="javascript:;" onClick="javascript:display_mode('list')"><img src="http://www.works.com/template/v4/ec/common/style/images/display_mode_list<?php if($pager['display'] == 'list'){?>_act<?php }?>.gif" alt="<?php echo $lang['display']['list'];?>"/></a>
                <a href="javascript:;" onClick="javascript:display_mode('grid')"><img src="http://www.works.com/template/v4/ec/common/style/images/display_mode_grid<?php if($pager['display'] == 'grid'){?>_act<?php }?>.gif" alt="<?php echo $lang['display']['grid'];?>"/></a>
                <a href="javascript:;" onClick="javascript:display_mode('text')"><img src="http://www.works.com/template/v4/ec/common/style/images/display_mode_text<?php if($pager['display'] == 'text'){?>_act<?php }?>.gif" alt="<?php echo $lang['display']['text'];?>"/></a>&nbsp;&nbsp;
                <select name="sort" style="border:1px solid #ccc;">
                    <?php if(isset($lang['exchange_sort']) && !empty($lang['exchange_sort'])):$arr["options"]=$lang['exchange_sort'];$arr["selected"]=$pager['sort'];echo html_options($arr);endif;
?>
                </select>
                <select name="order" style="border:1px solid #ccc;">
                    <?php if(isset($lang['order']) && !empty($lang['order'])):$arr["options"]=$lang['order'];$arr["selected"]=$pager['order'];echo html_options($arr);endif;
?>
                </select>
                <input type="image" name="imageField" src="http://www.works.com/template/v4/ec/common/style/images/bnt_go.gif" alt="go"/>
                <input type="hidden" name="category" value="<?php echo $category;?>" />
                <input type="hidden" name="display" value="<?php echo $pager['display'];?>" id="display" />
                <input type="hidden" name="integral_min" value="<?php echo $integral_min;?>" />
                <input type="hidden" name="integral_max" value="<?php echo $integral_max;?>" />
                <input type="hidden" name="page" value="<?php echo $pager['page'];?>" />
                <input type="hidden" name="a" value="<?php echo APP;?>" />
                <input type="hidden" name="c" value="<?php echo CONTROL;?>" />
                <input type="hidden" name="m" value="<?php echo METHOD;?>" />
            </form>
        </h3>
        <form name="compareForm" method="post">
            <?php if($pager['display'] == 'list'){?>
                <div class="goodsList">
                    <?php if(is_array($goods_list)):?><?php $index=0; ?><?php  foreach($goods_list as $goods_list_foreach=>$goods){ ?>
                        <ul class="clearfix bgcolor"<?php if($goods_list_foreach % 2 == 0){?>id=""<?php  }else{ ?>id="bgcolor"<?php }?>>
                            <li class="thumb"><a href="<?php echo $goods['url'];?>"><img src="<?php echo $goods['goods_thumb'];?>" alt="<?php echo $goods['goods_name'];?>" /></a></li>
                            <li class="goodsName">
                                <a href="<?php echo $goods['url'];?>" class="f6">
                                <?php if($goods['goods_style_name']){?>
                                <?php echo $goods['goods_style_name'];?><br />
                                <?php  }else{ ?>
                                <?php echo $goods['goods_name'];?><br />
                                <?php }?>
                                </a>
                                <?php if($goods['goods_brief']){?>
                                商品简单描述：<?php echo $goods['goods_brief'];?><br />
                                <?php }?>
                            </li>
                            <li>
                                消耗积分：<font class="shop_s"><?php echo $goods['exchange_integral'];?></font>
                            </li>
                        </ul>
                    <?php $index++; ?><?php }?><?php endif;?>
                </div>
            <?php  }elseif($pager['display'] == 'grid'){ ?>
                <div class="centerPadd">
                    <div class="clearfix goodsBox" style="border:none;">
                        <?php if(is_array($goods_list)):?><?php $index=0; ?><?php  foreach($goods_list as $goods){ ?>
                            <?php if($goods['goods_id']){?>
                                <div class="goodsItem">
                                    <a href="<?php echo $goods['url'];?>">
                                        <img src="<?php echo $goods['goods_thumb'];?>" alt="<?php echo $goods['goods_name'];?>" class="goodsimg" />
                                    </a><br />
                                    <p><a href="<?php echo $goods['url'];?>" title="<?php echo $goods['name'];?>"><?php echo $goods['goods_name'];?></a></p>
                                    消耗积分：
                                    <font class="shop_s"><?php echo $goods['exchange_integral'];?></font>
                                    <br />
                                </div>
                            <?php }?>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </div>
                </div>
            <?php  }elseif($pager['display'] == 'text'){ ?>
                <div class="goodsList">
                    <?php if(is_array($goods_list)):?><?php $index=0; ?><?php  foreach($goods_list as $goods_list_foreach=>$goods){ ?>
                        <ul class="clearfix bgcolor"<?php if($goods_list_foreach % 2 == 0){?>id=""<?php  }else{ ?>id="bgcolor"<?php }?>>
                            <li class="goodsName">
                                <a href="<?php echo $goods['url'];?>" class="f6 f5">
                                <?php if($goods['goods_style_name']){?>
                                <?php echo $goods['goods_style_name'];?><br />
                                <?php  }else{ ?>
                                <?php echo $goods['goods_name'];?><br />
                                <?php }?>
                                </a>
                                <?php if($goods['goods_brief']){?>
                                商品简单描述：<?php echo $goods['goods_brief'];?><br />
                                <?php }?>
                            </li>
                            <li>
                                消耗积分：<font class="shop_s"><?php echo $goods['exchange_integral'];?></font>
                            </li>
                        </ul>
                    <?php $index++; ?><?php }?><?php endif;?>
                </div>
            <?php }?>
        </form>
    </div>
</div>
<div class="blank5"></div>
<script type="text/javascript">
window.onload = function()
{
    Compare.init();
    fixpng();
}
var button_compare = '';
</script>