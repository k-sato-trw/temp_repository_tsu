
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

<title>ボートレース津｜三重支部名鑑</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,三重支部,級別,名鑑">
<meta name="Description" content="三重支部に所属する選手の成績、あっせん情報を掲載しています。">

<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<link href="/sp/css/reset.css" rel="stylesheet" type="text/css">
<link href="/sp/css/common.css" rel="stylesheet" type="text/css">
<link href="/sp/css/06meikan.css" rel="stylesheet" type="text/css">


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


<!--ソート-->
<script src="/js/masonry.pkgd.min.js"></script>
<script>
	var intSelect = 0;
    $(function(){

      var 
        speed = 200,   // animation speed
        $wall = $('#contentInner').find('.wrap')
      ;

      $wall.masonry({
        columnWidth: 230, 
        // only apply masonry layout to visible elements
        itemSelector: '.box:not(.invis)',
        animate: true,
        animationOptions: {
          duration: speed,
          queue: false
        }
      });

      $('#filtering-nav li').click(function(){
		$("html,body").animate({scrollTop:730},"100");
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
        if(colorClass=='.A1') {
			intSelect = 1;
        }else if(colorClass=='.A2') {
			intSelect = 2;
        }else if(colorClass=='.B1') {
			intSelect = 3;
        }else if(colorClass=='.B2') {
			intSelect = 4;
        }else if(colorClass=='.N1') {
			intSelect = 5;
        }else if(colorClass=='.N2') {
			intSelect = 6;
        }else if(colorClass=='.N3') {
			intSelect = 7;
        }else if(colorClass=='.lady') {
			intSelect = 8;
        }else{
			intSelect = 0;
        }
        $wall.masonry();

        return false;
      });

    });
	//html版 引数取得javascript
	var intView = "";
	var arg = location.search; //引数を取得

	//URL を ? で分割
	var aSplit1 = arg.split("?");
	if( aSplit1.length > 1 ){
		//URL を &で分割
		var aSplit2 = aSplit1[1].split("&");
		var i;
		var iMax = aSplit2.length;

		// &で分割した物を = で分割
		for( i = 0; i< iMax; i++ ){
			if( i < 1 ){
				aSplit3 = aSplit2[i].split("=");
				intView += aSplit3[1];
			}
		}
	}

function funcClick( )
{
	if( intView != 0 )
	{
		if( intView === "1" ){
			$("#id_A1").click();
		}else if( intView === "2" ){
			$("#id_A2").click();
		}else if( intView === "3" ){
			$("#id_B1").click();
		}else if( intView === "4" ){
			$("#id_B2").click();
		}else if( intView === "5" ){
			$("#id_N1").click();
		}else if( intView === "6" ){
			$("#id_N2").click();
		}else if( intView === "7" ){
			$("#id_N3").click();
		}else if( intView === "8" ){
			$("#id_lady").click();
		}
	}
}
function funcLink( argData )
{
	location.href = "/asp/htmlmade/tsu/sp/06meikan/racer_data/" + argData + ".htm?select=" + intSelect + "";
}
  </script>


</head>



<body onload="funcClick( );">


<div id="wrapper">

<!--◆◆◆header◆◆◆-->

<div id="header_wrap">
<div id="header">
<h1><a href="/sp/">BOATRACE 津 #09</a></h1>
</div><!--/#header-->
<h2>三重支部名鑑</h2>

<div id="nav">
	<script type="text/javascript">
                funcTsuMenu();
    </script>
</div><!--/#nav-->

</div><!--/#header_wrap-->


<!--◆◆◆コンテンツ◆◆◆-->	
<div id="main">
<!-- ▼▼▼本文開始▼▼▼ -->




    	<div id="filter_nav_area">
        
        	<p id="lead">三重支部レーサー{{count($fan_data_array)}}名を「{{$kibetu_display}}」級別で掲載。<br>レースデータ、あっせん情報は{{date('Y/n/j',strtotime($target_date))}}現在。</p>

            <div id="filtering-nav">
                <div id="filter2">
                	<h4>級別</h4>
                	<ul>
                    <li class="A1" id="id_A1">A1<span>{{ $kyu_count['A1'] }}名</span></li>
                    <li class="A2" id="id_A2">A2<span>{{ $kyu_count['A2'] }}名</span></li>
                    <li class="B1" id="id_B1">B1<span>{{ $kyu_count['B1'] }}名</span></li>
                    <li class="B2" id="id_B2">B2<span>{{ $kyu_count['B2'] }}名</span></li>
                	</ul>
                    <div class="clear"></div>
                </div>
                <div id="filter3">
                	<h4>登録<br>番号</h4>
               		<ul>
                    <li class="N1" id="id_N1">2501~4000<span>{{ $touban_count['N1'] }}名</span></li>
                    <li class="N2" id="id_N2">4001~4500<span>{{ $touban_count['N2'] }}名</span></li>
                    <li class="N3" id="id_N3">4501~5500<span>{{ $touban_count['N3'] }}名</span></li>
                	</ul>
                    <div class="clear"></div>
                </div>
            	<ul id="filter1">
                	<li class="all" id="active">ALL<span>{{count($fan_data_array)}}名</span></li>
                    <li class="lady" id="id_lady">女性レーサー<span>{{ $lady_count }}名</span></li>
                    <div class="clear"></div>
                </ul>
            </div>
            
        </div><!--/filter_nav_area-->
        
        
        

          
        <div id="contentInner">
        <div class="wrap">
        
            
            <!--▼▼▼-->

            <!--▲▲▲-->
        @foreach ($assen as $item)
            <div class="box {{ $fan_data_array[$item->登録番号]->Kyu }} {{ $fan_data_array[$item->登録番号]->touban_count }} @if($fan_data_array[$item->登録番号]->Sei == 2) lady @endif ">
                <a class="iframe" href="javascript:funcLink( {{ $item->登録番号 }} );" data-fancybox-type="iframe" rel="group">
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
