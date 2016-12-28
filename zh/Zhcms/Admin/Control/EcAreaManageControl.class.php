<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class EcAreaManageControl extends EcAdminControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("EcBrand");
	}
    
	//ブランド一覧
	public function index() {
	    $ecs=$GLOBALS['ec_globals']['ecs'];
	    //$image = new EcImage(C('ec_bgcolor'));
	    $tdb=M();
        $exc = new exchange($ecs->table('ec_region'), $tdb, 'region_id', 'region_name');
        
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
        //-- 列出某地区下的所有地区列表
        /*------------------------------------------------------ */
        if ($_REQUEST['act'] == 'list'){
            /* 取得参数：上级地区id */
            $region_id = empty($_REQUEST['pid']) ? 0 : intval($_REQUEST['pid']);
            $this->assign('parent_id',    $region_id);
            
            /* 取得列表显示的地区的类型 */
            if ($region_id == 0)
            {
                $region_type = 0;
            }
            else
            {
                $region_type = $exc->get_name($region_id, 'region_type') + 1;
            }
            $this->assign('region_type',  $region_type);
            
            /* 获取地区列表 */
            $region_arr = area_list($region_id);
            $this->assign('region_arr',   $region_arr);
            
            /* 当前的地区名称 */
            if ($region_id > 0)
            {
                $area_name = $exc->get_name($region_id);
                $area = '[ '. $area_name . ' ] ';
                if ($region_arr)
                {
                    $area .= $region_arr[0]['type'];
                }
            }
            else
            {
                $area = '一階層地域';
            }
            
            $this->assign('area_here',    $area);

            /* 返回上一级的链接 */
            if ($region_id > 0)
            {
                $parent_id = $exc->get_name($region_id, 'parent_id');
                $action_link = array('text' => '上階層戻る', 'href' => U('index').'&act=list&&pid=' . $parent_id);
            }
            else
            {
                $action_link = '';
            }
            $this->assign('action_link',  $action_link);
            
            /* 赋值模板显示 */
            $this->assign('ur_here',      '地域リスト');
            $this->assign('full_page',    1);
        
            //assign_query_info();
            $this->display('area_list.htm');
        }
        /*------------------------------------------------------ */
        //-- 添加新的地区
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'add_area')
        {
            $parent_id      = intval($_POST['parent_id']);
            $region_name    = json_str_iconv(trim($_POST['region_name']));
            $region_type    = intval($_POST['region_type']);
            
            if (empty($region_name))
            {
                make_json_error('地域名は空には出来ません！');
            }
            
            /* 查看区域是否重复 */
            if (!$exc->is_only('region_name', $region_name, 0, "parent_id = '$parent_id'"))
            {
                make_json_error('同じ名称の地域名がすでに存在!');
            }
            $sql = "INSERT INTO " . $ecs->table('ec_region') . " (parent_id, region_name, region_type) ".
                    "VALUES ('$parent_id', '$region_name', '$region_type')";
            $opid=M()->exe($sql);
            if($opid){
                admin_log($region_name,'新規','地域');
                
                /* 获取地区列表 */
                $region_arr = area_list($parent_id);
                $this->assign('region_arr',   $region_arr);
        
                $this->assign('region_type', $region_type);
        
                make_json_result($this->fetch('area_list.htm'));
            }else{
                make_json_error('地域新規失敗!');
            }
           
        }
        /*------------------------------------------------------ */
        //-- 编辑区域名称
        /*------------------------------------------------------ */
        
        elseif ($_REQUEST['act'] == 'edit_area_name')
        {
            $id = intval($_POST['id']);
            $region_name = json_str_iconv(trim($_POST['val']));
        
            if (empty($region_name))
            {
                make_json_error('地域名は空には出来ません！');
            }
        
            $msg = '';
        
            /* 查看区域是否重复 */
            $parent_id = $exc->get_name($id, 'parent_id');
            if (!$exc->is_only('region_name', $region_name, $id, "parent_id = '$parent_id'"))
            {
                make_json_error('同じ名称の地域名がすでに存在!');
            }
        
            if ($exc->edit("region_name = '$region_name'", $id))
            {
                admin_log($region_name, '変更', '地域');
                make_json_result(stripslashes($region_name));
            }
            else
            {
                make_json_error('DB操作失敗');
            }
        }
        /*------------------------------------------------------ */
        //-- 删除区域
        /*------------------------------------------------------ */
        elseif ($_REQUEST['act'] == 'drop_area')
        {
            $id = intval($_REQUEST['id']);
    
            $sql = "SELECT * FROM " . $ecs->table('ec_region') . " WHERE region_id = '$id'";
            $region = M()->getRowSql($sql);
            
            $region_type=$region['region_type'];
            $delete_region[]=$id;
            $new_region_id  =$id;
            if($region_type<6)
            {
                for($i=1;$i<6-$region_type;$i++)
                {
                     $new_region_id=$this -> new_region_id($new_region_id);
                     if(count($new_region_id))
                     {
                          $delete_region=array_merge($delete_region,$new_region_id);
                     }
                     else
                     {
                         continue;
                     }
                }
            }
            $sql="DELETE FROM ". $ecs->table("ec_region")."WHERE region_id".db_create_in($delete_region);
            M()->exe($sql);
            if ($exc->drop($id))
            {
                admin_log(addslashes($region['region_name']), '削除', '地域');

                /* 获取地区列表 */
                $region_arr = area_list($region['parent_id']);
                $this->assign('region_arr',   $region_arr);
                $this->assign('region_type', $region['region_type']);
        
                make_json_result($this->fetch('area_list.htm'));
            }
            else
            {
                make_json_error('DB操作失敗');
            }
        }
        
                
	}
    
    
	public function new_region_id($region_id)
    {
        $regions_id=array();
        if(empty($region_id))
        {
            return $regions_id;
        }
        $sql="SELECT region_id FROM ". $GLOBALS['ec_globals']['ecs']->table("ec_region").
            " WHERE parent_id ".db_create_in($region_id);
        $result=M()->query($sql);
        if(!empty($result)){
            foreach($result as $val)
            {
                $regions_id[]=$val['region_id'];
            }
        }
        
        return $regions_id;
    }
    
    
    
}
