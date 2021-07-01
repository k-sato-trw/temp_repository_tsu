//*Google Maps BR津*//

var currentInfoWindow = null;	//最後に開いた情報ウィンドウを記憶


function initialize() {
  var latlng = new google.maps.LatLng(34.683582, 136.517915);
  var myOptions = {
    zoom: 16,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoomControl: true,			//ズームボタン表示
	streetViewControl: false, //ストリートビュー非表示
    zoomControlOptions: {
    style: google.maps.ZoomControlStyle.SMALL
    }
  };
  var map = new google.maps.Map(document.getElementById('bus_map_canvas'), myOptions);



  //　オリジナル画像のマーカー読み込み
  var markerImg = '/05access/images/map_bus_icon.png';

//　バス乗り場
  var marker = new google.maps.Marker({
	position: new google.maps.LatLng(34.683582, 136.517915),
	title:"バス降り場",
	map: map,
	icon: markerImg,
	zIndex: 8,
	animation: google.maps.Animation.DROP
  });

}

google.maps.event.addDomListener(window, 'load', initialize);
