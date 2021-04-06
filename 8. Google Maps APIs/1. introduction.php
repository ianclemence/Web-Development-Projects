<!DOCTYPE html>
<html>
<head>
<title>Introduction To Google Maps Javascript API</title>
<meta name="viewport" content="initial-scale=1, user-scaable=no">
<meta charset="UTF-8">
</head>
<style>
html, body{
    height: 100%;
}
#map{
    height:300px;
}
</style>
<body>
<div id="map"></div>
<script src="https://maps.gogleapis.com/maps/api/js?key=AIzaSyAyCj4_2iHHOnFNhNMoSSJzNRt2mVBPBnc">
</script>

<script>
//set map options
var myLatLng = {lat: 51.5, lng: -0.1};
var mapOptions = {
    center: myLatLng,
    zoom: 7,
    mapTypeId: google.maps.MapTypeId.SATELLITE

};
//create map
var map = new google.maps.Map(document.getElementById('map'), mapOptions);

//setting the mapTypeId upon construction
map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
</script>
</body>

</html>