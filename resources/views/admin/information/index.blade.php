@extends('layouts.admin_layout')

@section('title', '津 インフォメーション登録一覧ページ')

@inject('general', 'App\Services\GeneralService')

@section('content')
    <h1>津 インフォメーション登録一覧ページ</h1>
    <div style="margin:40px 0;">
        <!--div style="margin:20px 0;">
            <a href='/admin/information/preview' target="_blank">PC 一覧プレビュー</a>　|　
            <a href='/admin/information/preview_top' target="_blank">PC TOPプレビュー</a>　|　
            <a href='/admin/information/preview_sp' target="_blank">SP 一覧プレビュー</a>
        </div-->
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/information/create'">新規作成</button>
        
        <div style="float:right;">全{{ $information->total() }}件　現在{{ $information->currentPage() }}ページ/全{{ $information->lastPage() }}ページ</div>

        <table class="table table-hover">
            <thead>
                <tr class="table-active">
                    <th>ID</th>
                    <th>表示期間</th>
                    <th>表示日付</th>
                    <th>カテゴリ</th>
                    <th>表示デバイス</th>
                    <th>記事タイトル<br>本文</th>
                    <th>HOT NEWS</th>
                    <th>タイトル<br>リンク</th>
                    <th>画像</th>
                    <th>状態</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach($information as $item)
                    <tr>
                        <td>{{ $item->ID }}</td>
                        <td>
                            @if($item->START_DATE)
                            {{ date("Y/m/d",strtotime($item->START_DATE)) }}<br>
                            {{ date("H:i",strtotime($item->START_DATE)) }}
                            @endif
                            <br>～<br>
                            @if($item->END_DATE)
                            {{ date("Y/m/d",strtotime($item->END_DATE)) }}<br>
                            {{ date("H:i",strtotime($item->END_DATE)) }}
                            @endif
                        </td>
                        <td>
                            @if($item->VIEW_DATE)
                            {{ date("Y/m/d",strtotime($item->VIEW_DATE)) }}
                            @endif
                        </td>
                        <td>{{ $general->information_type_label($item->TYPE) }}</td>
                        <td>
                            <div>
                                @if($item->PC_APPEAR_FLG)
                                    <span style="color: red;">PC掲載</span>
                                @else
                                    PC非掲載
                                @endif
                            </div>
                            <div>
                                @if($item->SP_APPEAR_FLG)
                                    <span style="color: red;">SP掲載</span>
                                @else
                                    SP非掲載
                                @endif
                            </div>
                            <div>
                                @if($item->MB_APPEAR_FLG)
                                    <span style="color: red;">ケータイ掲載</span>
                                @else
                                    ケータイ非掲載
                                @endif
                            </div>
                        </td>
                        <td style="width: 200px;">
                            <div style="word-break: break-all; background-color:#Fee;"><strong>{{$item->TITLE}}</strong></div>
                            <div style="width: 200px;height:100px;overflow-y:scroll;">
                                {!! nl2br($item->TEXT) !!}
                            </div>
                        </td>
                        <td>
                            @if($item->HEADLINE_FLG)
                                {{$item->HEADLINE_TITLE}}
                            @else
                                非掲載
                            @endif
                        </td>
                        <td>
                            <div style="word-break: break-all;">
                                @if($item->PC_LINK)
                                    @if($item->PC_LINK_WINDOW_FLG)
                                        <div>[PC/別画面]</div>
                                    @else
                                        <div>[PC/同画面]</div>
                                    @endif
                                    {{$item->PC_LINK}}                     
                                @else
                                    ---
                                @endif
                            </div>
                            <div style="word-break: break-all;">
                                @if($item->SP_LINK)
                                    @if($item->SP_LINK_WINDOW_FLG)
                                        <div>[SP/別画面]</div>
                                    @else
                                        <div>[SP/同画面]</div>
                                    @endif
                                    {{$item->SP_LINK}}                     
                                @else
                                    ---
                                @endif
                            </div>
                            <div style="word-break: break-all;">
                                @if($item->MB_LINK)
                                    @if($item->MB_LINK_WINDOW_FLG)
                                        <div>[MB/別画面]</div>
                                    @else
                                        <div>[MB/同画面]</div>
                                    @endif
                                    {{$item->MB_LINK}}                     
                                @else
                                    ---
                                @endif
                            </div>
                        </td>
                        <td>
                            @if($item->IMAGE_1)
                                <div style="margin-bottom: 5px;">
                                    <img width="100" src="{{ config('const.IMAGE_PATH.INFORMATION'). $item->IMAGE_1 }}">
                                </div>
                            @endif
                            @if($item->IMAGE_2)
                                <div style="margin-bottom: 5px;">
                                    <img width="100" src="{{ config('const.IMAGE_PATH.INFORMATION'). $item->IMAGE_2 }}">
                                </div>
                            @endif
                            @if($item->IMAGE_3)
                                <div style="margin-bottom: 5px;">
                                    <img width="100" src="{{ config('const.IMAGE_PATH.INFORMATION'). $item->IMAGE_3 }}">
                                </div>
                            @endif
                        </td>
                        <td>
                            @if($item->APPEAR_FLG)
                                @if($item->END_DATE && $item->END_DATE < date("YmdHi"))
                                    公開終了
                                @else
                                    @if($item->START_DATE > date("YmdHi"))
                                        公開前
                                    @else
                                        <span style="color: red;">公開</span>
                                    @endif
                                @endif
                            @else
                                非掲載
                            @endif
                        </td>
                        <td>
                            <a href="/admin/information/edit/{{$item->ID}}">編集</a>
                            |<br>
                            <a href="javascript:void(0);" onClick="if(confirm('選択したレコードを削除します。よろしいですか?')){location.href='/admin/information/delete/{{$item->ID}}'}">削除</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </tr>
        </table>
    </div>
    
    {{ $information->appends([])->links() }}
    
@endsection