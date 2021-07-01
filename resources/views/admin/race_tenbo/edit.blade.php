@extends('layouts.admin_layout')

@section('title', 'レース展望登録ページ')

@section('content')

    <h1>レース展望登録ページ ID:{{ $race_tenbo->ID }}</h1>
    <div style="margin:40px 0;">
        <form method="post" enctype="multipart/form-data">
            
            <div class="card bg-secondary mb-3" >
                <div class="card-header">タイトル</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="TITLE" value="{{ old('TITLE', $race_tenbo->TITLE) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">本文</div>
                <div class="card-body">
                    <textarea class="form-control " name="LETTER_BODY" rows="3">{{ old('LETTER_BODY', $race_tenbo->LETTER_BODY) }}</textarea>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">リードタイトル</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="LEADTITLE" value="{{ old('LEADTITLE', $race_tenbo->LEADTITLE) }}">
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">リード</div>
                <div class="card-body">
                    <textarea class="form-control " name="LEADLETTER_BODY" rows="3">{{ old('LEADLETTER_BODY', $race_tenbo->LEADLETTER_BODY) }}</textarea>
                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">PICKUP[1]</div>
                <div class="card-body">
                    登番:<input type="text" class="form-control " name="LEADER1" value="{{ old('LEADER1', $race_tenbo->LEADER1) }}">
                    リード:<textarea class="form-control " name="PICKUP_LEAD1" rows="3">{{ old('PICKUP_LEAD1', $race_tenbo->PICKUP_LEAD1) }}</textarea>
                    成績基準日<input type="text" class="form-control " name="PICKUP_SEISEKI_STANDARD_DATE1" value="{{ old('PICKUP_SEISEKI_STANDARD_DATE1', $race_tenbo->PICKUP_SEISEKI_STANDARD_DATE1) }}">
                    <button type="button" class="btn btn-primary" onclick="get_kinkyo('1')">データベースから成績を呼び出す</button>

                    <div style="background-color:#ddd ; padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【当地成績1】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE1_1" value="{{ old('PICKUP_SEISEKI_DATE1_1', $race_tenbo->PICKUP_SEISEKI_DATE1_1) }}"  style="width: 200px; display:inline-block;">　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE1_1" value="{{ old('PICKUP_SEISEKI_GRADE1_1', $race_tenbo->PICKUP_SEISEKI_GRADE1_1) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_1_1" value="{{ old('PICKUP_SEISEKI_y_1_1', $race_tenbo->PICKUP_SEISEKI_y_1_1) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_1_1" value="{{ old('PICKUP_SEISEKI_j_1_1', $race_tenbo->PICKUP_SEISEKI_j_1_1) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_1_1" value="{{ old('PICKUP_SEISEKI_v_1_1', $race_tenbo->PICKUP_SEISEKI_v_1_1) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_1_1" value="{{ old('PICKUP_SEISEKI_e_1_1', $race_tenbo->PICKUP_SEISEKI_e_1_1) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>

                    
                    <div style="padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【当地成績2】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE1_2" value="{{ old('PICKUP_SEISEKI_DATE1_2', $race_tenbo->PICKUP_SEISEKI_DATE1_2) }}"  style="width: 200px; display:inline-block;">　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE1_2" value="{{ old('PICKUP_SEISEKI_GRADE1_2', $race_tenbo->PICKUP_SEISEKI_GRADE1_2) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_1_2" value="{{ old('PICKUP_SEISEKI_y_1_2', $race_tenbo->PICKUP_SEISEKI_y_1_2) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_1_2" value="{{ old('PICKUP_SEISEKI_j_1_2', $race_tenbo->PICKUP_SEISEKI_j_1_2) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_1_2" value="{{ old('PICKUP_SEISEKI_v_1_2', $race_tenbo->PICKUP_SEISEKI_v_1_2) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_1_2" value="{{ old('PICKUP_SEISEKI_e_1_2', $race_tenbo->PICKUP_SEISEKI_e_1_2) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>
                    
                    <div style="background-color:#ddd ; padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【全国成績1】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE1_3" value="{{ old('PICKUP_SEISEKI_DATE1_3', $race_tenbo->PICKUP_SEISEKI_DATE1_3) }}"  style="width: 200px; display:inline-block;">　
                            場コード:<input type="text" class="form-control " name="PICKUP_SEISEKI_JYO1_3" value="{{ old('PICKUP_SEISEKI_JYO1_3', $race_tenbo->PICKUP_SEISEKI_JYO1_3) }}"  style="width: 200px; display:inline-block;">　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE1_3" value="{{ old('PICKUP_SEISEKI_GRADE1_3', $race_tenbo->PICKUP_SEISEKI_GRADE1_3) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_1_3" value="{{ old('PICKUP_SEISEKI_y_1_3', $race_tenbo->PICKUP_SEISEKI_y_1_3) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_1_3" value="{{ old('PICKUP_SEISEKI_j_1_3', $race_tenbo->PICKUP_SEISEKI_j_1_3) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_1_3" value="{{ old('PICKUP_SEISEKI_v_1_3', $race_tenbo->PICKUP_SEISEKI_v_1_3) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_1_3" value="{{ old('PICKUP_SEISEKI_e_1_3', $race_tenbo->PICKUP_SEISEKI_e_1_3) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>
                    
                    <div style="padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【全国成績2】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE1_4" value="{{ old('PICKUP_SEISEKI_DATE1_4', $race_tenbo->PICKUP_SEISEKI_DATE1_4) }}"  style="width: 200px; display:inline-block;">　
                            場コード:<input type="text" class="form-control " name="PICKUP_SEISEKI_JYO1_4" value="{{ old('PICKUP_SEISEKI_JYO1_4', $race_tenbo->PICKUP_SEISEKI_JYO1_4) }}"  style="width: 200px; display:inline-block;">　　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE1_4" value="{{ old('PICKUP_SEISEKI_GRADE1_4', $race_tenbo->PICKUP_SEISEKI_GRADE1_4) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_1_4" value="{{ old('PICKUP_SEISEKI_y_1_4', $race_tenbo->PICKUP_SEISEKI_y_1_4) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_1_4" value="{{ old('PICKUP_SEISEKI_j_1_4', $race_tenbo->PICKUP_SEISEKI_j_1_4) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_1_4" value="{{ old('PICKUP_SEISEKI_v_1_4', $race_tenbo->PICKUP_SEISEKI_v_1_4) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_1_4" value="{{ old('PICKUP_SEISEKI_e_1_4', $race_tenbo->PICKUP_SEISEKI_e_1_4) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>

                </div>
            </div>

            <div class="card bg-secondary mb-3" >
                <div class="card-header">PICKUP[2]</div>
                <div class="card-body">
                    登番:<input type="text" class="form-control " name="LEADER2" value="{{ old('LEADER2', $race_tenbo->LEADER2) }}">
                    リード:<textarea class="form-control " name="PICKUP_LEAD2" rows="3">{{ old('PICKUP_LEAD2', $race_tenbo->PICKUP_LEAD2) }}</textarea>
                    成績基準日<input type="text" class="form-control " name="PICKUP_SEISEKI_STANDARD_DATE2" value="{{ old('PICKUP_SEISEKI_STANDARD_DATE2', $race_tenbo->PICKUP_SEISEKI_STANDARD_DATE2) }}">
                    <button type="button" class="btn btn-primary" onclick="get_kinkyo('2')">データベースから成績を呼び出す</button>

                    <div style="background-color:#ddd ; padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【当地成績1】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE2_1" value="{{ old('PICKUP_SEISEKI_DATE2_1', $race_tenbo->PICKUP_SEISEKI_DATE2_1) }}"  style="width: 200px; display:inline-block;">　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE2_1" value="{{ old('PICKUP_SEISEKI_GRADE2_1', $race_tenbo->PICKUP_SEISEKI_GRADE2_1) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_2_1" value="{{ old('PICKUP_SEISEKI_y_2_1', $race_tenbo->PICKUP_SEISEKI_y_2_1) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_2_1" value="{{ old('PICKUP_SEISEKI_j_2_1', $race_tenbo->PICKUP_SEISEKI_j_2_1) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_2_1" value="{{ old('PICKUP_SEISEKI_v_2_1', $race_tenbo->PICKUP_SEISEKI_v_2_1) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_2_1" value="{{ old('PICKUP_SEISEKI_e_2_1', $race_tenbo->PICKUP_SEISEKI_e_2_1) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>

                    
                    <div style="padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【当地成績2】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE2_2" value="{{ old('PICKUP_SEISEKI_DATE2_2', $race_tenbo->PICKUP_SEISEKI_DATE2_2) }}"  style="width: 200px; display:inline-block;">　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE2_2" value="{{ old('PICKUP_SEISEKI_GRADE2_2', $race_tenbo->PICKUP_SEISEKI_GRADE2_2) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_2_2" value="{{ old('PICKUP_SEISEKI_y_2_2', $race_tenbo->PICKUP_SEISEKI_y_2_2) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_2_2" value="{{ old('PICKUP_SEISEKI_j_2_2', $race_tenbo->PICKUP_SEISEKI_j_2_2) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_2_2" value="{{ old('PICKUP_SEISEKI_v_2_2', $race_tenbo->PICKUP_SEISEKI_v_2_2) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_2_2" value="{{ old('PICKUP_SEISEKI_e_2_2', $race_tenbo->PICKUP_SEISEKI_e_2_2) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>
                    
                    <div style="background-color:#ddd ; padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【全国成績1】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE2_3" value="{{ old('PICKUP_SEISEKI_DATE2_3', $race_tenbo->PICKUP_SEISEKI_DATE2_3) }}"  style="width: 200px; display:inline-block;">　
                            場コード:<input type="text" class="form-control " name="PICKUP_SEISEKI_JYO2_3" value="{{ old('PICKUP_SEISEKI_JYO2_3', $race_tenbo->PICKUP_SEISEKI_JYO2_3) }}"  style="width: 200px; display:inline-block;">　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE2_3" value="{{ old('PICKUP_SEISEKI_GRADE2_3', $race_tenbo->PICKUP_SEISEKI_GRADE2_3) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_2_3" value="{{ old('PICKUP_SEISEKI_y_2_3', $race_tenbo->PICKUP_SEISEKI_y_2_3) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_2_3" value="{{ old('PICKUP_SEISEKI_j_2_3', $race_tenbo->PICKUP_SEISEKI_j_2_3) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_2_3" value="{{ old('PICKUP_SEISEKI_v_2_3', $race_tenbo->PICKUP_SEISEKI_v_2_3) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_2_3" value="{{ old('PICKUP_SEISEKI_e_2_3', $race_tenbo->PICKUP_SEISEKI_e_2_3) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>
                    
                    <div style="padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【全国成績2】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE2_4" value="{{ old('PICKUP_SEISEKI_DATE2_4', $race_tenbo->PICKUP_SEISEKI_DATE2_4) }}"  style="width: 200px; display:inline-block;">　
                            場コード:<input type="text" class="form-control " name="PICKUP_SEISEKI_JYO2_4" value="{{ old('PICKUP_SEISEKI_JYO2_4', $race_tenbo->PICKUP_SEISEKI_JYO2_4) }}"  style="width: 200px; display:inline-block;">　　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE2_4" value="{{ old('PICKUP_SEISEKI_GRADE2_4', $race_tenbo->PICKUP_SEISEKI_GRADE2_4) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_2_4" value="{{ old('PICKUP_SEISEKI_y_2_4', $race_tenbo->PICKUP_SEISEKI_y_2_4) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_2_4" value="{{ old('PICKUP_SEISEKI_j_2_4', $race_tenbo->PICKUP_SEISEKI_j_2_4) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_2_4" value="{{ old('PICKUP_SEISEKI_v_2_4', $race_tenbo->PICKUP_SEISEKI_v_2_4) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_2_4" value="{{ old('PICKUP_SEISEKI_e_2_4', $race_tenbo->PICKUP_SEISEKI_e_2_4) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>

                </div>
            </div>


            
            <div class="card bg-secondary mb-3" >
                <div class="card-header">PICKUP[3]</div>
                <div class="card-body">
                    登番:<input type="text" class="form-control " name="LEADER3" value="{{ old('LEADER3', $race_tenbo->LEADER3) }}">
                    リード:<textarea class="form-control " name="PICKUP_LEAD3" rows="3">{{ old('PICKUP_LEAD3', $race_tenbo->PICKUP_LEAD3) }}</textarea>
                    成績基準日<input type="text" class="form-control " name="PICKUP_SEISEKI_STANDARD_DATE3" value="{{ old('PICKUP_SEISEKI_STANDARD_DATE3', $race_tenbo->PICKUP_SEISEKI_STANDARD_DATE3) }}">
                    <button type="button" class="btn btn-primary" onclick="get_kinkyo('3')">データベースから成績を呼び出す</button>

                    <div style="background-color:#ddd ; padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【当地成績1】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE3_1" value="{{ old('PICKUP_SEISEKI_DATE3_1', $race_tenbo->PICKUP_SEISEKI_DATE3_1) }}"  style="width: 200px; display:inline-block;">　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE3_1" value="{{ old('PICKUP_SEISEKI_GRADE3_1', $race_tenbo->PICKUP_SEISEKI_GRADE3_1) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_3_1" value="{{ old('PICKUP_SEISEKI_y_3_1', $race_tenbo->PICKUP_SEISEKI_y_3_1) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_3_1" value="{{ old('PICKUP_SEISEKI_j_3_1', $race_tenbo->PICKUP_SEISEKI_j_3_1) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_3_1" value="{{ old('PICKUP_SEISEKI_v_3_1', $race_tenbo->PICKUP_SEISEKI_v_3_1) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_3_1" value="{{ old('PICKUP_SEISEKI_e_3_1', $race_tenbo->PICKUP_SEISEKI_e_3_1) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>

                    
                    <div style="padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【当地成績2】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE3_2" value="{{ old('PICKUP_SEISEKI_DATE3_2', $race_tenbo->PICKUP_SEISEKI_DATE3_2) }}"  style="width: 200px; display:inline-block;">　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE3_2" value="{{ old('PICKUP_SEISEKI_GRADE3_2', $race_tenbo->PICKUP_SEISEKI_GRADE3_2) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_3_2" value="{{ old('PICKUP_SEISEKI_y_3_2', $race_tenbo->PICKUP_SEISEKI_y_3_2) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_3_2" value="{{ old('PICKUP_SEISEKI_j_3_2', $race_tenbo->PICKUP_SEISEKI_j_3_2) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_3_2" value="{{ old('PICKUP_SEISEKI_v_3_2', $race_tenbo->PICKUP_SEISEKI_v_3_2) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_3_2" value="{{ old('PICKUP_SEISEKI_e_3_2', $race_tenbo->PICKUP_SEISEKI_e_3_2) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>
                    
                    <div style="background-color:#ddd ; padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【全国成績1】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE3_3" value="{{ old('PICKUP_SEISEKI_DATE3_3', $race_tenbo->PICKUP_SEISEKI_DATE3_3) }}"  style="width: 200px; display:inline-block;">　
                            場コード:<input type="text" class="form-control " name="PICKUP_SEISEKI_JYO3_3" value="{{ old('PICKUP_SEISEKI_JYO3_3', $race_tenbo->PICKUP_SEISEKI_JYO3_3) }}"  style="width: 200px; display:inline-block;">　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE3_3" value="{{ old('PICKUP_SEISEKI_GRADE3_3', $race_tenbo->PICKUP_SEISEKI_GRADE3_3) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_3_3" value="{{ old('PICKUP_SEISEKI_y_3_3', $race_tenbo->PICKUP_SEISEKI_y_3_3) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_3_3" value="{{ old('PICKUP_SEISEKI_j_3_3', $race_tenbo->PICKUP_SEISEKI_j_3_3) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_3_3" value="{{ old('PICKUP_SEISEKI_v_3_3', $race_tenbo->PICKUP_SEISEKI_v_3_3) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_3_3" value="{{ old('PICKUP_SEISEKI_e_3_3', $race_tenbo->PICKUP_SEISEKI_e_3_3) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>
                    
                    <div style="padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【全国成績2】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE3_4" value="{{ old('PICKUP_SEISEKI_DATE3_4', $race_tenbo->PICKUP_SEISEKI_DATE3_4) }}"  style="width: 200px; display:inline-block;">　
                            場コード:<input type="text" class="form-control " name="PICKUP_SEISEKI_JYO3_4" value="{{ old('PICKUP_SEISEKI_JYO3_4', $race_tenbo->PICKUP_SEISEKI_JYO3_4) }}"  style="width: 200px; display:inline-block;">　　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE3_4" value="{{ old('PICKUP_SEISEKI_GRADE3_4', $race_tenbo->PICKUP_SEISEKI_GRADE3_4) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_3_4" value="{{ old('PICKUP_SEISEKI_y_3_4', $race_tenbo->PICKUP_SEISEKI_y_3_4) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_3_4" value="{{ old('PICKUP_SEISEKI_j_3_4', $race_tenbo->PICKUP_SEISEKI_j_3_4) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_3_4" value="{{ old('PICKUP_SEISEKI_v_3_4', $race_tenbo->PICKUP_SEISEKI_v_3_4) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_3_4" value="{{ old('PICKUP_SEISEKI_e_3_4', $race_tenbo->PICKUP_SEISEKI_e_3_4) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>

                </div>
            </div>


            <div class="card bg-secondary mb-3" >
                <div class="card-header">PICKUP[4]</div>
                <div class="card-body">
                    登番:<input type="text" class="form-control " name="LEADER4" value="{{ old('LEADER4', $race_tenbo->LEADER4) }}">
                    リード:<textarea class="form-control " name="PICKUP_LEAD4" rows="3">{{ old('PICKUP_LEAD4', $race_tenbo->PICKUP_LEAD4) }}</textarea>
                    成績基準日<input type="text" class="form-control " name="PICKUP_SEISEKI_STANDARD_DATE4" value="{{ old('PICKUP_SEISEKI_STANDARD_DATE4', $race_tenbo->PICKUP_SEISEKI_STANDARD_DATE4) }}">
                    <button type="button" class="btn btn-primary" onclick="get_kinkyo('4')">データベースから成績を呼び出す</button>

                    <div style="background-color:#ddd ; padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【当地成績1】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE4_1" value="{{ old('PICKUP_SEISEKI_DATE4_1', $race_tenbo->PICKUP_SEISEKI_DATE4_1) }}"  style="width: 200px; display:inline-block;">　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE4_1" value="{{ old('PICKUP_SEISEKI_GRADE4_1', $race_tenbo->PICKUP_SEISEKI_GRADE4_1) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_4_1" value="{{ old('PICKUP_SEISEKI_y_4_1', $race_tenbo->PICKUP_SEISEKI_y_4_1) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_4_1" value="{{ old('PICKUP_SEISEKI_j_4_1', $race_tenbo->PICKUP_SEISEKI_j_4_1) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_4_1" value="{{ old('PICKUP_SEISEKI_v_4_1', $race_tenbo->PICKUP_SEISEKI_v_4_1) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_4_1" value="{{ old('PICKUP_SEISEKI_e_4_1', $race_tenbo->PICKUP_SEISEKI_e_4_1) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>

                    
                    <div style="padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【当地成績2】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE4_2" value="{{ old('PICKUP_SEISEKI_DATE4_2', $race_tenbo->PICKUP_SEISEKI_DATE4_2) }}"  style="width: 200px; display:inline-block;">　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE4_2" value="{{ old('PICKUP_SEISEKI_GRADE4_2', $race_tenbo->PICKUP_SEISEKI_GRADE4_2) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_4_2" value="{{ old('PICKUP_SEISEKI_y_4_2', $race_tenbo->PICKUP_SEISEKI_y_4_2) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_4_2" value="{{ old('PICKUP_SEISEKI_j_4_2', $race_tenbo->PICKUP_SEISEKI_j_4_2) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_4_2" value="{{ old('PICKUP_SEISEKI_v_4_2', $race_tenbo->PICKUP_SEISEKI_v_4_2) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_4_2" value="{{ old('PICKUP_SEISEKI_e_4_2', $race_tenbo->PICKUP_SEISEKI_e_4_2) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>
                    
                    <div style="background-color:#ddd ; padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【全国成績1】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE4_3" value="{{ old('PICKUP_SEISEKI_DATE4_3', $race_tenbo->PICKUP_SEISEKI_DATE4_3) }}"  style="width: 200px; display:inline-block;">　
                            場コード:<input type="text" class="form-control " name="PICKUP_SEISEKI_JYO4_3" value="{{ old('PICKUP_SEISEKI_JYO4_3', $race_tenbo->PICKUP_SEISEKI_JYO4_3) }}"  style="width: 200px; display:inline-block;">　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE4_3" value="{{ old('PICKUP_SEISEKI_GRADE4_3', $race_tenbo->PICKUP_SEISEKI_GRADE4_3) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_4_3" value="{{ old('PICKUP_SEISEKI_y_4_3', $race_tenbo->PICKUP_SEISEKI_y_4_3) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_4_3" value="{{ old('PICKUP_SEISEKI_j_4_3', $race_tenbo->PICKUP_SEISEKI_j_4_3) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_4_3" value="{{ old('PICKUP_SEISEKI_v_4_3', $race_tenbo->PICKUP_SEISEKI_v_4_3) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_4_3" value="{{ old('PICKUP_SEISEKI_e_4_3', $race_tenbo->PICKUP_SEISEKI_e_4_3) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>
                    
                    <div style="padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【全国成績2】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE4_4" value="{{ old('PICKUP_SEISEKI_DATE4_4', $race_tenbo->PICKUP_SEISEKI_DATE4_4) }}"  style="width: 200px; display:inline-block;">　
                            場コード:<input type="text" class="form-control " name="PICKUP_SEISEKI_JYO4_4" value="{{ old('PICKUP_SEISEKI_JYO4_4', $race_tenbo->PICKUP_SEISEKI_JYO4_4) }}"  style="width: 200px; display:inline-block;">　　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE4_4" value="{{ old('PICKUP_SEISEKI_GRADE4_4', $race_tenbo->PICKUP_SEISEKI_GRADE4_4) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_4_4" value="{{ old('PICKUP_SEISEKI_y_4_4', $race_tenbo->PICKUP_SEISEKI_y_4_4) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_4_4" value="{{ old('PICKUP_SEISEKI_j_4_4', $race_tenbo->PICKUP_SEISEKI_j_4_4) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_4_4" value="{{ old('PICKUP_SEISEKI_v_4_4', $race_tenbo->PICKUP_SEISEKI_v_4_4) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_4_4" value="{{ old('PICKUP_SEISEKI_e_4_4', $race_tenbo->PICKUP_SEISEKI_e_4_4) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>

                </div>
            </div>


            <div class="card bg-secondary mb-3" >
                <div class="card-header">PICKUP[5]</div>
                <div class="card-body">
                    登番:<input type="text" class="form-control " name="LEADER5" value="{{ old('LEADER5', $race_tenbo->LEADER5) }}">
                    リード:<textarea class="form-control " name="PICKUP_LEAD5" rows="3">{{ old('PICKUP_LEAD5', $race_tenbo->PICKUP_LEAD5) }}</textarea>
                    成績基準日<input type="text" class="form-control " name="PICKUP_SEISEKI_STANDARD_DATE5" value="{{ old('PICKUP_SEISEKI_STANDARD_DATE5', $race_tenbo->PICKUP_SEISEKI_STANDARD_DATE5) }}">
                    <button type="button" class="btn btn-primary" onclick="get_kinkyo('5')">データベースから成績を呼び出す</button>

                    <div style="background-color:#ddd ; padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【当地成績1】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE5_1" value="{{ old('PICKUP_SEISEKI_DATE5_1', $race_tenbo->PICKUP_SEISEKI_DATE5_1) }}"  style="width: 200px; display:inline-block;">　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE5_1" value="{{ old('PICKUP_SEISEKI_GRADE5_1', $race_tenbo->PICKUP_SEISEKI_GRADE5_1) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_5_1" value="{{ old('PICKUP_SEISEKI_y_5_1', $race_tenbo->PICKUP_SEISEKI_y_5_1) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_5_1" value="{{ old('PICKUP_SEISEKI_j_5_1', $race_tenbo->PICKUP_SEISEKI_j_5_1) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_5_1" value="{{ old('PICKUP_SEISEKI_v_5_1', $race_tenbo->PICKUP_SEISEKI_v_5_1) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_5_1" value="{{ old('PICKUP_SEISEKI_e_5_1', $race_tenbo->PICKUP_SEISEKI_e_5_1) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>

                    
                    <div style="padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【当地成績2】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE5_2" value="{{ old('PICKUP_SEISEKI_DATE5_2', $race_tenbo->PICKUP_SEISEKI_DATE5_2) }}"  style="width: 200px; display:inline-block;">　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE5_2" value="{{ old('PICKUP_SEISEKI_GRADE5_2', $race_tenbo->PICKUP_SEISEKI_GRADE5_2) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_5_2" value="{{ old('PICKUP_SEISEKI_y_5_2', $race_tenbo->PICKUP_SEISEKI_y_5_2) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_5_2" value="{{ old('PICKUP_SEISEKI_j_5_2', $race_tenbo->PICKUP_SEISEKI_j_5_2) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_5_2" value="{{ old('PICKUP_SEISEKI_v_5_2', $race_tenbo->PICKUP_SEISEKI_v_5_2) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_5_2" value="{{ old('PICKUP_SEISEKI_e_5_2', $race_tenbo->PICKUP_SEISEKI_e_5_2) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>
                    
                    <div style="background-color:#ddd ; padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【全国成績1】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE5_3" value="{{ old('PICKUP_SEISEKI_DATE5_3', $race_tenbo->PICKUP_SEISEKI_DATE5_3) }}"  style="width: 200px; display:inline-block;">　
                            場コード:<input type="text" class="form-control " name="PICKUP_SEISEKI_JYO5_3" value="{{ old('PICKUP_SEISEKI_JYO5_3', $race_tenbo->PICKUP_SEISEKI_JYO5_3) }}"  style="width: 200px; display:inline-block;">　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE5_3" value="{{ old('PICKUP_SEISEKI_GRADE5_3', $race_tenbo->PICKUP_SEISEKI_GRADE5_3) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_5_3" value="{{ old('PICKUP_SEISEKI_y_5_3', $race_tenbo->PICKUP_SEISEKI_y_5_3) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_5_3" value="{{ old('PICKUP_SEISEKI_j_5_3', $race_tenbo->PICKUP_SEISEKI_j_5_3) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_5_3" value="{{ old('PICKUP_SEISEKI_v_5_3', $race_tenbo->PICKUP_SEISEKI_v_5_3) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_5_3" value="{{ old('PICKUP_SEISEKI_e_5_3', $race_tenbo->PICKUP_SEISEKI_e_5_3) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>
                    
                    <div style="padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【全国成績2】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE5_4" value="{{ old('PICKUP_SEISEKI_DATE5_4', $race_tenbo->PICKUP_SEISEKI_DATE5_4) }}"  style="width: 200px; display:inline-block;">　
                            場コード:<input type="text" class="form-control " name="PICKUP_SEISEKI_JYO5_4" value="{{ old('PICKUP_SEISEKI_JYO5_4', $race_tenbo->PICKUP_SEISEKI_JYO5_4) }}"  style="width: 200px; display:inline-block;">　　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE5_4" value="{{ old('PICKUP_SEISEKI_GRADE5_4', $race_tenbo->PICKUP_SEISEKI_GRADE5_4) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_5_4" value="{{ old('PICKUP_SEISEKI_y_5_4', $race_tenbo->PICKUP_SEISEKI_y_5_4) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_5_4" value="{{ old('PICKUP_SEISEKI_j_5_4', $race_tenbo->PICKUP_SEISEKI_j_5_4) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_5_4" value="{{ old('PICKUP_SEISEKI_v_5_4', $race_tenbo->PICKUP_SEISEKI_v_5_4) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_5_4" value="{{ old('PICKUP_SEISEKI_e_5_4', $race_tenbo->PICKUP_SEISEKI_e_5_4) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>

                </div>
            </div>


            <div class="card bg-secondary mb-3" >
                <div class="card-header">PICKUP[6]</div>
                <div class="card-body">
                    登番:<input type="text" class="form-control " name="LEADER6" value="{{ old('LEADER6', $race_tenbo->LEADER6) }}">
                    リード:<textarea class="form-control " name="PICKUP_LEAD6" rows="3">{{ old('PICKUP_LEAD6', $race_tenbo->PICKUP_LEAD6) }}</textarea>
                    成績基準日<input type="text" class="form-control " name="PICKUP_SEISEKI_STANDARD_DATE6" value="{{ old('PICKUP_SEISEKI_STANDARD_DATE6', $race_tenbo->PICKUP_SEISEKI_STANDARD_DATE6) }}">
                    <button type="button" class="btn btn-primary" onclick="get_kinkyo('6')">データベースから成績を呼び出す</button>

                    <div style="background-color:#ddd ; padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【当地成績1】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE6_1" value="{{ old('PICKUP_SEISEKI_DATE6_1', $race_tenbo->PICKUP_SEISEKI_DATE6_1) }}"  style="width: 200px; display:inline-block;">　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE6_1" value="{{ old('PICKUP_SEISEKI_GRADE6_1', $race_tenbo->PICKUP_SEISEKI_GRADE6_1) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_6_1" value="{{ old('PICKUP_SEISEKI_y_6_1', $race_tenbo->PICKUP_SEISEKI_y_6_1) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_6_1" value="{{ old('PICKUP_SEISEKI_j_6_1', $race_tenbo->PICKUP_SEISEKI_j_6_1) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_6_1" value="{{ old('PICKUP_SEISEKI_v_6_1', $race_tenbo->PICKUP_SEISEKI_v_6_1) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_6_1" value="{{ old('PICKUP_SEISEKI_e_6_1', $race_tenbo->PICKUP_SEISEKI_e_6_1) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>

                    
                    <div style="padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【当地成績2】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE6_2" value="{{ old('PICKUP_SEISEKI_DATE6_2', $race_tenbo->PICKUP_SEISEKI_DATE6_2) }}"  style="width: 200px; display:inline-block;">　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE6_2" value="{{ old('PICKUP_SEISEKI_GRADE6_2', $race_tenbo->PICKUP_SEISEKI_GRADE6_2) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_6_2" value="{{ old('PICKUP_SEISEKI_y_6_2', $race_tenbo->PICKUP_SEISEKI_y_6_2) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_6_2" value="{{ old('PICKUP_SEISEKI_j_6_2', $race_tenbo->PICKUP_SEISEKI_j_6_2) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_6_2" value="{{ old('PICKUP_SEISEKI_v_6_2', $race_tenbo->PICKUP_SEISEKI_v_6_2) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_6_2" value="{{ old('PICKUP_SEISEKI_e_6_2', $race_tenbo->PICKUP_SEISEKI_e_6_2) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>
                    
                    <div style="background-color:#ddd ; padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【全国成績1】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE6_3" value="{{ old('PICKUP_SEISEKI_DATE6_3', $race_tenbo->PICKUP_SEISEKI_DATE6_3) }}"  style="width: 200px; display:inline-block;">　
                            場コード:<input type="text" class="form-control " name="PICKUP_SEISEKI_JYO6_3" value="{{ old('PICKUP_SEISEKI_JYO6_3', $race_tenbo->PICKUP_SEISEKI_JYO6_3) }}"  style="width: 200px; display:inline-block;">　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE6_3" value="{{ old('PICKUP_SEISEKI_GRADE6_3', $race_tenbo->PICKUP_SEISEKI_GRADE6_3) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_6_3" value="{{ old('PICKUP_SEISEKI_y_6_3', $race_tenbo->PICKUP_SEISEKI_y_6_3) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_6_3" value="{{ old('PICKUP_SEISEKI_j_6_3', $race_tenbo->PICKUP_SEISEKI_j_6_3) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_6_3" value="{{ old('PICKUP_SEISEKI_v_6_3', $race_tenbo->PICKUP_SEISEKI_v_6_3) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_6_3" value="{{ old('PICKUP_SEISEKI_e_6_3', $race_tenbo->PICKUP_SEISEKI_e_6_3) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>
                    
                    <div style="padding: 10px; margin:10px 0;">
                        <div style="margin: 10px 0;">【全国成績2】</div>
                        <div style="margin: 10px 0;">
                            開始日付:<input type="text" class="form-control " name="PICKUP_SEISEKI_DATE6_4" value="{{ old('PICKUP_SEISEKI_DATE6_4', $race_tenbo->PICKUP_SEISEKI_DATE6_4) }}"  style="width: 200px; display:inline-block;">　
                            場コード:<input type="text" class="form-control " name="PICKUP_SEISEKI_JYO6_4" value="{{ old('PICKUP_SEISEKI_JYO6_4', $race_tenbo->PICKUP_SEISEKI_JYO6_4) }}"  style="width: 200px; display:inline-block;">　　
                            グレード:<input type="text" class="form-control " name="PICKUP_SEISEKI_GRADE6_4" value="{{ old('PICKUP_SEISEKI_GRADE6_4', $race_tenbo->PICKUP_SEISEKI_GRADE6_4) }}" style="width: 200px; display:inline-block;">
                        </div>
                        <div style="margin: 10px 0">
                            予:<input type="text" class="form-control " name="PICKUP_SEISEKI_y_6_4" value="{{ old('PICKUP_SEISEKI_y_6_4', $race_tenbo->PICKUP_SEISEKI_y_6_4) }}" style="width: 200px; display:inline-block;">　
                            準:<input type="text" class="form-control " name="PICKUP_SEISEKI_j_6_4" value="{{ old('PICKUP_SEISEKI_j_6_4', $race_tenbo->PICKUP_SEISEKI_j_6_4) }}" style="width: 200px; display:inline-block;">　
                            優:<input type="text" class="form-control " name="PICKUP_SEISEKI_v_6_4" value="{{ old('PICKUP_SEISEKI_v_6_4', $race_tenbo->PICKUP_SEISEKI_v_6_4) }}" style="width: 200px; display:inline-block;">　
                            一:<input type="text" class="form-control " name="PICKUP_SEISEKI_e_6_4" value="{{ old('PICKUP_SEISEKI_e_6_4', $race_tenbo->PICKUP_SEISEKI_e_6_4) }}" style="width: 200px; display:inline-block;">
                        </div>
                    </div>

                </div>
            </div>
            

            <div class="card bg-secondary mb-3" >
                <div class="card-header">登録者</div>
                <div class="card-body">
                    <input type="text" class="form-control " name="EDITOR_NAME" value="{{ old('EDITOR_NAME', $race_tenbo->EDITOR_NAME ) }}">
                </div>
            </div>
            
            <button type="button" class="btn btn-primary" onclick="location.href='/admin/race_index/'">一覧に戻る</button>
            <button type="submit" class="btn btn-success">登録</button>
            @csrf
        </form>
    </div>
    
@endsection

@section('script')

    <script>
        function get_kinkyo(pickup_num){

            var grade_name=['SG','G1','G2','G3','一般'];

            var touban = $('[name=LEADER' + pickup_num + ']').val();
            var target_date = $('[name=PICKUP_SEISEKI_STANDARD_DATE' + pickup_num + ']').val();

            if(touban.length == 4 && target_date.length == 8){
                $.ajax({url: '/api/get_kinkyo/json?target_date=' + target_date + '&touban=' + touban + '&type=touchi'})
                .done(function(json){
                    var json_object = JSON.parse(json);

                    if(json_object['1']){
                        $('[name=PICKUP_SEISEKI_DATE' + pickup_num + '_1]').val(json_object['1']['kinkyo_start_date']);
                        $('[name=PICKUP_SEISEKI_GRADE' + pickup_num + '_1]').val(grade_name[json_object['1']['kinkyo_grade']]);
                        $('[name=PICKUP_SEISEKI_y_' + pickup_num + '_1]').val(json_object['1']['kinkyo_yosen_rireki_n']);
                        $('[name=PICKUP_SEISEKI_j_' + pickup_num + '_1]').val(json_object['1']['kinkyo_junyu_rireki_n']);
                        $('[name=PICKUP_SEISEKI_v_' + pickup_num + '_1]').val(json_object['1']['kinkyo_yusyo_rireki_n']);
                        $('[name=PICKUP_SEISEKI_e_' + pickup_num + '_1]').val(json_object['1']['kinkyo_temp_yosen_rireki_n']);
                    }

                    if(json_object['2']){
                        $('[name=PICKUP_SEISEKI_DATE' + pickup_num + '_2]').val(json_object['2']['kinkyo_start_date']);
                        $('[name=PICKUP_SEISEKI_GRADE' + pickup_num + '_2]').val(grade_name[json_object['2']['kinkyo_grade']]);
                        $('[name=PICKUP_SEISEKI_y_' + pickup_num + '_2]').val(json_object['2']['kinkyo_yosen_rireki_n']);
                        $('[name=PICKUP_SEISEKI_j_' + pickup_num + '_2]').val(json_object['2']['kinkyo_junyu_rireki_n']);
                        $('[name=PICKUP_SEISEKI_v_' + pickup_num + '_2]').val(json_object['2']['kinkyo_yusyo_rireki_n']);
                        $('[name=PICKUP_SEISEKI_e_' + pickup_num + '_2]').val(json_object['2']['kinkyo_temp_yosen_rireki_n']);
                    }
                });

                $.ajax({url: '/api/get_kinkyo/json?target_date=' + target_date + '&touban=' + touban + '&type=all'})
                .done(function(json){
                    var json_object = JSON.parse(json);

                    if(json_object['1']){
                        $('[name=PICKUP_SEISEKI_DATE' + pickup_num + '_3]').val(json_object['1']['kinkyo_start_date']);
                        $('[name=PICKUP_SEISEKI_JYO' + pickup_num + '_3]').val(json_object['1']['kinkyo_jyo']);
                        $('[name=PICKUP_SEISEKI_GRADE' + pickup_num + '_3]').val(grade_name[json_object['1']['kinkyo_grade']]);
                        $('[name=PICKUP_SEISEKI_y_' + pickup_num + '_3]').val(json_object['1']['kinkyo_yosen_rireki_n']);
                        $('[name=PICKUP_SEISEKI_j_' + pickup_num + '_3]').val(json_object['1']['kinkyo_junyu_rireki_n']);
                        $('[name=PICKUP_SEISEKI_v_' + pickup_num + '_3]').val(json_object['1']['kinkyo_yusyo_rireki_n']);
                        $('[name=PICKUP_SEISEKI_e_' + pickup_num + '_3]').val(json_object['1']['kinkyo_temp_yosen_rireki_n']);
                    }

                    if(json_object['2']){
                        $('[name=PICKUP_SEISEKI_DATE' + pickup_num + '_4]').val(json_object['2']['kinkyo_start_date']);
                        $('[name=PICKUP_SEISEKI_JYO' + pickup_num + '_4]').val(json_object['2']['kinkyo_jyo']);
                        $('[name=PICKUP_SEISEKI_GRADE' + pickup_num + '_4]').val(grade_name[json_object['2']['kinkyo_grade']]);
                        $('[name=PICKUP_SEISEKI_y_' + pickup_num + '_4]').val(json_object['2']['kinkyo_yosen_rireki_n']);
                        $('[name=PICKUP_SEISEKI_j_' + pickup_num + '_4]').val(json_object['2']['kinkyo_junyu_rireki_n']);
                        $('[name=PICKUP_SEISEKI_v_' + pickup_num + '_4]').val(json_object['2']['kinkyo_yusyo_rireki_n']);
                        $('[name=PICKUP_SEISEKI_e_' + pickup_num + '_4]').val(json_object['2']['kinkyo_temp_yosen_rireki_n']);
                    }

                });
            }

        }
    </script>

@endsection