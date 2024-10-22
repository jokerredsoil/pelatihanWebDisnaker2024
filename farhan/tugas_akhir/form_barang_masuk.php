<?php 
    require "koneksi.php";
    if(isset($_SESSION['role']) && $_SESSION['role'] != 'Admin'){
        die('Akses Dibatasi');
    }
    include "shared/header.php";
    include "shared/side.php";
    $link = './aksi/tambah_barang_masuk.php';
    $res = mysqli_query($koneksi, "SELECT * FROM barang WHERE deleted_at IS NULL");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $res_barang_masuk = mysqli_query($koneksi,"SELECT * FROM barang_masuk WHERE id = $id");
        $data_old = mysqli_fetch_array($res_barang_masuk);
        $link = './aksi/edit_barang_masuk.php';
    }    
?>
<div class="col-sm-12 col-md-9">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Barang Masuk</h4>
        </div>
        <form action="<?=$link?>" class="row g-3 needs-validation" novalidate method="post">
            <?php if(isset($data_old)) {?>
                <input type="hidden" name="barang" value="<?=$id?>">
            <?php }?>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="barang">Barang</label>
                            <select class="form-select" name="barang_id" id="barang">
                                <option value="">Pilih Barang</option>
                                <?php 
                                    while ($data = mysqli_fetch_array($res)) {
                                        ?>
                                            <option value="<?=$data['id']?>" <?= (isset($data_old) && $data_old['barang_id'] == $data['id']) ? 'selected' : '' ?>><?= $data['nama'] ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="penerima">Penerima</label>
                            <input class="form-control" type="text" name="penerima" id="penerima" value="<?= isset($data_old) ? $data_old['penerima'] : '' ?>" placeholder="Masukkan Penerima Barang">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="stock">Stock</label>
                            <input class="form-control" type="number" name="stock" id="stock" value="<?= isset($data_old) ? $data_old['stock'] : '' ?>" placeholder="Masukkan Stock Barang">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end gap-3">
                <a href="./barang_masuk.php" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php 
    include "shared/footer.php"
?>