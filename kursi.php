<?php   

     $id_pesan = $_GET['id_pesan'];
     $tgl_berangkat = $_GET['tgl_berangkat'];
    
     $query     = "SELECT * FROM tiket WHERE id_pesan='$id_pesan'";
     $cek       = mysqli_query($conn, $query)or die(mysqli_error($conn));
     $data      = mysqli_fetch_array($cek);


?>     
    <div class="row">
      <div>
        <h3>
          <center>
            <img src="images/kursi.jpg" width="500px" height="400px" alt="">
            <br>
            <br>
             Silahkan Pilih Kursi
          </center>
        </h3>
          <br><br>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
           <?php

           //query get kursi
           $query = "SELECT * FROM kursi WHERE id_bus = $data[id_bus]";
           $execute_q = mysqli_query($conn, $query);    
           while ($data = mysqli_fetch_assoc($execute_q)) {
                if ($data['id_pesan'] == 0) { 
                     $id_kursi = $data['id'];
                     $kode_kursi = $data['kode_kursi'];
                     ?>
                     <input type="button" class="btn btn-success" value="<?php echo $kode_kursi; ?>" onclick="pesan('<?php echo $id_kursi ?>')">
                <?php
                } else { ?>
                     <input type="button" class="btn btn-danger" value="<?php echo $data['kode_kursi'] ?>" disabled>
                <?php
                }
                if ($data['urutan'] % 2 == 0) {
                     echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }
                if ($data['urutan'] % 4 == 0) {
                     echo "<br><br>"; 
                }
                if ($data['urutan'] == 40) {
                     echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }
                if ($data['urutan'] % 42 == 0 ) {
                     echo "<br><br>";
                }

                }
           ?>
      </div>
      <div class="col-md-4">
           <br><br><br><br><br><br>
           Keterangan :
           <p></p>
           <br><br> 
           <p><button class="btn btn-success"></button>&nbsp; : Kursi yang tersedia</p>
           <p></p>
           <p></p>
           <p><button class="btn btn-danger"></button>&nbsp;&nbsp; : Kursi yang terbooking</p>
      </div> 
    </div>

    <!-- MODAL Jumlah Penumpang --> 
    <div class="container">
      <!-- Modal -->
      <div class="modal fade" id="jumlah" role="dialog">
        <div class="modal-dialog">    
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <center><b>WARNING!</b></center>
            </div>
            <div class="modal-body">
            <form action="index.php?halaman=invoice" method="POST">
              <?php



                $query     = "SELECT * FROM tiket WHERE id_pesan='$id_pesan'";
                $cek       = mysqli_query($conn, $query)or die(mysqli_error($conn));
                $data      = mysqli_fetch_array($cek)or die(mysqli_error());
              
              ?>
              <center> 
                Anda sudah memilih Jumlah kursi sesuai dengan Jumlah Penumpang yang anda pesan!
                <br>
                <br>
                <br>
                <br>
                <h5><b>Informasi Pemesan Anda :</b></h5> 
              </center>
                <br>
                <input type="hidden" name="id_pesan" value="<?php echo $data['id_pesan']; ?>">
                <b>Nama Pemesan</b> : <?php echo $data['nama'];?> 
                <br>
                <b>NIK Pemesan</b> : <?php echo $data['nik'];?>
                <!-- <?php
                  /*s*/
                ?> -->
                <br>
                <br>
                <br>
                <center><button type="submit" class="btn btn-danger">Lihat Detail tiket</button></center>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //MODAL Jumlah Penumpang -->

     <!-- MODAL Jumlah Penumpang --> 
    <div class="container">
      <!-- Modal -->
      <div class="modal fade" id="berhasil" role="dialog">
        <div class="modal-dialog">    
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <center><b>BERHASIL!</b></center>
            </div>
            <div class="modal-body">
            <form action="index.php?halaman=invoice" method="POST">
              <?php



                $query     = "SELECT * FROM tiket WHERE id_pesan='$id_pesan'";
                $cek       = mysqli_query($conn, $query)or die(mysqli_error($conn));
                $data      = mysqli_fetch_array($cek)or die(mysqli_error());
              
              ?>
              <center> 
                Pemilihan Kursi Berhasil silahkan lanjutkan dan konfirmasi pembayaran!
                <br>
                <br>
                <br>
                <br>
                <h5><b>Informasi Pemesan Anda :</b></h5> 
              </center>
                <br>
                <input type="hidden" name="id_pesan" value="<?php echo $data['id_pesan']; ?>">
                <b>Nama Pemesan</b> : <?php echo $data['nama'];?> 
                <br>
                <b>NIK Pemesan</b> : <?php echo $data['nik'];?>
                <!-- <?php
                  /*s*/
                ?> -->
                <br>
                <br>
                <br>
                <center><button type="submit" class="btn btn-danger">Lihat Detail tiket</button></center>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //MODAL Jumlah Penumpang -->


    <!-- MODAL GAGAL MEMILIH KURSI --> 
    <div class="container">
      <!-- Modal -->
      <div class="modal fade" id="gagal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <center><b>WARNING!</b></center>
            </div>
            <div class="modal-body">
              <center>  
                Anda gagal memilih kursi
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- MODAL GAGAL MEMILIH KURSI -->
 

     <input type="hidden" name="id_pesan" value="<?php echo $id_pesan ?>" id="id_pesan">
     <script type="text/javascript">
          var pesan = function (id_kursi){
               var id_pesan = document.getElementById('id_pesan').value;
               console.log('pesan => ', id_kursi);
               console.log('id_pesan => ', id_pesan);
               var formData = {id_kursi: id_kursi, id_pesan: id_pesan};
               $.ajax({
                   url : "pesan_kursi.php",
                   type: "POST",
                   data : formData,
                   success: function(data, textStatus, jqXHR)
                   {
                      
                       if (data == 'full') {
                         console.log("PENUH");
                        $("#jumlah").modal("show");
                       } 
                       else if (data == 'gagal') {
                         console.log("GAGAL");
                         $("#gagal").modal("show");
                       } 
                       else {
                        console.log("BERHASIL");
                        // window.location.reload(); 
                        $("#berhasil").modal("show");
                       }
                   },
                   error: function (jqXHR, textStatus, errorThrown)
                   {
                
                   }
               }); 
          }
       </script>