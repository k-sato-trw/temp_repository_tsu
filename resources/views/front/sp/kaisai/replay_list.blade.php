@inject('general', 'App\Services\GeneralService')
<!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_sp.js"></script>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta name="format-detection" content="telephone=no"/>
<meta name="viewport" content="user-scalable=no">

<title>レースリプレイ｜ボートレース津</title>

<meta name="Keywords" content="ボートレース津,ボートレース,津,動画,リプレイ,結果" />
<meta name="Description" content="ボートレース津が開催したレースのリプレイ動画、レース結果がご覧いただけます。" />


<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/sp/kyogi/css/reset.css" />
<link rel="stylesheet" href="/sp/kyogi/css/kyogi.css" />
<link rel="stylesheet" href="/sp/kyogi/css/style.css" />
<link rel="stylesheet" href="/sp/kyogi/css/custom.css" />

<script type="text/javascript" src="/sp/js/jquery-1.8.3.min.js"></script>

<!-- ビューポート設定 -->
<script type="text/javascript" src="/sp/js/monaca.viewport.js"></script>
<script type="text/javascript">
monaca.viewport({
    width : 720
});
</script>
<!-- 共通 -->
<script type="text/javascript" src="/sp/kyogi/js/common.js"></script>
<script type="text/javascript">
	var URL = location.href;
	var arg = location.search; //引数を取得
	var flag = "1";	
	//URL を ? で分割
	var aSplit1 = arg.split("?");
	if( aSplit1.length > 1 ){
		//URL を &で分割
		var aSplit2 = aSplit1[1].split("&");
		var i;
		var iMax = aSplit2.length;

		// &で分割した物を = で分割
		for( i = 0; i< iMax; i++ ){
			if( i < 1 ){
				aSplit3 = aSplit2[i].split("=");
				flag = aSplit3[1];
			}
		}
	}
	
	var strNowYD = '{{$target_date}}';
	var strStartYD = '{{ $kisai_2record[0]->開始日付 }}';
	var strEndYD = '{{ $kisai_2record[0]->終了日付 }}';
	var strViewFlag = 0;
	
	if(strNowYD >= strStartYD && strNowYD <= strEndYD)
	{
		strViewFlag = 1;
	}
	function funcFlag()
	{
		document.getElementById("id_Viewflg_non").style.display = "none";
		if(flag === "3")
		{
			document.getElementById("id_2setuikou").style.display = "none";
			if(strViewFlag == 0){
				document.getElementById("id_Viewflg").style.display = "none";
				document.getElementById("id_Viewflg_non").style.display = "";
			}
		}else{
		//なにもしない
		}
		
	}
	
	
	
	
	
</script>


<!-- アコーディオン -->
<script type="text/javascript" src="/sp/kyogi/js/jquery.accordion.js"></script>


<script type="text/javascript" src="/sp/js/data_navi.js"></script>
</head>


<body onload="funcFlag();">

<div id="wrapper"><!-- wrapper start -->


<div id="header"><!-- header start -->

<h1><a href="/sp/"><div>BOAT RACE 津 09#</div></a></h1>
<a href="javascript:history.back();" id="replay_back"><div>戻る</div></a>

</div><!-- header end -->


<div id="main"><!-- main start -->


<div id="replay_title">リプレイ(展示含む)＆結果</div>


<!--リプレイリスト-->
<div id="replay_list">

<dl class="accordion_box">

<div id="id_Viewflg_non">
<br /><center>ただいまファイルはございません</center>
</div>
<div id="id_Viewflg">

@foreach($kisai_2record as $key=> $kisai_2record_row)
    <?php
        $temp_date = $kisai_2record_row->開始日付;
        $end_date = $kisai_2record_row->終了日付;
        $kaisai_date_list = [];
        $kaisai_date_label_list = [];
        $day_count = 1;
        while($temp_date <= $end_date){
            $kaisai_date_list[] = $temp_date;
            if($temp_date == $kisai_2record_row->開始日付){
                $kaisai_date_label_list[$temp_date] = '初日';
            }elseif($temp_date == $kisai_2record_row->終了日付){
                $kaisai_date_label_list[$temp_date] = '最終日';
            }else{
                $kaisai_date_label_list[$temp_date] = $day_count.'日目';
            }
            $temp_date = date("Ymd",strtotime('+1 day',strtotime($temp_date)));
            $day_count++;
        }
    ?>

    @if($key == 0)
        <script type="text/JavaScript">
            <!--
                    if(flag === "3")
                    {
                        document.write("<dt class=\"minus\">");
                    }else{
                        document.write("<dt class=\"plus\">");
                    }
            -->
        </script>
    @else
        <div id="id_2setuikou">
            <dt class="plus">
    @endif

    <div class="date">{{$general->create_display_date_short($kisai_2record_row->開始日付,$kisai_2record_row->終了日付)}}</div>
    <table class="name"><tr><td>{{$kisai_2record_row->開催名称}}</td></tr></table>
    @if($key != 0)
        </dt>
    @endif
    <dd>
        <dl class="day">

            @foreach ( $kaisai_date_list as $kaisai_date_key => $kaisai_date)
                <dt class="plus">{{ $kaisai_date_label_list[$kaisai_date] }}　{{date('n/j',strtotime($kaisai_date))}}</dt>
                <dd>
                    <ul class="replay_num cf">
                        @for($loop_race_num = 1;$loop_race_num <= 12 ; $loop_race_num++)
                            @isset($vod_array[$kaisai_date][$kaisai_date.'09'.str_pad($loop_race_num, 2, '0', STR_PAD_LEFT)])
                                <script type="text/JavaScript">
                                <!--
                                    document.write("<li><a href=\"/asp/tsu/sp/kyogi/replay_race.asp?flag=" + flag + "&Folder=1&jyo=09&yd={{$kaisai_date}}&racenum={{$loop_race_num}}\">{{$loop_race_num}}R</a></li>");
                                -->
                                </script>
                            @else
                                <li><div class="off">{{$loop_race_num}}R</div></li>
                            @endisset
                        @endfor
                    </ul>
                </dd>
            @endforeach
        </dl>
    </dd>
    @if($key != 0)
        </div>
    @endif
@endforeach


</div>

</dl>

</div>




<!-- データリンク -->
<script type="text/javascript">
	funcTsuDataMenu();
</script>


</div><!-- main end -->


<div id="footer"><!-- footer start -->

<div id="page_top"><a href="#wrapper">▲ページ上部へ</a></div>

<div id="b_top"><a href="/sp/kyogi/replay.htm">レースリプレイTOP</a><a href="/asp/tsu/sp/kyogi/index.asp?jyo=09">データ＆予想</a></div>

<div id="copyright"><a href="/sp/">
<div>&copy;BOAT RACE TSU All rights reserved.</div>
</a></div>

</div><!-- footer end -->


</div><!-- wrapper end -->



</body>

</html>
