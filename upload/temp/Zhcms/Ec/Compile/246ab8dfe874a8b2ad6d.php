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

    <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/common.js"></script>
    <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/user.js"></script>
    <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/transport_jquery.js"></script>
</head>
<body>

<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--<link href="http://www.works.com/template/v3/ec/common/qq/images/qq.css" rel="stylesheet" type="text/css" />-->
<script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/jquery.json.js"></script>

<script type="text/javascript">
var process_request = "正在处理您的请求...";
</script>
<script type="text/javascript">
//设为首页 www.ecmoban.com
function SetHome(obj,url){
    try{
        obj.style.behavior='url(#default#homepage)';
       obj.setHomePage(url);
   }catch(e){
       if(window.netscape){
          try{
              netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
         }catch(e){
              alert("抱歉，此操作被浏览器拒绝！\n\n请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为'true'");
          }
       }else{
        alert("抱歉，您所使用的浏览器无法完成此操作。\n\n您需要手动将【"+url+"】设置为首页。");
       }
  }
}

//收藏本站 bbs.ecmoban.com
function AddFavorite(title, url) {
  try {
      window.external.addFavorite(url, title);
  }
catch (e) {
     try {
       window.sidebar.addPanel(title, url, "");
    }
     catch (e) {
         alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
     }
  }
}

</script>

<!--顶部导航-->
<div class="top_nav">
    <script type="text/javascript">
          //初始化主菜单
            function sw_nav(obj,tag)
            {
     
                var DisSub = document.getElementById("DisSub_"+obj);
                var HandleLI= document.getElementById("HandleLI_"+obj);
                if(tag==1)
                {
                    DisSub.style.display = "block";
             
                    
                }
                else
                {
                    DisSub.style.display = "none";
                
                }
     
            }
     
            function test()
            {
                
            }
            
            /*function checkSearchForm()
            {
                if(document.getElementById('keyword').value)
                {
                    return true;
                }
                else
                {
                    alert("<?php echo $lang['no_keywords'];?>");
                    return false;
                }
            }*/
    </script>
    <div class="block">
        <!--顶部微博微信弹出区域 start-->
        <ul class="top_bav_l">
            <li class="top_sc">
                <a href="javascript:void(0);" onclick="AddFavorite('我的网站',location.href)">收藏本站</a>
            </li>
            <li>关注我们：</li>
            <?php if(C("EC_WEIBO_LINK")||C("EC_QQ_WEIBO_LINK")){?>
                <li style="border:none" class="menuPopup"  onMouseOver="sw_nav(1,1);" onMouseOut="sw_nav(1,0);">
                    <a id="HandleLI_1" href="javascript:;" title="微博" class="attention" ></a> 
                    <div id=DisSub_1 class="top_nav_box  top_weibo"> 
                        <?php if(C("EC_WEIBO_LINK")){?>
                        <a href="<?php echo C("EC_WEIBO_LINK");?>" target="_blank" title="新浪微博" class="top_weibo"></a>
                        <?php }?>
                        <?php if(C("EC_QQ_WEIBO_LINK")){?>
                        <a href="<?php echo C("EC_QQ_WEIBO_LINK");?>" target="_blank" title="QQ微博" class="top_qq"></a> 
                        <?php }?>
                    </div>
                </li>
            <?php }?>
            <?php if(C("EC_WEICHAT_QR")){?>
            <li class="menuPopup" onMouseOver="sw_nav(2,1);" onMouseOut="sw_nav(2,0);">
                <a id="HandleLI_2" href="javascript:;" title="微信" class="top_weixin"></a> 
                <div id="DisSub_2" class="weixinBox" style="display: none;"> 
                    <img src="<?php echo C("EC_WEICHAT_QR");?>" style="width:150px; height:150px;  background:#0000CC" width="150" height="150"/> 
                </div>
            </li>
            <?php }?>
        </ul>
        <!--顶部微博微信弹出区域 end-->
        
        <div class="header_r">
            <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/transport_jquery.js"></script>
            <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/utils.js"></script>
            <font id="ECS_MEMBERZONE">
            <?php 
            insert_member_info();
            ?>
            </font>
            
            <?php if($navigator_list['top']){?>
                <?php if(is_array($navigator_list['top'])):?><?php $nav_top_list=0; ?><?php  foreach($navigator_list['top'] as $nav){ ?>
                    <a href="<?php echo $nav['url'];?>" <?php if($nav['opennew'] == 1){?> target="_blank" <?php }?>><?php echo $nav['name'];?></a>
                    <?php if($nav_top_list <> count($navigator_list['top'])-1){?>
                    |
                    <?php }?>
                <?php $nav_top_list++; ?><?php }?><?php endif;?>
            <?php }?>
            
        </div>
        
    </div>
</div>
<div class=" block header_bg" style="margin-bottom: 0px;">
    <div class="clear_f"></div>
    <div class="header_top logo_wrap">
        <a class="logo_new" href="<?php echo U('ec/EcIndex/index');?>"><img src="http://www.works.com/template/v3/ec/common/images/logo.gif" /></a>
        <div class="ser_n">
            <form id="searchForm" class="searchBox" name="searchForm" method="get" action="" onSubmit="">
                <input type="hidden" name="a" value="ec" />
                <input type="hidden" name="c" value="EcSearch" />
                <input type="hidden" name="m" value="index" />
                <div class="search-table"> 
                    <span class="cur" data-type="1">宝贝</span> 
                    <em class="arrow"></em> 
                </div>
                <span class="ipt1">
                    <em class="i_search"></em>
                    <input name="keywords" type="text" id="keyword" value="<?php echo $search_keywords;?>" class="searchKey" />
                </span>
                <span class="ipt2">
                    <input type="submit"  name="imageField" class="fm_hd_btm_shbx_bttn" value="搜 索"/>
                </span>
            </form>
            <div class="clear_f"></div>
            <ul class="searchType none_f">
            </ul>
        </div>
        <ul class="cart_info">
            <li id="ECS_CARTINFO">
                <span class="carts_num none_f">
                <?php 
                insert_cart_info();
                ?>
                </span>
                <em class="i_cart">&nbsp;</em>
                <a href="<?php echo U('ec/EcFlow/index');?>">查看购物车</a>
            </li>
            <li>
                <a href="<?php echo U('ec/EcUser/index');?>" target="_blank"><em class="i_order">&nbsp;</em>我的订单</a>
            </li>
        </ul>
    </div>
</div>

<div style="clear:both"></div>

<div class="menu_box clearfix"> 
    <div class="block"> 
        <div class="menu">
            <a href="<?php echo U('ec/EcIndex/index');?>"<?php if($navigator_list['config']['index'] == 1){?> class="cur"<?php }?>>首页<span></span></a>
            <?php if(is_array($navigator_list['middle'])):?><?php $nav_middle_list=0; ?><?php  foreach($navigator_list['middle'] as $nav){ ?>
                <a href="<?php echo U('ec/EcCategory/index',array('id'=>$nav['cid']));?>" <?php if($nav['opennew'] == 1){?> target="_blank" <?php }?> <?php if($nav['active'] == 1){?> class="cur"<?php }?>><?php echo $nav['name'];?><span></span></a>
            <?php $nav_middle_list++; ?><?php }?><?php endif;?>
        </div>
    </div>
</div>



<div class="block block1">
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="block box">
    <div class="blank"></div>
    <div id="ur_here">
    当前位置:<?php echo $ur_here;?> 
    </div>
</div>
<div class="blank"></div>
    <!--#登录界面 start-->
    <?php if($action == 'login'){?>
        <div class="usBox clearfix">
            <div class="usBox_1 f_l">
                <div class="login_tab">
                    <ul>
                        <li class="active"><a href="<?php echo U('index');?>">用户登录</a></li>
                        <li ><a href="<?php echo U('index',array('act'=>'register'));?>">用户注册</a></li>
                    </ul>
                </div>
                <form name="formLogin" action="<?php echo U('ec/EcUser/index');?>" method="post" onSubmit="return userLogin()">
                    <table width="100%" border="0" align="left" cellpadding="3" cellspacing="5">
                        <tr>
                            <td width="25%" align="right">用户名</td>
                            <td width="65%"><input name="username" type="text" size="25" class="inputBg" /></td>
                        </tr>
                        <tr>
                            <td align="right">密码</td>
                            <td>
                            <input name="password" type="password" size="15"  class="inputBg"/>            
                            </td>
                        </tr>
                        <!-- 判断是否启用验证码 -->
                        <?php if($enabled_captcha){?>
                        <tr>
                            <td align="right">验证码</td>
                            <td>
                                <input type="text" size="8" name="captcha" class="inputBg" />
                                <img src="<?php echo U('ec/EcCaptcha/index');?>&is_login=1&<?php echo $rand;?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='<?php echo U('ec/EcCaptcha/index');?>&is_login=1&'+Math.random()" /> 
                            </td>
                        </tr>
                        <?php }?>
                        <tr>
                            <td> </td>
                            <td>
                                <input type="checkbox" value="1" name="remember" id="remember" />
                                <label for="remember">请保存我这次的登录信息。</label>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="left">
                                <input type="hidden" name="act" value="act_login" />
                                <input type="hidden" name="back_act" value="<?php echo $back_act;?>" />
                                <input type="submit" name="submit" value="" class="us_Submit" />            
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <a href="user.php?act=qpassword_name" class="f3">密码问题找回密码</a>
                                &nbsp;&nbsp;&nbsp;
                                <a href="user.php?act=get_password" class="f3">注册邮件找回密码</a>
                            </td>
                        </tr>
                    </table>
                </form>
                <div class="blank"></div>
            </div>
            <div class="usTxt">
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><a href="http://bbs.ecmoban.com" title="ecshop模板堂论坛 ecshop资源下载第一站" target="_blank">
    <img alt="ecshop模板堂论坛 ecshop资源下载第一站" src="http://www.works.com/template/v3/ec/common/images/ecmoban.jpg" />
</a>
            </div>
        </div>
    <?php }?>
    <!--#登录界面 end-->
    
    <!--*会员注册界面 start-->
    <?php if($action == 'register'){?>
        <?php if($shop_reg_closed == 1){?>
        <div class="usBox">
            <div class="usBox_2 clearfix">
                <div class="f1 f5" align="center">该网店暂停注册</div>
            </div>
        </div>
        <?php  }else{ ?>
        <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/utils.js"></script>
        <div class="usBox">
            <div class="usBox_1 f_l">
                <div class="login_tab">
                    <ul>
                        <li  ><a href="<?php echo U('index');?>">用户登录</a></li>
                        <li class="active"><a href="<?php echo U('index',array('act'=>'register'));?>">用户注册</a></li>
                    </ul>
                </div>
                <form action="<?php echo U('ec/EcUser/index');?>" method="post" name="formUser" onsubmit="return register();">
                    <table width="100%"  border="0" align="left" cellpadding="5" cellspacing="3">
                        <tr>
                            <td width="25%" align="right">用户名</td>
                            <td width="65%">
                                <input name="username" type="text" size="25" id="username" onblur="is_registered(this.value);" class="inputBg"/>
                                <span id="username_notice" style="color:#FF0000"> *</span>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">email</td>
                            <td>
                                <input name="email" type="text" size="25" id="email" onblur="checkEmail(this.value);"  class="inputBg"/>
                                <span id="email_notice" style="color:#FF0000"> *</span>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">密码</td>
                            <td>
                                <input name="password" type="password" id="password1" onblur="check_password(this.value);" onkeyup="checkIntensity(this.value)" class="inputBg" style="width:179px;" />
                                <span style="color:#FF0000" id="password_notice"> *</span>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">密码强度</td>
                            <td>
                                <table width="145" border="0" cellspacing="0" cellpadding="1">
                                    <tr align="center">
                                        <td width="33%" id="pwd_lower">弱</td>
                                        <td width="33%" id="pwd_middle">中</td>
                                        <td width="33%" id="pwd_high">强</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">确认密码</td>
                            <td>
                                <input name="confirm_password" type="password" id="conform_password" onblur="check_conform_password(this.value);"  class="inputBg" style="width:179px;"/>
                                <span style="color:#FF0000" id="conform_password_notice"> *</span>
                            </td>
                        </tr>
                        <?php if(is_array($extend_info_list)):?><?php $index=0; ?><?php  foreach($extend_info_list as $field){ ?>
                            <?php if($field['id'] == 6){?>
                            <tr>
                                <td align="right">密码提示问题</td>
                                <td>
                                    <select name='sel_question'>
                                        <option value='0'>请选择密码提示问题</option>
                                        <?php if(isset($passwd_questions) && !empty($passwd_questions)):$arr["options"]=$passwd_questions;$arr["selected"]=null;echo html_options($arr);endif;
?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" <?php if($field['is_need']){?> id="passwd_quesetion" <?php }?> >密码问题答案</td>
                                <td>
                                    <input name="passwd_answer" type="text" size="25" class="inputBg" maxlengt='20'/>
                                    <?php if($field['is_need']){?> <span style="color:#FF0000"> *</span> <?php }?> 
                                </td>
                            </tr>
                            <?php  }else{ ?>
                            <tr>
                                <td align="right" <?php if($field['is_need']){?> id="extend_field<?php echo $field['id'];?>i"<?php }?> ><?php echo $field['reg_field_name'];?>
                                <td>
                                    <input name="extend_field<?php echo $field['id'];?>" type="text" size="25" class="inputBg" />
                                    <?php if($field['is_need']){?> <span style="color:#FF0000"> *</span> <?php }?>
                                </td>
                            </tr>
                            <?php }?>
                        <?php $index++; ?><?php }?><?php endif;?>
                        <!-- 判断是否启用验证码 -->
                        <?php if($enabled_captcha){?>
                        <tr>
                            <td align="right">验证码</td>
                            <td>
                                <input type="text" size="8" name="captcha" class="inputBg" />
                                <img src="<?php echo U('ec/EcCaptcha/index');?>&<?php echo $rand;?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='<?php echo U('ec/EcCaptcha/index');?>&'+Math.random()" /> 
                            </td>
                        </tr>
                        <?php }?>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <label>
                                <input name="agreement" type="checkbox" value="1" checked="checked" />
                                我已看过并接受《<a href="<?php echo U('ec/EcArticle/index');?>&cat_id=-1" style="color:blue" target="_blank">用户协议</a>》
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="left">
                                <input name="act" type="hidden" value="act_register" />
                                <input type="hidden" name="back_act" value="<?php echo $back_act;?>" />
                                <input name="Submit" type="submit" value="" class="us_Submit_reg"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" colspan="2" align="center">
                                <a href="user.php?act=qpassword_name" class="f6">
                                密码问题找回密码
                                </a>   
                                <a href="user.php?act=get_password" class="f6">
                                注册邮件找回密码
                                </a>
                            </td>
                        </tr>
                    </table>
                </form>
                <div class="blank"></div>
            </div>
            <div class="usTxt">
                <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><a href="http://bbs.ecmoban.com" title="ecshop模板堂论坛 ecshop资源下载第一站" target="_blank">
    <img alt="ecshop模板堂论坛 ecshop资源下载第一站" src="http://www.works.com/template/v3/ec/common/images/ecmoban.jpg" />
</a>
            </div>
        </div>
        <?php }?>
    <?php }?>
    
</div>
<div class="blank"></div>
<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="footer">
    <div class="foot_con">
        <div class="f_list service_info">
            <div class="kefu"> 
                <span class="tel_ico"></span>
                <p class="f20_f">4000-021-758</p>
                <p class="f14_f mt4_f">模板堂客服热线</p>
            </div>
            <ol class="business">
                <li>周一至周日：09:00-22:00</li>
            </ol>
        </div>
        <?php if($helps){?>
            <?php if(is_array($helps)):?><?php $foo=0; ?><?php  foreach($helps as $help_cat){ ?>
                <?php if($foo < 3){?>
                    <div  class="f_list">
                        <h4><?php echo $help_cat['cat_name'];?></h4>
                        <ul>
                        <?php if(is_array($help_cat['article'])):?><?php $index=0; ?><?php  foreach($help_cat['article'] as $item){ ?>
                            <li><a target="_blank" href="<?php echo $item['url'];?>" title="<?php echo htmlspecialchars($item['title']);?>" ><?php echo $item['short_title'];?></a></li>
                        <?php $foo++; ?><?php }?><?php endif;?>
                        </ul>
                    </div>
                <?php }?>
            <?php $index++; ?><?php }?><?php endif;?>
        <?php }?>
        <div class="f_list">
            <h4>关注我们</h4>
            <ul>
                <li class="sina_attention"> <a href="http://weibo.com/ECMBT/home?topnav=1&wvr=5 " target="_blank"><span class="i_sina">&nbsp;</span>新浪微博</a></li>
                <li><a href="#" target="_blank"><span class="i_qzone">&nbsp;</span>QQ空间</a></li>
                <li><a href="#" target="_blank"><span class="i_tx">&nbsp;</span>腾讯微博</a></li>
            </ul>
        </div>
        <div class="f_list qr-code">
            <h4>模板堂微信服务号</h4>
            <img src="http://www.works.com/template/v3/ec/common/images/weixinfuwuhao.png" alt="模板堂服务号二维码"/> 
        </div>
        <div class="f_list weixin_code">
            <h4>模板堂客户端下载</h4>
            <a class="client_pic" href="http://www.ecmoban.com/topic/ecmoban_app/" target="_blank"></a>
        </div>
        <div class="blank"></div>
            <!--友情链接 start--> 
            <?php if($img_links  or $txt_links){?>
            <div >
                <dl class="sncompany box_1" style="text-align:left; border-left:none; border-right:none; background:none;">
                    <dd class=""> 
                        <span>友情链接：</span>
                        <?php if($txt_links){?>
                            <!--开始文字类型的友情链接--> 
                            <?php if(is_array($txt_links)):?><?php $index=0; ?><?php  foreach($txt_links as $bottom=>$link){ ?>
                                <a href="<?php echo $link['url'];?>" target="_blank" title="<?php echo $link['name'];?>"><?php echo $link['name'];?></a>
                                <?php if(count($txt_links) <> ($bottom+1)){?>
                                <span>|</span>
                                <?php }?>
                            <?php $index++; ?><?php }?><?php endif;?>
                            <!--结束文字类型的友情链接--> 
                        <?php }?>
                    </dd>
                </dl>
            </div>
            <?php }?>
            <!--友情链接 end--> 
            <div class="blank"></div>
            <!--底部导航 start-->
            <div id="bottomNav" class="rolling" >
                <h4 class="f_links">底部导航：</h4>
                <ul id="link_slide">
                    <li>
                        <?php if($navigator_list['bottom']){?>
                            <?php if(is_array($navigator_list['bottom'])):?><?php $index=0; ?><?php  foreach($navigator_list['bottom'] as $nav_bottom_list=>$nav){ ?>
                            <a href="<?php echo $nav['url'];?>"  <?php if($nav['opennew'] == 1){?> target="_blank" <?php }?>><?php echo $nav['name'];?></a> 
                            <?php $index++; ?><?php }?><?php endif;?>
                        <?php }?>
                    </li>
                </ul>
            </div>
            <!--底部导航 end-->
            
            <!--版权 start-->
            <div class="text" >
                <?php echo $shop_address;?> 
                
                <!-- 客服电话--> 
                <?php if($service_phone){?>
                Tel: <?php echo $service_phone;?> 
                <?php }?>
                <!-- 结束客服电话 --> 
                <!-- 邮件 --> 
                <?php if($service_email){?>
                E-mail: <?php echo $service_email;?><br />
                <?php }?>
                <!-- 结束邮件 --> 
                
                <?php if(is_array($qq)):?><?php $index=0; ?><?php  foreach($qq as $im){ ?>
                    <?php if(!empty($im)){?>
                        <a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?php echo $im;?>&amp;Site=<?php echo $shop_name;?>&amp;Menu=yes" target="_blank">
                            <img src="http://wpa.qq.com/pa?p=1:<?php echo $im;?>:4" height="16" border="0" alt="QQ" /> <?php echo $im;?>
                        </a> 
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
                
                <?php if(is_array($ww)):?><?php $index=0; ?><?php  foreach($ww as $im){ ?>
                    <?php if(!empty($im)){?>
                        <a href="http://amos1.taobao.com/msg.ww?v=2&uid=<?php echo escape($im,u8_url);?>&s=2" target="_blank">
                            <img src="http://amos1.taobao.com/online.ww?v=2&uid=<?php echo escape($im,u8_url);?>&s=2" width="16" height="16" border="0" alt="淘宝旺旺" /><?php echo $im;?>
                        </a> 
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
                
                <?php if(is_array($ym)):?><?php $index=0; ?><?php  foreach($ym as $im){ ?>
                    <?php if(!empty($im)){?>
                        <a href="http://edit.yahoo.com/config/send_webmesg?.target=<?php echo $im;?>n&.src=pg" target="_blank">
                            <img src="../images/yahoo.gif" width="18" height="17" border="0" alt="Yahoo Messenger" /> <?php echo $im;?>
                        </a> 
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
                
                <?php if(is_array($msn)):?><?php $index=0; ?><?php  foreach($msn as $im){ ?>
                    <?php if(!empty($im)){?>
                        <img src="../images/msn.gif" width="18" height="17" border="0" alt="MSN" /> 
                        <a href="msnim:chat?contact=<?php echo $im;?>"><?php echo $im;?></a> 
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
                
                <?php if(is_array($skype)):?><?php $index=0; ?><?php  foreach($skype as $im){ ?>
                    <?php if(!empty($im)){?>
                        <img src="http://mystatus.skype.com/smallclassic/<?php echo escape($im,url);?>" alt="Skype" />
                        <a href="skype:<?php echo escape($im,url);?>?call"><?php echo $im;?></a> 
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
                
            </div>
            <div class="record">
                <?php echo $copyright;?>
                <?php if($icp_number){?>
                ICP备案证书号:<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo $icp_number;?></a> 
                <?php }?>
                &nbsp; <a href="#" target="_blank">电信与信息服务业务经营许可证100798号</a>
                &nbsp; <a href="#" target="_blank">企业法人营业执照</a>
                &nbsp; 京ICP备11031139号&nbsp; 京公网安备110108006045&nbsp;<br/>
                    客服邮箱：kf@mobantang.com&nbsp;&nbsp;客服电话：4000-021-758&nbsp; 文明办网文明上网举报电话：010-0000000 
                    &nbsp; <a href="#" target="_blank">违法不良信息举报中心</a>
            </div>
            <div class="blank10"></div>
            <div align="center">
                <a href=" http://www.ecmoban.com" target="_blank"><img src="http://www.works.com/template/v3/ec/common/images/ecmoban.gif" alt="ECShop模板" /></a>
            </div>
    </div>
</div>
</body>
<script type="text/javascript">
var process_request = "正在处理您的请求...";
var username_empty = "- 用户名不能为空。";
var username_shorter = "- 用户名长度不能少于 3 个字符。";
var username_invalid = "- 用户名只能是由字母数字以及下划线组成。";
var password_empty = "- 登录密码不能为空。";
var password_shorter = "- 登录密码不能少于 6 个字符。";
var confirm_password_invalid = "- 两次输入密码不一致";
var email_empty = "- Email 为空";
var email_invalid = "- Email 不是合法的地址";
var agreement = "- 您没有接受协议";
var msn_invalid = "- msn地址不是一个有效的邮件地址";
var qq_invalid = "- QQ号码不是一个有效的号码";
var home_phone_invalid = "- 家庭电话不是一个有效号码";
var office_phone_invalid = "- 办公电话不是一个有效号码";
var mobile_phone_invalid = "- 手机号码不是一个有效号码";
var msg_un_blank = "* 用户名不能为空";
var msg_un_length = "* 用户名最长不得超过7个汉字";
var msg_un_format = "* 用户名含有非法字符";
var msg_un_registered = "* 用户名已经存在,请重新输入";
var msg_can_rg = "* 可以注册";
var msg_email_blank = "* 邮件地址不能为空";
var msg_email_registered = "* 邮箱已存在,请重新输入";
var msg_email_format = "* 邮件地址不合法";
var msg_blank = "不能为空";
var no_select_question = "- 您没有完成密码提示问题的操作";
var passwd_balnk = "- 密码中不能包含空格";
var username_exist = "用户名 %s 已经存在";
</script>
</html>