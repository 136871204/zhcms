<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php echo L("admin_plugin_list_page_title");?></title>
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
            <li>
                <a class="action" href="<?php echo U('plugin_list');?>"><?php echo L("admin_plugin_list_page_tab1");?></a>
            </li>
        </ul>
    </div>
    <table class="table2 zh-form">
        <thead>
        <tr>
            <td><?php echo L("admin_plugin_list_page_table_th1");?></td>
            <td class="w150"><?php echo L("admin_plugin_list_page_table_th2");?></td>
            <td class="w150"><?php echo L("admin_plugin_list_page_table_th3");?></td>
            <td class="w150"><?php echo L("admin_plugin_list_page_table_th4");?></td>
            <td class="w150"><?php echo L("admin_plugin_list_page_table_th5");?></td>
            <td class="w100"><?php echo L("admin_plugin_list_page_table_th6");?></td>
            <td class="w50"><?php echo L("admin_plugin_list_page_table_th7");?></td>
        </tr>
        </thead>
        <tbody>
        <?php $zh["list"]["p"]["total"]=0;if(isset($plugin) && !empty($plugin)):$_id_p=0;$_index_p=0;$lastp=min(1000,count($plugin));
$zh["list"]["p"]["first"]=true;
$zh["list"]["p"]["last"]=false;
$_total_p=ceil($lastp/1);$zh["list"]["p"]["total"]=$_total_p;
$_data_p = array_slice($plugin,0,$lastp);
if(count($_data_p)==0):echo "";
else:
foreach($_data_p as $key=>$p):
if(($_id_p)%1==0):$_id_p++;else:$_id_p++;continue;endif;
$zh["list"]["p"]["index"]=++$_index_p;
if($_index_p>=$_total_p):$zh["list"]["p"]["last"]=true;endif;?>

            <tr>
                <td><?php echo $p['name'];?></td>
                <td><?php echo $p['version'];?></td>
                <td><?php echo $p['pubdate'];?></td>
                <td><?php echo $p['team'];?></td>
                <td>
                	<?php if($p['installed'] == 1){?>
                		<font color='green'>install OK</font>
						<a href='http://www.metacms.com/index.php?a=Admin&c=Plugin&m=uninstall&plugin=<?php echo $p['dirname'];?>' style='color:green'>
						<u>uninstall</u>
						</a>
                		<?php  }else{ ?>
                		no install
 					<a href='http://www.metacms.com/index.php?a=Admin&c=Plugin&m=install&plugin=<?php echo $p['dirname'];?>'><u>install</u></a>
                	<?php }?>
                </td>
                <td><?php echo $p['app'];?></td>
                <td>
                    <a href="<?php echo U('Plugin/help',array('plugin'=>$p['app']));?>"><?php echo L("admin_plugin_list_page_table_td_message1");?></a>
                </td>
            </tr>
        <?php $zh["list"]["p"]["first"]=false;
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