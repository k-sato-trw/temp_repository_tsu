// AndroidでFlashPLayerがインストールされているか判断するjavascript
// FlashPlayerCheck.js
//
// 使用方法<head></head>内に下記を指定する
// <script language="JavaScript" src="/asp/SmartAgentGetter.js"></script>


	function funcJsFlashPlayerCheck(){ 
		var flag  = { os : false, player: false }; 
		var userAgent = navigator.userAgent.match(/android (\d+\.\d+)/i); 

		if (!!userAgent && (userAgent[1] >= 2.2)) {
		//Android OSのバージョン判断
			//2.2以上のときOSフラグを立てる
		        flag.os = true; 
			//プラグイン情報を取得
		        var plugins = navigator.plugins;
			for (key in plugins) {
			//プラグインの数だけループ
				//プラグインを取得
				var description = (plugins[key]['description'] || '').match(/shockwave flash (\d+\.\d+)/i);
				if (!!description && (description[1] >= 10.1)) {
				//Flash Playerのバージョン判断(Android用Flash Playerは10.1以上のため処理に入ってこない場合は未インストールとして判断する)
					//入っている場合playerフラグを立てる
					flag.player = true;
				}
			}
		} 
		//フラグを返す
		return flag;
	}