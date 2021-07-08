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

<title>ボートレース津｜開催日程</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,津インクル,スケジュール,開催日程,外向発売">
<meta name="Description" content="BOAT RACE津の開催レースをはじめ場外、外向の発売情報を掲載しています。">

<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href="/sp/css/reset.css" rel="stylesheet" type="text/css">
<link href="/sp/css/common.css" rel="stylesheet" type="text/css">
<link href="/sp/css/01cal.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

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

<!--タブjs-->
<script type="text/javascript" src="/sp/js/tabs.js"></script>

<script type="text/javascript">
function Change(argData){

	if( document.getElementById( "Change" ) ){
		if(argData == "1"){
			document.getElementById( "Change" ).innerHTML = "<a href=\"#tab2\" data-tor-smoothscroll=\"noSmooth\" onclick=\"Change(2);\">本場発売</a>";
		}else{
			document.getElementById( "Change" ).innerHTML = "<a href=\"#tab1\" data-tor-smoothscroll=\"noSmooth\" onclick=\"Change(1);\"><p>津インクル</p><span>(外向発売所)</span></a>";
		}
	}
}
</script>
</head>



<body>


<div id="wrapper">

<!--◆◆◆header◆◆◆-->

<div id="header_wrap">
<div id="header">
<h1><a href="/sp/">BOATRACE 津 #09</a></h1>
</div><!--/#header-->
<h2>開催日程</h2>

<div id="nav">
	<script type="text/javascript">
                funcTsuMenu();
    </script>
</div><!--/#nav-->

</div><!--/#header_wrap-->


<!--◆◆◆コンテンツ◆◆◆-->	
<div id="main">
<!-- ▼▼▼本文開始▼▼▼ -->






<div id="cal">

<div id="hd">
<div id="hd_l">

<div id="mo">
<div id="mo_l"></div><!-- /#mo_l -->
<div id="mo_m">7月</div><!-- /#mo_m -->
<div id="mo_r">
<a href="/asp/tsu/sp/01cal/01cal.asp?yd=20210808">
<img src="/sp/01cal/images/com_ic02.png" width="19" height="28"></a>
</div><!-- /#mo_r -->
<div class="clear"></div>
</div><!-- /#mo -->

</div><!-- /#hd_l -->


<div id="hd_r">
<div id="sotomuke">
<ul class="tabs">
<li class="st00"><div id="Change"><a href="#tab1" data-tor-smoothscroll="noSmooth" onclick="Change(1);"><p>津インクル</p><span>(外向発売所)</span></a></div></li></ul>
</div><!-- /#sotomuke -->
</div><!-- /#hd_r -->
<div class="clear"></div>

</div><!-- /#hd-->


<div id="note">
<span class="sg">■</span>SG <span class="g1">■</span>G1 <span class="g2">■</span>G2 <span class="g3">■</span>G3 <span class="g0">■</span>一般 <br>
<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30">：ナイター　
<img src="/sp/01cal/images/sp_mark_2.png" width="30" height="30">：女子戦
<br>
<img src="/sp/01cal/images/sp_mark_3.png" width="30" height="30">：薄暮　　　

<div id="monthly">マンスリーボートレース</div>
</div><!-- /#note -->



<!-- ▼▼▼本場発売▼▼▼ -->
<div id="tab1" class="tab_content">
<table id="ta_hon">
<col class="day" />
<col class="day" /> 
<col class="hon" /> 
<col class="gai4" />
<col class="gai4" />
<col class="gai4" />
<col class="gai4" />
<col class="tv" />
  <tr>
    <th colspan="2">&nbsp;</th>
    <th>本場開催</th>
    <th colspan="4">場外発売</th>
    <th>TV</th>
  </tr>
    @for($day = 1; $day <= $now_month_last_day; $day++)
        <tr>
            <td>{{$day}}</td>
            @if(date('w',strtotime($now_year . $now_month . $day)) == 0)
                <td class="sun">
            @elseif(date('w',strtotime($now_year . $now_month . $day)) == 6)
                <td class="sat">
            @else
                <td>
            @endif
                {{ $week_label[date('w',strtotime($now_year . $now_month . $day))] }}
            </td>
            @if($honjyo_array[$day]['type'] == "head")
                <td rowspan="{{ $honjyo_array[$day]['colspan'] }}" class="{{ $general->gradenumber_to_gradename_for_front_syussou($honjyo_array[$day]['record']['GRADE']) }}">
                    @if($honjyo_array[$day]['record']['RACE_TITLE'])
                        {{ $honjyo_array[$day]['record']['RACE_TITLE'] }}                                       
                    @else
                        {{ $general->jyocode_to_jyoname($honjyo_array[$day]['record']['JYO']) }}
                    @endif
                </td>
            @elseif($honjyo_array[$day]['type'] == "blank")
                <td>&ensp;</td>
            @elseif($honjyo_array[$day]['type'] == "close")
                <td rowspan="{{ $honjyo_array[$day]['colspan'] }}" class="close">
                    休館
                </td>
            @endif
            
            @if($honjyonai_lines[1][$day]['type'] == "head")
                <td rowspan="{{ $honjyonai_lines[1][$day]['colspan'] }}" class="jg{{ $honjyonai_lines[1][$day]['record']['GRADE'] }}">
                    {{ $general->gradenumber_to_gradename_for_cms_calendar($honjyonai_lines[1][$day]['record']['GRADE']) }}
                    @if($honjyonai_lines[1][$day]['record']['LADY_FLG'])
                        <img src="/sp/01cal/images/sp_mark_2.png">
                    @endif
                    @if($honjyonai_lines[1][$day]['record']['RACE_TITLE'])
                        {{ $general->jyocode_to_jyoname($honjyonai_lines[1][$day]['record']['JYO']) }}{{ $honjyonai_lines[1][$day]['record']['RACE_TITLE'] }}
                    @elseif($honjyonai_lines[1][$day]['record']['CALENDAR_RACE_TITLE'])
                        {{ $honjyonai_lines[1][$day]['record']['CALENDAR_RACE_TITLE'] }}                                           
                    @else
                        {{ $general->jyocode_to_jyoname($honjyonai_lines[1][$day]['record']['JYO']) }}
                    @endif
                </td>
            @elseif($honjyonai_lines[1][$day]['type'] == "blank")
                <td>&ensp;</td>
            @elseif($honjyonai_lines[1][$day]['type'] == "close")
                <td colspan="{{count($honjyonai_lines)}}" rowspan="{{ $honjyonai_lines[1][$day]['colspan'] }}" class="kyukan">
                    休館
                </td>
            @endif

            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    @endfor
  <tr>
    <td>1</td>
                    <td>木</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>2</td>
                    <td>金</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>3</td>
                    <td class="sat">土</td>
                    <td>&nbsp;</td>
                <td rowspan="2" class="jg2">
G2<br>三国</td>
                <td rowspan="2" class="jg0">
常滑</td>
                <td rowspan="2" class="jg0">
宮島</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>4</td>
                    <td class="sun">日</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>5</td>
                    <td>月</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>6</td>
                    <td>火</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>7</td>
                    <td>水</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>8</td>
                    <td>木</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>9</td>
                    <td>金</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>10</td>
                    <td class="sat">土</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>11</td>
                    <td class="sun">日</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>12</td>
                    <td>月</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>13</td>
                    <td>火</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>14</td>
                    <td>水</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>15</td>
                    <td>木</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>16</td>
                    <td>金</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>17</td>
                    <td class="sat">土</td>
                    <td>&nbsp;</td>
                <td rowspan="2" class="jg2">
G2<br>びわこ</td>
                <td rowspan="2" class="jg3">
G3<img src="/sp/01cal/images/sp_mark_2.png" width="30" height="30"><br>児島</td>
                <td rowspan="2" class="jg0">
常滑</td>
                <td rowspan="1" class="jg0">
唐津</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>18</td>
                    <td class="sun">日</td>
                    <td>&nbsp;</td>
                <td rowspan="1" class="jg0">
尼崎</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>19</td>
                    <td>月</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>20</td>
                    <td>火</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>21</td>
                    <td>水</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>22</td>
                    <td class="sun">木</td>
                    <td>&nbsp;</td>
                <td rowspan="4" class="jsg">
SG<br>芦屋</td>
                <td rowspan="4" class="jg0">
戸田</td>
                <td rowspan="1" class="jg0">
宮島</td>
                <td rowspan="1" class="jg0">
徳山</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>23</td>
                    <td class="sun">金</td>
                    <td>&nbsp;</td>
                <td rowspan="3" class="jg0">
尼崎</td>
                <td rowspan="2" class="jg0">
江戸川</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>24</td>
                    <td class="sat">土</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>25</td>
                    <td class="sun">日</td>
                    <td>&nbsp;</td>
                <td rowspan="1" class="jg0">
唐津</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>26</td>
                    <td>月</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>27</td>
                    <td>火</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>28</td>
                    <td>水</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>29</td>
                    <td>木</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>30</td>
                    <td>金</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>31</td>
                    <td class="sat">土</td>
                    <td>&nbsp;</td>
                <td rowspan="1" class="jg2">
G2尼</td>
                <td rowspan="1" class="jg3">
G3宮</td>
                <td rowspan="1" class="jg0">
常滑</td>
                <td rowspan="1" class="jg0">
徳山</td>
                    <td>&nbsp;</td>
    </tr>
</table>
</div><!-- /tab1 -->





<!-- ▼▼▼外向発売▼▼▼ -->
<div id="tab2" class="tab_content">
<table id="ta_sot">
<col class="day" />
<col class="day" /> 
<col class="sot" />
<col class="sot" />
<col class="sot" />
<col class="sot" />
  <tr>
    <th colspan="2">&nbsp;</th>
    <th colspan="4">津インクル（外向発売所）</th>
  </tr>
  <tr>
    <td>1</td>
                    <td>木</td>
                <td rowspan="4" class="jg2">
G2<br>三国</td>
                <td rowspan="6" class="jg3">
G3<img src="/sp/01cal/images/sp_mark_2.png" width="30" height="30"><img src="/sp/01cal/images/sp_mark_3.png" width="30" height="30"><br>平和島</td>
                <td rowspan="2" class="jg0">
<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30"><br>丸亀</td>
                <td rowspan="6" class="jg3">
G3<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30"><br>大村</td>
    </tr>
  <tr>
    <td>2</td>
                    <td>金</td>
    </tr>
  <tr>
    <td>3</td>
                    <td class="sat">土</td>
                <td rowspan="2" class="jg0">
<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30"><br>住之江</td>
    </tr>
  <tr>
    <td>4</td>
                    <td class="sun">日</td>
    </tr>
  <tr>
    <td>5</td>
                    <td>月</td>
                <td rowspan="1" class="jg0">
常滑</td>
                <td rowspan="1" class="jg0">
<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30">桐</td>
    </tr>
  <tr>
    <td>6</td>
                    <td>火</td>
                <td rowspan="1" class="jg0">
江戸川</td>
                <td rowspan="6" class="jg2">
G2<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30"><br>丸亀</td>
    </tr>
  <tr>
    <td>7</td>
                    <td>水</td>
                <td rowspan="6" class="jg0">
<img src="/sp/01cal/images/sp_mark_2.png" width="30" height="30"><br>尼崎</td>
                <td rowspan="1" class="jg0">
徳山</td>
                <td rowspan="2" class="jg0">
<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30"><br>蒲郡</td>
    </tr>
  <tr>
    <td>8</td>
                    <td>木</td>
                <td rowspan="1" class="jg0">
<img src="/sp/01cal/images/sp_mark_3.png" width="30" height="30">浜</td>
    </tr>
  <tr>
    <td>9</td>
                    <td>金</td>
                <td rowspan="1" class="jg0">
びわこ</td>
                <td rowspan="1" class="jg0">
<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30">若</td>
    </tr>
  <tr>
    <td>10</td>
                    <td class="sat">土</td>
                <td rowspan="1" class="jg0">
唐津</td>
                <td rowspan="4" class="jg0">
<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30"><br>住之江</td>
    </tr>
  <tr>
    <td>11</td>
                    <td class="sun">日</td>
                <td rowspan="2" class="jg0">
<img src="/sp/01cal/images/sp_mark_3.png" width="30" height="30"><br>多摩川</td>
    </tr>
  <tr>
    <td>12</td>
                    <td>月</td>
                <td rowspan="4" class="jg0">
<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30"><br>大村</td>
    </tr>
  <tr>
    <td>13</td>
                    <td>火</td>
                <td rowspan="6" class="jg2">
G2<br>びわこ</td>
                <td rowspan="6" class="jg3">
G3<img src="/sp/01cal/images/sp_mark_2.png" width="30" height="30"><br>児島</td>
    </tr>
  <tr>
    <td>14</td>
                    <td>水</td>
                <td rowspan="6" class="jg0">
<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30"><br>桐生</td>
    </tr>
  <tr>
    <td>15</td>
                    <td>木</td>
    </tr>
  <tr>
    <td>16</td>
                    <td>金</td>
                <td rowspan="1" class="jg0">
<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30">若</td>
    </tr>
  <tr>
    <td>17</td>
                    <td class="sat">土</td>
                <td rowspan="2" class="jg0">
<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30"><br>下関</td>
    </tr>
  <tr>
    <td>18</td>
                    <td class="sun">日</td>
    </tr>
  <tr>
    <td>19</td>
                    <td>月</td>
                <td rowspan="1" class="jg0">
常滑</td>
                <td rowspan="1" class="jg0">
鳴門</td>
                <td rowspan="6" class="jg0">
<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30"><img src="/sp/01cal/images/sp_mark_2.png" width="30" height="30"><br>住之江</td>
    </tr>
  <tr>
    <td>20</td>
                    <td>火</td>
                <td rowspan="6" class="jsg">
SG<br>芦屋</td>
                <td rowspan="3" class="jg0">
徳山</td>
                <td rowspan="3" class="jg0">
<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30"><br>蒲郡</td>
    </tr>
  <tr>
    <td>21</td>
                    <td>水</td>
    </tr>
  <tr>
    <td>22</td>
                    <td class="sun">木</td>
    </tr>
  <tr>
    <td>23</td>
                    <td class="sun">金</td>
                <td rowspan="2" class="jg0">
江戸川</td>
                <td rowspan="1" class="jg0">
<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30">大</td>
    </tr>
  <tr>
    <td>24</td>
                    <td class="sat">土</td>
                <td rowspan="4" class="jg0">
<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30"><br>若松</td>
    </tr>
  <tr>
    <td>25</td>
                    <td class="sun">日</td>
                <td rowspan="1" class="jg0">
唐津</td>
                <td rowspan="6" class="jg3">
G3<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30"><img src="/sp/01cal/images/sp_mark_2.png" width="30" height="30"><br>下関</td>
    </tr>
  <tr>
    <td>26</td>
                    <td>月</td>
                <td rowspan="1" class="jg0">
常滑</td>
                <td rowspan="2" class="jg0">
戸田</td>
    </tr>
  <tr>
    <td>27</td>
                    <td>火</td>
                <td rowspan="5" class="jg2">
G2<br>尼崎</td>
    </tr>
  <tr>
    <td>28</td>
                    <td>水</td>
                <td rowspan="1" class="jg0">
三国</td>
                <td rowspan="1" class="jg0">
<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30">桐</td>
    </tr>
  <tr>
    <td>29</td>
                    <td>木</td>
                <td rowspan="3" class="jg3">
G3<br>宮島</td>
                <td rowspan="2" class="jg0">
<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30"><br>丸亀</td>
    </tr>
  <tr>
    <td>30</td>
                    <td>金</td>
    </tr>
  <tr>
    <td>31</td>
                    <td class="sat">土</td>
                <td rowspan="1" class="jg3">
G3<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30">若</td>
                <td rowspan="1" class="jg0">
<img src="/sp/01cal/images/sp_mark_1.png" width="30" height="30">大</td>
    </tr>
</table>
</div><!-- /tab2 -->




<div class="clear"></div>



<div id="notice"> 

</div>





<!-- ▼▼▼TVアイコン説明▼▼▼ -->
<div id="tv">
<ul class="navi">
<li>
<div class="category">有料中継チャンネル説明</div>
<ul class="menu">
<li>
●加入料、基本料月額、月額視聴料が必要です<br>
<span class="tv0-4">　0 </span>…JLC680<br>
<span class="tv0-4">　1 </span>…JLC681<br>
<span class="tv0-4">　2 </span>…JLC682<br>
<span class="tv0-4">　3 </span>…JLC683<br>
<span class="tv0-4">　4 </span>…JLC684<br>
　【放送時間】10:00～17:00<br>
※放送時間は変更になる場合があります。<br>
　あらかじめご了承ください。<br>
</li>
</ul>
</li>
</ul>
</div><!-- /#tv -->
</div><!-- /#cal -->









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
