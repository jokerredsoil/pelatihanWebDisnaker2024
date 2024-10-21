<?php
require_once "../koneksi.php";

$suplier_id = $_POST['suplier_id'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$satuan = $_POST['satuan'];
$stock = $_POST['stock'];
$id = $_POST['barang'];

$sql = "UPDATE `barang` SET `suplier_id`='$suplier_id',`nama`='$nama',`deskripsi`='$deskripsi',`satuan`='$satuan',`stock`='$stock' WHERE id = $id";

$res = mysqli_query($koneksi, $sql);

if($res){
    header("Location: ../?pesan=Berhasil-Merubah-Barang");
    exit();
}else{
    header("Location: ../?pesan=Gagal-Merubah-Data Barang");
    exit();
}