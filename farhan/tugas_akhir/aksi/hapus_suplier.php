<?php 
require_once "../koneksi.php";

if(isset($_SESSION['role']) && $_SESSION['role'] != 'Admin'){
    die('Akses Dibatasi');
}

$id = $_GET['id'];
$res = mysqli_query($koneksi, "UPDATE `suplier` SET `deleted_at`= CURRENT_TIMESTAMP WHERE id = $id AND `deleted_at` IS NULL");
if($res){
    header("Location: ../suplier.php?pesan=Berhasil-Menghapus-Suplier");
    exit();
}else{
    header("Location: ../suplier.php?pesan=Gagal-Menghapus-Data Suplier");
    exit();
}