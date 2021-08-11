@extends('layouts.admin_kisya_layout')

@section('title', '展示後評価')

@inject('general', 'App\Services\GeneralService')

@section('css')
    <link href="/cms/css/reset.css" rel="stylesheet" type="text/css">
    <link href="/cms/css/cms.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/cms/css/imageselect.css" type="text/css">
    <style>
        *, ::after, ::before {
            box-sizing: content-box;
        }
    </style>
@endsection

@section('content')
    <form name="form" method="post" action="/admin_kisya/tenji/upsert">
        <div id="wrapper">
        @if(!$yoso_tenji)
            <div class="new_tit" >新規入力</div><!--/#new_tit-->
        @else
            @if($yoso_tenji->APPEAR_FLG)
                <div class="open_tit">公開中</div><!--/#open_tit-->
            @else
                <div class="save_tit">保存中</div><!--/#save_tit-->
            @endif
        @endif

            <div id="header2">
            <div id="day">
            <span class="day_tit">日<br>程</span>
            <select id="day_select" name="TARGET_DATE" onChange="funcChangeDate();">
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
            <th rowspan="3" class="st01"scope="col">今節<br>
              平均<br>
              ST</th>
            <th colspan="2" class="setsukan" scope="col"><p>直前情報</p></th>
            <th colspan="2" class="setsukan" scope="col">スタート展示</th>
            <th rowspan="3" scope="col">早<br>見</th>
            </tr>
            <tr>
            <th class="th_syoritu" scope="col">No.</th>
            <th rowspan="2" class="hyoka" scope="col">出<br>
              足</th>
            <th rowspan="2" class="hyoka" scope="col">伸<br>
              足</th>
            <th class="time">展示タイム</th>
            <th class="weight">体重</th>
            <th colspan="2" rowspan="2">CGスリット</th>
            </tr>
            <tr>
            <th scope="col" class="th_syoritu_no">２連率</th>
            <th>チルト</th>
            <th>調整</th>
            </tr>
            
            
                @foreach($syussou as $teiban => $item)
                
                    <!-- ▼枠▼ -->
                    <tr>
                        <td rowspan="2" class="hyoka1">
                            <?php $prop_name = "EVALUATION".$teiban; ?>
                            @if($yoso->$prop_name)
                                <img src="/kaisai/images/ic_hyoka0{{ $yoso->$prop_name }}.png" width="30" height="30" alt=""/>
                            @endif
                        </td>
                        <td rowspan="2" class="waku w{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
                        <td rowspan="2" class="w{{$item->TEIBAN}}"><div class="name">{{$item->SENSYU_NAME}}</div><div class="number">{{$item->TOUBAN}} / {{ $item->HOME_TOWN}} / {{ $item->AGE}}</div></td>
                        <td rowspan="2" class="class">{{$item->KYU_BETU}}</td>
                        <td class="F">{{$item->F_COUNT?"F".$item->F_COUNT:""}}</td>
                        <td class="L">{{$item->L_COUNT?"L".$item->L_COUNT:""}}</td>
                        <td class="rate01"><script type="text/javascript">
                            func_MotorRank('{{$target_date}}' , '{{(int)$item->MOTOR_NO}}' );
                        </script>
                        </td>
                        <td rowspan="2" class="hyoka1">
                            @isset($yoso_ashi_array[$teiban])
                                @if($yoso_ashi_array[$teiban]->DEASHI)
                                    <img src="/kaisai/images/ic_yoso0{{ $yoso_ashi_array[$teiban]->DEASHI }}_w.png" width="29" height="29" alt=""/>
                                @endif
                            @endisset
                        </td>
                        <td rowspan="2" class="hyoka1">
                            @isset($yoso_ashi_array[$teiban])
                                @if($yoso_ashi_array[$teiban]->NOBIASHI)
                                    <img src="/kaisai/images/ic_yoso0{{ $yoso_ashi_array[$teiban]->NOBIASHI }}_w.png" width="29" height="29" alt=""/>
                                @endif
                            @endisset
                        </td>
                        <td rowspan="2" class="hyoka">
                            <?php $prop_name = "EVALUATION".$teiban; ?>
                            <select onfocus="funcForcus();" name="EVALUATION{{$teiban}}" tabindex="6" class="fm_tenji_yoso_pd">
                                <option value="0" @if((old($prop_name,$yoso_tenji->$prop_name) ?? 6) == 0) selected @endif >--</option>
                                <option value="5" @if((old($prop_name,$yoso_tenji->$prop_name) ?? 6) == 5) selected @endif >5</option>
                                <option value="4" @if((old($prop_name,$yoso_tenji->$prop_name) ?? 6) == 4) selected @endif >4</option>
                                <option value="3" @if((old($prop_name,$yoso_tenji->$prop_name) ?? 6) == 3) selected @endif >3</option>
                                <option value="2" @if((old($prop_name,$yoso_tenji->$prop_name) ?? 6) == 2) selected @endif >2</option>
                                <option value="1" @if((old($prop_name,$yoso_tenji->$prop_name) ?? 6) == 1) selected @endif >1</option>
                            </select>
                        </td>

                        <td rowspan="2" class="tj_class">{{ $tyokuzen_array[$item->TEIBAN]['st_avg']? mb_substr(sprintf('%.2f',$tyokuzen_array[$item->TEIBAN]['st_avg']) ,1,3) :".--" }}</td>
                        <td class="choku_top">{{ $tyokuzen_array[$item->TEIBAN]['record']->TENJI_TIME }}</td>
                        <td class="choku_top">{{ $tyokuzen_array[$item->TEIBAN]['record']->TAIJYU }}</td>
                        <td rowspan="2" class="slit"><img src="/kaisai/images/st0{{$teiban}}.png" width="40" height="33" alt="{{$teiban}}" id="st0{{$teiban}}" style="margin-right:{{ $tyokuzen_array[$item->TEIBAN]['right_margin'] }}px;"></td>
                        <td rowspan="2" class="slit_st">
                            @if($tyokuzen_array[$item->TEIBAN]['record']->ST_JICO_CD)
                                @if($tyokuzen_array[$item->TEIBAN]['record']->ST_JICO_CD == 'L')
                                    <span>L.--</span>
                                @else
                                    <span>F{{ mb_substr($tyokuzen_array[$item->TEIBAN]['record']->ST_TIMING,1) }}</span>
                                @endif
                            @else
                                {{mb_substr($tyokuzen_array[$item->TEIBAN]['record']->ST_TIMING,1)}}
                            @endif
                        </td>
                        @if($item->HAYAMI)
                            <td rowspan="2" class="hayami"><a href="/asp/kyogi/09/pc/syusso01/syusso01{{str_pad($item->HAYAMI, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">{{$item->HAYAMI}}<br>R</a></td>
                        @else
                            <td rowspan="2" class="hayami">　</td>
                        @endif

                    </tr>
                    <tr>
                        <td colspan="2" class="ST">{{$item->ST_AVERAGE?mb_substr($item->ST_AVERAGE,1):"―"}}</td>
                        <td class="rate02">{{$item->MOTOR2RENTAIRITU}}<br></td>
                        <td class="tj_class">{{ $tyokuzen_array[$item->TEIBAN]['record']->TILT_KAKUDO }}</td>
                        <td class="tj_class">{{ $tyokuzen_array[$item->TEIBAN]['record']->TYOSEI_JYURYO }}</td>
                    </tr>

                @endforeach
            </table>
            
            
            <!--▼▼▼展示評価▼▼▼-->
            <div id="tenji_go">
            <div class="hyodai"><h2>【展示評価】</h2></div><div class="letters"><span id="count">現在0字</span><span>（最大表示100字）</span></div>
            <div class="clear"></div>
            
            <textarea name="COMMENT" onfocus="funcForcus();" cols="50" rows="8" class="fm_tenji" maxlength="500" onKeyUp="funcTextCount();">{{old('COMMENT',$yoso_tenji->COMMENT ?? "")}}</textarea>
            </div><!--/#tenji_go-->
            
            
            <!--▼▼▼フォーカス▼▼▼-->
            
            <div id="focus_t">
            
            <ul class="navi">
            
            <div class="category">【フォーカス】<span class="focus_info">?</span></div>
            
            <ul class="menu">
            <li class="focus_text">
            <img src="/cms/images/focus_text.jpg" width="786" height="150" alt=""/>
            </li>
            </ul>
            </li>
            </ul>
            </div>
            <div align="right"><input type="button" onClick="funcForcusClear();" value="クリア" class="fm_deashi_yoso_pd_bt fm_all_clear"></div><br>
            <br>
            <br>
            <div id="focus_waku">
            <!--**** 本命 ****-->
            <div id="focus_waku_l">
            <div class="focus_t2">本命</div>
            <!-- ▼枠▼ -->
            <table id="ta_focus">
            <tr>
            <td class="kumi_no"></td>
            <td rowspan="3" class="sct">
            <center>
            <select onfocus="funcForcus();" name="FAVOLITE_MARK11" id="FAVOLITE_MARK11">
            <option value="0" @if((old('FAVOLITE_MARK11',$yoso_tenji->FAVOLITE_MARK11) ?? 99) == 0) selected @endif>/cms/images/f_code00.gif</option>
            <option value="1" @if((old('FAVOLITE_MARK11',$yoso_tenji->FAVOLITE_MARK11) ?? 99) == 1) selected @endif>/cms/images/f_code01.gif</option>
            <option value="2" @if((old('FAVOLITE_MARK11',$yoso_tenji->FAVOLITE_MARK11) ?? 99) == 2) selected @endif>/cms/images/f_code02.gif</option>
            <option value="3" @if((old('FAVOLITE_MARK11',$yoso_tenji->FAVOLITE_MARK11) ?? 99) == 3) selected @endif>/cms/images/f_code03.gif</option>
            <option value="5" @if((old('FAVOLITE_MARK11',$yoso_tenji->FAVOLITE_MARK11) ?? 99) == 5) selected @endif>/cms/images/f_code05.gif</option>
            <option value="8" @if((old('FAVOLITE_MARK11',$yoso_tenji->FAVOLITE_MARK11) ?? 99) == 8) selected @endif>/cms/images/f_code08.gif</option>
            <option value="9" @if((old('FAVOLITE_MARK11',$yoso_tenji->FAVOLITE_MARK11) ?? 99) == 9) selected @endif>/cms/images/f_code09.gif</option>
            </select>
            </center>
            </td>
            <td id="TD_FAVOLITE112" class="kumi"><input onfocus="funcForcus();" type="text" name="FAVOLITE112" id="FAVOLITE112" class="fm_f-waku" maxlength="1" value="{{old('FAVOLITE112',$yoso_tenji->FAVOLITE112 ?? '')}}"></td>
            <td rowspan="3" class="sct">
            <center>
            <select onfocus="funcForcus();" name="FAVOLITE_MARK12" id="FAVOLITE_MARK12">
            <option value="0" @if((old('FAVOLITE_MARK12',$yoso_tenji->FAVOLITE_MARK12) ?? 99) == 0) selected @endif>/cms/images/f_code00.gif</option>
            <option value="1" @if((old('FAVOLITE_MARK12',$yoso_tenji->FAVOLITE_MARK12) ?? 99) == 1) selected @endif>/cms/images/f_code01.gif</option>
            <option value="2" @if((old('FAVOLITE_MARK12',$yoso_tenji->FAVOLITE_MARK12) ?? 99) == 2) selected @endif>/cms/images/f_code02.gif</option>
            <option value="3" @if((old('FAVOLITE_MARK12',$yoso_tenji->FAVOLITE_MARK12) ?? 99) == 3) selected @endif>/cms/images/f_code03.gif</option>
            <option value="5" @if((old('FAVOLITE_MARK12',$yoso_tenji->FAVOLITE_MARK12) ?? 99) == 5) selected @endif>/cms/images/f_code05.gif</option>
            <option value="9" @if((old('FAVOLITE_MARK12',$yoso_tenji->FAVOLITE_MARK12) ?? 99) == 9) selected @endif>/cms/images/f_code09.gif</option>
            </select>
            </center>
            </td>
            <td id="TD_FAVOLITE113" class="kumi"><input onfocus="funcForcus();" type="text" name="FAVOLITE113" id="FAVOLITE113" class="fm_f-waku" maxlength="1" value="{{old('FAVOLITE113',$yoso_tenji->FAVOLITE113 ?? '')}}"></td>
            </tr>
            <tr>
            <td id="TD_FAVOLITE111" class="kumi"><input onfocus="funcForcus();" type="text" name="FAVOLITE111" id="FAVOLITE111" class="fm_f-waku" maxlength="1" value="{{old('FAVOLITE111',$yoso_tenji->FAVOLITE111 ?? '')}}"></td>
            <td id="TD_FAVOLITE122" class="kumi"><input onfocus="funcForcus();" type="text" name="FAVOLITE122" id="FAVOLITE122" class="fm_f-waku" maxlength="1" value="{{old('FAVOLITE122',$yoso_tenji->FAVOLITE122 ?? '')}}"></td>
            <td id="TD_FAVOLITE123" class="kumi"><input onfocus="funcForcus();" type="text" name="FAVOLITE123" id="FAVOLITE123" class="fm_f-waku" maxlength="1" value="{{old('FAVOLITE123',$yoso_tenji->FAVOLITE123 ?? '')}}"></td>
            </tr>
            <tr>
            <td class="kumi_no"></td>
            <td id="TD_FAVOLITE132" class="kumi"><input onfocus="funcForcus();" type="text" name="FAVOLITE132" id="FAVOLITE132" class="fm_f-waku" maxlength="1" value="{{old('FAVOLITE132',$yoso_tenji->FAVOLITE132 ?? '')}}"></td>
            <td id="TD_FAVOLITE133" class="kumi"><input onfocus="funcForcus();" type="text" name="FAVOLITE133" id="FAVOLITE133" class="fm_f-waku" maxlength="1" value="{{old('FAVOLITE133',$yoso_tenji->FAVOLITE133 ?? '')}}"></td>
            </tr>
            </table>
            
            <table id="ta_focus">
            <tr>
            <td class="kumi_no"></td>
            <td rowspan="3" class="sct">
            <center>
            <select onfocus="funcForcus();" name="FAVOLITE_MARK21" id="FAVOLITE_MARK21">
            <option value="0" @if((old('FAVOLITE_MARK21',$yoso_tenji->FAVOLITE_MARK21) ?? 99) == 0) selected @endif>/cms/images/f_code00.gif</option>
            <option value="1" @if((old('FAVOLITE_MARK21',$yoso_tenji->FAVOLITE_MARK21) ?? 99) == 1) selected @endif>/cms/images/f_code01.gif</option>
            <option value="2" @if((old('FAVOLITE_MARK21',$yoso_tenji->FAVOLITE_MARK21) ?? 99) == 2) selected @endif>/cms/images/f_code02.gif</option>
            <option value="3" @if((old('FAVOLITE_MARK21',$yoso_tenji->FAVOLITE_MARK21) ?? 99) == 3) selected @endif>/cms/images/f_code03.gif</option>
            <option value="5" @if((old('FAVOLITE_MARK21',$yoso_tenji->FAVOLITE_MARK21) ?? 99) == 5) selected @endif>/cms/images/f_code05.gif</option>
            <option value="8" @if((old('FAVOLITE_MARK21',$yoso_tenji->FAVOLITE_MARK21) ?? 99) == 8) selected @endif>/cms/images/f_code08.gif</option>
            <option value="9" @if((old('FAVOLITE_MARK21',$yoso_tenji->FAVOLITE_MARK21) ?? 99) == 9) selected @endif>/cms/images/f_code09.gif</option>
            </select>
            </center>
            </td>
            <td id="TD_FAVOLITE212" class="kumi"><input onfocus="funcForcus();" type="text" name="FAVOLITE212" id="FAVOLITE212" class="fm_f-waku" maxlength="1" value="{{old('FAVOLITE212',$yoso_tenji->FAVOLITE212 ?? '')}}"></td>
            <td rowspan="3" class="sct">
            <center>
            <select onfocus="funcForcus();" name="FAVOLITE_MARK22" id="FAVOLITE_MARK22">
            <option value="0" @if((old('FAVOLITE_MARK22',$yoso_tenji->FAVOLITE_MARK22) ?? 99) == 0) selected @endif>/cms/images/f_code00.gif</option>
            <option value="1" @if((old('FAVOLITE_MARK22',$yoso_tenji->FAVOLITE_MARK22) ?? 99) == 1) selected @endif>/cms/images/f_code01.gif</option>
            <option value="2" @if((old('FAVOLITE_MARK22',$yoso_tenji->FAVOLITE_MARK22) ?? 99) == 2) selected @endif>/cms/images/f_code02.gif</option>
            <option value="3" @if((old('FAVOLITE_MARK22',$yoso_tenji->FAVOLITE_MARK22) ?? 99) == 3) selected @endif>/cms/images/f_code03.gif</option>
            <option value="5" @if((old('FAVOLITE_MARK22',$yoso_tenji->FAVOLITE_MARK22) ?? 99) == 5) selected @endif>/cms/images/f_code05.gif</option>
            <option value="9" @if((old('FAVOLITE_MARK22',$yoso_tenji->FAVOLITE_MARK22) ?? 99) == 9) selected @endif>/cms/images/f_code09.gif</option>
            </select>
            </center>
            </td>
            <td id="TD_FAVOLITE213" class="kumi"><input onfocus="funcForcus();" type="text" name="FAVOLITE213" id="FAVOLITE213" class="fm_f-waku" maxlength="1" value="{{old('FAVOLITE213',$yoso_tenji->FAVOLITE213 ?? '')}}"></td>
            </tr>
            <tr>
            <td id="TD_FAVOLITE211" class="kumi"><input onfocus="funcForcus();" type="text" name="FAVOLITE211" id="FAVOLITE211" class="fm_f-waku" maxlength="1" value="{{old('FAVOLITE211',$yoso_tenji->FAVOLITE211 ?? '')}}"></td>
            <td id="TD_FAVOLITE222" class="kumi"><input onfocus="funcForcus();" type="text" name="FAVOLITE222" id="FAVOLITE222" class="fm_f-waku" maxlength="1" value="{{old('FAVOLITE222',$yoso_tenji->FAVOLITE222 ?? '')}}"></td>
            <td id="TD_FAVOLITE223" class="kumi"><input onfocus="funcForcus();" type="text" name="FAVOLITE223" id="FAVOLITE223" class="fm_f-waku" maxlength="1" value="{{old('FAVOLITE223',$yoso_tenji->FAVOLITE223 ?? '')}}"></td>
            </tr>
            <tr>
            <td class="kumi_no"></td>
            <td id="TD_FAVOLITE232" class="kumi"><input onfocus="funcForcus();" type="text" name="FAVOLITE232" id="FAVOLITE232" class="fm_f-waku" maxlength="1" value="{{old('FAVOLITE232',$yoso_tenji->FAVOLITE232 ?? '')}}"></td>
            <td id="TD_FAVOLITE233" class="kumi"><input onfocus="funcForcus();" type="text" name="FAVOLITE233" id="FAVOLITE233" class="fm_f-waku" maxlength="1" value="{{old('FAVOLITE233',$yoso_tenji->FAVOLITE233 ?? '')}}"></td>
            </tr>
            </table>
            
            
            </div><!--/#focus_waku_l-->
            
            
            
            <!--**** 穴 ****-->
            <div id="focus_waku_r">
            <span class="focus_t2">穴</span>
            
            <!-- ▼枠▼ -->
            <table id="ta_focus">
            <tr>
            <td class="kumi_no"></td>
            <td rowspan="3" class="sct">
            <center>
            <select onfocus="funcForcus();" name="RICH_MARK11" id="RICH_MARK11">
            <option value="0" @if((old('RICH_MARK11',$yoso_tenji->RICH_MARK11) ?? 99) == 0) selected @endif>/cms/images/f_code00.gif</option>
            <option value="1" @if((old('RICH_MARK11',$yoso_tenji->RICH_MARK11) ?? 99) == 1) selected @endif>/cms/images/f_code01.gif</option>
            <option value="2" @if((old('RICH_MARK11',$yoso_tenji->RICH_MARK11) ?? 99) == 2) selected @endif>/cms/images/f_code02.gif</option>
            <option value="3" @if((old('RICH_MARK11',$yoso_tenji->RICH_MARK11) ?? 99) == 3) selected @endif>/cms/images/f_code03.gif</option>
            <option value="5" @if((old('RICH_MARK11',$yoso_tenji->RICH_MARK11) ?? 99) == 5) selected @endif>/cms/images/f_code05.gif</option>
            <option value="8" @if((old('RICH_MARK11',$yoso_tenji->RICH_MARK11) ?? 99) == 8) selected @endif>/cms/images/f_code08.gif</option>
            <option value="9" @if((old('RICH_MARK11',$yoso_tenji->RICH_MARK11) ?? 99) == 9) selected @endif>/cms/images/f_code09.gif</option>
            </select>
            </center>
            </td>
            <td id="TD_RICH112" class="kumi"><input onfocus="funcForcus();" type="text" name="RICH112" id="RICH112" class="fm_f-waku" maxlength="1" value="{{old('RICH112',$yoso_tenji->RICH112 ?? '')}}"></td>
            <td rowspan="3" class="sct">
            <center>
            <select onfocus="funcForcus();" name="RICH_MARK12" id="RICH_MARK12">
            <option value="0" @if((old('RICH_MARK12',$yoso_tenji->RICH_MARK12) ?? 99) == 0) selected @endif>/cms/images/f_code00.gif</option>
            <option value="1" @if((old('RICH_MARK12',$yoso_tenji->RICH_MARK12) ?? 99) == 1) selected @endif>/cms/images/f_code01.gif</option>
            <option value="2" @if((old('RICH_MARK12',$yoso_tenji->RICH_MARK12) ?? 99) == 2) selected @endif>/cms/images/f_code02.gif</option>
            <option value="3" @if((old('RICH_MARK12',$yoso_tenji->RICH_MARK12) ?? 99) == 3) selected @endif>/cms/images/f_code03.gif</option>
            <option value="5" @if((old('RICH_MARK12',$yoso_tenji->RICH_MARK12) ?? 99) == 5) selected @endif>/cms/images/f_code05.gif</option>
            <option value="9" @if((old('RICH_MARK12',$yoso_tenji->RICH_MARK12) ?? 99) == 9) selected @endif>/cms/images/f_code09.gif</option>
            </select>
            </center>
            </td>
            <td id="TD_RICH113" class="kumi"><input onfocus="funcForcus();" type="text" name="RICH113" id="RICH113" class="fm_f-waku" maxlength="1" value="{{old('RICH113',$yoso_tenji->RICH113 ?? '')}}"></td>
            </tr>
            <tr>
            <td id="TD_RICH111" class="kumi"><input onfocus="funcForcus();" type="text" name="RICH111" id="RICH111" class="fm_f-waku" maxlength="1" value="{{old('RICH111',$yoso_tenji->RICH111 ?? '')}}"></td>
            <td id="TD_RICH122" class="kumi"><input onfocus="funcForcus();" type="text" name="RICH122" id="RICH122" class="fm_f-waku" maxlength="1" value="{{old('RICH122',$yoso_tenji->RICH122 ?? '')}}"></td>
            <td id="TD_RICH123" class="kumi"><input onfocus="funcForcus();" type="text" name="RICH123" id="RICH123" class="fm_f-waku" maxlength="1" value="{{old('RICH123',$yoso_tenji->RICH123 ?? '')}}"></td>
            </tr>
            <tr>
            <td class="kumi_no"></td>
            <td id="TD_RICH132" class="kumi"><input onfocus="funcForcus();" type="text" name="RICH132" id="RICH132" class="fm_f-waku" maxlength="1" value="{{old('RICH132',$yoso_tenji->RICH132 ?? '')}}"></td>
            <td id="TD_RICH133" class="kumi"><input onfocus="funcForcus();" type="text" name="RICH133" id="RICH133" class="fm_f-waku" maxlength="1" value="{{old('RICH133',$yoso_tenji->RICH133 ?? '')}}"></td>
            </tr>
            </table>
            
            <table id="ta_focus">
            <tr>
            <td class="kumi_no"></td>
            <td rowspan="3" class="sct">
            <center>
            <select onfocus="funcForcus();" name="RICH_MARK21" id="RICH_MARK21">
            <option value="0" @if((old('RICH_MARK21',$yoso_tenji->RICH_MARK21) ?? 99) == 0) selected @endif>/cms/images/f_code00.gif</option>
            <option value="1" @if((old('RICH_MARK21',$yoso_tenji->RICH_MARK21) ?? 99) == 1) selected @endif>/cms/images/f_code01.gif</option>
            <option value="2" @if((old('RICH_MARK21',$yoso_tenji->RICH_MARK21) ?? 99) == 2) selected @endif>/cms/images/f_code02.gif</option>
            <option value="3" @if((old('RICH_MARK21',$yoso_tenji->RICH_MARK21) ?? 99) == 3) selected @endif>/cms/images/f_code03.gif</option>
            <option value="5" @if((old('RICH_MARK21',$yoso_tenji->RICH_MARK21) ?? 99) == 5) selected @endif>/cms/images/f_code05.gif</option>
            <option value="8" @if((old('RICH_MARK21',$yoso_tenji->RICH_MARK21) ?? 99) == 8) selected @endif>/cms/images/f_code08.gif</option>
            <option value="9" @if((old('RICH_MARK21',$yoso_tenji->RICH_MARK21) ?? 99) == 9) selected @endif>/cms/images/f_code09.gif</option>
            </select>
            </center>
            </td>
            <td id="TD_RICH212" class="kumi"><input onfocus="funcForcus();" type="text" name="RICH212" id="RICH212" class="fm_f-waku" maxlength="1" value="{{old('RICH212',$yoso_tenji->RICH212 ?? '')}}"></td>
            <td rowspan="3" class="sct">
            <center>
            <select onfocus="funcForcus();" name="RICH_MARK22" id="RICH_MARK22">
            <option value="0" @if((old('RICH_MARK22',$yoso_tenji->RICH_MARK22) ?? 99) == 0) selected @endif>/cms/images/f_code00.gif</option>
            <option value="1" @if((old('RICH_MARK22',$yoso_tenji->RICH_MARK22) ?? 99) == 1) selected @endif>/cms/images/f_code01.gif</option>
            <option value="2" @if((old('RICH_MARK22',$yoso_tenji->RICH_MARK22) ?? 99) == 2) selected @endif>/cms/images/f_code02.gif</option>
            <option value="3" @if((old('RICH_MARK22',$yoso_tenji->RICH_MARK22) ?? 99) == 3) selected @endif>/cms/images/f_code03.gif</option>
            <option value="5" @if((old('RICH_MARK22',$yoso_tenji->RICH_MARK22) ?? 99) == 5) selected @endif>/cms/images/f_code05.gif</option>
            <option value="9" @if((old('RICH_MARK22',$yoso_tenji->RICH_MARK22) ?? 99) == 9) selected @endif>/cms/images/f_code09.gif</option>
            </select>
            </center>
            </td>
            <td id="TD_RICH213" class="kumi"><input onfocus="funcForcus();" type="text" name="RICH213" id="RICH213" class="fm_f-waku" maxlength="1" value="{{old('RICH213',$yoso_tenji->RICH213 ?? '')}}"></td>
            </tr>
            <tr>
            <td id="TD_RICH211" class="kumi"><input onfocus="funcForcus();" type="text" name="RICH211" id="RICH211" class="fm_f-waku" maxlength="1" value="{{old('RICH211',$yoso_tenji->RICH211 ?? '')}}"></td>
            <td id="TD_RICH222" class="kumi"><input onfocus="funcForcus();" type="text" name="RICH222" id="RICH222" class="fm_f-waku" maxlength="1" value="{{old('RICH222',$yoso_tenji->RICH222 ?? '')}}"></td>
            <td id="TD_RICH223" class="kumi"><input onfocus="funcForcus();" type="text" name="RICH223" id="RICH223" class="fm_f-waku" maxlength="1" value="{{old('RICH223',$yoso_tenji->RICH223 ?? '')}}"></td>
            </tr>
            <tr>
            <td class="kumi_no"></td>
            <td id="TD_RICH232" class="kumi"><input onfocus="funcForcus();" type="text" name="RICH232" id="RICH232" class="fm_f-waku" maxlength="1" value="{{old('RICH232',$yoso_tenji->RICH232 ?? '')}}"></td>
            <td id="TD_RICH233" class="kumi"><input onfocus="funcForcus();" type="text" name="RICH233" id="RICH233" class="fm_f-waku" maxlength="1" value="{{old('RICH233',$yoso_tenji->RICH233 ?? '')}}"></td>
            </tr>
            </table>
            
            </div><!--/#focus_waku_r-->
            <div class="clear"></div>
            
            <span class="focus_note">※｢本命｣の入力が無い場合、｢穴｣の入力は無効になります。</span>
            </div><!--/#focus_waku-->
            
            
            </div><!--/#wrapper-->
            
            
            <!--▼▼▼フッター▼▼▼-->
            <div id="footer">
            
            <div id="footer_in">
            <div id="footer_in_l">
            <ul>
            <li class="save"><input type="button" onClick="javascript:funcSave( '0' );" value="保存"></li>
            <li class="preview">プレビュー</li>
            <li class="pv_b"><a href="/admin_kisya/tenji/preview_pc?target_date={{$target_date}}&race_num={{$race_num}}" target="_blank">PC</a></li>
            <li class="pv_b"><a href="/admin_kisya/tenji/preview_sp?target_date={{$target_date}}&race_num={{$race_num}}" target="_blank">スマホ</a></li>
            {{--<li class="pv_b"><a href="/k/real_t/syussoumenu.asp?jyo=09&no=09&preview=1&yd=20210620&racenum=1" target="_blank">携帯</a></li>--}}
            <div class="clear"></div>
            </ul>
            </div><!--/#fotter_in_l-->
            
            <div id="footer_in_r">
            
            <div id="action_a">
            <h3>全12Rを一括</h3>
            <span class="open_b"><input type="button" onClick="location.href='/admin_kisya/tenji/change_appear_flg_all?TARGET_DATE={{$target_date}}&RACE_NUM={{$race_num}}&APPEAR_FLG=1'" value="公開"></span>
            <span class="close_b"><input type="button" onClick="location.href='/admin_kisya/tenji/change_appear_flg_all?TARGET_DATE={{$target_date}}&RACE_NUM={{$race_num}}&APPEAR_FLG=0'" value="非公開"></span>
            <div class="clear"></div>
            </div><!--/#action_a-->
            
            <div id="action_b">
            <h3>各レース</h3>
            <span class="open_b"><input type="button" onClick="location.href='/admin_kisya/tenji/change_appear_flg?TARGET_DATE={{$target_date}}&RACE_NUM={{$race_num}}&APPEAR_FLG=1'" value="公開"></span>
            <span class="close_b"><input type="button" onClick="location.href='/admin_kisya/tenji/change_appear_flg?TARGET_DATE={{$target_date}}&RACE_NUM={{$race_num}}&APPEAR_FLG=0'" value="非公開"></span>
            <div class="clear"></div>
            </div><!--/#action_b-->
            
            <div class="clear"></div>
            </div><!--/#fotter_in_r-->
            
            <div class="clear"></div>
            </div><!--/#fotter_in-->
            
            </div><!--/#footer-->
            
            <input type="hidden" name="APPEAR_FLG" value="1">
            <input type="hidden" name="MODE" value="0">
            <input type="hidden" name="RACE_NUM" value="1">
            <input type="hidden" name="NEXT_RACE_NUM" value="0">
            @csrf
    </form>
@endsection

@section('script')
    <script type="text/javascript" src="/cms/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/asp/kyogi/09/pc/Jsinfo.js"></script>

    <!-- アコーディオンメニュー -->
    <script type="text/javascript" src="/cms/js/accordion.js"></script>

    <style type="text/css">
        .fm_f-waku2 {
            width: 20px;
            font-size: 18px;
            background: #EEEEEE;
            border-style: none;
            text-align: center;
        }
        .kumi2{
            width: 30px;
            height: 30px;
            border: 3px solid #CCCCCC;
            background: #EEEEEE;
            font-size: 18px;
        }
    </style>
    <script type="text/javascript" src="/cms/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/cms/js/imageselect.js"></script>
    <script type="text/javascript">
        $(document).ready( function() {
            $('select[name=FAVOLITE_MARK11]').ImageSelect({
                width:30,
                height:70,
                dropdownHeight:470,
                dropdownWidth:30,
                z:99999,
                border:true,
                backgroundColor:'#FFFFFF',
                borderColor:'#FFFFFF',
                lock:'width' //height
            });
            $('select[name=FAVOLITE_MARK12]').ImageSelect({
                width:30,
                height:70,
                dropdownHeight:470,
                dropdownWidth:30,
                z:99999,
                border:true,
                backgroundColor:'#FFFFFF',
                borderColor:'#FFFFFF',
                lock:'width' //height
            });
            $('select[name=FAVOLITE_MARK21]').ImageSelect({
                width:30,
                height:70,
                dropdownHeight:470,
                dropdownWidth:30,
                z:99999,
                border:true,
                backgroundColor:'#FFFFFF',
                borderColor:'#FFFFFF',
                lock:'width' //height
            });
            $('select[name=FAVOLITE_MARK22]').ImageSelect({
                width:30,
                height:70,
                dropdownHeight:470,
                dropdownWidth:30,
                z:99999,
                border:true,
                backgroundColor:'#FFFFFF',
                borderColor:'#FFFFFF',
                lock:'width' //height
            });
            $('select[name=RICH_MARK11]').ImageSelect({
                width:30,
                height:70,
                dropdownHeight:470,
                dropdownWidth:30,
                z:99999,
                border:true,
                backgroundColor:'#FFFFFF',
                borderColor:'#FFFFFF',
                lock:'width' //height
            });
            $('select[name=RICH_MARK12]').ImageSelect({
                width:30,
                height:70,
                dropdownHeight:470,
                dropdownWidth:30,
                z:99999,
                border:true,
                backgroundColor:'#FFFFFF',
                borderColor:'#FFFFFF',
                lock:'width' //height
            });
            $('select[name=RICH_MARK21]').ImageSelect({
                width:30,
                height:70,
                dropdownHeight:470,
                dropdownWidth:30,
                z:99999,
                border:true,
                backgroundColor:'#FFFFFF',
                borderColor:'#FFFFFF',
                lock:'width' //height
            });
            $('select[name=RICH_MARK22]').ImageSelect({
                width:30,
                height:70,
                dropdownHeight:470,
                dropdownWidth:30,
                z:99999,
                border:true,
                backgroundColor:'#FFFFFF',
                borderColor:'#FFFFFF',
                lock:'width' //height
            });

        });
        var boolCursorFlg = false;
        function funcForcus(){
            boolCursorFlg = true; 
        }
        function funcLink( argURL , argPage ){
            if( boolCursorFlg ){ 
                if( window.confirm( 'データは保存されていません。\n保存して移動しますか？' ) ){
                    //document.form.action = 'yoso3_execute.asp?ret=' + argPage;
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
            var boolForcus = true;
            if(document.getElementById( 'FAVOLITE111' ).value !== '' ){
                if( int( document.getElementById( 'FAVOLITE111' ).value ) == false ){
                    boolForcus = false;
                }else if( document.getElementById( 'FAVOLITE111' ).value < 1 || document.getElementById( 'FAVOLITE111' ).value > 6 ){
                    boolForcus = false;
                }
            }
            for( var intLoopCount = 1 ; intLoopCount <= 3 ; intLoopCount++ ){
                for( var intLoopCount2 = 2 ; intLoopCount2 <= 3; intLoopCount2++){
                    if(document.getElementById( 'FAVOLITE1' + intLoopCount + intLoopCount2  ).value !== '' ){
                        if( int( document.getElementById( 'FAVOLITE1' + intLoopCount + intLoopCount2  ).value ) == false ){
                            boolForcus = false;
                        }else if( document.getElementById( 'FAVOLITE1' + intLoopCount + intLoopCount2  ).value < 1 || document.getElementById( 'FAVOLITE1' + intLoopCount + intLoopCount2  ).value > 6 ){
                            boolForcus = false;
                        }
                    }
                }
            }
            if(document.getElementById( 'FAVOLITE211' ).value !== '' ){
                if( int( document.getElementById( 'FAVOLITE211' ).value ) == false ){
                    boolForcus = false;
                }else if( document.getElementById( 'FAVOLITE211' ).value < 1 || document.getElementById( 'FAVOLITE211' ).value > 6 ){
                    boolForcus = false;
                }
            }
            for( var intLoopCount = 1 ; intLoopCount <= 3 ; intLoopCount++ ){
                for( var intLoopCount2 = 2 ; intLoopCount2 <= 3; intLoopCount2++){
                    if(document.getElementById( 'FAVOLITE2' + intLoopCount + intLoopCount2  ).value !== '' ){
                        if( int( document.getElementById( 'FAVOLITE2' + intLoopCount + intLoopCount2  ).value ) == false ){
                            boolForcus = false;
                        }else if( document.getElementById( 'FAVOLITE2' + intLoopCount + intLoopCount2  ).value < 1 || document.getElementById( 'FAVOLITE2' + intLoopCount + intLoopCount2  ).value > 6 ){
                            boolForcus = false;
                        }
                    }
                }
            }
            if(document.getElementById( 'RICH111' ).value !== '' ){
                if( int( document.getElementById( 'RICH111' ).value ) == false ){
                    boolForcus = false;
                }else if( document.getElementById( 'RICH111' ).value < 1 || document.getElementById( 'RICH111' ).value > 6 ){
                    boolForcus = false;
                }
            }
            for( var intLoopCount = 1 ; intLoopCount <= 3 ; intLoopCount++ ){
                for( var intLoopCount2 = 2 ; intLoopCount2 <= 3; intLoopCount2++){
                    if(document.getElementById( 'RICH1' + intLoopCount + intLoopCount2  ).value !== '' ){
                        if( int( document.getElementById( 'RICH1' + intLoopCount + intLoopCount2  ).value ) == false ){
                            boolForcus = false;
                        }else if( document.getElementById( 'RICH1' + intLoopCount + intLoopCount2  ).value < 1 || document.getElementById( 'RICH1' + intLoopCount + intLoopCount2  ).value > 6 ){
                            boolForcus = false;
                        }
                    }
                }
            }
            if(document.getElementById( 'RICH211' ).value !== '' ){
                if( int( document.getElementById( 'RICH211' ).value ) == false ){
                    boolForcus = false;
                }else if( document.getElementById( 'RICH211' ).value < 1 || document.getElementById( 'RICH211' ).value > 6 ){
                    boolForcus = false;
                }
            }
            for( var intLoopCount = 1 ; intLoopCount <= 3 ; intLoopCount++ ){
                for( var intLoopCount2 = 2 ; intLoopCount2 <= 3; intLoopCount2++){
                    if(document.getElementById( 'RICH2' + intLoopCount + intLoopCount2  ).value !== '' ){
                        if( int( document.getElementById( 'RICH2' + intLoopCount + intLoopCount2  ).value ) == false ){
                            boolForcus = false;
                        }else if( document.getElementById( 'RICH2' + intLoopCount + intLoopCount2  ).value < 1 || document.getElementById( 'RICH2' + intLoopCount + intLoopCount2  ).value > 6 ){
                            boolForcus = false;
                        }
                    }
                }
            }
            if( boolForcus == false ){
                strMessage = strMessage + 'フォーカスは数字(1～6)で入力してください。'; 
                boolJudge = false;
            }
            
            
            
            
            if( boolJudge ){
                document.form.submit()
            }else{
                //document.form.action='yoso3_execute.asp';
                alert( strMessage );
            }
        }
        function funcChangeDate( ){
            document.form.action='yoso3.asp?yd=' + document.form.TARGET_DATE.value;
            document.form.submit()
        }
        function funcForcusClear( ){
            $('#FAVOLITE_MARK11').ImageSelect('update',{src:'/cms/images/f_code00.gif'});
            $('#FAVOLITE_MARK12').ImageSelect('update',{src:'/cms/images/f_code00.gif'});
            $('#FAVOLITE_MARK21').ImageSelect('update',{src:'/cms/images/f_code00.gif'});
            $('#FAVOLITE_MARK22').ImageSelect('update',{src:'/cms/images/f_code00.gif'});
            $('#RICH_MARK11').ImageSelect('update',{src:'/cms/images/f_code00.gif'});
            $('#RICH_MARK12').ImageSelect('update',{src:'/cms/images/f_code00.gif'});
            $('#RICH_MARK21').ImageSelect('update',{src:'/cms/images/f_code00.gif'});
            $('#RICH_MARK22').ImageSelect('update',{src:'/cms/images/f_code00.gif'});
            document.form.FAVOLITE_MARK11.value='0';
            document.form.FAVOLITE_MARK12.value='0';
            document.form.FAVOLITE_MARK21.value='0';
            document.form.FAVOLITE_MARK22.value='0';
            document.form.RICH_MARK11.value='0';
            document.form.RICH_MARK12.value='0';
            document.form.RICH_MARK21.value='0';
            document.form.RICH_MARK22.value='0';
            document.form.FAVOLITE111.disabled = false;
            document.form.FAVOLITE112.disabled = false;
            document.form.FAVOLITE113.disabled = false;
            document.form.FAVOLITE122.disabled = false;
            document.form.FAVOLITE123.disabled = false;
            document.form.FAVOLITE132.disabled = false;
            document.form.FAVOLITE133.disabled = false;
            document.form.FAVOLITE111.value = '';
            document.form.FAVOLITE112.value = '';
            document.form.FAVOLITE113.value = '';
            document.form.FAVOLITE122.value = '';
            document.form.FAVOLITE123.value = '';
            document.form.FAVOLITE132.value = '';
            document.form.FAVOLITE133.value = '';
            document.getElementById( 'FAVOLITE111' ).className = 'fm_f-waku';
            document.getElementById( 'FAVOLITE112' ).className = 'fm_f-waku';
            document.getElementById( 'FAVOLITE113' ).className = 'fm_f-waku';
            document.getElementById( 'FAVOLITE122' ).className = 'fm_f-waku';
            document.getElementById( 'FAVOLITE123' ).className = 'fm_f-waku';
            document.getElementById( 'FAVOLITE132' ).className = 'fm_f-waku';
            document.getElementById( 'FAVOLITE133' ).className = 'fm_f-waku';
            document.getElementById( 'TD_FAVOLITE111' ).className = 'kumi';
            document.getElementById( 'TD_FAVOLITE112' ).className = 'kumi';
            document.getElementById( 'TD_FAVOLITE113' ).className = 'kumi';
            document.getElementById( 'TD_FAVOLITE122' ).className = 'kumi';
            document.getElementById( 'TD_FAVOLITE123' ).className = 'kumi';
            document.getElementById( 'TD_FAVOLITE132' ).className = 'kumi';
            document.getElementById( 'TD_FAVOLITE133' ).className = 'kumi';
            document.form.FAVOLITE211.disabled = false;
            document.form.FAVOLITE212.disabled = false;
            document.form.FAVOLITE213.disabled = false;
            document.form.FAVOLITE222.disabled = false;
            document.form.FAVOLITE223.disabled = false;
            document.form.FAVOLITE232.disabled = false;
            document.form.FAVOLITE233.disabled = false;
            document.form.FAVOLITE211.value = '';
            document.form.FAVOLITE212.value = '';
            document.form.FAVOLITE213.value = '';
            document.form.FAVOLITE222.value = '';
            document.form.FAVOLITE223.value = '';
            document.form.FAVOLITE232.value = '';
            document.form.FAVOLITE233.value = '';
            document.getElementById( 'FAVOLITE211' ).className = 'fm_f-waku';
            document.getElementById( 'FAVOLITE212' ).className = 'fm_f-waku';
            document.getElementById( 'FAVOLITE213' ).className = 'fm_f-waku';
            document.getElementById( 'FAVOLITE222' ).className = 'fm_f-waku';
            document.getElementById( 'FAVOLITE223' ).className = 'fm_f-waku';
            document.getElementById( 'FAVOLITE232' ).className = 'fm_f-waku';
            document.getElementById( 'FAVOLITE233' ).className = 'fm_f-waku';
            document.getElementById( 'TD_FAVOLITE211' ).className = 'kumi';
            document.getElementById( 'TD_FAVOLITE212' ).className = 'kumi';
            document.getElementById( 'TD_FAVOLITE213' ).className = 'kumi';
            document.getElementById( 'TD_FAVOLITE222' ).className = 'kumi';
            document.getElementById( 'TD_FAVOLITE223' ).className = 'kumi';
            document.getElementById( 'TD_FAVOLITE232' ).className = 'kumi';
            document.getElementById( 'TD_FAVOLITE233' ).className = 'kumi';
            document.form.FAVOLITE111.disabled = false;
            document.form.FAVOLITE112.disabled = false;
            document.form.FAVOLITE113.disabled = false;
            document.form.FAVOLITE122.disabled = false;
            document.form.FAVOLITE123.disabled = false;
            document.form.FAVOLITE132.disabled = false;
            document.form.FAVOLITE133.disabled = false;
            document.form.FAVOLITE111.value = '';
            document.form.FAVOLITE112.value = '';
            document.form.FAVOLITE113.value = '';
            document.form.FAVOLITE122.value = '';
            document.form.FAVOLITE123.value = '';
            document.form.FAVOLITE132.value = '';
            document.form.FAVOLITE133.value = '';
            document.getElementById( 'FAVOLITE111' ).className = 'fm_f-waku';
            document.getElementById( 'FAVOLITE112' ).className = 'fm_f-waku';
            document.getElementById( 'FAVOLITE113' ).className = 'fm_f-waku';
            document.getElementById( 'FAVOLITE122' ).className = 'fm_f-waku';
            document.getElementById( 'FAVOLITE123' ).className = 'fm_f-waku';
            document.getElementById( 'FAVOLITE132' ).className = 'fm_f-waku';
            document.getElementById( 'FAVOLITE133' ).className = 'fm_f-waku';
            document.getElementById( 'TD_FAVOLITE111' ).className = 'kumi';
            document.getElementById( 'TD_FAVOLITE112' ).className = 'kumi';
            document.getElementById( 'TD_FAVOLITE113' ).className = 'kumi';
            document.getElementById( 'TD_FAVOLITE122' ).className = 'kumi';
            document.getElementById( 'TD_FAVOLITE123' ).className = 'kumi';
            document.getElementById( 'TD_FAVOLITE132' ).className = 'kumi';
            document.getElementById( 'TD_FAVOLITE133' ).className = 'kumi';
            document.form.RICH111.disabled = false;
            document.form.RICH112.disabled = false;
            document.form.RICH113.disabled = false;
            document.form.RICH122.disabled = false;
            document.form.RICH123.disabled = false;
            document.form.RICH132.disabled = false;
            document.form.RICH133.disabled = false;
            document.form.RICH111.value = '';
            document.form.RICH112.value = '';
            document.form.RICH113.value = '';
            document.form.RICH122.value = '';
            document.form.RICH123.value = '';
            document.form.RICH132.value = '';
            document.form.RICH133.value = '';
            document.getElementById( 'RICH111' ).className = 'fm_f-waku';
            document.getElementById( 'RICH112' ).className = 'fm_f-waku';
            document.getElementById( 'RICH113' ).className = 'fm_f-waku';
            document.getElementById( 'RICH122' ).className = 'fm_f-waku';
            document.getElementById( 'RICH123' ).className = 'fm_f-waku';
            document.getElementById( 'RICH132' ).className = 'fm_f-waku';
            document.getElementById( 'RICH133' ).className = 'fm_f-waku';
            document.getElementById( 'TD_RICH111' ).className = 'kumi';
            document.getElementById( 'TD_RICH112' ).className = 'kumi';
            document.getElementById( 'TD_RICH113' ).className = 'kumi';
            document.getElementById( 'TD_RICH122' ).className = 'kumi';
            document.getElementById( 'TD_RICH123' ).className = 'kumi';
            document.getElementById( 'TD_RICH132' ).className = 'kumi';
            document.getElementById( 'TD_RICH133' ).className = 'kumi';
            document.form.RICH211.disabled = false;
            document.form.RICH212.disabled = false;
            document.form.RICH213.disabled = false;
            document.form.RICH222.disabled = false;
            document.form.RICH223.disabled = false;
            document.form.RICH232.disabled = false;
            document.form.RICH233.disabled = false;
            document.form.RICH211.value = '';
            document.form.RICH212.value = '';
            document.form.RICH213.value = '';
            document.form.RICH222.value = '';
            document.form.RICH223.value = '';
            document.form.RICH232.value = '';
            document.form.RICH233.value = '';
            document.getElementById( 'RICH211' ).className = 'fm_f-waku';
            document.getElementById( 'RICH212' ).className = 'fm_f-waku';
            document.getElementById( 'RICH213' ).className = 'fm_f-waku';
            document.getElementById( 'RICH222' ).className = 'fm_f-waku';
            document.getElementById( 'RICH223' ).className = 'fm_f-waku';
            document.getElementById( 'RICH232' ).className = 'fm_f-waku';
            document.getElementById( 'RICH233' ).className = 'fm_f-waku';
            document.getElementById( 'TD_RICH211' ).className = 'kumi';
            document.getElementById( 'TD_RICH212' ).className = 'kumi';
            document.getElementById( 'TD_RICH213' ).className = 'kumi';
            document.getElementById( 'TD_RICH222' ).className = 'kumi';
            document.getElementById( 'TD_RICH223' ).className = 'kumi';
            document.getElementById( 'TD_RICH232' ).className = 'kumi';
            document.getElementById( 'TD_RICH233' ).className = 'kumi';
        }
        function funcTextCount( ){
            var strHTML = '';
            var intMaxCount = 0;
            if( document.form.COMMENT.value.length > 100 ){
                strHTML = '<font color="#FF0000">現在' + document.form.COMMENT.value.length +'字</font>';
            }else{
                strHTML = '現在' + document.form.COMMENT.value.length +'字';
            }
            document.getElementById( 'count' ).innerHTML = strHTML;
        }
        function funcLoad(){
            if( document.form.FAVOLITE_MARK11.value == '8' ){
                document.form.FAVOLITE111.disabled = true;
                document.form.FAVOLITE113.disabled = true;
                document.form.FAVOLITE123.disabled = true;
                document.form.FAVOLITE133.disabled = true;
                document.form.FAVOLITE111.value = '';
                document.form.FAVOLITE113.value = '';
                document.form.FAVOLITE123.value = '';
                document.form.FAVOLITE133.value = '';
                document.getElementById( 'FAVOLITE111' ).className = 'fm_f-waku2';
                document.getElementById( 'FAVOLITE113' ).className = 'fm_f-waku2';
                document.getElementById( 'FAVOLITE123' ).className = 'fm_f-waku2';
                document.getElementById( 'FAVOLITE133' ).className = 'fm_f-waku2';
                document.getElementById( 'TD_FAVOLITE111' ).className = 'kumi2';
                document.getElementById( 'TD_FAVOLITE113' ).className = 'kumi2';
                document.getElementById( 'TD_FAVOLITE123' ).className = 'kumi2';
                document.getElementById( 'TD_FAVOLITE133' ).className = 'kumi2';
            }else if( document.form.FAVOLITE_MARK11.value == '9' ){
                document.form.FAVOLITE112.disabled = true;
                document.form.FAVOLITE122.disabled = true;
                document.form.FAVOLITE132.disabled = true;
                document.form.FAVOLITE112.value = '';
                document.form.FAVOLITE122.value = '';
                document.form.FAVOLITE132.value = '';
                document.getElementById( 'FAVOLITE112' ).className = 'fm_f-waku2';
                document.getElementById( 'FAVOLITE122' ).className = 'fm_f-waku2';
                document.getElementById( 'FAVOLITE132' ).className = 'fm_f-waku2';
                document.getElementById( 'TD_FAVOLITE112' ).className = 'kumi2';
                document.getElementById( 'TD_FAVOLITE122' ).className = 'kumi2';
                document.getElementById( 'TD_FAVOLITE132' ).className = 'kumi2';
                if( document.form.FAVOLITE_MARK12.value == '9' ){
                    document.form.FAVOLITE113.disabled = true;
                    document.form.FAVOLITE123.disabled = true;
                    document.form.FAVOLITE133.disabled = true;
                    document.form.FAVOLITE113.value = '';
                    document.form.FAVOLITE123.value = '';
                    document.form.FAVOLITE133.value = '';
                    document.getElementById( 'FAVOLITE113' ).className = 'fm_f-waku2';
                    document.getElementById( 'FAVOLITE123' ).className = 'fm_f-waku2';
                    document.getElementById( 'FAVOLITE133' ).className = 'fm_f-waku2';
                    document.getElementById( 'TD_FAVOLITE113' ).className = 'kumi2';
                    document.getElementById( 'TD_FAVOLITE123' ).className = 'kumi2';
                    document.getElementById( 'TD_FAVOLITE133' ).className = 'kumi2';
                }else{
                    document.form.FAVOLITE113.disabled = false;
                    document.form.FAVOLITE123.disabled = false;
                    document.form.FAVOLITE133.disabled = false;
                    document.getElementById( 'FAVOLITE113' ).className = 'fm_f-waku';
                    document.getElementById( 'FAVOLITE123' ).className = 'fm_f-waku';
                    document.getElementById( 'FAVOLITE133' ).className = 'fm_f-waku';
                    document.getElementById( 'TD_FAVOLITE113' ).className = 'kumi';
                    document.getElementById( 'TD_FAVOLITE123' ).className = 'kumi';
                    document.getElementById( 'TD_FAVOLITE133' ).className = 'kumi';
                }
            }else{
                document.form.FAVOLITE112.disabled = false;
                document.form.FAVOLITE122.disabled = false;
                document.form.FAVOLITE132.disabled = false;
                document.getElementById( 'FAVOLITE112' ).className = 'fm_f-waku';
                document.getElementById( 'FAVOLITE122' ).className = 'fm_f-waku';
                document.getElementById( 'FAVOLITE132' ).className = 'fm_f-waku';
                document.getElementById( 'TD_FAVOLITE112' ).className = 'kumi';
                document.getElementById( 'TD_FAVOLITE122' ).className = 'kumi';
                document.getElementById( 'TD_FAVOLITE132' ).className = 'kumi';
                if( document.form.FAVOLITE_MARK12.value == '9' ){
                    document.form.FAVOLITE113.disabled = true;
                    document.form.FAVOLITE123.disabled = true;
                    document.form.FAVOLITE133.disabled = true;
                    document.form.FAVOLITE113.value = '';
                    document.form.FAVOLITE123.value = '';
                    document.form.FAVOLITE133.value = '';
                    document.getElementById( 'FAVOLITE113' ).className = 'fm_f-waku2';
                    document.getElementById( 'FAVOLITE123' ).className = 'fm_f-waku2';
                    document.getElementById( 'FAVOLITE133' ).className = 'fm_f-waku2';
                    document.getElementById( 'TD_FAVOLITE113' ).className = 'kumi2';
                    document.getElementById( 'TD_FAVOLITE123' ).className = 'kumi2';
                    document.getElementById( 'TD_FAVOLITE133' ).className = 'kumi2';
                }else{
                    document.form.FAVOLITE113.disabled = false;
                    document.form.FAVOLITE123.disabled = false;
                    document.form.FAVOLITE133.disabled = false;
                    document.getElementById( 'FAVOLITE113' ).className = 'fm_f-waku';
                    document.getElementById( 'FAVOLITE123' ).className = 'fm_f-waku';
                    document.getElementById( 'FAVOLITE133' ).className = 'fm_f-waku';
                    document.getElementById( 'TD_FAVOLITE113' ).className = 'kumi';
                    document.getElementById( 'TD_FAVOLITE123' ).className = 'kumi';
                    document.getElementById( 'TD_FAVOLITE133' ).className = 'kumi';
                }
            }
            if( document.form.FAVOLITE_MARK21.value == '8' ){
                document.form.FAVOLITE211.disabled = true;
                document.form.FAVOLITE213.disabled = true;
                document.form.FAVOLITE223.disabled = true;
                document.form.FAVOLITE233.disabled = true;
                document.form.FAVOLITE211.value = '';
                document.form.FAVOLITE213.value = '';
                document.form.FAVOLITE223.value = '';
                document.form.FAVOLITE233.value = '';
                document.getElementById( 'FAVOLITE211' ).className = 'fm_f-waku2';
                document.getElementById( 'FAVOLITE213' ).className = 'fm_f-waku2';
                document.getElementById( 'FAVOLITE223' ).className = 'fm_f-waku2';
                document.getElementById( 'FAVOLITE233' ).className = 'fm_f-waku2';
                document.getElementById( 'TD_FAVOLITE211' ).className = 'kumi2';
                document.getElementById( 'TD_FAVOLITE213' ).className = 'kumi2';
                document.getElementById( 'TD_FAVOLITE223' ).className = 'kumi2';
                document.getElementById( 'TD_FAVOLITE233' ).className = 'kumi2';
            }else if( document.form.FAVOLITE_MARK21.value == '9' ){
                document.form.FAVOLITE212.disabled = true;
                document.form.FAVOLITE222.disabled = true;
                document.form.FAVOLITE232.disabled = true;
                document.form.FAVOLITE212.value = '';
                document.form.FAVOLITE222.value = '';
                document.form.FAVOLITE232.value = '';
                document.getElementById( 'FAVOLITE212' ).className = 'fm_f-waku2';
                document.getElementById( 'FAVOLITE222' ).className = 'fm_f-waku2';
                document.getElementById( 'FAVOLITE232' ).className = 'fm_f-waku2';
                document.getElementById( 'TD_FAVOLITE212' ).className = 'kumi2';
                document.getElementById( 'TD_FAVOLITE222' ).className = 'kumi2';
                document.getElementById( 'TD_FAVOLITE232' ).className = 'kumi2';
                if( document.form.FAVOLITE_MARK22.value == '9' ){
                    document.form.FAVOLITE213.disabled = true;
                    document.form.FAVOLITE223.disabled = true;
                    document.form.FAVOLITE233.disabled = true;
                    document.form.FAVOLITE213.value = '';
                    document.form.FAVOLITE223.value = '';
                    document.form.FAVOLITE233.value = '';
                    document.getElementById( 'FAVOLITE213' ).className = 'fm_f-waku2';
                    document.getElementById( 'FAVOLITE223' ).className = 'fm_f-waku2';
                    document.getElementById( 'FAVOLITE233' ).className = 'fm_f-waku2';
                    document.getElementById( 'TD_FAVOLITE213' ).className = 'kumi2';
                    document.getElementById( 'TD_FAVOLITE223' ).className = 'kumi2';
                    document.getElementById( 'TD_FAVOLITE233' ).className = 'kumi2';
                }else{
                    document.form.FAVOLITE213.disabled = false;
                    document.form.FAVOLITE223.disabled = false;
                    document.form.FAVOLITE233.disabled = false;
                    document.getElementById( 'FAVOLITE213' ).className = 'fm_f-waku';
                    document.getElementById( 'FAVOLITE223' ).className = 'fm_f-waku';
                    document.getElementById( 'FAVOLITE233' ).className = 'fm_f-waku';
                    document.getElementById( 'TD_FAVOLITE213' ).className = 'kumi';
                    document.getElementById( 'TD_FAVOLITE223' ).className = 'kumi';
                    document.getElementById( 'TD_FAVOLITE233' ).className = 'kumi';
                }
            }else{
                document.form.FAVOLITE212.disabled = false;
                document.form.FAVOLITE222.disabled = false;
                document.form.FAVOLITE232.disabled = false;
                document.getElementById( 'FAVOLITE212' ).className = 'fm_f-waku';
                document.getElementById( 'FAVOLITE222' ).className = 'fm_f-waku';
                document.getElementById( 'FAVOLITE232' ).className = 'fm_f-waku';
                document.getElementById( 'TD_FAVOLITE212' ).className = 'kumi';
                document.getElementById( 'TD_FAVOLITE222' ).className = 'kumi';
                document.getElementById( 'TD_FAVOLITE232' ).className = 'kumi';
                if( document.form.FAVOLITE_MARK22.value == '9' ){
                    document.form.FAVOLITE213.disabled = true;
                    document.form.FAVOLITE223.disabled = true;
                    document.form.FAVOLITE233.disabled = true;
                    document.form.FAVOLITE213.value = '';
                    document.form.FAVOLITE223.value = '';
                    document.form.FAVOLITE233.value = '';
                    document.getElementById( 'FAVOLITE213' ).className = 'fm_f-waku2';
                    document.getElementById( 'FAVOLITE223' ).className = 'fm_f-waku2';
                    document.getElementById( 'FAVOLITE233' ).className = 'fm_f-waku2';
                    document.getElementById( 'TD_FAVOLITE213' ).className = 'kumi2';
                    document.getElementById( 'TD_FAVOLITE223' ).className = 'kumi2';
                    document.getElementById( 'TD_FAVOLITE233' ).className = 'kumi2';
                }else{
                    document.form.FAVOLITE213.disabled = false;
                    document.form.FAVOLITE223.disabled = false;
                    document.form.FAVOLITE233.disabled = false;
                    document.getElementById( 'FAVOLITE213' ).className = 'fm_f-waku';
                    document.getElementById( 'FAVOLITE223' ).className = 'fm_f-waku';
                    document.getElementById( 'FAVOLITE233' ).className = 'fm_f-waku';
                    document.getElementById( 'TD_FAVOLITE213' ).className = 'kumi';
                    document.getElementById( 'TD_FAVOLITE223' ).className = 'kumi';
                    document.getElementById( 'TD_FAVOLITE233' ).className = 'kumi';
                }
            }

            if( document.form.RICH_MARK11.value == '8' ){
                document.form.RICH111.disabled = true;
                document.form.RICH113.disabled = true;
                document.form.RICH123.disabled = true;
                document.form.RICH133.disabled = true;
                document.form.RICH111.value = '';
                document.form.RICH113.value = '';
                document.form.RICH123.value = '';
                document.form.RICH133.value = '';
                document.getElementById( 'RICH111' ).className = 'fm_f-waku2';
                document.getElementById( 'RICH113' ).className = 'fm_f-waku2';
                document.getElementById( 'RICH123' ).className = 'fm_f-waku2';
                document.getElementById( 'RICH133' ).className = 'fm_f-waku2';
                document.getElementById( 'TD_RICH111' ).className = 'kumi2';
                document.getElementById( 'TD_RICH113' ).className = 'kumi2';
                document.getElementById( 'TD_RICH123' ).className = 'kumi2';
                document.getElementById( 'TD_RICH133' ).className = 'kumi2';
            }else if( document.form.RICH_MARK11.value == '9' ){
                document.form.RICH112.disabled = true;
                document.form.RICH122.disabled = true;
                document.form.RICH132.disabled = true;
                document.form.RICH112.value = '';
                document.form.RICH122.value = '';
                document.form.RICH132.value = '';
                document.getElementById( 'RICH112' ).className = 'fm_f-waku2';
                document.getElementById( 'RICH122' ).className = 'fm_f-waku2';
                document.getElementById( 'RICH132' ).className = 'fm_f-waku2';
                document.getElementById( 'TD_RICH112' ).className = 'kumi2';
                document.getElementById( 'TD_RICH122' ).className = 'kumi2';
                document.getElementById( 'TD_RICH132' ).className = 'kumi2';
                if( document.form.RICH_MARK12.value == '9' ){
                    document.form.RICH113.disabled = true;
                    document.form.RICH123.disabled = true;
                    document.form.RICH133.disabled = true;
                    document.form.RICH113.value = '';
                    document.form.RICH123.value = '';
                    document.form.RICH133.value = '';
                    document.getElementById( 'RICH113' ).className = 'fm_f-waku2';
                    document.getElementById( 'RICH123' ).className = 'fm_f-waku2';
                    document.getElementById( 'RICH133' ).className = 'fm_f-waku2';
                    document.getElementById( 'TD_RICH113' ).className = 'kumi2';
                    document.getElementById( 'TD_RICH123' ).className = 'kumi2';
                    document.getElementById( 'TD_RICH133' ).className = 'kumi2';
                }else{
                    document.form.RICH113.disabled = false;
                    document.form.RICH123.disabled = false;
                    document.form.RICH133.disabled = false;
                    document.getElementById( 'RICH113' ).className = 'fm_f-waku';
                    document.getElementById( 'RICH123' ).className = 'fm_f-waku';
                    document.getElementById( 'RICH133' ).className = 'fm_f-waku';
                    document.getElementById( 'TD_RICH113' ).className = 'kumi';
                    document.getElementById( 'TD_RICH123' ).className = 'kumi';
                    document.getElementById( 'TD_RICH133' ).className = 'kumi';
                }
            }else{
                document.form.RICH112.disabled = false;
                document.form.RICH122.disabled = false;
                document.form.RICH132.disabled = false;
                document.getElementById( 'RICH112' ).className = 'fm_f-waku';
                document.getElementById( 'RICH122' ).className = 'fm_f-waku';
                document.getElementById( 'RICH132' ).className = 'fm_f-waku';
                document.getElementById( 'TD_RICH112' ).className = 'kumi';
                document.getElementById( 'TD_RICH122' ).className = 'kumi';
                document.getElementById( 'TD_RICH132' ).className = 'kumi';
                if( document.form.RICH_MARK12.value == '9' ){
                    document.form.RICH113.disabled = true;
                    document.form.RICH123.disabled = true;
                    document.form.RICH133.disabled = true;
                    document.form.RICH113.value = '';
                    document.form.RICH123.value = '';
                    document.form.RICH133.value = '';
                    document.getElementById( 'RICH113' ).className = 'fm_f-waku2';
                    document.getElementById( 'RICH123' ).className = 'fm_f-waku2';
                    document.getElementById( 'RICH133' ).className = 'fm_f-waku2';
                    document.getElementById( 'TD_RICH113' ).className = 'kumi2';
                    document.getElementById( 'TD_RICH123' ).className = 'kumi2';
                    document.getElementById( 'TD_RICH133' ).className = 'kumi2';
                }else{
                    document.form.RICH113.disabled = false;
                    document.form.RICH123.disabled = false;
                    document.form.RICH133.disabled = false;
                    document.getElementById( 'RICH113' ).className = 'fm_f-waku';
                    document.getElementById( 'RICH123' ).className = 'fm_f-waku';
                    document.getElementById( 'RICH133' ).className = 'fm_f-waku';
                    document.getElementById( 'TD_RICH113' ).className = 'kumi';
                    document.getElementById( 'TD_RICH123' ).className = 'kumi';
                    document.getElementById( 'TD_RICH133' ).className = 'kumi';
                }
            }
            if( document.form.RICH_MARK21.value == '8' ){
                document.form.RICH211.disabled = true;
                document.form.RICH213.disabled = true;
                document.form.RICH223.disabled = true;
                document.form.RICH233.disabled = true;
                document.form.RICH211.value = '';
                document.form.RICH213.value = '';
                document.form.RICH223.value = '';
                document.form.RICH233.value = '';
                document.getElementById( 'RICH211' ).className = 'fm_f-waku2';
                document.getElementById( 'RICH213' ).className = 'fm_f-waku2';
                document.getElementById( 'RICH223' ).className = 'fm_f-waku2';
                document.getElementById( 'RICH233' ).className = 'fm_f-waku2';
                document.getElementById( 'TD_RICH211' ).className = 'kumi2';
                document.getElementById( 'TD_RICH213' ).className = 'kumi2';
                document.getElementById( 'TD_RICH223' ).className = 'kumi2';
                document.getElementById( 'TD_RICH233' ).className = 'kumi2';
            }else if( document.form.RICH_MARK21.value == '9' ){
                document.form.RICH212.disabled = true;
                document.form.RICH222.disabled = true;
                document.form.RICH232.disabled = true;
                document.form.RICH212.value = '';
                document.form.RICH222.value = '';
                document.form.RICH232.value = '';
                document.getElementById( 'RICH212' ).className = 'fm_f-waku2';
                document.getElementById( 'RICH222' ).className = 'fm_f-waku2';
                document.getElementById( 'RICH232' ).className = 'fm_f-waku2';
                document.getElementById( 'TD_RICH212' ).className = 'kumi2';
                document.getElementById( 'TD_RICH222' ).className = 'kumi2';
                document.getElementById( 'TD_RICH232' ).className = 'kumi2';
                if( document.form.RICH_MARK22.value == '9' ){
                    document.form.RICH213.disabled = true;
                    document.form.RICH223.disabled = true;
                    document.form.RICH233.disabled = true;
                    document.form.RICH213.value = '';
                    document.form.RICH223.value = '';
                    document.form.RICH233.value = '';
                    document.getElementById( 'RICH213' ).className = 'fm_f-waku2';
                    document.getElementById( 'RICH223' ).className = 'fm_f-waku2';
                    document.getElementById( 'RICH233' ).className = 'fm_f-waku2';
                    document.getElementById( 'TD_RICH213' ).className = 'kumi2';
                    document.getElementById( 'TD_RICH223' ).className = 'kumi2';
                    document.getElementById( 'TD_RICH233' ).className = 'kumi2';
                }else{
                    document.form.RICH213.disabled = false;
                    document.form.RICH223.disabled = false;
                    document.form.RICH233.disabled = false;
                    document.getElementById( 'RICH213' ).className = 'fm_f-waku';
                    document.getElementById( 'RICH223' ).className = 'fm_f-waku';
                    document.getElementById( 'RICH233' ).className = 'fm_f-waku';
                    document.getElementById( 'TD_RICH213' ).className = 'kumi';
                    document.getElementById( 'TD_RICH223' ).className = 'kumi';
                    document.getElementById( 'TD_RICH233' ).className = 'kumi';
                }
            }else{
                document.form.RICH212.disabled = false;
                document.form.RICH222.disabled = false;
                document.form.RICH232.disabled = false;
                document.getElementById( 'RICH212' ).className = 'fm_f-waku';
                document.getElementById( 'RICH222' ).className = 'fm_f-waku';
                document.getElementById( 'RICH232' ).className = 'fm_f-waku';
                document.getElementById( 'TD_RICH212' ).className = 'kumi';
                document.getElementById( 'TD_RICH222' ).className = 'kumi';
                document.getElementById( 'TD_RICH232' ).className = 'kumi';
                if( document.form.RICH_MARK22.value == '9' ){
                    document.form.RICH213.disabled = true;
                    document.form.RICH223.disabled = true;
                    document.form.RICH233.disabled = true;
                    document.form.RICH213.value = '';
                    document.form.RICH223.value = '';
                    document.form.RICH233.value = '';
                    document.getElementById( 'RICH213' ).className = 'fm_f-waku2';
                    document.getElementById( 'RICH223' ).className = 'fm_f-waku2';
                    document.getElementById( 'RICH233' ).className = 'fm_f-waku2';
                    document.getElementById( 'TD_RICH213' ).className = 'kumi2';
                    document.getElementById( 'TD_RICH223' ).className = 'kumi2';
                    document.getElementById( 'TD_RICH233' ).className = 'kumi2';
                }else{
                    document.form.RICH213.disabled = false;
                    document.form.RICH223.disabled = false;
                    document.form.RICH233.disabled = false;
                    document.getElementById( 'RICH213' ).className = 'fm_f-waku';
                    document.getElementById( 'RICH223' ).className = 'fm_f-waku';
                    document.getElementById( 'RICH233' ).className = 'fm_f-waku';
                    document.getElementById( 'TD_RICH213' ).className = 'kumi';
                    document.getElementById( 'TD_RICH223' ).className = 'kumi';
                    document.getElementById( 'TD_RICH233' ).className = 'kumi';
                }
            }

        }
        function funcClick(){
            $('#FAVOLITE_MARK11').ImageSelect('close')
            $('#FAVOLITE_MARK12').ImageSelect('close')
            $('#FAVOLITE_MARK21').ImageSelect('close')
            $('#FAVOLITE_MARK22').ImageSelect('close')
            $('#RICH_MARK11').ImageSelect('close')
            $('#RICH_MARK12').ImageSelect('close')
            $('#RICH_MARK21').ImageSelect('close')
            $('#RICH_MARK22').ImageSelect('close')
        }
        $(function(){
        $('body').click(function(){
                funcClick();
        });

        $('.sct').click(function(e){
            e.stopPropagation();
        });
        });
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

        funcLoad();funcTextCount();
    </script>
@endsection