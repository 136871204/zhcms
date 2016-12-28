<?php
/**
 * 商品类型
 * @author 周鸿 <136871204@qq.com>
 */
class EcGoodsControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("Goods");
        $this->font_styles=array('strong' => '肥大', 'em' => 'イタリック', 'u' => 'アンダーライン', 'strike' => '削除線');
	}
    
    public function index(){
        $ecs=$GLOBALS['ec_globals']['ecs'];
        $image = new EcImage(C('ec_bgcolor'));
        $tdb=M();
	    $exc = new exchange($ecs->table("ec_goods"), $tdb, 'goods_id', 'goods_name');
        /*------------------------------------------------------ */
        //-- 商品列表，商品回收站
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'list' || $_REQUEST['act'] == 'trash'){
            $cat_id = empty($_REQUEST['cat_id']) ? 0 : intval($_REQUEST['cat_id']);
            $code   = empty($_REQUEST['extension_code']) ? '' : trim($_REQUEST['extension_code']);
            $suppliers_id = isset($_REQUEST['suppliers_id']) ? (empty($_REQUEST['suppliers_id']) ? '' : trim($_REQUEST['suppliers_id'])) : '';
            $is_on_sale = isset($_REQUEST['is_on_sale']) ? ((empty($_REQUEST['is_on_sale']) && $_REQUEST['is_on_sale'] === 0) ? '' : trim($_REQUEST['is_on_sale'])) : '';
            
            $handler_list = array();
            $handler_list['virtual_card'][] = array('url'=>U('admin/EcVirtualCard/index',array('act'=>'card')), 'title'=>'バーチャルカード情報を見る', 'img'=>'icon_send_bonus.gif');
            $handler_list['virtual_card'][] = array('url'=>U('admin/EcVirtualCard/index',array('act'=>'replenish')), 'title'=>'品物追加', 'img'=>'icon_add.gif');
            $handler_list['virtual_card'][] = array('url'=>U('admin/EcVirtualCard/index',array('act'=>'batch_card_add')), 'title'=>'バッチ追加', 'img'=>'icon_output.gif');
        
            if ($_REQUEST['act'] == 'list' && isset($handler_list[$code]))
            {
                $this->assign('add_handler',      $handler_list[$code]);
            }
            
            /* 供货商名 */
            $suppliers_list_name = suppliers_list_name();
            $suppliers_exists = 1;
            if (empty($suppliers_list_name))
            {
                $suppliers_exists = 0;
            }
            $this->assign('is_on_sale', $is_on_sale);
            $this->assign('suppliers_id', $suppliers_id);
            $this->assign('suppliers_exists', $suppliers_exists);
            $this->assign('suppliers_list_name', $suppliers_list_name);
            unset($suppliers_list_name, $suppliers_exists);
            
            /* 模板赋值 */
            $goods_ur = array('' => '商品リスト', 'virtual_card'=>'バーチャル商品リスト');
            $ur_here = ($_REQUEST['act'] == 'list') ? $goods_ur[$code] : '商品回収所';
            $this->assign('ur_here', $ur_here);
            
            $action_link = ($_REQUEST['act'] == 'list') ? $this->add_link($code) : array('href' => U('index',array('act'=>'list')), 'text' => '商品リスト');
            $this->assign('action_link',  $action_link);
            $this->assign('code',     $code);
            $this->assign('cat_list',     cat_list(0, $cat_id));
            $this->assign('brand_list',   get_brand_list());
            $this->assign('intro_list',   get_intro_list());
            //$this->assign('lang',         $_LANG);
            $this->assign('list_type',    $_REQUEST['act'] == 'list' ? 'goods' : 'trash');
            $use_storage=C('ec_use_storage');
            $this->assign('use_storage',  empty($use_storage) ? 0 : 1);
            
            $suppliers_list = suppliers_list_info(' is_check = 1 ');
            $suppliers_list_count = count($suppliers_list);
            $this->assign('suppliers_list', ($suppliers_list_count == 0 ? 0 : $suppliers_list)); // 取供货商列表
            
            $goods_list = goods_list($_REQUEST['act'] == 'list' ? 0 : 1, ($_REQUEST['act'] == 'list') ? (($code == '') ? 1 : 0) : -1);
            $this->assign('goods_list',   $goods_list['goods']);
            $this->assign('filter',       $goods_list['filter']);
            $this->assign('record_count', $goods_list['record_count']);
            $this->assign('page_count',   $goods_list['page_count']);
            $this->assign('full_page',    1);
            
            /* 排序标记 */
            $sort_flag  = sort_flag($goods_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
            
            
            /* 获取商品类型存在规格的类型 */
            $specifications = get_goods_type_specifications();
            $this->assign('specifications', $specifications);
            
            $htm_file = ($_REQUEST['act'] == 'list') ?
                'goods_list.htm' : (($_REQUEST['act'] == 'trash') ? 'goods_trash.htm' : 'group_list.htm');
            $this->display($htm_file);
        }
        /*------------------------------------------------------ */
        //-- 添加新商品 编辑商品
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit' || $_REQUEST['act'] == 'copy'){
            //include_once(ROOT_PATH . 'includes/fckeditor/fckeditor.php'); // 包含 html editor 类文件
            //ZHPHP_EXTEND_PATH
            include_once(ZHPHP_EXTEND_PATH . 'Org/fckeditor/fckeditor.php'); // 包含 html editor 类文件
            $is_add = $_REQUEST['act'] == 'add'; // 添加还是编辑的标识
            $is_copy = $_REQUEST['act'] == 'copy'; //是否复制
            $code = empty($_REQUEST['extension_code']) ? '' : trim($_REQUEST['extension_code']);
           // echo $code;
            $code=$code=='virtual_card' ? 'virtual_card': '';
            //if($code=='virual_card')
            //echo $code;die;
            /* 供货商名 */
            $suppliers_list_name = suppliers_list_name();
            $suppliers_exists = 1;
            if (empty($suppliers_list_name))
            {
                $suppliers_exists = 0;
            }
            $this->assign('suppliers_exists', $suppliers_exists);
            $this->assign('suppliers_list_name', $suppliers_list_name);
            unset($suppliers_list_name, $suppliers_exists);
            
            //echo ROOT_PATH.EC_IMAGE_DIR;die;
            /* 如果是安全模式，检查目录是否存在 */
            if (
                    ini_get('safe_mode') == 1 && 
                    (
                        !file_exists(ROOT_PATH.EC_IMAGE_DIR . '/'.date('Ym')) || 
                        !is_dir(ROOT_PATH.EC_IMAGE_DIR. '/'.date('Ym'))
                    )
                ){
                if (@!mkdir(ROOT_PATH.EC_IMAGE_DIR . '/'.date('Ym'), 0777)){
                    $warning = sprintf('サーバは安全モードで動いているから，そして %s ディレクトリ存在しない。まずこのディレクトリを作って後アップしてください。', '../' . IMAGE_DIR . '/'.date('Ym'));
                    $this->assign('warning', $warning);
                }
            }
            /* 如果目录存在但不可写，提示用户 */
            elseif (
                        file_exists(ROOT_PATH.EC_IMAGE_DIR . '/'.date('Ym')) && 
                        file_mode_info(ROOT_PATH.EC_IMAGE_DIR . '/'.date('Ym')) < 2
                    )
            {
                $warning = sprintf('ディレクトリ %s が修正権限なし，このディレクトリを権限を修正してください。', ROOT_PATH.EC_IMAGE_DIR . '/'.date('Ym'));
                $this->assign('warning', $warning);
            }
            /* 取得商品信息 */
            if ($is_add)
            {
                /* 默认值 */
                $last_choose = array(0, 0);
                if (!empty($_COOKIE['ECSCP']['last_choose']))
                {
                    $last_choose = explode('|', $_COOKIE['ECSCP']['last_choose']);
                }
                $goods = array(
                    'goods_id'      => 0,
                    'goods_desc'    => '',
                    'cat_id'        => $last_choose[0],
                    'brand_id'      => $last_choose[1],
                    'is_on_sale'    => '1',
                    'is_alone_sale' => '1',
                    'is_shipping' => '0',
                    'other_cat'     => array(), // 扩展分类
                    'goods_type'    => 0,       // 商品类型
                    'shop_price'    => 0,
                    'promote_price' => 0,
                    'market_price'  => 0,
                    'integral'      => 0,
                    'goods_number'  => C('ec_default_storage'),
                    'warn_number'   => 1,
                    'promote_start_date' => local_date('Y-m-d'),
                    'promote_end_date'   => local_date('Y-m-d', local_strtotime('+1 month')),
                    'goods_weight'  => 0,
                    'give_integral' => -1,
                    'rank_integral' => -1
                );
                if ($code != '')
                {
                    $goods['goods_number'] = 0;
                }
                /* 关联商品 */
                $link_goods_list = array();
                $sql = "DELETE FROM " . $ecs->table('ec_link_goods') .
                        " WHERE (goods_id = 0 OR link_goods_id = 0)" .
                        " AND admin_id = '$_SESSION[uid]'";
                M()->exe($sql);
                
                
                 /* 组合商品 */
                $group_goods_list = array();
                $sql = "DELETE FROM " . $ecs->table('ec_group_goods') .
                        " WHERE parent_id = 0 AND admin_id = '$_SESSION[uid]'";
                M()->exe($sql);
                
                /* 关联文章 */
                $goods_article_list = array();
                $sql = "DELETE FROM " . $ecs->table('ec_goods_article') .
                        " WHERE goods_id = 0 AND admin_id = '$_SESSION[uid]'";
                M()->exe($sql);
        
                /* 属性 */
                $sql = "DELETE FROM " . $ecs->table('ec_goods_attr') . " WHERE goods_id = 0";
                M()->exe($sql);
        
                /* 图片列表 */
                $img_list = array();
            }
            else
            {
                /* 商品信息 */
                $sql = "SELECT * FROM " . $ecs->table('ec_goods') . " WHERE goods_id = '$_REQUEST[goods_id]'";
                $goods = M()->getRowSql($sql);
                
                /* 虚拟卡商品复制时, 将其库存置为0*/
                if ($is_copy && $code != '')
                {
                    $goods['goods_number'] = 0;
                }
                if (empty($goods) === true)
                {
                    /* 默认值 */
                    $goods = array(
                        'goods_id'      => 0,
                        'goods_desc'    => '',
                        'cat_id'        => 0,
                        'is_on_sale'    => '1',
                        'is_alone_sale' => '1',
                        'is_shipping' => '0',
                        'other_cat'     => array(), // 扩展分类
                        'goods_type'    => 0,       // 商品类型
                        'shop_price'    => 0,
                        'promote_price' => 0,
                        'market_price'  => 0,
                        'integral'      => 0,
                        'goods_number'  => 1,
                        'warn_number'   => 1,
                        'promote_start_date' => local_date('Y-m-d'),
                        'promote_end_date'   => local_date('Y-m-d', gmstr2tome('+1 month')),
                        'goods_weight'  => 0,
                        'give_integral' => -1,
                        'rank_integral' => -1
                    );
                }
                
                /* 获取商品类型存在规格的类型 */
                $specifications = get_goods_type_specifications();
                //echo $goods['goods_type'];
                //p($specifications);die;
                if(isset($specifications[$goods['goods_type']])){
                    $goods['specifications_id'] = $specifications[$goods['goods_type']];
                }else{
                    $goods['specifications_id'] = "";
                }
                
                $_attribute = get_goods_specifications_list($goods['goods_id']);
                $goods['_attribute'] = empty($_attribute) ? '' : 1;
                
                /* 根据商品重量的单位重新计算 */
                if ($goods['goods_weight'] > 0)
                {
                    $goods['goods_weight_by_unit'] = ($goods['goods_weight'] >= 1) ? $goods['goods_weight'] : ($goods['goods_weight'] / 0.001);
                }
                if (!empty($goods['goods_brief']))
                {
                    //$goods['goods_brief'] = trim_right($goods['goods_brief']);
                    $goods['goods_brief'] = $goods['goods_brief'];
                }
                if (!empty($goods['keywords']))
                {
                    //$goods['keywords']    = trim_right($goods['keywords']);
                    $goods['keywords']    = $goods['keywords'];
                }
                /* 如果不是促销，处理促销日期 */
                if (isset($goods['is_promote']) && $goods['is_promote'] == '0')
                {
                    unset($goods['promote_start_date']);
                    unset($goods['promote_end_date']);
                }
                else
                {
                    $goods['promote_start_date'] = local_date('Y-m-d', $goods['promote_start_date']);
                    $goods['promote_end_date'] = local_date('Y-m-d', $goods['promote_end_date']);
                }
                /* 如果是复制商品，处理 */
                if ($_REQUEST['act'] == 'copy')
                {
                    // 商品信息
                    $goods['goods_id'] = 0;
                    $goods['goods_sn'] = '';
                    $goods['goods_name'] = '';
                    $goods['goods_img'] = '';
                    $goods['goods_thumb'] = '';
                    $goods['original_img'] = '';
                    // 扩展分类不变
                    
                    // 关联商品
                    $sql = "DELETE FROM " . $ecs->table('ec_link_goods') .
                            " WHERE (goods_id = 0 OR link_goods_id = 0)" .
                            " AND admin_id = '$_SESSION[uid]'";
                    M()->exe($sql);
                    
                    $sql = "SELECT '0' AS goods_id, link_goods_id, is_double, '$_SESSION[uid]' AS admin_id" .
                            " FROM " . $ecs->table('ec_link_goods') .
                            " WHERE goods_id = '$_REQUEST[goods_id]' ";
                    $res = M()->query($sql);
                    
                    if(!empty($res)){
                        foreach($res as $row){
                            M()->autoExecute($ecs->table('ec_link_goods'), $row, 'INSERT');
                        }
                    }
                    
                    $sql = "SELECT goods_id, '0' AS link_goods_id, is_double, '$_SESSION[uid]' AS admin_id" .
                            " FROM " . $ecs->table('ec_link_goods') .
                            " WHERE link_goods_id = '$_REQUEST[goods_id]' ";
                    $res = M()->query($sql);
                    if(!empty($res)){
                        foreach($res as $row){
                            M()->autoExecute($ecs->table('ec_link_goods'), $row, 'INSERT');
                        }
                    }
                    
                    // 配件
                    $sql = "DELETE FROM " . $ecs->table('ec_group_goods') .
                            " WHERE parent_id = 0 AND admin_id = '$_SESSION[uid]'";
                    M()->exe($sql);
                    
                    $sql = "SELECT 0 AS parent_id, goods_id, goods_price, '$_SESSION[uid]' AS admin_id " .
                            "FROM " . $ecs->table('ec_group_goods') .
                            " WHERE parent_id = '$_REQUEST[goods_id]' ";
                    $res = M()->query($sql);
                    if(!empty($res)){
                        foreach($res as $row){
                            M()->autoExecute($ecs->table('ec_group_goods'), $row, 'INSERT');
                        }
                    }
                    
                    // 关联文章
                    $sql = "DELETE FROM " . $ecs->table('ec_goods_article') .
                            " WHERE goods_id = 0 AND admin_id = '$_SESSION[uid]'";
                    M()->exe($sql);
                    
                    $sql = "SELECT 0 AS goods_id, article_id, '$_SESSION[uid]' AS admin_id " .
                                "FROM " . $ecs->table('ec_goods_article') .
                                " WHERE goods_id = '$_REQUEST[goods_id]' ";
                    $res = M()->query($sql);
                    if(!empty($res)){
                        foreach($res as $row){
                            M()->autoExecute($ecs->table('ec_goods_article'), $row, 'INSERT');
                        }
                    }
                    
                    // 图片不变
                
                    // 商品属性
                    $sql = "DELETE FROM " . $ecs->table('ec_goods_attr') . " WHERE goods_id = 0";
                    M()->exe($sql);
                    
                    $sql = "SELECT 0 AS goods_id, attr_id, attr_value, attr_price " .
                            "FROM " . $ecs->table('ec_goods_attr') .
                            " WHERE goods_id = '$_REQUEST[goods_id]' ";
                    $res = M()->query($sql);
                    if(!empty($res)){
                        foreach($res as $row){
                            M()->autoExecute($ecs->table('ec_goods_attr'), addslashes_deep($row), 'INSERT');
                        }
                    }
                    
                }
                // 扩展分类
                $other_cat_list = array();
                $sql = "SELECT cat_id FROM " . $ecs->table('ec_goods_cat') . " WHERE goods_id = '$_REQUEST[goods_id]'";
                $goods['other_cat'] = M()->getCol($sql,'cat_id');
                if(!empty($goods['other_cat'])){
                    foreach ($goods['other_cat'] AS $cat_id)
                    {
                        $other_cat_list[$cat_id] = cat_list(0, $cat_id);
                    }
                }
                $this->assign('other_cat_list', $other_cat_list);
                
                $link_goods_list    = get_linked_goods($goods['goods_id']); // 关联商品
                $group_goods_list   = get_group_goods($goods['goods_id']); // 配件
                $goods_article_list = get_goods_articles($goods['goods_id']);   // 关联文章
                
                /* 商品图片路径 */
                if (
                        isset($GLOBALS['shop_id']) && ($GLOBALS['shop_id'] > 10) && !empty($goods['original_img']))
                {
                    //TODO:多网店的时候，需要重新调用这个方法来设定不同网店的nopicture图片
                    $goods['goods_img'] = get_image_path($_REQUEST['goods_id'], $goods['goods_img']);
                    $goods['goods_thumb'] = get_image_path($_REQUEST['goods_id'], $goods['goods_thumb'], true);
                }
                
                /* 图片列表 */
                $sql = "SELECT * FROM " . $ecs->table('ec_goods_gallery') . " WHERE goods_id = '$goods[goods_id]'";
                $img_list = M()->getAll($sql);
                
                if(!empty($img_list)){
                    /* 格式化相册图片路径 */
                    if (isset($GLOBALS['shop_id']) && ($GLOBALS['shop_id'] > 0)){
                        //TODO:多网店的时候，需要重新调用这个方法来设定不同网店的nopicture图片
                        foreach ($img_list as $key => $gallery_img)
                        {
                            $gallery_img[$key]['img_url'] = get_image_path($gallery_img['goods_id'], $gallery_img['img_original'], false, 'gallery');
                            $gallery_img[$key]['thumb_url'] = get_image_path($gallery_img['goods_id'], $gallery_img['img_original'], true, 'gallery');
                        }
                    }else{
                        
                        foreach ($img_list as $key => $gallery_img)
                        {
                            $gallery_img[$key]['thumb_url'] = ROOT_PATH . (empty($gallery_img['thumb_url']) ? $gallery_img['img_url'] : $gallery_img['thumb_url']);
                        }
                    }
                }
                
            }
            /* 拆分商品名称样式 */
            $goods_name_style = explode('+', empty($goods['goods_name_style']) ? '+' : $goods['goods_name_style']);
            
            /* 创建 html editor */
            $this->create_html_editor('goods_desc', $goods['goods_desc']);

    
            /* 模板赋值 */
            $this->assign('code',    $code);
            $this->assign('ur_here', $is_add ? (empty($code) ? '商品新規' : 'バーチャル商品新規') : ($_REQUEST['act'] == 'edit' ? '商品情報変更' : '品物情報コピー '));
            $this->assign('action_link', $this->list_link($is_add, $code));
            $this->assign('goods', $goods);
            $this->assign('goods_name_color', $goods_name_style[0]);
            $this->assign('goods_name_style', $goods_name_style[1]);
            $this->assign('cat_list', cat_list(0, $goods['cat_id']));
            $this->assign('brand_list', get_brand_list());
            $this->assign('unit_list', get_unit_list());
            $this->assign('user_rank_list', get_user_rank_list());
            $this->assign('weight_unit', $is_add ? '1' : ($goods['goods_weight'] >= 1 ? '1' : '0.001'));
            $cfg=C();
            $this->assign('cfg', $cfg);
            $this->assign('form_act', $is_add ? 'insert' : ($_REQUEST['act'] == 'edit' ? 'update' : 'insert'));
            if ($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit')
            {
                $this->assign('is_add', true);
            }
            if(!$is_add)
            {
                $this->assign('member_price_list', get_member_price_list($_REQUEST['goods_id']));
            }
            $this->assign('link_goods_list', $link_goods_list);
            $this->assign('group_goods_list', $group_goods_list);
            $this->assign('goods_article_list', $goods_article_list);
            $this->assign('img_list', $img_list);
            $this->assign('goods_type_list', goods_type_list($goods['goods_type']));
            $this->assign('gd', gd_version());
            $this->assign('thumb_width', C('ec_thumb_width'));
            $this->assign('thumb_height',  C('ec_thumb_height'));
            $this->assign('goods_attr_html', build_attr_html($goods['goods_type'], $goods['goods_id']));
            $volume_price_list = '';
            if(isset($_REQUEST['goods_id']))
            {
                $volume_price_list = get_volume_price_list($_REQUEST['goods_id']);
            }
            if (empty($volume_price_list))
            {
                $volume_price_list = array('0'=>array('number'=>'','price'=>''));
            }
            $this->assign('volume_price_list', $volume_price_list);
            
            $this->display('goods_info.htm');

        }
        /*------------------------------------------------------ */
        //-- 插入商品 更新商品
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'insert' || $_REQUEST['act'] == 'update'){
            $code = empty($_REQUEST['extension_code']) ? '' : trim($_REQUEST['extension_code']);
            /* 是否处理缩略图 */
            $proc_thumb = (isset($GLOBALS['shop_id']) && $GLOBALS['shop_id'] > 0)? false : true;
            
            /* 检查货号是否重复 */
            if ($_POST['goods_sn'])
            {
                $sql = "SELECT COUNT(*) FROM " . $ecs->table('ec_goods') .
                        " WHERE goods_sn = '$_POST[goods_sn]' AND is_delete = 0 AND goods_id <> '$_POST[goods_id]'";
                if (M()->getOne($sql,'COUNT(*)') > 0)
                {
                    $this->sys_msg('入力した番号が存在しているから，変えてください', 1, array(), false);
                }
            }
            //p($_FILES);
            /* 检查图片：如果有错误，检查尺寸是否超过最大值；否则，检查文件类型 */
            if (isset($_FILES['goods_img']['error'])) // php 4.2 版本才支持 error
            {
                // 最大上传文件大小
                $php_maxsize = ini_get('upload_max_filesize');
                $htm_maxsize = '2M';
                // 商品图片
                if ($_FILES['goods_img']['error'] == 0){
                    if (!$image->check_img_type($_FILES['goods_img']['type']))
                    {
                        $this->sys_msg('商品画像のタイプは正しくない！', 1, array(), false);
                    }
                }
                elseif ($_FILES['goods_img']['error'] == 1)
                {
                    $this->sys_msg(sprintf('商品画像ファイルサイズが大きい（マックス値：%s），アップできません。', $php_maxsize), 1, array(), false);
                }
                elseif ($_FILES['goods_img']['error'] == 2)
                {
                    $this->sys_msg(sprintf('商品画像ファイルサイズが大きい（マックス値：%s），アップできません。', $htm_maxsize), 1, array(), false);
                }
                
                // 商品缩略图
                if (isset($_FILES['goods_thumb']))
                {
                    if ($_FILES['goods_thumb']['error'] == 0)
                    {
                        if (!$image->check_img_type($_FILES['goods_thumb']['type']))
                        {
                            $this->sys_msg('商品サムネイルのタイプは正しくない！', 1, array(), false);
                        }
                    }
                    elseif ($_FILES['goods_thumb']['error'] == 1)
                    {
                        $this->sys_msg(sprintf('商品画像ファイルサイズが大きい（マックス値：%s），アップできません。', $php_maxsize), 1, array(), false);
                    }
                    elseif ($_FILES['goods_thumb']['error'] == 2)
                    {
                        $this->sys_msg(sprintf('商品画像ファイルサイズが大きい（マックス値：%s），アップできません。', $htm_maxsize), 1, array(), false);
                    }
                }
                
                // 相册图片
                foreach ($_FILES['img_url']['error'] AS $key => $value)
                {
                    if ($value == 0)
                    {
                        if (!$image->check_img_type($_FILES['img_url']['type'][$key]))
                        {
                            $this->sys_msg(sprintf('商品アルバム中の%s番の画像タイプ图片格式は正しくない!', $key + 1), 1, array(), false);
                        }
                    }
                    elseif ($value == 1)
                    {
                        $this->sys_msg(sprintf('商品アルバム中の%s番の画像サイズが大きい（マックス値值：%s），アップできません。', $key + 1, $php_maxsize), 1, array(), false);
                    }
                    elseif ($_FILES['img_url']['error'] == 2)
                    {
                        $this->sys_msg(sprintf('商品アルバム中の%s番の画像サイズが大きい（マックス値值：%s），アップできません。', $key + 1, $htm_maxsize), 1, array(), false);
                    }
                }
            }
            /* 4.1版本 */
            else
            {
                // 商品图片
                if ($_FILES['goods_img']['tmp_name'] != 'none')
                {
                    if (!$image->check_img_type($_FILES['goods_img']['type']))
                    {
        
                        $this->sys_msg('商品画像のタイプは正しくない！', 1, array(), false);
                    }
                }
                // 商品缩略图
                if (isset($_FILES['goods_thumb']))
                {
                    if ($_FILES['goods_thumb']['tmp_name'] != 'none')
                    {
                        if (!$image->check_img_type($_FILES['goods_thumb']['type']))
                        {
                            $image->sys_msg('商品サムネイルのタイプは正しくない！', 1, array(), false);
                        }
                    }
                }
                
                // 相册图片
                foreach ($_FILES['img_url']['tmp_name'] AS $key => $value)
                {
                    if ($value != 'none')
                    {
                        if (!$image->check_img_type($_FILES['img_url']['type'][$key]))
                        {
                            sys_msg(sprintf('商品アルバム中の%s番の画像タイプ图片格式は正しくない!', $key + 1), 1, array(), false);
                        }
                    }
                }
            }
            /* 插入还是更新的标识 */
            $is_insert = $_REQUEST['act'] == 'insert';
            
            /* 处理商品图片 */
            $goods_img        = '';  // 初始化商品图片
            $goods_thumb      = '';  // 初始化商品缩略图
            $original_img     = '';  // 初始化原始图片
            $old_original_img = '';  // 初始化原始图片旧图
            
            // 如果上传了商品图片，相应处理
            if (
                    ($_FILES['goods_img']['tmp_name'] != '' && $_FILES['goods_img']['tmp_name'] != 'none') or 
                    (
                        ($_POST['goods_img_url'] != '商品画像外部URL' && $_POST['goods_img_url'] != 'http://') && 
                        $is_url_goods_img = 1
                    )
                )
            {
                if ($_REQUEST['goods_id'] > 0){
                    /* 删除原来的图片文件 */
                    $sql = "SELECT goods_thumb, goods_img, original_img " .
                            " FROM " . $ecs->table('ec_goods') .
                            " WHERE goods_id = '$_REQUEST[goods_id]'";
                    $row = M()->getRowSql($sql);
                    if ($row['goods_thumb'] != '' && is_file(ROOT_PATH . $row['goods_thumb']))
                    {
                        @unlink(ROOT_PATH . $row['goods_thumb']);
                    }
                    if ($row['goods_img'] != '' && is_file(ROOT_PATH . $row['goods_img']))
                    {
                        @unlink(ROOT_PATH . $row['goods_img']);
                    }
                    if ($row['original_img'] != '' && is_file(ROOT_PATH . $row['original_img']))
                    {
                        /* 先不处理，以防止程序中途出错停止 */
                        //$old_original_img = $row['original_img']; //记录旧图路径
                    }
                    /* 清除原来商品图片 */
                    if ($proc_thumb === false)
                    {
                        get_image_path($_REQUEST[goods_id], $row['goods_img'], false, 'goods', true);
                        get_image_path($_REQUEST[goods_id], $row['goods_thumb'], true, 'goods', true);
                    }
                }
                if (empty($is_url_goods_img))
                {
                    $original_img   = $image->upload_image($_FILES['goods_img']); // 原始图片
                }
                elseif ($_POST['goods_img_url'])
                {
                    
                    if(
                        preg_match('/(.jpg|.png|.gif|.jpeg)$/',$_POST['goods_img_url']) && 
                        copy(trim($_POST['goods_img_url']), ROOT_PATH . 'temp/' . basename($_POST['goods_img_url'])))
                    {
                          $original_img = 'temp/' . basename($_POST['goods_img_url']);
                    }
                    
                }
                if ($original_img === false)
                {
                    $this ->sys_msg($image->error_msg(), 1, array(), false);
                }
                $goods_img      = $original_img;   // 商品图片
                
                /* 复制一份相册图片 */
                /* 添加判断是否自动生成相册图片 */
                $ec_auto_generate_gallery=C('ec_auto_generate_gallery');
                if($ec_auto_generate_gallery){
                    $img        = $original_img;   // 相册图片
                    $pos        = strpos(basename($img), '.');
                    $newname    = dirname($img) . '/' . $image->random_filename() . substr(basename($img), $pos);
                    //echo $img;die;
                    if (!copy(ROOT_PATH. $img, ROOT_PATH . $newname))
                    {
                        $this ->sys_msg('fail to copy file: ' . realpath(ROOT_PATH . $img), 1, array(), false);
                    }
                    $img        = $newname;

                    $gallery_img    = $img;
                    $gallery_thumb  = $img;
                }
                
                // 如果系统支持GD，缩放商品图片，且给商品图片和相册图片加水印
                if (
                        $proc_thumb && 
                        $image->gd_version() > 0 && 
                        $image->check_img_function($_FILES['goods_img']['type']) || $is_url_goods_img)
                {
                    if (empty($is_url_goods_img))
                    {
                        // 如果设置大小不为0，缩放图片
                        if (C('ec_image_width') != 0 || C('ec_image_height') != 0)
                        {
                            $goods_img = $image->make_thumb(ROOT_PATH. $goods_img , C('ec_image_width'), C('ec_image_height'));
                            if ($goods_img === false)
                            {
                                $this ->sys_msg($image->error_msg(), 1, array(), false);
                            }
                        }
                        /* 添加判断是否自动生成相册图片 */
                        if (C('ec_auto_generate_gallery'))
                        {
                            $newname    = dirname($img) . '/' . $image->random_filename() . substr(basename($img), $pos);
                            if (!copy(ROOT_PATH . $img, ROOT_PATH . $newname))
                            {
                                $this -> sys_msg('fail to copy file: ' . realpath(ROOT_PATH . $img), 1, array(), false);
                            }
                            $gallery_img        = $newname;
                        }
                        if(intval(C('ec_watermark_place')) > 0 && C('ec_watermark')!='' )
                        {
                            if ($image->add_watermark(ROOT_PATH.$goods_img,'',ROOT_PATH.C('ec_watermark'), C('ec_watermark_place'),C('ec_watermark_alpha') ) === false)
                            {
                                $this ->sys_msg($image->error_msg(), 1, array(), false);
                            }
                            /* 添加判断是否自动生成相册图片 */
                            if (C('ec_auto_generate_gallery'))
                            {
                                if ($image->add_watermark(ROOT_PATH. $gallery_img,'',ROOT_PATH.C('ec_watermark'), C('ec_watermark_place'), C('ec_watermark_alpha')) === false)
                                {
                                    $this ->sys_msg($image->error_msg(), 1, array(), false);
                                }
                            }
                        }
                    }
                    // 相册缩略图
                    /* 添加判断是否自动生成相册图片 */
                    if (C('ec_auto_generate_gallery'))
                    {
                        if (C('ec_image_width') != 0 || C('ec_image_height') != 0)
                        {
                            $gallery_thumb = $image->make_thumb(ROOT_PATH. $img, C('ec_image_width'),  C('ec_image_height'));
                            if ($gallery_thumb === false)
                            {
                                $this ->sys_msg($image->error_msg(), 1, array(), false);
                            }
                        }
                    }
                }
            }
            // 是否上传商品缩略图
            if (isset($_FILES['goods_thumb']) && $_FILES['goods_thumb']['tmp_name'] != '' &&
                isset($_FILES['goods_thumb']['tmp_name']) &&$_FILES['goods_thumb']['tmp_name'] != 'none')
            {
                     // 上传了，直接使用，原始大小
                    $goods_thumb = $image->upload_image($_FILES['goods_thumb']);
                    if ($goods_thumb === false)
                    {
                        $this ->sys_msg($image->error_msg(), 1, array(), false);
                    }
            }
            else
            {
                // 未上传，如果自动选择生成，且上传了商品图片，生成所略图
                if ($proc_thumb && isset($_POST['auto_thumb']) && !empty($original_img))
                {
                    // 如果设置缩略图大小不为0，生成缩略图
                    if (C('ec_image_width') != 0 || C('ec_image_height')  != 0)
                    {
                        $goods_thumb = $image->make_thumb(ROOT_PATH. $original_img,C('ec_image_width'), C('ec_image_height'));
                        if ($goods_thumb === false)
                        {
                            $this ->sys_msg($image->error_msg(), 1, array(), false);
                        }
                    }
                    else
                    {
                        $goods_thumb = $original_img;
                    }
                }
            }
            
            /* 删除下载的外链原图 */
            if (!empty($is_url_goods_img))
            {
                unlink(ROOT_PATH . $original_img);
                empty($newname) || unlink(ROOT_PATH . $newname);
                $url_goods_img = $goods_img = $original_img = htmlspecialchars(trim($_POST['goods_img_url']));
            }
            /* 如果没有输入商品货号则自动生成一个商品货号 */
            if (empty($_POST['goods_sn']))
            {
                $max_id     = $is_insert ? M()->getOne("SELECT MAX(goods_id) + 1 AS cnt FROM ".$ecs->table('ec_goods'),'cnt') : $_REQUEST['goods_id'];
               // echo $max_id;die;
                $goods_sn   = generate_goods_sn($max_id);
            }
            else
            {
                $goods_sn   = $_POST['goods_sn'];
            }
            
            /* 处理商品数据 */
            $shop_price = !empty($_POST['shop_price']) ? $_POST['shop_price'] : 0;
            $market_price = !empty($_POST['market_price']) ? $_POST['market_price'] : 0;
            $promote_price = !empty($_POST['promote_price']) ? floatval($_POST['promote_price'] ) : 0;
            $is_promote = empty($promote_price) ? 0 : 1;
            $promote_start_date = ($is_promote && !empty($_POST['promote_start_date'])) ? local_strtotime($_POST['promote_start_date']) : 0;
            $promote_end_date = ($is_promote && !empty($_POST['promote_end_date'])) ? local_strtotime($_POST['promote_end_date']) : 0;
            $goods_weight = !empty($_POST['goods_weight']) ? $_POST['goods_weight'] * $_POST['weight_unit'] : 0;
            $is_best = isset($_POST['is_best']) ? 1 : 0;
            $is_new = isset($_POST['is_new']) ? 1 : 0;
            $is_hot = isset($_POST['is_hot']) ? 1 : 0;
            $is_on_sale = isset($_POST['is_on_sale']) ? 1 : 0;
            $is_alone_sale = isset($_POST['is_alone_sale']) ? 1 : 0;
            $is_shipping = isset($_POST['is_shipping']) ? 1 : 0;
            $goods_number = isset($_POST['goods_number']) ? $_POST['goods_number'] : 0;
            $warn_number = isset($_POST['warn_number']) ? $_POST['warn_number'] : 0;
            $goods_type = isset($_POST['goods_type']) ? $_POST['goods_type'] : 0;
            $give_integral = isset($_POST['give_integral']) ? intval($_POST['give_integral']) : '-1';
            $rank_integral = isset($_POST['rank_integral']) ? intval($_POST['rank_integral']) : '-1';
            $suppliers_id = isset($_POST['suppliers_id']) ? intval($_POST['suppliers_id']) : '0';
            $goods_desc= isset($_POST['goods_desc']) ? $_POST['goods_desc'] : '';
            
            $goods_name_style = $_POST['goods_name_color'] . '+' . $_POST['goods_name_style'];

            $catgory_id = empty($_POST['cat_id']) ? '' : intval($_POST['cat_id']);
            $brand_id = empty($_POST['brand_id']) ? '' : intval($_POST['brand_id']);
        
        
            $goods_thumb = (empty($goods_thumb) && !empty($_POST['goods_thumb_url']) && $this->goods_parse_url($_POST['goods_thumb_url'])) ? htmlspecialchars(trim($_POST['goods_thumb_url'])) : $goods_thumb;
            $goods_thumb = (empty($goods_thumb) && isset($_POST['auto_thumb']))? $goods_img : $goods_thumb;
            
            /* 入库 */
            if ($is_insert)
            {
                if ($code == '')
                {
                    $sql = "INSERT INTO " . $ecs->table('ec_goods') . " (goods_name, goods_name_style, goods_sn, " .
                            "cat_id, brand_id, shop_price, market_price, is_promote, promote_price, " .
                            "promote_start_date, promote_end_date, goods_img, goods_thumb, original_img, keywords, goods_brief, " .
                            "seller_note, goods_weight, goods_number, warn_number, integral, give_integral, is_best, is_new, is_hot, " .
                            "is_on_sale, is_alone_sale, is_shipping, goods_desc, add_time, last_update, goods_type, rank_integral, suppliers_id)" .
                        "VALUES ('$_POST[goods_name]', '$goods_name_style', '$goods_sn', '$catgory_id', " .
                            "'$brand_id', '$shop_price', '$market_price', '$is_promote','$promote_price', ".
                            "'$promote_start_date', '$promote_end_date', '$goods_img', '$goods_thumb', '$original_img', ".
                            "'$_POST[keywords]', '$_POST[goods_brief]', '$_POST[seller_note]', '$goods_weight', '$goods_number',".
                            " '$warn_number', '$_POST[integral]', '$give_integral', '$is_best', '$is_new', '$is_hot', '$is_on_sale', '$is_alone_sale', $is_shipping, ".
                            " '$goods_desc', '" . gmtime() . "', '". gmtime() ."', '$goods_type', '$rank_integral', '$suppliers_id')";
                }
                else
                {
                    $sql = "INSERT INTO " . $ecs->table('ec_goods') . " (goods_name, goods_name_style, goods_sn, " .
                            "cat_id, brand_id, shop_price, market_price, is_promote, promote_price, " .
                            "promote_start_date, promote_end_date, goods_img, goods_thumb, original_img, keywords, goods_brief, " .
                            "seller_note, goods_weight, goods_number, warn_number, integral, give_integral, is_best, is_new, is_hot, is_real, " .
                            "is_on_sale, is_alone_sale, is_shipping, goods_desc, add_time, last_update, goods_type, extension_code, rank_integral)" .
                        "VALUES ('$_POST[goods_name]', '$goods_name_style', '$goods_sn', '$catgory_id', " .
                            "'$brand_id', '$shop_price', '$market_price', '$is_promote','$promote_price', ".
                            "'$promote_start_date', '$promote_end_date', '$goods_img', '$goods_thumb', '$original_img', ".
                            "'$_POST[keywords]', '$_POST[goods_brief]', '$_POST[seller_note]', '$goods_weight', '$goods_number',".
                            " '$warn_number', '$_POST[integral]', '$give_integral', '$is_best', '$is_new', '$is_hot', 0, '$is_on_sale', '$is_alone_sale', $is_shipping, ".
                            " '$goods_desc', '" . gmtime() . "', '". gmtime() ."', '$goods_type', '$code', '$rank_integral')";
                }
            }
            else
            {
                /* 如果有上传图片，删除原来的商品图 */
                $sql = "SELECT goods_thumb, goods_img, original_img " .
                            " FROM " . $ecs->table('ec_goods') .
                            " WHERE goods_id = '$_REQUEST[goods_id]'";
                $row = M()->getRowSql($sql);
                
                if ($proc_thumb && $goods_img && $row['goods_img'] && !$this->goods_parse_url($row['goods_img']))
                {
                    @unlink(ROOT_PATH . $row['goods_img']);
                    @unlink(ROOT_PATH . $row['original_img']);
                }
                if ($proc_thumb && $goods_thumb && $row['goods_thumb'] && !$this->goods_parse_url($row['goods_thumb']))
                {
                    @unlink(ROOT_PATH . $row['goods_thumb']);
                }
                $sql = "UPDATE " . $ecs->table('ec_goods') . " SET " .
                        "goods_name = '$_POST[goods_name]', " .
                        "goods_name_style = '$goods_name_style', " .
                        "goods_sn = '$goods_sn', " .
                        "cat_id = '$catgory_id', " .
                        "brand_id = '$brand_id', " .
                        "shop_price = '$shop_price', " .
                        "market_price = '$market_price', " .
                        "is_promote = '$is_promote', " .
                        "promote_price = '$promote_price', " .
                        "promote_start_date = '$promote_start_date', " .
                        "suppliers_id = '$suppliers_id', " .
                        "promote_end_date = '$promote_end_date', ";
                /* 如果有上传图片，需要更新数据库 */
                if ($goods_img)
                {
                    $sql .= "goods_img = '$goods_img', original_img = '$original_img', ";
                }
                if ($goods_thumb)
                {
                    $sql .= "goods_thumb = '$goods_thumb', ";
                }
                if ($code != '')
                {
                    $sql .= "is_real=0, extension_code='$code', ";
                }
                $sql .= "keywords = '$_POST[keywords]', " .
                        "goods_brief = '$_POST[goods_brief]', " .
                        "seller_note = '$_POST[seller_note]', " .
                        "goods_weight = '$goods_weight'," .
                        "goods_number = '$goods_number', " .
                        "warn_number = '$warn_number', " .
                        "integral = '$_POST[integral]', " .
                        "give_integral = '$give_integral', " .
                        "rank_integral = '$rank_integral', " .
                        "is_best = '$is_best', " .
                        "is_new = '$is_new', " .
                        "is_hot = '$is_hot', " .
                        "is_on_sale = '$is_on_sale', " .
                        "is_alone_sale = '$is_alone_sale', " .
                        "is_shipping = '$is_shipping', " .
                        "goods_desc = '$goods_desc', " .
                        "last_update = '". gmtime() ."', ".
                        "goods_type = '$goods_type' " .
                        "WHERE goods_id = '$_REQUEST[goods_id]' LIMIT 1";

            }
            $insert_id=M()->exe($sql);
            /* 商品编号 */
            $goods_id = $is_insert ? $insert_id : $_REQUEST['goods_id'];
            /* 记录日志 */
            if ($is_insert)
            {
                admin_log($_POST['goods_name'], '新規', '商品');
            }
            else
            {
                admin_log($_POST['goods_name'],'変更', '商品');
            }
            
            /* 处理属性 */
            if (
                    (isset($_POST['attr_id_list']) && isset($_POST['attr_value_list'])) || 
                    (empty($_POST['attr_id_list']) && empty($_POST['attr_value_list']))
                )
            {
                // 取得原有的属性值
                $goods_attr_list = array();
                $keywords_arr = explode(" ", $_POST['keywords']);
                //array_flip() 函数返回一个反转后的数组，如果同一值出现了多次，则最后一个键名将作为它的值，所有其他的键名都将丢失。
                //如果原数组中的值的数据类型不是字符串或整数，函数将报错。
                //$a=array(0=>"Dog",1=>"Cat",2=>"Horse");print_r(array_flip($a));
                //Array ( [Dog] => 0 [Cat] => 1 [Horse] => 2 )
                $keywords_arr = array_flip($keywords_arr);
                if (isset($keywords_arr['']))
                {
                    unset($keywords_arr['']);
                }
                $sql = "SELECT attr_id, attr_index FROM " . $ecs->table('ec_attribute') . " WHERE cat_id = '$goods_type'";
                $attr_res = M()->query($sql);
                $attr_list = array();
                if(!empty($attr_res)){
                    foreach($attr_res as $attr_res_key => $attr_res_value){
                        $attr_list[$attr_res_value['attr_id']] = $attr_res_value['attr_index'];
                    }
                }
                $sql = "SELECT g.*, a.attr_type
                        FROM " .$ecs->table('ec_goods_attr') . " AS g
                            LEFT JOIN " . $ecs->table('ec_attribute') . " AS a
                                ON a.attr_id = g.attr_id
                        WHERE g.goods_id = '$goods_id'";
                $res = M()->query($sql);
                if(!empty($res)){
                    foreach($res as $res_key => $res_value){
                         $goods_attr_list[$res_value['attr_id']][$res_value['attr_value']] = array('sign' => 'delete', 'goods_attr_id' => $res_value['goods_attr_id']);
                    }
                }
                // 循环现有的，根据原有的做相应处理
                if(isset($_POST['attr_id_list'])){
                    foreach ($_POST['attr_id_list'] AS $key => $attr_id)
                    {
                        $attr_value = $_POST['attr_value_list'][$key];
                        $attr_price = $_POST['attr_price_list'][$key];
                        if (!empty($attr_value))
                        {
                            if (isset($goods_attr_list[$attr_id][$attr_value]))
                            {
                                // 如果原来有，标记为更新
                                $goods_attr_list[$attr_id][$attr_value]['sign'] = 'update';
                                $goods_attr_list[$attr_id][$attr_value]['attr_price'] = $attr_price;
                            }
                            else
                            {
                                // 如果原来没有，标记为新增
                                $goods_attr_list[$attr_id][$attr_value]['sign'] = 'insert';
                                $goods_attr_list[$attr_id][$attr_value]['attr_price'] = $attr_price;
                            }
                            $val_arr = explode(' ', $attr_value);
                            foreach ($val_arr AS $k => $v)
                            {
                                if (!isset($keywords_arr[$v]) && $attr_list[$attr_id] == "1")
                                {
                                    $keywords_arr[$v] = $v;
                                }
                            }
                        }
                    }
                }
                $keywords = join(' ', array_flip($keywords_arr));  
                $sql = "UPDATE " .$ecs->table('ec_goods'). " SET keywords = '$keywords' WHERE goods_id = '$goods_id' LIMIT 1";
                M()->exe($sql);
                /* 插入、更新、删除数据 */
                foreach ($goods_attr_list as $attr_id => $attr_value_list)
                {
                    foreach ($attr_value_list as $attr_value => $info)
                    {
                        if ($info['sign'] == 'insert')
                        {
                            $sql = "INSERT INTO " .$ecs->table('ec_goods_attr'). " (attr_id, goods_id, attr_value, attr_price)".
                                        "VALUES ('$attr_id', '$goods_id', '$attr_value', '$info[attr_price]')";
                        }
                        elseif ($info['sign'] == 'update')
                        {
                            $sql = "UPDATE " .$ecs->table('ec_goods_attr'). " SET attr_price = '$info[attr_price]' WHERE goods_attr_id = '$info[goods_attr_id]' LIMIT 1";
                        }
                        else
                        {
                            $sql = "DELETE FROM " .$ecs->table('ec_goods_attr'). " WHERE goods_attr_id = '$info[goods_attr_id]' LIMIT 1";
                        }
                        M()->exe($sql);
                    }
                }
            }
            
            /* 处理会员价格 */
            if (isset($_POST['user_rank']) && isset($_POST['user_price']))
            {
                handle_member_price($goods_id, $_POST['user_rank'], $_POST['user_price']);
            }
            
            /* 处理优惠价格 */
            if (isset($_POST['volume_number']) && isset($_POST['volume_price']))
            {
                $temp_num = array_count_values($_POST['volume_number']);
                foreach($temp_num as $v)
                {
                    if ($v > 1)
                    {
                        $this->sys_msg('优遇数が重複！', 1, array(), false);
                        break;
                    }
                }
                $this->handle_volume_price($goods_id, $_POST['volume_number'], $_POST['volume_price']);
            }
            
            
            /* 处理扩展分类 */
            if (isset($_POST['other_cat']))
            {
                handle_other_cat($goods_id, array_unique($_POST['other_cat']));
            }
            
            if ($is_insert)
            {
                /* 处理关联商品 */
                handle_link_goods($goods_id);
        
                /* 处理组合商品 */
                handle_group_goods($goods_id);
        
                /* 处理关联文章 */
                handle_goods_article($goods_id);
            }
                    
            /* 重新格式化图片名称 */
            $original_img = reformat_image_name('goods', $goods_id, $original_img, 'source');
            $goods_img = reformat_image_name('goods', $goods_id, $goods_img, 'goods');
            $goods_thumb = reformat_image_name('goods_thumb', $goods_id, $goods_thumb, 'thumb');
    
            if ($goods_img !== false)
            {
                M()->exe("UPDATE " . $ecs->table('ec_goods') . " SET goods_img = '$goods_img' WHERE goods_id='$goods_id'");
            }
        
            if ($original_img !== false)
            {
                M()->exe("UPDATE " . $ecs->table('ec_goods') . " SET original_img = '$original_img' WHERE goods_id='$goods_id'");
            }
        
            if ($goods_thumb !== false)
            {
                M()->exe("UPDATE " . $ecs->table('ec_goods') . " SET goods_thumb = '$goods_thumb' WHERE goods_id='$goods_id'");
            }
            
            /* 如果有图片，把商品图片加入图片相册 */
            if (isset($img))
            {
                /* 重新格式化图片名称 */
                if (empty($is_url_goods_img))
                {
                    $img = reformat_image_name('gallery', $goods_id, $img, 'source');
                    $gallery_img = reformat_image_name('gallery', $goods_id, $gallery_img, 'goods');
                }
                else
                {
                    $img = $url_goods_img;
                    $gallery_img = $url_goods_img;
                }
        
                $gallery_thumb = reformat_image_name('gallery_thumb', $goods_id, $gallery_thumb, 'thumb');
                $sql = "INSERT INTO " . $ecs->table('ec_goods_gallery') . " (goods_id, img_url, img_desc, thumb_url, img_original) " .
                        "VALUES ('$goods_id', '$gallery_img', '', '$gallery_thumb', '$img')";
                M()->exe($sql);
            }
            
            /* 处理相册图片 */
            handle_gallery_image($goods_id, $_FILES['img_url'], $_POST['img_desc'], $_POST['img_file']);
            
            /* 编辑时处理相册图片描述 */
            if (!$is_insert && isset($_POST['old_img_desc']))
            {
                foreach ($_POST['old_img_desc'] AS $img_id => $img_desc)
                {
                    $sql = "UPDATE " . $ecs->table('ec_goods_gallery') . " SET img_desc = '$img_desc' WHERE img_id = '$img_id' LIMIT 1";
                    M()->exe($sql);
                }
            }
            
            /* 不保留商品原图的时候删除原图 */
            if ($proc_thumb && !C('ec_retain_original_img') && !empty($original_img))
            {
                M()->exe("UPDATE " . $ecs->table('ec_goods') . " SET original_img='' WHERE `goods_id`='{$goods_id}'");
                M()->exe("UPDATE " . $ecs->table('ec_goods_gallery') . " SET img_original='' WHERE `goods_id`='{$goods_id}'");
                @unlink(ROOT_PATH . $original_img);
                @unlink(ROOT_PATH . $img);
            }
            /* 记录上一次选择的分类和品牌 */
            setcookie('ECSCP[last_choose]', $catgory_id . '|' . $brand_id, gmtime() + 86400);
            /* 清空缓存 */
            clear_cache_files();
            
            /* 提示页面 */
            $link = array();
            if (check_goods_specifications_exist($goods_id))
            {
                $link[0] = array('href' => 'goods.php?act=product_list&goods_id=' . $goods_id, 'text' => '品物');
            }
            if ($code == 'virtual_card')
            {
                $link[1] = array('href' => 'virtual_card.php?act=replenish&goods_id=' . $goods_id, 'text' => 'バーチャルカードのパースワードを追加');
            }
            if ($is_insert)
            {
                $link[2] = $this-> add_link($code);
            }
            $link[3] = $this->list_link($is_insert, $code);
            
            for($i=0;$i<count($link);$i++)
            {
               $key_array[]=$i;
            }
            krsort($link);
            $link = array_combine($key_array, $link);
            $this->sys_msg($is_insert ? '商品新規成功' :  '商品変更成功', 0, $link);
        }
        /*------------------------------------------------------ */
        //-- 批量操作
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'batch')
        {
            $code = empty($_REQUEST['extension_code'])? '' : trim($_REQUEST['extension_code']);
             /* 取得要操作的商品编号 */
            $goods_id = !empty($_POST['checkboxes']) ? join(',', $_POST['checkboxes']) : 0;
            if (isset($_POST['type']))
            {
                /* 放入回收站 */
                if ($_POST['type'] == 'trash')
                {
                    /* 检查权限 */
                    update_goods($goods_id, 'is_delete', '1');
        
                    /* 记录日志 */
                    admin_log('', 'バッチ回収','商品');
                }
                /* 上架 */
                elseif ($_POST['type'] == 'on_sale')
                {
                    /* 检查权限 */
                    update_goods($goods_id, 'is_on_sale', '1');
                }
                /* 下架 */
                elseif ($_POST['type'] == 'not_on_sale')
                {
                    /* 检查权限 */
                    update_goods($goods_id, 'is_on_sale', '0');
                }
                /* 设为精品 */
                elseif ($_POST['type'] == 'best')
                {
                    /* 检查权限 */
                    update_goods($goods_id, 'is_best', '1');
                }
                /* 取消精品 */
                elseif ($_POST['type'] == 'not_best')
                {
                    /* 检查权限 */
                    update_goods($goods_id, 'is_best', '0');
                }
                /* 设为新品 */
                elseif ($_POST['type'] == 'new')
                {
                    /* 检查权限 */
                    update_goods($goods_id, 'is_new', '1');
                }
        
                /* 取消新品 */
                elseif ($_POST['type'] == 'not_new')
                {
                    /* 检查权限 */
                    update_goods($goods_id, 'is_new', '0');
                }
        
                /* 设为热销 */
                elseif ($_POST['type'] == 'hot')
                {
                    /* 检查权限 */
                    update_goods($goods_id, 'is_hot', '1');
                }
        
                /* 取消热销 */
                elseif ($_POST['type'] == 'not_hot')
                {
                    /* 检查权限 */
                    update_goods($goods_id, 'is_hot', '0');
                }
                /* 转移到分类 */
                elseif ($_POST['type'] == 'move_to')
                {
                    /* 检查权限 */
                    update_goods($goods_id, 'cat_id', $_POST['target_cat']);
                }
                /* 转移到供货商 */
                elseif ($_POST['type'] == 'suppliers_move_to')
                {
                    /* 检查权限 */
                    update_goods($goods_id, 'suppliers_id', $_POST['suppliers_id']);
                }
                /* 还原 */
                elseif ($_POST['type'] == 'restore')
                {
                    /* 检查权限 */
        
                    update_goods($goods_id, 'is_delete', '0');
        
                    /* 记录日志 */
                    admin_log('','バッチ戻す', '商品');
                }
                /* 删除 */
                elseif ($_POST['type'] == 'drop')
                {
                    /* 检查权限 */
        
                    delete_goods($goods_id);
        
                    /* 记录日志 */
                    admin_log('','バッチ削除', '商品');
                }
            }
            /* 清除缓存 */
            clear_cache_files();
            if ($_POST['type'] == 'drop' || $_POST['type'] == 'restore')
            {
                $link[] = array('href' => U('index',array('act'=>'trash')), 'text' => '商品回収所');
            }
            else
            {
                $link[] = $this-> list_link(true, $code);
            }
            $this->sys_msg('バッチ操作成功', 0, $link);
    
        }
        /*------------------------------------------------------ */
        //-- 显示图片
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'show_image'){
            if (isset($GLOBALS['shop_id']) && $GLOBALS['shop_id'] > 0)
            {
                $img_url = $_GET['img_url'];
            }
            else
            {
                if (strpos($_GET['img_url'], 'http://') === 0)
                {
                    $img_url = $_GET['img_url'];
                }
                else
                {
                    $img_url = ROOT_URL .'/'. $_GET['img_url'];
                }
            }
            $this->assign('img_url', $img_url);
            $this->display('goods_show_image.htm');
        }
        /*------------------------------------------------------ */
        //-- 修改商品名称
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_goods_name')
        {
            $goods_id   = intval($_POST['id']);
            $goods_name = json_str_iconv(trim($_POST['val']));
        
            if ($exc->edit("goods_name = '$goods_name', last_update=" .gmtime(), $goods_id))
            {
                clear_cache_files();
                make_json_result(stripslashes($goods_name));
            }
        }
        
        /*------------------------------------------------------ */
        //-- 修改商品货号
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_goods_sn')
        {
            $goods_id = intval($_POST['id']);
            $goods_sn = json_str_iconv(trim($_POST['val']));
        
            /* 检查是否重复 */
            if (!$exc->is_only('goods_sn', $goods_sn, $goods_id))
            {
                make_json_error('入力した番号が存在しているから，変えてください');
            }
            $sql="SELECT goods_id FROM ". $ecs->table('ec_products')."WHERE product_sn='$goods_sn'";
            if(M()->getOne($sql,'goods_id'))
            {
                make_json_error('入力した番号が存在しているから，変えてください');
            }
            if ($exc->edit("goods_sn = '$goods_sn', last_update=" .gmtime(), $goods_id))
            {
                clear_cache_files();
                make_json_result(stripslashes($goods_sn));
            }
        }
        elseif ($_REQUEST['act'] == 'check_goods_sn')
        {
            $goods_id = intval($_REQUEST['goods_id']);
            $goods_sn = htmlspecialchars(json_str_iconv(trim($_REQUEST['goods_sn'])));
            /* 检查是否重复 */
            if (!$exc->is_only('goods_sn', $goods_sn, $goods_id))
            {
                make_json_error('入力した番号が存在しているから，変えてください');
            }
            if(!empty($goods_sn))
            {
                $sql="SELECT goods_id FROM ". $ecs->table('ec_products')."WHERE product_sn='$goods_sn'";
                if(M()->getOne($sql,'goods_id'))
                {
                    make_json_error('入力した番号が存在しているから，変えてください');
                }
            }
            make_json_result('');
        }
        elseif ($_REQUEST['act'] == 'check_products_goods_sn')
        {
            //$goods_id = intval($_REQUEST['goods_id']);
            $goods_sn = json_str_iconv(trim($_REQUEST['goods_sn']));
            $products_sn=explode('||',$goods_sn);
            $int_arry=array();
            if(!is_array($products_sn))
            {
                make_json_result('');
            }
            else
            {
                foreach ($products_sn as $val)
                {
                    if(empty($val))
                    {
                        continue;
                    }
                    if(is_array($int_arry))
                    {
                        if(in_array($val,$int_arry))
                        {
                             make_json_error($val.'入力した番号が存在しているから，変えてください');
                        }
                    }
                    $int_arry[]=$val;
                    if (!$exc->is_only('goods_sn', $val, '0'))
                    {
                        make_json_error($val.'入力した番号が存在しているから，変えてください');
                    }
                    $sql="SELECT goods_id FROM ". $ecs->table('ec_products')."WHERE product_sn='$val'";
                    if(M()->getOne($sql,'goods_id'))
                    {
                        make_json_error($val.'入力した番号が存在しているから，変えてください');
                    }
                }
            }
            /* 检查是否重复 */
            make_json_result('');
        }
        /*------------------------------------------------------ */
        //-- 修改商品价格
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_goods_price')
        {
        
            $goods_id       = intval($_POST['id']);
            $goods_price    = floatval($_POST['val']);
            $market_price_rate=C('ec_market_price_rate');
            $price_rate     = floatval($market_price_rate * $goods_price);
        
            if ($goods_price < 0 || $goods_price == 0 && $_POST['val'] != "$goods_price")
            {
                make_json_error('間違う値段を入力している。');
            }
            else
            {
                if ($exc->edit("shop_price = '$goods_price', market_price = '$price_rate', last_update=" .gmtime(), $goods_id))
                {
                    clear_cache_files();
                    make_json_result(number_format($goods_price, 2, '.', ''));
                }
            }
        }
        /*------------------------------------------------------ */
    //-- 修改商品库存数量
    /*------------------------------------------------------ */
    elseif ($_REQUEST['act'] == 'edit_goods_number')
    {
    
        $goods_id   = intval($_POST['id']);
        $goods_num  = intval($_POST['val']);
    
        if($goods_num < 0 || $goods_num == 0 && $_POST['val'] != "$goods_num")
        {
            make_json_error('商品在庫数エラー');
        }
    
        if(check_goods_product_exist($goods_id) == 1)
        {
            make_json_error('システムエラー' . 'この商品が品物が存在している，商品の在庫修正できません');
        }
    
        if ($exc->edit("goods_number = '$goods_num', last_update=" .gmtime(), $goods_id))
        {
            clear_cache_files();
            make_json_result($goods_num);
        }
    }

        /*------------------------------------------------------ */
        //-- 修改上架状态
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'toggle_on_sale')
        {
            $goods_id       = intval($_POST['id']);
            $on_sale        = intval($_POST['val']);
        
            if ($exc->edit("is_on_sale = '$on_sale', last_update=" .gmtime(), $goods_id))
            {
                clear_cache_files();
                make_json_result($on_sale);
            }
        }
        /*------------------------------------------------------ */
        //-- 修改精品推荐状态
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'toggle_best')
        {
        
            $goods_id       = intval($_POST['id']);
            $is_best        = intval($_POST['val']);
        
            if ($exc->edit("is_best = '$is_best', last_update=" .gmtime(), $goods_id))
            {
                clear_cache_files();
                make_json_result($is_best);
            }
        }
        
        /*------------------------------------------------------ */
        //-- 修改新品推荐状态
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'toggle_new')
        {
        
            $goods_id       = intval($_POST['id']);
            $is_new         = intval($_POST['val']);
        
            if ($exc->edit("is_new = '$is_new', last_update=" .gmtime(), $goods_id))
            {
                clear_cache_files();
                make_json_result($is_new);
            }
        }
        
        /*------------------------------------------------------ */
        //-- 修改热销推荐状态
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'toggle_hot')
        {
        
            $goods_id       = intval($_POST['id']);
            $is_hot         = intval($_POST['val']);
        
            if ($exc->edit("is_hot = '$is_hot', last_update=" .gmtime(), $goods_id))
            {
                clear_cache_files();
                make_json_result($is_hot);
            }
        }
        /*------------------------------------------------------ */
        //-- 修改商品排序
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_sort_order')
        {
        
            $goods_id       = intval($_POST['id']);
            $sort_order     = intval($_POST['val']);
        
            if ($exc->edit("sort_order = '$sort_order', last_update=" .gmtime(), $goods_id))
            {
                clear_cache_files();
                make_json_result($sort_order);
            }
        }
        /*------------------------------------------------------ */
        //-- 排序、分页、查询
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query'){
            $is_delete = empty($_REQUEST['is_delete']) ? 0 : intval($_REQUEST['is_delete']);
            $code = empty($_REQUEST['extension_code']) ? '' : trim($_REQUEST['extension_code']);
            $goods_list = goods_list($is_delete, ($code=='') ? 1 : 0);
            
            $handler_list = array();
            $handler_list['virtual_card'][] = array('url'=>'virtual_card.php?act=card', 'title'=>'バーチャルカード情報を見る', 'img'=>'icon_send_bonus.gif');
            $handler_list['virtual_card'][] = array('url'=>'virtual_card.php?act=replenish', 'title'=>'品物追加', 'img'=>'icon_add.gif');
            $handler_list['virtual_card'][] = array('url'=>'virtual_card.php?act=batch_card_add', 'title'=>'バッチ追加', 'img'=>'icon_output.gif');
            
            if (isset($handler_list[$code]))
            {
                $this->assign('add_handler',      $handler_list[$code]);
            }
            $this->assign('code',         $code);
            $this->assign('goods_list',   $goods_list['goods']);
            $this->assign('filter',       $goods_list['filter']);
            $this->assign('record_count', $goods_list['record_count']);
            $this->assign('page_count',   $goods_list['page_count']);
            $this->assign('list_type',    $is_delete ? 'trash' : 'goods');
            $ec_use_storage=C('ec_use_storage');
            $this->assign('use_storage',  empty($ec_use_storage) ? 0 : 1);
            
            /* 排序标记 */
            $sort_flag  = sort_flag($goods_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
            
            /* 获取商品类型存在规格的类型 */
            $specifications = get_goods_type_specifications();
            $this->assign('specifications', $specifications);
            
            $tpl = $is_delete ? 'goods_trash.htm' : 'goods_list.htm';
            make_json_result($this->fetch($tpl), '',
                        array('filter' => $goods_list['filter'], 'page_count' => $goods_list['page_count']));
    
        }
        /*------------------------------------------------------ */
        //-- 放入回收站
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove'){
            $goods_id = intval($_REQUEST['id']);
        
            if ($exc->edit("is_delete = 1", $goods_id))
            {
                clear_cache_files();
                $goods_name = $exc->get_name($goods_id);
        
                admin_log(addslashes($goods_name), '回収所に置く','商品'); // 记录日志
        
                $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
                ec_header("Location: $url\n");
                exit;
            }
        }
        /*------------------------------------------------------ */
        //-- 还原回收站中的商品
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'restore_goods')
        {
            $goods_id = intval($_REQUEST['id']);
        
            $exc->edit("is_delete = 0, add_time = '" . gmtime() . "'", $goods_id);
            clear_cache_files();
        
            $goods_name = $exc->get_name($goods_id);
        
            admin_log(addslashes($goods_name), '戻す', '商品'); // 记录日志
        
            $url = 'index.php?act=query&' . str_replace('act=restore_goods', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
            exit;
        }
        /*------------------------------------------------------ */
        //-- 彻底删除商品
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'drop_goods')
        {
            // 取得参数
            $goods_id = intval($_REQUEST['id']);
            if ($goods_id <= 0)
            {
                make_json_error('invalid params');
            }
        
            /* 取得商品信息 */
            $sql = "SELECT goods_id, goods_name, is_delete, is_real, goods_thumb, " .
                        "goods_img, original_img " .
                    "FROM " . $ecs->table('ec_goods') .
                    " WHERE goods_id = '$goods_id'";
            $goods = M()->getRowSql($sql);
            if (empty($goods))
            {
                make_json_error('商品存在なし');
            }
        
            if ($goods['is_delete'] != 1)
            {
                make_json_error('この商品は回収所に置いてません，削除できません');
            }
        
            /* 删除商品图片和轮播图片 */
            if (!empty($goods['goods_thumb']))
            {
                @unlink(ROOT_PATH . $goods['goods_thumb']);
            }
            if (!empty($goods['goods_img']))
            {
                @unlink(ROOT_PATH . $goods['goods_img']);
            }
            if (!empty($goods['original_img']))
            {
                @unlink(ROOT_PATH . $goods['original_img']);
            }
            /* 删除商品 */
            $exc->drop($goods_id);
        
            /* 删除商品的货品记录 */
            $sql = "DELETE FROM " . $ecs->table('ec_products') .
                    " WHERE goods_id = '$goods_id'";
            M()->exe($sql);
        
            /* 记录日志 */
            admin_log(addslashes($goods['goods_name']), '削除', '商品');
        
            /* 删除商品相册 */
            $sql = "SELECT img_url, thumb_url, img_original " .
                    "FROM " . $ecs->table('ec_goods_gallery') .
                    " WHERE goods_id = '$goods_id'";
            $res = M()->query($sql);
            if(!empty($res)){
                foreach($res as $row){
                    if (!empty($row['img_url']))
                    {
                        @unlink(ROOT_PATH . $row['img_url']);
                    }
                    if (!empty($row['thumb_url']))
                    {
                        @unlink(ROOT_PATH . $row['thumb_url']);
                    }
                    if (!empty($row['img_original']))
                    {
                        @unlink(ROOT_PATH . $row['img_original']);
                    }
                }
            }
            
            $sql = "DELETE FROM " . $ecs->table('ec_goods_gallery') . " WHERE goods_id = '$goods_id'";
            M()->exe($sql);
        
            /* 删除相关表记录 */
            $sql = "DELETE FROM " . $ecs->table('ec_collect_goods') . " WHERE goods_id = '$goods_id'";
            M()->exe($sql);
            $sql = "DELETE FROM " . $ecs->table('ec_goods_article') . " WHERE goods_id = '$goods_id'";
            M()->exe($sql);
            $sql = "DELETE FROM " . $ecs->table('ec_goods_attr') . " WHERE goods_id = '$goods_id'";
            M()->exe($sql);
            $sql = "DELETE FROM " . $ecs->table('ec_goods_cat') . " WHERE goods_id = '$goods_id'";
            M()->exe($sql);
            $sql = "DELETE FROM " . $ecs->table('ec_member_price') . " WHERE goods_id = '$goods_id'";
            M()->exe($sql);
            $sql = "DELETE FROM " . $ecs->table('ec_group_goods') . " WHERE parent_id = '$goods_id'";
            M()->exe($sql);
            $sql = "DELETE FROM " . $ecs->table('ec_group_goods') . " WHERE goods_id = '$goods_id'";
            M()->exe($sql);
            $sql = "DELETE FROM " . $ecs->table('ec_link_goods') . " WHERE goods_id = '$goods_id'";
            M()->exe($sql);
            $sql = "DELETE FROM " . $ecs->table('ec_link_goods') . " WHERE link_goods_id = '$goods_id'";
            M()->exe($sql);
            $sql = "DELETE FROM " . $ecs->table('ec_tag') . " WHERE goods_id = '$goods_id'";
            M()->exe($sql);
            $sql = "DELETE FROM " . $ecs->table('ec_comment') . " WHERE comment_type = 0 AND id_value = '$goods_id'";
            M()->exe($sql);
            $sql = "DELETE FROM " . $ecs->table('ec_collect_goods') . " WHERE goods_id = '$goods_id'";
            M()->exe($sql);
            $sql = "DELETE FROM " . $ecs->table('ec_booking_goods') . " WHERE goods_id = '$goods_id'";
            M()->exe($sql);
            $sql = "DELETE FROM " . $ecs->table('ec_goods_activity') . " WHERE goods_id = '$goods_id'";
            M()->exe($sql);
        
            /* 如果不是实体商品，删除相应虚拟商品记录 */
            if ($goods['is_real'] != 1)
            {
                $sql = "DELETE FROM " . $ecs->table('ec_virtual_card') . " WHERE goods_id = '$goods_id'";
                M()->exe($sql);
            }
        
            clear_cache_files();
            $url = 'index.php?act=query&' . str_replace('act=drop_goods', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
        
            exit;
        }
        /*------------------------------------------------------ */
        //-- 切换商品类型
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'get_attr'){
            $goods_id   = empty($_GET['goods_id']) ? 0 : intval($_GET['goods_id']);
            $goods_type = empty($_GET['goods_type']) ? 0 : intval($_GET['goods_type']);
            
            $content    = build_attr_html($goods_type, $goods_id);
            make_json_result($content);
        }
        /*------------------------------------------------------ */
        //-- 删除图片
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'drop_image')
        {
            $img_id = empty($_REQUEST['img_id']) ? 0 : intval($_REQUEST['img_id']);
            /* 删除图片文件 */
            $sql = "SELECT img_url, thumb_url, img_original " .
                    " FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_gallery') .
                    " WHERE img_id = '$img_id'";
            $row = M()->getRowSql($sql);
            if ($row['img_url'] != '' && is_file(ROOT_PATH . $row['img_url']))
            {
                @unlink(ROOT_PATH . $row['img_url']);
            }
            if ($row['thumb_url'] != '' && is_file(ROOT_PATH . $row['thumb_url']))
            {
                @unlink(ROOT_PATH . $row['thumb_url']);
            }
            if ($row['img_original'] != '' && is_file(ROOT_PATH . $row['img_original']))
            {
                @unlink(ROOT_PATH . $row['img_original']);
            }
            /* 删除数据 */
            $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_gallery') . " WHERE img_id = '$img_id' LIMIT 1";
            M()->exe($sql);
        
            clear_cache_files();
            make_json_result($img_id);
        }
        /*------------------------------------------------------ */
        //-- 搜索商品，仅返回名称及ID
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'get_goods_list'){
            $json = new JSON;
            $filters = $json->decode($_GET['JSON']);

            $arr = get_goods_list($filters);
            $opt = array();
            if(!empty($arr)){
                foreach ($arr AS $key => $val)
                {
                    $opt[] = array('value' => $val['goods_id'],
                                    'text' => $val['goods_name'],
                                    'data' => $val['shop_price']);
                }
            }
            make_json_result($opt);
            
        }
        /*------------------------------------------------------ */
        //-- 把商品加入关联
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'add_link_goods'){
            $json = new JSON;
            $linked_array   = $json->decode($_GET['add_ids']);
            $linked_goods   = $json->decode($_GET['JSON']);
            $goods_id       = $linked_goods[0];
            $is_double      = $linked_goods[1] == true ? 0 : 1;
            foreach ($linked_array AS $val){
                if ($is_double){
                    /* 双向关联 */
                    $sql = "INSERT INTO " . $ecs->table('ec_link_goods') . " (goods_id, link_goods_id, is_double, admin_id) " .
                            "VALUES ('$val', '$goods_id', '$is_double', '$_SESSION[uid]')";
                    M()->exe($sql);
                }
                $sql = "INSERT INTO " . $ecs->table('ec_link_goods') . " (goods_id, link_goods_id, is_double, admin_id) " .
                    "VALUES ('$goods_id', '$val', '$is_double', '$_SESSION[uid]')";
                M()->exe($sql);
            }
            $linked_goods   = get_linked_goods($goods_id);
            $options        = array();
            foreach ($linked_goods AS $val)
            {
                $options[] = array('value'  => $val['goods_id'],
                                'text'      => $val['goods_name'],
                                'data'      => '');
            }
            clear_cache_files();
            make_json_result($options);
        }
        /*------------------------------------------------------ */
        //-- 删除关联商品
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'drop_link_goods'){
            $json = new JSON;
            $drop_goods     = $json->decode($_GET['drop_ids']);
            $drop_goods_ids = db_create_in($drop_goods);
            $linked_goods   = $json->decode($_GET['JSON']);
            $goods_id       = $linked_goods[0];
            $is_signle      = $linked_goods[1];
            if (!$is_signle)
            {
                $sql = "DELETE FROM " .$ecs->table('ec_link_goods') .
                        " WHERE link_goods_id = '$goods_id' AND goods_id " . $drop_goods_ids;
            }
            else
            {
                $sql = "UPDATE " .$ecs->table('ec_link_goods') . " SET is_double = 0 ".
                        " WHERE link_goods_id = '$goods_id' AND goods_id " . $drop_goods_ids;
            }
            if ($goods_id == 0)
            {
                $sql .= " AND admin_id = '$_SESSION[uid]'";
            }
            M()->exe($sql);
            
            $sql = "DELETE FROM " .$ecs->table('ec_link_goods') .
                    " WHERE goods_id = '$goods_id' AND link_goods_id " . $drop_goods_ids;
            if ($goods_id == 0)
            {
                $sql .= " AND admin_id = '$_SESSION[uid]'";
            }
            M()->exe($sql);
            $linked_goods = get_linked_goods($goods_id);
            $options      = array();
            if(!empty($linked_goods)){
                foreach ($linked_goods AS $val)
                {
                    $options[] = array(
                                    'value' => $val['goods_id'],
                                    'text'  => $val['goods_name'],
                                    'data'  => '');
                }
            }
            clear_cache_files();
            make_json_result($options);
        }
        /*------------------------------------------------------ */
        //-- 增加一个配件
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'add_group_goods'){
            $json = new JSON;
            $fittings   = $json->decode($_GET['add_ids']);
            $arguments  = $json->decode($_GET['JSON']);
            $goods_id   = $arguments[0];
            $price      = $arguments[1];
            foreach ($fittings AS $val)
            {
                $sql = "INSERT INTO " . $ecs->table('ec_group_goods') . " (parent_id, goods_id, goods_price, admin_id) " .
                        "VALUES ('$goods_id', '$val', '$price', '$_SESSION[uid]')";
                M()->exe($sql);
            }
            $arr = get_group_goods($goods_id);
            $opt = array();
            if(!empty($arr)){
                foreach ($arr AS $val)
                {
                    $opt[] = array('value'      => $val['goods_id'],
                                    'text'      => $val['goods_name'],
                                    'data'      => '');
                }
            }
            clear_cache_files();
            make_json_result($opt);
        }
        /*------------------------------------------------------ */
        //-- 删除一个配件
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'drop_group_goods'){
            $json = new JSON;
            $fittings   = $json->decode($_GET['drop_ids']);
            $arguments  = $json->decode($_GET['JSON']);
            $goods_id   = $arguments[0];
            $price      = $arguments[1];
            $sql = "DELETE FROM " .$ecs->table('ec_group_goods') .
                    " WHERE parent_id='$goods_id' AND " .db_create_in($fittings, 'goods_id');
            if ($goods_id == 0)
            {
                $sql .= " AND admin_id = '$_SESSION[uid]'";
            }
            M()->exe($sql);
            $arr = get_group_goods($goods_id);
            $opt = array();
            if(!empty($arr)){
                foreach ($arr AS $val)
                {
                    $opt[] = array('value'      => $val['goods_id'],
                                    'text'      => $val['goods_name'],
                                    'data'      => '');
                }
            }
            clear_cache_files();
            make_json_result($opt);
        }
        /*------------------------------------------------------ */
        //-- 搜索文章
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'get_article_list'){
            $json = new JSON;
            $filters =(array) $json->decode(json_str_iconv($_GET['JSON']));
            $where = " WHERE cat_id > 0 ";
            if (!empty($filters['title']))
            {
                $keyword  = trim($filters['title']);
                $where   .=  " AND title LIKE '%" . mysql_like_quote($keyword) . "%' ";
            }
            $sql        = 'SELECT article_id, title FROM ' .$ecs->table('ec_article'). $where.
                  'ORDER BY article_id DESC LIMIT 50';
            $res        = M()->query($sql);
            $arr        = array();
            if(!empty($res)){
                foreach($res as $key=>$val){
                    $arr[]  = array('value' => $val['article_id'], 'text' => $val['title'], 'data'=>'');
                }
            }
            make_json_result($arr);
        }
        /*------------------------------------------------------ */
        //-- 添加关联文章
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'add_goods_article')
        {
            $json = new JSON;
            $articles   = $json->decode($_GET['add_ids']);
            $arguments  = $json->decode($_GET['JSON']);
            $goods_id   = $arguments[0];
        
            foreach ($articles AS $val)
            {
                $sql = "INSERT INTO " . $ecs->table('ec_goods_article') . " (goods_id, article_id, admin_id) " .
                        "VALUES ('$goods_id', '$val', '$_SESSION[uid]')";
                M()->exe($sql);
            }
        //p($arr);die;
            $arr = get_goods_articles($goods_id);
            
            $opt = array();
            if(!empty($arr)){
                foreach ($arr AS $val)
                {
                    $opt[] = array('value'      => $val['article_id'],
                                    'text'      => $val['title'],
                                    'data'      => '');
                }
            }
            clear_cache_files();
            make_json_result($opt);
        }
        /*------------------------------------------------------ */
        //-- 删除关联文章
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'drop_goods_article'){
            $json = new JSON;
            $articles   = $json->decode($_GET['drop_ids']);
            $arguments  = $json->decode($_GET['JSON']);
            $goods_id   = $arguments[0];
    
            $sql = "DELETE FROM " .$ecs->table('ec_goods_article') . " WHERE " . db_create_in($articles, "article_id") . " AND goods_id = '$goods_id'";
            M()->exe($sql);
            
            $arr = get_goods_articles($goods_id);
            $opt = array();
            if(!empty($arr)){
                foreach ($arr AS $val)
                {
                    $opt[] = array('value'      => $val['article_id'],
                                    'text'      => $val['title'],
                                    'data'      => '');
                }
            }
            
        
            clear_cache_files();
            make_json_result($opt);
    
        }
        /*------------------------------------------------------ */
        //-- 货品列表
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'product_list'){
            /* 是否存在商品id */
            if (empty($_GET['goods_id']))
            {
                $link[] = array('href' => U('index',array('act'=>'list')), 'text' => '商品リスト');
                $this->sys_msg('指定した商品を見つかりません。', 1, $link);
            }
            else
            {
                $goods_id = intval($_GET['goods_id']);
            }
            /* 取出商品信息 */
            $sql = "SELECT goods_sn, goods_name, goods_type, shop_price FROM " . $ecs->table('ec_goods') . " WHERE goods_id = '$goods_id'";
            $goods = M()->getRowSql($sql);
            if (empty($goods))
            {
                $link[] = array('href' => U('index',array('act'=>'list')), 'text' => '商品リスト');
                $this->sys_msg('指定した商品を見つかりません。', 1, $link);
            }
            $this->assign('sn', sprintf('（商品番号：%s）', $goods['goods_sn']));
            $this->assign('price', sprintf('（商品価額：%d）', $goods['shop_price']));
            $this->assign('goods_name', sprintf('商品名称：%s', $goods['goods_name']));
            $this->assign('goods_sn', sprintf('番号：%s', $goods['goods_sn']));
            
            /* 获取商品规格列表 */
            $attribute = get_goods_specifications_list($goods_id);
            if (empty($attribute))
            {
                $link[] = array('href' => U('index').'&act=edit&goods_id=' . $goods_id, 'text' => '商品変更');
                $this->sys_msg('この商品の規格が存在なし，規格を追加してください', 1, $link);
            }
            foreach ($attribute as $attribute_value)
            {
                //转换成数组
                $_attribute[$attribute_value['attr_id']]['attr_values'][] = $attribute_value['attr_value'];
                $_attribute[$attribute_value['attr_id']]['attr_id'] = $attribute_value['attr_id'];
                $_attribute[$attribute_value['attr_id']]['attr_name'] = $attribute_value['attr_name'];
            }
            $attribute_count = count($_attribute);

            $this->assign('attribute_count',          $attribute_count);
            $this->assign('attribute_count_3',        ($attribute_count + 3));
            $this->assign('attribute',                $_attribute);
            $this->assign('product_sn',               $goods['goods_sn'] . '_');
            $this->assign('product_number',           C('ec_default_storage'));
            
            /* 取商品的货品 */
            $product = product_list($goods_id, '','product_list');
            
            $this->assign('ur_here',      '品物リスト');
            $this->assign('action_link',  array('href' => U('index',array('act'=>'list')) , 'text' => '商品リスト'));
            $this->assign('product_list', $product['product']);
            $this->assign('product_null', empty($product['product']) ? 0 : 1);
            $ec_use_storage=C('ec_use_storage');
            $this->assign('use_storage',  empty($ec_use_storage) ? 0 : 1);
            $this->assign('goods_id',     $goods_id);
            $this->assign('filter',       $product['filter']);
            $this->assign('full_page',    1);

        
            $this->display('product_info.htm');
        }
        
        /*------------------------------------------------------ */
        //-- 货品排序、分页、查询
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'product_query')
        {
            /* 是否存在商品id */
            if (empty($_REQUEST['goods_id']))
            {
                make_json_error('エラー：'.'指定した商品を見つかりません。');
            }
            else
            {
                $goods_id = intval($_REQUEST['goods_id']);
            }
            
            /* 取出商品信息 */
            $sql = "SELECT goods_sn, goods_name, goods_type, shop_price FROM " . $ecs->table('ec_goods') . " WHERE goods_id = '$goods_id'";
            $goods = M()->getRowSql($sql);
            if (empty($goods))
            {
                make_json_error('エラー：'.'指定した商品を見つかりません。');
            }
            $this->assign('sn', sprintf('（商品番号：%s）', $goods['goods_sn']));
            $this->assign('price', sprintf('（商品価額：%d）', $goods['shop_price']));
            $this->assign('goods_name', sprintf('商品名称：%s', $goods['goods_name']));
            $this->assign('goods_sn', sprintf('番号：%s', $goods['goods_sn']));
            
            /* 获取商品规格列表 */
            $attribute = get_goods_specifications_list($goods_id);
            if (empty($attribute))
            {
                make_json_error('エラー：'.'指定した商品を見つかりません。');
            }
            foreach ($attribute as $attribute_value)
            {
                //转换成数组
                $_attribute[$attribute_value['attr_id']]['attr_values'][] = $attribute_value['attr_value'];
                $_attribute[$attribute_value['attr_id']]['attr_id'] = $attribute_value['attr_id'];
                $_attribute[$attribute_value['attr_id']]['attr_name'] = $attribute_value['attr_name'];
            }
            $attribute_count = count($_attribute);
        
            $this->assign('attribute_count',          $attribute_count);
            $this->assign('attribute',                $_attribute);
            $this->assign('attribute_count_3',        ($attribute_count + 3));
            $this->assign('product_sn',               $goods['goods_sn'] . '_');
            $this->assign('product_number',           C('ec_default_storage'));
    
            /* 取商品的货品 */
            $product = product_list($goods_id, '');
        
            $this->assign('ur_here', '品物リスト');
            $this->assign('action_link', array('href' => U('index',array('act'=>'list')), 'text' => '商品リスト'));
            $this->assign('product_list',  $product['product']);
            $ec_use_storage=C('ec_use_storage');
            $this->assign('use_storage',  empty($ec_use_storage) ? 0 : 1);
            $this->assign('goods_id',    $goods_id);
            $this->assign('filter',       $product['filter']);
        
            /* 排序标记 */
            $sort_flag  = sort_flag($product['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('product_info.htm'), '',
                array('filter' => $product['filter'], 'page_count' => $product['page_count']));
        }
        
        /*------------------------------------------------------ */
        //-- 货品删除
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'product_remove')
        {
            /* 是否存在商品id */
            if (empty($_REQUEST['id']))
            {
                make_json_error('品物idは空です');
            }
            else
            {
                $product_id = intval($_REQUEST['id']);
            }
            
            /* 货品库存 */
            $product = get_product_info($product_id, 'product_number, goods_id');
            
            /* 删除货品 */
            $sql = "DELETE FROM " . $ecs->table('ec_products') . " WHERE product_id = '$product_id'";
            $result = M()->exe($sql);
            if ($result)
            {
                /* 修改商品库存 */
                if ($this-> update_goods_stock($product['goods_id'], $product_number - $product['product_number']))
                {
                    //记录日志
                    admin_log('', '変更', '商品');
                }
        
                //记录日志
                admin_log('', '回収所', '品物');
        
                $url = 'index.php?act=product_query&' . str_replace('act=product_remove', '', $_SERVER['QUERY_STRING']);
        
                ec_header("Location: $url\n");
                exit;
            }
    
        }
        
        
        
        
        /*------------------------------------------------------ */
        //-- 修改货品价格
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_product_sn')
        {
        
            $product_id       = intval($_POST['id']);
            $product_sn       = json_str_iconv(trim($_POST['val']));
            $product_sn       = ('N/A' == $product_sn) ? '' : $product_sn;
        
            if (check_product_sn_exist($product_sn, $product_id))
            {
                make_json_error('エラー：'.'品物番号重複');
            }
        
            /* 修改 */
            $sql = "UPDATE " . $ecs->table('ec_products') . " SET product_sn = '$product_sn' WHERE product_id = '$product_id'";
            $result = M()->exe($sql);
            if ($result)
            {
                clear_cache_files();
                make_json_result($product_sn);
            }
        }
        /*------------------------------------------------------ */
        //-- 修改货品库存
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_product_number')
        {
            $product_id       = intval($_POST['id']);
            $product_number       = intval($_POST['val']);
        
            /* 货品库存 */
            $product = get_product_info($product_id, 'product_number, goods_id');
        
            /* 修改货品库存 */
            $sql = "UPDATE " . $ecs->table('ec_products') . " SET product_number = '$product_number' WHERE product_id = '$product_id'";
            $result = M()->exe($sql);
            if ($result)
            {
                /* 修改商品库存 */
                if ($this-> update_goods_stock($product['goods_id'], $product_number - $product['product_number']))
                {
                    clear_cache_files();
                    make_json_result($product_number);
                }
            }
        }
        /*------------------------------------------------------ */
        //-- 货品添加 执行
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'product_add_execute')
        {
            $product['goods_id']        = intval($_POST['goods_id']);
            $product['attr']            = $_POST['attr'];
            $product['product_sn']      = $_POST['product_sn'];
            $product['product_number']  = $_POST['product_number'];
            /* 是否存在商品id */
            if (empty($product['goods_id']))
            {
                $this-> sys_msg('エラー：'.'指定した商品を見つかりません。', 1, array(), false);
            }
            
            /* 判断是否为初次添加 */
            $insert = true;
            if (product_number_count($product['goods_id']) > 0)
            {
                $insert = false;
            }
            
            /* 取出商品信息 */
            $sql = "SELECT goods_sn, goods_name, goods_type, shop_price 
                    FROM " . $ecs->table('ec_goods') . " WHERE goods_id = '" . $product['goods_id'] . "'";
            $goods = M()->getRowSql($sql);
            if (empty($goods))
            {
                $this-> sys_msg('エラー：'.'指定した商品を見つかりません。', 1, array(), false);
            }
            foreach($product['product_sn'] as $key => $value)
            {
                $ec_use_storage=C('ec_use_storage');
                //过滤
                //过滤
                if(empty($product['product_number'][$key])){
                    if(empty($ec_use_storage))
                    {
                        $product['product_number'][$key]=0;
                    }else{
                        $product['product_number'][$key]=C('ec_default_storage');
                    }
                }else{
                    $product['product_number'][$key]=trim($product['product_number'][$key]);
                }
                
                //获取规格在商品属性表中的id
                foreach($product['attr'] as $attr_key => $attr_value)
                {
                    /* 检测：如果当前所添加的货品规格存在空值或0 */
                    if (empty($attr_value[$key]))
                    {
                        continue 2;
                    }
                    $is_spec_list[$attr_key] = 'true';

                    $value_price_list[$attr_key] = $attr_value[$key] . chr(9) . ''; //$key，当前
        
                    $id_list[$attr_key] = $attr_key;
                }
                $goods_attr_id = handle_goods_attr($product['goods_id'], $id_list, $is_spec_list, $value_price_list);
                
                /* 是否为重复规格的货品 */
                $goods_attr = sort_goods_attr_id_array($goods_attr_id);
                $goods_attr = implode('|', $goods_attr['sort']);
                if (check_goods_attr_exist($goods_attr, $product['goods_id']))
                {
                    continue;
                    //sys_msg($_LANG['sys']['wrong'] . $_LANG['exist_same_goods_attr'], 1, array(), false);
                }
                //货品号不为空
                if (!empty($value))
                {
                    /* 检测：货品货号是否在商品表和货品表中重复 */
                    if (check_goods_sn_exist($value))
                    {
                        continue;
                        //sys_msg($_LANG['sys']['wrong'] . $_LANG['exist_same_goods_sn'], 1, array(), false);
                    }
                    if (check_product_sn_exist($value))
                    {
                        continue;
                        //sys_msg($_LANG['sys']['wrong'] . $_LANG['exist_same_product_sn'], 1, array(), false);
                    }
                }
                
                /* 插入货品表 */
                $sql = "INSERT INTO " . $GLOBALS['ec_globals']['ecs']->table('ec_products') . " 
                        (goods_id, goods_attr, product_sn, product_number)  
                        VALUES ('" . $product['goods_id'] . "', '$goods_attr', '$value', '" . $product['product_number'][$key] . "')";
                $insert_id=M()->exe($sql);
                if (!$insert_id)
                {
                    continue;
                    //sys_msg($_LANG['sys']['wrong'] . $_LANG['cannot_add_products'], 1, array(), false);
                }
                //货品号为空 自动补货品号
                if (empty($value))
                {
                    $sql = "UPDATE " . $GLOBALS['ec_globals']['ecs']->table('ec_products') . "
                            SET product_sn = '" . $goods['goods_sn'] . "g_p" . $insert_id . "'
                            WHERE product_id = '" . $insert_id . "'";
                    M()->exe($sql);
                }
                /* 修改商品表库存 */
                $product_count = product_number_count($product['goods_id']);
                if (update_goods($product['goods_id'], 'goods_number', $product_count))
                {
                    //记录日志
                    admin_log($product['goods_id'],'変更', '商品');
                }
            }
            clear_cache_files();
            /* 返回 */
            if ($insert)
            {
                 $link[] = array('href' => U('index',array('act'=>'add')), 'text' => '商品新規');
                 $link[] = array('href' => U('index',array('act'=>'list')), 'text' => '商品リスト');
                 $link[] = array('href' => U('index',array('act'=>'product_list')).'&goods_id=' . $product['goods_id'], 'text' => '品物リスト');
            }
            else
            {
                 $link[] = array('href' => U('index',array('act'=>'list')). '&uselastfilter=1', 'text' => '商品リスト');
                 $link[] = array('href' => U('index',array('act'=>'edit')).'&goods_id=' . $product['goods_id'], 'text' => '商品情報変更');
                 $link[] = array('href' => U('index',array('act'=>'product_list')).'&goods_id=' . $product['goods_id'], 'text' => '品物リスト');
            }
            $this-> sys_msg('品物保存成功', 0, $link);
        }

        /*------------------------------------------------------ */
        //-- 货品批量操作
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'batch_product'){
            
        }
        
    }
    
    /**
     * 列表链接
     * @param   bool    $is_add         是否添加（插入）
     * @param   string  $extension_code 虚拟商品扩展代码，实体商品为空
     * @return  array('href' => $href, 'text' => $text)
     */
    public function list_link($is_add = true, $extension_code = ''){
        $href = U('index',array('act'=>'list')); 
        if (!empty($extension_code))
        {
            $href .= '&extension_code=' . $extension_code;
        }
        if (!$is_add)
        {
            $href .= '&' . list_link_postfix();
        }
    
        if ($extension_code == 'virtual_card')
        {
            $text = 'バーチャル商品リスト';
        }
        else
        {
            $text = '商品リスト';
        }
        return array('href' => $href, 'text' => $text);
    }
    
    /**
     * 添加链接
     * @param   string  $extension_code 虚拟商品扩展代码，实体商品为空
     * @return  array('href' => $href, 'text' => $text)
     */
    public function add_link($extension_code = '')
    {
        $href = U('index',array('act'=>'add'));
        if (!empty($extension_code))
        {
            $href .= '&extension_code=' . $extension_code;
        }
    
        if ($extension_code == 'virtual_card')
        {
            $text = 'バーチャル商品新規';
        }
        else
        {
            $text = '商品新規';
        }
    
        return array('href' => $href, 'text' => $text);
    }
    
    /**
     * 检查图片网址是否合法
     *
     * @param string $url 网址
     *
     * @return boolean
     */
    public function goods_parse_url($url)
    {
        $parse_url = @parse_url($url);
        return (!empty($parse_url['scheme']) && !empty($parse_url['host']));
    }
    
    
    
    /**
     * 保存某商品的优惠价格
     * @param   int     $goods_id    商品编号
     * @param   array   $number_list 优惠数量列表
     * @param   array   $price_list  价格列表
     * @return  void
     */
    public function handle_volume_price($goods_id, $number_list, $price_list)
    {
        $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_volume_price') .
               " WHERE price_type = '1' AND goods_id = '$goods_id'";
        M()->exe($sql);
    
    
        /* 循环处理每个优惠价格 */
        foreach ($price_list AS $key => $price)
        {
            /* 价格对应的数量上下限 */
            $volume_number = $number_list[$key];
    
            if (!empty($price))
            {
                $sql = "INSERT INTO " . $GLOBALS['ec_globals']['ecs']->table('ec_volume_price') .
                       " (price_type, goods_id, volume_number, volume_price) " .
                       "VALUES ('1', '$goods_id', '$volume_number', '$price')";
                M()->exe($sql);
            }
        }
    }
    
    /**
     * 修改商品库存
     * @param   string  $goods_id   商品编号，可以为多个，用 ',' 隔开
     * @param   string  $value      字段值
     * @return  bool
     */
    public function update_goods_stock($goods_id, $value)
    {
        if ($goods_id)
        {
            /* $res = $goods_number - $old_product_number + $product_number; */
            $sql = "UPDATE " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . "
                    SET goods_number = goods_number + $value,
                        last_update = '". gmtime() ."'
                    WHERE goods_id = '$goods_id'";
            $result = M()->exe($sql);
    
            /* 清除缓存 */
            clear_cache_files();
    
            return $result;
        }
        else
        {
            return false;
        }
    }
    
    
    
}
