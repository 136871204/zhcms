<script type="text/javascript" src="<?php echo __TPL__;?>/Field/js/date.js"></script>
<table class="table1">
    <tr class="input action">
        <th class="w400">パラメータ</th>
        <td>
            <table class="table1">
                <tr>
                    <th class="w100">時間のフォーマット</th>
                    <td>
                        <label><input type="radio" value="1" name="set[format]"  <?php if($field['set']['format']==1){?>checked="checked"<?php }?>/> 日付+ 24時間制時間（2013-11-19 05:10:27）<br/></label>
                        <label><input type="radio" value="0" name="set[format]"  <?php if($field['set']['format']=='0'){?>checked="checked"<?php }?>/> 日付（2013-11-19）<br/></label>
                        <label><input type="radio" value="2" name="set[format]"  <?php if($field['set']['format']==2){?>checked="checked"<?php }?>/> 時間（05:10:27）</label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>