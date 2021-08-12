@extends('layouts.admin_layout')

@section('title', '津 メールマガジンCMS')

@inject('general', 'App\Services\GeneralService')

@section('css')
    <style>
        
        .tv_block{
            background-color:#aaa;
        }
        
        .close_block{
            background-color:#888;
        }
        
        .appear_true{
            color: #fff;
        }
/*
        td.close_block:hover,
        td.day_block:hover{
            background-color:#ccc;
            cursor: pointer;
        }
*/
        .grade_0{ /*SG*/
            font-weight: bold;
            background-color:#DC1414;
        }
        .grade_1{ /*G1*/
            font-weight: bold;
            background-color:#FF9600;
        }
        .grade_2{ /*G2*/
            font-weight: bold;
            background-color:#9966CC;
        }
        .grade_3{ /*G3*/
            font-weight: bold;
            background-color:#00C694;
        }
        .grade_4{ /*一般*/
            font-weight: bold;
            background-color:#5096F0;
        }
        
        .grade_4.night{ /*一般 夜*/
            font-weight: bold;
            background-color:#6478DC;
        }
    </style>
@endsection

@section('content')
    <h1>津 メールマガジンCMS</h1>

    <div style="text-align: center;margin:20px auto 0;">
        <div style="display: inline-block;"><a href="?now_year_month={{ $prev_year_month }}">前月</a></div>
        <h2 style="display: inline-block; margin:0 20px;">{{$now_year}}年{{$now_month}}月</h2>
        <div style="display: inline-block;"><a href="?now_year_month={{ $next_year_month }}">次月</a></div>
    </div>
    <div style="margin:40px 0;">
        
        <table class="table" border="2" style="width: 100%;">{{-- カレンダー部分↓ --}}
            <tr>
                <th style="width:6%;"></th>
                @for($day = 1; $day <= $now_month_last_day; $day++)
                    <th style="width:3%; text-align:center;">
                        {{$day}}
                        <br>
                        @if(date('w',strtotime($now_year . $now_month . $day)) == 0)
                            <span style="color: #f33;">
                        @elseif(date('w',strtotime($now_year . $now_month . $day)) == 6)
                            <span style="color: #33f;">
                        @else
                            <span>
                        @endif
                        {{ $week_label[date('w',strtotime($now_year . $now_month . $day))] }}
                        </span>
                    </th>
                @endfor
            </tr>

            {{-- 本場部分↓ --}}
            <tr>
                <th style="background-color: #ccc;">本場</th>
                @foreach($honjyo_array as $day => $item)
                    @if($item['type'] == "head")
                        <td colspan="{{ $item['colspan'] }}" 
                        class="day_block grade_{{ $item['record']['GRADE'] }} @if($item['record']['APPEAR_FLG']) appear_true @endif" >
                            {{ $general->gradenumber_to_gradename_for_cms_calendar($item['record']['GRADE']) }}
                            @if($item['record']['RACE_TITLE'])
                                {{ $item['record']['RACE_TITLE'] }}
                            @elseif($item['record']['CALENDAR_RACE_TITLE'])
                                {{ $item['record']['CALENDAR_RACE_TITLE'] }}                                           
                            @else
                                {{ $general->jyocode_to_jyoname($item['record']['JYO']) }}
                            @endif
                            
                        </td>
                    @elseif($item['type'] == "blank")
                        <td class="day_block" >
                        </td>
                    
                    @elseif($item['type'] == "close")
                        <td colspan="{{ $item['colspan'] }}" 
                        rowspan="1" 
                        class="close_block @if($item['record']['APPEAR_FLG']) appear_true @endif" >
                            休館日
                        </td>
                    @endif
                @endforeach

            </tr>
            {{-- 本場部分↑ --}}

            <tr>
                <th style="background-color: #ccc;">メール</th>
                @for($day = 1; $day <= $now_month_last_day; $day++)
                    <td style="width:3%; text-align:center; padding:1px;">
                        @isset($mail_magazine_array[$day])
                            @foreach ($mail_magazine_array[$day] as $id => $item)
                                <div>
                                    <?php $position_array = [1=>0,2=>36,3=>72,4=>108]; ?>
                                    <a href="/admin/mail_magazine/edit/{{$item->TARGET_DATE}}/{{$id}}" style="display:block; width:36px; height:36px; background-image:url('/cms/CMS_Mail/images/icon_mail.png'); background-size:auto 59px;background-position-x:-{{$position_array[$item->SAVE_FLG]}}px;"></a>
                                    @if($item->TARGET_TIME)
                                        {{date('H:i' , strtotime($item->TARGET_DATE.$item->TARGET_TIME))}}                                        
                                    @else
                                        @if($item->SAVE_FLG == 3)
                                            {{date('H:i' , strtotime($item->UPDATE_TIME))}}
                                        @else
                                            --:--
                                        @endif
                                    @endif
                                </div>
                            @endforeach                            
                        @else
                            @if(in_array($day,$zenken))
                                <div>
                                    <a href="/admin/mail_magazine/create/{{date('Ymd',strtotime($now_year.'/'.$now_month.'/'.$day))}}" style="display:block; width:36px; height:36px; background-image:url('/cms/CMS_Mail/images/icon_mail.png'); background-size:auto 59px;background-position-x:0px;"></a>

                                        --:--

                                </div>
                            @endif
                        @endisset
                    </td>
                @endfor
            </tr>
            <tr>
                <th style="background-color: #ccc;">新規</th>
                @for($day = 1; $day <= $now_month_last_day; $day++)
                    <td>
                        <div style="font-weight: bold; text-align:center;">
                            <a href="/admin/mail_magazine/create/{{date('Ymd',strtotime($now_year.'/'.$now_month.'/'.$day))}}">＋</a>
                        </div>
                    </td>
                @endfor
            </tr>

        </table>{{-- カレンダー部分↑ --}}

    </div>
@endsection