@extends('layouts.admin_kisya_layout')

@section('title', 'メッセージ表示')

@inject('general', 'App\Services\GeneralService')

@section('css')
    <link href="/cms/css/reset.css" rel="stylesheet" type="text/css">
    <link href="/cms/css/cms.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
@endsection

@section('content')
    <form name="form" method="post" action="">
    <div id="wrapper">
    @if($message->APPEAR_FLG)
        <div class="open_tit">公開中</div><!--/#open_tit-->        
    @else
        <div class="save_tit">保存中</div><!--/#save_tit-->
    @endif

    <input type="button" value="ALLクリア" class="fm_deashi_yoso_pd_bt fm_all_clear" onClick="funcReload();">

    <div class="clear"></div>


    <!--▼▼▼本文▼▼▼-->

    <div id="msg">
    <div id="msg_l">
    <h2>【掲載<span class="msg_time">開始</span>時間】</h2>
    </div><!--/#msg_l-->

    <div id="msg_r">
    <input type="text" onfocus="funcForcus();" name="START_DATE" value="{{old('START_DATE',$message->START_DATE)}}" maxlength="12" class="fm_date" onBlur="funcStartDate();">
    <span class="date01" id="date01">　</span>
    </div><!--/#msg_r-->
    <div class="clear"></div>
    </div><!--/#msg-->

    <div id="msg">
    <div id="msg_l">
    <h2>【掲載<span class="msg_time">終了</span>時間】</h2>
    </div><!--/#msg_l-->

    <div id="msg_r">
    <input type="text" onfocus="funcForcus();" name="END_DATE" value="{{old('END_DATE',$message->END_DATE)}}" maxlength="12" class="fm_date" onBlur="funcEndDate();">
    <span class="date01" id="date02">　</span>
    </div><!--/#msg_l-->
    <div class="clear"></div>
    </div><!--/#msg-->


    <div id="msg">
    <div id="msg_l"><h2>【メッセージ本文】</h2>



    <div id="msg_cb01">
    <p>テキスト<br>サンプルNo.</p>
    <input type="text" onfocus="funcForcus();" name="SAMPLE1" value="{{old('SAMPLE1',$message->SAMPLE1)}}" class="fm_txno" onKeyUp="funcSample('1');"><br>+<br>
    <input type="text" onfocus="funcForcus();" name="SAMPLE2" value="{{old('SAMPLE2',$message->SAMPLE2)}}" class="fm_txno" onKeyUp="funcSample('2');"><br>+<br>
    <input type="text" onfocus="funcForcus();" name="SAMPLE3" value="{{old('SAMPLE3',$message->SAMPLE3)}}" class="fm_txno" onKeyUp="funcSample('3');"><br>

    </div><!--/#msg_cb01-->

    </div><!--/#msg_l-->

    <div id="msg_r">

    <div class="letters"><span id="count">現在0字</span><span>（最大表示70字）</span></div>

    <textarea rows="6" onfocus="funcForcus();" class="fm_msg" type="text" name="COMMENT" onKeyUp="funcTextCount();" maxlength="70">{{ old('COMMENT',$message->COMMENT) }}
    </textarea>
    <p>
    <span class="sample_tx">【テキストサンプル】</span>

    1）本日第●レースより<span class="hl">安定板</span>を使用しています。<br>
    2）本日第●レースより<span class="hl">展示航走は「1周」</span>、<span class="hl">レース周回は「2周」</span>となりました。<br>
    3）本日第●レースより<span class="hl">予備ピット</span>を使用しています。<br>
    </p>
    </div><!--/#msg_r-->
    <div class="clear"></div>
    </div><!--/#msg-->

    <div id="msg">
    <div id="msg_l"><h2>【表示デバイス】</h2></div><!--/#msg_l-->

    <div id="msg_r">
        PC<label @if($message->PC_APPEAR_FLG)class="c_on"@endif>
            <input onfocus="funcForcus();" type="checkbox" name="PC_APPEAR_FLG" value="1" @if(old('PC_APPEAR_FLG',$message->PC_APPEAR_FLG)) checked @endif>
        </label>
        スマホ<label  @if($message->SP_APPEAR_FLG)class="c_on"@endif>
            <input onfocus="funcForcus();" type="checkbox" name="SP_APPEAR_FLG" value="1" @if(old('SP_APPEAR_FLG',$message->SP_APPEAR_FLG)) checked @endif>
        </label>
        {{--
        携帯<label class="c_on">
            <input onfocus="funcForcus();" type="checkbox" name="MB_APPEAR_FLG" value="1" @if($message->MB_APPEAR_FLG) checked @endif>
        </label>--}}
    </div><!--/#msg_r-->
    <div class="clear"></div>
    </div><!--/#msg-->


    </div><!--/#wrapper-->
    @csrf
    </form>

    <!--▼▼▼フッター▼▼▼-->
    <div id="footer">

    <div id="footer_in">
    <div id="footer_in_l">
    <ul>
    <li class="save"><input type="button" onClick="document.form.submit()" value="保存"></li>
    <li class="preview">プレビュー</li>
    <li class="pv_b"><a href="/admin_kisya/message/preview_pc" target="_blank">PC</a></li>
    <li class="pv_b"><a href="/admin_kisya/message/preview_sp" target="_blank">スマホ</a></li>
    {{--<li class="pv_b"><a href="/k/index.asp?preview=1" target="_blank">携帯</a></li>--}}
    <div class="clear"></div>
    </ul>
    </div><!--/#fotter_in_l-->

    <div id="footer_in_r">

    <div id="action_c">
    <span class="open_b"><input type="button" onClick="location.href='/admin_kisya/message/change_appear_flg?APPEAR_FLG=1'" value="公開"></span>
    <span class="close_b"><input type="button" onClick="location.href='/admin_kisya/message/change_appear_flg?APPEAR_FLG=0'" value="非公開"></span>
    <div class="clear"></div>
    </div><!--/#action_c-->



    <div class="clear"></div>
    </div><!--/#fotter_in_r-->

    <div class="clear"></div>
    </div><!--/#fotter_in-->

    </div><!--/#footer-->

@endsection


@section('script')
    <script type="text/javascript" src="/cms/js/jquery-1.8.2.min.js"></script>

    <script type="text/javascript" src="/cms/js/jquery.checkbox.js"></script>
    <script type="text/javascript">
        var boolCursorFlg = false;
        function funcForcus(){
            boolCursorFlg = true; 
        }
        function funcLink( argURL , argPage ){
            if( boolCursorFlg ){ 
                if( window.confirm( 'データは保存されていません。\n保存して移動しますか？' ) ){
                    document.form.action = 'yoso5_execute.asp?ret=' + argPage;
                    funcSave( '0' );
                }else{
                    document.location.href= argURL;
                }
            }else{
                document.location.href= argURL;
            }	
        }
        function funcTextCount( ){
            var strHTML = '';
            var intMaxCount = 0;
            strHTML = '現在' + document.form.COMMENT.value.length +'字';
            document.getElementById( 'count' ).innerHTML = strHTML;
        }
        function funcStartDate(){
            if( document.form.START_DATE.value !== '' ){
                document.getElementById( 'date01' ).innerHTML = document.form.START_DATE.value.substring(0, 4) + '年' + document.form.START_DATE.value.substring(4, 6) + '月' + document.form.START_DATE.value.substring(6, 8) + '日' + document.form.START_DATE.value.substring(8, 10) + ':' + document.form.START_DATE.value.substring(10, 12) ;
            }else{
                document.getElementById( 'date01' ).innerHTML = '';
            }
        }
        function funcEndDate(){
            if( document.form.END_DATE.value !== '' ){
            document.getElementById( 'date02' ).innerHTML = document.form.END_DATE.value.substring(0, 4) + '年' + document.form.END_DATE.value.substring(4, 6) + '月' + document.form.END_DATE.value.substring(6, 8) + '日' + document.form.END_DATE.value.substring(8, 10) + ':' + document.form.END_DATE.value.substring(10, 12) ;
            }else{
                document.getElementById( 'date02' ).innerHTML = '';
            }
        }
        function funcSample(){
            var strText = '';
            var boolTodayFlg = false;
            if( document.form.SAMPLE1.value == '1' ){
                if( boolTodayFlg == false ){
                    strText = strText + '本日第●レースより'
                    boolTodayFlg = true;
                }
                strText = strText + '安定板を使用しています。\n';
            }else if( document.form.SAMPLE1.value == '2' ){
                if( boolTodayFlg == false ){
                    strText = strText + '本日第●レースより'
                    boolTodayFlg = true;
                }
                strText = strText + '展示走行は「1周」、レース周回は「2周」となりました。\n';
            }else if( document.form.SAMPLE1.value == '3' ){
                if( boolTodayFlg == false ){
                    strText = strText + '予備ピットを使用しています。'
                    boolTodayFlg = true;
                }
                strText = strText + 'レース周回は「2周」となりました。\n';
            }
            if( document.form.SAMPLE2.value == '1' ){
                if( boolTodayFlg == false ){
                    strText = strText + '本日第●レースより'
                    boolTodayFlg = true;
                }
                strText = strText + '安定板を使用しています。\n';
            }else if( document.form.SAMPLE2.value == '2' ){
                if( boolTodayFlg == false ){
                    strText = strText + '本日第●レースより'
                    boolTodayFlg = true;
                }
                strText = strText + '展示走行は「1周」、レース周回は「2周」となりました。\n';
            }else if( document.form.SAMPLE2.value == '3' ){
                if( boolTodayFlg == false ){
                    strText = strText + '本日第●レースより'
                    boolTodayFlg = true;
                }
                strText = strText + '予備ピットを使用しています。\n';
            }
            if( document.form.SAMPLE3.value == '1' ){
                if( boolTodayFlg == false ){
                    strText = strText + '本日第●レースより'
                    boolTodayFlg = true;
                }
                strText = strText + '安定板を使用しています。\n';
            }else if( document.form.SAMPLE3.value == '2' ){
                if( boolTodayFlg == false ){
                    strText = strText + '本日第●レースより'
                    boolTodayFlg = true;
                }
                strText = strText + '展示走行は「1周」、レース周回は「2周」となりました。\n';
            }else if( document.form.SAMPLE3.value == '3' ){
                if( boolTodayFlg == false ){
                    strText = strText + '本日第●レースより'
                    boolTodayFlg = true;
                }
                strText = strText + '予備ピットを使用しています。\n';
            }
            document.form.COMMENT.value = strText;
            funcTextCount();
        }
        function funcSave( argNum ){
            var boolJudge = true;
            var strMessage = '';
            if( argNum == "0" ){
            // 保存時何もしない
            }else if( argNum == "1" ){
            // 全レース公開ボタン押したとき
                document.form.APPEAR_FLG.value = '1'
            }else if( argNum == "2" ){
                document.form.APPEAR_FLG.value = '0'
            }
            if (document.form.END_DATE.value.length != 0){
                if(document.form.START_DATE.value > document.form.END_DATE.value){
                    boolJudge = false;
                    strMessage = strMessage + '掲載終了時間は掲載開始時間以降の日付を入力して下さい\n'
                }
            }
            if(int(document.form.START_DATE.value) == false || document.form.START_DATE.value.length != 12){
                boolJudge = false;
                strMessage = strMessage + '掲載開始時間は半角数字12桁で入力して下さい\n'
            }else{
                if(isValidDateTime(parseInt(document.form.START_DATE.value.substr(0, 4),10),parseInt(document.form.START_DATE.value.substr(4, 2),10),parseInt(document.form.START_DATE.value.substr(6, 2),10),parseInt(document.form.START_DATE.value.substr(8, 2),10),parseInt(document.form.START_DATE.value.substr(10, 2),10))){
                }else{
                    boolJudge = false;
                    strMessage = strMessage + '掲載開始時間は正しい日付・時刻を入力して下さい。\n'
                }
            }
            if(int(document.form.END_DATE.value) == false || document.form.END_DATE.value.length != 12 ){
                if (document.form.END_DATE.value.length != 0){
                    boolJudge = false;
                    strMessage = strMessage + '掲載終了時間は半角数字12桁で入力するか未入力にして下さい\n'
                }
            }else{
                if(isValidDateTime(parseInt(document.form.END_DATE.value.substr(0, 4),10),parseInt(document.form.END_DATE.value.substr(4, 2),10),parseInt(document.form.END_DATE.value.substr(6, 2),10),parseInt(document.form.END_DATE.value.substr(8, 2),10),parseInt(document.form.END_DATE.value.substr(10, 2),10)))
                {
                }else{
                    boolJudge = false;
                    strMessage = strMessage + '掲載終了時間は正しい日付・時刻を入力して下さい。\n'
                }
            }
            if( boolJudge ){
                document.form.submit()
            }else{
                document.form.action = 'yoso5_execute.asp';
                alert( strMessage );
            }
        }
        function funcReload(){
            document.location.reload();
        }
        function isValidDateTime(y,m,d,h,mi){
        //		alert(y + '-' + m + '-' + d + '-' + h + '-' + mi + '-' + s);
            var di = new Date(y,m-1,d);
            if(di.getFullYear() == y && di.getMonth() == m-1 && di.getDate() == d){
                if(h >= 0 && h <= 23 && mi >= 0 && mi <= 59 ){
                return true;
                }
            }
            return false;
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

        funcStartDate();funcEndDate();funcTextCount();
    </script>
@endsection