<?php

/**
 * 权限节点管理
 * Class NodeControl
 * @author 周鸿 <136871204@qq.com>
 */
class CollectionControl extends AuthControl{
    //模型
    private $_db;
    //节点树
    //private $_node;
    
    public function __init()
    {
        //获得模型实例
        $this->_db = K("CollectionNode");
        $url_list_type = array('1'=>'序列网址', '2'=>'多个网页', '3'=>' 单一网页', '4'=>'RSS');
        $this -> url_list_type = $url_list_type;
        
        $html_tag = array(
                            "<p([^>]*)>(.*)</p>[|]"=>'<p>', 
                            "<a([^>]*)>(.*)</a>[|]"=>'<a>',
                            "<script([^>]*)>(.*)</script>[|]"=>'<script>', 
                            "<iframe([^>]*)>(.*)</iframe>[|]"=>'<iframe>', 
                            "<table([^>]*)>(.*)</table>[|]"=>'<table>', 
                            "<span([^>]*)>(.*)</span>[|]"=>'<span>', 
                            "<b([^>]*)>(.*)</b>[|]"=>'<b>', 
                            "<img([^>]*)>[|]"=>'<img>', 
                            "<object([^>]*)>(.*)</object>[|]"=>'<object>', 
                            "<embed([^>]*)>(.*)</embed>[|]"=>'<embed>', 
                            "<param([^>]*)>(.*)</param>[|]"=>'<param>', 
                            '<div([^>]*)>[|]'=>'<div>', 
                            '</div>[|]'=>'</div>', 
                            '<!--([^>]*)-->[|]'=>'<!-- -->');
        $this -> html_tag = $html_tag;
        
        //$this->_node = cache("node");
    }
    
    //节点列表
    public function manage()
    {
        $count = $this -> _db -> count();
		$page = new Page($count);
		$this -> pages = $page -> show();
		$nodelist = $this -> _db -> order("nodeid DESC") -> limit($page -> limit()) -> all();
	
		$this -> nodelist = $nodelist;
        $this->display('node_list.php');
    }
    
    public function del(){
        if (isset($_POST['dosubmit'])) {
            $nodeid = isset($_POST['nodeid']) ? $_POST['nodeid'] : showmessage(L('illegal_parameters'), HTTP_REFERER);
            foreach ($nodeid as $k=>$v) {
				if(intval($v)) {
					$nodeid[$k] = intval($v);
				} else {
					unset($nodeid[$k]);
				}
			}
            $nodeid = implode('\',\'', $nodeid);
            $this->_db->v2_delete("nodeid in ('$nodeid')");
            $content_db = K('CollectionContent');
            $content_db->v2_delete("nodeid in ('$nodeid')");
            $this->success('操作成功！',U('manage'));
        }else{
            $this->error('非法参数！');
        }
    }
    
    public function col_url_list (){
        $nodeid = isset($_GET['nodeid']) ? intval($_GET['nodeid']) : $this->error('参数错误');
        if ($data = $this->_db->v2_get_one(array('nodeid'=>$nodeid))) {
            $urls = collection::url_list($data);
            $total_page = count($urls);
            if ($total_page > 0) {
                $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                $url_list = $urls[$page];
                $url = collection::get_url_lists($url_list, $data);
                $history_db=K('CollectionHistory');
                $content_db = K('CollectionContent');
                $total = count($url);
                
                $re = 0;
                if (is_array($url) && !empty($url)){
                    foreach ($url as $v) {
                        //if (empty($v['url']) || empty($v['title'])){
                        if (empty($v['url']) ){
                            continue; 
                        } 
                        $v = new_addslashes($v);
                        $v['title'] = strip_tags($v['title']);
                        $md5 = md5($v['url']);
                        if (!$history_db->v2_get_one(array('md5'=>$md5, 'siteid'=>'0'))) {
                            $history_db->insert(array('md5'=>$md5, 'siteid'=>'0'));
                            $content_db->insert(array('nodeid'=>$nodeid, 'status'=>0, 'url'=>$v['url'], 'title'=>$v['title'], 'siteid'=>'0'));
                        }else {
    						$re++;
    					}
                    }
                    
                } 
                if ($total_page <= $page) {
                    $this->_db->where(" nodeid = $nodeid ")->update(array('lastdate'=>time()));
                }
                $this->nodeid=$nodeid;
                $this->page=$page;
                $this->total_page=$total_page;
                $this->url=$url;
                $this->total=$total;
                $this->url_list=$url_list;
                $this->re=$re;
                $this->display('col_url_list.php');
            }else {
                $this->error('没有内容可采集');
			}
            
        }else {
			$this->error('数据没有找到。');
		}
    }
    
    public function col_content(){
        $nodeid = isset($_GET['nodeid']) ? intval($_GET['nodeid']) : $this->error('参数错误');
        if ($data = $this->_db->v2_get_one(array('nodeid'=>$nodeid))) {
            $content_db = K('CollectionContent');
            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $total = isset($_GET['total']) ? intval($_GET['total']) : 0;
            if (empty($total)){
                $total = $content_db->v2_count(array('nodeid'=>$nodeid, 'siteid'=>'0', 'status'=>0));
            }
            $total_page = ceil($total/2);
            
            $list = $content_db->v2_select(array('nodeid'=>$nodeid, 'siteid'=>'0', 'status'=>0), 'id,url', '2', 'id desc');
            $i = 0;
            if (!empty($list) && is_array($list)) {
                foreach ($list as $v) {
                    $html = collection::get_content($v['url'], $data);
                    $content_db->v2_update(array('status'=>1, 'data'=>array2string($html)), array('id'=>$v['id']));
                    $i++;
                }
            }else{
                $this->error('没有找到网址列表，请先进行网址采集。',U('manage'));
            }
            if ($total_page > $page) {
                $this->success('采集正在进行中，采集进度:'.($i+($page-1)*2).'/'.$total.'<script type="text/javascript">location.href="?m=col_content&c=Collection&a=Admin&page='.($page+1).'&nodeid='.$nodeid.'&total='.$total.'"</script>', '?m=col_content&c=Collection&a=Admin&page='.($page+1).'&nodeid='.$nodeid.'&total='.$total);
                
            }else{
                $this->_db->v2_update(array('lastdate'=>time()), array('nodeid'=>$nodeid));
                $this->success('采集完成！',U('manage'));
            }
             
            
        }else {
			$this->error('数据没有找到。');
		}
        echo 'Col_content';die;
    }
    
    public function publist(){
        $nodeid = isset($_GET['nodeid']) ? intval($_GET['nodeid']) : $this->error('参数错误');
        $node = $this->_db->v2_get_one(array('nodeid'=>$nodeid), 'name');
        $content_db = K('CollectionContent');
        $status = isset($_GET['status']) ? intval($_GET['status']) : '';
		$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $sql = array('nodeid'=>$nodeid, 'siteid'=>'0');
        if ($status) {
			$sql['status'] = $status - 1;
		}
        
        $count = $content_db -> count();
		$page = new Page($count);
		$this -> page = $page -> show();
		$data = $content_db->where($sql) -> order("id desc") -> limit($page -> limit()) -> all();
        
        $this->data=$data;
        $this->status=$status;
        $this->node=$node;
        $this->nodeid=$nodeid;
        $this->display('publist.php');
        //p($data);die;
		//$this -> nodelist = $nodelist;
        //$this->display('node_list.php');
        
        //$data = $content_db->v2_listinfo($sql, 'id desc', $page);
        //p($node);die;
    }
    
    public function import(){
        $nodeid = isset($_GET['nodeid']) ? intval($_GET['nodeid']) :  $this->error('参数错误');
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $type = isset($_GET['type']) ? trim($_GET['type']) : '';
        $ids="";
        if ($type == 'all') {
            
        }else {
			$ids = implode(',', $id);
		}
        $program_db = K('CollectionProgram');
        
        $categorys = cache('category');//$this->db->v2_select('`module`=\'content\'','catid,siteid',20000,'listorder ASC');
        //p($categorys);
        $this->categorys=$categorys;
        $program_list = $program_db->v2_select(array('nodeid'=>$nodeid, 'siteid'=>'0'), 'id, catid,table_name,program_name');
        $this->program_list=$program_list;

        $this->nodeid=$nodeid;
        $this->ids=$ids;
        $this->type=$type;
        $this->display('import_program.php');
    }
    
    public function import_program_add (){
        $nodeid = isset($_GET['nodeid']) ? intval($_GET['nodeid']) : $this->error('参数错误');
		$ids = isset($_GET['ids']) ? $_GET['ids'] : '';
		$cid = isset($_GET['cid']) && intval($_GET['cid']) ? intval($_GET['cid']) : "";
        $table_name=isset($_GET['table_name'])  ? $_GET['table_name'] : "";
        if(empty($cid) && empty($table_name)){
             $this->error('请选择分类，或输入数据表格名');
        }
		$type = isset($_GET['type']) ? trim($_GET['type']) : '';
        
        
        
        //$cat['setting'] = string2array($cat['setting']);
        if (isset($_POST['dosubmit'])) {
            include ROOT_PATH.DIRECTORY_SEPARATOR.'spider_funs'.DIRECTORY_SEPARATOR.'config.php';
            $config = array();
            $model_field = isset($_POST['model_field']) ? $_POST['model_field'] :  $this->error('参数错误');
            $node_field = isset($_POST['node_field']) ? $_POST['node_field'] : $this->error('参数错误');
            $funcs = isset($_POST['funcs']) ? $_POST['funcs'] : array();
            $config['add_introduce'] = isset($_POST['add_introduce']) && intval($_POST['add_introduce']) ? intval($_POST['add_introduce']) : 0;
            $config['auto_thumb'] = isset($_POST['auto_thumb']) && intval($_POST['auto_thumb']) ? intval($_POST['auto_thumb']) : 0;
            $config['introcude_length'] = isset($_POST['introcude_length']) && intval($_POST['introcude_length']) ? intval($_POST['introcude_length']) : 0;
            $config['auto_thumb_no'] = isset($_POST['auto_thumb_no']) && intval($_POST['auto_thumb_no']) ? intval($_POST['auto_thumb_no']) : 0;
			$config['content_status'] = isset($_POST['content_status']) && intval($_POST['content_status']) ? intval($_POST['content_status']) : 1;
            $program_name=isset($_POST['program_name']) ? $_POST['program_name']:"";
            if(empty($program_name)){
                $this->error('请输入方案名');
            }
            if(!empty($cid)){
                $catlist = cache('category');
                $cat = $catlist[$cid];

                foreach ($node_field as $k => $v) {
    				if (empty($v)) continue;
    				$config['map'][$model_field[$k]] = $v;
    			}
                foreach ($funcs as $k=>$v) {
    				if (empty($v)) continue;
    				$config['funcs'][$model_field[$k]] = $v;
    			} 
                $data = array(
                                'config'=>array2string($config), 
                                'siteid'=>'0', 
                                'nodeid'=>$nodeid, 
                                'modelid'=>$cat['mid'], 
                                'catid'=>$cid,
                                'table_name'=>'',
                                'program_name'=>$program_name
                                );
                $program_db = K('CollectionProgram');
                if ($id = $program_db->v2_insert($data, true)) {
    				$this->success('添加发布方案成功!', '?m=import&c=Collection&a=Admin&programid='.$id.'&nodeid='.$nodeid.'&ids='.$ids.'&type='.$type);
    			} else {
    				$this->error('参数错误');
    			}
            }else if(!empty($table_name)){
                foreach ($node_field as $k => $v) {
    				if (empty($v)) continue;
    				$config['map'][$model_field[$k]] = $v;
    			}
                foreach ($funcs as $k=>$v) {
    				if (empty($v)) continue;
    				$config['funcs'][$model_field[$k]] = $v;
    			} 
                $data = array(
                                'config'=>array2string($config), 
                                'siteid'=>'0', 
                                'nodeid'=>$nodeid, 
                                'modelid'=>'0', 
                                'catid'=>'0',
                                'table_name'=>$table_name,
                                'program_name'=>$program_name
                                );
                $program_db = K('CollectionProgram');
                if ($id = $program_db->v2_insert($data, true)) {
    				//$this->success('添加发布方案成功!', '?m=import&c=Collection&a=Admin&programid='.$id.'&nodeid='.$nodeid.'&ids='.$ids.'&type='.$type);
                    $this->success('添加发布方案成功!', '?m=import&c=Collection&a=Admin&nodeid='.$nodeid.'&ids='.$ids.'&type='.$type);
    			} else {
    				$this->error('参数错误');
    			}
            }
            
        }else{
            include ROOT_PATH.DIRECTORY_SEPARATOR.'spider_funs'.DIRECTORY_SEPARATOR.'config.php';
            $node_data = $this->_db->v2_get_one(array('nodeid'=>$nodeid), "customize_config");
            $node_data['customize_config'] = string2array($node_data['customize_config']);
            $node_field = array(
                                ''=>'请选择',
                                'title'=>'标题', 
                                'author'=>'作者', 
                                'comeform'=>'来源', 
                                'time'=>'时间', 
                                'content'=>'内容');
            if (is_array($node_data['customize_config'])) foreach ($node_data['customize_config'] as $k=>$v) {
    			if (empty($v['en_name']) || empty($v['name'])) continue;
    			$node_field[$v['en_name']] = $v['name'];
    		}
            if(!empty($cid)){
                $catlist = cache('category');
                $cat = $catlist[$cid];
                //读取数据模型缓存
                $model = $fieldCache = cache($cat['mid'], false, FIELD_CACHE_PATH);
                $this->node_field=$node_field;
                $this->model=$model;
                $this->nodeid=$nodeid;
                $this->ids=$ids;
                $this->type=$type;
                $this->cid=$cid;
                $this->cat=$cat;
                $this->table_name=$table_name;
                $this->spider_funs=$spider_funs;
                $this->display('import_program_add.php');
            }else if(!empty($table_name)){

                $this->model=$this->getTableFiledInfo($table_name);
                
                $this->node_field=$node_field;
                $this->nodeid=$nodeid;
                $this->ids=$ids;
                $this->type=$type;
                $this->cid=$cid;
                $this->table_name=$table_name;
                $this->spider_funs=$spider_funs;
                $this->display('import_program_add.php');
            }
            
        } 
        
    }
    
    public function getTableFiledInfo($table_name){
        //sql文编辑
        $sql = "show full fields from " . $table_name;
        //执行sql文
        $fields = M()->query($sql);
        //p($fields);
        //没有取得数据，报错
        if ($fields === false) {
            $this->error("表{$table_name}不存在");
        }
        $n_fields = array();
        $f = array();
        foreach ($fields as $res) {
            $f ['field'] = $res ['Field'];
            $f ['type'] = $res ['Type'];
            $f ['null'] = $res ['Null'];
            $f ['field'] = $res ['Field'];
            $f ['key'] = ($res ['Key'] == "PRI" && $res['Extra']) || $res ['Key'] == "PRI";
            $f ['default'] = $res ['Default'];
            $f ['extra'] = $res ['Extra'];
            $f ['field_name'] = $res ['Field'];
            $f ['title'] = $res ['Comment'];
            $n_fields [$res ['Field']] = $f;
        }
        return $n_fields;
    }
    
    public function import_program_del() {
        $nodeid = isset($_GET['nodeid']) ? intval($_GET['nodeid']) : $this->error('参数错误');
		$id = isset($_GET['id']) ? intval($_GET['id']) : $this->error('参数错误');
        $ids = isset($_GET['ids']) ? $_GET['ids'] : '';
		$type = isset($_GET['type']) ? trim($_GET['type']) : '';
        $program_db =K('CollectionProgram');
		if ($program_db->v2_delete(array('id'=>$id))) {
		      $this->success('操作成功!', '?m=import&c=Collection&a=Admin&nodeid='.$nodeid.'&ids='.$ids.'&type='.$type);
		} else {
		  $this->error('操作失败!');
		}
	}
    
    //导入文章到模型
	public function import_content() {
        $nodeid = isset($_GET['nodeid']) ? intval($_GET['nodeid']) : $this->error('参数错误');
        $programid = isset($_GET['programid']) ? intval($_GET['programid']) : $this->error('参数错误');
        $ids = isset($_GET['ids']) ? $_GET['ids'] : '';
        $type = isset($_GET['type']) ? trim($_GET['type']) : '';
        if (!$node = $this->_db->v2_get_one(array('nodeid'=>$nodeid), 'coll_order,content_page')) {
        	$this->error('采集节点没有找到', '?m=manage&c=Collection&a=Admin');
        }
        //p($_GET);die;
        $program_db =K('CollectionProgram');
        $collection_content_db = K('CollectionContent');
        //更新附件状态
        $attach_status = false;
        //$content_db = pc_base::load_model('content_model');
        //$ContentModel = ContentViewModel::getInstance($this -> _mid);
        
        $order = $node['coll_order'] == 1 ? 'id desc' : '';
        if ($type == 'all') {
            $total = isset($_GET['total']) && intval($_GET['total']) ? intval($_GET['total']) : '';
            if (empty($total)){
                $total = $collection_content_db->v2_count(array('siteid'=>'0', 'nodeid'=>$nodeid, 'status'=>1));
            } 
            $total_page = ceil($total/20);
            $page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
            $total_page = ceil($total/20);
            $data = $collection_content_db->v2_select(array('siteid'=>'0', 'nodeid'=>$nodeid, 'status'=>1), 'id, data', '20', $order);
            
        }
        $program = $program_db->v2_get_one(array('id'=>$programid));
        $program['config'] = string2array($program['config']);
        //p($program);die;
        $_POST['add_introduce'] = $program['config']['add_introduce'];
        $_POST['introcude_length'] = $program['config']['introcude_length'];
        $_POST['auto_thumb'] = $program['config']['auto_thumb'];
        $_POST['auto_thumb_no'] = $program['config']['auto_thumb_no'];
        $_POST['spider_img'] = 0;
        $catid=$program['catid'];
        $table_name=$program['table_name'];
        if(!empty($cid)){
            $i = 0;
            $content_db =  new Content($program['modelid']);
            //p($contentModel);
            foreach ($data as $k=>$v) {
                $sql = array('cid'=>$program['catid'], 'content_state'=>$program['config']['content_status']);
                $v['data'] = string2array($v['data']);
                foreach ($program['config']['map'] as $a=>$b) {
                    if (isset($program['config']['funcs'][$a]) && function_exists($program['config']['funcs'][$a])) {
                        $sql[$a] = $program['config']['funcs'][$a]($v['data'][$b]);
                    }else {
    					$sql[$a] = $v['data'][$b];
    				}
                }
                /*if ($node['content_page'] == 1){
                    $sql['paginationtype'] = 2;
                } */
                $contentid=$content_db -> add($sql);
                if ($contentid) {
                    $coll_contentid[] = $v['id'];
                    $i++;
                }else {
    				$collection_content_db->v2_delete(array('id'=>$v['id']));
    			}
                
                //$contentid = $content_db->add_content($sql, 1);
                //p($contentid);die;
            }
            $sql_id = implode('\',\'', $coll_contentid);
            $collection_content_db->v2_update(array('status'=>2), " id IN ('$sql_id')");
            if ($type == 'all' && $total_page > $page) {
                $str = '正在导入中，导入进度：'.(($page-1)*20+$i).'/'.$total.'<script type="text/javascript">location.href="?m=import_content&c=Collection&a=Admin&nodeid='.$nodeid.'&programid='.$programid.'&type=all&page='.($page+1).'&total='.$total.'"</script>';
    			$url = '';
            }
            $this->success($str, $url);
        }else{
            $i = 0;
            if(!empty($data)){
                foreach ($data as $k=>$v) {
                    //$sql = array('cid'=>$program['catid'], 'content_state'=>$program['config']['content_status']);
                    $v['data'] = string2array($v['data']);
                    foreach ($program['config']['map'] as $a=>$b) {
                        if (isset($program['config']['funcs'][$a]) && function_exists($program['config']['funcs'][$a])) {
                            $sql[$a] = $program['config']['funcs'][$a]($v['data'][$b]);
                        }else {
        					$sql[$a] = $v['data'][$b];
        				}
                    }
                    $tdb=M($table_name,true);
                    //$tdb->tableFull=$table_name;
                    //p($sql);die;
                    $contentid=$tdb->add($sql);
                    if ($contentid) {
                        $coll_contentid[] = $v['id'];
                        $i++;
                    }else {
        				$collection_content_db->v2_delete(array('id'=>$v['id']));
        			}
                }
                $sql_id = implode('\',\'', $coll_contentid);
                $collection_content_db->v2_update(array('status'=>2), " id IN ('$sql_id')");
                if ($type == 'all' && $total_page > $page) {
                    $str = '正在导入中，导入进度：'.(($page-1)*20+$i).'/'.$total.'<script type="text/javascript">location.href="?m=import_content&c=Collection&a=Admin&nodeid='.$nodeid.'&programid='.$programid.'&type=all&page='.($page+1).'&total='.$total.'"</script>';
        			$url = '';
                    $this->success($str, $url);
                }else{
                    $this->success('导入完成');
                }
                
            }else{
                $this->success('没有数据可以导入');
            }
            
            
            
            
        }
        
       //p($_POST);die;
       
        
       //p($node);die;
	}
    
   //添加节点
    public function add(){
        if (IS_POST) {
            $data = isset($_POST['data']) ? $_POST['data'] : $this->error('参数错误');
            $customize_config = isset($_POST['customize_config']) ? $_POST['customize_config'] :  '';
            if (!$data['name'] = trim($data['name'])) {
                $this->error('名称'.'为空');
			}
            if ($this->_db->v2_get_one(array('name'=>$data['name']))) {
                $this->error('名称'.'存在');
			}
            if(isset($_POST['urlpage'.$data['sourcetype']])){
                $data['urlpage']=$_POST['urlpage'.$data['sourcetype']];
            }else{
                $this->error('参数错误');
            }
            //$data['siteid']= $this->get_siteid();
            $data['customize_config'] = array();
            if (is_array($customize_config)){
                foreach ($customize_config['en_name'] as $k => $v) 
                {
				    if (empty($v) || empty($customize_config['name'][$k])){
				        continue;
				    } 
				    $data['customize_config'][] = array(
                                                        'name'=>$customize_config['name'][$k], 
                                                        'en_name'=>$v, 
                                                        'rule'=>$customize_config['rule'][$k], 
                                                        'html_rule'=>$customize_config['html_rule'][$k], 
                                                        'is_image'=>$customize_config['is_image'][$k],
                                                        'is_preg'=>$customize_config['is_preg'][$k],
                                                        'preg_index'=>$customize_config['preg_index'][$k]
                                                    );
                }
            } 
            $data['customize_config'] = array2string($data['customize_config']);
            if ($this->_db->insert($data)) {
                $this->success('操作成功',U('manage'));
			} else {
                $this->error('操作失败');
			}
        } else {
            $show_dialog = $show_validator = true;
            $this->display('node_form.php');
        }
    }
    
    //URL配置显示结果
	public function public_url() {
        $sourcetype = isset($_GET['sourcetype']) && intval($_GET['sourcetype']) ? intval($_GET['sourcetype']) : $this->error('参数错误');
        $pagesize_start = isset($_GET['pagesize_start']) && intval($_GET['pagesize_start']) ? intval($_GET['pagesize_start']) : 1;
        $pagesize_end = isset($_GET['pagesize_end']) && intval($_GET['pagesize_end']) ? intval($_GET['pagesize_end']) : 10;
        $par_num = isset($_GET['par_num']) && intval($_GET['par_num']) ? intval($_GET['par_num']) : 1;
        $urlpage = isset($_GET['urlpage']) && trim($_GET['urlpage']) ? trim($_GET['urlpage']) : $this->error('参数错误');
        
        
        $this->pagesize_start=$pagesize_start;
        $this->pagesize_end=$pagesize_end;
        $this->urlpage=$urlpage;
        $this->par_num=$par_num;
        $show_header = true;
        $this->display('node_public_url.php');
	}
    
    public function edit(){
        $nodeid = isset($_GET['nodeid']) ? intval($_GET['nodeid']) :  $this->error('参数错误');
        $data = $this->_db->v2_get_one(array('nodeid'=>$nodeid));
        if (IS_POST) {
            
            $datas = $data;
            unset($data);
            $data = isset($_POST['data']) ? $_POST['data'] :  $this->error('参数错误');
            
            $customize_config = isset($_POST['customize_config']) ? $_POST['customize_config'] :  '';
            if (!$data['name'] = trim($data['name'])) {
                $this->error('名称'.'为空');
			}
            if ($datas['name'] != $data['name']) {
                if ($this->_db->v2_get_one(array('name'=>$data['name']))) {
                    $this->error('名称'.'存在');
    			}
            }
            $data['urlpage'] = isset($_POST['urlpage'.$data['sourcetype']]) ? $_POST['urlpage'.$data['sourcetype']] : $this->error('参数错误');
			$data['customize_config'] = array();
            if (is_array($customize_config)){
                foreach ($customize_config['en_name'] as $k => $v) {
                    if (empty($v) || empty($customize_config['name'][$k])) {
                       continue; 
                    }
                    $data['customize_config'][] = array(
                                                        'name'=>$customize_config['name'][$k], 
                                                        'en_name'=>$v, 
                                                        'rule'=>$customize_config['rule'][$k], 
                                                        'html_rule'=>$customize_config['html_rule'][$k], 
                                                        'is_image'=>$customize_config['is_image'][$k],
                                                        'is_preg'=>$customize_config['is_preg'][$k],
                                                        'preg_index'=>$customize_config['preg_index'][$k]
                                                        );
                }
            }
            //p($data);die;
            $data['customize_config'] = array2string($data['customize_config']);
            //p($data);die;
            if ($this->_db->where(" nodeid = '$nodeid' ")->update($data)) {
                $this->success('操作成功',U('manage'));
			} else {
                $this->error('操作失败');
			}
           // p($datas);die;
        }else{
            if (isset($data['customize_config'])) {
				$data['customize_config'] = string2array($data['customize_config']);
			}
            $this -> data = $data;
            $this ->nodeid=$nodeid;
            $this->display('node_form.php');
            if (!$data['name'] = trim($data['name'])) {
				showmessage(L('nodename').L('empty'), HTTP_REFERER);
			}
            
        }

    }
    
    public function public_test (){
        $nodeid = isset($_GET['nodeid']) ? intval($_GET['nodeid']) : $this->error('参数错误');
        if ($data = $this->_db->v2_get_one(array('nodeid'=>$nodeid))) {
            $urls = Collection::url_list($data, 1);
            if (!empty($urls)){
                foreach ($urls as $v) {
                    $url = Collection::get_url_lists($v, $data);
                }
            } 
            $this->url=$url;
            $this ->nodeid=$nodeid;
            $this->display('public_test.php');
            
        }else{
            $this->error('数据没有找到。');
        }
    }
    
    public function public_test_content(){
        $url = isset($_GET['url']) ? urldecode($_GET['url']) : exit('0');
        $nodeid = isset($_GET['nodeid']) ? intval($_GET['nodeid']) : $this->error('参数错误');
        //p($_REQUEST);
        //echo $_GET['url'];die;
        
        if ($data = $this->_db->v2_get_one(array('nodeid'=>$nodeid))) {
            
            $contents = Collection::get_content($url, $data);
            foreach ($contents as $_key=>$_content) {
				if(trim($_content)=='') $contents[$_key] = '◆◆◆◆◆◆◆◆◆◆'.$_key.' empty◆◆◆◆◆◆◆◆◆◆';
			}
			print_r($contents);die;
            //p($contents);
        }else{
            $this->error('数据没有找到。');
        }
    }
    
    public function public_name(){
        $name=$_GET['name'];
        $nodeid = isset($_GET['nodeid']) && intval($_GET['nodeid']) ? intval($_GET['nodeid']) : '';
        $data = array();
        if ($nodeid) {
            $data = $this->_db->v2_get_one(array('nodeid'=>$nodeid), 'name');
			if (!empty($data) && $data['name'] == $name) {
				exit('1');
			}
        }
        if($this->_db->v2_get_one(array('name'=>$name), 'nodeid')){
            exit('0');
        }else {
			exit('1');
		}
    }
    
    //删除节点
     /*public function del()
    {
        //TODO:之后在来增加，如果有子节点就，不能删除功能
        if ($this->_db->del_node()) {
            $this->_ajax(1, L('admin_node_control_del_success'));
        } else {
            $this->_ajax(0, $this->_db->error);
        }
    }
    
    //修改节点
    public function edit()
    {
        if (IS_POST) {
            if($this->_db->edit_node()){
                $this->_ajax(1,  L('admin_node_control_edit_success'));
            }
        } else {
            $nid=Q('nid');
            $this->field = $this->_node[$nid];
            foreach($this->_node as $id=>$node){
                $this->_node[$id]['disabled']=Data::isChild($this->_node,$id,$nid,'nid')?' disabled="disabled" ':'';
            }
            $this->node = $this->_db->change_title($this->_node);
            //$this->node = $this->_node;
            $this->display();
        }
    }
    
    //更改菜单排序
    public function update_order()
    {
        $menu_order = Q("post.list_order");
        foreach ($menu_order as $nid => $order) {
            //排序
            $order = intval($order);
            $this->_db->save(array(
                "nid" => $nid,
                "list_order" => $order
            ));
        }
        $this->_ajax(1,L('admin_node_control_update_order_success'));
    }
    
    //更新缓存
    public function update_cache()
    {
        if ($this->_db->updateCache()) {
            $this->_ajax( 1,  L('admin_node_control_update_cache_success'));
        }
    }*/
}
