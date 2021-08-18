@inject('general', 'App\Services\GeneralService')
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">

<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<title>ボートレース津｜前日記者予想（PDF版）</title>

<link rel="stylesheet" href="http://www.boatrace-tsu.com/pdf_yoso/css/reset.css" />
<link rel="stylesheet" href="http://www.boatrace-tsu.com/pdf_yoso/css/pdf.css" />

</head>
<body>

<div id="wrapper">

<div id="header01">
  <div class="today">{{date("n/j",strtotime($target_date))}}
    @isset($holiday_array[$target_date])
        <span class="week_hol"> 
    @else
        @if(date("w",strtotime($target_date)) == 0)
            <span class="week_hol">
        @elseif(date("w",strtotime($target_date)) == 6)
            <span class="week_sat">
        @else
            <span class="week">
        @endif
    @endisset
        {{ $general->week_label(date("w",strtotime($target_date))) }}
    </span>
  </div>
  <!--↓レースタイトルが16～34文字の場合classにlongを追加、35文字～long2を追加、最大50文字-->
    @if(mb_strlen($kaisai_master->開催名称) < 16)
        <div class="title_s">
    @elseif(mb_strlen($kaisai_master->開催名称) < 34)
        <div class="title_s long">
    @else
        <div class="title_s long2">
    @endif
    <span>{{$kaisai_master->開催名称}}</span>【@if($race_header->STOP_CODE != 0)-@elseif($race_header->KAISAI_DAYS == 1)初日@elseif($target_date == $kaisai_master->終了日付)最終日@else{{$race_header->KAISAI_DAYS}}日目@endif】
    <div class="date"><!--
        @foreach($kaisai_date_list as $key => $item)
            @if($item['month_change'] || $key == 0)
                -->{{date("n/j",strtotime($item['date']))}}<!--
            @else
                -->{{date("j",strtotime($item['date']))}}<!--
            @endif
            @isset($holiday_array[$item['date']])
                --><span class="week_hol"><!--
            @else
                @if(date("w",strtotime($item['date'])) == 0)
                    --><span class="week_hol"><!--
                @elseif(date("w",strtotime($item['date'])) == 6)
                    --><span class="week_sat"><!--
                @else
                    --><span class="week"><!--
                @endif
            @endisset
            -->{{ $general->week_label(date("w",strtotime($item['date']))) }}</span> <!--
        @endforeach
    --></div>
  </div>
</div>

<div id="main">
@for($race_num=1;$race_num<=6;$race_num++)
    <?php 
        $syussou = $race_data[$race_num]['syussou'];
        $konsetsu_race_header = $race_data[$race_num]['konsetsu_race_header'];
        $ozz_info_array = $race_data[$race_num]['ozz_info_array'];
        $tyokuzen_array = $race_data[$race_num]['tyokuzen_array'];
        $yoso = $race_data[$race_num]['yoso'];
        $yoso_ashi_array = $race_data[$race_num]['yoso_ashi_array'];
        $tyakujun = $race_data[$race_num]['tyakujun'];
        $shimekiri_prop_name = "SIMEKIRI_JIKOKU".$race_num."R";
        $shimekiri_jikoku = $race_header->$shimekiri_prop_name;
    ?>
    <div id="race"  class="clear">
        <div id="race_title">
        <div class="race_num">{{$race_num}}R<span>【{{$syussou[1]->RACE_NAME}}】</span>@if($yoso->PUSHING_FLG ?? false)<img src="http://www.boatrace-tsu.com/pdf_yoso/images/push.png" />@endif</div>
        @if($race_num == 1)
            <div class="chushaku"><img src="http://www.boatrace-tsu.com/pdf_yoso/images/d1.png" />：ドリーム戦　<img src="http://www.boatrace-tsu.com/pdf_yoso/images/t1.png" />：選抜戦　<img src="http://www.boatrace-tsu.com/pdf_yoso/images/j1.png" />：準優勝戦</div>
        @endif
        <div class="time">発売締切<img src="http://www.boatrace-tsu.com/pdf_yoso/images/dento2.png" />{{substr($shimekiri_jikoku,0,2)}}:{{substr($shimekiri_jikoku,2,2)}}</div>
        </div>

        <div class="left box">
        <table>
        <colgroup span="1" class="ko_01"></colgroup>
        <colgroup span="1" class="ko_02"></colgroup>
        <colgroup span="1" class="ko_03"></colgroup>
        <colgroup span="2" class="ko_02"></colgroup>
        <colgroup span="2" class="ko_04"></colgroup>
        <colgroup span="1" class="ko_01"></colgroup>
        <colgroup span="1" class="ko_05"></colgroup>
        <colgroup span="2" class="ko_06"></colgroup>
        <colgroup span="1" class="ko_03"></colgroup>
        <colgroup span="1" class="ko_02"></colgroup>
        <tbody>
        <tr>
            <th rowspan="2" scope="col">評価</th>
            <th rowspan="2" scope="col">枠番</th>
            <th  class="borderless" scope="col">選手名</th>
            <th rowspan="2" scope="col">級別</th>
            <th rowspan="2" scope="col">F/L</th>
            <th colspan="2" scope="col">全国</th>
            <th colspan="4" scope="col">モーター</th>
            <th rowspan="2" scope="col">節間成績</th>
            <th rowspan="2" scope="col">早見</th>
        </tr>
        <tr>
            <th class="second borderless">登番/支部/年齢</th>
            <th class="second">勝率</th>
            <th class="second">2連率</th>
            <th class="second">No</th>
            <th class="second">2連率</th>
            <th class="second">出足</th>
            <th class="second">伸足</th>
        </tr>
        @foreach($syussou as $teiban => $item)
            @if($ozz_info_array[$teiban] != 2)
                <tr>
                    <td>
                        <?php $prop_name = "EVALUATION".$teiban; ?>
                        @if($yoso->$prop_name)
                            <img src="http://www.boatrace-tsu.com/pdf_yoso/images/h{{ $yoso->$prop_name }}.png" width="24" height="24">
                        @endif
                    </td>
                    <td class="waku w{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
                    <td class="name">{{$item->SENSYU_NAME}}<br /><span>{{$item->TOUBAN}} / {{ $item->HOME_TOWN}} / {{ $item->AGE}}</span></td>
                    <td>{{$item->KYU_BETU}}</td>
                    <td class="fl">
                        {{$item->F_COUNT?"F".$item->F_COUNT:""}}
                        @if($item->F_COUNT && $item->L_COUNT)<br>@endif
                        {{$item->L_COUNT?"L".$item->L_COUNT:""}}
                    </td>
                    <td>{{$item->ALL_SHOURITU}}</td>
                    <td>{{$item->ALL_NIRENTAIRITU}}</td>
                    <td class="no">{{(int)$item->MOTOR_NO}}</td>
                    <td>{{$item->MOTOR2RENTAIRITU}}</td>
                    <td>
                        @isset($yoso_ashi_array[$teiban])
                            @if($yoso_ashi_array[$teiban]->DEASHI)
                                <img src="http://www.boatrace-tsu.com/pdf_yoso/images/m{{ $yoso_ashi_array[$teiban]->DEASHI }}.png" />
                            @endif
                        @endisset
                    </td>
                    <td>
                        @isset($yoso_ashi_array[$teiban])
                            @if($yoso_ashi_array[$teiban]->NOBIASHI)
                                <img src="http://www.boatrace-tsu.com/pdf_yoso/images/m{{ $yoso_ashi_array[$teiban]->NOBIASHI }}.png" />
                            @endif
                        @endisset
                    </td>
                    <td class="seiseki">{!! $tyakujun[$teiban] !!}</td>
                    <td>{{$item->HAYAMI}}</td>
                </tr>
            @endif
        @endforeach
        </tbody>
        </table>
        </div>


        <!--middle-->
        <div class="middle box">
        <table>
            <tr><th>進入予想</th></tr>
            <tr>
            <td>
                <ul>
                    @if($yoso->ENTRY)
                        @for($i=0;$i<=6;$i++)
                            @if($i != 3)
                                @if($i < 3)
                                    <li class="slow"><img src="http://www.boatrace-tsu.com/pdf_yoso/images/s{{substr($yoso->ENTRY,$i,1)}}.png" /></li>
                                @elseif($i > 3)
                                    <li class="dash"><img src="http://www.boatrace-tsu.com/pdf_yoso/images/s{{substr($yoso->ENTRY,$i,1)}}.png" /></li>
                                @endif
                            @endif
                        @endfor
                    @endif
                </ul>
            </td>
            </tr>
        </table>
        </div>

        <div class="right box">
        <table>
            <tr><th>記者's メモ</th></tr>
            <tr>
            <td>
                <p>{{$yoso->MEMO}}</p>
                <div>自信度<span>{{$yoso->CONFIDENCE}}%</span></div>
            </td>
            </tr>
        </table>
        </div>
    </div>
@endfor
  
</div><!--main-->
<div class="clear"></div>
</div><!--wrapper-->


<!---------------- 2枚目---------------->

<div id="wrapper" class="end">

  <div id="header02">
    <!--↓レースタイトルが24文字～の場合classにlongを追加、最大50文字-->
  <div class="title_s long">
  <div class="today">{{date("n/j",strtotime($target_date))}}
    @isset($holiday_array[$target_date])
        <span class="week_hol"> 
    @else
        @if(date("w",strtotime($target_date)) == 0)
            <span class="week_hol">
        @elseif(date("w",strtotime($target_date)) == 6)
            <span class="week_sat">
        @else
            <span class="week">
        @endif
    @endisset
        {{ $general->week_label(date("w",strtotime($target_date))) }}
    </span>
  </div>
      <span>{{$kaisai_master->開催名称}}</span>【@if($race_header->STOP_CODE != 0)-@elseif($race_header->KAISAI_DAYS == 1)初日@elseif($target_date == $kaisai_master->終了日付)最終日@else{{$race_header->KAISAI_DAYS}}日目@endif】
    <div class="date"><!--
        @foreach($kaisai_date_list as $key => $item)
            @if($item['month_change'] || $key == 0)
                -->{{date("n/j",strtotime($item['date']))}}<!--
            @else
                -->{{date("j",strtotime($item['date']))}}<!--
            @endif
            @isset($holiday_array[$item['date']])
                --><span class="week_hol"><!--
            @else
                @if(date("w",strtotime($item['date'])) == 0)
                    --><span class="week_hol"><!--
                @elseif(date("w",strtotime($item['date'])) == 6)
                    --><span class="week_sat"><!--
                @else
                    --><span class="week"><!--
                @endif
            @endisset
            -->{{ $general->week_label(date("w",strtotime($item['date']))) }}</span> <!--
        @endforeach
    --></div>
    </div>
  </div>

<div id="main">
    @for($race_num=7;$race_num<=12;$race_num++)
    <?php 
        $syussou = $race_data[$race_num]['syussou'];
        $konsetsu_race_header = $race_data[$race_num]['konsetsu_race_header'];
        $ozz_info_array = $race_data[$race_num]['ozz_info_array'];
        $tyokuzen_array = $race_data[$race_num]['tyokuzen_array'];
        $yoso = $race_data[$race_num]['yoso'];
        $yoso_ashi_array = $race_data[$race_num]['yoso_ashi_array'];
        $tyakujun = $race_data[$race_num]['tyakujun'];
        $shimekiri_prop_name = "SIMEKIRI_JIKOKU".$race_num."R";
        $shimekiri_jikoku = $race_header->$shimekiri_prop_name;
    ?>
    <div id="race"  class="clear">
        <div id="race_title">
        <div class="race_num">{{$race_num}}R<span>【{{$syussou[1]->RACE_NAME}}】</span>@if($yoso->PUSHING_FLG ?? false)<img src="http://www.boatrace-tsu.com/pdf_yoso/images/push.png" />@endif</div>
        @if($race_num == 7)
            <div class="chushaku"><img src="http://www.boatrace-tsu.com/pdf_yoso/images/d1.png" />：ドリーム戦　<img src="http://www.boatrace-tsu.com/pdf_yoso/images/t1.png" />：選抜戦　<img src="http://www.boatrace-tsu.com/pdf_yoso/images/j1.png" />：準優勝戦</div>
        @endif
        <div class="time">発売締切<img src="http://www.boatrace-tsu.com/pdf_yoso/images/dento2.png" />{{substr($shimekiri_jikoku,0,2)}}:{{substr($shimekiri_jikoku,2,2)}}</div>
        </div>

        <div class="left box">
        <table>
        <colgroup span="1" class="ko_01"></colgroup>
        <colgroup span="1" class="ko_02"></colgroup>
        <colgroup span="1" class="ko_03"></colgroup>
        <colgroup span="2" class="ko_02"></colgroup>
        <colgroup span="2" class="ko_04"></colgroup>
        <colgroup span="1" class="ko_01"></colgroup>
        <colgroup span="1" class="ko_05"></colgroup>
        <colgroup span="2" class="ko_06"></colgroup>
        <colgroup span="1" class="ko_03"></colgroup>
        <colgroup span="1" class="ko_02"></colgroup>
        <tbody>
        <tr>
            <th rowspan="2" scope="col">評価</th>
            <th rowspan="2" scope="col">枠番</th>
            <th  class="borderless" scope="col">選手名</th>
            <th rowspan="2" scope="col">級別</th>
            <th rowspan="2" scope="col">F/L</th>
            <th colspan="2" scope="col">全国</th>
            <th colspan="4" scope="col">モーター</th>
            <th rowspan="2" scope="col">節間成績</th>
            <th rowspan="2" scope="col">早見</th>
        </tr>
        <tr>
            <th class="second borderless">登番/支部/年齢</th>
            <th class="second">勝率</th>
            <th class="second">2連率</th>
            <th class="second">No</th>
            <th class="second">2連率</th>
            <th class="second">出足</th>
            <th class="second">伸足</th>
        </tr>
        @foreach($syussou as $teiban => $item)
            @if($ozz_info_array[$teiban] != 2)
                <tr>
                    <td>
                        <?php $prop_name = "EVALUATION".$teiban; ?>
                        @if($yoso->$prop_name)
                            <img src="http://www.boatrace-tsu.com/pdf_yoso/images/h{{ $yoso->$prop_name }}.png" width="24" height="24">
                        @endif
                    </td>
                    <td class="waku w{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
                    <td class="name">{{$item->SENSYU_NAME}}<br /><span>{{$item->TOUBAN}} / {{ $item->HOME_TOWN}} / {{ $item->AGE}}</span></td>
                    <td>{{$item->KYU_BETU}}</td>
                    <td class="fl">
                        {{$item->F_COUNT?"F".$item->F_COUNT:""}}
                        @if($item->F_COUNT && $item->L_COUNT)<br>@endif
                        {{$item->L_COUNT?"L".$item->L_COUNT:""}}
                    </td>
                    <td>{{$item->ALL_SHOURITU}}</td>
                    <td>{{$item->ALL_NIRENTAIRITU}}</td>
                    <td class="no">{{(int)$item->MOTOR_NO}}</td>
                    <td>{{$item->MOTOR2RENTAIRITU}}</td>
                    <td>
                        @isset($yoso_ashi_array[$teiban])
                            @if($yoso_ashi_array[$teiban]->DEASHI)
                                <img src="http://www.boatrace-tsu.com/pdf_yoso/images/m{{ $yoso_ashi_array[$teiban]->DEASHI }}.png" />
                            @endif
                        @endisset
                    </td>
                    <td>
                        @isset($yoso_ashi_array[$teiban])
                            @if($yoso_ashi_array[$teiban]->NOBIASHI)
                                <img src="http://www.boatrace-tsu.com/pdf_yoso/images/m{{ $yoso_ashi_array[$teiban]->NOBIASHI }}.png" />
                            @endif
                        @endisset
                    </td>
                    <td class="seiseki">{!! $tyakujun[$teiban] !!}</td>
                    <td>{{$item->HAYAMI}}</td>
                </tr>
            @endif
        @endforeach
        </tbody>
        </table>
        </div>


        <!--middle-->
        <div class="middle box">
        <table>
            <tr><th>進入予想</th></tr>
            <tr>
            <td>
                <ul>
                    @if($yoso->ENTRY)
                        @for($i=0;$i<=6;$i++)
                            @if($i != 3)
                                @if($i < 3)
                                    <li class="slow"><img src="http://www.boatrace-tsu.com/pdf_yoso/images/s{{substr($yoso->ENTRY,$i,1)}}.png" /></li>
                                @elseif($i > 3)
                                    <li class="dash"><img src="http://www.boatrace-tsu.com/pdf_yoso/images/s{{substr($yoso->ENTRY,$i,1)}}.png" /></li>
                                @endif
                            @endif
                        @endfor
                    @endif
                </ul>
            </td>
            </tr>
        </table>
        </div>

        <div class="right box">
        <table>
            <tr><th>記者's メモ</th></tr>
            <tr>
            <td>
                <p>{{$yoso->MEMO}}</p>
                <div>自信度<span>{{$yoso->CONFIDENCE}}%</span></div>
            </td>
            </tr>
        </table>
        </div>
    </div>
@endfor
  </div><!--main-->
<div class="clear"></div>
</div><!--/wrapper2-->

</body>
</html>
