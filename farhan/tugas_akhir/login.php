<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Selamat Datang</h1>
    <h3>Login</h3>
    <?php if(isset($_GET['pesan'])){
        echo "<span><strong>".str_replace('-',' ',$_GET['pesan'])."</strong></span>";
    }?>
    <form action="./aksi/auth/login.php" method="post">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Masukkan username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Masukkan password">
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>