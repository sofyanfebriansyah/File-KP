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
    <h2>Tiket Studio</h2>
  </center>
  
  <?php 
  include 'koneksi.php';
  if(isset($_GET['id_user'])){
  $id_user = $_GET['id_user'];
  $sql = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_user = '$id_user'");
  $sql1 = mysqli_fetch_array($sql);
  
  $sql2 = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'");
  $sql3 = mysqli_fetch_array($sql2);
  
  if (!$sql1 == '') {
      $id_studio = $sql1['id_studio'];
      $sql4 = mysqli_query($koneksi, "SELECT * FROM studio WHERE id_studio = '$id_studio'");
      $sql5 = mysqli_fetch_array($sql4);
  }
 
  ?>
  <br/>

  <br/>

  <div class="table-responsive">
  <table class="table table-striped" border="0px">
                <tr class="info">
                    <th width="20%">Nama Band</th>
                    <td width="1%">:</td>
                    <td><?= $sql3['band'] ?></td>
                </tr>
                <tr class="info">
                    <th>Jumlah Personil</th>
                    <td>:</td>
                    <td><?= $sql3['personil'] ?> Orang</td>
                </tr>
                <tr class="info">
                    <th class="text-right">Studio Yang Dipilih : </th>
                    <?php
                    if ($sql1 == '') {?>
                        <td colspan="2" style="text-align: left;"><span class="label label-danger">Belum ada Transaksi</span></td>

                   <?php }else{ ?>
                    <td colspan="2" style="text-align: left;"><span class="label label-info"><?= $sql5['nama_studio'] ?></span></td>
                  <?php } ?>
                </tr>
                <tr class="info">
                    <th class="text-right">Tanggal Pesan : </th>
                    <?php
                    if ($sql1 == '') {?>
                        <td colspan="2" style="text-align: left;"><span class="label label-danger">Belum ada Transaksi</span></td>

                   <?php }else{ ?>
                    <td colspan="2" style="text-align: left;"><span class="label label-info"><?= $sql1['tgl_book'] ?></span></td>
                  <?php } ?>
                </tr>
                <tr class="info">
                    <th class="text-right">Jam Pesan : </th>
                    <?php
                    if ($sql1 == '') {?>
                        <td colspan="2" style="text-align: left;"><span class="label label-danger">Belum ada Transaksi</span></td>

                   <?php }else{ ?>
                    <td colspan="2" style="text-align: left;"><span class="label label-info"><?= $sql1['jam_book'] ?> Jam</span></td>
                  <?php } ?>
                </tr>
              
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