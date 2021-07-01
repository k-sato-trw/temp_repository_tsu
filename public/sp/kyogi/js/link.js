
function GetFileName(file_url){
	file_url = file_url.substring(file_url.lastIndexOf("/")+1,file_url.length)
	//拡張子も取り除く場合は次の行のコメントアウトをはずしてください
	//file_url = file_url.substring(0,file_url.indexOf("?"));
	return file_url;
}

