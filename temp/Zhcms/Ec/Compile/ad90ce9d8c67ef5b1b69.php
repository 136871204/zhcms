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
    <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/transport.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/common.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/user.js"></script>
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
            <div class="box">
                <div class="box_1">
                    <div class="userCenterBox">
                        <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="userMenu">
    <a href="<?php echo U('ec/EcUser/index');?>" <?php if($action == 'default'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u1.gif"/> ホーム</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=profile"<?php if($action == 'profile'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u2.gif"/> ユーザ情報</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=order_list"<?php if($action == 'order_list' or $action == 'order_detail'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u3.gif"/> 注文</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=address_list"<?php if($action == 'address_list'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u4.gif"/> 荷受住所</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=collection_list"<?php if($action == 'collection_list'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u5.gif"/> 収蔵</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=message_list"<?php if($action == 'message_list'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u6.gif"/> メッセージ</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=tag_list"<?php if($action == 'tag_list'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u7.gif"/> ラベル</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=booking_list"<?php if($action == 'booking_list'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u8.gif"/> 売り切れ登録</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=bonus"<?php if($action == 'bonus'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u9.gif"/> ボーナス</a>
    <?php if($affiliate['on'] == 1){?>
        <a href="user.php?act=affiliate"<?php if($action == 'affiliate'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u10.gif"/> お勧め</a>
    <?php }?>
    <a href="<?php echo U('ec/EcUser/index');?>&act=comment_list"<?php if($action == 'comment_list'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u11.gif"/> コメント</a>
    <!--<a href="user.php?act=group_buy"><?php echo $lang['label_group_buy'];?></a>-->
    <a href="<?php echo U('ec/EcUser/index');?>&act=track_packages"<?php if($action == 'track_packages'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u12.gif"/> 小包追跡</a>
    <a href="<?php echo U('ec/EcUser/index');?>&act=account_log"<?php if($action == 'account_log'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u13.gif"/> 資金管理</a>
    <?php if($show_transform_points){?>
        <a href="user.php?act=transform_points"<?php if($action == 'transform_points'){?>class="curs"<?php }?>><img src="http://www.metacms.com/template/v5/ec/common/style/images/u14.gif"/> ポイント</a>
    <?php }?>
    <a href="<?php echo U('ec/EcUser/index');?>&act=logout" style="background:none; text-align:right; margin-right:10px;">ログアウト</a>
</div>
                    </div>
                </div>
            </div>
        </div>
        <!--left end-->
        <!--right start-->
        <div class="AreaR">
            <div class="box">
                <div class="box_1">
                    <div class="userCenterBox boxCenterList clearfix" style="_height:1%;">
                        <!-- *用户中心默认显示页面 start-->
                        <?php if($action == 'default'){?>
                            <font class="f5"><b class="f4"><?php echo $info['username'];?></b> いらっしゃい <?php echo $info['shop_name'];?>！</font><br />
                            <div class="blank"></div>
                            前回登録時間: <?php echo $info['last_time'];?><br />
                            <?php if($info['is_validate'] == 0){?>
                                まだメール認証してません <a href="javascript:sendHashMail()" style="color:#006bd0;">クリックして、認証メールを送る</a><br />
                            <?php }?>            
                            <div style="margin:5px 0; border:1px solid #a1675a;padding:10px 20px; background-color:#e8d1c9;">
                                <img src="http://www.metacms.com/template/v5/ec/common/style/images/note.gif" alt="note" />&nbsp;<?php echo $user_notice;?>
                            </div>
                            <br /><br />
                            <div class="f_l" style="width:350px;">
                                <h5><span>アカウント</span></h5>
                                <div class="blank"></div>
                                殘高:<a href="<?php echo U('index');?>&act=account_log" style="color:#006bd0;"><?php echo $info['surplus'];?></a><br />
                                <!-- 如果有信用额度 -->
                                <?php if($info['credit_line'] > 0){?>
                                    信用限度額:<?php echo $info['formated_credit_line'];?><br />
                                <?php }?>
                                ボーナス:<a href="<?php echo U('index');?>&act=bonus" style="color:#006bd0;"><?php echo $info['bonus'];?></a><br />
                                ポイント:<?php echo $info['integral'];?><br />
                            </div>
                            <div class="f_r" style="width:350px;">
                                <h5><span>ユーザ提示</span></h5>
                                <div class="blank"></div>
                                <?php if(is_array($prompt)):?><?php $index=0; ?><?php  foreach($prompt as $item){ ?>
                                    <?php echo $item['text'];?><br />
                                <?php $index++; ?><?php }?><?php endif;?>
                                最近30日内に<?php echo $info['order_count'];?>個の注文があり<br />
                                <?php if($info['shipped_order']){?>
                                    以下の注文は送品しました，受け取り注意してください<br />
                                    <?php if(is_array($info['shipped_order'])):?><?php $index=0; ?><?php  foreach($info['shipped_order'] as $item){ ?>
                                        <a href="user.php?act=order_detail&order_id=<?php echo $item['order_id'];?>" style="color:#006bd0;"><?php echo $item['order_sn'];?></a>
                                    <?php $index++; ?><?php }?><?php endif;?>
                                <?php }?>
                            </div>
                        <?php }?>
                        <!-- #用户中心默认显示页面 end-->
                        <!-- *我的留言 start-->
                        <?php if($action == 'message_list'){?>
                            <h5><span>我的留言</span></h5>
                            <div class="blank"></div>
                            <?php if(is_array($message_list)):?><?php $index=0; ?><?php  foreach($message_list as $message_key=>$message){ ?>
                                <div class="f_l">
                                    <b><?php echo $message['msg_type'];?>:</b>&nbsp;&nbsp;
                                    <font class="f4"><?php echo $message['msg_title'];?></font> (<?php echo $message['msg_time'];?>)
                                </div>
                                <div class="f_r">
                                    <a href="<?php echo U('index');?>&act=del_msg&amp;id=<?php echo $message_key;?>&amp;order_id=<?php echo $message['order_id'];?>" title="删除" onclick="if (!confirm('你确实要彻底删除这条留言吗？')) return false;" class="f6">删除</a>
                                </div>
                                <div class="msgBottomBorder">
                                    <?php echo $message['msg_content'];?>
                                    <!-- 如果上传了图片-->
                                    <?php if($message['message_img']){?>
                                        <div align="right">
                                            <a href="<?php echo $message['message_img'];?>" target="_bank" class="f6">查看上传的文件</a>
                                        </div>
                                    <?php }?> 
                                    <br />
                                    <?php if($message['re_msg_content']){?>
                                        <a href="mailto:<?php echo $message['re_user_email'];?>" class="f6">管理员回复</a> (<?php echo $message['re_msg_time'];?>)<br />
                                        <?php echo $message['re_msg_content'];?>
                                    <?php }?> 
                                </div>
                            <?php $index++; ?><?php }?><?php endif;?>
                            <?php if($message_list){?>
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
                            <div class="blank"></div>
                            <form action="<?php echo U('index');?>" method="post" enctype="multipart/form-data" name="formMsg" onSubmit="return submitMsg()">
                                <table width="100%" border="0" cellpadding="3">
                                    <?php if($order_info){?>
                                        <tr>
                                            <td align="right">订单编号:</td>
                                            <td>
                                                <a href ="<?php echo $order_info['url'];?>">
                                                    <img src="http://www.metacms.com/template/v5/ec/common/style/images/note.gif" /><?php echo $order_info['order_sn'];?>
                                                </a>
                                                <input name="msg_type" type="hidden" value="5" />
                                                <input name="order_id" type="hidden" value="<?php echo $order_info['order_id'];?>" class="inputBg" />
                                            </td>
                                        </tr>
                                    <?php  }else{ ?>
                                        <tr>
                                            <td align="right">留言类型：</td>
                                            <td>
                                                <input name="msg_type" type="radio" value="0" checked="checked" />
                                                留言
                                                <input type="radio" name="msg_type" value="1" />
                                                投诉
                                                <input type="radio" name="msg_type" value="2" />
                                                询问
                                                <input type="radio" name="msg_type" value="3" />
                                                售后
                                                <input type="radio" name="msg_type" value="4" />
                                                求购
                                            </td>
                                        </tr>
                                    <?php }?>
                                    <tr>
                                        <td align="right">主题：</td>
                                        <td><input name="msg_title" type="text" size="30" class="inputBg" /></td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="top">留言内容：</td>
                                        <td><textarea name="msg_content" cols="50" rows="4" wrap="virtual" class="B_blue"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td align="right">上传文件：</td>
                                        <td><input type="file" name="message_img"  size="45"  class="inputBg" /></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <input type="hidden" name="act" value="act_add_message" />
                                            <input type="submit" value="提交" class="bnt_bonus" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            小提示：<br />
                                            您可以上传以下格式的文件：<br />gif、jpg、png、word、excel、txt、zip、ppt、pdf
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            
                            
                        <?php }?>
                        <!--#我的留言 end-->
                        
                        <!--*收藏商品列表页面 start-->
                        <?php if($action == 'collection_list'){?>
                            <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/transport.js"></script>
                            <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/utils.js"></script>
                            <h5><span>我的收藏</span></h5>
                            <div class="blank"></div>
                            <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                <tr align="center">
                                    <th width="35%" bgcolor="#ffffff">商品名称</th>
                                    <th width="30%" bgcolor="#ffffff">价格</th>
                                    <th width="35%" bgcolor="#ffffff">操作</th>
                                </tr>
                                <?php if(is_array($goods_list)):?><?php $index=0; ?><?php  foreach($goods_list as $goods){ ?>
                                    <tr>
                                        <td bgcolor="#ffffff"><a href="<?php echo $goods['url'];?>" class="f6"><?php echo $goods['goods_name'];?></a></td>
                                        <td bgcolor="#ffffff">
                                            <?php if($goods['promote_price'] <> ''){?>
                                                促销价：<span class="goods-price"><?php echo $goods['promote_price'];?></span>
                                            <?php  }else{ ?>
                                                本店价格：<span class="goods-price"><?php echo $goods['shop_price'];?></span>
                                            <?php }?>
                                        </td>
                                        <td align="center" bgcolor="#ffffff">
                                            <?php if($goods['is_attention']){?>
                                                <a href="javascript:if (confirm('确认取消此商品的关注么？')) location.href='<?php echo U('index');?>&act=del_attention&rec_id=<?php echo $goods['rec_id'];?>'" class="f6">取消关注</a>
                                            <?php  }else{ ?>
                                                <a href="javascript:if (confirm('确定将此商品加入关注列表么？')) location.href='<?php echo U('index');?>&act=add_to_attention&rec_id=<?php echo $goods['rec_id'];?>'" class="f6">关注</a>
                                            <?php }?>
                                            <a href="javascript:addToCart(<?php echo $goods['goods_id'];?>)" class="f6">加入购物车</a> 
                                            <a href="javascript:if (confirm('您确定要从收藏夹中删除选定的商品吗？')) location.href='<?php echo U('index');?>&act=delete_collection&collection_id=<?php echo $goods['rec_id'];?>'" class="f6">删除</a>
                                        </td>
                                    </tr>
                                <?php $index++; ?><?php }?><?php endif;?>
                            </table>
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
                            <div class="blank5"></div>
                            <h5><span>我的推荐</span></h5>
                            <div class="blank"></div>
                            <form name="theForm" method="post" action="">
                                <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                    <tr>
                                        <td align="right" bgcolor="#ffffff">是否显示商品图片：</td>
                                        <td bgcolor="#ffffff">
                                            <select name="need_image" id="need_image" class="inputBg">
                                                <option value="true" selected>显示</option>
                                                <option value="false">不显示</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" bgcolor="#ffffff">显示商品数量：</td>
                                        <td bgcolor="#ffffff">
                                            <input name="goods_num" type="text" id="goods_num" value="6" class="inputBg" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" bgcolor="#ffffff">选择商品排列方式：</td>
                                        <td bgcolor="#ffffff">
                                            <select name="arrange" id="arrange" class="inputBg">
                                                <option value="h" selected>横排</option>
                                                <option value="v">竖排</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" bgcolor="#ffffff">排列显示条目数：</td>
                                        <td bgcolor="#ffffff">
                                            <input name="rows_num" type="text" id="rows_num" value="1" class="inputBg" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" bgcolor="#ffffff">选择编码：</td>
                                        <td bgcolor="#ffffff">
                                            <select name="charset" id="charset">
                                                <?php if(isset($lang_list) && !empty($lang_list)):$arr["options"]=$lang_list;$arr["selected"]=null;echo html_options($arr);endif;
?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center" bgcolor="#ffffff">
                                            <input type="button" name="gen_code" value="生成代码" onclick="genCode()" class="bnt_blue_1" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center" bgcolor="#ffffff">
                                            <textarea name="code" cols="80" rows="5" id="code" class="B_blue"></textarea>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <script language="JavaScript">
                                var elements = document.forms['theForm'].elements;
                                var url = '<?php echo $url;?>';
                                var u   = '<?php echo $user_id;?>';
                                /**
                                * 生成代码
                                */
                                function genCode()
                                {
                                    // 检查输入
                                    if (isNaN(parseInt(elements['goods_num'].value)))
                                    {
                                        alert('商品数量应该是整数');
                                        return;
                                    }
                                    if (elements['goods_num'].value < 1)
                                    {
                                        alert('商品数量应该大于0');
                                        return;
                                    }
                                    if (isNaN(parseInt(elements['rows_num'].value)))
                                    {
                                        alert('排列显示条目数应该是整数');
                                        return;
                                    }
                                    if (elements['rows_num'].value < 1)
                                    {
                                        alert('排列显示条目数应该大于0');
                                        return;
                                    }
                                    
                                    // 生成代码
                                    var code = '\<script src=\"' + url + 'goods_script.php?';
                                    code += 'need_image=' + elements['need_image'].value + '&';
                                    code += 'goods_num=' + elements['goods_num'].value + '&';
                                    code += 'arrange=' + elements['arrange'].value + '&';
                                    code += 'rows_num=' + elements['rows_num'].value + '&';
                                    code += 'charset=' + elements['charset'].value + '&u=' + u;
                                    code += '\"\>\</script\>';
                                    elements['code'].value = code;
                                    elements['code'].select();
                                    if (Browser.isIE)
                                    {
                                        window.clipboardData.setData("Text",code);
                                    }
                                }
                                var compare_no_goods = "您没有选定任何需要比较的商品或者比较的商品数少于 2 个。";
                                var btn_buy = "购买";
                                var is_cancel = "取消";
                                var select_spe = "请选择商品属性";
                            </script>
                        <?php }?>
                        <!--#收藏商品列表页面 end-->
                        
                        <!--#我的标签 start-->
                        <?php if($action == 'tag_list'){?>
                            <h5><span>我的标签</span></h5>
                            <div class="blank"></div>
                            <?php if($tags){?>
                                <!-- 标签云开始 -->
                                <?php if(is_array($tags)):?><?php $index=0; ?><?php  foreach($tags as $tag){ ?>
                                    <a href="search.php?keywords=<?php echo urlencode($tag['tag_words']);?>" class="f6"><?php echo $tag['tag_words'];?></a> 
                                    <a href="user.php?act=act_del_tag&amp;tag_words=<?php echo urlencode($tag['tag_words']);?>" onclick="if (!confirm('您确认要删除此标签吗？')) return false;" title="删除">
                                        <img src="http://www.metacms.com/template/v5/ec/common/style/images/drop.gif" alt="删除" />
                                    </a>&nbsp;&nbsp;
                                <?php $index++; ?><?php }?><?php endif;?>
                            <?php  }else{ ?>
                                <span style="margin:2px 10px; font-size:14px; line-height:36px;">暂时没有标签</span>
                            <?php }?>
                        <?php }?>
                        <!--#我的标签 end-->
                        
                        <!--*缺货登记列表页面 start-->
                        <?php if($action == 'booking_list'){?>
                            <h5><span>缺货登记</span></h5>
                            <div class="blank"></div>
                            <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                <tr align="center">
                                    <td width="20%" bgcolor="#ffffff">订购商品名</td>
                                    <td width="10%" bgcolor="#ffffff">订购数量</td>
                                    <td width="20%" bgcolor="#ffffff">登记时间</td>
                                    <td width="35%" bgcolor="#ffffff">处理备注</td>
                                    <td width="15%" bgcolor="#ffffff">操作</td>
                                </tr>
                                <?php if(is_array($booking_list)):?><?php $index=0; ?><?php  foreach($booking_list as $item){ ?>
                                    <tr>
                                        <td align="left" bgcolor="#ffffff">
                                            <a href="<?php echo $item['url'];?>" target="_blank" class="f6"><?php echo $item['goods_name'];?></a>
                                        </td>
                                        <td align="center" bgcolor="#ffffff"><?php echo $item['goods_number'];?></td>
                                        <td align="center" bgcolor="#ffffff"><?php echo $item['booking_time'];?></td>
                                        <td align="left" bgcolor="#ffffff"><?php echo $item['dispose_note'];?></td>
                                        <td align="center" bgcolor="#ffffff">
                                            <a href="javascript:if (confirm('您确定要删除此条记录吗？')) location.href='user.php?act=act_del_booking&id=<?php echo $item['rec_id'];?>'" class="f6">
                                            删除
                                            </a> 
                                        </td>
                                    </tr>
                                <?php $index++; ?><?php }?><?php endif;?>
                            </table>
                        <?php }?>
                        <div class="blank5"></div>
                        <!--#缺货登记列表页面 end -->
                        
                        <!-- *我的评论 start-->
                        <?php if($action == 'comment_list'){?>
                            <h5><span><?php echo $lang['label_comment'];?></span></h5>
                            <div class="blank"></div>
                            <?php if($comment_list){?>
                                <?php if(is_array($comment_list)):?><?php $index=0; ?><?php  foreach($comment_list as $comment){ ?>
                                    <div class="f_l">
                                        <b>
                                        <?php if($comment['comment_type'] == '0'){?>
                                            商品评论
                                        <?php  }else{ ?>
                                            文章评论
                                        <?php }?>: </b><font class="f4"><?php echo $comment['cmt_name'];?></font>&nbsp;&nbsp;(<?php echo $comment['formated_add_time'];?>)
                                    </div>
                                    <div class="f_r">
                                        <a href="<?php echo U('index');?>&act=del_cmt&amp;id=<?php echo $comment['comment_id'];?>" title="删除" onclick="if (!confirm('你确实要彻底删除这条留言吗？')) return false;" class="f6">删除</a>
                                    </div>
                                    <div class="msgBottomBorder">
                                        <?php echo htmlspecialchars($comment['content']);?><br />
                                        <?php if($comment['reply_content']){?>
                                            <b>回复评论：</b><br />
                                            <?php echo $comment['reply_content'];?>
                                        <?php }?>
                                    </div>
                                <?php $index++; ?><?php }?><?php endif;?>
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
                            <?php  }else{ ?>
                                暂时还没有任何用户评论 
                            <?php }?>
                        <?php }?>
                        <!--#我的评论 end-->
                        
                    </div>
                </div>
            </div>
        </div>
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
<script type="text/javascript">
var msg_title_empty = "留言标题为空";
var msg_content_empty = "留言内容为空";
var msg_title_limit = "留言标题不能超过200个字";
</script>
</html>