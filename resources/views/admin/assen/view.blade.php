@extends('layouts.admin_layout')

@section('title', '選手管理')

@inject('general', 'App\Services\GeneralService')

@section('content')
<h1>選手管理 登録番号:{{ $fandata->Touban ?? '' }}</h1>
<div style="margin:40px 0;">

    <div class="card bg-secondary mb-3">
        <div class="card-body">
            <p class="card-text"><img src="/06meikan/racer_img/{{ $touban }}.jpg" width="188" height="226" ></p>
        </div>
    </div>
    
    <div class="card bg-secondary mb-3">
        <div class="card-header">登録番号</div>
        <div class="card-body">
            <p class="card-text">{{ $touban }}</p>
        </div>
    </div>
    
    <div class="card bg-secondary mb-3">
        <div class="card-header">選手名</div>
        <div class="card-body">
            <p class="card-text">{{ $fandata->NameK ?? '' }}</p>
        </div>
    </div>

    <div class="card bg-secondary mb-3">
        <div class="card-header">級別</div>
        <div class="card-body">
            <p class="card-text">{{ $fandata->Kyu ?? '' }}</p>
        </div>
    </div>

    <button type="button" class="btn btn-primary" onclick="location.href='/admin/assen/create_assen/{{ $touban }}'">新規作成</button>
    <table class="table table-hover">
        <thead>
            <tr class="table-active">
                <th>開催日程</th>
                <th>場</th>
                <th>タイトル</th>
                <th>編集</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assen as $item)
                <tr>
                    <td>{{ $item['start_date'] }}
                        ～{{ $item['end_date'] }}
                    </td>
                    <td>{{ $general->jyocode_to_jyoname($item['jyo']) }}</td>
                    <td>{{ $item['title'] }}</td>
                    <td>
                        @if($item['id'])
                        <a href="/admin/assen/edit/{{ $item['id']}}">編集</a>
                        |
                        <a href="javascript:void(0);" onClick="if(confirm('選択したレコードを削除します。よろしいですか?')){location.href='/admin/assen/delete_assen/{{$item['id']}}'}">削除</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        </tr>
    </table>
    
    <button type="button" class="btn btn-primary" onclick="location.href='/admin/assen/'">一覧に戻る</button>
</div>
    
@endsection