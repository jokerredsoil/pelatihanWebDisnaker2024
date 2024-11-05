<?php 
    require "koneksi.php";
    if(isset($_SESSION['role']) && $_SESSION['role'] != 'Admin'){
        die('Akses Dibatasi');
    }
    $active = "barang";
    include "shared/header.php";
    include "shared/side.php";
    $res = mysqli_query($koneksi, "SELECT * FROM suplier WHERE deleted_at IS NULL");
    $link = './aksi/tambah_barang.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $res_barang = mysqli_query($koneksi,"SELECT * FROM barang WHERE id = $id");
        $data_old = mysqli_fetch_array($res_barang);
        $link = './aksi/edit_barang.php';
    }    
?>
<div class="col-sm-12 col-md-9">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Barang</h4>
        </div>
        <form action="<?=$link?>" class="row g-3 needs-validation" novalidate method="post" id="form-barang" enctype="multipart/form-data">
            <?php if(isset($data_old)) {?>
                <input type="hidden" name="barang" value="<?=$id?>">
            <?php }?>
            <div class="card-body">
                <?php if(isset($_GET['pesan'])){
                    ?>
                        <div class="alert alert-light" role="alert">
                            <?= str_replace('-',' ',$_GET['pesan']) ?>
                        </div>
                    <?php
                } ?>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="suplier">Suplier</label>
                            <select class="form-select" name="suplier_id" id="suplier">
                                <option value="">Pilih Suplier</option>
                                <?php 
                                    while ($data = mysqli_fetch_array($res)) {
                                        ?>
                                            <option value="<?=$data['id']?>" <?= (isset($data_old) && $data_old['suplier_id'] == $data['id']) ? 'selected' : '' ?>><?= $data['nama'] ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="nama">Barang</label>
                            <input class="form-control" type="text" name="nama" id="nama" value="<?= isset($data_old) ? $data_old['nama'] :'' ?>" placeholder="Masukkan Nama Barang">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi Barang"><?= isset($data_old) ? $data_old['deskripsi'] :'' ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="satuan">Satuan</label>
                            <input class="form-control" type="text" name="satuan" id="satuan" placeholder="Masukkan Satuan Barang" value="<?= isset($data_old) ? $data_old['satuan'] :'' ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="stock">Stock</label>
                            <input class="form-control" type="number" name="stock" id="stock" placeholder="Masukkan Stock Barang" value="<?= isset($data_old) ? $data_old['stock'] :'' ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="gambar">Gambar</label>
                            <input class="form-control" type="file" name="gambar" id="gambar">
                            <?php if(isset($data_old['image'])) {?>
                                <img class="mt-2" src="assets/upload/<?= $data_old['image'] ?>" style="max-width:150px;">
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end gap-3">
                <a href="./" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php 
    include "shared/footer.php"
?>