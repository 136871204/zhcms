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
    <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/common.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/shopping_flow.js"></script>
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
    <div class="block">
        <?php if($step == 'cart'){?>
            <!-- 购物车内容 -->
            <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/showdiv.js"></script>
            <script type="text/javascript">
              var user_name_empty = "ユーザ名を入力してください！";
              var email_address_empty = "メールアドレスを入力してください！";
              var email_address_error = "メールアドレスが正しくない！";
              var new_password_empty = "新しいパスワードを入力してください！";
              var confirm_password_empty = "確認パスワードを入力してください！";
              var both_password_error = "二つのパスワード入力は不一致！";
              var show_div_text = "カード更新ボタンをクリックしてください";
              var show_div_exit = "閉じる";
            </script>
            <div class="flowBox">
                <h6><span>商品リスト</span></h6>
                <form id="formCart" name="formCart" method="post" action="<?php echo U('index');?>">
                    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                        <tr>
                            <th bgcolor="#ffffff">商品名</th>
                            <!-- 显示商品属性 -->
                            <?php if($show_goods_attribute == 1){?>
                                <th bgcolor="#ffffff">属性</th>
                            <?php }?>
                            <!-- 显示市场价 -->
                            <?php if($show_marketprice){?>
                                <th bgcolor="#ffffff">市場値段</th>
                            <?php }?>
                            <th bgcolor="#ffffff">今の値段</th>
                            <th bgcolor="#ffffff">買う数</th>
                            <th bgcolor="#ffffff">計算</th>
                            <th bgcolor="#ffffff">操作</th>
                        </tr>
                        <?php if(is_array($goods_list)):?><?php $index=0; ?><?php  foreach($goods_list as $goods){ ?>
                            <tr>
                                <td bgcolor="#ffffff" align="center">
                                    <!-- 商品 -->
                                    <?php if($goods['goods_id'] > 0 and  $goods['extension_code'] <> 'package_buy'){?>
                                        <?php if($show_goods_thumb == 1){?>
                                            <a href="<?php echo U('ec/EcGoods/index');?>&id=<?php echo $goods['goods_id'];?>" target="_blank" class="f6"><?php echo $goods['goods_name'];?></a>
                                        <?php  }elseif($show_goods_thumb == 2){ ?>
                                            <a href="<?php echo U('ec/EcGoods/index');?>&id=<?php echo $goods['goods_id'];?>" target="_blank">
                                                <img src="<?php echo $goods['goods_thumb'];?>" border="0" title="<?php echo $goods['goods_name'];?>" />
                                            </a>
                                        <?php  }else{ ?>
                                            <a href="<?php echo U('ec/EcGoods/index');?>&id=<?php echo $goods['goods_id'];?>" target="_blank">
                                                <img src="<?php echo $goods['goods_thumb'];?>" border="0" title="<?php echo $goods['goods_name'];?>" />
                                            </a><br />
                                            <a href="<?php echo U('ec/EcGoods/index');?>&id=<?php echo $goods['goods_id'];?>" target="_blank" class="f6"><?php echo $goods['goods_name'];?></a>
                                        <?php }?>
                                        <!-- 配件 -->
                                        <?php if($goods['parent_id'] > 0){?>
                                            <span style="color:#FF0000">（アクセサリ）</span>
                                        <?php }?>
                                        <!-- 赠品 -->
                                        <?php if($goods['is_gift'] > 0){?>
                                            <span style="color:#FF0000">（贈り物）</span>
                                        <?php }?>
                                    <?php  }elseif($goods['goods_id'] > 0 and $goods['extension_code'] == 'package_buy'){ ?>
                                        <a href="javascript:void(0)" onclick="setSuitShow(<?php echo $goods['goods_id'];?>)" class="f6">
                                            <?php echo $goods['goods_name'];?><span style="color:#FF0000;">（超值礼包）</span>
                                        </a>
                                        <div id="suit_<?php echo $goods['goods_id'];?>" style="display:none">
                                            <?php if(is_array($goods['package_goods_list'])):?><?php $index=0; ?><?php  foreach($goods['package_goods_list'] as $package_goods_list){ ?>
                                                <a href="<?php echo U('ec/EcGoods/index');?>&id=<?php echo $package_goods_list['goods_id'];?>" target="_blank" class="f6"><?php echo $package_goods_list['goods_name'];?></a><br />
                                            <?php $index++; ?><?php }?><?php endif;?>
                                        </div>
                                    <!-- 优惠活动 -->
                                    <?php  }else{ ?>
                                        <?php echo $goods['goods_name'];?>
                                    <?php }?>
                                </td>
                                <!-- 显示商品属性 -->
                                <?php if($show_goods_attribute == 1){?>
                                    <td bgcolor="#ffffff"><?php echo nl2br($goods['goods_attr']);?></td>
                                <?php }?> 
                                <!-- 显示市场价 -->
                                <?php if($show_marketprice){?>
                                    <td align="right" bgcolor="#ffffff"><?php echo $goods['market_price'];?></td>
                                <?php }?> 
                                <td align="right" bgcolor="#ffffff"><?php echo $goods['goods_price'];?></td>
                                <td align="right" bgcolor="#ffffff">
                                    <!--普通商品可修改数量 -->
                                    <?php if($goods['goods_id'] > 0 and $goods['is_gift'] == 0 and $goods['parent_id'] == 0){?>
                                        <input type="text" name="goods_number[<?php echo $goods['rec_id'];?>]" id="goods_number_<?php echo $goods['rec_id'];?>" value="<?php echo $goods['goods_number'];?>" size="4" class="inputBg" style="text-align:center " onkeydown="showdiv(this)"/>
                                    <?php  }else{ ?>
                                        <?php echo $goods['goods_number'];?>
                                    <?php }?> 
                                </td>
                                <td align="right" bgcolor="#ffffff"><?php echo $goods['subtotal'];?></td>
                                <td align="center" bgcolor="#ffffff">
                                    <a href="javascript:if (confirm('この商品を削除するか？')) location.href='<?php echo U('ec/EcFlow/index');?>&step=drop_goods&amp;id=<?php echo $goods['rec_id'];?>'; " class="f6">削除</a>
                                    <!-- 如果登录了，可以加入收藏 -->
                                    <?php if($_SESSION['ec_user_id'] > 0 and $goods['extension_code'] <> 'package_buy'){?>
                                        <a href="javascript:if (confirm('収蔵しますか？')) location.href='<?php echo U('ec/EcFlow/index');?>&step=drop_to_collect&amp;id=<?php echo $goods['rec_id'];?>'; " class="f6">収蔵</a>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </table>
                    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                        <tr>
                            <td bgcolor="#ffffff">
                                <?php if($discount > 0){?>
                                    <?php echo $your_discount;?><br />
                                <?php }?>
                                <?php echo $shopping_money;?>
                                <?php if($show_marketprice){?>
                                    <?php echo $market_price_desc;?>
                                <?php }?>
                            </td>
                            <td align="right" bgcolor="#ffffff">
                                <input type="button" value="カードクリア" class="bnt_blue_1" onclick="location.href='<?php echo U('index');?>&step=clear'" />
                                <input name="submit" type="submit" class="bnt_blue_1" value="カード更新" />
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="step" value="update_cart" />
                </form>
                <table width="99%" align="center" border="0" cellpadding="5" cellspacing="0" bgcolor="#dddddd">
                    <tr>
                        <td bgcolor="#ffffff">
                            <a href="<?php echo U('ec/EcIndex/index');?>">買い物続き</a>
                        </td>
                        <td bgcolor="#ffffff" align="right">
                            <a href="<?php echo U('ec/EcFlow/index');?>&step=checkout">決済へ</a>
                        </td>
                    </tr>
                </table>
                <?php if($_SESSION['ec_user_id'] > 0){?>
                    <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/transport.js"></script>
                    <script type="text/javascript" charset="utf-8">
                        function collect_to_flow(goodsId)
                        {
                            var goods        = new Object();
                            var spec_arr     = new Array();
                            var fittings_arr = new Array();
                            var number       = 1;
                            goods.spec     = spec_arr;
                            goods.goods_id = goodsId;
                            goods.number   = number;
                            goods.parent   = 0;
                            var ajaxurl=APP+'&c=EcFlow&m=index&step=add_to_cart';
                            Ajax.call(ajaxurl, 'goods=' + goods.toJSONString(), collect_to_flow_response, 'POST', 'JSON');
                        }
                        
                        function collect_to_flow_response(result)
                        {
                            if (result.error > 0)
                            {
                                // 如果需要缺货登记，跳转
                                if (result.error == 2)
                                {
                                    if (confirm(result.message))
                                    {
                                        location.href = '<?php echo U("ec/EcUser/index");?>&act=add_booking&id=' + result.goods_id;
                                    }
                                }
                                else if (result.error == 6)
                                {
                                    openSpeDiv(result.message, result.goods_id);
                                }
                                else
                                {
                                    alert(result.message);
                                }
                            }
                            else
                            {
                                location.href = '<?php echo U("ec/EcFlow/index");?>';
                            }
                        }
                    </script>
                    <div class="blank"></div>
                <?php }?>
                <?php if($collection_good){?>
                    TODO:3
                <?php }?>
            </div>
            <div class="blank5"></div>
            <?php if($fittings_list){?>
                <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/transport.js"></script>
                <script type="text/javascript" charset="utf-8">
                    function fittings_to_flow(goodsId,parentId)
                    {
                        var goods        = new Object();
                        var spec_arr     = new Array();
                        var number       = 1;
                        goods.spec     = spec_arr;
                        goods.goods_id = goodsId;
                        goods.number   = number;
                        goods.parent   = parentId;
                        var ajaxurl=APP+'&c=EcFlow&m=index&step=add_to_cart';
                        Ajax.call(ajaxurl, 'goods=' + goods.toJSONString(), fittings_to_flow_response, 'POST', 'JSON');
                    }
                    function fittings_to_flow_response(result)
                    {
                        if (result.error > 0)
                        {
                            // 如果需要缺货登记，跳转
                            if (result.error == 2)
                            {
                                if (confirm(result.message))
                                {
                                    location.href = '<?php echo U("ec/EcUser/index");?>&act=add_booking&id=' + result.goods_id;
                                }
                            }
                            else if (result.error == 6)
                            {
                                openSpeDiv(result.message, result.goods_id, result.parent);
                            }
                            else
                            {
                                alert(result.message);
                            }
                        }
                        else
                        {
                            location.href = '<?php echo U("ec/EcFlow/index");?>';
                        }
                    }
                </script>
                <div class="block" >
                    <div class="flowBox">
                        <h6><span>相关配件</span></h6>
                            <form action="flow.php" method="post">
                                <div class="flowGoodsFittings clearfix">
                                    <?php if(is_array($fittings_list)):?><?php $index=0; ?><?php  foreach($fittings_list as $fittings){ ?>
                                        <ul class="clearfix">
                                            <li class="goodsimg">
                                                <a href="<?php echo $fittings['url'];?>" target="_blank">
                                                    <img src="<?php echo $fittings['goods_thumb'];?>" alt="<?php echo $fittings['name'];?>" class="B_blue" />
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $fittings['url'];?>" target="_blank" title="<?php echo $fittings['goods_name'];?>" class="f6"><?php echo $fittings['short_name'];?></a><br />
                                                配件价格：<font class="f1"><?php echo $fittings['fittings_price'];?></font><br />
                                                相关商品：<?php echo $fittings['parent_short_name'];?><br />
                                                <a href="javascript:fittings_to_flow(<?php echo $fittings['goods_id'];?>,<?php echo $fittings['parent_id'];?>)">
                                                    <img src="http://www.metacms.com/template/v5/ec/common/style/images/bnt_buy.gif" alt="立即购买" />
                                                </a>
                                            </li>
                                        </ul>
                                    <?php $index++; ?><?php }?><?php endif;?>
                                </div>
                            </form>
                    </div>
                </div>
            <?php }?>
            <?php if($favourable_list){?>
                TODO:5
            <?php }?>
        <?php }?>
        <?php if($step == 'consignee'){?>
            <!-- 开始收货人信息填写界面 -->
            <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/region.js"></script>
            <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/utils.js"></script>
            <script type="text/javascript">
                region.isAdmin = false;
                var consignee_not_null = "受け取り人の姓名を入力してください！";
                var country_not_null = "受け取り人の国を選択してください！";
                var province_not_null = "受け取り人の省を選択してください！";
                var city_not_null = "受け取り人の都市を選択してください！";
                var district_not_null = "受け取り人の区域を選択してください！";
                var invalid_email = "入力したメールアドレスが正しくない。";
                var address_not_null = "受け取り人の詳細住所を入力してください！";
                var tele_not_null = "電話番号を入力してください！";
                var shipping_not_null = "配送方式を選択してください！";
                var payment_not_null = "支払い方式を選択してください！";
                var goodsattr_style = "1";
                var tele_invaild = "電話番号は有効ではない";
                var zip_not_num = "郵便番号を数値にしてください";
                var mobile_invaild = "携帯番号は正しくない";
                onload = function() {
                    if (!document.all)
                    {
                        document.forms['theForm'].reset();
                    }
                }
            </script>
            <!-- 如果有收货地址，循环显示用户的收获地址 -->
            <?php if(is_array($consignee_list)):?><?php $index=0; ?><?php  foreach($consignee_list as $sn=>$consignee){ ?>
                <form action="<?php echo U('index');?>" method="post" name="theForm" id="theForm" onsubmit="return checkConsignee(this)">
                    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="flowBox">
    <h6><span>受け取り人情報</span></h6>
    <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/utils.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/transport.js"></script>
    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <?php if($real_goods_count > 0){?>
            <!-- 购物车中存在实体商品显示国家和地区 -->
            <tr>
                <td bgcolor="#ffffff">配送エリア:</td>
                <td colspan="3" bgcolor="#ffffff">
                    <select name="country" id="selCountries_<?php echo $sn;?>" onchange="region.changed(this, 1, 'selProvinces_<?php echo $sn;?>')" style="border:1px solid #ccc;">
                        <option value="0"><?php echo $name_of_region[0];?>を選択してください</option>
                        <?php if(is_array($country_list)):?><?php $index=0; ?><?php  foreach($country_list as $country){ ?>
                            <option value="<?php echo $country['region_id'];?>" <?php if($consignee['country'] == $country['region_id']){?>selected<?php }?>><?php echo $country['region_name'];?></option>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </select>
                    <select name="province" id="selProvinces_<?php echo $sn;?>" onchange="region.changed(this, 2, 'selCities_<?php echo $sn;?>')" style="border:1px solid #ccc;">
                        <option value="0"><?php echo $name_of_region[1];?>を選択してください</option>
                        <?php if(is_array($province_list[$sn])):?><?php $index=0; ?><?php  foreach($province_list[$sn] as $province){ ?>
                            <option value="<?php echo $province['region_id'];?>" <?php if($consignee['province'] == $province['region_id']){?>selected<?php }?>><?php echo $province['region_name'];?></option>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </select>
                    <select name="city" id="selCities_<?php echo $sn;?>" onchange="region.changed(this, 3, 'selDistricts_<?php echo $sn;?>')" style="border:1px solid #ccc;">
                        <option value="0"><?php echo $name_of_region[2];?>を選択してください</option>
                        <?php if(is_array($city_list[$sn])):?><?php $index=0; ?><?php  foreach($city_list[$sn] as $city){ ?>
                            <option value="<?php echo $city['region_id'];?>" <?php if($consignee['city'] == $city['region_id']){?>selected<?php }?>><?php echo $city['region_name'];?></option>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </select>
                    <select name="district" id="selDistricts_<?php echo $sn;?>" <?php if(!$district_list[$sn]){?>style="display:none"<?php }?> style="border:1px solid #ccc;">
                        <option value="0"><?php echo $name_of_region[3];?>を選択してください</option>
                        <?php if(is_array($district_list[$sn])):?><?php $index=0; ?><?php  foreach($district_list[$sn] as $district){ ?>
                            <option value="<?php echo $district['region_id'];?>" <?php if($consignee['district'] == $district['region_id']){?>selected<?php }?>><?php echo $district['region_name'];?></option>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </select>
                    (必須)
                </td>
            </tr>
        <?php }?>
        <tr>
            <td bgcolor="#ffffff">姓名:</td>
            <td bgcolor="#ffffff">
                <input name="consignee" type="text" class="inputBg" id="consignee_<?php echo $sn;?>" value="<?php echo $consignee['consignee'];?>" />
                (必須)
            </td>
            <td bgcolor="#ffffff">メールアドレス:</td>
            <td bgcolor="#ffffff">
                <input name="email" type="text" class="inputBg"  id="email_<?php echo $sn;?>" value="<?php echo $consignee['email'];?>" />
                (必須)
            </td>
        </tr>
        <?php if($real_goods_count > 0){?>
            <!-- 购物车中存在实体商品显示详细地址以及邮政编码 -->
            <tr>
                <td bgcolor="#ffffff">詳細アドレス:</td>
                <td bgcolor="#ffffff">
                    <input name="address" type="text" class="inputBg"  id="address_<?php echo $sn;?>" value="<?php echo $consignee['address'];?>" />
                    (必須)
                </td>
                <td bgcolor="#ffffff">郵便番号:</td>
                <td bgcolor="#ffffff">
                    <input name="zipcode" type="text" class="inputBg"  id="zipcode_<?php echo $sn;?>" value="<?php echo $consignee['zipcode'];?>" />
                </td>
            </tr>
        <?php }?>
        <tr>
            <td bgcolor="#ffffff">電話:</td>
            <td bgcolor="#ffffff">
                <input name="tel" type="text" class="inputBg"  id="tel_<?php echo $sn;?>" value="<?php echo $consignee['tel'];?>" />
                (必須)
            </td>
            <td bgcolor="#ffffff">携帯:</td>
            <td bgcolor="#ffffff">
                <input name="mobile" type="text" class="inputBg"  id="mobile_<?php echo $sn;?>" value="<?php echo $consignee['mobile'];?>" />
            </td>
        </tr>
        <?php if($real_goods_count > 0){?>
            <!-- 购物车中存在实体商品显示最佳送货时间及标志行建筑 -->
            <tr>
                <td bgcolor="#ffffff">マーク建築:</td>
                <td bgcolor="#ffffff"><input name="sign_building" type="text" class="inputBg"  id="sign_building_<?php echo $sn;?>" value="<?php echo $consignee['sign_building'];?>" /></td>
                <td bgcolor="#ffffff">一番好み配達時間:</td>
                <td bgcolor="#ffffff"><input name="best_time" type="text"  class="inputBg" id="best_time_<?php echo $sn;?>" value="<?php echo $consignee['best_time'];?>" /></td>
            </tr>
        <?php }?>
        <tr>
            <td colspan="4" align="center" bgcolor="#ffffff">
                <input type="submit" name="Submit" class="bnt_blue_2" value="この住所に配達" />
                <?php if($_SESSION['ec_user_id'] > 0 and $consignee['address_id'] > 0){?>
                    <!-- 如果登录了，显示删除按钮 -->
                    <input name="button" type="button" onclick="if (confirm('この受け取り人情報を削除するか？')) location.href='<?php echo U('ec/EcFlow/index');?>&step=drop_consignee&amp;id=<?php echo $consignee['address_id'];?>'"  class="bnt_blue" value="削除" />
                <?php }?>
                <input type="hidden" name="step" value="consignee" />
                <input type="hidden" name="act" value="checkout" />
                <input name="address_id" type="hidden" value="<?php echo $consignee['address_id'];?>" />
            </td>
        </tr>
    </table>
</div>
                </form>
            <?php $index++; ?><?php }?><?php endif;?>
            
        <?php }?>
        <!-- 开始订单确认界面 -->
        <?php if($step == 'checkout'){?>
            <form action="<?php echo U('index');?>" method="post" name="theForm" id="theForm" onsubmit="return checkOrderForm(this)">
                <script type="text/javascript">
                    var flow_no_payment = "支払い方法選んでください。";
                    var flow_no_shipping = "配達方法を選らんでください。";
                </script>
                <div class="flowBox">
                    <h6>
                        <span>商品リスト</span>
                        <?php if($allow_edit_cart){?>
                            <a href="<?php echo U('index');?>" class="f6">変更</a>
                        <?php }?>
                    </h6>
                    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                        <tr>
                            <th bgcolor="#ffffff">商品名称</th>
                            <th bgcolor="#ffffff">属性</th>
                            <?php if($show_marketprice){?>
                                <th bgcolor="#ffffff">市場値段</th>
                            <?php }?>
                            <th bgcolor="#ffffff">
                                <?php if($gb_deposit){?>
                                    保障金
                                <?php  }else{ ?>
                                    店舗値段
                                <?php }?>
                            </th>
                            <th bgcolor="#ffffff">購入数</th>
                            <th bgcolor="#ffffff">計算</th>
                        </tr>
                        <?php if(is_array($goods_list)):?><?php $index=0; ?><?php  foreach($goods_list as $goods){ ?>
                            <tr>
                                <td bgcolor="#ffffff">
                                    <?php if($goods['goods_id'] > 0 and $goods['extension_code'] == 'package_buy'){?>
                                        TODO:flow.html---checkout--1;
                                    <?php  }else{ ?>
                                        <a href="<?php echo U('ec/EcGoods/index');?>&id=<?php echo $goods['goods_id'];?>" target="_blank" class="f6"><?php echo $goods['goods_name'];?></a>
                                        <?php if($goods['parent_id'] > 0){?> 
                                            <span style="color:#FF0000">（アクセサリ）</span>
                                        <?php  }else{ ?>
                                            <span style="color:#FF0000">（プレゼント）</span>
                                        <?php }?>
                                    <?php }?>
                                    <?php if($goods['is_shipping']){?>
                                        (<span style="color:#FF0000">運賃免状商品</span>)
                                    <?php }?>
                                </td>
                                <td bgcolor="#ffffff"><?php echo nl2br($goods['goods_attr']);?></td>
                                <?php if($show_marketprice){?>
                                    <td align="right" bgcolor="#ffffff"><?php echo $goods['formated_market_price'];?></td>
                                <?php }?>
                                <td bgcolor="#ffffff" align="right"><?php echo $goods['formated_goods_price'];?></td>
                                <td bgcolor="#ffffff" align="right"><?php echo $goods['goods_number'];?></td>
                                <td bgcolor="#ffffff" align="right"><?php echo $goods['formated_subtotal'];?></td>
                            </tr>
                        <?php $index++; ?><?php }?><?php endif;?>
                        <!--  团购且有保证金时不显示 -->
                        <?php if(!$gb_deposit){?> 
                            <tr>
                                <td bgcolor="#ffffff" colspan="7">
                                <?php if($discount > 0){?><?php echo $your_discount;?><br /><?php }?>
                                <?php echo $shopping_money;?>
                                <?php if($show_marketprice){?>，<?php echo $market_price_desc;?><?php }?>
                                </td>
                            </tr>
                        <?php }?>
                    </table>
                </div>
                <div class="blank"></div>
                <div class="flowBox">
                    <h6>
                        <span>受け取り人情報</span>
                        <a href="<?php echo U('index');?>&step=consignee" class="f6">変更</a>
                    </h6>
                    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                        <tr>
                            <td bgcolor="#ffffff">姓名:</td>
                            <td bgcolor="#ffffff"><?php echo $consignee['consignee'];?></td>
                            <td bgcolor="#ffffff">メールアドレス:</td>
                            <td bgcolor="#ffffff"><?php echo $consignee['email'];?></td>
                        </tr>
                        <?php if($total['real_goods_count'] > 0){?>
                            <tr>
                                <td bgcolor="#ffffff">詳細アドレス:</td>
                                <td bgcolor="#ffffff"><?php echo $consignee['address'];?> </td>
                                <td bgcolor="#ffffff">郵便番号:</td>
                                <td bgcolor="#ffffff"><?php echo $consignee['zipcode'];?></td>
                            </tr>
                        <?php }?>
                        <tr>
                            <td bgcolor="#ffffff">電話:</td>
                            <td bgcolor="#ffffff"><?php echo $consignee['tel'];?> </td>
                            <td bgcolor="#ffffff">携帯:</td>
                            <td bgcolor="#ffffff"><?php echo $consignee['mobile'];?></td>
                        </tr>
                        <?php if($total['real_goods_count'] > 0){?>
                            <tr>
                                <td bgcolor="#ffffff">マーク建築:</td>
                                <td bgcolor="#ffffff"><?php echo $consignee['sign_building'];?> </td>
                                <td bgcolor="#ffffff">一番好み配達時間:</td>
                                <td bgcolor="#ffffff"><?php echo $consignee['best_time'];?></td>
                            </tr>
                        <?php }?>
                    </table>
                </div>
                <div class="blank"></div>
                <?php if($total['real_goods_count'] > 0){?>
                    <div class="flowBox">
                        <h6><span>配達方法</span></h6>
                        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="shippingTable">
                            <tr>
                                <th bgcolor="#ffffff" width="5%">&nbsp;</th>
                                <th bgcolor="#ffffff" width="25%">名称</th>
                                <th bgcolor="#ffffff">注文説明</th>
                                <th bgcolor="#ffffff" width="15%">費用</th>
                                <th bgcolor="#ffffff" width="15%">運賃免状額</th>
                                <th bgcolor="#ffffff" width="15%">商品保険費用</th>
                            </tr>
                            <!--  循环配送方式 -->
                            <?php if(is_array($shipping_list)):?><?php $index=0; ?><?php  foreach($shipping_list as $shipping){ ?>
                                <tr>
                                    <td bgcolor="#ffffff" valign="top">
                                        <input name="shipping" type="radio" value="<?php echo $shipping['shipping_id'];?>" <?php if($order['shipping_id'] == $shipping['shipping_id']){?>checked="true"<?php }?> supportCod="<?php echo $shipping['support_cod'];?>" insure="<?php echo $shipping['insure'];?>" onclick="selectShipping(this)" />
                                    </td>
                                    <td bgcolor="#ffffff" valign="top"><strong><?php echo $shipping['shipping_name'];?></strong></td>
                                    <td bgcolor="#ffffff" valign="top"><?php echo $shipping['shipping_desc'];?></td>
                                    <td bgcolor="#ffffff" align="right" valign="top"><?php echo $shipping['format_shipping_fee'];?></td>
                                    <td bgcolor="#ffffff" align="right" valign="top"><?php echo $shipping['free_money'];?></td>
                                    <td bgcolor="#ffffff" align="right" valign="top">
                                        <?php if($shipping['insure'] <> 0){?>
                                            <?php echo $shipping['insure_formated'];?>
                                        <?php  }else{ ?>
                                            該当配達方法が商品保険使えない,商品保険費用が設置失敗
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php $index++; ?><?php }?><?php endif;?>
                            <tr>
                                <td colspan="6" bgcolor="#ffffff" align="right">
                                    <label for="ECS_NEEDINSURE">
                                        <input name="need_insure" id="ECS_NEEDINSURE" type="checkbox"  onclick="selectInsure(this.checked)" value="1" <?php if($order['need_insure']){?>checked="true"<?php }?> <?php if($insure_disabled){?>disabled="true"<?php }?>  />
                                        商品保険必要
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="blank"></div>
                <?php  }else{ ?>
                    <input name = "shipping" type="radio" value = "-1" checked="checked"  style="display:none"/>
                <?php }?>
                <?php if($is_exchange_goods <> 1 or $total['real_goods_count'] <> 0){?>
                    <div class="flowBox">
                        <h6><span>支払い方式</span></h6>
                        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="paymentTable">
                            <tr>
                                <th width="5%" bgcolor="#ffffff">&nbsp;</th>
                                <th width="20%" bgcolor="#ffffff">名称</th>
                                <th bgcolor="#ffffff">注文説明</th>
                                <th bgcolor="#ffffff" width="15%">手続き費用</th>
                            </tr>
                            <!-- 循环支付方式 -->
                            <?php if(is_array($payment_list)):?><?php $index=0; ?><?php  foreach($payment_list as $payment){ ?>
                                <tr>
                                    <td valign="top" bgcolor="#ffffff">
                                        <input type="radio" name="payment" value="<?php echo $payment['pay_id'];?>" <?php if($order['pay_id'] == $payment['pay_id']){?>checked<?php }?> isCod="<?php echo $payment['is_cod'];?>" onclick="selectPayment(this)" <?php if($cod_disabled and $payment['is_cod'] == '1'){?>disabled="true"<?php }?>/>
                                    </td>
                                    <td valign="top" bgcolor="#ffffff"><strong><?php echo $payment['pay_name'];?></strong></td>
                                    <td valign="top" bgcolor="#ffffff"><?php echo $payment['pay_desc'];?></td>
                                    <td align="right" bgcolor="#ffffff" valign="top"><?php echo $payment['format_pay_fee'];?></td>
                                </tr>
                            <?php $index++; ?><?php }?><?php endif;?>
                        </table>
                    </div>
                <?php  }else{ ?>
                    <input name = "payment" type="radio" value = "-1" checked="checked"  style="display:none"/>
                <?php }?>
                <div class="blank"></div>
                <!--是否有包装 -->
                <?php if($pack_list){?>
                    <div class="flowBox">
                        <h6><span>商品包み</span></h6>
                        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="packTable">
                            <tr>
                                <th width="5%" scope="col" bgcolor="#ffffff">&nbsp;</th>
                                <th width="35%" scope="col" bgcolor="#ffffff">名称</th>
                                <th width="22%" scope="col" bgcolor="#ffffff">値段</th>
                                <th width="22%" scope="col" bgcolor="#ffffff">費用免状額</th>
                                <th scope="col" bgcolor="#ffffff">画像</th>
                            </tr>
                            <tr>
                                <td valign="top" bgcolor="#ffffff">
                                    <input type="radio" name="pack" value="0" <?php if($order['pack_id'] == 0){?>checked="true"<?php }?> onclick="selectPack(this)" />
                                </td>
                                <td valign="top" bgcolor="#ffffff"><strong>要らない</strong></td>
                                <td valign="top" bgcolor="#ffffff">&nbsp;</td>
                                <td valign="top" bgcolor="#ffffff">&nbsp;</td>
                                <td valign="top" bgcolor="#ffffff">&nbsp;</td>
                            </tr>
                            <!--  循环包装 -->
                            <?php if(is_array($pack_list)):?><?php $index=0; ?><?php  foreach($pack_list as $pack){ ?>
                                <tr>
                                    <td valign="top" bgcolor="#ffffff">
                                        <input type="radio" name="pack" value="<?php echo $pack['pack_id'];?>" <?php if($order['pack_id'] == $pack['pack_id']){?>checked="true"<?php }?> onclick="selectPack(this)" />
                                    </td>
                                    <td valign="top" bgcolor="#ffffff"><strong><?php echo $pack['pack_name'];?></strong></td>
                                    <td valign="top" bgcolor="#ffffff" align="right"><?php echo $pack['format_pack_fee'];?></td>
                                    <td valign="top" bgcolor="#ffffff" align="right"><?php echo $pack['format_free_money'];?></td>
                                    <td valign="top" bgcolor="#ffffff" align="center">
                                        <!-- 是否有图片 -->
                                        <?php if($pack['pack_img']){?> 
                                            <a href="upload/ec/data/packimg/<?php echo $pack['pack_img'];?>" target="_blank" class="f6">見る</a>
                                        <?php  }else{ ?>
                                            画像なし
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php $index++; ?><?php }?><?php endif;?>
                        </table>
                    </div>
                    <div class="blank"></div>
                <?php }?> 
                <!-- 是否有贺卡 -->
                <?php if($card_list){?>
                    <div class="flowBox">
                        <h6><span>祝いカード</span></h6>
                        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="cardTable">
                            <tr>
                                <th bgcolor="#ffffff" width="5%" scope="col">&nbsp;</th>
                                <th bgcolor="#ffffff" width="35%" scope="col">名称</th>
                                <th bgcolor="#ffffff" width="22%" scope="col">値段</th>
                                <th bgcolor="#ffffff" width="22%" scope="col">費用免状額</th>
                                <th bgcolor="#ffffff" scope="col">画像</th>
                            </tr>
                            <tr>
                                <td bgcolor="#ffffff" valign="top">
                                    <input type="radio" name="card" value="0" <?php if($order['card_id'] == 0){?>checked="true"<?php }?> onclick="selectCard(this)" />
                                </td>
                                <td bgcolor="#ffffff" valign="top"><strong>要らない</strong></td>
                                <td bgcolor="#ffffff" valign="top">&nbsp;</td>
                                <td bgcolor="#ffffff" valign="top">&nbsp;</td>
                                <td bgcolor="#ffffff" valign="top">&nbsp;</td>
                            </tr>
                            <!--  循环贺卡 -->
                            <?php if(is_array($card_list)):?><?php $index=0; ?><?php  foreach($card_list as $card){ ?>
                                <tr>
                                    <td valign="top" bgcolor="#ffffff">
                                        <input type="radio" name="card" value="<?php echo $card['card_id'];?>" <?php if($order['card_id'] == $card['card_id']){?>checked="true"<?php }?> onclick="selectCard(this)"  />
                                    </td>
                                    <td valign="top" bgcolor="#ffffff"><strong><?php echo $card['card_name'];?></strong></td>
                                    <td valign="top" align="right" bgcolor="#ffffff"><?php echo $card['format_card_fee'];?></td>
                                    <td valign="top" align="right" bgcolor="#ffffff"><?php echo $card['format_free_money'];?></td>
                                    <td valign="top" align="center" bgcolor="#ffffff">
                                        <!-- 是否有图片 -->
                                        <?php if($card['card_img']){?> 
                                            <a href="upload/ec/data/cardimg/<?php echo $card['card_img'];?>" target="_blank" class="f6">見る</a>
                                        <?php  }else{ ?>
                                            画像なし
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php $index++; ?><?php }?><?php endif;?>
                            <tr>
                                <td bgcolor="#ffffff"></td>
                                <td bgcolor="#ffffff" valign="top"><strong>祝い言葉:</strong></td>
                                <td bgcolor="#ffffff" colspan="3"><textarea name="card_message" cols="60" rows="3" style="width:auto; border:1px solid #ccc;"><?php echo $order['card_message'];?></textarea></td>
                            </tr>
                        </table>
                    </div>
                    <div class="blank"></div>
                <?php }?>
                <div class="flowBox">
                    <h6><span>他の情報</span></h6>
                    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                        <!-- 是否使用余额 -->
                        <?php if($allow_use_surplus){?>
                            TODO:flow.html ---checkout--allow_use_surplus
                        <?php }?>
                        <!-- 是否使用积分 -->
                        <?php if($allow_use_integral){?>
                            <tr>
                                <td bgcolor="#ffffff"><strong>使用积分</strong></td>
                                <td bgcolor="#ffffff">
                                    <input name="integral" type="text" class="input" id="ECS_INTEGRAL" onblur="changeIntegral(this.value)" value="<?php echo default_value($order['integral'],0);?>" size="10" />
                                    您当前的可用积分为:<?php echo default_value($your_integral,0);?> <?php echo $points_name;?>，本订单最多可以使用<?php echo $order_max_integral;?>  <?php echo $points_name;?>. 
                                    <span id="ECS_INTEGRAL_NOTICE" class="notice"></span>
                                </td>
                            </tr>
                        <?php }?> 
                        <!-- 是否使用红包 -->
                        <?php if($allow_use_bonus){?>
                            <tr>
                                <td bgcolor="#ffffff"><strong>ボーナス使う:</strong></td>
                                <td bgcolor="#ffffff">
                                    持つボーナス選択
                                    <select name="bonus" onchange="changeBonus(this.value)" id="ECS_BONUS" style="border:1px solid #ccc;">
                                        <option value="0" <?php if($order['bonus_id'] == 0){?>selected<?php }?>>選んでください</option>
                                        <?php if(is_array($bonus_list)):?><?php $index=0; ?><?php  foreach($bonus_list as $bonus){ ?>
                                            <option value="<?php echo $bonus['bonus_id'];?>" <?php if($order['bonus_id'] == $bonus['bonus_id']){?>selected<?php }?>><?php echo $bonus['type_name'];?>[<?php echo $bonus['bonus_money_formated'];?>]</option>
                                        <?php $index++; ?><?php }?><?php endif;?>
                                    </select>
                                    或いはボーナスコードを入力
                                    <input name="bonus_sn" type="text" class="inputBg" size="15" value="<?php echo $order['bonus_sn'];?>" />
                                    <input name="validate_bonus" type="button" class="bnt_blue_1" value="ボーナス検証" onclick="validateBonus(document.forms['theForm'].elements['bonus_sn'].value)" style="vertical-align:middle;" />
                                </td>
                            </tr>
                        <?php }?> 
                        <!--能否开发票 -->
                        <?php if($inv_content_list){?>
                            <tr>
                                <td bgcolor="#ffffff">
                                    <strong>レシート:</strong>
                                    <input name="need_inv" type="checkbox"  class="input" id="ECS_NEEDINV" onclick="changeNeedInv()" value="1" <?php if($order['need_inv']){?>checked="true"<?php }?> />
                                </td>
                                <td bgcolor="#ffffff">
                                    <?php if($inv_type_list){?>
                                        レシートタイプ
                                        <select name="inv_type" id="ECS_INVTYPE" <?php if($order['need_inv'] <> 1){?>disabled="true"<?php }?> onchange="changeNeedInv()" style="border:1px solid #ccc;">
                                            <?php if(isset($inv_type_list) && !empty($inv_type_list)):$arr["options"]=$inv_type_list;$arr["selected"]=$order['inv_type'];echo html_options($arr);endif;
?>
                                        </select>
                                    <?php }?>
                                    レシートタイトル
                                    <input name="inv_payee" type="text"  class="input" id="ECS_INVPAYEE" size="20" <?php if(!$order['need_inv']){?>disabled="true"<?php }?> value="<?php echo $order['inv_payee'];?>" onblur="changeNeedInv()" />
                                    レシート内容
                                    <select name="inv_content" id="ECS_INVCONTENT" <?php if($order['need_inv'] <> 1){?>disabled="true"<?php }?>  onchange="changeNeedInv()" style="border:1px solid #ccc;">
                                        <?php if(isset($inv_content_list) && !empty($inv_content_list)):$arr["options"]=$inv_content_list;$arr["selected"]=$order['inv_content'];echo html_options($arr);endif;
?>
                                    </select>
                                </td>
                            </tr>
                        <?php }?>
                        <tr>
                            <td valign="top" bgcolor="#ffffff"><strong>注文備考:</strong></td>
                            <td bgcolor="#ffffff">
                                <textarea name="postscript" cols="80" rows="3" id="postscript" style="border:1px solid #ccc;"><?php echo $order['postscript'];?></textarea>
                            </td>
                        </tr>
                        <!-- 是否使用缺货处理 -->
                        <?php if($how_oos_list){?>
                            <tr>
                                <td bgcolor="#ffffff"><strong>売り切れ処理:</strong></td>
                                <td bgcolor="#ffffff">
                                    <?php if(is_array($how_oos_list)):?><?php $index=0; ?><?php  foreach($how_oos_list as $how_oos_id=>$how_oos_name){ ?>
                                        <label>
                                            <input name="how_oos" type="radio" value="<?php echo $how_oos_id;?>" <?php if($order['how_oos'] == $how_oos_id){?>checked<?php }?> onclick="changeOOS(this)" />
                                            <?php echo $how_oos_name;?>
                                        </label>
                                    <?php $index++; ?><?php }?><?php endif;?>
                                </td>
                            </tr>
                        <?php }?> 
                    </table>
                </div>
                <div class="blank"></div>
                <div class="flowBox">
                    <h6><span>費用総計</span></h6>
                    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/transport.js"></script>
<script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/utils.js"></script>
<div id="ECS_ORDERTOTAL">
    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <?php if($_SESSION['ec_user_id'] > 0 and (C("ec_use_integral") or C("ec_use_bonus") )){?>
            <tr>
                <td align="right" bgcolor="#ffffff">
                    受注完了後，
                    <!-- 是否使用积分-->
                    <?php if(C("ec_use_integral")){?>
                        <font class="f4_b"><?php echo $total['will_get_integral'];?></font> <?php echo $points_name;?>　を貰える
                    <?php }?> 
                    <!--  是否同时使用积分红包-->
                    <?php if(C("ec_use_integral") and C("ec_use_bonus")){?>，かつ  <?php }?>
                    <!-- 是否使用红包-->
                    <?php if(C("ec_use_bonus")){?>
                        <font class="f4_b"><?php echo $total['will_get_bonus'];?></font>のボーナスをもらえます。
                    <?php }?>
                </td>
            </tr>
        <?php }?>
        <tr>
            <td align="right" bgcolor="#ffffff">
                商品総計: <font class="f4_b"><?php echo $total['goods_price_formated'];?></font>
                <!-- 折扣 -->
                <?php if($total['discount'] > 0){?> 
                    - 割引: <font class="f4_b"><?php echo $total['discount_formated'];?></font>
                <?php }?>
                <!--  税 -->
                <?php if($total['tax'] > 0){?> 
                    + レシート税金: <font class="f4_b"><?php echo $total['tax_formated'];?></font>
                <?php }?>
                <!-- 配送费用 -->
                <?php if($total['shipping_fee'] > 0){?> 
                    + 配達費: <font class="f4_b"><?php echo $total['shipping_fee_formated'];?></font>
                <?php }?>
                <!-- 保价费用 -->
                <?php if($total['shipping_insure'] > 0){?> 
                    + 商品保険費: <font class="f4_b"><?php echo $total['shipping_insure_formated'];?></font>
                <?php }?>
                <!--  支付费用 -->
                <?php if($total['pay_fee'] > 0){?> 
                    + 支払い手続き費: <font class="f4_b"><?php echo $total['pay_fee_formated'];?></font>
                <?php }?>
                <!-- 包装费用-->
                <?php if($total['pack_fee'] > 0){?> 
                    + 包み費: <font class="f4_b"><?php echo $total['pack_fee_formated'];?></font>
                <?php }?>
                <!-- 贺卡费用-->
                <?php if($total['card_fee'] > 0){?> 
                    + 祝いカード費: <font class="f4_b"><?php echo $total['card_fee_formated'];?></font>
                <?php }?>
            </td>
        </tr>
        <!--  使用余额或积分或红包 -->
        <?php if($total['surplus'] > 0 or $total['integral'] > 0 or $total['bonus'] > 0){?>
            <tr>
                <td align="right" bgcolor="#ffffff">
                    <!-- 使用余额 -->
                    <?php if($total['surplus'] > 0){?> 
                        - 殘高使用: <font class="f4_b"><?php echo $total['surplus_formated'];?></font>
                    <?php }?>
                    <!-- 使用积分 -->
                    <?php if($total['integral'] > 0){?>
                        - ポイント使用: <font class="f4_b"><?php echo $total['integral_formated'];?></font>
                    <?php }?>
                    <!-- 使用红包 -->
                    <?php if($total['bonus'] > 0){?>
                        - ポーナス使用: <font class="f4_b"><?php echo $total['bonus_formated'];?></font>
                    <?php }?>  
                </td>
            </tr>
        <?php }?>
        <tr>
            <td align="right" bgcolor="#ffffff"> 
                支払う金額: <font class="f4_b"><?php echo $total['amount_formated'];?></font>
                <?php if($is_group_buy){?>
                    <br />
                   （備考：団体購入には保証金があり，初めて保証金だけ支払う）
                <?php }?>
                <!--消耗积分-->
                <?php if($total['exchange_integral']){?>
                    <br />
                    ポイント商品は使用するポイント：<font class="f4_b"><?php echo $total['exchange_integral'];?></font>
                <?php }?>
            </td>
        </tr>
        
    </table>
</div>
                    <div align="center" style="margin:8px auto;">
                        <input type="image" src="http://www.metacms.com/template/v5/ec/common/style/images/bnt_subOrder.gif" />
                        <input type="hidden" name="step" value="done" />
                    </div>
                </div>
                
            </form>
        <?php }?>
        <?php if($step == 'done'){?>
            <!-- 订单提交成功 -->
            <div class="flowBox" style="margin:30px auto 70px auto;">
                <h6 style="text-align:center; height:30px; line-height:30px;">
                    本店舗を買い物することを感謝します！注文は成功しました，注文番号を覚えてください: <font style="color:red"><?php echo $order['order_sn'];?></font>
                </h6>
                <table width="99%" align="center" border="0" cellpadding="15" cellspacing="0" bgcolor="#fff" style="border:1px solid #ddd; margin:20px auto;" >
                    <tr>
                        <td align="center" bgcolor="#FFFFFF">
                            <?php if($order['shipping_name']){?>
                                選んだ配達方式: 
                                <strong><?php echo $order['shipping_name'];?></strong>，
                            <?php }?>
                            選んだ支払い方式: <strong><?php echo $order['pay_name'];?></strong>。
                            支払う金額: <strong><?php echo $total['amount_formated'];?></strong>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#FFFFFF"><?php echo $order['pay_desc'];?></td>
                    </tr>
                    <?php if($pay_online){?>
                        <!-- 如果是线上支付则显示支付按钮 -->
                        <tr>
                            <td align="center" bgcolor="#FFFFFF"><?php echo $pay_online;?></td>
                        </tr>
                    <?php }?>
                </table>
                <?php if($virtual_card){?>
                    <div style="text-align:center;overflow:hidden;border:1px solid #E2C822;background:#FFF9D7;margin:10px;padding:10px 50px 30px;">
                        TODO:flow.html--done---1;
                    </div>
                <?php }?>
                <p style="text-align:center; margin-bottom:20px;"><?php echo $order_submit_back;?></p>
            </div>
        <?php }?>
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