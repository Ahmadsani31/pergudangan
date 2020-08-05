    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Peminjaman</a></li>
              <li class="breadcrumb-item active">Form Data peminijaman</li>
            </ol>
      
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>No fakture</th>
                      <th>Kode Unix</th>
                      <th>Total</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <?php
                  $no = 1;
                  $queryData = mysqli_query($conn, "SELECT * FROM pinjam_data 
                               INNER JOIN staf ON staf.id_staf = pinjam_data.id_staf_data")or die(mysqli_error($conn));
                  while ($sqlData = mysqli_fetch_array($queryData)) {
                    
                  ?>
                  <tbody>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $sqlData['nm_staf']; ?></td>
                      <td><?php echo $sqlData['no_fakture_data']; ?></td>
                      <td><?php echo $sqlData['kode_unix_data']; ?></td>
                      <td>Rp. <?php echo number_format($sqlData['total_data'],2); ?></td>
                      <td><?php echo $sqlData['dateinsert_data']; ?></td>
                      <td><samp>Proses</samp></td>
                      <td><a href="?p=print&id_pinjam_data=<?php echo $sqlData['id_pinjam_data']; ?>" class="btn btn-sm btn-success">Lihat</a></td>
                    </tr>
                  </tbody>
                <?php } $no++; ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
 
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>