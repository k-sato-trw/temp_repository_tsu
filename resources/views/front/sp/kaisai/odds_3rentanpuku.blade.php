@if($tomorrow_flg)
    <div class="page_tit">3連単・複（明日）</div>
@else
    @if($bairitu_3rentan || $bairitu_3renpuku)
        @if($race_num <= $result_neer_kekka_race_number)
            <div class="page_tit">3連単・複<span>（締切時オッズ）</span></div>
            <div class="odds_read fin" id="id_3rantanpukuok">発売票数の集計が完了した時点でのオッズを表示。<br>レース開始後の返還欠場等によるオッズの変動は反映されません。</div>
        @else
            <div class="page_tit">3連単・複</div>
            <div class="odds_read">オッズをタップすると色が変わり、オッズ計算ページにタップした組み合わせが反映されます。</div>
        @endif
    @else
        <div class="page_tit">3連単・複</div>
    @endif
@endif

<h2 class="top_space">3連単</h2>
<table id="ta_3rentan">
  <tr>
    <td class="r1">1</td>
    <td colspan="2" class="r1_nocolor @if($syussou[1]->sex == 2) lady @endif">{{$syussou[1]->SENSYU_NAME}}</td>
    </tr>
  <tr>
    <td colspan="3" class="r1 thin_bar"></td>
    </tr>
  <tr>
    <td rowspan="4" class="r2">2</td>
    <td class="r3">3</td>
    <td class="value class_1-2-3"><a href="javascript:funcCalcToggle( '1-2-3' );">{{$bairitu_3rentan[1][2][3]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_1-2-4"><a href="javascript:funcCalcToggle( '1-2-4' );">{{$bairitu_3rentan[1][2][4]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_1-2-5"><a href="javascript:funcCalcToggle( '1-2-5' );">{{$bairitu_3rentan[1][2][5]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_1-2-6"><a href="javascript:funcCalcToggle( '1-2-6' );">{{$bairitu_3rentan[1][2][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r3">3</td>
    <td class="r2">2</td>
    <td class="value class_1-3-2"><a href="javascript:funcCalcToggle( '1-3-2' );">{{$bairitu_3rentan[1][3][2]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_1-3-4"><a href="javascript:funcCalcToggle( '1-3-4' );">{{$bairitu_3rentan[1][3][4]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_1-3-5"><a href="javascript:funcCalcToggle( '1-3-5' );">{{$bairitu_3rentan[1][3][5]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_1-3-6"><a href="javascript:funcCalcToggle( '1-3-6' );">{{$bairitu_3rentan[1][3][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r4">4</td>
    <td class="r2">2</td>
    <td class="value class_1-4-2"><a href="javascript:funcCalcToggle( '1-4-2' );">{{$bairitu_3rentan[1][4][2]}}</a></td>
    </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_1-4-3"><a href="javascript:funcCalcToggle( '1-4-3' );">{{$bairitu_3rentan[1][4][3]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_1-4-5"><a href="javascript:funcCalcToggle( '1-4-5' );">{{$bairitu_3rentan[1][4][5]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_1-4-6"><a href="javascript:funcCalcToggle( '1-4-6' );">{{$bairitu_3rentan[1][4][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r5">5</td>
    <td class="r2">2</td>
    <td class="value class_1-5-2"><a href="javascript:funcCalcToggle( '1-5-2' );">{{$bairitu_3rentan[1][5][2]}}</a></td>
    </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_1-5-3"><a href="javascript:funcCalcToggle( '1-5-3' );">{{$bairitu_3rentan[1][5][3]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_1-5-4"><a href="javascript:funcCalcToggle( '1-5-4' );">{{$bairitu_3rentan[1][5][4]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_1-5-6"><a href="javascript:funcCalcToggle( '1-5-6' );">{{$bairitu_3rentan[1][5][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r6">6</td>
    <td class="r2">2</td>
    <td class="value class_1-6-2"><a href="javascript:funcCalcToggle( '1-6-2' );">{{$bairitu_3rentan[1][6][2]}}</a></td>
    </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_1-6-3"><a href="javascript:funcCalcToggle( '1-6-3' );">{{$bairitu_3rentan[1][6][3]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_1-6-4"><a href="javascript:funcCalcToggle( '1-6-4' );">{{$bairitu_3rentan[1][6][4]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_1-6-5"><a href="javascript:funcCalcToggle( '1-6-5' );">{{$bairitu_3rentan[1][6][5]}}</a></td>
    </tr>
</table>
<table id="ta_3rentan">
  <tr>
    <td class="r2">2</td>
    <td colspan="2" class="r2_nocolor @if($syussou[2]->sex == 2) lady @endif">{{$syussou[2]->SENSYU_NAME}}</td>
    </tr>
  <tr>
    <td colspan="3" class="r2 thin_bar"></td>
    </tr>
  <tr>
    <td rowspan="4" class="r1">1</td>
    <td class="r3">3</td>
    <td class="value class_2-1-3"><a href="javascript:funcCalcToggle( '2-1-3' );">{{$bairitu_3rentan[2][1][3]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_2-1-4"><a href="javascript:funcCalcToggle( '2-1-4' );">{{$bairitu_3rentan[2][1][4]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_2-1-5"><a href="javascript:funcCalcToggle( '2-1-5' );">{{$bairitu_3rentan[2][1][5]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_2-1-6"><a href="javascript:funcCalcToggle( '2-1-6' );">{{$bairitu_3rentan[2][1][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r3">3</td>
    <td class="r1">1</td>
    <td class="value class_2-3-1"><a href="javascript:funcCalcToggle( '2-3-1' );">{{$bairitu_3rentan[2][3][1]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_2-3-4"><a href="javascript:funcCalcToggle( '2-3-4' );">{{$bairitu_3rentan[2][3][4]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_2-3-5"><a href="javascript:funcCalcToggle( '2-3-5' );">{{$bairitu_3rentan[2][3][5]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_2-3-6"><a href="javascript:funcCalcToggle( '2-3-6' );">{{$bairitu_3rentan[2][3][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r4">4</td>
    <td class="r1">1</td>
    <td class="value class_2-4-1"><a href="javascript:funcCalcToggle( '2-4-1' );">{{$bairitu_3rentan[2][4][1]}}</a></td>
    </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_2-4-3"><a href="javascript:funcCalcToggle( '2-4-3' );">{{$bairitu_3rentan[2][4][3]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_2-4-5"><a href="javascript:funcCalcToggle( '2-4-5' );">{{$bairitu_3rentan[2][4][5]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_2-4-6"><a href="javascript:funcCalcToggle( '2-4-6' );">{{$bairitu_3rentan[2][4][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r5">5</td>
    <td class="r1">1</td>
    <td class="value class_2-5-1"><a href="javascript:funcCalcToggle( '2-5-1' );">{{$bairitu_3rentan[2][5][1]}}</a></td>
    </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_2-5-3"><a href="javascript:funcCalcToggle( '2-5-3' );">{{$bairitu_3rentan[2][5][3]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_2-5-4"><a href="javascript:funcCalcToggle( '2-5-4' );">{{$bairitu_3rentan[2][5][4]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_2-5-6"><a href="javascript:funcCalcToggle( '2-5-6' );">{{$bairitu_3rentan[2][5][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r6">6</td>
    <td class="r1">1</td>
    <td class="value class_2-6-1"><a href="javascript:funcCalcToggle( '2-6-1' );">{{$bairitu_3rentan[2][6][1]}}</a></td>
    </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_2-6-3"><a href="javascript:funcCalcToggle( '2-6-3' );">{{$bairitu_3rentan[2][6][3]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_2-6-4"><a href="javascript:funcCalcToggle( '2-6-4' );">{{$bairitu_3rentan[2][6][4]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_2-6-5"><a href="javascript:funcCalcToggle( '2-6-5' );">{{$bairitu_3rentan[2][6][5]}}</a></td>
    </tr>
</table>
<table id="ta_3rentan" class="last">
  <tr>
    <td class="r3">3</td>
    <td colspan="2" class="r3_nocolor @if($syussou[3]->sex == 2) lady @endif">{{$syussou[3]->SENSYU_NAME}}</td>
    </tr>
  <tr>
    <td colspan="3" class="r3 thin_bar"></td>
    </tr>
  <tr>
    <td rowspan="4" class="r1">1</td>
    <td class="r2">2</td>
    <td class="value class_3-1-2"><a href="javascript:funcCalcToggle( '3-1-2' );">{{$bairitu_3rentan[3][1][2]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_3-1-4"><a href="javascript:funcCalcToggle( '3-1-4' );">{{$bairitu_3rentan[3][1][4]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_3-1-5"><a href="javascript:funcCalcToggle( '3-1-5' );">{{$bairitu_3rentan[3][1][5]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_3-1-6"><a href="javascript:funcCalcToggle( '3-1-6' );">{{$bairitu_3rentan[3][1][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r2">2</td>
    <td class="r1">1</td>
    <td class="value class_3-2-1"><a href="javascript:funcCalcToggle( '3-2-1' );">{{$bairitu_3rentan[3][2][1]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_3-2-4"><a href="javascript:funcCalcToggle( '3-2-4' );">{{$bairitu_3rentan[3][2][4]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_3-2-5"><a href="javascript:funcCalcToggle( '3-2-5' );">{{$bairitu_3rentan[3][2][5]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_3-2-6"><a href="javascript:funcCalcToggle( '3-2-6' );">{{$bairitu_3rentan[3][2][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r4">4</td>
    <td class="r1">1</td>
    <td class="value class_3-4-1"><a href="javascript:funcCalcToggle( '3-4-1' );">{{$bairitu_3rentan[3][4][1]}}</a></td>
    </tr>
  <tr>
    <td class="r2">2</td>
    <td class="value class_3-4-2"><a href="javascript:funcCalcToggle( '3-4-2' );">{{$bairitu_3rentan[3][4][2]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_3-4-5"><a href="javascript:funcCalcToggle( '3-4-5' );">{{$bairitu_3rentan[3][4][5]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_3-4-6"><a href="javascript:funcCalcToggle( '3-4-6' );">{{$bairitu_3rentan[3][4][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r5">5</td>
    <td class="r1">1</td>
    <td class="value class_3-5-1"><a href="javascript:funcCalcToggle( '3-5-1' );">{{$bairitu_3rentan[3][5][1]}}</a></td>
    </tr>
  <tr>
    <td class="r2">2</td>
    <td class="value class_3-5-2"><a href="javascript:funcCalcToggle( '3-5-2' );">{{$bairitu_3rentan[3][5][2]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_3-5-4"><a href="javascript:funcCalcToggle( '3-5-4' );">{{$bairitu_3rentan[3][5][4]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_3-5-6"><a href="javascript:funcCalcToggle( '3-5-6' );">{{$bairitu_3rentan[3][5][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r6">6</td>
    <td class="r1">1</td>
    <td class="value class_3-6-1"><a href="javascript:funcCalcToggle( '3-6-1' );">{{$bairitu_3rentan[3][6][1]}}</a></td>
    </tr>
  <tr>
    <td class="r2">2</td>
    <td class="value class_3-6-2"><a href="javascript:funcCalcToggle( '3-6-2' );">{{$bairitu_3rentan[3][6][2]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_3-6-4"><a href="javascript:funcCalcToggle( '3-6-4' );">{{$bairitu_3rentan[3][6][4]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_3-6-5"><a href="javascript:funcCalcToggle( '3-6-5' );">{{$bairitu_3rentan[3][6][5]}}</a></td>
    </tr>
</table>
<!--3連単人気TOP20-->
<div class="data cf">
<table id="ta_3rentan" class="bottom_space">
  <tr>
    <td class="r4">4</td>
    <td colspan="2" class="r4_nocolor @if($syussou[4]->sex == 2) lady @endif">{{$syussou[4]->SENSYU_NAME}}</td>
    </tr>
  <tr>
    <td colspan="3" class="r4 thin_bar"></td>
    </tr>
  <tr>
    <td rowspan="4" class="r1">1</td>
    <td class="r2">2</td>
    <td class="value class_4-1-2"><a href="javascript:funcCalcToggle( '4-1-2' );">{{$bairitu_3rentan[4][1][2]}}</a></td>
    </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_4-1-3"><a href="javascript:funcCalcToggle( '4-1-3' );">{{$bairitu_3rentan[4][1][3]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_4-1-5"><a href="javascript:funcCalcToggle( '4-1-5' );">{{$bairitu_3rentan[4][1][5]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_4-1-6"><a href="javascript:funcCalcToggle( '4-1-6' );">{{$bairitu_3rentan[4][1][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r2">2</td>
    <td class="r1">1</td>
    <td class="value class_4-2-1"><a href="javascript:funcCalcToggle( '4-2-1' );">{{$bairitu_3rentan[4][2][1]}}</a></td>
    </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_4-2-3"><a href="javascript:funcCalcToggle( '4-2-3' );">{{$bairitu_3rentan[4][2][3]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_4-2-5"><a href="javascript:funcCalcToggle( '4-2-5' );">{{$bairitu_3rentan[4][2][5]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_4-2-6"><a href="javascript:funcCalcToggle( '4-2-6' );">{{$bairitu_3rentan[4][2][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r3">3</td>
    <td class="r1">1</td>
    <td class="value class_4-3-1"><a href="javascript:funcCalcToggle( '4-3-1' );">{{$bairitu_3rentan[4][3][1]}}</a></td>
    </tr>
  <tr>
    <td class="r2">2</td>
    <td class="value class_4-3-2"><a href="javascript:funcCalcToggle( '4-3-2' );">{{$bairitu_3rentan[4][3][2]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_4-3-5"><a href="javascript:funcCalcToggle( '4-3-5' );">{{$bairitu_3rentan[4][3][5]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_4-3-6"><a href="javascript:funcCalcToggle( '4-3-6' );">{{$bairitu_3rentan[4][3][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r5">5</td>
    <td class="r1">1</td>
    <td class="value class_4-5-1"><a href="javascript:funcCalcToggle( '4-5-1' );">{{$bairitu_3rentan[4][5][1]}}</a></td>
    </tr>
  <tr>
    <td class="r2">2</td>
    <td class="value class_4-5-2"><a href="javascript:funcCalcToggle( '4-5-2' );">{{$bairitu_3rentan[4][5][2]}}</a></td>
    </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_4-5-3"><a href="javascript:funcCalcToggle( '4-5-3' );">{{$bairitu_3rentan[4][5][3]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_4-5-6"><a href="javascript:funcCalcToggle( '4-5-6' );">{{$bairitu_3rentan[4][5][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r6">6</td>
    <td class="r1">1</td>
    <td class="value class_4-6-1"><a href="javascript:funcCalcToggle( '4-6-1' );">{{$bairitu_3rentan[4][6][1]}}</a></td>
    </tr>
  <tr>
    <td class="r2">2</td>
    <td class="value class_4-6-2"><a href="javascript:funcCalcToggle( '4-6-2' );">{{$bairitu_3rentan[4][6][2]}}</a></td>
    </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_4-6-3"><a href="javascript:funcCalcToggle( '4-6-3' );">{{$bairitu_3rentan[4][6][3]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_4-6-5"><a href="javascript:funcCalcToggle( '4-6-5' );">{{$bairitu_3rentan[4][6][5]}}</a></td>
    </tr>
</table>
<table id="ta_3rentan" class="bottom_space">
  <tr>
    <td class="r5">5</td>
    <td colspan="2" class="r5_nocolor @if($syussou[5]->sex == 2) lady @endif">{{$syussou[5]->SENSYU_NAME}}</td>
    </tr>
  <tr>
    <td colspan="3" class="r5 thin_bar"></td>
    </tr>
  <tr>
    <td rowspan="4" class="r1">1</td>
    <td class="r2">2</td>
    <td class="value class_5-1-2"><a href="javascript:funcCalcToggle( '5-1-2' );">{{$bairitu_3rentan[5][1][2]}}</a></td>
    </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_5-1-3"><a href="javascript:funcCalcToggle( '5-1-3' );">{{$bairitu_3rentan[5][1][3]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_5-1-4"><a href="javascript:funcCalcToggle( '5-1-4' );">{{$bairitu_3rentan[5][1][4]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_5-1-6"><a href="javascript:funcCalcToggle( '5-1-6' );">{{$bairitu_3rentan[5][1][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r2">2</td>
    <td class="r1">1</td>
    <td class="value class_5-2-1"><a href="javascript:funcCalcToggle( '5-2-1' );">{{$bairitu_3rentan[5][2][1]}}</a></td>
    </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_5-2-3"><a href="javascript:funcCalcToggle( '5-2-3' );">{{$bairitu_3rentan[5][2][3]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_5-2-4"><a href="javascript:funcCalcToggle( '5-2-4' );">{{$bairitu_3rentan[5][2][4]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_5-2-6"><a href="javascript:funcCalcToggle( '5-2-6' );">{{$bairitu_3rentan[5][2][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r3">3</td>
    <td class="r1">1</td>
    <td class="value class_5-3-1"><a href="javascript:funcCalcToggle( '5-3-1' );">{{$bairitu_3rentan[5][3][1]}}</a></td>
    </tr>
  <tr>
    <td class="r2">2</td>
    <td class="value class_5-3-2"><a href="javascript:funcCalcToggle( '5-3-2' );">{{$bairitu_3rentan[5][3][2]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_5-3-4"><a href="javascript:funcCalcToggle( '5-3-4' );">{{$bairitu_3rentan[5][3][4]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_5-3-6"><a href="javascript:funcCalcToggle( '5-3-6' );">{{$bairitu_3rentan[5][3][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r4">4</td>
    <td class="r1">1</td>
    <td class="value class_5-4-1"><a href="javascript:funcCalcToggle( '5-4-1' );">{{$bairitu_3rentan[5][4][1]}}</a></td>
    </tr>
  <tr>
    <td class="r2">2</td>
    <td class="value class_5-4-2"><a href="javascript:funcCalcToggle( '5-4-2' );">{{$bairitu_3rentan[5][4][2]}}</a></td>
    </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_5-4-3"><a href="javascript:funcCalcToggle( '5-4-3' );">{{$bairitu_3rentan[5][4][3]}}</a></td>
    </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_5-4-6"><a href="javascript:funcCalcToggle( '5-4-6' );">{{$bairitu_3rentan[5][4][6]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r6">6</td>
    <td class="r1">1</td>
    <td class="value class_5-6-1"><a href="javascript:funcCalcToggle( '5-6-1' );">{{$bairitu_3rentan[5][6][1]}}</a></td>
    </tr>
  <tr>
    <td class="r2">2</td>
    <td class="value class_5-6-2"><a href="javascript:funcCalcToggle( '5-6-2' );">{{$bairitu_3rentan[5][6][2]}}</a></td>
    </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_5-6-3"><a href="javascript:funcCalcToggle( '5-6-3' );">{{$bairitu_3rentan[5][6][3]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_5-6-4"><a href="javascript:funcCalcToggle( '5-6-4' );">{{$bairitu_3rentan[5][6][4]}}</a></td>
    </tr>
</table>
<table id="ta_3rentan" class="last bottom_space">
  <tr>
    <td class="r6">6</td>
    <td colspan="2" class="r6_nocolor @if($syussou[6]->sex == 2) lady @endif">{{$syussou[6]->SENSYU_NAME}}</td>
    </tr>
  <tr>
    <td colspan="3" class="r6 thin_bar"></td>
    </tr>
  <tr>
    <td rowspan="4" class="r1">1</td>
    <td class="r2">2</td>
    <td class="value class_6-1-2"><a href="javascript:funcCalcToggle( '6-1-2' );">{{$bairitu_3rentan[6][1][2]}}</a></td>
    </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_6-1-3"><a href="javascript:funcCalcToggle( '6-1-3' );">{{$bairitu_3rentan[6][1][3]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_6-1-4"><a href="javascript:funcCalcToggle( '6-1-4' );">{{$bairitu_3rentan[6][1][4]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_6-1-5"><a href="javascript:funcCalcToggle( '6-1-5' );">{{$bairitu_3rentan[6][1][5]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r2">2</td>
    <td class="r1">1</td>
    <td class="value class_6-2-1"><a href="javascript:funcCalcToggle( '6-2-1' );">{{$bairitu_3rentan[6][2][1]}}</a></td>
    </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_6-2-3"><a href="javascript:funcCalcToggle( '6-2-3' );">{{$bairitu_3rentan[6][2][3]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_6-2-4"><a href="javascript:funcCalcToggle( '6-2-4' );">{{$bairitu_3rentan[6][2][4]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_6-2-5"><a href="javascript:funcCalcToggle( '6-2-5' );">{{$bairitu_3rentan[6][2][5]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r3">3</td>
    <td class="r1">1</td>
    <td class="value class_6-3-1"><a href="javascript:funcCalcToggle( '6-3-1' );">{{$bairitu_3rentan[6][3][1]}}</a></td>
    </tr>
  <tr>
    <td class="r2">2</td>
    <td class="value class_6-3-2"><a href="javascript:funcCalcToggle( '6-3-2' );">{{$bairitu_3rentan[6][3][2]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_6-3-4"><a href="javascript:funcCalcToggle( '6-3-4' );">{{$bairitu_3rentan[6][3][4]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_6-3-5"><a href="javascript:funcCalcToggle( '6-3-5' );">{{$bairitu_3rentan[6][3][5]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r4">4</td>
    <td class="r1">1</td>
    <td class="value class_6-4-1"><a href="javascript:funcCalcToggle( '6-4-1' );">{{$bairitu_3rentan[6][4][1]}}</a></td>
    </tr>
  <tr>
    <td class="r2">2</td>
    <td class="value class_6-4-2"><a href="javascript:funcCalcToggle( '6-4-2' );">{{$bairitu_3rentan[6][4][2]}}</a></td>
    </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_6-4-3"><a href="javascript:funcCalcToggle( '6-4-3' );">{{$bairitu_3rentan[6][4][3]}}</a></td>
    </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_6-4-5"><a href="javascript:funcCalcToggle( '6-4-5' );">{{$bairitu_3rentan[6][4][5]}}</a></td>
    </tr>
  <tr>
    <td rowspan="4" class="r5">5</td>
    <td class="r1">1</td>
    <td class="value class_6-5-1"><a href="javascript:funcCalcToggle( '6-5-1' );">{{$bairitu_3rentan[6][5][1]}}</a></td>
    </tr>
  <tr>
    <td class="r2">2</td>
    <td class="value class_6-5-2"><a href="javascript:funcCalcToggle( '6-5-2' );">{{$bairitu_3rentan[6][5][2]}}</a></td>
    </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_6-5-3"><a href="javascript:funcCalcToggle( '6-5-3' );">{{$bairitu_3rentan[6][5][3]}}</a></td>
    </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_6-5-4"><a href="javascript:funcCalcToggle( '6-5-4' );">{{$bairitu_3rentan[6][5][4]}}</a></td>
    </tr>
</table>

<!--選手名-->
<h2>3連単 人気ランキング</h2>
<table id="ta_3rentan_rank">
    @foreach($bairitu_3rentan_top20 as $item)
        <tr>
            <th>{{$item['rank']}}</th>
            <td><img src="/sp/kyogi/images/num{{$item['record']->NUMBER1}}.png" alt="{{$item['record']->NUMBER1}}"><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num{{$item['record']->NUMBER2}}.png" alt="{{$item['record']->NUMBER2}}"><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num{{$item['record']->NUMBER3}}.png" alt="{{$item['record']->NUMBER3}}"></td>
            <td class="value class_{{$item['record']->NUMBER1}}-{{$item['record']->NUMBER2}}-{{$item['record']->NUMBER3}}"><a href="javascript:funcCalcToggle( '{{$item['record']->NUMBER1}}-{{$item['record']->NUMBER2}}-{{$item['record']->NUMBER3}}' );">{{$bairitu_3rentan[$item['record']->NUMBER1][$item['record']->NUMBER2][$item['record']->NUMBER3]}}</a></td>
        </tr>
    @endforeach
</table>

</div>



<!--3連複-->
<div class="data cf">

<h2>3連複</h2>

<!--選手名-->
<table id="ta_3renpuku_name">
<tr>
<td class="r1">1</td>
<td class="n1_nocolor">{{$syussou[1]->SENSYU_NAME}}</td>
<td class="r2">2</td>
<td class="n2_nocolor">{{$syussou[2]->SENSYU_NAME}}</td>
<td class="r3">3</td>
<td class="n3_nocolor">{{$syussou[3]->SENSYU_NAME}}</td>
</tr>
<tr>
<td class="r4">4</td>
<td class="n4_nocolor">{{$syussou[4]->SENSYU_NAME}}</td>
<td class="r5">5</td>
<td class="n5_nocolor">{{$syussou[5]->SENSYU_NAME}}</td>
<td class="r6">6</td>
<td class="n6_nocolor">{{$syussou[6]->SENSYU_NAME}}</td>
</tr>
</table>
<!--選手名-->


<table id="ta_3renpuku">
<tr>
<td rowspan="10" class="r1">1</td>
<td rowspan="4" class="r2">2</td>
<td class="r3">3</td>
<td class="value class_1_2_3"><a href="javascript:funcCalcToggle( '1_2_3' );">{{$bairitu_3renpuku[1][2][3]}}</a></td>
</tr>
<tr>
<td class="r4">4</td>
<td class="value class_1_2_4"><a href="javascript:funcCalcToggle( '1_2_4' );">{{$bairitu_3renpuku[1][2][4]}}</a></td>
</tr>
<tr>
<td class="r5">5</td>
<td class="value class_1_2_5"><a href="javascript:funcCalcToggle( '1_2_5' );">{{$bairitu_3renpuku[1][2][5]}}</a></td>
</tr>
<tr>
<td class="r6">6</td>
<td class="value class_1_2_6"><a href="javascript:funcCalcToggle( '1_2_6' );">{{$bairitu_3renpuku[1][2][6]}}</a></td>
</tr>
<tr>
<td rowspan="3" class="r3">3</td>
<td class="r4">4</td>
<td class="value class_1_3_4"><a href="javascript:funcCalcToggle( '1_3_4' );">{{$bairitu_3renpuku[1][3][4]}}</a></td>
</tr>
<tr>
<td class="r5">5</td>
<td class="value class_1_3_5"><a href="javascript:funcCalcToggle( '1_3_5' );">{{$bairitu_3renpuku[1][3][5]}}</a></td>
</tr>
<tr>
<td class="r6">6</td>
<td class="value class_1_3_6"><a href="javascript:funcCalcToggle( '1_3_6' );">{{$bairitu_3renpuku[1][3][6]}}</a></td>
</tr>
<tr>
<td rowspan="2" class="r4">4</td>
<td class="r5">5</td>
<td class="value class_1_4_5"><a href="javascript:funcCalcToggle( '1_4_5' );">{{$bairitu_3renpuku[1][4][5]}}</a></td>
</tr>
<tr>
<td class="r6">6</td>
<td class="value class_1_4_6"><a href="javascript:funcCalcToggle( '1_4_6' );">{{$bairitu_3renpuku[1][4][6]}}</a></td>
</tr>
<tr>
<td rowspan="1" class="r5">5</td>
<td class="r6">6</td>
<td class="value class_1_5_6"><a href="javascript:funcCalcToggle( '1_5_6' );">{{$bairitu_3renpuku[1][5][6]}}</a></td>
</tr>
</table>

<table id="ta_3renpuku" class="right">
<tr>
<td rowspan="6" class="r2">2</td>
<td rowspan="3" class="r3">3</td>
<td class="r4">4</td>
<td class="value class_2_3_4"><a href="javascript:funcCalcToggle( '2_3_4' );">{{$bairitu_3renpuku[2][3][4]}}</a></td>
</tr>
<tr>
<td class="r5">5</td>
<td class="value class_2_3_5"><a href="javascript:funcCalcToggle( '2_3_5' );">{{$bairitu_3renpuku[2][3][5]}}</a></td>
</tr>
<tr>
<td class="r6">6</td>
<td class="value class_2_3_6"><a href="javascript:funcCalcToggle( '2_3_6' );">{{$bairitu_3renpuku[2][3][6]}}</a></td>
</tr>
<tr>
<td rowspan="2" class="r4">4</td>
<td class="r5">5</td>
<td class="value class_2_4_5"><a href="javascript:funcCalcToggle( '2_4_5' );">{{$bairitu_3renpuku[2][4][5]}}</a></td>
</tr>
<tr>
<td class="r6">6</td>
<td class="value class_2_4_6"><a href="javascript:funcCalcToggle( '2_4_6' );">{{$bairitu_3renpuku[2][4][6]}}</a></td>
</tr>
<tr>
<td rowspan="1" class="r5">5</td>
<td class="r6">6</td>
<td class="value class_2_5_6"><a href="javascript:funcCalcToggle( '2_5_6' );">{{$bairitu_3renpuku[2][5][6]}}</a></td>
</tr>
<tr>
<td rowspan="3" class="r3">3</td>
<td rowspan="2" class="r4">4</td>
<td class="r5">5</td>
<td class="value class_3_4_5"><a href="javascript:funcCalcToggle( '3_4_5' );">{{$bairitu_3renpuku[3][4][5]}}</a></td>
</tr>
<tr>
<td class="r6">6</td>
<td class="value class_3_4_6"><a href="javascript:funcCalcToggle( '3_4_6' );">{{$bairitu_3renpuku[3][4][6]}}</a></td>
</tr>
<tr>
<td rowspan="1" class="r5">5</td>
<td class="r6">6</td>
<td class="value class_3_5_6"><a href="javascript:funcCalcToggle( '3_5_6' );">{{$bairitu_3renpuku[3][5][6]}}</a></td>
</tr>
<tr>
<td rowspan="1" class="r4">4</td>
<td rowspan="1" class="r5">5</td>
<td class="r6">6</td>
<td class="value class_4_5_6"><a href="javascript:funcCalcToggle( '4_5_6' );">{{$bairitu_3renpuku[4][5][6]}}</a></td>
</tr>
</table>


</div><!-- data end -->
