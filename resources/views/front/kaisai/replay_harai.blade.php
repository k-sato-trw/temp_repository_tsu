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
    <li class="b2 select">払い戻し</li>
    <li class="b3"><a href="/asp/kyogi/09/pc/replay_kekka/replay_kekka_{{$target_date}}09{{str_pad($race_num, 2, 0, STR_PAD_LEFT)}}.htm" target="_self">結果詳細</a></li>
    <div class="clear"></div>
  </ul>

</div><!--/replay_header-->

@if($kekka_info)
    @if($neer_kekka_race_number = 0 || $neer_kekka_race_number < $race_num)
        <div id="replay_kekka_no">
            ただいまデータはございません
        </div><!--/#replay_kekka_no-->
    @else
        <div id="replay_harai">
        
            <table>
                <tbody>
                    <tr>
                        <th class="th2" scope="col">勝式</th>
                        <th class="kumi" scope="col">組番</th>
                        <th class="harai" scope="col">払戻金</th>
                        <th class="ninki" scope="col">人気</th>
                    </tr>
                    @foreach($sanrentan_array as $key=>$item)
                        <tr>
                            @if($key == 1)
                                <th class="th2" scope="row" rowspan="{{count($sanrentan_array)}}">3連単</th>
                            @endif

                            @if(!$item['SANRENTAN_MONEY'] )
                                {{--金額無し--}}
                                <td class="kumi">-</td>
                                <td class="harai">-</td>
                                <td class="ninki">-</td>
                            @else
                                {{--通常--}}
                                <td class="kumi"><span class="w{{(int) substr($item['SANRENTAN'],0,1)}}">{{(int) substr($item['SANRENTAN'],0,1)}}</span><span class="l1">-</span><span class="w{{(int) substr($item['SANRENTAN'],1,1)}}">{{(int) substr($item['SANRENTAN'],1,1)}}</span><span class="l1">-</span><span class="w{{(int) substr($item['SANRENTAN'],2,1)}}">{{(int) substr($item['SANRENTAN'],2,1)}}</span></td>
                                <td class="harai">{{ number_format($item['SANRENTAN_MONEY']) }}<span>円</span></td>
                                <td class="ninki">{{$item['SANRENTAN_NINKI']}}</td>
                            @endif
                        </tr>
                    @endforeach
                    
                    @foreach($sanrenfuku_array as $key=>$item)
                        <tr>
                            @if($key == 1)
                                <th class="th2" scope="row" rowspan="{{count($sanrenfuku_array)}}">3連複</th>
                            @endif

                            @if(!$item['SANRENFUKU_MONEY'] )
                                {{--金額無し--}}
                                <td class="kumi">-</td>
                                <td class="harai">-</td>
                                <td class="ninki">-</td>
                            @else
                                {{--通常--}}                            
                                <td class="kumi"><span class="w{{(int) substr($item['SANRENFUKU'],0,1)}}">{{(int) substr($item['SANRENFUKU'],0,1)}}</span><span class="l2">=</span><span class="w{{(int) substr($item['SANRENFUKU'],1,1)}}">{{(int) substr($item['SANRENFUKU'],1,1)}}</span><span class="l2">=</span><span class="w{{(int) substr($item['SANRENFUKU'],2,1)}}">{{(int) substr($item['SANRENFUKU'],2,1)}}</span></td>
                                <td class="harai">{{ number_format($item['SANRENFUKU_MONEY']) }}<span>円</span></td>
                                <td class="ninki">{{$item['SANRENFUKU_NINKI']}}</td>
                            @endif
                        </tr>
                    @endforeach    

                    @foreach($nirentan_array as $key=>$item)
                        <tr>
                            @if($key == 1)
                                <th class="th2" scope="row" rowspan="{{count($nirentan_array)}}">2連単</th>
                            @endif
                            @if(!$item['NIRENTAN_MONEY'] )
                                {{--金額無し--}}
                                <td class="kumi">-</td>
                                <td class="harai">-</td>
                                <td class="ninki">-</td>
                            @elseif($item['NIRENTAN_MONEY'] == 70)
                                <td class="kumi">特払</td>
                                <td class="harai">70<span>円</span></td>
                                <td class="ninki">-</td>
                            @else
                                {{--通常--}}
                                <td class="kumi"><span class="w{{(int) substr($item['NIRENTAN'],0,1)}}">{{(int) substr($item['NIRENTAN'],0,1)}}</span><span class="l1">-</span><span class="w{{(int) substr($item['NIRENTAN'],1,1)}}">{{(int) substr($item['NIRENTAN'],1,1)}}</span></td>
                                <td class="harai">{{ number_format($item['NIRENTAN_MONEY']) }}<span>円</span></td>
                                <td class="ninki">{{$item['NIRENTAN_NINKI']}}</td>
                            @endif
                        </tr>
                    @endforeach
                
                    @foreach($nirenfuku_array as $key=>$item)
                        <tr>
                            @if($key == 1)
                                <th class="th2" scope="row" rowspan="{{count($nirenfuku_array)}}">2連複</th>
                            @endif
                            @if(!$item['NIRENFUKU_MONEY'] )
                                {{--金額無し--}}
                                <td class="kumi">-</td>
                                <td class="harai">-</td>
                                <td class="ninki">-</td>
                            @elseif($item['NIRENFUKU_MONEY'] == 70)
                                <td class="kumi">特払</td>
                                <td class="harai">70<span>円</span></td>
                                <td class="ninki">-</td>
                            @else
                                {{--通常--}}
                                <td class="kumi"><span class="w{{(int) substr($item['NIRENFUKU'],0,1)}}">{{(int) substr($item['NIRENFUKU'],0,1)}}</span><span class="l2">=</span><span class="w{{(int) substr($item['NIRENFUKU'],1,1)}}">{{(int) substr($item['NIRENFUKU'],1,1)}}</span></td>
                                <td class="harai">{{ number_format($item['NIRENFUKU_MONEY']) }}<span>円</span></td>
                                <td class="ninki">{{$item['NIRENFUKU_NINKI']}}</td>
                            @endif
                        </tr>
                    @endforeach
                
                    @foreach($kakurenfuku_array as $key=>$item)
                        <tr>
                            @if($key == 1)
                                @if(count($kakurenfuku_array) > 3)
                                    <th class="th2" scope="row" rowspan="{{count($kakurenfuku_array)}}">拡連複</th>
                                @else
                                    <th class="th2" scope="row" rowspan="3">拡連複</th>
                                @endif
                            @endif
            
                            @if(!$item['KAKURENFUKU_MONEY'] )
                                {{--金額無し--}}
                                <td class="kumi">-</td>
                                <td class="harai">-</td>
                                <td class="ninki">-</td>
                            @else
                                {{--通常--}}
                                <td class="kumi"><span class="w{{(int) substr($item['KAKURENFUKU'],0,1)}}">{{(int) substr($item['KAKURENFUKU'],0,1)}}</span><span class="l2">=</span><span class="w{{(int) substr($item['KAKURENFUKU'],1,1)}}">{{(int) substr($item['KAKURENFUKU'],1,1)}}</span></td>
                                <td class="harai">{{ number_format($item['KAKURENFUKU_MONEY']) }}<span>円</span></td>
                                <td class="ninki">{{$item['KAKURENFUKU_NINKI']}}</td>
                            @endif
                        </tr>
                    @endforeach

                    @foreach($tansyo_array as $key=>$item)
                        <tr>
                            @if($key == 1)
                                <th rowspan="{{count($tansyo_array)}}">単勝</th>
                            @endif
                            @if(!$item['TANSYO_MONEY'] )
                                {{--金額無し--}}
                                <td class="kumi">-</td>
                                <td class="harai">-</td>
                                <td class="ninki">-</td>
                            @elseif($item['TANSYO_MONEY'] == 70)
                                <td class="kumi">特払</td>
                                <td class="harai">70<span>円</span></td>
                                <td class="ninki">-</td>
                            @else
                                {{--通常--}}
                                <td class="kumi"><span class="w{{(int) $item['TANSYO'] }}">{{(int) $item['TANSYO'] }}</span></td>
                                <td class="harai">{{ number_format($item['TANSYO_MONEY']) }}<span>円</span></td>
                                <td class="ninki">-</td>
                            @endif
                        </tr>
                    @endforeach

                    @foreach($fukusyo_array as $key=>$item)
                        <tr>
                            @if($key == 1)
                                @if(count($fukusyo_array) > 2)
                                    <th class="th2" scope="row" rowspan="{{count($fukusyo_array)}}">複勝</th>
                                @else
                                    <th class="th2" scope="row" rowspan="2">複勝</th>
                                @endif
                            @endif
                            @if(!$item['FUKUSYO_MONEY'] )
                                {{--金額無し--}}
                                <td class="kumi">-</td>
                                <td class="harai">-</td>
                                <td class="ninki">-</td>
                            @elseif($item['FUKUSYO_MONEY'] == 70)
                                <td class="kumi">特払</td>
                                <td class="harai">70<span>円</span></td>
                                <td class="ninki">-</td>
                            @else
                                {{--通常--}}
                                <td class="kumi"><span class="w{{(int) $item['FUKUSYO']}}">{{(int) $item['FUKUSYO']}}</span></td>
                                <td class="harai">{{ number_format($item['FUKUSYO_MONEY']) }}<span>円</span></td>
                                <td class="ninki">-</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <dl id="kimari">
                <dt>決まり手</dt>
                <dd>{{str_replace("　","",($kekka[0]->KIMARITE??""))}}    </dd>
                <div class="clear"></div>
            </dl>

            <div class="clear"></div>

        </div><!--/#replay_harai-->
    @endif
@else
    <div id="replay_kekka_no">
        ただいまデータはございません
    </div><!--/#replay_kekka_no-->
@endif


</body>
</html>
