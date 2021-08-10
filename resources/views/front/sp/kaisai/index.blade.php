<!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_sp.js"></script>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta name="format-detection" content="telephone=no"/>
<meta name="viewport" content="width=720px">


<title>競技情報｜ボートレース津</title>
<meta name="Keywords" content="BOAT RACE津,ボートレース,津,ライブ,リプレイ,予想,動画" />
<meta name="Description" content="BOAT RACE津が開催するレースの動画（ライブおよびリプレイ）をはじめ出走表など各種情報、予想に役立つデータを掲載しています。" />

<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/sp/kyogi/css/reset.css" />
<link rel="stylesheet" href="/sp/kyogi/css/kyogi.css" />
<link rel="stylesheet" href="/sp/kyogi/css/style.css" />
<link rel="stylesheet" href="/sp/kyogi/css/custom.css" />

<script type="text/javascript" src="/sp/kyogi/js/jquery-1.8.3.min.js"></script>

<!-- 共通 -->
<script type="text/javascript" src="/sp/kyogi/js/common.js"></script>

<!-- アコーディオン -->
<script type="text/javascript" src="/sp/kyogi/js/jquery.accordion.js"></script>

<!-- ボタン表示1～12R -->
<script type="text/javascript" src="/sp/kyogi/js/jquery.raceselect.js"></script>

<!--バックナンバーまわり-->
<script type="text/javascript" src="/sp/kyogi/js/jquery.tabs_midkoro.js"></script>

<!-- スライド -->
<script type="text/javascript" src="/sp/kyogi/js/jquery.slide.js"></script>

<!-- メッセージ -->
<script type="text/javascript" src="/sp/kyogi/js/jquery.marquee.js"></script>
<script>
    $(document).ready(function (){
  $("#marquee").marquee({
	  scrollSpeed: 6,
	  showSpeed: 1000,
	  pauseSpeed: 1000
	  });
});
</script>


<!-- フリック -->
<script type="text/javascript" src="/sp/kyogi/js/FlickReady.js"></script>
<link rel="stylesheet" href="/sp/kyogi/css/owl.carousel.css" />
<link rel="stylesheet" href="/sp/kyogi/css/owl.theme.css" />

@if(($kekka_change_race_num ?? 0) >= $race_num)
<script type="text/javascript" src="/sp/kyogi/js/owl.carousel_index_kekka.js"></script>	
@else
<script type="text/javascript" src="/sp/kyogi/js/owl.carousel_index.js"></script>
@endif

<script type="text/javascript">
	$(document).ready(function() {
		$("#slide").owlCarousel({
			navigation : false,
			pagination : false,
			slideSpeed : 300,
			paginationSpeed : 300,
			singleItem : true,
			autoHeight : true,
			lazyLoad : true // 画像読み込み時にローディングアイコンを表示
		});

		
		var g_oldMainPage = "";
		var g_oldSubPage  = "";

		
		function postCurrentPage(data1, data2) {

			
			var $selectedNode = $("#tab_index").find(".selected");

			
			var selectedClasses = $selectedNode.attr("class").split(" ");

			
			var selectedClass = "";
			for(var i = 0; i < selectedClasses.length; i++) {
				selectedClass = selectedClasses[i];
				if (selectedClass.indexOf("page_num") > -1) {
					// 「page_num」がclass名に含まれていた場合、ループ抜ける
					break;
				}
			}

			
			var mainPage = $selectedNode.attr("id").slice(-1);

			
			var subPage  = selectedClass.slice(-1);

			
			if ((g_oldMainPage == mainPage)
				&&(g_oldSubPage == subPage)) {
				
				return false;
			}

			
			g_oldMainPage = mainPage;
			g_oldSubPage  = subPage;

			var isFinishedRace = false;

			
			if (mainPage == "4") {
				var elem = $("#tab04").children(".page4").attr("class");

				// classが「page4」のときはレース終了後
				if (elem == "page4") {
					isFinishedRace = true;
				}
			}

			
			$.ajax({
				type: "POST",
				url: "http://" + document.domain + "/asp/tsu/sp/kyogi/Logger.asp",
				data: {
					"mainpage": mainPage,	
					"subpage" : subPage,	
					"isFinishedRace" : isFinishedRace	
				}
			});
		}

		
		var observer = new MutationObserver(postCurrentPage);

		
		const observeTarget = document.getElementById("tab_index");
		const observeConfig = {
			childList : true,
			attributes: true,
			subtree: true
		};

		
		observer.observe(observeTarget, observeConfig);

		
		setTimeout(function(){
				postCurrentPage(null,null);
			}
			,1000
		);
    });




</script>

<!-- 下部メニュー -->
<script type="text/javascript" src="/sp/js/data_navi.js"></script>

<!-- system共通js読み込み -->
<script type="text/javascript" src="/asp/tsu/sp/kyogi/common.js"></script>

<!--  -->
<script type="text/javascript" src="/asp/videoplayer/common/LiveSmartAgentGetter.js"></script>
<script type="text/javascript">
var strAgent;
strAgent = funcJsLiveSmartAgentGetter();
</script>
<script type="text/javascript">
//計算用
	//初期読み込み
	function funcCalcload(){
		//基準日取得
		var strCalcDate = window.localStorage.getItem('CalcDate');
		var strOddsKumi = ''
		if( strCalcDate ){
		//データ有
			if( strCalcDate !== '{{$target_date}}' ){
			//基準日が表示日付と異なる時のデータ時削除
				for( var intLoopCount = 1 ; intLoopCount <= 12 ; intLoopCount++ ){
				//12R分
					//組データ
					strOddsKumi = window.localStorage.getItem('OddsKumi' + ("0"+intLoopCount).slice(-2) + '');
					if( strOddsKumi ){
					//データ有
						//組データ削除
						window.localStorage.removeItem('OddsKumi' + ("0"+intLoopCount).slice(-2) + '');
					}
				}
				//削除
				window.localStorage.removeItem('CalcDate');
			}else{
			//削除しない時,選択している組合せにクラス付与
				funcCalcAddClass();
			}
		}
		//基準日記憶させる
		window.localStorage.setItem('CalcDate', '{{$target_date}}' );
	}
	//保存データにクラス付与と同時にオッズ計算フォームの値操作
	function funcCalcAddClass(){
		//組データ
		
		var strOddsKumi = window.localStorage.getItem('OddsKumi{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}');
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
					//クラス付与
					$('.class_' + strTempClass + '').addClass("select");
					//組数カウント
					intKumiCount++;
					strJs = strJs + '<input type=\"hidden\" name=\"Odds_Kumi' + intKumiCount + '\" value=\"' + strTempClass + '\">\n';
				}
			}
		}
		if( document.getElementById("id_Calc_form") ){
		//idが存在した
			//組合せ総数代入
			document.ozzCalcform.Odds_Kumi_Count.value = intKumiCount;
			//値代入
			document.getElementById("id_Calc_form").innerHTML = strJs;
		}
	}
	//組番ほりこむと保存、削除
	function funcCalcToggle( argKumi ){
		var strOddsKumi = window.localStorage.getItem('OddsKumi{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}');
		//デフォルトは保存
		var boolSaveflg = true;
		if( strOddsKumi ){
		//データ有
			//すでに存在しているか確認
			if( strOddsKumi.indexOf( '[' + argKumi + ']' ) >= 0 ){
				//削除する
				boolSaveflg = false;
			}
		}else{
			//初期値代入
			strOddsKumi = '';
		}
		if( boolSaveflg ){
		//保存
			strOddsKumi = strOddsKumi + '[' + argKumi + ']:::'
		}else{
		//削除
			//置換で削除する
			strOddsKumi = strOddsKumi.replace( '[' + argKumi + ']:::' , '' );
			$('.class_' + argKumi + '').removeClass("select");
		}
		//再度記憶させる
		window.localStorage.setItem('OddsKumi{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}', strOddsKumi );
		//保存データにクラス付与
		funcCalcAddClass();
	}
</script>


</head>


<body onload="funcLoad('{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}');">


<div id="wrapper"><!-- wrapper start -->

<div id="header"><!-- header start -->
<h1><a href="/sp/"><div>BOAT RACE 津 09#</div></a></h1>
<ul id="header_nav">
<li id="live"><a href="movie_live.asp?jyo=09"><div>ライブ</div></a></li>
<li id="replay"><a href="/sp/kyogi/replay.htm"><div>リプレイ</div></a></li>
<li id="vote"><a href="/asp/log/tsu_sp_kyogi.asp" target="_blank"><div>投票する</div></a></li>
</ul>
</div><!-- header end -->

<div id="main"><!-- main start -->

<div id="race">
<table>
<tr>
<td class="date">{{ date('n/j',strtotime($target_date)) }}</td>


@isset($kaisai_master)
	<td class="name">{{$kaisai_master->開催名称}}</td>
	<td class="day">
		@if($kaisai_master->開始日付 == $target_date)
			初日
		@elseif($kaisai_master->終了日付 == $target_date)
			最終日                
		@else
			{{$race_header->KAISAI_DAYS}}日目
		@endif
	</td>	
@else
	<td class="name">---</td>
	<td class="day">---</td>
@endisset
</tr>
</table>
</div><!-- race end -->

@if($yoso_message)
<!-- 記者用メッセージ-->
<div id="message01" class="cf">
	<ul id="marquee" class="marquee">
	<li>{{$yoso_message->COMMENT ?? ""}}</li>
	</ul>
</div>
@endif

@if($kekka_info)
<div id="kikou" class="cf">
	<div class="kikou_left"><span class="gray">天候</span>:{{$kekka_info->TENKOU}}　<span class="gray">波高:</span>{{$kekka_info->HAKO}}cm　<span class="gray">風:</span>{{$kekka_info->KAZAMUKI2}} {{$kekka_info->FUSOKU}}m/秒</div>
	<div class="kikou_right">{{$neer_kekka_race_number ?? "---"}}R終了時点</div>
</div><!-- kikou end -->
@endif

<div id="race_select" class="cf">
@if($race_num == 1)
	<div id="back"></div>
@else
	<div id="back"><a href="javascript:Race_btn('09','{{$race_num - 1}}');">back</a></div>
@endif
<div id="num_select">
<div class="select" id="id_num_select">{{$race_num}}R</div>
</div>
@if($race_num == 12)
	<div id="next"></div>
@else
	<div id="next"><a href="javascript:Race_btn('09','{{$race_num + 1}}');">next</a></div>
@endif
<table>
<tr>
<td class="class">{{ $syussou[1]->RACE_NAME ?? "" }}</td>
<td class="dento"><span>発売<br>締切</span></td>
<td class="time">{{substr(($shimekiri_jikoku ?? "--"),0,2)}}:{{substr(($shimekiri_jikoku ?? "----"),2,2)}}</td>
</tr>
</table>


<!-- ボタン展開 -->
<div id="id_racenum_btn">
<div id="racenum_btn">
<ul>

<div id="id_Read_racenum_btn"></div>
<script type="text/javascript">
	//レース番号選択読み込み
	Read_racenum_btn();
</script>

<li class="sukima"></li></ul>

</div><!-- racenum_btn end -->

</div><!-- id_racenum_btn end -->

</div><!-- race_select end -->



<div id="shusso" class="cf">

<ul id="tab_index" class="cf">
<li id="tab01" class="tap"><div class="page1"></div></li>
<li id="tab02" class="tap"><div class="page5"></div></li>
<li id="tab03" class="tap"><div class="page4"></div></li>
@if(($kekka_change_race_num ?? 0) >= $race_num)
<li id="tab04" class="tap"><div class="page4"></div></li>
@else
<li id="tab04" class="tap"><div class="page5"></div></li>
@endif
<li id="tab05" class="tap"><div class="page1"></div></li>

<li class="grayline"><img src="/sp/kyogi/images/bk_tab.png" width="720" height="14" alt=""/></li>
</ul>
<!-- slide start-->
<div id="slide" class="owl-carousel owl-theme">
    <!--スタ展 表示合わせる用-->
	<div class="item cf">
		<div class="page_tit"></div>
	</div><!-- item end -->
	
	<!--トップ①-->
	<div class="item cf" id="top">
		
		@if(file_exists(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/Top_Contents.htm'))
			{!! file_get_contents(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/Top_Contents.htm') !!}
		@endif
		
	</div><!-- item end -->

	<!--出走データ①-->
	<div class="item cf data hyoka">

		@if(file_exists(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/syusso_hyoka'.str_pad($race_num, 2, '0', STR_PAD_LEFT).'.htm'))
			{!! file_get_contents(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/syusso_hyoka'.str_pad($race_num, 2, '0', STR_PAD_LEFT).'.htm') !!}
		@endif

	</div><!-- item end -->

	<!--出走データ②-->
	<div class="item konsetsu cf">
		<div id="id_syusso_seiseki">
			<div class="page_tit">今節成績</div>
			@if(file_exists('dammy.htm'))
				{!! file_get_contents('dammy.htm') !!}
			@endif
		</div>
	</div><!-- item end -->

	<!--出走データ③-->
	<div class="item zen_kako cf">
		<div id="id_syusso_allpast">
			<div class="page_tit">全国過去2節</div>
			@if(file_exists('dammy.htm'))
				{!! file_get_contents('dammy.htm') !!}
			@endif
		</div>
	</div><!-- item end -->

	<!--出走データ④/-->
	<div class="item tochi_kako cf">
		<div id="id_syusso_herepast">
			<div class="page_tit">当地過去2節</div>
			@if(file_exists('dammy.htm'))
				{!! file_get_contents('dammy.htm') !!}
			@endif
		</div>
	</div><!-- item end -->

	<!--出走データ⑤/-->
	<div class="item motor_rireki">
		<div id="id_syusso_motor">
			<div class="page_tit">モーター履歴</div>
			@if(file_exists('dammy.htm'))
				{!! file_get_contents('dammy.htm') !!}
			@endif
		</div>
	</div><!-- item end -->
	
	<!--予想①/-->
	<div class="item yoso1 cf" id="yoso1">
		
		@if(file_exists(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/yoso_kishaeve'.str_pad($race_num, 2, '0', STR_PAD_LEFT).'.htm'))
			{!! file_get_contents(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/yoso_kishaeve'.str_pad($race_num, 2, '0', STR_PAD_LEFT).'.htm') !!}
		@endif

	</div><!-- item end -->

	
	<!--予想②/-->
	<div class="item yoso2">
		<div id="id_yoso_kishatenji">
			@if(file_exists(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/yoso_kishatenji'.str_pad($race_num, 2, '0', STR_PAD_LEFT).'.htm'))
				{!! file_get_contents(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/yoso_kishatenji'.str_pad($race_num, 2, '0', STR_PAD_LEFT).'.htm') !!}
			@endif
		</div>
		@if($tomorrow_flg || (830 > (int)$target_time ) || !$kaisai_master  )
		@else
			<script type="text/javascript">
				//記者展示直後読み込み
				Read_yoso_kishatenji('{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}');
			</script>
		@endif
	</div>
	
	<!--予想③/-->
	<div class="item yoso3">
		<div id="id_yoso_vpower">
			<div class="page_tit">V-POWER</div>
			@if(file_exists('dammy.htm'))
				{!! file_get_contents('dammy.htm') !!}
			@endif
		</div>
	</div><!-- item end -->

	<!--予想④/-->
	<div class="item yoso4 cf" id="yoso4">
		{{-- file_get_contents(config('const.EXPORT_PATH').'/asp/tsu/sp/kyogi/Yoso_MyData.asp') --}}
		{!! $view_yoso_mydata ?? "" !!}
		<span id="id_myyoso"></span>
	</div><!-- item end -->

	<!--オッズ結果①/-->
	<div class="item data cont_odds cf">
		<div id="id_odds_3rentanpuku">
			@if(file_exists(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/odds_3rentanpuku'.str_pad($race_num, 2, '0', STR_PAD_LEFT).'.htm'))
				{!! file_get_contents(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/odds_3rentanpuku'.str_pad($race_num, 2, '0', STR_PAD_LEFT).'.htm') !!}
			@endif
		</div>
		@if($tomorrow_flg || (830 > (int)$target_time ) || !$kaisai_master )
		@else
			<script type="text/javascript">
				//オッズ 3連単複読み込み
				Read_odds_3rentanpuku( '{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}' );
			</script>
		@endif
	</div><!-- item end -->

	@if(($kekka_change_race_num ?? 0) < $race_num)
		<!--オッズ結果②/-->
		<div class="item cont_odds">
			{{-- file_get_contents(config('const.EXPORT_PATH').'/asp/tsu/sp/kyogi/Odds_Search.asp') --}}
			{!! $view_odds_search ?? "" !!}
			<span id="id_oddsSearch"></span>
		</div><!-- item end -->
	@endif

	<!--オッズ結果③/-->
	<div class="item cont_odds">
		<div id="id_odds_2rentanpuku">
			@if(file_exists(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/odds_2rentanpuku'.str_pad($race_num, 2, '0', STR_PAD_LEFT).'.htm'))
				{!! file_get_contents(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/odds_2rentanpuku'.str_pad($race_num, 2, '0', STR_PAD_LEFT).'.htm') !!}
			@endif
		</div>
		@if($tomorrow_flg || (830 > (int)$target_time ) || !$kaisai_master )
		@else
			<script type="text/javascript">
				//オッズ 3連単複読み込み
				Read_odds_2rentanpuku( '{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}' );
			</script>
		@endif
	</div><!-- item end -->

	@if(($kekka_change_race_num ?? 0) < $race_num)
		<!--オッズ結果④/-->
		<div class="item data calculate cf">
			{!! $view_odds_calc ?? "" !!}
			<span id="id_oddsCalc"></span>
		</div><!-- item end -->
	@endif

	<!--オッズ結果⑤/-->
	<div class="item data cf">
		<span id="id_kekkalist"></span>
		{!! $view_kekka_list ?? "" !!}
	</div><!-- item end -->

	@if(($kekka_change_race_num ?? 0) >= $race_num)
		<!--オッズ結果⑤/-->
		<div class="item data">
			<span id="id_kekkaDetail"></span>
			@if(file_exists(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/Kekka_Detail'.str_pad($race_num, 2, '0', STR_PAD_LEFT).'.htm'))
				{!! file_get_contents(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/Kekka_Detail'.str_pad($race_num, 2, '0', STR_PAD_LEFT).'.htm') !!}
			@endif
		</div><!-- item end -->
	@endif

	<!--スタ展①/-->
	<div class="item data choku cf">
		<div id="id_cyoku">
			@if(file_exists(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/Cyoku'.str_pad($race_num, 2, '0', STR_PAD_LEFT).'.htm'))
				{!! file_get_contents(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/Cyoku'.str_pad($race_num, 2, '0', STR_PAD_LEFT).'.htm') !!}
			@endif
		</div>
		@if($tomorrow_flg || (830 > (int)$target_time ) || !$kaisai_master )
		@else
			<script type="text/javascript">
				//オッズ 3連単複読み込み
				Read_cyoku( '{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}' );
			</script>
		@endif
	</div><!-- item end -->


</div><!-- slide end -->

<span id="id_midokoroyosokekka" style="display:none;">
	@if(file_exists(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/Top_MidokotoYosokekka.htm'))
		{!! file_get_contents(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/Top_MidokotoYosokekka.htm') !!}
	@endif
</span>

<span id="id_waku_ritsu" style="display:none;">
	<!--「出走データ」全ページ共通表示-->
	@if(file_exists(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/syusso_wakuritsu'.str_pad($race_num, 2, '0', STR_PAD_LEFT).'.htm'))
		{!! file_get_contents(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/syusso_wakuritsu'.str_pad($race_num, 2, '0', STR_PAD_LEFT).'.htm') !!}
	@endif
</span>

</div><!-- shusso end -->



<!-- データリンク -->
<script type="text/javascript">
	funcTsuDataMenu();
</script>

</div><!-- main end -->


<div id="footer"><!-- footer start -->
<div id="page_top"><a href="#wrapper">▲ページ上部へ</a></div>
<div id="b_top"><a href="/asp/tsu/sp/kyogi/index.asp">データ&amp;レース予想</a></div>
<div id="copyright"><a href="/sp/">
<div>&copy;BOAT RACE TSU All rights reserved.</div>
</a></div>
</div><!-- footer end -->
</div><!-- wrapper end -->

<!--<span id="id_owl"><span>-->

</body>
</html>