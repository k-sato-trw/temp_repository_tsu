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

<title>ボートレース津｜開催日程</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,津インクル,スケジュール,開催日程,外向発売">
<meta name="Description" content="BOAT RACE津の開催レースをはじめ場外、外向の発売情報を掲載しています。">
<meta name="viewport" content="width=1280px">

<link href="/css/reset.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/css/01cal.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/js/common.js"></script>

<!--コンテンツメニューjs-->
<script type="text/javascript" src="/js/contents_navi_slide.js"></script>
<script type="text/javascript" src="/js/contents_navi_main.js"></script>

<!--ヘッダーメニューjs-->
<script type="text/javascript" src="/js/header_navi.js"></script>

<!--カレンダー用js-->
<script type="text/javascript" src="/js/01cal.js"></script>


    

</head>





<body>


<div id="wrapper">




<div id="header_wrap">
    <div id="header">
    <div id="header_img">
    	
        <h1><a href="/">BOATRACE 津 #09</a></h1>
        <h2>開催日程</h2>
        
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
    
    
		
        <div id="cal_nav">
        
        	<ul id="btn">
                @foreach ($month_list as $item)
                    @if($last_date > $item)
                        <li><a href="#cal{{ $calendar[$item]['now_month'] }}">{{ (int)$calendar[$item]['now_month'] }}<span class="mon">月</span><span class="mon2">{{ $general->number_to_month_name((int)$calendar[$item]['now_month']) }}</span></a></li>
                    @else
                        <li>{{ (int)$calendar[$item]['now_month'] }}<span class="mon">月</span><span class="mon2">{{ $general->number_to_month_name((int)$calendar[$item]['now_month']) }}</span></li>
                    @endif
                @endforeach
                <div class="clear"></div>
            </ul><!--/btn-->
            
            <div id="memo">
            <img src="/01cal/images/memo_i_grade.png">
            
            <ul id="icon">
            	<li class="i_night">ナイターレース</li>
                <li class="i_jyoshi">女子レース</li>
                <li class="i_hakubo">薄暮レース</li>

                <div class="clear"></div>
            </ul>
            <ul id="tv">
                	<li id="tv1">有料中継<br>チャンネル</li>
                    <li id="tv2">津オフィシャル番組</li>
                    <div class="clear"></div>
            </ul><!--/tv-->
            
            </div><!--/memo-->
            <div class="clear"></div>
             
            <!--有料中継詳細-->
            <div class="tv_con" id="tv1_main">
            	<ul>
                	<li><dl><dt>0</dt><dd>JLC680</dd></dl></li>
                    <li><dl><dt>1</dt><dd>JLC681</dd></dl></li>
                    <li><dl><dt>2</dt><dd>JLC682</dd></dl></li>
                    <li><dl><dt>3</dt><dd>JLC683</dd></dl></li>
                    <li><dl><dt>4</dt><dd>JLC684</dd></dl></li>
                    <div class="clear"></div>
                </ul>
            </div>
            
            <!--津オフィシャル番組-->
            <div class="tv_con" id="tv2_main">
            	<img src="/01cal/images/tv2_main_img.png">
                <div class="btn b1"><a href="http://www.mietv.com/boattsu/" target="_blank">番組ＨＰはこちら</a></div>
                <div class="btn b2"><a href="http://www.fmmie.jp/program/buzzbuzz/" target="_blank">番組ＨＰはこちら</a></div>
            </div>
           
        </div><!--/cal_nav-->
        
        
        
        
        <div id="cal_wrap">
        
        
    @foreach ($calendar as $now_date => $calendar_row)
        @if($last_date > $now_date)
        <!--★{{$calendar_row['now_month_last_day']}}日用★-->
       	  <div class="cal" id="cal{{ $calendar_row['now_month'] }}">
           	<h3>{{ (int)$calendar_row['now_month'] }}<p>月<span>{{ $general->number_to_month_name((int)$calendar_row['now_month']) }}</span></p></h3>
                
            <table class="day{{$calendar_row['now_month_last_day']}}">
                <tbody>
                  <tr class="cal_top">
                    @if($calendar_row['month_info']->PDF_FILE ?? false)
                        <th colspan="2" rowspan="3" scope="row"><div><a href="{{ config('const.IMAGE_PATH.MONTH_INFO') . $calendar_row['month_info']->PDF_FILE }}" target="_blank">マンスリーボートレース</a></div></th>
                    @else
                        <th colspan="2" rowspan="3" scope="row"><div>マンスリーボートレース</div></th>
                    @endif
                    <td colspan="{{$calendar_row['now_month_last_day']}}">&ensp;</td>
                  <tr class="date">
                        @for($day = 1; $day <= $calendar_row['now_month_last_day']; $day++)
                            <td>{{$day}}</td>
                        @endfor
                  </tr>    
                  <tr class="day">
                    @for($day = 1; $day <= $calendar_row['now_month_last_day']; $day++)
                            @if(date('w',strtotime($calendar_row['now_year'] . $calendar_row['now_month'] . $day)) == 0)
                                <td class="sun">
                            @elseif(date('w',strtotime($calendar_row['now_year'] . $calendar_row['now_month'] . $day)) == 6)
                                <td class="sat">
                            @else
                                <td>
                            @endif
                            {{ $week_label[date('w',strtotime($calendar_row['now_year'] . $calendar_row['now_month'] . $day))] }}
                        </td>
                    @endfor
                  </tr>
                  <tr class="race_name">
                    <th colspan="2" scope="row" class="honjyo">本場</th>
                    @foreach($calendar_row['honjyo_array'] as $day => $item)
                        @if($item['type'] == "head")
                            <td colspan="{{ $item['colspan'] }}" class="{{ $general->gradenumber_to_gradename_for_front_syussou($item['record']['GRADE']) }}">
                                <?php
                                    $tenbo_url = "";
                                    if(isset($calendar_row['race_index_tenbo'][$calendar_row['now_year'] . $calendar_row['now_month'] . $day])){
                                        $target_tenbo = $calendar_row['race_index_tenbo'][$calendar_row['now_year'] . $calendar_row['now_month'] . $day];
                                        //indexiにURLが存在するかの確認
                                        if($target_tenbo->PC_TENBO_URL){
                                            $tenbo_url = $target_tenbo->PC_TENBO_URL;
                                        }elseif(file_exists(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Tenbo/09/PC/t'.$target_tenbo->ID.'.htm')){
                                            //tenboIDのファイルが存在するかの確認
                                            $tenbo_url = '/asp/htmlmade/Race/Tenbo/09/PC/t'.$target_tenbo->ID.'.htm';
                                        }
                                    }
                                ?>
                                @if($tenbo_url) <a href='{{$tenbo_url}}'> @endif
                                @if($item['record']['RACE_TITLE'])
                                    {{ $item['record']['RACE_TITLE'] }}                                       
                                @else
                                    {{ $general->jyocode_to_jyoname($item['record']['JYO']) }}
                                @endif
                                @if($tenbo_url) </a> @endif
                            </td>
                        @elseif($item['type'] == "blank")
                            <td>&ensp;</td>
                        @elseif($item['type'] == "close")
                            <td rowspan="1" colspan="{{ $item['colspan'] }}" class="kyukan">
                                休<br>館<br>日
                            </td>
                        @endif
                    @endforeach
                  </tr>
                  <tr class="tv">
                    <th colspan="2" scope="row">有料中継</th>
                    @foreach($calendar_row['tv_lines'] as $line_count => $tv_array)
                        @foreach($tv_array as $day => $item)
                            @if($item['type'] == "head" || $item['type'] == "copy")
                                <td class='tv'>{{ ($item['record']['JYO'] - 31) }}</td>
                            @elseif($item['type'] == "blank")
                                <td>&ensp;</td>
                            @endif
                        @endforeach
                    @endforeach
                  </tr>
                  <tr>
                    <th colspan="{{ ((int)$calendar_row['now_month_last_day']) + 2 }}" scope="row" class="space">&ensp;</th>
                  </tr>
                  
                  <!--場外発売-->
                    @foreach($calendar_row['honjyonai_lines'] as $line_count => $jyogai_array)
                        <tr class="jyogai race_name">
                            @if($line_count == 1)
                                <th rowspan="{{ count($calendar_row['honjyonai_lines']) + count($calendar_row['sotomuke_lines']) + 3 }}" scope="row" class="tajyo_all">場<br>外<br>発<br>売</th>
                                <th scope="row" rowspan="{{ count($calendar_row['honjyonai_lines']) }}"  class="tajyo_sub">本場内</th>
                            @endif

                            @foreach($jyogai_array as $day => $item)
                                @if($item['type'] == "head")
                                    <td colspan="{{ $item['colspan'] }}" class="{{ $general->gradenumber_to_gradename_for_front_syussou($item['record']['GRADE']) }}">
                                        {{ $general->gradenumber_to_gradename_for_cms_calendar($item['record']['GRADE']) }}
                                        @if($item['record']['RACE_TITLE'])
                                            {{ $general->jyocode_to_jyoname($item['record']['JYO']) }}{{ $item['record']['RACE_TITLE'] }}
                                        @elseif($item['record']['CALENDAR_RACE_TITLE'])
                                            {{ $item['record']['CALENDAR_RACE_TITLE'] }}                                           
                                        @else
                                            {{ $general->jyocode_to_jyoname($item['record']['JYO']) }}
                                        @endif
                                        @if($item['record']['LADY_FLG'])
                                            <img src="/01cal/images/mark_2.png">
                                        @endif
                                    </td>
                                @elseif($item['type'] == "blank")
                                    <td>&ensp;</td>
                                @elseif($item['type'] == "close")
                                    <td rowspan="{{count($calendar_row['honjyonai_lines'])}}" colspan="{{ $item['colspan'] }}" class="kyukan">
                                    休<br>館<br>日</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                  
                  <tr class="jyogai date">
                    <th rowspan="{{ count($calendar_row['sotomuke_lines']) + 3 }}" scope="row" class="tajyo_sub">津インクル<span>[外向発売所]</span></th>
                    @for($day = 1; $day <= $calendar_row['now_month_last_day']; $day++)
                        <td>{{$day}}</td>
                    @endfor
                  </tr>
                  <tr class="jyogai day">
                    @for($day = 1; $day <= $calendar_row['now_month_last_day']; $day++)
                            @if(date('w',strtotime($calendar_row['now_year'] . $calendar_row['now_month'] . $day)) == 0)
                                <td class="sun">
                            @elseif(date('w',strtotime($calendar_row['now_year'] . $calendar_row['now_month'] . $day)) == 6)
                                <td class="sat">
                            @else
                                <td>
                            @endif
                            {{ $week_label[date('w',strtotime($calendar_row['now_year'] . $calendar_row['now_month'] . $day))] }}
                        </td>
                    @endfor
                  </tr>
              <tr class="jyogai race_name">
                @foreach($calendar_row['sotomuke_lines'] as $line_count => $sotomuke_array)
                    <tr class="jyogai race_name">
                        

                        @foreach($sotomuke_array as $day => $item)
                            @if($item['type'] == "head")
                                <td colspan="{{ $item['colspan'] }}" class="{{ $general->gradenumber_to_gradename_for_front_syussou($item['record']['GRADE']) }}">
                                    {{ $general->gradenumber_to_gradename_for_cms_calendar($item['record']['GRADE']) }}
                                    @if($item['record']['RACE_TITLE'])
                                        {{ $general->jyocode_to_jyoname($item['record']['JYO']) }}{{ $item['record']['RACE_TITLE'] }}
                                    @elseif($item['record']['CALENDAR_RACE_TITLE'])
                                        {{ $item['record']['CALENDAR_RACE_TITLE'] }}                                           
                                    @else
                                        {{ $general->jyocode_to_jyoname($item['record']['JYO']) }}
                                    @endif
                                    @if($item['record']['RACE_TYPE'] == 1)
                                        <img src="/01cal/images/mark_1.png">
                                    @endif
                                    @if($item['record']['LADY_FLG'])
                                        <img src="/01cal/images/mark_2.png">
                                    @endif
                                    @if($item['record']['RACE_TYPE'] == 2)
                                        <img src="/01cal/images/mark_3.png">
                                    @endif
                                </td>
                            @elseif($item['type'] == "blank")
                                <td>&ensp;</td>
                            @elseif($item['type'] == "close")
                                <td rowspan="{{count($calendar_row['sotomuke_lines'])}}" colspan="{{ $item['colspan'] }}" class="kyukan">
                                休<br>館<br>日</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
                  <tr class="attention">
                    <td colspan="{{ ((int)$calendar_row['now_month_last_day']) + 2 }}" scope="row"></td>
                  </tr>
                </tbody>
              </table>
       	  </div>
        <!--★{{$calendar_row['now_month_last_day']}}日用★-->
        @endif
    @endforeach
        
        
        </div><!--/cal_wrap-->
        
        
        
        
        
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
