<?php 
require_once "../koneksi.php";

$nama = strip_tags($_POST['nama']);
$username = strip_tags($_POST['username']);
$email = strip_tags($_POST['email']);
$password = password_hash(strip_tags($_POST['password']), PASSWORD_DEFAULT);
$role = strip_tags($_POST['role']);

$sql = "INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `role`) VALUES (null, '$nama', '$username', '$email', '$password', '$role')";

$res = mysqli_query($koneksi, $sql);

if($res){
    header("Location: ../user.php?pesan=Berhasil-Menambahkan-User");
    exit();
}else{
    header("Location: ../user.php?pesan=Gagal-Menambahkan-User");
    exit();
}