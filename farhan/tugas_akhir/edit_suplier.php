<?php 
    require_once "koneksi.php";
    $id = $_GET['id'];
    $res = mysqli_query($koneksi,"SELECT * FROM suplier WHERE id = $id");
    $data = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Suplier</title>
</head>
<body>
    <h1>Edit Suplier</h1>
    <a href="./">Kembali</a>
    <form action="./aksi/edit_suplier.php" method="post">
        <input type="hidden" name="suplier" value="<?= $id ?>">
        <div>
            <label for="nama">Nama Suplier</label>
            <input type="text" name="nama" id="nama" value="<?=$data['nama']?>" placeholder="Masukkan Nama Suplier">
        </div>
        <div>
            <label for="kontak">Kontak Suplier</label>
            <input type="number" name="kontak" id="kontak" value="<?=$data['kontak']?>" placeholder="Masukkan Kontak Suplier">
        </div>
        <div>
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" placeholder="Masukkan Alamat Suplier"><?=$data['alamat']?></textarea>
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>