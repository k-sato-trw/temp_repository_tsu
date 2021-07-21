    
    <div class="page_tit">結果一覧</div>
    <div id="kekka_race">
        @if($target_date == $kaisai_master->開始日付)
            初日 [ {{date('Ymd',strtotime($target_date))}} ] 
        @elseif($target_date == $kaisai_master->開始日付)
            最終日 [ {{date('Ymd',strtotime($target_date))}} ] 
        @else
            <span>{{$race_header->KAISAI_DAYS}}</span>日目 [ {{date('n/j',strtotime($target_date))}} ]
        @endif
    </div>
    
    
    <!---結果一覧--->
    <table id="ta_kekka_all">
    <tbody><tr>
    <th class="header1" rowspan="2">ﾚｰｽ</th>
    <th class="header2" colspan="2">3連単</th>
    <th class="header2" colspan="2">2連単</th>
    <th class="header1" rowspan="2">詳細</th>
    </tr>
    <tr>
      <th class="header3">組合せ</th>
      <th class="header3">払戻金</th>
      <th class="header3">組合せ</th>
    <th class="header3">払戻金</th>
    </tr>

    @for($loop_race_num=1;$loop_race_num<=12;$loop_race_num++)

        <tr>
            @if($target_date == $kekka_date)
                <td class="r_no"><a href="/asp/tsu/sp/kyogi/index.asp?jyo=09&racenum={{$loop_race_num}}&page=2">{{$loop_race_num}}R</a></td>                
            @else
                <td class="r_no">{{$loop_race_num}}R</td>
            @endif
            @if($chushi_flg && ( $stop_race_num == $loop_race_num || ($stop_race_num == 0 && $loop_race_num == 1) ))
                @if($stop_race_num == 0)
                    <td colspan="5" rowspan="12" class="cyushi">中止となりました</td>
                @else
                    <td colspan="5" rowspan="{{ 12 - $stop_race_num + 1 }}" class="cyushi">第{{$stop_race_num}}レース以降は中止となりました。</td>
                @endif
            @elseif($chushi_flg && $stop_race_num < $loop_race_num)

            @else
                @isset($kekka_info_today_all[$loop_race_num])
                    <?php $item = $kekka_info_today_all[$loop_race_num]; ?>
                    @if($item->SANRENTAN_MONEY1 && $item->SANRENTAN_MONEY2)
                        {{--同着あり--}}
                        <td colspan="4">同着あり</td>
                    @elseif(substr($item->FUSEIRITU,4,1) == 1)
                        {{--不成立--}}
                        <td colspan="4">不成立</td>
                    @else
                        {{--普通--}}
                        <td><img src="/sp/kyogi/images/num{{(int) substr($item->SANRENTAN1,0,1)}}.png" alt="{{(int) substr($item->SANRENTAN1,0,1)}}1"><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num{{(int) substr($item->SANRENTAN1,1,1)}}.png" alt="{{(int) substr($item->SANRENTAN1,1,1)}}"><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num{{(int) substr($item->SANRENTAN1,2,1)}}.png" alt="{{(int) substr($item->SANRENTAN1,2,1)}}"></td>
                        <td class="gray">{{number_format($item->SANRENTAN_MONEY1)}}円</td>
                        <td><img src="/sp/kyogi/images/num{{(int) substr($item->NIRENTAN1,0,1)}}.png" alt="{{(int) substr($item->NIRENTAN1,0,1)}}"><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num{{(int) substr($item->NIRENTAN1,1,1)}}.png" alt="{{(int) substr($item->NIRENTAN1,1,1)}}"></td>
                        <td class="gray">{{number_format($item->NIRENTAN_MONEY1)}}円</td>
                    @endif

                    @if($target_date == $kekka_date)
                        {{--結果表示日付が他ページと同じ日付表示時--}}
                        <td class="r_syousai"><a href="/asp/tsu/sp/kyogi/index.asp?jyo=09&racenum={{$loop_race_num}}&page=16"></a></td>
                    @else
                        {{--リプレイページに--}}
                        <td class="r_syousai"><a href="replay_race.asp?flag=2&Folder=1&jyo=09&yd={{$kakka_date}}&racenum={{$loop_race_num}}"></a></td>
                    @endif
                @else
                    <td>&ensp;</td>
                    <td class="gray">&ensp;</td>
                    <td>&ensp;</td>
                    <td class="gray">&ensp;</td>
                    <td class="r_syousai"></td>
                @endisset
            @endif
        </tr>
    @endfor
    
    </tbody></table>
    
    
    
    
    <div id="kekka_race_bt">
    <ul>
        @foreach ($other_date as $item)
            <li><a href="/asp/tsu/sp/kyogi/index.asp?jyo=09&racenum={{$race_num}}&kekkayd={{$kekka_date}}&page=15"><span>{{$item['display_date']}}</span> [ {{date('n/j',strtotime($item['date']))}} ] </a></li>
        @endforeach
    </ul>
    </div>
    
    