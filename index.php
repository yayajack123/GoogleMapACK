<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kabupaten</title>
    <style>
        html,
        body,
        #map {
            height: 100%;
            width: 100%;
            padding: 0;
            margin: 0;
        }
    </style>
    <!-- Leaflet (JS/CSS) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
    <!-- Leaflet-KMZ -->
    <script src="https://unpkg.com/leaflet-kmz@latest/dist/leaflet-kmz.js"></script>
</head>

<body>
    <div id="map"></div>
    <script>
        var map = L.map('map');
        map.setView(new L.LatLng(-8.6002702, 115.2456731), 11);

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
        // kmzParser.load('https://raruto.github.io/leaflet-kmz/examples/capitals.kmz');
        // kmzParser.load('https://raruto.github.io/leaflet-kmz/examples/globe.kmz');

        var control = L.control.layers(null, null, {
            collapsed: false
        }).addTo(map);
    </script>
</body>

</html>
