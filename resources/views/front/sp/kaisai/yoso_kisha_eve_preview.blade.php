<!DOCTYPE HTML>
<html>
<head>
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
</head>
<body>
<div id="shusso" class="cf">
<div class="page_tit">記者前夜版@if($tomorrow_flg)（明日）@endif</div>

@if( ($chushi_junen->中止開始レース番号 ?? 99) <= $race_num )
    @if($chushi_junen->中止開始レース番号 > 0 )
        <!---データ無し--->
        <table id="nodata">
            <tr>
                <td class="cyushi">第{{$chushi_junen->中止開始レース番号}}レース以降は中止となりました</td>
            </tr>
        </table>
    @else
        <!---データ無し--->
        <table id="nodata">
            <tr>
                <td class="cyushi">{{ date('n/j',strtotime($target_date)) }}の開催は中止となりました</td>
            </tr>
        </table>
    @endif
@else
    <table class="ta_shusso yoso1">
    <tr>
    <th rowspan="2" class="mark">記者<br>
        評価</th>
    <th rowspan="2">枠<br>番</th>
    <th rowspan="2" class="name">選手名<br>
    <span>登番 / 支部 / 年齢 / 級</span></th>
    <th rowspan="2"><span class="top f">F</span><span class="bot l">L</span></th>
    <th colspan="3" class="mark_thin">モーター</th>
    <th rowspan="2">早<br>
    見</th>
    </tr>
    <tr>
    <th class="mark_thin"><span class="top">No.</span><span class="bot">2連率</span></th>
    <th class="mark">出足</th>
    <th class="mark">伸足</th>
    </tr>

    @foreach($syussou as $teiban => $item)
        @if($ozz_info_array[$teiban] != 2)
            <tr>
                <td rowspan="2" class="mark">
                    <?php $prop_name = "EVALUATION".$teiban; ?>
                    @if($yoso->$prop_name)
                        <img src="/sp/kyogi/images/hyoka_{{ $yoso->$prop_name }}.png"/>
                    @endif
                </td>
                <td rowspan="2" class="r{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
                <td class="bottom_no_border"><span class="name4">{{$item->SENSYU_NAME}}</span></td>
                <td class="top f">{{$item->F_COUNT?"F".$item->F_COUNT:""}}</td>
                <td class="top mark_gr">{{(int)$item->MOTOR_NO}}</td>
                <td rowspan="2" class="mark">
                    @isset($yoso_ashi_array[$teiban])
                        @if($yoso_ashi_array[$teiban]->DEASHI)
                            <img src="/sp/kyogi/images/motor_{{ $yoso_ashi_array[$teiban]->DEASHI }}.png">
                        @endif
                    @endisset
                </td>
                <td rowspan="2" class="mark">
                    @isset($yoso_ashi_array[$teiban])
                        @if($yoso_ashi_array[$teiban]->NOBIASHI)
                            <img src="/sp/kyogi/images/motor_{{ $yoso_ashi_array[$teiban]->NOBIASHI }}.png">
                        @endif
                    @endisset
                </td>
                <td rowspan="2" class="hayami">
                    @if($item->HAYAMI)
                    <a href="/asp/tsu/sp/kyogi/index.asp?jyo=09&racenum={{$item->HAYAMI}}&page=7">{{$item->HAYAMI}}<span>R</span></a>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="number top_no_border">{{$item->TOUBAN}} / {{ $item->HOME_TOWN}} / {{ $item->AGE}} / {{ $item->KYU_BETU}}</td>
                <td class="bottom">{{$item->L_COUNT?"L".$item->L_COUNT:""}}</td>
                <td class="yoso1_bottom gray bold">{{$item->MOTOR2RENTAIRITU}}</td>
            </tr>
        @else {{--欠場--}}
            <tr>
                <td rowspan="2" class="mark"></td>
                <td rowspan="2" class="r{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
                <td class="bottom_no_border"><span class="name4">欠場</span></td>
                <td class="top f">　</td>
                <td class="top mark_gr">　</td>
                <td rowspan="2" class="mark"></td>
                <td rowspan="2" class="mark"></td>
                <td rowspan="2" class="hayami">　</td>
            </tr>
            <tr>
                <td class="number top_no_border">　</td>
                <td class="bottom">　</td>
                <td class="yoso1_bottom gray bold">　</td>
            </tr>
        @endif
    @endforeach
    </table>
@endif


<div class="data yoso1" id="yoso">

<dl class="ichioshi">
<dt>記者イチオシレース</dt>
<dd>{{$push_text}}</dd>
</dl>

@if($yoso->ENTRY)
    <h3>進入予想</h3>
    <div class="slit">
        <table id="ta_shusso" class="start">
            @for($i=0;$i<=6;$i++)
            
                @if($i != 3)

                    @if($i < 3)
                        <tr>
                            <td class="ST">S</td>
                            <td class="slit_img"><img src="/sp/kyogi/images/st0{{substr($yoso->ENTRY,$i,1)}}.png" width="62" height="52" alt="1" style="margin-right:160px;"></td>
                        </tr>
                    @elseif($i > 3)
                        <tr>
                            <td class="ST">D</td>
                            <td class="slit_img"><img src="/sp/kyogi/images/st0{{substr($yoso->ENTRY,$i,1)}}.png" width="62" height="52" alt="1" style="margin-right:280px;"></td>
                        </tr>
                    @endif

                @endif
                
            @endfor
        </table>
    </div>
@endif

@if($yoso->MEMO)
<h3>記者's メモ</h3>
<p class="txt">{{$yoso->MEMO}}
</p>
@endif

@if($yoso->CONFIDENCE)
<dl class="jisin">
<dt>自信度</dt>
<dd>{{$yoso->CONFIDENCE}}<span>%</span></dd>
</dl>
@endif

</div><!-- data end -->
</body>
<html>