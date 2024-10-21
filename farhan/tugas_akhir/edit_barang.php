<?php 
    require_once "koneksi.php";
    $id = $_GET['id'];
    $res = mysqli_query($koneksi, "SELECT * FROM suplier WHERE deleted_at IS NULL");
    $res_barang = mysqli_query($koneksi,"SELECT * FROM barang WHERE id = $id");
    $data_old = mysqli_fetch_array($res_barang);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
</head>
<body>
    <h1>Edit Barang</h1>
    <a href="./">Kembali</a>
    <form action="./aksi/edit_barang.php" method="post">
        <input type="hidden" name="barang" value="<?=$id?>">
        <div>
            <label for="suplier">Suplier</label>
            <select name="suplier_id" id="suplier">
                <option value="">Pilih Suplier</option>
                <?php 
                    while ($data = mysqli_fetch_array($res)) {
                        ?>
                            <option value="<?=$data['id']?>" <?=$data_old['suplier_id'] == $data['id'] ? 'selected' : ''?> ><?= $data['nama'] ?></option>
                        <?php
                    }
                ?>
            </select>
        </div>
        <div>
            <label for="nama">Barang</label>
            <input type="text" name="nama" id="nama" value="<?=$data_old['nama']?>" placeholder="Masukkan Nama Barang">
        </div>
        <div>
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi Barang"><?=$data_old['deskripsi']?></textarea>
        </div>
        <div>
            <label for="satuan">Satuan</label>
            <input type="text" name="satuan" id="satuan" value="<?=$data_old['satuan']?>" placeholder="Masukkan Satuan Barang">
        </div>
        <div>
            <label for="stock">Stock</label>
            <input type="text" name="stock" id="stock" value="<?=$data_old['stock']?>" placeholder="Masukkan Stock Barang">
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>