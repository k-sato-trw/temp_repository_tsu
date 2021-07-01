@extends('layouts.admin_layout')

@section('title', 'インフォメーション詳細')

@inject('general', 'App\Services\GeneralService')

@section('content')
    <h1>インフォメーション詳細 ID:{{ $information->ID }}</h1>
    <div style="margin:40px 0;">
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">表示区分</div>
            <div class="card-body">
                <p class="card-text">{{ $general->information_type_label($information->TYPE) }}</p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">PC掲載フラグ</div>
            <div class="card-body">
                <p class="card-text">
                    @if($information->PC_APPEAR_FLG)
                        PC掲載
                    @else
                        PC非掲載
                    @endif    
                </p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">SP掲載フラグ</div>
            <div class="card-body">
                <p class="card-text">
                    @if($information->SP_APPEAR_FLG)
                        SP掲載
                    @else
                        SP非掲載
                    @endif    
                </p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">表示開始日</div>
            <div class="card-body">
                <p class="card-text">{{ $information->START_DATE }}</p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">表示終了日</div>
            <div class="card-body">
                <p class="card-text">{{ $information->END_DATE }}</p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">表示日付</div>
            <div class="card-body">
                <p class="card-text">{{ $information->VIEW_DATE }}</p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">タイトル</div>
            <div class="card-body">
                <p class="card-text">{{ $information->TITLE }}</p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">ヘッドラインタイトル</div>
            <div class="card-body">
                <p class="card-text">{{ $information->HEADLINE_TITLE }}</p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">ヘッドライン掲載フラグ</div>
            <div class="card-body">
                <p class="card-text">
                    @if($information->HEADLINE_FLG)
                        ヘッドライン掲載
                    @else
                        ヘッドライン非掲載
                    @endif    
                </p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">表示文</div>
            <div class="card-body">
                <p class="card-text">{!! $information->TEXT !!}</p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">PCリンクURL</div>
            <div class="card-body">
                <p class="card-text">{{ $information->PC_LINK }}</p>
            </div>
        </div>

        <div class="card bg-secondary mb-3">
            <div class="card-header">PCリンク方法</div>
            <div class="card-body">
                <p class="card-text">
                    @if($information->PC_LINK_WINDOW_FLG)
                        別画面
                    @else
                        通常
                    @endif    
                </p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">SPリンクURL</div>
            <div class="card-body">
                <p class="card-text">{{ $information->SP_LINK }}</p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">SPリンク方法</div>
            <div class="card-body">
                <p class="card-text">
                    @if($information->SP_LINK_WINDOW_FLG)
                        別画面
                    @else
                        通常
                    @endif    
                </p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">画像1</div>
            <div class="card-body">
                @if($information->IMAGE_1)
                    <img src="{{ config('const.IMAGE_PATH.INFORMATION'). $information->IMAGE_1 }}">
                @endif
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">画像1キャプション</div>
            <div class="card-body">
                <p class="card-text">{{ $information->IMAGE_1_CAPTION }}</p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">画像2</div>
            <div class="card-body">
                @if($information->IMAGE_2)
                    <img src="{{ config('const.IMAGE_PATH.INFORMATION'). $information->IMAGE_2 }}">
                @endif
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">画像2キャプション</div>
            <div class="card-body">
                <p class="card-text">{{ $information->IMAGE_2_CAPTION }}</p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">画像3</div>
            <div class="card-body">
                @if($information->IMAGE_3)
                    <img src="{{ config('const.IMAGE_PATH.INFORMATION'). $information->IMAGE_3 }}">
                @endif
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">画像3キャプション</div>
            <div class="card-body">
                <p class="card-text">{{ $information->IMAGE_3_CAPTION }}</p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">画像4</div>
            <div class="card-body">
                @if($information->IMAGE_4)
                    <img src="{{ config('const.IMAGE_PATH.INFORMATION'). $information->IMAGE_4 }}">
                @endif
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">画像4キャプション</div>
            <div class="card-body">
                <p class="card-text">{{ $information->IMAGE_4_CAPTION }}</p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">画像5</div>
            <div class="card-body">
                @if($information->IMAGE_5)
                    <img src="{{ config('const.IMAGE_PATH.INFORMATION'). $information->IMAGE_5 }}">
                @endif
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">画像5キャプション</div>
            <div class="card-body">
                <p class="card-text">{{ $information->IMAGE_5_CAPTION }}</p>
            </div>
        </div>
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">掲載フラグ</div>
            <div class="card-body">
                <p class="card-text">
                    @if($information->APPEAR_FLG)
                        掲載
                    @else
                        非掲載
                    @endif    
                </p>
            </div>
        </div>

        <div class="card bg-secondary mb-3">
            <div class="card-header">登録者</div>
            <div class="card-body">
                <p class="card-text">{{ $information->EDITOR_NAME }}</p>
            </div>
        </div>
        
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/information/'">一覧に戻る</button>
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/information/edit/{{$information->ID}}'">編集</button>
    </div>
    
@endsection