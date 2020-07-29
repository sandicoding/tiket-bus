<?php
	
	include 'config/koneksi.php';

	$id_pesan  	= $_POST['id_pesan'];
	$id_kursi = $_POST['id_kursi'];


	// $cek		= "SELECT * FROM kursi_tiket WHERE id_pesan='$id_pesan'";
	// $cekkursi	= mysqli_query($conn, $cek);
	// $jumlah		= mysqli_num_rows($cekkursi);

	$lihat		= "SELECT * FROM tiket WHERE id_pesan='$id_pesan'";
	$cekqty		= mysqli_query($conn, $lihat);
	$qty		= mysqli_fetch_array($cekqty);


	if ($jumlah < $qty['qty']) {

		// $insert		 = "INSERT INTO kursi_tiket VALUES (null,'$id_pesan','$kode_kursi')";
		// $simpan		 = mysqli_query($conn, $insert)or die(mysqli_error($conn));
		
		$updatekursi = "UPDATE kursi SET id_pesan='$id_pesan' WHERE id='$id_kursi'";
		$update		 = mysqli_query($conn, $updatekursi)or die(mysqli_error($conn));
		
		if ($update)
		    {
			   echo "sukses";
		    }
		else 
		    {
				echo "gagal";
			}
		
		$update 	 = "UPDATE tiket SET fixed='1' WHERE id_pesan='$id_pesan'";
		$updatepesan = mysqli_query($conn, $update)or die(mysqli_error());

			

	}
	else {
		echo "full";
	}

?>