
// **************************************************************
//
//�@�A�N�Z�X���@�؂�ւ�tab
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
	
	//�d�Ԃ��玞���\�{�^���N���b�N
	$('a#btn_time').click(function() {
		$('#bus').fadeIn();
		$('#train').css({'display' : 'none'});
		$('#btn li.b2').addClass("active");
		$('#btn li.b1').removeClass("active");
	});
	
});




// **************************************************************
//
//�@�����T�[�r�X�o�Xtab��
//
// **************************************************************

// * �o�X����؂�ւ�tab
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
	
	//googlemap�Ǎ��o�O���p
	//�N���b�N���Ƃ�iframe��src���đ���ŉ��
	$(".map li,#btn_time").click(function() {
	$(".bus_map").each(function(){
		var src = $(this).attr("src");
		$(this).eq(0).attr("src","");
		$(this).eq(0).attr("src",src);
	});	
	});
});


// * �o�X����tab
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