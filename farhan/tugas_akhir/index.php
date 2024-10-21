<?php 
    require_once "koneksi.php";
    $res = mysqli_query($koneksi, "SELECT b.*, s.nama AS nama_suplier FROM barang AS b LEFT JOIN suplier AS s ON b.suplier_id = s.id AND s.deleted_at IS NULL WHERE b.deleted_at IS NULL");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Data Barang</h1>
    <div>
        <a href="<?= $_SERVER['REQUEST_URI'] ?>suplier.php">Suplier</a>
        <a href="<?= $_SERVER['REQUEST_URI'] ?>">Barang</a>
        <a href="<?= $_SERVER['REQUEST_URI'] ?>masuk.php">Log Masuk</a>
        <a href="<?= $_SERVER['REQUEST_URI'] ?>keluar.php">Log Keluar</a>
    </div>
    <a href="<?= $_SERVER['REQUEST_URI'] ?>form_barang.php">Tambah Data</a>
    <?php if(isset($_SESSION['success'])){
        echo "<span><strong>".$_SESSION['success']."</strong></span>";
    }elseif(isset($_SESSION['error'])){
        echo "<span><strong>".$_SESSION['error']."</strong></span>";
    } ?>
    <table border=1>
        <thead>
            <tr>
                <th>No</th>
                <th>Suplier</th>
                <th>Barang</th>
                <th>Deskripsi</th>
                <th>Satuan</th>
                <th>Stock</th>
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
                    <td><?= $d['nama_suplier'] ?></td>
                    <td><?= $d['nama'] ?></td>
                    <td><?= $d['deskripsi'] ?></td>
                    <td><?= $d['satuan'] ?></td>
                    <td><?= $d['stock'] ?></td>
                    <td>
                        <a href="edit_barang.php?id=<?=$d['id']?>">Edit</a>|<a href="aksi/hapus_barang.php?id=<?=$d['id']?>">Hapus</a>
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