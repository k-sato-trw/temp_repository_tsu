//�i�r�Q�[�V�����p
$(function(){
	$(".accordion_box dt.plus").next().hide()
    $(".accordion_box dt").click(function(){
        if($(this).is(".plus")){
			$(".accordion_box dd").slideUp("fast");
			$(".accordion_box dt").removeClass("minus");
			$(".accordion_box dt").addClass("plus");
            $(this).next().slideDown("fast");
            $(this).removeClass("plus");
            $(this).addClass("minus");
        }else{
            $(this).next().slideUp("fast");
            $(this).removeClass("minus");
            $(this).addClass("plus");
        }
    })
});






//�����X�P�W���[���ETV���
			$(function(){
				$("#tv ul.menu").hide();
				$("#tv div.category").click(function(){
					$("#tv ul.menu").slideUp();
					$("#tv div.category").removeClass("open");
					if($("+ul",this).css("display")=="none"){
						$("+ul",this).slideDown();
						$(this).addClass("open");
					}
				});
				$("#tv ul.menu li").mouseover(function(){
					$(this).addClass("rollover");
				}).mouseout(function(){
					$(this).removeClass("rollover");
				});
			});		

			

//�C���t�H���[�V����
$(function(){

	$("#info_wrap .box dl").click(function(){

		if($(this).next("#info_wrap .box .txt").css("display")=="none"){
			$(this).next("#info_wrap .box .txt").slideDown("fast");
			$(this).addClass("open");
		}else{
			$(this).next("#info_wrap .box .txt").slideUp("fast");
			$(this).removeClass("open");

		}

	});

});

			

//�C�x���g
$(function(){
	$("#event_main .set").hide();

	$("#event_main .race_name").click(function(){

		if($(this).next("#event_main .set").css("display")=="none"){
			$(this).next("#event_main .set").slideDown("fast");
			$(this).addClass("open");
		}else{
			$(this).next("#event_main .set").slideUp("fast");
			$(this).removeClass("open");

		}

	});

});