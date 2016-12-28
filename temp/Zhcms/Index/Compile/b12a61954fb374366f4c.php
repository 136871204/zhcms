<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
<head>
    <title><?php echo $zhcms['title'];?> - <?php echo C("webname");?></title>
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
    <link rel="stylesheet"  type='text/css' href="http://www.metacms.com/template/v5/css/article.css"/>
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
    <h1><?php echo C("webname");?></h1>
    <!--导航-->
    <nav class=".navbar-fixed-top" role="navigation">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="http://www.metacms.com">トップ</a></li>
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
                    <li><a href='<?php echo $field['caturl'];?>'><?php echo $field['catname'];?></a></li>
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
<div class="top-message container">
    <span>最新情報：</span>
            <?php $mid='';$cid ='2';$subtable ='';$order ='';$flag='';$noflag='';$aid='';$type='new';$sub_channel=1;
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
        <a href='<?php echo $field['url'];?>'><?php echo $field['title'];?></a>
    <?php endforeach;endif;?>
</div>
<!--内容主体-->
<div class="content container">
<div class="row">
<div class="col-md-8">
    <!--内容主体-->
    <div id="main">
        <header>現在位置：

                    <?php
        $sep = "&nbsp;&gt;&nbsp;";
        if(!empty($_REQUEST['cid'])){
            $cat = cache("category");
            $cat= array_reverse(Data::parentChannel($cat,$_REQUEST['cid']));
            $str = "<a href='http://www.metacms.com'>トップ</a>&nbsp;&gt;&nbsp;";
            foreach($cat as $c){
                $str.="<a href='".Url::getCategoryUrl($c)."'>".$c['catname']."</a>".$sep;
            }
            echo substr($str,0,-(strlen($sep)));
        }
        ?>
        </header>
        <div class="title">
            <h2><?php echo $zhcms['title'];?></h2>

            <p>
                <div class="icon">
                <a href="http://www.metacms.com/index.php?<?php echo $zhcms['domain'];?>">
                    <img src="<?php echo $zhcms['icon'];?>" onmouseover="user.show(this,<?php echo $zhcms['uid'];?>)"/>
                </a>
        </div>
                <a href="http://www.metacms.com/index.php?<?php echo $zhcms['domain'];?>">
                    <?php echo $zhcms['nickname'];?>
                </a> 発表日 <?php echo $zhcms['date_before'];?> (<?php echo $zhcms['time'];?>)-
                <?php echo $zhcms['comment_num'];?>
                	コメント数
                 <script type="text/javascript" src="http://www.metacms.com/index.php?a=Index&c=Index&m=getClick&mid=<?php echo $zhcms['mid'];?>&cid=<?php echo $zhcms['cid'];?>&aid=<?php echo $zhcms['aid'];?>"></script>次点击
                	所属カテゴリ：<a href="<?php echo $zhcms['caturl'];?>"><?php echo $zhcms['catname'];?></a>
                <a href="javascript:content.addFavorite(<?php echo $zhcms['mid'];?>,<?php echo $zhcms['cid'];?>,<?php echo $zhcms['aid'];?>)">カード</a>
            </p>
        </div>
        <div class="content">
            <?php echo $zhcms['content'];?>
        </div>
        <div class="tag">
            <?php if($zhcms['tag']){?>
                次の <?php echo $zhcms['tag'];?> の文章を閲覧してください
            <?php }?>
        </div>
        <!--下一篇与下一篇-->
        <div class="next-article row">
            <p class="col-md-6">
                前：
                        <?php
        $type='pre';
        $titlelen = 18;
        $mid = Q('mid',0,'intval');
        //导入模型类
        $db =ContentViewModel::getInstance($mid);
        //主表（有表前缀）
        $table=$db->tableFull;
        $aid = Q('aid',NULL,'intval');
        //上一篇
        if(strstr($type,'pre')){
            $content = $db->join('category')->where("aid<$aid")->order("aid desc")->find();
            if ($content) {
                $content['title']=mb_substr($content['title'],0,$titlelen,'utf-8');
                $url = Url::getContentUrl($content);
                echo " <a href='".$url."'>" . $content['title'] . "</a>";
            } else {
                echo " <span>没有了</span></li>";
            }
        }
        //下一篇
        if(strstr($type,'next')){
            $content = $db->join('category')->where("aid>$aid")->order("aid ASC")->find();
            if ($content) {
                $content['title']=mb_substr($content['title'],0,$titlelen,'utf-8');
                $url = Url::getContentUrl($content);
                echo "上一篇:  <a href='".$url."'>" . $content['title'] . "</a>";
            } else {
                echo "上一篇:  <span>没有了</span>";
            }
        }
        ?>
            </p>

            <p class="col-md-6">
                次：
                        <?php
        $type='next';
        $titlelen = 18;
        $mid = Q('mid',0,'intval');
        //导入模型类
        $db =ContentViewModel::getInstance($mid);
        //主表（有表前缀）
        $table=$db->tableFull;
        $aid = Q('aid',NULL,'intval');
        //上一篇
        if(strstr($type,'pre')){
            $content = $db->join('category')->where("aid<$aid")->order("aid desc")->find();
            if ($content) {
                $content['title']=mb_substr($content['title'],0,$titlelen,'utf-8');
                $url = Url::getContentUrl($content);
                echo "上一篇:  <a href='".$url."'>" . $content['title'] . "</a>";
            } else {
                echo "上一篇:  <span>没有了</span></li>";
            }
        }
        //下一篇
        if(strstr($type,'next')){
            $content = $db->join('category')->where("aid>$aid")->order("aid ASC")->find();
            if ($content) {
                $content['title']=mb_substr($content['title'],0,$titlelen,'utf-8');
                $url = Url::getContentUrl($content);
                echo " <a href='".$url."'>" . $content['title'] . "</a>";
            } else {
                echo " <span>没有了</span>";
            }
        }
        ?>
            </p>
        </div>
        <!--与本文相关文章-->
        <div class="related">
            <header>関係ある文章</header>
            <ul>
                        <?php $mid='';$cid ='';$subtable ='';$order ='';$flag='';$noflag='';$aid='';$type='relative';$sub_channel=1;
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
                $db->limit(6);
                //-----------------------------------获取数据----------------------------------------
                $result = $db->where($where)->all();
                if($result):
                    foreach($result as $index=>$field):
                        $field['index']=$index+1;
                        $field['title']=mb_substr($field['title'],0,25,'utf8');
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
                    <li>
                        <a href="<?php echo $field['url'];?>"><?php echo $field['title'];?></a>
                    </li>
                <?php endforeach;endif;?>
            </ul>
        </div>
    </div>
    <!--发表评论-->
    <script type="text/javascript" id="comment" src="http://www.metacms.com/index.php?a=Index&c=Comment&m=show&mid=<?php echo $zhcms['mid'];?>&cid=<?php echo $zhcms['cid'];?>&aid=<?php echo $zhcms['aid'];?>&comment_id=<?php echo $_GET['comment_id'];?>"></script>
</div>
<!--右侧列表-->
<div class="right-list col-md-4">
   <a href="http://www.metacms.com/index.php?a=Member&c=Content&m=add&mid=<?php echo $zhcms['mid'];?>&cid=<?php echo $zhcms['cid'];?>" class="publish" target="_blank">
                <strong>+</strong>文章発表
            </a>
    <!--讨论区-->
    <article class="channel">
            	<header>討論区</header>
            	<div class="channel">
            		<ul>
	            		        <?php
        $where = '';$type=strtolower(trim('self'));
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
	            				<span class="list-circle-prefix"></span>
	                    		<a href='<?php echo $field['caturl'];?>'><?php echo $field['catname'];?></a>
	                    	</li>
	                	<?php endforeach;}?>
                	</ul>
            	</div>
    </article>
    <!--猜你喜欢-->
    <article class="news">
        <header>
            あなたの好み
        </header>
                <?php $mid='';$cid ='';$subtable ='';$order ='';$flag='';$noflag='';$aid='';$type='rand';$sub_channel=1;
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