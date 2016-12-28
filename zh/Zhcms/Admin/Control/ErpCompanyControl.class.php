<?php
/**
 * 商品类型
 * @author 周鸿 <136871204@qq.com>
 */
class ErpCompanyControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("GoodsType");
        //$this->setPageLang();
	}
    
    /*public function setPageLang(){
        
        $_LANG['arr_goods_status'][0] = '禁用';
        $_LANG['arr_goods_status'][1] = '启用';
        $this->assign('lang',   $_LANG);
    }*/
    
    
    public function index(){
        $ecs=$GLOBALS['ec_globals']['ecs'];
        $tdb=M();
	    $exc = new exchange($ecs->table("ec_erp_company"), $tdb, 'company_id', 'company_name');
        /*------------------------------------------------------ */
        //-- 管理界面
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'manage'){
            $this->assign('ur_here',          '公司管理');
            $this->assign('full_page',        1);
            $company_list = $this->get_company();


            $this->assign('company_list',   $company_list['list']);
            $this->assign('filter',       $company_list['filter']);
            $this->assign('record_count', $company_list['record_count']);
            $this->assign('page_count',   $company_list['page_count']);


            $this->assign('action_link',      array('text' => '添加公司', 'href' => U('index',array('act'=>'add'))));

            $this->display('company_list.htm');
            
        }
        /*------------------------------------------------------ */
        //-- 获得列表
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'query')
        {
            $company_list = $this->get_company();
        
            $this->assign('company_list',   $company_list['type']);
            $this->assign('filter',       $company_list['filter']);
            $this->assign('record_count', $company_list['record_count']);
            $this->assign('page_count',   $company_list['page_count']);
        
            make_json_result($this->fetch('company_list.htm'), '',
                array('filter' => $company_list['filter'], 'page_count' => $company_list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 添加商品类型
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'add'){
            $this->assign('ur_here',     '添加公司');
            $this->assign('action_link', array('href'=>U('index',array('act'=>'manage')), 'text' => '公司列表'));
            $this->assign('action',      'add');
            $this->assign('form_act',    'insert');
            $this->display('company_info.htm');
        }
        elseif ($_REQUEST['act'] == 'insert')
        {

            $company['company_name']   = sub_str($_POST['company_name'], 255);
            $company['company_login_id']   = $_POST['company_login_id'];
            $company['company_pw']   = $_POST['company_pw'];
            $company['company_points']   = isset($_POST['company_points']) ? intval($_POST['company_points']) : '0';  

            if (M()->autoExecute($ecs->table('erp_company'), $company) !== false)
            {
                $links = array(array('href' => U('index',array('act'=>'manage')), 'text' => '公司列表'));
                $this->sys_msg('添加公司成功', 0, $links);
            }
            else
            {
                $this->sys_msg('DB错误', 1);
            }
        }
        /*------------------------------------------------------ */
        //-- 编辑商品类型
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'edit')
        {
            $company = $this->get_company_info(intval($_GET['company_id']));
        
            if (empty($company))
            {
                $this->sys_msg('公司不存在', 1);
            }
        
        
            $this->assign('ur_here',    '编辑公司');
            $this->assign('action_link', array('href'=>U('index',array('act'=>'manage')), 'text' => '公司列表'));
            $this->assign('action',      'add');
            $this->assign('form_act',    'update');
            $this->assign('company',  $company);
        

            $this->display('company_info.htm');
        }
        
        
        
        elseif ($_REQUEST['act'] == 'update'){
            $company['company_name']   = sub_str($_POST['company_name'], 255);
            $company['company_login_id']   = $_POST['company_login_id'];
            $company['company_pw']   = $_POST['company_pw'];
            $company['company_points']   = isset($_POST['company_points']) ? intval($_POST['company_points']) : '0';  
            
            
            $company_id                   = intval($_POST['company_id']);
            
            //$old_groups               = get_attr_groups($cat_id);
            if (M()->autoExecute($ecs->table('erp_company'), $company, 'UPDATE', "company_id='$company_id'") !== false){
                /*// 对比原来的分组 
                $new_groups = explode("\n", str_replace("\r", '', $goods_type['attr_group']));  // 新的分组
                foreach ($old_groups AS $key=>$val){
                    $found = array_search($val, $new_groups);
                    if ($found === NULL || $found === false)
                    {
                       //老的分组没有在新的分组中找到 
                        $this->update_attribute_group($cat_id, $key, 0);
                    }
                    else
                    {
                        // 老的分组出现在新的分组中了 
                        if ($key != $found)
                        {
                            $this->update_attribute_group($cat_id, $key, $found); // 但是分组的key变了,需要更新属性的分组
                        }
                    }
                }*/
                $links = array(array('href' => U('index',array('act'=>'manage')), 'text' => '公司列表'));
                $this->sys_msg('修改公司成功', 0, $links);
            }else{
                $this->sys_msg('DB错误', 1);
            }
        }
        /*------------------------------------------------------ */
        //-- 删除商品类型
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'remove'){
            $id = intval($_GET['id']);
            $name = $exc->get_name($id);
            if ($exc->drop($id)){
                admin_log(addslashes($name), L('admin_ecgoodstype_control_index_list9'), L('admin_ecgoodstype_common1'));
                /* 清除该类型下的所有属性 */
                $sql = "SELECT attr_id FROM " .$ecs->table('ec_attribute'). " WHERE cat_id = '$id'";
                $arr = M()->getCol($sql,'attr_id');
                M()->exe("DELETE FROM " .$ecs->table('ec_attribute'). " WHERE attr_id " . db_create_in($arr));
                M()->exe("DELETE FROM " .$ecs->table('ec_goods_attr'). " WHERE attr_id " . db_create_in($arr));
                $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
                ec_header("Location: $url\n");
                exit;
            }else{
                make_json_error(L('admin_ecgoodstype_control_index_list10'));
            }
        }
    }
    
//-----------------------------------------------

    public function get_company(){
        $result = get_filter();
        if ($result === false){
            /* 分页大小 */
            $filter = array();
            /* 记录总数以及页数 */
            $sql = "SELECT COUNT(*) FROM ".$GLOBALS['ec_globals']['ecs']->table('erp_company');
            $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
            $filter = page_and_size($filter);
            /* 查询记录 */
            $sql = "SELECT t.*, COUNT(a.company_id) AS log_count ".
                   "FROM ". $GLOBALS['ec_globals']['ecs']->table('erp_company'). " AS t ".
                   "LEFT JOIN ". $GLOBALS['ec_globals']['ecs']->table('erp_points_log'). " AS a ON a.company_id=t.company_id ".
                   "GROUP BY t.company_id " .
                   'LIMIT ' . $filter['start'] . ',' . $filter['page_size'];
            set_filter($filter, $sql);
        }else{
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        $all = M()->query($sql);
        /*foreach ($all AS $key=>$val)
        {
            $all[$key]['attr_group'] = strtr($val['attr_group'], array("\r" => '', "\n" => ", "));
        }*/
        return array(
                'list' => $all, 
                'filter' => $filter, 
                'page_count' => $filter['page_count'], 
                'record_count' => $filter['record_count']);
    }


    public function get_company_info($company_id)
    {
        $sql = "SELECT * FROM " .$GLOBALS['ec_globals']['ecs']->table('erp_company'). " WHERE company_id='$company_id'";
    
        return M()->getRowSql($sql);
    }
//----------------------------------------------    

    
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
