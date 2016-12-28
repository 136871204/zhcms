<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>管理者役管理</title>
    <zhjs/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">一覧</a></li>
            <li><a href="{|U:'add'}">新規</a></li>
             <li><a href="javascript:;" onclick="zh_ajax('{|U:updateCache}')">キャッシュ更新</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td class="w30">id</td>
            <td class="w150">名称</td>
            <td>説明</td>
            <td class="w100">システム</td>
            <td class="w180">操作</td>
        </tr>
        </thead>
        <tbody>
        <list from="$data" name="d">
            <tr>
                <td>{$d.rid}</td>
                <td>{$d.rname}</td>
                <td>{$d.title}</td>
                <td>
                    <if value="$d.system">
                        <font color="red">√</font>
                        <else/>
                        <font color="blue">×</font>
                    </if>
                </td>
                <td>
                    <a href="{|U:'edit',array('rid'=>$d['rid'])}">変更</a> |
                    <if value="$d.system eq 0">
                        <a href="javascript:confirm('削除しますか？')?zh_ajax('{|U:del}',{rid:{$d.rid}}):void(0);">削除</a>
                    <else>
                    	削除
                    </if>
                     |
                    <if value="$d.rid eq 1">
                    	権限設置
                    <else>
                    	<a href="{|U:'Access/edit',array('rid'=>$d['rid'])}">権限設置</a>
                    </if>
                </td>
            </tr>
        </list>
        </tbody>
    </table>
</div>
</body>
</html>