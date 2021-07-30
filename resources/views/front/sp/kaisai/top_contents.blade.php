
@if($kaisai_master)
    <div class="page_tit">トップ@if($tomorrow_date){{'（明日）'}}@endif</div>
    @if( ($chushi_junen->中止開始レース番号 ?? 99) <= 1)
        {{--中止フラグ有（1R以下で中止登録）--}}
        <!---データ無し--->
        <table id="nodata">
            <tr>
            <td class="cyushi">{{ date('n/j',strtotime($target_date)) }}の開催は中止となりました</td>
            </tr>
        </table>
    @else
        {{--開催or途中中止--}}
        <div id="top_btn" class="cf">
            <ul>
                <li><a href="javascript:$('#id_kekkalist').trigger('click');">レース結果一覧</a></li>
                <li class="midokoro">
                <a href="javascript:funcMidokoroButton();"><span class="arrow_green">▼</span>{{ $kaisai_date_list[$target_date] }}のみどころ</a>
                </li>
            </ul>
        </div><!-- top_btn end -->
        
        @foreach ($syussou_all as $race_num => $syussou)

            @if( ($chushi_junen->中止開始レース番号 ?? 99) < $race_num )
                {{--中止レース番号超--}}
                {{--なにも表示しない--}}
            @elseif(($chushi_junen->中止開始レース番号 ?? 99) == $race_num)
                {{--中止レース番号--}}
                <div id="kinkyu">
					{{$race_num}}レース以降は中止打ち切りとなりました。<br>ご了承ください。
                </div>
            @else
            
                <!--{{$race_num}}R-->
                <div id="top_syusso" class="cf">
                <div id="race_num">
                <ul>
                @if($neer_kekka_race_number >= $race_num || $neer_kekka_race_number_tfinfo >= $race_num)
                <li class="end">
                    <a href="/asp/tsu/sp/kyogi/index.asp?jyo=09&amp;racenum={{$race_num}}&amp;page=16">                
                @else
                <li>
                    <a href="/asp/tsu/sp/kyogi/index.asp?jyo=09&amp;racenum={{$race_num}}&amp;page=2">
                @endif
                        <div class=" @isset($push_yoso[$race_num]) oshi @else oshi_non @endisset"></div>
                        <div class="num">{{$race_num}}<span>R</span></div>
                        <?php
                            $prop_name = 'SIMEKIRI_JIKOKU'.$race_num.'R'; 
                            $shimekiri = $race_header->$prop_name;
                        ?>
                        <div class="time">{{substr($shimekiri,0,2)}}:{{substr($shimekiri,2,2)}}</div>
                    </a>
                </li>
                </ul>
                </div>
                <div id="race_mem" class="cf">
                <table class="top_mem">
                    <tbody>
                        <tr>
                            @for($i=1;$i<=3;$i++)
                                <?php $name_div = explode(' ',str_replace('  ',' ',$syussou[$i]->SENSYU_NAME)); ?>
                                <td class="waku r{{$i}}">{{$i}}</td>

                                @if($ozz_info_all[$race_num][$i] == 2)
                                    <td>欠場</td>
                                @else
                                    <td class=" @if($syussou[$i]->SEX == 2) lady @endif @isset($highlight_array[$syussou[$i]->TOUBAN]) check @endisset ">{{$name_div[0]}}<span>{{ mb_substr($name_div[1],0,1) }}</span></td>
                                @endif
                            @endfor
                        </tr>
                        <tr>
                            @for($i=4;$i<=6;$i++)
                                <?php $name_div = explode(' ',str_replace('  ',' ',$syussou[$i]->SENSYU_NAME)); ?>
                                <td class="waku r{{$i}}">{{$i}}</td>
                                
                                @if($ozz_info_all[$race_num][$i] == 2)
                                    <td>欠場</td>
                                @else
                                    <td class=" @if($syussou[$i]->SEX == 2) lady @endif @isset($highlight_array[$syussou[$i]->TOUBAN]) check @endisset ">{{$name_div[0]}}<span>{{ mb_substr($name_div[1],0,1) }}</span></td>
                                @endif
                            @endfor
                        </tr>
                    </tbody>
                </table>
                </div> 
                </div><!-- top_syusso end -->
            @endif
            
        @endforeach


        
        <div id="caution">
        <span class="oshi">★</span>:記者の推しレース　<span class="check">■</span>:記者の注目選手 </div>
    @endif  
@else
    {{--非開催--}}
    <div class="page_tit">トップ</div>
    <!---データ無し--->
    <table id="nodata">
        <tr>
        <td>ただいまデータはございません</td>
        </tr>
    </table>
@endif