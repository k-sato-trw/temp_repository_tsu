@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_sp.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-161205184-3"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-161205184-3');
</script>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="user-scalable=no">

<title>ボートレース津 オフィシャルサイト</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,三重,開催日程,レースライブ,予想">
<meta name="Description" content="BOAT RACE津のオフィシャルサイトです。レースライブおよびリプレイ動画の配信をはじめ、BOAT RACE津のレースをお楽しみいただける情報を掲載しています。">

<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href="/sp/css/reset.css" rel="stylesheet" type="text/css">
<link href="/sp/css/common.css" rel="stylesheet" type="text/css">
<link href="/sp/css/index.css" rel="stylesheet" type="text/css">
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

<!--トップメインメニューjs-->
<script type="text/javascript" src="/sp/js/top_main_navi.js"></script>

<!--アコーディオンjs-->
<script type="text/javascript" src="/sp/js/jquery.accordion.js"></script>

<!--HOTNEWSjs-->
<script type="text/javascript" src="/sp/js/jquery.marquee.js"></script>
<script type="text/javascript">
$(document).ready(function (){
   $("#marquee").marquee({
	  scrollSpeed: 6,
	  showSpeed: 1000,
	  pauseSpeed: 1000
	  });

});
</script>


<!--bxslider-->
<script type="text/javascript" src="/js/jquery.bxslider.min.js"></script>
<link rel="stylesheet" href="/css/jquery.bxslider.css" />
<!--bxslider・カスタムスタイル-->
<link rel="stylesheet" href="/sp/css/jquery.bxslider_custom.css" />
<script>
$(document).ready(function(){
  var huga = $('.bxslider').bxSlider({
  auto: true,//自動切り替えの有無
  pause:5000,//停止時間※デフォルトは4000
  speed:500,//動くスピード※デフォルトは500
  minSlides:1,//必須・一度に表示させる画像の最小値
  maxSlides: 1,//必須・一度に表示させる画像の数
  slideWidth: 570,//必須
  moveSlides: 3,
  //slideMargin: 10,
  pager: true,
  //prevText: '＜',
  //nextText: '＞',
  onSlideAfter: function(){
            huga.startAuto();
        }
});
});
</script>

</head>





<body>


<!--緊急告知-->
<script>
    $.ajax({url: '/asp/tsu/admin/cms/kinkyu/kinkyu_message.asp?jyo=09&device=1'}).done(function(data){$("body").prepend(data)});
</script>
<!-- 緊急告知終了 -->
<div id="wrapper" class=" @if($kaisai) kaisai @else hikaisai @endif ">




<div id="racedata_wrap">
<div id="racedata">

    <h1>BOATRACE 津 #09</h1>
    
    <div id="nav">
		<script type="text/javascript">
        funcTsuMenu();
        </script>
    </div><!--/#nav-->
    
    
    <div id="today_info">
        <div class="date">
            <p class="d1">{{ date('Y' ,strtotime($target_date)) }}</p>
            <p class="d2">{{ date('n/j' ,strtotime($target_date)) }}</p>
            <p class="d3">{{ mb_strtoupper($general->weeknumber_to_weekalphabet(date('w' ,strtotime($target_date)))) }}</p>
        </div>
        <dl>
            <dt class="open">開門時間</dt>
            @if($kaimon_time == '----')
                <dd class="open">--:--</dd>
            @else
                <dd class="open">{{(int)substr($kaimon_time,0,2)}}:{{substr($kaimon_time,2,2)}}</dd>
            @endif
            <dt class="start">第1Rスタート展示</dt>
            @if($st_time == '----')
                <dd class="start">--:--</dd>
            @else
                <dd class="start">{{(int)substr($st_time,0,2)}}:{{substr($st_time,2,2)}}</dd>
            @endif
        </dl>
        <div class="clear"></div>
    </div><!--/#today_info-->
    
    
    
    
    @if($headline)
        <!--■■■ ホットニュース ■■■-->
        <div id="hotnews">
            
            <h3>ホットニュース</h3>
                <ul id="marquee">
                    <li>
                        @if($headline->SP_LINK)
                            <a href="{{$headline->SP_LINK}}" @if($headline->SP_LINK_WINDOW_FLG == 1) target="_blank" @endif >
                        @elseif($headline->HEADLINE_FLG != '1' && $headline->TEXT)
                            <a href="/asp/tsu/SP/info/info_SP.asp?year={{substr($headline->VIEW_DATE,0,4)}}&id={{$headline->ID}}#id{{$headline->ID}}" @if($headline->SP_LINK_WINDOW_FLG == 1) target="_blank" @endif >
                        @else
                            <a href="javascript:void(0);">
                        @endif
                                {{$headline->HEADLINE_TITLE}}
                            </a>
                    </li>
                </ul>
            <div class="clear"></div>
        
        </div><!--/#hotnews-->
    @endif


    <div id="race_info">
    
        <table width="100%">
        <tbody>
            <tr>
            <th rowspan="2" class="{{ $general->gradenumber_to_gradename_for_tokyo_next_image( $kaisai_data->GRADE) }}">{{ $general->gradenumber_to_gradename_for_syutujo( $kaisai_data->GRADE) }}</th>
            <td class="name">
                 {{ $kaisai_data->RACE_TITLE }}
            </td>
            </tr>
            <tr>
              <td class="date">
                @foreach($kaisai_day_list as $key=>$item)
                    <?php $tmp = "" ?>
                    @if($key == 0 || $tmp_month != date('n',strtotime($item)))
                        <?php $tmp_month = date('n',strtotime($item)); ?>
                        <span class="month">{{ date('n',strtotime($item)) }}/</span><!--
                    @endif

                    @if(isset($chushi_junen_array[$item]))
                        --><span class="chushi"><!--
                    @elseif($target_date == $item)
                        --><span class="today"><!--
                    @endif
                    -->{{ date('j',strtotime($item)) }}<!--
                    @isset($holiday_array[$item])
                        {{--祝日--}}
                        --><img src="/sp/images/date_{{$general->weeknumber_to_weekalphabet( date('w',strtotime($item)))}}_h.png"><!--
                    @else
                        {{--平日--}}
                        --><img src="/sp/images/date_{{$general->weeknumber_to_weekalphabet( date('w',strtotime($item)))}}.png"><!--
                    @endisset
                    @if($target_date == $item || isset($chushi_junen_array[$item]))
                        --></span><!--
                    @endif
                @endforeach       
                --></td>
            </tr>
        </tbody>
        </table>

        @if($kaisai)
            {{--開催--}}
            <!--iframe-->
            <iframe src="/asp/tsu/sp/topdisplay/indexRaceInfo.htm" frameborder="0" allowtransparency="true" scrolling="no" name="race_info_data" id="race_info_data"></iframe>
            <!--iframe-->
            
        
            <ul id="r_nav1">
                <li class="b1"><a href="/asp/tsu/sp/kyogi/movie_live.asp?jyo=09">レースライブ</a></li>


                <li class="b2"><a href="/asp/tsu/sp/kyogi/index.asp?jyo=09">競技情報&amp;予想</a></li>
    '            <li class="b2"><a href="/asp/kyogi/09/sp/yoso_jumper.htm">競技情報&amp;予想</a></li>

                <li class="b3"><a href="/asp/log/tsu_sp_kyogi.asp" target="_blank">舟券投票</a></li>
                <div class="clear"></div>
            </ul>
            <ul id="r_nav2">
                <li class="b4"><a href="/sp/kyogi/replay.htm">リプレイ</a></li>
                <li class="b5"><a href="/sp/pdf/pdf.htm">出走表PDF</a></li>

                @if($tokutenritu)
                    <li class="b6"><a href="/asp/kyogi/09/sp/yosen.htm">得点率情報</a></li>
                @else
                    <li class="b6">得点率情報</li>
                @endif

                <div class="clear"></div>
		    </ul>
            <ul id="r_nav3">
                <li class="b7"><a href="/asp/tsu/sp/kyogi/index.asp?jyo=09&racenum=1&page=15">本日のレース結果</a></li>
                <li class="b8"><a href="/asp/kyogi/09/sp/motor/motor.htm">モーター抽選結果</a></li>
                <li class="b9"><a href="/asp/tsu/sp/03result_tsu/03result_tsu.asp">結果検索</a></li>
                <div class="clear"></div>
            </ul>

        @else
            {{--非開催--}}
            <div id="r_nav">
            <ul id="r_nav1">
            @if($tenbo_url)
                @if(strpos($tenbo_url,"http://") !== false)
                    <li class="b1"><a href="{{$tenbo_url}}" target='_blank'><span>展望・出場予定選手</span></a></li>
                @else
                    <li class="b1"><a href="/{{$tenbo_url}}"><span>展望・出場予定選手</span></a></li>
                @endif
            @else
                <li class="b1"><span>展望・出場予定選手</span></li>
            @endif

            @if(file_exists("/pdf/tsu/bangumihyo/{{ $tomorrow_date }}0101.pdf") && file_exists("/pdf/tsu/bangumihyo/{{ $tomorrow_date }}0102.pdf"))
                <li class="b2"><a href="/sp/pdf/pdf.htm"><span>出走表&amp;<br>前日記者予想PDF</span></a></li>
            @else
                <li class="b2"><span>出走表&amp;<br>前日記者予想PDF</span></li>
            @endif
            @if(file_exists("/asp/kyogi/09/motor_check/{{$kaisai_data->START_DATE}}_sp.htm"))
                <li class="b3"><a href="/asp/kyogi/09/sp/motor/motor.htm"><span>モーター抽選結果&amp;<br>前検タイム</span></a></li>
            @else
                <li class="b3"><span>モーター抽選結果&amp;<br>前検タイム</span></li>
            @endif
            
            @if(count($event_fan) && count($event_fan_master))
                <li class="b4"><a href="/asp/tsu/sp/04event/04event_SP.asp?id={{$event_fan_master[0]->ID}}#id{{$event_fan_master[0]->ID}}"><span>イベント&amp;<br>ファンサービス</span></a></li>
            @else
                <li class="b4"><span>イベント&amp;<br>ファンサービス</span></li>
            @endif
                <div class="clear"></div>
            </ul>
            <ul id="r_nav2">
                <li class="b5"><a href="/asp/tsu/sp/01cal/01cal.asp">開催日程</a></li>

                @if($tomorrow_date == $kaisai_data->START_DATE && $target_date >= '1815' )
                    <li class="b6_2"><a href="/asp/tsu/sp/kyogi/index.asp?jyo=09">データ予想</a></li>
                    <li class="b7"><a href="/asp/kyogi/09/sp/yoso_jumper.htm">レース予想</a></li>
                @else
                    <li class="b6"><a href="/sp/kyogi/replay.htm">リプレイ</a></li>
                    <li class="b7">レース予想</li>
                @endif

                <li class="b8"><a href="/asp/tsu/sp/03play_b/03play_b.asp">優勝戦プレイバック</a></li>
                <li class="b9"><a href="/asp/tsu/sp/03result_tsu/03result_tsu.asp">レース結果検索</a></li>
                <div class="clear"></div>
            </ul>
            </div><!--/#r_nav-->
        @endif
    </div><!--/#race_info-->
        
    
    
    <div id="today_jyogai">
		<h3>本日の<br>場外発売<br>レース</h3>
        
        <table>
          <tbody>
          <tr>
          <th class="honjyo"><span>本場</span></th>
          <td class="honjyo"><!--
            @if(count($honjyo_jyogai))
              @foreach ($honjyo_jyogai as $cnt => $item)
                @if($cnt != 0)
                    -->／<!--
                @endif
                    --><p class="{{$general->gradenumber_to_gradename_for_front_syussou($item->GRADE)}} @isset($jyogai_chushi_array[$item->JYO]) chushi @endisset"><!--
                    --><span>{{$general->gradenumber_to_gradename_for_syutujo($item->GRADE)}}<!--
                    --></span>{{$general->jyocode_to_jyoname($item->JYO)}}</p><!--
                        @if($item->LADY_FLG)
                            --><img src="/sp/images/jyogai_lady.png"><!--
                        @endif
                        @if($item->RACE_TYPE == 1)
                            --><img src="/sp/images/jyogai_night.png"><!--
                        @elseif($item->RACE_TYPE == 2)
                            --><img src="/sp/images/jyogai_hakubo.png"><!--
                        @endif
              @endforeach
            @else
                -->本日の発売はございません<!--
            @endif
        --></td>
          </tr>
          <tr>
          <th class="soto"><span>津<br>インクル</span></th>
          <td class="soto"><!--
            @if(count($sotomuke_jyogai))
                @foreach ($sotomuke_jyogai as $cnt => $item)
                    @if($cnt != 0)
                        -->／<!--
                    @endif
                    --><p class="{{$general->gradenumber_to_gradename_for_front_syussou($item->GRADE)}} @isset($jyogai_chushi_array[$item->JYO]) chushi @endisset"><!--
                    --><span>{{$general->gradenumber_to_gradename_for_syutujo($item->GRADE)}}<!-- 
                    --></span>{{$general->jyocode_to_jyoname($item->JYO)}}</p><!--
                        
                        @if($item->LADY_FLG)
                            --><img src="/sp/images/jyogai_lady.png"><!-- 
                        @endif
                        @if($item->RACE_TYPE == 1)
                            --><img src="/sp/images/jyogai_night.png"><!-- 
                        @elseif($item->RACE_TYPE == 2)
                            --><img src="/sp/images/jyogai_hakubo.png"><!-- 
                        @endif
                @endforeach
            @else
                -->本日の発売はございません<!--
            @endif
      --></tr>
          </tbody>
        </table>
          
        <div class="twinkuru">
            <p><span>津インクル開門</span>7:30</p>{{--固定値--}}
        </div>
        
        <div class="clear"></div>
        
    </div><!--/#today_jyogai-->
    
    
	
</div><!--/#racedata_wrap-->
</div><!--/#racedata-->










<!--■■■ スライダー ■■■-->
<div id="slider_wrap">
<div id="slider">


<div id="topics_slider">
<ul class="@if(count($topic_array) > 1) bxslider @else bxslider_no @endif">
    @foreach ($topic_array as $item)
        <li><a href="{{$item->SP_URL}}"  @if($item->SP_BLANK_FLG == 1) target="_blank" @endif ><img alt="" src="{{config('const.IMAGE_PATH.TOPIC').$item->IMAGE}}" width="570" height="268"></a></li>
    @endforeach
</ul>
</div><!--/topics_slider-->

    
</div><!--/#slider-->
</div><!--/#slider_wrap-->




<!--■■■ インフォ ■■■-->
<div id="information">
    <div class="header">
        <h3>インフォメーション</h3>
        <a href="/asp/tsu/sp/info/info_SP.asp">記事一覧</a>
        <div class="clear"></div>
    </div>
    <ul>
        <?php $news_count = 0;?>
        @foreach ($news_all as $item)
            @if($item['TYPE'] == 1)
                <?php $news_class = 'update'; ?>
                <?php $news_type = '更新情報'; ?>
            @elseif($item['TYPE'] == 2)
                <?php $news_class = 'news'; ?>
                <?php $news_type = 'お知らせ'; ?>
            @elseif($item['TYPE'] == 3)
                <?php $news_class = 'impo'; ?>
                <?php $news_type = '重要'; ?>
            @endif

            <li class="{{$news_class}}">
                @if($item['NEW_FLG'] && date('Ymd',strtotime('-3 day',$target_date)) <= $item['VIEW_DATE'])
                    <img src="/sp/images/info_new.png" alt="new">
                @endif

                @if($item['SP_LINK'])
                    <a href="{{ $item['SP_LINK'] }}" @if($item['SP_LINK_WINDOW_FLG'] == 1) target="_blank" @endif >
                @elseif( $item['TEXT'] || $item['IMAGE_1'] || $item['IMAGE_2'] || $item['IMAGE_3'] )
                    <a href="/asp/tsu/SP/info/info.asp?year={{ substr($item['VIEW_DATE'],0,4) }}&id={{$item['ID']}}#id{{$item['ID']}}" @if($item['SP_LINK_WINDOW_FLG'] == 1) target="_blank" @endif >
                @else
                    <a href="javascript:void(0);">
                @endif
                    <dl><dt>{{ date('n/j',strtotime($item['VIEW_DATE'])) }}<span>{{$news_type}}</span></dt><dd>{{$item['TITLE']}}</dd></dl>
                </a>
            </li>

            <?php $news_count++; ?>
            @if($news_count == 4)
                <?php break; ?>
            @endif
        @endforeach
        <div class="clear"></div>
    </ul>
</div><!--/#information-->


<!--■■■ トップナビゲーション ■■■-->
<div id="top_nav">

<script type="text/javascript">
funcTsuMainMenu();
</script>

</div><!--/#top_nav-->







<!--■■■　フッター　■■■-->
<div id="footer_wrap">
<div id="ft_logo">
<img src="/sp/images/sp_ft_logo.png" width="342" height="50" alt=""/></div>
<div id="ft_credit">&copy;BOAT RACE TSU All rights reserved.</div></div>





</div><!--/#wrapper-->

</body>
</html>
