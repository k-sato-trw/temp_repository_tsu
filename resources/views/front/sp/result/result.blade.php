@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_sp.js"></script>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="user-scalable=no">

<title>ボートレース津｜レース結果検索</title>

<meta name="Keywords" content="BOAT RACE津,津,着順,出目,結果,払い戻し">
<meta name="Description" content="BOAT RACE津の開催レースを、当日から60日間遡って節間の結果がご覧いただけます。">

<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href="/sp/css/reset.css" rel="stylesheet" type="text/css">
<link href="/sp/css/common.css" rel="stylesheet" type="text/css">
<link href="/sp/css/03result.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="/sp/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/sp/js/common.js"></script>

<!-- ビューポート設定 -->
<script type="text/javascript" src="/sp/js/monaca.viewport.js"></script>
<script>
monaca.viewport({
    width : 720
});
</script>


<!--ヘッダーメニューjs-->
<script type="text/javascript" src="/sp/js/header_navi.js"></script>

</head>

<body>
<div id="wrapper">

<!--◆◆◆header◆◆◆-->

<div id="header_wrap">
<div id="header">
<h1><a href="/sp/">BOATRACE 津 #09</a></h1>
</div><!--/#header-->
<h2>レース結果検索</h2>
<span class="result_note">
ボートレース津の開催レースを、当日から60日間<br>遡って節間の結果がご覧いただけます。
</span>
<div id="nav">
<script type="text/javascript">
            funcTsuMenu();
            </script>
</div><!--/#nav-->
</div><!--/#header_wrap-->


<!--◆◆◆コンテンツ◆◆◆-->	

<ul id="result_nav">
<span class="st">SELECT</span>
@foreach ($kaisai_array as $kaisai_year => $kaisai_one_year)
    <span class="year">{{$kaisai_year}}年</span>
    @foreach ($kaisai_one_year as $kaisai)
    <!-- RACE CELECT-->
    <li>
        @if($target_date > $kaisai->終了日付)
            <a href="/asp/tsu/sp/03result_tsu/03result_01.asp?jyo=09&yd={{$kaisai->終了日付}}">
        @else
            <a href="/asp/tsu/sp/03result_tsu/03result_01.asp?jyo=09&yd={{$kaisai->開始日付}}">
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
                    {{$kaisai->開催名称}}
                </span>
            </div>
        </a>
    </li>
    @endforeach
@endforeach

</ul>


<!--◆◆◆フッター◆◆◆-->
<div id="footer_wrap">
<div id="ft_logo">BOAT RACE TSU</div>
<div id="ft_credit">&copy;BOAT RACE TSU All rights reserved.</div></div>


</div><!--/#wrapper-->

</body>
</html>
