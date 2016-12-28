<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
<head>
    <title>私の文章</title>
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
    <link href='http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/css/bootstrap.min.css' rel='stylesheet' media='screen'>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/js/bootstrap.min.js'></script>
                <!--[if lte IE 6]>
                <link rel="stylesheet" type="text/css" href="http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
                <![endif]-->
                <!--[if lt IE 9]>
                <script src="http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/js/html5shiv.min.js"></script>
                <script src="http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/js/respond.min.js"></script>
                <![endif]-->
    <link rel="stylesheet" type="text/css" href="http://www.metacms.com/zh/Zhcms/Member/Tpl/Content/css/article-list.css?ver=1.0"/>
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
    <section class="article">
        <header>
            <h2> 私の文章
                <a href="javascript:;" onclick="zh_open_window('<?php echo U('selectCategory',array('mid'=>$_GET['mid']));?>')"
                   class="send">発表</a>
            </h2>

        </header>
        <ul>
            <?php $zh["list"]["d"]["total"]=0;if(isset($data) && !empty($data)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($data));
$zh["list"]["d"]["first"]=true;
$zh["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$zh["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($data,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$zh["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$zh["list"]["d"]["last"]=true;endif;?>

                <li>
                    <div class="article">
                        <a href="<?php echo U('Index/Index/content',array(mid=>$d['mid'],cid=>$d['cid'],aid=>$d['aid']));?>" target="_blank" class="title">
                            <?php echo mb_substr($d['title'],0,35,'utf-8');?>
                        </a>
                        <a href="<?php echo U('Index/Index/category',array(cid=>$d['cid']));?>" target="_blank" class="category" style="display: inline-block;">
                            <?php echo $d['catname'];?>
                            <span class="time">
                        <?php echo date('Y-m-d H:i:s',$d['updatetime']);?>
                    </span>
                        </a>
                        <a href="javascript:;" onclick="zh_open_window('<?php echo U('add',array('mid'=>$d['mid'],'cid'=>$d['cid']));?>')" style="display: inline-block;">
                            	発表
                            </a>
                    </div>
                    <div class="right-action">
                        <a href="javascript:;" onclick="zh_open_window('<?php echo U('edit',array('mid'=>$d['mid'],'cid'=>$d['cid'],'aid'=>$d['aid']));?>')" class="btn btn-default btn-sm">修正</a>
                        <a href="javascript:if(confirm('削除しますか？')){zh_ajax('<?php echo U('del',array('mid'=>$d['mid'],'cid'=>$d['cid'],'aid'=>$d['aid']));?>');}" class="btn btn-default btn-sm">削除</a>
                    </div>
                </li>
            <?php $zh["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
        </ul>
    </section>
    <div class="page1 h30">
        <?php echo $page;?>
    </div>
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