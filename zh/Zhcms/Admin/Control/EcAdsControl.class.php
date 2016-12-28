<?php
/**
 * 商品类型
 * @author 周鸿 <136871204@qq.com>
 */
class EcAdsControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("Attribute");
	}
    
    public function index(){
        $image = new EcImage(C('ec_bgcolor'));
        $ecs=$GLOBALS['ec_globals']['ecs'];
	    $tdb=M();
	    $exc = new exchange($ecs->table("ec_ad"), $tdb, 'ad_id', 'ad_name');
        /*------------------------------------------------------ */
        //-- 广告列表页面
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'list'){
            $pid = !empty($_REQUEST['pid']) ? intval($_REQUEST['pid']) : 0;
            $this->assign('ur_here',     '广告列表');
            $this->assign('action_link', array('text' => '添加广告', 'href' => U('index',array('act'=>'add'))));
            $this->assign('pid',         $pid);
            $this->assign('full_page',  1);
            $ads_list = $this->get_adslist();
            
            $this->assign('ads_list',     $ads_list['ads']);
            $this->assign('filter',       $ads_list['filter']);
            $this->assign('record_count', $ads_list['record_count']);
            $this->assign('page_count',   $ads_list['page_count']);
            
            $sort_flag  = sort_flag($ads_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
            $this->display('ads_list.htm');
        }
        /*------------------------------------------------------ */
        //-- 排序、分页、查询
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query')
        {
            $ads_list = $this->get_adslist();
        
            $this->assign('ads_list',     $ads_list['ads']);
            $this->assign('filter',       $ads_list['filter']);
            $this->assign('record_count', $ads_list['record_count']);
            $this->assign('page_count',   $ads_list['page_count']);
        
            $sort_flag  = sort_flag($ads_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('ads_list.htm'), '',
                array('filter' => $ads_list['filter'], 'page_count' => $ads_list['page_count']));
        }

        /*------------------------------------------------------ */
        //-- 添加新广告页面
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'add')
        {
        
            $ad_link = empty($_GET['ad_link']) ? '' : trim($_GET['ad_link']);
            $ad_name = empty($_GET['ad_name']) ? '' : trim($_GET['ad_name']);
        
            $start_time = local_date('Y-m-d');
            $end_time   = local_date('Y-m-d', gmtime() + 3600 * 24 * 30);  // 默认结束时间为1个月以后
        
            $this->assign('ads',
                            array('ad_link' => $ad_link, 
                                  'ad_name' => $ad_name, 
                                  'start_time' => $start_time,
                                  'end_time' => $end_time, 
                                  'enabled' => 1)
                         );
        
            $this->assign('ur_here',       '添加广告');
            $this->assign('action_link',   array('href' => U('index',array('act'=>'list')), 'text' => '广告列表'));
            $this->assign('position_list', get_position_list());
        
            $this->assign('form_act', 'insert');
            $this->assign('action',   'add');
            //$this->assign('cfg_lang', $_CFG['lang']);
        
            $this->display('ads_info.htm');
        }
        /*------------------------------------------------------ */
        //-- 新广告的处理
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'insert'){
            /* 初始化变量 */
            $id      = !empty($_POST['id'])      ? intval($_POST['id'])    : 0;
            $type    = !empty($_POST['type'])    ? intval($_POST['type'])  : 0;
            $ad_name = !empty($_POST['ad_name']) ? trim($_POST['ad_name']) : '';
            if ($_POST['media_type'] == '0')
            {
                $ad_link = !empty($_POST['ad_link']) ? trim($_POST['ad_link']) : '';
            }
            else
            {
                $ad_link = !empty($_POST['ad_link2']) ? trim($_POST['ad_link2']) : '';
            }
            /* 获得广告的开始时期与结束日期 */
            $start_time = local_strtotime($_POST['start_time']);
            $end_time   = local_strtotime($_POST['end_time']);
        
            /* 查看广告名称是否有重复 */
            $sql = "SELECT COUNT(*) FROM " .$ecs->table('ec_ad'). " WHERE ad_name = '$ad_name'";
            if (M()->getOne($sql,'COUNT(*)') > 0)
            {
                $link[] = array('text' => '返回', 'href' => 'javascript:history.back(-1)');
                $this->sys_msg('该广告名称已经存在!', 0, $link);
            }
            /* 添加图片类型的广告 */
            if ($_POST['media_type'] == '0'){
                if (
                        (isset($_FILES['ad_img']['error']) && $_FILES['ad_img']['error'] == 0) || 
                        (!isset($_FILES['ad_img']['error']) && isset($_FILES['ad_img']['tmp_name'] ) &&$_FILES['ad_img']['tmp_name'] != 'none')
                    ){
                    $ad_code = basename($image->upload_image($_FILES['ad_img'], 'afficheimg'));
                }
                if (!empty($_POST['img_url']))
                {
                    $ad_code = $_POST['img_url'];
                }
                if (
                        ((isset($_FILES['ad_img']['error']) && $_FILES['ad_img']['error'] > 0) || (!isset($_FILES['ad_img']['error']) && isset($_FILES['ad_img']['tmp_name']) && $_FILES['ad_img']['tmp_name'] == 'none')) && 
                        empty($_POST['img_url'])
                    )
                {
                    $link[] = array('text' => '返回', 'href' => 'javascript:history.back(-1)');
                    $this->sys_msg('广告的图片不能为空!', 0, $link);
                }
            }
            /* 如果添加的广告是Flash广告 */
            elseif ($_POST['media_type'] == '1'){
                if (
                        (isset($_FILES['upfile_flash']['error']) && $_FILES['upfile_flash']['error'] == 0) || 
                        (!isset($_FILES['upfile_flash']['error']) && isset($_FILES['ad_img']['tmp_name']) && $_FILES['upfile_flash']['tmp_name'] != 'none')
                    ){
                    /* 检查文件类型 */
                    if ($_FILES['upfile_flash']['type'] != "application/x-shockwave-flash")
                    {
                        $link[] = array('text' => '返回', 'href' => 'javascript:history.back(-1)');
                        $this->sys_msg('上传的Flash文件类型不正确!', 0, $link);
                    }
                    /* 生成文件名 */
                    $urlstr = date('Ymd');
                    for ($i = 0; $i < 6; $i++){
                        $urlstr .= chr(mt_rand(97, 122));
                    }
                    $source_file = $_FILES['upfile_flash']['tmp_name'];
                    $target      = ROOT_PATH . EC_DATA_DIR . '/afficheimg/';
                    $file_name   = $urlstr .'.swf';
                    if (!move_upload_file($source_file, $target.$file_name))
                    {
                        $link[] = array('text' => '返回', 'href' => 'javascript:history.back(-1)');
                        $this->sys_msg('上传失败', 0, $link);
                    }else
                    {
                        $ad_code = $file_name;
                    }
                }
                elseif (!empty($_POST['flash_url'])){
                    if (substr(strtolower($_POST['flash_url']), strlen($_POST['flash_url']) - 4) != '.swf'){
                        $link[] = array('text' => '返回', 'href' => 'javascript:history.back(-1)');
                        $this->sys_msg('上传的Flash文件类型不正确!', 0, $link);
                    }
                    $ad_code = $_POST['flash_url'];
                }
                if (
                        ((isset($_FILES['upfile_flash']['error']) && $_FILES['upfile_flash']['error'] > 0) || (!isset($_FILES['upfile_flash']['error']) && isset($_FILES['upfile_flash']['tmp_name']) && $_FILES['upfile_flash']['tmp_name'] == 'none')) && 
                        empty($_POST['flash_url']))
                {
                    $link[] = array('text' => '返回', 'href' => 'javascript:history.back(-1)');
                    $this->sys_msg('广告的flash不能为空!', 0, $link);
                }
            }
            /* 如果广告类型为代码广告 */
            elseif ($_POST['media_type'] == '2')
            {
                if (!empty($_POST['ad_code']))
                {
                    $ad_code = $_POST['ad_code'];
                }
                else
                {
                    $link[] = array('text' => '返回', 'href' => 'javascript:history.back(-1)');
                    $this->sys_msg('广告的代码不能为空!', 0, $link);
                }
            }
            /* 广告类型为文本广告 */
            elseif ($_POST['media_type'] == '3'){
                if (!empty($_POST['ad_text']))
                {
                    $ad_code = $_POST['ad_text'];
                }
                else
                {
                    $link[] = array('text' => '返回', 'href' => 'javascript:history.back(-1)');
                    $this->sys_msg('广告的内容不能为空!', 0, $link);
                }
            }
            /* 插入数据 */
            $sql = "INSERT INTO ".$ecs->table('ec_ad'). " (position_id,media_type,ad_name,ad_link,ad_code,start_time,end_time,link_man,link_email,link_phone,click_count,enabled)
                    VALUES ('$_POST[position_id]',
                            '$_POST[media_type]',
                            '$ad_name',
                            '$ad_link',
                            '$ad_code',
                            '$start_time',
                            '$end_time',
                            '$_POST[link_man]',
                            '$_POST[link_email]',
                            '$_POST[link_phone]',
                            '0',
                            '1')";
            M()->exe($sql);
            /* 记录管理员操作 */
            admin_log($_POST['ad_name'], '添加', '广告');
            /* 提示信息 */
            $link[0]['text'] = '设置在模板中显示该广告位';
            $link[0]['href'] = 'template.php?act=setup';
        
            $link[1]['text'] = '返回广告列表';
            $link[1]['href'] = U('index',array('act'=>'list'));
        
            $link[2]['text'] = '继续添加广告';
            $link[2]['href'] = U('index',array('act'=>'add'));
            $this->sys_msg('添加' . "&nbsp;" .$_POST['ad_name'] . "&nbsp;" . '操作成功',0, $link);
            
        }
        /*------------------------------------------------------ */
        //-- 广告编辑页面
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit'){
            /* 获取广告数据 */
            $sql = "SELECT * FROM " .$ecs->table('ec_ad'). " WHERE ad_id='".intval($_REQUEST['id'])."'";
            $ads_arr = M()->getRowSql($sql);
            
            $ads_arr['ad_name'] = htmlspecialchars($ads_arr['ad_name']);
            /* 格式化广告的有效日期 */
            $ads_arr['start_time']  = local_date('Y-m-d', $ads_arr['start_time']);
            $ads_arr['end_time']    = local_date('Y-m-d', $ads_arr['end_time']);
            if ($ads_arr['media_type'] == '0'){
                if (strpos($ads_arr['ad_code'], 'http://') === false && strpos($ads_arr['ad_code'], 'https://') === false){
                    $src = __ROOT__ .'/'. EC_DATA_DIR . '/afficheimg/'. $ads_arr['ad_code'];
                    $this->assign('img_src', $src);
                }
                else
                {
                    $src = $ads_arr['ad_code'];
                    $this->assign('url_src', $src);
                }
            }
            if ($ads_arr['media_type'] == '1')
            {
                if (strpos($ads_arr['ad_code'], 'http://') === false && strpos($ads_arr['ad_code'], 'https://') === false)
                {
                    $src = __ROOT__ .'/'. EC_DATA_DIR . '/afficheimg/'. $ads_arr['ad_code'];
                    $this->assign('flash_src', $src);
                }
                else
                {
                    $src = $ads_arr['ad_code'];
                    $this->assign('flash_url', $src);
                }
                //$this->assign('src', $src);
            }
            if ($ads_arr['media_type'] == 0)
            {
                $this->assign('media_type', '图片');
            }
            elseif ($ads_arr['media_type'] == 1)
            {
                $this->assign('media_type', 'Flash');
            }
            elseif ($ads_arr['media_type'] == 2)
            {
                $this->assign('media_type', '代码');
            }
            elseif ($ads_arr['media_type'] == 3)
            {
                $this->assign('media_type', '文字');
            }
            $this->assign('ur_here',       '编辑广告');
            $this->assign('action_link',   array('href' => U('index',array('act'=>'list')), 'text' => '广告列表'));
            $this->assign('form_act',      'update');
            $this->assign('action',        'edit');
            $this->assign('position_list', get_position_list());
            $this->assign('ads',           $ads_arr);
            $this->display('ads_info.htm');
        }
        /*------------------------------------------------------ */
        //-- 广告编辑的处理
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'update'){
            /* 初始化变量 */
            $id   = !empty($_POST['id'])   ? intval($_POST['id'])   : 0;
            $type = !empty($_POST['media_type']) ? intval($_POST['media_type']) : 0;
            if ($_POST['media_type'] == '0')
            {
                $ad_link = !empty($_POST['ad_link']) ? trim($_POST['ad_link']) : '';
            }
            else
            {
                $ad_link = !empty($_POST['ad_link2']) ? trim($_POST['ad_link2']) : '';
            }
            /* 获得广告的开始时期与结束日期 */
            $start_time = local_strtotime($_POST['start_time']);
            $end_time   = local_strtotime($_POST['end_time']);
            /* 编辑图片类型的广告 */
            if ($type == 0)
            {
                if ((isset($_FILES['ad_img']['error']) && $_FILES['ad_img']['error'] == 0) || (!isset($_FILES['ad_img']['error']) && isset($_FILES['ad_img']['tmp_name']) && $_FILES['ad_img']['tmp_name'] != 'none'))
                {
                    $img_up_info = basename($image->upload_image($_FILES['ad_img'], 'afficheimg'));
                    $ad_code = "ad_code = '".$img_up_info."'".',';
                }
                else
                {
                    $ad_code = '';
                }
                if (!empty($_POST['img_url']))
                {
                    $ad_code = "ad_code = '$_POST[img_url]', ";
                }
            }
            /* 如果是编辑Flash广告 */
            elseif ($type == 1){
                if ((isset($_FILES['upfile_flash']['error']) && $_FILES['upfile_flash']['error'] == 0) || (!isset($_FILES['upfile_flash']['error']) && isset($_FILES['upfile_flash']['tmp_name']) && $_FILES['upfile_flash']['tmp_name'] != 'none'))
                {
                    /* 检查文件类型 */
                    if ($_FILES['upfile_flash']['type'] != "application/x-shockwave-flash")
                    {
                        $link[] = array('text' => '返回', 'href' => 'javascript:history.back(-1)');
                        $this->sys_msg('上传的Flash文件类型不正确!', 0, $link);
                    }
                    /* 生成文件名 */
                    $urlstr = date('Ymd');
                    for ($i = 0; $i < 6; $i++)
                    {
                        $urlstr .= chr(mt_rand(97, 122));
                    }
        
                    $source_file = $_FILES['upfile_flash']['tmp_name'];
                    $target      = ROOT_PATH . EC_DATA_DIR . '/afficheimg/';
                    $file_name   = $urlstr .'.swf';
        
                    if (!move_upload_file($source_file, $target.$file_name))
                    {
                        $link[] = array('text' => '返回', 'href' => 'javascript:history.back(-1)');
                        $this->sys_msg('文件上传失败', 0, $link);
                    }
                    else
                    {
                        $ad_code = "ad_code = '$file_name', ";
                    }
                }
                elseif (!empty($_POST['flash_url']))
                {
                    if (substr(strtolower($_POST['flash_url']), strlen($_POST['flash_url']) - 4) != '.swf')
                    {
                        $link[] = array('text' => '返回', 'href' => 'javascript:history.back(-1)');
                        $this->sys_msg('上传的Flash文件类型不正确!', 0, $link);
                    }
                    $ad_code = "ad_code = '".$_POST['flash_url']."', ";
                }
                else
                {
                    $ad_code = '';
                }
            }
            /* 编辑代码类型的广告 */
            elseif ($type == 2)
            {
                $ad_code = "ad_code = '$_POST[ad_code]', ";
            }
        
            /* 编辑文本类型的广告 */
            if ($type == 3)
            {
                $ad_code = "ad_code = '$_POST[ad_text]', ";
            }
            
            $ad_code = str_replace(ROOT_PATH . EC_DATA_DIR . '/afficheimg/', '', $ad_code);
            /* 更新信息 */
            $sql = "UPDATE " .$ecs->table('ec_ad'). " SET ".
                    "position_id = '$_POST[position_id]', ".
                    "ad_name     = '$_POST[ad_name]', ".
                    "ad_link     = '$ad_link', ".
                    $ad_code.
                    "start_time  = '$start_time', ".
                    "end_time    = '$end_time', ".
                    "link_man    = '$_POST[link_man]', ".
                    "link_email  = '$_POST[link_email]', ".
                    "link_phone  = '$_POST[link_phone]', ".
                    "enabled     = '$_POST[enabled]' ".
                    "WHERE ad_id = '$id'";
             M()->exe($sql);
             /* 记录管理员操作 */
            admin_log($_POST['ad_name'], '编辑', '广告');
            /* 提示信息 */
            $href[] = array('text' => '返回广告列表', 'href' => U('index',array('act'=>'list')));
            $this->sys_msg('编辑' .' '.$_POST['ad_name'].' '. '操作成功', 0, $href);
        }
        /*------------------------------------------------------ */
        //--生成广告的JS代码
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'add_js')
        {
        
            /* 编码 */
            $lang_list = array(
                'UTF8'   => '国际化编码（utf8）',
                'GB2312' => '简体中文',
                'BIG5'   => '繁体中文',
            );
        
            $js_code  = "<script type=".'"'."text/javascript".'"';
            $js_code .= ' src='.'"'.$ecs->url().'affiche.php?act=js&type='.$_REQUEST['type'].'&ad_id='.intval($_REQUEST['id']).'"'.'></script>';
        
            $site_url = $ecs->url().'affiche.php?act=js&type='.$_REQUEST['type'].'&ad_id='.intval($_REQUEST['id']);
        
            $this->assign('ur_here',     '生成并复制JS代码');
            $this->assign('action_link', array('href' => U('index',array('act'=>'list')), 'text' => '广告列表'));
            $this->assign('url',         $site_url);
            $this->assign('js_code',     $js_code);
            $this->assign('lang_list',   $lang_list);
        
            $this->display('ads_js.htm');
        }
        /*------------------------------------------------------ */
        //-- 编辑广告名称
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_ad_name'){
            $id      = intval($_POST['id']);
            $ad_name = json_str_iconv(trim($_POST['val']));
            /* 检查广告名称是否重复 */
            if ($exc->num('ad_name', $ad_name, $id) != 0){
                make_json_error(sprintf('该广告名称已经存在!', $ad_name));
            }
            else{
                if ($exc->edit("ad_name = '$ad_name'", $id)){
                    admin_log($ad_name,'编辑','广告');
                    make_json_result(stripslashes($ad_name));
                }else{
                    make_json_error('数据库操作失败');
                }
            }
        }
        /*------------------------------------------------------ */
        //-- 删除广告位置
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove')
        {
        
            $id = intval($_GET['id']);
            $img = $exc->get_name($id, 'ad_code');
        
            $exc->drop($id);
        
            if ((strpos($img, 'http://') === false) && (strpos($img, 'https://') === false) && get_file_suffix($img, $allow_suffix))
            {
                $img_name = basename($img);
                @unlink(ROOT_PATH. EC_DATA_DIR . '/afficheimg/'.$img_name);
            }
        
            admin_log('', '移除', '广告');
        
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
            exit;
        }

    }
    
    
    /* 获取广告数据列表 */
    public function get_adslist(){
        /* 过滤查询 */
        $pid = !empty($_REQUEST['pid']) ? intval($_REQUEST['pid']) : 0;
        $filter = array();
        $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'ad.ad_name' : trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
        
        $where = 'WHERE 1 ';
        if ($pid > 0)
        {
            $where .= " AND ad.position_id = '$pid' ";
        }
        
        
        /* 获得总记录数据 */
        $sql = 'SELECT COUNT(*) FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_ad'). ' AS ad ' . $where;
        $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
        
        $filter = page_and_size($filter);
        
        /* 获得广告数据 */
        $arr = array();
        $sql = 'SELECT ad.*, COUNT(o.order_id) AS ad_stats, p.position_name '.
                'FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_ad'). 'AS ad ' .
                'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_ad_position'). ' AS p ON p.position_id = ad.position_id '.
                'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_order_info'). " AS o ON o.from_ad = ad.ad_id $where " .
                'GROUP BY ad.ad_id '.
                'ORDER by '.$filter['sort_by'].' '.$filter['sort_order'];
                
        $res = M()->selectLimit($sql, $filter['page_size'], $filter['start']);
        if(!empty($res)){
            foreach($res as $rows){
                /* 广告类型的名称 */
                $rows['type']  = ($rows['media_type'] == 0) ? '图片'   : '';
                $rows['type'] .= ($rows['media_type'] == 1) ? 'Flash' : '';
                $rows['type'] .= ($rows['media_type'] == 2) ? '代码'  : '';
                $rows['type'] .= ($rows['media_type'] == 3) ? '文字'  : '';
                /* 格式化日期 */
                $rows['start_date']    = local_date(C('ec_date_format'), $rows['start_time']);
                $rows['end_date']      = local_date(C('ec_date_format'), $rows['end_time']);
                
                $arr[] = $rows;
         
            }
        }
        return array(
                    'ads' => $arr, 
                    'filter' => $filter, 
                    'page_count' => $filter['page_count'], 
                    'record_count' => $filter['record_count']);
        
    }

	
    
    
}
