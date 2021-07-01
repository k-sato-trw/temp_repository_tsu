

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Refresh" CONTENT="30; URL=/asp/kyogi/09/pc/odds03/odds03{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">
<title>オッズ・2連単／複･単勝･複勝･拡連複</title>

<link href="/kaisai/css/reset.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/common.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/syusso.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/odds.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="/kaisai/js/jquery-1.8.2.min.js"></script>


<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="/asp/kyogi/09/pc/Jsinfo.js"></script>
</head>

<body>


<div id="main_menu">
<div id="date_btn">

<div id="date">
<div id="date_l"><script type="text/javascript">
	func_Backbtn('{{$target_date}}' , 'odds03' );
</script>
</div><!--/#date_l-->
<div id="date_c">
    @if($kaisai_master)
        @if(($chushi_junen->中止開始レース番号 ?? 99) <= $race_num)
            中止
        @else
            @if($kaisai_master->開始日付 == $target_date)
                初日
            @elseif($kaisai_master->終了日付 == $target_date)
                最終日                
            @else
                {{$race_header->KAISAI_DAYS}}日目
            @endif
        @endif
    @endif
<span class="date">>{{ date('n/j',strtotime($target_date)) }}</span></div><!--/#date_c-->
<div id="date_r"><script type="text/javascript">
	func_Nextbtn('{{$target_date}}' , 'odds03' );
</script>
</div><!--/#date_r-->
<div class="clear"></div>
</div><!--/#date-->

</div><!--/#date_btn-->

<div id="race_btn">
<ul>
<script type="text/javascript">
func_RaceNumList('{{$target_date}}' , {{$race_num}}, 'odds03' );
</script>
<div class="clear"></div>
</ul>
</div><!--/#race_btn-->
<div class="clear"></div>
</div><!--/#main_menu-->

<div id="race_info">
<div id="name">{{ $syussou[1]->RACE_NAME ?? "" }}</div>
<div id="time">発売締切<span>{{substr($shimekiri_jikoku,0,2)}}:{{substr($shimekiri_jikoku,2,2)}}</span></div>
<div class="clear"></div>
</div><!--/#race_info-->


<div id="main_race">
<div id="main_race_l"><a href="/asp/kyogi/09/pc/odds02/odds02{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">前へ</a></div><!--/#main_race_l-->

<!-----------------------------------
▼オッズ -->
<div id="odds">
<!-----------------------------------
▼メインメニュー -->
<ul id="race_btn_main">
<li id="btn01"><a href="/asp/kyogi/09/pc/syusso01/syusso01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">出走表</a></li>
<li id="btn02" class="select">オッズ</li>
<li id="btn03"><a href="/asp/kyogi/09/pc/yoso01/yoso01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">レース予想</a></li>
<li id="btn04"><a href="/asp/kyogi/09/pc/st01/st01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">スタ展・直前情報</a></li>
<li id="btn05"><a href="/asp/kyogi/09/pc/kekka01/kekka01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">レース結果</a></li>
<div class="clear"></div>
</ul>

<!-----------------------------------
▼タブ -->
<div id="tab">
<ul id="tab_odds">
<li><a href="/asp/kyogi/09/pc/odds01/odds01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">3連単／複</a></li>
<li><a href="/asp/kyogi/09/pc/odds02/odds02{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">3連単検索</a></li>
<li class="select">2連単／複･単勝･複勝･拡連複</li>
<li><a href="/asp/kyogi/09/pc/odds04/odds04{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">3連単／2連単ランキング</a></li>
<div class="clear"></div>
</ul>
</div><!--/#tab-->



@if($kaisai_master && $bairitu_2rentan)
    @if( ($chushi_junen->中止開始レース番号 ?? 99) <= $race_num )
        {{--中止の場合--}}
        <div class="cont_odds2">
            <table class="ta_kyogi">
                <tr>
                    @if($chushi_junen->中止開始レース番号 > 0 )
                        <td class="cyushi">第{{$chushi_junen->中止開始レース番号}}R以降は中止となりました</td>
                    @else
                        <td class="cyushi">中止となりました</td>
                    @endif
                </tr>
            </table>
        </div>

    @elseif( $shimekiri_jikoku <= $target_time )  
        {{--締切時間経過の場合--}}
        <div class="cont_odds2">
            <table class="ta_kyogi">
                <tr>
                    <td class="nodata">オッズの表示は終了しました</td>
                </tr>
            </table>
        </div>
    @else

        <!-----------------------------------
        ▼2連単 -->
        <div class="cont_odds">
        <!-----------------------------------
        ▼2連単 -->
        <div id="rentan2">
        <h1><img src="/kaisai/images/odds_h05.png" alt="2連単" width="88" height="26"></h1>

        <table class="ta_odds_2tan">
        <tr>
        <th colspan="3" class="name w1"><span class="waku01">1</span><span class="name">{{$syussou[1]->SENSYU_NAME}}@if($syussou[1]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</span></th>
        <th colspan="3" class="name w2"><span class="waku01">2</span><span class="name">{{$syussou[2]->SENSYU_NAME}}@if($syussou[2]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</span></th>
        <th colspan="3" class="name w3"><span class="waku01">3</span><span class="name">{{$syussou[3]->SENSYU_NAME}}@if($syussou[3]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</span></th>
        </tr>
        <tr>
            <td rowspan="5" class="waku w1">&nbsp;</td>
            <td class="waku w2 bt01">2</td>
            <td class="odds01 bt01">{{$bairitu_2rentan[1][2]}}</td>
            <td rowspan="5" class="waku w2">&nbsp;</td>
            <td class="waku w1 bt01">1</td>
            <td class="odds02 bt01">{{$bairitu_2rentan[2][1]}}</td>
            <td rowspan="5" class="waku w3">&nbsp;</td>
            <td class="waku w1 bt01">1</td>
            <td class="odds01 bt01">{{$bairitu_2rentan[3][1]}}</td>
        </tr>
        <tr>
            <td class="waku w3">3</td>
            <td class="odds01">{{$bairitu_2rentan[1][3]}}</td>
            <td class="waku w3">3</td>
            <td class="odds02">{{$bairitu_2rentan[2][3]}}</td>
            <td class="waku w2">2</td>
            <td class="odds01">{{$bairitu_2rentan[3][2]}}</td>
        </tr>
        <tr>
            <td class="waku w4">4</td>
            <td class="odds01">{{$bairitu_2rentan[1][4]}}</td>
            <td class="waku w4">4</td>
            <td class="odds02">{{$bairitu_2rentan[2][4]}}</td>
            <td class="waku w4">4</td>
            <td class="odds01">{{$bairitu_2rentan[3][4]}}</td>
        </tr>
        <tr>
            <td class="waku w5">5</td>
            <td class="odds01">{{$bairitu_2rentan[1][5]}}</td>
            <td class="waku w5">5</td>
            <td class="odds02">{{$bairitu_2rentan[2][5]}}</td>
            <td class="waku w5">5</td>
            <td class="odds01">{{$bairitu_2rentan[3][5]}}</td>
        </tr>
        <tr>
            <td class="waku w6">6</td>
            <td class="odds01">{{$bairitu_2rentan[1][6]}}</td>
            <td class="waku w6">6</td>
            <td class="odds02">{{$bairitu_2rentan[2][6]}}</td>
            <td class="waku w6">6</td>
            <td class="odds01">{{$bairitu_2rentan[3][6]}}</td>
        </tr>
        <tr>
        <th colspan="3" class="name w4"><span class="waku01">4</span><span class="name">{{$syussou[4]->SENSYU_NAME}}@if($syussou[4]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</span></th>
        <th colspan="3" class="name w5"><span class="waku01">5</span><span class="name">{{$syussou[5]->SENSYU_NAME}}@if($syussou[5]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</span></th>
        <th colspan="3" class="name w6"><span class="waku01">6</span><span class="name">{{$syussou[6]->SENSYU_NAME}}@if($syussou[6]->sex == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子"/>@endif</span></th>
        </tr>
        <tr>
            <td rowspan="5" class="waku w4">&nbsp;</td>
            <td class="waku w1 bt01">1</td>
            <td class="odds02 bt01">{{$bairitu_2rentan[4][1]}}</td>
            <td rowspan="5" class="waku w5">&nbsp;</td>
            <td class="waku w1 bt01">1</td>
            <td class="odds01 bt01">{{$bairitu_2rentan[5][1]}}</td>
            <td rowspan="5" class="waku w6">&nbsp;</td>
            <td class="waku w1 bt01">1</td>
            <td class="odds02 bt01">{{$bairitu_2rentan[6][1]}}</td>
        </tr>
        <tr>
            <td class="waku w2">2</td>
            <td class="odds02">{{$bairitu_2rentan[4][2]}}</td>
            <td class="waku w2">2</td>
            <td class="odds01">{{$bairitu_2rentan[5][2]}}</td>
            <td class="waku w2">2</td>
            <td class="odds02">{{$bairitu_2rentan[6][2]}}</td>
        </tr>
        <tr>
            <td class="waku w3">3</td>
            <td class="odds02">{{$bairitu_2rentan[4][3]}}</td>
            <td class="waku w3">3</td>
            <td class="odds01">{{$bairitu_2rentan[5][3]}}</td>
            <td class="waku w3">3</td>
            <td class="odds02">{{$bairitu_2rentan[6][3]}}</td>
        </tr>
        <tr>
            <td class="waku w5">5</td>
            <td class="odds02">{{$bairitu_2rentan[4][5]}}</td>
            <td class="waku w4">4</td>
            <td class="odds01">{{$bairitu_2rentan[5][4]}}</td>
            <td class="waku w4">4</td>
            <td class="odds02">{{$bairitu_2rentan[6][4]}}</td>
        </tr>
        <tr>
            <td class="waku w6">6</td>
            <td class="odds02">{{$bairitu_2rentan[4][6]}}</td>
            <td class="waku w6">6</td>
            <td class="odds01">{{$bairitu_2rentan[5][6]}}</td>
            <td class="waku w5">5</td>
            <td class="odds02">{{$bairitu_2rentan[6][5]}}</td>
        </tr>
        </table>
        <div class="clear"></div>
        </div><!--/#rentan2-->

        <!-----------------------------------
        ▼2連複 -->
        <div id="renpuku2">
        <h1><img src="/kaisai/images/odds_h06.png" alt="2連複" width="88" height="26"></h1>
        <table class="ta_odds_2puku">
        <tr>
            <td rowspan="5" class="waku01 w1 bottom">1</td>
            <td class="waku02 w1">2</td>
            <td class="odds01">{{$bairitu_2renpuku[1][2]}}</td>
        </tr>
        <tr>
            <td class="waku02 w1">3</td>
            <td class="odds01">{{$bairitu_2renpuku[1][3]}}</td>
        </tr>
        <tr>
            <td class="waku02 w1">4</td>
            <td class="odds01">{{$bairitu_2renpuku[1][4]}}</td>
        </tr>
        <tr>
            <td class="waku02 w1">5</td>
            <td class="odds01">{{$bairitu_2renpuku[1][5]}}</td>
        </tr>
        <tr>
            <td class="waku02 w1 bottom">6</td>
            <td class="odds01 bottom">{{$bairitu_2renpuku[1][6]}}</td>
        </tr>
        <tr>
            <td rowspan="4" class="waku01 w2 bottom">2</td>
            <td class="waku02 w2">3</td>
            <td class="odds02">{{$bairitu_2renpuku[2][3]}}</td>
        </tr>
        <tr>
            <td class="waku02 w2">4</td>
            <td class="odds02">{{$bairitu_2renpuku[2][4]}}</td>
        </tr>
        <tr>
            <td class="waku02 w2">5</td>
            <td class="odds02">{{$bairitu_2renpuku[2][5]}}</td>
        </tr>
        <tr>
            <td class="waku02 w2 bottom">6</td>
            <td class="odds02 bottom">{{$bairitu_2renpuku[2][6]}}</td>
        </tr>
        <tr>
            <td rowspan="3" class="waku01 w3 bottom">3</td>
            <td class="waku02 w3">4</td>
            <td class="odds01">{{$bairitu_2renpuku[3][4]}}</td>
        </tr>
        <tr>
            <td class="waku02 w3">5</td>
            <td class="odds01">{{$bairitu_2renpuku[3][5]}}</td>
        </tr>
        <tr>
            <td class="waku02 w3 bottom">6</td>
            <td class="odds01 bottom">{{$bairitu_2renpuku[3][6]}}</td>
        </tr>
        <tr>
            <td rowspan="2" class="waku01 w4 bottom">4</td>
            <td class="waku02 w4">5</td>
            <td class="odds02">{{$bairitu_2renpuku[4][5]}}</td>
        </tr>
        <tr>
            <td class="waku02 w4 bottom">6</td>
            <td class="odds02 bottom">{{$bairitu_2renpuku[4][6]}}</td>
        </tr>
        <tr>
            <td class="waku01 w5 bottom">5</td>
            <td class="waku02 w5 bottom">6</td>
            <td class="odds01 bottom">{{$bairitu_2renpuku[5][6]}}</td>
        </tr>
        </table>
        </div><!--/#renpuku2-->

        <!-----------------------------------
        ▼単勝・複勝 -->
        <div id="tanpuku">
        <table class="ta_odds_tansyo">
        <!-- ▼枠▼ -->
        <tr>
        <th>　</th>
        <th class="header"><img src="/kaisai/images/odds_h07.png" alt="単勝" width="60" height="26"></th>
        <th class="blank"></th>
        <th class="header"><img src="/kaisai/images/odds_h08.png" alt="複勝" width="60" height="26"></th>
        </tr>
        <!-- ▼枠▼ -->
        <tr>
            <td class="waku w1">1</td>
            <td class="tan odds01">{{$bairitu_tansyo[1]}}</td>
            <td class="blank"></td>
            <td class="fuku odds01">{{$bairitu_fukusyo[1]}}</td>
        </tr>
        <!-- ▼枠▼ -->
        <tr>
            <td class="waku w2">2</td>
            <td class="tan odds02">{{$bairitu_tansyo[2]}}</td>
            <td class="blank"></td>
            <td class="fuku odds02">{{$bairitu_fukusyo[2]}}</td>
        </tr>
        <!-- ▼枠▼ -->
        <tr>
            <td class="waku w3">3</td>
            <td class="tan odds01">{{$bairitu_tansyo[3]}}</td>
            <td class="blank"></td>
            <td class="fuku odds01">{{$bairitu_fukusyo[3]}}</td>
        </tr>
        <!-- ▼枠▼ -->
        <tr>
            <td class="waku w4">4</td>
            <td class="tan odds02">{{$bairitu_tansyo[4]}}</td>
            <td class="blank"></td>
            <td class="fuku odds02">{{$bairitu_fukusyo[4]}}</td>
        </tr>
        <!-- ▼枠▼ -->
        <tr>
            <td class="waku w5">5</td>
            <td class="tan odds01">{{$bairitu_tansyo[5]}}</td>
            <td class="blank"></td>
            <td class="fuku odds01">{{$bairitu_fukusyo[5]}}</td>
        </tr>
        <!-- ▼枠▼ -->
        <tr>
            <td class="waku w6 bottom">6</td>
            <td class="tan odds02 bottom">{{$bairitu_tansyo[6]}}</td>
            <td class="blank"></td>
            <td class="fuku odds02 bottom">{{$bairitu_fukusyo[6]}}</td>
        </tr>
        </table>
        </div><!--/#tanpuku-->

        <!-----------------------------------
        ▼拡連複 -->
        <div id="kakuren">
        <h1><img src="/kaisai/images/odds_h09.png" alt="拡連複" width="88" height="26"></h1>
        <table class="ta_odds_kakuren">
            <tr>
                <td rowspan="5" class="waku01 w1 bottom">1</td>
                <td class="waku02 w2">2</td>
                <td class="odds01">{{$bairitu_kakurenpuku[1][2]}}</td>
            </tr>
            <tr>
                <td class="waku02 w3">3</td>
                <td class="odds01">{{$bairitu_kakurenpuku[1][3]}}</td>
            </tr>
            <tr>
                <td class="waku02 w4">4</td>
                <td class="odds01">{{$bairitu_kakurenpuku[1][4]}}</td>
            </tr>
            <tr>
                <td class="waku02 w5">5</td>
                <td class="odds01">{{$bairitu_kakurenpuku[1][5]}}</td>
            </tr>
            <tr>
                <td class="waku02 w6 bottom">6</td>
                <td class="odds01 bottom">{{$bairitu_kakurenpuku[1][6]}}</td>
            </tr>
            <tr>
                <td rowspan="4" class="waku01 w2 bottom">2</td>
                <td class="waku02 w3">3</td>
                <td class="odds02">{{$bairitu_kakurenpuku[2][3]}}</td>
            </tr>
            <tr>
                <td class="waku02 w4">4</td>
                <td class="odds02">{{$bairitu_kakurenpuku[2][4]}}</td>
            </tr>
            <tr>
                <td class="waku02 w5">5</td>
                <td class="odds02">{{$bairitu_kakurenpuku[2][5]}}</td>
            </tr>
            <tr>
                <td class="waku02 w6 bottom">6</td>
                <td class="odds02 bottom">{{$bairitu_kakurenpuku[2][6]}}</td>
            </tr>
            <tr>
                <td rowspan="3" class="waku01 w3 bottom">3</td>
                <td class="waku02 w4">4</td>
                <td class="odds01">{{$bairitu_kakurenpuku[3][4]}}</td>
            </tr>
            <tr>
                <td class="waku02 w5">5</td>
                <td class="odds01">{{$bairitu_kakurenpuku[3][5]}}</td>
            </tr>
            <tr>
                <td class="waku02 w6 bottom">6</td>
                <td class="odds01 bottom">{{$bairitu_kakurenpuku[3][6]}}</td>
            </tr>
            <tr>
                <td rowspan="2" class="waku01 w4 bottom">4</td>
                <td class="waku02 w5">5</td>
                <td class="odds02">{{$bairitu_kakurenpuku[4][5]}}</td>
            </tr>
            <tr>
                <td class="waku02 w6 bottom">6</td>
                <td class="odds02 bottom">{{$bairitu_kakurenpuku[4][6]}}</td>
            </tr>
            <tr>
                <td class="waku01 w5 bottom">5</td>
                <td class="waku02 w6 bottom">6</td>
                <td class="odds01 bottom">{{$bairitu_kakurenpuku[5][6]}}</td>
            </tr>
        </table>
        </div><!--/#kakuren-->

        <div class="clear"></div>
        </div><!--/#cont_odds-->

    @endif
@else
    <table class="ta_kyogi">
        <tr>
        <td class="nodata">ただいまデータはございません</td>
        </tr>
    </table>
@endif

</div><!--/#odds-->
<div id="main_race_r"><a href="/asp/kyogi/09/pc/odds04/odds04{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">次へ</a></div><!--/#main_race_r-->
<div class="clear"></div>
</div><!--/#main_race-->




</body>
</html>
