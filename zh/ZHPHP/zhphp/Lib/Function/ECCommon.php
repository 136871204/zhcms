<?php

/**
 * 清除模版编译和缓存文件
 *
 * @access  public
 * @param   mix     $ext    模版文件名后缀
 * @return  void
 */
function clear_all_files($ext = '')
{
    //return clear_tpl_files(false, $ext) + clear_tpl_files(true,  $ext);
}



/**
 *
 * 是否存在规格
 *
 * @access      public
 * @param       array       $goods_attr_id_array        一维数组
 *
 * @return      string
 */
function is_spec($goods_attr_id_array, $sort = 'asc')
{
    if (empty($goods_attr_id_array))
    {
        return $goods_attr_id_array;
    }
    
    //重新排序
    $sql = "SELECT a.attr_type, v.attr_value, v.goods_attr_id
            FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_attribute'). " AS a
                    LEFT JOIN " .$GLOBALS['ec_globals']['ecs']->table('ec_goods_attr'). " AS v
                        ON v.attr_id = a.attr_id
                        AND a.attr_type = 1
            WHERE v.goods_attr_id " . db_create_in($goods_attr_id_array) . "
            ORDER BY a.attr_id $sort";

    $row = M()->query($sql);
    //p($sql);
    $return_arr = array();
    if(!empty($row)){
        foreach ($row as $value)
        {
            $return_arr['sort'][]   = $value['goods_attr_id'];
            $return_arr['row'][$value['goods_attr_id']]    = $value;
        }
    }
    if(!empty($return_arr))
    {
        return true;
    }
    else
    {
        return false;
    }
}



/**
 * 格式化重量：小于1千克用克表示，否则用千克表示
 * @param   float   $weight     重量
 * @return  string  格式化后的重量
 */
function formated_weight($weight)
{
    $weight = round(floatval($weight), 3);
    if ($weight > 0)
    {
        if ($weight < 1)
        {
            /* 小于1千克，用克表示 */
            return intval($weight * 1000) . '克';
        }
        else
        {
            /* 大于1千克，用千克表示 */
            return $weight . '千克';
        }
    }
    else
    {
        return 0;
    }
}



/**
 * 取商品的规格列表
 *
 * @param       int      $goods_id    商品id
 * @param       string   $conditions  sql条件
 *
 * @return  array
 */
function get_specifications_list($goods_id, $conditions = '')
{
    /* 取商品属性 */
    $sql = "SELECT ga.goods_attr_id, ga.attr_id, ga.attr_value, a.attr_name
            FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_goods_attr'). " AS ga, " .
                    $GLOBALS['ec_globals']['ecs']->table('ec_attribute'). " AS a
            WHERE ga.attr_id = a.attr_id
            AND ga.goods_id = '$goods_id'
            $conditions";
    $result = M()->getAll($sql);

    $return_array = array();
    if(!empty($result))
    {
        foreach ($result as $value)
        {
            $return_array[$value['goods_attr_id']] = $value;
        }  
    }
    

    return $return_array;
}

/**
 * 获得某个分类下
 *
 * @access  public
 * @param   int     $cat
 * @return  array
 */
function get_brands($cat = 0, $app = 'brand')
{
    $db_prefix=C("DB_PREFIX");
    global $page_libs;
    $template =CONTROL;
    $template =strtolower($template);
    static $static_page_libs = null;
    include_once(ROOT_PATH . '/includes/ECTemplate.php');
    if ($static_page_libs == null)
    {
        $static_page_libs = $page_libs;
    }
    $children = ($cat > 0) ? ' AND ' . get_children($cat) : '';
    $sql = "SELECT 
                b.brand_id, 
                b.brand_name, 
                b.brand_logo, 
                b.brand_desc, 
                COUNT(*) AS goods_num, 
                IF(b.brand_logo > '', '1', '0') AS tag ".
            "FROM 
                " . $db_prefix.'ec_brand' . " AS b, ".
                $db_prefix.'ec_goods' . " AS g ".
            "WHERE 
                g.brand_id = b.brand_id 
                $children AND 
                is_show = 1 " .
                " AND 
                g.is_on_sale = 1 AND 
                g.is_alone_sale = 1 AND 
                g.is_delete = 0 ".
            "GROUP BY b.brand_id HAVING goods_num > 0 ORDER BY tag DESC, b.sort_order ASC";
    
    if (isset($static_page_libs[$template]['/library/brands.lbi']))
    {
        $num = get_library_number("brands");
        //p($num);die;
        $sql .= " LIMIT $num ";
    }

    $row = M()->query($sql);
    if(!empty($row))
    {
        foreach ($row AS $key => $val)
        {
            $row[$key]['url'] = ec_build_uri($app, array('cid' => $cat, 'bid' => $val['brand_id']), $val['brand_name']);
            $row[$key]['brand_desc'] = htmlspecialchars($val['brand_desc'],ENT_QUOTES);
        }
    }
    return $row;
    
}


/**
 * 取得商品最终使用价格
 *
 * @param   string  $goods_id      商品编号
 * @param   string  $goods_num     购买数量
 * @param   boolean $is_spec_price 是否加入规格价格
 * @param   mix     $spec          规格ID的数组或者逗号分隔的字符串
 *
 * @return  商品最终购买价格
 * get_final_price($goods_id, $number, true, $attr_id);
 */
function get_final_price($goods_id, $goods_num = '1', $is_spec_price = false, $spec = array())
{
    $final_price   = '0'; //商品最终购买价格
    $volume_price  = '0'; //商品优惠价格
    $promote_price = '0'; //商品促销价格
    $user_price    = '0'; //商品会员价格
    //取得商品优惠价格列表
    $price_list   = get_volume_price_list($goods_id, '1');
    if (!empty($price_list))
    {
        foreach ($price_list as $value)
        {
            if ($goods_num >= $value['number'])
            {
                $volume_price = $value['price'];
            }
        }
    }
    //取得商品促销价格列表
    /* 取得商品信息 */
    $sql = "SELECT g.promote_price, g.promote_start_date, g.promote_end_date, ".
                "IFNULL(mp.user_price, g.shop_price * '" . $_SESSION['ec_discount'] . "') AS shop_price ".
           " FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_goods'). " AS g ".
           " LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . " AS mp ".
                   "ON mp.goods_id = g.goods_id AND mp.user_rank = '" . $_SESSION['ec_user_rank']. "' ".
           " WHERE g.goods_id = '" . $goods_id . "'" .
           " AND g.is_delete = 0";
    $goods = M()->getRowSql($sql);
    /* 计算商品的促销价格 */
    if ($goods['promote_price'] > 0)
    {
        $promote_price = bargain_price($goods['promote_price'], $goods['promote_start_date'], $goods['promote_end_date']);
    }
    else
    {
        $promote_price = 0;
    }
    
    //取得商品会员价格列表
    $user_price    = $goods['shop_price'];
    //比较商品的促销价格，会员价格，优惠价格
    if (empty($volume_price) && empty($promote_price))
    {
        //如果优惠价格，促销价格都为空则取会员价格
        $final_price = $user_price;
    }
    elseif (!empty($volume_price) && empty($promote_price))
    {
        //如果优惠价格为空时不参加这个比较。
        $final_price = min($volume_price, $user_price);
    }
    elseif (empty($volume_price) && !empty($promote_price))
    {
        //如果促销价格为空时不参加这个比较。
        $final_price = min($promote_price, $user_price);
    }
    elseif (!empty($volume_price) && !empty($promote_price))
    {
        //取促销价格，会员价格，优惠价格最小值
        $final_price = min($volume_price, $promote_price, $user_price);
    }
    else
    {
        $final_price = $user_price;
    }
    //如果需要加入规格价格
    if ($is_spec_price)
    {
        if (!empty($spec))
        {
            $spec_price   = spec_price($spec);
            $final_price += $spec_price;
        }
    }
    //返回商品最终购买价格
    return $final_price;
}



/**
 *  所有的促销活动信息
 *
 * @access  public
 * @return  array
 */
function get_promotion_info($goods_id = '')
{
    $db_prefix=C("DB_PREFIX");
    $snatch = array();
    $group = array();
    $auction = array();
    $package = array();
    $favourable = array();
    
    $gmtime = gmtime();
    $sql = 'SELECT 
            act_id, 
            act_name, 
            act_type, 
            start_time, 
            end_time 
            FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity')  . " 
            WHERE 
                is_finished=0 AND 
                start_time <= '$gmtime' AND 
                end_time >= '$gmtime'";
    if(!empty($goods_id))
    {
        $sql .= " AND goods_id = '$goods_id'";
    }
    $res = M()->getAll($sql);
    if(!empty($res)){
        foreach ($res as $data)
        {
            switch ($data['act_type'])
            {
                case GAT_SNATCH: //夺宝奇兵
                    $snatch[$data['act_id']]['act_name'] = $data['act_name'];
                    $snatch[$data['act_id']]['url'] = ec_build_uri('snatch', array('sid' => $data['act_id']));
                    $snatch[$data['act_id']]['time'] = sprintf('的时间为%s到%s，赶快来抢吧！', local_date('Y-m-d', $data['start_time']), local_date('Y-m-d', $data['end_time']));
                    $snatch[$data['act_id']]['sort'] = $data['start_time'];
                    $snatch[$data['act_id']]['type'] = 'snatch';
                    break;
    
                case GAT_GROUP_BUY: //团购
                    $group[$data['act_id']]['act_name'] = $data['act_name'];
                    $group[$data['act_id']]['url'] = ec_build_uri('group_buy', array('gbid' => $data['act_id']));
                    $group[$data['act_id']]['time'] = sprintf('的时间为%s到%s，赶快来抢吧！', local_date('Y-m-d', $data['start_time']), local_date('Y-m-d', $data['end_time']));
                    $group[$data['act_id']]['sort'] = $data['start_time'];
                    $group[$data['act_id']]['type'] = 'group_buy';
                    break;
    
                case GAT_AUCTION: //拍卖
                    $auction[$data['act_id']]['act_name'] = $data['act_name'];
                    $auction[$data['act_id']]['url'] = ec_build_uri('auction', array('auid' => $data['act_id']));
                    $auction[$data['act_id']]['time'] = sprintf('的时间为%s到%s，赶快来抢吧！', local_date('Y-m-d', $data['start_time']), local_date('Y-m-d', $data['end_time']));
                    $auction[$data['act_id']]['sort'] = $data['start_time'];
                    $auction[$data['act_id']]['type'] = 'auction';
                    break;
    
                case GAT_PACKAGE: //礼包
                    $package[$data['act_id']]['act_name'] = $data['act_name'];
                    $package[$data['act_id']]['url'] = 'index.php?a=ec&c=EcPackage&m=index#' . $data['act_id'];
                    $package[$data['act_id']]['time'] = sprintf('的时间为%s到%s，赶快来抢吧！', local_date('Y-m-d', $data['start_time']), local_date('Y-m-d', $data['end_time']));
                    $package[$data['act_id']]['sort'] = $data['start_time'];
                    $package[$data['act_id']]['type'] = 'package';
                    break;
            }
        }
    }
    
    $user_rank = ',' . $_SESSION['ec_user_rank'] . ',';
    $favourable = array();
    $sql = 'SELECT 
                act_id, act_range, act_range_ext, act_name, start_time, end_time 
            FROM ' . 
                $GLOBALS['ec_globals']['ecs']->table('ec_favourable_activity') . " 
            WHERE 
                start_time <= '$gmtime' AND end_time >= '$gmtime'";
    if(!empty($goods_id))
    {
        $sql .= " AND CONCAT(',', user_rank, ',') LIKE '%" . $user_rank . "%'";
    }
    $res = M()->getAll($sql);
    if(empty($goods_id))
    {
        if(!empty($res)){
            foreach ($res as $rows)
            {
                $favourable[$rows['act_id']]['act_name'] = $rows['act_name'];
                $favourable[$rows['act_id']]['url'] = U('ec/EcActivity/index');
                $favourable[$rows['act_id']]['time'] = sprintf('的时间为%s到%s，赶快来抢吧！', local_date('Y-m-d', $rows['start_time']), local_date('Y-m-d', $rows['end_time']));
                $favourable[$rows['act_id']]['sort'] = $rows['start_time'];
                $favourable[$rows['act_id']]['type'] = 'favourable';
            }
        }
    }else{
        
        $sql = "SELECT cat_id, brand_id FROM " . $db_prefix.'ec_goods' .
                " WHERE goods_id = '$goods_id'";
        $row = M()->getRowSql($sql);
        //p($row);die;
        $category_id = $row['cat_id'];
        $brand_id = $row['brand_id'];
        if(!empty($res)){
            foreach($res as $rows)
            {
                if ($rows['act_range'] == FAR_ALL)// 全部商品
                {
                    $favourable[$rows['act_id']]['act_name'] = $rows['act_name'];
                    $favourable[$rows['act_id']]['url'] = 'activity.php';
                    $favourable[$rows['act_id']]['time'] = sprintf('的时间为%s到%s，赶快来抢吧！', local_date('Y-m-d', $rows['start_time']), local_date('Y-m-d', $rows['end_time']));
                    $favourable[$rows['act_id']]['sort'] = $rows['start_time'];
                    $favourable[$rows['act_id']]['type'] = 'favourable';
                }elseif ($rows['act_range'] == FAR_CATEGORY)// 按分类选择
                {
                    /* 找出分类id的子分类id */
                    $id_list = array();
                    $raw_id_list = explode(',', $rows['act_range_ext']);
                    foreach ($raw_id_list as $id)
                    {
                        $id_list = array_merge($id_list, array_keys(cat_list($id, 0, false)));
                    }
                    $ids = join(',', array_unique($id_list));
    
                    if (strpos(',' . $ids . ',', ',' . $category_id . ',') !== false)
                    {
                        $favourable[$rows['act_id']]['act_name'] = $rows['act_name'];
                        $favourable[$rows['act_id']]['url'] = 'activity.php';
                        $favourable[$rows['act_id']]['time'] = sprintf('的时间为%s到%s，赶快来抢吧！', local_date('Y-m-d', $rows['start_time']), local_date('Y-m-d', $rows['end_time']));
                        $favourable[$rows['act_id']]['sort'] = $rows['start_time'];
                        $favourable[$rows['act_id']]['type'] = 'favourable';
                    }
                }
                elseif ($rows['act_range'] == FAR_BRAND)
                {
                    if (strpos(',' . $rows['act_range_ext'] . ',', ',' . $brand_id . ',') !== false)
                    {
                        $favourable[$rows['act_id']]['act_name'] = $rows['act_name'];
                        $favourable[$rows['act_id']]['url'] = 'activity.php';
                        $favourable[$rows['act_id']]['time'] = sprintf('的时间为%s到%s，赶快来抢吧！', local_date('Y-m-d', $rows['start_time']), local_date('Y-m-d', $rows['end_time']));
                        $favourable[$rows['act_id']]['sort'] = $rows['start_time'];
                        $favourable[$rows['act_id']]['type'] = 'favourable';
                    }
                }
                elseif ($rows['act_range'] == FAR_GOODS)
                {
                    if (strpos(',' . $rows['act_range_ext'] . ',', ',' . $goods_id . ',') !== false)
                    {
                        $favourable[$rows['act_id']]['act_name'] = $rows['act_name'];
                        $favourable[$rows['act_id']]['url'] = 'activity.php';
                        $favourable[$rows['act_id']]['time'] = sprintf('的时间为%s到%s，赶快来抢吧！', local_date('Y-m-d', $rows['start_time']), local_date('Y-m-d', $rows['end_time']));
                        $favourable[$rows['act_id']]['sort'] = $rows['start_time'];
                        $favourable[$rows['act_id']]['type'] = 'favourable';
                    }
                }
            }
        }

    }
    
    $sort_time = array();
    $arr = array_merge($snatch, $group, $auction, $package, $favourable);
    foreach($arr as $key => $value)
    {
        $sort_time[] = $value['sort'];
    }
    array_multisort($sort_time, SORT_NUMERIC, SORT_DESC, $arr);
    
    return $arr;
}

/**
 * 获取指定id package 的信息
 *
 * @access  public
 * @param   int         $id         package_id
 *
 * @return array       array(package_id, package_name, goods_id,start_time, end_time, min_price, integral)
 */
function get_package_info($id)
{
    $id = is_numeric($id)?intval($id):0;
    $now = gmtime();
    
    $sql = "SELECT act_id AS id,  act_name AS package_name, goods_id , goods_name, start_time, end_time, act_desc, ext_info".
           " FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') .
           " WHERE act_id='$id' AND act_type = " . GAT_PACKAGE;
    $package = M()->GetRowSql($sql);
    
    /* 将时间转成可阅读格式 */
    if ($package['start_time'] <= $now && $package['end_time'] >= $now)
    {
        $package['is_on_sale'] = "1";
    }
    else
    {
        $package['is_on_sale'] = "0";
    }
    $package['start_time'] = local_date('Y-m-d H:i', $package['start_time']);
    $package['end_time']   = local_date('Y-m-d H:i', $package['end_time']);
    $row = unserialize($package['ext_info']);
    unset($package['ext_info']);
    if ($row)
    {
        foreach ($row as $key=>$val)
        {
            $package[$key] = $val;
        }
    }
    
    $sql = "SELECT pg.package_id, pg.goods_id, pg.goods_number, pg.admin_id, ".
           " g.goods_sn, g.goods_name, g.market_price, g.goods_thumb, g.is_real, ".
           " IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS rank_price " .
           " FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_package_goods') . " AS pg ".
           "   LEFT JOIN ". $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g ".
           "   ON g.goods_id = pg.goods_id ".
           " LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . " AS mp ".
                "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' ".
           " WHERE pg.package_id = " . $id. " ".
           " ORDER BY pg.package_id, pg.goods_id";
    
    $goods_res = M()->getAll($sql);
    
    $market_price        = 0;
    $real_goods_count    = 0;
    $virtual_goods_count = 0;
    
    if(!empty($goods_res))
    {
        foreach($goods_res as $key => $val)
        {
            $goods_res[$key]['goods_thumb']         = get_image_path($val['goods_id'], $val['goods_thumb'], true);
            $goods_res[$key]['market_price_format'] = price_format($val['market_price']);
            $goods_res[$key]['rank_price_format']   = price_format($val['rank_price']);
            $market_price += $val['market_price'] * $val['goods_number'];
            /* 统计实体商品和虚拟商品的个数 */
            if ($val['is_real'])
            {
                $real_goods_count++;
            }
            else
            {
                $virtual_goods_count++;
            }
        }
    }
    
    if ($real_goods_count > 0)
    {
        $package['is_real']            = 1;
    }
    else
    {
        $package['is_real']            = 0;
    }
    $package['goods_list']            = $goods_res;
    $package['market_package']        = $market_price;
    $package['market_package_format'] = price_format($market_price);
    $package['package_price_format']  = price_format($package['package_price']);
    
    return $package;
}

/**
 * 获得指定礼包的商品
 *
 * @access  public
 * @param   integer $package_id
 * @return  array
 */
function get_package_goods($package_id)
{
    $sql = "SELECT pg.goods_id, g.goods_name, pg.goods_number, p.goods_attr, p.product_number, p.product_id
            FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_package_goods') . " AS pg
                LEFT JOIN " .$GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g ON pg.goods_id = g.goods_id
                LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_products') . " AS p ON pg.product_id = p.product_id
            WHERE pg.package_id = '$package_id'";
    if ($package_id == 0)
    {
        $sql .= " AND pg.admin_id = '$_SESSION[uid]'";
    }
    $resource = M()->query($sql);
    if (!$resource)
    {
        return array();
    }

    $row = array();

    /* 生成结果数组 取存在货品的商品id 组合商品id与货品id */
    $good_product_str = '';
    if(!empty($resource))
    {
        foreach($resource as $_row)
        {
            if ($_row['product_id'] > 0)
            {
                /* 取存商品id */
                $good_product_str .= ',' . $_row['goods_id'];
    
                /* 组合商品id与货品id */
                $_row['g_p'] = $_row['goods_id'] . '_' . $_row['product_id'];
            }
            else
            {
                /* 组合商品id与货品id */
                $_row['g_p'] = $_row['goods_id'];
            }
    
            //生成结果数组
            $row[] = $_row;
        }
    }
    $good_product_str = trim($good_product_str, ',');

    /* 释放空间 */
    unset($resource, $_row, $sql);

    /* 取商品属性 */
    if ($good_product_str != '')
    {
        $sql = "SELECT goods_attr_id, attr_value FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_goods_attr'). " WHERE goods_id IN ($good_product_str)";
        $result_goods_attr = M()->getAll($sql);

        $_goods_attr = array();
        
        if(!empty($result_goods_attr))
        {
            foreach ($result_goods_attr as $value)
            {
                $_goods_attr[$value['goods_attr_id']] = $value['attr_value'];
            }
        }
        
    }

    /* 过滤货品 */
    $format[0] = '%s[%s]--[%d]';
    $format[1] = '%s--[%d]';
    foreach ($row as $key => $value)
    {
        if ($value['goods_attr'] != '')
        {
            $goods_attr_array = explode('|', $value['goods_attr']);

            $goods_attr = array();
            foreach ($goods_attr_array as $_attr)
            {
                $goods_attr[] = $_goods_attr[$_attr];
            }

            $row[$key]['goods_name'] = sprintf($format[0], $value['goods_name'], implode('，', $goods_attr), $value['goods_number']);
        }
        else
        {
            $row[$key]['goods_name'] = sprintf($format[1], $value['goods_name'], $value['goods_number']);
        }
    }

    return $row;
}

/**
 * 记录帐户变动
 * @param   int     $user_id        用户id
 * @param   float   $user_money     可用余额变动
 * @param   float   $frozen_money   冻结余额变动
 * @param   int     $rank_points    等级积分变动
 * @param   int     $pay_points     消费积分变动
 * @param   string  $change_desc    变动说明
 * @param   int     $change_type    变动类型：参见常量文件
 * @return  void
 * 
 * 
 *  * 解冻 
    log_account_change($auction['last_bid']['bid_user'], $auction['deposit'],
        (-1) * $auction['deposit'], 0, 0, sprintf('解冻拍卖活动的保证金：%s', $auction['act_name']));
* 
* 扣除
    log_account_change($auction['last_bid']['bid_user'], 0,
        (-1) * $auction['deposit'], 0, 0, sprintf('扣除拍卖活动的保证金：%s', $auction['act_name']));
 */
function log_account_change($user_id, $user_money = 0, $frozen_money = 0, $rank_points = 0, $pay_points = 0, $change_desc = '', $change_type = ACT_OTHER)
{
    /* 插入帐户变动记录 */
    $account_log = array(
        'user_id'       => $user_id,
        'user_money'    => $user_money,
        'frozen_money'  => $frozen_money,
        'rank_points'   => $rank_points,
        'pay_points'    => $pay_points,
        'change_time'   => gmtime(),
        'change_desc'   => $change_desc,
        'change_type'   => $change_type
    );
    M()->autoExecute($GLOBALS['ec_globals']['ecs']->table('ec_account_log'), $account_log, 'INSERT');

    /* 更新用户信息 */
    $sql = "UPDATE " . $GLOBALS['ec_globals']['ecs']->table('ec_users') .
            " SET user_money = user_money + ('$user_money')," .
            " frozen_money = frozen_money + ('$frozen_money')," .
            " rank_points = rank_points + ('$rank_points')," .
            " pay_points = pay_points + ('$pay_points')" .
            " WHERE user_id = '$user_id' LIMIT 1";
    M()->exe($sql);
}


/**
 * 获取指定 id snatch 活动的结果
 *
 * @access  public
 * @param   int   $id       snatch_id
 *
 * @return  array           array(user_name, bie_price, bid_time, num)
 *                          num通常为1，如果为2表示有2个用户取到最小值，但结果只返回最早出价用户。
 */
function get_snatch_result($id)
{
    $sql = 'SELECT u.user_id, u.user_name, u.email, lg.bid_price, lg.bid_time, count(*) as num' .
            ' FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_snatch_log') . ' AS lg '.
            ' LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_users') . ' AS u ON lg.user_id = u.user_id'.
            " WHERE lg.snatch_id = '$id'".
            ' GROUP BY lg.bid_price' .
            ' ORDER BY num ASC, lg.bid_price ASC, lg.bid_time ASC LIMIT 1';
    $rec = M()->GetRowSql($sql);

    if ($rec)
    {
        $rec['bid_time']  = local_date(C('ec_time_format'), $rec['bid_time']);
        $rec['formated_bid_price'] = price_format($rec['bid_price'], false);

        /* 活动信息 */
        $sql = "SELECT ext_info "   .
               " FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') .
               " WHERE act_id= '$id' AND act_type=" . GAT_SNATCH.
               " LIMIT 1";
               //echo $sql;
        $row = M()->getOne($sql,'ext_info');
        //p($row);
        $info = unserialize($row);

        if (!empty($info['max_price']))
        {
            $rec['buy_price'] = ($rec['bid_price'] > $info['max_price']) ? $info['max_price'] : $rec['bid_price'];
        }
        else
        {
            $rec['buy_price'] = $rec['bid_price'];
        }



        /* 检查订单 */
        $sql = "SELECT COUNT(*)" .
                " FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_order_info') .
                " WHERE extension_code = 'snatch'" .
                " AND extension_id = '$id'" .
                " AND order_status " . db_create_in(array(OS_CONFIRMED, OS_UNCONFIRMED));

        $rec['order_count'] = M()->getOne($sql,'COUNT(*)');
    }

    return $rec;
}



/**
 * 获得指定国家的所有省份
 *
 * @access      public
 * @param       int     country    国家的编号
 * @return      array
 */
function get_regions($type = 0, $parent = 0)
{
    $db_prefix=C("DB_PREFIX");
    $sql = 'SELECT region_id, region_name FROM ' . $db_prefix.'ec_region' .
            " WHERE region_type = '$type' AND parent_id = '$parent'";

    return M()->GetAll($sql);
}


/**
 * 获取邮件模板
 *
 * @access  public
 * @param:  $tpl_name[string]       模板代码
 *
 * @return array
 */
function get_mail_template($tpl_name)
{
    $sql = 'SELECT 
                    template_subject, is_html, template_content 
            FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_mail_templates') . " WHERE template_code = '$tpl_name'";

    return M()->GetRowSql($sql);

}



/**
 * 将 goods_attr_id 的序列按照 attr_id 重新排序
 *
 * 注意：非规格属性的id会被排除
 *
 * @access      public
 * @param       array       $goods_attr_id_array        一维数组
 * @param       string      $sort                       序号：asc|desc，默认为：asc
 *
 * @return      string
 */
function sort_goods_attr_id_array($goods_attr_id_array, $sort = 'asc')
{
    if (empty($goods_attr_id_array))
    {
        return $goods_attr_id_array;
    }

    //重新排序
    $sql = "SELECT a.attr_type, v.attr_value, v.goods_attr_id
            FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_attribute'). " AS a
            LEFT JOIN " .$GLOBALS['ec_globals']['ecs']->table('ec_goods_attr'). " AS v
                ON v.attr_id = a.attr_id
                AND a.attr_type = 1
            WHERE v.goods_attr_id " . db_create_in($goods_attr_id_array) . "
            ORDER BY a.attr_id $sort";
    $row = M()->query($sql);

    $return_arr = array();
    if(!empty($row))
    {
        foreach ($row as $value)
        {
            $return_arr['sort'][]   = $value['goods_attr_id'];
    
            $return_arr['row'][$value['goods_attr_id']]    = $value;
        }

    }
    
    return $return_arr;
}

/**
 * 取得商品优惠价格列表
 *
 * @param   string  $goods_id    商品编号
 * @param   string  $price_type  价格类别(0为全店优惠比率，1为商品优惠价格，2为分类优惠比率)
 *
 * @return  优惠价格列表
 */
function get_volume_price_list($goods_id, $price_type = '1')
{
    $volume_price = array();
    $temp_index   = '0';

    $sql = "SELECT `volume_number` , `volume_price`".
           " FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_volume_price'). "".
           " WHERE `goods_id` = '" . $goods_id . "' AND `price_type` = '" . $price_type . "'".
           " ORDER BY `volume_number`";

    $res = M()->getAll($sql);

    if(!empty($res)){
        foreach ($res as $k => $v)
        {
            $volume_price[$temp_index]                 = array();
            $volume_price[$temp_index]['number']       = $v['volume_number'];
            $volume_price[$temp_index]['price']        = $v['volume_price'];
            $volume_price[$temp_index]['format_price'] = price_format($v['volume_price']);
            $temp_index ++;
        }
    }
    
    return $volume_price;
}

/**
 * 取得品牌列表
 * @return array 品牌列表 id => name
 */
function get_brand_list()
{
    $sql = 'SELECT brand_id, brand_name FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_brand') . ' ORDER BY sort_order';
    $res = M()->getAll($sql);

    $brand_list = array();
    foreach ($res AS $row)
    {
        $brand_list[$row['brand_id']] = addslashes($row['brand_name']);
    }

    return $brand_list;
}

/**
 * 清除缓存文件
 *
 * @access  public
 * @param   mix     $ext    模版文件名， 不包含后缀
 * @return  void
 */
function clear_cache_files($ext = '')
{
    //文章分类缓存删除
    cache('art_cat_pid_releate',null);
    //return clear_tpl_files(true, $ext);
}



/**
 * 获得指定分类下的子分类的数组
 *
 * @access  public
 * @param   int     $cat_id     分类的ID
 * @param   int     $selected   当前选中分类的ID
 * @param   boolean $re_type    返回的类型: 值为真时返回下拉列表,否则返回数组
 * @param   int     $level      限定返回的级数。为0时返回所有级数
 * @param   int     $is_show_all 如果为true显示所有分类，如果为false隐藏不可见分类。
 * @return  mix
 */
function cat_list($cat_id = 0, $selected = 0, $re_type = true, $level = 0, $is_show_all = true)
{
    static $res = NULL;

    $db_prefix=C("DB_PREFIX");
    if ($res === NULL)
    {
        //TODO：关于缓存 之后再处理
        //$data = read_static_cache('cat_pid_releate');
        $data = cache('cat_pid_releate');
        $data=null;
        if ($data === null)
        {
            $sql = "SELECT 
                        c.cat_id, 
                        c.cat_name, 
                        c.measure_unit, 
                        c.parent_id, 
                        c.is_show, 
                        c.show_in_nav, 
                        c.grade, 
                        c.sort_order, 
                        COUNT(s.cat_id) AS has_children ".
                    'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_category'). " AS c ".
                    "LEFT JOIN " .  $GLOBALS['ec_globals']['ecs']->table('ec_category') . " AS s ON s.parent_id=c.cat_id ".
                    "GROUP BY c.cat_id ".
                    'ORDER BY c.parent_id, c.sort_order ASC';    
            $res = M()->query($sql);

            $sql = "SELECT 
                        cat_id, 
                        COUNT(*) AS goods_num " .
                    " FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods').
                    " WHERE 
                        is_delete = 0 AND 
                        is_on_sale = 1 " .
                    " GROUP BY cat_id";
            $res2 = M()->query($sql);
            
            $sql = "SELECT 
                        gc.cat_id, 
                        COUNT(*) AS goods_num " .
                    " FROM 
                    " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_cat') . " AS gc , 
                    " .  $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g " .
                    " WHERE 
                        g.goods_id = gc.goods_id AND 
                        g.is_delete = 0 AND 
                        g.is_on_sale = 1 " .
                    " GROUP BY gc.cat_id";
            $res3 = M()->query($sql);
            
            $newres = array();
            if(!empty($res2))
            {
                foreach($res2 as $k=>$v)
                {
                    $newres[$v['cat_id']] = $v['goods_num'];
                    if(!empty($res3))
                    {
                        foreach($res3 as $ks=>$vs)
                        {
                            if($v['cat_id'] == $vs['cat_id'])
                            {
                            $newres[$v['cat_id']] = $v['goods_num'] + $vs['goods_num'];
                            }
                        }
                    }
                    
                }
            }

            if(!empty($res))
            {
                foreach($res as $k=>$v)
                {
                    $res[$k]['goods_num'] = !empty($newres[$v['cat_id']]) ? $newres[$v['cat_id']] : 0;
                }  
            }
            
            //如果数组过大，不采用静态缓存方式
            if (count($res) <= 1000)
            {
                cache('cat_pid_releate',$res);
            }
        }
        else
        {
            $res = $data;
        }
    }
    
    if (empty($res) == true)
    {
        return $re_type ? '' : array();
    }
    
    
    $options =cat_options($cat_id, $res); // 获得指定分类下的子分类的数组

//p($options);die;
    $children_level = 99999; //大于这个分类的将被删除
    if ($is_show_all == false)
    {
        foreach ($options as $key => $val)
        {
            if ($val['level'] > $children_level)
            {
                unset($options[$key]);
            }
            else
            {
                if ($val['is_show'] == 0)
                {
                    unset($options[$key]);
                    if ($children_level > $val['level'])
                    {
                        $children_level = $val['level']; //标记一下，这样子分类也能删除
                    }
                }
                else
                {
                    $children_level = 99999; //恢复初始值
                }
            }
        }
    }

    /* 截取到指定的缩减级别 */
    if ($level > 0)
    {
        if ($cat_id == 0)
        {
            $end_level = $level;
        }
        else
        {
            $first_item = reset($options); // 获取第一个元素
            $end_level  = $first_item['level'] + $level;
        }

        /* 保留level小于end_level的部分 */
        foreach ($options AS $key => $val)
        {
            if ($val['level'] >= $end_level)
            {
                unset($options[$key]);
            }
        }
    }

    if ($re_type == true)
    {
        $select = '';
        foreach ($options AS $var)
        {
            $select .= '<option value="' . $var['cat_id'] . '" ';
            $select .= ($selected == $var['cat_id']) ? "selected='ture'" : '';
            $select .= '>';
            if ($var['level'] > 0)
            {
                $select .= str_repeat('&nbsp;', $var['level'] * 4);
            }
            $select .= htmlspecialchars(addslashes($var['cat_name']), ENT_QUOTES) . '</option>';
        }

        return $select;
    }
    else
    {
        foreach ($options AS $key => $value)
        {
            $options[$key]['url'] = ec_build_uri('category', array('cid' => $value['cat_id']), $value['cat_name']);
        }

        return $options;
    }
}

/**
 * 过滤和排序所有分类，返回一个带有缩进级别的数组
 *
 * @access  private
 * @param   int     $cat_id     上级分类ID
 * @param   array   $arr        含有所有分类的数组
 * @param   int     $level      级别
 * @return  void
 */
function cat_options($spec_cat_id, $arr)
{
    static $cat_options = array();

    if (isset($cat_options[$spec_cat_id]))
    {
        return $cat_options[$spec_cat_id];
    }
    
    if (!isset($cat_options[0]))
    {
        
        $level = $last_cat_id = 0;
        $options = $cat_id_array = $level_array = array();
        //TODO：关于缓存 之后再处理
        $data = null;//cache('cat_option_static');
        if ($data === null)
        {
            while (!empty($arr))
            {
                foreach ($arr AS $key => $value)
                {
                    $cat_id = $value['cat_id'];
                    if ($level == 0 && $last_cat_id == 0)
                    {
                        if ($value['parent_id'] > 0)
                        {
                            break;
                        }

                        $options[$cat_id]          = $value;
                        $options[$cat_id]['level'] = $level;
                        $options[$cat_id]['id']    = $cat_id;
                        $options[$cat_id]['name']  = $value['cat_name'];
                        unset($arr[$key]);

                        if ($value['has_children'] == 0)
                        {
                            continue;
                        }
                        $last_cat_id  = $cat_id;
                        $cat_id_array = array($cat_id);
                        $level_array[$last_cat_id] = ++$level;
                        continue;
                    }

                    if ($value['parent_id'] == $last_cat_id)
                    {
                        $options[$cat_id]          = $value;
                        $options[$cat_id]['level'] = $level;
                        $options[$cat_id]['id']    = $cat_id;
                        $options[$cat_id]['name']  = $value['cat_name'];
                        unset($arr[$key]);

                        if ($value['has_children'] > 0)
                        {
                            if (end($cat_id_array) != $last_cat_id)
                            {
                                $cat_id_array[] = $last_cat_id;
                            }
                            $last_cat_id    = $cat_id;
                            $cat_id_array[] = $cat_id;
                            $level_array[$last_cat_id] = ++$level;
                        }
                    }
                    elseif ($value['parent_id'] > $last_cat_id)
                    {
                        break;
                    }
                }

                $count = count($cat_id_array);
                if ($count > 1)
                {
                    $last_cat_id = array_pop($cat_id_array);
                }
                elseif ($count == 1)
                {
                    if ($last_cat_id != end($cat_id_array))
                    {
                        $last_cat_id = end($cat_id_array);
                    }
                    else
                    {
                        $level = 0;
                        $last_cat_id = 0;
                        $cat_id_array = array();
                        continue;
                    }
                }

                if ($last_cat_id && isset($level_array[$last_cat_id]))
                {
                    $level = $level_array[$last_cat_id];
                }
                else
                {
                    $level = 0;
                }
            }
            //如果数组过大，不采用静态缓存方式
            if (count($options) <= 2000)
            {
                cache('cat_option_static', $options);
            }
        }
        else
        {
            $options = $data;
        }
        $cat_options[0] = $options;
    }
    else
    {
        $options = $cat_options[0];
    }

    if (!$spec_cat_id)
    {
        return $options;
    }
    else
    {
        if (empty($options[$spec_cat_id]))
        {
            return array();
        }

        $spec_cat_id_level = $options[$spec_cat_id]['level'];

        foreach ($options AS $key => $value)
        {
            if ($key != $spec_cat_id)
            {
                unset($options[$key]);
            }
            else
            {
                break;
            }
        }

        $spec_cat_id_array = array();
        foreach ($options AS $key => $value)
        {
            if (($spec_cat_id_level == $value['level'] && $value['cat_id'] != $spec_cat_id) ||
                ($spec_cat_id_level > $value['level']))
            {
                break;
            }
            else
            {
                $spec_cat_id_array[$key] = $value;
            }
        }
        $cat_options[$spec_cat_id] = $spec_cat_id_array;

        return $spec_cat_id_array;
    }
}


/**
 * 取商品的下拉框Select列表
 *
 * @param       int      $goods_id    商品id
 *
 * @return  array
 */
function get_good_products_select($goods_id)
{
    $return_array = array();
    $products = get_good_products($goods_id);

    if (empty($products))
    {
        return $return_array;
    }

    foreach ($products as $value)
    {
        $return_array[$value['product_id']] = $value['goods_attr_str'];
    }

    return $return_array;
}



/**
 * 取商品的货品列表
 *
 * @param       mixed       $goods_id       单个商品id；多个商品id数组；以逗号分隔商品id字符串
 * @param       string      $conditions     sql条件
 *
 * @return  array
 */
function get_good_products($goods_id, $conditions = '')
{
    $db_prefix=C("DB_PREFIX");
    if (empty($goods_id))
    {
        return array();
    }
    switch (gettype($goods_id))
    {
        case 'integer':

            $_goods_id = "goods_id = '" . intval($goods_id) . "'";

        break;

        case 'string':
        case 'array':

            $_goods_id = db_create_in($goods_id, 'goods_id');

        break;
    }
    /* 取货品 */
    $sql = "SELECT * FROM " .$db_prefix.'ec_products'. " WHERE $_goods_id $conditions";
    $result_products = M()->query($sql);
    
    /* 取商品属性 */
    $sql = "SELECT goods_attr_id, attr_value FROM " .$db_prefix.'ec_goods_attr'. " WHERE $_goods_id";
    $result_goods_attr = M()->query($sql);
    
    $_goods_attr = array();
    if(!empty($result_goods_attr)){
        foreach ($result_goods_attr as $value)
        {
            $_goods_attr[$value['goods_attr_id']] = $value['attr_value'];
        }
    }
    
    if(!empty($result_products)){
        foreach ($result_products as $key => $value)
        {
            $goods_attr_array = explode('|', $value['goods_attr']);
            if (is_array($goods_attr_array))
            {
                $goods_attr = array();
                foreach ($goods_attr_array as $_attr)
                {
                    $goods_attr[] = $_goods_attr[$_attr];
                }
    
                $goods_attr_str = implode('，', $goods_attr);
            }
    
            $result_products[$key]['goods_attr_str'] = $goods_attr_str;
        }
        
    }
    return $result_products;
    
}

/**
 * 验证输入的邮件地址是否合法
 *
 * @access  public
 * @param   string      $email      需要验证的邮件地址
 *
 * @return bool
 */
function is_email($user_email)
{
    $chars = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i";
    if (strpos($user_email, '@') !== false && strpos($user_email, '.') !== false)
    {
        if (preg_match($chars, $user_email))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        return false;
    }
}

/**
 * 初始化会员数据整合类
 *
 * @access  public
 * @return  object
 */
function &init_users()
{
    $set_modules = false;
    static $cls = null;
    if ($cls != null)
    {
        return $cls;
    }
   
    import('ZHPHP.Extend.Tool.integrates.Zhec',null,'.php');
    $integrate_config='';
    $cfg = unserialize($integrate_config);
    $cls = new Zhec($cfg);
    return $cls;
    
}






/**
 * 获得所有的友情链接
 *
 * @access  private
 * @return  array
 */
function index_get_links()
{
    $db_prefix=C("DB_PREFIX");
    $sql = 'SELECT 
                link_logo, 
                link_name, 
                link_url 
            FROM ' . $db_prefix.'friend_link' . 
            ' ORDER BY show_order';
    $res = M()->query($sql);

    $links['img'] = $links['txt'] = array();
    if(!empty($res)){
        foreach ($res AS $row)
        {
            if (!empty($row['link_logo']))
            {
                $links['img'][] = array('name' => $row['link_name'],
                                        'url'  => $row['link_url'],
                                        'logo' => $row['link_logo']);
            }
            else
            {
                $links['txt'][] = array('name' => $row['link_name'],
                                        'url'  => $row['link_url']);
            }
        }
    }
    

    return $links;
}








/**
 * 重新获得商品图片与商品相册的地址
 *
 * @param int $goods_id 商品ID
 * @param string $image 原商品相册图片地址
 * @param boolean $thumb 是否为缩略图
 * @param string $call 调用方法(商品图片还是商品相册)
 * @param boolean $del 是否删除图片
 *
 * @return string   $url
 */
function get_image_path($goods_id, $image='', $thumb=false, $call='goods', $del=false)
{
    $url = empty($image) ? C('NO_PICTURE') : $image;
    return $url;
}


/**
 * 获得指定文章分类下所有底层分类的ID
 *
 * @access  public
 * @param   integer     $cat        指定的分类ID
 *
 * @return void
 */
function get_article_children ($cat = 0)
{
    return db_create_in(array_unique(array_merge(array($cat), array_keys(article_cat_list($cat, 0, false)))), 'cat_id');
}


/**
 * 获得指定分类下的子分类的数组
 *
 * @access  public
 * @param   int     $cat_id     分类的ID
 * @param   int     $selected   当前选中分类的ID
 * @param   boolean $re_type    返回的类型: 值为真时返回下拉列表,否则返回数组
 * @param   int     $level      限定返回的级数。为0时返回所有级数
 * @return  mix
 */
function article_cat_list($cat_id = 0, $selected = 0, $re_type = true, $level = 0)
{
    static $res = NULL;
    //$db_prefix=C("DB_PREFIX");
    if ($res === NULL)
    {
        $data = cache('art_cat_pid_releate');
        //$data=NULL;
        //p($data);die;
        if ($data === NULL)
        {
            $sql = "SELECT 
                        c.*, 
                        COUNT(s.cat_id) AS has_children, 
                        COUNT(a.article_id) AS aricle_num ".
                    ' FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_article_cat') . " AS c".
                    " LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_article_cat') . " AS s ON s.parent_id=c.cat_id".
                    " LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_article'). " AS a ON a.cat_id=c.cat_id".
                    " GROUP BY c.cat_id ".
                    " ORDER BY parent_id, sort_order ASC"; 
            $res = M()->getAll($sql);
            cache("art_cat_pid_releate", $res);     
        }
        else
        {
            $res = $data;
        }
    }
    
    if (empty($res) == true)
    {
        return $re_type ? '' : array();
    }
    $options = article_cat_options($cat_id, $res); // 获得指定分类下的子分类的数组
    /* 截取到指定的缩减级别 */
    if ($level > 0)
    {
        if ($cat_id == 0)
        {
            $end_level = $level;
        }
        else
        {
            $first_item = reset($options); // 获取第一个元素
            $end_level  = $first_item['level'] + $level;
        }

        /* 保留level小于end_level的部分 */
        foreach ($options AS $key => $val)
        {
            if ($val['level'] >= $end_level)
            {
                unset($options[$key]);
            }
        }
    }

    $pre_key = 0;
    foreach ($options AS $key => $value)
    {
        $options[$key]['has_children'] = 1;
        if ($pre_key > 0)
        {
            if ($options[$pre_key]['cat_id'] == $options[$key]['parent_id'])
            {
                $options[$pre_key]['has_children'] = 1;
            }
        }
        $pre_key = $key;
    }

    if ($re_type == true)
    {
        $select = '';
        foreach ($options AS $var)
        {
            $select .= '<option value="' . $var['cat_id'] . '" ';
            $select .= ' cat_type="' . $var['cat_type'] . '" ';
            $select .= ($selected == $var['cat_id']) ? "selected='ture'" : '';
            $select .= '>';
            if ($var['level'] > 0)
            {
                $select .= str_repeat('&nbsp;', $var['level'] * 4);
            }
            $select .= htmlspecialchars(addslashes($var['cat_name'])) . '</option>';
        }

        return $select;
    }
    else
    {
        foreach ($options AS $key => $value)
        {
            $options[$key]['url'] = ec_build_uri('article_cat', array('acid' => $value['cat_id']), $value['cat_name']);
        }
        return $options;
    }
}

/**
 * 过滤和排序所有文章分类，返回一个带有缩进级别的数组
 *
 * @access  private
 * @param   int     $cat_id     上级分类ID
 * @param   array   $arr        含有所有分类的数组
 * @param   int     $level      级别
 * @return  void
 */
function article_cat_options($spec_cat_id, $arr)
{
    static $cat_options = array();

    if (isset($cat_options[$spec_cat_id]))
    {
        return $cat_options[$spec_cat_id];
    }

    if (!isset($cat_options[0]))
    {
        $level = $last_cat_id = 0;
        $options = $cat_id_array = $level_array = array();
        while (!empty($arr))
        {
            foreach ($arr AS $key => $value)
            {
                $cat_id = $value['cat_id'];
                if ($level == 0 && $last_cat_id == 0)
                {
                    if ($value['parent_id'] > 0)
                    {
                        break;
                    }

                    $options[$cat_id]          = $value;
                    $options[$cat_id]['level'] = $level;
                    $options[$cat_id]['id']    = $cat_id;
                    $options[$cat_id]['name']  = $value['cat_name'];
                    unset($arr[$key]);

                    if ($value['has_children'] == 0)
                    {
                        continue;
                    }
                    $last_cat_id  = $cat_id;
                    $cat_id_array = array($cat_id);
                    $level_array[$last_cat_id] = ++$level;
                    continue;
                }

                if ($value['parent_id'] == $last_cat_id)
                {
                    $options[$cat_id]          = $value;
                    $options[$cat_id]['level'] = $level;
                    $options[$cat_id]['id']    = $cat_id;
                    $options[$cat_id]['name']  = $value['cat_name'];
                    unset($arr[$key]);

                    if ($value['has_children'] > 0)
                    {
                        if (end($cat_id_array) != $last_cat_id)
                        {
                            $cat_id_array[] = $last_cat_id;
                        }
                        $last_cat_id    = $cat_id;
                        $cat_id_array[] = $cat_id;
                        $level_array[$last_cat_id] = ++$level;
                    }
                }
                elseif ($value['parent_id'] > $last_cat_id)
                {
                    break;
                }
            }

            $count = count($cat_id_array);
            if ($count > 1)
            {
                $last_cat_id = array_pop($cat_id_array);
            }
            elseif ($count == 1)
            {
                if ($last_cat_id != end($cat_id_array))
                {
                    $last_cat_id = end($cat_id_array);
                }
                else
                {
                    $level = 0;
                    $last_cat_id = 0;
                    $cat_id_array = array();
                    continue;
                }
            }

            if ($last_cat_id && isset($level_array[$last_cat_id]))
            {
                $level = $level_array[$last_cat_id];
            }
            else
            {
                $level = 0;
            }
        }
        $cat_options[0] = $options;
    }
    else
    {
        $options = $cat_options[0];
    }

    if (!$spec_cat_id)
    {
        return $options;
    }
    else
    {
        if (empty($options[$spec_cat_id]))
        {
            return array();
        }

        $spec_cat_id_level = $options[$spec_cat_id]['level'];

        foreach ($options AS $key => $value)
        {
            if ($key != $spec_cat_id)
            {
                unset($options[$key]);
            }
            else
            {
                break;
            }
        }

        $spec_cat_id_array = array();
        foreach ($options AS $key => $value)
        {
            if (($spec_cat_id_level == $value['level'] && $value['cat_id'] != $spec_cat_id) ||
                ($spec_cat_id_level > $value['level']))
            {
                break;
            }
            else
            {
                $spec_cat_id_array[$key] = $value;
            }
        }
        $cat_options[$spec_cat_id] = $spec_cat_id_array;

        return $spec_cat_id_array;
    }
}

/**
 * 格式化商品价格
 *
 * @access  public
 * @param   float   $price  商品价格
 * @return  string
 */
function price_format($price, $change_price = true)
{
    if($price==='')
    {
        $price=0;
    }
    if ($change_price)
    {
        switch (C('PRICE_FORMAT'))
        {
            case 0:
                $price = number_format($price, 2, '.', '');
                break;
            case 1: // 保留不为 0 的尾数
                $price = preg_replace('/(.*)(\\.)([0-9]*?)0+$/', '\1\2\3', number_format($price, 2, '.', ''));

                if (substr($price, -1) == '.')
                {
                    $price = substr($price, 0, -1);
                }
                break;
            case 2: // 不四舍五入，保留1位
                $price = substr(number_format($price, 2, '.', ''), 0, -1);
                break;
            case 3: // 直接取整
                $price = intval($price);
                break;
            case 4: // 四舍五入，保留 1 位
                $price = number_format($price, 1, '.', '');
                break;
            case 5: // 先四舍五入，不保留小数
                $price = round($price);
                break;
        }
    }else
    {
        $price = number_format($price, 2, '.', '');
    }
    return sprintf(C('EC_CURRENCY_FORMAT'), $price);
}

/**
 * 获得指定分类下所有底层分类的ID
 *
 * @access  public
 * @param   integer     $cat        指定的分类ID
 * @return  string
 */
function get_children($cat = 0)
{
    return 'g.cat_id ' . db_create_in(array_unique(array_merge(array($cat), array_keys(cat_list($cat, 0, false)))));
}

/**
 * 创建像这样的查询: "IN('a','b')";
 *
 * @access   public
 * @param    mix      $item_list      列表数组或字符串
 * @param    string   $field_name     字段名称
 *
 * @return   void
 */
function db_create_in($item_list, $field_name = '')
{
    if (empty($item_list))
    {
        return $field_name . " IN ('') ";
    }
    else
    {
        if (!is_array($item_list))
        {
            $item_list = explode(',', $item_list);
        }
        $item_list = array_unique($item_list);
        $item_list_tmp = '';
        foreach ($item_list AS $item)
        {
            if ($item !== '')
            {
                $item_list_tmp .= $item_list_tmp ? ",'$item'" : "'$item'";
            }
        }
        if (empty($item_list_tmp))
        {
            return $field_name . " IN ('') ";
        }
        else
        {
            return $field_name . ' IN (' . $item_list_tmp . ') ';
        }
    }
}

function default_value($currentValue,$defaultValue){
    return empty($currentValue)?$defaultValue:$currentValue;
}

/**
 * 重写 URL 地址
 *
 * @access  public
 * @param   string  $app        执行程序
 * @param   array   $params     参数数组
 * @param   string  $append     附加字串
 * @param   integer $page       页数
 * @param   string  $keywords   搜索关键词字符串
 * @return  void
 * ec_build_uri('category', array('cid'=> $cat_id), $cat['cat_name'])
 */
function ec_build_uri($app, $params, $append = '', $page = 0, $keywords = '', $size = 0)
{
    static $rewrite = NULL;

    if ($rewrite === NULL)
    {
        //rewrite功能之后制作
        $rewrite = false;
    }

    $args = array('cid'   => 0,
                  'gid'   => 0,
                  'bid'   => 0,
                  'acid'  => 0,
                  'aid'   => 0,
                  'sid'   => 0,
                  'gbid'  => 0,
                  'auid'  => 0,
                  'sort'  => '',
                  'order' => '',
                );

    extract(array_merge($args, $params));

    $uri = '';
    switch ($app)
    {
        case 'category':
            if (empty($cid))
            {
                return false;
            }
            else
            {
                if ($rewrite)
                {
                    $uri = 'category-' . $cid;
                    if (isset($bid))
                    {
                        $uri .= '-b' . $bid;
                    }
                    if (isset($price_min))
                    {
                        $uri .= '-min'.$price_min;
                    }
                    if (isset($price_max))
                    {
                        $uri .= '-max'.$price_max;
                    }
                    if (isset($filter_attr))
                    {
                        $uri .= '-attr' . $filter_attr;
                    }
                    if (!empty($page))
                    {
                        $uri .= '-' . $page;
                    }
                    if (!empty($sort))
                    {
                        $uri .= '-' . $sort;
                    }
                    if (!empty($order))
                    {
                        $uri .= '-' . $order;
                    }
                }
                else
                {
                    $uri = 'index.php?a=ec&c=EcCategory&m=index&id=' . $cid;
                    if (!empty($bid))
                    {
                        $uri .= '&amp;brand=' . $bid;
                    }
                    if (isset($price_min))
                    {
                        $uri .= '&amp;price_min=' . $price_min;
                    }
                    if (isset($price_max))
                    {
                        $uri .= '&amp;price_max=' . $price_max;
                    }
                    if (!empty($filter_attr))
                    {
                        $uri .='&amp;filter_attr=' . $filter_attr;
                    }

                    if (!empty($page))
                    {
                        $uri .= '&amp;page=' . $page;
                    }
                    if (!empty($sort))
                    {
                        $uri .= '&amp;sort=' . $sort;
                    }
                    if (!empty($order))
                    {
                        $uri .= '&amp;order=' . $order;
                    }
                }
            }

            break;
        case 'goods':
            if (empty($gid))
            {
                return false;
            }
            else
            {
                $uri = $rewrite ? 'goods-' . $gid : U('ec/EcGoods/index').'&id=' . $gid;
            }

            break;
        case 'brand':
            if (empty($bid))
            {
                return false;
            }
            else
            {
                if ($rewrite)
                {
                    $uri = 'brand-' . $bid;
                    if (isset($cid))
                    {
                        $uri .= '-c' . $cid;
                    }
                    if (!empty($page))
                    {
                        $uri .= '-' . $page;
                    }
                    if (!empty($sort))
                    {
                        $uri .= '-' . $sort;
                    }
                    if (!empty($order))
                    {
                        $uri .= '-' . $order;
                    }
                }
                else
                {
                    $uri = U('ec/EcBrand/index').'&id=' . $bid;
                    if (!empty($cid))
                    {
                        $uri .= '&amp;cat=' . $cid;
                    }
                    if (!empty($page))
                    {
                        $uri .= '&amp;page=' . $page;
                    }
                    if (!empty($sort))
                    {
                        $uri .= '&amp;sort=' . $sort;
                    }
                    if (!empty($order))
                    {
                        $uri .= '&amp;order=' . $order;
                    }
                }
            }

            break;
        case 'article_cat':
            if (empty($acid))
            {
                return false;
            }
            else
            {
                if ($rewrite)
                {
                    $uri = 'article_cat-' . $acid;
                    if (!empty($page))
                    {
                        $uri .= '-' . $page;
                    }
                    if (!empty($sort))
                    {
                        $uri .= '-' . $sort;
                    }
                    if (!empty($order))
                    {
                        $uri .= '-' . $order;
                    }
                    if (!empty($keywords))
                    {
                        $uri .= '-' . $keywords;
                    }
                }
                else
                {
                    $uri = 'index.php?a=ec&c=EcArticleCat&m=index&id=' . $acid;
                    if (!empty($page))
                    {
                        $uri .= '&amp;page=' . $page;
                    }
                    if (!empty($sort))
                    {
                        $uri .= '&amp;sort=' . $sort;
                    }
                    if (!empty($order))
                    {
                        $uri .= '&amp;order=' . $order;
                    }
                    if (!empty($keywords))
                    {
                        $uri .= '&amp;keywords=' . $keywords;
                    }
                }
            }

            break;
        case 'article':
            if (empty($aid))
            {
                return false;
            }
            else
            {
                $uri = $rewrite ? 'article-' . $aid : 'index.php?a=ec&c=EcArticle&m=index&id=' . $aid;
            }

            break;
        case 'group_buy':
            if (empty($gbid))
            {
                return false;
            }
            else
            {
                $uri = $rewrite ? 'group_buy-' . $gbid : 'index.php?a=ec&c=EcGroupBuy&m=index&act=view&amp;id=' . $gbid;
            }

            break;
        case 'auction':
            if (empty($auid))
            {
                return false;
            }
            else
            {
                $uri = $rewrite ? 'auction-' . $auid : 'index.php?a=ec&c=EcAuction&m=index&act=view&amp;id=' . $auid;
            }

            break;
        case 'snatch':
            if (empty($sid))
            {
                return false;
            }
            else
            {
                $uri = $rewrite ? 'snatch-' . $sid : 'index.php?a=ec&c=EcSnatch&m=index&id=' . $sid;
            }

            break;
        case 'search':
            break;
        case 'exchange':
            if ($rewrite)
            {
                $uri = 'exchange-' . $cid;
                if (isset($price_min))
                {
                    $uri .= '-min'.$price_min;
                }
                if (isset($price_max))
                {
                    $uri .= '-max'.$price_max;
                }
                if (!empty($page))
                {
                    $uri .= '-' . $page;
                }
                if (!empty($sort))
                {
                    $uri .= '-' . $sort;
                }
                if (!empty($order))
                {
                    $uri .= '-' . $order;
                }
            }
            else
            {
                $uri = 'exchange.php?cat_id=' . $cid;
                if (isset($price_min))
                {
                    $uri .= '&amp;integral_min=' . $price_min;
                }
                if (isset($price_max))
                {
                    $uri .= '&amp;integral_max=' . $price_max;
                }

                if (!empty($page))
                {
                    $uri .= '&amp;page=' . $page;
                }
                if (!empty($sort))
                {
                    $uri .= '&amp;sort=' . $sort;
                }
                if (!empty($order))
                {
                    $uri .= '&amp;order=' . $order;
                }
            }

            break;
        case 'exchange_goods':
            if (empty($gid))
            {
                return false;
            }
            else
            {
                $uri = $rewrite ? 'exchange-id' . $gid : 'index.php?a=ec&c=EcExchange&m=index&id=' . $gid . '&amp;act=view';
            }

            break;
        default:
            return false;
            break;
    }

    if ($rewrite)
    {
        if ($rewrite == 2 && !empty($append))
        {
            $uri .= '-' . urlencode(preg_replace('/[\.|\/|\?|&|\+|\\\|\'|"|,]+/', '', $append));
        }

        $uri .= '.html';
    }
    if (($rewrite == 2) && (strpos(strtolower(EC_CHARSET), 'utf') !== 0))
    {
        $uri = urlencode($uri);
    }
    return $uri;
}