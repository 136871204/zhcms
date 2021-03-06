<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo C("webname");?></title>
        <link rel="shortcut icon" href="favicon.ico">
		<meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type='text/javascript' src='http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>

		<link href='http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/css/bootstrap.min.css' rel='stylesheet' media='screen'>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/js/bootstrap.min.js'></script>
                <!--[if lte IE 6]>
                <link rel="stylesheet" type="text/css" href="http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
                <![endif]-->
                <!--[if lt IE 9]>
                <script src="http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/js/html5shiv.min.js"></script>
                <script src="http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/bootstrap/js/respond.min.js"></script>
                <![endif]-->
        <link rel="stylesheet"  type='text/css' href="http://www.metacms.com/template/v5/css/index.css"/>
		<!--[if lt IE 8]>
		<link rel="stylesheet"  type='text/css' href="http://www.metacms.com/template/v5/css/ie.css?ver=1.0 "/>
		<![endif]-->
		<script type='text/javascript'>
                    	var ROOT='<?php echo ROOT_URL;?>';var WEB='<?php echo WEB_URL;?>';var CONTROL='<?php echo CONTROL_URL;?>';
                	</script><script type='text/javascript' src='http://www.metacms.com/zh/Common/static/js/zhcms.js'></script>

                <link rel='stylesheet' type='text/css' href='http://www.metacms.com/zh/Common/static/css/zhcms.css?ver=1.0'/>

    </head>
    <body>
        <article class="header container">
            <h1>サイトLOGO</h1>
            <!--导航-->
			<nav class=".navbar-fixed-top" role="navigation">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
						<li class="active">
							<a href="http://www.metacms.com">
								トップ
							</a>
						</li>
                            <?php
        $where = '';$type=strtolower(trim('top'));
        $cid=str_replace(' ','','');
        if(empty($cid)){
            $cid=Q('cid',NULL,'intval');
        }
        $db = M("category");
        if ($type == 'top') {
            $where = ' pid=0 ';
        }else if($cid) {
            switch ($type) {
                case 'current':
                    $where = " cid in(".$cid.")";
                    break;
                case "son":
                    $where = " pid IN(".$cid.") ";
                    break;
                case "self":
                    $pid = $db->where(intval($cid))->getField('pid');
                    $where = ' pid='.$pid;
                    break;
            }
        }
        $result = $db->where($where)->where("cat_show=1")->order()->order("catorder ASC")->limit(10)->all();
        //无结果
        if($result){
            //当前栏目,用于改变样式
            $_self_cid = isset($_REQUEST['cid'])?$_REQUEST['cid']:0;
			$categoryCache =cache('category');
            foreach ($result as $field):
                //当前栏目样式
                $field['class']=$_self_cid==$field['cid']?"":"";
                $field['caturl'] = Url::getCategoryUrl($field);
				$field['childcategory']=Data::channelList($categoryCache,$field['cid']);
            ?>
                        <li>
                            <a href='<?php echo $field['caturl'];?>'>
			                 <?php echo $field['catname'];?>
                            </a>
                        </li>
                    <?php endforeach;}?>
                    </ul>
                    <form class="navbar-form navbar-left" role="search" method="get" action="http://www.metacms.com/index.php">
                        <input type="hidden" name="a" value="Index" />
						<input type="hidden" name="c" value="Search" />
						<input type="hidden" name="m" value="search" />
						<div class="form-group">
							<input type="text" name='word' class="form-control" placeholder="キーワードで検索" required>
						</div>
                        <button type="submit" class="btn btn-primary">
							検索
						</button>
                    </form>
                    <script type="text/javascript" src="http://www.metacms.com/index.php?a=Member&c=Index&m=Member"></script>
                </div>
            </nav>
        </article>
        <!--最新消息-->
		<div class="message container">
            <span>最新情報：</span>
                    <?php $mid='';$cid ='19';$subtable ='';$order ='';$flag='';$noflag='';$aid='';$type='new';$sub_channel=1;
            $mid = $mid?$mid:Q('mid',1,'intval');
            $cid = !empty($cid)?$cid:Q('cid',0,'intval');
            //导入模型类
            $db =ContentViewModel::getInstance($mid);
            //主表（有表前缀）
            $table=$db->tableFull;
            //获取副表字段
			if(empty($subtable)){
				$db->join('category,user');
			}
            //---------------------------排序类型-------------------------------
            switch($type){
                case 'hot':
                    //查看次数最多
                    $db->order('click DESC');
                    break;
                case 'rand':
                    //随机排序
                    $db->order('rand()');
                    break;
                case 'relative':
                    //与本文相关的，按标签相关联的
                    if(!empty($_REQUEST['aid']) && is_numeric($_REQUEST['aid'])){
                        $_aid = $_REQUEST['aid'];
                        $_tag = M('content_tag')->field('tid')->where("mid=$mid AND aid=$_aid")->limit(10)->all();
                        if($_tag){
                            $_tid=array();
                            foreach($_tag as $tid){
                                $_tid['tid'][]=$tid['tid'];
                            }
                            $_result = M('content_tag')->field('aid')->where($_tid)->where("aid <>$_aid")->group('aid')->limit(20)->all();
                            if(!empty($_result)){
                                $_tag_aid=array();
                                foreach($_result as $d){
                                    $_tag_aid[]=$d['aid'];
                                }
                                $db->where($db->tableFull.".aid IN(".implode(',',$_tag_aid).")");
                            }
                        }
                    }
                    break;
                default:
					if(!empty($order)){
						$order= str_replace('aid', $db->tableFull.'.aid', $order);
						$order= str_replace('cid', $db->tableFull.'.cid', $order);
                    	$db->order($order);
					}
                    break;
            }
            $db->order('arc_sort ASC,updatetime DESC');
            //---------------------------查询条件-------------------------------
                $where=array();
                //获取指定栏目的文章,子栏目处理
                if($cid){
                    //查询条件
                    if($sub_channel){
                        $category = getCategory($cid);
                        $where[]=$db->tableFull.".cid IN(".implode(',',$category).")";
                    }else{
                        $where[]=$db->tableFull.".cid IN($cid)";
                    }
                }
                //指定筛选属性flag='1,2,3'时,获取指定属性的文章
		        if($flag){
		            $flagCache =cache($mid,false,FLAG_CACHE_PATH);
		            $flag = explode(',',$flag);
		            foreach($flag as $f){
		                $f=$flagCache[$f-1];
		                $where[]="find_in_set('$f',flag)";
		            }
		        }
		        //排除flag
		        if($noflag){
		            $flagCache =cache($mid,false,FLAG_CACHE_PATH);
		            $noflag = explode(',',$noflag);
		            foreach($noflag as $f){
		                $f=$flagCache[$f-1];
		                $where[]="!find_in_set('$f',flag)";
		            }
		        }
                //指定文章
                if ($aid) {
                    $where[]=$table.".aid IN($aid)";
                }
                //已经审核的文章
                $where[]=$table.'.content_state=1';
				
                //------------------关联content_flag表后有重复数据，去掉重复的文章---------------------
                $db->group=$table.'.aid';
                //---------------------------------指定显示条数--------------------------------------
                $db->limit(1);
                //-----------------------------------获取数据----------------------------------------
                $result = $db->where($where)->all();
                if($result):
                    foreach($result as $index=>$field):
                        $field['index']=$index+1;
                        $field['title']=mb_substr($field['title'],0,80,'utf8');
                        $field['title']=$field['color']?"<span style='color:".$field['color']."'>".$field['title']."</span>":$field['title'];
                        $field['description']=mb_substr($field['description'],0,80,'utf-8');
                        $field['time']=date("Y-m-d",$field['updatetime']);
						$field['icon']=empty($field['icon'])?"http://www.metacms.com/data/image/user/150.png":'http://www.metacms.com/'.$field['icon'];
                        $field['date_before']=date_before($field['addtime']);
                        $field['thumb']='http://www.metacms.com'.'/'.$field['thumb'];
                        $field['caturl']=Url::getCategoryUrl($field);
                        $field['url']=Url::getContentUrl($field);
                         if($field['new_window'] || $field['redirecturl']){
                        	$field['link']='<a href="'.$field['url'].'" target="_blank">'.$field['title'].'</a>';
						}else{
							$field['link']='<a href="'.$field['url'].'">'.$field['title'].'</a>';	
						}
                ?>
				<a href='<?php echo $field['url'];?>'>
					<?php echo $field['title'];?>
				</a>
			<?php endforeach;endif;?>
        </div>
        <!--内容主体-->
		<div class="content container">
            <div class="row">
                <div class="col-md-8">
                    <!--置顶推荐-->
					<article class="top">
                        <header>
							お勧め
						</header>
                        <ul>
                                    <?php $mid='';$cid ='';$subtable ='';$order ='';$flag='2,3';$noflag='';$aid='';$type='rand';$sub_channel=1;
            $mid = $mid?$mid:Q('mid',1,'intval');
            $cid = !empty($cid)?$cid:Q('cid',0,'intval');
            //导入模型类
            $db =ContentViewModel::getInstance($mid);
            //主表（有表前缀）
            $table=$db->tableFull;
            //获取副表字段
			if(empty($subtable)){
				$db->join('category,user');
			}
            //---------------------------排序类型-------------------------------
            switch($type){
                case 'hot':
                    //查看次数最多
                    $db->order('click DESC');
                    break;
                case 'rand':
                    //随机排序
                    $db->order('rand()');
                    break;
                case 'relative':
                    //与本文相关的，按标签相关联的
                    if(!empty($_REQUEST['aid']) && is_numeric($_REQUEST['aid'])){
                        $_aid = $_REQUEST['aid'];
                        $_tag = M('content_tag')->field('tid')->where("mid=$mid AND aid=$_aid")->limit(10)->all();
                        if($_tag){
                            $_tid=array();
                            foreach($_tag as $tid){
                                $_tid['tid'][]=$tid['tid'];
                            }
                            $_result = M('content_tag')->field('aid')->where($_tid)->where("aid <>$_aid")->group('aid')->limit(20)->all();
                            if(!empty($_result)){
                                $_tag_aid=array();
                                foreach($_result as $d){
                                    $_tag_aid[]=$d['aid'];
                                }
                                $db->where($db->tableFull.".aid IN(".implode(',',$_tag_aid).")");
                            }
                        }
                    }
                    break;
                default:
					if(!empty($order)){
						$order= str_replace('aid', $db->tableFull.'.aid', $order);
						$order= str_replace('cid', $db->tableFull.'.cid', $order);
                    	$db->order($order);
					}
                    break;
            }
            $db->order('arc_sort ASC,updatetime DESC');
            //---------------------------查询条件-------------------------------
                $where=array();
                //获取指定栏目的文章,子栏目处理
                if($cid){
                    //查询条件
                    if($sub_channel){
                        $category = getCategory($cid);
                        $where[]=$db->tableFull.".cid IN(".implode(',',$category).")";
                    }else{
                        $where[]=$db->tableFull.".cid IN($cid)";
                    }
                }
                //指定筛选属性flag='1,2,3'时,获取指定属性的文章
		        if($flag){
		            $flagCache =cache($mid,false,FLAG_CACHE_PATH);
		            $flag = explode(',',$flag);
		            foreach($flag as $f){
		                $f=$flagCache[$f-1];
		                $where[]="find_in_set('$f',flag)";
		            }
		        }
		        //排除flag
		        if($noflag){
		            $flagCache =cache($mid,false,FLAG_CACHE_PATH);
		            $noflag = explode(',',$noflag);
		            foreach($noflag as $f){
		                $f=$flagCache[$f-1];
		                $where[]="!find_in_set('$f',flag)";
		            }
		        }
                //指定文章
                if ($aid) {
                    $where[]=$table.".aid IN($aid)";
                }
                //已经审核的文章
                $where[]=$table.'.content_state=1';
				
                //------------------关联content_flag表后有重复数据，去掉重复的文章---------------------
                $db->group=$table.'.aid';
                //---------------------------------指定显示条数--------------------------------------
                $db->limit(2);
                //-----------------------------------获取数据----------------------------------------
                $result = $db->where($where)->all();
                if($result):
                    foreach($result as $index=>$field):
                        $field['index']=$index+1;
                        $field['title']=mb_substr($field['title'],0,15,'utf8');
                        $field['title']=$field['color']?"<span style='color:".$field['color']."'>".$field['title']."</span>":$field['title'];
                        $field['description']=mb_substr($field['description'],0,30,'utf-8');
                        $field['time']=date("Y-m-d",$field['updatetime']);
						$field['icon']=empty($field['icon'])?"http://www.metacms.com/data/image/user/150.png":'http://www.metacms.com/'.$field['icon'];
                        $field['date_before']=date_before($field['addtime']);
                        $field['thumb']='http://www.metacms.com'.'/'.$field['thumb'];
                        $field['caturl']=Url::getCategoryUrl($field);
                        $field['url']=Url::getContentUrl($field);
                         if($field['new_window'] || $field['redirecturl']){
                        	$field['link']='<a href="'.$field['url'].'" target="_blank">'.$field['title'].'</a>';
						}else{
							$field['link']='<a href="'.$field['url'].'">'.$field['title'].'</a>';	
						}
                ?>
                                <li class="col-md-6">
									<a href="<?php echo $field['url'];?>">
										<img src="<?php echo $field['thumb'];?>" class="img-rounded sticky"/>

										<h3 class="title"><?php echo $field['title'];?></h3>

										<p>
											<?php echo $field['description'];?>
										</p>
									</a>
								</li>
                            <?php endforeach;endif;?>
                        </ul>
                    </article>
                    <!--内容列表-->
					<div class="article-list">
                        <header>
							画像メイン
						</header>
                                <?php
        $mid ='';
        $cid='';
        $flag = '4';
        $sub_channel=1;
        $order = 'new';
        $mid = $mid?$mid:Q('mid',1,'intval');
        $cid = $cid?$cid:Q('cid',null,'intval');
        //导入模型类
        $db =ContentViewModel::getInstance($mid);
        //主表（有表前缀）
        $table=$db->tableFull;
        //---------------------------排序Order-------------------------------
            switch($order){
                case 'hot':
                    //查看次数最多
                    $order='click DESC';
                    break;
                case 'rand':
                    //随机排序
                    $order='rand()';
                    break;
                case 'new':
                default:
                    //最新排序
                    $order='aid DESC';
                    break;
            }
        //----------------------------条件Where-------------------------------------
        $where=array();
        //子栏目处理
        if($cid){
            //查询条件
            if($sub_channel){
                $category = getCategory($cid);
                $where[]=$table.".cid IN(".implode(',',$category).")";
            }else{
                $where[]=$table.".cid IN($cid)";
            }
        }
        //指定筛选属性flag='1,2,3'时,获取指定属性的文章
        if($flag){
            $flagCache =cache($mid,false,FLAG_CACHE_PATH);
            $flag = explode(',',$flag);
            foreach($flag as $f){
                $f=$flagCache[$f-1];
                $where[]="find_in_set('$f',flag)";
            }
        }
        $where= implode(' AND ',$where);
        //-------------------------获得数据-----------------------------
        //关联表
        $join = "content_flag,category,user";
        $count = $db->join($join)->order("arc_sort ASC")->where($where)->where($table.'.content_state=1')->count($db->tableFull.'.aid');
		$categoryCache=cache('category');
		if($cid){
			$category=$categoryCache[$cid];
			if($category['cat_url_type']==2){//动态
				if(C('PATHINFO_TYPE')){
					$Url = "list_{mid}_{cid}_{page}.html";
					$pageUrl=str_replace(array('{mid}','{cid}'),array($category['mid'],$category['cid']),$Url);
				}else{
					$Url = "a=Index&c=Index&m=category&mid={mid}&cid={cid}&page={page}";
  		 			$pageUrl=str_replace(array('{mid}','{cid}'),array($category['mid'],$category['cid']),$Url);
				}
				$ROOT_URL = C('URL_REWRITE')?'':WEB_URL.'?';
				Page::$staticUrl=$ROOT_URL.$pageUrl;
			}else{//静态
				$html_path = C("HTML_PATH") ? C("HTML_PATH") . '/' : '';
				Page::$staticUrl=ROOT_URL.'/'.$html_path.str_replace(array('{catdir}','{cid}'),array($category['catdir'],$category['cid']),$category['cat_html_url']);	
			}	
		}else{//首页
			Page::$staticUrl=U('Index/Index/index',array('page'=>'{page}'));
		}
        $page= new Page($count,10);
        $result= $db->join($join)->order("arc_sort ASC")->where($where)->where($table.'.content_state=1')->order($order)->limit($page->limit())->all();
        if($result):
            //有结果集时处理
            foreach($result as $field):
                    	$field['index']=$index+1;
                        $field['title']=mb_substr($field['title'],0,20,'utf8');
                        $field['title']=$field['color']?"<span style='color:".$field['color']."'>".$field['title']."</span>":$field['title'];
                        $field['description']=mb_substr($field['description'],0,30,'utf-8');
                        $field['time']=date("Y-m-d",$field['updatetime']);
						$field['icon']=empty($field['icon'])?"http://www.metacms.com/data/image/user/150.png":'http://www.metacms.com/'.$field['icon'];
                        $field['date_before']=date_before($field['addtime']);
                        $field['thumb']='http://www.metacms.com'.'/'.$field['thumb'];
                        $field['caturl']=Url::getCategoryUrl($field);
                        $field['url']=Url::getContentUrl($field);
                        if($field['new_window'] || $field['redirecturl']){
                        	$field['link']='<a href="'.$field['url'].'" target="_blank">'.$field['title'].'</a>';
						}else{
							$field['link']='<a href="'.$field['url'].'">'.$field['title'].'</a>';	
						}
            ?>
                            <article>
								<div class="pic">
									<a href="<?php echo $field['url'];?>">
										<img src="<?php echo $field['thumb'];?>"/>
									</a>
								</div>
								<header>
									<span class="cat"> <?php echo $field['catname'];?> <i class="glyphicon glyphicon-play"></i> </span>
									<a href="<?php echo $field['url'];?>">
										<?php echo $field['title'];?>
									</a>
								</header>
								<div class="author">
									<a href="<?php echo $field['member'];?>" onmouseover="user.show(this,<?php echo $field['uid'];?>)">
										<?php echo $field['username'];?>
									</a>
									発表日 <?php echo $field['date_before'];?> -
									Tag：<?php echo $field['tag'];?>
								</div>
								<p>
									<?php echo $field['description'];?>
								</p>
							</article>
                        <?php endforeach;endif?>
                        <div class="page">
							        <?php if(is_object($page)){
            echo $page->show(2,10);
            }
        ?>
						</div>
                    </div>
                </div>
                <!--右侧列表-->
				<div class="right-list col-md-4">
                    <!--产品下载-->
					<article class="soft">
                        <header>
							商品ダウンロード
						</header>
						<div>
							<a href="http://www.metacms.com/metacms.zip" class="zhcms" target="_blank">
								METACMS<span>バージョン: 2016-08-02</span>
							</a>
						</div>
						<div class="notice">
							<span class="glyphicon glyphicon-comment"></span>　
                            metaphaseの製品はどんなサイトでも（一切商業ウェブサイトも含め）無料で使える、100%オープンソースかつ無料！
						</div>
                    </article>
                    <!--热门标签-->
					<article class="tag">
                        <header>
							人気ラベル
						</header>
						<div>
							        <?php $type= 'hot';$row =30;
        $db=M('tag');
        switch($type){
            case 'new':
                $result = $db->order('tid DESC')->limit($row)->all();
                break;
			case 'hot':
			default:
                $result = $db->order('total DESC')->limit($row)->all();
                break;
        }
        foreach($result as $field):
            $field['url']=U('Index/Search/search',array('type'=>'tag','word'=>$field['tag']));
        ?>
								<a href="<?php echo $field['url'];?>">
									<?php echo $field['tag'];?>
								</a>
							<?php endforeach;?>
						</div>
                        <!--Tag随机变色-->
						<script>
							$(".tag div a ").each(function(i) {
								var color = ['red', '#428BCA', '#5CB85C', '#D9534F', '#567E95', '#FF8433', '#4A4A4A', '#5CB85C', '#B433FF', '#33BBBA', '#C28F5B'];
								var t = Math.floor(Math.random() * color.length);
								$(this).css({
									'background-color' : color[t]
								});
							})
						</script>
                    </article>
                    <!--精英-->
					<article class="reader">
                        <header>
							活躍ユーザ
						</header>
						<section>
                                    <?php
            $db=M('user');
            $data = $db->field("uid,nickname,domain,icon")->where(" user_state=1")->order("credits DESC")->limit($row)->all();
            foreach($data as $field):
                $field['url'] = U('Member/Space/index',array('u'=>$field['domain']));
                $field['icon']=$field['icon']?'http://www.metacms.com/'.$field['icon']:'http://www.metacms.com/data/image/user/50.png';
            ?>
                                <a href="<?php echo $field['url'];?>">
									<img src="<?php echo $field['icon'];?>" title="<?php echo $field['nickname'];?>"
									onmouseover="user.show(this,<?php echo $field['uid'];?>)" style="width: 50px;height: 50px;border-radius: 10%;"/>
								</a>
                            <?php endforeach;?>
                        </section>
                    </article>
                    <!--最新评论-->
					<article class="comment">
                        <header>
							最新コメント
						</header>
						        <?php
            $db=M('comment');
            $pre=C('DB_PREFIX');
            $sql = "SELECT u.uid,comment_id,mid,cid,aid,nickname,pubtime,content,domain,icon
                FROM ".$pre."user AS u
                JOIN ".$pre."comment AS c ON u.uid = c.uid
                WHERE comment_state=1 ORDER BY comment_id DESC limit 6";
            $data = $db->query($sql);
            foreach($data as $field):
                $_tmp = empty($field['domain']) ? $field['uid'] : $field['domain'];
                $field['userlink'] = ' http://www.metacms.com/index.php?' . $_tmp;
                $field['url']='http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid='.$field['mid'].'&cid='.$field['cid'].'&aid='.$field['aid'].'&comment_id='.$field['comment_id'];
                $field['content'] =mb_substr($field['content'],0,20,'utf-8');
                $field['pubtime'] =date_before($field['pubtime']);
                $field['icon']=$field['icon']?'http://www.metacms.com/'.$field['icon']:'http://www.metacms.com/data/image/user/100.png';
            ?>
                            <section>
								<a href="<?php echo $field['url'];?>">
									<img src="<?php echo $field['icon'];?>" style="width: 36px;height: 36px;border-radius: 50%;"
									onmouseover="user.show(this,<?php echo $field['uid'];?>)"/>

									<p class="man">
										<span><?php echo $field['nickname'];?></span> <?php echo $field['pubtime'];?>说：
									</p>

									<p class="content">
										<?php echo $field['content'];?>
									</p>
								</a>
							</section>
                        <?php endforeach;?>
                    </article>
                    <!--猜你喜欢-->
					<article class="news">
                        <header>
							あなたの好み
						</header>
						        <?php $mid='';$cid ='';$subtable ='';$order ='';$flag='';$noflag='1';$aid='';$type='new';$sub_channel=1;
            $mid = $mid?$mid:Q('mid',1,'intval');
            $cid = !empty($cid)?$cid:Q('cid',0,'intval');
            //导入模型类
            $db =ContentViewModel::getInstance($mid);
            //主表（有表前缀）
            $table=$db->tableFull;
            //获取副表字段
			if(empty($subtable)){
				$db->join('category,user');
			}
            //---------------------------排序类型-------------------------------
            switch($type){
                case 'hot':
                    //查看次数最多
                    $db->order('click DESC');
                    break;
                case 'rand':
                    //随机排序
                    $db->order('rand()');
                    break;
                case 'relative':
                    //与本文相关的，按标签相关联的
                    if(!empty($_REQUEST['aid']) && is_numeric($_REQUEST['aid'])){
                        $_aid = $_REQUEST['aid'];
                        $_tag = M('content_tag')->field('tid')->where("mid=$mid AND aid=$_aid")->limit(10)->all();
                        if($_tag){
                            $_tid=array();
                            foreach($_tag as $tid){
                                $_tid['tid'][]=$tid['tid'];
                            }
                            $_result = M('content_tag')->field('aid')->where($_tid)->where("aid <>$_aid")->group('aid')->limit(20)->all();
                            if(!empty($_result)){
                                $_tag_aid=array();
                                foreach($_result as $d){
                                    $_tag_aid[]=$d['aid'];
                                }
                                $db->where($db->tableFull.".aid IN(".implode(',',$_tag_aid).")");
                            }
                        }
                    }
                    break;
                default:
					if(!empty($order)){
						$order= str_replace('aid', $db->tableFull.'.aid', $order);
						$order= str_replace('cid', $db->tableFull.'.cid', $order);
                    	$db->order($order);
					}
                    break;
            }
            $db->order('arc_sort ASC,updatetime DESC');
            //---------------------------查询条件-------------------------------
                $where=array();
                //获取指定栏目的文章,子栏目处理
                if($cid){
                    //查询条件
                    if($sub_channel){
                        $category = getCategory($cid);
                        $where[]=$db->tableFull.".cid IN(".implode(',',$category).")";
                    }else{
                        $where[]=$db->tableFull.".cid IN($cid)";
                    }
                }
                //指定筛选属性flag='1,2,3'时,获取指定属性的文章
		        if($flag){
		            $flagCache =cache($mid,false,FLAG_CACHE_PATH);
		            $flag = explode(',',$flag);
		            foreach($flag as $f){
		                $f=$flagCache[$f-1];
		                $where[]="find_in_set('$f',flag)";
		            }
		        }
		        //排除flag
		        if($noflag){
		            $flagCache =cache($mid,false,FLAG_CACHE_PATH);
		            $noflag = explode(',',$noflag);
		            foreach($noflag as $f){
		                $f=$flagCache[$f-1];
		                $where[]="!find_in_set('$f',flag)";
		            }
		        }
                //指定文章
                if ($aid) {
                    $where[]=$table.".aid IN($aid)";
                }
                //已经审核的文章
                $where[]=$table.'.content_state=1';
				
                //------------------关联content_flag表后有重复数据，去掉重复的文章---------------------
                $db->group=$table.'.aid';
                //---------------------------------指定显示条数--------------------------------------
                $db->limit(5);
                //-----------------------------------获取数据----------------------------------------
                $result = $db->where($where)->all();
                if($result):
                    foreach($result as $index=>$field):
                        $field['index']=$index+1;
                        $field['title']=mb_substr($field['title'],0,22,'utf8');
                        $field['title']=$field['color']?"<span style='color:".$field['color']."'>".$field['title']."</span>":$field['title'];
                        $field['description']=mb_substr($field['description'],0,80,'utf-8');
                        $field['time']=date("Y-m-d",$field['updatetime']);
						$field['icon']=empty($field['icon'])?"http://www.metacms.com/data/image/user/150.png":'http://www.metacms.com/'.$field['icon'];
                        $field['date_before']=date_before($field['addtime']);
                        $field['thumb']='http://www.metacms.com'.'/'.$field['thumb'];
                        $field['caturl']=Url::getCategoryUrl($field);
                        $field['url']=Url::getContentUrl($field);
                         if($field['new_window'] || $field['redirecturl']){
                        	$field['link']='<a href="'.$field['url'].'" target="_blank">'.$field['title'].'</a>';
						}else{
							$field['link']='<a href="'.$field['url'].'">'.$field['title'].'</a>';	
						}
                ?>
							<section>
								<a href="<?php echo $field['url'];?>">
									<h3><?php echo $field['title'];?></h3>

									<p>
										<?php echo $field['time'];?>
									</p>
								</a>
							</section>
						<?php endforeach;endif;?>
                    </article>
                </div>
            </div>
        </div>
        <!--copyright-->
		<footer class="container">
			METACMS © 2016
			<a href="http://www.metaphase.co.jp">
				metaphase
			</a>
			<div class="link">
				<strong>パートナーリンク | <a href="http://www.metacms.com/index.php?g=Plugin&a=Link" target="_blank">リンク申請</a>:</strong>
				        <?php
        $type='all';$tid='1';
        //导入模型
        import('LinkModel','zh/Plugin/Link/Model');
        $db = K('Link');
        switch($type){
            case 'image':
                $db->where('logo<>""');
                break;
            case 'text':
                 $db->where('logo=""');
                break;
            case 'all':
            default:
        }
        if($tid){
            $db->where(C('DB_PREFIX')."link.tid=$tid");
        }
        $link = $db->where('state=1')->all();
        foreach ($link as $field):
            $field['logo'] = "http://www.metacms.com/" . $field['logo'];
            $field['link'] = '<a href="'.$field['url'].'" target="_blank">'.$field['webname'].'</a>';
        ?><?php echo $field['link'];?>        <?php
        endforeach;
        ?>
			</div>
		</footer>
    </body>
 </html>