<?php
/**
 * 前台使用的公共控制器
 * Class PublicControl
 */
class EcControl extends PublicControl {
	

    
	// 构造函数
	public function __construct() {
	   
		parent::__construct();
        //$GLOBALS['view']=$this;
        
	}
    
    public function ecinit(){
        if (!defined('IN_ECS'))
        {
            die('Hacking attempt');
        }
        error_reporting(E_ALL);
        if (__FILE__ == '')
        {
            die('Fatal error code: 0');
        }
        /* 取得当前ecshop所在的根目录 */
        define('EC_ROOT_PATH', str_replace('includes/init.php', '', str_replace('\\', '/', __FILE__)));
        
        $ec_globals=array();
        $GLOBALS['ec_globals']=$ec_globals;
        
        /* 初始化设置 */
        @ini_set('memory_limit',          '64M');
        /*@ini_set('session.cache_expire',  180);
        @ini_set('session.use_trans_sid', 0);
        @ini_set('session.use_cookies',   1);
        @ini_set('session.auto_start',    0);*/
        @ini_set('display_errors',        1);
        
        if (DIRECTORY_SEPARATOR == '\\')
        {
            @ini_set('include_path', '.;' . ROOT_PATH);
        }
        else
        {
            @ini_set('include_path', '.:' . ROOT_PATH);
        }
        
        $this->set_ec_config();
        if (PHP_VERSION >= '5.1' && !empty($timezone))
        {
            date_default_timezone_set($timezone);
        }
        /* 对用户传入的变量进行转义操作。*/
        if (!get_magic_quotes_gpc()){
            if (!empty($_GET))
            {
                $_GET  = addslashes_deep($_GET);
            }
            if (!empty($_POST))
            {
                $_POST = addslashes_deep($_POST);
            }
        
            $_COOKIE   = addslashes_deep($_COOKIE);
            $_REQUEST  = addslashes_deep($_REQUEST);
        }
        
        /* 创建 ECSHOP 对象 */
        $ecs = new ECS(C('DB_DATABASE'), C('DB_PREFIX'));
        define('EC_DATA_DIR', $ecs->data_dir());
        define('EC_IMAGE_DIR', $ecs->image_dir());
        $GLOBALS['ec_globals']['ecs']=$ecs;
        
        if (is_spider()){
            /* 如果是蜘蛛的访问，那么默认为访客方式，并且不记录到日志中 */
            if (!defined('INIT_NO_USERS')){
                define('INIT_NO_USERS', true);
            }
            $_SESSION = array();
            $_SESSION['ec_user_id']     = 0;
            $_SESSION['ec_user_name']   = '';
            $_SESSION['ec_email']       = '';
            $_SESSION['ec_user_rank']   = 0;
            $_SESSION['ec_discount']    = 1.00;
        }
        
        if (!defined('INIT_NO_USERS')){
            //p($_SESSION);
            //$tdb=M();
            /*$sess = new ZHSession($tdb, $ecs->table('ec_sessions'), $ecs->table('ec_sessions_data'), 'ZH_ECSCP_ID');
            define('SESS_ID', $sess->get_session_id());
            $GLOBALS['ec_globals']['sess']=$sess;*/
            //p($_SESSION);die;
        }
        //p($_SESSION);die;
        if (!defined('INIT_NO_USERS')){
            /* 会员信息 */
            $user =& init_users();
            //p($user);die;
            if (!isset($_SESSION['ec_user_id']))
            {
                /* 获取投放站点的名称 */
                $site_name = isset($_GET['from'])   ? htmlspecialchars($_GET['from']) : addslashes('来自本站');
                $from_ad   = !empty($_GET['ad_id']) ? intval($_GET['ad_id']) : 0;
                
                $_SESSION['ec_from_ad'] = $from_ad; // 用户点击的广告ID
                $_SESSION['ec_referer'] = stripslashes($site_name); // 用户来源
                
                unset($site_name);
                if (!defined('INGORE_VISIT_STATS'))
                {
                    //visit_stats();
                    //visit_stats();
                }
                
            }
            if (empty($_SESSION['ec_user_id'])){
                if ($user->get_cookie()){
                    /* 如果会员已经登录并且还没有获得会员的帐户余额、积分以及优惠券 */
                    echo 'ECControl__1';die;   
                }else{
                    $_SESSION['ec_user_id']     = 0;
                    $_SESSION['ec_user_name']   = '';
                    $_SESSION['ec_email']       = '';
                    $_SESSION['ec_user_rank']   = 0;
                    $_SESSION['ec_discount']    = 1.00;
                    if (!isset($_SESSION['ec_login_fail']))
                    {
                        $_SESSION['ec_login_fail'] = 0;
                    }
                }
            }
        }
        //$sess = new cls_session($db, $ecs->table('sessions'), $ecs->table('sessions_data'), 'CL_ECSCP_ID');
        //p($GLOBALS);die;
        define('SESS_ID', session_id());
        
        $GLOBALS['ec_globals']['ec_user']=$user;
        $this->assign('ecs_css_path', __TEMPLATE__.'/ec/common/style/style.css');
        
        /* 创建错误处理对象 */
        $err = new EcError('message.dwt');
        $GLOBALS['ec_globals']['err']=$err;
      
    }
    
    public function set_ec_config(){
        $cookie_path    = "/";
        $cookie_domain    = "";
        $session = "1440";
        $GLOBALS['ec_globals']['cookie_path']=$cookie_path;
        $GLOBALS['ec_globals']['cookie_domain']=$cookie_domain;
        $GLOBALS['ec_globals']['session']=$session;
        

        define('EC_CHARSET','utf-8');
        define('ADMIN_PATH','admin');
        define('AUTH_KEY', 'this is a key');
        define('OLD_AUTH_KEY', '');
        define('API_TIME', '2015-12-07 10:30:14');
    }

    public function set_page_header_data(){
        $this->assign('navigator_list',        get_navigator());
        $goodsCategoryModel=K("GoodsCategory");
        $this->assign('category_list', $goodsCategoryModel->cat_list(0, 0, true,  2, false));
    }
    
    /**
     * 获得指定页面的动态内容
     *
     * @access  public
     * @param   string  $tmp    模板名称
     * @return  void
     */
    public function assign_dynamic($tmp)
    {
        $sql = 'SELECT id, number, type FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_template') .
            " WHERE filename = '$tmp' AND type > 0 AND remarks ='' AND theme='" . C('WEB_STYLE') . "'";
        $res = M()->getAll($sql);
        if(!empty($res))
        {
            foreach ($res AS $row)
            {
                switch ($row['type']){
                    case 1:
                        /* 分类下的商品 */
                        $this->assign('goods_cat_' . $row['id'], $this->assign_cat_goods($row['id'], $row['number']));
                    break;
                }
            }
        }
        
        //p($res);die;
        
    }
    
    /**
     * 获得指定分类下的商品
     *
     * @access  public
     * @param   integer     $cat_id     分类ID
     * @param   integer     $num        数量
     * @param   string      $from       来自web/wap的调用
     * @param   string      $order_rule 指定商品排序规则
     * @return  array
     */
    public function assign_cat_goods($cat_id, $num = 0, $from = 'web', $order_rule = ''){
        $children = get_children($cat_id);
        $sql = 'SELECT g.goods_id, g.goods_name, g.market_price, g.shop_price AS org_price, ' .
                "IFNULL(mp.user_price, g.shop_price * '$_SESSION[ec_discount]') AS shop_price, ".
               'g.promote_price, promote_start_date, promote_end_date, g.goods_brief, g.goods_thumb, g.goods_img ' .
            "FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_goods') . ' AS g '.
            "LEFT JOIN " . $GLOBALS['ec_globals']['ecs']->table('ec_member_price') . " AS mp ".
                    "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[ec_user_rank]' ".
            'WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND '.
                'g.is_delete = 0 AND (' . $children . 'OR ' . get_extension_goods($children) . ') ';
        $order_rule = empty($order_rule) ? 'ORDER BY g.sort_order, g.goods_id DESC' : $order_rule;
        $sql .= $order_rule;
        
        if ($num > 0)
        {
            $sql .= ' LIMIT ' . $num;
        }
        $res = M()->getAll($sql);
        
        $goods = array();
        foreach ($res AS $idx => $row)
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
            $goods[$idx]['market_price'] = price_format($row['market_price']);
            $ec_goods_name_length=C('ec_goods_name_length');
            $goods[$idx]['short_name']   = $ec_goods_name_length > 0 ?
                                            sub_str($row['goods_name'], $ec_goods_name_length) : $row['goods_name'];
            $goods[$idx]['shop_price']   = price_format($row['shop_price']);
            $goods[$idx]['thumb']        = get_image_path($row['goods_id'], $row['goods_thumb'], true);
            $goods[$idx]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
            $goods[$idx]['url']          = ec_build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
        }
        
        if ($from == 'web')
        {
            $this->assign('cat_goods_' . $cat_id, $goods);
        }
        elseif ($from == 'wap')
        {
            $cat['goods'] = $goods;
        }
        /* 分类信息 */
        $sql = 'SELECT cat_name FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_category') . " WHERE cat_id = '$cat_id'";
        $cat['name'] = M()->getOne($sql,'cat_name');
        $cat['url']  = ec_build_uri('category', array('cid' => $cat_id), $cat['name']);
        $cat['id']   = $cat_id;
        return $cat;
    }
    
    /**
     * 替换动态模块
     *
     * @access  public
     * @param   string       $matches    匹配内容
     *
     * @return string        结果
     */
    public function dyna_libs_replace($tmp,$library){
        $sql = 'SELECT id, number, type FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_template') .
            " WHERE filename = '$tmp' AND library='$library'  AND theme='" . C('WEB_STYLE') . "'";
        $res = M()->getOneRow($sql);
        if(!empty($res)){
            switch($res['type']){
                case 1:
                    $this->assign('cat_goods',$this->view->vars['cat_goods_'.$res['id'].'']);
                    $this->assign('goods_cat',$this->view->vars['goods_cat_'.$res['id'].'']);
                    break;
            }
        }
        
        //p($res);
        //p($this->view->vars['cat_goods_4']);die;
    }
    
    public function assign_template($ctype = '', $catlist = array()){
        $this->assign('points_name',   C('ec_integral_name'));
        
        $this->assign('qq',            explode(',', C('ec_qq')));
        $this->assign('ww',            explode(',', C('ec_ww')));
        $this->assign('ym',            explode(',', C('ec_ym')));
        $this->assign('msn',           explode(',', C('ec_msn')));
        $this->assign('skype',         explode(',', C('ec_skype')));
        $copyright='&copy; 2005-%s %s Copyright, All Rights Reserved.';
        $this->assign('copyright',     sprintf($copyright, date('Y'), C('ec_shop_name')));
        $this->assign('shop_name',  C('ec_shop_name'));
        $this->assign('shop_address',  C('ec_shop_address'));
        $this->assign('service_phone',  C('ec_service_phone'));
        $this->assign('service_email',  C('ec_service_email'));
        
        $this->assign('icp_number',    C('ec_icp_number'));
        $this->assign('navigator_list',        get_navigator($ctype, $catlist));  //自定义导航栏
        $this->assign('category_list', cat_list(0, 0, true,  2, false));
    }
    
    
    /**
     * 创建分页信息
     *
     * @access  public
     * @param   string  $app            程序名称，如category
     * @param   string  $cat            分类ID
     * @param   string  $record_count   记录总数
     * @param   string  $size           每页记录数
     * @param   string  $sort           排序类型
     * @param   string  $order          排序顺序
     * @param   string  $page           当前页
     * @param   string  $keywords       查询关键字
     * @param   string  $brand          品牌
     * @param   string  $price_min      最小价格
     * @param   string  $price_max      最高价格
     * @return  void
     */
    public function assign_pager($app, $cat, $record_count, $size, $sort, $order, $page = 1,
                            $keywords = '', $brand = 0, $price_min = 0, $price_max = 0, $display_type = 'list', $filter_attr='', $url_format='', $sch_array='')
    {
        $sch = array('keywords'  => $keywords,
                 'sort'      => $sort,
                 'order'     => $order,
                 'cat'       => $cat,
                 'brand'     => $brand,
                 'price_min' => $price_min,
                 'price_max' => $price_max,
                 'filter_attr'=>$filter_attr,
                 'display'   => $display_type
        );
        $page = intval($page);
        if ($page < 1)
        {
            $page = 1;
        }
        $page_count = $record_count > 0 ? intval(ceil($record_count / $size)) : 1;

        $pager['page']         = $page;
        $pager['size']         = $size;
        $pager['sort']         = $sort;
        $pager['order']        = $order;
        $pager['record_count'] = $record_count;
        $pager['page_count']   = $page_count;
        $pager['display']      = $display_type;
    
        switch ($app)
        {
            case 'category':
                $uri_args = array('cid' => $cat, 'bid' => $brand, 'price_min'=>$price_min, 'price_max'=>$price_max, 'filter_attr'=>$filter_attr, 'sort' => $sort, 'order' => $order, 'display' => $display_type);
                break;
            case 'article_cat':
                $uri_args = array('acid' => $cat, 'sort' => $sort, 'order' => $order);
                break;
            case 'brand':
                $uri_args = array('cid' => $cat, 'bid' => $brand, 'sort' => $sort, 'order' => $order, 'display' => $display_type);
                break;
            case 'search':
                $uri_args = array('cid' => $cat, 'bid' => $brand, 'sort' => $sort, 'order' => $order);
                break;
            case 'exchange':
                $uri_args = array('cid' => $cat, 'integral_min'=>$price_min, 'integral_max'=>$price_max, 'sort' => $sort, 'order' => $order, 'display' => $display_type);
                break;
        }
        
        $ec_page_style=C('ec_page_style');
        /* 分页样式 */
        $pager['styleid'] = isset($ec_page_style)? intval($ec_page_style) : 0;
    
        $page_prev  = ($page > 1) ? $page - 1 : 1;
        $page_next  = ($page < $page_count) ? $page + 1 : $page_count;
    
        if ($pager['styleid'] == 0)
        {
            if (!empty($url_format))
            {
                $pager['page_first'] = $url_format . 1;
                $pager['page_prev']  = $url_format . $page_prev;
                $pager['page_next']  = $url_format . $page_next;
                $pager['page_last']  = $url_format . $page_count;
            }
            else
            {
                $pager['page_first'] = ec_build_uri($app, $uri_args, '', 1, $keywords);
                $pager['page_prev']  = ec_build_uri($app, $uri_args, '', $page_prev, $keywords);
                $pager['page_next']  = ec_build_uri($app, $uri_args, '', $page_next, $keywords);
                $pager['page_last']  = ec_build_uri($app, $uri_args, '', $page_count, $keywords);
            }
            $pager['array']      = array();
    
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
            if (!empty($url_format))
            {
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
            else
            {
                $pager['page_first'] = ($page - $_offset > 1 && $_pagenum < $page_count) ? build_uri($app, $uri_args, '', 1, $keywords) : '';
                $pager['page_prev']  = ($page > 1) ? ec_build_uri($app, $uri_args, '', $page_prev, $keywords) : '';
                $pager['page_next']  = ($page < $page_count) ? ec_build_uri($app, $uri_args, '', $page_next, $keywords) : '';
                $pager['page_last']  = ($_to < $page_count) ? ec_build_uri($app, $uri_args, '', $page_count, $keywords) : '';
                $pager['page_kbd']  = ($_pagenum < $page_count) ? true : false;
                $pager['page_number'] = array();
                for ($i=$_from;$i<=$_to;++$i)
                {
                    $pager['page_number'][$i] = ec_build_uri($app, $uri_args, '', $i, $keywords);
                }
            }
        }
        if (!empty($sch_array))
        {
            $pager['search'] = $sch_array;
        }
        else
        {
            $pager['search']['category'] = $cat;
            foreach ($sch AS $key => $row)
            {
                $pager['search'][$key] = $row;
            }
        }
        

        $pager['current_app']=APP;
        $pager['current_control']=CONTROL;
        $pager['current_meth']='index';
        $this->assign('pager', $pager);
        //p('assign_pager');die;
        
    }
    
    /**
     * 显示一个提示信息
     *
     * @access  public
     * @param   string  $content
     * @param   string  $link
     * @param   string  $href
     * @param   string  $type               信息类型：warning, error, info
     * @param   string  $auto_redirect      是否自动跳转
     * @return  void
     */
    public function show_message($content, $links = '', $hrefs = '', $type = 'info', $auto_redirect = true) 
    {
        $this -> assign_template();
        
        $msg['content'] = $content;
        if (is_array($links) && is_array($hrefs))
        {
            if (!empty($links) && count($links) == count($hrefs))
            {
                foreach($links as $key =>$val)
                {
                    $msg['url_info'][$val] = $hrefs[$key];
                }
                $msg['back_url'] = $hrefs['0'];
            }
        }
        else
        {
            $link   = empty($links) ? '返回上一页' : $links;
            $href    = empty($hrefs) ? 'javascript:history.back()'       : $hrefs;
            $msg['url_info'][$link] = $href;
            $msg['back_url'] = $href;
        }
        $msg['type']    = $type;
        $position = assign_ur_here(0, '系统提示');
        $this->assign('page_title', $position['title']);   // 页面标题
        $this->assign('ur_here',    $position['ur_here']); // 当前位置
        $this->assign('ecs_css_path', __TEMPLATE__.'/ec/common/style/style.css');
        $this->assign('helps', get_shop_help()); // 网店帮助
        
        $this->assign('auto_redirect', $auto_redirect);
        $this->assign('message', $msg);
        $this -> display('template/' . C('WEB_STYLE') . '/ec/message.html');
        //$this->display('message.dwt');
        exit;
    }

}
