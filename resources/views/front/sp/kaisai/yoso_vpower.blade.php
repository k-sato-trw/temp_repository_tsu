<div class="page_tit">V-POWER</div>
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
    <table class="ta_shusso yoso3">
        <tr>
            <th>枠<br>番</th>
            <th class="name">選手名<br>
            <span>登番 / 支部 / 年齢 / 級</span></th>
            <th>予想</th>
            <th class="mark">順位</th>
            <th class="mark">スコア</th>
        </tr>
        @foreach($syussou as $teiban => $item)
            <tr>
                <td rowspan="2" class="r{{$teiban}}">{{$teiban}}</td>
                <td class="bottom_no_border"><span class="name4">{{$item->SENSYU_NAME}}</span></td>
                <td rowspan="2">
                    @if($yoso_syussou_array[$teiban]->YOSO_MARK)
                        <?php $ex_num = [1=>4,2=>3,3=>2,4=>1,]; ?>
                        <img src="/sp/kyogi/images/vp_yoso{{ $ex_num[$yoso_syussou_array[$teiban]->YOSO_MARK] }}.png">
                    @endif
                </td>
                <td rowspan="2" class="mark">
                    @if($lank_array[$teiban] < 4)
                        <img src="/sp/kyogi/images/vp_{{$lank_array[$teiban]}}.png" >              
                    @else
                        {{$lank_array[$teiban]}}
                    @endif
                </td>
                <td rowspan="2" class="mark">{{$yoso_syussou_array[$teiban]->PERCENT}}</td>
                </tr>
                <tr>
                <td class="number top_no_border">{{$item->TOUBAN}} / {{ $item->HOME_TOWN}} / {{ $item->AGE}} / {{ $item->KYU_BETU}}</td>
            </tr>
        @endforeach
    </table>
@endif




<div class="data yoso3" id="yoso">

<h3>フォーカス</h3>

<h4 class="ana">2連単</h4>
<div class="focus2 cf">
  
    @foreach($yoso_race_nirentan as $item)    
        <table class="ta_kumi">
            <tr>
                <td class="kumi"><img src="/sp/kyogi/images/num{{$item[0]}}.png"></td>
                <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
                <td class="kumi"><img src="/sp/kyogi/images/num{{$item[1]}}.png"></td>
            </tr>
            <tr>
                <td colspan="3" class="ozz">
                    @isset($bairitu_2rentan[$item[0]][$item[1]])
                        {{$bairitu_2rentan[$item[0]][$item[1]]}}
                    @endisset
                </td>
            </tr>
        </table>
    @endforeach

</div><!--/focus-->
<h4 class="honmei">3連単</h4>
<div class="focus3 cf">
    @foreach($yoso_race_sanrentan as $item)
        <table class="ta_kumi">
            <tr>
                <td class="kumi"><img src="/sp/kyogi/images/num{{$item[0]}}.png"></td>
                <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
                <td class="kumi"><img src="/sp/kyogi/images/num{{$item[1]}}.png"></td>
                <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
                <td class="kumi"><img src="/sp/kyogi/images/num{{$item[2]}}.png"></td>
            </tr>
            <tr>
                <td colspan="5" class="ozz">
                    @isset($bairitu_2rentan[$item[0]][$item[1]][$item[2]])
                        {{$bairitu_2rentan[$item[0]][$item[1]][$item[2]] }}
                    @endisset
                </td>
            </tr>
        </table>
    @endforeach
</div>
<!--/focus-->
<div class="caution_bottom">※オッズはページアクセス時点のものです。<br>
  　確定オッズではありません。</div>

@if($kekka_info->NIRENTAN1 || $kekka_info->SANRENTAN1)
    <h3 class="kekka">レース結果</h3>

    @if($kekka_info->NIRENTAN1)
        @if(strpos($kekka_info->NIRENTAN1,"M5") !== false)
            {{--2連単不成立--}}
            <!--不成立-->
            <div class="fuseiritsu">不成立</div><!--/focus-->
        @elseif($kekka_info->NIRENTAN_MONEY1 == 70)
            {{--70円特払い--}}
             <!--2連単特払い-->
			<div class="fuseiritsu">2連単特払い</div><!--/focus-->
        @else

            <div class="kekka focus2 cf">
            <table class="ta_kumi space">
                <tr>
                <td class="kumi"><img src="/sp/kyogi/images/num{{ substr($kekka_info->NIRENTAN1,0,1) }}.png"></td>
                <td class="ta_kumi"><img src="/sp/kyogi/images/vp_focus.png"></td>
                <td class="kumi"><img src="/sp/kyogi/images/num{{ substr($kekka_info->NIRENTAN1,1,1) }}.png"></td>
                </tr>
            </table>
            {{number_format($kekka_info->NIRENTAN_MONEY1)}}<span>円</span>
            </div><!--/focus-->
        @endif

        @if($kekka_info->NIRENTAN2)
            {{--同着側のデータは不成立にはならないためそのまま表示--}}
            <div class="kekka focus2 cf">
            <table class="ta_kumi space">
                <tr>
                <td class="kumi"><img src="/sp/kyogi/images/num{{ substr($kekka_info->NIRENTAN2,0,1) }}.png"></td>
                <td class="ta_kumi"><img src="/sp/kyogi/images/vp_focus.png"></td>
                <td class="kumi"><img src="/sp/kyogi/images/num{{ substr($kekka_info->NIRENTAN2,1,1) }}.png"></td>
                </tr>
            </table>
            {{number_format($kekka_info->NIRENTAN_MONEY2)}}<span>円</span>
            </div><!--/focus-->
        @endif
    @endif

    @if($kekka_info->SANRENTAN1)
        @if(strpos($kekka_info->SANRENTAN1,"M5") !== false)
            {{--3連単不成立--}}
            @if(strpos($kekka_info->NIRENTAN1,"M5") !== false)
                {{--2連単も不成立の時はそもそも表示しない--}}
            @else
                <!--3連単不成立-->
                <div class="fuseiritsu">3連単不成立</div><!--/focus-->
            @endif
        
        @else
            <div class="kekka focus3 cf">
            <table class="ta_kumi">
                <tr>
                <td class="kumi"><img src="/sp/kyogi/images/num{{ substr($kekka_info->SANRENTAN1,0,1) }}.png"></td>
                <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
                <td class="kumi"><img src="/sp/kyogi/images/num{{ substr($kekka_info->SANRENTAN1,1,1) }}.png"></td>
                <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
                <td class="kumi"><img src="/sp/kyogi/images/num{{ substr($kekka_info->SANRENTAN1,2,1) }}.png"></td>
                </tr>
            </table>
            {{number_format($kekka_info->SANRENTAN_MONEY1)}}<span>円</span>
            </div><!--/focus-->
        @endif

        @if($kekka_info->SANRENTAN2)
            <div class="kekka focus3 cf">
            <table class="ta_kumi">
                <tr>
                <td class="kumi"><img src="/sp/kyogi/images/num{{ substr($kekka_info->SANRENTAN2,0,1) }}.png"></td>
                <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
                <td class="kumi"><img src="/sp/kyogi/images/num{{ substr($kekka_info->SANRENTAN2,1,1) }}.png"></td>
                <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
                <td class="kumi"><img src="/sp/kyogi/images/num{{ substr($kekka_info->SANRENTAN2,2,1) }}.png"></td>
                </tr>
            </table>
            {{number_format($kekka_info->SANRENTAN_MONEY2)}}<span>円</span>
            </div><!--/focus-->
        @endif
    @endif
@endif
<div class="caution_img">
	<img src="/sp/kyogi/images/vp_txt.png"></div>

</div><!-- data end -->
