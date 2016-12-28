<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcPackControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    $image = new EcImage(C('ec_bgcolor'));
	    $tdb=M();
        $exc = new exchange($ecs->table("ec_pack"), $tdb, 'pack_id', 'pack_name');
        
        if ($_REQUEST['act'] == 'list'){
            $this->assign('ur_here',      '商品包装');
            $this->assign('action_link',  array('text' => '添加新包装', 'href'=> U('index',array('act'=>'add'))));
            $this->assign('full_page',  1);
            
            $packs_list = $this-> packs_list();
            
            $this->assign('packs_list',   $packs_list['packs_list']);
            $this->assign('filter',       $packs_list['filter']);
            $this->assign('record_count', $packs_list['record_count']);
            $this->assign('page_count',   $packs_list['page_count']);
            
            //assign_query_info();
            $this->display('pack_list.htm');
        }
        /*------------------------------------------------------ */
        //-- ajax 列表
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query')
        {
            $packs_list = $this-> packs_list();
            $this->assign('packs_list',    $packs_list['packs_list']);
            $this->assign('filter',       $packs_list['filter']);
            $this->assign('record_count', $packs_list['record_count']);
            $this->assign('page_count',   $packs_list['page_count']);
        
            $sort_flag  = sort_flag($packs_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('pack_list.htm'), '', array('filter' => $packs_list['filter'], 
                    'page_count' => $packs_list['page_count']));
        }
          /*------------------------------------------------------ */
        //-- 添加新包装
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'add')
        {
        
            $pack['pack_fee'] = 0;
            $pack['free_money'] = 0;
        
            $this->assign('pack',         $pack);
            $this->assign('ur_here',      '添加新包装');
            $this->assign('form_action','insert');
            $this->assign('action_link',  array('text' => '商品包装', 'href'=>U('index',array('act'=>'list')) ));
        
            //assign_query_info();
            $this->display('pack_info.htm');
        }      
        if ($_REQUEST['act'] == 'insert')
        {
        
            /*检查包装名是否重复*/
            $is_only = $exc->is_only('pack_name', $_POST['pack_name']);
        
            if (!$is_only)
            {
                $this->sys_msg(sprintf('包装名 %s 已经存在', stripslashes($_POST['pack_name'])), 1);
            }
        
            /* 处理图片 */
            if (!empty($_FILES['pack_img']))
            {
                $upload_img = $image->upload_image($_FILES['pack_img'],"packimg", $_POST['old_packimg']);
                if ($upload_img == false)
                {
                    $this->sys_msg($image->error_msg);
                }
                $img_name = basename($upload_img);
            }
            else
            {
                $img_name = '';
            }
        
            /*插入数据*/
            $sql = "INSERT INTO ".$ecs->table('ec_pack')."(pack_name, pack_fee, free_money, pack_desc, pack_img)
                    VALUES ('$_POST[pack_name]', '$_POST[pack_fee]', '$_POST[free_money]', '$_POST[pack_desc]', '$img_name')";
            //p($sql);die;
            M()->exe($sql);
        
            /*添加链接*/
            $link[0]['text'] = '返回列表';
            $link[0]['href'] = U('index',array('act'=>'list'));
            $link[1]['text'] = '继续添加';
            $link[1]['href'] = U('index',array('act'=>'add'));
            $this->sys_msg($_POST['pack_name'].'已成功添加',0, $link);
            admin_log($_POST['pack_name'],'添加','商品包装');
        
        }
        /*------------------------------------------------------ */
        //-- 编辑包装
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'edit')
        {
        
            $sql = "SELECT pack_id, pack_name, pack_fee, free_money, pack_desc, pack_img FROM " .$ecs->table('ec_pack'). " WHERE pack_id='$_REQUEST[id]'";
            $pack = M()->GetRowSql($sql);
            $this->assign('ur_here',      '编辑包装');
            $this->assign('action_link',  array('text' => '商品包装', 'href'=> U('index').'&act=list&' . list_link_postfix()));
            $this->assign('pack',       $pack);
            $this->assign('form_action','update');
            $this->display('pack_info.htm');
        }
        if ($_REQUEST['act'] == 'update')
        {
            if ($_POST['pack_name'] != $_POST['old_packname'])
            {
                /*检查品牌名是否相同*/
                $is_only = $exc->is_only('pack_name', $_POST['pack_name'], $_POST['id']);
        
                if (!$is_only)
                {
                    $this->sys_msg(sprintf('包装名 %s 已经存在', stripslashes($_POST['pack_name'])), 1);
                }
            }
        
            $param = "pack_name = '$_POST[pack_name]', pack_fee = '$_POST[pack_fee]', free_money= '$_POST[free_money]', pack_desc = '$_POST[pack_desc]' ";
            /* 处理图片 */
            if (!empty($_FILES['pack_img']['name']))
            {
                $upload_img = $image->upload_image($_FILES['pack_img'],"packimg", $_POST['old_packimg']);
                if ($upload_img == false)
                {
                    $this->sys_msg($image->error_msg);
                }
                $img_name = basename($upload_img);
            }
            else
            {
                $img_name = '';
            }
        
            if (!empty($img_name))
            {
                $param .= " ,pack_img = '$img_name' ";
            }
        
            if ($exc->edit($param ,  $_POST['id']))
            {
                $link[0]['text'] = '返回列表';
                $link[0]['href'] = U('index').'&act=list&' . list_link_postfix();
                $note = sprintf('包装 %s 修改成功', $_POST['pack_name']);
                $this->sys_msg($note, 0, $link);
                admin_log($_POST['pack_name'], '编辑', '商品包装');
            }
            else
            {
                die('数据库操作失败');
            }
        
        }
        
        /* 删除卡片图片 */
        if ($_REQUEST['act'] == 'drop_pack_img')
        {
            $pack_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        
            /* 取得logo名称 */
            $sql = "SELECT pack_img FROM " .$ecs->table('ec_pack'). " WHERE pack_id = '$pack_id'";
            $img_name = M()->getOne($sql,'pack_img');
        
            if (!empty($img_name))
            {
                @unlink(EC_DATA_DIR . '/packimg/' .$img_name);
                $sql = "UPDATE " .$ecs->table('ec_pack'). " SET pack_img = '' WHERE pack_id = '$pack_id'";
                M()->exe($sql);
            }
            $link= array(
                        array('text' => '重新编辑该包装', 'href'=> U('index').'&act=edit&id=' .$pack_id), 
                        array('text' => '返回列表页面', 'href'=>U('index').'&act=list')
                    );
            $this->sys_msg('删除包装图片成功', 0, $link);
        }
        /*------------------------------------------------------ */
        //-- 编辑包装名称
        /*------------------------------------------------------ */
        
        if ($_REQUEST['act'] == 'edit_name')
        {
        
            $id = intval($_POST['id']);
            $val = json_str_iconv(trim($_POST['val']));
        
            /* 取得该属性所属商品类型id */
            $pack_name = $exc->get_name($id);
        
            if (!$exc->is_only('pack_name', $val, $id))
            {
                make_json_error(sprintf('包装名 %s 已经存在', $pack_name));
            }
            else
            {
                $exc->edit("pack_name='$val'", $id);
        
                admin_log($val, '编辑', '商品包装');
                make_json_result(stripslashes($val));
            }
        }
        /*------------------------------------------------------ */
        //-- 编辑包装费用
        /*------------------------------------------------------ */
        
        if ($_REQUEST['act'] == 'edit_pack_fee')
        {
        
            $id = intval($_POST['id']);
            $val = floatval($_POST['val']);
        
            /* 取得该属性所属商品类型id */
            $pack_name = $exc->get_name($id);
        
            $exc->edit("pack_fee='$val'", $id);
            admin_log(addslashes($pack_name), '编辑', '商品包装');
            make_json_result(number_format($val, 2));
        }
        
        /*------------------------------------------------------ */
        //-- 编辑免费额度
        /*------------------------------------------------------ */
        
        if ($_REQUEST['act'] == 'edit_free_money')
        {
        
            $id = intval($_POST['id']);
            $val = floatval($_POST['val']);
        
            /* 取得该属性所属商品类型id */
            $pack_name = $exc->get_name($id);
        
            $exc->edit("free_money='$val'", $id);
            admin_log(addslashes($pack_name), '编辑', '商品包装');
            make_json_result(number_format($val, 2));
        }
        
        /*------------------------------------------------------ */
        //-- 删除包装
        /*------------------------------------------------------ */
        
        if ($_REQUEST['act'] == 'remove')
        {
        
            $id     = intval($_GET['id']);
            $name   = $exc->get_name($id);
            $img    = $exc->get_name($id, 'pack_img');
        
            if ($exc->drop($id))
            {
                /* 删除图片 */
                if (!empty($img))
                {
                     @unlink(EC_DATA_DIR. '/packimg/'.$img);
                }
                admin_log(addslashes($name),'删除','商品包装');
        
                $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
                ec_header("Location: $url\n");
                exit;
            }
            else
            {
                make_json_error('删除失败');
                return false;
            }
        }
                
	}
    
    
    public function packs_list()
    {
        $result = get_filter();
        if ($result === false)
        {
            $filter['sort_by']      = empty($_REQUEST['sort_by']) ? 'pack_id' : trim($_REQUEST['sort_by']);
            $filter['sort_order']   = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
    
            $sql = "SELECT count(*) FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_pack');
            $filter['record_count'] = M()->getOne($sql,'count(*)');
    
            /* 分页大小 */
            $filter = page_and_size($filter);
    
            /* 查询 */
            $sql = "SELECT pack_id, pack_name, pack_img, pack_fee, free_money, pack_desc".
                   " FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_pack').
                   " ORDER by " . $filter['sort_by'] . ' ' . $filter['sort_order'] .
                   " LIMIT " . $filter['start'] . ',' . $filter['page_size'];
    
            set_filter($filter, $sql);
        }
        else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
    
        $packs_list = M()->getAll($sql);
    
        $arr = array('packs_list' => $packs_list, 'filter' => $filter, 'page_count' => $filter['page_count'], 
                    'record_count' => $filter['record_count']);
    
        return $arr;
    }
	
    
    
}
