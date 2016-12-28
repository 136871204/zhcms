<?php
/**
 * 管理员管理模块
 * Class AdministratorControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcGoodsExportControl extends EcAdminControl{
    
    //private $_db;

    public function __init() {
		//$this -> _db = K("AdminLog");
	}
    
    public function index(){
        $ecs=$GLOBALS['ec_globals']['ecs'];

        $_LANG['custom']['goods_name'] = L('admin_ecgoodsexport_common1');
        $_LANG['custom']['goods_sn'] = L('admin_ecgoodsexport_common2');
        $_LANG['custom']['brand_name'] = L('admin_ecgoodsexport_common3');
        $_LANG['custom']['market_price'] = L('admin_ecgoodsexport_common4');
        $_LANG['custom']['shop_price'] = L('admin_ecgoodsexport_common5');
        $_LANG['custom']['integral'] = L('admin_ecgoodsexport_common6');
        $_LANG['custom']['original_img'] = L('admin_ecgoodsexport_common7');
        $_LANG['custom']['goods_img'] = L('admin_ecgoodsexport_common8');
        $_LANG['custom']['goods_thumb'] = L('admin_ecgoodsexport_common9');
        $_LANG['custom']['keywords'] = L('admin_ecgoodsexport_common10');
        $_LANG['custom']['goods_brief'] = L('admin_ecgoodsexport_common11');
        $_LANG['custom']['goods_desc'] = L('admin_ecgoodsexport_common12');
        $_LANG['custom']['goods_weight'] = L('admin_ecgoodsexport_common13');
        $_LANG['custom']['goods_number'] = L('admin_ecgoodsexport_common14');
        $_LANG['custom']['warn_number'] = L('admin_ecgoodsexport_common15');
        $_LANG['custom']['is_best'] = L('admin_ecgoodsexport_common16');
        $_LANG['custom']['is_new'] = L('admin_ecgoodsexport_common17');
        $_LANG['custom']['is_hot'] = L('admin_ecgoodsexport_common18');
        $_LANG['custom']['is_on_sale'] = L('admin_ecgoodsexport_common19');
        $_LANG['custom']['is_alone_sale'] = L('admin_ecgoodsexport_common20');
        $_LANG['custom']['is_real'] = L('admin_ecgoodsexport_common21');
        
        
            
        if ($_REQUEST['act'] == 'goods_export')
        {
            $this->assign('ur_here',             L('admin_ecgoodsexport_control_index_goods_export1'));
            $this->assign('cat_list', cat_list());
            $this->assign('brand_list',   get_brand_list());
            $this->assign('goods_type_list',  goods_type_list(0));
            $goods_fields =$this-> my_array_merge($_LANG['custom'], $this ->  get_attributes());
            $data_format_array = array(
                                'ecshop'    => L('admin_ecgoodsexport_control_index_goods_export2'),
                                'taobao V4.3'    => L('admin_ecgoodsexport_control_index_goods_export3'),
                                'taobao V4.6'    => L('admin_ecgoodsexport_control_index_goods_export4'),
                                'taobao'    => L('admin_ecgoodsexport_control_index_goods_export5'),
                                'paipai'    => L('admin_ecgoodsexport_control_index_goods_export6'),
                                'paipai4'   => L('admin_ecgoodsexport_control_index_goods_export7'),
                                'custom'    => L('admin_ecgoodsexport_control_index_goods_export8'),
                               );
            $this->assign('data_format', $data_format_array);
            $this->assign('goods_fields', $goods_fields);
            $this->display('goods_export.htm');
        }
        elseif ($_REQUEST['act'] == 'act_export_taobao')
        {
            /* 淘宝 */
            $_LANG['taobao']['goods_name'] = L('admin_ecgoodsexport_common28');
            $_LANG['taobao']['goods_class'] = L('admin_ecgoodsexport_common29');
            $_LANG['taobao']['shop_class'] = L('admin_ecgoodsexport_common30');
            $_LANG['taobao']['new_level'] = L('admin_ecgoodsexport_common31');
            $_LANG['taobao']['province'] = L('admin_ecgoodsexport_common32');
            $_LANG['taobao']['city'] = L('admin_ecgoodsexport_common33');
            $_LANG['taobao']['sell_type'] = L('admin_ecgoodsexport_common34');
            $_LANG['taobao']['shop_price'] = L('admin_ecgoodsexport_common35');
            $_LANG['taobao']['add_price'] = L('admin_ecgoodsexport_common36');
            $_LANG['taobao']['goods_number'] = L('admin_ecgoodsexport_common37');
            $_LANG['taobao']['die_day'] = L('admin_ecgoodsexport_common38');
            $_LANG['taobao']['load_type'] = L('admin_ecgoodsexport_common39');
            $_LANG['taobao']['post_express'] = L('admin_ecgoodsexport_common40');
            $_LANG['taobao']['ems'] = L('admin_ecgoodsexport_common41');
            $_LANG['taobao']['express'] = L('admin_ecgoodsexport_common42');
            $_LANG['taobao']['pay_type'] = L('admin_ecgoodsexport_common43');
            $_LANG['taobao']['allow_alipay'] = L('admin_ecgoodsexport_common44');
            $_LANG['taobao']['invoice'] = L('admin_ecgoodsexport_common45');
            $_LANG['taobao']['repair'] = L('admin_ecgoodsexport_common46');
            $_LANG['taobao']['resend'] = L('admin_ecgoodsexport_common47');
            $_LANG['taobao']['is_store'] = L('admin_ecgoodsexport_common48');
            $_LANG['taobao']['window'] = L('admin_ecgoodsexport_common49');
            $_LANG['taobao']['add_time'] = L('admin_ecgoodsexport_common50');
            $_LANG['taobao']['story'] = L('admin_ecgoodsexport_common51');
            $_LANG['taobao']['goods_desc'] = L('admin_ecgoodsexport_common52');
            $_LANG['taobao']['goods_img'] = L('admin_ecgoodsexport_common53');
            $_LANG['taobao']['goods_attr'] = L('admin_ecgoodsexport_common54');
            $_LANG['taobao']['group_buy'] = L('admin_ecgoodsexport_common55');
            $_LANG['taobao']['group_buy_num'] = L('admin_ecgoodsexport_common56');
            $_LANG['taobao']['template'] = L('admin_ecgoodsexport_common57');
            $_LANG['taobao']['discount'] = L('admin_ecgoodsexport_common58');
            $_LANG['taobao']['modify_time'] = L('admin_ecgoodsexport_common59');
            $_LANG['taobao']['upload_status'] = L('admin_ecgoodsexport_common60');
            $_LANG['taobao']['img_status'] = L('admin_ecgoodsexport_common61');
        
            $zip = new EcPhpzip();
            
            $where = $this-> get_export_where_sql($_POST);
            
            $goods_class =  intval($_POST['goods_class']);
            $post_express = floatval($_POST['post_express']);
            $express = floatval($_POST['express']);
            $ems = floatval($_POST['ems']);
                    
            $shop_province = '""';
            $shop_city = '""';
            $ec_shop_province=C('ec_shop_province');
            $ec_shop_city=C('ec_shop_city');
            if($ec_shop_province||$ec_shop_city)
            {
                $sql = "SELECT region_id,  region_name FROM " . $ecs->table('ec_region') . " WHERE region_id IN ('$ec_shop_province',  '$ec_shop_city')";
                $arr = M()->getAll($sql);
                if ($arr)
                {
                    if (count($arr) == 1)
                    {
                        if ($arr[0]['region_id'] == $ec_shop_province)
                        {
                            $shop_province = '"' . $arr[0]['region_name'] . '"' ;
                        }
                        else
                        {
                            $shop_city = '"' . $arr[0]['region_name'] . '"' ;
                        }
                    }
                    else
                    {
                        if ($arr[0]['region_id'] == $ec_shop_province)
                        {
                            $shop_province = '"' . $arr[0]['region_name'] . '"' ;
                            $shop_city = '"' . $arr[1]['region_name'] . '"';
                        }
                        else
                        {
                            $shop_province = '"' . $arr[1]['region_name'] . '"' ;
                            $shop_city = '"' . $arr[0]['region_name'] . '"';
                        }
                    }
                }
                
            }
            $sql = "SELECT g.goods_id, g.goods_name, g.shop_price, g.goods_number, g.goods_desc, g.goods_img ".
                    " FROM " . $ecs->table('ec_goods') . " AS g ". $where;
            $res = M()->query($sql);
            /* csv文件数组 */
            $goods_value = array(
                                'goods_name'=>'""', 'goods_class'=>$goods_class, 'shop_class'=>0, 'new_level'=>5, 
                                'province'=>$shop_province, 'city'=>$shop_city, 'sell_type'=>'"b"', 
                                'shop_price'=>0, 'add_price'=>0, 'goods_number'=>0, 'die_day'=>14, 
                                'load_type'=>1, 'post_express'=>$post_express, 'ems'=>$ems, 'express'=>$express, 
                                'pay_type'=>2, 'allow_alipay'=>1, 'invoice'=>0, 'repair'=>0, 'resend'=>1, 'is_store'=>0, 
                                'window'=>0, 'add_time'=>'"1980-1-1  0:00:00"', 'story'=>'""', 'goods_desc'=>'""', 
                                'goods_img'=>'""', 'goods_attr'=>'""', 'group_buy'=>0, 'group_buy_num'=>0, 'template'=>0, 
                                'discount'=>0, 'modify_time'=>'""', 'upload_status'=>100, 'img_status'=>1);

            $content = implode("\t", $_LANG['taobao']) . "\n";
            
            if(!empty($res)){
                foreach($res as $row){
                    $goods_value['goods_name'] = '"' . $row['goods_name'] . '"';
                    $goods_value['shop_price'] = $row['shop_price'];
                    $goods_value['goods_number'] = $row['goods_number'];
                    $goods_value['goods_desc'] = $this-> replace_special_char($row['goods_desc']);
                    $goods_value['goods_img'] = '"' . $row['goods_img'] . '"';
            
                    $content .= implode("\t", $goods_value) . "\n";
            
                    /* 压缩图片 */
                    if (!empty($row['goods_img']) && is_file(ROOT_PATH . $row['goods_img']))
                    {
                        $zip->add_file(file_get_contents(ROOT_PATH . $row['goods_img']), $row['goods_img']);
                    }
                }
            }
            if (EC_CHARSET != 'utf-8')
            {
                $content = ecs_iconv(EC_CHARSET, 'utf-8', $content);
            }
            $zip->add_file("\xFF\xFE" . $this-> utf82u2($content), 'goods_list.csv');
            header("Content-Disposition: attachment; filename=goods_list.zip");
            header("Content-Type: application/unknown");
            die($zip->file());
        }
        elseif ($_REQUEST['act'] == 'act_export_taobao V4.3')
        {
            $zip = new EcPhpzip();
            
            $where = $this-> get_export_where_sql($_POST);

            $goods_class =  intval($_POST['goods_class']);
            $post_express = floatval($_POST['post_express']);
            $express = floatval($_POST['express']);
            $ems = floatval($_POST['ems']);
        
            $shop_province = '""';
            $shop_city = '""';
            $ec_shop_province=C('ec_shop_province');
            $ec_shop_city=C('ec_shop_city');
            if($ec_shop_province||$ec_shop_city)
            {
                $sql = "SELECT region_id,  region_name FROM " . $ecs->table('ec_region') . " WHERE region_id IN ('$ec_shop_province',  '$ec_shop_city')";
                $arr = M()->getAll($sql);
                if ($arr)
                {
                    if (count($arr) == 1)
                    {
                        if ($arr[0]['region_id'] == $ec_shop_province)
                        {
                            $shop_province = '"' . $arr[0]['region_name'] . '"' ;
                        }
                        else
                        {
                            $shop_city = '"' . $arr[0]['region_name'] . '"' ;
                        }
                    }
                    else
                    {
                        if ($arr[0]['region_id'] == $_CFG['shop_province'])
                        {
                            $shop_province = '"' . $arr[0]['region_name'] . '"' ;
                            $shop_city = '"' . $arr[1]['region_name'] . '"';
                        }
                        else
                        {
                            $shop_province = '"' . $arr[1]['region_name'] . '"' ;
                            $shop_city = '"' . $arr[0]['region_name'] . '"';
                        }
                    }
                }
                
            }
            $sql = "SELECT g.goods_id, g.goods_name, g.shop_price, g.goods_number, g.goods_desc, g.goods_img ".
                    " FROM " . $ecs->table('ec_goods') . " AS g ". $where;
            $res = M()->query($sql);
            /* csv文件数组 */
            $goods_value = array(
                                'goods_name'=>'""', 'goods_class'=>$goods_class, 'shop_class'=>0, 'new_level'=>5, 
                                'province'=>$shop_province, 'city'=>$shop_city, 'sell_type'=>'"b"', 
                                'shop_price'=>0, 'add_price'=>0, 'goods_number'=>0, 'die_day'=>14, 
                                'load_type'=>1, 'post_express'=>$post_express, 'ems'=>$ems, 'express'=>$express, 
                                'pay_type'=>2, 'allow_alipay'=>1, 'invoice'=>0, 'repair'=>0, 'resend'=>1, 'is_store'=>0, 
                                'window'=>0, 'add_time'=>'"1980-1-1  0:00:00"', 'story'=>'""', 'goods_desc'=>'""', 
                                'goods_img'=>'""', 'goods_attr'=>'""', 'group_buy'=>0, 'group_buy_num'=>0, 'template'=>0, 
                                'discount'=>0, 'modify_time'=>'""', 'upload_status'=>100, 'img_status'=>1);
        
            $content = implode("\t", $_LANG['taobao']) . "\n";
            
            if(!empty($res)){
                foreach($res as $row){
                    $goods_value['goods_name'] = '"' . $row['goods_name'] . '"';
                    $goods_value['shop_price'] = $row['shop_price'];
                    $goods_value['goods_number'] = $row['goods_number'];
                    $goods_value['goods_desc'] = $this ->  replace_special_char($row['goods_desc']);
                    $goods_value['goods_img'] = '"' . $row['goods_img'] . '"';
            
                    $content .= implode("\t", $goods_value) . "\n";
            
                    /* 压缩图片 */
                    if (!empty($row['goods_img']) && is_file(ROOT_PATH . $row['goods_img']))
                    {
                        $zip->add_file(file_get_contents(ROOT_PATH . $row['goods_img']), $row['goods_img']);
                    }
                }
            }
            if (EC_CHARSET != 'utf-8')
            {
                $content = ecs_iconv(EC_CHARSET, 'utf-8', $content);
            }
            $zip->add_file("\xFF\xFE" . $this-> utf82u2($content), 'goods_list.csv');
            header("Content-Disposition: attachment; filename=goods_list.zip");
            header("Content-Type: application/unknown");
            die($zip->file());
        }
        /* 从淘宝导入数据 */
        elseif ($_REQUEST['act'] == 'import_taobao')
        {
            $this->display('import_taobao.htm');
        }
        elseif($_REQUEST['act'] == 'act_export_ecshop')
        {
            // 批量上传商品的字段
            $_LANG['ecshop']['goods_name'] = L('admin_ecgoodsexport_common1');
            $_LANG['ecshop']['goods_sn'] = L('admin_ecgoodsexport_common2');
            $_LANG['ecshop']['brand_name'] = L('admin_ecgoodsexport_common3');   // 需要转换成brand_id
            $_LANG['ecshop']['market_price'] = L('admin_ecgoodsexport_common4');
            $_LANG['ecshop']['shop_price'] = L('admin_ecgoodsexport_common5');
            $_LANG['ecshop']['integral'] = L('admin_ecgoodsexport_common6');
            $_LANG['ecshop']['original_img'] = L('admin_ecgoodsexport_common7');
            $_LANG['ecshop']['goods_img'] = L('admin_ecgoodsexport_common8');
            $_LANG['ecshop']['goods_thumb'] = L('admin_ecgoodsexport_common9');
            $_LANG['ecshop']['keywords'] = L('admin_ecgoodsexport_common10');
            $_LANG['ecshop']['goods_brief'] = L('admin_ecgoodsexport_common11');
            $_LANG['ecshop']['goods_desc'] = L('admin_ecgoodsexport_common12');
            $_LANG['ecshop']['goods_weight'] = L('admin_ecgoodsexport_common13');
            $_LANG['ecshop']['goods_number'] = L('admin_ecgoodsexport_common14');
            $_LANG['ecshop']['warn_number'] = L('admin_ecgoodsexport_common15');
            $_LANG['ecshop']['is_best'] = L('admin_ecgoodsexport_common16');
            $_LANG['ecshop']['is_new'] = L('admin_ecgoodsexport_common17');
            $_LANG['ecshop']['is_hot'] = L('admin_ecgoodsexport_common18');
            $_LANG['ecshop']['is_on_sale'] = L('admin_ecgoodsexport_common19');
            $_LANG['ecshop']['is_alone_sale'] = L('admin_ecgoodsexport_common20');
            $_LANG['ecshop']['is_real'] = L('admin_ecgoodsexport_common21');
        
            $zip = new EcPhpzip();
            $where = $this-> get_export_where_sql($_POST);
            
            $sql = "SELECT g.*, b.brand_name as brandname " .
                   " FROM " . $ecs->table('ec_goods') . " AS g LEFT JOIN " . $ecs->table('ec_brand') . " AS b " .
                   "ON g.brand_id = b.brand_id" . $where;
            $res = M()->query($sql);
            /* csv文件数组 */
            $goods_value = array();
            $goods_value['goods_name'] = '""';
            $goods_value['goods_sn'] = '""';
            $goods_value['brand_name'] = '""';
            $goods_value['market_price'] = 0;
            $goods_value['shop_price'] = 0;
            $goods_value['integral'] = 0;
            $goods_value['original_img'] = '""';
            $goods_value['goods_img'] = '""';
            $goods_value['goods_thumb'] = '""';
            $goods_value['keywords'] = '""';
            $goods_value['goods_brief'] = '""';
            $goods_value['goods_desc'] = '""';
            $goods_value['goods_weight'] = 0;
            $goods_value['goods_number'] = 0;
            $goods_value['warn_number'] = 0;
            $goods_value['is_best'] = 0;
            $goods_value['is_new'] = 0;
            $goods_value['is_hot'] = 0;
            $goods_value['is_on_sale'] = 1;
            $goods_value['is_alone_sale'] = 1;
            $goods_value['is_real'] = 1;
            $content = '"' . implode('","', $_LANG['ecshop']) . "\"\n";
            
            if(!empty($res)){
                foreach($res as $row ){
                    $goods_value['goods_name'] = '"' . $row['goods_name'] . '"';
                    $goods_value['goods_sn'] = '"' . $row['goods_sn'] . '"';
                    $goods_value['brand_name'] = '"' . $row['brandname'] . '"';
                    $goods_value['market_price'] = $row['market_price'];
                    $goods_value['shop_price'] = $row['shop_price'];
                    $goods_value['integral'] = $row['integral'];
                    $goods_value['original_img'] = '"' . $row['original_img'] . '"';
                    $goods_value['goods_img'] = '"' . $row['goods_img'] . '"';
                    $goods_value['goods_thumb'] = '"' . $row['goods_thumb'] . '"';
                    $goods_value['keywords'] = '"' . $row['keywords'] . '"';
                    $goods_value['goods_brief'] = '"' . $this-> replace_special_char($row['goods_brief'], false) . '"';
                    $goods_value['goods_desc'] = '"' . $this->replace_special_char($row['goods_desc'], false) . '"';
                    $goods_value['goods_weight'] = $row['goods_weight'];
                    $goods_value['goods_number'] = $row['goods_number'];
                    $goods_value['warn_number'] = $row['warn_number'];
                    $goods_value['is_best'] = $row['is_best'];
                    $goods_value['is_new'] = $row['is_new'];
                    $goods_value['is_hot'] = $row['is_hot'];
                    $goods_value['is_on_sale'] = $row['is_on_sale'];
                    $goods_value['is_alone_sale'] = $row['is_alone_sale'];
                    $goods_value['is_real'] = $row['is_real'];
                    $content .= implode(",", $goods_value) . "\n";
                    /* 压缩图片 */
                    if (!empty($row['goods_img']) && is_file(ROOT_PATH . $row['goods_img']))
                    {
                        $zip->add_file(file_get_contents(ROOT_PATH . $row['goods_img']), $row['goods_img']);
                    }
                    if (!empty($row['original_img']) && is_file(ROOT_PATH . $row['original_img']))
                    {
                        $zip->add_file(file_get_contents(ROOT_PATH . $row['original_img']), $row['original_img']);
                    }
                    if (!empty($row['goods_thumb']) && is_file(ROOT_PATH . $row['goods_thumb']))
                    {
                        $zip->add_file(file_get_contents(ROOT_PATH . $row['goods_thumb']), $row['goods_thumb']);
                    }
                }
            }
            $charset = empty($_POST['charset']) ? 'UTF8' : trim($_POST['charset']);
            $zip->add_file(ecs_iconv(EC_CHARSET, $charset, $content), 'goods_list.csv');
            header("Content-Disposition: attachment; filename=goods_list.zip");
            header("Content-Type: application/unknown");
            die($zip->file());
        }
        elseif ($_REQUEST['act'] == 'act_export_paipai')
        {
            $_LANG['paipai']['id'] = 'id';
            $_LANG['paipai']['tree_node_id'] = 'tree_node_id';
            $_LANG['paipai']['old_tree_node_id'] = 'old_tree_node_id';
            $_LANG['paipai']['title'] = 'title';
            $_LANG['paipai']['id_in_web'] = 'id_in_web';
            $_LANG['paipai']['auctionType'] = 'auctionType';
            $_LANG['paipai']['category'] = 'category';
            $_LANG['paipai']['shopCategoryId'] = 'shopCategoryId';
            $_LANG['paipai']['pictURL'] = 'pictURL';
            $_LANG['paipai']['quantity'] = 'quantity';
            $_LANG['paipai']['duration'] = 'duration';
            $_LANG['paipai']['startDate'] = 'startDate';
            $_LANG['paipai']['stuffStatus'] = 'stuffStatus';
            $_LANG['paipai']['price'] = 'price';
            $_LANG['paipai']['increment'] = 'increment';
            $_LANG['paipai']['prov'] = 'prov';
            $_LANG['paipai']['city'] = 'city';
            $_LANG['paipai']['shippingOption'] = 'shippingOption';
            $_LANG['paipai']['ordinaryPostFee'] = 'ordinaryPostFee';
            $_LANG['paipai']['fastPostFee'] = 'fastPostFee';
            $_LANG['paipai']['paymentOption'] = 'paymentOption';
            $_LANG['paipai']['haveInvoice'] = 'haveInvoice';
            $_LANG['paipai']['haveGuarantee'] = 'haveGuarantee';
            $_LANG['paipai']['secureTradeAgree'] = 'secureTradeAgree';
            $_LANG['paipai']['autoRepost'] = 'autoRepost';
            $_LANG['paipai']['shopWindow'] = 'shopWindow';
            $_LANG['paipai']['failed_reason'] = 'failed_reason';
            $_LANG['paipai']['pic_size'] = 'pic_size';
            $_LANG['paipai']['pic_filename'] = 'pic_filename';
            $_LANG['paipai']['pic'] = 'pic';
            $_LANG['paipai']['description'] = 'description';
            $_LANG['paipai']['story'] = 'story';
            $_LANG['paipai']['putStore'] = 'putStore';
            $_LANG['paipai']['pic_width'] = 'pic_width';
            $_LANG['paipai']['pic_height'] = 'pic_height';
            $_LANG['paipai']['skin'] = 'skin';
            $_LANG['paipai']['prop'] = 'prop';
            
            
            $zip = new EcPhpzip();
            
            $where = $this-> get_export_where_sql($_POST);
            $post_express = floatval($_POST['post_express']);
            $express = floatval($_POST['express']);
            if ($post_express < 0)
            {
                $post_express = 10;
            }
            if ($express < 0)
            {
                $express = 20;
            }
            
            $shop_province = '""';
            $shop_city = '""';
            if($ec_shop_province||$ec_shop_city)
            {
                $sql = "SELECT region_id,  region_name FROM " . $ecs->table('ec_region') . " WHERE region_id IN ('$ec_shop_province',  '$ec_shop_city')";
                $arr = M()->getAll($sql);
                if ($arr)
                {
                    if (count($arr) == 1)
                    {
                        if ($arr[0]['region_id'] == $ec_shop_province)
                        {
                            $shop_province = '"' . $arr[0]['region_name'] . '"' ;
                        }
                        else
                        {
                            $shop_city = '"' . $arr[0]['region_name'] . '"' ;
                        }
                    }
                    else
                    {
                        if ($arr[0]['region_id'] == $ec_shop_province)
                        {
                            $shop_province = '"' . $arr[0]['region_name'] . '"' ;
                            $shop_city = '"' . $arr[1]['region_name'] . '"';
                        }
                        else
                        {
                            $shop_province = '"' . $arr[1]['region_name'] . '"' ;
                            $shop_city = '"' . $arr[0]['region_name'] . '"';
                        }
                    }
                }
                
            }
            $sql = "SELECT g.goods_id, g.goods_name, g.shop_price, g.goods_number, g.goods_desc, g.goods_img ".
                " FROM " . $ecs->table('ec_goods') . " AS g ". $where;
            
            $res = M()->query($sql);
            
            $goods_value = array();
            $goods_value['id'] = -1;
            $goods_value['tree_node_id'] = -1;
            $goods_value['old_tree_node_id'] = -1;
            $goods_value['title'] = '""';
            $goods_value['id_in_web'] = '""';
            $goods_value['auctionType'] = '"b"';
            $goods_value['category'] = 0;
            $goods_value['shopCategoryId'] = '""';
            $goods_value['pictURL'] = '""';
            $goods_value['quantity'] = 0;
            $goods_value['duration'] = 14;
            $goods_value['startDate'] = '""';
            $goods_value['stuffStatus'] = 5;
            $goods_value['price'] = 0;
            $goods_value['increment'] = 0;
            $goods_value['prov'] = $shop_province;
            $goods_value['city'] = $shop_city;
            $goods_value['shippingOption'] = 1;
            $goods_value['ordinaryPostFee'] = $post_express;
            $goods_value['fastPostFee'] = $express;
            $goods_value['paymentOption'] = 5;
            $goods_value['haveInvoice'] = 0;
            $goods_value['haveGuarantee'] = 0;
            $goods_value['secureTradeAgree'] = 1;
            $goods_value['autoRepost'] = 1;
            $goods_value['shopWindow'] = 0;
            $goods_value['failed_reason'] = '""';
            $goods_value['pic_size'] = 0;
            $goods_value['pic_filename'] = '""';
            $goods_value['pic'] = '""';
            $goods_value['description'] = '""';
            $goods_value['story'] = '""';
            $goods_value['putStore'] = 0;
            $goods_value['pic_width'] = 80;
            $goods_value['pic_height'] = 80;
            $goods_value['skin'] = 0;
            $goods_value['prop'] = '""';
        
        
            $content = '"' . implode('","', $_LANG['paipai']) . "\"\n";
            if(!empty($res)){
                foreach($res as $row){
                    $goods_value['title'] = '"' . $row['goods_name'] . '"';
                    $goods_value['price'] = $row['shop_price'];
                    $goods_value['quantity'] = $row['goods_number'];
                    $goods_value['description'] = $this-> replace_special_char($row['goods_desc']);
                    $goods_value['pic_filename'] = '"' . $row['goods_img'] . '"';
            
                    $content .= implode(",", $goods_value) . "\n";
            
                    /* 压缩图片 */
                    if (!empty($row['goods_img']) && is_file(ROOT_PATH . $row['goods_img']))
                    {
                        $zip->add_file(file_get_contents(ROOT_PATH . $row['goods_img']), $row['goods_img']);
                    }
                }
            }
            if (EC_CHARSET == 'utf-8')
            {
                $zip->add_file(ecs_iconv('UTF8', 'GB2312', $content), 'goods_list.csv');
            }
            else
            {
                $zip->add_file($content, 'goods_list.csv');
            }
        
            header("Content-Disposition: attachment; filename=goods_list.zip");
            header("Content-Type: application/unknown");
            die($zip->file());
            
        }
        elseif ($_REQUEST['act'] == 'act_export_paipai4')
        {
            $_LANG['paipai4']['id'] = 'id';
            $_LANG['paipai4']['goods_name'] = L('admin_ecgoodsexport_common1');
            $_LANG['paipai4']['auctionType'] = L('admin_ecgoodsexport_common34');
            $_LANG['paipai4']['category'] = L('admin_ecgoodsexport_control_index_act_export_paipai41');
            $_LANG['paipai4']['shopCategoryId'] = L('admin_ecgoodsexport_control_index_act_export_paipai42');
            $_LANG['paipai4']['quantity'] = L('admin_ecgoodsexport_control_index_act_export_paipai43');
            $_LANG['paipai4']['duration'] = L('admin_ecgoodsexport_common38');
            $_LANG['paipai4']['startDate'] = L('admin_ecgoodsexport_control_index_act_export_paipai44');
            $_LANG['paipai4']['stuffStatus'] = L('admin_ecgoodsexport_common31');
            $_LANG['paipai4']['price'] = L('admin_ecgoodsexport_control_index_act_export_paipai45');
            $_LANG['paipai4']['increment'] = L('admin_ecgoodsexport_common36');
            $_LANG['paipai4']['prov'] = L('admin_ecgoodsexport_common32');
            $_LANG['paipai4']['city'] = L('admin_ecgoodsexport_control_index_act_export_paipai46');
            $_LANG['paipai4']['shippingOption'] = L('admin_ecgoodsexport_common39');
            $_LANG['paipai4']['ordinaryPostFee'] = L('admin_ecgoodsexport_common40');
            $_LANG['paipai4']['fastPostFee'] = L('admin_ecgoodsexport_common42');
            $_LANG['paipai4']['buyLimit'] = L('admin_ecgoodsexport_control_index_act_export_paipai47');
            $_LANG['paipai4']['paymentOption'] = L('admin_ecgoodsexport_common43');
            $_LANG['paipai4']['haveInvoice'] = L('admin_ecgoodsexport_control_index_act_export_paipai48');
            $_LANG['paipai4']['haveGuarantee'] = L('admin_ecgoodsexport_control_index_act_export_paipai49');
            $_LANG['paipai4']['secureTradeAgree'] = L('admin_ecgoodsexport_control_index_act_export_paipai410');
            $_LANG['paipai4']['autoRepost'] = L('admin_ecgoodsexport_common47');
            $_LANG['paipai4']['failed_reason'] = L('admin_ecgoodsexport_control_index_act_export_paipai411');
            $_LANG['paipai4']['pic_filename'] = L('admin_ecgoodsexport_control_index_act_export_paipai412');
            $_LANG['paipai4']['description'] = L('admin_ecgoodsexport_control_index_act_export_paipai413');
            $_LANG['paipai4']['shelfOption'] = L('admin_ecgoodsexport_control_index_act_export_paipai414');
            $_LANG['paipai4']['skin'] = L('admin_ecgoodsexport_control_index_act_export_paipai415');
            $_LANG['paipai4']['attr'] = L('admin_ecgoodsexport_control_index_act_export_paipai416');
            $_LANG['paipai4']['chengBao'] = L('admin_ecgoodsexport_control_index_act_export_paipai417');
            $_LANG['paipai4']['shopWindow'] = L('admin_ecgoodsexport_control_index_act_export_paipai418');


            $zip = new EcPhpzip();
            
            $where = $this-> get_export_where_sql($_POST);
            $post_express = floatval($_POST['post_express']);
            $express = floatval($_POST['express']);
            if ($post_express < 0)
            {
                $post_express = 10;
            }
            if ($express < 0)
            {
                $express = 20;
            }
            
            $shop_province = '""';
            $shop_city = '""';
            if($ec_shop_province||$ec_shop_city)
            {
                $sql = "SELECT region_id,  region_name FROM " . $ecs->table('ec_region') . " WHERE region_id IN ('$ec_shop_province',  '$ec_shop_city')";
                $arr = M()->getAll($sql);
                if ($arr)
                {
                    if (count($arr) == 1)
                    {
                        if ($arr[0]['region_id'] == $ec_shop_province)
                        {
                            $shop_province = '"' . $arr[0]['region_name'] . '"' ;
                        }
                        else
                        {
                            $shop_city = '"' . $arr[0]['region_name'] . '"' ;
                        }
                    }
                    else
                    {
                        if ($arr[0]['region_id'] == $ec_shop_province)
                        {
                            $shop_province = '"' . $arr[0]['region_name'] . '"' ;
                            $shop_city = '"' . $arr[1]['region_name'] . '"';
                        }
                        else
                        {
                            $shop_province = '"' . $arr[1]['region_name'] . '"' ;
                            $shop_city = '"' . $arr[0]['region_name'] . '"';
                        }
                    }
                }
                
            }
            $sql = "SELECT g.goods_id, g.goods_name, g.shop_price, g.goods_number, g.goods_desc, g.goods_img ".
                " FROM " . $ecs->table('ec_goods') . " AS g ". $where;
            
            $res = M()->query($sql);
            
            $goods_value = array();
            $goods_value['id'] = -1;
            $goods_value['goods_name'] = '""';
            $goods_value['auctionType'] = '"b"';
            $goods_value['category'] = 0;
            $goods_value['shopCategoryId'] = '""';
            $goods_value['quantity'] = 0;
            $goods_value['duration'] = 14;
            $goods_value['startDate'] = '""';
            $goods_value['stuffStatus'] = 5;
            $goods_value['price'] = 0;
            $goods_value['increment'] = 0;
            $goods_value['prov'] = $shop_province;
            $goods_value['city'] = $shop_city;
            $goods_value['shippingOption'] = 1;
            $goods_value['ordinaryPostFee'] = $post_express;
            $goods_value['fastPostFee'] = $express;
            $goods_value['buyLimit'] = 0;
            $goods_value['paymentOption'] = 5;
            $goods_value['haveInvoice'] = 0;
            $goods_value['haveGuarantee'] = 0;
            $goods_value['secureTradeAgree'] = 1;
            $goods_value['autoRepost'] = 1;
            $goods_value['failed_reason'] = '""';
            $goods_value['pic_filename'] = '""';
            $goods_value['description'] = '""';
            $goods_value['shelfOption'] = 0;
            $goods_value['skin'] = 0;
            $goods_value['attr'] = '""';
            $goods_value['chengBao'] = '""';
            $goods_value['shopWindow'] = 0;
                
        
            $content = '"' . implode('","', $_LANG['paipai4']) . "\"\n";
            if(!empty($res)){
                foreach($res as $row){
                    $goods_value['goods_name'] = '"' . $row['goods_name'] . '"';
                    $goods_value['price'] = $row['shop_price'];
                    $goods_value['quantity'] = $row['goods_number'];
                    $goods_value['description'] = $this-> replace_special_char($row['goods_desc']);
                    $goods_value['pic_filename'] = '"' . $row['goods_img'] . '"';
            
                    $content .= implode(",", $goods_value) . "\n";
            
                    /* 压缩图片 */
                    if (!empty($row['goods_img']) && is_file(ROOT_PATH . $row['goods_img']))
                    {
                        $zip->add_file(file_get_contents(ROOT_PATH . $row['goods_img']), $row['goods_img']);
                    }
                }
            }
            if (EC_CHARSET == 'utf-8')
            {
                $zip->add_file(ecs_iconv('UTF8', 'GB2312', $content), 'goods_list.csv');
            }
            else
            {
                $zip->add_file($content, 'goods_list.csv');
            }
        
            header("Content-Disposition: attachment; filename=goods_list.zip");
            header("Content-Type: application/unknown");
            die($zip->file());
            
        }
        /* 从拍拍网导入数据 */
        elseif ($_REQUEST['act'] == 'import_paipai')
        {
            $this->display('import_paipai.htm');
        }
        /* 处理Ajax调用 */
        elseif ($_REQUEST['act'] == 'get_goods_fields')
        {
            $cat_id = isset($_REQUEST['cat_id'])?intval($_REQUEST['cat_id']):0;
            $goods_fields = $this-> my_array_merge($_LANG['custom'], $this-> get_attributes($cat_id));
            make_json_result($goods_fields);
        }
        elseif ($_REQUEST['act'] == 'act_export_custom')
        {
            /* 检查输出列 */
            if (empty ($_POST['custom_goods_export']))
            {
               $this-> sys_msg(L('admin_ecgoodsexport_control_index_act_export_custom1'), 1, array(), false);
            }
            $zip = new EcPhpzip();
            
            $where = $this->get_export_where_sql($_POST);

            $sql = "SELECT g.*, b.brand_name as brandname " .
                   " FROM " . $ecs->table('ec_goods') . " AS g LEFT JOIN " . $ecs->table('ec_brand') . " AS b " .
                   "ON g.brand_id = b.brand_id" . $where;
        
            $res = M()->query($sql);
            $goods_fields = explode(',', $_POST['custom_goods_export']);
            $goods_field_name = $this-> set_goods_field_name($goods_fields, $_LANG['custom']);
    
            /* csv文件数组 */
            $goods_field_value = array();
            foreach ($goods_fields as $field)
            {
                if ($field == 'market_price' || $field == 'shop_price' || $field == 'integral' || $field == 'goods_weight' || $field == 'goods_number' || $field == 'warn_number' || $field == 'is_best' || $field == 'is_new' || $field == 'is_hot')
                {
                    $goods_field_value[$field] = 0;
                }
                elseif ($field == 'is_on_sale' || $field == 'is_alone_sale' || $field == 'is_real')
                {
                    $goods_field_value[$field] = 1;
                }
                else
                {
                    $goods_field_value[$field] = '""';
                }
            }
            $content = '"' . implode('","', $goods_field_name) . "\"\n";
            if(!empty($res)){
                foreach($res as $row )
                {
                    $goods_value = $goods_field_value;
                    isset($goods_value['goods_name']) && ($goods_value['goods_name'] = '"' . $row['goods_name'] . '"');
                    isset($goods_value['goods_sn']) && ($goods_value['goods_sn'] = '"' . $row['goods_sn'] . '"');
                    isset($goods_value['brand_name']) && ($goods_value['brand_name'] = $row['brandname']);
                    isset($goods_value['market_price']) && ($goods_value['market_price'] = $row['market_price']);
                    isset($goods_value['shop_price']) && ($goods_value['shop_price'] = $row['shop_price']);
                    isset($goods_value['integral']) && ($goods_value['integral'] = $row['integral']);
                    isset($goods_value['original_img']) && ($goods_value['original_img'] = '"' . $row['original_img'] . '"');
                    isset($goods_value['keywords']) && ($goods_value['keywords'] = '"' . $row['keywords'] . '"');
                    isset($goods_value['goods_brief']) && ($goods_value['goods_brief'] = '"' . $this-> replace_special_char($row['goods_brief']) . '"');
                    isset($goods_value['goods_desc']) && ($goods_value['goods_desc'] = '"' . $this-> replace_special_char($row['goods_desc']) . '"');
                    isset($goods_value['goods_weight']) && ($goods_value['goods_weight'] = $row['goods_weight']);
                    isset($goods_value['goods_number']) && ($goods_value['goods_number'] = $row['goods_number']);
                    isset($goods_value['warn_number']) && ($goods_value['warn_number'] = $row['warn_number']);
                    isset($goods_value['is_best']) && ($goods_value['is_best'] = $row['is_best']);
                    isset($goods_value['is_new']) && ($goods_value['is_new'] = $row['is_new']);
                    isset($goods_value['is_hot']) && ($goods_value['is_hot'] = $row['is_hot']);
                    isset($goods_value['is_on_sale']) && ($goods_value['is_on_sale'] = $row['is_on_sale']);
                    isset($goods_value['is_alone_sale']) && ($goods_value['is_alone_sale'] = $row['is_alone_sale']);
                    isset($goods_value['is_real']) && ($goods_value['is_real'] = $row['is_real']);
                    
                    $sql = "SELECT `attr_id`, `attr_value` 
                            FROM " . $ecs->table('ec_goods_attr') . " WHERE `goods_id` = '" . $row['goods_id'] . "'";
                    $query = M()->query($sql);
                    if(!empty($query)){
                        foreach($query as $attr)
                        {
                            if (in_array($attr['attr_id'], $goods_fields))
                            {
                                $goods_value[$attr['attr_id']] = '"' . $attr['attr_value'] . '"';
                            }
                        }
                    }
                    $content .= implode(",", $goods_value) . "\n";
                    /* 压缩图片 */
                    if (!empty($row['goods_img']) && is_file(ROOT_PATH . $row['goods_img']))
                    {
                        $zip->add_file(file_get_contents(ROOT_PATH . $row['goods_img']), $row['goods_img']);
                    }
                }
            }
            $charset = empty($_POST['charset_custom']) ? 'UTF8' : trim($_POST['charset_custom']);
            $zip->add_file(ecs_iconv(EC_CHARSET, $charset, $content), 'goods_list.csv');
        
            header("Content-Disposition: attachment; filename=goods_list.zip");
            header("Content-Type: application/unknown");
            die($zip->file());
            //p($goods_field_name);die;
        }
        elseif ($_REQUEST['act'] == 'get_goods_list')
        {
            $json = new JSON;
            $filters = $json->decode($_REQUEST['JSON']);
            $arr = get_goods_list($filters);
            $opt = array();
            
            foreach ($arr AS $key => $val)
            {
                $opt[] = array('goods_id' => $val['goods_id'],
                                'goods_name' => $val['goods_name']
                              );
            }
            make_json_result($opt);
        }
        elseif ($_REQUEST['act'] == 'act_export_taobao V4.6')
        {
            /*淘宝4.6*/
        $_LANG['taobao46']['goods_name'] = L('admin_ecgoodsexport_common28');
        $_LANG['taobao46']['goods_class'] = L('admin_ecgoodsexport_common29');
        $_LANG['taobao46']['shop_class'] = L('admin_ecgoodsexport_common30');
        $_LANG['taobao46']['new_level'] = L('admin_ecgoodsexport_common31');
        $_LANG['taobao46']['province'] = L('admin_ecgoodsexport_common32');
        $_LANG['taobao46']['city'] = L('admin_ecgoodsexport_common33');
        $_LANG['taobao46']['sell_type'] = L('admin_ecgoodsexport_common34');
        $_LANG['taobao46']['shop_price'] = L('admin_ecgoodsexport_common35');
        $_LANG['taobao46']['add_price'] = L('admin_ecgoodsexport_common36');
        $_LANG['taobao46']['goods_number'] = L('admin_ecgoodsexport_common37');
        $_LANG['taobao46']['die_day'] = L('admin_ecgoodsexport_common38');
        $_LANG['taobao46']['load_type'] = L('admin_ecgoodsexport_common39');
        $_LANG['taobao46']['post_express'] = L('admin_ecgoodsexport_common40');
        $_LANG['taobao46']['ems'] = L('admin_ecgoodsexport_common41');
        $_LANG['taobao46']['express'] = L('admin_ecgoodsexport_common42');
        $_LANG['taobao46']['pay_type'] = L('admin_ecgoodsexport_common43');
        $_LANG['taobao46']['allow_alipay'] = L('admin_ecgoodsexport_common44');
        $_LANG['taobao46']['invoice'] = L('admin_ecgoodsexport_common45');
        $_LANG['taobao46']['repair'] = L('admin_ecgoodsexport_common46');
        $_LANG['taobao46']['resend'] = L('admin_ecgoodsexport_common47');
        $_LANG['taobao46']['is_store'] = L('admin_ecgoodsexport_common48');
        $_LANG['taobao46']['window'] = L('admin_ecgoodsexport_common49');
        $_LANG['taobao46']['add_time'] = L('admin_ecgoodsexport_common50');
        $_LANG['taobao46']['story'] = L('admin_ecgoodsexport_common51');
        $_LANG['taobao46']['goods_desc'] = L('admin_ecgoodsexport_common52');
        $_LANG['taobao46']['goods_img'] = L('admin_ecgoodsexport_common53');
        $_LANG['taobao46']['goods_attr'] = L('admin_ecgoodsexport_common54');
        $_LANG['taobao46']['group_buy'] = L('admin_ecgoodsexport_common55');
        $_LANG['taobao46']['group_buy_num'] = L('admin_ecgoodsexport_common56');
        $_LANG['taobao46']['template'] = L('admin_ecgoodsexport_common57');
        $_LANG['taobao46']['discount'] = L('admin_ecgoodsexport_common58');
        $_LANG['taobao46']['modify_time'] = L('admin_ecgoodsexport_common59');
        $_LANG['taobao46']['upload_status'] = L('admin_ecgoodsexport_common60');
        $_LANG['taobao46']['img_status'] = L('admin_ecgoodsexport_common61');
        
        $_LANG['taobao46']['rebate_proportion'] = L('admin_ecgoodsexport_control_index_act_export_taobaoV461');
        $_LANG['taobao46']['new_picture'] = L('admin_ecgoodsexport_control_index_act_export_taobaoV462');
        $_LANG['taobao46']['video'] = L('admin_ecgoodsexport_control_index_act_export_taobaoV463');
        $_LANG['taobao46']['marketing_property_mix'] = L('admin_ecgoodsexport_control_index_act_export_taobaoV464');
        $_LANG['taobao46']['user_input_ID_numbers'] = L('admin_ecgoodsexport_control_index_act_export_taobaoV465');
        $_LANG['taobao46']['input_user_name_value'] = L('admin_ecgoodsexport_control_index_act_export_taobaoV466');
        $_LANG['taobao46']['sellers_code'] = L('admin_ecgoodsexport_control_index_act_export_taobaoV467');
        $_LANG['taobao46']['another_of_marketing_property'] = L('admin_ecgoodsexport_control_index_act_export_taobaoV468');
        $_LANG['taobao46']['charge_type'] = L('admin_ecgoodsexport_control_index_act_export_taobaoV469');
        $_LANG['taobao46']['treasure_number'] = L('admin_ecgoodsexport_control_index_act_export_taobaoV4610');
        $_LANG['taobao46']['ID_number'] = L('admin_ecgoodsexport_control_index_act_export_taobaoV4611');
        
        
            $zip = new EcPhpzip();
            
            $where = $this-> get_export_where_sql($_POST);
            
            $goods_class =  intval($_POST['goods_class']);
            $post_express = floatval($_POST['post_express']);
            $express = floatval($_POST['express']);
            $ems = floatval($_POST['ems']);
            
            $shop_province = '""';
            $shop_city = '""';
            $ec_shop_province=C('ec_shop_province');
            $ec_shop_city=C('ec_shop_city');

            if($ec_shop_province||$ec_shop_city)
            {
                $sql = "SELECT region_id,  region_name FROM " . $ecs->table('ec_region') . " WHERE region_id IN ('$ec_shop_province',  '$ec_shop_city')";
                $arr = M()->getAll($sql);
                if ($arr)
                {
                    if (count($arr) == 1)
                    {
                        if ($arr[0]['region_id'] == $ec_shop_province)
                        {
                            $shop_province = '"' . $arr[0]['region_name'] . '"' ;
                        }
                        else
                        {
                            $shop_city = '"' . $arr[0]['region_name'] . '"' ;
                        }
                    }
                    else
                    {
                        if ($arr[0]['region_id'] == $ec_shop_province)
                        {
                            $shop_province = '"' . $arr[0]['region_name'] . '"' ;
                            $shop_city = '"' . $arr[1]['region_name'] . '"';
                        }
                        else
                        {
                            $shop_province = '"' . $arr[1]['region_name'] . '"' ;
                            $shop_city = '"' . $arr[0]['region_name'] . '"';
                        }
                    }
                }
                
            }
            $sql = "SELECT g.goods_id, g.goods_name, g.shop_price, g.goods_number, g.goods_desc, g.goods_img ".
                    " FROM " . $ecs->table('ec_goods') . " AS g ". $where;
            $res = M()->query($sql);
            /* csv文件数组 */
            $goods_value = array(
                                'goods_name'=>'', 'goods_class'=>$goods_class, 'shop_class'=>0, 'new_level'=>0, 
                                'province'=>$shop_province, 'city'=>$shop_city, 'sell_type'=>'"b"', 
                                'shop_price'=>0, 'add_price'=>0, 'goods_number'=>0, 'die_day'=>14, 
                                'load_type'=>1, 'post_express'=>$post_express, 'ems'=>$ems, 'express'=>$express, 
                                'pay_type'=>'', 'allow_alipay'=>'', 'invoice'=>0, 'repair'=>0, 'resend'=>1, 'is_store'=>0, 
                                'window'=>0, 'add_time'=>'"1980-1-1  0:00:00"', 'story'=>'', 'goods_desc'=>'', 
                                'goods_img'=>'', 'goods_attr'=>'', 'group_buy'=>'', 'group_buy_num'=>'', 'template'=>0, 
                                'discount'=>0, 'modify_time'=>'"2011-5-1  0:00:00"', 'upload_status'=>100, 'img_status'=>1,
                                'img_status'=>'','rebate_proportion'=>0,'new_goods_img'=>'','video'=>'',
                                'marketing_property_mix'=>'','user_input_ID_numbers'=>'','input_user_name_value'=>'',
                                'sellers_code'=>'','another_of_marketing_property'=>'','charge_type'=>'0','treasure_number'=>'',
                                'ID_number'=>'');
        
            $content = implode("\t", $_LANG['taobao46']) . "\n";
            
            if(!empty($res)){
                foreach($res as $row){
                    /* 压缩图片 */
                    if (!empty($row['goods_img']) && is_file(ROOT_PATH . $row['goods_img']))
                    {
                        $row['new_goods_img']=preg_replace("/(^upload\/ec\/images\/)+(.*)(.gif|.jpg|.jpeg|.png)$/", "\${2}.tbi", $row['goods_img']);
                        //p($row['new_goods_img']);
                        @copy(ROOT_PATH .$row['goods_img'],ROOT_PATH ."upload\/ec\/images\/".$row['new_goods_img']);
                        if(is_file(ROOT_PATH ."upload\/ec\/images\/". $row['new_goods_img']))
                        {
                             $zip->add_file(file_get_contents(ROOT_PATH ."upload\/ec\/images\/". $row['new_goods_img']), $row['new_goods_img']);
                             unlink(ROOT_PATH ."upload\/ec\/images\/".$row['new_goods_img']);
                        }
                    }
                    $goods_value['goods_name'] = '"' . $row['goods_name'] . '"';
                    $goods_value['shop_price'] = $row['shop_price'];
                    $goods_value['goods_number'] = $row['goods_number'];
                    $goods_value['goods_desc'] = $this-> replace_special_char($row['goods_desc']);
                    if(!empty($row['new_goods_img']))
                    {
                        $row['new_goods_img']=str_ireplace('/','\\',$row['new_goods_img'],$row['new_goods_img']);
                        $row['new_goods_img']=str_ireplace('.tbi','',$row['new_goods_img'],$row['new_goods_img']);
                       $goods_value['new_goods_img'] = '"' . $row['new_goods_img'] . ':0:0:|;'.'"';
                    }
            
                    $content .= implode("\t", $goods_value) . "\n";
                }
            }
            if (EC_CHARSET != 'utf-8')
            {
                $content = ecs_iconv(EC_CHARSET, 'utf-8', $content);
            }
            $zip->add_file("\xFF\xFE" . $this-> utf82u2($content), 'goods_list.csv');
            header("Content-Disposition: attachment; filename=goods_list.zip");
            header("Content-Type: application/unknown");
            die($zip->file());
        }
        
        
    }
    
    
    
    /**
     *
     *
     * @access  public
     * @param
     *
     * @return void
     */
    function utf82u2($str)
    {
        $len = strlen($str);
        $start = 0;
        $result = '';
    
        if ($len == 0)
        {
            return $result;
        }
    
        while ($start < $len)
        {
            $num = ord($str{$start});
            if ($num < 127)
            {
                $result .= chr($num) . chr($num >> 8);
                $start += 1;
            }
            else
            {
                if ($num < 192)
                {
                    /* 无效字节 */
                    $start ++;
                }
                elseif ($num < 224)
                {
                    if ($start + 1 <  $len)
                    {
                        $num = (ord($str{$start}) & 0x3f) << 6;
                        $num += ord($str{$start+1}) & 0x3f;
                        $result .=   chr($num & 0xff) . chr($num >> 8) ;
                    }
                    $start += 2;
                }
                elseif ($num < 240)
                {
                    if ($start + 2 <  $len)
                    {
                        $num = (ord($str{$start}) & 0x1f) << 12;
                        $num += (ord($str{$start+1}) & 0x3f) << 6;
                        $num += ord($str{$start+2}) & 0x3f;
    
                        $result .=   chr($num & 0xff) . chr($num >> 8) ;
                    }
                    $start += 3;
                }
                elseif ($num < 248)
                {
    
                    if ($start + 3 <  $len)
                    {
                        $num = (ord($str{$start}) & 0x0f) << 18;
                        $num += (ord($str{$start+1}) & 0x3f) << 12;
                        $num += (ord($str{$start+2}) & 0x3f) << 6;
                        $num += ord($str{$start+3}) & 0x3f;
                        $result .= chr($num & 0xff) . chr($num >> 8) . chr($num >>16);
                    }
                    $start += 4;
                }
                elseif ($num < 252)
                {
                    if ($start + 4 <  $len)
                    {
                        /* 不做处理 */
                    }
                    $start += 5;
                }
                else
                {
                    if ($start + 5 <  $len)
                    {
                        /* 不做处理 */
                    }
                    $start += 6;
                }
            }
    
        }
    
        return $result;
    }
    
    /**
     *
     *
     * @access  public
     * @param
     *
     * @return string
     */
    public function image_path_format($content)
    {
        $prefix = 'http://' . $_SERVER['SERVER_NAME'];
        $pattern = '/(background|src)=[\'|\"]((?!http:\/\/).*?)[\'|\"]/i';
        $replace = "$1='" . $prefix . "$2'";
        return preg_replace($pattern, $replace, $content);
    }
    
    /**
     * 获取商品类型属性
     *
     * @param int $cat_id 商品类型ID
     *
     * @return array
     */
    public function get_attributes($cat_id = 0)
    {
        $sql = "SELECT `attr_id`, `cat_id`, `attr_name` FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_attribute') . " ";
        if (!empty($cat_id))
        {
            $cat_id = intval($cat_id);
            $sql .= " WHERE `cat_id` = '{$cat_id}' ";
        }
        $sql .= " ORDER BY `cat_id` ASC, `attr_id` ASC ";
        $attributes = array();
        $query = M()->query($sql);
        if(!empty($query)){
            foreach($query as $row)
            {
                $attributes[$row['attr_id']] = $row['attr_name'];
            }
        }
        return $attributes;
    }
    
    /**
     * 设置导出商品字段名
     *
     * @param array $array 字段数组
     * @param array $lang 字段名
     *
     * @return array
     */
    public function set_goods_field_name($array, $lang)
    {
        $tmp_fields = $array;
        foreach ($array as $key => $value)
        {
            if (isset($lang[$value]))
            {
                $tmp_fields[$key] = $lang[$value];
            }
            else
            {
                $tmp_fields[$key] = M()->getOne("SELECT `attr_name` FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_attribute') . " WHERE `attr_id` = '" . intval($value) . "'",'attr_name');
            }
        }
        return $tmp_fields;
    }
    
    /**
     * 数组合并
     *
     * @param array $array1 数组1
     * @param array $array2 数组2
     *
     * @return array
     */
    public function my_array_merge($array1, $array2)
    {
        $new_array = $array1;
        foreach ($array2 as $key => $val)
        {
            $new_array[$key] = $val;
        }
        return $new_array;
    }

    /**
     * 生成商品导出过滤条件
     *
     * @param array $filter 过滤条件数组
     *
     * @return string
     */
    public function get_export_where_sql($filter)
    {
        $where = '';
        if (!empty($filter['goods_ids']))
        {
            $goods_ids = explode(',', $filter['goods_ids']);
            if (is_array($goods_ids) && !empty($goods_ids))
            {
                $goods_ids = array_unique($goods_ids);
                $goods_ids = "'" . implode("','", $goods_ids) . "'";
            }
            else
            {
                $goods_ids = "'0'";
            }
            $where = " WHERE g.is_delete = 0 AND g.goods_id IN (" . $goods_ids . ") ";
        }
        else
        {
            $_filter = new StdClass();
            $_filter->cat_id = $filter['cat_id'];
            $_filter->brand_id = $filter['brand_id'];
            $_filter->keyword = $filter['keyword'];
            $where = get_where_sql($_filter);
        }
        return $where;
    }
    
    /**
     * 替换影响csv文件的字符
     *
     * @param $str string 处理字符串
     */
    public function replace_special_char($str, $replace = true)
    {
        $str = str_replace("\r\n", "",$this-> image_path_format($str));
        $str = str_replace("\t", "    ", $str);
        $str = str_replace("\n", "", $str);
        $str = str_replace(",", '，', $str);
        if ($replace == true)
        {
            $str = '"' . str_replace('"', '""', $str) . '"';
        }
        return $str;
    }
    
    
    
}
?>