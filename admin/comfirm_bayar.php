  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Level</th>
                      <th>Aksi</th>                     
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>No</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Level</th>
                      <th>Aksi</th>    
                    </tr>
                  </tfoot>
                  <tbody>
                    <!-- <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011/07/25</td>
                      <td>$170,750</td>
                    </tr> -->
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
                                    echo '<td>'.$data['password'].'</td>';
                        echo '<td>'.$data['level'].'</td>';
                        echo '<td><a class="mx-2" href=admin.php?halaman=edit_user&&id_user='.$data['id_user'].'><span class="btn btn-primary">Edit</a><a href=../config/delete_user.php?id_user='.$data['id_user'].'><span class="btn btn-danger">Delete</span></a></td>';
                        
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
        <!-- /.container-fluid -->

      
      
