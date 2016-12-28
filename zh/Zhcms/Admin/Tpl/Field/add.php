<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>Field新規</title>
		<zhjs/>
		<css file="__CONTROL_TPL__/css/css.css"/>
		<js file="__CONTROL_TPL__/js/js.js"/>
		<script type="text/javascript">
			var mid = '{$zh.get.mid}';
			//获得字段模板类型
			var tpl_type = "add";
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
		<div class="wrap">
			<form action="__METH__" method="post" class="zh-form" onsubmit="return zh_submit(this,'{|U:index,array('mid'=>$_GET['mid'])}');">
				<input type="hidden" name="mid" value="{$model.mid}"/>
				<div class="menu_list">
					<ul>
						<li>
							<a href="{|U:'Model/index'}">
								Model一覧
							</a>
						</li>
						<li>
							<a href="{|U('index',array('mid'=>$_GET['mid']))}">
								Field一覧
							</a>
						</li>
						<li>
							<a href="javascript:;" class="action">
								Field新規
							</a>
						</li>
					</ul>
				</div>
				<div class="title-header">
					Field情報
				</div>

				<table class="table1">
					<tr>
						<th class="w400"> Model </th>
						<td> {$model.model_name} </td>
					</tr>
					<tr>
						<th> タイプ <span class="notice"></span></th>
						<td>
							<!--<option value="title">标题</option>
							<option value="thumb">缩略图</option>
							<option value="template">模板选择</option>
							<option value="cid">栏目cid</option>
							<option value="content">文章正文</option>
							<option value="flag">Flag文章属性</option>
							<option value="tag">Tag关键字</option>-->
    						<select id="field_type" name="field_type">
                                <option value="input">単行テキスト</option>
    							<option value="textarea">複数行テキスト</option>
    							<option value="number">数字</option>
    							<option value="box">オプション</option>
    							<option value="editor">エディター</option>
    							<option value="image">画像</option>
    							<option value="images">多画像</option>
    							<option value="datetime">日付と時刻</option>
    							<option value="files">ファイル</option>
                                <option value="exterior">外部データ</option>
                                <option value="treeselect">ツリー選択</option>
    						</select>
                        </td>
					</tr>
					<tr>
						<th> テーブル<span class="star">*</span><span class="notice">フィールドがあるテーブル</span></th>
						<td><label>
							<input type="radio" name="table_type" value="1" checked=""/>
							メインテーブル</label><label>
							<input type="radio" name="table_type" value="2"/>
							付属テーブル</label></td>
					</tr>
					<tr>
						<th> Fieldタイトル<span class="star">*</span><span class="notice">例：文章タイトル</span></th>
						<td>
						<input type="text" name="title" class="w200"/>
						</td>
					</tr>
					<tr>
						<th> Field名<span class="star">*</span><span class="notice">英語小文字しなければならない</span></th>
						<td>
						<input type="text" name="field_name" class="w200"/>
						</td>
					</tr>
					<tr>
						<th> Fieldヒント</th>
						<td>						<textarea name="tips" class="w400 h80" ></textarea></td>
					</tr>
				</table>
				<div class="field_tpl">

				</div>
				<table class="table1">
					<tr>
						<th class="w400"> フォームスタイル名 <span class="notice">フォームのCSSスタイル定義名</span></th>
						<td>
						<input type="text" name="css" class="w250"/>
						</td>
					</tr>
					<tr>
						<th> 文字の長さの範囲 <span class="notice">システムはフォーム提出時Checkを行う、もしCheckしたくない場合、空白してください</span></th>
						<td> Min：
						<input type="text" name="minlength" class="w50" value="0"/>
						Max：
						<input type="text" name="maxlength" class="w50"/>
						</td>
					</tr>
					<tr>
						<th> フォームの検証 <span class="notice">システムはフォーム提出時Checkを行う、もしCheckしたくない場合、空白してください</span></th>
						<td>
						<input type="text" name="validate" class="w250 input_validation"/>
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
						</select><span id="zh_set[validation]"></span></td>
					</tr>
					<tr>
						<th> 必須入力 <span class="notice">必須項目は‘YES’を選んでください</span></th>
						<td><label>
							<input type="radio" name="required" value="1"/>
							YES</label><label>
							<input type="radio" name="required" value="0" checked="checked"/>
							NO</label></td>
					</tr>
					<tr>
						<th> エラー提示 <span class="notice">入力内容が正しくない時の表示</span></th>
						<td>
						<input type="text" name="error" class="w300"/>
						</td>
					</tr>
					<tr>
						<th> 値唯一 </th>
						<td><label>
							<input type="radio" name="isunique" value="1"/>
							YES</label><label>
							<input type="radio" name="isunique" value="0" checked="checked"/>
							NO</label></td>
					</tr>
					<tr>
						<th> 基本情報として <span class="notice">基本情報は、管理画面の左で表示する</span></th>
						<td><label>
							<input type="radio" name="isbase" value="1" checked="checked"/>
							YES</label><label>
							<input type="radio" name="isbase" value="0"/>
							NO</label></td>
					</tr>
					<tr>
						<th> 検索条件として </th>
						<td><label>
							<input type="radio" name="issearch" value="1"/>
							YES</label><label>
							<input type="radio" name="issearch" value="0" checked="checked"/>
							NO</label></td>
					</tr>
					<tr>
						<th> フロント側投稿可</th>
						<td><label>
							<input type="radio" name="isadd" value="1"/>
							YES</label><label>
							<input type="radio" name="isadd" value="0" checked="checked"/>
							NO</label></td>
					</tr>

				</table>
                <br /><br /><br /><br />
				<div class="position-bottom">
					<input type="submit" value="確定" class="zh-success"/>
				</div>
			</form>
		</div>

	</body>
</html>

