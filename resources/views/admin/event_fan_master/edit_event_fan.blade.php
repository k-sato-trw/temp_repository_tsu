@extends('layouts.admin_layout')

@section('title', '津 イベントファン編集')

@section('content')

    <h1>津 イベントファン編集</h1>
    <h2>カレンダーID:{{ $event_fan->ID }}</h2>
    <h2>サブID:{{ $event_fan->SUB_ID }}</h2>
    <h2>サードID:{{ $event_fan->THIRD_ID }}</h2>
    <div style="margin:40px 0;">
        <form method="post" enctype="multipart/form-data">
            
            <div class="card bg-secondary mb-3" >
                <div class="card-header">種別</div>
                <div class="card-body">
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_TYPE_0" name="TYPE" class="custom-control-input" value="1" @if(old('TYPE', $event_fan->TYPE) == "1") checked @endif >
                        <label class="custom-control-label" for="id_TYPE_0">イベント</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_TYPE_1" name="TYPE" class="custom-control-input" value="0" @if(old('TYPE', $event_fan->TYPE) == "0") checked @endif >
                        <label class="custom-control-label" for="id_TYPE_1">ファンサービス</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">タイトル</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="TITLE" value="{{ old('TITLE', $event_fan->TITLE) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">本文</div>
                <div class="card-body">
                    <textarea class="form-control " name="TEXT" rows="3">{{ old('TEXT', $event_fan->TEXT) }}</textarea>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">画像1</div>
                <div class="card-body">
                    <div style="margin-bottom: 10px;">
                        @if($event_fan->IMAGE1)
                            <img src="{{ config('const.IMAGE_PATH.EVENT_FAN').$event_fan->IMAGE1 }}" style="max-height: 100px;max-width: 150px;">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="id_delete_IMAGE1" name="delete_IMAGE1" value="1" >
                                <label class="custom-control-label" for="id_delete_IMAGE1">画像を削除する</label>
                            </div>
                        @endif
                    </div>
                    <input type="file" class="form-control-file" name="IMAGE1" >
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">画像2</div>
                <div class="card-body">
                    <div style="margin-bottom: 10px;">
                        @if($event_fan->IMAGE2)
                            <img src="{{ config('const.IMAGE_PATH.EVENT_FAN').$event_fan->IMAGE2 }}" style="max-height: 100px;max-width: 150px;">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="id_delete_IMAGE2" name="delete_IMAGE2" value="1" >
                                <label class="custom-control-label" for="id_delete_IMAGE2">画像を削除する</label>
                            </div>
                        @endif
                    </div>
                    <input type="file" class="form-control-file" name="IMAGE2" >
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">画像3</div>
                <div class="card-body">
                    <div style="margin-bottom: 10px;">
                        @if($event_fan->IMAGE3)
                            <img src="{{ config('const.IMAGE_PATH.EVENT_FAN').$event_fan->IMAGE3 }}" style="max-height: 100px;max-width: 150px;">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="id_delete_IMAGE3" name="delete_IMAGE3" value="1" >
                                <label class="custom-control-label" for="id_delete_IMAGE3">画像を削除する</label>
                            </div>
                        @endif
                    </div>
                    <input type="file" class="form-control-file" name="IMAGE3" >
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">予備画像</div>
                <div class="card-body">
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_NOIMAGE_0" name="NOIMAGE" class="custom-control-input" value="1" @if(old('NOIMAGE', $event_fan->NOIMAGE) == "1") checked @endif >
                        <label class="custom-control-label" for="id_NOIMAGE_0"><img src="/04event/images/img_card.png" width="82" height="58">舟券</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_NOIMAGE_1" name="NOIMAGE" class="custom-control-input" value="2" @if(old('NOIMAGE', $event_fan->NOIMAGE) == "2") checked @endif >
                        <label class="custom-control-label" for="id_NOIMAGE_1"><img src="/04event/images/img_present.png" width="82" height="58">プレゼント</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_NOIMAGE_2" name="NOIMAGE" class="custom-control-input" value="3" @if(old('NOIMAGE', $event_fan->NOIMAGE) == "3") checked @endif >
                        <label class="custom-control-label" for="id_NOIMAGE_2"><img src="/04event/images/img_cup.png" width="82" height="58">トロフィー</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_NOIMAGE_3" name="NOIMAGE" class="custom-control-input" value="4" @if(old('NOIMAGE', $event_fan->NOIMAGE) == "4") checked @endif >
                        <label class="custom-control-label" for="id_NOIMAGE_3"><img src="/04event/images/img_tukky.png" width="82" height="58">ツッキー</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_NOIMAGE_4" name="NOIMAGE" class="custom-control-input" value="5" @if(old('NOIMAGE', $event_fan->NOIMAGE) == "5") checked @endif >
                        <label class="custom-control-label" for="id_NOIMAGE_4">表示なし</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">掲載フラグ</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_APPEAR_FLG" name="APPEAR_FLG" value="1" @if(old('APPEAR_FLG', $event_fan->APPEAR_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_APPEAR_FLG">掲載</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">表示順番</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="TURN" value="{{ old('TURN', $event_fan->TURN) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">登録者</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="EDITOR_NAME" value="{{ old('EDITOR_NAME', $event_fan->EDITOR_NAME) }}">
                </div>
            </div>


            
            <button type="button" class="btn btn-primary" onclick="location.href='/admin/event_fan_master/{{ $event_fan->ID }}'">一覧に戻る</button>
            <button type="submit" class="btn btn-success">登録</button>
            @csrf
        </form>
    </div>
    
@endsection
