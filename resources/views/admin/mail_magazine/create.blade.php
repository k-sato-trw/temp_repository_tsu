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
    <form name="MailForm" method="post" >

        <div id="contents">
            
            <div id="main" class="page02">
            
                <div id="status" class="c1">
                    [配信日時] <span>{{date('Y年n月j日',strtotime($target_date))}}({{ $week_label[date('w',strtotime($target_date))] }})</span>
                    <div id="st">新規入力</div>
                </div>
                
                <div id="mail_wrapper">
                
                    <div id="mail_sample">
                        <h4>サンプル</h4>
                        
                            
                            <div id="mail_sample_main">
                                <span>
                                //////////////////////////////////////////<br>
                                ボートレース津　メールマガジン<br>
                                ～{{date('Y/n/j',strtotime($target_date))}}発行～<br>
                                //////////////////////////////////////////<br>
                                ※本メールマガジンはパソコン、スマートフォン専用です。<br>
                                携帯では一部ご覧いただけない情報があります。ご了承ください。<br>
                                </span>
                                
                                <br>
                                
                                <div id="A_wrap">
                                <span>■開門&gt;&gt;</span><br>
                                <span>■第1Rスタート展示&gt;&gt;</span><br>
                                <span>■第12R本場締切予定&gt;&gt;</span><br>
                                </div>
                                
                                <br>
                                
                                <span>
                                    【出走表&前日記者予想PDF】<br />
                                    http://www.boatrace-tsu.com/asp/tsu/mailmagazine/pdf_jumper.asp<br />
                                    <br />
                                    【レース展望】<br />
                                    http://www.boatrace-tsu.com/asp/tsu/mailmagazine/tenbo_jumper.asp?ID={{$race_index[0]->ID ?? ""}}<br />
                                    
                                    <br>
                                    
                                <br>
                                    イベント情報////////////////////////////<br>
                                
                                </span>
                                
                                <div id="B_wrap">
                                </div>
                                
                                <span>
                                    ▼詳細は以下URLよりご確認ください。 <br>
                                    http://www.boatrace-tsu.com/asp/tsu/mailmagazine/event_jumper.asp?ID={{$calendar->ID ?? ""}}<br>
                                </span>
                                
                                <br>
                                <span>次節以降の開催//////////////////////////</span><br>
                                
                                <div id="C_wrap">
                                </div>
                                <br>
                                <br>
                                <span>今月のレースガイド//////////////////////<br />
                                http://www.boatrace-tsu.com/asp/htmlmade/tsu/cal_monthlypdf/{{date('Ym',strtotime($target_date))}}.pdf</span><br/>
                                <br>
                                <br>
                            
                                <div id="D_wrap">
                                </div>
                                
                                <br>
                                <br>
                                
                                <span>
                                    ☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆<br>
                                    <br>
                                    レース映像と舟券購入に役立つ情報満載！！<br>
                                    ▼ライブ＆リプレイレース予想（ツッキーナビ）<br>
                                    http://www.boatrace-tsu.com/asp/tsu/mailmagazine/live_jumper.asp<br>
                                    <br>
                                    ▼ボートレース津 公式Facebook<br>
                                    https://www.facebook.com/boatrace.tsu.jp<br>
                                    <br>
                                    ☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆<br>
                                    <br>
                                    ※内容は一部変更する場合があります。<br>
                                    ※配信停止を希望される場合はこちらより手続きください。 <br>
                                    https://secure.webkyotei.jp/asp/mform/09/mail/stop.asp<br>
                                    &lt;&lt;ご注意&gt;&gt;<br>
                                    このメールアドレスは送信専用です。返信いただいてもお応えできません。 <br>
                                    発行元：ボートレース津 <br>
                                </span>
                                
                                
                            </div><!--/#mail_sample_main-->
                            
                            
                </div><!--/#mail_sample-->
                    
                    <div id="mail_form">
                        <div id="btn_all_clear"><a href="javascript:void(0);" onClick="AllClear();">× ALLクリア</a></div>
                    
                        <!--◆◆◆【A】◆◆◆-->
                        <div class="box">
                            <h4>A</h4>
                            
                            <div class="box_sub">
                                <h5>序文</h5>
                                <textarea name="A_01" id="A_01" class="textarea" onKeyUp="A_WrapChange( 0 )" maxlength="2000">{{ old('A_01') }}</textarea>
                            </div>
                            
                            <hr noshade>
                            
                            <div class="box_sub">
                                <h5>場内状況</h5>
                                <div class="box_no"><label>非掲載<input name="A_no3" id="A_no" class="checkbox" value="1" type="checkbox" onClick="C1_Disable();"  @if(old('A_no3')) checked @endif></label></div>
                                
                                <ul id="C_01d">
                                    <li id="time">
                                        <table>
                                        <tr>
                                        <th rowspan="5" scope="row">開門</th>
                                        <td><input name="C_01_1" id="C_01_1" class="textbox" type="text" value="{{ old('C_01_1',$kaimon_time1 ?? "") }}" onBlur="A_WrapChange( 0 );" maxlength="2">：<input name="C_01_2" id="C_01_2" class="textbox" type="text" value="{{ old('C_01_2',$kaimon_time2 ?? "") }}" onBlur="A_WrapChange( 0 );" maxlength="2">
                                        <label>　<span>節間、開門時間変更</span>
                                            <input name="time_no" id="time_no" class="checkbox" type="checkbox" value="1" onClick="C3_Disable();" @if(old('time_no')) checked @endif>
                                        </label>
                                        </td>
                                        </tr>
                                        <tr id="C1_1_add">
                                        <td>1.<input name="C_01_3_1" class="textbox day" type="text" value="{{ old('C_01_3_1') }}" onBlur="A_WrapChange( 0 );" maxlength="11">
                                                <input name="C_01_4_1" id="C_01_4_1" class="textbox small" type="text" value="{{ old('C_01_4_1') }}" onBlur="A_WrapChange( 0 );" maxlength="2">：<input name="C_01_5_1" id="C_01_5_1" class="textbox small" type="text" onBlur="A_WrapChange( 0 );" value="{{ old('C_01_5_1') }}" maxlength="2"></td>
                                        </tr>
                                        <tr id="C1_2_add">
                                        <td>2.<input name="C_01_3_2" class="textbox day" type="text" value="{{ old('C_01_3_2') }}" onBlur="A_WrapChange( 0 );" maxlength="11">
                                                <input name="C_01_4_2" id="C_01_4_2" class="textbox small" type="text" value="{{ old('C_01_4_2') }}" onBlur="A_WrapChange( 0 );" maxlength="2">：<input name="C_01_5_2" id="C_01_5_2" class="textbox small" type="text" onBlur="A_WrapChange( 0 );" value="{{ old('C_01_5_2') }}" maxlength="2"></td>
                                        </tr>
                                        <tr id="C1_3_add">
                                        <td>3.<input name="C_01_3_3" class="textbox day" type="text" value="{{ old('C_01_3_3') }}" onBlur="A_WrapChange( 0 );" maxlength="11">
                                                <input name="C_01_4_3" id="C_01_4_3" class="textbox small" type="text" value="{{ old('C_01_4_3') }}" onBlur="A_WrapChange( 0 );" maxlength="2">：<input name="C_01_5_3" id="C_01_5_3" class="textbox small" type="text" onBlur="A_WrapChange( 0 );" value="{{ old('C_01_5_3') }}" maxlength="2"></td>
                                        </tr>
                                        <tr id="C1_4_add">
                                        <td>4.<input name="C_01_3_4" class="textbox day" type="text" value="{{ old('C_01_3_4') }}" onBlur="A_WrapChange( 0 );" maxlength="11">
                                                <input name="C_01_4_4" id="C_01_4_4" class="textbox small" type="text" value="{{ old('C_01_4_4') }}" onBlur="A_WrapChange( 0 );" maxlength="2">：<input name="C_01_5_4" id="C_01_5_4" class="textbox small" type="text" onBlur="A_WrapChange( 0 );" value="{{ old('C_01_5_4') }}" maxlength="2"></td>
                                        </tr>
                                        </table>
                                    <div class="more" id="C2_add_btn"><a href="javascript:void(0);" onClick="C3_add();">追加</a></div>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>第1Rスタート展示</dt>
                                            <dd><input name="C_02_1" id="C_02_1" class="textbox" type="text" onBlur="A_WrapChange( 0 );" maxlength="2" value="{{ old('C_02_1',$st_time1 ?? "") }}">：<input name="C_02_2" id="C_02_2" class="textbox" type="text" onBlur="A_WrapChange( 0 );" maxlength="2" value="{{ old('C_02_2',$st_time2 ?? "") }}"></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>第12R本場締切予定</dt>
                                            <dd><input name="C_03_1" id="C_03_1" class="textbox" type="text" onBlur="A_WrapChange( 0 );" maxlength="2" value="{{ old('C_03_1',$simekiri_jikoku1 ?? "") }}">：<input name="C_03_2" id="C_03_2" class="textbox" type="text" onBlur="A_WrapChange( 0 );" maxlength="2" value="{{ old('C_03_2',$simekiri_jikoku2 ?? "") }}"></dd>
                                        </dl>
                                    </li>
                                    <div class="clear"></div>
                                </ul>
                            </div>
                            
                            <hr noshade>
                        
                            <div class="box_sub">
                                <h5>レース情報</h5>
    <div id="btn_reload"><a href="javascript:void(0);" onClick="SesnyuReload();">再読込</a></div>
                                <div class="box_no"><label>非掲載<input name="A_no1" id="A_no" class="checkbox" value="1" type="checkbox" onClick="A_Disable();" @if(old('A_no1')) checked @endif ></label></div>
                                                            
                                
                                <!--データ複製ここから-->
                                <dl id="A_02d">
                                    <dt>見出し</dt>
                                    <dd><input name="A_021" id="A_02" class="textbox" value="{{ old('A_021',$kaisai_title) }}" type="text" onKeyUp="A_WrapChange( 0 )" maxlength="512"></dd>
                                    <div class="clear"></div>
                                </dl>
                                
                                <label style="display:contents;">
                                <dl id="A_03d">
                                    <dt>艇番表示</dt>
                                    <dd><input name="A_031" id="A_03" class="checkbox" value="1" type="checkbox" onClick="A_WrapChange( 0 );" @if(old('A_031',true)) checked @endif></dd>
                                </dl>
                                </label>
                                <ul id="A_04d1" class="check A_04d">
                                    <li><dl><dt id="n11" class="n1">1号艇</dt><dd><input name="A_04_11" id="A_04_1" class="textbox" type="text" value="{{ old('A_04_11',$syussou[1]->TOUBAN ?? "") }}" maxlength="4" onBlur="A_WrapChange( 11 )"></dd></dl></li>
                                    <li><dl><dt id="n12" class="n2">2号艇</dt><dd><input name="A_04_12" id="A_04_1" class="textbox" type="text" value="{{ old('A_04_12',$syussou[2]->TOUBAN ?? "") }}" maxlength="4" onBlur="A_WrapChange( 12 )"></dd></dl></li>
                                    <li><dl><dt id="n13" class="n3">3号艇</dt><dd><input name="A_04_13" id="A_04_1" class="textbox" type="text" value="{{ old('A_04_13',$syussou[3]->TOUBAN ?? "") }}" maxlength="4" onBlur="A_WrapChange( 13 )"></dd></dl></li>
                                    <li><dl><dt id="n14" class="n4">4号艇</dt><dd><input name="A_04_14" id="A_04_1" class="textbox" type="text" value="{{ old('A_04_14',$syussou[4]->TOUBAN ?? "") }}" maxlength="4" onBlur="A_WrapChange( 14 )"></dd></dl></li>
                                    <li><dl><dt id="n15" class="n5">5号艇</dt><dd><input name="A_04_15" id="A_04_1" class="textbox" type="text" value="{{ old('A_04_15',$syussou[5]->TOUBAN ?? "") }}" maxlength="4" onBlur="A_WrapChange( 15 )"></dd></dl></li>
                                    <li><dl><dt id="n16" class="n6">6号艇</dt><dd><input name="A_04_16" id="A_04_1" class="textbox" type="text" value="{{ old('A_04_16',$syussou[6]->TOUBAN ?? "") }}" maxlength="4" onBlur="A_WrapChange( 16 )"></dd></dl></li>
                                    <div class="clear"></div>
                                </ul>
                                
                                <div class="clear"></div>
                                <!--データ複製ここまで-->
                                
                                <div id="A_add1">
                                
                                <!--データ複製ここから-->
                                <dl id="A_02d">
                                    <dt>見出し</dt>
                                    <dd><input name="A_022" id="A_02" class="textbox" value="{{ old('A_022') }}" type="text" onKeyUp="A_WrapChange( 0 )" maxlength="512"></dd>
                                    <div class="clear"></div>
                                </dl>
                                
                                <label style="display:contents;">
                                <dl id="A_03d">
                                    <dt>艇番表示</dt>
                                    <dd><input name="A_032" id="A_03" class="checkbox" value="1" type="checkbox" onClick="A_WrapChange( 0 );"  @if(old('A_032',true)) checked @endif ></dd>
                                </dl>
                                </label>
                                
                                <ul id="A_04d2" class="check A_04d">
                                    <li><dl><dt id="n21" class="n1">1号艇</dt><dd><input name="A_04_21" id="A_04_1" class="textbox" type="text" value="{{ old('A_04_21') }}" maxlength="4" onBlur="A_WrapChange( 21 )"></dd></dl></li>
                                    <li><dl><dt id="n22" class="n2">2号艇</dt><dd><input name="A_04_22" id="A_04_1" class="textbox" type="text" value="{{ old('A_04_22') }}" maxlength="4" onBlur="A_WrapChange( 22 )"></dd></dl></li>
                                    <li><dl><dt id="n23" class="n3">3号艇</dt><dd><input name="A_04_23" id="A_04_1" class="textbox" type="text" value="{{ old('A_04_23') }}" maxlength="4" onBlur="A_WrapChange( 23 )"></dd></dl></li>
                                    <li><dl><dt id="n24" class="n4">4号艇</dt><dd><input name="A_04_24" id="A_04_1" class="textbox" type="text" value="{{ old('A_04_24') }}" maxlength="4" onBlur="A_WrapChange( 24 )"></dd></dl></li>
                                    <li><dl><dt id="n25" class="n5">5号艇</dt><dd><input name="A_04_25" id="A_04_1" class="textbox" type="text" value="{{ old('A_04_25') }}" maxlength="4" onBlur="A_WrapChange( 25 )"></dd></dl></li>
                                    <li><dl><dt id="n26" class="n6">6号艇</dt><dd><input name="A_04_26" id="A_04_1" class="textbox" type="text" value="{{ old('A_04_26') }}" maxlength="4" onBlur="A_WrapChange( 26 )"></dd></dl></li>
                                    <div class="clear"></div>
                                </ul>
                                
                                <div class="clear"></div>
                                <!--データ複製ここまで-->
                                </div>
                                
                                
                                <div class="more" id="A_add_btn"><a href="javascript:void(0);" onClick="A_add();">追加</a></div>
                                <div class="clear"></div>
                                
                            </div>
                        </div><!--/box A-->
                        
                        
                        
                        <!--◆◆◆【B】◆◆◆-->
                        <div class="box">
                            <h4>B</h4>
                            <div class="box_sub">
                                <h5>イベント情報</h5>
    <div id="btn_normal"><a href="/asp/tsu/admin/mailmagazine/cms_mail_event.asp?id=2228&mode=1" target="_blank">HP引用</a></div>
                                <div class="box_no"><label>非掲載<input name="A_no2" id="A_no" class="checkbox" value="1" type="checkbox" onClick="B_Disable();"  @if(old('A_no2')) checked @endif ></label></div>
                                <textarea name="B_01" id="B_01" class="textarea" onKeyUp="B_WrapChange();" maxlength="2000">{{ old('B_01') }}</textarea>
                            </div>
                        </div><!--/box B-->
                        
                        
                        <!--◆◆◆【C】◆◆◆-->
                        <div class="box">
                            <h4>C</h4>
                            <div class="box_sub">
                                <h5>次節以降の開催予定
                            </h5>
    <div id="btn_reload"><a href="javascript:void(0);" onClick="RaceReload();">再読込</a></div>
                                <div class="box_no"><label>非掲載<input name="A_no5" id="A_no" class="checkbox" value="1" type="checkbox" onClick="D_Disable();" @if(old('A_no5')) checked @endif ></label></div>
                                
                                <dl id="D_01d">
                                    <dt><input name="D_01_1" id="D_01_1" class="textbox" type="text" value="{{ old('D_01_1',$general->create_display_date($race_index[1]->START_DATE,$race_index[1]->END_DATE)) }}" maxlength="18" onKeyUp="D_WrapChange();"></dt>
                                    <dd><input name="D_01_2" id="D_01_2" class="textbox" type="text" value="{{ old('D_01_2',$race_index[1]->RACE_TITLE) }}" maxlength="128" onKeyUp="D_WrapChange();"></dd>
                                    <dt><input name="D_02_1" id="D_02_1" class="textbox" type="text" value="{{ old('D_02_1',$general->create_display_date($race_index[2]->START_DATE,$race_index[2]->END_DATE)) }}" maxlength="18" onKeyUp="D_WrapChange();"></dt>
                                    <dd><input name="D_02_2" id="D_02_2" class="textbox" type="text" value="{{ old('D_02_2',$race_index[2]->RACE_TITLE) }}" maxlength="128" onKeyUp="D_WrapChange();"></dd>
                                    <dt><input name="D_03_1" id="D_03_1" class="textbox" type="text" value="{{ old('D_03_1',$general->create_display_date($race_index[3]->START_DATE,$race_index[3]->END_DATE)) }}" maxlength="18" onKeyUp="D_WrapChange();"></dt>
                                    <dd><input name="D_03_2" id="D_03_2" class="textbox" type="text" value="{{ old('D_03_2',$race_index[3]->RACE_TITLE) }}" maxlength="128" onKeyUp="D_WrapChange();"></dd>
                                    <div class="clear"></div>
                                </dl>
                            </div>
                        </div><!--/box D-->
                        
                        
                        <!--◆◆◆【D】◆◆◆-->
                        <div class="box">
                            <h4>D</h4>
                            <div class="box_sub">
                                <h5>フリースペース</h5>
    <div id="btn_normal"><a href="/asp/tsu/admin/mailmagazine/cms_mail_event.asp?id=2228&mode=2" target="_blank">HP引用</a></div>
                                <div class="box_no"><label>非掲載<input name="A_no6" id="A_no" class="checkbox" value="1" type="checkbox" onClick="E_Disable();"  @if(old('A_no6')) checked @endif></label></div>
                                
                                <textarea name="E_01" id="E_01" class="textarea" maxlength="2000" onKeyUp="E_WrapChange();">{{ old('E_01') }}</textarea>
                            </div>
                        </div><!--/box E-->
                        
                        
                        
                        
                        

                        
                    </div><!--/#mail_form-->
                    
                    <div class="clear"></div>
                    
                </div><!--/#mail_wrapper-->
            
            </div><!--/#main-->
            
            
            <div id="name">
                <dl>
                <dt>作業者名</dt>
                <dd><input name="name" id="name" class="textbox" type="text" maxlength="16" value="{{ old('name') }}"></dd>
                <div class="clear"></div>
                </dl>
                
            </div>
        
        </div><!--/#contents-->
        
        <div id="footer" class="page02">
            <ul>
                <li class="btn01"><a href="javascript:void(0);" onClick="check();">保存</a></li>
            </ul>
        </div><!--/#footer-->
        @csrf
    </form>
    </div>
@endsection


@section('script')
    <!--共通-->
    <script type="text/javascript" src="/cms/cms_mail/js/common.js"></script>

    <script language="Javascript" type="text/javascript">
    <!--
    $(function(){
        //初期値の文字色
        var d_color = '#AAAAAA';
        //通常入力時の文字色
        var f_color = '#333333'; 

        $('.textbox').css('color',d_color).focus(function(){
            if(this.value == this.defaultValue){
                //this.value = '';
                $(this).css('color', f_color);
                D_WrapChange();
            }
        })
        //選択が外れたときの処理
        .blur(function(){
            if($(this).val() == this.defaultValue /*| $(this).val() == '' */){
                $(this).val(this.defaultValue).css('color',d_color);
            };
            D_WrapChange();
        });
    });
    -->
    </script>

    <!-- 選手データ配列 -->
    <script type="text/javascript" src="/asp/tbk/racersearch/js/makePlayerJS.js"></script>
    <!-- 半角変換関数 -->
    <script type="text/javascript" src="/asp/tbk/racersearch/js/funcHalfNumberChange.js"></script>
    <script language="Javascript" type="text/javascript">
    function replaceAll(expression, org, dest){
        return expression.split(org).join(dest);
    }
    function funcSearch( argNum )
    {// 検索ボタン押した時の処理
        var intLoopCount = 0;	// 配列カウント用
        var strReturn = "";	// 検索結果格納用
        var strTouban = "";	// 検索結果格納用
        var strName = "";		// 検索結果格納用
        var strSibu = "";	// 検索結果格納用
        var strTextSearch = argNum
        // 入力チェック
        if( strTextSearch != null && strTextSearch != undefined && strTextSearch != "" )
        {// 入力文字が空ではない時
            strKekkaArray = new Array();
            for( intLoopCount=0 ; intLoopCount < arraySensyuData.length ; intLoopCount++ )
            {// 選手データ配列が存在する限り繰り返す
                var strTempArray;
                // 1選手データを「:::」区切りで配列strTempArrayに格納
                strTempArray = arraySensyuData[ intLoopCount ].split(':::');
                // 正規表現で検索
                myReg = new RegExp( strTextSearch );
                myRes = myReg.test( strTempArray[ 4 ] );
            if( myRes == true )
            {// 検索結果と合致する場合
                // 選手データが何番目の要素かを格納
                strKekkaArray.push( intLoopCount );
            }
            }
            if( strKekkaArray.length > 0 )
            {// 配列の要素数が0より大きい時
                for( intLoopCount = 0 ; intLoopCount < strKekkaArray.length ; intLoopCount++ )
                {
                    var strTempArray;
                    // 1選手データを「:::」区切りで配列strTempArrayに格納
                    strTempArray = arraySensyuData[ strKekkaArray[ intLoopCount ] ].split(':::');
                    // ◆検索結果選手一覧HTML格納
                    strReturn = strTempArray[4] + '　';
                    strReturn = strReturn + replaceAll( strTempArray[9] , '　' , '' )
                    /*for( var intLoopCount2 = replaceAll( strTempArray[9] , '　' , '' ).length ; intLoopCount2 < 6 ; intLoopCount2++ ){
                        strReturn = strReturn + '　'
                    }
                    strReturn = strReturn + '　';*/
                    strReturn = strReturn + '（' + replaceAll( strTempArray[0] , '　' , '' )  + '）';
                }
            }else
            {// 検索結果 合致なし
                strReturn = "該当選手は存在しません。";
            }
        }
        else
        {
        }
        return strReturn;
    }
    function funcLoad(){
        for( intLoopCount = 1 ; intLoopCount < 2 ; intLoopCount++ ){
            document.getElementById('A_add' + intLoopCount ).style.display = 'none';
        }
        document.getElementById('A_add_btn').style.display = '';
        for( intLoopCount = 1 ; intLoopCount < 5 ; intLoopCount++ ){
            document.getElementById('C1_' + intLoopCount + '_add' ).style.display = 'none';
        }
            document.getElementById( 'C2_add_btn' ).style.display = 'none';
        A_WrapChange( 0 );
        B_WrapChange();
        D_WrapChange();
        A_Disable( 0 );
        B_Disable();
        C1_Disable();
        C3_Disable();
        D_Disable();
        E_Disable();
    }
    function A_WrapChange( argNum ){
    // A区分入力反映関数
        var strHTML = '';
        var strTeiText1 = '';
        var strTeiText2 = '';
        var strTeiText3 = '';
        var strTeiText4 = '';
        var strTeiText5 = '';
        var alertText = '';
        var objCompare = '';
        var objCompare2 = '';
        var boolGroupCheck1 = false;
        var boolGroupCheck2 = false;
        var boolGroupCheck3 = false;
        var boolGroupCheck4 = false;
        var boolGroupCheck5 = false;
        var boolGroupCheck6 = false;
        var intTempTime1=0;
        var intTempTime2=0;
        // 序文格納
        if( document.MailForm.A_01.value != "" ){
            strHTML = strHTML + replaceAll( document.MailForm.A_01.value , '\n' , '<br />') + '<br />'
        }
        // 場内情報格納
        if( document.MailForm.A_no3.checked ){
        }else{
            strHTML =strHTML + '<span>■開門&gt;&gt;</span>'; 		document.MailForm.C_01_1.value = funcStr2to1( document.MailForm.C_01_1.value );
            document.MailForm.C_01_2.value = funcStr2to1( document.MailForm.C_01_2.value );
            document.MailForm.C_02_1.value = funcStr2to1( document.MailForm.C_02_1.value );
            document.MailForm.C_02_2.value = funcStr2to1( document.MailForm.C_02_2.value );
            document.MailForm.C_03_1.value = funcStr2to1( document.MailForm.C_03_1.value );
            document.MailForm.C_03_2.value = funcStr2to1( document.MailForm.C_03_2.value );
            if( document.MailForm.A_no3.checked == false ){
                // 開門予定格納
                if( document.MailForm.time_no.checked == false ){
                    if( document.MailForm.C_01_1.value != "" && document.MailForm.C_01_2.value != "" ){
                        strHTML = strHTML + document.MailForm.C_01_1.value + '：' + document.MailForm.C_01_2.value+ '<br />';
                    }else{
                        strHTML = strHTML + '<br />';
                    }
                }else{
                    strHTML = strHTML + '<br />'
                    if( document.MailForm.C_01_3_1.value != "" && document.MailForm.C_01_4_1.value != "" && document.MailForm.C_01_5_1.value != "" ){
                        strHTML = strHTML + '　<span>・</span>' + document.MailForm.C_01_3_1.value + '　' + document.MailForm.C_01_4_1.value + '：' + document.MailForm.C_01_5_1.value + '<br />';
                    }
                    if( document.MailForm.C_01_3_2.value != "" && document.MailForm.C_01_4_2.value != "" && document.MailForm.C_01_5_2.value != "" ){
                        strHTML = strHTML + '　<span>・</span>' + document.MailForm.C_01_3_2.value + '　' + document.MailForm.C_01_4_2.value + '：' + document.MailForm.C_01_5_2.value + '<br />';
                    }
                    if( document.MailForm.C_01_3_3.value != "" && document.MailForm.C_01_4_3.value != "" && document.MailForm.C_01_5_3.value != "" ){
                        strHTML = strHTML + '　<span>・</span>' + document.MailForm.C_01_3_3.value + '　' + document.MailForm.C_01_4_3.value + '：' + document.MailForm.C_01_5_3.value + '<br />';
                    }
                    if( document.MailForm.C_01_3_4.value != "" && document.MailForm.C_01_4_4.value != "" && document.MailForm.C_01_5_4.value != "" ){
                        strHTML = strHTML + '　<span>・</span>' + document.MailForm.C_01_3_4.value + '　' + document.MailForm.C_01_4_4.value + '：' + document.MailForm.C_01_5_4.value + '<br />';
                    }
                }
            }
            strHTML =strHTML + '<span>■第1Rスタート展示&gt;&gt;</span>'; 		if( document.MailForm.A_no3.checked == false ){
                // 1Rスタート展示格納
                if( document.MailForm.C_02_1.value != "" && document.MailForm.C_02_2.value != "" ){
                    strHTML = strHTML + document.MailForm.C_02_1.value + '：' + document.MailForm.C_02_2.value;
                }
            }
            strHTML =strHTML + '<br />';
            strHTML =strHTML + '<span>■第12R締切予定&gt;&gt;</span>'; 
            if( document.MailForm.A_no3.checked == false ){
                // 12R締切予定格納
                if( document.MailForm.C_03_1.value != "" && document.MailForm.C_03_2.value != "" ){
                    strHTML = strHTML + document.MailForm.C_03_1.value + '：' + document.MailForm.C_03_2.value;
                }
            }
            strHTML =strHTML + '<br>';	}
        // 艇番表示フラグに併せてデータ切り替え
        if( document.MailForm.A_031.checked ){
            strTeiText1 = '号艇';
            document.getElementById("A_04d1").className = 'check A_04d';
        }else{
            strTeiText1 = '';
            document.getElementById("A_04d1").className = 'A_04d';
        }
        // 艇番表示フラグに併せてデータ切り替え
        if( document.MailForm.A_032.checked ){
            strTeiText2 = '号艇';
            document.getElementById("A_04d2").className = 'check A_04d';
        }else{
            strTeiText2 = '';
            document.getElementById("A_04d2").className = 'A_04d';
        }
        if( document.MailForm.A_no1.checked == false ){
            // 見出し1格納
            if( document.MailForm.A_021.value != "" ){
                strHTML = strHTML + document.MailForm.A_021.value + '<br />';
            }
            document.MailForm.A_04_11.value = funcStr2to1( document.MailForm.A_04_11.value );
            if( argNum == 11 ){			if( funcSearch( document.MailForm.A_04_11.value ) == '該当選手は存在しません。' ){
                    alert( '登番:' + document.MailForm.A_04_11.value +'は存在しません。' );
                    document.MailForm.A_04_11.value = '';
                }
            }
            if( document.MailForm.A_04_11.value != "" && document.MailForm.A_04_11.value.length==4 ){
                if( argNum == 11 ){
                    alertText = '';
                    for ( var intLoopCount = 1 ; intLoopCount < 3 ; intLoopCount++ ){
                        for( var intLoopCount2 = 1 ; intLoopCount2 < 7 ; intLoopCount2++ ){
                            if( argNum.toString(10) != intLoopCount.toString(10) + intLoopCount2.toString(10) ){
                                objCompare = '';
                                objCompare = document.getElementsByName( 'A_04_' + argNum );
                                objCompare2 = '' 
                                objCompare2 = document.getElementsByName( 'A_04_' + intLoopCount + intLoopCount2 );
                                if( objCompare[0].value == objCompare2[0].value ){
                                    if( argNum.toString(10).substring( 0 , 1 ) == '1' || intLoopCount == 1 ){
                                        boolGroupCheck1 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '2' || intLoopCount == 2 ){
                                        boolGroupCheck2 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '3' || intLoopCount == 3 ){
                                        boolGroupCheck3 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '4' || intLoopCount == 4 ){
                                        boolGroupCheck4 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '5' || intLoopCount == 5 ){
                                        boolGroupCheck5 = true;
                                    }
                                }
                            }
                        }
                    }
                    if( boolGroupCheck1 && boolGroupCheck2 && boolGroupCheck3 && boolGroupCheck4 && boolGroupCheck5  ){
                        alert('全グループで同じ選手が指定されています。\n');
                    }else{
                        if( boolGroupCheck1 ){
                            alertText = alertText + '1グループ';
                        }
                        if( boolGroupCheck2 ){
                            if( boolGroupCheck1 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '2グループ';
                        }
                        if( boolGroupCheck3 ){
                            if( boolGroupCheck1 || boolGroupCheck2 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '3グループ';
                        }
                        if( boolGroupCheck4 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '4グループ';
                        }
                        if( boolGroupCheck5 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '5グループ';
                        }
                        if( boolGroupCheck6 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '6グループ';
                        }
                        if( alertText != '' ){
                            alert( alertText + 'で同じ選手が指定されています。\n' )
                        }
                    }
                }
                strHTML = strHTML + '1' + strTeiText1 + '　' + funcSearch( document.MailForm.A_04_11.value ) + '<br />';
            }
            document.MailForm.A_04_12.value = funcStr2to1( document.MailForm.A_04_12.value );
            if( argNum == 12 ){			if( funcSearch( document.MailForm.A_04_12.value ) == '該当選手は存在しません。' ){
                    alert( '登番:' + document.MailForm.A_04_12.value +'は存在しません。' );
                    document.MailForm.A_04_12.value = '';
                }
            }
            if( document.MailForm.A_04_12.value != "" && document.MailForm.A_04_12.value.length==4 ){
                if( argNum == 12 ){
                    alertText = '';
                    for ( var intLoopCount = 1 ; intLoopCount < 3 ; intLoopCount++ ){
                        for( var intLoopCount2 = 1 ; intLoopCount2 < 7 ; intLoopCount2++ ){
                            if( argNum.toString(10) != intLoopCount.toString(10) + intLoopCount2.toString(10) ){
                                objCompare = '';
                                objCompare = document.getElementsByName( 'A_04_' + argNum );
                                objCompare2 = '' 
                                objCompare2 = document.getElementsByName( 'A_04_' + intLoopCount + intLoopCount2 );
                                if( objCompare[0].value == objCompare2[0].value ){
                                    if( argNum.toString(10).substring( 0 , 1 ) == '1' || intLoopCount == 1 ){
                                        boolGroupCheck1 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '2' || intLoopCount == 2 ){
                                        boolGroupCheck2 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '3' || intLoopCount == 3 ){
                                        boolGroupCheck3 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '4' || intLoopCount == 4 ){
                                        boolGroupCheck4 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '5' || intLoopCount == 5 ){
                                        boolGroupCheck5 = true;
                                    }
                                }
                            }
                        }
                    }
                    if( boolGroupCheck1 && boolGroupCheck2 && boolGroupCheck3 && boolGroupCheck4 && boolGroupCheck5  ){
                        alert('全グループで同じ選手が指定されています。\n');
                    }else{
                        if( boolGroupCheck1 ){
                            alertText = alertText + '1グループ';
                        }
                        if( boolGroupCheck2 ){
                            if( boolGroupCheck1 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '2グループ';
                        }
                        if( boolGroupCheck3 ){
                            if( boolGroupCheck1 || boolGroupCheck2 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '3グループ';
                        }
                        if( boolGroupCheck4 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '4グループ';
                        }
                        if( boolGroupCheck5 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '5グループ';
                        }
                        if( boolGroupCheck6 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '6グループ';
                        }
                        if( alertText != '' ){
                            alert( alertText + 'で同じ選手が指定されています。\n' )
                        }
                    }
                }
                strHTML = strHTML + '2' + strTeiText1 + '　' + funcSearch( document.MailForm.A_04_12.value ) + '<br />';
            }
            document.MailForm.A_04_13.value = funcStr2to1( document.MailForm.A_04_13.value );
            if( argNum == 13 ){			if( funcSearch( document.MailForm.A_04_13.value ) == '該当選手は存在しません。' ){
                    alert( '登番:' + document.MailForm.A_04_13.value +'は存在しません。' );
                    document.MailForm.A_04_13.value = '';
                }
            }
            if( document.MailForm.A_04_13.value != "" && document.MailForm.A_04_13.value.length==4 ){
                if( argNum == 13 ){
                    alertText = '';
                    for ( var intLoopCount = 1 ; intLoopCount < 3 ; intLoopCount++ ){
                        for( var intLoopCount2 = 1 ; intLoopCount2 < 7 ; intLoopCount2++ ){
                            if( argNum.toString(10) != intLoopCount.toString(10) + intLoopCount2.toString(10) ){
                                objCompare = '';
                                objCompare = document.getElementsByName( 'A_04_' + argNum );
                                objCompare2 = '' 
                                objCompare2 = document.getElementsByName( 'A_04_' + intLoopCount + intLoopCount2 );
                                if( objCompare[0].value == objCompare2[0].value ){
                                    if( argNum.toString(10).substring( 0 , 1 ) == '1' || intLoopCount == 1 ){
                                        boolGroupCheck1 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '2' || intLoopCount == 2 ){
                                        boolGroupCheck2 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '3' || intLoopCount == 3 ){
                                        boolGroupCheck3 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '4' || intLoopCount == 4 ){
                                        boolGroupCheck4 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '5' || intLoopCount == 5 ){
                                        boolGroupCheck5 = true;
                                    }
                                }
                            }
                        }
                    }
                    if( boolGroupCheck1 && boolGroupCheck2 && boolGroupCheck3 && boolGroupCheck4 && boolGroupCheck5  ){
                        alert('全グループで同じ選手が指定されています。\n');
                    }else{
                        if( boolGroupCheck1 ){
                            alertText = alertText + '1グループ';
                        }
                        if( boolGroupCheck2 ){
                            if( boolGroupCheck1 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '2グループ';
                        }
                        if( boolGroupCheck3 ){
                            if( boolGroupCheck1 || boolGroupCheck2 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '3グループ';
                        }
                        if( boolGroupCheck4 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '4グループ';
                        }
                        if( boolGroupCheck5 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '5グループ';
                        }
                        if( boolGroupCheck6 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '6グループ';
                        }
                        if( alertText != '' ){
                            alert( alertText + 'で同じ選手が指定されています。\n' )
                        }
                    }
                }
                strHTML = strHTML + '3' + strTeiText1 + '　' + funcSearch( document.MailForm.A_04_13.value ) + '<br />';
            }
            document.MailForm.A_04_14.value = funcStr2to1( document.MailForm.A_04_14.value );
            if( argNum == 14 ){			if( funcSearch( document.MailForm.A_04_14.value ) == '該当選手は存在しません。' ){
                    alert( '登番:' + document.MailForm.A_04_14.value +'は存在しません。' );
                    document.MailForm.A_04_14.value = '';
                }
            }
            if( document.MailForm.A_04_14.value != "" && document.MailForm.A_04_14.value.length==4 ){
                if( argNum == 14 ){
                    alertText = '';
                    for ( var intLoopCount = 1 ; intLoopCount < 3 ; intLoopCount++ ){
                        for( var intLoopCount2 = 1 ; intLoopCount2 < 7 ; intLoopCount2++ ){
                            if( argNum.toString(10) != intLoopCount.toString(10) + intLoopCount2.toString(10) ){
                                objCompare = '';
                                objCompare = document.getElementsByName( 'A_04_' + argNum );
                                objCompare2 = '' 
                                objCompare2 = document.getElementsByName( 'A_04_' + intLoopCount + intLoopCount2 );
                                if( objCompare[0].value == objCompare2[0].value ){
                                    if( argNum.toString(10).substring( 0 , 1 ) == '1' || intLoopCount == 1 ){
                                        boolGroupCheck1 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '2' || intLoopCount == 2 ){
                                        boolGroupCheck2 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '3' || intLoopCount == 3 ){
                                        boolGroupCheck3 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '4' || intLoopCount == 4 ){
                                        boolGroupCheck4 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '5' || intLoopCount == 5 ){
                                        boolGroupCheck5 = true;
                                    }
                                }
                            }
                        }
                    }
                    if( boolGroupCheck1 && boolGroupCheck2 && boolGroupCheck3 && boolGroupCheck4 && boolGroupCheck5  ){
                        alert('全グループで同じ選手が指定されています。\n');
                    }else{
                        if( boolGroupCheck1 ){
                            alertText = alertText + '1グループ';
                        }
                        if( boolGroupCheck2 ){
                            if( boolGroupCheck1 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '2グループ';
                        }
                        if( boolGroupCheck3 ){
                            if( boolGroupCheck1 || boolGroupCheck2 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '3グループ';
                        }
                        if( boolGroupCheck4 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '4グループ';
                        }
                        if( boolGroupCheck5 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '5グループ';
                        }
                        if( boolGroupCheck6 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '6グループ';
                        }
                        if( alertText != '' ){
                            alert( alertText + 'で同じ選手が指定されています。\n' )
                        }
                    }
                }
                strHTML = strHTML + '4' + strTeiText1 + '　' + funcSearch( document.MailForm.A_04_14.value ) + '<br />';
            }
            document.MailForm.A_04_15.value = funcStr2to1( document.MailForm.A_04_15.value );
            if( argNum == 15 ){			if( funcSearch( document.MailForm.A_04_15.value ) == '該当選手は存在しません。' ){
                    alert( '登番:' + document.MailForm.A_04_15.value +'は存在しません。' );
                    document.MailForm.A_04_15.value = '';
                }
            }
            if( document.MailForm.A_04_15.value != "" && document.MailForm.A_04_15.value.length==4 ){
                if( argNum == 15 ){
                    alertText = '';
                    for ( var intLoopCount = 1 ; intLoopCount < 3 ; intLoopCount++ ){
                        for( var intLoopCount2 = 1 ; intLoopCount2 < 7 ; intLoopCount2++ ){
                            if( argNum.toString(10) != intLoopCount.toString(10) + intLoopCount2.toString(10) ){
                                objCompare = '';
                                objCompare = document.getElementsByName( 'A_04_' + argNum );
                                objCompare2 = '' 
                                objCompare2 = document.getElementsByName( 'A_04_' + intLoopCount + intLoopCount2 );
                                if( objCompare[0].value == objCompare2[0].value ){
                                    if( argNum.toString(10).substring( 0 , 1 ) == '1' || intLoopCount == 1 ){
                                        boolGroupCheck1 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '2' || intLoopCount == 2 ){
                                        boolGroupCheck2 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '3' || intLoopCount == 3 ){
                                        boolGroupCheck3 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '4' || intLoopCount == 4 ){
                                        boolGroupCheck4 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '5' || intLoopCount == 5 ){
                                        boolGroupCheck5 = true;
                                    }
                                }
                            }
                        }
                    }
                    if( boolGroupCheck1 && boolGroupCheck2 && boolGroupCheck3 && boolGroupCheck4 && boolGroupCheck5  ){
                        alert('全グループで同じ選手が指定されています。\n');
                    }else{
                        if( boolGroupCheck1 ){
                            alertText = alertText + '1グループ';
                        }
                        if( boolGroupCheck2 ){
                            if( boolGroupCheck1 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '2グループ';
                        }
                        if( boolGroupCheck3 ){
                            if( boolGroupCheck1 || boolGroupCheck2 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '3グループ';
                        }
                        if( boolGroupCheck4 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '4グループ';
                        }
                        if( boolGroupCheck5 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '5グループ';
                        }
                        if( boolGroupCheck6 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '6グループ';
                        }
                        if( alertText != '' ){
                            alert( alertText + 'で同じ選手が指定されています。\n' )
                        }
                    }
                }
                strHTML = strHTML + '5' + strTeiText1 + '　' + funcSearch( document.MailForm.A_04_15.value ) + '<br />';
            }
            document.MailForm.A_04_16.value = funcStr2to1( document.MailForm.A_04_16.value );
            if( argNum == 16 ){			if( funcSearch( document.MailForm.A_04_16.value ) == '該当選手は存在しません。' ){
                    alert( '登番:' + document.MailForm.A_04_16.value +'は存在しません。' );
                    document.MailForm.A_04_16.value = '';
                }
            }
            if( document.MailForm.A_04_16.value != "" && document.MailForm.A_04_16.value.length==4 ){
                if( argNum == 16 ){
                    alertText = '';
                    for ( var intLoopCount = 1 ; intLoopCount < 3 ; intLoopCount++ ){
                        for( var intLoopCount2 = 1 ; intLoopCount2 < 7 ; intLoopCount2++ ){
                            if( argNum.toString(10) != intLoopCount.toString(10) + intLoopCount2.toString(10) ){
                                objCompare = '';
                                objCompare = document.getElementsByName( 'A_04_' + argNum );
                                objCompare2 = '' 
                                objCompare2 = document.getElementsByName( 'A_04_' + intLoopCount + intLoopCount2 );
                                if( objCompare[0].value == objCompare2[0].value ){
                                    if( argNum.toString(10).substring( 0 , 1 ) == '1' || intLoopCount == 1 ){
                                        boolGroupCheck1 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '2' || intLoopCount == 2 ){
                                        boolGroupCheck2 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '3' || intLoopCount == 3 ){
                                        boolGroupCheck3 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '4' || intLoopCount == 4 ){
                                        boolGroupCheck4 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '5' || intLoopCount == 5 ){
                                        boolGroupCheck5 = true;
                                    }
                                }
                            }
                        }
                    }
                    if( boolGroupCheck1 && boolGroupCheck2 && boolGroupCheck3 && boolGroupCheck4 && boolGroupCheck5  ){
                        alert('全グループで同じ選手が指定されています。\n');
                    }else{
                        if( boolGroupCheck1 ){
                            alertText = alertText + '1グループ';
                        }
                        if( boolGroupCheck2 ){
                            if( boolGroupCheck1 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '2グループ';
                        }
                        if( boolGroupCheck3 ){
                            if( boolGroupCheck1 || boolGroupCheck2 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '3グループ';
                        }
                        if( boolGroupCheck4 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '4グループ';
                        }
                        if( boolGroupCheck5 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '5グループ';
                        }
                        if( boolGroupCheck6 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '6グループ';
                        }
                        if( alertText != '' ){
                            alert( alertText + 'で同じ選手が指定されています。\n' )
                        }
                    }
                }
                strHTML = strHTML + '6' + strTeiText1 + '　' + funcSearch( document.MailForm.A_04_16.value ) + '<br />';
            }
            if( document.MailForm.A_022.value != "" || document.MailForm.A_04_21.value != "" || document.MailForm.A_04_22.value != "" || document.MailForm.A_04_23.value != "" || document.MailForm.A_04_24.value != "" || document.MailForm.A_04_25.value != "" || document.MailForm.A_04_26.value ){
                strHTML = strHTML + '<br />';
            }
            // 見出し2格納
            if( document.MailForm.A_022.value != "" ){
                strHTML = strHTML + document.MailForm.A_022.value + '<br />';
            }
            document.MailForm.A_04_21.value = funcStr2to1( document.MailForm.A_04_21.value );
            if( argNum == 21 ){			if( funcSearch( document.MailForm.A_04_21.value ) == '該当選手は存在しません。' ){
                    alert( '登番:' + document.MailForm.A_04_21.value +'は存在しません。' );
                    document.MailForm.A_04_21.value = '';
                }
            }
            if( document.MailForm.A_04_21.value != "" && document.MailForm.A_04_21.value.length==4 ){
                if( argNum == 21 ){
                    alertText = '';
                    for ( var intLoopCount = 1 ; intLoopCount < 3 ; intLoopCount++ ){
                        for( var intLoopCount2 = 1 ; intLoopCount2 < 7 ; intLoopCount2++ ){
                            if( argNum.toString(10) != intLoopCount.toString(10) + intLoopCount2.toString(10) ){
                                objCompare = '';
                                objCompare = document.getElementsByName( 'A_04_' + argNum );
                                objCompare2 = '' 
                                objCompare2 = document.getElementsByName( 'A_04_' + intLoopCount + intLoopCount2 );
                                if( objCompare[0].value == objCompare2[0].value ){
                                    if( argNum.toString(10).substring( 0 , 1 ) == '1' || intLoopCount == 1 ){
                                        boolGroupCheck1 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '2' || intLoopCount == 2 ){
                                        boolGroupCheck2 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '3' || intLoopCount == 3 ){
                                        boolGroupCheck3 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '4' || intLoopCount == 4 ){
                                        boolGroupCheck4 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '5' || intLoopCount == 5 ){
                                        boolGroupCheck5 = true;
                                    }
                                }
                            }
                        }
                    }
                    if( boolGroupCheck1 && boolGroupCheck2 && boolGroupCheck3 && boolGroupCheck4 && boolGroupCheck5  ){
                        alert('全グループで同じ選手が指定されています。\n');
                    }else{
                        if( boolGroupCheck1 ){
                            alertText = alertText + '1グループ';
                        }
                        if( boolGroupCheck2 ){
                            if( boolGroupCheck1 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '2グループ';
                        }
                        if( boolGroupCheck3 ){
                            if( boolGroupCheck1 || boolGroupCheck2 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '3グループ';
                        }
                        if( boolGroupCheck4 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '4グループ';
                        }
                        if( boolGroupCheck5 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '5グループ';
                        }
                        if( boolGroupCheck6 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '6グループ';
                        }
                        if( alertText != '' ){
                            alert( alertText + 'で同じ選手が指定されています。\n' )
                        }
                    }
                }
                strHTML = strHTML + '1' + strTeiText2 + '　' + funcSearch( document.MailForm.A_04_21.value ) + '<br />';
            }
            document.MailForm.A_04_22.value = funcStr2to1( document.MailForm.A_04_22.value );
            if( argNum == 22 ){			if( funcSearch( document.MailForm.A_04_22.value ) == '該当選手は存在しません。' ){
                    alert( '登番:' + document.MailForm.A_04_22.value +'は存在しません。' );
                    document.MailForm.A_04_22.value = '';
                }
            }
            if( document.MailForm.A_04_22.value != "" && document.MailForm.A_04_22.value.length==4 ){
                if( argNum == 22 ){
                    alertText = '';
                    for ( var intLoopCount = 1 ; intLoopCount < 3 ; intLoopCount++ ){
                        for( var intLoopCount2 = 1 ; intLoopCount2 < 7 ; intLoopCount2++ ){
                            if( argNum.toString(10) != intLoopCount.toString(10) + intLoopCount2.toString(10) ){
                                objCompare = '';
                                objCompare = document.getElementsByName( 'A_04_' + argNum );
                                objCompare2 = '' 
                                objCompare2 = document.getElementsByName( 'A_04_' + intLoopCount + intLoopCount2 );
                                if( objCompare[0].value == objCompare2[0].value ){
                                    if( argNum.toString(10).substring( 0 , 1 ) == '1' || intLoopCount == 1 ){
                                        boolGroupCheck1 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '2' || intLoopCount == 2 ){
                                        boolGroupCheck2 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '3' || intLoopCount == 3 ){
                                        boolGroupCheck3 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '4' || intLoopCount == 4 ){
                                        boolGroupCheck4 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '5' || intLoopCount == 5 ){
                                        boolGroupCheck5 = true;
                                    }
                                }
                            }
                        }
                    }
                    if( boolGroupCheck1 && boolGroupCheck2 && boolGroupCheck3 && boolGroupCheck4 && boolGroupCheck5  ){
                        alert('全グループで同じ選手が指定されています。\n');
                    }else{
                        if( boolGroupCheck1 ){
                            alertText = alertText + '1グループ';
                        }
                        if( boolGroupCheck2 ){
                            if( boolGroupCheck1 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '2グループ';
                        }
                        if( boolGroupCheck3 ){
                            if( boolGroupCheck1 || boolGroupCheck2 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '3グループ';
                        }
                        if( boolGroupCheck4 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '4グループ';
                        }
                        if( boolGroupCheck5 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '5グループ';
                        }
                        if( boolGroupCheck6 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '6グループ';
                        }
                        if( alertText != '' ){
                            alert( alertText + 'で同じ選手が指定されています。\n' )
                        }
                    }
                }
                strHTML = strHTML + '2' + strTeiText2 + '　' + funcSearch( document.MailForm.A_04_22.value ) + '<br />';
            }
            document.MailForm.A_04_23.value = funcStr2to1( document.MailForm.A_04_23.value );
            if( argNum == 23 ){			if( funcSearch( document.MailForm.A_04_23.value ) == '該当選手は存在しません。' ){
                    alert( '登番:' + document.MailForm.A_04_23.value +'は存在しません。' );
                    document.MailForm.A_04_23.value = '';
                }
            }
            if( document.MailForm.A_04_23.value != "" && document.MailForm.A_04_23.value.length==4 ){
                if( argNum == 23 ){
                    alertText = '';
                    for ( var intLoopCount = 1 ; intLoopCount < 3 ; intLoopCount++ ){
                        for( var intLoopCount2 = 1 ; intLoopCount2 < 7 ; intLoopCount2++ ){
                            if( argNum.toString(10) != intLoopCount.toString(10) + intLoopCount2.toString(10) ){
                                objCompare = '';
                                objCompare = document.getElementsByName( 'A_04_' + argNum );
                                objCompare2 = '' 
                                objCompare2 = document.getElementsByName( 'A_04_' + intLoopCount + intLoopCount2 );
                                if( objCompare[0].value == objCompare2[0].value ){
                                    if( argNum.toString(10).substring( 0 , 1 ) == '1' || intLoopCount == 1 ){
                                        boolGroupCheck1 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '2' || intLoopCount == 2 ){
                                        boolGroupCheck2 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '3' || intLoopCount == 3 ){
                                        boolGroupCheck3 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '4' || intLoopCount == 4 ){
                                        boolGroupCheck4 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '5' || intLoopCount == 5 ){
                                        boolGroupCheck5 = true;
                                    }
                                }
                            }
                        }
                    }
                    if( boolGroupCheck1 && boolGroupCheck2 && boolGroupCheck3 && boolGroupCheck4 && boolGroupCheck5  ){
                        alert('全グループで同じ選手が指定されています。\n');
                    }else{
                        if( boolGroupCheck1 ){
                            alertText = alertText + '1グループ';
                        }
                        if( boolGroupCheck2 ){
                            if( boolGroupCheck1 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '2グループ';
                        }
                        if( boolGroupCheck3 ){
                            if( boolGroupCheck1 || boolGroupCheck2 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '3グループ';
                        }
                        if( boolGroupCheck4 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '4グループ';
                        }
                        if( boolGroupCheck5 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '5グループ';
                        }
                        if( boolGroupCheck6 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '6グループ';
                        }
                        if( alertText != '' ){
                            alert( alertText + 'で同じ選手が指定されています。\n' )
                        }
                    }
                }
                strHTML = strHTML + '3' + strTeiText2 + '　' + funcSearch( document.MailForm.A_04_23.value ) + '<br />';
            }
            document.MailForm.A_04_24.value = funcStr2to1( document.MailForm.A_04_24.value );
            if( argNum == 24 ){			if( funcSearch( document.MailForm.A_04_24.value ) == '該当選手は存在しません。' ){
                    alert( '登番:' + document.MailForm.A_04_24.value +'は存在しません。' );
                    document.MailForm.A_04_24.value = '';
                }
            }
            if( document.MailForm.A_04_24.value != "" && document.MailForm.A_04_24.value.length==4 ){
                if( argNum == 24 ){
                    alertText = '';
                    for ( var intLoopCount = 1 ; intLoopCount < 3 ; intLoopCount++ ){
                        for( var intLoopCount2 = 1 ; intLoopCount2 < 7 ; intLoopCount2++ ){
                            if( argNum.toString(10) != intLoopCount.toString(10) + intLoopCount2.toString(10) ){
                                objCompare = '';
                                objCompare = document.getElementsByName( 'A_04_' + argNum );
                                objCompare2 = '' 
                                objCompare2 = document.getElementsByName( 'A_04_' + intLoopCount + intLoopCount2 );
                                if( objCompare[0].value == objCompare2[0].value ){
                                    if( argNum.toString(10).substring( 0 , 1 ) == '1' || intLoopCount == 1 ){
                                        boolGroupCheck1 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '2' || intLoopCount == 2 ){
                                        boolGroupCheck2 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '3' || intLoopCount == 3 ){
                                        boolGroupCheck3 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '4' || intLoopCount == 4 ){
                                        boolGroupCheck4 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '5' || intLoopCount == 5 ){
                                        boolGroupCheck5 = true;
                                    }
                                }
                            }
                        }
                    }
                    if( boolGroupCheck1 && boolGroupCheck2 && boolGroupCheck3 && boolGroupCheck4 && boolGroupCheck5  ){
                        alert('全グループで同じ選手が指定されています。\n');
                    }else{
                        if( boolGroupCheck1 ){
                            alertText = alertText + '1グループ';
                        }
                        if( boolGroupCheck2 ){
                            if( boolGroupCheck1 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '2グループ';
                        }
                        if( boolGroupCheck3 ){
                            if( boolGroupCheck1 || boolGroupCheck2 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '3グループ';
                        }
                        if( boolGroupCheck4 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '4グループ';
                        }
                        if( boolGroupCheck5 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '5グループ';
                        }
                        if( boolGroupCheck6 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '6グループ';
                        }
                        if( alertText != '' ){
                            alert( alertText + 'で同じ選手が指定されています。\n' )
                        }
                    }
                }
                strHTML = strHTML + '4' + strTeiText2 + '　' + funcSearch( document.MailForm.A_04_24.value ) + '<br />';
            }
            document.MailForm.A_04_25.value = funcStr2to1( document.MailForm.A_04_25.value );
            if( argNum == 25 ){			if( funcSearch( document.MailForm.A_04_25.value ) == '該当選手は存在しません。' ){
                    alert( '登番:' + document.MailForm.A_04_25.value +'は存在しません。' );
                    document.MailForm.A_04_25.value = '';
                }
            }
            if( document.MailForm.A_04_25.value != "" && document.MailForm.A_04_25.value.length==4 ){
                if( argNum == 25 ){
                    alertText = '';
                    for ( var intLoopCount = 1 ; intLoopCount < 3 ; intLoopCount++ ){
                        for( var intLoopCount2 = 1 ; intLoopCount2 < 7 ; intLoopCount2++ ){
                            if( argNum.toString(10) != intLoopCount.toString(10) + intLoopCount2.toString(10) ){
                                objCompare = '';
                                objCompare = document.getElementsByName( 'A_04_' + argNum );
                                objCompare2 = '' 
                                objCompare2 = document.getElementsByName( 'A_04_' + intLoopCount + intLoopCount2 );
                                if( objCompare[0].value == objCompare2[0].value ){
                                    if( argNum.toString(10).substring( 0 , 1 ) == '1' || intLoopCount == 1 ){
                                        boolGroupCheck1 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '2' || intLoopCount == 2 ){
                                        boolGroupCheck2 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '3' || intLoopCount == 3 ){
                                        boolGroupCheck3 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '4' || intLoopCount == 4 ){
                                        boolGroupCheck4 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '5' || intLoopCount == 5 ){
                                        boolGroupCheck5 = true;
                                    }
                                }
                            }
                        }
                    }
                    if( boolGroupCheck1 && boolGroupCheck2 && boolGroupCheck3 && boolGroupCheck4 && boolGroupCheck5  ){
                        alert('全グループで同じ選手が指定されています。\n');
                    }else{
                        if( boolGroupCheck1 ){
                            alertText = alertText + '1グループ';
                        }
                        if( boolGroupCheck2 ){
                            if( boolGroupCheck1 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '2グループ';
                        }
                        if( boolGroupCheck3 ){
                            if( boolGroupCheck1 || boolGroupCheck2 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '3グループ';
                        }
                        if( boolGroupCheck4 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '4グループ';
                        }
                        if( boolGroupCheck5 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '5グループ';
                        }
                        if( boolGroupCheck6 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '6グループ';
                        }
                        if( alertText != '' ){
                            alert( alertText + 'で同じ選手が指定されています。\n' )
                        }
                    }
                }
                strHTML = strHTML + '5' + strTeiText2 + '　' + funcSearch( document.MailForm.A_04_25.value ) + '<br />';
            }
            document.MailForm.A_04_26.value = funcStr2to1( document.MailForm.A_04_26.value );
            if( argNum == 26 ){			if( funcSearch( document.MailForm.A_04_26.value ) == '該当選手は存在しません。' ){
                    alert( '登番:' + document.MailForm.A_04_26.value +'は存在しません。' );
                    document.MailForm.A_04_26.value = '';
                }
            }
            if( document.MailForm.A_04_26.value != "" && document.MailForm.A_04_26.value.length==4 ){
                if( argNum == 26 ){
                    alertText = '';
                    for ( var intLoopCount = 1 ; intLoopCount < 3 ; intLoopCount++ ){
                        for( var intLoopCount2 = 1 ; intLoopCount2 < 7 ; intLoopCount2++ ){
                            if( argNum.toString(10) != intLoopCount.toString(10) + intLoopCount2.toString(10) ){
                                objCompare = '';
                                objCompare = document.getElementsByName( 'A_04_' + argNum );
                                objCompare2 = '' 
                                objCompare2 = document.getElementsByName( 'A_04_' + intLoopCount + intLoopCount2 );
                                if( objCompare[0].value == objCompare2[0].value ){
                                    if( argNum.toString(10).substring( 0 , 1 ) == '1' || intLoopCount == 1 ){
                                        boolGroupCheck1 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '2' || intLoopCount == 2 ){
                                        boolGroupCheck2 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '3' || intLoopCount == 3 ){
                                        boolGroupCheck3 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '4' || intLoopCount == 4 ){
                                        boolGroupCheck4 = true;
                                    }
                                    if( argNum.toString(10).substring( 0 , 1 ) == '5' || intLoopCount == 5 ){
                                        boolGroupCheck5 = true;
                                    }
                                }
                            }
                        }
                    }
                    if( boolGroupCheck1 && boolGroupCheck2 && boolGroupCheck3 && boolGroupCheck4 && boolGroupCheck5  ){
                        alert('全グループで同じ選手が指定されています。\n');
                    }else{
                        if( boolGroupCheck1 ){
                            alertText = alertText + '1グループ';
                        }
                        if( boolGroupCheck2 ){
                            if( boolGroupCheck1 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '2グループ';
                        }
                        if( boolGroupCheck3 ){
                            if( boolGroupCheck1 || boolGroupCheck2 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '3グループ';
                        }
                        if( boolGroupCheck4 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '4グループ';
                        }
                        if( boolGroupCheck5 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '5グループ';
                        }
                        if( boolGroupCheck6 ){
                            if( boolGroupCheck1 || boolGroupCheck2 || boolGroupCheck3 || boolGroupCheck4 || boolGroupCheck4 ){
                                alertText = alertText + 'と'
                            }
                            alertText = alertText + '6グループ';
                        }
                        if( alertText != '' ){
                            alert( alertText + 'で同じ選手が指定されています。\n' )
                        }
                    }
                }
                strHTML = strHTML + '6' + strTeiText2 + '　' + funcSearch( document.MailForm.A_04_26.value ) + '<br />';
            }
        }else{
        }
        if( document.getElementById ){
            for( var intLoopCount = 1 ; intLoopCount <= 6 ; intLoopCount++ ){
                document.getElementById("n1" + intLoopCount ).innerHTML = intLoopCount + strTeiText1;
            }
            for( var intLoopCount = 1 ; intLoopCount <= 6 ; intLoopCount++ ){
                document.getElementById("n2" + intLoopCount ).innerHTML = intLoopCount + strTeiText2;
            }
            if( strHTML == '' ){
            
                strHTML = '<br /><br /><br />';
            
            }else{
                for( intLoopCount = strHTML.split('<br />').length - 1; intLoopCount < 3 ; intLoopCount++ ){
                    strHTML = strHTML + '<br />';
                }
            }
            document.getElementById("A_wrap").innerHTML = strHTML;
        }
    }
    var intACount = 1;
    function A_add(){
        document.getElementById('A_add' + intACount ).style.display = '';
        intACount++;
        if( intACount > 1 ){
            document.getElementById('A_add_btn').style.display = 'none';
        }
    }
    function A_Disable(){
        if( document.MailForm.A_no1.checked ){
            document.MailForm.A_021.disabled = true;
            document.MailForm.A_031.disabled = true;
            document.MailForm.A_04_11.disabled = true;
            document.MailForm.A_04_12.disabled = true;
            document.MailForm.A_04_13.disabled = true;
            document.MailForm.A_04_14.disabled = true;
            document.MailForm.A_04_15.disabled = true;
            document.MailForm.A_04_16.disabled = true;
            document.MailForm.A_022.disabled = true;
            document.MailForm.A_032.disabled = true;
            document.MailForm.A_04_21.disabled = true;
            document.MailForm.A_04_22.disabled = true;
            document.MailForm.A_04_23.disabled = true;
            document.MailForm.A_04_24.disabled = true;
            document.MailForm.A_04_25.disabled = true;
            document.MailForm.A_04_26.disabled = true;
        }else{
            document.MailForm.A_021.disabled = false;
            document.MailForm.A_031.disabled = false;
            document.MailForm.A_04_11.disabled = false;
            document.MailForm.A_04_12.disabled = false;
            document.MailForm.A_04_13.disabled = false;
            document.MailForm.A_04_14.disabled = false;
            document.MailForm.A_04_15.disabled = false;
            document.MailForm.A_04_16.disabled = false;
            document.MailForm.A_022.disabled = false;
            document.MailForm.A_032.disabled = false;
            document.MailForm.A_04_21.disabled = false;
            document.MailForm.A_04_22.disabled = false;
            document.MailForm.A_04_23.disabled = false;
            document.MailForm.A_04_24.disabled = false;
            document.MailForm.A_04_25.disabled = false;
            document.MailForm.A_04_26.disabled = false;
        }
        A_WrapChange( 0 );
    }
    function B_Disable(){
        if( document.MailForm.A_no2.checked ){
            document.MailForm.B_01.disabled = true;
        }else{
            document.MailForm.B_01.disabled = false;
        }
        B_WrapChange();
    }
    function B_WrapChange( ){
    // B区分入力反映関数
        var strHTML = '';
        if( document.MailForm.A_no2.checked == false ){
            // イベントファン格納
            if( document.MailForm.B_01.value != "" ){
                strHTML = strHTML + replaceAll( document.MailForm.B_01.value , '\n' , '<br />') + '<br />'
            }
        }
        if( document.getElementById ){
            if( strHTML == '' ){
            
                strHTML = '<br /><br /><br />';
            
            }else{
                for( intLoopCount = strHTML.split('<br />').length - 1; intLoopCount < 3 ; intLoopCount++ ){
                    strHTML = strHTML + '<br />';
                }
            }
            document.getElementById("B_wrap").innerHTML = strHTML;
        }
    }
    function C1_Disable(){
        if( document.MailForm.A_no3.checked ){
            document.MailForm.C_01_1.disabled = true;
            document.MailForm.C_01_2.disabled = true;
            document.MailForm.C_02_1.disabled = true;
            document.MailForm.C_02_2.disabled = true;
            document.MailForm.C_03_1.disabled = true;
            document.MailForm.C_03_2.disabled = true;
            document.MailForm.C_01_3_1.disabled = true;
            document.MailForm.C_01_3_2.disabled = true;
            document.MailForm.C_01_3_3.disabled = true;
            document.MailForm.C_01_3_4.disabled = true;
            document.MailForm.C_01_4_1.disabled = true;
            document.MailForm.C_01_4_2.disabled = true;
            document.MailForm.C_01_4_3.disabled = true;
            document.MailForm.C_01_4_4.disabled = true;
            document.MailForm.C_01_5_1.disabled = true;
            document.MailForm.C_01_5_2.disabled = true;
            document.MailForm.C_01_5_3.disabled = true;
            document.MailForm.C_01_5_4.disabled = true;
            document.MailForm.time_no.disabled = true;
        }else{
            if( document.MailForm.time_no.checked ){
                document.MailForm.C_01_3_1.disabled = false;
                document.MailForm.C_01_3_2.disabled = false;
                document.MailForm.C_01_3_3.disabled = false;
                document.MailForm.C_01_3_4.disabled = false;
                document.MailForm.C_01_4_1.disabled = false;
                document.MailForm.C_01_4_2.disabled = false;
                document.MailForm.C_01_4_3.disabled = false;
                document.MailForm.C_01_4_4.disabled = false;
                document.MailForm.C_01_5_1.disabled = false;
                document.MailForm.C_01_5_2.disabled = false;
                document.MailForm.C_01_5_3.disabled = false;
                document.MailForm.C_01_5_4.disabled = false;
            }else{
                document.MailForm.C_01_1.disabled = false;
                document.MailForm.C_01_2.disabled = false;
            }
            document.MailForm.time_no.disabled = false;
            document.MailForm.C_02_1.disabled = false;
            document.MailForm.C_02_2.disabled = false;
            document.MailForm.C_03_1.disabled = false;
            document.MailForm.C_03_2.disabled = false;
        }
        A_WrapChange( 0 );
    }
    intCCount2 = 3;
    function C3_Disable(){
        if( document.MailForm.time_no.checked ){
            if( intCCount2 > 3 ){			document.getElementById( 'C2_add_btn' ).style.display = 'none';
            }else{
                // 登録データが3件以内の時チェック入れたとき2件表示するように変更
                intCCount2 = 3;
                document.getElementById( 'C2_add_btn' ).style.display = '';
            }
            for( var intLoopCount = 1 ; intLoopCount < intCCount2 ; intLoopCount++ ){
                document.getElementById('C1_' + intLoopCount + '_add' ).style.display = '';
            }
            document.MailForm.C_01_1.disabled = true;
            document.MailForm.C_01_2.disabled = true;
            document.MailForm.C_01_3_1.disabled = false;
            document.MailForm.C_01_4_1.disabled = false;
            document.MailForm.C_01_5_1.disabled = false;
            document.MailForm.C_01_3_2.disabled = false;
            document.MailForm.C_01_4_2.disabled = false;
            document.MailForm.C_01_5_2.disabled = false;
            document.MailForm.C_01_3_3.disabled = false;
            document.MailForm.C_01_4_3.disabled = false;
            document.MailForm.C_01_5_3.disabled = false;
            document.MailForm.C_01_3_4.disabled = false;
            document.MailForm.C_01_4_4.disabled = false;
            document.MailForm.C_01_5_4.disabled = false;
        }else{
            document.getElementById('C1_1_add' ).style.display = 'none';
            document.getElementById('C1_2_add' ).style.display = 'none';
            document.getElementById('C1_3_add' ).style.display = 'none';
            document.getElementById('C1_4_add' ).style.display = 'none';
            document.getElementById( 'C2_add_btn' ).style.display = 'none';
            document.MailForm.C_01_1.disabled = false;
            document.MailForm.C_01_2.disabled = false;
            document.MailForm.C_01_3_1.disabled = true;
            document.MailForm.C_01_4_1.disabled = true;
            document.MailForm.C_01_5_1.disabled = true;
            document.MailForm.C_01_3_2.disabled = true;
            document.MailForm.C_01_4_2.disabled = true;
            document.MailForm.C_01_5_2.disabled = true;
            document.MailForm.C_01_3_3.disabled = true;
            document.MailForm.C_01_4_3.disabled = true;
            document.MailForm.C_01_5_3.disabled = true;
            document.MailForm.C_01_3_4.disabled = true;
            document.MailForm.C_01_4_4.disabled = true;
            document.MailForm.C_01_5_4.disabled = true;
        }
    }
    function C3_add(){
        document.getElementById('C1_' + intCCount2 + '_add' ).style.display = '';
        intCCount2++;
        if( intCCount2 > 4 ){
            document.getElementById('C2_add_btn').style.display = 'none';
        }
    }
    function D_WrapChange( ){
    // D区分入力反映関数
        var strHTML = '';
        if( document.MailForm.A_no5.checked == false ){
            // 開門予定格納
            if( document.MailForm.D_01_1.value != "" ){
                strHTML = strHTML + document.MailForm.D_01_1.value + '　';
            }
            if( document.MailForm.D_01_2.value != "" ){
                strHTML = strHTML + document.MailForm.D_01_2.value;
            }
            if(strHTML != ""){
                strHTML = strHTML + '<br />';
            }
            if( document.MailForm.D_02_1.value != "" ){
                strHTML = strHTML + document.MailForm.D_02_1.value + '　';
            }
            if( document.MailForm.D_02_2.value != "" ){
                strHTML = strHTML + document.MailForm.D_02_2.value;
            }
            if(strHTML != ""){
                strHTML = strHTML + '<br />';
            }
            if( document.MailForm.D_03_1.value != "" ){
                strHTML = strHTML + document.MailForm.D_03_1.value + '　';
            }
            if( document.MailForm.D_03_2.value != "" ){
                strHTML = strHTML + document.MailForm.D_03_2.value;
            }
            if(strHTML != ""){
                strHTML = strHTML + '<br />';
            }
        }
        if( document.getElementById ){
            if( strHTML == '' ){
            
                strHTML = '<br /><br /><br />';
            
            }else{
                for( intLoopCount = strHTML.split('<br />').length - 1; intLoopCount < 3 ; intLoopCount++ ){
                    strHTML = strHTML + '<br />';
                }
            }
            document.getElementById("C_wrap").innerHTML = strHTML;
        }
    }
    function D_Disable(){
        if( document.MailForm.A_no5.checked ){
            document.MailForm.D_01_1.disabled = true;
            document.MailForm.D_01_2.disabled = true;
            document.MailForm.D_02_1.disabled = true;
            document.MailForm.D_02_2.disabled = true;
            document.MailForm.D_03_1.disabled = true;
            document.MailForm.D_03_2.disabled = true;
        }else{
            document.MailForm.D_01_1.disabled = false;
            document.MailForm.D_01_2.disabled = false;
            document.MailForm.D_02_1.disabled = false;
            document.MailForm.D_02_2.disabled = false;
            document.MailForm.D_03_1.disabled = false;
            document.MailForm.D_03_2.disabled = false;
        }
        D_WrapChange();
    }
    function E_WrapChange( ){
    // D区分入力反映関数
        var strHTML = '';
        if( document.MailForm.A_no6.checked == false ){
            // 開門予定格納
            if( document.MailForm.E_01.value != "" ){
                strHTML = strHTML + replaceAll( document.MailForm.E_01.value , '\n' , '<br />');
            }
        }
        if( document.getElementById ){
            if( strHTML == '' ){
            
                strHTML = '<br /><br /><br />';
            
            }else{
                for( intLoopCount = strHTML.split('<br />').length - 1; intLoopCount < 3 ; intLoopCount++ ){
                    strHTML = strHTML + '<br />';
                }
            }
            document.getElementById("D_wrap").innerHTML = strHTML;
        }
    }
    function E_Disable(){
        if( document.MailForm.A_no6.checked ){
            document.MailForm.E_01.disabled = true;
        }else{
            document.MailForm.E_01.disabled = false;
        }
        E_WrapChange();
    }
    function check(){
        var boolCheck = true;
        var strText = '';
        
        if( document.MailForm.A_01.value.length > 2000   ){
            boolCheck = false;
            strText = strText + '序文は2000文字以内で入力してください。\n'
        }
        if( int( document.MailForm.A_04_11.value ) == false &&  document.MailForm.A_04_11.value != '' ){
            boolCheck = false;
            strText = strText + 'レース情報1段目1号艇は4桁の数字で入力してください。\n'
        }
        if( int( document.MailForm.A_04_12.value ) == false &&  document.MailForm.A_04_12.value != '' ){
            boolCheck = false;
            strText = strText + 'レース情報1段目2号艇は4桁の数字で入力してください。\n'
        }
        if( int( document.MailForm.A_04_13.value ) == false &&  document.MailForm.A_04_13.value != '' ){
            boolCheck = false;
            strText = strText + 'レース情報1段目3号艇は4桁の数字で入力してください。\n'
        }
        if( int( document.MailForm.A_04_14.value ) == false &&  document.MailForm.A_04_14.value != '' ){
            boolCheck = false;
            strText = strText + 'レース情報1段目4号艇は4桁の数字で入力してください。\n'
        }
        if( int( document.MailForm.A_04_15.value ) == false &&  document.MailForm.A_04_15.value != '' ){
            boolCheck = false;
            strText = strText + 'レース情報1段目5号艇は4桁の数字で入力してください。\n'
        }
        if( int( document.MailForm.A_04_16.value ) == false &&  document.MailForm.A_04_16.value != '' ){
            boolCheck = false;
            strText = strText + 'レース情報1段目6号艇は4桁の数字で入力してください。\n'
        }
        if( int( document.MailForm.A_04_21.value ) == false &&  document.MailForm.A_04_21.value != '' ){
            boolCheck = false;
            strText = strText + 'レース情報2段目1号艇は4桁の数字で入力してください。\n'
        }
        if( int( document.MailForm.A_04_22.value ) == false &&  document.MailForm.A_04_22.value != '' ){
            boolCheck = false;
            strText = strText + 'レース情報2段目2号艇は4桁の数字で入力してください。\n'
        }
        if( int( document.MailForm.A_04_23.value ) == false &&  document.MailForm.A_04_23.value != '' ){
            boolCheck = false;
            strText = strText + 'レース情報2段目3号艇は4桁の数字で入力してください。\n'
        }
        if( int( document.MailForm.A_04_24.value ) == false &&  document.MailForm.A_04_24.value != '' ){
            boolCheck = false;
            strText = strText + 'レース情報2段目4号艇は4桁の数字で入力してください。\n'
        }
        if( int( document.MailForm.A_04_25.value ) == false &&  document.MailForm.A_04_25.value != '' ){
            boolCheck = false;
            strText = strText + 'レース情報2段目5号艇は4桁の数字で入力してください。\n'
        }
        if( int( document.MailForm.A_04_26.value ) == false &&  document.MailForm.A_04_26.value != '' ){
            boolCheck = false;
            strText = strText + 'レース情報2段目6号艇は4桁の数字で入力してください。\n'
        }
        if( document.MailForm.B_01.value.length > 2000   ){
            boolCheck = false;
            strText = strText + 'イベント情報は2000文字以内で入力してください。\n'
        }
        if( ( document.MailForm.C_01_1.value != '' && document.MailForm.C_01_1.value.length != 2 ) || ( document.MailForm.C_01_1.value != '' && int( document.MailForm.C_01_1.value ) == false ) ){
            boolCheck = false;
            strText = strText + '開門時刻(時)は数字2文字で入力してください。\n'
        }
        if( ( document.MailForm.C_01_2.value != '' && document.MailForm.C_01_2.value.length != 2 ) || ( document.MailForm.C_01_2.value != '' && int( document.MailForm.C_01_2.value ) == false ) ){
            boolCheck = false;
            strText = strText + '開門時刻(分)は数字2文字で入力してください。\n'
        }
        if( ( document.MailForm.C_02_1.value != '' && document.MailForm.C_02_1.value.length != 2 ) || ( document.MailForm.C_02_1.value != '' && int( document.MailForm.C_02_1.value ) == false ) ){
            boolCheck = false;
            strText = strText + '1Rスタート展示(時)は数字2文字で入力してください。\n'
        }
        if( ( document.MailForm.C_02_2.value != '' && document.MailForm.C_02_2.value.length != 2 ) || ( document.MailForm.C_02_2.value != '' && int( document.MailForm.C_02_2.value ) == false ) ){
            boolCheck = false;
            strText = strText + '1Rスタート展示(分)は数字2文字で入力してください。\n'
        }
        if( ( document.MailForm.C_03_1.value != '' && document.MailForm.C_03_1.value.length != 2 ) || ( document.MailForm.C_03_1.value != '' && int( document.MailForm.C_03_1.value ) == false ) ){
            boolCheck = false;
            strText = strText + '12R発売締切予定(時)は数字2文字で入力してください。\n'
        }
        if( ( document.MailForm.C_03_2.value != '' && document.MailForm.C_03_2.value.length != 2 ) || ( document.MailForm.C_03_2.value != '' && int( document.MailForm.C_03_2.value ) == false ) ){
            boolCheck = false;
            strText = strText + '12R発売締切予定(分)は数字2文字で入力してください。\n'
        }
        if( document.MailForm.E_01.value.length > 2000   ){
            boolCheck = false;
            strText = strText + 'フリースペースは2000文字以内で入力してください。\n'
        }
        if( document.MailForm.name.value == ''  ){
            boolCheck = false;
            strText = strText + '作業者名を入力してください。\n'
        }else if( document.MailForm.name.value.length >32 ){
            boolCheck = false;
            strText = strText + '作業者名を32文字以内で入力してください。\n'
        }
        if( boolCheck ){
        
            funcCheckInsert();
            //document.MailForm.action = 'cms_mail2_execute.asp?yd=20180727&id=0&save=1';
            document.MailForm.submit();
        }else{
            alert( strText );
        }
    }
    function check2(){
        res =confirm('内容を保存しますか？\n');
        if(res == false)
        {
            clicked=false;
            if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){
                var referLink = document.createElement('a');
                referLink.href='cms_mail3.asp?yd=20180727&id=0';
                document.body.appendChild(referLink);
                referLink.click();
            } else {
                document.location.href='cms_mail3.asp?yd=20180727&id=0';
            }
        }else{
            var boolCheck = true;
            var strText = '';
            
            if( document.MailForm.A_01.value.length > 2000   ){
                boolCheck = false;
                strText = strText + '序文は2000文字以内で入力してください。\n'
            }
            if( int( document.MailForm.A_04_11.value ) == false &&  document.MailForm.A_04_11.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報1段目1号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_12.value ) == false &&  document.MailForm.A_04_12.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報1段目2号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_13.value ) == false &&  document.MailForm.A_04_13.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報1段目3号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_14.value ) == false &&  document.MailForm.A_04_14.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報1段目4号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_15.value ) == false &&  document.MailForm.A_04_15.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報1段目5号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_16.value ) == false &&  document.MailForm.A_04_16.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報1段目6号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_21.value ) == false &&  document.MailForm.A_04_21.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報2段目1号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_22.value ) == false &&  document.MailForm.A_04_22.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報2段目2号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_23.value ) == false &&  document.MailForm.A_04_23.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報2段目3号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_24.value ) == false &&  document.MailForm.A_04_24.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報2段目4号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_25.value ) == false &&  document.MailForm.A_04_25.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報2段目5号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_26.value ) == false &&  document.MailForm.A_04_26.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報2段目6号艇は4桁の数字で入力してください。\n'
            }
            if( document.MailForm.B_01.value.length > 2000   ){
                boolCheck = false;
                strText = strText + 'イベント情報は2000文字以内で入力してください。\n'
            }
            if( ( document.MailForm.C_01_1.value != '' && document.MailForm.C_01_1.value.length != 2 ) || ( document.MailForm.C_01_1.value != '' && int( document.MailForm.C_01_1.value ) == false ) ){
                boolCheck = false;
                strText = strText + '開門時刻(時)は数字2文字で入力してください。\n'
            }
            if( ( document.MailForm.C_01_2.value != '' && document.MailForm.C_01_2.value.length != 2 ) || ( document.MailForm.C_01_2.value != '' && int( document.MailForm.C_01_2.value ) == false ) ){
                boolCheck = false;
                strText = strText + '開門時刻(分)は数字2文字で入力してください。\n'
            }
            if( ( document.MailForm.C_02_1.value != '' && document.MailForm.C_02_1.value.length != 2 ) || ( document.MailForm.C_02_1.value != '' && int( document.MailForm.C_02_1.value ) == false ) ){
                boolCheck = false;
                strText = strText + '1Rスタート展示(時)は数字2文字で入力してください。\n'
            }
            if( ( document.MailForm.C_02_2.value != '' && document.MailForm.C_02_2.value.length != 2 ) || ( document.MailForm.C_02_2.value != '' && int( document.MailForm.C_02_2.value ) == false ) ){
                boolCheck = false;
                strText = strText + '1Rスタート展示(分)は数字2文字で入力してください。\n'
            }
            if( ( document.MailForm.C_03_1.value != '' && document.MailForm.C_03_1.value.length != 2 ) || ( document.MailForm.C_03_1.value != '' && int( document.MailForm.C_03_1.value ) == false ) ){
                boolCheck = false;
                strText = strText + '12R発売締切予定(時)は数字2文字で入力してください。\n'
            }
            if( ( document.MailForm.C_03_2.value != '' && document.MailForm.C_03_2.value.length != 2 ) || ( document.MailForm.C_03_2.value != '' && int( document.MailForm.C_03_2.value ) == false ) ){
                boolCheck = false;
                strText = strText + '12R発売締切予定(分)は数字2文字で入力してください。\n'
            }
            if( document.MailForm.E_01.value.length > 2000   ){
                boolCheck = false;
                strText = strText + 'フリースペースは2000文字以内で入力してください。\n'
            }
            if( document.MailForm.name.value == ''  ){
                boolCheck = false;
                strText = strText + '作業者名を入力してください。\n'
            }else if( document.MailForm.name.value.length >32 ){
                boolCheck = false;
                strText = '作業者名を32文字以内で入力してください。\n'
            }
            if( boolCheck ){
                funcCheckInsert();
                document.MailForm.action = 'cms_mail2_execute.asp?yd=20180727&id=0&save=2';
                document.MailForm.submit();
            }else{
                alert( strText );
            }
        }
    }
    function check3(){
        res =confirm('内容を保存しますか？\n');
        if(res == false)
        {
            clicked=false;
            if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){
                var referLink = document.createElement('a');
                referLink.href='cms_mail.asp?yd=20180727';
                document.body.appendChild(referLink);
                referLink.click();
            } else {
                document.location.href='cms_mail.asp?yd=20180727';
            }
        }else{
            var boolCheck = true;
            var strText = '';
            
            if( document.MailForm.A_01.value.length > 2000   ){
                boolCheck = false;
                strText = strText + '序文は2000文字以内で入力してください。\n'
            }
            if( int( document.MailForm.A_04_11.value ) == false &&  document.MailForm.A_04_11.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報1段目1号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_12.value ) == false &&  document.MailForm.A_04_12.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報1段目2号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_13.value ) == false &&  document.MailForm.A_04_13.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報1段目3号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_14.value ) == false &&  document.MailForm.A_04_14.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報1段目4号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_15.value ) == false &&  document.MailForm.A_04_15.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報1段目5号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_16.value ) == false &&  document.MailForm.A_04_16.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報1段目6号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_21.value ) == false &&  document.MailForm.A_04_21.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報2段目1号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_22.value ) == false &&  document.MailForm.A_04_22.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報2段目2号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_23.value ) == false &&  document.MailForm.A_04_23.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報2段目3号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_24.value ) == false &&  document.MailForm.A_04_24.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報2段目4号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_25.value ) == false &&  document.MailForm.A_04_25.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報2段目5号艇は4桁の数字で入力してください。\n'
            }
            if( int( document.MailForm.A_04_26.value ) == false &&  document.MailForm.A_04_26.value != '' ){
                boolCheck = false;
                strText = strText + 'レース情報2段目6号艇は4桁の数字で入力してください。\n'
            }
            if( document.MailForm.B_01.value.length > 2000   ){
                boolCheck = false;
                strText = strText + 'イベント情報は2000文字以内で入力してください。\n'
            }
            if( ( document.MailForm.C_01_1.value != '' && document.MailForm.C_01_1.value.length != 2 ) || ( document.MailForm.C_01_1.value != '' && int( document.MailForm.C_01_1.value ) == false ) ){
                boolCheck = false;
                strText = strText + '開門時刻(時)は数字2文字で入力してください。\n'
            }
            if( ( document.MailForm.C_01_2.value != '' && document.MailForm.C_01_2.value.length != 2 ) || ( document.MailForm.C_01_2.value != '' && int( document.MailForm.C_01_2.value ) == false ) ){
                boolCheck = false;
                strText = strText + '開門時刻(分)は数字2文字で入力してください。\n'
            }
            if( ( document.MailForm.C_02_1.value != '' && document.MailForm.C_02_1.value.length != 2 ) || ( document.MailForm.C_02_1.value != '' && int( document.MailForm.C_02_1.value ) == false ) ){
                boolCheck = false;
                strText = strText + '1Rスタート展示(時)は数字2文字で入力してください。\n'
            }
            if( ( document.MailForm.C_02_2.value != '' && document.MailForm.C_02_2.value.length != 2 ) || ( document.MailForm.C_02_2.value != '' && int( document.MailForm.C_02_2.value ) == false ) ){
                boolCheck = false;
                strText = strText + '1Rスタート展示(分)は数字2文字で入力してください。\n'
            }
            if( ( document.MailForm.C_03_1.value != '' && document.MailForm.C_03_1.value.length != 2 ) || ( document.MailForm.C_03_1.value != '' && int( document.MailForm.C_03_1.value ) == false ) ){
                boolCheck = false;
                strText = strText + '12R発売締切予定(時)は数字2文字で入力してください。\n'
            }
            if( ( document.MailForm.C_03_2.value != '' && document.MailForm.C_03_2.value.length != 2 ) || ( document.MailForm.C_03_2.value != '' && int( document.MailForm.C_03_2.value ) == false ) ){
                boolCheck = false;
                strText = strText + '12R発売締切予定(分)は数字2文字で入力してください。\n'
            }
            if( document.MailForm.E_01.value.length > 2000   ){
                boolCheck = false;
                strText = strText + 'フリースペースは2000文字以内で入力してください。\n'
            }
            if( document.MailForm.name.value == ''  ){
                boolCheck = false;
                strText = strText + '作業者名を入力してください。\n'
            }else if( document.MailForm.name.value.length >32 ){
                boolCheck = false;
                strText = '作業者名を32文字以内で入力してください。\n'
            }
            if( boolCheck ){
                funcCheckInsert();
                document.MailForm.action = 'cms_mail2_execute.asp?yd=20180727&id=0&save=3';
                document.MailForm.submit();
            }else{
                alert( strText );
            }
        }
    }
    function AllClear(){
        res =confirm('入力内容を削除しますか？\n※保存されていないデータは削除されます。');
        if(res == false)
        {
            clicked=false;
        }
        else // イエスが押された
        {
            document.location.reload();
        }
    }
    function AllClear2(){
        res =confirm('入力内容を削除しますか。');
        if(res == false)
        {
            clicked=false;
        }
        else // イエスが押された
        {
            document.MailForm.action = 'cms_mail2_execute.asp?yd=20180727&id=0&save=4';
            document.MailForm.submit();
        }
    }
    function clearForm( ) {
        for(var i=0; i < document.MailForm.elements.length; ++i) {
            clearElement(document.MailForm.elements[i]);
        }
    }
    function clearElement(element) {
        switch(element.type) {
            case "hidden":
            case "submit":
            case "reset":
            case "button":
            case "image":
                return;
            case "file":
                return;
            case "text":
            case "password":
            case "textarea":
                element.value = "";
                return;
            case "checkbox":
                element.checked = false;
            case "radio":
                element.checked = false;
                return;
            case "select-one":
            case "select-multiple":
                element.selectedIndex = 0;
                return;
            default:
        }
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
    function funcCheckInsert()
    {
        document.MailForm.A_021.disabled = false;
        document.MailForm.A_031.disabled = false;
        document.MailForm.A_04_11.disabled = false;
        document.MailForm.A_04_12.disabled = false;
        document.MailForm.A_04_13.disabled = false;
        document.MailForm.A_04_14.disabled = false;
        document.MailForm.A_04_15.disabled = false;
        document.MailForm.A_04_16.disabled = false;
        document.getElementById( 'C2_add_btn' ).style.display = 'none';
        document.MailForm.C_01_3_1.disabled = false;
        document.MailForm.C_01_4_1.disabled = false;
        document.MailForm.C_01_5_1.disabled = false;
        document.MailForm.C_01_3_2.disabled = false;
        document.MailForm.C_01_4_2.disabled = false;
        document.MailForm.C_01_5_2.disabled = false;
        document.MailForm.C_01_3_3.disabled = false;
        document.MailForm.C_01_4_3.disabled = false;
        document.MailForm.C_01_5_3.disabled = false;
        document.MailForm.C_01_3_4.disabled = false;
        document.MailForm.C_01_4_4.disabled = false;
        document.MailForm.C_01_5_4.disabled = false;
        document.MailForm.B_01.disabled = false;
        document.MailForm.C_01_1.disabled = false;
        document.MailForm.C_01_2.disabled = false;
        document.MailForm.C_02_1.disabled = false;
        document.MailForm.C_02_2.disabled = false;
        document.MailForm.C_03_1.disabled = false;
        document.MailForm.C_03_2.disabled = false;
        document.MailForm.D_01_1.disabled = false;
        document.MailForm.D_01_2.disabled = false;
        document.MailForm.D_02_1.disabled = false;
        document.MailForm.D_02_2.disabled = false;
        document.MailForm.D_03_1.disabled = false;
        document.MailForm.D_03_2.disabled = false;
        document.MailForm.E_01.disabled = false;
    }
    function RaceReload(){
        document.MailForm.D_01_1.value='{{ $general->create_display_date($race_index[1]->START_DATE,$race_index[1]->END_DATE) }}';
        document.MailForm.D_01_2.value='{{ $race_index[1]->RACE_TITLE }}';
        document.MailForm.D_02_1.value='{{ $general->create_display_date($race_index[2]->START_DATE,$race_index[2]->END_DATE) }}';
        document.MailForm.D_02_2.value='{{ $race_index[2]->RACE_TITLE }}';
        document.MailForm.D_03_1.value='{{ $general->create_display_date($race_index[3]->START_DATE,$race_index[3]->END_DATE) }}';
        document.MailForm.D_03_2.value='{{ $race_index[3]->RACE_TITLE }}';
        D_WrapChange();
    }
    function SesnyuReload(){
        document.MailForm.A_021.value = '';
        document.MailForm.A_04_11.value = '';
        document.MailForm.A_04_12.value = '';
        document.MailForm.A_04_13.value = '';
        document.MailForm.A_04_14.value = '';
        document.MailForm.A_04_15.value = '';
        document.MailForm.A_04_16.value = '';
        document.MailForm.A_022.value = '';
        document.MailForm.A_04_21.value = '';
        document.MailForm.A_04_22.value = '';
        document.MailForm.A_04_23.value = '';
        document.MailForm.A_04_24.value = '';
        document.MailForm.A_04_25.value = '';
        document.MailForm.A_04_26.value = '';
        A_WrapChange( 0 )
    }

    funcLoad();
    </script>
@endsection
