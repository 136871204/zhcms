<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcActivityControl extends EcControl {
    
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
        //echo 'aaa';die;
    }
    
    public function index(){
        header("Content-type:text/html;charset=utf-8");
        $ecs=$GLOBALS['ec_globals']['ecs'];
       
       
        $this -> assign_template();
        $position = assign_ur_here(0, '活动列表');
        $this->assign('page_title',       $position['title']);    // 页面标题
        $this->assign('ur_here',          $position['ur_here']);  // 当前位置
        
        // 数据准备
        /* 取得用户等级 */
        $user_rank_list = array();
        $user_rank_list[0] = '非会员';
        $sql = "SELECT rank_id, rank_name FROM " . $ecs->table('ec_user_rank');
        $res = M()->query($sql);
        if(!empty($res))
        {
            foreach($res as $row)
            {
                $user_rank_list[$row['rank_id']] = $row['rank_name'];
            }
        }
        // 开始工作
        $sql = "SELECT * FROM " . $ecs->table('ec_favourable_activity'). " ORDER BY `sort_order` ASC,`end_time` DESC";
        $res = M()->query($sql);
        
        $list = array();
        
        if(!empty($res))
        {
            foreach($res as $row)
            {
                $row['start_time']  = local_date('Y-m-d H:i', $row['start_time']);
                $row['end_time']    = local_date('Y-m-d H:i', $row['end_time']);
                //享受优惠会员等级
                $user_rank = explode(',', $row['user_rank']);
                $row['user_rank'] = array();
                foreach($user_rank as $val)
                {
                    if (isset($user_rank_list[$val]))
                    {
                        $row['user_rank'][] = $user_rank_list[$val];
                    }
                }
                //优惠范围类型、内容
                if ($row['act_range'] != FAR_ALL && !empty($row['act_range_ext']))
                {
                    if ($row['act_range'] == FAR_CATEGORY)
                    {
                        $row['act_range'] = '以下分类';
                        $row['program'] = U('ec/EcCategory/index').'&id=';
                        $sql = "SELECT cat_id AS id, cat_name AS name FROM " . $ecs->table('ec_category') .
                            " WHERE cat_id " . db_create_in($row['act_range_ext']);
                    }
                    elseif ($row['act_range'] == FAR_BRAND)
                    {
                        $row['act_range'] = '以下品牌';
                        $row['program'] = U('ec/EcBrand/index').'&id=';
                        $sql = "SELECT brand_id AS id, brand_name AS name FROM " . $ecs->table('ec_brand') .
                            " WHERE brand_id " . db_create_in($row['act_range_ext']);
                    }
                    else
                    {
                        $row['act_range'] = '以下商品';
                        $row['program'] = U('ec/EcGoods/index').'&id=';
                        $sql = "SELECT goods_id AS id, goods_name AS name FROM " . $ecs->table('goods') .
                            " WHERE goods_id " . db_create_in($row['act_range_ext']);
                    }
                    $act_range_ext = M()->getAll($sql);
                    $row['act_range_ext'] = $act_range_ext;
                }
                else
                {
                    $row['act_range'] = '全部商品';
                }
                
                //优惠方式
                switch($row['act_type'])
                {
                    case 0:
                        $row['act_type'] = '享受赠品（特惠品）';
                        $row['gift'] = unserialize($row['gift']);
                        if(is_array($row['gift']))
                        {
                            foreach($row['gift'] as $k=>$v)
                            {
                                $row['gift'][$k]['thumb'] = get_image_path($v['id'], M()->getOne("SELECT goods_thumb FROM " . $ecs->table('ec_goods') . " WHERE goods_id = '" . $v['id'] . "'",'goods_thumb'), true);
                            }
                        }
                        break;
                    case 1:
                        $row['act_type'] = '享受现金减免';
                        $row['act_type_ext'] .= '元';
                        $row['gift'] = array();
                        break;
                    case 2:
                        $row['act_type'] = '享受价格折扣';
                        $row['act_type_ext'] .= "%";
                        $row['gift'] = array();
                        break;
                }
    
                $list[] = $row;
                
            }
        }
        //p($list);die;
        $this->assign('list',             $list);
        $this->assign('helps',            get_shop_help());       // 网店帮助

        $this -> display('template/' . C('WEB_STYLE') . '/ec/activity.html');
            
    }
    
	
}
