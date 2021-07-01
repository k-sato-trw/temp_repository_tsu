
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Refresh" CONTENT="30; URL=/asp/kyogi/09/pc/odds01/odds01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">
<title>オッズ・3連単／複</title>

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
	func_Backbtn('{{$target_date}}' , 'odds01' );
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
<span class="date">{{ date('n/j',strtotime($target_date)) }}</span></div><!--/#date_c-->
<div id="date_r"><script type="text/javascript">
	func_Nextbtn('{{$target_date}}' , 'odds01' );
</script>
</div><!--/#date_r-->
<div class="clear"></div>
</div><!--/#date-->

</div><!--/#date_btn-->

<div id="race_btn">
<ul>
<script type="text/javascript">
func_RaceNumList('{{$target_date}}' , {{$race_num}}, 'odds01' );
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
<div id="main_race_l"><a href="/asp/kyogi/09/pc/syusso04/syusso04{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">前へ</a></div><!--/#main_race_l-->

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
<li class="select">3連単／複</li>
<li><a href="/asp/kyogi/09/pc/odds02/odds02{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">3連単検索</a></li>
<li><a href="/asp/kyogi/09/pc/odds03/odds03{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">2連単／複･単勝･複勝･拡連複</a></li>
<li><a href="/asp/kyogi/09/pc/odds04/odds04{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">3連単／2連単ランキング</a></li>
<div class="clear"></div>
</ul>
</div><!--/#tab-->

@if($kaisai_master && $bairitu_3rentan)
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
        ▼3連単 -->
        <div class="cont_odds">
        <div id="tan3">
        <h1><img src="/kaisai/images/odds_h01.png" alt="3連単" width="110" height="26"></h1>
        <table class="ta_odds_3tan">
            <tr>
                @foreach($syussou as $teiban => $item)
                    <th colspan="3" class="w{{$teiban}}" scope="col"><span class="waku">{{$teiban}}</span><span class="@if(mb_strlen($item->SENSYU_NAME >= 6)){{'name6'}}@else{{'name'}}@endif">{{$item->SENSYU_NAME}}@if($item->SEX == 2)<img src="/kaisai/images/ico_lady.png" width="10" alt="女子">@endif</span></th>
                @endforeach
            </tr>
            <tr>
                <td rowspan="4" class="waku01 w2 bottom">2</td>
                <td class="waku02 w2">3</td>
                <td class="odds01">{{$bairitu_3rentan[1][2][3]}}</td>
                <td rowspan="4" class="waku01 w1 bottom">1</td>
                <td class="waku02 w1">3</td>
                <td class="odds01">{{$bairitu_3rentan[2][1][3]}}</td>
                <td rowspan="4" class="waku01 w1 bottom">1</td>
                <td class="waku02 w1">2</td>
                <td class="odds01">{{$bairitu_3rentan[3][1][2]}}</td>
                <td rowspan="4" class="waku01 w1 bottom">1</td>
                <td class="waku02 w1">2</td>
                <td class="odds01">{{$bairitu_3rentan[4][1][2]}}</td>
                <td rowspan="4" class="waku01 w1 bottom">1</td>
                <td class="waku02 w1">2</td>
                <td class="odds01">{{$bairitu_3rentan[5][1][2]}}</td>
                <td rowspan="4" class="waku01 w1 bottom">1</td>
                <td class="waku02 w1">2</td>
                <td class="odds01">{{$bairitu_3rentan[6][1][2]}}</td>
            </tr>
            <tr>
                <td class="waku02 w2">4</td>
                <td class="odds01">{{$bairitu_3rentan[1][2][4]}}</td>
                <td class="waku02 w1">4</td>
                <td class="odds01">{{$bairitu_3rentan[2][1][4]}}</td>
                <td class="waku02 w1">4</td>
                <td class="odds01">{{$bairitu_3rentan[3][1][4]}}</td>
                <td class="waku02 w1">3</td>
                <td class="odds01">{{$bairitu_3rentan[4][1][3]}}</td>
                <td class="waku02 w1">3</td>
                <td class="odds01">{{$bairitu_3rentan[5][1][3]}}</td>
                <td class="waku02 w1">3</td>
                <td class="odds01">{{$bairitu_3rentan[6][1][3]}}</td>
            </tr>
            <tr>
                <td class="waku02 w2">5</td>
                <td class="odds01">{{$bairitu_3rentan[1][2][5]}}</td>
                <td class="waku02 w1">5</td>
                <td class="odds01">{{$bairitu_3rentan[2][1][5]}}</td>
                <td class="waku02 w1">5</td>
                <td class="odds01">{{$bairitu_3rentan[3][1][5]}}</td>
                <td class="waku02 w1">5</td>
                <td class="odds01">{{$bairitu_3rentan[4][1][5]}}</td>
                <td class="waku02 w1">4</td>
                <td class="odds01">{{$bairitu_3rentan[5][1][4]}}</td>
                <td class="waku02 w1">4</td>
                <td class="odds01">{{$bairitu_3rentan[6][1][4]}}</td>
            </tr>
            <tr>
                <td class="waku02 w2 bottom">6</td>
                <td class="odds01 bottom">{{$bairitu_3rentan[1][2][6]}}</td>
                <td class="waku02 w1 bottom">6</td>
                <td class="odds01 bottom">{{$bairitu_3rentan[2][1][6]}}</td>
                <td class="waku02 w1 bottom">6</td>
                <td class="odds01 bottom">{{$bairitu_3rentan[3][1][6]}}</td>
                <td class="waku02 w1 bottom">6</td>
                <td class="odds01 bottom">{{$bairitu_3rentan[4][1][6]}}</td>
                <td class="waku02 w1 bottom">6</td>
                <td class="odds01 bottom">{{$bairitu_3rentan[5][1][6]}}</td>
                <td class="waku02 w1 bottom">5</td>
                <td class="odds01 bottom">{{$bairitu_3rentan[6][1][5]}}</td>
            </tr>
            <tr>
                <td rowspan="4" class="waku01 w3 bottom">3</td>
                <td class="waku02 w3">2</td>
                <td class="odds02">{{$bairitu_3rentan[1][3][2]}}</td>
                <td rowspan="4" class="waku01 w3 bottom">3</td>
                <td class="waku02 w3">1</td>
                <td class="odds02">{{$bairitu_3rentan[2][3][1]}}</td>
                <td rowspan="4" class="waku01 w2 bottom">2</td>
                <td class="waku02 w2">1</td>
                <td class="odds02">{{$bairitu_3rentan[3][2][1]}}</td>
                <td rowspan="4" class="waku01 w2 bottom">2</td>
                <td class="waku02 w2">1</td>
                <td class="odds02">{{$bairitu_3rentan[4][2][1]}}</td>
                <td rowspan="4" class="waku01 w2 bottom">2</td>
                <td class="waku02 w2">1</td>
                <td class="odds02">{{$bairitu_3rentan[5][2][1]}}</td>
                <td rowspan="4" class="waku01 w2 bottom">2</td>
                <td class="waku02 w2">1</td>
                <td class="odds02">{{$bairitu_3rentan[6][2][1]}}</td>
            </tr>
            
            <tr>
                <td class="waku02 w3">4</td>
                <td class="odds02">{{$bairitu_3rentan[1][3][4]}}</td>
                <td class="waku02 w3">4</td>
                <td class="odds02">{{$bairitu_3rentan[2][3][4]}}</td>
                <td class="waku02 w2">4</td>
                <td class="odds02">{{$bairitu_3rentan[3][2][4]}}</td>
                <td class="waku02 w2">3</td>
                <td class="odds02">{{$bairitu_3rentan[4][2][3]}}</td>
                <td class="waku02 w2">3</td>
                <td class="odds02">{{$bairitu_3rentan[5][2][3]}}</td>
                <td class="waku02 w2">3</td>
                <td class="odds02">{{$bairitu_3rentan[6][2][3]}}</td>
            </tr>
            <tr>
                <td class="waku02 w3">5</td>
                <td class="odds02">{{$bairitu_3rentan[1][3][5]}}</td>
                <td class="waku02 w3">5</td>
                <td class="odds02">{{$bairitu_3rentan[2][3][5]}}</td>
                <td class="waku02 w2">5</td>
                <td class="odds02">{{$bairitu_3rentan[3][2][5]}}</td>
                <td class="waku02 w2">5</td>
                <td class="odds02">{{$bairitu_3rentan[4][2][5]}}</td>
                <td class="waku02 w2">4</td>
                <td class="odds02">{{$bairitu_3rentan[5][2][4]}}</td>
                <td class="waku02 w2">4</td>
                <td class="odds02">{{$bairitu_3rentan[6][2][4]}}</td>
            </tr>
            <tr>
                <td class="waku02 w3 bottom">6</td>
                <td class="odds02 bottom">{{$bairitu_3rentan[1][3][6]}}</td>
                <td class="waku02 w3 bottom">6</td>
                <td class="odds02 bottom">{{$bairitu_3rentan[2][3][6]}}</td>
                <td class="waku02 w2 bottom">6</td>
                <td class="odds02 bottom">{{$bairitu_3rentan[3][2][6]}}</td>
                <td class="waku02 w2 bottom">6</td>
                <td class="odds02 bottom">{{$bairitu_3rentan[4][2][6]}}</td>
                <td class="waku02 w2 bottom">6</td>
                <td class="odds02 bottom">{{$bairitu_3rentan[5][2][6]}}</td>
                <td class="waku02 w2 bottom">5</td>
                <td class="odds02 bottom">{{$bairitu_3rentan[6][2][5]}}</td>
            </tr>
            <tr>
                <td rowspan="4" class="waku01 w4 bottom">4</td>
                <td class="waku02 w4">2</td>
                <td class="odds01">{{$bairitu_3rentan[1][4][2]}}</td>
                <td rowspan="4" class="waku01 w4 bottom">4</td>
                <td class="waku02 w4">1</td>
                <td class="odds01">{{$bairitu_3rentan[2][4][1]}}</td>
                <td rowspan="4" class="waku01 w4 bottom">4</td>
                <td class="waku02 w4">1</td>
                <td class="odds01">{{$bairitu_3rentan[3][4][1]}}</td>
                <td rowspan="4" class="waku01 w3 bottom">3</td>
                <td class="waku02 w3">1</td>
                <td class="odds01">{{$bairitu_3rentan[4][3][1]}}</td>
                <td rowspan="4" class="waku01 w3 bottom">3</td>
                <td class="waku02 w3">1</td>
                <td class="odds01">{{$bairitu_3rentan[5][3][1]}}</td>
                <td rowspan="4" class="waku01 w3 bottom">3</td>
                <td class="waku02 w3">1</td>
                <td class="odds01">{{$bairitu_3rentan[6][3][1]}}</td>
            </tr>
            <tr>
                <td class="waku02 w4">3</td>
                <td class="odds01">{{$bairitu_3rentan[1][4][3]}}</td>
                <td class="waku02 w4">3</td>
                <td class="odds01">{{$bairitu_3rentan[2][4][3]}}</td>
                <td class="waku02 w4">2</td>
                <td class="odds01">{{$bairitu_3rentan[3][4][2]}}</td>
                <td class="waku02 w3">2</td>
                <td class="odds01">{{$bairitu_3rentan[4][3][2]}}</td>
                <td class="waku02 w3">2</td>
                <td class="odds01">{{$bairitu_3rentan[5][3][2]}}</td>
                <td class="waku02 w3">2</td>
                <td class="odds01">{{$bairitu_3rentan[6][3][2]}}</td>
            </tr>
            <tr>
                <td class="waku02 w4">5</td>
                <td class="odds01">{{$bairitu_3rentan[1][4][5]}}</td>
                <td class="waku02 w4">5</td>
                <td class="odds01">{{$bairitu_3rentan[2][4][5]}}</td>
                <td class="waku02 w4">5</td>
                <td class="odds01">{{$bairitu_3rentan[3][4][5]}}</td>
                <td class="waku02 w3">5</td>
                <td class="odds01">{{$bairitu_3rentan[4][3][5]}}</td>
                <td class="waku02 w3">4</td>
                <td class="odds01">{{$bairitu_3rentan[5][3][4]}}</td>
                <td class="waku02 w3">4</td>
                <td class="odds01">{{$bairitu_3rentan[6][3][4]}}</td>
            </tr>
            <tr>
                <td class="waku02 w4 bottom">6</td>
                <td class="odds01 bottom">{{$bairitu_3rentan[1][4][6]}}</td>
                <td class="waku02 w4 bottom">6</td>
                <td class="odds01 bottom">{{$bairitu_3rentan[2][4][6]}}</td>
                <td class="waku02 w4 bottom">6</td>
                <td class="odds01 bottom">{{$bairitu_3rentan[3][4][6]}}</td>
                <td class="waku02 w3 bottom">6</td>
                <td class="odds01 bottom">{{$bairitu_3rentan[4][3][6]}}</td>
                <td class="waku02 w3 bottom">6</td>
                <td class="odds01 bottom">{{$bairitu_3rentan[5][3][6]}}</td>
                <td class="waku02 w3 bottom">5</td>
                <td class="odds01 bottom">{{$bairitu_3rentan[6][3][5]}}</td>
            </tr>
            <tr>
                <td rowspan="4" class="waku01 w5 bottom">5</td>
                <td class="waku02 w5">2</td>
                <td class="odds02">{{$bairitu_3rentan[1][5][2]}}</td>
                <td rowspan="4" class="waku01 w5 bottom">5</td>
                <td class="waku02 w5">1</td>
                <td class="odds02">{{$bairitu_3rentan[2][5][1]}}</td>
                <td rowspan="4" class="waku01 w5 bottom">5</td>
                <td class="waku02 w5">1</td>
                <td class="odds02">{{$bairitu_3rentan[3][5][1]}}</td>
                <td rowspan="4" class="waku01 w5 bottom">5</td>
                <td class="waku02 w5">1</td>
                <td class="odds02">{{$bairitu_3rentan[4][5][1]}}</td>
                <td rowspan="4" class="waku01 w4 bottom">4</td>
                <td class="waku02 w4">1</td>
                <td class="odds02">{{$bairitu_3rentan[5][4][1]}}</td>
                <td rowspan="4" class="waku01 w4 bottom">4</td>
                <td class="waku02 w4">1</td>
                <td class="odds02">{{$bairitu_3rentan[6][4][1]}}</td>
            </tr>
            <tr>
                <td class="waku02 w5">3</td>
                <td class="odds02">{{$bairitu_3rentan[1][5][3]}}</td>
                <td class="waku02 w5">3</td>
                <td class="odds02">{{$bairitu_3rentan[2][5][3]}}</td>
                <td class="waku02 w5">2</td>
                <td class="odds02">{{$bairitu_3rentan[3][5][2]}}</td>
                <td class="waku02 w5">2</td>
                <td class="odds02">{{$bairitu_3rentan[4][5][2]}}</td>
                <td class="waku02 w4">2</td>
                <td class="odds02">{{$bairitu_3rentan[5][4][2]}}</td>
                <td class="waku02 w4">2</td>
                <td class="odds02">{{$bairitu_3rentan[6][4][2]}}</td>
            </tr>
            <tr>
                <td class="waku02 w5">4</td>
                <td class="odds02">{{$bairitu_3rentan[1][5][4]}}</td>
                <td class="waku02 w5">4</td>
                <td class="odds02">{{$bairitu_3rentan[2][5][4]}}</td>
                <td class="waku02 w5">4</td>
                <td class="odds02">{{$bairitu_3rentan[3][5][4]}}</td>
                <td class="waku02 w5">3</td>
                <td class="odds02">{{$bairitu_3rentan[4][5][3]}}</td>
                <td class="waku02 w4">3</td>
                <td class="odds02">{{$bairitu_3rentan[5][4][3]}}</td>
                <td class="waku02 w4">3</td>
                <td class="odds02">{{$bairitu_3rentan[6][4][3]}}</td>
            </tr>
            <tr>
                <td class="waku02 w5 bottom">6</td>
                <td class="odds02 bottom">{{$bairitu_3rentan[1][5][6]}}</td>
                <td class="waku02 w5 bottom">6</td>
                <td class="odds02 bottom">{{$bairitu_3rentan[2][5][6]}}</td>
                <td class="waku02 w5 bottom">6</td>
                <td class="odds02 bottom">{{$bairitu_3rentan[3][5][6]}}</td>
                <td class="waku02 w5 bottom">6</td>
                <td class="odds02 bottom">{{$bairitu_3rentan[4][5][6]}}</td>
                <td class="waku02 w4 bottom">6</td>
                <td class="odds02 bottom">{{$bairitu_3rentan[5][4][6]}}</td>
                <td class="waku02 w4 bottom">5</td>
                <td class="odds02 bottom">{{$bairitu_3rentan[6][4][5]}}</td>
            </tr>
            <tr>
                <td rowspan="4" class="waku01 w6 bottom">6</td>
                <td class="waku02 w6">2</td>
                <td class="odds01">{{$bairitu_3rentan[1][6][2]}}</td>
                <td rowspan="4" class="waku01 w6 bottom">6</td>
                <td class="waku02 w6">1</td>
                <td class="odds01">{{$bairitu_3rentan[2][6][1]}}</td>
                <td rowspan="4" class="waku01 w6 bottom">6</td>
                <td class="waku02 w6">1</td>
                <td class="odds01">{{$bairitu_3rentan[3][6][1]}}</td>
                <td rowspan="4" class="waku01 w6 bottom">6</td>
                <td class="waku02 w6">1</td>
                <td class="odds01">{{$bairitu_3rentan[4][6][1]}}</td>
                <td rowspan="4" class="waku01 w6 bottom">6</td>
                <td class="waku02 w6">1</td>
                <td class="odds01">{{$bairitu_3rentan[5][6][1]}}</td>
                <td rowspan="4" class="waku01 w5 bottom">5</td>
                <td class="waku02 w5">1</td>
                <td class="odds01">{{$bairitu_3rentan[6][5][1]}}</td>
            </tr>
            <tr>
                <td class="waku02 w6">3</td>
                <td class="odds01">{{$bairitu_3rentan[1][6][3]}}</td>
                <td class="waku02 w6">3</td>
                <td class="odds01">{{$bairitu_3rentan[2][6][3]}}</td>
                <td class="waku02 w6">2</td>
                <td class="odds01">{{$bairitu_3rentan[3][6][2]}}</td>
                <td class="waku02 w6">2</td>
                <td class="odds01">{{$bairitu_3rentan[4][6][2]}}</td>
                <td class="waku02 w6">2</td>
                <td class="odds01">{{$bairitu_3rentan[5][6][2]}}</td>
                <td class="waku02 w5">2</td>
                <td class="odds01">{{$bairitu_3rentan[6][5][2]}}</td>
            </tr>
            <tr>
                <td class="waku02 w6">4</td>
                <td class="odds01">{{$bairitu_3rentan[1][6][4]}}</td>
                <td class="waku02 w6">4</td>
                <td class="odds01">{{$bairitu_3rentan[2][6][4]}}</td>
                <td class="waku02 w6">4</td>
                <td class="odds01">{{$bairitu_3rentan[3][6][4]}}</td>
                <td class="waku02 w6">3</td>
                <td class="odds01">{{$bairitu_3rentan[4][6][3]}}</td>
                <td class="waku02 w6">3</td>
                <td class="odds01">{{$bairitu_3rentan[5][6][3]}}</td>
                <td class="waku02 w5">3</td>
                <td class="odds01">{{$bairitu_3rentan[6][5][3]}}</td>
            </tr>
            <tr>
                <td class="waku02 w6 bottom">5</td>
                <td class="odds01 bottom">{{$bairitu_3rentan[1][6][5]}}</td>
                <td class="waku02 w6 bottom">5</td>
                <td class="odds01 bottom">{{$bairitu_3rentan[2][6][5]}}</td>
                <td class="waku02 w6 bottom">5</td>
                <td class="odds01 bottom">{{$bairitu_3rentan[3][6][5]}}</td>
                <td class="waku02 w6 bottom">5</td>
                <td class="odds01 bottom">{{$bairitu_3rentan[4][6][5]}}</td>
                <td class="waku02 w6 bottom">4</td>
                <td class="odds01 bottom">{{$bairitu_3rentan[5][6][4]}}</td>
                <td class="waku02 w5 bottom">4</td>
                <td class="odds01 bottom">{{$bairitu_3rentan[6][5][4]}}</td>
            </tr>

        </table>
        </div><!--/#tan3-->


        <!-- ▼3連複▼ -->
        <div id="fuku3">
        <h1><img src="/kaisai/images/odds_h02.png" alt="3連複" width="110" height="26"></h1>
        <table class="ta_odds_3puku">
            <tr>
                <td rowspan="10" class="waku00 w1 bottom">1</td>
                <td rowspan="4" class="waku01 w2 bottom">2</td>
                <td class="waku02 w3">3</td>
                <td class="odds01">{{$bairitu_3renpuku[1][2][3]}}</td>
            </tr>
            <tr>
                <td class="waku02 w4">4</td>
                <td class="odds01">{{$bairitu_3renpuku[1][2][4]}}</td>
            </tr>
            <tr>
                <td class="waku02 w5">5</td>
                <td class="odds01">{{$bairitu_3renpuku[1][2][5]}}</td>
            </tr>
            <tr>
                <td class="waku02 w6 bottom">6</td>
                <td class="odds01 bottom">{{$bairitu_3renpuku[1][2][6]}}</td>
            </tr>
            <tr>
                <td rowspan="3" class="waku01 w3 bottom">3</td>
                <td class="waku02 w4">4</td>
                <td class="odds02">{{$bairitu_3renpuku[1][3][4]}}</td>
            </tr>
            <tr>
                <td class="waku02 w5">5</td>
                <td class="odds02">{{$bairitu_3renpuku[1][3][5]}}</td>
            </tr>
            <tr>
                <td class="waku02 w6 bottom">6</td>
                <td class="odds02 bottom">{{$bairitu_3renpuku[1][3][6]}}</td>
            </tr>
            <tr>
                <td rowspan="2" class="waku01 w4 bottom">4</td>
                <td class="waku02 w5">5</td>
                <td class="odds01">{{$bairitu_3renpuku[1][4][5]}}</td>
            </tr>
            <tr>
                <td class="waku02 w6 bottom">6</td>
                <td class="odds01 bottom">{{$bairitu_3renpuku[1][4][6]}}</td>
            </tr>
            <tr>
                <td rowspan="1" class="waku01 w5 bottom">5</td>
                <td class="waku02 w6 bottom">6</td>
                <td class="odds02 bottom">{{$bairitu_3renpuku[1][5][6]}}</td>
            </tr>
        </table>

        <table class="ta_odds_3puku">
            <tr>
                <td rowspan="6" class="waku00 w2 bottom">2</td>
                <td rowspan="3" class="waku01 w3 bottom">3</td>
                <td class="waku02 w4">4</td>
                <td class="odds01">{{$bairitu_3renpuku[2][3][4]}}</td>
            </tr>
            <tr>
                <td class="waku02 w5">5</td>
                <td class="odds01">{{$bairitu_3renpuku[2][3][5]}}</td>
            </tr>
            <tr>
                <td class="waku02 w6 bottom">6</td>
                <td class="odds01 bottom">{{$bairitu_3renpuku[2][3][6]}}</td>
            </tr>
            <tr>
                <td rowspan="2" class="waku01 w4 bottom">4</td>
                <td class="waku02 w5">5</td>
                <td class="odds02">{{$bairitu_3renpuku[2][4][5]}}</td>
            </tr>
            <tr>
                <td class="waku02 w6 bottom">6</td>
                <td class="odds02 bottom">{{$bairitu_3renpuku[2][4][6]}}</td>
            </tr>
            <tr>
                <td rowspan="1" class="waku01 w5 bottom">5</td>
                <td class="waku02 w6 bottom">6</td>
                <td class="odds01 bottom">{{$bairitu_3renpuku[2][5][6]}}</td>
            </tr>
            <tr>
                <td rowspan="3" class="waku01 w3 bottom">3</td>
                <td rowspan="2" class="waku01 w4 bottom">4</td>
                <td class="waku02 w5">5</td>
                <td class="odds02">{{$bairitu_3renpuku[3][4][5]}}</td>
            </tr>
            <tr>
                <td class="waku02 w6 bottom">6</td>
                <td class="odds02 bottom">{{$bairitu_3renpuku[3][4][6]}}</td>
            </tr>
            <tr>
                <td rowspan="1" class="waku01 w5 bottom">5</td>
                <td class="waku02 w6 bottom">6</td>
                <td class="odds01 bottom">{{$bairitu_3renpuku[3][5][6]}}</td>
            </tr>
            <tr>
                <td rowspan="1" class="waku01 w4 bottom">4</td>
                <td rowspan="1" class="waku01 w5 bottom">5</td>
                <td class="waku02 w6 bottom">6</td>
                <td class="odds02 bottom">{{$bairitu_3renpuku[4][5][6]}}</td>
            </tr>
        </table>
        </div><!--/#fuku3-->

        <div class="clear"></div>
        </div><!--/#cont_odds-->
    @endif
@else
    <div class="cont_odds2">
        <table class="ta_kyogi">
            <tr>
                <td class="nodata">ただいまデータはございません</td>
            </tr>
        </table>
    </div><!--/#cont_odds-->
@endif
</div><!--/#odds-->
<div id="main_race_r"><a href="/asp/kyogi/09/pc/odds02/odds02{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">次へ</a></div><!--/#main_race_r-->
<div class="clear"></div>
</div><!--/#main_race-->




</body>
</html>
