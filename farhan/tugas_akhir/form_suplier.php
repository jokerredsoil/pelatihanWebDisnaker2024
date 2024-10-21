<?php 
    require_once "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Suplier</title>
</head>
<body>
    <h1>Tambah Suplier</h1>
    <a href="./">Kembali</a>
    <form action="./aksi/tambah_suplier.php" method="post">
        <div>
            <label for="nama">Nama Suplier</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Suplier">
        </div>
        <div>
            <label for="kontak">Kontak Suplier</label>
            <input type="number" name="kontak" id="kontak" placeholder="Masukkan Kontak Suplier">
        </div>
        <div>
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" placeholder="Masukkan Alamat Suplier"></textarea>
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>