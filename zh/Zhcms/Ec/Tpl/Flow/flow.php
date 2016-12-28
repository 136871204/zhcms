<!DOCTYPE html>
<html>
<head>
    <title>EC演示</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <zhjs/>
    <link href="__STATIC__/ecimage/themes/default/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="__STATIC__/js/common.js"></script>
    <script type="text/javascript" src="__STATIC__/js/shopping_flow.js"></script>
    <script src='__STATIC__/js/utils.js'></script>
    <script src='__STATIC__/js/transport.js'></script>
</head>
<body>
<script type="text/javascript">
var process_request = "正在处理您的请求...";
</script>
<include file='__TEMPLATE__/ec/library/page_header.lbi'/>
<!--当前位置 start-->
<div class="block box">
    <div id="ur_here">
    <include file='__TEMPLATE__/ec/library/ur_here.lbi'/>
    </div>
</div>
<!--当前位置 end-->
<div class="blank"></div>
<div class="block">
    <if value=" $step eq 'cart'" >
        <!-- 购物车内容 -->
        <script type="text/javascript" src="__STATIC__/js/showdiv.js"></script> 
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
                        <if value=" $show_goods_attribute eq 1 ">
                            <th bgcolor="#ffffff">属性</th>
                        </if>
                        <if value=" $show_marketprice eq 1 ">
                            <th bgcolor="#ffffff">市场价</th>
                        </if>
                        <th bgcolor="#ffffff">本店价</th>
                        <th bgcolor="#ffffff">购买数量</th>
                        <th bgcolor="#ffffff">小计</th>
                        <th bgcolor="#ffffff">操作</th>
                    </tr>
                    <foreach from="$goods_list" value="$goods" >
                        <tr>
                            <td bgcolor="#ffffff" align="center">
                                <if value="$goods.goods_id gt 0 && $goods.extension_code neq 'package_buy' ">
                                    <if value="$show_goods_thumb eq 1 ">
                                        <a href="goods.php?id={$goods.goods_id}" target="_blank" class="f6">{$goods.goods_name}</a>
                                    <elseif value=" $show_goods_thumb eq 2 "/>
                                        <a href="goods.php?id={$goods.goods_id}" target="_blank">
                                            <img src="{$goods.goods_thumb}" border="0" title="{$goods.goods_name|htmlspecialchars:@@}" />
                                        </a>
                                    <else/>
                                        <a href="goods.php?id={$goods.goods_id}" target="_blank">
                                            <img src="{$goods.goods_thumb}" border="0" title="{$goods.goods_name|escape:html}" />
                                        </a><br />
                                        <a href="goods.php?id={$goods.goods_id}" target="_blank" class="f6">{$goods.goods_name}</a>
                                    </if>
                                    <if value=" $goods.parent_id gt 0 ">
                                    <!-- 配件 -->
                                    <span style="color:#FF0000">（配件）</span>
                                    </if>
                                    <if value=" $goods.is_gift gt 0 ">
                                    <!-- 赠品 -->
                                    <span style="color:#FF0000">（赠品）</span>
                                    </if>
                                <elseif value=" $goods.goods_id gt 0 && $goods.extension_code eq 'package_buy' "/>
                                  TODO打包购买之后做
                                </if>
                            </td>
                            <if value=" $show_goods_attribute eq 1 ">
                            <!-- 显示商品属性 -->
                                <td bgcolor="#ffffff">{$goods.goods_attr|nl2br}</td>
                            </if>
                            <if value=" $show_marketprice eq 1 ">
                            <!-- 显示市场价 -->
                                <td align="right" bgcolor="#ffffff">{$goods.market_price}</td>
                            </if>
                            <td align="right" bgcolor="#ffffff">{$goods.goods_price}</td>
                            <td align="right" bgcolor="#ffffff">
                                <if value=" $goods.goods_id gt 0 && $goods.is_gift eq 0 && $goods.parent_id eq 0 " >
                                <!-- 普通商品可修改数量 -->
                                <input type="text" name="goods_number[{$goods.rec_id}]" id="goods_number_{$goods.rec_id}" value="{$goods.goods_number}" size="4" class="inputBg" style="text-align:center " onkeydown="showdiv(this)"/>
                                <else/>
                                {$goods.goods_number}
                                </if>
                            </td>
                            <td align="right" bgcolor="#ffffff">{$goods.subtotal}</td>
                            <td align="center" bgcolor="#ffffff">
                                <a href="javascript:if (confirm('{$lang.drop_goods_confirm}')) location.href='flow.php?step=drop_goods&amp;id={$goods.rec_id}'; " class="f6">
                                    删除
                                </a>
                                <if value=" $_SEESION['uid'] gt 0 && $goods.extension_code neq 'package_buy' " >
                                <!-- 如果登录了，可以加入收藏 -->
                                <a href="javascript:if (confirm('{$lang.drop_goods_confirm}')) location.href='flow.php?step=drop_to_collect&amp;id={$goods.rec_id}'; " class="f6">
                                    放入收藏夹
                                </a>
                                </if>
                            </td>
                        </tr>
                        
                    </foreach>
                </table>
                <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                    <tr>
                        <td bgcolor="#ffffff">
                            <if value=" $discount gt 0 ">
                            {$your_discount}<br />
                            </if>
                            {$shopping_money}
                            <if value=" $show_marketprice eq 1 ">
                                <!-- 显示市场价 -->
                                ，{$market_price_desc}
                            </if>
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
                    <td bgcolor="#ffffff"><a href="./"><img src="__STATIC__/ecimage/themes/default/images/continue.gif" alt="continue" /></a></td>
                    <td bgcolor="#ffffff" align="right"><a href="{|U:'ec/flow/index',array('step'=>'checkout')}"><img src="__STATIC__/ecimage/themes/default/images/checkout.gif" alt="checkout" /></a></td>
                </tr>
            </table>
        </div>
    </if>
    
    <if value=" $step eq 'login'" >
        <script type="text/javascript" src="__STATIC__/js/user.js"></script> 
        <script>
        var username_not_null = "请您输入用户名。";
        var username_invalid = "您输入了一个无效的用户名。";
        var password_not_null = "请您输入密码。";
        var email_not_null = "请您输入电子邮件。";
        var email_invalid = "您输入的电子邮件不正确。";
        var password_not_same = "您输入的密码和确认密码不一致。";
        var password_lt_six = "密码不能小于6个字符。";
        
        
        
        function checkLoginForm(frm) {
          if (Utils.isEmpty(frm.elements['username'].value)) {
            alert(username_not_null);
            return false;
          }

          if (Utils.isEmpty(frm.elements['password'].value)) {
            alert(password_not_null);
            return false;
          }

          return true;
        }

        function checkSignupForm(frm) {
          if (Utils.isEmpty(frm.elements['username'].value)) {
            alert(username_not_null);
            return false;
          }

          if (Utils.trim(frm.elements['username'].value).match(/^\s*$|^c:\\con\\con$|[%,\'\*\"\s\t\<\>\&\\]/))
          {
            alert(username_invalid);
            return false;
          }

          if (Utils.isEmpty(frm.elements['email'].value)) {
            alert(email_not_null);
            return false;
          }

          if (!Utils.isEmail(frm.elements['email'].value)) {
            alert(email_invalid);
            return false;
          }

          if (Utils.isEmpty(frm.elements['password'].value)) {
            alert(password_not_null);
            return false;
          }

          if (frm.elements['password'].value.length < 6) {
            alert(password_lt_six);
            return false;
          }

          if (frm.elements['password'].value != frm.elements['confirm_password'].value) {
            alert(password_not_same);
            return false;
          }
          return true;
        }
        </script>
        <!-- 开始用户登录注册界面 -->
        <div class="flowBox">
            <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                <tr>
                    <td width="50%" valign="top" bgcolor="#ffffff">
                        <h6><span>用户登录：</span></h6>
                        <form action="flow.php?step=login" method="post" name="loginForm" id="loginForm" onsubmit="return checkLoginForm(this)">
                            <table width="90%" border="0" cellpadding="8" cellspacing="1" bgcolor="#B0D8FF" class="table">
                                <tr>
                                    <td bgcolor="#ffffff"><div align="right"><strong>用户名</strong></div></td>
                                    <td bgcolor="#ffffff"><input name="username" type="text" class="inputBg" id="username" /></td>
                                </tr>
                                <tr>
                                    <td bgcolor="#ffffff"><div align="right"><strong>密码</strong></div></td>
                                    <td bgcolor="#ffffff"><input name="password" class="inputBg" type="password" /></td>
                                </tr>
                                <!-- 判断是否启用验证码 -->
                                <if value="$enabled_login_captcha">
                                <tr>
                                    <td bgcolor="#ffffff"><div align="right"><strong>验证码:</strong></div></td>
                                    <td bgcolor="#ffffff"><input type="text" size="8" name="captcha" class="inputBg" />
                                    <img src="captcha.php?is_login=1&{$rand}" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" /> </td>
                                </tr>
                                </if>
                                <tr>
                                    <td colspan="2"  bgcolor="#ffffff">
                                        <input type="checkbox" value="1" name="remember" id="remember" />
                                        <label for="remember">请保存我这次的登录信息。</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#ffffff" colspan="2" align="center">
                                        <a href="user.php?act=qpassword_name" class="f6">密码问题找回密码</a>&nbsp;&nbsp;&nbsp;
                                        <a href="user.php?act=get_password" class="f6">注册邮件找回密码</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#ffffff" colspan="2">
                                        <div align="center">
                                            <input type="submit" class="bnt_blue" name="login" value="登录" />
                                            <!--  是否允许未登录用户购物 -->
                                            <if value=" $anonymous_buy eq 1 " >
                                            <input type="button" class="bnt_blue_2" value="不打算登录，直接购买" onclick="location.href='flow.php?step=consignee&amp;direct_shopping=1'" />
                                            </if>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                    <td valign="top" bgcolor="#ffffff">
                        <h6><span>用户注册：</span></h6>
                        <form action="{|U:'ec/flow/index',array('step'=>'login')}" method="post" name="formUser" id="registerForm" onsubmit="return checkSignupForm(this)">
                            <table width="98%" border="0" cellpadding="8" cellspacing="1" bgcolor="#B0D8FF" class="table">
                                <tr>
                                    <td bgcolor="#ffffff" align="right" width="25%"><strong>用户名</strong></td>
                                    <td bgcolor="#ffffff">
                                        <input name="username" type="text" class="inputBg" id="username" onblur="is_registered(this.value);" /><br />
                                        <span id="username_notice" style="color:#FF0000"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#ffffff" align="right"><strong>电子邮件地址</strong></td>
                                    <td bgcolor="#ffffff">
                                        <input name="email" type="text" class="inputBg" id="email" onblur="checkEmail(this.value);" /><br />
                                        <span id="email_notice" style="color:#FF0000"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#ffffff" align="right"><strong>密码</strong></td>
                                    <td bgcolor="#ffffff">
                                        <input name="password" class="inputBg" type="password" id="password1" onblur="check_password(this.value);" onkeyup="checkIntensity(this.value)" /><br />
                                        <span style="color:#FF0000" id="password_notice"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#ffffff" align="right"><strong>确认密码</strong></td>
                                    <td bgcolor="#ffffff">
                                        <input name="confirm_password" class="inputBg" type="password" id="confirm_password" onblur="check_conform_password(this.value);" /><br />
                                        <span style="color:#FF0000" id="conform_password_notice"></span>
                                    </td>
                                </tr>
                                <!-- 判断是否启用验证码-->
                                <if value=" $enabled_register_captcha " >
                                    <tr>
                                        <td bgcolor="#ffffff" align="right"><strong>验证码:</strong></td>
                                        <td bgcolor="#ffffff">
                                            <input type="text" size="8" name="captcha" class="inputBg" />
                                            <img src="{|U:'ec/captcha/index'}&rand={$rand}" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='{|U:'ec/captcha/index'}&rand='+Math.random()" /> 
                                        </td>
                                    </tr>
                                </if>
                                <tr>
                                    <td colspan="2" bgcolor="#ffffff" align="center">
                                        <input type="submit" name="Submit" class="bnt_blue_1" value="注册新用户" />
                                        <input name="act" type="hidden" value="signup" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
                <if value="$need_rechoose_gift" >
                 TODO:需要礼物的没有做
                </if>
            </table>
        </div>
    </if>
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
var compare_no_goods = "您没有选定任何需要比较的商品或者比较的商品数少于 2 个。";
var btn_buy = "购买";
var is_cancel = "取消";
var select_spe = "请选择商品属性";
</script>
</html>