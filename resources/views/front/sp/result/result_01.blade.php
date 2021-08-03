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
<span class="back_b"><a href="/asp/tsu/sp/03result_tsu/03result_tsu.asp">戻る</a></span>
<div class="clear"></div>
</div><!--/#result_tit--> 

<!--◆◆◆レース名◆◆◆-->
<div id="result_kekka_day">{!! $general->create_display_date_short($kaisai_master->開始日付,$kaisai_master->終了日付) !!}</div>
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


<!--◆◆◆コンテンツ◆◆◆-->	
<div id="s_result">


<div id="result01_list">


<div id="day">
<ul class="d06">
    @foreach ($kaisai_date_list as $kaisai_date => $display_date)
        @if($target_date == $kaisai_date)
            <li class="select"><p>{{$display_date}}</p><span>{{ date('n/j',strtotime($kaisai_date)) }}</span></li>
        @else
            <li><a href="03result_01.asp?yd={{$kaisai_date}}"><p>{{$display_date}}</p><span>{{ date('n/j',strtotime($kaisai_date)) }}</span></a></li>
        @endif
    @endforeach
</ul>
</div><!--/day-->



<table>
    <tr>
        <th class="th_col-1">レース<br>番号</th>
        <th class="th_col-2"><img src="/sp/03result_tsu/images/h_ttl_3t.png" width="87" height="38" alt="3連単"/></th>
        <th class="th_col-3"><img src="/sp/03result_tsu/images/h_ttl_2t.png" width="87" height="38" alt="2連単"/></th>
    </tr>
    @foreach ($kekka_info_today_all as  $item)
        @if($stop_race_num == $item->RACE_NUMBER)
            <tr>
                <td class="col-1"><div class="r{{str_pad($item->RACE_NUMBER, 2, 0, STR_PAD_LEFT)}}">{{$item->RACE_NUMBER}}R</div></td>
                <td colspan="2"><span class="date_cyushi">第{{$item->RACE_NUMBER}}R以降は中止となりました。</span></td>
			</tr>
        @elseif($stop_race_num < $item->RACE_NUMBER)

        @else
            <tr>
                <td class="col-1">
                    <a href="03result_02.asp?yd={{$target_date}}&racenum=1"><div class="r{{str_pad($item->RACE_NUMBER, 2, 0, STR_PAD_LEFT)}}">{{$item->RACE_NUMBER}}R</div></a>
                </td>
                <td class="col-2">
                    @if(substr($item->FUSEIRITU,4,1) == 1)
                        {{--不成立--}}
                        不成立
                    @else
                        @if(!$item->SANRENTAN_MONEY2)
                            {{--同着なし--}}

                            {{--通常--}}
                            <div id="h_3ren">
                                <div class="tei">
                                    <span class="t0{{ substr($item->SANRENTAN1,0,1) }}">{{ substr($item->SANRENTAN1,0,1) }}</span><span class="num">-</span><span class="t0{{ substr($item->SANRENTAN1,1,1) }}">{{ substr($item->SANRENTAN1,1,1) }}</span><span class="num">-</span><span class="t0{{ substr($item->SANRENTAN1,2,1) }}">{{ substr($item->SANRENTAN1,2,1) }}</span>
                                </div>
                                <div class="mo">{{ number_format($item->SANRENTAN_MONEY1) }}円</div>
                            </div>                        
                        @else
                            {{--同着あり--}}
                            <div id="h_3ren">
                                <div class="tei">
                                    <span class="t0{{ substr($item->SANRENTAN1,0,1) }}">{{ substr($item->SANRENTAN1,0,1) }}</span><span class="num">-</span><span class="t0{{ substr($item->SANRENTAN1,1,1) }}">{{ substr($item->SANRENTAN1,1,1) }}</span><span class="num">-</span><span class="t0{{ substr($item->SANRENTAN1,2,1) }}">{{ substr($item->SANRENTAN1,2,1) }}</span>
                                </div>
                                <div class="mo">{{ number_format($item->SANRENTAN_MONEY1) }}円</div>
                            </div>
                            <div id="h_3ren">
                                <div class="tei">
                                    <span class="t0{{ substr($item->SANRENTAN2,0,1) }}">{{ substr($item->SANRENTAN2,0,1) }}</span><span class="num">-</span><span class="t0{{ substr($item->SANRENTAN2,1,1) }}">{{ substr($item->SANRENTAN2,1,1) }}</span><span class="num">-</span><span class="t0{{ substr($item->SANRENTAN2,2,1) }}">{{ substr($item->SANRENTAN2,2,1) }}</span>
                                </div>
                                <div class="mo">{{ number_format($item->SANRENTAN_MONEY2) }}円</div>
                            </div>
                            
                        @endif

                    @endif
                </td>
                <td class="col-3">
                    @if(substr($item->FUSEIRITU,2,1) == 1)
                        {{--不成立--}}
                        不成立
                    @else
                        @if(!$item->NIRENTAN_MONEY2)
                            {{--同着なし--}}
                            @if($item->NIRENTAN_MONEY1 == 70)
                                <div id="h_2ren">
                                    <div class="tei">特払</div>
                                    <div class="mo">70円</div>
                                </div>
                            @else
                                <div id="h_2ren">
                                    <div class="tei"><span class="t0{{ substr($item->NIRENTAN1,0,1) }}">{{ substr($item->NIRENTAN1,0,1) }}</span><span class="num">-</span><span class="t0{{ substr($item->NIRENTAN1,1,1) }}">{{ substr($item->NIRENTAN1,1,1) }}</span></div>
                                    <div class="mo">{{ number_format($item->NIRENTAN_MONEY1) }}円</div>
                                </div>
                            @endif
                        @else
                            {{--同着あり--}}
                            <div id="h_2ren">
                                <div class="tei"><span class="t0{{ substr($item->NIRENTAN1,0,1) }}">{{ substr($item->NIRENTAN1,0,1) }}</span><span class="num">-</span><span class="t0{{ substr($item->NIRENTAN1,1,1) }}">{{ substr($item->NIRENTAN1,1,1) }}</span></div>
                                <div class="mo">{{ number_format($item->NIRENTAN_MONEY1) }}円</div>
                            </div>
                            <div id="h_2ren">
                                <div class="tei"><span class="t0{{ substr($item->NIRENTAN2,0,1) }}">{{ substr($item->NIRENTAN2,0,1) }}</span><span class="num">-</span><span class="t0{{ substr($item->NIRENTAN2,1,1) }}">{{ substr($item->NIRENTAN2,1,1) }}</span></div>
                                <div class="mo">{{ number_format($item->NIRENTAN_MONEY2) }}円</div>
                            </div>
                        @endif
                    @endif
                </td>
            </tr>
        @endif
    @endforeach

</table>
<div class="sub_text">レース番号を押すと詳細結果がご覧いただけます。</div>

</div><!--/result01_list-->

</div><!--/#t_result-->
<!--◆◆◆フッター◆◆◆-->
<div id="footer_wrap">
<div id="ft_logo">BOAT RACE TSU</div>
<div id="ft_credit">&copy;BOAT RACE TSU All rights reserved.</div></div>


</div><!--/#wrapper-->

</body>
</html>
