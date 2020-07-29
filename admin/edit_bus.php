<?php

include '../config/koneksi.php';

$id_bus  = $_GET['id_bus'];

$edit    = "SELECT id_bus, kelas, harga FROM bus WHERE id_bus = '$id_bus'";
$hasil   = mysqli_query($conn, $edit)or die(mysql_error());
$data    = mysqli_fetch_array($hasil);

?>

<div class="col-md-10">
    <h3>
        <div align="center">Edit Info Bus</div>
    </h3>
    <br><br><br>
    <form class="form-horizontal" action="../config/update_bus.php" method="POST">
        <input type="hidden" name="id_bus" value="<?php echo $id_bus ?>">
        <div class="form-group">
            <label class="control-label col-sm-4" for="kelas">Kelas :</label>
            <div class="col-sm-6">
                <input type="kelas" class="form-control" name="kelas" value="<?php echo $data['kelas']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="harga">Harga :</label>
            <div class="col-sm-6">
                <input type="harga" class="form-control" name="harga" value="<?php echo $data['harga']; ?>">
            </div>
        </div>
         <div class="input-group mb-3 col-sm-6">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Bus</label>
          </div>
          <select class="custom-select" name="keberangkatan" id="inputGroupSelect01">
            <option>Pilih keberangkatan</option>
            <option value="0">Tidak Beroprasi</option>
             <?php

                        include '../config/koneksi.php';

                        $query = mysqli_query($conn, "SELECT id_berangkat, tujuan, jadwal,rute FROM keberangkatan")or die(mysqli_error());
                                        if(mysqli_num_rows($query) == 0){   
                                            echo '<tr><td colspan="5" align="center">Tidak ada data!</td></tr>';    
                                        }
                                            else
                                        {   
                                            $no = 1;                
                                            while($data = mysqli_fetch_array($query)){  
                                                
                                               
                                                echo '<option value='.$data['id_berangkat'].'>'.$data['tujuan'].'|'.$data['jadwal'].'|'.$data['rute'].'</option>';
                                                
                                               
                                                
                                                
                                              
                                            }
                                        }
                            
                                ?>
            
         
            

          </select>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
            <div class="col-sm-6" align="right">
                <button class="btn btn-danger">Update</button>
            </div>
        </div>
    </form>
</div>