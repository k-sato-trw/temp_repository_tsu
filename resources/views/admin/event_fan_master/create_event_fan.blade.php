@extends('layouts.admin_layout')

@section('title', '津 イベントファン 新規作成')

@section('content')

    <h1>津 イベントファン 新規作成</h1>
    <h2>カレンダーID:{{ $id }}</h2>
    <h2>サブID:{{ $sub_id }}</h2>
    <div style="margin:40px 0;">
        <form method="post" enctype="multipart/form-data">

            <div class="card bg-secondary mb-3" >
                <div class="card-header">種別</div>
                <div class="card-body">
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_TYPE_0" name="TYPE" class="custom-control-input" value="1" @if(old('TYPE') == "1") checked @endif >
                        <label class="custom-control-label" for="id_TYPE_0">イベント</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_TYPE_1" name="TYPE" class="custom-control-input" value="0" @if(old('TYPE') == "0") checked @endif >
                        <label class="custom-control-label" for="id_TYPE_1">ファンサービス</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">タイトル</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="TITLE" value="{{ old('TITLE') }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">本文</div>
                <div class="card-body">
                    <textarea class="form-control " name="TEXT" rows="3">{{ old('TEXT') }}</textarea>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">画像1</div>
                <div class="card-body">
                    <input type="file" class="form-control-file" name="IMAGE1" >
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">画像2</div>
                <div class="card-body">
                    <input type="file" class="form-control-file" name="IMAGE2" >
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">画像3</div>
                <div class="card-body">
                    <input type="file" class="form-control-file" name="IMAGE3" >
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">予備画像</div>
                <div class="card-body">
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_NOIMAGE_0" name="NOIMAGE" class="custom-control-input" value="1" @if(old('NOIMAGE') == "1") checked @endif >
                        <label class="custom-control-label" for="id_NOIMAGE_0"><img src="/04event/images/img_card.png" width="82" height="58">舟券</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_NOIMAGE_1" name="NOIMAGE" class="custom-control-input" value="2" @if(old('NOIMAGE') == "2") checked @endif >
                        <label class="custom-control-label" for="id_NOIMAGE_1"><img src="/04event/images/img_present.png" width="82" height="58">プレゼント</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_NOIMAGE_2" name="NOIMAGE" class="custom-control-input" value="3" @if(old('NOIMAGE') == "3") checked @endif >
                        <label class="custom-control-label" for="id_NOIMAGE_2"><img src="/04event/images/img_cup.png" width="82" height="58">トロフィー</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_NOIMAGE_3" name="NOIMAGE" class="custom-control-input" value="4" @if(old('NOIMAGE') == "4") checked @endif >
                        <label class="custom-control-label" for="id_NOIMAGE_3"><img src="/04event/images/img_tukky.png" width="82" height="58">ツッキー</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_NOIMAGE_4" name="NOIMAGE" class="custom-control-input" value="5" @if(old('NOIMAGE') == "5") checked @endif >
                        <label class="custom-control-label" for="id_NOIMAGE_4">表示なし</label>
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
                <div class="card-header">表示順番</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="TURN" value="{{ old('TURN') }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">登録者</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="EDITOR_NAME" value="{{ old('EDITOR_NAME') }}">
                </div>
            </div>

            
            <button type="button" class="btn btn-primary" onclick="location.href='/admin/event_fan_master/{{$id}}'">一覧に戻る</button>
            <button type="submit" class="btn btn-success">登録</button>
            @csrf
        </form>
    </div>
    
@endsection