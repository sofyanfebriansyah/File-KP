 <?php include 'header.php'?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col --><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12 col-sm-6">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Hai <?= $_SESSION['nama_admin']; ?></h1><hr>
                        <p class="lead">Kamu login sebagai : 
                         <span class="badge bg-info"> <?php if ($_SESSION['role_admin'] == 'admin') {
                                    echo 'Admin';
                                } elseif ($_SESSION['role_admin'] == 'studio') {
                                    echo 'Penjaga Studio';
                                }?></span></p>
                    </div>
                </div>
            </div>
            <?php  if ($_SESSION['role_admin'] == 'admin') { ?>
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                  <?php
                      include 'koneksi.php';
                      $no = 1;
                      $sql2 = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS value_sum FROM transaksi");
                      $sql1 = mysqli_fetch_array($sql2);
                      ?>
                    <h3>Rp <?= number_format($sql1['value_sum'],0,",","."); ?></h3>
    
                    <p>Total Pendapatan</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                  <?php
                        include 'koneksi.php';
                        $no = 1;
                        $sql2 = mysqli_query($koneksi,"SELECT * FROM transaksi");
                        $sql1 = mysqli_num_rows($sql2);
                        ?>
                    <h3><?= $sql1 ?></h3>

                    <p>Total Transaksi</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

               <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                    $sql2 = mysqli_query($koneksi,"SELECT * FROM user");
                                    $sql1 = mysqli_num_rows($sql2);
                                    ?>
                <h3><?= $sql1 ?></h3>

                <p>Total User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                <?php
                    include 'koneksi.php';
                    $no = 1;
                    $sql2 = mysqli_query($koneksi,"SELECT * FROM admins");
                    $sql1 = mysqli_num_rows($sql2);
                    ?>
                  <h3><?= $sql1 ?></h3>
  
                  <p>Jumlah Admin</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <?php } elseif ($_SESSION['role_admin'] == 'studio') { ?>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php
                    include 'koneksi.php';
                    $no = 1;
                    $sql2 = mysqli_query($koneksi,"SELECT * FROM transaksi");
                    $sql1 = mysqli_num_rows($sql2);
                    ?>
                <h3><?= $sql1 ?></h3>

                <p>Total Transaksi</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                    $sql2 = mysqli_query($koneksi,"SELECT * FROM user");
                                    $sql1 = mysqli_num_rows($sql2);
                                    ?>
                <h3><?= $sql1 ?></h3>

                <p>Total User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
            <?php } ?>
          
        
         
        
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

        <?php include 'footer.php' ?>