<?php
/**
 * 商品类型
 * @author 周鸿 <136871204@qq.com>
 */
class EcArticlecatControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("GoodsCategory");
	}
    
    
    public function index(){
        $_LANG['type_name'][COMMON_CAT] = L('admin_ecarticlecat_control_index1');
        $_LANG['type_name'][SYSTEM_CAT] = L('admin_ecarticlecat_control_index2');
        $_LANG['type_name'][INFO_CAT]   = L('admin_ecarticlecat_control_index3');
        $_LANG['type_name'][UPHELP_CAT] = L('admin_ecarticlecat_control_index4');
        $_LANG['type_name'][HELP_CAT]   = L('admin_ecarticlecat_control_index5');

        
        $ecs=$GLOBALS['ec_globals']['ecs'];
	    $tdb=M();
        $exc = new exchange($ecs->table("ec_article_cat"), $tdb, 'cat_id', 'cat_name');
        
        /* act操作项的初始化 */
        $_REQUEST['act'] = trim($_REQUEST['act']);
        if (empty($_REQUEST['act']))
        {
            $_REQUEST['act'] = 'list';
        }

        if ($_REQUEST['act'] == 'list'){
            
            $articlecat = article_cat_list(0, 0, false);
            foreach ($articlecat as $key => $cat)
            {
                $articlecat[$key]['type_name'] = $_LANG['type_name'][$cat['cat_type']];
            }
            $this->assign('ur_here',     L('admin_ecbrand_common1'));
            $this->assign('action_link', array('text' => L('admin_ecbrand_common2'), 'href' => U('index').'&act=add'));
            $this->assign('full_page',   1);
            $this->assign('articlecat',        $articlecat);
        
            //assign_query_info();
            $this->display('articlecat_list.htm');
        }
        /*------------------------------------------------------ */
        //-- 查询
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query')
        {
            $articlecat = article_cat_list(0, 0, false);
            foreach ($articlecat as $key => $cat)
            {
                $articlecat[$key]['type_name'] = $_LANG['type_name'][$cat['cat_type']];
            }
            $this->assign('articlecat',        $articlecat);
        
            make_json_result($this->fetch('articlecat_list.htm'));
        }
        /*------------------------------------------------------ */
        //-- 添加分类
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'add')
        {
            /* 权限判断 */
            //admin_priv('article_cat');
        
            $this->assign('cat_select',  article_cat_list(0));
            $this->assign('ur_here',     L('admin_ecbrand_common2'));
            $this->assign('action_link', array('text' => L('admin_ecbrand_common1'), 'href' => U('index').'&act=list'));
            $this->assign('form_action', 'insert');
        
            //assign_query_info();
            $this->display('articlecat_info.htm');
        }
        elseif ($_REQUEST['act'] == 'insert')
        {
            /*检查分类名是否重复*/
            $is_only = $exc->is_only('cat_name', $_POST['cat_name']);
            if (!$is_only)
            {
                $this->sys_msg(sprintf(L('admin_ecbrand_common3'), stripslashes($_POST['cat_name'])), 1);
            }
            $cat_type = 1;
            if ($_POST['parent_id'] > 0)
            {
                $sql = "SELECT cat_type FROM " . $ecs->table('ec_article_cat') . " WHERE cat_id = '$_POST[parent_id]'";
                $p_cat_type = M()->getOne($sql,'cat_type');
                 //;1,普通分类;2,系统分类;3,网店信息;4,帮助分类;5,网店帮助
                if ($p_cat_type == 2 || $p_cat_type == 3 || $p_cat_type == 5)
                {
                    $this->sys_msg(L('admin_ecarticlecat_control_insert1'), 0);
                }
                else if ($p_cat_type == 4)
                {
                    $cat_type = 5;
                }
            }
            $sql = "INSERT INTO ".$ecs->table('ec_article_cat')."(cat_name, cat_type, cat_desc,keywords, parent_id, sort_order, show_in_nav)
                    VALUES ('$_POST[cat_name]', '$cat_type',  '$_POST[cat_desc]','$_POST[keywords]', '$_POST[parent_id]', '$_POST[sort_order]', '$_POST[show_in_nav]')";
            $insert_id=M()->exe($sql);
            
            if($_POST['show_in_nav'] == 1)
            {
                $vieworder = M()->getOne("SELECT max(vieworder) FROM ". $ecs->table('ec_nav') . " WHERE type = 'middle'",'max(vieworder)');
                $vieworder += 2;
                //显示在自定义导航栏中
                $sql = "INSERT INTO " . $ecs->table('ec_nav') . " (name,ctype,cid,ifshow,vieworder,opennew,url,type) VALUES('" . $_POST['cat_name'] . "', 'a', '" . $insert_id . "','1','$vieworder','0', '" . ec_build_uri('article_cat', array('acid'=> $db->insert_id()), $_POST['cat_name']) . "','middle')";
                M()->exe($sql);
            }
            
            admin_log($_POST['cat_name'],L('admin_ecarticlecat_control_insert2'),L('admin_ecbrand_common1'));

            $link[0]['text'] = L('admin_ecarticlecat_control_insert3');
            $link[0]['href'] = U('index').'&act=add';
        
            $link[1]['text'] = L('admin_ecbrand_common4');
            $link[1]['href'] = U('index').'&act=list';
            clear_cache_files();
            
            $this->sys_msg($_POST['cat_name'].L('admin_ecarticlecat_control_insert4'),0, $link);
                    
        }
        /*------------------------------------------------------ */
        //-- 编辑文章分类
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit')
        {
            $sql = "SELECT cat_id, cat_name, cat_type, cat_desc, show_in_nav, keywords, parent_id,sort_order FROM ".
                    $ecs->table('ec_article_cat'). " WHERE cat_id='$_REQUEST[id]'";
            $cat = M()->GetRowSql($sql);
            //;1,普通分类;2,系统分类;3,网店信息;4,帮助分类;5,网店帮助
            if ($cat['cat_type'] == 2 || $cat['cat_type'] == 3 || $cat['cat_type'] ==4)
            {
                $this->assign('disabled', 1);
            }
            $options    =   article_cat_list(0, $cat['parent_id'], false);
            $select     =   '';
            $selected   =   $cat['parent_id'];
            foreach ($options as $var)
            {
                if ($var['cat_id'] == $_REQUEST['id'])
                {
                    continue;
                }
                $select .= '<option value="' . $var['cat_id'] . '" ';
                $select .= ' cat_type="' . $var['cat_type'] . '" ';
                $select .= ($selected == $var['cat_id']) ? "selected='ture'" : '';
                $select .= '>';
                if ($var['level'] > 0)
                {
                    $select .= str_repeat('&nbsp;', $var['level'] * 4);
                }
                $select .= htmlspecialchars($var['cat_name']) . '</option>';
            }
            unset($options);
            $this->assign('cat',         $cat);
            $this->assign('cat_select',  $select);
            $this->assign('ur_here',     L('admin_ecarticlecat_control_edit1'));
            $this->assign('action_link', array('text' => L('admin_ecbrand_common1'), 'href' => U('index').'&act=list'));
            $this->assign('form_action', 'update');
        
            //assign_query_info();
            $this->display('articlecat_info.htm');
        }
        elseif ($_REQUEST['act'] == 'update')
        {
            /*检查重名*/
            if ($_POST['cat_name'] != $_POST['old_catname'])
            {
                $is_only = $exc->is_only('cat_name', $_POST['cat_name'], $_POST['id']);
        
                if (!$is_only)
                {
                    $this->sys_msg(sprintf(L('admin_ecbrand_common3'), stripslashes($_POST['cat_name'])), 1);
                }
            }
            
            if(!isset($_POST['parent_id']))
            {
                $_POST['parent_id'] = 0;
            }
            
            $row = M()->getRowSql("SELECT cat_type, parent_id FROM " . $ecs->table('ec_article_cat') . " WHERE cat_id='$_POST[id]'");
            $cat_type = $row['cat_type'];
            //;1,普通分类;2,系统分类;3,网店信息;4,帮助分类;5,网店帮助
            if ($cat_type == 3 || $cat_type ==4)
            {
                $_POST['parent_id'] = $row['parent_id'];
            }
            /* 检查设定的分类的父分类是否合法 */
            $child_cat = article_cat_list($_POST['id'], 0, false);
            if (!empty($child_cat))
            {
                foreach ($child_cat as $child_data)
                {
                    $catid_array[] = $child_data['cat_id'];
                }
            }
            if (in_array($_POST['parent_id'], $catid_array))
            {
                $this->sys_msg(sprintf(L('admin_ecarticlecat_control_update1'), stripslashes($_POST['cat_name'])), 1);
            }
            if ($cat_type == 1 || $cat_type == 5)
            {
                if ($_POST['parent_id'] > 0)
                {
                    $sql = "SELECT cat_type FROM " . $ecs->table('ec_article_cat') . " WHERE cat_id = '$_POST[parent_id]'";
                    $p_cat_type = M()->getOne($sql,'cat_type');
                    if ($p_cat_type == 4)
                    {
                        $cat_type = 5;
                    }
                    else
                    {
                        $cat_type = 1;
                    }
                }
                else
                {
                    $cat_type = 1;
                }
            }
            $dat = M()->getOneRow("SELECT cat_name, show_in_nav FROM ". $ecs->table('ec_article_cat') . " WHERE cat_id = '" . $_POST['id'] . "'");
            if ($exc->edit("cat_name = '$_POST[cat_name]', cat_desc ='$_POST[cat_desc]', keywords='$_POST[keywords]',parent_id = '$_POST[parent_id]', cat_type='$cat_type', sort_order='$_POST[sort_order]', show_in_nav = '$_POST[show_in_nav]'",  $_POST['id']))
            {
                if($_POST['cat_name'] != $dat['cat_name'])
                {
                    //如果分类名称发生了改变
                    $sql = "UPDATE " . $ecs->table('ec_nav') . " SET name = '" . $_POST['cat_name'] . "' WHERE ctype = 'a' AND cid = '" . $_POST['id'] . "' AND type = 'middle'";
                    M()->exe($sql);
                }
                if($_POST['show_in_nav'] != $dat['show_in_nav'])
                {
                    if($_POST['show_in_nav'] == 1)
                    {
                        //显示
                        $nid = M()->getOne("SELECT id FROM ". $ecs->table('ec_nav') . " WHERE ctype = 'a' AND cid = '" . $_POST['id'] . "' AND type = 'middle'",'id');
                        if(empty($nid))
                        {
                            $vieworder = M()->getOne("SELECT max(vieworder) FROM ". $ecs->table('ec_nav') . " WHERE type = 'middle'",'max(vieworder)');
                            $vieworder += 2;
                            $uri = ec_build_uri('article_cat', array('acid'=> $_POST['id']), $_POST['cat_name']);
                            //不存在
                            $sql = "INSERT INTO " . $ecs->table('ec_nav') .
                                " (name,ctype,cid,ifshow,vieworder,opennew,url,type) ".
                                "VALUES('" . $_POST['cat_name'] . "', 'a', '" . $_POST['id'] . "','1','$vieworder','0', '" . $uri . "','middle')";
                        }
                        else
                        {
                            $sql = "UPDATE " . $ecs->table('ec_nav') . " SET ifshow = 1 WHERE ctype = 'a' AND cid = '" . $_POST['id'] . "' AND type = 'middle'";
                        }
                        M()->exe($sql);
                    }
                    else
                    {
                        //去除
                        M()->exe("UPDATE " . $ecs->table('ec_nav') . " SET ifshow = 0 WHERE ctype = 'a' AND cid = '" . $_POST['id'] . "' AND type = 'middle'");
                    }
                }
                $link[0]['text'] = L('admin_ecbrand_common4');
                $link[0]['href'] = U('index').'&act=list';
                $note = sprintf(L('admin_ecarticlecat_control_update2'), $_POST['cat_name']);
                admin_log($_POST['cat_name'], L('admin_ecarticlecat_control_update3'), L('admin_ecbrand_common1'));
                clear_cache_files();
                $this->sys_msg($note, 0, $link);
            }
            else
            {
                die(L('admin_eccommon_db_op_error'));
            }
        }
        
        /*------------------------------------------------------ */
        //-- 编辑文章分类的排序
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_sort_order')
        {
        
            $id    = intval($_POST['id']);
            $order = json_str_iconv(trim($_POST['val']));
        
            /* 检查输入的值是否合法 */
            if (!preg_match("/^[0-9]+$/", $order))
            {
                make_json_error(sprintf($_LANG['enter_int'], $order));
            }
            else
            {
                if ($exc->edit("sort_order = '$order'", $id))
                {
                    clear_cache_files();
                    make_json_result(stripslashes($order));
                }
                else
                {
                    make_json_error(L('admin_eccommon_db_op_error'));
                }
            }
        }
        /*------------------------------------------------------ */
        //-- 删除文章分类
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove')
        {
            $id = intval($_GET['id']);
            $sql = "SELECT cat_type FROM " . $ecs->table('ec_article_cat') . " WHERE cat_id = '$id'";
            $cat_type = M()->getOne($sql,'cat_type');
            if ($cat_type == 2 || $cat_type == 3 || $cat_type ==4)
            {
                /* 系统保留分类，不能删除 */
                make_json_error(L('admin_ecarticlecat_control_remove1'));
            }
            
            $sql = "SELECT COUNT(*) FROM " . $ecs->table('ec_article_cat') . " WHERE parent_id = '$id'";
            if (M()->getOne($sql,'COUNT(*)') > 0)
            {
                /* 还有子分类，不能删除 */
                make_json_error(L('admin_ecarticlecat_control_remove2'));
            }
            /* 非空的分类不允许删除 */
            $sql = "SELECT COUNT(*) FROM ".$ecs->table('ec_article')." WHERE cat_id = '$id'";
            if (M()->getOne($sql,'COUNT(*)') > 0)
            {
                make_json_error(sprintf(L('admin_ecarticlecat_control_remove3')));
            }
            else
            {
                $exc->drop($id);
                M()->query("DELETE FROM " . $ecs->table('ec_nav') . "WHERE  ctype = 'a' AND cid = '$id' AND type = 'middle'");
                clear_cache_files();
                admin_log($cat_name, L('admin_ecarticlecat_control_remove4'), L('admin_ecbrand_common1'));
            }
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);

            ec_header("Location: $url\n");
            exit;
            
        }
        /*------------------------------------------------------ */
        //-- 切换是否显示在导航栏
        /*------------------------------------------------------ */
        
        if ($_REQUEST['act'] == 'toggle_show_in_nav')
        {
            $id = intval($_POST['id']);
            $val = intval($_POST['val']);
            
            if ($this-> cat_update($id, array('show_in_nav' => $val)) != false)
            {
                if($val == 1)
                {
                    //显示
                    $nid = M()->getOne("SELECT id FROM ". $ecs->table('ec_nav') . " WHERE ctype='a' AND cid='$id' AND type = 'middle'",'id');
                    if(empty($nid))
                    {
                        //不存在
                        $vieworder = M()->getOne("SELECT max(vieworder) FROM ". $ecs->table('ec_nav') . " WHERE type = 'middle'",'max(vieworder)');
                        $vieworder += 2;
                        $catname = M()->getOne("SELECT cat_name FROM ". $ecs->table('ec_article_cat') . " WHERE cat_id = '$id'",'cat_name');
                        $uri = ec_build_uri('article_cat', array('acid'=> $id), $catname);
        
                        $sql = "INSERT INTO " . $ecs->table('ec_nav') . " (name,ctype,cid,ifshow,vieworder,opennew,url,type) ".
                            "VALUES('" . $catname . "', 'a', '$id','1','$vieworder','0', '" . $uri . "','middle')";
                    }
                    else
                    {
                        $sql = "UPDATE " . $ecs->table('ec_nav') . " SET ifshow = 1 WHERE ctype='a' AND cid='$id' AND type = 'middle'";
                    }
                    M()->exe($sql);
                }
                else
                {
                    //去除
                    M()->exe("UPDATE " . $ecs->table('ec_nav') . " SET ifshow = 0 WHERE ctype='a' AND cid='$id' AND type = 'middle'");
                }
                clear_cache_files();
                make_json_result($val);
            }
            else
            {
                make_json_error(L('admin_eccommon_db_op_error'));
            }
            
        }

    }
    
    
    /**
     * 添加商品分类
     *
     * @param   integer $cat_id
     * @param   array   $args
     *
     * @return  mix
     */
    public function cat_update($cat_id, $args)
    {
        if (empty($args) || empty($cat_id))
        {
            return false;
        }
        return M()->autoExecute($GLOBALS['ec_globals']['ecs']->table('ec_article_cat'), $args, 'update', "cat_id='$cat_id'");
        
    }

    
    
    
}
