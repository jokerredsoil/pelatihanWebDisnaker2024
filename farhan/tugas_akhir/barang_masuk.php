<?php 
    require_once "koneksi.php";
    $res = mysqli_query($koneksi, "SELECT bm.*, b.nama AS nama_barang FROM barang_masuk AS bm LEFT JOIN barang AS b ON bm.barang_id = b.id AND b.deleted_at IS NULL WHERE bm.deleted_at IS NULL");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Data Barang Masuk</h1>
    <div>
        <a href="./suplier.php">Suplier</a>
        <a href="./">Barang</a>
        <a href="./barang_masuk.php">Log Masuk</a>
        <a href="./barang_keluar.php">Log Keluar</a>
    </div>
    <a href="./form_barang_masuk.php">Tambah Data</a>
    <?php if(isset($_GET['pesan'])){
        echo "<span><strong>".str_replace('-',' ',$_GET['pesan'])."</strong></span>";
    }?>
    <table border=1>
        <thead>
            <tr>
                <th>No</th>
                <th>Barang</th>
                <th>Penerima</th>
                <th>Stock</th>
                <th>Tanggal Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;
                while($d = mysqli_fetch_array($res)){
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $d['nama_barang'] ?></td>
                    <td><?= $d['penerima'] ?></td>
                    <td><?= $d['stock'] ?></td>
                    <td><?= date('d-m-Y H:i',strtotime($d['created_at'])) ?></td>
                    <td>
                        <a href="./edit_barang_masuk.php?id=<?=$d['id']?>">Edit</a>|<a href="./aksi/hapus_barang_masuk.php?id=<?=$d['id']?>">Hapus</a>
                    </td>
                </tr>
            <?php
                    $no++;
                }
            ?>
        </tbody>
    </table>
</body>
</html>