@extends('layouts.admin_layout')

@section('title', '選手画像登録')

@section('content')
    <h1>選手画像登録</h1>
    <div style="margin:40px 0;">

        <div class="card bg-secondary mb-3">
            <div class="card-header">登録番号</div>
            <div class="card-body">
                <form>
                    <input type="text" name="登番" value="{{$touban ?? ""}}" class="form-control" style="display: inline-block; width:200px;">
                    <button type="submit" class="btn btn-success">検索</button>
                </form>
            </div>
        </div>

        <button type="button" class="btn btn-primary" onclick="location.href='/admin/racer_image/create'">新規作成</button>
        
        <div style="float:right;">全{{ $racer_image->total() }}件　現在{{ $racer_image->currentPage() }}ページ/全{{ $racer_image->lastPage() }}ページ</div>

        <table class="table table-hover">
            <thead>
                <tr class="table-active">
                    <th>登番</th>
                    <th>名前</th>
                    <th>出身</th>
                    <th>性別</th>
                    <th>画像</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach($racer_image as $item)
                    <tr>
                        <td>{{$item->登番}}</td>
                        <td>{{$item->名前}}</td>
                        <td>{{$item->出身}}</td>
                        <td>
                            @if($item->性別 == 1)
                                男性
                            @else
                                女性
                            @endif
                        </td>
                        <td><img src="{{ config('const.IMAGE_PATH.RACER_IMAGE') . $item->画像名 ."?" . date("YmdHis") }}" style="max-width:80px; "></td>
                        <td>
                            <a href="/admin/racer_image/view/{{$item->登番}}">閲覧</a>
                            |
                            <a href="/admin/racer_image/edit/{{$item->登番}}">編集</a>
                            |
                            <a href="javascript:void(0);" onClick="if(confirm('選択したレコードを削除します。よろしいですか?')){location.href='/admin/racer_image/delete/{{$item->登番}}'}">削除</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </tr>
        </table>
    </div>
    
    {{ $racer_image->appends(['登番'=>$touban])->links() }}
    
@endsection