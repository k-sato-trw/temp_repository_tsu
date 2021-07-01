$(function() {

	var intFalg = 0;
	var backnum;
	var int0flag;
	var int1flag;
	var strSmartAgent;
	var userAgent = navigator.userAgent.match(/android ((\d+\.\d+)|\d+)/i); 


	strSmartAgent = funcJsSmartAgentGetter();

	if( strSmartAgent == 'PC' || ( strSmartAgent == 'Android' && (userAgent[1] >= 4.0 ) ) ){

	    $("#tab_movie li:not(.off)").click(function() {
			var num = $("#tab_movie li").index(this);

			if($(this).is(".selected")) {
			//閉じる時

				$(".cont_movie").eq(num).slideUp("fast");
				$(this).removeClass("selected");

				if(int0flag === 1){

					document.getElementById('movie').contentWindow.location.reload();
					int0flag = 0;
				}
				if(int1flag === 1){
					document.getElementById('movie2').contentWindow.location.reload();
					int1flag = 0;
				}

			} else {

				$(".cont_movie").hide();
				$(".cont_movie").eq(num).slideToggle("fast");
				$("#tab_movie li").removeClass("selected");
				$(this).addClass("selected");

				if( ( strSmartAgent == 'Android' && funcJsFlashPlayerCheck().player == false ) ){

					if( num == 0 ){

						int0flag = 1;
						document.getElementById('movie2').contentWindow.location.reload();
						document.movie.play();

					}else{

						int1flag = 1;
						document.getElementById('movie').contentWindow.location.reload();
						document.movie2.play();

					}

				}else{

					if(intFalg === 0){
					//初めて入ってきた。
						if(num === 0){
							document.getElementById('movie').contentWindow.location.reload();
							int0flag = 1;
						}else{
							document.getElementById('movie2').contentWindow.location.reload();
							int1flag = 1;
						}

						intFalg = 1;

					}else{

						if(num === 0){
						//リプレイ
							if(int1flag === 1){
								document.getElementById('movie2').contentWindow.location.reload();
								int1flag = 0;
							}
							document.getElementById('movie').contentWindow.location.reload();
							int0flag = 1;
						}else{
						//インタビュー
							if(int0flag === 1){
								document.getElementById('movie').contentWindow.location.reload();
								int0flag = 0;
							}
							document.getElementById('movie2').contentWindow.location.reload();
							int1flag = 1;
						}

					}

				}

			}

			//前回のやつ代入
			backnum = num;

			//document.getElementById('movie').contentWindow.location.reload();
			//document.getElementById('movie2').contentWindow.location.reload();

	    });$(".cont_movie").hide();

	}

});
