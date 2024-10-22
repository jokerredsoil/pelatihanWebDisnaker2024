<?php 
    require "koneksi.php";
    include "shared/header.php";
    include "shared/side.php";
    $res = mysqli_query($koneksi, "SELECT b.*, s.nama AS nama_suplier FROM barang AS b LEFT JOIN suplier AS s ON b.suplier_id = s.id AND s.deleted_at IS NULL WHERE b.deleted_at IS NULL");
?>
<div class="col-sm-12 col-md-9">
    <div class="card">
        <div class="card-header">
            <h4>Daftar Barang</h4>
        </div>
        <div class="card-body">
            <?php if(isset($_GET['pesan'])){
                ?>
                    <div class="alert alert-light" role="alert">
                        <?= str_replace('-',' ',$_GET['pesan']) ?>
                    </div>
                <?php
            } ?>
            <div class="table-responsive">
                <table class="table table-bordered table-datatables">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Suplier</th>
                            <th class="text-center">Barang</th>
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center">Satuan</th>
                            <th class="text-center">Stock</th>
                            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') {?>
                                <th class="text-center">Aksi</th>
                            <?php }?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                            while($d = mysqli_fetch_array($res)){
                        ?>
                            <tr>
                                <td class="text-center"><?= $no ?></td>
                                <td><?= $d['nama_suplier'] ?></td>
                                <td><?= $d['nama'] ?></td>
                                <td><?= $d['deskripsi'] ?></td>
                                <td class="text-center"><?= $d['satuan'] ?></td>
                                <td class="text-center"><?= $d['stock'] ?></td>
                                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') {?>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="./form_barang.php?id=<?=$d['id']?>" class="btn btn-warning">Edit</a>
                                            <a href="./aksi/hapus_barang.php?id=<?=$d['id']?>" class="btn btn-danger">Hapus</a>
                                        </div>
                                    </td>
                                <?php }?>
                            </tr>
                        <?php
                                $no++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') {?>
            <div class="card-footer d-flex justify-content-center">
                <a href="./form_barang.php" class="btn btn-primary">Tambah Data</a>
            </div>
        <?php }?>
    </div>
</div>
<?php 
    include "shared/footer.php"
?>