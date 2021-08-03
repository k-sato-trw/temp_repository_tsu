
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>ボートレース津｜レース結果検索</title>

<meta name="Keywords" content="BOAT RACE津,津,着順,出目,結果,払い戻し">
<meta name="Description" content="BOAT RACE津の開催レースを、当日から60日間遡って節間の結果がご覧いただけます。">
 


<!---外部読み込み--->

<link href="/css/03result_data.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="/03result_tsu/js/jquery.min.js"></script>

<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'> 
</head>
 
<body>
<div id="header"></div>
<div id="wrapper">
<p class="deco01"></p>





<div id="ttl">
<h1><p class="r{{str_pad($race_num, 2, 0, STR_PAD_LEFT)}}">{{ $race_num }}R</p></h1>
<h2>{{ $syussou[1]->RACE_NAME ?? "" }}</h2>

</div><!--/ttl-->


<div id="main">
<div class="condition">
	<!--
    	[天気class一覧]
        晴.hare / 曇.kumori / 雨.ame / 雪.yuki / 霧.kiri / 台風.taihu
    -->
    
    <?php
        if(strpos($kekka_info->TENKOU,"晴") !== false){
            $class = "hare";
        }elseif(strpos($kekka_info->TENKOU,"く") !== false){
            $class = "kumori";
        }elseif(strpos($kekka_info->TENKOU,"雨") !== false){
            $class = "ame";
        }elseif(strpos($kekka_info->TENKOU,"雪") !== false){
            $class = "yuki";
        }elseif(strpos($kekka_info->TENKOU,"霧") !== false){
            $class = "kiri";
        }elseif(strpos($kekka_info->TENKOU,"台") !== false){
            $class = "taifu";
        }
    ?>
<ul id="weather">
    <li id="w2"><span class="{{$class}}">天候</span>{{$kekka_info->KION}}℃</li>
    <li id="w3"><span>波高</span>{{$kekka_info->HAKO}}cm</li>
    <li id="w4"><span>風</span>{{$kekka_info->KAZAMUKI2}} {{$kekka_info->FUSOKU}}m</li>
    <div class="clear"></div>
</ul><!--/#waether-->
<span class="win">決まり手：<span>{{str_replace("　","",($kekka[0]->KIMARITE??""))}}</span></span>
</div><!--/condition-->

<div id="data01">
<table>
<tr>
<th>着</th>
<th>艇</th>
<th>登番</th>
<th>選手名</th>
<th>モーター</th>
<th>ボート</th>
<th>展示</th>
<th>進入</th>
<th>スタート</th>
<th>タイム</th>
</tr>
@foreach ($kekka as $key=>$kekka_row)
    <tr>
        <td>{{ $kekka_row->TYAKUJUN }}</td>
        <td class="t0{{ $kekka_row->TEIBAN }}">{{ $kekka_row->TEIBAN ?? '-' }}</td>
        <td>{{ $kekka_row->TOUBAN ?? '-' }}</td>
        <td>{{ str_replace(" ","",$kekka_row->SENSYU_NAME) }}</td>
        <td>{{ (int) ($syussou[$kekka_row->TEIBAN]->MOTOR_NO ?? '-') }}</td>
        <td>{{ (int) ($syussou[$kekka_row->TEIBAN]->BOAT_NO ?? '-') }}</td>
        <td>{{ $syussou[$kekka_row->TEIBAN]->TENJI_TIME ?? '-' }}</td>
        <td>{{ $kekka_row->SHINNYU_COURSE ?? '-' }}</td>
        <td>{{ $kekka_row->START_TIMING ?? '-' }}</td>
        <td>{{ ($kekka_row->RACE_TIME)?str_replace("’",".",($kekka_row->RACE_TIME)):"-" }}</td>
    </tr>
@endforeach
</table>
</div><!--/data01-->


<div id="m01">
<table>
<tr>
<th>&nbsp;</th>
<th colspan="{{ count($sanrentan_array) }}">3連単</th>
<th colspan="{{ count($sanrenfuku_array) }}">3連複</th>
<th colspan="{{ count($nirentan_array) }}">2連単</th>
<th colspan="{{ count($nirenfuku_array) }}">2連複</th>
</tr>
<tr>
    <td>組番</td>
    @foreach($sanrentan_array as $item)
        <td>
            @if($fuseiritu_array[4] == 1)
                {{--不成立--}}
                不成立
            @elseif(!$item['SANRENTAN_MONEY'] )
                {{--金額無し--}}
                --
            @elseif($item['SANRENTAN_MONEY'] == '70')
                {{--特払い--}}
                特払い
            @else
                {{--通常--}}
                <img src="/03result_tsu/images/num{{(int) substr($item['SANRENTAN'],0,1)}}.png" alt="{{(int) substr($item['SANRENTAN'],0,1)}}" /><img src="/03result_tsu/images/num.png" alt="-" /><img src="/03result_tsu/images/num{{(int) substr($item['SANRENTAN'],1,1)}}.png" alt="{{(int) substr($item['SANRENTAN'],1,1)}}" /><img src="/03result_tsu/images/num.png" alt="-" /><img src="/03result_tsu/images/num{{(int) substr($item['SANRENTAN'],2,1)}}.png" alt="{{(int) substr($item['SANRENTAN'],2,1)}}" />
            @endif
        </td>
    @endforeach

    @foreach($sanrenfuku_array as $item)
        <td>
            @if($fuseiritu_array[5] == 1)
                {{--不成立--}}
                不成立
            @elseif(!$item['SANRENFUKU_MONEY'] )
                {{--金額無し--}}
                --
            @elseif($item['SANRENFUKU_MONEY'] == '70')
                {{--特払い--}}
                特払い
            @else
                {{--通常--}}
                <img src="/03result_tsu/images/num{{(int) substr($item['SANRENFUKU'],0,1)}}.png" alt="{{(int) substr($item['SANRENFUKU'],0,1)}}" /><img src="/03result_tsu/images/equal.png" alt="=" /><img src="/03result_tsu/images/num{{(int) substr($item['SANRENFUKU'],1,1)}}.png" alt="{{(int) substr($item['SANRENFUKU'],1,1)}}" /><img src="/03result_tsu/images/equal.png" alt="=" /><img src="/03result_tsu/images/num{{(int) substr($item['SANRENFUKU'],2,1)}}.png" alt="{{(int) substr($item['SANRENFUKU'],2,1)}}" />
            @endif
        </td>
    @endforeach
    
    @foreach($nirentan_array as $item)
        <td>
            @if($fuseiritu_array[2] == 1)
                {{--不成立--}}
                不成立
            @elseif(!$item['NIRENTAN_MONEY'] )
                {{--金額無し--}}
                --
            @elseif($item['NIRENTAN_MONEY'] == '70')
                {{--特払い--}}
                特払い
            @else
                {{--通常--}}
                <img src="/03result_tsu/images/num{{(int) substr($item['NIRENTAN'],0,1)}}.png" alt="{{(int) substr($item['NIRENTAN'],0,1)}}" /><img src="/03result_tsu/images/num.png" alt="-" /><img src="/03result_tsu/images/num{{(int) substr($item['NIRENTAN'],1,1)}}.png" alt="{{(int) substr($item['NIRENTAN'],1,1)}}" />
            @endif
        </td>
    @endforeach
    
    @foreach($nirenfuku_array as $item)
        <td>
            @if($fuseiritu_array[3] == 1)
                {{--不成立--}}
                不成立
            @elseif(!$item['NIRENFUKU_MONEY'] )
                {{--金額無し--}}
                --
            @elseif($item['NIRENFUKU_MONEY'] == '70')
                {{--特払い--}}
                特払い
            @else
                {{--通常--}}
                <img src="/03result_tsu/images/num{{(int) substr($item['NIRENFUKU'],0,1)}}.png" alt="{{(int) substr($item['NIRENFUKU'],0,1)}}" /><img src="/03result_tsu/images/equal.png" alt="=" /><img src="/03result_tsu/images/num{{(int) substr($item['NIRENFUKU'],1,1)}}.png" alt="{{(int) substr($item['NIRENFUKU'],1,1)}}" />
            @endif
        </td>
    @endforeach

</tr>
<tr>
    <td>配当</td>
    @foreach($sanrentan_array as $item)
        <td>
            @if($fuseiritu_array[4] == 1)
                {{--不成立--}}
                ---円
            @elseif(!$item['SANRENTAN_MONEY'] )
                {{--金額無し--}}
                &nbsp;
            @else
                {{--通常--}}
                {{number_format($item['SANRENTAN_MONEY'])}}円
            @endif
        </td>
    @endforeach
    
    @foreach($sanrenfuku_array as $item)
        <td>
            @if($fuseiritu_array[5] == 1)
                {{--不成立--}}
                ---円
            @elseif(!$item['SANRENFUKU_MONEY'] )
                {{--金額無し--}}
                &nbsp;
            @else
                {{--通常--}}
                {{number_format($item['SANRENFUKU_MONEY'])}}円
            @endif
        </td>
    @endforeach

    @foreach($nirentan_array as $item)
        <td>
            @if($fuseiritu_array[2] == 1)
                {{--不成立--}}
                ---円
            @elseif(!$item['NIRENTAN_MONEY'] )
                {{--金額無し--}}
                &nbsp;
            @else
                {{--通常--}}
                {{number_format($item['NIRENTAN_MONEY'])}}円
            @endif
        </td>
    @endforeach
    
    @foreach($nirenfuku_array as $item)
        <td>
            @if($fuseiritu_array[3] == 1)
                {{--不成立--}}
                ---円
            @elseif(!$item['NIRENFUKU_MONEY'] )
                {{--金額無し--}}
                &nbsp;
            @else
                {{--通常--}}
                {{number_format($item['NIRENFUKU_MONEY'])}}円
            @endif
        </td>
    @endforeach
</tr>
<tr>
    <td>人気</td>
    @foreach($sanrentan_array as $item)
        <td>
            @if($fuseiritu_array[4] == 1)
                {{--不成立--}}
                ---
            @elseif(!$item['SANRENTAN_MONEY'] )
                {{--金額無し--}}
                &nbsp;
            @else
                {{--通常--}}
                {{ $item['SANRENTAN_NINKI'] }}
            @endif
        </td>
    @endforeach

    @foreach($sanrenfuku_array as $item)
        <td>
            @if($fuseiritu_array[5] == 1)
                {{--不成立--}}
                ---
            @elseif(!$item['SANRENFUKU_MONEY'] )
                {{--金額無し--}}
                &nbsp;
            @else
                {{--通常--}}
                {{ $item['SANRENFUKU_NINKI'] }}
            @endif
        </td>
    @endforeach

    @foreach($nirentan_array as $item)
        <td>
            @if($fuseiritu_array[4] == 1)
                {{--不成立--}}
                ---
            @elseif(!$item['NIRENTAN_MONEY'] )
                {{--金額無し--}}
                &nbsp;
            @else
                {{--通常--}}
                {{ $item['NIRENTAN_NINKI'] }}
            @endif
        </td>
    @endforeach

    @foreach($nirenfuku_array as $item)
        <td>
            @if($fuseiritu_array[5] == 1)
                {{--不成立--}}
                ---
            @elseif(!$item['NIRENFUKU_MONEY'] )
                {{--金額無し--}}
                &nbsp;
            @else
                {{--通常--}}
                {{ $item['NIRENFUKU_NINKI'] }}
            @endif
        </td>
    @endforeach
</tr>
</table>
</div><!--/m01-->


<div id="m02">
<table>
<tr>
<th>&nbsp;</th>
@if(count($kakurenfuku_array) > 3)
    <th colspan="{{count($kakurenfuku_array)}}">拡連複</th>
@else
    <th colspan="3">拡連複</th>
@endif

<th colspan="{{count($tansyo_array)}}">単勝</th>

@if(count($fukusyo_array) > 3)
    <th colspan="{{count($fukusyo_array)}}">複勝</th>
@else
    <th colspan="2">複勝</th>
@endif
</tr>
<tr>
<td>組番</td>
    @foreach($kakurenfuku_array as $item)
        <td>
            @if($fuseiritu_array[6] == 1)
                {{--不成立--}}
                不成立
            @elseif(!$item['KAKURENFUKU_MONEY'] )
                {{--金額無し--}}
                --
            @elseif($item['KAKURENFUKU_MONEY'] == '70')
                {{--特払い--}}
                特払い
            @else
                {{--通常--}}
                <img src="/03result_tsu/images/num{{(int) substr($item['KAKURENFUKU'],0,1)}}.png" alt="{{(int) substr($item['KAKURENFUKU'],0,1)}}" /><img src="/03result_tsu/images/equal.png" alt="=" /><img src="/03result_tsu/images/num{{(int) substr($item['KAKURENFUKU'],1,1)}}.png" alt="{{(int) substr($item['KAKURENFUKU'],1,1)}}" />
            @endif
        </td>
    @endforeach

    @foreach($tansyo_array as $item)
        <td>
            @if($fuseiritu_array[0] == 1)
                {{--不成立--}}
                不成立
            @elseif(!$item['TANSYO_MONEY'] )
                {{--金額無し--}}
                --
            @elseif($item['TANSYO_MONEY'] == '70')
                {{--特払い--}}
                特払い
            @else
                {{--通常--}}
                <img src="/03result_tsu/images/num{{ (int)$item['TANSYO'] }}.png" alt="{{ (int)$item['TANSYO'] }}" />
            @endif
        </td>
    @endforeach

    @foreach($fukusyo_array as $item)
        <td>
            @if($fuseiritu_array[1] == 1)
                {{--不成立--}}
                不成立
            @elseif(!$item['FUKUSYO_MONEY'] )
                {{--金額無し--}}
                --
            @elseif($item['FUKUSYO_MONEY'] == '70')
                {{--特払い--}}
                特払い
            @else
                {{--通常--}}
                <img src="/03result_tsu/images/num{{ (int)$item['FUKUSYO'] }}.png" alt="{{ (int)$item['FUKUSYO'] }}" />
            @endif
        </td>
    @endforeach
</tr>
<tr>
<td>配当</td>

    @foreach($kakurenfuku_array as $item)
        <td>
            @if($fuseiritu_array[6] == 1)
                {{--不成立--}}
                ---円
            @elseif(!$item['KAKURENFUKU_MONEY'] )
                {{--金額無し--}}
                &nbsp;
            @else
                {{--通常--}}
                {{number_format($item['KAKURENFUKU_MONEY'])}}円
            @endif
        </td>
    @endforeach

    @foreach($tansyo_array as $item)
        <td>
            @if($fuseiritu_array[0] == 1)
                {{--不成立--}}
                ---円
            @elseif(!$item['TANSYO_MONEY'] )
                {{--金額無し--}}
                &nbsp;
            @else
                {{--通常--}}
                {{number_format($item['TANSYO_MONEY'])}}円
            @endif
        </td>
    @endforeach

    @foreach($fukusyo_array as $item)
        <td>
            @if($fuseiritu_array[1] == 1)
                {{--不成立--}}
                ---円
            @elseif(!$item['FUKUSYO_MONEY'] )
                {{--金額無し--}}
                &nbsp;
            @else
                {{--通常--}}
                {{number_format($item['FUKUSYO_MONEY'])}}円
            @endif
        </td>
    @endforeach
</tr>
<tr>
    <td>人気</td>
    @foreach($kakurenfuku_array as $item)
        <td>
            @if($fuseiritu_array[6] == 1)
                {{--不成立--}}
                ---
            @elseif(!$item['KAKURENFUKU_MONEY'] )
                {{--金額無し--}}
                &nbsp;
            @else
                {{--通常--}}
                {{ $item['KAKURENFUKU_NINKI'] ?? '-' }}
            @endif
        </td>
    @endforeach

    @foreach($tansyo_array as $item)
        <td>
            @if($fuseiritu_array[0] == 1)
                {{--不成立--}}
                ---
            @elseif(!$item['TANSYO_MONEY'] )
                {{--金額無し--}}
                &nbsp;
            @else
                {{--通常--}}
                -
            @endif
        </td>
    @endforeach

    @foreach($fukusyo_array as $item)
        <td>
            @if($fuseiritu_array[1] == 1)
                {{--不成立--}}
                ---
            @elseif(!$item['FUKUSYO_MONEY'] )
                {{--金額無し--}}
                &nbsp;
            @else
                {{--通常--}}
                -
            @endif
        </td>
    @endforeach

</tr>
</table>
</div><!--/m02-->

<!--free text-->
<div id="txt"></div>

</div><!--/main-->


</div>
<!--/wrapper-->
</body>
</html>
