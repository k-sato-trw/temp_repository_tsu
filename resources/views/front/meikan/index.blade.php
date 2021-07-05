
<!doctype html>
<html>
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_pc.js"></script>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">

<title>ボートレース津｜三重支部名鑑</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,三重支部,級別,名鑑">
<meta name="Description" content="三重支部に所属する選手の成績、あっせん情報を掲載しています。">
<meta name="viewport" content="width=1280px">

<link href="/css/reset.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/css/06meikan.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/js/common.js"></script>

<!--コンテンツメニューjs-->
<script type="text/javascript" src="/js/contents_navi_slide.js"></script>
<script type="text/javascript" src="/js/contents_navi_main.js"></script>

<!--ヘッダーメニューjs-->
<script type="text/javascript" src="/js/header_navi.js"></script>

<!--ソートボタン固定-->
<script type="text/javascript">
$(function(){
    var box    = $("#filter_nav_area");
    var boxTop = box.offset().top;
    $(window).scroll(function () {
        if($(window).scrollTop() >= boxTop) {
            box.addClass("fixed");
			$("#contentInner").css("margin-top","165px");
        } else {
            box.removeClass("fixed");
			$("#contentInner").css("margin-top","0px");
        }
    });
});
</script>

<!--fancybox-->
<script type="text/javascript" src="/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" href="/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<script type="text/javascript">
    $(function(){
        $(".box a").fancybox({
			'type' : 'iframe',
			'width' : 970,
			'height' : 680,
			'scrolling' : 'no',
			'padding' : 0,
			'autoScale': false,
			'centerOnScroll' : true
		});
    });
</script>


<!--ソート-->
<script src="/js/masonry.pkgd.min.js"></script>
<script>
    $(function(){

      var 
        speed = 200,   // animation speed
        $wall = $('#contentInner').find('.wrap')
      ;

      $wall.masonry({
        columnWidth: 280, 
        // only apply masonry layout to visible elements
        itemSelector: '.box:not(.invis)',
        animate: true,
        animationOptions: {
          duration: speed,
          queue: false
        }
      });

      $('#filtering-nav li').click(function(){
		$("html,body").animate({scrollTop:0},"100");
		$('#filtering-nav li').removeAttr('id');
		$(this).attr('id', 'active');
		
        var colorClass = '.' + $(this).attr('class');

        if(colorClass=='.all') {
          // show all hidden boxes
			$wall.children('.invis').toggleClass('invis').fadeIn(speed);
			$('.box a').attr('rel', 'group');
        } else {  
          // hide visible boxes 
			$wall.children().not(colorClass).not('.invis').toggleClass('invis').fadeOut(speed);
			$wall.children().not(colorClass).children('a').removeAttr('rel');
          // show hidden boxes
			$wall.children(colorClass+'.invis').toggleClass('invis').fadeIn(speed);
			$wall.children(colorClass).children('a').attr('rel', 'group');
        }
        $wall.masonry();

        return false;
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
        <h2>三重支部名鑑</h2>
        
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
    
    
    
    
    	<div id="filter_nav_area">
            
        	<p id="lead">三重支部レーサー{{count($fan_data_array)}}名を「{{$kibetu_display}}」級別で掲載。レースデータ、あっせん情報は{{date('Y/n/j',strtotime($target_date))}}現在。</p>

            <div id="filtering-nav">
            	<ul id="filter1">
                	<li class="all" id="active">ALL<span>{{count($fan_data_array)}}名</span></li>
                </ul>
                <ul id="filter2">
                    <li class="A1">A1<span>{{ $kyu_count['A1'] }}名</span></li>
                    <li class="A2">A2<span>{{ $kyu_count['A2'] }}名</span></li>
                    <li class="B1">B1<span>{{ $kyu_count['B1'] }}名</span></li>
                    <li class="B2">B2<span>{{ $kyu_count['B2'] }}名</span></li>
                </ul>
                <ul id="filter3">
                    <li class="N1">2501~4000<span>{{ $touban_count['N1'] }}名</span></li>
                    <li class="N2">4001~4500<span>{{ $touban_count['N2'] }}名</span></li>
                    <li class="N3">4501~5500<span>{{ $touban_count['N3'] }}名</span></li>
                </ul>
                <ul id="filter4">
                	<li class="lady">女性レーサー<span>{{ $lady_count }}名</span></li>
                </ul>
            </div>
            
        </div><!--/filter_nav_area-->
        
        
        

          
        <div id="contentInner">
        <div class="wrap">
        
            
            <!--▼▼▼-->

            <!--▲▲▲-->
        @foreach ($assen as $item)
            <div class="box {{ $fan_data_array[$item->登録番号]->Kyu }} {{ $fan_data_array[$item->登録番号]->touban_count }} @if($fan_data_array[$item->登録番号]->Sei == 2) lady @endif ">
                <a class="iframe" href="/asp/htmlmade/tsu/06meikan/racer_data.htm?id=d{{ $item->登録番号 }}" data-fancybox-type="iframe" rel="group">
                    <img src="/06meikan/racer_img/{{ $item->登録番号 }}.jpg" class="photo">
                    <dl class="name">
                        <dt>{{ $fan_data_array[$item->登録番号]->Kyu }}<span>{{ $item->登録番号 }}</span></dt>
                        <dd>{{ str_replace("　","" , $fan_data_array[$item->登録番号]->nameK) }}</dd>
                    </dl>
                </a>
            </div>
        @endforeach
            
        <!-- /.wrap --></div> 
        <!-- /#contentInner --></div> 
    




    
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
