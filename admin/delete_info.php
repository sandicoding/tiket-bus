<?php 

include "../config/koneksi.php";

$id = $_GET['id'];

mysqli_query($conn,"delete from pembayaran where id ='$id'");


 ?>
<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../admin/admin.php?halaman=manajemen_pembayaran">