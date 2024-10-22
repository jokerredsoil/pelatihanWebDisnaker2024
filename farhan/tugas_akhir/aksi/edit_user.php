<?php 
require_once "../koneksi.php";

$id = strip_tags($_POST['user']);
$nama = strip_tags($_POST['nama']);
$username = strip_tags($_POST['username']);
$email = strip_tags($_POST['email']);
$role = strip_tags($_POST['role']);
if(!is_null($_POST['password'])){
    $password = password_hash(strip_tags($_POST['password']), PASSWORD_DEFAULT);
    $sql = "UPDATE `user` SET `name`='$nama',`username`='$username',`email`='$email',`password`='$password',`role`='$role' WHERE id = $id";
}else{
    $sql = "UPDATE `user` SET `name`='$nama',`username`='$username',`email`='$email',`role`='$role' WHERE id = $id";
}

$res = mysqli_query($koneksi, $sql);

if($res){
    header("Location: ../user.php?pesan=Berhasil-Merubah-User");
    exit();
}else{
    header("Location: ../user.php?pesan=Gagal-Merubah-User");
    exit();
}