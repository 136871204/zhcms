<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>flati</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="description" content=""/>
<meta name="author" content=""/>
<link href='http://fonts.useso.com/css?family=Lato:400,700,300' rel='stylesheet' type='text/css'/>
<!--[if IE]>
	<link href="http://fonts.useso.com/css?family=Lato" rel="stylesheet" type="text/css">
	<link href="http://fonts.useso.com/css?family=Lato:400" rel="stylesheet" type="text/css">
	<link href="http://fonts.useso.com/css?family=Lato:700" rel="stylesheet" type="text/css">
	<link href="http://fonts.useso.com/css?family=Lato:300" rel="stylesheet" type="text/css">
<![endif]-->

<link href="http://www.works.com/template/v3/common/css/bootstrap.css" rel="stylesheet"/>
<link href="http://www.works.com/template/v3/common/css/font-awesome.min.css" rel="stylesheet"/>
<link href="http://www.works.com/template/v3/common/css/theme.css" rel="stylesheet"/>
<link href="http://www.works.com/template/v3/common/css/prettyPhoto.css" rel="stylesheet" type="text/css"/>
<link href="http://www.works.com/template/v3/common/css/zocial.css" rel="stylesheet" type="text/css"/>

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body>
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--header-->
	<div class="header">
		<div class="container">
		<!--logo-->
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<i class="fa fa-bars"></i></button>
					<div class="logo">
						 <a href="index.html"><img src="http://www.works.com/template/v3/common/img/logo.png" alt="" class="animated bounceInDown" /></a>  
					</div>
					<!--menu-->
					   <nav id="main_menu">
					<div class="nav-collapse collapse">
						<ul class="nav nav-pills">
							<li class="dropdown all"><a href="/">全部案例</a> 
							</li>
							<li class="dropdown cat11"><a href="index.php?a=Index&c=Index&m=category&mid=12&cid=11">公司网站</a>
							</li>
							<li class="dropdown cat12"><a href="index.php?a=Index&c=Index&m=category&mid=12&cid=12">品牌网站</a>
							</li>
							<li class="dropdown cat13"><a href="index.php?a=Index&c=Index&m=category&mid=12&cid=13">招聘网站</a>
							</li>
							<li class="dropdown cat14"><a href="index.php?a=Index&c=Index&m=category&mid=12&cid=14">宣传网站</a>
							</li>
							<li class="dropdown cat15"><a href="index.php?a=Index&c=Index&m=category&mid=12&cid=15">服务网站</a>
							</li>
							<li class="dropdown contact"><a href="index.php?a=Index&c=Contact&m=index">联系我们</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	<!--//header-->

	<!--page-->
	<!--banner-->
	<div id="banner">
	<div class="container intro_wrapper">
	<div class="inner_content">
	<h1>全部案例</h1>
	
	</div>
		</div>
			</div>
			
			<div class="container wrapper">
			<div class="inner_content">
		
			<div id="options">                                           
                    <ul id="filters" class="option-set" data-option-key="filter">
                        <li><a href="#filter" data-option-value="*" class=" selected">All</a></li>
                        <?php if(is_array($yearList)):?><?php $index=0; ?><?php  foreach($yearList as $year){ ?>
                        <li><a href="#filter" data-option-value=".<?php echo $year;?>"><?php echo $year;?>年</a></li>   
                        <?php $index++; ?><?php }?><?php endif;?>
                    </ul>                                           
                    <div class="clear"></div>
                </div>
                <div class="row">
                    <!-- portfolio_block -->
                    <div class="projects">    
                        <?php if(is_array($result)):?><?php $index=0; ?><?php  foreach($result as $site){ ?>
                        <div class="span4 element <?php echo $site['year'];?>" data-category="<?php echo $site['year'];?>">
                            <div class="hover_img">
								<a href="<?php echo $site['url'];?>">	
                                <img src="<?php echo $site['main_image'];?>" alt="" /></a>
                            </div>  
                            <div class="item_description">
                               <a href="<?php echo $site['url'];?>"><span class="text-info">[<?php echo $site['catname'];?>]</span><span><?php echo $site['title'];?></span></a><br/>
								<?php echo $site['list_desc'];?>
                            </div>                                    
                        </div>
                        <?php $index++; ?><?php }?><?php endif;?>
                                                      
                        
						

				
                        
                        <div class="clear"></div>
                    </div>   
                    <!-- //portfolio-->   
                </div>
            </div>
        </div>
	<!--//page-->
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>    <!-- footer 2 -->
	<div id="footer2">
		<div class="container">
			<div class="row">
				<div class="span12">
				<div class="copyright">
							FLATI
							&copy;
							<script type="text/javascript">
							//<![CDATA[
								var d = new Date()
								document.write(d.getFullYear())
								//]]>
								</script>
							 - All Rights Reserved :
							More Templates <a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a>
						</div>
						</div>
					</div>
				</div>
			</div>
			<!-- up to top -->
				<a href="#"><i class="go-top hidden-phone hidden-tablet fa fa-angle-double-up"></i></a>
				<!--//end-->

				
<script src="http://www.works.com/template/v3/common/js/jquery.js"></script>			
<script src="http://www.works.com/template/v3/common/js/bootstrap.min.js"></script>	
<script type="text/javascript" src="http://www.works.com/template/v3/common/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="http://www.works.com/template/v3/common/js/scripts.js"></script>
<script src="http://www.works.com/template/v3/common/js/jquery.isotope.min.js" type="text/javascript"></script>

<script type="text/javascript">
//<![CDATA[
	$(window).load(function(){	
	$('.projects').isotope({
  });
});
//]]>
</script>		
<script type="text/javascript">
//<![CDATA[
		$(function () {
			$('div.element').hide();
            
            $('.all').addClass('active');
		});
		var i = 0;//initialize
		var int=0;
		$(window).bind("load", function() {
			var int = setInterval("doThis(i)",100);//fade in speed in milliseconds
		}); 
	function doThis() {
			var imgs = $('div.element').length;
			if (i >= imgs) {
				clearInterval(int);
			}
			$('div.element:hidden').eq(0).fadeIn(100);
			i++;//add 1 to the count
		}
		//]]>
        
        
</script>
</body>
</html>	