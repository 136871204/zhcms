<?php





/**
 * 用户管理模型
 * Class UserModel
 */
class GoodsModel extends ViewModel {
    public $table = "goods";
    
    /**
     * 取得推荐类型列表
     * @return  array   推荐类型列表
     */
    public function get_intro_list()
    {
        return array(
            'is_best'    => 'ベスト',
            'is_new'     => '最新',
            'is_hot'     => 'よく売れる',
            'is_promote' => '促銷',
            'all_type' => '全部お勧め',
        );
    }
    
    
    /**
     * 取得重量单位列表
     * @return  array   重量单位列表
     */
    public function get_unit_list()
    {
        return array(
            '1'     => '千克',
            '0.001' => '克',
        );
    }
    
    
    /**
     * 修改商品库存
     * @param   string  $goods_id   商品编号，可以为多个，用 ',' 隔开
     * @param   string  $value      字段值
     * @return  bool
     */
    public function update_goods_stock($goods_id, $value)
    {
        $db_prefix=C("DB_PREFIX");
        if ($goods_id)
        {
            /* $res = $goods_number - $old_product_number + $product_number; */
            $sql = "UPDATE " . $db_prefix.'goods' . "
                    SET goods_number = goods_number + $value,
                        last_update = '". gmtime() ."'
                    WHERE goods_id = '$goods_id'";
            $result = M()->exe($sql);
            return $result;
        }else{
            return false;
        }
    }
        
    /**
     * 取货品信息
     *
     * @access  public
     * @param   int         $product_id     货品id
     * @param   int         $filed          字段
     * @return  array
     */
    function get_product_info($product_id, $filed = ''){
        $db_prefix=C("DB_PREFIX");
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
        
        $sql = "SELECT $filed FROM  " . $db_prefix.'products' . " WHERE product_id = '$product_id'";
        $return_array = M()->getRowSql($sql);
    
        return $return_array;
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
        $db_prefix=C("DB_PREFIX");
        if ($goods_id){
            $sql = "UPDATE " . $db_prefix.'goods' .
                " SET $field = '$value' , last_update = '". gmtime() ."' " .
                "WHERE goods_id " . db_create_in($goods_id);
            return M()->exe($sql);
        }else{
            return false;
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
        $db_prefix=C("DB_PREFIX");
        $product_sn = trim($product_sn);
        $product_id = intval($product_id);
        if (strlen($product_sn) == 0)
        {
            return true;    //重复
        }
        $sql="SELECT goods_id FROM ". $db_prefix.'goods'." WHERE goods_sn='$product_sn'";
        if(M()->getOne($sql,'goods_id'))
        {
            return true;    //重复
        }
    
    
        if (empty($product_id))
        {
            $sql = "SELECT product_id FROM " . $db_prefix.'products' ."
                     WHERE product_sn = '$product_sn'";
        }
        else
        {
            $sql = "SELECT product_id FROM " . $db_prefix.'products' ."
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
     * 商品货号是否重复
     *
     * @param   string     $goods_sn        商品货号；请在传入本参数前对本参数进行SQl脚本过滤
     * @param   int        $goods_id        商品id；默认值为：0，没有商品id
     * @return  bool                        true，重复；false，不重复
     */
    function check_goods_sn_exist($goods_sn, $goods_id = 0){
        $db_prefix=C("DB_PREFIX");
        $goods_sn = trim($goods_sn);
        $goods_id = intval($goods_id);
        if (strlen($goods_sn) == 0)
        {
            return true;    //重复
        }
    
        if (empty($goods_id))
        {
            $sql = "SELECT goods_id FROM " . $db_prefix.'goods' ."
                    WHERE goods_sn = '$goods_sn'";
        }
        else
        {
            $sql = "SELECT goods_id FROM " . $db_prefix.'goods' ."
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
     * 商品的货品规格是否存在
     *
     * @param   string     $goods_attr        商品的货品规格
     * @param   string     $goods_id          商品id
     * @param   int        $product_id        商品的货品id；默认值为：0，没有货品id
     * @return  bool                          true，重复；false，不重复
     */
    public function check_goods_attr_exist($goods_attr, $goods_id, $product_id = 0)
    {
        $db_prefix=C("DB_PREFIX");
        $goods_id = intval($goods_id);
        if (strlen($goods_attr) == 0 || empty($goods_id))
        {
            return true;    //重复
        }
        if (empty($product_id)){
            $sql = "SELECT 
                        product_id 
                    FROM " . $db_prefix.'products' ."
                    WHERE goods_attr = '$goods_attr'
                    AND goods_id = '$goods_id'";
        }else
        {
            $sql = "SELECT product_id FROM " . $db_prefix.'products' ."
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
    public function handle_goods_attr($goods_id, $id_list, $is_spec_list, $value_price_list)
    {
        $db_prefix=C("DB_PREFIX");
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
            else{
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
            $sql = "SELECT 
                        goods_attr_id 
                    FROM " . $db_prefix.'goods_attr' . " 
                    WHERE 
                        goods_id = '$goods_id' AND 
                        attr_id = '$id' AND 
                        attr_value = '$value' LIMIT 0, 1";
            $result_id = M()->getOne($sql,'goods_attr_id');
            if (!empty($result_id))
            {
                $sql = "UPDATE " . $db_prefix.'goods_attr' . "
                            SET attr_value = '$value'
                            WHERE goods_id = '$goods_id'
                            AND attr_id = '$id'
                            AND goods_attr_id = '$result_id'";
                $goods_attr_id[$id] = $result_id;
            }else{
                $sql = "INSERT INTO " . $db_prefix.'goods_attr' . " (goods_id, attr_id, attr_value, attr_price) " .
                    "VALUES ('$goods_id', '$id', '$value', '$price')";
            }
            
            $insert_id=M()->exe($sql);
           // p($opid);
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
    public  function product_number_count($goods_id, $conditions = '')
    {
        $db_prefix=C("DB_PREFIX");
        if (empty($goods_id))
        {
            return -1;  //$goods_id不能为空
        }
    
        $sql = "SELECT SUM(product_number)
                FROM " . $db_prefix.'products' . "
                WHERE goods_id = '$goods_id'
                " . $conditions;
        $nums = M()->getOne($sql,'SUM(product_number)');
        $nums = empty($nums) ? 0 : $nums;
    
        return $nums;
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
        $db_prefix=C("DB_PREFIX");
        /* 过滤条件 */
        $param_str = '-' . $goods_id;
        $result = get_filter($param_str);
        //if ($result === false)
        if (true)
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
            $sql = "SELECT COUNT(*) FROM " .$db_prefix.'products'. " AS p WHERE goods_id = $goods_id $where";
            $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
            
            $sql = "SELECT product_id, goods_id, goods_attr, product_sn, product_number
                FROM " . $db_prefix.'products' . " AS g
                WHERE goods_id = $goods_id $where
                ORDER BY $filter[sort_by] $filter[sort_order]";
            $filter['keyword'] = stripslashes($filter['keyword']);
            
        }else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        $row = M()->query($sql);
        
        /* 处理规格属性 */
        $goods_attr = $this->product_goods_attr_list($goods_id);
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
        return array('product' => $row, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);

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
        $db_prefix=C("DB_PREFIX");
        if (empty($goods_id))
        {
            return array();  //$goods_id不能为空
        }
    
        $sql = "SELECT goods_attr_id, attr_value FROM " . $db_prefix.'goods_attr' . " WHERE goods_id = '$goods_id'";
        $results = M()->query($sql);
    
        $return_arr = array();
        foreach ($results as $value)
        {
            $return_arr[$value['goods_attr_id']] = $value['attr_value'];
        }
    
        return $return_arr;
    }
        
    /**
     * 获取商品类型中包含规格的类型列表
     *
     * @access  public
     * @return  array
     */
    public function get_goods_type_specifications()
    {
        $db_prefix=C("DB_PREFIX");
        // 查询
        $sql = "SELECT DISTINCT cat_id
                FROM " .$db_prefix.'attribute'. "
                WHERE attr_type = 1";
        $row = M()->query($sql);
    
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
     * 取指定规格的货品信息
     *
     * @access      public
     * @param       string      $goods_id
     * @param       array       $spec_goods_attr_id
     * @return      array
     */
    function get_products_info($goods_id, $spec_goods_attr_id)
    {
        $db_prefix=C("DB_PREFIX");
        $return_array = array();

        if (empty($spec_goods_attr_id) || !is_array($spec_goods_attr_id) || empty($goods_id))
        {
            return $return_array;
        }
        $goods_attr_array = sort_goods_attr_id_array($spec_goods_attr_id);
        if(isset($goods_attr_array['sort']))
        {
            $goods_attr = implode('|', $goods_attr_array['sort']);
    
            $sql = "SELECT * FROM " .$db_prefix.'products'. " WHERE goods_id = '$goods_id' AND goods_attr = '$goods_attr' LIMIT 0, 1";
            $return_array = M()->getRowSql($sql);
        }
        return $return_array;
        
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
        $db_prefix=C("DB_PREFIX");
        if (!empty($spec)){
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
            $sql = 'SELECT SUM(attr_price) AS attr_price FROM ' . $db_prefix.'goods_attr' . " WHERE $where";
            //p($sql);
            $price = floatval(M()->getOne($sql,'attr_price'));
        }else
        {
            $price = 0;
        }
        return $price;
    }
    
    /**
     * 获得商品的详细信息
     *
     * @access  public
     * @param   integer     $goods_id
     * @return  void
     */
    public function get_goods_info($goods_id)
    {
        $db_prefix=C("DB_PREFIX");
        $time = gmtime();
        $sql = 'SELECT 
                    g.*, c.measure_unit, 
                    b.brand_id, b.brand_name AS goods_brand, 
                    m.type_money AS bonus_money, ' .
                    'IFNULL(AVG(r.comment_rank), 0) AS comment_rank, ' .
                    "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS rank_price " .
                'FROM ' . 
                    $db_prefix.'goods' . ' AS g ' .
                    'LEFT JOIN ' . $db_prefix.'goods_category' . ' AS c ON g.cat_id = c.cat_id ' .
                    'LEFT JOIN ' . $db_prefix.'brand' . ' AS b ON g.brand_id = b.brand_id ' .
                    'LEFT JOIN ' . $db_prefix.'ec_comment' . ' AS r ON r.id_value = g.goods_id AND comment_type = 0 AND r.parent_id = 0 AND r.status = 1 ' .
                    'LEFT JOIN ' . $db_prefix.'bonus_type' . ' AS m ' . "ON g.bonus_type_id = m.type_id AND m.send_start_date <= '$time' AND m.send_end_date >= '$time'" .
                    " LEFT JOIN " . $db_prefix.'member_price' . " AS mp ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' ".
                "WHERE 
                    g.goods_id = '$goods_id' AND g.is_delete = 0 " .
                "GROUP BY g.goods_id";
        $row = M()->getOneRow($sql);
        //p($row);
        if(!empty($row)){
            /* 用户评论级别取整 */
            $row['comment_rank']  = ceil($row['comment_rank']) == 0 ? 5 : ceil($row['comment_rank']);
            /* 获得商品的销售价格 */
            $row['market_price']        = price_format($row['market_price']);
            $row['shop_price_formated'] = price_format($row['shop_price']);
        
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
            
            /* 修正积分：转换为可使用多少积分（原来是可以使用多少钱的积分） */
            $row['integral']      = C('ec_integral_scale') ? round($row['integral'] * 100 / C('ec_integral_scale')) : 0;

            
            /* 修正优惠券 */
            $row['bonus_money']   = ($row['bonus_money'] == 0) ? 0 : price_format($row['bonus_money'], false);
            
            /* 修正商品图片 */
            $row['goods_img']   = get_image_path($goods_id, $row['goods_img']);
            $row['goods_thumb'] = get_image_path($goods_id, $row['goods_thumb'], true);
            return $row;
        }else{
            return false;
        }
    }
    
    /**
     * 获得指定商品的相册
     *
     * @access  public
     * @param   integer     $goods_id
     * @return  array
     */
    public function get_goods_gallery($goods_id)
    {
        $db_prefix=C("DB_PREFIX");
        $sql = 'SELECT 
                    img_id, img_url, thumb_url, img_desc' .
                ' FROM ' . 
                        $db_prefix.'goods_gallery' .
                " WHERE goods_id = '$goods_id' LIMIT " . C('ec_goods_gallery_number');
        $row = M()->query($sql);
        if(!empty($row)){
            /* 格式化相册图片路径 */
            foreach($row as $key => $gallery_img)
            {
                $row[$key]['img_url'] = get_image_path($goods_id, $gallery_img['img_url'], false, 'gallery');
                $row[$key]['thumb_url'] = get_image_path($goods_id, $gallery_img['thumb_url'], true, 'gallery');
            }
        }
        return $row;
    }
    
    /**
     * 获得属性相同的商品
     *
     * @access  public
     * @param   array   $attr   // 包含了属性名称,ID的数组
     * @return  array
     */
    public function get_same_attribute_goods($attr)
    {
        $db_prefix=C("DB_PREFIX");
        $lnk = array();
        if (!empty($attr))
        {
            foreach ($attr['lnk'] AS $key => $val)
            {
                $lnk[$key]['title'] = sprintf('相同%s的商品', $val['name'], $val['value']);
                /* 查找符合条件的商品 */
                $sql = 'SELECT 
                            g.goods_id, g.goods_name, g.goods_thumb, g.goods_img, g.shop_price AS org_price, ' .
                            "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, ".
                            'g.market_price, g.promote_price, g.promote_start_date, g.promote_end_date ' .
                        'FROM ' . 
                            $db_prefix.'goods' . ' AS g ' .
                            'LEFT JOIN ' . $db_prefix.'goods_attr' . ' as a ON g.goods_id = a.goods_id ' .
                            "LEFT JOIN " . $db_prefix.'member_price' . " AS mp ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' ".
                        "WHERE 
                            a.attr_id = '$key' AND 
                            g.is_on_sale=1 AND 
                            a.attr_value = '$val[value]' AND 
                            g.goods_id <> '$_REQUEST[id]' " .
                    'LIMIT ' .C('ec_attr_related_number');
                $res =M()->query($sql);
                if(!empty($res)){
                    foreach ($res AS $row)
                    {
                        $lnk[$key]['goods'][$row['goods_id']]['goods_id']      = $row['goods_id'];
                        $lnk[$key]['goods'][$row['goods_id']]['goods_name']    = $row['goods_name'];
                        $goods_name_length=C('ec_goods_name_length');
                        $lnk[$key]['goods'][$row['goods_id']]['short_name']    = $goods_name_length > 0 ? sub_str($row['goods_name'], $goods_name_length) : $row['goods_name'];
                        $lnk[$key]['goods'][$row['goods_id']]['goods_thumb']     = (empty($row['goods_thumb'])) ? 'no_picture' : $row['goods_thumb'];
                        $lnk[$key]['goods'][$row['goods_id']]['market_price']  = price_format($row['market_price']);
                        $lnk[$key]['goods'][$row['goods_id']]['shop_price']    = price_format($row['shop_price']);
                        $lnk[$key]['goods'][$row['goods_id']]['promote_price'] = $this->bargain_price($row['promote_price'],$row['promote_start_date'], $row['promote_end_date']);
                        $lnk[$key]['goods'][$row['goods_id']]['url']           = ec_build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
                    }
                }
                 
                //p($sql);
            }
            //p($lnk);
            return $lnk;
        }
    }
    
    
    
    
    /**
     * 获得商品的属性和规格
     *
     * @access  public
     * @param   integer $goods_id
     * @return  array
     */
    public function get_goods_properties($goods_id){
        $db_prefix=C("DB_PREFIX");
        /* 对属性进行重新排序和分组 */
        $sql = "SELECT 
                    attr_group ".
                "FROM " . 
                    $db_prefix.'goods_type' . " AS gt, " . 
                    $db_prefix.'goods' . " AS g ".
                "WHERE 
                    g.goods_id='$goods_id' AND gt.cat_id=g.goods_type";
        $grp = M()->getOne($sql,'attr_group');
        if (!empty($grp))
        {
            $groups = explode("\n", strtr($grp, "\r", ''));
        }
        /* 获得商品的规格 */
        $sql = "SELECT 
                    a.attr_id, a.attr_name, a.attr_group, a.is_linked, a.attr_type, ".
                    "g.goods_attr_id, g.attr_value, g.attr_price " .
                'FROM ' . 
                    $db_prefix.'goods_attr' . ' AS g ' .
                    'LEFT JOIN ' . $db_prefix.'attribute' . ' AS a ON a.attr_id = g.attr_id ' .
                "WHERE 
                    g.goods_id = '$goods_id' " .
                    'ORDER BY a.sort_order, g.attr_price, g.goods_attr_id';
        $res = M()->query($sql); 
        $arr['pro'] = array();     // 属性
        $arr['spe'] = array();     // 规格
        $arr['lnk'] = array();     // 关联的属性
        //p($res);
        if(!empty($res)){
            foreach ($res AS $row)
            {
                $row['attr_value'] = str_replace("\n", '<br />', $row['attr_value']);
                
                if ($row['attr_type'] == 0)
                {
                    $group = (isset($groups[$row['attr_group']])) ? $groups[$row['attr_group']] : '商品屬性';
                    $arr['pro'][$group][$row['attr_id']]['name']  = $row['attr_name'];
                    $arr['pro'][$group][$row['attr_id']]['value'] = $row['attr_value'];
                }else
                {
                    //echo __FILE__.'---'.__METHOD__.'1';die;
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
                    //echo __FILE__.'---'.__METHOD__.'2';die;
                    /* 如果该属性需要关联，先保存下来 */
                    $arr['lnk'][$row['attr_id']]['name']  = $row['attr_name'];
                    $arr['lnk'][$row['attr_id']]['value'] = $row['attr_value'];
                }
            } 
        }
        return $arr;
    }
    
    
    /**
     * 获得指定商品的关联文章
     *
     * @access  public
     * @param   integer     $goods_id
     * @return  void
     */
    function get_linked_articles($goods_id)
    {
        $db_prefix=C("DB_PREFIX");
        $sql = 'SELECT 
                    a.article_id, a.title, a.file_url, a.open_type, a.add_time ' .
                'FROM ' . 
                    $db_prefix.'goods_article' . ' AS g, ' .
                    $db_prefix.'article' . ' AS a ' .
                "WHERE 
                    g.article_id = a.article_id AND g.goods_id = '$goods_id' AND a.is_open = 1 " .
                'ORDER BY a.add_time DESC';
        $res = M()->query($sql);
    
        $arr = array();
        if(empty($res)){
            return $arr;
        }else{
            foreach($res as $row){
                $row['url']         = $row['open_type'] != 1 ?
                ec_build_uri('article', array('aid'=>$row['article_id']), $row['title']) : trim($row['file_url']);
                $row['add_time']    = local_date(C('ec_date_format'), $row['add_time']);
                $row['short_title'] = C('ec_article_title_length') > 0 ?
                    sub_str($row['title'], C('ec_article_title_length')) : $row['title'];
        
                $arr[] = $row;
            }
        }
        return $arr;
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
        $db_prefix=C("DB_PREFIX");
        $sql = 'SELECT 
                    gg.parent_id, ggg.goods_name AS parent_name, gg.goods_id, gg.goods_price, g.goods_name, 
                    g.goods_thumb, g.goods_img, g.shop_price AS org_price, ' .
                    "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price ".
                'FROM ' . 
                    $db_prefix.'group_goods' . ' AS gg ' .
                    'LEFT JOIN ' . $db_prefix.'goods' . ' AS g ON g.goods_id = gg.goods_id ' .
                    "LEFT JOIN " . $db_prefix.'member_price' . " AS mp ON mp.goods_id = gg.goods_id AND mp.user_rank = '$_SESSION[user_rank]' ".
                    "LEFT JOIN " . $db_prefix.'goods' . " AS ggg ON ggg.goods_id = gg.parent_id ".
                "WHERE 
                    gg.parent_id " . db_create_in($goods_list) . " AND g.is_delete = 0 AND g.is_on_sale = 1 ".
                "ORDER BY gg.parent_id, gg.goods_id";
        $res = M()->query($sql);
        if(empty($res)){
            return $arr;
        }else{
            foreach($res as $row){
                $arr[$temp_index]['parent_id']         = $row['parent_id'];//配件的基本件ID
                $arr[$temp_index]['parent_name']       = $row['parent_name'];//配件的基本件的名称
                $arr[$temp_index]['parent_short_name'] = C('ec_goods_name_length') > 0 ?
                    sub_str($row['parent_name'], C('ec_goods_name_length')) : $row['parent_name'];//配件的基本件显示的名称
                $arr[$temp_index]['goods_id']          = $row['goods_id'];//配件的商品ID
                $arr[$temp_index]['goods_name']        = $row['goods_name'];//配件的名称
                $arr[$temp_index]['short_name']        = C('ec_goods_name_length') > 0 ?
                    sub_str($row['goods_name'], C('ec_goods_name_length')) : $row['goods_name'];//配件显示的名称
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
     * 获得指定商品相关的商品
     *
     * @access  public
     * @param   integer $goods_id
     * @return  array
     */
    public function get_linked_goods_detail($goods_id)
    {
        $db_prefix=C("DB_PREFIX");
        $sql = 'SELECT 
                    g.goods_id, g.goods_name, g.goods_thumb, g.goods_img, g.shop_price AS org_price, ' .
                    "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, ".
                    'g.market_price, g.promote_price, g.promote_start_date, g.promote_end_date ' .
                'FROM ' . 
                    $db_prefix.'link_goods' . ' lg ' .
                    'LEFT JOIN ' . $db_prefix.'goods' . ' AS g ON g.goods_id = lg.link_goods_id ' .
                    "LEFT JOIN " . $db_prefix.'member_price' . " AS mp ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' ".
                "WHERE 
                    lg.goods_id = '$goods_id' AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ".
                "LIMIT " .C('ec_related_goods_number');
        $res = M()->query($sql);
        $arr = array();
        if(empty($res)){
            return $arr;
        }else{
            foreach($res as $row){
                $arr[$row['goods_id']]['goods_id']     = $row['goods_id'];
                $arr[$row['goods_id']]['goods_name']   = $row['goods_name'];
                $arr[$row['goods_id']]['short_name']   = C('ec_goods_name_length')  > 0 ?
                    sub_str($row['goods_name'], C('ec_goods_name_length')) : $row['goods_name'];
                $arr[$row['goods_id']]['goods_thumb']  = get_image_path($row['goods_id'], $row['goods_thumb'], true);
                $arr[$row['goods_id']]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
                $arr[$row['goods_id']]['market_price'] = price_format($row['market_price']);
                $arr[$row['goods_id']]['shop_price']   = price_format($row['shop_price']);
                $arr[$row['goods_id']]['url']          = ec_build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']);
        
                if ($row['promote_price'] > 0)
                {
                    $arr[$row['goods_id']]['promote_price'] = $this->bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
                    $arr[$row['goods_id']]['formated_promote_price'] = price_format($arr[$row['goods_id']]['promote_price']);
                }
                else
                {
                    $arr[$row['goods_id']]['promote_price'] = 0;
                }
            }
        }
        return $arr;
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
        $db_prefix=C("DB_PREFIX");
        $brand_where = ($brand > 0) ? " AND g.brand_id = '$brand'" : '';
        $price_where = ($min > 0) ? " AND g.shop_price >= $min " : '';
        $price_where .= ($max > 0) ? " AND g.shop_price <= $max " : '';
        $sql =  'SELECT 
                    g.goods_id, g.goods_name, g.goods_name_style, 
                    g.market_price, g.shop_price AS org_price, g.promote_price, ' .
                    "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, ".
                    'promote_start_date, promote_end_date, g.goods_brief, g.goods_thumb, goods_img, b.brand_name ' .
                'FROM ' . $db_prefix.'goods' . ' AS g ' .
                        'LEFT JOIN ' . $db_prefix.'brand' . ' AS b ON b.brand_id = g.brand_id ' .
                        "LEFT JOIN " . $db_prefix.'member_price' . " AS mp ".
                        "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' ".
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
        $goodsCatModel=K('GoodsCat');
        if (!empty($cats))
        {
            $sql .= " AND (" . $cats . " OR " . $goodsCatModel->get_extension_goods($cats) .")";
        }
        $order_type =C('EC_RECOMMEND_ORDER');
        $sql .= ($order_type == 0) ? ' ORDER BY g.sort_order, g.last_update DESC' : ' ORDER BY RAND()';

        $res =  M()->query($sql." limit $num");
        
        $idx = 0;
        $goods = array();
        $goodsModel=K('Goods');
       // p($res);
        if(!empty($res)){
            foreach($res as $row){
                if ($row['promote_price'] > 0)
                {
                    $promote_price = $this->bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
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
                $goods[$idx]['short_name']   = C('EC_GOODS_NAME_LENGTH') > 0 ?
                                               sub_str($row['goods_name'], C('EC_GOODS_NAME_LENGTH')) : $row['goods_name'];
                $goods[$idx]['market_price'] = price_format($row['market_price']);
                $goods[$idx]['shop_price']   = price_format($row['shop_price']);
                $goods[$idx]['thumb']        = get_image_path($row['goods_id'], $row['goods_thumb'], true);
                $goods[$idx]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
                $goods[$idx]['url']          = ec_build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
        
                $goods[$idx]['short_style_name'] = $this->add_style($goods[$idx]['short_name'], $row['goods_name_style']);
                $idx++;
            }
        }
    
        return $goods;

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
        $sql = "SELECT goods_id, goods_name FROM " .$this->tableFull.
                " WHERE bonus_type_id = '$type_id'";
        $row = $this->query($sql);
    
        return $row;
    }
        
    
    /**
     * 获得促销商品
     *
     * @access  public
     * @return  array
     */
    public function get_promote_goods($cats = '')
    {
        $db_prefix=C("DB_PREFIX");
        $time = gmtime();
        $order_type = C('recommend_order');
        echo __FILE__.'---'.__METHOD__;
        /* 取得促销lbi的数量限制 */
        //$num = get_library_number("recommend_promotion");
    }
    
    
    
    /**
     * 调用当前分类的销售排行榜
     *
     * @access  public
     * @param   string  $cats   查询的分类
     * @return  array
     */
    public function get_top10($cats = '')
    {
        $db_prefix=C("DB_PREFIX");
        $goodsCatModel=K("GoodsCat");
        $cats = get_children($cats);
        $where = !empty($cats) ? "AND ($cats OR " . $goodsCatModel->get_extension_goods($cats) . ") " : '';
        
        /* 排行统计的时间 */
        switch (C('ec_top10_time'))
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
        $sql = 'SELECT 
                g.goods_id, g.goods_name, g.shop_price, g.goods_thumb, 
                SUM(og.goods_number) as goods_number ' .
                'FROM ' . $db_prefix.'goods' . ' AS g, ' .
                    $db_prefix.'order_info' . ' AS o, ' .
                    $db_prefix.'order_goods' . ' AS og ' .
           "WHERE 
                g.is_on_sale = 1 AND 
                g.is_alone_sale = 1 AND 
                g.is_delete = 0 
                $where $top10_time " ;
        //is_alone_sale 是否能单独销售，1，是；0，否；如果不能单独销售，则只能作为某商品的配件或者赠品销售
        //判断是否启用库存，库存数量是否大于0
        if (C('use_storage') == 1)
        {
            $sql .= " AND g.goods_number > 0 ";
        }
        $sql .= ' AND 
                    og.order_id = o.order_id AND 
                    og.goods_id = g.goods_id ' .
                    "AND 
                    (o.order_status = '" . OS_CONFIRMED .  "' OR o.order_status = '" . OS_SPLITED . "') " .
                    "AND 
                    (o.pay_status = '" . PS_PAYED . "' OR o.pay_status = '" . PS_PAYING . "') " .
                    "AND 
                    (o.shipping_status = '" . SS_SHIPPED . "' OR o.shipping_status = '" . SS_RECEIVED . "') " .
                    'GROUP BY 
                        g.goods_id 
                    ORDER BY 
                        goods_number DESC, g.goods_id DESC 
                    LIMIT ' . C('ec_top_number');
        $arr = M()->getAll($sql);
        for ($i = 0, $count = count($arr); $i < $count; $i++)
        {
            $arr[$i]['short_name'] = C('ec_goods_name_length') > 0 ?
                                        ec_sub_str($arr[$i]['goods_name'],  C('ec_goods_name_length')) : $arr[$i]['goods_name'];
            $arr[$i]['url']        = ec_build_uri('goods', array('gid' => $arr[$i]['goods_id']), $arr[$i]['goods_name']);
            $arr[$i]['thumb'] = get_image_path($arr[$i]['goods_id'], $arr[$i]['goods_thumb'],true);
            $arr[$i]['price'] = price_format($arr[$i]['shop_price']);
        }

        return $arr;
    }
        

    
    /**
     * 获得商品已添加的规格列表
     *
     * @access      public
     * @params      integer         $goods_id
     * @return      array
     */
    public function get_goods_specifications_list($goods_id)
    {
        $db_prefix=C("DB_PREFIX");
        if (empty($goods_id))
        {
            return array();  //$goods_id不能为空
        }
    
        $sql = "SELECT g.goods_attr_id, g.attr_value, g.attr_id, a.attr_name
                FROM " . $db_prefix.'goods_attr' . " AS g
                    LEFT JOIN " . $db_prefix.'attribute' . " AS a
                        ON a.attr_id = g.attr_id
                WHERE goods_id = '$goods_id'
                AND a.attr_type = 1
                ORDER BY g.attr_id ASC";
        $results = M()->getAll($sql);
    
        return $results;
    }

    
    
     /**
     * 检查单个商品是否存在规格
     *
     * @param   int        $goods_id          商品id
     * @return  bool                          true，存在；false，不存在
     */
    function check_goods_specifications_exist($goods_id)
    {
        $db_prefix=C("DB_PREFIX");
        $goods_id = intval($goods_id);
    
        $sql = "SELECT COUNT(a.attr_id)
                FROM " .$db_prefix.'attribute'. " AS a, " .$db_prefix.'goods'. " AS g
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
                $img_original = $this->reformat_image_name('gallery', $goods_id, $img_original, 'source');
                $img_url = $this->reformat_image_name('gallery', $goods_id, $img_url, 'goods');
                $thumb_url = $this->reformat_image_name('gallery_thumb', $goods_id, $thumb_url, 'thumb');
                $sql = "INSERT INTO " . $db_prefix.'goods_gallery' . " 
                (goods_id, img_url, img_desc, thumb_url, img_original) " .
                    "VALUES ('$goods_id', '$img_url', '$img_desc', '$thumb_url', '$img_original')";
                    //echo $sql.'<br/>';
                M()->exe($sql);
                /* 不保留商品原图的时候删除原图 */
                if ($proc_thumb && !C('ec_retain_original_img')&& !empty($img_original))
                {
                    M()->exe("UPDATE " . $db_prefix.'goods_gallery' . " SET img_original='' WHERE `goods_id`='{$goods_id}'");
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
                    $thumb_url = $this->reformat_image_name('gallery_thumb', $goods_id, $thumb_url, 'thumb');
                }
                if (!$proc_thumb)
                {
                    $thumb_url = htmlspecialchars($image_url);
                }
                /* 重新格式化图片名称 */
                $img_url = $img_original = htmlspecialchars($image_url);
                $sql = "INSERT INTO " . $db_prefix.'goods_gallery' . " 
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
    public function reformat_image_name($type, $goods_id, $source_img, $position='')
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
            if ($this->move_image_file(ROOT_PATH.$source_img, ROOT_PATH.$dir.'/'.$sub_dir.'/source_img/'.$img_name.$img_ext))
            {
                return $dir.'/'.$sub_dir.'/source_img/'.$img_name.$img_ext;
            }
        }
        elseif ($position == 'thumb')
        {
            if ($this->move_image_file(ROOT_PATH.$source_img, ROOT_PATH.$dir.'/'.$sub_dir.'/thumb_img/'.$img_name.$img_ext))
            {
                return $dir.'/'.$sub_dir.'/thumb_img/'.$img_name.$img_ext;
            }
        }
        else
        {
            if ($this->move_image_file(ROOT_PATH.$source_img, ROOT_PATH.$dir.'/'.$sub_dir.'/goods_img/'.$img_name.$img_ext))
            {
                return $dir.'/'.$sub_dir.'/goods_img/'.$img_name.$img_ext;
            }
        }
        return false;
    }
    
    
    public function move_image_file($source, $dest)
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
     * 为某商品生成唯一的货号
     * @param   int     $goods_id   商品编号
     * @return  string  唯一的货号
     */
    function generate_goods_sn($goods_id)
    {
        $db_prefix=C("DB_PREFIX");
        $goods_sn = C('ec_sn_prefix') . str_repeat('0', 6 - strlen($goods_id)) . $goods_id;
    
        $sql = "SELECT goods_sn FROM " . $db_prefix.'goods' .
                " WHERE goods_sn LIKE '" . mysql_like_quote($goods_sn) . "%' AND goods_id <> '$goods_id' " .
                " ORDER BY LENGTH(goods_sn) DESC";
               // echo $sql;die;
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
     * 获得商品的关联文章
     *
     * @access  public
     * @param   integer $goods_id
     * @return  array
     */
    public function get_goods_articles($goods_id)
    {
        $db_prefix=C("DB_PREFIX");
        $sql = "SELECT g.article_id, a.title " .
                "FROM " .$db_prefix.'goods_article' . " AS g, " .
                    $db_prefix.'article' . " AS a " .
                "WHERE g.goods_id = '$goods_id' " .
                "AND g.article_id = a.article_id ";
        if ($goods_id == 0)
        {
            $sql .= " AND g.admin_id = '$_SESSION[uid]'";
        }
        $row =  M()->getAll($sql);
    
        return $row;
    }
    
    /**
     * 获得指定商品的配件
     *
     * @access  public
     * @param   integer $goods_id
     * @return  array
     */
    public function get_group_goods($goods_id)
    {
        $db_prefix=C("DB_PREFIX");
        $sql = "SELECT gg.goods_id, CONCAT(g.goods_name, ' -- [', gg.goods_price, ']') AS goods_name " .
                "FROM " . $db_prefix.'group_goods' . " AS gg, " .
                    $db_prefix.'goods' . " AS g " .
                "WHERE gg.parent_id = '$goods_id' " .
                "AND gg.goods_id = g.goods_id ";
        if ($goods_id == 0)
        {
            $sql .= " AND gg.admin_id = '$_SESSION[uid]'";
        }
        $row = M()->getAll($sql);
    
        return $row;
    }

    
    /**
     * 获得指定商品相关的商品
     *
     * @access  public
     * @param   integer $goods_id
     * @return  array
     */
    public function get_linked_goods($goods_id)
    {
        $db_prefix=C("DB_PREFIX");
        $sql = "SELECT 
                    lg.link_goods_id AS goods_id, 
                    g.goods_name, 
                    lg.is_double " .
                "FROM " . $db_prefix.'link_goods' . " AS lg, " .
                    $db_prefix.'goods' . " AS g " .
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
     * 获得商品列表
     *
     * @access  public
     * @params  integer $isdelete
     * @params  integer $real_goods
     * @params  integer $conditions
     * @return  array
     */
    public function goods_list($is_delete, $real_goods=1, $conditions = '')
    {
        /* 过滤条件 */
        $param_str = '-' . $is_delete . '-' . $real_goods;
        $result = false;
        if ($result === false)
        {
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
            switch ($filter['intro_type'])
            {
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
            $sql = "SELECT COUNT(*) FROM " .$this->tableFull. " AS g WHERE is_delete='$is_delete' $where";
            //echo $sql;die;
            $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
            //echo 'aaa';die;
            /* 分页大小 */
            $filter = page_and_size($filter);
            //p($filter);die;
            $sql = "SELECT goods_id, goods_name, goods_type, goods_sn, shop_price, is_on_sale, is_best, is_new, is_hot, sort_order, goods_number, integral, " .
                        " (promote_price > 0 AND promote_start_date <= '$today' AND promote_end_date >= '$today') AS is_promote ".
                        " FROM " . $this->tableFull . " AS g WHERE is_delete='$is_delete' $where" .
                        " ORDER BY $filter[sort_by] $filter[sort_order] ".
                        " LIMIT " . $filter['start'] . ",$filter[page_size]";
            //echo $sql;
            $filter['keyword'] = stripslashes($filter['keyword']);
            //set_filter($filter, $sql, $param_str);
        }
        else
        {
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        $row = M()->getAll($sql);
    
        return array('goods' => $row, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
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
    public function goods_list_condition($is_delete, $real_goods=1, $conditions = '')
    {
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
            switch ($filter['intro_type'])
            {
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
            return $where;
        
    }
    
    /**
     * 根据属性数组创建属性的表单
     *
     * @access  public
     * @param   int     $cat_id     分类编号
     * @param   int     $goods_id   商品编号
     * @return  string
     */
    public function build_attr_html($cat_id, $goods_id = 0)
    {
        $attr = $this->get_attr_list($cat_id, $goods_id);
        $html = '<table width="100%" id="attrTable">';
        $spec = 0;
    
        foreach ($attr AS $key => $val)
        {
            $html .= "<tr><td class='label w150'>";
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
                $html .= '<option value="">' .'请选择'. '</option>';
    
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
        $html .= '</table>';
        return $html;
    }
        
    /**
     * 取得通用属性和某分类的属性，以及某商品的属性值
     * @param   int     $cat_id     分类编号
     * @param   int     $goods_id   商品编号
     * @return  array   规格与属性列表
     */
    public function get_attr_list($cat_id, $goods_id = 0)
    {
        $db_prefix=C('DB_PREFIX');
        if (empty($cat_id))
        {
            return array();
        }
    
        // 查询属性值及商品的属性值
        $sql = "SELECT a.attr_id, a.attr_name, a.attr_input_type, a.attr_type, a.attr_values, v.attr_value, v.attr_price ".
                "FROM " .$db_prefix.'attribute'. " AS a ".
                "LEFT JOIN " .$db_prefix.'goods_attr'. " AS v ".
                "ON v.attr_id = a.attr_id AND v.goods_id = '$goods_id' ".
                "WHERE a.cat_id = " . intval($cat_id) ." OR a.cat_id = 0 ".
                "ORDER BY a.sort_order, a.attr_type, a.attr_id, v.attr_price, v.goods_attr_id";
        $row = M()->getAll($sql);
    
        return $row;
    }
    
    /**
     * 取得商品列表：用于把商品添加到组合、关联类、赠品类
     * @param   object  $filters    过滤条件
     */
    public function get_goods_list($filter)
    {
        $db_prefix=C('DB_PREFIX');
        $filter->keyword = json_str_iconv($filter->keyword);
        $where = get_where_sql($filter); // 取得过滤条件
    
        /* 取得数据 */
        $sql = 'SELECT goods_id, goods_name, shop_price '.
               'FROM ' . $db_prefix.'goods' . ' AS g ' . $where .
               'LIMIT 50';
        $row = M()->getAll($sql);
    
        return $row;
    }
        
    /**
     * 获得推荐商品
     *
     * @access  public
     * @param   string      $type       推荐类型，可以是 best, new, hot
     * @return  array
     */
    public function get_recommend_goods($type = '', $cats = '')
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
            if (empty($data) )
            {
                $sql = 'SELECT 
                            g.goods_id, g.is_best, g.is_new, g.is_hot, g.is_promote, b.brand_name,g.sort_order ' .
                        ' FROM ' . $db_prefix.'goods' . ' AS g ' .
                        ' LEFT JOIN ' . $db_prefix.'brand' . ' AS b ON b.brand_id = g.brand_id ' .
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
                    "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, ".
                    "promote_start_date, promote_end_date, g.goods_brief, g.goods_thumb, g.goods_img, RAND() AS rnd " .
                'FROM ' . $db_prefix.'goods' . ' AS g ' .
                "LEFT JOIN " . $db_prefix.'member_price' . " AS mp ".
                "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' ";
        $type_merge = array_merge($type_array['new'], $type_array['best'], $type_array['hot']);
        $type_merge = array_unique($type_merge);
        $sql .= ' WHERE g.goods_id ' . db_create_in($type_merge);
        $sql .= ' ORDER BY g.sort_order, g.last_update DESC';
        $result=M()->query($sql);
        //p($result);die;
        foreach ($result AS $idx => $row)
        {
            if ($row['promote_price'] > 0)
            {
                $promote_price = $this->bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
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
            $goods[$idx]['goods_style_name']   = $this->add_style($row['goods_name'],$row['goods_name_style']);
            $ec_goods_name_length=C('EC_GOODS_NAME_LENGTH');
            $goods[$idx]['short_name']   = $ec_goods_name_length > 0 ?
                                               sub_str($row['goods_name'], $ec_goods_name_length) : $row['goods_name'];
            $goods[$idx]['short_style_name']   = $this->add_style($goods[$idx]['short_name'],$row['goods_name_style']);
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
        return $type_goods[$type];
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
    public function bargain_price($price, $start, $end)
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
    

}
?>