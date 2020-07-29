
<div class="row">
	<div class="col-md-12">
		<h2><p><center>Manajemen User</center></p></h3>
		<hr><br>
		<button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>Tambah</button>
		<br><br>
		 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">User</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <!-- <th>Password</th> -->
                      <th>Level</th>
                      <th>Aksi</th>                     
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>No</th>
                      <th>Username</th>
                      <!-- <th>Password</th> -->
                      <th>Level</th>
                      <th>Aksi</th>    
                    </tr>
                  </tfoot>
                  <tbody>                  
                    <?php

            include '../config/koneksi.php';

            $query = mysqli_query($conn, "SELECT id_user, username, password, level FROM user")or die(mysqli_error());
                    if(mysqli_num_rows($query) == 0){ 
                      echo '<tr><td colspan="4" align="center">Tidak ada data!</td></tr>';    
                    }
                      else
                    { 
                      $no = 1;   
                      
                      while($data = mysqli_fetch_array($query)){  
                        echo '<tr>';
                        echo '<td>'.$no.'</td>';
                        echo '<td>'.$data['username'].'</td>';
                                    // echo '<td>'.md5($data['password']).'</td>';
                        echo '<td>'.$data['level'].'</td>';
                        echo '<td><a class="mx-2" href=admin2.php?halaman=edit_user&&id_user='.$data['id_user'].'><span class="btn btn-primary">Edit</a><a href=../config/delete_user.php?id_user='.$data['id_user'].'><span class="btn btn-danger">Delete</span></a></td>';
                        
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
            <h4 class="modal-title" align="center">Tambahkan User</h4>
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		
      		</div>
      		<div class="modal-body">
      			<form action="../config/add_user.php" class="form-horizontal" method="POST">
      				<div class="form-group">
      					<label class="control-label col-sm-4">Username :</label>
      				    <div class="col-sm-6">
      				        <input type="username" class="form-control" name="username" placeholder="Username">
      				    </div>
      				</div>
      				<div class="form-group">
      				    <label class="control-label col-sm-4">Password :</label>
      				    <div class="col-sm-6">
      				        <input type="password" class="form-control" name="password" placeholder="Password">
      				    </div>
      				</div>
              <div class="form-group">
                  <label class="control-label col-sm-4">Level :</label>
                  <div class="col-sm-6">
                    <select  type="level" class="form-control" name="level">
                      <option>admin</option>
                    </select>  
                  </div>
              </div>
      				<div class="form-group">
      				    <label class="control-label col-sm-4"></label>
      				    <div class="col-sm-6" align="right">
      				        <button class="btn btn-primary">Simpan</button>
      				    </div>
      				</div>
      			</form>
      		</div>
      		<div class="modal-footer">
        		
      		</div>
    	</div>
  	</div>
</div>