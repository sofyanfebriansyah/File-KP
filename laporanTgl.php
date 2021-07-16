<?php include 'header.php'; ?>

<div class="content-wrapper">
<section class="content">
    <div class="row">
    <section class="col-lg-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Filter Laporan</h3>
        </div>
        <div class="box-body">
          <form method="get" action="">
            <div class="row">

              <div class="col-md-3">
                <div class="form-group">
                  <label>Mulai Tanggal</label>
                  <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_dari'])){echo $_GET['tanggal_dari'];}else{echo "";} ?>" name="tanggal_dari" class="form-control datepicker2" placeholder="Mulai Tanggal" required="required">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Sampai Tanggal</label>
                  <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_sampai'])){echo $_GET['tanggal_sampai'];}else{echo "";} ?>" name="tanggal_sampai" class="form-control datepicker2" placeholder="Sampai Tanggal" required="required">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <br/>
                  <input type="submit" value="TAMPILKAN LAPORAN" class="btn btn-sm btn-primary">
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Laporan Transaksi</h3>
        </div>
        <div class="box-body">

          <?php 
          if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])){
            $tgl_dari1 = date_create($_GET['tanggal_dari']);
            $tgl_sampai1 = date_create($_GET['tanggal_sampai']);
            $tgl_dari = date_format($tgl_dari1, "Y-m-d");
            $tgl_sampai = date_format($tgl_sampai1, "Y-m-d");
            include 'koneksi.php';
            $sql2 = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS value_sum FROM transaksi WHERE date(tanggal_dibuat) >= '$tgl_dari' AND date(tanggal_dibuat) <= '$tgl_sampai'");
            $sql1 = mysqli_fetch_array($sql2);
            $sql3 = mysqli_query($koneksi,"SELECT * FROM user WHERE date(tanggal_dibuat) >= '$tgl_dari' AND date(tanggal_dibuat) <= '$tgl_sampai'");
            $sql4 = mysqli_num_rows($sql3);
    
            ?>

            <div class="row">
              <div class="col-lg-6">
                <table class="table table-bordered">
                  <tr>
                    <th width="30%">DARI TANGGAL</th>
                    <th width="1%">:</th>
                    <td><?php echo $tgl_dari; ?></td>
                  </tr>
                  <tr>
                    <th>SAMPAI TANGGAL</th>
                    <th>:</th>
                    <td><?php echo $tgl_sampai; ?></td>
                  </tr>
                </table>
                
              </div>

              <div class="col-lg-6">
                <table class="table table-bordered">
                  <tr>
                    <th width="36%">TOTAL PENDAPATAN</th>
                    <th width="1%">:</th>
                    <td><b class="text-danger">Rp <?= number_format($sql1['value_sum'],0,",","."); ?></b></td>
                  </tr>
                  <tr>
                    <th>TOTAL PENDAFTAR</th>
                    <th>:</th>
                    <td><b class="text-danger"><?php echo $sql4; ?> Orang</b></td>
                  </tr>
                </table>
                
              </div>
            </div>

            <a href="laporanPdf.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>" target="_blank" class="text-white btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp CETAK PDF</a>
            <a href="laporanPrint.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp PRINT</a>
            
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>ID CUSTOMER</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>NAMA CUSTOMER</th>
                    <th>TANGGAL BOOKING</th>
                    <th>STATUS</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM transaksi WHERE date(tanggal_dibuat) >= '$tgl_dari' AND date(tanggal_dibuat) <= '$tgl_sampai'");
                  while($i = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td>CUST-00<?= $i['id_user'] ?></td>
                      <td><?= date('d-m-Y', strtotime($i['tanggal_dibuat'])); ?></td>
                      <td><?= $i['nama_customer'] ?></td>
                      <td><?= $i['tgl_book'] ?></td>
                      <td>
                        <?php 
                        if($i['status'] == 'aktif'){
                            echo "<span class='badge bg-info text-white'>Aktif</span>";
                        }elseif($i['status'] == 'tidak aktif'){
                            echo "<span class='badge bg-danger text-white'>Tidak Aktif</span>";
                        }?>
                      </td>
                    </tr>
                    <?php 
                  }
                  ?>
                </tbody>
              </table>
            </div>

            <?php 
          }else{
            ?>

            <div class="alert alert-info text-center">
              Silahkan Filter Laporan Terlebih Dulu.
            </div>

            <?php
          }
          ?>

        </div>
      </div>
    </section>
  </div>
</section>
</div>
<?php include 'footer.php'; ?>