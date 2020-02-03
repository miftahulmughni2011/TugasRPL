<?php
include("session/session_check.php");
$username=$_SESSION['username'];
?>

<?php

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    include "kodepes.php";
    include "kodepes2.php";
    $koneksi = new mysqli("localhost","root","","broto");
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>MR Broto Restaurant</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">MR Broto</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

                    <!--LIST MENU-->
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Broto">
          <a class="nav-link" href="?page=">
            <i class=""></i>
            <span class="nav-link-text"></span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Broto">
          <a class="nav-link" href="?page=pemesanan&kodepes=<?php echo $kode; ?>">
            <i class=""></i>
            <span class="nav-link-text">Pemesanan</span>
          </a>
        </li>
        <!--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="?page=kategori">
            <i class=""></i>
            <span class="">Kategori</span>
          </a>
        </li> -->

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class=""></i>
            <span class="">Dapur</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="?page=makanan">Pengolahan Makanan</a>
            </li>
            <li>
              <a href="?page=bahan">Pengolahan Bahan Baku</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="?page=pembayaran">
            <i class=""></i>
            <span class="">Pembayaran</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="?page=kuisioner">
            <i class=""></i>
            <span class="">Kuisioner</span>
          </a>
        </li>


        <!--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="">Kecamatan</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="login.html">Login Page</a>
            </li>
            <li>
              <a href="register.html">Registration Page</a>
            </li>
            <li>
              <a href="forgot-password.html">Forgot Password Page</a>
            </li>
            <li>
              <a href="blank.html">Blank Page</a>
            </li>
          </ul>
        </li> -->


      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">




          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="fa fa-fw fa-sign-out"></i> (<?php echo $_SESSION['username'] ?>) Logout</a>
          </li>
        </ul>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

      <div class="row">
        <div class="col-12">
          <?php
              $page = $_GET['page'];
              $aksi = $_GET['aksi'];

              if($page == "")
              {
                if($aksi == ""){
                  include "page/home/home.php";
                }
              }

              if($page == "pemesanan")
              {
                if($aksi == ""){
                  include "page/pemesanan/pemesanan.php";
                }

                if($aksi == "tambah"){
                    include "page/pemesanan/tambah.php";
                }

                if($aksi == "tambahpel"){
                    include "page/pemesanan/tambahpel.php";
                }

                if($aksi == "ubah"){
                  include "page/pemesanan/ubah.php";
                }

                if($aksi == "hapus"){
                  include "page/pemesanan/hapus.php";
                }

              }

              if($page == "pembayaran")
              {
                if($aksi == ""){
                  include "page/pembayaran/pembayaran.php";
                }

                if($aksi == "lihat"){
                  include "page/pembayaran/lihat.php";
                }

                if($aksi == "cetak"){
                  include "page/pembayaran/cetak.php";
                }


                if($aksi == "bayar"){
                  include "page/pembayaran/bayar.php";
                }

                if($aksi == "hapus"){
                  include "page/pembayaran/hapus.php";
                }
              }

              if($page == "bahan")
              {
                if($aksi == ""){
                  include "page/bahan/bahan.php";
                }

                if($aksi == "tambah"){
                  include "page/bahan/tambah.php";
                }

                if($aksi == "ubah"){
                  include "page/bahan/ubah.php";
                }

                if($aksi == "hapus"){
                  include "page/bahan/hapus.php";
                }
              }

              if($page == "makanan")
              {
                if($aksi == ""){
                  include "page/makanan/makanan.php";
                }

                if($aksi == "tambah"){
                    include "page/makanan/tambah.php";
                }

                if($aksi == "ubah"){
                  include "page/makanan/ubah.php";
                }

                if($aksi == "hapus"){
                  include "page/makanan/hapus.php";
                }
              }


              if($page == "kuisioner")
              {
                if($aksi == ""){
                  include "page/kuisioner/kuisioner.php";
                }

                if($aksi == "tambah"){
                    include "page/kuisioner/tambah.php";
                }

                if($aksi == "ubah"){
                  include "page/kuisioner/ubah.php";
                }

                if($aksi == "hapus"){
                  include "page/kuisioner/hapus.php";
                }
              }


          ?>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>
</body>

</html>
