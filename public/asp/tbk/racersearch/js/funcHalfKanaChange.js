function funcHalfKanaChange(strChangeStrings)
{//半角カナに変換
	//alert("変換前:" + strChangeStrings);

	var strTextCheck = "";

	do{
		strTextCheck = strChangeStrings;

		strChangeStrings = strChangeStrings.replace("あ", "ｱ");
		strChangeStrings = strChangeStrings.replace("い", "ｲ");
		strChangeStrings = strChangeStrings.replace("う", "ｳ");
		strChangeStrings = strChangeStrings.replace("え", "ｴ");
		strChangeStrings = strChangeStrings.replace("お", "ｵ");
		strChangeStrings = strChangeStrings.replace("か", "ｶ");
		strChangeStrings = strChangeStrings.replace("き", "ｷ");
		strChangeStrings = strChangeStrings.replace("く", "ｸ");
		strChangeStrings = strChangeStrings.replace("け", "ｹ");
		strChangeStrings = strChangeStrings.replace("こ", "ｺ");
		strChangeStrings = strChangeStrings.replace("さ", "ｻ");
		strChangeStrings = strChangeStrings.replace("し", "ｼ");
		strChangeStrings = strChangeStrings.replace("す", "ｽ");
		strChangeStrings = strChangeStrings.replace("せ", "ｾ");
		strChangeStrings = strChangeStrings.replace("そ", "ｿ");
		strChangeStrings = strChangeStrings.replace("た", "ﾀ");
		strChangeStrings = strChangeStrings.replace("ち", "ﾁ");
		strChangeStrings = strChangeStrings.replace("つ", "ﾂ");
		strChangeStrings = strChangeStrings.replace("て", "ﾃ");
		strChangeStrings = strChangeStrings.replace("と", "ﾄ");
		strChangeStrings = strChangeStrings.replace("な", "ﾅ");
		strChangeStrings = strChangeStrings.replace("に", "ﾆ");
		strChangeStrings = strChangeStrings.replace("ぬ", "ﾇ");
		strChangeStrings = strChangeStrings.replace("ね", "ﾈ");
		strChangeStrings = strChangeStrings.replace("の", "ﾉ");
		strChangeStrings = strChangeStrings.replace("は", "ﾊ");
		strChangeStrings = strChangeStrings.replace("ひ", "ﾋ");
		strChangeStrings = strChangeStrings.replace("ふ", "ﾌ");
		strChangeStrings = strChangeStrings.replace("へ", "ﾍ");
		strChangeStrings = strChangeStrings.replace("ほ", "ﾎ");
		strChangeStrings = strChangeStrings.replace("ま", "ﾏ");
		strChangeStrings = strChangeStrings.replace("み", "ﾐ");
		strChangeStrings = strChangeStrings.replace("む", "ﾑ");
		strChangeStrings = strChangeStrings.replace("め", "ﾒ");
		strChangeStrings = strChangeStrings.replace("も", "ﾓ");
		strChangeStrings = strChangeStrings.replace("や", "ﾔ");
		strChangeStrings = strChangeStrings.replace("ゆ", "ﾕ");
		strChangeStrings = strChangeStrings.replace("よ", "ﾖ");
		strChangeStrings = strChangeStrings.replace("ら", "ﾗ");
		strChangeStrings = strChangeStrings.replace("り", "ﾘ");
		strChangeStrings = strChangeStrings.replace("る", "ﾙ");
		strChangeStrings = strChangeStrings.replace("れ", "ﾚ");
		strChangeStrings = strChangeStrings.replace("ろ", "ﾛ");
		strChangeStrings = strChangeStrings.replace("わ", "ﾜ");
		strChangeStrings = strChangeStrings.replace("お", "ｵ");
		strChangeStrings = strChangeStrings.replace("ん", "ﾝ");
	
		strChangeStrings = strChangeStrings.replace("が", "ｶﾞ");
		strChangeStrings = strChangeStrings.replace("ぎ", "ｷﾞ");
		strChangeStrings = strChangeStrings.replace("ぐ", "ｸﾞ");
		strChangeStrings = strChangeStrings.replace("げ", "ｹﾞ");
		strChangeStrings = strChangeStrings.replace("ご", "ｺﾞ");
		strChangeStrings = strChangeStrings.replace("ざ", "ｻﾞ");
		strChangeStrings = strChangeStrings.replace("じ", "ｼﾞ");
		strChangeStrings = strChangeStrings.replace("ず", "ｽﾞ");
		strChangeStrings = strChangeStrings.replace("ぜ", "ｾﾞ");
		strChangeStrings = strChangeStrings.replace("ぞ", "ｿﾞ");
		strChangeStrings = strChangeStrings.replace("だ", "ﾀﾞ");
		strChangeStrings = strChangeStrings.replace("ぢ", "ﾁﾞ");
		strChangeStrings = strChangeStrings.replace("づ", "ﾂﾞ");
		strChangeStrings = strChangeStrings.replace("で", "ﾃﾞ");
		strChangeStrings = strChangeStrings.replace("ど", "ﾄﾞ");
		strChangeStrings = strChangeStrings.replace("ば", "ﾊﾞ");
		strChangeStrings = strChangeStrings.replace("び", "ﾋﾞ");
		strChangeStrings = strChangeStrings.replace("ぶ", "ﾌﾞ");
		strChangeStrings = strChangeStrings.replace("べ", "ﾍﾞ");
		strChangeStrings = strChangeStrings.replace("ぼ", "ﾎﾞ");
	
		strChangeStrings = strChangeStrings.replace("ぱ", "ﾊﾟ");
		strChangeStrings = strChangeStrings.replace("ぴ", "ﾋﾟ");
		strChangeStrings = strChangeStrings.replace("ぷ", "ﾌﾟ");
		strChangeStrings = strChangeStrings.replace("ぺ", "ﾍﾟ");
		strChangeStrings = strChangeStrings.replace("ぽ", "ﾎﾟ");
	
		strChangeStrings = strChangeStrings.replace("ぁ", "ｧ");
		strChangeStrings = strChangeStrings.replace("ぃ", "ｨ");
		strChangeStrings = strChangeStrings.replace("ぅ", "ｩ");
		strChangeStrings = strChangeStrings.replace("ぇ", "ｪ");
		strChangeStrings = strChangeStrings.replace("ぉ", "ｫ");
		strChangeStrings = strChangeStrings.replace("ゃ", "ｬ");
		strChangeStrings = strChangeStrings.replace("ゅ", "ｭ");
		strChangeStrings = strChangeStrings.replace("ょ", "ｮ");
		strChangeStrings = strChangeStrings.replace("っ", "ｯ");
	
		strChangeStrings = strChangeStrings.replace("ア", "ｱ");
		strChangeStrings = strChangeStrings.replace("イ", "ｲ");
		strChangeStrings = strChangeStrings.replace("ウ", "ｳ");
		strChangeStrings = strChangeStrings.replace("エ", "ｴ");
		strChangeStrings = strChangeStrings.replace("オ", "ｵ");
		strChangeStrings = strChangeStrings.replace("カ", "ｶ");
		strChangeStrings = strChangeStrings.replace("キ", "ｷ");
		strChangeStrings = strChangeStrings.replace("ク", "ｸ");
		strChangeStrings = strChangeStrings.replace("ケ", "ｹ");
		strChangeStrings = strChangeStrings.replace("コ", "ｺ");
		strChangeStrings = strChangeStrings.replace("サ", "ｻ");
		strChangeStrings = strChangeStrings.replace("シ", "ｼ");
		strChangeStrings = strChangeStrings.replace("ス", "ｽ");
		strChangeStrings = strChangeStrings.replace("セ", "ｾ");
		strChangeStrings = strChangeStrings.replace("ソ", "ｿ");
		strChangeStrings = strChangeStrings.replace("タ", "ﾀ");
		strChangeStrings = strChangeStrings.replace("チ", "ﾁ");
		strChangeStrings = strChangeStrings.replace("ツ", "ﾂ");
		strChangeStrings = strChangeStrings.replace("テ", "ﾃ");
		strChangeStrings = strChangeStrings.replace("ト", "ﾄ");
		strChangeStrings = strChangeStrings.replace("ナ", "ﾅ");
		strChangeStrings = strChangeStrings.replace("ニ", "ﾆ");
		strChangeStrings = strChangeStrings.replace("ヌ", "ﾇ");
		strChangeStrings = strChangeStrings.replace("ネ", "ﾈ");
		strChangeStrings = strChangeStrings.replace("ノ", "ﾉ");
		strChangeStrings = strChangeStrings.replace("ハ", "ﾊ");
		strChangeStrings = strChangeStrings.replace("ヒ", "ﾋ");
		strChangeStrings = strChangeStrings.replace("フ", "ﾌ");
		strChangeStrings = strChangeStrings.replace("ヘ", "ﾍ");
		strChangeStrings = strChangeStrings.replace("ホ", "ﾎ");
		strChangeStrings = strChangeStrings.replace("マ", "ﾏ");
		strChangeStrings = strChangeStrings.replace("ミ", "ﾐ");
		strChangeStrings = strChangeStrings.replace("ム", "ﾑ");
		strChangeStrings = strChangeStrings.replace("メ", "ﾒ");
		strChangeStrings = strChangeStrings.replace("モ", "ﾓ");
		strChangeStrings = strChangeStrings.replace("ヤ", "ﾔ");
		strChangeStrings = strChangeStrings.replace("ユ", "ﾕ");
		strChangeStrings = strChangeStrings.replace("ヨ", "ﾖ");
		strChangeStrings = strChangeStrings.replace("ラ", "ﾗ");
		strChangeStrings = strChangeStrings.replace("リ", "ﾘ");
		strChangeStrings = strChangeStrings.replace("ル", "ﾙ");
		strChangeStrings = strChangeStrings.replace("レ", "ﾚ");
		strChangeStrings = strChangeStrings.replace("ロ", "ﾛ");
		strChangeStrings = strChangeStrings.replace("ワ", "ﾜ");
		strChangeStrings = strChangeStrings.replace("オ", "ｵ");
		strChangeStrings = strChangeStrings.replace("ン", "ﾝ");
	
		strChangeStrings = strChangeStrings.replace("ガ", "ｶﾞ");
		strChangeStrings = strChangeStrings.replace("ギ", "ｷﾞ");
		strChangeStrings = strChangeStrings.replace("グ", "ｸﾞ");
		strChangeStrings = strChangeStrings.replace("ゲ", "ｹﾞ");
		strChangeStrings = strChangeStrings.replace("ゴ", "ｺﾞ");
		strChangeStrings = strChangeStrings.replace("ザ", "ｻﾞ");
		strChangeStrings = strChangeStrings.replace("ジ", "ｼﾞ");
		strChangeStrings = strChangeStrings.replace("ズ", "ｽﾞ");
		strChangeStrings = strChangeStrings.replace("ゼ", "ｾﾞ");
		strChangeStrings = strChangeStrings.replace("ゾ", "ｿﾞ");
		strChangeStrings = strChangeStrings.replace("ダ", "ﾀﾞ");
		strChangeStrings = strChangeStrings.replace("ヂ", "ﾁﾞ");
		strChangeStrings = strChangeStrings.replace("ヅ", "ﾂﾞ");
		strChangeStrings = strChangeStrings.replace("デ", "ﾃﾞ");
		strChangeStrings = strChangeStrings.replace("ド", "ﾄﾞ");
		strChangeStrings = strChangeStrings.replace("バ", "ﾊﾞ");
		strChangeStrings = strChangeStrings.replace("ビ", "ﾋﾞ");
		strChangeStrings = strChangeStrings.replace("ブ", "ﾌﾞ");
		strChangeStrings = strChangeStrings.replace("ベ", "ﾍﾞ");
		strChangeStrings = strChangeStrings.replace("ボ", "ﾎﾞ");
	
		strChangeStrings = strChangeStrings.replace("パ", "ﾊﾟ");
		strChangeStrings = strChangeStrings.replace("ピ", "ﾋﾟ");
		strChangeStrings = strChangeStrings.replace("プ", "ﾌﾟ");
		strChangeStrings = strChangeStrings.replace("ペ", "ﾍﾟ");
		strChangeStrings = strChangeStrings.replace("ポ", "ﾎﾟ");
	
		strChangeStrings = strChangeStrings.replace("ァ", "ｧ");
		strChangeStrings = strChangeStrings.replace("ィ", "ｨ");
		strChangeStrings = strChangeStrings.replace("ゥ", "ｩ");
		strChangeStrings = strChangeStrings.replace("ェ", "ｪ");
		strChangeStrings = strChangeStrings.replace("ォ", "ｫ");
		strChangeStrings = strChangeStrings.replace("ャ", "ｬ");
		strChangeStrings = strChangeStrings.replace("ュ", "ｭ");
		strChangeStrings = strChangeStrings.replace("ョ", "ｮ");
		strChangeStrings = strChangeStrings.replace("ッ", "ｯ");
	
	}while(strChangeStrings != strTextCheck);

	do{
		strTextCheck = strChangeStrings;

		strChangeStrings = strChangeStrings.replace("tta", "ﾂﾀ");
		strChangeStrings = strChangeStrings.replace("tsu", "ﾂ");
		strChangeStrings = strChangeStrings.replace("shi", "ｼ");
		strChangeStrings = strChangeStrings.replace("chi", "ﾁ");
	
		strChangeStrings = strChangeStrings.replace("jya", "ｼﾞｬ");
		strChangeStrings = strChangeStrings.replace("jyu", "ｼﾞｭ");
		strChangeStrings = strChangeStrings.replace("jyo", "ｼﾞｮ");
		strChangeStrings = strChangeStrings.replace("zya", "ｼﾞｬ");
		strChangeStrings = strChangeStrings.replace("zyu", "ｼﾞｭ");
		strChangeStrings = strChangeStrings.replace("zyo", "ｼﾞｮ");
		strChangeStrings = strChangeStrings.replace("gya", "ｷﾞｬ");
		strChangeStrings = strChangeStrings.replace("gyu", "ｷﾞｭ");
		strChangeStrings = strChangeStrings.replace("gyo", "ｷﾞｮ");
		strChangeStrings = strChangeStrings.replace("kya", "ｷｬ");
		strChangeStrings = strChangeStrings.replace("kyu", "ｷｭ");
		strChangeStrings = strChangeStrings.replace("kyo", "ｷｮ");
		strChangeStrings = strChangeStrings.replace("tya", "ﾁｬ");
		strChangeStrings = strChangeStrings.replace("tyu", "ﾁｭ");
		strChangeStrings = strChangeStrings.replace("tyo", "ﾁｮ");
		strChangeStrings = strChangeStrings.replace("cha", "ﾁｬ");
		strChangeStrings = strChangeStrings.replace("chu", "ﾁｭ");
		strChangeStrings = strChangeStrings.replace("cho", "ﾁｮ");
		strChangeStrings = strChangeStrings.replace("sya", "ｼｬ");
		strChangeStrings = strChangeStrings.replace("syu", "ｼｭ");
		strChangeStrings = strChangeStrings.replace("syo", "ｼｮ");
		strChangeStrings = strChangeStrings.replace("sha", "ｼｬ");
		strChangeStrings = strChangeStrings.replace("shu", "ｼｭ");
		strChangeStrings = strChangeStrings.replace("sho", "ｼｮ");
		strChangeStrings = strChangeStrings.replace("dya", "ﾁﾞｬ");
		strChangeStrings = strChangeStrings.replace("dyu", "ﾁﾞｭ");
		strChangeStrings = strChangeStrings.replace("dyo", "ﾁﾞｮ");
		strChangeStrings = strChangeStrings.replace("nya", "ﾆｬ");
		strChangeStrings = strChangeStrings.replace("nyu", "ﾆｭ");
		strChangeStrings = strChangeStrings.replace("nyo", "ﾆｮ");
		strChangeStrings = strChangeStrings.replace("hya", "ﾋｬ");
		strChangeStrings = strChangeStrings.replace("hyu", "ﾋｭ");
		strChangeStrings = strChangeStrings.replace("hyo", "ﾋｮ");
		strChangeStrings = strChangeStrings.replace("bya", "ﾋﾞｬ");
		strChangeStrings = strChangeStrings.replace("byu", "ﾋﾞｭ");
		strChangeStrings = strChangeStrings.replace("byo", "ﾋﾞｮ");
		strChangeStrings = strChangeStrings.replace("pya", "ﾋﾟｬ");
		strChangeStrings = strChangeStrings.replace("pyu", "ﾋﾟｭ");
		strChangeStrings = strChangeStrings.replace("pyo", "ﾋﾟｮ");
		strChangeStrings = strChangeStrings.replace("fya", "ﾌｬ");
		strChangeStrings = strChangeStrings.replace("fyu", "ﾌｭ");
		strChangeStrings = strChangeStrings.replace("fyo", "ﾌｮ");
		strChangeStrings = strChangeStrings.replace("mya", "ﾐｬ");
		strChangeStrings = strChangeStrings.replace("myu", "ﾐｭ");
		strChangeStrings = strChangeStrings.replace("myo", "ﾐｮ");
		strChangeStrings = strChangeStrings.replace("rya", "ﾘｬ");
		strChangeStrings = strChangeStrings.replace("ryu", "ﾘｭ");
		strChangeStrings = strChangeStrings.replace("ryo", "ﾘｮ");

		strChangeStrings = strChangeStrings.replace("lya", "ｬ");
		strChangeStrings = strChangeStrings.replace("lyu", "ｭ");
		strChangeStrings = strChangeStrings.replace("lyo", "ｮ");

	}while(strChangeStrings != strTextCheck);

	do{
		strTextCheck = strChangeStrings;

		strChangeStrings = strChangeStrings.replace("ja", "ｼﾞｬ");
		strChangeStrings = strChangeStrings.replace("ju", "ｼﾞｭ");
		strChangeStrings = strChangeStrings.replace("jo", "ｼﾞｮ");
		strChangeStrings = strChangeStrings.replace("la", "ｧ");
		strChangeStrings = strChangeStrings.replace("li", "ｨ");
		strChangeStrings = strChangeStrings.replace("lu", "ｩ");
		strChangeStrings = strChangeStrings.replace("le", "ｪ");
		strChangeStrings = strChangeStrings.replace("lo", "ｫ");
	
		strChangeStrings = strChangeStrings.replace("ka", "ｶ");
		strChangeStrings = strChangeStrings.replace("ki", "ｷ");
		strChangeStrings = strChangeStrings.replace("ku", "ｸ");
		strChangeStrings = strChangeStrings.replace("ke", "ｹ");
		strChangeStrings = strChangeStrings.replace("ko", "ｺ");
		strChangeStrings = strChangeStrings.replace("qu", "ｸ");
		strChangeStrings = strChangeStrings.replace("sa", "ｻ");
		strChangeStrings = strChangeStrings.replace("si", "ｼ");
		strChangeStrings = strChangeStrings.replace("su", "ｽ");
		strChangeStrings = strChangeStrings.replace("se", "ｾ");
		strChangeStrings = strChangeStrings.replace("so", "ｿ");
		strChangeStrings = strChangeStrings.replace("ta", "ﾀ");
		strChangeStrings = strChangeStrings.replace("ci", "ﾁ");
		strChangeStrings = strChangeStrings.replace("ti", "ﾁ");
		strChangeStrings = strChangeStrings.replace("tu", "ﾂ");
		strChangeStrings = strChangeStrings.replace("te", "ﾃ");
		strChangeStrings = strChangeStrings.replace("to", "ﾄ");
		strChangeStrings = strChangeStrings.replace("na", "ﾅ");
		strChangeStrings = strChangeStrings.replace("ni", "ﾆ");
		strChangeStrings = strChangeStrings.replace("nu", "ﾇ");
		strChangeStrings = strChangeStrings.replace("ne", "ﾈ");
		strChangeStrings = strChangeStrings.replace("no", "ﾉ");
		strChangeStrings = strChangeStrings.replace("ha", "ﾊ");
		strChangeStrings = strChangeStrings.replace("hi", "ﾋ");
		strChangeStrings = strChangeStrings.replace("hu", "ﾌ");
		strChangeStrings = strChangeStrings.replace("he", "ﾍ");
		strChangeStrings = strChangeStrings.replace("ho", "ﾎ");
		strChangeStrings = strChangeStrings.replace("fa", "ﾌｧ");
		strChangeStrings = strChangeStrings.replace("fi", "ﾌｨ");
		strChangeStrings = strChangeStrings.replace("fu", "ﾌ");
		strChangeStrings = strChangeStrings.replace("fe", "ﾌｪ");
		strChangeStrings = strChangeStrings.replace("fo", "ﾌｫ");
		strChangeStrings = strChangeStrings.replace("ma", "ﾏ");
		strChangeStrings = strChangeStrings.replace("mi", "ﾐ");
		strChangeStrings = strChangeStrings.replace("mu", "ﾑ");
		strChangeStrings = strChangeStrings.replace("me", "ﾒ");
		strChangeStrings = strChangeStrings.replace("mo", "ﾓ");
		strChangeStrings = strChangeStrings.replace("ya", "ﾔ");
		strChangeStrings = strChangeStrings.replace("yu", "ﾕ");
		strChangeStrings = strChangeStrings.replace("yo", "ﾖ");
		strChangeStrings = strChangeStrings.replace("ra", "ﾗ");
		strChangeStrings = strChangeStrings.replace("ri", "ﾘ");
		strChangeStrings = strChangeStrings.replace("ru", "ﾙ");
		strChangeStrings = strChangeStrings.replace("re", "ﾚ");
		strChangeStrings = strChangeStrings.replace("ro", "ﾛ");
		strChangeStrings = strChangeStrings.replace("wa", "ﾜ");
		strChangeStrings = strChangeStrings.replace("wo", "ｵ");
		strChangeStrings = strChangeStrings.replace("nn", "ﾝ");
	
		strChangeStrings = strChangeStrings.replace("ga", "ｶﾞ");
		strChangeStrings = strChangeStrings.replace("gi", "ｷﾞ");
		strChangeStrings = strChangeStrings.replace("gu", "ｸﾞ");
		strChangeStrings = strChangeStrings.replace("ge", "ｹﾞ");
		strChangeStrings = strChangeStrings.replace("go", "ｺﾞ");
		strChangeStrings = strChangeStrings.replace("za", "ｻﾞ");
		strChangeStrings = strChangeStrings.replace("zi", "ｼﾞ");
		strChangeStrings = strChangeStrings.replace("ji", "ｼﾞ");
		strChangeStrings = strChangeStrings.replace("zu", "ｽﾞ");
		strChangeStrings = strChangeStrings.replace("ze", "ｾﾞ");
		strChangeStrings = strChangeStrings.replace("zo", "ｿﾞ");
		strChangeStrings = strChangeStrings.replace("da", "ﾀﾞ");
		strChangeStrings = strChangeStrings.replace("di", "ﾁﾞ");
		strChangeStrings = strChangeStrings.replace("du", "ﾂﾞ");
		strChangeStrings = strChangeStrings.replace("de", "ﾃﾞ");
		strChangeStrings = strChangeStrings.replace("do", "ﾄﾞ");
		strChangeStrings = strChangeStrings.replace("ba", "ﾊﾞ");
		strChangeStrings = strChangeStrings.replace("bi", "ﾋﾞ");
		strChangeStrings = strChangeStrings.replace("bu", "ﾌﾞ");
		strChangeStrings = strChangeStrings.replace("be", "ﾍﾞ");
		strChangeStrings = strChangeStrings.replace("bo", "ﾎﾞ");
	
		strChangeStrings = strChangeStrings.replace("pa", "ﾊﾟ");
		strChangeStrings = strChangeStrings.replace("pi", "ﾋﾟ");
		strChangeStrings = strChangeStrings.replace("pu", "ﾌﾟ");
		strChangeStrings = strChangeStrings.replace("pe", "ﾍﾟ");
		strChangeStrings = strChangeStrings.replace("po", "ﾎﾟ");

	}while(strChangeStrings != strTextCheck);

	do{
		strTextCheck = strChangeStrings;

		strChangeStrings = strChangeStrings.replace("n", "ﾝ");
	
		strChangeStrings = strChangeStrings.replace("a", "ｱ");
		strChangeStrings = strChangeStrings.replace("i", "ｲ");
		strChangeStrings = strChangeStrings.replace("u", "ｳ");
		strChangeStrings = strChangeStrings.replace("e", "ｴ");
		strChangeStrings = strChangeStrings.replace("o", "ｵ");
	
	}while(strChangeStrings != strTextCheck);

	do{
		strTextCheck = strChangeStrings;
	
		strChangeStrings = strChangeStrings.replace("ｧ", "ｱ");
		strChangeStrings = strChangeStrings.replace("ｨ", "ｲ");
		strChangeStrings = strChangeStrings.replace("ｩ", "ｳ");
		strChangeStrings = strChangeStrings.replace("ｪ", "ｴ");
		strChangeStrings = strChangeStrings.replace("ｫ", "ｵ");
		strChangeStrings = strChangeStrings.replace("ｬ", "ﾔ");
		strChangeStrings = strChangeStrings.replace("ｭ", "ﾕ");
		strChangeStrings = strChangeStrings.replace("ｮ", "ﾖ");
		strChangeStrings = strChangeStrings.replace("ｯ", "ﾂ");

	}while(strChangeStrings != strTextCheck);

	//alert("変換後:" + strChangeStrings);

	return strChangeStrings;
}

function funcSmallHalfKanaChange(strChangeStrings)
{//小さい半角カナを大きい半角カナに変換
	//alert("変換前:" + strChangeStrings);
	var strTextCheck = "";

	do{
		strTextCheck = strChangeStrings;

		strChangeStrings = strChangeStrings.replace("ｧ", "ｱ");
		strChangeStrings = strChangeStrings.replace("ｨ", "ｲ");
		strChangeStrings = strChangeStrings.replace("ｩ", "ｳ");
		strChangeStrings = strChangeStrings.replace("ｪ", "ｴ");
		strChangeStrings = strChangeStrings.replace("ｫ", "ｵ");
		strChangeStrings = strChangeStrings.replace("ｬ", "ﾔ");
		strChangeStrings = strChangeStrings.replace("ｭ", "ﾕ");
		strChangeStrings = strChangeStrings.replace("ｮ", "ﾖ");
		strChangeStrings = strChangeStrings.replace("ｯ", "ﾂ");

	}while(strChangeStrings != strTextCheck);

	//alert("変換後:" + strChangeStrings);

	return strChangeStrings;
}
