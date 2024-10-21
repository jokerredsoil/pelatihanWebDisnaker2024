<?php 
    require_once "koneksi.php";
    $res = mysqli_query($koneksi, "SELECT * FROM barang WHERE deleted_at IS NULL");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang Keluar</title>
</head>
<body>
    <h1>Tambah Barang Keluar</h1>
    <a href="./">Kembali</a>
    <form action="./aksi/tambah_barang_keluar.php" method="post">
        <div>
            <label for="barang">Barang</label>
            <select name="barang_id" id="barang">
                <option value="">Pilih Barang</option>
                <?php 
                    while ($data = mysqli_fetch_array($res)) {
                        ?>
                            <option value="<?=$data['id']?>"><?= $data['nama'] ?></option>
                        <?php
                    }
                ?>
            </select>
        </div>
        <div>
            <label for="pengambil">Pengambil</label>
            <input type="text" name="pengambil" id="pengambil" placeholder="Masukkan Pengambil Barang">
        </div>
        <div>
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" placeholder="Masukkan Stock Barang">
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>