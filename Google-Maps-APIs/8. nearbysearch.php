<!DOCTYPE html>
<html>
<head>
<title>Nearby Search</title>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyCj4_2iHHOnFNhNMoSSJzNRt2mVBPBnc&libraries=places"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

//set map options
var myLatLng = {lat: 51.5, lng: -0.1};
var mapOptions = {
    center: myLatLng,
    zoom: 15,
    mapTypeId: google.maps.MapTypeId.ROADMAP

};

//create map
var map = new google.maps.Map(document.getElementById('map'), mapOptions);

//create infowindow
var infowindow = new google.maps.InfoWindow();

//define a request
var location = new google.maps.LatLng(1.5, -0.1);
var request = {
    location: london,
    radius: '500',
    types: ['store']
}

//create a placesService object before using the nearbysearch method
var service = new google.maps.places.PlacesService(map);

service.nearbySearch(request, callback);

//define the callback function which shows what we do with the results

function callback(result, status){
    if(status == google.maps.places.PlacesServicestatus.OK){
        console.log(result);
        for(i = 0; i<result.length; i++){
            addMarker(result[i])
        }
    }
}

//add a marker for each place in the result array
function addMarker(place){
    var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location,
        animation: google.maps.Animation.DROP
    });
    //add listener
    google.maps.event.addListener(marker, "click", function(){
        infowindow.setContent(place.name);
        infowindow.open(map, this);
    })
}
</script>
</body>

</html>