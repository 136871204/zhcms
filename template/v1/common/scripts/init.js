//头部搜索框焦点事件
var topSearchInput = $(".search_border input[type=text]");
topSearchInput.focus(function(){
	$(this).parents(".search_area").find(".search_spread").css("display","block");
});
topSearchInput.blur(function(){
	$(this).parents(".search_area").find(".search_spread").css("display","none");
});
topSearchInput.placeholder({
	word:'历史热门搜索',
	color:'#a1a8b3',
	evtType:'focus',
});

//首页tab切换
var indexTabBtn = $(".travel_tab").find("dd").find("li"),
	indexTabObj = $(".travel_content").find(".travel_list_content");

indexTabObj.each(function(){
	$(this).find(".travel_list_detail").eq(0).addClass("on").siblings().removeClass("on");
});
indexTabBtn.on("click",function(){
	$(this).addClass("on").siblings().removeClass("on");
	var i = $(this).index(),
	obj = $(this).parents(".travel_content").find(".travel_list_content").find(".travel_list_detail");
	obj.eq(i).addClass("on").siblings().removeClass("on");
	return false;
});

//当前页on状态选择
function navBannerOn(idx){
	var obj = $("#nav").find(".banner").find("li");
	obj.eq(idx).addClass("on");
}

//list 页面
/*$(".one_filter ul li").on("click",function(){
	var thispIndex = $(this).parents(".one_filter").index(),
		thisSort = $(this).parents(".one_filter").find(".title").html(),
		thisName = $(this).find("a").html(),
		thisClass = "filter_fun_" + thispIndex
		objHTML = '<span class= "'+ thisClass + '">'+ thisSort + thisName +'<a href="javascript:void(0);"></a></span>';
	
	var objFun = $(".result_selected"),
		objCla = objFun.find("span");
	objCla.each(function(){
		if($(this).attr("class") == thisClass){
			$(this).remove();
		}
	});
	objFun.append(objHTML);

	$(this).addClass("on").siblings().removeClass("on");
	return false;
});*/

$(".result_selected a").live("click",function(){
	$(this).parent().remove();
});
$(".sort_area a").on("click",function(){
	var thisId = $(this).attr("id");
	if(thisId == "prize_sort" && $(this).hasClass("on")){
		if($(this).hasClass("down")){
			$(this).addClass("up").removeClass("down");
		}else if($(this).hasClass("up")){
			$(this).addClass("down").removeClass("up");
		}
	}
	$(this).addClass("on").siblings().removeClass("on");
});


//详细页面
