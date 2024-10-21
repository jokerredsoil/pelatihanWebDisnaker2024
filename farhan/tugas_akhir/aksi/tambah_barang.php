<?php
require_once "../koneksi.php";

$suplier_id = $_POST['suplier_id'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$satuan = $_POST['satuan'];
$stock = $_POST['stock'];

$sql = "INSERT INTO `barang`(`id`, `suplier_id`, `nama`, `deskripsi`, `satuan`, `stock`) VALUES (null, '$suplier_id','$nama','$deskripsi','$satuan','$stock')";

$res = mysqli_query($koneksi, $sql);

if($res){
    $_SESSION['success'] = "Berhasil Menambahkan Data Barang";
    header("Location: ../");
    exit();
}else{
    $_SESSION['error'] = "Gagal Menambahkan Data Barang";
    header("Location: ../");
    exit();
}