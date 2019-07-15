 <?php
include_once 'inc/Database.php';
$db = new Database();
$result = $db->select("SELECT * from tbl_header where id =?", [1]);
$desa = $result['nama_desa'];
$kml = $result['url_kml'];
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<link rel="shortcut icon" href="assets/favicon/favicon.png">
 	<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1.0">
 	<title>Peta <?php echo $desa ?></title>
 	<style type="text/css">
 	#canvas{height: 100%;}
 	a {
 		color: red;
 		font-weight: bold;
 	}
 	html {
 		position: relative;
 		min-height: 100%;
 	}

 	.footer {
 		position: relative;
 		bottom: 0;
 		width: 100%;
 		height: auto;
 		line-height: 30px;

 		/*background-color: #f5f5f5;*/
 	}
 	@media only screen and (max-width: 520px){
 		.footer {
 			margin-top: 50px;
 		}
 	}
 	#legend {
 		font-family: Arial, sans-serif;
 		background: transparent;
 		padding: 10px;
 		margin: 10px;
 		border: 1px solid black;
 		font-size: 14px;
 	}
 	#legend h3 {
 		margin-top: 0;
 	}
 	#legend img {
 		vertical-align: middle;
 	}

 </style>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key= AIzaSyADcQ47QQF9JwOe_4xI7Z9h4ECZvWJl0hs &sensor=false&language=id"></script>
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.css">
 <script>
 	var map;
 	var marker;
 	var lokasi;
 	var pos;
 	var x;
 	var y;

		//Cetak file KML ke maps
		var src = '<?php echo $kml ?>';

		//Membuat Fucntion untuk menyiapkan Peta dan dipanggil saat window load
		function initialize() {

		// Variabel untuk menyimpan informasi (desc)
		var infoWindow = new google.maps.InfoWindow({maxWidth: 200})

		//  Variabel untuk menyimpan pengaturan Peta
		var mapOptions = {
			zoom: 12,
			//Tingkat Skala Zoom
			//0: Bumi (smua peta ditampilkan)
			//1: Peta Dunia
			//5: Landmass/continent
			//10: Kota
			//15: Jalan
			//20: Bangunan

			//Menatur Type peta, selain Roadmap ada Satelite, Terrain. Bisa dibaca sendiri di mbah
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}


		// Membuat Objek Peta
		map = new google.maps.Map(document.getElementById('webgis'), mapOptions);

        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

		// Pengambilan data dari database
		<?php
$row = $db->selectall("select `tbl_lokasi`.`id` AS `id`,`tbl_lokasi`.`id_desa` AS `id_desa`,`tbl_lokasi`.`nama_lokasi` AS `nama_lokasi`,`tbl_marker`.`nama` AS `legenda`,`tbl_lokasi`.`lat` AS `lat`,`tbl_lokasi`.`lng` AS `lng`,`tbl_lokasi`.`alamat` AS `alamat`,`tbl_lokasi`.`no_hp` AS `no_hp`,`tbl_lokasi`.`foto` AS `foto`,`tbl_lokasi`.`deskripsi` AS `deskripsi`,`tbl_lokasi`.`url` AS `url`,`tbl_marker`.`gbr` AS `gbr` from `tbl_lokasi` join `tbl_marker` where (`tbl_marker`.`id` = `tbl_lokasi`.`id_marker`)");
foreach ($row as $a) {

	$id = $a['id'];
	$nama_lokasi = $a['nama_lokasi'];
	$lat = $a['lat'];
	$lon = $a['lng'];
	$alamat = $a['alamat'];
	$legenda = $a['legenda'];
	$nohp = $a['no_hp'];
	$foto = $a['foto'];
	$deskripsi = $a['deskripsi'];
	$url = $a['url'];
	$icon = $a['gbr'];
	echo ("addMarker( '$icon', $lat, $lon, '<center><img width =200 src=assets/image/$foto></img></center><br><center><b>$nama_lokasi</b></center><br><center><b>$legenda</b></center><br><center><a href=./?page=lebih&1qazxsw2=$a[id]>Read More</a><br><br> <a href= https://www.google.com/maps?saddr=My+Location&daddr=$lat,$lon>Lihat Jalan</a></center>')\n");
}

?>
		function addMarker( ikon, lat, lng, info) {
			lokasi = new google.maps.LatLng(lat, lng);
			bounds.extend(lokasi);

			var marker = new google.maps.Marker({
				map: map,
				title: '<?php echo $desa ?>',
				position: lokasi,
				animation: google.maps.Animation.DROP,
				icon : 'assets/icon/'+ikon
			});
			marker.addListener('click', toggleBounce);

			marker.setIcon({ scaledSize: new google.maps.Size(25, 25) , anchor: new google.maps.Point(10, 10)});

			map.fitBounds(bounds);
			bindInfoWindow(marker, map, infoWindow, info);
			function toggleBounce() {
				if (marker.getAnimation() !== null) {
					marker.setAnimation(null);
				} else {
					marker.setAnimation(google.maps.Animation.BOUNCE);
					setTimeout(function(){ marker.setAnimation(null); }, 750);
				}
			}
			// var legend = document.getElementById('legend');
			// for (var key in icons) {
			// 	var type = icons[key];
			// 	var name = type.name;
			// 	var icon = type.icon;
			// 	var div = document.createElement('div');
			// 	div.innerHTML = '<img src=" assets/icon/' + ikon + '"> ' + name;
			// 	legend.appendChild(div);
			// }
		}
		// Menampilkan informasi pada masing-masing marker yang diklik
		function bindInfoWindow(marker, map, infoWindow, html) {
			google.maps.event.addListener(marker, 'click', function() {
				infoWindow.setContent(html);
				infoWindow.open(map, marker);
			});
		}
		var kmlLayer = new google.maps.KmlLayer(src, {
			suppressInfoWindows: true,
			preserveViewport: false,
			map: map
		});
		// if ("geolocation" in navigator){
  //           navigator.geolocation.getCurrentPosition(show_location, show_error, {timeout:1000, enableHighAccuracy: true}); //position request
  //       }else{
  //       	console.log("Browser doesn't support geolocation!");
  //       }
		// $("#lokasiku").click(function (){ //user click on button

		// 	map.setCenter(pos);


		// });
		// on user klick
		$("#petadesa").click(function (){
			map.setCenter(lokasi);
		});


		//Success Callback
		function show_location(position){
			infoWindow = new google.maps.InfoWindow({map: map});
			x = position.coords.latitude;
			y = position.coords.longitude;
			pos = {lat: x, lng: y};
			var marker = new google.maps.Marker({
				map: map,
				title: 'Posisi Anda',
				position: pos,
				label: 'A',


			});
			//	map.setCenter(pos);
			var xa =JSON.stringify(x);
			var ya =JSON.stringify(y);
			//document.getElementById('lokasi1').href = 'https://www.google.com/maps/';

		}

		//Error Callback
		// function show_error(error){
		// 	switch(error.code) {
		// 		case error.PERMISSION_DENIED:
		// 		alert("Permission denied by user.");
		// 		break;
		// 		case error.POSITION_UNAVAILABLE:
		// 		alert("Location position unavailable.");
		// 		break;
		// 		case error.TIMEOUT:
		// 		alert("Request timeout.");
		// 		break;
		// 		case error.UNKNOWN_ERROR:
		// 		alert("Unknown error.");
		// 		break;
		// 	}
		// }

		// map.controls[google.maps.ControlPosition.BOTTOM].push(lokasiku);
		map.controls[google.maps.ControlPosition.BOTTOM].push(petadesa);
		map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
	}
	//Menambahkan Fungsi initialize() event window load agar dipanggil saat peta dibuka
	google.maps.event.addDomListener(window, 'load', initialize)
</script>
</head>
<body onload="initialize()">
	<nav class="navbar navbar-expand-md fixed-top bg-danger navbar-dark ">
		<a class="navbar-brand" href="#">PETA <?php echo $desa; ?></a>
	</nav>
	<main>
		<?php
$page = isset($_GET['page']) ? $_GET['page'] : null;
switch ($page) {
case 'petaku':
	include 'views/user/peta.php';
	break;
case 'lebih':
	include 'views/user/detail.php';
	break;
default:
	include 'views/user/peta.php';
	break;
}
?>

	</main>
	<footer class="footer bg-danger">
		<div class="container">
			<center>
			<span class=" text-white"> &copy; 2018 Tim IT IT Volunteer BLC Telkom Klaten</span>
			</center>
		</div>
	</footer>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.js"></script>
	<script type="text/javascript">
		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
			event.preventDefault();
			$(this).ekkoLightbox({alwaysShowClose: true});
		});
	</script>
</body>
</html>
