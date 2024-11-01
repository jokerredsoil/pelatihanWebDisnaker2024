<?php 
    require "koneksi.php";
    $active = "barang_keluar";
    include "shared/header.php";
    include "shared/side.php";
    $res = mysqli_query($koneksi, "SELECT bm.*, b.nama AS nama_barang FROM barang_keluar AS bm LEFT JOIN barang AS b ON bm.barang_id = b.id AND b.deleted_at IS NULL WHERE bm.deleted_at IS NULL");
?>
<div class="col-sm-12 col-md-9">
    <div class="card">
        <div class="card-header">
            <h4>Daftar Barang Keluar</h4>
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
                            <th class="text-center">Barang</th>
                            <th class="text-center">Penerima</th>
                            <th class="text-center">Stock</th>
                            <th class="text-center">Tanggal Keluar</th>
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
                                <td><?= $d['nama_barang'] ?></td>
                                <td><?= $d['pengambil'] ?></td>
                                <td class="text-center"><?= $d['stock'] ?></td>
                                <td class="text-center"><?= date('d-m-Y H:i',strtotime($d['created_at'])) ?></td>
                                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') {?>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="./form_barang_keluar.php?id=<?=$d['id']?>" class="btn btn-warning">Edit</a>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-delete-link" data-link="./aksi/hapus_barang_keluar.php?id=<?=$d['id']?>" onclick="deleteAlert(this)">Hapus</a>
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
                <a href="./form_barang_keluar.php" class="btn btn-primary">Tambah Data</a>
            </div>
        <?php }?>
    </div>
</div>
<?php 
    include "shared/footer.php"
?>