<?php

/**
 * 取得商品信息
 * @param   int     $goods_id   商品id
 * @return  array
 */
function goods_info($goods_id)
{
    $sql = "SELECT g.*, b.brand_name " .
            "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g " .
                "LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_brand') . " AS b ON g.brand_id = b.brand_id " .
            "WHERE g.goods_id = '$goods_id'";
    $row = M()->getRowSql($sql);
    if (!empty($row))
    {
        /* 修正重量显示 */
        $row['goods_weight'] = (intval($row['goods_weight']) > 0) ?
            $row['goods_weight'] . '千克' :
            ($row['goods_weight'] * 1000) .'克';

        /* 修正图片 */
        $row['goods_img'] = get_image_path($goods_id, $row['goods_img']);
    }

    return $row;
}



/**
 * 获得购买过该商品的人还买过的商品
 *
 * @access  public
 * @param   integer     $goods_id
 * @return  array
 */
function get_also_bought($goods_id)
{
    $sql = 'SELECT COUNT(b.goods_id ) AS num, g.goods_id, g.goods_name, g.goods_thumb, g.goods_img, g.shop_price, g.promote_price, g.promote_start_date, g.promote_end_date ' .
            'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_order_goods') . ' AS a ' .
            'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_order_goods') . ' AS b ON b.order_id = a.order_id ' .
            'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . ' AS g ON g.goods_id = b.goods_id ' .
            "WHERE a.goods_id = '$goods_id' AND b.goods_id <> '$goods_id' AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 " .
            'GROUP BY b.goods_id ' .
            'ORDER BY num DESC ' .
            'LIMIT ' . C('ec_bought_goods');
    $res = M()->query($sql);

    $key = 0;
    $arr = array();
    if(!empty($res))
    {
        $ec_goods_name_length=C('ec_goods_name_length');
        foreach($res as $row)
        {
            $arr[$key]['goods_id']    = $row['goods_id'];
            $arr[$key]['goods_name']  = $row['goods_name'];
            $arr[$key]['short_name']  = $ec_goods_name_length > 0 ?
                sub_str($row['goods_name'], $ec_goods_name_length) : $row['goods_name'];
            $arr[$key]['goods_thumb'] = get_image_path($row['goods_id'], $row['goods_thumb'], true);
            $arr[$key]['goods_img']   = get_image_path($row['goods_id'], $row['goods_img']);
            $arr[$key]['shop_price']  = price_format($row['shop_price']);
            $arr[$key]['url']         = ec_build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']);
    
            if ($row['promote_price'] > 0)
            {
                $arr[$key]['promote_price'] = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
                $arr[$key]['formated_promote_price'] = price_format($arr[$key]['promote_price']);
            }
            else
            {
                $arr[$key]['promote_price'] = 0;
            }
    
            $key++;
        }
    }

    return $arr;
}

/**
 * 获得属性相同的商品
 *
 * @access  public
 * @param   array   $attr   // 包含了属性名称,ID的数组
 * @return  array
 */
function get_same_attribute_goods($attr)
{
    $lnk = array();
    if (!empty($attr))
    {
        foreach ($attr['lnk'] AS $key => $val)
        {
            $lnk[$key]['title'] = sprintf('相同%s的商品', $val['name'], $val['value']);
            /* 查找符合条件的商品 */
            $sql = 'SELECT g.goods_id, g.goods_name, g.goods_thumb, g.goods_img, g.shop_price AS org_price, ' .
                        "IFNULL(mp.user_price, g.shop_price * '$_SESSION[ec_discount]') AS shop_price, ".
                        'g.market_price, g.promote_price, g.promote_start_date, g.promote_end_date ' .
                    'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . ' AS g ' .
                    'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods_attr') . ' as a ON g.goods_id = a.goods_id ' .
                    "LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . " AS mp ".
                        "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[ec_user_rank]' ".
                    "WHERE a.attr_id = '$key' AND g.is_on_sale=1 AND a.attr_value = '$val[value]' AND g.goods_id <> '$_REQUEST[id]' " .
                    'LIMIT ' . C('ec_attr_related_number');
            $res = M()->getAll($sql);
            if(!empty($res))
            {
                $ec_goods_name_length=C('ec_goods_name_length');
                foreach ($res AS $row)
                {
                    $lnk[$key]['goods'][$row['goods_id']]['goods_id']      = $row['goods_id'];
                    $lnk[$key]['goods'][$row['goods_id']]['goods_name']    = $row['goods_name'];
                    $lnk[$key]['goods'][$row['goods_id']]['short_name']    = $ec_goods_name_length > 0 ?
                        sub_str($row['goods_name'], $ec_goods_name_length) : $row['goods_name'];
                    $lnk[$key]['goods'][$row['goods_id']]['goods_thumb']     = (empty($row['goods_thumb'])) ? C('NO_PICTURE') : $row['goods_thumb'];
                    $lnk[$key]['goods'][$row['goods_id']]['market_price']  = price_format($row['market_price']);
                    $lnk[$key]['goods'][$row['goods_id']]['shop_price']    = price_format($row['shop_price']);
                    $lnk[$key]['goods'][$row['goods_id']]['promote_price'] = bargain_price($row['promote_price'],
                        $row['promote_start_date'], $row['promote_end_date']);
                    $lnk[$key]['goods'][$row['goods_id']]['url']           = ec_build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
                }
            }
        }
    }
    return $lnk;
}

/**
 * 获得指定分类下的推荐商品
 *
 * @access  public
 * @param   string      $type       推荐类型，可以是 best, new, hot, promote
 * @param   string      $cats       分类的ID
 * @param   integer     $brand      品牌的ID
 * @param   integer     $min        商品价格下限
 * @param   integer     $max        商品价格上限
 * @param   string      $ext        商品扩展查询
 * @return  array
 */
function get_category_recommend_goods($type = '', $cats = '', $brand = 0, $min =0,  $max = 0, $ext='')
{
    $brand_where = ($brand > 0) ? " AND g.brand_id = '$brand'" : '';

    $price_where = ($min > 0) ? " AND g.shop_price >= $min " : '';
    $price_where .= ($max > 0) ? " AND g.shop_price <= $max " : '';
    
    $sql =  'SELECT g.goods_id, g.goods_name, g.goods_name_style, g.market_price, g.shop_price AS org_price, g.promote_price, ' .
                "IFNULL(mp.user_price, g.shop_price * '$_SESSION[ec_discount]') AS shop_price, ".
                'promote_start_date, promote_end_date, g.goods_brief, g.goods_thumb, goods_img, b.brand_name ' .
            'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . ' AS g ' .
            'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_brand') . ' AS b ON b.brand_id = g.brand_id ' .
            "LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . " AS mp ".
                    "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[ec_user_rank]' ".
            'WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ' . $brand_where . $price_where . $ext;
    $num = 0;
    $type2lib = array('best'=>'recommend_best', 'new'=>'recommend_new', 'hot'=>'recommend_hot', 'promote'=>'recommend_promotion');
    
    $num = get_library_number($type2lib[$type]);
    
    switch ($type)
    {
        case 'best':
            $sql .= ' AND is_best = 1';
            break;
        case 'new':
            $sql .= ' AND is_new = 1';
            break;
        case 'hot':
            $sql .= ' AND is_hot = 1';
            break;
        case 'promote':
            $time = gmtime();
            $sql .= " AND is_promote = 1 AND promote_start_date <= '$time' AND promote_end_date >= '$time'";
            break;
    }
    if (!empty($cats))
    {
        $sql .= " AND (" . $cats . " OR " . get_extension_goods($cats) .")";
    }
    $order_type = C('ec_recommend_order');
    $sql .= ($order_type == 0) ? ' ORDER BY g.sort_order, g.last_update DESC' : ' ORDER BY RAND()';
    $res = M()->selectLimit($sql, $num);
    
    $idx = 0;
    $goods = array();
    if(!empty($res))
    {
        $ec_goods_name_length=C('ec_goods_name_length');
        foreach($res as $row)
        {
            if ($row['promote_price'] > 0)
            {
                $promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
                $goods[$idx]['promote_price'] = $promote_price > 0 ? price_format($promote_price) : '';
            }
            else
            {
                $goods[$idx]['promote_price'] = '';
            }
    
            $goods[$idx]['id']           = $row['goods_id'];
            $goods[$idx]['name']         = $row['goods_name'];
            $goods[$idx]['brief']        = $row['goods_brief'];
            $goods[$idx]['brand_name']   = $row['brand_name'];
            $goods[$idx]['short_name']   = $ec_goods_name_length > 0 ?
                                           sub_str($row['goods_name'], $ec_goods_name_length) : $row['goods_name'];
            $goods[$idx]['market_price'] = price_format($row['market_price']);
            $goods[$idx]['shop_price']   = price_format($row['shop_price']);
            $goods[$idx]['thumb']        = get_image_path($row['goods_id'], $row['goods_thumb'], true);
            $goods[$idx]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
            $goods[$idx]['url']          = ec_build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
    
            $goods[$idx]['short_style_name'] = add_style($goods[$idx]['short_name'], $row['goods_name_style']);
            $idx++;
        }
    }
    //p($goods);die;
    return $goods;
}

/**
 * 获得指定的规格的价格
 *
 * @access  public
 * @param   mix     $spec   规格ID的数组或者逗号分隔的字符串
 * @return  void
 */
function spec_price($spec)
{
    if (!empty($spec))
    {
        if(is_array($spec))
        {
            foreach($spec as $key=>$val)
            {
                $spec[$key]=addslashes($val);
            }
        }
        else
        {
            $spec=addslashes($spec);
        }

        $where = db_create_in($spec, 'goods_attr_id');

        $sql = 'SELECT SUM(attr_price) AS attr_price FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods_attr') . " WHERE $where";
        $price = floatval(M()->getOne($sql,'attr_price'));
    }
    else
    {
        $price = 0;
    }

    return $price;
}


/**
 * 获得商品的属性和规格
 *
 * @access  public
 * @param   integer $goods_id
 * @return  array
 */
function get_goods_properties($goods_id)
{
    /* 对属性进行重新排序和分组 */
    $sql = "SELECT attr_group ".
            "FROM " . 
                    $GLOBALS['ec_globals']['ecs']->table('ec_goods_type') . " AS gt, " . 
                    $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g ".
            "WHERE g.goods_id='$goods_id' AND gt.cat_id=g.goods_type";
    $grp = M()->getOne($sql,'attr_group');

    if (!empty($grp))
    {
        $groups = explode("\n", strtr($grp, "\r", ''));
    }
    /* 获得商品的规格 */
    $sql = "SELECT a.attr_id, a.attr_name, a.attr_group, a.is_linked, a.attr_type, ".
                "g.goods_attr_id, g.attr_value, g.attr_price " .
            'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods_attr') . ' AS g ' .
                    'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_attribute') . ' AS a ON a.attr_id = g.attr_id ' .
            "WHERE g.goods_id = '$goods_id' " .
            'ORDER BY a.sort_order, g.attr_price, g.goods_attr_id';
    $res = M()->getAll($sql);
    
    $arr['pro'] = array();     // 属性
    $arr['spe'] = array();     // 规格
    $arr['lnk'] = array();     // 关联的属性
    
    if(!empty($res))
    {
        foreach($res as $row)
        {
            $row['attr_value'] = str_replace("\n", '<br />', $row['attr_value']);

            if ($row['attr_type'] == 0)
            {
                $group = (isset($groups[$row['attr_group']])) ? $groups[$row['attr_group']] : '宝贝属性';
    
                $arr['pro'][$group][$row['attr_id']]['name']  = $row['attr_name'];
                $arr['pro'][$group][$row['attr_id']]['value'] = $row['attr_value'];
            }
            else
            {
                $arr['spe'][$row['attr_id']]['attr_type'] = $row['attr_type'];
                $arr['spe'][$row['attr_id']]['name']     = $row['attr_name'];
                $arr['spe'][$row['attr_id']]['values'][] = array(
                                                            'label'        => $row['attr_value'],
                                                            'price'        => $row['attr_price'],
                                                            'format_price' => price_format(abs($row['attr_price']), false),
                                                            'id'           => $row['goods_attr_id']);
            }
    
            if ($row['is_linked'] == 1)
            {
                /* 如果该属性需要关联，先保存下来 */
                $arr['lnk'][$row['attr_id']]['name']  = $row['attr_name'];
                $arr['lnk'][$row['attr_id']]['value'] = $row['attr_value'];
            }
        }
    }
    //p($arr);die;
    return $arr;
    
}

/**
 * 获得指定商品的相册
 *
 * @access  public
 * @param   integer     $goods_id
 * @return  array
 */
function get_goods_gallery($goods_id)
{
    $sql = 'SELECT img_id, img_url, thumb_url, img_desc' .
        ' FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods_gallery') .
        " WHERE goods_id = '$goods_id' LIMIT " . C('ec_goods_gallery_number').'';
    $row = M()->getAll($sql);
    if(!empty($row))
    {
      /* 格式化相册图片路径 */
        foreach($row as $key => $gallery_img)
        {
            $row[$key]['img_url'] = get_image_path($goods_id, $gallery_img['img_url'], false, 'gallery');
            $row[$key]['thumb_url'] = get_image_path($goods_id, $gallery_img['thumb_url'], true, 'gallery');
        }  
    }
    //p($row);die;
    return $row;
}


/**
 * 获得商品的详细信息
 *
 * @access  public
 * @param   integer     $goods_id
 * @return  void
 */
function get_goods_info($goods_id)
{
    $time = gmtime();
    $sql = 'SELECT g.*, c.measure_unit, b.brand_id, b.brand_name AS goods_brand, m.type_money AS bonus_money, ' .
                'IFNULL(AVG(r.comment_rank), 0) AS comment_rank, ' .
                "IFNULL(mp.user_price, g.shop_price * '$_SESSION[ec_discount]') AS rank_price " .
            'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . ' AS g ' .
                    'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_category') . ' AS c ON g.cat_id = c.cat_id ' .
                    'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_brand') . ' AS b ON g.brand_id = b.brand_id ' .
                    'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_comment') . ' AS r '.
                        'ON r.id_value = g.goods_id AND comment_type = 0 AND r.parent_id = 0 AND r.status = 1 ' .
                    'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_bonus_type') . ' AS m ' .
                        "ON g.bonus_type_id = m.type_id AND m.send_start_date <= '$time' AND m.send_end_date >= '$time'" .
                    " LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . " AS mp ".
                            "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[ec_user_rank]' ".
            "WHERE g.goods_id = '$goods_id' AND g.is_delete = 0 " .
            "GROUP BY g.goods_id";
    $row =M()->getRowSql($sql);
    
    if ($row !== false)
    {
        /* 用户评论级别取整 */
        $row['comment_rank']  = ceil($row['comment_rank']) == 0 ? 5 : ceil($row['comment_rank']);
        
        /* 获得商品的销售价格 */
        $row['market_price']        = price_format($row['market_price']);
        $row['shop_price_formated'] = price_format($row['shop_price']);

        /* 修正促销价格 */
        if ($row['promote_price'] > 0)
        {
            $promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
        }
        else
        {
            $promote_price = 0;
        }

        /* 处理商品水印图片 */
        $watermark_img = '';

        if ($promote_price != 0)
        {
            $watermark_img = "watermark_promote";
        }
        elseif ($row['is_new'] != 0)
        {
            $watermark_img = "watermark_new";
        }
        elseif ($row['is_best'] != 0)
        {
            $watermark_img = "watermark_best";
        }
        elseif ($row['is_hot'] != 0)
        {
            $watermark_img = 'watermark_hot';
        }

        if ($watermark_img != '')
        {
            $row['watermark_img'] =  $watermark_img;
        }

        $row['promote_price_org'] =  $promote_price;
        $row['promote_price'] =  price_format($promote_price);

        /* 修正重量显示 */
        $row['goods_weight']  = (intval($row['goods_weight']) > 0) ?
            $row['goods_weight'] . '千克' :
            ($row['goods_weight'] * 1000) . '克';

        /* 修正上架时间显示 */
        $row['add_time']      = local_date(C('ec_date_format'), $row['add_time']);

        /* 促销时间倒计时 */
        $time = gmtime();
        if ($time >= $row['promote_start_date'] && $time <= $row['promote_end_date'])
        {
             $row['gmt_end_time']  = $row['promote_end_date'];
        }
        else
        {
            $row['gmt_end_time'] = 0;
        }
        
        $ec_use_storage=C('ec_use_storage');
        $ec_integral_scale=C('ec_integral_scale');
        /* 是否显示商品库存数量 */
        $row['goods_number']  = ($ec_use_storage == 1) ? $row['goods_number'] : '';

        /* 修正积分：转换为可使用多少积分（原来是可以使用多少钱的积分） */
        $row['integral']      = $ec_integral_scale ? round($row['integral'] * 100 / $ec_integral_scale) : 0;

        /* 修正优惠券 */
        $row['bonus_money']   = ($row['bonus_money'] == 0) ? 0 : price_format($row['bonus_money'], false);

        /* 修正商品图片 */
        $row['goods_img']   = get_image_path($goods_id, $row['goods_img']);
        $row['goods_thumb'] = get_image_path($goods_id, $row['goods_thumb'], true);

        return $row;
    }
    else
    {
        return false;
    }
}


/**
 * 获得购物车中商品的配件
 *
 * @access  public
 * @param   array     $goods_list
 * @return  array
 */
function get_goods_fittings($goods_list = array())
{
    $temp_index = 0;
    $arr        = array();

    $sql = 'SELECT gg.parent_id, ggg.goods_name AS parent_name, gg.goods_id, gg.goods_price, g.goods_name, g.goods_thumb, g.goods_img, g.shop_price AS org_price, ' .
                "IFNULL(mp.user_price, g.shop_price * '$_SESSION[ec_discount]') AS shop_price ".
            'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_group_goods') . ' AS gg ' .
            'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . 'AS g ON g.goods_id = gg.goods_id ' .
            "LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . " AS mp ".
                    "ON mp.goods_id = gg.goods_id AND mp.user_rank = '$_SESSION[ec_user_rank]' ".
            "LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS ggg ON ggg.goods_id = gg.parent_id ".
            "WHERE gg.parent_id " . db_create_in($goods_list) . " AND g.is_delete = 0 AND g.is_on_sale = 1 ".
            "ORDER BY gg.parent_id, gg.goods_id";

    $res = M()->query($sql);
    //p($sql);die;
    if(!empty($res))
    {
        $ec_goods_name_length=C('ec_goods_name_length');
        foreach($res as $row)
        {
            $arr[$temp_index]['parent_id']         = $row['parent_id'];//配件的基本件ID
            $arr[$temp_index]['parent_name']       = $row['parent_name'];//配件的基本件的名称
            $arr[$temp_index]['parent_short_name'] = $ec_goods_name_length > 0 ?
                sub_str($row['parent_name'], $ec_goods_name_length) : $row['parent_name'];//配件的基本件显示的名称
            $arr[$temp_index]['goods_id']          = $row['goods_id'];//配件的商品ID
            $arr[$temp_index]['goods_name']        = $row['goods_name'];//配件的名称
            $arr[$temp_index]['short_name']        = $ec_goods_name_length > 0 ?
                sub_str($row['goods_name'], $ec_goods_name_length) : $row['goods_name'];//配件显示的名称
            $arr[$temp_index]['fittings_price']    = price_format($row['goods_price']);//配件价格
            $arr[$temp_index]['shop_price']        = price_format($row['shop_price']);//配件原价格
            $arr[$temp_index]['goods_thumb']       = get_image_path($row['goods_id'], $row['goods_thumb'], true);
            $arr[$temp_index]['goods_img']         = get_image_path($row['goods_id'], $row['goods_img']);
            $arr[$temp_index]['url']               = ec_build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']);
            $temp_index ++;
        }
    }

    return $arr;
}


/**
 * 调用当前分类的销售排行榜
 *
 * @access  public
 * @param   string  $cats   查询的分类
 * @return  array
 */
function get_top10($cats = '')
{
    $cats = get_children($cats);
    $where = !empty($cats) ? "AND ($cats OR " . get_extension_goods($cats) . ") " : '';
    
    $ec_top10_time=C('ec_top10_time');
    /* 排行统计的时间 */
    switch ($ec_top10_time)
    {
        case 1: // 一年
            $top10_time = "AND o.order_sn >= '" . date('Ymd', gmtime() - 365 * 86400) . "'";
        break;
        case 2: // 半年
            $top10_time = "AND o.order_sn >= '" . date('Ymd', gmtime() - 180 * 86400) . "'";
        break;
        case 3: // 三个月
            $top10_time = "AND o.order_sn >= '" . date('Ymd', gmtime() - 90 * 86400) . "'";
        break;
        case 4: // 一个月
            $top10_time = "AND o.order_sn >= '" . date('Ymd', gmtime() - 30 * 86400) . "'";
        break;
        default:
            $top10_time = '';
    }
    $sql = 'SELECT g.goods_id, g.goods_name, g.shop_price, g.goods_thumb, SUM(og.goods_number) as goods_number ' .
           'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . ' AS g, ' .
                $GLOBALS['ec_globals']['ecs']->table('ec_order_info') . ' AS o, ' .
                $GLOBALS['ec_globals']['ecs']->table('ec_order_goods') . ' AS og ' .
           "WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 $where $top10_time " ;
    $ec_use_storage=C('ec_use_storage');
    //判断是否启用库存，库存数量是否大于0
    if ($ec_use_storage == 1)
    {
        $sql .= " AND g.goods_number > 0 ";
    }

    $sql .= ' AND og.order_id = o.order_id AND og.goods_id = g.goods_id ' .
           "AND (o.order_status = '" . OS_CONFIRMED .  "' OR o.order_status = '" . OS_SPLITED . "') " .
           "AND (o.pay_status = '" . PS_PAYED . "' OR o.pay_status = '" . PS_PAYING . "') " .
           "AND (o.shipping_status = '" . SS_SHIPPED . "' OR o.shipping_status = '" . SS_RECEIVED . "') " .
           'GROUP BY g.goods_id ORDER BY goods_number DESC, g.goods_id DESC LIMIT ' . C('ec_top_number');
    
    $arr = M()->getAll($sql);
    if(!empty($arr))
    {
        $ec_goods_name_length=C('ec_goods_name_length');
        for ($i = 0, $count = count($arr); $i < $count; $i++)
        {
            $arr[$i]['short_name'] = $ec_goods_name_length > 0 ?
                                        sub_str($arr[$i]['goods_name'], $ec_goods_name_length) : $arr[$i]['goods_name'];
            $arr[$i]['url']        = ec_build_uri('goods', array('gid' => $arr[$i]['goods_id']), $arr[$i]['goods_name']);
            $arr[$i]['thumb'] = get_image_path($arr[$i]['goods_id'], $arr[$i]['goods_thumb'],true);
            $arr[$i]['price'] = price_format($arr[$i]['shop_price']);
        }
    }
    return $arr;
}

/**
 * 取得商品属性
 * @param   int     $goods_id   商品id
 * @return  array
 */
function get_goods_attr($goods_id)
{
    $attr_list = array();
    $sql = "SELECT a.attr_id, a.attr_name " .
            "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g, " . $GLOBALS['ec_globals']['ecs']->table('ec_attribute') . " AS a " .
            "WHERE g.goods_id = '$goods_id' " .
            "AND g.goods_type = a.cat_id " .
            "AND a.attr_type = 1";
    $attr_id_list = M()->getCol($sql,'attr_id');
    $res = M()->query($sql);
    if(!empty($res))
    {
        foreach($res as $attr)
        {
            if (defined('IN_ADMIN'))
            {
                $attr['goods_attr_list'] = array(0 => '请选择...');
            }
            else
            {
                $attr['goods_attr_list'] = array();
            }
            $attr_list[$attr['attr_id']] = $attr;
        }
    }
    $sql = "SELECT attr_id, goods_attr_id, attr_value " .
            "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_attr') .
            " WHERE goods_id = '$goods_id' " .
            "AND attr_id " . db_create_in($attr_id_list);
    $res = M()->query($sql);
    if(!empty($res))
    {
        foreach($res as $goods_attr)
        {
            $attr_list[$goods_attr['attr_id']]['goods_attr_list'][$goods_attr['goods_attr_id']] = $goods_attr['attr_value'];
        }
    }
    return $attr_list;
}

/**
 * 批发信息
 * @param   int     $act_id     活动id
 * @return  array
 */
function wholesale_info($act_id)
{
    $sql = "SELECT * FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_wholesale') .
            " WHERE act_id = '$act_id'";
    $row = M()->getRowSql($sql);
    if (!empty($row))
    {
        $row['price_list'] = unserialize($row['prices']);
    }

    return $row;
}


/**
 * 取得优惠活动信息
 * @param   int     $act_id     活动id
 * @return  array
 */
function favourable_info($act_id)
{
    $sql = "SELECT * FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_favourable_activity') .
            " WHERE act_id = '$act_id'";
    $row = M()->getRowSql($sql);
    if (!empty($row))
    {
        $row['start_time'] = local_date(C('ec_time_format'), $row['start_time']);
        $row['end_time'] = local_date(C('ec_time_format'), $row['end_time']);
        $row['formated_min_amount'] = price_format($row['min_amount']);
        $row['formated_max_amount'] = price_format($row['max_amount']);
        $row['gift'] = unserialize($row['gift']);
        if ($row['act_type'] == FAT_GOODS)
        {
            $row['act_type_ext'] = round($row['act_type_ext']);
        }
    }

    return $row;
}


/**
 * 取得拍卖活动出价记录
 * @param   int     $act_id     活动id
 * @return  array
 */
function auction_log($act_id)
{
    $log = array();
    $sql = "SELECT a.*, u.user_name " .
            "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_auction_log') . " AS a," .
                      $GLOBALS['ec_globals']['ecs']->table('ec_users') . " AS u " .
            "WHERE a.bid_user = u.user_id " .
            "AND act_id = '$act_id' " .
            "ORDER BY a.log_id DESC";
    $res = M()->query($sql);
    //p($res);die;
    if(!empty($res))
    {
        foreach($res as $row)
        {
            $row['bid_time'] = local_date(C('ec_time_format'), $row['bid_time']);
            $row['formated_bid_price'] = price_format($row['bid_price'], false);
            $log[] = $row;
        }
    }
    return $log;
}

/**
 * 取得拍卖活动信息
 * @param   int     $act_id     活动id
 * @return  array
 */
function auction_info($act_id, $config = false)
{
    $sql = "SELECT * FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') . " WHERE act_id = '$act_id'";
    $auction = M()->getRowSql($sql);
    
    if ($auction['act_type'] != GAT_AUCTION)
    {
        return array();
    }
    
    $auction['status_no'] = auction_status($auction);
    
    if ($config == true)
    {

        $auction['start_time'] = local_date('Y-m-d H:i', $auction['start_time']);
        $auction['end_time'] = local_date('Y-m-d H:i', $auction['end_time']);
    }
    else
    {
        $auction['start_time'] = local_date(C('ec_time_format'), $auction['start_time']);
        $auction['end_time'] = local_date(C('ec_time_format'), $auction['end_time']);
    }
    $ext_info = unserialize($auction['ext_info']);
    $auction = array_merge($auction, $ext_info);
    $auction['formated_start_price'] = price_format($auction['start_price']);
    $auction['formated_end_price'] = price_format($auction['end_price']);
    $auction['formated_amplitude'] = price_format($auction['amplitude']);
    $auction['formated_deposit'] = price_format($auction['deposit']);
    
    /* 查询出价用户数和最后出价 */
    $sql = "SELECT COUNT(DISTINCT bid_user)  FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_auction_log') .
            " WHERE act_id = '$act_id'";
    $auction['bid_user_count'] = M()->getOne($sql,'COUNT(DISTINCT bid_user)');
    if ($auction['bid_user_count'] > 0)
    {
        $sql = "SELECT a.*, u.user_name " .
                "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_auction_log') . " AS a, " .
                        $GLOBALS['ec_globals']['ecs']->table('ec_users') . " AS u " .
                "WHERE a.bid_user = u.user_id " .
                "AND act_id = '$act_id' " .
                "ORDER BY a.log_id DESC";
        $row = M()->getRowSql($sql);
        $row['formated_bid_price'] = price_format($row['bid_price'], false);
        $row['bid_time'] = local_date(C('ec_time_format'), $row['bid_time']);
        $auction['last_bid'] = $row;
    }
    /* 查询已确认订单数 */
    if ($auction['status_no'] > 1)
    {
        $sql = "SELECT COUNT(*)" .
                " FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_order_info') .
                " WHERE extension_code = 'auction'" .
                " AND extension_id = '$act_id'" .
                " AND order_status " . db_create_in(array(OS_CONFIRMED, OS_UNCONFIRMED));
        $auction['order_count'] = M()->getOne($sql,'COUNT(*)');
    }
    else
    {
        $auction['order_count'] = 0;
    }
    /* 当前价 */
    $auction['current_price'] = isset($auction['last_bid']) ? $auction['last_bid']['bid_price'] : $auction['start_price'];
    $auction['formated_current_price'] = price_format($auction['current_price'], false);
//p($auction);die;
    return $auction;
    
}

/**
 * 计算拍卖活动状态（注意参数一定是原始信息）
 * @param   array   $auction    拍卖活动原始信息
 * @return  int
 */
function auction_status($auction)
{
    $now = gmtime();
    if ($auction['is_finished'] == 0)
    {
        if ($now < $auction['start_time'])
        {
            return PRE_START; // 未开始
        }
        elseif ($now > $auction['end_time'])
        {
            return FINISHED; // 已结束，未处理
        }
        else
        {
            return UNDER_WAY; // 进行中
        }
    }
    elseif ($auction['is_finished'] == 1)
    {
        return FINISHED; // 已结束，未处理
    }
    else
    {
        return SETTLED; // 已结束，已处理
    }
}

/**
 * 取得团购活动信息
 * @param   int     $group_buy_id   团购活动id
 * @param   int     $current_num    本次购买数量（计算当前价时要加上的数量）
 * @return  array
 *                  status          状态：
 */
function group_buy_info($group_buy_id, $current_num = 0)
{
    $_LANG['gbs'][GBS_PRE_START] = '未开始';
    $_LANG['gbs'][GBS_UNDER_WAY] = '进行中';
    $_LANG['gbs'][GBS_FINISHED] = '结束未处理';
    $_LANG['gbs'][GBS_SUCCEED] = '成功结束';
    $_LANG['gbs'][GBS_FAIL] = '失败结束';
        
    /* 取得团购活动信息 */
    $group_buy_id = intval($group_buy_id);
    $sql = "SELECT *, act_id AS group_buy_id, act_desc AS group_buy_desc, start_time AS start_date, end_time AS end_date " .
            "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') .
            "WHERE act_id = '$group_buy_id' " .
            "AND act_type = '" . GAT_GROUP_BUY . "'";
    $group_buy = M()->getRowSql($sql);
    
    /* 如果为空，返回空数组 */
    if (empty($group_buy))
    {
        return array();
    }
    
    $ext_info = unserialize($group_buy['ext_info']);
    $group_buy = array_merge($group_buy, $ext_info);

    /* 格式化时间 */
    $group_buy['formated_start_date'] = local_date('Y-m-d H:i', $group_buy['start_time']);
    $group_buy['formated_end_date'] = local_date('Y-m-d H:i', $group_buy['end_time']);
    
    /* 格式化保证金 */
    $group_buy['formated_deposit'] = price_format($group_buy['deposit'], false);

    /* 处理价格阶梯 */
    $price_ladder = $group_buy['price_ladder'];
    if (!is_array($price_ladder) || empty($price_ladder))
    {
        $price_ladder = array(array('amount' => 0, 'price' => 0));
    }
    else
    {
        foreach ($price_ladder as $key => $amount_price)
        {
            $price_ladder[$key]['formated_price'] = price_format($amount_price['price'], false);
        }
    }
    $group_buy['price_ladder'] = $price_ladder;
    
    /* 统计信息 */
    $stat = group_buy_stat($group_buy_id, $group_buy['deposit']);
    $group_buy = array_merge($group_buy, $stat);

    /* 计算当前价 */
    $cur_price  = $price_ladder[0]['price']; // 初始化
    $cur_amount = $stat['valid_goods'] + $current_num; // 当前数量
    foreach ($price_ladder as $amount_price)
    {
        if ($cur_amount >= $amount_price['amount'])
        {
            $cur_price = $amount_price['price'];
        }
        else
        {
            break;
        }
    }
    $group_buy['cur_price'] = $cur_price;
    $group_buy['formated_cur_price'] = price_format($cur_price, false);

    /* 最终价 */
    $group_buy['trans_price'] = $group_buy['cur_price'];
    $group_buy['formated_trans_price'] = $group_buy['formated_cur_price'];
    $group_buy['trans_amount'] = $group_buy['valid_goods'];
    
    /* 状态 */
    $group_buy['status'] = group_buy_status($group_buy);
    if (isset($_LANG['gbs'][$group_buy['status']]))
    {
        $group_buy['status_desc'] = $_LANG['gbs'][$group_buy['status']];
    }

    $group_buy['start_time'] = $group_buy['formated_start_date'];
    $group_buy['end_time'] = $group_buy['formated_end_date'];

    return $group_buy;
}


/**
 * 获得团购的状态
 *
 * @access  public
 * @param   array
 * @return  integer
 */
function group_buy_status($group_buy)
{
    $now = gmtime();
    if ($group_buy['is_finished'] == 0)
    {
        /* 未处理 */
        if ($now < $group_buy['start_time'])
        {
            $status = GBS_PRE_START;
        }
        elseif ($now > $group_buy['end_time'])
        {
            $status = GBS_FINISHED;
        }
        else
        {
            if ($group_buy['restrict_amount'] == 0 || $group_buy['valid_goods'] < $group_buy['restrict_amount'])
            {
                $status = GBS_UNDER_WAY;
            }
            else
            {
                $status = GBS_FINISHED;
            }
        }
    }
    elseif ($group_buy['is_finished'] == GBS_SUCCEED)
    {
        /* 已处理，团购成功 */
        $status = GBS_SUCCEED;
    }
    elseif ($group_buy['is_finished'] == GBS_FAIL)
    {
        /* 已处理，团购失败 */
        $status = GBS_FAIL;
    }

    return $status;
}


/*
 * 取得某团购活动统计信息
 * @param   int     $group_buy_id   团购活动id
 * @param   float   $deposit        保证金
 * @return  array   统计信息
 *                  total_order     总订单数
 *                  total_goods     总商品数
 *                  valid_order     有效订单数
 *                  valid_goods     有效商品数
 */
function group_buy_stat($group_buy_id, $deposit)
{
    $group_buy_id = intval($group_buy_id);
    /* 取得团购活动商品ID */
    $sql = "SELECT goods_id " .
           "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') .
           "WHERE act_id = '$group_buy_id' " .
           "AND act_type = '" . GAT_GROUP_BUY . "'";
    $group_buy_goods_id = M()->getOne($sql,'goods_id');
    
    /* 取得总订单数和总商品数 */
    $sql = "SELECT COUNT(*) AS total_order, SUM(g.goods_number) AS total_goods " .
            "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_order_info') . " AS o, " .
                $GLOBALS['ec_globals']['ecs']->table('ec_order_goods') . " AS g " .
            " WHERE o.order_id = g.order_id " .
            "AND o.extension_code = 'group_buy' " .
            "AND o.extension_id = '$group_buy_id' " .
            "AND g.goods_id = '$group_buy_goods_id' " .
            "AND (order_status = '" . OS_CONFIRMED . "' OR order_status = '" . OS_UNCONFIRMED . "')";
    $stat = M()->getRowSql($sql);
    if ($stat['total_order'] == 0)
    {
        $stat['total_goods'] = 0;
    }
    /* 取得有效订单数和有效商品数 */
    $deposit = floatval($deposit);
    if ($deposit > 0 && $stat['total_order'] > 0)
    {
        $sql .= " AND (o.money_paid + o.surplus) >= '$deposit'";
        $row = M()->getRowSql($sql);
        $stat['valid_order'] = $row['total_order'];
        if ($stat['valid_order'] == 0)
        {
            $stat['valid_goods'] = 0;
        }
        else
        {
            $stat['valid_goods'] = $row['total_goods'];
        }
    }
    else
    {
        $stat['valid_order'] = $stat['total_order'];
        $stat['valid_goods'] = $stat['total_goods'];
    }
    return $stat;
}


/**
 * 取货品信息
 *
 * @access  public
 * @param   int         $product_id     货品id
 * @param   int         $filed          字段
 * @return  array
 */
function get_product_info($product_id, $filed = '')
{
    $return_array = array();

    if (empty($product_id))
    {
        return $return_array;
    }

    $filed = trim($filed);
    if (empty($filed))
    {
        $filed = '*';
    }

    $sql = "SELECT $filed FROM  " . $GLOBALS['ec_globals']['ecs']->table('ec_products') . " WHERE product_id = '$product_id'";
    $return_array = M()->getRowSql($sql);

    return $return_array;
}

/**
 * 商品货号是否重复
 *
 * @param   string     $goods_sn        商品货号；请在传入本参数前对本参数进行SQl脚本过滤
 * @param   int        $goods_id        商品id；默认值为：0，没有商品id
 * @return  bool                        true，重复；false，不重复
 */
function check_goods_sn_exist($goods_sn, $goods_id = 0)
{
    $goods_sn = trim($goods_sn);
    $goods_id = intval($goods_id);
    if (strlen($goods_sn) == 0)
    {
        return true;    //重复
    }

    if (empty($goods_id))
    {
        $sql = "SELECT goods_id FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') ."
                WHERE goods_sn = '$goods_sn'";
    }
    else
    {
        $sql = "SELECT goods_id FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') ."
                WHERE goods_sn = '$goods_sn'
                AND goods_id <> '$goods_id'";
    }

    $res = M()->getOne($sql,'goods_id');

    if (empty($res))
    {
        return false;    //不重复
    }
    else
    {
        return true;    //重复
    }

}

/**
 * 商品的货品货号是否重复
 *
 * @param   string     $product_sn        商品的货品货号；请在传入本参数前对本参数进行SQl脚本过滤
 * @param   int        $product_id        商品的货品id；默认值为：0，没有货品id
 * @return  bool                          true，重复；false，不重复
 */
function check_product_sn_exist($product_sn, $product_id = 0)
{
    $product_sn = trim($product_sn);
    $product_id = intval($product_id);
    if (strlen($product_sn) == 0)
    {
        return true;    //重复
    }
    $sql="SELECT goods_id FROM ". $GLOBALS['ec_globals']['ecs']->table('ec_goods')."WHERE goods_sn='$product_sn'";
    if(M()->getOne($sql,'goods_id'))
    {
        return true;    //重复
    }


    if (empty($product_id))
    {
        $sql = "SELECT product_id FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_products') ."
                WHERE product_sn = '$product_sn'";
    }
    else
    {
        $sql = "SELECT product_id FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_products') ."
                WHERE product_sn = '$product_sn'
                AND product_id <> '$product_id'";
    }

    $res = M()->getOne($sql,'product_id');

    if (empty($res))
    {
        return false;    //不重复
    }
    else
    {
        return true;    //重复
    }
}

/**
 * 商品的货品规格是否存在
 *
 * @param   string     $goods_attr        商品的货品规格
 * @param   string     $goods_id          商品id
 * @param   int        $product_id        商品的货品id；默认值为：0，没有货品id
 * @return  bool                          true，重复；false，不重复
 */
function check_goods_attr_exist($goods_attr, $goods_id, $product_id = 0)
{
    $goods_id = intval($goods_id);
    if (strlen($goods_attr) == 0 || empty($goods_id))
    {
        return true;    //重复
    }

    if (empty($product_id))
    {
        $sql = "SELECT product_id FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_products') ."
                WHERE goods_attr = '$goods_attr'
                AND goods_id = '$goods_id'";
    }
    else
    {
        $sql = "SELECT product_id FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_products') ."
                WHERE goods_attr = '$goods_attr'
                AND goods_id = '$goods_id'
                AND product_id <> '$product_id'";
    }

    $res = M()->getOne($sql,'product_id');

    if (empty($res))
    {
        return false;    //不重复
    }
    else
    {
        return true;    //重复
    }
}

/**
 * 插入或更新商品属性
 *
 * @param   int     $goods_id           商品编号
 * @param   array   $id_list            属性编号数组
 * @param   array   $is_spec_list       是否规格数组 'true' | 'false'
 * @param   array   $value_price_list   属性值数组
 * @return  array                       返回受到影响的goods_attr_id数组
 */
function handle_goods_attr($goods_id, $id_list, $is_spec_list, $value_price_list)
{
    $goods_attr_id = array();
    /* 循环处理每个属性 */
    foreach ($id_list AS $key => $id)
    {
        $is_spec = $is_spec_list[$key];
        if ($is_spec == 'false')
        {
            $value = $value_price_list[$key];
            $price = '';
        }
        else
        {
            $value_list = array();
            $price_list = array();
            if ($value_price_list[$key])
            {
                $vp_list = explode(chr(13), $value_price_list[$key]);
                foreach ($vp_list AS $v_p)
                {
                    $arr = explode(chr(9), $v_p);
                    $value_list[] = $arr[0];
                    $price_list[] = $arr[1];
                }
            }
            $value = join(chr(13), $value_list);
            $price = join(chr(13), $price_list);
        }
        
        // 插入或更新记录
        $sql = "SELECT goods_attr_id 
                FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_attr') . " WHERE goods_id = '$goods_id' AND attr_id = '$id' AND attr_value = '$value' LIMIT 0, 1";
        $result_id = M()->getOne($sql,'goods_attr_id');
        if (!empty($result_id))
        {
            $sql = "UPDATE " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_attr') . "
                    SET attr_value = '$value'
                    WHERE goods_id = '$goods_id'
                    AND attr_id = '$id'
                    AND goods_attr_id = '$result_id'";

            $goods_attr_id[$id] = $result_id;
        }
        else
        {
            $sql = "INSERT INTO " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_attr') . " (goods_id, attr_id, attr_value, attr_price) " .
                    "VALUES ('$goods_id', '$id', '$value', '$price')";
        }
        
        $insert_id=M()->exe($sql);
        if ($goods_attr_id[$id] == '')
        {
            $goods_attr_id[$id] = $insert_id;
        }
    }
    return $goods_attr_id;
}

/**
 * 获得商品的货品总库存
 *
 * @access      public
 * @params      integer     $goods_id       商品id
 * @params      string      $conditions     sql条件，AND语句开头
 * @return      string number
 */
function product_number_count($goods_id, $conditions = '')
{
    if (empty($goods_id))
    {
        return -1;  //$goods_id不能为空
    }

    $sql = "SELECT SUM(product_number)
            FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_products') . "
            WHERE goods_id = '$goods_id'
            " . $conditions;
    $nums = M()->getOne($sql,'SUM(product_number)');
    $nums = empty($nums) ? 0 : $nums;

    return $nums;
}



/**
 * 获得商品的规格属性值列表
 *
 * @access      public
 * @params      integer         $goods_id
 * @return      array
 */
function product_goods_attr_list($goods_id)
{
    if (empty($goods_id))
    {
        return array();  //$goods_id不能为空
    }

    $sql = "SELECT goods_attr_id, attr_value FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_attr') . " WHERE goods_id = '$goods_id'";
    $results = M()->getAll($sql);

    $return_arr = array();
    if(!empty($results)){
        foreach ($results as $value)
        {
            $return_arr[$value['goods_attr_id']] = $value['attr_value'];
        }  
    }
    

    return $return_arr;
}


/**
 * 获得商品的货品列表
 *
 * @access  public
 * @params  integer $goods_id
 * @params  string  $conditions
 * @return  array
 */
function product_list($goods_id, $conditions = '')
{
    /* 过滤条件 */
    $param_str = '-' . $goods_id;
    $result = get_filter($param_str);
    if ($result === false)
    {
        $day = getdate();
        $today = local_mktime(23, 59, 59, $day['mon'], $day['mday'], $day['year']);
        
        $filter['goods_id']         = $goods_id;
        $filter['keyword']          = empty($_REQUEST['keyword']) ? '' : trim($_REQUEST['keyword']);
        $filter['stock_warning']    = empty($_REQUEST['stock_warning']) ? 0 : intval($_REQUEST['stock_warning']);

        if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
        {
            $filter['keyword'] = json_str_iconv($filter['keyword']);
        }
        $filter['sort_by']          = empty($_REQUEST['sort_by']) ? 'product_id' : trim($_REQUEST['sort_by']);
        $filter['sort_order']       = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
        $filter['extension_code']   = empty($_REQUEST['extension_code']) ? '' : trim($_REQUEST['extension_code']);
        $filter['page_count'] = isset($filter['page_count']) ? $filter['page_count'] : 1;
        
        $where = '';

        /* 库存警告 */
        if ($filter['stock_warning'])
        {
            $where .= ' AND goods_number <= warn_number ';
        }

        /* 关键字 */
        if (!empty($filter['keyword']))
        {
            $where .= " AND (product_sn LIKE '%" . $filter['keyword'] . "%')";
        }

        $where .= $conditions;
        
        /* 记录总数 */
        $sql = "SELECT COUNT(*) FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_products'). " AS p WHERE goods_id = $goods_id $where";
        $filter['record_count'] = M()->getOne($sql,'COUNT(*)');

        $sql = "SELECT product_id, goods_id, goods_attr, product_sn, product_number
                FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_products') . " AS g
                WHERE goods_id = $goods_id $where
                ORDER BY $filter[sort_by] $filter[sort_order]";

        $filter['keyword'] = stripslashes($filter['keyword']);
    }
    else
    {
        $sql    = $result['sql'];
        $filter = $result['filter'];
    }
    $row = M()->getAll($sql);
    /* 处理规格属性 */
    $goods_attr = product_goods_attr_list($goods_id);
    if(!empty($row)){
        foreach ($row as $key => $value)
        {
            $_goods_attr_array = explode('|', $value['goods_attr']);
            if (is_array($_goods_attr_array))
            {
                $_temp = '';
                foreach ($_goods_attr_array as $_goods_attr_value)
                {
                     $_temp[] = $goods_attr[$_goods_attr_value];
                }
                $row[$key]['goods_attr'] = $_temp;
            }
        }
    }
    
    return array('product' => $row, 
                'filter' => $filter, 
                'page_count' => $filter['page_count'], 
                'record_count' => $filter['record_count']);
}



/**
 * 检测商品是否有货品
 *
 * @access      public
 * @params      integer     $goods_id       商品id
 * @params      string      $conditions     sql条件，AND语句开头
 * @return      string number               -1，错误；1，存在；0，不存在
 */
function check_goods_product_exist($goods_id, $conditions = '')
{
    if (empty($goods_id))
    {
        return -1;  //$goods_id不能为空
    }

    $sql = "SELECT goods_id
            FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_products') . "
            WHERE goods_id = '$goods_id'
            " . $conditions . "
            LIMIT 0, 1";
    $result = M()->getRowSql($sql);

    if (empty($result))
    {
        return 0;
    }

    return 1;
}

/**
 * 从回收站删除多个商品
 * @param   mix     $goods_id   商品id列表：可以逗号格开，也可以是数组
 * @return  void
 */
function delete_goods($goods_id)
{
    if (empty($goods_id))
    {
        return;
    }
    /* 取得有效商品id */
    $sql = "SELECT DISTINCT goods_id FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') .
            " WHERE goods_id " . db_create_in($goods_id) . " AND is_delete = 1";
    $goods_id = M()->getCol($sql,'goods_id');
    if (empty($goods_id))
    {
        return;
    }
    /* 删除商品图片和轮播图片文件 */
    $sql = "SELECT goods_thumb, goods_img, original_img " .
            "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') .
            " WHERE goods_id " . db_create_in($goods_id);
    $res = M()->query($sql);
    if(!empty($res)){
        foreach($res as $row){
            if (!empty($goods['goods_thumb']))
            {
                @unlink(ROOT_PATH . $goods['goods_thumb']);
            }
            if (!empty($goods['goods_img']))
            {
                @unlink(ROOT_PATH . $goods['goods_img']);
            }
            if (!empty($goods['original_img']))
            {
                @unlink(ROOT_PATH . $goods['original_img']);
            }
        }
    }
    
    /* 删除商品 */
    $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') .
            " WHERE goods_id " . db_create_in($goods_id);
    M()->exe($sql);
    
    /* 删除商品的货品记录 */
    $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_products') .
            " WHERE goods_id " . db_create_in($goods_id);
    M()->exe($sql);
    
    /* 删除商品相册的图片文件 */
    $sql = "SELECT img_url, thumb_url, img_original " .
            "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_gallery') .
            " WHERE goods_id " . db_create_in($goods_id);
    $res = M()->query($sql);
    if(!empty($res)){
        foreach($res as $row){
            if (!empty($row['img_url']))
            {
                @unlink(ROOT_PATH . $row['img_url']);
            }
            if (!empty($row['thumb_url']))
            {
                @unlink(ROOT_PATH . $row['thumb_url']);
            }
            if (!empty($row['img_original']))
            {
                @unlink(ROOT_PATH . $row['img_original']);
            }
        }
    }
    
    /* 删除商品相册 */
    $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_gallery') . " WHERE goods_id " . db_create_in($goods_id);
    M()->exe($sql);
    
    /* 删除相关表记录 */
    $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_collect_goods') . " WHERE goods_id " . db_create_in($goods_id);
    M()->exe($sql);
    $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_article') . " WHERE goods_id " . db_create_in($goods_id);
    M()->exe($sql);
    $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_attr') . " WHERE goods_id " . db_create_in($goods_id);
    M()->exe($sql);
    $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_cat') . " WHERE goods_id " . db_create_in($goods_id);
    M()->exe($sql);
    $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . " WHERE goods_id " . db_create_in($goods_id);
    M()->exe($sql);
    $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_group_goods') . " WHERE parent_id " . db_create_in($goods_id);
    M()->exe($sql);
    $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_group_goods') . " WHERE goods_id " . db_create_in($goods_id);
    M()->exe($sql);
    $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_link_goods') . " WHERE goods_id " . db_create_in($goods_id);
    M()->exe($sql);
    $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_link_goods') . " WHERE link_goods_id " . db_create_in($goods_id);
    M()->exe($sql);
    $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_tag') . " WHERE goods_id " . db_create_in($goods_id);
    M()->exe($sql);
    $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_comment') . " WHERE comment_type = 0 AND id_value " . db_create_in($goods_id);
    M()->exe($sql);
    
    /* 删除相应虚拟商品记录 */
    $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_virtual_card') . " WHERE goods_id " . db_create_in($goods_id);
    if (!M()->exe($sql))
    {
        die('数据库操作失败');
    }
    
    /* 清除缓存 */
    clear_cache_files();
}



/**
 * 修改商品某字段值
 * @param   string  $goods_id   商品编号，可以为多个，用 ',' 隔开
 * @param   string  $field      字段名
 * @param   string  $value      字段值
 * @return  bool
 */
function update_goods($goods_id, $field, $value)
{
    if ($goods_id)
    {
        /* 清除缓存 */
        clear_cache_files();

        $sql = "UPDATE " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') .
                " SET $field = '$value' , last_update = '". gmtime() ."' " .
                "WHERE goods_id " . db_create_in($goods_id);
        return M()->exe($sql);
    }
    else
    {
        return false;
    }
}


/**
 * 检查单个商品是否存在规格
 *
 * @param   int        $goods_id          商品id
 * @return  bool                          true，存在；false，不存在
 */
function check_goods_specifications_exist($goods_id)
{
    $goods_id = intval($goods_id);

    $sql = "SELECT COUNT(a.attr_id)
            FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_attribute'). " AS a, " .$GLOBALS['ec_globals']['ecs']->table('ec_goods'). " AS g
            WHERE a.cat_id = g.goods_type
            AND g.goods_id = '$goods_id'";

    $count = M()->getOne($sql,'COUNT(a.attr_id)');

    if ($count > 0)
    {
        return true;    //存在
    }
    else
    {
        return false;    //不存在
    }
}


/**
 * 保存某商品的相册图片
 * @param   int     $goods_id
 * @param   array   $image_files
 * @param   array   $image_descs
 * @return  void
 */
function handle_gallery_image($goods_id, $image_files, $image_descs, $image_urls)
{
    $db_prefix=C("DB_PREFIX");
    $image = new EcImage(C('ec_bgcolor'));
    /* 是否处理缩略图 */
    $proc_thumb = (isset($GLOBALS['shop_id']) && $GLOBALS['shop_id'] > 0)? false : true;
    //p($image_files);die;
    foreach ($image_descs AS $key => $img_desc)
    {
        /* 是否成功上传 */
        $flag = false;
        if (isset($image_files['error']))
        {
            if ($image_files['error'][$key] == 0)
            {
                $flag = true;
            }
        }else{
            if ($image_files['tmp_name'][$key] != 'none')
            {
                $flag = true;
            }
        }
        if ($flag)
        {
            // 生成缩略图
            if ($proc_thumb)
            {
                $thumb_url = $image->make_thumb($image_files['tmp_name'][$key], C('ec_image_width'), C('ec_image_height'));
                $thumb_url = is_string($thumb_url) ? $thumb_url : '';
            }
            $upload = array(
                'name' => $image_files['name'][$key],
                'type' => $image_files['type'][$key],
                'tmp_name' => $image_files['tmp_name'][$key],
                'size' => $image_files['size'][$key],
            );
            if (isset($image_files['error']))
            {
                $upload['error'] = $image_files['error'][$key];
            }
            $img_original = $image->upload_image($upload);
            if ($img_original === false)
            {
                return $image->error_msg();
            }
            $img_url = $img_original;
            if (!$proc_thumb)
            {
                $thumb_url = $img_original;
            }
            // 如果服务器支持GD 则添加水印
            if ($proc_thumb && gd_version() > 0){
                $pos        = strpos(basename($img_original), '.');
                $newname    = dirname($img_original) . '/' . $image->random_filename() . substr(basename($img_original), $pos);
                copy(ROOT_PATH . $img_original, ROOT_PATH . $newname);
                $img_url    = $newname;

                $image->add_watermark(ROOT_PATH.$img_url,'',ROOT_PATH.C('ec_watermark'), C('ec_watermark_place'), C('ec_watermark_alpha'));
            }
            /* 重新格式化图片名称 */
            $img_original = reformat_image_name('gallery', $goods_id, $img_original, 'source');
            $img_url = reformat_image_name('gallery', $goods_id, $img_url, 'goods');
            $thumb_url = reformat_image_name('gallery_thumb', $goods_id, $thumb_url, 'thumb');
            $sql = "INSERT INTO " . $db_prefix.'ec_goods_gallery' . " 
            (goods_id, img_url, img_desc, thumb_url, img_original) " .
                "VALUES ('$goods_id', '$img_url', '$img_desc', '$thumb_url', '$img_original')";
                //echo $sql.'<br/>';
            M()->exe($sql);
            /* 不保留商品原图的时候删除原图 */
            if ($proc_thumb && !C('ec_retain_original_img')&& !empty($img_original))
            {
                M()->exe("UPDATE " . $db_prefix.'ec_goods_gallery' . " SET img_original='' WHERE `goods_id`='{$goods_id}'");
                @unlink('../' . $img_original);
            }
        }else if (
                !empty($image_urls[$key]) && 
                ($image_urls[$key] != '或者输入外部图片链接地址') && 
                ($image_urls[$key] != 'http://') && 
                copy(trim($image_urls[$key]), ROOT_PATH . 'temp/' . basename($image_urls[$key]))
                )
        {
            $image_url = trim($image_urls[$key]);
            //定义原图路径
            $down_img = ROOT_PATH . 'temp/' . basename($image_url);
            // 生成缩略图
            if ($proc_thumb)
            {
                $thumb_url = $image->make_thumb($down_img, C('ec_image_width'), C('ec_image_height'));
                $thumb_url = is_string($thumb_url) ? $thumb_url : '';
                $thumb_url = reformat_image_name('gallery_thumb', $goods_id, $thumb_url, 'thumb');
            }
            if (!$proc_thumb)
            {
                $thumb_url = htmlspecialchars($image_url);
            }
            /* 重新格式化图片名称 */
            $img_url = $img_original = htmlspecialchars($image_url);
            $sql = "INSERT INTO " . $db_prefix.'ec_goods_gallery' . " 
                (goods_id, img_url, img_desc, thumb_url, img_original) " .
                    "VALUES ('$goods_id', '$img_url', '$img_desc', '$thumb_url', '$img_original')";
            M()->exe($sql);

            @unlink($down_img);
        }
    }
}


/**
 * 格式化商品图片名称（按目录存储）
 *
 */
function reformat_image_name($type, $goods_id, $source_img, $position='')
{
    $rand_name = gmtime() . sprintf("%03d", mt_rand(1,999));
    $img_ext = substr($source_img, strrpos($source_img, '.'));
    $dir = 'images';
    if (defined('EC_IMAGE_DIR'))
    {
        $dir = EC_IMAGE_DIR;
    }
    $sub_dir = date('Ym', gmtime());
    if (!make_dir(ROOT_PATH.$dir.'/'.$sub_dir))
    {
        return false;
    }
    if (!make_dir(ROOT_PATH.$dir.'/'.$sub_dir.'/source_img'))
    {
        return false;
    }
    if (!make_dir(ROOT_PATH.$dir.'/'.$sub_dir.'/goods_img'))
    {
        return false;
    }
    if (!make_dir(ROOT_PATH.$dir.'/'.$sub_dir.'/thumb_img'))
    {
        return false;
    }
    switch($type)
    {
        case 'goods':
            $img_name = $goods_id . '_G_' . $rand_name;
            break;
        case 'goods_thumb':
            $img_name = $goods_id . '_thumb_G_' . $rand_name;
            break;
        case 'gallery':
            $img_name = $goods_id . '_P_' . $rand_name;
            break;
        case 'gallery_thumb':
            $img_name = $goods_id . '_thumb_P_' . $rand_name;
            break;
    }
    if ($position == 'source')
    {
        if (move_image_file(ROOT_PATH.$source_img, ROOT_PATH.$dir.'/'.$sub_dir.'/source_img/'.$img_name.$img_ext))
        {
            return $dir.'/'.$sub_dir.'/source_img/'.$img_name.$img_ext;
        }
    }
    elseif ($position == 'thumb')
    {
        if (move_image_file(ROOT_PATH.$source_img, ROOT_PATH.$dir.'/'.$sub_dir.'/thumb_img/'.$img_name.$img_ext))
        {
            return $dir.'/'.$sub_dir.'/thumb_img/'.$img_name.$img_ext;
        }
    }
    else
    {
        if (move_image_file(ROOT_PATH.$source_img, ROOT_PATH.$dir.'/'.$sub_dir.'/goods_img/'.$img_name.$img_ext))
        {
            return $dir.'/'.$sub_dir.'/goods_img/'.$img_name.$img_ext;
        }
    }
    return false;
}

function move_image_file($source, $dest)
{
    if($source==ROOT_PATH){
        return ;
    }
    if (@copy($source, $dest))
    {
        @unlink($source);
        return true;
    }
    return false;
}

/**
 * 保存某商品的关联商品
 * @param   int     $goods_id
 * @return  void
 */
function handle_link_goods($goods_id)
{
    $sql = "UPDATE " . $GLOBALS['ec_globals']['ecs']->table('ec_link_goods') . " SET " .
            " goods_id = '$goods_id' " .
            " WHERE goods_id = '0'" .
            " AND admin_id = '$_SESSION[uid]'";
    M()->exe($sql);

    $sql = "UPDATE " . $GLOBALS['ec_globals']['ecs']->table('ec_link_goods') . " SET " .
            " link_goods_id = '$goods_id' " .
            " WHERE link_goods_id = '0'" .
            " AND admin_id = '$_SESSION[uid]'";
    M()->exe($sql);
}


/**
 * 保存某商品的配件
 * @param   int     $goods_id
 * @return  void
 */
function handle_group_goods($goods_id)
{
    $sql = "UPDATE " . $GLOBALS['ec_globals']['ecs']->table('ec_group_goods') . " SET " .
            " parent_id = '$goods_id' " .
            " WHERE parent_id = '0'" .
            " AND admin_id = '$_SESSION[uid]'";
    M()->exe($sql);
}

/**
 * 保存某商品的关联文章
 * @param   int     $goods_id
 * @return  void
 */
function handle_goods_article($goods_id)
{
    $sql = "UPDATE " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_article') . " SET " .
            " goods_id = '$goods_id' " .
            " WHERE goods_id = '0'" .
            " AND admin_id = '$_SESSION[uid]'";
    M()->exe($sql);
}


/**
 * 保存某商品的扩展分类
 * @param   int     $goods_id   商品编号
 * @param   array   $cat_list   分类编号数组
 * @return  void
 */
function handle_other_cat($goods_id, $cat_list)
{
    /* 查询现有的扩展分类 */
    $sql = "SELECT cat_id FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_cat') .
            " WHERE goods_id = '$goods_id'";
    $exist_list = M()->getCol($sql,'cat_id');

    /* 删除不再有的分类 */
    $delete_list = array_diff($exist_list, $cat_list);
    if ($delete_list)
    {
        $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_cat') .
                " WHERE goods_id = '$goods_id' " .
                "AND cat_id " . db_create_in($delete_list);
        M()->exe($sql);
    }

    /* 添加新加的分类 */
    $add_list = array_diff($cat_list, $exist_list, array(0));
    foreach ($add_list AS $cat_id)
    {
        // 插入记录
        $sql = "INSERT INTO " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_cat') .
                " (goods_id, cat_id) " .
                "VALUES ('$goods_id', '$cat_id')";
        M()->exe($sql);
    }
}

/**
 * 保存某商品的会员价格
 * @param   int     $goods_id   商品编号
 * @param   array   $rank_list  等级列表
 * @param   array   $price_list 价格列表
 * @return  void
 */
function handle_member_price($goods_id, $rank_list, $price_list)
{
    /* 循环处理每个会员等级 */
    foreach ($rank_list AS $key => $rank)
    {
        /* 会员等级对应的价格 */
        $price = $price_list[$key];

        // 插入或更新记录
        $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') .
               " WHERE goods_id = '$goods_id' AND user_rank = '$rank'";
        if (M()->getOne($sql,'COUNT(*)') > 0)
        {
            /* 如果会员价格是小于0则删除原来价格，不是则更新为新的价格 */
            if ($price < 0)
            {
                $sql = "DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') .
                       " WHERE goods_id = '$goods_id' AND user_rank = '$rank' LIMIT 1";
            }
            else
            {
                $sql = "UPDATE " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') .
                       " SET user_price = '$price' " .
                       "WHERE goods_id = '$goods_id' " .
                       "AND user_rank = '$rank' LIMIT 1";
            }
        }
        else
        {
            if ($price == -1)
            {
                $sql = '';
            }
            else
            {
                $sql = "INSERT INTO " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . " (goods_id, user_rank, user_price) " .
                       "VALUES ('$goods_id', '$rank', '$price')";
            }
        }

        if ($sql)
        {
            M()->exe($sql);
        }
    }
}



/**
 * 为某商品生成唯一的货号
 * @param   int     $goods_id   商品编号
 * @return  string  唯一的货号
 */
function generate_goods_sn($goods_id)
{
    $goods_sn = C('ec_sn_prefix') . str_repeat('0', 6 - strlen($goods_id)) . $goods_id;

    $sql = "SELECT goods_sn FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') .
            " WHERE goods_sn LIKE '" . mysql_like_quote($goods_sn) . "%' AND goods_id <> '$goods_id' " .
            " ORDER BY LENGTH(goods_sn) DESC";
    $sn_list = M()->getCol($sql,'goods_sn');
    if(!empty($sn_list)){
        if (in_array($goods_sn, $sn_list))
        {
            $max = pow(10, strlen($sn_list[0]) - strlen($goods_sn) + 1) - 1;
            $new_sn = $goods_sn . mt_rand(0, $max);
            while (in_array($new_sn, $sn_list))
            {
                $new_sn = $goods_sn . mt_rand(0, $max);
            }
            $goods_sn = $new_sn;
        }
    }
    

    return $goods_sn;
}

/**
 * 取得通用属性和某分类的属性，以及某商品的属性值
 * @param   int     $cat_id     分类编号
 * @param   int     $goods_id   商品编号
 * @return  array   规格与属性列表
 */
function get_attr_list($cat_id, $goods_id = 0)
{
    if (empty($cat_id))
    {
        return array();
    }

    // 查询属性值及商品的属性值
    $sql = "SELECT a.attr_id, a.attr_name, a.attr_input_type, a.attr_type, a.attr_values, v.attr_value, v.attr_price ".
            "FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_attribute'). " AS a ".
            "LEFT JOIN " .$GLOBALS['ec_globals']['ecs']->table('ec_goods_attr'). " AS v ".
            "ON v.attr_id = a.attr_id AND v.goods_id = '$goods_id' ".
            "WHERE a.cat_id = " . intval($cat_id) ." OR a.cat_id = 0 ".
            "ORDER BY a.sort_order, a.attr_type, a.attr_id, v.attr_price, v.goods_attr_id";

    $row = M()->GetAll($sql);

    return $row;
}


/**
 * 根据属性数组创建属性的表单
 *
 * @access  public
 * @param   int     $cat_id     分类编号
 * @param   int     $goods_id   商品编号
 * @return  string
 */
function build_attr_html($cat_id, $goods_id = 0)
{
    $attr = get_attr_list($cat_id, $goods_id);
    $html = '<table width="100%" id="attrTable">';
    $spec = 0;
    
    if(!empty($attr)){
        foreach ($attr AS $key => $val)
        {
            $html .= "<tr><td class='label'>";
            if ($val['attr_type'] == 1 || $val['attr_type'] == 2)
            {
                $html .= ($spec != $val['attr_id']) ?
                    "<a href='javascript:;' onclick='addSpec(this)'>[+]</a>" :
                    "<a href='javascript:;' onclick='removeSpec(this)'>[-]</a>";
                $spec = $val['attr_id'];
            }
    
            $html .= "$val[attr_name]</td><td><input type='hidden' name='attr_id_list[]' value='$val[attr_id]' />";
    
            if ($val['attr_input_type'] == 0)
            {
                $html .= '<input name="attr_value_list[]" type="text" value="' .htmlspecialchars($val['attr_value']). '" size="40" /> ';
            }
            elseif ($val['attr_input_type'] == 2)
            {
                $html .= '<textarea name="attr_value_list[]" rows="3" cols="40">' .htmlspecialchars($val['attr_value']). '</textarea>';
            }
            else
            {
                $html .= '<select name="attr_value_list[]">';
                $html .= '<option value="">' .'请选择...'. '</option>';
    
                $attr_values = explode("\n", $val['attr_values']);
    
                foreach ($attr_values AS $opt)
                {
                    $opt    = trim(htmlspecialchars($opt));
    
                    $html   .= ($val['attr_value'] != $opt) ?
                        '<option value="' . $opt . '">' . $opt . '</option>' :
                        '<option value="' . $opt . '" selected="selected">' . $opt . '</option>';
                }
                $html .= '</select> ';
            }
    
            $html .= ($val['attr_type'] == 1 || $val['attr_type'] == 2) ?
                 '属性价格'.' <input type="text" name="attr_price_list[]" value="' . $val['attr_price'] . '" size="5" maxlength="10" />' :
                ' <input type="hidden" name="attr_price_list[]" value="0" />';
    
            $html .= '</td></tr>';
        }
    }
    $html .= '</table>';

    return $html;
}

/**
 * 取得某商品的会员价格列表
 * @param   int     $goods_id   商品编号
 * @return  array   会员价格列表 user_rank => user_price
 */
function get_member_price_list($goods_id)
{
    /* 取得会员价格 */
    $price_list = array();
    $sql = "SELECT user_rank, user_price FROM " .
           $GLOBALS['ec_globals']['ecs']->table('ec_member_price') .
           " WHERE goods_id = '$goods_id'";
    $res = M()->query($sql);
    if(!empty($res)){
        foreach($res as $row){
            $price_list[$row['user_rank']] = $row['user_price'];
        }
    }
    return $price_list;
}


/**
 * 取得会员等级列表
 * @return  array   会员等级列表
 */
function get_user_rank_list()
{
    $sql = "SELECT * FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_user_rank') .
           " ORDER BY min_points";

    return M()->getAll($sql);
}



/**
 * 取得重量单位列表
 * @return  array   重量单位列表
 */
function get_unit_list()
{
    return array(
        '1'     => '千克',
        '0.001' => '克',
    );
}


/**
 * 获得商品的关联文章
 *
 * @access  public
 * @param   integer $goods_id
 * @return  array
 */
function get_goods_articles($goods_id)
{
    $sql = "SELECT g.article_id, a.title " .
            "FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_goods_article') . " AS g, " .
                $GLOBALS['ec_globals']['ecs']->table('ec_article') . " AS a " .
            "WHERE g.goods_id = '$goods_id' " .
            "AND g.article_id = a.article_id ";
    if ($goods_id == 0)
    {
        $sql .= " AND g.admin_id = '$_SESSION[uid]'";
    }
    $row = M()->getAll($sql);

    return $row;
}

/**
 * 获得指定商品的配件
 *
 * @access  public
 * @param   integer $goods_id
 * @return  array
 */
function get_group_goods($goods_id)
{
    $sql = "SELECT gg.goods_id, CONCAT(g.goods_name, ' -- [', gg.goods_price, ']') AS goods_name " .
            "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_group_goods') . " AS gg, " .
                $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g " .
            "WHERE gg.parent_id = '$goods_id' " .
            "AND gg.goods_id = g.goods_id ";
    if ($goods_id == 0)
    {
        $sql .= " AND gg.admin_id = '$_SESSION[uid]'";
    }
    $row = M()->getAll($sql);

    return $row;
}


 /* 获得指定商品相关的商品
 *
 * @access  public
 * @param   integer $goods_id
 * @return  array
 */
function get_linked_goods($goods_id)
{
    $sql = "SELECT lg.link_goods_id AS goods_id, g.goods_name, lg.is_double " .
            "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_link_goods') . " AS lg, " .
                $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g " .
            "WHERE lg.goods_id = '$goods_id' " .
            "AND lg.link_goods_id = g.goods_id ";
    if ($goods_id == 0)
    {
        $sql .= " AND lg.admin_id = '$_SESSION[uid]'";
    }
    $row = M()->getAll($sql);
    if(!empty($row)){
        foreach ($row AS $key => $val)
        {
            $linked_type = $val['is_double'] == 0 ? '单向关联' : '双向关联';
    
            $row[$key]['goods_name'] = $val['goods_name'] . " -- [$linked_type]";
    
            unset($row[$key]['is_double']);
        }
    }
    

    return $row;
}


/**
 * 获得商品已添加的规格列表
 *
 * @access      public
 * @params      integer         $goods_id
 * @return      array
 */
function get_goods_specifications_list($goods_id)
{
    if (empty($goods_id))
    {
        return array();  //$goods_id不能为空
    }

    $sql = "SELECT g.goods_attr_id, g.attr_value, g.attr_id, a.attr_name
            FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_attr') . " AS g
                LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_attribute') . " AS a
                    ON a.attr_id = g.attr_id
            WHERE goods_id = '$goods_id'
            AND a.attr_type = 1
            ORDER BY g.attr_id ASC";
    $results = M()->getAll($sql);

    return $results;
}


/**
 * 获得所有扩展分类属于指定分类的所有商品ID
 *
 * @access  public
 * @param   string $cat_id     分类查询字符串
 * @return  string
 */
function get_extension_goods($cats)
{
    $extension_goods_array = '';
    $sql = 'SELECT goods_id FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods_cat') . " AS g WHERE $cats";
    $extension_goods_array = M()->getCol($sql,'goods_id');
    return db_create_in($extension_goods_array, 'g.goods_id');
}



/**
 * 获取商品类型中包含规格的类型列表
 *
 * @access  public
 * @return  array
 */
function get_goods_type_specifications()
{
    // 查询
    $sql = "SELECT DISTINCT cat_id
            FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_attribute'). "
            WHERE attr_type = 1";
    $row = M()->GetAll($sql);

    $return_arr = array();
    if (!empty($row))
    {
        foreach ($row as $value)
        {
            $return_arr[$value['cat_id']] = $value['cat_id'];
        }
    }
    return $return_arr;
}


/**
 * 获得商品列表
 *
 * @access  public
 * @params  integer $isdelete
 * @params  integer $real_goods
 * @params  integer $conditions
 * @return  array
 */
function goods_list($is_delete, $real_goods=1, $conditions = ''){
    /* 过滤条件 */
    $param_str = '-' . $is_delete . '-' . $real_goods;
    $result = get_filter($param_str);
    if ($result === false){
        $day = getdate();
        $today = local_mktime(23, 59, 59, $day['mon'], $day['mday'], $day['year']);
        
        $filter['cat_id']           = empty($_REQUEST['cat_id']) ? 0 : intval($_REQUEST['cat_id']);
        $filter['intro_type']       = empty($_REQUEST['intro_type']) ? '' : trim($_REQUEST['intro_type']);
        $filter['is_promote']       = empty($_REQUEST['is_promote']) ? 0 : intval($_REQUEST['is_promote']);
        $filter['stock_warning']    = empty($_REQUEST['stock_warning']) ? 0 : intval($_REQUEST['stock_warning']);
        $filter['brand_id']         = empty($_REQUEST['brand_id']) ? 0 : intval($_REQUEST['brand_id']);
        $filter['keyword']          = empty($_REQUEST['keyword']) ? '' : trim($_REQUEST['keyword']);
        $filter['suppliers_id'] = isset($_REQUEST['suppliers_id']) ? (empty($_REQUEST['suppliers_id']) ? '' : trim($_REQUEST['suppliers_id'])) : '';
        $filter['is_on_sale'] = isset($_REQUEST['is_on_sale']) ? ((empty($_REQUEST['is_on_sale']) && $_REQUEST['is_on_sale'] === 0) ? '' : trim($_REQUEST['is_on_sale'])) : '';
        if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
        {
            $filter['keyword'] = json_str_iconv($filter['keyword']);
        }
        $filter['sort_by']          = empty($_REQUEST['sort_by']) ? 'goods_id' : trim($_REQUEST['sort_by']);
        $filter['sort_order']       = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
        $filter['extension_code']   = empty($_REQUEST['extension_code']) ? '' : trim($_REQUEST['extension_code']);
        $filter['is_delete']        = $is_delete;
        $filter['real_goods']       = $real_goods;
        
        $where = $filter['cat_id'] > 0 ? " AND " . get_children($filter['cat_id']) : '';
        
        /* 推荐类型 */
        switch ($filter['intro_type']){
            case 'is_best':
                $where .= " AND is_best=1";
                break;
            case 'is_hot':
                $where .= ' AND is_hot=1';
                break;
            case 'is_new':
                $where .= ' AND is_new=1';
                break;
            case 'is_promote':
                $where .= " AND is_promote = 1 AND promote_price > 0 AND promote_start_date <= '$today' AND promote_end_date >= '$today'";
                break;
            case 'all_type';
                $where .= " AND (is_best=1 OR is_hot=1 OR is_new=1 OR (is_promote = 1 AND promote_price > 0 AND promote_start_date <= '" . $today . "' AND promote_end_date >= '" . $today . "'))";
        }
        /* 库存警告 */
        if ($filter['stock_warning'])
        {
            $where .= ' AND goods_number <= warn_number ';
        }
        
        /* 品牌 */
        if ($filter['brand_id'])
        {
            $where .= " AND brand_id='$filter[brand_id]'";
        }

        /* 扩展 */
        if ($filter['extension_code'])
        {
            $where .= " AND extension_code='$filter[extension_code]'";
        }
        
        /* 关键字 */
        if (!empty($filter['keyword']))
        {
            $where .= " AND (goods_sn LIKE '%" . mysql_like_quote($filter['keyword']) . "%' OR goods_name LIKE '%" . mysql_like_quote($filter['keyword']) . "%')";
        }

        if ($real_goods > -1)
        {
            $where .= " AND is_real='$real_goods'";
        }

        /* 上架 */
        if ($filter['is_on_sale'] !== '')
        {
            $where .= " AND (is_on_sale = '" . $filter['is_on_sale'] . "')";
        }
        
        /* 供货商 */
        if (!empty($filter['suppliers_id']))
        {
            $where .= " AND (suppliers_id = '" . $filter['suppliers_id'] . "')";
        }

        $where .= $conditions;
        
        /* 记录总数 */
        $sql = "SELECT COUNT(*) FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_goods'). " AS g WHERE is_delete='$is_delete' $where";
        $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
        
        /* 分页大小 */
        $filter = page_and_size($filter);
        
        $sql = "SELECT goods_id, goods_name, goods_type, goods_sn, shop_price, is_on_sale, is_best, is_new, is_hot, sort_order, goods_number, integral, " .
                    " (promote_price > 0 AND promote_start_date <= '$today' AND promote_end_date >= '$today') AS is_promote ".
                    " FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g WHERE is_delete='$is_delete' $where" .
                    " ORDER BY $filter[sort_by] $filter[sort_order] ".
                    " LIMIT " . $filter['start'] . ",$filter[page_size]";
        $filter['keyword'] = stripslashes($filter['keyword']);
        set_filter($filter, $sql, $param_str);
    }else{
        $sql    = $result['sql'];
        $filter = $result['filter'];
    }
    $row = M()->getAll($sql);
    return array(
                'goods' => $row, 
                'filter' => $filter, 
                'page_count' => $filter['page_count'], 
                'record_count' => $filter['record_count']);
}

/**
 * 取得推荐类型列表
 * @return  array   推荐类型列表
 */
function get_intro_list()
{
    return array(
        'is_best'    => '精品',
        'is_new'     => '新品',
        'is_hot'     => '热销',
        'is_promote' => '特价',
        'all_type' => '全部推荐',
    );
}


/**
 * 获得推荐商品
 *
 * @access  public
 * @param   string      $type       推荐类型，可以是 best, new, hot
 * @return  array
 */
function get_recommend_goods($type = '', $cats = '')
{
    $db_prefix=C('DB_PREFIX');
    if (!in_array($type, array('best', 'new', 'hot')))
    {
        return array();
    }
    //取不同推荐对应的商品
    $type_goods = array();
    if (empty($type_goods[$type]))
    {
        //初始化数据
        $type_goods['best'] = array();
        $type_goods['new'] = array();
        $type_goods['hot'] = array();
        $data = cache('recommend_goods');
        $data=null;
        if (empty($data) )
        {
            $sql = 'SELECT 
                        g.goods_id, g.is_best, g.is_new, g.is_hot, g.is_promote, b.brand_name,g.sort_order ' .
                    ' FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods')  . ' AS g ' .
                    ' LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_brand') . ' AS b ON b.brand_id = g.brand_id ' .
                    ' WHERE 
                        g.is_on_sale = 1 AND 
                        g.is_alone_sale = 1 AND 
                        g.is_delete = 0 AND 
                        (g.is_best = 1 OR g.is_new =1 OR g.is_hot = 1)'.
                    ' ORDER BY g.sort_order, g.last_update DESC';
            $goods_res = M()->query($sql);
            //定义推荐,最新，热门，促销商品
            $goods_data['best'] = array();
            $goods_data['new'] = array();
            $goods_data['hot'] = array();
            $goods_data['brand'] = array();
            if (!empty($goods_res))
            {
                 foreach($goods_res as $data)
                 {
                    if ($data['is_best'] == 1)
                    {
                        $goods_data['best'][] = array('goods_id' => $data['goods_id'], 'sort_order' => $data['sort_order']);
                    }
                    if ($data['is_new'] == 1)
                    {
                        $goods_data['new'][] = array('goods_id' => $data['goods_id'], 'sort_order' => $data['sort_order']);
                    }
                    if ($data['is_hot'] == 1)
                    {
                        $goods_data['hot'][] = array('goods_id' => $data['goods_id'], 'sort_order' => $data['sort_order']);
                    }
                    if ($data['brand_name'] != '')
                    {
                        $goods_data['brand'][$data['goods_id']] = $data['brand_name'];
                    }
                 }   
            }
            cache("recommend_goods", $goods_data);
        }else{
            $goods_data = $data;
        }
        //p($data);die;
    }
    $time = gmtime();
    $order_type =C('ec_recommend_order');
    //按推荐数量及排序取每一项推荐显示的商品 order_type可以根据后台设定进行各种条件显示
    static $type_array = array();
    $type2lib = array('best'=>'recommend_best', 'new'=>'recommend_new', 'hot'=>'recommend_hot');
    if (empty($type_array))
    {
        foreach($type2lib as $key => $data)
        {
            if (!empty($goods_data[$key]))
            {
                $num = get_library_number($data);
                $data_count = count($goods_data[$key]);
                $num = $data_count > $num  ? $num : $data_count;
         
                if ($order_type == 0)
                {
                    //usort($goods_data[$key], 'goods_sort');
                    $rand_key = array_slice($goods_data[$key], 0, $num);
                    foreach($rand_key as $key_data)
                    {
                        $type_array[$key][] = $key_data['goods_id'];
                    }
                }
                else
                {
                    $rand_key = array_rand($goods_data[$key], $num);
                    if ($num == 1)
                    {
                        $type_array[$key][] = $goods_data[$key][$rand_key]['goods_id'];
                    }
                    else
                    {
                        foreach($rand_key as $key_data)
                        {
                            $type_array[$key][] = $goods_data[$key][$key_data]['goods_id'];
                        }
                    }
                }
            }
            else
            {
                $type_array[$key] = array();
            }
        }
    }
    //p($type_array);
    //取出所有符合条件的商品数据，并将结果存入对应的推荐类型数组中
    $sql = 'SELECT 
                g.goods_id, g.goods_name, g.goods_name_style, g.market_price, g.shop_price AS org_price, g.promote_price, ' .
                "IFNULL(mp.user_price, g.shop_price * '$_SESSION[ec_discount]') AS shop_price, ".
                "promote_start_date, promote_end_date, g.goods_brief, g.goods_thumb, g.goods_img, RAND() AS rnd " .
            'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods')  . ' AS g ' .
            "LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . " AS mp ".
            "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[ec_user_rank]' ";
    $type_merge = array_merge($type_array['new'], $type_array['best'], $type_array['hot']);
    $type_merge = array_unique($type_merge);
    $sql .= ' WHERE g.goods_id ' . db_create_in($type_merge);
    $sql .= ' ORDER BY g.sort_order, g.last_update DESC';
    $result=M()->query($sql);

    if(!empty($result))
    {
        //p($result);die;
        foreach ($result AS $idx => $row)
        {
            if ($row['promote_price'] > 0)
            {
                $promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
                $goods[$idx]['promote_price'] = $promote_price > 0 ? price_format($promote_price) : '';
            }
            else
            {
                $goods[$idx]['promote_price'] = '';
            }
            
            $goods[$idx]['id']           = $row['goods_id'];
            $goods[$idx]['name']         = $row['goods_name'];
            $goods[$idx]['brief']        = $row['goods_brief'];
            $goods[$idx]['brand_name']   = isset($goods_data['brand'][$row['goods_id']]) ? $goods_data['brand'][$row['goods_id']] : '';
            $goods[$idx]['goods_style_name']   = add_style($row['goods_name'],$row['goods_name_style']);
            $ec_goods_name_length=C('EC_GOODS_NAME_LENGTH');
            $goods[$idx]['short_name']   = $ec_goods_name_length > 0 ?
                                               sub_str($row['goods_name'], $ec_goods_name_length) : $row['goods_name'];
            $goods[$idx]['short_style_name']   = add_style($goods[$idx]['short_name'],$row['goods_name_style']);
            $goods[$idx]['market_price'] = price_format($row['market_price']);
            $goods[$idx]['shop_price']   = price_format($row['shop_price']);
            $goods[$idx]['thumb']        = get_image_path($row['goods_id'], $row['goods_thumb'], true);
            $goods[$idx]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
            $goods[$idx]['url']          = ec_build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
            
            if (in_array($row['goods_id'], $type_array['best']))
            {
                $type_goods['best'][] = $goods[$idx];
            }
            if (in_array($row['goods_id'], $type_array['new']))
            {
                $type_goods['new'][] = $goods[$idx];
            }
            if (in_array($row['goods_id'], $type_array['hot']))
            {
                $type_goods['hot'][] = $goods[$idx];
            }
        }
    }
    
    return $type_goods[$type];
}


/**
 * 获得促销商品
 *
 * @access  public
 * @return  array
 */
function get_promote_goods($cats = '')
{
    $time = gmtime();
    $order_type = C('ec_recommend_order');

    /* 取得促销lbi的数量限制 */
    $num = get_library_number("recommend_promotion");
    //p($num);die;
    $sql = 'SELECT 
                g.goods_id, g.goods_name, g.goods_name_style, g.market_price, g.shop_price AS org_price, g.promote_price, ' .
                "IFNULL(mp.user_price, g.shop_price * '$_SESSION[ec_discount]') AS shop_price, ".
                "promote_start_date, promote_end_date, g.goods_brief, g.goods_thumb, goods_img, b.brand_name, " .
                "g.is_best, g.is_new, g.is_hot, g.is_promote, RAND() AS rnd " .
            'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . ' AS g ' .
            'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_brand') . ' AS b ON b.brand_id = g.brand_id ' .
            "LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . " AS mp ".
                "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[ec_user_rank]' ".
            'WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ' .
            " AND g.is_promote = 1 AND promote_start_date <= '$time' AND promote_end_date >= '$time' ";
    $sql .= $order_type == 0 ? ' ORDER BY g.sort_order, g.last_update DESC' : ' ORDER BY rnd';
    $sql .= " LIMIT $num ";
    $result = M()->query($sql);

    $goods = array();
    if(!empty($result)){
        foreach ($result AS $idx => $row)
        {
            if ($row['promote_price'] > 0)
            {
                $promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
                $goods[$idx]['promote_price'] = $promote_price > 0 ? price_format($promote_price) : '';
            }
            else
            {
                $goods[$idx]['promote_price'] = '';
            }
    
            $goods[$idx]['id']           = $row['goods_id'];
            $goods[$idx]['name']         = $row['goods_name'];
            $goods[$idx]['brief']        = $row['goods_brief'];
            $goods[$idx]['brand_name']   = $row['brand_name'];
            $goods[$idx]['goods_style_name']   = add_style($row['goods_name'],$row['goods_name_style']);
            $goods[$idx]['short_name']   = C('ec_goods_name_length') > 0 ? sub_str($row['goods_name'], C('ec_goods_name_length')) : $row['goods_name'];
            $goods[$idx]['short_style_name']   = add_style($goods[$idx]['short_name'],$row['goods_name_style']);
            $goods[$idx]['market_price'] = price_format($row['market_price']);
            $goods[$idx]['shop_price']   = price_format($row['shop_price']);
            $goods[$idx]['thumb']        = get_image_path($row['goods_id'], $row['goods_thumb'], true);
            $goods[$idx]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
            $goods[$idx]['url']          = ec_build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
        }
    }

    return $goods;
}


/**
 * 添加商品名样式
 * @param   string     $goods_name     商品名称
 * @param   string     $style          样式参数
 * @return  string
 */
function add_style($goods_name, $style)
{
    $goods_style_name = $goods_name;

    $arr   = explode('+', $style);

    $font_color     = !empty($arr[0]) ? $arr[0] : '';
    $font_style = !empty($arr[1]) ? $arr[1] : '';

    if ($font_color!='')
    {
        $goods_style_name = '<font color=' . $font_color . '>' . $goods_style_name . '</font>';
    }
    if ($font_style != '')
    {
        $goods_style_name = '<' . $font_style .'>' . $goods_style_name . '</' . $font_style . '>';
    }
    return $goods_style_name;
}

/**
 * 判断某个商品是否正在特价促销期
 *
 * @access  public
 * @param   float   $price      促销价格
 * @param   string  $start      促销开始日期
 * @param   string  $end        促销结束日期
 * @return  float   如果还在促销期则返回促销价，否则返回0
 */
function bargain_price($price, $start, $end)
{
    if ($price == 0)
    {
        return 0;
    }
    else
    {
        $time = gmtime();
        if ($time >= $start && $time <= $end)
        {
            return $price;
        }
        else
        {
            return 0;
        }
    }
}


/**
 * 获得指定分类同级的所有分类以及该分类下的子分类
 *
 * @access  public
 * @param   integer     $cat_id     分类编号
 * @return  array
 */
function get_categories_tree($cat_id = 0)
{
    if ($cat_id > 0)
    {
        $sql = 'SELECT parent_id FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_category') . " WHERE cat_id = '$cat_id'";
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
    $sql = 'SELECT count(*) FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_category') . " WHERE parent_id = '$parent_id' AND is_show = 1 ";
    if (M()->getOne($sql,'count(*)') || $parent_id == 0)
    {
        /* 获取当前分类及其子分类 */
        $sql = 'SELECT cat_id,cat_name ,parent_id,is_show ' .
                'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_category') .
                "WHERE parent_id = '$parent_id' AND is_show = 1 ORDER BY sort_order ASC, cat_id ASC";

        $res = M()->query($sql);

        if(!empty($res))
        {
            foreach ($res AS $row)
            {
                if ($row['is_show'])
                {
                    $cat_arr[$row['cat_id']]['id']   = $row['cat_id'];
                    $cat_arr[$row['cat_id']]['name'] = $row['cat_name'];
                    $cat_arr[$row['cat_id']]['url']  = ec_build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);
    
                    if (isset($row['cat_id']) != NULL)
                    {
                        $cat_arr[$row['cat_id']]['cat_id'] = get_child_tree($row['cat_id']);
                    }
                }
            }
        }
    }
    if(isset($cat_arr))
    {
        return $cat_arr;
    }
}

function get_child_tree($tree_id = 0)
{
    $three_arr = array();
    $sql = 'SELECT count(*) FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_category') . " WHERE parent_id = '$tree_id' AND is_show = 1 ";
    if (M()->getOne($sql,'count(*)') || $tree_id == 0)
    {
        $child_sql = 'SELECT cat_id, cat_name, parent_id, is_show ' .
                'FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_category') .
                "WHERE parent_id = '$tree_id' AND is_show = 1 ORDER BY sort_order ASC, cat_id ASC";
        $res = M()->query($child_sql);
        foreach ($res AS $row)
        {
            if ($row['is_show'])

               $three_arr[$row['cat_id']]['id']   = $row['cat_id'];
               $three_arr[$row['cat_id']]['name'] = $row['cat_name'];
               $three_arr[$row['cat_id']]['url']  = ec_build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);

               if (isset($row['cat_id']) != NULL)
                   {
                       $three_arr[$row['cat_id']]['cat_id'] = get_child_tree($row['cat_id']);

            }
        }
    }
    return $three_arr;
}


/**
 * 取指定规格的货品信息
 *
 * @access      public
 * @param       string      $goods_id
 * @param       array       $spec_goods_attr_id
 * @return      array
 */
function get_products_info($goods_id, $spec_goods_attr_id)
{
    $return_array = array();

    if (empty($spec_goods_attr_id) || !is_array($spec_goods_attr_id) || empty($goods_id))
    {
        return $return_array;
    }

    $goods_attr_array = sort_goods_attr_id_array($spec_goods_attr_id);

    if(isset($goods_attr_array['sort']))
    {
        $goods_attr = implode('|', $goods_attr_array['sort']);

        $sql = "SELECT * FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_products'). " WHERE goods_id = '$goods_id' AND goods_attr = '$goods_attr' LIMIT 0, 1";
        $return_array = M()->getRowSql($sql);
    }
    return $return_array;
}


