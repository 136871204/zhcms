$(function(){
	//首页轮播
	$("#kv_detail").owlCarousel({
		navigation : true,
		singleItem:true,
		autoPlay:4000
	}); 
	//首页轮播旁 的上下滚动
	var imp_list_count = $("#imp_detail").find("li").length;
	if(imp_list_count > 3){
		$("#imp_detail").Scroll({line:1,speed:500,timer:3000,up:"imp_next",down:"imp_prev"});
	}else{
		$(".imp_button").css("display","none");
		return false;
	}
	
});