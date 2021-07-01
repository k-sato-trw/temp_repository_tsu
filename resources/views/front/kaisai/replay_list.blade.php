
<div id="replay_list">
    <h3 id="today">TODAY'S RACE</h3>
    <div id="today_rep">
        <h4>{{$kaisai_master->開催名称}}</h4>
        <div class="list">
            <p>{{ date('n/j',strtotime($target_date)) }}
                <span>
                    @if($kaisai_master)
                        
                        @if($kaisai_master->開始日付 == $target_date)
                            初日
                        @elseif($kaisai_master->終了日付 == $target_date)
                            最終日                
                        @else
                            {{$race_header->KAISAI_DAYS}}日目
                        @endif
                        
                    @endif
                </span>
            </p>
            <ul>
                @for($loop_race_num = 1;$loop_race_num <= 12 ; $loop_race_num++)
                    @isset($vod_array[$target_date][$target_date.'09'.str_pad($loop_race_num, 2, '0', STR_PAD_LEFT)])
                        <li class="rep_btn b{{$loop_race_num}}"><a href="javascript:parent.func_replaylink('/asp/tsu/kaisai/replay_movie.htm?movieid={{$target_date}}09{{str_pad($loop_race_num, 2, '0', STR_PAD_LEFT)}}','/asp/kyogi/09/pc/replay_sub/replay_sub_{{$target_date}}09{{str_pad($loop_race_num, 2, '0', STR_PAD_LEFT)}}.htm','/asp/kyogi/09/pc/replay_syusso/replay_syusso_{{$target_date}}09{{str_pad($loop_race_num, 2, '0', STR_PAD_LEFT)}}.htm',1);">{{$loop_race_num}}R</a></li>
                    @else
                        <li class="rep_btn b{{$loop_race_num}}">{{$loop_race_num}}R</li>
                    @endisset
                @endfor
                <div class="clear"></div>
            </ul>                            
        </div><!--/list-->
    </div><!--/today_rep-->
    
    <dl>
        @foreach($kisai_2record as $kisai_2record_row)
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
            <dt>
                <table><tbody>
                <tr>
                    <td class="date"><span>{{date('n/j',strtotime($kisai_2record_row->開始日付))}}～{{date('n/j',strtotime($kisai_2record_row->終了日付))}}</span></td>
                    <td class="name">{{$kisai_2record_row->開催名称}}</td>
                </tr>
                </tbody></table>
            </dt>
            <dd class="tab_set">
                <ul class="race_day @if(count($kaisai_day_list) > 6) day8 @else day6 @endif">
                    @foreach ( $kaisai_day_list as $kaisai_day_key => $kaisai_day)
                        @isset($vod_array[$kaisai_day])
                            <li><a href="#tab{{ $kaisai_day_key + 1 }}">{{date('n/j',strtotime($kaisai_day))}}</a></li>
                        @else
                            <li>{{date('n/j',strtotime($kaisai_day))}}</li>
                        @endisset
                    @endforeach
                    <div class="clear"></div>
                </ul>
                <div class="tab_box">
                    @foreach ( $kaisai_day_list as $kaisai_day_key => $kaisai_day)
                        <ul class="race_num select" id="tab{{$kaisai_day_key + 1}}">
                            @for($loop_race_num = 1;$loop_race_num <= 12 ; $loop_race_num++)
                                @isset($vod_array[$target_date][$target_date.'09'.str_pad($loop_race_num, 2, '0', STR_PAD_LEFT)])
                                    <li class="rep_btn b{{$loop_race_num }}"><a href="javascript:parent.func_replaylink('/asp/tsu/kaisai/replay_movie.htm?movieid={{$kaisai_day}}09{{str_pad($loop_race_num, 2, '0', STR_PAD_LEFT)}}','/asp/kyogi/09/pc/replay_sub/replay_sub_{{$kaisai_day}}09{{str_pad($loop_race_num, 2, '0', STR_PAD_LEFT)}}.htm','/asp/kyogi/09/pc/replay_syusso/replay_syusso_{{$kaisai_day}}09{{str_pad($loop_race_num, 2, '0', STR_PAD_LEFT)}}.htm',1);">{{$loop_race_num }}R</a></li>
                                @else
                                    <li class="rep_btn b{{$loop_race_num }}">{{$loop_race_num }}R</li>
                                @endisset
                            @endfor
                            <div class="clear"></div>
                        </ul> 
                    @endforeach
                </div>                          
            </dd>
        @endforeach
        
    </dl>

</div><!--/#replay_syusso-->
