	// ■選手データ詳細
	function funSensyuShow( ArgData )
	{// 配列の何番目の要素かを引数にして処理する

		var strTempArray;
		var strHTML = "";

		// 1選手データを「:::」区切りで配列strTempArrayに格納
		strTempArray = arraySensyuData[ ArgData ].split(':::');

		// HTML格納
		strHTML = strHTML + "<div id='data'>";
		strHTML = strHTML + "";
		strHTML = strHTML + "<div id='term'>" + strTempArray[2] + "年";
		if( strTempArray[3] == "1" )
		{// 期が1の時前期
			strHTML = strHTML + "前期</div>";
		}
		else
		{
			strHTML = strHTML + "後期</div>";
		}
		strHTML = strHTML + "";
		strHTML = strHTML + "<div id='basic'>";
		strHTML = strHTML + "";
		strHTML = strHTML + "<div id='left'><img src='/asp/tbk/racersearch/Image_k/" + strTempArray[4] + ".jpg' width='150' height='210'></div>";
		strHTML = strHTML + "";
		strHTML = strHTML + "<div id='right'>";
		//名前
		strHTML = strHTML + "<div id='name'>"+strTempArray[9]+"</div>";
		//ナマエ
		strHTML = strHTML + "<div id='ruby'>"+ funcStringChange(strTempArray[10]) +"</div>";
		strHTML = strHTML + "<div id='data1'>";
		//期
		strHTML = strHTML + "<div id='period'><span class='txt18'>" + strTempArray[1] + "期</span></div>";
		//登録番号
		strHTML = strHTML + "<div id='number'>登録番号／<span class='txt18'>" + strTempArray[4] + "</span></div>";
		strHTML = strHTML + "<div class='clear'></div>";
		strHTML = strHTML + "</div>";
		//クラス
		strHTML = strHTML + "<div id='data2'><span class='txt18'>"+strTempArray[5]+"</span>＜"+strTempArray[6]+"＜"+strTempArray[7]+"＜"+strTempArray[8]+"</div>";
		//出身地,血液型,生年月日,年齢
		strHTML = strHTML + "<div id='personal'>"+strTempArray[0]+"／"+strTempArray[11]+"型／"+strTempArray[12]+"."+strTempArray[13]+"."+strTempArray[14]+"."+strTempArray[15]+"生（"+strTempArray[16]+"）<br>";
		//身長,体重
		strHTML = strHTML + ""+strTempArray[17]+"cm／"+strTempArray[18]+"kg</div>";
		strHTML = strHTML + "</div>";
		strHTML = strHTML + "";
		strHTML = strHTML + "<div class='clear'></div>";
		strHTML = strHTML + "</div>";
		strHTML = strHTML + "";
		strHTML = strHTML + "";
		strHTML = strHTML + "<table border='0' cellspacing='0' cellpadding='0' id='ta_data1'>";
		strHTML = strHTML + "<tr>";
		strHTML = strHTML + "<td class='blue'>勝率</td>";
		strHTML = strHTML + "<td class='blue'>2連率(%)</td>";
		strHTML = strHTML + "<td class='blue'>1着回数</td>";
		strHTML = strHTML + "<td class='blue'>2着回数</td>";
		strHTML = strHTML + "<td class='blue'>出走回数</td>";
		strHTML = strHTML + "</tr>";
		strHTML = strHTML + "<tr>";
		//勝率
		strHTML = strHTML + "<td class='txt17'>"+funDecimalAlign( strTempArray[19] , 1 )+"</td>";
		//2連率(%)
		strHTML = strHTML + "<td class='txt17'>"+funDecimalAlign( strTempArray[20] , 2 )+"</td>";
		//1着回数
		strHTML = strHTML + "<td class='txt17'>"+strTempArray[21]+"</td>";
		//2着回数
		strHTML = strHTML + "<td class='txt17'>"+strTempArray[22]+"</td>";
		//出走回数
		strHTML = strHTML + "<td class='txt17'>"+strTempArray[23]+"</td>";
		strHTML = strHTML + "</tr>";
		strHTML = strHTML + "</table>";
		strHTML = strHTML + "";
		strHTML = strHTML + "<table border='0' cellspacing='0' cellpadding='0' id='ta_data2'>";
		strHTML = strHTML + "<tr>";
		strHTML = strHTML + "<td class='bluegreen'>優出回数</td>";
		strHTML = strHTML + "<td class='bluegreen'>優勝回数</td>";
		strHTML = strHTML + "<td class='green'>平均ST</td>";
		strHTML = strHTML + "<td class='green'>能力指数</td>";
		strHTML = strHTML + "</tr>";
		strHTML = strHTML + "<tr>";
		//優出回数
		strHTML = strHTML + "<td class='txt17'>"+strTempArray[24]+"</td>";
		//優勝回数
		strHTML = strHTML + "<td class='txt17'>"+strTempArray[25]+"</td>";
		//平均ST
		strHTML = strHTML + "<td class='txt17'>"+funDecimalAlign( strTempArray[26] , 1 )+"</td>";
		//能力指数
		strHTML = strHTML + "<td class='txt17'>"+strTempArray[27]+"</td>";
		strHTML = strHTML + "</tr>";
		strHTML = strHTML + "</table>";
		strHTML = strHTML + "";
		strHTML = strHTML + "<table border='0' cellspacing='0' cellpadding='0' id='ta_data3'>";
		strHTML = strHTML + "<tr>";
		strHTML = strHTML + "<td class='navy'>　</td>";
		strHTML = strHTML + "<td class='navy'>進入回数</td>";
		strHTML = strHTML + "<td class='navy'>2連率(%)</td>";
		strHTML = strHTML + "<td class='navy'>平均ST</td>";
		strHTML = strHTML + "<td class='navy'>平均ST順位</td>";
		strHTML = strHTML + "</tr>";
		strHTML = strHTML + "<tr>";
		strHTML = strHTML + "<td class='gray'>1コース</td>";
		// 進入回数
		if( strTempArray[28].length == 1 )
		{// 文字サイズ1の時&nbsp;を付加
			strHTML = strHTML + "<td class='txt14'>&nbsp;"+strTempArray[28]+"</td>";
		}
		else
		{
			strHTML = strHTML + "<td class='txt14'>"+strTempArray[28]+"</td>";
		}
		//2連率(%)
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[31] , 3 )+"</td>";
		//平均ST
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[29] , 1 )+"</td>";
		//平均ST順位
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[30] , 2 )+"</td>";
		strHTML = strHTML + "</tr>";
		strHTML = strHTML + "<tr>";
		strHTML = strHTML + "<td class='gray'>2コース</td>";
		// 進入回数
		if( strTempArray[32].length == 1 )
		{// 文字サイズ1の時&nbsp;を付加
			strHTML = strHTML + "<td class='txt14'>&nbsp;"+strTempArray[32]+"</td>";
		}
		else
		{
			strHTML = strHTML + "<td class='txt14'>"+strTempArray[32]+"</td>";
		}
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[35] , 3 )+"</td>";
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[33] , 1 )+"</td>";
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[34] , 2 )+"</td>";
		strHTML = strHTML + "</tr>";
		strHTML = strHTML + "<tr>";
		strHTML = strHTML + "<td class='gray'>3コース</td>";
		// 進入回数
		if( strTempArray[36].length == 1 )
		{// 文字サイズ1の時&nbsp;を付加
			strHTML = strHTML + "<td class='txt14'>&nbsp;"+strTempArray[36]+"</td>";
		}
		else
		{
			strHTML = strHTML + "<td class='txt14'>"+strTempArray[36]+"</td>";
		}
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[39] , 3 )+"</td>";
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[37] , 1 )+"</td>";
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[38] , 2 )+"</td>";
		strHTML = strHTML + "</tr>";
		strHTML = strHTML + "<tr>";
		strHTML = strHTML + "<td class='gray'>4コース</td>";
		// 進入回数
		if( strTempArray[40].length == 1 )
		{// 文字サイズ1の時&nbsp;を付加
			strHTML = strHTML + "<td class='txt14'>&nbsp;"+strTempArray[40]+"</td>";
		}
		else
		{
			strHTML = strHTML + "<td class='txt14'>"+strTempArray[40]+"</td>";
		}
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[43] , 3 )+"</td>";
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[41] , 1 )+"</td>";
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[42] , 2 )+"</td>";
		strHTML = strHTML + "</tr>";
		strHTML = strHTML + "<tr>";
		strHTML = strHTML + "<td class='gray'>5コース</td>";
		// 進入回数
		if( strTempArray[44].length == 1 )
		{// 文字サイズ1の時&nbsp;を付加
			strHTML = strHTML + "<td class='txt14'>&nbsp;"+strTempArray[44]+"</td>";
		}
		else
		{
			strHTML = strHTML + "<td class='txt14'>"+strTempArray[44]+"</td>";
		}
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[47] , 3 )+"</td>";
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[45] , 1 )+"</td>";
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[46] , 2 )+"</td>";
		strHTML = strHTML + "</tr>";
		strHTML = strHTML + "<tr>";
		strHTML = strHTML + "<td class='gray'>6コース</td>";
		// 進入回数
		if( strTempArray[48].length == 1 )
		{// 文字サイズ1の時&nbsp;を付加
			strHTML = strHTML + "<td class='txt14'>&nbsp;"+strTempArray[48]+"</td>";
		}
		else
		{
			strHTML = strHTML + "<td class='txt14'>"+strTempArray[48]+"</td>";
		}
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[51] , 3 )+"</td>";
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[49] , 1 )+"</td>";
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[50] , 2 )+"</td>";
		strHTML = strHTML + "</tr>";
		strHTML = strHTML + "</table>";
		strHTML = strHTML + "";
		strHTML = strHTML + "</div>";

//alert(strHTML);
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
	//フリガナ半角→全角変換
	function funcStringChange(str1){
		var str = str1			//フォームを変数に展開
			//検索文字列を変換するための変換文字列配列
		var Kana1 = new Array("ｶﾞ","ｷﾞ","ｸﾞ","ｹﾞ","ｺﾞ","ｻﾞ","ｼﾞ","ｽﾞ","ｾﾞ","ｿﾞ","ﾀﾞ","ﾁﾞ",
			"ﾂﾞ","ﾃﾞ","ﾄﾞ","ﾊﾞ","ﾋﾞ","ﾌﾞ","ﾍﾞ","ﾎﾞ","ﾊﾟ","ﾋﾟ","ﾌﾟ","ﾍﾟ","ﾎﾟ","ｦ","ｧ",
			"ｨ","ｩ","ｪ","ｫ","ｬ","ｭ","ｮ","ｯ","ｰ","ｱ","ｲ","ｳ","ｴ","ｵ","ｶ","ｷ","ｸ","ｹ",
			"ｺ","ｻ","ｼ","ｽ","ｾ","ｿ","ﾀ","ﾁ","ﾂ","ﾃ","ﾄ","ﾅ","ﾆ","ﾇ","ﾈ","ﾉ","ﾊ","ﾋ",
			"ﾌ","ﾍ","ﾎ","ﾏ","ﾐ","ﾑ","ﾒ","ﾓ","ﾔ","ﾕ","ﾖ","ﾗ","ﾘ","ﾙ","ﾚ","ﾛ","ﾜ","ﾝ"," ");
		var Kana2 = new Array("ガ","ギ","グ","ゲ","ゴ","ザ","ジ","ズ","ゼ","ゾ","ダ","ヂ",
			"ヅ","デ","ド","バ","ビ","ブ","ベ","ボ","パ","ピ","プ","ペ","ポ","ヲ","ァ",
			"ィ","ゥ","ェ","ォ","ャ","ュ","ョ","ッ","ー","ア","イ","ウ","エ","オ","カ",
			"キ","ク","ケ","コ","サ","シ","ス","セ","ソ","タ","チ","ツ","テ","ト","ナ",
			"ニ","ヌ","ネ","ノ","ハ","ヒ","フ","ヘ","ホ","マ","ミ","ム","メ","モ","ヤ",
			"ユ","ヨ","ラ","リ","ル","レ","ロ","ワ","ン","　");
		while(str.match(/[ｦ-ﾝ]/)){                              //半角カタカナがある場合
			for(var i = 0; i < Kana1.length; i++){
				str = str.replace(Kana1[i], Kana2[i]);  //文字列置換
			}
		}
		return str;			//return
	}

