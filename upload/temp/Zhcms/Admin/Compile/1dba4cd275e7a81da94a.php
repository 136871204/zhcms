<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>EC会员等级</title>
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
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/EcUserRank/js/js.js"></script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
                <li><a href="<?php echo U('index');?>" class="action">EC会员等级列表</a></li>
                <li><a href="<?php echo U('add');?>">添加EC会员等级</a></li>
        </ul>
    </div>
    <table class="table2 zh-form">
        <thead>
        <tr>
            <td >会员等级名称</td>
            <td >积分下限</td>
            <td >积分上限</td>
            <td >初始折扣率(%)</td>
            <td >特殊会员组</td>
            <td >显示价格</td>
            <td >操作</td>
        </tr>
        </thead>
        <?php $zh["list"]["rank"]["total"]=0;if(isset($user_ranks) && !empty($user_ranks)):$_id_rank=0;$_index_rank=0;$lastrank=min(1000,count($user_ranks));
$zh["list"]["rank"]["first"]=true;
$zh["list"]["rank"]["last"]=false;
$_total_rank=ceil($lastrank/1);$zh["list"]["rank"]["total"]=$_total_rank;
$_data_rank = array_slice($user_ranks,0,$lastrank);
if(count($_data_rank)==0):echo "";
else:
foreach($_data_rank as $key=>$rank):
if(($_id_rank)%1==0):$_id_rank++;else:$_id_rank++;continue;endif;
$zh["list"]["rank"]["index"]=++$_index_rank;
if($_index_rank>=$_total_rank):$zh["list"]["rank"]["last"]=true;endif;?>

            <tr>
                <td><?php echo $rank['rank_name'];?></td>
                <td><?php echo $rank['min_points'];?></td>
                <td><?php echo $rank['max_points'];?></td>
                <td><?php echo $rank['discount'];?></td>
                <td>
                    <?php if($rank['special_rank']){?> 
                        <img src="http://www.works.com/Static/image/yes.gif"  />
                    <?php  }else{ ?>
                        <img src="http://www.works.com/Static/image/no.gif"  />
                    <?php }?>
                </td>
                <td>
                    <?php if($rank['show_price']){?> 
                        <img src="http://www.works.com/Static/image/yes.gif"  />
                    <?php  }else{ ?>
                        <img src="http://www.works.com/Static/image/no.gif"  />
                    <?php }?>
                </td>
                <td>
				    <a href="<?php echo U('edit',array('rank_id'=>$rank['rank_id']));?>">
				        修改
				    </a>|
                    <a href="javascript:confirm('是否删除')?zh_ajax('<?php echo U(del);?>',{rank_id:<?php echo $rank['rank_id'];?>}):void(0);">削除</a>
                    
                </td>
            </tr>
        <?php $zh["list"]["rank"]["first"]=false;
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