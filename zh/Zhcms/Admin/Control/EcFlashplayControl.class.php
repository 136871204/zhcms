<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcFlashplayControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
        $uri = $ecs->url();
        $allow_suffix = array('gif', 'jpg', 'png', 'jpeg', 'bmp');
        /*------------------------------------------------------ */
        //-- 系统
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'list'){
            $playerdb = $this->get_flash_xml();
            foreach ($playerdb as $key => $val)
            {
                if (strpos($val['src'], 'http') === false)
                {
                    $playerdb[$key]['src'] = $uri . $val['src'];
                }
            }
            /* 标签初始化 */
            $group_list = array(
                'sys' => array('text' => L('admin_ecflashplay_control_index_list1'), 'url' => ''),
                //'cus' => array('text' => '自定义', 'url' => U('index',array('act'=>'custom_list')))
                               );
            $flash_dir = ROOT_PATH . 'data/flashdata/';
            $this->assign('current', 'sys');
            $this->assign('group_list', $group_list);
            //$this->assign('group_selected', $_CFG['index_ad']);
            $this->assign('uri', $uri);
            $this->assign('ur_here', L('admin_ecflashplay_control_index_list2'));
            $this->assign('action_link_special', array('text' => L('admin_ecflashplay_common3'), 'href' => U('index',array('act'=>'add'))));
            $this->assign('flashtpls', $this->get_flash_templates($flash_dir));
            $this->assign('current_flashtpl', C('ec_flash_theme'));
            $this->assign('playerdb', $playerdb);
            $this->display('flashplay_list.htm');
        }elseif($_REQUEST['act']== 'del'){
            $id = (int)$_GET['id'];
            $flashdb = $this->get_flash_xml();
            if (isset($flashdb[$id])){
                $rt = $flashdb[$id];
            }else{
                $links[] = array('text' => L('admin_ecflashplay_common1'), 'href' => U('index',array('act'=>'list')));
                $this->sys_msg(L('admin_ecflashplay_common2'), 0, $links);
            }
            if (strpos($rt['src'], 'http') === false)
            {
                @unlink(ROOT_PATH . $rt['src']);
            }
            $temp = array();
            foreach ($flashdb as $key => $val)
            {
                if ($key != $id)
                {
                    $temp[] = $val;
                }
            }
            $this->put_flash_xml($temp);
            ec_header("Location: ".U('index',array('act'=>'list'))."\n");
            exit;
        }
        elseif ($_REQUEST['act'] == 'add'){
            //p($_POST);die;
            if (empty($_POST['step'])){
                $url = isset($_GET['url']) ? $_GET['url'] : 'http://';
                $src = isset($_GET['src']) ? $_GET['src'] : '';
                $sort = 0;
                $rt = array('act'=>'add','img_url'=>$url,'img_src'=>$src, 'img_sort'=>$sort);
                $width_height = $this->get_width_height();
                if(isset($width_height['width'])|| isset($width_height['height']))
                {
                    $this->assign('width_height', sprintf(L('admin_ecflashplay_control_index_add1'), $width_height['width'], $width_height['height']));
                }
                $this->assign('action_link', array('text' => L('admin_ecflashplay_common1'), 'href' => U('index',array('act'=>'list'))));
                $this->assign('rt', $rt);
                $this->assign('ur_here', L('admin_ecflashplay_control_index_add2'));
                $this->display('flashplay_add.htm');
            }elseif ($_POST['step'] == 2){
                //p($_SERVER['SERVER_NAME']);die;
                if (!empty($_FILES['img_file_src']['name']))
                {
                    if(!get_file_suffix($_FILES['img_file_src']['name'], $allow_suffix)){
                        $this->sys_msg(L('admin_ecflashplay_common4'));
                    }
                    //有上传
                    $name = date('Ymd');
                    for ($i = 0; $i < 6; $i++)
                    {
                        $name .= chr(mt_rand(97, 122));
                    }
                    $name .= '.' . end(explode('.', $_FILES['img_file_src']['name']));
                    $target = ROOT_PATH . EC_DATA_DIR . '/afficheimg/' . $name;
                    if (move_upload_file($_FILES['img_file_src']['tmp_name'], $target))
                    {
                        $src = EC_DATA_DIR . '/afficheimg/' . $name;
                    }
                }
                elseif (!empty($_POST['img_src']))
                {
                    if(!get_file_suffix($_POST['img_src'], $allow_suffix))
                    {
                        $this->sys_msg(L('admin_ecflashplay_common4'));
                    }
                    $src = $_POST['img_src'];
                    if(strstr($src, 'http') && !strstr($src, $_SERVER['SERVER_NAME']))
                    {
                        $src = $this->get_url_image($src);
                    }
                }else{
                    $links[] = array('text' => L('admin_ecflashplay_common3'), 'href' =>U('index',array('act'=>'add')));
                    $this->sys_msg(L('admin_ecflashplay_control_index_add3'), 0, $links);
                }
                
                if (empty($_POST['img_url']))
                {
                    $links[] = array('text' => L('admin_ecflashplay_common3'), 'href' => U('index',array('act'=>'add')));
                    $this->sys_msg(L('admin_ecflashplay_common5'), 0, $links);
                }
                // 获取flash播放器数据
                $flashdb = $this->get_flash_xml();
                // 插入新数据
                array_unshift($flashdb, array('src'=>$src, 'url'=>$_POST['img_url'], 'text'=>$_POST['img_text'] ,'sort'=>$_POST['img_sort']));
                // 实现排序
                $flashdb_sort   = array();
                $_flashdb       = array();
                foreach ($flashdb as $key => $value)
                {
                    $flashdb_sort[$key] = $value['sort'];
                }
                asort($flashdb_sort, SORT_NUMERIC);
                foreach ($flashdb_sort as $key => $value)
                {
                    $_flashdb[] = $flashdb[$key];
                }
                unset($flashdb, $flashdb_sort);
                $this->put_flash_xml($_flashdb);
                //set_flash_data($_CFG['flash_theme'], $error_msg = '');
                $links[] = array('text' => L('admin_ecflashplay_common1'), 'href' => U('index',array('act'=>'list')));
                $this->sys_msg(L('admin_eccommon_op_ok'), 0, $links);
                
            }
        }elseif ($_REQUEST['act'] == 'edit'){
            $id = (int)$_REQUEST['id']; //取得id
            $flashdb = $this->get_flash_xml(); //取得数据
            if (isset($flashdb[$id]))
            {
                $rt = $flashdb[$id];
            }
            else
            {
                $links[] = array('text' => L('admin_ecflashplay_common1'), 'href' => U('index',array('act'=>'list')));
                $this->sys_msg(L('admin_ecflashplay_common2'), 0, $links);
            }
            if (empty($_POST['step'])){
                $rt['act'] = 'edit';
                $rt['img_url'] = $rt['url'];
                $rt['img_src'] = $rt['src'];
                $rt['img_txt'] = $rt['text'];
                $rt['img_sort'] = empty($rt['sort']) ? 0 : $rt['sort'];
                
                $rt['id'] = $id;
                $this->assign('action_link', array('text' => L('admin_ecflashplay_common1'), 'href' => U('index',array('act'=>'list'))));
                $this->assign('rt', $rt);
                $this->assign('ur_here', L('admin_ecflashplay_control_index_edit1'));
                $this->display('flashplay_add.htm');
            }elseif ($_POST['step'] == 2){
                if (empty($_POST['img_url']))
                {
                    //若链接地址为空
                    $links[] = array('text' => L('admin_ecflashplay_common6'), 'href' => U('index',array('act'=>'edit','id'=>$id)));
                    $this->sys_msg(L('admin_ecflashplay_common5'), 0, $links);
                }
                if (!empty($_FILES['img_file_src']['name'])){
                    if(!get_file_suffix($_FILES['img_file_src']['name'], $allow_suffix))
                    {
                        $this->sys_msg(L('admin_ecflashplay_common4'));
                    }
                    //有上传
                    $name = date('Ymd');
                    for ($i = 0; $i < 6; $i++)
                    {
                        $name .= chr(mt_rand(97, 122));
                    }
                    $name .= '.' . end(explode('.', $_FILES['img_file_src']['name']));
                    $target = ROOT_PATH . EC_DATA_DIR . '/afficheimg/' . $name;
                    if (move_upload_file($_FILES['img_file_src']['tmp_name'], $target))
                    {
                        $src = EC_DATA_DIR . '/afficheimg/' . $name;
                    }
                }else if (!empty($_POST['img_src'])){
                    $src =$_POST['img_src'];
                    if(!get_file_suffix($_POST['img_src'], $allow_suffix))
                    {
                        $this->sys_msg(L('admin_ecflashplay_common4'));
                    }
                    if(strstr($src, 'http') && !strstr($src, $_SERVER['SERVER_NAME']))
                    {
                        $src = $this->get_url_image($src);
                    }
                }else{
                    $links[] = array('text' => L('admin_ecflashplay_common6'), 'href' => U('index',array('act'=>'edit','id'=>$id)));
                    $this->sys_msg(L('admin_ecflashplay_control_index_edit2'), 0, $links);
                }
                if (strpos($rt['src'], 'http') === false && $rt['src'] != $src)
                {
                    @unlink(ROOT_PATH . $rt['src']);
                }
                $flashdb[$id] = array('src'=>$src,'url'=>$_POST['img_url'],'text'=>$_POST['img_text'],'sort'=>$_POST['img_sort']);
                // 实现排序
                $flashdb_sort   = array();
                $_flashdb       = array();
                foreach ($flashdb as $key => $value)
                {
                    $flashdb_sort[$key] = $value['sort'];
                }
                asort($flashdb_sort, SORT_NUMERIC);
                foreach ($flashdb_sort as $key => $value)
                {
                    $_flashdb[] = $flashdb[$key];
                }
                unset($flashdb, $flashdb_sort);
                $this->put_flash_xml($_flashdb);
                $links[] = array('text' => L('admin_ecflashplay_common1'), 'href' => U('index',array('act'=>'list')));
                $this->sys_msg(L('admin_eccommon_op_ok'), 0, $links);
            }
        }
        
        
        
        
	}
    
    
    public function put_flash_xml($flashdb)
    {
        if (!empty($flashdb))
        {
            $xml = '<?xml version="1.0" encoding="' . EC_CHARSET . '"?><bcaster>';
            foreach ($flashdb as $key => $val)
            {
                $xml .= '<item item_url="' . $val['src'] . '" link="' . $val['url'] . '" text="' . $val['text'] . '" sort="' . $val['sort'] . '"/>';
            }
            $xml .= '</bcaster>';
            file_put_contents(ROOT_PATH . EC_DATA_DIR . '/flash_data.xml', $xml);
        }
        else
        {
            @unlink(ROOT_PATH . EC_DATA_DIR . '/flash_data.xml');
        }
    }

    public function get_url_image($url){
        $ext = strtolower(end(explode('.', $url)));
        if($ext != "gif" && $ext != "jpg" && $ext != "png" && $ext != "bmp" && $ext != "jpeg")
        {
            return $url;
        }
        $name = date('Ymd');
        for ($i = 0; $i < 6; $i++)
        {
            $name .= chr(mt_rand(97, 122));
        }
        $name .= '.' . $ext;
        $target = ROOT_PATH . EC_DATA_DIR . '/afficheimg/' . $name;
        $tmp_file = EC_DATA_DIR . '/afficheimg/' . $name;
        $filename = ROOT_PATH . $tmp_file;
        $img = file_get_contents($url);
        $fp = @fopen($filename, "a");
        fwrite($fp, $img);
        fclose($fp);
    
        return $tmp_file;
    }
    
    public function get_width_height()
    {
        $curr_template = C('WEB_STYLE');
        $path = ROOT_PATH . 'template/' . $curr_template . '/ec/common/library/';
        //p($path);die;
        $template_dir = @opendir($path);
    
        $width_height = array();
        while($file = readdir($template_dir))
        {
            if($file == 'index_ad.lbi')
            {
                $string = file_get_contents($path . $file);
                $pattern_width = '/var\s*swf_width\s*=\s*(\d+);/';
                $pattern_height = '/var\s*swf_height\s*=\s*(\d+);/';
                preg_match($pattern_width, $string, $width);
                preg_match($pattern_height, $string, $height);
                if(isset($width[1]))
                {
                    $width_height['width'] = $width[1];
                }
                if(isset($height[1]))
                {
                    $width_height['height'] = $height[1];
                }
                break;
            }
        }
        //p($width_height);die;
        return $width_height;
    }
        
    public function get_flash_templates($dir)
    {
        $flashtpls = array();
        $template_dir        = @opendir($dir);
        while ($file = readdir($template_dir))
        {
            if ($file != '.' && $file != '..' && is_dir($dir . $file) && $file != '.svn' && $file != 'index.htm')
            {
                $flashtpls[] = $this->get_flash_tpl_info($dir, $file);
            }
        }
        @closedir($template_dir);
        //p($flashtpls);die;
        return $flashtpls;
    }
    
    public function get_flash_tpl_info($dir, $file)
    {
        $info = array();
        if (is_file($dir . $file . '/preview.jpg'))
        {
            $info['code'] = $file;
            $info['screenshot'] = __ROOT__.'/data/flashdata/' . $file . '/preview.jpg';
            $arr = array_slice(file($dir . $file . '/cycle_image.js'), 1, 2);
            $info_name = explode(':', $arr[0]);
            $info_desc = explode(':', $arr[1]);
            $info['name'] = isset($info_name[1])?trim($info_name[1]):'';
            $info['desc'] = isset($info_desc[1])?trim($info_desc[1]):'';
        }
        return $info;
    }

    
    public function get_flash_xml()
    {
        $flashdb = array();
        if (file_exists(ROOT_PATH . EC_DATA_DIR . '/flash_data.xml'))
        {
    
            // 兼容v2.7.0及以前版本
            if (!preg_match_all('/item_url="([^"]+)"\slink="([^"]+)"\stext="([^"]*)"\ssort="([^"]*)"/', file_get_contents(ROOT_PATH . EC_DATA_DIR . '/flash_data.xml'), $t, PREG_SET_ORDER))
            {
                preg_match_all('/item_url="([^"]+)"\slink="([^"]+)"\stext="([^"]*)"/', file_get_contents(ROOT_PATH . EC_DATA_DIR . '/flash_data.xml'), $t, PREG_SET_ORDER);
            }
    
            if (!empty($t))
            {
                foreach ($t as $key => $val)
                {
                    $val[4] = isset($val[4]) ? $val[4] : 0;
                    $flashdb[] = array('src'=>$val[1],'url'=>$val[2],'text'=>$val[3],'sort'=>$val[4]);
                }
            }
        }
        return $flashdb;
    }
    
	
    
    
}
