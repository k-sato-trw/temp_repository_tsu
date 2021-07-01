@extends('layouts.admin_layout')

@section('title', 'バナー詳細')

@section('content')
    <h1>バナー詳細 ID:{{ $banner->バナーID }}</h1>
    <div style="margin:40px 0;">
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">表示開始日</div>
            <div class="card-body">
                <p class="card-text">{{ $banner->掲載開始日時 }}</p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">表示終了日</div>
            <div class="card-body">
                <p class="card-text">{{ $banner->掲載終了日時 }}</p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">画像</div>
            <div class="card-body">
                <p class="card-text"><img src="{{ config('const.IMAGE_PATH.BANNER') .$banner->イメージURL }}"></p>
            </div>
        </div>

        <div class="card bg-secondary mb-3">
            <div class="card-header">URL</div>
            <div class="card-body">
                <p class="card-text">{{ $banner->リンク先URL }}</p>
            </div>
        </div>

        <div class="card bg-secondary mb-3">
            <div class="card-header">別画面フラグ</div>
            <div class="card-body">
                <p class="card-text">
                    @if($banner->別画面)
                        別画面
                    @else
                        通常
                    @endif        
                </p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">表示順番</div>
            <div class="card-body">
                <p class="card-text">{{ $banner->SORT }}</p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">登録者</div>
            <div class="card-body">
                <p class="card-text">{{ $banner->担当者 }}</p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">掲載フラグ</div>
            <div class="card-body">
                <p class="card-text">
                    @if($banner->APPEAR_FLG)
                        掲載
                    @else
                        非掲載
                    @endif    
                </p>
            </div>
        </div>
        
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/banner/'">一覧に戻る</button>
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/banner/edit/{{$banner->バナーID}}'">編集</button>
    </div>
    
@endsection