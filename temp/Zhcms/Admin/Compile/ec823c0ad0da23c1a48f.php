<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>文件管理</title>
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
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/ContentUpload/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/ContentUpload/css/css.css"/>
    <script>
        <?php echo $get;?>
    </script>
</head>
<body>
<div class="wrap">
    <div class="tab">
        <ul class="tab_menu">
            <li lab="upload"><a href="#">上传文件</a></li>
            <li lab="site"><a href="#">站内文件</a></li>
            <li lab="untreated"><a href="#">未使用文件</a></li>
        </ul>
        <div class="tab_content">
            <div id="upload" style="padding: 5px;">
                <?php echo $upload;?>
            </div>
            <div id="site" class="pic_list">
                <div class="site_pic">
                    <ul>
                        <?php $zh["list"]["f"]["total"]=0;if(isset($site_data) && !empty($site_data)):$_id_f=0;$_index_f=0;$lastf=min(1000,count($site_data));
$zh["list"]["f"]["first"]=true;
$zh["list"]["f"]["last"]=false;
$_total_f=ceil($lastf/1);$zh["list"]["f"]["total"]=$_total_f;
$_data_f = array_slice($site_data,0,$lastf);
if(count($_data_f)==0):echo "";
else:
foreach($_data_f as $key=>$f):
if(($_id_f)%1==0):$_id_f++;else:$_id_f++;continue;endif;
$zh["list"]["f"]["index"]=++$_index_f;
if($_index_f>=$_total_f):$zh["list"]["f"]["last"]=true;endif;?>

                            <li class="upload_thumb">
                                <img src="<?php if($f['image'] == 1){?>http://www.metacms.com/<?php echo $f['path'];?><?php  }else{ ?>http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/Uploadify/default.png<?php }?>" path="<?php echo $f['path'];?>"/>
                                <input style="padding:3px 0px;width:84px" type="text" name="zhcms[][alt]"
                                       value="<?php echo $f['name'];?>" onblur="if(this.value=='')this.value='<?php echo $f['name'];?>'"
                                       onfocus="this.value=''">
                                <input type="hidden" name="table_id" value="<?php echo $f['id'];?>"/>
                            </li>
                        <?php $zh["list"]["f"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </ul>
                </div>
                <div class="page1">
                    <?php echo $site_page;?>
                </div>
            </div>
            <div id="untreated" class="pic_list">
                <div class="site_pic">
                    <ul>
                        <?php $zh["list"]["f"]["total"]=0;if(isset($untreated_data) && !empty($untreated_data)):$_id_f=0;$_index_f=0;$lastf=min(1000,count($untreated_data));
$zh["list"]["f"]["first"]=true;
$zh["list"]["f"]["last"]=false;
$_total_f=ceil($lastf/1);$zh["list"]["f"]["total"]=$_total_f;
$_data_f = array_slice($untreated_data,0,$lastf);
if(count($_data_f)==0):echo "";
else:
foreach($_data_f as $key=>$f):
if(($_id_f)%1==0):$_id_f++;else:$_id_f++;continue;endif;
$zh["list"]["f"]["index"]=++$_index_f;
if($_index_f>=$_total_f):$zh["list"]["f"]["last"]=true;endif;?>

                            <li class="upload_thumb">
                                <img src="<?php if($f['image'] == 1){?>http://www.metacms.com/<?php echo $f['path'];?><?php  }else{ ?>http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/Uploadify/default.png<?php }?>" path="<?php echo $f['path'];?>"/>
                                <input style="padding:3px 0px;width:84px" type="text" name="zhcms[][alt]"
                                       value="<?php echo $f['name'];?>" onblur="if(this.value=='')this.value='<?php echo $f['name'];?>'"
                                       onfocus="this.value=''">
                                <input type="hidden" name="table_id" value="<?php echo $f['id'];?>"/>
                            </li>
                        <?php $zh["list"]["f"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </ul>
                </div>
                <div class="page1">
                    <?php echo $untreated_page;?>
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class="position-bottom" style="position: fixed;bottom:0px;">
        <input type="button" class="zh-success" id="pic_selected" value="确定"/>
        <input type="button" class="zh-cancel" value="关闭" onclick="close_window();"/>
    </div>
</body>
</html>