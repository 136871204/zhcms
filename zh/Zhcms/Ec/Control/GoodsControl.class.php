<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class GoodsControl extends PublicControl {
	//网站首页
	public function index() {
        $goods_id = isset($_REQUEST['id'])  ? intval($_REQUEST['id']) : 0;
        $goodsModel=K('Goods');
        $db_prefix=C("DB_PREFIX");
        
        $this->set_page_header_data();
        $this->set_category_tree_data();
        $this->set_goods_related_data();
        $this->set_goods_fittings_data();
        $this->set_goods_article_data();
        $this->set_goods_attrlinked_data();
        $this->set_goods_tags_data();
        $this->set_bought_goods_data();
        
        /* 获得商品的信息 */
        $goods = $goodsModel->get_goods_info($goods_id);
        if ($goods === false)
        {
            /* 如果没有找到任何记录则跳回到首页 */
            exit;
        }else
        {
            if ($goods['brand_id'] > 0)
            {
                $goods['goods_brand_url'] = ec_build_uri('brand', array('bid'=>$goods['brand_id']), $goods['goods_brand']);
            }
            $shop_price   = $goods['shop_price'];
            $goods['goods_style_name'] = $goodsModel->add_style($goods['goods_name'], $goods['goods_name_style']);
        }

        $this->assign('goods',              $goods);
        $this->assign('pictures',            $goodsModel->get_goods_gallery($goods_id));                    // 商品相册
        $this->assign('rank_prices',         $this->get_user_rank_prices($goods_id, $shop_price));    // 会员等级价格
        $volume_price_list = get_volume_price_list($goods['goods_id'], '1');
        $this->assign('volume_price_list',$volume_price_list);    // 商品优惠价格区间
        
        /* 上一个商品下一个商品 */
        $this->setPrevGood($goods);
        $this->setNextGood($goods);
        $this->assign('id',           $goods_id);
        $this->assign('helps',        get_shop_help()); // 网店帮助
        $links = index_get_links();
        $this->assign('img_links',       $links['img']);
        $this->assign('txt_links',       $links['txt']);
        $this->assign('goods_id',           $goods['goods_id']);
        //获取关联礼包
        //$package_goods_list = get_package_goods_list($goods['goods_id']);
        //$smarty->assign('package_goods_list',$package_goods_list);    // 获取关联礼包
        
        //$this->assign('promotion',       get_promotion_info($goods_id));//促销信息
        
        $this->display();
	}
    
    
    public function price(){
        $json   = new JSON;
        $res    = array('err_msg' => '', 'result' => '', 'qty' => 1);
        $goods_id = isset($_REQUEST['id'])  ? intval($_REQUEST['id']) : 0;
        $attr_id    = isset($_REQUEST['attr']) ? explode(',', $_REQUEST['attr']) : array();
        $number     = (isset($_REQUEST['number'])) ? intval($_REQUEST['number']) : 1;
        if ($goods_id == 0)
        {
            $res['err_msg'] = '没有找到指定的商品或者没有找到指定的商品属性。';
            $res['err_no']  = 1;
        }else
        {
            if ($number == 0)
            {
                $res['qty'] = $number = 1;
            }else
            {
                $res['qty'] = $number;
            }
            $shop_price  = get_final_price($goods_id, $number, true, $attr_id);
            $res['result'] = price_format($shop_price * $number);
        }
        die($json->encode($res));
    }
    
    public function set_bought_goods_data(){
        $goods_id = isset($_REQUEST['id'])  ? intval($_REQUEST['id']) : 0;
        $this->assign('bought_goods',        $this->get_also_bought($goods_id));                      // 购买了该商品的用户还购买了哪些商品
    }
    /**
     * 获得购买过该商品的人还买过的商品
     *
     * @access  public
     * @param   integer     $goods_id
     * @return  array
     */
    public function get_also_bought($goods_id){
        $db_prefix=C("DB_PREFIX");
        $goodsModel=K('Goods');
        $sql = 'SELECT 
                    COUNT(b.goods_id ) AS num, 
                    g.goods_id, g.goods_name, g.goods_thumb, g.goods_img, g.shop_price, g.promote_price, g.promote_start_date, 
                    g.promote_end_date ' .
                'FROM ' . 
                    $db_prefix.'order_goods' . ' AS a ' .
                    'LEFT JOIN ' . $db_prefix.'order_goods' . ' AS b ON b.order_id = a.order_id ' .
                    'LEFT JOIN ' . $db_prefix.'goods' . ' AS g ON g.goods_id = b.goods_id ' .
                "WHERE 
                    a.goods_id = '$goods_id' AND 
                    b.goods_id <> '$goods_id' AND 
                    g.is_on_sale = 1 AND 
                    g.is_alone_sale = 1 AND 
                    g.is_delete = 0 " .
            'GROUP BY b.goods_id ' .
            'ORDER BY num DESC ' .
            'LIMIT ' . C('ec_bought_goods');
        $res = M()->query($sql);
        $key = 0;
        $arr = array();
        if(!empty($res)){
            foreach($res as $row){
                $arr[$key]['goods_id']    = $row['goods_id'];
                $arr[$key]['goods_name']  = $row['goods_name'];
                $goods_name_length=C('ec_goods_name_length');
                $arr[$key]['short_name']  = $goods_name_length > 0 ?
                    sub_str($row['goods_name'], $goods_name_length) : $row['goods_name'];
                $arr[$key]['goods_thumb'] = get_image_path($row['goods_id'], $row['goods_thumb'], true);
                $arr[$key]['goods_img']   = get_image_path($row['goods_id'], $row['goods_img']);
                $arr[$key]['shop_price']  = price_format($row['shop_price']);
                $arr[$key]['url']         = ec_build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']);
        
                if ($row['promote_price'] > 0)
                {
                    $arr[$key]['promote_price'] = $goodsModel->bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
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
    
    public function set_goods_tags_data(){
        $goods_id = isset($_REQUEST['id'])  ? intval($_REQUEST['id']) : 0;
        //获取tag
        $tag_array = get_tags($goods_id);
        $this->assign('tags',                $tag_array);                                       // 商品的标记
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
        $db_prefix=C("DB_PREFIX");
        $sql = "SELECT 
                    rank_id, 
                    IFNULL(mp.user_price, r.discount * $shop_price / 100) AS price, 
                    r.rank_name, 
                    r.discount " .
                'FROM ' . 
                    $db_prefix.'ec_user_rank' . ' AS r ' .
                    'LEFT JOIN ' . $db_prefix.'member_price' . " AS mp ON mp.goods_id = '$goods_id' AND mp.user_rank = r.rank_id " .
                "WHERE 
                    r.show_price = 1 OR r.rank_id = '$_SESSION[user_rank]'";
        $res = M()->query($sql);
        $arr = array();
        if(!empty($res)){
            foreach($res as $row){
                $arr[$row['rank_id']] = array(
                            'rank_name' => htmlspecialchars($row['rank_name']),
                            'price'     => price_format($row['price']));
            }
        }
    
        return $arr;
    }
    
    public function setNextGood($goods){
        $db_prefix=C("DB_PREFIX");
        /* 上一个商品下一个商品 */
        $next_gid = M()->getOne("SELECT 
                                    max(goods_id) 
                                FROM " . $db_prefix.'goods' . " 
                                WHERE 
                                    cat_id=".$goods['cat_id']." AND 
                                    goods_id < ".$goods['goods_id'] . " AND 
                                    is_on_sale = 1 AND 
                                    is_alone_sale = 1 AND 
                                    is_delete = 0",'max(goods_id)');
        
        if (!empty($next_gid))
        {
            $next_good['url'] = ec_build_uri('goods', array('gid' => $next_gid), $goods['goods_name']);
            $this->assign('next_good', $next_good);//下一个商品
        }
    }
    
    public function setPrevGood($goods){
        $db_prefix=C("DB_PREFIX");
        /* 上一个商品下一个商品 */
        $prev_gid = M()->getOne("SELECT 
                                    goods_id 
                                FROM " .
                                    $db_prefix.'goods'. " 
                                WHERE 
                                    cat_id=" . $goods['cat_id'] . " AND 
                                    goods_id > " . $goods['goods_id'] . " AND 
                                    is_on_sale = 1 AND 
                                    is_alone_sale = 1 AND 
                                    is_delete = 0 LIMIT 1",'goods_id');
        if (!empty($prev_gid))
        {
            $prev_good['url'] = ec_build_uri('goods', array('gid' => $prev_gid), $goods['goods_name']);
            $this->assign('prev_good', $prev_good);//上一个商品
        }
    }
    
    public function set_page_header_data(){
        $this->assign('navigator_list',        get_navigator());
        $goodsCategoryModel=K("GoodsCategory");
        $this->assign('category_list', $goodsCategoryModel->cat_list(0, 0, true,  2, false));
    }
    
    public function set_category_tree_data(){
        $goodsCategoryModel=K("GoodsCategory");
        $this->assign('categories',     $goodsCategoryModel->get_categories_tree()); // 分类树
    }
    
    public function set_goods_related_data(){
        $goods_id = isset($_REQUEST['id'])  ? intval($_REQUEST['id']) : 0;
        $goodsModel=K('Goods');
        $linked_goods = $goodsModel->get_linked_goods_detail($goods_id);
        $this->assign('related_goods',       $linked_goods);    
    }
    
    public function set_goods_fittings_data(){
        $goods_id = isset($_REQUEST['id'])  ? intval($_REQUEST['id']) : 0;
        $goodsModel=K('Goods');
        $this->assign('fittings',            $goodsModel->get_goods_fittings(array($goods_id)));                   // 配件
    }
    
    public function set_goods_article_data(){
        $goods_id = isset($_REQUEST['id'])  ? intval($_REQUEST['id']) : 0;
        $goodsModel=K('Goods');
        $this->assign('goods_article_list',  $goodsModel->get_linked_articles($goods_id));                  // 关联文章
    }
	
    
    public function set_goods_attrlinked_data(){
        $goods_id = isset($_REQUEST['id'])  ? intval($_REQUEST['id']) : 0;
        $goodsModel=K('Goods');
        $properties = $goodsModel->get_goods_properties($goods_id);  // 获得商品的规格和属性
        $this->assign('properties',          $properties['pro']);                              // 商品属性
        $this->assign('specification',       $properties['spe']);                              // 商品规格
        $this->assign('attribute_linked',    $goodsModel->get_same_attribute_goods($properties));           // 相同属性的关联商品
        
    }
    
}
