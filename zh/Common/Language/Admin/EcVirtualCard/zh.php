<?php
if (!defined("ZHPHP_PATH")) exit('No direct script access allowed');


return array(

    //common
    'admin_ecvirtualcard_common1'=>'返回',
    'admin_ecvirtualcard_common2'=>'缺少商品ID参数，无法进行补货操作',
    'admin_ecvirtualcard_common3'=>'商品ID参数有误，无法获取商品名',
    'admin_ecvirtualcard_common4'=>'补货',
    'admin_ecvirtualcard_common5'=>'返回补货列表',
    'admin_ecvirtualcard_common6'=>'批量添加补货',
    'admin_ecvirtualcard_common7'=>'缺少商品ID参数，无法进行补货操作',
    'admin_ecvirtualcard_common8'=>'缺少商品ID参数，无法进行补货操作',
    'admin_ecvirtualcard_common9'=>'缺少商品ID参数，无法进行补货操作',
    'admin_ecvirtualcard_common10'=>'操作成功',
    'admin_ecvirtualcard_common11'=>'继续补货',
    
    //controller
    'admin_ecvirtualcard_control_index_batch_card_add1'=>'虚拟商品列表',
    'admin_ecvirtualcard_control_index_batch_confirm1'=>'文件上传失败',
    
    'admin_ecvirtualcard_control_index_batch_insert1'=>'卡片列表',
    'admin_ecvirtualcard_control_index_batch_insert2'=>'已成功添加了 %s 条补货信息',
    
    'admin_ecvirtualcard_control_index_action1'=>'卡片序号 %s 已经存在，请重新输入',
    
    'admin_ecvirtualcard_control_index_toggle_sold1'=>'操作失败',
    
    'admin_ecvirtualcard_control_index_start_change1'=>'新加密串跟原加密串相同',
    'admin_ecvirtualcard_control_index_start_change2'=>'原加密串不正确',
    'admin_ecvirtualcard_control_index_start_change3'=>'总共有记录 %s 条。已使用新串加密的记录有 %s 条，使用原串加密（待更新）的记录有 %s 条，使用未知串加密的记录有 %s 条。',
    
    'admin_ecvirtualcard_control_index_on_change1'=>'更新过程中出错：%s',
    'admin_ecvirtualcard_control_index_on_change2'=>'<strong>更新完毕</strong>，现在使用新串加密的记录有 %s 条，使用未知串加密的记录有 %s 条。',
    
    //page    
    'admin_ecvirtualcard_info_page_table_th1'=>'商品名称',
    'admin_ecvirtualcard_info_page_table_th2'=>'卡片序号',
    'admin_ecvirtualcard_info_page_table_th3'=>'卡片密码',
    'admin_ecvirtualcard_info_page_table_th4'=>'截至使用日期',
    'admin_ecvirtualcard_info_page_table_btn1'=>'确定',
    
    'admin_ecvirtualcard_info_page_table_th5'=>'使用说明',
    'admin_ecvirtualcard_info_page_table_th6'=>'加密串是在加密虚拟卡类商品的卡号和密码时使用的',
    'admin_ecvirtualcard_info_page_table_th7'=>'加密串保存在文件 data/config.php 中，对应的常量是 AUTH_KEY',
    'admin_ecvirtualcard_info_page_table_th8'=>"如果要更改加密串在下面的文本框中输入原加密串和新加密串，点\'确定\'按钮后即可",
    'admin_ecvirtualcard_info_page_table_th9'=>'原加密串',
    'admin_ecvirtualcard_info_page_table_th10'=>'新加密串',
    'admin_ecvirtualcard_info_page_table_th11'=>'更新记录',

    'admin_ecvirtualcard_info_page_table_th12'=>'订单号',
    'admin_ecvirtualcard_info_page_table_btn2'=>'搜索',
    'admin_ecvirtualcard_info_page_table_th13'=>'编号',
    'admin_ecvirtualcard_info_page_table_th14'=>'是否已出售',
    'admin_ecvirtualcard_info_page_table_th15'=>'操作',
    'admin_ecvirtualcard_info_page_table_th16'=>'您确认要删除这条记录吗?',
    'admin_ecvirtualcard_info_page_table_th17'=>'没有找到任何记录',
    'admin_ecvirtualcard_info_page_table_btn3'=>'删除',
    
    'admin_ecvirtualcard_info_page_table_th18'=>'分隔符',
    'admin_ecvirtualcard_info_page_table_th19'=>'上传文件',
    'admin_ecvirtualcard_info_page_table_th20'=>'下载批量CSV文件',
    'admin_ecvirtualcard_info_page_table_btn4'=>'重置',    
    'admin_ecvirtualcard_info_page_table_th21'=>'上传文件应为CSV文件<br />
                      CSV文件第一列为卡片序号；第二列为卡片密码；第三列为使用截至日期。<br />
                      (用EXCEL创建csv文件方法：在EXCEL中按卡号、卡片密码、截至日期的顺序填写数据，完成后直接保存为csv文件即可)',
    'admin_ecvirtualcard_info_page_table_th22'=>'密码，和截至日期可以为空，截至日期格式为2006-11-6或2006/11/6',
    'admin_ecvirtualcard_info_page_table_th23'=>'卡号、卡片密码、截至日期中不要使用中文',
    
    //js
    'admin_ecvirtualcard_js_no_card_sn'=>'卡片序号和卡片密码不能都为空。',
    'admin_ecvirtualcard_js_separator_not_null'=>'分隔符号不能为空。',
    'admin_ecvirtualcard_js_uploadfile_not_null'=>'请选择要上传的文件。',
    'admin_ecvirtualcard_js_updating_info'=>'<strong>正在更新</strong>（每次 100 条记录）',
    'admin_ecvirtualcard_js_updated_info'=>'<strong>已更新</strong> <span id=\"updated\">0</span> 条记录。',
    
);
?>
