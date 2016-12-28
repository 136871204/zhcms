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
    <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/common.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/lefttime.js"></script>
    <script type="text/javascript">
        var process_request = "正在处理您的请求...";
        var goodsname_not_null = "商品名不能为空！";
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
var process_request = "処理中...";
</script>
<div class="block clearfix">
    <div class="f_l">
        <a href="<?php echo U('index/Index/index');?>" name="top">
            トップページ
        </a>&nbsp;|&nbsp;
        <a href="<?php echo U('ec/EcIndex/index');?>" name="top">
            ECデモトップ
        </a>
    </div>
    <div class="f_r log">
        <ul>
            <li class="userInfo">
                <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/transport.js"></script>
                <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/utils.js"></script>
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
    いらっしゃいませ&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo U('ec/EcUser/index');?>">ログイン</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=register">登録</a>
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
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/transport.js"></script>
<div class="cart" id="ECS_CARTINFO">
<?php
echo insert_cart_info();
?>
</div>
<div class="blank5"></div>
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($cat_list){?>
<div class="box">
    <div class="box_1">
        <div id="category_tree">
            <?php if(is_array($cat_list)):?><?php $index=0; ?><?php  foreach($cat_list as $cat){ ?>
            <dl>
                <dt><a href="<?php echo $cat['url'];?>"><?php echo $cat['cat_name'];?> <?php if($cat['goods_num']){?>(<?php echo $cat['goods_num'];?>)<?php }?></a></dt>
            </dl>
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>
<div class="blank5"></div>
<?php }?>
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

            <div class="box">
                <div class="box_1">
                    <h3><span>您的选择</span></h3>
                    <div class="boxCenterList clearfix">
                        <ul>
                            <?php if(is_array($picks)):?><?php $index=0; ?><?php  foreach($picks as $pick){ ?>
                                <li style="word-break:break-all;"><a href="<?php echo $pick['url'];?>"><?php echo $pick['name'];?></a></li>
                            <?php $index++; ?><?php }?><?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
        </div>
        <!--left end-->
        <!--right start-->
        <div class="AreaR">
            <div class="box">
                <div class="box_1">
                    <h3><span>选购中心</span></h3>
                    <div class="boxCenterList">
                        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                            <?php if(is_array($condition)):?><?php $index=0; ?><?php  foreach($condition as $caption){ ?>
                                <tr>
                                    <td bgcolor="#e5ecfb" style="border-bottom: 1px solid #DADADA">
                                        <img src="http://www.metacms.com/template/v5/ec/common/style/images/note.gif" alt="no alt" />
                                        &nbsp;&nbsp;
                                        <strong class="f_red"><?php echo $caption['name'];?></strong>
                                    </td>
                                </tr>
                                <?php if(is_array($caption['cat'])):?><?php $index=0; ?><?php  foreach($caption['cat'] as $cat){ ?>
                                    <tr>
                                        <td bgcolor="#ffffff">&nbsp;&nbsp;<strong><?php echo $cat['cat_name'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#ffffff">
                                            &nbsp;&nbsp;
                                            <?php if(is_array($cat['list'])):?><?php $index=0; ?><?php  foreach($cat['list'] as $list){ ?>
                                                &nbsp;&nbsp;<a href="<?php echo $list['url'];?>" class="f6"><?php echo $list['name'];?></a>
                                            <?php $index++; ?><?php }?><?php endif;?>
                                        </td>
                                    </tr>
                                <?php $index++; ?><?php }?><?php endif;?>
                            <?php $index++; ?><?php }?><?php endif;?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <div class="box">
                <div class="box_1">
                    <h3>
                        <span>搜索结果 (<?php echo $count;?>)</span>
                    </h3>
                    <div class="boxCenterList clearfix">
                        <?php if(is_array($pickout_goods)):?><?php $index=0; ?><?php  foreach($pickout_goods as $goods){ ?>
                            <div class="goodsItem">
                                <a href="<?php echo $goods['url'];?>">
                                    <img src="<?php echo $goods['thumb'];?>" alt="<?php echo $goods['name'];?>" class="goodsimg" />
                                </a><br />
                                <p><a href="<?php echo $goods['url'];?>" title="<?php echo $goods['name'];?>"><?php echo $goods['short_name'];?></a></p>
                                <a href="javascript:addToCart(<?php echo $goods['id'];?>)">
                                    <img src="http://www.metacms.com/template/v5/ec/common/style/images/bnt_buy.gif" />
                                </a> 
                                <a href="javascript:collect(<?php echo $goods['id'];?>)">
                                    <img src="http://www.metacms.com/template/v5/ec/common/style/images/bnt_coll.gif" />
                                </a>
                                <font class="f1">
                                    <?php if($goods['promote_price'] <> ''){?>
                                        促销价：<?php echo $goods['promote_price'];?>
                                    <?php  }else{ ?>
                                        本店售价：<?php echo $goods['shop_price'];?>
                                    <?php }?>
                                </font>
                            </div>
                        <?php $index++; ?><?php }?><?php endif;?>
                        <?php if($count > 5){?>
                            <div class="more f_r" style="clear:both;">
                                <a href="<?php echo $url;?>"><img src="http://www.metacms.com/template/v5/ec/common/style/images/more.gif" /></a>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
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
                    <img src="http://www.metacms.com/template/v5/ec/common/style/images/bnt_top.gif" />
                </a> 
                <a href="<?php echo U('ec/EcIndex/index');?>"><img src="http://www.metacms.com/template/v5/ec/common/style/images/bnt_home.gif" /></a>
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
                    <img src="http://www.metacms.com/template/v5/ec/common/style/images/yahoo.gif" width="18" height="17" border="0" alt="Yahoo Messenger" /> <?php echo $im;?>
                </a>
            <?php }?>
        <?php $index++; ?><?php }?><?php endif;?>
        <!-- MSN Messenger -->
        <?php if(is_array($msn)):?><?php $index=0; ?><?php  foreach($msn as $im){ ?>
            <?php if($im){?>
                <img src="http://www.metacms.com/template/v5/ec/common/style/images/msn.gif" width="18" height="17" border="0" alt="MSN" /> 
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
var gmt_end_time = "0";
var day = "天";
var hour = "小时";
var minute = "分钟";
var second = "秒";
var end = "结束";

var btn_buy = "购买";
var is_cancel = "取消";
var select_spe = "请选择商品属性";


onload = function()
{
    try
    {
    onload_leftTime();
    }
    catch (e)
    {}
}

</script>
</html>