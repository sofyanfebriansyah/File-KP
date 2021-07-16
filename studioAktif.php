<?php
include 'koneksi.php';
$id = $_GET['id'];
$ids = $_GET['role'];

if ($_GET['role'] == 'studio') {
    mysqli_query($koneksi, "UPDATE studio SET status_studio = 'aktif' WHERE id_studio = '$id'");
    header("location:data_studio.php?alert=berhasil_studio_status");
} elseif ($_GET['role'] == 'admin') {
    mysqli_query($koneksi, "UPDATE admins SET status = 'aktif' WHERE id_admin = '$id'");
    header("location:data_admin.php?alert=berhasil_admin_status");
}

?>