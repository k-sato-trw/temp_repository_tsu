

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Refresh" CONTENT="30; URL=/asp/kyogi/09/pc/odds04/odds04{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">
<title>オッズ・3連単/2連単ランキング</title>

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
	func_Backbtn('{{$target_date}}' , 'odds04' );
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
	func_Nextbtn('{{$target_date}}' , 'odds04' );
</script>
</div><!--/#date_r-->
<div class="clear"></div>
</div><!--/#date-->

</div><!--/#date_btn-->

<div id="race_btn">
<ul>
<script type="text/javascript">
func_RaceNumList('{{$target_date}}' , {{$race_num}}, 'odds04' );
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
<div id="main_race_l"><a href="/asp/kyogi/09/pc/odds03/odds03{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">前へ</a></div><!--/#main_race_l-->

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
<li><a href="/asp/kyogi/09/pc/odds03/odds03{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">2連単／複･単勝･複勝･拡連複</a></li>
<li class="select">3連単／2連単ランキング</li>
<div class="clear"></div>
</ul>
</div><!--/#tab-->



@if($kaisai_master && $bairitu_3rentan_top20)
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
        ▼3連単/2連単ランキング -->
        <div class="cont_odds">
        <!-----------------------------------
        ▼選手 -->
        <div id="rank_sensyu">
        <table>
        <tr>
        <th class="waku" scope="col">枠</th>
        <th class="name" scope="col">選手名</th>
        </tr>
        <tr>
        <td class="waku w1">1</td>
        <td class="name w1">{{$syussou[1]->SENSYU_NAME}}</td>
        </tr>
        <tr>
        <td class="waku w2">2</td>
        <td class="name w2">{{$syussou[2]->SENSYU_NAME}}</td>
        </tr>
        <tr>
        <td class="waku w3">3</td>
        <td class="name6 w3">{{$syussou[3]->SENSYU_NAME}}</td>
        </tr>
        <tr>
        <td class="waku w4">4</td>
        <td class="name w4">{{$syussou[4]->SENSYU_NAME}}</td>
        </tr>
        <tr>
        <td class="waku w5">5</td>
        <td class="name w5">{{$syussou[5]->SENSYU_NAME}}</td>
        </tr>
        <tr>
        <td class="waku w6">6</td>
        <td class="name w6">{{$syussou[6]->SENSYU_NAME}}</td>
        </tr>
        </table>
        </div><!--/#rank_sensyu-->

        <!-----------------------------------
        ▼3連単TOP20 -->
        <div id="rank_3tan">
        <h1><img src="/kaisai/images/odds_h10.png" alt="3連単TOP30" width="180" height="26"></h1>

        <table class="ta_ranking">
            @foreach($bairitu_3rentan_top20 as $item)
                <tr>
                    <td class="rank"><img src="/kaisai/images/odds_r{{$item['rank']}}.png" width="20" height="20"></td>
                    <td class="kumi3"><span class="w{{$item['record']->NUMBER1}} waku_s4">{{$item['record']->NUMBER1}}</span>-<span class="w{{$item['record']->NUMBER2}} waku_s4">{{$item['record']->NUMBER2}}</span>-<span class="w{{$item['record']->NUMBER3}} waku_s4">{{$item['record']->NUMBER3}}</span></td>
                    <td class="rate">{{$item['record']->BAIRITU}}</td>
                </tr>
            @endforeach
        </table>
        <div class="clear"></div>
        </div><!--/#rank_3tan-->

        <!-----------------------------------
        ▼3連単高配当TOP20 -->
        <div id="rank_3kou">
        <h1><img src="/kaisai/images/odds_h11.png" alt="3連単TOP30" width="180" height="26"></h1>

        <table class="ta_ranking">
            @foreach($bairitu_3rentan_kouhaitou_top20 as $item)
                <tr>
                    <td class="rank"><img src="/kaisai/images/odds_r{{$item['rank']}}.png" width="20" height="20"></td>
                    <td class="kumi3"><span class="w{{$item['record']->NUMBER1}} waku_s4">{{$item['record']->NUMBER1}}</span>-<span class="w{{$item['record']->NUMBER2}} waku_s4">{{$item['record']->NUMBER2}}</span>-<span class="w{{$item['record']->NUMBER3}} waku_s4">{{$item['record']->NUMBER3}}</span></td>
                    <td class="rate">{{$item['record']->BAIRITU}}</td>
                </tr>
            @endforeach
        </table>
        <div class="clear"></div>
        </div><!--/#rank_3kou-->


        <!-----------------------------------
        ▼2連単高配当TOP10 -->
        <div id="rank_2tan">
        <h1><img src="/kaisai/images/odds_h12.png" alt="2連単TOP10" width="145" height="26"></h1>

        <table class="ta_ranking">
          @foreach($bairitu_2rentan_top20 as $item)
              <tr>
                  <td class="rank"><img src="/kaisai/images/odds_r{{$item['rank']}}.png" width="20" height="20"></td>
                  <td class="kumi2"><span class="w{{$item['record']->NUMBER1}} waku_s4">{{$item['record']->NUMBER1}}</span>-<span class="w{{$item['record']->NUMBER3}} waku_s4">{{$item['record']->NUMBER3}}</span></td>
                  <td class="rate">{{$item['record']->BAIRITU}}</td>
              </tr>
          @endforeach
        </table>
        <div class="clear"></div>
        </div><!--/#rank_2tan-->

        <!-----------------------------------
        ▼2連単高配当TOP10 -->
        <div id="rank_2kou">
        <h1><img src="/kaisai/images/odds_h13.png" alt="2連単TOP10" width="145" height="26"></h1>

        <table class="ta_ranking">
            @foreach($bairitu_2rentan_kouhaitou_top20 as $item)
                <tr>
                    <td class="rank"><img src="/kaisai/images/odds_r{{$item['rank']}}.png" width="20" height="20"></td>
                    <td class="kumi2"><span class="w{{$item['record']->NUMBER1}} waku_s4">{{$item['record']->NUMBER1}}</span>-<span class="w{{$item['record']->NUMBER3}} waku_s4">{{$item['record']->NUMBER3}}</span></td>
                    <td class="rate">{{$item['record']->BAIRITU}}</td>
                </tr>
            @endforeach
        </table>
        <div class="clear"></div>
        </div><!--/#rank_2kou-->

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
<div id="main_race_r"><a href="/asp/kyogi/09/pc/yoso01/yoso01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">次へ</a></div><!--/#main_race_r-->
<div class="clear"></div>
</div><!--/#main_race-->




</body>
</html>
