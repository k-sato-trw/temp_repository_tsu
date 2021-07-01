@extends('layouts.admin_layout')

@section('title', 'バナー編集')

@section('content')

    <h1>バナー編集 ID:{{ $banner->バナーID }}</h1>
    <div style="margin:40px 0;">
        <form method="post" enctype="multipart/form-data">
            
            <div class="card bg-secondary mb-3" >
                <div class="card-header">掲載開始日時</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="掲載開始日時" value="{{ old('掲載開始日時', $banner->掲載開始日時) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">掲載終了日時</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="掲載終了日時" value="{{ old('掲載終了日時', $banner->掲載終了日時) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">縦軸</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="縦軸" value="{{ old('縦軸', $banner->縦軸) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">横軸</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="横軸" value="{{ old('横軸', $banner->横軸) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">イメージURL</div>
                <div class="card-body">
                    <div style="margin-bottom: 10px;">
                        @if($banner->イメージURL)
                            <img src="{{ config('const.IMAGE_PATH.BANNER').$banner->イメージURL }}" style="max-height: 100px;max-width: 150px;">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="id_delete_イメージURL" name="delete_イメージURL" value="1" >
                                <label class="custom-control-label" for="id_delete_イメージURL">画像を削除する</label>
                            </div>
                        @endif
                    </div>
                    <input type="file" class="form-control-file" name="イメージURL" >
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">イメージの高さ</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="イメージの高さ" value="{{ old('イメージの高さ', $banner->イメージの高さ) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">イメージの幅</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="イメージの幅" value="{{ old('イメージの幅', $banner->イメージの幅) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">リンク先URL</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="リンク先URL" value="{{ old('リンク先URL', $banner->リンク先URL) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">別画面</div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="id_別画面" name="別画面" value="1" @if(old('別画面', $banner->別画面)) checked @endif >
                        <label class="custom-control-label" for="id_別画面">別画面</label>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">ALT</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="ALT" value="{{ old('ALT', $banner->ALT) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">担当者</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="担当者" value="{{ old('担当者', $banner->担当者) }}">
                </div>
            </div>

            
            <button type="button" class="btn btn-primary" onclick="location.href='/admin/banner/'">一覧に戻る</button>
            <button type="submit" class="btn btn-success">登録</button>
            @csrf
        </form>
    </div>
    
@endsection