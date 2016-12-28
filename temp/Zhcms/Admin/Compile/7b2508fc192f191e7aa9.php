<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>会員一覧</title>
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
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <?php if($state==1){?>
                <li><a href="<?php echo U('index');?>" class="action">会員一覧</a></li>
                <li><a href="<?php echo U('add');?>">会員新規</a></li>
            <?php  }else{ ?>
                <li><a href="<?php echo U('index',array('state'=>0));?>" class="action">会員一覧</a></li>
            <?php }?>
            
        </ul>
    </div>
    <table class="table2 zh-form">
        <thead>
        <tr>
            <td class="w30">uid</td>
            <td class="w200">ネックネーム</td>
            <td class="w200">アカウント</td>
            <td class="w150">会員グループ</td>
            <td class="w150">ログイン時間</td>
            <td class="w150">登録IP</td>
            <td class="w150">最近ログインIP</td>
            <td class="w150">積分</td>
            <td class="w150">操作</td>
        </tr>
        </thead>
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

            <tr>
                <td><?php echo $d['uid'];?></td>
                <td><?php echo $d['nickname'];?></td>
                <td><?php echo $d['username'];?></td>
                <td><?php echo $d['rname'];?></td>
                <td><?php echo date('Y-m-d H:i:s',$d['logintime']);?></td>
                <td><?php echo $d['regip'];?></td>
                <td><?php echo $d['lastip'];?></td>
                <td><?php echo $d['credits'];?></td>
                <td>
                    <?php if($state==1){?>
                        <a href="<?php echo U('edit',array('uid'=>$d['uid']));?>">変更</a>
                        <span class="line">|</span>
                        <?php if($d['lock_end_time']<time()){?>
                        	<a href="javascript:;" onclick="zh_ajax('<?php echo U('lock');?>',{uid:<?php echo $d['uid'];?>,lock:1})">
                        	ロック</a>
                        <?php }else{?>
                        	<a href="javascript:;" onclick="zh_ajax('<?php echo U('lock');?>',{uid:<?php echo $d['uid'];?>,lock:0})">
                        		<font color="red">ロック解消</font>	</a>
                        <?php }?>
                        <span class="line">|</span>
                        <a href="<?php echo U('del',array('uid'=>$d['uid']));?>">削除</a>
                    <?php  }else{ ?>
                        <a href="<?php echo U('view',array('uid'=>$d['uid'],'state'=>0));?>">審査</a>
                    <?php }?>
                    
                </td>
            </tr>
        <?php $zh["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </table>
    <div class="h60"></div>
</div>
</body>
</html>