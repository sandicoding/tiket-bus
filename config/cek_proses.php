<?php
	
	include 'koneksi.php';

	$invoice  = $_POST['kode'];

	$query 	  = "SELECT * FROM tiket WHERE nik = '$invoice'";
	$sql 	  = mysqli_query($conn,$query);
	$data 	  = mysqli_num_rows($query);
	
	if ($data['konfirm'] = '1') {
		echo "tiket Anda Telah dikonfirmasi oleh Admin. Selanjutnya, silahkan anda transfer biaya perjalanan Anda ke sesuai dengan yang tersedia pada <a href='index.php?halaman=info_pembayaran'>Info Pembayaran</a>";
	}
	else {
		echo "tiket Anda Belum Dikonfirmasi oleh Admin. Silahkan cek lagi beberapa saat kemudian.";
	}


?>