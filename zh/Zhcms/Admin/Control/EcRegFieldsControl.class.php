<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcRegFieldsControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    //$image = new EcImage(C('ec_bgcolor'));
	    $tdb=M();
        $exc = new exchange($ecs->table("ec_reg_fields"), $tdb, 'id', 'reg_field_name');
        
        /*------------------------------------------------------ */
        //-- 会员注册项列表
        /*------------------------------------------------------ */
        
        if ($_REQUEST['act'] == 'list')
        {
            $fields = array();
            $fields = M()->getAll("SELECT * FROM " . $ecs->table('ec_reg_fields') . " ORDER BY dis_order, id");
        
            $this->assign('ur_here',      '会員登録項目設置');
            $this->assign('action_link',  array('text' => '会員登録項目新規', 'href'=>U('index').'&act=add'));
            $this->assign('full_page',    1);
        
            $this->assign('reg_fields',   $fields);
        
            //assign_query_info();
            $this->display('reg_fields.htm');
        }
        /*------------------------------------------------------ */
        //-- 翻页，排序
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query')
        {
            $fields = array();
            $fields = M()->getAll("SELECT * FROM " .$ecs->table('ec_reg_fields') . "ORDER BY id");
            
            $this->assign('reg_fields',   $fields);
            make_json_result($this->fetch('reg_fields.htm'));
        } 
        /*------------------------------------------------------ */
        //-- 添加会员注册项
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'add')
        {
        
            $form_action = 'insert';
        
            $reg_field['reg_field_order'] = 100;
            $reg_field['reg_field_display'] = 1;
            $reg_field['reg_field_need'] = 1;
        
            $this->assign('reg_field',  $reg_field);
            $this->assign('ur_here',     '会員登録項目新規');
            $this->assign('action_link', array('text' => '会員登録項目設置', 'href'=> U('index').'&act=list'));
            $this->assign('form_action', $form_action);
        
            //assign_query_info();
            $this->display('reg_field_info.htm');
        }
        /*------------------------------------------------------ */
        //-- 增加会员注册项到数据库
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'insert')
        {
        
            /* 检查是否存在重名的会员注册项 */
            if (!$exc->is_only('reg_field_name', trim($_POST['reg_field_name'])))
            {
                $this->sys_msg(sprintf('会員登録項目名 %s すでに存在。', trim($_POST['reg_field_name'])), 1);
            }
        
            $sql = "INSERT INTO " .$ecs->table('ec_reg_fields') ."( ".
                        "reg_field_name, dis_order, display, is_need".
                    ") VALUES (".
                        "'$_POST[reg_field_name]', '$_POST[reg_field_order]', '$_POST[reg_field_display]', '$_POST[reg_field_need]')";
            M()->exe($sql);
        
            /* 管理员日志 */
            admin_log(trim($_POST['reg_field_name']), '新規', '会員登録項目項目');
            clear_cache_files();
        
            $lnk[] = array('text' => 'リストに戻る',    'href'=>U('index').'&act=list');
            $lnk[] = array('text' => '新規し続き', 'href'=>U('index').'&act=add');
            $this->sys_msg('会員登録項目はすでに新規成功。', 0, $lnk);
        }
        /*------------------------------------------------------ */
        //-- 编辑会员注册项
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'edit')
        {
        
            $form_action = 'update';
        
            $sql = "SELECT id AS reg_field_id, reg_field_name, dis_order AS reg_field_order, display AS reg_field_display, is_need AS reg_field_need FROM ".
                   $ecs->table('ec_reg_fields'). " WHERE id='$_REQUEST[id]'";
            $reg_field = M()->GetRowSql($sql);
        
            $this->assign('reg_field',  $reg_field);
            $this->assign('ur_here',     '会員登録項目編集');
            $this->assign('action_link', array('text' => '会員登録項目設置', 'href'=> U('index').'&act=list'));
            $this->assign('form_action', $form_action);
        
            //assign_query_info();
            $this->display('reg_field_info.htm');
        }
        /*------------------------------------------------------ */
        //-- 更新会员注册项
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'update')
        {
        
            /* 检查是否存在重名的会员注册项 */
            if ($_POST['reg_field_name'] != $_POST['old_field_name'] && !$exc->is_only('reg_field_name', trim($_POST['reg_field_name'])))
            {
                $this->sys_msg(sprintf('会員登録項目名 %s すでに存在。', trim($_POST['reg_field_name'])), 1);
            }
        
            $sql = "UPDATE " .$ecs->table('ec_reg_fields') . " SET `reg_field_name` = '$_POST[reg_field_name]', `dis_order` = '$_POST[reg_field_order]', `display` = '$_POST[reg_field_display]', `is_need` = '$_POST[reg_field_need]' WHERE `id` = '$_POST[id]'";
            M()->exe($sql);
        
            /* 管理员日志 */
            admin_log(trim($_POST['reg_field_name']), '変更', '会員登録項目項目');
            clear_cache_files();
            $lnk[] = array('text' => 'リストに戻る',    'href'=>U('index').'&act=list');
            $this->sys_msg('会員登録項目変更成功。', 0, $lnk);
        }
        /*------------------------------------------------------ */
        //-- 删除会员注册项
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove')
        {
        
            $field_id = intval($_GET['id']);
            $field_name = $exc->get_name($field_id);
        
            if ($exc->drop($field_id))
            {
                /* 删除会员扩展信息表的相应信息 */
                $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_reg_extend_info') . " WHERE reg_field_id = '" . $field_id . "'";
                M()->exe($sql);
        
                admin_log(addslashes($field_name), '削除', '会員登録項目項目');
                clear_cache_files();
            }
        
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
            exit;
        
        }
        /*
         *  编辑会员注册项名称
         */
        elseif ($_REQUEST['act'] == 'edit_name')
        {
            $id = intval($_REQUEST['id']);
            $val = empty($_REQUEST['val']) ? '' : json_str_iconv(trim($_REQUEST['val']));
            if ($exc->is_only('reg_field_name', $val, $id))
            {
                if ($exc->edit("reg_field_name = '$val'", $id))
                {
                    /* 管理员日志 */
                    admin_log($val, '変更', '会員登録項目項目');
                    clear_cache_files();
                    make_json_result(stripcslashes($val));
                }
                else
                {
                    make_json_error('DB操作失敗');
                }
            }
            else
            {
                make_json_error(sprintf('会員登録項目名 %s すでに存在。', htmlspecialchars($val)));
            }
        }
        /*
         *  编辑会员注册项排序权值
         */
        elseif ($_REQUEST['act'] == 'edit_order')
        {
            $id = intval($_REQUEST['id']);
            $val = isset($_REQUEST['val']) ? json_str_iconv(trim($_REQUEST['val'])) : '' ;
            if (is_numeric($val))
            {
                if ($exc->edit("dis_order = '$val'", $id))
                {
                    /* 管理员日志 */
                    admin_log($val, '変更', '会員登録項目項目');
                    clear_cache_files();
                    make_json_result(stripcslashes($val));
                }
                else
                {
                    make_json_error('DB操作失敗');
                }
            }
            else
            {
                make_json_error('ソート値が数値で入力してください。');
            }
        }
        /*------------------------------------------------------ */
        //-- 修改会员注册项显示状态
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'toggle_dis')
        {
        
            $id     = intval($_POST['id']);
            $is_dis = intval($_POST['val']);
        
            if ($exc->edit("display = '$is_dis'", $id))
            {
                clear_cache_files();
                make_json_result($is_dis);
            }
        }
        
        /*------------------------------------------------------ */
        //-- 修改会员注册项必填状态
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'toggle_need')
        {
        
            $id     = intval($_POST['id']);
            $is_need = intval($_POST['val']);
        
            if ($exc->edit("is_need = '$is_need'", $id))
            {
                clear_cache_files();
                make_json_result($is_need);
            }
        }

	}
    
    
	
    
    
}
