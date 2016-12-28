<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>会員グループ管理</title>
    <zhjs/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <script>
    var admin_group_page_js_message1='グループ名は必須';
    var admin_group_page_js_message2='会員グループはすでに存在';
    var admin_group_page_js_message3='積分は必須';
    var admin_group_page_js_message4='積分は数値でお願いします';
    </script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}">会員グループ一覧</a></li>
            <li><a href="javascript:;" class="action">会員グループ変更</a></li>
        </ul>
    </div>
    <div class="title-header">会員グループ変更</div>
    <form action="{|U:edit}" method="post" class="zh-form" onsubmit="return zh_submit(this,'{|U:index}');">
        <input type="hidden" name="rid" class="w300" value="{$field.rid}"/>
        <table class="table1">
            <tr>
                <th class="w150">会員グループ名</th>
                <td>
                    <input type="text" name="rname" class="w300" value="{$field.rname}" required=""/>
                </td>
            </tr>
            <tr>
                <th class="w100">積分&lt;</th>
                <td>
                    <input type="text" name="creditslower" class="w300" value="{$field.creditslower}" required=""/>
                </td>
            </tr>
            <tr>
                <th class="w100">コメント審査必要ない</th>
                <td>
                    <label>
                        <input type="radio" name="comment_state" value="1" <if value="$field.comment_state==1">checked="checked"</if>/> YES
                    </label> 
                    <label>
                        <input type="radio" name="comment_state" value="0" <if value="$field.comment_state==0">checked="checked"</if>/> NO
                    </label>
                </td>
            </tr>
            <tr>
                <th class="w100">メッセージ発表許す</th>
                <td>
                    <label>
                        <input type="radio" name="allowsendmessage" value="1" <if value="$field.allowsendmessage==1">checked="checked"</if>/>YES
                    </label> 
                    <label>
                        <input type="radio" name="allowsendmessage" value="0" <if value="$field.allowsendmessage==0">checked="checked"</if>/>NO
                    </label>
                </td>
            </tr>
            <tr>
                <th class="w100">説明</th>
                <td>
                    <input type="text" name="title" class="w300" value="{$field.title}"/>
                </td>
            </tr>
        </table>
        <div class="position-bottom">
            <input type="submit" value="確定" class="zh-success"/>
        </div>
    </form>
</div>
</body>
</html>