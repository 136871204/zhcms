<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title><?php echo L("admin_node_add_page_title");?></title>
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
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Node/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://www.works.com/zh/Zhcms/Admin/Tpl/Node/css/css.css"/>
    <script>
    var admin_node_js_check_message1='<?php echo L("admin_node_js_check_message1");?>';
    var admin_node_js_update_order_error1='<?php echo L("admin_node_js_update_order_error1");?>';
    </script>
</head>
<body>
<form action="<?php echo U('add');?>" method="post" class="zh-form" onsubmit="return zh_submit(this,'<?php echo U(index);?>')">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="<?php echo U('index');?>"><?php echo L("admin_node_add_page_tab1");?></a></li>
                <li><a href="javascript:;" class="action"><?php echo L("admin_node_add_page_tab2");?></a></li>
                <li><a href="javascript:zh_ajax('<?php echo U(update_cache);?>');"><?php echo L("admin_node_add_page_tab3");?></a></li>
            </ul>
        </div>
        <div class="title-header"><?php echo L("admin_node_add_page_table_header");?></div>
        <table class="table1">
            <tr>
                <td class="w100"><?php echo L("admin_node_add_page_table_item1");?>:</td>
                <td>
                    <select name="pid">
                        <option value="0"><?php echo L("admin_node_add_page_table_item1_show1");?></option>
                        <?php $zh["list"]["n"]["total"]=0;if(isset($node) && !empty($node)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($node));
$zh["list"]["n"]["first"]=true;
$zh["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$zh["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($node,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$zh["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$zh["list"]["n"]["last"]=true;endif;?>

                                <option value="<?php echo $n['nid'];?>" <?php if($n['nid']==$_GET['pid']){?>selected="selected"<?php }?>><?php echo $n['_name'];?></option>
                        <?php $zh["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><?php echo L("admin_node_add_page_table_item2");?>:</td>
                <td>
                    <input type="text" name="title" class="w200"/>
                </td>
            </tr>
            <tr>
                <td class="w100"><?php echo L("admin_node_add_page_table_item3");?>:</td>
                <td>
                    <input type="text" name="app" class="w200"/>
                </td>
            </tr>
            <tr>
                <td><?php echo L("admin_node_add_page_table_item4");?>:</td>
                <td>
                    <input type="text" name="control" class="w200"/>
                </td>
            </tr>
            <tr>
                <td><?php echo L("admin_node_add_page_table_item5");?>:</td>
                <td>
                    <input type="text" name="method" class="w200"/>
                </td>
            </tr>
            <tr>
                <td><?php echo L("admin_node_add_page_table_item6");?>:</td>
                <td>
                    <input type="text" name="param" class="w300"/>
                    <span class="message">例:cid=1&mid=2</span>
                </td>
            </tr>
            <tr>
                <td><?php echo L("admin_node_add_page_table_item7");?>:</td>
                <td>
                    <textarea name="comment" class="w350 h100"></textarea>
                </td>
            </tr>
            <tr>
                <td><?php echo L("admin_node_add_page_table_item8");?>:</td>
                <td>
                    <label><input type="radio" name="state" value="1" checked="checked"/> <?php echo L("admin_node_add_page_table_item8_show1");?></label>
                    <label><input type="radio" name="state" value="0"/> <?php echo L("admin_node_add_page_table_item8_show2");?></label>
                </td>
            </tr>
            <tr>
                <td><?php echo L("admin_node_add_page_table_item9");?>:</td>
                <td>
                    <select name="type">
                        <option value="1"><?php echo L("admin_node_add_page_table_item9_show1");?></option>
                        <option value="2"><?php echo L("admin_node_add_page_table_item9_show2");?></option>
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <div class="position-bottom">
        <input type="submit" class="zh-success" value="<?php echo L("admin_node_add_page_form_submit");?>"/>
    </div>
</form>
</body>
</html>