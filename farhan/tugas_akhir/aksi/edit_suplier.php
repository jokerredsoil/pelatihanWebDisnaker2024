<?php 
require_once "../koneksi.php";

$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$alamat = $_POST['alamat'];
$id = $_POST['suplier'];

$sql = "UPDATE `suplier` SET `nama`='$nama',`kontak`='$kontak',`alamat`='$alamat' WHERE id = $id";

$res = mysqli_query($koneksi, $sql);

if($res){
    $_SESSION['success'] = "Berhasil Merubah Data Suplier";
    header("Location: ../suplier.php");
    exit();
}else{
    $_SESSION['error'] = "Gagal Merubah Data Suplier";
    header("Location: ../suplier.php");
    exit();
}