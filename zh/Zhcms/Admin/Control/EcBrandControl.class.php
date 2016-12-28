<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcBrandControl extends EcAdminControl {
    protected $db;
    
    public function __init() {
		$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    $image = new EcImage(C('ec_bgcolor'));
	    $tdb=M();
	    $exc = new exchange($ecs->table("ec_brand"), $tdb, 'brand_id', 'brand_name');
        
        if ($_REQUEST['act'] == 'list'){
            $this->assign('ur_here',      '商品ブランド');
            $this->assign('action_link',  array('text' => 'ブランド新規', 'href' => U('index',array('act'=>'add'))));
            $this->assign('full_page',    1);
            $brand_list = $this ->get_brandlist();
            //p($brand_list);die;
            $this->assign('brand_list',   $brand_list['brand']);
            $this->assign('filter',       $brand_list['filter']);
            $this->assign('record_count', $brand_list['record_count']);
            $this->assign('page_count',   $brand_list['page_count']);
            
            $this->display('brand_list.htm');
        }
        /*------------------------------------------------------ */
        //-- 添加品牌
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'add'){
            $this->assign('ur_here',     'ブランド新規');
            $this->assign('action_link', array('text' => '商品ブランド', 'href' => U('index',array('act'=>'list'))));
            $this->assign('form_action', 'insert');
            $this->assign('brand', array('sort_order'=>50, 'is_show'=>1));
            $this->display('brand_info.htm');
        }
        elseif ($_REQUEST['act'] == 'insert'){
            $is_show = isset($_REQUEST['is_show']) ? intval($_REQUEST['is_show']) : 0;
            $is_only = $exc->is_only('brand_name', $_POST['brand_name']);
            if (!$is_only)
            {
                $this->sys_msg(sprintf('ブランド %s すでに存在した！', stripslashes($_POST['brand_name'])), 1);
            }
            
            /*对描述处理*/
            if (!empty($_POST['brand_desc']))
            {
                $_POST['brand_desc'] = $_POST['brand_desc'];
            }

            /*处理图片*/
            $img_name = $image->upload_image($_FILES['brand_logo'],'brandlogo');
            /*处理URL*/
            $site_url = sanitize_url( $_POST['site_url'] );
            /*插入数据*/
            $sql = "INSERT INTO ".$ecs->table('ec_brand')."(brand_name, site_url, brand_desc, brand_logo, is_show, sort_order) ".
                   "VALUES ('$_POST[brand_name]', '$site_url', '$_POST[brand_desc]', '$img_name', '$is_show', '$_POST[sort_order]')";
            M()->exe($sql);
            admin_log($_POST['brand_name'],'新規','商品ブランド');
            /* 清除缓存 */
            clear_cache_files();
            $link[0]['text'] = '新規続き';
            $link[0]['href'] = U('index',array('act'=>'add'));
        
            $link[1]['text'] = '商品ブランドリストに戻す';
            $link[1]['href'] = U('index',array('act'=>'list'));
            $this->sys_msg('商品ブランド新規成功', 0, $link);
        }
        /*------------------------------------------------------ */
        //-- 编辑品牌
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit'){
            $sql = "SELECT brand_id, brand_name, site_url, brand_logo, brand_desc, brand_logo, is_show, sort_order ".
                    "FROM " .$ecs->table('ec_brand'). " WHERE brand_id='$_REQUEST[id]'";
            $brand = M()->GetRowSql($sql);
            
            $this->assign('ur_here',     'ブランド編集記録');
            $this->assign('action_link', array('text' => '商品ブランド', 'href' => U('index',array('act'=>'list')).'&' . list_link_postfix()));
            $this->assign('brand',       $brand);
            $this->assign('form_action', 'updata');
            $this->display('brand_info.htm');
        }
        elseif ($_REQUEST['act'] == 'updata'){
            if ($_POST['brand_name'] != $_POST['old_brandname'])
            {
                /*检查品牌名是否相同*/
                $is_only = $exc->is_only('brand_name', $_POST['brand_name'], $_POST['id']);
        
                if (!$is_only)
                {
                    $this->sys_msg(sprintf('ブランド %s すでに存在した！', stripslashes($_POST['brand_name'])), 1);
                }
            }
            /*对描述处理*/
            if (!empty($_POST['brand_desc']))
            {
                $_POST['brand_desc'] = $_POST['brand_desc'];
            }
            $is_show = isset($_REQUEST['is_show']) ? intval($_REQUEST['is_show']) : 0;
             /*处理URL*/
            $site_url = sanitize_url( $_POST['site_url'] );
            
            /* 处理图片 */
            $img_name = $image->upload_image($_FILES['brand_logo'],'brandlogo');
            //p($img_name);die;
            $param = "brand_name = '$_POST[brand_name]',  site_url='$site_url', brand_desc='$_POST[brand_desc]', is_show='$is_show', sort_order='$_POST[sort_order]' ";
            if (!empty($img_name))
            {
                //有图片上传
                $param .= " ,brand_logo = '$img_name' ";
            }
            if ($exc->edit($param,  $_POST['id']))
            {
                /* 清除缓存 */
                clear_cache_files();
                admin_log($_POST['brand_name'], '変更', '商品ブランド');

                $link[0]['text'] = 'リストに戻す';
                $link[0]['href'] = U('index',array('act'=>'list')).'&' . list_link_postfix();
                $note = vsprintf('ブランド %s 修正成功！', $_POST['brand_name']);
                $this->sys_msg($note, 0, $link);
            }else{
                $this->sys_msg('削除失敗', 1);
            }
        }
        /*------------------------------------------------------ */
        //-- 编辑品牌名称
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_brand_name'){
            $id     = intval($_POST['id']);
            $name   = json_str_iconv(trim($_POST['val']));
            /* 检查名称是否重复 */
            if ($exc->num("brand_name",$name, $id) != 0){
                make_json_error(sprintf('ブランド %s すでに存在した！', $name));
            }else{
                if ($exc->edit("brand_name = '$name'", $id)){
                    admin_log($name,'変更','商品ブランド');
                    make_json_result(stripslashes($name));
                }else{
                    make_json_result(sprintf('ブランド %s 変更失敗！', $name));
                }
            }
        }
        elseif($_REQUEST['act'] == 'add_brand'){
            $brand = empty($_REQUEST['brand']) ? '' : json_str_iconv(trim($_REQUEST['brand']));
            if(brand_exists($brand))
            {
                make_json_error('同じブランドはすでに存在!');
            }
            else
            {
                $sql = "INSERT INTO " . $ecs->table('ec_brand') . "(brand_name)" .
                        "VALUES ( '$brand')";
                $insert_id=M()->exe($sql);
                $brand_id = $insert_id;
                $arr = array("id"=>$brand_id, "brand"=>$brand);
                make_json_result($arr);
            }
        }
        /*------------------------------------------------------ */
        //-- 编辑排序序号
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_sort_order'){
            $id     = intval($_POST['id']);
            $order  = intval($_POST['val']);
            $name   = $exc->get_name($id);
            if ($exc->edit("sort_order = '$order'", $id))
            {
                admin_log(addslashes($name),'変更','商品ブランド');
        
                make_json_result($order);
            }
            else
            {
                make_json_error(sprintf('ブランド %s 変更失敗！', $name));
            }
        }
        /*------------------------------------------------------ */
        //-- 切换是否显示
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'toggle_show')
        {
        
            $id     = intval($_POST['id']);
            $val    = intval($_POST['val']);
        
            $exc->edit("is_show='$val'", $id);
        
            make_json_result($val);
        }
        /*------------------------------------------------------ */
        //-- 删除品牌
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove')
        {
        
            $id = intval($_GET['id']);
        
            /* 删除该品牌的图标 */
            $sql = "SELECT brand_logo FROM " .$ecs->table('ec_brand'). " WHERE brand_id = '$id'";
            $logo_name = M()->getOne($sql,'brand_logo');
            if (!empty($logo_name))
            {
                @unlink(ROOT_PATH . EC_DATA_DIR . '/brandlogo/' .$logo_name);
            }
        
            $exc->drop($id);
        
            /* 更新商品的品牌编号 */
            $sql = "UPDATE " .$ecs->table('ec_goods'). " SET brand_id=0 WHERE brand_id='$id'";
            M()->exe($sql);
        
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
            exit;
        }
        /*------------------------------------------------------ */
        //-- 删除品牌图片
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'drop_logo'){
            $brand_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
            /* 取得logo名称 */
            $sql = "SELECT brand_logo FROM " .$ecs->table('ec_brand'). " WHERE brand_id = '$brand_id'";
            $logo_name = M()->getOne($sql,'brand_logo');
            if (!empty($logo_name))
            {
                @unlink(ROOT_PATH . EC_DATA_DIR . '/brandlogo/' .$logo_name);
                $sql = "UPDATE " .$ecs->table('ec_brand'). " SET brand_logo = '' WHERE brand_id = '$brand_id'";
                M()->exe($sql);
            }
            $link= array(
                        array('text' => '改めてブランド変更!', 'href' => U('index',array('act'=>'edit','id'=>$brand_id))), 
                        array('text' => 'リストに戻す', 'href' => U('index',array('act'=>'list'))));
            $this->sys_msg('ブランドlogo削除成功!', 0, $link);
        }
	    /*------------------------------------------------------ */
        //-- 排序、分页、查询
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query'){
            $brand_list = $this->get_brandlist();
            $this->assign('brand_list',   $brand_list['brand']);
            $this->assign('filter',       $brand_list['filter']);
            $this->assign('record_count', $brand_list['record_count']);
            $this->assign('page_count',   $brand_list['page_count']);
            make_json_result($this->fetch('brand_list.htm'), '',
                array('filter' => $brand_list['filter'], 'page_count' => $brand_list['page_count']));

        }
        
        
        
        
	}
    
    
    /**
     * 获取品牌列表
     *
     * @access  public
     * @return  array
     */
    public function get_brandlist(){
        $db_prefix=C("DB_PREFIX");
        $result = get_filter();
        if ($result === false)
        {
            /* 分页大小 */
            $filter = array();
            
            /* 记录总数以及页数 */
            if (isset($_POST['brand_name']))
            {
                $sql = "SELECT COUNT(*) FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_brand') .' WHERE brand_name like \'%'.$_POST['brand_name'].'%\'';
            }
            else
            {
                $sql = "SELECT COUNT(*) FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_brand');
            }
            $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
            $filter = page_and_size($filter);
            /* 查询记录 */
            if (isset($_POST['brand_name']))
            {
                if(strtoupper(EC_CHARSET) == 'GBK')
                {
                    $keyword = iconv("UTF-8", "gb2312", $_POST['brand_name']);
                }else{
                    $keyword = $_POST['brand_name'];
                }
                $sql = "SELECT * FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_brand')." WHERE brand_name like '%{$keyword}%' ORDER BY sort_order ASC";
            }
            else
            {
                $sql = "SELECT * FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_brand')." ORDER BY sort_order ASC";
            }
            //p($sql);die;
            set_filter($filter, $sql);
        }else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        $res = M()->selectLimit($sql, $filter['page_size'], $filter['start']);
        $arr = array();
       // p($res);die;
        if(!empty($res)){
            foreach($res as $rows){
                $brand_logo = empty($rows['brand_logo']) ? '' :
                                '<a href="'.$rows['brand_logo'].'" target="_brank"><img src="'.__PUBLIC__.'/ec/images/picflag.gif" width="16" height="16" border="0" alt='.'品牌LOGO'.' /></a>';
                $site_url   = empty($rows['site_url']) ? 'N/A' : '<a href="'.$rows['site_url'].'" target="_brank">'.$rows['site_url'].'</a>';
                
                $rows['brand_logo'] = $brand_logo;
                $rows['site_url']   = $site_url;
        
                $arr[] = $rows;
            }
        }
        //p($arr);die;
        return array('brand' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
    }
    
	
    
    
}
