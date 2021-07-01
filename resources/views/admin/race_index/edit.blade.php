@extends('layouts.admin_layout')

@section('title', 'レースインデックス登録ページ')

@section('content')

    <h1>レースインデックス登録ページ ID:{{ $race_index->ID }}</h1>
    <div style="margin:40px 0;">
        <form method="post" enctype="multipart/form-data">
            
            <div class="card bg-secondary mb-3" >
                <div class="card-header">開催期間開始</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="START_DATE" value="{{ old('START_DATE', $race_index->START_DATE ) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">開催期間終了</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="END_DATE" value="{{ old('END_DATE', $race_index->END_DATE ) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">グレード</div>
                <div class="card-body">
                    {{ \Form::select('GRADE', $grade , old('GRADE',$race_index->GRADE) , ["class" => "form-control"]) }}
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">レースタイトル</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="RACE_TITLE" value="{{ old('RACE_TITLE', $race_index->RACE_TITLE ) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">レース展望URL(PC)</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="PC_TENBO_URL" value="{{ old('PC_TENBO_URL', $race_index->PC_TENBO_URL ) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">レース展望URL(SP)</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="SP_TENBO_URL" value="{{ old('SP_TENBO_URL', $race_index->SP_TENBO_URL ) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">出場予定選手URL(PC)</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="PC_SYUTUJO_URL" value="{{ old('PC_SYUTUJO_URL', $race_index->PC_SYUTUJO_URL ) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">出場予定選手URL(SP)</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="SP_SYUTUJO_URL" value="{{ old('SP_SYUTUJO_URL', $race_index->SP_SYUTUJO_URL ) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">登録者</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="EDITOR_NAME" value="{{ old('EDITOR_NAME', $race_index->EDITOR_NAME ) }}">
                </div>
            </div>

            
            <button type="button" class="btn btn-primary" onclick="location.href='/admin/race_index/'">一覧に戻る</button>
            <button type="submit" class="btn btn-success">登録</button>
            @csrf
        </form>
    </div>
    
@endsection