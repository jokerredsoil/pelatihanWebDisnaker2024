<?php
require_once "../koneksi.php";

$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$alamat = $_POST['alamat'];

$sql = "INSERT INTO `suplier`(`id`, `nama`, `kontak`, `alamat`) VALUES (null, '$nama','$kontak','$alamat')";

$res = mysqli_query($koneksi, $sql);

if($res){
    $_SESSION['success'] = "Berhasil Menambahkan Data Suplier";
    header("Location: ../suplier.php");
    exit();
}else{
    $_SESSION['error'] = "Gagal Menambahkan Data Suplier";
    header("Location: ../suplier.php");
    exit();
}