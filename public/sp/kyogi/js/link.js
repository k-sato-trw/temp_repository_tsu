
function GetFileName(file_url){
	file_url = file_url.substring(file_url.lastIndexOf("/")+1,file_url.length)
	//�g���q����菜���ꍇ�͎��̍s�̃R�����g�A�E�g���͂����Ă�������
	//file_url = file_url.substring(0,file_url.indexOf("?"));
	return file_url;
}

