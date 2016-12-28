<?php
/**
 * 商品类型
 * @author 周鸿 <136871204@qq.com>
 */
class EcGoodsTypeControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("GoodsType");
        $this->setPageLang();
	}
    
    public function setPageLang(){
        
        $_LANG['arr_goods_status'][0] = '禁用';
        $_LANG['arr_goods_status'][1] = '启用';
        $this->assign('lang',   $_LANG);
    }
    
    
    public function index(){
        $ecs=$GLOBALS['ec_globals']['ecs'];
        $tdb=M();
	    $exc = new exchange($ecs->table("ec_goods_type"), $tdb, 'cat_id', 'cat_name');
        /*------------------------------------------------------ */
        //-- 管理界面
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'manage'){
            $this->assign('ur_here',          '商品タイプ');
            $this->assign('full_page',        1);
            $good_type_list = $this->get_goodstype();
            $good_in_type = '';
            $this->assign('goods_type_arr',   $good_type_list['type']);
            $this->assign('filter',       $good_type_list['filter']);
            $this->assign('record_count', $good_type_list['record_count']);
            $this->assign('page_count',   $good_type_list['page_count']);
            $query = M()->query("SELECT 
                                        a.cat_id 
                                    FROM 
                                        " . $ecs->table('ec_attribute') . " AS a 
                                        RIGHT JOIN " . $ecs->table('ec_goods_attr') . " AS g ON g.attr_id = a.attr_id 
                                    GROUP BY a.cat_id");
            if(!empty($query)){
                foreach($query as $row){
                    $good_in_type[$row['cat_id']]=1;
                }
            }
            $this->assign('good_in_type', $good_in_type);
            $this->assign('action_link',      array('text' => '商品タイプ新規', 'href' => U('index',array('act'=>'add'))));

            $this->display('goods_type.htm');
            
        }
        /*------------------------------------------------------ */
        //-- 获得列表
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'query')
        {
            $good_type_list = $this->get_goodstype();
        
            $this->assign('goods_type_arr',   $good_type_list['type']);
            $this->assign('filter',       $good_type_list['filter']);
            $this->assign('record_count', $good_type_list['record_count']);
            $this->assign('page_count',   $good_type_list['page_count']);
        
            make_json_result($this->fetch('goods_type.htm'), '',
                array('filter' => $good_type_list['filter'], 'page_count' => $good_type_list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 修改商品类型名称
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_type_name')
        {
        
            $type_id   = !empty($_POST['id'])  ? intval($_POST['id']) : 0;
            $type_name = !empty($_POST['val']) ? json_str_iconv(trim($_POST['val']))  : '';
        
            /* 检查名称是否重复 */
            $is_only = $exc->is_only('cat_name', $type_name, $type_id);
        
            if ($is_only)
            {
                $exc->edit("cat_name='$type_name'", $type_id);
        
                admin_log($type_name, '変更', '商品タイプ');
        
                make_json_result(stripslashes($type_name));
            }
            else
            {
                make_json_error('同じ商品タイプが存在している。');
            }
        }
        /*------------------------------------------------------ */
        //-- 添加商品类型
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'add'){
            $this->assign('ur_here',     '商品タイプ新規');
            $this->assign('action_link', array('href'=>U('index',array('act'=>'manage')), 'text' => '商品タイプリスト'));
            $this->assign('action',      'add');
            $this->assign('form_act',    'insert');
            $this->assign('goods_type',  array('enabled' => 1));
            $this->display('goods_type_info.htm');
        }
        elseif ($_REQUEST['act'] == 'insert')
        {
            //$goods_type['cat_name']   = trim_right(sub_str($_POST['cat_name'], 60));
            //$goods_type['attr_group'] = trim_right(sub_str($_POST['attr_group'], 255));
            $goods_type['cat_name']   = sub_str($_POST['cat_name'], 60);
            $goods_type['attr_group'] = sub_str($_POST['attr_group'], 255);
            $goods_type['enabled']    = intval($_POST['enabled']);
            //p($goods_type);die;
            if (M()->autoExecute($ecs->table('ec_goods_type'), $goods_type) !== false)
            {
                $links = array(array('href' => U('index',array('act'=>'manage')), 'text' => '商品タイプリストに戻る'));
                $this->sys_msg('商品タイプ新規成功。', 0, $links);
            }
            else
            {
                $this->sys_msg('商品タイプ失敗。', 1);
            }
        }
        /*------------------------------------------------------ */
        //-- 编辑商品类型
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'edit')
        {
            $goods_type = $this->get_goodstype_info(intval($_GET['cat_id']));
        
            if (empty($goods_type))
            {
                $this->sys_msg('指定した商品タイプが見つかりません。', 1);
            }
        
        
            $this->assign('ur_here',    '商品タイプ変更');
            $this->assign('action_link', array('href'=>U('index',array('act'=>'manage')), 'text' => '商品タイプリスト'));
            $this->assign('action',      'add');
            $this->assign('form_act',    'update');
            $this->assign('goods_type',  $goods_type);
        

            $this->display('goods_type_info.htm');
        }
        elseif ($_REQUEST['act'] == 'update'){
            $goods_type['cat_name']   = sub_str($_POST['cat_name'], 60);
            $goods_type['attr_group'] = sub_str($_POST['attr_group'], 255);
            $goods_type['enabled']    = intval($_POST['enabled']);
            $cat_id                   = intval($_POST['cat_id']);
            $old_groups               = get_attr_groups($cat_id);
            if (M()->autoExecute($ecs->table('ec_goods_type'), $goods_type, 'UPDATE', "cat_id='$cat_id'") !== false){
                /* 对比原来的分组 */
                $new_groups = explode("\n", str_replace("\r", '', $goods_type['attr_group']));  // 新的分组
                foreach ($old_groups AS $key=>$val){
                    $found = array_search($val, $new_groups);
                    if ($found === NULL || $found === false)
                    {
                        /* 老的分组没有在新的分组中找到 */
                        $this->update_attribute_group($cat_id, $key, 0);
                    }
                    else
                    {
                        /* 老的分组出现在新的分组中了 */
                        if ($key != $found)
                        {
                            $this->update_attribute_group($cat_id, $key, $found); // 但是分组的key变了,需要更新属性的分组
                        }
                    }
                }
                $links = array(array('href' => U('index',array('act'=>'manage')), 'text' => '商品タイプリストに戻る'));
                $this->sys_msg('商品タイプ変更成功。', 0, $links);
            }else{
                $this->sys_msg('商品タイプ変更失敗。', 1);
            }
        }
        /*------------------------------------------------------ */
        //-- 删除商品类型
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'remove'){
            $id = intval($_GET['id']);
            $name = $exc->get_name($id);
            if ($exc->drop($id)){
                admin_log(addslashes($name), '削除', '商品タイプ');
                /* 清除该类型下的所有属性 */
                $sql = "SELECT attr_id FROM " .$ecs->table('ec_attribute'). " WHERE cat_id = '$id'";
                $arr = M()->getCol($sql,'attr_id');
                M()->exe("DELETE FROM " .$ecs->table('ec_attribute'). " WHERE attr_id " . db_create_in($arr));
                M()->exe("DELETE FROM " .$ecs->table('ec_goods_attr'). " WHERE attr_id " . db_create_in($arr));
                $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
                ec_header("Location: $url\n");
                exit;
            }else{
                make_json_error('商品タイプ削除失敗。');
            }
        }
    }
    
    

    
    /**
     * 获得所有商品类型
     *
     * @access  public
     * @return  array
     */
    public function get_goodstype(){
        $result = get_filter();
        if ($result === false){
            /* 分页大小 */
            $filter = array();
            /* 记录总数以及页数 */
            $sql = "SELECT COUNT(*) FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_goods_type');
            $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
            $filter = page_and_size($filter);
            /* 查询记录 */
            $sql = "SELECT t.*, COUNT(a.cat_id) AS attr_count ".
                   "FROM ". $GLOBALS['ec_globals']['ecs']->table('ec_goods_type'). " AS t ".
                   "LEFT JOIN ". $GLOBALS['ec_globals']['ecs']->table('ec_attribute'). " AS a ON a.cat_id=t.cat_id ".
                   "GROUP BY t.cat_id " .
                   'LIMIT ' . $filter['start'] . ',' . $filter['page_size'];
            set_filter($filter, $sql);
        }else{
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        $all = M()->query($sql);
        foreach ($all AS $key=>$val)
        {
            $all[$key]['attr_group'] = strtr($val['attr_group'], array("\r" => '', "\n" => ", "));
        }
        return array(
                'type' => $all, 
                'filter' => $filter, 
                'page_count' => $filter['page_count'], 
                'record_count' => $filter['record_count']);
    }

    
    /**
     * 获得指定的商品类型的详情
     *
     * @param   integer     $cat_id 分类ID
     *
     * @return  array
     */
    public function get_goodstype_info($cat_id)
    {
        $sql = "SELECT * FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_goods_type'). " WHERE cat_id='$cat_id'";
    
        return M()->getRowSql($sql);
    }
    
    /**
     * 更新属性的分组
     *
     * @param   integer     $cat_id     商品类型ID
     * @param   integer     $old_group
     * @param   integer     $new_group
     *
     * @return  void
     */
    public function update_attribute_group($cat_id, $old_group, $new_group)
    {
        $sql = "UPDATE " . $GLOBALS['ec_globals']['ecs']->table('ec_attribute') .
                " SET attr_group='$new_group' WHERE cat_id='$cat_id' AND attr_group='$old_group'";
        M()->exe($sql);
    }
    
    
    
}
