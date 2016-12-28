<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>在线咨询管理</title>
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
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Contact/js/js.js"></script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
                <li><a href="<?php echo U('index');?>" class="action">在线咨询一覧</a></li>
        </ul>
    </div>
    <table class="table2 zh-form">
        <thead>
        <tr>
            <td class="w30">id</td>
            <td class="w100">姓名</td>
            <td class="w200">邮箱</td>
            <td class="w200">标题</td>
            <td class="w150">处理状态</td>
            <td class="w150">咨询时间</td>
            <td class="w150">操作</td>
        </tr>
        </thead>
        <?php $zh["list"]["b"]["total"]=0;if(isset($contact) && !empty($contact)):$_id_b=0;$_index_b=0;$lastb=min(1000,count($contact));
$zh["list"]["b"]["first"]=true;
$zh["list"]["b"]["last"]=false;
$_total_b=ceil($lastb/1);$zh["list"]["b"]["total"]=$_total_b;
$_data_b = array_slice($contact,0,$lastb);
if(count($_data_b)==0):echo "";
else:
foreach($_data_b as $key=>$b):
if(($_id_b)%1==0):$_id_b++;else:$_id_b++;continue;endif;
$zh["list"]["b"]["index"]=++$_index_b;
if($_index_b>=$_total_b):$zh["list"]["b"]["last"]=true;endif;?>

            <tr>
                <td><?php echo $b['id'];?></td>
                <td><?php echo $b['name'];?></td>
                <td><?php echo $b['email'];?></td>
                <td><?php echo mb_substr($b['subject'],0,36,'utf8');?></td>
                <td><?php echo $b['status_show'];?></td>
                <td><?php echo date('Y-m-d',$b['addtime']);?></td>
                <td>
				    <a href="<?php echo U('edit',array('id'=>$b['id']));?>">
				        修正
				    </a>|
                    <a href="javascript:confirm('削除しますか')?zh_ajax('<?php echo U(del);?>',{brand_id:<?php echo $b['brand_id'];?>}):void(0);">削除</a>

                </td>
            </tr>
        <?php $zh["list"]["b"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </table>
    <div class="page1">
        <?php echo $page;?>
    </div>
    <div class="h60"></div>
</div>
</body>
</html>