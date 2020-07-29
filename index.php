<?php
	
	include 'config/koneksi.php';

	session_start();

	if(isset($_GET['halaman'])) $halaman = $_GET['halaman']; 
	    else $halaman = "index";

	if(@$_SESSION["level"] == "admin")
	{
		header("Location: http://localhost/pemesanan-tiket-bus-master/admin/admin2.php", true, 301);
	}else {



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>PO. Tiket Bus</title>

	<script src="bootstrap/js/jquery.js"></script>
	
	<!-- Memanggil CSS bootstrap -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	
	<link rel="stylesheet" href="bootstrap/datepicker/themes/base/jquery.ui.all.css">
	<!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
	
  <!-- Custom fonts for this template -->
	  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
		<!-- Start JS Datepicker -->
	<script src="bootstrap/js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<link href="css/agency.min.css" rel="stylesheet">

	<style type="text/css">
	    .row {
	    	padding-bottom: 15px;
	    	padding-top: 15px;
	    }
	    
	</style>
</head>


<body>

	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background: #f1fcfc">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<a href="index.php"><img src="images/logo2.png"  sizes="relative"></a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				    <span class="sr-only">Toggle navigation</span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
				    <li>
				        <a class="mt-3" href="index.php?halaman=cara_pesan" style="color: #010102">
				            <span class="glyphicon glyphicon-list-alt"></span>
				            Cara Pemesanan
				        </a>
				    </li>
				    <li>
				        <a href="index.php?halaman=trayek" style="color: #010102">
				        	<span class="glyphicon glyphicon-road"></span>
				            Melihat Jalur
				        </a>
				    </li>
				    <li>
				        <a href="index.php?halaman=pemesanan" style="color: #010102">
				            <span class="glyphicon glyphicon-pencil"></span>
				            Tiket
				        </a>
				    </li>
				    <li>
				        <a href="index.php?halaman=cek_proses" style="color: #010102">
				            <span class="glyphicon glyphicon-check"></span>
				            Cek Pemesanan
				        </a>
				    </li>
				    <li>
				    	<a href="index.php?halaman=konfirmasi_pembayaran" style="color: #010102">
				    	    <span class="glyphicon glyphicon-share"></span>
				    	    Konfirmasi Pembayaran
				    	</a>
				    </li>
				    <li style="height: 60px;">
				    	<?php 
				    	if(@$_SESSION['username'])
				    	{
				    	 ?>
				    	 <a class="nav-link dropdown-toggle" style="margin-top: -9px;" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo @$_SESSION['username']; ?></span>
			                <!-- <img class="img-profile img-circle img-fluid" style="width: 43px;height: 43px;" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
			              </a>
			              <!-- Dropdown - User Information -->
			              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">               
			                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
			                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
			                  Keluar
			                </a>
			              </div>
				    	 <?php  
				    	}else { ?>
				    	<a href="login.php" style="color: #010102">
				    	    <i class="fas fa-sign-in-alt"></i>
				    	    Login
				    	</a>
				    	<?php 
				    	} ?>
				    </li>
				</ul>
			</div>
			<!-- / navbar collapse -->
		</div>
		<!-- / container -->
	</nav>


	<?php

		if ($halaman=='index')
			include 'slideimage.php';
		elseif ($halaman=='cara_pesan')
			include 'cara_pesan.php';
	?>

	<!-- Content -->
	<div class="container">
		<div class="row">
			<br>
			<br>
			<div class="col-md-12">
				
			</div>
			<div class="col-md-2">
				
			</div>
			<div class="col-md-8">
				<?php
					
					//menu navbar
					if ($halaman=='trayek')
						include 'trayek.php';
					elseif ($halaman=='pemesanan')
						include 'pemesanan.php';
					elseif ($halaman=='cek_proses')
						include 'cek_proses.php';
					elseif ($halaman=='konfirmasi_pembayaran')
						include 'konfirmasi_bayar.php';

					//footer
					elseif ($halaman=='info_pembayaran')
						include 'info_pembayaran.php';
					elseif ($halaman=='about')
						include 'about.php';

					//kursi
					elseif ($halaman=='kursi_ekonomi')
						include 'kursi_ekonomi.php';
					elseif ($halaman=='kursi')
						include 'kursi.php';

					//pemesanan
					elseif ($halaman=='konfirmasi')
						include 'konfirmasi_pesan.php';
					elseif ($halaman=='invoice')
						include 'invoice.php';

				?>
				<br><br>
			</div>
			<div class="col-md-2">
				
			</div>
		</div>
		
		<br><br><br><br><br><br>

	</div>

	<footer style="background:#5b8c85;">
	    <div class="container">
	    	<!-- Contact us form -->
	    	<div class="col-md-4" style="margin-top: 30px;">
	    		<div class="headline">
	    		    <h4><font color="#FFFFFF">CONTACT US</font></h4>
	    		</div>
	    		<hr>
	    		<div class="content">
	    			<font color="#FFFFFF">
	    				<h5>
	    					<p>
	    						<span class="glyphicon glyphicon-map-marker">&nbsp;</span>
	    					    Jl. Sultan Agung Raya KM. 27 No. 24, Bekasi Barat, Bekasi.
	    					</p>

	    					<p>
	    						<span class="glyphicon glyphicon-earphone">&nbsp; </span>  
	    					    (021) 889-586-31
	    					</p>
	    					<p>
	    						<span class="glyphicon glyphicon-calendar">&nbsp;</span>
	    						Sunday - Saturday
	    					</p>
	    					<p>
	    						<span class="glyphicon glyphicon-time">&nbsp;</span>
	    						9:00 AM until 5:00 PM
	    					</p>
	    				</h5>
	    			</font>            
	    		</div>
	    	</div>
	    	<div class="col-md-4" style="margin-top: 30px;">
	    	    <div class="headline">
	    	        <h4><font color="#FFFFFF">TRAYEK</font></h4>
	    	    </div>
	    	    <hr>
	    	    <div class="content">
	    	    	<font color="#FFFFFF">
	    				<h5>
	    					<p>
	    						Agen Pondok Ungu - Purwokerto    
	    					</p>
	    					<p>
	    						Agen Pondok Ungu - Yogyakarta
	    					</p>
	    				</h5>
	    			</font>            
	    	    </div>
	    	</div>
	    	<div class="col-md-4" style="margin-top: 30px;">
	    	    <div class="headline">
	    	        <h4><font color="#FFFFFF">ABOUT US</font></h4>
	    	    </div>
	    	    <hr>
	    	    <div class="content">
	    	    	<font color="#FFFFFF">
	    				<h5>
	    					<p>
	    						<a href="index.php?halaman=info_pembayaran" style="color: #FFFFFF">
	    							INFO PEMBAYARAN
	    						</a>    
	    					</p>
	    					<p>
	    						<a href="index.php?halaman=about" style="color: #FFFFFF">
	    							ABOUT Tiket Bus
	    						</a>
	    					</p>
	    				</h5>
	    			</font>            
	    	    </div>	
	    	</div>
	    	<!--</div>-->

	    	<div class="col-md-12 text-center">
	    		<hr>
	    		<font color="#FFFFFF">
	    			<p>
	    				Copyright &copy; 2020
	    			</p>
	    		</font>
	    	</div>	
	    		
	    </div>
	</footer>

	<!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Jika ya klik keluar</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="config/proses_logout2.php">Keluar</a>
        </div>
      </div>
    </div>
  </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
 <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<!-- <script src="bootstrap/datepicker/ui/jquery.ui.core.js"></script>
		<script src="bootstrap/datepicker/js/ui/jquery-ui.-1.8.19.custom.js"></script>

		<script src="bootstrap/datepicker/ui/jquery.ui.widget.js"></script>
		<script src="bootstrap/datepicker/ui/jquery.ui.datepicker.js"></script> -->
		<script>
			$(function() {
			    $( "#date" ).datepicker(
			    	format: 'MM/DD/YYYY'
			    		
			    );
			});
		</script> 
		<script>
	            $(".input-group.date").datepicker({autoclose: true, todayHighlight: true})
	    </script>
	    
</html>


<?php } ?>
 

