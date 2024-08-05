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
        .fixed-buttons {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1000;
        }
        .fixed-buttons button {
            display: block;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f00;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="fixed-buttons">
        <button onclick="endDelivery()">إنهاء التوصيل</button>
        <button onclick="cancelDelivery()">إلغاء</button>
    </div>
    <div id="map"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://www.gstatic.com/firebasejs/10.12.5/firebase-app-compat.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/10.12.5/firebase-database-compat.min.js" integrity="sha512-ALhVGL5GxrkoKefRcXsS57OTxg2LxJytsU6Gigx2iG+OuSDITVKJfKrpPJVoT3JLAkERnLHgTMr8Lb60uCN8Kw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://www.gstatic.com/firebasejs/10.12.5/firebase-database.min.js"></script><script>
    var map = L.map('map').fitWorld();

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
  firebase.database().ref('bus/' + bus_id).set({
    reservations:route,
    lat: lat,
    lng: lng,
  });
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
        writeUserData({{ $reservation->bus_id }},e.latitude,e.longitude,{{ $reservation->id }})
    // L.circle(e.latlng, radius).addTo(map);
}

map.on('locationfound', onLocationFound);

function onLocationError(e) {
    alert(e.message);
}
function deleteBusData(bus_id) {
            firebase.database().ref('bus/' + bus_id).remove()
                .then(() => {
                    alert("تم حذف البيانات بنجاح");
                })
                .catch((error) => {
                    console.error("خطأ في حذف البيانات: ", error);
                });
        }
// Functions for buttons
function endDelivery() {
        deleteBusData({{ $reservation->bus_id }});
        location.replace('/routes-bus')
    }

function cancelDelivery() {
    deleteBusData({{ $reservation->bus_id }});
    location.replace('/routes-bus')
}
map.on('locationerror', onLocationError)
</script>
</body>
</html>

