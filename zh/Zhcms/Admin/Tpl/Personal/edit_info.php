<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>個人情報修正</title>
    <zhjs/>
    <js file="__CONTROL_TPL__/js/edit_info.js"/>
    <script>
    var admin_personal_edit_info_js_error1='{$zh.language.admin_personal_edit_info_js_error1}';
    var admin_personal_edit_info_js_error2='{$zh.language.admin_personal_edit_info_js_error2}';
    var admin_personal_edit_info_js_error3='{$zh.language.admin_personal_edit_info_js_error3}';
    </script>
</head>
<body>
<div class="wrap">
    <div class="title-header">情報</div>
    <form action="{|U:'edit_info'}" method="post" onsubmit="return zh_submit(this,'__METH__')" class="zh-form">
        <input type="hidden" name="uid" value="{$zh.session.uid}"/>
        <table class="table1">
            <tr>
                <th class="w100">管理者名称</th>
                <td>
                    {$user.username}
                </td>
            </tr>
            <tr>
                <th class="w100">言語選択</th>
                <td>
                    <select name="language">
                        <foreach from="$selectlan" value="$lanv" key="$lank" >
                            <option value="{$lank}"
                            <if value="$user.language eq $lank">selected="selected"</if>
                            >
                            {$lanv}
                            </option>
                        </foreach>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="w100">最後登録時間</th>
                <td>
                    {$user.logintime|date:"Y-m-d",@@}
                </td>
            </tr>
            <tr>
                <th class="w100">最後登録IP</th>
                <td>
                    {$user.lastip}
                </td>
            </tr>
            <tr>
                <th class="w100">ネックネーム</th>
                <td>
                    <input type="text" name="nickname" class="w200" value="{$user.nickname}"/>
                </td>
            </tr>
            <tr>
                <th class="w100">メールアドレス</th>
                <td>
                    <input type="text" name="email" class="w200" value="{$user.email}"/>
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