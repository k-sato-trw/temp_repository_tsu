@extends('layouts.admin_layout')

@section('title', '出場予定選手個別編集ページ 新規作成')

@section('content')

    <h1>出場予定選手個別編集ページ 新規作成</h1>
    <h2>ID:{{ $id }}</h2>
    <div style="margin:40px 0;">
        <form method="post" enctype="multipart/form-data">

            <div class="card bg-secondary mb-3" >
                <div class="card-header">登録番号</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="TOUBAN" value="{{ old('TOUBAN', ($touban ?? "")) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">掲載フラグ</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_APPEAR_FLG" name="APPEAR_FLG" value="1" @if(old('APPEAR_FLG', false)) checked @endif >
                        <label class="custom-control-label" for="id_APPEAR_FLG"></label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">選手名</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="SENSYU_NAME" value="{{ old('SENSYU_NAME') }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">年齢</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="AGE" value="{{ old('AGE') }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">支部</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="ADDRESS" value="{{ old('ADDRESS') }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">性別</div>
                <div class="card-body">
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_SEX_0" name="SEX" class="custom-control-input" value="1" @if(old('SEX') == "1") checked @endif >
                        <label class="custom-control-label" for="id_SEX_0">男性</label>
                    </div>
                    <div class="custom-control custom-radio" style="float: left; margin-right:20px;">
                        <input type="radio" id="id_SEX_1" name="SEX" class="custom-control-input" value="2" @if(old('SEX') == "2") checked @endif >
                        <label class="custom-control-label" for="id_SEX_1">女性</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">級</div>
                <div class="card-body">
                    {{ \Form::select('KYU', $kyu , old('KYU') , ["class" => "form-control"]) }}
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">全国勝率</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="ALLWIN" value="{{ old('ALLWIN') }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">全国2連率</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="ALL2WIN" value="{{ old('ALL2WIN') }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">全国平均ST</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="ALLAVGST" value="{{ old('ALLAVGST') }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">全国出走回数</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="ALLCOUNT" value="{{ old('ALLCOUNT') }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">生年月日</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="BIRTHDAY" value="{{ old('BIRTHDAY') }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">登録者</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="EDITOR_NAME" value="{{ old('EDITOR_NAME') }}">
                </div>
            </div>


            <button type="button" class="btn btn-primary" onclick="location.href='/admin/syutujo_racer/view/{{$id}}'">一覧に戻る</button>
            <button type="submit" class="btn btn-success">登録</button>
            @csrf
        </form>
    </div>
    
@endsection