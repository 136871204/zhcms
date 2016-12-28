<?php
if (!defined("ZHPHP_PATH")) exit('No direct script access allowed');


return array(

    //common
    'admin_ecuserrank_common1'=>'会员等级',
    'admin_ecuserrank_common2'=>'添加会员等级',
    'admin_ecuserrank_common3'=>'会员等级名 %s 已经存在。',
    'admin_ecuserrank_common4'=>'积分上限必须大于积分下限。',
    'admin_ecuserrank_common5'=>'已经存在一个等级积分下限为 %d 的会员等级',
    'admin_ecuserrank_common6'=>'已经存在一个等级积分上限为 %d 的会员等级',
    'admin_ecuserrank_common7'=>'编辑',
    'admin_ecuserrank_common8'=>'DB错误',
    
    //controller
    'admin_ecuserrank_control_index_insert1'=>'添加',
    'admin_ecuserrank_control_index_insert2'=>'返回会员等级列表',
    'admin_ecuserrank_control_index_insert3'=>'继续添加会员等级',
    'admin_ecuserrank_control_index_insert4'=>'会员等级已经添加成功。',
    'admin_ecuserrank_control_index_remove1'=>'删除',
    'admin_ecuserrank_control_index_edit_discount1'=>'您没有输入折扣率或者折扣率无效。',
    
    //page
    'admin_ecuserrank_page_table_th1'=>'会员等级名称',
    'admin_ecuserrank_page_table_th2'=>'积分下限',
    'admin_ecuserrank_page_table_th3'=>'积分上限',
    'admin_ecuserrank_page_table_th4'=>'初始折扣率(%)',
    'admin_ecuserrank_page_table_th5'=>'特殊会员组',
    'admin_ecuserrank_page_table_th6'=>'显示价格',
    'admin_ecuserrank_page_table_th7'=>'操作',
    'admin_ecuserrank_page_table_th8'=>'您确认要删除这条记录吗?',
    'admin_ecuserrank_page_table_th9'=>'移除',
    
    'admin_ecuserrank_page_table_th10'=>'点击此处查看提示信息',
    'admin_ecuserrank_page_table_th11'=>'在商品详情页显示该会员等级的商品价格',
    'admin_ecuserrank_page_table_th12'=>'特殊会员组',
    'admin_ecuserrank_page_table_th13'=>'特殊会员组的会员不会随着积分的变化而变化。',
    'admin_ecuserrank_page_table_th14'=>'初始折扣率',
    'admin_ecuserrank_page_table_th15'=>'请填写为0-100的整数,如填入80，表示初始折扣率为8折',
    'admin_ecuserrank_page_table_btn1'=>'确定',
    'admin_ecuserrank_page_table_btn2'=>'重置',
    
    
    //js
    'admin_ecuserrank_js_remove_confirm'=>'您确定要删除选定的会员等级吗？',
    'admin_ecuserrank_js_rank_name_empty'=>'您没有输入会员等级名称。',
    'admin_ecuserrank_js_integral_min_invalid'=>'您没有输入积分下限或者积分下限不是一个整数。',
    'admin_ecuserrank_js_integral_max_invalid'=>'您没有输入积分上限或者积分上限不是一个整数。',
    'admin_ecuserrank_js_discount_invalid'=>'您没有输入折扣率或者折扣率无效。',
    'admin_ecuserrank_js_integral_max_small'=>'积分上限必须大于积分下限。',
    'admin_ecuserrank_js_lang_remove'=>'移除',
    
);
?>
