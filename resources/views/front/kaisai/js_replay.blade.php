function func_RepBackbtn(Yd)
{
    var strJsHTML = '';

    @foreach($kisai_2record as $kisai_2record_key=>$kisai_2record_row)
        <?php
            $tmp_date = $kisai_2record_row->開始日付;
            $end_date = $kisai_2record_row->終了日付;
            $kaisai_day_list = [];
            $last_data = "";
            while($tmp_date <= $end_date){
                $kaisai_day_list[] = $tmp_date;
                if(isset($vod_array[$tmp_date])){
                    $last_data = $tmp_date;
                }
                $tmp_date = date("Ymd",strtotime("+1 day",strtotime($tmp_date)));
            }
        ?>

        @foreach ( $kaisai_day_list as $kaisai_day_key => $kaisai_day)
            @if($kisai_2record_key == 0 && $kaisai_day_key == 0)
                if( Yd === '{{$kaisai_day}}'){
                    strJsHTML = strJsHTML + '前';
            @else
                <?php $yesterday = date('Ymd',strtotime('-1 day',strtotime($kaisai_day))) ?>
                @isset($vod_array[$yesterday])
                    }else if( Yd === '{{$kaisai_day}}'){
                        strJsHTML = strJsHTML + '<a href="javascript:parent.func_replaylink(\'/asp/tsu/kaisai/replay_movie.htm?movieid={{$yesterday}}0901\',\'/asp/kyogi/09/pc/replay_sub/replay_sub_{{$yesterday}}0901.htm\',\'/asp/kyogi/09/pc/replay_syusso/replay_syusso_{{$yesterday}}0901.htm\',0);">前</a>'
                @else
                    }else if( Yd === '{{$kaisai_day}}'){
                        strJsHTML = strJsHTML + '前'
                @endisset
            @endif
        @endforeach

    @endforeach
    }else{
        strJsHTML = strJsHTML + '前'
    }
    //書き出し
    document.write(strJsHTML);
}


function func_RepNextbtn(Yd)
{
    var strJsHTML = '';

    @foreach($kisai_2record as $kisai_2record_key=>$kisai_2record_row)
        <?php
            $tmp_date = $kisai_2record_row->開始日付;
            $end_date = $kisai_2record_row->終了日付;
            $kaisai_day_list = [];
            $last_data = "";
            while($tmp_date <= $end_date){
                $kaisai_day_list[] = $tmp_date;
                if(isset($vod_array[$tmp_date])){
                    $last_data = $tmp_date;
                }
                $tmp_date = date("Ymd",strtotime("+1 day",strtotime($tmp_date)));
            }
        ?>

        @foreach ( $kaisai_day_list as $kaisai_day_key => $kaisai_day)
        
            <?php $tomorrow = date('Ymd',strtotime('+1 day',strtotime($kaisai_day))) ?>
            @if($kisai_2record_key == 0 && $kaisai_day_key == 0)
                @isset($vod_array[$tomorrow])
                    if( Yd === '{{$kaisai_day}}'){
                        strJsHTML = strJsHTML + '<a href="javascript:parent.func_replaylink(\'/asp/tsu/kaisai/replay_movie.htm?movieid={{$tomorrow}}0901\',\'/asp/kyogi/09/pc/replay_sub/replay_sub_{{$tomorrow}}0901.htm\',\'/asp/kyogi/09/pc/replay_syusso/replay_syusso_{{$tomorrow}}0901.htm\',0);">次</a>'
                @else
                    if( Yd === '{{$kaisai_day}}'){
                        strJsHTML = strJsHTML + '次';
                @endisset
            @else
                @isset($vod_array[$tomorrow])
                    }else if( Yd === '{{$kaisai_day}}'){
                        strJsHTML = strJsHTML + '<a href="javascript:parent.func_replaylink(\'/asp/tsu/kaisai/replay_movie.htm?movieid={{$tomorrow}}0901\',\'/asp/kyogi/09/pc/replay_sub/replay_sub_{{$tomorrow}}0901.htm\',\'/asp/kyogi/09/pc/replay_syusso/replay_syusso_{{$tomorrow}}0901.htm\',0);">次</a>'
                @else
                    }else if( Yd === '{{$kaisai_day}}'){
                        strJsHTML = strJsHTML + '次';
                @endisset
            @endif
        @endforeach

    @endforeach
    }else{
        strJsHTML = strJsHTML + '次'
    }
    //書き出し
    document.write(strJsHTML);
}


function func_RepLink(Yd)
{
    var strJsHTML = '';

    @foreach($kisai_2record as $kisai_2record_key=>$kisai_2record_row)
        <?php
            $tmp_date = $kisai_2record_row->開始日付;
            $end_date = $kisai_2record_row->終了日付;
            $kaisai_day_list = [];
            $last_data = "";
            while($tmp_date <= $end_date){
                $kaisai_day_list[] = $tmp_date;
                if(isset($vod_array[$tmp_date])){
                    $last_data = $tmp_date;
                }
                $tmp_date = date("Ymd",strtotime("+1 day",strtotime($tmp_date)));
            }
        ?>

        @foreach ( $kaisai_day_list as $kaisai_day_key => $kaisai_day)
            @if($kisai_2record_key == 0 AND $kaisai_day_key == 0)
                if( Yd === '{{$kaisai_day}}'){
            @else
                }else if( Yd === '{{$kaisai_day}}'){
            @endif
            @for($loop_race_num = 1;$loop_race_num <= 12 ; $loop_race_num++)
                @isset($vod_array[$kaisai_day][$kaisai_day.'09'.str_pad($loop_race_num, 2, '0', STR_PAD_LEFT)])
                    strJsHTML = strJsHTML + '<li class="rep_btn b{{$loop_race_num }}"><a href="javascript:parent.func_replaylink(\'/asp/tsu/kaisai/replay_movie.htm?movieid={{$kaisai_day}}09{{str_pad($loop_race_num, 2, '0', STR_PAD_LEFT)}}\',\'/asp/kyogi/09/pc/replay_sub/replay_sub_{{$kaisai_day}}09{{str_pad($loop_race_num, 2, '0', STR_PAD_LEFT)}}.htm\',\'/asp/kyogi/09/pc/replay_syusso/replay_syusso_{{$kaisai_day}}09{{str_pad($loop_race_num, 2, '0', STR_PAD_LEFT)}}.htm\',0);">{{$loop_race_num }}R</a></li>'
                @else
                    strJsHTML = strJsHTML + '<li class="rep_btn b{{$loop_race_num }}">{{$loop_race_num }}R</li>'
                @endisset
            @endfor

        @endforeach
    
    @endforeach

        }else{
        strJsHTML = strJsHTML + '<li class="rep_btn b1">1R</li>'
        strJsHTML = strJsHTML + '<li class="rep_btn b2">2R</li>'
        strJsHTML = strJsHTML + '<li class="rep_btn b3">3R</li>'
        strJsHTML = strJsHTML + '<li class="rep_btn b4">4R</li>'
        strJsHTML = strJsHTML + '<li class="rep_btn b5">5R</li>'
        strJsHTML = strJsHTML + '<li class="rep_btn b6">6R</li>'
        strJsHTML = strJsHTML + '<li class="rep_btn b7">7R</li>'
        strJsHTML = strJsHTML + '<li class="rep_btn b8">8R</li>'
        strJsHTML = strJsHTML + '<li class="rep_btn b9">9R</li>'
        strJsHTML = strJsHTML + '<li class="rep_btn b10">10R</li>'
        strJsHTML = strJsHTML + '<li class="rep_btn b11">11R</li>'
        strJsHTML = strJsHTML + '<li class="rep_btn b12">12R</li>'
    }
    //書き出し
    document.write(strJsHTML);
}


