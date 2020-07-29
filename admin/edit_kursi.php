<?php

include '../config/koneksi.php';

$id_kursi = $_GET['id'];





$edit    = "SELECT kursi.id,kursi.id_bus,kursi.kode_kursi,bus.kelas FROM kursi inner join bus on kursi.id_bus = bus.id_bus WHERE id= '$id_kursi'";
$hasil   = mysqli_query($conn, $edit)or die(mysql_error());
$data    = mysqli_fetch_array($hasil);

?>

<div class="col-md-10" align="center">
    <h3>
        <div align="center">Edit Kursi</div>
    </h3>
    <br><br><br>
    <form class="form-horizontal" action="../config/update_kursi.php" method="POST">
        <input type="hidden" name="id_kursi" value="<?php echo $id_kursi ?>">
        <div class="form-group">
            <label class="control-label col-sm-4" for="kelas">Kode Kursi :</label>
            <div class="col-sm-6">
                <input type="kelas" class="form-control" name="kode_kursi" value="<?php echo $data['kode_kursi']; ?>">
            </div>
        </div>
        <div class="input-group mb-3 col-sm-6">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Bus</label>
          </div>
          <select class="custom-select" name="bus" id="inputGroupSelect01">
            <option value="<?php echo $data['id_bus'];?>" selected><?php echo $data['kelas'];?></option>
             <?php

                        include '../config/koneksi.php';

                        $query = mysqli_query($conn, "SELECT id_bus, kelas, harga FROM bus")or die(mysqli_error());
                                        if(mysqli_num_rows($query) == 0){   
                                            echo '<tr><td colspan="5" align="center">Tidak ada data!</td></tr>';    
                                        }
                                            else
                                        {   
                                            $no = 1;                
                                            while($data = mysqli_fetch_array($query)){  
                                                
                                               
                                                echo '<option value='.$data['id_bus'].'>'.$data['kelas'].'</option>';
                                                
                                               
                                                
                                                
                                              
                                            }
                                        }
                            
                                ?>
            
         
            

          </select>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
            <div class="col-sm-6" align="right">
                <button class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
</div>