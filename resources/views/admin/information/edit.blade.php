@extends('layouts.admin_layout')

@section('title', 'インフォメーション編集')

@section('content')

    <h1>インフォメーション編集 ID:{{ $information->ID }}</h1>
    <div style="margin:40px 0;">
        <form method="post" enctype="multipart/form-data">
            
            <div class="card bg-secondary mb-3" >
                <div class="card-header">記事カテゴリ</div>
                <div class="card-body">
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_TYPE_0" name="TYPE" class="custom-control-input" value="1" @if(old('TYPE', $information->TYPE) == "1") checked @endif >
                        <label class="custom-control-label" for="id_TYPE_0">更新</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_TYPE_1" name="TYPE" class="custom-control-input" value="2" @if(old('TYPE', $information->TYPE) == "2") checked @endif >
                        <label class="custom-control-label" for="id_TYPE_1">お知らせ</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_TYPE_2" name="TYPE" class="custom-control-input" value="3" @if(old('TYPE', $information->TYPE) == "3") checked @endif >
                        <label class="custom-control-label" for="id_TYPE_2">重要</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">表示デバイスPC</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_PC_APPEAR_FLG" name="PC_APPEAR_FLG" value="1" @if(old('PC_APPEAR_FLG', $information->PC_APPEAR_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_PC_APPEAR_FLG">PC</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">表示デバイスSP</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_SP_APPEAR_FLG" name="SP_APPEAR_FLG" value="1" @if(old('SP_APPEAR_FLG', $information->SP_APPEAR_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_SP_APPEAR_FLG">SP</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">表示デバイスMB</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_MB_APPEAR_FLG" name="MB_APPEAR_FLG" value="1" @if(old('MB_APPEAR_FLG', $information->MB_APPEAR_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_MB_APPEAR_FLG">MB</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">掲載開始日</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="START_DATE" value="{{ old('START_DATE', $information->START_DATE) }}">
                    <div id="START_DATE_TEXT" style="background-color: #ccc; padding:5px; margin-top:5px;"></div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">掲載終了日</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="END_DATE" value="{{ old('END_DATE', $information->END_DATE) }}">
                    <div id="END_DATE_TEXT" style="background-color: #ccc; padding:5px; margin-top:5px;"></div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">表示日付</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="VIEW_DATE" value="{{ old('VIEW_DATE', $information->VIEW_DATE) }}">
                    <div id="VIEW_DATE_TEXT" style="background-color: #ccc; padding:5px; margin-top:5px;"></div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">NEWアイコン</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_NEW_FLG" name="NEW_FLG" value="1" @if(old('NEW_FLG', $information->NEW_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_NEW_FLG">表示</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">記事タイトル</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="TITLE" value="{{ old('TITLE', $information->TITLE) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">HOT NEWS</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="HEADLINE_TITLE" value="{{ old('HEADLINE_TITLE', $information->HEADLINE_TITLE) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">HOT NEWS表示</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_HEADLINE_FLG" name="HEADLINE_FLG" value="1" @if(old('HEADLINE_FLG', $information->HEADLINE_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_HEADLINE_FLG">表示</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">本文</div>
                <div class="card-body">
                    <textarea class="form-control " name="TEXT" rows="3">{!! old('TEXT', $information->TEXT) !!}</textarea>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">PCリンク</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="PC_LINK" value="{{ old('PC_LINK', $information->PC_LINK) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">PC別画面フラグ</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_PC_LINK_WINDOW_FLG" name="PC_LINK_WINDOW_FLG" value="1" @if(old('PC_LINK_WINDOW_FLG', $information->PC_LINK_WINDOW_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_PC_LINK_WINDOW_FLG">別画面</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">SPリンク</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="SP_LINK" value="{{ old('SP_LINK', $information->SP_LINK) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">SP別画面フラグ</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_SP_LINK_WINDOW_FLG" name="SP_LINK_WINDOW_FLG" value="1" @if(old('SP_LINK_WINDOW_FLG', $information->SP_LINK_WINDOW_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_SP_LINK_WINDOW_FLG">別画面</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">MBリンク</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="MB_LINK" value="{{ old('MB_LINK', $information->MB_LINK) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">MB別画面フラグ</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_MB_LINK_WINDOW_FLG" name="MB_LINK_WINDOW_FLG" value="1" @if(old('MB_LINK_WINDOW_FLG', $information->MB_LINK_WINDOW_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_MB_LINK_WINDOW_FLG">別画面</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">画像1</div>
                <div class="card-body">
                    <div style="margin-bottom: 10px;">
                        @if($information->IMAGE_1)
                            <img src="{{ config('const.IMAGE_PATH.INFORMATION').$information->IMAGE_1 }}" style="max-height: 100px;max-width: 150px;">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="id_delete_IMAGE_1" name="delete_IMAGE_1" value="1" >
                                <label class="custom-control-label" for="id_delete_IMAGE_1">画像を削除する</label>
                            </div>
                        @endif
                    </div>
                    <input type="file" class="form-control-file" name="IMAGE_1" >
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">画像2</div>
                <div class="card-body">
                    <div style="margin-bottom: 10px;">
                        @if($information->IMAGE_2)
                            <img src="{{ config('const.IMAGE_PATH.INFORMATION').$information->IMAGE_2 }}" style="max-height: 100px;max-width: 150px;">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="id_delete_IMAGE_2" name="delete_IMAGE_2" value="1" >
                                <label class="custom-control-label" for="id_delete_IMAGE_2">画像を削除する</label>
                            </div>
                        @endif
                    </div>
                    <input type="file" class="form-control-file" name="IMAGE_2" >
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">画像3</div>
                <div class="card-body">
                    <div style="margin-bottom: 10px;">
                        @if($information->IMAGE_3)
                            <img src="{{ config('const.IMAGE_PATH.INFORMATION').$information->IMAGE_3 }}" style="max-height: 100px;max-width: 150px;">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="id_delete_IMAGE_3" name="delete_IMAGE_3" value="1" >
                                <label class="custom-control-label" for="id_delete_IMAGE_3">画像を削除する</label>
                            </div>
                        @endif
                    </div>
                    <input type="file" class="form-control-file" name="IMAGE_3" >
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">掲載フラグ</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_APPEAR_FLG" name="APPEAR_FLG" value="1" @if(old('APPEAR_FLG', $information->APPEAR_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_APPEAR_FLG">掲載</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">登録者</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="EDITOR_NAME" value="{{ old('EDITOR_NAME', $information->EDITOR_NAME) }}">
                </div>
            </div>


            
            
            <button type="button" class="btn btn-primary" onclick="location.href='/admin/information/'">一覧に戻る</button>
            <button type="submit" class="btn btn-success">登録</button>
            @csrf
        </form>
    </div>
    
@endsection

@section('script')
    <script>

        exchange_date_text('START_DATE','ymdhi');
        exchange_date_text('END_DATE','ymdhi');

        $('input[name=START_DATE]').on('change',function(){
            exchange_date_text('START_DATE','ymdhi');
        });
        $('input[name=END_DATE]').on('change',function(){
            exchange_date_text('END_DATE','ymdhi');
        });

        exchange_date_text('VIEW_DATE','md');

        $('input[name=VIEW_DATE]').on('change',function(){
            exchange_date_text('VIEW_DATE','md');
        });
    </script>
@endsection