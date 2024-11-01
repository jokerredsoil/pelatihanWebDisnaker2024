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

  // Hapus kelas
  if ($module=='kelas' AND $act=='hapus'){
    mysqli_query($koneksi, 'DELETE FROM kelas WHERE id='.$_GET['id']);

    $_SESSION['success'] = "Kelas berhasil dihapuskan";
    
    header('location:../../media.php?module='.$module);
  }

  // Input kelas
  elseif ($module=='kelas' AND $act=='input'){
    mysqli_query($koneksi, 'INSERT INTO kelas (nama_kelas, user_id) 
                              VALUES("'.$_POST['nama_kelas'].'",'.$_POST['user_id'].')');

    $_SESSION['success'] = "Kelas berhasil ditambahkan";

    header('location:../../media.php?module='.$module);
  }

  // Update kelas
  elseif ($module=='kelas' AND $act=='update'){
    mysqli_query($koneksi, 'UPDATE kelas SET nama_kelas  = "'.$_POST['nama_kelas'].'",
                                             user_id     = "'.$_POST['user_id'].'"
                              WHERE id   = '.$_GET['id']);

    $_SESSION['success'] = "Data kelas berhasil diubah";
    
    header('location:../../media.php?module='.$module);
  }
}
?>
