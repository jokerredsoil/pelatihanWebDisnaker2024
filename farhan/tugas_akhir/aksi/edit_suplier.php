<?php 
require_once "../koneksi.php";

if(isset($_SESSION['role']) && $_SESSION['role'] != 'Admin'){
    die('Akses Dibatasi');
}

$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$alamat = $_POST['alamat'];
$id = $_POST['suplier'];

$sql = "UPDATE `suplier` SET `nama`='$nama',`kontak`='$kontak',`alamat`='$alamat' WHERE id = $id";

$res = mysqli_query($koneksi, $sql);

if($res){
    header("Location: ../suplier.php?pesan=Berhasil-Merubah-Suplier");
    exit();
}else{
    header("Location: ../suplier.php?pesan=Gagal-Merubah-Data Suplier");
    exit();
}