
<html>
	<head>
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />
		<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
		<style>
			#info {position: absolute;top: 0;bottom: 30;left: 0;right: 0;}
			#map {position: absolute;top: 30;bottom: 0;left: 0;right: 0;}
		</style>
	</head>

	<body>
		<!-- div untuk menampilkan info -->
		<div id="info">Informasi</div>

		<!-- mendefinisikan canvas untuk menempatkan map OpenStreetMap (OSM) -->
		<div id="map"></div>
		
		<script>
			/* 
				mendefinisikan sebuah variabel map untuk mengatur layer map OSM pada canvas dengan parameter koordinat awal dan zoom level
			*/
			var map = L.map('map').setView([-8.5240574,115.2110998],11);

			/*	mendefinisikan sebuah variable popup */
			var popup = L.popup();

			// menampilkan layer map OSM pada canvas
			L.tileLayer('https://maps.tilehosting.com/styles/streets/{z}/{x}/{y}.png?key=YrAn6SOXelkLFXHv03o2',{
				attribution:'<a href="https://www.maptiler.com/copyright/" target="_blank">Â© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">Â© OpenStreetMap contributors</a>',
			}).addTo(map);

			//menangkap event on-click pada map dan memunculkan sebuah popup
			map.on('click',function(e){
				// setting posisi popup
				popup.setLatLng(e.latlng);
				// setting content dari popup
				popup.setContent('Anda meng-klik pada map di posisi : <br>Latitude : '+e.latlng.lat+'<br>Longitude : '+e.latlng.lng);
				// show popup
				popup.openOn(map);	
			});

			// menangkap event right-click pada map
			map.on('contextmenu',function(e){
				alert('Anda menekan tombol mouse klik kanan pada koordinat : '+e.latlng);
			});

			/* 
				menangkap event pergerakan mouse dan menampilkan koordinat mouse pada div info.
			 	
			 	saya mengakses html DOM dengan javascript murni, jika anda ingin lebih simpel
			 	dan mudah silahkan menggunakan library jQuery dalam mengakses html DOM.

			 	perhatikan cara saya mengambil data koordinat pada event ini dan bandingkan dengan
			 	cara yang saya lakukan pada event sebelumnya
			*/
			map.on('mousemove',function(e){
				document.getElementById("info").innerHTML="Koordinat : ("+e.latlng.lat+","+e.latlng.lng+")";
			});


			/*
			 cara mengubah style dari marker yang dibuat.
			*/

			var myIcon = L.icon({
				iconUrl: 'marker.png',
				iconSize: [40, 45], // size of the icon
				});
			/*
				membuat sebuah marker pada koordinat tertentu di map.
				silahkan googling lagi untuk dapat mengubah style dari marker yang dibuat.
			*/
			var tegalbuah = L.marker([-8.6646335,115.1793109],{icon: myIcon}).addTo(map);
			var kelan = L.marker([-8.7538659,115.177522],{icon: myIcon}).addTo(map);
			// var kuta = L.marker([-8.7141237,115.1763761],{icon: myIcon}).addTo(map);
			// var seminyak = L.marker([-8.6892843,115.1631442],{icon: myIcon}).addTo(map);
			// var atena = L.marker([-8.6834878,115.1754641],{icon: myIcon}).addTo(map);
			// var batanta = L.marker([-8.6843379,115.1918523],{icon: myIcon}).addTo(map);
			// var sidakarya = L.marker([-8.7001714,115.2172541],{icon: myIcon}).addTo(map);
			// var yehaya = L.marker([-8.6801827,115.2389223],{icon: myIcon}).addTo(map);
			// var brawa = L.marker([-8.6474564,115.1503556],{icon: myIcon}).addTo(map);
			// var kerobokan = L.marker([-8.6523967,115.1611355],{icon: myIcon}).addTo(map);
			// var wibisana = L.marker([-8.6478914,115.2008521],{icon: myIcon}).addTo(map);
			// var antasura = L.marker([-8.6109041,115.2205759],{icon: myIcon}).addTo(map);
			// var penatih = L.marker([-8.6274433,115.2405353],{icon: myIcon}).addTo(map);
			// var pemecutan = L.marker([-8.6622791,115.2063905],{icon: myIcon}).addTo(map);
			// var legian = L.marker([-8.6990007,115.1720857],{icon: myIcon}).addTo(map);

			
			/*
				menangani event mouse click pada marker
				perhatikan saya menggunakan variabel popup yang sama dengan event klik pada map spt diatas, saya cuman mengganti posisi dan content popup nya saja.

				perhatikan juga cara saya mengambil koordinat dari marker yang saya klik

				perhatikan pada pemanggilan method popup.setLatLng(), saya menggunakan offset +0.02
				agar posisi kemunculan popup tidak menghalangi markernya
			*/
			kelan.on('click',function(e){
        		popup.setLatLng([e.latlng.lat+0.02,e.latlng.lng]);
        		popup.setContent('Anda meng-klik marker yang berada di koordinat :<br>'+'Latitude : '+marker.getLatLng().lat+'<br>Longitude : '+marker.getLatLng().lng+'');
        		popup.openOn(map);
			});
			
			

			
		</script>
	</body>
</html>