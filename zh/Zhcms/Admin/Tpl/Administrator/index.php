<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>管理者管理</title>
    <zhjs/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">一覧</a></li>
            <li><a href="{|U:'add'}">新規</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td width="30">aid</td>
            <td>ユーザ名</td>
            <td>所属役</td>
            <td>登録IP</td>
            <td>登録時間</td>
            <td>ネックネーム</td>
            <td>メールアドレス</td>
            <td width="100">操作</td>
        </tr>
        </thead>
        <tbody>
        <list from="$data" name="a">
            <tr>
                <td width="30">{$a.uid}</td>
                <td>{$a.username}</td>
                <td>{$a.rname}</td>
                <td>{$a.lastip}</td>
                <td>{$a.logintime}</td>
                <td>{$a.nickname}</td>
                <td>{$a.email}</td>
                <td>
                    <a href="{|U:'edit',array('uid'=>$a['uid'])}">変更</a>|
                    <a href="javascript:confirm('削除しますか？')?zh_ajax('{|U:'del'}',{'uid':{$a.uid}}):void(0);">削除</a>
                </td>
            </tr>
        </list>
        </tbody>
    </table>
</div>
</body>
</html>