	// ■選手データ詳細
	function funSensyuShow( ArgData )
	{// 配列の何番目の要素かを引数にして処理する

		var strTempArray;
		var strHTML = "";

		// 1選手データを「:::」区切りで配列strTempArrayに格納
		strTempArray = arraySensyuData[ ArgData ].split(':::');

		// HTML格納
		strHTML = strHTML + "<div align='center'>";
		strHTML = strHTML + " <!--◆◆◆◆◆タイトル◆◆◆◆◆-->";
		strHTML = strHTML + " <a name='aaa'></a> <img src='images/seiseki.gif' ALT='選手個人成績' width='110' height='90' BORDER='0' USEMAP='#Map'>";
		strHTML = strHTML + " <map name='Map'>";
		strHTML = strHTML + "   <area shape='rect' coords='30,51,80,68' href='JavaScript:history.back();'>";
//		strHTML = strHTML + "   <area shape='rect' coords='30,51,80,68' href='JavaScript:funBackTo();'>";
		strHTML = strHTML + " </map>";
		strHTML = strHTML + "</div>";
		strHTML = strHTML + "<div align='center'>";
		strHTML = strHTML + " <br>";
		strHTML = strHTML + " <!--◆◆◆◆◆本文◆◆◆◆◆-->";
		strHTML = strHTML + " <table border='0' width='550'>";
		strHTML = strHTML + "  <tr><td valign='top'>";

		// 期
		strHTML = strHTML + "   <font class='big'>" + strTempArray[1] + "期</font><br>";
		strHTML = strHTML + "   <font class='text'>";
		// 期別
		strHTML = strHTML + "●" + strTempArray[2] + "年";

		if( strTempArray[3] == "1" )
		{// 期が1の時前期
			strHTML = strHTML + "前期<br>";
		}
		else
		{
			strHTML = strHTML + "後期<br>";
		}

		// 登録番号
		strHTML = strHTML + "●登録番号／" + strTempArray[4] + "<br>";
		// 級
		strHTML = strHTML + "   <font class='big'>●"+strTempArray[5]+"</font>／"+strTempArray[6]+","+strTempArray[7]+","+strTempArray[8]+" ";
		strHTML = strHTML + "   </font>";
		strHTML = strHTML + "   <hr width='100%'>";
		// 名前
		strHTML = strHTML + "   <font color='#101C5A' class='big'>"+strTempArray[9]+"　</font>";
		// ナマエ
		strHTML = strHTML + "   <font class='text'>　"+strTempArray[10]+"";
		strHTML = strHTML + "   <br>";
		strHTML = strHTML + "   <br>";
		// 出身、血液型
		strHTML = strHTML + "●"+strTempArray[0]+" ●"+strTempArray[11]+"型<br>";
		// 誕生日、年齢、身長、体重
		strHTML = strHTML + "●"+strTempArray[12]+"."+strTempArray[13]+"."+strTempArray[14]+"."+strTempArray[15]+"生（"+strTempArray[16]+"）●"+strTempArray[17]+"cm　●"+strTempArray[18]+"Kg ";
		strHTML = strHTML + "  </font>";
		strHTML = strHTML + " </td><td>";
		// 写真
		strHTML = strHTML + "  <img src='/asp/tbk/racersearch/Image_k/" + strTempArray[4] + ".jpg' hspace='30'>";
		strHTML = strHTML + " </td></tr></table>";
		strHTML = strHTML + " <hr width='550' align='center' size='3'>";
		strHTML = strHTML + " <p></p>";
		strHTML = strHTML + " <table cellspacing='2' cellpadding='2' width='460' height='60' bgcolor='#FFFFFF'>";
		strHTML = strHTML + "  <tr align='center'>";
		strHTML = strHTML + "   <td align='center' bgcolor='#FF99CC'>";
		strHTML = strHTML + "    <font class='text'>勝率</font></td>";
		strHTML = strHTML + "   <td bgcolor='#FF99CC'><font class='text'>2連率(%)</font></td>";
		strHTML = strHTML + "   <td bgcolor='#FF99CC'><font class='text'>1着回数</font></td>";
		strHTML = strHTML + "   <td bgcolor='#FF99CC'><font class='text'>2着回数</font></td>";
		strHTML = strHTML + "   <td bgcolor='#FF99CC'><font class='text'>出走回数</font></td>";
		strHTML = strHTML + "   <td bgcolor='#CCFF33'><font class='text'>優出回数</font></td>";
		strHTML = strHTML + "   <td bgcolor='#CCFF33'><font class='text'>優勝回数</font></td>";
		strHTML = strHTML + "  </tr>";
		strHTML = strHTML + "  <tr align='center'> ";
		// 勝率
		strHTML = strHTML + "   <td align='center'>"+funDecimalAlign( strTempArray[19] , 1 )+"</td>";
		// 2連率
		strHTML = strHTML + "   <td>"+funDecimalAlign( strTempArray[20] , 2 )+"</td>";
		// 1着回数
		strHTML = strHTML + "   <td>"+strTempArray[21]+"</td>";
		// 2着回数
		strHTML = strHTML + "   <td>"+strTempArray[22]+"</td>";
		// 出走回数
		strHTML = strHTML + "   <td>"+strTempArray[23]+"</td>";
		// 優出回数
		strHTML = strHTML + "   <td>"+strTempArray[24]+"</td>";
		// 優勝回数
		strHTML = strHTML + "   <td>"+strTempArray[25]+"</td>";
		strHTML = strHTML + "  </tr>";
		strHTML = strHTML + "  <tr align='center'>";
		strHTML = strHTML + "   <td bgcolor='#FFCC00'><font class='text'>平均ST.</font></td>";
		strHTML = strHTML + "   <td bgcolor='#FFCC00'><font class='text'>能力指数</font></td>";
		strHTML = strHTML + "   <td>&nbsp;</td>";
		strHTML = strHTML + "   <td>&nbsp;</td>";
		strHTML = strHTML + "   <td>&nbsp;</td>";
		strHTML = strHTML + "   <td>&nbsp;</td>";
		strHTML = strHTML + "   <td>&nbsp;</td>";
		strHTML = strHTML + "  </tr>";
		strHTML = strHTML + "  <tr align='center'>";
		// 平均ST.
		strHTML = strHTML + "   <td>"+funDecimalAlign( strTempArray[26] , 1 )+"</td>";
		// 能力指数
		strHTML = strHTML + "   <td>"+strTempArray[27]+"</td>";
		strHTML = strHTML + "   <td>&nbsp;</td>";
		strHTML = strHTML + "   <td>&nbsp;</td>";
		strHTML = strHTML + "   <td>&nbsp;</td>";
		strHTML = strHTML + "   <td>&nbsp;</td>";
		strHTML = strHTML + "   <td>&nbsp;</td>";
		strHTML = strHTML + "  </tr>";
		strHTML = strHTML + " </table>";
		strHTML = strHTML + " <table cellspacing='1' cellpadding='2' width='460' height='170' bgcolor='#000000'>";
		strHTML = strHTML + "  <tr align='center'> ";
		strHTML = strHTML + "   <td align='center' bgcolor='#FFFF00'></td>";
		strHTML = strHTML + "   <td bgcolor='#FFFF00'>";
		strHTML = strHTML + "    <font color='#000000' class='text'>進入回数</font></td>";
		strHTML = strHTML + "   <td bgcolor='#FFFF00'>";
		strHTML = strHTML + "    <font color='#000000' class='text'>平均STタイミング</font></td>";
		strHTML = strHTML + "   <td bgcolor='#FFFF00'>";
		strHTML = strHTML + "    <font color='#000000' class='text'>平均スタート順位</font></td>";
		strHTML = strHTML + "   <td bgcolor='#FFFF00'>";
		strHTML = strHTML + "    <p><font color='#000000' class='text'>2連率(%)</font></p>";
		strHTML = strHTML + "   </td>";
		strHTML = strHTML + "  </tr>";
	// ◆1コース
		strHTML = strHTML + "  <tr align='center'> ";
		strHTML = strHTML + "   <td align='center' bgcolor='#999999'>";
		strHTML = strHTML + "    <font color='#FFFFFF' class='text'>1コース</font></td>";
		// 進入回数
		if( strTempArray[28].length == 1 )
		{// 文字サイズ1の時&nbsp;を付加
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>&nbsp;"+strTempArray[28]+"</td>";
		}
		else
		{
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+strTempArray[28]+"</td>";
		}
		// 平均STタイミング
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[29] , 1 )+"</td>";
		// 平均スタート順位
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[30] , 2 )+"</td>";
		// 2連率
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[31] , 3 )+"</td>";
		strHTML = strHTML + "  </tr>";
	// ◆2コース
		strHTML = strHTML + "  <tr align='center'> ";
		strHTML = strHTML + "   <td align='center' bgcolor='#999999'>";
		strHTML = strHTML + "    <font color='#FFFFFF' class='text'>2コース</font></td>";
		// 進入回数
		if( strTempArray[32].length == 1 )
		{// 文字サイズ1の時&nbsp;を付加
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>&nbsp;"+strTempArray[32]+"</td>";
		}
		else
		{
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+strTempArray[32]+"</td>";
		}
		// 平均STタイミング
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[33] , 1 )+"</td>";
		// 平均スタート順位
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[34] , 2 )+"</td>";
		// 2連率
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[35] , 3 )+"</td>";
		strHTML = strHTML + "  </tr>";
	// ◆3コース
		strHTML = strHTML + "  <tr align='center'> ";
		strHTML = strHTML + "   <td align='center' bgcolor='#999999'>";
		strHTML = strHTML + "    <font color='#FFFFFF' class='text'>3コース</font></td>";
		// 進入回数
		if( strTempArray[36].length == 1 )
		{// 文字サイズ1の時&nbsp;を付加
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>&nbsp;"+strTempArray[36]+"</td>";
		}
		else
		{
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+strTempArray[36]+"</td>";
		}
		// 平均STタイミング
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[37] , 1 )+"</td>";
		// 平均スタート順位
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[38] , 2 )+"</td>";
		// 2連率
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[39] , 3 )+"</td>";
		strHTML = strHTML + "  </tr>";
	// ◆4コース
		strHTML = strHTML + "  <tr align='center'> ";
		strHTML = strHTML + "   <td align='center' bgcolor='#999999'>";
		strHTML = strHTML + "    <font color='#FFFFFF' class='text'>4コース</font></td>";
		// 進入回数
		if( strTempArray[40].length == 1 )
		{// 文字サイズ1の時&nbsp;を付加
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>&nbsp;"+strTempArray[40]+"</td>";
		}
		else
		{
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+strTempArray[40]+"</td>";
		}
		// 平均STタイミング
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[41] , 1 )+"</td>";
		// 平均スタート順位
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[42] , 2 )+"</td>";
		// 2連率
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[43] , 3 )+"</td>";
		strHTML = strHTML + "  </tr>";
	// ◆5コース
		strHTML = strHTML + "  <tr align='center'>";
		strHTML = strHTML + "   <td align='center' bgcolor='#999999'>";
		strHTML = strHTML + "    <font color='#FFFFFF' class='text'>5コース</font></td>";
		// 進入回数
		if( strTempArray[44].length == 1 )
		{// 文字サイズ1の時&nbsp;を付加
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>&nbsp;"+strTempArray[44]+"</td>";
		}
		else
		{
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+strTempArray[44]+"</td>";
		}
		// 平均STタイミング
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[45] , 1 )+"</td>";
		// 平均スタート順位
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[46] , 2 )+"</td>";
		// 2連率
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[47] , 3 )+"</td>";
		strHTML = strHTML + "  </tr>";
	// ◆6コース
		strHTML = strHTML + "  <tr align='center'> ";
		strHTML = strHTML + "   <td align='center' bgcolor='#999999'>";
		strHTML = strHTML + "    <font color='#FFFFFF' class='text'>6コース</font></td>";
		// 進入回数
		if( strTempArray[48].length == 1 )
		{// 文字サイズ1の時&nbsp;を付加
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>&nbsp;"+strTempArray[48]+"</td>";
		}
		else
		{
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+strTempArray[48]+"</td>";
		}
		// 平均STタイミング
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[49] , 1 )+"</td>";
		// 平均スタート順位
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[50] , 2 )+"</td>";
		// 2連率
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[51] , 3 )+"</td>";
		strHTML = strHTML + "  </tr>";
		strHTML = strHTML + "";
		strHTML = strHTML + " </table>";
		strHTML = strHTML + " <br>";
		strHTML = strHTML + " <br>";
		strHTML = strHTML + " <br>";
		strHTML = strHTML + " <br>";
		strHTML = strHTML + " <font class='small'><a href='#aaa'>{{UP}} </a><br>";
		strHTML = strHTML + " <br>";
		strHTML = strHTML + " <br>";
		strHTML = strHTML + " <br>";
		strHTML = strHTML + " </font>";
		strHTML = strHTML + "</div>";

//alert("成功");
//alert("1コースSTタイミング="+ strTempArray[29]);

		funGetElement("divDisplay").innerHTML = strHTML;
	}



	function funDecimalAlign( strArgData , intArgMode )
	{
		// ◆変数宣言
		var intMode = "";
		var strData = "";

		// 引数を変数に格納
		intMode = intArgMode;
		strData = strArgData;

		if( strArgData != "" && intArgMode != "")
		{

			if( intMode == 1 )
			{// ■モードが1の時（小数点以下第二位まで表示する（0.00））

				if( strData.indexOf( "." ) > 0 )
				{// 小数の時

					if( strData.length == 3 )
					{// strDataの文字列長が3（０．１など）の時
						strData = strData + "0";
					}
				}
				else
				{// 整数の時
					// 桁数揃える
					strData = strData + ".00";
				}
			}
			else if( intMode == 2 )
			{// ■モードが1の時（小数点以下第一位まで表示する（0.0））

				if( strData.indexOf( "." )  > 0 )
				{// 小数の時
				}
				else
				{// 整数の時
					// 桁数揃える
					strData = strData + ".0";
				}
			}
			else if( intMode == 3 )
			{// ■モードが2の時2連率の時（小数点以下第一位まで表示する（0.0））

				if( strData.indexOf( "." ) > 0 )
				{// 小数の時
					if( strData.length == 3 )
					{// 文字列長3の時（3.1など）
						// 行を揃えるために、&nbsp;付加
						strData = "&nbsp;&nbsp;" + strData;
					}
				}
				else
				{// 整数の時
					// 桁数揃える
					strData = strData + ".0";

					if( strData.length == 3 )
					{// 文字列長3の時（3.1など）
						// 行を揃えるために、&nbsp;付加
						strData = "&nbsp;&nbsp;" + strData;
					}
				}
			}

			// 戻り値strData
			return strData;
		}
		else
		{// 引数が取得出来なかった場合
			// 戻り値なしに
			return "";
		}
	}
