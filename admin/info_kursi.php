<?php 
include "../config/koneksi.php";




 ?>
  <div class="row">
	<div class="col-md-12">
		<h2><p><center>Manajemen Kursi</center></p></h3>
		<hr><br>
		<button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>Tambah</button>
		<br><br>
		 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kursi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Kursi</th>
                      <th>Bus</th>   
                      <th>Urutan</th>                   
                      <th class="text-center">Aksi</th> 
                                          
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>No</th>
                      <th>Kode Kursi</th>
                      <th>Bus</th>  
                      <th>Urutan</th>                    
                      <th class="text-center">Aksi</th>
                          
                    </tr>
                  </tfoot>
                  <tbody>                  
                    <?php

						include '../config/koneksi.php';

						$query = mysqli_query($conn, "SELECT kursi.id,kursi.urutan,kursi.kode_kursi,bus.kelas FROM kursi inner join bus on kursi.id_bus=bus.id_bus")or die(mysqli_error($conn));
										if(mysqli_num_rows($query) == 0){	
											echo '<tr><td colspan="5" align="center">Tidak ada data!</td></tr>';	
										}
											else
										{	
											$no = 1;				
											while($data = mysqli_fetch_array($query)){	
						 						echo '<tr>';
												echo '<td>'.$no.'</td>';
												echo '<td>'.$data['kode_kursi'].'</td>';
												echo '<td>'.$data['kelas'].'</td>';
                        echo '<td>'.$data['urutan'].'</td>';
												echo '<td class="text-center"><a class="mx-4" href=admin2.php?halaman=edit_kursi&&id='.$data['id'].'><span class="btn btn-primary">Edit</a><a href=../config/delete_kursi.php?id='.$data['id'].'><span class="btn btn-danger">Delete</span></a></td>';
												
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
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

    	<!-- Modal content-->
    	<div class="modal-content">
      		<div class="modal-header">
      			<h4 class="modal-title">Tambahkan Data Kursi</h4>
        		<button type="button" class="close text-right" data-dismiss="modal">&times;</button>
        		
      		</div>
      		<div class="modal-body">
      			<form action="../config/add_kursi.php" class="form-horizontal" method="POST">
      				<div class="form-group">
      					<label class="control-label col-sm-4">Kode Kursi :</label>
      				    <div class="col-sm-6">
      				        <input type="text" class="form-control" name="kodeKursi" placeholder="Kode Kursi">
      				    </div>
      				</div>
      				<div class="input-group mb-3 col-sm-6">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Bus</label>
                </div>
                <select class="custom-select" name="bus" id="inputGroupSelect01">
                  <option>Pilih Bus</option>
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
              <div class="input-group mb-3 col-sm-6">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Urutan</label>
                </div>
                <select class="custom-select" name="urutan" id="inputGroupSelect01">
                  <option>Pilih Urutan</option>
                  <?php 
                    $no = 1;
                    for ($i=1; $i <=25 ; $i++) { ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                    <?php } ?>
                </select>
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