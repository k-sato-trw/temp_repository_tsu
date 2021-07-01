@extends('layouts.admin_sekosya_layout')

@section('title', '開門時間編集')

@inject('general', 'App\Services\GeneralService')

@section('content')

    <h1>開門時間編集 日時:{{ $general->create_display_date($start_date,$end_date) }}</h1>
    <div style="margin:40px 0;">
        <form method="post" enctype="multipart/form-data" name="edit_form">
            
            <div class="card bg-secondary mb-3" >
                <div class="card-header">表示開始日</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="start_date" value="{{ old('start_date', $start_date) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">表示終了日</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="end_date" value="{{ old('end_date', $end_date) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">開門時刻</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="KAIMON_TIME" value="{{ old('KAIMON_TIME', $kaimon->KAIMON_TIME) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">第1Rスタート展示</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="ST_TIME" value="{{ old('ST_TIME', $kaimon->ST_TIME) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">掲載状態</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_APPEAR_FLG" name="APPEAR_FLG" value="1" @if(old('APPEAR_FLG', $kaimon->APPEAR_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_APPEAR_FLG">掲載</label>
                    </div>
                </div>
            </div>




            
            
            <button type="button" class="btn btn-primary" onclick="location.href='/admin_sekosya/kaimon/'">一覧に戻る</button>
            <button type="submit" class="btn btn-success">登録</button>

            <div style="float: right">
                <button type="button" class="btn btn-danger" onclick="delete_check();">削除</button>
            </div>
            @csrf
        </form>
    </div>
    
@endsection

@section('script')
    <script>
        function delete_check(){
            if(!document.edit_form.start_date.value || !document.edit_form.end_date.value ){
                alert('表示開始日と表示終了日を入力してください。');
            }else{
                if(confirm('指定の日付データをすべて削除します。\nよろしいですか?')){
                    document.edit_form.action = "/admin_sekosya/kaimon/delete";
                    document.edit_form.submit();
                }
            }
        }
    </script>
@endsection