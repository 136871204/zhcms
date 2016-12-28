<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>Model管理</title>
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
						<a href="<?php echo U('index');?>" class="action">
							Model一覧
						</a>
					</li>
					<li>
						<a href="<?php echo U('add');?>">
							Model新規
						</a>
					</li>
					<li>
						<a href="javascript:;" onclick="zh_ajax('<?php echo U(updateCache);?>')">
							キャッシュ更新
						</a>
					</li>
				</ul>
			</div>
			<div class="content">
				<table class="table2 table-title">
					<thead>
						<tr>
							<td class="w30">mid</td>
							<td>Model名称</td>
							<td class="w100">システム</td>
							<td class="w100">メインテーブル</td>
							<td class="w30">状態</td>
							<td class="w150">操作</td>
						</tr>
					</thead>
					<tbody>
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

							<tr>
								<td><?php echo $m['mid'];?></td>
								<td><?php echo $m['model_name'];?></td>
								<td>
								<?php if($m['is_system'] == 1){?>
									<font color="red">√</font>
									<?php  }else{ ?>
									<font color="blue">×</font>
								<?php }?></td>
								<td><?php echo $m['table_name'];?></td>
								<td>
								<?php if($m['enable']){?>
									NO
									<?php  }else{ ?>
										OFF
								<?php }?></td>
								<td>
								<a href="<?php echo U('Field/index',array('mid'=>$m['mid']));?>">
									Field管理
								</a> |
								<?php if($m['is_system']==1){?>
									変更
									<?php  }else{ ?>
										<a href="<?php echo U('edit',array('mid'=>$m['mid']));?>">
											変更
										</a>
								<?php }?> |
								<?php if($m['is_system']==1||in_array($m['table_name'],$forbidDelete)){?>
									削除
									<?php  }else{ ?>
										<a href="javascript:zh_confirm('削除しますか？',function(){zh_ajax('<?php echo U('del');?>', {mid: <?php echo $m['mid'];?>})})">
											削除
										</a>
								<?php }?></td>
							</tr>
						<?php $zh["list"]["m"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>