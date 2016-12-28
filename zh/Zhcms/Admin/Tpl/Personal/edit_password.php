<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>パスワード修正</title>
    <zhjs/>
    <js file="__CONTROL_TPL__/js/edit_password.js"/>
    <script>
    var admin_personal_edit_password_js_error1='元パスワードを入力してください';
    var admin_personal_edit_password_js_error2='元パスワードが正しくない';
    var admin_personal_edit_password_js_error3='新パスワードを入力してください';
    var admin_personal_edit_password_js_error4='新パスワードを5文字以上してください';
    var admin_personal_edit_password_js_error5='確認パスワードを入力してください';
    var admin_personal_edit_password_js_error6='二回入力したパスワードは不一致';
    </script>
</head>
<body>
<div class="wrap">
    <div class="title-header">パスワード修正</div>
    <form action="__METH__" method="post" onsubmit="return zh_submit(this)" class="zh-form">
        <table class="table1">
            <tr>
                <th class="w100">管理者名称</th>
                <td>
                    {$user.username}
                </td>
            </tr>
            <tr>
                <th class="w100">元パスワード</th>
                <td>
                    <input type="password" name="old_password" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">新パスワード</th>
                <td>
                    <input type="password" name="password" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">確認パスワード</th>
                <td>
                    <input type="password" name="passwordc" class="w200"/>
                </td>
            </tr>
        </table>
        <div class="position-bottom">
            <input type="submit" class="zh-success" value="確定"/>
        </div>
    </form>
</div>
</body>
</html>