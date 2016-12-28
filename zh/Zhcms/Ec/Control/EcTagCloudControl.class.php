<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcTagCloudControl extends EcControl {
    
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
        //echo 'aaa';die;
    }
    
    public function index(){
        header("Content-type:text/html;charset=utf-8");
        $ecs=$GLOBALS['ec_globals']['ecs'];
        $this->assign_template();
        $position = assign_ur_here(0, '标签云');
        
        $this->assign('page_title', $position['title']);    // 页面标题
        $this->assign('ur_here',    $position['ur_here']);  // 当前位置
        $this->assign('categories', get_categories_tree()); // 分类树
        $this->assign('helps',      get_shop_help());       // 网店帮助
        $this->assign('top_goods',  get_top10());           // 销售排行
        $this->assign('promotion_info', get_promotion_info());
        /* 调查 */
        $vote = get_vote();
        if (!empty($vote))
        {
            $this->assign('vote_id', $vote['id']);
            $this->assign('vote',    $vote['content']);
        }
        $this->assign_dynamic('EcTagCloud');
        $tags = get_tags();
        //p($tags);die;
        
        if (!empty($tags))
        {
            //p($tags);die;
            //include_once(ROOT_PATH . 'includes/lib_clips.php');
            color_tag($tags);
        }
        $this->assign('tags', $tags);
        
        $this -> display('template/' . C('WEB_STYLE') . '/ec/tag_cloud.html');

    }
    
	
}
