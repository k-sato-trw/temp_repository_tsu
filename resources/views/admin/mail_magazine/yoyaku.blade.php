@extends('layouts.admin_layout')

@section('title', '津 メールマガジンCMS')

@inject('general', 'App\Services\GeneralService')

@section('css')
<style>
    *, ::after, ::before {
        box-sizing:content-box;
    }
</style>
    <link href="/cms/cms_mail/css/reset.css" rel="stylesheet" type="text/css">
    <link href="/cms/cms_mail/css/cms_mail.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div id="wrapper">
        <form name="MyForm" method="post">
        
            <div id="contents">
                
                <div id="main" class="page03">
                
                    <div id="res_top">
                        
                        <!--「未入力、保存中：i01」「配信確定：i02」「配信完了：i03」-->
                        <div id="date" class="i03">
                            <div id="day_ttl">配信日 ></div>
                            <div id="day">{{date('Y年n月j日',strtotime($target_date))}}<span>(<span>{{$week_label[date('w',strtotime($target_date))]}}</span>)</span> </div>
                        </div>
                        
                        <div id="change">
                            配信日を変更 >
                            <input name="d1" class="d1 textbox" type="text" maxlength="4" onBlur="funcBlur();">年
                            <input name="d2" class="d2 textbox" type="text" maxlength="2" onBlur="funcBlur();">月
                            <input name="d3" class="d3 textbox" type="text" maxlength="2" onBlur="funcBlur();">日
                            <div class="btn_save"><a href="javascript:void(0);" onClick="check2();" onBlur="funcBlur();">保存</a></div>
                        </div>
                        
                    </div><!--/#res_top-->
                    
                    <div id="res_bot">
                        時間指定 >
                        <input name="t1" class="t1 textbox" type="text" maxlength="2" value="" onBlur="funcBlur();">
                        :
                        <input name="t2" class="t2 textbox" type="text" maxlength="2" value="" onBlur="funcBlur();">
                            <div class="btn_save"><a href="javascript:void(0);" onClick="check4();" onBlur="funcBlur();">保存</a></div>
                    </div><!--/#res_top-->
                    
                    <div id="attention">
                        ※「確定」前に必ず「プレビュー」で内容を確認してください。
                    </div><!--/#attention-->
                    
            </div><!--/#main-->
                
            
            </div><!--/#contents-->
        
    
            <div id="footer" class="page03">
                <ul>
                    <li class="btn01"><a href="/admin/mail_magazine/preview/{{$target_date}}/{{$id}}" target="_blank">プレビュー</a></li>
                    <li class="btn04"><a href="javascript:void(0);" onClick="check5();">テスト配信</a></li>
                    <li class="btn02"><a href="javascript:void(0);" onClick="check3();">配信</a></li>
                    <li class="btn03 no">配信予約</li>
                    <div class="clear"></div>
                </ul>
            </div><!--/#footer-->
            
        </form>
    
    
    </div><!--/#wrapper-->

@endsection


@section('script')
    <script type="text/javascript" src="/cms/cms_mail/js/jquery-1.8.2.min.js"></script>

    <!--共通-->
    <script type="text/javascript" src="/cms/cms_mail/js/common.js"></script>
    <script type="text/javascript">
        function check(){
            var strText = "";
            var boolCheck = true;
            if(document.MyForm.t1.value == '' ){
                strText = strText + '時間指定(時)は数字2文字で入力して下さい。\n'
                boolCheck = false;
            }
            else if(document.MyForm.t1.value.length!=2){
                strText = strText + '時間指定(時)は数字2文字で入力して下さい。\n'
                boolCheck = false;
            }
            else if( int( document.MyForm.t1.value ) == false){
                strText = strText + '時間指定(時)は数字2文字で入力して下さい。\n'
                boolCheck = false;
            }
            if(document.MyForm.t2.value == '' ){
                strText = strText + '時間指定(分)は数字2文字で入力して下さい。\n'
                boolCheck = false;
            }
            else if(document.MyForm.t2.value.length!=2){
                strText = strText + '時間指定(分)は数字2文字で入力して下さい。\n'
                boolCheck = false;
            }
            else if( int( document.MyForm.t2.value ) == false){
                strText = strText + '時間指定(分)は数字2文字で入力して下さい。\n'
                boolCheck = false;
            }
            if( boolCheck ){
                document.MyForm.action='cms_mail3_execute.asp?yd=20210608&id=0&save=2';
                document.MyForm.submit();
            }else{
                alert( strText );
            }
        }
        function check3(){
            res =confirm('メルマガ送信を行いますか？\n');
            if( res == false ){
                
            }else{
                document.MyForm.action='cms_mail_send.asp?yd=20210608&id=0&mode=1';
                document.MyForm.submit();
            }
        }
        function check4(){
            var strText = "";
            var boolCheck = true;
            if(document.MyForm.t1.value == '' ){
                strText = strText + '時間指定(時)は数字2文字で入力して下さい。\n'
                boolCheck = false;
            }
            else if(document.MyForm.t1.value.length!=2){
                strText = strText + '時間指定(時)は数字2文字で入力して下さい。\n'
                boolCheck = false;
            }
            else if( int( document.MyForm.t1.value ) == false){
                strText = strText + '時間指定(時)は数字2文字で入力して下さい。\n'
                boolCheck = false;
            }
            if(document.MyForm.t2.value == '' ){
                strText = strText + '時間指定(分)は数字2文字で入力して下さい。\n'
                boolCheck = false;
            }
            else if(document.MyForm.t2.value.length!=2){
                strText = strText + '時間指定(分)は数字2文字で入力して下さい。\n'
                boolCheck = false;
            }
            else if( int( document.MyForm.t2.value ) == false){
                strText = strText + '時間指定(分)は数字2文字で入力して下さい。\n'
                boolCheck = false;
            }
            if( boolCheck ){
                document.MyForm.action='cms_mail3_execute.asp?yd=20210608&id=0&save=3';
                document.MyForm.submit();
            }else{
                alert( strText );
            }
        }
        function check2(){
            var strText = "";
            var boolCheck = true;
            if(document.MyForm.d1.value== ''){
                strText = strText + '配信日(年)は数字4文字で入力して下さい。\n';
                boolCheck = false;
            }
            else if(document.MyForm.d1.value.length != 4){
                strText = strText + '配信日(年)は数字4文字で入力して下さい。\n';
                boolCheck = false;
            }
            else if( int( document.MyForm.d1.value ) == false){
                strText = strText + '配信日(年)は数字4文字で入力して下さい。\n';
                boolCheck = false;
            }
            if(document.MyForm.d2.value == ''){
                strText = strText + '配信日(月)は数字2文字で入力して下さい。\n';
                boolCheck = false;
            }
            else if(document.MyForm.d2.value.length != 2){
                strText = strText + '配信日(月)は数字2文字で入力して下さい。\n';
                boolCheck = false;
            }
            else if( int( document.MyForm.d2.value ) == false){
                strText = strText + '配信日(月)は数字2文字で入力して下さい。\n';
                boolCheck = false;
            }
            if(document.MyForm.d3.value == ''){
                strText = strText + '配信日(日)は数字2文字で入力して下さい。\n';
                boolCheck = false;
            }
            else if(document.MyForm.d3.value.length != 2){
                strText = strText + '配信日(日)は数字2文字で入力して下さい。\n';
                boolCheck = false;
            }
            else if( int( document.MyForm.d3.value ) == false){
                strText = strText + '配信日(日)は数字2文字で入力して下さい。\n';
                boolCheck = false;
            }
            if( isValidDate( document.MyForm.d1.value , document.MyForm.d2.value , document.MyForm.d3.value ) == false){
                strText = strText + '配信日(日)は正しい日付で入力して下さい。\n';
                boolCheck = false;
            }
            if( boolCheck ){
                document.MyForm.action='cms_mail3_execute.asp?yd=20210608&id=0&save=1';
                document.MyForm.submit();
            }else{
                alert( strText );
            }

        }
        function check5(){
            res =confirm('メルマガテスト送信を行いますか？\n');
            if( res == false ){
                
            }else{
                document.MyForm.action='cms_mail_send.asp?yd=20210608&id=0&mode=1&test=1';
                document.MyForm.submit();
            }
        }
        function isValidDate(y,m,d){
            var di = new Date(y,m-1,d);
            if(di.getFullYear() == y && di.getMonth() == m-1 && di.getDate() == d){
                return true;
            }
            return false;
        }
        //２バイト文字を１バイトに変換
        function funcStr2to1(strTarget)
        {
            var strResult	= '';
            var strBefore	= '０１２３４５６７８９－()ＡＢＣＤＥＦＧＨＩＪＫＬＮＭＯＰＱＲＳＴＵＶＷＸＹＺａｂｃｄｅｆｇｈｉｊｋｌｎｍｏｐｑｒｓｔｕｖｗｘｙｚ＠．';
            var strAfter	= '0123456789-()ABCDEFGHIJKLNMOPQRSTUVWXYZabcdefghijklnmopqrstuvwxyz@.';
            var ch;
            var pos;
            if(strTarget != null)
            {
                for(i = 0; i < strTarget.length; i++) 
                {
                    strResult += (pos = strBefore.indexOf(ch = strTarget.charAt(i))) >= 0 ? strAfter.charAt(pos) : ch;
                }
            }
            return strResult;
        }
        //数値チェック
        function int(str)
        {
            var intjudge = false;
            if(str.match(/^[0-9]*$/) != '' && str.match(/^[0-9]*$/) != null)
            {
                intjudge = true;
            }
            return intjudge;
        }
        function funcBlur()
        {
            document.MyForm.d1.value = funcStr2to1( document.MyForm.d1.value );
            document.MyForm.d2.value = funcStr2to1( document.MyForm.d2.value );
            document.MyForm.d3.value = funcStr2to1( document.MyForm.d3.value );
            document.MyForm.t1.value = funcStr2to1( document.MyForm.t1.value );
            document.MyForm.t2.value = funcStr2to1( document.MyForm.t2.value );
        }
    </script>
@endsection
