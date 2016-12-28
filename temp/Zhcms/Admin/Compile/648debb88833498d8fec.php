<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>内容一覧</title>
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
		<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Content/js/content.js"></script>
		<link type="text/css" rel="stylesheet" href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Content/css/css.css"/>
	</head>
	<body>
		<div class="wrap">
			<form action="<?php echo U('content');?>" class="zh-form" method="get">
				<input type="hidden" name="m" value="content"/>
                <input type="hidden" name="c" value="content"/>
                <input type="hidden" name="a" value="admin"/>
				<input type="hidden" name="mid" value="<?php echo $_GET['mid'];?>"/>
				<input type="hidden" name="cid" value="<?php echo $_GET['cid'];?>"/>
				<input type="hidden" name="state" value="<?php echo $_GET['state'];?>"/>
				<div class="search">
					新規時間：
					<input id="begin_time" placeholder="開始時間" readonly="readonly" class="w80" type="text" value="" name="search_begin_time">
					<script>
						$('#begin_time').calendar({
							format : 'yyyy-MM-dd'
						});
					</script>
					-
					<input id="end_time" placeholder="終了時間" readonly="readonly" class="w80" type="text" value="" name="search_end_time">
					<script>
						$('#end_time').calendar({
							format : 'yyyy-MM-dd'
						});
					</script>
					&nbsp;&nbsp;&nbsp;
					<select name="flag" class="w100">
						<option selected="" value="">全部</option>
						<?php $zh["list"]["f"]["total"]=0;if(isset($flag) && !empty($flag)):$_id_f=0;$_index_f=0;$lastf=min(1000,count($flag));
$zh["list"]["f"]["first"]=true;
$zh["list"]["f"]["last"]=false;
$_total_f=ceil($lastf/1);$zh["list"]["f"]["total"]=$_total_f;
$_data_f = array_slice($flag,0,$lastf);
if(count($_data_f)==0):echo "";
else:
foreach($_data_f as $key=>$f):
if(($_id_f)%1==0):$_id_f++;else:$_id_f++;continue;endif;
$zh["list"]["f"]["index"]=++$_index_f;
if($_index_f>=$_total_f):$zh["list"]["f"]["last"]=true;endif;?>

							<option value="<?php echo $f;?>" <?php if($_GET['flag'] == $f){?>selected=''<?php }?>><?php echo $f;?></option>
						<?php $zh["list"]["f"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
					</select>
					&nbsp;&nbsp;&nbsp;
					<select name="search_type" class="w100">
						<option value="1" <?php if($_GET['search_type'] == 1){?>selected=''<?php }?>>タイトル</option>
						<option value="2" <?php if($_GET['search_type'] == 2){?>selected=''<?php }?>>説明</option>
						<option value="3" <?php if($_GET['search_type'] == 3){?>selected=''<?php }?>>ユーザ名</option>
						<option value="4" <?php if($_GET['search_type'] == 4){?>selected=''<?php }?>>ユーザuid</option>
					</select>&nbsp;&nbsp;&nbsp;
					キーワード：
					<input class="w200" type="text" placeholder="キーワード入力..." value="<?php echo $_GET['search_keyword'];?>" name="search_keyword">
					<button class="zh-cancel" type="submit">
						検索
					</button>
				</div>
			</form>
			<div class="menu_list">
				<ul>
					<li>
						<a href="<?php echo U('content',array('mid'=>$_GET['mid'],'cid'=>$_GET['cid'],'content_state'=>1));?>"
						<?php if($_GET['content_state']==1){?>class="action"<?php }?> >
							内容一覧
						</a>
					</li>
					<li>
						<a href="<?php echo U('content',array('mid'=>$_GET['mid'],'cid'=>$_GET['cid'],'content_state'=>0));?>"
						<?php if($_GET['content_state']==0){?>class="action"<?php }?> >
							未審査
						</a>
					</li>
					<li>
						<a href="javascript:;" onclick="zh_open_window('<?php echo U(add,array('cid'=>$_GET['cid'],'mid'=>$_GET['mid']));?>')">
							内容新規
						</a>
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
						<td class="w30">cid</td>
						<td class="w30">ソート</td>
						<td>タイトル</td>
						<td class="w50">状態</td>
						<td class="w100">作者</td>
						<td class="w80">修正時間</td>
						<td class="w120">操作</td>
					</tr>
				</thead>
				<?php $zh["list"]["c"]["total"]=0;if(isset($data) && !empty($data)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($data));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($data,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

					<tr>
						<td>
						<input type="checkbox" name="aid[]" value="<?php echo $c['aid'];?>"/>
						</td>
						<td><?php echo $c['aid'];?></td>
						<td><?php echo $c['cid'];?></td>
						<td>
						<input type="text" class="w30" value="<?php echo $c['arc_sort'];?>" name="arc_order[<?php echo $c['aid'];?>]"/>
						</td>
						<td>
						<a href="<?php echo U('Index/Index/content',array('mid'=>$_GET['mid'],'cid'=>$_GET['cid'],'aid'=>$c['aid']));?>" target="_blank">
							<?php echo $c['title'];?>
						</a>
						<?php if($c['flag']){?>
							<span style="color:#FF0000"> [<?php echo $c['flag'];?>]</span>
						<?php }?></td>
						<td>
						<?php if($c['content_state'] == 1){?>
							審査済
							<?php  }else{ ?>
								未審査
						<?php }?></td>
						<td><?php echo $c['username'];?></td>
						<td><?php echo date('Y-m-d',$c['updatetime']);?></td>
						<td>
						<a href="<?php echo Url::getContentUrl($c);?>" target="_blank">
							訪問
						</a><span
						class="line">|</span>
						<a href="javascript:zh_open_window('<?php echo U(edit,array('cid'=>$_GET['cid'],'mid'=>$_GET['mid'],'aid'=>$c['aid']));?>')">変更
						</a><span class="line">|</span>
						<a href="javascript:" onclick="zh_confirm('削除しますか？',function(){zh_ajax('<?php echo U('del');?>',{aid:<?php echo $c['aid'];?>,cid:<?php echo $c['cid'];?>,mid:<?php echo $c['mid'];?>})})">
							削除
						</a>
						</td>
					</tr>
				<?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
			</table>
			<div class="page1">
				<?php echo $page;?>
			</div>
            <br /><br /><br /><br /><br /><br /><br /><br />
		</div>

		<div class="position-bottom">
			<input type="button" class="zh-cancel" value="全て選択" onclick="select_all('.table2')"/>
			<input type="button" class="zh-cancel" value="反选" onclick="reverse_select('.table2')"/>
			<input type="button" class="zh-cancel" onclick="order(<?php echo $_GET['mid'];?>,<?php echo $_GET['cid'];?>)" value="ソート変更"/>
			<input type="button" class="zh-cancel" onclick="del(<?php echo $_GET['mid'];?>,<?php echo $_GET['cid'];?>)" value="一括削除"/>
			<input type="button" class="zh-cancel" onclick="audit(<?php echo $_GET['mid'];?>,<?php echo $_GET['cid'];?>,1)" value="審査通る"/>
			<input type="button" class="zh-cancel" onclick="audit(<?php echo $_GET['mid'];?>,<?php echo $_GET['cid'];?>,0)" value="審査取り消す"/>
			<input type="button" class="zh-cancel" onclick="move(<?php echo $_GET['mid'];?>,<?php echo $_GET['cid'];?>)" value="一括移動"/>
		</div>

	</body>
</html>