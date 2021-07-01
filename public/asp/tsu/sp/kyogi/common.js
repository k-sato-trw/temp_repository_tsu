
//********************************
//ロード時実行


	//3秒ディレイ
	var intDelayTime = 300;

	function funcLoad( argRaceNum ){

		//初期読み込まず、ページ近づいたら読み込む処理実行
		Read_PageLoop( argRaceNum );

		//出走データ；選手評価初期表示
		if( intFirstPage == 2 ){

			setTimeout( 'document.getElementById("tab02").click()' , intDelayTime );


			//document.getElementById("tab02").click();

		}

		//予想：記者前夜版初期表示
		if( intFirstPage == 7 ){

			setTimeout( 'document.getElementById("tab03").click()' , intDelayTime );

			//document.getElementById("tab03").click();

		}

		//予想：マイデータ予想表示
		if( intFirstPage == 10 ){

			if( document.getElementById("id_myyoso") ){
			//存在有無確認

				setTimeout( 'document.getElementById("id_myyoso").click()' , intDelayTime );

				//document.getElementById("id_myyoso").click();

				if( boolScroll_odds_Calcflg == false ){
				//読み込まれてから遷移する

					func_ScrollLoop( intFirstPage );

				}

			}

		}


		//オッズ3連単・複表示
		if( intFirstPage == 11 ){

			setTimeout( 'document.getElementById("tab04").click()' , intDelayTime );

			//document.getElementById("tab04").click();

		}

		//オッズ検索（流し）表示
		if( intFirstPage == 12 ){

			if( document.getElementById("id_oddsSearch") ){
			//存在有無確認

				setTimeout( 'document.getElementById("id_oddsSearch").click()' , intDelayTime );

				//document.getElementById("id_oddsSearch").click();

				if( boolScroll_odds_SearchNagashiflg == false ){
				//読み込まれてから遷移する

					func_ScrollLoop( intFirstPage );

				}

			}else{
			//更新後に結果取得できて、対象ページが消えた時

				if( document.getElementById("id_kekkaDetail") ){
				//結果詳細表示時

					alert('レース確定後にオッズ検索はご利用いただけません');

					setTimeout( 'document.getElementById("tab04").click()' , intDelayTime );

					//document.getElementById("tab04").click();

				}

			}

		}

		//オッズ検索(ボックス)表示(本当はページ番号が●の位置にしたかったが、間に合わず…）
		if( intFirstPage == 13 ){

			if( document.getElementById("id_oddsSearch") ){
			//存在有無確認

				setTimeout( 'document.getElementById("id_oddsSearch").click()' , intDelayTime );

				//document.getElementById("id_oddsSearch").click();

				if( boolScroll_odds_SearchBoxflg == false ){
				//読み込まれてから遷移する

					func_ScrollLoop( intFirstPage );

				}

			}else{
			//更新後に結果取得できて、対象ページが消えた時

				if( document.getElementById("id_kekkaDetail") ){
				//結果詳細表示時

					alert('レース確定後にオッズ検索はご利用いただけません');

					setTimeout( 'document.getElementById("tab04").click()' , intDelayTime );

					//document.getElementById("tab04").click();

				}


			}


		}

		if(typeof funcCalcload == "function")
		{

			//オッズ計算用初期読み込み
			funcCalcload();

		}




		//オッズ計算表示
		if( intFirstPage == 14 ){

			if( document.getElementById("id_oddsCalc") ){
			//存在有無確認

				setTimeout( 'document.getElementById("id_oddsCalc").click()' , intDelayTime );

				//document.getElementById("id_oddsCalc").click();

				if( boolScroll_odds_Calcflg == false ){
				//読み込まれてから遷移する

					func_ScrollLoop( intFirstPage );

				}

			}else{
			//更新後に結果取得できて、対象ページが消えた時

				if( document.getElementById("id_kekkaDetail") ){
				//結果詳細表示時

					alert('レース確定後にオッズ計算はご利用いただけません');

					setTimeout( 'document.getElementById("tab04").click()' , intDelayTime );

					//document.getElementById("tab04").click();

				}

			}

		}



		//結果一覧
		if( intFirstPage == 15 ){

			//ディレイかけないと遷移しない場合があった
			setTimeout( 'document.getElementById("id_kekkalist").click()' , intDelayTime );

		}

		//結果詳細
		if( intFirstPage == 16 ){

			//ディレイかけないと遷移しない場合があった
			setTimeout( 'document.getElementById("id_kekkaDetail").click()' , intDelayTime );

		}

		//直前情報＆スタ展
		if( intFirstPage == 17 ){

			setTimeout( 'document.getElementById("tab05").click()' , intDelayTime );

			//document.getElementById("tab05").click();

		}



	}


	//初期読み込まず、ページ近づいたら読み込む
	function Read_PageLoop( argRaceNum ){

//console.log(intowlPage);

		if( intowlPage >= 2 && intowlPage <= 4 && boolRead_syusso_seisekiflg == false ){
		//今節成績前後

			//今節成績読み込み
			Read_syusso_seiseki( argRaceNum );

		}

		if( intowlPage >= 3 && intowlPage <= 5 && boolRead_syusso_allpastflg == false ){
		//全国過去2節前後

			//全国過去2節読み込み
			Read_syusso_allpast( argRaceNum );

		}

		if( intowlPage >= 4 && intowlPage <= 6 && boolRead_syusso_herepastflg == false ){
		//当地過去2節前後

			//当地過去2節読み込み
			Read_syusso_herepast( argRaceNum );

		}

		if( intowlPage >= 5 && intowlPage <= 7 && boolRead_syusso_motorflg == false ){
		//モーター履歴前後

			//モーター履歴読み込み
			Read_syusso_motor( argRaceNum );

		}

		if( intowlPage >= 8 && intowlPage <= 10 && boolRead_yoso_vpowerflg == false ){
		//予想 V-POWER前後

			//予想 V-POWER読み込み
			Read_yoso_vpower( argRaceNum );

		}

		if( boolRead_syusso_seisekiflg && boolRead_syusso_allpastflg && boolRead_syusso_herepastflg && boolRead_syusso_motorflg && boolRead_yoso_vpowerflg ){
		//全て初期読み込み完了したらループしない



		}else{

			//繰り返し実行
			setTimeout( 'Read_PageLoop("' + argRaceNum + '")' , 100 );

		}

	}

	

	//ページ読み込まれてから対象箇所に遷移する



	var boolScroll_myyosoflg = false;				//予想：マイデータ予想
	var boolScroll_odds_SearchNagashiflg = false;	//オッズ検索（流し）表示
	var boolScroll_odds_SearchBoxflg = false;		//オッズ検索（ボックス）表示
	var boolScroll_odds_Calcflg = false;			//オッズ計算


	function func_ScrollLoop( argPage ){

		if( argPage == 10 ){
		//予想：マイデータ予想表示

			if( intowlPage = 10 && boolScroll_myyosoflg == false ){

//console.log('マイデータ読み込み完了');

				//一旦トップに遷移してから
				$("html, body").animate({scrollTop:$('#top').offset().top}, 200, "swing");
				//対象に移動
				$("html, body").animate({scrollTop:$('#box_select_y').offset().top}, 100, "swing");

				//停止
				boolScroll_myyosoflg = true;

			}else{

				//繰り返し実行
				setTimeout( 'func_ScrollLoop("' + argPage + '")' , 100 );

			}

		}else if( argPage == 12 ){
		//オッズ検索（流し）表示

			if( intowlPage = 12 && boolScroll_odds_SearchNagashiflg == false ){

//console.log('オッズ検索（流し）表示');

				//一旦トップに遷移してから
				$("html, body").animate({scrollTop:$('#top').offset().top}, 200, "swing");
				//対象に移動
				$("html, body").animate({scrollTop:$('#nagashi_select').offset().top}, 100, "swing");

				//停止
				boolScroll_odds_SearchNagashiflg = true;

			}else{

				//繰り返し実行
				setTimeout( 'func_ScrollLoop("' + argPage + '")' , 100 );

			}

		}else if( argPage == 13 ){
		//オッズ検索（ボックス）表示

			if( intowlPage = 12 && boolScroll_odds_SearchBoxflg == false ){

//console.log('オッズ検索（ボックス）表示');

				//一旦トップに遷移してから
				$("html, body").animate({scrollTop:$('#top').offset().top}, 200, "swing");
				//対象に移動
				$("html, body").animate({scrollTop:$('#box_select').offset().top}, 100, "swing");

				//停止
				boolScroll_odds_SearchBoxflg = true;

			}else{

				//繰り返し実行
				setTimeout( 'func_ScrollLoop("' + argPage + '")' , 100 );

			}

		}else if( argPage == 14 ){
		//オッズ計算

			if( intowlPage = 14 && boolScroll_odds_Calcflg == false ){

//console.log('オッズ計算読み込み完了');

				//一旦トップに遷移してから
				$("html, body").animate({scrollTop:$('#top').offset().top}, 200, "swing");
				//対象に移動
				$("html, body").animate({scrollTop:$('#ta_calculate').offset().top}, 100, "swing");

				//停止
				boolScroll_odds_Calcflg = true;

			}else{

				//繰り返し実行
				setTimeout( 'func_ScrollLoop("' + argPage + '")' , 100 );

			}

		}

	}


//ロード時実行
//********************************

//********************************
//みどころボタンおされた時

	//○日目の見どころを選択(ページ内遷移)すると、タイトルがタブメニュー裏に隠れるの防止

	function funcMidokoroButton(){

		//初期化
		location.hash='';

		//一旦トップに遷移してから…
		$("html, body").animate({scrollTop:$('#top').offset().top}, 100, "swing");

		//みどころ位置に移動
		$("html, body").animate({scrollTop:$('#tenbo').offset().top}, 100, "swing");

		//みどころ記事を最新状態に変更
		document.getElementById('id_midokoro').click();


	}

//みどころボタンおされた時
//********************************

//********************************
//枠番別入着データ押された時

	function funcWaku_RitsuButton( argData ){

		//全て非表示
		for( var intLoopCount = 1; intLoopCount <= 6; intLoopCount++ ){
			$("#id_ta_shusso" + intLoopCount + "").hide();
		}

		//対象表示
		$("#id_ta_shusso" + argData + "").show();

	}

//枠番別入着データ押された時
//********************************

//********************************
//レース番号選択

	function Read_racenum_btn(){

		//30秒に一回更新
		var intLoopTime = 30000;

		var strSrc1;
		var objRequest1 = new XMLHttpRequest();

		objRequest1.open("GET", "/asp/kyogi/09/sp/racenum_btn.htm");

		objRequest1.setRequestHeader('Pragma', 'no-cache'); // HTTP/1.0 における汎用のヘッダフィールド
		objRequest1.setRequestHeader('Cache-Control', 'no-cache'); // HTTP/1.1 におけるキャッシュ制御のヘッダフィールド
		objRequest1.setRequestHeader('If-Modified-Since', 'Thu, 01 Jun 1970 00:00:00 GMT'); // 指定日時以降に更新があれば内容を返し、更新がなければ304ステータスを返す

		//20150730 sukenaga ロード方法変更
		objRequest1.onreadystatechange = function(){

			if (objRequest1.readyState === 4 && objRequest1.status === 200){

				strSrc1 = objRequest1.responseText;
				
				document.getElementById("id_Read_racenum_btn").innerHTML = strSrc1;

				objRequest1 = null;

			}

		};

		objRequest1.send();



		setTimeout( 'Read_racenum_btn()' , intLoopTime );

	}

	//レース番号選択
	function Race_btn( argJyoCode  , argRacenum ){

		//初期はトップ
		var intPage = 1;

		//レース番号選択時、下部で開いているタブの一覧頭のページに遷移する

		if( intowlPage >= 2 && intowlPage <= 6 ){
		//出走データ

			//選手評価へ。
			intPage = 2;

		}else if( intowlPage >= 7 && intowlPage <= 10 ){
		//予想

			intPage = 7;

		}else if( intowlPage >= 11 && intowlPage <= 16 ){
		//オッズ検索

			intPage = 11;

		}else if( intowlPage >= 17 && intowlPage <= 18 ){
		//直前情報＆スタ展

			intPage = 17;

		}

		//遷移
		location.href='/asp/tsu/sp/kyogi/index.asp?jyo=' + argJyoCode + '&racenum=' + argRacenum + '&page=' + intPage + '';


	}

//レース番号選択
//********************************

//********************************
//今節成績

	var boolRead_syusso_seisekiflg = false;

	function Read_syusso_seiseki( argData ){

		if( boolRead_syusso_seisekiflg == false ){
		//まだ読み込まれていない
			var strSrc1;
			var objRequest1 = new XMLHttpRequest();

			objRequest1.open("GET", "/asp/kyogi/09/sp/syusso_seiseki" + argData + ".htm");

			objRequest1.setRequestHeader('Pragma', 'no-cache'); // HTTP/1.0 における汎用のヘッダフィールド
			objRequest1.setRequestHeader('Cache-Control', 'no-cache'); // HTTP/1.1 におけるキャッシュ制御のヘッダフィールド
			objRequest1.setRequestHeader('If-Modified-Since', 'Thu, 01 Jun 1970 00:00:00 GMT'); // 指定日時以降に更新があれば内容を返し、更新がなければ304ステータスを返す

			//20150730 sukenaga ロード方法変更
			objRequest1.onreadystatechange = function(){

				if (objRequest1.readyState === 4 && objRequest1.status === 200){

					strSrc1 = objRequest1.responseText;
					
					document.getElementById("id_syusso_seiseki").innerHTML = strSrc1;

					//読み込み完了
					boolRead_syusso_seisekiflg = true;

					objRequest1 = null;

//console.log('syusso_seiseki読み込み');


				}

			};

			objRequest1.send();

		}

	}

//今節成績
//********************************

//********************************
//全国過去2節

	var boolRead_syusso_allpastflg = false;

	function Read_syusso_allpast( argData ){

		if( boolRead_syusso_allpastflg == false ){
		//まだ読み込まれていない
			var strSrc1;
			var objRequest1 = new XMLHttpRequest();

			objRequest1.open("GET", "/asp/kyogi/09/sp/syusso_allpast" + argData + ".htm");

			objRequest1.setRequestHeader('Pragma', 'no-cache'); // HTTP/1.0 における汎用のヘッダフィールド
			objRequest1.setRequestHeader('Cache-Control', 'no-cache'); // HTTP/1.1 におけるキャッシュ制御のヘッダフィールド
			objRequest1.setRequestHeader('If-Modified-Since', 'Thu, 01 Jun 1970 00:00:00 GMT'); // 指定日時以降に更新があれば内容を返し、更新がなければ304ステータスを返す

			//20150730 sukenaga ロード方法変更
			objRequest1.onreadystatechange = function(){

				if (objRequest1.readyState === 4 && objRequest1.status === 200){

					strSrc1 = objRequest1.responseText;
					
					document.getElementById("id_syusso_allpast").innerHTML = strSrc1;

					//読み込み完了
					boolRead_syusso_allpastflg = true;

					objRequest1 = null;

//console.log('syusso_allpast読み込み');


				}

			};

			objRequest1.send();

		}

	}

//全国過去2節
//********************************

//********************************
//当地過去2節

	var boolRead_syusso_herepastflg = false;

	function Read_syusso_herepast( argData ){

		if( boolRead_syusso_herepastflg == false ){
		//まだ読み込まれていない
			var strSrc1;
			var objRequest1 = new XMLHttpRequest();

			objRequest1.open("GET", "/asp/kyogi/09/sp/syusso_herepast" + argData + ".htm");

			objRequest1.setRequestHeader('Pragma', 'no-cache'); // HTTP/1.0 における汎用のヘッダフィールド
			objRequest1.setRequestHeader('Cache-Control', 'no-cache'); // HTTP/1.1 におけるキャッシュ制御のヘッダフィールド
			objRequest1.setRequestHeader('If-Modified-Since', 'Thu, 01 Jun 1970 00:00:00 GMT'); // 指定日時以降に更新があれば内容を返し、更新がなければ304ステータスを返す

			//20150730 sukenaga ロード方法変更
			objRequest1.onreadystatechange = function(){

				if (objRequest1.readyState === 4 && objRequest1.status === 200){

					strSrc1 = objRequest1.responseText;
					
					document.getElementById("id_syusso_herepast").innerHTML = strSrc1;

					//読み込み完了
					boolRead_syusso_herepastflg = true;

					objRequest1 = null;

//console.log('syusso_herepast読み込み');


				}

			};

			objRequest1.send();

		}

	}

//当地過去2節
//********************************

//********************************
//モーター履歴

	var boolRead_syusso_motorflg = false;

	function Read_syusso_motor( argData ){

		if( boolRead_syusso_motorflg == false ){
		//まだ読み込まれていない
			var strSrc1;
			var objRequest1 = new XMLHttpRequest();

			objRequest1.open("GET", "/asp/kyogi/09/sp/syusso_motor" + argData + ".htm");

			objRequest1.setRequestHeader('Pragma', 'no-cache'); // HTTP/1.0 における汎用のヘッダフィールド
			objRequest1.setRequestHeader('Cache-Control', 'no-cache'); // HTTP/1.1 におけるキャッシュ制御のヘッダフィールド
			objRequest1.setRequestHeader('If-Modified-Since', 'Thu, 01 Jun 1970 00:00:00 GMT'); // 指定日時以降に更新があれば内容を返し、更新がなければ304ステータスを返す

			//20150730 sukenaga ロード方法変更
			objRequest1.onreadystatechange = function(){

				if (objRequest1.readyState === 4 && objRequest1.status === 200){

					strSrc1 = objRequest1.responseText;
					
					document.getElementById("id_syusso_motor").innerHTML = strSrc1;

					//読み込み完了
					boolRead_syusso_motorflg = true;

					objRequest1 = null;

//console.log('syusso_motor読み込み');


				}

			};

			objRequest1.send();

		}

	}

//モーター履歴
//********************************

//********************************
//予想 記者展示直後
	function Read_yoso_kishatenji( argData ){

		//30秒に一回更新
		var intLoopTime = 30000;

		if( strAgent == 'Android' ){

			$('.class_ios').hide();
			$('.class_android').show();

		}else{

			$('.class_android').hide();
			$('.class_ios').show();

		}

		//展示リプレイ映像あるため、映像表示後は更新しないように。

		if( document.getElementById("id_yoso_tenji_movieok") != null && document.getElementById("id_yoso_tenji_dataok") != null ){
		//展示リプレイ映像OKのID存在する かつ 展示後予想データOKのIDが存在する

			//更新の必要がないためストップする
		}else{

			if( intowlPage == 8 && document.getElementById("id_yoso_tenji_movieok") != null ){
			//記者展示直後閲覧中 かつ 展示リプレイ映像OKの場合

				//展示後予想データがまだのため、更新続けるが、展示リプレイ閲覧していると更新したら映像が初めからにリセットされるため、更新しない

				//他ページ表示中、1秒後に更新
				intLoopTime = 1000;

			}else{

				var strSrc1;
				var objRequest1 = new XMLHttpRequest();

				objRequest1.open("GET", "/asp/kyogi/09/sp/yoso_kishatenji" + argData + ".htm");

				objRequest1.setRequestHeader('Pragma', 'no-cache'); // HTTP/1.0 における汎用のヘッダフィールド
				objRequest1.setRequestHeader('Cache-Control', 'no-cache'); // HTTP/1.1 におけるキャッシュ制御のヘッダフィールド
				objRequest1.setRequestHeader('If-Modified-Since', 'Thu, 01 Jun 1970 00:00:00 GMT'); // 指定日時以降に更新があれば内容を返し、更新がなければ304ステータスを返す

				//20150730 sukenaga ロード方法変更
				objRequest1.onreadystatechange = function(){

					if (objRequest1.readyState === 4 && objRequest1.status === 200){

						strSrc1 = objRequest1.responseText;
						
						document.getElementById("id_yoso_kishatenji").innerHTML = strSrc1;

						if( strAgent == 'Android' ){

							$('.class_ios').hide();
							$('.class_android').show();

						}else{

							$('.class_android').hide();
							$('.class_ios').show();

						}

						objRequest1 = null;

//console.log('yoso_kishatenji読み込み');

					}

				};

				objRequest1.send();

			}

			//繰り返し実行
			setTimeout( 'Read_yoso_kishatenji("' + argData + '")' , intLoopTime );

		}

	}

//予想 記者展示直後
//********************************

//********************************
//予想 V-POWER

	var boolRead_yoso_vpowerflg = false;

	function Read_yoso_vpower( argData ){

		if( boolRead_yoso_vpowerflg == false ){
		//まだ読み込まれていない
			var strSrc1;
			var objRequest1 = new XMLHttpRequest();

			objRequest1.open("GET", "/asp/kyogi/09/sp/yoso_vpower" + argData + ".htm");

			objRequest1.setRequestHeader('Pragma', 'no-cache'); // HTTP/1.0 における汎用のヘッダフィールド
			objRequest1.setRequestHeader('Cache-Control', 'no-cache'); // HTTP/1.1 におけるキャッシュ制御のヘッダフィールド
			objRequest1.setRequestHeader('If-Modified-Since', 'Thu, 01 Jun 1970 00:00:00 GMT'); // 指定日時以降に更新があれば内容を返し、更新がなければ304ステータスを返す

			//20150730 sukenaga ロード方法変更
			objRequest1.onreadystatechange = function(){

				if (objRequest1.readyState === 4 && objRequest1.status === 200){

					strSrc1 = objRequest1.responseText;
					
					document.getElementById("id_yoso_vpower").innerHTML = strSrc1;

					//読み込み完了
					boolRead_yoso_vpowerflg = true;

					objRequest1 = null;

//console.log('yoso_vpower読み込み');


				}

			};

			objRequest1.send();

		}

	}

//予想 V-POWER
//********************************

//********************************
//オッズ3連単・複

	function Read_odds_3rentanpuku( argData ){

		//30秒に一回更新
		var intLoopTime = 30000;

		//結果取得後は更新しないように。
		if( document.getElementById("id_3rantanpukuok") != null ){
		//結果取得後＝（締切後レース）の表示があればこのIDが存在するためそれで判断

		}else{

			if( intowlPage !== 11 ){
			//オッズ3連単表示以外の時のみ更新を行う

				var strSrc1;
				var objRequest1 = new XMLHttpRequest();

				objRequest1.open("GET", "/asp/kyogi/09/sp/odds_3rentanpuku" + argData + ".htm");

				objRequest1.setRequestHeader('Pragma', 'no-cache'); // HTTP/1.0 における汎用のヘッダフィールド
				objRequest1.setRequestHeader('Cache-Control', 'no-cache'); // HTTP/1.1 におけるキャッシュ制御のヘッダフィールド
				objRequest1.setRequestHeader('If-Modified-Since', 'Thu, 01 Jun 1970 00:00:00 GMT'); // 指定日時以降に更新があれば内容を返し、更新がなければ304ステータスを返す

				//20150730 sukenaga ロード方法変更
				objRequest1.onreadystatechange = function(){

					if (objRequest1.readyState === 4 && objRequest1.status === 200){

						strSrc1 = objRequest1.responseText;
						
						document.getElementById("id_odds_3rentanpuku").innerHTML = strSrc1;

//console.log('odds_3rentanpuku読み込み');

						if(typeof funcCalcAddClass == "function")
						{

							//オッズ計算用クラス付与
							funcCalcAddClass();

						}

						objRequest1 = null;

					}

				};

				objRequest1.send();

			}else{
			//開いている時は更新時間短くしておく

				//他ページ表示中、1秒後に更新
				intLoopTime = 1000;

			}

			setTimeout( 'Read_odds_3rentanpuku("' + argData + '")' , intLoopTime );

		}

	}

//オッズ3連単・複
//********************************


//********************************
//オッズ2連単・複

	function Read_odds_2rentanpuku( argData ){

//console.log('aaaaaa');

		//30秒に一回更新
		var intLoopTime = 30000;

		//結果取得後は更新しないように。
		if( document.getElementById("id_2rantanpukuok") != null ){
		//結果取得後＝（締切後レース）の表示があればこのIDが存在するためそれで判断

		}else{

			if( intowlPage !== 13 ){
			//オッズ2連単表示以外の時のみ更新を行う(結果表示では12だが、owl.carousel_index_kekkaで調整して13になるようにしている）

				var strSrc1;
				var objRequest1 = new XMLHttpRequest();

				objRequest1.open("GET", "/asp/kyogi/09/sp/odds_2rentanpuku" + argData + ".htm");

				objRequest1.setRequestHeader('Pragma', 'no-cache'); // HTTP/1.0 における汎用のヘッダフィールド
				objRequest1.setRequestHeader('Cache-Control', 'no-cache'); // HTTP/1.1 におけるキャッシュ制御のヘッダフィールド
				objRequest1.setRequestHeader('If-Modified-Since', 'Thu, 01 Jun 1970 00:00:00 GMT'); // 指定日時以降に更新があれば内容を返し、更新がなければ304ステータスを返す

				//20150730 sukenaga ロード方法変更
				objRequest1.onreadystatechange = function(){

					if (objRequest1.readyState === 4 && objRequest1.status === 200){

						strSrc1 = objRequest1.responseText;
						
						document.getElementById("id_odds_2rentanpuku").innerHTML = strSrc1;

//console.log('odds_2rentanpuku読み込み');

						if(typeof funcCalcAddClass == "function")
						{

							//オッズ計算用クラス付与
							funcCalcAddClass();

						}

						objRequest1 = null;


					}

				};

				objRequest1.send();

			}else{
			//開いている時は更新時間短くしておく

				//他ページ表示中、1秒後に更新
				intLoopTime = 1000;

			}

			setTimeout( 'Read_odds_2rentanpuku("' + argData + '")' , intLoopTime );

		}

	}

//オッズ2連単・複
//********************************


//********************************
//オッズ検索

	//流し箇所艇選択
	function funcOdds_NagashiSearch( argData , argData2 ){

		//リセット
		funcOdds_NagashiRiset(argData);

		//選択状態クラス付与
		$("#id_nagashi" + argData + "" + argData2 + "").addClass("on");

		//フォーム値操作
		document.ozzNagashiform['select' + argData + ''].value = argData2;

	}

	//流しリセット
	function funcOdds_NagashiRiset( argData ){

		for( var intLoopCount = 0 ; intLoopCount <= 7 ; intLoopCount ++){
		//ループ
			//onのクラス全て解除
			$("#id_nagashi" + argData + "" + intLoopCount + "").removeClass("on");
		}

	}

	//流し検索実行
	function funcOdds_NagashiSearchExe( ){

		var strSelect1 = document.ozzNagashiform.select1.value;
		var strSelect2 = document.ozzNagashiform.select2.value;
		var strSelect3 = document.ozzNagashiform.select3.value;
		var strResult = "";
		var Judge = true;
		
		if(strSelect1 == 7 && strSelect2 == 7 && strSelect3 == 7){//7は未選択
			Judge = false;
			strResult = strResult + "流し検索の1着・2着・3着を選択してください\n"
		}else if(strSelect1 == 7){//7は未選択
			Judge = false;
			strResult = strResult + "流し検索の1着を選択してください\n"
		}else if(strSelect2 == 7){//7は未選択
			Judge = false;
			strResult = strResult + "流し検索の2着を選択してください\n"
		}else if(strSelect3 == 7){//7は未選択
			Judge = false;
			strResult = strResult + "流し検索の3着を選択してください\n"
		}else if(strSelect1 == 0 && strSelect2 == 0 && strSelect3 == 0){
			Judge = false;
			strResult = strResult + "流し検索で1着・2着・3着とも全通りを選ぶことはできません\n"
		}else if(strSelect1 == strSelect2 && strSelect2 == strSelect3){
			Judge = false;
			strResult = strResult + "流し検索で1着・2着・3着とも同じ艇番を選ぶことはできません\n"
		}else if(strSelect1 > 0 && strSelect2 > 0 && strSelect1 == strSelect2){
			Judge = false;
			strResult = strResult + "流し検索で1着・2着とも同じ艇番を選ぶことはできません\n"
		}else if(strSelect3 > 0 && strSelect2 > 0 && strSelect2 == strSelect3){
			Judge = false;
			strResult = strResult + "流し検索で2着・3着とも同じ艇番を選ぶことはできません\n"
		}else if(strSelect1 > 0 && strSelect3 > 0 && strSelect3 == strSelect1){
			Judge = false;
			strResult = strResult + "流し検索で1着・3着とも同じ艇番を選ぶことはできません\n"
		}
		// 入力漏れがあれば、ミスの画面へ移動
		if(Judge == false)
		{
			alert(strResult);
		}
		else
		{//成功

			//実行
			document.ozzNagashiform.submit();

		}

	}

	//ボックス箇所艇選択
	function funcOdds_BoxSearch( argData  ){

		if( document.ozzBoxform['boxselect' + argData + ''].value == '0' ){
		//未選択、選択済みにする

			//選択状態クラス付与
			$("#id_box" + argData + "").addClass("on");

			document.ozzBoxform['boxselect' + argData + ''].value = '1';

		}else{
		//選択済み、解除する

			//選択状態クラス削除
			$("#id_box" + argData + "").removeClass("on");

			document.ozzBoxform['boxselect' + argData + ''].value = '0';

		}

	}

	//ボックス検索実行
	function funcOdds_BoxSearchExe( ){

		var intDataCount = 0;

		var strResult = "";
		var Judge = true;

		for( var intLoopCount = 1 ; intLoopCount <= 6 ; intLoopCount ++){
		//ループ
			if( document.ozzBoxform['boxselect' + intLoopCount + ''].value == '1' ){
				intDataCount++;
			}
		}
		
		if(intDataCount == 3 || intDataCount == 4){//3艇か4艇選択できている

		}else{
			Judge = false;
			strResult = strResult + "ボックス検索は3艇または4艇を選択してください\n"
		}

		// 入力漏れがあれば、ミスの画面へ移動
		if(Judge == false)
		{
			alert(strResult);
		}
		else
		{//成功

			//実行
			document.ozzBoxform.submit();

		}

	}


//オッズ検索
//********************************

//********************************
//オッズ計算

	//オッズ計算実行
	function funcOdds_CalcExe( ){

		var strResult = "";
		var Judge = true;

		if( document.ozzCalcform.field_shikin1.value == '' && document.ozzCalcform.field_shikin2.value == '' ){
		//どちらも入力無し

			Judge = false;
			strResult = strResult + "資金配分もしくは1点購入額どちらかを入力してください\n"

		}else if( document.ozzCalcform.field_shikin1.value != '' && document.ozzCalcform.field_shikin2.value != '' ){
		//どちらも入力有

			Judge = false;
			strResult = strResult + "資金配分もしくは1点購入額どちらかを入力してください\n"

		}else{
		//どちらか入力

			if( document.ozzCalcform.Odds_Kumi_Count.value > 0 ){
			//組合せ1点以上

				if( document.ozzCalcform.field_shikin1.value != '' ){
				//資金配分

					if( funcintCheck( document.ozzCalcform.field_shikin1.value ) ) {

						//100円単位か確認

						//下2ケタが00かどうかで判断
						if( document.ozzCalcform.field_shikin1.value.substr(document.ozzCalcform.field_shikin1.value.length-2,2) == '00' ){

							if( ( document.ozzCalcform.field_shikin1.value / 100 ) < document.ozzCalcform.Odds_Kumi_Count.value ){
							//購入点数より金額のほうが少ない

								Judge = false;
								strResult = strResult + "資金配分は購入点数×100円以上の金額を入力してください\n"

							}

						}else{

							Judge = false;
							strResult = strResult + "資金配分は100円単位で入力してください\n"

						}

					}else{

						Judge = false;
						strResult = strResult + "資金配分は数値で入力してください\n"

					}

				}


				if( document.ozzCalcform.field_shikin2.value != '' ){
				//1点購入額

					if( funcintCheck( document.ozzCalcform.field_shikin2.value ) ) {

						//100円単位か確認

						//下2ケタが00かどうかで判断
						if( document.ozzCalcform.field_shikin2.value.substr(document.ozzCalcform.field_shikin2.value.length-2,2) == '00' ){
						}else{

							Judge = false;
							strResult = strResult + "1点購入額は100円単位で入力してください\n"

						}

					}else{

						Judge = false;
						strResult = strResult + "1点購入額は数値で入力してください\n"

					}

				}

			}else{

				Judge = false;
				strResult = strResult + "組み合わせを1点以上選択してください\n"

			}


		}

		// 入力漏れがあれば、ミスの画面へ移動
		if(Judge == false)
		{
			alert(strResult);
		}
		else
		{//成功

			//実行
			document.ozzCalcform.submit();

		}

	}

	//オッズ計算値リセット
	function funcOdds_CalcReset( ){

		document.ozzCalcform.field_shikin1.value = '';
		document.ozzCalcform.field_shikin2.value = '';

	}

	//数値チェック(マイナスも小数点も弾く
	function funcintCheck( argdata )
	{
		var intjudge = false;

		if(argdata.match(/^[0-9]*$/) != "" && argdata.match(/^[0-9]*$/) != null)
		{
			intjudge = true;
		}

		return intjudge;
	}

	//オッズ組合せ削除
	function funcOdds_CalcDelete( argData ){

		var strTempData;

		myRet = confirm("組み合わせを削除しますか？");

		strTempData = argData

		if ( myRet == true ){
		//はいを選択

			funcCalcToggle( strTempData );

			//組合せ箇所非表示にする
			$('#id_' + strTempData + '').hide();

			if( document.ozzCalcform.Odds_Kumi_Count.value == '0' ){
			//総数が0件に

				//テーブル箇所非表示にする
				$('#ta_calculate_kekka').hide();

			}

		}

	}

	//オッズ計算登録登番全てリセット
	function funcOdds_CalcAllReset( argRacenum ){

		myRet = confirm("組み合わせのすべてをリセットしますか？");

		if ( myRet == true ){
		//はいを選択


			//組データ
			var strOddsKumi = window.localStorage.getItem('OddsKumi' + ( "0" + argRacenum ).slice(-2) + '');
			var strAryOddsKumi = '';
			var strTempClass = '';

			//フォームデータ操作
			var intKumiCount = 0;		//組数カウント
			var strJs = '';				//フォームデータ用js生成

			if( strOddsKumi ){
			//データ有

				//配列に
				strAryOddsKumi = strOddsKumi.split(':::');


				for( var intLoopCount = 0 ; intLoopCount < ( strAryOddsKumi.length ); intLoopCount++ ){
					//調整
					strTempClass = strAryOddsKumi[ intLoopCount ];
					strTempClass = strTempClass.replace( '[' , '' );
					strTempClass = strTempClass.replace( ']' , '' );

					if( strTempClass !== '' ){
						//クラス削除
						$('.class_' + strTempClass + '').removeClass("select");
					}
				}

				if( document.getElementById("id_Calc_form") ){
				//idが存在した
					//組合せ総数代入
					document.ozzCalcform.Odds_Kumi_Count.value = 0;
					//値代入
					document.getElementById("id_Calc_form").innerHTML = strJs;
				}

				//組データ削除
				window.localStorage.removeItem('OddsKumi' + ("0" + argRacenum ).slice(-2) + '');

			}

			//テーブル箇所非表示にする
			$('#ta_calculate_kekka').hide();

			//すべてリセットボタン非表示にする
			$('#id_allreset').hide();

		}



	}


//オッズ計算
//********************************


//********************************
//直前情報＆スタ展

	function Read_cyoku( argData ){

		//30秒に一回更新
		var intLoopTime = 30000;

		if( strAgent == 'Android' ){

			$('.class_ios').hide();
			$('.class_android').show();

		}else{

			$('.class_android').hide();
			$('.class_ios').show();

		}

		//展示リプレイ映像あるため、映像表示後は更新しないように。
		if( document.getElementById("id_tenji_movieok") != null ){
		//展示リプレイ映像があればこのIDが存在するためそれで判断

		}else{

			if( intowlPage !== 16 ){
			//スタ展表示以外の時のみ更新を行う

				var strSrc1;
				var objRequest1 = new XMLHttpRequest();

				objRequest1.open("GET", "/asp/kyogi/09/sp/cyoku" + argData + ".htm");

				objRequest1.setRequestHeader('Pragma', 'no-cache'); // HTTP/1.0 における汎用のヘッダフィールド
				objRequest1.setRequestHeader('Cache-Control', 'no-cache'); // HTTP/1.1 におけるキャッシュ制御のヘッダフィールド
				objRequest1.setRequestHeader('If-Modified-Since', 'Thu, 01 Jun 1970 00:00:00 GMT'); // 指定日時以降に更新があれば内容を返し、更新がなければ304ステータスを返す

				//20150730 sukenaga ロード方法変更
				objRequest1.onreadystatechange = function(){

					if (objRequest1.readyState === 4 && objRequest1.status === 200){

						strSrc1 = objRequest1.responseText;
						
						document.getElementById("id_cyoku").innerHTML = strSrc1;

						if( strAgent == 'Android' ){

							$('.class_ios').hide();
							$('.class_android').show();

						}else{

							$('.class_android').hide();
							$('.class_ios').show();

						}

//console.log('cyoku読み込み');
						objRequest1 = null;

					}

				};

				objRequest1.send();

			}else{
			//開いている時は更新時間短くしておく

				//他ページ表示中、1秒後に更新
				intLoopTime = 1000;

			}

			setTimeout( 'Read_cyoku("' + argData + '")' , intLoopTime );

		}

	}

//直前情報＆スタ展
//********************************
