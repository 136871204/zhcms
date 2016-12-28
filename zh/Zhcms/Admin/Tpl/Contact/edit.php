<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
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
            <li><a href="{|U:'index'}">在线咨询一覧</a></li>
            <li><a href="javascript:;" class="action">在线咨询修正</a></li>
        </ul>
    </div>
    <div class="title-header">在线咨询修正</div>
    <form method="post" class="zh-form" onsubmit="return zh_submit(this,'{|U:index}')">
        <input type="hidden" name="id" value="{$field.id}"/>
        <table class="table1">
            <tr>
                <th class="w100">姓名</th>
                <td>
                    <input type="text" name="name" class="w300" value="{$field.name}" required=""/>
                </td>
            </tr>

            <tr>
                <th class="w100">邮箱</th>
                <td>
                    <input type="text" name="email" class="w600"  value="{$field.email}" />
                </td>
            </tr>
            <tr>
                <th class="w100">标题</th>
                <td>
                    <input type="text" name="subject" class="w600"  value="{$field.subject}" />
                </td>
            </tr>
            <tr>
                <th class="w100">内容</th>
                <td>
                    <textarea  name="message" cols="60" rows="4"  >{$field.message}</textarea>
                </td>
            </tr>
            
            <tr>
                <th class="w100">处理状态</th>
                <td>
                    <select name="status">
                        <foreach from="$statusarr" value="$statusd" key="$key">
                            <if value=" $field['status'] eq $key " >
                                <option value="{$key}" selected="selected">{$statusd}</option>
                            <else/>
                                <option value="{$key}">{$statusd}</option>
                            </if>
                        </foreach>
                    </select>
                </td>
            </tr>

        </table>
        <div class="position-bottom">
            <input type="submit" value="確認" class="zh-success"/>
        </div>
    </form>
</div>
</body>
</html>