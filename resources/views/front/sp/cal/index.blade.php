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
<div id="mo_l">
    @if($first_year_month <= $prev_year_month)
        <a href="/asp/tsu/sp/01cal/01cal.asp?yd={{$prev_year_month}}01">
          <img src="/sp/01cal/images/com_ic03.png" width="19" height="28">
        </a>
    @endif
</div><!-- /#mo_l -->
<div id="mo_m">{{ (int) $now_month}}月</div><!-- /#mo_m -->
<div id="mo_r">
    @if($last_date > $now_year.$now_month.$now_month_last_day)
        <a href="/asp/tsu/sp/01cal/01cal.asp?yd={{$next_year_month}}01">
          <img src="/sp/01cal/images/com_ic02.png" width="19" height="28">
        </a>
    @endif
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
@if($month_info->PDF_FILE ?? false)
    <div id="monthly"><a href="{{ config('const.IMAGE_PATH.MONTH_INFO') . $calendar_row['month_info']->PDF_FILE }}" target="_blank">マンスリーボートレース</div>
@else
    <div id="monthly">マンスリーボートレース</div>
@endif
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
                <td rowspan="{{ $honjyo_array[$day]['colspan'] }}" class="j{{ $grade_exchange[$honjyo_array[$day]['record']['GRADE']] }}">
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

            @for($i=1;$i<=4;$i++)
                @if($honjyonai_lines[$i][$day]['type'] == "head")
                    <td rowspan="{{ $honjyonai_lines[$i][$day]['colspan'] }}" class="j{{ $grade_exchange[$honjyonai_lines[$i][$day]['record']['GRADE']] }}">
                        <?php
                            $tenbo_url = "";
                            if(isset($race_index_tenbo[$now_year . $now_month . $day])){
                                $target_tenbo = $race_index_tenbo[$now_year . $now_month . $day];
                                //indexiにURLが存在するかの確認
                                if($target_tenbo->SP_TENBO_URL){
                                    $tenbo_url = $target_tenbo->SP_TENBO_URL;
                                }elseif(file_exists(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Tenbo/09/SP/t'.$target_tenbo->ID.'.htm')){
                                    //tenboIDのファイルが存在するかの確認
                                    $tenbo_url = '/asp/htmlmade/Race/Tenbo/09/SP/t'.$target_tenbo->ID.'.htm';
                                }
                            }
                        ?>
                        @if($tenbo_url) <a href='{{$tenbo_url}}'> @endif
                        {{ $general->gradenumber_to_gradename_for_cms_calendar($honjyonai_lines[$i][$day]['record']['GRADE']) }}<!--
                        @if($honjyonai_lines[$i][$day]['record']['RACE_TYPE'] == 1)
                          --><img src="/sp/01cal/images/sp_mark_1.png"><!--
                        @endif
                        @if($honjyonai_lines[$i][$day]['record']['LADY_FLG'])
                          --><img src="/sp/01cal/images/sp_mark_2.png"><!--
                        @endif
                        @if($honjyonai_lines[$i][$day]['record']['RACE_TYPE'] == 2)
                          --><img src="/sp/01cal/images/sp_mark_3.png"><!--
                        @endif
                          -->{{ $general->jyocode_to_jyoname($honjyonai_lines[$i][$day]['record']['JYO']) }}
                        
                        @if($tenbo_url) </a> @endif
                    </td>
                @elseif($honjyonai_lines[$i][$day]['type'] == "blank")
                    <td>&ensp;</td>
                @elseif($honjyonai_lines[$i][$day]['type'] == "close")
                    <td colspan="4" rowspan="{{ $honjyonai_lines[$i][$day]['colspan'] }}" class="close">
                        休館
                    </td>
                @endif
            @endfor

            @if($tv_lines[1][$day]['type'] == "head" || $tv_lines[1][$day]['type'] == "copy")
                <td>{{ ($tv_lines[1][$day]['record']['JYO'] - 31) }}</td>
            @elseif($tv_lines[1][$day]['type'] == "blank")
                <td>&ensp;</td>
            @endif
        </tr>
    @endfor
  
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
          @for($i=1;$i<=4;$i++)
              @isset($sotomuke_lines[$i])
                  @if($sotomuke_lines[$i][$day]['type'] == "head")
                      <td rowspan="{{ $sotomuke_lines[$i][$day]['colspan'] }}" class="j{{ $grade_exchange[$sotomuke_lines[$i][$day]['record']['GRADE']] }}">
                          {{ $general->gradenumber_to_gradename_for_cms_calendar($sotomuke_lines[$i][$day]['record']['GRADE']) }}<!--
                          @if($sotomuke_lines[$i][$day]['record']['RACE_TYPE'] == 1)
                            --><img src="/sp/01cal/images/sp_mark_1.png"><!--
                          @endif
                          @if($sotomuke_lines[$i][$day]['record']['LADY_FLG'])
                            --><img src="/sp/01cal/images/sp_mark_2.png"><!--
                          @endif
                          @if($sotomuke_lines[$i][$day]['record']['RACE_TYPE'] == 2)
                            --><img src="/sp/01cal/images/sp_mark_3.png"><!--
                          @endif
                            -->{{ $general->jyocode_to_jyoname($sotomuke_lines[$i][$day]['record']['JYO']) }}
                      </td>
                  @elseif($sotomuke_lines[$i][$day]['type'] == "blank")
                      <td>&ensp;</td>
                  @elseif($sotomuke_lines[$i][$day]['type'] == "close")
                      <td colspan="{{count($sotomuke_lines)}}" rowspan="{{ $sotomuke_lines[$i][$day]['colspan'] }}" class="kyukan">
                          休館
                      </td>
                  @endif
              @else
                  <td>&ensp;</td>
              @endisset
          @endfor
      </tr>
  @endfor
  
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
