<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_pc.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS" />
<title>ボートレース津</title>
<script type="text/javascript">
	var intPage;
	//html版 引数取得javascript
	var intData = "";
	var arg = location.search; //引数を取得

	//URL を ? で分割
	var aSplit1 = arg.split("?");
	if( aSplit1.length > 1 ){
		//URL を &で分割
		var aSplit2 = aSplit1[1].split("&");
		var i;
		var iMax = aSplit2.length;

		// &で分割した物を = で分割
		for( i = 0; i< iMax; i++ ){
			if( i < 1 ){
				aSplit3 = aSplit2[i].split("=");
				intData += aSplit3[1];
			}
		}
	}
	if( intData !== "" ){
		if( intData === "1" ){
			intPage=1;
		}else if( intData === "2" ){
			intPage=2;
		}else if( intData === "3" ){
			intPage=3;
		}else if( intData === "4" ){
			intPage=4;
		}else if( intData === "5" ){
			intPage=5;
		}else{
			intPage=0;
		}
	}else{
		intPage=0;
	}

function func_onload(){
	if( intPage == 1 ){
		location.href = '/';
	}
	else if( intPage == 2 ){
		location.href = '/data_ifrm/s_pdf.htm';
	}
	else if( intPage == 3 ){
		location.href = '/data_ifrm/motor.htm';
	}
	else if( intPage == 4 ){
		location.href = '/data_ifrm/yosen.htm';
	}
	else if( intPage == 5 ){
		location.href = '/data_ifrm/setsu_kekka.htm';
	}
	else{
		location.href = '/';
	}
}
</script>
</head>
<body onload="func_onload();">
</body>
</html>
