@inject('service', 'App\Services\Front\Sp\SpKyogiService')



<div class="page_tit">オッズ計算</div>
<div class="odds_read">各オッズページでオッズ選択すると組み合わせが反映されます。</div>



<form name="ozzCalcform" action="/asp/tsu/sp/kyogi/index.asp?jyo=09&racenum={{$race_num}}&page=14" method="post" class="box_calculate">



<div id="box_calculate" class="cf">
<table id="ta_calculate">
  <tr>
    <th class="hai">&nbsp;</th>
    <td class="price"><input name="field_shikin1" type="tel" id="field_shikin" maxlength="6" value="{{$strAryfield_shikin[1] ?? ""}}"><span>円</span></td>
    </tr>
</table>

<table id="ta_calculate">
  <tr>
    <th class="one">&nbsp;</th>
    <td class="price"><input name="field_shikin2" type="tel" id="field_shikin" maxlength="6" value="{{$strAryfield_shikin[2] ?? ""}}"><span>円</span></td>
  </tr>
</table>
<div class="caution">
  <p>※資金配分もしくは1点購入額どちらかを入力</p>
  <p>※入力金額は999,900円まで</p>
</div>
<div class="bt_calculate"><a href="javascript:funcOdds_CalcExe();">計算する</a></div>
<div class="bt_reset"><a href="javascript:funcOdds_CalcReset();">リセット</a></div>
</div><!--/#box_calculate-->

<div class="caution_bottom">※予想配当金額は、オッズ計算を利用した時点のオッズをもとに算出しています。<br>
※実際の配当金額とは異なります。<br>
※資金配分合計額未満になる場合がございます。</div>

<input type="hidden" name="Odds_Kumi_Count" value="0">
<span id="id_Calc_form"></span>
@csrf
</form>


{{--結果↓--}}
@if($odds)

	@if($intCalcType == 1 || $intCalcType == 2)
	
		@if($intTempData2 >= 1)
		

			<table id="ta_calculate_kekka">
				<tr>
					<th>組み合わせ</th>
					<th>購入額</th>
					<th>予想配当額</th>
				</tr>
				@foreach ($strAryOddsKumi as $key => $item)
					@if($item)
						<?php $strTempData = $item ?>
						<?php $strTempData2 = $service->FuncOddsBairitsu( $service->FuncKumiRep( $strTempData ) , $service->FuncKumiType( $strTempData ) ,$odds) ?>
						
						{{--押下で削除しますか？のダイアログ表示--}}
						<tr id="id_{{$strTempData}}" onclick="funcOdds_CalcDelete('{{ $strTempData}}')">
							<td>{!! $service->funcOddsImageChange( $item ) !!}</td>

							@if($intCalcType == 1)
								{{--資金配分--}}
								
								<td class="price">{{ number_format($strAryBuy[$key]) }}<span>円</span></td>

							@elseif($intCalcType == 2)
								{{--一転購入額--}}
								<td class="price">{{ number_format($strAryfield_shikin[2]) }}<span>円</span></td>

							@endif

							@if($strTempData2 && $strTempData2 != '')
								
								@if($intCalcType == 1)
									{{--資金配分--}}

									<?php $intTempData = $strAryBuy[$key] * $strTempData2 ?>

								@elseif($intCalcType == 2)
									{{--資金配分--}}
									
									<?php $intTempData = $strTempData2 * $strAryfield_shikin[2] ?>

								@endif

								<td class="haito">{{ number_format($intTempData) }}<span>円</span></td>

							@else
								{{--データ無--}}

								{{--購入額エラー文表示フラグ--}}
								<?php $boolErrorflag = True ?>
								<td class="haito">-<span>円</span></td>

							@endif

						</tr>
					@endif
				@endforeach
			</table>
			<div class="bt_allreset cf" id="id_allreset"><a href="javascript:funcOdds_CalcAllReset('{{$race_num}}');">すべてをリセット</a></div>

		@endif
	@endif

@else
	<!---データ無し--->
	<table id="nodata">
		<tr>
			<td>ただいまデータはございません</td>
		</tr>
	</table>
@endif
{{--結果↑--}}

