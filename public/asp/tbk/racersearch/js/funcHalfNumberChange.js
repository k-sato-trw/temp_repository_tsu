function funcHalfNumberChange(strChangeStrings)
{//îºäpêîéöÇ…ïœä∑
	//alert("ïœä∑ëO:" + strChangeStrings);

	var strTextCheck = "";

	do{
		strTextCheck = strChangeStrings;

		strChangeStrings = strChangeStrings.replace("ÇO", "0");
		strChangeStrings = strChangeStrings.replace("ÇP", "1");
		strChangeStrings = strChangeStrings.replace("ÇQ", "2");
		strChangeStrings = strChangeStrings.replace("ÇR", "3");
		strChangeStrings = strChangeStrings.replace("ÇS", "4");
		strChangeStrings = strChangeStrings.replace("ÇT", "5");
		strChangeStrings = strChangeStrings.replace("ÇU", "6");
		strChangeStrings = strChangeStrings.replace("ÇV", "7");
		strChangeStrings = strChangeStrings.replace("ÇW", "8");
		strChangeStrings = strChangeStrings.replace("ÇX", "9");

	}while(strChangeStrings != strTextCheck);

	//alert("ïœä∑å„:" + strChangeStrings);

	return strChangeStrings;
}
