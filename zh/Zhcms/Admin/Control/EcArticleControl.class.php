<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcArticleControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    //$image = new EcImage(C('ec_bgcolor'));
	    $tdb=M();
        $exc = new exchange($ecs->table("ec_article"), $tdb, 'article_id', 'title');
        
        /* 允许上传的文件类型 */
        $allow_file_types = '|GIF|JPG|PNG|BMP|SWF|DOC|XLS|PPT|MID|WAV|ZIP|RAR|PDF|CHM|RM|TXT|';
        
        if ($_REQUEST['act'] == 'list'){
            /* 取得过滤条件 */
            $filter = array();
            $this->assign('cat_select',  article_cat_list(0));
            $this->assign('ur_here',      L('admin_ecarticle_common1'));
            $this->assign('action_link',  array('text' => L('admin_ecarticle_common2'), 'href' => U('index').'&act=add'));
            $this->assign('full_page',    1);
            $this->assign('filter',       $filter);
        
            $article_list = $this->get_articleslist();
        
            $this->assign('article_list',    $article_list['arr']);
            $this->assign('filter',          $article_list['filter']);
            $this->assign('record_count',    $article_list['record_count']);
            $this->assign('page_count',      $article_list['page_count']);
        
            $sort_flag  = sort_flag($article_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            //assign_query_info();
            $this->display('article_list.htm');
        }
        /*------------------------------------------------------ */
        //-- 翻页，排序
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query')
        {
        
            $article_list = $this->get_articleslist();
        
            $this->assign('article_list',    $article_list['arr']);
            $this->assign('filter',          $article_list['filter']);
            $this->assign('record_count',    $article_list['record_count']);
            $this->assign('page_count',      $article_list['page_count']);
        
            $sort_flag  = sort_flag($article_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('article_list.htm'), '',
                array('filter' => $article_list['filter'], 'page_count' => $article_list['page_count']));
        }
        
        
        /*------------------------------------------------------ */
        //-- 添加文章
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'add')
        {
            /*初始化*/
            $article = array();
            $article['is_open'] = 1;
            
            /* 取得分类、品牌 */
            $this->assign('goods_cat_list', cat_list());
            $this->assign('brand_list',     get_brand_list());
            
            /* 清理关联商品 */
            $sql = "DELETE FROM " . $ecs->table('ec_goods_article') . " WHERE article_id = 0";
            M()->exe($sql);
            
            if (isset($_GET['id']))
            {
                $this->assign('cur_id',  $_GET['id']);
            }
            $this->assign('article',     $article);
            $this->assign('cat_select',  article_cat_list(0));
            $this->assign('ur_here',     L('admin_ecarticle_common2'));
            $this->assign('action_link', array('text' => L('admin_ecarticle_common1'), 'href' => U('index').'&act=list'));
            $this->assign('form_action', 'insert');
        
            //assign_query_info();
            $this->display('article_info.htm');
            
        }
        
        /*------------------------------------------------------ */
        //-- 添加文章
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'insert')
        {
            /*检查是否重复*/
            $is_only = $exc->is_only('title', $_POST['title'],0, " cat_id ='$_POST[article_cat]'");
        
            if (!$is_only)
            {
                $this->sys_msg(sprintf(L('admin_ecarticle_common3'), stripslashes($_POST['title'])), 1);
            }
            /* 取得文件地址 */
            $file_url = '';
            if ((isset($_FILES['file']['error']) && $_FILES['file']['error'] == 0) || (!isset($_FILES['file']['error']) && isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != 'none'))
            {
                // 检查文件格式
                if (!check_file_type($_FILES['file']['tmp_name'], $_FILES['file']['name'], $allow_file_types))
                {
                    $this->sys_msg(L('admin_ecarticle_common4'));
                }
        
                // 复制文件
                $res = $this -> upload_article_file($_FILES['file']);
                if ($res != false)
                {
                    $file_url = $res;
                }
            }
            if ($file_url == '')
            {
                $file_url = $_POST['file_url'];
            }
            
            /* 计算文章打开方式 */
            if ($file_url == '')
            {
                $open_type = 0;
            }
            else
            {
                $open_type = $_POST['FCKeditor1'] == '' ? 1 : 2;
            }
            /*插入数据*/
            $add_time = gmtime();
            if (empty($_POST['cat_id']))
            {
                $_POST['cat_id'] = 0;
            }
            $temp_desc= isset($_POST['FCKeditor1']) ? $_POST['FCKeditor1'] : '';
            
            $sql = "INSERT INTO ".$ecs->table('ec_article')."(title, cat_id, article_type, is_open, author, ".
                        "author_email, keywords, content, add_time, file_url, open_type, link, description) ".
                    "VALUES ('$_POST[title]', '$_POST[article_cat]', '$_POST[article_type]', '$_POST[is_open]', ".
                        "'$_POST[author]', '$_POST[author_email]', '$_POST[keywords]', '$temp_desc', ".
                        "'$add_time', '$file_url', '$open_type', '$_POST[link_url]', '$_POST[description]')";
            //echo $sql;die;
            $insert_id=M()->exe($sql);
            
            
            /* 处理关联商品 */
            $article_id = $insert_id;
            $sql = "UPDATE " . $ecs->table('ec_goods_article') . " SET article_id = '$article_id' WHERE article_id = 0";
            M()->exe($sql);
    
            $link[0]['text'] = L('admin_ecarticle_control_index_insert1');
            $link[0]['href'] = U('index').'&act=add';
        
            $link[1]['text'] = L('admin_ecarticle_common5');
            $link[1]['href'] = U('index').'&act=list';
        
            admin_log($_POST['title'],L('admin_ecarticle_control_index_insert2'),L('admin_ecarticle_control_index_insert3'));
            clear_cache_files(); // 清除相关的缓存文件

            $this->sys_msg(L('admin_ecarticle_control_index_insert4'),0, $link);

    

            
        }
        /*------------------------------------------------------ */
        //-- 编辑
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'edit')
        {
            /* 取文章数据 */
            $sql = "SELECT * FROM " .$ecs->table('ec_article'). " WHERE article_id='$_REQUEST[id]'";
            $article = M()->GetRowSql($sql);
            
            /* 取得分类、品牌 */
            $this->assign('goods_cat_list', cat_list());
            $this->assign('brand_list', get_brand_list());
            
            /* 取得关联商品 */
            $goods_list = $this -> get_article_goods($_REQUEST['id']);
            $this->assign('goods_list', $goods_list);
        
            $this->assign('article',     $article);
            $this->assign('cat_select',  article_cat_list(0, $article['cat_id']));
            $this->assign('ur_here',     L('admin_ecarticle_control_index_edit1'));
            $this->assign('action_link', array('text' => L('admin_ecarticle_common1'), 'href' => U('index').'&act=list&' . list_link_postfix()));
            $this->assign('form_action', 'update');
        
            //assign_query_info();
            $this->display('article_info.htm');


        }

        if ($_REQUEST['act'] =='update')
        {
            /*检查文章名是否相同*/
            $is_only = $exc->is_only('title', $_POST['title'], $_POST['id'], "cat_id = '$_POST[article_cat]'");
        
            if (!$is_only)
            {
                $this->sys_msg(sprintf(L('admin_ecarticle_common3'), stripslashes($_POST['title'])), 1);
            }
            
            if (empty($_POST['cat_id']))
            {
                $_POST['cat_id'] = 0;
            }
            /* 取得文件地址 */
            $file_url = '';
            if (empty($_FILES['file']['error']) || (!isset($_FILES['file']['error']) && isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != 'none'))
            {
                // 检查文件格式
                if (!check_file_type($_FILES['file']['tmp_name'], $_FILES['file']['name'], $allow_file_types))
                {
                    $this->sys_msg(L('admin_ecarticle_common4'));
                }
        
                // 复制文件
                $res = $this -> upload_article_file($_FILES['file']);
                if ($res != false)
                {
                    $file_url = $res;
                }
            }
            if ($file_url == '')
            {
                $file_url = $_POST['file_url'];
            }
            /* 计算文章打开方式 */
            if ($file_url == '')
            {
                $open_type = 0;
            }
            else
            {
                $open_type = $_POST['FCKeditor1'] == '' ? 1 : 2;
            }
            /* 如果 file_url 跟以前不一样，且原来的文件是本地文件，删除原来的文件 */
            $sql = "SELECT file_url FROM " . $ecs->table('ec_article') . " WHERE article_id = '$_POST[id]'";
            $old_url = M()->getOne($sql,'file_url');
            if ($old_url != '' && $old_url != $file_url && strpos($old_url, 'http://') === false && strpos($old_url, 'https://') === false)
            {
                @unlink(ROOT_PATH . $old_url);
            }
            $temp_desc= isset($_POST['FCKeditor1']) ? $_POST['FCKeditor1'] : '';
            if ($exc->edit("title='$_POST[title]', cat_id='$_POST[article_cat]', article_type='$_POST[article_type]', is_open='$_POST[is_open]', author='$_POST[author]', author_email='$_POST[author_email]', keywords ='$_POST[keywords]', file_url ='$file_url', open_type='$open_type', content='$temp_desc', link='$_POST[link_url]', description = '$_POST[description]'", $_POST['id']))
            {
                $link[0]['text'] = L('admin_ecarticle_common5');
                $link[0]['href'] = U('index').'&act=list&' . list_link_postfix();
        
                $note = sprintf(L('admin_ecarticle_control_index_update1'), stripslashes($_POST['title']));
                admin_log($_POST['title'], L('admin_ecarticle_common6'), L('admin_ecarticle_common7'));
        
                clear_cache_files();
        
                $this ->sys_msg($note, 0, $link);
            }
            else
            {
                die(L('admin_ecarticle_common8'));
            }
        }
        /*------------------------------------------------------ */
        //-- 编辑文章主题
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_title')
        {
        
            $id    = intval($_POST['id']);
            $title = json_str_iconv(trim($_POST['val']));
        
            /* 检查文章标题是否重复 */
            if ($exc->num("title", $title, $id) != 0)
            {
                make_json_error(sprintf(L('admin_ecarticle_common3'), $title));
            }
            else
            {
                if ($exc->edit("title = '$title'", $id))
                {
                    clear_cache_files();
                    admin_log($title, L('admin_ecarticle_common6'), L('admin_ecarticle_common7'));
                    make_json_result(stripslashes($title));
                }
                else
                {
                    make_json_error(L('admin_ecarticle_common8'));
                }
            }
        }
        
        /*------------------------------------------------------ */
        //-- 切换是否显示
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'toggle_show')
        {
        
            $id     = intval($_POST['id']);
            $val    = intval($_POST['val']);
        
            $exc->edit("is_open = '$val'", $id);
            clear_cache_files();
        
            make_json_result($val);
        }
        /*------------------------------------------------------ */
        //-- 切换文章重要性
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'toggle_type')
        {
        
            $id     = intval($_POST['id']);
            $val    = intval($_POST['val']);
        
            $exc->edit("article_type = '$val'", $id);
            clear_cache_files();
        
            make_json_result($val);
        }
        /*------------------------------------------------------ */
        //-- 删除文章主题
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove')
        {
            $id = intval($_GET['id']);
    
            /* 删除原来的文件 */
            $sql = "SELECT file_url FROM " . $ecs->table('ec_article') . " WHERE article_id = '$id'";
            $old_url = M()->getOne($sql,'file_url');
            if ($old_url != '' && strpos($old_url, 'http://') === false && strpos($old_url, 'https://') === false)
            {
                @unlink(ROOT_PATH . $old_url);
            }
            $name = $exc->get_name($id);
            if ($exc->drop($id))
            {
                M()->exe("DELETE FROM " . $ecs->table('ec_comment') . " WHERE " . "comment_type = 1 AND id_value = $id");
                
                admin_log(addslashes($name),L('admin_ecarticle_common9'),L('admin_ecarticle_common7'));
                clear_cache_files();
            }
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);

            ec_header("Location: $url\n");
            exit;
            
        }

        
        /*------------------------------------------------------ */
        //-- 将商品加入关联
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'add_link_goods')
        {
            $json = new JSON;
        
        
            $add_ids = $json->decode($_GET['add_ids']);
            $args = $json->decode($_GET['JSON']);
            $article_id = $args[0];
        
            if ($article_id == 0)
            {
                $article_id = M()->getOne('SELECT MAX(article_id)+1 AS article_id FROM ' .$ecs->table('ec_article'),'article_id');
            }
        
            foreach ($add_ids AS $key => $val)
            {
                $sql = 'INSERT INTO ' . $ecs->table('ec_goods_article') . ' (goods_id, article_id) '.
                       "VALUES ('$val', '$article_id')";
                M()->exe($sql);// or make_json_error($db->error());
            }
        
            /* 重新载入 */
            $arr = $this -> get_article_goods($article_id);
            $opt = array();
        
            foreach ($arr AS $key => $val)
            {
                $opt[] = array('value'  => $val['goods_id'],
                                'text'  => $val['goods_name'],
                                'data'  => '');
            }
        
            make_json_result($opt);
        }
        /*------------------------------------------------------ */
        //-- 将商品删除关联
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'drop_link_goods')
        {
            $json = new JSON;
        
        
            $drop_goods     = $json->decode($_GET['drop_ids']);
            $arguments      = $json->decode($_GET['JSON']);
            $article_id     = $arguments[0];
        
            if ($article_id == 0)
            {
                $article_id = M()->getOne('SELECT MAX(article_id)+1 AS article_id FROM ' .$ecs->table('article'),'article_id');
            }
        
            $sql = "DELETE FROM " . $ecs->table('ec_goods_article').
                    " WHERE article_id = '$article_id' AND goods_id " .db_create_in($drop_goods);
            M()->exe($sql);// or make_json_error($db->error());
        
            /* 重新载入 */
            $arr = $this -> get_article_goods($article_id);
            $opt = array();
        
            foreach ($arr AS $key => $val)
            {
                $opt[] = array('value'  => $val['goods_id'],
                                'text'  => $val['goods_name'],
                                'data'  => '');
            }
        
            make_json_result($opt);
        }
        
        /*------------------------------------------------------ */
        //-- 搜索商品
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'get_goods_list')
        {
            $json = new JSON;
        
            $filters = $json->decode($_GET['JSON']);
        
            $arr = get_goods_list($filters);
            $opt = array();
        
            foreach ($arr AS $key => $val)
            {
                $opt[] = array('value' => $val['goods_id'],
                                'text' => $val['goods_name'],
                                'data' => $val['shop_price']);
            }
        
            make_json_result($opt);
        }
        /*------------------------------------------------------ */
        //-- 批量操作
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'batch')
        {
            
            if (isset($_POST['type']))
            {
                /* 批量删除 */
                if ($_POST['type'] == 'button_remove')
                {
                    if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']))
                    {
                        $this ->sys_msg(L('admin_ecarticle_common10'), 1);
                    }
                    /* 删除原来的文件 */
                    $sql = "SELECT file_url FROM " . $ecs->table('ec_article') .
                            " WHERE article_id " . db_create_in(join(',', $_POST['checkboxes'])) .
                            " AND file_url <> ''";
                    $res = M()->query($sql);
                    if(!empty($res))
                    {
                        foreach($res as $row)
                        {
                            $old_url = $row['file_url'];
                            if (strpos($old_url, 'http://') === false && strpos($old_url, 'https://') === false)
                            {
                                @unlink(ROOT_PATH . $old_url);
                            }
                        }
                    }
                    
                    foreach ($_POST['checkboxes'] AS $key => $id)
                    {
                        if ($exc->drop($id))
                        {
                            $name = $exc->get_name($id);
                            admin_log(addslashes($name),L('admin_ecarticle_common9'),L('admin_ecarticle_common7'));
                        }
                    }

                }
                /* 批量隐藏 */
                if ($_POST['type'] == 'button_hide')
                {
                    if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']))
                    {
                        $this ->sys_msg(L('admin_ecarticle_common10'), 1);
                    }
        
                    foreach ($_POST['checkboxes'] AS $key => $id)
                    {
                        $exc->edit("is_open = '0'", $id);
                    }
                }
                /* 批量显示 */
                if ($_POST['type'] == 'button_show')
                {
                    if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']))
                    {
                        $this ->sys_msg(L('admin_ecarticle_common10'), 1);
                    }
        
                    foreach ($_POST['checkboxes'] AS $key => $id)
                    {
                        $exc->edit("is_open = '1'", $id);
                    }
                }
                /* 批量移动分类 */
                if ($_POST['type'] == 'move_to')
                {
                    if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']) )
                    {
                        $this ->sys_msg(L('admin_ecarticle_common10'), 1);
                    }
                    if(!$_POST['target_cat'])
                    {
                        $this ->sys_msg(L('admin_ecarticle_control_index_move_to1'), 1);
                    }
                    
                    foreach ($_POST['checkboxes'] AS $key => $id)
                    {
                        $exc->edit("cat_id = '".$_POST['target_cat']."'", $id);
                    }
                }
            }
            /* 清除缓存 */
            clear_cache_files();
            $lnk[] = array('text' => L('admin_ecarticle_common5'), 'href' => U('index').'&act=list');
            $this ->sys_msg(L('admin_ecarticle_control_index_move_to2'), 0, $lnk);
        }
        
        
	}
    
    
    
    /* 取得文章关联商品 */
    public function get_article_goods($article_id)
    {
        $list = array();
        $sql  = 'SELECT g.goods_id, g.goods_name'.
                ' FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods_article') . ' AS ga'.
                ' LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . ' AS g ON g.goods_id = ga.goods_id'.
                " WHERE ga.article_id = '$article_id'";
        $list = M()->getAll($sql);
    
        return $list;
    }
        
    
    
    
    /* 获得文章列表 */
    public function get_articleslist()
    {
        $result = get_filter();
        if ($result === false)
        {
            $filter = array();
            $filter['keyword']    = empty($_REQUEST['keyword']) ? '' : trim($_REQUEST['keyword']);
            if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
            {
                $filter['keyword'] = json_str_iconv($filter['keyword']);
            }
            $filter['cat_id'] = empty($_REQUEST['cat_id']) ? 0 : intval($_REQUEST['cat_id']);
            $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'a.article_id' : trim($_REQUEST['sort_by']);
            $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
            
            $where = '';
            if (!empty($filter['keyword']))
            {
                $where = " AND a.title LIKE '%" . mysql_like_quote($filter['keyword']) . "%'";
            }
            if ($filter['cat_id'])
            {
                $where .= " AND a." . get_article_children($filter['cat_id']);
            }
            
            /* 文章总数 */
            $sql = 'SELECT COUNT(*) FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_article'). ' AS a '.
                   'LEFT JOIN ' .$GLOBALS['ec_globals']['ecs']->table('ec_article_cat'). ' AS ac ON ac.cat_id = a.cat_id '.
                   'WHERE 1 ' .$where;
            $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
            
            $filter = page_and_size($filter);
            
            /* 获取文章数据 */
            $sql = 'SELECT a.* , ac.cat_name '.
                   'FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_article'). ' AS a '.
                   'LEFT JOIN ' .$GLOBALS['ec_globals']['ecs']->table('ec_article_cat'). ' AS ac ON ac.cat_id = a.cat_id '.
                   'WHERE 1 ' .$where. ' ORDER by '.$filter['sort_by'].' '.$filter['sort_order'];
    
            $filter['keyword'] = stripslashes($filter['keyword']);
            set_filter($filter, $sql);
        }
        else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        $arr = array();
        $res = M()->selectLimit($sql, $filter['page_size'], $filter['start']);
        
        if(!empty($res))
        {
            foreach($res as $rows)
            {
                $rows['date'] = local_date(C('ec_time_format'), $rows['add_time']);

                $arr[] = $rows;
            }
        }
        return array('arr' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 
                    'record_count' => $filter['record_count']);
        
    }
        
        
    /* 上传文件 */
    public function upload_article_file($upload)
    {
        if (!make_dir(ROOT_PATH. EC_DATA_DIR . "/article"))
        {
            /* 创建目录失败 */
            return false;
        }
    
        $filename = EcImage::random_filename() . substr($upload['name'], strpos($upload['name'], '.'));
        $path     = ROOT_PATH. EC_DATA_DIR . "/article/" . $filename;
    
        if (move_upload_file($upload['tmp_name'], $path))
        {
            return EC_DATA_DIR . "/article/" . $filename;
        }
        else
        {
            return false;
        }
    }
    
}
