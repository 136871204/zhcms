<!DOCTYPE html>
<html>
<head>
    <title>EC演示</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <zhjs/>
    <link href="__STATIC__/ecimage/themes/default/style.css" rel="stylesheet" type="text/css" />
    <script src='__STATIC__/js/utils.js'></script>
    <script src='__STATIC__/js/transport.js'></script>
    <script type="text/javascript" src="__STATIC__/js/selectzone.js"></script>
    <script src='__STATIC__/js/common.js'></script>
    <script src='__STATIC__/js/json2.js'></script>
    
    <script>
    function $id(element) {
      return document.getElementById(element);
    }
    //切屏--是按钮，_v是内容平台，_h是内容库
    function reg(str){
      var bt=$id(str+"_b").getElementsByTagName("h2");
      for(var i=0;i<bt.length;i++){
        bt[i].subj=str;
        bt[i].pai=i;
        bt[i].style.cursor="pointer";
        bt[i].onclick=function(){
          $id(this.subj+"_v").innerHTML=$id(this.subj+"_h").getElementsByTagName("blockquote")[this.pai].innerHTML;
          for(var j=0;j<$id(this.subj+"_b").getElementsByTagName("h2").length;j++){
            var _bt=$id(this.subj+"_b").getElementsByTagName("h2")[j];
            var ison=j==this.pai;
            _bt.className=(ison?"":"h2bg");
          }
        }
      }
      $id(str+"_h").className="none";
      $id(str+"_v").innerHTML=$id(str+"_h").getElementsByTagName("blockquote")[0].innerHTML;
    }
    </script>
</head>
<body>
<include file='__TEMPLATE__/ec/library/page_header.lbi'/>
<!--当前位置 start-->
<div class="block box">
    <div id="ur_here">
        <include file='__TEMPLATE__/ec/library/ur_here.lbi'/>
    </div>
</div>
<!--当前位置 end-->
<div class="blank"></div>
<div class="block clearfix">
    <!--left start-->
    <div class="AreaL">
        <include file='__TEMPLATE__/ec/library/cart.lbi'/>
        <div class="blank5"></div>
        <include file='__TEMPLATE__/ec/library/category_tree.lbi'/>
        <div class="blank5"></div>
        <include file='__TEMPLATE__/ec/library/goods_related.lbi'/>
        <include file='__TEMPLATE__/ec/library/goods_fittings.lbi'/>
        <include file='__TEMPLATE__/ec/library/goods_article.lbi'/>
        <include file='__TEMPLATE__/ec/library/goods_attrlinked.lbi'/>
        <include file='__TEMPLATE__/ec/library/history.lbi'/>
    </div>
    <!--left end-->
    <!--right start-->
    <div class="AreaR">
        <!--商品详情start-->
        <div id="goodsInfo" class="clearfix">
            <!--商品图片和相册 start-->
            <div class="imgInfo">
                <if value="pictures" >
                    <a href="javascript:;" onclick="window.open('gallery.php?id={$goods.goods_id}'); return false;">
                        <img src="{$goods.goods_img}" alt="{$goods.goods_name|htmlspecialchars:@@}"/>
                    </a>
                <else/>
                    <img src="{$goods.goods_img}" alt="{$goods.goods_name|htmlspecialchars:@@}"/>
                </if>
                <div class="blank5"></div>
                <!--相册 START-->
                <include file='__TEMPLATE__/ec/library/goods_gallery.lbi'/>
                <!--相册 END-->
                <div class="blank5"></div>
            </div>
            <!--商品图片和相册 end-->
            <div class="textInfo">
                <form action="javascript:addToCart({$goods.goods_id})" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
                    <div class="clearfix">
                        <p class="f_l">{$goods.goods_style_name}</p>
                        <p class="f_r">
                            <if value="$prev_good">
                                <a href="{$prev_good.url}"><img alt="prev" src="__STATIC__/ecimage/themes/default/images/up.gif" /></a>
                            </if>
                            <if value="$next_good">
                                <a href="{$next_good.url}"><img alt="next" src="__STATIC__/ecimage/themes/default/images/down.gif" /></a>
                            </if>
                        </p>
                    </div>
                    <ul>
                        <li class="clearfix">
                            <dd>
                                <if value="{$zh.config.ec_show_goodssn}">
                                <strong>商品货号：</strong>{$goods.goods_sn}
                                </if>
                                
                            </dd>
                            <dd class="ddR">
                                <if value="{$goods.goods_number} neq '' and {$zh.config.ec_show_goodsnumber} ">
                                    <if value="{$goods.goods_number} eq 0">
                                        <strong>库存数量：</strong>
                                        <font color='red'>缺貨</font>
                                    <else/>
                                        <strong>库存数量：</strong>
                                        {$goods.goods_number} {$goods.measure_unit}
                                    </if>
                                </if>
                                </dd>
                        </li>
                        <li class="clearfix">
                            <dd>
                                <if value='{$goods.goods_brand} neq "" and {$zh.config.ec_show_brand} ' >
                                <strong>商品品牌：</strong>
                                <a href="{$goods.goods_brand_url}" >{$goods.goods_brand}</a>
                                </if>
                            </dd>
                            <dd class="ddR">
                                <if value=' {$zh.config.ec_show_goodsweight} ' >
                                <strong>商品重量：</strong>{$goods.goods_weight}
                                </if>
                            </dd>
                        </li>
                        <li class="clearfix">
                            <dd>
                                <if value=' {$zh.config.ec_show_addtime} ' >
                                <strong>发布时间：</strong>{$goods.add_time}
                                </if>
                            </dd>
                            <dd class="ddR">
                                <!--点击数-->
                                <strong>商品点击数： </strong>{$goods.click_count}
                            </dd>
                        </li>
                        <li class="clearfix">
                            <dd class="ddL">
                                <if value='{$zh.config.ec_show_marketprice} ' >
                                <strong>市场价格：</strong><font class="market">{$goods.market_price}</font><br />
                                </if>
                                <!--本店售价-->
                                <strong>本店售价：</strong><font class="shop" id="ECS_SHOPPRICE">{$goods.shop_price_formated}</font><br />
                                <foreach from="$rank_prices" value="$rank_price" key="$key" >
                                <strong>{$rank_price.rank_name}：</strong><font class="shop" id="ECS_RANKPRICE_{$key}">{$rank_price.price}</font><br />
                                </foreach>
                            </dd>
                            <dd style="width:48%; padding-left:7px;">
                                <strong>用户评价：</strong>
                                <img src="__STATIC__/ecimage/themes/default/images/stars{$goods.comment_rank}.gif" alt="comment rank {$goods.comment_rank}" />
                            </dd>
                        </li>
                        <if value="$volume_price_list" >
                        <li class="padd">
                            <font class="f1">优惠价格：</font><br />
                            <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#aad6ff">
                                <tr>
                                    <td align="center" bgcolor="#FFFFFF"><strong>数量</strong></td>
                                    <td align="center" bgcolor="#FFFFFF"><strong>优惠价格</strong></td>
                                </tr>
                                <foreach from="$volume_price_list" value="$price_list" key="$price_key" >
                                <tr>
                                    <td align="center" bgcolor="#FFFFFF" class="shop">{$price_list.number}</td>
                                    <td align="center" bgcolor="#FFFFFF" class="shop">{$price_list.format_price}</td>
                                </tr>
                                </foreach>
                            </table>
                        </li>
                        </if>
                        <if value="{$goods.is_promote} and {$goods.gmt_end_time}" >
                        <li class="padd loop" style="margin-bottom:5px; border-bottom:1px dashed #ccc;">
                            <script src='__STATIC__/js/lefttime.js'></script>
                            <strong>促销价：</strong><font class="shop">{$goods.promote_price}</font><br />
                            <strong>剩余时间：</strong>
                            <font class="f4" id="leftTime">请稍等, 正在载入中...</font><br />
                        </li>
                        </if>
                        <li class="clearfix">
                            <dd>
                            <strong>商品总价：</strong><font id="ECS_GOODS_AMOUNT" class="shop"></font>
                            </dd>
                            <dd class="ddR">
                                <if value="{$goods.give_integral} gt 0" >
                                    <strong>购买此商品赠送：</strong><font class="f4">{$goods.give_integral} {$zh.config.ec_integral_name}</font>
                                </if>
                            </dd>`
                        </li>
                        <if value="{$goods.bonus_money}" >
                        <li class="padd loop" style="margin-bottom:5px; border-bottom:1px dashed #ccc;">
                            <strong>购买此商品可获得红包：</strong><font class="shop">{$goods.bonus_money}</font><br />
                        </li>
                        </if>
                        <li class="clearfix">
                            <dd>
                                <strong>数量：</strong>
                                <input name="number" type="text" id="number" value="1" size="4" onblur="changePrice()" style="border:1px solid #ccc; "/>
                            </dd>
                            <dd class="ddR">
                                <if value='{$zh.config.ec_use_integral} ' >
                                    <strong>购买此商品可使用：</strong><font class="f4">{$goods.integral} {$zh.config.ec_integral_name}</font>
                                </if>
                            </dd>
                        </li>
                        <if value='{$goods.is_shipping} ' >
                        <li style="height:30px;padding-top:4px;">
                          此商品为免运费商品，计算配送金额时将不计入配送费用<br />
                        </li>
                        </if>
                        <!-- {* 开始循环所有可选属性 *} -->
                        <foreach from="$specification" value="$spec" key="$spec_key" >
                        <li class="padd loop">
                            <strong>{$spec.name}:</strong><br />
                            <if value='{$spec.attr_type} eq 1 ' >
                                <if value='{$zh.config.ec_goodsattr_style} eq 1 ' >
                                    <foreach from="{$spec.values}" value="$value" key="$key" >
                                    <label for="spec_value_{$value.id}">
                                        <input type="radio" name="spec_{$spec_key}" value="{$value.id}" id="spec_value_{$value.id}" <if value='$key eq 0'>checked</if> onclick="changePrice()" />
                                        {$value.label} [<if value='$value.price gt 0'>加<elseif value='$value.price lt 0'>減</if> {$value.format_price}]
                                    </label><br />
                                    </foreach>
                                    <input type="hidden" name="spec_list" value="{$key}" />
                                <else/>
                                    <select name="spec_{$spec_key}" onchange="changePrice()">
                                    <foreach from="{$spec.values}" value="$value" key="$key" >
                                    <option label="{$value.label}" value="{$value.id}">
                                        {$value.label}
                                        <if value='$value.price gt 0'>加<elseif value='$value.price lt 0'>減</if>
                                        <if value='$value.price neq 0'>{$value.format_price}</if>
                                    </option> 
                                    </foreach>
                                    </select>
                                    <input type="hidden" name="spec_list" value="{$key}" />
                                </if>
                            <else/>
                                <foreach from="{$spec.values}" value="$value" key="$key" >
                                <label for="spec_value_{$value.id}">
                                    <input type="checkbox" name="spec_{$spec_key}" value="{$value.id}" id="spec_value_{$value.id}" onclick="changePrice()" />
                                    {$value.label} [<if value='$value.price gt 0'>加<elseif value='$value.price lt 0'>減</if> {$value.format_price}] 
                                </label><br />
                                </foreach>
                                <input type="hidden" name="spec_list" value="{$key}" />
                            </if>
                        </li>
                        </foreach>
                        <!-- {* 结束循环可选属性 *} -->
                        <li class="padd">
                            <a href="javascript:addToCart({$goods.goods_id})"><img src="__STATIC__/ecimage/themes/default/images/bnt_cat.gif" /></a>
                            <a href="javascript:collect({$goods.goods_id})"><img src="__STATIC__/ecimage/themes/default/images/bnt_colles.gif" /></a>
                            <a href="user.php?act=affiliate&goodsid={$goods.goods_id}"><img src='__STATIC__/ecimage/themes/default/images/bnt_recommend.gif'/></a>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
        <div class="blank"></div>
        <!--商品详情end-->
        <!--商品描述，商品属性 START-->
        <div class="box">
            <div class="box_1">
                <h3 style="padding:0 5px;">
                    <div id="com_b" class="history clearfix">
                        <h2>简单描述</h2>
                        <h2 class="h2bg">宝贝属性</h2>
                    </div>
                </h3>
                <div id="com_v" class="boxCenterList RelaArticle"></div>
                <div id="com_h">
                    <blockquote>
                    {$goods.goods_desc}
                    </blockquote>
                    <blockquote>
                        <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#dddddd">
                            <foreach from="$properties" value="$property_group" key="$key" >
                                <tr>
                                  <th colspan="2" bgcolor="#FFFFFF">{$key|htmlspecialchars:@@}</th>
                                </tr>
                                <foreach from="$property_group" value="$property" >
                                <tr>
                                    <td bgcolor="#FFFFFF" align="left" width="30%" class="f1">[{$property.name|htmlspecialchars:@@}]</td>
                                    <td bgcolor="#FFFFFF" align="left" width="70%">{$property.value}</td>
                                </tr>
                                </foreach>
                            </foreach>
                        </table>
                    </blockquote>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        reg("com");
        </script>
        <div class="blank"></div>
        <include file='__TEMPLATE__/ec/library/goods_tags.lbi'/>
        <include file='__TEMPLATE__/ec/library/bought_goods.lbi'/>
        <include file='__TEMPLATE__/ec/library/bought_note_guide.lbi'/>
        <include file='__TEMPLATE__/ec/library/comments.lbi'/>
        
    </div>
    
</div>
<div class="blank5"></div>
<!--帮助-->
<div class="block">
  <div class="box">
   <div class="helpTitBg clearfix">
   <include file='__TEMPLATE__/ec/library/help.lbi'/>
   </div>
  </div>
</div>
<div class="blank"></div>
<!--帮助-->
<!--友情链接 start-->
<if value="$img_links or $txt_links" >
<div id="bottomNav" class="box">
    <div class="box_1">
        <div class="links clearfix">
            <foreach from="$img_links" value="$link"  >
            <a href="{$link.url}" target="_blank" title="{$link.name}"><img src="{$link.logo}" alt="{$link.name}" border="0" /></a>
            </foreach>
            <if value=" $txt_links" >
                <foreach from="$txt_links" value="$link"  >
                [<a href="{$link.url}" target="_blank" title="{$link.name}">{$link.name}</a>]
                </foreach>
            </if>
        </div>
    </div>
</div>
</if>
<!--友情链接 end-->
<div class="blank"></div>
<include file='__TEMPLATE__/ec/library/page_footer.lbi'/>
<script>
var goodsId = {$goods_id};
/**
 * 点选可选属性或改变数量时修改商品价格的函数
 */
function changePrice()
{
    var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);
    var qty = document.forms['ECS_FORMBUY'].elements['number'].value;
    var params = "id="+ goodsId + '&attr=' + attr + '&number=' + qty ;
    var ajaxurl=CONTROL +"&is_ajax=1&m=price";
      
    //var ajaxurl=CONTROL +"&is_ajax=1&m=price&id="+ goodsId + '&attr=' + attr + '&number=' + qty;
    Ajax.call(ajaxurl, params, changePriceResponse, 'GET', 'JSON');
}
/**
 * 接收返回的信息
 */
function changePriceResponse(res)
{
    if (res.err_msg.length > 0)
    {
        alert(res.err_msg);
    }else
    {
        document.forms['ECS_FORMBUY'].elements['number'].value = res.qty;
    
        if (document.getElementById('ECS_GOODS_AMOUNT'))
            document.getElementById('ECS_GOODS_AMOUNT').innerHTML = res.result;
    }
}
</script>
</body>
</html>