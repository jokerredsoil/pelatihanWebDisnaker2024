<?php 
    require "koneksi.php";
    if(isset($_SESSION['role']) && $_SESSION['role'] != 'Admin'){
        die('Akses Dibatasi');
    }
    $active = "user";
    include "shared/header.php";
    include "shared/side.php";
    $res = mysqli_query($koneksi, "SELECT * FROM user");
?>
<div class="col-sm-12 col-md-9">
    <div class="card">
        <div class="card-header">
            <h4>Daftar Pengguna</h4>
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
                            <th class="text-center">Nama</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Banned</th>
                            <th class="text-center">Gabung</th>
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
                                <td><?= $no ?></td>
                                <td><?= $d['name'] ?></td>
                                <td><?= $d['username'] ?></td>
                                <td><?= $d['email'] ?></td>
                                <td><?= $d['role'] ?></td>
                                <td><?= $d['banned'] != 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
                                <td><?= date('d-m-Y H:i',strtotime($d['created_at'])) ?></td>
                                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') {?>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="./form_user.php?id=<?=$d['id']?>" class="btn btn-warning">Edit</a>
                                            <a href="./aksi/banned_user.php?id=<?=$d['id']?>" class="btn btn-danger">Hapus</a>
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
                <a href="./form_user.php" class="btn btn-primary">Tambah Data</a>
            </div>
        <?php }?>
    </div>
</div>
<?php 
    include "shared/footer.php"
?>