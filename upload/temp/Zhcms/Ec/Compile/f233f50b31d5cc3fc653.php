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
    <script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/common.js"></script>
    <script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/shopping_flow.js"></script>
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
    <div class="block">
        <?php if($step == 'cart'){?>
            <!-- 购物车内容 -->
            <script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/showdiv.js"></script>
            <script type="text/javascript">
              var user_name_empty = "请输入您的用户名！";
              var email_address_empty = "请输入您的电子邮件地址！";
              var email_address_error = "您输入的电子邮件地址格式不正确！";
              var new_password_empty = "请输入您的新密码！";
              var confirm_password_empty = "请输入您的确认密码！";
              var both_password_error = "您两次输入的密码不一致！";
              var show_div_text = "请点击更新购物车按钮";
              var show_div_exit = "关闭";
            </script>
            <div class="flowBox">
                <h6><span>商品列表</span></h6>
                <form id="formCart" name="formCart" method="post" action="flow.php">
                    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                        <tr>
                            <th bgcolor="#ffffff">商品名称</th>
                            <!-- 显示商品属性 -->
                            <?php if($show_goods_attribute == 1){?>
                                <th bgcolor="#ffffff">属性</th>
                            <?php }?>
                            <!-- 显示市场价 -->
                            <?php if($show_marketprice){?>
                                <th bgcolor="#ffffff">市场价</th>
                            <?php }?>
                            <th bgcolor="#ffffff">本店价</th>
                            <th bgcolor="#ffffff">购买数量</th>
                            <th bgcolor="#ffffff">小计</th>
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
                                            <span style="color:#FF0000">（配件）</span>
                                        <?php }?>
                                        <!-- 赠品 -->
                                        <?php if($goods['is_gift'] > 0){?>
                                            <span style="color:#FF0000">（赠品）</span>
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
                                    <a href="javascript:if (confirm('您确实要删除该商品吗？')) location.href='<?php echo U('ec/EcFlow/index');?>&step=drop_goods&amp;id=<?php echo $goods['rec_id'];?>'; " class="f6">删除</a>
                                    <!-- 如果登录了，可以加入收藏 -->
                                    <?php if($_SESSION['ec_user_id'] > 0 and $goods['extension_code'] <> 'package_buy'){?>
                                        <a href="javascript:if (confirm('您确实要放入收藏夹吗？')) location.href='<?php echo U('ec/EcFlow/index');?>&step=drop_to_collect&amp;id=<?php echo $goods['rec_id'];?>'; " class="f6">放入收藏夹</a>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </table>
                    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                        <tr>
                            <td bgcolor="#ffffff">
                                <?php if($discount > 0){?>
                                    TODO:1
                                <?php }?>
                                <?php echo $shopping_money;?>
                                <?php if($show_marketprice){?>
                                    <?php echo $market_price_desc;?>
                                <?php }?>
                            </td>
                            <td align="right" bgcolor="#ffffff">
                                <input type="button" value="清空购物车" class="bnt_blue_1" onclick="location.href='flow.php?step=clear'" />
                                <input name="submit" type="submit" class="bnt_blue_1" value="更新购物车" />
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="step" value="update_cart" />
                </form>
                <table width="99%" align="center" border="0" cellpadding="5" cellspacing="0" bgcolor="#dddddd">
                    <tr>
                        <td bgcolor="#ffffff">
                            <a href="<?php echo U('ec/EcIndex/index');?>"><img src="http://www.works.com/template/v4/ec/common/style/images/continue.gif" alt="continue" /></a>
                        </td>
                        <td bgcolor="#ffffff" align="right">
                            <a href="<?php echo U('ec/EcFlow/index');?>&step=checkout"><img src="http://www.works.com/template/v4/ec/common/style/images/checkout.gif" alt="checkout" /></a>
                        </td>
                    </tr>
                </table>
                <?php if($_SESSION['ec_user_id'] > 0){?>
                    TODO:2
                <?php }?>
                <?php if($collection_good){?>
                    TODO:3
                <?php }?>
            </div>
            <div class="blank5"></div>
            <?php if($fittings_list){?>
                TODO:4
            <?php }?>
            <?php if($favourable_list){?>
                TODO:5
            <?php }?>
        <?php }?>
        <?php if($step == 'consignee'){?>
            <!-- 开始收货人信息填写界面 -->
            <script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/region.js"></script>
            <script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/utils.js"></script>
            <script type="text/javascript">
                region.isAdmin = false;
                var consignee_not_null = "收货人姓名不能为空！";
                var country_not_null = "请您选择收货人所在国家！";
                var province_not_null = "请您选择收货人所在省份！";
                var city_not_null = "请您选择收货人所在城市！";
                var district_not_null = "请您选择收货人所在区域！";
                var invalid_email = "您输入的邮件地址不是一个合法的邮件地址。";
                var address_not_null = "收货人的详细地址不能为空！";
                var tele_not_null = "电话不能为空！";
                var shipping_not_null = "请您选择配送方式！";
                var payment_not_null = "请您选择支付方式！";
                var goodsattr_style = "1";
                var tele_invaild = "电话号码不有效的号码";
                var zip_not_num = "邮政编码只能填写数字";
                var mobile_invaild = "手机号码不是合法号码";
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
    <h6><span>收货人信息</span></h6>
    <script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/utils.js"></script>
    <script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/transport.js"></script>
    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <?php if($real_goods_count > 0){?>
            <!-- 购物车中存在实体商品显示国家和地区 -->
            <tr>
                <td bgcolor="#ffffff">配送区域:</td>
                <td colspan="3" bgcolor="#ffffff">
                    <select name="country" id="selCountries_<?php echo $sn;?>" onchange="region.changed(this, 1, 'selProvinces_<?php echo $sn;?>')" style="border:1px solid #ccc;">
                        <option value="0">请选择<?php echo $name_of_region[0];?></option>
                        <?php if(is_array($country_list)):?><?php $index=0; ?><?php  foreach($country_list as $country){ ?>
                            <option value="<?php echo $country['region_id'];?>" <?php if($consignee['country'] == $country['region_id']){?>selected<?php }?>><?php echo $country['region_name'];?></option>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </select>
                    <select name="province" id="selProvinces_<?php echo $sn;?>" onchange="region.changed(this, 2, 'selCities_<?php echo $sn;?>')" style="border:1px solid #ccc;">
                        <option value="0">请选择<?php echo $name_of_region[1];?></option>
                        <?php if(is_array($province_list[$sn])):?><?php $index=0; ?><?php  foreach($province_list[$sn] as $province){ ?>
                            <option value="<?php echo $province['region_id'];?>" <?php if($consignee['province'] == $province['region_id']){?>selected<?php }?>><?php echo $province['region_name'];?></option>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </select>
                    <select name="city" id="selCities_<?php echo $sn;?>" onchange="region.changed(this, 3, 'selDistricts_<?php echo $sn;?>')" style="border:1px solid #ccc;">
                        <option value="0">请选择<?php echo $name_of_region[2];?></option>
                        <?php if(is_array($city_list[$sn])):?><?php $index=0; ?><?php  foreach($city_list[$sn] as $city){ ?>
                            <option value="<?php echo $city['region_id'];?>" <?php if($consignee['city'] == $city['region_id']){?>selected<?php }?>><?php echo $city['region_name'];?></option>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </select>
                    <select name="district" id="selDistricts_<?php echo $sn;?>" <?php if(!$district_list[$sn]){?>style="display:none"<?php }?> style="border:1px solid #ccc;">
                        <option value="0">请选择<?php echo $name_of_region[3];?></option>
                        <?php if(is_array($district_list[$sn])):?><?php $index=0; ?><?php  foreach($district_list[$sn] as $district){ ?>
                            <option value="<?php echo $district['region_id'];?>" <?php if($consignee['district'] == $district['region_id']){?>selected<?php }?>><?php echo $district['region_name'];?></option>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </select>
                    (必填)
                </td>
            </tr>
        <?php }?>
        <tr>
            <td bgcolor="#ffffff">收货人姓名:</td>
            <td bgcolor="#ffffff">
                <input name="consignee" type="text" class="inputBg" id="consignee_<?php echo $sn;?>" value="<?php echo $consignee['consignee'];?>" />
                (必填)
            </td>
            <td bgcolor="#ffffff">电子邮件地址:</td>
            <td bgcolor="#ffffff">
                <input name="email" type="text" class="inputBg"  id="email_<?php echo $sn;?>" value="<?php echo $consignee['email'];?>" />
                (必填)
            </td>
        </tr>
        <?php if($real_goods_count > 0){?>
            <!-- 购物车中存在实体商品显示详细地址以及邮政编码 -->
            <tr>
                <td bgcolor="#ffffff">详细地址:</td>
                <td bgcolor="#ffffff">
                    <input name="address" type="text" class="inputBg"  id="address_<?php echo $sn;?>" value="<?php echo $consignee['address'];?>" />
                    (必填)
                </td>
                <td bgcolor="#ffffff">邮政编码:</td>
                <td bgcolor="#ffffff">
                    <input name="zipcode" type="text" class="inputBg"  id="zipcode_<?php echo $sn;?>" value="<?php echo $consignee['zipcode'];?>" />
                </td>
            </tr>
        <?php }?>
        <tr>
            <td bgcolor="#ffffff">电话:</td>
            <td bgcolor="#ffffff">
                <input name="tel" type="text" class="inputBg"  id="tel_<?php echo $sn;?>" value="<?php echo $consignee['tel'];?>" />
                (必填)
            </td>
            <td bgcolor="#ffffff">手机:</td>
            <td bgcolor="#ffffff">
                <input name="mobile" type="text" class="inputBg"  id="mobile_<?php echo $sn;?>" value="<?php echo $consignee['mobile'];?>" />
            </td>
        </tr>
        <?php if($real_goods_count > 0){?>
            <!-- 购物车中存在实体商品显示最佳送货时间及标志行建筑 -->
            <tr>
                <td bgcolor="#ffffff">标志建筑:</td>
                <td bgcolor="#ffffff"><input name="sign_building" type="text" class="inputBg"  id="sign_building_<?php echo $sn;?>" value="<?php echo $consignee['sign_building'];?>" /></td>
                <td bgcolor="#ffffff">最佳送货时间:</td>
                <td bgcolor="#ffffff"><input name="best_time" type="text"  class="inputBg" id="best_time_<?php echo $sn;?>" value="<?php echo $consignee['best_time'];?>" /></td>
            </tr>
        <?php }?>
        <tr>
            <td colspan="4" align="center" bgcolor="#ffffff">
                <input type="submit" name="Submit" class="bnt_blue_2" value="配送至这个地址" />
                <?php if($_SESSION['ec_user_id'] > 0 and $consignee['address_id'] > 0){?>
                    <!-- 如果登录了，显示删除按钮 -->
                    <input name="button" type="button" onclick="if (confirm('您确定要删除该收货人信息吗？')) location.href='<?php echo U('ec/EcFlow/index');?>&step=drop_consignee&amp;id=<?php echo $consignee['address_id'];?>'"  class="bnt_blue" value="删除" />
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
        <?php if($step == 'done'){?>
            TODO:done
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