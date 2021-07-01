@extends('layouts.admin_layout')

@section('title', '津 開催日付登録ページ')

@section('content')

    <h1>津 開催日付登録ページ</h1>
    <h2>入力モード:TV ID:{{ $holdentry->ID }}</h2>
    <div style="margin:40px 0;">
        <form method="post" enctype="multipart/form-data">

            <div class="card bg-secondary mb-3" >
                <div class="card-header">レース場</div>
                <div class="card-body">
                    {{ \Form::select('JYO', $jyo_options , old('JYO',$holdentry->JYO) , ["class" => "form-control"]) }}
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">開催期間開始日</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="START_DATE" value="{{ old('START_DATE', $holdentry->START_DATE ) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">開催期間終了日</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="END_DATE" value="{{ old('END_DATE', $holdentry->END_DATE ) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">掲載フラグ</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_APPEAR_FLG" name="APPEAR_FLG" value="1" @if(old('APPEAR_FLG',$holdentry->APPEAR_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_APPEAR_FLG">掲載</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">登録者</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="EDITOR_NAME" value="{{ old('EDITOR_NAME', $holdentry->EDITOR_NAME ) }}">
                </div>
            </div>



            
            <button type="button" class="btn btn-primary" onclick="location.href='/admin/calendar/'">一覧に戻る</button>
            <button type="submit" class="btn btn-success">登録</button>
            @csrf
        </form>
        <div style="float: right">
            <button type="button" class="btn btn-danger" onclick="if(confirm('選択したレコードを削除します。よろしいですか?')){location.href='/admin/calendar/delete/{{$holdentry->ID}}'}">削除</button>
        </div>
    </div>
    
@endsection