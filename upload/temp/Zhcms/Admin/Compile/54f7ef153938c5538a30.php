<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title><?php echo L("admin_config_page_title");?></title>
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
    <script>
    
/**
 * 文件上传
 * @param id 显示图片列表id
 * @param type 类型 images image
 * @param num 数量
 * @param name 表单名
 * @param upload_img_max_width 最大宽度（超过这个尺寸，会进行图片裁切)
 * @param upload_img_max_width 最大高度（超过这个尺寸，会进行图片裁切)
 * @param water 是否加水印
 * @returns {boolean}
 * id, type, num, name, upload_img_max_width, upload_img_max_height
 */
function file_upload(options) {
   
    //{id:'thumb',type:'thumb',num:1,name:'thumb'}
	//多文件(图片与文件)上传时，判断是否已经超出了允许上传的图片数量
	switch(options.type) {
		case 'thumb':
            alert('TODO:content/js/addedit.js --- thumb');
			var url =WEB + "?a=Admin&c=ContentUpload&m=index&id=" + options.id + "&type=" + options.type + "&num=" + options.num + "&name=" + options.name;
//alert(url);
            break;
		case 'image':

            //alert('TODO:content/js/addedit.js --- file_upload');
			var url = WEB + "?a=Admin&c=Upload&m=index&id=" + options.id + "&type=" + options.type + "&num=" + options.num + "&name=" + options.name+ "&dir=" + options.dir;
			break;
		case 'images':
            alert('TODO:content/js/addedit.js --- images');
			//span储存的文件数量
			num = $('#zh_up_' + options.id).text() * 1;
			if (num == 0) {
				alert('アップロードMAX数到達!');
				return false;
			}
			var url =WEB + "?a=Admin&c=ContentUpload&m=index&id=" + options.id + "&type=" + options.type + "&num=" + num + "&name=" + options.name + "&filetype=" + options.filetype + '&upload_img_max_width=' + options.upload_img_max_width + '&upload_img_max_height=' + options.upload_img_max_height;
			break;
		case 'files':
            alert('TODO:content/js/addedit.js --- files');
			num = $('#zh_up_' + options.id).text() * 1;
			if (num == 0) {
				alert('アップロードMAX数到達!');
				return false;
			}
			var url = WEB + "?a=Admin&c=ContentUpload&m=index&id=" + options.id + "&type=" + options.type + "&num=" + num + "&name=" + options.name + "&filetype=" + options.filetype;
			break;
	}
    //alert(url);
	$.modal({
		title : '文件上传',
		width : 650,
		height : 500,
		content : '<iframe frameborder=0 scrolling="no" style="height:99%;border:none;" src="' + url + '"></iframe>'
	});
}

//预览单张图片
function view_image(obj) {
	var src = $(obj).attr('src');
	var id = $(obj).attr('id');
	var viewImg = $('#view_' + id);
	//删除预览图
	if (viewImg.length >= 1) {
		viewImg.remove();
	}
	//鼠标移除时删除预览图
	$(obj).mouseout(function(){
		$('#view_' + id).remove();
	})
	if (src) {
		var offset = $(obj).offset();
		var _left = 450+offset.left+"px";
		var _top = offset.top-100+"px";
		var html = '<img src="' + src + '" style="border:solid 5px #dcdcdc;position:absolute;z-index:1000;width:300px;height:200px;left:'+_left+';top:'+_top+';" id="view_'+id+'"/>';
		$('body').append(html);
	}
}

/**
 * 删除单图上传的图片（自定义字段）
 * @param obj 按钮对象
 */
function remove_upload_one_img(obj) {
	$(obj).parent().find('input').val('').attr('src', '');
}
    
    </script>
</head>
<body>
<form action="<?php echo U(edit);?>" method="post" class="zh-form" onsubmit="return zh_submit(this)">
    <input type="hidden" name="webid" value="<?php echo $_GET['webid'];?>"/>
    <div class="wrap">
        <div class="content-nr">

        </div>
        <div class="title-header"><?php echo L("admin_config_page_hot_hint");?></div>
        <div class="help">
            1 <?php echo L("admin_config_page_help1");?>
            <br/>
            2 <?php echo L("admin_config_page_help2");?><br>
            3 <?php echo L("admin_config_page_help3");?>
        </div>
        <div class="tab">
            <ul class="tab_menu">
                <li lab="web"><a href="#"><?php echo L("admin_config_page_tab_site");?></a></li>
                <li lab="weixinweibo"><a href="#"><?php echo L("admin_config_page_tab_weixinweibo");?></a></li>
                <li lab="custion_service"><a href="#"><?php echo L("admin_config_page_tab_custom_service");?></a></li>
                <li><li lab="rewrite"><a href="#"><?php echo L("admin_config_page_tab_static");?></a></li></li>
                <li lab="upload"><a href="#"><?php echo L("admin_config_page_tab_upload");?></a></li>
                <li lab="member"><a href="#"><?php echo L("admin_config_page_tab_member");?></a></li>
                <li lab="content"><a href="#"><?php echo L("admin_config_page_tab_content");?></a></li>
                <li lab="water"><a href="#"><?php echo L("admin_config_page_tab_water");?></a></li>
                <li lab="safe"><a href="#"><?php echo L("admin_config_page_tab_safe");?></a></li>
                <li lab="optimize"><a href="#"><?php echo L("admin_config_page_tab_speed");?></a></li>
                <li lab="email"><a href="#"><?php echo L("admin_config_page_tab_email");?></a></li>
                <li lab="cookie"><a href="#"><?php echo L("admin_config_page_tab_cookie");?></a></li>
                <li lab="session"><a href="#"><?php echo L("admin_config_page_tab_session");?></a></li>
                <li lab="ec_shop_info"><a href="#"><?php echo L("admin_config_page_tab_ec_shop_info");?></a></li>
                <li lab="ec_basic"><a href="#"><?php echo L("admin_config_page_tab_ec_basic");?></a></li>
                <li lab="ec_display"><a href="#"><?php echo L("admin_config_page_tab_ec_display");?></a></li>
                <li lab="ec_shopping_flow"><a href="#"><?php echo L("admin_config_page_tab_ec_shopping_flow");?></a></li>
                <li lab="ec_goods_display"><a href="#"><?php echo L("admin_config_page_tab_ec_goods_display");?></a></li>
                
            </ul>
            <div class="tab_content">
                <div id="web">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150"><?php echo L("admin_config_page_table_th_title");?></th>
                    		<th><?php echo L("admin_config_page_table_th_config");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_variable");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_desc");?></th>
                    	</tr>
                        <?php $zh["list"]["c"]["total"]=0;if(isset($config) && !empty($config)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                        	<?php if($c['type'] == '站点配置'){?>
                        		<tr>
	                        		<td><?php echo L($c['title']);?></td>
	                        		<td><?php echo $c['html'];?></td>
	                        		<td><?php echo $c['name'];?></td>
	                        		<td><?php echo L($c['message']);?></td>
                        		</tr>
                            <?php }?>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>
                <div id="weixinweibo">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150"><?php echo L("admin_config_page_table_th_title");?></th>
                    		<th><?php echo L("admin_config_page_table_th_config");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_variable");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_desc");?></th>
                    	</tr>
                        <?php $zh["list"]["c"]["total"]=0;if(isset($config) && !empty($config)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                        	<?php if($c['type'] == '微信微博'){?>
                        		<tr>
	                        		<td><?php echo L($c['title']);?></td>
	                        		<td><?php echo $c['html'];?></td>
	                        		<td><?php echo $c['name'];?></td>
	                        		<td><?php echo L($c['message']);?></td>
                        		</tr>
                            <?php }?>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>
                <div id="custion_service">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150"><?php echo L("admin_config_page_table_th_title");?></th>
                    		<th><?php echo L("admin_config_page_table_th_config");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_variable");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_desc");?></th>
                    	</tr>
                        <?php $zh["list"]["c"]["total"]=0;if(isset($config) && !empty($config)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                        	<?php if($c['type'] == '客服设置'){?>
                        		<tr>
	                        		<td><?php echo L($c['title']);?></td>
	                        		<td><?php echo $c['html'];?></td>
	                        		<td><?php echo $c['name'];?></td>
	                        		<td><?php echo L($c['message']);?></td>
                        		</tr>
                            <?php }?>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>
                
                <div id="rewrite">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150"><?php echo L("admin_config_page_table_th_title");?></th>
                    		<th><?php echo L("admin_config_page_table_th_config");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_variable");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_desc");?></th>
                    	</tr>
                        <?php $zh["list"]["c"]["total"]=0;if(isset($config) && !empty($config)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                        	<?php if($c['type'] == '伪静态'){?>
                        		<tr>
	                        		<td><?php echo L($c['title']);?></td>
	                        		<td><?php echo $c['html'];?></td>
	                        		<td><?php echo $c['name'];?></td>
	                        		<td><?php echo L($c['message']);?></td>
                        		</tr>
                            <?php }?>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>
                <div id="upload">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150"><?php echo L("admin_config_page_table_th_title");?></th>
                    		<th><?php echo L("admin_config_page_table_th_config");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_variable");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_desc");?></th>
                    	</tr>
                       <?php $zh["list"]["c"]["total"]=0;if(isset($config) && !empty($config)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                        	<?php if($c['type'] == '上传配置'){?>
                        		<tr>
	                        		<td><?php echo L($c['title']);?></td>
	                        		<td><?php echo $c['html'];?></td>
	                        		<td><?php echo $c['name'];?></td>
	                        		<td><?php echo L($c['message']);?></td>
                        		</tr>
                            <?php }?>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>
                <div id="member">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150"><?php echo L("admin_config_page_table_th_title");?></th>
                    		<th><?php echo L("admin_config_page_table_th_config");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_variable");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_desc");?></th>
                    	</tr>
                    	<?php $zh["list"]["c"]["total"]=0;if(isset($config) && !empty($config)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                        	<?php if($c['type'] == '会员配置'){?>
                        		<tr>
	                        		<td><?php echo L($c['title']);?></td>
	                        		<td><?php echo $c['html'];?></td>
	                        		<td><?php echo $c['name'];?></td>
	                        		<td><?php echo L($c['message']);?></td>
                        		</tr>
                            <?php }?>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>
                <div id="content">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150"><?php echo L("admin_config_page_table_th_title");?></th>
                    		<th><?php echo L("admin_config_page_table_th_config");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_variable");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_desc");?></th>
                    	</tr>
                    	<?php $zh["list"]["c"]["total"]=0;if(isset($config) && !empty($config)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                        	<?php if($c['type'] == '内容相关'){?>
                        		<tr>
	                        		<td><?php echo L($c['title']);?></td>
	                        		<td><?php echo $c['html'];?></td>
	                        		<td><?php echo $c['name'];?></td>
	                        		<td><?php echo L($c['message']);?></td>
                        		</tr>
                            <?php }?>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>
                <div id="water">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150"><?php echo L("admin_config_page_table_th_title");?></th>
                    		<th><?php echo L("admin_config_page_table_th_config");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_variable");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_desc");?></th>
                    	</tr>
                    	<?php $zh["list"]["c"]["total"]=0;if(isset($config) && !empty($config)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                        	<?php if($c['type'] == '水印配置'){?>
                        		<tr>
	                        		<td><?php echo L($c['title']);?></td>
	                        		<td><?php echo $c['html'];?></td>
	                        		<td><?php echo $c['name'];?></td>
	                        		<td><?php echo L($c['message']);?></td>
                        		</tr>
                            <?php }?>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>
                <div id="safe">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150"><?php echo L("admin_config_page_table_th_title");?></th>
                    		<th><?php echo L("admin_config_page_table_th_config");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_variable");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_desc");?></th>
                    	</tr>
                    	<?php $zh["list"]["c"]["total"]=0;if(isset($config) && !empty($config)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                        	<?php if($c['type'] == '安全配置'){?>
                        		<tr>
	                        		<td><?php echo L($c['title']);?></td>
	                        		<td><?php echo $c['html'];?></td>
	                        		<td><?php echo $c['name'];?></td>
	                        		<td><?php echo L($c['message']);?></td>
                        		</tr>
                            <?php }?>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>
                <div id="optimize">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150"><?php echo L("admin_config_page_table_th_title");?></th>
                    		<th><?php echo L("admin_config_page_table_th_config");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_variable");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_desc");?></th>
                    	</tr>
                    	<?php $zh["list"]["c"]["total"]=0;if(isset($config) && !empty($config)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                        	<?php if($c['type'] == '性能优化'){?>
                        		<tr>
	                        		<td><?php echo L($c['title']);?></td>
	                        		<td><?php echo $c['html'];?></td>
	                        		<td><?php echo $c['name'];?></td>
	                        		<td><?php echo L($c['message']);?></td>
                        		</tr>
                            <?php }?>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>
                <div id="email">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150"><?php echo L("admin_config_page_table_th_title");?></th>
                    		<th><?php echo L("admin_config_page_table_th_config");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_variable");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_desc");?></th>
                    	</tr>
                    	<?php $zh["list"]["c"]["total"]=0;if(isset($config) && !empty($config)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                        	<?php if($c['type'] == '邮箱配置'){?>
                        		<tr>
	                        		<td><?php echo L($c['title']);?></td>
	                        		<td><?php echo $c['html'];?></td>
	                        		<td><?php echo $c['name'];?></td>
	                        		<td><?php echo L($c['message']);?></td>
                        		</tr>
                            <?php }?>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                        <tr>
                        	<td colspan="4">
                        		<button class="zh-cancel-small" id="checkEmail" type="button">メールアドレステスト</button>
                        	</td>
                        </tr>
                    </table>
                </div>
                <div id="cookie">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150"><?php echo L("admin_config_page_table_th_title");?></th>
                    		<th><?php echo L("admin_config_page_table_th_config");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_variable");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_desc");?></th>
                    	</tr>
                    	<?php $zh["list"]["c"]["total"]=0;if(isset($config) && !empty($config)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                        	<?php if($c['type'] == 'COOKIE配置'){?>
                        		<tr>
	                        		<td><?php echo L($c['title']);?></td>
	                        		<td><?php echo $c['html'];?></td>
	                        		<td><?php echo $c['name'];?></td>
	                        		<td><?php echo L($c['message']);?></td>
                        		</tr>
                            <?php }?>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>
                <div id="session">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150"><?php echo L("admin_config_page_table_th_title");?></th>
                    		<th><?php echo L("admin_config_page_table_th_config");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_variable");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_desc");?></th>
                    	</tr>
                    	<?php $zh["list"]["c"]["total"]=0;if(isset($config) && !empty($config)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                        	<?php if($c['type'] == 'SESSION配置'){?>
                        		<tr>
	                        		<td><?php echo L($c['title']);?></td>
	                        		<td><?php echo $c['html'];?></td>
	                        		<td><?php echo $c['name'];?></td>
	                        		<td><?php echo L($c['message']);?></td>
                        		</tr>
                            <?php }?>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>
                <div id="ec_shop_info">
                    <table class="table1">
                        <tr style="background: #E6E6E6;">
                    		<th  class="w150"><?php echo L("admin_config_page_table_th_title");?></th>
                    		<th><?php echo L("admin_config_page_table_th_config");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_variable");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_desc");?></th>
                    	</tr>
                        <?php $zh["list"]["c"]["total"]=0;if(isset($config) && !empty($config)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                        	<?php if($c['type'] == '网店信息'){?>
                        		<tr>
	                        		<td><?php echo L($c['title']);?></td>
	                        		<td><?php echo $c['html'];?></td>
	                        		<td><?php echo $c['name'];?></td>
	                        		<td><?php echo L($c['message']);?></td>
                        		</tr>
                            <?php }?>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>  
                <div id="ec_basic">
                    <table class="table1">
                        <tr style="background: #E6E6E6;">
                    		<th  class="w150"><?php echo L("admin_config_page_table_th_title");?></th>
                    		<th><?php echo L("admin_config_page_table_th_config");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_variable");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_desc");?></th>
                    	</tr>
                        
                        <?php $zh["list"]["c"]["total"]=0;if(isset($config) && !empty($config)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                        	<?php if($c['type'] == 'EC基本设置'){?>
                                <?php if($c['name'] == 'EC_SHOP_COUNTRY'){?>
                                    <tr>
    	                        		<td><?php echo L($c['title']);?></td>
    	                        		<td>
                                        <select name="EC_SHOP_COUNTRY" id="selCountries" onchange="region.changed(this, 1, 'selProvinces')">
                                            <option value=''>请选择...</option>
                                            <?php if(is_array($countries)):?><?php $index=0; ?><?php  foreach($countries as $region){ ?>
                                                <option value="<?php echo $region['region_id'];?>" <?php if($region['region_id'] == $cfg['ec_shop_country']){?>selected<?php }?> ><?php echo $region['region_name'];?></option>
                                            <?php $index++; ?><?php }?><?php endif;?>
                                        </select>
                                        </td>
    	                        		<td><?php echo $c['name'];?></td>
    	                        		<td><?php echo L($c['message']);?></td>
                            		</tr>
                                <?php  }elseif($c['name'] == 'EC_SHOP_PROVINCE'){ ?>
                                    <tr>
    	                        		<td><?php echo L($c['title']);?></td>
    	                        		<td>
                                            <select name="EC_SHOP_PROVINCE" id="selProvinces" onchange="region.changed(this, 2, 'selCities')">
                                                <option value=''>请选择...</option>
                                                <?php if(is_array($provinces)):?><?php $index=0; ?><?php  foreach($provinces as $region){ ?>
                                                    <option value="<?php echo $region['region_id'];?>" <?php if($region['region_id'] == $cfg['ec_shop_province']){?>selected<?php }?>><?php echo $region['region_name'];?></option>
                                                <?php $index++; ?><?php }?><?php endif;?>
                                            </select>
                                        </td>
    	                        		<td><?php echo $c['name'];?></td>
    	                        		<td><?php echo L($c['message']);?></td>
                            		</tr>
                                <?php  }elseif($c['name'] == 'EC_SHOP_CITY'){ ?>
                                    <tr>
    	                        		<td><?php echo L($c['title']);?></td>
    	                        		<td>
                                            <select name="EC_SHOP_CITY" id="selCities">
                                                <option value=''>请选择...</option>
                                                <?php if(is_array($cities)):?><?php $index=0; ?><?php  foreach($cities as $region){ ?>
                                                    <option value="<?php echo $region['region_id'];?>" <?php if($region['region_id'] == $cfg['ec_shop_city']){?>selected<?php }?>><?php echo $region['region_name'];?></option>
                                                <?php $index++; ?><?php }?><?php endif;?>
                                            </select>
                                        </td>
    	                        		<td><?php echo $c['name'];?></td>
    	                        		<td><?php echo L($c['message']);?></td>
                            		</tr>
                                <?php  }else{ ?>
                                    <tr>
    	                        		<td><?php echo L($c['title']);?></td>
    	                        		<td><?php echo $c['html'];?></td>
    	                        		<td><?php echo $c['name'];?></td>
    	                        		<td><?php echo L($c['message']);?></td>
                            		</tr>
                                <?php }?>
                            <?php }?>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div>  
                <div id="ec_display">
                    <table class="table1">
                        <tr style="background: #E6E6E6;">
                    		<th  class="w150"><?php echo L("admin_config_page_table_th_title");?></th>
                    		<th><?php echo L("admin_config_page_table_th_config");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_variable");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_desc");?></th>
                    	</tr>
                        <?php $zh["list"]["c"]["total"]=0;if(isset($config) && !empty($config)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                        	<?php if($c['type'] == 'EC显示设置'){?>
                        		<tr>
	                        		<td><?php echo L($c['title']);?></td>
	                        		<td><?php echo $c['html'];?></td>
	                        		<td><?php echo $c['name'];?></td>
	                        		<td><?php echo L($c['message']);?></td>
                        		</tr>
                            <?php }?>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div> 
                <div id="ec_shopping_flow">
                    <table class="table1">
                        <tr style="background: #E6E6E6;">
                    		<th  class="w150"><?php echo L("admin_config_page_table_th_title");?></th>
                    		<th><?php echo L("admin_config_page_table_th_config");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_variable");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_desc");?></th>
                    	</tr>
                        <?php $zh["list"]["c"]["total"]=0;if(isset($config) && !empty($config)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                        	<?php if($c['type'] == 'EC购物流程'){?>
                        		<tr>
	                        		<td><?php echo L($c['title']);?></td>
	                        		<td><?php echo $c['html'];?></td>
	                        		<td><?php echo $c['name'];?></td>
	                        		<td><?php echo L($c['message']);?></td>
                        		</tr>
                            <?php }?>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div> 
                
                <div id="ec_goods_display">
                    <table class="table1">
                        <tr style="background: #E6E6E6;">
                    		<th  class="w150"><?php echo L("admin_config_page_table_th_title");?></th>
                    		<th><?php echo L("admin_config_page_table_th_config");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_variable");?></th>
                    		<th class="w300"><?php echo L("admin_config_page_table_th_desc");?></th>
                    	</tr>
                        <?php $zh["list"]["c"]["total"]=0;if(isset($config) && !empty($config)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($config));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($config,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                        	<?php if($c['type'] == 'EC商品显示设置'){?>
                        		<tr>
	                        		<td><?php echo L($c['title']);?></td>
	                        		<td><?php echo $c['html'];?></td>
	                        		<td><?php echo $c['name'];?></td>
	                        		<td><?php echo L($c['message']);?></td>
                        		</tr>
                            <?php }?>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </table>
                </div> 
            </div>
        </div>
        <br /><br /><br /><br /><br /><br />
    </div>
    
    <div class="position-bottom">
        <input type="submit" class="zh-success" value="確認"/>
    </div>
</form>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/transport.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/common.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/region.js"></script>
<script type="text/javascript" charset="utf-8">
region.isAdmin = true;

	$("#checkEmail").click(function(){
		$.post("<?php echo U('checkEmail');?>",$('form').serialize(),function(json){
				if(json.state){
					alert(json.message);
				}else{
					alert(json.message);
				}
			},'json');
	});
</script>
</body>
</html>