	// ���I��f�[�^�ڍ�
	function funSensyuShow( ArgData )
	{// �z��̉��Ԗڂ̗v�f���������ɂ��ď�������

		var strTempArray;
		var strHTML = "";

		// 1�I��f�[�^���u:::�v��؂�Ŕz��strTempArray�Ɋi�[
		strTempArray = arraySensyuData[ ArgData ].split(':::');

		// HTML�i�[
		strHTML = strHTML + "<div id='data'>";
		strHTML = strHTML + "";
		strHTML = strHTML + "<div id='term'>" + strTempArray[2] + "�N";
		if( strTempArray[3] == "1" )
		{// ����1�̎��O��
			strHTML = strHTML + "�O��</div>";
		}
		else
		{
			strHTML = strHTML + "���</div>";
		}
		strHTML = strHTML + "";
		strHTML = strHTML + "<div id='basic'>";
		strHTML = strHTML + "";
		strHTML = strHTML + "<div id='left'><img src='/asp/tbk/racersearch/Image_k/" + strTempArray[4] + ".jpg' width='150' height='210'></div>";
		strHTML = strHTML + "";
		strHTML = strHTML + "<div id='right'>";
		//���O
		strHTML = strHTML + "<div id='name'>"+strTempArray[9]+"</div>";
		//�i�}�G
		strHTML = strHTML + "<div id='ruby'>"+ funcStringChange(strTempArray[10]) +"</div>";
		strHTML = strHTML + "<div id='data1'>";
		//��
		strHTML = strHTML + "<div id='period'><span class='txt18'>" + strTempArray[1] + "��</span></div>";
		//�o�^�ԍ�
		strHTML = strHTML + "<div id='number'>�o�^�ԍ��^<span class='txt18'>" + strTempArray[4] + "</span></div>";
		strHTML = strHTML + "<div class='clear'></div>";
		strHTML = strHTML + "</div>";
		//�N���X
		strHTML = strHTML + "<div id='data2'><span class='txt18'>"+strTempArray[5]+"</span>��"+strTempArray[6]+"��"+strTempArray[7]+"��"+strTempArray[8]+"</div>";
		//�o�g�n,���t�^,���N����,�N��
		strHTML = strHTML + "<div id='personal'>"+strTempArray[0]+"�^"+strTempArray[11]+"�^�^"+strTempArray[12]+"."+strTempArray[13]+"."+strTempArray[14]+"."+strTempArray[15]+"���i"+strTempArray[16]+"�j<br>";
		//�g��,�̏d
		strHTML = strHTML + ""+strTempArray[17]+"cm�^"+strTempArray[18]+"kg</div>";
		strHTML = strHTML + "</div>";
		strHTML = strHTML + "";
		strHTML = strHTML + "<div class='clear'></div>";
		strHTML = strHTML + "</div>";
		strHTML = strHTML + "";
		strHTML = strHTML + "";
		strHTML = strHTML + "<table border='0' cellspacing='0' cellpadding='0' id='ta_data1'>";
		strHTML = strHTML + "<tr>";
		strHTML = strHTML + "<td class='blue'>����</td>";
		strHTML = strHTML + "<td class='blue'>2�A��(%)</td>";
		strHTML = strHTML + "<td class='blue'>1����</td>";
		strHTML = strHTML + "<td class='blue'>2����</td>";
		strHTML = strHTML + "<td class='blue'>�o����</td>";
		strHTML = strHTML + "</tr>";
		strHTML = strHTML + "<tr>";
		//����
		strHTML = strHTML + "<td class='txt17'>"+funDecimalAlign( strTempArray[19] , 1 )+"</td>";
		//2�A��(%)
		strHTML = strHTML + "<td class='txt17'>"+funDecimalAlign( strTempArray[20] , 2 )+"</td>";
		//1����
		strHTML = strHTML + "<td class='txt17'>"+strTempArray[21]+"</td>";
		//2����
		strHTML = strHTML + "<td class='txt17'>"+strTempArray[22]+"</td>";
		//�o����
		strHTML = strHTML + "<td class='txt17'>"+strTempArray[23]+"</td>";
		strHTML = strHTML + "</tr>";
		strHTML = strHTML + "</table>";
		strHTML = strHTML + "";
		strHTML = strHTML + "<table border='0' cellspacing='0' cellpadding='0' id='ta_data2'>";
		strHTML = strHTML + "<tr>";
		strHTML = strHTML + "<td class='bluegreen'>�D�o��</td>";
		strHTML = strHTML + "<td class='bluegreen'>�D����</td>";
		strHTML = strHTML + "<td class='green'>����ST</td>";
		strHTML = strHTML + "<td class='green'>�\�͎w��</td>";
		strHTML = strHTML + "</tr>";
		strHTML = strHTML + "<tr>";
		//�D�o��
		strHTML = strHTML + "<td class='txt17'>"+strTempArray[24]+"</td>";
		//�D����
		strHTML = strHTML + "<td class='txt17'>"+strTempArray[25]+"</td>";
		//����ST
		strHTML = strHTML + "<td class='txt17'>"+funDecimalAlign( strTempArray[26] , 1 )+"</td>";
		//�\�͎w��
		strHTML = strHTML + "<td class='txt17'>"+strTempArray[27]+"</td>";
		strHTML = strHTML + "</tr>";
		strHTML = strHTML + "</table>";
		strHTML = strHTML + "";
		strHTML = strHTML + "<table border='0' cellspacing='0' cellpadding='0' id='ta_data3'>";
		strHTML = strHTML + "<tr>";
		strHTML = strHTML + "<td class='navy'>�@</td>";
		strHTML = strHTML + "<td class='navy'>�i����</td>";
		strHTML = strHTML + "<td class='navy'>2�A��(%)</td>";
		strHTML = strHTML + "<td class='navy'>����ST</td>";
		strHTML = strHTML + "<td class='navy'>����ST����</td>";
		strHTML = strHTML + "</tr>";
		strHTML = strHTML + "<tr>";
		strHTML = strHTML + "<td class='gray'>1�R�[�X</td>";
		// �i����
		if( strTempArray[28].length == 1 )
		{// �����T�C�Y1�̎�&nbsp;��t��
			strHTML = strHTML + "<td class='txt14'>&nbsp;"+strTempArray[28]+"</td>";
		}
		else
		{
			strHTML = strHTML + "<td class='txt14'>"+strTempArray[28]+"</td>";
		}
		//2�A��(%)
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[31] , 3 )+"</td>";
		//����ST
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[29] , 1 )+"</td>";
		//����ST����
		strHTML = strHTML + "<td class='txt14'>"+funDecimalAlign( strTempArray[30] , 2 )+"</td>";
		strHTML = strHTML + "</tr>";
		strHTML = strHTML + "<tr>";
		strHTML = strHTML + "<td class='gray'>2�R�[�X</td>";
		// �i����
		if( strTempArray[32].length == 1 )
		{// �����T�C�Y1�̎�&nbsp;��t��
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
		strHTML = strHTML + "<td class='gray'>3�R�[�X</td>";
		// �i����
		if( strTempArray[36].length == 1 )
		{// �����T�C�Y1�̎�&nbsp;��t��
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
		strHTML = strHTML + "<td class='gray'>4�R�[�X</td>";
		// �i����
		if( strTempArray[40].length == 1 )
		{// �����T�C�Y1�̎�&nbsp;��t��
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
		strHTML = strHTML + "<td class='gray'>5�R�[�X</td>";
		// �i����
		if( strTempArray[44].length == 1 )
		{// �����T�C�Y1�̎�&nbsp;��t��
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
		strHTML = strHTML + "<td class='gray'>6�R�[�X</td>";
		// �i����
		if( strTempArray[48].length == 1 )
		{// �����T�C�Y1�̎�&nbsp;��t��
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
//alert("1�R�[�XST�^�C�~���O="+ strTempArray[29]);


		funGetElement("divDisplay").innerHTML = strHTML;
	}



	function funDecimalAlign( strArgData , intArgMode )
	{
		// ���ϐ��錾
		var intMode = "";
		var strData = "";

		// ������ϐ��Ɋi�[
		intMode = intArgMode;
		strData = strArgData;

		if( strArgData != "" && intArgMode != "")
		{

			if( intMode == 1 )
			{// �����[�h��1�̎��i�����_�ȉ����ʂ܂ŕ\������i0.00�j�j

				if( strData.indexOf( "." ) > 0 )
				{// �����̎�

					if( strData.length == 3 )
					{// strData�̕����񒷂�3�i�O�D�P�Ȃǁj�̎�
						strData = strData + "0";
					}
				}
				else
				{// �����̎�
					// ����������
					strData = strData + ".00";
				}
			}
			else if( intMode == 2 )
			{// �����[�h��1�̎��i�����_�ȉ����ʂ܂ŕ\������i0.0�j�j

				if( strData.indexOf( "." )  > 0 )
				{// �����̎�
				}
				else
				{// �����̎�
					// ����������
					strData = strData + ".0";
				}
			}
			else if( intMode == 3 )
			{// �����[�h��2�̎�2�A���̎��i�����_�ȉ����ʂ܂ŕ\������i0.0�j�j

				if( strData.indexOf( "." ) > 0 )
				{// �����̎�
					if( strData.length == 3 )
					{// ������3�̎��i3.1�Ȃǁj
						// �s�𑵂��邽�߂ɁA&nbsp;�t��
						strData = "&nbsp;&nbsp;" + strData;
					}
				}
				else
				{// �����̎�
					// ����������
					strData = strData + ".0";

					if( strData.length == 3 )
					{// ������3�̎��i3.1�Ȃǁj
						// �s�𑵂��邽�߂ɁA&nbsp;�t��
						strData = "&nbsp;&nbsp;" + strData;
					}
				}
			}

			// �߂�lstrData
			return strData;
		}
		else
		{// �������擾�o���Ȃ������ꍇ
			// �߂�l�Ȃ���
			return "";
		}
	}
	//�t���K�i���p���S�p�ϊ�
	function funcStringChange(str1){
		var str = str1			//�t�H�[����ϐ��ɓW�J
			//�����������ϊ����邽�߂̕ϊ�������z��
		var Kana1 = new Array("��","��","��","��","��","��","��","��","��","��","��","��",
			"��","��","��","��","��","��","��","��","��","��","��","��","��","�","�",
			"�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�",
			"�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�",
			"�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�"," ");
		var Kana2 = new Array("�K","�M","�O","�Q","�S","�U","�W","�Y","�[","�]","�_","�a",
			"�d","�f","�h","�o","�r","�u","�x","�{","�p","�s","�v","�y","�|","��","�@",
			"�B","�D","�F","�H","��","��","��","�b","�[","�A","�C","�E","�G","�I","�J",
			"�L","�N","�P","�R","�T","�V","�X","�Z","�\","�^","�`","�c","�e","�g","�i",
			"�j","�k","�l","�m","�n","�q","�t","�w","�z","�}","�~","��","��","��","��",
			"��","��","��","��","��","��","��","��","��","�@");
		while(str.match(/[�-�]/)){                              //���p�J�^�J�i������ꍇ
			for(var i = 0; i < Kana1.length; i++){
				str = str.replace(Kana1[i], Kana2[i]);  //������u��
			}
		}
		return str;			//return
	}

