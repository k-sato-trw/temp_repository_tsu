
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>今節レース結果一覧</title>

<link href="/kaisai/css/reset.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/common.css" rel="stylesheet" type="text/css">

<link href="/kaisai/css/setsu_kekka.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/asp/kyogi/09/pc/setu_kekka/setu_kekka.js"></script>
<script type="text/javascript">
	function funcload(){  
	}
</script>
</head>

<body onload="javascript:funcload();">

<!--setsu_kekka_main-->  	
<div id="setsu_kekka_main">

<h2>今節レース結果一覧</h2>
			<script type="text/javascript">
            func_Setu_Chushi();
            </script>


<div id="s_kekka_btn">
<ul>
			<script type="text/javascript">
            func_Setu_kekkaDate('{{$target_date}}');
            </script>
</ul>
</div><!-- /s_kekka_btn -->

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ta_kyogi">
<tr class="ta_bg"></tr>
<tr>
  <th>&ensp;</th>
  <th>3連単</th>
  <th>2連単</th>
  <th colspan="2">1着</th>
  <th colspan="2">2着</th>
  <th colspan="2">3着</th>

</tr>
@for($race_num = 1; $race_num <= 12;$race_num++)
    @isset($kekka_info_today_all[$race_num - 1])
        <?php $item = $kekka_info_today_all[$race_num - 1]; ?>

        @if(($chushi_junen->中止開始レース ?? 99) == 0 || ($chushi_junen->中止開始レース ?? 99) == $item->RACE_NUMBER)
            {{--中止開始レースの時--}}
                @if($chushi_junen->中止開始レース == 0)
                    <tr class="ta_bg">
                        <td rowspan="1" class="rk_race">1R</td>
                        <td colspan="8" rowspan="12" class="tyusi">中止となりました</td>
                    </tr>
                @else
                    <tr class="ta_bg">
                        <td rowspan="1" class="rk_race">{{ $item->RACE_NUMBER }}R</td>
                        <td colspan="8" rowspan="12" class="tyusi">{{ $item->RACE_NUMBER }}R以降は中止となりました</td>
                    </tr>
                @endif
            
        @elseif(($chushi_junen->中止開始レース ?? 99) < $item->RACE_NUMBER)
            {{--中止レース(開始レースではない)--}}
            <!--ta_bg2_※背景色なし--> 
            <tr class="ta_bg">
                <td rowspan="1" class="rk_race">{{$race_num}}R</td>
            </tr>
            
        @else
            {{--通常処理--}}
            @if($item->SANRENTAN_MONEY1 && $item->SANRENTAN_MONEY2)
                {{--同着あり--}}
                <tr class="ta_bg">
                    <td rowspan="1" class="rk_race">{{$race_num}}R</td>
                    <td colspan="2" class="kumi3">同着あり</td>
                    <td class="waku_d">-</td>
                    <td class="rk_name">---</td>
                    <td class="waku_d">-</td>
                    <td class="rk_name">---</td>
                    <td class="waku_d">-</td>
                    <td class="rk_name">---</td>
                </tr>

            @elseif(substr($item->FUSEIRITU,4,1) == 1)
                {{--不成立--}}
                <tr class="ta_bg">
                    <td rowspan="1" class="rk_race">{{$race_num}}R</td>
                    <td colspan="2" class="kumi3">不成立</td>
                    <td class="waku_d">-</td>
                    <td class="rk_name">---</td>
                    <td class="waku_d">-</td>
                    <td class="rk_name">---</td>
                    <td class="waku_d">-</td>
                    <td class="rk_name">---</td>
                </tr>

            @else
                <!--ta_bg2_※背景色なし--> 
                <tr class="ta_bg">
                    <td rowspan="1" class="rk_race">{{$race_num}}R</td>
                    <td rowspan="1" class="rk_3ren"><span class="w{{(int) substr($item->SANRENTAN1,0,1)}} waku_s">{{(int) substr($item->SANRENTAN1,0,1)}}</span>-<span class="w{{(int) substr($item->SANRENTAN1,1,1)}} waku_s">{{(int) substr($item->SANRENTAN1,1,1)}}</span>-<span class="w{{(int) substr($item->SANRENTAN1,2,1)}} waku_s">{{(int) substr($item->SANRENTAN1,2,1)}}</span><div class="haito"><span>{{number_format($item->SANRENTAN_MONEY1)}}</span>円</div>
                    </td>
                    <td rowspan="1" class="rk_2ren"><span class="w{{(int) substr($item->NIRENTAN1,0,1)}} waku_s">{{(int) substr($item->NIRENTAN1,0,1)}}</span>-<span class="w{{(int) substr($item->NIRENTAN1,1,1)}} waku_s">{{(int) substr($item->NIRENTAN1,1,1)}}</span><div class="haito"><span>{{number_format($item->NIRENTAN_MONEY1)}}</span>円</div>
                    
                    <td class="w{{(int) substr($item->SANRENTAN1,0,1)}} waku_d2">{{(int) substr($item->SANRENTAN1,0,1)}}</td>
                    <td class="rk_name">{{$syussou[$race_num][substr($item->SANRENTAN1,0,1)]->SENSYU_NAME}}</td>
                    <td class="w{{(int) substr($item->SANRENTAN1,1,1)}} waku_d2">{{(int) substr($item->SANRENTAN1,1,1)}}</td>
                    <td class="rk_name">{{$syussou[$race_num][substr($item->SANRENTAN1,1,1)]->SENSYU_NAME}}</td>
                    <td class="w{{(int) substr($item->SANRENTAN1,2,1)}} waku_d2">{{(int) substr($item->SANRENTAN1,2,1)}}</td>
                    <td class="rk_name">{{$syussou[$race_num][substr($item->SANRENTAN1,2,1)]->SENSYU_NAME}}</td>
                </tr>
            @endif

        @endif
    @else
        <!--ta_bg2_※背景色なし--> 
        <tr class="ta_bg">
            <td rowspan="1" class="rk_race">{{$race_num}}R</td>
            <td rowspan="1" class="rk_3ren">---</td>
            <td rowspan="1" class="rk_2ren">---</td>
            <td class="waku_d">-</td>
            <td class="rk_name">---</td>
            <td class="waku_d">-</td>
            <td class="rk_name">---</td>
            <td class="waku_d">-</td>
            <td class="rk_name">---</td>
        </tr>
    @endisset

    
@endfor

</table>
</div><!--setsu_kekka_main-->

</body>
</html>
