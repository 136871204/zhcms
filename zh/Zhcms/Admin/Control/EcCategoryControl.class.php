<?php
/**
 * 商品类型
 * @author 周鸿 <136871204@qq.com>
 */
class EcCategoryControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("GoodsCategory");
	}
    
    
    public function index(){
        $ecs=$GLOBALS['ec_globals']['ecs'];
	    $tdb=M();
	    $exc = new exchange($ecs->table("ec_category"), $tdb, 'cat_id', 'cat_name');
        
        /* act操作项的初始化 */
        if (empty($_REQUEST['act']))
        {
            $_REQUEST['act'] = 'list';
        }
        else
        {
            $_REQUEST['act'] = trim($_REQUEST['act']);
        }
        
        /*------------------------------------------------------ */
        //-- 商品分类列表
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'list'){
            //echo L('admin_content_control_index_common2');die;
            /* 获取分类列表 */
            $cat_list = cat_list(0, 0, false);
            /* 模板赋值 */
            $this->assign('ur_here',      '商品カテゴリ');
            $this->assign('action_link',  array('href' => U('index',array('act'=>'add')), 'text' => 'カテゴリ新規'));
            $this->assign('full_page',    1);
        
            $this->assign('cat_info',     $cat_list);
            $this->display('category_list.htm');
        }
        /*------------------------------------------------------ */
        //-- 排序、分页、查询
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query')
        {
            $cat_list = cat_list(0, 0, false);
            $this->assign('cat_info',     $cat_list);
        
            make_json_result($this->fetch('category_list.htm'));
        }
        /*------------------------------------------------------ */
        //-- 添加商品分类
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'add')
        {
        
            /* 模板赋值 */
            $this->assign('ur_here',      'カテゴリ新規');
            $this->assign('action_link',  array('href' => U('index',array('act'=>'list')) , 'text' => '商品カテゴリ'));
        
            $this->assign('goods_type_list',  goods_type_list(0)); // 取得商品类型
            $this->assign('attr_list',        $this->get_attr_list()); // 取得商品属性
        
            $this->assign('cat_select',   cat_list(0, 0, true));
            $this->assign('form_act',     'insert');
            $this->assign('cat_info',     array('is_show' => 1));
        
        
        
            /* 显示页面 */
            $this->display('category_info.htm');
        }
        /*------------------------------------------------------ */
        //-- 商品分类添加时的处理
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'insert')
        {
            /* 初始化变量 */
            $cat['cat_id']       = !empty($_POST['cat_id'])       ? intval($_POST['cat_id'])     : 0;
            $cat['parent_id']    = !empty($_POST['parent_id'])    ? intval($_POST['parent_id'])  : 0;
            $cat['sort_order']   = !empty($_POST['sort_order'])   ? intval($_POST['sort_order']) : 0;
            $cat['keywords']     = !empty($_POST['keywords'])     ? trim($_POST['keywords'])     : '';
            $cat['cat_desc']     = !empty($_POST['cat_desc'])     ? $_POST['cat_desc']           : '';
            $cat['measure_unit'] = !empty($_POST['measure_unit']) ? trim($_POST['measure_unit']) : '';
            $cat['cat_name']     = !empty($_POST['cat_name'])     ? trim($_POST['cat_name'])     : '';
            $cat['show_in_nav']  = !empty($_POST['show_in_nav'])  ? intval($_POST['show_in_nav']): 0;
            $cat['style']        = !empty($_POST['style'])        ? trim($_POST['style'])        : '';
            $cat['is_show']      = !empty($_POST['is_show'])      ? intval($_POST['is_show'])    : 0;
            $cat['grade']        = !empty($_POST['grade'])        ? intval($_POST['grade'])      : 0;
            $cat['filter_attr']  = !empty($_POST['filter_attr'])  ? implode(',', array_unique(array_diff($_POST['filter_attr'],array(0)))) : 0;
            
            $cat['cat_recommend']  = !empty($_POST['cat_recommend'])  ? $_POST['cat_recommend'] : array();
            
            if (cat_exists($cat['cat_name'], $cat['parent_id']))
            {
                /* 同级别下不能有重复的分类名称 */
               $link[] = array('text' => '戻る', 'href' => 'javascript:history.back(-1)');
               $this->sys_msg('同じカテゴリ名が存在した!', 0, $link);
            }
            if($cat['grade'] > 10 || $cat['grade'] < 0)
            {
                /* 价格区间数超过范围 */
               $link[] = array('text' =>'戻る', 'href' => 'javascript:history.back(-1)');
               $this->sys_msg('価額階級数は0-10以内してください', 0, $link);
            }
            /* 入库的操作 */
            $cat_id=M()->autoExecute($ecs->table('ec_category'), $cat);
            if ($cat_id !== false){
                
                if($cat['show_in_nav'] == 1){
                    $vieworder = M()->getOne("SELECT max(vieworder) FROM ". $ecs->table('ec_nav') . " WHERE type = 'middle'",'max(vieworder)');
                    $vieworder += 2;
                    //显示在自定义导航栏中
                    $sql = "INSERT INTO " . $ecs->table('ec_nav') .
                            " (name,ctype,cid,ifshow,vieworder,opennew,url,type)".
                            " VALUES('" . $cat['cat_name'] . "', 'c', '".$cat_id."','1','$vieworder','0', '" . ec_build_uri('category', array('cid'=> $cat_id), $cat['cat_name']) . "','middle')";
                    M()->exe($sql);
                }
                
                $this->insert_cat_recommend($cat['cat_recommend'], $cat_id);
                
                admin_log($_POST['cat_name'], '新規', '商品カテゴリ');   // 记录管理员操作
                clear_cache_files();    // 清除缓存
                
                /*添加链接*/
                $link[0]['text'] ='新規続き';
                $link[0]['href'] = U('index',array('act'=>'add'));
        
                $link[1]['text'] = 'リストに戻る';
                $link[1]['href'] = U('index',array('act'=>'list'));
                
                $this->sys_msg('商品カテゴリ新規成功!', 0, $link);
                
            }
        }
        /*------------------------------------------------------ */
        //-- 编辑商品分类信息
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'edit'){
            $cat_id = intval($_REQUEST['cat_id']);
            $cat_info = $this->get_cat_info($cat_id);  // 查询分类信息数据
            $attr_list = $this->get_attr_list();
            $filter_attr_list = array();
            
            if ($cat_info['filter_attr']){
                $filter_attr = explode(",", $cat_info['filter_attr']);  //把多个筛选属性放到数组中
                foreach ($filter_attr AS $k => $v)
                {
                    $attr_cat_id = M()->getOne("SELECT cat_id FROM " . $ecs->table('ec_attribute') . " WHERE attr_id = '" . intval($v) . "'",'cat_id');
                    $filter_attr_list[$k]['goods_type_list'] = goods_type_list($attr_cat_id);  //取得每个属性的商品类型
                    $filter_attr_list[$k]['filter_attr'] = $v;
                    $attr_option = array();
        
                    foreach ($attr_list[$attr_cat_id] as $val)
                    {
                        $attr_option[key($val)] = current ($val);
                    }
        
                    $filter_attr_list[$k]['option'] = $attr_option;
                }
                $this->assign('filter_attr_list', $filter_attr_list);
            }
            else
            {
                $attr_cat_id = 0;
            }
            //p($filter_attr_list);
            
            /* 模板赋值 */
            $this->assign('attr_list',        $attr_list); // 取得商品属性
            $this->assign('attr_cat_id',      $attr_cat_id);
            $this->assign('ur_here',     '商品カテゴリ変更');
            $this->assign('action_link', array('text' => '商品カテゴリ', 'href' => U('index',array('act'=>'list'))));
            
            //分类是否存在首页推荐
            $res = M()->getAll("SELECT recommend_type FROM " . $ecs->table("ec_cat_recommend") . " WHERE cat_id=" . $cat_id);
            if (!empty($res))
            {
                $cat_recommend = array();
                foreach($res as $data)
                {
                    $cat_recommend[$data['recommend_type']] = 1;
                }
                $this->assign('cat_recommend', $cat_recommend);
            }
            
            $this->assign('cat_info',    $cat_info);
            $this->assign('form_act',    'update');
            $this->assign('cat_select',  cat_list(0, $cat_info['parent_id'], true));
            $this->assign('goods_type_list',  goods_type_list(0)); // 取得商品类型
            /* 显示页面 */
            $this->display('category_info.htm');
        }
        /*------------------------------------------------------ */
        //-- 编辑商品分类信息
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'update'){
            /* 初始化变量 */
            $cat_id              = !empty($_POST['cat_id'])       ? intval($_POST['cat_id'])     : 0;
            $old_cat_name        = $_POST['old_cat_name'];
            $cat['parent_id']    = !empty($_POST['parent_id'])    ? intval($_POST['parent_id'])  : 0;
            $cat['sort_order']   = !empty($_POST['sort_order'])   ? intval($_POST['sort_order']) : 0;
            $cat['keywords']     = !empty($_POST['keywords'])     ? trim($_POST['keywords'])     : '';
            $cat['cat_desc']     = !empty($_POST['cat_desc'])     ? $_POST['cat_desc']           : '';
            $cat['measure_unit'] = !empty($_POST['measure_unit']) ? trim($_POST['measure_unit']) : '';
            $cat['cat_name']     = !empty($_POST['cat_name'])     ? trim($_POST['cat_name'])     : '';
            $cat['is_show']      = !empty($_POST['is_show'])      ? intval($_POST['is_show'])    : 0;
            $cat['show_in_nav']  = !empty($_POST['show_in_nav'])  ? intval($_POST['show_in_nav']): 0;
            $cat['style']        = !empty($_POST['style'])        ? trim($_POST['style'])        : '';
            $cat['grade']        = !empty($_POST['grade'])        ? intval($_POST['grade'])      : 0;
            $cat['filter_attr']  = !empty($_POST['filter_attr'])  ? implode(',', array_unique(array_diff($_POST['filter_attr'],array(0)))) : 0;
            $cat['cat_recommend']  = !empty($_POST['cat_recommend'])  ? $_POST['cat_recommend'] : array();
            
            /* 判断分类名是否重复 */
            if ($cat['cat_name'] != $old_cat_name){
                if (cat_exists($cat['cat_name'],$cat['parent_id'], $cat_id)){
                    $link[] = array('text' =>  '戻る', 'href' => 'javascript:history.back(-1)');
                    $this->sys_msg('同じカテゴリ名が存在した!', 0, $link);
                }
            }
            
            /* 判断上级目录是否合法 */
            $children = array_keys(cat_list($cat_id, 0, false));     // 获得当前分类的所有下级分类
            if (in_array($cat['parent_id'], $children)){
                
                /* 选定的父类是当前分类或当前分类的下级分类 */
               $link[] = array('text' => '戻る', 'href' => 'javascript:history.back(-1)');
               $this->sys_msg('選択した上級カテゴリは現在カテゴリ或いは下級カテゴリに入ることができません!', 0, $link);
            }
            
            
            if($cat['grade'] > 10 || $cat['grade'] < 0)
            {
                /* 价格区间数超过范围 */
               $link[] = array('text' => '戻る', 'href' => 'javascript:history.back(-1)');
               $this->sys_msg('価額階級数は0-10以内してください', 0, $link);
            }
            
            $dat = M()->getRowSql("SELECT cat_name, show_in_nav FROM ". $ecs->table('ec_category') . " WHERE cat_id = '$cat_id'");
            if (M()->autoExecute($ecs->table('ec_category'), $cat, 'UPDATE', "cat_id='$cat_id'")){
                if($cat['cat_name'] != $dat['cat_name']){
                    //如果分类名称发生了改变
                    $sql = "UPDATE " . $ecs->table('ec_nav') . " SET name = '" . $cat['cat_name'] . "' WHERE ctype = 'c' AND cid = '" . $cat_id . "' AND type = 'middle'";
                    M()->exe($sql);
                }
                if($cat['show_in_nav'] != $dat['show_in_nav']){
                    //是否显示于导航栏发生了变化
                    if($cat['show_in_nav'] == 1){
                        //显示
                        $nid = M()->getOne("SELECT id FROM ". $ecs->table('ec_nav') . " WHERE ctype = 'c' AND cid = '" . $cat_id . "' AND type = 'middle'",'id');
                        if(empty($nid)){
                            //不存在
                            $vieworder = M()->getOne("SELECT max(vieworder) FROM ". $ecs->table('ec_nav') . " WHERE type = 'middle'",'max(vieworder)');
                            $vieworder += 2;
                            $uri = ec_build_uri('category', array('cid'=> $cat_id), $cat['cat_name']);
                            $sql = "INSERT INTO " . $ecs->table('ec_nav') . 
                                    " (name,ctype,cid,ifshow,vieworder,opennew,url,type) 
                                    VALUES('" . $cat['cat_name'] . "', 'c', '$cat_id','1','$vieworder','0', '" . $uri . "','middle')";
                        }else{
                            $sql = "UPDATE " . $ecs->table('ec_nav') . " SET ifshow = 1 WHERE ctype = 'c' AND cid = '" . $cat_id . "' AND type = 'middle'";
                        }
                        M()->exe($sql);
                    }else{
                        //去除
                        M()->exe("UPDATE " . $ecs->table('ec_nav') . " SET ifshow = 0 WHERE ctype = 'c' AND cid = '" . $cat_id . "' AND type = 'middle'");
                    }
                }
                
                //更新首页推荐
                $this->insert_cat_recommend($cat['cat_recommend'], $cat_id);
                /* 更新分类信息成功 */
                clear_cache_files(); // 清除缓存
                admin_log($_POST['cat_name'],'変更',  '商品カテゴリ'); // 记录管理员操作
                
                /* 提示信息 */
                $link[] = array('text' => 'リストに戻る', 'href' => U('index',array('act'=>'list')));
                $this->sys_msg('商品カテゴリ変更成功!', 0, $link);
            }
        }
        /*------------------------------------------------------ */
        //-- 批量转移商品分类页面
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'move')
        {
        
            $cat_id = !empty($_REQUEST['cat_id']) ? intval($_REQUEST['cat_id']) : 0;
        
            /* 模板赋值 */
            $this->assign('ur_here',     '商品移行');
            $this->assign('action_link', array('href' => U('index',array('act'=>'list')), 'text' => '商品カテゴリ'));
        
            $this->assign('cat_select', cat_list(0, $cat_id, true));
            $this->assign('form_act',   'move_cat');
        
            /* 显示页面 */
            $this->display('category_move.htm');
        }
        /*------------------------------------------------------ */
        //-- 处理批量转移商品分类的处理程序
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'move_cat'){
                $cat_id        = !empty($_POST['cat_id'])        ? intval($_POST['cat_id'])        : 0;
                $target_cat_id = !empty($_POST['target_cat_id']) ? intval($_POST['target_cat_id']) : 0;
                /* 商品分类不允许为空 */
                if ($cat_id == 0 || $target_cat_id == 0){
                    $link[] = array('text' => '戻る', 'href' => 'javascript:history.back(-1)');
                    $this->sys_msg(L('admin_content_control_index_move_cat1'), 0, $link);
                }
                
                /* 更新商品分类 */
                $sql = "UPDATE " .$ecs->table('ec_goods'). " SET cat_id = '$target_cat_id' ".
                       "WHERE cat_id = '$cat_id'";
                if (M()->exe($sql)){
                    /* 清除缓存 */
                    clear_cache_files();
                    
                    /* 提示信息 */
                    $link[] = array('text' => 'リストに戻る', 'href' => U('index',array('act'=>'list')));
                    $this->sys_msg('商品カテゴリ商品移行成功!', 0, $link);
                }
        
        }
        /*------------------------------------------------------ */
        //-- 编辑排序序号
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'edit_sort_order')
        {
        
            $id = intval($_POST['id']);
            $val = intval($_POST['val']);
        
            if ($this->cat_update($id, array('sort_order' => $val)))
            {
                clear_cache_files(); // 清除缓存
                make_json_result($val);
            }
            else
            {
                make_json_error('DB操作エラー');
            }
        }
        /*------------------------------------------------------ */
        //-- 编辑数量单位
        /*------------------------------------------------------ */
        
        if ($_REQUEST['act'] == 'edit_measure_unit'){
            $id = intval($_POST['id']);
            $val = json_str_iconv($_POST['val']);
        
            if ($this->cat_update($id, array('measure_unit' => $val)))
            {
                clear_cache_files(); // 清除缓存
                make_json_result($val);
            }
            else
            {
                make_json_error('DB操作エラー');
            }
        }
        /*------------------------------------------------------ */
        //-- 编辑排序序号
        /*------------------------------------------------------ */
        
        if ($_REQUEST['act'] == 'edit_grade')
        {

            $id = intval($_POST['id']);
            $val = intval($_POST['val']);
        
            if($val > 10 || $val < 0)
            {
                /* 价格区间数超过范围 */
                make_json_error('価額階級数は0-10以内してください');
            }
        
            if ($this->cat_update($id, array('grade' => $val)))
            {
                clear_cache_files(); // 清除缓存
                make_json_result($val);
            }
            else
            {
                make_json_error('DB操作エラー');
            }
        }
        /*------------------------------------------------------ */
        //-- 切换是否显示在导航栏
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'toggle_show_in_nav'){
            $id = intval($_POST['id']);
            $val = intval($_POST['val']);
            if ($this->cat_update($id, array('show_in_nav' => $val)) != false){
                if($val == 1){
                    //显示
                    $vieworder = M()->getOne("SELECT max(vieworder) FROM ". $ecs->table('ec_nav') . " WHERE type = 'middle'",'max(vieworder)');
                    $vieworder += 2;
                    $catname = M()->getOne("SELECT cat_name FROM ". $ecs->table('ec_category') . " WHERE cat_id = '$id'",'cat_name');
                    //显示在自定义导航栏中
                    //$_CFG['rewrite'] = 0;
                    $uri = ec_build_uri('category', array('cid'=> $id), $catname);
                    $nid = M()->getOne("SELECT id FROM ". $ecs->table('ec_nav') . " WHERE ctype = 'c' AND cid = '" . $id . "' AND type = 'middle'",'id');
                    if(empty($nid)){
                        //不存在
                        $sql = "INSERT INTO " . $ecs->table('ec_nav') . " 
                                    (name,ctype,cid,ifshow,vieworder,opennew,url,type) 
                                    VALUES('" . $catname . "', 'c', '$id','1','$vieworder','0', '" . $uri . "','middle')";
                    }else{
                        $sql = "UPDATE " . $ecs->table('ec_nav') . " 
                                SET ifshow = 1 WHERE ctype = 'c' AND cid = '" . $id . "' AND type = 'middle'";
                    }
                    M()->exe($sql);
                }else{
                    //去除
                    M()->exe("UPDATE " . $ecs->table('ec_nav') . "SET ifshow = 0 WHERE ctype = 'c' AND cid = '" . $id . "' AND type = 'middle'");
                }
                clear_cache_files();
                make_json_result($val);
            }else{
                make_json_error('DB操作エラー');
            }
        }
        /*------------------------------------------------------ */
        //-- 切换是否显示
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'toggle_is_show'){
            $id = intval($_POST['id']);
            $val = intval($_POST['val']);
        
            if ($this->cat_update($id, array('is_show' => $val)) != false)
            {
                clear_cache_files();
                make_json_result($val);
            }
            else
            {
                make_json_error('DB操作エラー');
            }
        }
        /*------------------------------------------------------ */
        //-- 删除商品分类
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'remove'){
            /* 初始化分类ID并取得分类名称 */
            $cat_id   = intval($_GET['id']);
            $cat_name = M()->getOne('SELECT cat_name FROM ' .$ecs->table('ec_category'). " WHERE cat_id='$cat_id'",'cat_name');
            
            /* 当前分类下是否有子分类 */
            $cat_count = M()->getOne('SELECT COUNT(*) FROM ' .$ecs->table('ec_category'). " WHERE parent_id='$cat_id'",'COUNT(*)');
            
            /* 当前分类下是否存在商品 */
            $goods_count = M()->getOne('SELECT COUNT(*) FROM ' .$ecs->table('ec_goods'). " WHERE cat_id='$cat_id'",'COUNT(*)');
            
            /* 如果不存在下级子分类和商品，则删除之 */
            if ($cat_count == 0 && $goods_count == 0){
                /* 删除分类 */
                $sql = 'DELETE FROM ' .$ecs->table('ec_category'). " WHERE cat_id = '$cat_id'";
                if (M()->exe($sql)){
                    M()->exe("DELETE FROM " . $ecs->table('ec_nav') . "WHERE ctype = 'c' AND cid = '" . $cat_id . "' AND type = 'middle'");
                    clear_cache_files();
                    admin_log($cat_name, '削除', '商品カテゴリ');
                }
            }else{
                make_json_error($cat_name .' '. '一番下級カテゴリ或いは該当カテゴリには商品ありから,削除できません!');
            }
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
            ec_header("Location: $url\n");
            exit;
        }

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
        $sql = "SELECT * FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_category'). " WHERE cat_id='$cat_id' LIMIT 1";
        return M()->getRowSql($sql);
    }

    /**
     * 添加商品分类
     *
     * @param   integer $cat_id
     * @param   array   $args
     *
     * @return  mix
     */
    public function cat_update($cat_id, $args)
    {
        if (empty($args) || empty($cat_id))
        {
            return false;
        }
    
        return M()->autoExecute($GLOBALS['ec_globals']['ecs']->table('ec_category'), $args, 'update', "cat_id='$cat_id'");
    }
    
    /**
     * 获取属性列表
     *
     * @access  public
     * @param
     *
     * @return void
     */
    public function get_attr_list()
    {
        $sql = "SELECT a.attr_id, a.cat_id, a.attr_name ".
               " FROM " . $GLOBALS['ec_globals']['ecs']->table('ec_attribute'). " AS a,  ".
               $GLOBALS['ec_globals']['ecs']->table('ec_goods_type') . " AS c ".
               " WHERE  a.cat_id = c.cat_id AND c.enabled = 1 ".
               " ORDER BY a.cat_id , a.sort_order";
    
        $arr = M()->query($sql);
    
        $list = array();
    
        foreach ($arr as $val)
        {
            $list[$val['cat_id']][] = array($val['attr_id']=>$val['attr_name']);
        }
    
        return $list;
    }


    /**
     * 插入首页推荐扩展分类
     *
     * @access  public
     * @param   array   $recommend_type 推荐类型
     * @param   integer $cat_id     分类ID
     *
     * @return void
     */
    public function insert_cat_recommend($recommend_type, $cat_id)
    {
        //检查分类是否为首页推荐
        if (!empty($recommend_type))
        {
            //取得之前的分类
            $recommend_res =M()->getAll("SELECT recommend_type FROM " . $GLOBALS['ec_globals']['ecs']->table("ec_cat_recommend") . " WHERE cat_id=" . $cat_id);
            if (empty($recommend_res))
            {
                foreach($recommend_type as $data)
                {
                    $data = intval($data);
                    M()->exe("INSERT INTO " .  $GLOBALS['ec_globals']['ecs']->table("ec_cat_recommend") . "(cat_id, recommend_type) VALUES ('$cat_id', '$data')");
                }
            }
            else
            {
                $old_data = array();
                foreach($recommend_res as $data)
                {
                    $old_data[] = $data['recommend_type'];
                }
                $delete_array = array_diff($old_data, $recommend_type);
                if (!empty($delete_array))
                {
                    M()->exe("DELETE FROM " . $GLOBALS['ec_globals']['ecs']->table("ec_cat_recommend")  . " WHERE cat_id=$cat_id AND recommend_type " . db_create_in($delete_array));
                }
                $insert_array = array_diff($recommend_type, $old_data);
                if (!empty($insert_array))
                {
                    foreach($insert_array as $data)
                    {
                        $data = intval($data);
                        M()->exe("INSERT INTO " . $GLOBALS['ec_globals']['ecs']->table("ec_cat_recommend") . "(cat_id, recommend_type) VALUES ('$cat_id', '$data')");
                    }
                }
            }
        }
        else
        {
            M()->exe("DELETE FROM ". $GLOBALS['ec_globals']['ecs']->table("ec_cat_recommend") . " WHERE cat_id=" . $cat_id);
        }
    }
    
    
    
    
}
