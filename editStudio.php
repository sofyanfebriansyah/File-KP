<?php 
//koneksi ke database
include 'koneksi.php';
if ($_POST['role'] == 'user') {

//input dari form
$id_user = $_POST['id_user'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$band = $_POST['band'];
$personil = $_POST['personil'];
$password = md5($_POST['password']);
if ($_POST['password'] == '') {
	mysqli_query($koneksi, "UPDATE user SET nik = '$nik', nama = '$nama', email = '$email', band = '$band', personil = '$personil', tanggal_diupdate = '$dibuat' WHERE id_user = '$id_user'");
	header("location:data_customer.php?alert=berhasil_studio_edit");
}else{
	mysqli_query($koneksi, "UPDATE user SET nik = '$nik', nama = '$nama', email = '$email', band = '$band', personil = '$personil', password = '$password', tanggal_diupdate = '$dibuat' id_user = '$id_user'");
	header("location:data_customer.php?alert=berhasil_studio_edit");
}
 } elseif ($_POST['role'] == 'studio') { 
//input dari form
$nama_studio = $_POST['nama_studio'];
$harga_studio = str_replace(["Rp","."],"",$_POST['harga_studio']);
$ket_studio = $_POST['ket_studio'];
$foto_studio = $_POST['foto_studio'];
$dibuat = date("Y-m-d h:i:s");

if ($_POST['foto_studio'] == '') {
	mysqli_query($koneksi, "UPDATE studio SET nama_studio = '$nama_studio', harga_studio = '$harga_studio', ket_studio = '$ket_studio', tanggal_diupdate = '$dibuat'");
	header("location:data_studio.php?alert=berhasil_studio_edit");
}else{

$rand = $dibuat;
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto_studio']['name'];
$ukuran = $_FILES['foto_studio']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
   //masukin database
   if(!in_array($ext,$ekstensi) ) {
	header("location:peserta_kursus.php?alert=gagal_ekstensi");
}else{

	if($ukuran < 1044070){		

     //masukin database
        $foto_studio = $rand.'_'.$filename;
        move_uploaded_file($_FILES['foto_studio']['tmp_name'], '../img/'.$foto_studio);
        $mashok = "UPDATE studio SET nama_studio = '$nama_studio', harga_studio = '$harga_studio', ket_studio = '$ket_studio', foto_studio = '$foto_studio' ,tanggal_diupdate = '$dibuat'";
		if (mysqli_query($koneksi, $mashok) == true) {
			header("location:data_studio.php?alert=berhasil_studio_edit");
			
		}else{
			header("location:data_studio.php?alert=gagal_studio_edit");
		}
    }
  }
 }		
	
} elseif ($_POST['role'] == 'transaksi') {
$tgl = date_create($_POST['tgl_book']);
$id_transaksi = $_POST['id_transaksi'];
$id_studio = $_POST['id_studio'];
$tgl_book = date_format($tgl, "Y-m-d");
$id_customer = $_POST['id_user'];
$nama_customer = $_POST['nama_customer'];
$jam_book = $_POST['jam_book'];
$dibuat = date("Y-m-d");
$status_order = $_POST['status_order'];

		$mashok = "UPDATE transaksi SET status = '$status_order', id_user = '$id_customer', id_studio = '$id_studio', nama_customer = '$nama_customer', tgl_book = '$tgl_book', jam_book = '$jam_book' WHERE id_transaksi = '$id_transaksi'	";
		if (mysqli_query($koneksi, $mashok) == true) {
			header("location:data_transaksi.php?alert=berhasil_transaksi");
		}
	
} elseif ($_POST['role'] == 'admin') {
	$nama_admin = $_POST['nama_admin'];
	$id_admin = $_POST['id_admin'];
	$role_admin = $_POST['role_admin'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$status = $_POST['status'];
	$dibuat = date("Y-m-d");
	if ($_POST['password'] == '') {
		mysqli_query($koneksi, "UPDATE admins SET nama_admin = '$nama_admin', role_admin = '$role_admin', username = '$username', status = '$status', tanggal_diupdate = '$dibuat' WHERE id_admin = '$id_admin'");
		header("location:data_admin.php?alert=berhasil_admin");
	} else {
		mysqli_query($koneksi, "UPDATE admins SET nama_admin = '$nama_admin', role_admin = '$role_admin', username = '$username', password = '$password', status = '$status', tanggal_diupdate = '$dibuat' WHERE id_admin = '$id_admin'");
		header("location:data_admin.php?alert=berhasil_admin");
	}
	
}
	


 



