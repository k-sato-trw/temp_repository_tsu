@extends('layouts.admin_layout')

@section('title', 'あっせん新規作成')

@section('content')

    <h1>あっせん新規作成</h1>
    <div style="margin:40px 0;">
        <form method="post" enctype="multipart/form-data">
            
            <div class="card bg-secondary mb-3">
                <div class="card-header">登録番号</div>
                <div class="card-body">
                    <p class="card-text">{{ $touban }}</p>
                </div>
            </div>

            <div class="card bg-secondary mb-3">
                <div class="card-header">表示開始日</div>
                <div class="card-body">
                <input type="text" class="form-control" name="START_DATE" value="{{ old('START_DATE') }}">
                </div>
            </div>
            
            <div class="card bg-secondary mb-3">
                <div class="card-header">表示終了日</div>
                <div class="card-body">
                <input type="text" class="form-control" name="END_DATE" value="{{ old('END_DATE') }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3">
                <div class="card-header">表示文</div>
                <div class="card-body">
                <input type="text" class="form-control" name="TEXT" value="{{ old('TEXT') }}">
                </div>
            </div>
            
            
            <div class="card bg-secondary mb-3">
                <div class="card-header">掲載フラグ</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_APPEAR_FLG" name="APPEAR_FLG" value="1" @if(old('APPEAR_FLG',false)) checked="checked" @endif >
                        <label class="custom-control-label" for="id_APPEAR_FLG">表示する</label>
                    </div>
                </div>
            </div>
            
            <div class="card bg-secondary mb-3">
                <div class="card-header">登録者</div>
                <div class="card-body">
                <input type="text" class="form-control" name="EDITOR_NAME" value="{{ old('EDITOR_NAME') }}">
                </div>
            </div>
            
            
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/assen/view/{{ $touban }}'">選手ページに戻る</button>
            <button type="submit" class="btn btn-success">登録</button>
            @csrf
        </form>
    </div>
    
@endsection