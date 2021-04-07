//set map options
var myLatLng = {lat: 51.5, lng: -0.1};
var mapOptions = {
    center: myLatLng,
    zoom: 7,
    mapTypeId: google.maps.MapTypeId.ROADMAP

};

//create map
var map = new google.maps.Map(document.getElementById('googleMsap'), mapOptions);

//create a DirectionsService object to use the route method and get a result for our request
var directionsService = new google.maps.DirectionsService();


//create a DirectionsRenderer object which we will use to display the route
var directionsDisplay = new google.maps.DirectionsRenderer();


//bind the DirectionsRenderer to the map
directionsDisplay.setMap(map);



//define calcRoute functionn
function calcRoute(){
    //crete request
    var request = {
        origin: document.getElementById("from").value,
        destintion: document.getElementById("to").value,
        travelMode: google.maps.TravelMode.DRIVING, //WALKING, BICYCLING, TRANSIT
        unitSystem: google.maps.UnitSystem.METRIC //IMPERIAL
    }

    //pass the request to the route method
    directionsService.route(request, function(result, status){
        if(status == google.maps.DirectionsService.OK){
            
            //get distance and time
            $("#output").html("<div class='alert-info'>From: "+document.getElementById("from").value+".<br />To: "+document.getElementById("to").value+".<br />Driving Distance: "+result.routes[0].legs[0].duration.text+".<br />Duration: "+result.routes[0].legs[0].duration.text+"</div>");

            //display route
            directionsDisplay.setDirections(result);
        }else{
            //delete route from map
            directionsDisplay.setDirections({routes:[]});
            //center map in london
            map.setCenter(myLatLng);
            //show error message
            $("output").html("<div class='alert-danger'>Could not retrieve driving distance</div>")
        }
    });

}

//create autocomplete object for all inputs
var options = {
    types: ['(cities)']
}
var input1 = document.getElementById("from");
var autocomplete1 = new google.maps.places.Autocomplete(input1, options);

var input2 = document.getElementById("to");
var autocomplete2 = new google.maps.places.Autocomplete(input2, options);