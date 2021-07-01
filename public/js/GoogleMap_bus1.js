//*Google Maps BR��*//

var currentInfoWindow = null;	//�Ō�ɊJ�������E�B���h�E���L��


function initialize() {
  var latlng = new google.maps.LatLng(34.733534,136.512158);
  var myOptions = {
    zoom: 16,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoomControl: true,			//�Y�[���{�^���\��
	streetViewControl: false, //�X�g���[�g�r���[��\��
    zoomControlOptions: {
    style: google.maps.ZoomControlStyle.SMALL
    }
  };
  var map = new google.maps.Map(document.getElementById('bus_map_canvas'), myOptions);



  //�@�I���W�i���摜�̃}�[�J�[�ǂݍ���
  var markerImg = '/05access/images/map_bus_icon.png';

//�@�o�X����
  var marker = new google.maps.Marker({
	position: new google.maps.LatLng(34.733234, 136.512158),
	title:"�o�X����",
	map: map,
	icon: markerImg,
	zIndex: 8,
	animation: google.maps.Animation.DROP
  });

}

google.maps.event.addDomListener(window, 'load', initialize);