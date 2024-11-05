<?php
require_once "../koneksi.php";

if(isset($_SESSION['role']) && $_SESSION['role'] != 'Admin'){
    die('Akses Dibatasi');
}


$suplier_id = $_POST['suplier_id'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$satuan = $_POST['satuan'];
$stock = $_POST['stock'];
$id = $_POST['barang'];

$res_barang = mysqli_query($koneksi,"SELECT * FROM barang WHERE id = $id");
$data_old = mysqli_fetch_array($res_barang);

if(($_FILES['gambar']['size']) > 0){
    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg','gif');
    $filename = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($ext,$ekstensi) ) {
        header("location: ../form_barang.php?pesan=Ekstensi-Tidak-Valid");
    }

    $xx = $rand.'_'.$filename;

    try {
        move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/upload/'.$rand.'_'.$filename);
    } catch (\Throwable $th) {
        header("location: ../form_barang.php?pesan=Gagal-Upload-Gambar");
    }

    if(file_exists('../assets/upload/'.$data_old['image'])){
        unlink('../assets/upload/'.$data_old['image']);
    }

    $sql = "UPDATE `barang` SET `suplier_id`='$suplier_id',`nama`='$nama',`deskripsi`='$deskripsi',`satuan`='$satuan',`stock`='$stock', `image`='$xx' WHERE id = $id";
}else{
    $sql = "UPDATE `barang` SET `suplier_id`='$suplier_id',`nama`='$nama',`deskripsi`='$deskripsi',`satuan`='$satuan',`stock`='$stock' WHERE id = $id";
}

$res = mysqli_query($koneksi, $sql);

if($res){
    header("Location: ../?pesan=Berhasil-Merubah-Barang");
    exit();
}else{
    header("Location: ../?pesan=Gagal-Merubah-Data Barang");
    exit();
}