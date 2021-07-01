@extends('layouts.admin_layout')

@section('title', '津 イベントファンマスタ登録ページ')

@inject('general', 'App\Services\GeneralService')

@section('content')
    <h1>津 イベントファンマスタ登録ページ</h1>
    <h2>カレンダーID:{{ $id }}</h2>
    <div style="margin:40px 0;">
        <!--div style="margin:20px 0;">
            <a href='/admin/event_fan_master/preview' target="_blank">PC 一覧プレビュー</a>　|　
            <a href='/admin/event_fan_master/preview_top' target="_blank">PC TOPプレビュー</a>　|　
            <a href='/admin/event_fan_master/preview_sp' target="_blank">SP 一覧プレビュー</a>
        </div-->
        
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/event_fan_master/create/{{$id}}'">イベントファンマスタ新規作成</button>

        <table class="table table-hover">
            <thead>
                <tr >
                    <th colspan="2" class="table-dark">イベントファンマスタ</th>
                    <th rowspan="2" class="table-active">イベントファン</th>
                </tr>
                <tr >
                    <th class="table-dark">表示期間</th>
                    <th class="table-dark">編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach($event_fan_master as $item)
                    <tr>
                        <td>
                            @if($item->START_DATE)
                            {{ date("Y/m/d",strtotime($item->START_DATE)) }} 
                            {{ date("H:i",strtotime($item->START_DATE)) }}
                            @endif
                            <br>～<br>
                            @if($item->END_DATE)
                            {{ date("Y/m/d",strtotime($item->END_DATE)) }} 
                            {{ date("H:i",strtotime($item->END_DATE)) }}
                            @endif
                        </td>
                        <td>
                            <a href="/admin/event_fan_master/edit/{{$item->ID}}/{{$item->SUB_ID}}">編集</a>
                            <br>
                            <a href="javascript:void(0);" onClick="if(confirm('選択したレコードを削除します。よろしいですか?')){location.href='/admin/event_fan_master/delete/{{$item->ID}}/{{$item->SUB_ID}}'}">削除</a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="location.href='/admin/event_fan_master/create_event_fan/{{$id}}/{{$item->SUB_ID}}'">イベントファン新規作成</button>
                            <table class="table table-hover">
                                <thead>
                                    <tr class="table-active">
                                        <th>種別</th>
                                        <th>タイトル</th>
                                        <th >本文</th>
                                        <th>画像</th>
                                        <th>表示順</th>
                                        <th>掲載中</th>
                                        <th>登録者</th>
                                        <th>編集</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($event_fan_array[$item->SUB_ID] as $event_fan)
                                        <tr>
                                            <td>
                                                @if($event_fan->TYPE)
                                                    イベント
                                                @else
                                                    ファンサービス
                                                @endif
                                            </td>
                                            <td>{{ $event_fan->TITLE }}</td>
                                            <td style="width: 300px;">
                                                <div style="width: 300px;height:60px;overflow-y:scroll;">
                                                    {!! nl2br($event_fan->TEXT) !!}
                                                </div>
                                            </td>
                                            <td>
                                                @if($event_fan->IMAGE1)
                                                    <img src="{{ config('const.IMAGE_PATH.EVENT_FAN') . $event_fan->IMAGE1 }}"><br>
                                                @endif
                                                @if($event_fan->IMAGE2)
                                                    <img src="{{ config('const.IMAGE_PATH.EVENT_FAN') . $event_fan->IMAGE2 }}"><br>
                                                @endif
                                                @if($event_fan->IMAGE3)
                                                    <img src="{{ config('const.IMAGE_PATH.EVENT_FAN') . $event_fan->IMAGE3 }}">
                                                @endif
                                            </td>
                                            <td>{{ $event_fan->TURN }}</td>
                                            <td>
                                                @if($event_fan->APPEAR_FLG)
                                                    掲載
                                                @else
                                                    非掲載
                                                @endif
                                            </td>
                                            <td>{{ $event_fan->EDITOR_NAME }}</td>
                                            <td>
                                                <a href="/admin/event_fan_master/edit_event_fan/{{$event_fan->ID}}/{{$event_fan->SUB_ID}}/{{$event_fan->THIRD_ID}}">編集</a>
                                                <br>
                                                <a href="javascript:void(0);" onClick="if(confirm('選択したレコードを削除します。よろしいですか?')){location.href='/admin/event_fan_master/delete_event_fan/{{$event_fan->ID}}/{{$event_fan->SUB_ID}}/{{$event_fan->THIRD_ID}}'}">削除</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </tr>
        </table>
    </div>
    
@endsection