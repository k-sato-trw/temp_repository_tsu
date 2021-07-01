@extends('layouts.admin_layout')

@section('title', '津 選手管理ページ')

@section('content')
    <h1>津 選手管理ページ</h1>
    <div style="margin:40px 0;">
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/assen/create'">新規作成</button>
        <div style="float:right;">全{{ $fandata->total() }}件　現在{{ $fandata->currentPage() }}ページ/全{{ $fandata->lastPage() }}ページ</div>

        <table class="table table-hover">
            <thead>
                <tr class="table-active">
                    <th>登録番号</th>
                    <th>クラス</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fandata as $item)
                    <tr>
                        <td>{{ $item->Touban }}</td>
                        <td>{{ $item->Kyu }}</td>
                        <td>
                            <a href="/admin/assen/view/{{$item->Touban}}">詳細</a>
                            |
                            <a href="javascript:void(0);" onClick="if(confirm('選択したレコードを削除します。よろしいですか?')){location.href='/admin/assen/delete/{{$item->Touban}}'}">削除</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </tr>
        </table>
    </div>
    {{ $fandata->appends([])->links() }}
    
    <h2 style="margin:60px 0 0;">選手データが存在しない登録データ</h2>
    <div style="margin:10px 0;">
        <table class="table table-hover">
            <thead>
                <tr class="table-active">
                    <th>登録番号</th>
                    <th>クラス</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nothing_fandata as $item)
                    <tr>
                        <td>{{ $item }}</td>
                        <td></td>
                        <td>
                            <a href="/admin/assen/view/{{$item}}">詳細</a>
                            |
                            <a href="javascript:void(0);" onClick="if(confirm('選択したレコードを削除します。よろしいですか?')){location.href='/admin/assen/delete/{{$item}}'}">削除</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </tr>
        </table>
    </div>
@endsection