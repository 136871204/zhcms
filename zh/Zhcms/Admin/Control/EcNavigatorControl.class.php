<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcNavigatorControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
        $this->setPageLang();
	}
    
    public function setPageLang(){
        $_LANG['top'] = 'top';
        $_LANG['middle'] = 'middle';
        $_LANG['bottom'] = 'bottom';
        $this->assign('lang',   $_LANG);
    }
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    $tdb=M();
	    $exc = new exchange($ecs->table("ec_nav"), $tdb, 'id', 'name');
        /*------------------------------------------------------ */
        //-- 自定义导航栏列表
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'list'){
            $this->assign('ur_here', 'ナビカスタマイズ');
            $this->assign('action_link', array('text' => 'ナビ新規', 'href' => U('index',array('act'=>'add'))));
            $this->assign('full_page',  1);
            
            $navdb = $this->get_nav();
            $this->assign('navdb',   $navdb['navdb']);
            $this->assign('filter',       $navdb['filter']);
            $this->assign('record_count', $navdb['record_count']);
            $this->assign('page_count',   $navdb['page_count']);
            $this->display('navigator.htm');
        }
        /*------------------------------------------------------ */
        //-- 自定义导航栏列表Ajax
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query'){
            $navdb = $this->get_nav();
            $this->assign('navdb',    $navdb['navdb']);
            $this->assign('filter',       $navdb['filter']);
            $this->assign('record_count', $navdb['record_count']);
            $this->assign('page_count',   $navdb['page_count']);
            $sort_flag  = sort_flag($navdb['filter']);
            $this->assign($sort_flag['tag'], $sort_flag['img']);
            make_json_result(
                $this->fetch('navigator.htm'), 
                '', 
                array('filter' => $navdb['filter'], 'page_count' => $navdb['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 自定义导航栏增加
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'add'){
            if (empty($_REQUEST['step'])){
                $rt = array('act'=>'add');
                $sysmain = $this->get_sysnav();
                $this->assign('action_link', array('text' => 'リストに戻る', 'href' => U('index',array('act'=>'list'))));
                $this->assign('ur_here', 'ナビ新規');
                $this->assign('sysmain',$sysmain);
                $this->assign('rt', $rt);
                $this->display('navigator_add.htm');
            }
            elseif ($_REQUEST['step'] == 2){
                $item_name = $_REQUEST['item_name'];
                $item_url = $_REQUEST['item_url'];
                $item_ifshow = $_REQUEST['item_ifshow'];
                $item_opennew = $_REQUEST['item_opennew'];
                $item_type = $_REQUEST['item_type'];
                
                $vieworder = M()->getOne("SELECT max(vieworder) FROM ". $ecs->table('ec_nav') . " WHERE type = '". $item_type ."'",'max(vieworder)');
                $item_vieworder = empty($_REQUEST['item_vieworder']) ? $vieworder+1 : $_REQUEST['item_vieworder'];
                
                if($item_ifshow == 1 && $item_type == 'middle'){
                    //echo 'TODO: EcNavigatorControl--1';die;
                    //如果设置为在中部显示
                    $arr = $this->analyse_uri($item_url);  //分析URI
                    //p($arr);die;
                    if($arr){
                        //如果为分类
                        $this->set_show_in_nav($arr['type'], $arr['id'], 1);   //设置显示
                        $sql = "INSERT INTO " . $ecs->table('ec_nav') . " 
                                    (name,ctype,cid,ifshow,vieworder,opennew,url,type) 
                                VALUES
                                    ('$item_name','".$arr['type']."','".$arr['id']."','$item_ifshow','$item_vieworder','$item_opennew','$item_url','$item_type')";
                    }
                }
                
                if(empty($sql))
                {
                    $sql = "INSERT INTO " . $ecs->table('ec_nav') . " 
                                (name,ifshow,vieworder,opennew,url,type) 
                            VALUES('$item_name','$item_ifshow','$item_vieworder','$item_opennew','$item_url','$item_type')";
                }
                M()->exe($sql);
                clear_cache_files();
                
                $links[] = array('text' => 'ナビカスタマイズ', 'href' => U('index',array('act'=>'list')));
                $links[] = array('text' => 'ナビ新規', 'href' => U('index',array('act'=>'add')));
                $this->sys_msg('操作成功', 0, $links);
            }
        }
        /*------------------------------------------------------ */
        //-- 自定义导航栏编辑
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit')   
        {
            $id = $_REQUEST['id'];
            if (empty($_REQUEST['step']))
            {
                $rt = array('act'=>'edit','id'=>$id);
                $row = M()->getRowSql("SELECT * FROM " . $ecs->table('ec_nav') . " WHERE id='$id'");
                $rt['item_name'] = $row['name'];
                $rt['item_url'] = $row['url'];
                $rt['item_vieworder'] = $row['vieworder'];
                $rt['item_ifshow_'.$row['ifshow']] = 'selected';
                $rt['item_opennew_'.$row['opennew']] = 'selected';
                $rt['item_type_'.$row['type']] = 'selected';
        
                $sysmain = $this->get_sysnav();
                $this->assign('action_link', array('text' => '返回列表', 'href' => U('index',array('act'=>'list'))));
                $this->assign('ur_here',  '自定义导航栏');
                //assign_query_info();
                $this->assign('sysmain',$sysmain);
                $this->assign('rt', $rt);
                $this->display('navigator_add.htm');
            }
            elseif ($_REQUEST['step'] == 2)
            {
                $item_name = $_REQUEST['item_name'];
                $item_url = $_REQUEST['item_url'];
                $item_ifshow = $_REQUEST['item_ifshow'];
                $item_opennew = $_REQUEST['item_opennew'];
                $item_type = $_REQUEST['item_type'];
                $item_vieworder = (int)$_REQUEST['item_vieworder'];
                $row = M()->getRowSql("SELECT ctype,cid,ifshow,type FROM " . $ecs->table('ec_nav') . " WHERE id = '$id'");
                $arr = $this->analyse_uri($item_url);
                //p($arr);
                //p($row);die;
                if($arr)
                {
                    //目标为分类
                    if($row['ctype'] == $arr['type'] && $row['cid'] == $arr['id']){
                        //没有修改分类
                        if($item_type != 'middle'){
                            //位置不在中部
                            $this->set_show_in_nav($arr['type'], $arr['id'], 0);
                        }
                    }else
                    {
                        //修改了分类
                        if($row['ifshow'] == 1 && $row['type'] == 'middle')
                        {
                            //原来在中部显示
                            $this->set_show_in_nav($row['ctype'], $row['cid'], 0); //设置成不显示
                        }
                        elseif($row['ifshow'] == 0 && $row['type'] == 'middle')
                        {
                            //原来不显示
                        }
                    }
                    
                    //分类判断
                    if($item_ifshow != $this->is_show_in_nav($arr['type'], $arr['id']) && $item_type == 'middle'){
                        $this->set_show_in_nav($arr['type'], $arr['id'], $item_ifshow);
                    }
                    $sql = "UPDATE " . $ecs->table('ec_nav') .
                            " SET 
                                    name='$item_name',ctype='" . $arr['type'] . "',cid='" . $arr['id'] . "',
                                    ifshow='$item_ifshow',vieworder='$item_vieworder',opennew='$item_opennew',
                                    url='$item_url',type='$item_type' WHERE id='$id'";
                }
                else
                {
                    //目标不是分类
                    if($row['ctype'] && $row['cid'])
                    {
                        //原来是分类
                        $this->set_show_in_nav($row['ctype'], $row['cid'], 0);
                    }
                    $sql = "UPDATE " . $ecs->table('ec_nav') .
                        " SET name='$item_name',ctype='',cid='',ifshow='$item_ifshow',vieworder='$item_vieworder',
                        opennew='$item_opennew',url='$item_url',type='$item_type' WHERE id='$id'";
                }
                M()->exe($sql);
                clear_cache_files();
                $links[] = array('text' => 'ナビカスタマイズ', 'href' => U('index',array('act'=>'list')).'&' . list_link_postfix());
                $this->sys_msg('操作成功', 0, $links);
            }
        }
        /*------------------------------------------------------ */
        //-- 自定义导航栏删除
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'del'){
            $id = (int)$_GET['id'];
            $row = M()->getRowSql("SELECT ctype,cid,type FROM " . $ecs->table('ec_nav') . " WHERE id = '$id' LIMIT 1");
            if($row['type'] == 'middle' && $row['ctype'] && $row['cid'])
            {
                $this->set_show_in_nav($row['ctype'], $row['cid'], 0);
            }
            $sql = " DELETE FROM " . $ecs->table('ec_nav') . " WHERE id='$id' LIMIT 1";
            M()->exe($sql);
            clear_cache_files();
            ec_header("Location: ".U('index',array('act'=>'list'))."\n");
            exit;
            
        }
        /*------------------------------------------------------ */
        //-- 编辑排序
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_sort_order')
        {
        
            $id    = intval($_POST['id']);
            $order = json_str_iconv(trim($_POST['val']));
        
            /* 检查输入的值是否合法 */
            if (!preg_match("/^[0-9]+$/", $order))
            {
                make_json_error(sprintf('数値を入力してください', $order));
            }
            else
            {
                if ($exc->edit("vieworder = '$order'", $id))
                {
                    clear_cache_files();
                    make_json_result(stripslashes($order));
                }
                else
                {
                    make_json_error('DB操作エラー');
                }
            }
        }
        /*------------------------------------------------------ */
        //-- 切换是否显示
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'toggle_ifshow')
        {
            $id = intval($_POST['id']);
            $val = intval($_POST['val']);
        
            $row = M()->getRowSql("SELECT type,ctype,cid FROM " . $ecs->table('ec_nav') . " WHERE id = '$id' LIMIT 1");
        
            if($row['type'] == 'middle' && $row['ctype'] && $row['cid'])
            {
                $this->set_show_in_nav($row['ctype'], $row['cid'], $val);
            }
        
            if ($this->nav_update($id, array('ifshow' => $val)) != false)
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
        //-- 切换是否新窗口
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'toggle_opennew')
        {
            $id = intval($_POST['id']);
            $val = intval($_POST['val']);
        
            if ($this->nav_update($id, array('opennew' => $val)) != false)
            {
                clear_cache_files();
                make_json_result($val);
            }
            else
            {
                make_json_error('DB操作エラー');
            }
        }
	}
    
    
    public function get_nav(){
        
        $result = get_filter();
        if($result === false){
            $filter['sort_by']      = empty($_REQUEST['sort_by']) ? 'type DESC, vieworder' : 'type DESC, '.trim($_REQUEST['sort_by']);
            $filter['sort_order']   = empty($_REQUEST['sort_order']) ? 'ASC' : trim($_REQUEST['sort_order']);
            
            $sql = "SELECT count(*) FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_nav');
            $filter['record_count'] = M()->getOne($sql,'count(*)');
            
            /* 分页大小 */
            $filter = page_and_size($filter);
        
            /* 查询 */
            $sql = "SELECT id, name, ifshow, vieworder, opennew, url, type".
                   " FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_nav').
                   " ORDER by " . $filter['sort_by'] . ' ' . $filter['sort_order'] .
                   " LIMIT " . $filter['start'] . ',' . $filter['page_size'];
            set_filter($filter, $sql);
        }else{
            $sql    = $result['sql'];
            $filter = $result['filter'];
        }
        $navdb = M()->query($sql);
        $type = "";
        $navdb2 = array();
        if(!empty($navdb)){
            foreach($navdb as $k=>$v)
            {
                if(!empty($type) && $type != $v['type'])
                {
                    $navdb2[] = array();
                }
                $navdb2[] = $v;
                $type = $v['type'];
            }
        }
        $arr = array(
                    'navdb' => $navdb2, 
                    'filter' => $filter, 
                    'page_count' => $filter['page_count'], 
                    'record_count' => $filter['record_count']);
        return $arr;
        
    }
    
    /*------------------------------------------------------ */
    //-- 排序相关
    /*------------------------------------------------------ */
    function sort_nav($a,$b)
    {
        return  $a['vieworder'] > $b['vieworder'] ? 1 : -1;
    }
    
    /*------------------------------------------------------ */
    //-- 获得系统列表
    /*------------------------------------------------------ */
    public function get_sysnav(){
        //global $_LANG;
        $sysmain = array(
                    array('カード','http://www.metacms.com/index.php?a=ec&c=EcFlow&m=index'),
                    array('購入センター','pick_out.php'),
                    array('団体購入商品','group_buy.php'),
                    array('商品奇襲','snatch.php'),
                    array('タグ','tag_cloud.php'),
                    array('ユーザセンタ','user.php'),
                    array('ロード', 'wholesale.php'),
                    array('合わせ買い割引', 'activity.php'),
                    array('配達方式', 'myship.php'),
                    array('メッセージ', 'message.php'),
                    array('見積書', 'quotation.php'),
        );
        $sysmain[] = array('-','-');
        
        $catlist = array_merge(cat_list(0, 0, false), array('-'), article_cat_list(0, 0, false));
        foreach($catlist as $key => $val){
            $val['view_name'] = $val['cat_name'];
            for($i=0;$i<$val['level'];$i++)
            {
                $val['view_name'] = '&nbsp;&nbsp;&nbsp;&nbsp;' . $val['view_name'];
            }
            $val['url'] = str_replace( '&amp;', '&', $val['url']);
            $val['url'] = str_replace( '&', '&amp;', $val['url']);
            $sysmain[] = array($val['cat_name'], $val['url'], $val['view_name']);
        }
        return $sysmain;
    }
    
    
    
    /*------------------------------------------------------ */
    //-- 列表项修改
    /*------------------------------------------------------ */
    public function nav_update($id, $args)
    {
        if (empty($args) || empty($id))
        {
            return false;
        }
    
        return M()->autoExecute($GLOBALS['ec_globals']['ecs']->table('ec_nav'), $args, 'update', "id='$id'");
    }
    

    
    
    /*------------------------------------------------------ */
    //-- 根据URI对导航栏项目进行分析，确定其为商品分类还是文章分类
    /*------------------------------------------------------ */
    public function analyse_uri($uri)
    {
        
        $uri = strtolower(str_replace('&amp;', '&', $uri));
        
        $arr = explode('-', $uri);
        
        switch($arr[0])
        {
            case 'category' :
                return array('type' => 'c', 'id' => $arr[1]);
            break;
            case 'article_cat' :
                return array('type' => 'a', 'id' => $arr[1]);
            break;
            default:
    
            break;
        }
    
        list($fn, $pm) = explode('?', $uri);
 
        if(strpos($uri, '&') === FALSE)
        {
            $arr = array($pm);
        }
        else
        {
            $arr = explode('&', $pm);
        }
        //p($pm);die;
        //p(strpos($pm, "c=eccategory"));
        $tfn="";
        if(strpos($pm, "c=eccategory") )
        {
            $tfn='category';
        }else{
            $tfn='';
        }
        switch($tfn)
        {
            case 'category' :
                //商品分类
                foreach($arr as $k => $v)
                {
                    list($key, $val) = explode('=', $v);
                    if($key == 'id')
                    {
                        return array('type' => 'c', 'id'=> $val);
                    }
                }
            break;
            case 'article_cat.php'  :
                //文章分类
                foreach($arr as $k => $v)
                {
                    list($key, $val) = explode('=', $v);
                    if($key == 'id')
                    {
                        return array('type' => 'a', 'id'=> $val);
                    }
                }
            break;
            default:
                //未知
                return false;
            break;
        }
    
    }
    
    /*------------------------------------------------------ */
    //-- 是否显示
    /*------------------------------------------------------ */
    public function is_show_in_nav($type, $id)
    {
        if($type == 'c')
        {
            $tablename = $GLOBALS['ec_globals']['ecs']->table('ec_category');
        }
        else
        {
            $tablename = $GLOBALS['ec_globals']['ecs']->table('ec_article_cat');
        }
        return M()->getOne("SELECT show_in_nav FROM $tablename WHERE cat_id = '$id'",'show_in_nav');
    }
    
    /*------------------------------------------------------ */
    //-- 设置是否显示
    /*------------------------------------------------------ */
    public function set_show_in_nav($type, $id, $val)
    {
        if($type == 'c')
        {
            $tablename = $GLOBALS['ec_globals']['ecs']->table('ec_category');
        }
        else
        {
            $tablename = $GLOBALS['ec_globals']['ecs']->table('ec_article_cat');
        }
        M()->exe("UPDATE $tablename SET show_in_nav = '$val' WHERE cat_id = '$id'");
        clear_cache_files();
    }
	
    
    
}
