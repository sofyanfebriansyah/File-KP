<?php 
//koneksi ke database
include 'koneksi.php';

//input dari form
$id_cust = $_POST['id_cust'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$no_hp = $_POST['no_hp'];
$pilihan = 'kursus';
$tingkatan = $_POST['tingkatan'];
$hari = $_POST['hari'];
$jam = $_POST['jam'];
$bukti = $_POST['bukti'];
$bukti_nominal = str_replace(["Rp.","."],"",$_POST['bukti_nominal']);
$dibuat = date("Y-m-d");
$status = 'aktif';

//foto dari input form
$rand = $dibuat;
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['bukti']['name'];
$ukuran = $_FILES['bukti']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

     //masukin database
if(!in_array($ext,$ekstensi) ) {
	header("location:form_sudah_login.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$bukti = $rand.'_'.$filename;
		move_uploaded_file($_FILES['bukti']['tmp_name'], 'assets/images/'.$rand.'_'.$filename);
		$mashok = "INSERT INTO kursus VALUES(NULL,'$id_cust','$nama','$pilihan','$tingkatan','$hari','$jam','$bukti_nominal','$bukti','$dibuat','$dibuat','$status')";
		$mashok1 = "UPDATE customer SET nik = '$nik', no_hp = '$no_hp', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', pilihan = '$pilihan', tingkatan = '$tingkatan' WHERE id = '$id_cust' AND nama = '$nama'";
		

		if (mysqli_query($koneksi, $mashok) == true) {
			mysqli_query($koneksi, $mashok1);
		}
			
			header("location:user.php?alert=berhasil_kursus");
		
	}else{
		header("location:form_sudah_login.php?alert=gagal_ukuran");
	}
}


 



