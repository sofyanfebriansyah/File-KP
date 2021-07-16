<?php 

include 'koneksi.php';

session_start();

unset($_SESSION['id']);
unset($_SESSION['admin_status']);

header("location:login.php");
?>