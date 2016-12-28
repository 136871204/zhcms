<script>
var admin_field_images_validate_js_message1='数字を入力してください。';
var admin_field_images_validate_js_message2='px （アップロード画像がサイズ超える部分を裁断される';
var admin_field_images_validate_js_message3='個';
</script>
<script type="text/javascript" src="<?php echo __ROOT__;?>/zh/Zhcms/Admin/Data/Field/<?php echo $field_type;?>/validate.js"></script>
<table class="table1">
    <tr class="input action">
        <th class="w400">パラメータ</th>
        <td>
            <table class="table1">
                <tr>
                    <td class="w100">画像の最大幅</td>
                    <td>
                        <label>
                            <input type="text" class="w100" name="set[upload_img_max_width]" value="800"/>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td class="w100">画像最大高さ</td>
                    <td>
                        <label>
                            <input type="text" class="w100" name="set[upload_img_max_height]" value="800"/>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>アップロードの数</td>
                    <td>
                        <input type="text" class="w100" name="set[num]" value="10"/>
                    </td>
                </tr>
                <tr>
                    <td class="w100">画像名でソート</td>
                    <td>
                        <label><input type="radio" name="set[name_sort]" value="1" checked="checked"/>NO</label>
                        <label><input type="radio" name="set[name_sort]" value="2"/>YES</label>
                    </td>
                </tr>
                <tr>
                    <td class="w100">画像生成方法</td>
                    <td>
                        <label><input type="radio" name="set[thumb_type]" value="1"/>幅固定、高さ自動生成</label>
                        <label><input type="radio" name="set[thumb_type]" value="2"/>高さ固定,幅自動生成</label>
                        <label><input type="radio" name="set[thumb_type]" value="3"/>幅固定,高さ自動裁断</label>
                        <label><input type="radio" name="set[thumb_type]" value="4"/>高さ固定,幅自動裁断</label>
                        <label><input type="radio" name="set[thumb_type]" value="5" checked="checked"/>MAX側縮小</label>
                        <label><input type="radio" name="set[thumb_type]" value="6"/>自動で画像裁断</label>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>