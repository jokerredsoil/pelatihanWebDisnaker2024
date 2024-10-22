<?php 
require_once "../../koneksi_login.php";

$username = $_POST['username'];
$password = $_POST['password'];

$res = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'");
$user = mysqli_fetch_array($res);
if(!is_null($user)){
    if(password_verify($password,$user['password'])){
        $_SESSION['login'] = true;
        $_SESSION['role'] = $user['role'];
        $_SESSION['username'] = $user['username'];
        header('Location: ../../?pesan=Berhasil-Login');
    }else{
        header('Location: ../../login.php?pesan=Password-Tidak-Sama');
    }
}else{
    header('Location: ../../login.php?pesan=Username-Tidak-Ditemukan');
}