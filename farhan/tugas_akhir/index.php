<?php 
    require "koneksi.php";
    $active = "barang";
    include "shared/header.php";
    include "shared/side.php";
    $res = mysqli_query($koneksi, "SELECT 
        b.*, 
        s.nama as nama_suplier, 
        COALESCE(bm.total_masuk, 0) as total_masuk, 
        COALESCE(bk.total_keluar, 0) as total_keluar,
        (COALESCE(total_masuk, 0) + b.stock - COALESCE(total_keluar, 0)) AS total_stock_barang
    FROM barang as b 
    LEFT JOIN suplier as s ON s.id = b.suplier_id AND s.deleted_at IS NULL 
    LEFT JOIN (
        SELECT barang_id, SUM(stock) AS total_masuk 
        FROM barang_masuk 
        WHERE deleted_at IS NULL
        GROUP BY barang_id
    ) as bm ON bm.barang_id = b.id
    LEFT JOIN (
        SELECT barang_id, SUM(stock) AS total_keluar 
        FROM barang_keluar 
        WHERE deleted_at IS NULL
        GROUP BY barang_id
    ) as bk ON bk.barang_id = b.id
    where b.deleted_at IS NULL
    GROUP BY b.id");
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
                            <th class="text-center">Barang Masuk</th>
                            <th class="text-center">Barang Keluar</th>
                            <th class="text-center">Jumlah</th>
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
                                <td class="text-center"><?= $d['total_masuk'] ?></td>
                                <td class="text-center"><?= $d['total_keluar'] ?></td>
                                <td class="text-center"><?= $d['total_stock_barang'] ?></td>
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