
<div id="now_tenji">
    <div id="race_info">
      <div id="race_num" class="r{{$temp_race_num}}">{{$temp_race_num}}R</div>
      <div id="race_sub_name">{{ $syussou[1]->RACE_NAME ?? "" }}</div>
      @isset($vod_array[$temp_race_num])
        <div id="race_tenji"><p class="btn_tenji"><a href="javascript:parent.funcTenjiMovie('a#TenjiMovie' , '{{$vod_array[$temp_race_num]->MOVIE_ID}}');">展示リプレイ</a></p></div>
      @else
        <div id="race_tenji"><p class="btn_tenji">展示リプレイ</p></div>
      @endisset
    </div>
      
    <h3>展示情報</h3>
      
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
@foreach($syussou as $teiban => $item)
    @if($ozz_info_array[$teiban] != 2)
        <tr>
            <td class="waku w{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
            <td class="name w{{$item->TEIBAN}}">
                <div class="name">{{$item->SENSYU_NAME}}</div>
                <div class="number">{{$item->TOUBAN}}／{{$item->KYU_BETU}}</div>
            </td>
                <td>{{$tyokuzen_array[$item->TEIBAN]->ST_COURSE}}</td>
                @if($item->F_COUNT)
                    <td><span class="st_f">{{"F".substr($tyokuzen_array[$item->TEIBAN]->ST_TIMING,1)}}</span></td>
                @elseif($item->L_COUNT)
                    <td><span class="st_f">{{"L".substr($tyokuzen_array[$item->TEIBAN]->ST_TIMING,1)}}</span></td>
                @else
                    <td>{{substr($tyokuzen_array[$item->TEIBAN]->ST_TIMING,1)}}</td>
                @endif
                <td>{{$tyokuzen_array[$item->TEIBAN]->TENJI_TIME}}</td>
                <td>{{$tyokuzen_array[$item->TEIBAN]->TILT_KAKUDO}}</td>
        </tr>
    @else
        <tr>
            <td class="waku w{{$teiban}}">{{$teiban}}</td>
            <td class="name w{{$teiban}}{{$teiban}}">
                <div class="name">欠場</div>
                <div class="number"></div>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    @endif
@endforeach
      
    </tbody>
  </table>
  
  
  </div><!--/#now_tenji-->
  