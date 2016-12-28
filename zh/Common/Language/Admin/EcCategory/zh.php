<?php
if (!defined("ZHPHP_PATH")) exit('No direct script access allowed');


return array(

    //controller
    'admin_content_control_common1'=>'商品分类',
    'admin_content_control_common2'=>'添加分类',
    'admin_content_control_index_insert1'=>'已存在相同的分类名称!',
    'admin_content_control_index_insert2'=>'价格分级数量只能是0-10之内的整数',
    'admin_content_control_index_insert3'=>'新商品分类添加成功!',
    'admin_content_control_index_edit1'=>'编辑商品分类',
    'admin_content_control_index_update1'=>'所选择的上级分类不能是当前分类或者当前分类的下级分类!',
    'admin_content_control_index_update2'=>'商品分类编辑成功!',
    'admin_content_control_index_move1'=>'转移商品',
    'admin_content_control_index_move_cat1'=>'你没有正确选择商品分类',
    'admin_content_control_index_move_cat2'=>'转移商品分类已成功完成!',
    'admin_content_control_index_remove1'=>'不是末级分类或者此分类下还存在有商品,您不能删除!',
    
    //category_list page
    'admin_eccategory_category_list_page_table_th1'=>'分类名称',
    'admin_eccategory_category_list_page_table_th2'=>'商品数量',
    'admin_eccategory_category_list_page_table_th3'=>'数量单位',
    'admin_eccategory_category_list_page_table_th4'=>'导航栏',
    'admin_eccategory_category_list_page_table_th5'=>'是否显示',
    'admin_eccategory_category_list_page_table_th6'=>'价格分级',
    'admin_eccategory_category_list_page_table_th7'=>'排序',
    'admin_eccategory_category_list_page_table_th8'=>'操作',
    'admin_eccategory_category_list_page_table_info1'=>'转移商品',
    'admin_eccategory_category_list_page_table_info2'=>'编辑',
    'admin_eccategory_category_list_page_table_info3'=>'您确认要删除这条记录吗?',
    'admin_eccategory_category_list_page_table_info4'=>'移除',
    'admin_eccategory_category_list_page_table_info5'=>'没有找到任何记录',
    
    //category_info page
    'admin_eccategory_category_info_page_form_title1'=>'分类名称:',
    'admin_eccategory_category_info_page_form_title2'=>'上级分类:',
    'admin_eccategory_category_info_page_form_title2_other1'=>'顶级分类',
    'admin_eccategory_category_info_page_form_title3'=>'数量单位:',
    'admin_eccategory_category_info_page_form_title4'=>'排序:',
    'admin_eccategory_category_info_page_form_title5'=>'是否显示:',
    'admin_eccategory_category_info_page_form_title6'=>'是否显示在导航栏:',
    'admin_eccategory_category_info_page_form_title7'=>'设置为首页推荐:',
    'admin_eccategory_category_info_page_form_title7_other1'=>'精品',
    'admin_eccategory_category_info_page_form_title7_other2'=>'最新',
    'admin_eccategory_category_info_page_form_title7_other3'=>'热门',
    'admin_eccategory_category_info_page_form_title8'=>'筛选属性:',
    'admin_eccategory_category_info_page_form_title8_other1'=>'请选择筛选属性',
    'admin_eccategory_category_info_page_form_title8_other2'=>'请选择商品类型',
    'admin_eccategory_category_info_page_form_title8_other3'=>'筛选属性可在前分类页面筛选商品',
    'admin_eccategory_category_info_page_form_title9'=>'价格区间个数:',
    'admin_eccategory_category_info_page_form_title9_other1'=>'该选项表示该分类下商品最低价与最高价之间的划分的等级个数，填0表示不做分级，最多不能超过10个。',
    'admin_eccategory_category_info_page_form_title10'=>'分类的样式表文件:',
    'admin_eccategory_category_info_page_form_title10_other1'=>'您可以为每一个商品分类指定一个样式表文件。例如文件存放在 themes 目录下则输入：themes/style.css',
    'admin_eccategory_category_info_page_form_title11'=>'关键字:',
    'admin_eccategory_category_info_page_form_title12'=>'分类描述:',
    'admin_eccategory_category_info_page_form_title13'=>'确定',
    'admin_eccategory_category_info_page_form_title14'=>'重置',
    'admin_eccategory_category_info_page_js1'=>'价格分级数量只能是0-10之内的整数',
    
    
    //js
    'admin_eccategory_js_process_request'=>'正在处理您的请求...',
    'admin_eccategory_js_todolist_caption'=>'记事本',
    'admin_eccategory_js_todolist_autosave'=>'自动保存',
    'admin_eccategory_js_todolist_save'=>'保存',
    'admin_eccategory_js_todolist_clear'=>'清除',
    'admin_eccategory_js_todolist_confirm_save'=>'是否将更改保存到记事本？',
    'admin_eccategory_js_todolist_confirm_clear'=>'是否清空内容？',
    'admin_eccategory_js_catname_empty'=>'分类名称不能为空!',
    'admin_eccategory_js_unit_empyt'=>'数量单位不能为空!',
    'admin_eccategory_js_is_leafcat'=>'您选定的分类是一个末级分类。\r\n新分类的上级分类不能是一个末级分类',
    'admin_eccategory_js_not_leafcat'=>'您选定的分类不是一个末级分类。\r\n商品的分类转移只能在末级分类之间才可以操作。',
    'admin_eccategory_js_filter_attr_not_repeated'=>'筛选属性不可重复',
    'admin_eccategory_js_filter_attr_not_selected'=>'请选择筛选属性',

    
);
?>
