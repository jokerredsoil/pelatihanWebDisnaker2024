<?php
require_once "../koneksi.php";

$barang_id = $_POST['barang_id'];
$penerima = $_POST['penerima'];
$stock = $_POST['stock'];

$sql = "INSERT INTO `barang_masuk`(`id`, `barang_id`, `penerima`, `stock`) VALUES (null, '$barang_id','$penerima','$stock')";

$res = mysqli_query($koneksi, $sql);

if($res){
    header("Location: ../barang_masuk.php?pesan=Berhasil-Menambahkan-Barang-Masuk");
    exit();
}else{
    header("Location: ../barang_masuk.php?pesan=Gagal-Menambahkan-Barang-Masuk");
    exit();
}