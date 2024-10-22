<?php 
    require "koneksi.php";
    if(isset($_SESSION['role']) && $_SESSION['role'] != 'Admin'){
        die('Akses Dibatasi');
    }
    include "shared/header.php";
    include "shared/side.php";
    $link = './aksi/tambah_barang_keluar.php';
    $res = mysqli_query($koneksi, "SELECT * FROM barang WHERE deleted_at IS NULL");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $res_barang_keluar = mysqli_query($koneksi,"SELECT * FROM barang_keluar WHERE id = $id");
        $data_old = mysqli_fetch_array($res_barang_keluar);
        $link = './aksi/edit_barang_keluar.php';
    }    
?>
<div class="col-sm-12 col-md-9">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Barang Keluar</h4>
        </div>
        <form action="<?=$link?>" class="row g-3 needs-validation" novalidate method="post" id="form-barang-keluar">
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
                            <label class="form-label" for="pengambil">Pengambil</label>
                            <input class="form-control" type="text" name="pengambil" id="pengambil" value="<?= isset($data_old) ? $data_old['pengambil'] : '' ?>" placeholder="Masukkan Pengambil Barang">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="stock">Stock</label>
                            <input class="form-control" type="number" name="stock" id="stock" value="<?= isset($data_old) ? $data_old['stock'] : '' ?>" placeholder="Masukkan Stock Barang">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end gap-3">
                <a href="./barang_keluar.php" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php 
    include "shared/footer.php"
?>