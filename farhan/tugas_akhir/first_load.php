<?php 

require_once "koneksi.php";

$password = password_hash('admin1234', PASSWORD_DEFAULT);
$sql = "INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `role`) VALUES (null, 'Admin', 'admin', 'admin@gmail.com', '$password', 'Admin')";
$result = mysqli_query($koneksi, $sql);

if(!$result){
    echo "Gagal membuat user admin : ".mysqli_connect_error();
    exit();
}
die('Berhasil membuat user admin');