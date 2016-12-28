<?php
/**
 * 商品类型
 * @author 周鸿 <136871204@qq.com>
 */
class EcAdPositionControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("Attribute");
	}
    
    public function index(){
        $ecs=$GLOBALS['ec_globals']['ecs'];
	    $tdb=M();
	    $exc = new exchange($ecs->table("ec_ad_position"), $tdb, 'position_id', 'position_name');
        /*------------------------------------------------------ */
        //-- 广告位置列表
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'list'){
            $this->assign('ur_here',     '广告位置');
            $this->assign('action_link', array('text' => '添加广告位', 'href' =>U('index',array('act'=>'add'))));
            $this->assign('full_page',   1);
            
            $position_list = $this->ad_position_list();
            
            $this->assign('position_list',   $position_list['position']);
            $this->assign('filter',          $position_list['filter']);
            $this->assign('record_count',    $position_list['record_count']);
            $this->assign('page_count',      $position_list['page_count']);
            
            $this->display('ad_position_list.htm');

        }
        /*------------------------------------------------------ */
        //-- 添加广告位页面
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'add'){
            /* 模板赋值 */
            $this->assign('ur_here',     '添加广告位');
            $this->assign('form_act',    'insert');
            
            $this->assign('action_link', array('href' => U('index',array('act'=>'list')), 'text' => '广告位置'));
            $this->assign('posit_arr',   
                        array(
                            'position_style' => '<table cellpadding="0" cellspacing="0">' ."\n". 
                                                    '<foreach from="$ads" value="$ad">' ."\n". 
                                                        '<tr><td>{$ad}</td></tr>' ."\n". 
                                                    '</foreach>' ."\n". 
                                                '</table>'));
            $this->display('ad_position_info.htm');
        }
        elseif ($_REQUEST['act'] == 'insert'){
            /* 对POST上来的值进行处理并去除空格 */
            $position_name = !empty($_POST['position_name']) ? trim($_POST['position_name']) : '';
            $position_desc = !empty($_POST['position_desc']) ? nl2br(htmlspecialchars($_POST['position_desc'])) : '';
            $ad_width      = !empty($_POST['ad_width'])      ? intval($_POST['ad_width'])  : 0;
            $ad_height     = !empty($_POST['ad_height'])     ? intval($_POST['ad_height']) : 0;
            /* 查看广告位是否有重复 */
            if ($exc->num("position_name", $position_name) == 0){
                /* 将广告位置的信息插入数据表 */
                $sql = 'INSERT INTO '.$ecs->table('ec_ad_position').
                        ' (position_name, ad_width, ad_height, position_desc, position_style) '.
                        "VALUES ('$position_name', '$ad_width', '$ad_height', '$position_desc', '$_POST[position_style]')";
                M()->exe($sql);
                /* 记录管理员操作 */
                admin_log($position_name, '添加', '广告位置');
                /* 提示信息 */
                $link[0]['text'] ='添加广告';
                $link[0]['href'] = U('index',array('act'=>'add'));
                
                $link[1]['text'] = '继续添加广告位';
                $link[1]['href'] = U('index',array('act'=>'add'));
        
                $link[2]['text'] = '返回广告位列表';
                $link[2]['href'] = U('index',array('act'=>'list'));
                
                $this->sys_msg('添加' . "&nbsp;" . stripslashes($position_name) . "&nbsp;" . '操作成功!', 0, $link);
        
            }else
            {
                $link[] = array('text' => '返回上一页', 'href' => 'javascript:history.back(-1)');
                $this->sys_msg('此广告位已经存在了!', 0, $link);
            } 
        }
        /*------------------------------------------------------ */
        //-- 广告位编辑页面
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit'){
            $id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
            /* 获取广告位数据 */
            $sql = 'SELECT * FROM ' .$ecs->table('ec_ad_position'). " WHERE position_id='$id'";
            $posit_arr = M()->getRowSql($sql);
            
            $this->assign('ur_here',     '编辑广告位');
            $this->assign('action_link', array('href' => U('index',array('act'=>'list')), 'text' => '广告位置'));
            $this->assign('posit_arr',   $posit_arr);
            $this->assign('form_act',    'update');
            $this->display('ad_position_info.htm');
        }
        elseif ($_REQUEST['act'] == 'update')
        {
            /* 对POST上来的值进行处理并去除空格 */
            $position_name = !empty($_POST['position_name']) ? trim($_POST['position_name']) : '';
            $position_desc = !empty($_POST['position_desc']) ? nl2br(htmlspecialchars($_POST['position_desc'])) : '';
            $ad_width      = !empty($_POST['ad_width'])      ? intval($_POST['ad_width'])  : 0;
            $ad_height     = !empty($_POST['ad_height'])     ? intval($_POST['ad_height']) : 0;
            $position_id   = !empty($_POST['id'])            ? intval($_POST['id'])        : 0;
            /* 查看广告位是否与其它有重复 */
            $sql = 'SELECT COUNT(*) FROM ' .$ecs->table('ec_ad_position').
                   " WHERE position_name = '$position_name' AND position_id <> '$position_id'";
            if (M()->getOne($sql,'COUNT(*)') == 0){
                $sql = "UPDATE " .$ecs->table('ec_ad_position'). " SET ".
                       "position_name    = '$position_name', ".
                       "ad_width         = '$ad_width', ".
                       "ad_height        = '$ad_height', ".
                       "position_desc    = '$position_desc', ".
                       "position_style   = '$_POST[position_style]' ".
                       "WHERE position_id = '$position_id'";
                if (M()->exe($sql)){
                    /* 记录管理员操作 */
                    admin_log($position_name, '编辑', '广告位置');
                    /* 清除缓存 */
                    clear_cache_files();
                    
                    /* 提示信息 */
                    $link[] = array('text' => '返回广告位列表', 'href' => U('index',array('act'=>'list')));
                    $this->sys_msg('编辑' . ' ' .stripslashes($position_name).' '. '操作成功!', 0, $link);
                }
            }else
            {
                $link[] = array('text' => '返回上一页', 'href' => 'javascript:history.back(-1)');
                $this->sys_msg('此广告位已经存在了!', 0, $link);
            }
        }
        /*------------------------------------------------------ */
        //-- 排序、分页、查询
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'query'){
            $position_list = $this->ad_position_list();
            
            $this->assign('position_list',   $position_list['position']);
            $this->assign('filter',          $position_list['filter']);
            $this->assign('record_count',    $position_list['record_count']);
            $this->assign('page_count',      $position_list['page_count']);
            
            make_json_result($this->fetch('ad_position_list.htm'), '',
            array('filter' => $position_list['filter'], 'page_count' => $position_list['page_count']));
        }
        /*------------------------------------------------------ */
        //-- 编辑广告位置名称
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_position_name')
        {
        
            $id     = intval($_POST['id']);
            $position_name   = json_str_iconv(trim($_POST['val']));
        
            /* 检查名称是否重复 */
            if ($exc->num("position_name", $position_name, $id) != 0)
            {
                make_json_error(sprintf('此广告位 %s 已经存在了!', $position_name));
            }
            else
            {
                if ($exc->edit("position_name = '$position_name'", $id))
                {
                    admin_log($position_name,'修改','广告位置');
                    make_json_result(stripslashes($position_name));
                }
                else
                {
                    make_json_result(sprintf('品牌 %s 修改失败！', $position_name));
                }
            }
        }
        /*------------------------------------------------------ */
        //-- 编辑广告位宽高
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_ad_width')
        {
            $id         = intval($_POST['id']);
            $ad_width   = json_str_iconv(trim($_POST['val']));
        
            /* 宽度值必须是数字 */
            if (!preg_match("/^[\.0-9]+$/",$ad_width))
            {
                make_json_error('广告位的宽度必须是一个数字!');
            }
        
            /* 广告位宽度应在1-1024之间 */
            if ($ad_width > 1024 || $ad_width < 1)
            {
                make_json_error('广告位的宽度值必须在1到1024之间!');
            }
        
            if ($exc->edit("ad_width = '$ad_width'", $id))
            {
                clear_cache_files(); // 清除模版缓存
                admin_log($ad_width, '修改', '广告位置');
                make_json_result(stripslashes($ad_width));
            }
            else
            {
                make_json_error('数据库处理失败');
            }
        }
        /*------------------------------------------------------ */
        //-- 编辑广告位宽高
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'edit_ad_height')
        {
        
            $id         = intval($_POST['id']);
            $ad_height  = json_str_iconv(trim($_POST['val']));
        
            /* 高度值必须是数字 */
            if (!preg_match("/^[\.0-9]+$/",$ad_height))
            {
                make_json_error('广告位的高度必须是一个数字!');
            }
        
            /* 广告位宽度应在1-1024之间 */
            if ($ad_height > 1024 || $ad_height < 1)
            {
                make_json_error('广告位的高度值必须在1到1024之间!');
            }
        
            if ($exc->edit("ad_height = '$ad_height'", $id))
            {
                clear_cache_files(); // 清除模版缓存
                admin_log($ad_height, '修改', '广告位置');
                make_json_result(stripslashes($ad_height));
            }
            else
            {
                make_json_error($db->error());
            }
        }
        /*------------------------------------------------------ */
        //-- 删除广告位置
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'remove')
        {
        
            $id = intval($_GET['id']);
        
            /* 查询广告位下是否有广告存在 */
            $sql = "SELECT COUNT(*) FROM " .$GLOBALS['ec_globals']['ecs']->table('ec_ad'). " WHERE position_id = '$id'";
        
            if (M()->getOne($sql,'COUNT(*)') > 0)
            {
                make_json_error('该广告位已经有广告存在,不能删除!');
            }
            else
            {
                $exc->drop($id);
                admin_log('', '删除', '广告位置');
            }
        
            $url = 'index.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
        
            ec_header("Location: $url\n");
            exit;
        }

    }
    
    /* 获取广告位置列表 */
    public function ad_position_list(){
        $filter = array();
        /* 记录总数以及页数 */
        $sql = 'SELECT COUNT(*) FROM ' . $GLOBALS['ec_globals']['ecs']->table('ec_ad_position');
        $filter['record_count'] = M()->getOne($sql,'COUNT(*)');
        $filter = page_and_size($filter);
        
        /* 查询数据 */
        $arr = array();
        $sql = 'SELECT * FROM ' .$GLOBALS['ec_globals']['ecs']->table('ec_ad_position'). ' ORDER BY position_id DESC';
        $res = M()->selectLimit($sql, $filter['page_size'], $filter['start']);
        if(!empty($res)){
            foreach($res as $rows){
                $position_desc = !empty($rows['position_desc']) ? sub_str($rows['position_desc'], 50, true) : '';
                $rows['position_desc'] = nl2br(htmlspecialchars($position_desc));
        
                $arr[] = $rows;
            }   
        }
        //p($arr);
        return array(
                    'position' => $arr, 
                    'filter' => $filter, 
                    'page_count' => $filter['page_count'], 
                    'record_count' => $filter['record_count']);
    }
   

	
    
    
}
