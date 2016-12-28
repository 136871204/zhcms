<script type="text/javascript" src="<?php echo __ROOT__;?>/zh/Zhcms/Admin/Data/Field/<?php echo $field_type;?>/validate.js"></script>
<table class="table1">
    <tr class="input action">
        <th class="w400">パラメータ</th>
        <td>
            <table class="table1">
                <tr>
                    <td class="w100">テーブル</td>
                    <td><input type="text" name="set[table]" class="w100 textarea_width" /></td>
                </tr>
                <tr>
                    <td class="w100">PK</td>
                    <td><input type="text" name="set[pk]" class="w100 textarea_width" /></td>
                </tr>
                <tr>
                    <td class="w100">表示項目</td>
                    <td><input type="text" name="set[showf]" class="w100 textarea_width" /></td>
                </tr>
                <tr>
                    <td class="w100">表示項目タイトル</td>
                    <td><input type="text" name="set[showt]" class="w100 textarea_width" /></td>
                </tr>
                <tr>
                    <td class="w100">検索条件</td>
                    <td><input type="text" name="set[wherestr]" class="w100 textarea_width" /></td>
                </tr>
                <tr>
                    <td class="w100">複数/シングル（選択）</td>
                    <td>
                        <label><input type="radio" name="set[select_type]" value="multiple" checked="checked"/> 複数</label>
                        <label><input type="radio" name="set[select_type]" value="single"/>シングル</label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>