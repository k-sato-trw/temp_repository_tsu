@extends('layouts.admin_layout')

@section('title', '津 出場予定選手登録ページ')

@section('content')
    <h1>津 出場予定選手登録ページ</h1>
    <h2>{{ $race_index->RACE_TITLE }}</h2>
    <div style="margin:40px 0;">

        <div class="card bg-secondary mb-3" style="width: 35%; float:left;">
            <div class="card-header">備考設定</div>
            <div class="card-body">
                <form method="POST" action="/admin/syutujo_racer/upsert_syutujo/{{ $race_index->ID }}">
                    <div style="margin:10px;">
                        備考:<textarea class="form-control " name="REMARKS" rows="3">{{ old('REMARKS', ($race_syutujo->REMARKS ?? '')) }}</textarea>
                    </div>
                    <div style="margin:10px;">
                        担当者:<input type="text" class="form-control " name="EDITOR_NAME" value="{{ old('EDITOR_NAME' ,($race_syutujo->EDITOR_NAME ?? '')) }}">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success">登録</button>
                        @csrf
                    </div>
                </form>
            </div>
        </div>
        <div style="clear: both; margin-bottom: 50px;"></div>

        <button type="button" class="btn btn-primary" onclick="location.href='/admin/syutujo_racer/create/{{ $race_index->ID }}'">新規作成</button>
        
        <table class="table table-hover">
            <thead>
                <tr class="table-active">
                    <th>登番</th>
                    <th>選手名</th>
                    <th>掲載フラグ</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach($touban_list as $item)
                    <tr>
                        <td>{{$item}}</td>
                        <td>{{$fandata_name_list[$item] ?? "登録データなし" }}</td>
                        <td>
                            @isset($syutujo_racer_array[$item])
                                @if ($syutujo_racer_array[$item]->APPEAR_FLG)
                                    掲載
                                @else
                                    非掲載
                                @endif
                            @else
                                掲載
                            @endisset
                        </td>
                        <td>
                            @isset($syutujo_racer_array[$item])
                                <a href="/admin/syutujo_racer/edit/{{$id}}/{{$item}}">編集(データ有)</a>|
                                <a href="javascript:void(0);" onClick="if(confirm('選択したレコードを削除します。よろしいですか?')){location.href='/admin/syutujo_racer/delete/{{$id}}/{{$item}}'}">削除</a>
                            @else
                                <a href="/admin/syutujo_racer/create/{{$id}}?touban={{$item}}">編集(データ無)</a>
                            @endisset
                            
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
            </tr>
        </table>
    </div>
    
@endsection