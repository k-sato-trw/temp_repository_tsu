@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<title></title>

<link href="/kaisai/css/reset.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/common.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/kaisai.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/kaisai/js/jquery-1.8.2.min.js"></script>

<!--レース選択box-->
<script type="text/javascript" src="/kaisai/js/jquery.race_select.js"></script>
<script type="text/javascript" src="/asp/kyogi/09/pc/JSreplay.js"></script>


</head>

<body>


<div id="replay_header">


  <h3>
      <table><tbody>
        <tr>
            <td class="date"><span>{{$general->create_display_date_short($kaisai_master->開始日付,$kaisai_master->終了日付)}}</span></td>
            <td class="name">{{$kaisai_master->開催名称}}【{{$syussou[1]->RACE_NAME}}】</td>
        </tr>
      </tbody></table>
  </h3>
  
  
  <div id="race_info">
  
      <div id="race_day">
          <ul>
              <li class="b_back"><script type="text/javascript">
	func_RepBackbtn('{{$target_date}}');
</script>
</li>
              <li class="b_day">{{date('n/j',strtotime($target_date))}}</li>
              <li class="b_next"><script type="text/javascript">
	func_RepNextbtn('{{$target_date}}');
</script>
</li>
              <div class="clear"></div>
          </ul>
      </div><!--/race_day-->
      
      <div id="race_num" class="r{{$race_num}}">
          <dl>
              <dt>{{$race_num}}R</dt>
              <dd><ul>
<script type="text/javascript">
	func_RepLink('{{$target_date}}');
</script>
                  <div class="clear"></div>
              </ul></dd>
          </dl>
      </div><!--/race_num-->
      
      <div id="race_tenji">
          <p class="btn_tenji"><a href="javascript:parent.funcTenjiMovie('a#TenjiMovie' , '{{$target_date}}9909{{str_pad($race_num, 2, 0, STR_PAD_LEFT)}}');">展示リプレイ</a></p>
      </div><!--/race_tenji-->
      
      <div class="clear"></div>
  </div><!--/race_info-->
    
  <ul id="btn">
  	<li class="b1"><a href="/asp/kyogi/09/pc/replay_syusso/replay_syusso_{{$target_date}}09{{str_pad($race_num, 2, 0, STR_PAD_LEFT)}}.htm" target="_self">出走表</a></li>
    <li class="b2"><a href="/asp/kyogi/09/pc/replay_harai/replay_harai_{{$target_date}}09{{str_pad($race_num, 2, 0, STR_PAD_LEFT)}}.htm" target="_self">払い戻し</a></li>
    <li class="b3 select">結果詳細</li>
    <div class="clear"></div>
  </ul>

</div><!--/replay_header-->

@if($neer_kekka_race_number = 0 || $neer_kekka_race_number < $race_num)
    <div id="replay_kekka_no">
        ただいまデータはございません
    </div><!--/#replay_kekka_no-->
@else
    <div id="replay_kekka">
    <table id="ta_tenji" class="left">
        <tbody>
        <tr>
            <th scope="col" class="th2">着</th>
            <th scope="col" class="waku">枠</th>
            <th scope="col" class="name">選手名</th>
            <th scope="col" class="time">レース<br>
            タイム</th>
        </tr>

            @foreach ($kekka as $key=>$kekka_row)
                <tr>
                    <td class="th2">{{ $kekka_row->TYAKUJUN }}</td>
                    <td class="waku w{{ $kekka_row->TEIBAN }}">{{ $kekka_row->TEIBAN }}</td>
                    <td class="name w{{ $kekka_row->TEIBAN }}"><div class="name">{{ str_replace(" ","",$kekka_row->SENSYU_NAME) }}@if($kekka_row->SEX == 2)<img src="/kaisai/images/ico_lady.png" width="14">@endif</div>
                    <div class="number">{{ $syussou[$kekka_row->TEIBAN]->TOUBAN }}／{{ $syussou[$kekka_row->TEIBAN]->KYU_BETU }}</div></td>
                    <td class="time">{{ ($kekka_row->RACE_TIME)?str_replace("’",".",($kekka_row->RACE_TIME)):"-" }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table id="ta_tenji" class="right">
        <tbody>
        <tr>
            <th class="sin" scope="col">進入</th>
            <th class="ST" scope="col">ST</th>
            <th class="kimari" scope="col">決まり手</th>
        </tr>
        @foreach ($kekka_shinyujun as $kekka_row)
            <tr>
                <td class="sin"><span class="w{{ $kekka_row->TEIBAN }}">{{ $kekka_row->TEIBAN }}</span></td>
                @if($kekka_row->TYAKUJUN == 'F')
                    <td class="ST"><span class="st_f">F{{substr($kekka_row->START_TIMING,1)}}</span></td>
                @elseif($kekka_row->TYAKUJUN == 'L')
                    <td class="ST"><span class="st_f">L.--</span></td>
                @else
                    <td class="ST">{{substr($kekka_row->START_TIMING,1)}}</td>
                @endif
                <td class="kimari">
                    @if($kekka_row->TYAKUJUN == 1)
                        {{ $kekka_row->KIMARITE }}
                    @else
                        &nbsp;
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
    <div class="clear"></div>
    </div><!--/#replay_kekka-->
@endif

</body>
</html>
