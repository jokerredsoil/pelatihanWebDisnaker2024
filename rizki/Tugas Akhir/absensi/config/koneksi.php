<?php
    // definisikan koneksi ke database
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "pelatihan";

    // Koneksi dan memilih database di server
    $koneksi = mysqli_connect($server,$username,$password,$database) or die("Koneksi gagal");
?>