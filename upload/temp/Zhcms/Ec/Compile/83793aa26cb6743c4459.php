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
    function $id(element)
    {
        return document.getElementById(element);
    }
    //切屏--是按钮，_v是内容平台，_h是内容库
    function reg(str)
    {
        var bt=$id(str+"_b").getElementsByTagName("h2");
    
        for(var i=0;i<bt.length;i++)
        {
            bt[i].subj=str;
            bt[i].pai=i;
            bt[i].style.cursor="pointer";
            
            bt[i].onclick=function()
            {
                $id(this.subj+"_v").innerHTML=$id(this.subj+"_h").getElementsByTagName("blockquote")[this.pai].innerHTML;
                
                for(var j=0;j<$id(this.subj+"_b").getElementsByTagName("h2").length;j++)
                {
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

                    <div class="blank5"></div>
                    <!--相册 END-->
                </div>
                <!--商品图片和相册 end-->
                
                <div class="textInfo">
                    <form action="<?php echo U('index');?>&act=buy" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
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
                            <!-- 显示商品货号-->
                            <?php if(C("ec_show_goodssn")){?>
                                <li class="clearfix">
                                    <dd>
                                        <strong>商品货号：</strong><?php echo $goods['goods_sn'];?>
                                    </dd>
                                </li>
                            <?php }?>
                            <!--显示商品品牌-->
                            <?php if($goods['goods_brand'] <> '' and  C("ec_show_brand")){?>
                                <li class="clearfix">
                                    <dd>
                                        <strong>商品品牌：</strong>
                                        <a href="<?php echo $goods['goods_brand_url'];?>" ><?php echo $goods['goods_brand'];?></a>
                                    </dd>
                                </li>
                            <?php }?>
                            <!--商品重量-->
                            <?php if(C("ec_show_goodsweight")){?>
                                <li class="clearfix">
                                    <dd>
                                        <strong>商品重量：</strong><?php echo $goods['goods_weight'];?>
                                    </dd>
                                </li>
                            <?php }?>
                            <li class="clearfix">
                                <dd>
                                    <strong>消耗积分：</strong>
                                    <font class="shop"><?php echo $goods['exchange_integral'];?></font><br />
                                </dd>
                            </li>
                            <!-- 开始循环所有可选属性  -->
                            <!--循环规格开始 -->
                            <?php if(is_array($specification)):?><?php $index=0; ?><?php  foreach($specification as $spec_key=>$spec){ ?>
                                <li class="padd loop">
                                    <strong><?php echo $spec['name'];?>:</strong><br />
                                    <!-- 规格显示方式：单选按钮 -->
                                    <?php if(C("ec_goodsattr_style")== 1){?>
                                        <?php if(is_array($spec['values'])):?><?php $index=0; ?><?php  foreach($spec['values'] as $key=>$value){ ?>
                                            <label for="spec_value_<?php echo $value['id'];?>">
                                                <input type="radio" name="spec_<?php echo $spec_key;?>" value="<?php echo $value['id'];?>" id="spec_value_<?php echo $value['id'];?>" <?php if($key == 0){?>checked<?php }?>  />
                                                <?php echo $value['label'];?> 
                                            </label>
                                        <?php $index++; ?><?php }?><?php endif;?>
                                    <?php  }else{ ?>
                                        <!-- 规格显示方式：下拉列表 -->
                                        <select name="spec_<?php echo $spec_key;?>" style="border:1px solid #ccc;">
                                            <?php if(is_array($spec['values'])):?><?php $index=0; ?><?php  foreach($spec['values'] as $key=>$value){ ?>
                                                <option label="<?php echo $value['label'];?>" value="<?php echo $value['id'];?>"><?php echo $value['label'];?> </option>
                                            <?php $index++; ?><?php }?><?php endif;?>
                                        </select>
                                    <?php }?>
                                </li>
                            <?php $index++; ?><?php }?><?php endif;?>
                            <!--结束循环可选属性-->
                            <li class="padd">
                                <input type="hidden" name="goods_id" value="<?php echo $goods['goods_id'];?>" />
                                <input type="submit" value="立刻兑换" class="bnt_blue_1"/>
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
                            <h2>商品描述：</h2>
                            <h2 class="h2bg">商品属性：</h2>
                        </div>
                    </h3>
                    
                    <div id="com_v" class="boxCenterList RelaArticle"></div>
                    
                    <div id="com_h">
                        <blockquote>
                            <?php echo $goods['goods_desc'];?>
                        </blockquote>
                        
                        <blockquote>
                            <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#dddddd">
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
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                reg("com");
            </script>
            
            <div class="blank"></div>
            <!--商品描述，商品属性 END-->
            
        </div>
        <!--right end-->
    </div>
    <div class="blank"></div>
    
    <!--帮助-->
    <div class="block">
        <div class="box">
            <div class="helpTitBg clearfix">
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($helps){?>
    <?php if(is_array($helps)):?><?php $index=0; ?><?php  foreach($helps as $help_cat){ ?>
        <dl>
            <dt><a href='<?php echo $help_cat['cat_id'];?>' title="<?php echo $help_cat['cat_name'];?>"><?php echo $help_cat['cat_name'];?></a></dt>
            <?php if(is_array($help_cat['article'])):?><?php $index=0; ?><?php  foreach($help_cat['article'] as $item){ ?>
                <dd><a href="<?php echo $item['url'];?>" title="<?php echo $item['title'];?>"><?php echo $item['short_title'];?></a></dd>
            <?php $index++; ?><?php }?><?php endif;?>
        </dl>
    <?php $index++; ?><?php }?><?php endif;?>
<?php }?>
            </div>
        </div>
    </div>
    <div class="blank"></div>
    <!--帮助-->
    
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

</html>