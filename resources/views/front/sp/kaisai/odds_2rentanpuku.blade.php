@if($tomorrow_flg)
    <div class="page_tit">2連単・複・単勝・複勝・拡連複（明日）</div>
@else
    @if($bairitu_3rentan || $bairitu_3renpuku)
        @if($race_num <= $result_neer_kekka_race_number)
            <div class="page_tit">2連単・複・単勝・複勝・拡連複<span>（締切時オッズ）</span></div>
            <div class="odds_read fin" id="id_2rantanpukuok">発売票数の集計が完了した時点でのオッズを表示。<br>レース開始後の返還欠場等によるオッズの変動は反映されません。</div>
        @else
            <div class="page_tit">2連単・複・単勝・複勝・拡連複</div>
            <div class="odds_read">オッズをタップすると色が変わり、オッズ計算ページにタップした組み合わせが反映されます。</div>
        @endif
    @else
        <div class="page_tit">2連単・複・単勝・複勝・拡連複</div>
    @endif
@endif
<!--2連単-->
<div class="data cf">

<h2 class="top_space">2連単</h2>

<table id="ta_2rentan">
  <tr>
    <td class="r1">1</td>
    <td colspan="2" class="r1_nocolor @if($syussou[1]->sex == 2) lady @endif">{{$syussou[1]->SENSYU_NAME}}</td>
    <td class="r2">2</td>
    <td colspan="2" class="r2_nocolor @if($syussou[2]->sex == 2) lady @endif">{{$syussou[2]->SENSYU_NAME}}</td>
    <td class="r3">3</td>
    <td colspan="2" class="r3_nocolor @if($syussou[3]->sex == 2) lady @endif">{{$syussou[3]->SENSYU_NAME}}</td>
    </tr>
  <tr>
    <td rowspan="5" class="r1">&ensp;</td>
    <td class="r2">2</td>
    <td class="value class_1-2"><a href="javascript:funcCalcToggle( '1-2' );">{{$bairitu_2rentan[1][2]}}</a></td>
    <td rowspan="5" class="r2">&ensp;</td>
    <td class="r1">1</td>
    <td class="value class_2-1"><a href="javascript:funcCalcToggle( '2-1' );">{{$bairitu_2rentan[2][1]}}</a></td>
    <td rowspan="5" class="r3">&ensp;</td>
    <td class="r1">1</td>
    <td class="value class_3-1"><a href="javascript:funcCalcToggle( '3-1' );">{{$bairitu_2rentan[3][1]}}</a></td>
  </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_1-3"><a href="javascript:funcCalcToggle( '1-3' );">{{$bairitu_2rentan[1][3]}}</a></td>
    <td class="r3">3</td>
    <td class="value class_2-3"><a href="javascript:funcCalcToggle( '2-3' );">{{$bairitu_2rentan[2][3]}}</a></td>
    <td class="r2">2</td>
    <td class="value class_3-2"><a href="javascript:funcCalcToggle( '3-2' );">{{$bairitu_2rentan[3][2]}}</a></td>
  </tr>
  <tr>
    <td class="r4">4</td>
    <td class="value class_1-4"><a href="javascript:funcCalcToggle( '1-4' );">{{$bairitu_2rentan[1][4]}}</a></td>
    <td class="r4">4</td>
    <td class="value class_2-4"><a href="javascript:funcCalcToggle( '2-4' );">{{$bairitu_2rentan[2][4]}}</a></td>
    <td class="r4">4</td>
    <td class="value class_3-4"><a href="javascript:funcCalcToggle( '3-4' );">{{$bairitu_2rentan[3][4]}}</a></td>
  </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_1-5"><a href="javascript:funcCalcToggle( '1-5' );">{{$bairitu_2rentan[1][5]}}</a></td>
    <td class="r5">5</td>
    <td class="value class_2-5"><a href="javascript:funcCalcToggle( '2-5' );">{{$bairitu_2rentan[2][5]}}</a></td>
    <td class="r5">5</td>
    <td class="value class_3-5"><a href="javascript:funcCalcToggle( '3-5' );">{{$bairitu_2rentan[3][5]}}</a></td>
  </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_1-6"><a href="javascript:funcCalcToggle( '1-6' );">{{$bairitu_2rentan[1][6]}}</a></td>
    <td class="r6">6</td>
    <td class="value class_2-6"><a href="javascript:funcCalcToggle( '2-6' );">{{$bairitu_2rentan[2][6]}}</a></td>
    <td class="r6">6</td>
    <td class="value class_3-6"><a href="javascript:funcCalcToggle( '3-6' );">{{$bairitu_2rentan[3][6]}}</a></td>
  </tr>
  <tr>
    <td class="r4">4</td>
    <td colspan="2" class="r4_nocolor @if($syussou[4]->sex == 2) lady @endif">{{$syussou[4]->SENSYU_NAME}}</td>
    <td class="r5">5</td>
    <td colspan="2" class="r5_nocolor @if($syussou[5]->sex == 2) lady @endif">{{$syussou[5]->SENSYU_NAME}}</td>
    <td class="r6">6</td>
    <td colspan="2" class="r6_nocolor @if($syussou[6]->sex == 2) lady @endif">{{$syussou[6]->SENSYU_NAME}}</td>
    </tr>
  <tr>
    <td rowspan="5" class="r4">&ensp;</td>
    <td class="r1">1</td>
    <td class="value class_4-1"><a href="javascript:funcCalcToggle( '4-1' );">{{$bairitu_2rentan[4][1]}}</a></td>
    <td rowspan="5" class="r5">&ensp;</td>
    <td class="r1">1</td>
    <td class="value class_5-1"><a href="javascript:funcCalcToggle( '5-1' );">{{$bairitu_2rentan[5][1]}}</a></td>
    <td rowspan="5" class="r6">&ensp;</td>
    <td class="r1">1</td>
    <td class="value class_6-1"><a href="javascript:funcCalcToggle( '6-1' );">{{$bairitu_2rentan[6][1]}}</a></td>
  </tr>
  <tr>
    <td class="r2">2</td>
    <td class="value class_4-2"><a href="javascript:funcCalcToggle( '4-2' );">{{$bairitu_2rentan[4][2]}}</a></td>
    <td class="r2">2</td>
    <td class="value class_5-2"><a href="javascript:funcCalcToggle( '5-2' );">{{$bairitu_2rentan[5][2]}}</a></td>
    <td class="r2">2</td>
    <td class="value class_6-2"><a href="javascript:funcCalcToggle( '6-2' );">{{$bairitu_2rentan[6][2]}}</a></td>
  </tr>
  <tr>
    <td class="r3">3</td>
    <td class="value class_4-3"><a href="javascript:funcCalcToggle( '4-3' );">{{$bairitu_2rentan[4][3]}}</a></td>
    <td class="r3">3</td>
    <td class="value class_5-3"><a href="javascript:funcCalcToggle( '5-3' );">{{$bairitu_2rentan[5][3]}}</a></td>
    <td class="r3">3</td>
    <td class="value class_6-3"><a href="javascript:funcCalcToggle( '6-3' );">{{$bairitu_2rentan[6][3]}}</a></td>
  </tr>
  <tr>
    <td class="r5">5</td>
    <td class="value class_4-5"><a href="javascript:funcCalcToggle( '4-5' );">{{$bairitu_2rentan[4][5]}}</a></td>
    <td class="r4">4</td>
    <td class="value class_5-4"><a href="javascript:funcCalcToggle( '5-4' );">{{$bairitu_2rentan[5][4]}}</a></td>
    <td class="r4">4</td>
    <td class="value class_6-4"><a href="javascript:funcCalcToggle( '6-4' );">{{$bairitu_2rentan[6][4]}}</a></td>
  </tr>
  <tr>
    <td class="r6">6</td>
    <td class="value class_4-6"><a href="javascript:funcCalcToggle( '4-6' );">{{$bairitu_2rentan[4][6]}}</a></td>
    <td class="r6">6</td>
    <td class="value class_5-6"><a href="javascript:funcCalcToggle( '5-6' );">{{$bairitu_2rentan[5][6]}}</a></td>
    <td class="r5">5</td>
    <td class="value class_6-5"><a href="javascript:funcCalcToggle( '6-5' );">{{$bairitu_2rentan[6][5]}}</a></td>
  </tr>
</table>

</div>


<!--2連単人気TOP10-->
<div class="data cf">

<h2>2連単 人気ランキング</h2>

<!--選手名-->
<table id="ta_2rentan_name">
<tr>
<td class="r1">1</td>
<td class="n1_nocolor @if($syussou[1]->sex == 2) lady @endif">{{$syussou[1]->SENSYU_NAME}}</td>
<td class="r2">2</td>
<td class="n2_nocolor @if($syussou[2]->sex == 2) lady @endif">{{$syussou[2]->SENSYU_NAME}}</td>
<td class="r3">3</td>
<td class="n3_nocolor @if($syussou[3]->sex == 2) lady @endif">{{$syussou[3]->SENSYU_NAME}}</td>
</tr>
<tr>
<td class="r4">4</td>
<td class="n4_nocolor @if($syussou[4]->sex == 2) lady @endif">{{$syussou[4]->SENSYU_NAME}}</td>
<td class="r5">5</td>
<td class="n5_nocolor @if($syussou[5]->sex == 2) lady @endif">{{$syussou[5]->SENSYU_NAME}}</td>
<td class="r6">6</td>
<td class="n6_nocolor @if($syussou[6]->sex == 2) lady @endif">{{$syussou[6]->SENSYU_NAME}}</td>
</table>
<!--選手名-->

<table id="ta_2rentan_rank">
<tr>
<th>1</th>
<td><img src="/sp/kyogi/images/num1.png" alt="1"><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num4.png" alt="4"></td><td class="value class_1-4"><a href="javascript:funcCalcToggle( '1-4' );">{{$bairitu_2rentan[1][4]}}</a></td></tr>
<tr>
<tr>
<th>2</th>
<td><img src="/sp/kyogi/images/num1.png" alt="1"><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num5.png" alt="5"></td><td class="value class_1-5"><a href="javascript:funcCalcToggle( '1-5' );">{{$bairitu_2rentan[1][5]}}</a></td></tr>
<tr>
<tr>
<th>3</th>
<td><img src="/sp/kyogi/images/num1.png" alt="1"><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num2.png" alt="2"></td><td class="value class_1-2"><a href="javascript:funcCalcToggle( '1-2' );">{{$bairitu_2rentan[1][2]}}</a></td></tr>
<tr>
<tr>
<th>4</th>
<td><img src="/sp/kyogi/images/num1.png" alt="1"><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num6.png" alt="6"></td><td class="value class_1-6"><a href="javascript:funcCalcToggle( '1-6' );">{{$bairitu_2rentan[1][6]}}</a></td></tr>
<tr>
<tr>
<th>5</th>
<td><img src="/sp/kyogi/images/num3.png" alt="3"><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num1.png" alt="1"></td><td class="value class_3-1"><a href="javascript:funcCalcToggle( '3-1' );">{{$bairitu_2rentan[3][1]}}</a></td></tr>
<tr>
</table>
<table id="ta_2rentan_rank" class="right">
<tr>
<th>6</th>
<td><img src="/sp/kyogi/images/num2.png" alt="2"><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num1.png" alt="1"></td><td class="value class_2-1"><a href="javascript:funcCalcToggle( '2-1' );">{{$bairitu_2rentan[2][1]}}</a></td></tr>
<tr>
<tr>
<th>7</th>
<td><img src="/sp/kyogi/images/num5.png" alt="5"><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num1.png" alt="1"></td><td class="value class_5-1"><a href="javascript:funcCalcToggle( '5-1' );">{{$bairitu_2rentan[5][1]}}</a></td></tr>
<tr>
<tr>
<th>8</th>
<td><img src="/sp/kyogi/images/num4.png" alt="4"><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num1.png" alt="1"></td><td class="value class_4-1"><a href="javascript:funcCalcToggle( '4-1' );">{{$bairitu_2rentan[4][1]}}</a></td></tr>
<tr>
<tr>
<th>9</th>
<td><img src="/sp/kyogi/images/num2.png" alt="2"><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num3.png" alt="3"></td><td class="value class_2-3"><a href="javascript:funcCalcToggle( '2-3' );">{{$bairitu_2rentan[2][3]}}</a></td></tr>
<tr>
<tr>
<th>10</th>
<td><img src="/sp/kyogi/images/num6.png" alt="6"><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num1.png" alt="1"></td><td class="value class_6-1"><a href="javascript:funcCalcToggle( '6-1' );">{{$bairitu_2rentan[6][1]}}</a></td></tr>
<tr>
</table>
</div>


<!--2連複-->
<div class="data cf">

<h2>2連複</h2>
<table id="ta_2renpuku_name">
<tr>
<td class="r1">1</td>
<td class="n1_nocolor @if($syussou[1]->sex == 2) lady @endif">{{$syussou[1]->SENSYU_NAME}}</td>
<td class="r2">2</td>
<td class="n2_nocolor @if($syussou[2]->sex == 2) lady @endif">{{$syussou[2]->SENSYU_NAME}}</td>
<td class="r3">3</td>
<td class="n3_nocolor @if($syussou[3]->sex == 2) lady @endif">{{$syussou[3]->SENSYU_NAME}}</td>
</tr>
<tr>
<td class="r4">4</td>
<td class="n4_nocolor @if($syussou[4]->sex == 2) lady @endif">{{$syussou[4]->SENSYU_NAME}}</td>
<td class="r5">5</td>
<td class="n5_nocolor @if($syussou[5]->sex == 2) lady @endif">{{$syussou[5]->SENSYU_NAME}}</td>
<td class="r6">6</td>
<td class="n6_nocolor @if($syussou[6]->sex == 2) lady @endif">{{$syussou[6]->SENSYU_NAME}}</td>
</table>
<table id="ta_2renpuku">
  <tr>
<td rowspan="5" class="r1">1</td>
<td class="r2">2</td>
<td class="value class_1_2"><a href="javascript:funcCalcToggle( '1_2' );">{{$bairitu_2renpuku[1][2]}}</a></td>
</tr>
  <tr>
<td class="r3">3</td>
<td class="value class_1_3"><a href="javascript:funcCalcToggle( '1_3' );">{{$bairitu_2renpuku[1][3]}}</a></td>
</tr>
  <tr>
<td class="r4">4</td>
<td class="value class_1_4"><a href="javascript:funcCalcToggle( '1_4' );">{{$bairitu_2renpuku[1][4]}}</a></td>
</tr>
  <tr>
<td class="r5">5</td>
<td class="value class_1_5"><a href="javascript:funcCalcToggle( '1_5' );">{{$bairitu_2renpuku[1][5]}}</a></td>
</tr>
  <tr>
<td class="r6">6</td>
<td class="value class_1_6"><a href="javascript:funcCalcToggle( '1_6' );">{{$bairitu_2renpuku[1][6]}}</a></td>
</tr>
  <tr>
<td rowspan="4" class="r2">2</td>
<td class="r3">3</td>
<td class="value class_2_3"><a href="javascript:funcCalcToggle( '2_3' );">{{$bairitu_2renpuku[2][3]}}</a></td>
</tr>
  <tr>
<td class="r4">4</td>
<td class="value class_2_4"><a href="javascript:funcCalcToggle( '2_4' );">{{$bairitu_2renpuku[2][4]}}</a></td>
</tr>
  <tr>
<td class="r5">5</td>
<td class="value class_2_5"><a href="javascript:funcCalcToggle( '2_5' );">{{$bairitu_2renpuku[2][5]}}</a></td>
</tr>
  <tr>
<td class="r6">6</td>
<td class="value class_2_6"><a href="javascript:funcCalcToggle( '2_6' );">{{$bairitu_2renpuku[2][6]}}</a></td>
</tr>
</table>


<table id="ta_2renpuku" class="right">
  <tr>
<td rowspan="3" class="r3">3</td>
<td class="r4">4</td>
<td class="value class_3_4"><a href="javascript:funcCalcToggle( '3_4' );">{{$bairitu_2renpuku[3][4]}}</a></td>
</tr>
  <tr>
<td class="r5">5</td>
<td class="value class_3_5"><a href="javascript:funcCalcToggle( '3_5' );">{{$bairitu_2renpuku[3][5]}}</a></td>
</tr>
  <tr>
<td class="r6">6</td>
<td class="value class_3_6"><a href="javascript:funcCalcToggle( '3_6' );">{{$bairitu_2renpuku[3][6]}}</a></td>
</tr>
  <tr>
<td rowspan="2" class="r4">4</td>
<td class="r5">5</td>
<td class="value class_4_5"><a href="javascript:funcCalcToggle( '4_5' );">{{$bairitu_2renpuku[4][5]}}</a></td>
</tr>
  <tr>
<td class="r6">6</td>
<td class="value class_4_6"><a href="javascript:funcCalcToggle( '4_6' );">{{$bairitu_2renpuku[4][6]}}</a></td>
</tr>
  <tr>
<td rowspan="1" class="r5">5</td>
<td class="r6">6</td>
<td class="value class_5_6"><a href="javascript:funcCalcToggle( '5_6' );">{{$bairitu_2renpuku[5][6]}}</a></td>
</tr>
</table>


</div><!-- data end -->


<!--単勝-->
<div class="data cf">

<h2>単勝</h2>
<table id="ta_tan_name">
<tr>
<td class="r1">1</td>
<td class="n1_nocolor @if($syussou[1]->sex == 2) lady @endif">{{$syussou[1]->SENSYU_NAME}}</td>
<td class="r2">2</td>
<td class="n2_nocolor @if($syussou[2]->sex == 2) lady @endif">{{$syussou[2]->SENSYU_NAME}}</td>
<td class="r3">3</td>
<td class="n3_nocolor @if($syussou[3]->sex == 2) lady @endif">{{$syussou[3]->SENSYU_NAME}}</td>
</tr>
<tr>
<td class="r4">4</td>
<td class="n4_nocolor @if($syussou[4]->sex == 2) lady @endif">{{$syussou[4]->SENSYU_NAME}}</td>
<td class="r5">5</td>
<td class="n5_nocolor @if($syussou[5]->sex == 2) lady @endif">{{$syussou[5]->SENSYU_NAME}}</td>
<td class="r6">6</td>
<td class="n6_nocolor @if($syussou[6]->sex == 2) lady @endif">{{$syussou[6]->SENSYU_NAME}}</td>
</table>
<table id="ta_tan">
  <tr>
<td class="r1">1</td>
<td class="value class_1"><a href="javascript:funcCalcToggle( '1' );">{{ $bairitu_tansyo[1] }}</a></td>
</tr>
  <tr>
<td class="r2">2</td>
<td class="value class_2"><a href="javascript:funcCalcToggle( '2' );">{{ $bairitu_tansyo[2] }}</a></td>
</tr>
  <tr>
<td class="r3">3</td>
<td class="value class_3"><a href="javascript:funcCalcToggle( '3' );">{{ $bairitu_tansyo[3] }}</a></td>
</tr>
</table>

<table id="ta_tan" class="right">
  <tr>
<td class="r4">4</td>
<td class="value class_4"><a href="javascript:funcCalcToggle( '4' );">{{ $bairitu_tansyo[4] }}</a></td>
</tr>
  <tr>
<td class="r5">5</td>
<td class="value class_5"><a href="javascript:funcCalcToggle( '5' );">{{ $bairitu_tansyo[5] }}</a></td>
</tr>
  <tr>
<td class="r6">6</td>
<td class="value class_6"><a href="javascript:funcCalcToggle( '6' );">{{ $bairitu_tansyo[6] }}</a></td>
</tr>
</table>

</div><!-- data end -->


<!--複勝-->
<div class="data cf">

<h2>複勝</h2>
<table id="ta_fuku_name">
<tr>
    <td class="r1">1</td>
    <td class="n1_nocolor @if($syussou[1]->sex == 2) lady @endif">{{$syussou[1]->SENSYU_NAME}}</td>
    <td class="r2">2</td>
    <td class="n2_nocolor @if($syussou[2]->sex == 2) lady @endif">{{$syussou[2]->SENSYU_NAME}}</td>
    <td class="r3">3</td>
    <td class="n3_nocolor @if($syussou[3]->sex == 2) lady @endif">{{$syussou[3]->SENSYU_NAME}}</td>
</tr>
<tr>
    <td class="r4">4</td>
    <td class="n4_nocolor @if($syussou[4]->sex == 2) lady @endif">{{$syussou[4]->SENSYU_NAME}}</td>
    <td class="r5">5</td>
    <td class="n5_nocolor @if($syussou[5]->sex == 2) lady @endif">{{$syussou[5]->SENSYU_NAME}}</td>
    <td class="r6">6</td>
    <td class="n6_nocolor @if($syussou[6]->sex == 2) lady @endif">{{$syussou[6]->SENSYU_NAME}}</td>
</table>
<table id="ta_fuku">
  <tr>
<td class="r1">1</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_fukusyo[1]}}</a></td>
</tr>
  <tr>
<td class="r2">2</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_fukusyo[2]}}</a></td>
</tr>
  <tr>
<td class="r3">3</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_fukusyo[3]}}</a></td>
</tr>
</table>

<table id="ta_fuku" class="right">
  <tr>
<td class="r4">4</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_fukusyo[4]}}</a></td>
</tr>
  <tr>
<td class="r5">5</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_fukusyo[5]}}</a></td>
</tr>
  <tr>
<td class="r6">6</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_fukusyo[6]}}</a></td>
</tr>
</table>

</div><!-- data end -->


<!--拡連複-->
<div class="data cf">

<h2>拡連複</h2>
<table id="ta_kakurenpuku_name">
    <tr>
        <td class="r1">1</td>
        <td class="n1_nocolor @if($syussou[1]->sex == 2) lady @endif">{{$syussou[1]->SENSYU_NAME}}</td>
        <td class="r2">2</td>
        <td class="n2_nocolor @if($syussou[2]->sex == 2) lady @endif">{{$syussou[2]->SENSYU_NAME}}</td>
        <td class="r3">3</td>
        <td class="n3_nocolor @if($syussou[3]->sex == 2) lady @endif">{{$syussou[3]->SENSYU_NAME}}</td>
    </tr>
    <tr>
        <td class="r4">4</td>
        <td class="n4_nocolor @if($syussou[4]->sex == 2) lady @endif">{{$syussou[4]->SENSYU_NAME}}</td>
        <td class="r5">5</td>
        <td class="n5_nocolor @if($syussou[5]->sex == 2) lady @endif">{{$syussou[5]->SENSYU_NAME}}</td>
        <td class="r6">6</td>
        <td class="n6_nocolor @if($syussou[6]->sex == 2) lady @endif">{{$syussou[6]->SENSYU_NAME}}</td>
    </table>
<table id="ta_kakurenpuku">
  <tr>
<td rowspan="5" class="r1">1</td>
<td class="r2">2</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_kakurenpuku[1][2]}}</a></td>
</tr>
  <tr>
<td class="r3">3</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_kakurenpuku[1][3]}}</a></td>
</tr>
  <tr>
<td class="r4">4</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_kakurenpuku[1][4]}}</a></td>
</tr>
  <tr>
<td class="r5">5</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_kakurenpuku[1][5]}}</a></td>
</tr>
  <tr>
<td class="r6">6</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_kakurenpuku[1][6]}}</a></td>
</tr>
  <tr>
<td rowspan="4" class="r2">2</td>
<td class="r3">3</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_kakurenpuku[2][3]}}</a></td>
</tr>
  <tr>
<td class="r4">4</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_kakurenpuku[2][4]}}</a></td>
</tr>
  <tr>
<td class="r5">5</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_kakurenpuku[2][5]}}</a></td>
</tr>
  <tr>
<td class="r6">6</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_kakurenpuku[2][6]}}</a></td>
</tr>
</table>


<table id="ta_kakurenpuku" class="right">
  <tr>
<td rowspan="3" class="r3">3</td>
<td class="r4">4</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_kakurenpuku[3][4]}}</a></td>
</tr>
  <tr>
<td class="r5">5</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_kakurenpuku[3][5]}}</a></td>
</tr>
  <tr>
<td class="r6">6</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_kakurenpuku[3][6]}}</a></td>
</tr>
  <tr>
<td rowspan="2" class="r4">4</td>
<td class="r5">5</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_kakurenpuku[4][5]}}</a></td>
</tr>
  <tr>
<td class="r6">6</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_kakurenpuku[4][6]}}</a></td>
</tr>
  <tr>
<td rowspan="1" class="r5">5</td>
<td class="r6">6</td>
<td class="value"><a href="javascript:void(0);">{{$bairitu_kakurenpuku[5][6]}}</a></td>
</tr>
</table>


</div><!-- data end -->
