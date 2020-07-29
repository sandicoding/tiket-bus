<?php

	include "config/koneksi.php";

	$id_berangkat = $_GET["id_berangkat"];
	//$query_update = "UPDATE FROM bus SET id_berangkat = '$id_berangkat'";
	//$update_sql = mysqli_query($conn,$query_update)or die(mysqli_error($conn));
	//$query = "SELECT * FROM bus";
	//$sql = mysqli_query($conn,$query)or die(mysqli_error($conn));
	//$id_berangkat = $_GET["id_berangkat"];
	$query = "SELECT * FROM bus WHERE id_berangkat = '$id_berangkat'";
	$sql = mysqli_query($conn,$query)or die(mysqli_error());
	//$bus = mysqli_fetch_array($sql);
	if(mysqli_num_rows($sql) == 0 ){ ?>
		<option>bus tidak tersedia di pilihan tujuan anda</option>
<?php }else {

		while ($row = mysqli_fetch_array($sql)) {
			
			if($row['status'] == 'menunggu' ) {?>
		<option value="<?php echo $row['id_bus']; ?>"><?php echo $row["kelas"] ?> | <?php echo $row["harga"]; ?></option>
	<?php
			}else {
				echo '<option>bus sedang berangkat atau tidak beroprasi</option>';
			}
	}
}
	?>
