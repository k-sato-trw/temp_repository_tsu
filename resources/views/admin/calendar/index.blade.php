@extends('layouts.admin_layout')

@section('title', '津カレンダー登録ページ')

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

        td.close_block:hover,
        td.day_block:hover{
            background-color:#ccc;
            cursor: pointer;
        }
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
    <h1>津カレンダー登録ページ</h1>

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
                        class="day_block grade_{{ $item['record']['GRADE'] }} @if($item['record']['APPEAR_FLG']) appear_true @endif" 
                        onClick="location.href='/admin/calendar/edit/honjyo/{{ $item['record']['ID'] }}'">
                            {{ $general->gradenumber_to_gradename_for_cms_calendar($item['record']['GRADE']) }}
                            @if($item['record']['RACE_TITLE'])
                                {{ $item['record']['RACE_TITLE'] }}
                            @elseif($item['record']['CALENDAR_RACE_TITLE'])
                                {{ $item['record']['CALENDAR_RACE_TITLE'] }}                                           
                            @else
                                {{ $general->jyocode_to_jyoname($item['record']['JYO']) }}
                            @endif
                            {{--@if(in_array($item['record']['ID'],$event_master_id_list))
                                [E]
                            @endif--}}
                        </td>
                    @elseif($item['type'] == "blank")
                        <td 
                        class="day_block" 
                        onClick="location.href='/admin/calendar/create/honjyo/{{ $now_year . $now_month . str_pad($day, 2, '0', STR_PAD_LEFT) }}/1'">
                        </td>
                    
                    @elseif($item['type'] == "close")
                        <td colspan="{{ $item['colspan'] }}" 
                        rowspan="1" 
                        class="close_block @if($item['record']['APPEAR_FLG']) appear_true @endif" 
                        onClick="location.href='/admin/calendar/edit/close/{{ $item['record']['ID'] }}'">
                            休館日
                        </td>
                    @endif
                @endforeach

            </tr>
            {{-- 本場部分↑ --}}

            
            {{-- TV部分↓ --}}
            @foreach($tv_lines as $line_count => $tv_array)
                <tr>
                    @if($line_count == 1)
                        <th style="background-color: #ddd;" rowspan="1">有料中継</th>
                    @endif
                    @foreach($tv_array as $day => $item)
                        @if($item['type'] == "head" || $item['type'] == "copy")
                            <td {{--colspan="{{ $item['colspan'] }}"--}} 
                            class="day_block tv_block  @if($item['record']['APPEAR_FLG']) appear_true @endif" 
                            onClick="location.href='/admin/calendar/edit/tv/{{ $item['record']['ID'] }}'">
                                {{ $general->jyocode_to_tv_number_for_cms_calendar($item['record']['JYO']) }}
                            </td>
                        @elseif($item['type'] == "blank")
                            <td 
                            class="day_block" 
                            onClick="location.href='/admin/calendar/create/tv/{{ $now_year . $now_month . str_pad($day, 2, '0', STR_PAD_LEFT) }}/{{$line_count}}'">
                            </td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
            {{-- TV部分↑ --}}


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


            {{-- 本場内部分↓ --}}
            @foreach($honjyonai_lines as $line_count => $jyogai_array)
                <tr>
                    @if($line_count == 1)
                        <th style="background-color: #ccc;" rowspan="5">本場内</th>
                    @endif

                    @foreach($jyogai_array as $day => $item)
                        @if($item['type'] == "head")
                            <td colspan="{{ $item['colspan'] }}" 
                            class="day_block grade_{{ $item['record']['GRADE'] }} @if($item['record']['APPEAR_FLG']) appear_true @endif" 
                            onClick="location.href='/admin/calendar/edit/honjyonai/{{ $item['record']['ID'] }}'">

                                {{ $general->gradenumber_to_gradename_for_cms_calendar($item['record']['GRADE']) }}
                                @if($item['record']['RACE_TITLE'])
                                    {{ $general->jyocode_to_jyoname($item['record']['JYO']) }}{{ $item['record']['RACE_TITLE'] }}
                                @elseif($item['record']['CALENDAR_RACE_TITLE'])
                                    {{ $item['record']['CALENDAR_RACE_TITLE'] }}                                           
                                @else
                                    {{ $general->jyocode_to_jyoname($item['record']['JYO']) }}
                                @endif
                                @if($item['record']['LADY_FLG'])
                                    <img src="/01cal/images/mark_2.png">
                                @endif
                            </td>
                        @elseif($item['type'] == "blank")
                            <td 
                            class="day_block" 
                            onClick="location.href='/admin/calendar/create/honjyonai/{{ $now_year . $now_month . str_pad($day, 2, '0', STR_PAD_LEFT) }}/{{$line_count}}'">
                            </td>
                        
                        @elseif($item['type'] == "close")
                            <td colspan="{{ $item['colspan'] }}" 
                            rowspan="5" 
                            class="close_block @if($item['record']['APPEAR_FLG']) appear_true @endif" 
                            onClick="location.href='/admin/calendar/edit/close/{{ $item['record']['ID'] }}'">
                                休館日
                            </td>
                        @endif
                    @endforeach

                </tr>
            @endforeach
            {{-- 本場内部分↑ --}}


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


            {{-- 外向け部分↓ --}}
            @foreach($sotomuke_lines as $line_count => $gekijyo_array)
               <tr>
                    @if($line_count == 1)
                        <th style="background-color: #ccc;" rowspan="11">津インクル<br>[外向発売所]</th>
                    @endif

                   @foreach($gekijyo_array as $day => $item)
                        @if($item['type'] == "head")
                            <td colspan="{{ $item['colspan'] }}" 
                            class="day_block grade_{{ $item['record']['GRADE'] }} @if($item['record']['APPEAR_FLG']) appear_true @endif" 
                            onClick="location.href='/admin/calendar/edit/sotomuke/{{ $item['record']['ID'] }}'">
                                
                                {{ $general->gradenumber_to_gradename_for_cms_calendar($item['record']['GRADE']) }}
                                @if($item['record']['RACE_TITLE'])
                                    {{ $general->jyocode_to_jyoname($item['record']['JYO']) }}{{ $item['record']['RACE_TITLE'] }}
                                @elseif($item['record']['CALENDAR_RACE_TITLE'])
                                    {{ $item['record']['CALENDAR_RACE_TITLE'] }}                                           
                                @else
                                    {{ $general->jyocode_to_jyoname($item['record']['JYO']) }}
                                @endif

                                @if($item['record']['LADY_FLG'])
                                    <img src="/01cal/images/mark_2.png">
                                @endif
                                @if($item['record']['RACE_TYPE'] == 1)
                                    <img src="/01cal/images/mark_1.png">
                                @elseif($item['record']['RACE_TYPE'] == 2)
                                    <img src="/01cal/images/mark_3.png">
                                @endif
                            </td>
                        @elseif($item['type'] == "blank")
                            <td 
                            class="day_block" 
                            onClick="location.href='/admin/calendar/create/sotomuke/{{ $now_year . $now_month . str_pad($day, 2, '0', STR_PAD_LEFT) }}/{{$line_count}}'">
                            </td>
                        
                        @elseif($item['type'] == "close")
                            <td colspan="{{ $item['colspan'] }}" 
                            rowspan="11" 
                            class="close_block @if($item['record']['APPEAR_FLG']) appear_true @endif" 
                            onClick="location.href='/admin/calendar/edit/close/{{ $item['record']['ID'] }}'">
                                休館日
                            </td>
                        @endif
                   @endforeach

               </tr>
           @endforeach
           {{-- 劇場日中部分↑ --}}

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

            {{-- イベントファン部分↓ --}}
            @foreach($event_fan_lines as $line_count => $event_fan_array)
                <tr>
                    @if($line_count == 1)
                        <th style="background-color: #ccc;" rowspan="">イベント<br>ファン</th>
                    @endif
                    @foreach($event_fan_array as $day => $item)
                        @if($item['type'] == "head")
                            <td colspan="{{ $item['colspan'] }}" 
                            class="day_block tv_block @if($item['record']['APPEAR_FLG']) appear_true @endif" 
                            onClick="location.href='/admin/calendar/edit/event_fan/{{ $item['record']['ID'] }}'">
                                {{ $general->jyocode_to_jyoname($item['record']['JYO']) }}
                            </td>
                        @elseif($item['type'] == "blank")
                            <td 
                            class="day_block" 
                            onClick="location.href='/admin/calendar/create/event_fan/{{ $now_year . $now_month . str_pad($day, 2, '0', STR_PAD_LEFT) }}/{{$line_count}}'">
                            </td>
                        @endif
                    @endforeach

                </tr>
            @endforeach
            {{-- イベントファン部分↑ --}}




        </table>{{-- カレンダー部分↑ --}}

        <div>
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/calendar/create/close/{{ $now_date }}/1'">休館日新規作成</button>
        </div>
        <div style="float:left; width:48%; margin:20px 1% 10px 0;">
            <div class="card bg-secondary mb-3" >
                <div class="card-header">月単位の掲載フラグ変更</div>
                <div class="card-body">
                    <form method="POST" action="/admin/calendar/change_appear_flg">
                        <div style="margin-bottom: 20px">
                            <div style="margin-bottom: 10px">
                                対象年月
                                <input type="text" class="form-control " readonly name="target_year_month" value="{{ date("Ym",strtotime($now_date)) }}">
                            </div>
                            <div style="margin-bottom: 10px">
                                場
                                {{ \Form::select('type', [0 => "すべて",1=>"本場",2=>"TV",3=>"本場内",4=>"外向",5=>"イベント"] , '' , ["class" => "form-control"]) }}
                            </div>
                            <div style="margin-bottom: 10px">
                                <button type="submit" class="btn btn-primary" name="APPEAR_FLG" value="0" >非公開</button>
                                <button type="submit" class="btn btn-primary" name="APPEAR_FLG" value="1" >公　開</button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
            <!--div class="card bg-secondary mb-3"  >
                <div class="card-header">プレビュー</div>
                <div class="card-body">
                    <a href='/admin/calendar/preview?target_date={{$now_date}}' target="_blank">PCプレビュー</a>　|　
                    <a href='/admin/calendar/preview_middle?target_date={{$now_date}}' target="_blank">PC中プレビュー</a>　|　
                    <a href='/admin/calendar/preview_sp?yd={{$now_date}}' target="_blank">SPプレビュー</a>      
                </div>
            </div-->
        </div>
        <div class="card bg-secondary mb-3"  style="width: 48%; margin:20px 1% 10px 0; float:left;" >
            <div class="card-header">月コメント</div>
            <div class="card-body">
                <form method="POST" action="/admin/calendar/upsert_month_info" enctype="multipart/form-data">
                    <div style="margin-bottom: 20px">
                        <div style="margin-bottom: 10px">
                            対象年月
                            <input type="text" class="form-control " readonly name="TARGET_MONTH" value="{{ date("Ym",strtotime($now_date)) }}">
                        </div>

                        <div class="card bg-secondary mb-3" >
                            <div class="card-header">PDF</div>
                            <div class="card-body">
                                <div style="margin-bottom: 10px;">
                                    @if($month_info->PDF_FILE ?? false)
                                        <a href="{{ config('const.IMAGE_PATH.MONTH_INFO').$month_info->PDF_FILE }}">{{ $month_info->PDF_FILE }}</a>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="id_delete_PDF_FILE" name="delete_PDF_FILE" value="1" >
                                            <label class="custom-control-label" for="id_delete_PDF_FILE">画像を削除する</label>
                                        </div>
                                    @endif
                                </div>
                                <input type="file" class="form-control-file" name="PDF_FILE" >
                                <div class="custom-control custom-checkbox" style="margin-top: 20px;">
                                    <input type="checkbox" class="custom-control-input" id="id_PDF_FLAG" name="PDF_FLAG" value="1" @if(old('PDF_FLAG', $month_info->PDF_FLAG ?? false)) checked @endif >
                                    <label class="custom-control-label" for="id_PDF_FLAG">掲載フラグ</label>
                                </div>
                            </div>
                        </div>            
            
                        <div style="margin-bottom: 10px">
                            注釈テキスト<textarea class="form-control" name="CAL_TEXT" rows="2" >{{ $month_info->CAL_TEXT ?? "" }}</textarea>
                        </div>
                        <div style="margin-bottom: 10px">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="id_CAL_TEXT_FLG" name="CAL_TEXT_FLG" value="1" @if($month_info->CAL_TEXT_FLG ?? false) checked @endif >
                                <label class="custom-control-label" for="id_CAL_TEXT_FLG">掲載フラグ</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" >更新</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection