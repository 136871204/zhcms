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
    <script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/lefttime.js"></script>
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
            <div class="blank5"></div>
            <div class="box">
                <div class="box_1">
                    <h3><span>团购商品详情</span></h3>
                    <div class="boxCenterList">
                        <ul class="group clearfix">
                            <li style="margin-right:8px; text-align:center;">
                                <a href="<?php echo $gb_goods['url'];?>">
                                    <img src="<?php echo $gb_goods['goods_thumb'];?>" alt="<?php echo $gb_goods['goods_name'];?>" />
                                </a>
                            </li>
                            <li style="width:555px; line-height:23px;">
                                团购商品：<font class="f5"><?php echo $gb_goods['goods_name'];?></font><br/>
                                <?php if(C("ec_show_goodssn")){?>
                                   商品货号：<?php echo $gb_goods['goods_sn'];?><br/>
                                <?php }?>
                                <?php if($gb_goods['brand_name'] <> '' and  C("ec_show_brand")){?>
                                    商品品牌：<?php echo $gb_goods['brand_name'];?><br/>
                                <?php }?>
                                <?php if(C("ec_show_goodsweight")){?>
                                    商品重量：<?php echo $gb_goods['goods_weight'];?><br/>
                                <?php }?>
                                起止时间：<?php echo $group_buy['formated_start_date'];?> -- <?php echo $group_buy['formated_end_date'];?><br/>
                                价格阶梯：<br />
                                <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                    <tr>
                                        <th width="29%" bgcolor="#FFFFFF">数量</th>
                                        <th width="71%" bgcolor="#FFFFFF">价格</th>
                                    </tr>
                                    <?php if(is_array($group_buy['price_ladder'])):?><?php $index=0; ?><?php  foreach($group_buy['price_ladder'] as $item){ ?>
                                        <tr>
                                            <td width="29%" bgcolor="#FFFFFF"><?php echo $item['amount'];?></td>
                                            <td width="71%" bgcolor="#FFFFFF"><?php echo $item['formated_price'];?></td>
                                        </tr>
                                    <?php $index++; ?><?php }?><?php endif;?>
                                </table>
                                <?php if($group_buy['deposit'] > 0){?>
                                    保证金： <?php echo $group_buy['formated_deposit'];?><br />
                                <?php }?>
                                <?php if($group_buy['restrict_amount'] > 0){?>
                                    限购数量： <?php echo $group_buy['restrict_amount'];?><br />
                                <?php }?>
                                <?php if($group_buy['gift_integral'] > 0){?>
                                    赠送积分： <?php echo $group_buy['gift_integral'];?><br />
                                <?php }?>
                                <?php if($group_buy['status'] == 0){?>
                                    该团购活动尚未开始，请继续关注。
                                <?php  }elseif($group_buy['status'] == 1){ ?>
                                    <font class="f4">
                                         该团购活动正在火热进行中，距离结束时间还有：
                                         <span id="leftTime">请稍等, 正在载入中...</span>
                                    </font><br />
                                    当前价格： <?php echo $group_buy['formated_cur_price'];?><br />
                                    当前定购数量： <?php echo $group_buy['valid_goods'];?><br />
                                <?php  }elseif($group_buy['status'] == 2){ ?>
                                    该团购活动已结束，正在等待处理... 当前价格： <?php echo $group_buy['formated_cur_price'];?> 当前定购数量： <?php echo $group_buy['valid_goods'];?>
                                <?php  }elseif($group_buy['status'] == 3){ ?>
                                    该团购活动已成功结束！
                                    成交价格： <?php echo $group_buy['formated_trans_price'];?><br />
                                    成交数量： <?php echo $group_buy['trans_amount'];?>
                                <?php  }elseif($group_buy['status'] == 4){ ?>
                                    该团购活动已结束，没有成功。
                                <?php }?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <div class="box">
                <div class="box_1">
                    <h3><span>商品属性：</span></h3>
                    <div class="boxCenterList">
                        <form action="group_buy.php?act=buy" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY">
                            <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                <?php if(is_array($specification)):?><?php $index=0; ?><?php  foreach($specification as $spec_key=>$spec){ ?>
                                    <tr>
                                        <td width="22%" bgcolor="#FFFFFF"><?php echo $spec['name'];?></td>
                                        <td width="78%" bgcolor="#FFFFFF">
                                            <?php if(C("ec_goodsattr_style")== 1){?>
                                                <?php if(is_array($spec['values'])):?><?php $index=0; ?><?php  foreach($spec['values'] as $key=>$value){ ?>
                                                    <label for="spec_value_<?php echo $value['id'];?>">
                                                        <input type="radio" name="spec_<?php echo $spec_key;?>" value="<?php echo $value['id'];?>" id="spec_value_<?php echo $value['id'];?>" <?php if($key == 0){?>checked<?php }?> />
                                                        <?php echo $value['label'];?> 
                                                    </label>
                                                <?php $index++; ?><?php }?><?php endif;?>
                                            <?php  }else{ ?>
                                                <select name="spec_<?php echo $spec_key;?>" style="border:1px solid #ccc;">
                                                    <?php if(is_array($spec['values'])):?><?php $index=0; ?><?php  foreach($spec['values'] as $key=>$value){ ?>
                                                        <option label="<?php echo $value['label'];?>" value="<?php echo $value['id'];?>"><?php echo $value['label'];?> </option>
                                                    <?php $index++; ?><?php }?><?php endif;?>
                                                </select>
                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php $index++; ?><?php }?><?php endif;?>
                                <!--如果登录了，显示购买按钮 -->
                                <?php if($_SESSION['ec_user_id'] > 0){?>
                                    <tr>
                                        <td bgcolor="#FFFFFF"><strong>购买数量:</strong></td>
                                        <td bgcolor="#FFFFFF">
                                            <input name="number" type="text" class="inputBg" id="number" value="1" size="4" />
                                            <input type="hidden" name="group_buy_id" value="<?php echo $group_buy['group_buy_id'];?>" />
                                            <input type="image" src="http://www.works.com/template/v4/ec/common/style/images/bnt_buy_1.gif" style="vertical-align:middle;" />
                                        </td>
                                    </tr>
                                <?php  }else{ ?>
                                    <tr>
                                        <td colspan="2" align="right" bgcolor="#FFFFFF"><br />
                                        <font class="f_red">提示：您需要先注册成为本站会员并且登录后，才能参加商品团购!</font></td>
                                    </tr>
                                <?php }?>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <div class="box">
                <div class="box_1">
                    <h3><span>团购说明</span></h3>
                    <div class="boxCenterList">
                        <?php echo $group_buy['group_buy_desc'];?>
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
var gmt_end_time = <?php echo default_value($group_buy['gmt_end_date'],0);?>;
var day = "天";
var now_time = 1460012680;
var hour = "小时";
var now_time = 1460012680;
var minute = "分钟";
var now_time = 1460012680;
var second = "秒";
var now_time = 1460012680;
var end = "结束";
var now_time = 1460012680;

onload = function()
{
  try
  {
    onload_leftTime(now_time);
  }
  catch (e)
  {}
}
</script>
</html>