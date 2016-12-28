<script>
var admin_field_files_validate_js_message1='数字を入力してください。';
var admin_field_files_validate_js_message2='個';
var admin_field_files_validate_js_message3='ファイルタイプは空にできません';
var admin_field_files_validate_js_message4='アップロードファイルタイプは，カンマで分離。例: zip,doc';
var admin_field_files_validate_js_message5='下載金貨';
</script>
<script type="text/javascript" src="<?php echo __ROOT__;?>/zh/Zhcms/Admin/Data/Field/<?php echo $field_type;?>/validate.js"></script>
<table class="table1">
    <tr class="input action">
        <th class="w400">パラメータ</th>
        <td>
            <table class="table1">
                <tr>
                    <td class="w100">アップロードの数</td>
                    <td>
                        <input type="text" class="w100" name="set[num]" value="10"/>
                    </td>
                </tr>
                <tr>
                    <td class="w100">アップロードファイルタイプ</td>
                    <td>
                        <input type="text" class="w200" name="set[filetype]" value="zip,rar,doc,ppt"/>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>