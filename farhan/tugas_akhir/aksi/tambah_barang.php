<?php
require_once "../koneksi.php";

if(isset($_SESSION['role']) && $_SESSION['role'] != 'Admin'){
    die('Akses Dibatasi');
}

$suplier_id = $_POST['suplier_id'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$satuan = $_POST['satuan'];
$stock = $_POST['stock'];

$sql = "INSERT INTO `barang`(`id`, `suplier_id`, `nama`, `deskripsi`, `satuan`, `stock`) VALUES (null, '$suplier_id','$nama','$deskripsi','$satuan','$stock')";

$res = mysqli_query($koneksi, $sql);

if($res){
    header("Location: ../?pesan=Berhasil-Menambahkan-Barang");
    exit();
}else{
    header("Location: ../?pesan=Gagal-Menambahkan-Data Barang");
    exit();
}