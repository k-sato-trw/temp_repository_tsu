@extends('layouts.admin_layout')

@section('title', '津 イベントファンマスタ編集')

@section('content')

    <h1>津 イベントファンマスタ編集</h1>
    <h2>カレンダーID:{{ $event_fan_master->ID }}</h2>
    <h2>サブID:{{ $event_fan_master->SUB_ID }}</h2>
    <div style="margin:40px 0;">
        <form method="post" enctype="multipart/form-data">
            
            <div class="card bg-secondary mb-3" >
                <div class="card-header">開催期間開始日</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="START_DATE" value="{{ old('START_DATE', $event_fan_master->START_DATE) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">開催期間終了日</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="END_DATE" value="{{ old('END_DATE', $event_fan_master->END_DATE) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">掲載フラグ</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_APPEAR_FLG" name="APPEAR_FLG" value="1" @if(old('APPEAR_FLG', $event_fan_master->APPEAR_FLG)) checked @endif >
                        <label class="custom-control-label" for="id_APPEAR_FLG">掲載</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">登録者</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="EDITOR_NAME" value="{{ old('EDITOR_NAME', $event_fan_master->EDITOR_NAME) }}">
                </div>
            </div>


            
            <button type="button" class="btn btn-primary" onclick="location.href='/admin/event_fan_master/{{ $event_fan_master->ID }}'">一覧に戻る</button>
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