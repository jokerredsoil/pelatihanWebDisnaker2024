<?php 

require_once "../koneksi.php";

$id_barang = $_POST['barang'];

$sql = "SELECT b.*, COALESCE(SUM(bm.stock), 0) as jumlah_masuk, COALESCE(SUM(bk.stock), 0) as jumlah_keluar, (COALESCE(SUM(bm.stock), 0) + b.stock - COALESCE(SUM(bk.stock), 0)) AS total_stock_barang FROM barang as b LEFT JOIN barang_masuk as bm ON bm.barang_id = b.id LEFT JOIN barang_keluar as bk ON bk.barang_id = b.id WHERE b.id = $id_barang GROUP BY b.id";

$res = mysqli_query($koneksi, $sql);

if($res){
    $data = mysqli_fetch_assoc($res);
    http_response_code(200);
}else{
    $data = [];
    http_response_code(500);
}

echo json_encode($data);