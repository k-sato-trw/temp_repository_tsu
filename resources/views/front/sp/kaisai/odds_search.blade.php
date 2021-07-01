@if($kaisai_master)
    <div class="page_tit">検索@if($tomorrow_flg)（明日）@endif</div>

    @if($chushi_junen)

        @if($chushi_junen->中止開始レース番号 <= 1)
            {{--1R以下で中止登録--}}
            <!---データ無し--->
            <table id="nodata">
                <tr>
                    <td class="cyushi">{{date('n/j',strtotime($target_date))}}の開催は中止となりました</td>
                </tr>
            </table>
        @else
            <!---データ無し--->
            <table id="nodata">
                <tr>
                    <td class="cyushi">第{{$chushi_junen->中止開始レース番号}}レース以降は中止となりました</td>
                </tr>
            </table>
        @endif
    
    @else
        @if($sanrentan_flg)
            <div class="odds_read">オッズをタップすると色が変わり、オッズ計算ページにタップした組み合わせが反映されます。</div>
        @endif

        @if($sanrentan_flg)

            <!--3連単 流し検索-->
            <div class="data cf">

            <h2 class="top_space">3連単 流し検索</h2>

            <!--選手名-->
            <table id="ta_3rentan_nagashi_name">
            <tr>
                <td class="r1">1</td>
                <td class="n1_nocolor @if($syussou[1]->SEX == 2) lady @endif">@if($ozz_info_array[1] == 2){{'欠場'}}@else{{$syussou[1]->SENSYU_NAME}}@endif</td>
                <td class="r2">2</td>
                <td class="n2_nocolor @if($syussou[2]->SEX == 2) lady @endif">@if($ozz_info_array[2] == 2){{'欠場'}}@else{{$syussou[2]->SENSYU_NAME}}@endif</td>
                <td class="r3">3</td>
                <td class="n3_nocolor @if($syussou[3]->SEX == 2) lady @endif">@if($ozz_info_array[3] == 2){{'欠場'}}@else{{$syussou[3]->SENSYU_NAME}}@endif</td>
            </tr>
            <tr>
                <td class="r4">4</td>
                <td class="n4_nocolor @if($syussou[4]->SEX == 2) lady @endif">@if($ozz_info_array[4] == 2){{'欠場'}}@else{{$syussou[4]->SENSYU_NAME}}@endif</td>
                <td class="r5">5</td>
                <td class="n5_nocolor @if($syussou[5]->SEX == 2) lady @endif">@if($ozz_info_array[5] == 2){{'欠場'}}@else{{$syussou[5]->SENSYU_NAME}}@endif</td>
                <td class="r6">6</td>
                <td class="n6_nocolor @if($syussou[6]->SEX == 2) lady @endif">@if($ozz_info_array[6] == 2){{'欠場'}}@else{{$syussou[6]->SENSYU_NAME}}@endif</td>
            </table>
            <!--選手名-->

            <!--艇選択-->
            <div id="nagashi_select">

                <div class="set no1 cf">
                    <div class="left">1着</div>
                    <div class="right cf">
                        <ul class="btn1 cf">
                            @for($teiban = 1;$teiban<=6;$teiban++)

                                @if($ozz_info_array[$teiban] == 2) {{--欠場--}}
                                    <li id="id_nagashi1{{$teiban}}" class="r{{$teiban}} no_select" >{{$teiban}}</li>
                                @else {{--出走--}}
                                    @if($search_type == 1) {{--流し検索--}}
                                        @if($search_select[1] == $teiban)
                                            <li id="id_nagashi1{{$teiban}}" class="r{{$teiban}} on" onclick="javascript:funcOdds_NagashiSearch('1','{{$teiban}}');">{{$teiban}}</li>                                        
                                        @else
                                            <li id="id_nagashi1{{$teiban}}" class="r{{$teiban}}" onclick="javascript:funcOdds_NagashiSearch('1','{{$teiban}}');">{{$teiban}}</li>
                                        @endif
                                    @else {{--流し検索されていない--}}
                                        <li id="id_nagashi1{{$teiban}}" class="r{{$teiban}}" onclick="javascript:funcOdds_NagashiSearch('1','{{$teiban}}');">{{$teiban}}</li>
                                    @endif
                                @endif
                                
                            @endfor
                        </ul>
                        @if($search_type == 1)
                            @if($search_select[1] == 0)
                                <div id="id_nagashi10" class="btn2 on" onclick="javascript:funcOdds_NagashiSearch('1','0');">全通り</div>
                            @else
                                <div id="id_nagashi10" class="btn2" onclick="javascript:funcOdds_NagashiSearch('1','0');">全通り</div>
                            @endif
                        @else
                            <div id="id_nagashi10" class="btn2" onclick="javascript:funcOdds_NagashiSearch('1','0');">全通り</div>
                        @endif
                        
                    </div>
                </div><!--/#set-->

                <div class="set no2 cf">
                    <div class="left">2着</div>
                    <div class="right cf">
                        <ul class="btn1 cf">
                            @for($teiban = 1;$teiban<=6;$teiban++)

                                @if($ozz_info_array[$teiban] == 2) {{--欠場--}}
                                    <li id="id_nagashi2{{$teiban}}" class="r{{$teiban}} no_select" >{{$teiban}}</li>
                                @else {{--出走--}}
                                    @if($search_type == 1) {{--流し検索--}}
                                        @if($search_select[2] == $teiban)
                                            <li id="id_nagashi2{{$teiban}}" class="r{{$teiban}} on" onclick="javascript:funcOdds_NagashiSearch('2','{{$teiban}}');">{{$teiban}}</li>                                        
                                        @else
                                            <li id="id_nagashi2{{$teiban}}" class="r{{$teiban}}" onclick="javascript:funcOdds_NagashiSearch('2','{{$teiban}}');">{{$teiban}}</li>
                                        @endif
                                    @else {{--流し検索されていない--}}
                                        <li id="id_nagashi2{{$teiban}}" class="r{{$teiban}}" onclick="javascript:funcOdds_NagashiSearch('2','{{$teiban}}');">{{$teiban}}</li>
                                    @endif
                                @endif
                                
                            @endfor
                        </ul>
                        @if($search_type == 1)
                            @if($search_select[2] == 0)
                                <div id="id_nagashi20" class="btn2 on" onclick="javascript:funcOdds_NagashiSearch('2','0');">全通り</div>
                            @else
                                <div id="id_nagashi20" class="btn2" onclick="javascript:funcOdds_NagashiSearch('2','0');">全通り</div>
                            @endif
                        @else
                            <div id="id_nagashi20" class="btn2" onclick="javascript:funcOdds_NagashiSearch('2','0');">全通り</div>
                        @endif
                        
                    </div>
                </div><!--/#set-->

                <div class="set no3 cf">
                    <div class="left">3着</div>
                    <div class="right cf">
                        <ul class="btn1 cf">
                            @for($teiban = 1;$teiban<=6;$teiban++)

                                @if($ozz_info_array[$teiban] == 2) {{--欠場--}}
                                    <li id="id_nagashi3{{$teiban}}" class="r{{$teiban}} no_select" >{{$teiban}}</li>
                                @else {{--出走--}}
                                    @if($search_type == 1) {{--流し検索--}}
                                        @if($search_select[3] == $teiban)
                                            <li id="id_nagashi3{{$teiban}}" class="r{{$teiban}} on" onclick="javascript:funcOdds_NagashiSearch('3','{{$teiban}}');">{{$teiban}}</li>                                        
                                        @else
                                            <li id="id_nagashi3{{$teiban}}" class="r{{$teiban}}" onclick="javascript:funcOdds_NagashiSearch('3','{{$teiban}}');">{{$teiban}}</li>
                                        @endif
                                    @else {{--流し検索されていない--}}
                                        <li id="id_nagashi3{{$teiban}}" class="r{{$teiban}}" onclick="javascript:funcOdds_NagashiSearch('3','{{$teiban}}');">{{$teiban}}</li>
                                    @endif
                                @endif
                                
                            @endfor
                        </ul>
                        @if($search_type == 1)
                            @if($search_select[3] == 0)
                                <div id="id_nagashi30" class="btn2 on" onclick="javascript:funcOdds_NagashiSearch('3','0');">全通り</div>
                            @else
                                <div id="id_nagashi30" class="btn2" onclick="javascript:funcOdds_NagashiSearch('3','0');">全通り</div>
                            @endif
                        @else
                            <div id="id_nagashi30" class="btn2" onclick="javascript:funcOdds_NagashiSearch('3','0');">全通り</div>
                        @endif
                        
                    </div>
                </div><!--/#set-->

            <form id="ozzNagashiform" name="ozzNagashiform" action="/asp/tsu/sp/kyogi/index.asp?jyo={{$jyo}}&racenum={{$race_num}}&type=1&page=12" method="post">
                @if($search_type == 1) {{--流し検索--}}
                    @for($i=1;$i<=3;$i++)
                        <Input type="hidden" name="select{{$i}}" value="{{$search_select[$i]}}">
                    @endfor
                @else
                    <Input type="hidden" name="select1" value="7">
                    <Input type="hidden" name="select2" value="7">
                    <Input type="hidden" name="select3" value="7">
                @endif

                @csrf
            </form>

            <div class="bot cf">
                <div class="att">※1着、2着、3着とも全通りを選ぶことはできません。</div>
                <div class="search"><a href="javascript:funcOdds_NagashiSearchExe();">検索</a></div>
            </div>


            </div><!--/#nagashi_select-->
            <!--艇選択-->

            {{--流し検索結果↓--}}
            @if($search_type == 1)
                <!--結果-->
                <div id="nagashi_kekka" class="cf">
                {{--全通りの数調査（2つ以上だと左側、右側に分ける必要有--}}
                <?php 
                    $intTempData = 0; 
                    
                    for($intLoopCount = 1;$intLoopCount <= 3;$intLoopCount++){
                        if($search_select[$intLoopCount] == 0){
                            $intTempData = $intTempData + 1;
                        }
                    }

                    //++++++++++++++++++++++++++++++
                    //流し結果表示
                    //・パターン
                    //全全1
                    //全1全
                    //全11
                    //1全全
                    //1全1
                    //11全
                    //111
                ?>

                @if($intTempData >= 2)
                    <table id="ta_nagashi_kekka" class="left">
                @else
                    <table id="ta_nagashi_kekka">
                @endif

                <?php
                    //表示数カウント
                    $intTempData2 = 0;
                ?>

                @if($search_select[1] == 0)
                    {{--1着全通り 409--}}
                    <?php
                        $intTempViewNakaFlag = 0;
                        $intTempViewAtoFlag = 0;
                    ?>

                    @for($intLoopCount=1;$intLoopCount<=6;$intLoopCount++)
                        {{--1着全通りループ 415--}}
                        <?php
                            $intTempMae = $intLoopCount;
                            $intTempViewMaeFlag = 0;
                        ?>

                        @if($search_select[2] == 0)
                            {{--2着全通り--}}

                            @for($intLoopCount2=1;$intLoopCount2<=6;$intLoopCount2++)
                                {{--2着全通りループ--}}
                                <?php
                                    $intTempNaka = $intLoopCount2;
                                    $intTempViewNakaFlag = 0;
                                ?>

                                @if($search_select[3] == 0)
                                    {{--3着全通り--}}
                                    {{--全て全通りはできないため処理しない--}}
                                @else
                                    {{--3着1点--}}
                                    {{--全全1--}}
                                    <?php $intTempAto = $search_select[3]; ?>

                                    @if($intTempMae != $intTempAto && $intTempMae != $intTempNaka && $intTempNaka != $intTempAto)
                                        {{--全て値が違う 442 --}}
                                        @if($intTempData2 == 12)
                                            </table>
                                            <table id="ta_nagashi_kekka" class="Right">
                                            <?php
                                                //リセット
                                                $intTempViewMaeFlag = 0;
                                                $intTempViewNakaFlag = 0;
                                                $intTempViewAtoFlag = 0;
                                            ?>
                                        @endif

                                        <tr>

                                        @if($intTempViewMaeFlag == 0)
                                            <td rowspan="4" class="r{{$intTempMae}}">{{$intTempMae}}</td>
                                            <?php $intTempViewMaeFlag = 1; ?>
                                        @endif

                                        @if($intTempViewNakaFlag == 0)
                                            <td class="r{{$intTempNaka}}">{{$intTempNaka}}</td>
                                            <?php $intTempViewNakaFlag = 1; ?>
                                        @endif

                                        @if($intTempViewAtoFlag == 0)

                                            @if($intTempData2 >= 12)
                                                <td rowspan="8" class="r{{$intTempAto}}">{{$intTempAto}}</td>
                                            @else
                                                <td rowspan="12" class="r{{$intTempAto}}">{{$intTempAto}}</td>
                                            @endif

                                            <?php $intTempViewAtoFlag = 1; ?>
                                        @endif
                                        
                                        <td class="value class_{{$intTempMae}}-{{$intTempNaka}}-{{$intTempAto}}" ><a href="javascript:funcCalcToggle( '{{$intTempMae}}-{{$intTempNaka}}-{{$intTempAto}}' );">{{ $bairitu_3rentan[$intTempMae][$intTempNaka][$intTempAto] }}</a></td>
                                        </tr>

                                        <?php $intTempData2 = $intTempData2 + 1; ?>
                                    @endif

                                @endif

                            @endfor
                            
                        @else
                            {{--2着1点 503 --}}
                            <?php $intTempNaka = $search_select[2]; ?>

                            @if($search_select[3] == 0)
                                {{--3着全通り--}}

                                {{--全1全--}}

                                @for($intLoopCount3 = 1; $intLoopCount3 <= 6; $intLoopCount3++)
                                    {{--3着全通りループ--}}
                                    <?php
                                        $intTempAto = $intLoopCount3;
                                        $intTempViewAtoFlag = 0;
                                    ?>

                                    @if($intTempMae != $intTempAto && $intTempMae != $intTempNaka && $intTempNaka != $intTempAto)
                                        {{--全て値が違う--}}

                                        @if($intTempData2 == 12)
                                            {{--一旦左右で分ける--}}
                                            </table>
                                            <table id="ta_nagashi_kekka" class="Right">
                                            
                                            <?php
                                                //リセット
                                                $intTempViewMaeFlag = 0;
                                                $intTempViewNakaFlag = 0;
                                                $intTempViewAtoFlag = 0;
                                            ?>
                                        @endif

                                        <tr>

                                        @if($intTempViewMaeFlag == 0)
                                            <td rowspan="4" class="r{{$intTempMae}}">{{$intTempMae}}</td>
                                            <?php $intTempViewMaeFlag = 1; ?>
                                        @endif

                                        @if($intTempViewNakaFlag == 0)
                                            @if($intTempData2 >= 12)
                                                <td rowspan="8" class="r{{$intTempNaka}}">{{$intTempNaka}}</td>
                                            @else
                                                <td rowspan="12" class="r{{$intTempNaka}}">{{$intTempNaka}}</td>
                                            @endif
                                            <?php $intTempViewNakaFlag = 1; ?>
                                        @endif

                                        @if($intTempViewAtoFlag == 0)
                                            <td class="r{{$intTempAto}}">{{$intTempAto}}</td>
                                            <?php $intTempViewAtoFlag = 1; ?>
                                        @endif

                                        <td class="value class_{{$intTempMae}}-{{$intTempNaka}}-{{$intTempAto}}"><a href="javascript:funcCalcToggle( '{{$intTempMae}}-{{$intTempNaka}}-{{$intTempAto}}' );">{{ $bairitu_3rentan[$intTempMae][$intTempNaka][$intTempAto] }}</a></td>
                                        </tr>
                                    @endif

                                @endfor

                            @else
                                {{--3着1点--}}
                                {{--全11--}}

                                <?php $intTempAto = $search_select[3]; ?>

                                @if( $intTempMae != $intTempAto && $intTempMae != $intTempNaka && $intTempNaka != $intTempAto )
                                    {{--全て値が違う--}}
                                    <tr>
                                    @if($intTempViewMaeFlag == 0)
                                        <td class="r{{$intTempMae}}" >{{$intTempMae}}</td>
                                        <?php $intTempViewMaeFlag = 1; ?>
                                    @endif

                                    @if($intTempViewNakaFlag == 0)
                                        <td rowspan="4" class="r{{$intTempNaka}}">{{$intTempNaka}}</td>
                                        <?php $intTempViewNakaFlag = 1; ?>
                                    @endif

                                    @if($intTempViewAtoFlag == 0)
                                        <td rowspan="4" class="r{{$intTempAto}}">{{$intTempAto}}</td>
                                        <?php $intTempViewAtoFlag = 1; ?>
                                    @endif

                                    <td class="value class_{{$intTempMae}}-{{$intTempNaka}}-{{$intTempAto}}"><a href="javascript:funcCalcToggle( '{{$intTempMae}}-{{$intTempNaka}}-{{$intTempAto}}' );">{{ $bairitu_3rentan[$intTempMae][$intTempNaka][$intTempAto] }}</a></td>
                                    </tr>
                                @endif

                            @endif
                            
                        @endif

                    @endfor

                @else
                    {{--1着1点--}}
                    <?php
                        $intTempMae = $search_select[1];
                        $intTempViewMaeFlag = 0;
                    ?>

                    @if($search_select[2] == 0)
                        {{--2着全通り 633--}}

                        <?php $intTempViewAtoFlag = 0; ?>

                        @for($intLoopCount2 = 1; $intLoopCount2 <= 6; $intLoopCount2++)
                            {{--2着全通りループ--}}
                            <?php
                                $intTempNaka = $intLoopCount2;
                                $intTempViewNakaFlag = 0;
                            ?>

                            @if($search_select[3] == 0)
                                {{--3着全通り--}}
                                {{--1全全--}}

                                @for($intLoopCount3 = 1; $intLoopCount3 <= 6; $intLoopCount3++)
                                    <?php
                                        $intTempAto = $intLoopCount3;
                                        $intTempViewAtoFlag = 0;
                                    ?>

                                    @if( $intTempMae != $intTempAto && $intTempMae != $intTempNaka && $intTempNaka != $intTempAto )
                                        {{--全て値が違う--}}

                                        @if($intTempData2 == 12)
                                            {{--一旦左右で分ける--}}
                                            </table>
                                            <table id="ta_nagashi_kekka" class="Right">
                                            <?php
                                                //リセット
                                                $intTempViewMaeFlag = 0;
                                                $intTempViewNakaFlag = 0;
                                                $intTempViewAtoFlag = 0;
                                            ?>
                                        @endif

                                        <tr>

                                        @if($intTempViewMaeFlag == 0)
                                            @if($intTempData2 >= 12)
                                                <td rowspan="8" class="r{{$intTempMae}}">{{$intTempMae}}</td>
                                            @else
                                                <td rowspan="12" class="r{{$intTempMae}}">{{$intTempMae}}</td>
                                            @endif

                                            <?php $intTempViewMaeFlag = 1; ?>
                                        @endif

                                        @if($intTempViewNakaFlag == 0)
                                        
                                            <td rowspan="4" class="r{{$intTempNaka}}">{{$intTempNaka}}</td>

                                            <?php $intTempViewNakaFlag = 1; ?>
                                        @endif
                                        

                                        @if($intTempViewAtoFlag == 0)
                                        
                                            <td class="r{{$intTempAto}}">{{$intTempAto}}</td>

                                            <?php $intTempViewAtoFlag = 1; ?>
                                        @endif

                                        <td class="value class_{{$intTempMae}}-{{$intTempNaka}}-{{$intTempAto}}" ><a href="javascript:funcCalcToggle( '{{$intTempMae}}-{{$intTempNaka}}-{{$intTempAto}}' );">{{ $bairitu_3rentan[$intTempMae][$intTempNaka][$intTempAto] }}</a></td>
                                        </tr>

                                        <?php $intTempData2 = $intTempData2 + 1; ?>
                                    @endif

                                @endfor
                            
                            @else
                                {{--3着1点--}}
                                {{--1全1--}}

                                <?php $intTempAto = $search_select[3]; ?>

                                @if( $intTempMae != $intTempAto && $intTempMae != $intTempNaka && $intTempNaka != $intTempAto )
                                    {{--全て値が違う--}}
                                    <tr>

                                    @if($intTempViewMaeFlag == 0)

                                        <td rowspan="4" class="r{{$intTempMae}}">{{$intTempMae}}</td>

                                        <?php $intTempViewMaeFlag = 1; ?>
                                    @endif

                                    @if($intTempViewNakaFlag == 0)
                                    
                                        <td class="r{{$intTempNaka}}">{{$intTempNaka}}</td>

                                        <?php $intTempViewNakaFlag = 1; ?>
                                    @endif
                                    

                                    @if($intTempViewAtoFlag == 0)
                                    
                                        <td rowspan="4" class="r{{$intTempAto}}">{{$intTempAto}}</td>

                                        <?php $intTempViewAtoFlag = 1; ?>
                                    @endif

                                    <td class="value class_{{$intTempMae}}-{{$intTempNaka}}-{{$intTempAto}}" ><a href="javascript:funcCalcToggle( '{{$intTempMae}}-{{$intTempNaka}}-{{$intTempAto}}' );">{{ $bairitu_3rentan[$intTempMae][$intTempNaka][$intTempAto] }}</a></td>
                                    </tr>

                                @endif

                            @endif

                        @endfor
                        
                    @else
                        {{--2着1点--}}

                        <?php
                            $intTempNaka = $search_select[2];
                            $intTempViewNakaFlag = 0
                        ?>

                        @if($search_select[3] == 0)
                            {{--3着全通り--}}
                            
                            {{--11全--}}
                            
                            @for($intLoopCount3 = 1; $intLoopCount3 <= 6; $intLoopCount3++)
                                {{--3着全通りループ--}}

                                <?php $intTempAto = $intLoopCount3; ?>

                                @if( $intTempMae != $intTempAto && $intTempMae != $intTempNaka && $intTempNaka != $intTempAto )
                                    {{--全て値が違う--}}

                                    <?php $intTempAto = $intLoopCount3; ?>
                                    
                                    <tr>

                                    @if($intTempViewMaeFlag == 0)
                                        <td rowspan="4" class="r{{$intTempMae}}">{{$intTempMae}}</td>
                                        <?php $intTempViewMaeFlag = 1; ?>
                                    @endif
                                    
                                    @if($intTempViewNakaFlag == 0)
                                        <td rowspan="4" class="r{{$intTempNaka}}">{{$intTempNaka}}</td>
                                        <?php $intTempViewNakaFlag = 1; ?>
                                    @endif

                                    <td class="r{{$intTempAto}}">{{$intTempAto}}</td>
                                    <td class="value class_{{$intTempMae}}-{{$intTempNaka}}-{{$intTempAto}}" ><a href="javascript:funcCalcToggle( '{{$intTempMae}}-{{$intTempNaka}}-{{$intTempAto}}' );">{{ $bairitu_3rentan[$intTempMae][$intTempNaka][$intTempAto] }}</a></td>
                                    </tr>
                                    
                                @endif

                            @endfor

                        @else
                            {{--3着1点--}}
                            {{--111--}}

                            <?php $intTempAto = $search_select[3]; ?>
                            <tr>
                                <td class="r{{$intTempMae}}">{{$intTempMae}}</td>
                                <td class="r{{$intTempNaka}}">{{$intTempNaka}}</td>
                                <td class="r{{$intTempAto}}">{{$intTempAto}}</td>
                                <td class="value class_{{$intTempMae}}-{{$intTempNaka}}-{{$intTempAto}}" ><a href="javascript:funcCalcToggle( '{{$intTempMae}}-{{$intTempNaka}}-{{$intTempAto}}' );">{{ $bairitu_3rentan[$intTempMae][$intTempNaka][$intTempAto] }}</a></td>
                            </tr>
                                    
                        @endif

                    @endif
                    
                @endif

                </table>
                </div>
                <!--結果-->

            @endif
            {{--流し検索結果↑--}}

            </div>




            <!--3連単 ボックス検索-->
            <div class="data cf">

            <h2>3連単 ボックス検索</h2>

            <!--選手名-->
            <table id="ta_3rentan_box_name">
            <tr>
            <td class="r1">1</td>
            <td class="n1_nocolor @if($syussou[1]->SEX == 2) lady @endif">@if($ozz_info_array[1] == 2){{'欠場'}}@else{{$syussou[1]->SENSYU_NAME}}@endif</td>
            <td class="r2">2</td>
            <td class="n2_nocolor @if($syussou[2]->SEX == 2) lady @endif">@if($ozz_info_array[2] == 2){{'欠場'}}@else{{$syussou[2]->SENSYU_NAME}}@endif</td>
            <td class="r3">3</td>
            <td class="n3_nocolor @if($syussou[3]->SEX == 2) lady @endif">@if($ozz_info_array[3] == 2){{'欠場'}}@else{{$syussou[3]->SENSYU_NAME}}@endif</td>
            </tr>
            <tr>
            <td class="r4">4</td>
            <td class="n4_nocolor @if($syussou[4]->SEX == 2) lady @endif">@if($ozz_info_array[4] == 2){{'欠場'}}@else{{$syussou[4]->SENSYU_NAME}}@endif</td>
            <td class="r5">5</td>
            <td class="n5_nocolor @if($syussou[5]->SEX == 2) lady @endif">@if($ozz_info_array[5] == 2){{'欠場'}}@else{{$syussou[5]->SENSYU_NAME}}@endif</td>
            <td class="r6">6</td>
            <td class="n6_nocolor @if($syussou[6]->SEX == 2) lady @endif">@if($ozz_info_array[6] == 2){{'欠場'}}@else{{$syussou[6]->SENSYU_NAME}}@endif</td>
            </table>
            <!--選手名-->

            <!--艇選択-->
            <div id="box_select">

            <ul class="set cf">
                @for($teiban = 1;$teiban<=6;$teiban++)

                    @if($ozz_info_array[$teiban] == 2) {{--欠場--}}
                        <li id="id_box{{$teiban}}" class="r{{$teiban}} no_select" >{{$teiban}}</li>
                    @else {{--出走--}}
                        @if($search_type == 2) {{--BOX検索--}}

                            @if($search_boxselect[$teiban] == 1)
                                <li id="id_box{{$teiban}}" class="r{{$teiban}} on" onclick="javascript:funcOdds_BoxSearch('{{$teiban}}');">{{$teiban}}</li>                                        
                            @else
                                <li id="id_box{{$teiban}}" class="r{{$teiban}}" onclick="javascript:funcOdds_BoxSearch('{{$teiban}}');">{{$teiban}}</li>
                            @endif

                        @else {{--BOX検索されていない--}}
                            <li id="id_box{{$teiban}}" class="r{{$teiban}}" onclick="javascript:funcOdds_BoxSearch('{{$teiban}}');">{{$teiban}}</li>
                        @endif
                    @endif
                    
                @endfor
            </ul>

            <form id="ozzBoxform" name="ozzBoxform" action="/asp/tsu/sp/kyogi/index.asp?jyo={{$jyo}}&racenum={{$race_num}}&type=2&page=13" method="post">
                @for($teiban = 1;$teiban<=6;$teiban++)
                    @if($search_type == 2) {{--BOX検索--}}
                        @if($search_boxselect[$teiban] == 1)
                            <Input type="hidden" name="boxselect{{$teiban}}" value="1">
                        @else
                            <Input type="hidden" name="boxselect{{$teiban}}" value="0">
                        @endif
                    @else {{--BOX検索されていない--}}
                        <Input type="hidden" name="boxselect{{$teiban}}" value="0">
                    @endif
                @endfor

                @csrf
            </form>
            <div class="search"><a href="javascript:funcOdds_BoxSearchExe();">検索</a></div>

            </div><!--/#box_select-->
            <!--艇選択-->


            {{--BOX検索結果↓--}}
            @if($search_type == 2)
                <!--結果-->

                <div id="box_kekka" class="cf">
                <?php
                    //選択されている数調査（3つと4つのみ） 
                    $intTempData = 0; 
                ?>

                @for($intLoopCount = 1; $intLoopCount <= 6; $intLoopCount++)
                    @if($search_boxselect[$intLoopCount] == "1")
                        <?php $intTempData = $intTempData + 1; ?>
                    @endif
                @endfor

                @if($intTempData == 3)
                    <table id="ta_box_kekka">

                    @for($intLoopCount = 1; $intLoopCount <= 6; $intLoopCount++)
                        
                        @if($search_boxselect[$intLoopCount] == "1")

                            <?php
                                $intTempMae = $intLoopCount;
                                $intTempViewMaeFlag = 0;
                            ?>

                            @for($intLoopCount2 = 1; $intLoopCount2 <= 6; $intLoopCount2++)

                                @if($search_boxselect[$intLoopCount2] == "1")

                                    <?php
                                        $intTempNaka = $intLoopCount2;
                                        $intTempViewNakaFlag = 0;
                                    ?>

                                    @for($intLoopCount3 = 1; $intLoopCount3 <= 6; $intLoopCount3++)

                                        @if($search_boxselect[$intLoopCount3] == "1")

                                            <?php $intTempAto = $intLoopCount3; ?>
                                        
                                            @if( $intTempMae != $intTempAto && $intTempMae != $intTempNaka && $intTempNaka != $intTempAto )
                                                {{--全て値が違う--}}

                                                <tr>
                                                @if($intTempViewMaeFlag == 0)
                                                    <td rowspan="2" class="r{{$intTempMae}}">{{$intTempMae}}</td>
                                                    <?php $intTempViewMaeFlag = 1; ?>
                                                @endif

                                                @if($intTempViewNakaFlag == 0)
                                                    <td rowspan="1" class="r{{$intTempNaka}}">{{$intTempNaka}}</td>
                                                    <?php $intTempViewNakaFlag = 1; ?>
                                                @endif

                                                <td class="r{{$intTempAto}}">{{$intTempAto}}</td>
                                                <td class="value class_{{$intTempMae}}-{{$intTempNaka}}-{{$intTempAto}}" ><a href="javascript:funcCalcToggle( '{{$intTempMae}}-{{$intTempNaka}}-{{$intTempAto}}' );">{{ $bairitu_3rentan[$intTempMae][$intTempNaka][$intTempAto] }}</a></td>
                                                </tr>
                                            @endif
                                        
                                        @endif

                                    @endfor

                                @endif

                            @endfor

                        @endif
                    
                    @endfor

                    </table>
                
                @elseif($intTempData == 4)
                    {{--4艇選択--}}

                    {{--表示数カウント--}}
                    <?php $intTempData2 = 0; ?>
                    <table id="ta_box_kekka" class="left">
                    
                    @for($intLoopCount = 1; $intLoopCount <= 6; $intLoopCount++)

                        @if($search_boxselect[$intLoopCount] == "1")

                            <?php
                                $intTempMae = $intLoopCount;
                                $intTempViewMaeFlag = 0;
                            ?>

                            @for($intLoopCount2 = 1; $intLoopCount2 <= 6; $intLoopCount2++)

                                @if($search_boxselect[$intLoopCount2] == "1")
                                    <?php
                                        $intTempNaka = $intLoopCount2;
                                        $intTempViewNakaFlag = 0;
                                    ?>

                                    @for($intLoopCount3 = 1; $intLoopCount3 <= 6; $intLoopCount3++)
                                        
                                        @if($search_boxselect[$intLoopCount3] == "1")

                                            <?php
                                                $intTempAto = $intLoopCount3;
                                            ?>
                                            @if( $intTempMae != $intTempAto && $intTempMae != $intTempNaka && $intTempNaka != $intTempAto )
                                                {{--全て値が違う--}}

                                                @if($intTempData2 == 6 || $intTempData2 == 12 || $intTempData2 == 18)
                                                    {{--テーブル変える--}}
                                                    </table>

                                                    @if($intTempData2 == 12)
                                                        <table id="ta_box_kekka" class="left">
                                                    @else
                                                        <table id="ta_box_kekka" class="right">
                                                    @endif

                                                    <?php
                                                        //リセット
                                                        $intTempViewMaeFlag = 0;
                                                        $intTempViewNakaFlag = 0;
                                                    ?>
                                                @endif

                                                <tr>

                                                @if($intTempViewMaeFlag == 0)
                                                    <td rowspan="6" class="r{{$intTempMae}}">{{$intTempMae}}</td>
                                                    <?php $intTempViewMaeFlag = 1; ?>
                                                @endif

                                                @if($intTempViewNakaFlag == 0)
                                                    <td rowspan="2" class="r{{$intTempNaka}}">{{$intTempNaka}}</td>
                                                    <?php $intTempViewNakaFlag = 1; ?>
                                                @endif

                                                <td class="r{{$intTempAto}}">{{$intTempAto}}</td>
                                                <td class="value class_{{$intTempMae}}-{{$intTempNaka}}-{{$intTempAto}}"><a href="javascript:funcCalcToggle( '{{$intTempMae}}-{{$intTempNaka}}-{{$intTempAto}}' );">{{ $bairitu_3rentan[$intTempMae][$intTempNaka][$intTempAto] }}</a></td>
                                                </tr>

                                                <?php $intTempData2 = $intTempData2 + 1; ?>
                                            
                                            @endif

                                        @endif

                                    @endfor

                                @endif

                            @endfor

                        @endif

                    @endfor

                    </table>

                @endif

                </div>
                <!--結果-->
            
            @endif
            {{--BOX検索結果↑--}}

            </div><!-- data end -->
        @else
            <!---データ無し--->
            <table id="nodata">
                <tr>
                    <td>ただいまデータはございません</td>
                </tr>
            </table>
            
        @endif

    @endif    
@else
    {{--非開催--}}
    <div class="page_tit">検索</div>
    <!---データ無し--->
    <table id="nodata">
        <tr>
            <td>ただいまデータはございません</td>
        </tr>
    </table>
    
@endif