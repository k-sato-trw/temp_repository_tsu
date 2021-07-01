//*Google Maps BR津*//

var currentInfoWindow = null;	//最後に開いた情報ウィンドウを記憶


function initialize() {
  var latlng = new google.maps.LatLng(34.682269,136.522019);
  var myOptions = {
    zoom: 17,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoomControl: true,			//ズームボタン表示
	streetViewControl: false, //ストリートビュー非表示
    zoomControlOptions: {
    style: google.maps.ZoomControlStyle.SMALL
    }
  };
  var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);



  //　オリジナル画像のマーカー読み込み
  var markerImg = '/05access/images/map_icon_tsu.png';
  var markerImg_soto = '/05access/images/map_icon_soto.png';
  var markerImg_parking1 = 'images/map_icon_p1.png';
  var markerImg_parking2 = 'images/map_icon_p2.png';
  var markerImg_parking3 = 'images/map_icon_p3.png';
  var markerImg_parking4 = 'images/map_icon_p4.png';
  var markerImg_parking5 = 'images/map_icon_p5.png';

  //　オリジナル画像マーカーの表示
	
//　ボートレース津
  var marker = new google.maps.Marker({
	position: new google.maps.LatLng(34.681772, 136.522048),
	title:"ボートレース津",
	map: map,
	icon: markerImg,
	zIndex: 8,
	animation: google.maps.Animation.DROP
  });

  //　津インクル
  var markerImg_soto = new google.maps.Marker({
	position: new google.maps.LatLng(34.681222, 136.518748),
	title:"津インクル",
	map: map,
	icon: markerImg_soto,
	zIndex: 7,
	animation: google.maps.Animation.DROP
  });

  //　▼▼▼第1駐車場▼▼▼
  var markerImg_parking1 = new google.maps.Marker({
	position: new google.maps.LatLng(34.682917, 136.522698),
	title:"第1駐車場",
	map: map,
	icon: markerImg_parking1,
	zIndex: 6,
	animation: google.maps.Animation.DROP
  });
  
  //　▼▼▼第2駐車場▼▼▼
  var markerImg_parking2 = new google.maps.Marker({
	position: new google.maps.LatLng(34.682912, 136.521756),
	title:"駐車場",
	map: map,
	icon: markerImg_parking2,
	zIndex: 5,
	animation: google.maps.Animation.DROP
  });
  
  //　▼▼▼第3駐車場▼▼▼
  var markerImg_parking3 = new google.maps.Marker({
	position: new google.maps.LatLng(34.682385, 136.520674),
	title:"駐輪場",
	map: map,
	icon: markerImg_parking3,
	zIndex: 4,
	animation: google.maps.Animation.DROP
  });
  
  //　▼▼▼第4駐車場▼▼▼
  var markerImg_parking4 = new google.maps.Marker({
	position: new google.maps.LatLng(34.683456, 136.521135),
	title:"駐輪場",
	map: map,
	icon: markerImg_parking4,
	zIndex: 1,
	animation: google.maps.Animation.DROP
  });

  //　▼▼▼第5駐車場▼▼▼
  var markerImg_parking5 = new google.maps.Marker({
	position: new google.maps.LatLng(34.683164, 136.520180),
	title:"駐輪場",
	map: map,
	icon: markerImg_parking5,
	zIndex: 2,
	animation: google.maps.Animation.DROP
  });

}

google.maps.event.addDomListener(window, 'load', initialize);