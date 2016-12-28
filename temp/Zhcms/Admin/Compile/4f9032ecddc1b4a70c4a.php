<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>フラグ管理</title>
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
    <link type="text/css" rel="stylesheet" href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Flag/css/css.css"/>
</head>
<body>
<div class="wrap">
	<form id="search" class="zh-form" onsubmit="return false;">
        <div class="search" id="search">
            Model：
            <select name="mid" class="w100">
                <?php $zh["list"]["m"]["total"]=0;if(isset($model) && !empty($model)):$_id_m=0;$_index_m=0;$lastm=min(1000,count($model));
$zh["list"]["m"]["first"]=true;
$zh["list"]["m"]["last"]=false;
$_total_m=ceil($lastm/1);$zh["list"]["m"]["total"]=$_total_m;
$_data_m = array_slice($model,0,$lastm);
if(count($_data_m)==0):echo "";
else:
foreach($_data_m as $key=>$m):
if(($_id_m)%1==0):$_id_m++;else:$_id_m++;continue;endif;
$zh["list"]["m"]["index"]=++$_index_m;
if($_index_m>=$_total_m):$zh["list"]["m"]["last"]=true;endif;?>

                <option value="<?php echo $m['mid'];?>" <?php if($_REQUEST['mid'] == $m['mid']){?>selected=''<?php }?>><?php echo $m['model_name'];?></option>
                <?php $zh["list"]["m"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
            </select>
        </div>
    </form>
    <script>
        $("[name='mid']").change(function(){
        	var mid = $(this).val();
           location.href="<?php echo U('index');?>&mid="+mid;
        })
    </script>
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">フラグ管理</a></li>
            <li><a href="<?php echo U('add',array('mid'=>$_REQUEST['mid']));?>">フラグ新規</a></li>
            <li><a href="javascript:zh_ajax('<?php echo U(updateCache);?>',{mid:<?php echo $_REQUEST['mid'];?>})">キャッシュ更新</a></li>
        </ul>
    </div>
    <form action="<?php echo U('edit');?>" method="post" id="edit_form" class="zh-form" onsubmit="return zh_submit(this);">
    	<input type="hidden" name="mid" value="<?php echo $_REQUEST['mid'];?>" />
        <table class="table2">
            <thead>
            <tr>
                <td class="w30">fid</td>
                <td>フラグ名称</td>
                <td width="50">操作</td>
            </tr>
            </thead>
            <tbody>
            <?php $zh["list"]["name"]["total"]=0;if(isset($flag) && !empty($flag)):$_id_name=0;$_index_name=0;$lastname=min(1000,count($flag));
$zh["list"]["name"]["first"]=true;
$zh["list"]["name"]["last"]=false;
$_total_name=ceil($lastname/1);$zh["list"]["name"]["total"]=$_total_name;
$_data_name = array_slice($flag,0,$lastname);
if(count($_data_name)==0):echo "";
else:
foreach($_data_name as $key=>$name):
if(($_id_name)%1==0):$_id_name++;else:$_id_name++;continue;endif;
$zh["list"]["name"]["index"]=++$_index_name;
if($_index_name>=$_total_name):$zh["list"]["name"]["last"]=true;endif;?>

                <tr>
                    <td class="w100">
                        <?php echo $name;?>
                    </td>
                    <td>
                        <input type="text" name="flag[]" value="<?php echo $name;?>"/>
                    </td>
                    <td>
                            <a href="javascript:;"
                               onclick="if(confirm('フラグ削除しますか？'))zh_ajax('<?php echo U(del);?>',{mid:<?php echo $_GET['mid'];?>,number:<?php echo $zh['list']['name']['index'] - 1; ?>})">削除
                               </a>
                    </td>
                </tr>
            <?php $zh["list"]["name"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
            </tbody>
        </table>
        <div class="position-bottom">
            <input type="submit" class="zh-success" id="updateSort" value="変更"/>
        </div>
    </form>
</div>
</body>
</html>