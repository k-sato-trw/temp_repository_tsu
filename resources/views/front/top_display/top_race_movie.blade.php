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
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta charset="UTF-8">
@if($live_flg == 2)
    <meta http-equiv="Refresh" CONTENT="30; URL=/asp/kyogi/09/pc/top_race_movie.htm">
@elseif($live_flg == 3)
    @if($kaisai_master->終了日付 != $target_date)
        @if($target_time >= '1815' && $next_kaisai && $next_race_header)            
        @else
            <meta http-equiv="Refresh" CONTENT="30; URL=/asp/kyogi/09/pc/top_race_movie.htm">
        @endif
    @endif
@endif
<title></title>

<link href="/css/reset.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/css/index.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/asp/SmartAgentGetter.js"></script>
<script type="text/javascript" src="/asp/FlashPlayerCheck.js"></script>


</head>

<body>

            <div class="redzone">競走場、場外発売場の発売状況は各競走場等のサイトをご確認下さい</div>

@if($live_flg == 1)
    {{--ライブ放送--}}

    <iframe src="https://jlcapi.jlc.ne.jp/new_bb/Streamer/GetBoatraceLive.php?RaceStudiumNo=09&Non-HoldingImgURL=https://secure.webkyotei.jp/images/movie/09/pc.png" frameborder="0" scrolling="no" allowfullscreen="true" style="margin:0;padding:0;width:524px;height:294px;"></iframe>
    <iframe src="/asp/kyogi/09/pc/top_race_movie_reload.htm" frameborder="0" allowtransparency="true" scrolling="no" width="0" height="0" style="visibility:hidden;"></iframe>

@elseif($live_flg == 2)
    {{--ライブ実況前--}}
    <div id="r_endinfo">
        <p class="memo">ただいま映像配信はございません</p>
    </div>

@elseif($live_flg == 3)
    {{--ライブ終了--}}

    @if($kaisai_master->終了日付 == $target_date)
        {{--本日最終日--}}
        <div id="r_endinfo">
            <p class="memo">本日のレースは終了しました</p>
        </div>
    @else

        @if($target_time >= '1815' && $next_kaisai && $next_race_header)
            {{--翌日データ開催--}}
            <div id="r_endinfo">
                <dl>
                    <dt>
                        @if($next_kaisai->終了日付 == $tomorrow_date)
                            {{--最終日--}}
                            <span>最終日
                        @else
                            {{$next_race_header->KAISAI_DAYS}}<span>日目
                        @endif
                        ({{date('n/j',strtotime($tomorrow_date))}})
                        </span>
                    </dt>
                    <dd>第12レースメンバー</dd>
                </dl>
                <ul>
                
                @foreach ($syussou as $teiban=>$item)
                    {{--6艇繰り返す--}}
                    <li class="r{{$teiban}}"><p>
                        {{$item->SENSYU_NAME}}
                        <span>
                        {{--女子レーサー確認--}}
                        @if($item->SEX == 2)
                            <img src="/images/jyogai_lady.png">
                        @endif
                            {{$item->TOUBAN}}/{{$item->KYU_BETU}}/{{$item->HOME_TOWN}}
                        </span>
                    </p></li>
                @endforeach
                    <div class=""clear""></div>
                </ul>
            </div>

        @else
            <div id="r_endinfo">
                <p class="memo">本日のレースは終了しました</p>
            </div>
        @endif

    @endif

@elseif($live_flg == 4)
    {{--中止--}}
    @if($chushi_junen->中止開始レース番号 == 0)
        <div id="r_endinfo">
            <p class="memo">{{date('n/j',strtotime($target_date))}}の開催は中止となりました</p>
        </div>
    @else
        <div id="r_endinfo">
            <p class="memo">第{{$chushi_junen->中止開始レース番号}}レース以降は中止となりました</p>
        </div>
    @endif
    
@else
    {{--非開催--}}
    <div id="r_endinfo">
        <p class="memo">ただいま映像配信はございません</p>
    </div>
    
@endif




</body>
</html>
