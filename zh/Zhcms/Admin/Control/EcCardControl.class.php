<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcCardControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    $image = new EcImage(C('ec_bgcolor'));
	    $tdb=M();
        $exc = new exchange($ecs->table("ec_card"), $tdb, 'card_id', 'card_name');
        
        if ($_REQUEST['act'] == 'list'){
            $this->assign('ur_here',     '祝福贺卡');
            $this->assign('action_link', array('text' => '添加新贺卡', 'href' => U('index',array('act'=>'add'))));
            $this->assign('full_page',   1);
        
            $cards_list = $this-> cards_list();
        
            $this->assign('card_list',    $cards_list['card_list']);
            $this->assign('filter',       $cards_list['filter']);
            $this->assign('record_count', $cards_list['record_count']);
            $this->assign('page_count',   $cards_list['page_count']);
        
            $this->display('card_list.htm');
        }
        /*------------------------------------------------------ */
        //-- ajax列表
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query')
        {
            $cards_list = $this-> cards_list();
            $this->assign('card_list',    $cards_list['card_list']);
            $this->assign('filter',       $cards_list['filter']);
            $this->assign('record_count', $cards_list['record_count']);
            $this->assign('page_count',   $cards_list['page_count']);
        
            $sort_flag  = sort_flag($cards_list['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
        
            make_json_result($this->fetch('card_list.htm'), '', array('filter' => $cards_list['filter'], 
                    'page_count' => $cards_list['page_count']));
        }
         /*------------------------------------------------------ */
        //-- 删除贺卡
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove')
        {
        
            $card_id = empty($_REQUEST['id']) ? 0 : intval($_REQUEST['id']);
        
            $name = $exc->get_name($card_id);
            $img = $exc->get_name($card_id, 'card_img');
        
            if ($exc->drop($card_id))
            {
                /* 删除图片 */
                if (!empty($img))
                {
                     @unlink( EC_DATA_DIR . '/cardimg/'.$img);
                }
                admin_log(addslashes($name),'删除','祝福贺卡');
        
                $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
                ec_header("Location: $url\n");
                exit;
            }
            else
            {
                make_json_error('数据库操作失败');
            }
        }
        /*------------------------------------------------------ */
        //-- 添加新包装
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'add')
        {
        
            /*初始化显示*/
            $card['card_fee']   = 0;
            $card['free_money'] = 0;
        
            $this->assign('card',        $card);
            $this->assign('ur_here',     '添加新贺卡');
            $this->assign('action_link', array('text' => '祝福贺卡', 'href' => U('index',array('act'=>'list'))));
            $this->assign('form_action', 'insert');
        
            //assign_query_info();
            $this->display('card_info.htm');
        
        }
        elseif ($_REQUEST['act'] == 'insert')
        {
            
            /*检查包装名是否重复*/
            $is_only = $exc->is_only('card_name', $_POST['card_name']);
            
            if (!$is_only)
            {
                $this->sys_msg(sprintf('贺卡名 %s 已经存在', stripslashes($_POST['card_name'])), 1);
            }
            
             /*处理图片*/
            $img_name = basename($image->upload_image($_FILES['card_img'],"cardimg"));
            
            /*插入数据*/
            $sql = "INSERT INTO ".$ecs->table('ec_card')."(card_name, card_fee, free_money, card_desc, card_img)
                    VALUES ('$_POST[card_name]', '$_POST[card_fee]', '$_POST[free_money]', '$_POST[card_desc]', '$img_name')";
            M()->exe($sql);
            
            admin_log($_POST['card_name'],'添加','祝福贺卡');
            
            /*添加链接*/
            $link[0]['text'] = '继续添加';
            $link[0]['href'] = U('index').'&act=add';
            
            $link[1]['text'] = '返回列表';
            $link[1]['href'] = U('index').'&act=list';
            
            $this->sys_msg($_POST['card_name'].'已成功添加',0, $link);
        }
        /*------------------------------------------------------ */
        //-- 编辑包装
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit')
        {
        
            $sql = "SELECT card_id, card_name, card_fee, free_money, card_desc, card_img FROM " .$ecs->table('ec_card'). " WHERE card_id='$_REQUEST[id]'";
            $card = M()->GetRowSql($sql);
        
            $this->assign('ur_here',     '编辑贺卡');
            $this->assign('action_link', array('text' => '祝福贺卡', 'href' => U('index').'&act=list&' . list_link_postfix()));
            $this->assign('card',        $card);
            $this->assign('form_action', 'update');
        
            //assign_query_info();
            $this->display('card_info.htm');
        } 
        elseif ($_REQUEST['act'] == 'update')
        {
        
            if ($_POST['card_name'] != $_POST['old_cardname'])
            {
                /*检查品牌名是否相同*/
                $is_only = $exc->is_only('card_name', $_POST['card_name'], $_POST['id']);
        
                if (!$is_only)
                {
                    $this->sys_msg(sprintf('贺卡名 %s 已经存在', stripslashes($_POST['card_name'])), 1);
                }
            }
            $param = "card_name = '$_POST[card_name]', card_fee = '$_POST[card_fee]', free_money= $_POST[free_money], card_desc = '$_POST[card_desc]'";
            /* 处理图片 */
            $img_name = basename($image->upload_image($_FILES['card_img'],"cardimg", $_POST['old_cardimg']));
            if ($img_name)
            {
                $param .= "  ,card_img ='$img_name' ";
            }
        
            if ($exc->edit($param,  $_POST['id']))
            {
                admin_log($_POST['card_name'], '编辑', '祝福贺卡');
        
                $link[0]['text'] = '返回列表';
                $link[0]['href'] = U('index').'&act=list&' . list_link_postfix();
        
                $note = sprintf('贺卡 %s 修改成功', $_POST['card_name']);
                $this->sys_msg($note, 0, $link);
            }
            else
            {
                die('数据库操作失败');
            }
        }
        /* 删除卡片图片 */
        elseif ($_REQUEST['act'] == 'drop_card_img')
        {
            $card_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        
            /* 取得logo名称 */
            $sql = "SELECT card_img FROM " .$ecs->table('ec_card'). " WHERE card_id = '$card_id'";
            $img_name = M()->getOne($sql,'card_img');
        
            if (!empty($img_name))
            {
                @unlink(EC_DATA_DIR . '/cardimg/' .$img_name);
                $sql = "UPDATE " .$ecs->table('ec_card'). " SET card_img = '' WHERE card_id = '$card_id'";
                M()->exe($sql);
            }
            $link= array(
                        array('text' => '重新编辑该贺卡', 'href'=>U('index').'&act=edit&id=' .$card_id), 
                        array('text' => '返回列表页面', 'href'=>U('index').'&act=list'));
            $this->sys_msg('删除贺卡图片成功', 0, $link);
        }
        /*------------------------------------------------------ */
        //-- ajax编辑卡片名字
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_card_name')
        {
            $card_id = empty($_REQUEST['id']) ? 0 : intval($_REQUEST['id']);
            $card_name = empty($_REQUEST['val']) ? '' : json_str_iconv(trim($_REQUEST['val']));
        
            if (!$exc->is_only('card_name', $card_name, $card_id))
            {
                make_json_error(sprintf('贺卡名 %s 已经存在', $card_name));
            }
            $old_card_name = $exc->get_name($card_id);
            if ($exc->edit("card_name='$card_name'", $card_id))
            {
                admin_log(addslashes($old_card_name), '编辑', '祝福贺卡');
                make_json_result(stripcslashes($card_name));
            }
            else
            {
                make_json_error($db->error());
            }
        }
        /*------------------------------------------------------ */
        //-- ajax编辑卡片费用
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_card_fee')
        {
            $card_id = empty($_REQUEST['id']) ? 0 : intval($_REQUEST['id']);
            $card_fee = empty($_REQUEST['val']) ? 0.00 : floatval($_REQUEST['val']);
        
            $card_name = $exc->get_name($card_id);
            if ($exc->edit("card_fee ='$card_fee'", $card_id))
            {
                admin_log(addslashes($card_name), '编辑', '祝福贺卡');
                make_json_result($card_fee);
            }
            else
            {
                make_json_error($db->error());
            }
        }
        /*------------------------------------------------------ */
        //-- ajax编辑免费额度
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_free_money')
        {
            $card_id = empty($_REQUEST['id']) ? 0 : intval($_REQUEST['id']);
            $free_money = empty($_REQUEST['val']) ? 0.00 : floatval($_REQUEST['val']);
        
            $card_name = $exc->get_name($card_id);
            if ($exc->edit("free_money ='$free_money'", $card_id))
            {
                admin_log(addslashes($card_name), '编辑', '祝福贺卡');
                make_json_result($free_money);
            }
            else
            {
                make_json_error($db->error());
            }
        }     
	}
    
    
    public function cards_list()
    {
        
        $result = get_filter();
        if ($result === false)
        {
            $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'card_id' : trim($_REQUEST['sort_by']);
            $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
    
            /* 分页大小 */
            $sql = "SELECT count(*) FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_card');
            $filter['record_count'] = M()->getOne($sql,'count(*)');
    
            $filter = page_and_size($filter);
    
            /* 查询 */
            $sql = "SELECT card_id, card_name, card_img, card_fee, free_money, card_desc".
                   " FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_card').
                   " ORDER by " . $filter['sort_by'] . ' ' . $filter['sort_order'] .
                   " LIMIT " . $filter['start'] . ',' . $filter['page_size'];
    
            set_filter($filter, $sql);
        }
        else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
    
        $card_list = M()->getAll($sql);
    
        $arr = array('card_list' => $card_list, 'filter' => $filter, 'page_count' => $filter['page_count'], 
                    'record_count' => $filter['record_count']);
    
        return $arr;
    }
	
    
    
}
