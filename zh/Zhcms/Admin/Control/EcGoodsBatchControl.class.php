<?php
/**
 * 管理员管理模块
 * Class AdministratorControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcGoodsBatchControl extends EcAdminControl{
    
    //private $_db;

    public function __init() {
		//$this -> _db = K("AdminLog");
	}
    
    public function index(){
        $ecs=$GLOBALS['ec_globals']['ecs'];
        
	    /*$tdb=M();
	    $exc = new exchange($ecs->table("ec_ad_position"), $tdb, 'position_id', 'position_name');*/
        /* act操作项的初始化 */
        
        /*------------------------------------------------------ */
        //-- 批量上传
        /*------------------------------------------------------ */
        
        if ($_REQUEST['act'] == 'add')
        {
            /* 取得分类列表 */
            $this->assign('cat_list', cat_list());
            
            $lang_list = array(
                            'UTF8'      => L('admin_ecgoodsbatch_control_index_add1'),
                            'GB2312'    => L('admin_ecgoodsbatch_common1'),
                            'BIG5'      => L('admin_ecgoodsbatch_common2'),
                        );
            $download_list = array();
            $download_list['en_us']=sprintf(L('admin_ecgoodsbatch_common3'), '美国英语');
            $download_list['zh_cn']=sprintf(L('admin_ecgoodsbatch_common3'), L('admin_ecgoodsbatch_common1'));
            $download_list['zh_tw']=sprintf(L('admin_ecgoodsbatch_common3'), L('admin_ecgoodsbatch_common2'));
            
            $data_format_array = array(
                                'ecshop'    => L('admin_ecgoodsbatch_control_index_add2'),
                                'taobao'    => L('admin_ecgoodsbatch_control_index_add3'),
                                'paipai'    => L('admin_ecgoodsbatch_control_index_add4'),
                                'paipai3'   => L('admin_ecgoodsbatch_control_index_add5'),
                                'taobao46'  => L('admin_ecgoodsbatch_control_index_add6'),
                               );
            $this->assign('data_format', $data_format_array);
            $this->assign('lang_list',     $lang_list);
            $this->assign('download_list', $download_list);
            
            /* 参数赋值 */
            $ur_here = L('admin_ecgoodsbatch_control_index_add7');
            $this->assign('ur_here', $ur_here);
    
            /* 显示模板 */
            $this->display('goods_batch_add.htm');
        }
        /*------------------------------------------------------ */
        //-- 批量上传：处理
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'upload')
        {
            $_LANG['upload_goods']['goods_name'] = L('admin_ecgoodsbatch_common4');
            $_LANG['upload_goods']['goods_sn'] = L('admin_ecgoodsbatch_common5');
            $_LANG['upload_goods']['brand_name'] = L('admin_ecgoodsbatch_common6');   // 需要转换成brand_id
            $_LANG['upload_goods']['market_price'] = L('admin_ecgoodsbatch_common7');
            $_LANG['upload_goods']['shop_price'] = L('admin_ecgoodsbatch_common8');
            $_LANG['upload_goods']['integral'] = L('admin_ecgoodsbatch_common9');
            $_LANG['upload_goods']['original_img'] = L('admin_ecgoodsbatch_common10');
            $_LANG['upload_goods']['goods_img'] = L('admin_ecgoodsbatch_common11');
            $_LANG['upload_goods']['goods_thumb'] = L('admin_ecgoodsbatch_common12');
            $_LANG['upload_goods']['keywords'] = L('admin_ecgoodsbatch_common13');
            $_LANG['upload_goods']['goods_brief'] = L('admin_ecgoodsbatch_common14');
            $_LANG['upload_goods']['goods_desc'] = L('admin_ecgoodsbatch_common15');
            $_LANG['upload_goods']['goods_weight'] = L('admin_ecgoodsbatch_common16');
            $_LANG['upload_goods']['goods_number'] = L('admin_ecgoodsbatch_common17');
            $_LANG['upload_goods']['warn_number'] = L('admin_ecgoodsbatch_common18');
            $_LANG['upload_goods']['is_best'] = L('admin_ecgoodsbatch_common19');
            $_LANG['upload_goods']['is_new'] = L('admin_ecgoodsbatch_common20');
            $_LANG['upload_goods']['is_hot'] = L('admin_ecgoodsbatch_common21');
            $_LANG['upload_goods']['is_on_sale'] = L('admin_ecgoodsbatch_common22');
            $_LANG['upload_goods']['is_alone_sale'] = L('admin_ecgoodsbatch_common23');
            $_LANG['upload_goods']['is_real'] = L('admin_ecgoodsbatch_common24');
                
            /* 将文件按行读入数组，逐行进行解析 */
            $line_number = 0;
            $arr = array();
            $goods_list = array();
            $field_list = array_keys($_LANG['upload_goods']); // 字段列表
            $data = file($_FILES['file']['tmp_name']);
            if($_POST['data_cat'] == 'ecshop')
            {
                
                foreach ($data AS $line)
                {
                    // 跳过第一行
                    if ($line_number == 0)
                    {
                        $line_number++;
                        continue;
                    }
                    
                    // 转换编码
                    if (($_POST['charset'] != 'UTF8') && (strpos(strtolower(EC_CHARSET), 'utf') === 0))
                    {
                        $line = ecs_iconv($_POST['charset'], 'UTF8', $line);
                    }
                    
                    // 初始化
                    $arr    = array();
                    $buff   = '';
                    $quote  = 0;
                    $len    = strlen($line);
                    for ($i = 0; $i < $len; $i++)
                    {
                        $char = $line[$i];
                        if ('\\' == $char)
                        {
                            $i++;
                            $char = $line[$i];
        
                            switch ($char)
                            {
                                case '"':
                                    $buff .= '"';
                                    break;
                                case '\'':
                                    $buff .= '\'';
                                    break;
                                case ',';
                                    $buff .= ',';
                                    break;
                                default:
                                    $buff .= '\\' . $char;
                                    break;
                            }
                        }
                        elseif ('"' == $char)
                        {
                            if (0 == $quote)
                            {
                                $quote++;
                            }
                            else
                            {
                                $quote = 0;
                            }
                        }
                        elseif (',' == $char)
                        {
                            if (0 == $quote)
                            {
                                if (!isset($field_list[count($arr)]))
                                {
                                    continue;
                                }
                                $field_name = $field_list[count($arr)];
                                $arr[$field_name] = trim($buff);
                                $buff = '';
                                $quote = 0;
                            }
                            else
                            {
                                $buff .= $char;
                            }
                        }
                        else
                        {
                            $buff .= $char;
                        }
        
                        if ($i == $len - 1)
                        {
                            if (!isset($field_list[count($arr)]))
                            {
                                continue;
                            }
                            $field_name = $field_list[count($arr)];
                            $arr[$field_name] = trim($buff);
                        }
                    }
                    $goods_list[] = $arr;
                }
            }
            elseif($_POST['data_cat'] == 'taobao')
            {
                $id_is = 0;
                foreach ($data AS $line)
                {
                    // 跳过第一行
                    if ($line_number == 0)
                    {
                        $line_number++;
                        continue;
                    }
        
                    // 初始化
                    $arr    = array();
                    $line_list = explode("\t",$line);
                    $arr['goods_name'] = trim($line_list[0],'"');
        
                    $max_id     = M()->getOne("SELECT MAX(goods_id) + $id_is as maxid FROM ".$ecs->table('ec_goods'),'maxid');
                    $id_is++;
                    $goods_sn   = generate_goods_sn($max_id);
                    $arr['goods_sn'] = $goods_sn;
                    $arr['brand_name'] = '';
                    $arr['market_price'] = $line_list[7];
                    $arr['shop_price'] = $line_list[7];
                    $arr['integral'] = 0;
                    $arr['original_img'] = $line_list[25];
                    $arr['keywords'] = '';
                    $arr['goods_brief'] = '';
                    $arr['goods_desc'] = strip_tags($line_list[24]);
                    $arr['goods_desc'] = substr($arr['goods_desc'], 1, -1);
                    $arr['goods_number'] = $line_list[10];
                    $arr['warn_number'] =1;
                    $arr['is_best'] = 0;
                    $arr['is_new'] = 0;
                    $arr['is_hot'] = 0;
                    $arr['is_on_sale'] = 1;
                    $arr['is_alone_sale'] = 0;
                    $arr['is_real'] = 1;
        
                    $goods_list[] = $arr;
                }
            }
            elseif($_POST['data_cat'] == 'paipai')
            {
                $id_is = 0;
                foreach ($data AS $line)
                {
                    // 跳过第一行
                    if ($line_number == 0)
                    {
                        $line_number++;
                        continue;
                    }
        
                    // 初始化
                    $arr    = array();
                    $line_list = explode(",",$line);
                    $arr['goods_name'] = trim($line_list[3],'"');
        
                    $max_id     = M()->getOne("SELECT MAX(goods_id) + $id_is as maxid FROM ".$ecs->table('ec_goods'),'maxid');
                    $id_is++;
                    $goods_sn   = generate_goods_sn($max_id);
                    $arr['goods_sn'] = $goods_sn;
                    $arr['brand_name'] = '';
                    $arr['market_price'] = $line_list[13];
                    $arr['shop_price'] = $line_list[13];
                    $arr['integral'] = 0;
                    $arr['original_img'] = $line_list[28];
                    $arr['keywords'] = '';
                    $arr['goods_brief'] = '';
                    $arr['goods_desc'] = strip_tags($line_list[30]);
                    $arr['goods_number'] = 100;
                    $arr['warn_number'] =1;
                    $arr['is_best'] = 0;
                    $arr['is_new'] = 0;
                    $arr['is_hot'] = 0;
                    $arr['is_on_sale'] = 1;
                    $arr['is_alone_sale'] = 0;
                    $arr['is_real'] = 1;
        
                    $goods_list[] = $arr;
                }
            }
            elseif($_POST['data_cat'] == 'paipai3')
            {
                $id_is = 0;
                foreach ($data AS $line)
                {
                    // 跳过第一行
                    if ($line_number == 0)
                    {
                        $line_number++;
                        continue;
                    }
        
                    // 初始化
                    $arr    = array();
                    $line_list = explode(",",$line);
                    $arr['goods_name'] = trim($line_list[1],'"');
        
                    $max_id     = M()->getOne("SELECT MAX(goods_id) + $id_is as maxid FROM ".$ecs->table('ec_goods'),'maxid');
                    $id_is++;
                    $goods_sn   = generate_goods_sn($max_id);
                    $arr['goods_sn'] = $goods_sn;
                    $arr['brand_name'] = '';
                    $arr['market_price'] = $line_list[9];
                    $arr['shop_price'] = $line_list[9];
                    $arr['integral'] = 0;
                    $arr['original_img'] = $line_list[23];
                    $arr['keywords'] = '';
                    $arr['goods_brief'] = '';
                    $arr['goods_desc'] = strip_tags($line_list[24]);
                    $arr['goods_number'] = $line_list[5];
                    $arr['warn_number'] =1;
                    $arr['is_best'] = 0;
                    $arr['is_new'] = 0;
                    $arr['is_hot'] = 0;
                    $arr['is_on_sale'] = 1;
                    $arr['is_alone_sale'] = 0;
                    $arr['is_real'] = 1;
        
                    $goods_list[] = $arr;
                }
            }
            elseif($_POST['data_cat'] == 'taobao46')
            {
                $id_is = 0;
                foreach ($data AS $line)
                {
                    // 跳过第一行
                    if ($line_number == 0)
                    {
                        $line_number++;
                        continue;
                    }
                    if (($_POST['charset'] == 'UTF8') && (strpos(strtolower(EC_CHARSET), 'utf') == 0))
                    {
                        $line = ecs_iconv($_POST['charset'], 'GBK', $line);
                    }
                    // 初始化
                    $arr    = array();
                    $line_list = explode("\t",$line);
                    $arr['goods_name'] = trim($line_list[0],'"');
        
                    $max_id     = M()->getOne("SELECT MAX(goods_id) + $id_is as maxid FROM ".$ecs->table('ec_goods'),'maxid');
                    $id_is++;
                    $goods_sn   = generate_goods_sn($max_id);
                    $arr['goods_sn'] = $goods_sn;
                    $arr['brand_name'] = '';
                    $arr['market_price'] = $line_list[7];
                    $arr['shop_price'] = $line_list[7];
                    $arr['integral'] = 0;
                    $arr['original_img'] = str_replace('"','',$line_list[35]);
                    $arr['keywords'] = '';
                    $arr['goods_brief'] = '';
                    $arr['goods_desc'] = strip_tags($line_list[24]);
                    $arr['goods_desc'] = substr($arr['goods_desc'], 1, -1);
                    $arr['goods_number'] = $line_list[10];
                    $arr['warn_number'] =1;
                    $arr['is_best'] = 0;
                    $arr['is_new'] = 0;
                    $arr['is_hot'] = 0;
                    $arr['is_on_sale'] = 1;
                    $arr['is_alone_sale'] = 0;
                    $arr['is_real'] = 1;
        
                    $goods_list[] = $arr;
                }
            }
            $_LANG['g_class'][G_REAL] = L('admin_ecgoodsbatch_control_index_upload1');
            $_LANG['g_class'][G_CARD] = L('admin_ecgoodsbatch_control_index_upload2');
            $this->assign('goods_class', $_LANG['g_class']);
            $this->assign('goods_list', $goods_list);
            
            // 字段名称列表
            $this->assign('title_list', $_LANG['upload_goods']);
            
            // 显示的字段列表
            $this->assign('field_show', array(
                                            'goods_name' => true, 'goods_sn' => true, 'brand_name' => true, 
                                            'market_price' => true, 'shop_price' => true));
            /* 参数赋值 */
            $this->assign('ur_here', L('admin_ecgoodsbatch_control_index_upload3'));
            
            /* 显示模板 */
            $this->display('goods_batch_confirm.htm');
        }
        /*------------------------------------------------------ */
        //-- 批量上传：入库
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'insert')
        {
            $_LANG['upload_goods']['goods_name'] = L('admin_ecgoodsbatch_common4');
            $_LANG['upload_goods']['goods_sn'] = L('admin_ecgoodsbatch_common5');
            $_LANG['upload_goods']['brand_name'] = L('admin_ecgoodsbatch_common6');   // 需要转换成brand_id
            $_LANG['upload_goods']['market_price'] = L('admin_ecgoodsbatch_common7');
            $_LANG['upload_goods']['shop_price'] = L('admin_ecgoodsbatch_common8');
            $_LANG['upload_goods']['integral'] = L('admin_ecgoodsbatch_common9');
            $_LANG['upload_goods']['original_img'] = L('admin_ecgoodsbatch_common10');
            $_LANG['upload_goods']['goods_img'] = L('admin_ecgoodsbatch_common11');
            $_LANG['upload_goods']['goods_thumb'] = L('admin_ecgoodsbatch_common12');
            $_LANG['upload_goods']['keywords'] = L('admin_ecgoodsbatch_common13');
            $_LANG['upload_goods']['goods_brief'] = L('admin_ecgoodsbatch_common14');
            $_LANG['upload_goods']['goods_desc'] = L('admin_ecgoodsbatch_common15');
            $_LANG['upload_goods']['goods_weight'] = L('admin_ecgoodsbatch_common16');
            $_LANG['upload_goods']['goods_number'] = L('admin_ecgoodsbatch_common17');
            $_LANG['upload_goods']['warn_number'] = L('admin_ecgoodsbatch_common18');
            $_LANG['upload_goods']['is_best'] = L('admin_ecgoodsbatch_common19');
            $_LANG['upload_goods']['is_new'] = L('admin_ecgoodsbatch_common20');
            $_LANG['upload_goods']['is_hot'] = L('admin_ecgoodsbatch_common21');
            $_LANG['upload_goods']['is_on_sale'] = L('admin_ecgoodsbatch_common22');
            $_LANG['upload_goods']['is_alone_sale'] = L('admin_ecgoodsbatch_common23');
            $_LANG['upload_goods']['is_real'] = L('admin_ecgoodsbatch_common24');
            
            if (isset($_POST['checked']))
            {
                $image = new EcImage(C('ec_bgcolor'));
                /* 字段默认值 */
                $default_value = array(
                    'brand_id'      => 0,
                    'goods_number'  => 0,
                    'goods_weight'  => 0,
                    'market_price'  => 0,
                    'shop_price'    => 0,
                    'warn_number'   => 0,
                    'is_real'       => 1,
                    'is_on_sale'    => 1,
                    'is_alone_sale' => 1,
                    'integral'      => 0,
                    'is_best'       => 0,
                    'is_new'        => 0,
                    'is_hot'        => 0,
                    'goods_type'    => 0,
                );
                /* 查询品牌列表 */
                $brand_list = array();
                $sql = "SELECT brand_id, brand_name FROM " . $ecs->table('ec_brand');
                $res = M()->query($sql);
                if(!empty($res)){
                    foreach($res as $row)
                    {
                        $brand_list[$row['brand_name']] = $row['brand_id'];
                    }
                }
                /* 字段列表 */
                $field_list = array_keys($_LANG['upload_goods']);
                $field_list[] = 'goods_class'; //实体或虚拟商品
                
                /* 获取商品good id */
                $max_id = M()->getOne("SELECT MAX(goods_id) + 1 FROM ".$ecs->table('ec_goods'),'MAX(goods_id) + 1');
                
                /* 循环插入商品数据 */
                foreach ($_POST['checked'] AS $key => $value)
                {
                    // 合并
                    $field_arr = array(
                        'cat_id'        => $_POST['cat'],
                        'add_time'      => gmtime(),
                        'last_update'   => gmtime(),
                    );
                    
                    foreach ($field_list AS $field)
                    {
                        // 转换编码
                        $field_value = isset($_POST[$field][$value]) ? $_POST[$field][$value] : '';
                        
                        /* 虚拟商品处理 */
                        if ($field == 'goods_class')
                        {
                            $field_value = intval($field_value);
                            if ($field_value == G_CARD)
                            {
                                $field_arr['extension_code'] = 'virtual_card';
                            }
                            continue;
                        }
                        
                        // 如果字段值为空，且有默认值，取默认值
                        $field_arr[$field] = !isset($field_value) && isset($default_value[$field]) ? $default_value[$field] : $field_value;
                        
                        // 特殊处理
                        if (!empty($field_value))
                        {
                             // 图片路径
                            if (in_array($field, array('original_img', 'goods_img', 'goods_thumb')))
                            {
                                /*p($field);
                                p($field_value);
                                if(strpos($field_value,'|;')>0)
                                {
                                    $field_value=explode(':',$field_value);
                                    $field_value=$field_value['0'];
                                    @copy(ROOT_PATH.'upload/ec/images/'.$field_value.'.tbi',ROOT_PATH.'upload/ec/images/'.$field_value.'.jpg');
                                    if(is_file(ROOT_PATH.'upload/ec/images/'.$field_value.'.jpg'))
                                    {
                                        $field_arr[$field] =EC_IMAGE_DIR . '/' . $field_value.'.jpg';
                                    }
                                }
                                else
                                {
                                    $field_arr[$field] = EC_IMAGE_DIR . '/' . $field_value;
                                }
                                p($field_arr);die;*/
                                $field_arr[$field] ="";
                            }
                            // 品牌
                            elseif ($field == 'brand_name')
                            {
                                if (isset($brand_list[$field_value]))
                                {
                                    $field_arr['brand_id'] = $brand_list[$field_value];
                                }
                                else
                                {
                                    $sql = "INSERT INTO " . $ecs->table('ec_brand') . " (brand_name) VALUES ('" . addslashes($field_value) . "')";
                                    $insert_id=M()->exe($sql);
                                    $brand_id = $insert_id;
                                    $brand_list[$field_value] = $brand_id;
                                    $field_arr['brand_id'] = $brand_id;
                                }
                            }
                            // 整数型
                            elseif (in_array($field, array('goods_number', 'warn_number', 'integral')))
                            {
                                $field_arr[$field] = intval($field_value);
                            }
                            // 数值型
                            elseif (in_array($field, array('goods_weight', 'market_price', 'shop_price')))
                            {
                                $field_arr[$field] = floatval($field_value);
                            }
                            // bool型
                            elseif (in_array($field, array('is_best', 'is_new', 'is_hot', 'is_on_sale', 'is_alone_sale', 'is_real')))
                            {
                                $field_arr[$field] = intval($field_value) > 0 ? 1 : 0;
                            }
                        }
                        if ($field == 'is_real')
                        {
                            $field_arr[$field] = intval($_POST['goods_class'][$key]);
                        }

                    }
                    
                    if (empty($field_arr['goods_sn']))
                    {
                        $field_arr['goods_sn'] = generate_goods_sn($max_id);
                    }
                    /* 如果是虚拟商品，库存为0 */
                    if ($field_arr['is_real'] == 0)
                    {
                        $field_arr['goods_number'] = 0;
                    }
                    //p($field_arr);die;
                    $insert_id=M()->autoExecute($ecs->table('ec_goods'), $field_arr, 'INSERT');

                    $max_id = $insert_id + 1;
                    /* 如果图片不为空,修改商品图片，插入商品相册*/
                    if (!empty($field_arr['original_img']) || !empty($field_arr['goods_img']) || !empty($field_arr['goods_thumb']))
                    {
                        echo L('admin_ecgoodsbatch_control_index_insert1');die;
                        $goods_img     = '';
                        $goods_thumb   = '';
                        $original_img  = '';
                        $goods_gallery = array();
                        $goods_gallery['goods_id'] = $insert_id;
                        
                        $ec_auto_generate_gallery=C('ec_auto_generate_gallery');
                        if (!empty($field_arr['original_img']))
                        {
                            //设置商品相册原图和商品相册图
                            if ($ec_auto_generate_gallery)
                            {
                                $ext         = substr($field_arr['original_img'], strrpos($field_arr['original_img'], '.'));
                                $img         = dirname($field_arr['original_img']) . '/' . $image->random_filename() . $ext;
                                $gallery_img = dirname($field_arr['original_img']) . '/' . $image->random_filename() . $ext;
                                @copy(ROOT_PATH . $field_arr['original_img'], ROOT_PATH . $img);
                                @copy(ROOT_PATH . $field_arr['original_img'], ROOT_PATH . $gallery_img);
                                $goods_gallery['img_original'] = reformat_image_name('gallery', $goods_gallery['goods_id'], $img, 'source');
                            }
                            $ec_retain_original_img=C('ec_retain_original_img');
                            //设置商品原图
                            if ($ec_retain_original_img)
                            {
                                $original_img                  = reformat_image_name('goods', $goods_gallery['goods_id'], $field_arr['original_img'], 'source');
                            }
                            else
                            {
                                @unlink(ROOT_PATH . $field_arr['original_img']);
                            }
                        }
                        if (!empty($field_arr['goods_img']))
                        {
                            //设置商品相册图
                            if ($ec_auto_generate_gallery && !empty($gallery_img))
                            {
                                $goods_gallery['img_url'] = reformat_image_name('gallery', $goods_gallery['goods_id'], $gallery_img, 'goods');
                            }
                            //设置商品图
                            $goods_img                = reformat_image_name('goods', $goods_gallery['goods_id'], $field_arr['goods_img'], 'goods');
                        }
                        
                        if (!empty($field_arr['goods_thumb']))
                        {
                            //设置商品相册缩略图
                            if ($ec_auto_generate_gallery)
                            {
                                $ext           = substr($field_arr['goods_thumb'], strrpos($field_arr['goods_thumb'], '.'));
                                $gallery_thumb = dirname($field_arr['goods_thumb']) . '/' . $image->random_filename() . $ext;
                                @copy(ROOT_PATH . $field_arr['goods_thumb'], ROOT_PATH . $gallery_thumb);
                                $goods_gallery['thumb_url'] = reformat_image_name('gallery_thumb', $goods_gallery['goods_id'], $gallery_thumb, 'thumb');
                            }
                            //设置商品缩略图
                            $goods_thumb = reformat_image_name('goods_thumb', $goods_gallery['goods_id'], $field_arr['goods_thumb'], 'thumb');
                        }
                        //修改商品图
                        M()->exe("UPDATE " . $ecs->table('ec_goods') . " SET goods_img = '$goods_img', goods_thumb = '$goods_thumb', original_img = '$original_img' WHERE goods_id='" . $goods_gallery['goods_id'] . "'");
        
                        //添加商品相册图
                        if ($ec_auto_generate_gallery)
                        {
                            M()->autoExecute($ecs->table('ec_goods_gallery'), $goods_gallery, 'INSERT');
                        }
                    }
                }
            }
            // 记录日志
            admin_log('', L('admin_ecgoodsbatch_common25'), L('admin_ecgoodsbatch_common26'));
        
            /* 显示提示信息，返回商品列表 */
            $link[] = array('href' => U('admin/EcGoods/index',array('act'=>'list')), 'text' => L('admin_ecgoodsbatch_control_index_insert2'));
            $this-> sys_msg(L('admin_ecgoodsbatch_common25'), 0, $link);
        }
        /*------------------------------------------------------ */
        //-- 批量修改：选择商品
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'select')
        {
            /* 取得分类列表 */
            $this->assign('cat_list', cat_list());
        
            /* 取得品牌列表 */
            $this->assign('brand_list', get_brand_list());
        
            /* 参数赋值 */
            $ur_here = L('admin_ecgoodsbatch_common27');
            $this->assign('ur_here', $ur_here);
        
            /* 显示模板 */
            //assign_query_info();
            $this->display('goods_batch_select.htm');
        }
        
        /*------------------------------------------------------ */
        //-- 批量修改：修改
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit')
        {
            /* 取得商品列表 */
            if ($_POST['select_method'] == 'cat')
            {
                $where = " WHERE goods_id " . db_create_in($_POST['goods_ids']);
            }
            else
            {
                $goods_sns = str_replace("\n", ',', str_replace("\r", '', $_POST['sn_list']));
                $sql = "SELECT DISTINCT goods_id FROM " . $ecs->table('ec_goods') .
                        " WHERE goods_sn " . db_create_in($goods_sns);
                $goods_ids = join(',', M()->getCol($sql,'goods_id'));
                $where = " WHERE goods_id " . db_create_in($goods_ids);
            }
            $sql = "SELECT DISTINCT goods_id, goods_sn, goods_name, market_price, shop_price, goods_number, integral, give_integral, brand_id, is_real FROM " . $ecs->table('ec_goods') . $where;
            $this->assign('goods_list', M()->getAll($sql));
            
            /* 取编辑商品的货品列表 */
            $product_exists = false;
            $sql = "SELECT * FROM " . $ecs->table('ec_products') . $where;
            $product_list = M()->getAll($sql);
            if(!empty($product_list)){
                $product_exists = true;
                $_product_list = array();
                foreach ($product_list as $value)
                {
                    $goods_attr = product_goods_attr_list($value['goods_id']);
                    $_goods_attr_array = explode('|', $value['goods_attr']);
                   
                    if (is_array($_goods_attr_array))
                    {
                        $_temp = '';
                        foreach ($_goods_attr_array as $_goods_attr_value)
                        {
                            /*p($goods_attr);
                            p($value);
                            p($_goods_attr_value);
                            p($_goods_attr_array);*/
                             $_temp[] = $goods_attr[$_goods_attr_value];
                        }
                        //p($_temp);
                        $value['goods_attr'] = implode('，', $_temp);
                    }
                     
                    $_product_list[$value['goods_id']][] = $value;
                }
                $this->assign('product_list', $_product_list);
                //释放资源
                unset($product_list, $sql, $_product_list);
            }
            $this->assign('product_exists', $product_exists);
            /* 取得会员价格 */
            $member_price_list = array();
            $sql = "SELECT DISTINCT goods_id, user_rank, user_price FROM " . $ecs->table('ec_member_price') . $where;
            $res = M()->query($sql);
            if(!empty($res)){
                foreach($res as $row)
                {
                    $member_price_list[$row['goods_id']][$row['user_rank']] = $row['user_price'];
                }   
            }
            $this->assign('member_price_list', $member_price_list);
            
            /* 取得会员等级 */
            $sql = "SELECT rank_id, rank_name, discount " .
                    "FROM " . $ecs->table('ec_user_rank') .
                    " ORDER BY discount DESC";
            $this->assign('rank_list', M()->getAll($sql));
            
            /* 取得品牌列表 */
            $this->assign('brand_list', get_brand_list());
        
            /* 赋值编辑方式 */
            $this->assign('edit_method', $_POST['edit_method']);
            
            /* 参数赋值 */
            $ur_here = L('admin_ecgoodsbatch_common27');
            $this->assign('ur_here', $ur_here);
        
            /* 显示模板 */
            //assign_query_info();
            $this->display('goods_batch_edit.htm');
            
        }
        /*------------------------------------------------------ */
        //-- 批量修改：提交
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'update')
        {
            if ($_POST['edit_method'] == 'each')
            {
                // 循环更新每个商品
                if (!empty($_POST['goods_id']))
                {
                    foreach ($_POST['goods_id'] AS $goods_id)
                    {
                        //如果存在货品则处理货品
                        if (!empty($_POST['product_number'][$goods_id]))
                        {
                            $_POST['goods_number'][$goods_id] = 0;
                            foreach ($_POST['product_number'][$goods_id] as $key => $value)
                            {
                                M()->autoExecute($ecs->table('ec_products'), array('product_number', $value), 'UPDATE', "goods_id = '$goods_id' AND product_id = " . $key);

                                $_POST['goods_number'][$goods_id] += $value;
                            }
                        }
                        // 更新商品
                        $goods = array(
                            'market_price'  => floatval($_POST['market_price'][$goods_id]),
                            'shop_price'    => floatval($_POST['shop_price'][$goods_id]),
                            'integral'      => intval($_POST['integral'][$goods_id]),
                            'give_integral'      => intval($_POST['give_integral'][$goods_id]),
                            'goods_number'  => intval($_POST['goods_number'][$goods_id]),
                            'brand_id'      => intval($_POST['brand_id'][$goods_id]),
                            'last_update'   => gmtime(),
                        );
                        M()->autoExecute($ecs->table('ec_goods'), $goods, 'UPDATE', "goods_id = '$goods_id'");
                        
                        // 更新会员价格
                        if (!empty($_POST['rank_id']))
                        {
                            foreach ($_POST['rank_id'] AS $rank_id)
                            {
                                if (trim($_POST['member_price'][$goods_id][$rank_id]) == '')
                                {
                                    /* 为空时不做处理 */
                                    continue;
                                }
                                $rank = array(
                                    'goods_id'  => $goods_id,
                                    'user_rank' => $rank_id,
                                    'user_price'=> floatval($_POST['member_price'][$goods_id][$rank_id]),
                                );
                                $sql = "SELECT COUNT(*) FROM " . $ecs->table('ec_member_price') . " WHERE goods_id = '$goods_id' AND user_rank = '$rank_id'";
                                if (M()->getOne($sql,'COUNT(*)') > 0)
                                {
                                    if ($rank['user_price'] < 0)
                                    {
                                        M()->exe("DELETE FROM " . $ecs->table('ec_member_price') . " WHERE goods_id = '$goods_id' AND user_rank = '$rank_id'");
                                    }
                                    else
                                    {
                                        M()->autoExecute($ecs->table('ec_member_price'), $rank, 'UPDATE', "goods_id = '$goods_id' AND user_rank = '$rank_id'");
                                    }
                                }
                                else
                                {
                                    if ($rank['user_price'] >= 0)
                                    {
                                        M()->autoExecute($ecs->table('ec_member_price'), $rank, 'INSERT');
                                    }
                                }
                            }
                        }
                        
                    }
                }
            }
            else
            {
                // 循环更新每个商品
                if (!empty($_POST['goods_id']))
                {
                    foreach ($_POST['goods_id'] AS $goods_id)
                    {

                        // 更新商品
                        $goods = array();
                        if (trim($_POST['market_price'] != ''))
                        {
                            $goods['market_price'] = floatval($_POST['market_price']);
                        }
                        if (trim($_POST['shop_price']) != '')
                        {
                            $goods['shop_price'] = floatval($_POST['shop_price']);
                        }
                        if (trim($_POST['integral']) != '')
                        {
                            $goods['integral'] = intval($_POST['integral']);
                        }
                        if (trim($_POST['give_integral']) != '')
                        {
                            $goods['give_integral'] = intval($_POST['give_integral']);
                        }
                        if (trim($_POST['goods_number']) != '')
                        {
                            $goods['goods_number'] = intval($_POST['goods_number']);
                        }
                        if ($_POST['brand_id'] > 0)
                        {
                            $goods['brand_id'] = $_POST['brand_id'];
                        }
                        if (!empty($goods))
                        {
                            M()->autoExecute($ecs->table('ec_goods'), $goods, 'UPDATE', "goods_id = '$goods_id'");
                        }
                        
                        // 更新会员价格
                        if (!empty($_POST['rank_id']))
                        {
                            foreach ($_POST['rank_id'] AS $rank_id)
                            {
                                if (trim($_POST['member_price'][$rank_id]) != '')
                                {
                                    $rank = array(
                                            'goods_id'  => $goods_id,
                                            'user_rank' => $rank_id,
                                            'user_price'=> floatval($_POST['member_price'][$rank_id]),
                                            );
                                    $sql = "SELECT COUNT(*) FROM " . $ecs->table('ec_member_price') . " WHERE goods_id = '$goods_id' AND user_rank = '$rank_id'";
                                    if (M()->getOne($sql,'COUNT(*)') > 0)
                                    {
                                        if ($rank['user_price'] < 0)
                                        {
                                            M()->exe("DELETE FROM " . $ecs->table('ec_member_price') . " WHERE goods_id = '$goods_id' AND user_rank = '$rank_id'");
                                        }
                                        else
                                        {
                                            M()->autoExecute($ecs->table('ec_member_price'), $rank, 'UPDATE', "goods_id = '$goods_id' AND user_rank = '$rank_id'");
                                        }
        
                                    }
                                    else
                                    {
                                        if ($rank['user_price'] >= 0)
                                        {
                                            M()->autoExecute($ecs->table('ec_member_price'), $rank, 'INSERT');
                                        }
                                    }
                                    
                                }
                            }
                        }
                    }
                }
            }
            // 记录日志
            admin_log('', L('admin_ecgoodsbatch_common27'), L('admin_ecgoodsbatch_common26'));
        
            // 提示成功
            $link[] = array('href' => U('index',array('act'=>'select')), 'text' => L('admin_ecgoodsbatch_common27'));
            $this-> sys_msg(L('admin_ecgoodsbatch_control_index_update1'), 0, $link);
        }
        /*------------------------------------------------------ */
        //-- 下载文件
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'download')
        {
            // 文件标签
            // Header("Content-type: application/octet-stream");
            header("Content-type: application/vnd.ms-excel; charset=utf-8");
            Header("Content-Disposition: attachment; filename=goods_list.csv");
            // 下载
            if($_GET['charset'] == 'en_us')
            {
                $_LANG['upload_goods']['goods_name'] ='Name';
                $_LANG['upload_goods']['goods_sn'] ='NO.';
                $_LANG['upload_goods']['brand_name'] ='Brand';   // Need to be convert brand_id
                $_LANG['upload_goods']['market_price'] ='Market price';
                $_LANG['upload_goods']['shop_price'] ='Shop price';
                $_LANG['upload_goods']['integral'] ='Points limit for buying';
                $_LANG['upload_goods']['original_img'] ='Original picture';
                $_LANG['upload_goods']['goods_img'] ='Picture';
                $_LANG['upload_goods']['goods_thumb'] ='Thumbnail';
                $_LANG['upload_goods']['keywords'] ='Keywords';
                $_LANG['upload_goods']['goods_brief'] ='Brief';
                $_LANG['upload_goods']['goods_desc'] ='Details';
                $_LANG['upload_goods']['goods_weight'] ='Weight(kg)';
                $_LANG['upload_goods']['goods_number'] ='Stock quantity';
                $_LANG['upload_goods']['warn_number'] ='Stock warning quantity';
                $_LANG['upload_goods']['is_best'] ='Best';
                $_LANG['upload_goods']['is_new'] ='New';
                $_LANG['upload_goods']['is_hot'] ='Hot';
                $_LANG['upload_goods']['is_on_sale'] ='On sale';
                $_LANG['upload_goods']['is_alone_sale'] ='Can be a common product sale?';
                $_LANG['upload_goods']['is_real'] ='Entity';
            }else if($_GET['charset'] == 'zh_cn'){
                $_LANG['upload_goods']['goods_name'] = L('admin_ecgoodsbatch_common4');
                $_LANG['upload_goods']['goods_sn'] = L('admin_ecgoodsbatch_common5');
                $_LANG['upload_goods']['brand_name'] = L('admin_ecgoodsbatch_common6');   // 需要转换成brand_id
                $_LANG['upload_goods']['market_price'] = L('admin_ecgoodsbatch_common7');
                $_LANG['upload_goods']['shop_price'] = L('admin_ecgoodsbatch_common8');
                $_LANG['upload_goods']['integral'] = L('admin_ecgoodsbatch_common9');
                $_LANG['upload_goods']['original_img'] = L('admin_ecgoodsbatch_common10');
                $_LANG['upload_goods']['goods_img'] = L('admin_ecgoodsbatch_common11');
                $_LANG['upload_goods']['goods_thumb'] = L('admin_ecgoodsbatch_common12');
                $_LANG['upload_goods']['keywords'] = L('admin_ecgoodsbatch_common13');
                $_LANG['upload_goods']['goods_brief'] = L('admin_ecgoodsbatch_common14');
                $_LANG['upload_goods']['goods_desc'] = L('admin_ecgoodsbatch_common15');
                $_LANG['upload_goods']['goods_weight'] = L('admin_ecgoodsbatch_common16');
                $_LANG['upload_goods']['goods_number'] = L('admin_ecgoodsbatch_common17');
                $_LANG['upload_goods']['warn_number'] = L('admin_ecgoodsbatch_common18');
                $_LANG['upload_goods']['is_best'] = L('admin_ecgoodsbatch_common19');
                $_LANG['upload_goods']['is_new'] = L('admin_ecgoodsbatch_common20');
                $_LANG['upload_goods']['is_hot'] = L('admin_ecgoodsbatch_common21');
                $_LANG['upload_goods']['is_on_sale'] = L('admin_ecgoodsbatch_common22');
                $_LANG['upload_goods']['is_alone_sale'] = L('admin_ecgoodsbatch_common23');
                $_LANG['upload_goods']['is_real'] = L('admin_ecgoodsbatch_common24');
            }
            else if($_GET['charset'] == 'zh_tw'){
                $_LANG['upload_goods']['goods_name'] = L('admin_ecgoodsbatch_control_index_download1');
                $_LANG['upload_goods']['goods_sn'] = L('admin_ecgoodsbatch_control_index_download2');
                $_LANG['upload_goods']['brand_name'] = L('admin_ecgoodsbatch_common6');   // 需要轉換成brand_id
                $_LANG['upload_goods']['market_price'] = L('admin_ecgoodsbatch_control_index_download3');
                $_LANG['upload_goods']['shop_price'] = L('admin_ecgoodsbatch_control_index_download4');
                $_LANG['upload_goods']['integral'] = L('admin_ecgoodsbatch_control_index_download5');
                $_LANG['upload_goods']['original_img'] = L('admin_ecgoodsbatch_control_index_download6');
                $_LANG['upload_goods']['goods_img'] = L('admin_ecgoodsbatch_control_index_download7');
                $_LANG['upload_goods']['goods_thumb'] = L('admin_ecgoodsbatch_control_index_download8');
                $_LANG['upload_goods']['keywords'] = L('admin_ecgoodsbatch_control_index_download9');
                $_LANG['upload_goods']['goods_brief'] = L('admin_ecgoodsbatch_control_index_download10');
                $_LANG['upload_goods']['goods_desc'] = L('admin_ecgoodsbatch_control_index_download11');
                $_LANG['upload_goods']['goods_weight'] = L('admin_ecgoodsbatch_common16');
                $_LANG['upload_goods']['goods_number'] = L('admin_ecgoodsbatch_control_index_download12');
                $_LANG['upload_goods']['warn_number'] = L('admin_ecgoodsbatch_control_index_download13');
                $_LANG['upload_goods']['is_best'] = L('admin_ecgoodsbatch_common19');
                $_LANG['upload_goods']['is_new'] = L('admin_ecgoodsbatch_common20');
                $_LANG['upload_goods']['is_hot'] = L('admin_ecgoodsbatch_control_index_download14');
                $_LANG['upload_goods']['is_on_sale'] = L('admin_ecgoodsbatch_common22');
                $_LANG['upload_goods']['is_alone_sale'] = L('admin_ecgoodsbatch_control_index_download15');
                $_LANG['upload_goods']['is_real'] = L('admin_ecgoodsbatch_control_index_download16');

            }
            if (isset($_LANG['upload_goods']))
            {
                /* 创建字符集转换对象 */
                if ($_GET['charset'] == 'zh_cn' || $_GET['charset'] == 'zh_tw')
                {
                    $to_charset = $_GET['charset'] == 'zh_cn' ? 'GB2312' : 'BIG5';
                    echo ecs_iconv(EC_CHARSET, $to_charset, join(',', $_LANG['upload_goods']));
                }
                else
                {
                    echo join(',', $_LANG['upload_goods']);
                }
            }else{
                echo 'error: $_LANG[upload_goods] not exists';
            }
            die;
        }
        /*------------------------------------------------------ */
        //-- 取得商品
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'get_goods')
        {
            $filter = new StdClass();
        
            $filter->cat_id = intval($_GET['cat_id']);
            $filter->brand_id = intval($_GET['brand_id']);
            $filter->real_goods = -1;
            $filter->keyword="";
            $arr = get_goods_list($filter);
        
            make_json_result($arr);die;
        }

        
        
                
    }
    
    

}
?>