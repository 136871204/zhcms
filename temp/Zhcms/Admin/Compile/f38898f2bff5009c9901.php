<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>権限設置</title>
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
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Access/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Access/css/css.css"/>
</head>
<body>
<form action="<?php echo U('edit');?>" method="post" class="zh-form" onsubmit="return zh_submit(this,'<?php echo U('Role/index');?>')">
    <input type="hidden" name="rid" value="<?php echo $rid;?>"/>

    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="<?php echo U('Role/index');?>">管理者役一覧</a></li>
                <li><a href="javascript:;" class="action">権限設置</a></li>
            </ul>
        </div>
        <div class="access">
            <ul>
                <?php $zh["list"]["a"]["total"]=0;if(isset($access) && !empty($access)):$_id_a=0;$_index_a=0;$lasta=min(1000,count($access));
$zh["list"]["a"]["first"]=true;
$zh["list"]["a"]["last"]=false;
$_total_a=ceil($lasta/1);$zh["list"]["a"]["total"]=$_total_a;
$_data_a = array_slice($access,0,$lasta);
if(count($_data_a)==0):echo "";
else:
foreach($_data_a as $key=>$a):
if(($_id_a)%1==0):$_id_a++;else:$_id_a++;continue;endif;
$zh["list"]["a"]["index"]=++$_index_a;
if($_index_a>=$_total_a):$zh["list"]["a"]["last"]=true;endif;?>

                    <li class="li1">
                        <h3> <?php echo $a['checkbox'];?></h3>
                        <?php if ($a['_data']): ?>
                            <ul class="level2">
                                <?php $zh["list"]["b"]["total"]=0;if(isset($a['_data']) && !empty($a['_data'])):$_id_b=0;$_index_b=0;$lastb=min(1000,count($a['_data']));
$zh["list"]["b"]["first"]=true;
$zh["list"]["b"]["last"]=false;
$_total_b=ceil($lastb/1);$zh["list"]["b"]["total"]=$_total_b;
$_data_b = array_slice($a['_data'],0,$lastb);
if(count($_data_b)==0):echo "";
else:
foreach($_data_b as $key=>$b):
if(($_id_b)%1==0):$_id_b++;else:$_id_b++;continue;endif;
$zh["list"]["b"]["index"]=++$_index_b;
if($_index_b>=$_total_b):$zh["list"]["b"]["last"]=true;endif;?>

                                    <li class="li2">
                                        <h4> <?php echo $b['checkbox'];?></h4>
                                        <?php if ($b['_data']): ?>
                                            <ul class="level3">
                                                <?php $zh["list"]["c"]["total"]=0;if(isset($b['_data']) && !empty($b['_data'])):$_id_c=0;$_index_c=0;$lastc=min(1000,count($b['_data']));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($b['_data'],0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                                                    <li>
                                                        <?php echo $c['checkbox'];?>
                                                    </li>
                                                <?php $zh["list"]["a"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php $zh["list"]["b"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
            </ul>
        </div>

    </div>
    <div class="position-bottom">
        <input type="submit" class="zh-success" value="確定"/>
    </div>
</form>
</body>
</html>