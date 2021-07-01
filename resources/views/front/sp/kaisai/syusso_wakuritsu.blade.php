<div id="waku_ritsu">
    @for($loop_teiban_count1 = 1;$loop_teiban_count1 <= 6; $loop_teiban_count1++)
        {{--6艇分繰り返し--}}

        <?php $mae_temp = $loop_teiban_count1; ?>
        <?php $mae_flg = 0; ?>

        <table class="ta_shusso" id="id_ta_shusso{{ $loop_teiban_count1 }}" @if($loop_teiban_count1 <> 1) style="display:none;" @endif >
            <tr>
                <th colspan="5">枠番別入着データ</th>
            </tr>
            <tr>
                <th class="first">1着</th>
                <th colspan="2">2着</th>
                <th colspan="2">3着</th>
            </tr>
            @for($loop_teiban_count2 = 1;$loop_teiban_count2 <= 6; $loop_teiban_count2++)
                {{--6艇分繰り返し--}}
                
                @if($mae_temp != $loop_teiban_count2)
                
                    <?php $naka_temp = $loop_teiban_count2; ?>
                    <?php $naka_flg = 0 ?>

                    @for($loop_teiban_count3 = 1;$loop_teiban_count3 <= 6; $loop_teiban_count3++)
                        {{--6艇分繰り返し--}}
                        
                        @if($mae_temp != $loop_teiban_count3 && $naka_temp != $loop_teiban_count3)
                            
                            <?php $ato_temp = $loop_teiban_count3; ?>

                            <tr>
                            @if($mae_flg == 0)
                                {{--前初回--}}

                                <td rowspan="20" class="r{{$loop_teiban_count1}} first_box">

                                @for($loop_teiban_count4 = 1;$loop_teiban_count4 <= 6; $loop_teiban_count4++)
                                    {{--6艇分繰り返し--}}
                                    @if($mae_temp == $loop_teiban_count4)
                                        <div id="b_waku" class="b_waku{{$loop_teiban_count4}} non">{{$loop_teiban_count4}}</div>
                                    @else
                                        <div id="b_waku" class="b_waku{{$loop_teiban_count4}}"><a href="javascript:funcWaku_RitsuButton({{$loop_teiban_count4}});">{{$loop_teiban_count4}}</a></div>
                                    @endif

                                @endfor

                                </td>
                                {{--値切り替わるまで入ってこないように--}}
                                <?php $mae_flg =1; ?>

                            @endif

                            @if($naka_flg == 0)
                                {{--中初回--}}
                                <td rowspan="4" class="r{{$naka_temp}}">{{$naka_temp}}</td>
                                
                                {{--初期化--}}
                                <?php $temp_data = ""; ?>

                                @if($nityaku_race_count[$mae_temp] > 0)
                                    <?php $temp_data = round( $nityaku_count[$mae_temp][$naka_temp] / $nityaku_race_count[$mae_temp] ,3) * 100; ?>

                                    <?php $temp_data = $temp_data."%"; ?>
                                @else
                                    {{--1着この艇（intTempMae）無し--}}
                                    <?php $temp_data = "---"; ?>
                                
                                @endif

                                <td rowspan="4">{{$temp_data}}</td>
                                
                                {{--値切り替わるまで入ってこないように--}}
                                <?php $naka_flg =1; ?>

                            @endif

                            <td class="r{{$ato_temp}}">{{$ato_temp}}</td>

                            {{--初期化--}}
                            <?php $temp_data = ""; ?>
                            @if($santyaku_race_count[$mae_temp][$naka_temp] > 0)
                                <?php $temp_data = round( $santyaku_count[$mae_temp][$naka_temp][$ato_temp] / $santyaku_race_count[$mae_temp][$naka_temp] ,3) * 100; ?>
                                <?php $temp_data = $temp_data."%"; ?>
                            @else
                                {{--1着この艇（intTempMae）無し--}}
                                <?php $temp_data = "---"; ?>
                    
                            @endif

                            <td class="percentage">{{$temp_data}}</td>

                            </tr>

                        @endif

                    @endfor

                @endif

            @endfor
        </table>

    @endfor

</div>

{{--
    <table class="ta_shusso" id="id_ta_shusso1">
      <tr>
        <th colspan="5">枠番別入着データ</th>
        </tr>
      <tr>
        <th class="first">1着</th>
        <th colspan="2">2着</th>
        <th colspan="2">3着</th>
        </tr>
      <tr>
        <td rowspan="20" class="r1 first_box"><div id="b_waku" class="b_waku1 non">1</div>
        <div id="b_waku" class="b_waku2"><a href="javascript:funcWaku_RitsuButton(2);">2</a></div>
        <div id="b_waku" class="b_waku3"><a href="javascript:funcWaku_RitsuButton(3);">3</a></div>
        <div id="b_waku" class="b_waku4"><a href="javascript:funcWaku_RitsuButton(4);">4</a></div>
        <div id="b_waku" class="b_waku5"><a href="javascript:funcWaku_RitsuButton(5);">5</a></div>
        <div id="b_waku" class="b_waku6"><a href="javascript:funcWaku_RitsuButton(6);">6</a></div>
        </td>
        <td rowspan="4" class="r2">2</td>
        <td rowspan="4">45.5%</td>
        <td class="r3">3</td>
        <td class="percentage">36.0%</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">30.7%</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">18.7%</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">14.7%</td>
      </tr>
      <tr>
        <td rowspan="4" class="r3">3</td>
        <td rowspan="4">15.8%</td>
        <td class="r2">2</td>
        <td class="percentage">30.8%</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">38.5%</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">26.9%</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">3.8%</td>
      </tr>
      <tr>
        <td rowspan="4" class="r4">4</td>
        <td rowspan="4">22.4%</td>
        <td class="r2">2</td>
        <td class="percentage">43.2%</td>
      </tr>
      <tr>
        <td class="r3">3</td>
        <td class="percentage">27.0%</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">16.2%</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">13.5%</td>
      </tr>
      <tr>
        <td rowspan="4" class="r5">5</td>
        <td rowspan="4">12.1%</td>
        <td class="r2">2</td>
        <td class="percentage">25.0%</td>
      </tr>
      <tr>
        <td class="r3">3</td>
        <td class="percentage">50.0%</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">20.0%</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">5.0%</td>
      </tr>
      <tr>
        <td rowspan="4" class="r6">6</td>
        <td rowspan="4">4.2%</td>
        <td class="r2">2</td>
        <td class="percentage">42.9%</td>
      </tr>
      <tr>
        <td class="r3">3</td>
        <td class="percentage">42.9%</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">14.3%</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">0.0%</td>
      </tr>
      </table>
      
    <table class="ta_shusso" id="id_ta_shusso2" style="display:none;">
      <tr>
        <th colspan="5">枠番別入着データ</th>
        </tr>
      <tr>
        <th class="first">1着</th>
        <th colspan="2">2着</th>
        <th colspan="2">3着</th>
        </tr>
      <tr>
        <td rowspan="20" class="r2 first_box">    <div id="b_waku" class="b_waku1"><a href="javascript:funcWaku_RitsuButton(1);">1</a></div>
    <div id="b_waku" class="b_waku2 non">2</div>
        <div id="b_waku" class="b_waku3"><a href="javascript:funcWaku_RitsuButton(3);">3</a></div>
        <div id="b_waku" class="b_waku4"><a href="javascript:funcWaku_RitsuButton(4);">4</a></div>
        <div id="b_waku" class="b_waku5"><a href="javascript:funcWaku_RitsuButton(5);">5</a></div>
        <div id="b_waku" class="b_waku6"><a href="javascript:funcWaku_RitsuButton(6);">6</a></div>
        </td>
        <td rowspan="4" class="r1">1</td>
        <td rowspan="4">77.8%</td>
        <td class="r3">3</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">42.9%</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">28.6%</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">28.6%</td>
      </tr>
      <tr>
        <td rowspan="4" class="r3">3</td>
        <td rowspan="4">11.1%</td>
        <td class="r1">1</td>
        <td class="percentage">100%</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td rowspan="4" class="r4">4</td>
        <td rowspan="4">11.1%</td>
        <td class="r1">1</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r3">3</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">100%</td>
      </tr>
      <tr>
        <td rowspan="4" class="r5">5</td>
        <td rowspan="4">0.0%</td>
        <td class="r1">1</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r3">3</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td rowspan="4" class="r6">6</td>
        <td rowspan="4">0.0%</td>
        <td class="r1">1</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r3">3</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">---</td>
      </tr>
      </table>
      
    <table class="ta_shusso" id="id_ta_shusso3" style="display:none;">
      <tr>
        <th colspan="5">枠番別入着データ</th>
        </tr>
      <tr>
        <th class="first">1着</th>
        <th colspan="2">2着</th>
        <th colspan="2">3着</th>
        </tr>
      <tr>
        <td rowspan="20" class="r3 first_box">    <div id="b_waku" class="b_waku1"><a href="javascript:funcWaku_RitsuButton(1);">1</a></div>
        <div id="b_waku" class="b_waku2"><a href="javascript:funcWaku_RitsuButton(2);">2</a></div>
    <div id="b_waku" class="b_waku3 non">3</div>
        <div id="b_waku" class="b_waku4"><a href="javascript:funcWaku_RitsuButton(4);">4</a></div>
        <div id="b_waku" class="b_waku5"><a href="javascript:funcWaku_RitsuButton(5);">5</a></div>
        <div id="b_waku" class="b_waku6"><a href="javascript:funcWaku_RitsuButton(6);">6</a></div>
        </td>
        <td rowspan="4" class="r1">1</td>
        <td rowspan="4">30.0%</td>
        <td class="r2">2</td>
        <td class="percentage">33.3%</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">33.3%</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">33.3%</td>
      </tr>
      <tr>
        <td rowspan="4" class="r2">2</td>
        <td rowspan="4">0.0%</td>
        <td class="r1">1</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td rowspan="4" class="r4">4</td>
        <td rowspan="4">30.0%</td>
        <td class="r1">1</td>
        <td class="percentage">33.3%</td>
      </tr>
      <tr>
        <td class="r2">2</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">33.3%</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">33.3%</td>
      </tr>
      <tr>
        <td rowspan="4" class="r5">5</td>
        <td rowspan="4">30.0%</td>
        <td class="r1">1</td>
        <td class="percentage">33.3%</td>
      </tr>
      <tr>
        <td class="r2">2</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">33.3%</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">33.3%</td>
      </tr>
      <tr>
        <td rowspan="4" class="r6">6</td>
        <td rowspan="4">10.0%</td>
        <td class="r1">1</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r2">2</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">100%</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">0.0%</td>
      </tr>
      </table>
      
    <table class="ta_shusso" id="id_ta_shusso4" style="display:none;">
      <tr>
        <th colspan="5">枠番別入着データ</th>
        </tr>
      <tr>
        <th class="first">1着</th>
        <th colspan="2">2着</th>
        <th colspan="2">3着</th>
        </tr>
      <tr>
        <td rowspan="20" class="r4 first_box">    <div id="b_waku" class="b_waku1"><a href="javascript:funcWaku_RitsuButton(1);">1</a></div>
        <div id="b_waku" class="b_waku2"><a href="javascript:funcWaku_RitsuButton(2);">2</a></div>
        <div id="b_waku" class="b_waku3"><a href="javascript:funcWaku_RitsuButton(3);">3</a></div>
    <div id="b_waku" class="b_waku4 non">4</div>
        <div id="b_waku" class="b_waku5"><a href="javascript:funcWaku_RitsuButton(5);">5</a></div>
        <div id="b_waku" class="b_waku6"><a href="javascript:funcWaku_RitsuButton(6);">6</a></div>
        </td>
        <td rowspan="4" class="r1">1</td>
        <td rowspan="4">44.4%</td>
        <td class="r2">2</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r3">3</td>
        <td class="percentage">50.0%</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">50.0%</td>
      </tr>
      <tr>
        <td rowspan="4" class="r2">2</td>
        <td rowspan="4">0.0%</td>
        <td class="r1">1</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r3">3</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td rowspan="4" class="r3">3</td>
        <td rowspan="4">11.1%</td>
        <td class="r1">1</td>
        <td class="percentage">100%</td>
      </tr>
      <tr>
        <td class="r2">2</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td rowspan="4" class="r5">5</td>
        <td rowspan="4">44.4%</td>
        <td class="r1">1</td>
        <td class="percentage">50.0%</td>
      </tr>
      <tr>
        <td class="r2">2</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r3">3</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">50.0%</td>
      </tr>
      <tr>
        <td rowspan="4" class="r6">6</td>
        <td rowspan="4">0.0%</td>
        <td class="r1">1</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r2">2</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r3">3</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">---</td>
      </tr>
      </table>
      
    <table class="ta_shusso" id="id_ta_shusso5" style="display:none;">
      <tr>
        <th colspan="5">枠番別入着データ</th>
        </tr>
      <tr>
        <th class="first">1着</th>
        <th colspan="2">2着</th>
        <th colspan="2">3着</th>
        </tr>
      <tr>
        <td rowspan="20" class="r5 first_box">    <div id="b_waku" class="b_waku1"><a href="javascript:funcWaku_RitsuButton(1);">1</a></div>
        <div id="b_waku" class="b_waku2"><a href="javascript:funcWaku_RitsuButton(2);">2</a></div>
        <div id="b_waku" class="b_waku3"><a href="javascript:funcWaku_RitsuButton(3);">3</a></div>
        <div id="b_waku" class="b_waku4"><a href="javascript:funcWaku_RitsuButton(4);">4</a></div>
    <div id="b_waku" class="b_waku5 non">5</div>
        <div id="b_waku" class="b_waku6"><a href="javascript:funcWaku_RitsuButton(6);">6</a></div>
        </td>
        <td rowspan="4" class="r1">1</td>
        <td rowspan="4">100%</td>
        <td class="r2">2</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r3">3</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">100%</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td rowspan="4" class="r2">2</td>
        <td rowspan="4">0.0%</td>
        <td class="r1">1</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r3">3</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td rowspan="4" class="r3">3</td>
        <td rowspan="4">0.0%</td>
        <td class="r1">1</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r2">2</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td rowspan="4" class="r4">4</td>
        <td rowspan="4">0.0%</td>
        <td class="r1">1</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r2">2</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r3">3</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r6">6</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td rowspan="4" class="r6">6</td>
        <td rowspan="4">0.0%</td>
        <td class="r1">1</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r2">2</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r3">3</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">---</td>
      </tr>
      </table>
      
    <table class="ta_shusso" id="id_ta_shusso6" style="display:none;">
      <tr>
        <th colspan="5">枠番別入着データ</th>
        </tr>
      <tr>
        <th class="first">1着</th>
        <th colspan="2">2着</th>
        <th colspan="2">3着</th>
        </tr>
      <tr>
        <td rowspan="20" class="r6 first_box">    <div id="b_waku" class="b_waku1"><a href="javascript:funcWaku_RitsuButton(1);">1</a></div>
        <div id="b_waku" class="b_waku2"><a href="javascript:funcWaku_RitsuButton(2);">2</a></div>
        <div id="b_waku" class="b_waku3"><a href="javascript:funcWaku_RitsuButton(3);">3</a></div>
        <div id="b_waku" class="b_waku4"><a href="javascript:funcWaku_RitsuButton(4);">4</a></div>
        <div id="b_waku" class="b_waku5"><a href="javascript:funcWaku_RitsuButton(5);">5</a></div>
    <div id="b_waku" class="b_waku6 non">6</div>
        </td>
        <td rowspan="4" class="r1">1</td>
        <td rowspan="4">0.0%</td>
        <td class="r2">2</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r3">3</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td rowspan="4" class="r2">2</td>
        <td rowspan="4">0.0%</td>
        <td class="r1">1</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r3">3</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td rowspan="4" class="r3">3</td>
        <td rowspan="4">100%</td>
        <td class="r1">1</td>
        <td class="percentage">100%</td>
      </tr>
      <tr>
        <td class="r2">2</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">0.0%</td>
      </tr>
      <tr>
        <td rowspan="4" class="r4">4</td>
        <td rowspan="4">0.0%</td>
        <td class="r1">1</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r2">2</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r3">3</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r5">5</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td rowspan="4" class="r5">5</td>
        <td rowspan="4">0.0%</td>
        <td class="r1">1</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r2">2</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r3">3</td>
        <td class="percentage">---</td>
      </tr>
      <tr>
        <td class="r4">4</td>
        <td class="percentage">---</td>
      </tr>
      </table>
      
    </div>
    --}}