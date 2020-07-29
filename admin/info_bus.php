
  
  <div class="row">
	<div class="col-md-12">
		<h2><p><center>Manajemen Bus</center></p></h3>
		<hr><br>
		<button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>Tambah</button>
		<br><br>
		 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Bus</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Bus</th>
                      <th>Harga</th>
                      <th>tujuan</th>
                      <th>rute</th>
                      <th>Jadwal</th>                      
                      <th class="text-center">Aksi</th> 
                                          
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>No</th>
                      <th>Nama Bus</th>
                      <th>Harga</th>
                      <th>tujuan</th>
                      <th>rute</th>
                      <th>Jadwal</th>                      
                      <th class="text-center">Aksi</th>
                          
                    </tr>
                  </tfoot>
                  <tbody>                  
                    <?php

						include '../config/koneksi.php';

						$query = mysqli_query($conn, "SELECT bus.id_bus, bus.kelas, bus.harga, bus.id_berangkat, keberangkatan.tujuan, keberangkatan.rute, keberangkatan.jadwal FROM bus left join keberangkatan on bus.id_berangkat = keberangkatan.id_berangkat union SELECT bus.id_bus, bus.kelas, bus.harga, bus.id_berangkat, keberangkatan.tujuan, keberangkatan.rute, keberangkatan.jadwal FROM bus right join keberangkatan on bus.id_berangkat = keberangkatan.id_berangkat")or die(mysqli_error($conn));
										if(mysqli_num_rows($query) == 0){	
											echo '<tr><td colspan="5" align="center">Tidak ada data!</td></tr>';	
										}
											else
										{	
											$no = 1;				
											while($data = mysqli_fetch_array($query)){	
						 						echo '<tr>';
												echo '<td>'.$no.'</td>';
												echo '<td>'.$data['kelas'].'</td>';
												echo '<td>'.$data['harga'].'</td>';
                        if($data['id_berangkat'] == 0){
                          echo '<td colspan="2">bus belom di set keberangkatan<td>';


                        }else{
                        echo '<td>'.$data['tujuan'].'</td>';
                        echo '<td>'.$data['rute'].'</td>';
                        echo '<td>'.$data['jadwal'].'</td>';
                      }
												echo '<td class="text-center"><a class="mx-4" href=admin2.php?halaman=edit_bus&&id_bus='.$data['id_bus'].'><span class="btn btn-primary">Edit</a><a href=../config/delete_bus.php?id_bus='.$data['id_bus'].'><span class="btn btn-danger">Delete</span></a></td>';
												
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
      			<h4 class="modal-title">Tambahkan Data Bus</h4>
        		<button type="button" class="close text-right" data-dismiss="modal">&times;</button>
        		
      		</div>
      		<div class="modal-body">
      			<form action="../config/add_bus.php" class="form-horizontal" method="POST">
      				<div class="form-group">
      					<label class="control-label col-sm-4">Nama Bus</label>
      				    <div class="col-sm-6">
      				        <input type="kelas" class="form-control" name="kelas" placeholder="Kelas">
      				    </div>
      				</div>
      				<div class="form-group">
      				    <label class="control-label col-sm-4">Harga :</label>
      				    <div class="col-sm-6">
      				        <input type="harga" class="form-control" name="harga" placeholder="Harga">
      				    </div>
      				</div>
               <div class="input-group mb-3 col-sm-6">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Bus</label>
          </div>
          <select class="custom-select" name="keberangkatan" id="inputGroupSelect01">
            <option>Pilih keberangkatan</option>
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


