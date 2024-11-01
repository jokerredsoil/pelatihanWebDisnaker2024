<?php
require_once "../koneksi.php";

if(isset($_SESSION['role']) && $_SESSION['role'] != 'Admin'){
    die('Akses Dibatasi');
}

$id = $_POST['barang'];
$barang_id = $_POST['barang_id'];
$penerima = $_POST['penerima'];
$stock = $_POST['stock'];

$sql = "UPDATE `barang_masuk` SET `barang_id`='$barang_id',`penerima`='$penerima',`stock`='$stock' WHERE id = $id";

$res = mysqli_query($koneksi, $sql);

if($res){
    header("Location: ../barang_masuk.php?pesan=Berhasil-Merubah-Barang-Masuk");
    exit();
}else{
    header("Location: ../barang_masuk.php?pesan=Gagal-Merubah-Barang-Masuk");
    exit();
}