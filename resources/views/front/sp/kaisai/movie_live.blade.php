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

<title>レースライブ｜ボートレース津</title>
<meta name="Keywords" content="ボートレース津,ボートレース,津,動画,ライブ" />
<meta name="Description" content="ボートレース津が開催するレースの映像、オッズや舟券予想などレースに関する様々な情報がご覧いただけます。" />

<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/sp/kyogi/css/reset.css" />
<link rel="stylesheet" href="/sp/kyogi/css/kyogi.css" />
<link rel="stylesheet" href="/sp/kyogi/css/style.css" />

<script type="text/javascript" src="/sp/kyogi/js/jquery-1.8.3.min.js"></script>

<!-- ビューポート設定 -->
<script type="text/javascript" src="/sp/kyogi/js/monaca.viewport.js"></script>
<script type="text/javascript">
monaca.viewport({
    width : 720
});
</script>

<!-- アドレスバー非表示 -->
<script type="text/javascript" src="/sp/kyogi/js/HideAddressBar.js"></script>

<!-- 共通 -->
<script type="text/javascript" src="/sp/kyogi/js/common.js"></script>
<!-- ドロップダウン -->

<style type="text/css">
body {
	background-color: #000;
}
</style>

</head>


<body>

<div id="wrapper"><!-- wrapper start -->


<div id="header"><!-- header start -->

<h1><a href="/sp/"><div>BOAT RACE 津 09#</div></a></h1>


<div id="replay_menu">

<ul>
<li><a href="replay_list.htm?flag=3"><div>今節</div></a></li>
<li><a href="replay_list.htm?flag=1"><div>レースリプレイ</div></a></li>
<li><a href="replay_final.htm"><div>優勝戦</div></a></li>
</ul>

</div>

</div><!-- header end -->

    @if($chushi_flg && ($stop_race_num == 0 || $stop_race_num <= $race_num) )
        {{--中止時かつ選択中レース番号が中止の時--}}
        <div id="race">

            <table>
            <tr>
            <td class="date">{{date('n/j',strtotime($target_date))}}</td>
            <td class="name">{{$kaisai_master->開催名称 ?? ""}}</td>
            <td class="day">{{$kaisai_days}}</td>
            </tr>
            </table>

        </div>

        <div class="redzone">競走場、場外発売場の発売状況は各競走場等のサイトをご確認下さい</div>

        <div id="movie_play">

            <div id="no_movie">現在レースライブ放送はございません</div>

        </div>

    
    @elseif(!$kaisai_flg)
        {{--非開催--}}

        <div id="race">

            <table>
            <tr>
            <td class="date">{{date('n/j',strtotime($target_date))}}</td>
            <td class="name">---</td>
            <td class="day">---</td>
            </tr>
            </table>

        </div>

        <div class="redzone">競走場、場外発売場の発売状況は各競走場等のサイトをご確認下さい</div>

        <div id="movie_play">

            <div id="no_movie">現在レースライブ放送はございません</div>

        </div>
    @else
        {{--開催--}}

        @if($target_time >= $holding->実況開始時間 && $target_time <= $holding->実況終了時間)
            {{--実況時間内--}}
            <div id="race">

                <table>
                <tr>
                <td class="date">{{date('n/j',strtotime($target_date))}}</td>
                <td class="name">{{$kaisai_master->開催名称 ?? ""}}</td>
                <td class="day">{{$kaisai_days}}</td>
                </tr>
                </table>
    
            </div>
    
            <div class="redzone">競走場、場外発売場の発売状況は各競走場等のサイトをご確認下さい</div>
    
            <div id="movie_play">
    
                <span style="margin-left:20px;">
                    {{--LivePlayer_API(strJyoCode, "680", "510", "0")--}}
                    <iframe src="https://jlcapi.jlc.ne.jp/sp_bb/Streamer/GetBoatraceLive.php?RaceStudiumNo=09" frameborder="0" scrolling="no" allowfullscreen="true" style="margin:0;padding:0;width:680px;height:510px;"></iframe>
                </span>
    
            </div>


            
        @else
            {{--実況終了--}}
            <div id="race">

                <table>
                <tr>
                <td class="date">{{date('n/j',strtotime($target_date))}}</td>
                <td class="name">{{$kaisai_master->開催名称 ?? ""}}</td>
                <td class="day">{{$kaisai_days}}</td>
                </tr>
                </table>
    
            </div>
    
            <div class="redzone">競走場、場外発売場の発売状況は各競走場等のサイトをご確認下さい</div>
    
            <div id="movie_play">
    
                <div id="no_movie">現在レースライブ放送はございません</div>
    
            </div>

        @endif
        
    @endif


<div id="movie_btn">

<ul class="cf">

<li id="back"><a href="javascript:history.back();">戻る</a></li>
<li id="refresh"><a href="javascript:location.reload(true);">更新</a></li>

</ul>

</div>

</div><!-- wrapper end -->

<div id="bottom_movie"></div>

</body>

</html>
