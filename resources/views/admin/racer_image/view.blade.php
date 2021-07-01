@extends('layouts.admin_layout')

@section('title', '選手画像登録')

@section('content')
    <h1>選手画像登録 登番:{{ $racer_image->登番 }}</h1>
    <div style="margin:40px 0;">
        
        <div class="card bg-secondary mb-3" >
            <div class="card-header">登番</div>
            <div class="card-body">
                <p class="card-text">{{ $racer_image->登番 }}</p>
            </div>
        </div>

        <div class="card bg-secondary mb-3" >
            <div class="card-header">名前</div>
            <div class="card-body">
                <p class="card-text">{{ $racer_image->名前 }}</p>
            </div>
        </div>

        <div class="card bg-secondary mb-3" >
            <div class="card-header">出身</div>
            <div class="card-body">
                <p class="card-text">{{ $racer_image->出身 }}</p>
            </div>
        </div>

        <div class="card bg-secondary mb-3" >
            <div class="card-header">性別</div>
            <div class="card-body">
                <p class="card-text">{{ $racer_image->性別 }}</p>
            </div>
        </div>

        <div class="card bg-secondary mb-3" >
            <div class="card-header">画像</div>
            <div class="card-body">
                @if($racer_image->画像名)
                    <img src="{{ config('const.IMAGE_PATH.RACER_IMAGE'). $racer_image->画像名 ."?" . date("YmdHis")}}">
                @endif
            </div>
        </div>

        
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/racer_image/'">一覧に戻る</button>
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/racer_image/edit/{{$racer_image->登番}}'">編集</button>
    </div>
    
@endsection