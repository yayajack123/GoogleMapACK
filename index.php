<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provinsi Bali</title>
    <style>
        html,
        body,
        #map {
            height: 500px;
            width: 100%;
            padding: 0;
            margin: 0;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Leaflet (JS/CSS) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
    <!-- Leaflet-KMZ -->
    <script src="https://unpkg.com/leaflet-kmz@latest/dist/leaflet-kmz.js"></script>
</head>

<body>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    Bali Overview
  </a>
</nav>
<br>
<div class="container">
    <div class="card">
    <div class="card-header">
    Maps Kabupaten di Provinsi Bali
        </div>
        <div class="card-body">
            <div id="map"></div>
        </div>
    </div>
    </div>
    
    <script>
        var map = L.map('map');
        map.setView(new L.LatLng(-8.5723206,114.6667599),8.76);

        var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            maxZoom: 17,
            attribution: 'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)',
            opacity: 0.90
        });
        OpenTopoMap.addTo(map);

        // Instantiate KMZ parser (async)
        var kmzParser = new L.KMZParser({
            onKMZLoaded: function (layer, name) {
                control.addOverlay(layer, name);
                layer.addTo(map);
            }
        });
        // Add remote KMZ files as layers (NB if they are 3rd-party servers, they MUST have CORS enabled)
        kmzParser.load('bali.kmz');
        // kmzParser.load('https://raruto.github.io/leaflet-kmz/examples/globe.kmz');

        var control = L.control.layers(null, null, {
            collapsed: false
        }).addTo(map);
    </script>
</body>

</html>
