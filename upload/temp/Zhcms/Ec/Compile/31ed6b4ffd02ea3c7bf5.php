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
    <script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/global.js"></script>
    <script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/compare.js"></script>
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
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($filter_attr_list){?>
    TODO:filter_attr.lbi
<?php }?>
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($price_grade){?>
    TODO:price_grade.lbi
<?php }?>
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
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($hot_goods){?>
<div class="box">
    <div class="box_2 centerPadd">
        <div class="itemTit Hot" id="itemHot"></div>
        <div id="show_hot_area" class="clearfix goodsBox">
            <?php if(is_array($hot_goods)):?><?php $index=0; ?><?php  foreach($hot_goods as $goods){ ?>
            <div class="goodsItem">
                <span class="hot"></span>
                <a href="<?php echo $goods['url'];?>">
                    <img src="<?php echo $goods['thumb'];?>" alt="<?php echo $goods['name'];?>" class="goodsimg" />
                </a><br />
                <p><a href="<?php echo $goods['url'];?>" title="<?php echo $goods['name'];?>"><?php echo $goods['short_style_name'];?></a></p>
                消耗积分：<font class="f1"><?php echo $goods['exchange_integral'];?></font>
            </div>
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>
<div class="blank5"></div>
<?php }?>
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
        <!--翻页 start-->
        <div id="pager" class="pagebar">
            <span class="f_l f6" style="margin-right:10px;">总计<b><?php echo $pager['record_count'];?></b> 个记录</span>
            <?php if($pager['page_first']){?>
                <a href="<?php echo $pager['page_first'];?>">第一页 ...</a>
            <?php }?>
            <?php if($pager['page_prev']){?>
                <a class="prev" href="<?php echo $pager['page_prev'];?>">上一页</a>
            <?php }?>
            <?php if($pager['page_count'] <> 1){?>
                <?php if(is_array($pager['page_number'])):?><?php $index=0; ?><?php  foreach($pager['page_number'] as $key=>$item){ ?>
                    <?php if($pager['page'] == $key){?>
                        <span class="page_now"><?php echo $key;?></span>
                    <?php  }else{ ?>
                        <a href="<?php echo $item;?>">[<?php echo $key;?>]</a>
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
            <?php }?>
            <?php if($pager['page_next']){?>
                <a class="next" href="<?php echo $pager['page_next'];?>">下一页</a>
            <?php }?>
            <?php if($pager['page_last']){?>
                <a class="last" href="<?php echo $pager['page_last'];?>">...最末页</a>
            <?php }?>
            <?php if($pager['page_kbd']){?>
                <?php if(is_array($pager['search'])):?><?php $index=0; ?><?php  foreach($pager['search'] as $key=>$item){ ?>
                    <?php if($key == 'keywords'){?>
                        <input type="hidden" name="<?php echo $key;?>" value="<?php echo urldecode($item);?>" />
                    <?php  }else{ ?>
                        <input type="hidden" name="<?php echo $key;?>" value="<?php echo $item;?>" />
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
                <kbd style="float:left; margin-left:8px; position:relative; bottom:3px;">
                    <input type="text" name="page" onkeydown="if(event.keyCode==13)selectPage(this)" size="3" class="B_blue" />
                </kbd>
            <?php }?>
        </div>
        <!--翻页 END-->
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