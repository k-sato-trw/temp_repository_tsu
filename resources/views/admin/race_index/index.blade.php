@extends('layouts.admin_layout')

@section('title', '津 レースインデックス登録ページ')

@section('content')
    <h1>津 レースインデックス登録ページ</h1>
    <div style="margin:40px 0;">
        
        
        <div class="card bg-secondary mb-3">
            <div class="card-header">絞り込み</div>
            <div class="card-body">
                <form>
                    {{ \Form::select('status', [1=>"終了していないレース",0=>"すべて"] , $status , ["class" => "form-control","style"=>"width:200px;  display:inline-block;"]) }}
                    <button type="submit" class="btn btn-success">検索</button>
                </form>
            </div>
        </div>
        
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/race_index/create'">新規作成</button>
        <div style="float:right;">全{{ $race_index->total() }}件　現在{{ $race_index->currentPage() }}ページ/全{{ $race_index->lastPage() }}ページ</div>

        <table class="table table-hover">
            <thead>
                <tr class="table-active">
                    <th>レース<br>期間</th>
                    <th style="width:200px;">レース名</th>
                    <th>URL指定有箇所</th>
                    <th style="background-color: #fcc"><span style="color:#900;">レース<br>展望</span><br>登録</th>
                    <th style="background-color: #fcc"><br>プレ<br>ビュー</th>
                    <th style="background-color: #fcc">書き<br>出し</th>
                    <th style="background-color: #fcc">作成済</th>
                    <th style="background-color: #ccf"><span style="color:#009;">出場<br>予定選手</span><br>登録</th>
                    <th style="background-color: #ccf"><br>プレ<br>ビュー</th>
                    <th style="background-color: #ccf">書き<br>出し</th>
                    <th style="background-color: #ccf">作成済</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach($race_index as $item)
                    <tr>
                        <td>
                            @if($item->START_DATE)
                            {{ date("Y/m/d",strtotime($item->START_DATE)) }}
                            @endif
                            <br>～
                            @if($item->END_DATE)
                            {{ date("Y/m/d",strtotime($item->END_DATE)) }}
                            @endif
                        </td>
                        <td>{{$item->RACE_TITLE}}</td>
                        <td>
                            {{$item->PC_SYUTUJO_URL}}
                            <br>
                            {{$item->SP_SYUTUJO_URL}}
                        </td>
                        
                        <td style="background-color: #fdd">
                            @isset($tenbo[$item->ID])
                                <a href="/admin/race_tenbo/edit/{{$item->ID}}">編集</a>
                            @else
                                <a href="/admin/race_tenbo/create/{{$item->ID}}">登録</a>
                            @endif
                        </td>
                        <td style="background-color: #fdd">
                            @isset($tenbo[$item->ID])
                                <a href='/admin/race_index/preview/tenbo/pc/{{$item->ID}}' target='_blank' >PC<br>
                                <a href='/admin/race_index/preview/tenbo/sp/{{$item->ID}}' target='_blank' >SP<br>
                                <a href='/admin/race_index/preview/tenbo/mb/{{$item->ID}}' target='_blank' >MB
                            @endif
                        </td>
                        <td style="background-color: #fdd">
                            @isset($tenbo[$item->ID])
                                <a href="/export/tenbo/?ID={{$item->ID}}" target="_blank">PC書出</a>
                                <br>
                                <a href="/export/sp/tenbo/?ID={{$item->ID}}" target="_blank">SP書出</a>
                                <br>
                                <a href="/export/mb/tenbo/?ID={{$item->ID}}" target="_blank">MB書出</a>
                            @endif
                            
                        </td>
                        <td style="background-color: #fdd">
                            {{--出力後ファイルの有無で判定--}}
                            @if(file_exists(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Tenbo/'.config('const.JYO_CODE').'/PC/t'.$item->ID.'.htm'))
                                <a href="/asp/htmlmade/Race/Tenbo/04/PC/t{{$item->ID}}.htm" target="_blank">PC</a>
                            @endif
                            <br>
                            @if(file_exists(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Tenbo/'.config('const.JYO_CODE').'/SP/t'.$item->ID.'.htm'))
                                <a href="/asp/htmlmade/Race/Tenbo/04/SP/t{{$item->ID}}.htm" target="_blank">SP</a>
                            @endif
                            <br>
                            @if(file_exists(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Tenbo/'.config('const.JYO_CODE').'/MB/t'.$item->ID.'.htm'))
                                <a href="/asp/htmlmade/Race/Tenbo/04/MB/t{{$item->ID}}.htm" target="_blank">SP</a>
                            @endif
                        </td>

                        <td style="background-color: #ddf">
                            @isset($syutujo_log[$item->ID])
                                @if($syutujo_log[$item->ID]->SUCCESS_FLG && $syutujo_log[$item->ID]->SUCCESS_FLG_SP && $syutujo_log[$item->ID]->SUCCESS_FLG_MB )
                                    <a href="/admin/syutujo_racer/view/{{$item->ID}}">編集</a><br>[書出済]
                                @else
                                    @if($syutujo_log[$item->ID]->FAILURE_TOUBAN)
                                        <a href="/admin/syutujo_racer/view/{{$item->ID}}">編集</a><br>[未書出]<br>[未データ選手:{{$syutujo_log[$item->ID]->FAILURE_TOUBAN}}]
                                    @else
                                        <a href="/admin/syutujo_racer/view/{{$item->ID}}">編集</a><br>[未書出]<br>[未データ無]
                                    @endif
                                @endif

                            @else
                                <a href="/admin/syutujo_racer/view/{{$item->ID}}">編集</a><br>[未書出]<br>[未実行]
                            @endif
                        </td>
                        <td style="background-color: #ddf">
                            {{-- プレビュー --}}
                            <a href='/admin/race_index/preview/syutujo/pc/{{$item->ID}}' target='_blank' >PC</a><br>
                            <a href='/admin/race_index/preview/syutujo/pc/{{$item->ID}}?toku' target='_blank' >PC特</a><br>
                            <a href='/admin/race_index/preview/syutujo/sp/{{$item->ID}}' target='_blank' >SP</a><br>
                            <a href='/admin/race_index/preview/syutujo/mb/{{$item->ID}}' target='_blank' >MB</a>
                        </td>
                        <td style="background-color: #ddf">
                            <a href="/export/syutujo/?ID={{$item->ID}}" target="_blank">PC書出</a>
                            <br>
                            <a href="/export/sp/syutujo/?ID={{$item->ID}}" target="_blank">SP書出</a>
                            <br>
                            <a href="/export/mb/syutujo/?ID={{$item->ID}}" target="_blank">MB書出</a>
                        </td>
                        <td style="background-color: #ddf">
                            {{-- ファイルの有り無しで書き出しソースの表示を判定 --}}
                            @if(file_exists(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Syutujo/'.config('const.JYO_CODE').'/PC/s'.$item->ID.'.htm'))
                                <a href="/asp/htmlmade/Race/Syutujo/04/PC/s{{$item->ID}}.htm" target="_blank">PC</a><br>
                                <a href="/asp/htmlmade/Race/Syutujo/04/PC/s{{$item->ID}}.htm?toku" target="_blank">PC特</a>
                            @endif
                            <br>
                            @if(file_exists(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Syutujo/'.config('const.JYO_CODE').'/SP/s'.$item->ID.'.htm'))
                                <a href="/asp/htmlmade/Race/Syutujo/04/SP/s{{$item->ID}}.htm" target="_blank">SP</a>
                            @endif
                            <br>
                            @if(file_exists(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Syutujo/'.config('const.JYO_CODE').'/MB/s'.$item->ID.'.htm'))
                                <a href="/asp/htmlmade/Race/Syutujo/04/MB/s{{$item->ID}}.htm" target="_blank">SP</a>
                            @endif
                        </td>

                        <td>
                            <a href="/admin/race_index/edit/{{$item->ID}}">編集</a>
                            <br>|<a href="javascript:void(0);" onClick="if(confirm('選択したレコードを削除します。よろしいですか?')){location.href='/admin/race_index/delete/{{$item->ID}}'}">削除</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </tr>
        </table>
    </div>
    
    {{ $race_index->appends(["status" => $status])->links() }}
    
@endsection