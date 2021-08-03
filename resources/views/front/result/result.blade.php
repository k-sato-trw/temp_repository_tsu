@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_pc.js"></script>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">

<title>ボートレース津｜レース結果検索</title>

<meta name="Keywords" content="BOAT RACE津,津,着順,出目,結果,払い戻し">
<meta name="Description" content="BOAT RACE津の開催レースを、当日から60日間遡って節間の結果がご覧いただけます。">
<meta name="viewport" content="width=1280px">

<link href="/css/reset.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">

<link href="/css/03result.css" rel="stylesheet" type="text/css" media="all" />


<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/js/common.js"></script>

<!--コンテンツメニューjs-->
<script type="text/javascript" src="/js/contents_navi_slide.js"></script>
<script type="text/javascript" src="/js/contents_navi_main.js"></script>

<!--ヘッダーメニューjs-->
<script type="text/javascript" src="/js/header_navi.js"></script>

<!--stickybtn-->
<script type="text/javascript" src="/js/jquery.sticky-kit.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  return $("#tenbo_nav, #main").stick_in_parent({
    offset_top: 10
  });
});
</script>



<!--iframe-auto-height-->
<script type="text/javascript" src="/js/jquery.iframe-auto-height.js"></script>
<script>
  $(document).ready(function () {
    $('iframe.auto-height').iframeAutoHeight({debug: true});
  });
</script>
<script type="text/javascript">
function funcRace( argNum , argDate ){
	for( var intLoopCount = 1 ; intLoopCount < '{{ count($kaisai_list) + 1 }}' ; intLoopCount++ ){
		document.getElementById( 'race' + intLoopCount ).className = '';
	}
	document.getElementById( 'race' + argNum ).className = 'select';
	document.getElementById( 'race_data' ).src = '/asp/tsu/03result_tsu/result_race.asp?jyo=09&yd=' + argDate;
	document.getElementById( 'race_data2' ).src = '/asp/tsu/03result_tsu/dummy.htm';
}
</script>



</head>


<body>
<div id="wrapper">

<div id="header_wrap">
    <div id="header">
    <div id="header_img">
    	
        <h1><a href="/">BOATRACE 津 #09</a></h1>
        <h2>レース結果検索</h2>
        
        <div id="nav">
			<script type="text/javascript">
            funcTsuMenu();
            </script>
        </div><!--/#nav-->
        
        <ul id="header_nav">
            <script type="text/javascript">
            funcTsuHeaderMenu();
            </script>
        </ul><!--/#header_nav-->
    
    </div><!--/#header_img-->
    </div><!--/#header-->
</div><!--/#header_wrap-->




<!--◆◆◆コンテンツ◆◆◆-->

<div id="contents_wrap">
<div id="contents">
	
<div id="main">
 
<span class="text">ボートレース津の開催レースを、当日から過去60日間遡って節間の結果がご覧いただけます。
</span>
<div id="result_wrap">


<div id="result_main">

<div id="result_data_view">
@if($target_date > $kaisai_last_record->終了日付)
    <iframe src="/asp/tsu/03result_tsu/result_race.asp?jyo=09&yd={{ $kaisai_last_record->開始日付 }}" class="auto-height" id="race_data" scrolling="no" frameborder="0" allowtransparency="true" ></iframe>    
@else
    <iframe src="/asp/tsu/03result_tsu/result_race.asp?jyo=09&yd={{ $last_kekka->TARGET_DATE }}" class="auto-height" id="race_data" scrolling="no" frameborder="0" allowtransparency="true" ></iframe>
@endif

</div><!--/data-->  

<div id="result_data_view">
<iframe src="/asp/tsu/03result_tsu/dummy.htm" class="auto-height" id="race_data2" scrolling="no" frameborder="0" allowtransparency="true" ></iframe>
 </div><!--/data-->           

          
</div><!--/#result_main-->
            



<ul id="result_nav">
<span class="st">SELECT</span>
<?php $loop_count = 1; ?>
@foreach ($kaisai_array as $kaisai_year => $kaisai_one_year)
    <span class="year">{{$kaisai_year}}年</span>
    @foreach ($kaisai_one_year as $kaisai)
        <!-- RACE CELECT-->
        <li @if($loop_count == 1) class="select" @endif id="race{{$loop_count}}">
            @if($target_date > $kaisai->終了日付) {{--レースが終了した場合--}}
                <a href="javascript:void(0);" onClick="funcRace( {{$loop_count}} , '{{$kaisai->終了日付}}' )">
            @else
                <a href="javascript:void(0);" onClick="funcRace( {{$loop_count}} , '{{$kaisai->開始日付}}' )">
            @endif
                <?php
                    if(strpos($kaisai->開催名称,"SG") !== false){
                        $grade = 'SG';
                    }elseif(strpos($kaisai->開催名称,"G1") !== false){
                        $grade = 'G1';
                    }elseif(strpos($kaisai->開催名称,"G2") !== false){
                        $grade = 'G2';
                    }elseif(strpos($kaisai->開催名称,"G3") !== false){
                        $grade = 'G3';
                    }else{
                        $grade = '一般';
                    }
                ?>
                <div id="result_nav_waku">
                <span class="r_day">{!! $general->create_display_date_for_pc_result($kaisai->開始日付,$kaisai->終了日付,$holiday_array,true) !!}【{{$grade}}】</span>
                <span class="r_name">
                    @if(mb_strlen($kaisai->開催名称) > 12)
                        {{ mb_substr($kaisai->開催名称,0,12)."…" }}
                    @else
                        {{$kaisai->開催名称}}
                    @endif
                </span>
                </div>
            </a>
        </li>
        <?php $loop_count++; ?>
    @endforeach
@endforeach

</ul><!--/#result_nav-->
            
<div class="clear"></div>
            
</div><!--/#result_wrap-->
        
<div id="page_top"><a href="#wrapper">UP</a></div>
</div><!--/#main-->
    
</div><!--/#contents-->
</div><!--/#contents_wrap-->




<!--◆◆◆フッター◆◆◆-->
<div id="footer_wrap">
    <div id="footer">
    	<iframe src="/footer.htm" frameborder="0" allowtransparency="true" scrolling="no" name="footer"></iframe>
    </div><!--/#footer-->
</div><!--/#footer_wrap-->



</div><!--/#wrapper-->




</body>
</html>
