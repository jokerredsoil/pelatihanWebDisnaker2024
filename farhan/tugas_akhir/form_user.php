<?php 
    require_once "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
</head>
<body>
    <h1>Tambah User</h1>
    <a href="./">Kembali</a>
    <form action="./aksi/tambah_user.php" method="post">
        <div>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan Nama">
        </div>
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Masukkan Username">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Masukkan Email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Masukkan Password">
        </div>
        <div>
            <label for="">Role</label>
            <label for="admin">
                <input type="radio" name="role" id="admin" value="Admin"> Admin
            </label>
            <label for="user">
                <input type="radio" name="role" id="user" value="User"> User
            </label>
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>