(function(){
	//价格类型效果
	$(".price_combo li").on("click",function(){
		$(this).addClass("on").siblings().removeClass("on");
	});
	// 滚动效果
	var tourNav = $(".tour_intro .tour_nav") ? $(".tour_intro .tour_nav") : "undefined",
		tourContent = $(".tour_intro .tour_content") ? $(".tour_intro .tour_content") : "undefined",
		bookingBtn = tourNav.find(".btn_03") ? tourNav.find(".btn_03") : "undefined",
		drContent = $(".detail_right_content") ? $(".detail_right_content") : "undefined",
		wrapperPos = $("#content .wrapper").offset().top;
	if(tourNav == "undefined") return false;

	var	tourNavPos = tourNav.offset().top,
		navHeight = tourNav.height();
		tagNav = tourNav.find("ul").find("li").not(".download");

	//获取左侧区块
	var tourPos = [];
	var tourSec = $(".tour_intro").find(".tour_detail");
	tourSec.each(function(){
		tourPos.push($(this).offset().top - navHeight -10);

	});

	//day滚的事件
	try{
		var tourDayList = $(".tour_day_list"),
			tdListPos = tourDayList.offset().top - navHeight - 10,
			tourDayNowPos = navHeight + 10,
			dayNav = tourDayList.find("li");
		//day那一块的整体高度
		var tourEndPos = $(".tour_day_detail").height() + $(".tour_day_detail").offset().top,
			tourListEnd = tourEndPos - tourDayList.height() - 10;
		//day滚加on事件
		var dayPos = [];
		var daySec = $(".tour_list_show").find(".tdd_content");
		daySec.each(function(){
			dayPos.push($(this).offset().top - navHeight -10);

		});
	}catch(err){

	}
	

	$(window).on("scroll",function(){
		var nowPos = $(document).scrollTop(),
			nowPos2 = nowPos + navHeight + 10;
		//详细菜单吸附事件
		if(nowPos >= tourNavPos){
			tourNav.css("position","fixed");
			tourContent.css("marginTop",navHeight + "px");
			bookingBtn.css("display","block");

			
		}else{
			tourNav.css("position","relative");
			tourContent.css("marginTop","0");
			bookingBtn.css("display","none");

			
		}
		//中间菜单滚的事件
		tourSec.each(function(){
			var thisPos = $(this).offset().top,
				thisIndex = $(this).index();
			if(nowPos2 >= thisPos){
				//console.log(thisIndex);
				tagNav.eq(thisIndex).addClass("on").siblings().removeClass("on");
			}

		});


		//右侧热门推荐吸附事件
		if(nowPos >= wrapperPos){
			drNowPos = nowPos - wrapperPos;
			drContent.css({"position":"absolute","top":drNowPos+"px"});

		}else{
			drContent.css("position","static");
		}


		//day1234吸附事件
		if(nowPos >= tdListPos){
			tourDayList.css({"position":"fixed","top":tourDayNowPos+"px"});

		}else{
			tourDayList.css({"position":"absolute","top":"0px"});
		}

		if(nowPos >= tourListEnd){
			tourDayList.css({"position":"absolute","top":"0px"});
		}

		try{
			//day1234滚的on事件
			daySec.each(function(){
				var thisPos = $(this).offset().top,
					thisIndex = $(this).index();
				if(nowPos2 >= thisPos){
					//console.log(thisIndex);
					dayNav.eq(thisIndex).addClass("on").siblings().removeClass("on");
				}

			});
		}catch(err){

		}
		


		
	});

	//点击菜单滚动事件
	tagNav.on("click",function(){
		var thisIndex = $(this).index();
		$('html,body').stop().animate({scrollTop:tourPos[thisIndex]}, 800);
	});

	try{
		//点击day滚动事件
		dayNav.on("click",function(){
			var thisIndex = $(this).index();
			$('html,body').stop().animate({scrollTop:dayPos[thisIndex]}, 800);
			return false;
		});
	}catch(err){
		
	}
	
	
	//详细的开关
	$(".tour_switch").on("click",function(){
		var obj = $(this).parents(".tour_detail").find(".tour_txt");
		if($(this).hasClass("min")){
			$(this).removeClass("min");
			$(this).addClass("plus");
			obj.slideUp(300);
		}else{
			$(this).addClass("min");
			$(this).removeClass("plus");
			obj.slideDown(300);
		}
	});
})();