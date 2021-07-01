@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_sp.js"></script>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="user-scalable=no">

<title>ボートレース津｜インフォメーション</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,新着,ニュース,更新,お知らせ">
<meta name="Description" content="BOAT RACE津からのお知らせやホームページの更新情報などを掲載しています。">

<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<link href="/sp/css/reset.css" rel="stylesheet" type="text/css">
<link href="/sp/css/common.css" rel="stylesheet" type="text/css">
<link href="/sp/css/info.css" rel="stylesheet" type="text/css">


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

<!-- アコーディオン -->
<script type="text/javascript" src="/sp/js/jquery.accordion.js"></script>

<!--photozoom-->
<link rel="stylesheet" type="text/css" href="/sp/js/colorbox/colorbox.css" />
<script src="/sp/js/colorbox/jquery.colorbox.js"></script>
<script>
$(document).ready(function(){
	$(".photo a").colorbox({
		width:"680px",
		opacity:"0.5"
	});
});
</script>

<script>
function DataReceive(){
	var strhash
}
</script>
</head>



<body onload="DataReceive();">


<div id="wrapper">

<!--◆◆◆header◆◆◆-->

<div id="header_wrap">
<div id="header">
<h1><a href="/sp/">BOATRACE 津 #09</a></h1>
</div><!--/#header-->
<h2>インフォメーション</h2>

<div id="nav">
	<script type="text/javascript">
                funcTsuMenu();
    </script>
</div><!--/#nav-->

</div><!--/#header_wrap-->


<!--◆◆◆コンテンツ◆◆◆-->	
<div id="main">
<!-- ▼▼▼本文開始▼▼▼ -->






    	<div id="info_nav">
        
        	<h3>{{$target_year}}</h3>
            
            <ul id="btn">
                @foreach ($year_list as $key => $item)
                    @if($key < 3 && $target_year != $item)
            	        <li><a href="/asp/tsu/sp/info/info_SP.asp?Year={{$item}}">{{$item}}</a></li>
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

                    @if($item->SP_LINK)
                        @if($item->SP_LINK_WINDOW_FLG)
                            <a href="{{$item->SP_LINK}}" target="_blank">
                        @else
                            <a href="{{$item->SP_LINK}}">
                        @endif
                    @elseif($item->SP_LINK == "" && (!$item->TEXT && !$item->IMAGE_1 && !$item->IMAGE_2 && !$item->IMAGE_3))
                        <a href="javascript:void(0);">
                    @endif

                        <div class="box_wrap {{ $news_class[$item->TYPE] }}">
                        <div class="box">

                            @if($item->NEW_FLG &&  date('Ymd',strtotime('-2 day',time() )) <= $item->VIEW_DATE)
                                <div class="new">NEW</div>
                            @endif

                            <dl id = "dl{{$item->ID}}"  @if($select_id == $item->ID) class="open" @endif ><dt>{{ date('n/j',strtotime($item->VIEW_DATE)) }}<span  @if(date('w',strtotime($item->VIEW_DATE)) == 0) class="sun" @elseif(date('w',strtotime($item->VIEW_DATE)) == 6) class="sat" @endif >({{ $general->week_label(date('w',strtotime($item->VIEW_DATE))) }})</span></dt><dd>{{$item->TITLE}}</dd></dl>
                            
                            @if($item->SP_LINK == "" && (!$item->TEXT || !$item->IMAGE_1 || !$item->IMAGE_2 || !$item->IMAGE_3))
                                <div class="txt" id ="txt{{$item->ID}}" @if($select_id == $item->ID) style="display:block;" @endif >

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
                @endforeach
            
            @endif
        
        </div><!--/info_nav-->

</div><!--/#main-->


<!--◆◆◆ページアップ◆◆◆-->
<div id="page_up"><a href="#wrapper">UP</a></div>
<div class="clear"></div>



<!--◆◆◆フッター◆◆◆-->
<div id="footer_wrap">
<div id="ft_logo">
<img src="/sp/images/sp_ft_logo.png" width="342" height="50" alt=""/></div>
<div id="ft_credit">&copy;BOAT RACE TSU All rights reserved.</div></div>


</div><!--/#wrapper-->

</body>
</html>
