@extends('layouts.admin_layout')

@section('title', '津 緊急告知登録一覧ページ')

@inject('general', 'App\Services\GeneralService')

@section('content')
    <h1>津 緊急告知登録一覧ページ</h1>
    <div style="margin:40px 0;">
        <!--div style="margin:20px 0;">
            <a href='/admin/kinkyu_kokuti/preview' target="_blank">PC 一覧プレビュー</a>　|　
            <a href='/admin/kinkyu_kokuti/preview_top' target="_blank">PC TOPプレビュー</a>　|　
            <a href='/admin/kinkyu_kokuti/preview_sp' target="_blank">SP 一覧プレビュー</a>
        </div-->
        <div class="card bg-secondary mb-3">
            <div class="card-header">絞り込み</div>
            <div class="card-body">
                <form>
                    {{ \Form::select('year', $yaer_options , $year , ["class" => "form-control","style"=>"width:200px;  display:inline-block;"]) }}
                    <button type="submit" class="btn btn-success">検索</button>
                </form>
            </div>
        </div>
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/kinkyu_kokuti/create'">新規作成</button>
        
        <div style="float:right;">全{{ $kinkyu_kokuti->total() }}件　現在{{ $kinkyu_kokuti->currentPage() }}ページ/全{{ $kinkyu_kokuti->lastPage() }}ページ</div>

        <table class="table table-hover">
            <thead>
                <tr class="table-active">
                    <th>表示期間</th>
                    <th>表示デバイス</th>
                    <th>タイトル<br>本文</th>
                    <th>状態</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kinkyu_kokuti as $item)
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
                            <div>
                                @if($item->PC_FLG)
                                    <span style="color: red;">PC掲載</span>
                                @else
                                    PC非掲載
                                @endif
                            </div>
                            <div>
                                @if($item->SP_FLG)
                                    <span style="color: red;">SP掲載</span>
                                @else
                                    SP非掲載
                                @endif
                            </div>
                            <div>
                                @if($item->MB_FLG)
                                    <span style="color: red;">ケータイ掲載</span>
                                @else
                                    ケータイ非掲載
                                @endif
                            </div>
                        </td>
                        <td style="width: 400px;">
                            <div style="word-break: break-all; background-color:#Fee;"><strong>{{$item->TITLE}}</strong></div>
                            <div style="width: 400px;height:100px;overflow-y:scroll;">
                                {!! nl2br($item->HONBUN) !!}
                            </div>
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
                            <a href="/admin/kinkyu_kokuti/edit/{{$item->ID}}">編集</a>
                            |<br>
                            <a href="javascript:void(0);" onClick="if(confirm('選択したレコードを削除します。よろしいですか?')){location.href='/admin/kinkyu_kokuti/delete/{{$item->ID}}'}">削除</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </tr>
        </table>
    </div>
    
    {{ $kinkyu_kokuti->appends([])->links() }}
    
@endsection