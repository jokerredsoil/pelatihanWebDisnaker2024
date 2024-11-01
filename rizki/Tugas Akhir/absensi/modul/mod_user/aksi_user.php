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

  // Hapus user
  if ($module=='user' AND $act=='hapus'){
    mysqli_query($koneksi, 'DELETE FROM users WHERE id='.$_GET['id']);
    
    $_SESSION['success'] = "User Sudah dihapus";
    
    header('location:../../media.php?module='.$module);
  }

  // Input user
  elseif ($module=='user' AND $act=='input'){
    $sql = "SELECT * FROM users WHERE username='".$_POST['username']."'";
    $result = $koneksi->query($sql);
    if ($result->num_rows > 0) {
      $_SESSION['error_username'] = "Data Username sudah terdaftar";
      header('location:../../media.php?module='.$module.'&act=tambah');
    }
    else{
      mysqli_query($koneksi, 'INSERT INTO users (username,password,roles_id,nama,alamat,kota_lahir,tanggal_lahir,about) 
                              VALUES("'.$_POST['username'].'","'.md5($_POST['password']).'","'.$_POST['roles_id'].'","'.$_POST['nama'].'","'.$_POST['alamat'].'","'.$_POST['kota_lahir'].'","'.$_POST['tanggal_lahir'].'","'.$_POST['about'].'")');
      $id_baru = mysqli_insert_id($koneksi);
      $kode = date("ymd").sprintf("%04d", $id_baru);
      mysqli_query($koneksi, 'UPDATE users SET kode  = "'.$kode.'"
                                WHERE id   = '.$id_baru);
      
      $lokasi_file    = $_FILES['file_foto']['tmp_name'];
      $tipe_file      = $_FILES['file_foto']['type'];
      $name_file      = $_FILES["file_foto"]["name"];
      $name_file_array= explode(".", $name_file);
      $ext            = end($name_file_array);
      $acak           = rand(1,99);
      $nama_file_unik = $acak.$kode.'.'.$ext;

      if (!empty($lokasi_file)){
        $vdir_upload = "../../assets/foto/";
        $vfile_upload = $vdir_upload . $nama_file_unik;

        move_uploaded_file($_FILES["file_foto"]["tmp_name"], $vfile_upload);

        mysqli_query($koneksi, 'UPDATE users SET foto  = "'.$nama_file_unik.'"
                                WHERE id   = '.$id_baru);
      }
                                      
      include "../../config/phpqrcode/qrlib.php"; 
      
      // nama folder tempat penyimpanan file qrcode
      $penyimpanan = "../../assets/qrcode/";
      
      // membuat folder dengan nama "temp"
      if (!file_exists($penyimpanan))
      mkdir($penyimpanan);
      
      // isi qrcode yang ingin dibuat. akan muncul saat di scan
      $isi = "https://patient-goat-purely.ngrok-free.app/profile.php?kode=$kode"; 
      
      // perintah untuk membuat qrcode dan menyimpannya dalam folder temp
      QRcode::png($isi, $penyimpanan.$kode.".png");
      
      $_SESSION['success'] = "User berhasil ditambahkan";

      header('location:../../media.php?module='.$module);
    }    
  }

  // Update user
  elseif ($module=='user' AND $act=='update'){
    if(ISSET($_GET['id'])){
      $header1 = 'location:../../media.php?module='.$module.'&act=edit&id='.$_GET['id'];
      $header2 = 'location:../../media.php?module='.$module;      
    }
    else{
      $_GET['id'] = $_SESSION['user_id'];
      $header1 = 'location:../../media.php?module='.$module.'&act=edit';

      $sql1 = "SELECT * FROM users WHERE id='".$_SESSION['user_id']."'";
      $rows1 = mysqli_query($koneksi, $sql1);
      $row1 = mysqli_fetch_object($rows1);
      $header2 = 'location:../../profile.php?kode='.$row1->kode; 
    }

    $sql2 = "SELECT * FROM users WHERE id='".$_GET['id']."'";
    $rows2 = mysqli_query($koneksi, $sql2);
    $row2 = mysqli_fetch_object($rows2);
    
    if(!ISSET($_POST['roles_id'])){
      $_POST['roles_id'] = $row2->roles_id;
    }

    $sql = "SELECT * FROM users WHERE username='".$_POST['username']."' AND id !=".$_GET['id'];
    $result = $koneksi->query($sql);
    if ($result->num_rows > 0) {
      $_SESSION['error_username'] = "Data Username sudah terdaftar";
      header($header1);
    }
    else{
      if(!empty($_POST['password'])){
        mysqli_query($koneksi, 'UPDATE users SET username      = "'.$_POST['username'].'",
                                                password      = "'.md5($_POST['password']).'",
                                                roles_id      = "'.$_POST['roles_id'].'",
                                                nama          = "'.$_POST['nama'].'",
                                                alamat        = "'.$_POST['alamat'].'",
                                                kota_lahir    = "'.$_POST['kota_lahir'].'",
                                                tanggal_lahir = "'.$_POST['tanggal_lahir'].'",
                                                about         = "'.$_POST['about'].'"
                                WHERE id   = '.$_GET['id']);
      }
      else{
        mysqli_query($koneksi, 'UPDATE users SET username      = "'.$_POST['username'].'",
                                                roles_id      = "'.$_POST['roles_id'].'",
                                                nama          = "'.$_POST['nama'].'",
                                                alamat        = "'.$_POST['alamat'].'",
                                                kota_lahir    = "'.$_POST['kota_lahir'].'",
                                                tanggal_lahir = "'.$_POST['tanggal_lahir'].'",
                                                about         = "'.$_POST['about'].'"
                                WHERE id   = '.$_GET['id']);
      }

      $lokasi_file    = $_FILES['file_foto']['tmp_name'];
      $tipe_file      = $_FILES['file_foto']['type'];
      $name_file      = $_FILES["file_foto"]["name"];
      $name_file_array= explode(".", $name_file);
      $ext            = end($name_file_array);
      $acak           = rand(1,99);
      $nama_file_unik = $acak.$row2->kode.'.'.$ext;

      if (!empty($lokasi_file)){
        $vdir_upload = "../../assets/foto/";

        if($row2->foto != "no_image.jpg"){
          $foto_exsist = $vdir_upload.$row2->foto;
          if(file_exists($foto_exsist)){
            unlink($foto_exsist);
          }
        }

        $vfile_upload = $vdir_upload . $nama_file_unik;

        move_uploaded_file($_FILES["file_foto"]["tmp_name"], $vfile_upload);
        mysqli_query($koneksi, 'UPDATE users SET foto  = "'.$nama_file_unik.'"
                                WHERE id   = '.$row2->id);
        if($_GET['id'] == $_SESSION['user_id']){
          $_SESSION['foto'] = $nama_file_unik;
        }
      }
    
      if($_GET['id'] == $_SESSION['user_id']){
        $_SESSION['roles_id'] = $_POST['roles_id'];
      }
      $_SESSION['success'] = "Data user berhasil diubah";

      header($header2);
    }
  }
}
?>
