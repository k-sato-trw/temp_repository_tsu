<div class="page_tit">記者展示直後@if($tomorrow_flg)（明日）@endif</div>
@if( ($chushi_junen->中止開始レース番号 ?? 99) <= $race_num )
    @if($chushi_junen->中止開始レース番号 > 0 )
        <!---データ無し--->
        <table id="nodata">
            <tr>
                <td class="cyushi">第{{$chushi_junen->中止開始レース番号}}レース以降は中止となりました</td>
            </tr>
        </table>
    @else
        <!---データ無し--->
        <table id="nodata">
            <tr>
                <td class="cyushi">{{ date('n/j',strtotime($target_date)) }}の開催は中止となりました</td>
            </tr>
        </table>
    @endif
@else
    <table class="ta_shusso yoso2">
        <tr>
            <th>評<br>価</th>
            <th>枠<br>番</th>
            <th class="mark">展示<br>評価</th>
            <th>体重</th>
            <th>調整</th>
            <th>展示<br>
                タイム</th>
            <th>チルト</th>
        </tr>

        @foreach($syussou as $teiban => $item)
            @if($ozz_info_array[$teiban] != 2)
                <tr>
                    <td rowspan="2">
                        <?php $prop_name = "EVALUATION".$teiban; ?>
                        @if($yoso->$prop_name)
                            <img src="/sp/kyogi/images/hyoka_{{ $yoso->$prop_name }}.png"/>
                        @endif
                    </td>
                    <td rowspan="2" class="r{{$teiban}}">{{$teiban}}</td>
                    <td rowspan="2" class="mark">
                        <?php $prop_name = "EVALUATION".$teiban; ?>
                        {{ $yoso_tenji->$prop_name }}
                    </td>
                    <td class="weight">{{ $tyokuzen_array[$item->TEIBAN]['record']->TAIJYU }}</td>
                    <td class="adjust">{{ $tyokuzen_array[$item->TEIBAN]['record']->TYOSEI_JYURYO }}</td>
                    <td class="time">{{ $tyokuzen_array[$item->TEIBAN]['record']->TENJI_TIME }}</td>
                    <td class="">{{ $tyokuzen_array[$item->TEIBAN]['record']->TILT_KAKUDO }}</td>
                </tr>
                <tr>
                    <th class="parts_left">部品交換</th>
                    <td colspan="3" class="parts_right">{{ $tyokuzen_array[$item->TEIBAN]['buhin'] }}</td>
                </tr>
            @else {{--欠場--}}
                <tr>
                    <td rowspan="2" class="mark"></td>
                    <td rowspan="2" class="r{{$teiban}}">{{$teiban}}</td>
                    <td class="bottom_no_border"><span class="name4">欠場</span></td>
                    <td class="top f">　</td>
                    <td class="top mark_gr">　</td>
                    <td rowspan="2" class="mark"></td>
                    <td rowspan="2" class="mark"></td>
                    <td rowspan="2" class="hayami">　</td>
                </tr>
                <tr>
                    <td class="number top_no_border">　</td>
                    <td class="bottom">　</td>
                    <td class="yoso1_bottom gray bold">　</td>
                </tr>
            @endif
        @endforeach

    </table>
@endif


<div class="data yoso2" id="yoso">

<h3>スタート展示</h3>
<table id="ta_shusso" class="start">
<tr>
  <th class="header1">ｺｰｽ</th>
<th class="header1">枠番</th>
<th class="header1">CGスリット</th>
<th class="header1">ST</th>
</tr>
@foreach($tyokuzen_cg as $item)
    @if($ozz_info_array[$item->TEIBAN] != 2)
        <tr>
            <th class="header3">{{$item->ST_COURSE}}</th>
            <td class="r{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
            <td class="slit_img @if($item->TEIBAN == 1) in @elseif($item->TEIBAN == 6) out bottom @endif">
                <img src="/sp/kyogi/images/st0{{$item->TEIBAN}}.png" width="62" height="52" alt="{{$item->TEIBAN}}" style="margin-right:{{ $tyokuzen_array[$item->TEIBAN]['right_margin'] }}px;">
            </td>
            <td class="ST">
                @if($tyokuzen_array[$item->TEIBAN]['record']->ST_JICO_CD)
                    @if($tyokuzen_array[$item->TEIBAN]['record']->ST_JICO_CD == 'L')
                        <span class="FL">L.--</span>
                    @else
                        <span class="FL">F{{ mb_substr($tyokuzen_array[$item->TEIBAN]['record']->ST_TIMING,1) }}</span>
                    @endif
                @else
                    {{mb_substr($tyokuzen_array[$item->TEIBAN]['record']->ST_TIMING,1)}}
                @endif
            </td>
        </tr>
    @else {{--欠場--}}
        <tr>
            <th class="header3">-</th>
            <td></td>
            <td class="slit_img @if($item->TEIBAN == 1) in @elseif($item->TEIBAN == 6) out bottom @endif"></td>
            <td class="ST">--</td>
        </tr>
    @endif
@endforeach
</table>

<!-- リプレイボタン -->
<div id="replay_movie_yoso">
    @if($vod_manegiment)
    <iframe src="Movie.asp?MovieID=2{{$target_date}}9909{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}" frameborder="0" allowtransparency="true" scrolling="no" name="movie2" id="movie" allowfullscreen style="display:none;" class="class_android"></iframe>
    <a href="Movie_Tenji.asp?MovieID={{$target_date}}9909{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}"><img src="/sp/kyogi/images/iphone_mov.jpg" class="class_ios" style="display:none;"></a>

    @if($neer_start_exhibition < $race_num)
        {{--スタート展示データなしの時--}}
    @else
        {{--展示リプレイ映像あるため、映像表示後は自動更新しないように。--}}
        <span id="id_tenji_movieok"></span>
    @endif
    
@else
    {{--データ無し--}}
    <!-- 展示リプレイ（映像なし）-->
    <div class="tenji_nomovie"></div>
@endif
<span id="id_yoso_tenji_movieok"></span>


</div><!-- replay_movie -->






<h3>フォーカス</h3>
<h4 class="honmei">本命</h4>
<div class="focus cf">
  <table class="ta_kumi tekityu">
    <tr>
      <td class="kumi"><img src="/sp/kyogi/images/num1.png"></td>
      <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
      <td class="kumi"><img src="/sp/kyogi/images/num5.png"></td>
      <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
      <td class="kumi"><img src="/sp/kyogi/images/num4.png"></td>
    </tr>
    <tr>
      <td colspan="5" class="ozz">26.1</td>
      </tr>
  </table>
  <table class="ta_kumi">
    <tr>
      <td class="kumi"><img src="/sp/kyogi/images/num1.png"></td>
      <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
      <td class="kumi"><img src="/sp/kyogi/images/num5.png"></td>
      <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
      <td class="kumi"><img src="/sp/kyogi/images/num2.png"></td>
    </tr>
    <tr>
      <td colspan="5" class="ozz">17.8</td>
      </tr>
  </table>
  <table class="ta_kumi">
    <tr>
      <td class="kumi"><img src="/sp/kyogi/images/num1.png"></td>
      <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
      <td class="kumi"><img src="/sp/kyogi/images/num4.png"></td>
      <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
      <td class="kumi"><img src="/sp/kyogi/images/num5.png"></td>
    </tr>
    <tr>
      <td colspan="5" class="ozz">25.2</td>
      </tr>
  </table>
  <table class="ta_kumi">
    <tr>
      <td class="kumi"><img src="/sp/kyogi/images/num1.png"></td>
      <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
      <td class="kumi"><img src="/sp/kyogi/images/num4.png"></td>
      <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
      <td class="kumi"><img src="/sp/kyogi/images/num2.png"></td>
    </tr>
    <tr>
      <td colspan="5" class="ozz">31.7</td>
      </tr>
  </table>
</div><!--/focus-->
<div class="caution_bottom" cf>※オッズはページアクセス時点のものです。<br>
  確定オッズではありません。</div>

<h3 class="kekka">レース結果</h3>
<div class="kekka focus2">
  <table class="ta_kumi">
    <tr>
      <td class="kumi"><img src="/sp/kyogi/images/num1.png"></td>
      <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
      <td class="kumi"><img src="/sp/kyogi/images/num5.png"></td>
      <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
      <td class="kumi"><img src="/sp/kyogi/images/num4.png"></td>
    </tr>
  </table>
2,610<span>円</span>
</div><!--/focus-->

@if($yoso_tenji->COMMENT)
    <h3>展示後とれたて情報！</h3>
    <p class="txt">
        {!! nl2br($yoso_tenji->COMMENT); !!}
    </p>
@endif
<span id="id_yoso_tenji_dataok"></span>

</div><!-- data end -->
