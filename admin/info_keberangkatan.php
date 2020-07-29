 
<div class="row">
	<div class="col-md-12">
		<h2><p><center>Manajemen Keberangkatan</center></p></h2>
		<hr>
    <br>
		<button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>Tambah</button>
		<br><br>
		<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Keberangkatan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <th>No</th>
                      <th>Tujuan</th>
                      <th>Jadwal</th>
                      <th>Rute</th>
                      <th><center>Action</center></th>
                      
                                          
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>No</th>
                      <th>Tujuan</th>
                      <th>Jadwal</th>
                      <th>Rute</th>
                      <th><center>Action</center></th>
                      
                          
                    </tr>
                  </tfoot>
                  <tbody>                  
                     <?php

                    include '../config/koneksi.php';

                    $query = mysqli_query($conn, "SELECT id_berangkat, tujuan, jadwal, rute FROM keberangkatan")or die(mysqli_error());
                            if(mysqli_num_rows($query) == 0){ 
                              echo '<tr><td colspan="5" align="center">Tidak ada data!</td></tr>';    
                            }
                              else
                            { 
                              $no = 1;        
                              while($data = mysqli_fetch_array($query)){  
                                echo '<tr>';
                                echo '<td>'.$no.'</td>';
                                echo '<td>'.$data['tujuan'].'</td>';
                                echo '<td>'.$data['jadwal'].'</td>';
                                echo '<td>'.$data['rute'].'</td>';
                                echo '<td><a href=admin2.php?halaman=edit_berangkat&&id_berangkat='.$data['id_berangkat'].'><span class="btn btn-primary">Edit</a><a class="ml-4" href=../config/delete_brgkt.php?id_berangkat='.$data['id_berangkat'].'><span class="btn btn-danger">Delete</span></a></td>';
                                
                                echo '</tr>';
                                $no++;  
                              }
                            }
                      
                        ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
	</div>
</div>

<!-- Modal Tambah Data Keberangkatan -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

      <!-- Modal content -->
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" align="center">Tambahkan Data Keberangkatan</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        
          </div>
          <div class="modal-body">
            <form action="../config/add_berangkat.php" class="form-horizontal" method="POST">
              <div class="form-group">
                <label class="control-label col-sm-4">Tujuan :</label>
                  <div class="col-sm-6">
                      <input type="tujuan" class="form-control" name="tujuan" placeholder="Tujuan">
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-4">Jadwal :</label>
                  <div class="col-sm-6">
                      <select  type="jadwal" class="form-control" name="jadwal" placeholder="Jadwal">
                        <option>--Pilih Jadwal Berangkat--</option>
                        <option>16:00 WIB</option>
                        <option>17:00 WIB</option>
                        <option>18:30 WIB</option>
                        <option>19:00 WIB</option>
                        <option>19:30 WIB</option>
                      </select>
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-4">Rute :</label>
                <div class="col-sm-6">
                  <input type="rute" class="form-control" name="rute" placeholder="Rute">
                </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-4"></label>
                  <div class="col-sm-6" align="right">
                      <button class="btn btn-danger">Simpan</button>
                  </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            
          </div>
      </div>
    </div>
</div>