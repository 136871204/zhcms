<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>在线咨询管理</title>
    <zhjs/>
    <js file="__CONTROL_TPL__/js/js.js"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
                <li><a href="{|U:'index'}" class="action">在线咨询一覧</a></li>
        </ul>
    </div>
    <table class="table2 zh-form">
        <thead>
        <tr>
            <td class="w30">id</td>
            <td class="w100">姓名</td>
            <td class="w200">邮箱</td>
            <td class="w200">标题</td>
            <td class="w150">处理状态</td>
            <td class="w150">咨询时间</td>
            <td class="w150">操作</td>
        </tr>
        </thead>
        <list from="$contact" name="b">
            <tr>
                <td>{$b.id}</td>
                <td>{$b.name}</td>
                <td>{$b.email}</td>
                <td>{$b.subject|mb_substr:@@,0,36,'utf8'}</td>
                <td>{$b.status_show}</td>
                <td>{$b.addtime|date:'Y-m-d',@@}</td>
                <td>
				    <a href="{|U:'edit',array('id'=>$b['id'])}">
				        修正
				    </a>|
                    <a href="javascript:confirm('削除しますか')?zh_ajax('{|U:del}',{brand_id:{$b.brand_id}}):void(0);">削除</a>

                </td>
            </tr>
        </list>
    </table>
    <div class="page1">
        {$page}
    </div>
    <div class="h60"></div>
</div>
</body>
</html>