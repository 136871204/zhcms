<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>管理者役管理</title>
    <zhjs/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <script>
    var admin_role_js_check_message1='名称を入力してください';
    var admin_role_js_check_message2='名称はすでに存在している';
    </script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}">一覧</a></li>
            <li><a href="javascript:;" class="action">新規</a></li>
        </ul>
    </div>
    <div class="title-header">情報</div>
    <form action="{|U:'add'}" method="post" class="zh-form"  onsubmit="return zh_submit(this,'{|U:index}')">
        <input type="hidden" name="admin" value="1"/>
        <table class="table1">
            <tr>
                <th class="w100">名称</th>
                <td>
                    <input type="text" name="rname" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">説明</th>
                <td>
                    <textarea name="title" class="w300 h100"></textarea>
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