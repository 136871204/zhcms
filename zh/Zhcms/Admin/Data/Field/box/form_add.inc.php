<script>
var admin_field_box_validate_js_message1='オプションリストは必須';
var admin_field_box_validate_js_message2='例：1|男,2|女';
var admin_field_box_validate_js_message3='数値で入力';
</script>
<script type="text/javascript" src="<?php echo __ROOT__;?>/zh/Zhcms/Admin/Data/Field/<?php echo $field_type;?>/validate.js"></script>
<table class="table1">
    <tr class="input action">
        <th class="w400">パラメータ</th>
        <td>
            <table class="table1">
                <tr>
                    <td class="w100">オプションリスト</td>
                    <td>
                        <textarea name="set[options]" class="w300 h100 select_options">オプション値は1 |オプション名称1</textarea>
                    </td>
                </tr>
                <tr>
                    <td class="w100">オプションタイプ</td>
                    <td>
                        <label><input type="radio" name="set[form_type]" value="radio" checked="checked"/> ラジオボタン</label>
                        <label><input type="radio" name="set[form_type]" value="checkbox"/> チェックボックス</label>
                        <label><input type="radio" name="set[form_type]" value="select"/> プルダウンボックス</label>
                    </td>
                </tr>
                <tr>
                    <td>デフォルトの値</td>
                    <td><input type="text" name="set[default]" class="w100 select_default"/></td>
                </tr>
            </table>
        </td>
    </tr>
</table>