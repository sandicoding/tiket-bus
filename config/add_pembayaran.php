<?php

	include 'koneksi.php';

	$bank 		= @$_POST['bank'];
	$rekening 	= @$_POST['rekening'];
	$nama		= @$_POST['nama'];

	$insert		= "INSERT INTO pembayaran VALUES (null,'$bank','$rekening','$nama')";

	$simpan		= mysqli_query($conn,$insert)or die(mysqli_error());

?>
<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../admin/admin2.php?halaman=manajemen_pembayaran">