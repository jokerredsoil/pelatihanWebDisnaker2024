<?php 
    require_once "koneksi.php";
    $res = mysqli_query($koneksi, "SELECT * FROM suplier WHERE deleted_at IS NULL");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Data Suplier</h1>
    <div>
        <a href="./suplier.php">Suplier</a>
        <a href="./">Barang</a>
        <a href="./barang_masuk.php">Log Masuk</a>
        <a href="./barang_keluar.php">Log Keluar</a>
    </div>
    <a href="./form_suplier.php">Tambah Data</a>
    <?php if(isset($_GET['pesan'])){
        echo "<span><strong>".str_replace('-',' ',$_GET['pesan'])."</strong></span>";
    }?>
    <table border=1>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kontak</th>
                <th>Alamat</th>
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
                    <td><?= $d['nama'] ?></td>
                    <td><?= $d['kontak'] ?></td>
                    <td><?= $d['alamat'] ?></td>
                    <td>
                        <a href="./edit_suplier.php?id=<?=$d['id']?>">Edit</a>|<a href="./aksi/hapus_suplier.php?id=<?=$d['id']?>">Hapus</a>
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