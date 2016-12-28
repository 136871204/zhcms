<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcShippingControl extends EcAdminControl {
   // protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
        header("Content-type:text/html;charset=utf-8");
        $ecs=$GLOBALS['ec_globals']['ecs'];
        /*$image = new EcImage(C('ec_bgcolor'));*/
        $tdb=M();
        $exc = new exchange($ecs->table('ec_shipping'), $tdb, 'shipping_code', 'shipping_name');
        
        if ($_REQUEST['act'] == 'list'){

            $modules = read_modules(ROOT_PATH.'includes/modules/shipping');
            
            for ($i = 0; $i < count($modules); $i++)
            {
                $lang_file = ROOT_PATH.'includes/languages/zh_cn/shipping/' .$modules[$i]['code']. '.php';
                if (file_exists($lang_file))
                {
                    include_once($lang_file);
                }
                
                /* 检查该插件是否已经安装 */
                $sql = "SELECT shipping_id, shipping_name, shipping_desc, insure, support_cod,shipping_order 
                        FROM " .$ecs->table('ec_shipping'). " 
                        WHERE shipping_code='" .$modules[$i]['code']. "' ORDER BY shipping_order";
                $row = M()->GetRowSql($sql);
                if ($row)
                {
                    /* 插件已经安装了，获得名称以及描述 */
                    $modules[$i]['id']      = $row['shipping_id'];
                    $modules[$i]['name']    = $row['shipping_name'];
                    $modules[$i]['desc']    = $row['shipping_desc'];
                    $modules[$i]['insure_fee']  = $row['insure'];
                    $modules[$i]['cod']     = $row['support_cod'];
                    $modules[$i]['shipping_order'] = $row['shipping_order'];
                    $modules[$i]['install'] = 1;
                    
                    if (isset($modules[$i]['insure']) && ($modules[$i]['insure'] === false))
                    {
                        $modules[$i]['is_insure']  = 0;
                    }
                    else
                    {
                        $modules[$i]['is_insure']  = 1;
                    }
                }
                else
                {
                    $modules[$i]['name']    = $GLOBALS['ec_globals']['lang'][$modules[$i]['code']];
                    $modules[$i]['desc']    = $GLOBALS['ec_globals']['lang'][$modules[$i]['desc']];
                    $modules[$i]['insure_fee']  = empty($modules[$i]['insure'])? 0 : $modules[$i]['insure'];
                    $modules[$i]['cod']     = $modules[$i]['cod'];
                    $modules[$i]['install'] = 0;
                }
            }
            $this->assign('ur_here', '配送方式');
            $this->assign('modules', $modules);
            //assign_query_info();
            $this->display('shipping_list.htm');
        }
        /*------------------------------------------------------ */
        //-- 安装配送方式
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'install')
        {
            $set_modules = true;
            include_once(ROOT_PATH . 'includes/modules/shipping/' . $_GET['code'] . '.php');
            
            /* 检查该配送方式是否已经安装 */
            $sql = "SELECT shipping_id FROM " .$ecs->table('ec_shipping'). " WHERE shipping_code = '$_GET[code]'";
            $id = M()->GetOne($sql,'shipping_id');
            //p($modules);die;
            if ($id > 0)
            {
                /* 该配送方式已经安装过, 将该配送方式的状态设置为 enable */
                M()->exe("UPDATE " .$ecs->table('ec_shipping'). " SET enabled = 1 WHERE shipping_code = '$_GET[code]' LIMIT 1");
            }
            else
            {
                /* 该配送方式没有安装过, 将该配送方式的信息添加到数据库 */
                $insure = empty($modules[0]['insure']) ? 0 : $modules[0]['insure'];
                $sql = "INSERT INTO " . $ecs->table('ec_shipping') . " (" .
                            "shipping_code, shipping_name, shipping_desc, insure, support_cod, enabled, 
                            print_bg, config_lable, print_model" .
                            ") VALUES (" .
                                "'" . addslashes($modules[0]['code']). "', '" . addslashes($_LANG[$modules[0]['code']]) . "', '" .
                                addslashes($_LANG[$modules[0]['desc']]) . "', '$insure', '" . intval($modules[0]['cod']) . "', 1, '" . 
                                addslashes($modules[0]['print_bg']) . "', '" . addslashes($modules[0]['config_lable']) . "', '" . 
                                $modules[0]['print_model'] . "')";
                $insert_id = M()->exe($sql);
                $id = $insert_id;
            }
            
            /* 记录管理员操作 */
            admin_log(addslashes($_LANG[$modules[0]['code']]), '安装', '配送方式');
            
            /* 提示信息 */
            $lnk[] = array('text' => '为该配送方式新建配送区域', 'href' => U('Admin/EcShippingArea/index').'&act=add&shipping=' . $id);
            $lnk[] = array('text' => '返回', 'href' => U('index').'&act=list');
            $this->sys_msg(sprintf('配送方式 %s 安装成功！', $_LANG[$modules[0]['code']]), 0, $lnk);
    
    
        }  
                
        /*------------------------------------------------------ */
        //-- 卸载配送方式
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'uninstall')
        {
            /* 获得该配送方式的ID */
            $row = M()->GetRowSql("SELECT shipping_id, shipping_name, print_bg FROM " .$ecs->table('ec_shipping'). " WHERE shipping_code='$_GET[code]'");
            $shipping_id = $row['shipping_id'];
            $shipping_name = $row['shipping_name'];
            
            /* 删除 shipping_fee 以及 shipping 表中的数据 */
            if ($row)
            {
                $all = M()->getColSql("SELECT shipping_area_id FROM " .$ecs->table('ec_shipping_area'). " WHERE shipping_id='$shipping_id'");
                //p($all);die;
                if(!empty($all))
                {
                    $in  = db_create_in(join(',', $all));
                    M()->exe("DELETE FROM " .$ecs->table('ec_area_region'). " WHERE shipping_area_id $in");
                }
                
                
                M()->exe("DELETE FROM " .$ecs->table('ec_shipping_area'). " WHERE shipping_id='$shipping_id'");
                M()->exe("DELETE FROM " .$ecs->table('ec_shipping'). " WHERE shipping_id='$shipping_id'");
                
                //删除上传的非默认快递单
                if (($row['print_bg'] != '') && (!is_print_bg_default($row['print_bg'])))
                {
                    @unlink(ROOT_PATH . $row['print_bg']);
                }
                
                //记录管理员操作
                admin_log(addslashes($shipping_name), '卸载', '配送方式');
                
                $lnk[] = array('text' => '返回', 'href' => U('index').'&act=list');
                $this->sys_msg(sprintf('配送方式 %s 已经成功卸载。', $shipping_name), 0, $lnk);
        
            }
            else
            {
                $lnk[] = array('text' => '返回', 'href' => U('index').'&act=list');
                $this->sys_msg('配送方式卸载失败。', 0, $lnk);
            }
    
        }
        
        /*------------------------------------------------------ */
        //-- 编辑配送方式名称
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'edit_name')
        {
            /* 取得参数 */
            $id  = json_str_iconv(trim($_POST['id']));
            $val = json_str_iconv(trim($_POST['val']));
            
            /* 检查名称是否为空 */
            if (empty($val))
            {
                make_json_error('对不起，配送方式名称不能为空。');
            }
            
            /* 检查名称是否重复 */
            if (!$exc->is_only('shipping_name', $val, $id))
            {
                make_json_error('对不起，已经存在一个同名的配送方式。');
            }
            
            /* 更新支付方式名称 */
            $exc->edit("shipping_name = '$val'", $id);
            make_json_result(stripcslashes($val));
        }
        /*------------------------------------------------------ */
        //-- 编辑配送方式描述
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'edit_desc')
        {
        
            /* 取得参数 */
            $id = json_str_iconv(trim($_POST['id']));
            $val = json_str_iconv(trim($_POST['val']));
        
            /* 更新描述 */
            $exc->edit("shipping_desc = '$val'", $id);
            make_json_result(stripcslashes($val));
        }

        
        /*------------------------------------------------------ */
        //-- 修改配送方式保价费
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'edit_insure')
        {
            /* 取得参数 */
            $id = json_str_iconv(trim($_POST['id']));
            $val = json_str_iconv(trim($_POST['val']));
            if (empty($val))
            {
                $val = 0;
            }
            else
            {
                $val = make_semiangle($val); //全角转半角
                if (strpos($val, '%') === false)
                {
                    $val = floatval($val);
                }
                else
                {
                    $val = floatval($val) . '%';
                }
            }
            /* 检查该插件是否支持保价 */
            include_once(ROOT_PATH . 'includes/modules/shipping/' .$id. '.php');
            if (isset($modules[0]['insure']) && $modules[0]['insure'] === false)
            {
                make_json_error('该配送方式不支持保价,保价费用设置失败');
            }
            /* 更新保价费用 */
            $exc->edit("insure = '$val'", $id);
            make_json_result(stripcslashes($val));
        }
        /*------------------------------------------------------ */
        //-- 修改配送方式排序
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'edit_order')
        {
            /* 取得参数 */
            $code = json_str_iconv(trim($_POST['id']));
            $order = intval($_POST['val']);
        
            /* 更新排序 */
            $exc->edit("shipping_order = '$order'", $code);
            make_json_result(stripcslashes($order));
        }
                
	}
    
    /**
     * 判断是否为默认安装快递单背景图片
     *
     * @param   string      $print_bg      快递单背景图片路径名
     * @access  private
     *
     * @return  Bool
     */
    public function is_print_bg_default($print_bg)
    {
        $_bg = basename($print_bg);
        $_bg_array = explode('.', $_bg);
        
        if (count($_bg_array) != 2)
        {
            return false;
        }
        
        if (strpos('|' . $_bg_array[0], 'dly_') != 1)
        {
            return false;
        }
        
        $_bg_array[0] = ltrim($_bg_array[0], 'dly_');
        $list = explode('|', SHIP_LIST);
        if (in_array($_bg_array[0], $list))
        {
            return true;
        }
        
        return false;
    }
    
    
    
}
