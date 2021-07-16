<?php 
//koneksi ke database
include 'koneksi.php';

//input dari form
$id = $_POST['id'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$band = $_POST['band'];
$personil = $_POST['personil'];
$password = md5($_POST['password']);
$dibuat = date("Y-m-d h:i:s");

     //masukin database
    
        $mashok = "UPDATE user SET nik = '$nik', nama = '$nama', email = '$email', band = '$band', personil = '$personil',tanggal_diupdate = '$dibuat' WHERE id_user = '$id'";
        $mashok1 = "UPDATE user SET nik = '$nik', nama = '$nama', email = '$email', band = '$band', personil = '$personil',tanggal_diupdate = '$dibuat', password = '$password' WHERE id_user = '$id'";


		if ($_POST['password'] == '') {
            mysqli_query($koneksi, $mashok);
			header("location:user.php?alert=berhasil_user-edit");
			
		}else{
            mysqli_query($koneksi, $mashok1);
			header("location:user.php?alert=berhasil_user-edit");
		}
	
			
		
	


 



