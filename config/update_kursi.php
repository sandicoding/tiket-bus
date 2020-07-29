<?php

	include 'koneksi.php';
	
	$id_kursi = $_POST['id_kursi'];
	$kode_kursi	= $_POST['kode_kursi'];
	$bus	= $_POST['bus'];
	

	$update 	= "UPDATE kursi SET kode_kursi='$kode_kursi', id_bus='$bus'  WHERE id='$id_kursi'";
	$updatebus	= mysqli_query($conn, $update)or die(mysqli_error());

if ($updatebus)
    {
    	echo "<strong><center>Data Berhasil Diubah";
    	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin2.php?halaman=manajemen_kursi">';
    }
else {
    	print"
    		<script>
    			alert(\"Data Gagal Diubah!\");
    			history.back(-1);
    		</script>";
    }
?>