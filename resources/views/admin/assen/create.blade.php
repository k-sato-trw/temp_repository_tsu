@extends('layouts.admin_layout')

@section('title', '選手管理 新規作成')

@section('content')

    <h1>選手管理 新規作成</h1>
    <div style="margin:40px 0;">
        <form method="post" enctype="multipart/form-data">

            <div class="card bg-secondary mb-3">
                <div class="card-header">登録番号</div>
                <div class="card-body">
                <input type="text" class="form-control" name="登録番号" value="{{ old('登録番号') }}">
                </div>
            </div>
            
            <button type="button" class="btn btn-primary" onclick="location.href='/admin/assen/'">一覧に戻る</button>
            <button type="submit" class="btn btn-success">登録</button>
            @csrf
        </form>
    </div>
    
@endsection