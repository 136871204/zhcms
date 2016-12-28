<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>管理者管理</title>
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
    <link type="text/css" rel="stylesheet" href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Administrator/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">一覧</a></li>
            <li><a href="<?php echo U('add');?>">新規</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td width="30">aid</td>
            <td>ユーザ名</td>
            <td>所属役</td>
            <td>登録IP</td>
            <td>登録時間</td>
            <td>ネックネーム</td>
            <td>メールアドレス</td>
            <td width="100">操作</td>
        </tr>
        </thead>
        <tbody>
        <?php $zh["list"]["a"]["total"]=0;if(isset($data) && !empty($data)):$_id_a=0;$_index_a=0;$lasta=min(1000,count($data));
$zh["list"]["a"]["first"]=true;
$zh["list"]["a"]["last"]=false;
$_total_a=ceil($lasta/1);$zh["list"]["a"]["total"]=$_total_a;
$_data_a = array_slice($data,0,$lasta);
if(count($_data_a)==0):echo "";
else:
foreach($_data_a as $key=>$a):
if(($_id_a)%1==0):$_id_a++;else:$_id_a++;continue;endif;
$zh["list"]["a"]["index"]=++$_index_a;
if($_index_a>=$_total_a):$zh["list"]["a"]["last"]=true;endif;?>

            <tr>
                <td width="30"><?php echo $a['uid'];?></td>
                <td><?php echo $a['username'];?></td>
                <td><?php echo $a['rname'];?></td>
                <td><?php echo $a['lastip'];?></td>
                <td><?php echo $a['logintime'];?></td>
                <td><?php echo $a['nickname'];?></td>
                <td><?php echo $a['email'];?></td>
                <td>
                    <a href="<?php echo U('edit',array('uid'=>$a['uid']));?>">変更</a>|
                    <a href="javascript:confirm('削除しますか？')?zh_ajax('<?php echo U('del');?>',{'uid':<?php echo $a['uid'];?>}):void(0);">削除</a>
                </td>
            </tr>
        <?php $zh["list"]["a"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
        </tbody>
    </table>
</div>
</body>
</html>