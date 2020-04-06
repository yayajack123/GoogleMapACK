<?php
    include 'config.php';
	$latitude=$_POST['lat'];
	$longitude=$_POST['lng'];
	$sql = "INSERT INTO `tb_latlang`( `latitude`, `longitude`) 
	VALUES ('$latitude','$longitude')";
	if (!mysqli_query($koneksi, $sql)) {
		echo json_encode(array("statusCode"=>200));
	}
    mysqli_close($koneksi);
?>