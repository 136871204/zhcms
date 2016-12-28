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
  <h1 class="title-2 line-x"><?php echo $node['name']?> - 文章列表</h1>
  <div class="pad-lr-10">
    <div class="col-tab">
        <ul class="tabBut cu-li">
            <li <?php if(empty($status)) echo 'class="on" '?>id="tab_1">
                <a href="index.php?m=publist&c=Collection&a=Admin&nodeid=<?php echo $nodeid?>">全部</a>
            </li>
            <li <?php if($status==1) echo 'class="on" '?>id="tab_1">
                <a href="index.php?m=publist&c=Collection&a=Admin&nodeid=<?php echo $nodeid?>&status=1">未采集</a>
            </li>
            <li <?php if($status==2) echo 'class="on" '?> id="tab_2">
                <a href="index.php?m=publist&c=Collection&a=Admin&nodeid=<?php echo $nodeid?>&status=2">已采集</a>
            </li>
            <li <?php if($status==3) echo 'class="on" '?> id="tab_3">
                <a href="index.php?m=publist&c=Collection&a=Admin&nodeid=<?php echo $nodeid?>&status=3">已导入</a>
            </li>
        </ul>
        <div class="content pad-10" id="show_div_1" style="height:auto">
            <form name="myform" id="myform" action="" method="get">
                <div id="form_">
                    <input type="hidden" name="m" value="content_del" />
                    <input type="hidden" name="c" value="Collection" />
                    <input type="hidden" name="a" value="Admin" />
                </div>
                <div class="table-list">
                    <table width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th  align="left" width="20">
                                    <input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"/>
                                </th>
                                <th align="left">状态</th>
                    			<th align="left">标题</th>
                    			<th align="left">网址</th>
                    			<th align="left">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        	if(is_array($data) && !empty($data))foreach($data as $k=>$v) {
                        ?>
                        <tr>
                            <td align="left"><input type="checkbox" value="<?php echo $v['id']?>" name="id[]"/></td>
                            <td align="left">
                                <?php if ($v['status'] == '0') {
                                            echo '未采集';
                                        } elseif ($v['status'] == 1) {
                                            echo '已采集';
                                        } elseif ($v['status'] == 2) {
                                            echo '已导入';
                                        } ?>
                            </td>
                            <td align="left"><?php echo $v['title']?></td>
                            <td align="left"><?php echo $v['url']?></td>
                            <td align="left">
                                <a href="javascript:void(0)" onclick="$('#tab_<?php echo $v['id']?>').toggle()">
                                    <?php echo '查看';?>
                                </a>
                            </td>
                        </tr>
                        <tr id="tab_<?php echo $v['id']?>" style="display:none">
                            <td align="left" colspan="5">
                                <textarea style="width:98%;height:300px;"><?php echo new_html_special_chars($v['data'])?></textarea>
                            </td>
                        </tr>
                        <?php
                        	}
                        
                        ?>
                        </tbody>
                    </table>
                    <div class="btn">
                    <label for="check_box">
                        <?php echo '全选';?>/<?php echo '取消';?>
                    </label> 
                    <input type="submit" class="button" name="dosubmit" value="<?php echo '删除';?>" onclick="re_url('m=collection&c=node&a=content_del&nodeid=<?php echo $nodeid?>');return check_checkbox(1);"/> 
                    <input type="submit" class="button" name="dosubmit"  onclick="re_url('m=collection&c=node&a=content_del&nodeid=<?php echo $nodeid?>&history=1');return check_checkbox(1);" value="<?php echo '同时删除历史';?>"/> 
                    <input type="submit" class="button" name="dosubmit" onclick="re_url('m=collection&c=node&a=import&nodeid=<?php echo $nodeid?>');return check_checkbox();" value="<?php echo '导入选中'?>"/>
                    <input type="submit" class="button" name="dosubmit"  onclick="re_url('m=import&c=Collection&a=Admin&type=all&nodeid=<?php echo $nodeid?>')" value="<?php echo '全部导入';?>"/>
                    </div>
                    <div id="pages"><?php echo $page?></div>
                </div>
            </form>
        </div>
    </div>
  </div>
  <script type="text/javascript">
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

function re_url(url) {
	var urls = url.split('&');
	var num = urls.length;
	var str = '';
	for (var i=0;i<num;i++){
		var a = urls[i].split('=');
		str +='<input type="hidden" name="'+a[0]+'" value="'+a[1]+'" />';
	}
	$('#form_').html(str);
}

  </script>
</div>
</body>

</html>