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
    <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/utils.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/common.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/global.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/compare.js"></script>
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
        <font class="f4_b"><?php echo $user_info['username'];?></font>
        <a href="<?php echo U('ec/EcUser/index');?>">ユーザセンタ</a>|
        <a href="<?php echo U('ec/EcUser/index');?>&act=logout">ログアウト</a>
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
    <a href="<?php echo U('ec/EcIndex/index');?>"<?php if($navigator_list['config']['index'] == 1){?> class="cur"<?php }?> >トップ<span></span></a>
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
                    alert("検索キーワードを入力してください！");
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
            <option value="0">全てカテゴリから</option>
            <?php echo $category_list;?>
        </select>
        <input name="keywords" type="text" id="keyword" value="<?php echo $search_keywords;?>" class="B_input"  style="width:110px;"/>
        <input name="imageField" type="submit" value="検索"  style="cursor:pointer;" />
        <a href="<?php echo U('ec/EcSearch/index');?>&act=advanced_search">高級検索</a>
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
            <?php if($action == 'form'){?>
                <!--  搜索的表单 -->
                <div class="box">
                    <div class="box_1">
                        <h3><span>高级搜索</span></h3>
                        <div class="boxCenterList">
                            <form action="search.php" method="get" name="advancedSearchForm" id="advancedSearchForm">
                                <table border="0" align="center" cellpadding="3">
                                    <tr>
                                        <td valign="top">关键字：</td>
                                        <td>
                                            <input name="keywords" id="keywords" type="text" size="40" maxlength="120" class="inputBg" value="<?php echo $adv_val['keywords'];?>" />
                                            <label for="sc_ds"><input type="checkbox" name="sc_ds" value="1" id="sc_ds" <?php echo $scck;?> />搜索简介</label>
                                            <br />
                                            匹配多个关键字全部，可用 "空格" 或 "AND" 连接。如 win32 AND unix<br />
                                            匹配多个关键字其中部分，可用"+"或 "OR" 连接。如 win32 OR unix
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>分类：</td>
                                        <td>
                                            <select name="category" id="select" style="border:1px solid #ccc;">
                                                <option value="0">所有分类</option>
                                                <?php echo $cat_list;?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>品牌：</td>
                                        <td>
                                            <select name="brand" id="brand" style="border:1px solid #ccc;">
                                                <option value="0">所有品牌</option>
                                                <?php if(isset($brand_list) && !empty($brand_list)):$arr["options"]=$brand_list;$arr["selected"]=$adv_val['brand'];echo html_options($arr);endif;
?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>价格：</td>
                                        <td>
                                            <input name="min_price" type="text" id="min_price" class="inputBg" value="<?php echo $adv_val['min_price'];?>" size="10" maxlength="8" />
                                            -
                                            <input name="max_price" type="text" id="max_price" class="inputBg" value="<?php echo $adv_val['max_price'];?>" size="10" maxlength="8" />
                                        </td>
                                    </tr>
                                    <?php if($goods_type_list){?>
                                        <tr>
                                            <td>扩展选项：</td>
                                            <td>
                                                <select name="goods_type" onchange="this.form.submit()" style="border:1px solid #ccc;">
                                                    <option value="0">请选择</option>
                                                    <?php if(isset($goods_type_list) && !empty($goods_type_list)):$arr["options"]=$goods_type_list;$arr["selected"]=$goods_type_selected;echo html_options($arr);endif;
?>
                                                </select>
                                            </td>
                                        </tr>
                                    <?php }?>
                                    <?php if($goods_type_selected > 0){?>
                                        TODO:search.html---2;
                                    <?php }?>
                                    <?php if($use_storage == 1){?>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <label for="outstock"><input type="checkbox" name="outstock" value="1" id="outstock" <?php if($outstock){?>checked="checked"<?php }?>/> 隐藏已脱销的商品</label>
                                        </td>
                                    </tr>
                                    <?php }?>
                                    <tr>
                                        <td colspan="4" align="center">
                                            <input type="hidden" name="action" value="form" />
                                            <input type="submit" name="Submit" class="bnt_blue_1" value="立刻搜索" />
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="blank5"></div>
            <?php }?>
            <?php if(isset($goods_list)){?>
                <div class="box">
                    <div class="box_1">
                        <h3>
                            <!--标题及显示方式-->
                            <?php if($intromode == 'best'){?>
                                <span>精品推荐</span>
                            <?php  }elseif($intromode == 'new'){ ?>
                                <span>新品上市</span>
                            <?php  }elseif($intromode == 'hot'){ ?>
                                <span>热销商品</span>
                            <?php  }elseif($intromode == 'promotion'){ ?>
                                <span>促销商品</span>
                             <?php  }else{ ?>
                                <span>搜索结果</span>   
                            <?php }?>
                            <?php if($goods_list){?>
                                <form action="<?php echo U('index');?>" method="post" class="sort" name="listform" id="form">
                                    显示方式
                                    <a href="javascript:;" onClick="javascript:display_mode('list')"><img src="http://www.metacms.com/template/v5/ec/common/style/images/display_mode_list<?php if($pager['display'] == 'list'){?>_act<?php }?>.gif" alt="列表显示"/></a>
                                    <a href="javascript:;" onClick="javascript:display_mode('grid')"><img src="http://www.metacms.com/template/v5/ec/common/style/images/display_mode_grid<?php if($pager['display'] == 'grid'){?>_act<?php }?>.gif" alt="格子显示"/></a>
                                    <a href="javascript:;" onClick="javascript:display_mode('text')"><img src="http://www.metacms.com/template/v5/ec/common/style/images/display_mode_text<?php if($pager['display'] == 'text'){?>_act<?php }?>.gif" alt="文字显示"/></a>&nbsp;&nbsp;
                                    <select name="sort">
                                        <?php if(isset($lang['sort']) && !empty($lang['sort'])):$arr["options"]=$lang['sort'];$arr["selected"]=$pager['search']['sort'];echo html_options($arr);endif;
?>
                                    </select>
                                    <select name="order">
                                        <?php if(isset($lang['order']) && !empty($lang['order'])):$arr["options"]=$lang['order'];$arr["selected"]=$pager['search']['order'];echo html_options($arr);endif;
?>
                                    </select>
                                    <input type="image" name="imageField" src="http://www.metacms.com/template/v5/ec/common/style/images/bnt_go.gif" alt="go"/>
                                    <input type="hidden" name="page" value="<?php echo $pager['page'];?>" />
                                    <input type="hidden" name="display" value="<?php echo $pager['display'];?>" id="display" />
                                    <?php if(is_array($pager['search'])):?><?php $index=0; ?><?php  foreach($pager['search'] as $key=>$item){ ?>
                                        <?php if($key <> 'sort' and $key <> 'order'){?>
                                            <?php if($key == 'keywords'){?>
                                                <input type="hidden" name="<?php echo $key;?>" value="<?php echo urldecode($item);?>" />
                                            <?php  }else{ ?>
                                                <input type="hidden" name="<?php echo $key;?>" value="<?php echo $item;?>" />
                                            <?php }?>
                                        <?php }?>
                                    <?php $index++; ?><?php }?><?php endif;?>
                                </form>
                            <?php }?>
                        </h3>
                        <?php if(isset($goods_list)){?>
                            <form action="<?php echo U('ec/EcCompare/index');?>" method="post" name="compareForm" id="compareForm" onsubmit="return compareGoods(this);">
                                <?php if($pager['display'] == 'list'){?>
                                    TODO:search.html--2;
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
                                                        <a href="javascript:;" id="compareLink" onClick="Compare.add(<?php echo $goods['goods_id'];?>,'<?php echo $goods['goods_name'];?>','<?php echo $goods['type'];?>')" class="f6">比较</a>
                                                    </div>
                                                <?php }?>
                                            <?php $index++; ?><?php }?><?php endif;?>
                                        </div>
                                    </div>
                                <?php  }elseif($pager['display'] == 'text'){ ?>
                                    TODO:search.html--4;
                                <?php }?>
                            </form>
                            <script type="text/javascript">
                                <?php if(is_array($lang['compare_js'])):?><?php $index=0; ?><?php  foreach($lang['compare_js'] as $key=>$item){ ?>
                                    var <?php echo $key;?> = "<?php echo $item;?>";
                                <?php $index++; ?><?php }?><?php endif;?>
                                
                                <?php if(is_array($lang['compare_js'])):?><?php $index=0; ?><?php  foreach($lang['compare_js'] as $key=>$item){ ?>
                                    <?php if($key <> 'button_compare'){?>
                                        var <?php echo $key;?> = "<?php echo $item;?>";
                                    <?php  }else{ ?>
                                        var button_compare = '';
                                    <?php }?>
                                <?php $index++; ?><?php }?><?php endif;?>
                                
                                var compare_no_goods = "您没有选定任何需要比较的商品或者比较的商品数少于 2 个。";
                                
                                window.onload = function()
                                {
                                    Compare.init();
                                    fixpng();
                                }
                                
                                var btn_buy = "购买";
                                var is_cancel = "取消";
                                var select_spe = "请选择商品属性";
                            </script>
                        <?php  }else{ ?>
                            <div style="padding:20px 0px; text-align:center" class="f5" >无法搜索到您要找的商品！</div>
                        <?php }?>
                    </div>
                </div>
                <div class="blank"></div>
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--翻页 start-->
<form name="selectPageForm" action="" method="get">
    <input type="hidden" name="m" value="<?php echo $pager['current_meth'];?>"/>
    <input type="hidden" name="c" value="<?php echo $pager['current_control'];?>"/>
    <input type="hidden" name="a" value="<?php echo $pager['current_app'];?>"/>
    <?php if($pager['styleid'] == 0){?>
        <div id="pager">
            総計 <?php echo $pager['record_count'];?> 個の商品，全部 <?php echo $pager['page_count'];?> ページ。
            <span>
                <a href="<?php echo $pager['page_first'];?>">第一ページ </a> 
                <a href="<?php echo $pager['page_prev'];?>">前</a>
                <a href="<?php echo $pager['page_next'];?>">次</a> 
                <a href="<?php echo $pager['page_last'];?>">一番末页</a>
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
            <span class="f_l f6" style="margin-right:10px;">総計<b><?php echo $pager['record_count'];?></b> 個の商品</span>
            <?php if($pager['page_first']){?>
                <a href="<?php echo $pager['page_first'];?>">第一ページ ...</a>
            <?php }?>
            <?php if($pager['page_prev']){?>
                <a class="prev" href="<?php echo $pager['page_prev'];?>">前</a>
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
                <a class="next" href="<?php echo $pager['page_next'];?>">次</a>
            <?php }?>
            <?php if($pager['page_last']){?>
                <a class="last" href="<?php echo $pager['page_last'];?>">...一番末页</a>
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
            <?php }?>
        </div>
        <!--right end-->
        
    </div>
    <div class="blank5"></div>
    
    
    
    
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

</html>