function funcHalfNumberChange(strChangeStrings)
{//���p�����ɕϊ�
	//alert("�ϊ��O:" + strChangeStrings);

	var strTextCheck = "";

	do{
		strTextCheck = strChangeStrings;

		strChangeStrings = strChangeStrings.replace("�O", "0");
		strChangeStrings = strChangeStrings.replace("�P", "1");
		strChangeStrings = strChangeStrings.replace("�Q", "2");
		strChangeStrings = strChangeStrings.replace("�R", "3");
		strChangeStrings = strChangeStrings.replace("�S", "4");
		strChangeStrings = strChangeStrings.replace("�T", "5");
		strChangeStrings = strChangeStrings.replace("�U", "6");
		strChangeStrings = strChangeStrings.replace("�V", "7");
		strChangeStrings = strChangeStrings.replace("�W", "8");
		strChangeStrings = strChangeStrings.replace("�X", "9");

	}while(strChangeStrings != strTextCheck);

	//alert("�ϊ���:" + strChangeStrings);

	return strChangeStrings;
}
