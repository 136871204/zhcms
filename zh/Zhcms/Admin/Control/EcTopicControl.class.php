<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcTopicControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	   $ecs=$GLOBALS['ec_globals']['ecs'];
	    /*
	    $image = new EcImage(C('ec_bgcolor'));
	    $tdb=M();
        $exc = new exchange($ecs->table("ec_pack"), $tdb, 'pack_id', 'pack_name');*/
          
        
        /* act操作项的初始化 */
        if (empty($_REQUEST['act']))
        {
            $_REQUEST['act'] = 'list';
        }
        else
        {
            $_REQUEST['act'] = trim($_REQUEST['act']);
        }
        /* 配置风格颜色选项 */
        $topic_style_color = array(
                                '0'         => '008080',
                                '1'         => '008000',
                                '2'         => 'ffa500',
                                '3'         => 'ff0000',
                                '4'         => 'ffff00',
                                '5'         => '9acd32',
                                '6'         => 'ffd700'
                                  );
        $allow_suffix = array('gif', 'jpg', 'png', 'jpeg', 'bmp', 'swf');
        /*------------------------------------------------------ */
        //-- 专题列表页面
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'list')
        {
            $this->assign('ur_here',     '专题管理');
        
            $this->assign('full_page',   1);
            $list = $this-> get_topic_list();
        
            $this->assign('topic_list',   $list['item']);
            $this->assign('filter',       $list['filter']);
            $this->assign('record_count', $list['record_count']);
            $this->assign('page_count',   $list['page_count']);
        
            $sort_flag  = sort_flag($list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            //assign_query_info();
            $this->assign('action_link', array('text' => '添加专题', 'href' => U('index',array('act'=>'add'))));
            $this->display('topic_list.htm');
        }
        /* 添加,编辑 */
        if ($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit')
        {
            $isadd     = $_REQUEST['act'] == 'add';
            $this->assign('isadd', $isadd);
            $topic_id  = empty($_REQUEST['topic_id']) ? 0 : intval($_REQUEST['topic_id']);
            
            $this->assign('ur_here',     '专题管理');
            $this->assign('action_link', $this->list_link($isadd));
            
            $this->assign('cat_list',   cat_list(0, 1));
            $this->assign('brand_list', get_brand_list());
            $this->assign('cfg_lang',   session('language'));
            $this->assign('topic_style_color',   $topic_style_color);
            
            $width_height = $this->get_toppic_width_height();
            
            if(isset($width_height['pic']['width']) && isset($width_height['pic']['height']))
            {
                $this->assign('width_height', sprintf('此模板的图片标准宽度为：%s 标准高度为：%s', $width_height['pic']['width'], $width_height['pic']['height']));
            }
            if(isset($width_height['title_pic']['width']) && isset($width_height['title_pic']['height']))
            {
                $this->assign('title_width_height', sprintf('此模板的图片标准宽度为：%s 标准高度为：%s', $width_height['title_pic']['width'], $width_height['title_pic']['height']));
            }
            if (!$isadd)
            {
                $sql = "SELECT * FROM " . $ecs->table('ec_topic') . " WHERE topic_id = '$topic_id'";
                $topic = M()->getRowSql($sql);
                $topic['start_time'] = local_date('Y-m-d', $topic['start_time']);
                $topic['end_time']   = local_date('Y-m-d', $topic['end_time']);
                
                $json          = new JSON;
                $topic['data'] = addcslashes($topic['data'], "'");
                $topic['data'] = $json->encode(@unserialize($topic['data']));
                $topic['data'] = addcslashes($topic['data'], "'");
                
                if (empty($topic['topic_img']) && empty($topic['htmls']))
                {
                    $topic['topic_type'] = 0;
                }
                elseif ($topic['htmls'] != '')
                {
                    $topic['topic_type'] = 2;
                }
                elseif (preg_match('/.swf$/i', $topic['topic_img']))
                {
                    $topic['topic_type'] = 1;
                }
                else
                {
                    $topic['topic_type'] = '';
                }
        
                $this->assign('topic', $topic);
                $this->assign('act',   "update");
            }
            else
            {
                $topic = array('title' => '', 'topic_type' => 0, 'url' => 'http://');
                $this->assign('topic', $topic);
        
                //create_html_editor('topic_intro');
                $this->assign('act', "insert");
            }
            $this->display('topic_edit.htm');
            
        }
        elseif ($_REQUEST['act'] == 'insert' || $_REQUEST['act'] == 'update')
        {
            $is_insert = $_REQUEST['act'] == 'insert';
            $topic_id  = empty($_POST['topic_id']) ? 0 : intval($_POST['topic_id']);
            $topic_type= empty($_POST['topic_type']) ? 0 : intval($_POST['topic_type']);
            switch ($topic_type)
            {
                case '0':
                case '1':
                    // 主图上传
                    if ($_FILES['topic_img']['name'] && $_FILES['topic_img']['size'] > 0)
                    {
                        /* 检查文件合法性 */
                        if(!get_file_suffix($_FILES['topic_img']['name'], $allow_suffix))
                        {
                            $this->sys_msg('您上传的图片格式不正确！');
                        }
                        /* 处理 */
                        $name = date('Ymd');
                        for ($i = 0; $i < 6; $i++)
                        {
                            $name .= chr(mt_rand(97, 122));
                        }
                        $name .= '.' . end(explode('.', $_FILES['topic_img']['name']));
                        $target = ROOT_PATH . EC_DATA_DIR . '/afficheimg/' . $name;
                        if (move_upload_file($_FILES['topic_img']['tmp_name'], $target))
                        {
                            $topic_img = EC_DATA_DIR . '/afficheimg/' . $name;
                        }
                    }
                    else if (!empty($_REQUEST['url']))
                    {
                        /* 来自互联网图片 不可以是服务器地址 */
                        if(strstr($_REQUEST['url'], 'http') && !strstr($_REQUEST['url'], $_SERVER['SERVER_NAME']))
                        {
                            /* 取互联网图片至本地 */
                            $topic_img = $this->get_url_image($_REQUEST['url']);
                        }
                        else{
                            $this->sys_msg('远程地址错误。请填写完整的 URL 地址！');
                        }
                    }
                    unset($name, $target);

                    $topic_img = empty($topic_img) ? $_POST['img_url'] : $topic_img;
                    $htmls = '';
                break;
                case '2':
                    $htmls     = $_POST['htmls'];
                    $topic_img = '';
                break;
            }
            
            // 标题图上传
            if ($_FILES['title_pic']['name'] && $_FILES['title_pic']['size'] > 0)
            {
                /* 检查文件合法性 */
                if(!get_file_suffix($_FILES['title_pic']['name'], $allow_suffix))
                {
                    $this->sys_msg('您上传的图片格式不正确！');
                }
                
                /* 处理 */
                $name = date('Ymd');
                for ($i = 0; $i < 6; $i++)
                {
                    $name .= chr(mt_rand(97, 122));
                }
                $name .= '.' . end(explode('.', $_FILES['title_pic']['name']));
                $target = ROOT_PATH . EC_DATA_DIR . '/afficheimg/' . $name;
                
                if (move_upload_file($_FILES['title_pic']['tmp_name'], $target))
                {
                    $title_pic = EC_DATA_DIR . '/afficheimg/' . $name;
                }
            }
            else if (!empty($_REQUEST['title_url']))
            {
                /* 来自互联网图片 不可以是服务器地址 */
                if(strstr($_REQUEST['title_url'], 'http') && !strstr($_REQUEST['title_url'], $_SERVER['SERVER_NAME']))
                {
                    /* 取互联网图片至本地 */
                    $title_pic = $this->get_url_image($_REQUEST['title_url']);
                }
                else{
                    $this->sys_msg('远程地址错误。请填写完整的 URL 地址！');
                }
            }
            unset($name, $target);
            
            $title_pic = empty($title_pic) ? $_POST['title_img_url'] : $title_pic;
            
            $start_time = local_strtotime($_POST['start_time']);
            $end_time   = local_strtotime($_POST['end_time']);
            
            $json       = new JSON;
            //p($_POST['topic_data']);
            $tmp_data   = $json->decode($_POST['topic_data']);
            $data       = serialize($tmp_data);
            $base_style = $_POST['base_style'];
            $keywords   = $_POST['keywords'];
            $description= $_POST['description'];
    
    
            $topic_intro= isset($_POST['topic_intro']) ? $_POST['topic_intro'] : '';
            
            //header("Content-type:text/html;charset=utf-8");
            if ($is_insert)
            {
                $sql = "INSERT INTO " . $ecs->table('ec_topic') . " (title,start_time,end_time,data,intro,template,css,topic_img,title_pic,base_style, htmls,keywords,description)" .
                        "VALUES ('$_POST[topic_name]','$start_time','$end_time','$data','$topic_intro','$_POST[topic_template_file]','$_POST[topic_css]', '$topic_img', '$title_pic', '$base_style', '$htmls','$keywords','$description')";
            }
            else
            {
                $sql = "UPDATE " . $ecs->table('ec_topic') .
                        "SET title='$_POST[topic_name]',start_time='$start_time',end_time='$end_time',data='$data',intro='$topic_intro',template='$_POST[topic_template_file]',css='$_POST[topic_css]', topic_img='$topic_img', title_pic='$title_pic', base_style='$base_style', htmls='$htmls', keywords='$keywords', description='$description'" .
                       " WHERE topic_id='$topic_id' LIMIT 1";
            }
            //echo $sql;die;
            M()->exe($sql);
            clear_cache_files();

            $links[] = array('href' => U('index'), 'text' =>  '返回列表');   
            $this->sys_msg('操作成功!', 0, $links);
    
        }
        elseif ($_REQUEST['act'] == 'get_goods_list')
        {
            $json = new JSON;
        
            $filters = $json->decode($_GET['JSON']);
        
            $arr = get_goods_list($filters);
            $opt = array();
        
            foreach ($arr AS $key => $val)
            {
                $opt[] = array('value' => $val['goods_id'],
                               'text'  => $val['goods_name']);
            }
        
            make_json_result($opt);
        }
        elseif ($_REQUEST["act"] == "delete")
        {
            $sql = "DELETE FROM " . $ecs->table('ec_topic') . " WHERE ";
            if (!empty($_POST['checkboxs']))
            {
                $sql .= db_create_in($_POST['checkboxs'], 'topic_id');
            }
            elseif (!empty($_GET['id']))
            {
                $_GET['id'] = intval($_GET['id']);
                $sql .= "topic_id = '$_GET[id]'";
            }
            else
            {
                exit;
            }
            M()->exe($sql);

            clear_cache_files();
            if (!empty($_REQUEST['is_ajax']))
            {
                $url = 'index.php?act=query&' . str_replace('act=delete', '', $_SERVER['QUERY_STRING']);
                ec_header("Location: $url\n");
                exit;
            }
            $links[] = array('href' => U('index'), 'text' =>  '返回列表');
            $this->sys_msg('操作成功!', 0, $links);
        }
        elseif ($_REQUEST["act"] == "query")
        {
            $topic_list = $this->get_topic_list();
            $this->assign('topic_list',   $topic_list['item']);
            $this->assign('filter',       $topic_list['filter']);
            $this->assign('record_count', $topic_list['record_count']);
            $this->assign('page_count',   $topic_list['page_count']);
            $ec_use_storage=C('ec_use_storage');
            $this->assign('use_storage',  empty($ec_use_storage) ? 0 : 1);
        
            /* 排序标记 */
            $sort_flag  = sort_flag($topic_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            $tpl = 'topic_list.htm';
            make_json_result($this->fetch($tpl), '',array('filter' => $topic_list['filter'], 'page_count' => $topic_list['page_count']));
        }
	}
    
    
    
        
    /**
     * 获取专题列表
     * @access  public
     * @return void
     */
    public function get_topic_list()
    {
        $result = get_filter();
        if ($result === false)
        {
            /* 查询条件 */
            $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'topic_id' : trim($_REQUEST['sort_by']);
            $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
    
            $sql = "SELECT COUNT(*) FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_topic');
            $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
    
            /* 分页大小 */
            $filter = page_and_size($filter);
    
            $sql = "SELECT * FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_topic'). " ORDER BY $filter[sort_by] $filter[sort_order]";
    
            set_filter($filter, $sql);
        }
        else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        $query = M()->selectLimit($sql, $filter['page_size'], $filter['start']);
        $res = array();
        if(!empty($query))
        {
            foreach($query as $topic) 
            {
                $topic['start_time'] = local_date('Y-m-d',$topic['start_time']);
                $topic['end_time']   = local_date('Y-m-d',$topic['end_time']);
                $topic['url']        = $GLOBALS['ec_globals']['ecs']->url() . 'topic.php?topic_id=' . $topic['topic_id'];
                $res[] = $topic;
            }  
        }
        $arr = array('item' => $res, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);

        return $arr;
    }

    
    
    
    /**
     * 列表链接
     * @param   bool    $is_add     是否添加（插入）
     * @param   string  $text       文字
     * @return  array('href' => $href, 'text' => $text)
     */
    public function list_link($is_add = true, $text = '')
    {
        $href = U('index',array('act'=>'list'));
        if (!$is_add)
        {
            $href .= '&' . list_link_postfix();
        }
        if ($text == '')
        {
            $text = '专题列表';
        }
    
        return array('href' => $href, 'text' => $text);
    }
    
    public function get_toppic_width_height()
    {
        $width_height = array();
        $file_path = ROOT_PATH . 'template/' . C('WEB_STYLE') . '/topic.dwt';
        if (!file_exists($file_path) || !is_readable($file_path))
        {
            return $width_height;
        }
        
        $pattern_width = '/var\s*topic_width\s*=\s*"(\d+)";/';
        $pattern_height = '/var\s*topic_height\s*=\s*"(\d+)";/';
        preg_match($pattern_width, $string, $width);
        preg_match($pattern_height, $string, $height);
        if(isset($width[1]))
        {
            $width_height['pic']['width'] = $width[1];
        }
        if(isset($height[1]))
        {
            $width_height['pic']['height'] = $height[1];
        }
        unset($width, $height);
        
        $pattern_width = '/TitlePicWidth:\s{1}(\d+)/';
        $pattern_height = '/TitlePicHeight:\s{1}(\d+)/';
        preg_match($pattern_width, $string, $width);
        preg_match($pattern_height, $string, $height);
        if(isset($width[1]))
        {
            $width_height['title_pic']['width'] = $width[1];
        }
        if(isset($height[1]))
        {
            $width_height['title_pic']['height'] = $height[1];
        }
        
        return $width_height;
    }
	
    public function get_url_image($url)
    {
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
    
}
