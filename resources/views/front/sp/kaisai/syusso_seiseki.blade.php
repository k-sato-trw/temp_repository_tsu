<div class="page_tit">今節成績@if($tomorrow_flg)（明日）@endif</div>
<table class="ta_shusso">
<tr>
<th rowspan="2" class="waku" scope="col">枠<br>番</th>
<th rowspan="2" scope="col">&ensp;</th>
<th colspan="16" class="motor" scope="col">今節成績</th>
</tr>
<tr>
    <th colspan="2" class="day" scope="col">初日</th>
    <th colspan="2" class="@if( ($kaisai_day_list[1] ?? "")==$kaisai_master->終了日付){{'finalday'}}@else{{'day'}}@endif" scope="col">{{ $kaisai_day_list_label[1] ?? "" }}</th>
    <th colspan="2" class="@if( ($kaisai_day_list[2] ?? "")==$kaisai_master->終了日付){{'finalday'}}@else{{'day'}}@endif" scope="col">{{ $kaisai_day_list_label[2] ?? "" }}</th>
    <th colspan="2" class="@if( ($kaisai_day_list[3] ?? "")==$kaisai_master->終了日付){{'finalday'}}@else{{'day'}}@endif" scope="col">{{ $kaisai_day_list_label[3] ?? "" }}</th>
    <th colspan="2" class="@if( ($kaisai_day_list[4] ?? "")==$kaisai_master->終了日付){{'finalday'}}@else{{'day'}}@endif" scope="col">{{ $kaisai_day_list_label[4] ?? "" }}</th>
    <th colspan="2" class="@if( ($kaisai_day_list[5] ?? "")==$kaisai_master->終了日付){{'finalday'}}@else{{'day'}}@endif" scope="col">{{ $kaisai_day_list_label[5] ?? "" }}</th>
    <th colspan="2" class="@if( ($kaisai_day_list[6] ?? "")==$kaisai_master->終了日付){{'finalday'}}@else{{'day'}}@endif" scope="col">{{ $kaisai_day_list_label[6] ?? "" }}</th>
    <th colspan="2" class="@if( ($kaisai_day_list[7] ?? "")==$kaisai_master->終了日付){{'finalday'}}@else{{'day'}}@endif" scope="col">{{ $kaisai_day_list_label[7] ?? "" }}</th>
</tr>


@foreach($syussou as $teiban => $item)
    @if($ozz_info_array[$teiban] != 2)
        <!-- ▼枠▼ -->
        <tr>
            <td rowspan="4" class="waku r{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
            <th class="result">R</th>
            @for($race_day_count=1;$race_day_count<=8;$race_day_count++)
                <?php $prop_name_1 = "KONSETU".$race_day_count."1_RACENUMBER" ?>
                <?php $prop_name_2 = "KONSETU".$race_day_count."2_RACENUMBER" ?>
                <td class="race">{{ $item->$prop_name_1 }}</td>
                <td class="race">{{ $item->$prop_name_2 }}</td>
            @endfor
        </tr>
        <tr>
            <th class="result">進</th>
            @for($race_day_count=1;$race_day_count<=8;$race_day_count++)
                <?php $prop_name_w1 = "KONSETU".$race_day_count."1_WAKUBAN" ?>
                <?php $prop_name_w2 = "KONSETU".$race_day_count."2_WAKUBAN" ?>
                <?php $prop_name_s1 = "KONSETU".$race_day_count."1_SHINNYU" ?>
                <?php $prop_name_s2 = "KONSETU".$race_day_count."2_SHINNYU" ?>
                <td class="shin @if($item->$prop_name_w1){{"r".$item->$prop_name_w1}}@endif">{{ $item->$prop_name_s1 }}</td>
                <td class="shin @if($item->$prop_name_w2){{"r".$item->$prop_name_w2}}@endif">{{ $item->$prop_name_s2 }}</td>
            @endfor
        </tr>
        <tr>
            <th class="result">ST</th>
            @for($race_day_count=1;$race_day_count<=8;$race_day_count++)
                <?php $prop_name_dt = "KONSETU".$race_day_count."1_DATE"; ?>
                <?php $prop_name_st = "KONSETU".$race_day_count."1_STTIMING"; ?>
                <?php $prop_name_rn = "KONSETU".$race_day_count."1_RACENUMBER"; ?>

                @if($item->$prop_name_st)
                    <td class="ST @if($st_ranking[$item->$prop_name_dt][$item->$prop_name_rn] == $item->$prop_name_st){{'st_top'}}@endif">{{ mb_substr($item->$prop_name_st,1) }}</td>
                @else
                    <td class="ST"></td>
                @endif

                <?php $prop_name_dt = "KONSETU".$race_day_count."2_DATE"; ?>
                <?php $prop_name_st = "KONSETU".$race_day_count."2_STTIMING"; ?>
                <?php $prop_name_rn = "KONSETU".$race_day_count."2_RACENUMBER"; ?>

                @if($item->$prop_name_st)
                    <td class="ST @if($st_ranking[$item->$prop_name_dt][$item->$prop_name_rn] == $item->$prop_name_st){{'st_top'}}@endif">{{ mb_substr($item->$prop_name_st,1) }}</td>
                @else
                    <td class="ST"></td>
                @endif

            @endfor
        </tr>
        <tr>
            <th class="result_b">着</th>
            @for($race_day_count=1;$race_day_count<=8;$race_day_count++)
                <?php $prop_name = "KONSETU".$race_day_count."1_TYAKUJUN"; ?>
                @if($item->$prop_name)
                    <td class="rank">{{ $item->$prop_name }}</td>                  
                @else
                    <td class="rank_no"></td>    
                @endif

                <?php $prop_name = "KONSETU".$race_day_count."2_TYAKUJUN"; ?>
                @if($item->$prop_name)
                    <td class="rank">{{ $item->$prop_name }}</td>                  
                @else
                    <td class="rank_no"></td>    
                @endif
            @endfor
        </tr>
    @else {{--欠場--}}

        <!-- ▼枠▼ -->
        <tr>
            <td rowspan="4" class="waku r{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
            <th class="result">R</th>
            <td class="race">&ensp;</td>
            <td class="race">&ensp;</td>
            <td class="race">&ensp;</td>
            <td class="race">&ensp;</td>
            <td class="race">&ensp;</td>
            <td class="race">&ensp;</td>
            <td class="race">&ensp;</td>
            <td class="race">&ensp;</td>
            <td class="race">&ensp;</td>
            <td class="race">&ensp;</td>
            <td class="race">&ensp;</td>
            <td class="race">&ensp;</td>
            <td class="race">&ensp;</td>
            <td class="race">&ensp;</td>
            <td class="race">&ensp;</td>
            <td class="race">&ensp;</td>
        </tr>
        <tr>
            <th class="result">進</th>
            <td class="shin">&ensp;</td>
            <td class="shin">&ensp;</td>
            <td class="shin">&ensp;</td>
            <td class="shin">&ensp;</td>
            <td class="shin">&ensp;</td>
            <td class="shin">&ensp;</td>
            <td class="shin">&ensp;</td>
            <td class="shin">&ensp;</td>
            <td class="shin">&ensp;</td>
            <td class="shin">&ensp;</td>
            <td class="shin">&ensp;</td>
            <td class="shin">&ensp;</td>
            <td class="shin">&ensp;</td>
            <td class="shin">&ensp;</td>
            <td class="shin">&ensp;</td>
            <td class="shin">&ensp;</td>
        </tr>
        <tr>
            <th class="result">ST</th>
            <td class="ST">&ensp;</td>
            <td class="ST">&ensp;</td>
            <td class="ST">&ensp;</td>
            <td class="ST">&ensp;</td>
            <td class="ST">&ensp;</td>
            <td class="ST">&ensp;</td>
            <td class="ST">&ensp;</td>
            <td class="ST">&ensp;</td>
            <td class="ST">&ensp;</td>
            <td class="ST">&ensp;</td>
            <td class="ST">&ensp;</td>
            <td class="ST">&ensp;</td>
            <td class="ST">&ensp;</td>
            <td class="ST">&ensp;</td>
            <td class="ST">&ensp;</td>
            <td class="ST">&ensp;</td>
        </tr>
        <tr>
            <th class="result_b">着</th>
            <td class="rank_no">&ensp;</td>
            <td class="rank_no">&ensp;</td>
            <td class="rank_no">&ensp;</td>
            <td class="rank_no">&ensp;</td>
            <td class="rank_no">&ensp;</td>
            <td class="rank_no">&ensp;</td>
            <td class="rank_no">&ensp;</td>
            <td class="rank_no">&ensp;</td>
            <td class="rank_no">&ensp;</td>
            <td class="rank_no">&ensp;</td>
            <td class="rank_no">&ensp;</td>
            <td class="rank_no">&ensp;</td>
            <td class="rank_no">&ensp;</td>
            <td class="rank_no">&ensp;</td>
            <td class="rank_no">&ensp;</td>
            <td class="rank_no">&ensp;</td>
        </tr>

    @endif
@endforeach

</table>
