
// **************************************************************
//
//　交通アクセスアコーディオン
//
// **************************************************************
$(function(){
	$("#btn .btn_dd").hide();

	$("#btn .btn_dt").click(function(){
		if($(this).next("#btn .btn_dd").css("display")=="none"){
			$(this).next("#btn .btn_dd").slideDown("fast");
			$(this).addClass("active");
		}else{
			$(this).next("#btn .btn_dd").slideUp("fast");
			$(this).removeClass("active");
		}
	});

	//電車から時刻表ボタンクリック
	$('#train a#btn_time').click(function() {
		$('#bus').show();
		$('#btn .b2.btn_dt').addClass("active");
	});
});




// **************************************************************
//
//　無料サービスバス内
//
// **************************************************************

// * バス乗り場切り替えtab
$(function() {
	$("#bus1 .bus_map").hide();
	$("#bus1 #bus_map dt li:first").addClass("active").show();
	$("#bus1 .bus_map:first").show();

	$("#bus3 .bus_map").hide();
	$("#bus3 #bus_map dt li:first").addClass("active").show();
	$("#bus3 .bus_map:first").show();

    $("#bus1 #bus_map dt li").click(function() {
        var num1 = $("#bus1 #bus_map dt li").index(this);
		$("#bus1 .bus_map").hide();
        $("#bus1 .bus_map").eq(num1).show();
        $("#bus1 #bus_map dt li").removeClass('active');
        $(this).addClass('active');
    });

		$("#bus3 #bus_map dt li").click(function() {
				var num3 = $("#bus3 #bus_map dt li").index(this);
		$("#bus3 .bus_map").hide();
				$("#bus3 .bus_map").eq(num3).show();
				$("#bus3 #bus_map dt li").removeClass('active');
				$(this).addClass('active');
		});

	//googlemap読込バグ回避用
	//クリックごとにiframeのsrcを再代入で回避
	$(".b2.btn_dt,.map li,#btn_time").click(function() {
	$(".bus_map").each(function(){
		var src = $(this).attr("src");
		$(this).eq(0).attr("src","");
		$(this).eq(0).attr("src",src);
	});
	});
});



// * バス時刻tab[2つ用]
$(function() {
	$(".bus_time1").hide();
	$("#bus_time_btn1 li").click(function() {
		if($(this).is(".active")){
			$(this).removeClass("active");
			$(".bus_time1").hide();
		}else{
			var num = $("#bus_time_btn1 li").index(this);
			$("#bus_time_btn1 li").removeClass("active");
			$(this).addClass("active");
			$(".bus_time1").hide();
			$(".bus_time1").eq(num).fadeIn("fast");
		}
	});
});
// * バス時刻tab[1つ用]
$(function() {
	$(".bus_time_cont").hide();
    $('.start').click(function(){
        $(this).next('.bus_time_cont').toggle();
    });
});

// * バス時刻tab[1つ用]2
$(function() {
    $('.tyoku').click(function(){
        if($(this).is(".active")){
			$(this).removeClass("active");
		}else{
			$(this).addClass("active");
		}
    });
});
