<!DOCTYPE html>
<html>
<head>
<title>Markers and Infowindows</title>
<meta name="viewport" content="initial-scale=1.0, user-scaable=no">
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyCj4_2iHHOnFNhNMoSSJzNRt2mVBPBnc">
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

//create marker 1
var marker1Options = {
    position: myLatLng,
    map: map,
    title: "This is London",
    draggable: true,
    animation: google.maps.Animation.DROP
}
var marker1 = new google.mas.Marker(marker1Options);


//create infowindow
var contentString = "<div>This is an InfoWindow</div>"
var infowindow = new google.maps.InfoWindow({
    content: contentString,
    maxwidth: 100
});


//add listener to the marker to show infowindow
marker1.addListener("click", function(){
    infowindow.open(map, marker1)
});


//create marker 2
var marker2Options = {
    position: {lat: 52.1337, lng: -0.4577},
    title: "Ths is Bedford"
}
var marker2 = new google.mas.Marker(marker2Options);
marker2.setAnimation(google.maps.Animation.BOUNCE);
marker2.setMap(map);
</script>
</body>

</html>