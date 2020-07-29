<br><br><br><br>
    <h3>
        <!-- <div align="center" style="margin-top: 50px;"><h1>Info Trayek</h1></div> -->
    </h3>
    <br><br><br>
	
	<!-- <form class="form-horizontal">
  		<table class="table table-striped">
    		<thead>
      			<tr>
					<th>No</th>
					<th>Tujuan</th>
					<th>Jadwal</th>
					<th>Rute</th>	
     			</tr>
    		</thead>
    		<tbody>
    			<?php

    				include 'config/koneksi.php';

					$query = mysqli_query($conn, "SELECT * FROM keberangkatan ORDER BY tujuan ASC")or die(mysqli_error());
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
								$no++;	
							}
						}
			
				?>
    		</tbody>
  		</table>
	</form> -->

	<br><br>
	<div align="center" style="margin-top: 50px;"><h1>trayek Ready</h1></div>
	<br><br>
	<form class="form-horizontal">
  		<table class="table table-striped">
    		<thead>
      			<tr>
					<th>No</th>
					<th>Tujuan</th>
					<th>Jadwal</th>
					<th>Rute</th>
					<th>Bus</th>
					<th>Harga</th>
					<th>Status</th>	
     			</tr>
    		</thead>
    		<tbody>
    			<?php

    				include 'config/koneksi.php';

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
								if($data['status'] == 'menunggu'){
									echo '<td>bus Sedang menunggu penumpang</td>'; 
								} elseif($data['status'] == 'berangkat'){
									echo '<td>bus Sedang berangkat</td>'; 
								}else {
									echo '<td>bus tidak beroprasi</td>';
								}  
								$no++;	
							}
						}
			
				?>
    		</tbody>
  		</table>
	</form>

