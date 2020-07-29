<?php

	include 'koneksi.php';

	$kelas   		= $_POST["kelas"];
	$harga			= $_POST["harga"];
	$berangkat		= $_POST["keberangkatan"];

	$insert			= "INSERT INTO bus VALUES (null,'$kelas','$harga','$berangkat')";

	$simpan			= mysqli_query($conn, $insert)or die(mysqli_error());

?>

<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../admin/admin2.php?halaman=manajemen_bus">