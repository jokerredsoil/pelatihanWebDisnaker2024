<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
  include "../../config/koneksi.php";

  $module=$_GET['module'];
  $act=$_GET['act'];

  // Hapus user_kelas
  if ($module=='user_kelas' AND $act=='hapus'){
    mysqli_query($koneksi, 'DELETE FROM user_kelas WHERE kelas_id='.$_GET['id'].' AND user_id='.$_GET['user_id']);
    
   $_SESSION['success'] = "Peserta berhasil dihapus dari kelas terdaftar";

    header('location:../../media.php?module='.$module.'&id='.$_GET['id']);
  }

  // Input user_kelas
  elseif ($module=='user_kelas' AND $act=='input'){
    foreach($_POST['user_id'] as $user_id){
      mysqli_query($koneksi, 'INSERT INTO user_kelas (user_id,kelas_id) 
                              VALUES('.$user_id.','.$_GET['id'].')');
    }

    $_SESSION['success'] = "Peserta berhasil ditambahkan";
    
    header('location:../../media.php?module='.$module.'&id='.$_GET['id']);
  }
}
?>
