

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



//�ߋ��D����
$(function(){

	$("#winner dt").click(function(){

		if($(this).next("dd").css("display")=="none"){
			$(this).next("dd").slideDown("fast");
			$(this).addClass("open");
		}else{
			$(this).next("dd").slideUp("fast");
			$(this).removeClass("open");

		}

	});

});