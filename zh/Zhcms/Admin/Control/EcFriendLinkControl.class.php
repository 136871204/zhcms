<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcFriendLinkControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    $image = new EcImage(C('ec_bgcolor'));
	    $tdb=M();
        $exc = new exchange($ecs->table('ec_friend_link'), $tdb, 'link_id', 'link_name');
        
        
        /* act操作项的初始化 */
        if (empty($_REQUEST['act']))
        {
            $_REQUEST['act'] = 'list';
        }
        else
        {
            $_REQUEST['act'] = trim($_REQUEST['act']);
        }



        if ($_REQUEST['act'] == 'list'){
            /* 模板赋值 */
            $this->assign('ur_here',     '友情リンクリスト');
            $this->assign('action_link', array('text' => '友情リンク新規', 'href' => U('index').'&act=add'));
            $this->assign('full_page',   1);
            
            /* 获取友情链接数据 */
            $links_list =  $this -> get_links_list();
            
            //p($links_list);die;
            $this->assign('links_list',      $links_list['list']);
            $this->assign('filter',          $links_list['filter']);
            $this->assign('record_count',    $links_list['record_count']);
            $this->assign('page_count',      $links_list['page_count']);
            
            $sort_flag  = sort_flag($links_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
            
            //assign_query_info();
            $this->display('link_list.htm');
        }
       /*------------------------------------------------------ */
        //-- 排序、分页、查询
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query')
        {
            /* 获取友情链接数据 */
            $links_list = $this -> get_links_list();
            
            $this->assign('links_list',      $links_list['list']);
            $this->assign('filter',          $links_list['filter']);
            $this->assign('record_count',    $links_list['record_count']);
            $this->assign('page_count',      $links_list['page_count']);
            
            $sort_flag  = sort_flag($links_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
            
            make_json_result($this->fetch('link_list.htm'), '',
                array('filter' => $links_list['filter'], 'page_count' => $links_list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 添加新链接页面
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'add')
        {
        
            $this->assign('ur_here',     '友情リンク新規');
            $this->assign('action_link', array('href'=>U('index'). '&act=list', 'text' => '友情リンクリスト'));
            $this->assign('action',      'add');
            $this->assign('form_act',    'insert');
        
            //assign_query_info();
            $this->display('link_info.htm');
        }
        /*------------------------------------------------------ */
        //-- 处理添加的链接
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'insert')
        {
            /* 变量初始化 */
            $link_logo = '';
            $show_order = (!empty($_POST['show_order'])) ? intval($_POST['show_order']) : 0;
            $link_name  = (!empty($_POST['link_name']))  ? sub_str(trim($_POST['link_name']), 250, false) : '';
            /* 查看链接名称是否有重复 */
            if ($exc->num("link_name", $link_name) == 0)
            {
                /* 处理上传的LOGO图片 */
                if ((isset($_FILES['link_img']['error']) && $_FILES['link_img']['error'] == 0) || (!isset($_FILES['link_img']['error']) && isset($_FILES['link_img']['tmp_name']) && $_FILES['link_img']['tmp_name'] != 'none'))
                {
                    $img_up_info = @basename($image->upload_image($_FILES['link_img'], 'afficheimg'));
                    $link_logo   = EC_DATA_DIR . '/afficheimg/' .$img_up_info;
                }
                /* 使用远程的LOGO图片 */
                if (!empty($_POST['url_logo']))
                {
                    if (strpos($_POST['url_logo'], 'http://') === false && strpos($_POST['url_logo'], 'https://') === false)
                    {
                        $link_logo = 'http://' .trim($_POST['url_logo']);
                    }
                    else
                    {
                        $link_logo = trim($_POST['url_logo']);
                    }
                }
                /* 如果链接LOGO为空, LOGO为链接的名称 */
                if (((isset($_FILES['upfile_flash']['error']) && $_FILES['upfile_flash']['error'] > 0) || (!isset($_FILES['upfile_flash']['error']) && isset($_FILES['upfile_flash']['tmp_name']) && $_FILES['upfile_flash']['tmp_name'] == 'none')) && empty($_POST['url_logo']))
                {
                    $link_logo = '';
                }
                /* 如果友情链接的链接地址没有http://，补上 */
                if (strpos($_POST['link_url'], 'http://') === false && strpos($_POST['link_url'], 'https://') === false)
                {
                    $link_url = 'http://' . trim($_POST['link_url']);
                }
                else
                {
                    $link_url = trim($_POST['link_url']);
                }
                /* 插入数据 */
                $sql    = "INSERT INTO ".$ecs->table('ec_friend_link')." (link_name, link_url, link_logo, show_order) ".
                          "VALUES ('$link_name', '$link_url', '$link_logo', '$show_order')";
                M()->exe($sql);
                
                /* 记录管理员操作 */
                admin_log($_POST['link_name'], '新規', '友情リンク');
                /* 清除缓存 */
                clear_cache_files();
        
                /* 提示信息 */
                $link[0]['text'] = '友情リンク新規し続き';
                $link[0]['href'] = U('index').'&act=add';
        
                $link[1]['text'] = '友情リンクリストに戻る';
                $link[1]['href'] = U('index').'&act=list';
        
                $this -> sys_msg('新規' . "&nbsp;" .stripcslashes($_POST['link_name']) . " " . '操作成功',0, $link);

            }
             else
            {
                $link[] = array('text' => '戻る', 'href'=>'javascript:history.back(-1)');
                $this -> sys_msg('友情リンク名はすでに存在!', 0, $link);
            }
    
        }
        /*------------------------------------------------------ */
        //-- 友情链接编辑页面
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit')
        {
            /* 取得友情链接数据 */
            $sql = "SELECT link_id, link_name, link_url, link_logo, show_order ".
                    "FROM " .$ecs->table('ec_friend_link'). " WHERE link_id = '".intval($_REQUEST['id'])."'";
            $link_arr = M()->getRowSql($sql);
            /* 标记为图片链接还是文字链接 */
            if (!empty($link_arr['link_logo']))
            {
                $type      = 'img';
                $link_logo = $link_arr['link_logo'];
            }
            else
            {
                $type      = 'chara';
                $link_logo = '';
            }
            $link_arr['link_name'] = sub_str($link_arr['link_name'], 250, false); // 截取字符串为250个字符避免出现非法字符的情况

            /* 模板赋值 */
            $this->assign('ur_here',     '友情リンク変更');
            $this->assign('action_link', array('href'=>U('index').'&act=list&' . list_link_postfix(), 'text' => '友情リンクリスト'));
            $this->assign('form_act',    'update');
            $this->assign('action',      'edit');
        
            $this->assign('type',        $type);
            $this->assign('link_logo',   $link_logo);
            $this->assign('link_arr',    $link_arr);
        
            //assign_query_info();
            $this->display('link_info.htm');
        }
        /*------------------------------------------------------ */
        //-- 编辑链接的处理页面
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'update')
        {
            /* 变量初始化 */
            $id         = (!empty($_REQUEST['id']))      ? intval($_REQUEST['id'])      : 0;
            $show_order = (!empty($_POST['show_order'])) ? intval($_POST['show_order']) : 0;
            $link_name  = (!empty($_POST['link_name']))  ? trim($_POST['link_name'])    : '';
        
            /* 如果有图片LOGO要上传 */
            if ((isset($_FILES['link_img']['error']) && $_FILES['link_img']['error'] == 0) || (!isset($_FILES['link_img']['error']) && isset($_FILES['link_img']['tmp_name']) && $_FILES['link_img']['tmp_name'] != 'none'))
            {
                $img_up_info = @basename($image->upload_image($_FILES['link_img'], 'afficheimg'));
                $link_logo   = ", link_logo = ".'\''. EC_DATA_DIR . '/afficheimg/'.$img_up_info.'\'';
            }
            elseif (!empty($_POST['url_logo']))
            {
                $link_logo = ", link_logo = '$_POST[url_logo]'";
            }
            else
            {
                /* 如果是文字链接, LOGO为链接的名称 */
                $link_logo = ", link_logo = ''";
            }
            
            //如果要修改链接图片, 删除原来的图片
            if (!empty($img_up_info))
            {
                //获取链子LOGO,并删除
                $old_logo = M()->getOne("SELECT link_logo FROM " .$ecs->table('ec_friend_link'). " WHERE link_id = '$id'",'link_logo');
                if ((strpos($old_logo, 'http://') === false) && (strpos($old_logo, 'https://') === false))
                {
                    $img_name = basename($old_logo);
                    @unlink(ROOT_PATH . EC_DATA_DIR . '/afficheimg/' . $img_name);
                }
            }
        
            /* 如果友情链接的链接地址没有http://，补上 */
            if (strpos($_POST['link_url'], 'http://') === false && strpos($_POST['link_url'], 'https://') === false)
            {
                $link_url = 'http://' . trim($_POST['link_url']);
            }
            else
            {
                $link_url = trim($_POST['link_url']);
            }
            
            /* 更新信息 */
            $sql = "UPDATE " .$ecs->table('ec_friend_link'). " SET ".
                    "link_name = '$link_name', ".
                    "link_url = '$link_url' ".
                    $link_logo.','.
                    "show_order = '$show_order' ".
                    "WHERE link_id = '$id'";
        
            M()->exe($sql);
            /* 记录管理员操作 */
            admin_log($_POST['link_name'],'変更', '友情リンク');
        
            /* 清除缓存 */
            clear_cache_files();
        
            /* 提示信息 */
            $link[0]['text'] = L('admin_ecfriendlink_common5');
            $link[0]['href'] = U('index').'&act=list&' . list_link_postfix();
        
            $this->sys_msg('変更'. "&nbsp;" .stripcslashes($_POST['link_name']) . "&nbsp;" . '操作成功',0, $link);
        }
        
        /*------------------------------------------------------ */
        //-- 编辑链接名称
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_link_name')
        {
        
            $id        = intval($_POST['id']);
            $link_name = json_str_iconv(trim($_POST['val']));
        
            /* 检查链接名称是否重复 */
            if ($exc->num("link_name", $link_name, $id) != 0)
            {
                make_json_error(sprintf('友情リンク名はすでに存在!', $link_name));
            }
            else
            {
                if ($exc->edit("link_name = '$link_name'", $id))
                {
                    admin_log($link_name, '変更', '友情リンク');
                    clear_cache_files();
                    make_json_result(stripslashes($link_name));
                }
                else
                {
                    make_json_error('DB操作失敗');
                }
            }
        }
        
        /*------------------------------------------------------ */
        //-- 删除友情链接
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove')
        {
        
            $id = intval($_GET['id']);
        
            /* 获取链子LOGO,并删除 */
            $link_logo = $exc->get_name($id, "link_logo");
        
            if ((strpos($link_logo, 'http://') === false) && (strpos($link_logo, 'https://') === false))
            {
                $img_name = basename($link_logo);
                @unlink(ROOT_PATH. EC_DATA_DIR . '/afficheimg/'.$img_name);
            }
        
            $exc->drop($id);
            clear_cache_files();
            admin_log('', '削除', '友情リンク');
        
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
            exit;
        }
        
        /*------------------------------------------------------ */
        //-- 编辑排序
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_show_order')
        {
        
            $id    = intval($_POST['id']);
            $order = json_str_iconv(trim($_POST['val']));
        
            /* 检查输入的值是否合法 */
            if (!preg_match("/^[0-9]+$/", $order))
            {
                make_json_error(sprintf('表示ソートのタイプは数値です!', $order));
            }
            else
            {
                if ($exc->edit("show_order = '$order'", $id))
                {
                    clear_cache_files();
                    make_json_result(stripslashes($order));
                }
            }
        }

	}
    
    /* 获取友情链接数据列表 */
    public function get_links_list()
    {
        $result = get_filter();
        if ($result === false)
        {
            $filter = array();
            $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'link_id' : trim($_REQUEST['sort_by']);
            $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
    
            /* 获得总记录数据 */
            $sql = 'SELECT COUNT(*) FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_friend_link');
            $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
    
            $filter = page_and_size($filter);
    
            /* 获取数据 */
            $sql  = 'SELECT link_id, link_name, link_url, link_logo, show_order'.
                   ' FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_friend_link').
                    " ORDER by $filter[sort_by] $filter[sort_order]";
    
            set_filter($filter, $sql);
        }
        else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        $res = M()->selectLimit($sql, $filter['page_size'], $filter['start']);
        $list = array();
        
        if(!empty($res))
        {
            foreach($res as $rows)
            {
                if (empty($rows['link_logo']))
                {
                    $rows['link_logo'] = '';
                }
                else
                {
                    if ((strpos($rows['link_logo'], 'http://') === false) && (strpos($rows['link_logo'], 'https://') === false))
                    {
                        $rows['link_logo'] = "<img src='" .'../'.$rows['link_logo']. "' width=88 height=31 />";
                    }
                    else
                    {
                        $rows['link_logo'] = "<img src='".$rows['link_logo']."' width=88 height=31 />";
                    }
                }
                $list[] = $rows;

            }
        }
        return array('list' => $list, 'filter' => $filter, 'page_count' => $filter['page_count'], 
                    'record_count' => $filter['record_count']);
    }
        
    
    
    
}
