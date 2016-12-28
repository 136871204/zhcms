<?php

/**
 * 内容关键字搜索
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class SearchControl extends PublicControl {

	//高级搜索
	public function index() {
		$this -> category =cache("category");
		$this -> model =cache("model");
		$this -> display("./template/plug/search.html");
	}
    
    public function coloudsearch(){
        header("Content-type:text/html;charset=utf-8");
        $db_prefix=C("DB_PREFIX");
        
        $typeid=Q('typeid',0);
        $w = $typeid != 0 ? " and typeid={$typeid}" : '';
        $keyword =Q('keyword');
        $keyword = pregReplace($keyword,3);//只能搜索中文
        $typeid =  pregReplace($typeid,2);
        
        $this -> addSearchkey($keyword);//添加热搜词
        
        require ZHPHP_ORG_PATH."/cloudsearch/pscws4.class.php";
        $pscws = new PSCWS4('utf-8');
        //
        // 接下来, 设定一些分词参数或选项, set_dict 是必须的, 若想智能识别人名等需要 set_rule 
        //
        // 包括: set_charset, set_dict, set_rule, set_ignore, set_multi, set_debug, set_duality ... 等方法
        
        $pscws->set_charset('utf-8');
        $pscws->set_rule(ZHPHP_ORG_PATH.'/cloudsearch/rules.utf8.ini');
        $pscws->set_dict(ZHPHP_ORG_PATH.'/cloudsearch/dict.utf8.xdb');
        $pscws->send_text($keyword);
        while ($some = $pscws->get_result())
        {
            foreach ($some as $word)
            {
        
                $words[]=$word['word'];
            }
        }
        $where="linename is not null";
        $whereor="";
        foreach($words as $k=>$v)
        {
            $where.=" and  linename like '%$v%'";
            if(mb_strlen($v,'utf-8')>1)
                $whereor.=" or  linename like '%$v%'";
        }
        $whereor=trim(trim($whereor),'or');
        
        
        $wh=!empty($whereor)? "($where) or ($whereor)":$where;
        //p($wh);
        $whereor=empty($whereor)?$where:$whereor;

        $sql="select a.* from 
                (
                    select 
                        *,
                        case 
                        when $where then 1 
                        when $whereor then 2 end as neworder 
                    from 
                        ".$db_prefix."line where ($wh)".$w.") a 
                    order by neworder";
        
        $resultlines=M()->query($sql);
        $this -> assign('resultlines', $resultlines);
        $this -> assign('words', $words);
        $this -> display('template/' . C('WEB_STYLE') . '/cloudsearch.html');
    }

    //添加热搜词表
    public function addSearchkey($keyword)
    {
        $db_prefix=C("DB_PREFIX");
        $sql = "select 1 from ".$db_prefix."search_keyword where keyword = '$keyword' limit 1";
        $result=M()->query($sql);
        if(!empty($result)){
            $updatesql = "update ".$db_prefix."search_keyword set keynumber = keynumber+1 where keyword = '$keyword'";
            M()->exe($updatesql);
        }else{
            $time = time();
            $insertsql = "insert into ".$db_prefix."search_keyword(keyword,keynumber,addtime) values('$keyword',1,'$time')";
            M()->exe($insertsql);
        }
    
    }

	//搜索内容
	public function search() {
		$word = Q('word');
		$categoryCache = cache('category');
		if (!$word) {
			$this -> error("検索内容は必須");
		} else {
			$cid = empty($_REQUEST['cid'])?null:intval($_GET['cid']);
			$mid =empty($_REQUEST['mid'])?1:intval($_GET['mid']);
			$_REQUEST['mid']=$mid;
			//=====================记录搜索词
			$SearchTotal = M('search')->where(array('word'=>$word))->getField('total');
			if($SearchTotal){
				M('search')->where(array('word'=>$word))->save(array('total'=>$SearchTotal+1));
			}else{
				M('search')->add(array('total'=>1,'word'=>$word,'mid'=>$_REQUEST['mid']));
			}
			
			if($cid && isset($categoryCache[$cid])){
				$_REQUEST['mid']=$mid =$categoryCache[$cid]['mid'];
			}
			$pre = C('DB_PREFIX');
			$seachType = Q('type', 'title');
			$modelCache = cache('model');
			$categoryCache = cache('category');
			$contentModel = ContentViewModel::getInstance($mid);
			$table = $modelCache[$mid]['table_name'];
			if ($seachType == 'tag') {
			 
				$db = M();
				$countSql = "SELECT count(*) AS c FROM 
						(SELECT distinct(aid) FROM {$pre}tag AS t INNER JOIN {$pre}content_tag AS ct ON t.tid=ct.tid WHERE tag='{$word}' AND mid=1 GROUP BY aid) AS c";
                //echo $countSql;die;
				$count = $db -> query($countSql);
				$page = new Page($count[0]['c'], 15);
				$DataSql = "SELECT * FROM {$pre}category as cat JOIN {$pre}{$table} AS c  ON cat.cid = c.cid JOIN {$pre}content_tag AS ct  ON c.aid=ct.aid INNER 
										JOIN {$pre}tag AS t ON t.tid=ct.tid WHERE t.tag='{$word}' LIMIT " . $page -> limit(true);
				$data = $db -> query($DataSql);
			} else {
				$where = array();
				if ($cid) {
					$cids = getCategory($cid);
					$where[] = $pre . "category.cid IN(" . implode(',',$cids).")";
				}
				if (!empty($_GET['search_begin_time']) && !empty($_GET['search_end_time'])) {
					$where[] = "addtime>=" . strtotime($_GET['search_begin_time']) . " AND addtime<=" . $_GET['search_end_time'];
				}
				switch($seachType) {
					case 'title' :
						$where[] = "title like '%{$word}%'";
						$count = $contentModel -> join('category') -> where($where) -> count();
						$page = new Page($count, 15);
						$data = $contentModel -> join('category') -> where($where) -> all();
						break;
					case 'description' :
						$where[] = "description like '%{$word}%'";
						$count = $contentModel -> join('category') -> where($where) -> count();
						$page = new Page($count, 15);
						$data = $contentModel -> join('category') -> where($where) -> all();
						break;
					case 'username' :
						$where[] = "username like '%{$word}%'";
						$count = $contentModel -> join('category,user') -> where($where) -> count();
						$page = new Page($count, 15);
						$data = $contentModel -> join('category,user') -> where($where) -> all();
						break;
				}
			}
			$this -> assign('searchModel', $modelCache);
			$this -> assign('searchCategory', $categoryCache);
			$this -> assign('page', $page);
			$this -> assign('data', $data);
			$this -> display();
		}
	}

	/**热门搜索词
	 * 前台通过js调用
	 * <script type="text/javascript" src="__ROOT__/index.php?a=Search&c=Search&m=search_word&row=10"></script>
	 */
	public function search_word() {
		$row = Q("get.row", 10, "intval");
		$db = M("search");
		$result = $db -> limit($row) -> all();
		$str = "";
		if (!empty($result)) {
			foreach ($result as $field) {
				$field['url'] = __ROOT__ . '/index.php?a=Search&c=Search&m=search&word=' . $field['word'];
				$str .= " <a href='{$field['url']}'>{$field['word']}</a>";
			}
		}
		echo "document.write('" . addslashes($str) . "')";
		exit ;
	}

}
