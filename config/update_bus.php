<?php

	include 'koneksi.php';
	
	$id_bus	= $_POST['id_bus'];
	$kelas	= $_POST['kelas'];
	$harga	= $_POST['harga'];
    $berangkat = $_POST['keberangkatan'];

	$update 	= "UPDATE bus SET kelas='$kelas', harga='$harga' , id_berangkat='$berangkat' WHERE id_bus='$id_bus'";
	$updatebus	= mysqli_query($conn, $update)or die(mysqli_error());

if ($updatebus)
    {
    	echo "<strong><center>Data Berhasil Diubah";
    	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin2.php?halaman=manajemen_bus">';
    }
else {
    	print"
    		<script>
    			alert(\"Data Gagal Diubah!\");
    			history.back(-1);
    		</script>";
    }
?>