<?php if(!defined('ZHPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('1','WEBNAME','ZHCMS内容管理システム','站点配置','サイト名称','文本','','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('2','ICP','metaphase','站点配置','ICP','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('3','HTML_PATH','h','站点配置','静態html目録','文本','','8')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('4','COPYRIGHT','Copyright © 2014 ZHPHP','站点配置','网站版权信息','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('5','KEYWORDS','ZHCMS内容管理システム,ZHPHPオープンソースフレーム','站点配置','サイトキーワード','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('6','DESCRIPTION','ZHCMS内容管理システム,ZHPHPオープンソースフレーム，デモサイト','站点配置','サイト説明','多行文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('7','EMAIL','hong@metaphase.co.jp','站点配置','管理者メールアドレス','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('8','BACKUP_DIR','backup','内容相关','データバックアップディレクトリ','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('9','WEB_OPEN','1','站点配置','サイトオープン','布尔(1/0)','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('10','AUTH_KEY','metaphase.co.jp','安全配置','cookie暗号化KEY','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('63','UPLOAD_PATH','upload','上传配置','アップロード目録','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('19','UPLOAD_IMG_PATH','img','上传配置','画像アップロードするディレクトリ','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('20','ALLOW_TYPE','jpg,jpeg,png,bmp,gif','上传配置','アップロードタイプ','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('21','ALLOW_SIZE','10480000','上传配置','アップロードサイズ（バイト）','数字','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('22','WATER_ON','1','上传配置','アップロードwater mark','布尔(1/0)','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('24','MEMBER_VERIFY','1','会员配置','会員登録時審査必要ない','布尔(1/0)','','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('25','REG_SHOW_CODE','1','会员配置','会員登録時検証番号check','布尔(1/0)','','2')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('68','WEB_TITLE','ZHCMS内容管理システム','站点配置','サイトタイトル','文本','','2')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('27','REG_INTERVAL','0','会员配置','2回登録の時間差','数字','单位秒，0为不限','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('28','DEFAULT_MEMBER_GROUP','4','会员配置','新登録会員の処理グループ','数字','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('29','TOKEN_ON','0','会员配置','トークン検証','布尔(1/0)','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('30','LOG_KEY','metaphase.co.jp','安全配置','ログファイル暗号化KEY','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('61','SESSION_NAME','zhsid','SESSION配置','SESSION_NAME値','文本','一般不用更改','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('17','super_admin_key','SUPER_ADMIN','高级配置','サイトマスタトークン名称','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('64','TEL','13167001526','站点配置','連絡電話番号','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('41','WATER_TEXT','metaphase.co.jp','水印配置','water mark文字','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('42','WATER_TEXT_SIZE','16','水印配置','文字サイズ','数字','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('43','WATER_IMG','data/water/water.png','水印配置','water mark画像','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('44','WATER_PCT','80','水印配置','water mark透明度','数字','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('45','WATER_QUALITY','90','水印配置','画像圧縮率','数字','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('46','WATER_POS','9','水印配置','water mark位置','数字','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('47','DEL_CONTENT_MODEL','0','内容相关','文章削除する時、未審査にする','布尔(1/0)','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('67','CREATE_INDEX_HTML','1','站点配置','トップページ作成','布尔(1/0)','','9')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('31','REPLY_CREDITS','1','会员配置','コメントの積分','文本','会员提交回复奖励积分','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('48','DOWN_REMOTE_PIC','1','内容相关','遠隔画像ダウンロード','布尔(1/0)','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('49','AUTO_DESC','1','内容相关','内容を切り取って要約にする','布尔(1/0)','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('50','AUTO_THUMB','1','内容相关','内容画像を切り取って、サムネイルにする','布尔(1/0)','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('51','UPLOAD_IMG_MAX_WIDTH','2000','内容相关','画像max width','数字','画像をアップロードする幅を超える時、リサイズする','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('52','UPLOAD_IMG_MAX_HEIGHT','2000','内容相关','画像max height','数字','画像をアップロードする幅を超える時、リサイズする','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('32','MEMBER_OPEN','1','会员配置','会員センタオーポン','布尔(1/0)','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('11','WEB_CLOSE_MESSAGE','サイトはメンテナンス中、後で訪問してください...','站点配置','サイトを閉じる時のメッセージ','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('12','WEB_STYLE','default','站点配置','サイトテンプレート','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('13','QQ','136871204','站点配置','QQ番号','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('14','WEIBO','hong@metaphase.co.jp','站点配置','sina weibo','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('15','TWEIBO','hong@metaphase.co.jp','站点配置','qq weibo','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('16','ENTERPRISE_EMAIL','hong@metaphase.co.jp','站点配置','企業メールアドレス','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('33','INIT_CREDITS','100','会员配置','初期積分','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('53','CACHE_INDEX','0','性能优化','トップページキャッシュ時間','文本','秒単位、0：キャッシュしない','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('54','CACHE_CATEGORY','0','性能优化','カテゴリキャッシュ時間','文本','秒単位、0：キャッシュしない','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('55','CACHE_CONTENT','0','性能优化','文章キャッシュ時間','文本','秒単位、0：キャッシュしない','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('34','COMMENT_STEP_TIME','10','会员配置','評論時間間隔','文本','秒単位、>1は必要','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('56','PATHINFO_TYPE','0','伪静态','偽静態開く','布尔(1/0)','環境設定必要','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('57','OPEN_REWRITE','0','伪静态','Rewrite機能開く','布尔(1/0)','1:サーバはRewrtie機能支持 2:ZHCMS/htaccess.txtをhtaccess','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('35','EMAIL_USERNAME','136871204@qq.com','邮箱配置','メールアドレス名','文本','使用126或qq邮箱','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('36','EMAIL_PASSWORD','zh732401','邮箱配置','メールアドレスパスワード','文本','メールアドレスパスワード','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('37','EMAIL_HOST','smtp.qq.com','邮箱配置','smtp　アドレス','文本','例：smtp.gmail.com','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('38','EMAIL_PORT','25','邮箱配置','smtp　ポート','文本','qq,126：25，gmail：465','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('39','EMAIL_FROMNAME','周鸿','邮箱配置','送信者','文本','送信するときのユーザ名称','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('58','COOKIE_EXPIRE','','COOKIE配置','Coodie有效期','文本','单位秒','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('59','COOKIE_DOMAIN','','COOKIE配置','Cookie　ドメイン名','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('60','COOKIE_PATH','/','COOKIE配置','Cookie ディレクトリ','文本','有効ディレクトリ','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('62','SESSION_DOMAIN','','SESSION配置','SESSION　ドメイン名','文本','例.zhphp.com 設置が誤る時、管理画面は入らない','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('65','MEMBER_EMAIL_VALIDATE','0','会员配置','登録時メールアドレス検証必要','布尔(1/0)','メール設置必要，開く後会員審査機能無効になる','3')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`) VALUES('69','WEB_DOMAIN','','站点配置','サイトドメイン','文本','','3')");
