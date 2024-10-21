<?php 
require_once "../koneksi.php";
$id = $_GET['id'];
$res = mysqli_query($koneksi, "UPDATE `barang` SET `deleted_at`= CURRENT_TIMESTAMP WHERE id = $id AND `deleted_at` IS NULL");
if($res){
    $_SESSION['success'] = "Berhasil Menghapus Data Barang";
    header("Location: ../");
    exit();
}else{
    $_SESSION['error'] = "Gagal Menghapus Data Barang";
    header("Location: ../");
    exit();
}