<!DOCTYPE html>
<html>
<head>
<title>Geocoding Using Google Maps Javascript API</title>
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
<input type="text" placeholder="Address" id="address">
<button onclick="geocodeAddress();">Geocode Address</button>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyCj4_2iHHOnFNhNMoSSJzNRt2mVBPBnc">
</script>
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


//create a geocode object to use the geocode method
var geocode = new google.maps.Geocode();

//create geocode function
function geocodeAddress(){
    geocode.geocode({'address': document.getElementById("address").value}, function(results, status){
        if(status == google.maps.GeocoderStatus.OK){
            console.log(results);
            window.alert("Address Coordinates: " + results[0].geometry.location);
            map.setCenter(results[0].geometry.location);
            //set marker
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
        }else{
            window.alert("Geocode not successful: " + status);
        }
    });
}
</script>
</body>

</html>