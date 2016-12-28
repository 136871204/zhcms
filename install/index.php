<?php
error_reporting(0);
$version=require '../zh/Common/Config/version.php';
//网站根目录
define("WEB_PATH", dirname(dirname(str_replace('\\', '/', __FILE__))) . '/');

//框架目录
define("ZHPHP_PATH", WEB_PATH . "/zh/ZHPHP/zhphp/");
//版本号
define("VERSION", $version['ZHCMS_NAME'] . " " . $version['ZHCMS_VERSION']);
header("Content-type:text/html;charset=utf-8");
if (is_file("./lock.php")) {
    echo '
        <html>
            <head>
            <title>ZHCMS注意</title>
            </head>
            <body>
                <div style="background:#FFD896;padding:20px;">ZHCMSすでにインストールました、Install/lock.phpを削除して後、再インストールしてください</div>
            </body>
       </html>
    ';
    exit;
}
$step = array(
    1 => "ZHCMSを利用することを感謝します",
    2 => "正式版ではない",
    3 => "許可協議",
    4 => "インストール環境チェック",
    5 => "パラメータ設置",
    7 => "データインストール",
    8 => "インストール完了！"
);
$s = isset($_GET['step']) ? $_GET['step'] : 1;
switch ($s) {
    case 1:
        require "./template/1.php";
        exit;
    case 2:
        require "./template/2.php";
        break;
    case 3:
        require "./template/3.php";
        break;
    case 4: //环境检测
        $host = $_SERVER["HTTP_HOST"];
        $server = $_SERVER["SERVER_SOFTWARE"];
        $php_version = PHP_VERSION;
        $allow_url_fopen = (ini_get('allow_url_fopen') ? '<span class="dir_success">On</span>' : '<span class="dir_success">Off</span>');
        $safe = (ini_get('safe_mode') ? '<span class="dir_error">Off</span>' : '<span class="dir_success">On</span>');
        $gd = extension_loaded('GD')? '<span class="dir_success">On</span>' : '<span class="dir_error">Off</span>';
		$curl = extension_loaded('CURL')? '<span class="dir_success">On</span>' : '<span class="dir_error">Off</span>';
        $mysqli = function_exists("mysqli_connect") ? '<span class="dir_success">On</span>' : '<span class="dir_error">Off</span>';
        $mb_substr = function_exists("mb_substr") ? '<span class="dir_success">On</span>' : '<span class="dir_error">Off</span>';
        //检测目录
        $dirctory = array(
            "/", //网站根目录
            "data", //数据目录
            "data/config", //配置目录
            "data/config/config.inc.php", //网站配置文件
            "data/config/db.inc.php", //数据库配置文件
            "data/cache/Data", //栏目缓存
            "data/cache/Field", //字段缓存目录
            "data/cache/Js", //js缓存
        );
        require "./template/4.php";
        break;
    case 5: //数据配置
        require "./template/5.php";
        break;
    case 6: //执行安装
        require "./template/6.php";
        break;
    case 7: //安装完成
        //创建锁文件
        touch("lock.php");
        require "./template/7.php";
        break;
    case "check_connect":
        //检测配置
        if (@mysql_connect($_POST['DB_HOST'], $_POST['DB_USER'], $_POST['DB_PASSWORD'])) {
            //数据库不存在时创建数据库
            if (@mysql_select_db($_POST['DB_DATABASE'])) {
                echo 2;
                exit;
            } else {
                mysql_query("CREATE DATABASE " . $_POST['DB_DATABASE'] . " CHARSET UTF8");
                if(!create_install_config()){
                    echo 3;
                    exit;
                }
                echo 1;
                exit;
            }
        } else {
            echo 0;
            exit;
        }
        break;
    case "create_database": //创建数据库
        create_install_config();
        echo 1;
        exit;
        break;
    case "install": //开始安装
        //删除zhcms临时目录temp
        require ZHPHP_PATH . "Extend/Tool/Dir.class.php";
        is_dir("../temp") and Dir::del("../temp");
        $config = require "../data/config/db.inc.php";
        $db_prefix = $config['DB_PREFIX'];
        $db = M();
        //创建结构
        require "tables/structure.php";
        //插入表数据
        foreach (glob("tables/*") as $f) {
            if (preg_match('@\d+.php@', $f)) {
                require $f;
                $table = preg_replace('@(zh_|_bk_\d+\.php)@', "", basename($f));
                return_msg("{$table} 创建完毕...");
            }
        }
        //安装测试数据
        if($config['INSERT_TEST_DATA']){
            foreach (glob("testData/*") as $f) {
                if (preg_match('@\d+.php@', $f)) {
                    require $f;
                    $table = preg_replace('@(zh_|_bk_\d+\.php)@', "", basename($f));
                    return_msg("{$table}数据插入完毕...");
                }
            }
        }
        //密码加密key
        $code = substr(md5(mt_rand() . time()), 0, 10);
        $db->exe("UPDATE {$db_prefix}config SET value='{$config['WEB_NAME']}' WHERE name='WEBNAME'");
        $db->exe("UPDATE {$db_prefix}config SET value='{$config['EMAIL']}' WHERE name='EMAIL'");
        $time = time();
        $ip = ip_get_client();
        $db->exe("REPLACE INTO {$db_prefix}user SET uid=1,rid=1,username='{$config['ADMIN']}',domain='{$config['ADMIN']}',
                nickname='{$config['ADMIN']}',email='{$config['EMAIL']}',regtime={$time},logintime={$time},regip='{$ip}',lastip='{$ip}',
                code='{$code}',password='" . md5($config['PASSWORD'] . $code) . "'");
        unset($config['WEB_NAME']);
        unset($config['EMAIL']);
        unset($config['ADMIN']);
        unset($config['PASSWORD']);
        unset($config['INSERT_TEST_DATA']);
        //修改配置文件
        file_put_contents("../data/config/db.inc.php", "<?php if (!defined('ZHPHP_PATH'))exit('No direct script access allowed');\nreturn " . var_export($config, true) . ";\n?>");
         return_msg("创建完毕!<script>setTimeout(function(){parent.location.href='?step=7'},0);</script>");
        break;
}
function create_install_config()
{
    $VERSION = VERSION;
    $INSERT_TEST_DATA = isset($_POST['INSERT_TEST_DATA'])?1:0;
    $config = <<<str
<?php
if (!defined("ZHPHP_PATH"))exit("No direct script access allowed");
return array(
    "DB_DRIVER"                     => "mysqli",//DBドライバ
    "DB_HOST"                       => "{$_POST['DB_HOST']}",//DBのHost
    "DB_PORT"                       => 3306,//DBのPORT
    "DB_USER"                       => "{$_POST['DB_USER']}",//DBユーザ名
    "DB_PASSWORD"                   => "{$_POST['DB_PASSWORD']}",//DBわすワード
    "DB_DATABASE"                   => "{$_POST['DB_DATABASE']}",//データベース名
    "DB_PREFIX"                     => "{$_POST['DB_PREFIX']}",//テーブルPrefix
    "WEB_MASTER"                    => "{$_POST['ADMIN']}",//サイトマスタ
    "INSERT_TEST_DATA"              => $INSERT_TEST_DATA,//インストールテストデータ
    "VERSION"                       => "{$VERSION}",//ZHCMSバージョン
    "ADMIN"                         => "{$_POST['ADMIN']}",//管理者登録名
    "PASSWORD"                      => "{$_POST['PASSWORD']}",//管理者パスワード
    "WEB_NAME"                      => "{$_POST['WEBNAME']}",//サイト名称
    "EMAIL"                         => "{$_POST['EMAIL']}",//管理者メールアドレス
);
str;
   return file_put_contents("../data/config/db.inc.php", $config);
}

class Db
{
    static $link = null;

    public function __construct()
    {
        if (is_null(self::$link)) {
            global $config;
            mysql_connect($config['DB_HOST'], $config['DB_USER'], $config['DB_PASSWORD']);
            mysql_select_db($config['DB_DATABASE']);
            mysql_query("SET NAMES UTF8");
            self::$link = true;
        }
    }

    function exe($sql)
    {
        global $config;
        $db_prefix = $config['DB_PREFIX'];
        if (!@mysql_query($sql)) {
            echo mysql_error();
        }
        if (preg_match('@CREATE TABLE `@', $sql)) {
            preg_match("@CREATE TABLE `{$db_prefix}(.*?)`@", $sql, $t);
            return_msg("{$t[1]} 表创建完毕...");
        }
    }
}

function M()
{
    return new DB();
}

//向浏览器输出写数据信息
function return_msg($msg)
{
    $len = ini_get("output_buffering");
    echo str_repeat(' ', $len);
    $h = "<span style='color:#555;font-weight: normal;font-size:14px;'>{$msg}</span><br/>";
    $h .= "<script>window.scrollTo(0,9000)</script>";
    echo $h;
    ob_flush();
    flush();
}
function ip_get_client($type = 0)
{
    $type = intval($type);
    $ip = ''; //保存客户端IP地址
    if (isset($_SERVER)) {
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $ip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")) {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $ip = getenv("HTTP_CLIENT_IP");
        } else {
            $ip = getenv("REMOTE_ADDR");
        }
    }
    $long = ip2long($ip);
    $clientIp = $long ? array($ip, $long) : array("0.0.0.0", 0);
    return $clientIp[$type];
}