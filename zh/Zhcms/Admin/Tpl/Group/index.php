<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>会員グループ管理</title>
    <zhjs/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">会員グループ一覧</a></li>
            <li><a href="{|U:'add'}">会員グループ新規</a></li>
             <li><a href="javascript:;" onclick="zh_ajax('{|U:updateCache}')">キャッシュ更新</a></li>
        </ul>
    </div>
    <table class="table2 zh-form">
        <thead>
        <tr>
            <td class="w30">gid</td>
            <td>会員グループ名</td>
            <td class="w150">システムグループ</td>
            <td class="w150">積分&lt;</td>
            <td class="w150">コメント審査必要ない</td>
            <td class="w150">メッセージ発表許す</td>
            <td class="w100">操作</td>
        </tr>
        </thead>
        <list from="$data" name="d">
            <tr>
                <td>{$d.rid}</td>
                <td>
                    {$d.rname}
                </td>
                <td>
                    <if value="$d.system">
                        <font color="red">√</font>
                        <else/>
                       <font color="blue">×</font>
                    </if>
                </td>
                <td>{$d.creditslower}</td>

                <td>
                    <if value="$d.comment_state">
                        <font color="red">√</font>
                        <else/>
                        ×
                    </if>
                </td>
                <td><if value="$d.allowsendmessage">
                        <font color="red">√</font>
                        <else/>
                        ×
                    </if></td>
                <td>
                    <a href="{|U:'edit',array('rid'=>$d['rid'])}">変更</a>
                    <span class="line">|</span>
                    <if value="$d.system eq 1">
                    	<span>削除</span>
                    <else>
                        <a href="javascript:if(confirm('削除しますか？'))zh_ajax('{|U:'del'}',{'rid':{$d['rid']}});">削除</a>
                    </if>
                </td>
            </tr>
        </list>
    </table>
    <div class="h60"></div>
</div>
</body>
</html>