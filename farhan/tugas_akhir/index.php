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
        <a href="./suplier.php">Suplier</a>
        <a href="./">Barang</a>
        <a href="./barang_masuk.php">Log Masuk</a>
        <a href="./barang_keluar.php">Log Keluar</a>
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') {?>
            <a href="./user.php">User Management</a>
        <?php }?>
        <a href="./aksi/auth/logout.php">Logout</a>
    </div>
    <a href="./form_barang.php">Tambah Data</a>
    <?php if(isset($_GET['pesan'])){
        echo "<span><strong>".str_replace('-',' ',$_GET['pesan'])."</strong></span>";
    }?>
    <table border=1>
        <thead>
            <tr>
                <th>No</th>
                <th>Suplier</th>
                <th>Barang</th>
                <th>Deskripsi</th>
                <th>Satuan</th>
                <th>Stock</th>
                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') {?>
                    <th>Aksi</th>
                <?php }?>
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
                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') {?>
                        <td>
                            <a href="./edit_barang.php?id=<?=$d['id']?>">Edit</a>|<a href="./aksi/hapus_barang.php?id=<?=$d['id']?>">Hapus</a>
                        </td>
                    <?php }?>
                </tr>
            <?php
                    $no++;
                }
            ?>
        </tbody>
    </table>
</body>
</html>