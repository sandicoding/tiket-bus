<?php

$id_bus = $_GET['id_bus'];

?>

<div class="row">
	<div class="col-md-8">
    <?php

    //query get kursi
    $query = "SELECT * FROM kursi WHERE id_bus = $id_bus";
    $execute_q = mysqli_query($conn, $query);    
    while ($data = mysqli_fetch_assoc($execute_q)) {
        if ($data['id_pesan'] == 0) { 
            $id_kursi = $data['id'];
            $kode_kursi = $data['kode_kursi'];
            ?>
            <input type="button" class="btn btn-success" value="<?php echo $kode_kursi; ?>">
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