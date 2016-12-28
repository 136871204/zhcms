<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="box">
    <div class="box_1">
        <h3>
            <span>商品列表</span><a name='goods_list'></a>
            <form method="GET" class="sort" name="listform">
                显示方式：
                <a href="javascript:;" onClick="javascript:display_mode('list')"><img src="http://www.works.com/template/v4/ec/common/style/images/display_mode_list<?php if($pager['display'] == 'list'){?>_act<?php }?>.gif" alt="<?php echo $lang['display']['list'];?>"/></a>
                <a href="javascript:;" onClick="javascript:display_mode('grid')"><img src="http://www.works.com/template/v4/ec/common/style/images/display_mode_grid<?php if($pager['display'] == 'grid'){?>_act<?php }?>.gif" alt="<?php echo $lang['display']['grid'];?>"/></a>
                <a href="javascript:;" onClick="javascript:display_mode('text')"><img src="http://www.works.com/template/v4/ec/common/style/images/display_mode_text<?php if($pager['display'] == 'text'){?>_act<?php }?>.gif" alt="<?php echo $lang['display']['text'];?>"/></a>&nbsp;&nbsp;
                <a href="http://www.works.com/index.php?a=Ec&c=EcCategory&m=index&category=<?php echo $category;?>&display=<?php echo $pager['display'];?>&brand=<?php echo $brand_id;?>&price_min=<?php echo $price_min;?>&price_max=<?php echo $price_max;?>&filter_attr=<?php echo $filter_attr;?>&page=<?php echo $pager['page'];?>&sort=goods_id&order=<?php if($pager['sort'] == 'goods_id' && $pager['order'] == 'DESC'){?>ASC<?php  }else{ ?>DESC<?php }?>#goods_list"><img src="http://www.works.com/template/v4/ec/common/style/images/goods_id_<?php if($pager['sort'] == 'goods_id'){?><?php echo $pager['order'];?><?php  }else{ ?>default<?php }?>.gif" alt=""/></a>
                <a href="http://www.works.com/index.php?a=Ec&c=EcCategory&m=index&category=<?php echo $category;?>&display=<?php echo $pager['display'];?>&brand=<?php echo $brand_id;?>&price_min=<?php echo $price_min;?>&price_max=<?php echo $price_max;?>&filter_attr=<?php echo $filter_attr;?>&page=<?php echo $pager['page'];?>&sort=shop_price&order=<?php if($pager['sort'] == 'shop_price' && $pager['order'] == 'ASC'){?>DESC<?php  }else{ ?>ASC<?php }?>#goods_list"/><img src="http://www.works.com/template/v4/ec/common/style/images/shop_price_<?php if($pager['sort'] == 'shop_price'){?><?php echo $pager['order'];?><?php  }else{ ?>default<?php }?>.gif" alt=""/></a>
                <a href="http://www.works.com/index.php?a=Ec&c=EcCategory&m=index&category=<?php echo $category;?>&display=<?php echo $pager['display'];?>&brand=<?php echo $brand_id;?>&price_min=<?php echo $price_min;?>&price_max=<?php echo $price_max;?>&filter_attr=<?php echo $filter_attr;?>&page=<?php echo $pager['page'];?>&sort=last_update&order=<?php if($pager['sort'] == 'last_update' && $pager['order'] == 'DESC'){?>ASC<?php  }else{ ?>DESC<?php }?>#goods_list"/><img src="http://www.works.com/template/v4/ec/common/style/images/last_update_<?php if($pager['sort'] == 'last_update'){?><?php echo $pager['order'];?><?php  }else{ ?>default<?php }?>.gif" alt=""/></a>
                <input type="hidden" name="category" value="<?php echo $category;?>" />
                <input type="hidden" name="display" value="<?php echo $pager['display'];?>" id="display" />
                <input type="hidden" name="brand" value="<?php echo $brand_id;?>" />
                <input type="hidden" name="price_min" value="<?php echo $price_min;?>" />
                <input type="hidden" name="price_max" value="<?php echo $price_max;?>" />
                <input type="hidden" name="filter_attr" value="<?php echo $filter_attr;?>" />
                <input type="hidden" name="page" value="<?php echo $pager['page'];?>" />
                <input type="hidden" name="sort" value="<?php echo $pager['sort'];?>" />
                <input type="hidden" name="order" value="<?php echo $pager['order'];?>" />
                <input type="hidden" name="a" value="<?php echo APP;?>" />
                <input type="hidden" name="c" value="<?php echo CONTROL;?>" />
                <input type="hidden" name="m" value="<?php echo METHOD;?>" />
            </form>
        </h3>
        <?php if($category > 0){?>
            <form name="compareForm" action="compare.php" method="post" onSubmit="return compareGoods(this);">
        <?php }?>
        <?php if($pager['display'] == 'list'){?>
            <div class="goodsList">
                <?php if(is_array($goods_list)):?><?php $index=0; ?><?php  foreach($goods_list as $goods_key=>$goods){ ?>
                    <ul class="clearfix bgcolor"<?php if($goods_key % 2 == 0){?>id=""<?php  }else{ ?>id="bgcolor"<?php }?>>
                        <li>
                            <br/>
                            <a href="javascript:;" id="compareLink" onClick="Compare.add(<?php echo $goods['goods_id'];?>,'<?php echo $goods['goods_name'];?>','<?php echo $goods['type'];?>')" class="f6">比较</a>
                        </li>
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
                            <?php if($show_marketprice){?>
                            市场价格：<font class="market"><?php echo $goods['market_price'];?></font><br />
                            <?php }?>
                            <?php if($goods['promote_price'] <> ''){?>
                            促销价：<font class="shop"><?php echo $goods['promote_price'];?></font><br />
                            <?php  }else{ ?>
                            本店售价：<font class="shop"><?php echo $goods['shop_price'];?></font><br />
                            <?php }?>
                        </li>
                        <li class="action">
                            <a href="javascript:collect(<?php echo $goods['goods_id'];?>);" class="abg f6">收藏该商品</a>
                            <a href="javascript:addToCart(<?php echo $goods['goods_id'];?>)"><img src="http://www.works.com/template/v4/ec/common/style/images/bnt_buy_1.gif"/></a>
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
                                <?php if($show_marketprice){?>
                                市场价格：<font class="market_s"><?php echo $goods['market_price'];?></font><br />
                                <?php }?>
                                <?php if($goods['promote_price'] <> ''){?>
                                促销价：<font class="shop_s"><?php echo $goods['promote_price'];?></font><br />
                                <?php  }else{ ?>
                                本店售价：<font class="shop_s"><?php echo $goods['shop_price'];?></font><br />
                                <?php }?>
                                <a href="javascript:collect(<?php echo $goods['goods_id'];?>);" class="f6">收藏</a> |
                                <a href="javascript:addToCart(<?php echo $goods['goods_id'];?>)" class="f6">购买</a> |
                                <a href="javascript:;" id="compareLink" onClick="Compare.add(<?php echo $goods['goods_id'];?>,'<?php echo htmlspecialchars($goods['goods_name']);?>','<?php echo $goods['type'];?>')" class="f6">比较</a>
                            </div>
                        <?php }?>
                    <?php $index++; ?><?php }?><?php endif;?>
                </div>
            </div>
        <?php  }elseif($pager['display'] == 'text'){ ?>
            <div class="goodsList">
                <?php if(is_array($goods_list)):?><?php $index=0; ?><?php  foreach($goods_list as $goods_key=>$goods){ ?>
                    <ul class="clearfix bgcolor"<?php if($goods_key % 2 == 0){?>id=""<?php  }else{ ?>id="bgcolor"<?php }?>>
                        <li style="margin-right:15px;">
                            <a href="javascript:;" id="compareLink" onClick="Compare.add(<?php echo $goods['goods_id'];?>,'<?php echo $goods['goods_name'];?>','<?php echo $goods['type'];?>')" class="f6">比较</a>
                        </li>
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
                            <?php if($show_marketprice){?>
                            市场价格：<font class="market"><?php echo $goods['market_price'];?></font><br />
                            <?php }?>
                            <?php if($goods['promote_price'] <> ''){?>
                            促销价：<font class="shop"><?php echo $goods['promote_price'];?></font><br />
                            <?php  }else{ ?>
                            本店售价：<font class="shop"><?php echo $goods['shop_price'];?></font><br />
                            <?php }?>
                        </li>
                        <li class="action">
                            <a href="javascript:collect(<?php echo $goods['goods_id'];?>);" class="abg f6">收藏该商品</a>
                            <a href="javascript:addToCart(<?php echo $goods['goods_id'];?>)"><img src="http://www.works.com/template/v4/ec/common/style/images/bnt_buy_1.gif"/></a>
                        </li>
                    </ul>
                <?php $index++; ?><?php }?><?php endif;?>
            </div>
        <?php }?>
        <?php if($category > 0){?>
            </form>
        <?php }?>
    </div>
</div>
<div class="blank5"></div>
<script type="Text/Javascript" language="JavaScript">
function selectPage(sel)
{
    sel.form.submit();
}
</script>
<script type="text/javascript">
window.onload = function()
{
    Compare.init();
    //fixpng();
}
var button_compare = '';
var exist = "您已经选择了%s";
var count_limit = "最多只能选择4个商品进行对比";
var goods_type_different = "\"%s\"和已选择商品类型不同无法进行对比";
var compare_no_goods = "您没有选定任何需要比较的商品或者比较的商品数少于 2 个。";
var btn_buy = "购买";
var is_cancel = "取消";
var select_spe = "请选择商品属性";
</script>