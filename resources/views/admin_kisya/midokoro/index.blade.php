@extends('layouts.admin_kisya_layout')

@section('title', '見どころ')

@inject('general', 'App\Services\GeneralService')

@section('css')
    <link href="/cms/css/reset.css" rel="stylesheet" type="text/css">
    <link href="/cms/css/cms.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
    <!-- 用意されているclassだけでは足りないので文字色の異なるclassを用意 -->
    <style type="text/css">
        .fm_photo2 {
            font-size: 16px;
            width: 100px;
            border: 3px solid #BBB;
            background: #FFFFD7;	
            padding: 5px;
            color: #000;
        }
    </style>
@endsection

@section('content')
    <form name="form" method="post" action="/admin_kisya/midokoro/upsert">
        <div id="wrapper">
            @if(!$highlight)
                <div class="new_tit" >新規入力</div><!--/#new_tit-->
            @else
                @if($highlight->APPEAR_FLG)
                    <div class="open_tit">公開中</div><!--/#open_tit-->
                @else
                    <div class="save_tit">保存中</div>
                @endif
            @endif

            <div id="header2">
            <div id="day">
                <span class="day_tit">日<br>程</span>
                <select id="day_select" name="TARGET_DATE" onChange="location.href='/admin_kisya/midokoro?yd='+$(this).val()">
                    @foreach($kaisai_date_list as $key => $item)
                        <option value="{{$key}}" @if($target_date == $key) selected @endif>{{$item}}（{{date('n/j',strtotime($key))}}）</option>
                    @endforeach
                </select>
            </div><!--/#day-->
            <div id="race_name">
            <span class="race_n_tit">対象開催</span>
            <span class="race_n">{{ $kaisai_master->開催名称 }}</span>

            </div><!--/#race_name-->
            <div class="clear"></div>
            </div><!--/#header2-->





            <!--▼▼▼本文▼▼▼-->
            <div id="midokoro">

            <div id="midokoro_l">

            <div class="hyodai"><h2>【見出し】</h2></div><div class="letters"><span id="count1">現在0字</span><span>（最大表示25字）</span></div>
            <div class="clear"></div>

            <textarea name="HEAD" onfocus="funcForcus();" id="memo1" class="fm_head" onKeyUp="funcTextCount( '1' );" maxlength="100">{{ old('HEAD',$highlight->HEAD ?? "") }}</textarea>


            <p>
            <div class="hyodai"><h2>【本文】</h2></div><div class="letters"><span id="count2">現在0字</span><span>（最大表示500字）</span></div>
            <div class="clear"></div>
            <textarea name="TEXT" onfocus="funcForcus();" id="memo2" rows="16" class="fm_text" onKeyUp="funcTextCount( '2' );" maxlength="2000">{{ old('TEXT',$highlight->TEXT ?? "") }}</textarea>
            </p>

            </div><!--/#midokoro_l-->

            <div id="midokoro_r">
            <h2>【写真掲載選手】</h2>
            <div id="photo">
            <ul>
            <li>1）<input type="text" name="TOUBAN1" id="TOUBAN1" class="fm_photo" onfocus="funcForcus();funcOnCursol( '1' );" onblur="funcOnBlur( '1' );" maxlength="4" value="{{ old('TOUBAN1',$highlight->TOUBAN1 ?? "" ) }}" placeholder="登 番">
            <div class="no_p" id="no_p1"></div>
            </li>
            <li>2）<input type="text" name="TOUBAN2" id="TOUBAN2" class="fm_photo" onfocus="funcForcus();funcOnCursol( '2' );" onblur="funcOnBlur( '2' );" maxlength="4" value="{{ old('TOUBAN2',$highlight->TOUBAN2 ?? "") }}" placeholder="登 番">
            <div class="no_p" id="no_p2"></div>
            </li>
            <li>3）<input type="text" name="TOUBAN3" id="TOUBAN3" class="fm_photo" onfocus="funcForcus();funcOnCursol( '3' );" onblur="funcOnBlur( '3' );" maxlength="4" value="{{ old('TOUBAN3',$highlight->TOUBAN3 ?? "") }}" placeholder="登 番">
            <div class="no_p" id="no_p3"></div>
            </li>
            <li>4）<input type="text" name="TOUBAN4" id="TOUBAN4" class="fm_photo" onfocus="funcForcus();funcOnCursol( '4' );" onblur="funcOnBlur( '4' );" maxlength="4" value="{{ old('TOUBAN4',$highlight->TOUBAN4 ?? "") }}" placeholder="登 番">
            <div class="no_p" id="no_p4"></div>
            </li>
            </ul>
            <div class="clear"></div>
            </div><!--/#photo-->

            </div><!--/#midokoro_r-->
            <div class="clear"></div>
            </div><!--/#midokoro-->


        </div><!--/#wrapper-->

        <input type="hidden" name="APPEAR_FLG" value="0">
        @csrf
    </form>

<!--▼▼▼フッター▼▼▼-->
<div id="footer">

<div id="footer_in">
<div id="footer_in_l">
<ul>
<li class="save"><input type="button" onClick="document.form.submit()" value="保存"></li>
<li class="preview">プレビュー</li>
<li class="pv_b"><a href="/admin_kisya/midokoro/preview_pc?yd={{$target_date}}" target="_blank">PC</a></li>
<li class="pv_b"><a href="/admin_kisya/midokoro/preview_sp?yd={{$target_date}}" target="_blank">スマホ</a></li>
<div class="clear"></div>
</ul>
</div><!--/#fotter_in_l-->

<div id="footer_in_r">

<div id="action_c">
<span class="open_b"><input type="button" onClick="location.href='/admin_kisya/midokoro/change_appear_flg?TARGET_DATE={{$target_date}}&APPEAR_FLG=1'" value="公開"></span>
<span class="close_b"><input type="button" onClick="location.href='/admin_kisya/midokoro/change_appear_flg?TARGET_DATE={{$target_date}}&APPEAR_FLG=0'" value="非公開"></span>
<div class="clear"></div>
</div><!--/#action_c-->



<div class="clear"></div>
</div><!--/#fotter_in_r-->

<div class="clear"></div>
</div><!--/#fotter_in-->

</div><!--/#footer-->
@endsection


@section('script')
    <script type="text/javascript">
        var boolCursorFlg = false;
        function funcForcus(){
            boolCursorFlg = true; 
        }
        function funcLink( argURL , argPage ){
            if( boolCursorFlg ){ 
                if( window.confirm( 'データは保存されていません。\n保存して移動しますか？' ) ){
                    document.form.action = 'yoso4_execute.asp?ret=' + argPage;
                    funcSave( '0' );
                }else{
                    document.location.href= argURL;
                }
            }else{
                document.location.href= argURL;
            }	
        }
            function funcOnCursol( argNum ){
                if( document.getElementById( "TOUBAN" + argNum ).value == '登 番' ){
                // 初期値の場合
                    // 入力値を空にする
                    document.getElementById( "TOUBAN" + argNum ).value = '';
                }
                // クラスを変更
                document.getElementById( "TOUBAN" + argNum ).className = 'fm_photo2';
            }
            function funcOnBlur( argNum ){
                if( document.getElementById( "TOUBAN" + argNum ).value == '' ){
                // 値が空の場合初期値に戻す
                    document.getElementById( "TOUBAN" + argNum ).value = '登 番';
                    document.getElementById( "TOUBAN" + argNum ).className = 'fm_photo';
                }else if( document.getElementById( "TOUBAN" + argNum ).value == '登 番' ){
                // 値に変更がない場合、クラスを初期に戻す
                    document.getElementById( "TOUBAN" + argNum ).className = 'fm_photo';
                }
                if( document.getElementById( "TOUBAN" + argNum ).value.length == 4 && int( document.getElementById( "TOUBAN" + argNum ).value ) ){
                // 入力データ選手が存在するか確認
                    // 入力データが正しいフォーマットの場合、画像検索実行
                    funcSearchImage( ( "touban_serch.asp?touban=" + document.getElementById( "TOUBAN" + argNum ).value ) , argNum )
                }else{
                    if( document.getElementById( "TOUBAN" + argNum ).value == '登 番' ){
                    // 初期値の場合から文字格納
                        document.getElementById( "no_p" + argNum ).innerHTML = '';
                    }else{
                    // 初期値以外で正しいフォーマット外のとき
                        document.getElementById( "no_p" + argNum ).innerHTML = '写真が登録されていません。';
                    }
                }
            }
            //数値チェック
            function int(str)
            {
                var intjudge = false;
                if(str.match(/^[0-9]*$/) != "" && str.match(/^[0-9]*$/) != null)
                {
                    intjudge = true;
                }
                return intjudge;
            }
        
        
            function funcSearchImage( fileName , argNum ) {
                var obj = createRequest(); //非同期通信オブジェクトの生成
                if (obj) {
                    //通信実行
                    obj.open('get',fileName);
                    obj.onreadystatechange = function() {
                        //通信完了
                        if (obj.readyState == 4 && obj.status == 200) {
                        //読込後の処理
                            if( obj.responseText != 'False' ){
                            // データが存在する場合
                                document.getElementById( "no_p" + argNum ).innerHTML = '';
                            }else{
                            // データが無い場合
                                document.getElementById( "no_p" + argNum ).innerHTML = '写真が登録されていません。';
                            }
                        }
                    }
                    obj.send(null);
                }
            }
            
            //非同期通信オブジェクトの生成
            function createRequest() {
                try {
                    return new XMLHttpRequest();
                } catch (e) {
                    try {
                        return new ActiveXObject('Microsoft.XMLHTTP');
                    } catch (e) {
                        return null;
                    }
                }
                return null;
            }
        function funcTextCount( argNum ){
            var strHTML = '';
            var intMaxCount = 0;
            if( argNum == '1' ){
                intMaxCount = 25;
            }else{
                intMaxCount = 500;
            }
            if( document.getElementById( 'memo' + argNum ).value.length > intMaxCount ){
                strHTML = '<font color="#FF0000">現在' + document.getElementById( 'memo' + argNum ).value.length +'字</font>';
            }else{
                strHTML = '現在' + document.getElementById( 'memo' + argNum ).value.length + '字';
            }
            document.getElementById( 'count' + argNum ).innerHTML = strHTML;
        }
        function funcChangeDate( ){
            document.form.action='yoso4.asp?yd=' + document.form.TARGET_DATE.value;
            document.form.submit()
        }
        function funcSave( argNum ){
            var boolJudge = true;
            var strMessage = '';
            if( argNum == "0" ){
            // 保存時何もしない
            }else if( argNum == "1" ){
            // 公開ボタン押したとき
                document.form.APPEAR_FLG.value = '1'
            }else if( argNum == "2" ){
            // 非公開ボタン押したとき
                document.form.APPEAR_FLG.value = '0'
            }
            if( document.form.TOUBAN1.value == '登 番' ){
                document.form.TOUBAN1.value = '';
            }
            if( document.form.TOUBAN2.value == '登 番' ){
                document.form.TOUBAN2.value = '';
            }
            if( document.form.TOUBAN3.value == '登 番' ){
                document.form.TOUBAN3.value = '';
            }
            if( document.form.TOUBAN4.value == '登 番' ){
                document.form.TOUBAN4.value = '';
            }
            if( document.form.TOUBAN1.value !== '' ){
                if( int( document.form.TOUBAN1.value ) == false || document.form.TOUBAN1.value.length !== 4 ){
                    strMessage = strMessage + '【写真掲載選手】1は数字4桁で入力してください\n'
                    boolJudge = false;
                }
            }
            if( document.form.TOUBAN2.value !== '' ){
                if( int( document.form.TOUBAN2.value ) == false || document.form.TOUBAN2.value.length !== 4 ){
                    strMessage = strMessage + '【写真掲載選手】2は数字4桁で入力してください\n'
                    boolJudge = false;
                }
            }
            if( document.form.TOUBAN3.value !== '' ){
                if( int( document.form.TOUBAN3.value ) == false || document.form.TOUBAN3.value.length !== 4 ){
                    strMessage = strMessage + '【写真掲載選手】3は数字4桁で入力してください\n'
                    boolJudge = false;
                }
            }
            if( document.form.TOUBAN4.value !== '' ){
                if( int( document.form.TOUBAN4.value ) == false || document.form.TOUBAN4.value.length !== 4 ){
                    strMessage = strMessage + '【写真掲載選手】4は数字4桁で入力してください\n'
                    boolJudge = false;
                }
            }
            if( boolJudge ){
                document.form.submit()
            }else{
                document.form.action = 'yoso4_execute.asp';
                alert( strMessage );
            }
        }
        // 数値チェック
        function int(str){
            var intjudge = false;
            if(str.match(/^[0-9]*$/) != '' && str.match(/^[0-9]*$/) != null)
            {
                intjudge = true;
            }
            return intjudge;
        }
        function funcLoad( ){
            funcTextCount('1');
            funcTextCount('2');
            funcOnCursol('1');
            funcOnCursol('2');
            funcOnCursol('3');
            funcOnCursol('4');
            funcOnBlur('1');
            funcOnBlur('2');
            funcOnBlur('3');
            funcOnBlur('4');
        }

        funcLoad();
    </script>
@endsection