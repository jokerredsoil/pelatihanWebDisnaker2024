<?php 
    require_once "koneksi.php";
    $id = $_GET['id'];
    $res = mysqli_query($koneksi, "SELECT * FROM barang WHERE deleted_at IS NULL");
    $res_barang = mysqli_query($koneksi,"SELECT * FROM barang_masuk WHERE id = $id");
    $data_old = mysqli_fetch_array($res_barang);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang Masuk</title>
</head>
<body>
    <h1>Edit Barang Masuk</h1>
    <a href="./">Kembali</a>
    <form action="./aksi/edit_barang_masuk.php" method="post">
        <input type="hidden" name="barang" value="<?=$id?>">
        <div>
            <label for="barang">Barang</label>
            <select name="barang_id" id="barang">
                <option value="">Pilih Barang</option>
                <?php 
                    while ($data = mysqli_fetch_array($res)) {
                        ?>
                            <option value="<?=$data['id']?>" <?=$data_old['barang_id'] == $data['id'] ? 'selected' : ''?> ><?= $data['nama'] ?></option>
                        <?php
                    }
                ?>
            </select>
        </div>
        <div>
            <label for="penerima">Penerima</label>
            <input type="text" name="penerima" id="penerima" value="<?=$data_old['penerima']?>" placeholder="Masukkan Penerima Barang">
        </div>
        <div>
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" value="<?=$data_old['stock']?>" placeholder="Masukkan Stock Barang">
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>