<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcPaymentControl extends EcAdminControl {
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
        $exc = new exchange($ecs->table('ec_payment'), $tdb, 'pay_code', 'pay_name');
        
        if(isset($_POST['Submit']))
        {
            $_REQUEST['act'] = 'submit_install';
        }
        
        if ($_REQUEST['act'] == 'list'){
            /* 查询数据库中启用的支付方式 */
            $pay_list = array();
            $sql = "SELECT * FROM " . $ecs->table('ec_payment') . " WHERE enabled = '1' ORDER BY pay_order";
            $res = M()->query($sql);
            if(!empty($res))
            {
                foreach($res as $row)
                {
                    $pay_list[$row['pay_code']] = $row;
                }   
            }
            /* 取得插件文件中的支付方式 */
            $modules = read_modules(ROOT_PATH.'includes/modules/payment');
            for ($i = 0; $i < count($modules); $i++)
            {
                $code = $modules[$i]['code'];
                $modules[$i]['pay_code'] = $modules[$i]['code'];
                /* 如果数据库中有，取数据库中的名称和描述 */
                if (isset($pay_list[$code]))
                {
                    $modules[$i]['name'] = $pay_list[$code]['pay_name'];
                    $modules[$i]['pay_fee'] =  $pay_list[$code]['pay_fee'];
                    $modules[$i]['is_cod'] = $pay_list[$code]['is_cod'];
                    $modules[$i]['desc'] = $pay_list[$code]['pay_desc'];
                    $modules[$i]['pay_order'] = $pay_list[$code]['pay_order'];
                    $modules[$i]['install'] = '1';
                }
                else
                {
                    $modules[$i]['name'] = $GLOBALS['ec_globals']['lang'][$modules[$i]['code']];
                    if (!isset($modules[$i]['pay_fee']))
                    {
                        $modules[$i]['pay_fee'] = 0;
                    }
                    $modules[$i]['desc'] = $GLOBALS['ec_globals']['lang'][$modules[$i]['desc']];
                    $modules[$i]['install'] = '0';
                    
                }
                if ($modules[$i]['pay_code'] == 'tenpayc2c')
                {
                    $tenpayc2c = $modules[$i];
                }
            }
            
            //assign_query_info();
            
            $this->assign('ur_here', '支付方式');
            $this->assign('modules', $modules);
            $this->assign('tenpayc2c', $tenpayc2c);
            $this->display('payment_list.htm');
            //p($modules);die;
            
        }
        /*------------------------------------------------------ */
        //-- 安装支付方式 ?act=install&code=".$code."
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'install')
        {
            /* 取相应插件信息 */
            $set_modules = true;
            include_once(ROOT_PATH.'includes/modules/payment/' . $_REQUEST['code'] . '.php');
            
            $data = $modules[0];
            /* 对支付费用判断。如果data['pay_fee']为false无支付费用，为空则说明以配送有关，其它可以修改 */
            if (isset($data['pay_fee']))
            {
                $data['pay_fee'] = trim($data['pay_fee']);
            }
            else
            {
                $data['pay_fee']     = 0;
            }
            $pay['pay_code']    = $data['code'];
            $pay['pay_name']    = $_LANG[$data['code']];
            $pay['pay_desc']    = $_LANG[$data['desc']];
            $pay['is_cod']      = $data['is_cod'];
            $pay['pay_fee']     = $data['pay_fee'];
            $pay['is_online']   = $data['is_online'];
            $pay['pay_config']  = array();

            foreach ($data['config'] AS $key => $value)
            {
                $config_desc = (isset($_LANG[$value['name'] . '_desc'])) ? $_LANG[$value['name'] . '_desc'] : '';
                $pay['pay_config'][$key] = $value +
                                        array('label' => $_LANG[$value['name']], 'value' => $value['value'], 'desc' => $config_desc);
                if (
                        $pay['pay_config'][$key]['type'] == 'select' ||
                        $pay['pay_config'][$key]['type'] == 'radiobox'
                    )
                {
                    $pay['pay_config'][$key]['range'] = $_LANG[$pay['pay_config'][$key]['name'] . '_range'];
                }

            }
            
            //assign_query_info();

            $this->assign('action_link',  array('text' => '支付方式', 'href' => U('index').'&act=list'));
            $this->assign('pay', $pay);
            $this->display('payment_edit.htm');
    
        }
        /*------------------------------------------------------ */
        //-- 编辑支付方式 ?act=edit&code={$code}
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit')
        {
            /* 查询该支付方式内容 */
            if (isset($_REQUEST['code']))
            {
                $_REQUEST['code'] = trim($_REQUEST['code']);
            }
            else
            {
                die('invalid parameter');
            }
            $sql = "SELECT * FROM " . $ecs->table('ec_payment') . " WHERE pay_code = '$_REQUEST[code]' AND enabled = '1'";
            $pay = M()->getRowSql($sql);
            if (empty($pay))
            {
                $links[] = array('text' => '返回支付方式列表', 'href' => U('index').'&act=list');
                $this->sys_msg('该支付插件不存在或尚未安装', 0, $links);
            }
            /* 取相应插件信息 */
            $set_modules = true;
            include_once(ROOT_PATH . 'includes/modules/payment/' . $_REQUEST['code'] . '.php');
            $data = $modules[0];
            
            /* 取得配置信息 */
            if (is_string($pay['pay_config']))
            {
                $store = unserialize($pay['pay_config']);
                /* 取出已经设置属性的code */
                $code_list = array();
                foreach ($store as $key=>$value)
                {
                    $code_list[$value['name']] = $value['value'];
                }
                $pay['pay_config'] = array();
                /* 循环插件中所有属性 */
                foreach ($data['config'] as $key => $value)
                {
                    $pay['pay_config'][$key]['desc'] = (isset($_LANG[$value['name'] . '_desc'])) ? $_LANG[$value['name'] . '_desc'] : '';
                    $pay['pay_config'][$key]['label'] = $_LANG[$value['name']];
                    $pay['pay_config'][$key]['name'] = $value['name'];
                    $pay['pay_config'][$key]['type'] = $value['type'];
                    if (isset($code_list[$value['name']]))
                    {
                        $pay['pay_config'][$key]['value'] = $code_list[$value['name']];
                    }
                    else
                    {
                        $pay['pay_config'][$key]['value'] = $value['value'];
                    }
        
                    if ($pay['pay_config'][$key]['type'] == 'select' ||
                        $pay['pay_config'][$key]['type'] == 'radiobox')
                    {
                        $pay['pay_config'][$key]['range'] = $_LANG[$pay['pay_config'][$key]['name'] . '_range'];
                    }
                }
            }
            
            /* 如果以前没设置支付费用，编辑时补上 */
            if (!isset($pay['pay_fee']))
            {
                if (isset($data['pay_fee']))
                {
                    $pay['pay_fee'] = $data['pay_fee'];
                }
                else
                {
                    $pay['pay_fee'] = 0;
                }
            }
            //assign_query_info();

            $this->assign('action_link',  array('text' => '支付方式', 'href' => U('index').'&act=list'));
            $this->assign('ur_here', '编辑' . '支付方式');
            $this->assign('pay', $pay);
            $this->display('payment_edit.htm');
        }
        /*------------------------------------------------------ */
        //-- 提交支付方式 post
        /*------------------------------------------------------ */
        elseif (isset($_POST['Submit']))
        {
            /* 检查输入 */
            if (empty($_POST['pay_name']))
            {
                $this -> sys_msg('支付方式名称' . '不能为空');
            }
            $sql = "SELECT COUNT(*) FROM " . $ecs->table('ec_payment') .
            " WHERE pay_name = '$_POST[pay_name]' AND pay_code <> '$_POST[pay_code]'";
            if (M()->GetOne($sql,'COUNT(*)') > 0)
            {
                $this -> sys_msg('支付方式名称' . '不能重复', 1);
            }
            
            /* 取得配置信息 */
            $pay_config = array();
            if (isset($_POST['cfg_value']) && is_array($_POST['cfg_value']))
            {
                for ($i = 0; $i < count($_POST['cfg_value']); $i++)
                {
                    $pay_config[] = array('name'  => trim($_POST['cfg_name'][$i]),
                                          'type'  => trim($_POST['cfg_type'][$i]),
                                          'value' => trim($_POST['cfg_value'][$i])
                    );
                }
            }
            $pay_config = serialize($pay_config);
            /* 取得和验证支付手续费 */
            $pay_fee    = empty($_POST['pay_fee'])?0:$_POST['pay_fee'];
            
            /* 检查是编辑还是安装 */
            $link[] = array('text' => '返回支付方式列表', 'href' => U('index').'&act=list');
            
            if ($_POST['pay_id'])
            {
                /* 编辑 */
                $sql = "UPDATE " . $ecs->table('ec_payment') .
                       "SET pay_name = '$_POST[pay_name]'," .
                       "    pay_desc = '$_POST[pay_desc]'," .
                       "    pay_config = '$pay_config', " .
                       "    pay_fee    =  '$pay_fee' ".
                       "WHERE pay_code = '$_POST[pay_code]' LIMIT 1";
                M()->exe($sql);
                
                /* 记录日志 */
                admin_log($_POST['pay_name'], '编辑', '支付方式');
                
                $this -> sys_msg('编辑成功', 0, $link);
            }
            else
            {
                /* 安装，检查该支付方式是否曾经安装过 */
                $sql = "SELECT COUNT(*) FROM " . $ecs->table('ec_payment') . " WHERE pay_code = '$_REQUEST[pay_code]'";
                if (M()->GetOne($sql,'COUNT(*)') > 0)
                {
                    /* 该支付方式已经安装过, 将该支付方式的状态设置为 enable */
                    $sql = "UPDATE " . $ecs->table('ec_payment') .
                           "SET pay_name = '$_POST[pay_name]'," .
                           "    pay_desc = '$_POST[pay_desc]'," .
                           "    pay_config = '$pay_config'," .
                           "    pay_fee    =  '$pay_fee', ".
                           "    enabled = '1' " .
                           "WHERE pay_code = '$_POST[pay_code]' LIMIT 1";
                    M()->exe($sql);
                }
                else
                {
                    /* 该支付方式没有安装过, 将该支付方式的信息添加到数据库 */
                    $sql = "INSERT INTO " . $ecs->table('ec_payment') . " (pay_code, pay_name, pay_desc, pay_config, is_cod, pay_fee, enabled, is_online)" .
                           "VALUES ('$_POST[pay_code]', '$_POST[pay_name]', '$_POST[pay_desc]', '$pay_config', '$_POST[is_cod]', '$pay_fee', 1, '$_POST[is_online]')";
                    M()->exe($sql);
                }
                /* 记录日志 */
                admin_log($_POST['pay_name'], '安装', '支付方式');
        
                $this -> sys_msg('安装成功', 0, $link);
            }
        }
        /*------------------------------------------------------ */
        //-- 卸载支付方式 ?act=uninstall&code={$code}
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'uninstall')
        {
            /* 把 enabled 设为 0 */
            $sql = "UPDATE " . $ecs->table('ec_payment') .
                   "SET enabled = '0' " .
                   "WHERE pay_code = '$_REQUEST[code]' LIMIT 1";
            M()->exe($sql);
            
            /* 记录日志 */
            admin_log($_REQUEST['code'], '卸载', '支付方式');
            
            $link[] = array('text' => '返回支付方式列表', 'href' => U('index').'&act=list');
            $this -> sys_msg('卸载成功', 0, $link);
        }
        /*------------------------------------------------------ */
        //-- 修改支付方式名称
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'edit_name')
        {
        
            /* 取得参数 */
            $code = json_str_iconv(trim($_POST['id']));
            $name = json_str_iconv(trim($_POST['val']));
        
            /* 检查名称是否为空 */
            if (empty($name))
            {
                make_json_error('您没有输入支付方式名称！');
            }
        
            /* 检查名称是否重复 */
            if (!$exc->is_only('pay_name', $name, $code))
            {
                make_json_error('该支付方式名称已存在！');
            }
        
            /* 更新支付方式名称 */
            $exc->edit("pay_name = '$name'", $code);
            make_json_result(stripcslashes($name));
        }
        /*------------------------------------------------------ */
        //-- 修改支付方式描述
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'edit_desc')
        {
        
            /* 取得参数 */
            $code = json_str_iconv(trim($_POST['id']));
            $desc = json_str_iconv(trim($_POST['val']));
        
            /* 更新描述 */
            $exc->edit("pay_desc = '$desc'", $code);
            make_json_result(stripcslashes($desc));
        }
        
        /*------------------------------------------------------ */
        //-- 修改支付方式排序
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'edit_order')
        {
        
            /* 取得参数 */
            $code = json_str_iconv(trim($_POST['id']));
            $order = intval($_POST['val']);
        
            /* 更新排序 */
            $exc->edit("pay_order = '$order'", $code);
            make_json_result(stripcslashes($order));
        }
        
        /*------------------------------------------------------ */
        //-- 修改支付方式费用
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'edit_pay_fee')
        {
        
            /* 取得参数 */
            $code = json_str_iconv(trim($_POST['id']));
            $pay_fee = json_str_iconv(trim($_POST['val']));
            if (empty($pay_fee))
            {
                $pay_fee = 0;
            }
            else
            {
                $pay_fee = make_semiangle($pay_fee); //全角转半角
                if (strpos($pay_fee, '%') === false)
                {
                    $pay_fee = floatval($pay_fee);
                }
                else
                {
                    $pay_fee = floatval($pay_fee) . '%';
                }
            }
        
            /* 更新支付费用 */
            $exc->edit("pay_fee = '$pay_fee'", $code);
            make_json_result(stripcslashes($pay_fee));
        }

        
	}
    
    
    
    
}
