@inject('general', 'App\Services\GeneralService')
<div class="page_tit">モーター履歴@if($tomorrow_flg)（明日）@endif</div>
<table class="ta_shusso motor">
<tr>
<th rowspan="2" class="waku" scope="col">枠<br>番</th>
<th class="mot_no" scope="col">No.</th>
<th class="tochiitsu" scope="col"><span>1</span>節前</th>
<th class="tochiitsu" scope="col"><span>2</span>節前</th>
</tr>
<tr>
  <th scope="2" class="mot_ritsu">2連率</th>
  <th class="small6" scope="col">グレード / 使用者 / 級別 / 成績</th>
  <th class="small6" scope="col">グレード / 使用者 / 級別 / 成績</th>
</tr>

@foreach($syussou as $teiban => $item)
    @if($ozz_info_array[$teiban] != 2)
        <!-- ▼枠▼ -->
        <tr>
            <td rowspan="2" class="waku r{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
            <td class="mark_gr">{{(int)$item->MOTOR_NO}}</td>

            @isset($item['motor_rireki_2'][1]['sensyu_name'])
                <td class="jo">
                    <div class="{{$general->gradenumber_to_gradename_for_front_syussou($item['motor_rireki_2'][1]['grade'])}}">{{$general->gradenumber_to_gradename_for_plofile($item['motor_rireki_2'][1]['grade'])}}</div>
                    <div class="period2">
                        @if($item['motor_rireki_2'][1]['sex'] == 2)
                            <span class="lady">{{$item['motor_rireki_2'][1]['sensyu_name']}}</span>
                        @else
                            {{$item['motor_rireki_2'][1]['sensyu_name']}}
                        @endif
                        <div class="{{$item['motor_rireki_2'][1]['kyu_betu']}}">{{$item['motor_rireki_2'][1]['kyu_betu']}}</div>
                    </div>
                </td>
            @else
                <td rowspan="2" class="nodata">--</td>
            @endisset
            
            @isset($item['motor_rireki_2'][2]['sensyu_name'])
                <td class="jo">
                    <div class="{{$general->gradenumber_to_gradename_for_front_syussou($item['motor_rireki_2'][2]['grade'])}}">{{$general->gradenumber_to_gradename_for_plofile($item['motor_rireki_2'][2]['grade'])}}</div>
                    <div class="period2">
                        @if($item['motor_rireki_2'][2]['sex'] == 2)
                            <span class="lady">{{$item['motor_rireki_2'][2]['sensyu_name']}}</span>
                        @else
                            {{$item['motor_rireki_2'][2]['sensyu_name']}}
                        @endif
                        <div class="{{$item['motor_rireki_2'][2]['kyu_betu']}}">{{$item['motor_rireki_2'][2]['kyu_betu']}}</div>
                    </div>
                </td>
            @else
                <td rowspan="2" class="nodata">--</td>
            @endisset
        </tr>
        <tr>
            <td class="mot_bottom gray bold">{{$item->ALL_NIRENTAIRITU}}</td>
            @isset($item['motor_rireki_2'][1]['sensyu_name'])
                <td class="order">{!! $item['motor_rireki_2'][1]['tyakujun'] !!}</td>
            @endisset
            @isset($item['motor_rireki_2'][2]['sensyu_name'])
                <td class="order">{!! $item['motor_rireki_2'][2]['tyakujun'] !!}</td>
            @endisset
        </tr>
    @else {{--欠場--}}
        <tr>
            <td class="waku r{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
            <td></td>
            <td class="nodata">
            </td>
            <td class="nodata">
            </td>
        </tr>
    @endif
@endforeach

 
</table>
<div class="motor_txt">{{ date('Y/n/j',strtotime($motor_change_day)) }}より、新モーターを使用しています。</div>
