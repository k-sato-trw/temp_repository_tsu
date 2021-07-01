

//レースアコーディオン
$(function(){

$('dt.open').next('dd').show();
 
$("#replay_list dt").click(function(){
    $(this).next("dd").slideToggle(150);
    $(this).next("dd").siblings("dd").slideUp(150);
    $(this).toggleClass("open");    
    $(this).siblings("dt").removeClass("open");
});
});
	
//レース番号タブ
$(function(){
	$('.tab_box .select').show();
	
	$(".tab_set").each(function(){
		
		$(".race_day li a", this).click(function(e){
			e.preventDefault();
			
			var tabs = $(this).parents(".race_day").children();
			var active = $(this).parent("li");
			var contents = $(this).parents(".tab_set").find(".tab_box").children("ul");
			
			tabs.removeClass('select');
			$(this).parent("li").addClass('select');
			contents.hide().eq(tabs.index(active)).fadeIn();
			
		}).eq(0).click();
		
	});
	
});



function accordionload(){

	$('dt.open').next('dd').show();
	 
	$("#replay_list dt").click(function(){
	    $(this).next("dd").slideToggle(150);
	    $(this).next("dd").siblings("dd").slideUp(150);
	    $(this).toggleClass("open");    
	    $(this).siblings("dt").removeClass("open");
	});

	$('.tab_box .select').show();
	
	$(".tab_set").each(function(){
		
		$(".race_day li a", this).click(function(e){
			e.preventDefault();
			
			var tabs = $(this).parents(".race_day").children();
			var active = $(this).parent("li");
			var contents = $(this).parents(".tab_set").find(".tab_box").children("ul");
			
			tabs.removeClass('select');
			$(this).parent("li").addClass('select');
			contents.hide().eq(tabs.index(active)).fadeIn();
			
		}).eq(0).click();
		
	});

}