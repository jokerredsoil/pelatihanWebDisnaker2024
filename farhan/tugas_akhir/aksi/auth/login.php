<?php 
session_start();
$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_gudang";

$koneksi = mysqli_connect($hostname,$username,$password,$database);

if(mysqli_connect_errno()){
    echo "Failed to connect databse : ".mysqli_connect_error();
    exit();
}

$username = $_POST['username'];
$password = $_POST['password'];

$res = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'");
$user = mysqli_fetch_array($res);
if(!is_null($user)){
    if($user['banned']){
        header('Location: ../../login.php?pesan=User-Di-Banned');
    }else{
        if(password_verify($password,$user['password'])){
            $_SESSION['login'] = true;
            $_SESSION['role'] = $user['role'];
            $_SESSION['username'] = $user['username'];
            header('Location: ../../?pesan=Berhasil-Login');
        }else{
            header('Location: ../../login.php?pesan=Password-Tidak-Sama');
        }
    }
}else{
    header('Location: ../../login.php?pesan=Username-Tidak-Ditemukan');
}