function func_Backbtn(Yd,PageName)
{
    var strHTML = '';

    PageName = 'syusso01';
@if($kaisai_master)
    @foreach ($kaisai_date_list as $key => $item)
        @if($key == 0)
            if( Yd === '{{$item}}'){
                strHTML = strHTML + '前日'
        @else
            }else if( Yd === '{{$item}}'){
                strHTML = strHTML + '<a href="/asp/kyogi/09/pc/' + PageName + '/' + PageName + '01_{{ date("Ymd",strtotime('-1 day',strtotime($item))) }}.htm">前日</a>'    
        @endif
    @endforeach

    }else{
        strHTML = strHTML + '前日'
    }
@else
    strHTML = strHTML + '前日';
@endif
    //書き出し
    document.write(strHTML);
}


function func_Nextbtn(Yd,PageName)
{
    var strHTML = '';
    PageName = 'syusso01';
@if($kaisai_master)
    @foreach ($kaisai_date_list as $key => $item)
        @if($key == 0)
            if( Yd === '{{$item}}'){
        @else
            }else if( Yd === '{{$item}}'){
        @endif

        @if($item < $target_date)
            {{--現在表示日以前--}}

            @if($tomorrow_flg && $target_date == date("Ymd",strtotime('+1 day',strtotime($item))))
                {{--翌日フラグの時は18時30分以降にリンクアップ--}}
                @if($target_time >= 1815)
                    strHTML = strHTML + '<a href="/asp/kyogi/09/pc/' + PageName + '/' + PageName + '01_{{ date("Ymd",strtotime('+1 day',strtotime($item))) }}.htm">翌日</a>'
                @else
                    strHTML = strHTML + '翌日'
                @endif
            @else

                @if($tomorrow_flg && $target_time >= 1815 && date("Ymd",strtotime('+1 day',strtotime($item))) == date("Ymd"))
                    {{--翌日表示後は12R表示--}}
                    strHTML = strHTML + '<a href="/asp/kyogi/09/pc/' + PageName + '/' + PageName + '12_{{ date("Ymd",strtotime('+1 day',strtotime($item))) }}.htm">翌日</a>'
                @else

                    @if(date("Ymd",strtotime('+1 day',strtotime($item))) == date("Ymd"))
                        {{--当日出走表に遷移する時は直近レースに飛ばす必要有--}}
                        @if($neer_kekka_race_number == 12 || $neer_ozz_race_number == 0)
                            {{--直近レース結果が12レースの時 OR 直近オッズ番号が0の時--}}
                            strHTML = strHTML + '<a href="/asp/kyogi/09/pc/' + PageName + '/' + PageName + '12_{{ date("Ymd",strtotime('+1 day',strtotime($item))) }}.htm">翌日</a>'
                        @else
                            strHTML = strHTML + '<a href="/asp/kyogi/09/pc/' + PageName + '/' + PageName + '{{ str_pad($neer_ozz_race_number, 2, '0', STR_PAD_LEFT) }}_{{ date("Ymd",strtotime('+1 day',strtotime($item))) }}.htm">翌日</a>'
                        @endif
                    @else
                        strHTML = strHTML + '<a href="/asp/kyogi/09/pc/' + PageName + '/' + PageName + '01_{{ date("Ymd",strtotime('+1 day',strtotime($item))) }}.htm">翌日</a>'
                    @endif
                    
                @endif
                
            @endif
        
            
        @else
            strHTML = strHTML + '翌日'
        @endif


    @endforeach

    }else{
        strHTML = strHTML + '翌日'
    }
    
@else
    strHTML = strHTML + '翌日';
@endif
    //書き出し
    document.write(strHTML);
}


function func_RaceNumList(Yd,RaceNum,PageName)
{
    var strHTML = '';

    if( Yd === '{{$target_date}}'){

        @for($loop_count=1;$loop_count <= 12 ; $loop_count++)
            
            if(RaceNum == {{$loop_count}}){
                strHTML = strHTML + '<li id="r{{$loop_count}}" class="select">'
            }else{
            
            @if($kaisai_master)
                {{--開催の時--}}
                
                @if($neer_kekka_race_number_tfinfo >= $loop_count || $neer_kekka_race_number >= $loop_count)
                    {{--終了したレース番号は暗く--}}
                    strHTML = strHTML + '<li id="r{{$loop_count}}" class="non">'
                @else
                    {{--非選択--}}
                    strHTML = strHTML + '<li id="r{{$loop_count}}" >'
                @endif
            @else
                strHTML = strHTML + '<li id="r{{$loop_count}}" >'
            @endif
            
            }
            strHTML = strHTML + '<a href="/asp/kyogi/09/pc/' + PageName + '/' + PageName + '{{ str_pad($loop_count, 2, '0', STR_PAD_LEFT) }}_' + Yd + '.htm">{{$loop_count}}R</a></li>';

        @endfor

    }else{

        @for($loop_count=1;$loop_count <= 12 ; $loop_count++)

            if(RaceNum == {{$loop_count}}){
                strHTML = strHTML + '<li id="r{{$loop_count}}" class="select">'
            }else{
                if( Yd < '{{$target_date}}'){
                    strHTML = strHTML + '<li id="r{{$loop_count}}" class="non">'
                }else{
                    strHTML = strHTML + '<li id="r{{$loop_count}}">'
                }
                strHTML = strHTML + '<a href="/asp/kyogi/09/pc/' + PageName + '/' + PageName + '{{ str_pad($loop_count, 2, '0', STR_PAD_LEFT) }}_' + Yd + '.htm">{{$loop_count}}R</a></li>';
            }
        
        @endfor

    }
    //書き出し
    document.write(strHTML);
}


function func_MotorRank(Yd,MotorNo)
{
    var strHTML = '';

    @foreach ($kaisai_date_list as $key => $item)
        @if($key == 0)
            if( Yd === '{{$item}}'){
        @else
            }else if( Yd === '{{$item}}'){
        @endif
        if( MotorNo === '{{ (int)$motor_ranking[0]->MOTOR_NO }}' ){
            strHTML = strHTML + "<span class='mt_ic01'>" + MotorNo + "</span>";
        }else if( MotorNo === '{{ (int)$motor_ranking[1]->MOTOR_NO }}' ){
            strHTML = strHTML + "<span class='mt_ic02'>" + MotorNo + "</span>";
        }else if( MotorNo === '{{ (int)$motor_ranking[2]->MOTOR_NO }}' ){
            strHTML = strHTML + "<span class='mt_ic03'>" + MotorNo + "</span>";
        }else if( MotorNo === '{{ (int)$motor_ranking[3]->MOTOR_NO }}' ){
            strHTML = strHTML + MotorNo;
        }else{
            strHTML = strHTML + MotorNo;
        }
    @endforeach

    }else if( Yd === '99999999'){
        if( MotorNo === '{{ (int)$motor_ranking[0]->MOTOR_NO }}' ){
            strHTML = strHTML + "<span class='mt_ic01'>" + MotorNo + "</span>";
        }else if( MotorNo === '{{ (int)$motor_ranking[1]->MOTOR_NO }}' ){
            strHTML = strHTML + "<span class='mt_ic02'>" + MotorNo + "</span>";
        }else if( MotorNo === '{{ (int)$motor_ranking[2]->MOTOR_NO }}' ){
            strHTML = strHTML + "<span class='mt_ic03'>" + MotorNo + "</span>";
        }else if( MotorNo === '{{ (int)$motor_ranking[3]->MOTOR_NO }}' ){
            strHTML = strHTML + MotorNo;
        }else{
            strHTML = strHTML + MotorNo;
        }
    
    }else{
        strHTML = strHTML + MotorNo;
    }
    //書き出し
    document.write(strHTML);
}


function func_MotorRank2(Yd,MotorNo)
{
    var strHTML = '';
    @foreach ($kaisai_date_list as $key => $item)
        @if($key == 0)
            if( Yd === '{{$item}}'){
        @else
            }else if( Yd === '{{$item}}'){
        @endif
        if( MotorNo === '{{ (int)$motor_ranking[0]->MOTOR_NO }}' ){
            strHTML = strHTML + "<span class='mt_ic01'>" + MotorNo + "</span>";
        }else if( MotorNo === '{{ (int)$motor_ranking[1]->MOTOR_NO }}' ){
            strHTML = strHTML + "<span class='mt_ic02'>" + MotorNo + "</span>";
        }else if( MotorNo === '{{ (int)$motor_ranking[2]->MOTOR_NO }}' ){
            strHTML = strHTML + "<span class='mt_ic03'>" + MotorNo + "</span>";
        }else if( MotorNo === '{{ (int)$motor_ranking[3]->MOTOR_NO }}' ){
            strHTML = strHTML + MotorNo;
        }else{
            strHTML = strHTML + MotorNo;
        }
    @endforeach

    }else if( Yd === '99999999'){
        if( MotorNo === '{{ (int)$motor_ranking[0]->MOTOR_NO }}' ){
            strHTML = strHTML + "<span class='mt_ic01'>" + MotorNo + "</span>";
        }else if( MotorNo === '{{ (int)$motor_ranking[1]->MOTOR_NO }}' ){
            strHTML = strHTML + "<span class='mt_ic02'>" + MotorNo + "</span>";
        }else if( MotorNo === '{{ (int)$motor_ranking[2]->MOTOR_NO }}' ){
            strHTML = strHTML + "<span class='mt_ic03'>" + MotorNo + "</span>";
        }else if( MotorNo === '{{ (int)$motor_ranking[3]->MOTOR_NO }}' ){
            strHTML = strHTML + MotorNo;
        }else{
            strHTML = strHTML + MotorNo;
        }

    }else{
        strHTML = strHTML + MotorNo;
    }
    //返す
    return strHTML;
}
