<?php 
    require "koneksi.php";
    if(isset($_SESSION['role']) && $_SESSION['role'] != 'Admin'){
        die('Akses Dibatasi');
    }
    $active = "user";
    include "shared/header.php";
    include "shared/side.php";
    $link = './aksi/tambah_user.php';
    $res = mysqli_query($koneksi, "SELECT * FROM barang WHERE deleted_at IS NULL");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $res_user = mysqli_query($koneksi,"SELECT * FROM user WHERE id = $id");
        $data_old = mysqli_fetch_array($res_user);
        $link = './aksi/edit_user.php';
    }    
?>
<div class="col-sm-12 col-md-9">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Pengguna Baru</h4>
        </div>
        <form action="<?=$link?>" class="row g-3 needs-validation" novalidate method="post" id="form-user">
            <?php if(isset($data_old)) {?>
                <input type="hidden" name="user" value="<?=$id?>">
            <?php }?>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="nama">Nama</label>
                            <input class="form-control" type="text" name="nama" id="nama" value="<?= isset($data_old) ? $data_old['name'] : '' ?>" placeholder="Masukkan Nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="username">Username</label>
                            <input class="form-control" type="text" name="username" id="username" value="<?= isset($data_old) ? $data_old['username'] : '' ?>" placeholder="Masukkan Username">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" value="<?= isset($data_old) ? $data_old['email'] : '' ?>" placeholder="Masukkan Email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Masukkan Password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Role</label> <br>
                            <div class="form-check">
                                <label class="form-check-label" for="admin">
                                    <input class="form-check-input" type="radio" name="role" id="admin" value="Admin" <?= (isset($data_old) && $data_old['role'] == "Admin") ? "checked" : '' ?>> Admin
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label" for="user">
                                    <input class="form-check-input" type="radio" name="role" id="user" value="User" <?= (isset($data_old) && $data_old['role'] == "User") ? "checked" : '' ?> > User
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end gap-3">
                <a href="./user.php" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php 
    include "shared/footer.php"
?>