<div class="page_tit">結果詳細@if($tomorrow_flg)（明日）@endif</div>

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

    @if($neer_kekka_race_number != 0 && $neer_kekka_race_number >= $race_num) {{--結果有の見込み--}}
        <!---結果--->
        <table id="ta_result">
        <tr>
        <th class="header1">着</th>
        <th class="header1">枠番</th>
        <th class="header1">選手名</th>
        <th class="header1">進入</th>
        <th class="header1">ST</th>
        <th class="header1">レースタイム</th>
        </tr>
        @foreach($kekka as $item)
            <tr>
                <td class="chaku">{{$item->TYAKUJUN}}</td>
                <td class="waku r{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
                <td class="name n1_nocolor">{{$item->SENSYU_NAME}}</td>
                <td>{{$item->SHINNYU_COURSE}}</td>
                <td>{{mb_substr($item->START_TIMING,1)}}</td>
                <td>{{ ($item->RACE_TIME)?str_replace("’",".",($item->RACE_TIME)):"─" }}</td>
            </tr>
        @endforeach
        </table>
        <div id="re_bottom" class="cf">
        <div id="re_kimari">決まり手：{{str_replace("　","",($kekka[0]->KIMARITE??""))}}</div>
        </div>


        <!---払い戻し--->
        <table id="ta_result2">
        <tr>
        <th colspan="3" class="header1">払い戻し</th>
        <th class="header1">人気</th>
        </tr>

            {{--３連単--}}
            @if($fuseiritu_array[4] == 1) {{--不成立--}}
                <tr>
                    <td class="shurui" rowspan="1">3連単</td>
                    <td class="kumi_tan">不成立</td>
                    <td class="harai">---</td>
                    <td class="ninki">---</td>
                </tr>
            @elseif(!$sanrentan_array)
                <tr>
                    <td class="shurui" rowspan="1">3連単</td>
                    <td class="kumi_tan">---</td>
                    <td class="harai">---</td>
                    <td class="ninki">---</td>
                </tr>
            @else
                @foreach ($sanrentan_array as $key => $item)
                    <tr>
                        @if($key == 1)
                            <td class="shurui" rowspan="{{count($sanrentan_array)}}">3連単</td>
                        @endif

                        <td class="kumi_tan">
                            <img src="/sp/kyogi/images/num{{(int) substr($item['SANRENTAN'],0,1)}}.png" alt="{{(int) substr($item['SANRENTAN'],0,1)}}"><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num{{(int) substr($item['SANRENTAN'],1,1)}}.png" alt="{{(int) substr($item['SANRENTAN'],1,1)}}"><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num{{(int) substr($item['SANRENTAN'],2,1)}}.png" alt="{{(int) substr($item['SANRENTAN'],2,1)}}">
                        </td>
                        <td class="harai">{{number_format($item['SANRENTAN_MONEY'])}}円</td>
                        <td class="ninki">{{$item['SANRENTAN_NINKI']}}</td>
                    </tr>
                @endforeach
            @endif

            
            {{--３連複--}}
            @if($fuseiritu_array[4] == 1) {{--不成立--}}
                <tr>
                    <td class="shurui" rowspan="1">3連複</td>
                    <td class="kumi_fuku">不成立</td>
                    <td class="harai">---</td>
                    <td class="ninki">---</td>
                </tr>
            @elseif(!$sanrenfuku_array)
                <tr>
                    <td class="shurui" rowspan="1">3連複</td>
                    <td class="kumi_fuku">---</td>
                    <td class="harai">---</td>
                    <td class="ninki">---</td>
                </tr>
            @else
                @foreach ($sanrenfuku_array as $key => $item)
                    <tr>
                        @if($key == 1)
                            <td class="shurui" rowspan="{{count($sanrenfuku_array)}}">3連複</td>
                        @endif

                        <td class="kumi_fuku">
                            <img src="/sp/kyogi/images/num{{(int) substr($item['SANRENFUKU'],0,1)}}.png" alt="{{(int) substr($item['SANRENFUKU'],0,1)}}"><img src="/sp/kyogi/images/equal.png" alt="="><img src="/sp/kyogi/images/num{{(int) substr($item['SANRENFUKU'],1,1)}}.png" alt="{{(int) substr($item['SANRENFUKU'],1,1)}}"><img src="/sp/kyogi/images/equal.png" alt="="><img src="/sp/kyogi/images/num{{(int) substr($item['SANRENFUKU'],2,1)}}.png" alt="{{(int) substr($item['SANRENFUKU'],2,1)}}">
                        </td>
                        <td class="harai">{{number_format($item['SANRENFUKU_MONEY'])}}円</td>
                        <td class="ninki">{{$item['SANRENFUKU_NINKI']}}</td>
                    </tr>
                @endforeach
            @endif

            {{--2連単--}}
            @if($fuseiritu_array[2] == 1) {{--不成立--}}
                <tr>
                    <td class="shurui" rowspan="1">2連単</td>
                    <td class="kumi_tan">不成立</td>
                    <td class="harai">---</td>
                    <td class="ninki">---</td>
                </tr>
            @elseif(!$nirentan_array)
                <tr>
                    <td class="shurui" rowspan="1">2連単</td>
                    <td class="kumi_tan">---</td>
                    <td class="harai">---</td>
                    <td class="ninki">---</td>
                </tr>
            @else
                @foreach ($nirentan_array as $key => $item)
                    <tr>
                        @if($key == 1)
                            <td class="shurui" rowspan="{{count($nirentan_array)}}">2連単</td>
                        @endif

                        @if($item['NIRENTAN_MONEY'] == '70')
                            <td class="kumi_tan">特払い</td>
                            <td class="harai">70円</td>
                            <td class="ninki">---</td>
                        @else
                            <td class="kumi_tan">
                                <img src="/sp/kyogi/images/num{{(int) substr($item['NIRENTAN'],0,1)}}.png" alt="{{(int) substr($item['NIRENTAN'],0,1)}}"><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num{{(int) substr($item['NIRENTAN'],1,1)}}.png" alt="{{(int) substr($item['NIRENTAN'],1,1)}}">
                            </td>
                            <td class="harai">{{number_format($item['NIRENTAN_MONEY'])}}円</td>
                            <td class="ninki">{{$item['NIRENTAN_NINKI']}}</td>
                        @endif
                    </tr>
                @endforeach
            @endif

            {{--２連複--}}
            @if($fuseiritu_array[3] == 1) {{--不成立--}}
                <tr>
                    <td class="shurui" rowspan="1">2連複</td>
                    <td class="kumi_fuku">不成立</td>
                    <td class="harai">---</td>
                    <td class="ninki">---</td>
                </tr>
            @elseif(!$nirenfuku_array)
                <tr>
                    <td class="shurui" rowspan="1">2連複</td>
                    <td class="kumi_fuku">---</td>
                    <td class="harai">---</td>
                    <td class="ninki">---</td>
                </tr>
            @else
                @foreach ($nirenfuku_array as $key => $item)
                    <tr>
                        @if($key == 1)
                            <td class="shurui" rowspan="{{count($nirenfuku_array)}}">2連複</td>
                        @endif

                        @if($item['NIRENFUKU_MONEY'] == '70')
                            <td class="kumi_fuku">特払い</td>
                            <td class="harai">70円</td>
                            <td class="ninki">---</td>
                        @else
                            <td class="kumi_fuku">
                                @if(substr($item['NIRENFUKU'],0,1) < substr($item['NIRENFUKU'],1,1)) 
                                    <img src="/sp/kyogi/images/num{{(int) substr($item['NIRENFUKU'],0,1)}}.png" alt="{{(int) substr($item['NIRENFUKU'],0,1)}}"><img src="/sp/kyogi/images/equal.png" alt="="><img src="/sp/kyogi/images/num{{(int) substr($item['NIRENFUKU'],1,1)}}.png" alt="{{(int) substr($item['NIRENFUKU'],1,1)}}">                           
                                @else
                                    <img src="/sp/kyogi/images/num{{(int) substr($item['NIRENFUKU'],1,1)}}.png" alt="{{(int) substr($item['NIRENFUKU'],1,1)}}"><img src="/sp/kyogi/images/equal.png" alt="="><img src="/sp/kyogi/images/num{{(int) substr($item['NIRENFUKU'],0,1)}}.png" alt="{{(int) substr($item['NIRENFUKU'],0,1)}}">
                                @endif
                            </td>
                            <td class="harai">{{number_format($item['NIRENFUKU_MONEY'])}}円</td>
                            <td class="ninki">{{$item['NIRENFUKU_NINKI']}}</td>
                        @endif
                    </tr>
                @endforeach
            @endif

            {{--拡連複--}}
            @if($fuseiritu_array[6] == 1) {{--不成立--}}
                <tr>
                    <td class="shurui" rowspan="1">拡連複</td>
                    <td class="kumi_fuku">不成立</td>
                    <td class="harai">---</td>
                    <td class="nink">―</td>
                </tr>
            @elseif(!$kakurenfuku_array)
                <tr>
                    <td class="shurui" rowspan="1">拡連複</td>
                    <td class="kumi_fuku">---</td>
                    <td class="harai">---</td>
                    <td class="ninki">---</td>
                </tr>
            @else
                @foreach ($kakurenfuku_array as $key => $item)
                    <tr>
                        @if($key == 1)
                            <td class="shurui" rowspan="{{count($kakurenfuku_array)}}">拡連複</td>
                        @endif

                        <td class="kumi_fuku">
                            <img src="/sp/kyogi/images/num{{(int) substr($item['KAKURENFUKU'],0,1)}}.png" alt="{{(int) substr($item['KAKURENFUKU'],0,1)}}"><img src="/sp/kyogi/images/equal.png" alt="="><img src="/sp/kyogi/images/num{{(int) substr($item['KAKURENFUKU'],1,1)}}.png" alt="{{(int) substr($item['KAKURENFUKU'],1,1)}}">
                        </td>
                        <td class="harai">{{number_format($item['KAKURENFUKU_MONEY'])}}円</td>
                        <td class="ninki">{{$item['KAKURENFUKU_NINKI']}}</td>
                        
                    </tr>
                @endforeach
            @endif

            {{--単勝--}}
            @if($fuseiritu_array[0] == 1) {{--不成立--}}
                <tr>
                    <td class="shurui" rowspan="1">単勝</td>
                    <td class="kumi_tan">不成立</td>
                    <td class="harai">---</td>
                    <td class="ninki bottom">―</td>
                </tr>
            @elseif(!$tansyo_array)
                <tr>
                    <td class="shurui" rowspan="1">単勝</td>
                    <td class="kumi_tan">---</td>
                    <td class="harai">---</td>
                    <td class="ninki">---</td>
                </tr>
            @else
                @foreach ($tansyo_array as $key => $item)
                    <tr>
                        @if($key == 1)
                            <td class="shurui" rowspan="{{count($tansyo_array)}}">単勝</td>
                        @endif
                        
                        @if($item['TANSYO_MONEY'] == '70')
                            <td class="kumi_tan">特払い</td>
                            <td class="harai"><span>70</span>円</td>
                            <td class="ninki">---</td>
                        @else
                            <td class="kumi_tan"><img src="/sp/kyogi/images/num{{(int)$item['TANSYO']}}.png" alt="{{(int)$item['TANSYO']}}"></td>
                            <td class="harai">{{number_format($item['TANSYO_MONEY'])}}円</td>
                            <td class="ninki">---</td>
                        @endif
                    </tr>
                @endforeach
            @endif

            {{--複勝--}}
            @if($fuseiritu_array[1] == 1) {{--不成立--}}
                <tr>
                    <td class="shurui" rowspan="1">複勝</td>
                    <td class="kumi_tan">不成立</td>
                    <td class="harai">---</td>
                    <td class="ninki">---</td>
                </tr>
            @elseif(!$fukusyo_array)
                <tr>
                    <td class="shurui" rowspan="1">複勝</td>
                    <td class="kumi_tan">---</td>
                    <td class="harai">---</td>
                    <td class="ninki">---</td>
                </tr>
            @else
                @foreach ($fukusyo_array as $key => $item)
                    <tr>
                        @if($key == 1)
                            <td class="shurui" rowspan="{{count($fukusyo_array)}}">複勝</td>
                        @endif

                        @if($item['FUKUSYO_MONEY'] == '70')
                            <td class="kumi_tan">特払い</td>
                            <td class="harai"><span>70</span>円</td>
                            <td class="ninki">---</td>
                        @else
                            <td class="kumi_tan"><img src="/sp/kyogi/images/num{{(int)$item['FUKUSYO']}}.png" alt="{{(int)$item['FUKUSYO']}}"></td>
                            <td class="harai">{{number_format($item['FUKUSYO_MONEY'])}}円</td>
                            <td class="ninki">---</td>
                        @endif
                    </tr>
                @endforeach
            @endif

        </table>

        <!--スタート展示-->
        <table id="ta_shusso" class="start">
            <tr>
                <th class="header1">CGスリット</th>
                <th class="header1">ST</th>
                <th class="header1">決まり手</th>
            </tr>
            @foreach($kekka_array as $teiban=>$item)
                <tr>
                    <td class="slit_img @if($teiban == 1) in @elseif($teiban == 6) out bottom @endif "><img src="/sp/kyogi/images/st0{{$teiban}}.png" width="62" height="52" style="margin-right:{{ $item['right_margin'] }}px;"/></td>
                    <td class="ST2 @if($teiban == 6) bottom @endif">
                        @if($item['record']->TYAKUJUN == 'L')
                            <span class="FL">L.--</span>
                        @elseif($item['record']->TYAKUJUN == 'F')
                            <span class="FL">F{{ mb_substr($item['record']->START_TIMING,1) }}</span>                        
                        @else
                            {{mb_substr($item['record']->START_TIMING,1)}}
                        @endif
                    </td>
                    <td class="kimari @if($teiban == 6) bottom @endif">@if($teiban == 1){{str_replace("　","",($kekka[0]->KIMARITE??""))}}@endif</td>
                </tr>
            @endforeach
        </table>
        <div id="syosai_kikou" class="cf">
        @if($kekka_info)
            <div class="kikou_left"><span class="gray">天候:</span>{{$kekka_info->TENKOU}}　<span class="gray">波高:</span>{{$kekka_info->HAKO}}cm　<span class="gray">風:</span>{{$kekka_info->KAZAMUKI2}}&nbsp;{{$kekka_info->FUSOKU}}m/秒</div>    
        @else
            <div class="kikou_left"><span class="gray">天候:</span>-　<span class="gray">波高:</span>-　<span class="gray">風:</span>-</div>
        @endif
        </div><!-- weather end -->
    @else
        <!---データ無し--->
        <table id="nodata">
            <tr>
                <td>ただいまデータはございません</td>
            </tr>
        </table>
    @endif
@endif
