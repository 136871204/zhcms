<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
<head>
    <title>資料変更</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type='text/javascript' src='http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/css/zhjs.css' rel='stylesheet' media='screen'>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/js/zhjs.js'></script>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/js/slide.js'></script>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
HOST = '<?php echo $GLOBALS['user']['HOST'];?>';
ROOT = '<?php echo $GLOBALS['user']['ROOT'];?>';
WEB = '<?php echo $GLOBALS['user']['WEB'];?>';
URL = '<?php echo $GLOBALS['user']['URL'];?>';
ZHPHP = '<?php echo $GLOBALS['user']['ZHPHP'];?>';
ZHPHPDATA = '<?php echo $GLOBALS['user']['ZHPHPDATA'];?>';
ZHPHPTPL = '<?php echo $GLOBALS['user']['ZHPHPTPL'];?>';
ZHPHPEXTEND = '<?php echo $GLOBALS['user']['ZHPHPEXTEND'];?>';
APP = '<?php echo $GLOBALS['user']['APP'];?>';
CONTROL = '<?php echo $GLOBALS['user']['CONTROL'];?>';
METH = '<?php echo $GLOBALS['user']['METH'];?>';
GROUP = '<?php echo $GLOBALS['user']['GROUP'];?>';
TPL = '<?php echo $GLOBALS['user']['TPL'];?>';
CONTROLTPL = '<?php echo $GLOBALS['user']['CONTROLTPL'];?>';
STATIC = '<?php echo $GLOBALS['user']['STATIC'];?>';
PUBLIC = '<?php echo $GLOBALS['user']['PUBLIC'];?>';
HISTORY = '<?php echo $GLOBALS['user']['HISTORY'];?>';
TEMPLATE = '<?php echo $GLOBALS['user']['TEMPLATE'];?>';
ROOTURL = '<?php echo $GLOBALS['user']['ROOTURL'];?>';
WEBURL = '<?php echo $GLOBALS['user']['WEBURL'];?>';
CONTROLURL = '<?php echo $GLOBALS['user']['CONTROLURL'];?>';
PHPSELF = '<?php echo $GLOBALS['user']['PHPSELF'];?>';
</script>
    <jcrop/>
    <link href='http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/css/bootstrap.min.css' rel='stylesheet' media='screen'>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/js/bootstrap.min.js'></script>
                <!--[if lte IE 6]>
                <link rel="stylesheet" type="text/css" href="http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
                <![endif]-->
                <!--[if lt IE 9]>
                <script src="http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/js/html5shiv.min.js"></script>
                <script src="http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/js/respond.min.js"></script>
                <![endif]-->
    <link rel="stylesheet" type="text/css" href="http://www.metacms.com/zh/Zhcms/Member/Tpl/Profile/css/user.css?ver=1.0"/>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Member/Tpl/Profile/js/cropFace.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Member/Tpl/Profile/uploadify/jquery.uploadify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://www.metacms.com/zh/Zhcms/Member/Tpl/Profile/uploadify/uploadify.css"/>
    <script type='text/javascript'>
                    	var ROOT='<?php echo ROOT_URL;?>';var WEB='<?php echo WEB_URL;?>';var CONTROL='<?php echo CONTROL_URL;?>';
                	</script><script type='text/javascript' src='http://www.metacms.com/zh/Common/static/js/zhcms.js'></script>

                <link rel='stylesheet' type='text/css' href='http://www.metacms.com/zh/Common/static/css/zhcms.css?ver=1.0'/>

</head>
<body>
<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><header class="header center-block">
    <h1>
        <a href="http://www.metacms.com">metaphase</a>
    </h1>
</header>
<nav class="top-menu">
    <div class="nav center-block">
        <a href="http://www.metacms.com">トップ</a>
        <a href="http://www.metacms.com/index.php?a=Member&c=Content&m=index&mid=1">私の文章</a>
        <a href="http://www.metacms.com/<?php echo $_SESSION['domain'];?>" target="_blank">マイスペース</a>
        <a href="http://www.metacms.com/index.php?a=Member&c=Login&m=quit" class="pull-right">ログアウト</a>
    </div>
</nav>
<article class="center-block main">
<!--左侧导航start-->
<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><section class="menu">
    <div class="center-block user">
        <a href="http://www.metacms.com/index.php?<?php echo $_SESSION['domain'];?>" target="_blank">
            <img src="<?php echo $_SESSION['icon150'];?>" onmouseover="user.show(this,<?php echo $_SESSION['uid'];?>)" style="width:150px;150px;"/>
        </a>
        <p class="nickname">
            <span class="glyphicon glyphicon-user"></span> <b><?php echo $_SESSION['nickname'];?></b></p>
        <p class="edit-nickname" data-toggle="modal" data-target="#myModal">
            <span class="glyphicon glyphicon-cog"></span> ネックネーム変更
        </p>
        <p>
            金&nbsp;&nbsp;&nbsp; 貨：<?php echo $_SESSION['credits'];?> <br/>
        </p>
        <p>
            会員組：<?php echo $_SESSION['rname'];?> <br/>
        </p>
        <!--修改昵称 start--->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"  >
                <div class="modal-content" style="height:200px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">ネックネーム変更</h4>
                    </div>
                    <div class="modal-body" style="margin-left: 100px;margin-top:20px;">
                        <form method="post" class="zh-form" id="edit_nickname" onsubmit="return false;">
                            <input type="text" name="nickname" value="<?php echo $_SESSION['nickname'];?>" class="h40 w300"/>
                            <button type="submit" class="btn btn-primary">保存</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <script>
            //修改昵称
            $("#edit_nickname").submit(function(){
                var nickname = $.trim($("input[name=nickname]").val());
                if(!nickname){
                    alert('ネックネームは必須');
                    return false;
                }
                $('#myModal').modal('hide');
                $.post("<?php echo U('Profile/editNickname');?>",$(this).serialize(),function(data){
                    if(data.state==1){
                        $('p.nickname b').html(nickname);
                        $('input[name=nickname]').val(nickname);
                    }
                },'json')
            })
        </script>
        <!--修改昵称 end--->
    </div>
    <nav>
        <a href="http://www.metacms.com/index.php?a=Member&c=Dynamic&m=index">
            <span class="glyphicon glyphicon-share"></span>
            会員動態
        </a>
        <a href="http://www.metacms.com/index.php?a=Member&c=Profile&m=edit">
            <span class="glyphicon glyphicon-fire"></span>
            資料修正
        </a>
        <?php
            $model = cache('model');
            foreach($model as $m):
        ?>
        <a href="http://www.metacms.com/index.php?a=Member&c=Content&m=index&mid=<?php echo $m['mid'];?>">
            <span class="glyphicon glyphicon-book"></span>
            <?php echo $m['model_name'];?>
        </a>
        <?php endforeach;?>
        <a href="http://www.metacms.com/index.php?a=Member&c=SystemMessage&m=index">
            <span class="glyphicon glyphicon-comment"></span>
            システムメッセージ
            <span class="badge"><?php echo $systemmessage_count;?></span>
        </a>
        <a href="http://www.metacms.com/index.php?a=Member&c=Message&m=index">
            <span class="glyphicon glyphicon-comment"></span>
            私のメッセージ
            <span class="badge"><?php echo $message_count;?></span>
        </a>
        <a href="http://www.metacms.com/index.php?a=Member&c=Favorite&m=index">
            <span class="glyphicon glyphicon-folder-open"></span>
            私のカード
        </a>
        <a href="http://www.metacms.com/index.php?a=Member&c=Follow&m=fans_list">
            <span class="glyphicon glyphicon-send"></span>
            私のファン
        </a><a href="http://www.metacms.com/index.php?a=Member&c=Follow&m=follow_list">
            <span class="glyphicon glyphicon-tower"></span>
            私の注目
        </a>
    </nav>
</section>
<!--左侧导航end-->
<section class="edit-user">
    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#edit-base" data-toggle="tab">基本情報</a></li>
            <li><a href="#edit-password" data-toggle="tab">パスワード変更</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="edit-base">
                <form id="form_message" action="<?php echo U('edit_message');?>" method="post"
                      onsubmit="return zh_submit(this,'<?php echo U('edit');?>')">
                    <table>
                        <tr>
                            <th>
                                <img src="<?php echo $_SESSION['icon150'];?>" class="face"/>
                            </th>
                            <td class="field" colspan="2">
                                <textarea name="signature" style="height: 100px;" placeholder="サインを入力"><?php echo $field['signature'];?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>個性ドメイン</th>
                            <td class="field">
                                http://www.metacms.com?<input type="text" name="domain" value="<?php echo $field['domain'];?>"/>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td class="field">
                                <input type="submit" class="btn btn-primary" value="確認"/>
                            </td>
                            <td>

                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            
            <div class="tab-pane" id="edit-password">
                <form id="form_password" action="<?php echo U('edit_password');?>" onsubmit="return zh_submit(this)">
                    <table>
                        <tr>
                            <th class="w200">今のパスワード</th>
                            <td class="field">
                                <input type="password" name="oldpassword"/>
                            </td>
                            <td class="w200">
                                <span id="zh_oldpassword"></span>
                            </td>
                        </tr>
                        <tr>
                            <th>新しいパスワード</th>
                            <td class="field">
                                <input type="password" name="password"/>
                            </td>
                            <td>
                                <span id="zh_password"></span>
                            </td>
                        </tr>
                        <tr>
                            <th>パスワード再確認</th>
                            <td class="field">
                                <input type="password" name="passwordc"/>
                            </td>
                            <td>
                                <span id="zh_passwordc"></span>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td class="field">
                                <input type="submit" class="btn btn-primary" value="確認"/>
                            </td>
                            <td>

                            </td>
                        </tr>
                    </table>
                </form>
                <script>
                    $("#form_message").validate({
                        domain: {
                            rule: {
                                required: true,
                                regexp:/[a-z0-9]/i,
                                ajax: CONTROL + '&m=check_domain'
                            },
                            error: {
                                required: "必須",
                                regexp:'アルファベットと数値で入力してください',
                                ajax: '個性ドメインはすでに使われている'
                            },
                            success: '入力正しい',
                            message:'アルファベット　或いは　数値で入力'
                        }
                    });
                    $("#form_password").validate({
                        oldpassword: {
                            rule: {
                                required:true,
                                ajax: CONTROL + '&m=check_password'
                            },
                            error: {
                                required:'必須',
                                ajax: '今のパスワードは正しくない'
                            },
                            success: '入力正しい'
                        },
                        password: {
                            rule: {
                                required:true,
                            },
                            error: {
                                required:'必須',
                            },
                            success: '入力正しい'
                        },
                        passwordc: {
                            rule: {
                                confirm: 'password'
                            },
                            error: {
                                confirm: '二回入力したパスワードは不一致'
                            }
                        }
                    })
                </script>
            </div>
        </div>
    </div>
</section>
</article>
<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><footer class="container">
    <nav>
        <a href="http://metaphase.co.jp">metaphaseサイト</a>
        <a href="http://metaphase.co.jp">ZHPHPフレーム</a>
    </nav>
    <?php echo C("COPYRIGHT");?><a href="#"><?php echo C("ICP");?></a>
</footer>
</body>
</html>