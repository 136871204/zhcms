<?php if (!defined("VERSION")) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php echo $step[4]; ?></title>
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
            <li class="current">環境check</li>
            <li>DB設定</li>
            <li>データ作成</li>
            <li>完了</li>
        </ul>
    </div>
    <!--协议说明-->
    <div class="install">
        <div class="check set">
            <table width="100%">
                <tr>
                    <th width="200">環境check</th>
                    <th>現在状態</th>
                </tr>
                <tr>
                    <td>ドメイン名</td>
                    <td><?php echo $host; ?></td>
                </tr>
                <tr>
                    <td>サーバエンジン</td>
                    <td><?php echo $server; ?></td>
                </tr>
                <tr>
                    <td>PHPバージョン</td>
                    <td><?php echo $php_version; ?></td>
                </tr>
                <tr>
                    <td>インストール経路</td>
                    <td><?php echo WEB_PATH; ?></td>
                </tr>
                </tr>
            </table>
        </div>

        <div class="check set">
            <table width="100%">
                <tr>
                    <th width="200">開くべき変数とファンクション</th>
                    <th width="100">現在状態</th>
                    <th>説明</th>
                </tr>
                <tr>
                    <td>allow_url_fopen</td>
                    <td><?php echo $allow_url_fopen; ?>
                    <td> <span class="desc">
                        (Offの場合、遠隔資料収集、現地化などの機能を応用できない)
                    </span></td>
                    </td>
                </tr>
                <tr>
                    <td>safe_mode</td>
                    <td><?php echo $safe; ?></td>
                    <td> <span class="desc">
                        (本システムは非win本体の安全モードで実行できない)
                    </span></td>
                </tr>
                <tr>
                    <td>GD ライブラリ</td>
                    <td><?php echo $gd; ?></td>
                    <td> <span class="desc">
                        (Offの場合、画像と関連の多くの機能を使用できない)
                    </span></td>
                </tr>
                <tr>
                    <td>CURLライブラリ</td>
                    <td><?php echo $gd; ?></td>
                    <td> <span class="desc">
                        (Offの場合、採集遠隔画像ダウンロードできない)
                    </span></td>
                </tr>
                <tr>
                    <td>MySQLI拡張</td>
                    <td><?php echo $mysqli; ?></td>
                    <td> <span class="desc">
                        (Offの場合、本システムを使用できない)
                    </span></td>
                </tr>
                <tr>
                    <td>mb_substr</td>
                    <td><?php echo $mb_substr; ?></td>
                    <td> <span class="desc">
                        (mbstring拡張庫を必要)
                    </span></td>
                </tr>
            </table>
        </div>
        <div class="check set">
            <table width="100%">
                <tr>
                    <th width="200">経路、ファイル権限check</th>
                    <th width="100">書き込む</th>
                    <th>読み込む</th>
                </tr>
                <?php foreach ($dirctory as $d): ?>
                    <tr>
                        <td><?php echo $d; ?></td>
                        <td><?php echo is_writable('../'.$d) ? '<span class="dir_success">可書き込む</span>' : '<span class="dir_error">不可書き込む</span>'; ?>
                        <td><?php echo is_readable('../'.$d) ? '<span class="dir_success">可読み込む</span>' : '<span class="dir_error">不可読み込む</span>'; ?></td>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>
    </div>
    <!--协议说明-->
    <div class="btn">
        <a href="?step=3">前へ</a><a href="?step=5" onclick="return check_dir();">次へ</a>
    </div>
</div>
</body>
</html>