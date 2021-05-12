<!DOCTYPE html>
<html>
<head>
<title>Autocomplete</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<style>
html, body{
    height:100%;   
}
#map{
    height:60%;   
}
</style>
</head>

<body>
<div id="map"></div>
<input type="text" id="cityInput" placeholder="City">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyCj4_2iHHOnFNhNMoSSJzNRt2mVBPBnc&libraries=places"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

//set map options
var myLatLng = {lat: 51.5, lng: -0.1};
var mapOptions = {
    center: myLatLng,
    zoom: 7,
    mapTypeId: google.maps.MapTypeId.ROADMAP

};

//create map
var map = new google.maps.Map(document.getElementById('map'), mapOptions);

//create autocomplete object
var input = document.getElementById("cityInut");
var options = {
    types: ['(cities)']
}
var autocomplete = new google.maps.places.Autocomplete(input, options);

autocomplete.addListener('place_changed', onPlaceChabged);
function onPlaceChanged(){
    var place = autocomplete.getPlace();
    map.panTo(place.geometry.location);
}
</script>
</body>

</html>