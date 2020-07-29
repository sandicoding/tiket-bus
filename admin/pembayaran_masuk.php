

 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Pembayaran Masuk</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Pembayaran</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      	<th>No</th>
						<th>Tanggal Pesan</th>
						<th>NIK Pemesan</th>
						<th>Nama Pemesan</th>
						<th>Tanggal Berangkat</th>
						<th>Total</th>
						<th>Bukti</th>
						<th>Status</th>
						<th>Action</th>                   
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      	<th>No</th>
						<th>Tanggal Pesan</th>
						<th>NIK Pemesan</th>
						<th>Nama Pemesan</th>
						<th>Tanggal Berangkat</th>
						<th>Total</th>
						<th>Bukti</th>
						<th>Status</th>
						<th>Action</th> 
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

						$query = mysqli_query($conn, "SELECT id_pesan, tgl_pesan, nik, nama, tgl_berangkat, total, respons, pembayaran FROM tiket WHERE respons != '' ORDER BY tgl_berangkat ASC")or die(mysqli_error($conn));
										if(mysqli_num_rows($query) == 0){	
											echo '<tr><td colspan="5" align="center">Tidak ada data!</td></tr>';		
										}
											else
										{	
											$no = 1;				
											while($data = mysqli_fetch_array($query)){ 
					?>

						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $data['tgl_pesan']; ?></td>
							<td><?php echo $data['nik']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['tgl_berangkat']; ?></td>
							<td><?php echo $data['total']; ?></td>
							<td><img class="img-profile rounded-circle" src="../<?php echo $data['respons']; ?>" width="60" height="60"></td>
							<td align="center"><?php if ($data['pembayaran']==0) echo "Belum Di Konfirmasi";
										elseif ($data['pembayaran']==1) echo "Sudah Di Konfirmasi"; 
								?>	
							</td>		 						
					<?php
						echo '<td><a href=admin2.php?halaman=konfirmasi_pembayaran&&id_pesan='.$data['id_pesan'].'><span class="btn btn-primary">Konfirmasi</a></td>';
						echo "</tr>";
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