<?php
/**
 * 用户管理模型
 * Class UserModel
 */
class GoodsCategoryModel extends ViewModel {
    public $table = "goods_category";
    
    
    
    /**
     * 获得分类下的商品
     *
     * @access  public
     * @param   string  $children
     * @return  array
     */
    public function category_get_goods($children, $brand, $min, $max, $ext, $size, $page, $sort, $order,$display='list')
    {
        $db_prefix=C('DB_PREFIX');
        $goodsCatModel=K('GoodsCat');
        $goodsModel=K('Goods');
        $where = "g.is_on_sale = 1 AND g.is_alone_sale = 1 AND ".
            "g.is_delete = 0 AND ($children OR " . $goodsCatModel->get_extension_goods($children) . ')';
        if ($brand > 0)
        {
            $where .=  "AND g.brand_id=$brand ";
        }
        if ($min > 0)
        {
            $where .= " AND g.shop_price >= $min ";
        }
    
        if ($max > 0)
        {
            $where .= " AND g.shop_price <= $max ";
        }
        /* 获得商品列表 */
        $sql = 'SELECT 
                    g.goods_id, g.goods_name, g.goods_name_style, g.market_price, g.is_new, 
                    g.is_best, g.is_hot, g.shop_price AS org_price, ' .
                    "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, 
                    g.promote_price, g.goods_type, " .
                    'g.promote_start_date, g.promote_end_date, g.goods_brief, g.goods_thumb , g.goods_img ' .
                'FROM ' . 
                    $db_prefix.'goods' . ' AS g ' .
                    'LEFT JOIN ' . $db_prefix.'member_price' . ' AS mp ' .
                    "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' " .
                "WHERE 
                    $where $ext ORDER BY $sort $order";
        $res = M()->selectLimit($sql, $size, ($page - 1) * $size);
        $arr = array();
        if(!empty($res)){
            foreach($res as $row){
                if ($row['promote_price'] > 0)
                {
                    $promote_price = $goodsModel->bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
                }
                else
                {
                    $promote_price = 0;
                }
                /* 处理商品水印图片 */
                $watermark_img = '';
        
                if ($promote_price != 0)
                {
                    $watermark_img = "watermark_promote_small";
                }
                elseif ($row['is_new'] != 0)
                {
                    $watermark_img = "watermark_new_small";
                }
                elseif ($row['is_best'] != 0)
                {
                    $watermark_img = "watermark_best_small";
                }
                elseif ($row['is_hot'] != 0)
                {
                    $watermark_img = 'watermark_hot_small';
                }
                if ($watermark_img != '')
                {
                    $arr[$row['goods_id']]['watermark_img'] =  $watermark_img;
                }
                $arr[$row['goods_id']]['goods_id']         = $row['goods_id'];
                if($display == 'grid')
                {
                    $arr[$row['goods_id']]['goods_name']       = C('EC_GOODS_NAME_LENGTH')  > 0 ? sub_str($row['goods_name'], C('EC_GOODS_NAME_LENGTH')) : $row['goods_name'];
                }
                else
                {
                    $arr[$row['goods_id']]['goods_name']       = $row['goods_name'];
                }
                $arr[$row['goods_id']]['name']             = $row['goods_name'];
                $arr[$row['goods_id']]['goods_brief']      = $row['goods_brief'];
                $arr[$row['goods_id']]['goods_style_name'] = $goodsModel->add_style($row['goods_name'],$row['goods_name_style']);
                $arr[$row['goods_id']]['market_price']     = price_format($row['market_price']);
                $arr[$row['goods_id']]['shop_price']       = price_format($row['shop_price']);
                $arr[$row['goods_id']]['type']             = $row['goods_type'];
                $arr[$row['goods_id']]['promote_price']    = ($promote_price > 0) ? price_format($promote_price) : '';
                $arr[$row['goods_id']]['goods_thumb']      = get_image_path($row['goods_id'], $row['goods_thumb'], true);
                $arr[$row['goods_id']]['goods_img']        = get_image_path($row['goods_id'], $row['goods_img']);
                $arr[$row['goods_id']]['url']              = ec_build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']);
            }
        }
        return $arr;
    }
    
    /**
     * 获得分类下的商品总数
     *
     * @access  public
     * @param   string     $cat_id
     * @return  integer
     */
    public function get_cagtegory_goods_count($children, $brand = 0, $min = 0, $max = 0, $ext='')
    {
        $db_prefix=C('DB_PREFIX');
        $goodsCatModel=K('GoodsCat');
        $where  = "g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 AND ($children OR " . $goodsCatModel->get_extension_goods($children) . ')';
    
        if ($brand > 0)
        {
            $where .=  " AND g.brand_id = $brand ";
        }
    
        if ($min > 0)
        {
            $where .= " AND g.shop_price >= $min ";
        }
    
        if ($max > 0)
        {
            $where .= " AND g.shop_price <= $max ";
        }
    
        /* 返回商品总数 */
        return M()->getOne('SELECT COUNT(*) FROM ' . $db_prefix.'goods' . " AS g WHERE $where $ext",'COUNT(*)');
    }

    
    /**
     * 取得最近的上级分类的grade值
     *
     * @access  public
     * @param   int     $cat_id    //当前的cat_id
     *
     * @return int
     */
    public function get_parent_grade($cat_id)
    {
        static $res = NULL;
        if ($res === NULL)
        {
            $data = C('cat_parent_grade');
            if (empty($data) )
            {
                $sql = "SELECT parent_id, cat_id, grade ".
                   " FROM " . $this->tableFull;
                $res=M()->query($sql);
                C('cat_parent_grade',$res);
            }
            else
            {
                $res = $data;
            }
        }
        
        if (empty($res))
        {
            return 0;
        }
        $parent_arr = array();
        $grade_arr = array();
        
        foreach ($res as $val)
        {
            $parent_arr[$val['cat_id']] = $val['parent_id'];
            $grade_arr[$val['cat_id']] = $val['grade'];
        }
        while ($parent_arr[$cat_id] >0 && $grade_arr[$cat_id] == 0)
        {
            $cat_id = $parent_arr[$cat_id];
        }
        return $grade_arr[$cat_id];
    }
        
    /**
     * 获得商品分类的所有信息
     *
     * @param   integer     $cat_id     指定的分类ID
     *
     * @return  mix
     */
    public function get_cat_info($cat_id)
    {
        $sql = "SELECT * FROM " .$this->tableFull. " WHERE cat_id='$cat_id' LIMIT 1";
        return  M()->getRowSql($sql); 
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
        $sql = "SELECT COUNT(*) FROM " .$this->tableFull.
        " WHERE parent_id = '$parent_cat' AND cat_name = '$cat_name' AND cat_id<>'$exclude'";
        return ($this->getOne($sql,'COUNT(*)') > 0) ? true : false;
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
            $sql = 'SELECT parent_id FROM ' . $this->tableFull . " WHERE cat_id = '$cat_id'";
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
        $sql = 'SELECT count(*) FROM ' . $this->tableFull . " WHERE parent_id = '$parent_id' AND is_show = 1 ";
        if (M()->getOne($sql,'count(*)') || $parent_id == 0)
        {
            /* 获取当前分类及其子分类 */
            $sql = 'SELECT cat_id,cat_name ,parent_id,is_show ' .
                'FROM ' . $this->tableFull.
                " WHERE parent_id = '$parent_id' AND is_show = 1 ORDER BY sort_order ASC, cat_id ASC";
            $res = M()->getAll($sql);
            
            foreach ($res AS $row)
            {
                if ($row['is_show'])
                {
                    $cat_arr[$row['cat_id']]['id']   = $row['cat_id'];
                    $cat_arr[$row['cat_id']]['name'] = $row['cat_name'];
                    $cat_arr[$row['cat_id']]['url']  = ec_build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);
    
                    if (isset($row['cat_id']) != NULL)
                    {
                        $cat_arr[$row['cat_id']]['cat_id'] = $this->get_child_tree($row['cat_id']);
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
        $sql = 'SELECT count(*) FROM ' . $this->tableFull . " WHERE parent_id = '$tree_id' AND is_show = 1 ";
        if (M()->getOne($sql,'count(*)') || $tree_id == 0)
        {
            $child_sql = 'SELECT cat_id, cat_name, parent_id, is_show ' .
                    'FROM ' . $this->tableFull .
                    " WHERE parent_id = '$tree_id' AND is_show = 1 ORDER BY sort_order ASC, cat_id ASC";
            $res = M()->getAll($child_sql);
            foreach ($res AS $row)
            {
                if ($row['is_show'])
    
                   $three_arr[$row['cat_id']]['id']   = $row['cat_id'];
                   $three_arr[$row['cat_id']]['name'] = $row['cat_name'];
                   $three_arr[$row['cat_id']]['url']  = ec_build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);
    
                   if (isset($row['cat_id']) != NULL)
                       {
                           $three_arr[$row['cat_id']]['cat_id'] = $this->get_child_tree($row['cat_id']);
    
                }
            }
        }
        return $three_arr;
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
    public function cat_list($cat_id = 0, $selected = 0, $re_type = true, $level = 0, $is_show_all = true)
    {
        static $res = NULL;
    
        $db_prefix=C("DB_PREFIX");
        if ($res === NULL)
        {
            //TODO：关于缓存 之后再处理
            $data = null;//('cat_pid_releate');
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
                        'FROM ' . $this->tableFull. " AS c ".
                        "LEFT JOIN " . $this->tableFull . " AS s ON s.parent_id=c.cat_id ".
                        "GROUP BY c.cat_id ".
                        'ORDER BY c.parent_id, c.sort_order ASC';    
                $res = $this->db->query($sql);

                $sql = "SELECT 
                            cat_id, 
                            COUNT(*) AS goods_num " .
                        " FROM " . $db_prefix.'goods' .
                        " WHERE 
                            is_delete = 0 AND 
                            is_on_sale = 1 " .
                        " GROUP BY cat_id";
                $res2 = $this->db->query($sql);
                $sql = "SELECT 
                            gc.cat_id, 
                            COUNT(*) AS goods_num " .
                        " FROM 
                        " . $db_prefix.'goods_cat' . " AS gc , 
                        " .  $db_prefix.'goods' . " AS g " .
                        " WHERE 
                            g.goods_id = gc.goods_id AND 
                            g.is_delete = 0 AND 
                            g.is_on_sale = 1 " .
                        " GROUP BY gc.cat_id";
                $res3 = $this->db->query($sql);

                $newres = array();
                foreach($res2 as $k=>$v)
                {
                    $newres[$v['cat_id']] = $v['goods_num'];
                    foreach($res3 as $ks=>$vs)
                    {
                        if($v['cat_id'] == $vs['cat_id'])
                        {
                        $newres[$v['cat_id']] = $v['goods_num'] + $vs['goods_num'];
                        }
                    }
                }
    
                foreach($res as $k=>$v)
                {
                    $res[$k]['goods_num'] = !empty($newres[$v['cat_id']]) ? $newres[$v['cat_id']] : 0;
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
        
        $options =$this->cat_options($cat_id, $res); // 获得指定分类下的子分类的数组

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
}
?>