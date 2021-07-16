<?php 
//mail
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\htdocs\music-studio\vendor\phpmailer\phpmailer\src\Exception.php';
require 'C:\xampp\htdocs\music-studio\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\music-studio\vendor\phpmailer\phpmailer\src\SMTP.php';

//koneksi ke database
include 'koneksi.php';

//input dari form
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$band = $_POST['band'];
$personil = $_POST['personil'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$token = 0;
$dibuat = date("Y-m-d h:i:s");
$url = "http://localhost/music-studio/confirm.php?email=".$email."&token=1";


//email konfimasi
$mail = new PHPMailer();
//Set SMTP Options
  $mail->SMTPOptions = array(
                  'ssl' => array(
                      'verify_peer' => false,
                      'verify_peer_name' => false,
                      'allow_self_signed' => true
                  )
              );
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "ilhamrafi444@gmail.com";
$mail->Password   = "@Rafi#2018";
$mail->IsHTML(true);
$mail->AddAddress("$email", "$nama");
$mail->SetFrom("ilhamrafi444@gmail.com", "Admin Music Club");
$mail->Subject = "Hello .$nama.";
$content = "<b>Sekarang ayo konfirmasi emailmu untuk melanjutkan proses </b> <a href='$url'>Klik Ini yaaaa<a>";
$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
		mysqli_query($koneksi, "INSERT INTO user VALUES(NULL,'$nik','$nama','$email','$band','$personil','$username','$password','$token','$dibuat','$dibuat')");
		header("location:login_user.php?alert=berhasil_daftar");
}
 



