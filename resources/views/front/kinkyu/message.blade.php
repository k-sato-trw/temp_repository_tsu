@if($device == 0)
    <!--緊急告知-->
		
    <!-- 緊急告知終了 -->
    <!-- ■■■緊急対応■■■-->
    <table width="100%" border="0" align="center" bgcolor="#ff0000" style="border:5px solid #FF0000; -webkit-text-size-adjust:none;z-index:20000; position:relative;">
    <tr>
    <td align="center" bgcolor="#FF0000" style="padding:8px;">
    <font color="#ffffff" style="font-size:16px; font-weight:bold; font-family: Meiryo, 'メイリオ', 'Hiragino Kaku Gothic Pro', 'ヒラギノ角ゴ Pro W3', 'ＭＳ Ｐゴシック', sans-serif;">
    {{$kinkyu->TITLE ?? ""}}
    </font></td>
    </tr>
    <tr>
    <td align="center" bgcolor="#ffffff" style="padding-top:20px; padding-bottom:20px; padding-left:50px; padding-right:50px; font-size: 14px; line-height:19px; font-family: Meiryo, 'メイリオ', 'Hiragino Kaku Gothic Pro', 'ヒラギノ角ゴ Pro W3', 'ＭＳ Ｐゴシック', sans-serif; color:#000000">
    <div style="width:800px;margin-right:auto;margin-left:auto;disp;ay:block;text-align:left;">{!! nl2br($kinkyu->HONBUN ?? "") !!}</div>
    </td>
    </tr>
    </table>
    <!-- ■■■緊急対応■■■-->
@elseif($device == 1)

    <!--緊急告知-->
    <table width="720" border="0" align="center" bgcolor="#ff0000" style="border:5px solid #FF0000; -webkit-text-size-adjust:none;">
    <tr>
    <td align="center" bgcolor="#FF0000" style="padding:8px;">
    <font color="#ffffff" style="font-size:30px; line-height:1.2em;font-weight:bold;">
    {{$kinkyu->TITLE ?? ""}}
    </font></td>
    </tr>
    <tr>
    <td align="center" bgcolor="#f1f1f1" style="padding-top:10px; padding-bottom:10px; padding-left:20px; padding-right:20px;  color:#000000">
    <div style="display:block;text-align:left; font-size: 26px; line-height:1.3em;">{!! nl2br($kinkyu->HONBUN ?? "") !!}</div>
    </td>
    </tr>
    </table>
    <!-- 緊急告知終了 -->

@endif