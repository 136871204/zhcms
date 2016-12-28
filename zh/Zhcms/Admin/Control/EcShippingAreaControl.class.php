<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcShippingAreaControl extends EcAdminControl {
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
        $exc = new exchange($ecs->table('ec_shipping_area'), $tdb, 'shipping_area_id', 'shipping_area_name');
        
        if ($_REQUEST['act'] == 'list'){
            $shipping_id = intval($_REQUEST['shipping']);
            
            $list = $this -> get_shipping_area_list($shipping_id);
            $this->assign('areas',    $list);
            
            $this->assign('ur_here',  '<a href="'.U('Admin/EcShipping/index').'&act=list">配送方式</a> - 配送区域');
            $this->assign('action_link', array('href'=>U('index').'&act=add&shipping='.$shipping_id,'text' => '新建配送区域'));
            $this->assign('full_page', 1);
            
            //assign_query_info();
            $this->display('shipping_area_list.htm');
        }
        /*------------------------------------------------------ */
        //-- 新建配送区域
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'add' && !empty($_REQUEST['shipping']))
        {
            $shipping = M()->getRowSql("SELECT shipping_name, shipping_code FROM " .$ecs->table('ec_shipping'). " WHERE shipping_id='$_REQUEST[shipping]'");
            $set_modules = 1;
            include_once(ROOT_PATH.'includes/modules/shipping/'.$shipping['shipping_code'].'.php');
            
            $fields = array();
            foreach ($modules[0]['configure'] AS $key => $val)
            {
                $fields[$key]['name']   = $val['name'];
                $fields[$key]['value']  = $val['value'];
                $fields[$key]['label']  = $_LANG[$val['name']];
     
            }
            $count = count($fields);
            $fields[$count]['name']     = "free_money";
            $fields[$count]['value']    = "0";
            $fields[$count]['label']    = '免费额度:';
            
            /* 如果支持货到付款，则允许设置货到付款支付费用 */
            if ($modules[0]['cod'])
            {
                $count++;
                $fields[$count]['name']     = "pay_fee";
                $fields[$count]['value']    = "0";
                $fields[$count]['label']    = '货到付款支付费用：';
            }
            
            $shipping_area['shipping_id']   = 0;
            $shipping_area['free_money']    = 0;
    
            $this->assign('ur_here',          $shipping['shipping_name'] .' - '. '新建配送区域');
            $this->assign('shipping_area',    array('shipping_id' => $_REQUEST['shipping'], 'shipping_code' => $shipping['shipping_code']));
            $this->assign('fields',           $fields);
            $this->assign('form_action',      'insert');
            $this->assign('countries',        get_regions());
            $this->assign('default_country',  C('ec_shop_country'));
            //assign_query_info();
            $this->display('shipping_area_info.htm');
        
        }
        elseif ($_REQUEST['act'] == 'insert')
        {
             /* 检查同类型的配送方式下有没有重名的配送区域 */
            $sql = "SELECT COUNT(*) FROM " .$ecs->table("ec_shipping_area").
                    " WHERE shipping_id='$_POST[shipping]' AND shipping_area_name='$_POST[shipping_area_name]'";
            if (M()->getOne($sql,'COUNT(*)') > 0)
            {
                $this->sys_msg('已经存在一个同名的配送区域。', 1);
            }
            else
            {
                $shipping_code = M()->getOne("SELECT shipping_code FROM " .$ecs->table('ec_shipping').
                                    " WHERE shipping_id='$_POST[shipping]'",'shipping_code');
                $plugin        = ROOT_PATH.'includes/modules/shipping/'. $shipping_code. ".php";
                if (!file_exists($plugin))
                {
                    $this->sys_msg('没有找到指定的配送方式的插件。', 1);
                }
                else
                {
                    $set_modules = 1;
                    include_once($plugin);
                }
                
                $config = array();
                foreach ($modules[0]['configure'] AS $key => $val)
                {
                    $config[$key]['name']   = $val['name'];
                    $config[$key]['value']  = $_POST[$val['name']];
                }
                $count = count($config);
                $config[$count]['name']     = 'free_money';
                $config[$count]['value']    = empty($_POST['free_money']) ? '' : $_POST['free_money'];
                $count++;
                $config[$count]['name']     = 'fee_compute_mode';
                $config[$count]['value']    = empty($_POST['fee_compute_mode']) ? '' : $_POST['fee_compute_mode'];
                
                /* 如果支持货到付款，则允许设置货到付款支付费用 */
                if ($modules[0]['cod'])
                {
                    $count++;
                    $config[$count]['name']     = 'pay_fee';
                    $config[$count]['value']    =  make_semiangle(empty($_POST['pay_fee']) ? '' : $_POST['pay_fee']);
                }

                $sql = "INSERT INTO " .$ecs->table('ec_shipping_area').
                            " (shipping_area_name, shipping_id, configure) ".
                        "VALUES".
                            " ('$_POST[shipping_area_name]', '$_POST[shipping]', '" .serialize($config). "')";
                $insert_id = M()->exe($sql);
                $new_id = $insert_id;
                
                /* 添加选定的城市和地区 */
                if (isset($_POST['regions']) && is_array($_POST['regions']))
                {
                    foreach ($_POST['regions'] AS $key => $val)
                    {
                        $sql = "INSERT INTO ".$ecs->table('ec_area_region')." (shipping_area_id, region_id) VALUES ('$new_id', '$val')";
                        M()->exe($sql);
                    }
                }
                admin_log($_POST['shipping_area_name'], '添加', '配送区域');
                
                //$lnk[] = array('text' => $_LANG['add_area_region'], 'href'=>'shipping_area.php?act=region&id='.$new_id);
                $lnk[] = array('text' => '返回列表页', 'href'=>U('index').'&act=list&shipping='.$_POST['shipping']);
                $lnk[] = array('text' => '继续添加配送区域', 'href'=>U('index').'&act=add&shipping='.$_POST['shipping']);
                $this->sys_msg('添加配送区域成功。', 0, $lnk);

            }
        }
        /*------------------------------------------------------ */
        //-- 编辑配送区域
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'edit')
        {
            $sql = "SELECT a.shipping_name, a.shipping_code, a.support_cod, b.* ".
                    "FROM " .$ecs->table('ec_shipping'). " AS a, " .
                            $ecs->table('ec_shipping_area'). " AS b ".
                    "WHERE b.shipping_id=a.shipping_id AND b.shipping_area_id='$_REQUEST[id]'";
            $row = M()->getRowSql($sql);
            
            $set_modules = 1;
            include_once(ROOT_PATH.'includes/modules/shipping/'.$row['shipping_code'].'.php');
            
            $fields = unserialize($row['configure']);

            /* 如果配送方式支持货到付款并且没有设置货到付款支付费用，则加入货到付款费用 */
            if ($row['support_cod'] && $fields[count($fields)-1]['name'] != 'pay_fee')
            {
                $fields[] = array('name'=>'pay_fee', 'value'=>0);
            }
            $_LANG['free_money'] = '免费额度:';
            
            foreach ($fields AS $key => $val)
            {
                /* 替换更改的语言项 */
                if ($val['name'] == 'basic_fee')
                {
                    $val['name'] = 'base_fee';
                }
                if ($val['name'] == 'item_fee')
                {
                    $item_fee = 1;
                }
                if ($val['name'] == 'fee_compute_mode')
                {
                    $this->assign('fee_compute_mode',$val['value']);
                    unset($fields[$key]);
                }
                else
                {
                    $fields[$key]['name'] = $val['name'];
                    $fields[$key]['label']  = $_LANG[$val['name']];
                }
            }
            if(empty($item_fee))
            {
                $field = array('name'=>'item_fee', 'value'=>'0', 'label'=>empty($_LANG['item_fee']) ? '' : '单件商品费用：');
                array_unshift($fields,$field);
            }
            
            /* 获得该区域下的所有地区 */
            $regions = array();
        
            $sql = "SELECT a.region_id, r.region_name ".
                    "FROM ".$ecs->table('ec_area_region')." AS a, ".
                            $ecs->table('ec_region'). " AS r ".
                    "WHERE r.region_id=a.region_id AND a.shipping_area_id='$_REQUEST[id]'";
            $res = M()->query($sql);
            if(!empty($res))
            {
                foreach($res as $arr)
                {
                    $regions[$arr['region_id']] = $arr['region_name'];
                }   
            }
            //assign_query_info();
            $this->assign('ur_here',          $row['shipping_name'] .' - '. '编辑配送区域');
            $this->assign('id',               $_REQUEST['id']);
            $this->assign('fields',           $fields);
            $this->assign('shipping_area',    $row);
            $this->assign('regions',          $regions);
            $this->assign('form_action',      'update');
            $this->assign('countries',        get_regions());
            $this->assign('default_country',  1);
            $this->display('shipping_area_info.htm');

        }
        elseif ($_REQUEST['act'] == 'update')
        {
            /* 检查同类型的配送方式下有没有重名的配送区域 */
            $sql = "SELECT COUNT(*) FROM " .$ecs->table("ec_shipping_area").
                    " WHERE shipping_id='$_POST[shipping]' AND ".
                            "shipping_area_name='$_POST[shipping_area_name]' AND ".
                            "shipping_area_id<>'$_POST[id]'";
            if (M()->getOne($sql,'COUNT(*)') > 0)
            {
                $this->sys_msg('已经存在一个同名的配送区域。', 1);
            }
            else
            {
                $shipping_code = M()->getOne("SELECT shipping_code FROM " .$ecs->table('ec_shipping'). " WHERE shipping_id='$_POST[shipping]'",'shipping_code');
                $plugin        = ROOT_PATH.'includes/modules/shipping/'. $shipping_code. ".php";
                if (!file_exists($plugin))
                {
                    $this->sys_msg('没有找到指定的配送方式的插件。', 1);
                }
                else
                {
                    $set_modules = 1;
                    include_once($plugin);
                }
                
                $config = array();
                foreach ($modules[0]['configure'] AS $key => $val)
                {
                    $config[$key]['name']   = $val['name'];
                    $config[$key]['value']  = $_POST[$val['name']];
                }
        
                $count = count($config);
                $config[$count]['name']     = 'free_money';
                $config[$count]['value']    = empty($_POST['free_money']) ? '' : $_POST['free_money'];
                $count++;
                $config[$count]['name']     = 'fee_compute_mode';
                $config[$count]['value']    = empty($_POST['fee_compute_mode']) ? '' : $_POST['fee_compute_mode'];
                if ($modules[0]['cod'])
                {
                    $count++;
                    $config[$count]['name']     = 'pay_fee';
                    $config[$count]['value']    =  make_semiangle(empty($_POST['pay_fee']) ? '' : $_POST['pay_fee']);
                }
                $sql = "UPDATE " .$ecs->table('ec_shipping_area').
                        " SET shipping_area_name='$_POST[shipping_area_name]', ".
                            "configure='" .serialize($config). "' ".
                        "WHERE shipping_area_id='$_POST[id]'";
                M()->exe($sql);
                
                admin_log($_POST['shipping_area_name'], '编辑', '配送区域');
                
                /* 过滤掉重复的region */
                $selected_regions = array();
                if (isset($_POST['regions']))
                {
                    foreach ($_POST['regions'] AS $region_id)
                    {
                        $selected_regions[$region_id] = $region_id;
                    }
                }
                
                // 查询所有区域 region_id => parent_id
                $sql = "SELECT region_id, parent_id FROM " . $ecs->table('ec_region');
                $res = M()->query($sql);
                if(!empty($res))
                {
                    foreach($res as $row)
                    {
                        $region_list[$row['region_id']] = $row['parent_id'];
                    }
                }
                
                // 过滤掉上级存在的区域
                foreach ($selected_regions AS $region_id)
                {
                    $id = $region_id;
                    while ($region_list[$id] != 0)
                    {
                        $id = $region_list[$id];
                        if (isset($selected_regions[$id]))
                        {
                            unset($selected_regions[$region_id]);
                            break;
                        }
                    }
                }
                
                /* 清除原有的城市和地区 */
                M()->exe("DELETE FROM ".$ecs->table("ec_area_region")." WHERE shipping_area_id='$_POST[id]'");
                
                /* 添加选定的城市和地区 */
                foreach ($selected_regions AS $key => $val)
                {
                    $sql = "INSERT INTO ".$ecs->table('ec_area_region')." (shipping_area_id, region_id) VALUES ('$_POST[id]', '$val')";
                    M()->exe($sql);
                }
                
                
                $lnk[] = array('text' => '返回列表页', 'href'=>U('index').'&act=list&shipping='.$_POST['shipping']);

                $this -> sys_msg('编辑配送区域成功。', 0, $lnk);

            }
        }
        /*------------------------------------------------------ */
        //-- 编辑配送区域名称
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'edit_area')
        {
        
            /* 取得参数 */
            $id  = intval($_POST['id']);
            $val = json_str_iconv(trim($_POST['val']));
        
            /* 取得该区域所属的配送id */
            $shipping_id = $exc->get_name($id, 'shipping_id');
        
            /* 检查是否有重复的配送区域名称 */
            if (!$exc->is_only('shipping_area_name', $val, $id, "shipping_id = '$shipping_id'"))
            {
                make_json_error('已经存在一个同名的配送区域。');
            }
        
            /* 更新名称 */
            $exc->edit("shipping_area_name = '$val'", $id);
        
            /* 记录日志 */
            admin_log($val, '编辑', '配送区域');
        
            /* 返回 */
            make_json_result(stripcslashes($val));
        }
                
	}
    
    
    /**
     * 取得配送区域列表
     * @param   int     $shipping_id    配送id
     */
    public function get_shipping_area_list($shipping_id)
    {
        $sql = "SELECT * FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_shipping_area');
        if ($shipping_id > 0)
        {
            $sql .= " WHERE shipping_id = '$shipping_id'";
        }
        $res = M()->query($sql);
        $list = array();
        if(!empty($res))
        {
            foreach($res as $row)
            {
               $sql = "SELECT r.region_name " .
                    "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_area_region'). " AS a, " .
                        $GLOBALS['ec_globals']['ecs']->table('ec_region') . " AS r ".
                    "WHERE a.region_id = r.region_id ".
                    "AND a.shipping_area_id = '$row[shipping_area_id]'";
                $regions = join(', ', M()->getColSql($sql));
        
                $row['shipping_area_regions'] = empty($regions) ?
                    '<a href="shipping_area.php?act=region&amp;id=' .$row['shipping_area_id'].
                    '" style="color:red">' .$GLOBALS['_LANG']['empty_regions']. '</a>': $regions;
                $list[] = $row; 
            }
        }
    
        return $list;
        
    }
   
    
    
    
}
