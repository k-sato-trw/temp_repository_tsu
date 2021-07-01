

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<title>オッズ・3連単検索</title>

<link href="/kaisai/css/reset.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/common.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/syusso.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/odds.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="/kaisai/js/jquery-1.8.2.min.js"></script>


<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="/asp/kyogi/09/pc/Jsinfo.js"></script>
</head>

<body>


<div id="main_menu">
<div id="date_btn">

<div id="date">
<div id="date_l"><script type="text/javascript">
	func_Backbtn('{{$target_date}}' , 'odds02' );
</script>
</div><!--/#date_l-->
<div id="date_c">@if($kaisai_master)
    @if(($chushi_junen->中止開始レース番号 ?? 99) <= $race_num)
        中止
    @else
        @if($kaisai_master->開始日付 == $target_date)
            初日
        @elseif($kaisai_master->終了日付 == $target_date)
            最終日                
        @else
            {{$race_header->KAISAI_DAYS}}日目
        @endif
    @endif
@endif
<span class="date">{{ date('n/j',strtotime($target_date)) }}</span></div><!--/#date_c-->
<div id="date_r"><script type="text/javascript">
	func_Nextbtn('{{$target_date}}' , 'odds02' );
</script>
</div><!--/#date_r-->
<div class="clear"></div>
</div><!--/#date-->

</div><!--/#date_btn-->

<div id="race_btn">
<ul>
<script type="text/javascript">
func_RaceNumList('{{$target_date}}' , {{$race_num}}, 'odds02' );
</script>
<div class="clear"></div>
</ul>
</div><!--/#race_btn-->
<div class="clear"></div>
</div><!--/#main_menu-->

<div id="race_info">
<div id="name">{{ $syussou[1]->RACE_NAME ?? "" }}</div>
<div id="time">発売締切<span>{{substr($shimekiri_jikoku,0,2)}}:{{substr($shimekiri_jikoku,2,2)}}</span></div>
<div class="clear"></div>
</div><!--/#race_info-->


<div id="main_race">
<div id="main_race_l"><a href="/asp/kyogi/09/pc/odds01/odds01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">前へ</a></div><!--/#main_race_l-->

<!-----------------------------------
▼オッズ -->
<div id="odds">
<!-----------------------------------
▼メインメニュー -->
<ul id="race_btn_main">
<li id="btn01"><a href="/asp/kyogi/09/pc/syusso01/syusso01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">出走表</a></li>
<li id="btn02" class="select">オッズ</li>
<li id="btn03"><a href="/asp/kyogi/09/pc/yoso01/yoso01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">レース予想</a></li>
<li id="btn04"><a href="/asp/kyogi/09/pc/st01/st01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">スタ展・直前情報</a></li>
<li id="btn05"><a href="/asp/kyogi/09/pc/kekka01/kekka01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">レース結果</a></li>
<div class="clear"></div>
</ul>

<!-----------------------------------
▼タブ -->
<div id="tab">
<ul id="tab_odds">
<li><a href="/asp/kyogi/09/pc/odds01/odds01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">3連単／複</a></li>
<li class="select">3連単検索</li>
<li><a href="/asp/kyogi/09/pc/odds03/odds03{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">2連単／複･単勝･複勝･拡連複</a></li>
<li><a href="/asp/kyogi/09/pc/odds04/odds04{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">3連単／2連単ランキング</a></li>
<div class="clear"></div>
</ul>
</div><!--/#tab-->

@if($kaisai_master && $ozz_3rentan)
    @if( ($chushi_junen->中止開始レース番号 ?? 99) <= $race_num )
        {{--中止の場合--}}
        <div class="cont_odds2">
            <table class="ta_kyogi">
                <tr>
                    @if($chushi_junen->中止開始レース番号 > 0 )
                        <td class="cyushi">第{{$chushi_junen->中止開始レース番号}}R以降は中止となりました</td>
                    @else
                        <td class="cyushi">中止となりました</td>
                    @endif
                </tr>
            </table>
        </div>

    @elseif( $shimekiri_jikoku <= $target_time )  
        {{--締切時間経過の場合--}}
        <div class="cont_odds2">
            <table class="ta_kyogi">
                <tr>
                    <td class="nodata">オッズの表示は終了しました</td>
                </tr>
            </table>
        </div>
    @else

		<script language="JavaScript">

			var varOzzRen = new Array(@foreach($ozz_3rentan as $item) "{{$item->NUMBER1."-".$item->NUMBER2."-".$item->NUMBER3}}", @endforeach);
			var varOzzData = new Array(@foreach($ozz_3rentan as $item) "{{$item->BAIRITU}}", @endforeach);
		function funcOnLoad()
		{
			document.ozzNagashiform.select1.value = 7;
			document.ozzNagashiform.select2.value = 7;
			document.ozzNagashiform.select3.value = 7;
		}
		function funcselect1(sel1)
		{
			if(document.ozzNagashiform.select1.value != sel1)
			{
				document.ozzNagashiform.select1.value = sel1;
			}
		}
		function imageChange1()
		{
			var strReturn;
			var strSelect;
			var strLoopCount;
			strReturn = "";
			strSelect = document.ozzNagashiform.select1.value;
			strLoopCount = 1;
			if(document.getElementById)
			{
				if(strLoopCount == strSelect)
				{
					strReturn = strReturn + "<li class=\"b1 on\" onclick=\"funcselect1('1');imageChange1();\">{{$syussou[1]->SENSYU_NAME}}@if($syussou[1]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}else{
					strReturn = strReturn + "<li class=\"b1\" onclick=\"funcselect1('1');imageChange1();\">{{$syussou[1]->SENSYU_NAME}}@if($syussou[1]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}
				strLoopCount = strLoopCount + 1;
				if(strLoopCount == strSelect)
				{
					strReturn = strReturn + "<li class=\"b2 on\" onclick=\"funcselect1('2');imageChange1();\">{{$syussou[2]->SENSYU_NAME}}@if($syussou[2]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}else{
					strReturn = strReturn + "<li class=\"b2\" onclick=\"funcselect1('2');imageChange1();\">{{$syussou[2]->SENSYU_NAME}}@if($syussou[2]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}
				strLoopCount = strLoopCount + 1;
				if(strLoopCount == strSelect)
				{
					strReturn = strReturn + "<li class=\"b3 on\" onclick=\"funcselect1('3');imageChange1();\">{{$syussou[3]->SENSYU_NAME}}@if($syussou[3]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}else{
					strReturn = strReturn + "<li class=\"b3\" onclick=\"funcselect1('3');imageChange1();\">{{$syussou[3]->SENSYU_NAME}}@if($syussou[3]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}
				strLoopCount = strLoopCount + 1;
				if(strLoopCount == strSelect)
				{
					strReturn = strReturn + "<li class=\"b4 on\" onclick=\"funcselect1('4');imageChange1();\">{{$syussou[4]->SENSYU_NAME}}@if($syussou[4]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}else{
					strReturn = strReturn + "<li class=\"b4\" onclick=\"funcselect1('4');imageChange1();\">{{$syussou[4]->SENSYU_NAME}}@if($syussou[4]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}
				strLoopCount = strLoopCount + 1;
				if(strLoopCount == strSelect)
				{
					strReturn = strReturn + "<li class=\"b5 on\" onclick=\"funcselect1('5');imageChange1();\">{{$syussou[5]->SENSYU_NAME}}@if($syussou[5]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}else{
					strReturn = strReturn + "<li class=\"b5\" onclick=\"funcselect1('5');imageChange1();\">{{$syussou[5]->SENSYU_NAME}}@if($syussou[5]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}
				strLoopCount = strLoopCount + 1;
				if(strLoopCount == strSelect)
				{
					strReturn = strReturn + "<li class=\"b6 on\" onclick=\"funcselect1('6');imageChange1();\">{{$syussou[6]->SENSYU_NAME}}@if($syussou[6]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}else{
					strReturn = strReturn + "<li class=\"b6\" onclick=\"funcselect1('6');imageChange1();\">{{$syussou[6]->SENSYU_NAME}}@if($syussou[6]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}
				strLoopCount = strLoopCount + 1;
				if(0 == strSelect)
				{
					strReturn = strReturn + "<li class=\"b7 on\" onclick=\"funcselect1('0');imageChange1()\">全通り</li>";
				}else
				{
					strReturn = strReturn + "<li class=\"b7\" onclick=\"funcselect1('0');imageChange1()\">全通り</li>";
				}
				document.getElementById("imageChange1").innerHTML = strReturn;
			}
		}
		function funcselect2(sel2)
		{
			if(document.ozzNagashiform.select2.value != sel2)
			{
				document.ozzNagashiform.select2.value = sel2;
			}
		}
		function imageChange2()
		{
			var strReturn;
			var strSelect;
			var strLoopCount;
			strReturn = "";
			strSelect = document.ozzNagashiform.select2.value;
			strLoopCount = 1;
			if(document.getElementById)
			{
				if(strLoopCount == strSelect)
				{
					strReturn = strReturn + "<li class=\"b1 on\" onclick=\"funcselect2('1');imageChange2();\">{{$syussou[1]->SENSYU_NAME}}@if($syussou[1]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}else{
					strReturn = strReturn + "<li class=\"b1\" onclick=\"funcselect2('1');imageChange2();\">{{$syussou[1]->SENSYU_NAME}}@if($syussou[1]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}
				strLoopCount = strLoopCount + 1;
				if(strLoopCount == strSelect)
				{
					strReturn = strReturn + "<li class=\"b2 on\" onclick=\"funcselect2('2');imageChange2();\">{{$syussou[2]->SENSYU_NAME}}@if($syussou[2]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}else{
					strReturn = strReturn + "<li class=\"b2\" onclick=\"funcselect2('2');imageChange2();\">{{$syussou[2]->SENSYU_NAME}}@if($syussou[2]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}
				strLoopCount = strLoopCount + 1;
				if(strLoopCount == strSelect)
				{
					strReturn = strReturn + "<li class=\"b3 on\" onclick=\"funcselect2('3');imageChange2();\">{{$syussou[3]->SENSYU_NAME}}@if($syussou[3]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}else{
					strReturn = strReturn + "<li class=\"b3\" onclick=\"funcselect2('3');imageChange2();\">{{$syussou[3]->SENSYU_NAME}}@if($syussou[3]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}
				strLoopCount = strLoopCount + 1;
				if(strLoopCount == strSelect)
				{
					strReturn = strReturn + "<li class=\"b4 on\" onclick=\"funcselect2('4');imageChange2();\">{{$syussou[4]->SENSYU_NAME}}@if($syussou[4]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}else{
					strReturn = strReturn + "<li class=\"b4\" onclick=\"funcselect2('4');imageChange2();\">{{$syussou[4]->SENSYU_NAME}}@if($syussou[4]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}
				strLoopCount = strLoopCount + 1;
				if(strLoopCount == strSelect)
				{
					strReturn = strReturn + "<li class=\"b5 on\" onclick=\"funcselect2('5');imageChange2();\">{{$syussou[5]->SENSYU_NAME}}@if($syussou[5]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}else{
					strReturn = strReturn + "<li class=\"b5\" onclick=\"funcselect2('5');imageChange2();\">{{$syussou[5]->SENSYU_NAME}}@if($syussou[5]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}
				strLoopCount = strLoopCount + 1;
				if(strLoopCount == strSelect)
				{
					strReturn = strReturn + "<li class=\"b6 on\" onclick=\"funcselect2('6');imageChange2();\">{{$syussou[6]->SENSYU_NAME}}@if($syussou[6]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}else{
					strReturn = strReturn + "<li class=\"b6\" onclick=\"funcselect2('6');imageChange2();\">{{$syussou[6]->SENSYU_NAME}}@if($syussou[6]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}
				strLoopCount = strLoopCount + 1;
				if(0 == strSelect)
				{
					strReturn = strReturn + "<li class=\"b7 on\" onclick=\"funcselect2('0');imageChange2()\">全通り</li>";
				}else
				{
					strReturn = strReturn + "<li class=\"b7\" onclick=\"funcselect2('0');imageChange2()\">全通り</li>";
				}
				document.getElementById("imageChange2").innerHTML = strReturn;
			}
		}
		function funcselect3(sel3)
		{
			if(document.ozzNagashiform.select3.value != sel3)
			{
				document.ozzNagashiform.select3.value = sel3;
			}
		}
		function imageChange3()
		{
			var strReturn;
			var strSelect;
			var strLoopCount;
			strReturn = "";
			strSelect = document.ozzNagashiform.select3.value;
			strLoopCount = 1;
			if(document.getElementById)
			{
				if(strLoopCount == strSelect)
				{
					strReturn = strReturn + "<li class=\"b1 on\" onclick=\"funcselect3('1');imageChange3();\">{{$syussou[1]->SENSYU_NAME}}@if($syussou[1]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}else{
					strReturn = strReturn + "<li class=\"b1\" onclick=\"funcselect3('1');imageChange3();\">{{$syussou[1]->SENSYU_NAME}}@if($syussou[1]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}
				strLoopCount = strLoopCount + 1;
				if(strLoopCount == strSelect)
				{
					strReturn = strReturn + "<li class=\"b2 on\" onclick=\"funcselect3('2');imageChange3();\">{{$syussou[2]->SENSYU_NAME}}@if($syussou[2]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}else{
					strReturn = strReturn + "<li class=\"b2\" onclick=\"funcselect3('2');imageChange3();\">{{$syussou[2]->SENSYU_NAME}}@if($syussou[2]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}
				strLoopCount = strLoopCount + 1;
				if(strLoopCount == strSelect)
				{
					strReturn = strReturn + "<li class=\"b3 on\" onclick=\"funcselect3('3');imageChange3();\">{{$syussou[3]->SENSYU_NAME}}@if($syussou[3]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}else{
					strReturn = strReturn + "<li class=\"b3\" onclick=\"funcselect3('3');imageChange3();\">{{$syussou[3]->SENSYU_NAME}}@if($syussou[3]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}
				strLoopCount = strLoopCount + 1;
				if(strLoopCount == strSelect)
				{
					strReturn = strReturn + "<li class=\"b4 on\" onclick=\"funcselect3('4');imageChange3();\">{{$syussou[4]->SENSYU_NAME}}@if($syussou[4]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}else{
					strReturn = strReturn + "<li class=\"b4\" onclick=\"funcselect3('4');imageChange3();\">{{$syussou[4]->SENSYU_NAME}}@if($syussou[4]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}
				strLoopCount = strLoopCount + 1;
				if(strLoopCount == strSelect)
				{
					strReturn = strReturn + "<li class=\"b5 on\" onclick=\"funcselect3('5');imageChange3();\">{{$syussou[5]->SENSYU_NAME}}@if($syussou[5]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}else{
					strReturn = strReturn + "<li class=\"b5\" onclick=\"funcselect3('5');imageChange3();\">{{$syussou[5]->SENSYU_NAME}}@if($syussou[5]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}
				strLoopCount = strLoopCount + 1;
				if(strLoopCount == strSelect)
				{
					strReturn = strReturn + "<li class=\"b6 on\" onclick=\"funcselect3('6');imageChange3();\">{{$syussou[6]->SENSYU_NAME}}@if($syussou[6]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}else{
					strReturn = strReturn + "<li class=\"b6\" onclick=\"funcselect3('6');imageChange3();\">{{$syussou[6]->SENSYU_NAME}}@if($syussou[6]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>";
				}
				strLoopCount = strLoopCount + 1;
				if(0 == strSelect)
				{
					strReturn = strReturn + "<li class=\"b7 on\" onclick=\"funcselect3('0');imageChange3()\">全通り</li>";
				}else
				{
					strReturn = strReturn + "<li class=\"b7\" onclick=\"funcselect3('0');imageChange3()\">全通り</li>";
				}
				document.getElementById("imageChange3").innerHTML = strReturn;
			}
		}
			var strNagashiJSHTML = "";
			var int1TyakuSameCount;	//1着が同じときの数 rowspanに利用
			var int2TyakuSameCount;	//2着が同じときの数 rowspanに利用
			var int3TyakuSameCount;	//3着が同じときの数 rowspanに利用
			var strBefore1Tyaku;	//1回前の1着枠番
			var strBefore2Tyaku;	//1回前の2着枠番
			var strBefore3Tyaku;	//1回前の3着枠番
			var intBackCount;		//resultカウント
			//流し検索ボタンをクリックしたとき
			function funcNagashisearch( argData , argData2 , argData3 )
			{
				
				var strSelect1 = argData;
				var strSelect2 = argData2;
				var strSelect3 = argData3;
				var strResult = "";
				var Judge = true;
				
				if(strSelect1 == 7 && strSelect2 == 7 && strSelect3 == 7){//7は未選択
					Judge = false;
					strResult = strResult + "流し検索の1着・2着・3着を選択して下さい\n"
				}else if(strSelect1 == 7){//7は未選択
					Judge = false;
					strResult = strResult + "流し検索の1着を選択して下さい\n"
				}else if(strSelect2 == 7){//7は未選択
					Judge = false;
					strResult = strResult + "流し検索の2着を選択して下さい\n"
				}else if(strSelect3 == 7){//7は未選択
					Judge = false;
					strResult = strResult + "流し検索の3着を選択して下さい\n"
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

					//初期化
					funcNagashiReset();
					int1TyakuSameCount = 0;
					int2TyakuSameCount = 0;
					int3TyakuSameCount = 0;
					strBefore1Tyaku = "";
					strBefore2Tyaku = "";
					strBefore3Tyaku = "";
					strNagashiJSHTML = "";

					if(document.getElementById)
					{
						//全通りが2個あった時
						if( ( ( strSelect1 == "0" ) + ( strSelect2 == "0" ) + ( strSelect3 == "0" ) ) == 2){
							strNagashiJSHTML = strNagashiJSHTML + "<table class='ta_result2'>\n";
						}else{
							strNagashiJSHTML = strNagashiJSHTML + "<table class='ta_result'>\n";
						}

						for(intLoopCount = 0; intLoopCount < 120; intLoopCount++)
						{//引数の艇番と一致したら書き出し

							if(strSelect1 == "0")
							{//全通り
								if(strSelect2 == "0")
								{//全通り
									if(strSelect3 == "0")
									{//全通り

										//オッズ構成テーブルのヘッダ作成
										strNagashiJSHTML = funcMakeOzzHeader(strNagashiJSHTML, varOzzRen[intLoopCount].split("-")[0], strBefore1Tyaku, int1TyakuSameCount, varOzzRen[intLoopCount].split("-")[1], strBefore2Tyaku, int2TyakuSameCount, varOzzRen[intLoopCount].split("-")[2], strBefore3Tyaku, int3TyakuSameCount);


										if( int1TyakuSameCount % 4 == 3){
											strNagashiJSHTML = strNagashiJSHTML + "<td class='rate bottom'>" + varOzzData[intLoopCount] + "</td>\n";
										}else{
											strNagashiJSHTML = strNagashiJSHTML + "<td class='rate'>" + varOzzData[intLoopCount] + "</td>\n";
										}

										strNagashiJSHTML = strNagashiJSHTML + "</tr>\n";
										int1TyakuSameCount = int1TyakuSameCount + 1;
										int2TyakuSameCount = int2TyakuSameCount + 1;
										int3TyakuSameCount = int3TyakuSameCount + 1;

										//1回前を更新
										strBefore1Tyaku = varOzzRen[intLoopCount].split("-")[0];
										strBefore2Tyaku = varOzzRen[intLoopCount].split("-")[1];
										strBefore3Tyaku = varOzzRen[intLoopCount].split("-")[2];
									}
									else if(varOzzRen[intLoopCount].split("-")[2] == strSelect3)
									{//枠指定
										//オッズ構成テーブルのヘッダ作成
										strNagashiJSHTML = funcMakeOzzHeader(strNagashiJSHTML, varOzzRen[intLoopCount].split("-")[0], strBefore1Tyaku, int1TyakuSameCount, varOzzRen[intLoopCount].split("-")[1], strBefore2Tyaku, int2TyakuSameCount, varOzzRen[intLoopCount].split("-")[2], strBefore3Tyaku, int3TyakuSameCount);

										if((intBackCount >= 5 && intBackCount <= 8) || (intBackCount >= 13 && intBackCount <= 16))
										{
											if( int1TyakuSameCount % 4 == 3){
												strNagashiJSHTML = strNagashiJSHTML + "<td class='rate bottom'>" + varOzzData[intLoopCount] + "</td>\n";
											}else{
												strNagashiJSHTML = strNagashiJSHTML + "<td class='rate'>" + varOzzData[intLoopCount] + "</td>\n";
											}
										}
										else
										{
											if( int1TyakuSameCount % 4 == 3){
												strNagashiJSHTML = strNagashiJSHTML + "<td class='rate bottom'>" + varOzzData[intLoopCount] + "</td>\n";
											}else{
												strNagashiJSHTML = strNagashiJSHTML + "<td class='rate'>" + varOzzData[intLoopCount] + "</td>\n";
											}
										}
										intBackCount = intBackCount + 1;

										strNagashiJSHTML = strNagashiJSHTML + "              </tr>\n";
										int1TyakuSameCount = int1TyakuSameCount + 1;
										int2TyakuSameCount = int2TyakuSameCount + 1;
										int3TyakuSameCount = int3TyakuSameCount + 1;

										//1回前を更新
										strBefore1Tyaku = varOzzRen[intLoopCount].split("-")[0];
										strBefore2Tyaku = varOzzRen[intLoopCount].split("-")[1];
										strBefore3Tyaku = varOzzRen[intLoopCount].split("-")[2];
									}
									else
									{//表示なし
									}

								}
								else if(varOzzRen[intLoopCount].split("-")[1] == strSelect2)
								{//枠指定

									if(strSelect3 == "0")
									{//全通り
										//オッズ構成テーブルのヘッダ作成
										strNagashiJSHTML = funcMakeOzzHeader(strNagashiJSHTML, varOzzRen[intLoopCount].split("-")[0], strBefore1Tyaku, int1TyakuSameCount, varOzzRen[intLoopCount].split("-")[1], strBefore2Tyaku, int2TyakuSameCount, varOzzRen[intLoopCount].split("-")[2], strBefore3Tyaku, int3TyakuSameCount);

										if((intBackCount >= 5 && intBackCount <= 8) || (intBackCount >= 13 && intBackCount <= 16))
										{
											if( int1TyakuSameCount % 4 == 3){
												strNagashiJSHTML = strNagashiJSHTML + "<td class='rate bottom'>" + varOzzData[intLoopCount] + "</td>\n";
											}else{
												strNagashiJSHTML = strNagashiJSHTML + "<td class='rate'>" + varOzzData[intLoopCount] + "</td>\n";
											}
										}
										else
										{
											if( int1TyakuSameCount % 4 == 3){
												strNagashiJSHTML = strNagashiJSHTML + "<td class='rate bottom'>" + varOzzData[intLoopCount] + "</td>\n";
											}else{
												strNagashiJSHTML = strNagashiJSHTML + "<td class='rate'>" + varOzzData[intLoopCount] + "</td>\n";
											}
										}
										intBackCount = intBackCount + 1;
										strNagashiJSHTML = strNagashiJSHTML + "              </tr>\n";
										int1TyakuSameCount = int1TyakuSameCount + 1;
										int2TyakuSameCount = int2TyakuSameCount + 1;
										int3TyakuSameCount = int3TyakuSameCount + 1;

										//1回前を更新
										strBefore1Tyaku = varOzzRen[intLoopCount].split("-")[0];
										strBefore2Tyaku = varOzzRen[intLoopCount].split("-")[1];
										strBefore3Tyaku = varOzzRen[intLoopCount].split("-")[2];
									}
									else if(varOzzRen[intLoopCount].split("-")[2] == strSelect3)
									{//枠指定
										//オッズ構成テーブルのヘッダ作成
										strNagashiJSHTML = funcMakeOzzHeader(strNagashiJSHTML, varOzzRen[intLoopCount].split("-")[0], strBefore1Tyaku, int1TyakuSameCount, varOzzRen[intLoopCount].split("-")[1], strBefore2Tyaku, int2TyakuSameCount, varOzzRen[intLoopCount].split("-")[2], strBefore3Tyaku, int3TyakuSameCount);

										if( int1TyakuSameCount % 4 == 3){
											strNagashiJSHTML = strNagashiJSHTML + "<td class='rate bottom'>" + varOzzData[intLoopCount] + "</td>\n";
										}else{
											strNagashiJSHTML = strNagashiJSHTML + "<td class='rate'>" + varOzzData[intLoopCount] + "</td>\n";
										}
										strNagashiJSHTML = strNagashiJSHTML + "              </tr>\n";
										int1TyakuSameCount = int1TyakuSameCount + 1;
										int2TyakuSameCount = int2TyakuSameCount + 1;
										int3TyakuSameCount = int3TyakuSameCount + 1;

										//1回前を更新
										strBefore1Tyaku = varOzzRen[intLoopCount].split("-")[0];
										strBefore2Tyaku = varOzzRen[intLoopCount].split("-")[1];
										strBefore3Tyaku = varOzzRen[intLoopCount].split("-")[2];
									}
									else
									{//表示なし
									}
								}
								else
								{//表示なし
								}
							}
							else if(varOzzRen[intLoopCount].split("-")[0] == strSelect1)
							{//枠指定
								if(strSelect2 == "0")
								{//全通り
									if(strSelect3 == "0")
									{//全通り
										//オッズ構成テーブルのヘッダ作成
										strNagashiJSHTML = funcMakeOzzHeader(strNagashiJSHTML, varOzzRen[intLoopCount].split("-")[0], strBefore1Tyaku, int1TyakuSameCount, varOzzRen[intLoopCount].split("-")[1], strBefore2Tyaku, int2TyakuSameCount, varOzzRen[intLoopCount].split("-")[2], strBefore3Tyaku, int3TyakuSameCount);

										if((intBackCount >= 5 && intBackCount <= 8) || (intBackCount >= 13 && intBackCount <= 16))
										{
											if( int1TyakuSameCount % 4 == 3){
												strNagashiJSHTML = strNagashiJSHTML + "<td class='rate bottom'>" + varOzzData[intLoopCount] + "</td>\n";
											}else{
												strNagashiJSHTML = strNagashiJSHTML + "<td class='rate'>" + varOzzData[intLoopCount] + "</td>\n";
											}
										}
										else
										{
											if( int1TyakuSameCount % 4 == 3){
												strNagashiJSHTML = strNagashiJSHTML + "<td class='rate bottom'>" + varOzzData[intLoopCount] + "</td>\n";
											}else{
												strNagashiJSHTML = strNagashiJSHTML + "<td class='rate'>" + varOzzData[intLoopCount] + "</td>\n";
											}
										}
										intBackCount = intBackCount + 1;
										strNagashiJSHTML = strNagashiJSHTML + "              </tr>\n";
										int1TyakuSameCount = int1TyakuSameCount + 1;
										int2TyakuSameCount = int2TyakuSameCount + 1;
										int3TyakuSameCount = int3TyakuSameCount + 1;

										//1回前を更新
										strBefore1Tyaku = varOzzRen[intLoopCount].split("-")[0];
										strBefore2Tyaku = varOzzRen[intLoopCount].split("-")[1];
										strBefore3Tyaku = varOzzRen[intLoopCount].split("-")[2];
									}
									else if(varOzzRen[intLoopCount].split("-")[2] == strSelect3)
									{//枠指定
										//オッズ構成テーブルのヘッダ作成
										strNagashiJSHTML = funcMakeOzzHeader(strNagashiJSHTML, varOzzRen[intLoopCount].split("-")[0], strBefore1Tyaku, int1TyakuSameCount, varOzzRen[intLoopCount].split("-")[1], strBefore2Tyaku, int2TyakuSameCount, varOzzRen[intLoopCount].split("-")[2], strBefore3Tyaku, int3TyakuSameCount);

										if( int1TyakuSameCount % 4 == 3){
											strNagashiJSHTML = strNagashiJSHTML + "<td class='rate bottom'>" + varOzzData[intLoopCount] + "</td>\n";
										}else{
											strNagashiJSHTML = strNagashiJSHTML + "<td class='rate'>" + varOzzData[intLoopCount] + "</td>\n";
										}
										strNagashiJSHTML = strNagashiJSHTML + "              </tr>\n";
										int1TyakuSameCount = int1TyakuSameCount + 1;
										int2TyakuSameCount = int2TyakuSameCount + 1;
										int3TyakuSameCount = int3TyakuSameCount + 1;

										//1回前を更新
										strBefore1Tyaku = varOzzRen[intLoopCount].split("-")[0];
										strBefore2Tyaku = varOzzRen[intLoopCount].split("-")[1];
										strBefore3Tyaku = varOzzRen[intLoopCount].split("-")[2];
									}
									else
									{//表示なし
									}
								}
								else if(varOzzRen[intLoopCount].split("-")[1] == strSelect2)
								{//枠指定
									if(strSelect3 == "0")
									{//全通り
										//オッズ構成テーブルのヘッダ作成
										strNagashiJSHTML = funcMakeOzzHeader(strNagashiJSHTML, varOzzRen[intLoopCount].split("-")[0], strBefore1Tyaku, int1TyakuSameCount, varOzzRen[intLoopCount].split("-")[1], strBefore2Tyaku, int2TyakuSameCount, varOzzRen[intLoopCount].split("-")[2], strBefore3Tyaku, int3TyakuSameCount);

										if( int1TyakuSameCount % 4 == 3){
											strNagashiJSHTML = strNagashiJSHTML + "<td class='rate bottom'>" + varOzzData[intLoopCount] + "</td>\n";
										}else{
											strNagashiJSHTML = strNagashiJSHTML + "<td class='rate'>" + varOzzData[intLoopCount] + "</td>\n";
										}
										strNagashiJSHTML = strNagashiJSHTML + "              </tr>\n";
										int1TyakuSameCount = int1TyakuSameCount + 1;
										int2TyakuSameCount = int2TyakuSameCount + 1;
										int3TyakuSameCount = int3TyakuSameCount + 1;

										//1回前を更新
										strBefore1Tyaku = varOzzRen[intLoopCount].split("-")[0];
										strBefore2Tyaku = varOzzRen[intLoopCount].split("-")[1];
										strBefore3Tyaku = varOzzRen[intLoopCount].split("-")[2];
									}
									else if(varOzzRen[intLoopCount].split("-")[2] == strSelect3)
									{//枠指定
										//オッズ構成テーブルのヘッダ作成
										strNagashiJSHTML = funcMakeOzzHeader(strNagashiJSHTML, varOzzRen[intLoopCount].split("-")[0], strBefore1Tyaku, int1TyakuSameCount, varOzzRen[intLoopCount].split("-")[1], strBefore2Tyaku, int2TyakuSameCount, varOzzRen[intLoopCount].split("-")[2], strBefore3Tyaku, int3TyakuSameCount);

										if( int1TyakuSameCount % 4 == 3){
											strNagashiJSHTML = strNagashiJSHTML + "<td class='rate bottom'>" + varOzzData[intLoopCount] + "</td>\n";
										}else{
											strNagashiJSHTML = strNagashiJSHTML + "<td class='rate'>" + varOzzData[intLoopCount] + "</td>\n";
										}
										strNagashiJSHTML = strNagashiJSHTML + "              </tr>\n";
										int1TyakuSameCount = int1TyakuSameCount + 1;
										int2TyakuSameCount = int2TyakuSameCount + 1;
										int3TyakuSameCount = int3TyakuSameCount + 1;

										//1回前を更新
										strBefore1Tyaku = varOzzRen[intLoopCount].split("-")[0];
										strBefore2Tyaku = varOzzRen[intLoopCount].split("-")[1];
										strBefore3Tyaku = varOzzRen[intLoopCount].split("-")[2];
									}
									else
									{//表示なし
									}
								}
								else
								{//表示なし
								}
							}
							else
							{//表示なし
							}




						}//オッズforループ


						//1着rowspanリプレイス
						strNagashiJSHTML = strNagashiJSHTML.replace(/TRW1TYAKUROWSPAMTRW/, int1TyakuSameCount)
						int1TyakuSameCount = 0;
						//2着rowspanリプレイス
						strNagashiJSHTML = strNagashiJSHTML.replace(/TRW2TYAKUROWSPAMTRW/, int2TyakuSameCount)
						int2TyakuSameCount = 0;
						//3着rowspanリプレイス
						strNagashiJSHTML = strNagashiJSHTML.replace(/TRW3TYAKUROWSPAMTRW/, int3TyakuSameCount)
						int3TyakuSameCount = 0;
						document.getElementById("nagashikekka").innerHTML = strNagashiJSHTML;
					}
				}
				
				
				
			}
			function funcMakeOzzHeader(strMyReturn, strOzz1, strMyBefore1Tyaku, intMy1TyakuSameCount, strOzz2, strMyBefore2Tyaku, intMy2TyakuSameCount, strOzz3, strMyBefore3Tyaku, intMy3TyakuSameCount)
			{

				//オッズ構成テーブルのヘッダ作成
				if(strMyBefore1Tyaku != strOzz1)
				{//1着枠番が前回と違うとき、枠番表示
					strMyReturn = strMyReturn + "              <tr>\n";

					strMyReturn = strMyReturn.replace(/TRW1TYAKUROWSPAMTRW/, intMy1TyakuSameCount)
					int1TyakuSameCount = 0;

					strMyReturn = strMyReturn + "                <td rowspan='TRW1TYAKUROWSPAMTRW' class='w" + strOzz1 + " waku01'>" + strOzz1 + "</td>\n";

				}
				else
				{//前回と同じとき、1着枠番の表示なし
					strMyReturn = strMyReturn + "              <tr>\n";
				}

				if(strMyBefore2Tyaku != strOzz2)
				{//2着枠番が前回と違うとき、枠番表示
					strMyReturn = strMyReturn.replace(/TRW2TYAKUROWSPAMTRW/, intMy2TyakuSameCount)
					int2TyakuSameCount = 0;
					strMyReturn = strMyReturn + "                <td rowspan='TRW2TYAKUROWSPAMTRW' class='w" + strOzz2 + " waku01'>" + strOzz2 + "</td>\n";
				}
				else
				{//前回と同じとき、2着枠番の表示なし
				}

				if(strMyBefore3Tyaku != strOzz3)
				{//3着枠番が前回と違うとき、枠番表示
						strMyReturn = strMyReturn.replace(/TRW3TYAKUROWSPAMTRW/, intMy3TyakuSameCount)
						if( intMy1TyakuSameCount % 4 == 3){
							strMyReturn = strMyReturn + "                <td rowspan='TRW3TYAKUROWSPAMTRW' class='right bottom w" + strOzz3 + " waku02'>" + strOzz3 + "</td>\n";
						}else{
							strMyReturn = strMyReturn + "                <td rowspan='TRW3TYAKUROWSPAMTRW' class='right w" + strOzz3 + " waku02'>" + strOzz3 + "</td>\n";
						}
						int3TyakuSameCount = 0;
				}
				else
				{//前回と同じとき、3着枠番の表示なし
				}

				return strMyReturn;
			}
			//流し初期化
			function funcNagashiReset()
			{
				var strJSHTML = "";
				if(document.getElementById)
				{
					strJSHTML = "<div class=\"blank\">左のボタンを<br>選択してください</div>";
					document.getElementById("nagashikekka").innerHTML = strJSHTML;
				}
			}
			var strJSHTML;	//置換するHTMLデータを構築
			var int1Waku=0;	//1=チェック済み
			var int2Waku=0;	//2=チェック済み
			var int3Waku=0;	//3=チェック済み
			var int4Waku=0;	//4=チェック済み
			var int5Waku=0;	//5=チェック済み
			var int6Waku=0;	//6=チェック済み
			var intWakuTotal=0;	//何艇選択されているかの合計格納
			var intLoopCount0=0;//ループ用変数0
			var intLoopCount1=0;//ループ用変数1
			var intLoopCount2=0;//ループ用変数2
			var intLoopCount3=0;//ループ用変数3
			var intSelect = new Array(0,0,0,0,0,0);//組み合わせ格納変数
			var intDataCount;	//テーブル作成データカウント
			var intDataFlag;	//1つ目のデータが入ってきたか
			var intTableFlag;	//1つ目のテーブルかどうか
			//艇ボタンをクリックしたとき
			function ozzCheckSensyu(intTeibangou)
			{
				switch(intTeibangou)
				{
					//各艇がクリックされた場合~データを挿入
					case 1:
						if(int1Waku==0) int1Waku = 1
						else int1Waku = 0
					break;
					case 2:
						if(int2Waku==0) int2Waku = 2
						else int2Waku = 0
					break;
					case 3:
						if(int3Waku==0) int3Waku = 3
						else int3Waku = 0
					break;
					case 4:
						if(int4Waku==0) int4Waku = 4
						else int4Waku = 0
					break;
					case 5:
						if(int5Waku==0) int5Waku = 5
						else int5Waku = 0
					break;
					case 6:
						if(int6Waku==0) int6Waku = 6
						else int6Waku = 0
					break;
				}
				//選択されている艇の数を数える
				intWakuTotal=0;
				if(int1Waku!=0) intWakuTotal++;
				if(int2Waku!=0) intWakuTotal++;
				if(int3Waku!=0) intWakuTotal++;
				if(int4Waku!=0) intWakuTotal++;
				if(int5Waku!=0) intWakuTotal++;
				if(int6Waku!=0) intWakuTotal++;
				//配列に格納
				intSelect[0] = int1Waku;
				intSelect[1] = int2Waku;
				intSelect[2] = int3Waku;
				intSelect[3] = int4Waku;
				intSelect[4] = int5Waku;
				intSelect[5] = int6Waku;
				if(document.getElementById)
				{
					//div id= SelectSensyu のデータを削除
					document.getElementById("SelectSensyu").innerHTML = ""
					//strHTML初期化
					strJSHTML = '';
					//strHTML初期化
					strJSHTML = strJSHTML +'<ul>';
						if(intSelect[0]>0){
							strJSHTML = strJSHTML +'<li class=\"b1 on\" onclick=\"ozzCheckSensyu(1);\">{{$syussou[1]->SENSYU_NAME}}@if($syussou[1]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>';
						}else{
							strJSHTML = strJSHTML +'<li class=\"b1\" onclick=\"ozzCheckSensyu(1);\">{{$syussou[1]->SENSYU_NAME}}@if($syussou[1]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>';
						}
						if(intSelect[1]>0){
							strJSHTML = strJSHTML +'<li class=\"b2 on\" onclick=\"ozzCheckSensyu(2);\">{{$syussou[2]->SENSYU_NAME}}@if($syussou[2]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>';
						}else{
							strJSHTML = strJSHTML +'<li class=\"b2\" onclick=\"ozzCheckSensyu(2);\">{{$syussou[2]->SENSYU_NAME}}@if($syussou[2]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>';
						}
						if(intSelect[2]>0){
							strJSHTML = strJSHTML +'<li class=\"b3 on\" onclick=\"ozzCheckSensyu(3);\">{{$syussou[3]->SENSYU_NAME}}@if($syussou[3]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>';
						}else{
							strJSHTML = strJSHTML +'<li class=\"b3\" onclick=\"ozzCheckSensyu(3);\">{{$syussou[3]->SENSYU_NAME}}@if($syussou[3]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>';
						}
						if(intSelect[3]>0){
							strJSHTML = strJSHTML +'<li class=\"b4 on\" onclick=\"ozzCheckSensyu(4);\">{{$syussou[4]->SENSYU_NAME}}@if($syussou[4]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>';
						}else{
							strJSHTML = strJSHTML +'<li class=\"b4\" onclick=\"ozzCheckSensyu(4);\">{{$syussou[4]->SENSYU_NAME}}@if($syussou[4]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>';
						}
						if(intSelect[4]>0){
							strJSHTML = strJSHTML +'<li class=\"b5 on\" onclick=\"ozzCheckSensyu(5);\">{{$syussou[5]->SENSYU_NAME}}@if($syussou[5]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>';
						}else{
							strJSHTML = strJSHTML +'<li class=\"b5\" onclick=\"ozzCheckSensyu(5);\">{{$syussou[5]->SENSYU_NAME}}@if($syussou[5]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>';
						}
						if(intSelect[5]>0){
							strJSHTML = strJSHTML +'<li class=\"b6 on\" onclick=\"ozzCheckSensyu(6);\">{{$syussou[6]->SENSYU_NAME}}@if($syussou[6]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>';
						}else{
							strJSHTML = strJSHTML +'<li class=\"b6\" onclick=\"ozzCheckSensyu(6);\">{{$syussou[6]->SENSYU_NAME}}@if($syussou[6]->sex == 2)<img src=\"/kaisai/images/ico_lady.png\" width=\"10\" alt=\"女子\"/>@endif</li>';
						}
					strJSHTML = strJSHTML +'</ul>';
					//div id= SelectSensyu にデータを挿入
					document.getElementById("SelectSensyu").innerHTML = strJSHTML;
				}
			}
			//流しBoxボタンをクリックしたとき
			function funcBoxsearch( )
			{
				if(document.getElementById)
				{//ElementByIdが取れるかどうかでブラウザの動作バージョンを確認
					strJSHTML = '';
					//ElementById取れた
					if(intWakuTotal==4){
						funcBoxReset();
						intDataCount=0;
						intOzzCount=0;
						intTableFlag=0;
						// 組み合わせデータ前用ループ
						for( intLoopCount1 = 1 ; intLoopCount1 <= 6 ; intLoopCount1++){
							intTableCount = 0;
							intDataFlag=0;
							if( intDataCount == 0 && intTableFlag == 0 ){
								strJSHTML = strJSHTML +'<div id="left">';
								intTableFlag=1;
							}else if( intDataCount == 2 ){
								strJSHTML = strJSHTML +'<div id="right">';
							}
							// 組み合わせデータ中用ループ
							for( intLoopCount2 = 1 ; intLoopCount2 <= 6 ; intLoopCount2++ ){
								// 組み合わせデータ後用ループ
								for( intLoopCount3 = 1 ; intLoopCount3 <= 6 ; intLoopCount3++){
									// 同じ組み合わせ以外
									if( intLoopCount1 != intLoopCount2 && intLoopCount1 != intLoopCount3 && intLoopCount2 != intLoopCount3 ){
										// 選択されている選手の時のみ
										if( intSelect[intLoopCount1 - 1 ] > 0 && intSelect[intLoopCount2 - 1 ] > 0 && intSelect[intLoopCount3 - 1] > 0 ){ 
											// テーブルの１行目
											if (intTableCount == 0 ){
												strJSHTML = strJSHTML +'<table class=\"ta_result\">';
												strJSHTML = strJSHTML +'<tr>';
												strJSHTML = strJSHTML +'<td rowspan="6" class="w'+ intLoopCount1 +' waku01">'+ intLoopCount1 +'</td>';
												strJSHTML = strJSHTML +'<td rowspan="2" class="w'+ intLoopCount2 +' waku01">'+ intLoopCount2 +'</td>';
												strJSHTML = strJSHTML +'<td class="right w'+ intLoopCount3 +'">'+ intLoopCount3 +'</td>';
											// テーブル行数/2=0の時
											}else if(( intTableCount % 2 ) == 0 ){
												strJSHTML = strJSHTML +'<tr>';
												strJSHTML = strJSHTML +'<td rowspan="2" class="w'+ intLoopCount2 +'">'+ intLoopCount2 +'</td>';
												if( intTableCount == 5 ){
													strJSHTML = strJSHTML +'<td class="right bottom w'+ intLoopCount3 +'">'+ intLoopCount3 +'</td>';
												}else{
													strJSHTML = strJSHTML +'<td class="right w'+ intLoopCount3 +'">'+ intLoopCount3 +'</td>';
												}
											}else{
												strJSHTML = strJSHTML +'<tr>';
												if( intTableCount == 5 ){
													strJSHTML = strJSHTML +'<td class="right bottom w'+ intLoopCount3 +'">'+ intLoopCount3 +'</td>';
												}else{
													strJSHTML = strJSHTML +'<td class="right w'+ intLoopCount3 +'">'+ intLoopCount3 +'</td>';
												}
											}
											if( intTableCount == 2 || intTableCount == 3 ){
												strJSHTML = strJSHTML +'<td class="rate">'+varOzzData[intOzzCount]+'</td>';
											}else{
												if( intTableCount == 5 ){
													strJSHTML = strJSHTML + '<td class="rate bottom">'+varOzzData[intOzzCount]+'</td>';
												}else{
													strJSHTML = strJSHTML + '<td class="rate">'+varOzzData[intOzzCount]+'</td>';
												}
											}
											strJSHTML = strJSHTML +'</tr>';
											intTableCount ++;
											intDataFlag = 1;
										}
									intOzzCount += 1
									}
								}
							}
							if (intDataFlag > 0 ){
								strJSHTML = strJSHTML +'</table>';
								intDataCount++;
								if( (intDataCount % 2)==0 ){
									strJSHTML = strJSHTML +'</div>';
								}
							}
						}
						document.getElementById("boxkekka").innerHTML = strJSHTML;
					}else if(intWakuTotal==3){
						funcBoxReset();
						intOzzCount=0;
						strJSHTML = strJSHTML +'<table class=\"ta_result\">';
						for( intLoopCount1 = 1 ; intLoopCount1 <= 6 ; intLoopCount1++){
							intTableCount = 0;
							for( intLoopCount2 = 1 ; intLoopCount2 <= 6 ; intLoopCount2++ ){
								for( intLoopCount3 = 1 ; intLoopCount3 <= 6 ; intLoopCount3++){
									if( intLoopCount1 != intLoopCount2 && intLoopCount1 != intLoopCount3 && intLoopCount2 != intLoopCount3 ){
										if( intSelect[intLoopCount1 - 1 ] > 0 && intSelect[intLoopCount2 - 1 ] > 0 && intSelect[intLoopCount3 - 1] > 0) { 
											if(( intTableCount % 2)==0){
												strJSHTML = strJSHTML +'<tr>';
												strJSHTML = strJSHTML +'<td rowspan="2" class="w'+ intLoopCount1 +'">'+ intLoopCount1 +'</td>';
												strJSHTML = strJSHTML +'<td class="right w'+ intLoopCount2 +'">'+ intLoopCount2 +'</td>';
												if( intTableCount == 5 ){
													strJSHTML = strJSHTML +'<td class=" bottomw'+ intLoopCount3 +'">'+ intLoopCount3 +'</td>';
													strJSHTML = strJSHTML + '<td class="rate bottom">'+varOzzData[intOzzCount]+'</td>';
												}else{
													strJSHTML = strJSHTML +'<td class="w'+ intLoopCount3 +'">'+ intLoopCount3 +'</td>';
													strJSHTML = strJSHTML + '<td class="rate">'+varOzzData[intOzzCount]+'</td>';
												}
											}else{
												strJSHTML = strJSHTML +'<tr>';
												strJSHTML = strJSHTML +'<td class="w'+ intLoopCount2 +'">'+ intLoopCount2 +'</td>';
												if( intTableCount == 5 ){
													strJSHTML = strJSHTML +'<td class=" bottomw'+ intLoopCount3 +'">'+ intLoopCount3 +'</td>';
													strJSHTML = strJSHTML + '<td class="rate bottom">'+varOzzData[intOzzCount]+'</td>';
												}else{
													strJSHTML = strJSHTML +'<td class="w'+ intLoopCount3 +'">'+ intLoopCount3 +'</td>';
													strJSHTML = strJSHTML + '<td class="rate">'+varOzzData[intOzzCount]+'</td>';
												}
											}
											strJSHTML = strJSHTML +'</tr>';
											intTableCount ++;
										}
										intOzzCount += 1
									}
								}
							}
						}
						strJSHTML = strJSHTML +'</table>';
						document.getElementById("boxkekka").innerHTML = strJSHTML;
					}else{
					alert("ボックス検索は3艇または4艇を選択してください");
					}
				}

			}
			//Box初期化
			function funcBoxReset()
			{
				var strJSHTML = "";
				if(document.getElementById)
				{
					strJSHTML = "<div class=\"blank\">左のボタンを<br>選択してください</div>";
					document.getElementById("boxkekka").innerHTML = strJSHTML;
				}
			}




		</script>

		<!-----------------------------------
		▼3連単検索 -->
		<div class="cont_odds">
		<!-----------------------------------
		▼流し検索 -->
		<div id="nagashi">
		<h1><img src="/kaisai/images/odds_h03.png" alt="流し検索" width="494" height="26"></h1>

		<div class="btn">

		<ul id="cyaku1">
		<span id="imageChange1">
		<li class="b1" onclick="funcselect1('1');imageChange1();">{{$syussou[1]->SENSYU_NAME}}@if($syussou[1]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b2" onclick="funcselect1('2');imageChange1();">{{$syussou[2]->SENSYU_NAME}}@if($syussou[2]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b3" onclick="funcselect1('3');imageChange1();">{{$syussou[3]->SENSYU_NAME}}@if($syussou[3]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b4" onclick="funcselect1('4');imageChange1();">{{$syussou[4]->SENSYU_NAME}}@if($syussou[4]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b5" onclick="funcselect1('5');imageChange1();">{{$syussou[5]->SENSYU_NAME}}@if($syussou[5]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b6" onclick="funcselect1('6');imageChange1();">{{$syussou[6]->SENSYU_NAME}}@if($syussou[6]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b7" onclick="funcselect1('0');imageChange1();">全通り</li>
		</span>
		</ul>
		<ul id="cyaku2">
		<span id="imageChange2">
		<li class="b1" onclick="funcselect2('1');imageChange2();">{{$syussou[1]->SENSYU_NAME}}@if($syussou[1]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b2" onclick="funcselect2('2');imageChange2();">{{$syussou[2]->SENSYU_NAME}}@if($syussou[2]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b3" onclick="funcselect2('3');imageChange2();">{{$syussou[3]->SENSYU_NAME}}@if($syussou[3]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b4" onclick="funcselect2('4');imageChange2();">{{$syussou[4]->SENSYU_NAME}}@if($syussou[4]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b5" onclick="funcselect2('5');imageChange2();">{{$syussou[5]->SENSYU_NAME}}@if($syussou[5]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b6" onclick="funcselect2('6');imageChange2();">{{$syussou[6]->SENSYU_NAME}}@if($syussou[6]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b7" onclick="funcselect2('0');imageChange2();">全通り</li>
		</span>
		</ul>
		<ul id="cyaku3">
		<span id="imageChange3">
		<li class="b1" onclick="funcselect3('1');imageChange3();">{{$syussou[1]->SENSYU_NAME}}@if($syussou[1]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b2" onclick="funcselect3('2');imageChange3();">{{$syussou[2]->SENSYU_NAME}}@if($syussou[2]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b3" onclick="funcselect3('3');imageChange3();">{{$syussou[3]->SENSYU_NAME}}@if($syussou[3]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b4" onclick="funcselect3('4');imageChange3();">{{$syussou[4]->SENSYU_NAME}}@if($syussou[4]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b5" onclick="funcselect3('5');imageChange3();">{{$syussou[5]->SENSYU_NAME}}@if($syussou[5]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b6" onclick="funcselect3('6');imageChange3();">{{$syussou[6]->SENSYU_NAME}}@if($syussou[6]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b7" onclick="funcselect3('0');imageChange3();">全通り</li>
		</span>
		</ul>
		<form id="ozzNagashiform" name="ozzNagashiform" method="post">
		<Input type="hidden" name="select1" value="7">
		<Input type="hidden" name="select2" value="7">
		<Input type="hidden" name="select3" value="7">
		</form>

		<div class="search">
		<p>※1着、2着、3着とも全通りを<br>
		選ぶことはできません。</p>
		<a href="javascript:void(0);" onClick="funcNagashisearch(document.ozzNagashiform.select1.value,document.ozzNagashiform.select2.value,document.ozzNagashiform.select3.value);">検索</a>
		</div><!--/#search-->

		</div><!--/#btn-->


		<div class="result">
		<span id="nagashikekka">
		<div class="blank">左のボタンを<br>選択してください</div><!--/#blank-->
		</span>
		</div><!--/#result-->

		<div class="clear"></div>
		</div><!--/#nagashi-->

		<!-----------------------------------
		▼ボックス検索 -->
		<div id="box">
		<h1><img src="/kaisai/images/odds_h04.png" alt="ボックス検索" width="320" height="26"></h1>

		<div class="btn">

		<form id="ozzBoxform" name="ozzBoxform" method="post">
		<div id="SelectSensyu">
		<ul>
		<li class="b1" onclick="ozzCheckSensyu(1);">{{$syussou[1]->SENSYU_NAME}}@if($syussou[1]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b2" onclick="ozzCheckSensyu(2);">{{$syussou[2]->SENSYU_NAME}}@if($syussou[2]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b3" onclick="ozzCheckSensyu(3);">{{$syussou[3]->SENSYU_NAME}}@if($syussou[3]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b4" onclick="ozzCheckSensyu(4);">{{$syussou[4]->SENSYU_NAME}}@if($syussou[4]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b5" onclick="ozzCheckSensyu(5);">{{$syussou[5]->SENSYU_NAME}}@if($syussou[5]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		<li class="b6" onclick="ozzCheckSensyu(6);">{{$syussou[6]->SENSYU_NAME}}@if($syussou[6]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</li>
		</ul>
		</div>
		</form>

		<div class="search">
		<a href="javascript:void(0);" onClick="funcBoxsearch();">検索</a>
		</div><!--/#search-->

		</div><!--/#btn-->


		<div class="result">
		<div id="boxkekka">
		<div class="blank">左のボタンを<br>選択してください</div><!--/#blank-->
		</div>
		</div><!--/#result-->

		<div class="clear"></div>
		</div><!--/#box-->

		<div class="clear"></div>
		</div><!--/#cont_odds-->

	@endif
@else
    <div class="cont_odds2">
        <table class="ta_kyogi">
            <tr>
                <td class="nodata">ただいまデータはございません</td>
            </tr>
        </table>
    </div><!--/#cont_odds-->
@endif

</div><!--/#odds-->
<div id="main_race_r"><a href="/asp/kyogi/09/pc/odds03/odds03{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">次へ</a></div><!--/#main_race_r-->
<div class="clear"></div>
</div><!--/#main_race-->




</body>
</html>
