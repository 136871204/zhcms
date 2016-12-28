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
    <div class="pad-10">
        <div class="col-tab">
            <ul class="tabBut cu-li">
                <li class="on" id="tab_1">网址列表</li>
            </ul>
            <div class="content pad-10" id="show_div_1" style="height:auto">
                <b>网址列表</b>：<?php echo $url_list;?><br/><br/>
                <?php echo '总共'; ?>：<?php echo $total;?><?php echo '条记录。重复记录';?>：<?php echo $re;?><?php echo '。去除重复记录，共入库';?><?php echo $total-$re;?>
                <br/><br/>
                <?php if (is_array($url))foreach ($url as $v):?>
                <?php echo $v['title'].'<br>'.$v['url'];?>
                <hr size="1" />
                <?php endforeach;?>
                
                <?php if ($total_page > $page) {
                	echo  "<script type='text/javascript'>location.href='?m=col_url_list&c=Collection&a=Admin&page=".($page+1)."&nodeid=$nodeid".''."'</script>";
                } else {?>
                    <h2>采集完成！</h2>
                    <span style="fotn-size:16px;">您可以进行以下的操作：</span><br />
                    <ul style="fotn-size:14px;">
                        <li>
                            <a href="{|U:'col_content'}&nodeid=<?php echo $nodeid?>"  >
                                1、开始采集文章内容
                            </a>
                        </li>
                        <li>
                            <a href="{|U:'manage'}"  >
                                2、返回采集点管理
                            </a>
                        </li>
                    </ul>
                	<script type="text/javascript">
                	/*window.top.art.dialog({id:'test'}).close();
                	window.top.art.dialog({
                	                       id:'test',
                                           content:'<h2>采集完成！</h2>'+
                                                    '<span style="fotn-size:16px;">您可以进行以下的操作：</span><br />'+
                                                    '<ul style="fotn-size:14px;">'+
                                                        '<li><a href="?m=collection&c=node&a=col_content&nodeid=<?php echo $nodeid?>" target="right"  onclick="window.top.art.dialog({id:\'test\'}).close()">1、开始采集文章内容</a></li>'+
                                                        '<li><a href="?m=manage&c=Collection&a=Admin" target="right" onclick="window.top.art.dialog({id:\'test\'}).close()">2、返回采集点管理</a></li>'+
                                                    '</ul>',width:'400',height:'200'});*/
                	
                	</script>
                <?php }?>
            </div>
        </div>
    </div>
</body>

</html>