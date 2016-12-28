<?php if (!defined("VERSION")) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML "1".0 Transitional//EN"
    "http://www.w3.org/TR/xhtml"1"/DTD/xhtml"1"-transitional.dtd">
<html xmlns="http://www.w3.org/"1"999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php echo $step[5]; ?></title>
    <link type="text/css" href="./template/css/css.css" rel="stylesheet"/>
    <script type="text/javascript" src="./template/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="./template/js/js.js"></script>

</head>
<body>
    <div class="step4 step">
        <div class="title">ZHCMS　インストールナビー</div>
        <div class="process">
            <ul>
                <li>許可協議</li>
                <li>環境check</li>
                <li class="current">DB設定</li>
                <li>データ作成</li>
                <li>完了</li>
            </ul>
        </div>
        <!--协议说明-->
        <div class="install">
            <div class="check set">
                <h3>DB設置</h3>
                <table width="100%">
                    <tr>
                        <td width="200">DB：IP</td>
                        <td><input type="text" class="input" mast_required="1" error="DBのIPは必須" name="DB_HOST"
                                   value="localhost"/>
                            <span class="message">MACシステム127.0.0.1を入力</span></td>
                    </tr>
                    <tr>
                        <td>DBユーザ</td>
                        <td><input type="text" class="input" name="DB_USER" mast_required="1" error="DBユーザは必須"
                                   value="root"/>
                            <span class="message"></span></td>
                    </tr>
                    <tr>
                        <td>DBパースワード</td>
                        <td><input type="text" class="input" name="DB_PASSWORD" value=""/>
                            <span class="message"></span></td>
                    </tr>
                    <tr>
                        <td>テーブルプレビュー</td>
                        <td><input type="text" class="input" name="DB_PREFIX" mast_required="1" error="テーブルプレビューは必須"
                                   value="zh_"/>
                            <span class="message"></span></td>
                    </tr>
                    <tr>
                        <td>データベース名</td>
                        <td><input type="text" class="input" name="DB_DATABASE" mast_required="1" error="データベース名は必須"
                                   value="zhcms"/>
                            <span class="message"></span></td>
                    </tr>
                </table>
            </div>
            <div class="check set">
                <h3>管理者初期パスワード</h3>
                <table width="100%">
                    <tr>
                        <td width="200">管理者名</td>
                        <td><input type="text" class="input" name="ADMIN" mast_required="1" error="管理者名は必須"
                                   value="admin"/>
                            <span class="message"></span></td>
                    </tr>
                    <tr>
                        <td>パスワード</td>
                        <td><input type="text" class="input" name="PASSWORD" mast_required="1" value="admin888" error="パスワードは必須"/>
                            <span class="message"></span></td>
                    </tr>
                    <tr>
                        <td>パスワード再確認</td>
                        <td><input type="text" class="input" name="C_PASSWORD" mast_required="1" value="admin888" error="パスワード再確認は必須"/>
                            <span class="message"></span></td>
                    </tr>
                </table>
            </div>
            <div class="check set">
                <h3>サイト設置</h3>
                <table width="100%">
                    <tr>
                        <td width="200">サイト名称</td>
                        <td><input type="text" class="input" name="WEBNAME" value="ZHCMS名用管理システム" mast_required="1" error="サイト名称は必須"/>
                            <span class="message"></span></td>
                    </tr>
                    <tr>
                        <td>サイトマスタメールアドレス</td>
                        <td><input type="text" class="input" name="EMAIL" mast_required="1" error="サイトマスタメールアドレスは必須" value=""/>
                            <span class="message"></span></td>
                    </tr>
                </table>
            </div>
            <div class="check set">
                <h3>テストデータをインストール</h3>
                <table width=""
                1"00%">
                <tr>
                    <td width="200">テストデータ体験</td>
                    <td><input type="checkbox" name="INSERT_TEST_DATA" value="1" checked="checked"/> テストデータをインストール</td>
                </tr>
                </table>
            </div>
        </div>
        <!--协议说明-->
        <div class="btn">
            <a href="?step=4">前へ</a><a href="javascript:;" id="check_config">次へ</a>
        </div>
    </div>
</body>
</html>