<?php
include '../config/koneksi.php';


?>

<div align="center" style="margin-top: 50px;"><h1>Managemen Keberangkatan Bus</h1></div>
	
	<form class="form-horizontal">
  		<table class="table table-striped">
    		<thead>
      			<tr>
					<th>No</th>
					<th>Tujuan</th>
					<th>Jadwal</th>
					<th>Rute</th>
					<th>Bus</th>
					<th>harga</th>
                    <th>Status</th>
                    <th>Kursi</th>
                    <th>Aksi</th>	

     			</tr>
    		</thead>
    		<tbody>
    			<?php

    				
                    
					$query = mysqli_query($conn, "SELECT bus.id_bus, bus.kelas, bus.harga, bus.id_berangkat, bus.status, keberangkatan.tujuan, keberangkatan.rute, keberangkatan.jadwal FROM bus inner join keberangkatan on bus.id_berangkat = keberangkatan.id_berangkat ORDER BY keberangkatan.tujuan ASC");
						if(mysqli_num_rows($query) == 0){	
							echo '<tr><td colspan="3" align="center">Tidak ada data!</td></tr>';		
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
								echo '<td>'.$data['kelas'].'</td>';
                                echo '<td>'.$data['harga'].'</td>';
                                echo '<td>'.$data['status'].'</td>';
                                echo '<td><a href=admin2.php?halaman=kursi_bus&&id_bus='.$data['id_bus'].'><span class="btn btn-warning">Lihat Kursi</a></td>';
                                echo '<td><a href=../config/keberangkatan_bus.php?id_bus='.$data['id_bus'].'><span class="btn btn-primary">Berangkat</a>
                                      <a href=../config/selesai_keberangkatan_bus.php?id_bus='.$data['id_bus'].'><span class="btn btn-danger">Selesai</a>
                                      <a href=../config/ready_bus.php?id_bus='.$data['id_bus'].'><span class="btn btn-success">Ready</a>
                                </td>';
								$no++;	
							}
						}
			
				?>
    		</tbody>
  		</table>
	</form>