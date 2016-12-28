<?php
if (!defined("ZHPHP_PATH")) exit('No direct script access allowed');

return array(
    
    //common
    'admin_ecgoodsbatch_common1'=>'簡体字',
    'admin_ecgoodsbatch_common2'=>'繁体字',
    'admin_ecgoodsbatch_common3'=>'CSVファイル（%s）バッチダウンロード',    
    'admin_ecgoodsbatch_common4'=>'商品名称',
    'admin_ecgoodsbatch_common5'=>'商品番号',
    'admin_ecgoodsbatch_common6'=>'商品ブランド',
    'admin_ecgoodsbatch_common7'=>'市場値段',
    'admin_ecgoodsbatch_common8'=>'店舗値段',
    'admin_ecgoodsbatch_common9'=>'ポイント購入額',
    'admin_ecgoodsbatch_common10'=>'商品オリジナル画像',
    'admin_ecgoodsbatch_common11'=>'商品画像',
    'admin_ecgoodsbatch_common12'=>'商品サムナイル',
    'admin_ecgoodsbatch_common13'=>'商品キーワード',
    'admin_ecgoodsbatch_common14'=>'簡単紹介',
    'admin_ecgoodsbatch_common15'=>'詳細紹介',
    'admin_ecgoodsbatch_common16'=>'商品重さ（kg）',
    'admin_ecgoodsbatch_common17'=>'在庫数',
    'admin_ecgoodsbatch_common18'=>'在庫広告数',
    'admin_ecgoodsbatch_common19'=>'ベスト',
    'admin_ecgoodsbatch_common20'=>'新品',
    'admin_ecgoodsbatch_common21'=>'よく売れる',
    'admin_ecgoodsbatch_common22'=>'公開',
    'admin_ecgoodsbatch_common23'=>'普通商品として販売できる',
    'admin_ecgoodsbatch_common24'=>'実物商品',
    'admin_ecgoodsbatch_common25'=>'バッチアップ成功',
    'admin_ecgoodsbatch_common26'=>'商品',
    'admin_ecgoodsbatch_common27'=>'商品バッチ修正',    
    'admin_ecgoodsbatch_common28'=>'選んでください...',
    'admin_ecgoodsbatch_common29'=>'クリックしてヒントを見る',
    
    //controller
    'admin_ecgoodsbatch_control_index_add1'=>'国際コード（utf8）',
    'admin_ecgoodsbatch_control_index_add2'=>'ecshop使えるデータ',
    'admin_ecgoodsbatch_control_index_add3'=>'Taobao使えるデータ',
    'admin_ecgoodsbatch_control_index_add4'=>'拍拍助理使えるデータ',
    'admin_ecgoodsbatch_control_index_add5'=>'拍拍助理3.0使えるデータ',
    'admin_ecgoodsbatch_control_index_add6'=>'Taobao助理4.6使えるデータ',
    'admin_ecgoodsbatch_control_index_add7'=>'商品バッチアップ',
    'admin_ecgoodsbatch_control_index_add8'=>'ecshop使えるデータ',
    'admin_ecgoodsbatch_control_index_add9'=>'ecshop使えるデータ',
    
    'admin_ecgoodsbatch_control_index_upload1'=>'実物商品',
    'admin_ecgoodsbatch_control_index_upload2'=>'バッチャルカード',
    'admin_ecgoodsbatch_control_index_upload3'=>'バッチアップ確認',
    
    'admin_ecgoodsbatch_control_index_insert1'=>'TODO:图片处理部分的逻辑还需要斟酌，',
    'admin_ecgoodsbatch_control_index_insert2'=>'商品リスト',
    
    'admin_ecgoodsbatch_control_index_update1'=>'バッチ修正成功',
    
    'admin_ecgoodsbatch_control_index_download1'=>'商品名称',
    'admin_ecgoodsbatch_control_index_download2'=>'商品番号',
    'admin_ecgoodsbatch_control_index_download3'=>'市場値段',
    'admin_ecgoodsbatch_control_index_download4'=>'店舗値段',
    'admin_ecgoodsbatch_control_index_download5'=>'ポイント購入額',
    'admin_ecgoodsbatch_control_index_download6'=>'商品オリジナル画像',
    'admin_ecgoodsbatch_control_index_download7'=>'商品画像',
    'admin_ecgoodsbatch_control_index_download8'=>'商品サムナイル',
    'admin_ecgoodsbatch_control_index_download9'=>'商品キーワード',
    'admin_ecgoodsbatch_control_index_download10'=>'簡単紹介',
    'admin_ecgoodsbatch_control_index_download11'=>'詳細紹介',
    'admin_ecgoodsbatch_control_index_download12'=>'在庫数',
    'admin_ecgoodsbatch_control_index_download13'=>'在庫広告数',
    'admin_ecgoodsbatch_control_index_download14'=>'よく売れる',
    'admin_ecgoodsbatch_control_index_download15'=>'普通商品として販売できる',
    'admin_ecgoodsbatch_control_index_download16'=>'実物商品',

    //page    
    'admin_ecgoodsbatch_info_page_table_th1'=>'データフォマット',
    'admin_ecgoodsbatch_info_page_table_th2'=>'所属カテゴリ',
    'admin_ecgoodsbatch_info_page_table_th3'=>'ファイルコード',
    'admin_ecgoodsbatch_info_page_table_th4'=>'csvファイルバッチアップ',
    'admin_ecgoodsbatch_info_page_table_th5'=>'（CSVファイルアップする時、一回1000商品以内に収めてください，CSVファイルサイズは500K以内に収めてください.）',
    'admin_ecgoodsbatch_info_page_table_btn1'=>'確定',
    'admin_ecgoodsbatch_info_page_table_th6'=>'使用説明',
    'admin_ecgoodsbatch_info_page_table_th7'=>'使用習慣によって，対応言語のcsvファイルをダウンロードしてください，例えば、中国ユーザは簡体字ファイル，港台ユーザは繁体字ファイル；',
    'admin_ecgoodsbatch_info_page_table_th8'=>'csvファイルを記入する時，excel或いはテキスト編集ソフトでcsvファイル開く；<br />
                      “ベスト”のような項目時，数値0或いは1を記入，0は“NO”，1は“YES”；<br />
                      商品画像と商品サムナイルはパース付きのファイル名を記入，例 [ROOT]/images/ のパース，例[ROOT]/images/200610/abc.jpg，以下 200610/abc.jpgだけ記入すればいいです；<br />
                       <font style="color:#FE596A;">もしTAOBOデータの時、cvsコードをサイトのコードを一致にしてください，コードが不正解の場合，編集ソフトで変えてください。</font>',
    'admin_ecgoodsbatch_info_page_table_th9'=>'商品画像と商品サムナイルを対応の場所にアップしてください，例：[ROOT]/images/200610/；<br />
                      <font style="color:#FE596A;">商品画像と商品サムナイルアップして後、csvファイルをアップしてください，そうしないと画像処理できません。</font>',
    'admin_ecgoodsbatch_info_page_table_th10'=>'商品カテゴリとファイルコードを選択して，csvファイルアップしてください',
    
    'admin_ecgoodsbatch_info_page_table_th11'=>'番号',
    'admin_ecgoodsbatch_info_page_table_th12'=>'商品カテゴリ',
    'admin_ecgoodsbatch_info_page_table_btn2'=>'戻す',
    
    'admin_ecgoodsbatch_info_page_table_th13'=>'会員価額は-1場合、値段は会員ランクで自動的に計算する',
    'admin_ecgoodsbatch_info_page_table_th14'=>'番号',
    'admin_ecgoodsbatch_info_page_table_th15'=>'市場値段',
    'admin_ecgoodsbatch_info_page_table_th16'=>'店舗値段',
    'admin_ecgoodsbatch_info_page_table_th17'=>'ポイントで購入',
    'admin_ecgoodsbatch_info_page_table_th18'=>'送るポイント',
    'admin_ecgoodsbatch_info_page_table_th19'=>'在庫',
    'admin_ecgoodsbatch_info_page_table_th20'=>'ブランド',
    'admin_ecgoodsbatch_info_page_table_th21'=>'番号',
    'admin_ecgoodsbatch_info_page_table_btn3'=>'リセット',
    
    'admin_ecgoodsbatch_info_page_table_th22'=>'商品選択方法',
    'admin_ecgoodsbatch_info_page_table_th23'=>'商品カテゴリ、ブランドによって',
    'admin_ecgoodsbatch_info_page_table_th24'=>'商品番号によって',
    'admin_ecgoodsbatch_info_page_table_th25'=>'商品カテゴリ選択',
    'admin_ecgoodsbatch_info_page_table_th26'=>'商品ブランド選択',
    'admin_ecgoodsbatch_info_page_table_th27'=>'選択待ちリスト',
    'admin_ecgoodsbatch_info_page_table_th28'=>'選択したリスト',
    'admin_ecgoodsbatch_info_page_table_th29'=>'商品番号を記入：<br />（行ずつ）',
    'admin_ecgoodsbatch_info_page_table_th30'=>'編集公式',
    'admin_ecgoodsbatch_info_page_table_th31'=>'一つずつ編集',
    'admin_ecgoodsbatch_info_page_table_th32'=>'一括編集',
    'admin_ecgoodsbatch_info_page_table_th33'=>'編集',
    
    //js
    'admin_ecgoodsbatch_js_please_select_goods'=>'商品を選んでください',
    'admin_ecgoodsbatch_js_please_input_sn'=>'商品番号を記入して',
    'admin_ecgoodsbatch_js_goods_cat_not_leaf'=>'一番下階層カテゴリ選択してください',
    'admin_ecgoodsbatch_js_please_select_cat'=>'所属カテゴリ選択してください',
    'admin_ecgoodsbatch_js_please_upload_file'=>'csvファイルバッチアップしてください',
    
    
    
);


?>
