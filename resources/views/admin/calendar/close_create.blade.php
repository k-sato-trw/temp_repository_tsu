@extends('layouts.admin_layout')

@section('title', '平和島 開催日付登録ページ')

@section('content')

    <h1>平和島 開催日付登録ページ</h1>
    <h2>入力モード:休館</h2>
    <div style="margin:40px 0;">
        <form method="post" enctype="multipart/form-data">
            
            <div class="card bg-secondary mb-3" >
                <div class="card-header">区分</div>
                <div class="card-body">
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_TYPE_0" name="TYPE" class="custom-control-input" value="1" checked>
                        <label class="custom-control-label" for="id_TYPE_0">本場</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_TYPE_1" name="TYPE" class="custom-control-input" value="3" @if(old('TYPE') == "3") checked @endif >
                        <label class="custom-control-label" for="id_TYPE_1">本場内</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_TYPE_2" name="TYPE" class="custom-control-input" value="4" @if(old('TYPE') == "4") checked @endif >
                        <label class="custom-control-label" for="id_TYPE_2">外向</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">開催期間開始日</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="START_DATE" value="{{ old('START_DATE' , $target_date) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">開催期間終了日</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="END_DATE" value="{{ old('END_DATE' , $target_date) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">掲載フラグ</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_APPEAR_FLG" name="APPEAR_FLG" value="1" @if(old('APPEAR_FLG',false)) checked @endif >
                        <label class="custom-control-label" for="id_APPEAR_FLG">掲載</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">登録者</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="EDITOR_NAME" value="{{ old('EDITOR_NAME') }}">
                </div>
            </div>

            <button type="button" class="btn btn-primary" onclick="location.href='/admin/calendar/'">一覧に戻る</button>
            <button type="submit" class="btn btn-success">登録</button>
            @csrf
        </form>
    </div>
    
@endsection