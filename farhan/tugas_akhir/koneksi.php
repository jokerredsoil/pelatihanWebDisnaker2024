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

if(!isset($_SESSION['login'])){
    header("Location: ./login.php?pesan=Anda-Harus-Login-Terlebih-Dahulu");
}

function showuser(){
    global $koneksi;
    $username = $_SESSION['username'];
    $res = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
    return mysqli_fetch_array($res);
}