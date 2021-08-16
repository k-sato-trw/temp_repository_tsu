var map;

function initialize() {

  var initPos = new google.maps.LatLng(latP, lngP);
  
  var myOptions = {
    zoom: zoomP,
    center: initPos,
    mapTypeControlOptions: { mapTypeIds: ['styledMap', google.maps.MapTypeId.ROADMAP] }, //表示タイプの指定
    zoomControl: true, //ズームボタン表示
	streetViewControl: true, //ストリートビュー非表示
    zoomControlOptions: {
    style: google.maps.ZoomControlStyle.SMALL
    },
  };
  
  map = new google.maps.Map(document.getElementById('bus_map_canvas'), myOptions);

  
  /*取得スタイルの貼り付け*/
  var styleOptions = [ 
  {
    "featureType": "landscape",
    "elementType": "geometry.fill",
    "stylers": [
      { "color": "#eeeeee" }
    ]
  },{
    "featureType": "poi",
    "elementType": "geometry.fill",
    "stylers": [
      { "color": "#dddddd" }
    ]
  }
  ];
  var styledMapOptions = { name: 'BOAT RACE TSU' }
  var sampleType = new google.maps.StyledMapType(styleOptions, styledMapOptions);
  map.mapTypes.set('styledMap', sampleType);
  map.setMapTypeId('styledMap');


  //　オリジナル画像のマーカー読み込み
  var markerImg = 'images/map_bus_icon.png';
  
  //　バス乗り場
  var marker = new google.maps.Marker({
	position: new google.maps.LatLng(34.716572, 136.499771),
	title:"バス乗り場",
	map: map,
	icon: markerImg,
	zIndex: 8,
	animation: google.maps.Animation.DROP
  });

 

}
