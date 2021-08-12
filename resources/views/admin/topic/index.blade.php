@extends('layouts.admin_layout')

@section('title', 'BR津 CMS TOPIC')

@section('content')
    <h1>BR津 CMS TOPIC</h1>
    <div style="margin:40px 0;">
        <form method="get" name="preview_form" action="/admin/topic/preview_pc" target="_blank">
            <div style="margin:20px 0;">
                プレビュー時間設定<input name="preDate" value="{{date('YmdHi')}}" >　|　
                <a href="javascript:document.preview_form.action='/admin/topic/preview_pc';document.preview_form.submit()" >PCプレビュー</a>　|　
                <a href="javascript:document.preview_form.action='/admin/topic/preview_sp';document.preview_form.submit()" >SPプレビュー</a>
            </div>
        </form>
        
        <div style="margin:20px 0;">
            <button type="button" class="btn btn-primary" onclick="display_change('pc_display')">PC現在表示</button>
            <button type="button" class="btn btn-primary" onclick="display_change('sp_display')">SP現在表示</button>
        </div>
        <div class="card bg-secondary mb-3" style="width:600px;" id="pc_display">
            PC表示
            <table  class="table table-hover">
                <tr>
                    <td>A</td>
                    <td>
                        1:
                        @isset($pc_appear_topic_array[1])
                            {{ date('Y/m/d',strtotime($pc_appear_topic_array[1]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$pc_appear_topic_array[1]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $pc_appear_topic_array[1]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        2:
                        @isset($pc_appear_topic_array[2])
                            {{ date('Y/m/d',strtotime($pc_appear_topic_array[2]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$pc_appear_topic_array[2]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $pc_appear_topic_array[2]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        3:
                        @isset($pc_appear_topic_array[3])
                            {{ date('Y/m/d',strtotime($pc_appear_topic_array[3]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$pc_appear_topic_array[3]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $pc_appear_topic_array[3]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                </tr>
                <tr>
                    <td>B</td>
                    <td>
                        4:
                        @isset($pc_appear_topic_array[4])
                            {{ date('Y/m/d',strtotime($pc_appear_topic_array[4]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$pc_appear_topic_array[4]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $pc_appear_topic_array[4]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        5:
                        @isset($pc_appear_topic_array[5])
                            {{ date('Y/m/d',strtotime($pc_appear_topic_array[5]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$pc_appear_topic_array[5]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $pc_appear_topic_array[5]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        6:
                        @isset($pc_appear_topic_array[6])
                            {{ date('Y/m/d',strtotime($pc_appear_topic_array[6]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$pc_appear_topic_array[6]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $pc_appear_topic_array[6]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                </tr>
                <tr>
                    <td>C</td>
                    <td>
                        7:
                        @isset($pc_appear_topic_array[7])
                            {{ date('Y/m/d',strtotime($pc_appear_topic_array[7]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$pc_appear_topic_array[7]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $pc_appear_topic_array[7]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        8:
                        @isset($pc_appear_topic_array[8])
                            {{ date('Y/m/d',strtotime($pc_appear_topic_array[8]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$pc_appear_topic_array[8]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $pc_appear_topic_array[8]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        9:
                        @isset($pc_appear_topic_array[9])
                            {{ date('Y/m/d',strtotime($pc_appear_topic_array[9]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$pc_appear_topic_array[9]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $pc_appear_topic_array[9]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                </tr>
                <tr>
                    <td>D</td>
                    <td>
                        10:
                        @isset($pc_appear_topic_array[10])
                            {{ date('Y/m/d',strtotime($pc_appear_topic_array[10]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$pc_appear_topic_array[10]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $pc_appear_topic_array[10]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        11:
                        @isset($pc_appear_topic_array[11])
                            {{ date('Y/m/d',strtotime($pc_appear_topic_array[11]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$pc_appear_topic_array[11]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $pc_appear_topic_array[11]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        12:
                        @isset($pc_appear_topic_array[12])
                            {{ date('Y/m/d',strtotime($pc_appear_topic_array[12]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$pc_appear_topic_array[12]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $pc_appear_topic_array[12]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                </tr>
                <tr>
                    <td>E</td>
                    <td>
                        13:
                        @isset($pc_appear_topic_array[13])
                            {{ date('Y/m/d',strtotime($pc_appear_topic_array[13]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$pc_appear_topic_array[13]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $pc_appear_topic_array[13]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        14:
                        @isset($pc_appear_topic_array[14])
                            {{ date('Y/m/d',strtotime($pc_appear_topic_array[14]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$pc_appear_topic_array[14]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $pc_appear_topic_array[14]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        15:
                        @isset($pc_appear_topic_array[15])
                            {{ date('Y/m/d',strtotime($pc_appear_topic_array[15]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$pc_appear_topic_array[15]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $pc_appear_topic_array[15]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                </tr>
            </table>
        </div>

        
        <div class="card bg-secondary mb-3" style="width:600px;" id="sp_display">
            SP表示
            <table  class="table table-hover">
                <tr>
                    <td>A</td>
                    <td>
                        1:
                        @isset($sp_appear_topic_array[1])
                            {{ date('Y/m/d',strtotime($sp_appear_topic_array[1]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$sp_appear_topic_array[1]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $sp_appear_topic_array[1]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        2:
                        @isset($sp_appear_topic_array[2])
                            {{ date('Y/m/d',strtotime($sp_appear_topic_array[2]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$sp_appear_topic_array[2]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $sp_appear_topic_array[2]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        3:
                        @isset($sp_appear_topic_array[3])
                            {{ date('Y/m/d',strtotime($sp_appear_topic_array[3]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$sp_appear_topic_array[3]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $sp_appear_topic_array[3]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                </tr>
                <tr>
                    <td>B</td>
                    <td>
                        4:
                        @isset($sp_appear_topic_array[4])
                            {{ date('Y/m/d',strtotime($sp_appear_topic_array[4]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$sp_appear_topic_array[4]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $sp_appear_topic_array[4]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        5:
                        @isset($sp_appear_topic_array[5])
                            {{ date('Y/m/d',strtotime($sp_appear_topic_array[5]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$sp_appear_topic_array[5]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $sp_appear_topic_array[5]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        6:
                        @isset($sp_appear_topic_array[6])
                            {{ date('Y/m/d',strtotime($sp_appear_topic_array[6]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$sp_appear_topic_array[6]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $sp_appear_topic_array[6]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                </tr>
                <tr>
                    <td>C</td>
                    <td>
                        7:
                        @isset($sp_appear_topic_array[7])
                            {{ date('Y/m/d',strtotime($sp_appear_topic_array[7]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$sp_appear_topic_array[7]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $sp_appear_topic_array[7]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        8:
                        @isset($sp_appear_topic_array[8])
                            {{ date('Y/m/d',strtotime($sp_appear_topic_array[8]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$sp_appear_topic_array[8]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $sp_appear_topic_array[8]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        9:
                        @isset($sp_appear_topic_array[9])
                            {{ date('Y/m/d',strtotime($sp_appear_topic_array[9]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$sp_appear_topic_array[9]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $sp_appear_topic_array[9]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                </tr>
                <tr>
                    <td>D</td>
                    <td>
                        10:
                        @isset($sp_appear_topic_array[10])
                            {{ date('Y/m/d',strtotime($sp_appear_topic_array[10]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$sp_appear_topic_array[10]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $sp_appear_topic_array[10]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        11:
                            </a>
                        @isset($sp_appear_topic_array[11])
                            {{ date('Y/m/d',strtotime($sp_appear_topic_array[11]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$sp_appear_topic_array[11]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $sp_appear_topic_array[11]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        12:
                        @isset($sp_appear_topic_array[12])
                            {{ date('Y/m/d',strtotime($sp_appear_topic_array[12]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$sp_appear_topic_array[12]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $sp_appear_topic_array[12]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                </tr>
                <tr>
                    <td>E</td>
                    <td>
                        13:
                        @isset($sp_appear_topic_array[13])
                            {{ date('Y/m/d',strtotime($sp_appear_topic_array[13]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$sp_appear_topic_array[13]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $sp_appear_topic_array[13]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        14:
                        @isset($sp_appear_topic_array[14])
                            {{ date('Y/m/d',strtotime($sp_appear_topic_array[14]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$sp_appear_topic_array[14]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $sp_appear_topic_array[14]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        15:
                        @isset($sp_appear_topic_array[15])
                            {{ date('Y/m/d',strtotime($sp_appear_topic_array[15]->END_DATE)) }}　掲載終了<br>
                            <a href="/admin/topic/edit/{{$sp_appear_topic_array[15]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $sp_appear_topic_array[15]->IMAGE }}" width="160" >
                            </a>
                        @else
                            ---<br>
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                </tr>
            </table>
        </div>

        <div class="card bg-secondary mb-3" style="width:600px;">
            予備
            <table  class="table table-hover">
                <tr>
                    <td> </td>
                    <td>
                        16:
                        @isset($yobi_topic_array[16])
                            <a href="/admin/topic/edit/{{$yobi_topic_array[16]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $yobi_topic_array[16]->IMAGE }}" width="160" >
                            </a>
                        @else
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        17:
                        @isset($yobi_topic_array[17])
                            <a href="/admin/topic/edit/{{$yobi_topic_array[17]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $yobi_topic_array[17]->IMAGE }}" width="160" >
                            </a>
                        @else
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                    <td>
                        18:
                        @isset($yobi_topic_array[18])
                            <a href="/admin/topic/edit/{{$yobi_topic_array[18]->ID}}">
                                <img src="{{ config('const.IMAGE_PATH.TOPIC') . $yobi_topic_array[18]->IMAGE }}" width="160" >
                            </a>
                        @else
                            <div style="width:160px;height:75px;background-color:#ddd;"></div>
                        @endisset
                    </td>
                </tr>
            </table>
        </div>

        <button type="button" class="btn btn-primary" onclick="location.href='/admin/topic/create'">新規作成</button>
        
        <div style="float:right;">全{{ $topic->total() }}件　現在{{ $topic->currentPage() }}ページ/全{{ $topic->lastPage() }}ページ</div>

        <table class="table table-hover">
            <thead>
                <tr class="table-active">
                    <th>表示位置</th>
                    <th>表示期間</th>
                    <th>デバイス</th>
                    <th>リンクURL</th>
                    <th>画像</th>
                    <th>URL</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topic as $item)
                    <tr>
                        <td>{{ $item->VIEW_POINT }}</td>
                        <td>
                            @if($item->START_DATE)
                            {{ date("Y/m/d H:i",strtotime($item->START_DATE)) }}
                            @endif
                            <br>～
                            @if($item->END_DATE)
                            {{ date("Y/m/d H:i",strtotime($item->END_DATE)) }}
                            @endif
                        </td>
                        <td>
                            @if($item->PC_APPEAR_FLG)
                                PC表示
                            @endif
                            <br>
                            @if($item->SP_APPEAR_FLG)
                                SP表示
                            @endif
                        </td>
                        <td><div>PC:{{$item->PC_URL}}</div><div>SP:{{$item->SP_URL}}</div></td>
                        <td><img src="{{ config('const.IMAGE_PATH.TOPIC') . $item->IMAGE }}" width="160" ></td>
                        <td>
                            <a href="/admin/topic/edit/{{$item->ID}}">編集</a>
                            |
                            <a href="javascript:void(0);" onClick="if(confirm('選択したレコードを削除します。よろしいですか?')){location.href='/admin/topic/delete/{{$item->ID}}'}">削除</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </tr>
        </table>
    </div>
    
    {{ $topic->appends([])->links() }}
    
@endsection

@section('script')
<script>
    function display_change(id){
        $('#pc_display,#sp_display').hide();
        $('#' + id).show();
    }

    $('#sp_display').hide();
</script>
@endsection