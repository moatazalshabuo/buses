<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.81.1/dist/L.Control.Locate.min.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.81.1/dist/L.Control.Locate.min.js" charset="utf-8"></script>
<title>Document</title>
    <style>
        body {
            padding: 0;
            margin: 0;
        }
        html, body, #map {
            height: 100%;
            width: 100vw;
        }
    </style>
</head>
<body>
    
    <div id="map"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://www.gstatic.com/firebasejs/10.12.5/firebase-app-compat.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/10.12.5/firebase-database-compat.min.js" integrity="sha512-ALhVGL5GxrkoKefRcXsS57OTxg2LxJytsU6Gigx2iG+OuSDITVKJfKrpPJVoT3JLAkERnLHgTMr8Lb60uCN8Kw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://www.gstatic.com/firebasejs/10.12.5/firebase-database.min.js"></script><script>
    var map = L.map('map').fitWorld();
    // var greenIcon = new LeafIcon({iconUrl:"{{ asset('icons8-bus-94.png') }}" })
    var greenIcon = L.icon({
    iconUrl: "{{ asset('icons8-bus-94.png') }}",

    iconSize:     [50, 50], // size of the icon

    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);

// map.locate({setView: true, maxZoom: 16});
map.locate({setView: true, watch: true})
navigator.geolocation.watchPosition(success,error)

function success(e){
    console.log(e)
}
function error(e){
    console.log(e)
}



// TODO: Replace the following with your app's Firebase project configuration
// See: https://firebase.google.com/docs/web/learn-more#config-object
const firebaseConfig = {
  // ...
  // The value of `databaseURL` depends on the location of the database
  databaseURL: "",
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);


// Initialize Realtime Database and get a reference to the service
const database = firebase.database();
function writeUserData(bus_id, lat, lng,route) {
  firebase.database().ref('user/' + bus_id).set({

    reservations:route,
    lat: lat,
    lng: lng,
  });
}
var busMarker
function fetchBusLocation(bus_id) {
            firebase.database().ref('bus/' + bus_id).on('value', (snapshot) => {
                const data = snapshot.val();
                console.log(bus_id)
                if (data) {
                    var busLatLng = [data.lat, data.lng];
                    
                    if (!busMarker) {
                        busMarker = L.marker(busLatLng,{icon:greenIcon}).addTo(map)
                            .bindPopup("Bus is here").openPopup();
                    } else {
                        busMarker.setLatLng(busLatLng).update();
                    }
                }else{
                    if(busMarker){
                    map.removeLayer(busMarker)
                }
                }
                
            });
            // const dbRef = firebase.database().ref();
            // dbRef.child("buses").child(bus_id).get().then((snapshot) => {
            // if (snapshot.exists()) {
            //     console.log(snapshot.val());
            // } else {
            //     console.log("No data available");
            // }
            // }).catch((error) => {
            // console.error(error);
            // });
        }
var marker
function onLocationFound(e) {
    var radius = e.accuracy;
    console.log(e)
    if(marker){
        map.removeLayer(marker)
    }
    marker = L.marker(e.latlng).addTo(map)
        .bindPopup("You are within " + radius + " meters from this point").openPopup();
        @if ($reservation)
            writeUserData({{ $reservation->bus_id }},e.latitude,e.longitude,{{ $reservation->id }})
            fetchBusLocation({{ $reservation->bus_id }})
        @endif
    // L.circle(e.latlng, radius).addTo(map);
}

map.on('locationfound', onLocationFound);

function onLocationError(e) {
    alert(e.message);
}

map.on('locationerror', onLocationError)

</script>
</body>
</html>

