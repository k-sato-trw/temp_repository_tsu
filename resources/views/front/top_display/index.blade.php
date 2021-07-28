@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_pc.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-161205184-2"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-161205184-2');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5KN6QQ9');</script>
<!-- End Google Tag Manager -->
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">

<title>ボートレース津 オフィシャルサイト</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,三重,開催日程,レースライブ,予想">
<meta name="Description" content="BOAT RACE津のオフィシャルホームページです。レースライブおよびリプレイ動画の配信はもとより、よりBOAT RACE津のレースをお楽しみいただける情報を掲載しています。">
<meta name="viewport" content="width=1280px">

<link href="/css/reset.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/css/index.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/js/common.js"></script>

<!--コンテンツメニューjs-->
<script type="text/javascript" src="/js/contents_navi_slide.js"></script>
<script type="text/javascript" src="/js/contents_navi_main.js"></script>

<!--hotnews-->
<script type="text/javascript" src="/js/Ticker.js"></script>

<!--bxslider-->
<script type="text/javascript" src="/js/jquery.bxslider.min.js"></script>
<link rel="stylesheet" href="/css/jquery.bxslider.css" />
<!--bxslider・カスタムスタイル-->
<link rel="stylesheet" href="/css/jquery.bxslider_custom.css" />
<script>
$(document).ready(function(){
  var huga = $('.bxslider').bxSlider({
  auto: true,//自動切り替えの有無
  pause:5000,//停止時間※デフォルトは4000
  speed:500,//動くスピード※デフォルトは500
  minSlides:1,//必須・一度に表示させる画像の最小値
  maxSlides: 1,//必須・一度に表示させる画像の数
  slideWidth: 1070,//必須
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

<script type="text/javascript" src="/asp/SmartAgentGetter.js"></script>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5KN6QQ9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!--FB-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--FB-->


<!-- ■■■スマホアクセス時■■■ -->
<!--スマホ-->
<script type="text/javascript">
	if( funcJsSmartAgentGetter() !== "PC" ){
		document.write('<a href="/sp/" id="SP">スマホサイトはコチラ</a>');
	}
</script>


<!--緊急告知-->
<script>
    $.ajax({url: '/asp/tsu/admin/cms/kinkyu/kinkyu_message.asp'}).done(function(data){$("#wrapper").before(data)});
</script>
<!-- 緊急告知終了 -->







<div id="wrapper" class=" @if($kaisai) kaisai @else hikaisai @endif">




<!--■■■ レース情報 ■■■-->
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
    
    
    <div id="today_jyogai">
    	<div class="header">
            <h3>本日の場外発売レース</h3>
            <p><span>[ 津インクル開門時間 ]</span>7:30</p>{{--固定値--}}
            <div class="clear"></div>
        </div>
        <table>
          <tbody>
          <tr>
          <th class="honjyo">本場</th>
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
                            --><img src="/images/jyogai_lady.png"><!--
                        @endif
                        @if($item->RACE_TYPE == 1)
                            --><img src="/images/jyogai_night.png"><!--
                        @elseif($item->RACE_TYPE == 2)
                            --><img src="/images/jyogai_hakubo.png"><!--
                        @endif
              @endforeach
            @else
                -->本日の発売はございません<!--
            @endif
        --></td>
          </tr>
          <tr>
          <th class="soto">津<br>インクル</th>
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
                            --><img src="/images/jyogai_lady.png"><!-- 
                        @endif
                        @if($item->RACE_TYPE == 1)
                            --><img src="/images/jyogai_night.png"><!-- 
                        @elseif($item->RACE_TYPE == 2)
                            --><img src="/images/jyogai_hakubo.png"><!-- 
                        @endif
                @endforeach
            @else
                -->本日の発売はございません<!--
            @endif
      --></tr>
          </tbody>
          </table>
    </div><!--/#today_jyogai-->
    
    
    <div id="race_info">
        @if($kaisai)
            <iframe src="/race_info_kaisai_btn.htm" frameborder="0" allowtransparency="true" scrolling="no" name="race_btn" id="race_btn"></iframe>
            <iframe src="/asp/kyogi/09/pc/top_race_movie.htm" frameborder="0" allowtransparency="true" scrolling="no" name="race_movie" id="race_movie" allowfullscreen></iframe>
            <iframe src="/asp/tsu/topdisplay/indexKaisaiJokyo.htm" frameborder="0" allowtransparency="true" scrolling="no" name="race_info_now" id="race_info_now"></iframe>
    	@endif
        <iframe src="/asp/tsu/topdisplay/indexRaceInfo.htm" frameborder="0" allowtransparency="true" scrolling="no" name="race_info_kaisai" id="race_info_kaisai"></iframe>
    </div><!--/#race_info-->
    
    <div class="clear"></div>
	
</div><!--/#racedata_wrap-->
</div><!--/#racedata-->




@if($headline)
    <!--■■■ ホットニュース ■■■-->
    <div id="hotnews_wrap">
    <div id="hotnews">
        
    <h3>ホットニュース</h3>
    <div class="ticker" rel="slide">
    <ul>
    <li>
        @if($headline->PC_LINK)
            <a href="{{$headline->PC_LINK}}" @if($headline->PC_LINK_WINDOW_FLG == 1) target="_blank" @endif >
        @elseif($headline->HEADLINE_FLG != '1' && $headline->TEXT)
            <a href="/asp/tsu/info/info.asp?year={{substr($headline->VIEW_DATE,0,4)}}" @if($headline->PC_LINK_WINDOW_FLG == 1) target="_blank" @endif >
        @else
            <a href="javascript:void(0);">
        @endif
                {{$headline->HEADLINE_TITLE}}
            </a>
    </li>
    </ul>
    </div>
    <div class="clear"></div>

    </div><!--/#hotnews-->
    </div><!--/#hotnews_wrap-->
@else
    <!--■■■ ホットニュース ■■■-->
    <div id="hotnews_wrap">
    <div id="hotnews">

    <div class="clear"></div>
    
    </div><!--/#hotnews-->
    </div><!--/#hotnews_wrap-->
@endif




<!--■■■ スライダー ■■■-->
<div id="slider_wrap">
<div id="slider">


<div id="topics_slider">
<ul class="@if($box_count > 3) bxslider @else bxslider_no @endif">
    @foreach ($topic_array as $topic_row)
        <li>
            @foreach ($topic_row as $key => $item)
                @if($item->BIG_FLAG)
                    <a href="{{$item->PC_URL}}" @if($item->PC_BLANK_FLG == 1) target="_blank" @endif ><img alt="" src="{{config('const.IMAGE_PATH.TOPIC').$item->IMAGE}}" width="1050" height="160"></a>
                @else
                    <a href="{{$item->PC_URL}}" @if($item->PC_BLANK_FLG == 1) target="_blank" @endif ><img alt="" src="{{config('const.IMAGE_PATH.TOPIC').$item->IMAGE}}" width="340" height="160"></a>
                @endif
            @endforeach
        </li>
    @endforeach
</ul>
</div><!--/topics_slider-->

    
</div><!--/#slider-->
</div><!--/#slider_wrap-->




<!--■■■ インフォ関連 ■■■-->
<div id="info_wrap">
	
	<div id="facebook">
    	<h3>BOATRACE津 公式facebook</h3>
    	<div class="fb-page" data-href="https://www.facebook.com/boatrace.tsu.jp/" data-width="330" data-height="420" data-small-header="true" data-adapt-container-width="false" data-hide-cover="true" data-show-facepile="false" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/boatrace.tsu.jp/"><a href="https://www.facebook.com/boatrace.tsu.jp/">BOAT RACE 津レース場</a></blockquote></div></div>
    </div><!--/#facebook-->
    
    <div id="info_area">
    
    	<div id="information">
        	<div class="header">
            	<h3>インフォメーション</h3>
                <a href="/info/info.htm">記事一覧</a>
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
                            <img src="/images/info_new.png" alt="new">
                        @endif

                        @if($item['PC_LINK'])
                            <a href="{{ $item['PC_LINK'] }}" @if($item['PC_LINK_WINDOW_FLG'] == 1) target="_blank" @endif >
                        @elseif( $item['TEXT'] || $item['IMAGE_1'] || $item['IMAGE_2'] || $item['IMAGE_3'] )
                            <a href="/asp/tsu/info/info.asp?year={{ substr($item['VIEW_DATE'],0,4) }}#id{{$item['ID']}}" @if($item['PC_LINK_WINDOW_FLG'] == 1) target="_blank" @endif >
                        @else
                            <a href="javascript:void(0);">
                        @endif
                            <p>{{ date('n/j',strtotime($item['VIEW_DATE'])) }}<span>{{$news_type}}</span></p>{{$item['TITLE']}}
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
        
        <ul id="etc">
        	<li class="qr"></li>
            <li class="soto"><a href="/05access/05access.htm#soto">津インクル</a></li>
            <div class="clear"></div>
        </ul><!--/#etc-->
        
        <ul id="language">
        	<li id="lan_en"><a href="/en/" target="_blank">English</a></li>
            <li id="lan_ch1"><a href="/cn/" target="_blank">Chinese</a></li>
            <li id="lan_ch2"><a href="/tw/" target="_blank">Chinese</a></li>
            <li id="lan_ko"><a href="/ko/" target="_blank">Korean</a></li>
            <div class="clear"></div>
        </ul><!--/#language-->
        
    </div><!--/#info_area-->
    
    <div class="clear"></div>
    
</div><!--/#info_wrap-->






<!--■■■ フッター ■■■-->
<div id="footer_wrap">
    <div id="footer">
    	<iframe src="/footer.htm" frameborder="0" allowtransparency="true" scrolling="no" name="footer"></iframe>
    </div><!--/#footer-->
    
    <div id="banner_wrap">
        <ul id="banner">
            @foreach ($banner as $item)
                <li>
                    @if($item->リンク先URL)
                        <a href="{{$item->リンク先URL}}"  @if($item->別画面 == 1) target="_blank" @endif >
                    @else
                        <a href="javascript:void(0);"  @if($item->別画面 == 1) target="_blank" @endif >
                    @endif
                        <img src="{{ config('const.IMAGE_PATH.BANNER') . $item->イメージURL}}" width="{{$item->イメージの幅}}" height="{{$item->イメージの高さ}}">
                    </a>
                </li>
            @endforeach
            <div class="clear"></div>
        </ul><!--/#banner-->
    </div><!--/#banner_wrap-->
</div><!--/#footer_wrap-->








</div><!--/#wrapper-->




</body>
</html>
