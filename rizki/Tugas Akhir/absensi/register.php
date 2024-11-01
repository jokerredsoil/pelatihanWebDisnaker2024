<?php
  session_start();

  if(ISSET($_SESSION['login']) && $_SESSION['login']){
    header('location:media.php');
  }
  include "config/koneksi.php";
  if($_POST['password'] != $_POST['confirm_password']){
    $_SESSION['error_password'] = "Data Password tidak sesuai dengan Konfirmasi Password";
  }

  $sql = "SELECT * FROM users WHERE username='".$_POST['username']."'";
  $result = $koneksi->query($sql);
  if ($result->num_rows > 0) {
    $_SESSION['error_username'] = "Data Username sudah terdaftar";
  }

  if(ISSET($_SESSION['error_password']) || ISSET($_SESSION['error_username'])){
    header('location:signup.php');
  }

  mysqli_query($koneksi, 'INSERT INTO users (username,password,roles_id,nama) 
                            VALUES("'.$_POST['username'].'","'.md5($_POST['password']).'",3,"'.$_POST['nama'].'")');
  $id_baru = mysqli_insert_id($koneksi);
  $kode = date("ymd").sprintf("%04d", $id_baru);;
  mysqli_query($koneksi, 'UPDATE users SET kode  = "'.$kode.'"
                            WHERE id   = '.$id_baru);

  include "config/phpqrcode/qrlib.php"; 

  // nama folder tempat penyimpanan file qrcode
  $penyimpanan = "assets/qrcode/";
  
  // membuat folder dengan nama "temp"
  if (!file_exists($penyimpanan))
  mkdir($penyimpanan);
  
  // isi qrcode yang ingin dibuat. akan muncul saat di scan
  $isi = "https://patient-goat-purely.ngrok-free.app/profile.php?kode=$kode"; 
  
  // perintah untuk membuat qrcode dan menyimpannya dalam folder temp
  QRcode::png($isi, $penyimpanan.$kode.".png");

  $_SESSION['success'] = "User sudah didaftarkan";
  
  header('location:index.php');
?>
