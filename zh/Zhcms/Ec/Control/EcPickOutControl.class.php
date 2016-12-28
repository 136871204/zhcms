<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcPickOutControl extends EcControl {
    
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
        //echo 'aaa';die;
    }
    
    public function index(){
        //header("Content-type:text/html;charset=utf-8");
        $ecs=$GLOBALS['ec_globals']['ecs'];
        
        $condition = array();
        $picks = array();
        $cat_id = !empty($_GET['cat_id']) ? intval($_GET['cat_id']) : 0;
        if (!empty($_GET['attr']))
        {
            echo 'TODO:EcPickOutControl--1';die;
        }
        
        if (empty($cat_id))
        {
            /* 获取所有符合条件的商品类型 */
            $sql = "SELECT DISTINCT t.cat_id, t.cat_name " .
                    "FROM " . $ecs->table('ec_goods_type') . " AS t, " . $ecs->table('ec_attribute') . " AS a, " . $ecs->table('ec_goods_attr') . " AS g " .
                    "WHERE t.cat_id = a.cat_id AND a.attr_id = g.attr_id AND t.enabled = 1";
            $rs = M()->query($sql);
            
            $in_cat   = array();
            $cat_name = array();
            $in_goods = '';
            if(!empty($rs))
            {
                foreach($rs as $row)
                {
                    $condition[$row['cat_id']]['name'] = $row['cat_name'];
                    $in_cat[] = $row['cat_id'];
                }
            }
            $in_cat = "AND a.cat_id ".db_create_in($in_cat);
            /* 获取符合条件的属性 */
            $sql = "SELECT DISTINCT a.attr_id ".
                    "FROM ".$ecs->table('ec_goods_attr')." AS g, ".$ecs->table('ec_attribute') ." AS a ".
                    "WHERE a.attr_id = g.attr_id " . $in_cat;
            $in_attr = M()->getCol($sql,'attr_id'); //符合条件attr_id;
            $in_attr = 'AND g.attr_id '.db_create_in($in_attr);
            
            /* 获取所有属性值 */
            $sql = "SELECT DISTINCT g.attr_id, a.attr_name, a.cat_id, g.attr_value".
                    " FROM ".$ecs->table('ec_goods_attr')." AS g, ".
                        $ecs->table('ec_attribute') ." AS a".
                    " WHERE a.attr_id = g.attr_id ".$in_attr." ORDER BY cat_id";
            $rs = M()->query($sql);
            if(!empty($rs))
            {
                foreach($rs as $row)
                {
                    if (empty($condition[$row['cat_id']]['cat'][$row['attr_id']]['cat_name']))
                    {
                        $condition[$row['cat_id']]['cat'][$row['attr_id']]['cat_name'] = $row['attr_name'];
                    }
                    $condition[$row['cat_id']]['cat'][$row['attr_id']]['list'][] =  array('name'=>$row['attr_value'], 
                                                                                        'url'=>'pick_out.php?cat_id='.$row['cat_id'].'&amp;attr['.$row['attr_id'].']='.urlencode($row['attr_value']));
                }
            }
            
            /* 获取商品总数 */
            $goods_count = M()->GetOne("SELECT COUNT(DISTINCT(goods_id)) as cnt FROM " . $ecs->table('ec_goods_attr'),'cnt');
            /* 获取符合条件的商品id */
            $sql = "SELECT DISTINCT goods_id FROM " .$ecs->table('ec_goods_attr');
            $in_goods = M()->GetCol($sql,'goods_id');
            $in_goods = 'AND g.goods_id ' . db_create_in(implode(',', $in_goods));
            $url = "search.php?pickout=1";

        }
        else
        {
            echo 'TODO:EcPickOutControl--2';die;
        }
        /* 显示商品 */
        $goods = array();

        $sql   = "SELECT g.goods_id, g.goods_name, g.market_price, g.shop_price AS org_price, ".
                    "IFNULL(mp.user_price, g.shop_price * '$_SESSION[ec_discount]') AS shop_price, ".
                    "g.promote_price, promote_start_date, promote_end_date, g.goods_brief, g.goods_thumb ".
                "FROM " .$ecs->table('ec_goods'). " AS g ".
                "LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . " AS mp ".
                    "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[ec_user_rank]' ".
                "WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ".$in_goods.
                "ORDER BY g.sort_order, g.last_update DESC";
        $res = M()->SelectLimit($sql, 4);
        
        /* 获取品牌 */
        $sql = "SELECT b.brand_id, b.brand_name, b.brand_logo, COUNT(g.goods_id) AS goods_num ".
               " FROM " . $ecs->table('ec_goods') . " AS g ".
               " LEFT JOIN " . $ecs->table('ec_brand') . " AS b ON g.brand_id=b.brand_id ".
               " WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 AND b.brand_id > 0 " . $in_goods .
               " GROUP BY g.brand_id ";
        $brand_list = M()->getAll($sql); 
        if(!empty($brand_list))
        {     
            foreach ($brand_list as $key=>$val)
            {
                $brand_list[$key]['url'] = $url . '&amp;brand=' . $val['brand_id'];
            }
        }

        /* 获取分类 */
        $sql = "SELECT c.cat_id, c.cat_name, COUNT(g.goods_id) AS goods_num ".
               " FROM " . $ecs->table('ec_goods') . " AS g ".
               " LEFT JOIN " . $ecs->table('ec_category') . " AS c ON c.cat_id = g.cat_id ".
               " WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0  " . $in_goods .
               " GROUP BY g.cat_id ";
        $cat_list = M()->getAll($sql);
        if(!empty($cat_list))
        {
            foreach ($cat_list as $key=>$val)
            {
                $cat_list[$key]['url'] = $url . '&amp;category=' . $val['cat_id'];
            }
        }
        
        $idx = 0;
        if(!empty($res))
        {
            $ec_goods_name_length=C('ec_goods_name_length');
            foreach($res as $row)
            {
                if ($row['promote_price'] > 0)
                {
                    $promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
                }
                else
                {
                    $promote_price = 0;
                }
                $goods[$idx]['id']            = $row['goods_id'];
                $goods[$idx]['name']          = $row['goods_name'];
                $goods[$idx]['short_name']    = $ec_goods_name_length > 0 ? sub_str($row['goods_name'], $ec_goods_name_length) : $row['goods_name'];
                $goods[$idx]['market_price']  = $row['market_price'];
                $goods[$idx]['shop_price']    = price_format($row['shop_price']);
                $goods[$idx]['promote_price'] = $promote_price > 0 ? price_format($promote_price) : '';
                $goods[$idx]['brief']         = $row['goods_brief'];
                $goods[$idx]['thumb']         = get_image_path($row['goods_id'], $row['goods_thumb'], true);
                $goods[$idx]['url']           = ec_build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']);
                
                $idx++;
            }
        }
        $picks[] = array('name'=>'移除所有', 'url'=>U('index'));
        $this->assign_template();
        $position =  assign_ur_here(0, '选购中心');
        
        $this->assign('page_title',       $position['title']);    // 页面标题
        $this->assign('ur_here',          $position['ur_here']);  // 当前位置

        $this->assign('brand_list',       $brand_list);       //品牌
        $this->assign('cat_list',         $cat_list);        //分类列表
        
        $this->assign('categories',       get_categories_tree()); // 分类树
        $this->assign('helps',            get_shop_help());  // 网店帮助
        $this->assign('top_goods',        get_top10());      // 销售排行
        $this->assign('data_dir',         EC_DATA_DIR);  // 数据目录

        /* 调查 */
        $vote = get_vote();
        if (!empty($vote))
        {
            $this->assign('vote_id', $vote['id']);
            $this->assign('vote',    $vote['content']);
        }
        /* 页面中的动态内容 */
        $this->assign_dynamic('EcPickOut');

        $this->assign('url',           $url);
        $this->assign('pickout_goods', $goods);
        $this->assign('count',         $goods_count);
        $this->assign('picks',         $picks);
        $this->assign('condition',     $condition);
        $this -> display('template/' . C('WEB_STYLE') . '/ec/pick_out.html');
    }
    
	
}
