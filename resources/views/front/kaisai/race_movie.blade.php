<!doctype html>
<html>
<head>
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta charset="utf-8">
@if($live_flg == 2)
    {{--開始するまで30秒ごとにリロード--}}
    <meta http-equiv="Refresh" CONTENT="30; URL=/asp/kyogi/09/pc/race_movie.htm">
@endif
<title></title>

<link href="/kaisai/css/reset.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/common.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/kaisai.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/asp/SmartAgentGetter.js"></script>
<script type="text/javascript" src="/asp/FlashPlayerCheck.js"></script>


</head>

<body>
@if($live_flg == 1)
    {{--ライブ放送--}}
    <iframe src="https://jlcapi.jlc.ne.jp/new_bb/Streamer/GetBoatraceLive.php?RaceStudiumNo=09&Non-HoldingImgURL=https://secure.webkyotei.jp/images/movie/09/pc.png" frameborder="0" scrolling="no" allowfullscreen="true" style="margin:0;padding:0;width:720px;height:405px;"></iframe>
    <iframe src="/asp/kyogi/09/pc/race_movie_reload.htm" frameborder="0" allowtransparency="true" scrolling="no" width="0" height="0" style="visibility:hidden;"></iframe>
@elseif($live_flg == 2)
    {{--ライブ実況前--}}
    <div id="no_movie">
        <p>ただいま映像配信はございません</p>
    </div>

@elseif($live_flg == 3)
    {{--ライブ終了--}}
    <div id="no_movie">
        <p>本日のレースは終了しました</p>
    </div>

@elseif($live_flg == 4)
    {{--中止--}}
    @if($chushi_junen->中止開始レース番号 == 0)
        <div id="no_movie">
            <p>{{date("n/j",$target_date)}}の開催は中止となりました</p>
        </div>
    @else
    <div id="no_movie">
        <p>{{$chushi_junen->中止開始レース番号}}レース以降は中止となりました</p>
    </div>
    @endif

@else
    {{--非開催--}}
    <div id="no_movie">
        <p>次節は{{date('n/j',$next_kaisai)}}より開催します</p>
    </div>
    
@endif

</body>
</html>
