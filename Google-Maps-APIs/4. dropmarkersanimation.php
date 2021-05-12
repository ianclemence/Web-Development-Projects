<!DOCTYPE html>
<html>
<head>
<title>Markers Animation</title>
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
<button onclick="showMarkers();">Show Existing Markers</button>
<button onclick="clearMarkers();">Hide Existing Markers</button>
<button onclick="deleteMarkers();">Delete Existing Markers</button>
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


//create marker1
var marker1Options = {
    position: myLatLng,
    map: map,
    title: "This is London",
    draggable: true,
    animation: google.maps.Animation.DROP //ANIMATION

}
var marker1 = new google.maps.Marker(marker1Options);

//create InfoWindow
var contentString = "<div>This is an InfoWindow</div>";
var infowindow = new google.maps.InfoWindow({
    content: contentString,
    maxWidth: 100
});

//add listener to the marker to show InfoWindow

marker1.addListener("click", function(){
    infowindow.open(map, marker1);
});





//create marker2
var marker2Options = {
    position: {lat:52.1337, lng: -0.4577},
    title: "This is Bedford."
}
var marker2 = new google.maps.Marker(marker2Options);
marker2.setAnimation(google.maps.Animation.BOUNCE);
marker2.setMap(map);

//remove markers
marker1.setMap(null);
marker2.setMap(null);

//create array where we store markers
var markers = [];
//create marker once we click on a point on the map
map.addListener("click", function(event){
    var markerOptions = {
        position: event.latLng,
//                map: map
}
var marker = new google.maps.Marker(markerOptions);
//store marker in array
markers.push(marker);
});

//show markers stored in the array
function showMarkers(){
    for(var i=0; i<markers.length; i++){
    addMarkerwithDelay(i);   
}
}

function addMarkerwithDelay(i){
setTimeout(function(){
    markers[i].setMap(map);
    markers[i].setAnimation(google.maps.Animation.DROP);
    
}, 200*i);   
}

//hide markers from the map (they are still in the array)
function clearMarkers(){
    for(var i=0; i<markers.length; i++){
    markers[i].setMap(null);   
}   
}

//delete markers from the array
function deleteMarkers(){
    clearMarkers();
    markers = [];
}
</script>
</body>

</html>