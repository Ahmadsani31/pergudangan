<?php 
  session_start();
  ob_start();
  include "connection.php";
  // cek apakah yang mengakses halaman ini sudah login
  if(empty($_SESSION['level']=="member")){
    header("location:login.php");
  }else{
    if (isset($_GET['p'])) {
      $page = $_GET['p'];
    }else{
      $page = "";
    }
  $id_user = $_SESSION['id'];
    }
$queryUser = mysqli_query($conn, "SELECT * FROM user WHERE id ='$id_user'") or die(mysqli_error($conn));
$sqlUser = mysqli_fetch_array($queryUser);
 
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="icon" type="image/png" sizes="16x16" href="dist/img/dunlop-icon.png">
  <title>Dunlop | Dashboard</title>
  <!-- Font Awesome Icons -->

  <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link href="vendor/sweetalert/sweetalert.css" rel="stylesheet">
  <!-- Theme style -->
   <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <script src="vendor/jquery/jquery.min.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed small">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link py-0" data-toggle="dropdown" href="#">
          <span class="mr-2 d-lg-inline">Selamat Datang !! <strong> <?php echo $sqlUser['nama']; ?></strong></span>
          <img class="img-circle elevation-2" src="dist/img/user1-40x40.jpg" width="35">
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in text-sm" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="?p=blank">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>    
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
          <div class="dropdown-divider"></div>
            <div class="sweetalert ">
               <a class="dropdown-item sweet-confirm" href="#" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>                                        
            </div>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-gray elevation-4 sidebar-no-expand">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link navbar-light" >
      <img src="dist/img/dunlop-icon (copy).png" alt="AdminLTE Logo" width="50" 
           style="opacity: .">
     <span class="brand-text font-weight-light"><img src="dist/img/dunlop-logo (copy).png" alt="AdminLTE Logo" width="180"
           style="opacity: ."></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="padding-top: 40px;">
      <!-- Sidebar user panel (optional) -->
       <div class="user-panel mt-3 pb-3">
      <ul class="nav nav-pills nav-sidebar flex-column" >
           <li class="nav-item ">
          <a href="?p=dashboard" class="nav-link text-white" id="menu" style="background-color: #009933">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          </ul>
        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a <?php if (($page=="peminjaman") ||($page=="data") ){echo "class='nav-link active'"; } ?> href="?p=peminjaman" class="klik_menu nav-link" id="menu">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Buat Peminjaman
                <i class="far fa-dot-circle right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a <?php if ($page=="pinjaman_data"){echo "class='nav-link active'"; } ?> href="?p=pinjaman_data" class="klik_menu nav-link" id="menu">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Data Peminjam
                <i class="far fa-dot-circle right"></i>
              </p>
            </a>
          </li>
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="?p=page" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?p=page" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=page" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=page" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

      <?php
        if(isset($_GET['p'])){
      if ($_GET['p']== "dashboard" || $_GET['p'] == ""){
        include "dashboard.php";
      }
      else if ($_GET['p'] == "home") {
          include "home.php";
      }
      else if ($_GET['p'] == "mobil") {
          include "mobil.php";
      }
      else if ($_GET['p'] == "mobil_awal") {
          include "mobil_awal.php";
      }
      else if ($_GET['p'] == "session") {
          include "karyawan_session.php";
      }
      else if ($_GET['p'] == "blank_ajax") {
          include "blank-ajax.php";
      }
      else if ($_GET['p'] == "mobil_query") {
          include "mobil-query.php";
      }
      else if ($_GET['p'] == "mobil_aksi") {
          include "mobil-aksi-query.php";
      }
      else if ($_GET['p'] == "produk") {
          include "produk.php";
      }
      else if ($_GET['p'] == "produk-del") {
          include "produk-del.php";
      }
      else if ($_GET['p'] == "hapus_card") {
          include "hapus-card.php";
      }

      else if ($_GET['p'] == "edit_card") {
          include "edit-card.php";
      }


      else if ($_GET['p'] == "view") {
          include "view.php";
      }
      else if ($_GET['p'] == "shop") {
          include "shop.php";
      }
      else if ($_GET['p'] == "view_mobil") {
          include "view-mobil.php";
      }
      else if ($_GET['p'] == "card") {
          include "card.php";
      }
      else if ($_GET['p'] == "session_hapus") {
          include "session_hapus.php";
      }
      else if ($_GET['p'] == "karyawan_session") {
          include "query-ajax/karyawan_session.php";
      }
      else if ($_GET['p'] == "mobil_ajax_ukuran") {
          include "query-ajax/mobil-ajax-ukuran.php";
      }
      else if ($_GET['p'] == "delete-card") {
          include "delete_card.php";
      }

      else if ($_GET['p'] == "peminjaman") {
          include "peminjaman/index.php";
      }else if ($_GET['p'] == "data") {
          include "peminjaman/data.php";
      }else if ($_GET['p'] == "proses") {
          include "peminjaman/proses.php";
      }

      else if ($_GET['p'] == "pinjaman_data") {
          include "pinjaman_data.php";
      }

      else if ($_GET['p'] == "print") {
          include "print.php";
      }
      else if ($_GET['p'] == "eror404") {
          include "eror404.php";
      }

      else if ($_GET['p'] == "logout") {
          include "logout.php";
      }else{
          include "eror404.php";
        }
      }else{
          include "dashboard.php";
      }
  ?>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer small">
    <strong>Copyright &copy; 2000 - 2020 <a href="http://adminlte.io">Dunlop.inc</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.1
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- Toastr -->
<!-- OPTIONAL SCRIPTS -->


<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="vendor/jquery/sweetalert/sweetalert.min.js"></script>
<!-- ChartJS -->
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>
<!-- PAGE SCRIPTS -->

</body>
</html>
<script type="text/javascript">
//  $(document).ready(function(){
  //  $("li a").click(function(){
  //    $("a").removeClass('active');
  //    $(this).addClass('active');
 //   });
//  });

  document.querySelector('.sweet-confirm').onclick = function(){
    swal({
            title: "Are you sure to Log Out ?",
            text: "kamu akan keluar dari from ini!!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: false
        },
        function(){
              swal({
              title : "Berhasil Logout!",
              type : "success",
              showConfirmButton: false,
              timer :1000
              },function(){
                window.location.href = "logout_aksi.php";
                });
        });
};
</script>