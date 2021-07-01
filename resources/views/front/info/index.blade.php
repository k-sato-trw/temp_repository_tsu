@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_pc.js"></script>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">

<title>ボートレース津｜インフォメーション</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,新着,ニュース,更新,お知らせ">
<meta name="Description" content="BOAT RACE津からのお知らせやホームページの更新情報などを掲載しています。">
<meta name="viewport" content="width=1280px">

<link href="/css/reset.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/css/info.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/js/common.js"></script>

<!--コンテンツメニューjs-->
<script type="text/javascript" src="/js/contents_navi_slide.js"></script>
<script type="text/javascript" src="/js/contents_navi_main.js"></script>

<!--ヘッダーメニューjs-->
<script type="text/javascript" src="/js/header_navi.js"></script>

<!--fancybox-->
<script type="text/javascript" src="/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="/js/fancybox/jquery.easing-1.3.pack.js"></script>
<link rel="stylesheet" href="/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<script type="text/javascript">
		$(document).ready(function() {
		$(".photo a").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	100, 
		'speedOut'		:	50, 
		'centerOnScroll' : true,
		'overlayShow'	:	true,
		'overlayOpacity' : 0
	});
		});
</script>


</head>





<body>


<div id="wrapper">




<div id="header_wrap">
    <div id="header">
    <div id="header_img">
    	
        <h1><a href="/">BOATRACE 津 #09</a></h1>
        <h2>インフォメーション</h2>
        
        <div id="nav">
			<script type="text/javascript">
            funcTsuMenu();
            </script>
        </div><!--/#nav-->
        
        <ul id="header_nav">
            <script type="text/javascript">
            funcTsuHeaderMenu();
            </script>
        </ul><!--/#header_nav-->
    
    </div><!--/#header_img-->
    </div><!--/#header-->
</div><!--/#header_wrap-->




<!--◆◆◆コンテンツ◆◆◆-->

<div id="contents_wrap">
<div id="contents">
	
    <div id="main">
    
    
    
    	<div id="info_nav">
        
        	<h3>{{$target_year}}</h3>
            
            <ul id="btn">
                @foreach ($year_list as $key => $item)
                    @if($key < 3 && $target_year != $item)
            	        <li><a href="/asp/tsu/info/info.asp?Year={{$item}}">{{$item}}</a></li>
                    @endif
                @endforeach
            </ul>
            
        	<div class="clear"></div>
        </div><!--/info_nav-->
        
        
        
        
        <div id="info_wrap">
            @if(!$information_array)
                <p id="nodata">ただいまデータはございません</p>
            @else
                @foreach ($information_array as $item)

                        <a id="id{{$item->ID}}" name="id{{$item->ID}}"></a>

                        @if($item->PC_LINK)
                            @if($item->PC_LINK_WINDOW_FLG)
                                <a href="{{$item->PC_LINK}}" target="_blank">
                            @else
                                <a href="{{$item->PC_LINK}}">
                            @endif
                        @elseif($item->PC_LINK == "" && (!$item->TEXT && !$item->IMAGE_1 && !$item->IMAGE_2 && !$item->IMAGE_3))
                            <a href="javascript:void(0);">
                        @endif

                            <div class="box_wrap {{ $news_class[$item->TYPE] }}">
                            <div class="box">
                                @if($item->NEW_FLG &&  date('Ymd',strtotime('-2 day',time() )) <= $item->VIEW_DATE)
                                    <div class="new">NEW</div>
                                @endif
                                <dl><dt>{{ date('n/j',strtotime($item->VIEW_DATE)) }}<span @if(date('w',strtotime($item->VIEW_DATE)) == 0) class="sun" @elseif(date('w',strtotime($item->VIEW_DATE)) == 6) class="sat" @endif >({{ $general->week_label(date('w',strtotime($item->VIEW_DATE))) }})</span></dt><dd>{{$item->TITLE}}</dd></dl>
                                
                                @if($item->PC_LINK == "" && (!$item->TEXT || !$item->IMAGE_1 || !$item->IMAGE_2 || !$item->IMAGE_3))
                                    <div class="txt">
                                    
                                        <p class="txt_main">
                                            {!! nl2br($item->TEXT) !!}
                                        </p>
                                        
                                        <p class="photo">
                                            @if(!$item->IMAGE_1 && !$item->IMAGE_2 && !$item->IMAGE_3)
                                                <img src="/info/images/txt_img1.png" width="200">
                                            @else
                                                @if($item->IMAGE_1)
                                                    <a href="{{ config('const.IMAGE_PATH.INFORMATION').$item->IMAGE_1}}">
                                                        <img src="{{ config('const.IMAGE_PATH.INFORMATION').$item->IMAGE_1}}" width="200"><span>ZOOM</span>
                                                    </a>
                                                @endif
                                                @if($item->IMAGE_2)
                                                    <a href="{{ config('const.IMAGE_PATH.INFORMATION').$item->IMAGE_2}}">
                                                        <img src="{{ config('const.IMAGE_PATH.INFORMATION').$item->IMAGE_2}}" width="200"><span>ZOOM</span>
                                                    </a>
                                                @endif
                                                @if($item->IMAGE_3)
                                                    <a href="{{ config('const.IMAGE_PATH.INFORMATION').$item->IMAGE_3}}">
                                                        <img src="{{ config('const.IMAGE_PATH.INFORMATION').$item->IMAGE_3}}" width="200"><span>ZOOM</span>
                                                    </a>
                                                @endif
                                            @endif
                                        </p>
                                        <div class="clear"></div>
                                    </div><!--/txt-->
                                @endif


                            </div><!--/box-->
                            </div><!--/box_wrap-->

                        @if($item->PC_LINK)
                            </a>
                        @elseif($item->PC_LINK == "" && ( !$item->TEXT && !$item->IMAGE_1 && !$item->IMAGE_2 && !$item->IMAGE_3))
                            </a>
                        @endif
                @endforeach
            @endif
            
        
        
        </div><!--/info_nav-->
    
    
    
    
    
      <div id="page_top"><a href="#wrapper">UP</a></div>
    </div><!--/#main-->
    
</div><!--/#contents-->
</div><!--/#contents_wrap-->




<!--◆◆◆フッター◆◆◆-->
<div id="footer_wrap">
    <div id="footer">
    	<iframe src="/footer.htm" frameborder="0" allowtransparency="true" scrolling="no" name="footer"></iframe>
    </div><!--/#footer-->
</div><!--/#footer_wrap-->



</div><!--/#wrapper-->




</body>
</html>
