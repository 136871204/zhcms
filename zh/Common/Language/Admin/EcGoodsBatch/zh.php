<?php
if (!defined("ZHPHP_PATH")) exit('No direct script access allowed');


return array(

    //common
    'admin_ecgoodsbatch_common1'=>'简体中文',
    'admin_ecgoodsbatch_common2'=>'繁体中文',
    'admin_ecgoodsbatch_common3'=>'载批量CSV文件（%s）',    
    'admin_ecgoodsbatch_common4'=>'商品名称',
    'admin_ecgoodsbatch_common5'=>'商品货号',
    'admin_ecgoodsbatch_common6'=>'商品品牌',
    'admin_ecgoodsbatch_common7'=>'市场售价',
    'admin_ecgoodsbatch_common8'=>'本店售价',
    'admin_ecgoodsbatch_common9'=>'积分购买额度',
    'admin_ecgoodsbatch_common10'=>'商品原始图',
    'admin_ecgoodsbatch_common11'=>'商品图片',
    'admin_ecgoodsbatch_common12'=>'商品缩略图',
    'admin_ecgoodsbatch_common13'=>'商品关键词',
    'admin_ecgoodsbatch_common14'=>'简单描述',
    'admin_ecgoodsbatch_common15'=>'详细描述',
    'admin_ecgoodsbatch_common16'=>'商品重量（kg）',
    'admin_ecgoodsbatch_common17'=>'库存数量',
    'admin_ecgoodsbatch_common18'=>'库存警告数量',
    'admin_ecgoodsbatch_common19'=>'是否精品',
    'admin_ecgoodsbatch_common20'=>'是否新品',
    'admin_ecgoodsbatch_common21'=>'是否热销',
    'admin_ecgoodsbatch_common22'=>'是否上架',
    'admin_ecgoodsbatch_common23'=>'能否作为普通商品销售',
    'admin_ecgoodsbatch_common24'=>'是否实体商品',
    'admin_ecgoodsbatch_common25'=>'批量上传成功',
    'admin_ecgoodsbatch_common26'=>'商品',
    'admin_ecgoodsbatch_common27'=>'商品批量修改',    
    'admin_ecgoodsbatch_common28'=>'请选择...',
    'admin_ecgoodsbatch_common29'=>'点击此处查看提示信息',
    
    //controller
    'admin_ecgoodsbatch_control_index_add1'=>'国际化编码（utf8）',
    'admin_ecgoodsbatch_control_index_add2'=>'ecshop支持数据格式',
    'admin_ecgoodsbatch_control_index_add3'=>'淘宝助理支持数据格式',
    'admin_ecgoodsbatch_control_index_add4'=>'拍拍助理支持数据格式',
    'admin_ecgoodsbatch_control_index_add5'=>'拍拍助理3.0支持数据格式',
    'admin_ecgoodsbatch_control_index_add6'=>'淘宝助理4.6支持数据格式',
    'admin_ecgoodsbatch_control_index_add7'=>'商品批量上传',
    'admin_ecgoodsbatch_control_index_add8'=>'ecshop支持数据格式',
    'admin_ecgoodsbatch_control_index_add9'=>'ecshop支持数据格式',
    
    'admin_ecgoodsbatch_control_index_upload1'=>'实体商品',
    'admin_ecgoodsbatch_control_index_upload2'=>'虚拟卡',
    'admin_ecgoodsbatch_control_index_upload3'=>'批量上传确认',
    
    'admin_ecgoodsbatch_control_index_insert1'=>'TODO:图片处理部分的逻辑还需要斟酌，',
    'admin_ecgoodsbatch_control_index_insert2'=>'商品列表',
    
    'admin_ecgoodsbatch_control_index_update1'=>'批量修改成功',
    
    'admin_ecgoodsbatch_control_index_download1'=>'商品名稱',
    'admin_ecgoodsbatch_control_index_download2'=>'商品貨號',
    'admin_ecgoodsbatch_control_index_download3'=>'市場售價',
    'admin_ecgoodsbatch_control_index_download4'=>'本店售價',
    'admin_ecgoodsbatch_control_index_download5'=>'積分購買額度',
    'admin_ecgoodsbatch_control_index_download6'=>'商品原始圖',
    'admin_ecgoodsbatch_control_index_download7'=>'商品圖片',
    'admin_ecgoodsbatch_control_index_download8'=>'商品縮略圖',
    'admin_ecgoodsbatch_control_index_download9'=>'商品關鍵詞',
    'admin_ecgoodsbatch_control_index_download10'=>'簡單描述',
    'admin_ecgoodsbatch_control_index_download11'=>'詳細描述',
    'admin_ecgoodsbatch_control_index_download12'=>'庫存數量',
    'admin_ecgoodsbatch_control_index_download13'=>'庫存警告數量',
    'admin_ecgoodsbatch_control_index_download14'=>'是否熱銷',
    'admin_ecgoodsbatch_control_index_download15'=>'能否作為普通商品銷售',
    'admin_ecgoodsbatch_control_index_download16'=>'是否實體商品',

    //page    
    'admin_ecgoodsbatch_info_page_table_th1'=>'数据格式',
    'admin_ecgoodsbatch_info_page_table_th2'=>'所属分类',
    'admin_ecgoodsbatch_info_page_table_th3'=>'文件编码',
    'admin_ecgoodsbatch_info_page_table_th4'=>'上传批量csv文件',
    'admin_ecgoodsbatch_info_page_table_th5'=>'（CSV文件中一次上传商品数量最好不要超过1000，CSV文件大小最好不要超过500K.）',
    'admin_ecgoodsbatch_info_page_table_btn1'=>'确定',
    'admin_ecgoodsbatch_info_page_table_th6'=>'使用说明',
    'admin_ecgoodsbatch_info_page_table_th7'=>'根据使用习惯，下载相应语言的csv文件，例如中国内地用户下载简体中文语言的文件，港台用户下载繁体语言的文件；',
    'admin_ecgoodsbatch_info_page_table_th8'=>'填写csv文件，可以使用excel或文本编辑器打开csv文件；<br />
                      碰到“是否精品”之类，填写数字0或者1，0代表“否”，1代表“是”；<br />
                      商品图片和商品缩略图请填写带路径的图片文件名，其中路径是相对于 [根目录]/images/ 的路径，例如图片路径为[根目录]/images/200610/abc.jpg，只要填写 200610/abc.jpg 即可；<br />
                       <font style="color:#FE596A;">如果是淘宝助理格式请确保cvs编码为在网站的编码，如编码不正确，可以用编辑软件转换编码。</font>',
    'admin_ecgoodsbatch_info_page_table_th9'=>'将填写的商品图片和商品缩略图上传到相应目录，例如：[根目录]/images/200610/；<br />
                      <font style="color:#FE596A;">请首先上传商品图片和商品缩略图再上传csv文件，否则图片无法处理。</font>',
    'admin_ecgoodsbatch_info_page_table_th10'=>'选择所上传商品的分类以及文件编码，上传csv文件',
    
    'admin_ecgoodsbatch_info_page_table_th11'=>'编号',
    'admin_ecgoodsbatch_info_page_table_th12'=>'商品类别',
    'admin_ecgoodsbatch_info_page_table_btn2'=>'返回',
    
    'admin_ecgoodsbatch_info_page_table_th13'=>'会员价格为-1表示会员价格将根据会员等级折扣比例计算',
    'admin_ecgoodsbatch_info_page_table_th14'=>'货号',
    'admin_ecgoodsbatch_info_page_table_th15'=>'市场价格',
    'admin_ecgoodsbatch_info_page_table_th16'=>'本店价格',
    'admin_ecgoodsbatch_info_page_table_th17'=>'积分购买',
    'admin_ecgoodsbatch_info_page_table_th18'=>'赠送积分',
    'admin_ecgoodsbatch_info_page_table_th19'=>'库存',
    'admin_ecgoodsbatch_info_page_table_th20'=>'品牌',
    'admin_ecgoodsbatch_info_page_table_th21'=>'货号',
    'admin_ecgoodsbatch_info_page_table_btn3'=>'重置',
    
    'admin_ecgoodsbatch_info_page_table_th22'=>'选择商品的方式',
    'admin_ecgoodsbatch_info_page_table_th23'=>'根据商品分类、品牌',
    'admin_ecgoodsbatch_info_page_table_th24'=>'根据商品货号',
    'admin_ecgoodsbatch_info_page_table_th25'=>'选择商品分类',
    'admin_ecgoodsbatch_info_page_table_th26'=>'选择商品品牌',
    'admin_ecgoodsbatch_info_page_table_th27'=>'待选列表',
    'admin_ecgoodsbatch_info_page_table_th28'=>'选定列表',
    'admin_ecgoodsbatch_info_page_table_th29'=>'输入商品货号：<br />（每行一个）',
    'admin_ecgoodsbatch_info_page_table_th30'=>'编辑方式',
    'admin_ecgoodsbatch_info_page_table_th31'=>'逐个编辑',
    'admin_ecgoodsbatch_info_page_table_th32'=>'统一编辑',
    'admin_ecgoodsbatch_info_page_table_th33'=>'进入编辑',
    
    //js
    'admin_ecgoodsbatch_js_please_select_goods'=>'请您选择商品',
    'admin_ecgoodsbatch_js_please_input_sn'=>'请您输入商品货号',
    'admin_ecgoodsbatch_js_goods_cat_not_leaf'=>'请选择底级分类',
    'admin_ecgoodsbatch_js_please_select_cat'=>'请您选择所属分类',
    'admin_ecgoodsbatch_js_please_upload_file'=>'请您上传批量csv文件',


    
);
?>
