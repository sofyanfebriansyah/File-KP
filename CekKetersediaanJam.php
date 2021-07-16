<?php 

include './koneksi.php';

$tanggal  = $_POST['tanggal_sewa']; 
$jam_sewa = $_POST['jam_sewa'];

$sql = mysqli_query($koneksi, "SELECT tgl_book  FROM transaksi WHERE tgl_book = '$tanggal' AND jam_book = '$jam_sewa' ");

$row = mysqli_num_rows($sql);
if($row > 0){
$data = array(
'status'   =>'error',   
'message' =>'Jam Booking Sudah Penuh'    
);
}else{
    $data = array(
        'status'   =>'success',
        'message' =>'Jam Tersedia'    
        );
}   

echo  json_encode($data);
?>