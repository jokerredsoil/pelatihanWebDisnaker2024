<?php 

require_once "../koneksi.php";

if(isset($_POST['barang'])){

    $id_barang = $_POST['barang'];

    $sql = "SELECT b.*, COALESCE(SUM(bm.stock), 0) as jumlah_masuk, COALESCE(SUM(bk.stock), 0) as jumlah_keluar, (COALESCE(SUM(bm.stock), 0) + b.stock - COALESCE(SUM(bk.stock), 0)) AS total_stock_barang FROM barang as b LEFT JOIN barang_masuk as bm ON bm.barang_id = b.id AND bm.deleted_at IS NULL LEFT JOIN barang_keluar as bk ON bk.barang_id = b.id AND bk.deleted_at IS NULL WHERE b.id = $id_barang GROUP BY b.id";

    $res = mysqli_query($koneksi, $sql);

    if($res){
        $data = mysqli_fetch_assoc($res);
    }else{
        $data = [];
    }

    echo json_encode($data);

}