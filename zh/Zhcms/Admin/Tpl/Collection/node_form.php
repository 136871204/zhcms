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
    <div class="subnav">
        <div class="content-menu ib-a blue line-x">
            <a href='?m=manage&c=Collection&a=Admin' ><em>采集管理</em></a>
            <span>|</span>
            <a href='javascript:;' class="on"><em>添加采集点</em></a>  
        </div>
    </div>
    <style type="text/css">
    	html{_overflow-y:scroll}
    </style>
    <script type="text/javascript">
    $(document).ready(function() {
    	$.formValidator.initConfig(
                {
                    formid:"myform",
                    autotip:true,
                    onerror:function(msg,obj){
                        window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'})
                    }
                }
        );
    	/*$("#name").formValidator( 
                            {onshow:"请输入名称",onfocus:"请输入名称"}
                    ).inputValidator(
                            {min:1,onerror:"请输入名称"}
                    ).ajaxValidator(
                            {
                                type : "get",url : "",data :"a=Admin&c=Collection&m=public_name<?php if(METHOD=='edit')echo "&nodeid=$data[nodeid]"?>",
                                datatype : "html",async:'false',
                                success : function(data){	 
                                    if( data == "1" ){return true;}
                                    else{return false;}
                                },
                                buttons: $("#dosubmit"),onerror : "名称已存在。",onwait : "正在连接，请稍候。"
                            }
                    );*/
    
    });
    </script>
    <div class="pad-10">
        <div class="col-tab">
            <ul class="tabBut cu-li">
                <li class="on" id="tab_1"><a href="javascript:show_div('1')">网址规则</a></li>
                <li  id="tab_2"><a href="javascript:show_div('2')">内容规则</a></li>
                <li  id="tab_3"><a href="javascript:show_div('3')">自定义规则</a></li>
                <li  id="tab_4"><a href="javascript:show_div('4')">高级配置</a></li>
            </ul>
            <form name="myform" action="?m=<?php echo METHOD;?>&c=Collection&a=Admin&nodeid=<?php if(isset($nodeid)) echo $nodeid?>" method="post" id="myform">
                <div class="content pad-10" id="show_div_1" style="height:auto">
                    <div class="common-form">
                        <fieldset>
                            <legend>基本信息</legend>
                            <table width="100%" class="table_form">
                                <tr>
                                    <td width="120">采集项目名：</td> 
                                    <td>
                                    <input type="text" name="data[name]" id="name"  class="input-text" value="<?php if(isset($data['name'])) echo $data['name']?>"/>
                                    </td>
                                </tr>
                                <tr>
                        			<td width="120">采集页面编码：</td> 
                        			<td>
                                    <?php echo form::radio(
                                                    array('gbk'=>'GBK', 'utf-8'=>'UTF-8', 'big5'=>'BIG5'), 
                                                    (isset($data['sourcecharset']) ? $data['sourcecharset'] : 'gbk'), 
                                                    'name="data[sourcecharset]"')?>			
                                    </td>
                        		</tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>网址采集</legend>
                            <table width="100%" class="table_form">
                                <tr>
                        			<td width="120">网址类型：</td> 
                        			<td>
                                    <?php echo form::radio(
                                                $url_list_type, 
                                                (isset($data['sourcetype']) ? $data['sourcetype'] : '1'), 
                                                'name="data[sourcetype]" onclick="show_url_type(this.value)"')?>			
                                    </td>
                        		</tr>
                                <tbody id="url_type_1" >
                                <tr>
                        			<td width="120">网址配置：</td> 
                        			<td>
                        			     <input type="text" name="urlpage1" id="urlpage_1" size="100" value="<?php if(isset($data['sourcetype']) && $data['sourcetype'] == 1 && isset($data['urlpage'])) echo $data['urlpage'];?>"/> 
                                         <input type="button" class="button" onclick="show_url()" value="测试"/>
                                         <br /> 
                        			     (如：http://www.phpcms.cn/help/rumen/(*).html,页码使用<span style="color: red;">(*)</span>做为通配符。<br />
                        			     页码从: 
                                         <input type="text" name="data[pagesize_start]"  size="4" value="<?php if(isset($data['sourcetype']) && $data['sourcetype'] == 1 && isset($data['pagesize_start'])) { echo $data['pagesize_start'];} else { echo '1';}?>"/> 到 
                                         <input type="text" name="data[pagesize_end]"  size="4" value="<?php if(isset($data['sourcetype']) && $data['sourcetype'] == 1 && isset($data['pagesize_end'])) { echo $data['pagesize_end'];} else { echo '10';}?>" /> 每次增加 
                                         <input type="text" name="data[par_num]" size="4"  value="<?php if(isset($data['sourcetype']) && $data['sourcetype'] == 1 && isset($data['par_num'])) { echo $data['par_num'];} else { echo '1';}?>"/>
                        			</td>
                        		</tr>
                                </tbody>
                                <tbody id="url_type_2"   <?php if (!isset($data['sourcetype']) || $data['sourcetype'] != 2){echo ' style="display:none"';}?>>
                                    <tr>
                            			<td width="120">网址配置：</td> 
                            			<td>
                            			<textarea rows="10" cols="80" name="urlpage2" id="urlpage_2" >
                                        <?php if(isset($data['sourcetype']) && $data['sourcetype'] == 2 && isset($data['urlpage'])) { echo $data['urlpage'];}?>
                                        </textarea> 
                                        <br/>每行一条			</td>
                            		</tr>
                                </tbody>
                                <tbody id="url_type_3"   <?php if (!isset($data['sourcetype']) || $data['sourcetype'] != 3){echo ' style="display:none"';}?>>
                            		<tr>
                            			<td width="120">网址配置：</td> 
                            			<td>
                            			 <input type="text" name="urlpage3" id="urlpage_3" size="100" value="<?php if(isset($data['sourcetype']) && $data['sourcetype'] == 3 && isset($data['urlpage'])) { echo $data['urlpage'];}?>"/>
                            			</td>
                            		</tr>
                        		</tbody>
                                <tbody id="url_type_4"   <?php if (!isset($data['sourcetype']) || $data['sourcetype'] != 4){echo ' style="display:none"';}?>>
                            		<tr>
                            			<td width="120">网址配置：</td> 
                            			<td>
                            			 <input type="text" name="urlpage4" id="urlpage_4" size="100" value="<?php if(isset($data['sourcetype']) && $data['sourcetype'] == 4 && isset($data['urlpage'])) { echo $data['urlpage'];}?>"/>
                            			</td>
                            		</tr>
                        		</tbody>
                        		<tr>
                        			<td width="120">网址配置：</td> 
                        			<td>
                        			网址中必须包含 
                                    <input type="text" name="data[url_contain]"  value="<?php if(isset($data['url_contain'])) echo $data['url_contain']?>"/> 
                                    网址中不得包含  
                                    <input type="text" name="data[url_except]"  value="<?php if(isset($data['url_except'])) echo $data['url_except']?>"/>
                        			</td>
                        		</tr>
                                <tr>
                                	<td width="120">Base配置：</td> 
                                	<td>
                                    	<input type="text" name="data[page_base]"  value="<?php if(isset($data['page_base'])) echo $data['page_base']?>" size="100" />
                                        <br/>
                                    	如果目标网站配置了Base请设置。			
                                    </td>
                                </tr>
                                <tr>
                        			<td width="120">获取网址：</td> 
                        			<td>
                        			从 <textarea rows="10" cols="40" name="data[url_start]"><?php if(isset($data['url_start'])) echo $data['url_start']?></textarea> 
                                    到 <textarea rows="10" name="data[url_end]" cols="40"><?php if(isset($data['url_end'])) echo $data['url_end']?></textarea> 
                                    结束		
                                   	</td>
                        		</tr>
                              </tbody>
                            </table>
                        </fieldset>
                    </div>
                </div>
                <div class="content pad-10" id="show_div_2" style="height:auto;display:none">
                    <div class="explain-col">
                        1、匹配规则请设置开始和结束符，具体内容使用“[内容]”做为通配符 。<br/>
                        2、过滤选项格式为“要过滤的内容[|]替换值”，要过滤的内容支持正则表达式，每行一条。<br/>
                    </div>
                    <div class="bk15"></div>
                    <input type="button" class="button" value="全部展开" onclick="$('#show_div_2').children('fieldset').children('.table_form').show()"/> 
                    <input type="button" class="button" value="全部合上" onclick="$('#show_div_2').children('fieldset').children('.table_form').hide()"/>
                    <fieldset>
                        <legend><a href="javascript:void(0)" onclick="$(this).parent().parent().children('table').toggle()">标题规则</a></legend>
                        <table width="100%" class="table_form">
                    		<tr>
                    			<td width="120">匹配规则：</td> 
                    			<td>
                    			     <textarea rows="5" cols="40" name="data[title_rule]" id="title_rule"><?php if(isset($data['title_rule'])) {echo $data['title_rule'];}else{echo '<title>'.'[content]'.'</title>';}?></textarea> 
                                    <br/>
                                    使用"<span style="color: red;">[content]</span>"作为通配符
                    			</td>
                    			<td width="120">过滤选项：</td> 
                    			<td>
                    			     <textarea rows="5" cols="50" name="data[title_html_rule]" id="title_html_rule"><?php if(isset($data['title_html_rule'])) echo $data['title_html_rule']?></textarea>
                    			     <input type="button" value="选择" class="button"  onclick="html_role('data[title_html_rule]')"/>
                    			</td>
                    		</tr>
                    	</table>
                    </fieldset>
                    <fieldset>
                    	<legend><a href="javascript:void(0)" onclick="$(this).parent().parent().children('table').toggle()">作者规则</a></legend>
                    	<table width="100%" class="table_form" style="display:none">
                    		<tr>
                    			<td width="120">匹配规则：</td> 
                    			<td>
                    			     <textarea rows="5" cols="40" name="data[author_rule]" id="author_rule"><?php if(isset($data['author_rule'])) echo $data['author_rule']?></textarea>  
                                    <br/>使用"<span style="color: red;">[content]</span>"作为通配符	
                     		     </td>
                    			<td width="120">过滤选项：</td> 
                    			<td>
                    			     <textarea rows="5" cols="50" name="data[author_html_rule]" id="author_html_rule"><?php if(isset($data['author_html_rule'])) echo $data['author_html_rule']?></textarea>
                    			     <input type="button" value="选择" class="button"  onclick="html_role('data[author_html_rule]')"/>
                    			</td>
                    		</tr>
                    	</table>
                    </fieldset>
                    <fieldset>
                    	<legend><a href="javascript:void(0)" onclick="$(this).parent().parent().children('table').toggle()">来源规则</a></legend>
                    	<table width="100%" class="table_form" style="display:none">
                    		<tr>
                    			<td width="120">匹配规则：</td> 
                    			<td>
                    			<textarea rows="5" cols="40" name="data[comeform_rule]" id="comeform_rule"><?php if(isset($data['comeform_rule'])) echo $data['comeform_rule']?></textarea> 
                                <br/>使用"<span style="color: red;">[content]</span>"作为通配符			</td>
                    			<td width="120">过滤选项：</td> 
                    			<td>
                    			<textarea rows="5" cols="50" name="data[comeform_html_rule]" id="comeform_html_rule"><?php if(isset($data['comeform_html_rule'])) echo $data['comeform_html_rule']?></textarea>
                    			<input type="button" value="选择" class="button"  onclick="html_role('data[comeform_html_rule]')"/>
                    			</td>
                    		</tr>
                    	</table>
                    </fieldset>
                    <fieldset>
                    	<legend><a href="javascript:void(0)" onclick="$(this).parent().parent().children('table').toggle()">时间规则</a></legend>
                    	<table width="100%" class="table_form"  style="display:none">
                    		<tr>
                    			<td width="120">匹配规则：</td> 
                    			<td>
                    			<textarea rows="5" cols="40" name="data[time_rule]" id="time_rule"><?php if(isset($data['time_rule'])) echo $data['time_rule']?></textarea> 
                                <br/>使用"<span style="color: red;">[content]</span>"作为通配符			</td>
                    			<td width="120">过滤选项：</td> 
                    			<td>
                    			<textarea rows="5" cols="50" name="data[time_html_rule]" id="time_html_rule"><?php if(isset($data['time_html_rule'])) echo $data['time_html_rule']?></textarea>
                    			<input type="button" value="选择" class="button"  onclick="html_role('data[time_html_rule]')"/>
                    			</td>
                    		</tr>
                    	</table>
                    </fieldset>
                    <fieldset>
                    	<legend><a href="javascript:void(0)" onclick="$(this).parent().parent().children('table').toggle()">内容规则</a></legend>
                    	<table width="100%" class="table_form" style="display:none">
                    		<tr>
                    			<td width="120">匹配规则：</td> 
                    			<td>
                    			<textarea rows="5" cols="40" name="data[content_rule]" id="content_rule"><?php if(isset($data['content_rule'])) echo $data['content_rule']?></textarea> 
                                <br/>使用"<span style="color: red;">[content]</span>"作为通配符			</td>
                    			<td width="120">过滤选项：</td> 
                    			<td>
                    			<textarea rows="5" cols="50" name="data[content_html_rule]" id="content_html_rule"><?php if(isset($data['content_html_rule'])) echo $data['content_html_rule']?></textarea>
                    			<input type="button" value="选择" class="button"  onclick="html_role('data[content_html_rule]')"/>
                    			</td>
                    		</tr>
                    	</table>
                    </fieldset>
                    <fieldset>
                    	<legend><a href="javascript:void(0)" onclick="$(this).parent().parent().children('table').toggle()">内容分页规则</a></legend>
                    	<table width="100%" class="table_form" style="display:none">
                    		<tr>
                    			<td width="120">分页模式：</td> 
                    			<td>
                                    <?php echo form::radio(
                                                            array('1'=>'全部列出模式', '2'=>'上下页模式	'), (isset($data['content_page_rule']) ? $data['content_page_rule'] : 1), 
                                                            'name="data[content_page_rule]" onclick="show_nextpage(this.value)"')?>
                                </td>
                   			</tr>
                    		<tbody id="nextpage" <?php if(!isset($data['content_page_rule']) || $data['content_page_rule']!=2) echo 'style="display:none"'?>>
                    			<tr>
                        			 <td width="120">下一页规则：</td> 
                        			 <td>
                        			     <input type="text" name="data[content_nextpage]" size="100" value="<?php if(isset($data['content_nextpage'])) echo $data['content_nextpage']?>"/><br/>
                        			     请填写下一页超链接中间的代码。如：<a href="http://www.zhcms.cn/page_1.html">下一页</a>，他的“下一页规则”为“下一页”。			
                                    </td>
                    			</tr>
                    		</tbody>
                    		<tr>
                    			<td width="120">匹配规则：</td> 
                    			<td>
                    			从 
                                <textarea rows="5" cols="40" name="data[content_page_start]" id="content_page_start"><?php if(isset($data['content_page_start'])) echo $data['content_page_start']?></textarea> 
                                到 
                                <textarea rows="5" cols="40" name="data[content_page_end]" id="content_page_end"><?php if(isset($data['content_page_end'])) echo $data['content_page_end']?></textarea>
                    			</td>
                    			</tr>
                    	</table>
                    </fieldset>
                </div>
                <div class="content pad-10" id="show_div_3" style="height:auto;display:none">
                    <input type="button" class="button" value="添加项目" onclick="add_caiji()"/>
                    <div class="bk10"></div>
                    <table width="100%" class="table_form" id="customize_config">
                        <?php  if(isset($data['customize_config']) && is_array($data['customize_config'])) foreach ($data['customize_config'] as $k=>$v): ?>
                        <tbody id="customize_config_<?php echo $k?>">
                            <tr  style="background-color:#FBFFE4">
                                <td>规则名：</td>
                                <td>
                                    <input type="text" name="customize_config[name][<?php echo $k?>]" value="<?php echo $v['name']?>" class="input-text" />
                                </td>
                                <td>规则英文名：</td>
                                <td>
                                    <input type="text" name="customize_config[en_name][<?php echo $k?>]" value="<?php echo $v['en_name']?>" class="input-text" />
                                </td>
                                <td>是否图片：</td>
                                <td>
                                    <input  type="radio" name="customize_config[is_image][<?php echo $k?>]" value="0"  <?php if(isset($v['is_image']) && $v['is_image']=='0' ) echo 'checked'?>/>不是
                                    <input  type="radio" name="customize_config[is_image][<?php echo $k?>]" value="1" <?php if(isset($v['is_image']) && $v['is_image']=='1' ) echo 'checked'?>/>是
                                </td>
                            </tr>
                            <tr >
                                <td width="120">匹配规则：</td>
                                <td>
                                    <textarea rows="5" cols="40" name="customize_config[rule][<?php echo $k?>]" id="rule_<?php echo $k?>"><?php echo $v['rule']?></textarea> 
                                    <br/>使用"<span style="color: red;">[content]</span>"作为通配符
                                </td>
                                <td width="120">过滤选项：</td>
                                <td>
                                    <textarea rows="5" cols="50" name="customize_config[html_rule][<?php echo $k?>]"><?php echo $v['html_rule']?></textarea>
                                    <input type="button" value="选择" class="button"  onclick="html_role('customize_config[html_rule][<?php echo $k?>]')">
                                </td>
                            </tr>
                            <tr  >
                                <td width="120">是否正则：</td>
                                <td>
                                    <input  type="radio" name="customize_config[is_preg][<?php echo $k?>]" value="0"  <?php if(isset($v['is_preg']) && $v['is_preg']=='0' ) echo 'checked'?>/>不是
                                    <input  type="radio" name="customize_config[is_preg][<?php echo $k?>]" value="1" <?php if(isset($v['is_preg']) && $v['is_preg']=='1' ) echo 'checked'?>/>是
                                </td>
                                <td width="120">取得序列</td>
                                <td>
                                    <input type="text" name="customize_config[preg_index][<?php echo $k?>]" value="<?php echo $v['preg_index']?>" class="input-text" />
                                </td>
                            </tr>
                        </tbody>
                        <?php endforeach;?>
                    </table>
                </div>
                <div class="content pad-10" id="show_div_4" style="height:auto;display:none">
                    <table width="100%" class="table_form" >
                        <tr>
                			<td width="120">下载图片：</td> 
                			<td>
                			<?php echo form::radio(
                                                        array('1'=>'下载图片', '0'=>'不下载'), 
                                                        (isset($data['down_attachment']) ? $data['down_attachment'] : '0'), 
                                                        'name="data[down_attachment]"')?>
                            		
                           	</td>
                		</tr>
                		<tr>
                			<td width="120">图片水印：</td> 
                			<td>
                                <?php echo form::radio(
                                                        array('1'=>'打水印', '0'=>'不打水印'),
                                                         (isset($data['watermark']) ? $data['watermark'] : '0'),
                                                          'name="data[watermark]"')?>			
                            </td>
                		</tr>
                		<tr>
                			<td width="120">内容分页：</td> 
                			<td>
                                <?php echo form::radio(
                                                    array('0'=>'不分页', '1'=>'按原文分页'), 
                                                    (isset($data['content_page']) ? $data['content_page'] : '1'), 
                                                    'name="data[content_page]"')?>
                			</td>
                		</tr>
                		<tr>
                			<td width="120">导入顺序：</td> 
                			<td>
                                <?php echo form::radio(
                                                    array('1'=>'与目标站相同', '2'=>'coll_order'), 
                                                    (isset($data['coll_order']) ? $data['coll_order'] : '1'), 
                                                    'name="data[coll_order]"')?>
                			</td>
                		</tr>
                    </table>
                </div>
                <div class="bk15"></div>
                <input name="dosubmit" type="submit" id="dosubmit" value="提交" class="button"/>
            </form>
        </div>
    </div>
</body>
<script>

/*
function insertText(id, text)
{
	$('#'+id).focus();
    var str = document.selection.createRange();
	str.text = text;
}*/

function show_url_type(obj) {
	var num = <?php echo count($url_list_type);?>;
	for (var i=1; i<=num; i++){
		if (obj==i){ 
			$('#url_type_'+i).show();
		} else {
			$('#url_type_'+i).hide();
		}
	}
}

function show_div(id) {
	for (var i=1;i<=4;i++) {
		if (id==i) {
			$('#tab_'+i).addClass('on');
			$('#show_div_'+i).show();
		} else {
			$('#tab_'+i).removeClass('on');
			$('#show_div_'+i).hide();
		}
	}
}


function show_url() {
	var type = $("input[type='radio'][name='data[sourcetype]']:checked").val();
    //alert(base64encode($('#urlpage_'+type).val()));
    var urlpage=escape($('#urlpage_'+type).val());
	//window.top.art.dialog({id:'test_url',iframe:'?m=public_url&c=Collection&a=Admin&sourcetype='+type+'&urlpage='+urlpage+'&pagesize_start='+$("input[name='data[pagesize_start]']").val()+'&pagesize_end='+$("input[name='data[pagesize_end]']").val()+'&par_num='+$("input[name='data[par_num]']").val(), title:'测试地址', width:'700', height:'450'}, '', function(){window.top.art.dialog({id:'test_url'}).close()});
	var url=APP+'&c=Collection&m=public_url&sourcetype='+type+'&urlpage='+urlpage+'&pagesize_start='+$("input[name='data[pagesize_start]']").val()+'&pagesize_end='+$("input[name='data[pagesize_end]']").val()+'&par_num='+$("input[name='data[par_num]']").val();
    $.modal({
		title : '测试地址',
		button_cancel : '关闭',
		width : 700,
		height : 600,
		content : '<iframe frameborder=0 scrolling="yes" style="height:99%;border:none;" src="' + url + '"></iframe>'
	});	
}


function anti_selectall(obj) {
	$("input[name='"+obj+"']").each(function(i,n){
		if (this.checked) {
			this.checked = false;
		} else {
			this.checked = true;
		}});
}


function show_nextpage(value) {
	if (value == 2) {
		$('#nextpage').show();
	} else {
		$('#nextpage').hide();
	}
}




var mi =<?php echo  isset($data['customize_config']) ? count($data['customize_config']) : 0?>;
//alert(i);

function add_caiji() {
	var html = '<tbody id="customize_config_'+mi+'">'+
                    '<tr style="background-color:#FBFFE4">'+
                        '<td>规则名：</td>'+
                        '<td><input type="text" name="customize_config[name][]" class="input-text" /></td>'+
                        '<td>规则英文名：</td>'+
                        '<td><input type="text" name="customize_config[en_name][]" class="input-text" /></td>'+
                        '<td>是否图片：</td>'+
                        '<td>'+
                        '<input type="radio" name="customize_config[is_image]['+mi+']" value="0" checked />不是'+
                        '<input type="radio" name="customize_config[is_image]['+mi+']" value="1"  />是'+
                        '</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td width="120">匹配规则：</td>'+
                        '<td>'+
                            '<textarea rows="5" cols="40" name="customize_config[rule][]" id="rule_'+mi+'"></textarea> '+
                            '<br/>使用"<span style="color:red">[content]</span>"作为通配符'+
                        '</td>'+
                        '<td width="120">过滤选项：</td>'+
                        '<td>'+
                            '<textarea rows="5" cols="50" name="customize_config[html_rule][]" id="content_html_rule_'+i+'"></textarea>'+
                            '<input type="button" value="选择" class="button"  onclick="html_role(\'content_html_rule_'+i+'\', 1)">'+
                        '</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td width="120">是否正则：</td>'+
                        '<td>'+
                            '<input type="radio" name="customize_config[is_preg]['+mi+']" value="0" checked />不是'+
                            '<input type="radio" name="customize_config[is_preg]['+mi+']" value="1"  />是'+
                        '</td>'+
                        '<td width="120">取得序列：</td>'+
                        '<td>'+
                        '<input type="text" name="customize_config[preg_index][]" class="input-text" />'+
                        '</td>'+
                    '</tr>'+
                '</tbody>';
	$('#customize_config').append(html);
	mi++;
}


function html_role(id, type) {
	art.dialog(
                {
                    id:'test_url',
                    content:'<?php echo form::checkbox($html_tag, '', 'name="html_rule"', '', '120')?><br/>'+
                                '<div class="bk15"></div>'+
                                    '<center>'+
                                        '<input type="button" value="全选" class="button"  onclick="selectall(\'html_rule\')"> '+
                                        '<input type="button" class="button"  value="反选" onclick="anti_selectall(\'html_rule\')">'+
                                    '</center>', 
                    width:'500', height:'150', lock: false
                }, function(){
                        var old = $("textarea[name='"+id+"']").val();
                        var str = '';
                        $("input[name='html_rule']:checked").each(
                            function(){
                                str+=$(this).val()+"\n";
                            }
                        );
                        $((type == 1 ? "#"+id :"textarea[name='"+id+"']")).val((old ? old+"\n" : '')+str);
                }, function(){
                    art.dialog({id:'test_url'}).close()
                }
        );
}

/**
 * 全选checkbox,注意：标识checkbox id固定为为check_box
 * @param string name 列表check名称,如 uid[]
 */
function selectall(name) {
	if ($("#check_box").attr("checked")=='checked') {
		$("input[name='"+name+"']").each(function() {
  			$(this).attr("checked","checked");
			
		});
	} else {
		$("input[name='"+name+"']").each(function() {
  			$(this).removeAttr("checked");
		});
	}
}


<?php if (METHOD == 'edit') echo '$(\'#show_div_2\').children(\'fieldset\').children(\'.table_form\').show();';?>

</script>
</html>