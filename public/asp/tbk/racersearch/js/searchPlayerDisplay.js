	// ���I��f�[�^�ڍ�
	function funSensyuShow( ArgData )
	{// �z��̉��Ԗڂ̗v�f���������ɂ��ď�������

		var strTempArray;
		var strHTML = "";

		// 1�I��f�[�^���u:::�v��؂�Ŕz��strTempArray�Ɋi�[
		strTempArray = arraySensyuData[ ArgData ].split(':::');

		// HTML�i�[
		strHTML = strHTML + "<div align='center'>";
		strHTML = strHTML + " <!--�����������^�C�g������������-->";
		strHTML = strHTML + " <a name='aaa'></a> <img src='images/seiseki.gif' ALT='�I��l����' width='110' height='90' BORDER='0' USEMAP='#Map'>";
		strHTML = strHTML + " <map name='Map'>";
		strHTML = strHTML + "   <area shape='rect' coords='30,51,80,68' href='JavaScript:history.back();'>";
//		strHTML = strHTML + "   <area shape='rect' coords='30,51,80,68' href='JavaScript:funBackTo();'>";
		strHTML = strHTML + " </map>";
		strHTML = strHTML + "</div>";
		strHTML = strHTML + "<div align='center'>";
		strHTML = strHTML + " <br>";
		strHTML = strHTML + " <!--�����������{������������-->";
		strHTML = strHTML + " <table border='0' width='550'>";
		strHTML = strHTML + "  <tr><td valign='top'>";

		// ��
		strHTML = strHTML + "   <font class='big'>" + strTempArray[1] + "��</font><br>";
		strHTML = strHTML + "   <font class='text'>";
		// ����
		strHTML = strHTML + "��" + strTempArray[2] + "�N";

		if( strTempArray[3] == "1" )
		{// ����1�̎��O��
			strHTML = strHTML + "�O��<br>";
		}
		else
		{
			strHTML = strHTML + "���<br>";
		}

		// �o�^�ԍ�
		strHTML = strHTML + "���o�^�ԍ��^" + strTempArray[4] + "<br>";
		// ��
		strHTML = strHTML + "   <font class='big'>��"+strTempArray[5]+"</font>�^"+strTempArray[6]+","+strTempArray[7]+","+strTempArray[8]+" ";
		strHTML = strHTML + "   </font>";
		strHTML = strHTML + "   <hr width='100%'>";
		// ���O
		strHTML = strHTML + "   <font color='#101C5A' class='big'>"+strTempArray[9]+"�@</font>";
		// �i�}�G
		strHTML = strHTML + "   <font class='text'>�@"+strTempArray[10]+"";
		strHTML = strHTML + "   <br>";
		strHTML = strHTML + "   <br>";
		// �o�g�A���t�^
		strHTML = strHTML + "��"+strTempArray[0]+" ��"+strTempArray[11]+"�^<br>";
		// �a�����A�N��A�g���A�̏d
		strHTML = strHTML + "��"+strTempArray[12]+"."+strTempArray[13]+"."+strTempArray[14]+"."+strTempArray[15]+"���i"+strTempArray[16]+"�j��"+strTempArray[17]+"cm�@��"+strTempArray[18]+"Kg ";
		strHTML = strHTML + "  </font>";
		strHTML = strHTML + " </td><td>";
		// �ʐ^
		strHTML = strHTML + "  <img src='/asp/tbk/racersearch/Image_k/" + strTempArray[4] + ".jpg' hspace='30'>";
		strHTML = strHTML + " </td></tr></table>";
		strHTML = strHTML + " <hr width='550' align='center' size='3'>";
		strHTML = strHTML + " <p></p>";
		strHTML = strHTML + " <table cellspacing='2' cellpadding='2' width='460' height='60' bgcolor='#FFFFFF'>";
		strHTML = strHTML + "  <tr align='center'>";
		strHTML = strHTML + "   <td align='center' bgcolor='#FF99CC'>";
		strHTML = strHTML + "    <font class='text'>����</font></td>";
		strHTML = strHTML + "   <td bgcolor='#FF99CC'><font class='text'>2�A��(%)</font></td>";
		strHTML = strHTML + "   <td bgcolor='#FF99CC'><font class='text'>1����</font></td>";
		strHTML = strHTML + "   <td bgcolor='#FF99CC'><font class='text'>2����</font></td>";
		strHTML = strHTML + "   <td bgcolor='#FF99CC'><font class='text'>�o����</font></td>";
		strHTML = strHTML + "   <td bgcolor='#CCFF33'><font class='text'>�D�o��</font></td>";
		strHTML = strHTML + "   <td bgcolor='#CCFF33'><font class='text'>�D����</font></td>";
		strHTML = strHTML + "  </tr>";
		strHTML = strHTML + "  <tr align='center'> ";
		// ����
		strHTML = strHTML + "   <td align='center'>"+funDecimalAlign( strTempArray[19] , 1 )+"</td>";
		// 2�A��
		strHTML = strHTML + "   <td>"+funDecimalAlign( strTempArray[20] , 2 )+"</td>";
		// 1����
		strHTML = strHTML + "   <td>"+strTempArray[21]+"</td>";
		// 2����
		strHTML = strHTML + "   <td>"+strTempArray[22]+"</td>";
		// �o����
		strHTML = strHTML + "   <td>"+strTempArray[23]+"</td>";
		// �D�o��
		strHTML = strHTML + "   <td>"+strTempArray[24]+"</td>";
		// �D����
		strHTML = strHTML + "   <td>"+strTempArray[25]+"</td>";
		strHTML = strHTML + "  </tr>";
		strHTML = strHTML + "  <tr align='center'>";
		strHTML = strHTML + "   <td bgcolor='#FFCC00'><font class='text'>����ST.</font></td>";
		strHTML = strHTML + "   <td bgcolor='#FFCC00'><font class='text'>�\�͎w��</font></td>";
		strHTML = strHTML + "   <td>&nbsp;</td>";
		strHTML = strHTML + "   <td>&nbsp;</td>";
		strHTML = strHTML + "   <td>&nbsp;</td>";
		strHTML = strHTML + "   <td>&nbsp;</td>";
		strHTML = strHTML + "   <td>&nbsp;</td>";
		strHTML = strHTML + "  </tr>";
		strHTML = strHTML + "  <tr align='center'>";
		// ����ST.
		strHTML = strHTML + "   <td>"+funDecimalAlign( strTempArray[26] , 1 )+"</td>";
		// �\�͎w��
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
		strHTML = strHTML + "    <font color='#000000' class='text'>�i����</font></td>";
		strHTML = strHTML + "   <td bgcolor='#FFFF00'>";
		strHTML = strHTML + "    <font color='#000000' class='text'>����ST�^�C�~���O</font></td>";
		strHTML = strHTML + "   <td bgcolor='#FFFF00'>";
		strHTML = strHTML + "    <font color='#000000' class='text'>���σX�^�[�g����</font></td>";
		strHTML = strHTML + "   <td bgcolor='#FFFF00'>";
		strHTML = strHTML + "    <p><font color='#000000' class='text'>2�A��(%)</font></p>";
		strHTML = strHTML + "   </td>";
		strHTML = strHTML + "  </tr>";
	// ��1�R�[�X
		strHTML = strHTML + "  <tr align='center'> ";
		strHTML = strHTML + "   <td align='center' bgcolor='#999999'>";
		strHTML = strHTML + "    <font color='#FFFFFF' class='text'>1�R�[�X</font></td>";
		// �i����
		if( strTempArray[28].length == 1 )
		{// �����T�C�Y1�̎�&nbsp;��t��
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>&nbsp;"+strTempArray[28]+"</td>";
		}
		else
		{
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+strTempArray[28]+"</td>";
		}
		// ����ST�^�C�~���O
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[29] , 1 )+"</td>";
		// ���σX�^�[�g����
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[30] , 2 )+"</td>";
		// 2�A��
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[31] , 3 )+"</td>";
		strHTML = strHTML + "  </tr>";
	// ��2�R�[�X
		strHTML = strHTML + "  <tr align='center'> ";
		strHTML = strHTML + "   <td align='center' bgcolor='#999999'>";
		strHTML = strHTML + "    <font color='#FFFFFF' class='text'>2�R�[�X</font></td>";
		// �i����
		if( strTempArray[32].length == 1 )
		{// �����T�C�Y1�̎�&nbsp;��t��
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>&nbsp;"+strTempArray[32]+"</td>";
		}
		else
		{
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+strTempArray[32]+"</td>";
		}
		// ����ST�^�C�~���O
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[33] , 1 )+"</td>";
		// ���σX�^�[�g����
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[34] , 2 )+"</td>";
		// 2�A��
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[35] , 3 )+"</td>";
		strHTML = strHTML + "  </tr>";
	// ��3�R�[�X
		strHTML = strHTML + "  <tr align='center'> ";
		strHTML = strHTML + "   <td align='center' bgcolor='#999999'>";
		strHTML = strHTML + "    <font color='#FFFFFF' class='text'>3�R�[�X</font></td>";
		// �i����
		if( strTempArray[36].length == 1 )
		{// �����T�C�Y1�̎�&nbsp;��t��
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>&nbsp;"+strTempArray[36]+"</td>";
		}
		else
		{
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+strTempArray[36]+"</td>";
		}
		// ����ST�^�C�~���O
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[37] , 1 )+"</td>";
		// ���σX�^�[�g����
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[38] , 2 )+"</td>";
		// 2�A��
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[39] , 3 )+"</td>";
		strHTML = strHTML + "  </tr>";
	// ��4�R�[�X
		strHTML = strHTML + "  <tr align='center'> ";
		strHTML = strHTML + "   <td align='center' bgcolor='#999999'>";
		strHTML = strHTML + "    <font color='#FFFFFF' class='text'>4�R�[�X</font></td>";
		// �i����
		if( strTempArray[40].length == 1 )
		{// �����T�C�Y1�̎�&nbsp;��t��
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>&nbsp;"+strTempArray[40]+"</td>";
		}
		else
		{
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+strTempArray[40]+"</td>";
		}
		// ����ST�^�C�~���O
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[41] , 1 )+"</td>";
		// ���σX�^�[�g����
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[42] , 2 )+"</td>";
		// 2�A��
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[43] , 3 )+"</td>";
		strHTML = strHTML + "  </tr>";
	// ��5�R�[�X
		strHTML = strHTML + "  <tr align='center'>";
		strHTML = strHTML + "   <td align='center' bgcolor='#999999'>";
		strHTML = strHTML + "    <font color='#FFFFFF' class='text'>5�R�[�X</font></td>";
		// �i����
		if( strTempArray[44].length == 1 )
		{// �����T�C�Y1�̎�&nbsp;��t��
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>&nbsp;"+strTempArray[44]+"</td>";
		}
		else
		{
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+strTempArray[44]+"</td>";
		}
		// ����ST�^�C�~���O
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[45] , 1 )+"</td>";
		// ���σX�^�[�g����
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[46] , 2 )+"</td>";
		// 2�A��
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[47] , 3 )+"</td>";
		strHTML = strHTML + "  </tr>";
	// ��6�R�[�X
		strHTML = strHTML + "  <tr align='center'> ";
		strHTML = strHTML + "   <td align='center' bgcolor='#999999'>";
		strHTML = strHTML + "    <font color='#FFFFFF' class='text'>6�R�[�X</font></td>";
		// �i����
		if( strTempArray[48].length == 1 )
		{// �����T�C�Y1�̎�&nbsp;��t��
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>&nbsp;"+strTempArray[48]+"</td>";
		}
		else
		{
			strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+strTempArray[48]+"</td>";
		}
		// ����ST�^�C�~���O
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[49] , 1 )+"</td>";
		// ���σX�^�[�g����
		strHTML = strHTML + "   <td bgcolor='#FFFFFF'>"+funDecimalAlign( strTempArray[50] , 2 )+"</td>";
		// 2�A��
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

//alert("����");
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
