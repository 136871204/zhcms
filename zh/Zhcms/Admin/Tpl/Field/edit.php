<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>Field変更</title>
    <zhjs/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <script type="text/javascript">
            var admin_field_js_validate_message1='Fieldタイトルは必須';
            var admin_field_js_validate_message2='特殊アルファベットが入力できない';
            var admin_field_js_validate_message3='Field名は必須';
            var admin_field_js_validate_message4='アルファベットで入力してください';
            var admin_field_js_validate_message5='Fieldはすでに存在';
            var admin_field_js_update_cache_message1='キャッシュ更新成功';
            var admin_field_js_update_cache_message2='キャッシュ更新失敗';
            var admin_field_js_del_field_message1='削除成功';
            var admin_field_js_del_field_message2='削除失敗';
		</script>
</head>
<body>
<form action="{|U:'edit'}" method="post" class="zh-form" onsubmit="return zh_submit(this,'{|U:index,array('mid'=>$_GET['mid'])}');">
    <div class="wrap">
    	<input type="hidden" name="fid" value="{$zh.get.fid}"/>
     	<input type="hidden" name="mid" value="{$zh.get.mid}"/>
     	<input type="hidden" name="field_type" value="{$field.field_type}"/>
     	<input type="hidden" name="table_name" value="{$field.table_name}"/>	
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'Model/index'}">Model一覧</a></li>
                <li><a href="{|U('index',array('mid'=>$field['mid']))}">Field一覧</a></li>
                <li><a href="javascript:;" class="action">Field変更</a></li>
            </ul>
        </div>
        <div class="title-header">
            Field情報
        </div>
       
        <table class="table1">
            <tr>
                <th class="w400">Model</th>
                <td>
                    {$model_name}
                </td>
            </tr>
            <tr>
						<th> Fieldタイトル<span class="star">*</span><span class="notice">例：文章タイトル</span></th>
						<td>
						<input type="text" name="title" class="w200" value="{$field.title}"/>
						</td>
					</tr>
					<tr>
						<th> Fieldヒント </th>
						<td>
							<textarea name="tips" class="w400 h80">{$field.tips}</textarea>
						</td>
					</tr>
            
        </table>
        <div class="field_tpl">
            <?php 
            $language=L();
            require APP_PATH . 'Data/Field/' . $field['field_type'] . '/form_edit.inc.php'; 
            
            ?>
        </div>
        
        <table class="table1">
					<tr>
						<th class="w400"> フォームスタイル名 <span class="notice">フォームのCSSスタイル定義名</span></th>
						<td>
						<input type="text" name="css" class="w250" value="{$field.css}"/>
						</td>
					</tr>
					<tr>
						<th> 文字の長さの範囲 <span class="notice">システムはフォーム提出時Checkを行う、もしCheckしたくない場合、空白してください</span></th>
						<td> Min：
						<input type="text" name="minlength" class="w50" value="{$field.minlength}"/>
						Max：
						<input type="text" name="maxlength" class="w50" value="{$field.maxlength}"/>
						</td>
					</tr>
					<tr>
						<th> フォームの検証 <span class="notice">システムはフォーム提出時Checkを行う、もしCheckしたくない場合、空白してください</span></th>
						<td>
						<input type="text" name="validate" class="w250 input_validation" value="{$field.validate}"/>
						<select id="field_check">
                            <option value="">常用正則</option>
							<option value="/^[0-9.-]+$/">数字</option>
							<option value="/^[0-9-]+$/">整数</option>
							<option value="/^[a-z]+$/i">アルファベット</option>
							<option value="/^[0-9a-z]+$/i">数字+アルファベット</option>
							<option value="/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/">E-mail</option>
							<option value="/^[0-9]{5,20}$/">QQ</option>
							<option value="/^http:\/\//">ハイパーリンク</option>
							<option value="/^(1)[0-9]{10}$/">携帯番号</option>
							<option value="/^[0-9-]{6,13}$/">電話番号</option>
							<option value="/^[0-9]{6}$/">郵便番号</option>
						</select><span id="zh_validation"></span></td>
					</tr>
					<tr>
						<th> 必須入力 <span class="notice">必須項目は‘YES’を選んでください</span></th>
						<td><label>
							<input type="radio" name="required" value="1" <if value="$field.required eq 1">checked=""</if>/>
							YES</label><label>
							<input type="radio" name="required" value="0" <if value="$field.required eq 0">checked=""</if>/>
							NO</label></td>
					</tr>
					<tr>
						<th> エラー提示 <span class="notice">入力内容が正しくない時の表示</span></th>
						<td>
						<input type="text" name="error" class="w300" value="{$field.error}"/>
						</td>
					</tr>
					<tr>
						<th> 値唯一 </th>
						<td><label>
							<input type="radio" name="isunique" value="1" <if value="$field.isunique eq 1">checked=""</if>/>
							YES</label><label>
							<input type="radio" name="isunique" value="0" <if value="$field.isunique eq 0">checked=""</if>/>
							NO</label></td>
					</tr>
					<tr>
						<th> 基本情報として <span class="notice">基本情報は、管理画面の左で表示する</span></th>
						<td><label>
							<input type="radio" name="isbase" value="1" <if value="$field.isbase eq 1">checked=""</if>/>
							YES</label><label>
							<input type="radio" name="isbase" value="0" <if value="$field.isbase eq 0">checked=""</if>/>
							NO</label></td>
					</tr>
					<tr>
						<th> 検索条件として </th>
						<td><label>
							<input type="radio" name="issearch" value="1" <if value="$field.issearch eq 1">checked=""</if>/>
							YES</label><label>
							<input type="radio" name="issearch" value="0" <if value="$field.issearch eq 0">checked=""</if>/>
							NO</label></td>
					</tr>
					<tr>
						<th> フロント側投稿可</th>
						<td><label>
							<input type="radio" name="isadd" value="1" <if value="$field.isadd eq 1">checked=""</if>/>
							YES</label><label>
							<input type="radio" name="isadd" value="0" <if value="$field.isadd eq 0">checked=""</if>/>
							NO</label></td>
					</tr>
				</table>
                <br /><br /><br /><br /><br />
    </div>      
    <div class="position-bottom">
        <input type="submit" value="確定" class="zh-success"/>
    </div>
</form>
</body>
</html>