<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="<?php echo $keywords;?>" />
    <meta name="Description" content="<?php echo $description;?>" />

    <title><?php echo $page_title;?></title>
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" href="animated_favicon.gif" type="image/gif" />
    <link href="<?php echo $ecs_css_path;?>" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/common.js"></script>
    <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/action.js"></script>
    <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/mzp-packed-me.js"></script>
    <script type="text/javascript">
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

    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--<link href="http://www.works.com/template/v3/ec/common/qq/images/qq.css" rel="stylesheet" type="text/css" />-->
<script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/jquery.json.js"></script>

<script type="text/javascript">
var process_request = "正在处理您的请求...";
</script>
<script type="text/javascript">
//设为首页 www.ecmoban.com
function SetHome(obj,url){
    try{
        obj.style.behavior='url(#default#homepage)';
       obj.setHomePage(url);
   }catch(e){
       if(window.netscape){
          try{
              netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
         }catch(e){
              alert("抱歉，此操作被浏览器拒绝！\n\n请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为'true'");
          }
       }else{
        alert("抱歉，您所使用的浏览器无法完成此操作。\n\n您需要手动将【"+url+"】设置为首页。");
       }
  }
}

//收藏本站 bbs.ecmoban.com
function AddFavorite(title, url) {
  try {
      window.external.addFavorite(url, title);
  }
catch (e) {
     try {
       window.sidebar.addPanel(title, url, "");
    }
     catch (e) {
         alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
     }
  }
}

</script>

<!--顶部导航-->
<div class="top_nav">
    <script type="text/javascript">
          //初始化主菜单
            function sw_nav(obj,tag)
            {
     
                var DisSub = document.getElementById("DisSub_"+obj);
                var HandleLI= document.getElementById("HandleLI_"+obj);
                if(tag==1)
                {
                    DisSub.style.display = "block";
             
                    
                }
                else
                {
                    DisSub.style.display = "none";
                
                }
     
            }
     
            function test()
            {
                
            }
            
            /*function checkSearchForm()
            {
                if(document.getElementById('keyword').value)
                {
                    return true;
                }
                else
                {
                    alert("<?php echo $lang['no_keywords'];?>");
                    return false;
                }
            }*/
    </script>
    <div class="block">
        <!--顶部微博微信弹出区域 start-->
        <ul class="top_bav_l">
            <li class="top_sc">
                <a href="javascript:void(0);" onclick="AddFavorite('我的网站',location.href)">收藏本站</a>
            </li>
            <li>关注我们：</li>
            <?php if(C("EC_WEIBO_LINK")||C("EC_QQ_WEIBO_LINK")){?>
                <li style="border:none" class="menuPopup"  onMouseOver="sw_nav(1,1);" onMouseOut="sw_nav(1,0);">
                    <a id="HandleLI_1" href="javascript:;" title="微博" class="attention" ></a> 
                    <div id=DisSub_1 class="top_nav_box  top_weibo"> 
                        <?php if(C("EC_WEIBO_LINK")){?>
                        <a href="<?php echo C("EC_WEIBO_LINK");?>" target="_blank" title="新浪微博" class="top_weibo"></a>
                        <?php }?>
                        <?php if(C("EC_QQ_WEIBO_LINK")){?>
                        <a href="<?php echo C("EC_QQ_WEIBO_LINK");?>" target="_blank" title="QQ微博" class="top_qq"></a> 
                        <?php }?>
                    </div>
                </li>
            <?php }?>
            <?php if(C("EC_WEICHAT_QR")){?>
            <li class="menuPopup" onMouseOver="sw_nav(2,1);" onMouseOut="sw_nav(2,0);">
                <a id="HandleLI_2" href="javascript:;" title="微信" class="top_weixin"></a> 
                <div id="DisSub_2" class="weixinBox" style="display: none;"> 
                    <img src="<?php echo C("EC_WEICHAT_QR");?>" style="width:150px; height:150px;  background:#0000CC" width="150" height="150"/> 
                </div>
            </li>
            <?php }?>
        </ul>
        <!--顶部微博微信弹出区域 end-->
        
        <div class="header_r">
            <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/transport_jquery.js"></script>
            <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/utils.js"></script>
            <font id="ECS_MEMBERZONE">
            <?php 
            insert_member_info();
            ?>
            </font>
            
            <?php if($navigator_list['top']){?>
                <?php if(is_array($navigator_list['top'])):?><?php $nav_top_list=0; ?><?php  foreach($navigator_list['top'] as $nav){ ?>
                    <a href="<?php echo $nav['url'];?>" <?php if($nav['opennew'] == 1){?> target="_blank" <?php }?>><?php echo $nav['name'];?></a>
                    <?php if($nav_top_list <> count($navigator_list['top'])-1){?>
                    |
                    <?php }?>
                <?php $nav_top_list++; ?><?php }?><?php endif;?>
            <?php }?>
            
        </div>
        
    </div>
</div>
<div class=" block header_bg" style="margin-bottom: 0px;">
    <div class="clear_f"></div>
    <div class="header_top logo_wrap">
        <a class="logo_new" href="<?php echo U('ec/EcIndex/index');?>"><img src="http://www.works.com/template/v3/ec/common/images/logo.gif" /></a>
        <div class="ser_n">
            <form id="searchForm" class="searchBox" name="searchForm" method="get" action="" onSubmit="">
                <input type="hidden" name="a" value="ec" />
                <input type="hidden" name="c" value="EcSearch" />
                <input type="hidden" name="m" value="index" />
                <div class="search-table"> 
                    <span class="cur" data-type="1">宝贝</span> 
                    <em class="arrow"></em> 
                </div>
                <span class="ipt1">
                    <em class="i_search"></em>
                    <input name="keywords" type="text" id="keyword" value="<?php echo $search_keywords;?>" class="searchKey" />
                </span>
                <span class="ipt2">
                    <input type="submit"  name="imageField" class="fm_hd_btm_shbx_bttn" value="搜 索"/>
                </span>
            </form>
            <div class="clear_f"></div>
            <ul class="searchType none_f">
            </ul>
        </div>
        <ul class="cart_info">
            <li id="ECS_CARTINFO">
                <span class="carts_num none_f">
                <?php 
                insert_cart_info();
                ?>
                </span>
                <em class="i_cart">&nbsp;</em>
                <a href="<?php echo U('ec/EcFlow/index');?>">查看购物车</a>
            </li>
            <li>
                <a href="<?php echo U('ec/EcUser/index');?>" target="_blank"><em class="i_order">&nbsp;</em>我的订单</a>
            </li>
        </ul>
    </div>
</div>

<div style="clear:both"></div>

<div class="menu_box clearfix"> 
    <div class="block"> 
        <div class="menu">
            <a href="<?php echo U('ec/EcIndex/index');?>"<?php if($navigator_list['config']['index'] == 1){?> class="cur"<?php }?>>首页<span></span></a>
            <?php if(is_array($navigator_list['middle'])):?><?php $nav_middle_list=0; ?><?php  foreach($navigator_list['middle'] as $nav){ ?>
                <a href="<?php echo U('ec/EcCategory/index',array('id'=>$nav['cid']));?>" <?php if($nav['opennew'] == 1){?> target="_blank" <?php }?> <?php if($nav['active'] == 1){?> class="cur"<?php }?>><?php echo $nav['name'];?><span></span></a>
            <?php $nav_middle_list++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>



    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="block box">
    <div class="blank"></div>
    <div id="ur_here">
    当前位置:<?php echo $ur_here;?> 
    </div>
</div>
<div class="blank"></div>
    <div class="block clearfix">
        <!--left start-->
        <div class="AreaL">
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div id="category_tree">
    <div class="tit">所有商品分类</div>
    <dl class="clearfix" style=" overflow:hidden;" >
        <div class="box1 cate" id="cate">
            <?php $no=0; ?>
            <?php if(is_array($categories)):?><?php $index=0; ?><?php  foreach($categories as $cat){ ?>
                <h1 onclick="tab(<?php echo $no;?>)"  <?php if($no == 0){?>style="border-top:none"<?php }?>>
                    <span class="f_l">
                        <img src="http://www.works.com/template/v3/ec/common/images/btn_fold.gif" style="padding-top:10px;padding-right:6px;cursor:pointer;"/>
                    </span>
                    <a href="<?php echo $cat['url'];?>" class="  f_l"><?php echo $cat['name'];?></a>
                </h1>
                <ul style="display:none" >
                    <?php if(is_array($cat['cat_id'])):?><?php $no1=0; ?><?php  foreach($cat['cat_id'] as $child){ ?>
                        <a class="over_2" href="<?php echo $child['url'];?>"><?php echo $child['name'];?></a> 
                        <div class="clearfix">
                            <?php if(is_array($child['cat_id'])):?><?php $index=0; ?><?php  foreach($child['cat_id'] as $childer){ ?>
                                <a class="over_3" href="<?php echo $childer['url'];?>"><?php echo $childer['name'];?></a>
                            <?php $index++; ?><?php }?><?php endif;?>
                        </div>
                    <?php $no1++; ?><?php }?><?php endif;?>
                </ul>
                <div style="clear:both"></div>
                <?php $no++; ?>
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
        <div style="clear:both"></div>  
    </dl>
</div>
<div class="blank"></div>
<script type="text/javascript">
obj_h4 = document.getElementById("cate").getElementsByTagName("h4")
obj_ul = document.getElementById("cate").getElementsByTagName("ul")
obj_img = document.getElementById("cate").getElementsByTagName("img")
function tab(id)
{ 
    //alert(id);
	if(obj_ul.item(id).style.display == "block")
	{
		obj_ul.item(id).style.display = "none"
		obj_img.item(id).src = "http://www.works.com/template/v3/ec/common/images/btn_fold.gif"
		return false;
	}
	else(obj_ul.item(id).style.display == "none")
	{
		obj_ul.item(id).style.display = "block"
		obj_img.item(id).src = "http://www.works.com/template/v3/ec/common/images/btn_unfold.gif"
	}
}
</script>
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="box" id='history_div'>
    <div class="box_1">
        <h3><span>浏览历史</span></h3>
        <div class="boxCenterList clearfix" id='history_list'>
            <?php  
                echo insert_history();
            ?>
        </div>
    </div>
</div>
<div class="blank5"></div>

        </div>
        <!--left end-->
        
        <!--right start-->
        <div class="AreaR">
            <!--商品详情start-->
            <div id="goodsInfo" class="clearfix">
                <!--商品图片和相册 start-->
                <div class="imgInfo">
                    <a href="<?php echo $pictures[0]['img_url'];?>" id="zoom1" class="MagicZoom MagicThumb" title="<?php echo $goods['goods_style_name'];?>">
                        <img src="<?php echo $pictures[0]['img_url'];?>" alt="<?php echo $goods['goods_name'];?>" width="360px;" height="360px"/>
                    </a>
                    <div class="blank5"></div>
                    <div style="text-align:center; position:relative; width:100%;">
                        <?php if($prev_good){?>
                        <a href="<?php echo $prev_good['url'];?>"><img style="position: absolute; left:0;" alt="prev" src="http://www.works.com/template/v3/ec/common/images/up.gif" /></a>
                        <?php }?>
                        <a href="javascript:;" onclick="window.open('gallery.php?id=<?php echo $goods['goods_id'];?>'); return false;">
                            <img alt="zoom" src="http://www.works.com/template/v3/ec/common/images/zoom.gif" />
                        </a>
                        <?php if($next_good){?>
                        <a href="<?php echo $next_good['url'];?>">
                            <img style="position: absolute;right:0;"  alt="next" src="http://www.works.com/template/v3/ec/common/images/down.gif" />
                        </a>
                        <?php }?>
                    </div>
                    <div class="blank"></div>
                    <!--相册 START-->
                    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($pictures){?>
    <div class="picture" id="imglist">
        <?php if(is_array($pictures)):?><?php $picture_no=0; ?><?php  foreach($pictures as $picture){ ?>
            <?php if($picture_no < 1){?>
                <a  href="<?php echo $picture['img_url'];?>" rel="zoom1"  rev="<?php echo $picture['img_url'];?>" title="{$picture.img_desc">
                    <img src="<?php if($picture['thumb_url']){?><?php echo $picture['thumb_url'];?><?php  }else{ ?><?php echo $picture['img_url'];?><?php }?>" alt="<?php echo $goods['goods_name'];?>" class="onbg" />
                </a>
            <?php  }else{ ?>
                <a  href="<?php echo $picture['img_url'];?>" rel="zoom1" rev="<?php echo $picture['img_url'];?>" title="<?php echo $picture['img_desc'];?>">
                    <img src="<?php if($picture['thumb_url']){?><?php echo $picture['thumb_url'];?><?php  }else{ ?><?php echo $picture['img_url'];?><?php }?>" alt="<?php echo $goods['goods_name'];?>" class="autobg" />
                </a>
            <?php }?>
        <?php $picture_no++; ?><?php }?><?php endif;?>
    </div>
<?php }?>
<script type="text/javascript">
	mypicBg();
</script>
                </div>
                <!--商品图片和相册 end-->
                
                <div class="textInfo">
                    <form action="javascript:addToCart(<?php echo $goods['goods_id'];?>)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
                        <h1 class="clearfix" >
                            <?php echo $goods['goods_style_name'];?>
                        </h1>
                        <?php if($promotion){?>
                            <div class="padd">
                                <?php if(is_array($promotion)):?><?php $index=0; ?><?php  foreach($promotion as $promotion_key=>$item){ ?>
                                    本商品正在进行
                                    <?php if($item['type'] == 'snatch'){?>
                                        <a href="snatch.php" title="夺宝奇兵" style="font-weight:100; color:#f69; text-decoration:none;">[夺宝奇兵]</a>
                                    <?php  }elseif($item['type'] == 'group_buy'){ ?>
                                        <a href="auction.php" title="团购活动" style="font-weight:100; color:#f69; text-decoration:none;">[团购活动]</a>
                                    <?php  }elseif($item['type'] == 'auction'){ ?>
                                        <a href="auction.php" title="拍卖活动" style="font-weight:100; color:#f69; text-decoration:none;">[拍卖活动]</a>
                                    <?php  }elseif($item['type'] == 'favourable'){ ?>
                                        <a href="activity.php" title="优惠活动" style="font-weight:100; color:#f69; text-decoration:none;">[优惠活动]</a>
                                    <?php }?>
                                    <a href="<?php echo $item['url'];?>" title="<?php echo $lang[$item]['type'];?> <?php echo $item['act_name'];?><?php echo $item['time'];?>" style="font-weight:100; color:#f69;">
                                        <?php echo $item['act_name'];?>
                                    </a><br />
                                <?php $index++; ?><?php }?><?php endif;?>
                            </div>
                        <?php }?>
                        <ul class="ul2 clearfix">
                            <li class="clearfix" style="width:100%">
                                <dd>
                                    <!--本店售价-->
                                    <strong>宝贝价格</strong>
                                    <font class="shop" id="ECS_SHOPPRICE"><?php echo $goods['shop_price_formated'];?></font> 
                                    <?php if(C("ec_show_marketprice")){?>
                                        <font class="market"><?php echo $goods['market_price'];?></font> 
                                    <?php }?>
                                </dd>
                            </li>
                            <?php if(C("ec_show_goodssn")){?>
                                <li class="clearfix">
                                    <dd>
                                        <strong>商品货号：</strong><?php echo $goods['goods_sn'];?>
                                    </dd>
                                </li>
                            <?php }?>

                            <?php if($goods['goods_number'] <> '' and C("ec_show_goodsnumber")){?>
                                <li class="clearfix">
                                    <dd>
                                        <?php if($goods['goods_number'] == 0){?>
                                            <strong>宝贝数量：</strong>
                                            <font color='red'>缺货</font>
                                        <?php  }else{ ?>
                                            <strong>宝贝数量：</strong>
                                            <?php echo $goods['goods_number'];?> <?php echo $goods['measure_unit'];?>
                                        <?php }?>
                                    </dd>
                                </li>
                            <?php }?>
                            <?php if($goods['goods_brand'] <> '' and  C("ec_show_brand")){?>
                                <li class="clearfix">
                                    <dd>
                                        <strong>商品品牌：</strong>
                                        <a href="<?php echo $goods['goods_brand_url'];?>" ><?php echo $goods['goods_brand'];?></a>
                                    </dd>
                                </li>
                            <?php }?>
                            <?php if(C("ec_show_goodsweight")){?>
                                <li class="clearfix">
                                    <dd>
                                        <strong>商品重量：</strong><?php echo $goods['goods_weight'];?>
                                    </dd>
                                </li>
                            <?php }?>
                            <?php if(C("ec_show_addtime")){?>
                                <li class="clearfix">
                                    <dd>
                                        <strong>上架时间：</strong><?php echo $goods['add_time'];?>
                                    </dd>
                                </li>
                            <?php }?>
                            <li class="clearfix">
                                <dd>
                                    <!--点击数-->
                                    <strong>商品点击数：</strong><?php echo $goods['click_count'];?>
                                </dd>
                            </li>
                        </ul>
                        <ul>
                            <?php if($volume_price_list){?>
                                <li class="padd">
                                    <font class="f1">优惠价格：</font><br />
                                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#aad6ff">
                                        <tr>
                        					<td align="center" bgcolor="#FFFFFF"><strong>数量</strong></td>
                        					<td align="center" bgcolor="#FFFFFF"><strong>优惠价格</strong></td>
                        				</tr>
                                        <?php if(is_array($volume_price_list)):?><?php $index=0; ?><?php  foreach($volume_price_list as $price_key=>$price_list){ ?>
                                        <tr>
                        					<td align="center" bgcolor="#FFFFFF" class="shop"><?php echo $price_list['number'];?></td>
                        					<td align="center" bgcolor="#FFFFFF" class="shop"><?php echo $price_list['format_price'];?></td>
                        				</tr>
                                        <?php $index++; ?><?php }?><?php endif;?>
                                    </table>
                                </li>
                            <?php }?>
                            <?php if($goods['is_promote'] and $goods['gmt_end_time']){?>
                                <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/lefttime.js"></script>
                                <li class="padd loop" style="margin-bottom:5px; border-bottom:1px dashed #ccc;">
                                    <strong>促销价：</strong>
                                    <font class="shop"><?php echo $goods['promote_price'];?></font><br />
                                    <strong>剩余时间：</strong>
                                    <font class="f4" id="leftTime">请稍等, 正在载入中...</font><br />
                                </li>
                            <?php }?>
                            <li class="clearfix">
                                <dd >
                                    <?php if(is_array($rank_prices)):?><?php $index=0; ?><?php  foreach($rank_prices as $rank_price_key=>$rank_price){ ?>
                                        <?php echo $rank_price['rank_name'];?>：
                                        <font class="f1" id="ECS_RANKPRICE_<?php echo $rank_price_key;?>" style=" padding-right:10px;"><?php echo $rank_price['price'];?></font> 
                                    <?php $index++; ?><?php }?><?php endif;?>
                                    <a href="javascript:collect(<?php echo $goods['goods_id'];?>)">收藏</a> |  
                                    <?php if($affiliate['on']){?>
                                    <a href="user.php?act=affiliate&goodsid=<?php echo $goods['goods_id'];?>" >推荐</a>
                                    <?php }?>
                                </dd>
                            </li>
                            <?php if($goods['give_integral'] > 0){?>
                                <li class="clearfix">
                                    <dd >
                                        <strong>购买此商品赠送：</strong>
                                        <font class="f4"><?php echo $goods['give_integral'];?> <?php echo $points_name;?></font>
                                    </dd>
                                </li>
                            <?php }?>
                            <?php if($goods['bonus_money']){?>
                                <li class="padd loop" style="margin-bottom:5px; border-bottom:1px dashed #ccc;">
                                    <strong>购买此商品可获得红包：</strong>
                                    <font class="shop"><?php echo $goods['bonus_money'];?></font><br />
                                </li>
                            <?php }?>
                            <?php if(C("ec_use_integral")){?>
                                <li class="clearfix">
                                    <dd>
                                        <strong>购买此商品可使用：</strong>
                                        <font class="f4"><?php echo $goods['integral'];?> <?php echo $points_name;?></font>
                                    </dd>
                                </li>
                            <?php }?>
                            <!-- 为免运费商品则显示-->
                            <?php if($goods['is_shipping']){?>
                                <li style="height:30px;padding-top:4px;">
                                    此商品为免运费商品，计算配送金额时将不计入配送费用<br />
                                </li>
                            <?php }?>
                        </ul>
                        <ul class="bnt_ul">
                            <!--  开始循环所有可选属性 -->
                            <?php if(is_array($specification)):?><?php $index=0; ?><?php  foreach($specification as $spec_key=>$spec){ ?>
                                <li class="padd loop">
                                    <strong><?php echo $spec['name'];?>：</strong>
                                    <!-- 判断属性是复选还是单选  -->
                                    <?php if($spec['attr_type'] == 1){?>
                                        <?php if(C("ec_goodsattr_style")== 1){?>
                                            <?php if(is_array($spec['values'])):?><?php $index=0; ?><?php  foreach($spec['values'] as $key=>$value){ ?>
                                            <label for="spec_value_<?php echo $value['id'];?>">
                                                <input type="radio" name="spec_<?php echo $spec_key;?>" value="<?php echo $value['id'];?>" id="spec_value_<?php echo $value['id'];?>" <?php if($key == 0){?>checked<?php }?> onclick="changePrice()" />
                                                <?php echo $value['label'];?> [<?php if($value['price'] > 0){?>加<?php  }elseif($value['price'] < 0){ ?>减<?php }?> <?php echo $value['format_price'];?>] 
                                            </label>
                                            <?php $index++; ?><?php }?><?php endif;?>
                                            <input type="hidden" name="spec_list" value="<?php echo $key;?>" />
                                        <?php  }else{ ?>
                                            <select name="spec_<?php echo $spec_key;?>" onchange="changePrice()" >
                                                <?php if(is_array($spec['values'])):?><?php $index=0; ?><?php  foreach($spec['values'] as $key=>$value){ ?>
                                                <option label="<?php echo $value['label'];?>" value="<?php echo $value['id'];?>">
                                                    <?php echo $value['label'];?> <?php if($value['price'] > 0){?>加<?php  }elseif($value['price'] < 0){ ?>减<?php }?><?php if($value['price'] <> 0){?><?php echo $value['format_price'];?><?php }?>
                                                </option>
                                                <?php $index++; ?><?php }?><?php endif;?>
                                            </select>
                                            <input type="hidden" name="spec_list" value="<?php echo $key;?>" />
                                        <?php }?>
                                    <?php  }else{ ?>
                                        <?php if(is_array($spec['values'])):?><?php $index=0; ?><?php  foreach($spec['values'] as $key=>$value){ ?>
                                            <label for="spec_value_<?php echo $value['id'];?>">
                                                <input type="checkbox" name="spec_<?php echo $spec_key;?>" value="<?php echo $value['id'];?>" id="spec_value_<?php echo $value['id'];?>" onclick="changePrice()" />
                                                <?php echo $value['label'];?> [<?php if($value['price'] > 0){?>加<?php  }elseif($value['price'] < 0){ ?>减<?php }?> <?php echo $value['format_price'];?>] 
                                            </label>
                                        <?php $index++; ?><?php }?><?php endif;?>
                                        <input type="hidden" name="spec_list" value="<?php echo $key;?>" />
                                    <?php }?>
                                </li>
                            <?php $index++; ?><?php }?><?php endif;?>
                            <!-- 结束循环可选属性  -->
                            
                            <li class="clearfix">
                                <dd>
                                    <strong>购买数量：</strong>
                                    <input name="number" type="text" id="number" value="1" size="4" onblur="changePrice()" style="border:1px solid #ccc; "/> 
                                    <strong>商品总价：</strong><font id="ECS_GOODS_AMOUNT" class="f1"></font>
                                </dd>
                            </li>
                            
                            <li class="padd">
                                <a href="javascript:addToCart(<?php echo $goods['goods_id'];?>)">
                                    <img src="http://www.works.com/template/v3/ec/common/images/goumai2.gif" />
                                </a>
                            </li>
                        </ul>
                    </form>
                </div>
                
            </div>
            <div class="blank"></div>
            <!--商品详情end-->
            <!--商品描述，商品属性 START-->
            <div class="box">
                <div style="padding:0 0px;">
                    <div id="com_b" class="history clearfix">
                        <h2>商品描述</h2>
                        <h2 class="h2bg">商品属性</h2>
                        <h2 class="h2bg">商品标签</h2>
                        <h2 class="h2bg">相关商品</h2>
                        <?php if($package_goods_list){?>
                        <h2 class="h2bg" style="color:red;">超值礼包</h2>
                        <?php }?>
                    </div>
                </div>
                <div class="box_1">
                    <div id="com_v" class="  " style="padding:6px;"></div>
                    <div id="com_h">
                        <blockquote>
                            <?php echo $goods['goods_desc'];?>
                        </blockquote>
                        <blockquote>
                            <table class="table" width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#dddddd">
                                <?php if(is_array($properties)):?><?php $index=0; ?><?php  foreach($properties as $property_group_key=>$property_group){ ?>
                                    <tr>
                                        <th colspan="2" bgcolor="#FFFFFF"><?php echo $property_group_key;?></th>
                                    </tr>
                                    <?php if(is_array($property_group)):?><?php $index=0; ?><?php  foreach($property_group as $property){ ?>
                                        <tr>
                                            <td bgcolor="#FFFFFF" align="left" width="30%" class="f1">[<?php echo $property['name'];?>]</td>
                                            <td bgcolor="#FFFFFF" align="left" width="70%"><?php echo $property['value'];?></td>
                                        </tr>
                                    <?php $index++; ?><?php }?><?php endif;?>
                                <?php $index++; ?><?php }?><?php endif;?>
                            </table>
                        </blockquote>
                        <blockquote>
                            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="box">
    <div class="box_1">
        <h3><span class="text">商品标签</span></h3>
        <div class="boxCenterList clearfix ie6">
            <form name="tagForm" action="javascript:;" onSubmit="return submitTag(this)" id="tagForm">
                <p id="ECS_TAGS" style="margin-bottom:5px;">
                    <!-- 标记 -->
                    <?php if(is_array($tags)):?><?php $index=0; ?><?php  foreach($tags as $tag){ ?>
                        <a href="search.php?keywords=<?php echo htmlspecialchars($tag['tag_words']);?>" style="color:#006ace; text-decoration:none; margin-right:5px;">
                            <?php echo htmlspecialchars($tag['tag_words']);?>[<?php echo $tag['tag_count'];?>]
                        </a>
                    <?php $index++; ?><?php }?><?php endif;?>
                </p>
                <p>
                    <input type="text" name="tag" id="tag" class="inputBg" size="35" />
                    <input type="submit" value="添 加" class="bnt_blue" style="border:none;" />
                    <input type="hidden" name="goods_id" value="<?php echo $goods['goods_id'];?>"  />
                </p>
                <script type="text/javascript">
                    function submitTag(frm)
                    {
                        try
                        {
                            var tag = frm.elements['tag'].value;
                            var idx = frm.elements['goods_id'].value;
                            
                            if (tag.length > 0 && parseInt(idx) > 0)
                            {
                                Ajax.call('user.php?act=add_tag', "id=" + idx + "&tag=" + tag, submitTagResponse, "POST", "JSON");
                            }
                        }
                        catch (e) { alert(e); }
                        
                        return false;
                    }
                    
                    function submitTagResponse(result)
                    {
                        var div = document.getElementById('ECS_TAGS');
                        
                        if (result.error > 0)
                        {
                            alert(result.message);
                        }
                        else
                        {
                            try
                            {
                                div.innerHTML = '';
                                var tags = result.content;
                                
                                for (i = 0; i < tags.length; i++)
                                {
                                    div.innerHTML += '<a href="search.php?keywords='+tags[i].word+'" style="color:#006ace; text-decoration:none; margin-right:5px;">' +tags[i].word + '[' + tags[i].count + ']<\/a>&nbsp;&nbsp; ';
                                }
                            }
                            catch (e) { alert(e); }
                        }
                    }
                </script>
            </form>
        </div>
    </div>
</div>
<div class="blank5"></div>
                        </blockquote>
                        <blockquote>
                            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($related_goods){?>
<div class="box">
    <div class="box_1">
        <h3><span>相关商品</span></h3>
        <div class="boxCenterList clearfix">
        <?php if(is_array($related_goods)):?><?php $index=0; ?><?php  foreach($related_goods as $releated_goods_data){ ?>
            <ul class="clearfix">
                <li class="goodsimg">
                    <a href="<?php echo $releated_goods_data['url'];?>">
                        <img src="/upload/ec/<?php echo $releated_goods_data['goods_thumb'];?>" alt="<?php echo $releated_goods_data['goods_name'];?>" class="B_blue" />
                    </a>
                </li>
                <li>
                    <a href="<?php echo $releated_goods_data['url'];?>" title="<?php echo $releated_goods_data['goods_name'];?>">
                        <?php echo $releated_goods_data['short_name'];?>
                    </a><br />
    
                    <?php if($releated_goods_data['promote_price'] <> 0){?>
                    促销价：<font class="f1"><?php echo $releated_goods_data['formated_promote_price'];?></font>
                    <?php  }else{ ?>
                    本店售价：<font class="f1"><?php echo $releated_goods_data['shop_price'];?></font>
                    <?php }?>
                </li>
            </ul>
        <?php $index++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>
<div class="blank5"></div>
<?php }?>
                        </blockquote>
                        <?php if($package_goods_list){?>
                            <blockquote>
                                <?php if(is_array($package_goods_list)):?><?php $index=0; ?><?php  foreach($package_goods_list as $package_goods){ ?>
                                    <strong><?php echo $package_goods['act_name'];?></strong><br />
                                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#dddddd">
                                        <tr>
                                            <td bgcolor="#FFFFFF">
                                                <?php if(is_array($package_goods['goods_list'])):?><?php $index=0; ?><?php  foreach($package_goods['goods_list'] as $goods_list){ ?>
                                                    <a href="goods.php?id=<?php echo $goods_list['goods_id'];?>" target="_blank">
                                                        <font class="f1"><?php echo $goods_list['goods_name'];?></font>
                                                    </a> &nbsp;&nbsp;X <?php echo $goods_list['goods_number'];?><br />
                                                <?php $index++; ?><?php }?><?php endif;?>
                                            </td>
                                            <td bgcolor="#FFFFFF">
                                                <strong>原  价：</strong><font class="market"><?php echo $package_goods['subtotal'];?></font><br />
                                                <strong>礼包价：</strong><font class="shop"><?php echo $package_goods['package_price'];?></font><br />
                                                <strong>节  省：</strong><font class="shop"><?php echo $package_goods['saving'];?></font><br />
                                            </td>
                                            <td bgcolor="#FFFFFF">
                                                <a href="javascript:addPackageToCart(<?php echo $package_goods['act_id'];?>)" style="background:transparent">
                                                    <img src="http://www.works.com/template/v3/ec/common/images/bnt_buy_1.gif" alt="加入购物车" />
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                <?php $index++; ?><?php }?><?php endif;?>
                            </blockquote>
                        <?php }?>
                        
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                reg("com");
            </script>
            <div class="blank"></div>
            <!--商品描述，商品属性 END-->
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div id="ECS_BOUGHT">
<?php
    //TODO;这里还没有做好
    $insert_bought_notes_arr=array('id'=>$_GET['id']);
    /* 商品购买记录 */
    $sql = 'SELECT u.user_name, og.goods_number, oi.add_time, IF(oi.order_status IN (2, 3, 4), 0, 1) AS order_status ' .
           'FROM ' . 
                    $GLOBALS['ec_globals']['ecs']->table('ec_order_info') . ' AS oi LEFT JOIN ' . 
                    $GLOBALS['ec_globals']['ecs']->table('ec_users') . ' AS u ON oi.user_id = u.user_id, ' . 
                    $GLOBALS['ec_globals']['ecs']->table('ec_order_goods') . ' AS og ' .
           'WHERE 
                    oi.order_id = og.order_id AND ' . time() . ' - oi.add_time < 2592000 AND 
                    og.goods_id = ' . $insert_bought_notes_arr['id'] . ' ORDER BY oi.add_time DESC LIMIT 5';
    $bought_notes = M()->getAll($sql);
    if(!empty($bought_notes))
    {
        foreach ($bought_notes as $key => $val)
        {
            $bought_notes[$key]['add_time'] = local_date("Y-m-d G:i:s", $val['add_time']);
        }
    }
    $sql = 'SELECT count(*) ' .
           'FROM ' . 
                    $GLOBALS['ec_globals']['ecs']->table('ec_order_info') . ' AS oi LEFT JOIN ' . 
                    $GLOBALS['ec_globals']['ecs']->table('ec_users') . ' AS u ON oi.user_id = u.user_id, ' . 
                    $GLOBALS['ec_globals']['ecs']->table('ec_order_goods') . ' AS og ' .
           'WHERE oi.order_id = og.order_id AND ' . time() . ' - oi.add_time < 2592000 AND og.goods_id = ' . $insert_bought_notes_arr['id'];
    $bought_notes_count = M()->getOne($sql,'count(*)');
    
    /* 商品购买记录分页样式 */
    $bought_notes_pager = array();
    $bought_notes_pager['page']         = $bought_notes_page = 1;
    $bought_notes_pager['size']         = $bought_notes_size = 5;
    $bought_notes_pager['record_count'] = $bought_notes_count;
    $bought_notes_pager['page_count']   = $bought_notes_page_count = ($bought_notes_count > 0) ? intval(ceil($bought_notes_count / $bought_notes_size)) : 1;;
    $bought_notes_pager['page_first']   = "javascript:gotoBuyPage(1,$arr[id])";
    $bought_notes_pager['page_prev']    = $bought_notes_page > 1 ? "javascript:gotoBuyPage(" .($bought_notes_page-1). ",$arr[id])" : 'javascript:;';
    $bought_notes_pager['page_next']    = $bought_notes_page < $bought_notes_page_count ? 'javascript:gotoBuyPage(' .($bought_notes_page + 1) . ",$arr[id])" : 'javascript:;';
    $bought_notes_pager['page_last']    = $bought_notes_page < $bought_notes_page_count ? 'javascript:gotoBuyPage(' .$bought_notes_page_count. ",$arr[id])"  : 'javascript:;';

    $bought_notes;
    $bought_notes_pager;

    
    
    //p($bought_notes);die;
?>
    <div class="box">
        <div class="box_1">
            <h3>
                <span class="text">购买记录</span>
                (近期成交数量<font class="f1"><?php echo $bought_notes_pager['record_count'];?></font>)
            </h3>
            <div class="boxCenterList">
                <?php if($bought_notes){?>
                    TODO:bought_note_guide.lbi1;
                <?php  }else{ ?>
                    还没有人购买过此商品 
                <?php }?>
                <!--翻页 start-->
                <div id="buy_pagebar" class="f_r" style="margin-top:10px">
                    <form name="selectPageForm" action="" method="get">
                        <input type="hidden" name="m" value="<?php echo $current_form['current_meth'];?>"/>
                        <input type="hidden" name="c" value="<?php echo $current_form['current_control'];?>"/>
                        <input type="hidden" name="a" value="<?php echo $current_form['current_app'];?>"/>
                        <?php if($pager['styleid'] == 0){?>
                            <div id="buy_pager">
                                总计<?php echo $bought_notes_pager['record_count'];?>个记录，共<?php echo $bought_notes_pager['page_count'];?>页。 
                                <span> 
                                    <a href="<?php echo $bought_notes_pager['page_first'];?>">第一页</a> 
                                    <a href="<?php echo $bought_notes_pager['page_prev'];?>">上一页</a> 
                                    <a href="<?php echo $bought_notes_pager['page_next'];?>">下一页</a> 
                                    <a href="<?php echo $bought_notes_pager['page_last'];?>">最末页</a> 
                                </span>
                                <?php if(is_array($bought_notes_pager['search'])):?><?php $index=0; ?><?php  foreach($bought_notes_pager['search'] as $key=>$item){ ?>
                                    <input type="hidden" name="<?php echo $key;?>" value="<?php echo $item;?>" />
                                <?php $index++; ?><?php }?><?php endif;?>
                            </div>
                        <?php  }else{ ?>
                            TODO:TODO:bought_note_guide.lbi2;
                        <?php }?>
                    </form>
                    <script type="Text/Javascript" language="JavaScript">
                    function selectPage(sel)
                    {
                        sel.form.submit();
                    }
                    </script>
                </div>
                <!--翻页 END-->
                
            </div>
        </div>
    </div>
    <div class="blank5"></div>
</div>
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($bought_goods){?>
    <div class="box">
        <div class="box_1">
            <h3><span class="text">购买过此商品的人还购买过</span></h3>
            <div class="boxCenterList clearfix ie6" style="padding:2px;">
            <?php if(is_array($bought_goods)):?><?php $index=0; ?><?php  foreach($bought_goods as $bought_goods_data){ ?>
                <div class="goodsItem" style="padding: 10px 2px 15px 2px;">
                    <a href="<?php echo $bought_goods_data['url'];?>">
                        <img src="<?php echo $bought_goods_data['goods_thumb'];?>" alt="<?php echo $bought_goods_data['goods_name'];?>"  class="goodsimg" />
                    </a><br />
                    <p><a href="<?php echo $bought_goods_data['url'];?>" title="<?php echo $bought_goods_data['goods_name'];?>"><?php echo $bought_goods_data['short_name'];?></a></p>
                    <?php if($bought_goods_data['promote_price'] <> 0){?>
                        <font class="shop_s"><?php echo $bought_goods_data['formated_promote_price'];?></font>
                    <?php  }else{ ?>
                        <font class="shop_s"><?php echo $bought_goods_data['shop_price'];?></font>
                    <?php }?> 
                </div>
            <?php $index++; ?><?php }?><?php endif;?>
            </div>
        </div>
    </div>
    <div class="blank5"></div>
<?php }?>
            <?php
            $comments_arr['type']=$type;
            $comments_arr['id']=$id;
            ?>
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/transport_jquery.js"></script>
<script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/utils.js"></script>

<?php
$comments_cmt = assign_comment($comments_arr['id'],          $comments_arr['type']);
$comments=$comments_cmt['comments'];
$comments_pager=$comments_cmt['pager'];
$comments_pager['current_app']=APP;
$comments_pager['current_control']=CONTROL;
$comments_pager['current_meth']='index';
?>

<!--用户评论 START-->
<div class="box">
    <div class="box_1">
        <h3>
            <span class="text">用户评论</span>
            (共<font class="f1"><?php echo $comments_pager['record_count'];?></font>条评论)
        </h3>
        <div class="boxCenterList clearfix" style="height:1%;">
            <ul class="comments">
                <?php if($comments){?>
                TODO:comments.lbi---1;
                <?php  }else{ ?>
                <li>暂时还没有任何用户评论</li>
                <?php }?>
            </ul>
            <!--翻页 start-->
            <div id="pagebar" class="f_r">
                <form name="selectPageForm" action="" method="get">
                    <input type="hidden" name="m" value="<?php echo $comments_pager['current_meth'];?>"/>
                    <input type="hidden" name="c" value="<?php echo $comments_pager['current_control'];?>"/>
                    <input type="hidden" name="a" value="<?php echo $comments_pager['current_app'];?>"/>
                    <?php if($comments_pager['styleid'] == 0){?>
                        <div id="pager">
                            总计<?php echo $comments_pager['record_count'];?>个记录，共<?php echo $comments_pager['page_count'];?>页。
                            <span> 
                                <a href="<?php echo $comments_pager['page_first'];?>">第一页</a> 
                                <a href="<?php echo $comments_pager['page_prev'];?>">上一页</a> 
                                <a href="<?php echo $comments_pager['page_next'];?>">下一页</a> 
                                <a href="<?php echo $comments_pager['page_last'];?>">最末页</a> 
                            </span>
                            <?php if(is_array($comments_pager['search'])):?><?php $index=0; ?><?php  foreach($comments_pager['search'] as $key=>$item){ ?>
                                <input type="hidden" name="<?php echo $key;?>" value="<?php echo $item;?>" />
                            <?php $index++; ?><?php }?><?php endif;?>
                        </div>
                    <?php  }else{ ?>
                        TODO:comments.lbi---2;
                    <?php }?>
                </form>
                <script type="Text/Javascript" language="JavaScript">
                    function selectPage(sel)
                    {
                        sel.form.submit();
                    }
                </script>
            </div>
            <!--翻页 END-->
            <div class="blank5"></div>
            <!--评论表单 start-->
            <div class="commentsList">
                <form action="javascript:;" onsubmit="submitComment(this)" method="post" name="commentForm" id="commentForm">
                    <table width="710" border="0" cellspacing="5" cellpadding="0">
                        <tr>
                            <td width="64" align="right">用户名：</td>
                            <td width="631">
                                <?php if($_SESSION['ec_user_name']){?>
                                    <?php echo $_SESSION['ec_user_name'];?>
                                <?php  }else{ ?>
                                    匿名用户
                                <?php }?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">E-mail：</td>
                            <td>
                                <input type="text" name="email" id="email"  maxlength="100" value="<?php echo $_SESSION['ec_email'];?>" class="inputBorder"/>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">评价等级：</td>
                            <td>
                                <input name="comment_rank" type="radio" value="1" id="comment_rank1" /> <img src="http://www.works.com/template/v3/ec/common/images/stars1.gif" />
                                <input name="comment_rank" type="radio" value="2" id="comment_rank2" /> <img src="http://www.works.com/template/v3/ec/common/images/stars2.gif" />
                                <input name="comment_rank" type="radio" value="3" id="comment_rank3" /> <img src="http://www.works.com/template/v3/ec/common/images/stars3.gif" />
                                <input name="comment_rank" type="radio" value="4" id="comment_rank4" /> <img src="http://www.works.com/template/v3/ec/common/images/stars4.gif" />
                                <input name="comment_rank" type="radio" value="5" checked="checked" id="comment_rank5" /> <img src="http://www.works.com/template/v3/ec/common/images/stars5.gif" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="top">评论内容：</td>
                            <td>
                                <textarea name="content" class="inputBorder" style="height:50px; width:620px;"></textarea>
                                <input type="hidden" name="cmt_type" value="<?php echo $comment_type;?>" />
                                <input type="hidden" name="id" value="<?php echo $id;?>" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <!-- 判断是否启用验证码-->
                                <?php if($enabled_captcha){?>
                                    <div style="padding-left:15px; text-align:left; float:left;">
                                        验证码：<input type="text" name="captcha"  class="inputBorder" style="width:50px; margin-left:5px;"/>
                                        <img src="<?php echo U('ec/EcCaptcha/index');?>&<?php echo $rand;?>" alt="captcha" onClick="this.src='<?php echo U('ec/EcCaptcha/index');?>&'+Math.random()" class="captcha"/>
                                    </div>
                                <?php }?>
                                <input name="" type="submit"  value="评论咨询" class="f_r bnt_blue_1" style=" margin-right:8px;"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <!--评论表单 end-->
            
            
        </div>
    </div>
</div>
<div class="blank5"></div>
<script type="text/javascript">
var cmt_empty_username = "请输入您的用户名称";
var cmt_empty_email = "请输入您的电子邮件地址";
var cmt_error_email = "电子邮件地址格式不正确";
var cmt_empty_content = "您没有输入评论的内容";
var captcha_not_null = "验证码不能为空!";
var cmt_invalid_comments = "无效的评论内容!";

/**
 * 提交评论信息
*/
function submitComment(frm)
{
    var cmt = new Object;

    //cmt.username        = frm.elements['username'].value;
    cmt.email           = frm.elements['email'].value;
    cmt.content         = frm.elements['content'].value;
    cmt.type            = frm.elements['cmt_type'].value;
    cmt.id              = frm.elements['id'].value;
    cmt.enabled_captcha = frm.elements['enabled_captcha'] ? frm.elements['enabled_captcha'].value : '0';
    cmt.captcha         = frm.elements['captcha'] ? frm.elements['captcha'].value : '';
    cmt.rank            = 0;

    for (i = 0; i < frm.elements['comment_rank'].length; i++)
    {
        if (frm.elements['comment_rank'][i].checked)
        {
            cmt.rank = frm.elements['comment_rank'][i].value;
        }
    }

    //  if (cmt.username.length == 0)
    //  {
    //     alert(cmt_empty_username);
    //     return false;
    //  }

    if (cmt.email.length > 0)
    {
        if (!(Utils.isEmail(cmt.email)))
        {
            alert(cmt_error_email);
            return false;
        }
    }
    else
    {
        alert(cmt_empty_email);
        return false;
    }

    if (cmt.content.length == 0)
    {
        alert(cmt_empty_content);
        return false;
    }

    if (cmt.enabled_captcha > 0 && cmt.captcha.length == 0 )
    {
        alert(captcha_not_null);
        return false;
    }

    Ajax.call('comment.php', 'cmt=' + $.toJSON(cmt), commentResponse, 'POST', 'JSON');
    return false;
}

/**
 * 处理提交评论的反馈信息
*/
function commentResponse(result)
{
    if (result.message)
    {
        alert(result.message);
    }
    
    if (result.error == 0)
    {
        var layer = document.getElementById('ECS_COMMENT');
        
        if (layer)
        {
            layer.innerHTML = result.content;
        }
    }
}
</script>
        </div>
        <!--right end-->
    </div>
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="footer">
    <div class="foot_con">
        <div class="f_list service_info">
            <div class="kefu"> 
                <span class="tel_ico"></span>
                <p class="f20_f">4000-021-758</p>
                <p class="f14_f mt4_f">模板堂客服热线</p>
            </div>
            <ol class="business">
                <li>周一至周日：09:00-22:00</li>
            </ol>
        </div>
        <?php if($helps){?>
            <?php if(is_array($helps)):?><?php $foo=0; ?><?php  foreach($helps as $help_cat){ ?>
                <?php if($foo < 3){?>
                    <div  class="f_list">
                        <h4><?php echo $help_cat['cat_name'];?></h4>
                        <ul>
                        <?php if(is_array($help_cat['article'])):?><?php $index=0; ?><?php  foreach($help_cat['article'] as $item){ ?>
                            <li><a target="_blank" href="<?php echo $item['url'];?>" title="<?php echo htmlspecialchars($item['title']);?>" ><?php echo $item['short_title'];?></a></li>
                        <?php $foo++; ?><?php }?><?php endif;?>
                        </ul>
                    </div>
                <?php }?>
            <?php $index++; ?><?php }?><?php endif;?>
        <?php }?>
        <div class="f_list">
            <h4>关注我们</h4>
            <ul>
                <li class="sina_attention"> <a href="http://weibo.com/ECMBT/home?topnav=1&wvr=5 " target="_blank"><span class="i_sina">&nbsp;</span>新浪微博</a></li>
                <li><a href="#" target="_blank"><span class="i_qzone">&nbsp;</span>QQ空间</a></li>
                <li><a href="#" target="_blank"><span class="i_tx">&nbsp;</span>腾讯微博</a></li>
            </ul>
        </div>
        <div class="f_list qr-code">
            <h4>模板堂微信服务号</h4>
            <img src="http://www.works.com/template/v3/ec/common/images/weixinfuwuhao.png" alt="模板堂服务号二维码"/> 
        </div>
        <div class="f_list weixin_code">
            <h4>模板堂客户端下载</h4>
            <a class="client_pic" href="http://www.ecmoban.com/topic/ecmoban_app/" target="_blank"></a>
        </div>
        <div class="blank"></div>
            <!--友情链接 start--> 
            <?php if($img_links  or $txt_links){?>
            <div >
                <dl class="sncompany box_1" style="text-align:left; border-left:none; border-right:none; background:none;">
                    <dd class=""> 
                        <span>友情链接：</span>
                        <?php if($txt_links){?>
                            <!--开始文字类型的友情链接--> 
                            <?php if(is_array($txt_links)):?><?php $index=0; ?><?php  foreach($txt_links as $bottom=>$link){ ?>
                                <a href="<?php echo $link['url'];?>" target="_blank" title="<?php echo $link['name'];?>"><?php echo $link['name'];?></a>
                                <?php if(count($txt_links) <> ($bottom+1)){?>
                                <span>|</span>
                                <?php }?>
                            <?php $index++; ?><?php }?><?php endif;?>
                            <!--结束文字类型的友情链接--> 
                        <?php }?>
                    </dd>
                </dl>
            </div>
            <?php }?>
            <!--友情链接 end--> 
            <div class="blank"></div>
            <!--底部导航 start-->
            <div id="bottomNav" class="rolling" >
                <h4 class="f_links">底部导航：</h4>
                <ul id="link_slide">
                    <li>
                        <?php if($navigator_list['bottom']){?>
                            <?php if(is_array($navigator_list['bottom'])):?><?php $index=0; ?><?php  foreach($navigator_list['bottom'] as $nav_bottom_list=>$nav){ ?>
                            <a href="<?php echo $nav['url'];?>"  <?php if($nav['opennew'] == 1){?> target="_blank" <?php }?>><?php echo $nav['name'];?></a> 
                            <?php $index++; ?><?php }?><?php endif;?>
                        <?php }?>
                    </li>
                </ul>
            </div>
            <!--底部导航 end-->
            
            <!--版权 start-->
            <div class="text" >
                <?php echo $shop_address;?> 
                
                <!-- 客服电话--> 
                <?php if($service_phone){?>
                Tel: <?php echo $service_phone;?> 
                <?php }?>
                <!-- 结束客服电话 --> 
                <!-- 邮件 --> 
                <?php if($service_email){?>
                E-mail: <?php echo $service_email;?><br />
                <?php }?>
                <!-- 结束邮件 --> 
                
                <?php if(is_array($qq)):?><?php $index=0; ?><?php  foreach($qq as $im){ ?>
                    <?php if(!empty($im)){?>
                        <a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?php echo $im;?>&amp;Site=<?php echo $shop_name;?>&amp;Menu=yes" target="_blank">
                            <img src="http://wpa.qq.com/pa?p=1:<?php echo $im;?>:4" height="16" border="0" alt="QQ" /> <?php echo $im;?>
                        </a> 
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
                
                <?php if(is_array($ww)):?><?php $index=0; ?><?php  foreach($ww as $im){ ?>
                    <?php if(!empty($im)){?>
                        <a href="http://amos1.taobao.com/msg.ww?v=2&uid=<?php echo escape($im,u8_url);?>&s=2" target="_blank">
                            <img src="http://amos1.taobao.com/online.ww?v=2&uid=<?php echo escape($im,u8_url);?>&s=2" width="16" height="16" border="0" alt="淘宝旺旺" /><?php echo $im;?>
                        </a> 
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
                
                <?php if(is_array($ym)):?><?php $index=0; ?><?php  foreach($ym as $im){ ?>
                    <?php if(!empty($im)){?>
                        <a href="http://edit.yahoo.com/config/send_webmesg?.target=<?php echo $im;?>n&.src=pg" target="_blank">
                            <img src="../images/yahoo.gif" width="18" height="17" border="0" alt="Yahoo Messenger" /> <?php echo $im;?>
                        </a> 
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
                
                <?php if(is_array($msn)):?><?php $index=0; ?><?php  foreach($msn as $im){ ?>
                    <?php if(!empty($im)){?>
                        <img src="../images/msn.gif" width="18" height="17" border="0" alt="MSN" /> 
                        <a href="msnim:chat?contact=<?php echo $im;?>"><?php echo $im;?></a> 
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
                
                <?php if(is_array($skype)):?><?php $index=0; ?><?php  foreach($skype as $im){ ?>
                    <?php if(!empty($im)){?>
                        <img src="http://mystatus.skype.com/smallclassic/<?php echo escape($im,url);?>" alt="Skype" />
                        <a href="skype:<?php echo escape($im,url);?>?call"><?php echo $im;?></a> 
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
                
            </div>
            <div class="record">
                <?php echo $copyright;?>
                <?php if($icp_number){?>
                ICP备案证书号:<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo $icp_number;?></a> 
                <?php }?>
                &nbsp; <a href="#" target="_blank">电信与信息服务业务经营许可证100798号</a>
                &nbsp; <a href="#" target="_blank">企业法人营业执照</a>
                &nbsp; 京ICP备11031139号&nbsp; 京公网安备110108006045&nbsp;<br/>
                    客服邮箱：kf@mobantang.com&nbsp;&nbsp;客服电话：4000-021-758&nbsp; 文明办网文明上网举报电话：010-0000000 
                    &nbsp; <a href="#" target="_blank">违法不良信息举报中心</a>
            </div>
            <div class="blank10"></div>
            <div align="center">
                <a href=" http://www.ecmoban.com" target="_blank"><img src="http://www.works.com/template/v3/ec/common/images/ecmoban.gif" alt="ECShop模板" /></a>
            </div>
    </div>
</div>
</body>
</html>