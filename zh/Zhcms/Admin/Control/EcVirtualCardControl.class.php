<?php
/**
 * 管理员管理模块
 * Class AdministratorControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcVirtualCardControl extends EcAdminControl{
    
    //private $_db;

    public function __init() {
		//$this -> _db = K("AdminLog");
	}
    
    public function index(){
        $ecs=$GLOBALS['ec_globals']['ecs'];
	    /*$tdb=M();
	    $exc = new exchange($ecs->table("ec_ad_position"), $tdb, 'position_id', 'position_name');*/
        /* act操作项的初始化 */
        
        /*------------------------------------------------------ */
        //-- 补货处理
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'replenish')
        {
            /* 验证goods_id是否合法 */
            if (empty($_REQUEST['goods_id']))
            {
                $link[] = array('text'=>L('admin_ecvirtualcard_common1'),'href'=>U('Admin/EcGoods/index').'&act=list&extension_code=virtual_card');
                $this->sys_msg(L('admin_ecvirtualcard_common2'), 1, $link);
            }
            else
            {
                $goods_name = M()->GetOne("SELECT goods_name From ".$ecs->table('ec_goods')." WHERE goods_id='".$_REQUEST['goods_id']."' AND is_real = 0 AND extension_code='virtual_card' ",'goods_name');
                if (empty($goods_name))
                {
                    $link[] = array('text'=>L('admin_ecvirtualcard_common1'),'href'=>U('Admin/EcGoods/index').'&act=list&extension_code=virtual_card');
                    $this-> sys_msg(L('admin_ecvirtualcard_common3'), 1, $link);
                }
            }
            $card = array(
                            'goods_id'=>$_REQUEST['goods_id'],
                            'goods_name'=>$goods_name, 
                            'end_date'=>date('Y-m-d', strtotime('+1 year')));
            $this->assign('card', $card);
        
            $this->assign('ur_here', L('admin_ecvirtualcard_common4'));
            $this->assign('action_link', array('text'=>L('admin_ecvirtualcard_common5'), 'href'=> U('index').'&act=card&goods_id='.$card['goods_id']));
            $this->display('replenish_info.htm');
            
        }
        /*------------------------------------------------------ */
        //-- 编辑补货信息
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_replenish')
        {
            /* 获取卡片信息 */
            $sql = "SELECT T1.card_id, T1.goods_id, T2.goods_name,T1.card_sn, T1.card_password, T1.end_date, T1.crc32 
                    FROM ".$ecs->table('ec_virtual_card')." AS T1, ".$ecs->table('ec_goods')." AS T2 ".
                    "WHERE T1.goods_id = T2.goods_id AND T1.card_id = '$_REQUEST[card_id]'";
            $card = M()->GetRowSql($sql);
            if ($card['crc32'] == 0 || $card['crc32'] == crc32(AUTH_KEY))
            {
                $card['card_sn']       = decrypt($card['card_sn']);
                $card['card_password'] = decrypt($card['card_password']);
            }
            elseif ($card['crc32'] == crc32(OLD_AUTH_KEY))
            {
                $card['card_sn']       = decrypt($card['card_sn'], OLD_AUTH_KEY);
                $card['card_password'] = decrypt($card['card_password'], OLD_AUTH_KEY);
            }
            else
            {
                $card['card_sn']       = '***';
                $card['card_password'] = '***';
            }
            
            $this->assign('ur_here',     L('admin_ecvirtualcard_common4'));
            $this->assign('action_link', array('text'=>L('admin_ecvirtualcard_common5'), 'href'=>U('index').'&act=card&goods_id='.$card['goods_id']));
            $this->assign('card',        $card);
            $this->display('replenish_info.htm');
        }
        elseif ($_REQUEST['act'] == 'action')
        {
            $_POST['card_sn'] = trim($_POST['card_sn']);
             /* 加密后的 */
            $coded_card_sn       = encrypt($_POST['card_sn']);
            $coded_old_card_sn   = encrypt($_POST['old_card_sn']);
            $coded_card_password = encrypt($_POST['card_password']);
    
            /* 在前后两次card_sn不一致时，检查是否有重复记录,一致时直接更新数据 */
            if ($_POST['card_sn'] != $_POST['old_card_sn'])
            {
                $sql = "SELECT count(*) 
                        FROM ".$ecs->table('ec_virtual_card')." 
                        WHERE goods_id='".$_POST['goods_id']."' AND card_sn='$coded_card_sn'";
        
                if (M()->GetOne($sql,'count(*)') > 0)
                {
                     $link[] = array('text'=>L('admin_ecvirtualcard_common1'), 'href'=>U('index').'&act=replenish&goods_id='.$_POST['goods_id']);
                     $this->sys_msg(sprintf(L('admin_ecvirtualcard_control_index_action1'),$_POST['card_sn']),1,$link);
                }
            }
            
            /* 如果old_card_sn不存在则新加一条记录 */
            if (empty($_POST['old_card_sn']))
            {
                /* 插入一条新记录 */
                $end_date = strtotime($_POST['end_dateYear'] . "-" . $_POST['end_dateMonth'] . "-" . $_POST['end_dateDay']);
                $add_date = gmtime();
                $sql = "INSERT INTO ".$ecs->table('ec_virtual_card')." (goods_id, card_sn, card_password, end_date, add_date, crc32) ".
                       "VALUES ('$_POST[goods_id]', '$coded_card_sn', '$coded_card_password', '$end_date', '$add_date', '" . crc32(AUTH_KEY) . "')";
                M()->exe($sql);
                
                /* 如果添加成功且原卡号为空时商品库存加1 */
                if (empty($_POST['old_card_sn']))
                {
                    $sql = "UPDATE ".$ecs->table('ec_goods')." SET goods_number= goods_number+1 WHERE goods_id='$_POST[goods_id]'";
                    M()->exe($sql);
                }
                $link[] = array('text'=>L('admin_ecvirtualcard_common5'), 'href'=>U('index').'&act=card&goods_id='.$_POST['goods_id']);
                $link[] = array('text'=>L('admin_ecvirtualcard_common11'), 'href'=>U('index').'&act=replenish&goods_id='.$_POST['goods_id']);
                $this->sys_msg(L('admin_ecvirtualcard_common10'), 0, $link);
            }
            else
            {
                /* 更新数据 */
                $end_date = strtotime($_POST['end_dateYear'] . "-" . $_POST['end_dateMonth'] . "-" . $_POST['end_dateDay']);
                $sql = "UPDATE ".$ecs->table('ec_virtual_card')." SET card_sn='$coded_card_sn', card_password='$coded_card_password', end_date='$end_date' ".
                       "WHERE card_id='$_POST[card_id]'";
                M()->exe($sql);
        
        
                $link[] = array('text'=>L('admin_ecvirtualcard_common5'), 'href'=>U('index').'&act=card&goods_id='.$_POST['goods_id']);
                $link[] = array('text'=>L('admin_ecvirtualcard_common11'), 'href'=>U('index').'&act=replenish&goods_id='.$_POST['goods_id']);
                $this->sys_msg(L('admin_ecvirtualcard_common10'), 0, $link);
                
            }

        }
        /*------------------------------------------------------ */
        //-- 补货列表
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'card')
        {
            /* 验证goods_id是否合法 */
            if (empty($_REQUEST['goods_id']))
            {
                $link[] = array('text'=>L('admin_ecvirtualcard_common1'),'href'=>U('Admin/EcGoods/index').'&act=list&extension_code=virtual_card');
                $this->sys_msg(L('admin_ecvirtualcard_common2'), 1, $link);
            }
            else
            {
                $goods_name = M()->GetOne("SELECT goods_name From ".$ecs->table('ec_goods')." WHERE goods_id='".$_REQUEST['goods_id']."' AND is_real = 0 AND extension_code='virtual_card' ",'goods_name');
                if (empty($goods_name))
                {
                    $link[] = array('text'=>L('admin_ecvirtualcard_common1'),'href'=>U('Admin/EcGoods/index').'&act=list&extension_code=virtual_card');
                    $this-> sys_msg(L('admin_ecvirtualcard_common3'), 1, $link);
                }
            }
            
            if (empty($_REQUEST['order_sn']))
            {
                $_REQUEST['order_sn'] = '';
            }
            
            $this->assign('goods_id',     $_REQUEST['goods_id']);
            $this->assign('full_page',    1);
            //$this->assign('lang',         $_LANG);
            $this->assign('ur_here',      $goods_name);
            $this->assign('action_link',  array('text'    => L('admin_ecvirtualcard_common4'),
                                                    'href'  => U('index').'&act=replenish&goods_id='.$_REQUEST['goods_id']));
            $this->assign('goods_id',      $_REQUEST['goods_id']);
        
            $list = $this-> get_replenish_list();
        
            $this->assign('card_list',    $list['item']);
            $this->assign('filter',       $list['filter']);
            $this->assign('record_count', $list['record_count']);
            $this->assign('page_count',   $list['page_count']);
        
            $sort_flag = sort_flag($list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            //assign_query_info();
            $this->display('replenish_list.htm');

        }
        /*------------------------------------------------------ */
        //-- 虚拟卡列表，用于排序、翻页
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'query_card')
        {
            $list = $this-> get_replenish_list();
        
            $this->assign('card_list',    $list['item']);
            $this->assign('filter',       $list['filter']);
            $this->assign('record_count', $list['record_count']);
            $this->assign('page_count',   $list['page_count']);
        
            $sort_flag = sort_flag($list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('replenish_list.htm'), '',
                array('filter'=>$list['filter'], 'page_count'=>$list['page_count']));
        }
        /* 批量删除card */
        elseif ($_REQUEST['act'] == 'batch_drop_card')
        {
        
            $num = count($_POST['checkboxes']);
            $sql = "DELETE FROM ".$ecs->table('ec_virtual_card').
                    " WHERE card_id ".db_create_in(implode(',',$_POST['checkboxes']));
            if (M()->exe($sql))
            {
                /* 商品数量减$num */
                $this-> update_goods_number(intval($_REQUEST['goods_id']));
                $link[] = array('text'=>L('admin_ecvirtualcard_common5'), 'href'=>U('index').'&act=card&goods_id='.$_REQUEST['goods_id']);
                $this->sys_msg(L('admin_ecvirtualcard_common10'), 0, $link);
            }
        }
        elseif ($_REQUEST['act'] == 'batch_card_add')
        {
        
            $this->assign('ur_here',          L('admin_ecvirtualcard_common6'));
            $this->assign('action_link',      array('text'=>L('admin_ecvirtualcard_control_index_batch_card_add1'), 'href'=>U('Admin/EcGoods/index').'&act=list&extension_code=virtual_card'));
            $this->assign('goods_id',           $_REQUEST['goods_id']);
            $this->display('batch_card_info.htm');
        }
        elseif ($_REQUEST['act'] == 'batch_confirm')
        {
            /* 检查上传是否成功 */
            if ($_FILES['uploadfile']['tmp_name'] == '' || $_FILES['uploadfile']['tmp_name'] == 'none')
            {
                $this->sys_msg(L('admin_ecvirtualcard_control_index_batch_confirm1'), 1);
            }
            $data = file($_FILES['uploadfile']['tmp_name']);
            $rec = array(); //数据数组
            $i = 0;
            $separator = trim($_POST['separator']);
            foreach ($data as $line)
            {
                $row = explode($separator, $line);
                switch(count($row))
                {
                    case '3':
                        $rec[$i]['end_date'] = $row[2];
                    case '2':
                        $rec[$i]['card_password'] = $row[1];
                    case '1':
                        $rec[$i]['card_sn']  = $row[0];
                        break;
                    default:
                        $rec[$i]['card_sn']  = $row[0];
                        $rec[$i]['card_password'] = $row[1];
                        $rec[$i]['end_date'] = $row[2];
                        break;
                }
                $i++;
            }
            //p($rec);die;
            $this->assign('ur_here',          L('admin_ecvirtualcard_common6'));
            $this->assign('action_link',      array('text'=>L('admin_ecvirtualcard_common6'), 'href'=>U('index').'&act=batch_card_add&goods_id='.$_REQUEST['goods_id']));
            $this->assign('list',               $rec);
            $this->display('batch_card_confirm.htm');
            
        }
        /* 批量上传处理 */
        elseif ($_REQUEST['act'] == 'batch_insert')
        {
        
            $add_time = gmtime();
            $i = 0;
            foreach ($_POST['checked'] as $key)
            {
                $rec['card_sn']  = encrypt($_POST['card_sn'][$key]);
                $rec['card_password'] = encrypt($_POST['card_password'][$key]);
                $rec['crc32']    = crc32(AUTH_KEY);
                $rec['end_date'] = empty($_POST['end_date'][$key]) ? 0 : strtotime($_POST['end_date'][$key]);
                $rec['goods_id'] = $_POST['goods_id'];
                $rec['add_date'] = $add_time;
                M()->AutoExecute($ecs->table('ec_virtual_card'), $rec, 'INSERT');
                $i++;
            }
        
            /* 更新商品库存 */
            $this-> update_goods_number(intval($_REQUEST['goods_id']));
            $link[] = array('text' => L('admin_ecvirtualcard_control_index_batch_insert1') , 'href' => U('index').'&act=card&goods_id='.$_POST['goods_id']);
            $this->sys_msg(sprintf(L('admin_ecvirtualcard_control_index_batch_insert2'), $i) , 0, $link);
        }
        /*------------------------------------------------------ */
        //-- 更改加密串
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'change')
        {

            $this->assign('ur_here', L('admin_ecvirtualcard_control_index_change1'));
        
            //assign_query_info();
            $this->display('virtual_card_change.htm');
        }

        /*------------------------------------------------------ */
        //-- 切换是否已出售状态
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'toggle_sold')
        {
        
            $id = intval($_POST['id']);
            $val = intval($_POST['val']);
        
            $sql = "UPDATE ".$ecs->table('ec_virtual_card')." SET is_saled= '$val' WHERE card_id='$id'";
        
            if (M()->exe($sql))
            {
                /* 修改商品库存 */
                $sql = "SELECT goods_id FROM " . $ecs->table('ec_virtual_card') . " WHERE card_id = '$id' LIMIT 1";
                $goods_id = M()->getOne($sql,'goods_id');
        
                $this->update_goods_number($goods_id);
                make_json_result($val);
            }
            else
            {
                make_json_error(L('admin_ecvirtualcard_control_index_toggle_sold1') . "\n" );
            }
}

        /*------------------------------------------------------ */
        //-- 删除卡片
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove_card')
        {
            $id = intval($_GET['id']);

            $row = M()->GetRowSql('SELECT card_sn, goods_id FROM ' . $ecs->table('ec_virtual_card') . " WHERE card_id = '$id'");
        
            $sql = 'DELETE FROM ' . $ecs->table('ec_virtual_card') . " WHERE card_id = '$id'";
            if (M()->exe($sql))
            {
                /* 修改商品数量 */
                $this-> update_goods_number($row['goods_id']);
        
                $url = 'index.php?act=query_card&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
                ec_header("Location: $url\n");
                exit;
            }
            else
            {
                make_json_error($db->error());
            }
        }
        /*------------------------------------------------------ */
        //-- 开始更改加密串：先检查原串和新串
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'start_change')
        {
            
            $old_key = json_str_iconv(trim($_GET['old_key']));
            $new_key = json_str_iconv(trim($_GET['new_key']));
            // 检查原加密串和新加密串是否相同
            if ($old_key == $new_key || crc32($old_key) == crc32($new_key))
            {
                make_json_error(L('admin_ecvirtualcard_control_index_start_change1'));
            }
            if ($old_key != AUTH_KEY)
            {
                make_json_error(L('admin_ecvirtualcard_control_index_start_change2'));
            }
            else
            {
                $f=ROOT_PATH . 'data/config/ec_config.inc.php';
                file_put_contents($f,str_replace("'AUTH_KEY', '".AUTH_KEY."'","'AUTH_KEY', '".$new_key."'",file_get_contents($f)));
                file_put_contents($f,str_replace("'OLD_AUTH_KEY', '".OLD_AUTH_KEY."'","'OLD_AUTH_KEY', '".$old_key."'",file_get_contents($f)));
                //@fclose($f);
            }
                //die;
            // 查询统计信息：总记录，使用原串的记录，使用新串的记录，使用未知串的记录
            $stat = array('all' => 0, 'new' => 0, 'old' => 0, 'unknown' => 0);
            $sql = "SELECT crc32, count(*) AS cnt FROM " . $ecs->table('ec_virtual_card') . " GROUP BY crc32";
            $res = M()->query($sql);
            if(!empty($res)){
                foreach($res as $row)
                {
                    $stat['all'] += $row['cnt'];
                    if (crc32($new_key) == $row['crc32'])
                    {
                        $stat['new'] += $row['cnt'];
                    }
                    elseif (crc32($old_key) == $row['crc32'])
                    {
                        $stat['old'] += $row['cnt'];
                    }
                    else
                    {
                        $stat['unknown'] += $row['cnt'];
                    }
                }
            }
            make_json_result(sprintf(L('admin_ecvirtualcard_control_index_start_change3'),
                                 $stat['all'], $stat['new'], $stat['old'], $stat['unknown']));
            //p($res);die;
        }
        /*------------------------------------------------------ */
        //-- 更新加密串
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'on_change')
        {
            // 重新加密卡号和密码
            $each_num    = 1;
            $old_crc32   = crc32(OLD_AUTH_KEY);
            $new_crc32   = crc32(AUTH_KEY);
            $updated     = intval($_GET['updated']);
            
            $sql = "SELECT card_id, card_sn, card_password ".
                    " FROM " . $ecs->table('ec_virtual_card') .
                    " WHERE crc32 = '$old_crc32' LIMIT $each_num";
            $res = M()->query($sql);
            if(!empty($res)){
                foreach($res as $row)
                {
                    $row['card_sn']       = encrypt(decrypt($row['card_sn'], OLD_AUTH_KEY));
                    $row['card_password'] = encrypt(decrypt($row['card_password'], OLD_AUTH_KEY));
                    $row['crc32']         = $new_crc32;
                    
                    if (!M()->autoExecute($ecs->table('ec_virtual_card'), $row, 'UPDATE', 'card_id = ' . $row['card_id']))
                   {
                       make_json_error($updated, 0, L('admin_ecvirtualcard_control_index_on_change1') ."\n");
                   }
            
                   $updated++;
                }
            }
            // 查询是否还有未更新的
            $sql      = "SELECT COUNT(*) FROM " . $ecs->table('ec_virtual_card') . " WHERE crc32 = '$old_crc32' ";
            $left_num = M()->getOne($sql,'COUNT(*)');
            if ($left_num > 0)
            {
                make_json_result($updated);
            }
            else
            {
                // 查询统计信息
                $stat = array('new' => 0, 'unknown' => 0);
                $sql = "SELECT crc32, count(*) AS cnt FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_virtual_card') . " GROUP BY crc32";
                $res = M()->query($sql);
                if(!empty($res)){
                    foreach($res as $row)
                    {
                        if ($new_crc32 == $row['crc32'])
                        {
                            $stat['new'] += $row['cnt'];
                        }
                        else
                        {
                            $stat['unknown'] += $row['cnt'];
                        }
                    }
                }
                make_json_result($updated, sprintf(L('admin_ecvirtualcard_control_index_on_change2'), $stat['new'], $stat['unknown']));
            }
        }
    }
    
    

    
    /**
     * 返回补货列表
     *
     * @return array
     */
    public function get_replenish_list()
    {
        /* 查询条件 */
        $filter['goods_id']    = empty($_REQUEST['goods_id'])    ? 0 : intval($_REQUEST['goods_id']);
        $filter['search_type'] = empty($_REQUEST['search_type']) ? 0 : trim($_REQUEST['search_type']);
        $filter['order_sn']    = empty($_REQUEST['order_sn'])    ? 0 : trim($_REQUEST['order_sn']);
        $filter['keyword']     = empty($_REQUEST['keyword'])     ? 0 : trim($_REQUEST['keyword']);
        if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
        {
            $filter['keyword'] = json_str_iconv($filter['keyword']);
        }
        $filter['sort_by']     = empty($_REQUEST['sort_by'])     ? 'card_id' : trim($_REQUEST['sort_by']);
        $filter['sort_order']  = empty($_REQUEST['sort_order'])  ? 'DESC' : trim($_REQUEST['sort_order']);
    
        $where  = (!empty($filter['goods_id'])) ? " AND goods_id = '" . $filter['goods_id'] . "' " : '';
        $where .= (!empty($filter['order_sn'])) ? " AND order_sn LIKE '%" . mysql_like_quote($filter['order_sn']) . "%' " : '';
        if (!empty($filter['keyword']))
        {
            if ($filter['search_type'] == 'card_sn')
            {
                $where .= " AND card_sn = '" .encrypt($filter['keyword']). "'";
            }
            else
            {
                $where .= " AND order_sn LIKE '%" . mysql_like_quote($filter['keyword']). "%' ";
            }
        }
        $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_virtual_card') . " WHERE 1 $where";
        $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
    
        /* 分页大小 */
        $filter = page_and_size($filter);
        $start  = ($filter['page'] - 1) * $filter['page_size'];
        
        /* 查询 */
        $sql = "SELECT card_id, goods_id, card_sn, card_password, end_date, is_saled, order_sn, crc32 ".
                " FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_virtual_card').
                " WHERE 1 ".$where.
                " ORDER BY $filter[sort_by] $filter[sort_order] ".
                " LIMIT $start, $filter[page_size]";
        $all = M()->getAll($sql);
        $arr = array();
        //echo crc32(AUTH_KEY);die;
        if(!empty($all))
        {
            foreach($all as $row)
            {
                
                if ($row['crc32'] == 0 || $row['crc32'] == crc32(AUTH_KEY))
                {
                    $row['card_sn']       = decrypt($row['card_sn']);
                    $row['card_password'] = decrypt($row['card_password']);
                }
                
                elseif ($row['crc32'] == crc32(OLD_AUTH_KEY))
                {
                    $row['card_sn']       = decrypt($row['card_sn'], OLD_AUTH_KEY);
                    $row['card_password'] = decrypt($row['card_password'], OLD_AUTH_KEY);
                }
                else
                {
                    $row['card_sn']       = '***';
                    $row['card_password'] = '***';
                }
        
                $row['end_date'] = $row['end_date'] == 0 ? '' : date(C('ec_date_format'), $row['end_date']);
        
                $arr[] = $row;
            }
        }
        
        return array(
                'item' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 
                'record_count' => $filter['record_count']);
        
    }
    
    /**
     * 更新虚拟商品的商品数量
     *
     * @access  public
     * @param   int     $goods_id
     *
     * @return bool
     */
    public function update_goods_number($goods_id)
    {
        $sql = "SELECT COUNT(*) 
                FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_virtual_card') . " WHERE goods_id = '$goods_id' AND is_saled = 0";
        $goods_number = M()->getOne($sql,'COUNT(*)');
    
        $sql = "UPDATE " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " SET goods_number = '$goods_number' WHERE goods_id = '$goods_id' AND extension_code='virtual_card'";
    
        return M()->exe($sql);
    }
    
    

}
?>