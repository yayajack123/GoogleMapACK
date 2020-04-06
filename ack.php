
<html>
	<head>
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />
		<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
	    <link rel="stylesheet" href="leaflet.label.css" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	    <script src="leaflet.label.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<style>
			#info {position: absolute;top: 0;bottom: 30;left: 0;right: 0;}
			#map {position: absolute;top: 30;bottom: 0;left: 0;right: 0;}
			.btn-group{
				width:100%;
			}
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
			var map = L.map('map').setView([-8.6002702,115.2456731],11);

			/*	mendefinisikan sebuah variable popup */
			var popup = L.popup();

			/*  variabel untuk menghitung indeks marker yang telah dibuat */
			var countId = 0;

			// menampilkan layer map OSM pada canvas
			L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
				maxZoom: 20,
				subdomains:['mt0','mt1','mt2','mt3']
            }).addTo(map);
            
            map.on('mousemove',function(e){
				document.getElementById("info").innerHTML="Koordinat : ("+e.latlng.lat+","+e.latlng.lng+")";
			});

			map.on('popupclose', function(e){
                //map kembali ke titik awal dengan animasi
                map.flyTo([-8.6002702,115.2456731],11, {
                    pan: {
                        animate: true,
                        duration: 3 
                    },
                    zoom: {
                        animate: true
                    }
                });
            });

			var polyLatLng = [
				[-8.620059, 115.207958],
				[-8.603596, 115.214224],
				[-8.603426, 115.227184],
				[-8.628376, 115.224781],
			];

			var polygon = L.polygon(polyLatLng,{
				color: 'red'
			}).addTo(map);

			// menangkap event on-click pada map dan memunculkan sebuah marker
				
				/* indeks ditambahkan 1 setiap marker akan dibuat */
				// countId = countId + 1;
                var myIcon = L.icon({
				iconUrl: 'marker.png',
				iconSize: [40, 45], // size of the icon
				});

				var marker = L.marker([-8.753830, 115.177659],{
					id: 1,icon: myIcon,
                }).addTo(map);
                var tegalbuah = L.marker([-8.666058, 115.180957],{
					id: 2,icon: myIcon,
                }).addTo(map);
                var gas = L.marker([-8.7141237,115.1763761],{
					id: 2,icon: myIcon,
                }).addTo(map);
                var seminyak = L.marker([-8.6892843,115.1631442],{
                    id: 2,
                    icon: myIcon,
                }).addTo(map);
                var atena = L.marker([-8.6834878,115.1754641],{id: 2,icon: myIcon,}).addTo(map);
                var batanta = L.marker([-8.6843379,115.1918523],{id: 2,icon: myIcon,}).addTo(map);
                var sidakarya = L.marker([-8.7001714,115.2172541],{id: 2,icon: myIcon,}).addTo(map);
                var yehaya = L.marker([-8.6801827,115.2389223],{id: 2,icon: myIcon,}).addTo(map);
                var brawa = L.marker([-8.6474564,115.1503556],{id: 2,icon: myIcon,}).addTo(map);
                var kerobokan = L.marker([-8.6523967,115.1611355],{id: 2,icon: myIcon,}).addTo(map);
                var wibisana = L.marker([-8.6478914,115.2008521],{id: 2,icon: myIcon,}).addTo(map);
                var antasura = L.marker([-8.6109041,115.2205759],{id: 2,icon: myIcon,}).addTo(map);
                var penatih = L.marker([-8.6274433,115.2405353],{id: 2,icon: myIcon,}).addTo(map);
                var pemecutan = L.marker([-8.6622791,115.2063905],{id: 2,icon: myIcon,}).addTo(map);
                var legian = L.marker([-8.6990007,115.1720857],{id: 2,icon: myIcon,}).addTo(map);
                				
	
				marker.on('click',function(e){
					/* cara pengambilan nilai atribut dari marker*/
					var id = marker.options.id;
	        		popup.setLatLng([e.latlng.lat ,e.latlng.lng]);
	        		popup.setContent("<img src='https://lh5.googleusercontent.com/p/AF1QipPNdT70zkrXQZmQktK91sH4Rgsh2hmUZff4FTdB=w480-h240-k-no' width ='100%' height='auto'>"+
									 "<br><br><b>ACK kelan</b><br>Jl. Raya Uluwatu, Tuban, Kuta, Kabupaten Badung, Bali"+
									 "<br>0821-4647-8798<br>Buka sekarang:  09.00–23.00 <br><br>"+
									 "<div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>"+
									 "<button onclick=window.location.href='tel:082146478798' type='button' class='btn btn-success'>Call</button>" +
            						 "<button onclick=window.location.href='https://goo.gl/maps/33m1FmgK2ibywA7T9' type='button' class='btn btn-primary'>Open Direction</button>" +
									 "</div>");
	        		popup.openOn(map);
                });
                tegalbuah.on('click',function(e){
					/* cara pengambilan nilai atribut dari marker*/
					var id = marker.options.id;
					
	        		popup.setLatLng([e.latlng.lat ,e.latlng.lng]);
	        		popup.setContent('<img src="https://lh5.googleusercontent.com/p/AF1QipMVVfuDvb4exJ4vrv9AADl_Q6JZtjj9zJXYBdnJ=w408-h244-k-no" width ="100%" height="auto">'+
									 '<br><br><b>ACK Tegal Buah</b><br>Jalan Gunung Tangkuban Perahu No. 111, Tegal Buah, Padang Sambian Klod,, Denpasar Barat, Padangsambian Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80117'+
									 '<br>0812-3830-581<br>Buka sekarang:  09.00–23.00'+
									 "<br><br><div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>"+
									 "<button onclick=window.location.href='tel:08123830581' type='button' class='btn btn-success'>Call</button>" +
            						 "<button onclick=window.location.href='https://goo.gl/maps/YVmupGiF3ucvp2dbA' type='button' class='btn btn-primary'>Open Direction</button>" +
									 "</div>");
	        		popup.openOn(map);
                });
                gas.on('click',function(e){
					/* cara pengambilan nilai atribut dari marker*/
					var id = marker.options.id;
					
	        		popup.setLatLng([e.latlng.lat ,e.latlng.lng]);
	        		popup.setContent('<img src="https://lh5.googleusercontent.com/p/AF1QipOsR5-pbOuOvbIsnKVMjoBIhM4vjfeQGsZpvPVQ=w426-h240-k-no" width ="100%" height="auto">'+
									'<br><br><b>ACK Kuta</b><br>Jl. Mataram No.17, Kuta, Kabupaten Badung, Bali 80361<br>'+
									'0821-4647-8798<br>Buka sekarang:  09.00–23.00'+
									"<br><br><div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>"+
									"<button onclick=window.location.href='tel:082146478798' type='button' class='btn btn-success'>Call</button>" +
									"<button onclick=window.location.href='https://goo.gl/maps/MoLSMUbF8XY4Mm6g8' type='button' class='btn btn-primary'>Open Direction</button>" +
									"</div>");
	        		popup.openOn(map);
                });
                seminyak.on('click',function(e){
					/* cara pengambilan nilai atribut dari marker*/
					var id = marker.options.id;
					
	        		popup.setLatLng([e.latlng.lat ,e.latlng.lng]);
	        		popup.setContent('<img src="https://lh5.googleusercontent.com/p/AF1QipNWXVZWdTPfOueHlaUrFDcG9l4-eShtZ0gp7C39=w426-h240-k-no" width ="100%" height="auto">'+
									 '<br><br><b>ACK Seminyak</b><br>Jl. Drupadi No.88 A, Seminyak, Kuta, Kabupaten Badung, Bali 80361<br>'+
									 '0821-4707-2069<br>Buka sekarang:  09.00–23.00'+
									 "<br><br><div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>"+
									 "<button onclick=window.location.href='tel:082147072069' type='button' class='btn btn-success'>Call</button>" +
									 "<button onclick=window.location.href='https://goo.gl/maps/DCfGARPN1fSM57Ma6' type='button' class='btn btn-primary'>Open Direction</button>" +
									 "</div>");
	        		popup.openOn(map);
                });
                atena.on('click',function(e){
					/* cara pengambilan nilai atribut dari marker*/
					var id = marker.options.id;
					
	        		popup.setLatLng([e.latlng.lat ,e.latlng.lng]);
	        		popup.setContent('<img src="https://lh5.googleusercontent.com/p/AF1QipOrfkDrms_6bzwN6XmfeJTEiU6qvv6RfEGRBl6C=w408-h544-k-no" width ="100%" height="auto">'+
									 '<br><br><b>ACK Gunung Athena</b><br>'+
									 'Banjar Padang Sumbu Tengah, Jl. Gn. Athena, Padangsambian Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80117<br>'+
									 '0812-3830-581<br>Buka sekarang:  09.00–23.00'+
									 "<br><br><div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>"+
									 "<button onclick=window.location.href='tel:08123830581' type='button' class='btn btn-success'>Call</button>" +
									 "<button onclick=window.location.href='https://goo.gl/maps/RezurqsmszxLWb4a8' type='button' class='btn btn-primary'>Open Direction</button>" +
									 "</div>");
	        		popup.openOn(map);
                });
                batanta.on('click',function(e){
					/* cara pengambilan nilai atribut dari marker*/
					var id = marker.options.id;
					
	        		popup.setLatLng([e.latlng.lat ,e.latlng.lng]);
	        		popup.setContent('<img src="https://lh5.googleusercontent.com/p/AF1QipOHx4Rs4labTx0GsKjH48e4nyVa8zyu70Ex_laY=w426-h240-k-no" width ="100%" height="auto">'+
									 '<br><br><b>ACK Batanta</b><br>Jalan Pulau Batanta, Dauh Puri Kauh, Denpasar Barat, Dauh Puri Kauh, Kec. Denpasar Bar., Kota Denpasar, Bali 80221'+
									 '<br>0819-9943-8434<br>Buka sekarang:  09.00–23.00'+
									 "<br><br><div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>"+
									 "<button onclick=window.location.href='tel:081999438434' type='button' class='btn btn-success'>Call</button>" +
									 "<button onclick=window.location.href='https://goo.gl/maps/d9nhHYoRwKiZcPzH9' type='button' class='btn btn-primary'>Open Direction</button>" +
									 "</div>");
	        		popup.openOn(map);
                });
                sidakarya.on('click',function(e){
					/* cara pengambilan nilai atribut dari marker*/
					var id = marker.options.id;
					
	        		popup.setLatLng([e.latlng.lat ,e.latlng.lng]);
	        		popup.setContent('<img src="https://lh5.googleusercontent.com/p/AF1QipNDzr0dQ1HTunqOMom6Nr9V31hehZCEHhcZzfsJ=w408-h306-k-no" width ="100%" height="auto">'+
									 '<br><br><b>ACK Sidakarya</b><br>Jl. Sidakarya No.43, Sesetan, Kec. Denpasar Sel., Kota Denpasar, Bali 80224<br>'+
									 '0878-6100-7078<br>Buka sekarang:  09.00–23.00'+
									 "<br><br><div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>"+
									 "<button onclick=window.location.href='tel:087861007078' type='button' class='btn btn-success'>Call</button>" +
									 "<button onclick=window.location.href='https://goo.gl/maps/2gj5jRuRctiTR1Hy9' type='button' class='btn btn-primary'>Open Direction</button>" +
									 "</div>");
	        		popup.openOn(map);
                });
                yehaya.on('click',function(e){
					/* cara pengambilan nilai atribut dari marker*/
					var id = marker.options.id;
					
	        		popup.setLatLng([e.latlng.lat ,e.latlng.lng]);
	        		popup.setContent('<img src="https://lh5.googleusercontent.com/p/AF1QipOKkZ2ByN8XnFmkzcwI3YAKUHGO-2C46zgF19u9=w408-h306-k-no" width ="100%" height="auto">'+
									 '<br><br><b>ACK Yeh Aya</b><br>Jl. Tukad Yeh Aya No.200, Renon, Kec. Denpasar Sel., Kota Denpasar, Bali 80226<br>'+
									 '0822-3766-2553<br>Buka sekarang:  09.00–23.00'+
									 "<br><br><div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>"+
									 "<button onclick=window.location.href='tel:082237662553' type='button' class='btn btn-success'>Call</button>" +
									 "<button onclick=window.location.href='https://goo.gl/maps/jptnF6Lj7u12k3zr9' type='button' class='btn btn-primary'>Open Direction</button>" +
									 "</div>");
	        		popup.openOn(map);
                });
                brawa.on('click',function(e){
					/* cara pengambilan nilai atribut dari marker*/
					var id = marker.options.id;
					
	        		popup.setLatLng([e.latlng.lat ,e.latlng.lng]);
	        		popup.setContent('<img src="https://lh5.googleusercontent.com/p/AF1QipN_QQSX23XMRe1Mf12A35RRZmxuskleq-LBlPkH=w408-h306-k-no" width ="100%" height="auto">'+
									 '<br><br><b>ACK Brawa</b><br>Jl. Pantai Berawa No.26, Tibubeneng, Kec. Kuta Utara, Kabupaten Badung, Bali 80361<br>'+
									 '0878-6169-2181<br>Buka sekarang:  09.00–23.00'+
									 "<br><br><div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>"+
									 "<button onclick=window.location.href='tel:087861692181' type='button' class='btn btn-success'>Call</button>" +
									 "<button onclick=window.location.href='https://goo.gl/maps/rpz5idKYNZWLaYJCA' type='button' class='btn btn-primary'>Open Direction</button>" +
									 "</div>");
	        		popup.openOn(map);
                });
                kerobokan.on('click',function(e){
					/* cara pengambilan nilai atribut dari marker*/
					var id = marker.options.id;
					
	        		popup.setLatLng([e.latlng.lat ,e.latlng.lng]);
	        		popup.setContent('<img src="https://lh5.googleusercontent.com/p/AF1QipOJZwqSJ6JNvVFUGu0tfSF-Idlf3kPzxguonkeb=w408-h244-k-no" width ="100%" height="auto">'+
									 '<br><br><b>ACK Kerobokan</b><br>Kerobokan, Kec. Kuta Utara, Kabupaten Badung, Bali 80361<br>'+
									 '0813-3404-4450<br>Buka sekarang:  09.00–23.00'+
									 "<br><br><div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>"+
									 "<button onclick=window.location.href='tel:081334044450' type='button' class='btn btn-success'>Call</button>" +
									 "<button onclick=window.location.href='https://goo.gl/maps/vhFGTsDKTQe6Vnav7' type='button' class='btn btn-primary'>Open Direction</button>" +
									 "</div>");
	        		popup.openOn(map);
                });
                wibisana.on('click',function(e){
					/* cara pengambilan nilai atribut dari marker*/
					var id = marker.options.id;
					
	        		popup.setLatLng([e.latlng.lat ,e.latlng.lng]);
	        		popup.setContent('<img src="https://lh5.googleusercontent.com/p/AF1QipNXpWPZNC5lcmb_Wz0DGAfm9MHYeaQlX_-uK8WI=w408-h306-k-no" width ="100%" height="auto">'+
									 '<br><br><b>ACK Wibisana</b><br>Jl. Wibisana Bar., Pemecutan Kaja, Kec. Denpasar Utara, Kota Denpasar, Bali 80111<br>'+
									 '0819-0501-1657<br>Buka sekarang:  09.00–23.00'+
									 "<br><br><div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>"+
									 "<button onclick=window.location.href='tel:081905011657' type='button' class='btn btn-success'>Call</button>" +
									 "<button onclick=window.location.href='https://goo.gl/maps/sAxnvJVrGB4R736M7' type='button' class='btn btn-primary'>Open Direction</button>" +
									 "</div>");
	        		popup.openOn(map);
                });
                antasura.on('click',function(e){
					/* cara pengambilan nilai atribut dari marker*/
					var id = marker.options.id;
	        		popup.setLatLng([e.latlng.lat ,e.latlng.lng]);
	        		popup.setContent('<img src="https://lh5.googleusercontent.com/p/AF1QipNHmDjNIlOnGlqIHbOZe7GPTlnLUjSLaBhocN6L=w408-h244-k-no" width ="100%" height="auto">'+
									 '<br><br><b>ACK Antasura</b><br>Jl. Antasura No.93, Peguyangan Kangin, Kec. Denpasar Utara, Kota Denpasar, Bali 80239<br>'+
									 '0812-3755-9829<br>Buka sekarang:  09.00–23.00'+
									 "<br><br><div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>"+
									 "<button onclick=window.location.href='tel:081237559829' type='button' class='btn btn-success'>Call</button>" +
									 "<button onclick=window.location.href='https://goo.gl/maps/YUECxqMMhBsdQxVK9' type='button' class='btn btn-primary'>Open Direction</button>" +
									 "</div>");
	        		popup.openOn(map);
                });
                penatih.on('click',function(e){
					/* cara pengambilan nilai atribut dari marker*/
					var id = marker.options.id;
					
	        		popup.setLatLng([e.latlng.lat ,e.latlng.lng]);
	        		popup.setContent('<img src="https://lh5.googleusercontent.com/p/AF1QipOzbb2iAZL3ghAYlnMG9Q0GMp2ND_HUz-6MAJJz=w426-h240-k-no" width ="100%" height="auto">'+
									 '<br><br><b>ACK Penatih</b><br>Jl. Trengguli No.61A, Penatih, Kec. Denpasar Tim., Kota Denpasar, Bali 80237<br>'+
									 '0819-3311-5147<br>Buka sekarang:  09.00–23.00'+
									 "<br><br><div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>"+
									 "<button onclick=window.location.href='tel:081933115147' type='button' class='btn btn-success'>Call</button>" +
									 "<button onclick=window.location.href='https://goo.gl/maps/4V91WZyaQasXu3Aq8' type='button' class='btn btn-primary'>Open Direction</button>" +
									 "</div>");
	        		popup.openOn(map);
                });
                pemecutan.on('click',function(e){
					/* cara pengambilan nilai atribut dari marker*/
					var id = marker.options.id;
					
	        		popup.setLatLng([e.latlng.lat ,e.latlng.lng]);
	        		popup.setContent('<img src="https://lh5.googleusercontent.com/p/AF1QipPoLiQRMdzXSqfZEk57PM51zLkC1RQODxJLgv4q=w426-h240-k-no" width ="100%" height="auto">'+
									 '<br><br><b>ACK Pura Demak</b><br>Jl. Pura Demak No.16, Pemecutan Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80119<br>'+
									 '0831-1420-0008<br>Buka sekarang:  09.00–23.00'+
									 "<br><br><div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>"+
									 "<button onclick=window.location.href='tel:083114200008' type='button' class='btn btn-success'>Call</button>" +
									 "<button onclick=window.location.href='https://goo.gl/maps/cTQRA14xtey8HNzVA' type='button' class='btn btn-primary'>Open Direction</button>" +
									 "</div>");
	        		popup.openOn(map);
                });
                legian.on('click',function(e){
					/* cara pengambilan nilai atribut dari marker*/
					var id = marker.options.id;
					popup.setLatLng([e.latlng.lat ,e.latlng.lng]);
	        		popup.setContent('<img src="https://lh5.googleusercontent.com/p/AF1QipO2wAUcsi1eBR1YHhb_vspx6u4asgzgn8y6DGb-=w426-h240-k-no" width ="100%" height="auto">'+
									 '<br><br><b>ACK Legian</b><br>Jl. Sri Rama No.6, Legian, Kuta, Kabupaten Badung, Bali 80361<br>'+
									 '0819-1737-0957<br>Buka sekarang:  09.00–23.00'+
									 "<br><br><div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>"+
									 "<button onclick=window.location.href='tel:081917370957' type='button' class='btn btn-success'>Call</button>" +
									 "<button onclick=window.location.href='https://goo.gl/maps/iLPHr87ruySwWs8z8' type='button' class='btn btn-primary'>Open Direction</button>" +
									 "</div>");
	        		popup.openOn(map);
                });

            


			// menangkap event right-click pada map
			map.on('contextmenu',function(e){
				alert('Anda menekan tombol mouse klik kanan pada koordinat : '+e.latlng);
			});


			map.on('click', function(e){
                countId = countId +1;
                var marker = L.marker(e.latlng,{
                    draggable: 'true',
                        /* 
                            saya menambahkan atribut baru berupa id untuk menandai indeks marker yang dibuat
                            silahkan tambahkan atribut untuk menambahkan informasi lainnya jika diperlukan
                        */
                    id: countId,
                }).addTo(map);

                marker.on('click',function(e){
					/* cara pengambilan nilai atribut dari marker*/
					var id = marker.options.id;
	        		popup.setLatLng([e.latlng.lat+0.02,e.latlng.lng]);
	        		popup.setContent('Anda meng-klik marker '+id+' di koordinat :<br>'+'Latitude : '+marker.getLatLng().lat+'<br>Longitude : '+marker.getLatLng().lng+'');
	        		popup.openOn(map);
				});
                markerData = {"lat":e.latlng.lat,"lng":e.latlng.lng}
                $.ajax({
                    url: "./saveToDatabase.php",
                    type: "post",
                    data: markerData,
                    success: function (msg, status, jqXHR){
                        //respon pemanggilan ./saveToDatabase.php
                        alert(countId);	
                    }
                });	
            });

            $.ajax({
                url: "./loadFromDatabase.php",
                type: "get",
                dataType: 'json',
                success: function (msg, status, jqXHR){
                    var polylineLatLng = [];
                    //buat marker pada posisi yang tersimpan di database
                    $.each(msg, function(i,obj){
                        var marker = L.marker([msg[i].latitude,msg[i].longitude]).addTo(map);
                        polylineLatLng.push([msg[i].latitude,msg[i].longitude]);
                    });
                    var polyline = L.polyline([
                        polylineLatLng
                    ]).addTo(map);
                    // alert(polylineLatLng);

                    //set map center pada marker yang tersimpan di database
                    // map.setView([msg.lat,msg.lng],msg.zoom);	
                }
            });

            function getDatas(){
                $.getJson("getData.php", function(data){
                    for (var i = 0; i < data.length; i++) {
                        var marker = L.marker([-8.662917, 115.224437], {
                            icon: myIcon,
                        }).addTo(map)
                    }
                });
            }	
		</script>
	</body>
</html>