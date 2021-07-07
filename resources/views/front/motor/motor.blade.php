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

<title>ボートレース津｜モーター＆ボートデータ</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,モーター,ボート">
<meta name="Description" content="BOAT RACE津のモーターとボートの成績をランキング形式で掲載しています。">
<meta name="viewport" content="width=1280px">

<link href="/css/reset.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/css/02motor.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/js/common.js"></script>

<!--コンテンツメニューjs-->
<script type="text/javascript" src="/js/contents_navi_slide.js"></script>
<script type="text/javascript" src="/js/contents_navi_main.js"></script>

<!--ヘッダーメニューjs-->
<script type="text/javascript" src="/js/header_navi.js"></script>

<script type="text/javascript" src="/asp/kyogi/09/pc/Jsinfo.js"></script>
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

<!--テーブル-->
<script type="text/javascript" src="/js/jquery.tablehover.js"></script>
<script type="text/javascript">
<!--
$(function() {
	$('table.data').tableHover ({colClass: 'hover', ignoreCols: [1], rowClass: 'hoverrow', cellClass: 'hovercell'});
});
//-->
</script>


</head>





<body>


<div id="wrapper">




<div id="header_wrap">
    <div id="header">
    <div id="header_img">
    	
        <h1><a href="/">BOATRACE 津 #09</a></h1>
        <h2>モーター＆ボートデータ</h2>
        
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
		
        <div id="memo">
        	<div class="m1">
	            2連率順（選手責任外含む）にランキング形式で掲載。着順欄の <img src="/02motor/images/i_j00.gif">は準優出、<img src="/02motor/images/i_y00.gif">は優出。<br>
            </div>
            
            <dl class="mo">
            	<dt>【モーター】</dt>
                <dd>出走回数、2連率、優出、優勝集計：{{ date('Y/n/j',strtotime($motor_change_race->開始日付)) }}～{{ date('Y/n/j',strtotime($before_race->終了日付)) }}</dd>
                <dd class="mark">※開催毎に使用されるモーターの2連率1位に<img src="/kaisai/images/mt_ic_01.png" width="16">2位に<img src="/kaisai/images/mt_ic_02.png" width="16">3位に<img src="/kaisai/images/mt_ic_03.png" width="16">でマーキング。
				</dd>
            </dl>

            <dl class="bo"> 
             	<dt>【ボート】</dt>
                <dd>出走回数、2連率、優出、優勝集計：{{ date('Y/n/j',strtotime($boat_change_day)) }}～{{ date('Y/n/j',strtotime($before_race->終了日付)) }}</dd>
            </dl>    
            
            <div class="clear"></div>
        </div>
        
        
        
        <!--■モーターデータ■-->
        <div id="motor">
            
            <table class="data">
            <thead>
            <tr>
              <th colspan="7" class="head"><h3>モーター</h3></th>
              </tr>
            <tr>
              <th class="rank">順<br>位</th>
              <th class="number">No.</th>
              <th class="syusso">出走<br>回数</th>
              <th class="ren">2連率</th>
              <th class="yu">優出</th>
              <th class="yu">優勝</th>
              <th class="seiseki">前回成績<span>グレード/使用節/使用者/着順</span></th>
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
                    <td>{{ $item['syussou_count']; }}</td>
                    <td class="ren">
                        @if($motor_change_race->開始日付 == $latest_race->開始日付)
                            -
                        @else
                            {{$item['record']->MOTOR_NIRENRITU}}%
                        @endif
                    </td>
                    <td>{{$item['record']->YUSHUTU_CNT}}</td>
                    <td>{{$item['record']->YUSHO_CNT}}</td>
                    <td class="seiseki">
                        <div class="top">
                            <p class="{{ $general->gradenumber_to_gradename_for_front_syussou($item['motor_rireki_3'][1]['grade']) }}">{{ $general->gradenumber_to_gradename_for_front_syussou($item['motor_rireki_3'][1]['grade']) }}</p>
                            <p class="data">{{$general->create_display_date($item['motor_rireki_3'][1]['start_date'] , $item['motor_rireki_3'][1]['end_date'])}}</p>
                            <p class="name">{{$item['motor_rireki_3'][1]['sensyu_name'] ?? "-"}}({{$item['motor_rireki_3'][1]['kyu_betu'] ?? "-"}})</p>
                        </div>
                        <div class="bot">{!!$item['motor_rireki_3'][1]['tyakujun'] ?? "---"!!}</div>
                    </td>
                </tr>
            @endforeach
            
            </tbody>
            </table>
            
        </div><!--/motor-->


        
        <!--■ボートデータ■-->
        
        <div id="boat">
            
            <table class="data">
            <thead>
            <tr>
              <th colspan="7" class="head"><h3>ボート</h3></th>
              </tr>
            <tr>
              <th class="rank">順<br>位</th>
              <th class="number">No.</th>
              <th class="syusso">出走<br>回数</th>
              <th class="ren">2連率</th>
              <th class="yu">優出</th>
              <th class="yu">優勝</th>
              <th class="seiseki">前回成績<span>グレード/使用節/使用者/着順</span></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($boat_no_syussou as $boat_no => $boat_no_syussou_row)
                    <tr>
                        <td class="rank">{{ $boat_no_syussou_row['rank'] }}</td>
                        <td class="number">{{ (int)$boat_no }}</td>
                        <td>{{ $boat_no_syussou_row['boat_syussou_count'] }}</td>
                        <td class="ren">{{ $boat_no_syussou_row['boat_nirenritu'] }}%</td>
                        <td>{{ $boat_no_syussou_row['boat_yusyutu_count'] }}</td>
                        <td>{{ $boat_no_syussou_row['boat_yusyo_count'] }}</td>
                        <td class="seiseki"><div class="top">
                        <p class="{{ $general->gradenumber_to_gradename_for_front_syussou($boat_no_syussou_row['boat_zenkai_grade']) }}">{{ $general->gradenumber_to_gradename_for_front_syussou($boat_no_syussou_row['boat_zenkai_grade']) }}</p>
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
        
        
        <div class="clear"></div>
        
            
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
