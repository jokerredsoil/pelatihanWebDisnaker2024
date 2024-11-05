<?php
require_once "../koneksi.php";

if(isset($_SESSION['role']) && $_SESSION['role'] != 'Admin'){
    die('Akses Dibatasi');
}

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['gambar']['name'];
$ukuran = $_FILES['gambar']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

$suplier_id = $_POST['suplier_id'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$satuan = $_POST['satuan'];
$stock = $_POST['stock'];


if(!in_array($ext,$ekstensi) ) {
    header("location: ../form_barang.php?pesan=Ekstensi-Tidak-Valid");
}

try {
    $xx = $rand.'_'.$filename;
	move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/upload/'.$rand.'_'.$filename);
    $sql = "INSERT INTO `barang`(`id`, `suplier_id`, `nama`, `deskripsi`, `satuan`, `stock`, `image`) VALUES (null, '$suplier_id','$nama','$deskripsi','$satuan','$stock','$xx')";
    $res = mysqli_query($koneksi, $sql);
    if($res){
        header("Location: ../?pesan=Berhasil-Menambahkan-Barang");
        exit();
    }else{
        header("Location: ../?pesan=Gagal-Menambahkan-Data-Barang");
        exit();
    }

} catch (\Throwable $th) {
    header("location: ../form_barang.php?pesan=Error-Upload-Image-Barang");
}
