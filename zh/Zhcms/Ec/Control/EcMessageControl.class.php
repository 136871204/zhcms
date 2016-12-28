<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcMessageControl extends EcControl {
    
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
        //echo 'aaa';die;
    }
    
    public function index(){
        header("Content-type:text/html;charset=utf-8");
        $ecs=$GLOBALS['ec_globals']['ecs'];
        
        $ec_message_board=C('ec_message_board');
        if (empty($ec_message_board))
        {
            $this -> show_message('暂停留言板功能');
        }
        $action  = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'default';
        if ($action == 'act_add_message')
        {
            echo 'TODO:EcMessageControl---1';die;
        }
        if ($action == 'default')
        {
            $this -> assign_template();
            $position = assign_ur_here(0, '留言板');
            $this->assign('page_title', $position['title']);    // 页面标题
            $this->assign('ur_here',    $position['ur_here']);  // 当前位置
            $this->assign('helps',      get_shop_help());       // 网店帮助
        
            $this->assign('categories', get_categories_tree()); // 分类树
            $this->assign('top_goods',  get_top10());           // 销售排行
            $this->assign('cat_list',   cat_list(0, 0, true, 2, false));
            $this->assign('brand_list', get_brand_list());
            $this->assign('promotion_info', get_promotion_info());
            //$smarty->assign('enabled_mes_captcha', (intval($_CFG['captcha']) & CAPTCHA_MESSAGE));
            $this->assign('enabled_mes_captcha', true);
            $sql = "SELECT COUNT(*) FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_comment')." WHERE STATUS =1 AND comment_type =0 ";
            $record_count = M()->getOne($sql,'COUNT(*)');
            $sql = "SELECT COUNT(*) FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_feedback')." WHERE `msg_area`='1' AND `msg_status` = '1' ";
            $record_count += M()->getOne($sql,'COUNT(*)');
            
            /* 获取留言的数量 */
            $page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;
            $pagesize = get_library_number('message_list', 'message_board');
            $pager = get_pager('message.php', array(), $record_count, $page, $pagesize);
            $msg_lists = $this -> get_msg_list($pagesize, $pager['start']);
            
            $this->assign('rand',      mt_rand());
            $this->assign('msg_lists', $msg_lists);
            $this->assign('pager', $pager);
            $this -> display('template/' . C('WEB_STYLE') . '/ec/message_board.html');
    
        }
        
        
        
    }
    
    /**
     * 获取留言的详细信息
     *
     * @param   integer $num
     * @param   integer $start
     *
     * @return  array
     */
    public function get_msg_list($num, $start)
    {
        $_LANG['message_type'][M_MESSAGE] = '留言';
        $_LANG['message_type'][M_COMPLAINT] = '投诉';
        $_LANG['message_type'][M_ENQUIRY] = '询问';
        $_LANG['message_type'][M_CUSTOME] = '售后';
        $_LANG['message_type'][M_BUY] = '求购';
        $_LANG['message_type'][M_BUSINESS] = '商家留言';
        $_LANG['message_type'][M_COMMENT] = '评论';

        /* 获取留言数据 */
        $msg = array();
            
        //$mysql_ver = M()->version();
        $mysql_ver='3.2.4';
        if($mysql_ver > '3.2.3')
        {
            $sql = "(SELECT 'comment' AS tablename,   comment_id AS ID, content AS msg_content, null AS msg_title, add_time AS msg_time, id_value AS id_value, comment_rank AS comment_rank, null AS message_img, user_name AS user_name, '6' AS msg_type ";
            $sql .= " FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_comment');
            $sql .= "WHERE STATUS =1 AND comment_type =0) ";
            $sql .= " UNION ";
            $sql .= "(SELECT 'feedback' AS tablename, msg_id AS ID, msg_content AS msg_content, msg_title AS msg_title, msg_time AS msg_time, null AS id_value, null AS comment_rank, message_img AS message_img, user_name AS user_name, msg_type AS msg_type ";
            $sql .= " FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_feedback');
            $sql .= " WHERE `msg_area`='1' AND `msg_status` = '1') ";
            $sql .= " ORDER BY msg_time DESC ";
        }
        $res = M()->SelectLimit($sql, $num, $start);
        if(!empty($res))
        {
            foreach($res as $rows)
            {
                for($i = 0; $i < count($rows); $i++)
                {
                    $msg[$rows['msg_time']]['user_name'] = htmlspecialchars($rows['user_name']);
                    $msg[$rows['msg_time']]['msg_content'] = str_replace('\r\n', '<br />', htmlspecialchars($rows['msg_content']));
                    $msg[$rows['msg_time']]['msg_content'] = str_replace('\n', '<br />', $msg[$rows['msg_time']]['msg_content']);
                    $msg[$rows['msg_time']]['msg_time']    = local_date(C('ec_time_format'), $rows['msg_time']);
                    $msg[$rows['msg_time']]['msg_type']    = $_LANG['message_type'][$rows['msg_type']];
                    $msg[$rows['msg_time']]['msg_title']   = nl2br(htmlspecialchars($rows['msg_title']));
                    $msg[$rows['msg_time']]['message_img'] = $rows['message_img'];
                    $msg[$rows['msg_time']]['tablename'] = $rows['tablename'];
                    if(isset($rows['order_id']))
                    {
                        $msg[$rows['msg_time']]['order_id'] = $rows['order_id'];
                    }
                    $msg[$rows['msg_time']]['comment_rank'] = $rows['comment_rank'];
                    $msg[$rows['msg_time']]['id_value'] = $rows['id_value'];
                    /*如果id_value为true为商品评论,根据商品id取出商品名称*/
                    if($rows['id_value'])
                    {
                        $sql_goods = "SELECT goods_name FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_goods');
                        $sql_goods .= "WHERE goods_id= ".$rows['id_value'];
                        $goods_res = M()->getRowSql($sql_goods);
                        $msg[$rows['msg_time']]['goods_name'] = $goods_res['goods_name'];
                        $msg[$rows['msg_time']]['goods_url'] = ec_build_uri('goods', array('gid' => $rows['id_value']), $goods_res['goods_name']);
                    }
            
                }
                $msg[$rows['msg_time']]['tablename'] = $rows['tablename'];
                $id = $rows['ID'];
                $reply = array();
                if(isset($msg[$rows['msg_time']]['tablename']))
                {
                    $table_name = $msg[$rows['msg_time']]['tablename'];
                    if ($table_name == 'feedback')
                    {
                        $sql = "SELECT user_name AS re_name, user_email AS re_email, msg_time AS re_time, msg_content AS re_content ,parent_id".
                         " FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_feedback') .
                         " WHERE parent_id = '" . $id. "'";
                    }
                    else
                    {
                        $sql = 'SELECT user_name AS re_name, email AS re_email, add_time AS re_time, content AS re_content ,parent_id
                        FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_comment') .
                        " WHERE parent_id = $id ";
        
                    }
                    $reply = M()->getRowSql($sql);
                    if ($reply)
                    {
                        $msg[$rows['msg_time']]['re_name']   = $reply['re_name'];
                        $msg[$rows['msg_time']]['re_email']  = $reply['re_email'];
                        $msg[$rows['msg_time']]['re_time']    = local_date(C('ec_time_format'), $reply['re_time']);
                        $msg[$rows['msg_time']]['re_content'] = nl2br(htmlspecialchars($reply['re_content']));
                    }
            
                }
            }
        }
        return $msg;
    }
    

    
	
}
