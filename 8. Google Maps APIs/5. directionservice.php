<!DOCTYPE html>
<html>
<head>
<title>Direction Service</title>
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
<button onclick="calcRoute();">Calculate Route</button>
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

//create a DirectionsService object to use the route method and get a result for our request
var directionsService = new google.maps.DirectionsService();


//create a DirectionsRenderer object which we will use to display the route
var directionsDisplay = new google.maps.DirectionsRenderer();


//bind the DirectionsRenderer to the map
directionsDisplay.setMap(map);


//define calcRoute function 
function calcRoutre(){
    var request = {
        origin: "New York",
        destination: "Toronto",
        travelMode: google.maps.TravelMode.DRIVING, //WALKING, BICYCLING, TRANSIT
        unitSystem: google.maps.UnitSystem.METRIC
    }

    //pass the request to the route method
    directionsService.route(request, function(result, status){
        if(status == google.maps.DirectionsService.OK){
            console.log(result);
            //get distance and time
            window.alert("The Travelling Distance is " + result.routes[0].legs[0].distance.text
            + " and The Travelling Time is " + result.routes[0].legs[0].duration.text + ".");

            //display route
            directionsDisplay.setDirections(result);
        }
    });

}

</script>
</body>

</html>