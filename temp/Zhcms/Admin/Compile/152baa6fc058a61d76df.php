<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>站点管理</title>
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
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Weblist/js/js.js"></script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
                <li><a href="<?php echo U('index');?>" class="action">站点列表</a></li>
                <li><a href="<?php echo U('add');?>">站点添加</a></li>
                <li>
    				<a href="javascript:zh_ajax('<?php echo U(updateCache);?>')">
    					缓存更新
    				</a>
    			</li>
        </ul>
    </div>
    <table class="table2 zh-form">
        <thead>
        <tr>
            <td >网站webid</td>
            <td >站点名称</td>
            <td >访问域名</td>
            <td >主站|子站</td>
            <td >排序</td>
            <td >操作</td>
        </tr>
        </thead>
        <?php $zh["list"]["w"]["total"]=0;if(isset($weblist) && !empty($weblist)):$_id_w=0;$_index_w=0;$lastw=min(1000,count($weblist));
$zh["list"]["w"]["first"]=true;
$zh["list"]["w"]["last"]=false;
$_total_w=ceil($lastw/1);$zh["list"]["w"]["total"]=$_total_w;
$_data_w = array_slice($weblist,0,$lastw);
if(count($_data_w)==0):echo "";
else:
foreach($_data_w as $key=>$w):
if(($_id_w)%1==0):$_id_w++;else:$_id_w++;continue;endif;
$zh["list"]["w"]["index"]=++$_index_w;
if($_index_w>=$_total_w):$zh["list"]["w"]["last"]=true;endif;?>

            <tr>
                <td><?php echo $w['id'];?></td>
                <td><?php echo $w['webname'];?></td>
                <td><?php echo $w['weburl'];?></td>
                <td>
                    <?php if($w['is_main']==0){?>
                        主站
                    <?php  }else{ ?>
                        子站
                    <?php }?>
                </td>
                <td><?php echo $w['displayorder'];?></td>
                <td>
				    <a href="<?php echo U('edit',array('id'=>$w['id']));?>">
				        修改
				    </a>|
                    <a href="javascript:confirm('需要删除吗')?zh_ajax('<?php echo U(del);?>',{id:<?php echo $w['id'];?>}):void(0);">删除</a>
                    
                </td>
            </tr>
        <?php $zh["list"]["w"]["first"]=false;
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