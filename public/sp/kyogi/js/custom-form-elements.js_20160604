/*

CUSTOM FORM ELEMENTS

Created by Ryan Fait
www.ryanfait.com

The only things you may need to change in this file are the following
variables: checkboxHeight, radioHeight and selectWidth (lines 24, 25, 26)

The numbers you set for checkboxHeight and radioHeight should be one quarter
of the total height of the image want to use for checkboxes and radio
buttons. Both images should contain the four stages of both inputs stacked
on top of each other in this order: unchecked, unchecked-clicked, checked,
checked-clicked.

You may need to adjust your images a bit if there is a slight vertical
movement during the different stages of the button activation.

The value of selectWidth should be the width of your select list image.

Visit http://ryanfait.com/ for more information.

*/

var checkboxHeight = "25";
var radioHeight = "25";
var selectWidth = "160";
var selectHeight = "80";


/* No need to change anything after this */


document.write('<style type="text/css">input.styled { display: none; } select.styled { position: relative; width: ' + selectWidth + 'px; Height: ' + selectHeight + 'px; padding: 40px 0;  opacity: 0; filter: alpha(opacity=0); z-index: 5; } .disabled { opacity: 0.5; filter: alpha(opacity=50); }</style>');

document.write('<style type="text/css">input.styled2 { display: none; } select.styled2 { position: relative; width: ' + selectWidth + 'px; Height: ' + selectHeight + 'px; padding: 40px 0;  opacity: 0; filter: alpha(opacity=0); z-index: 5; } .disabled { opacity: 0.5; filter: alpha(opacity=50); }</style>');


var Custom = {
	init: function() {

		// レース番号初期化
		funcDefaultSeledted();

		var inputs = document.getElementsByTagName("input"), span = Array(), textnode, option, active;

//		window.alert(inputs.length);

		inputs = document.getElementsByTagName("select");
		for(a = 0; a < inputs.length; a++) {

			//一つ目
			if(inputs[a].className == "styled") {
				option = inputs[a].getElementsByTagName("option");
				active = option[0].childNodes[0].nodeValue;
				textnode = document.createTextNode(active);
				for(b = 0; b < option.length; b++) {
					if(option[b].selected == true) {
						textnode = document.createTextNode(option[b].childNodes[0].nodeValue);
					}
				}
				span[a] = document.createElement("span");
				span[a].className = "select";
				span[a].id = "select" + inputs[a].name;
				span[a].appendChild(textnode);
				inputs[a].parentNode.insertBefore(span[a], inputs[a]);
				if(!inputs[a].getAttribute("disabled")) {
					inputs[a].onchange = Custom.choose;
				} else {
					inputs[a].previousSibling.className = inputs[a].previousSibling.className += " disabled";
				}
			}
		}

		document.onmouseup = Custom.clear;
	},
	pushed: function() {
		element = this.nextSibling;
		if(element.checked == true && element.type == "checkbox") {
			this.style.backgroundPosition = "0 -" + checkboxHeight*3 + "px";
		} else if(element.checked == true && element.type == "radio") {
			this.style.backgroundPosition = "0 -" + radioHeight*3 + "px";
		} else if(element.checked != true && element.type == "checkbox") {
			this.style.backgroundPosition = "0 -" + checkboxHeight + "px";
		} else {
			this.style.backgroundPosition = "0 -" + radioHeight + "px";
		}
	},
	check: function() {
		element = this.nextSibling;
		if(element.checked == true && element.type == "checkbox") {
			this.style.backgroundPosition = "0 0";
			element.checked = false;
		} else {
			if(element.type == "checkbox") {
				this.style.backgroundPosition = "0 -" + checkboxHeight*2 + "px";
			} else {
				this.style.backgroundPosition = "0 -" + radioHeight*2 + "px";
				group = this.nextSibling.name;
				inputs = document.getElementsByTagName("input");
				for(a = 0; a < inputs.length; a++) {
					if(inputs[a].name == group && inputs[a] != this.nextSibling) {
						inputs[a].previousSibling.style.backgroundPosition = "0 0";
					}
				}
			}
			element.checked = true;
		}
	},
	clear: function() {
/*
		inputs = document.getElementsByTagName("input");
		for(var b = 0; b < inputs.length; b++) {
			if(inputs[b].type == "checkbox" && inputs[b].checked == true && inputs[b].className == "styled") {
				inputs[b].previousSibling.style.backgroundPosition = "0 -" + checkboxHeight*2 + "px";
			} else if(inputs[b].type == "checkbox" && inputs[b].className == "styled") {
				inputs[b].previousSibling.style.backgroundPosition = "0 0";
			} else if(inputs[b].type == "radio" && inputs[b].checked == true && inputs[b].className == "styled") {
				inputs[b].previousSibling.style.backgroundPosition = "0 -" + radioHeight*2 + "px";
			} else if(inputs[b].type == "radio" && inputs[b].className == "styled") {
				inputs[b].previousSibling.style.backgroundPosition = "0 0";
			}
		}
*/
	},
	choose: function() {
	//セレクトボックス変更されたときここにくる

		var intracenum;
		var URL;
		var intracenum2;

		option = this.getElementsByTagName("option");
		for(d = 0; d < option.length; d++) {
			if(option[d].selected == true) {

				//変更されたセレクトボックスの値を取得
				intRacenum = (option[d].childNodes[0].nodeValue).replace("R", "");

				//ページ取得
				URL2 = GetFileName(document.location.href);

				//後ろ2文字消す
				URL = URL2.slice(0,URL2.length-2);

				//ページ調査。
				if ( URL.indexOf("kekka.asp") >= 0 ){
				//結果をひらいていた。

					//結果がでているレース番号取得
					intracenum2 = funckekkanum();

					//変更されたセレクトボックスの値と結果がでているレース番号比較
					if(intRacenum > intracenum2){
					//遷移先をオッズにする
						URL = URL.replace("kekka.asp", "odds.asp");  
					}

				

				}else if ( URL.indexOf("odds.asp") >= 0 ){
				//オッズをひらいていた。

					//結果がでているレース番号取得
					intracenum2 = funckekkanum();

					//変更されたセレクトボックスの値と結果がでているレース番号比較
					if(intRacenum <= intracenum2){
					//遷移先を結果にする
						URL = URL.replace("odds.asp", "kekka.asp");
					}

				}

				//レース番号引数調整
				if(URL.slice(-1) == "=")
				{
					URL = URL + intRacenum;
				}else{
					URL = URL + "=" + intRacenum;
				}

				//ページ遷移
				document.location.href = URL;



			}
		}
	}
}
window.onload = Custom.init;
