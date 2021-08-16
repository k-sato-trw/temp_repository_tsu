
// **************************************************************
//
//　アクセス方法切り替えtab
//
// **************************************************************
$(function() {
	$(".tab_content").hide();
	$("#btn li:first").addClass("active").show();
	$(".tab_content:first").show();
	
    $("#btn li").click(function() {
        var num = $("#btn li").index(this);
		$(".tab_content").hide();
        $(".tab_content").eq(num).show();
        $("#btn li").removeClass('active');
        $(this).addClass('active')
    });
	
	//電車から時刻表ボタンクリック
	$('a#btn_time').click(function() {
		$('#bus').fadeIn();
		$('#train').css({'display' : 'none'});
		$('#btn li.b2').addClass("active");
		$('#btn li.b1').removeClass("active");
	});
	
});




// **************************************************************
//
//　無料サービスバスtab内
//
// **************************************************************

// * バス乗り場切り替えtab
$(function() {
	$(".bus_map").hide();
	$("#bus_map dt li:first").addClass("active").show();
	$(".bus_map:first").show();
	
    $("#bus_map dt li").click(function() {
        var num = $("#bus_map dt li").index(this);
		$(".bus_map").hide();
        $(".bus_map").eq(num).show();
        $("#bus_map dt li").removeClass('active');
        $(this).addClass('active')
    });
	
	//googlemap読込バグ回避用
	//クリックごとにiframeのsrcを再代入で回避
	$(".map li,#btn_time").click(function() {
	$(".bus_map").each(function(){
		var src = $(this).attr("src");
		$(this).eq(0).attr("src","");
		$(this).eq(0).attr("src",src);
	});	
	});
});


// * バス時刻tab
$(function() {
	$(".content_wrap").hide();
	$("#bus_time_btn li:first").addClass("active").show();
	$(".content_wrap:first").show();
	
    $("#bus_time_btn li").click(function() {
        var num = $("#bus_time_btn li").index(this);
		$(".content_wrap").hide();
        $(".content_wrap").eq(num).fadeIn();
        $("#bus_time_btn li").removeClass('active');
        $(this).addClass('active')
    });
});