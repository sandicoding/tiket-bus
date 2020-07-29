<?php
    
    include 'koneksi.php';

    $id_pesan = $_POST['id_pesan'];

    $query    = "UPDATE tiket SET pembayaran=1 WHERE id_pesan='$id_pesan'";
    $update   = mysqli_query($conn,$query)or die(mysqli_error($conn));

    if ($update) {
        echo "tiket Berhasil Dikonfirmasi";
        echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin2.php?halaman=bukti_bayar">';
    }
    else{
            print"
                <script>
                    alert(\"Data Gagal Diubah!\");
                    history.back(-1);
                </script>";
    }



?>