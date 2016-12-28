<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title><?php echo L("admin_attachment_index_page_title");?></title>
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
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Attachment/js/js.js"></script>
</head>
<body>
		<form action='<?php echo U('BulkDel');?>' method="post" onsubmit="return zh_submit(this,'<?php echo U('index');?>');">
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action"><?php echo L("admin_attachment_index_page_tab1");?></a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
        	<td class="w30">
				<input type="checkbox" class="select_all"/>
			</td>
            <td class="w50"><?php echo L("admin_attachment_index_page_table_col_header1");?></td>
            <td class="w100"><?php echo L("admin_attachment_index_page_table_col_header2");?></td>
            <td ><?php echo L("admin_attachment_index_page_table_col_header3");?></td>
            <td><?php echo L("admin_attachment_index_page_table_col_header4");?></td>
            <td class="w200"><?php echo L("admin_attachment_index_page_table_col_header5");?></td>
            <td class="w100"><?php echo L("admin_attachment_index_page_table_col_header6");?></td>
            <td class="w50"><?php echo L("admin_attachment_index_page_table_col_header7");?></td>
        </tr>
        </thead>
        <?php $zh["list"]["u"]["total"]=0;if(isset($upload) && !empty($upload)):$_id_u=0;$_index_u=0;$lastu=min(1000,count($upload));
$zh["list"]["u"]["first"]=true;
$zh["list"]["u"]["last"]=false;
$_total_u=ceil($lastu/1);$zh["list"]["u"]["total"]=$_total_u;
$_data_u = array_slice($upload,0,$lastu);
if(count($_data_u)==0):echo "";
else:
foreach($_data_u as $key=>$u):
if(($_id_u)%1==0):$_id_u++;else:$_id_u++;continue;endif;
$zh["list"]["u"]["index"]=++$_index_u;
if($_index_u>=$_total_u):$zh["list"]["u"]["last"]=true;endif;?>

            <tr>
            	<td>
							<input type="checkbox" name="ids[]" value="<?php echo $u['id'];?>"/>
				</td>
                <td><?php echo $u['id'];?></td>
                <td>
                	<?php if($u['image']){?>
	                	<a href="<?php echo $u['pic'];?>" target="_blank">
	                    <img src="<?php echo $u['pic'];?>" class="w60 h30" title="<?php echo L("admin_attachment_index_page_table_preview");?>" onmouseover="view_image(this)"/>
	                    </a>
	                <?php  }else{ ?>
	                    <img src="<?php echo $u['pic'];?>" class="w60 h30" title="<?php echo L("admin_attachment_index_page_table_preview");?>" />
                    <?php }?>
                </td>
                <td>
                    <?php echo $u['basename'];?>
                </td>
                <td>
                    <?php echo get_size($u['size']);?>
                </td>
                <td>
                    <?php echo date('Y-m-d',$u['uptime']);?>
                </td>
                <td>
                    <?php echo $u['username'];?>
                </td>
                <td>
                    <a href="javascript:;"  onclick="zh_confirm('<?php echo L("admin_attachment_index_page_table_confirm_del");?>',function(){zh_ajax('<?php echo U('del');?>',{id:<?php echo $u['id'];?>})})">
                    <?php echo L("admin_attachment_index_page_table_operator1");?>
                    </a>
                </td>
            </tr>
        <?php $zh["list"]["u"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </table>
    <div class="page1">
        <?php echo $page;?>
    </div>
    <div class="position-bottom">
				<input type="button" class="zh-cancel" onclick="select_all(1)" value='<?php echo L("admin_attachment_index_page_form_operator1");?>'/>
				<input type="button" class="zh-cancel" onclick="select_all(0)" value='<?php echo L("admin_attachment_index_page_form_operator2");?>'/>
				<input type="button" class="zh-cancel" onclick="BulkDel()" value="<?php echo L("admin_attachment_index_page_form_operator3");?>"/>				
	</div>
	
</div>
</form>
<script type="text/javascript" charset="utf-8">
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
//指量删除
function BulkDel() {
    //栏目检测
    if ($("input[type='checkbox']:checked").length == 0) {
        alert('<?php echo L("admin_attachment_index_page_js_message1");?>');
        return false;
    }
   	$("form").trigger('submit');
}
</script>
</body>
</html>