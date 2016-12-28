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
    <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/index.js"></script>
</head>
<body class="index_page" style="min-width:1200px;">

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
        <a class="logo_new" href="<?php echo U('ec/ecindex/index');?>"><img src="http://www.works.com/template/v3/ec/common/images/logo.gif" /></a>
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
                <a href="flow.php">查看购物车</a>
            </li>
            <li>
                <a href="user.php" target="_blank"><em class="i_order">&nbsp;</em>我的订单</a>
            </li>
        </ul>
    </div>
</div>

<div style="clear:both"></div>

<div class="menu_box clearfix"> 
    <div class="block"> 
        <div class="menu">
            <a href="<?php echo U('ec/ecindex/index');?>"<?php if($navigator_list['config']['index'] == 1){?> class="cur"<?php }?>>首页<span></span></a>
            <?php if(is_array($navigator_list['middle'])):?><?php $nav_middle_list=0; ?><?php  foreach($navigator_list['middle'] as $nav){ ?>
                <a href="<?php echo U('ec/category/index',array('id'=>$nav['cid']));?>" <?php if($nav['opennew'] == 1){?> target="_blank" <?php }?> <?php if($nav['active'] == 1){?> class="cur"<?php }?>><?php echo $nav['name'];?><span></span></a>
            <?php $nav_middle_list++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>



<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><style type="text/css"> 
.container, .container *{margin:0; padding:0;}

.container{width:100%; height:419px; overflow:hidden;position:relative;}

.slider{position:absolute; width:100%; height:419px;}
.slider li , .slider li a{ list-style:none; float:left;width:100%; height:419px;}
.slider img{ width:100%; height:419px; display:block;}

.slider2{width:2000px;}
.slider2 li{float:left;}

.num{ position:absolute; right:5px; bottom:5px; width:800px; margin:0 auto;}
.num li{
	float: left;
	color: #f69;
	text-align: center;
	line-height: 16px;
	width: 16px;
	height: 16px;
	font-family: Arial;
	font-size: 12px;
	cursor: pointer;
	overflow: hidden;
	margin: 3px 1px;
	border: 1px solid #f69;
	background-color: #fff;
}
.num li.on{
	color: #fff;
	line-height: 21px;
	width: 21px;
	height: 21px;
	font-size: 16px;
	margin: 0 1px;
	border: 0;
	background-color: #f69;
	font-weight: bold;
}
</style>
<div class="container" id="idTransformView">
    <ul class="slider" id="idSlider">
        <?php if(is_array($flash)):?><?php $myflash=0; ?><?php  foreach($flash as $flash1){ ?>
        <li style="background:url(<?php echo $flash1['src'];?>) center 0 no-repeat; position:relative;">
            <a href="<?php echo $flash1['url'];?>" target="_blank"></a>
        </li>
        <?php $myflash++; ?><?php }?><?php endif;?>
    </ul>
    <ul class="num" id="idNum">
        <?php if(is_array($flash)):?><?php $no=0; ?><?php  foreach($flash as $flash2){ ?>
        <li>
        <?php echo ($no+1)?>
        </li> 
        <?php $no++; ?><?php }?><?php endif;?>
    </ul>
</div>

<script type="text/javascript">
var $s = function (id) {
	return "string" == typeof id ? document.getElementById(id) : id;
};

var Class = {
  create: function() {
	return function() {
	  this.initialize.apply(this, arguments);
	}
  }
}

Object.extend = function(destination, source) {
	for (var property in source) {
		destination[property] = source[property];
	}
	return destination;
}

var TransformView = Class.create();
TransformView.prototype = {
  //容器对象,滑动对象,切换参数,切换数量
  initialize: function(container, slider, parameter, count, options) {
	if(parameter <= 0 || count <= 0) return;
	var oContainer = $s(container), oSlider = $s(slider), oThis = this;

	this.Index = 0;//当前索引
	
	this._timer = null;//定时器
	this._slider = oSlider;//滑动对象
	this._parameter = parameter;//切换参数
	this._count = count || 0;//切换数量
	this._target = 0;//目标参数
	
	this.SetOptions(options);
	
	this.Up = !!this.options.Up;
	this.Step = Math.abs(this.options.Step);
	this.Time = Math.abs(this.options.Time);
	this.Auto = !!this.options.Auto;
	this.Pause = Math.abs(this.options.Pause);
	this.onStart = this.options.onStart;
	this.onFinish = this.options.onFinish;
	
	oContainer.style.overflow = "hidden";
	oContainer.style.position = "relative";
	
	oSlider.style.position = "absolute";
	oSlider.style.top = oSlider.style.left = 0;
  },
  //设置默认属性
  SetOptions: function(options) {
	this.options = {//默认值
		Up:			true,//是否向上(否则向左)
		Step:		5,//滑动变化率
		Time:		10,//滑动延时
		Auto:		true,//是否自动转换
		Pause:		2000,//停顿时间(Auto为true时有效)
		onStart:	function(){},//开始转换时执行
		onFinish:	function(){}//完成转换时执行
	};
	Object.extend(this.options, options || {});
  },
  //开始切换设置
  Start: function() {
	if(this.Index < 0){
		this.Index = this._count - 1;
	} else if (this.Index >= this._count){ this.Index = 0; }
	
	this._target = -1 * this._parameter * this.Index;
	this.onStart();
	this.Move();
  },
  //移动
  Move: function() {
	clearTimeout(this._timer);
	var oThis = this, style = this.Up ? "top" : "left", iNow = parseInt(this._slider.style[style]) || 0, iStep = this.GetStep(this._target, iNow);
	
	if (iStep != 0) {
		this._slider.style[style] = (iNow + iStep) + "px";
		this._timer = setTimeout(function(){ oThis.Move(); }, this.Time);
	} else {
		this._slider.style[style] = this._target + "px";
		this.onFinish();
		if (this.Auto) { this._timer = setTimeout(function(){ oThis.Index++; oThis.Start(); }, this.Pause); }
	}
  },
  //获取步长
  GetStep: function(iTarget, iNow) {
	var iStep = (iTarget - iNow) / this.Step;
	if (iStep == 0) return 0;
	if (Math.abs(iStep) < 1) return (iStep > 0 ? 1 : -1);
	return iStep;
  },
  //停止
  Stop: function(iTarget, iNow) {
	clearTimeout(this._timer);
	this._slider.style[this.Up ? "top" : "left"] = this._target + "px";
  }
};

window.onload=function(){
	function Each(list, fun){
		for (var i = 0, len = list.length; i < len; i++) { fun(list[i], i); }
	};
	
	var objs = $s("idNum").getElementsByTagName("li");
	var obj_len = objs.length;
	var tv = new TransformView("idTransformView", "idSlider", 419, obj_len, {
		onStart : function(){ Each(objs, function(o, i){ o.className = tv.Index == i ? "on" : ""; }) }//按钮样式
	});
	
	tv.Start();
	
	Each(objs, function(o, i){
		o.onmouseover = function(){
			o.className = "on";
			tv.Auto = false;
			tv.Index = i;
			tv.Start();
		}
		o.onmouseout = function(){
			o.className = "";
			tv.Auto = true;
			tv.Start();
		}
	})
	
	////////////////////////test2
	
//	var objs2 = $("idNum2").getElementsByTagName("li");
//	
//	var tv2 = new TransformView("idTransformView2", "idSlider2",1200, 3, {
//		onStart: function(){ Each(objs2, function(o, i){ o.className = tv2.Index == i ? "on" : ""; }) },//按钮样式
//		Up: false
//	});
//	
//	tv2.Start();
//	
//	Each(objs2, function(o, i){
//		o.onmouseover = function(){
//			o.className = "on";
//			tv2.Auto = false;
//			tv2.Index = i;
//			tv2.Start();
//		}
//		o.onmouseout = function(){
//			o.className = "";
//			tv2.Auto = true;
//			tv2.Start();
//		}
//	})
//	
//	$("idStop").onclick = function(){ tv2.Auto = false; tv2.Stop(); }
//	$("idStart").onclick = function(){ tv2.Auto = true; tv2.Start(); }
//	$("idNext").onclick = function(){ tv2.Index++; tv2.Start(); }
//	$("idPre").onclick = function(){ tv2.Index--;tv2.Start(); }
//	$("idFast").onclick = function(){ if(--tv2.Step <= 0){tv2.Step = 1;} }
//	$("idSlow").onclick = function(){ if(++tv2.Step >= 10){tv2.Step = 10;} }
//	$("idReduce").onclick = function(){ tv2.Pause-=1000; if(tv2.Pause <= 0){tv2.Pause = 0;} }
//	$("idAdd").onclick = function(){ tv2.Pause+=1000; if(tv2.Pause >= 5000){tv2.Pause = 5000;} }
//	
//	$("idReset").onclick = function(){
//		tv2.Step = Math.abs(tv2.options.Step);
//		tv2.Time = Math.abs(tv2.options.Time);
//		tv2.Auto = !!tv2.options.Auto;
//		tv2.Pause = Math.abs(tv2.options.Pause);
//	}
	
}
</script>
 
 
 
 
 
 <div class="blank5"></div>
<div class="blank"></div>
<div class="blank"></div>
<div class="block clearfix">
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><script type="text/javascript">
          //初始化主菜单
            function sw_nav2(obj,tag)
            {
            var DisSub2 = document.getElementById("DisSub2_"+obj);
            var HandleLI2= document.getElementById("HandleLI2_"+obj);
                if(tag==1)
                {
                    DisSub2.style.display = "block";
					HandleLI2.className="current";
                }
                else
                {
                    DisSub2.style.display = "none";
					HandleLI2.className="";
                }
            }
</script>
<div id="category_tree">
    <dl class="clearfix" style=" margin-top:-455px;" >
        <?php if(is_array($categories)):?><?php $index=0; ?><?php  foreach($categories as $tno=>$cat){ ?>
            <?php $no = $tno+1;?>
            <div  class="dt"  <?php if($no == 9){?>style="border-bottom:none;"<?php }?>  onMouseOver="sw_nav2(<?php echo $no;?>,1);" onMouseOut="sw_nav2(<?php echo $no;?>,0);" >
                <div id="HandleLI2_<?php echo $no;?>">
                    <a    class="a<?php if($no % 2 == 0){?><?php  }else{ ?> t <?php }?> "href="<?php echo $cat['url'];?>">
                        <?php echo htmlspecialchars($cat['name']);?>
                        <img src="http://www.works.com/template/v3/ec/common/images/biao8.gif"/>
                    </a>
                </div>
                <dd  id=DisSub2_<?php echo $no;?> style="display:none">
                    <?php if(is_array($cat['cat_id'])):?><?php $index=0; ?><?php  foreach($cat['cat_id'] as $child){ ?>
                        <a class="over_2" href="<?php echo $child['url'];?>"><?php echo htmlspecialchars($child['name']);?></a>  
                        <div class="clearfix">
                            <?php if(is_array($child['cat_id'])):?><?php $index=0; ?><?php  foreach($child['cat_id'] as $childer){ ?>
                                <a class="over_3" href="<?php echo $childer['url'];?>"><?php echo htmlspecialchars($childer['name']);?></a>
                            <?php $index++; ?><?php }?><?php endif;?>
                        </div>
                    <?php $index++; ?><?php }?><?php endif;?>
                </dd> 
            </div>
        <?php $index++; ?><?php }?><?php endif;?>
    </dl>
</div>
    <div class="AreaL">
        <!-- �̵깫�� -->
        <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div id="mallNews"    class="  box_1">
    <h3><span>站内快讯</span></h3>
    <div class="NewsList tc  " style="border-top:none">
        <ul>
            <?php if(is_array($new_articles)):?><?php $index=0; ?><?php  foreach($new_articles as $article){ ?>
            <li>
            <a href="<?php echo $article['url'];?>" title="<?php echo htmlspecialchars($article['title']);?>"><?php echo ec_sub_str($article['short_title'],10,true);?></a>
            </li>
            <?php $index++; ?><?php }?><?php endif;?>
        </ul>
    </div>
</div>
<div  class="blank"></div>
        <!-- �̵깫���¹�� -->
        <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>
<?php
    $arr=array();
    insert_ads($arr);
 ?>
 <div class="blank"></div>
    </div>
    <div class="Arear">
        <!-- ������Ʒ���� -->
        <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($promotion_goods){?>
<div class="sale_box clearfix">
    <h3><span>特价商品</span></h3>
    <div class="clearfix">
    <?php if(is_array($promotion_goods)):?><?php $index=0; ?><?php  foreach($promotion_goods as $promotion_foreach=>$goods){ ?>
        <ul class="clearfix">
            <li class="goodsimg">
                <a href="<?php echo $goods['url'];?>">
                    <img src="<?php echo $goods['thumb'];?>" border="0" alt="<?php echo htmlspecialchars($goods['name']);?>" class="B_blue"/>
                </a>
            </li>
            <li> 
                <p>
                    <a href="<?php echo $goods['url'];?>" title="<?php echo escape($goods['name'],html);?>"><?php echo escape($goods['short_name'],html);?></a>
                </p>
                市场价：<font class="market"><?php echo $goods['market_price'];?></font> <br/>
                促销价：<font class="f1"><?php echo $goods['promote_price'];?></font>
            </li>
        </ul>
    <?php $index++; ?><?php }?><?php endif;?>
    </div>
</div>
<div class="blank" style="height:1px;"></div>
<?php }?>
    </div>
    <div class="goodsBox_1">
        <!-- ��Ʒ�ϼ� -->
        <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($new_goods){?>
    <?php if($cat_rec_sign <> 1){?>
        <div class="xm-box">
            <h4 class="title"><span>新品上架</span> <a class="more" href="../search.php?intro=new">更多</a></h4>
            <div id="show_new_area" class="clearfix">
    <?php }?>
            <?php if(is_array($new_goods)):?><?php $index=0; ?><?php  foreach($new_goods as $goods){ ?>
                <div class="goodsItem">
                    <a href="<?php echo $goods['url'];?>"><img src="<?php echo $goods['thumb'];?>" alt="<?php echo htmlspecialchars($goods['name']);?>" class="goodsimg" /></a><br />
                    <p class="f1"><a href="<?php echo $goods['url'];?>" title="<?php echo htmlspecialchars($goods['name']);?>"><?php echo $goods['short_style_name'];?></a></p>
                     市场价：<font class="market"><?php echo $goods['market_price'];?></font> <br/>
                     本店价：<font class="f1">
                     <?php if($goods['promote_price'] <> ''){?>
                     <?php echo $goods['promote_price'];?>
                     <?php  }else{ ?>
                     <?php echo $goods['shop_price'];?>
                     <?php }?>
                     </font>
                </div>
            <?php $index++; ?><?php }?><?php endif;?>
    <?php if($cat_rec_sign <> 1){?>
            </div>
        </div>
    <div class="blank"></div>
    <?php }?>
<?php }?>
        <!-- ������Ʒ -->
        <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($hot_goods){?>
    <?php if($cat_rec_sign <> 1){?>
        <div class="xm-box">
            <h4 class="title"><span>热卖商品</span> <a class="more" href="../search.php?intro=hot">更多</a></h4>
            <div id="show_hot_area" class="clearfix">
    <?php }?>
            <?php if(is_array($hot_goods)):?><?php $index=0; ?><?php  foreach($hot_goods as $goods){ ?>
                <div class="goodsItem">
                    <a href="<?php echo $goods['url'];?>"><img src="<?php echo $goods['thumb'];?>" alt="<?php echo htmlspecialchars($goods['name']);?>" class="goodsimg" /></a><br />
                    <p class="f1"><a href="<?php echo $goods['url'];?>" title="<?php echo htmlspecialchars($goods['name']);?>"><?php echo $goods['short_style_name'];?></a></p>
                     市场价：<font class="market"><?php echo $goods['market_price'];?></font> <br/>
                     本店价：<font class="f1">
                     <?php if($goods['promote_price'] <> ''){?>
                     <?php echo $goods['promote_price'];?>
                     <?php  }else{ ?>
                     <?php echo $goods['shop_price'];?>
                     <?php }?>
                     </font>
                </div>
            <?php $index++; ?><?php }?><?php endif;?>
    <?php if($cat_rec_sign <> 1){?>
            </div>
        </div>
    <div class="blank"></div>
    <?php }?>
<?php }?>
        <!-- ��Ʒ�Ƽ� -->
        <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($best_goods){?>
    <?php if($cat_rec_sign <> 1){?>
        <div class="xm-box">
            <h4 class="title"><span>精品推荐</span> <a class="more" href="../search.php?intro=best">更多</a></h4>
            <div id="show_best_area" class="clearfix">
    <?php }?>
            <?php if(is_array($best_goods)):?><?php $index=0; ?><?php  foreach($best_goods as $goods){ ?>
                <div class="goodsItem">
                    <a href="<?php echo $goods['url'];?>"><img src="<?php echo $goods['thumb'];?>" alt="<?php echo htmlspecialchars($goods['name']);?>" class="goodsimg" /></a><br />
                    <p class="f1"><a href="<?php echo $goods['url'];?>" title="<?php echo htmlspecialchars($goods['name']);?>"><?php echo $goods['short_style_name'];?></a></p>
                     市场价：<font class="market"><?php echo $goods['market_price'];?></font> <br/>
                     本店价：<font class="f1">
                     <?php if($goods['promote_price'] <> ''){?>
                     <?php echo $goods['promote_price'];?>
                     <?php  }else{ ?>
                     <?php echo $goods['shop_price'];?>
                     <?php }?>
                     </font>
                </div>
            <?php $index++; ?><?php }?><?php endif;?>
    <?php if($cat_rec_sign <> 1){?>
            </div>
        </div>
    <div class="blank"></div>
    <?php }?>
<?php }?>
        <!-- ��ҳ��̬������Ʒ���� -->
        <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="xm-box">
    <h4 class="title"><span><?php echo htmlspecialchars($goods_cat['name']);?></span> <a class="more" href="<?php echo $goods_cat['url'];?>">更多</a></h4>
    <div id="show_hot_area" class="clearfix">
        <?php if(is_array($cat_goods)):?><?php $index=0; ?><?php  foreach($cat_goods as $goods){ ?>
            <div class="goodsItem">
                <a href="<?php echo $goods['url'];?>"><img src="<?php echo $goods['thumb'];?>" alt="<?php echo htmlspecialchars($goods['name']);?>" class="goodsimg" /></a><br />
                <p class="f1"><a href="<?php echo $goods['url'];?>" title="<?php echo htmlspecialchars($goods['name']);?>"><?php echo $goods['short_name'];?></a></p>
                市场价：<font class="market"><?php echo $goods['market_price'];?></font> <br/>
                本店价：<font class="f1">
                <?php if($goods['promote_price'] <> ''){?>
                <?php echo $goods['promote_price'];?>
                <?php  }else{ ?>
                <?php echo $goods['shop_price'];?>
                <?php }?>
                </font>
            </div>
        <?php $index++; ?><?php }?><?php endif;?>
    </div>
</div>
<div class="blank"></div>
    </div>
</div>

<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><a href="http://www.ecmoban.com" class="ecmoban">ecshopģ����</a>

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