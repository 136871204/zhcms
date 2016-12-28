<?php
if (!defined("ZHPHP_PATH")) exit('No direct script access allowed');
//echo 'aaa';
return array(

    //controller
    'admin_content_control_common1'=>'商品カテゴリ',
    'admin_content_control_common2'=>'カテゴリ新規',
    'admin_content_control_index_insert1'=>'同じカテゴリ名が存在した!',
    'admin_content_control_index_insert2'=>'価額階級数は0-10以内してください',
    'admin_content_control_index_insert3'=>'新商品カテゴリ新規成功!',
    'admin_content_control_index_edit1'=>'商品カテゴリ更新',
    'admin_content_control_index_update1'=>'選択した上級カテゴリは現在カテゴリ或いは下級カテゴリに入ることができません!',
    'admin_content_control_index_update2'=>'商品カテゴリ更新成功!',
    'admin_content_control_index_move1'=>'商品移行',
    'admin_content_control_index_move_cat1'=>'正しく商品カテゴリ選択してください',
    'admin_content_control_index_move_cat2'=>'商品カテゴリ商品移行成功!',
    'admin_content_control_index_remove1'=>'一番下級カテゴリ或いは該当カテゴリには商品ありから,削除できません!',
    
    //category_list page
    'admin_eccategory_category_list_page_table_th1'=>'カテゴリ名称',
    'admin_eccategory_category_list_page_table_th2'=>'商品数',
    'admin_eccategory_category_list_page_table_th3'=>'数単位',
    'admin_eccategory_category_list_page_table_th4'=>'ナビ表示',
    'admin_eccategory_category_list_page_table_th5'=>'表示',
    'admin_eccategory_category_list_page_table_th6'=>'価額階級',
    'admin_eccategory_category_list_page_table_th7'=>'ソート',
    'admin_eccategory_category_list_page_table_th8'=>'操作',
    'admin_eccategory_category_list_page_table_info1'=>'商品移行',
    'admin_eccategory_category_list_page_table_info2'=>'更新',
    'admin_eccategory_category_list_page_table_info3'=>'このデータを削除するか?',
    'admin_eccategory_category_list_page_table_info4'=>'削除',
    'admin_eccategory_category_list_page_table_info5'=>'データなし',
    
    //category_info page
    'admin_eccategory_category_info_page_form_title1'=>'カテゴリ名称:',
    'admin_eccategory_category_info_page_form_title2'=>'上級カテゴリ:',
    'admin_eccategory_category_info_page_form_title2_other1'=>'トップカテゴリ',
    'admin_eccategory_category_info_page_form_title3'=>'数単位:',
    'admin_eccategory_category_info_page_form_title4'=>'ソート:',
    'admin_eccategory_category_info_page_form_title5'=>'表示:',
    'admin_eccategory_category_info_page_form_title6'=>'ナビで表示:',
    'admin_eccategory_category_info_page_form_title7'=>'トップ進め設置:',
    'admin_eccategory_category_info_page_form_title7_other1'=>'best',
    'admin_eccategory_category_info_page_form_title7_other2'=>'new',
    'admin_eccategory_category_info_page_form_title7_other3'=>'hot',
    'admin_eccategory_category_info_page_form_title8'=>'属性選択:',
    'admin_eccategory_category_info_page_form_title8_other1'=>'属性選択してください',
    'admin_eccategory_category_info_page_form_title8_other2'=>'商品タイプ選択してください',
    'admin_eccategory_category_info_page_form_title8_other3'=>'属性設置すると、カテゴリ画面では検索リンクとして表示する',
    'admin_eccategory_category_info_page_form_title9'=>'価額区間数:',
    'admin_eccategory_category_info_page_form_title9_other1'=>'回答カテゴリ画面の商品の一番高い～一番低い値段のうちに自動的に値段を分けて、検索条件として表示する，0は表示階級なし，10を超えないこと。',
    'admin_eccategory_category_info_page_form_title10'=>'カテゴリ画面表示cssファイル:',
    'admin_eccategory_category_info_page_form_title10_other1'=>'商品カテゴリごとに画面表示css違うことが可能。例：フォルダ themes 下なら：themes/style.cssを入力して',
    'admin_eccategory_category_info_page_form_title11'=>'キーワード:',
    'admin_eccategory_category_info_page_form_title12'=>'カテゴリ紹介:',
    'admin_eccategory_category_info_page_form_title13'=>'確定',
    'admin_eccategory_category_info_page_form_title14'=>'リーセット',
    'admin_eccategory_category_info_page_js1'=>'カテゴリ価額階層数は0-10ないにしてください',
    
    
    
    //js
    'admin_eccategory_js_process_request'=>'処理中...',
    'admin_eccategory_js_todolist_caption'=>'ノート',
    'admin_eccategory_js_todolist_autosave'=>'自動保存',
    'admin_eccategory_js_todolist_save'=>'保存',
    'admin_eccategory_js_todolist_clear'=>'クリア',
    'admin_eccategory_js_todolist_confirm_save'=>'ノートに最新情報保存するか？',
    'admin_eccategory_js_todolist_confirm_clear'=>'内容をクリアしますか？',
    'admin_eccategory_js_catname_empty'=>'カテゴリ名称は日必須!',
    'admin_eccategory_js_unit_empyt'=>'数簡易は入力してください!',
    'admin_eccategory_js_is_leafcat'=>'選らんだカテゴリは一番下級カテゴリ。\r\n新カテゴリの上階級は一番下級カテゴリになってはできません',
    'admin_eccategory_js_not_leafcat'=>'選らんだカテゴリは一番下級カテゴリではない。\r\n商品のカテゴリ移行は一番下級カテゴリしか使えません。',
    'admin_eccategory_js_filter_attr_not_repeated'=>'属性は重複できません',
    'admin_eccategory_js_filter_attr_not_selected'=>'属性を選択してください',


    
    
);


?>
