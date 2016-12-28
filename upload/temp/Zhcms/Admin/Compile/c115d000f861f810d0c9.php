<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title><?php echo L("admin_category_index_page_title");?></title>
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
	</head>
	<body>
		<form action='<?php echo U('BulkEdit');?>' method="post">
			<div class="wrap">
				<div class="menu_list">
					<ul>
						<li>
							<a href="<?php echo U(index);?>" class="action">
								<?php echo L("admin_category_index_page_tab1");?>
							</a>
						</li>
						<li>
							<a href="<?php echo U('add');?>">
								<?php echo L("admin_category_index_page_tab2");?>
							</a>
						</li>
						<li>
							<a href="javascript:zh_ajax('<?php echo U(updateCache);?>')">
								<?php echo L("admin_category_index_page_tab3");?>
							</a>
						</li>
					</ul>
				</div>
				<table class="table2 zh-form">
					<thead>
						<tr>
							<td class="w30">
							<input type="checkbox" class="select_all"/>
							</td>
							<td class="w30"><?php echo L("admin_category_index_page_table_col_header1");?></td>
							<td class="w50"><?php echo L("admin_category_index_page_table_col_header2");?></td>
							<td><?php echo L("admin_category_index_page_table_col_header3");?></td>
							<td class="w100"><?php echo L("admin_category_index_page_table_col_header4");?></td>
							<td class="w100"><?php echo L("admin_category_index_page_table_col_header5");?></td>
							<td class="w180"><?php echo L("admin_category_index_page_table_col_header6");?></td>
						</tr>
					</thead>
					<?php $zh["list"]["c"]["total"]=0;if(isset($category) && !empty($category)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($category));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($category,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

						<tr>
							<td>
							<input type="checkbox" name="cid[]" value="<?php echo $c['cid'];?>"/>
							</td>
							<td><?php echo $c['cid'];?></td>
							<td>
							<input type="text" class="w30" value="<?php echo $c['catorder'];?>" name="list_order[<?php echo $c['cid'];?>]"/>
							</td>
							<td><?php echo $c['_name'];?></td>
							<td><?php echo $c['cat_type_name'];?></td>
							<td><?php echo $c['model_name'];?></td>
							<td>
							<a href="<?php echo Url::getCategoryUrl($c)?>" target="_blank">
								<?php echo L("admin_category_index_page_table_operator1");?>
							</a>
								<span class="line">|</span>
							<a href="<?php echo U('add',array('pid'=>$c['cid'],'mid'=>$c['mid']));?>">
								<?php echo L("admin_category_index_page_table_operator2");?>
							</a>
								<span class="line">|</span>
							<a href="<?php echo U('edit',array('cid'=>$c['cid']));?>">
								<?php echo L("admin_category_index_page_table_operator3");?>
							</a>
								<span class="line">|</span>
							<a href="javascript:zh_confirm('<?php echo L("admin_category_index_page_del_confirm");?>',function(){zh_ajax(CONTROL + '&m=del', {cid: <?php echo $c['cid'];?>,mid: <?php echo $c['mid'];?>})})">
								<?php echo L("admin_category_index_page_table_operator4");?>
							</a></td>
						</tr>
					<?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
				</table>
                
				<div class="h60"></div>
			</div>
			<div class="position-bottom">
				<input type="button" class="zh-cancel" onclick="select_all(1)" value='<?php echo L("admin_category_index_page_form_button1");?>'/>
				<input type="button" class="zh-cancel" onclick="select_all(0)" value='<?php echo L("admin_category_index_page_form_button2");?>'/>
				<input type="button" class="zh-cancel" onclick="updateOrder()" value="<?php echo L("admin_category_index_page_form_button3");?>"/>
				<input type="button" class="zh-cancel" onclick="BulkEdit()" value="<?php echo L("admin_category_index_page_form_button4");?>"/>				
			</div>
		</form>
		<script>
			//更新排序
function updateOrder() {
    //栏目检测
    if ($("input[type='text']").length == 0) {
        alert('<?php echo L("admin_category_index_page_js_message1");?>');
        return false;
    }
    var post = $("input[type='text']").serialize();
    zh_ajax(CONTROL + '&m=updateOrder', post);
}
//点击input表单实现 全选或反选
$(function () {
    //全选
    $("input.select_all").click(function () {
        $("[type='checkbox']").attr("checked",$(this).attr('checked')=='checked');
    })
})
//全选复选框
function select_all(state){
	if(state==1){
		$("[type='checkbox']").attr("checked",state);
	}else{
		$("[type='checkbox']").attr("checked",function(){return !$(this).attr('checked')});
	}
}
//指量编辑
function BulkEdit() {
    //栏目检测
    if ($("input[type='checkbox']:checked").length == 0) {
        alert('<?php echo L("admin_category_index_page_js_message1");?>');
        return false;
    }
   	$("form").trigger('submit');
}
		</script>
	</body>
</html>