<?php
/**
 * 管理员管理模块
 * Class AdministratorControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcPictureBatchControl extends EcAdminControl{
    
    //private $_db;

    public function __init() {
		//$this -> _db = K("AdminLog");
	}
    
    public function index(){
        $ecs=$GLOBALS['ec_globals']['ecs'];
        $image = new EcImage(C('ec_bgcolor'));
        $GLOBALS['image']=$image;
	    /*$tdb=M();
	    $exc = new exchange($ecs->table("ec_ad_position"), $tdb, 'position_id', 'position_name');*/
        /* act操作项的初始化 */
        if (empty($_GET['is_ajax']))
        {
            $this->assign('ur_here', L('admin_ecpicturebatch_control_index_list1'));
            $this->assign('cat_list',     cat_list(0, 0));
            $this->assign('brand_list',   get_brand_list());
            $this->display('picture_batch.htm');
        }
        elseif (!empty($_GET['get_goods']))
        {
            $json = new JSON();
            $brand_id = intval($_GET['brand_id']);
            $cat_id = intval($_GET['cat_id']);
            $goods_where = '';
            
            if (!empty($cat_id))
            {
                $goods_where .= ' AND ' . get_children($cat_id);
            }
            if (!empty($brand_id))
            {
                $goods_where .= " AND g.`brand_id` = '$brand_id'";
            }
            
            $sql = 'SELECT `goods_id`, `goods_name` FROM ' . $ecs->table('ec_goods') . ' AS g WHERE 1 ' . $goods_where . ' LIMIT 50';

            die($json->encode(M()->getAll($sql)));
            
        }
        else
        {
            $json = new JSON();
            $proc_thumb = (isset($GLOBALS['shop_id']) && $GLOBALS['shop_id'] > 0);
            $do_album = empty($_GET['do_album']) ? 0 : 1;
            $do_icon = empty($_GET['do_icon']) ? 0 : 1;
            $goods_id = trim($_GET['goods_id']);
            $brand_id = intval($_GET['brand_id']);
            $cat_id = intval($_GET['cat_id']);
            $goods_where = '';
            $album_where = '';
            $module_no = 0;
            
            if ($do_album == 1 AND $do_icon == 0)
            {
                $module_no = 1;
            }
            if (empty($goods_id))
            {
                if (!empty($cat_id))
                {
                    $goods_where .= ' AND ' . get_children($cat_id);
                }
                if (!empty($brand_id))
                {
                    $goods_where .= " AND g.`brand_id` = '$brand_id'";
                }
            }
            else
            {
                $goods_where .=  ' AND g.`goods_id` ' . db_create_in($goods_id);
            }
            
            if (!empty($goods_where))
            {
                $album_where = ', ' . $ecs->table('ec_goods'). " AS g WHERE album.img_original > '' AND album.goods_id = g.goods_id " . $goods_where;
            }
            else
            {
                $album_where = " WHERE album.img_original > ''";
            }
            
            $GLOBALS['goods_where']=$goods_where;
            $GLOBALS['album_where']=$album_where;
            /* 设置最长执行时间为5分钟 */
            @set_time_limit(300);
            
            if (isset($_GET['start']))
            {
                $page_size = 50; // 默认50张/页
                $thumb = empty($_GET['thumb']) ? 0 : 1;
                $watermark = empty($_GET['watermark']) ? 0 : 1;
                $change = empty($_GET['change']) ? 0 : 1;
                $silent = empty($_GET['silent']) ? 0 : 1;
                
                /* 检查GD */
                if ($image->gd_version() < 1)
                {
                    make_json_error(L('admin_ecpicturebatch_control_index_list2'));
                }
                
                /* 如果需要添加水印，检查水印文件 */
                $ec_watermark=C('ec_watermark');
                $ec_watermark_place=C('ec_watermark_place');
                if (
                        (!empty($ec_watermark)) && 
                        ($ec_watermark_place > 0) && 
                        $watermark && 
                        (!$image->validate_image($ec_watermark)))
                {
                    make_json_error($image->error_msg());
                }
                $title = '';
                if (isset($_GET['total_icon']))
                {
                    $count = M()->GetOne("SELECT COUNT(*) FROM ".$ecs->table('ec_goods'). " AS g WHERE g.original_img <> ''" . $goods_where,'COUNT(*)');
                    $title = sprintf(L('admin_ecpicturebatch_control_index_list3'), $count, $page_size);
                }
                if (isset($_GET['total_album']))
                {
                    $count = M()->GetOne("SELECT COUNT(*) FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_goods_gallery'). ' AS album ' . $album_where,'COUNT(*)');
                    $title = sprintf('&nbsp;' .  L('admin_ecpicturebatch_control_index_list4'), $count, $page_size);
                    $module_no = 1;
                }
                $result = array(
                            'error' => 0, 'message' => '', 'content' => '', 'module_no' => $module_no, 'done' => 1, 
                            'title' => $title, 'page_size' => $page_size,'page' => 1, 'thumb'=> $thumb, 
                            'watermark' => $watermark, 'total' => 1, 'change' => $change, 'silent' => $silent,
                            'do_album' => $do_album, 'do_icon'=> $do_icon, 'goods_id'=> $goods_id, 'brand_id'=> $brand_id, 
                            'cat_id'=> $cat_id,
                            'row' => array('new_page'  => sprintf(L('admin_ecpicturebatch_common1'), 1),
                                           'new_total' => sprintf(L('admin_ecpicturebatch_common2'), ceil($count/$page_size)),
                                           'new_time'  => L('admin_ecpicturebatch_common3'),
                                           'cur_id'    => 'time_1'));
        
                die($json->encode($result));
            }
            else
            {
                $result = array('error' => 0, 'message' => '', 'content' => '', 'done' => 2, 'do_album' => $do_album, 
                                'do_icon'=> $do_icon, 'goods_id'=> $goods_id, 'brand_id'=> $brand_id, 'cat_id'=> $cat_id);
                $result['thumb']     = empty($_GET['thumb'])     ? 0 : 1;
                $result['watermark'] = empty($_GET['watermark']) ? 0 : 1;
                $result['change']    = empty($_GET['change'])    ? 0 : 1;
                $result['page_size'] = empty($_GET['page_size']) ? 100 : intval($_GET['page_size']);
                $result['module_no'] = empty($_GET['module_no']) ? 0 : intval($_GET['module_no']);
                $result['page']      = isset($_GET['page'])      ? intval($_GET['page']) : 1;
                $result['total']     = isset($_GET['total'])     ? intval($_GET['total']) : 1;
                $result['silent']    = empty($_GET['silent'])    ? 0 : 1;
                if ($result['silent'])
                {
                    $err_msg = array();
                }
                //p($result);die;
                /*------------------------------------------------------ */
                //-- 商品图片
                /*------------------------------------------------------ */
                if ($result['module_no'] == 0)
                {
                    $count = M()->GetOne("SELECT COUNT(*) FROM ".$ecs->table('ec_goods'). " AS g WHERE g.original_img > ''" . $goods_where,'COUNT(*)');
                    /* 页数在许可范围内 */
                    if ($result['page'] <= ceil($count / $result['page_size']))
                    {
                        //p($count);die;
                        $start_time = gmtime(); //开始执行时间
                        /* 开始处理 */
                        if ($proc_thumb)
                        {
                            $this-> process_image_ex($result['page'], $result['page_size'], $result['module_no'], 
                                             $result['thumb'], $result['watermark'], $result['change'], $result['silent']);
                        }
                        else
                        {
                            $this-> process_image($result['page'], $result['page_size'], $result['module_no'], 
                                          $result['thumb'], $result['watermark'], $result['change'], $result['silent']);
                        }
                        $end_time = gmtime();
                        $result['row']['pre_id'] = 'time_' . $result['total'];
                        $result['row']['pre_time'] = ($end_time > $start_time) ? $end_time - $start_time : 1;
                        $result['row']['pre_time'] = sprintf(L('admin_ecpicturebatch_common4'), $result['row']['pre_time']);
                        $result['row']['cur_id'] = 'time_' . ($result['total'] + 1);
                        $result['page']++; // 新行
                        $result['row']['new_page'] = sprintf(L('admin_ecpicturebatch_common1'), $result['page']);
                        $result['row']['new_total'] = sprintf(L('admin_ecpicturebatch_common2'), ceil($count/$result['page_size']));
                        $result['row']['new_time'] = L('admin_ecpicturebatch_common3');
                        $result['total']++;
                    }
                    else
                    {
                        --$result['total'];
                        --$result['page'];
                        $result['done'] = 0;
                        $result['message'] = ($do_album) ? '' : L('admin_ecpicturebatch_common5');
                        /* 清除缓存 */
                        clear_cache_files();
                        die($json->encode($result));
                    }
                }
                else if ($result['module_no'] == 1 && $result['do_album'] == 1)
                {
                    //商品相册
                    $count = M()->GetOne("SELECT COUNT(*) FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_goods_gallery'). ' AS album ' . $album_where,'COUNT(*)');
        
                    if ($result['page'] <= ceil($count / $result['page_size']))
                    {
                        $start_time = gmtime(); // 开始执行时间
                        /* 开始处理 */
                        if ($proc_thumb)
                        {
                            $this->process_image_ex($result['page'], $result['page_size'], $result['module_no'], $result['thumb'], $result['watermark'], $result['change'], $result['silent']);
                        }
                        else
                        {
                            $this->process_image($result['page'], $result['page_size'], $result['module_no'], $result['thumb'], $result['watermark'], $result['change'], $result['silent']);
                        }
                        $end_time = gmtime();
                        $result['row']['pre_id'] = 'time_' . $result['total'];
                        $result['row']['pre_time'] = ($end_time > $start_time) ? $end_time - $start_time : 1;
                        $result['row']['pre_time'] = sprintf(L('admin_ecpicturebatch_common4'), $result['row']['pre_time']);
                        $result['row']['cur_id'] = 'time_' . ($result['total'] + 1);
                        $result['page']++;
                        $result['row']['new_page'] = sprintf(L('admin_ecpicturebatch_common1'), $result['page']);
                        $result['row']['new_total'] = sprintf(L('admin_ecpicturebatch_common2'), ceil($count/$result['page_size']));
                        $result['row']['new_time'] = L('admin_ecpicturebatch_common3');
        
                        $result['total']++;
                    }
                    else
                    {
                        $result['row']['pre_id'] = 'time_' . $result['total'];
                        $result['row']['cur_id'] = 'time_' . ($result['total'] + 1);
                        $result['row']['new_page'] = sprintf(L('admin_ecpicturebatch_common1'), $result['page']);
                        $result['row']['new_total'] = sprintf(L('admin_ecpicturebatch_common2'), ceil($count/$result['page_size']));
                        $result['row']['new_time'] = L('admin_ecpicturebatch_common3');
        
                        /* 执行结束 */
                        $result['done'] = 0;
                        $result['message'] = L('admin_ecpicturebatch_common5');
                        /* 清除缓存 */
                        clear_cache_files();
                    }
                }
            }
            if ($result['silent'] && $err_msg)
            {
                $result['content'] = implode('<br />' , $err_msg);
            }
    
            die($json->encode($result));
    
        }
        
    }
    
    
    /**
     * 图片处理函数
     *
     * @access  public
     * @param   integer $page
     * @param   integer $page_size
     * @param   integer $type
     * @param   boolen  $thumb      是否生成缩略图
     * @param   boolen  $watermark  是否生成水印图
     * @param   boolen  $change     true 生成新图，删除旧图 false 用新图覆盖旧图
     * @param   boolen  $silent     是否执行能忽略错误
     *
     * @return void
     */
    function process_image($page = 1, $page_size = 100, $type = 0, $thumb= true, $watermark = true, $change = false, $silent = true)
    {
        if ($type == 0)
        {
            $sql = "SELECT g.goods_id, g.original_img, g.goods_img, g.goods_thumb FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_goods'). " AS g WHERE g.original_img > ''" . $GLOBALS['goods_where'];
            $res = M()->SelectLimit($sql, $page_size, ($page-1)*$page_size);
            //p($res);die;
            $index=0;
            if(!empty($res)){
                foreach($res as $row)
                {
                    $index++;
                    //sleep(1);
                    $goods_thumb = '';
                    $image = '';
                    
                    if (!file_exists(ROOT_PATH .$row['original_img'])){
                        //echo '111';
                        continue;
                    }
                    //p(ROOT_PATH . $row['original_img']);
                    /* 水印 */
                    if ($watermark)
                    {
                        /* 获取加水印图片的目录 */
                        if (empty($row['goods_img']))
                        {
                            $dir = dirname(ROOT_PATH . $row['original_img']) . '/';
                        }
                        else
                        {
                            $dir = dirname(ROOT_PATH . $row['goods_img']) . '/';
                        }
                        
                        $image = $GLOBALS['image']->make_thumb(ROOT_PATH . $row['original_img'], C('ec_image_width'), C('ec_image_height'), $dir); //先生成缩略图
                         
                        if (!$image)
                        {
                            //出错返回
                            $msg = sprintf(L('admin_ecpicturebatch_common6'), $row['goods_id']) . "\n" . $GLOBALS['image']->error_msg();
                            if ($silent)
                            {
                                $GLOBALS['err_msg'][] = $msg;
                                continue;
                            }
                            else
                            {
                                make_json_error($msg);
                            }
                        }
                        
                        $image = $GLOBALS['image']->add_watermark(ROOT_PATH . $image, '', ROOT_PATH.C('ec_watermark'), C('ec_watermark_place'),C('ec_watermark_alpha'));
                        
                        if (!$image)
                        {
                            //出错返回
                            $msg = sprintf(L('admin_ecpicturebatch_common6'), $row['goods_id']) . "\n" . $GLOBALS['image']->error_msg();
                            if ($silent)
                            {
                                $GLOBALS['err_msg'][] = $msg;
                                continue;
                            }
                            else
                            {
                                make_json_error($msg);
                            }
                        }
                        /*if($index==2){
                            echo $image;
                        }*/
                         //echo $image;
                         //sleep(3);
                        /* 重新格式化图片名称 */
                        $image = reformat_image_name('goods', $row['goods_id'], $image, 'goods');
                        /*if($index==3){
                            echo $image;die;
                        }*/
                        //sleep(3);
                        //echo $image;
                        //p($image);die;
                        if ($change || empty($row['goods_img']))
                        {
                           // echo $image;
                            /* 要生成新链接的处理过程 */
                            if ($image != $row['goods_img'])
                            {
                                $sql = "UPDATE " .$GLOBALS['ec_globals']['ecs']->table('ec_goods'). " SET goods_img = '$image' WHERE goods_id = '" . $row['goods_id'] . "'";
                                M()->exe($sql);
                                /* 防止原图被删除 */
                                if ($row['goods_img'] != $row['original_img'])
                                {
                                    @unlink(ROOT_PATH . $row['goods_img']);
                                }
                            }
                        }
                        else
                        {
                            $this->replace_image($image, $row['goods_img'], $row['goods_id'], $silent);
                        }
                    }
                    
                    /* 缩略图 */
                    if ($thumb)
                    {
                        if (empty($row['goods_thumb']))
                        {
                            $dir = dirname(ROOT_PATH . $row['original_img']) . '/';
                        }
                        else
                        {
                            $dir = dirname(ROOT_PATH . $row['goods_thumb']) . '/';
                        }
                        
                        $goods_thumb = $GLOBALS['image']->make_thumb(ROOT_PATH.$row['original_img'], C('ec_thumb_width'), C('ec_thumb_height'), $dir);
                        
                        /* 出错处理 */
                        if (!$goods_thumb)
                        {
                            $msg = sprintf(L('admin_ecpicturebatch_common6'), $row['goods_id']) . "\n" . $GLOBALS['image']->error_msg();
                            if ($silent)
                            {
                                $GLOBALS['err_msg'][] = $msg;
                                continue;
                            }
                            else
                            {
                                make_json_error($msg);
                            }
                        }
                        /* 重新格式化图片名称 */
                        $goods_thumb = reformat_image_name('goods_thumb', $row['goods_id'], $goods_thumb, 'thumb');
                        //p($goods_thumb);die;
                        if ($change || empty($row['goods_thumb']))
                        {
                            if ($row['goods_thumb'] != $goods_thumb)
                            {
                                $sql = "UPDATE " .$GLOBALS['ec_globals']['ecs']->table('ec_goods'). " SET goods_thumb = '$goods_thumb' WHERE goods_id = '" . $row['goods_id'] . "'";
                                M()->exe($sql);
                                /* 防止原图被删除 */
                                if ($row['goods_thumb'] != $row['original_img'])
                                {
                                    @unlink(ROOT_PATH . $row['goods_thumb']);
                                }
                            }
                        }
                        else
                        {
                            $this->replace_image($goods_thumb, $row['goods_thumb'], $row['goods_id'], $silent);
                        }
                    }
                }
            }
        }else
        {
            /* 遍历商品相册 */
            $sql = "SELECT 
                        album.goods_id, album.img_id, album.img_url, album.thumb_url, album.img_original 
                    FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_goods_gallery'). " AS album " . $GLOBALS['album_where'];
            $res = M()->SelectLimit($sql, $page_size, ($page - 1) * $page_size);
            
            if(!empty($res)){
                foreach($res as $row)
                {
                    $thumb_url = '';
                    $image     = '';
                    if (!file_exists(ROOT_PATH .$row['img_original'])){
                        //echo '111';
                        continue;
                    }
                    /* 水印 */
                    if ($watermark && file_exists(ROOT_PATH . $row['img_original']))
                    {
                        if (empty($row['img_url']))
                        {
                            $dir = dirname(ROOT_PATH . $row['img_original']) . '/';
                        }
                        else
                        {
                            $dir = dirname(ROOT_PATH . $row['img_url']) . '/';
                        }
                        $file_name  = EcImage::unique_name($dir);
                        $file_name .= EcImage::get_filetype(empty($row['img_url']) ? $row['img_original']: $row['img_url']);
                        copy(ROOT_PATH . $row['img_original'], $dir . $file_name);
                        $image = $GLOBALS['image']->add_watermark($dir . $file_name ,'',ROOT_PATH.C('ec_watermark'), C('ec_watermark_place'),C('ec_watermark_alpha'));
                        if (!$image)
                        {
                             @unlink($dir . $file_name);
                             $msg = sprintf(L('admin_ecpicturebatch_common6'), $row['goods_id']) . "\n" . $GLOBALS['image']->error_msg();
                             if ($silent)
                             {
                                $GLOBALS['err_msg'][] = $msg;
                                continue;
                             }
                             else
                             {
                                 make_json_error($msg);
                             }
                        }
                        /* 重新格式化图片名称 */
                        $image = reformat_image_name('gallery', $row['goods_id'], $image, 'goods');
                        if ($change || empty($row['img_url']) || $row['img_original'] == $row['img_url'])
                        {
                            if ($image != $row['img_url'])
                            {
                                 $sql = "UPDATE " .$GLOBALS['ec_globals']['ecs']->table('ec_goods_gallery'). " SET img_url='$image' WHERE img_id='$row[img_id]'";
                                 M()->exe($sql);
                                 if ($row['img_original'] != $row['img_url'])
                                 {
                                    @unlink(ROOT_PATH . $row['img_url']);
                                 }
                            }
                        }
                        else
                        {
                            $this->replace_image($image, $row['img_url'], $row['goods_id'], $silent);
                        }
                    }
                    
                    /* 缩略图 */
                    if ($thumb)
                    {
                        if (empty($row['thumb_url']))
                        {
                            $dir = dirname(ROOT_PATH . $row['img_original']) . '/';
                        }
                        else
                        {
                            $dir = dirname(ROOT_PATH . $row['thumb_url']) . '/';
                        }
                        $thumb_url = $GLOBALS['image']->make_thumb(ROOT_PATH . $row['img_original'], C('ec_thumb_width'), C('ec_thumb_height'), $dir);
                        if (!$thumb_url)
                        {
                            $msg = sprintf(L('admin_ecpicturebatch_common6'), $row['goods_id']) . "\n" . $GLOBALS['image']->error_msg();
                            if ($silent)
                            {
                                $GLOBALS['err_msg'][] = $msg;
                                continue;
                            }
                            else
                            {
                                make_json_error($msg);
                            }
                        }
                        /* 重新格式化图片名称 */
                        $thumb_url = reformat_image_name('gallery_thumb', $row['goods_id'], $thumb_url, 'thumb');
                        if ($change || empty($row['thumb_url']))
                        {
                            if ($thumb_url != $row['thumb_url'])
                            {
                                $sql = "UPDATE " .$GLOBALS['ec_globals']['ecs']->table('ec_goods_gallery'). " SET thumb_url='$thumb_url' WHERE img_id='$row[img_id]'";
                                M()->exe($sql);
                                @unlink(ROOT_PATH . $row['thumb_url']);
                            }
                        }
                        else
                        {
                            $this->replace_image($thumb_url, $row['thumb_url'], $row['goods_id'],$silent);
                        }
                    }
                }
            }

        }
    }
    
    
    /**
     * 图片处理函数
     *
     * @access  public
     * @param   integer $page
     * @param   integer $page_size
     * @param   integer $type
     * @param   boolen  $thumb      是否生成缩略图
     * @param   boolen  $watermark  是否生成水印图
     * @param   boolen  $change     true 生成新图，删除旧图 false 用新图覆盖旧图
     * @param   boolen  $silent     是否执行能忽略错误
     *
     * @return void
     */
    public function process_image_ex($page = 1, $page_size = 100, $type = 0, $thumb= true, $watermark = true, $change = false, $silent = true)
    {
        if ($type == 0)
        {
            $sql = "SELECT g.goods_id, g.original_img, g.goods_img, g.goods_thumb FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_goods'). " AS g WHERE g.original_img > ''" . $goods_where;
            $res = M()->SelectLimit($sql, $page_size, ($page-1)*$page_size);
            if(!empty($res)){
                foreach($res as $row)
                {
                    if ($thumb)
                    {
                        get_image_path($row['goods_id'], '', true, 'goods', true);
                    }
                    if ($watermark)
                    {
                        get_image_path($row['goods_id'], '', false, 'goods', true);
                    }
                }
            }    
        }
        else
        {
            $sql = "SELECT album.goods_id, album.img_id, album.img_url, album.thumb_url, album.img_original FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_goods_gallery'). " AS album " . $GLOBALS['album_where'];
            $res = M()->SelectLimit($sql, $page_size, ($page - 1) * $page_size);
            if(!empty($res)){
                foreach($res as $row)
                {
                    if ($thumb)
                    {
                        get_image_path($row['goods_id'], $row['img_original'], true, 'gallery', true);
                    }
                    if ($watermark)
                    {
                        get_image_path($row['goods_id'], $row['img_original'], false, 'gallery', true);
                    }
                }
            }
        }
    }
    
    
    /**
     *  用新图片替换指定图片
     *
     * @access  public
     * @param   string      $new_image      新图片
     * @param   string      $old_image      旧图片
     * @param   string      $goods_id       商品图片
     * @param   boolen      $silent         是否使用静态函数
     *
     * @return void
     */
    public function replace_image($new_image, $old_image, $goods_id, $silent)
    {
        $error = false;
        if (file_exists(ROOT_PATH . $old_image))
        {
            @rename(ROOT_PATH . $old_image, ROOT_PATH . $old_image . '.bak');
            if (!@rename(ROOT_PATH . $new_image, ROOT_PATH . $old_image))
            {
                $error = true;
            }
        }
        else
        {
            if (!@rename(ROOT_PATH . $new_image, ROOT_PATH . $old_image))
            {
                $error = true;
            }
        }
        if ($error === true)
        {
            if (file_exists(ROOT_PATH . $old_image . '.bak'))
            {
                @rename(ROOT_PATH . $old_image . '.bak', ROOT_PATH . $old_image);
            }
            $msg = sprintf(L('admin_ecpicturebatch_common6'), $goods_id) . "\n" . sprintf(L('admin_ecpicturebatch_control_index_list5'), $new_image, $old_image);
            if ($silent)
            {
                $GLOBALS['err_msg'][] = $msg;
            }
            else
            {
                make_json_error($msg);
            }
        }
        else
        {
            if (file_exists(ROOT_PATH . $old_image . '.bak'))
            {
                @unlink(ROOT_PATH . $old_image . '.bak');
            }
            return;
        }
    }

}
?>