<?php 
    require_once "koneksi.php";
    $res = mysqli_query($koneksi, "SELECT * FROM user");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Data User</h1>
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
    <a href="./form_user.php">Tambah Data</a>
    <?php if(isset($_GET['pesan'])){
        echo "<span><strong>".str_replace('-',' ',$_GET['pesan'])."</strong></span>";
    }?>
    <table border=1>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Banned</th>
                <th>Gabung</th>
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
                    <td><?= $d['name'] ?></td>
                    <td><?= $d['username'] ?></td>
                    <td><?= $d['email'] ?></td>
                    <td><?= $d['role'] ?></td>
                    <td><?= $d['banned'] != 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
                    <td><?= date('d-m-Y H:i',strtotime($d['created_at'])) ?></td>
                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') {?>
                        <td>
                            <a href="./edit_user.php?id=<?=$d['id']?>">Edit</a>|<a href="./aksi/banned_user.php?id=<?=$d['id']?>">Hapus</a>
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