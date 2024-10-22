<?php 
    require "koneksi.php";
    if(isset($_SESSION['role']) && $_SESSION['role'] != 'Admin'){
        die('Akses Dibatasi');
    }
    include "shared/header.php";
    include "shared/side.php";
    $link = './aksi/tambah_suplier.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $res_suplier = mysqli_query($koneksi,"SELECT * FROM suplier WHERE id = $id");
        $data_old = mysqli_fetch_array($res_suplier);
        $link = './aksi/edit_suplier.php';
    }    
?>
<div class="col-sm-12 col-md-9">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Suplier</h4>
        </div>
        <form action="<?=$link?>" class="row g-3 needs-validation" novalidate method="post" id="form-suplier">
            <?php if(isset($data_old)) {?>
                <input type="hidden" name="suplier" value="<?=$id?>">
            <?php }?>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="nama">Nama Suplier</label>
                            <input class="form-control" type="text" name="nama" id="nama" value="<?= isset($data_old) ? $data_old['nama'] : '' ?>" placeholder="Masukkan Nama Suplier">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="kontak">Kontak Suplier</label>
                            <input class="form-control" type="number" name="kontak" id="kontak" value="<?= isset($data_old) ? $data_old['kontak'] : '' ?>" placeholder="Masukkan Kontak Suplier">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat Suplier"><?= isset($data_old) ? $data_old['alamat'] : '' ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end gap-3">
                <a href="./suplier.php" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php 
    include "shared/footer.php"
?>