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

  // Hapus absensi
  if ($module=='absensi' AND $act=='hapus'){

    $rows = mysqli_query($koneksi, "SELECT * FROM pembelajaran WHERE id='".$_GET['id']."'");
    $row = mysqli_fetch_object($rows);

    mysqli_query($koneksi, 'DELETE FROM pembelajaran WHERE id='.$_GET['id']);

    $_SESSION['success'] = "Data berhasil dihapus";
    
    header('location:../../media.php?module='.$module.'&act=view&id='.$row->kelas_id);
  }

  // Input absensi
  elseif ($module=='absensi' AND $act=='input'){
    mysqli_query($koneksi, 'INSERT INTO pembelajaran (kelas_id, nama, tanggal_masuk) 
                              VALUES("'.$_GET['id'].'", "'.$_POST['nama'].'","'.date("Y-m-d H:i:s", strtotime($_POST['tanggal_masuk'])).'");');
    
    $_SESSION['success'] = "Data berhasil ditambahkan";

    header('location:../../media.php?module='.$module.'&act=view&id='.$_GET['id']);
  }

  // Update absensi
  elseif ($module=='absensi' AND $act=='update'){
    mysqli_query($koneksi, 'UPDATE pembelajaran SET nama          = "'.$_POST['nama'].'",
                                                    tanggal_masuk = "'.$_POST['tanggal_masuk'].'"
                              WHERE id   = '.$_GET['id']);

    $rows = mysqli_query($koneksi, "SELECT * FROM pembelajaran WHERE id='".$_GET['id']."'");
    $row = mysqli_fetch_object($rows);
    
    $_SESSION['success'] = "Data berhasil diubah";

    header('location:../../media.php?module='.$module.'&act=view&id='.$row->kelas_id);
  }

  // Update absensi
  elseif ($module=='absensi' AND $act=='absen'){
    $rows1 = mysqli_query($koneksi, "SELECT * FROM absensi WHERE pembelajaran_id=".$_GET['id']." AND siswa_id=".$_GET['siswa_id']);
    $row1 = mysqli_fetch_object($rows1);

    mysqli_query($koneksi, 'DELETE FROM absensi WHERE pembelajaran_id='.$_GET['id'].' AND siswa_id='.$_GET['siswa_id'] );
    
    $vdir_upload = "../../assets/surat_sakit/";
    $foto_exsist = $vdir_upload.$row1->file_surat;
    if(file_exists($foto_exsist)){
      unlink($foto_exsist);
    }

    $lokasi_file    = $_FILES['file_surat']['tmp_name'];
    $tipe_file      = $_FILES['file_surat']['type'];
    $name_file      = $_FILES["file_surat"]["name"];
    $name_file_array= explode(".", $name_file);
    $ext            = end($name_file_array);
    $acak           = rand(1,99);
    $nama_file_unik = $acak.'-'.$row1->id.'.'.$ext;

    if (!empty($lokasi_file)){
      $vfile_upload = $vdir_upload . $nama_file_unik;

      move_uploaded_file($lokasi_file , $vfile_upload);
    }
    else{
      $nama_file_unik = NULL;
    }

    if($_POST['status'] != 'Tidak Hadir') {
      if($_POST['status'] == 'Hadir'){
        if(empty($_POST['tanggal_masuk'])){
          $tanggal_masuk = date('Y-m-d H:i:s');
        }
        else{
          $tanggal_masuk = date("Y-m-d H:i:s", strtotime($_POST['tanggal_masuk']));
        }
        mysqli_query($koneksi, 'INSERT INTO absensi (pembelajaran_id, siswa_id, status, tanggal_masuk) 
                                VALUES('.$_GET['id'].', '.$_GET['siswa_id'].',"'.$_POST['status'].'","'.$tanggal_masuk.'");');
      }
      elseif($_POST['status'] == 'Izin'){
        mysqli_query($koneksi, 'INSERT INTO absensi (pembelajaran_id, siswa_id, status, keterangan) 
                                VALUES('.$_GET['id'].', '.$_GET['siswa_id'].',"'.$_POST['status'].'","'.$_POST['keterangan'].'");');
      }
      else{
        mysqli_query($koneksi, 'INSERT INTO absensi (pembelajaran_id, siswa_id, status, file_surat) 
                                VALUES('.$_GET['id'].', '.$_GET['siswa_id'].',"'.$_POST['status'].'","'.$nama_file_unik.'");');
      }
      
    }

    $rows = mysqli_query($koneksi, "SELECT * FROM pembelajaran WHERE id='".$_GET['id']."'");
    $row = mysqli_fetch_object($rows);
    
    $_SESSION['success'] = "Peserta berhasil diabsen";
    
    header('location:../../media.php?module='.$module.'&act=view&id='.$row->kelas_id);
  }

  // Update absensi
  elseif ($module=='absensi' AND $act=='absen_qrcode'){
    mysqli_query($koneksi, 'DELETE FROM absensi WHERE pembelajaran_id='.$_GET['id'].' AND siswa_id='.$_GET['siswa_id'] );
    mysqli_query($koneksi, 'INSERT INTO absensi (pembelajaran_id, siswa_id, status, tanggal_masuk) 
                                VALUES('.$_GET['id'].', '.$_GET['siswa_id'].',"Hadir", "'.date('Y-m-d H:i:s').'");');

    $rows = mysqli_query($koneksi, "SELECT * FROM pembelajaran WHERE id='".$_GET['id']."'");
    $row = mysqli_fetch_object($rows);
    
    $_SESSION['success'] = "Peserta berhasil diabsen";

    header('location:../../media.php?module=absensi&act=absen_qrcode&id='.$_GET['id']);
  }
}
?>
