<!DOCTYPE html>
<html>
<head>
  <title>Laporan Pendapatan Studio</title>
</head>
<body>

  <style type="text/css">
    body{
      font-family: sans-serif;
    }

    .table{
      width: 100%;
    }

    th,td{
    }
    .table,
    .table th,
    .table td {
      padding: 5px;
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>

  
  <center>
    <h2>Laporan Pendapatan Studio</h2>
  </center>

  <?php 
  include 'koneksi.php';
  if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])){
  $tgl_dari = $_GET['tanggal_dari'];
  $tgl_sampai = $_GET['tanggal_sampai'];
  ?>
  <br/>

  <table class="">
    <tr>
      <td width="20%">DARI TANGGAL</td>
      <td width="1%">:</td>
      <td><?php echo $tgl_dari; ?></td>
    </tr>
    <tr>
      <td>SAMPAI TANGGAL</td>
      <td>:</td>
      <td><?php echo $tgl_sampai; ?></td>
    </tr>
  </table>

  <table class="">
    <tr>
    <?php
    include 'koneksi.php';
    $no = 1;
    $sql2 = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS value_sum FROM transaksi WHERE date(tanggal_dibuat) >= '$tgl_dari' AND date(tanggal_dibuat) <= '$tgl_sampai'");
    $sql1 = mysqli_fetch_array($sql2);
    ?>
      <td width="20%">TOTAL PENDAPATAN</td>
      <td width="1%">:</td>
      <td>Rp <?= number_format($sql1['value_sum'],0,",","."); ?></td>
    </tr>
    <tr>
    <?php
        include 'koneksi.php';
        $no = 1;
        $sql2 = mysqli_query($koneksi,"SELECT * FROM user WHERE date(tanggal_dibuat) >= '$tgl_dari' AND date(tanggal_dibuat) <= '$tgl_sampai'");
        $sql1 = mysqli_num_rows($sql2);
        ?>
      <td>JUMLAH PENDAFTAR</td>
      <td>:</td>
      <td><?php echo $sql1; ?> Orang</td>
    </tr>
  </table>

  <br/>

  <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>ID CUSTOMER</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>NAMA CUSTOMER</th>
                    <th>TANGGAL BOOKING</th>
                    <th>STUDIO</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM transaksi LEFT JOIN studio ON transaksi.id_studio = studio.id_studio");

                  while($i = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td>CUST-00<?= $i['id_user'] ?></td>
                      <td><?= date('d-m-Y', strtotime($i['tanggal_dibuat'])); ?></td>
                      <td><?= $i['nama_customer'] ?></td>
                      <td><?= $i['tgl_book'] ?></td>
                      <td><?= $i['nama_studio'] ?></td>
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
</body>


<?php 
require_once("./dompdf/autoload.inc.php");
use Dompdf\Dompdf;

// $dompdf = new DOMPDF();
$dompdf = new Dompdf();
// ob_start();
$dompdf->load_html(ob_get_clean());
$dompdf->set_Paper("A4", "portrait");
$dompdf->render();
$dompdf->stream("test.pdf",array('Attachment'=>0)); 
exit();     
?>

</html>