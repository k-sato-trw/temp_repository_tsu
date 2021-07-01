$(function(){
	$(".accordion_box dt.plus").next().hide()
    $(".accordion_box dt").click(function(){
        if($(this).is(".plus")){
            $(this).next().slideToggle("fast");
            $(this).removeClass("plus");
            $(this).addClass("minus");
        }else{
            $(this).next().slideToggle("fast");
            $(this).removeClass("minus");
            $(this).addClass("plus");
        }
    })
});
