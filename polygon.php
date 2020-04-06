<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Line dan Polyline</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <style>
        #mapid {
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            left: 200px;
        }
        
        .img-popup {
            margin: auto;
            width: 100%;
            max-height: 250px;
            height: auto;
        }
        
        @media only screen and (max-width: 600px) {
            .img-popup {
                display: block;
                margin: auto;
                width: 80%;
                height: auto;
            }
        }
        
        .btn-group {
            width: 100%;
        }
        .btn-danger{
            width: 150px;
            margin: 20px;
        }
    </style>
</head>

<body>
<p style="margin:20px;"><b>Juliarta Arya</b></p>
<p style="margin:20px;"><b>1705551031</b></p>
<button id="btnHapus" class="btn btn-danger btn-sm">RESET</button>
    <div id="mapid">
    </div>
    <script>

        $(document).ready(function(){
            var myIcon = L.icon({
				iconUrl: 'marker.png',
				iconSize: [40, 45], // size of the icon
				});
            var popup = L.popup();
            var countId = 0;
            var mymap = L.map('mapid').setView([-8.655924, 115.216934], 13);
            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 20,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1Ijoid2lkaWFuYXB3IiwiYSI6ImNrNm95c2pydjFnbWczbHBibGNtMDNoZzMifQ.kHoE5-gMwNgEDCrJQ3fqkQ'
            }).addTo(mymap);

            
            getData();
            $('#btnHapus').on('click', function(e){
                $.ajax({
                    url:"./deleteData.php",
                    type: "post",
                    success: function(msg,status,jqXHR){
                        alert("Data Berhasil Direset");   
                        getData();
                        location.reload(true);
                    }
                });
            });


            mymap.on('click', function(e){
                countId = countId +1;
                var marker = L.marker(e.latlng,{
                    draggable: 'true',
                    id: countId,
                    icon: myIcon,
                }).addTo(mymap);

                marker.on('click',function(e){
					/* cara pengambilan nilai atribut dari marker*/
					var id = marker.options.id;
	        		popup.setLatLng([e.latlng.lat+0.02,e.latlng.lng]);
	        		popup.setContent('Anda meng-klik marker '+id+' di koordinat :<br>'+'Latitude : '+marker.getLatLng().lat+'<br>Longitude : '+marker.getLatLng().lng+'');
	        		popup.openOn(mymap);
				});
                markerData = {"lat":e.latlng.lat,"lng":e.latlng.lng}
                $.ajax({
                    url: "./saveToDatabase.php",
                    type: "post",
                    data: markerData,
                    success: function (msg, status, jqXHR){
                        //respon pemanggilan ./saveToDatabase.php
                        alert("Anda Mengklik Koordinat"+e.latlng.lat+","+e.latlng.lng);	
                        getData();
                    }
                });
                	
            });

            function getData(){
                $.ajax({
                url: "./loadFromDatabase.php",
                type: "get",
                dataType: 'json',
                success: function (msg, status, jqXHR){
                    var polylineLatLng = [];
                    //buat marker pada posisi yang tersimpan di database
                    $.each(msg, function(i,obj){
                        var marker = L.marker([msg[i].latitude,msg[i].longitude],{icon:myIcon,}).addTo(mymap);
                        polylineLatLng.push([msg[i].latitude,msg[i].longitude]);
                    });
                    var polyline = L.polyline([
                        polylineLatLng,{
                            color: 'blue'
                        }
                    ]).addTo(mymap);
                }
            });
            }  
    });
    </script>
</body>

</html>