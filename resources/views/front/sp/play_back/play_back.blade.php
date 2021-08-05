
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

<title>ボートレース津｜優勝戦プレイバック</title>

<meta name="Keywords" content="BOAT RACE津,津,優勝,優勝戦,結果,プレイバック">
<meta name="Description" content="BOAT RACE津の優勝戦結果を掲載しています。">

<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href="/sp/css/reset.css" rel="stylesheet" type="text/css">
<link href="/sp/css/common.css" rel="stylesheet" type="text/css">
<link href="/sp/css/03play_b.css" rel="stylesheet" type="text/css">
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
<h2>優勝戦プレイバック</h2>

<div id="nav">
<script type="text/javascript">
            funcTsuMenu();
            </script>
</div><!--/#nav-->
</div><!--/#header_wrap-->


<!--◆◆◆コンテンツ◆◆◆-->	

<!--///グレードレース///-->
<div id="pb_gl_tit">グレードレース</div>


<ul id="pb_nav">
    @foreach ($vod_yusho_record_grade as $year => $date_kaisai)
        <span class="year">{{$year}}年</span>
        @foreach ($date_kaisai as $target_date => $race_list)
            @foreach ($race_list as $race_num => $item)
                <!-- RACE CELECT-->
                <li><a href="/asp/tsu/sp/03play_b/03play_b_race.asp?movieid={{$item->MOVIE_ID}}">
                    <div id="pb_nav_waku">
                        <span class="r_day">{{ date('n/j',strtotime($target_date)) }}</span>
                        <span class="r_name">
                        <p>{{ $kaisai_name_list[$target_date] ?? ""; }}</p>
                        </span>
                        <div class="clear"></div>
                    </div></a>
                </li>
            @endforeach
        @endforeach
    @endforeach
</ul>
<!--///グレードレース終了///-->

<!--///一般戦///-->
<div id="pb_gl_tit">一般戦</div>

<ul id="pb_nav">
    @foreach ($vod_yusho_record_nograde as $year => $date_kaisai)
        <span class="year">{{$year}}年</span>
        @foreach ($date_kaisai as $target_date => $race_list)
            @foreach ($race_list as $race_num => $item)
                <!-- RACE CELECT-->
                <li><a href="/asp/tsu/sp/03play_b/03play_b_race.asp?movieid={{$item->MOVIE_ID}}">
                    <div id="pb_nav_waku">
                        <span class="r_day">{{ date('n/j',strtotime($target_date)) }}</span>
                        <span class="r_name">
                        <p>{{ $kaisai_name_list[$target_date] ?? ""; }}</p>
                        </span>
                        <div class="clear"></div>
                    </div></a>
                </li>
            @endforeach
        @endforeach
    @endforeach
</ul>
<!--///一般戦終了///-->




<!--◆◆◆フッター◆◆◆-->
<div id="footer_wrap">
<div id="ft_logo">BOAT RACE TSU</div>
<div id="ft_credit">&copy;BOAT RACE TSU All rights reserved.</div></div>


</div><!--/#wrapper-->

</body>
</html>
