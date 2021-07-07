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

<title>ボートレース津｜モーター＆ボートデータ</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,モーター,ボート">
<meta name="Description" content="BOAT RACE津のモーターとボートの成績をランキング形式で掲載しています。">

<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<link href="/sp/css/reset.css" rel="stylesheet" type="text/css">
<link href="/sp/css/common.css" rel="stylesheet" type="text/css">
<link href="/sp/css/02motor.css" rel="stylesheet" type="text/css">
<link href="/sp/css/font.css" rel="stylesheet" type="text/css">


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

 
<!--tdカラー用-->
<script type="text/javascript">
$(document).ready(function(){
  // 偶数行にのみクラスを指定
  $("table.data").find("tr:odd").addClass("odd");
});
</script>

<!--テーブルヘッダー固定-->
<script src="/js/jquery.fixedTableHeader.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('table.data').fixedTableHeader();
  });
</script>


<script type="text/javascript" src="/asp/kyogi/09/pc/Jsinfo.js"></script>

</head>



<body>


<div id="wrapper">

<!--◆◆◆header◆◆◆-->

<div id="header_wrap">
<div id="header">
<h1><a href="/sp/">BOATRACE 津 #09</a></h1>
</div><!--/#header-->
<h2>モーター＆ボートデータ</h2>

<div id="nav">
	<script type="text/javascript">
                funcTsuMenu();
    </script>
</div><!--/#nav-->

</div><!--/#header_wrap-->


<!--◆◆◆コンテンツ◆◆◆-->	
<div id="main">
<!-- ▼▼▼本文開始▼▼▼ -->


<div id="memo">
	<div class="m1">
		2連率順にランキング形式で掲載<br>（2連率には選手責任外含む）。<br>
		着順欄の <img src="/sp/02motor/images/i_j00.gif">は準優出、<img src="/sp/02motor/images/i_y00.gif">は優出。
    </div>

	<dl class="mo">
    	<dt>【モーター集計】</dt>
        {{ date('Y/n/j',strtotime($motor_change_race->開始日付)) }}～{{ date('Y/n/j',strtotime($before_race->終了日付)) }}        <dd class="mark">※開催毎に使用されるモーターの2連率1位に<img src="/sp/images/mt_ic_01.png" width="24">2位に<img src="/sp/images/mt_ic_02.png" width="24">3位に<img src="/sp/images/mt_ic_03.png" width="24">でマーキング。</dd>
    </dl>
        
    <dl class="bo">
        <dt>【ボート集計】</dt>
        {{ date('Y/n/j',strtotime($boat_change_day)) }}～{{ date('Y/n/j',strtotime($before_race->終了日付)) }}    </dl>
	
    <div class="clear"></div>
</div>


<ul class="tabs">
<li class="b1"><a href="#motor" data-tor-smoothscroll="noSmooth"><span>モーター</span></a></li>
<li class="b2"><a href="#boat" data-tor-smoothscroll="noSmooth"><span>ボート</span></a></li>
<div class="clear"></div>
</ul>



        <!--■モーターデータ■-->
        <div id="motor" class="tab_content">
            
<table class="data">
            <thead>
            <tr>
              <th rowspan="2" class="rank">順<br>位</th>
              <th rowspan="2" class="number">No.</th>
              <th class="ren">2連率</th>
              <th class="yusyo">優勝</th>
              <th rowspan="2" class="seiseki">前回成績<span>グレード/使用節/使用者/着順</span></th>
            </tr>
            <tr>
              <th class="syusso">出走数</th>
              <th class="yushu">優出</th>
              </tr>
            </thead>
            <tbody>
                @foreach($motor_list_array as $item)
                    <tr>
                        <td class="rank">{{$item['rank']}}</td>
                        <td class="number">
                            <script type="text/javascript">
                                func_MotorRank('99999999' , '{{ (int)$item['record']->MOTOR_NO }}' );
                            </script>
                        </td>
                        <td class="ren">
                            <div class="top">
                                @if($motor_change_race->開始日付 == $latest_race->開始日付)
                                    -
                                @else
                                    {{$item['record']->MOTOR_NIRENRITU}}%
                                @endif
                            </div>
                            <div class="bot">{{ $item['syussou_count']; }}</div>
                        </td>
                        <td class="yusyo"><div class="top">{{$item['record']->YUSHO_CNT}}</div><div class="bot">{{$item['record']->YUSHUTU_CNT}}</div></td>
                        <td class="seiseki"><div class="top">
                        <p class="{{ $general->gradenumber_to_gradename_for_front_syussou($item['motor_rireki_3'][1]['grade']) }}">{{ $general->gradenumber_to_gradename_for_plofile($item['motor_rireki_3'][1]['grade']) }}</p>
                        <p class="data">{{$general->create_display_date($item['motor_rireki_3'][1]['start_date'] , $item['motor_rireki_3'][1]['end_date'])}}</p>
                        <p class="name">{{$item['motor_rireki_3'][1]['sensyu_name'] ?? "-"}}({{$item['motor_rireki_3'][1]['kyu_betu'] ?? "-"}})</p>
                        </div>
                        <div class="bot">{!!$item['motor_rireki_3'][1]['tyakujun'] ?? "---"!!}</div></td>
                    </tr>
                @endforeach
            </tbody>
            </table>            
        </div><!--/motor-->


        
        <!--■ボートデータ■-->
        
        <div id="boat" class="tab_content">
            
            <table class="data">
            <thead>
            <tr>
              <th rowspan="2" class="rank">順<br>位</th>
              <th rowspan="2" class="number">No.</th>
              <th class="ren">2連率</th>
              <th class="yusyo">優勝</th>
              <th rowspan="2" class="seiseki">前回成績<span>グレード/使用節/使用者/着順</span></th>
            </tr>
            <tr>
              <th class="syusso">出走数</th>
              <th class="yushu">優出</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($boat_no_syussou as $boat_no => $boat_no_syussou_row)
                    <tr>
                        <td class="rank">{{ $boat_no_syussou_row['rank'] }}</td>
                        <td class="number">{{ (int)$boat_no }}</td>
                        <td class="ren"><div class="top">{{ $boat_no_syussou_row['boat_nirenritu'] }}%</div><div class="bot">{{ $boat_no_syussou_row['boat_syussou_count'] }}</div></td>
                        <td class="yusyo"><div class="top">{{ $boat_no_syussou_row['boat_yusyo_count'] }}</div><div class="bot">{{ $boat_no_syussou_row['boat_yusyutu_count'] }}</div></td>
                        <td class="seiseki"><div class="top">
                            <p class="{{ $general->gradenumber_to_gradename_for_front_syussou($boat_no_syussou_row['boat_zenkai_grade']) }}">{{ $general->gradenumber_to_gradename_for_plofile($boat_no_syussou_row['boat_zenkai_grade']) }}</p>
                            <p class="data">{{ $general->create_display_date($boat_no_syussou_row['boat_zenkai_start_date'],$boat_no_syussou_row['boat_zenkai_end_date']) }}</p>
                            <p class="name">{{ $boat_no_syussou_row['boat_zenkai_name'] }}({{ $boat_no_syussou_row['boat_zenkai_kyu'] }})</p>
                        </div>
                            <div class="bot">{!! $boat_no_syussou_row['boat_zenkai_tyakujun'] !!}</div></td>
                        </tr>
                    <tr>                    
                @endforeach
            </tbody>
            </table>
            
        </div><!--/boat-->
        







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
