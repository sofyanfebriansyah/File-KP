<!DOCTYPE html>
<html>
<head>
  <title>Tiket Studio</title>
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
    <h2>List Transaksi</h2>
  </center>

  <?php 
  include 'koneksi.php';
  if(isset($_GET['id_user'])){
  $id_user = $_GET['id_user'];
  ?>
  <br/>

  <br/>

  <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>ID CUSTOMER</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>NAMA CUSTOMER</th>
                    <th>TANGGAL BOOK</th>
                    <th>TOTAL JAM SEWA</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM transaksi WHERE id_user = '$id_user'");
                  while($i = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td>CUST-00<?= $i['id_user'] ?></td>
                      <td><?= date('d-m-Y', strtotime($i['tanggal_dibuat'])); ?></td>
                      <td><?= $i['nama_customer'] ?></td>
                      <td><?= $i['tgl_book'] ?></td>
                      <td><?= $i['jam_book'] ?> Jam</td>
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
require_once("./admins/dompdf/autoload.inc.php");
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