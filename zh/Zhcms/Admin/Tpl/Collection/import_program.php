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
<div class="pad-lr-10">
    <fieldset>
        <legend>新建发布方案</legend>
        <form name="myform" action="?" method="get" id="myform">
            <table width="100%" class="table_form">
                <tr>
        			<td width="120">栏目：</td> 
        			<td>
                    <?php //echo form::select_category('', '', 'name="cid"', '请选择', 0, 0, 1)?>
                    <select name="cid">
                        <option value="0">请选择</option>
                        <list from="$categorys" name="c">
                            <option value="{$c.cid}"
                            {$c.selected} {$c.disabled}>
                            {$c._name}
                            </option>
                        </list>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td width="120">数据表格：</td>
                    <td>
                        <input type="input" name="table_name" id="table_name" value="" /> 
                    </td>
                </tr>
            </table>
            <input type="hidden" name="m" value="import_program_add"/>
            <input type="hidden" name="c" value="Collection"/>
            <input type="hidden" name="a" value="Admin"/>
            <input type="hidden" name="nodeid" value="<?php if(isset($nodeid)) echo $nodeid?>"/>
            <input type="hidden" name="type" value="<?php echo $type?>"/>
            <input type="hidden" name="ids" value="<?php echo $ids?>"/>
            <input type="submit" id="dosubmit"  class="button" value="提交"/>
        </form>
    </fieldset>
    <div class="bk15"></div>
    <form name="myform" action="?" method="get" >
        <fieldset>
            <legend>发布方案列表</legend>
            
                <div class="bk15"></div>
                <?php
                	foreach($program_list as $k=>$v) {
                          $showValue=$v['program_name'];
                		echo form::radio(array($v['id']=>$showValue), '', 'name="programid"', 150);
                ?>
                    <span style="margin-right:10px;">
                        <a href="?m=import_program_del&c=Collection&a=Admin&id=<?php echo $v['id']; ?>&nodeid=<?php echo $nodeid; ?>&ids=<?php echo $ids;?>&type=<?php echo $type;?>" style="color:#ccc">
                            <?php echo '移除';?>
                        </a>
                    </span>
                <?php
                	}
                
                ?>
            
        </fieldset>
        <input type="hidden" name="m" value="import_content"/>
    	<input type="hidden" name="c" value="Collection"/>
    	<input type="hidden" name="a" value="Admin"/>
    	<input type="hidden" name="nodeid" value="<?php if(isset($nodeid)) echo $nodeid?>"/>
    	<input type="hidden" name="type" value="<?php echo $type?>"/>
    	<input type="hidden" name="ids" value="<?php echo $ids?>"/>
        <div class="btn">
        <label for="check_box"><input type="submit" class="button" name="dosubmit" value="提交"/>
        </div>
    </form>
</div>
</body>

</html>