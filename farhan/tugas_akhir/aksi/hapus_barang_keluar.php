<?php 
require_once "../koneksi.php";

if(isset($_SESSION['role']) && $_SESSION['role'] != 'Admin'){
    die('Akses Dibatasi');
}

$id = $_GET['id'];
$res = mysqli_query($koneksi, "UPDATE `barang_keluar` SET `deleted_at`= CURRENT_TIMESTAMP WHERE id = $id AND `deleted_at` IS NULL");
if($res){
    header("Location: ../barang_keluar.php?pesan=Berhasil-Menghapus-Barang-Keluar");
    exit();
}else{
    header("Location: ../barang_keluar.php?pesan=Gagal-Menghapus-Barang-Keluar");
    exit();
}