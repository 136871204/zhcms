<?php if(!defined('ZHPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."link_config (`id`,`webname`,`url`,`logo`,`email`,`comment`,`allow`,`code`,`qq`) VALUES('1','metaphase','http://localhost:8099/zhphp','zh/Plugin/Link/Data/logo.png','hong@metaphase.co.jp','1、まず貴方のサイトをmetaphaseのリンクを設置してください
2、右側の’文字リンク’或いは　’画像リンク’コードを貴方のサイトにコピーする
3、管理者が申請後、貴方のリンクを表示することができます
4、トップページリンク，要求：pr>=2、alexa < 10000；他のページでは、お問い合わせてください
5、貴方のサイトをGoogleには収録することがあって、かつアクセススピードは遅くない','1','1','2300071698')");
