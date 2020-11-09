// JavaScript Document

 function initialize() {
  var myLatlng = new google.maps.LatLng(37.472607, 126.920575);
  var myOptions = {
   zoom: 15,
   center: myLatlng

  }
  var map = new google.maps.Map(document.getElementById("map_home"), myOptions);
 
  var marker = new google.maps.Marker({
   position: myLatlng, 
   map: map, 
   title:"(주)우리집"
  });   
  
 
  var infowindow = new google.maps.InfoWindow({
   content: "(주)우리집..서울시 관악구 난곡로 동원빌라"
  });
 
  infowindow.open(map,marker);
 }
 
 
 window.onload=function(){
  initialize();
 }

