<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcUserRankControl extends EcAdminControl {
    protected $db;
    
    public function __init() {
		$this -> db = K("EcUserRank");
	}
    
	//ブランド一覧
	public function index() {
	    /*$count = $this -> db -> count();
		$page = new Page($count);
		$this -> page = $page -> show();
		$ranks = $this -> db -> limit($page -> limit()) -> all();
        
        $this -> user_ranks = $ranks;
		$this -> display();*/
        $ecs=$GLOBALS['ec_globals']['ecs'];
        $tdb1=M();
	    $exc = new exchange($ecs->table("ec_user_rank"), $tdb1, 'rank_id', 'rank_name');
        $tdb2=M();
        $exc_user = new exchange($ecs->table("ec_users"), $tdb2, 'user_rank', 'user_rank');
        
         /*------------------------------------------------------ */
        //-- 会员等级列表
        /*------------------------------------------------------ */
        
        if ($_REQUEST['act'] == 'list')
        {
            $ranks = array();
            $ranks = M()->getAll("SELECT * FROM " .$ecs->table('ec_user_rank'));
        
            $this->assign('ur_here',      '会員ランク');
            $this->assign('action_link',  array('text' => '会員ランク新規', 'href'=> U('index').'&act=add'));
            $this->assign('full_page',    1);
        
            $this->assign('user_ranks',   $ranks);
        
            //assign_query_info();
            $this->display('user_rank.htm');
        }
        /*------------------------------------------------------ */
        //-- 翻页，排序
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query')
        {
            $ranks = array();
            $ranks = M()->getAll("SELECT * FROM " .$ecs->table('ec_user_rank'));
        
            $this->assign('user_ranks',   $ranks);
            make_json_result($this->fetch('user_rank.htm'));
        }
        /*------------------------------------------------------ */
        //-- 添加会员等级
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'add')
        {
            $rank['rank_id']      = 0;
            $rank['rank_special'] = 0;
            $rank['show_price']   = 1;
            $rank['min_points']   = 0;
            $rank['max_points']   = 0;
            $rank['discount']     = 100;
        
            $form_action          = 'insert';
        
            $this->assign('rank',        $rank);
            $this->assign('ur_here',     '会員ランク新規');
            $this->assign('action_link', array('text' => L('admin_ecuserrank_common1'), 'href'=> U('index').'&act=list'));
            $this->assign('ur_here',     '会員ランク新規');
            $this->assign('form_action', $form_action);
        
            //assign_query_info();
            $this->display('user_rank_info.htm');
        }
        
        /*------------------------------------------------------ */
        //-- 增加会员等级到数据库
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'insert')
        {
            $special_rank =  isset($_POST['special_rank']) ? intval($_POST['special_rank']) : 0;
            $_POST['min_points'] = empty($_POST['min_points']) ? 0 : intval($_POST['min_points']);
            $_POST['max_points'] = empty($_POST['max_points']) ? 0 : intval($_POST['max_points']);
            
            /* 检查是否存在重名的会员等级 */
            if (!$exc->is_only('rank_name', trim($_POST['rank_name'])))
            {
                $this->sys_msg(sprintf('会員ランク名 %s はすでに存在。', trim($_POST['rank_name'])), 1);
            }
            /* 非特殊会员组检查积分的上下限是否合理 */
            if ($_POST['min_points'] >= $_POST['max_points'] && $special_rank == 0)
            {
                $this->sys_msg('ポイント上限はポイント下限より大きいはず。', 1);
            }
            /* 特殊等级会员组不判断积分限制 */
            if ($special_rank == 0)
            {
                /* 检查下限制有无重复 */
                if (!$exc->is_only('min_points', intval($_POST['min_points'])))
                {
                    $this->sys_msg(sprintf('ポイント下限が %d の会員ランクはすでに存在', intval($_POST['min_points'])));
                }
            }
            /* 特殊等级会员组不判断积分限制 */
            if ($special_rank == 0)
            {
                /* 检查上限有无重复 */
                if (!$exc->is_only('max_points', intval($_POST['max_points'])))
                {
                    $this->sys_msg(sprintf('ポイント上限が %d の会員ランクはすでに存在', intval($_POST['max_points'])));
                }
            }
            $sql = "INSERT INTO " .$ecs->table('ec_user_rank') ."( ".
                        "rank_name, min_points, max_points, discount, special_rank, show_price".
                    ") VALUES (".
                        "'$_POST[rank_name]', '" .intval($_POST['min_points']). "', '" .intval($_POST['max_points']). "', ".
                        "'$_POST[discount]', '$special_rank', '" .intval($_POST['show_price']). "')";
            M()->exe($sql);

            /* 管理员日志 */
            admin_log(trim($_POST['rank_name']), '新規', '会員ランク');
            clear_cache_files();
            
            $lnk[] = array('text' => '会員ランクリストに戻る',    'href'=>U('index').'&act=list');
            $lnk[] = array('text' => '会員ランク新規し続き', 'href'=>U('index').'&act=add');
            $this->sys_msg('会員ランク新規成功。', 0, $lnk);
        }
        /*------------------------------------------------------ */
        //-- 删除会员等级
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove')
        {
        
            $rank_id = intval($_GET['id']);
        
            if ($exc->drop($rank_id))
            {
                /* 更新会员表的等级字段 */
                $exc_user->edit("user_rank = 0", $rank_id);
        
                $rank_name = $exc->get_name($rank_id);
                admin_log(addslashes($rank_name), '削除', '会員ランク');
                clear_cache_files();
            }
        
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
            exit;
        
        }
        /*
         *  编辑会员等级名称
         */
        elseif ($_REQUEST['act'] == 'edit_name')
        {
            $id = intval($_REQUEST['id']);
            $val = empty($_REQUEST['val']) ? '' : json_str_iconv(trim($_REQUEST['val']));
            if ($exc->is_only('rank_name', $val, $id))
            {
                if ($exc->edit("rank_name = '$val'", $id))
                {
                    /* 管理员日志 */
                    admin_log($val, '変更', '会員ランク');
                    clear_cache_files();
                    make_json_result(stripcslashes($val));
                }
                else
                {
                    make_json_error('DBエラー');
                }
            }
            else
            {
                make_json_error(sprintf('会員ランク名 %s はすでに存在。', htmlspecialchars($val)));
            }
        }
        
        /*
         *  ajax编辑积分下限
         */
        elseif ($_REQUEST['act'] == 'edit_min_points')
        {
        
            $rank_id = empty($_REQUEST['id']) ? 0 : intval($_REQUEST['id']);
            $val = empty($_REQUEST['val']) ? 0 : intval($_REQUEST['val']);
        
            $rank = M()->getRowSql("SELECT max_points, special_rank FROM " . $ecs->table('ec_user_rank') . " WHERE rank_id = '$rank_id'");
            if ($val >= $rank['max_points'] && $rank['special_rank'] == 0)
            {
                make_json_error('ポイント上限はポイント下限より大きいはず。');
            }
        
            if ($rank['special_rank'] ==0 && !$exc->is_only('min_points', $val, $rank_id))
            {
                make_json_error(sprintf('ポイント下限が %d の会員ランクはすでに存在', $val));
            }
        
            if ($exc->edit("min_points = '$val'", $rank_id))
            {
                $rank_name = $exc->get_name($rank_id);
                admin_log(addslashes($rank_name), '変更', '会員ランク');
                make_json_result($val);
            }
            else
            {
                make_json_error('DBエラー');
            }
        }
        /*
         *  ajax修改积分上限
         */
        elseif ($_REQUEST['act'] == 'edit_max_points')
        {
        
            $rank_id = empty($_REQUEST['id']) ? 0 : intval($_REQUEST['id']);
            $val = empty($_REQUEST['val']) ? 0 : intval($_REQUEST['val']);
        
            $rank = M()->getRowSql("SELECT min_points, special_rank FROM " . $ecs->table('ec_user_rank') . " WHERE rank_id = '$rank_id'");
        
            if ($val <= $rank['min_points'] && $rank['special_rank'] == 0)
            {
                make_json_error('ポイント上限はポイント下限より大きいはず。');
            }
        
            if ($rank['special_rank'] ==0 && !$exc->is_only('max_points', $val, $rank_id))
            {
                make_json_error(sprintf('ポイント上限が %d の会員ランクはすでに存在', $val));
            }
            if ($exc->edit("max_points = '$val'", $rank_id))
            {
                $rank_name = $exc->get_name($rank_id);
                admin_log(addslashes($rank_name), '変更', '会員ランク');
                make_json_result($val);
            }
            else
            {
                make_json_error('DBエラー');
            }
        }
        /*
         *  修改折扣率
         */
        elseif ($_REQUEST['act'] == 'edit_discount')
        {
        
            $rank_id = empty($_REQUEST['id']) ? 0 : intval($_REQUEST['id']);
            $val = empty($_REQUEST['val']) ? 0 : intval($_REQUEST['val']);
        
            if ($val < 1 || $val > 100)
            {
                make_json_error('割引率入力してません　或いは　入力した割引率無効。');
            }
        
            if ($exc->edit("discount = '$val'", $rank_id))
            {
                $rank_name = $exc->get_name($rank_id);
                admin_log(addslashes($rank_name), '変更', '会員ランク');
                clear_cache_files();
                make_json_result($val);
            }
            else
            {
                make_json_error($val);
            }
        }
        /*------------------------------------------------------ */
        //-- 切换是否是特殊会员组
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'toggle_special')
        {
        
            $rank_id       = intval($_POST['id']);
            $is_special    = intval($_POST['val']);
        
            if ($exc->edit("special_rank = '$is_special'", $rank_id))
            {
                $rank_name = $exc->get_name($rank_id);
                admin_log(addslashes($rank_name), '変更', '会員ランク');
                make_json_result($is_special);
            }
            else
            {
                make_json_error('DBエラー');
            }
        }
        /*------------------------------------------------------ */
        //-- 切换是否显示价格
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'toggle_showprice')
        {
            $rank_id       = intval($_POST['id']);
            $is_show    = intval($_POST['val']);
        
            if ($exc->edit("show_price = '$is_show'", $rank_id))
            {
                $rank_name = $exc->get_name($rank_id);
                admin_log(addslashes($rank_name), '変更', '会員ランク');
                clear_cache_files();
                make_json_result($is_show);
            }
            else
            {
                make_json_error('DBエラー');
            }
        }
         
	}
    
	

	

	
    
    
}
