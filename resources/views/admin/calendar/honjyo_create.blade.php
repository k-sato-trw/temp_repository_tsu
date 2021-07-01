@extends('layouts.admin_layout')

@section('title', '津 開催日付登録ページ')

@section('content')

    <h1>津 開催日付登録ページ</h1>
    <h2>入力モード:本場</h2>
    <div style="margin:40px 0;">
        <form method="post" enctype="multipart/form-data">

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
                <div class="card-header">レースタイトル</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="RACE_TITLE" value="{{ old('RACE_TITLE') }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">カレンダー用レースタイトル</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="CALENDAR_RACE_TITLE" value="{{ old('CALENDAR_RACE_TITLE') }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">レースグレード</div>
                <div class="card-body">
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_GRADE_0" name="GRADE" class="custom-control-input" value="0" @if(old('GRADE') == "0") checked @endif >
                        <label class="custom-control-label" for="id_GRADE_0">SG</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_GRADE_1" name="GRADE" class="custom-control-input" value="1" @if(old('GRADE') == "1") checked @endif >
                        <label class="custom-control-label" for="id_GRADE_1">G1</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_GRADE_2" name="GRADE" class="custom-control-input" value="2" @if(old('GRADE') == "2") checked @endif >
                        <label class="custom-control-label" for="id_GRADE_2">G2</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_GRADE_3" name="GRADE" class="custom-control-input" value="3" @if(old('GRADE') == "3") checked @endif >
                        <label class="custom-control-label" for="id_GRADE_3">G3</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_GRADE_4" name="GRADE" class="custom-control-input" value="4" @if(old('GRADE') == "4") checked @endif >
                        <label class="custom-control-label" for="id_GRADE_4">一般</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">デイ／ナイター／薄暮</div>
                <div class="card-body">
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_RACE_TYPE_0" name="RACE_TYPE" class="custom-control-input" value="0" @if(old('RACE_TYPE') == "0") checked @endif >
                        <label class="custom-control-label" for="id_RACE_TYPE_0">デイ</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_RACE_TYPE_1" name="RACE_TYPE" class="custom-control-input" value="1" @if(old('RACE_TYPE') == "1") checked @endif >
                        <label class="custom-control-label" for="id_RACE_TYPE_1">ナイター</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_RACE_TYPE_2" name="RACE_TYPE" class="custom-control-input" value="2" @if(old('RACE_TYPE') == "2") checked @endif >
                        <label class="custom-control-label" for="id_RACE_TYPE_2">薄暮</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">女子戦フラグ</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_LADY_FLG" name="LADY_FLG" value="1" @if(old('LADY_FLG',false)) checked @endif >
                        <label class="custom-control-label" for="id_LADY_FLG">女子戦</label>
                    </div>
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