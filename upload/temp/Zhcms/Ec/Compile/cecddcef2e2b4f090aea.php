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

    <script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/common.js"></script>
    
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

    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--
TODO:
1.page_hearder.lbi----$searchkeywords;
 -->
<script type='text/javascript'>
HOST = '<?php echo $GLOBALS['user']['HOST'];?>';
ROOT = '<?php echo $GLOBALS['user']['ROOT'];?>';
WEB = '<?php echo $GLOBALS['user']['WEB'];?>';
URL = '<?php echo $GLOBALS['user']['URL'];?>';
ZHPHP = '<?php echo $GLOBALS['user']['ZHPHP'];?>';
ZHPHPDATA = '<?php echo $GLOBALS['user']['ZHPHPDATA'];?>';
ZHPHPTPL = '<?php echo $GLOBALS['user']['ZHPHPTPL'];?>';
ZHPHPEXTEND = '<?php echo $GLOBALS['user']['ZHPHPEXTEND'];?>';
APP = '<?php echo $GLOBALS['user']['APP'];?>';
CONTROL = '<?php echo $GLOBALS['user']['CONTROL'];?>';
METH = '<?php echo $GLOBALS['user']['METH'];?>';
GROUP = '<?php echo $GLOBALS['user']['GROUP'];?>';
TPL = '<?php echo $GLOBALS['user']['TPL'];?>';
CONTROLTPL = '<?php echo $GLOBALS['user']['CONTROLTPL'];?>';
STATIC = '<?php echo $GLOBALS['user']['STATIC'];?>';
PUBLIC = '<?php echo $GLOBALS['user']['PUBLIC'];?>';
HISTORY = '<?php echo $GLOBALS['user']['HISTORY'];?>';
TEMPLATE = '<?php echo $GLOBALS['user']['TEMPLATE'];?>';
ROOTURL = '<?php echo $GLOBALS['user']['ROOTURL'];?>';
WEBURL = '<?php echo $GLOBALS['user']['WEBURL'];?>';
CONTROLURL = '<?php echo $GLOBALS['user']['CONTROLURL'];?>';
PHPSELF = '<?php echo $GLOBALS['user']['PHPSELF'];?>';
</script>
<script type="text/javascript">
var process_request = "正在处理您的请求...";
</script>
<div class="block clearfix">
    <div class="f_l">
        <a href="<?php echo U('ec/EcIndex/index');?>" name="top">
            <img src="http://www.works.com/template/v4/ec/common/style/images/logo.gif" />
        </a>
    </div>
    <div class="f_r log">
        <ul>
            <li class="userInfo">
                <script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/transport.js"></script>
                <script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/utils.js"></script>
                <font id="ECS_MEMBERZONE">
                    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--
TODO:
1.$captcha参数需要管理画面取得
 -->
<?php 
    if ($_SESSION['ec_user_id'] > 0)
    {
        $user_info=get_user_info();
    }
    else
    {
        if (!empty($_COOKIE['ECS']['ec_username']))
        {
            $ecs_username=stripslashes($_COOKIE['ECS']['ec_username']);
        }
        //$captcha = intval($GLOBALS['_CFG']['captcha']);
        $captcha = true;
        if (
                ($captcha & CAPTCHA_LOGIN) && 
                (
                    !($captcha & CAPTCHA_LOGIN_FAIL) || 
                    (
                        (
                            $captcha & CAPTCHA_LOGIN_FAIL) && 
                            $_SESSION['ec_login_fail'] > 2
                    )
                ) && 
                gd_version() > 0
            )
        {
            $enabled_captcha=1;
            $rand=mt_rand();
        }
    }
?>
<div id="append_parent"></div>
<?php if($user_info){?>
    <font style="position:relative; top:10px;">
        您好，<font class="f4_b"><?php echo $user_info['username'];?></font>, 欢迎您回来！
        <a href="<?php echo U('ec/EcUser/index');?>">用户中心</a>|
        <a href="<?php echo U('ec/EcUser/index');?>&act=logout">退出</a>
    </font>
<?php  }else{ ?>
    欢迎光临本店&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo U('ec/EcUser/index');?>"><img src="http://www.works.com/template/v4/ec/common/style/images/bnt_log.gif" /></a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=register"><img src="http://www.works.com/template/v4/ec/common/style/images/bnt_reg.gif" /></a>
<?php }?>
                </font>
            </li>
            <?php if($navigator_list['top']){?>
                <li id="topNav" class="clearfix">
                    <?php if(is_array($navigator_list['top'])):?><?php $nav_top_list=0; ?><?php  foreach($navigator_list['top'] as $nav){ ?>
                        <a href="<?php echo $nav['url'];?>" <?php if($nav['opennew'] == 1){?> target="_blank" <?php }?>><?php echo $nav['name'];?></a>
                        <?php if($nav_top_list <> count($navigator_list['top'])-1){?>
                        |
                        <?php }?>
                    <?php $nav_top_list++; ?><?php }?><?php endif;?>
                    <div class="topNavR"></div>
                </li>
            <?php }?>
        </ul>
    </div>
</div>
<div  class="blank"></div>
<div id="mainNav" class="clearfix">
    <a href="<?php echo U('ec/EcIndex/index');?>"<?php if($navigator_list['config']['index'] == 1){?> class="cur"<?php }?> >首页<span></span></a>
    <?php if(is_array($navigator_list['middle'])):?><?php $index=0; ?><?php  foreach($navigator_list['middle'] as $nav){ ?>
        <a href="<?php echo $nav['url'];?>" <?php if($nav['opennew'] == 1){?> target="_blank" <?php }?> <?php if($nav['active'] == 1){?> class="cur"<?php }?>>
            <?php echo $nav['name'];?><span></span>
        </a>
    <?php $index++; ?><?php }?><?php endif;?>
</div>
<!--search start-->
<div id="search"  class="clearfix">
    <div class="keys f_l">
        <script type="text/javascript">
             function checkSearchForm()
             {
                if(document.getElementById('keyword').value)
                {
                    return true;
                }
                else
                {
                    alert("请输入搜索关键词！");
                    return false;
                }
             }
        </script>
        <?php if($searchkeywords){?>
            TODO:page_hearder.lbi----$searchkeywords;
        <?php }?>
    </div>
    <form id="searchForm" name="searchForm" method="get" action="" onSubmit="return checkSearchForm()" class="f_r"  style="_position:relative; top:5px;">
        <input type="hidden" name="a" value="ec" />
        <input type="hidden" name="c" value="EcSearch" />
        <input type="hidden" name="m" value="index" />
        <select name="category" id="category" class="B_input">
            <option value="0">所有分类</option>
            <?php echo $category_list;?>
        </select>
        <input name="keywords" type="text" id="keyword" value="<?php echo $search_keywords;?>" class="B_input"  style="width:110px;"/>
        <input name="imageField" type="submit" value="" class="go" style="cursor:pointer;" />
        <a href="<?php echo U('ec/EcSearch/index');?>&act=advanced_search">高级搜索</a>
    </form> 
</div>

<!--search end-->


    <!--当前位置 start-->
    <div class="block box">
        <div id="ur_here">
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>当前位置: <?php echo $ur_here;?>
        </div>
    </div>
    <!--当前位置 end-->
    <div class="blank"></div>
    <div class="block clearfix">
        <!--left start-->
        <div class="AreaL">
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/transport.js"></script>
<div class="cart" id="ECS_CARTINFO">
<?php
echo insert_cart_info();
?>
</div>
<div class="blank5"></div>
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="box">
    <div class="box_1">
        <div id="category_tree">
        <?php if(is_array($categories)):?><?php $index=0; ?><?php  foreach($categories as $cat){ ?>
        <dl>
            <dt><a href="<?php echo $cat['url'];?>"><?php echo htmlspecialchars($cat['name']);?></a></dt>
            <?php if(is_array($cat['cat_id'])):?><?php $index=0; ?><?php  foreach($cat['cat_id'] as $child){ ?>
            <dd><a href="<?php echo $child['url'];?>"><?php echo htmlspecialchars($child['name']);?></a></dd>
                <?php if(is_array($child['cat_id'])):?><?php $index=0; ?><?php  foreach($child['cat_id'] as $childer){ ?>
                <dd>&nbsp;&nbsp;<a href="<?php echo $childer['url'];?>"><?php echo htmlspecialchars($childer['name']);?></a></dd>
                <?php $index++; ?><?php }?><?php endif;?>
            <?php $index++; ?><?php }?><?php endif;?>
        </dl>
        <?php $index++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>
<div class="blank5"></div>
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($related_goods){?>
<div class="box">
    <div class="box_1">
        <h3><span>相关商品</span></h3>
        <div class="boxCenterList clearfix">
            <?php if(is_array($related_goods)):?><?php $index=0; ?><?php  foreach($related_goods as $releated_goods_data){ ?>
            <ul class="clearfix">
                <li class="goodsimg">
                    <a href="<?php echo $releated_goods_data['url'];?>">
                        <img src="<?php echo $releated_goods_data['goods_thumb'];?>" alt="<?php echo $releated_goods_data['goods_name'];?>" class="B_blue" />
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
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($fittings){?>
<div class="box">
    <div class="box_1">
        <h3><span>相关配件</span></h3>
        <div class="boxCenterList clearfix">
            <?php if(is_array($fittings)):?><?php $index=0; ?><?php  foreach($fittings as $goods_fit){ ?>
            <ul class="clearfix">
                <li class="goodsimg">
                    <a href="<?php echo $goods_fit['url'];?>" target="_blank"><img src="<?php echo $goods_fit['goods_thumb'];?>" alt="<?php echo $goods_fit['name'];?>" class="B_blue" /></a>
                </li>
                <li>
                    <a href="<?php echo $goods_fit['url'];?>" target="_blank" title="<?php echo $goods_fit['goods_name'];?>"><?php echo $goods_fit['short_name'];?></a><br />
                    配件价格：<font class="f1"><?php echo $goods_fit['fittings_price'];?></font><br />
                </li>
            </ul>
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>
<div class="blank5"></div>
<?php }?>
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($goods_article_list){?>
<div class="box">
    <div class="box_1">
        <h3><span>相关文章</span></h3>
        <div class="boxCenterList RelaArticle">
            <?php if(is_array($goods_article_list)):?><?php $index=0; ?><?php  foreach($goods_article_list as $article){ ?>
                <a href="<?php echo $article['url'];?>" title="<?php echo $article['title'];?>"><?php echo $article['short_title'];?></a><br />
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>
<div class="blank5"></div>
<?php }?>
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

            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="box" id='history_div'>
    <div class="box_1">
        <h3><span>�����ʷ</span></h3>
        <div class="boxCenterList clearfix" id='history_list'>
        <?php  
            echo insert_history();
        ?>
        </div>
    </div>
</div>
<div class="blank5"></div>
<script type="text/javascript">
if (document.getElementById('history_list').innerHTML.replace(/\s/g,'').length<1)
{
    document.getElementById('history_div').style.display='none';
}
else
{
    document.getElementById('history_div').style.display='block';
}
function clear_history()
{
    Ajax.call('user.php', 'act=clear_history',clear_history_Response, 'GET', 'TEXT',1,1);
}
function clear_history_Response(res)
{
    document.getElementById('history_list').innerHTML = '<?php echo $lang['no_history'];?>';
}
</script>
        </div>
        <!--left end-->
        
        <!--right start-->
        <div class="AreaR">
        
            <!--商品详情start-->
            <div id="goodsInfo" class="clearfix">
                <!--商品图片和相册 start-->
                <div class="imgInfo">
                    <?php if($pictures){?>
                        <a href="javascript:;" onclick="window.open('gallery.php?id=<?php echo $goods['goods_id'];?>'); return false;">
                            <img src="<?php echo $goods['goods_img'];?>" alt="<?php echo $goods['goods_name'];?>"/>
                        </a>
                    <?php  }else{ ?>
                        <img src="<?php echo $goods['goods_img'];?>" alt="<?php echo $goods['goods_name'];?>"/>
                    <?php }?>
                    <div class="blank5"></div>
                    <!--相册 START-->
                    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($pictures){?>
    <div class="clearfix">
        <span onmouseover="moveLeft()" onmousedown="clickLeft()" onmouseup="moveLeft()" onmouseout="scrollStop()"></span>
        <div class="gallery">
            <div id="demo">
                <div id="demo1" style="float:left">
                    <ul>
                        <?php if(is_array($pictures)):?><?php $picture_no=0; ?><?php  foreach($pictures as $picture){ ?>
                            <li>
                                <a href="gallery.php?id=<?php echo $id;?>&amp;img=<?php echo $picture['img_id'];?>" target="_blank">
                                    <img src="<?php if($picture['thumb_url']){?><?php echo $picture['thumb_url'];?><?php  }else{ ?><?php echo $picture['img_url'];?><?php }?>" alt="<?php echo $goods['goods_name'];?>" class="B_blue" />
                                </a>
                            </li>
                        <?php $picture_no++; ?><?php }?><?php endif;?>
                    </ul>
                </div>
                <div id="demo2" style="display:inline; overflow:visible;"></div>
            </div>
        </div>
        <span onmouseover="moveRight()" onmousedown="clickRight()" onmouseup="moveRight()" onmouseout="scrollStop()" class="spanR"></span>
        <script>
        function $gg(id){  
            return (document.getElementById) ? document.getElementById(id): document.all[id]
        }
        
        var boxwidth=53;//跟图片的实际尺寸相符
        
        var box=$gg("demo");
        var obox=$gg("demo1");
        var dulbox=$gg("demo2");
        obox.style.width=obox.getElementsByTagName("li").length*boxwidth+'px';
        dulbox.style.width=obox.getElementsByTagName("li").length*boxwidth+'px';
        box.style.width=obox.getElementsByTagName("li").length*boxwidth*3+'px';
        var canroll = false;
        if (obox.getElementsByTagName("li").length >= 4) {
            canroll = true;
            dulbox.innerHTML=obox.innerHTML;
        }
        var step=5;temp=1;speed=50;
        var awidth=obox.offsetWidth;
        var mData=0;
        var isStop = 1;
        var dir = 1;
        
        function s(){
            if (!canroll) return;
            if (dir) {
                if((awidth+mData)>=0)
                {
                    mData=mData-step;
                }
                else
                {
                    mData=-step;
                }
            } else {
                if(mData>=0)
                {
                    mData=-awidth;
                }
                else
                {
                    mData+=step;
                }
            }
            
            obox.style.marginLeft=mData+"px";
            
            if (isStop) return;
            
            setTimeout(s,speed)
        }
        
        
        function moveLeft() {
            var wasStop = isStop;
            dir = 1;
            speed = 50;
            isStop=0;
            if (wasStop) {
                setTimeout(s,speed);
            }
        }
        
        function moveRight() {
            var wasStop = isStop;
            dir = 0;
            speed = 50;
            isStop=0;
            if (wasStop) {
                setTimeout(s,speed);
            }
        }
        
        function scrollStop() {
            isStop=1;
        }
        
        function clickLeft() {
            var wasStop = isStop;
            dir = 1;
            speed = 25;
            isStop=0;
            if (wasStop) {
                setTimeout(s,speed);
            }
        }
        
        function clickRight() {
            var wasStop = isStop;
            dir = 0;
            speed = 25;
            isStop=0;
            if (wasStop) {
                setTimeout(s,speed);
            }
        }
        </script>
    </div>
<?php }?>

                    <!--相册 END-->
                    <div class="blank5"></div>
                </div>
                <!--商品图片和相册 end-->
                <div class="textInfo">
                    <form action="javascript:addToCart(<?php echo $goods['goods_id'];?>)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
                        <div class="clearfix">
                            <p class="f_l"><?php echo $goods['goods_style_name'];?></p>
                            <p class="f_r">
                                <?php if($prev_good){?>
                                    <a href="<?php echo $prev_good['url'];?>"><img alt="prev" src="http://www.works.com/template/v4/ec/common/style/images/up.gif" /></a>
                                <?php }?>
                                <?php if($next_good){?>
                                    <a href="<?php echo $next_good['url'];?>"><img alt="next" src="http://www.works.com/template/v4/ec/common/style/images/down.gif" /></a>
                                <?php }?>
                            </p>
                        </div>
                        <ul>
                            <?php if($promotion){?>
                                <li class="padd">
                                    <?php if(is_array($promotion)):?><?php $index=0; ?><?php  foreach($promotion as $promotion_key=>$item){ ?>
                                        本商品正在进行
                                        <?php if($item['type'] == 'snatch'){?>
                                            <a href="<?php echo U('ec/EcSnatch/index');?>" title="夺宝奇兵" style="font-weight:100; color:#f69; text-decoration:none;">[夺宝奇兵]</a>
                                        <?php  }elseif($item['type'] == 'group_buy'){ ?>
                                            <a href="<?php echo U('ec/EcGroupBuy/index');?>" title="团购活动" style="font-weight:100; color:#f69; text-decoration:none;">[团购活动]</a>
                                        <?php  }elseif($item['type'] == 'auction'){ ?>
                                            <a href="<?php echo U('ec/EcAuction/index');?>" title="拍卖活动" style="font-weight:100; color:#f69; text-decoration:none;">[拍卖活动]</a>
                                        <?php  }elseif($item['type'] == 'favourable'){ ?>
                                            <a href="<?php echo U('ec/EcActivity/index');?>" title="优惠活动" style="font-weight:100; color:#f69; text-decoration:none;">[优惠活动]</a>
                                        <?php }?>
                                        <a href="<?php echo $item['url'];?>" title="<?php echo $lang[$item]['type'];?> <?php echo $item['act_name'];?><?php echo $item['time'];?>" style="font-weight:100; color:#f69;">
                                            <?php echo $item['act_name'];?>
                                        </a><br />
                                    <?php $index++; ?><?php }?><?php endif;?>
                                </li>
                            <?php }?>
                            <li class="clearfix">
                                <dd>   
                                    <!-- 显示商品货号-->
                                    <?php if(C("ec_show_goodssn")){?>
                                        <strong>商品货号：</strong><?php echo $goods['goods_sn'];?>
                                    <?php }?>
                                </dd>
                                <dd class="ddR">
                                    <!-- 商品库存-->
                                    <?php if($goods['goods_number'] <> '' and C("ec_show_goodsnumber")){?>
                                        <?php if($goods['goods_number'] == 0){?>
                                            <strong>宝贝数量：</strong>
                                            <font color='red'>缺货</font>
                                        <?php  }else{ ?>
                                            <strong>宝贝数量：</strong>
                                            <?php echo $goods['goods_number'];?> <?php echo $goods['measure_unit'];?>
                                        <?php }?>
                                    <?php }?>
                                </dd>
                            </li>
                            <li class="clearfix">
                                <dd>
                                    <?php if($goods['goods_brand'] <> '' and  C("ec_show_brand")){?>
                                        <strong>商品品牌：</strong><a href="<?php echo $goods['goods_brand_url'];?>" ><?php echo $goods['goods_brand'];?></a>
                                    <?php }?>
                                </dd>
                                <dd class="ddR">
                                    <?php if(C("ec_show_goodsweight")){?>
                                        <strong>商品重量：</strong><?php echo $goods['goods_weight'];?>
                                    <?php }?>
                               </dd>
                            </li>
                            <li class="clearfix">
                                <dd>
                                    <?php if(C("ec_show_addtime")){?>
                                        <strong>上架时间：</strong><?php echo $goods['add_time'];?>
                                    <?php }?>
                                </dd>
                                <dd class="ddR">
                                    <!--点击数-->
                                    <strong>商品点击数：</strong><?php echo $goods['click_count'];?>
                                </dd>
                            </li>
                            <li class="clearfix">
                                <dd class="ddL">
                                    <!--市场售价-->
                                    <?php if(C("ec_show_marketprice")){?>
                                        <strong>市场价格：</strong><font class="market"><?php echo $goods['market_price'];?></font><br />
                                    <?php }?>
                                    <!--本店售价-->
                                    <strong>本店售价：</strong><font class="shop" id="ECS_SHOPPRICE"><?php echo $goods['shop_price_formated'];?></font><br />
                                     <!-- 会员等级对应的价格-->
                                    <?php if(is_array($rank_prices)):?><?php $index=0; ?><?php  foreach($rank_prices as $rank_price_key=>$rank_price){ ?>
                                        <strong><?php echo $rank_price['rank_name'];?>：</strong>
                                        <font class="shop" id="ECS_RANKPRICE_<?php echo $rank_price_key;?>"><?php echo $rank_price['price'];?></font><br />
                                    <?php $index++; ?><?php }?><?php endif;?>
                                </dd>
                                <dd style="width:48%; padding-left:7px;">
                                    <strong>用户评价：</strong>
                                    <img src="http://www.works.com/template/v4/ec/common/style/images/stars<?php echo $goods['comment_rank'];?>.gif" alt="comment rank <?php echo $goods['comment_rank'];?>" />
                                </dd>
                            </li>
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
                                <script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/lefttime.js"></script>
                                <li class="padd loop" style="margin-bottom:5px; border-bottom:1px dashed #ccc;">
                                    <strong>促销价：</strong>
                                    <font class="shop"><?php echo $goods['promote_price'];?></font><br />
                                    <strong>剩余时间：</strong>
                                    <font class="f4" id="leftTime">请稍等, 正在载入中...</font><br />
                                </li>
                            <?php }?>
                            <li class="clearfix">
                                <dd>
                                    <strong>商品总价：</strong><font id="ECS_GOODS_AMOUNT" class="shop"></font>
                                </dd>
                                <dd class="ddR">
                                    <!-- 购买此商品赠送积分-->
                                    <?php if($goods['give_integral'] > 0){?>
                                        <strong>购买此商品赠送：</strong><font class="f4"><?php echo $goods['give_integral'];?> <?php echo $points_name;?></font>
                                    <?php }?>
                                </dd>
                            </li>
                            <?php if($goods['bonus_money']){?>
                                <li class="padd loop" style="margin-bottom:5px; border-bottom:1px dashed #ccc;">
                                    <strong>购买此商品可获得红包：</strong>
                                    <font class="shop"><?php echo $goods['bonus_money'];?></font><br />
                                </li>
                            <?php }?>
                            <li class="clearfix">
                                <dd>
                                    <strong>购买数量：</strong>
                                    <input name="number" type="text" id="number" value="1" size="4" onblur="changePrice()" style="border:1px solid #ccc; "/>
                                </dd>
                                <dd class="ddR">
                                    <!-- 购买此商品可使用积分-->
                                    <?php if(C("ec_use_integral")){?>
                                        <strong>购买此商品可使用：</strong>
                                        <font class="f4"><?php echo $goods['integral'];?> <?php echo $points_name;?></font>
                                    <?php }?>
                                </dd>
                            </li>
                            <!-- 为免运费商品则显示-->
                            <?php if($goods['is_shipping']){?>
                                <li style="height:30px;padding-top:4px;">
                                    此商品为免运费商品，计算配送金额时将不计入配送费用<br />
                                </li>
                            <?php }?>
                            <!--  开始循环所有可选属性 -->
                            <?php if(is_array($specification)):?><?php $index=0; ?><?php  foreach($specification as $spec_key=>$spec){ ?>
                                <li class="padd loop">
                                    <strong><?php echo $spec['name'];?>：</strong><br />
                                    <!-- 判断属性是复选还是单选  -->
                                    <?php if($spec['attr_type'] == 1){?>
                                        <?php if(C("ec_goodsattr_style")== 1){?>
                                            <?php if(is_array($spec['values'])):?><?php $index=0; ?><?php  foreach($spec['values'] as $key=>$value){ ?>
                                            <label for="spec_value_<?php echo $value['id'];?>">
                                                <input type="radio" name="spec_<?php echo $spec_key;?>" value="<?php echo $value['id'];?>" id="spec_value_<?php echo $value['id'];?>" <?php if($key == 0){?>checked<?php }?> onclick="changePrice()" />
                                                <?php echo $value['label'];?> [<?php if($value['price'] > 0){?>加<?php  }elseif($value['price'] < 0){ ?>减<?php }?> <?php echo $value['format_price'];?>] 
                                            </label><br />
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
                                            </label><br />
                                        <?php $index++; ?><?php }?><?php endif;?>
                                        <input type="hidden" name="spec_list" value="<?php echo $key;?>" />
                                    <?php }?>
                                </li>
                            <?php $index++; ?><?php }?><?php endif;?>
                            <!-- 结束循环可选属性  -->
                            <li class="padd">
                                <a href="javascript:addToCart(<?php echo $goods['goods_id'];?>)"><img src="http://www.works.com/template/v4/ec/common/style/images/bnt_cat.gif" /></a>
                                <a href="javascript:collect(<?php echo $goods['goods_id'];?>)"><img src="http://www.works.com/template/v4/ec/common/style/images/bnt_colles.gif" /></a>
                                <?php if($affiliate['on']){?>
                                    <!--<a href="<?php echo U('ec/EcUser/index');?>&act=affiliate&goodsid=<?php echo $goods['goods_id'];?>" ><img src='http://www.works.com/template/v4/ec/common/style/images/bnt_recommend.gif'/></a>-->
                                <?php }?>
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
                            <h2 class="h2bg">商品属性</h2>
                            <?php if($package_goods_list){?>
                                <h2 class="h2bg" style="color:red;">超值礼包</h2>
                            <?php }?>
                        </div>
                    </h3>
                    <div id="com_v" class="boxCenterList RelaArticle"></div>
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
                                                        <img src="http://www.works.com/template/v4/ec/common/style/images/bnt_buy_1.gif" alt="加入购物车" />
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
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="box">
    <div class="box_1">
        <h3><span class="text">商品标签</span></h3>
        <div class="boxCenterList clearfix ie6">
            <form name="tagForm" action="javascript:;" onSubmit="return submitTag(this)" id="tagForm">
                <p id="ECS_TAGS" style="margin-bottom:5px;">
                    <!-- 标记 -->
                    <?php if(is_array($tags)):?><?php $index=0; ?><?php  foreach($tags as $tag){ ?>
                        <a href="<?php echo U('ec/EcSearch/index');?>&keywords=<?php echo htmlspecialchars($tag['tag_words']);?>" style="color:#006ace; text-decoration:none; margin-right:5px;">
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
                                var ajaxurl=APP+'&c=EcUser&m=index&act=add_tag';
                                Ajax.call(ajaxurl, "id=" + idx + "&tag=" + tag, submitTagResponse, "POST", "JSON");
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
                                    div.innerHTML += '<a href="<?php echo U("ec/EcSearch/index");?>&keywords='+tags[i].word+'" style="color:#006ace; text-decoration:none; margin-right:5px;">' +tags[i].word + '[' + tags[i].count + ']<\/a>&nbsp;&nbsp; ';
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
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($bought_goods){?>
<div class="box">
    <div class="box_1">
        <h3><span class="text">购买过此商品的人还购买过</span></h3>
        <div class="boxCenterList clearfix ie6">
            <?php if(is_array($bought_goods)):?><?php $index=0; ?><?php  foreach($bought_goods as $bought_goods_data){ ?>
            <div class="goodsItem">
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
                <?php
                $comments_arr['type']=$type;
                $comments_arr['id']=$id;
                ?>
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/transport_jquery.js"></script>
<script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/utils.js"></script>
<div id="ECS_COMMENT">
<?php
$comments_cmt = assign_comment($comments_arr['id'],          $comments_arr['type']);
$comments=$comments_cmt['comments'];
$comments_pager=$comments_cmt['pager'];
$comments_pager['current_app']=APP;
$comments_pager['current_control']=CONTROL;
$comments_pager['current_meth']='index';
?>
<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--用户评论 START-->
<div class="box">
    <div class="box_1">
        <h3>
            <span class="text">用户评论</span>
            (共<font class="f1"><?php echo $comments_pager['record_count'];?></font>条评论)
        </h3>
        <div class="boxCenterList clearfix" style="height:1%;">
            <ul class="comments">
                <?php if($comments){?>
                    <?php if(is_array($comments)):?><?php $index=0; ?><?php  foreach($comments as $comment){ ?>
                        <li class="word">
                            <font class="f2">
                                <?php if($comment['username']){?>
                                    <?php echo $comment['username'];?>
                                <?php  }else{ ?>
                                    匿名用户
                                <?php }?>
                            </font> 
                            <font class="f3">( <?php echo $comment['add_time'];?> )</font><br />
                            <img src="http://www.works.com/template/v4/ec/common/style/images/stars<?php echo $comment['rank'];?>.gif" alt="<?php echo $comment['comment_rank'];?>" />
                            <p><?php echo $comment['content'];?></p>
                            <?php if($comment['re_content']){?>
                                <p><font class="f1">管理员：</font><?php echo $comment['re_content'];?></p>
                            <?php }?>
                        </li>
                    <?php $index++; ?><?php }?><?php endif;?>
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
                                <input name="comment_rank" type="radio" value="1" id="comment_rank1" /> <img src="http://www.works.com/template/v4/ec/common/style/images/stars1.gif" />
                                <input name="comment_rank" type="radio" value="2" id="comment_rank2" /> <img src="http://www.works.com/template/v4/ec/common/style/images/stars2.gif" />
                                <input name="comment_rank" type="radio" value="3" id="comment_rank3" /> <img src="http://www.works.com/template/v4/ec/common/style/images/stars3.gif" />
                                <input name="comment_rank" type="radio" value="4" id="comment_rank4" /> <img src="http://www.works.com/template/v4/ec/common/style/images/stars4.gif" />
                                <input name="comment_rank" type="radio" value="5" checked="checked" id="comment_rank5" /> <img src="http://www.works.com/template/v4/ec/common/style/images/stars5.gif" />
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
    var ajaxurl=APP+'&c=EcComment&m=index';
    Ajax.call(ajaxurl, 'cmt=' + cmt.toJSONString(), commentResponse, 'POST', 'JSON');
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
                
            </div>
            <!--right end-->
        </div>
        <!--right end-->
    </div>
    <div class="blank5"></div>

    
    <!--友情链接 start-->
    <?php if($img_links  or $txt_links){?>
    <div id="bottomNav" class="box">
        <div class="box_1">
            <div class="links clearfix">
                <!--开始图片类型的友情链接-->
                <?php if(is_array($img_links)):?><?php $index=0; ?><?php  foreach($img_links as $link){ ?>
                <a href="<?php echo $link['url'];?>" target="_blank" title="<?php echo $link['name'];?>">
                    <img src="<?php echo $link['logo'];?>" alt="<?php echo $link['name'];?>" border="0" />
                </a>
                <?php $index++; ?><?php }?><?php endif;?>
                <!--结束图片类型的友情链接-->
                <?php if($txt_links){?>
                    <!--开始文字类型的友情链接-->
                    <?php if(is_array($txt_links)):?><?php $index=0; ?><?php  foreach($txt_links as $link){ ?>
                        [<a href="<?php echo $link['url'];?>" target="_blank" title="<?php echo $link['name'];?>"><?php echo $link['name'];?></a>]
                    <?php $index++; ?><?php }?><?php endif;?>
                    <!--结束文字类型的友情链接-->
                <?php }?>
            </div>
        </div>
    </div>
    <?php }?>
    <!--友情链接 end-->
    <div class="blank"></div>
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--底部导航 start-->
<div id="bottomNav" class="box">
    <div class="box_1">
        <div class="bNavList clearfix">
            <div class="f_l">
                <?php if($navigator_list['bottom']){?>
                    <?php if(is_array($navigator_list['bottom'])):?><?php $index=0; ?><?php  foreach($navigator_list['bottom'] as $nav_bottom_list_key=>$nav){ ?>
                        <a href="<?php echo $nav['url'];?>" <?php if($nav['opennew'] == 1){?> target="_blank" <?php }?>><?php echo $nav['name'];?></a>
                        <?php if($nav_bottom_list_key+1 <> count($navigator_list['bottom'])){?>
                        -
                        <?php }?>
                    <?php $index++; ?><?php }?><?php endif;?>
                <?php }?>
            </div>
            <div class="f_r">
                <a href="#top">
                    <img src="http://www.works.com/template/v4/ec/common/style/images/bnt_top.gif" />
                </a> 
                <a href="<?php echo U('ec/EcIndex/index');?>"><img src="http://www.works.com/template/v4/ec/common/style/images/bnt_home.gif" /></a>
            </div>
        </div>
    </div>
</div>
<!--底部导航 end-->
<div class="blank"></div>
<!--版权 start-->
<div id="footer">
    <div class="text">
        <?php echo $copyright;?><br />
        <?php echo $shop_address;?> <?php echo $shop_postcode;?>
        <!-- 客服电话 -->
        <?php if($service_phone){?>
            Tel: <?php echo $service_phone;?>
        <?php }?>
        <!-- 邮件 -->
        <?php if($service_email){?>
            E-mail: <?php echo $service_email;?><br />
        <?php }?>
        <!-- QQ 号码 -->
        <?php if(is_array($qq)):?><?php $index=0; ?><?php  foreach($qq as $im){ ?>
            <?php if($im){?>
                <a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?php echo $im;?>&amp;Site=<?php echo $shop_name;?>&amp;Menu=yes" target="_blank">
                    <img src="http://wpa.qq.com/pa?p=1:<?php echo $im;?>:4" height="16" border="0" alt="QQ" /> <?php echo $im;?>
                </a>
            <?php }?>
        <?php $index++; ?><?php }?><?php endif;?>
        <!-- 淘宝旺旺 -->
        <?php if(is_array($ww)):?><?php $index=0; ?><?php  foreach($ww as $im){ ?>
            <?php if($im){?>
                <a href="http://amos1.taobao.com/msg.ww?v=2&uid=<?php echo $im;?>&s=2" target="_blank">
                    <img src="http://amos1.taobao.com/online.ww?v=2&uid=<?php echo $im;?>&s=2" width="16" height="16" border="0" alt="淘宝旺旺" />
                    <?php echo $im;?>
                </a>
            <?php }?>
        <?php $index++; ?><?php }?><?php endif;?>
        <!-- Yahoo Messenger -->
        <?php if(is_array($ym)):?><?php $index=0; ?><?php  foreach($ym as $im){ ?>
            <?php if($im){?>
                <a href="http://edit.yahoo.com/config/send_webmesg?.target=<?php echo $im;?>n&.src=pg" target="_blank">
                    <img src="http://www.works.com/template/v4/ec/common/style/images/yahoo.gif" width="18" height="17" border="0" alt="Yahoo Messenger" /> <?php echo $im;?>
                </a>
            <?php }?>
        <?php $index++; ?><?php }?><?php endif;?>
        <!-- MSN Messenger -->
        <?php if(is_array($msn)):?><?php $index=0; ?><?php  foreach($msn as $im){ ?>
            <?php if($im){?>
                <img src="http://www.works.com/template/v4/ec/common/style/images/msn.gif" width="18" height="17" border="0" alt="MSN" /> 
                <a href="msnim:chat?contact=<?php echo $im;?>"><?php echo $im;?></a>
            <?php }?>
        <?php $index++; ?><?php }?><?php endif;?>
        <!-- Skype -->
        <?php if(is_array($skype)):?><?php $index=0; ?><?php  foreach($skype as $im){ ?>
            <?php if($im){?>
                <img src="http://mystatus.skype.com/smallclassic/<?php echo $im;?>" alt="Skype" />
                <a href="skype:<?php echo $im;?>?call"><?php echo $im;?></a>
            <?php }?>
        <?php $index++; ?><?php }?><?php endif;?><br />
        <!-- ICP 证书 -->
        <?php if($icp_number){?>
        ICP证书或ICP备案证书号:<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo $icp_number;?></a><br />
        <?php }?>
    </div>
</div>
</body>
<script type="text/javascript">
    var goods_id = <?php echo $goods_id;?>;
    <?php if(C("ec_goodsattr_style")){?>
        var goods_id=<?php echo C("ec_goodsattr_style");?>;
    <?php  }else{ ?>
        var goods_id=1;
    <?php }?>
    var gmt_end_time = <?php echo default_value($promote_end_time,0);?>;
    var day = "天";
    var hour = "小时";
    var minute = "分钟";
    var second = "秒";
    var end = "结束";
    var goodsId = <?php echo $goods_id;?>;
    var now_time = <?php echo $now_time;?>;

    onload = function(){
        changePrice();
        fixpng();
        try { onload_leftTime(); }
        catch (e) {}
    }
    
    /**
     * 点选可选属性或改变数量时修改商品价格的函数
     */
    function changePrice()
    {
        var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);
        var qty = document.forms['ECS_FORMBUY'].elements['number'].value;
        var ajaxurl=APP+"&c=EcGoods&m=index";
        Ajax.call(ajaxurl, 'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty, changePriceResponse, 'GET', 'JSON');
    }
    
    /**
    * 接收返回的信息
    */
    function changePriceResponse(res)
    {
        if (res.err_msg.length > 0)
        {
            alert(res.err_msg);
        }
        else
        {
            document.forms['ECS_FORMBUY'].elements['number'].value = res.qty;
            
            if (document.getElementById('ECS_GOODS_AMOUNT'))
                document.getElementById('ECS_GOODS_AMOUNT').innerHTML = res.result;
        }
    }
    
</script>
</html>