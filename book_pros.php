<?php 
//koneksi ke database
include 'koneksi.php';
$id_studio  = $_POST['id_studio'];
$tgl_book 	= $_POST['tgl_book'];
$jam_book = $_POST['jam_sewa'];

$sql1 = mysqli_query($koneksi, "SELECT jam_book FROM transaksi WHERE tgl_book = '$tgl_book' AND jam_book = '$jam_book' AND id_studio = '$id_studio' ");
$sql2 = mysqli_num_rows($sql1);
if ($sql2 == true) {
    header("location:proses.php?id=$id_studio&alert=sudah_dibook");
} else {

//input dari form
$id_customer = $_POST['id_user'];
$nama_customer = $_POST['nama_customer'];
$total_bayar = str_replace("Rp.","",$_POST['total_bayar']);
$bukti = $_POST['bukti'];
$status = 'Aktif';
$dibuat = date("Y-m-d");
//foto dari input form
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['bukti']['name'];
$ukuran = $_FILES['bukti']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

     //masukin database
if(!in_array($ext,$ekstensi) ) {
	header("location:form_sudah_login.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 104444070){		
		$bukti = $rand.'_'.$filename;
		move_uploaded_file($_FILES['bukti']['tmp_name'], './admins/img/'.$rand.'_'.$filename);
		$mashok = "INSERT INTO transaksi VALUES(NULL,'$id_customer','$id_studio','$nama_customer','$tgl_book','$jam_book','$total_bayar','$bukti','$status','$dibuat')";
		if (mysqli_query($koneksi, $mashok) == true) {
			header("location:user.php?alert=berhasil_transaksi");
		}
	}else{
		header("location:form_sudah_login.php?alert=gagal_ukuran");
	}
}


}
 



