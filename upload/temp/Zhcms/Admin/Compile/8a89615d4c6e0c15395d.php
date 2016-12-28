<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>审核内容</title>
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


    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/ContentAudit/js/content.js"></script>
    <link type="text/css" rel="stylesheet" href="http://www.works.com/zh/Zhcms/Admin/Tpl/ContentAudit/css/css.css"/>
</head>
<body>
<div class="wrap">
    <form id="search" action="<?php echo U('content');?>" class="zh-form" method="post">
        <div class="search">
            模型：
            <select name="mid" class="w100" onchange="$('#search').trigger('submit');" >
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

                <option value="<?php echo $m['mid'];?>" <?php if($mid == $m['mid']){?>selected=''<?php }?>><?php echo $m['model_name'];?></option>
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
  // alert($('#mid').val());
    /*alert('bbb');
        $("[name='mid'").change(function(){
            alert('sss');
            //$("#search").trigger('submit');
        })*/
    </script>
    <div class="menu_list">
        <ul>
            <li>
                <a href="<?php echo U('content');?>" class="action">文章列表</a>
            </li>
        </ul>
    </div>
    <table class="table2 zh-form">
        <thead>
        <tr>
            <td class="w30">
                <input type="checkbox" id="select_all"/>
            </td>
            <td class="w30">aid</td>
            <td>标题</td>
            <td class="w100">栏目</td>
            <td class="w100">作者</td>
            <td class="w80">修改时间</td>
            <td class="w50">操作</td>
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
                <td><input type="checkbox" name="aid[]" value="<?php echo $d['aid'];?>"/></td>
                <td><?php echo $d['aid'];?></td>
                <td>
                    <a href="<?php echo U('Index/Index/Content',array('mid'=>$mid,'cid'=>$d['cid'],'aid'=>$d['aid']));?>" target="_blank"><?php echo $d['title'];?></a>
                </td>
                <td>
                    <?php echo $d['catname'];?>
                </td>
                <td>
                    <a href="http://www.works.com/index.php?<?php echo $d['uid'];?>" target="_blank"><?php echo $d['username'];?></a>
                    </td>
                <td><?php echo date('Y-m-d',$d['updatetime']);?></td>
                <td>
                    <a href="<?php echo U('Index/Index/Content',array('mid'=>$mid,'cid'=>$d['cid'],'aid'=>$d['aid']));?>" target="_blank">
                        访问</a>
                </td>
            </tr>
        <?php $zh["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </table>
    <div class="page1">
        <?php echo $page;?>
    </div>
</div>

<div class="position-bottom">
    <input type="button" class="zh-cancel" value="全选" onclick="select_all('.table2')"/>
    <input type="button" class="zh-cancel" value="反选" onclick="reverse_select('.table2')"/>
    <input type="button" class="zh-cancel" onclick="del(<?php echo $mid;?>)" value="批量删除"/>
    <input type="button" class="zh-cancel" onclick="audit(<?php echo $mid;?>,1)" value="审核"/>
</div>
</body>
</html>