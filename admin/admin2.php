<?php
include "../config/koneksi.php";
session_start();
if(isset($_GET['halaman'])) $halaman = $_GET['halaman']; 
      else $halaman = "index";

if(@$_SESSION["level"] == "user"){
  // header('location : ../admin/index.php');
  header("Location: http://localhost/pemesanan-tiket-bus-master/index.php", true, 301);
}else 
{


?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TiketBus Admin</title>

  <!-- Custom fonts for this template-->
  <link href="http://localhost/pemesanan-tiket-bus-master/admin/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="http://localhost/pemesanan-tiket-bus-master/admin/backend/css/sb-admin-2.min.css" rel="stylesheet">
   <!-- Custom styles for this page -->
  <link href="http://localhost/pemesanan-tiket-bus-master/admin/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
   <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">       
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="admin2.php?halaman=awal">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="admin2.php?halaman=keberangkatan_bus">
          <i class="fas fa-fw fa-bus"></i>
          <span>Keberangkatan Bus</span></a>
      </li>      

       <li class="nav-item">
        <a class="nav-link" href="admin2.php?halaman=pesan_masuk">
          <i class="fas fa-fw fa-ticket-alt"></i>
          <span>tiket Masuk</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="admin2.php?halaman=bukti_bayar">
          <i class="fas fa-fw fa-images"></i>
          <span>Verifikasi</span></a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Menejemen</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manejemen</h6>
            <a class="collapse-item" href="admin2.php?halaman=manajemen_user">User</a>
            <a class="collapse-item" href="admin2.php?halaman=manajemen_bus">Bus</a>
            <a class="collapse-item" href="admin2.php?halaman=manajemen_kursi">Kursi</a>
            <a class="collapse-item" href="admin2.php?halaman=manajemen_berangkat">Keberangkatan</a>
            <a class="collapse-item" href="admin2.php?halaman=manajemen_pembayaran">Pembayaran</a>

          </div>
        </div>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="admin2.php?halaman=laporan">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Laporan</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>         
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">          
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo @$_SESSION['username']; ?></span>
                <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">               
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </div>
            </li>

          </ul>
        
        </nav>
        <!-- End of Topbar -->         <!-- Begin Page Content -->
        <?php

          //menu navigasi admin
            if ($halaman=='awal')
              include 'awal.php';
            elseif ($halaman=='pesan_masuk')
              include 'pesanan_masuk.php';
            elseif ($halaman=='bukti_bayar')
              include 'pembayaran_masuk.php';
            elseif ($halaman=='manajemen_user')
              include 'info_user.php';
            elseif ($halaman=='manajemen_trayek')
              include 'info_trayek.php';
            elseif ($halaman=='manajemen_bus')
              include 'info_bus.php';
            elseif ($halaman=='manajemen_berangkat')
              include 'info_keberangkatan.php';
            elseif ($halaman=='manajemen_pembayaran')
              include 'info_pembayaran.php';
            elseif ($halaman=='konfirmasi')
              include 'konfirmasi.php';
            elseif ($halaman=='konfirmasi_pembayaran')
              include 'konfirmasi_pembayaran.php';
            elseif ($halaman=='laporan')
              include 'laporan.php';
            elseif ($halaman == 'manajemen_kursi')
              include 'info_kursi.php';
            elseif ($halaman == 'keberangkatan_bus')
              include 'keberangkatan_bus.php';
            elseif ($halaman == 'kursi_bus')
              include 'kursi_bus.php';    

            //halaman edit
            elseif ($halaman=='edit_user')
              include 'edit_user.php';
            elseif ($halaman=='edit_info')
              include 'edit_info.php';
            elseif ($halaman=='edit_bus')
              include 'edit_bus.php';
            elseif ($halaman=='edit_berangkat')
              include 'edit_berangkat.php';
            elseif ($halaman=='edit_pembayaran')
              include 'edit_pembayaran.php';
            elseif ($halaman =='edit_kursi')
              include 'edit_kursi.php';

         ?>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
    <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Admin</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

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
          <a class="btn btn-primary" href="../config/proses_logout.php">Keluar</a>
        </div>
      </div>
    </div>
  </div>

<!-- Bootstrap core JavaScript-->
  <script src="http://localhost/pemesanan-tiket-bus-master/admin/backend/vendor/jquery/jquery.min.js"></script>
  <script src="http://localhost/pemesanan-tiket-bus-master/admin/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="http://localhost/pemesanan-tiket-bus-master/admin/backend/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="http://localhost/pemesanan-tiket-bus-master/admin/backend/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="http://localhost/pemesanan-tiket-bus-master/admin/backend/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="http://localhost/pemesanan-tiket-bus-master/admin/backend/js/demo/chart-area-demo.js"></script>
  <script src="http://localhost/pemesanan-tiket-bus-master/admin/backend/js/demo/chart-pie-demo.js"></script>
  <!-- datatables -->
  <script src="http://localhost/pemesanan-tiket-bus-master/admin/backend/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="http://localhost/pemesanan-tiket-bus-master/admin/backend/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="http://localhost/pemesanan-tiket-bus-master/admin/backend/js/demo/datatables-demo.js"></script>
</body>
</html>

<?php
} 
?>
