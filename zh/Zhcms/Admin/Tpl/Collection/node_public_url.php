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
            <?php while ($pagesize_start <= $pagesize_end):?>
                <?php 
                    echo str_replace('(*)', $pagesize_start, $urlpage);
                    $pagesize_start=$pagesize_start+$par_num;?>
                <hr size="1" />
            <?php endwhile;?>
            </div>
        </div>
    </div>
</body>

</html>