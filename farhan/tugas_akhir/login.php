<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="assets/libs/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/libs/jquery/css/jquery-ui.min.css">

    <!-- Jquery Plugin -->
    <script src="assets/libs/jquery/js/jquery-3.7.1.min.js"></script>
</head>
<body class="bg-dark">
    <div class="container-fluid vh-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-3 text-center">Login</h3>
                        <?php if(isset($_GET['pesan'])){
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= str_replace('-',' ',$_GET['pesan']) ?>
                                </div>
                            <?php
                        } ?>
                        <form action="./aksi/auth/login.php" class="row g-3 needs-validation" novalidate method="post">
                            <div class="col">
                                <div class="mb-3 row align-items-center">
                                    <label for="username" class="form-label col-md-2">Username</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username">
                                    </div>
                                </div>
                                <div class="mb-3 row align-items-center">
                                    <label for="password" class="form-label col-md-2">Password</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Load Bootstrap -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>