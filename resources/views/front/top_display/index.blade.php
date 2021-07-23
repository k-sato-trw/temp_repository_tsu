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
<!--#exec cgi="/asp/tsu/admin/cms/kinkyu/kinkyu_message.asp?jyo=09&device=0"-->
<!-- 緊急告知終了 -->







<div id="wrapper" class=" @if($kaisai_master) kaisai @else hikaisai @endif">




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
            <dd class="open">{{(int)substr($kaimon_time,0,2)}}:{{substr($kaimon_time,2,2)}}</dd>
            <dt class="start">第1Rスタート展示</dt>
            <dd class="start">{{(int)substr($st_time,0,2)}}:{{substr($st_time,2,2)}}</dd>
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
              @foreach ($honjyo_jyogai as $cnt => $item)
                @if($cnt != 0)
                    -->／<!--
                @endif
                    --><p class="{{$general->gradenumber_to_gradename_for_front_syussou($item->GRADE)}} @isset($jyogai_chushi_array[$item->JYO]) chushi @endisset"><!--
                    --><span>{{$general->gradenumber_to_gradename_for_syutujo($item->GRADE)}}<!--
                        @if($item->LADY_FLG)
                            --><img src="/images/jyogai_lady.png"><!--
                        @endif
                        @if($item->RACE_TYPE == 1)
                            --><img src="/images/jyogai_night.png"><!--
                        @elseif($item->RACE_TYPE == 2)
                            --><img src="/images/jyogai_hakubo.png"><!--
                        @endif
                    --></span>{{$general->jyocode_to_jyoname($item->JYO)}}</p><!--
              @endforeach
        --></td>
          </tr>
          <tr>
          <th class="soto">津<br>インクル</th>
          <td class="soto"><!--
            @foreach ($sotomuke_jyogai as $cnt => $item)
              @if($cnt != 0)
                  -->／<!--
              @endif
                  --><p class="{{$general->gradenumber_to_gradename_for_front_syussou($item->GRADE)}} @isset($jyogai_chushi_array[$item->JYO]) chushi @endisset"><!--
                  --><span>{{$general->gradenumber_to_gradename_for_syutujo($item->GRADE)}}<!--
                      @if($item->LADY_FLG)
                          --><img src="/images/jyogai_lady.png"><!--
                      @endif
                      @if($item->RACE_TYPE == 1)
                          --><img src="/images/jyogai_night.png"><!--
                      @elseif($item->RACE_TYPE == 2)
                          --><img src="/images/jyogai_hakubo.png"><!--
                      @endif
                  --></span>{{$general->jyocode_to_jyoname($item->JYO)}}</p><!--
            @endforeach
      --></tr>
          </tbody>
          </table>
    </div><!--/#today_jyogai-->
    
    
    <div id="race_info">
        @if($kaisai_master)
            <iframe src="/race_info_kaisai_btn.htm" frameborder="0" allowtransparency="true" scrolling="no" name="race_btn" id="race_btn"></iframe>
            <iframe src="/asp/kyogi/09/pc/top_race_movie.htm" frameborder="0" allowtransparency="true" scrolling="no" name="race_movie" id="race_movie" allowfullscreen></iframe>
            <iframe src="/asp/tsu/topdisplay/indexKaisaiJokyo.htm" frameborder="0" allowtransparency="true" scrolling="no" name="race_info_now" id="race_info_now"></iframe>
    	@endif
        <iframe src="/asp/tsu/topdisplay/indexRaceInfo.htm" frameborder="0" allowtransparency="true" scrolling="no" name="race_info_kaisai" id="race_info_kaisai"></iframe>
    </div><!--/#race_info-->
    
    <div class="clear"></div>
	
</div><!--/#racedata_wrap-->
</div><!--/#racedata-->




<!--■■■ ホットニュース ■■■-->
<div id="hotnews_wrap">
<div id="hotnews">
	
<h3>ホットニュース</h3>
<div class="ticker" rel="slide">
<ul>
<li><a href="/info/info.htm#id657">非開催日の単独場外発売日程について</a></li>
</ul>
</div>
<div class="clear"></div>

</div><!--/#hotnews-->
</div><!--/#hotnews_wrap-->




<!--■■■ スライダー ■■■-->
<div id="slider_wrap">
<div id="slider">


<div id="topics_slider">
<ul class="bxslider">
<li>
	<a href="https://boatdebatchkoi-x.com/" target="_blank"><img alt="" src="/asp/htmlmade/tsu/topic/67.jpg" width="340" height="160"></a>
	<a href="https://special.janbari.com/lovers-boat/" target="_blank"><img alt="" src="/asp/htmlmade/tsu/topic/102.jpg" width="340" height="160"></a>
	<a href="http://www.boatrace-tsu.com/06topic/vol20.htm"><img alt="" src="/asp/htmlmade/tsu/topic/51.jpg" width="340" height="160"></a>
</li>
<li>
	<a href="http://www.boatrace-tsu.com/info/info.htm#id630"><img alt="" src="/asp/htmlmade/tsu/topic/95.jpg" width="340" height="160"></a>
	<a href="https://www.facebook.com/boatrace.tsu.jp/" target="_blank"><img alt="" src="/asp/htmlmade/tsu/topic/9.jpg" width="340" height="160"></a>
	<a href="http://www.boatrace-tsu.com/asp/tsu/info/info.asp?Year=2018#id276"><img alt="" src="/asp/htmlmade/tsu/topic/36.jpg" width="340" height="160"></a>
</li>
<li>
	<a href="http://www.boatrace-tsu.com/04cashless/04cashless.htm"><img alt="" src="/asp/htmlmade/tsu/topic/61.jpg" width="340" height="160"></a>
	<a href="http://tsu-pointclub.jp/" target="_blank"><img alt="" src="/asp/htmlmade/tsu/topic/6.png" width="340" height="160"></a>
	<a href="http://www.boatrace-tsu.com/asp/tsu/info/info.asp?Year=2018#id335"><img alt="" src="/asp/htmlmade/tsu/topic/52.jpg" width="340" height="160"></a>
</li>
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
                <li class="update"><img src="/images/info_new.png" alt="new">
        	<a href="/asp/tsu/kaisai/kaisaiindex.htm?page=4">
<p>5/24<span>更新情報</span></p>得点率｜中日スポーツ津ボート大賞(4日目)</a></li>
                <li class="news"><img src="/images/info_new.png" alt="new">
<a href="/info/info.htm#id658"><p>5/23<span>お知らせ</span></p>はずれ抽選機当選券の有効期限の一部変更について</a></li>
                <li class="news">
<a href="/info/info.htm#id657"><p>5/22<span>お知らせ</span></p>非開催日の単独場外発売日程について</a></li>
                <li class="update">
        	<a href="/asp/tsu/kaisai/kaisaiindex.htm?page=3">
<p>5/20<span>更新情報</span></p>モーター抽選結果｜中日スポーツ津ボート大賞</a></li>
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
            <li><a href="https://allstar2021.jp/" target="_blank"><img src="/asp/htmlmade/tsu/banner/images/20210427093256.gif" width="160" height="40"></a></li>
            <li><a href="http://www.br-special.jp/202106GI22/" target="_blank"><img src="/asp/htmlmade/tsu/banner/images/20210521110504.gif" width="160" height="40"></a></li>
            <li><a href="https://boatrace-sp.jp/2021aquaqueen/" target="_blank"><img src="/asp/htmlmade/tsu/banner/images/20210521110559.jpg" width="160" height="40"></a></li>
            <li><a href="http://www.nta.go.jp/publication/pamph/shotoku/kakuteishinkokukankei/koueikyougi/" target="_blank"><img src="/asp/htmlmade/tsu/banner/images/20191124115729.jpg" width="160" height="40"></a></li>
            <li><a href="http://www.boatrace.jp/bosyu/?utm_source=link&utm_medium=tb09&utm_campaign=tbnew" target="_blank"><img src="/asp/htmlmade/tsu/banner/images/20191106120347.jpg" width="160" height="40"></a></li>
            <li><a href="http://www.boatrace.jp/" target="_blank"><img src="/asp/htmlmade/tsu/banner/images/20151109154526.png" width="160" height="40"></a></li>
            <li><a href="http://www.rakuten-bank.co.jp/koueirace/boatrace/?scid=we_brc_koueirace_010" target="_blank"><img src="/asp/htmlmade/tsu/banner/images/20151114121035.gif" width="160" height="40"></a></li>
            <li><a href="https://www.facebook.com/boatracePR" target="_blank"><img src="/asp/htmlmade/tsu/banner/images/20151114121111.jpg" width="160" height="40"></a></li>
            <li><a href="http://sup.jlc.ne.jp/index.php" target="_blank"><img src="/asp/htmlmade/tsu/banner/images/20180627134602.jpg" width="160" height="40"></a></li>
            <li><a href="http://www.infoworld.co.jp/nabari/" target="_blank"><img src="/asp/htmlmade/tsu/banner/images/20171207123145.png" width="160" height="40"></a></li>
            <li><a href="http://www.bts-yoro.com/" target="_blank"><img src="/asp/htmlmade/tsu/banner/images/20171207123221.png" width="160" height="40"></a></li>
            <li><a href="http://www.smartboat.jp/data24/index_pc.htm" target="_blank"><img src="/asp/htmlmade/tsu/banner/images/20151114121212.jpg" width="160" height="40"></a></li>
            <li><a href="http://www.nippon-foundation.or.jp/" target="_blank"><img src="/asp/htmlmade/tsu/banner/images/20160609122525.png" width="160" height="40"></a></li>
            <li><a href="http://www.boatrace-tsu.com/asp/tsu/info/info.asp?Year=2018#id276" target="_blank"><img src="/asp/htmlmade/tsu/banner/images/20170704165155.jpg" width="160" height="40"></a></li>
            <div class="clear"></div>
        </ul><!--/#banner-->
    </div><!--/#banner_wrap-->
</div><!--/#footer_wrap-->








</div><!--/#wrapper-->




</body>
</html>
