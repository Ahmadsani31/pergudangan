  <link href="vendor/sweetalert/sweetalert.css" rel="stylesheet">
<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'connection.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"SELECT * FROM user WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

  $data = mysqli_fetch_assoc($login);

  // cek jika user login sebagai admin
  if($data['level']=="admin"){

    // buat session login dan username
    $_SESSION['id'] = $data['id'];
    $_SESSION['level'] = "admin";
    // alihkan ke halaman dashboard admin
    echo '<script type="text/javascript">
                setTimeout(function (){
                swal({
                    title: "WELLCOME",
                    text : "Selamat datang dihalam admin",
                    type : "success",
                    showConfirmButton: true
                    },function(){
                      window.location.href = "admin/index.php";
                              });
                        });
          </script>';

  // cek jika user login sebagai pegawai
  }else if($data['level']=="member"){
    // buat session login dan username
    $_SESSION['id'] = $data['id'];
    $_SESSION['level'] = "member";
    // alihkan ke halaman dashboard pegawai
    echo '<script type="text/javascript">
            setTimeout(function (){
            swal({
                title: "WELLCOME",
                text : "Selamat datang dihalam user",
                type : "success",
                showConfirmButton: true
                },function(){
                  window.location.href = "index.php";
                          });
                    });
        </script>';

  // cek jika user login sebagai pengurus
  

  }else{

    // alihkan ke halaman login kembali
    header("location:login.php?pesan=gagal");
     //echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=wheel'>";
  } 
}else{
  header("location:login.php?pesan=gagal");
}

?>
<script src="vendor/jquery/sweetalert/sweetalert.min.js"></script>