<?php 
require_once "../koneksi.php";
$id = $_GET['id'];
$res = mysqli_query($koneksi, "UPDATE `barang_masuk` SET `deleted_at`= CURRENT_TIMESTAMP WHERE id = $id AND `deleted_at` IS NULL");
if($res){
    header("Location: ../barang_masuk.php?pesan=Berhasil-Menghapus-Barang");
    exit();
}else{
    header("Location: ../barang_masuk.php?pesan=Gagal-Menghapus-Data Barang");
    exit();
}