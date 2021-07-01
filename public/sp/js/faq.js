$(function(){
	$("#main .box ul").click(function(){
		if($(this).next("#main .box .txt").css("display")=="none"){
			$(this).next("#main .box .txt").slideDown("fast");
			$(this).addClass("open");
		}else{
			$(this).next("#main .box .txt").slideUp("fast");
			$(this).removeClass("open");
		}
	});
});

/*$(function(){
	$("ul.answer").hide();
				$("div.questions").click(function(){
					$("ul.answer").slideUp(100);
					$("div.questions").removeClass("open");
					if($("+ul",this).css("display")=="none"){
						$("+ul",this).slideDown(100);
						$(this).addClass("open");
					}
				});
				$("ul.answer").mouseover(function(){
					$(this).addClass("rollover");
				}).mouseout(function(){
					$(this).removeClass("rollover");
				});
			});
			
	*/
/*	
$(function(){
	$("ul.answer").hide();
	$("div.questions").click(function(){
    $(this).next("ul").slideToggle(100);
    $(this).children("span").toggleClass("open");
}); 
});
*/