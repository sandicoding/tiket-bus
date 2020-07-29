<?php 

include "../config/koneksi.php";


$id		= $_POST['id'];
$bank = $_POST['bank'];
$rekening = $_POST['rekening'];
$nama		= $_POST['nama'];


$query = "UPDATE pembayaran SET id='$id', bank='$bank', nmr_rekening='$rekening', atas_nama='$nama' where id='$id' ";
 $update   = mysqli_query($conn,$query)or die(mysqli_error($conn));

    if ($update) {
        echo "tiket Berhasil Dikonfirmasi";
        echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin2.php?halaman=manajemen_pembayaran">';
    }
    else{
            print"
                <script>
                    alert(\"Data Gagal Diubah!\");
                    history.back(-1);
                </script>";
    }




 ?>