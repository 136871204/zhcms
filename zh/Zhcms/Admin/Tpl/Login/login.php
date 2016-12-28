<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>METACMS-管理画面</title>
    <zhjs/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <script>
        $(function () {
            var error = '{$error}';
            if (error) {
                $("div#error_tips").show();
                $(".err_m").html(error);
                setTimeout(function(){ $("div#error_tips").hide()},5000);
            }
        })
    </script>
    <js file="__CONTROL_TPL__/Js/js.js"/>
</head>
<body>
<div class="header">
    <div class="links">
        <a href="__WEB__">トップページ</a> |
        <a href="http://www.metaphase.co.jp">metaphase</a> |
        <a href="mailto:136871204@qq.com">担当者：周鸿</a>
    </div>
</div>
<div class="main">
    <div class="pics">
    </div>
    <div class="login">
        <div class="title">
            管理画面ログイン
        </div>
        
        <div id="tips" class="tips"></div>
        <div class="web_login">
            <div class="login_form">
                <div id="error_tips">
                    <span class="error_logo"></span>
                    <span class="err_m">12dssfd</span>
                </div>
                <form action="{|U:'login'}" method="post" class="hd-form">
                    <div class="input">
                        <div class="inputOuter">
                            <input type="text" name="username" value="" autofocus='true' placeholder="アカウント"
                                   required="" AUTOCOMPLETE="off" />
                        </div>
                    </div>
                    <div class="input">
                        <div class="inputOuter">
                            <input type="password" name="password" placeholder="パスワード" required="" AUTOCOMPLETE="off" />
                        </div>
                    </div>
                    <div class="input">
                        <div class="inputOuter">
                            <input type="text" name="code" placeholder="検証コード" required=""/>
                        </div>
                    </div>

                    <div class="verifyimgArea">
                        <img src="{|U:'code'}" class="code" style="cursor: pointer;float:left;"
                             onclick="this.src='{|U:'code'}&'+Math.random()"/>
                        <a href="javascript:void(0);" onclick="$('.code').trigger('click')">見えない、クリック</a>
                    </div>
                    <div class="send">
                        <input type="submit" class="btn2" value="ログイン"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<iframe name="checkLogin" style="display:none;"></iframe>
</body>
</html>