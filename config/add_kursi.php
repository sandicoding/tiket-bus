<?php 
include "koneksi.php";

$kode_kursi = $_POST['kodeKursi'];
$bus		= $_POST['bus'];
$urutan		= $_POST['urutan'];



$query = "INSERT INTO kursi VALUES(null,'$bus','$kode_kursi','$urutan','0')";
$insert = mysqli_query($conn,$query)or die(mysqli_error($conn));


if ($insert) {
	
	echo "<script>alert('kursi behasil di tambahkan');</script>";
}



 ?>

 <META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../admin/admin2.php?halaman=manajemen_kursi">