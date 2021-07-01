<div class="page_tit">選手評価@if($tomorrow_flg)（明日）@endif</div>
<table class="ta_shusso">
    <tr>
      <th rowspan="2">枠<br>
        番</th>
      <th rowspan="2" class="name">選手名<br>
        <span>登番 / 支部 / 年齢 / 級</span></th>
      <th class="F">F</th>
      <th rowspan="2">平均<br>
        ST</th>
      <th rowspan="2" class="mark">記者<br>
        評価</th>
      <th colspan="3" class="mark">モーター評価</th>
      <th rowspan="2">早<br>
        見</th>
    </tr>
    <tr>
      <th class="L">L</th>
      <th class="mark">No.</th>
      <th class="mark">出足</th>
      <th class="mark">伸足</th>
    </tr>
    @foreach($syussou as $teiban => $item)
        @if($ozz_info_array[$teiban] != 2)
            <tr>
              <td rowspan="2" class="r{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
              <td class="bottom_no_border"><span class="name4">{{$item->SENSYU_NAME}}</span></td>
              <td class="top">{{$item->F_COUNT?"F".$item->F_COUNT:""}}</td>
              <td rowspan="2">{{$item->ST_AVERAGE?mb_substr($item->ST_AVERAGE,1):"―"}}</td>
              <td rowspan="2" class="mark">
                  <?php $prop_name = "EVALUATION".$teiban; ?>
                  @if($yoso->$prop_name)
                      <img src="/sp/kyogi/images/hyoka_{{ $yoso->$prop_name }}.png"/>
                  @endif
              </td>
              <td rowspan="2" class="mark_gr">{{(int)$item->MOTOR_NO}}</td>
              <td rowspan="2" class="mark">
                @isset($yoso_ashi_array[$teiban])
                    @if($yoso_ashi_array[$teiban]->DEASHI)
                        <img src="/sp/kyogi/images/motor_{{ $yoso_ashi_array[$teiban]->DEASHI }}.png">
                    @endif
                @endisset
              </td>
              <td rowspan="2" class="mark">
                @isset($yoso_ashi_array[$teiban])
                    @if($yoso_ashi_array[$teiban]->NOBIASHI)
                        <img src="/sp/kyogi/images/motor_{{ $yoso_ashi_array[$teiban]->NOBIASHI }}.png">
                    @endif
                @endisset
              </td>
              <td rowspan="2" class="hayami">
                  @if($item->HAYAMI)
                      <a href="/asp/tsu/sp/kyogi/index.asp?jyo=09&racenum={{$item->HAYAMI}}&page=2">{{$item->HAYAMI}}<span>R</span></a>
                  @endif
              </td>
            </tr>
            <tr>
              <td class="number top_no_border">{{$item->TOUBAN}} / {{ $item->HOME_TOWN}} / {{ $item->AGE}} / {{ $item->KYU_BETU}}</td>
              <td class="bottom">{{$item->L_COUNT?"L".$item->L_COUNT:""}}</td>
            </tr>

        @else {{--欠場--}}
            <tr>
                <td rowspan="2" class="r{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
                <td class="bottom_no_border"><span class="name4">欠場</span></td>
                <td class="top"></td>
                <td rowspan="2"></td>
                <td rowspan="2" class="mark"></td>
                <td rowspan="2" class="mark_gr"></td>
                <td rowspan="2" class="mark"></td>
                <td rowspan="2" class="mark"></td>
                <td rowspan="2" class="hayami"></a></td>
            </tr>
            <tr>
                <td class="number top_no_border"></td>
                <td class="bottom">　</td>
            </tr>
        @endif
    @endforeach
  
</table>
