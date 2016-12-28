<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>属性管理</title>
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
<div class="wrap">


    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">采集管理</a></li>
            <li><a href="{|U:'add'}">添加采集点</a></li>
        </ul>
    </div>
    <form name="myform" action="?m=del&c=Collection&a=Admin" method="post" onsubmit="return confirm('您确定要删除吗？')">
    	<div class="table-list">
            <table width="100%" cellspacing="0">
                <thead>
            		<tr>
            			<th  align="left" width="20"><input type="checkbox" value="" id="check_box" onclick="selectall('nodeid[]');"/></th>
            			<th align="left">ID</th>
            			<th align="left">名称</th>
            			<th align="left">最后采集时间</th>
            			<th align="left">内容操作</th>
            			<th align="left">操作</th>
            		</tr>
            	</thead>
                <tbody>
                    <?php
                    	foreach($nodelist as $k=>$v) {
                    ?>
                    <tr>
                		<td align="left"><input type="checkbox" value="<?php echo $v['nodeid']?>" name="nodeid[]"></td>
                		<td align="left"><?php echo $v['nodeid']?></td>
                		<td align="left"><?php echo $v['name']?></td>
                		<td align="left"><?php echo format::date($v['lastdate'], 1)?></td>
                		<td align="left"><a href="{|U:'col_url_list'}&nodeid=<?php echo $v['nodeid']?>">[采集网址]</a> 
                		<a href="{|U:'col_content'}&nodeid=<?php echo $v['nodeid']?>">[采集内容]</a>
                		 <a href="{|U:'publist'}&nodeid=<?php echo $v['nodeid']?>&status=2" style="color:red">[内容发布]</a>
                		</td>
                		<td align="left">
                		<a href="javascript:void(0)" onclick="test_spider(<?php echo $v['nodeid']?>)">[测试]</a>
                		
                		<a href="?m=edit&c=Collection&a=Admin&nodeid=<?php echo $v['nodeid']?>&menuid=957">[修改]</a>
                		 <a href="javascript:void(0)"  onclick="copy_spider(<?php echo $v['nodeid']?>)">[复制]</a>
                		 <a href="?m=collection&c=node&a=export&nodeid=<?php echo $v['nodeid']?>">[导出]</a>
                		
                		 </td>
                    </tr>
                    <?php
                    	}
                    
                    ?>
                </tbody>
            </table>
            <div class="btn">
                <label for="check_box">全选/取消</label> 
                <input type="submit" class="button" name="dosubmit" value="删除"/>
                <input type="button" class="button" value="导入采集点" onclick="import_spider()" />
            </div>
            <div id="pages"><?php echo $pages?></div>
        </div>
    </form>
</div>
</body>
<script>

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
function test_spider(id) {
    
    var url=APP+'&c=Collection&m=public_test&nodeid='+id;
    $.modal({
		title : '测试采集',
		button_cancel : '关闭',
		width : 900,
		height : 600,
		content : '<iframe frameborder=0 scrolling="yes" style="height:99%;border:none;" src="' + url + '"></iframe>'
	});	
    
    
	//window.top.art.dialog({id:'test'}).close();
	//window.top.art.dialog({title:'测试采集',id:'test',iframe:'?m=public_test&c=Collection&a=Admin&nodeid='+id,width:'700',height:'500'}, '', function(){window.top.art.dialog({id:'test'}).close()});
}

</script>
</html>