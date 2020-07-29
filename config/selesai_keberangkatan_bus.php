<?php

	include 'koneksi.php';

	$id_bus = $_GET ['id_bus'];

    $update_keberangkatan 	= "UPDATE bus SET status='selesai' WHERE id_bus='$id_bus'";
    $update_kursi 	= "UPDATE kursi SET id_pesan=null WHERE id_bus='$id_bus'";
	$query	= mysqli_query($conn, $update_keberangkatan);
    $query2 = mysqli_query($conn, $update_kursi);
	if ($query && $query2)
	    {
	    	echo "<strong><center>Bus diperintahkan untuk selesai dan kursi dari bus kosong";
	    	echo "<META HTTP-EQUIV='REFRESH' CONTENT ='1; URL=../admin/admin2.php?halaman=keberangkatan_bus'>";
	    }
	else {
	    	//echo "<strong><center>Data Gagal Diubah";
	    	//echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../index.php?halaman=edit_info">';
	    	print"
	    		<script>
	    			alert(\"Sistem gagal!\");
	    			history.back(-1);
	    		</script>";
	    }
	


?>