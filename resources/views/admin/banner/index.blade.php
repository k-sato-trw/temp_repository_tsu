@extends('layouts.admin_layout')

@section('title', '津バナーページ')

@section('content')
    <h1>津バナーページ</h1>
    <div style="margin:40px 0;">
        {{--
        <div style="margin:20px 0;">
            <a href='/admin/banner/preview' target="_blank">PC 競技プレビュー</a>
        </div>--}}

        <div class="card bg-secondary mb-3">
            <div class="card-header">絞り込み</div>
            <div class="card-body">
                <form>
                    {{ \Form::select('status', [1=>"表示中",0=>"すべて"] , $status , ["class" => "form-control","style"=>"width:100px;  display:inline-block;"]) }}
                    <button type="submit" class="btn btn-success">検索</button>
                </form>
            </div>
        </div>

        <button type="button" class="btn btn-primary" onclick="location.href='/admin/banner/create'">新規作成</button>
        
        <div style="float:right;">全{{ $banner->total() }}件　現在{{ $banner->currentPage() }}ページ/全{{ $banner->lastPage() }}ページ</div>

        <table class="table table-hover">
            <thead>
                <tr class="table-active">
                    <th>表示期間</th>
                    <th>画像</th>
                    <th>URL</th>
                    <th>別画面フラグ</th>
                    <th>表示順番</th>
                    <th>登録者</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banner as $item)
                    <tr>
                        <td>
                            @if($item->掲載開始日時)
                            {{ date("Y/m/d H:i",strtotime($item->掲載開始日時)) }}
                            @endif
                            <br>～
                            @if($item->掲載終了日時)
                            {{ date("Y/m/d H:i",strtotime($item->掲載終了日時)) }}
                            @endif
                        </td>
                        <td><img src="{{ config('const.IMAGE_PATH.BANNER') . $item->イメージURL }}" width="160" height="40"></td>
                        <td style="width: 300px;word-break: break-all;">{{$item->リンク先URL}}</td>
                        <td>
                            @if($item->別画面)
                                別画面
                            @else
                                通常
                            @endif
                        </td>
                        <td>{{$item->SORT}}</td>
                        <td>{{$item->担当者}}</td>
                        <td>
                            <a href="/admin/banner/view/{{$item->バナーID}}">閲覧</a>
                            |
                            <a href="/admin/banner/edit/{{$item->バナーID}}">編集</a>
                            |
                            <a href="javascript:void(0);" onClick="if(confirm('選択したレコードを削除します。よろしいですか?')){location.href='/admin/banner/delete/{{$item->バナーID}}'}">削除</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </tr>
        </table>
    </div>
    
    {{ $banner->appends(["status"=>$status])->links() }}
    
@endsection