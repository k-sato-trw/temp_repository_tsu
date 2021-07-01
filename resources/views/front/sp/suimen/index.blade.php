
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

<title>ボートレース津｜水面＆コース別データ</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,水面,特徴,コース別成績">
<meta name="Description" content="BOAT RACE津の水面特性やコース別成績を掲載しています。">

<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<link href="/sp/css/reset.css" rel="stylesheet" type="text/css">
<link href="/sp/css/common.css" rel="stylesheet" type="text/css">
<link href="/sp/css/02suimen.css" rel="stylesheet" type="text/css">


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

<!-- タブ -->
<script type="text/javascript" src="/sp/js/tabs.js"></script>



</head>



<body>


<div id="wrapper">

<!--◆◆◆header◆◆◆-->

<div id="header_wrap">
<div id="header">
<h1><a href="/sp/">BOATRACE 津 #09</a></h1>
</div><!--/#header-->
<h2>水面＆コース別データ</h2>

<div id="nav">
	<script type="text/javascript">
                funcTsuMenu();
    </script>
</div><!--/#nav-->

</div><!--/#header_wrap-->


<!--◆◆◆コンテンツ◆◆◆-->	
<div id="main">
<!-- ▼▼▼本文開始▼▼▼ -->




<ul class="tabs">
<li class="b1"><a href="#suimen" data-tor-smoothscroll="noSmooth"><span>水面特性</span></a></li>
<li class="b2"><a href="#sinnyu" data-tor-smoothscroll="noSmooth"><span>進入コース別入着率</span></a></li>
<div class="clear"></div>
</ul>



        <!--■水面特性■-->
		<div id="suimen" class="tab_content">
            <img src="/sp/02suimen/images/suimen_img.png" id="suimen_img"> 

			<!--PC・SP共通-->
            <!--#exec cgi="/02suimen/tokusei.htm"-->
            {!! file_get_contents(config('const.EXPORT_PATH')."/02suimen/tokusei.htm") !!}
			<!--/PC・SP共通-->
            
        </div><!--/suimen-->




        <!--■進入コース別入着率■-->
		<div id="sinnyu" class="tab_content">
        
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
                <tr>

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
