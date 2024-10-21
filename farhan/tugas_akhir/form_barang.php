<?php 
    require_once "koneksi.php";
    $res = mysqli_query($koneksi, "SELECT * FROM suplier WHERE deleted_at IS NULL");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
</head>
<body>
    <h1>Tambah Barang</h1>
    <a href="./">Kembali</a>
    <form action="./aksi/tambah_barang.php" method="post">
        <div>
            <label for="suplier">Suplier</label>
            <select name="suplier_id" id="suplier">
                <option value="">Pilih Suplier</option>
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
            <label for="nama">Barang</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Barang">
        </div>
        <div>
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi Barang"></textarea>
        </div>
        <div>
            <label for="satuan">Satuan</label>
            <input type="text" name="satuan" id="satuan" placeholder="Masukkan Satuan Barang">
        </div>
        <div>
            <label for="stock">Stock</label>
            <input type="text" name="stock" id="stock" placeholder="Masukkan Stock Barang">
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>