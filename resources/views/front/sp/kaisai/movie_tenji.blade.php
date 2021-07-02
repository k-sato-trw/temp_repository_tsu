<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta name="format-detection" content="telephone=no"/>
<meta name="viewport" content="user-scalable=no">

<title>レースライブ｜ボートレース津</title>
<meta name="Keywords" content="ボートレース津,ボートレース,津,動画,ライブ" />
<meta name="Description" content="ボートレース津が開催するレースの映像、オッズや舟券予想などレースに関する様々な情報がご覧いただけます。" />

<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/sp/kyogi/css/reset.css" />
<link rel="stylesheet" href="/sp/kyogi/css/kyogi.css" />
<link rel="stylesheet" href="/sp/kyogi/css/style.css" />

<script type="text/javascript" src="/sp/kyogi/js/jquery-1.8.3.min.js"></script>

<!-- ビューポート設定 -->
<script type="text/javascript" src="/sp/kyogi/js/monaca.viewport.js"></script>
<script type="text/javascript">
monaca.viewport({
    width : 720
});
</script>

<!-- アドレスバー非表示 -->
<script type="text/javascript" src="/sp/kyogi/js/HideAddressBar.js"></script>

<!-- ドロップダウン -->

<!-- 20200310 yoshino VOD改修 START -->
<style type="text/css">
body {
	background-color: #000;
}
.myplayer {
	/*width: 680px;
	height: 510px;*/
	margin-left: 20px;
}
.myplayer iframe {
}
</style>

<!--<script type="text/javascript" src="/asp/SmartAgentGetter.js"></script>
<script type="text/javascript" src="/asp/FlashPlayerCheck.js"></script>-->
<!-- 20200310 yoshino VOD改修 END -->

</head>
<body>

<div id="wrapper"><!-- wrapper start -->


<div id="header"><!-- header start -->

<h1><a href="/sp/"><div>BOAT RACE 津 09#</div></a></h1>


<div id="replay_menu">

<ul>
<li><a href="replay_list.htm?flag=3"><div>今節</div></a></li>
<li><a href="replay_list.htm?flag=1"><div>レースリプレイ</div></a></li>
<li><a href="replay_final.htm"><div>優勝戦</div></a></li>
</ul>

</div>

</div><!-- header end -->




<div id="movie_play">
    <div class="myplayer">
        <iframe src="https://jlcapi.jlc.ne.jp/sp_bb/Streamer/GetBoatraceReplay.php?VODType={{$strVODType}}&HoldingDay={{$target_date}}&StudiumNo={{$jyo}}&RaceNo={{$race_num}}" frameborder="0" scrolling="no" allowfullscreen="true" style="margin:0;padding:0;width:680px;height:510px;"></iframe>
    </div>
</div>


<div id="movie_btn">

<ul class="cf">

<li id="back"><a href="javascript:history.back();">戻る</a></li>
<li id="refresh"><a href="javascript:location.reload(true);">更新</a></li>

</ul>

</div>

</div><!-- wrapper end -->

<div id="bottom_movie"></div>

</body>

</html>