
//�i�r�Œ�
$(function(){
    var box    = $("#cal_nav");
    var boxTop = box.offset().top;
    $(window).scroll(function () {
        if($(window).scrollTop() >= boxTop) {
            box.addClass("fixed");
			$("body").css("margin-top","190px");
        } else {
            box.removeClass("fixed");
			$("body").css("margin-top","0px");
			//$("#cal_nav").css("margin-left","0px");
        }
    });
});


//���X�N���[�����Œ蕔���\���p
//$(window).on("scroll", function(){
//    $(".fixed").css("left", -$(window).scrollLeft());
//	$("#cal_nav").css("margin-left", "100px");
//});


//tv�^�u
$(function(){
	
	$('#tv li').click(function () {
		
		$(".tv_con").slideUp("fast");
		var num = $("ul#tv li").index(this);
		
		if($(this).is(".active")){
			$(this).removeClass("active");
			$("#time_wrapper").slideUp("fast");
		}else{
			$("#tv li").removeClass("active");
			$(this).addClass("active");
			$(".tv_con").eq(num).slideDown("fast");
		}
	});
});

