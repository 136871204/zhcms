<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcBonusControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("Brand");
       // define('EC_CHARSET','utf-8');
	}
    
    public function index(){
        $ecs=$GLOBALS['ec_globals']['ecs'];
	    //$image = new EcImage(C('ec_bgcolor'));
	    $tdb=M();
        $exc = new exchange($ecs->table('ec_bonus_type'), $tdb, 'type_id', 'type_name');
        
        /*------------------------------------------------------ */
        //-- 红包类型列表页面
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'list')
        {
            $this->assign('ur_here',     '红包类型');
            $this->assign('action_link', array('text' => '添加红包类型', 'href' => U('index',array('act'=>'add'))));
            $this->assign('full_page',   1);
        
            $list = $this->get_type_list();
        
            $this->assign('type_list',    $list['item']);
            $this->assign('filter',       $list['filter']);
            $this->assign('record_count', $list['record_count']);
            $this->assign('page_count',   $list['page_count']);
        
            $sort_flag  = sort_flag($list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            //assign_query_info();
            $this->display('bonus_type.htm');
        }
        /*------------------------------------------------------ */
        //-- 翻页、排序
        /*------------------------------------------------------ */
        
        if ($_REQUEST['act'] == 'query')
        {
            $list = $this->get_type_list();
        
            $this->assign('type_list',    $list['item']);
            $this->assign('filter',       $list['filter']);
            $this->assign('record_count', $list['record_count']);
            $this->assign('page_count',   $list['page_count']);
        
            $sort_flag  = sort_flag($list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('bonus_type.htm'), '',
                array('filter' => $list['filter'], 'page_count' => $list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 编辑红包类型名称
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'edit_type_name')
        {
        
            $id = intval($_POST['id']);
            $val = json_str_iconv(trim($_POST['val']));
        
            /* 检查红包类型名称是否重复 */
            if (!$exc->is_only('type_name', $id, $val))
            {
                make_json_error('此类型的名称已经存在!');
            }
            else
            {
                $exc->edit("type_name='$val'", $id);
        
                make_json_result(stripslashes($val));
            }
        }
        /*------------------------------------------------------ */
        //-- 编辑红包金额
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'edit_type_money')
        {
        
            $id = intval($_POST['id']);
            $val = floatval($_POST['val']);
        
            /* 检查红包类型名称是否重复 */
            if ($val <= 0)
            {
                make_json_error('金额必须是数字并且不能小于 0 !');
            }
            else
            {
                $exc->edit("type_money='$val'", $id);
        
                make_json_result(number_format($val, 2));
            }
        }
        /*------------------------------------------------------ */
        //-- 编辑订单下限
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'edit_min_amount')
        {
        
            $id = intval($_POST['id']);
            $val = floatval($_POST['val']);
        
            if ($val < 0)
            {
                make_json_error('红包类型的订单下限不能为空！');
            }
            else
            {
                $exc->edit("min_amount='$val'", $id);
        
                make_json_result(number_format($val, 2));
            }
        }
        /*------------------------------------------------------ */
        //-- 删除红包类型
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'remove')
        {
            $id = intval($_GET['id']);
        
            $exc->drop($id);
        
            /* 更新商品信息 */
            M()->exe("UPDATE " .$ecs->table('ec_goods'). " SET bonus_type_id = 0 WHERE bonus_type_id = '$id'");
        
            /* 删除用户的红包 */
            M()->exe("DELETE FROM " .$ecs->table('ec_user_bonus'). " WHERE bonus_type_id = '$id'");
        
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
            exit;
        }
        /*------------------------------------------------------ */
        //-- 红包类型添加页面
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'add')
        {
            //$this->assign('lang',         $_LANG);
            $this->assign('ur_here',      '添加红包类型');
            $this->assign('action_link',  array('href' => U('index',array('act'=>'list')), 'text' => '红包类型'));
            $this->assign('action',       'add');
        
            $this->assign('form_act',     'insert');
            //$this->assign('cfg_lang',     $_CFG['lang']);
        
            $next_month = local_strtotime('+1 months');
            $bonus_arr['send_start_date']   = local_date('Y-m-d');
            $bonus_arr['use_start_date']    = local_date('Y-m-d');
            $bonus_arr['send_end_date']     = local_date('Y-m-d', $next_month);
            $bonus_arr['use_end_date']      = local_date('Y-m-d', $next_month);
        
            $this->assign('bonus_arr',    $bonus_arr);
        
            //assign_query_info();
            $this->display('bonus_type_info.htm');
        }
        /*------------------------------------------------------ */
        //-- 红包类型添加的处理
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'insert')
        {
            /* 去掉红包类型名称前后的空格 */
            $type_name   = !empty($_POST['type_name']) ? trim($_POST['type_name']) : '';
        
            /* 初始化变量 */
            $type_id     = !empty($_POST['type_id'])    ? intval($_POST['type_id'])    : 0;
            $min_amount  = !empty($_POST['min_amount']) ? intval($_POST['min_amount']) : 0;
        
            /* 检查类型是否有重复 */
            $sql = "SELECT COUNT(*) FROM " .$ecs->table('ec_bonus_type'). " WHERE type_name='$type_name'";
            if (M()->getOne($sql,'COUNT(*)') > 0)
            {
                $link[] = array('text' => '返回', 'href' => 'javascript:history.back(-1)');
                $this->sys_msg('此类型的名称已经存在!', 0, $link);
            }
        
            /* 获得日期信息 */
            $send_startdate = local_strtotime($_POST['send_start_date']);
            $send_enddate   = local_strtotime($_POST['send_end_date']);
            $use_startdate  = local_strtotime($_POST['use_start_date']);
            $use_enddate    = local_strtotime($_POST['use_end_date']);
        
            /* 插入数据库。 */
            $sql = "INSERT INTO ".$ecs->table('ec_bonus_type')." (type_name, type_money,send_start_date,send_end_date,use_start_date,use_end_date,send_type,min_amount,min_goods_amount)
            VALUES ('$type_name',
                    '$_POST[type_money]',
                    '$send_startdate',
                    '$send_enddate',
                    '$use_startdate',
                    '$use_enddate',
                    '$_POST[send_type]',
                    '$min_amount','" . floatval($_POST['min_goods_amount']) . "')";
        
            M()->exe($sql);
            /* 记录管理员操作 */
            admin_log($_POST['type_name'], '添加', '红包类型');
        
            /* 清除缓存 */
            clear_cache_files();
        
            /* 提示信息 */
            $link[0]['text'] = '继续添加红包类型';
            $link[0]['href'] = U('index',array('act'=>'add'));
        
            $link[1]['text'] = '返回红包类型列表';
            $link[1]['href'] = U('index',array('act'=>'list'));
        
            $this->sys_msg('添加' . "&nbsp;" .$_POST['type_name'] . "&nbsp;" . '操作成功!',0, $link);
        
        }
        /*------------------------------------------------------ */
        //-- 红包类型编辑页面
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'edit')
        {
        
            /* 获取红包类型数据 */
            $type_id = !empty($_GET['type_id']) ? intval($_GET['type_id']) : 0;
            $bonus_arr = M()->getRowSql("SELECT * FROM " .$ecs->table('ec_bonus_type'). " WHERE type_id = '$type_id'");
        
            $bonus_arr['send_start_date']   = local_date('Y-m-d', $bonus_arr['send_start_date']);
            $bonus_arr['send_end_date']     = local_date('Y-m-d', $bonus_arr['send_end_date']);
            $bonus_arr['use_start_date']    = local_date('Y-m-d', $bonus_arr['use_start_date']);
            $bonus_arr['use_end_date']      = local_date('Y-m-d', $bonus_arr['use_end_date']);
        
            //$this->assign('lang',        $_LANG);
            $this->assign('ur_here',     '编辑红包类型');
            $this->assign('action_link', array('href' => U('index').'&act=list&' . list_link_postfix(), 'text' => '红包类型'));
            $this->assign('form_act',    'update');
            $this->assign('bonus_arr',   $bonus_arr);
        
            //assign_query_info();
            $this->display('bonus_type_info.htm');
        }
        /*------------------------------------------------------ */
        //-- 红包类型编辑的处理
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'update')
        {
            /* 获得日期信息 */
            $send_startdate = local_strtotime($_POST['send_start_date']);
            $send_enddate   = local_strtotime($_POST['send_end_date']);
            $use_startdate  = local_strtotime($_POST['use_start_date']);
            $use_enddate    = local_strtotime($_POST['use_end_date']);
        
            /* 对数据的处理 */
            $type_name   = !empty($_POST['type_name'])  ? trim($_POST['type_name'])    : '';
            $type_id     = !empty($_POST['type_id'])    ? intval($_POST['type_id'])    : 0;
            $min_amount  = !empty($_POST['min_amount']) ? intval($_POST['min_amount']) : 0;
        
            $sql = "UPDATE " .$ecs->table('ec_bonus_type'). " SET ".
                   "type_name       = '$type_name', ".
                   "type_money      = '$_POST[type_money]', ".
                   "send_start_date = '$send_startdate', ".
                   "send_end_date   = '$send_enddate', ".
                   "use_start_date  = '$use_startdate', ".
                   "use_end_date    = '$use_enddate', ".
                   "send_type       = '$_POST[send_type]', ".
                   "min_amount      = '$min_amount', " .
                   "min_goods_amount = '" . floatval($_POST['min_goods_amount']) . "' ".
                   "WHERE type_id   = '$type_id'";
        
           M()->exe($sql);
           /* 记录管理员操作 */
           admin_log($_POST['type_name'], '编辑', '红包类型');
        
           /* 清除缓存 */
           clear_cache_files();
        
           /* 提示信息 */
           $link[] = array('text' => '返回列表', 'href' => U('index').'&act=list&' . list_link_postfix());
           $this->sys_msg('编辑' .' '.$_POST['type_name'].' '. '操作成功!', 0, $link);
        
        }
        /*------------------------------------------------------ */
        //-- 红包发送页面
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'send')
        {
        
            /* 取得参数 */
            $id = !empty($_REQUEST['id'])  ? intval($_REQUEST['id'])  : '';
        
            //assign_query_info();
        
            $this->assign('ur_here',      '发放红包');
            $this->assign('action_link',  array('href' => U('index',array('act'=>'list')), 'text' => '红包类型'));
        
            if ($_REQUEST['send_by'] == SEND_BY_USER)
            {
                $this->assign('id',           $id);
                $this->assign('ranklist',     get_rank_list());
        
                $this->display('bonus_by_user.htm');
            }
            elseif ($_REQUEST['send_by'] == SEND_BY_GOODS)
            {
                /* 查询此红包类型信息 */
                $bonus_type = M()->GetRowSql("SELECT type_id, type_name FROM ".$ecs->table('ec_bonus_type').
                    " WHERE type_id='$_REQUEST[id]'");
        
                /* 查询红包类型的商品列表 */
                $goods_list = $this -> get_bonus_goods($_REQUEST['id']);
        
                /* 查询其他红包类型的商品 */
                $sql = "SELECT goods_id FROM " .$ecs->table('ec_goods').
                       " WHERE bonus_type_id > 0 AND bonus_type_id <> '$_REQUEST[id]'";
                $other_goods_list = M()->getCol($sql,'goods_id'); 
                if(!empty($other_goods_list)){
                    $this->assign('other_goods', join(',', $other_goods_list));
                }else
                {
                    $this->assign('other_goods', "");
                }
                
        
                /* 模板赋值 */
                $this->assign('cat_list',    cat_list());
                $this->assign('brand_list',  get_brand_list());
        
                $this->assign('bonus_type',  $bonus_type);
                $this->assign('goods_list',  $goods_list);
        
                $this->display('bonus_by_goods.htm');
            }
            elseif ($_REQUEST['send_by'] == SEND_BY_PRINT)
            {
                $this->assign('type_list',    get_bonus_type());
        
                $this->display('bonus_by_print.htm');
            }
        }
        /*------------------------------------------------------ */
        //-- 处理红包的发送页面
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'send_by_user')
        {
            $user_list  = array();
            $start      = empty($_REQUEST['start']) ? 0 : intval($_REQUEST['start']);
            $limit      = empty($_REQUEST['limit']) ? 1 : intval($_REQUEST['limit']);
            $validated_email = empty($_REQUEST['validated_email']) ? 0 : intval($_REQUEST['validated_email']);
            $send_count = 0;
            
            if (isset($_REQUEST['send_rank']))
            {
                /* 按会员等级来发放红包 */
                $rank_id = intval($_REQUEST['rank_id']);
                if ($rank_id > 0)
                {
                    $sql = "SELECT min_points, max_points, special_rank FROM " . $ecs->table('ec_user_rank') . " WHERE rank_id = '$rank_id'";
                    $row = M()->getRowSql($sql);
                    if ($row['special_rank'])
                    {
                        /* 特殊会员组处理 */
                        $sql = 'SELECT COUNT(*) FROM ' . $ecs->table('ec_users'). " WHERE user_rank = '$rank_id'";
                        $send_count = M()->getOne($sql,'COUNT(*)');
                        if($validated_email)
                        {
                            $sql = 'SELECT user_id, email, user_name FROM ' . $ecs->table('ec_users').
                                    " WHERE user_rank = '$rank_id' AND is_validated = 1".
                                    " LIMIT $start, $limit";
                        }
                        else
                        {
                             $sql = 'SELECT user_id, email, user_name FROM ' . $ecs->table('ec_users').
                                        " WHERE user_rank = '$rank_id'".
                                        " LIMIT $start, $limit";
                        }
                    }
                    else
                    {
                        $sql = 'SELECT COUNT(*) FROM ' . $ecs->table('ec_users').
                               " WHERE rank_points >= " . intval($row['min_points']) . " AND rank_points < " . intval($row['max_points']);
                        $send_count = M()->getOne($sql,'COUNT(*)');
                        if($validated_email)
                        {
                            $sql = 'SELECT user_id, email, user_name FROM ' . $ecs->table('ec_users').
                                " WHERE rank_points >= " . intval($row['min_points']) . " AND rank_points < " . intval($row['max_points']) .
                                " AND is_validated = 1 LIMIT $start, $limit";
                        }
                        else
                        {
                             $sql = 'SELECT user_id, email, user_name FROM ' . $ecs->table('ec_users').
                                " WHERE rank_points >= " . intval($row['min_points']) . " AND rank_points < " . intval($row['max_points']) .
                                " LIMIT $start, $limit";
                        }
                    }
                    $user_list = M()->getAll($sql);
                    
                    $count = count($user_list);
                }
            }
            elseif (isset($_REQUEST['send_user']))
            {
                /* 按会员列表发放红包 */
                /* 如果是空数组，直接返回 */
                if (empty($_REQUEST['user']))
                {
                    $this -> sys_msg('用户没有选择', 1);
                }
        
                $user_array = (is_array($_REQUEST['user'])) ? $_REQUEST['user'] : explode(',', $_REQUEST['user']);
                $send_count = count($user_array);
        
                $id_array   = array_slice($user_array, $start, $limit);
        
                /* 根据会员ID取得用户名和邮件地址 */
                $sql = "SELECT user_id, email, user_name FROM " .$ecs->table('ec_users').
                       " WHERE user_id " .db_create_in($id_array);
                $user_list  = M()->getAll($sql);
                $count = count($user_list);
            }
            
            /* 发送红包 */
            $loop       = 0;
            $bonus_type = $this -> bonus_type_info($_REQUEST['id']);
        
            $tpl = get_mail_template('send_bonus');
            $today = local_date(C('ec_date_format'));
            if(!empty($user_list)){
                foreach ($user_list AS $key => $val)
                {
                    //p($val);
                    /* 发送邮件通知 */
                    $this->assign('username',    $val['user_name']);
                    $this->assign('shop_name',    C('ec_shop_name'));
                    $this->assign('send_date',    $today);
                    $this->assign('sent_date',    $today);
                    $this->assign('count',        1);
                    $this->assign('money',        price_format($bonus_type['type_money']));
                    
                    $content= $this -> view->contentCompile('str:' . $tpl['template_content']);
                    //p($content);die;
                    if ($this -> add_to_maillist($val['user_name'], $val['email'], $tpl['template_subject'], $content, $tpl['is_html']))
                    {
                         /* 向会员红包表录入数据 */
                        $sql = "INSERT INTO " . $ecs->table('ec_user_bonus') .
                                "(bonus_type_id, bonus_sn, user_id, used_time, order_id, emailed) " .
                                "VALUES ('$_REQUEST[id]', 0, '$val[user_id]', 0, 0, " .BONUS_MAIL_SUCCEED. ")";
                        M()->exe($sql);
                    }
                    else
                    {
                        /* 邮件发送失败，更新数据库 */
                        $sql = "INSERT INTO " . $ecs->table('ec_user_bonus') .
                                "(bonus_type_id, bonus_sn, user_id, used_time, order_id, emailed) " .
                                "VALUES ('$_REQUEST[id]', 0, '$val[user_id]', 0, 0, " .BONUS_MAIL_FAIL. ")";
                        M()->exe($sql);
                    }
                    //p($sql);//die;
                    if ($loop >= $limit)
                    {
                        break;
                    }
                    else
                    {
                        $loop++;
                    }
                }
            }
            
            if ($send_count > ($start + $limit))
            {
                /*  */
                $href = U('index')."&act=send_by_user&start=" . ($start+$limit) . "&limit=$limit&id=$_REQUEST[id]&";
        
                if (isset($_REQUEST['send_rank']))
                {
                    $href .= "send_rank=1&rank_id=$rank_id";
                }
        
                if (isset($_REQUEST['send_user']))
                {
                    $href .= "send_user=1&user=" . implode(',', $user_array);
                }
        
                $link[] = array('text' => '继续发放红包', 'href' => $href);
            }
            $link[] = array('text' => '返回列表', 'href' => U('index',array('act'=>'list')));

            $this -> sys_msg(sprintf( '共发送了 %d 个红包。', $count), 0, $link);
        }
        /*------------------------------------------------------ */
        //-- 发送邮件
        /*------------------------------------------------------ */
        
        if ($_REQUEST['act'] == 'send_mail')
        {
            /* 取得参数：红包id */
            $bonus_id = intval($_REQUEST['bonus_id']);
            if ($bonus_id <= 0)
            {
                die('参数错误');
            }
        
            /* 取得红包信息 */
            //include_once(ROOT_PATH . 'includes/lib_order.php');
            $bonus = bonus_info($bonus_id);
            if (empty($bonus))
            {
                $this -> sys_msg('该红包不存在');
            }
        
            /* 发邮件 */
            $count = $this-> send_bonus_mail($bonus['bonus_type_id'], array($bonus_id));
        
            $link[0]['text'] = '返回红包列表';
            $link[0]['href'] = U('index').'&act=bonus_list&bonus_type=' . $bonus['bonus_type_id'];
        
            $this -> sys_msg(sprintf('%d 封邮件已被加入邮件列表', $count), 0, $link);
        }
        /*------------------------------------------------------ */
        //-- 按印刷品发放红包
        /*------------------------------------------------------ */
        
        if ($_REQUEST['act'] == 'send_by_print')
        {
            @set_time_limit(0);
            /* 红下红包的类型ID和生成的数量的处理 */
            $bonus_typeid = !empty($_POST['bonus_type_id']) ? $_POST['bonus_type_id'] : 0;
            $bonus_sum    = !empty($_POST['bonus_sum'])     ? $_POST['bonus_sum']     : 1;
            
            /* 生成红包序列号 */
            $num = M()->getOne("SELECT MAX(bonus_sn) FROM ". $ecs->table('ec_user_bonus'),'MAX(bonus_sn)');
            $num = $num ? floor($num / 10000) : 100000;
            
            for ($i = 0, $j = 0; $i < $bonus_sum; $i++)
            {
                $bonus_sn = ($num + $i) . str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
                M()->exe("INSERT INTO ".$ecs->table('ec_user_bonus')." (bonus_type_id, bonus_sn) VALUES('$bonus_typeid', '$bonus_sn')");
        
                $j++;
            }
            
            /* 记录管理员操作 */
            admin_log($bonus_sn, '添加', '用户红包');
            
            /* 清除缓存 */
            clear_cache_files();
        
            /* 提示信息 */
            $link[0]['text'] = '返回红包列表';
            $link[0]['href'] = U('index').'&act=bonus_list&bonus_type=' . $bonus_typeid;
        
            $this -> sys_msg('生成了 ' . $j . ' 个红包序列号' , 0, $link);
        }
        /*------------------------------------------------------ */
        //-- 导出线下发放的信息
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'gen_excel')
        {
            @set_time_limit(0);
            /* 获得此线下红包类型的ID */
            $tid  = !empty($_GET['tid']) ? intval($_GET['tid']) : 0;
            $type_name = M()->getOne("SELECT type_name FROM ".$ecs->table('ec_bonus_type')." WHERE type_id = '$tid'",'type_name');
        
            /* 文件名称 */
            $bonus_filename = $type_name .'_bonus_list';
            if (EC_CHARSET != 'gbk')
            {
                $bonus_filename = ecs_iconv('UTF8', 'GB2312',$bonus_filename);
            }
            header("Content-type: application/vnd.ms-excel; charset=utf-8");
            header("Content-Disposition: attachment; filename=$bonus_filename.xls");
            /* 文件标题 */
            if (EC_CHARSET != 'gbk')
            {
                echo ecs_iconv('UTF8', 'GB2312', '线下红包信息列表') . "\t\n";
                /* 红包序列号, 红包金额, 类型名称(红包名称), 使用结束日期 */
                echo ecs_iconv('UTF8', 'GB2312', '红包序列号') ."\t";
                echo ecs_iconv('UTF8', 'GB2312', '红包金额') ."\t";
                echo ecs_iconv('UTF8', 'GB2312', '类型名称') ."\t";
                echo ecs_iconv('UTF8', 'GB2312', '使用结束日期') ."\t\n";
            }
            else
            {
                echo '线下红包信息列表' . "\t\n";
                /* 红包序列号, 红包金额, 类型名称(红包名称), 使用结束日期 */
                echo '红包序列号' ."\t";
                echo '红包金额' ."\t";
                echo '类型名称' ."\t";
                echo '使用结束日期' ."\t\n";
            }
            
            $val = array();
            $sql = "SELECT ub.bonus_id, ub.bonus_type_id, ub.bonus_sn, bt.type_name, bt.type_money, bt.use_end_date ".
                       "FROM ".$ecs->table('ec_user_bonus')." AS ub, ".$ecs->table('ec_bonus_type')." AS bt ".
                       "WHERE bt.type_id = ub.bonus_type_id AND ub.bonus_type_id = '$tid' ORDER BY ub.bonus_id DESC";
            $res = M()->query($sql);
            
            $code_table = array();
            if(!empty($res)){
                foreach($res as $val)
                {
                    echo $val['bonus_sn'] . "\t";
                    echo $val['type_money'] . "\t";
                    if (!isset($code_table[$val['type_name']]))
                    {
                        if (EC_CHARSET != 'gbk')
                        {
                            $code_table[$val['type_name']] = ecs_iconv('UTF8', 'GB2312', $val['type_name']);
                        }
                        else
                        {
                            $code_table[$val['type_name']] = $val['type_name'];
                        }
                    }
                    echo $code_table[$val['type_name']] . "\t";
                    echo local_date('Y-m-d', $val['use_end_date']);
                    echo "\t\n";
                }
            }
            die;
            
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
                $opt[] = array('value'  => $val['goods_id'],
                                'text'  => $val['goods_name'],
                                'data'  => $val['shop_price']);
            }
        
            make_json_result($opt);
        }
        /*------------------------------------------------------ */
        //-- 添加发放红包的商品
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'add_bonus_goods')
        {
            $json = new JSON;
        
        
            $add_ids    = $json->decode($_GET['add_ids']);
            $args       = $json->decode($_GET['JSON']);
            $type_id    = $args[0];
        
            foreach ($add_ids AS $key => $val)
            {
                $sql = "UPDATE " .$ecs->table('ec_goods'). " SET bonus_type_id='$type_id' WHERE goods_id='$val'";
                M()->exe($sql);
            }
        
            /* 重新载入 */
            $arr = $this -> get_bonus_goods($type_id);
            $opt = array();
        
            if(!empty($arr))
            {
                foreach ($arr AS $key => $val)
                {
                    $opt[] = array('value'  => $val['goods_id'],
                                    'text'  => $val['goods_name'],
                                    'data'  => '');
                }
            }
            
        
            make_json_result($opt);
        }
        /*------------------------------------------------------ */
        //-- 删除发放红包的商品
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'drop_bonus_goods')
        {
            $json = new JSON;
        
        
            $drop_goods     = $json->decode($_GET['drop_ids']);
            $drop_goods_ids = db_create_in($drop_goods);
            $arguments      = $json->decode($_GET['JSON']);
            $type_id        = $arguments[0];
        
            M()->exe("UPDATE ".$ecs->table('ec_goods')." SET bonus_type_id = 0 ".
                        "WHERE bonus_type_id = '$type_id' AND goods_id " .$drop_goods_ids);
        
            /* 重新载入 */
            $arr =  $this -> get_bonus_goods($type_id);
            $opt = array();
        
            if(!empty($arr))
            {
                foreach ($arr AS $key => $val)
                {
                    $opt[] = array('value'  => $val['goods_id'],
                                    'text'  => $val['goods_name'],
                                    'data'  => '');
                } 
            }
            
        
            make_json_result($opt);
        }

        /*------------------------------------------------------ */
        //-- 搜索用户
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'search_users')
        {
            $keywords = json_str_iconv(trim($_GET['keywords']));
        

            $sql = "SELECT user_id, user_name FROM " . $ecs->table('ec_users') .
                    " WHERE user_name LIKE '%" . mysql_like_quote($keywords) . "%' OR user_id LIKE '%" . mysql_like_quote($keywords) . "%'";
            $row = M()->getAll($sql);
        
            make_json_result($row);
        }
        
        /*------------------------------------------------------ */
        //-- 红包列表
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'bonus_list')
        {
            $this->assign('full_page',    1);
            $this->assign('ur_here',      '红包列表');
            $this->assign('action_link',   array('href' => U('index',array('act'=>'list')), 'text' => '红包类型'));
        
            $list = $this -> get_bonus_list();
        
            /* 赋值是否显示红包序列号 */
            $bonus_type = $this -> bonus_type_info(intval($_REQUEST['bonus_type']));
            if ($bonus_type['send_type'] == SEND_BY_PRINT)
            {
                $this->assign('show_bonus_sn', 1);
            }
        
            /* 赋值是否显示发邮件操作和是否发过邮件 */
            elseif ($bonus_type['send_type'] == SEND_BY_USER)
            {
                $this->assign('show_mail', 1);
            }
        
            $this->assign('bonus_list',   $list['item']);
            $this->assign('filter',       $list['filter']);
            $this->assign('record_count', $list['record_count']);
            $this->assign('page_count',   $list['page_count']);
        
            $sort_flag  = sort_flag($list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            //assign_query_info();
            $this->display('bonus_list.htm');
        }
        /*------------------------------------------------------ */
        //-- 红包列表翻页、排序
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'query_bonus')
        {
            $list = $this->get_bonus_list();
            
            /* 赋值是否显示红包序列号 */
            $bonus_type = $this -> bonus_type_info(intval($_REQUEST['bonus_type']));
            if ($bonus_type['send_type'] == SEND_BY_PRINT)
            {
                $this->assign('show_bonus_sn', 1);
            }
        
            /* 赋值是否显示发邮件操作和是否发过邮件 */
            elseif ($bonus_type['send_type'] == SEND_BY_USER)
            {
                $this->assign('show_mail', 1);
            }
        
            $this->assign('bonus_list',   $list['item']);
            $this->assign('filter',       $list['filter']);
            $this->assign('record_count', $list['record_count']);
            $this->assign('page_count',   $list['page_count']);
        
            $sort_flag  = sort_flag($list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('bonus_list.htm'), '',
                array('filter' => $list['filter'], 'page_count' => $list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 删除红包
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove_bonus')
        {
        
            $id = intval($_GET['id']);
        
            M()->exe("DELETE FROM " .$ecs->table('ec_user_bonus'). " WHERE bonus_id='$id'");
        
            $url = 'index.php?act=query_bonus&' . str_replace('act=remove_bonus', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
            exit;
        }

        /*------------------------------------------------------ */
        //-- 批量操作
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'batch')
        {
            /* 去掉参数：红包类型 */
            $bonus_type_id = intval($_REQUEST['bonus_type']);
            
            /* 取得选中的红包id */
            if (isset($_POST['checkboxes']))
            {
                $bonus_id_list = $_POST['checkboxes'];
                /* 删除红包 */
                if (isset($_POST['drop']))
                {
                    $sql = "DELETE FROM " . $ecs->table('ec_user_bonus'). " WHERE bonus_id " . db_create_in($bonus_id_list);
                    M()->exe($sql);
                    admin_log(count($bonus_id_list), '删除', '用户红包');
                    
                    clear_cache_files();
                    $link[] = array('text' => '返回红包列表',
                        'href' => U('index').'&act=bonus_list&bonus_type='. $bonus_type_id);
                    $this->sys_msg(sprintf('成功删除了 %d 个用户红包', count($bonus_id_list)), 0, $link);
                }
                /* 发邮件 */
                elseif (isset($_POST['mail']))
                {
                    $count = $this -> send_bonus_mail($bonus_type_id, $bonus_id_list);
                    $link[] = array('text' => '返回红包列表',
                        'href' => U('index').'&act=bonus_list&bonus_type='. $bonus_type_id);
                    $this->sys_msg(sprintf('%d 封邮件已被加入邮件列表', $count), 0, $link);
                }
            }
            else
            {
                $this->sys_msg('您没有选择需要删除的用户红包', 1);
            }
        }

    }
    
    /**
    * 获取红包类型列表
    * @access  public
    * @return void
    */
    public function get_type_list()
    {
        
        /* 获得所有红包类型的发放数量 */
        $sql = "SELECT bonus_type_id, COUNT(*) AS sent_count".
                " FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_user_bonus') .
                " GROUP BY bonus_type_id";
        $res = M()->query($sql);
    
        $sent_arr = array();
        if(!empty($res)){
            foreach($res as $key=>$val){
                $sent_arr[$val['bonus_type_id']] = $val['sent_count'];
            }
        }
        /* 获得所有红包类型的发放数量 */
        $sql = "SELECT bonus_type_id, COUNT(*) AS used_count".
                " FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_user_bonus') .
                " WHERE used_time > 0".
                " GROUP BY bonus_type_id";
        $res = M()->query($sql);
        
        $used_arr = array();
        if(!empty($res)){
            foreach($res as $key=>$val){
                $used_arr[$val['bonus_type_id']] = $val['used_count'];
            }
        }
        
        $result = get_filter();
        //p($result);
        if ($result === false)
        {
            /* 查询条件 */
            $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'type_id' : trim($_REQUEST['sort_by']);
            $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
            
            $sql = "SELECT COUNT(*) FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_bonus_type');
            $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
            
            /* 分页大小 */
            $filter = page_and_size($filter);
        
            $sql = "SELECT * FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_bonus_type'). " ORDER BY $filter[sort_by] $filter[sort_order]";

            set_filter($filter, $sql);
        
        }else{
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        
        $arr = array();
        $res = M()->selectLimit($sql, $filter['page_size'], $filter['start']);
        
        $textArr=array();
        $textArr['send_by'][SEND_BY_USER] = '按用户发放';
        $textArr['send_by'][SEND_BY_GOODS] = '按商品发放';
        $textArr['send_by'][SEND_BY_ORDER] = '按订单金额发放';
        $textArr['send_by'][SEND_BY_PRINT] = '线下发放的红包';
        
        if(!empty($res)){
            foreach($res as $key=>$val){
                $val['send_by'] = $textArr['send_by'][$val['send_type']];
                $val['send_count'] = isset($sent_arr[$val['type_id']]) ? $sent_arr[$val['type_id']] : 0;
                $val['use_count'] = isset($used_arr[$val['type_id']]) ? $used_arr[$val['type_id']] : 0;
        
                $arr[] = $val;
            }
        }
        $arr = array('item' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count'],'page_size'=>$filter['page_size']);
        return $arr;
    }
    
    /**
     * 查询红包类型的商品列表
     *
     * @access  public
     * @param   integer $type_id
     * @return  array
     */
    public function get_bonus_goods($type_id)
    {
        $sql = "SELECT goods_id, goods_name FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_goods').
                " WHERE bonus_type_id = '$type_id'";
        $row = M()->getAll($sql);
    
        return $row;
    }
    
    /**
     * 获取用户红包列表
     * @access  public
     * @param   $page_param
     * @return void
     */
    public function get_bonus_list()
    {
        $_LANG['mail_status'][BONUS_NOT_MAIL] = '未发';
        $_LANG['mail_status'][BONUS_MAIL_FAIL] = '已发失败';
        $_LANG['mail_status'][BONUS_MAIL_SUCCEED] = '已发成功';
        

        /* 查询条件 */
        $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'bonus_type_id' : trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
        $filter['bonus_type'] = empty($_REQUEST['bonus_type']) ? 0 : intval($_REQUEST['bonus_type']);
    
        $where = empty($filter['bonus_type']) ? '' : " WHERE bonus_type_id='$filter[bonus_type]'";
    
        $sql = "SELECT COUNT(*) FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_user_bonus'). $where;
        $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
    
        /* 分页大小 */
        $filter = page_and_size($filter);
    
        $sql = "SELECT ub.*, u.user_name, u.email, o.order_sn, bt.type_name ".
              " FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_user_bonus'). " AS ub ".
              " LEFT JOIN " .$GLOBALS['ec_globals']['ecs']->table('ec_bonus_type'). " AS bt ON bt.type_id=ub.bonus_type_id ".
              " LEFT JOIN " .$GLOBALS['ec_globals']['ecs']->table('ec_users'). " AS u ON u.user_id=ub.user_id ".
              " LEFT JOIN " .$GLOBALS['ec_globals']['ecs']->table('ec_order_info'). " AS o ON o.order_id=ub.order_id $where ".
              " ORDER BY ".$filter['sort_by']." ".$filter['sort_order'].
              " LIMIT ". $filter['start'] .", $filter[page_size]";
        $row = M()->getAll($sql);
    
        if(!empty($row)){
           foreach ($row AS $key => $val)
            {
                $row[$key]['used_time'] = $val['used_time'] == 0 ?
                    '未使用' : local_date(C('ec_date_format'), $val['used_time']);
                $row[$key]['emailed'] = $_LANG['mail_status'][$row[$key]['emailed']];
            } 
        }
        
    
        $arr = array('item' => $row, 'filter' => $filter, 'page_count' => $filter['page_count'], 
        'record_count' => $filter['record_count']);
    
        return $arr;
    }
    
    
    /**
     * 取得红包类型信息
     * @param   int     $bonus_type_id  红包类型id
     * @return  array
     */
    public function bonus_type_info($bonus_type_id)
    {
        $sql = "SELECT * FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_bonus_type') .
            " WHERE type_id = '$bonus_type_id'";

        return M()->getRowSql($sql);
    }

    /**
     * 发送红包邮件
     * @param   int     $bonus_type_id  红包类型id
     * @param   array   $bonus_id_list  红包id数组
     * @return  int     成功发送数量
     */
    public function send_bonus_mail($bonus_type_id, $bonus_id_list)
    {
        /* 取得红包类型信息 */
        $bonus_type = $this -> bonus_type_info($bonus_type_id);
        if ($bonus_type['send_type'] != SEND_BY_USER)
        {
            return 0;
        }
    
        /* 取得属于该类型的红包信息 */
        $sql = "SELECT b.bonus_id, u.user_name, u.email " .
                "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_user_bonus') . " AS b, " .
                    $GLOBALS['ec_globals']['ecs']->table('ec_users') . " AS u " .
                " WHERE b.user_id = u.user_id " .
                " AND b.bonus_id " . db_create_in($bonus_id_list) .
                " AND b.order_id = 0 " .
                " AND u.email <> ''";
        $bonus_list = M()->getAll($sql);
        if (empty($bonus_list))
        {
            return 0;
        }
    
        /* 初始化成功发送数量 */
        $send_count = 0;
    
        /* 发送邮件 */
        $tpl   = get_mail_template('send_bonus');
        $today = local_date(C('ec_date_format'));
        if(!empty($bonus_list)){
            foreach ($bonus_list AS $bonus)
            {
                $this->assign('user_name',    $bonus['user_name']);
                $this->assign('shop_name',    C('ec_shop_name'));
                $this->assign('send_date',    $today);
                $this->assign('sent_date',    $today);
                $this->assign('count',        1);
                $this->assign('money',        price_format($bonus_type['type_money']));
        
                //$content = $GLOBALS['smarty']->fetch('str:' . $tpl['template_content']);
                $content= $this -> view->contentCompile('str:' . $tpl['template_content']);
                if ($this-> add_to_maillist($bonus['user_name'], $bonus['email'], $tpl['template_subject'], $content, $tpl['is_html'], false))
                {
                    $sql = "UPDATE " . $GLOBALS['ec_globals']['ecs']->table('ec_user_bonus') .
                            " SET emailed = '" . BONUS_MAIL_SUCCEED . "'" .
                            " WHERE bonus_id = '$bonus[bonus_id]'";
                    M()->exe($sql);
                    $send_count++;
                }
                else
                {
                    $sql = "UPDATE " . $GLOBALS['ec_globals']['ecs']->table('ec_user_bonus') .
                            " SET emailed = '" . BONUS_MAIL_FAIL . "'" .
                            " WHERE bonus_id = '$bonus[bonus_id]'";
                    M()->exe($sql);
                }
            }
        }
        return $send_count;
    }
    
    
    public function add_to_maillist($username, $email, $subject, $content, $is_html)
    {
        $time = time();
        $content = addslashes($content);
        $template_id = M()->getOne("SELECT template_id FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_mail_templates') . " WHERE template_code = 'send_bonus'",'template_id');
        $sql = "INSERT INTO "  . $GLOBALS['ec_globals']['ecs']->table('ec_email_sendlist') . " ( email, template_id, email_content, pri, last_send) VALUES ('$email', $template_id, '$content', 1, '$time')";
        M()->exe($sql);
        return true;
    }
        
   
    
    
    
    
}
