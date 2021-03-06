<?php
if (!defined("ZHPHP_PATH")) exit('No direct script access allowed');

return array(

    //controller
    'admin_field_control_init_error1'=>'Modelは存在しない！',
    'admin_field_control_update_sort_success1'=>'ソート成功',
    'admin_field_control_add_error1'=>'パラメタエラー',
    'admin_field_control_add_success1'=>'Field新規成功',
    'admin_field_control_edit_error1'=>'パラメタエラー',
    'admin_field_control_edit_error2'=>'パラメタエラー',
    'admin_field_control_edit_success1'=>'修正成功',
    'admin_field_control_del_success1'=>'Field削除成功',
    'admin_field_control_update_cache_error1'=>'パラメタエラー',
    'admin_field_control_update_cache_success1'=>'更新成功',
    'admin_field_control_forbidden_success1'=>'設置成功',
    
    //index page
    'admin_field_index_page_title'=>'Field管理',
    'admin_field_index_page_tab1'=>'Model一覧',
    'admin_field_index_page_tab2'=>'Field一覧',
    'admin_field_index_page_tab3'=>'Field新規',
    'admin_field_index_page_tab4'=>'キャッシュ更新',
    'admin_field_index_page_table_col_title1'=>'ソート',
    'admin_field_index_page_table_col_title2'=>'Fid',
    'admin_field_index_page_table_col_title3'=>'説明',
    'admin_field_index_page_table_col_title4'=>'Field名',
    'admin_field_index_page_table_col_title5'=>'テーブル名',
    'admin_field_index_page_table_col_title6'=>'タイプ',
    'admin_field_index_page_table_col_title7'=>'システム',
    'admin_field_index_page_table_col_title8'=>'必須',
    'admin_field_index_page_table_col_title9'=>'検索',
    'admin_field_index_page_table_col_title10'=>'投稿',
    'admin_field_index_page_table_col_title11'=>'操作',
    'admin_field_index_page_table_operator1'=>'修正',
    'admin_field_index_page_table_operator2'=>'禁じる',
    'admin_field_index_page_table_operator3'=>'禁じない',
    'admin_field_index_page_table_operator4'=>'削除',
    'admin_field_index_page_confirm_del'=>'を削除しますか？',
    'admin_field_index_page_operator_sort'=>'ソート',
    
    
    //add page
    'admin_field_add_page_title'=>'Field新規',
    'admin_field_add_page_tab1'=>'Model一覧',
    'admin_field_add_page_tab2'=>'Field一覧',
    'admin_field_add_page_tab3'=>'Field新規',
    'admin_field_add_page_form_title'=>'Field情報',
    'admin_field_add_page_form_item1'=>'タイプ',
    'admin_field_add_page_form_item1_option1'=>'単行テキスト',
    'admin_field_add_page_form_item1_option2'=>'複数行テキスト',
    'admin_field_add_page_form_item1_option3'=>'数字',
    'admin_field_add_page_form_item1_option4'=>'オプション',
    'admin_field_add_page_form_item1_option5'=>'エディター',
    'admin_field_add_page_form_item1_option6'=>'画像',
    'admin_field_add_page_form_item1_option7'=>'多画像',
    'admin_field_add_page_form_item1_option8'=>'日付と時刻',
    'admin_field_add_page_form_item1_option9'=>'ファイル',
    'admin_field_add_page_form_item1_option10'=>'外部データ',
    'admin_field_add_page_form_item1_option11'=>'ツリー選択',
    'admin_field_add_page_form_item2'=>'テーブル',
    'admin_field_add_page_form_item2_message1'=>'フィールド所在表',
    'admin_field_add_page_form_item2_message2'=>'メインテーブル',
    'admin_field_add_page_form_item2_message3'=>'付属テーブル',
    'admin_field_add_page_form_item3'=>'Fieldタイトル',
    'admin_field_add_page_form_item3_message1'=>'例：文章タイトル',
    'admin_field_add_page_form_item4'=>'Field名',
    'admin_field_add_page_form_item4_message1'=>'英語小文字しなければならない',
    'admin_field_add_page_form_item5'=>'Fieldヒント',
    'admin_field_add_page_form_item6'=>'フォームスタイル名',
    'admin_field_add_page_form_item6_message1'=>'フォームのCSSスタイル定義名',
    'admin_field_add_page_form_item7'=>'文字の長さの範囲',
    'admin_field_add_page_form_item7_message1'=>'システムはフォーム提出時Checkを行う、もしCheckしたくない場合、空白してください',
    'admin_field_add_page_form_item8'=>'フォームの検証',
    'admin_field_add_page_form_item8_message1'=>'システムはフォーム提出時Checkを行う、もしCheckしたくない場合、空白してください',
    'admin_field_add_page_form_item8_option1'=>'常用正則',
    'admin_field_add_page_form_item8_option2'=>'数字',
    'admin_field_add_page_form_item8_option3'=>'整数',
    'admin_field_add_page_form_item8_option4'=>'アルファベット',
    'admin_field_add_page_form_item8_option5'=>'数字+アルファベット',
    'admin_field_add_page_form_item8_option6'=>'E-mail',
    'admin_field_add_page_form_item8_option7'=>'QQ',
    'admin_field_add_page_form_item8_option8'=>'ハイパーリンク',
    'admin_field_add_page_form_item8_option9'=>'携帯番号',
    'admin_field_add_page_form_item8_option10'=>'電話番号',
    'admin_field_add_page_form_item8_option11'=>'郵便番号',
    'admin_field_add_page_form_item9'=>'必須入力',
    'admin_field_add_page_form_item9_message1'=>'必須項目は‘YES’を選んでください',
    'admin_field_add_page_form_item10'=>'エラー提示',
    'admin_field_add_page_form_item10_message1'=>'入力内容が正しくない時の表示',
    'admin_field_add_page_form_item11'=>'値唯一',
    'admin_field_add_page_form_item12'=>'基本情報として',
    'admin_field_add_page_form_item12_message1'=>'基本情報は、新規画面の左で表示する',
    'admin_field_add_page_form_item13'=>'検索条件として',
    'admin_field_add_page_form_item14'=>'フロント側投稿可',
    'admin_field_add_page_form_submit'=>'確認',
    
    //edit page
    'admin_field_edit_page_title'=>'Field修正',
    'admin_field_edit_page_tab1'=>'Model一覧',
    'admin_field_edit_page_tab2'=>'Field一覧',
    'admin_field_edit_page_tab3'=>'Field修正',
    'admin_field_edit_page_form_title'=>'Field情報',
    'admin_field_edit_page_form_item3'=>'Fieldタイトル',
    'admin_field_edit_page_form_item3_message1'=>'例：文章タイトル',
    'admin_field_edit_page_form_item5'=>'Fieldヒント',
    'admin_field_edit_page_form_item6'=>'フォームスタイル名',
    'admin_field_edit_page_form_item6_message1'=>'フォームのCSSスタイル定義名',
    'admin_field_edit_page_form_item7'=>'文字の長さの範囲',
    'admin_field_edit_page_form_item7_message1'=>'システムはフォーム提出時Checkを行う、もしCheckしたくない場合、空白してください',
    'admin_field_edit_page_form_item8'=>'フォームの検証',
    'admin_field_edit_page_form_item8_message1'=>'システムはフォーム提出時Checkを行う、もしCheckしたくない場合、空白してください',
    'admin_field_edit_page_form_item8_option1'=>'常用正則',
    'admin_field_edit_page_form_item8_option2'=>'数字',
    'admin_field_edit_page_form_item8_option3'=>'整数',
    'admin_field_edit_page_form_item8_option4'=>'アルファベット',
    'admin_field_edit_page_form_item8_option5'=>'数字+アルファベット',
    'admin_field_edit_page_form_item8_option6'=>'E-mail',
    'admin_field_edit_page_form_item8_option7'=>'QQ',
    'admin_field_edit_page_form_item8_option8'=>'ハイパーリンク',
    'admin_field_edit_page_form_item8_option9'=>'携帯番号',
    'admin_field_edit_page_form_item8_option10'=>'電話番号',
    'admin_field_edit_page_form_item8_option11'=>'郵便番号',
    'admin_field_edit_page_form_item9'=>'必須入力',
    'admin_field_edit_page_form_item9_message1'=>'必須項目は‘YES’を選んでください',
    'admin_field_edit_page_form_item10'=>'エラー提示',
    'admin_field_edit_page_form_item10_message1'=>'入力内容が正しくない時の表示',
    'admin_field_edit_page_form_item11'=>'値唯一',
    'admin_field_edit_page_form_item12'=>'基本情報として',
    'admin_field_edit_page_form_item12_message1'=>'基本情報は、新規画面の左で表示する',
    'admin_field_edit_page_form_item13'=>'検索条件として',
    'admin_field_edit_page_form_item14'=>'フロント側投稿可',
    'admin_field_edit_page_form_submit'=>'確認',
    
    //js 
    'admin_field_js_validate_message1'=>'Fieldタイトルは必須',
    'admin_field_js_validate_message2'=>'特殊アルファベットが入力できない',
    'admin_field_js_validate_message3'=>'Field名は必須',
    'admin_field_js_validate_message4'=>'アルファベットで入力してください',
    'admin_field_js_validate_message5'=>'Fieldはすでに存在',
    'admin_field_js_update_cache_message1'=>'キャッシュ更新成功',
    'admin_field_js_update_cache_message2'=>'キャッシュ更新失敗',
    'admin_field_js_del_field_message1'=>'削除成功',
    'admin_field_js_del_field_message2'=>'削除失敗',
    
    
    //field input
    'admin_field_input_add_th'=>'パラメータ',
    'admin_field_input_add_item1'=>'表示の長さ',
    'admin_field_input_add_item2'=>'デフォルトの値',
    'admin_field_input_add_item3'=>'パスワードかどうか',
    'admin_field_input_edit_th'=>'パラメータ',
    'admin_field_input_edit_item1'=>'表示の長さ',
    'admin_field_input_edit_item2'=>'デフォルトの値',
    'admin_field_input_edit_item3'=>'パスワードかどうか',
    'admin_field_input_validate_js_message1'=>'表示の長さは必須',
    'admin_field_input_validate_js_message2'=>'数字を入力してください。',
    
    //field textarea
    'admin_field_textarea_th'=>'パラメータ',
    'admin_field_textarea_item1'=>'広さ',
    'admin_field_textarea_item2'=>'高さ',
    'admin_field_textarea_item3'=>'デフォルトの値',
    'admin_field_textarea_validate_js_message1'=>'数字を入力してください。',
    
    //field number
    'admin_field_number_th'=>'パラメータ',
    'admin_field_number_item1'=>'タイプ',
    'admin_field_number_item2'=>'整数桁',
    'admin_field_number_item3'=>'小数桁',
    'admin_field_number_item4'=>'表示の長さ',
    'admin_field_number_item5'=>'デフォルトの値',
    'admin_field_number_validate_js_message1'=>'数字を入力してください。',
    
    
    //field box
    'admin_field_box_th'=>'パラメータ',
    'admin_field_box_item1'=>'オプションリスト',
    'admin_field_box_item1_message1'=>'オプション値は1 |オプション名称1',
    'admin_field_box_item2'=>'オプションタイプ',
    'admin_field_box_item2_option1'=>'ラジオボタン',
    'admin_field_box_item2_option2'=>'チェックボックス',
    'admin_field_box_item2_option3'=>'プルダウンボックス',
    'admin_field_box_item3'=>'デフォルトの値',
    'admin_field_box_validate_js_message1'=>'オプションリストは必須',
    'admin_field_box_validate_js_message2'=>'例：1|男,2|女',
    'admin_field_box_validate_js_message3'=>'数値で入力',
    
    //field editor
    'admin_field_editor_th'=>'パラメータ',
    'admin_field_editor_item1'=>'高さ',
    'admin_field_editor_item2'=>'デフォルトの値',
    'admin_field_editor_validate_js_message1'=>'エディタの高さは空にできません',
    'admin_field_editor_validate_js_message2'=>'数字を入力してください。',
    
    //field image
    'admin_field_image_th'=>'パラメータ',
    'admin_field_image_item1'=>'画像の最大幅',
    'admin_field_image_item2'=>'画像最大高さ',
    'admin_field_image_validate_js_message1'=>'数字を入力してください。',
    'admin_field_image_validate_js_message2'=>'px （アップロード画像がサイズ超える部分を裁断される）',
    
    //field images
    'admin_field_images_th'=>'パラメータ',
    'admin_field_images_item1'=>'画像の最大幅',
    'admin_field_images_item2'=>'画像最大高さ',
    'admin_field_images_item3'=>'アップロードの数',
    'admin_field_images_item4'=>'画像名でソート',
    'admin_field_images_validate_js_message1'=>'数字を入力してください。',
    'admin_field_images_validate_js_message2'=>'px （アップロード画像がサイズ超える部分を裁断される',
    'admin_field_images_validate_js_message3'=>'個',
    
    
    //field datetime
    'admin_field_datetime_th'=>'パラメータ',
    'admin_field_datetime_item1'=>'時間のフォーマット',
    'admin_field_datetime_item1_option1'=>'日付+ 24時間制時間（2013-11-19 05:10:27）',
    'admin_field_datetime_item1_option2'=>'日付（2013-11-19）',
    'admin_field_datetime_item1_option2'=>'時間（05:10:27）',
    
    
    //field files
    'admin_field_files_th'=>'パラメータ',
    'admin_field_files_item1'=>'アップロードの数',
    'admin_field_files_item2'=>'アップロードファイルタイプ',
    'admin_field_files_validate_js_message1'=>'数字を入力してください。',
    'admin_field_files_validate_js_message2'=>'個',
    'admin_field_files_validate_js_message3'=>'ファイルタイプは空にできません',
    'admin_field_files_validate_js_message4'=>'アップロードファイルタイプは，カンマで分離。例: zip,doc',
    'admin_field_files_validate_js_message5'=>'下載金貨',
    
    //field exterior
    'admin_field_exterior_th'=>'パラメータ',
    'admin_field_exterior_item1'=>'テーブル',
    'admin_field_exterior_item2'=>'PK',
    'admin_field_exterior_item3'=>'表示項目',
    'admin_field_exterior_item4'=>'表示項目タイトル',
    'admin_field_exterior_item5'=>'検索条件',
    'admin_field_exterior_item6'=>'複数/シングル（選択）',
    'admin_field_exterior_item6_option1'=>'複数',
    'admin_field_exterior_item6_option2'=>'シングル',
    
    //field treeselect
    'admin_field_treeselect_th'=>'パラメータ',
    'admin_field_treeselect_item1'=>'テーブル',
    'admin_field_treeselect_item2'=>'表示 Field',
    'admin_field_treeselect_item3'=>'ID Field',
    
    
    
    
    
);
?>
