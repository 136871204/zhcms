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
    <?php if($cat_style){?>
        <link href="<?php echo $cat_style;?>" rel="stylesheet" type="text/css" />
    <?php }?>
    <script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/common.js"></script>
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



    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="block box">
    <div class="blank"></div>
    <div id="ur_here">
    当前位置:<?php echo $ur_here;?> 
    </div>
</div>
<div class="blank"></div>
    <div class="block clearfix">
        <!--left start-->
        <div class="AreaL">
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($helps){?>
    <div class="left_help clearfix">
        <?php if(is_array($helps)):?><?php $index=0; ?><?php  foreach($helps as $help_cat){ ?>
            <dl>
                <dt> 
                    <img src="http://www.works.com/template/v3/ec/common/images/left_help_biao.gif"/> 
                    <a href='<?php echo $help_cat['cat_id'];?>' title="<?php echo $help_cat['cat_name'];?>"><?php echo $help_cat['cat_name'];?></a>
                </dt>
                <?php if(is_array($help_cat['article'])):?><?php $index=0; ?><?php  foreach($help_cat['article'] as $item){ ?>
                    <dd><a href="<?php echo $item['url'];?>" title="<?php echo $item['title'];?>"><?php echo $item['short_title'];?></a></dd>
                <?php $index++; ?><?php }?><?php endif;?>
            </dl>
        <?php $index++; ?><?php }?><?php endif;?>
    </div>
    <div class="blank"></div>
<?php }?>
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="box" id='history_div'>
    <div class="box_1">
        <h3><span>浏览历史</span></h3>
        <div class="boxCenterList clearfix" id='history_list'>
            <?php  
                echo insert_history();
            ?>
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
                    <div style="  background-color:#fff; padding:20px 15px;">
                        <div class="tc" style="padding:8px;">
                            <font class="f5 f6" style="font-size:18px; "><?php echo $article['title'];?></font><br />
                            <font class="f3"><?php echo $article['author'];?> / <?php echo $article['add_time'];?></font>
                        </div>
                        <?php if($article['content']){?>
                            <?php echo $article['content'];?>
                        <?php }?>
                        <?php if($article['open_type'] == 2 or $article['open_type'] == 1){?>
                            <div><a href="<?php echo $article['file_url'];?>" target="_blank">[ 相关下载 ]</a></div>
                        <?php }?>
                        <div style="padding:8px; margin-top:15px; text-align:left; border-top:1px solid #ccc;">
                            <!-- 上一篇文章 -->
                            <?php if($prev_article){?>
                                上一篇:<a href="<?php echo $prev_article['url'];?>" class="f6"><?php echo $prev_article['title'];?></a><br />
                            <?php }?>
                            <!-- 下一篇文章 -->
                            <?php if($next_article){?>
                                下一篇:<a href="<?php echo $next_article['url'];?>" class="f6"><?php echo $next_article['title'];?></a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blank"></div>
            <?php
            $comments_arr['type']=$type;
            $comments_arr['id']=$id;
            ?>
            <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/transport_jquery.js"></script>
<script type="text/javascript" src="http://www.works.com/template/v3/ec/common/js/utils.js"></script>

<?php
$comments_cmt = assign_comment($comments_arr['id'],          $comments_arr['type']);
$comments=$comments_cmt['comments'];
$comments_pager=$comments_cmt['pager'];
$comments_pager['current_app']=APP;
$comments_pager['current_control']=CONTROL;
$comments_pager['current_meth']='index';
?>

<!--用户评论 START-->
<div class="box">
    <div class="box_1">
        <h3>
            <span class="text">用户评论</span>
            (共<font class="f1"><?php echo $comments_pager['record_count'];?></font>条评论)
        </h3>
        <div class="boxCenterList clearfix" style="height:1%;">
            <ul class="comments">
                <?php if($comments){?>
                TODO:comments.lbi---1;
                <?php  }else{ ?>
                <li>暂时还没有任何用户评论</li>
                <?php }?>
            </ul>
            <!--翻页 start-->
            <div id="pagebar" class="f_r">
                <form name="selectPageForm" action="" method="get">
                    <input type="hidden" name="m" value="<?php echo $comments_pager['current_meth'];?>"/>
                    <input type="hidden" name="c" value="<?php echo $comments_pager['current_control'];?>"/>
                    <input type="hidden" name="a" value="<?php echo $comments_pager['current_app'];?>"/>
                    <?php if($comments_pager['styleid'] == 0){?>
                        <div id="pager">
                            总计<?php echo $comments_pager['record_count'];?>个记录，共<?php echo $comments_pager['page_count'];?>页。
                            <span> 
                                <a href="<?php echo $comments_pager['page_first'];?>">第一页</a> 
                                <a href="<?php echo $comments_pager['page_prev'];?>">上一页</a> 
                                <a href="<?php echo $comments_pager['page_next'];?>">下一页</a> 
                                <a href="<?php echo $comments_pager['page_last'];?>">最末页</a> 
                            </span>
                            <?php if(is_array($comments_pager['search'])):?><?php $index=0; ?><?php  foreach($comments_pager['search'] as $key=>$item){ ?>
                                <input type="hidden" name="<?php echo $key;?>" value="<?php echo $item;?>" />
                            <?php $index++; ?><?php }?><?php endif;?>
                        </div>
                    <?php  }else{ ?>
                        TODO:comments.lbi---2;
                    <?php }?>
                </form>
                <script type="Text/Javascript" language="JavaScript">
                    function selectPage(sel)
                    {
                        sel.form.submit();
                    }
                </script>
            </div>
            <!--翻页 END-->
            <div class="blank5"></div>
            <!--评论表单 start-->
            <div class="commentsList">
                <form action="javascript:;" onsubmit="submitComment(this)" method="post" name="commentForm" id="commentForm">
                    <table width="710" border="0" cellspacing="5" cellpadding="0">
                        <tr>
                            <td width="64" align="right">用户名：</td>
                            <td width="631">
                                <?php if($_SESSION['ec_user_name']){?>
                                    <?php echo $_SESSION['ec_user_name'];?>
                                <?php  }else{ ?>
                                    匿名用户
                                <?php }?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">E-mail：</td>
                            <td>
                                <input type="text" name="email" id="email"  maxlength="100" value="<?php echo $_SESSION['ec_email'];?>" class="inputBorder"/>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">评价等级：</td>
                            <td>
                                <input name="comment_rank" type="radio" value="1" id="comment_rank1" /> <img src="http://www.works.com/template/v3/ec/common/images/stars1.gif" />
                                <input name="comment_rank" type="radio" value="2" id="comment_rank2" /> <img src="http://www.works.com/template/v3/ec/common/images/stars2.gif" />
                                <input name="comment_rank" type="radio" value="3" id="comment_rank3" /> <img src="http://www.works.com/template/v3/ec/common/images/stars3.gif" />
                                <input name="comment_rank" type="radio" value="4" id="comment_rank4" /> <img src="http://www.works.com/template/v3/ec/common/images/stars4.gif" />
                                <input name="comment_rank" type="radio" value="5" checked="checked" id="comment_rank5" /> <img src="http://www.works.com/template/v3/ec/common/images/stars5.gif" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="top">评论内容：</td>
                            <td>
                                <textarea name="content" class="inputBorder" style="height:50px; width:620px;"></textarea>
                                <input type="hidden" name="cmt_type" value="<?php echo $comment_type;?>" />
                                <input type="hidden" name="id" value="<?php echo $id;?>" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <!-- 判断是否启用验证码-->
                                <?php if($enabled_captcha){?>
                                    <div style="padding-left:15px; text-align:left; float:left;">
                                        验证码：<input type="text" name="captcha"  class="inputBorder" style="width:50px; margin-left:5px;"/>
                                        <img src="<?php echo U('ec/EcCaptcha/index');?>&<?php echo $rand;?>" alt="captcha" onClick="this.src='<?php echo U('ec/EcCaptcha/index');?>&'+Math.random()" class="captcha"/>
                                    </div>
                                <?php }?>
                                <input name="" type="submit"  value="评论咨询" class="f_r bnt_blue_1" style=" margin-right:8px;"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <!--评论表单 end-->
            
            
        </div>
    </div>
</div>
<div class="blank5"></div>
<script type="text/javascript">
var cmt_empty_username = "请输入您的用户名称";
var cmt_empty_email = "请输入您的电子邮件地址";
var cmt_error_email = "电子邮件地址格式不正确";
var cmt_empty_content = "您没有输入评论的内容";
var captcha_not_null = "验证码不能为空!";
var cmt_invalid_comments = "无效的评论内容!";

/**
 * 提交评论信息
*/
function submitComment(frm)
{
    var cmt = new Object;

    //cmt.username        = frm.elements['username'].value;
    cmt.email           = frm.elements['email'].value;
    cmt.content         = frm.elements['content'].value;
    cmt.type            = frm.elements['cmt_type'].value;
    cmt.id              = frm.elements['id'].value;
    cmt.enabled_captcha = frm.elements['enabled_captcha'] ? frm.elements['enabled_captcha'].value : '0';
    cmt.captcha         = frm.elements['captcha'] ? frm.elements['captcha'].value : '';
    cmt.rank            = 0;

    for (i = 0; i < frm.elements['comment_rank'].length; i++)
    {
        if (frm.elements['comment_rank'][i].checked)
        {
            cmt.rank = frm.elements['comment_rank'][i].value;
        }
    }

    //  if (cmt.username.length == 0)
    //  {
    //     alert(cmt_empty_username);
    //     return false;
    //  }

    if (cmt.email.length > 0)
    {
        if (!(Utils.isEmail(cmt.email)))
        {
            alert(cmt_error_email);
            return false;
        }
    }
    else
    {
        alert(cmt_empty_email);
        return false;
    }

    if (cmt.content.length == 0)
    {
        alert(cmt_empty_content);
        return false;
    }

    if (cmt.enabled_captcha > 0 && cmt.captcha.length == 0 )
    {
        alert(captcha_not_null);
        return false;
    }

    Ajax.call('comment.php', 'cmt=' + $.toJSON(cmt), commentResponse, 'POST', 'JSON');
    return false;
}

/**
 * 处理提交评论的反馈信息
*/
function commentResponse(result)
{
    if (result.message)
    {
        alert(result.message);
    }
    
    if (result.error == 0)
    {
        var layer = document.getElementById('ECS_COMMENT');
        
        if (layer)
        {
            layer.innerHTML = result.content;
        }
    }
}
</script>
            
        </div>
        <!--right end-->
    </div>
    
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
</html>