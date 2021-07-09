
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta name="format-detection" content="telephone=no"/>
<meta name="viewport" content="user-scalable=no">

<title>競技情報｜ボートレース津</title>
<meta name="Keywords" content="BOAT RACE津,ボートレース,津,ライブ,リプレイ,予想,動画" />
<meta name="Description" content="BOAT RACE津が開催するレースの動画（ライブおよびリプレイ）をはじめ出走表など各種情報、予想に役立つデータを掲載しています。" />

<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/sp/kyogi/css/reset.css" />
<link rel="stylesheet" href="/sp/kyogi/css/kyogi.css" />
<link rel="stylesheet" href="/sp/kyogi/css/custom.css" />
<link rel="stylesheet" href="/sp/kyogi/css/yosen.css" />

<script type="text/javascript" src="/sp/js/jquery-1.8.3.min.js"></script>

<!-- ビューポート設定 -->
<script type="text/javascript" src="/sp/js/monaca.viewport.js"></script>
<script type="text/javascript">
monaca.viewport({
    width : 720
});
</script>

<!-- 共通 -->
<script type="text/javascript" src="/sp/kyogi/js/common.js"></script>

<!-- アコーディオン -->
<script type="text/javascript" src="/sp/kyogi/js/jquery.accordion.js"></script>

<!-- フォーム -->


<script type="text/javascript" src="/asp/SmartAgentGetter.js"></script>
<script type="text/javascript" src="/asp/FlashPlayerCheck.js"></script>
<script type="text/javascript" src="/sp/js/data_navi.js"></script>
</head>


<body>

<div id="wrapper"><!-- wrapper start -->


<div id="header"><!-- header start -->

<h1><a href="/sp/"><div>BOAT RACE 津 09#</div></a></h1>

<ul id="header_nav">

<li id="live"><a href="movie_live.asp?jyo=09"><div>ライブ</div></a></li>
<li id="replay"><a href="/sp/kyogi/replay.htm"><div>リプレイ</div></a></li>
<li id="vote"><a href="/asp/log/tsu_sp_kyogi.asp" target="_blank"><div>投票する</div></a></li>

</ul>


</div><!-- header end -->


<div id="main"><!-- main start -->



<div id="race">

<table>
<tr>
<td class="date">{{ date('n/j',strtotime($target_date)) }}</td>
<td class="name">{{$kaisai_master->開催名称}}</td>
<td class="day">
    @if($kaisai_master->開始日付 == $target_date)
        初日
    @elseif($kaisai_master->終了日付 == $target_date)
        最終日                
    @else
        {{$race_header->KAISAI_DAYS}}日目
    @endif
</td>
</tr>
</table>

</div>






<div id="race_select">
<div id="yosen_title">
得点率情報
</div>

</div>







<div class="data"><!-- data start -->


<div id="yosen">
<p class="memo">※優勝戦日の前日まで更新。</p>


<p class="yosen">【@isset($kaisai_date_label_list[$yesterday_date]){{$kaisai_date_label_list[$yesterday_date]}}@endisset<span class="date">({{date('n/j',strtotime($yesterday_date))}})</span>終了時点】</p>

<table>
<tr>
<th rowspan="2">順<br>位</th>
<th rowspan="2">登番</th>
<th rowspan="2">選手名</th>
<th rowspan="2">級<br>別</th>
<th rowspan="2">得点率</th>
<th colspan="7" class="T">日別成績</th>
</tr>
<tr>
    @for($i=0;$i<=6;$i++)
        @isset($kaisai_date_list[$i])
            <th class="motor B">{{$kaisai_date_label_list[$kaisai_date_list[$i]] ?? ""}}</th>
        @else
            <th class="motor B">&nbsp;</th>
        @endisset
    @endfor
</tr>
@foreach($tokutenritu as $item)
    <tr>
        <td rowspan="2" class="rank">{{$item->RANK}}</td>
        <td rowspan="2" class="number">{{$item->TOUBAN}}@if(($syussou_array[$item->TOUBAN]->SEX ?? "") == 2)<br><img src="/sp/kaisai/images/ico_lady.png"  width="24" class="i_lady" />@endif</td>
        <td rowspan="2" class="name">{{ str_replace('　','',$syussou_array[$item->TOUBAN]->SENSYU_NAME)}}</td>
        <td rowspan="2" class="class">{{$syussou_array[$item->TOUBAN]->KYU_BETU ?? ""}}</td>
        <td rowspan="2" class="rate">{{$item->TOKUTENRITU}}</td>

        @isset($syussou_array[$item->TOUBAN])
            @if( $syussou_array[$item->TOUBAN]->KONSETU11_DATE != "" )
                <td class="seiseki_T">{{$syussou_array[$item->TOUBAN]->KONSETU11_TYAKUJUN}}</td>
            @else
                <td class="seiseki_T"></td>
            @endif
            @if( $syussou_array[$item->TOUBAN]->KONSETU21_DATE != "" )
                <td class="seiseki_T">{{$syussou_array[$item->TOUBAN]->KONSETU21_TYAKUJUN}}</td>
            @else
                <td class="seiseki_T">　</td>
            @endif
            @if( $syussou_array[$item->TOUBAN]->KONSETU31_DATE != "" )
                <td class="seiseki_T">{{$syussou_array[$item->TOUBAN]->KONSETU31_TYAKUJUN}}</td>
            @else
                <td class="seiseki_T">　</td>
            @endif
            @if( $syussou_array[$item->TOUBAN]->KONSETU41_DATE != "" )
                <td class="seiseki_T">{{$syussou_array[$item->TOUBAN]->KONSETU41_TYAKUJUN}}</td>
            @else
                <td class="seiseki_T">　</td>
            @endif
            @if( $syussou_array[$item->TOUBAN]->KONSETU51_DATE != "" )
                <td class="seiseki_T">{{$syussou_array[$item->TOUBAN]->KONSETU51_TYAKUJUN}}</td>
            @else
                <td class="seiseki_T">　</td>
            @endif
            @if( $syussou_array[$item->TOUBAN]->KONSETU61_DATE != "" )
                <td class="seiseki_T">{{$syussou_array[$item->TOUBAN]->KONSETU61_TYAKUJUN}}</td>
            @else
                <td class="seiseki_T">　</td>
            @endif
            @if( $syussou_array[$item->TOUBAN]->KONSETU71_DATE != "" )
                <td class="seiseki_T">{{$syussou_array[$item->TOUBAN]->KONSETU71_TYAKUJUN}}</td>
            @else
                <td class="seiseki_T">　</td>
            @endif

        @else
            <td class="seiseki_T"></td>
            <td class="seiseki_T"></td>
            <td class="seiseki_T"></td>
            <td class="seiseki_T"></td>
            <td class="seiseki_T"></td>
            <td class="seiseki_T"></td>
            <td class="seiseki_T"></td>
        @endisset
    </tr>
    <tr>
        @isset($syussou_array[$item->TOUBAN])
            @if( $syussou_array[$item->TOUBAN]->KONSETU12_DATE != "" )
                <td class="seiseki_B">{{$syussou_array[$item->TOUBAN]->KONSETU12_TYAKUJUN}}</td>
            @else
                <td class="seiseki_B"></td>
            @endif
            @if( $syussou_array[$item->TOUBAN]->KONSETU22_DATE != "" )
                <td class="seiseki_B">{{$syussou_array[$item->TOUBAN]->KONSETU22_TYAKUJUN}}</td>
            @else
                <td class="seiseki_B">　</td>
            @endif
            @if( $syussou_array[$item->TOUBAN]->KONSETU32_DATE != "" )
                <td class="seiseki_B">{{$syussou_array[$item->TOUBAN]->KONSETU32_TYAKUJUN}}</td>
            @else
                <td class="seiseki_B">　</td>
            @endif
            @if( $syussou_array[$item->TOUBAN]->KONSETU42_DATE != "" )
                <td class="seiseki_B">{{$syussou_array[$item->TOUBAN]->KONSETU42_TYAKUJUN}}</td>
            @else
                <td class="seiseki_B">　</td>
            @endif
            @if( $syussou_array[$item->TOUBAN]->KONSETU52_DATE != "" )
                <td class="seiseki_B">{{$syussou_array[$item->TOUBAN]->KONSETU52_TYAKUJUN}}</td>
            @else
                <td class="seiseki_B">　</td>
            @endif
            @if( $syussou_array[$item->TOUBAN]->KONSETU62_DATE != "" )
                <td class="seiseki_B">{{$syussou_array[$item->TOUBAN]->KONSETU62_TYAKUJUN}}</td>
            @else
                <td class="seiseki_B">　</td>
            @endif
            @if( $syussou_array[$item->TOUBAN]->KONSETU72_DATE != "" )
                <td class="seiseki_B">{{$syussou_array[$item->TOUBAN]->KONSETU72_TYAKUJUN}}</td>
            @else
                <td class="seiseki_B">　</td>
            @endif

        @else
            <td class="seiseki_B"></td>
            <td class="seiseki_B"></td>
            <td class="seiseki_B"></td>
            <td class="seiseki_B"></td>
            <td class="seiseki_B"></td>
            <td class="seiseki_B"></td>
            <td class="seiseki_B"></td>
        @endisset
    </tr>
@endforeach

</table>

<div id="memo">
日別成績 ＞＞ <span class="jun">○</span>：準優出、<span class="yu">●</span>：優出 
</div><!--/memo-->
<div class="clear"></div>

<p id="note">遠藤晃司:帰郷、荒川健太:賞除、江夏満:4-12R不良航法、川島圭司:帰郷、岡祐臣:2-4R不良航法、眞鳥章太:1-8R不良航法 2-1R待機行動違、中野孝二:帰郷</p>


</div>



</div><!-- data end -->








<!-- データリンク -->
<script type="text/javascript">
	funcTsuDataMenu();
</script>


</div><!-- main end -->


<div id="footer"><!-- footer start -->

<div id="page_top"><a href="#wrapper">▲ページ上部へ</a></div>

<div id="b_top">

<a href="/asp/tsu/sp/kyogi/index.asp?jyo=09">データ＆予想</a>
</div>

<div id="copyright"><a href="/sp/">
<div>&copy;BOAT RACE TSU All rights reserved.</div>
</a></div>

</div><!-- footer end -->


</div><!-- wrapper end -->



</body>

</html>
