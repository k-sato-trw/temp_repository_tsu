$(function() {
    $("#tab_kekka li").click(function() {
		var num = $("#tab_kekka li").index(this);
		$("#tab_kekka li").removeClass("selected");
        $(this).addClass("selected");
		$(".cont_kekka").hide();
        $(".cont_kekka").eq(num).fadeIn("normal");
    });

	var intflag = funcFlag();

	if(intflag == "2"){
		$("#tab_kekka li").last().click();
	}else{
		$("#tab_kekka li").first().click();
	}


});



