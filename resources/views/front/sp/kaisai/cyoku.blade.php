<div class="page_tit">直前情報＆スタ展@if($tomorrow_flg)（明日）@endif</div>
<!-- 展示リプレイ-->

<div id="replay_movie_choku">
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
<span id="id_tenji_movieok"></span>
	
</div><!-- replay_movie -->

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
    <!--直前情報-->
    <table id="ta_shusso" class="choku">
        <tr>
            <th class="header1">枠番</th>
            <th class="header1">選手名<br>登番 / 支部 / 年齢</th>
            <th class="header1">体重</th>
            <th class="header1">調整</th>
            <th class="header1">展示<br>タイム</th>
            <th class="header1">チルト</th>
        </tr>

        @foreach($syussou as $teiban => $item)
            @if($ozz_info_array[$teiban] != 2)
                <tr>
                    <td rowspan="2" class="r{{$teiban}}">{{$teiban}}</td>
                    <td class="n1_nocolor">{{$item->SENSYU_NAME}}</td>
                    <td class="top weight">{{ $tyokuzen_array[$item->TEIBAN]['record']->TAIJYU }}</td>
                    <td class="top adjust">{{ $tyokuzen_array[$item->TEIBAN]['record']->TYOSEI_JYURYO }}</td>
                    <td class="top time">{{ $tyokuzen_array[$item->TEIBAN]['record']->TENJI_TIME }}</td>
                    <td class="top">{{ $tyokuzen_array[$item->TEIBAN]['record']->TILT_KAKUDO }}</td>
                </tr>
                <tr>
                    <td class="n1_nocolor address">{{$item->TOUBAN}} / {{ $item->HOME_TOWN}} / {{ $item->AGE}}</td>
                    <td class="parts_left">部品<br>交換</td>
                    <td colspan="3" class="parts_right">{{ $tyokuzen_array[$item->TEIBAN]['buhin'] }}</td>
                </tr>
            @else {{--欠場--}}
            @endif
        @endforeach
    </table>
@endif



<div class="data">
<!--スタート展示-->
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


</div>
