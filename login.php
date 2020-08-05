<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="vendor/sweetalert/sweetalert.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="vendor/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  <!-- Ionicons -->
   <!-- daterange picker -->
  <link rel="stylesheet" href="vendor/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->

  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->

</head>

  <?php 
  if(isset($_GET['pesan'])){
    if($_GET['pesan']=="gagal"){
     // echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
      echo '<script type="text/javascript">
                setTimeout(function (){
                swal({
                    title: "Opps...!!!",
                    text : "Username Or Password Wrong!!!",
                    type : "error",
                    showConfirmButton: true
                    });
                        });
            </script>';
    }
  }
  ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>FROM</b> LOGIN
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="login_aksi.php" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label class="form-check-label">
                <strong> Remember Me</strong>
              </label>
            </div>
          </div>
          <!-- /.col -->
       
          <!-- /.col -->
        </div>
        <br>
           <div class="row">
            <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
      </form>


      <!-- /.social-auth-links -->
<br>
      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="vendor/jquery/sweetalert/sweetalert.min.js"></script>

</body>
</html>
