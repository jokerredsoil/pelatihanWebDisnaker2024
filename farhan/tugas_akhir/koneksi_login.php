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