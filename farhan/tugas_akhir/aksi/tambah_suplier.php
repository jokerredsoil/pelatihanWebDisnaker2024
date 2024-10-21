<?php
require_once "../koneksi.php";

$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$alamat = $_POST['alamat'];

$sql = "INSERT INTO `suplier`(`id`, `nama`, `kontak`, `alamat`) VALUES (null, '$nama','$kontak','$alamat')";

$res = mysqli_query($koneksi, $sql);

if($res){
    header("Location: ../suplier.php?pesan=Berhasil-Menambahkan-Suplier");
    exit();
}else{
    header("Location: ../suplier.php?pesan=Gagal-Menambahkan-Data Suplier");
    exit();
}