<?php
if (!defined("ZHPHP_PATH")) exit('No direct script access allowed');


return array(

    //common
    'admin_ecpicturebatch_common1'=>'第 %d 页',
    'admin_ecpicturebatch_common2'=>'共 %d 页',
    'admin_ecpicturebatch_common3'=>'正在处理.....',
    'admin_ecpicturebatch_common4'=>'耗时 %s 秒',
    'admin_ecpicturebatch_common5'=>'图片批量处理成功',
    
    'admin_ecpicturebatch_common6'=>'在处理商品ID为 %s 的商品图片时发生以下错误：',
    
    //controller
    'admin_ecpicturebatch_control_index_list1'=>'图片批量处理',
    'admin_ecpicturebatch_control_index_list2'=>'没有安装GD库',
    'admin_ecpicturebatch_control_index_list3'=>'商品图片共 %d 张，每页处理 %d 张',
    'admin_ecpicturebatch_control_index_list4'=>'商品相册图片共 %d 张，每页处理 %d 张',
    'admin_ecpicturebatch_control_index_list5'=>'无法将文件 %s 重命名为 %s',

    //page    
    'admin_ecpicturebatch_page_table_td1'=>'图片批量处理允许您重新生成商品的缩略图以及重新添加水印。<br />该处理过程可能会比较慢，请您耐心等候。',
    'admin_ecpicturebatch_page_table_td2'=>'所有分类',
    'admin_ecpicturebatch_page_table_td3'=>'所有品牌',
    'admin_ecpicturebatch_page_table_td4'=>'所有商品',
    'admin_ecpicturebatch_page_table_td5'=>'处理商品图片',
    'admin_ecpicturebatch_page_table_td6'=>'处理商品相册',
    'admin_ecpicturebatch_page_table_td7'=>'重新生成缩略图',
    'admin_ecpicturebatch_page_table_td8'=>'重新生成商品详情图(水印处理)',
    'admin_ecpicturebatch_page_table_td9'=>'新生成图片使用新名称，并删除旧图片',
    'admin_ecpicturebatch_page_table_td10'=>'新生成图片覆盖旧图片',
    'admin_ecpicturebatch_page_table_td11'=>'出错时忽略错误，继续执行程序',
    'admin_ecpicturebatch_page_table_td12'=>'出错时立即提示，并中止程序',
    'admin_ecpicturebatch_page_table_btn1'=>'确定',
    'admin_ecpicturebatch_page_table_td13'=>'页数',
    'admin_ecpicturebatch_page_table_td14'=>'总页数',
    'admin_ecpicturebatch_page_table_td15'=>'处理时间',
    
    //js
    'admin_ecpicturebatch_js_no_action' => "你没选择任何操作",
    'admin_ecpicturebatch_js_picture_batch1' => "请选上“处理商品相册”或“处理商品图片”",
    
);
?>
