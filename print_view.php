  <?php
  include "connection.php";
  $queryData = mysqli_query($conn, "SELECT * FROM pinjam_data 
                               INNER JOIN staf ON staf.id_staf = pinjam_data.id_staf_data WHERE pinjam_data.id_pinjam_data ='$_GET[id_pinjam_data]' ")or die(mysqli_error($conn));
      $sqlData = mysqli_fetch_array($queryData);
  ?>
<style type="text/css">
  body{
    
  }
  div.box{
        margin: auto;
        margin-top: 10px;
        max-width: 90%;
  }
  div.pos{
        margin: auto;
        
  }
  div.tdd-left p{
        padding-left: 100px; 
        
  }
  div.tdd-right{
        padding-left: 300px; 
        
  }

  img{
    max-width: 300px;
    border-radius: 10px;
   
  }
</style>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Fakture Print </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper box">
  <!-- Main content -->
<section class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="pos">
                  <img src="dist/img/dunlop.svg">
                </div>
                <!-- /.col -->
              </div>
              <hr>
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Dunlup, Inc.
                    <small class="float-right">Date: <?php echo $sqlData['dateinsert_data']; ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-8 invoice-col">
                  From
                  <address>
                    <strong><?php echo $sqlData['nm_staf']; ?></strong><br>
                    <?php echo $sqlData['alamat_staf']; ?><br>
                    Phone: <?php echo $sqlData['nope_staf']; ?><br>
                    Email: <?php echo $sqlData['email_staf']; ?>
                  </address>
                </div>
                <!-- /.col -->
                <!-- /.col -->
                <div class="col-sm-4 invoice-col" align="right">
                  <b>No Faktur</b> <?php echo $sqlData['no_fakture_data']; ?><br>
                  <br>
                  <b>Order ID:</b> <?php echo $sqlData['kode_unix_data']; ?><br>
                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped text-center">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Kendaraan</th>
                      <th>Type</th>
                      <th>Nama</th>
                      <th>Ukuran</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Total</th>
                    </tr>
                    </thead>
 <?php
 $no = 1;
 $total = 0;
    $queryDetail = mysqli_query($conn, "SELECT * FROM pinjam_detail
                   INNER JOIN pinjam_data ON pinjam_data.id_pinjam_data = pinjam_detail.id_pinjam_data
                   INNER JOIN kendaraan ON kendaraan.id = pinjam_detail.id_kendaraan_detail
                   INNER JOIN wheel_type ON wheel_type.id_wheel_type = pinjam_detail.id_type_detail
                   INNER JOIN wheel_detail ON wheel_detail.id_wheel_detail = pinjam_detail.id_detail_detail
                   INNER JOIN wheel_ukuran ON wheel_ukuran.id_wheel_ukuran = pinjam_detail.id_ukuran_detail
                   WHERE pinjam_detail.id_pinjam_data ='$_GET[id_pinjam_data]' ")or die(mysqli_error($conn));
      while ($sqlDetail = mysqli_fetch_array($queryDetail)) {
         ?>
                    <tbody>
                    <tr>
                      <td><?php echo $no;?> </td>
                      <td><?php echo $sqlDetail['nama'];?> </td>
                      <td><?php echo $sqlDetail['nm_wheel_type'];?> </td>
                      <td><?php echo $sqlDetail['nm_wheel_detail'];?> </td>
                      <td><?php echo $sqlDetail['ukuran_wheel'];?> </td>
                      <td><?php echo $sqlDetail['harga_detail'];?> </td>
                      <td><?php echo $sqlDetail['jumlah_detail'];?> </td>
                      <td><?php echo $sqlDetail['total_detail'];?> </td>
                                
<?php $no ++; } ?>
                  </tr>
                    </tbody>                  
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-8">
                  <p class="lead">Payment Methods:</p>
                  <img src="dist/img/credit/visa.png" alt="Visa">
                  <img src="dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="dist/img/credit/american-express.png" alt="American Express">
                  <img src="dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <div class="table no-border">
                    <table class="table">
                      <tr>
                        <th><h4>Total :</h4></th>
                        <td align="right"><h4>Rp. <?php echo number_format($sqlData['total_data'], 2) ?></h4></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <hr>
              <br>
              <br>
              <br>
              <!-- this row will not appear when printing -->
              <p align="right">Tanggal, Padang : ___ / ___ / ______ </p>
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6 tdd-left">
                  <p><strong>Yang bertanda tangan :</strong></p>
                  <br>
                  <br>
                  <p style="padding-left: 105px;">___________________</p>
                </div>
                <!-- /.col -->
                <div class="col-6 tdd-right">
                  <p style="padding-left: 18px;"><strong> Disetujui oleh :</strong></p>
                  <br>
                  <br>
                  <p>___________________</p>
                </div>
                <!-- /.col -->
              </div>
              <br>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
