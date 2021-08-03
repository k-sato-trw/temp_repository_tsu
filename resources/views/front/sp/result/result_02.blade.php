@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
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

<div id="nav">
<script type="text/javascript">
            funcTsuMenu();
            </script>
</div><!--/#nav-->
</div><!--/#header_wrap-->

<!--◆◆◆タイトル◆◆◆-->
<div id="result_tit">
<span class="sub_t">検索結果</span>
<span class="back_b"><a href="javascript:history.back();">戻る</a></span>
<div class="clear"></div>
</div><!--/#result_tit--> 

<!--◆◆◆レース名◆◆◆-->
<div id="result_kekka_day">{{date('Y/n/j',strtotime($target_date))}}（{{$kaisai_date_list[$target_date]}}）</div>
<div id="result_rn">
    @if(strpos($kaisai_master->開催名称,"SG") !== false)
        <span class="grade_sg">SG</span>
    @elseif(strpos($kaisai_master->開催名称,"G1") !== false)
        <span class="grade_g1">G1</span>
    @elseif(strpos($kaisai_master->開催名称,"G2") !== false)
        <span class="grade_g2">G2</span>
    @elseif(strpos($kaisai_master->開催名称,"G3") !== false)
        <span class="grade_g3">G3</span>
    @else
        <span class="grade_00">一般</span>
    @endif
<span class="race_name"><p>{{$kaisai_master->開催名称}}</p></span>

<div class="clear"></div>
</div><!--/#result_rn-->  


<!--◆◆◆レース番号◆◆◆-->
<div id="result02_ttl">
<h2 class="h_r{{str_pad($race_num, 2, 0, STR_PAD_LEFT)}}">{{ $race_num }}R</h2>
<span class="race_cl">{{ $syussou[1]->RACE_NAME ?? "" }}</span>
<div class="clear"></div>
</div><!--/result02_ttl-->


<!--◆◆◆コンテンツ◆◆◆-->	
<div id="t_result">

<div id="result02_list">





<!--▼レース結果▼-->
<div class="kekka01">
<table>
<tr>
<th>着</th>
<th>艇</th>
<th>登番</th>
<th>選手名</th>
<th>級別</th>
<th>進入</th>
<th>ST</th>
<th>タイム</th>
</tr>
@foreach ($kekka as $key=>$kekka_row)
    <tr class="c_win">
        <td class="col-1">{{ $kekka_row->TYAKUJUN }}</td>
        <td class="col-2 t0{{ $kekka_row->TEIBAN }}">{{ $kekka_row->TEIBAN }}</td>
        <td>{{ $kekka_row->TOUBAN ?? '-' }}</td>
        <td class="col-4">{{ str_replace(" ","",$kekka_row->SENSYU_NAME) }}</td>
        <td>{{ $syussou[$kekka_row->TEIBAN]->KYU_BETU ?? '-' }}</td>
        <td class="col-6">{{ $kekka_row->SHINNYU_COURSE ?? '-' }}</td>
        <td class="ST1">{{ substr($kekka_row->START_TIMING,1) }}</td>
        <td class="col-6">{{ ($kekka_row->RACE_TIME)?str_replace("’",".",($kekka_row->RACE_TIME)):"-" }}</td>
    </tr>
@endforeach
</table>
</div><!--/kekka01-->

<div class="kekka02">
<div class="kimari">決まり手：<span>{{str_replace("　","",($kekka[0]->KIMARITE??""))}}</span></div></div><!--/kekka02-->


<div class="kekka03">
<table>
<tr>
    <th>勝式</th>
    <th>組番</th>
    <th>配当</th>
    <th>人気</th>
</tr>
    @if($fuseiritu_array[4] == 1)
        {{--不成立--}}
        <tr>
            <td><p>3連単</p></td>
            <td colspan="2">不成立</td>
            <td>--</td>
        </tr>
    @else
        @foreach($sanrentan_array as $key=>$item)
            <tr>
                @if($key == 1)
                    <td rowspan="{{count($sanrentan_array)}}"><p>3連単</p></td>
                @endif

                @if(!$item['SANRENTAN_MONEY'] )
                    {{--金額無し--}}
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                @else
                    {{--通常--}}
                    <td><div class="tei"><span class="t0{{(int) substr($item['SANRENTAN'],0,1)}}">{{(int) substr($item['SANRENTAN'],0,1)}}</span><span class="num">-</span><span class="t0{{(int) substr($item['SANRENTAN'],1,1)}}">{{(int) substr($item['SANRENTAN'],1,1)}}</span><span class="num">-</span><span class="t0{{(int) substr($item['SANRENTAN'],2,1)}}">{{(int) substr($item['SANRENTAN'],2,1)}}</span></div></td>
                    <td><div class="mo">{{ number_format($item['SANRENTAN_MONEY']) }}円</div></td>
                    <td>{{$item['SANRENTAN_NINKI']}}</td>
                @endif
            </tr>
        @endforeach
        
    @endif

    @if($fuseiritu_array[5] == 1)
        {{--不成立--}}
        <tr>
            <td><p>3連複</p></td>
            <td colspan="2">不成立</td>
            <td>--</td>
        </tr>
    @else
        @foreach($sanrenfuku_array as $key=>$item)
            <tr>
                @if($key == 1)
                    <td rowspan="{{count($sanrenfuku_array)}}"><p>3連複</p></td>
                @endif

                @if(!$item['SANRENFUKU_MONEY'] )
                    {{--金額無し--}}
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                @else
                    {{--通常--}}
                    <td><div class="tei"><span class="t0{{(int) substr($item['SANRENFUKU'],0,1)}}">{{(int) substr($item['SANRENFUKU'],0,1)}}</span><span class="equ">=</span><span class="t0{{(int) substr($item['SANRENFUKU'],1,1)}}">{{(int) substr($item['SANRENFUKU'],1,1)}}</span><span class="equ">=</span><span class="t0{{(int) substr($item['SANRENFUKU'],2,1)}}">{{(int) substr($item['SANRENFUKU'],2,1)}}</span></div></td>
                    <td><div class="mo">{{ number_format($item['SANRENFUKU_MONEY']) }}円</div></td>
                    <td>{{$item['SANRENFUKU_NINKI']}}</td>
                @endif
            </tr>
        @endforeach
        
    @endif

    @if($fuseiritu_array[6] == 1)
        {{--不成立--}}
        <tr>
            <td rowspan="3"><p>拡連複</p></td>
            <td colspan="2">不成立</td>
            <td>--</td>
        </tr>
        <tr>
			<td colspan="2">--</td>
			<td>--</td>
        </tr>
        <tr>
			<td colspan="2">--</td>
			<td>--</td>
		</tr>
    @else
        
        @foreach($kakurenfuku_array as $key=>$item)
            <tr>
                @if($key == 1)
                    @if(count($kakurenfuku_array) > 3)
                        <td rowspan="{{count($kakurenfuku_array)}}"><p>拡連複</p></td>
                    @else
                        <td rowspan="3"><p>拡連複</p></td>
                    @endif
                @endif

                @if(!$item['KAKURENFUKU_MONEY'] )
                    {{--金額無し--}}
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                @else
                    {{--通常--}}
                    <td><div class="tei"><span class="t0{{(int) substr($item['KAKURENFUKU'],0,1)}}">{{(int) substr($item['KAKURENFUKU'],0,1)}}</span><span class="equ">=</span><span class="t0{{(int) substr($item['KAKURENFUKU'],1,1)}}">{{(int) substr($item['KAKURENFUKU'],1,1)}}</span></div></td>
                    <td><div class="mo">{{ number_format($item['KAKURENFUKU_MONEY']) }}円</div></td>
                    <td>{{$item['KAKURENFUKU_NINKI']}}</td>
                @endif
            </tr>
        @endforeach

    @endif

    @if($fuseiritu_array[2] == 1)
        {{--不成立--}}
        <tr>
            <td><p>2連単</p></td>
            <td colspan="2">不成立</td>
            <td>--</td>
        </tr>
    @else
        @foreach($nirentan_array as $key=>$item)
            <tr>
                @if($key == 1)
                    <td rowspan="{{count($nirentan_array)}}"><p>2連単</p></td>
                @endif
                @if(!$item['NIRENTAN_MONEY'] )
                    {{--金額無し--}}
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                @elseif($item['NIRENTAN_MONEY'] == 70)
                    <td><div class="tei">特払</div></td>
                    <td><div class="mo">70円</div></td>
                    <td>--</td>
                @else
                    {{--通常--}}
                    <td><div class="tei"><span class="t0{{(int) substr($item['NIRENTAN'],0,1)}}">{{(int) substr($item['NIRENTAN'],0,1)}}</span><span class="num">-</span><span class="t0{{(int) substr($item['NIRENTAN'],1,1)}}">{{(int) substr($item['NIRENTAN'],1,1)}}</span></div></td>
                    <td><div class="mo">{{ number_format($item['NIRENTAN_MONEY']) }}円</div></td>
                    <td>{{$item['NIRENTAN_NINKI']}}</td>
                @endif
            </tr>
        @endforeach
    @endif

    @if($fuseiritu_array[3] == 1)
        {{--不成立--}}
        <tr>
            <td><p>2連複</p></td>
            <td colspan="2">不成立</td>
            <td>--</td>
        </tr>
    @else
        
        @foreach($nirenfuku_array as $key=>$item)
            <tr>
                @if($key == 1)
                    <td rowspan="{{count($nirenfuku_array)}}"><p>2連複</p></td>
                @endif
                @if(!$item['NIRENFUKU_MONEY'] )
                    {{--金額無し--}}
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                @elseif($item['NIRENFUKU_MONEY'] == 70)
                    <td><div class="tei">特払</div></td>
                    <td><div class="mo">70円</div></td>
                    <td>--</td>
                @else
                    {{--通常--}}
                    <td><div class="tei"><span class="t0{{(int) substr($item['NIRENFUKU'],0,1)}}">{{(int) substr($item['NIRENFUKU'],0,1)}}</span><span class="equ">=</span><span class="t0{{(int) substr($item['NIRENFUKU'],1,1)}}">{{(int) substr($item['NIRENFUKU'],1,1)}}</span></div></td>
                    <td><div class="mo">{{ number_format($item['NIRENFUKU_MONEY']) }}円</div></td>
                    <td>{{$item['NIRENFUKU_NINKI']}}</td>
                @endif
            </tr>
        @endforeach
    @endif

    @if($fuseiritu_array[0] == 1)
        {{--不成立--}}
        <tr>
            <td><p>単勝</p></td>
            <td colspan="2">不成立</td>
            <td>--</td>
        </tr>
    @else
        @foreach($tansyo_array as $key=>$item)
            <tr>
                @if($key == 1)
                    <td rowspan="{{count($tansyo_array)}}"><p>単勝</p></td>
                @endif
                @if(!$item['TANSYO_MONEY'] )
                    {{--金額無し--}}
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                @elseif($item['TANSYO_MONEY'] == 70)
                    <td><div class="tei">特払</div></td>
                    <td><div class="mo">70円</div></td>
                    <td>--</td>
                @else
                    {{--通常--}}
                    <td><div class="tei"><span class="t0{{(int) $item['TANSYO'] }}">{{(int) $item['TANSYO'] }}</span></div></td>
                    <td><div class="mo">{{ number_format($item['TANSYO_MONEY']) }}円</div></td>
                    <td>-</td>
                @endif
            </tr>
        @endforeach
    @endif



    @if($fuseiritu_array[0] == 1)
        {{--不成立--}}
        <tr>
            <td rowspan="2" class="class"><p>複勝</p></td>
            <td colspan="2">不成立</td>
            <td class="value">--</td>
        </tr>
        <tr>
            <td colspan="2">--</td>
            <td>--</td>
		</tr>
    @else
        @foreach($fukusyo_array as $key=>$item)
            <tr>
                @if($key == 1)
                    @if(count($fukusyo_array) > 2)
                        <td rowspan="{{count($fukusyo_array)}}"><p>複勝</p></td>
                    @else
                        <td rowspan="2"><p>複勝</p></td>
                    @endif
                @endif
                @if(!$item['FUKUSYO_MONEY'] )
                    {{--金額無し--}}
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                @elseif($item['FUKUSYO_MONEY'] == 70)
                    <td><div class="tei">特払</div></td>
                    <td><div class="mo">70円</div></td>
                    <td>--</td>
                @else
                    {{--通常--}}
                    <td><div class="tei"><span class="t0{{(int) $item['FUKUSYO']}}">{{(int) $item['FUKUSYO'] }}</span></div></td>
                    <td><div class="mo">{{ number_format($item['FUKUSYO_MONEY']) }}円</div></td>
                    <td>-</td>
                @endif
            </tr>
        @endforeach
    @endif

</table>
</div><!--/kekka03-->



<div class="kekka04">
<table>
<tr>
<th>天候</th>
<th>波高</th>
<th>風向</th>
<th>風速</th>
</tr>
<tr>
<td>{{$kekka_info->TENKOU}}</td>
<td>{{$kekka_info->HAKO}}cm</td>
<td>{{$kekka_info->KAZAMUKI2}}</td>
<td>{{$kekka_info->FUSOKU}}m</td>
</tr>
</table>
</div><!--/kekka04-->






</div><!--/result02_list-->
<div id="txt"></div>

</div><!--/#t_result-->

<!--◆◆◆フッター◆◆◆-->
<div id="footer_wrap">
<div id="ft_logo">BOAT RACE TSU</div>
<div id="ft_credit">&copy;BOAT RACE TSU All rights reserved.</div></div>
<!--◆◆◆フリースペース◆◆◆-->

</div><!--/#wrapper-->

</body>
</html>
