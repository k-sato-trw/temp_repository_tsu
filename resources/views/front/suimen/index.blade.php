<!doctype html>
<html>
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_pc.js"></script>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">

<title>ボートレース津｜水面＆コース別データ</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,水面,特徴,コース別成績">
<meta name="Description" content="BOAT RACE津の水面特性やコース別成績を掲載しています。">
<meta name="viewport" content="width=1280px">

<link href="/css/reset.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/css/02suimen.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/js/common.js"></script>

<!--コンテンツメニューjs-->
<script type="text/javascript" src="/js/contents_navi_slide.js"></script>
<script type="text/javascript" src="/js/contents_navi_main.js"></script>

<!--ヘッダーメニューjs-->
<script type="text/javascript" src="/js/header_navi.js"></script>

</head>





<body>


<div id="wrapper">




<div id="header_wrap">
    <div id="header">
    <div id="header_img">
    	
        <h1><a href="/">BOATRACE 津 #09</a></h1>
        <h2>水面＆コース別データ</h2>
        
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
		
        
        <!--■水面特性■-->
		<div id="suimen">
        	<h3><span>水面特性</span></h3>
            
            <img src="/02suimen/images/suimen_img.png" id="suimen_img">  


			<!--PC・SP共通-->
            <!--#exec cgi="/02suimen/tokusei.htm"-->
            {!! file_get_contents(config('const.EXPORT_PATH')."/02suimen/tokusei.htm") !!}
			<!--/PC・SP共通-->

                              
            <div class="clear"></div>
        </div><!--/suimen-->


        <!--■進入コース別入着率■-->
		<div id="sinnyu">
        	<h3><span>進入コース別入着率</span></h3>
        
        	<!--春-->
            <div id="spring">
            <dl>
            	<dt>spring</dt>
                <dd>{{ date('Y/n/j',strtotime($haru->SHUKEI_FDATE)) }}～{{ date('n/j',strtotime($haru->SHUKEI_EDATE)) }}</dd>
            </dl>
        	<table>
              <tbody>
              <tbody>
                <tr><th scope="col" class="th1">&nbsp;</th><th scope="col">1着</th><th scope="col" class="border">2着</th><th scope="col">3着</th></tr>
                @for($course = 1;$course <= 6;$course++)
                    <tr>
                        <th scope="row" class="th2">{{$course}}コース</th>
                        @for($chaku = 1;$chaku <= 3;$chaku++)
                            <?php $prop_name = "COURSE_SINNYURITU".$chaku.$course ?>
                            <td @if($chaku == 2) class="border" @endif >{{ $haru->$prop_name ?? '--.-' }}    </td>
                        @endfor
                    </tr>
                @endfor
              </tbody>
            </table>
            </div><!--/spring-->


        	<!--夏-->
            <div id="summer">
            <dl>
            	<dt>summer</dt>
                <dd>{{ date('Y/n/j',strtotime($natu->SHUKEI_FDATE)) }}～{{ date('n/j',strtotime($natu->SHUKEI_EDATE)) }}</dd>
            </dl>
        	<table>
              <tbody>
              <tbody>
                <tr><th scope="col" class="th1">&nbsp;</th><th scope="col">1着</th><th scope="col" class="border">2着</th><th scope="col">3着</th></tr>
                @for($course = 1;$course <= 6;$course++)
                    <tr>
                        <th scope="row" class="th2">{{$course}}コース</th>
                        @for($chaku = 1;$chaku <= 3;$chaku++)
                            <?php $prop_name = "COURSE_SINNYURITU".$chaku.$course ?>
                            <td @if($chaku == 2) class="border" @endif >{{ $natu->$prop_name ?? '--.-' }}    </td>
                        @endfor
                    </tr>
                @endfor
              </tbody>
            </table>
            </div><!--/summer-->


        	<!--秋-->
            <div id="autumn">
            <dl>
            	<dt>autumn</dt>
                <dd>{{ date('Y/n/j',strtotime($aki->SHUKEI_FDATE)) }}～{{ date('n/j',strtotime($aki->SHUKEI_EDATE)) }}</dd>
            </dl>
        	<table>
              <tbody>
              <tbody>
                <tr><th scope="col" class="th1">&nbsp;</th><th scope="col">1着</th><th scope="col" class="border">2着</th><th scope="col">3着</th></tr>
                @for($course = 1;$course <= 6;$course++)
                    <tr>
                        <th scope="row" class="th2">{{$course}}コース</th>
                        @for($chaku = 1;$chaku <= 3;$chaku++)
                            <?php $prop_name = "COURSE_SINNYURITU".$chaku.$course ?>
                            <td @if($chaku == 2) class="border" @endif >{{ $aki->$prop_name ?? '--.-' }}    </td>
                        @endfor
                    </tr>
                @endfor
              </tbody>
            </table>
            </div><!--/autumn-->


        	<!--冬-->
            <div id="winter">
            <dl>
            	<dt>winter</dt>
                <dd>{{ date('Y/n/j',strtotime($fuyu->SHUKEI_FDATE)) }}～{{ date('n/j',strtotime($fuyu->SHUKEI_EDATE)) }}</dd>
            </dl>
        	<table>
              <tbody>
                <tr><th scope="col" class="th1">&nbsp;</th><th scope="col">1着</th><th scope="col" class="border">2着</th><th scope="col">3着</th></tr>
                @for($course = 1;$course <= 6;$course++)
                    <tr>
                        <th scope="row" class="th2">{{$course}}コース</th>
                        @for($chaku = 1;$chaku <= 3;$chaku++)
                            <?php $prop_name = "COURSE_SINNYURITU".$chaku.$course ?>
                            <td @if($chaku == 2) class="border" @endif >{{ $fuyu->$prop_name ?? '--.-' }}    </td>
                        @endfor
                    </tr>
                @endfor
              </tbody>
            </table>
            </div><!--/winter-->

		
        <div class="clear"></div>
        </div><!--/sinnyu-->
        
        
    
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
