<?php if (!defined("ZHPHP_PATH")) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加采集点</title>
    <zhjs/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <css file="__CONTROL_TPL__/css/reset.css"/>
    <css file="__CONTROL_TPL__/css/zh-cn-system.css"/>
    <css file="__CONTROL_TPL__/css/table_form.css"/>
    <css file="__CONTROL_TPL__/css/dialog.css"/>
    <css file="__CONTROL_TPL__/css/style/zh-cn-styles1.css"/>
    <js file="__CONTROL_TPL__/js/add.js"/>
    <js file="__CONTROL_TPL__/js/dialog.js"/>
    <js file="__CONTROL_TPL__/js/formvalidator.js"/>
    <js file="__CONTROL_TPL__/js/formvalidatorregex.js"/>
    
    
</head>
<body>
<style>
<!--
#show_funcs_div{position:absolute ;background-color:#fff;border:#D0D0D0 solid 1px; border-top-style:none;display:none}
.show_funcs_div{height:200px;overflow-y:scroll;}
#show_funcs_div ul li{padding:3px 0 3px 5px;}
#show_funcs_div ul li:hover{background-color:#EEEEEE;cursor:hand;}
.funcs_div{background:#fff; width:160px; border:solid #D0D0D0 1px;}
.funcs{border:none;background:none}
-->
</style>
    <div id="show_funcs_div" onmouseover="clearh()" onmouseout="hidden_funcs_div_1()">
        <ul>
            <?php if (isset($spider_funs) && is_array($spider_funs)) foreach ($spider_funs as $k=>$v):?>
            <li onclick="insert_txt('<?php echo $k;?>')"><?php echo $v?>(<?php echo $k;?>)</li>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="pad-lr-10">
        <form name="myform" action="?m=import_program_add&c=Collection&a=Admin&nodeid=<?php if(isset($nodeid)) echo $nodeid?>&type=<?php echo $type?>&ids=<?php echo $ids?>&cid=<?php echo $cid?>&table_name=<?php echo $table_name?>" method="post" id="myform">
            <fieldset>
                <legend>新建发布方案</legend>
                <table width="100%" class="table_form">
                    <tr>
                        <td width="120">方案名：</td>
                        <td>
                            <input type="text" name="program_name" size="60" required="true"/>
                        </td>
                    </tr>
                    <if value="!empty($cat['catname'])">
                    <tr>
                        <td width="120">栏目：</td> 
                        <td>
                            <?php echo $cat['catname'];?>
                        </td>
                    </tr>
                    </if>
                    <if value="!empty($table_name)">
                    <tr>
                        <td width="120">表格名：</td> 
                        <td>
                            <?php echo $table_name;?>
                        </td>
                    </tr>
                    </if>
                    <tr>
                        <td width="120">自动提取摘要：</td> 
                        <td>
                            <label>
                                <input name="add_introduce" type="checkbox"  value="1"/>
                                是否截取内容
                            </label>
                            <input type="text" name="introcude_length" value="200" size="3"/>
                                字符至内容摘要
                        </td>
                    </tr>
                    <tr>
                        <td width="120">自动提取缩略图：</td> 
                        <td>
                            <label>
                                <input type='checkbox' name='auto_thumb' value="1"/>
                                是否获取内容第
                            </label>
                            <input type="text" name="auto_thumb_no" value="1" size="2" class=""/>
                            张图片作为标题图片
                        </td>
                    </tr>
                </table>
            </fieldset>
            <div class="bk10"></div>
            <fieldset>
                <legend>标签与数据库对应关系</legend>
                <div class="table-list">
                    <table width="100%" cellspacing="0">
                        <thead>
                    		<tr>
                    			<th align="left">原数据库字段</th>
                    			<th align="left">数据库字段说明</th>
                    			<th align="left">标签字段（采集填充结果）</th>
                    			<th align="left">处理函数</th>
                    		</tr>
                    	</thead>
                        <tbody>
                        <?php
                        	foreach($model as $k=>$v) {
                        		if (in_array($v['formtype'], array('catid', 'typeid', 'posids', 'groupid', 'readpoint','template'))) continue;
                        ?>
                        <tr>
                            <td align="left"><?php echo $v['field_name']?></td>
                            <td align="left"><?php echo $v['title']?></td>
                            <td align="left">
                                <input type="hidden" name="model_field[]" value="<?php echo $v['field_name']?>"/>
                                <?php echo form::select($node_field, (in_array($v['field'], array('inputtime', 'updatetime')) ? 'time' : $v['field']), 'name="node_field[]"')?>
                            </td>
                            <td align="left">
                                <div class="funcs_div">
                                    <input type="text" name="funcs[]" class="funcs"/>
                                    <a href="javascript:void(0)" onclick="clearh();show_funcs(this);" onmouseout="hidden_funcs_div_1()">
                                        <img src="__STATIC__/phpcms/admin_img/toggle-collapse-dark.png"/>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php
                        	}
                        ?>
                        </tbody>
                    </table>
                </div>
            </fieldset>
            <div class="btn">
                <input type="submit" class="button" name="dosubmit" value="提交"/>
            </div>
        </form>
    </div>
<script type="text/javascript">
var div_obj;
function show_funcs(obj) {
	div_obj = $(obj).parent('div');
	var pos = $(obj).parent('div').offset();
	$('#show_funcs_div').css('left',pos.left+'px').css('top',(pos.top+24)+'px').width($(obj).parent().width()).show();
}

var s = 0;
var h;
function hidden_funcs_div_2() {
	s++;
	if(s>=5) {
		$('#show_funcs_div').hide().css('left','0px').css('top','0px');
		clearInterval(h);
		s = 0;
	}
}


function clearh(){
	if(h)clearInterval(h);
}


function hidden_funcs_div_1() {
	h = setInterval("hidden_funcs_div_2()", 1);
}

function insert_txt(obj) {
	$(div_obj).children('input').val(obj);
}

</script>
</body>

</html>