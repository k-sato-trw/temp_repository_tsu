@extends('layouts.admin_layout')

@section('title', '選手画像登録 新規作成')

@section('content')

    <h1>選手画像登録 新規作成</h1>
    <div style="margin:40px 0;">
        <form method="post" enctype="multipart/form-data">

            <div class="card bg-secondary mb-3" >
                <div class="card-header">登番</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="登番" value="{{ old('登番') }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">名前</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="名前" value="{{ old('名前') }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">出身</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="出身" value="{{ old('出身') }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">性別</div>
                <div class="card-body">
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_性別_0" name="性別" class="custom-control-input" value="1" @if(old('性別') == "1") checked @endif >
                        <label class="custom-control-label" for="id_性別_0">男性</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_性別_1" name="性別" class="custom-control-input" value="2" @if(old('性別') == "2") checked @endif >
                        <label class="custom-control-label" for="id_性別_1">女性</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">画像</div>
                <div class="card-body">
                    <input type="file" class="form-control-file" name="画像名" >
                </div>
            </div>
            
            
            <button type="button" class="btn btn-primary" onclick="location.href='/admin/racer_image/'">一覧に戻る</button>
            <button type="submit" class="btn btn-success">登録</button>
            @csrf
        </form>
    </div>
    
@endsection