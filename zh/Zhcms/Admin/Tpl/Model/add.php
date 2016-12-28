<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>Model新規</title>
    <zhjs/>
</head>
<body>
<form action="{|U:'add'}" method="post" class="zh-form" onsubmit="return zh_submit(this,'{|U:index}')">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'index'}">Model一覧</a></li>
                <li><a href="javascript:;" class="action">Model新規</a></li>
            </ul>
        </div>
        <div class="title-header">提示</div>
        <div class="help">
            <ul>
                <li>Modelは複雑だから。次のリンクで
                    <a href="http://www.metaphase.co.jp" target="_blank">metaphase</a>
                    ビデオ講座を見てください
                </li>
            </ul>
        </div>
        <div class="title-header">
           	 Model情報
        </div>
        <div class="right_content">
            <table class="table1">
                <tr>
                    <th class="w100">Model名称</th>
                    <td>
                        <input type="text" name="model_name" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>テーブル名</th>
                    <td>
                        <input type="text" name="table_name" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>Model説明</th>
                    <td>
                        <textarea name="description" class="w350 h80"></textarea>
                    </td>
                </tr>
                </table>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" value="確定" class="zh-success"/>
    </div>
</form>
<script>
	$("form").validate({
		model_name:{
			rule:{required:true,ajax:{url:"{|U:'checkModelName'}"}},
			error:{
			 required:'必須',
            ajax:'すでに存在'}
		},
		table_name:{
			rule:{required:true,regexp:/^[a-z0-9]{1,10}$/,ajax:{url:"{|U:'checkTableName'}"}},
			error:{
			 required:'必須',
            regexp:'10文字以下してください',
            ajax:'テーブル名はすでに存在'}
		}
	});
</script>
</body>
</html>