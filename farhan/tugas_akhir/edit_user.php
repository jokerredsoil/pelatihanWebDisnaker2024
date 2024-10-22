<?php 
    require_once "koneksi.php";
    $id = $_GET['id'];
    $res = mysqli_query($koneksi,"SELECT * FROM user WHERE id = $id");
    $data = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <a href="./">Kembali</a>
    <form action="./aksi/edit_user.php" method="post">
        <input type="hidden" name="user" value="<?=$id?>">
        <div>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="<?=$data['name']?>" placeholder="Masukkan Nama">
        </div>
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?=$data['username']?>" placeholder="Masukkan Username">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?=$data['email']?>" placeholder="Masukkan Email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Masukkan Password">
        </div>
        <div>
            <label for="">Role</label>
            <label for="admin">
                <input type="radio" name="role" id="admin" value="Admin" <?= $data['role'] == 'Admin' ? 'checked' : '' ?>> Admin
            </label>
            <label for="user">
                <input type="radio" name="role" id="user" value="User" <?= $data['role'] == 'User' ? 'checked' : '' ?>> User
            </label>
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>