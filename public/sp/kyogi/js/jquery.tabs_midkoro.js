//���j���[�J��
$(function(){
    $("#backnumber dt").click(function(){
		$(this).toggleClass("open");
        $("#backnumber dd").slideToggle("fast");
    });
});


//�o�b�N�i���o�[�I��
$(function() {
    $("#backnumber dd li").click(function() {
		var num = $("#backnumber dd li").index(this);
		$("#backnumber dd").hide();
		$("#backnumber dt").removeClass("open");
		$("#today_tenbo #tenbo .box").hide();
        $("#today_tenbo #tenbo .box").eq(num).fadeIn("normal");
    });
	
});
