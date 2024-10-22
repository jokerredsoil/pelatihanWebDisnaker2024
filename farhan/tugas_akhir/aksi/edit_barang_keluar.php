<?php
require_once "../koneksi.php";

if(isset($_SESSION['role']) && $_SESSION['role'] != 'Admin'){
    die('Akses Dibatasi');
}

$id = $_POST['barang'];
$barang_id = $_POST['barang_id'];
$pengambil = $_POST['pengambil'];
$stock = $_POST['stock'];

$sql = "UPDATE `barang_keluar` SET `barang_id`='$barang_id',`pengambil`='$pengambil',`stock`='$stock' WHERE id = $id";

$res = mysqli_query($koneksi, $sql);

if($res){
    header("Location: ../barang_keluar.php?pesan=Berhasil-Merubah-Barang-Keluar");
    exit();
}else{
    header("Location: ../barang_keluar.php?pesan=Gagal-Merubah-Barang-Keluar");
    exit();
}