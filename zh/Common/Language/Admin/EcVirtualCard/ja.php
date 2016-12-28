<?php
if (!defined("ZHPHP_PATH")) exit('No direct script access allowed');

return array(
    
    //common
    'admin_ecvirtualcard_common1'=>'戻る',
    'admin_ecvirtualcard_common2'=>'商品IDは足りない，品物追加操作できません',
    'admin_ecvirtualcard_common3'=>'商品IDはエラーがあり，商品名はもらえません',
    'admin_ecvirtualcard_common4'=>'品物追加',
    'admin_ecvirtualcard_common5'=>'补货追加リストに戻る',
    'admin_ecvirtualcard_common6'=>'品物バッチ追加',
    'admin_ecvirtualcard_common7'=>'商品IDは足りない，品物追加操作できません作',
    'admin_ecvirtualcard_common8'=>'商品IDは足りない，品物追加操作できません',
    'admin_ecvirtualcard_common9'=>'商品IDは足りない，品物追加操作できません',
    'admin_ecvirtualcard_common10'=>'操作成功',
    'admin_ecvirtualcard_common11'=>'品物追加し続き',
    
    //controller
    'admin_ecvirtualcard_control_index_batch_card_add1'=>'バッチャル商品リスト',
    'admin_ecvirtualcard_control_index_batch_confirm1'=>'ファイルアップ失敗',
    
    'admin_ecvirtualcard_control_index_batch_insert1'=>'カードリスト',
    'admin_ecvirtualcard_control_index_batch_insert2'=>' %s 個の記録の追加が成功しました',
    
    'admin_ecvirtualcard_control_index_action1'=>'カードコード %s すでに存在，入力しなおしてください',
    
    'admin_ecvirtualcard_control_index_toggle_sold1'=>'操作失敗',
    
    'admin_ecvirtualcard_control_index_start_change1'=>'新加密串は元加密串と同じ',
    'admin_ecvirtualcard_control_index_start_change2'=>'元加密串は正しくない',
    'admin_ecvirtualcard_control_index_start_change3'=>'全部 %s 個記録。新串加密 %s 個がすでに使用，元串加密（更新待ち） %s 個がすでに使用，使用未知の記録は %s 個あり。',
    
    'admin_ecvirtualcard_control_index_on_change1'=>'更新中エラー：%s',
    'admin_ecvirtualcard_control_index_on_change2'=>'<strong>更新完了</strong>，今新串加密の記録は %s 個あり，未知串加密使用する记录は %s　個あり。',
    
    //page    
    'admin_ecvirtualcard_info_page_table_th1'=>'商品名称',
    'admin_ecvirtualcard_info_page_table_th2'=>'カードコード',
    'admin_ecvirtualcard_info_page_table_th3'=>'カードパスワード',
    'admin_ecvirtualcard_info_page_table_th4'=>'締め切り使用日付',
    'admin_ecvirtualcard_info_page_table_btn1'=>'確定',
    
    'admin_ecvirtualcard_info_page_table_th5'=>'使用説明',
    'admin_ecvirtualcard_info_page_table_th6'=>'加密串は新規カードする時使う',
    'admin_ecvirtualcard_info_page_table_th7'=>'加密串は以下のファイルに保存する data/config.php ，対応する常量は AUTH_KEY',
    'admin_ecvirtualcard_info_page_table_th8'=>"もし修正する場合下の入力場所に元加密串和新加密串を記入して，\'確定\'ボタンをクリックする",
    'admin_ecvirtualcard_info_page_table_th9'=>'元加密串',
    'admin_ecvirtualcard_info_page_table_th10'=>'新加密串',
    'admin_ecvirtualcard_info_page_table_th11'=>'更新記録',

    'admin_ecvirtualcard_info_page_table_th12'=>'受注号',
    'admin_ecvirtualcard_info_page_table_btn2'=>'検索',
    'admin_ecvirtualcard_info_page_table_th13'=>'番号',
    'admin_ecvirtualcard_info_page_table_th14'=>'すでに売り出す',
    'admin_ecvirtualcard_info_page_table_th15'=>'操作',
    'admin_ecvirtualcard_info_page_table_th16'=>'このデータを削除するか?',
    'admin_ecvirtualcard_info_page_table_th17'=>'データなし',
    'admin_ecvirtualcard_info_page_table_btn3'=>'削除',
    
    'admin_ecvirtualcard_info_page_table_th18'=>'区切り文字',
    'admin_ecvirtualcard_info_page_table_th19'=>'ファイルアップ',
    'admin_ecvirtualcard_info_page_table_th20'=>'CSVファイルバッチダウンロード',
    'admin_ecvirtualcard_info_page_table_btn4'=>'リセット',    
    'admin_ecvirtualcard_info_page_table_th21'=>'CSVファイルをアップしてください<br />
                      CSVファイル第一列はカードコード；第二列はカードパスワード；第三列は使用締め切り日付。<br />
                      (EXCELでcsvファイル作る方法：EXCELはカードコード、カードパスワード、使用締め切り日付の順で記入，完了後直接csvファイルに保存すればいい)',
    'admin_ecvirtualcard_info_page_table_th22'=>'カードパスワード，使用締め切り日付は空白を記入してもいい，使用締め切り日付のフォマットは2006-11-6或いは2006/11/6',
    'admin_ecvirtualcard_info_page_table_th23'=>'カードコード、カードパスワード、使用締め切り日付は中国語を使用しないでください',
    
    //js
    'admin_ecvirtualcard_js_no_card_sn'=>'カードコード、カードパスワードは空白にはいけません。',
    'admin_ecvirtualcard_js_separator_not_null'=>'区切り文字は空白にはいけません。',
    'admin_ecvirtualcard_js_uploadfile_not_null'=>'アップするファイルを選らんでください。',
    'admin_ecvirtualcard_js_updating_info'=>'<strong>更新中</strong>（毎回 100 個記録）',
    'admin_ecvirtualcard_js_updated_info'=>'<strong>更新済み</strong> <span id=\"updated\">0</span> 個記録。',
    
    
    
);


?>
