<?php
  if(ISSET($_GET['module'])){
    // Bagian Home
    if ($_GET['module']=='user'){
      if ($_SESSION['role']=='Administrator'){
        include "modul/mod_user/user.php";
      }
      else{
        if($_GET['act']=='edit' && !ISSET($_GET['id'])){
          include "modul/mod_user/user.php";
        }
      }
    }
    // Bagian Home
    else if ($_GET['module']=='kelas'){
      if ($_SESSION['role']=='Administrator'){
        include "modul/mod_kelas/kelas.php";
      }
    }
    // Bagian Home
    else if ($_GET['module']=='user_kelas'){
      if ($_SESSION['role']=='Administrator'){
        include "modul/mod_user_kelas/user_kelas.php";
      }
    }
    // Bagian Home
    else if ($_GET['module']=='absensi'){
      include "modul/mod_absensi/absensi.php";
    }
    // Bagian Home
    else if ($_GET['module']=='profile'){
      include "modul/mod_profile/profile.php";
    }
    // Apabila modul tidak ditemukan
    else{
      echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
    }
  }
  else{
    echo "Hallo";
  }
?>
