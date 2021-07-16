<?php 
//koneksi ke database
include 'koneksi.php';
if ($_POST['role'] == 'user') {

//input dari form
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$band = $_POST['band'];
$personil = $_POST['personil'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$token = 1;
$dibuat = date("Y-m-d h:i:s");

		mysqli_query($koneksi, "INSERT INTO user VALUES(NULL,'$nik','$nama','$email','$band','$personil','$username','$password','$token','$dibuat','$dibuat')");
		header("location:login_user.php?alert=berhasil_daftar");

} elseif ($_POST['role'] == 'studio'){
//input dari form
$nama_studio = $_POST['nama_studio'];
$harga_studio = str_replace(["Rp.","."],"",$_POST['harga_studio']);
$ket_studio = $_POST['ket_studio'];
$foto_studio = $_POST['foto_studio'];
$status_studio = $_POST['status_studio'];
$dibuat = date("Y-m-d");
$waktu = date("H:i:s");


$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto_studio']['name'];
$ukuran = $_FILES['foto_studio']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
   //masukin database
   if(!in_array($ext,$ekstensi) ) {
	header("location:peserta_kursus.php?alert=gagal_ekstensi");
}else{

	if($ukuran < 104454070){		

     //masukin database
        $foto_studio = $rand.'_'.$filename;
        move_uploaded_file($_FILES['foto_studio']['tmp_name'], 'img/'.$rand.'_'.$filename);
        $mashok = "INSERT INTO studio VALUES (NULL, '$nama_studio','$harga_studio','$ket_studio','$foto_studio','$status_studio','$dibuat','$dibuat')";


		if (mysqli_query($koneksi, $mashok) == true) {
			header("location:data_studio.php?alert=berhasil_studio_tambah");
			
		}else{
			header("location:data_studio.php?alert=gagal_studio_tambah");
		}
    }

}
} elseif ($_POST['role'] == 'transaksi') {
	$tgl = date_create($_POST['tgl_book']);
$id_studio = $_POST['id_studio'];
$tgl_book = date_format($tgl, "Y-m-d");

$sql1 = mysqli_query($koneksi, "SELECT tgl_book FROM transaksi WHERE tgl_book = '$tgl_book' AND id_studio = '$id_studio' ");
$sql2 = mysqli_num_rows($sql1);
if ($sql2 == true) {
    header("location:proses.php?id=$id_studio&alert=sudah_dibook");
} else {

//input dari form
$id_customer = $_POST['id_user'];
$nama_customer = $_POST['nama_customer'];
$jam_book = $_POST['jam_book'];
$total_bayar = str_replace("Rp.","",$_POST['total_bayar']);
$bukti = $_POST['bukti'];
$status = 'aktif';
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
		move_uploaded_file($_FILES['bukti']['tmp_name'], './img/'.$rand.'_'.$filename);
		$mashok = "INSERT INTO transaksi VALUES(NULL,'$id_customer','$id_studio','$nama_customer','$tgl_book','$jam_book','$total_bayar','$bukti','$status','$dibuat')";
		if (mysqli_query($koneksi, $mashok) == true) {
			header("location:data_transaksi.php?alert=berhasil_transaksi");
		}
	}else{
		header("location:data_transaksi.php?alert=gagal_ukuran");
	}
}


}
} elseif ($_POST['role'] == 'admin') {

$nama_admin = $_POST['nama_admin'];
$role_admin = $_POST['role_admin'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$status = $_POST['status'];
$dibuat = date("Y-m-d");


if (mysqli_query($koneksi, "INSERT INTO admins VALUES(NULL,'$nama_admin','$role_admin','$username','$password','$status','$dibuat','$dibuat')") == TRUE) {
	header("location:data_admin.php?alert=berhasil_admin");
} else {
	header("location:data_transaksi.php?alert=gagal_admin");

}

}
		
		
	


 



