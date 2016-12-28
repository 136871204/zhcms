<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title><?php echo L("admin_template_style_style_list_page_title");?></title>
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
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/TemplateStyle/js/style_list.js"></script>
    <link type="text/css" rel="stylesheet" href="http://www.works.com/zh/Zhcms/Admin/Tpl/TemplateStyle/css/style_list.css"/>
</head>
<body>
<div class="wrap" style="bottom: 0px;">
    <div class="title-header"><?php echo L("admin_template_style_style_list_page_section1_title");?></div>
    <div class="help">
        <!--TODO：模板页面，和视频教程 之后运营的时候在制作-->
        <p>1. <?php echo L("admin_template_style_style_list_page_section1_content1");?> <a href="http://www.metaphase.co.jp" class="action" target="_blank"><?php echo L("admin_template_style_style_list_page_section1_content2");?></a></p>
        <p>2. <?php echo L("admin_template_style_style_list_page_section1_content3");?></p>
    </div>
    <div class="title-header"><?php echo L("admin_template_style_style_list_page_section2_title");?></div>
    <div class="help">
        <p><?php echo L("admin_template_style_style_list_page_section2_content1");?> >>><a href="http://www.metaphase.co.jp" target="_blank"><?php echo L("admin_template_style_style_list_page_section2_content2");?></a></p>
    </div>
    <div class="tpl-list">
        <ul>
            <?php $zh["list"]["t"]["total"]=0;if(isset($style) && !empty($style)):$_id_t=0;$_index_t=0;$lastt=min(1000,count($style));
$zh["list"]["t"]["first"]=true;
$zh["list"]["t"]["last"]=false;
$_total_t=ceil($lastt/1);$zh["list"]["t"]["total"]=$_total_t;
$_data_t = array_slice($style,0,$lastt);
if(count($_data_t)==0):echo "";
else:
foreach($_data_t as $key=>$t):
if(($_id_t)%1==0):$_id_t++;else:$_id_t++;continue;endif;
$zh["list"]["t"]["index"]=++$_index_t;
if($_index_t>=$_total_t):$zh["list"]["t"]["last"]=true;endif;?>

                <li <?php if($t['current']==1){?>class="active current"<?php }?>>
                    <img src="<?php echo $t['template_img'];?>" width="260"/>
                    <h2><?php echo $t['name'];?></h2>
                    <p><?php echo L("admin_template_style_style_list_page_list_title1");?>: <?php echo $t['author'];?></p>
                    <p><?php echo L("admin_template_style_style_list_page_list_title2");?>: <?php echo $t['email'];?></p>
                    <p><?php echo L("admin_template_style_style_list_page_list_title3");?>: <?php echo $t['dir_name'];?></p>

                    <div class="link">
                        <?php if($t['current'] <> 1){?>
                            <a href="javascript:;" class="btn" attr='select_tpl' onclick="zh_ajax('<?php echo U(select_style);?>',{dir_name:'<?php echo basename($t['dir_name']);?>'})"><?php echo L("admin_template_style_style_list_page_list_title4");?></a>
                       <?php  }else{ ?>
                        <strong><?php echo L("admin_template_style_style_list_page_list_title5");?></strong>
                        <?php }?>
                    </div>
                </li>
            <?php $zh["list"]["t"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
        </ul>
    </div>
</div>
</body>
</html>