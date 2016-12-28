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
    <?php if($cat_style){?>
        <link href="<?php echo $cat_style;?>" rel="stylesheet" type="text/css" />
    <?php }?>
    <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/jquery.json.js"></script>
    <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/common.js"></script>
    <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/global.js"></script>
    <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/compare.js"></script>
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
            <!--组合搜索 开始-->
            <?php if($brands[1] or $price_grade[1] or $filter_attr_list){?>
                <div class="box">
                    <div class="box_1">
                        <h3><span>商品筛选</span></h3>
                        <?php if($brands[1]){?>
                            <div class="screeBox">
                                <strong>品牌：</strong>
                                <?php if(is_array($brands)):?><?php $index=0; ?><?php  foreach($brands as $brand){ ?>
                                    <?php if($brand['selected']){?>
                                        <span><?php echo $brand['brand_name'];?></span>
                                    <?php  }else{ ?>
                                        <a href="<?php echo $brand['url'];?>"><?php echo $brand['brand_name'];?></a>&nbsp;
                                    <?php }?>
                                <?php $index++; ?><?php }?><?php endif;?>
                            </div>
                        <?php }?>
                        <?php if($price_grade[1]){?>
                            <div class="screeBox">
                                <strong>价格：</strong>
                                <?php if(is_array($price_grade)):?><?php $index=0; ?><?php  foreach($price_grade as $grade){ ?>
                                    <?php if($grade['selected']){?>
                                        <span><?php echo $grade['price_range'];?></span>
                                    <?php  }else{ ?>
                                        <a href="<?php echo $grade['url'];?>"><?php echo $grade['price_range'];?></a>&nbsp;
                                    <?php }?>
                                <?php $index++; ?><?php }?><?php endif;?>
                            </div>
                        <?php }?>
                        <?php if(is_array($filter_attr_list)):?><?php $index=0; ?><?php  foreach($filter_attr_list as $filter_attr){ ?>
                            <div class="screeBox">
                                <strong><?php echo $filter_attr['filter_attr_name'];?> :</strong>
                                <?php if(is_array($filter_attr['attr_list'])):?><?php $index=0; ?><?php  foreach($filter_attr['attr_list'] as $attr){ ?>
                                    <?php if($attr['selected']){?>
                                        <span><?php echo $attr['attr_value'];?></span>
                                    <?php  }else{ ?>
                                        <a href="<?php echo $attr['url'];?>"><?php echo $attr['attr_value'];?></a>&nbsp;
                                    <?php }?>
                                <?php $index++; ?><?php }?><?php endif;?>
                            </div>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </div>
                </div>
                <div class="blank"></div>
            <?php }?>
            <!--组合搜索 结束-->
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="box">
    <div class="box_1">
        <h3>
            <span>商品列表</span>
            <form method="GET" class="sort" name="listform">
            显示方式：
                <a href="javascript:;" onClick="javascript:display_mode('list')">
                    <img src="http://www.works.com/template/v3/ec/common/images/display_mode_list<?php if($pager['display'] == 'list'){?>_act<?php }?>.gif" alt=""/>
                </a>
                <a href="javascript:;" onClick="javascript:display_mode('grid')">
                    <img src="http://www.works.com/template/v3/ec/common/images/display_mode_grid<?php if($pager['display'] == 'grid'){?>_act<?php }?>.gif" alt=""/>
                </a>
                <a href="javascript:;" onClick="javascript:display_mode('text')">
                    <img src="http://www.works.com/template/v3/ec/common/images/display_mode_text<?php if($pager['display'] == 'text'){?>_act<?php }?>.gif" alt=""/>
                </a>&nbsp;&nbsp;
                
                <a href="<?php echo $script_name;?>.php?category=<?php echo $category;?>&display=<?php echo $pager['display'];?>&brand=<?php echo $brand_id;?>&price_min=<?php echo $price_min;?>&price_max=<?php echo $price_max;?>&filter_attr=<?php echo $filter_attr;?>&page=<?php echo $pager['page'];?>&sort=goods_id&order=<?php if($pager['sort'] == 'goods_id' && $pager['order'] == 'DESC'){?>ASC<?php  }else{ ?>DESC<?php }?>#goods_list">
                    <img src="http://www.works.com/template/v3/ec/common/images/goods_id_<?php if($pager['sort'] == 'goods_id'){?><?php echo $pager['order'];?><?php  }else{ ?>default<?php }?>.gif" alt=""/>
                </a>
                <a href="<?php echo $script_name;?>.php?category=<?php echo $category;?>&display=<?php echo $pager['display'];?>&brand=<?php echo $brand_id;?>&price_min=<?php echo $price_min;?>&price_max=<?php echo $price_max;?>&filter_attr=<?php echo $filter_attr;?>&page=<?php echo $pager['page'];?>&sort=shop_price&order=<?php if($pager['sort'] == 'shop_price' && $pager['order'] == 'ASC'){?>DESC<?php  }else{ ?>ASC<?php }?>#goods_list"/>
                    <img src="http://www.works.com/template/v3/ec/common/images/shop_price_<?php if($pager['sort'] == 'shop_price'){?><?php echo $pager['order'];?><?php  }else{ ?>default<?php }?>.gif" alt=""/>
                </a>
                <a href="<?php echo $script_name;?>.php?category=<?php echo $category;?>&display=<?php echo $pager['display'];?>&brand=<?php echo $brand_id;?>&price_min=<?php echo $price_min;?>&price_max=<?php echo $price_max;?>&filter_attr=<?php echo $filter_attr;?>&page=<?php echo $pager['page'];?>&sort=last_update&order=<?php if($pager['sort'] == 'last_update' && $pager['order'] == 'DESC'){?>ASC<?php  }else{ ?>DESC<?php }?>#goods_list"/>
                    <img src="http://www.works.com/template/v3/ec/common/images/last_update_<?php if($pager['sort'] == 'last_update'){?><?php echo $pager['order'];?><?php  }else{ ?>default<?php }?>.gif" alt=""/>
                </a>
                
                <input type="hidden" name="category" value="<?php echo $category;?>" />
                <input type="hidden" name="display" value="<?php echo $pager['display'];?>" id="display" />
                <input type="hidden" name="brand" value="<?php echo $brand_id;?>" />
                <input type="hidden" name="price_min" value="<?php echo $price_min;?>" />
                <input type="hidden" name="price_max" value="<?php echo $price_max;?>" />
                <input type="hidden" name="filter_attr" value="<?php echo $filter_attr;?>" />
                <input type="hidden" name="page" value="<?php echo $pager['page'];?>" />
                <input type="hidden" name="sort" value="<?php echo $pager['sort'];?>" />
                <input type="hidden" name="order" value="<?php echo $pager['order'];?>" />
            </form>
        </h3>
        
        <?php if($category > 0){?>
            <form name="compareForm" action="compare.php" method="post" onSubmit="return compareGoods(this);">
        <?php }?>
        <?php if($pager['display'] == 'list'){?>
        TODO:goods_list.lbi--1;
        <?php  }elseif($pager['display'] == 'grid'){ ?>
        TODO:goods_list.lbi--2;
        <?php  }elseif($pager['display'] == 'text'){ ?>
            <div class="goodsList">
                <?php if(is_array($goods_list)):?><?php $index=0; ?><?php  foreach($goods_list as $goods){ ?>
                    <ul class="clearfix bgcolor"<?php if($index % 2 == 0){?>id=""<?php  }else{ ?>id="bgcolor"<?php }?>>
                        <li style="margin-right:15px;">
                            <a href="javascript:;" id="compareLink" onClick="Compare.add(<?php echo $goods['goods_id'];?>,'<?php echo $goods['goods_name'];?>','<?php echo $goods['type'];?>')" class="f6">
                            比较
                            </a>
                        </li>
                        <li class="goodsName">
                            <div class="div_name">
                                <a href="<?php echo $goods['url'];?>" class="f6 f5">
                                <?php if($goods['goods_style_name']){?>
                                    <?php echo $goods['goods_style_name'];?><br />
                                <?php  }else{ ?>
                                    <?php echo $goods['goods_name'];?><br />
                                <?php }?>
                                </a>
                                <?php if($goods['goods_brief']){?>
                                    商品描述：<?php echo $goods['goods_brief'];?><br />
                                <?php }?>
                            </div>
                            <a href="javascript:collect(<?php echo $goods['goods_id'];?>);" class="bnt_blue">加入收藏</a>
                            <a href="javascript:addToCart(<?php echo $goods['goods_id'];?>)" class="bnt_blue">立即购买</a>
                        </li>
                        <li>
   
                        </li>
                        <li class="action">
                            <?php if($show_marketprice){?>
                            市场价格：<font class="market"><?php echo $goods['market_price'];?></font><br />
                            <?php }?>
                            <?php if($goods['promote_price'] <> ''){?>
                            促销价：<font class="market"><?php echo $goods['market_price'];?></font><br />
                            <?php  }else{ ?>
                            本店售价：<font class="shop"><?php echo $goods['shop_price'];?></font><br />
                            <?php }?>
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
    //Compare.init();
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
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--翻页 start-->
<form name="selectPageForm" action="" method="get">
    <input type="hidden" name="m" value="<?php echo $pager['current_meth'];?>"/>
    <input type="hidden" name="c" value="<?php echo $pager['current_control'];?>"/>
    <input type="hidden" name="a" value="<?php echo $pager['current_app'];?>"/>
    <?php if($pager['styleid'] == 0){?>
        <div id="pager">
            总计 <?php echo $pager['record_count'];?> 个记录，共 <?php echo $pager['page_count'];?> 页。
            <span>
                <a href="<?php echo $pager['page_first'];?>">第一页</a> 
                <a href="<?php echo $pager['page_prev'];?>">上一页</a>
                <a href="<?php echo $pager['page_next'];?>">下一页</a> 
                <a href="<?php echo $pager['page_last'];?>">最末页</a>
            </span>
            <?php if(is_array($pager['search'])):?><?php $index=0; ?><?php  foreach($pager['search'] as $key=>$item){ ?>
                <?php if($key == 'keywords'){?>
                    <input type="hidden" name="<?php echo $key;?>" value="<?php echo urldecode($item);?>" />
                <?php  }else{ ?>
                    <input type="hidden" name="<?php echo $key;?>" value="<?php echo $item;?>" />
                <?php }?>
            <?php $index++; ?><?php }?><?php endif;?>
            <select name="page" id="page" onchange="selectPage(this)">
                <?php if(isset($pager['array']) && !empty($pager['array'])):$arr["options"]=$pager['array'];$arr["selected"]=$pager['page'];echo html_options($arr);endif;
?>
            </select>
        </div>
    <?php  }else{ ?>
    <?php }?>
</form>
<script type="Text/Javascript" language="JavaScript">
function selectPage(sel)
{
    sel.form.submit();
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