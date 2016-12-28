<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>カテゴリ一括変更</title>
	<script type='text/javascript' src='http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/css/zhjs.css' rel='stylesheet' media='screen'>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/js/zhjs.js'></script>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/js/slide.js'></script>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
HOST = '<?php echo $GLOBALS['user']['HOST'];?>';
ROOT = '<?php echo $GLOBALS['user']['ROOT'];?>';
WEB = '<?php echo $GLOBALS['user']['WEB'];?>';
URL = '<?php echo $GLOBALS['user']['URL'];?>';
ZHPHP = '<?php echo $GLOBALS['user']['ZHPHP'];?>';
ZHPHPDATA = '<?php echo $GLOBALS['user']['ZHPHPDATA'];?>';
ZHPHPTPL = '<?php echo $GLOBALS['user']['ZHPHPTPL'];?>';
ZHPHPEXTEND = '<?php echo $GLOBALS['user']['ZHPHPEXTEND'];?>';
APP = '<?php echo $GLOBALS['user']['APP'];?>';
CONTROL = '<?php echo $GLOBALS['user']['CONTROL'];?>';
METH = '<?php echo $GLOBALS['user']['METH'];?>';
GROUP = '<?php echo $GLOBALS['user']['GROUP'];?>';
TPL = '<?php echo $GLOBALS['user']['TPL'];?>';
CONTROLTPL = '<?php echo $GLOBALS['user']['CONTROLTPL'];?>';
STATIC = '<?php echo $GLOBALS['user']['STATIC'];?>';
PUBLIC = '<?php echo $GLOBALS['user']['PUBLIC'];?>';
HISTORY = '<?php echo $GLOBALS['user']['HISTORY'];?>';
TEMPLATE = '<?php echo $GLOBALS['user']['TEMPLATE'];?>';
ROOTURL = '<?php echo $GLOBALS['user']['ROOTURL'];?>';
WEBURL = '<?php echo $GLOBALS['user']['WEBURL'];?>';
CONTROLURL = '<?php echo $GLOBALS['user']['CONTROLURL'];?>';
PHPSELF = '<?php echo $GLOBALS['user']['PHPSELF'];?>';
</script>
	<link type="text/css" rel="stylesheet" href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Category/css/css.css"/>
	<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Category/js/js.js"></script>
	<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Content/js/addEdit.js"></script>
	<style type="text/css">
		div.wrap {
		  	padding-right: 0px;
		}
		div.wrap div.category {
		  	overflow: auto;
		}
		div.wrap div.category table th,
		div.wrap div.category table td {
		  	border-right: 1px solid #dcdcdc;
		}
	</style>
    <script>
    var admin_category_add_edit_js_form_message1='Modelを選択してください';
    var admin_category_add_edit_js_form_message2='カテゴリ名称は必須';
    var admin_category_add_edit_js_form_message3='カテゴリ名称';
    var admin_category_add_edit_js_form_message4='静態ディレクトリは必須';
    var admin_category_add_edit_js_form_message5='ディレクトリはすでに使われている';
    var admin_category_add_edit_js_form_message6='静態ディレクトリを入力してください';
    var admin_category_add_edit_js_form_message7='Indexテンプレートは空にできません';
    var admin_category_add_edit_js_form_message8='Indexテンプレートを入力してください';
    var admin_category_add_edit_js_form_message9='一覧ページテンプレートは空にできません';
    var admin_category_add_edit_js_form_message10='一覧ページテンプレートを入力してください';
    var admin_category_add_edit_js_form_message11='内容ページテンプレートは空にできません';
    var admin_category_add_edit_js_form_message12='内容ページテンプレートを入力してください';
    var admin_category_add_edit_js_form_message13='カテゴリURLルールは必須';
    var admin_category_add_edit_js_form_message14='{cid} カテゴリID, {catdir} カテゴリディレクトリ, {page} 一覧のページ';
    var admin_category_add_edit_js_form_message15='URL入力エラー';
    var admin_category_add_edit_js_form_message16='カテゴリタイプは「外部リンク」選んで後有効';
    var admin_category_add_edit_js_form_message17='内容ページURLルールは必須';
    var admin_category_add_edit_js_form_message18='{y}、{m}、{d} 年月日,{timestamp}UNIX時間 {catdir}カテゴリディレクトリ {cid}カテゴリcid {aid}文章ID';
    var admin_category_add_edit_js_form_message19='投稿奨励は必須';
    var admin_category_add_edit_js_form_message20='投稿奨励は数値で入力してください';
    var admin_category_add_edit_js_form_message21='文章を発表する時の奨励です、マイナスの場合積分を減る';
    var admin_category_add_edit_js_form_message22='閲読積分は必須';
    var admin_category_add_edit_js_form_message23='閲読積分は数値で入力してください';
    var admin_category_add_edit_js_form_message24='カテゴリ下の文章の料金基準を観光。もし文章単特で設定する場合、文章設置優先。';
    var admin_category_add_edit_js_form_message25='重複有料日数は必須';
    var admin_category_add_edit_js_form_message26='重複有料日数は数値で入力してください、>1';
    var admin_category_add_edit_js_form_message27='重複有料日数，>1。';
    var admin_category_add_edit_js_select_template_message1='テンプレートファイル選択';
    var admin_category_add_edit_js_select_template_message2='閉じる';
    </script>
</head>
<body>
	<div class="wrap">
		<div class="menu_list">
					<ul>
						<li>
							<a href="<?php echo U('Category/index');?>">
								カテゴリ一覧
							</a>
						</li>
						<li>
							<a href="javascript:;" class="action">
								カテゴリ一括変更
							</a>
						</li>
					</ul>
		</div>
		<div class="help">
			ラジオボックスをダブルクリックと、同じタイプの項目全部選択させることができる
		</div>
		<form action="<?php echo U('BulkEdit');?>" class="zh-form" method="post" onsubmit="return zh_submit(this,'<?php echo U('Category/index');?>');">
			<input type="hidden" name="BulkEdit" value="1" />
		<div class="title-header">カテゴリ一括変更</div>
		<div class="category">
		<table>
			<tr>
		<?php $zh["list"]["field"]["total"]=0;if(isset($data) && !empty($data)):$_id_field=0;$_index_field=0;$lastfield=min(1000,count($data));
$zh["list"]["field"]["first"]=true;
$zh["list"]["field"]["last"]=false;
$_total_field=ceil($lastfield/1);$zh["list"]["field"]["total"]=$_total_field;
$_data_field = array_slice($data,0,$lastfield);
if(count($_data_field)==0):echo "";
else:
foreach($_data_field as $key=>$field):
if(($_id_field)%1==0):$_id_field++;else:$_id_field++;continue;endif;
$zh["list"]["field"]["index"]=++$_index_field;
if($_index_field>=$_total_field):$zh["list"]["field"]["last"]=true;endif;?>

			<td class="w300">
				<table class="table1 category" style="width:100%;">
					<tr>
						<th>カテゴリ名称</th>
					</tr>
					<tr>
						<td>
							<input type="hidden" name="cat[<?php echo $field['cid'];?>][cid]" value="<?php echo $field['cid'];?>"/>
							<input type="text" name="cat[<?php echo $field['cid'];?>][catname]" value="<?php echo $field['catname'];?>" class="w250"/>
						</td>
					</tr>
					<tr>
						<th>静態ディレクトリ</th>
					</tr>
					<tr>
						<td>
							<input type="text" name="cat[<?php echo $field['cid'];?>][catdir]" value="<?php echo $field['catdir'];?>" class="w250"/>
						</td>
					</tr>
					<tr>
						<th>カテゴリアクセス方式</th>
					</tr>
					<tr>
						<td>
							<label>
							     <input type="radio" name="cat[<?php echo $field['cid'];?>][cat_url_type]" value="1" <?php if($field['cat_url_type']==1){?>checked="checked"<?php }?>/> 静態
                                </label>
                                <label>
                                    <input type="radio" name="cat[<?php echo $field['cid'];?>][cat_url_type]" value="2" <?php if($field['cat_url_type']==2){?>checked="checked"<?php }?>/> 動態
                                </label>
						</td>
					</tr>
					<tr>
						<th>文章アクセス方式</th>
					</tr>
					<tr>
						<td>
							 <label>
                                    <input type="radio" name="cat[<?php echo $field['cid'];?>][arc_url_type]" value="1" <?php if($field['arc_url_type']==1){?>checked="checked"<?php }?>/> 静態
                                </label>
                                <label>
                                    <input type="radio" name="cat[<?php echo $field['cid'];?>][arc_url_type]" value="2" <?php if($field['arc_url_type']==2){?>checked="checked"<?php }?>/> 動態
                                </label>
						</td>
					</tr>
					<tr>
						<th>ナビで表示</th>
					</tr>
					<tr>
                            <td>
                                <label>
                                    <input type="radio" name="cat[<?php echo $field['cid'];?>][cat_show]" value="1" <?php if($field['cat_show']==1){?>checked="checked"<?php }?>/> YES
                                </label>
                                <label>
                                    <input type="radio" name="cat[<?php echo $field['cid'];?>][cat_show]" value="0" <?php if($field['cat_show']==0){?>checked="checked"<?php }?>/> NO
                                </label>
                            </td>
                  	</tr>
                  	<tr>
                  		<th class="w100">表紙テンプレート</th>
                  	</tr>
                  	 <tr>
                            <td>
                                <input type="text" name="cat[<?php echo $field['cid'];?>][index_tpl]" required="" class="w250" id="index_tpl<?php echo $field['cid'];?>" value="<?php echo $field['index_tpl'];?>"
                                       onclick="select_template('index_tpl<?php echo $field['cid'];?>')" readonly="" onfocus="select_template('index_tpl<?php echo $field['cid'];?>');"/>
                            </td>
                        </tr>
                        <tr>
                        	<th class="w100">一覧ページテンプレート</th
                        </tr>
                        <tr>

                            <td>
                                <input type="text" name="cat[<?php echo $field['cid'];?>][list_tpl]" required="" id="list_tpl<?php echo $field['cid'];?>" class="w250" value="<?php echo $field['list_tpl'];?>"
                                       onclick="select_template('list_tpl<?php echo $field['cid'];?>')" readonly="" onfocus="select_template('list_tpl<?php echo $field['cid'];?>');"/>
                            </td>
                        </tr>
                        <tr>
                        	<th>内容ページテンプレート</th>
                        </tr>
                        <tr>
                            
                            <td>
                                <input type="text" name="cat[<?php echo $field['cid'];?>][arc_tpl]" required="" id="arc_tpl<?php echo $field['cid'];?>" class="w250" value="<?php echo $field['arc_tpl'];?>"
                                       onclick="select_template('arc_tpl<?php echo $field['cid'];?>')" readonly="" onfocus="select_template('arc_tpl<?php echo $field['cid'];?>');"/>
                            </td>
                        </tr>
                        <tr>
                        	<th class="w100">カテゴリページURLルール</th>
                        </tr>
                        <tr>
                            
                            <td>
                                <input type="text" name="cat[<?php echo $field['cid'];?>][cat_html_url]" required="" class="w250" value="<?php echo $field['cat_html_url'];?>"/>
                                <span id="zh_cat_html_url"></span>
                            </td>
                        </tr>
                        <tr>
                        	<th>内容ページURLルール</th>
                        </tr>
                        <tr>
                            
                            <td>
                                <input type="text" name="cat[<?php echo $field['cid'];?>][arc_html_url]" required="" class="w250" value="<?php echo $field['arc_html_url'];?>"/>
                                <span id="zh_arc_html_url"></span>
                            </td>
                        </tr>
                        
                        
                        <tr>
                        	<th>キーワード</th>
                        </tr>
                        <tr>
                            
                            <td>
                                <input type="text" name="cat[<?php echo $field['cid'];?>][cat_keyworks]" value="<?php echo $field['cat_keyworks'];?>" class="w250"/>
                            </td>
                        </tr>
                        <tr>
                        	<th>説明</th>
                        </tr>
                        <tr>
                            
                            <td>
                                <textarea name="cat[<?php echo $field['cid'];?>][cat_description]" class="w250 h100"><?php echo $field['cat_description'];?></textarea>
                            </td>
                        </tr>
                        <tr>
                        	<th class="w100">SEOタイトル</th>
                        </tr>
                        <tr>
                            
                            <td>
                                <input type="text" name="cat[<?php echo $field['cid'];?>][cat_seo_title]" value="<?php echo $field['cat_seo_title'];?>" class="w250"/>
                            </td>
                        </tr>
                        <tr>
                        	<th>SEO説明</th>
                        </tr>
                        <tr>
                            <td>
                                <textarea name="cat[<?php echo $field['cid'];?>][cat_seo_description]" class="w250 h150"><?php echo $field['cat_seo_description'];?></textarea>
                            </td>
                        </tr>
				</table>
			</td>
		<?php $zh["list"]["field"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
			</tr>
		</table>
		</div>
		<div class="position-bottom">
			<input type="submit" class="zh-success" value="<?php echo L("admin_category_bulk_edit_page_item15");?>"/>
		</div>
		</form>
	</div>
	<script type="text/javascript" charset="utf-8">
		$(function(){
			alert_div();
		})
		function alert_div(){
			var _h = $(window).height()-180;
			$("div.category").css({height:_h+'px'});
		}
		$(window).resize(function(){
			alert_div();
		})
		
		$(function(){
			$('input[type=radio]').dblclick(function(e){
				var tr_index =$($(this).parents('tr')).index();
				var label_index =$($(this).parent()).index();
				$("table.category").each(function(){
					$(this).find('tr').eq(tr_index).find('label').eq(label_index).find('input').attr('checked','checked');
				})
			})
			$('label').dblclick(function(e){
				var tr_index =$($(this).parents('tr')).index();
				var label_index =$(this).index();
				$("table.category").each(function(){
					$(this).find('tr').eq(tr_index).find('label').eq(label_index).find('input').attr('checked','checked');
				})
			})
		})
	</script>
</body>
</html>
