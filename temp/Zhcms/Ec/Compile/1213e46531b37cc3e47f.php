<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
TODO:
1.application/rss+xml 部分的设置之后设置
 -->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Keywords" content="<?php echo $keywords;?>" />
        <meta name="Description" content="<?php echo $description;?>" />
        <title><?php echo $page_title;?></title>
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="icon" href="animated_favicon.gif" type="image/gif" />
        <link href="<?php echo $ecs_css_path;?>" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="http://www.metacms.com/template/v4/ec/common/js/common.js"></script>
        <script type="text/javascript" src="http://www.metacms.com/template/v4/ec/common/js/index.js"></script>
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
                <script type="text/javascript" src="http://www.metacms.com/template/v4/ec/common/js/transport.js"></script>
                <script type="text/javascript" src="http://www.metacms.com/template/v4/ec/common/js/utils.js"></script>
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
    <a href="<?php echo U('ec/EcUser/index');?>"><img src="http://www.metacms.com/template/v4/ec/common/style/images/bnt_log.gif" /></a>
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


        <div class="blank"></div>
        <div class="block clearfix">
            <!--left start-->
            <div class="AreaL">
                <!--站内公告 start-->
                <div class="box">
                    <div class="box_1">
                        <h3><span>商店公告</span></h3>
                        <div class="boxCenterList RelaArticle">
                            <?php echo $shop_notice;?>
                        </div>
                    </div>
                </div>
                <div class="blank5"></div>
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><script type="text/javascript" src="http://www.metacms.com/template/v4/ec/common/js/transport.js"></script>
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
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="box">
    <div class="box_2">
        <div class="top10Tit"></div>
        <div class="top10List clearfix">
            <?php if(is_array($top_goods)):?><?php $index=0; ?><?php  foreach($top_goods as $top_goods_key=>$goods){ ?>
                <?php $t_top_goods_key=$top_goods_key+1; ?>
                <ul class="clearfix">
                    <img src="http://www.metacms.com/template/v4/ec/common/style/images/top_<?php echo $t_top_goods_key;?>.gif" class="iteration" />
                    <?php if($t_top_goods_key < 4){?>
                        <li class="topimg">
                            <a href="<?php echo $goods['url'];?>">
                                <img src="<?php echo $goods['thumb'];?>" alt="<?php echo $goods['name'];?>" class="samllimg" />
                            </a>
                        </li>
                    <?php }?>
                    <li <?php if($t_top_goods_key < 4){?>class="iteration1"<?php }?>>
                        <a href="<?php echo $goods['url'];?>" title="<?php echo escape($goods['name'],html);?>"><?php echo $goods['short_name'];?></a><br />
                        本店售价：<font class="f1"><?php echo $goods['price'];?></font><br />
                    </li>
                </ul>
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($promotion_info){?>
<!-- 促销信息 -->
<div class="box">
    <div class="box_1">
        <h3><span>促销信息</span></h3>
        <div class="boxCenterList RelaArticle">
            <?php if(is_array($promotion_info)):?><?php $index=0; ?><?php  foreach($promotion_info as $promotion_info_key=>$item){ ?>
                <?php if($item['type'] == 'snatch'){?>
                    <a href="<?php echo u('ec/EcSnatch/index');?>" title="[夺宝]">[夺宝]</a>
                <?php  }elseif($item['type'] == 'group_buy'){ ?>
                    <a href="<?php echo u('ec/EcGroupBuy/index');?>" title="[团购]">[团购]</a>
                <?php  }elseif($item['type'] == 'auction'){ ?>
                    <a href="<?php echo u('ec/EcAuction/index');?>" title="[拍卖]">[拍卖]</a>
                <?php  }elseif($item['type'] == 'favourable'){ ?>
                    <a href="<?php echo u('ec/EcActivity/index');?>" title="[优惠]">[优惠]</a>
                <?php  }elseif($item['type'] == 'package'){ ?>
                    <a href="<?php echo u('ec/EcPackage/index');?>" title="[礼包]">[礼包]</a>
                <?php }?>
                <a href="<?php echo $item['url'];?>" title="<?php echo $item['act_name'];?><?php echo $item['time'];?>" style="background:none; padding-left:0px;">
                    <?php echo $item['act_name'];?>
                </a><br />
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>
<div class="blank5"></div>
<?php }?>
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if(empty($order_query)){?>
    <script>
        var invalid_order_sn = "无效订单号";
    </script>
    <div class="box">
        <div class="box_1">
            <h3><span>订单查询</span></h3>
            <div class="boxCenterList">
                <form name="ecsOrderQuery">
                    <input type="text" name="order_sn" class="inputBg" /><br />
                    <div class="blank5"></div>
                    <input type="button" value="查询该订单号" class="bnt_blue_2" onclick="orderQuery()" />
                </form>
                <div id="ECS_ORDER_QUERY" style="margin-top:8px;">
                    <?php  }else{ ?>
                        <?php if($order_query['user_id']){?>
                            <b>订单号：</b>
                            <a href="<?php echo U('ec/EcUser/index');?>&act=order_detail&order_id=<?php echo $order_query['order_id'];?>" class="f6">
                                <?php echo $order_query['order_sn'];?>
                            </a><br/>
                        <?php  }else{ ?>
                            <b>订单号：</b><?php echo $order_query['order_sn'];?><br/>
                        <?php }?>
                        <b>订单状态：</b><br/><font class="f1"><?php echo $order_query['order_status'];?></font><br/>
                        <?php if($order_query['invoice_no']){?>
                            <b>发货单：</b><?php echo $order_query['invoice_no'];?><br/>
                        <?php }?>
                        <?php if($order_query['shipping_date']){?>
                            发货时间： <?php echo $order_query['shipping_date'];?><br/>
                        <?php }?>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
<div class="blank5"></div>
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($invoice_list){?>
    <style type="text/css">
    .boxCenterList form{display:inline;}
    .boxCenterList form a{color:#404040; text-decoration:underline;}
    </style>
    <div class="box">
        <div class="box_1">
            <h3><span>发货查询</span></h3>
            <div class="boxCenterList">
                <?php if(is_array($invoice_list)):?><?php $index=0; ?><?php  foreach($invoice_list as $invoice){ ?>
                    订单号 <?php echo $invoice['order_sn'];?><br />
                    发货单 <?php echo $invoice['invoice_no'];?>
                    <div class="blank"></div>
                <?php $index++; ?><?php }?><?php endif;?>
            </div>
        </div>
    </div>
    <div class="blank5"></div>
<?php }?>
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--
TODO:
1.javascipty方法没有完成
 -->
<?php 
    $vote = get_vote();
    if (!empty($vote))
    {
        $vote_id=$vote['id'];
        $vote=$vote['content'];
    }
    //p($vote);
?>
<?php if($vote){?>
    <script type="text/javascript" src="http://www.metacms.com/template/v4/ec/common/js/transport.js"></script>
    <div id="ECS_VOTE">
        <div  class="box">
            <div class="box_1">
                <h3><span>在线调查</span></h3>
                <div  class="boxCenterList">
                    <form id="formvote" name="ECS_VOTEFORM" method="post" action="javascript:submit_vote()">
                        <?php if(is_array($vote)):?><?php $index=0; ?><?php  foreach($vote as $title){ ?>
                        <?php echo $title['vote_name'];?><br />
                        (参与人次:<?php echo $title['vote_count'];?>)<br />
                        <?php $index++; ?><?php }?><?php endif;?>
                        <?php if(is_array($vote)):?><?php $index=0; ?><?php  foreach($vote as $title){ ?>
                            <?php if(is_array($title['options'])):?><?php $index=0; ?><?php  foreach($title['options'] as $item){ ?>
                                <?php if($title['can_multi'] == 0){?>
                                    <input type="checkbox" name="option_id" value="<?php echo $item['option_id'];?>" />
                                    <?php echo $item['option_name'];?> (<?php echo $item['percent'];?>%)<br />
                                <?php  }else{ ?>
                                    <input type="radio" name="option_id" value="<?php echo $item['option_id'];?>" />
                                    <?php echo $item['option_name'];?> (<?php echo $item['percent'];?>%)<br />
                                <?php }?>
                            <?php $index++; ?><?php }?><?php endif;?>
                            <input type="hidden" name="type" value="<?php echo $title['can_multi'];?>" />
                        <?php $index++; ?><?php }?><?php endif;?>
                        <input type="hidden" name="id" value="<?php echo $vote_id;?>" />
                        <input type="submit" name="submit" style="border:none;" value="提交"  class="bnt_bonus" />
                        <input type="reset" style="border:none;" value="重置" class="bnt_blue" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="blank5"></div>
    <script type="text/javascript">
    /**
    * 处理用户的投票
    */
    function submit_vote()
    {
        var frm     = document.forms['ECS_VOTEFORM'];
        var type    = frm.elements['type'].value;
        var vote_id = frm.elements['id'].value;
        var option_id = 0;
        if (frm.elements['option_id'].checked)
        {
            option_id = frm.elements['option_id'].value;
        }
        else
        {
            for (i=0; i<frm.elements['option_id'].length; i++ )
            {
                if (frm.elements['option_id'][i].checked)
                {
                    option_id = (type == 0) ? option_id + "," + frm.elements['option_id'][i].value : frm.elements['option_id'][i].value;
                }
            }
        }
        if (option_id == 0)
        {
            return;
        }
        else
        {
            var ajaxurl='index.php?a=ec&c=EcVote&m=index';
            Ajax.call(ajaxurl, 'vote=' + vote_id + '&options=' + option_id + "&type=" + type, voteResponse, 'POST', 'JSON');
        }
        
    }
    
    /**
     * 处理投票的反馈信息
     */
    function voteResponse(result)
    {
        if (result.message.length > 0)
        {
            alert(result.message);
        }
        if (result.error == 0)
        {
            var layer = document.getElementById('ECS_VOTE');
            if (layer)
            {
                layer.innerHTML = result.content;
            }
        }
    }
    </script>
<?php }?>

                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--
TODO:
1.javascipty方法没有完成
 -->
<div class="box">
    <div class="box_1">
        <h3><span>邮件订阅</span></h3>
        <div class="boxCenterList RelaArticle">
            <input type="text" id="user_email" class="inputBg" /><br />
            <div class="blank5"></div>
            <input type="button" class="bnt_blue" value="订阅" onclick="add_email_list();" />
            <input type="button" class="bnt_bonus"  value="退订" onclick="cancel_email_list();" />
        </div>
    </div>
</div>
<div class="blank5"></div>
<script type="text/javascript">
var email = document.getElementById('user_email');
function add_email_list()
{
    if (check_email())
    {
        var ajaxurl='index.php?a=ec&c=EcUser&m=index&act=email_list&job=add&email=' + email.value;
        Ajax.call(ajaxurl, '', rep_add_email_list, 'GET', 'TEXT');
    }
}
function rep_add_email_list(text)
{
    alert(text);
}

function cancel_email_list()
{
    if (check_email())
    {
        var ajaxurl='index.php?a=ec&c=EcUser&m=index&act=email_list&job=del&email=' + email.value;
        Ajax.call(ajaxurl, '', rep_cancel_email_list, 'GET', 'TEXT');
    }
}
function rep_cancel_email_list(text)
{
    alert(text);
}

function check_email()
{
    if (Utils.isEmail(email.value))
    {
        return true;
    }
    else
    {
        alert('无效的email地址');
        return false;
    }
}
</script>
            </div>
            <!--left end-->
            
            <!--right start-->
            <div class="AreaR">
                <!--焦点图和站内快讯 START-->
                <div class="box clearfix">
                    <div class="box_1 clearfix">
                        <div class="f_l" id="focus">
                            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><li style="background:url(<?php echo $flash1['src'];?>) center 0 no-repeat; position:relative;">
    <a href="<?php echo $flash1['url'];?>" target="_blank"><img src="upload/ec/data/afficheimg/20150608tunmwb.jpg"  width="480" height="200" /></a>
</li>

                        </div>
                        <!--news-->
                        <div id="mallNews" class="f_r">
                            <div class="NewsTit"></div>
                            <div class="NewsList tc">
                                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><ul>
    <?php if(is_array($new_articles)):?><?php $index=0; ?><?php  foreach($new_articles as $article){ ?>
    <li>
	   [<a href="<?php echo $article['cat_url'];?>"><?php echo $article['cat_name'];?></a>] 
       <a href="<?php echo $article['url'];?>" title="<?php echo $article['title'];?>">
            <?php echo $article['short_title'];?>
       </a>
	</li>
    <?php $index++; ?><?php }?><?php endif;?>
</ul>
                            </div>
                        </div>
                        <!--news end-->
                    </div>
                </div>
                <div class="blank5"></div>
                <!--焦点图和站内快讯 END-->
                
                <!--今日特价，品牌 start-->
                <div class="clearfix">
                    <!--特价-->
                    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($promotion_goods){?>
    <div id="sales" class="f_l clearfix">
        <h1>
            <a href="<?php echo U('ec/EcSearch/index');?>&intro=promotion">
                <img src="http://www.metacms.com/template/v4/ec/common/style/images/more.gif" />
            </a>
        </h1>
        <div class="clearfix goodBox">
            <?php if(is_array($promotion_goods)):?><?php $index=0; ?><?php  foreach($promotion_goods as $promotion_foreach_key=>$goods){ ?>
                <?php if($promotion_foreach_key < 3){?>
                <div class="goodList">
                    <a href="<?php echo $goods['url'];?>">
                        <img src="<?php echo $goods['thumb'];?>" border="0" alt="<?php echo $goods['name'];?>"/>
                    </a><br />
                    <p>
                        <a href="<?php echo $goods['url'];?>" title="<?php echo $goods['name'];?>"><?php echo $goods['short_name'];?></a>
                    </p>
                    促销价：<font class="f1"><?php echo $goods['promote_price'];?></font>
                </div>
                <?php }?>
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
    </div>
<?php }?>
                    <!--品牌-->
                    <div class="box f_r brandsIe6">
                        <div class="box_1 clearfix" id="brands">
                            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($brand_list){?>
    <?php if(is_array($brand_list)):?><?php $index=0; ?><?php  foreach($brand_list as $brand_foreach_key=>$brand){ ?>
        <?php if($brand_foreach_key < 11){?>
            <?php if($brand['brand_logo']){?>
                <a href="<?php echo $brand['url'];?>">
                    <img src="<?php echo $brand['brand_logo'];?>" alt="<?php echo $brand['brand_name'];?> (<?php echo $brand['goods_num'];?>)" />
                </a>
            <?php  }else{ ?>
                <a href="<?php echo $brand['url'];?>">
                    <?php echo $brand['brand_name'];?> <?php if($brand['goods_num']){?>(<?php echo $brand['goods_num'];?>)<?php }?>
                </a>
            <?php }?>
        <?php }?>
    <?php $index++; ?><?php }?><?php endif;?>
    <div class="brandsMore">
        <a href="<?php echo U('ec/EcBrand/index');?>">
            <img src="http://www.metacms.com/template/v4/ec/common/style/images/moreBrands.gif" />
        </a>
    </div>
<?php }?>
                        </div>
                    </div>
                </div>
                <div class="blank5"></div>
                
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($best_goods){?>
    <?php if($cat_rec_sign <> 1){?>
        <div class="box">
            <div class="box_2 centerPadd">
                <div class="itemTit" id="itemBest">
                    <?php if($cat_rec[1]){?>
                        <h2>
                            <a href="javascript:void(0)" onclick="change_tab_style('itemBest', 'h2', this);get_cat_recommend(1, 0);">
                                全部商品
                            </a>
                        </h2>
                        <?php if(is_array($cat_rec[1])):?><?php $index=0; ?><?php  foreach($cat_rec[1] as $rec_data){ ?>
                            <h2 class="h2bg">
                                <a href="javascript:void(0)" onclick="change_tab_style('itemBest', 'h2', this);get_cat_recommend(1, <?php echo $rec_data['cat_id'];?>)">
                                    <?php echo $rec_data['cat_name'];?>
                                </a>
                            </h2>
                        <?php $index++; ?><?php }?><?php endif;?>
                    <?php }?>
                </div>
                <div id="show_best_area" class="clearfix goodsBox">
                    <?php }?>
                    <?php if(is_array($best_goods)):?><?php $index=0; ?><?php  foreach($best_goods as $goods){ ?>
                        <div class="goodsItem">
                            <span class="best"></span>
                            <a href="<?php echo $goods['url'];?>">
                                <img src="<?php echo $goods['thumb'];?>" alt="<?php echo $goods['name'];?>" class="goodsimg" />
                            </a><br />
                            <p><a href="<?php echo $goods['url'];?>" title="<?php echo $goods['name'];?>"><?php echo $goods['short_style_name'];?></a></p>
                            <font class="f1">
                                <?php if($goods['promote_price'] <> ''){?>
                                    <?php echo $goods['promote_price'];?>
                                <?php  }else{ ?>
                                    <?php echo $goods['shop_price'];?>
                                <?php }?>
                            </font>
                        </div>
                    <?php $index++; ?><?php }?><?php endif;?>
                    <div class="more">
                        <a href="<?php echo U('ec/EcSearch/index');?>&intro=best">
                            <img src="http://www.metacms.com/template/v4/ec/common/style/images/more.gif" />
                        </a>
                    </div>
                    <?php if($cat_rec_sign <> 1){?>
                </div>
            </div>
        </div>
        <div class="blank5"></div>
    <?php }?>
<?php }?>
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($new_goods){?>
    <?php if($cat_rec_sign <> 1){?>
        <div class="box">
            <div class="box_2 centerPadd">
                <div class="itemTit New" id="itemNew">
                    <?php if($cat_rec[2]){?>
                        <h2>
                            <a href="javascript:void(0)" onclick="change_tab_style('itemNew', 'h2', this);get_cat_recommend(2, 0);">
                                全部商品
                            </a>
                        </h2>
                        <?php if(is_array($cat_rec[2])):?><?php $index=0; ?><?php  foreach($cat_rec[2] as $rec_data){ ?>
                            <h2 class="h2bg">
                                <a href="javascript:void(0)" onclick="change_tab_style('itemNew', 'h2', this);get_cat_recommend(2, <?php echo $rec_data['cat_id'];?>)">
                                    <?php echo $rec_data['cat_name'];?>
                                </a>
                            </h2>
                        <?php $index++; ?><?php }?><?php endif;?>
                    <?php }?>
                </div>
                <div id="show_new_area" class="clearfix goodsBox">
                    <?php }?>
                    <?php if(is_array($new_goods)):?><?php $index=0; ?><?php  foreach($new_goods as $goods){ ?>
                        <div class="goodsItem">
                            <span class="news"></span>
                            <a href="<?php echo $goods['url'];?>">
                                <img src="<?php echo $goods['thumb'];?>" alt="<?php echo $goods['name'];?>" class="goodsimg" />
                            </a><br />
                            <p><a href="<?php echo $goods['url'];?>" title="<?php echo $goods['name'];?>"><?php echo $goods['short_style_name'];?></a></p>
                            <font class="f1">
                                <?php if($goods['promote_price'] <> ''){?>
                                    <?php echo $goods['promote_price'];?>
                                <?php  }else{ ?>
                                    <?php echo $goods['shop_price'];?>
                                <?php }?>
                            </font>
                        </div>
                    <?php $index++; ?><?php }?><?php endif;?>
                    <div class="more">
                        <a href="<?php echo U('ec/EcSearch/index');?>&intro=new">
                            <img src="http://www.metacms.com/template/v4/ec/common/style/images/more.gif" />
                        </a>
                    </div>
                    <?php if($cat_rec_sign <> 1){?>
                </div>
            </div>
        </div>
        <div class="blank5"></div>
    <?php }?>
<?php }?>
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($hot_goods){?>
    <?php if($cat_rec_sign <> 1){?>
        <div class="box">
            <div class="box_2 centerPadd">
                <div class="itemTit Hot" id="itemHot">
                    <?php if($cat_rec[3]){?>
                        <h2>
                            <a href="javascript:void(0)" onclick="change_tab_style('itemHot', 'h2', this);get_cat_recommend(3, 0);">
                                全部商品
                            </a>
                        </h2>
                        <?php if(is_array($cat_rec[3])):?><?php $index=0; ?><?php  foreach($cat_rec[3] as $rec_data){ ?>
                            <h2 class="h2bg">
                                <a href="javascript:void(0)" onclick="change_tab_style('itemHot', 'h2', this);get_cat_recommend(3, <?php echo $rec_data['cat_id'];?>)">
                                    <?php echo $rec_data['cat_name'];?>
                                </a>
                            </h2>
                        <?php $index++; ?><?php }?><?php endif;?>
                    <?php }?>
                </div>
                <div id="show_hot_area" class="clearfix goodsBox">
                    <?php }?>
                    <?php if(is_array($hot_goods)):?><?php $index=0; ?><?php  foreach($hot_goods as $goods){ ?>
                        <div class="goodsItem">
                            <span class="hot"></span>
                            <a href="<?php echo $goods['url'];?>">
                                <img src="<?php echo $goods['thumb'];?>" alt="<?php echo $goods['name'];?>" class="goodsimg" />
                            </a><br />
                            <p><a href="<?php echo $goods['url'];?>" title="<?php echo $goods['name'];?>"><?php echo $goods['short_style_name'];?></a></p>
                            <font class="f1">
                                <?php if($goods['promote_price'] <> ''){?>
                                    <?php echo $goods['promote_price'];?>
                                <?php  }else{ ?>
                                    <?php echo $goods['shop_price'];?>
                                <?php }?>
                            </font>
                        </div>
                    <?php $index++; ?><?php }?><?php endif;?>
                    <div class="more">
                        <a href="<?php echo U('ec/EcSearch/index');?>&intro=hot">
                            <img src="http://www.metacms.com/template/v4/ec/common/style/images/more.gif" />
                        </a>
                    </div>
                    <?php if($cat_rec_sign <> 1){?>
                </div>
            </div>
        </div>
        <div class="blank5"></div>
    <?php }?>
<?php }?>
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($auction_list){?>
<div class="box">
    <div class="box_1">
        <h3>
            <span>拍卖商品</span>
            <a href="<?php echo U('ec/EcAuction/index');?>"><img src="http://www.metacms.com/template/v4/ec/common/style/images/more.gif"/></a>
        </h3>
        <div class="centerPadd">
            <div class="clearfix goodsBox" style="border:none;">
                <?php if(is_array($auction_list)):?><?php $index=0; ?><?php  foreach($auction_list as $auction){ ?>
                    <div class="goodsItem">
                        <a href="<?php echo $auction['url'];?>">
                            <img src="<?php echo $auction['thumb'];?>" alt="<?php echo $auction['goods_name'];?>" class="goodsimg" />
                        </a><br />
                        <p><a href="<?php echo $auction['url'];?>" title="<?php echo $auction['goods_name'];?>"><?php echo $auction['short_style_name'];?></a></p>
                        <font class="shop_s"><?php echo $auction['formated_start_price'];?></font>
                    </div>
                <?php $index++; ?><?php }?><?php endif;?>
            </div>
        </div>
    </div>
</div>
<div class="blank5"></div>
<?php }?>
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($group_buy_goods){?>
<div class="box">
    <div class="box_1">
        <h3>
            <span>团购商品</span>
            <a href="<?php echo U('ec/EcGroupBuy/index');?>"><img src="http://www.metacms.com/template/v4/ec/common/style/images/more.gif"/></a>
        </h3>
        <div class="centerPadd">
            <div class="clearfix goodsBox" style="border:none;">
                <?php if(is_array($group_buy_goods)):?><?php $index=0; ?><?php  foreach($group_buy_goods as $goods){ ?>
                    <div class="goodsItem">
                        <a href="<?php echo $goods['url'];?>">
                            <img src="<?php echo $goods['thumb'];?>" alt="<?php echo $goods['goods_name'];?>" class="goodsimg" />
                        </a><br />
                        <p><a href="<?php echo $goods['url'];?>" title="<?php echo $goods['goods_name'];?>"><?php echo $goods['short_style_name'];?></a></p>
                        <font class="shop_s"><?php echo $goods['last_price'];?></font>
                    </div>
                <?php $index++; ?><?php }?><?php endif;?>
            </div>
        </div>
    </div>
</div>
<div class="blank5"></div>
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
                    <img src="http://www.metacms.com/template/v4/ec/common/style/images/bnt_top.gif" />
                </a> 
                <a href="<?php echo U('ec/EcIndex/index');?>"><img src="http://www.metacms.com/template/v4/ec/common/style/images/bnt_home.gif" /></a>
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
                    <img src="http://www.metacms.com/template/v4/ec/common/style/images/yahoo.gif" width="18" height="17" border="0" alt="Yahoo Messenger" /> <?php echo $im;?>
                </a>
            <?php }?>
        <?php $index++; ?><?php }?><?php endif;?>
        <!-- MSN Messenger -->
        <?php if(is_array($msn)):?><?php $index=0; ?><?php  foreach($msn as $im){ ?>
            <?php if($im){?>
                <img src="http://www.metacms.com/template/v4/ec/common/style/images/msn.gif" width="18" height="17" border="0" alt="MSN" /> 
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