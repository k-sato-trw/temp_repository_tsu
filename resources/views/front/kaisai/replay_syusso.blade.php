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
  	<li class="b1 select">出走表</li>
    <li class="b2"><a href="/asp/kyogi/09/pc/replay_harai/replay_harai_{{$target_date}}09{{str_pad($race_num, 2, 0, STR_PAD_LEFT)}}.htm" target="_self">払い戻し</a></li>
    <li class="b3"><a href="/asp/kyogi/09/pc/replay_kekka/replay_kekka_{{$target_date}}09{{str_pad($race_num, 2, 0, STR_PAD_LEFT)}}.htm" target="_self">結果詳細</a></li>
    <div class="clear"></div>
  </ul>

</div><!--/replay_header-->


    
<div id="replay_syusso">
  <table id="ta_tenji">
  <tbody>
    <tr>
      <th scope="col" class="waku">枠</th>
      <th scope="col" class="name">選手名</th>
      <th scope="col" class="sin">進入</th>
      <th scope="col" class="st">ST</th>
      <th scope="col" class="time">タイム</th>
      <th scope="col" class="tilt">チルト</th>
    </tr>
    @foreach ($syussou as $teiban => $item)
        @if($ozz_info_array[$teiban] != 2)
            <tr>
                <td class="waku w{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
                <td class="name w{{$item->TEIBAN}}">
                    <div class="name">{{$item->SENSYU_NAME}}@if($item->SEX == 2)<img src="/kaisai/images/ico_lady.png" width="14">@endif</div>
                    <div class="number">{{$item->TOUBAN}}／{{$item->KYU_BETU}}</div>
                </td>

                @if($item->ST_COURSE == 'X' || $item->ST_COURSE == 'N')
                    @if($item->TENJI_TIME && $item->TENJI_TIME == '-' && $item->TILT_KAKUDO && $item->TILT_KAKUDO == '-' )
                        {{--前半データ無し、後半データ有り--}}
                        <td colspan="2">不参加</td>
                        <td>{{$item->TENJI_TIME}}</td>
                        <td>{{$item->TILT_KAKUDO}}</td>
                    @else
                        {{--前半データ無し、後半データ無し--}}
                        <td colspan="4">不参加</td>
                    @endif
                    
                @else
                    {{--前半データ有り、後半データ有り--}}
                    <td>{{$item->ST_COURSE}}</td>
                    @if($item->ST_TIMING == 'F')
                        <td><span class="st_f">F{{substr($item->ST_TIMING,1)}}</span></td>
                    @elseif($item->ST_TIMING == 'L')
                        <td><span class="st_f">L.--</span></td>
                    @else
                        <td>{{substr($item->ST_TIMING,1)}}</td>
                    @endif
                    <td>{{$item->TENJI_TIME}}</td>
                    <td>{{$item->TILT_KAKUDO}}</td>    
                @endif                
            </tr>
        @else {{--欠場--}}
            <tr>
                <td class="waku w{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
                <td class="name w{{$item->TEIBAN}}">
                欠場
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>             
            </tr>
        @endif
    @endforeach
    
  </tbody>
</table>


</div><!--/#replay_syusso-->


</body>
</html>
