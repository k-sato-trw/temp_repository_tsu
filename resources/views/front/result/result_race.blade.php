@inject('general', 'App\Services\GeneralService')
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">

<title>ボートレース津｜レース結果検索</title>

<meta name="Keywords" content="BOAT RACE津,津,着順,出目,結果,払い戻し">
<meta name="Description" content="BOAT RACE津の開催レースを、当日から60日間遡って節間の結果がご覧いただけます。">
 

<!---外部読み込み--->
<link href="/css/03result_data1.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">

<link href="/css/03result.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="/js/jquery.min.js"></script>

<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<script type="text/javascript">
function funcRaceSelect( argNum ){
	parent.document.getElementById( 'race_data2' ).src='/asp/tsu/03result_tsu/result_detail.asp?yd={{$target_date}}&racenum=' + argNum;

}
</script>
<body>

<div id="result_main2">
<!--◆◆◆レース名◆◆◆-->
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
<span class="race_name">
<p>
{{$kaisai_master->開催名称}}
@foreach ($chushi_junen_array as $item)
    <span class="tyushi">※{{ date('n/j',$item->中止日付) }}は中止となりました。</span>
@endforeach
</p>
</span>

<div class="clear"></div>
</div><!--/#result_rn-->     
        
<div id="result_wrap">       

<div id="race_date1">
<ul class="d06">
    @foreach ($kaisai_date_list as $kaisai_date => $display_date)
        @if($target_date == $kaisai_date)
            <li><div class="d_select"><a href="result_race.asp?yd={{$kaisai_date}}"><p>{{$display_date}}</p>{{ date('n/j',strtotime($kaisai_date)) }}({{ $general->week_label(date('w',strtotime($kaisai_date))) }})</a><div class="d_select"></li>
        @else
            <li><a href="result_race.asp?yd={{$kaisai_date}}"><p>{{$display_date}}</p>{{ date('n/j',strtotime($kaisai_date)) }}({{ $general->week_label(date('w',strtotime($kaisai_date))) }})</a></li>
        @endif
    @endforeach
</ul>
<span class="dco1"></span>
</div><!--/#race_date1-->

<!--free text-->
<!--<div id="result_txt">フリーテキストスペース</div>-->

<div id="result_data">
<table>
<tr>
<th class="ttl01">レース</th>
<th colspan="2" class="ttl02"><img src="/03result_tsu/images/h_ttl_3t.png" alt="3連単" width="60" height="25" /></th>
<th colspan="2" class="ttl03"><img src="/03result_tsu/images/h_ttl_3p.png" alt="3連複" width="60" height="25" /></th>
<th colspan="2" class="ttl04"><img src="/03result_tsu/images/h_ttl_2t.png" alt="2連単" width="60" height="25" /></th>
<th colspan="2" class="ttl05"><img src="/03result_tsu/images/h_ttl_2p.png" alt="2連複" width="60" height="25" /></th>
</tr>

@foreach ($kekka_info_today_all as  $item)
    <?php
        if($item->RACE_NUMBER % 2 == 0){
            $strClassName = "odd_r";
			$strClassName2 = "bg_o";
        }else{
            $strClassName = "even_r";
			$strClassName2 = "bg_e";
        }
    ?>
    <!--{{$item->RACE_NUMBER}}R-->
    @if($stop_race_num == $item->RACE_NUMBER)
        <tr>
            <td colspan="8" class="{{ $strClassName2 }}"><span class="date_cyushi">第{{$item->RACE_NUMBER}}レース以降は中止となりました</span></td>
        </tr>
    @elseif($stop_race_num < $item->RACE_NUMBER)

    @else
        <tr>
            <td class="{{ $strClassName }} col-1"><div class="r{{str_pad($item->RACE_NUMBER, 2, 0, STR_PAD_LEFT)}}">
                @if($item->SANRENTAN_MONEY1)
                    <a href="javascript:void(0)" onClick="funcRaceSelect( '{{$item->RACE_NUMBER}}' )">{{$item->RACE_NUMBER}}R</a>
                @else
                    {{$item->RACE_NUMBER}}R
                @endif
            </div></td>
            <td class="{{ $strClassName2 }}">
                @if(substr($item->FUSEIRITU,4,1) == 1)
                    {{--不成立--}}
                    不成立
                @elseif(!$item->SANRENTAN_MONEY1)
                    {{--金額無し--}}
                    &nbsp;
                @elseif($item->SANRENTAN_MONEY1 == '70')
                    {{--特払い--}}
                    特払い
                @else
                    {{--通常--}}
                    <img src="/03result_tsu/images/num{{ substr($item->SANRENTAN1,0,1) }}.png" alt="{{ substr($item->SANRENTAN1,0,1) }}" /><img src="/03result_tsu/images/num.png" alt="=" /><img src="/03result_tsu/images/num{{ substr($item->SANRENTAN1,1,1) }}.png" alt="{{ substr($item->SANRENTAN1,1,1) }}" /><img src="/03result_tsu/images/num.png" alt="=" /><img src="/03result_tsu/images/num{{ substr($item->SANRENTAN1,2,1) }}.png" alt="{{ substr($item->SANRENTAN1,2,1) }}" />
                @endif
            </td>
            <td class="{{ $strClassName2 }} col-3">
                @if(substr($item->FUSEIRITU,4,1) == 1)
                    {{--不成立--}}
                    ---円
                @elseif(!$item->SANRENTAN_MONEY1)
                    {{--金額無し--}}
                    &nbsp;
                @else
                    {{--金額有り--}}
                    {{ number_format($item->SANRENTAN_MONEY1) }}円
                @endif
            </td>
            <td class="{{ $strClassName2 }}">
                @if(substr($item->FUSEIRITU,5,1) == 1)
                    {{--不成立--}}
                    不成立
                @elseif(!$item->SANRENFUKU_MONEY1)
                    {{--金額無し--}}
                    &nbsp;
                @elseif($item->SANRENFUKU_MONEY1 == '70')
                    {{--特払い--}}
                    特払い
                @else
                    {{--通常--}}
                    <img src="/03result_tsu/images/num{{ substr($item->SANRENFUKU1,0,1) }}.png" alt="{{ substr($item->SANRENFUKU1,0,1) }}" /><img src="/03result_tsu/images/equal.png" alt="=" /><img src="/03result_tsu/images/num{{ substr($item->SANRENFUKU1,1,1) }}.png" alt="{{ substr($item->SANRENFUKU1,1,1) }}" /><img src="/03result_tsu/images/equal.png" alt="=" /><img src="/03result_tsu/images/num{{ substr($item->SANRENFUKU1,2,1) }}.png" alt="{{ substr($item->SANRENFUKU1,2,1) }}" />
                @endif
            </td>
            <td class="{{ $strClassName2 }} col-5">
                @if(substr($item->FUSEIRITU,5,1) == 1)
                    {{--不成立--}}
                    ---円
                @elseif(!$item->SANRENFUKU_MONEY1)
                    {{--金額無し--}}
                    &nbsp;
                @else
                    {{--金額有り--}}
                    {{ number_format($item->SANRENFUKU_MONEY1) }}円
                @endif
            </td>
            <td class="{{ $strClassName2 }}">
                @if(substr($item->FUSEIRITU,2,1) == 1)
                    {{--不成立--}}
                    不成立
                @elseif(!$item->NIRENTAN_MONEY1)
                    {{--金額無し--}}
                    &nbsp;
                @elseif($item->NIRENTAN_MONEY1 == '70')
                    {{--特払い--}}
                    特払い
                @else
                    {{--通常--}}
                    <img src="/03result_tsu/images/num{{ substr($item->NIRENTAN1,0,1) }}.png" alt="{{ substr($item->NIRENTAN1,0,1) }}" /><img src="/03result_tsu/images/num.png" alt="-" /><img src="/03result_tsu/images/num{{ substr($item->NIRENTAN1,1,1) }}.png" alt="{{ substr($item->NIRENTAN1,1,1) }}" />
                @endif
            </td>
            <td class="{{ $strClassName2 }} col-7">
                @if(substr($item->FUSEIRITU,2,1) == 1)
                    {{--不成立--}}
                    ---円
                @elseif(!$item->NIRENTAN_MONEY1)
                    {{--金額無し--}}
                    &nbsp;
                @else
                    {{--金額有り--}}
                    {{ number_format($item->NIRENTAN_MONEY1) }}円
                @endif
            </td>
            <td class="{{ $strClassName2 }}">
                @if(substr($item->FUSEIRITU,3,1) == 1)
                    {{--不成立--}}
                    不成立
                @elseif(!$item->NIRENFUKU_MONEY1)
                    {{--金額無し--}}
                    &nbsp;
                @elseif($item->NIRENFUKU_MONEY1 == '70')
                    {{--特払い--}}
                    特払い
                @else
                    {{--通常--}}
                    <img src="/03result_tsu/images/num{{ substr($item->NIRENFUKU1,0,1) }}.png" alt="{{ substr($item->NIRENFUKU1,0,1) }}" /><img src="/03result_tsu/images/equal.png" alt="=" /><img src="/03result_tsu/images/num{{ substr($item->NIRENFUKU1,1,1) }}.png" alt="{{ substr($item->NIRENFUKU1,1,1) }}" />
                @endif
            </td>
            <td class="{{ $strClassName2 }}">
                @if(substr($item->FUSEIRITU,3,1) == 1)
                    {{--不成立--}}
                    ---円
                @elseif(!$item->NIRENFUKU_MONEY1)
                    {{--金額無し--}}
                    &nbsp;
                @else
                    {{--金額有り--}}
                    {{ number_format($item->NIRENFUKU_MONEY1) }}円
                @endif
            </td>
        </tr>
    @endif
@endforeach

</table>

<div class="sub_text">レース番号をクリックすると詳細結果がご覧いただけます。
</div>



</div><!--/#result_data-->
</div><!--/#result_wrap-->
</div><!--/#result_main-->

</body>
</html>
