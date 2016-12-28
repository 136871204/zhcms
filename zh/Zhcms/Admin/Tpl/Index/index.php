<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>METACMS - 管理画面センタ</title>
		<zhjs/>
		<js file="__CONTROL_TPL__/js/menu.js"/>
		<js file="__CONTROL_TPL__/js/quick_menu.js"/>
		<css file="__CONTROL_TPL__/css/css.css"/>
		<css file="__CONTROL_TPL__/css/quick_menu.css"/>
	</head>
    <body>
        <div class="nav">
            <!--头部左侧导航-->
			<div class="top_menu">
                <list from="$top_menu" name="m">
                    <a href="javascript:" nid="{$m.nid}" onclick="get_left_menu({$m.nid});" class="top_menu">
						{$m.title}
					</a>
                </list>
            </div>
            <!--头部左侧导航-->
			<!--头部右侧导航-->
            <div class="r_menu">
                {$zh.session.rname} : {$zh.session.nickname}
                <a href="{|U:'Login/out'}" target="_self">
					[ログアウト]
				</a>
                <span>|</span>
                <a href="__WEB__" target="_blank">
					トップページ
				</a>
                <span>|</span>
                <a nid="999" href="javascript:;" onclick="get_content(this,999)" url="{|U:'Cache/index',array('begin'=>1)}">
					全サイトキャッシュ更新
				</a>
				<span>|</span>
				<a href="{|U:'Member/Index/index'}" target="_blank">
					会員センタ
				</a>
            </div>
            <!--头部右侧导航-->
        </div>
        <!--左侧导航-->
		<div class="main">
            <!--主体左侧导航-->
			<div class="left_menu"></div>
            <!--主体左侧导航-->
			<!--内容显示区域-->
			<div class="menu_nav">
                <div class="direction">
					<a href="#" class="left">
						左へ
					</a>
					<a href="#" class="right">
						右へ
					</a>
				</div>
                <div class="favorite_menu">
					<ul>
						<li class="action" nid="0" style="border-left:solid 1px #D8D8D8;">
							<a href="javascript:;" class="menu" nid="0">
								環境
							</a>
						</li>
					</ul>
				</div>
            </div>
            <div class="top_content">
				<iframe src="{|U:'welcome'}" nid="0" scrolling="auto" frameborder="0"
				style="height: 100%;width: 100%;"></iframe>
			</div>
            <!--内容显示区域-->
        </div>
        <div id="quick_menu">
			<div class="set">
				<a url="{|U:'setFavorite'}" onclick="get_content(this,90001)" href="javascript:;" nid="90001">
					設置
				</a>
			</div>
			<div
			style="float:left;width:1px;margin-right:5px;overflow: hidden;background: #999999;height:15px;margin-top:12px;"></div>
			<div class="bottom-menu">
				<list from="$favorite_menu" name="f">
					<a url="?a={$f.app}&c={$f.control}&m={$f.method}&nid={$f.nid}"
					onclick="get_content(this,{$f.nid})" href="javascript:;" nid="{$f.nid}">
						{$f.title}
					</a>
				</list>
			</div>
			<div class="quick-hide">
				<a href="javascript:quick_menu_hide();">
					隠す
				</a>
			</div>
		</div>
		<div id="show_quick_menu" onclick="show_quick_menu()">
			表示
		</div>
		<!--加载后触发第一个顶级菜单-->
		<script>
        //alert('aa');
			$("a[nid=1]").trigger("click");
		</script>
		
	</body>
</html>