	function funGetElement( ArgID )
	{// DOM��Ԃ�
		var strElement = null;

		if (document.getElementById)
		{
			strElement = document.getElementById( ArgID );
		}
		else if (document.all)
		{
			strElement = document.all( ArgID );
		}
		else if (document.layers)
		{
			strElement = document.layers[ ArgID ];
		}
		
		return strElement;
	}