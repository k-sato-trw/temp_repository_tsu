@extends('layouts.admin_layout')

@section('title', 'トピック編集')

@section('content')

    <h1>トピック編集 ID:{{ $topic->ID }}</h1>
    <div style="margin:40px 0;">
        <form method="post" enctype="multipart/form-data">
            
            <div class="card bg-secondary mb-3" >
                <div class="card-header">掲載開始時間</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="START_DATE" value="{{ old('START_DATE', $topic->START_DATE) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">掲載終了時間</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="END_DATE" value="{{ old('END_DATE', $topic->END_DATE) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">画像</div>
                <div class="card-body">
                    <div style="margin-bottom: 10px;">
                        @if($topic->IMAGE)
                            <img src="{{ config('const.IMAGE_PATH.TOPIC').$topic->IMAGE }}" style="max-height: 100px;max-width: 150px;">
                            <!--div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="id_delete_IMAGE" name="delete_IMAGE" value="1" >
                                <label class="custom-control-label" for="id_delete_IMAGE">画像を削除する</label>
                            </div-->
                        @endif
                    </div>
                    <input type="file" class="form-control-file" name="IMAGE" >
                </div>
            </div>


            <div class="card bg-secondary mb-3" >
                <div class="card-header">PC用URL</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="PC_URL" value="{{ old('PC_URL', $topic->PC_URL) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">SP用URL</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="SP_URL" value="{{ old('SP_URL', $topic->SP_URL) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">PC別画面フラグ</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_PC_BLANK_FLG" name="PC_BLANK_FLG" value="1" @if(old('PC_BLANK_FLG', $topic->PC_BLANK_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_PC_BLANK_FLG">別画面</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">SP別画面フラグ</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_SP_BLANK_FLG" name="SP_BLANK_FLG" value="1" @if(old('SP_BLANK_FLG', $topic->SP_BLANK_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_SP_BLANK_FLG">別画面</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">PC掲載フラグ</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_PC_APPEAR_FLG" name="PC_APPEAR_FLG" value="1" @if(old('PC_APPEAR_FLG', $topic->PC_APPEAR_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_PC_APPEAR_FLG">掲載</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">SP掲載フラグ</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_SP_APPEAR_FLG" name="SP_APPEAR_FLG" value="1" @if(old('SP_APPEAR_FLG', $topic->SP_APPEAR_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_SP_APPEAR_FLG">掲載</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">表示順</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="VIEW_POINT" value="{{ old('VIEW_POINT', $topic->VIEW_POINT) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">大サイズフラグ</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_BIG_FLAG" name="BIG_FLAG" value="1" @if(old('BIG_FLAG', $topic->BIG_FLAG)) checked @endif >
                        <label class="custom-control-label" for="id_BIG_FLAG">大バナー</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">掲載フラグ</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_APPEAR_FLG" name="APPEAR_FLG" value="1" @if(old('APPEAR_FLG', $topic->APPEAR_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_APPEAR_FLG">掲載</label>
                    </div>
                </div>
            </div>

            
            <button type="button" class="btn btn-primary" onclick="location.href='/admin/topic/'">一覧に戻る</button>
            <button type="submit" class="btn btn-success">登録</button>
            @csrf
        </form>
    </div>
    
@endsection