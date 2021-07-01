<!doctype html>
<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-161205184-3"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-161205184-3');
</script>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">
<meta http-equiv="Refresh" CONTENT="15; URL=/asp/tsu/topdisplay/indexKaisaiJokyo.htm">

<title>ボートレース津</title>

<link href="/css/reset.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/css/index.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>


</head>





<body>

    @if($chushi_flg)
        {{--中止の時何もしない--}}
        <div id="race_info_now">
            <img src="/images/now_0r.png" alt="">
            
            <p id="dento_time">
            --:--
            </p>
        </div>

    @elseif($kaisai_flg)
        {{--開催--}}
        @if($target_time < '0830')
            {{--レース開始前--}}
            <div id="race_info_now">
                <img src="/images/now_0r.png" alt="">
                
                <p id="dento_time">
                --:--
                </p>
            </div>

        @elseif(!$race_num && !$shimekiri)

            <div id="race_info_now">

            @if($race12_flg == 1)
                {{--12R中--}}
                <img src="/images/now_12r_orver.png" alt="12R発売中">
            @else
                <img src="/images/now_{{$race_num}}r.png" alt="{{$race_num}}R発売中">
            @endif
                <p id="dento_time">
                {{$shimekiri}}
                </p>
            </div>

        @else
            {{--何も表示しない--}}
            <div id="race_info_now">
                <img src="/images/now_0r.png" alt="">
                
                <p id="dento_time">
                --:--
                </p>
            </div>

        @endif
        
    @else
        {{--非開催--}}
        
    @endif



</body>
</html>
