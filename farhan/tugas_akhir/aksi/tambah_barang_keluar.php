<?php
require_once "../koneksi.php";

$barang_id = $_POST['barang_id'];
$pengambil = $_POST['pengambil'];
$stock = $_POST['stock'];

$sql = "INSERT INTO `barang_keluar`(`id`, `barang_id`, `pengambil`, `stock`) VALUES (null, '$barang_id','$pengambil','$stock')";

$res = mysqli_query($koneksi, $sql);

if($res){
    header("Location: ../barang_keluar.php?pesan=Berhasil-Menambahkan-Barang-Keluar");
    exit();
}else{
    header("Location: ../barang_keluar.php?pesan=Gagal-Menambahkan-Barang-Keluar");
    exit();
}