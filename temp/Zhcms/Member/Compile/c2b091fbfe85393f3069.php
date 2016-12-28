<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo $user['nickname'];?> - マイページ</title>
    <link rel="stylesheet" type="text/css" href="http://www.metacms.com/zh/Zhcms/Member/Tpl/Space/css/style.css"/>
    <script type='text/javascript' src='http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>

    <script type='text/javascript'>
                    	var ROOT='<?php echo ROOT_URL;?>';var WEB='<?php echo WEB_URL;?>';var CONTROL='<?php echo CONTROL_URL;?>';
                	</script><script type='text/javascript' src='http://www.metacms.com/zh/Common/static/js/zhcms.js'></script>

                <link rel='stylesheet' type='text/css' href='http://www.metacms.com/zh/Common/static/css/zhcms.css?ver=1.0'/>

</head>
<body>
<!--头部-->
<div id="head_out">
    <div class="head">
        <div class="menu">
            <a href="http://www.metacms.com/index.php" style="color:#fff;">トップ</a>
            <a href="http://www.metacms.com/index.php?a=Member&c=Dynamic&m=index" style="color:#fff;">会員センタ</a>
        </div>
        <img src="<?php echo _default($user['icon'],'http://www.metacms.com/data/image/user/150.png');?>" class="face" onmouseover="user.show(this,<?php echo $user['uid'];?>)"/>

        <p class="name">
            <?php echo $user['nickname'];?>
            <?php if($_SESSION['admin']){?>
                <!--<a href="http://www.metacms.com/index.php?a=User&c=Lock&m=lock&uid=<?php echo $user['uid'];?>" class="attention"
                   target="_blank">禁止</a>-->
            <?php }?>

        </p>
        <p class="page">
            マイページ：
            <a href="http://www.metacms.com?<?php echo $user['domain'];?>">
                http://www.metacms.com?<?php echo $user['domain'];?>
            </a>
            <br/>
            積分: <?php echo $user['credits'];?>&nbsp;&nbsp;&nbsp;&nbsp;
            訪問：<?php echo $user['spec_num'];?>次<br/>
            会員組: <?php echo $user['rname'];?>
            <br/>
                    <span>
                        <?php echo $user['signature'];?>
                    </span>
        </p>
    </div>
</div>
<!--头部结束-->

<!--主体-->
<div id="main">

    <!--左侧-->
    <div class="left">
        <p class="title">
           私の文章
        </p>
        <ul class="arc_list">
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

                <li>
                    <a href="<?php echo U('Index/Index/content',array('mid'=>1,'cid'=>$d['cid'],'aid'=>$d['aid']));?>"
                       target="_blank">
                        <span>[<?php echo date('Y-m-d',$d['addtime']);?>]</span> <?php echo mb_substr($d['title'],0,35,'utf-8');?>
                    </a>
                </li>
            <?php $zh["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
        </ul>
        <div class="page">
            <?php echo $page;?>
        </div>
    </div>
    <!--左侧结束-->

    <!--右侧-->
    <div class="right">



        <p class="title">
            最近のお客
        </p>
        <ul class="visitor_list">
            <?php $zh["list"]["g"]["total"]=0;if(isset($guest) && !empty($guest)):$_id_g=0;$_index_g=0;$lastg=min(1000,count($guest));
$zh["list"]["g"]["first"]=true;
$zh["list"]["g"]["last"]=false;
$_total_g=ceil($lastg/1);$zh["list"]["g"]["total"]=$_total_g;
$_data_g = array_slice($guest,0,$lastg);
if(count($_data_g)==0):echo "";
else:
foreach($_data_g as $key=>$g):
if(($_id_g)%1==0):$_id_g++;else:$_id_g++;continue;endif;
$zh["list"]["g"]["index"]=++$_index_g;
if($_index_g>=$_total_g):$zh["list"]["g"]["last"]=true;endif;?>

                <li>
                    <a href="http://www.metacms.com/index.php?<?php echo $g['domain'];?>" class="face">
                        <img src="<?php echo $g['icon'];?>" alt="<?php echo $g['nickname'];?>" style='width:50px;'/>	
                    </a>
                    <a href="http://www.metacms.com/index.php?<?php echo $g['domain'];?>" class="name">
                        <?php echo $g['nickname'];?>
                    </a>
                </li>
            <?php $zh["list"]["g"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>


        </ul>
    </div>
    <!--右侧结束-->

</div>
<!--主体结束-->

<!--底部-->
<div id="footer_out">
    <p>国内で優秀なオープンソースのシステム<a href="">METACMS</a></p>

    <p>All rights reserved, metaphase</p>
</div>
<!--底部结束-->

</body>
</html>








