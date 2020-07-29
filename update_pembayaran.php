<?php
    
    include 'config/koneksi.php';

    $invoice   = $_POST['invoice'];

    //$target_dir = "uploads/";
    // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $gambar = $_FILES["fileToUpload"]["name"];
    $angka_acak= rand(1,999);
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $nama_gambar_baru = "uploads/". $angka_acak .'-'.$gambar;
    $uploadOk = 1;
    $imageFileType = pathinfo($nama_gambar_baru,PATHINFO_EXTENSION);
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($file_tmp);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    
    // cek ukuran file
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Maaf, file anda terlalu besar.";
        $uploadOk = 0;
    }
    // Extensi gambar yang di perbolehkan 
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "maaf, selalu JPG, JPEG, PNG & GIF files yang di perbolehkan.";
        $uploadOk = 0;
    }
    // Check jika $uploadOk adalah 0 maka error
    if ($uploadOk == 0) {
        echo "Maaf, file anda gagal di upload.";
    // jika semua oke mari lanjutkan
    } else {
        if (move_uploaded_file($file_tmp,$nama_gambar_baru)) {
            echo "File ini ". basename( $_FILES["fileToUpload"]["name"]). " sudah di upload.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

  
    $update         = "UPDATE tiket SET respons='$nama_gambar_baru' WHERE invoice='$invoice'";
    $updaterespon   = mysqli_query($conn, $update)or die(mysqli_error($conn));

    if ($updaterespon)
        {
            echo "<strong><center>Bukti Pembayaran Anda Berhasil Diuploads</center></strong>";
            echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=index.php?halaman=konfirmasi_pembayaran">';
        }
    else {
            print"
                <script>
                    alert(\"Data Gagal Diubah!\");
                    history.back(-1);
                </script>";
        }
?>
