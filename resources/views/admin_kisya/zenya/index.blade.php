@extends('layouts.admin_kisya_layout')

@section('title', '前夜予想')

@inject('general', 'App\Services\GeneralService')

@section('css')
    <link href="/cms/css/reset.css" rel="stylesheet" type="text/css">
    <link href="/cms/css/cms.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
    <style>
        *, ::after, ::before {
            box-sizing: content-box;
        }
    </style>
@endsection

@section('content')
    <form name="form" method="post" action="/admin_kisya/zenya/upsert">
        <div id="wrapper">
        @if(!$yoso)
            <div class="new_tit" >新規入力</div><!--/#new_tit-->
        @else
            @if($yoso->APPEAR_FLG)
                <div class="open_tit">公開中</div><!--/#open_tit-->
            @else
                <div class="save_tit">保存中</div><!--/#save_tit-->
            @endif
        @endif

        <div id="header2">
        <div id="day">
        <span class="day_tit">日<br>程</span>
        <select id="day_select" name="TARGET_DATE" onChange="location.href='/admin_kisya/zenya?yd='+$(this).val()">
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

        <!-----------------------------------
        ▼レースボタン -->

        <div id="race_btn">
        <ul>
        @for($num = 1; $num <= 12; $num++)
            @if($num == $race_num)
                <li class="select"><a href="javascript:void(0);">{{$num}}R</a></li>
            @else
                <li><a href="?jyo=09&yd={{$target_date}}&racenum={{$num}}">{{$num}}R</a></li>
            @endif
        @endfor
        <div class="clear"></div>
        </ul>
        </div><!--/#race_btn-->


        <!-----------------------------------
        ▼節間成績 -->

        <table class="ta_kyogi">
        <tr>
        <th rowspan="3" scope="col" class="hyoka">評価</th>
        <th rowspan="3" scope="col">枠<br>番</th>
        <th rowspan="3" class="name" scope="col">選手名<br>
        <span class="small">登番 / 支部 / 年齢</span></th>
        <th rowspan="3" scope="col">級<br>別</th>
        <th rowspan="3" colspan="2" scope="col">

        <table id="heikin"><tr>
        <th>F</th>
        <th class="br_no">L</th></tr>
        <tr><td colspan="2" rowspan="2">平均ST</td>
        </tr></table>

        </th>
        <th colspan="3" scope="col">モーター</th>
        <th rowspan="3" class="hyoka2" scope="col">展示<br>
        評価</th>
        <th rowspan="3" class="seiseki_8" scope="col">　</th>
        <th colspan="14" class="setsukan" scope="col">節間成績</th>
        <th rowspan="3" scope="col">早<br>見</th>
        </tr>
        <tr>
        <th class="th_syoritu" scope="col">No.</th>
        <th rowspan="2" class="hyoka" scope="col">出<br>
        足</th>
        <th rowspan="2" class="hyoka" scope="col">伸<br>
        足</th>
        <th colspan="2" rowspan="2">初日</th>
        <th colspan="2" rowspan="2">2日目</th>
        <th colspan="2" rowspan="2">3日目</th>
        <th colspan="2" rowspan="2">4日目</th>
        <th colspan="2" rowspan="2">5日目</th>
        <th colspan="2" rowspan="2">最終日</th>
        <th colspan="2" rowspan="2">&nbsp;</th>
        </tr>
        <tr>
        <th scope="col" class="th_syoritu_no">２連率</th>
        </tr>

        @foreach($syussou as $teiban => $item)
            <!-- ▼枠▼ -->
            <tr>
                <td rowspan="4" class="hyoka">
                    <?php $prop_name = "EVALUATION".$teiban; ?>
                    <select name="EVALUATION{{$teiban}}" onfocus="funcForcus();" id="EVALUATION{{$teiban}}" onChange="funcPush();"tabindex="6" class="fm_deashi_yoso_pd2">
                        <option value="0" @if((old($prop_name,$yoso->$prop_name) ?? 6) == 0) selected @endif>--</option>
                        <option value="1" @if((old($prop_name,$yoso->$prop_name) ?? 6) == 1) selected @endif>★</option>
                        <option value="2" @if((old($prop_name,$yoso->$prop_name) ?? 6) == 2) selected @endif>◎</option>
                        <option value="3" @if((old($prop_name,$yoso->$prop_name) ?? 6) == 3) selected @endif>○</option>
                        <option value="4" @if((old($prop_name,$yoso->$prop_name) ?? 6) == 4) selected @endif>△</option>
                        <option value="5" @if((old($prop_name,$yoso->$prop_name) ?? 6) == 5) selected @endif>×</option>
                    </select>
                </td>
                <td rowspan="4" class="waku w{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
                <td rowspan="4" class="w{{$item->TEIBAN}}"><div class="name">{{$item->SENSYU_NAME}}</div><div class="number">{{$item->TOUBAN}} / {{ $item->HOME_TOWN}} / {{ $item->AGE}}</div></td>
                <td rowspan="4" class="class">{{$item->KYU_BETU}}</td>
                <td rowspan="2" class="F">{{$item->F_COUNT?"F".$item->F_COUNT:""}}</td>
                <td rowspan="2" class="L">{{$item->L_COUNT?"L".$item->L_COUNT:""}}</td>
                <td rowspan="2" class="rate01"><script type="text/javascript">
                    func_MotorRank('{{$target_date}}' , '{{(int)$item->MOTOR_NO}}' );
                </script>
                </td>
                <td rowspan="4" class="hyoka1">
                    @isset($yoso_ashi_array[$teiban])
                        @if($yoso_ashi_array[$teiban]->DEASHI)
                            <img src="/kaisai/images/ic_yoso0{{ $yoso_ashi_array[$teiban]->DEASHI }}_w.png" width="29" height="29" alt=""/>
                        @endif
                    @endisset
                </td>
                <td rowspan="4" class="hyoka1">
                    @isset($yoso_ashi_array[$teiban])
                        @if($yoso_ashi_array[$teiban]->NOBIASHI)
                            <img src="/kaisai/images/ic_yoso0{{ $yoso_ashi_array[$teiban]->NOBIASHI }}_w.png" width="29" height="29" alt=""/>
                        @endif
                    @endisset
                </td>
                <td rowspan="4" class="hyoka2">
                    <?php $prop_name = "EVALUATION".$teiban; ?>
                    {{ $yoso_tenji->$prop_name ?? "" }}
                </td>
    
                <td class="seiseki">R</td>
                @for($race_day_count=1;$race_day_count<=7;$race_day_count++)
                  <?php $prop_name_1 = "KONSETU".$race_day_count."1_RACENUMBER" ?>
                  <?php $prop_name_2 = "KONSETU".$race_day_count."2_RACENUMBER" ?>
                  <td class="s_race_8 left">{{ $item->$prop_name_1 }}</td>
                  <td class="s_race_8 right">{{ $item->$prop_name_2 }}</td>
                @endfor
    
                @if($item->HAYAMI)
                    <td rowspan="4" class="hayami"><a href="/asp/kyogi/09/pc/syusso01/syusso01{{str_pad($item->HAYAMI, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">{{$item->HAYAMI}}<br>R</a></td>
                @else
                    <td rowspan="4" class="hayami">　</td>
                @endif
            </tr>
            <tr>
                <td class="seiseki">進</td>
                @for($race_day_count=1;$race_day_count<=7;$race_day_count++)
                  <?php $prop_name_w1 = "KONSETU".$race_day_count."1_WAKUBAN" ?>
                  <?php $prop_name_w2 = "KONSETU".$race_day_count."2_WAKUBAN" ?>
                  <?php $prop_name_s1 = "KONSETU".$race_day_count."1_SHINNYU" ?>
                  <?php $prop_name_s2 = "KONSETU".$race_day_count."2_SHINNYU" ?>
                  <td class="s_sin left w{{ $item->$prop_name_w1 }}">{{ $item->$prop_name_s1 }}</td>
                  <td class="s_sin right w{{ $item->$prop_name_w2 }}">{{ $item->$prop_name_s2 }}</td>
                @endfor
    
            </tr>
            <tr>
                <td colspan="2" rowspan="2" class="ST">{{$item->ST_AVERAGE?mb_substr($item->ST_AVERAGE,1):"―"}}</td>
                <td rowspan="2" class="rate02">{{$item->MOTOR2RENTAIRITU}}<br></td>
    
                <td class="seiseki">ST</td>
                @for($race_day_count=1;$race_day_count<=7;$race_day_count++)
                    <?php $prop_name_dt = "KONSETU".$race_day_count."1_DATE"; ?>
                    <?php $prop_name_st = "KONSETU".$race_day_count."1_STTIMING"; ?>
                    <?php $prop_name_rn = "KONSETU".$race_day_count."1_RACENUMBER"; ?>
    
                    @if($item->$prop_name_st)
                        <td class="s_ST left @if(($st_ranking[$item->$prop_name_dt][$item->$prop_name_rn] ?? false) == $item->$prop_name_st){{'st_top'}}@endif">{{ mb_substr($item->$prop_name_st,1) }}</td>
                    @else
                        <td class="s_ST left"></td>
                    @endif
    
                    <?php $prop_name_dt = "KONSETU".$race_day_count."2_DATE"; ?>
                    <?php $prop_name_st = "KONSETU".$race_day_count."2_STTIMING"; ?>
                    <?php $prop_name_rn = "KONSETU".$race_day_count."2_RACENUMBER"; ?>
    
                    @if($item->$prop_name_st)
                        <td class="s_ST right @if(($st_ranking[$item->$prop_name_dt][$item->$prop_name_rn] ?? false) == $item->$prop_name_st){{'st_top'}}@endif">{{ mb_substr($item->$prop_name_st,1) }}</td>
                    @else
                        <td class="s_ST right"></td>
                    @endif
    
                @endfor
                
            </tr>
            <tr>
                <td class="seiseki_bottom">着</td>
                @for($race_day_count=1;$race_day_count<=7;$race_day_count++)
                    <?php $prop_name = "KONSETU".$race_day_count."1_TYAKUJUN"; ?>
                    @if($item->$prop_name)
                        <td class="s_cyaku left">{{ $item->$prop_name }}</td>                  
                    @else
                        <td class="s_cyaku_no left">&ensp;</td>    
                    @endif
    
                    <?php $prop_name = "KONSETU".$race_day_count."2_TYAKUJUN"; ?>
                    @if($item->$prop_name)
                        <td class="s_cyaku right">{{ $item->$prop_name }}</td>                  
                    @else
                        <td class="s_cyaku_no right">&ensp;</td>    
                    @endif
                @endfor
            </tr>
        @endforeach

        </table>

        <div id="zenya">
        <div id="zenya_l">
        <!--▼▼▼進入予想▼▼▼-->

        <h2>【進入予想】</h2>
        <input type="text" name="ENTRY" onfocus="funcForcus();" maxlength="7" class="fm_shinnyu" onBlur="DataCheck()" value="{{old('ENTRY',($yoso->ENTRY ?? ""))}}">
        </div><!--/#zenya_l-->

        <div id="zenya_c">
        <div class="hyodai"><h2>【記者'sメモ】</h2></div><div class="letters"><span id="count">現在0字</span><span>（最大表示100字）</span></div>
        <div class="Memo"></div>

        <textarea name="MEMO" onfocus="funcForcus();" cols="50" maxlength="2000" rows="8" id="memo" class="fm_memo" onKeyUp="funcTextCount();">{{old('MEMO',($yoso->MEMO ?? ""))}}</textarea>

        </div><!--/#zenya_c-->
        <div id="zenya_r">

        <h2>【自信度】</h2>
        <input type="text" name="CONFIDENCE" onfocus="funcForcus();" maxlength="3" value="{{old('CONFIDENCE',($yoso->CONFIDENCE ?? ""))}}" class="fm_jishin"><span class="fs20px">%</span>

        <br>

        <h2>【推しレースに指定】</h2>

        <div id="oshi">
        <div id="check_b">
        <label @if(old('RACE_FLG_CLASS',$yoso->RACE_FLG_CLASS ?? false)) class="c_on" @endif id="RACE_FLG_CLASS"><input type="checkbox" onfocus="funcForcus();" name="RACE_FLG" id="RACE_FLG" value="1" @if(old('RACE_FLG_CLASS',$yoso->RACE_FLG_CLASS ?? false)) checked @endif>
        </label>
        </div>
        <div id="check_r">
        現在の指定レース
        <span>@foreach($push as $item){{$item->RACE_NUM}}R @endforeach</span></div>
        <div class="clear"></div>
        </div><!--/#oshi-->

        </div><!--/#zenya_r-->
        <div class="clear"></div>
        </div><!--/#zenya-->

        </div><!--/#wrapper-->


        <!--▼▼▼フッター▼▼▼-->
        <div id="footer">

        <div id="footer_in">
        <div id="footer_in_l">
        <ul>
        <li class="save"><input type="button" onClick="javascript:funcSave( '0' );" value="保存"></li>
        <li class="preview">プレビュー</li>
        <li class="pv_b"><a href="/admin_kisya/zenya/preview_pc?target_date={{$target_date}}&race_num={{$race_num}}" target="_blank">PC</a></li>
        <li class="pv_b"><a href="/admin_kisya/zenya/preview_sp?target_date={{$target_date}}&race_num={{$race_num}}" target="_blank">スマホ</a></li>
        {{--<li class="pv_b"><a href="/k/real_t/syussoumenu.asp?jyo=09&no=09&preview=1&yd=20210620&racenum=1" target="_blank">携帯</a></li>--}}
        <div class="clear"></div>
        </ul>
        </div><!--/#fotter_in_l-->

        <div id="footer_in_r">

        <div id="action_a">
        <h3>全12Rを一括</h3>
        <span class="open_b"><input type="button" onClick="location.href='/admin_kisya/zenya/change_appear_flg_all?TARGET_DATE={{$target_date}}&RACE_NUM={{$race_num}}&APPEAR_FLG=1'" value="公開"></span>
        <span class="close_b"><input type="button" onClick="location.href='/admin_kisya/zenya/change_appear_flg_all?TARGET_DATE={{$target_date}}&RACE_NUM={{$race_num}}&APPEAR_FLG=0'" value="非公開"></span>
        <div class="clear"></div>
        </div><!--/#action_a-->

        <div id="action_b">
        <h3>各レース</h3>
        <span class="open_b"><input type="button" onClick="location.href='/admin_kisya/zenya/change_appear_flg?TARGET_DATE={{$target_date}}&RACE_NUM={{$race_num}}&APPEAR_FLG=1'" value="公開"></span>
        <span class="close_b"><input type="button" onClick="location.href='/admin_kisya/zenya/change_appear_flg?TARGET_DATE={{$target_date}}&RACE_NUM={{$race_num}}&APPEAR_FLG=0'" value="非公開"></span>
        <div class="clear"></div>
        </div><!--/#action_b-->

        <div class="clear"></div>
        </div><!--/#fotter_in_r-->

        <div class="clear"></div>
        </div><!--/#fotter_in-->

        </div><!--/#footer-->
        <input type="hidden" name="APPEAR_FLG" value="{{$appear_flg}}">
        <input type="hidden" name="MODE" value="0">
        <input type="hidden" name="RACE_NUM" value="{{$race_num}}">
        @csrf
    </form>
@endsection

@section('script')
    <script type="text/javascript" src="/cms/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/asp/kyogi/09/pc/Jsinfo.js"></script>

    <script type="text/javascript" src="/cms/js/jquery.checkbox.js"></script>
    <script type="text/javascript">
        var boolCursorFlg = false;
        function funcForcus(){
            boolCursorFlg = true; 
        }
        function funcLink( argURL , argPage ){
            if( boolCursorFlg ){ 
                if( window.confirm( 'データは保存されていません。\n保存して移動しますか？' ) ){
                    //document.form.action = 'yoso2_execute.asp?ret=' + argPage;
                    funcSave( '0' );
                }else{
                    document.location.href= argURL;
                }
            }else{
                document.location.href= argURL;
            }	
        }
        function funcSave( argNum ){
            var boolJudge = true;
            var strMessage = '';
            var boolPushFlg = false;
            var boolEvaluationFlg = false;
            if( argNum == "0" ){
            // 保存時何もしない
            }else if( argNum == "1" ){
            // 全レース公開ボタン押したとき
                document.form.APPEAR_FLG.value = '1'
                document.form.MODE.value = '1'
            }else if( argNum == "2" ){
            // 全レース非公開ボタン押したとき
                document.form.APPEAR_FLG.value = '0'
                document.form.MODE.value = '1'
            }else if( argNum == "3" ){
            // 対象レース公開ボタン押したとき
                document.form.APPEAR_FLG.value = '1'
                document.form.MODE.value = '2'
            }else if( argNum == "4" ){
            // 対象レース非公開ボタン押したとき
                document.form.APPEAR_FLG.value = '0'
                document.form.MODE.value = '2'
            }
            if( document.form.EVALUATION1.value !== '0' ){
                if( document.form.EVALUATION1.value == document.form.EVALUATION2.value ){
                    boolJudge = false;
                    strMessage = strMessage + '1号艇と2号艇の評価記号が重複しています。\n';
                }
                if( document.form.EVALUATION1.value == document.form.EVALUATION3.value ){
                    boolJudge = false;
                    strMessage = strMessage + '1号艇と3号艇の評価記号が重複しています。\n';
                }
                if( document.form.EVALUATION1.value == document.form.EVALUATION4.value ){
                    boolJudge = false;
                    strMessage = strMessage + '1号艇と4号艇の評価記号が重複しています。\n';
                }
                if( document.form.EVALUATION1.value == document.form.EVALUATION5.value ){
                    boolJudge = false;
                    strMessage = strMessage + '1号艇と5号艇の評価記号が重複しています。\n';
                }
                if( document.form.EVALUATION1.value == document.form.EVALUATION6.value ){
                    boolJudge = false;
                    strMessage = strMessage + '1号艇と6号艇の評価記号が重複しています。\n';
                }
            }
            if( document.form.EVALUATION2.value !== '0' ){
                if( document.form.EVALUATION2.value == document.form.EVALUATION3.value ){
                    boolJudge = false;
                    strMessage = strMessage + '2号艇と3号艇の評価記号が重複しています。\n';
                }
                if( document.form.EVALUATION2.value == document.form.EVALUATION4.value ){
                    boolJudge = false;
                    strMessage = strMessage + '2号艇と4号艇の評価記号が重複しています。\n';
                }
                if( document.form.EVALUATION2.value == document.form.EVALUATION5.value ){
                    boolJudge = false;
                    strMessage = strMessage + '2号艇と5号艇の評価記号が重複しています。\n';
                }
                if( document.form.EVALUATION2.value == document.form.EVALUATION6.value ){
                    boolJudge = false;
                    strMessage = strMessage + '2号艇と6号艇の評価記号が重複しています。\n';
                }
            }
            if( document.form.EVALUATION3.value !== '0' ){
                if( document.form.EVALUATION3.value == document.form.EVALUATION4.value ){
                    boolJudge = false;
                    strMessage = strMessage + '3号艇と4号艇の評価記号が重複しています。\n';
                }
                if( document.form.EVALUATION3.value == document.form.EVALUATION5.value ){
                    boolJudge = false;
                    strMessage = strMessage + '3号艇と5号艇の評価記号が重複しています。\n';
                }
                if( document.form.EVALUATION3.value == document.form.EVALUATION6.value ){
                    boolJudge = false;
                    strMessage = strMessage + '3号艇と6号艇の評価記号が重複しています。\n';
                }
            }
            if( document.form.EVALUATION4.value !== '0' ){
                if( document.form.EVALUATION4.value == document.form.EVALUATION5.value ){
                    boolJudge = false;
                    strMessage = strMessage + '4号艇と5号艇の評価記号が重複しています。\n';
                }
                if( document.form.EVALUATION4.value == document.form.EVALUATION6.value ){
                    boolJudge = false;
                    strMessage = strMessage + '4号艇と6号艇の評価記号が重複しています。\n';
                }
            }
            if( document.form.EVALUATION5.value !== '0' ){
                if( document.form.EVALUATION5.value == document.form.EVALUATION6.value ){
                    boolJudge = false;
                    strMessage = strMessage + '5号艇と6号艇の評価記号が重複しています。\n';
                }
            }
            for( var intLoopCount = 1 ; intLoopCount <= 6 ; intLoopCount++ ){		if( document.getElementById( 'EVALUATION' + intLoopCount ).value == '1' ){
                // 全選手の評価のうち1つでも★があればフラグを立てる
                        boolPushFlg = true;
                }
                if( document.getElementById( 'EVALUATION' + intLoopCount ).value == '2' ){
                // 全選手の評価のうち1つでも◎があればフラグを立てる
                        boolEvaluationFlg = true;
                }
            }
            if( boolPushFlg && boolEvaluationFlg ){
                    boolJudge = false;
                    strMessage = strMessage + '★と◎が両方選択されています。\n';
            }
            if( document.form.ENTRY.value !== '' ){
                if( int( document.form.ENTRY.value ) == false ){
                    boolJudge = false;
                    strMessage = strMessage + '進入コース予想は7桁の数字で入力してください。\n';
                }else if( document.form.ENTRY.value.length !== 7 ){
                    boolJudge = false;
                    strMessage = strMessage + '進入コース予想は7桁の数字で入力してください。\n';
                }
            }
            if( document.form.CONFIDENCE.value !== '' ){
                if( int( document.form.CONFIDENCE.value ) == false ){
                    boolJudge = false;
                    strMessage = strMessage + '自信度は3桁以内の数字で入力してください。\n';
                }else if( document.form.CONFIDENCE.value.length > 3  ){
                    boolJudge = false;
                    strMessage = strMessage + '自信度は3桁以内の数字で入力してください。\n';
                }
            }
            if( boolJudge ){
                document.form.submit()
            }else{
                //document.form.action='yoso2_execute.asp';
                alert( strMessage );
            }
        }
        function funcChangeDate( ){
            document.form.action='yoso2.asp?yd=' + document.form.TARGET_DATE.value;
            document.form.submit()
        }
        function funcTextCount( ){
            var strHTML = '';
            var intMaxCount = 0;
            if( document.form.MEMO.value.length > 100 ){
                strHTML = '<font color="#FF0000">現在' + document.form.MEMO.value.length +'字</font>';
            }else{
                strHTML = '現在' + document.form.MEMO.value.length +'字';
            }
            document.getElementById( 'count' ).innerHTML = strHTML;
        }
        function DataCheck(str)
        {
            document.form.ENTRY.value = funcStr2to1( document.form.ENTRY.value );
        }
        function funcPush(){
            var boolPushFlg = false;
            for( var intLoopCount = 1 ; intLoopCount <= 6 ; intLoopCount++ ){
                if( document.getElementById( 'EVALUATION' + intLoopCount ).value == '1' ){
                // 全選手の評価のうち1つでも★があればフラグを立てる
                        boolPushFlg = true;
                }
            }
            if( boolPushFlg ){
                document.getElementById( 'RACE_FLG_CLASS' ).className = 'c_on';
                document.form.RACE_FLG.checked = true;
            }else{
                document.getElementById( 'RACE_FLG_CLASS' ).className = '';
                document.form.RACE_FLG.checked = false;
            }
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

        funcTextCount();
    </script>
@endsection