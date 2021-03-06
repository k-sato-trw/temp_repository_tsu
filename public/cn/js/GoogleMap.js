var map;

function initialize() {

  var initPos = new google.maps.LatLng(latP, lngP);
  
  var myOptions = {
    zoom: zoomP,
    center: initPos,
    mapTypeControlOptions: { mapTypeIds: ['styledMap', google.maps.MapTypeId.ROADMAP] }, //�\���^�C�v�̎w��
    zoomControl: true, //�Y�[���{�^���\��
	streetViewControl: true, //�X�g���[�g�r���[��\��
    zoomControlOptions: {
    style: google.maps.ZoomControlStyle.SMALL
    },
  };
  
  map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);

  
  /*�擾�X�^�C���̓\��t��*/
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


  //�@�I���W�i���摜�̃}�[�J�[�ǂݍ���
  var markerImg = 'images/map_icon_tsu.png';
  var markerImg_soto = 'images/map_icon_soto.png';
  var markerImg_parking1 = 'images/map_icon_p1.png';
  var markerImg_parking2 = 'images/map_icon_p2.png';
  var markerImg_parking3 = 'images/map_icon_p3.png';
  var markerImg_parking4 = 'images/map_icon_p4.png';
  var markerImg_parking5 = 'images/map_icon_p5.png';
  
  
  //�@�{�[�g���[�X��
  var marker = new google.maps.Marker({
	position: new google.maps.LatLng(34.681772, 136.522048),
	title:"�{�[�g���[�X��",
	map: map,
	icon: markerImg,
	zIndex: 8,
	animation: google.maps.Animation.DROP
  });

  //�@�ÃC���N��
  var markerImg_soto = new google.maps.Marker({
	position: new google.maps.LatLng(34.681222, 136.518748),
	title:"�ÃC���N��",
	map: map,
	icon: markerImg_soto,
	zIndex: 7,
	animation: google.maps.Animation.DROP
  });

  //�@��������1���ԏꁥ����
  var markerImg_parking1 = new google.maps.Marker({
	position: new google.maps.LatLng(34.682917, 136.522698),
	title:"��1���ԏ�",
	map: map,
	icon: markerImg_parking1,
	zIndex: 6,
	animation: google.maps.Animation.DROP
  });
  
  //�@��������2���ԏꁥ����
  var markerImg_parking2 = new google.maps.Marker({
	position: new google.maps.LatLng(34.682912, 136.521756),
	title:"���ԏ�",
	map: map,
	icon: markerImg_parking2,
	zIndex: 5,
	animation: google.maps.Animation.DROP
  });
  
  //�@��������3���ԏꁥ����
  var markerImg_parking3 = new google.maps.Marker({
	position: new google.maps.LatLng(34.682385, 136.520674),
	title:"���֏�",
	map: map,
	icon: markerImg_parking3,
	zIndex: 4,
	animation: google.maps.Animation.DROP
  });
  
  //�@��������4���ԏꁥ����
  var markerImg_parking4 = new google.maps.Marker({
	position: new google.maps.LatLng(34.683456, 136.521135),
	title:"���֏�",
	map: map,
	icon: markerImg_parking4,
	zIndex: 1,
	animation: google.maps.Animation.DROP
  });

  //�@��������5���ԏꁥ����
  var markerImg_parking5 = new google.maps.Marker({
	position: new google.maps.LatLng(34.683164, 136.520180),
	title:"���֏�",
	map: map,
	icon: markerImg_parking5,
	zIndex: 2,
	animation: google.maps.Animation.DROP
  });
 

}
