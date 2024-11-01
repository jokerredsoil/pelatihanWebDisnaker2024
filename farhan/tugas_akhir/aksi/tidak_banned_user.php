<?php 
require_once "../koneksi.php";

if(isset($_SESSION['role']) && $_SESSION['role'] != 'Admin'){
    die('Akses Dibatasi');
}

$id = strip_tags($_GET['id']);
$sql = "UPDATE `user` SET `banned`=0 WHERE id = $id";

$res = mysqli_query($koneksi, $sql);

if($res){
    header("Location: ../user.php?pesan=Berhasil-Unbanned-User");
    exit();
}else{
    header("Location: ../user.php?pesan=Gagal-Unbanned-User");
    exit();
}