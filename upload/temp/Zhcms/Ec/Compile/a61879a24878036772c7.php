<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/transport_jquery.js"></script>
<script type="text/javascript" src="http://www.works.com/template/v4/ec/common/js/utils.js"></script>

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
                    <?php if(is_array($comments)):?><?php $index=0; ?><?php  foreach($comments as $comment){ ?>
                        <li class="word">
                            <font class="f2">
                                <?php if($comment['username']){?>
                                    <?php echo $comment['username'];?>
                                <?php  }else{ ?>
                                    匿名用户
                                <?php }?>
                            </font> 
                            <font class="f3">( <?php echo $comment['add_time'];?> )</font><br />
                            <img src="http://www.works.com/template/v4/ec/common/style/images/stars<?php echo $comment['rank'];?>.gif" alt="<?php echo $comment['comment_rank'];?>" />
                            <p><?php echo $comment['content'];?></p>
                            <?php if($comment['re_content']){?>
                                <p><font class="f1">管理员：</font><?php echo $comment['re_content'];?></p>
                            <?php }?>
                        </li>
                    <?php $index++; ?><?php }?><?php endif;?>
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
                                <input name="comment_rank" type="radio" value="1" id="comment_rank1" /> <img src="http://www.works.com/template/v4/ec/common/style/images/stars1.gif" />
                                <input name="comment_rank" type="radio" value="2" id="comment_rank2" /> <img src="http://www.works.com/template/v4/ec/common/style/images/stars2.gif" />
                                <input name="comment_rank" type="radio" value="3" id="comment_rank3" /> <img src="http://www.works.com/template/v4/ec/common/style/images/stars3.gif" />
                                <input name="comment_rank" type="radio" value="4" id="comment_rank4" /> <img src="http://www.works.com/template/v4/ec/common/style/images/stars4.gif" />
                                <input name="comment_rank" type="radio" value="5" checked="checked" id="comment_rank5" /> <img src="http://www.works.com/template/v4/ec/common/images/stars5.gif" />
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