<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcGoodsControl extends EcControl {
    
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
        //echo 'aaa';die;
    }
    
    public function index(){
        header("Content-type:text/html;charset=utf-8");
        $ecs=$GLOBALS['ec_globals']['ecs'];
        $goods_id = isset($_REQUEST['id'])  ? intval($_REQUEST['id']) : 0;
        
        /*------------------------------------------------------ */
        //-- 改变属性、数量时重新计算商品价格
        /*------------------------------------------------------ */
        
        if (!empty($_REQUEST['act']) && $_REQUEST['act'] == 'price')
        {
            $json   = new Json;
            $res    = array('err_msg' => '', 'result' => '', 'qty' => 1);
            
            $attr_id    = isset($_REQUEST['attr']) ? explode(',', $_REQUEST['attr']) : array();
            $number     = (isset($_REQUEST['number'])) ? intval($_REQUEST['number']) : 1;
            
            if ($goods_id == 0)
            {
                $res['err_msg'] = '指定した商品或いは指定した商品属性を見つかりません。';
                $res['err_no']  = 1;
            }
            else
            {
                if ($number == 0)
                {
                    $res['qty'] = $number = 1;
                }
                else
                {
                    $res['qty'] = $number;
                }
        
                $shop_price  = get_final_price($goods_id, $number, true, $attr_id);
                $res['result'] = price_format($shop_price * $number);
            }
            //echo 'aaa';die;
            die($json->encode($res));
    
        }
        
        $affiliate['on']=1;
        $this->assign('affiliate', $affiliate);
        
        $this->assign('id',           $goods_id);
        $this->assign('type',         0);
    
        /* 获得商品的信息 */
        $goods = get_goods_info($goods_id);
        
        if ($goods === false)
        {
            /* 如果没有找到任何记录则跳回到首页 */
            ec_header("Location: ".U('ec/EcIndex/index')."\n");
            exit;
        }else
        {
            if ($goods['brand_id'] > 0)
            {
                $goods['goods_brand_url'] = ec_build_uri('brand', array('bid'=>$goods['brand_id']), $goods['goods_brand']);
            }
            $shop_price   = $goods['shop_price'];
            $linked_goods = $this->get_linked_goods($goods_id);
            //p($linked_goods);die;
        }
    
        $catlist = array();
        foreach(get_parent_cats($goods['cat_id']) as $k=>$v)
        {
            $catlist[] = $v['cat_id'];
        }
        
        $this -> assign_template('c', $catlist);
        /* 上一个商品下一个商品 */
        $prev_gid = M()->getOne("SELECT goods_id FROM " .$ecs->table('ec_goods'). " WHERE cat_id=" . $goods['cat_id'] . " AND goods_id > " . $goods['goods_id'] . " AND is_on_sale = 1 AND is_alone_sale = 1 AND is_delete = 0 LIMIT 1",'goods_id');
        if (!empty($prev_gid))
        {
            $prev_good['url'] = ec_build_uri('goods', array('gid' => $prev_gid), $goods['goods_name']);
            $this->assign('prev_good', $prev_good);//上一个商品
        }

        $next_gid = M()->getOne("SELECT max(goods_id) as goods_id FROM " . $ecs->table('ec_goods') . " WHERE cat_id=".$goods['cat_id']." AND goods_id < ".$goods['goods_id'] . " AND is_on_sale = 1 AND is_alone_sale = 1 AND is_delete = 0",'goods_id');
        if (!empty($next_gid))
        {
            $next_good['url'] = ec_build_uri('goods', array('gid' => $next_gid), $goods['goods_name']);
            $this->assign('next_good', $next_good);//下一个商品
        }
        
        
        $position = assign_ur_here($goods['cat_id'], $goods['goods_name']);

        /* current position */
        $this->assign('page_title',          $position['title']);                    // 页面标题
        $this->assign('ur_here',             $position['ur_here']);                  // 当前位置
        
        $goods['goods_style_name'] = add_style($goods['goods_name'], $goods['goods_name_style']);
        /* 购买该商品可以得到多少钱的红包 */
        if ($goods['bonus_type_id'] > 0)
        {
            $time = gmtime();
            $sql = "SELECT type_money FROM " . $ecs->table('ec_bonus_type') .
                    " WHERE type_id = '$goods[bonus_type_id]' " .
                    " AND send_type = '" . SEND_BY_GOODS . "' " .
                    " AND send_start_date <= '$time'" .
                    " AND send_end_date >= '$time'";
            $goods['bonus_money'] = floatval(M()->getOne($sql,'type_money'));
            if ($goods['bonus_money'] > 0)
            {
                $goods['bonus_money'] = price_format($goods['bonus_money']);
            }
        }



        $this->assign('goods',              $goods);
        $this->assign('goods_id',           $goods['goods_id']);
        $this->assign('promote_end_time',   $goods['gmt_end_time']);
        //$this->assign('enabled_captcha',   true);
        if(true)
        {
            $this->assign('enabled_captcha', 1);
            $this->assign('rand', mt_rand());
        }
        $this->assign('categories',         get_categories_tree($goods['cat_id']));  // 分类树
        $this->assign('pictures',            get_goods_gallery($goods_id));                    // 商品相册
        $promotion=get_promotion_info($goods_id);
        //p($promotion);die;
        $this->assign('promotion',       get_promotion_info($goods_id));//促销信息
        
        //获取tag
        $tag_array = get_tags($goods_id);
        $this->assign('tags',                $tag_array);                                       // 商品的标记
        
        
        //获取关联礼包
        $package_goods_list = $this->get_package_goods_list($goods['goods_id']);
        $this->assign('package_goods_list',$package_goods_list);    // 获取关联礼包
        
        $volume_price_list = get_volume_price_list($goods['goods_id'], '1');
        $this->assign('volume_price_list',$volume_price_list);    // 商品优惠价格区间
        $this->assign('rank_prices',         $this->get_user_rank_prices($goods_id, $shop_price));    // 会员等级价格
        $properties = get_goods_properties($goods_id);  // 获得商品的规格和属性
        $this->assign('properties',          $properties['pro']);                              // 商品属性
        $this->assign('related_goods',       $linked_goods);                                   // 关联商品
        $this->assign('specification',       $properties['spe']);                              // 商品规格
        $this->assign('goods_article_list',  $this->get_linked_articles($goods_id));                  // 关联文章
        $this->assign('fittings',            get_goods_fittings(array($goods_id)));                   // 配件
        $this->assign('attribute_linked',    get_same_attribute_goods($properties));           // 相同属性的关联商品
        $this->assign('bought_goods',        get_also_bought($goods_id));                      // 购买了该商品的用户还购买了哪些商品
        
        
        /* 更新点击次数 */
        M()->exe('UPDATE ' . $ecs->table('ec_goods') . " SET click_count = click_count + 1 WHERE goods_id = '$_REQUEST[id]'");

        $current_form['current_app']=APP;
        $current_form['current_control']=CONTROL;
        $current_form['current_meth']='index';
        $this->assign('current_form', $current_form);
        $this->assign('now_time',  gmtime());           // 当前系统时间
        $this -> display('template/' . C('WEB_STYLE') . '/ec/goods.html');
    }
    
    /**
     * 获得指定商品的关联文章
     *
     * @access  public
     * @param   integer     $goods_id
     * @return  void
     */
    public function get_linked_articles($goods_id)
    {
        $sql = 'SELECT a.article_id, a.title, a.file_url, a.open_type, a.add_time ' .
                'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods_article') . ' AS g, ' .
                    $GLOBALS['ec_globals']['ecs']->table('ec_article') . ' AS a ' .
                "WHERE g.article_id = a.article_id AND g.goods_id = '$goods_id' AND a.is_open = 1 " .
                'ORDER BY a.add_time DESC';
        $res = M()->query($sql);
    
        $arr = array();
        if(!empty($res))
        {
            $ec_article_title_length=C('ec_article_title_length');
            foreach($res as $row)
            {
                $row['url']         = $row['open_type'] != 1 ?
                ec_build_uri('article', array('aid'=>$row['article_id']), $row['title']) : trim($row['file_url']);
                $row['add_time']    = local_date(C('ec_date_format'), $row['add_time']);
                $row['short_title'] = $ec_article_title_length > 0 ?
                    sub_str($row['title'], $ec_article_title_length) : $row['title'];
        
                $arr[] = $row;
            }
        }
    
        return $arr;
    }


    
    /**
     * 获得指定商品的关联商品
     *
     * @access  public
     * @param   integer     $goods_id
     * @return  array
     */
    public function get_linked_goods($goods_id)
    {
        $sql = 'SELECT g.goods_id, g.goods_name, g.goods_thumb, g.goods_img, g.shop_price AS org_price, ' .
                "IFNULL(mp.user_price, g.shop_price * '$_SESSION[ec_discount]') AS shop_price, ".
                'g.market_price, g.promote_price, g.promote_start_date, g.promote_end_date ' .
                'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_link_goods') . ' lg ' .
                        'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . ' AS g ON g.goods_id = lg.link_goods_id ' .
                        "LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . " AS mp ".
                                "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[ec_user_rank]' ".
                "WHERE lg.goods_id = '$goods_id' AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ".
                "LIMIT " .C('ec_related_goods_number') ;
        $res = M()->query($sql);
        //p($sql);die;
        $arr = array();
        if(!empty($res))
        {
            $ec_goods_name_length=C('ec_goods_name_length');
            foreach($res as $row)
            {
                $arr[$row['goods_id']]['goods_id']     = $row['goods_id'];
                $arr[$row['goods_id']]['goods_name']   = $row['goods_name'];
                $arr[$row['goods_id']]['short_name']   = $ec_goods_name_length > 0 ?
                    sub_str($row['goods_name'], $ec_goods_name_length) : $row['goods_name'];
                $arr[$row['goods_id']]['goods_thumb']  = get_image_path($row['goods_id'], $row['goods_thumb'], true);
                $arr[$row['goods_id']]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
                $arr[$row['goods_id']]['market_price'] = price_format($row['market_price']);
                $arr[$row['goods_id']]['shop_price']   = price_format($row['shop_price']);
                $arr[$row['goods_id']]['url']          = ec_build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']);
        
                if ($row['promote_price'] > 0)
                {
                    $arr[$row['goods_id']]['promote_price'] = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
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
     * 取得跟商品关联的礼包列表
     *
     * @param   string  $goods_id    商品编号
     *
     * @return  礼包列表
     */
    public function get_package_goods_list($goods_id)
    {
        $now = gmtime();
        $sql = "SELECT pg.goods_id, ga.act_id, ga.act_name, ga.act_desc, ga.goods_name, ga.start_time,
                       ga.end_time, ga.is_finished, ga.ext_info
                FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods_activity') . " AS ga, " . 
                        $GLOBALS['ec_globals']['ecs']->table('ec_package_goods') . " AS pg
                WHERE pg.package_id = ga.act_id
                AND ga.start_time <= '" . $now . "'
                AND ga.end_time >= '" . $now . "'
                AND pg.goods_id = " . $goods_id . "
                GROUP BY ga.act_id
                ORDER BY ga.act_id ";
        $res = M()->getAll($sql);
        if(!empty($res))
        {
            foreach ($res as $tempkey => $value)
            {
                $subtotal = 0;
                $row = unserialize($value['ext_info']);
                unset($value['ext_info']);
                if ($row)
                {
                    foreach ($row as $key=>$val)
                    {
                        $res[$tempkey][$key] = $val;
                    }
                }
                $sql = "SELECT pg.package_id, pg.goods_id, pg.goods_number, pg.admin_id, p.goods_attr, g.goods_sn, g.goods_name, g.market_price, g.goods_thumb, IFNULL(mp.user_price, g.shop_price * '$_SESSION[ec_discount]') AS rank_price
                        FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_package_goods') . " AS pg
                            LEFT JOIN ". $GLOBALS['ec_globals']['ecs']->table('ec_goods') . " AS g
                                ON g.goods_id = pg.goods_id
                            LEFT JOIN ". $GLOBALS['ec_globals']['ecs']->table('ec_products') . " AS p
                                ON p.product_id = pg.product_id
                            LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . " AS mp
                                ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[ec_user_rank]'
                        WHERE pg.package_id = " . $value['act_id']. "
                        ORDER BY pg.package_id, pg.goods_id";
                $goods_res = M()->getAll($sql);
                if(!empty($goods_res))
                {
                    foreach($goods_res as $key => $val)
                    {
                        $goods_id_array[] = $val['goods_id'];
                        $goods_res[$key]['goods_thumb']  = get_image_path($val['goods_id'], $val['goods_thumb'], true);
                        $goods_res[$key]['market_price'] = price_format($val['market_price']);
                        $goods_res[$key]['rank_price']   = price_format($val['rank_price']);
                        $subtotal += $val['rank_price'] * $val['goods_number'];
                    }
                }
                
                /* 取商品属性 */
                $sql = "SELECT ga.goods_attr_id, ga.attr_value
                        FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_goods_attr'). " AS ga, " .
                                $GLOBALS['ec_globals']['ecs']->table('ec_attribute'). " AS a
                        WHERE a.attr_id = ga.attr_id
                        AND a.attr_type = 1
                        AND " . db_create_in($goods_id_array, 'goods_id');
                $result_goods_attr = M()->getAll($sql);
                
                $_goods_attr = array();
                if(!empty($result_goods_attr))
                {
                    foreach ($result_goods_attr as $value)
                    {
                        $_goods_attr[$value['goods_attr_id']] = $value['attr_value'];
                    }
                }
                
                
                /* 处理货品 */
                $format = '[%s]';
                foreach($goods_res as $key => $val)
                {
                    if ($val['goods_attr'] != '')
                    {
                        $goods_attr_array = explode('|', $val['goods_attr']);
        
                        $goods_attr = array();
                        foreach ($goods_attr_array as $_attr)
                        {
                            $goods_attr[] = $_goods_attr[$_attr];
                        }
        
                        $goods_res[$key]['goods_attr_str'] = sprintf($format, implode('，', $goods_attr));
                    }
                }
                $res[$tempkey]['goods_list']    = $goods_res;
                $res[$tempkey]['subtotal']      = price_format($subtotal);
                $res[$tempkey]['saving']        = price_format(($subtotal - $res[$tempkey]['package_price']));
                $res[$tempkey]['package_price'] = price_format($res[$tempkey]['package_price']);
        
            }
        }
        return $res;
    }
    
    /**
     * 获得指定商品的各会员等级对应的价格
     *
     * @access  public
     * @param   integer     $goods_id
     * @return  array
     */
    public function get_user_rank_prices($goods_id, $shop_price)
    {
        $sql = "SELECT rank_id, IFNULL(mp.user_price, r.discount * $shop_price / 100) AS price, r.rank_name, r.discount " .
                'FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_user_rank') . ' AS r ' .
                    'LEFT JOIN ' . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . " AS mp ".
                    "ON mp.goods_id = '$goods_id' AND mp.user_rank = r.rank_id " .
                "WHERE r.show_price = 1 OR r.rank_id = '$_SESSION[ec_user_rank]'";
        $res = M()->query($sql);
    
        $arr = array();
        if(!empty($res))
        {
            foreach($res as $row)
            {
                $arr[$row['rank_id']] = array(
                            'rank_name' => htmlspecialchars($row['rank_name']),
                            'price'     => price_format($row['price']));
            }
        }
    
        return $arr;
    }
	
}
