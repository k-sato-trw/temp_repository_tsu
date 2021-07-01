@inject('general', 'App\Services\GeneralService')
<div class="page_tit">当地過去2節@if($tomorrow_flg)（明日）@endif</div>
<table class="ta_shusso">
  <tr>
    <th rowspan="2" class="waku" scope="col">枠<br>
      番</th>
    <th class="tochiritsu" scope="col">勝率</th>
    <th class="tochiitsu" scope="col"><span>1</span>節前</th>
    <th class="tochiitsu" scope="col"><span>2</span>節前</th>
  </tr>
  <tr>
    <th scope="2" class="tochiritsu">2連率</th>
    <th class="small6" scope="col">グレード / 期間 / 成績</th>
    <th class="small6" scope="col">グレード / 期間 / 成績</th>
  </tr>

    @foreach($syussou as $teiban => $item)
        @if($ozz_info_array[$teiban] != 2)
            <!-- ▼枠▼ -->
            <tr>
                <td rowspan="2" class="waku r{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
                <td class="top bold">{{$item->ALL_SHOURITU}}</td>

                @isset($item['touchi_rireki_2'][1])
                    <td class="jo"><div class="{{$general->gradenumber_to_gradename_for_front_syussou($item['touchi_rireki_2'][1]['touchi_grade'])}}">{{$general->gradenumber_to_gradename_for_plofile($item['touchi_rireki_2'][1]['touchi_grade'])}}</div>
                        <div class="period">{{$general->create_display_date_short($item['touchi_rireki_2'][1]['touchi_start_date'],$item['touchi_rireki_2'][1]['touchi_end_date'])}}</div>
                    </td>
                @else
                    <td rowspan="2" class="nodata">--</td>
                @endisset

                @isset($item['touchi_rireki_2'][2])
                    <td class="jo"><div class="{{$general->gradenumber_to_gradename_for_front_syussou($item['touchi_rireki_2'][2]['touchi_grade'])}}">{{$general->gradenumber_to_gradename_for_plofile($item['touchi_rireki_2'][2]['touchi_grade'])}}</div>
                        <div class="period">{{$general->create_display_date_short($item['touchi_rireki_2'][2]['touchi_start_date'],$item['touchi_rireki_2'][2]['touchi_end_date'])}}</div>
                    </td>
                @else
                    <td rowspan="2" class="nodata">--</td>
                @endisset

            </tr>
            <tr>
                <td class="bottom gray bold">{{$item->ALL_NIRENTAIRITU}}</td>
                @isset($item['touchi_rireki_2'][1])
                    <td class="order">{!! $item['touchi_rireki_2'][1]['touchi_tyakujun'] !!}</td>
                @endisset

                @isset($item['touchi_rireki_2'][2])
                    <td class="order">{!! $item['touchi_rireki_2'][2]['touchi_tyakujun'] !!}</td>
                @endisset
            </tr>
        @else {{--欠場--}}
            <!-- ▼枠▼ -->
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
<div class="kako_txt">※当地勝率・2連率は過去3年データ</div>
