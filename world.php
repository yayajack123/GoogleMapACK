<!DOCTYPE HTML>
<html>
  <head>
    <script src="https://cdn-webgl.wrld3d.com/wrldjs/dist/latest/wrld.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.1/leaflet.css" rel="stylesheet" />
  </head>
  
  <body>
  <div style="position: relative">
    <div id="map" style="height: 600px"></div>
    <script>
      var map = L.Wrld.map("map", "ae20eb9873772ad742e05b124b7ff6ec", {
        center: [-8.5240574,115.2110998],
        zoom: 15
      });

      var marker = L.marker([37.7952, -122.4028], {
        elevation: 260.0,
        title: "Transamerica Pyramid"
      }).addTo(map);

      marker.bindPopup("This is the Transamerica Pyramid").openPopup();
    </script>
  </div>
  </body>
</html>