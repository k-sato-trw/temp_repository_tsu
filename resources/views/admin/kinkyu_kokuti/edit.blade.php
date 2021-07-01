@extends('layouts.admin_layout')

@section('title', '津 緊急告知編集')

@section('content')

    <h1>津 緊急告知編集 ID:{{ $kinkyu_kokuti->ID }}</h1>
    <div style="margin:40px 0;">
        <form method="post" enctype="multipart/form-data">
            
            <div class="card bg-secondary mb-3" >
                <div class="card-header">掲載開始時間</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="START_DATE" value="{{ old('START_DATE', $kinkyu_kokuti->START_DATE) }}">
                    <div id="START_DATE_TEXT" style="background-color: #ccc; padding:5px; margin-top:5px;"></div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">掲載終了時間</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="END_DATE" value="{{ old('END_DATE', $kinkyu_kokuti->END_DATE) }}">
                    <div id="END_DATE_TEXT" style="background-color: #ccc; padding:5px; margin-top:5px;"></div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">タイトル</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="TITLE" value="{{ old('TITLE', $kinkyu_kokuti->TITLE) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">告知本文</div>
                <div class="card-body">
                    <textarea class="form-control " name="HONBUN" id="HONBUN" rows="3">{{ old('HONBUN', $kinkyu_kokuti->HONBUN) }}</textarea>
                    <button type="button" class="btn btn-primary" onclick="document.getElementById('HONBUN').innerHTML='台風の影響により、●/●の開催を中止いたします。'">例文1</button>
                    <button type="button" class="btn btn-primary" onclick="document.getElementById('HONBUN').innerHTML='台風の影響により、●/●の開催を中止順延いたします。これにより、最終日は●/●となります。'">例文2</button>
                    <button type="button" class="btn btn-primary" onclick="document.getElementById('HONBUN').innerHTML='台風の影響により、第●レース以降の開催を中止打ち切りといたします。'">例文3</button>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">表示デバイスPC</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_PC_FLG" name="PC_FLG" value="1" @if(old('PC_FLG', $kinkyu_kokuti->PC_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_PC_FLG">PC</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">表示デバイスSP</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_SP_FLG" name="SP_FLG" value="1" @if(old('SP_FLG', $kinkyu_kokuti->SP_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_SP_FLG">SP</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">表示デバイスMB</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_MB_FLG" name="MB_FLG" value="1" @if(old('MB_FLG', $kinkyu_kokuti->MB_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_MB_FLG">MB</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">登録者</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="EDITOR_NAME" value="{{ old('EDITOR_NAME', $kinkyu_kokuti->EDITOR_NAME) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">掲載フラグ</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_APPEAR_FLG" name="APPEAR_FLG" value="1" @if(old('APPEAR_FLG', $kinkyu_kokuti->APPEAR_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_APPEAR_FLG">掲載</label>
                    </div>
                </div>
            </div>


            
            <button type="button" class="btn btn-primary" onclick="location.href='/admin/kinkyu_kokuti/'">一覧に戻る</button>
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
    </script>
@endsection