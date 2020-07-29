<!-- 	<style>
	table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #accaf9}

th {
    background-color: #3d66aa;
    color: white;
}
</style> -->


<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">tiket Masuk</h1>
          <p class="mb-4">Konfirmasi tiket yang masuk setelah pembayaran

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kofirmasi tiket Customers</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      	<th>No</th>
						<th>Tanggal Pesan</th>
            <th>Kode tiket</th>
						<th>NIK Pemesan</th>
						<th>Nama Pemesan</th>
						<th>Alamat</th>
						<th>Tanggal Berangkat</th>
						<th>Total</th>
						<th>Status</th>
						<th>Action</th>                  
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      	<th>No</th>
						<th>Tanggal Pesan</th>
            			<th>Kode tiket</th>
						<th>NIK Pemesan</th>
						<th>Nama Pemesan</th>
						<th>Alamat</th>
						<th>Tanggal Berangkat</th>
						<th>Total</th>
						<th>Status</th>
						<th>Action</th>  
                    </tr>
                  </tfoot>
                  <tbody>
                   <?php

						include '../config/koneksi.php';

						$query = mysqli_query($conn, "SELECT id_pesan, tgl_pesan, invoice, nik, nama, alamat, tgl_berangkat, total, konfirm FROM tiket WHERE fixed = '1' AND konfirm='0' ORDER BY tgl_berangkat ASC")or die(mysqli_error($conn));
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
              				<td><b><?php echo $data['invoice'] ?></b></td>
							<td><?php echo $data['nik']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['alamat']; ?></td>
							<td><?php echo $data['tgl_berangkat']; ?></td>
							<td><?php echo $data['total']; ?></td>
							<td align="center"><?php if ($data['konfirm']==0) echo "Belum Di Konfirmasi";
										elseif ($data['konfirm']==1) echo "Sudah Di Konfirmasi"; 
								?>	
							</td>	 						
					<?php
						echo '<td><a href=admin2.php?halaman=konfirmasi&&id_pesan='.$data['id_pesan'].'><span class="btn btn-primary">Konfirmasi</a></td>';
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