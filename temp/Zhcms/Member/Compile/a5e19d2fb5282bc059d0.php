<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
<head>
    <title><?php echo C("webname");?></title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type='text/javascript' src='http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>

    <link href='http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/css/bootstrap.min.css' rel='stylesheet' media='screen'>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/js/bootstrap.min.js'></script>
                <!--[if lte IE 6]>
                <link rel="stylesheet" type="text/css" href="http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
                <![endif]-->
                <!--[if lt IE 9]>
                <script src="http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/js/html5shiv.min.js"></script>
                <script src="http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/js/respond.min.js"></script>
                <![endif]-->
    <link rel="stylesheet" type="text/css" href="http://www.metacms.com/zh/Zhcms/Member/Tpl/Login/css/reg.css?ver=1.0"/>
    <script>
        $(function () {
            var error = '<?php echo $error;?>';
            if (error) {
                $("div#error_tips").show().html(error);
                setTimeout(function(){ $("div#error_tips").hide().html('')},5000);
            }
        })
    </script>
</head>
<body>
<div class="header container">
    <a href="http://www.metacms.com">
        Metaphase
    </a>
</div>
<div class="content container">
    <header>
        <span>会員登録</span>

        <p>METACMSを体験して、真に感謝します，metaphase！</p>
        <strong>お客サポートメール <a href="mailto:<?php echo C("email");?>"><?php echo C("email");?></a></strong>
    </header>
    <article class="row">
        <div class="field col-md-8">
            <div id="error_tips" class="alert alert-warning " style="display: none"></div>
            <form class="form-horizontal" role="form" method="post" action="http://www.metacms.com/index.php?a=Member&c=Login&m=reg">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">アカウント：</label>
                    <div class="col-sm-7">
                        <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="アカウント入力" title='アルファベットと数値で5文字以上' pattern=".{3,}" required=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">メールアドレス：</label>
                    <div class="col-sm-7">
                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">パスワード：</label>
                    <div class="col-sm-7">
                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">パスワード確認：</label>
                    <div class="col-sm-7">
                        <input type="password" name="passwordc" class="form-control" id="inputPassword3" placeholder="Password" required=""/>
                    </div>
                </div>
                <?php if(C('REG_SHOW_CODE')):?>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">検証番号：</label>
                    <div class="col-sm-7">
                        <input type="text" name="code" class="form-control" placeholder="検証番号" required=""/><br/>
                        <img src="http://www.metacms.com/index.php?a=Member&c=Login&m=code" style="cursor: pointer" onclick="this.src='http://www.metacms.com/index.php?a=Member&c=Login&m=code&_'+Math.random()"/>
                    </div>
                </div>
                <?php endif;?>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" class="btn btn-primary btn-lg">会員登録</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="field col-md-4">
            > アカウントが持っている？ <a href="http://www.metacms.com/index.php?a=Member&c=Login&m=login">すぐログイン</a>
        </div>
    </article>
</div>
</body>
</html>