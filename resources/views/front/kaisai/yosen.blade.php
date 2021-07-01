
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>得点率情報</title>

<link href="/kaisai/css/reset.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/common.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/yosen.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

</head>

<body>

<!--▼▼▼yosen-->  	
<div id="yosen">

<h2>得点率情報</h2>



<div id="yosen">


<p class="yosen">【@isset($kaisai_date_label_list[$yesterday_date]){{$kaisai_date_label_list[$yesterday_date]}}@endisset<span class="date">({{date('n/j',strtotime($yesterday_date))}})</span>終了時点】</p>
<p class="note">※優勝戦日の前日まで更新。</p>

<table class="day7">
<tr>
<th rowspan="2">順<br>
  位</th>
<th rowspan="2">登番</th>
<th rowspan="2">選手名</th>
<th rowspan="2">級別</th>
<th rowspan="2">得点率</th>
<th rowspan="2">出走<br>
回数</th>
<th colspan="3" class="T">得減点</th>
<th colspan="14" class="T">日別成績</th>
<th colspan="2" rowspan="2">備考</th>
</tr>
<tr>
<th class="B">得点</th>
<th class="B">減点</th>
<th class="B">計</th>
@for($i=0;$i<=6;$i++)
    @isset($kaisai_date_list[$i])
        <th colspan="2" class="motor B">{{$kaisai_date_label_list[$kaisai_date_list[$i]] ?? ""}}</th>
    @else
        <th colspan="2" class="motor B">&nbsp;</th>
    @endisset
@endfor
</tr>

@foreach($tokutenritu as $item)
    <tr>
        <td class="rank">{{$item->RANK}}</td>
        <td class="number">{{$item->TOUBAN}}</td>
        <td class="name">{{$syussou_array[$item->TOUBAN]->SENSYU_NAME ?? ""}}@if(($syussou_array[$item->TOUBAN]->SEX ?? "") == 2)<img src="/kaisai/images/ico_lady.png" alt=""/>@endif</td>
        <td class="class">{{$syussou_array[$item->TOUBAN]->KYU_BETU ?? ""}}</td>
        <td class="rate">{{$item->TOKUTENRITU}}</td>
        <td class="kaisu">{{$item->SYUSSOU_COUNT}}</td>
        <td class="ten">{{$item->TOKUTEN}}</td>
        <td class="ten">@if($item->GENTEN){{$item->GENTEN}}@endif</td>
        <td class="ten">{{$item->TOKUTEN_TOTAL}}</td>
        
        @isset($syussou_array[$item->TOUBAN])
            @if( $syussou_array[$item->TOUBAN]->KONSETU11_DATE != "" && $target_date > $syussou_array[$item->TOUBAN]->KONSETU11_DATE)
                <td class="seiseki_L">{{$syussou_array[$item->TOUBAN]->KONSETU11_TYAKUJUN}}</td>
                <td class="seiseki_R">{{$syussou_array[$item->TOUBAN]->KONSETU12_TYAKUJUN}}</td>
            @else
                <td class="seiseki_L">　</td>
                <td class="seiseki_R">　</td>
            @endif
            @if( $syussou_array[$item->TOUBAN]->KONSETU21_DATE != "" && $target_date > $syussou_array[$item->TOUBAN]->KONSETU21_DATE)
                <td class="seiseki_L">{{$syussou_array[$item->TOUBAN]->KONSETU21_TYAKUJUN}}</td>
                <td class="seiseki_R">{{$syussou_array[$item->TOUBAN]->KONSETU22_TYAKUJUN}}</td>
            @else
                <td class="seiseki_L">　</td>
                <td class="seiseki_R">　</td>
            @endif
            @if( $syussou_array[$item->TOUBAN]->KONSETU31_DATE != "" && $target_date > $syussou_array[$item->TOUBAN]->KONSETU31_DATE)
                <td class="seiseki_L">{{$syussou_array[$item->TOUBAN]->KONSETU31_TYAKUJUN}}</td>
                <td class="seiseki_R">{{$syussou_array[$item->TOUBAN]->KONSETU32_TYAKUJUN}}</td>
            @else
                <td class="seiseki_L">　</td>
                <td class="seiseki_R">　</td>
            @endif
            @if( $syussou_array[$item->TOUBAN]->KONSETU41_DATE != "" && $target_date > $syussou_array[$item->TOUBAN]->KONSETU41_DATE)
                <td class="seiseki_L">{{$syussou_array[$item->TOUBAN]->KONSETU41_TYAKUJUN}}</td>
                <td class="seiseki_R">{{$syussou_array[$item->TOUBAN]->KONSETU42_TYAKUJUN}}</td>
            @else
                <td class="seiseki_L">　</td>
                <td class="seiseki_R">　</td>
            @endif
            @if( $syussou_array[$item->TOUBAN]->KONSETU51_DATE != "" && $target_date > $syussou_array[$item->TOUBAN]->KONSETU51_DATE)
                <td class="seiseki_L">{{$syussou_array[$item->TOUBAN]->KONSETU51_TYAKUJUN}}</td>
                <td class="seiseki_R">{{$syussou_array[$item->TOUBAN]->KONSETU52_TYAKUJUN}}</td>
            @else
                <td class="seiseki_L">　</td>
                <td class="seiseki_R">　</td>
            @endif
            @if( $syussou_array[$item->TOUBAN]->KONSETU61_DATE != "" && $target_date > $syussou_array[$item->TOUBAN]->KONSETU61_DATE)
                <td class="seiseki_L">{{$syussou_array[$item->TOUBAN]->KONSETU61_TYAKUJUN}}</td>
                <td class="seiseki_R">{{$syussou_array[$item->TOUBAN]->KONSETU62_TYAKUJUN}}</td>
            @else
                <td class="seiseki_L">　</td>
                <td class="seiseki_R">　</td>
            @endif
            @if( $syussou_array[$item->TOUBAN]->KONSETU71_DATE != "" && $target_date > $syussou_array[$item->TOUBAN]->KONSETU71_DATE)
                <td class="seiseki_L">{{$syussou_array[$item->TOUBAN]->KONSETU71_TYAKUJUN}}</td>
                <td class="seiseki_R">{{$syussou_array[$item->TOUBAN]->KONSETU72_TYAKUJUN}}</td>
            @else
                <td class="seiseki_L">　</td>
                <td class="seiseki_R">　</td>
            @endif

        @else
            <td class="seiseki_L">　</td>
            <td class="seiseki_R">　</td>
            <td class="seiseki_L">　</td>
            <td class="seiseki_R">　</td>
            <td class="seiseki_L">　</td>
            <td class="seiseki_R">　</td>
            <td class="seiseki_L">　</td>
            <td class="seiseki_R">　</td>
            <td class="seiseki_L">　</td>
            <td class="seiseki_R">　</td>
            <td class="seiseki_L">　</td>
            <td class="seiseki_R">　</td>
            <td class="seiseki_L">　</td>
            <td class="seiseki_R">　</td>
        @endisset
        <td class="biko01">{{$item->BIKOU}}</td>
        <td class="biko02">{{$item->BIKOU2}}</td>
    </tr>
@endforeach

</table>

<div id="memo">
日別成績 ＞＞ <span class="jun">○</span>：準優出、<span class="yu">●</span>：優出 
</div><!--/memo-->
<div class="clear"></div>

</div><!--yosen end-->
</body>
</html>
