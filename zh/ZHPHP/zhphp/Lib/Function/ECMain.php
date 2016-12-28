<?php

/**
 * 获得所有模块的名称以及链接地址
 *
 * @access      public
 * @param       string      $directory      插件存放的目录
 * @return      array
 */
function read_modules($directory = '.')
{
    $dir         = @opendir($directory);
    $set_modules = true;
    $modules     = array();
    
    while (false !== ($file = @readdir($dir)))
    {
        if (preg_match("/^.*?\.php$/", $file))
        {
            //p($directory. '/' .$file);
            include_once($directory. '/' .$file);
        }
    }
    @closedir($dir);
    unset($set_modules);
    
    $GLOBALS['ec_globals']['lang']=$_LANG;
    foreach ($modules AS $key => $value)
    {
        ksort($modules[$key]);
    }
    ksort($modules);

    return $modules;
}

/**
 * 处理上传文件，并返回上传图片名(上传失败时返回图片名为空）
 *
 * @access  public
 * @param array     $upload     $_FILES 数组
 * @param array     $type       图片所属类别，即data目录下的文件夹名
 *
 * @return string               上传图片名
 */
function upload_file($upload, $type)
{
    if (!empty($upload['tmp_name']))
    {
        $ftype = check_file_type($upload['tmp_name'], $upload['name'], '|png|jpg|jpeg|gif|doc|xls|txt|zip|ppt|pdf|rar|docx|xlsx|pptx|');
        if (!empty($ftype))
        {
            $name = date('Ymd');
            for ($i = 0; $i < 6; $i++)
            {
                $name .= chr(mt_rand(97, 122));
            }
            $name = $_SESSION['ec_user_id'] . '_' . $name . '.' . $ftype;
            $target = ROOT_PATH . EC_DATA_DIR . '/' . $type . '/' . $name;
            if (!move_upload_file($upload['tmp_name'], $target))
            {
                $GLOBALS['ec_globals']['err']->add('文件上传出现错误,请重新上传！', 1);

                return false;
            }
            else
            {
                return $name;
            }
        }
        else
        {
            $GLOBALS['ec_globals']['err']->add('您上传的文件类型不正确,请重新上传！', 1);

            return false;
        }
    }
    else
    {
        $GLOBALS['ec_globals']['err']->add('文件上传出现错误,请重新上传！');
        return false;
    }
}

/**
 * 获得指定分类同级的所有分类以及该分类下的子分类
 *
 * @access  public
 * @param   integer     $cat_id     分类编号
 * @return  array
 */
function article_categories_tree($cat_id = 0)
{
    if ($cat_id > 0)
    {
        $sql = 'SELECT parent_id FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_article_cat') . " WHERE cat_id = '$cat_id'";
        $parent_id = M()->getOne($sql,'parent_id');
    }
    else
    {
        $parent_id = 0;
    }

    /*
     判断当前分类中全是是否是底级分类，
     如果是取出底级分类上级分类，
     如果不是取当前分类及其下的子分类
    */
    $sql = 'SELECT count(*) FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_article_cat') . " WHERE parent_id = '$parent_id'";
    if (M()->getOne($sql,'count(*)'))
    {
        /* 获取当前分类及其子分类 */
        $sql = 'SELECT a.cat_id, a.cat_name, a.sort_order AS parent_order, a.cat_id, ' .
                    'b.cat_id AS child_id, b.cat_name AS child_name, b.sort_order AS child_order ' .
                'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_article_cat') . ' AS a ' .
                'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_article_cat') . ' AS b ON b.parent_id = a.cat_id ' .
                "WHERE a.parent_id = '$parent_id' AND a.cat_type=1 ORDER BY parent_order ASC, a.cat_id ASC, child_order ASC";
    }
    else
    {
        /* 获取当前分类及其父分类 */
        $sql = 'SELECT a.cat_id, a.cat_name, b.cat_id AS child_id, b.cat_name AS child_name, b.sort_order ' .
                'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_article_cat') . ' AS a ' .
                'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_article_cat') . ' AS b ON b.parent_id = a.cat_id ' .
                "WHERE b.parent_id = '$parent_id' AND b.cat_type = 1 ORDER BY sort_order ASC";
    }
    $res = M()->getAll($sql);

    $cat_arr = array();
    if(!empty($res))
    {
        foreach ($res AS $row)
        {
            $cat_arr[$row['cat_id']]['id']   = $row['cat_id'];
            $cat_arr[$row['cat_id']]['name'] = $row['cat_name'];
            $cat_arr[$row['cat_id']]['url']  = ec_build_uri('article_cat', array('acid' => $row['cat_id']), $row['cat_name']);
    
            if ($row['child_id'] != NULL)
            {
                $cat_arr[$row['cat_id']]['children'][$row['child_id']]['id']   = $row['child_id'];
                $cat_arr[$row['cat_id']]['children'][$row['child_id']]['name'] = $row['child_name'];
                $cat_arr[$row['cat_id']]['children'][$row['child_id']]['url']  = ec_build_uri('article_cat', array('acid' => $row['child_id']), $row['child_name']);
            }
        }
    }
    

    return $cat_arr;
}



/**
 * 查询会员的红包金额
 *
 * @access  public
 * @param   integer     $user_id
 * @return  void
 */
function get_user_bonus($user_id = 0)
{
    if ($user_id == 0)
    {
        $user_id = $_SESSION['ec_user_id'];
    }

    $sql = "SELECT SUM(bt.type_money) AS bonus_value, COUNT(*) AS bonus_count ".
            "FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_user_bonus'). " AS ub, ".
                $GLOBALS['ec_globals']['ecs']->table('ec_bonus_type') . " AS bt ".
            "WHERE ub.user_id = '$user_id' AND ub.bonus_type_id = bt.type_id AND ub.order_id = 0";
    $row = M()->getRowSql($sql);

    return $row;
}


/**
 *  获取用户信息数组
 *
 * @access  public
 * @param
 *
 * @return array        $user       用户信息数组
 */
function get_user_info($id=0)
{
    if ($id == 0)
    {
        $id = $_SESSION['ec_user_id'];
    }
    $time = date('Y-m-d');
    $sql  = 'SELECT u.user_id, u.email, u.user_name, u.user_money, u.pay_points'.
            ' FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_users'). ' AS u ' .
            " WHERE u.user_id = '$id'";
    $user = M()->getRowSql($sql);
    $bonus = get_user_bonus($id);

    $user['username']    = $user['user_name'];
    $user['user_points'] = $user['pay_points'] .C('ec_integral_name') ;
    $user['user_money']  = price_format($user['user_money'], false);
    $user['user_bonus']  = price_format($bonus['bonus_value'], false);

    return $user;
}

/**
 * 重新计算购物车中的商品价格：目的是当用户登录时享受会员价格，当用户退出登录时不享受会员价格
 * 如果商品有促销，价格不变
 *
 * @access  public
 * @return  void
 */
function recalculate_price()
{
    /* 取得有可能改变价格的商品：除配件和赠品之外的商品 */
    $sql = 'SELECT c.rec_id, c.goods_id, c.goods_attr_id, g.promote_price, g.promote_start_date, c.goods_number,'.
                "g.promote_end_date, IFNULL(mp.user_price, g.shop_price * '$_SESSION[ec_discount]') AS member_price ".
            'FROM ' . 
                    $GLOBALS['ec_globals']['ecs']->table('ec_cart') . ' AS c '.
                    'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . ' AS g ON g.goods_id = c.goods_id '.
                    "LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . " AS mp ".
                            "ON mp.goods_id = g.goods_id AND mp.user_rank = '" . $_SESSION['ec_user_rank'] . "' ".
            "WHERE session_id = '" .SESS_ID. "' AND c.parent_id = 0 AND c.is_gift = 0 AND c.goods_id > 0 " .
            "AND c.rec_type = '" . CART_GENERAL_GOODS . "' AND c.extension_code <> 'package_buy'";
    $res = M()->getAll($sql);
    if(!empty($res))
    {
        foreach ($res AS $row)
        {   
            $attr_id    = empty($row['goods_attr_id']) ? array() : explode(',', $row['goods_attr_id']);
            $goods_price = get_final_price($row['goods_id'], $row['goods_number'], true, $attr_id);
            
            $goods_sql = "UPDATE " .$GLOBALS['ec_globals']['ecs']->table('ec_cart'). " SET goods_price = '$goods_price' ".
                     "WHERE goods_id = '" . $row['goods_id'] . "' AND session_id = '" . SESS_ID . "' AND rec_id = '" . $row['rec_id'] . "'";

            M()->exe($goods_sql);
        }
    }
    /* 删除赠品，重新选择 */
    M()->exe('DELETE FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_cart') .
        " WHERE session_id = '" . SESS_ID . "' AND is_gift > 0");
}


/**
 * 更新用户SESSION,COOKIE及登录时间、登录次数。
 *
 * @access  public
 * @return  void
 */
function update_user_info()
{
    if (!$_SESSION['ec_user_id'])
    {
        return false;
    }
    /* 查询会员信息 */
    $time = date('Y-m-d');
    $sql = 'SELECT u.user_money,u.email, u.pay_points, u.user_rank, u.rank_points, '.
            ' IFNULL(b.type_money, 0) AS user_bonus, u.last_login, u.last_ip'.
            ' FROM ' .
                    $GLOBALS['ec_globals']['ecs']->table('ec_users'). ' AS u ' .
                    ' LEFT JOIN ' .$GLOBALS['ec_globals']['ecs']->table('ec_user_bonus'). ' AS ub'.' ON ub.user_id = u.user_id AND ub.used_time = 0 ' .
                    ' LEFT JOIN ' .$GLOBALS['ec_globals']['ecs']->table('ec_bonus_type'). ' AS b'." ON b.type_id = ub.bonus_type_id AND b.use_start_date <= '$time' AND b.use_end_date >= '$time' ".
            " WHERE u.user_id = '$_SESSION[ec_user_id]'";
    if ($row = M()->getRowSql($sql))
    {
        /* 更新SESSION */
        $_SESSION['ec_last_time']   = $row['last_login'];
        $_SESSION['ec_last_ip']     = $row['last_ip'];
        $_SESSION['ec_login_fail']  = 0;
        $_SESSION['ec_email']       = $row['email'];
        
        /*判断是否是特殊等级，可能后台把特殊会员组更改普通会员组*/
        if($row['user_rank'] >0)
        {
            $sql="SELECT special_rank from ".$GLOBALS['ec_globals']['ecs']->table('ec_user_rank')."where rank_id='$row[user_rank]'";
            if(M()->getOne($sql,'special_rank')==='0' || M()->getOne($sql,'special_rank')===null)
            {
                $sql="update ".$GLOBALS['ec_globals']['ecs']->table('ec_users')."set user_rank='0' where user_id='$_SESSION[ec_user_id]'";
                M()->exe($sql);
                $row['user_rank']=0;
            }
        }
        
        /* 取得用户等级和折扣 */
        if ($row['user_rank'] == 0)
        {
            // 非特殊等级，根据等级积分计算用户等级（注意：不包括特殊等级）
            $sql = 'SELECT rank_id, discount 
                    FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_user_rank') . " 
                    WHERE 
                        special_rank = '0' AND 
                        min_points <= " . intval($row['rank_points']) . ' AND 
                        max_points > ' . intval($row['rank_points']);
            if ($row = M()->getRowSql($sql))
            {
                $_SESSION['ec_user_rank'] = $row['rank_id'];
                $_SESSION['ec_discount']  = $row['discount'] / 100.00;
            }
            else
            {
                $_SESSION['ec_user_rank'] = 0;
                $_SESSION['ec_discount']  = 1;
            }
        }
        else
        {
            // 特殊等级
            $sql = 'SELECT rank_id, discount FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_user_rank') . " WHERE rank_id = '$row[user_rank]'";
            if ($row = M()->getRowSql($sql))
            {
                $_SESSION['ec_user_rank'] = $row['rank_id'];
                $_SESSION['ec_discount']  = $row['discount'] / 100.00;
            }
            else
            {
                $_SESSION['ec_user_rank'] = 0;
                $_SESSION['ec_discount']  = 1;
            }
        }
    }
    
    /* 更新登录时间，登录次数及登录ip */
    $sql = "UPDATE " .$GLOBALS['ec_globals']['ecs']->table('ec_users'). " SET".
           " visit_count = visit_count + 1, ".
           " last_ip = '" .real_ip(). "',".
           " last_login = '" .gmtime(). "'".
           " WHERE user_id = '" . $_SESSION['ec_user_id'] . "'";
    M()->exe($sql);
}



/**
 * 查询评论内容
 *
 * @access  public
 * @params  integer     $id
 * @params  integer     $type
 * @params  integer     $page
 * @return  array
 */
function assign_comment($id, $type, $page = 1)
{
    /* 取得评论列表 */
    $count = M()->getOne('SELECT COUNT(*) FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_comment').
           " WHERE id_value = '$id' AND comment_type = '$type' AND status = 1 AND parent_id = 0",'COUNT(*)');
    $ec_comments_number=C('ec_comments_number');
    $size  = !empty($ec_comments_number) ? $ec_comments_number : 5;
    $page_count = ($count > 0) ? intval(ceil($count / $size)) : 1;
    $sql = 'SELECT * FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_comment') .
            " WHERE id_value = '$id' AND comment_type = '$type' AND status = 1 AND parent_id = 0".
            ' ORDER BY comment_id DESC';
    $res = M()->selectLimit($sql, $size, ($page-1) * $size);
    $arr = array();
    $ids = '';
    
    if(!empty($res))
    {
        foreach($res as $row)
        {
            $ids .= $ids ? ",$row[comment_id]" : $row['comment_id'];
            $arr[$row['comment_id']]['id']       = $row['comment_id'];
            $arr[$row['comment_id']]['email']    = $row['email'];
            $arr[$row['comment_id']]['username'] = $row['user_name'];
            $arr[$row['comment_id']]['content']  = str_replace('\r\n', '<br />', htmlspecialchars($row['content']));
            $arr[$row['comment_id']]['content']  = nl2br(str_replace('\n', '<br />', $arr[$row['comment_id']]['content']));
            $arr[$row['comment_id']]['rank']     = $row['comment_rank'];
            $arr[$row['comment_id']]['add_time'] = local_date(C('ec_time_format'), $row['add_time']);
            
        }   
    }
    /* 取得已有回复的评论 */
    if ($ids)
    {
        $sql = 'SELECT * FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_comment') .
                " WHERE parent_id IN( $ids )";
        $res = M()->query($sql);
        if(!empty($res))
        {
            foreach($res as $row)
            {
                $arr[$row['parent_id']]['re_content']  = nl2br(str_replace('\n', '<br />', htmlspecialchars($row['content'])));
                $arr[$row['parent_id']]['re_add_time'] = local_date($GLOBALS['_CFG']['time_format'], $row['add_time']);
                $arr[$row['parent_id']]['re_email']    = $row['email'];
                $arr[$row['parent_id']]['re_username'] = $row['user_name'];
            }
        }
    }
    $pager['page']         = $page;
    $pager['size']         = $size;
    $pager['record_count'] = $count;
    $pager['page_count']   = $page_count;
    $pager['page_first']   = "javascript:gotoPage(1,$id,$type)";
    $pager['page_prev']    = $page > 1 ? "javascript:gotoPage(" .($page-1). ",$id,$type)" : 'javascript:;';
    $pager['page_next']    = $page < $page_count ? 'javascript:gotoPage(' .($page + 1) . ",$id,$type)" : 'javascript:;';
    $pager['page_last']    = $page < $page_count ? 'javascript:gotoPage(' .$page_count. ",$id,$type)"  : 'javascript:;';
    $cmt = array('comments' => $arr, 'pager' => $pager);
    return $cmt;
}




/**
 * 获得指定文章分类的所有上级分类
 *
 * @access  public
 * @param   integer $cat    分类编号
 * @return  array
 */
function get_article_parent_cats($cat)
{
    if ($cat == 0)
    {
        return array();
    }

    $arr = M()->GetAll('SELECT cat_id, cat_name, parent_id FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_article_cat'));

    if (empty($arr))
    {
        return array();
    }

    $index = 0;
    $cats  = array();

    while (1)
    {
        foreach ($arr AS $row)
        {
            if ($cat == $row['cat_id'])
            {
                $cat = $row['parent_id'];

                $cats[$index]['cat_id']   = $row['cat_id'];
                $cats[$index]['cat_name'] = $row['cat_name'];

                $index++;
                break;
            }
        }

        if ($index == 0 || $cat == 0)
        {
            break;
        }
    }

    return $cats;
}

/**
 * 获取地区列表的函数。
 *
 * @access  public
 * @param   int     $region_id  上级地区id
 * @return  void
 */
function area_list($region_id)
{
    $area_arr = array();

    $sql = 'SELECT * FROM ' . 
            $GLOBALS['ec_globals']['ecs']->table('ec_region').
           " WHERE parent_id = '$region_id' ORDER BY region_id";
    $res = M()->query($sql);
    if(!empty($res)){
        foreach($res as $row){
            $row['type']  = ($row['region_type'] == 0) ? '一级地区'  : '';
            $row['type'] .= ($row['region_type'] == 1) ? '二级地区'  : '';
            $row['type'] .= ($row['region_type'] == 2) ? '三级地区'      : '';
            $row['type'] .= ($row['region_type'] == 3) ? '四级地区'  : '';
            $area_arr[] = $row;
        }
    }

    return $area_arr;
}





/**
 *  生成给pager.lbi赋值的数组
 *
 * @access  public
 * @param   string      $url        分页的链接地址(必须是带有参数的地址，若不是可以伪造一个无用参数)
 * @param   array       $param      链接参数 key为参数名，value为参数值
 * @param   int         $record     记录总数量
 * @param   int         $page       当前页数
 * @param   int         $size       每页大小
 *
 * @return  array       $pager
 */
function get_pager($url, $param, $record_count, $page = 1, $size = 10)
{
    $size = intval($size);
    if ($size < 1)
    {
        $size = 10;
    }

    $page = intval($page);
    if ($page < 1)
    {
        $page = 1;
    }

    $record_count = intval($record_count);

    $page_count = $record_count > 0 ? intval(ceil($record_count / $size)) : 1;
    if ($page > $page_count)
    {
        $page = $page_count;
    }
    $ec_page_style=C('ec_page_style');
    /* 分页样式 */
    $pager['styleid'] = isset($ec_page_style)? intval($ec_page_style) : 0;

    $page_prev  = ($page > 1) ? $page - 1 : 1;
    $page_next  = ($page < $page_count) ? $page + 1 : $page_count;

    /* 将参数合成url字串 */
    $param_url = '&';
    foreach ($param AS $key => $value)
    {
        $param_url .= $key . '=' . $value . '&';
    }

    $pager['url']          = $url;
    $pager['start']        = ($page -1) * $size;
    $pager['page']         = $page;
    $pager['size']         = $size;
    $pager['record_count'] = $record_count;
    $pager['page_count']   = $page_count;

    if ($pager['styleid'] == 0)
    {
        $pager['page_first']   = $url . $param_url . 'page=1';
        $pager['page_prev']    = $url . $param_url . 'page=' . $page_prev;
        $pager['page_next']    = $url . $param_url . 'page=' . $page_next;
        $pager['page_last']    = $url . $param_url . 'page=' . $page_count;
        $pager['array']  = array();
        for ($i = 1; $i <= $page_count; $i++)
        {
            $pager['array'][$i] = $i;
        }
    }
    else
    {
        $_pagenum = 10;     // 显示的页码
        $_offset = 2;       // 当前页偏移值
        $_from = $_to = 0;  // 开始页, 结束页
        if($_pagenum > $page_count)
        {
            $_from = 1;
            $_to = $page_count;
        }
        else
        {
            $_from = $page - $_offset;
            $_to = $_from + $_pagenum - 1;
            if($_from < 1)
            {
                $_to = $page + 1 - $_from;
                $_from = 1;
                if($_to - $_from < $_pagenum)
                {
                    $_to = $_pagenum;
                }
            }
            elseif($_to > $page_count)
            {
                $_from = $page_count - $_pagenum + 1;
                $_to = $page_count;
            }
        }
        $url_format = $url . $param_url . 'page=';
        $pager['page_first'] = ($page - $_offset > 1 && $_pagenum < $page_count) ? $url_format . 1 : '';
        $pager['page_prev']  = ($page > 1) ? $url_format . $page_prev : '';
        $pager['page_next']  = ($page < $page_count) ? $url_format . $page_next : '';
        $pager['page_last']  = ($_to < $page_count) ? $url_format . $page_count : '';
        $pager['page_kbd']  = ($_pagenum < $page_count) ? true : false;
        $pager['page_number'] = array();
        for ($i=$_from;$i<=$_to;++$i)
        {
            $pager['page_number'][$i] = $url_format . $i;
        }
    }
    $pager['search'] = $param;

    return $pager;
}


/**
 * 获得指定用户、商品的所有标记
 *
 * @access  public
 * @param   integer $goods_id
 * @param   integer $user_id
 * @return  array
 */
function get_tags($goods_id = 0, $user_id = 0)
{
    $where = '';
    if ($goods_id > 0)
    {
        $where .= " goods_id = '$goods_id'";
    }

    if ($user_id > 0)
    {
        if ($goods_id > 0)
        {
            $where .= " AND";
        }
        $where .= " user_id = '$user_id'";
    }

    if ($where > '')
    {
        $where = ' WHERE' . $where;
    }

    $sql = 'SELECT 
                tag_id, user_id, tag_words, COUNT(tag_id) AS tag_count' .
            ' FROM ' . 
                $GLOBALS['ec_globals']['ecs']->table('ec_tag') .
            "$where GROUP BY tag_words";
    $arr = M()->query($sql);

    return $arr;
}

/**
 * 调用调查内容
 *
 * @access  public
 * @param   integer $id   调查的编号
 * @return  array
 */
function get_vote($id = '')
{
    $db_prefix=C('DB_PREFIX');
    /* 随机取得一个调查的主题 */
    if (empty($id))
    {
        $time = gmtime();
        $sql = 'SELECT vote_id, vote_name, can_multi, vote_count, RAND() AS rnd' .
               ' FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_vote') .
               " WHERE start_time <= '$time' AND end_time >= '$time' ".
               ' ORDER BY rnd LIMIT 1';
    }
    else
    {
        $sql = 'SELECT vote_id, vote_name, can_multi, vote_count' .
               ' FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_vote').
               " WHERE vote_id = '$id'";
    }
    $vote_arr = M()->getRowSql($sql);
    if ($vote_arr !== false && !empty($vote_arr))
    {
        /* 通过调查的ID,查询调查选项 */
        $sql_option = 'SELECT v.*, o.option_id, o.vote_id, o.option_name, o.option_count ' .
                      'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_vote') . ' AS v, ' .
                            $GLOBALS['ec_globals']['ecs']->table('ec_vote_option')  . ' AS o ' .
                      "WHERE 
                      o.vote_id = v.vote_id AND 
                      o.vote_id = '$vote_arr[vote_id]' ORDER BY o.option_order ASC, o.option_id DESC";
        $res = M()->getAll($sql_option);
        /* 总票数 */
        $sql = 'SELECT SUM(option_count) AS all_option FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_vote_option') .
               " WHERE vote_id = '" . $vote_arr['vote_id'] . "' GROUP BY vote_id";
        $option_num = M()->getOne($sql,'all_option');
        
        $arr = array();
        $count = 100;
        if(!empty($res))
        {
            foreach ($res AS $idx => $row)
            {
                if ($option_num > 0 && $idx == count($res) - 1)
                {
                    $percent = $count;
                }else
                {
                    $percent = ($row['vote_count'] > 0 && $option_num > 0) ? round(($row['option_count'] / $option_num) * 100) : 0;
    
                    $count -= $percent;
                }
                $arr[$row['vote_id']]['options'][$row['option_id']]['percent'] = $percent;
    
                $arr[$row['vote_id']]['vote_id']    = $row['vote_id'];
                $arr[$row['vote_id']]['vote_name']  = $row['vote_name'];
                $arr[$row['vote_id']]['can_multi']  = $row['can_multi'];
                $arr[$row['vote_id']]['vote_count'] = $row['vote_count'];
    
                $arr[$row['vote_id']]['options'][$row['option_id']]['option_id']    = $row['option_id'];
                $arr[$row['vote_id']]['options'][$row['option_id']]['option_name']  = $row['option_name'];
                $arr[$row['vote_id']]['options'][$row['option_id']]['option_count'] = $row['option_count'];
                
            }
        }
        $vote_arr['vote_id'] = (!empty($vote_arr['vote_id'])) ? $vote_arr['vote_id'] : '';
        $vote = array('id' => $vote_arr['vote_id'], 'content' => $arr);
        return $vote;
    }
}


/**
 * 取得红包类型数组（用于生成下拉列表）
 *
 * @return  array       分类数组 bonus_typeid => bonus_type_name
 */
function get_bonus_type()
{
    $bonus = array();
    $sql = 'SELECT type_id, type_name, type_money FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_bonus_type') .
           ' WHERE send_type = 3';
    $res = M()->query($sql);
    
    if(!empty($res)){
        foreach($res as $row)
        {
            $bonus[$row['type_id']] = $row['type_name'].' [' .sprintf(C('ec_currency_format'), $row['type_money']).']';
        }
    }

    return $bonus;
}


/**
 * 取得用户等级数组,按用户级别排序
 * @param   bool      $is_special      是否只显示特殊会员组
 * @return  array     rank_id=>rank_name
 */
function get_rank_list($is_special = false)
{
    $rank_list = array();
    $sql = 'SELECT rank_id, rank_name, min_points FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_user_rank');
    if ($is_special)
    {
        $sql .= ' WHERE special_rank = 1';
    }
    $sql .= ' ORDER BY min_points';

    $res = M()->query($sql);
    
    if(!empty($res)){
        foreach($res as $row)
        {
            $rank_list[$row['rank_id']] = $row['rank_name'];
        }
    }

    return $rank_list;
}


/**
 *  返回文件后缀名，如‘.php’
 *
 * @access  public
 * @param
 *
 * @return  string      文件后缀名
 */
function get_filetype($path)
{
    $pos = strrpos($path, '.');
    if ($pos !== false)
    {
        return substr($path, $pos);
    }
    else
    {
        return '';
    }
}

/**
 * 取得商品列表：用于把商品添加到组合、关联类、赠品类
 * @param   object  $filters    过滤条件
 */
function get_goods_list($filter)
{
    $filter->keyword = json_str_iconv($filter->keyword);
    $where = get_where_sql($filter); // 取得过滤条件

    /* 取得数据 */
    $sql = 'SELECT goods_id, goods_name, shop_price '.
           'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . ' AS g ' . $where .
           'LIMIT 50';
    //p($sql);die;
    $row = M()->getAll($sql);

    return $row;
}





function brand_exists($brand_name){
    $sql = "SELECT COUNT(*) FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_brand').
        " WHERE brand_name = '" . $brand_name . "'";
    return (M()->getOne($sql,'COUNT(*)') > 0) ? true : false;
}

/**
 * 分配帮助信息
 *
 * @access  public
 * @return  array
 */
function get_shop_help()
{
    $sql = 'SELECT c.cat_id, c.cat_name, c.sort_order, a.article_id, a.title, a.file_url, a.open_type ' .
            'FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_article'). ' AS a ' .
            'LEFT JOIN ' .$GLOBALS['ec_globals']['ecs']->table('ec_article_cat'). ' AS c ' .
            'ON a.cat_id = c.cat_id WHERE c.cat_type = 5 AND a.is_open = 1 ' .
            'ORDER BY c.sort_order ASC, a.article_id';
    $res = M()->getAll($sql);

    $arr = array();
    foreach ($res AS $key => $row)
    {
        $arr[$row['cat_id']]['cat_id']                       = ec_build_uri('article_cat', array('acid'=> $row['cat_id']), $row['cat_name']);
        $arr[$row['cat_id']]['cat_name']                     = $row['cat_name'];
        $arr[$row['cat_id']]['article'][$key]['article_id']  = $row['article_id'];
        $arr[$row['cat_id']]['article'][$key]['title']       = $row['title'];
        $ec_article_title_length=C('ec_article_title_length');
        $arr[$row['cat_id']]['article'][$key]['short_title'] = $ec_article_title_length > 0 ?
            sub_str($row['title'], $ec_article_title_length) : $row['title'];
        $arr[$row['cat_id']]['article'][$key]['url']         = $row['open_type'] != 1 ?
            ec_build_uri('article', array('aid' => $row['article_id']), $row['title']) : trim($row['file_url']);
    }

    return $arr;
}



/**
 * 供货商名
 *
 * @return  array
 */
function suppliers_list_name()
{
    /* 查询 */
    $suppliers_list = suppliers_list_info(' is_check = 1 ');

    /* 供货商名字 */
    $suppliers_name = array();
    if (count($suppliers_list) > 0)
    {
        foreach ($suppliers_list as $suppliers)
        {
            $suppliers_name[$suppliers['suppliers_id']] = $suppliers['suppliers_name'];
        }
    }

    return $suppliers_name;
}

/**
 * 供货商列表信息
 *
 * @param       string      $conditions
 * @return      array
 */
function suppliers_list_info($conditions = '')
{
    $where = '';
    if (!empty($conditions))
    {
        $where .= 'WHERE ';
        $where .= $conditions;
    }

    /* 查询 */
    $sql = "SELECT suppliers_id, suppliers_name, suppliers_desc
            FROM " . $GLOBALS['ec_globals']['ecs']->table("ec_suppliers") . "
            $where";

    return M()->getAll($sql);
}

/**
 * 检查分类是否已经存在
 *
 * @param   string      $cat_name       分类名称
 * @param   integer     $parent_cat     上级分类
 * @param   integer     $exclude        排除的分类ID
 *
 * @return  boolean
 */
function cat_exists($cat_name, $parent_cat, $exclude = 0)
{
    $sql = "SELECT COUNT(*) FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_category').
    " WHERE parent_id = '$parent_cat' AND cat_name = '$cat_name' AND cat_id<>'$exclude'";
    return (M()->getOne($sql,'COUNT(*)') > 0) ? true : false;
}

/**
 * 取得广告位置数组（用于生成下拉列表）
 *
 * @return  array       分类数组 position_id => position_name
 */
function get_position_list()
{
    $position_list = array();
    $sql = 'SELECT position_id, position_name, ad_width, ad_height '.
           'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_ad_position');
    $res = M()->query($sql);
    
    if(!empty($res)){
        foreach($res as $row){
            $position_list[$row['position_id']] = addslashes($row['position_name']). ' [' .$row['ad_width']. 'x' .$row['ad_height']. ']';
        }
    }

    return $position_list;
}



/**
 * 获得商品类型的列表
 *
 * @access  public
 * @param   integer     $selected   选定的类型编号
 * @return  string
 */
function goods_type_list($selected)
{
    $sql = 'SELECT cat_id, cat_name FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods_type') . ' WHERE enabled = 1';
    $res = M()->query($sql);

    $lst = '';
    if(!empty($res)){
        foreach($res as $row){
            $lst .= "<option value='$row[cat_id]'";
            $lst .= ($selected == $row['cat_id']) ? ' selected="true"' : '';
            $lst .= '>' . htmlspecialchars($row['cat_name']). '</option>';
        }
    }
    return $lst;
}


/**
 * 获得指定的商品类型下所有的属性分组
 *
 * @param   integer     $cat_id     商品类型ID
 *
 * @return  array
 */
function get_attr_groups($cat_id)
{
    $sql = "SELECT attr_group FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_type') . " WHERE cat_id='$cat_id'";
    $grp = str_replace("\r", '', M()->getOne($sql,'attr_group'));

    if ($grp)
    {
        return explode("\n", $grp);
    }
    else
    {
        return array();
    }
}

/**
 * URL过滤
 * @param   string  $url  参数字符串，一个urld地址,对url地址进行校正
 * @return  返回校正过的url;
 */
function sanitize_url($url , $check = 'http://')
{
    if (strpos( $url, $check ) === false)
    {
        $url = $check . $url;
    }
    return $url;
}

/**
 * 记录管理员的操作内容
 *
 * @access  public
 * @param   string      $sn         数据的唯一值
 * @param   string      $action     操作的类型
 * @param   string      $content    操作的内容
 * @return  void
 */
function admin_log($sn = '', $action, $content)
{
    $db_prefix=C('DB_PREFIX');
    $log_info = $action . $content .': '. addslashes($sn);

    $sql = 'INSERT INTO ' . $db_prefix.'ec_admin_log' . ' (log_time, user_id, log_info, ip_address) ' .
            " VALUES ('" . gmtime() . "', $_SESSION[uid], '" . stripslashes($log_info) . "', '" . real_ip() . "')";
    M()->exe($sql);
}



/**
 * 获得指定分类的所有上级分类
 *
 * @access  public
 * @param   integer $cat    分类编号
 * @return  array
 */
function get_parent_cats($cat)
{
    
    if ($cat == 0)
    {
        return array();
    }
    $arr = M()->GetAll('SELECT cat_id, cat_name, parent_id FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_category'));
    if (empty($arr))
    {
        return array();
    }
    $index = 0;
    $cats  = array();
    while (1)
    {
        foreach ($arr AS $row)
        {
            if ($cat == $row['cat_id'])
            {
                $cat = $row['parent_id'];

                $cats[$index]['cat_id']   = $row['cat_id'];
                $cats[$index]['cat_name'] = $row['cat_name'];

                $index++;
                break;
            }
        }

        if ($index == 0 || $cat == 0)
        {
            break;
        }
    }
    return $cats;
}


/**
 * 取得当前位置和页面标题
 *
 * @access  public
 * @param   integer     $cat    分类编号（只有商品及分类、文章及分类用到）
 * @param   string      $str    商品名、文章标题或其他附加的内容（无链接）
 * @return  array
 */
function assign_ur_here($cat = 0, $str = '')
{
    /* 判断是否重写，取得文件名 */
    $cur_url=APP.'_'.CONTROL.'_'.METHOD;
    $filename=$cur_url;
    //echo $cur_url;die;
    
    /* 初始化“页面标题”和“当前位置” */
    $page_title =C('ec_shop_title');
    $ur_here    = '<a href="'.U('ec/EcIndex/index').'">' . 'トップ' . '</a>';
    
    /* 根据文件名分别处理中间的部分 */
    if ($filename != 'Ec_EcIndex_index'){
        /* 处理有分类的 */
        if (in_array($filename, array('Ec_EcCategory_index', 'Ec_EcGoods_index', 'Ec_EcArticleCat_index ', 'Ec_EcArticle_index', 'Ec_EcBrand_index'))){
            /* 商品分类或商品 */
            if ('Ec_EcCategory_index' == $filename || 'Ec_EcGoods_index' == $filename || 'Ec_EcBrand_index' == $filename)
            {
                if ($cat > 0)
                {
                    $cat_arr = get_parent_cats($cat);
                    //p($cat_arr);die;
                    $key     = 'cid';
                    $type    = 'category';
                }
                else
                {
                    $cat_arr = array();
                }
            }
            /* 文章分类或文章 */
            elseif ('Ec_EcArticleCat_index' == $filename || 'Ec_EcArticle_index' == $filename)
            {
                if ($cat > 0)
                {
                    $cat_arr = get_article_parent_cats($cat);

                    $key  = 'acid';
                    $type = 'article_cat';
                }
                else
                {
                    $cat_arr = array();
                }
            }
            /* 循环分类 */
            if (!empty($cat_arr))
            {
                krsort($cat_arr);
                foreach ($cat_arr AS $val)
                {
                    $page_title = htmlspecialchars($val['cat_name']) . '_' . $page_title;
                    $args       = array($key => $val['cat_id']);
                    $ur_here   .= ' <code>&gt;</code> <a href="' . ec_build_uri($type, $args, $val['cat_name']) . '">' .
                                    htmlspecialchars($val['cat_name']) . '</a>';
                }
            }
        }
        /* 处理无分类的 */
        else{
            /* 团购 */
            if ('group_buy' == $filename)
            {
                echo 'assign_ur_here--2';die;

            }
            /* 拍卖 */
            elseif ('auction' == $filename)
            {
                echo 'assign_ur_here--3';die;
  
            }
            /* 夺宝 */
            elseif ('snatch' == $filename)
            {
                echo 'assign_ur_here--4';die;
            }
            /* 批发 */
            elseif ('wholesale' == $filename)
            {
                echo 'assign_ur_here--5';die;
            }
            /* 积分兑换 */
            elseif ('Ec_EcExchange_index' == $filename)
            {
                $page_title = 'ポイント商品' . '_' . $page_title;
                $args       = array('wsid' => '0');
                $ur_here   .= ' <code>&gt;</code> <a href="'.U('ec/EcExchange/index').'">' .
                                'ポイント商品' . '</a>';
            }
            /* 其他的在这里补充 */
        }
        
    }
    /* 处理最后一部分 */
    if (!empty($str)){
        $page_title  = $str . '_' . $page_title;
        $ur_here    .= ' <code>&gt;</code> ' . $str;
    }
    
     /* 返回值 */
    return array('title' => $page_title, 'ur_here' => $ur_here);
}

/**
 * 根据过滤条件获得排序的标记
 *
 * @access  public
 * @param   array   $filter
 * @return  array
 */
function sort_flag($filter)
{
    $flag['tag']    = 'sort_' . preg_replace('/^.*\./', '', $filter['sort_by']);
    $flag['img']    = '<img src="'.__PUBLIC__.'/ec/images/' . ($filter['sort_order'] == "DESC" ? 'sort_desc.gif' : 'sort_asc.gif') . '"/>';

    return $flag;
}


/**
 * 判断是否为搜索引擎蜘蛛
 *
 * @access  public
 * @return  string
 */
function is_spider($record = true)
{
    static $spider = NULL;

    if ($spider !== NULL)
    {
        return $spider;
    }

    if (empty($_SERVER['HTTP_USER_AGENT']))
    {
        $spider = '';

        return '';
    }

    $searchengine_bot = array(
        'googlebot',
        'mediapartners-google',
        'baiduspider+',
        'msnbot',
        'yodaobot',
        'yahoo! slurp;',
        'yahoo! slurp china;',
        'iaskspider',
        'sogou web spider',
        'sogou push spider'
    );

    $searchengine_name = array(
        'GOOGLE',
        'GOOGLE ADSENSE',
        'BAIDU',
        'MSN',
        'YODAO',
        'YAHOO',
        'Yahoo China',
        'IASK',
        'SOGOU',
        'SOGOU'
    );

    $spider = strtolower($_SERVER['HTTP_USER_AGENT']);

    foreach ($searchengine_bot AS $key => $value)
    {
        if (strpos($spider, $value) !== false)
        {
            $spider = $searchengine_name[$key];

            if ($record === true)
            {
                $GLOBALS['db']->autoReplace($GLOBALS['ecs']->table('searchengine'), array('date' => local_date('Y-m-d'), 'searchengine' => $spider, 'count' => 1), array('count' => 1));
            }

            return $spider;
        }
    }

    $spider = '';

    return '';
}



    


/**
 * 取得某模板某库设置的数量
 * @param   string      $template   模板名，如index
 * @param   string      $library    库名，如recommend_best
 * @param   int         $def_num    默认数量：如果没有设置模板，显示的数量
 * @return  int         数量
 */
function get_library_number($library, $template = null)
{
    $db_prefix=C('DB_PREFIX');
    global $page_libs;
    //p($page_libs);die;
    if (empty($template))
    {
        $template =CONTROL;
    }
    $template = addslashes($template);
    static $lib_list = array();
    //p($lib_list);die;
    /* 如果没有该模板的信息，取得该模板的信息 */
    if (!isset($lib_list[$template]))
    {
        $lib_list[$template] = array();
        $sql = "SELECT library, number FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_template') .
                " WHERE theme = '".C('WEB_STYLE')."'" .
                " AND filename = '$template' AND remarks='' ";
        //p($sql);die;
        $res = M()->query($sql);
        if(!empty($res)){
            foreach($res as $resk => $resv){
                $lib = basename(strtolower(substr($resv['library'], 0, strpos($resv['library'], '.'))));
                $lib_list[$template][$lib] = $resv['number'];
            }
        }
    }
    //echo $library;
    //p($lib_list);die;
    $num = 0;
    if (isset($lib_list[$template][$library]))
    {
        $num = intval($lib_list[$template][$library]);
    }else
    {
        
        /* 模板设置文件查找默认值 */
        include_once(ROOT_PATH  . '/includes/ec/admin/lib_template.php');
        static $static_page_libs = null;
        if ($static_page_libs == null)
        {
            $static_page_libs = $page_libs;
        }
        $lib = '/library/' . $library . '.lbi';

        $num = isset($static_page_libs[$template][$lib]) ? $static_page_libs[$template][$lib] :  3;
        //echo __FILE__.'---'.'get_library_number__1';die;
    }
    return $num;
}




/**
 * 保存过滤条件
 * @param   array   $filter     过滤条件
 * @param   string  $sql        查询语句
 * @param   string  $param_str  参数字符串，由list函数的参数组成
 */
function set_filter($filter, $sql, $param_str = '')
{
    $filterfile=APP.'_'.CONTROL.'_'.METHOD;
    if ($param_str)
    {
        $filterfile .= $param_str;
    }
    setcookie('ZHCMS[lastfilterfile]', sprintf('%X', crc32($filterfile)), time() + 600);
    setcookie('ZHCMS[lastfilter]',     urlencode(serialize($filter)), time() + 600);
    setcookie('ZHCMS[lastfiltersql]',  base64_encode($sql), time() + 600);
}

/**
 * 取得上次的过滤条件
 * @param   string  $param_str  参数字符串，由list函数的参数组成
 * @return  如果有，返回array('filter' => $filter, 'sql' => $sql)；否则返回false
 */
function get_filter($param_str = '')
{
    /*echo APP.'_'.CONTROL.'_'.METHOD;die;
    $filterfile = basename(PHP_SELF, '.php');*/
    $filterfile=APP.'_'.CONTROL.'_'.METHOD;
    if ($param_str)
    {
        $filterfile .= $param_str;
    }
    //echo sprintf('%X', crc32($filterfile));
    //p($_COOKIE);
    if (isset($_GET['uselastfilter']) && isset($_COOKIE['ZHCMS']['lastfilterfile'])
        && $_COOKIE['ZHCMS']['lastfilterfile'] == sprintf('%X', crc32($filterfile)))
    {
        return array(
            'filter' => unserialize(urldecode($_COOKIE['ZHCMS']['lastfilter'])),
            'sql'    => base64_decode($_COOKIE['ZHCMS']['lastfiltersql'])
        );
    }
    else
    {
        return false;
    }
}

function assign_template($controller,$ctype = '', $catlist = array())
{
    //global $this;
    //p($controller);die;
    $controller->assign('navigator_list',        get_navigator($ctype, $catlist));  //自定义导航栏
}


/**
 * 取得自定义导航栏列表
 * @param   string      $type    位置，如top、bottom、middle
 * @return  array         列表
 */
function get_navigator($ctype = '', $catlist = array())
{

    $sql = 'SELECT * FROM '. $GLOBALS['ec_globals']['ecs']->table('ec_nav') . '
            WHERE ifshow = \'1\' ORDER BY type, vieworder';
    $res = M()->query($sql);
   //p($res);
    $cur_url = substr(strrchr($_SERVER['REQUEST_URI'],'/'),1);
    //if (intval($GLOBALS['_CFG']['rewrite']))
    if (0)
    {
        echo 'TODO:get_navigator的rewrote的功能没有测试';
        if(strpos($cur_url, '-'))
        {
            preg_match('/([a-z]*)-([0-9]*)/',$cur_url,$matches);
            $cur_url = $matches[1].'.php?id='.$matches[2];
        }
    }
    else
    {
        $cur_url = substr(strrchr($_SERVER['REQUEST_URI'],'/'),1);
    }
    $noindex = false;
    $active = 0;
    $navlist = array(
        'top' => array(),
        'middle' => array(),
        'bottom' => array()
    );
    foreach($res as $key => $val){
        $navlist[$val['type']][] = array(
            'name'      =>  $val['name'],
            'opennew'   =>  $val['opennew'],
            'url'       =>  $val['url'],
            'ctype'     =>  $val['ctype'],
            'cid'       =>  $val['cid'],
            );
    }
    
    /*遍历自定义是否存在currentPage*/
    foreach($navlist['middle'] as $k=>$v)
    {
        if(empty($ctype)){
            $condition=(strpos($cur_url, $v['url']) === 0) ;
        }else{
            $condition=(strpos($cur_url, $v['url']) === 0 && strlen($cur_url) == strlen($v['url']));
        }
        
        if ($condition)
        {
            $navlist['middle'][$k]['active'] = 1;
            $noindex = true;
            $active += 1;
        }
    }
    if(!empty($ctype) && $active < 1)
    {
        foreach($catlist as $key => $val)
        {
            foreach($navlist['middle'] as $k=>$v)
            {
                if(!empty($v['ctype']) && $v['ctype'] == $ctype && $v['cid'] == $val && $active < 1)
                {
                    $navlist['middle'][$k]['active'] = 1;
                    $noindex = true;
                    $active += 1;
                }
            }
        }
    }

    if ($noindex == false) {
        $navlist['config']['index'] = 1;
    }

    return $navlist;
    
}




/**
 * 生成链接后缀
 */
function list_link_postfix()
{
    return 'uselastfilter=1';
}



/**
 * 生成过滤条件：用于 get_goodslist 和 get_goods_list
 * @param   object  $filter
 * @return  string
 */
function get_where_sql($filter)
{
    $time = date('Y-m-d');

    $where  = isset($filter->is_delete) && $filter->is_delete == '1' ?
        ' WHERE is_delete = 1 ' : ' WHERE is_delete = 0 ';
    $where .= (isset($filter->real_goods) && ($filter->real_goods > -1)) ? ' AND is_real = ' . intval($filter->real_goods) : '';
    $where .= isset($filter->cat_id) && $filter->cat_id > 0 ? ' AND ' . get_children($filter->cat_id) : '';
    $where .= isset($filter->brand_id) && $filter->brand_id > 0 ? " AND brand_id = '" . $filter->brand_id . "'" : '';
    $where .= isset($filter->intro_type) && $filter->intro_type != '0' ? ' AND ' . $filter->intro_type . " = '1'" : '';
    $where .= isset($filter->intro_type) && $filter->intro_type == 'is_promote' ?
        " AND promote_start_date <= '$time' AND promote_end_date >= '$time' " : '';
    $where .= isset($filter->keyword) && trim($filter->keyword) != '' ?
        " AND (goods_name LIKE '%" . mysql_like_quote($filter->keyword) . "%' OR goods_sn LIKE '%" . mysql_like_quote($filter->keyword) . "%' OR goods_id LIKE '%" . mysql_like_quote($filter->keyword) . "%') " : '';
    $where .= isset($filter->suppliers_id) && trim($filter->suppliers_id) != '' ?
        " AND (suppliers_id = '" . $filter->suppliers_id . "') " : '';

    $where .= isset($filter->in_ids) ? ' AND goods_id ' . db_create_in($filter->in_ids) : '';
    $where .= isset($filter->exclude) ? ' AND goods_id NOT ' . db_create_in($filter->exclude) : '';
    $where .= isset($filter->stock_warning) ? ' AND goods_number <= warn_number' : '';

    return $where;
}


/**
 * 分页的信息加入条件的数组
 *
 * @access  public
 * @return  array
 */
function page_and_size($filter)
{
    if (isset($_REQUEST['page_size']) && intval($_REQUEST['page_size']) > 0)
    {
        $filter['page_size'] = intval($_REQUEST['page_size']);
    }
    elseif (isset($_COOKIE['ZHCMS']['page_size']) && intval($_COOKIE['ZHCMS']['page_size']) > 0)
    {
        $filter['page_size'] = intval($_COOKIE['ZHCMS']['page_size']);
    }
    else
    {
        $filter['page_size'] = C('PAGE_SHOW_ROW');
    }
//$filter['page_size']=2;
    /* 每页显示 */
    $filter['page'] = (empty($_REQUEST['page']) || intval($_REQUEST['page']) <= 0) ? 1 : intval($_REQUEST['page']);

    /* page 总数 */
    $filter['page_count'] = (!empty($filter['record_count']) && $filter['record_count'] > 0) ? ceil($filter['record_count'] / $filter['page_size']) : 1;

    /* 边界处理 */
    if ($filter['page'] > $filter['page_count'])
    {
        $filter['page'] = $filter['page_count'];
    }

    $filter['start'] = ($filter['page'] - 1) * $filter['page_size'];

    return $filter;
}

/**
 * 创建一个JSON格式的错误信息
 *
 * @access  public
 * @param   string  $msg
 * @return  void
 */
function make_json_error($msg)
{
    make_json_response('', 1, $msg);
}


/**
 *
 *
 * @access  public
 * @param
 * @return  void
 */
function make_json_result($content, $message='', $append=array())
{
    make_json_response($content, 0, $message, $append);
}



/**
 * 创建一个JSON格式的数据
 *
 * @access  public
 * @param   string      $content
 * @param   integer     $error
 * @param   string      $message
 * @param   array       $append
 * @return  void
 */
function make_json_response($content='', $error="0", $message='', $append=array())
{
    //include_once(ROOT_PATH . 'includes/cls_json.php');

    //$json = new JSON;

    $res = array('error' => $error, 'message' => $message, 'content' => $content);

    if (!empty($append))
    {
        foreach ($append AS $key => $val)
        {
            $res[$key] = $val;
        }
    }

    $val = json_encode($res); //$json->encode($res);

    exit($val);
}

/**
 * 加密函数
 * @param   string  $str    加密前的字符串
 * @param   string  $key    密钥
 * @return  string  加密后的字符串
 */
function encrypt($str, $key = AUTH_KEY)
{
    $coded = '';
    $keylength = strlen($key);

    for ($i = 0, $count = strlen($str); $i < $count; $i += $keylength)
    {
        $coded .= substr($str, $i, $keylength) ^ $key;
    }

    return str_replace('=', '', base64_encode($coded));
}

/**
 * 解密函数
 * @param   string  $str    加密后的字符串
 * @param   string  $key    密钥
 * @return  string  加密前的字符串
 */
function decrypt($str, $key = AUTH_KEY)
{
    $coded = '';
    $keylength = strlen($key);
    $str = base64_decode($str);

    for ($i = 0, $count = strlen($str); $i < $count; $i += $keylength)
    {
        $coded .= substr($str, $i, $keylength) ^ $key;
    }

    return $coded;
}



