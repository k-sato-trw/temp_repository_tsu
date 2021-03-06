//*Google Maps BRÃ*//

var currentInfoWindow = null;	//ÅãÉJ¢½îñEBhEðL¯


function initialize() {
  var latlng = new google.maps.LatLng(34.682269,136.522019);
  var myOptions = {
    zoom: 17,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoomControl: true,			//Y[{^\¦
	streetViewControl: false, //Xg[gr[ñ\¦
    zoomControlOptions: {
    style: google.maps.ZoomControlStyle.SMALL
    }
  };
  var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);



  //@IWiæÌ}[J[ÇÝÝ
  var markerImg = '/05access/images/map_icon_tsu.png';
  var markerImg_soto = '/05access/images/map_icon_soto.png';
  var markerImg_parking1 = 'images/map_icon_p1.png';
  var markerImg_parking2 = 'images/map_icon_p2.png';
  var markerImg_parking3 = 'images/map_icon_p3.png';
  var markerImg_parking4 = 'images/map_icon_p4.png';
  var markerImg_parking5 = 'images/map_icon_p5.png';

  //@IWiæ}[J[Ì\¦
	
//@{[g[XÃ
  var marker = new google.maps.Marker({
	position: new google.maps.LatLng(34.681772, 136.522048),
	title:"{[g[XÃ",
	map: map,
	icon: markerImg,
	zIndex: 8,
	animation: google.maps.Animation.DROP
  });

  //@ÃCN
  var markerImg_soto = new google.maps.Marker({
	position: new google.maps.LatLng(34.681222, 136.518748),
	title:"ÃCN",
	map: map,
	icon: markerImg_soto,
	zIndex: 7,
	animation: google.maps.Animation.DROP
  });

  //@¥¥¥æ1Ôê¥¥¥
  var markerImg_parking1 = new google.maps.Marker({
	position: new google.maps.LatLng(34.682917, 136.522698),
	title:"æ1Ôê",
	map: map,
	icon: markerImg_parking1,
	zIndex: 6,
	animation: google.maps.Animation.DROP
  });
  
  //@¥¥¥æ2Ôê¥¥¥
  var markerImg_parking2 = new google.maps.Marker({
	position: new google.maps.LatLng(34.682912, 136.521756),
	title:"Ôê",
	map: map,
	icon: markerImg_parking2,
	zIndex: 5,
	animation: google.maps.Animation.DROP
  });
  
  //@¥¥¥æ3Ôê¥¥¥
  var markerImg_parking3 = new google.maps.Marker({
	position: new google.maps.LatLng(34.682385, 136.520674),
	title:"Öê",
	map: map,
	icon: markerImg_parking3,
	zIndex: 4,
	animation: google.maps.Animation.DROP
  });
  
  //@¥¥¥æ4Ôê¥¥¥
  var markerImg_parking4 = new google.maps.Marker({
	position: new google.maps.LatLng(34.683456, 136.521135),
	title:"Öê",
	map: map,
	icon: markerImg_parking4,
	zIndex: 1,
	animation: google.maps.Animation.DROP
  });

  //@¥¥¥æ5Ôê¥¥¥
  var markerImg_parking5 = new google.maps.Marker({
	position: new google.maps.LatLng(34.683164, 136.520180),
	title:"Öê",
	map: map,
	icon: markerImg_parking5,
	zIndex: 2,
	animation: google.maps.Animation.DROP
  });

}

google.maps.event.addDomListener(window, 'load', initialize);