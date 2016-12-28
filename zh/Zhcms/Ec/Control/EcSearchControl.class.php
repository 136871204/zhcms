<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcSearchControl extends EcControl {
    
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
        $_LANG['sort']['goods_id'] = '按上架时间排序';
        $_LANG['sort']['shop_price'] = '按价格排序';
        $_LANG['sort']['last_update'] = '按更新时间排序';
        $_LANG['order']['DESC'] = '倒序';
        $_LANG['order']['ASC'] = '正序';
        /* 商品比较JS语言项 */
        $_LANG['compare_js']['button_compare'] = '比较选定商品';
        $_LANG['compare_js']['exist'] = '您已经选择了%s';
        $_LANG['compare_js']['count_limit'] = '最多只能选择4个商品进行对比';
        $_LANG['compare_js']['goods_type_different'] = '\"%s\"和已选择商品类型不同无法进行对比';

        $this->assign('lang',  $_LANG);
        //echo 'aaa';die;
    }
    
    public function index(){
        header("Content-type:text/html;charset=utf-8");
        $ecs=$GLOBALS['ec_globals']['ecs'];
        
        if (!function_exists("htmlspecialchars_decode"))
        {
            function htmlspecialchars_decode($string, $quote_style = ENT_COMPAT)
            {
                return strtr($string, array_flip(get_html_translation_table(HTML_SPECIALCHARS, $quote_style)));
            }
        }

        if (empty($_GET['encode']))
        {
            $string = array_merge($_GET, $_POST);
            if (get_magic_quotes_gpc())
            {
                //require(dirname(__FILE__) . '/includes/lib_base.php');
                //require(dirname(__FILE__) . '/includes/lib_common.php');
        
                $string = stripslashes_deep($string);
            }
            $string['search_encode_time'] = time();
            $string = str_replace('+', '%2b', base64_encode(serialize($string)));
            //p($string);die;
            header("Location: ".U('index')."&encode=$string\n");
        
            exit;
        }
        else
        {
            $string = base64_decode(trim($_GET['encode']));
            if ($string !== false)
            {
                $string = unserialize($string);
                if ($string !== false)
                {
                    /* 用户在重定向的情况下当作一次访问 */
                    if (!empty($string['search_encode_time']))
                    {
                        if (time() > $string['search_encode_time'] + 2)
                        {
                            define('INGORE_VISIT_STATS', true);
                        }
                    }
                    else
                    {
                        define('INGORE_VISIT_STATS', true);
                    }
                }
                else
                {
                    $string = array();
                }
            }
            else{
                $string = array();
            }
        }
        $_REQUEST = array_merge($_REQUEST, addslashes_deep($string));
        $_REQUEST['act'] = !empty($_REQUEST['act']) ? trim($_REQUEST['act']) : '';
        /*------------------------------------------------------ */
        //-- 高级搜索
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'advanced_search')
        {
            $goods_type = !empty($_REQUEST['goods_type']) ? intval($_REQUEST['goods_type']) : 0;
            $attributes = $this -> get_seachable_attributes($goods_type);
            
            $this->assign('goods_type_selected', $goods_type);
            $this->assign('goods_type_list',     $attributes['cate']);
            $this->assign('goods_attributes',    $attributes['attr']);
    
            $this->assign_template();
            $position = assign_ur_here(0, '高级搜索');
            $this->assign('page_title', $position['title']);    // 页面标题
            $this->assign('ur_here',    $position['ur_here']);  // 当前位置
    
            $this->assign('categories', get_categories_tree()); // 分类树
            $this->assign('helps',      get_shop_help());       // 网店帮助
            $this->assign('top_goods',  get_top10());           // 销售排行
            $this->assign('promotion_info', get_promotion_info());
            $this->assign('cat_list',   cat_list(0, 0, true, 2, false));
            $this->assign('brand_list', get_brand_list());
            $this->assign('action',     'form');
            $this->assign('use_storage', C('ec_use_storage'));
    
            $this -> display('template/' . C('WEB_STYLE') . '/ec/search.html');
        }
        /*------------------------------------------------------ */
        //-- 搜索结果
        /*------------------------------------------------------ */
        else
        {
            $_REQUEST['keywords']   = !empty($_REQUEST['keywords'])   ? htmlspecialchars(trim($_REQUEST['keywords']))     : '';
            $_REQUEST['brand']      = !empty($_REQUEST['brand'])      ? intval($_REQUEST['brand'])      : 0;
            $_REQUEST['category']   = !empty($_REQUEST['category'])   ? intval($_REQUEST['category'])   : 0;
            $_REQUEST['min_price']  = !empty($_REQUEST['min_price'])  ? intval($_REQUEST['min_price'])  : 0;
            $_REQUEST['max_price']  = !empty($_REQUEST['max_price'])  ? intval($_REQUEST['max_price'])  : 0;
            $_REQUEST['goods_type'] = !empty($_REQUEST['goods_type']) ? intval($_REQUEST['goods_type']) : 0;
            $_REQUEST['sc_ds']      = !empty($_REQUEST['sc_ds']) ? intval($_REQUEST['sc_ds']) : 0;
            $_REQUEST['outstock']   = !empty($_REQUEST['outstock']) ? 1 : 0;
            
            $action = '';
            if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'form')
            {
                echo 'TODO:EcSearchControl---2';die;
            }
            /* 初始化搜索条件 */
            $keywords  = '';
            $tag_where = '';
            if (!empty($_REQUEST['keywords']))
            {
                $arr = array();
                if (stristr($_REQUEST['keywords'], ' AND ') !== false)
                {
                    /* 检查关键字中是否有AND，如果存在就是并 */
                    $arr        = explode('AND', $_REQUEST['keywords']);
                    $operator   = " AND ";
                }
                elseif (stristr($_REQUEST['keywords'], ' OR ') !== false)
                {
                    /* 检查关键字中是否有OR，如果存在就是或 */
                    $arr        = explode('OR', $_REQUEST['keywords']);
                    $operator   = " OR ";
                }
                elseif (stristr($_REQUEST['keywords'], ' + ') !== false)
                {
                    /* 检查关键字中是否有加号，如果存在就是或 */
                    $arr        = explode('+', $_REQUEST['keywords']);
                    $operator   = " OR ";
                }
                else
                {
                    /* 检查关键字中是否有空格，如果存在就是并 */
                    $arr        = explode(' ', $_REQUEST['keywords']);
                    $operator   = " AND ";
                }
                $keywords = 'AND (';
                $goods_ids = array();
                foreach ($arr AS $key => $val)
                {
                    if ($key > 0 && $key < count($arr) && count($arr) > 1)
                    {
                        $keywords .= $operator;
                    }
                    $val        = mysql_like_quote(trim($val));
                    $sc_dsad    = $_REQUEST['sc_ds'] ? " OR goods_desc LIKE '%$val%'" : '';
                    $keywords  .= "(goods_name LIKE '%$val%' OR goods_sn LIKE '%$val%' OR keywords LIKE '%$val%' $sc_dsad)";
        
                    $sql = 'SELECT DISTINCT goods_id FROM ' . $ecs->table('ec_tag') . " WHERE tag_words LIKE '%$val%' ";
                    $res = M()->query($sql);
                    if(!empty($res))
                    {
                        foreach($res as $row)
                        {
                            $goods_ids[] = $row['goods_id'];
                        }
                    }
                    M()->autoReplace($ecs->table('ec_keywords'), array('date' => local_date('Y-m-d'),
                            'searchengine' => 'ecshop', 'keyword' => addslashes(str_replace('%', '', $val)), 'count' => 1), array('count' => 1));
                }
                $keywords .= ')';
                
                $goods_ids = array_unique($goods_ids);
                $tag_where = implode(',', $goods_ids);
                if (!empty($tag_where))
                {
                    $tag_where = 'OR g.goods_id ' . db_create_in($tag_where);
                }
            }
            
            $category   = !empty($_REQUEST['category']) ? intval($_REQUEST['category'])        : 0;
            $categories = ($category > 0)               ? ' AND ' . get_children($category)    : '';
            $brand      = $_REQUEST['brand']            ? " AND brand_id = '$_REQUEST[brand]'" : '';
            $outstock   = !empty($_REQUEST['outstock']) ? " AND g.goods_number > 0 "           : '';
    
            $min_price  = $_REQUEST['min_price'] != 0                               ? " AND g.shop_price >= '$_REQUEST[min_price]'" : '';
            $max_price  = $_REQUEST['max_price'] != 0 || $_REQUEST['min_price'] < 0 ? " AND g.shop_price <= '$_REQUEST[max_price]'" : '';
    
            /* 排序、显示方式以及类型 */
            $ec_show_order_type=C('ec_show_order_type');
            $ec_sort_order_method=C('ec_sort_order_method');
            $ec_sort_order_type=C('ec_sort_order_type');
            $default_display_type = $ec_show_order_type == '0' ? 'list' : ($ec_show_order_type == '1' ? 'grid' : 'text');
            $default_sort_order_method = $ec_sort_order_method == '0' ? 'DESC' : 'ASC';
            $default_sort_order_type   = $ec_sort_order_type == '0' ? 'goods_id' : ($ec_sort_order_type == '1' ? 'shop_price' : 'last_update');
            
            $sort = (isset($_REQUEST['sort'])  && in_array(trim(strtolower($_REQUEST['sort'])), array('goods_id', 'shop_price', 'last_update'))) ? trim($_REQUEST['sort'])  : $default_sort_order_type;
            $order = (isset($_REQUEST['order']) && in_array(trim(strtoupper($_REQUEST['order'])), array('ASC', 'DESC'))) ? trim($_REQUEST['order']) : $default_sort_order_method;
            $display  = (isset($_REQUEST['display']) && in_array(trim(strtolower($_REQUEST['display'])), array('list', 'grid', 'text'))) ? trim($_REQUEST['display'])  : (isset($_SESSION['display_search']) ? $_SESSION['display_search'] : $default_display_type);

            $_SESSION['display_search'] = $display;
            
            $ec_page_size=C('ec_page_size');
            $page       = !empty($_REQUEST['page'])  && intval($_REQUEST['page'])  > 0 ? intval($_REQUEST['page'])  : 1;
            $size       = !empty($ec_page_size) && intval($ec_page_size) > 0 ? intval($ec_page_size) : 10;

            $intromode = '';    //方式，用于决定搜索结果页标题图片
            
            if (!empty($_REQUEST['intro']))
            {
                switch ($_REQUEST['intro'])
                {
                    case 'best':
                        $intro   = ' AND g.is_best = 1';
                        $intromode = 'best';
                        $ur_here = '精品推荐';
                        break;
                    case 'new':
                        $intro   = ' AND g.is_new = 1';
                        $intromode ='new';
                        $ur_here = '新品上市';
                        break;
                    case 'hot':
                        $intro   = ' AND g.is_hot = 1';
                        $intromode = 'hot';
                        $ur_here = '热销商品';
                        break;
                    case 'promotion':
                        $time    = gmtime();
                        $intro   = " AND g.promote_price > 0 AND g.promote_start_date <= '$time' AND g.promote_end_date >= '$time'";
                        $intromode = 'promotion';
                        $ur_here = '促销商品';
                        break;
                    default:
                        $intro   = '';
                }
            }
            else
            {
                $intro = '';
            }
            if (empty($ur_here))
            {
                $ur_here = '商品搜索';
            }
            
            /*------------------------------------------------------ */
            //-- 属性检索
            /*------------------------------------------------------ */
            $attr_in  = '';
            $attr_num = 0;
            $attr_url = '';
            $attr_arg = array();
            
            if (!empty($_REQUEST['attr']))
            {
                echo 'TODO:EcSearchControl---4';die;
            }
            elseif (isset($_REQUEST['pickout']))
            {
                echo 'TODO:EcSearchControl---5';die;
            }
            
            /* 获得符合条件的商品总数 */
            $sql   = "SELECT COUNT(*) FROM " .$ecs->table('ec_goods'). " AS g ".
                "WHERE g.is_delete = 0 AND g.is_on_sale = 1 AND g.is_alone_sale = 1 $attr_in ".
                "AND (( 1 " . $categories . $keywords . $brand . $min_price . $max_price . $intro . $outstock ." ) ".$tag_where." )";
            $count = M()->getOne($sql,'COUNT(*)');
            
            $max_page = ($count> 0) ? ceil($count / $size) : 1;
            if ($page > $max_page)
            {
                $page = $max_page;
            }
            
            /* 查询商品 */
            $sql = "SELECT g.goods_id, g.goods_name, g.market_price, g.is_new, g.is_best, g.is_hot, g.shop_price AS org_price, ".
                        "IFNULL(mp.user_price, g.shop_price * '$_SESSION[ec_discount]') AS shop_price, ".
                        "g.promote_price, g.promote_start_date, g.promote_end_date, g.goods_thumb, g.goods_img, g.goods_brief, g.goods_type ".
                    "FROM " .$ecs->table('ec_goods'). " AS g ".
                    "LEFT JOIN " . $ecs->table('ec_member_price') . " AS mp ".
                            "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[ec_user_rank]' ".
                    "WHERE g.is_delete = 0 AND g.is_on_sale = 1 AND g.is_alone_sale = 1 $attr_in ".
                        "AND (( 1 " . $categories . $keywords . $brand . $min_price . $max_price . $intro . $outstock . " ) ".$tag_where." ) " .
                    "ORDER BY $sort $order";
            $res = M()->SelectLimit($sql, $size, ($page - 1) * $size);
            $arr = array();
            
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
                    /* 处理商品水印图片 */
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
                    $arr[$row['goods_id']]['goods_id']      = $row['goods_id'];
                    if($display == 'grid')
                    {
                        $arr[$row['goods_id']]['goods_name']    = $ec_goods_name_length > 0 ? sub_str($row['goods_name'], $ec_goods_name_length) : $row['goods_name'];
                    }
                    else
                    {
                        $arr[$row['goods_id']]['goods_name'] = $row['goods_name'];
                    }
                    $arr[$row['goods_id']]['type']          = $row['goods_type'];
                    $arr[$row['goods_id']]['market_price']  = price_format($row['market_price']);
                    $arr[$row['goods_id']]['shop_price']    = price_format($row['shop_price']);
                    $arr[$row['goods_id']]['promote_price'] = ($promote_price > 0) ? price_format($promote_price) : '';
                    $arr[$row['goods_id']]['goods_brief']   = $row['goods_brief'];
                    $arr[$row['goods_id']]['goods_thumb']   = get_image_path($row['goods_id'], $row['goods_thumb'], true);
                    $arr[$row['goods_id']]['goods_img']     = get_image_path($row['goods_id'], $row['goods_img']);
                    $arr[$row['goods_id']]['url']           = ec_build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
                }
            }
            if($display == 'grid')
            {
                if(count($arr) % 2 != 0)
                {
                    $arr[] = array();
                }
            }
            $this->assign('goods_list', $arr);
            $this->assign('category',   $category);
            $this->assign('keywords',   htmlspecialchars(stripslashes($_REQUEST['keywords'])));
            $this->assign('search_keywords',   stripslashes(htmlspecialchars_decode($_REQUEST['keywords'])));
            $this->assign('brand',      $_REQUEST['brand']);
            $this->assign('min_price',  $min_price);
            $this->assign('max_price',  $max_price);
            $this->assign('outstock',  $_REQUEST['outstock']);
            
            /* 分页 */
            $url_format = U('index')."&category=$category&amp;keywords=" . urlencode(stripslashes($_REQUEST['keywords'])) . "&amp;brand=" . $_REQUEST['brand']."&amp;action=".$action."&amp;goods_type=" . $_REQUEST['goods_type'] . "&amp;sc_ds=" . $_REQUEST['sc_ds'];
            if (!empty($intromode))
            {
                $url_format .= "&amp;intro=" . $intromode;
            }
            if (isset($_REQUEST['pickout']))
            {
                $url_format .= '&amp;pickout=1';
            }
            $url_format .= "&amp;min_price=" . $_REQUEST['min_price'] ."&amp;max_price=" . $_REQUEST['max_price'] . "&amp;sort=$sort";
            $url_format .= "$attr_url&amp;order=$order&amp;page=";
            
            $pager['search'] = array(
                'keywords'   => stripslashes(urlencode($_REQUEST['keywords'])),
                'category'   => $category,
                'brand'      => $_REQUEST['brand'],
                'sort'       => $sort,
                'order'      => $order,
                'min_price'  => $_REQUEST['min_price'],
                'max_price'  => $_REQUEST['max_price'],
                'action'     => $action,
                'intro'      => empty($intromode) ? '' : trim($intromode),
                'goods_type' => $_REQUEST['goods_type'],
                'sc_ds'      => $_REQUEST['sc_ds'],
                'outstock'   => $_REQUEST['outstock']
            );
            $pager['search'] = array_merge($pager['search'], $attr_arg);

            $pager = get_pager(U('index'), $pager['search'], $count, $page, $size);
            $pager['display'] = $display;

            $this->assign('url_format', $url_format);
            $pager['current_app']=APP;
            $pager['current_control']=CONTROL;
            $pager['current_meth']='index';
            $this->assign('pager', $pager);


            $this->assign_template();
            $this->assign_dynamic('EcSearch');
            
            $position = assign_ur_here(0, $ur_here . ($_REQUEST['keywords'] ? '_' . $_REQUEST['keywords'] : ''));
            $this->assign('page_title', $position['title']);    // 页面标题
            $this->assign('ur_here',    $position['ur_here']);  // 当前位置
            $this->assign('intromode',      $intromode);
            $this->assign('categories', get_categories_tree()); // 分类树
            $this->assign('helps',       get_shop_help());      // 网店帮助
            $this->assign('top_goods',  get_top10());           // 销售排行
            $this->assign('promotion_info', get_promotion_info());
            
            $this -> display('template/' . C('WEB_STYLE') . '/ec/search.html');

        }
    }
    
    /**
     * 获得可以检索的属性
     *
     * @access  public
     * @params  integer $cat_id
     * @return  void
     */
    public function get_seachable_attributes($cat_id = 0)
    {
        $attributes = array(
            'cate' => array(),
            'attr' => array()
        );
        
        /* 获得可用的商品类型 */
        $sql = "SELECT t.cat_id, cat_name FROM " .
                    $GLOBALS['ec_globals']['ecs']->table('ec_goods_type'). " AS t, ".
                    $GLOBALS['ec_globals']['ecs']->table('ec_attribute') ." AS a".
               " WHERE t.cat_id = a.cat_id AND t.enabled = 1 AND a.attr_index > 0 ";
        $cat = M()->getAll($sql);
        
        
        /* 获取可以检索的属性 */
        if (!empty($cat))
        {
            foreach ($cat AS $val)
            {
                $attributes['cate'][$val['cat_id']] = $val['cat_name'];
            }
            $where = $cat_id > 0 ? ' AND a.cat_id = ' . $cat_id : " AND a.cat_id = " . $cat[0]['cat_id'];
            $sql = 'SELECT attr_id, attr_name, attr_input_type, attr_type, attr_values, attr_index, sort_order ' .
               ' FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_attribute') . ' AS a ' .
               ' WHERE a.attr_index > 0 ' .$where.
               ' ORDER BY cat_id, sort_order ASC';
            $res = M()->query($sql);
            if(!empty($res))
            {
                foreach($res as $row)
                {
                    if ($row['attr_index'] == 1 && $row['attr_input_type'] == 1)
                    {
                        $row['attr_values'] = str_replace("\r", '', $row['attr_values']);
                        $options = explode("\n", $row['attr_values']);
                        $attr_value = array();
                        foreach ($options AS $opt)
                        {
                            $attr_value[$opt] = $opt;
                        }
                        $attributes['attr'][] = array(
                            'id'      => $row['attr_id'],
                            'attr'    => $row['attr_name'],
                            'options' => $attr_value,
                            'type'    => 3
                        );
                    }
                    else
                    {
                        $attributes['attr'][] = array(
                            'id'   => $row['attr_id'],
                            'attr' => $row['attr_name'],
                            'type' => $row['attr_index']
                        );
                    }
                }
            }
        }
        return $attributes;
    
    }
	
}
