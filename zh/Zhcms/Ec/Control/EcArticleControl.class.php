<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcArticleControl extends EcControl {
    
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
        //echo 'aaa';die;
    }
    
    public function index(){
        //header("Content-type:text/html;charset=utf-8");
        $ecs=$GLOBALS['ec_globals']['ecs'];
        $_REQUEST['id'] = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
        $article_id     = $_REQUEST['id'];
        if(isset($_REQUEST['cat_id']) && $_REQUEST['cat_id'] < 0)
        {
            $article_id = M()->getOne("SELECT article_id 
                                        FROM " . $ecs->table('ec_article') . " 
                                        WHERE cat_id = '".intval($_REQUEST['cat_id'])."' ",'article_id');
        }
        
        /* 文章详情 */
        $article = $this -> get_article_info($article_id);
        
        if (empty($article))
        {
            ec_header("Location: ".U('ec/EcIndex/index')."\n");
            exit;
        }
        if (!empty($article['link']) && $article['link'] != 'http://' && $article['link'] != 'https://')
        {
            ec_header("location:$article[link]\n");
            exit;
        }
        
        $this->assign('article_categories',   article_categories_tree($article_id)); //文章分类树
        $this->assign('categories',       get_categories_tree());  // 分类树
        
        $this->assign('helps',            get_shop_help()); // 网店帮助
        $this->assign('article',      $article);
        $this->assign('type',            '1');
        $this->assign('id',               $article_id);
        
        /* 验证码相关设置 */
        $ec_captcha=36;
        if ((intval($ec_captcha) & CAPTCHA_COMMENT) && gd_version() > 0)
        {
            //echo 'aaa';die;
            $this->assign('enabled_captcha', 1);
            $this->assign('rand',            mt_rand());
        }
        
        $catlist = array();
        foreach(get_article_parent_cats($article['cat_id']) as $k=>$v)
        {
            $catlist[] = $v['cat_id'];
        }
        //p($catlist);die;
        $this -> assign_template('a', $catlist);
        $position = assign_ur_here($article['cat_id'], $article['title']);
        $this->assign('page_title',   $position['title']);    // 页面标题
        $this->assign('ur_here',      $position['ur_here']);  // 当前位置
        $this->assign('comment_type', 1);
        
        /* 上一篇下一篇文章 */
        $next_article = M()->getRowSql("SELECT article_id, title FROM " .$ecs->table('ec_article'). " WHERE article_id > $article_id AND cat_id=$article[cat_id] AND is_open=1 LIMIT 1");
        if (!empty($next_article))
        {
            $next_article['url'] = ec_build_uri('article', array('aid'=>$next_article['article_id']), $next_article['title']);
            $this->assign('next_article', $next_article);
        }
    
        $prev_aid = M()->getOne("SELECT max(article_id) as maxid FROM " . $ecs->table('ec_article') . " WHERE article_id < $article_id AND cat_id=$article[cat_id] AND is_open=1",'maxid');
        if (!empty($prev_aid))
        {
            $prev_article = M()->getRowSql("SELECT article_id, title FROM " .$ecs->table('ec_article'). " WHERE article_id = $prev_aid");
            $prev_article['url'] = ec_build_uri('article', array('aid'=>$prev_article['article_id']), $prev_article['title']);
            $this->assign('prev_article', $prev_article);
        }
        
        $this -> display('template/' . C('WEB_STYLE') . '/ec/article.html');
    }
    
    /**
     * 获得指定的文章的详细信息
     *
     * @access  private
     * @param   integer     $article_id
     * @return  array
     */
    public function get_article_info($article_id)
    {
        /* 获得文章的信息 */
        $sql = "SELECT a.*, IFNULL(AVG(r.comment_rank), 0) AS comment_rank ".
                "FROM " .
                        $GLOBALS['ec_globals']['ecs']->table('ec_article'). " AS a ".
                        "LEFT JOIN " .$GLOBALS['ec_globals']['ecs']->table('ec_comment'). " AS r ON r.id_value = a.article_id AND comment_type = 1 ".
                "WHERE a.is_open = 1 AND a.article_id = '$article_id' GROUP BY a.article_id";
        $row = M()->getRowSql($sql);
        if(!empty($row))
        {
            $row['comment_rank'] = ceil($row['comment_rank']);                              // 用户评论级别取整
            $row['add_time']     = local_date(C('ec_date_format'), $row['add_time']); // 修正添加时间显示
            /* 作者信息如果为空，则用网站名称替换 */
            if (empty($row['author']) || $row['author'] == '_SHOPHELP')
            {
                $row['author'] = C('ec_shop_name');
            }
        }
        return $row;
        
        
    }
    	
}
