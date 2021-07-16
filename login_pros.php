<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM admins WHERE username='$username' AND password='$password' AND status='aktif'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);

    if ($data['status'] == 'tidak aktif') {
        header("location:login.php?alert=gagal_gaktif");

    } else {

	// hapus session yg lain, agar tidak bentrok dengan session customer
	unset($_SESSION['id']);
	unset($_SESSION['nama_admin']);
	unset($_SESSION['role_admin']);
	unset($_SESSION['username']);
	unset($_SESSION['status']);

	// buat session customer
	$_SESSION['id'] = $data['id_admin'];
	$_SESSION['nama_admin'] = $data['nama_admin'];
	$_SESSION['role_admin'] = $data['role_admin'];
	$_SESSION['admin_status'] = "login";
	header("location:index.php?alert=berhasil_login");
}

}else{
	header("location:login.php?alert=gagal_login");
}