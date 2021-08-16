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
  
  map = new google.maps.Map(document.getElementById('bus_map_canvas'), myOptions);

  
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
  var markerImg = 'images/map_bus_icon.png';
  
  //�@�o�X����
  var marker = new google.maps.Marker({
	position: new google.maps.LatLng(34.716572, 136.499771),
	title:"�o�X����",
	map: map,
	icon: markerImg,
	zIndex: 8,
	animation: google.maps.Animation.DROP
  });

 

}
