<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class IndexControl extends PublicControl {
    
    
	//网站首页
	public function index() {

        //设置显示参数
        //$this->setIndexShowData();

        //缓存时间设定
        $CacheTime = C('CACHE_INDEX') >= 1 ? C('CACHE_INDEX') : -1;
        //echo U('index/index/index/',array('webid'=>2));
        $this -> display('template/' . C('WEB_STYLE') . '/index.html', $CacheTime);
	}
    
    
    //栏目列表
	public function category() {
	   
		$mid = Q('mid', 0, 'intval');
		$cid = Q('cid', 0, 'intval');
		$cache = cache('category');
		if (!$mid || !$cid || !isset($cache[$cid])) {
			_404();
		}
		$cachetime = C('CACHE_CATEGORY') >= 1 ? C('CACHE_CATEGORY') : null;
		if (!$this -> isCache()) {
			$category = $cache[$cid];
			//外部链接，直接跳转
			if ($category['cattype'] == 3) {
				go($category['cat_redirecturl']);
			} else {
				$Model = ContentViewModel::getInstance($category['mid']);
				$catid = getCategory($category['cid']);
				$category['content_num'] = $Model -> join() -> where("cid IN(" . implode(',', $catid) . ")") -> count();
				$category['comment_num'] = intval( M('comment') -> where("cid IN(" . implode(',', $catid) . ")") -> count());
                //p($category);
                $this -> assign("zhcms", $category);
                //设置显示参数
                $this->setCategoryShowData();
                //p($category);die;
                //echo $category['template'];die;
				$this -> display($category['template'], $cachetime);
			}
		} else {
			$this -> display(null, $cachetime);
		}
	}
    
    public function setCategoryShowData(){
        $db_prefix=C("DB_PREFIX");
        $mid = Q('mid', 0, 'intval');
        $cid = Q('cid', 0, 'intval');
        $db =ContentViewModel::getInstance($mid);
        $table=$db->tableFull;
        $where=array();
        $where[]=$table.".cid IN($cid)";
        $join = "content_flag,category,user";
        $result= $db->join($join)->where($where)->order("arc_sort ASC")->all();

        $yearList=array();
        if(!empty($result)){
            foreach($result as $rk=>&$rv){
                $year=date('Y',$rv['open_date']);
                if(!in_array($year,$yearList)){
                    $yearList[]=$year;
                }
                $rv['year']=$year;
                $url=Url::getContentUrl($rv);
                $rv['url']=$url;
            }
        }
        rsort($yearList);
        $this -> assign('result', $result);
        $this -> assign('yearList', $yearList);
    }
    
	//内容页
	public function content() {
		$mid = Q('mid', 0, 'intval');
		$cid = Q('cid', 0, 'intval');
		$aid = Q('aid', 0, 'intval');
		if (!$mid || !$cid || !$aid) {
			_404();
		}
		$ContentAccessModel = K('ContentAccess');
		if (!$ContentAccessModel -> isShow($cid)) {
			$this -> error('閲覧権限がない');
		}
		$CacheTime = C('CACHE_CONTENT') >= 1 ? C('CACHE_CONTENT') : -1;
		if (!$this -> isCache()) {
			$ContentModel = new Content($mid);
			$field = $ContentModel -> find($aid);
			if ($field) {
			 //p($field);
				$this -> assign('zhcms', $field);
                //设置显示参数
                $this->setContentShowData($field);
                //echo $field['template'];die;
				$this -> display($field['template'], $CacheTime);EXIT;
                
			}
		} else {
			$this -> display(null, $CacheTime);
		}
	}
    
    public function setContentShowData($field){
        $mid = Q('mid', 0, 'intval');
        $flagCache =cache($mid,false,FLAG_CACHE_PATH);
        $this -> assign('flagCache', $flagCache);
        
        $selectFlag=explode(',',$field['flag']);
        $this -> assign('selectFlag', $selectFlag);
        
        $memberStr=$field['project_member'];
        if(!empty($memberStr)){
            $memberlist=getExternalData(13,$memberStr); 
        }else{
            $memberlist=array();
        }
        $this -> assign('memberlist', $memberlist);

    }

	

	//404页面
	public function _404() {
		$this -> display('template/system/404.html');
	}

	//加入收藏
	public function addFavorite() {
		if (!session("uid")) {
			$this -> error('ログインして後操作してください');
		} else {
			$db = M('favorite');
			$data = array();
			$data['uid'] = $_SESSION['uid'];
			$data['mid'] = intval($_POST['mid']);
			$data['cid'] = intval($_POST['cid']);
			$data['aid'] = intval($_POST['aid']);
			if ($db -> where($data) -> find()) {
				$this -> error('すでにカードしました');
			} else {
				$db -> add($data);
				$this -> success('カード成功!');
			}
		}
	}
	//获得点击数
	public function getClick() {
		$mid = Q('mid', 0, 'intval');
		$aid = Q('aid', 0, 'intval');
		$modelCache = cache('model');
		$Model = M($modelCache[$mid]['table_name']);
		$result = $Model -> find($aid);
		$Model -> save(array('aid' => $result['aid'], 'click' => $result['click'] + 1));
		echo "document.write({$result['click']});";
		exit ;
	}
}
