<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title><?php echo L("admin_administrator_index_page_title");?></title>
    <script type='text/javascript' src='http://www.works.com/zh/ZHPHP/zhphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://www.works.com/zh/ZHPHP/zhphp/../zhjs/css/zhjs.css' rel='stylesheet' media='screen'>
<script src='http://www.works.com/zh/ZHPHP/zhphp/../zhjs/js/zhjs.js'></script>
<script src='http://www.works.com/zh/ZHPHP/zhphp/../zhjs/js/slide.js'></script>
<script src='http://www.works.com/zh/ZHPHP/zhphp/../zhjs/org/cal/lhgcalendar.min.js'></script>
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
    <link type="text/css" rel="stylesheet" href="http://www.works.com/zh/Zhcms/Admin/Tpl/Administrator/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action"><?php echo L("admin_administrator_index_page_tab1");?></a></li>
            <li><a href="<?php echo U('add');?>"><?php echo L("admin_administrator_index_page_tab2");?></a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td width="30"><?php echo L("admin_administrator_index_page_table_column_header1");?></td>
            <td><?php echo L("admin_administrator_index_page_table_column_header2");?></td>
            <td><?php echo L("admin_administrator_index_page_table_column_header3");?></td>
            <td><?php echo L("admin_administrator_index_page_table_column_header4");?></td>
            <td><?php echo L("admin_administrator_index_page_table_column_header5");?></td>
            <td><?php echo L("admin_administrator_index_page_table_column_header6");?></td>
            <td><?php echo L("admin_administrator_index_page_table_column_header7");?></td>
            <td width="100"><?php echo L("admin_administrator_index_page_table_column_header8");?></td>
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
                    <a href="<?php echo U('edit',array('uid'=>$a['uid']));?>"><?php echo L("admin_administrator_index_page_table_operator1");?></a>|
                    <a href="javascript:confirm('<?php echo L("admin_administrator_index_page_confirm1");?>')?zh_ajax('<?php echo U('del');?>',{'uid':<?php echo $a['uid'];?>}):void(0);"><?php echo L("admin_administrator_index_page_table_operator2");?></a>
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