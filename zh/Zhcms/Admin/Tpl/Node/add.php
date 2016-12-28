<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>システムメニュー管理</title>
    <zhjs/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <script>
    var admin_node_js_check_message1='メニュ名は必須';
    var admin_node_js_update_order_error1='ソート更新失敗';
    </script>
</head>
<body>
<form action="{|U:'add'}" method="post" class="zh-form" onsubmit="return zh_submit(this,'{|U:index}')">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'index'}">メニュー一覧</a></li>
                <li><a href="javascript:;" class="action">メニュー新規</a></li>
                <li><a href="javascript:zh_ajax('{|U:update_cache}');">キャッシュ更新</a></li>
            </ul>
        </div>
        <div class="title-header">メニュー情報</div>
        <table class="table1">
            <tr>
                <td class="w100">メニュー階層:</td>
                <td>
                    <select name="pid">
                        <option value="0">トップ階層メニュー</option>
                        <list from="$node" name="n">
                                <option value="{$n.nid}" <if value="$n.nid==$zh.get.pid">selected="selected"</if>>{$n._name}</option>
                        </list>
                    </select>
                </td>
            </tr>
            <tr>
                <td>名称:</td>
                <td>
                    <input type="text" name="title" class="w200"/>
                </td>
            </tr>
            <tr>
                <td class="w100">App:</td>
                <td>
                    <input type="text" name="app" class="w200"/>
                </td>
            </tr>
            <tr>
                <td>Control:</td>
                <td>
                    <input type="text" name="control" class="w200"/>
                </td>
            </tr>
            <tr>
                <td>Method:</td>
                <td>
                    <input type="text" name="method" class="w200"/>
                </td>
            </tr>
            <tr>
                <td>Parameter:</td>
                <td>
                    <input type="text" name="param" class="w300"/>
                    <span class="message">例:cid=1&mid=2</span>
                </td>
            </tr>
            <tr>
                <td>備考:</td>
                <td>
                    <textarea name="comment" class="w350 h100"></textarea>
                </td>
            </tr>
            <tr>
                <td>状態:</td>
                <td>
                    <label><input type="radio" name="state" value="1" checked="checked"/> 表示</label>
                    <label><input type="radio" name="state" value="0"/> 隠す</label>
                </td>
            </tr>
            <tr>
                <td>タイプ:</td>
                <td>
                    <select name="type">
                        <option value="1">メニュー+権限操作</option>
                        <option value="2">普通メニュー</option>
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <div class="position-bottom">
        <input type="submit" class="zh-success" value="確定"/>
    </div>
</form>
</body>
</html>