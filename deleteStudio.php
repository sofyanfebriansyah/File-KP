<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];
$ids = $_GET['role'];
if ($_GET['role'] == 'user') {
    mysqli_query($koneksi,"DELETE FROM user WHERE id_user='$id'");
    header("location:data_customer.php?alert=berhasil_studio_hapus");
} elseif ($_GET['role'] == 'studio') {
    mysqli_query($koneksi,"DELETE FROM studio WHERE id_studio='$id'");
    header("location:data_studio.php?alert=berhasil_studio_hapus");
} elseif ($_GET['role'] == 'transaksi') {
    mysqli_query($koneksi,"DELETE FROM transaksi WHERE id_transaksi='$id'");
    header("location:data_transaksi.php?alert=berhasil_studio_hapus");
} elseif ($_GET['role'] == 'admin') {
    mysqli_query($koneksi,"DELETE FROM admins WHERE id_admin='$id'");
    header("location:data_admin.php?alert=berhasil_studio_hapus");
}

?>