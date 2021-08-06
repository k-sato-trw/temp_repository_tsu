@extends('layouts.admin_kisya_layout')

@section('title', '出足・伸足評価')

@inject('general', 'App\Services\GeneralService')

@section('css')
    <link href="/cms/css/reset.css" rel="stylesheet" type="text/css">
    <link href="/cms/css/cms.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
    <style type="text/css">
        .fm_tuika01_2 {
            font-size: 14px;
            padding: 4px;
            margin: 10px 10px 0 10px;
            border: 3px solid #BBB;
            color: #000;
            width: 90px;}
        .fm_tuika02_2 {
            font-size: 14px;
            padding: 4px;
            margin: 10px 10px 0 0;
            border: 3px solid #BBB;
            color: #000;
            width: 90px;}
    </style>
@endsection

@section('content')
    
<div id="header2">
    <div id="day">
        <span class="day_tit">日<br>程</span>
        <select id="day_select" name="TARGET_DATE" onChange="funcChangeDate();">
            <option value="20210620" selected>6日目（6/20）</option>
            <option value="20210619">5日目（6/19）</option>
            <option value="20210618">4日目（6/18）</option>
            <option value="20210617">3日目（6/17）</option>
            <option value="20210616">2日目（6/16）</option>
            <option value="20210615">1日目（6/15）</option>
        </select>
    </div><!--/#day-->

    <div id="race_name">
    <span class="race_n_tit">対象開催</span>
    <span class="race_n">次節開催は9月だよ！BR津競技棟工事記念</span>
    
    </div><!--/#race_name-->
    <div class="clear"></div>
    </div><!--/#header2-->
    <div id="info01" style="margin-left:auto;margin-right:auto;">◆帰郷 @foreach($kikyo_ashi_array as $item) {{str_replace('　','',$fan_data_array[$item->TOUBAN]->NameK)}}選手@endforeach
    </div>
    
    
    
    <!--▼▼▼本文▼▼▼-->
    
    <table id="ta_deashi" style="margin-left:auto;margin-right:auto;">
    <tr>
    <th>No.</th>
    <th>登番</th>
    <th>選手名</th>
    <th>支部</th>
    <th>級別</th>
    <th>モーター<br>機番</th>
    <th class="deashi">出足</th>
    <th class="deashi2">
    
    <select name="ALL_DEASHI" tabindex="4" class="fm_deashi_yoso_pd">
    <option value="0" selected>--</option>
    <option value="1">◎</option>
    <option value="2">○</option>
    <option value="3">△</option>
    </select>
    <input type="button" value="一括反映" onClick="funcSave( '3' )" class="fm_deashi_yoso_pd_bt">
    
    </th>
    <th class="nobiashi">伸足</th>
    <th class="nobiashi2">
    
    <select name="ALL_NOBIASHI" tabindex="4" class="fm_deashi_yoso_pd">
    <option value="0" selected>--</option>
    <option value="1">◎</option>
    <option value="2">○</option>
    <option value="3">△</option>
    </select>
    <input type="button" value="一括反映" onClick="funcSave( '4' )" class="fm_deashi_yoso_pd_bt">
    
    </th>
    </tr>
    
    <!--/#情報-->
    {{--通常--}}
    <?php $loop_count = 1; ?>
    @foreach ($syussou_array as $item)
        @if(!isset($tsuihai_ashi_array[$item->TOUBAN]))
            <tr>
                <td>{{$loop_count}}
                <br><select name="KIKYO_FLG_{{$loop_count}}" tabindex="2" class="fm_kt" onfocus="funcForcus();">
                <option value="0" selected>--</option>
                <option value="1">帰郷</option>
                </select></td>
                <td class="no">{{ $item->TOUBAN }}<input type="hidden" name="TOUBAN_{{$loop_count}}" value="{{ $item->TOUBAN }}"></td>
                <td class="name">{{ str_replace('　','',$item->SENSYU_NAME) }}</td>
                <td class="shibu">{{ str_replace('　','',$item->HOME_TOWN) }}</td>
                <td class="class">{{ $item->KYU_BETU }}</td>
                <td class="kiban">{{ $item->MOTOR_NO }}<input type="hidden" name="MOTOR_{{$loop_count}}" value="{{ $item->MOTOR_NO }}"></td>
                <td class="deashi">
                    @isset($syussou_ashi_array[$item->TOUBAN])
                        <img src="/cms/images/ic_yoso0{{$syussou_ashi_array[$item->TOUBAN]->DEASHI}}_w.png" width="29" height="29" alt="">
                    @endisset
                </td>
                <td class="deashi2">
                
                <label><input type="radio" onfocus="funcForcus();" name="DEASHI_{{$loop_count}}" value="1" @if( ($syussou_ashi_array[$item->TOUBAN]->DEASHI ?? false) == 1) checked @endif >
                <span class="ic_a">◎</span></label>
                <label><input type="radio" onfocus="funcForcus();" name="DEASHI_{{$loop_count}}" value="2" @if( ($syussou_ashi_array[$item->TOUBAN]->DEASHI ?? false) == 2) checked @endif >
                <span class="ic_b">○</span></label>
                <label><input type="radio" onfocus="funcForcus();" name="DEASHI_{{$loop_count}}" value="3" @if( ($syussou_ashi_array[$item->TOUBAN]->DEASHI ?? false) == 3) checked @endif >
                <span class="ic_c">△</span></label>
                    
                </td>
                <td class="nobiashi">
                    @isset($syussou_ashi_array[$item->TOUBAN])
                        <img src="/cms/images/ic_yoso0{{$syussou_ashi_array[$item->TOUBAN]->NOBIASHI}}_w.png" width="29" height="29" alt="">
                    @endisset
                </td>
                <td class="nobiashi2">
                <label><input type="radio" onfocus="funcForcus();" name="NOBIASHI_{{$loop_count}}" value="1" @if( ($syussou_ashi_array[$item->TOUBAN]->NOBIASHI ?? false) == 1) checked @endif >
                <span class="ic_a">◎</span></label>
                
                <label><input type="radio" onfocus="funcForcus();" name="NOBIASHI_{{$loop_count}}" value="2" @if( ($syussou_ashi_array[$item->TOUBAN]->NOBIASHI ?? false) == 2) checked @endif >
                <span class="ic_b">○</span></label>
                
                <label><input type="radio" onfocus="funcForcus();" name="NOBIASHI_{{$loop_count}}" value="3" @if( ($syussou_ashi_array[$item->TOUBAN]->NOBIASHI ?? false) == 3) checked @endif >
                <span class="ic_c">△</span></label>
                
                </td>
            </tr>
            <?php $loop_count ++; ?>
        @endif
    @endforeach
    {{--通常↑--}}

    
    {{--追配↓--}}
    @foreach ($tsuihai_ashi_array as $item)
        <tr>
            <td>{{$loop_count}}
            <br><select name="KIKYO_FLG_{{$loop_count}}" tabindex="2" class="fm_kt" onfocus="funcForcus();">
            <option value="0" selected>--</option>
            <option value="1">帰郷</option>
            </select></td>
            <td class="no">{{ $item->TOUBAN }}<input type="hidden" name="TOUBAN_{{$loop_count}}" value="{{ $item->TOUBAN }}"></td>
            <td class="name">{{ str_replace('　','', $fan_data_array[$item->TOUBAN]->NameK ?? '') }}</td>
            <td class="shibu">{{ $fan_data_array[$item->TOUBAN]->KenID ?? '' }}</td>
            <td class="class">{{ $fan_data_array[$item->TOUBAN]->Kyu ?? '' }}</td>
            <td class="kiban">{{ $item->MOTOR_NO }}<input type="hidden" name="MOTOR_{{$loop_count}}" value="{{ $item->MOTOR_NO }}"></td>
            <td class="deashi">
                @if($item->DEASHI)
                    <img src="/cms/images/ic_yoso0{{$item->DEASHI}}_w.png" width="29" height="29" alt="">
                @endif
            </td>
            <td class="deashi2">
            
            <label><input type="radio" onfocus="funcForcus();" name="DEASHI_{{$loop_count}}" value="1" @if(($item->DEASHI ?? false) == 1) checked @endif >
            <span class="ic_a">◎</span></label>
            <label><input type="radio" onfocus="funcForcus();" name="DEASHI_{{$loop_count}}" value="2" @if(($item->DEASHI ?? false) == 2) checked @endif >
            <span class="ic_b">○</span></label>
            <label><input type="radio" onfocus="funcForcus();" name="DEASHI_{{$loop_count}}" value="3" @if(($item->DEASHI ?? false) == 3) checked @endif >
            <span class="ic_c">△</span></label>
                
            </td>
            <td class="nobiashi">
                @if($item->NOBIASHI)
                    <img src="/cms/images/ic_yoso0{{$item->NOBIASHI}}_w.png" width="29" height="29" alt="">
                @endif
            </td>
            <td class="nobiashi2">
            <label><input type="radio" onfocus="funcForcus();" name="NOBIASHI_{{$loop_count}}" value="1" @if(($item->NOBIASHI ?? false) == 1) checked @endif >
            <span class="ic_a">◎</span></label>
            
            <label><input type="radio" onfocus="funcForcus();" name="NOBIASHI_{{$loop_count}}" value="2" @if(($item->NOBIASHI ?? false) == 2) checked @endif >
            <span class="ic_b">○</span></label>
            
            <label><input type="radio" onfocus="funcForcus();" name="NOBIASHI_{{$loop_count}}" value="3" @if(($item->NOBIASHI ?? false) == 3) checked @endif >
            <span class="ic_c">△</span></label>
            
            </td>
        </tr>
        <?php $loop_count ++; ?>
    @endforeach
    {{--追配↑--}}

    
    {{--帰郷↓--
    @foreach ($kikyo_ashi_array as $item)
        <tr>
            <td>{{$loop_count}}
            <br><select name="KIKYO_FLG_{{$loop_count}}" tabindex="2" class="fm_kt" onfocus="funcForcus();">
            <option value="0">--</option>
            <option value="1" selected>帰郷</option>
            </select></td>
            <td class="no">{{ $item->TOUBAN }}<input type="hidden" name="TOUBAN_{{$loop_count}}" value="{{ $item->TOUBAN }}"></td>
            <td class="name">{{ str_replace('　','', $fan_data_array[$item->TOUBAN]->NameK ?? '') }}</td>
            <td class="shibu">{{ $fan_data_array[$item->TOUBAN]->KenID ?? '' }}</td>
            <td class="class">{{ $fan_data_array[$item->TOUBAN]->Kyu ?? '' }}</td>
            <td class="kiban">{{ $item->MOTOR_NO }}<input type="hidden" name="MOTOR_{{$loop_count}}" value="{{ $item->MOTOR_NO }}"></td>
            <td class="deashi">
                @if($item->DEASHI)
                    <img src="/cms/images/ic_yoso0{{$item->DEASHI}}_w.png" width="29" height="29" alt="">
                @endif
            </td>
            <td class="deashi2">
            
            <label><input type="radio" onfocus="funcForcus();" name="DEASHI_{{$loop_count}}" value="1" @if(($item->DEASHI ?? false) == 1) checked @endif >
            <span class="ic_a">◎</span></label>
            <label><input type="radio" onfocus="funcForcus();" name="DEASHI_{{$loop_count}}" value="2" @if(($item->DEASHI ?? false) == 2) checked @endif >
            <span class="ic_b">○</span></label>
            <label><input type="radio" onfocus="funcForcus();" name="DEASHI_{{$loop_count}}" value="3" @if(($item->DEASHI ?? false) == 3) checked @endif >
            <span class="ic_c">△</span></label>
                
            </td>
            <td class="nobiashi">
                @if($item->NOBIASHI)
                    <img src="/cms/images/ic_yoso0{{$item->NOBIASHI}}_w.png" width="29" height="29" alt="">
                @endif
            </td>
            <td class="nobiashi2">
            <label><input type="radio" onfocus="funcForcus();" name="NOBIASHI_{{$loop_count}}" value="1" @if(($item->NOBIASHI ?? false) == 1) checked @endif >
            <span class="ic_a">◎</span></label>
            
            <label><input type="radio" onfocus="funcForcus();" name="NOBIASHI_{{$loop_count}}" value="2" @if(($item->NOBIASHI ?? false) == 2) checked @endif >
            <span class="ic_b">○</span></label>
            
            <label><input type="radio" onfocus="funcForcus();" name="NOBIASHI_{{$loop_count}}" value="3" @if(($item->NOBIASHI ?? false) == 3) checked @endif >
            <span class="ic_c">△</span></label>
            
            </td>
        </tr>
        <?php $loop_count ++; ?>
    @endforeach
    {{--帰郷↑--}}

      
    </table>
    
        <!--▼▼▼選手追加▼▼▼-->
        <div style="margin:0px auto 40px;width:980px;">
            <h2>【選手を手動追加】</h2>
            <input type="text" id="TOUBAN" name="TOUBAN" size="6" maxlength="4" value="登 番" onfocus="funcOnCursol( );" onblur="funcOnBlur( );" class="fm_tuika01">
            <input type="text" id="KIBAN" name="KIBAN" size="6" maxlength="3" value="モーター機番" onfocus="funcOnCursol2( );" onblur="funcOnBlur2( );" class="fm_tuika02"><input type="button" value="追加" class="fm_deashi_yoso_pd_bt" onClick="javascript:funcSave( '5' );"><input type="button" value="削除" class="fm_deashi_yoso_pd_bt" onClick="javascript:funcSave( '6' );">
        </div>
    </div><!--/#wrapper-->
    
    
    <!--▼▼▼フッター▼▼▼-->
    <div id="footer">
    
    <div id="footer_in">
    <div id="footer_in_l">
    <ul>
    <li class="save"><input type="button" onClick="javascript:funcSave( '0' );" value="保存"></li>
    <div class="clear"></div>
    </ul>
    </div><!--/#fotter_in_l-->
    
    <div id="footer_in_r">
    
    <div id="action_c">
    <span class="open_b"><input type="button" onClick="javascript:funcSave( '1' );" value="公開"></span>
    <span class="close_b"><input type="button" onClick="javascript:funcSave( '2' );" value="非公開"></span>
    <div class="clear"></div>
    </div><!--/#action_c-->
    
    <div class="clear"></div>
    </div><!--/#fotter_in_r-->
    
    <div class="clear"></div>
    </div><!--/#fotter_in-->
    
    </div><!--/#footer-->
    
    <input type="hidden" name="APPEAR_FLG" value="0">
    <input type="hidden" name="MODE" value="0">
    </form>
@endsection


@section('script')
    <script type="text/javascript" src="/asp/tbk/racersearch/js/makePlayerJS.js"></script>
    <script type="text/javascript">
        var strToubanSerch = ['3020' , '3159' , '3327' , '3445' , '3467' , '3505' , '3519' , '3583' , '3590' , '3592' , '3647' , '3655' , '3698' , '3807' , '3885' , '3945' , '3950' , '3965' , '3992' , '4002' , '4012' , '4049' , '4056' , '4059' , '4067' , '4078' , '4081' , '4129' , '4139' , '4156' , '4186' , '4197' , '4261' , '4273' , '4340' , '4470' , '4532' , '4748' , '4750' , '4754' , '4759' , '4787' , '4794' , '4917' , '4943' , '5024'];
        var boolCursorFlg = false;
        function funcForcus(){
            boolCursorFlg = true; 
        }
        function funcLink( argURL , argPage ){
            if( boolCursorFlg ){ 
                if( window.confirm( 'データは保存されていません。\n保存して移動しますか？' ) ){
                    document.form.action = 'yoso1_execute.asp?ret=' + argPage;
                    funcSave( '0' );
                }else{
                    document.location.href= argURL;
                }
            }else{
                document.location.href= argURL;
            }	
        }
        function replaceAll(expression, org, dest){
            return expression.split(org).join(dest); 
        }
        function funRacerList( argTouban )
        {// 検索ボタン押した時の処理
            var intLoopCount = 0;	// 配列カウント用
            var strHTML = '';		// 検索結果選手一覧HTML格納用
            var strReturn = '';
            if( argTouban != null && argTouban != '' )
            {// DOMに対応している時
                var strTextSearch = argTouban;
                //データを成形
                strTextSearch = strTextSearch.replace(' ', '');
                strTextSearch = strTextSearch.replace('　', '');
                if( strTextSearch != null && strTextSearch != undefined && strTextSearch != '' )
                {// 入力文字が空ではない時
                    strKekkaArray = new Array();
                    for( intLoopCount=0 ; intLoopCount < arraySensyuData.length ; intLoopCount++ )
                    {// 選手データ配列が存在する限り繰り返す
                        var strTempArray;
                        // 1選手データを「:::」区切りで配列strTempArrayに格納
                        strTempArray = arraySensyuData[ intLoopCount ].split(':::');
                        //データを成形
                        strTempArray[9] = replaceAll( strTempArray[ 4 ] , ' ', '');
                        strTempArray[9] = replaceAll( strTempArray[ 9 ] , '　', '');
                        strTempArray[10] = replaceAll( strTempArray[ 10 ] , ' ', '');
                        //if( myRes == true )
                        if(strTempArray[ 4 ].indexOf(strTextSearch) > -1 )
                        {// 検索結果と合致する場合
                            // 選手データが何番目の要素かを格納
                            strKekkaArray.push( intLoopCount );
                        }
                    }
                    if( strKekkaArray.length > 0 )
                    {// 配列の要素数が0より大きい時
                        // 初期化
                        for( intLoopCount = 0 ; intLoopCount < strKekkaArray.length ; intLoopCount++ )
                        {
                            var strTempArray;
                            // 1選手データを「:::」区切りで配列strTempArrayに格納
                            strTempArray = arraySensyuData[ strKekkaArray[ intLoopCount ] ].split(':::');
                            strTempArray[ 9 ] = replaceAll( strTempArray[ 9 ] , '　' , '' )
                            strTempArray[ 9 ] = replaceAll( strTempArray[ 9 ] , ' ' , '' )
                            // alert( strTempArray[ 9 ] );
                        }
                        strReturn = strTempArray[ 9 ] + '選手';
                    }
                    else
                    {// 検索結果 合致なし
                        strReturn = '';
                    }
                }
                else
                {
                    strReturn = '';
                }
            }
            else
            {
                strReturn = '';
            }// DOMに対応している時 ここまで
            return strReturn;
        }
        function funcChangeDate( ){
            document.form.action='yoso1.asp?yd=' + document.form.TARGET_DATE.value;
            document.form.submit()
        }
        function funcSave( argNum ){
            var boolJudge = true;
            var strMessage = '';
            if( argNum == "0" ){
            // 保存時何もしない
                document.form.MODE.value='0';
            }else if( argNum == "1" ){
            // 公開ボタン押したとき
                document.form.MODE.value='0';
                document.form.APPEAR_FLG.value = '1'
            }else if( argNum == "2" ){
            // 非公開ボタン押したとき
                document.form.MODE.value='0';
                document.form.APPEAR_FLG.value = '0'
            }else if( argNum == "3" ){
            // 出足一括更新ボタン押したとき
                document.form.MODE.value='1';
            }else if( argNum == "4" ){
            // 伸足一括更新ボタン押したとき
                document.form.MODE.value='2';
            }else if( argNum == "5" ){
            // 選手追加ボタン押したとき
                document.form.MODE.value='3';
                if( int( document.form.TOUBAN.value ) == false || document.form.TOUBAN.value.length !=4 ){
                    boolJudge = false;
                    strMessage = strMessage + '登番は4桁の数値で入力してください。\n';
                }
                if( int( document.form.KIBAN.value ) == false || document.form.KIBAN.value.length !=3 ){
                    boolJudge = false;
                    strMessage = strMessage + 'モーター機番は3桁の数値で入力してください。\n';
                }
            }else if( argNum == "6" ){
            // 選手追加ボタン押したとき
                document.form.MODE.value='4';
                if( int( document.form.TOUBAN.value ) == false || document.form.TOUBAN.value.length !=4 ){
                    boolJudge = false;
                    strMessage = strMessage + '登番は4桁の数値で入力してください。\n';
                }else if( strToubanSerch.indexOf( document.form.TOUBAN.value ) >-1 ){
                    boolJudge = false;
                    strMessage = strMessage + funRacerList( document.form.TOUBAN.value ) + '(' + document.form.TOUBAN.value + ')は出走します。\n';
                }
            }
            if( boolJudge ){
                document.form.submit()
            }else{
                alert( strMessage )
            }
        }
        function funcOnCursol( ){
            if( document.form.TOUBAN.value == '登 番' ){
            // 初期値の場合
                // 入力値を空にする
                document.form.TOUBAN.value = '';
            }
            // クラスを変更
            document.getElementById( 'TOUBAN' ).className = 'fm_tuika01_2';
        }
        function funcOnBlur( ){
            if( document.form.TOUBAN.value == '' ){
            // 値が空の場合初期値に戻す
                document.form.TOUBAN.value = '登 番';
                document.getElementById( 'TOUBAN' ).className = 'fm_tuika01';
            }else if( document.form.TOUBAN.value == '登 番' ){
            // 値に変更がない場合、クラスを初期に戻す
                document.getElementById( 'TOUBAN' ).className = 'fm_tuika01';
            }
        }
            function funcOnCursol2( ){
                if( document.form.KIBAN.value == 'モーター機番' ){
                // 初期値の場合
                    // 入力値を空にする
                    document.form.KIBAN.value = '';
                }
                // クラスを変更
                document.getElementById( 'KIBAN' ).className = 'fm_tuika02_2';
            }
            function funcOnBlur2( ){
                if( document.form.KIBAN.value == '' ){
                // 値が空の場合初期値に戻す
                    document.form.KIBAN.value = 'モーター機番';
                    document.getElementById( 'KIBAN' ).className = 'fm_tuika02';
                }else if( document.form.KIBAN.value == 'モーター機番' ){
                // 値に変更がない場合、クラスを初期に戻す
                    document.getElementById( 'KIBAN' ).className = 'fm_tuika02';
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
    </script>
@endsection