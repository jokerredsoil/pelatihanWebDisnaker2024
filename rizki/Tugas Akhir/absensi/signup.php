<?php
  session_start();

  if(ISSET($_SESSION['login'])){
    if($_SESSION['login']){
      header('location:media.php');
    }
  }
  else {
    ?>
      <!DOCTYPE html>
      <html lang="en">
        <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
          <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
          <meta name="author" content="pixelstrap">
          <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
          <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
          <title>Login Disnaker Kota Bandung</title>
          <!-- Google font-->
          <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
          <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
          <!-- ico-font-->
          <link rel="stylesheet" type="text/css" href="assets/css/vendors/icofont.css">
          <!-- Themify icon-->
          <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">
          <!-- Flag icon-->
          <link rel="stylesheet" type="text/css" href="assets/css/vendors/flag-icon.css">
          <!-- Feather icon-->
          <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">
          <!-- Plugins css start-->
          <!-- Plugins css Ends-->
          <!-- Bootstrap css-->
          <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">
          <!-- App css-->
          <link rel="stylesheet" type="text/css" href="assets/css/style.css">
          <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
          <!-- Responsive css-->
          <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
        </head>
        <body OnLoad="document.login.username.focus();">
          <!-- login page start-->
          <div class="container-fluid p-0">
            <div class="row m-0">
              <div class="col-12 p-0">    
                <div class="login-card">
                  <div>
                    <div>
                      <a class="logo" href="index.html">
                        <img class="img-fluid for-light" src="assets/images/logo/login.png" alt="looginpage" style="width: 300px;">
                        <img class="img-fluid for-dark" src="assets/images/logo/logo_dark.png" alt="looginpage">
                      </a>
                    </div>
                    <div class="login-main"> 
                      <form class="theme-form" name="login" method="post" action="register.php">
                        <h4>Create your account</h4>
                        <p>Enter your personal details to create account</p>
                        <div class="form-group">
                          <label class="col-form-label">Username</label>
                          <input class="form-control <?php if(ISSET($_SESSION['error_username']) && $_SESSION['error_username'] != NULL){ echo 'is-invalid'; } ?>" type="text" name="username" placeholder="Username" required>
                          <?php
                            if(ISSET($_SESSION['error_username']) && $_SESSION['error_username'] != NULL){
                              ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?=$_SESSION['error_username']?></strong>
                                </span>
                              <?php
                              unset($_SESSION['error_username']);
                            }
                          ?>
                        </div>
                        <div class="form-group">
                          <label class="col-form-label">Password</label>
                          <div class="form-input position-relative">
                            <input class="form-control password-show <?php if(ISSET($_SESSION['error_password']) && $_SESSION['error_password'] != NULL){ echo 'is-invalid'; } ?>" type="password" name="password" placeholder="*********" required>
                            <div class="show-hide"><span class="show"></span></div>
                            <?php
                              if(ISSET($_SESSION['error_password']) && $_SESSION['error_password'] != NULL){
                                ?>
                                  <span class="invalid-feedback" role="alert">
                                      <strong><?=$_SESSION['error_password']?></strong>
                                  </span>
                                <?php
                              }
                            ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-form-label">Confirm Password</label>
                          <div class="form-input position-relative">
                            <input class="form-control password-show <?php if(ISSET($_SESSION['error_password']) && $_SESSION['error_password'] != NULL){ echo 'is-invalid'; } ?>" type="password" name="confirm_password" placeholder="*********" required>
                            <div class="show-hide"><span class="show"></span></div>
                            <?php
                              if(ISSET($_SESSION['error_password']) && $_SESSION['error_password'] != NULL){
                                ?>
                                  <span class="invalid-feedback" role="alert">
                                      <strong><?=$_SESSION['error_password']?></strong>
                                  </span>
                                <?php
                                unset($_SESSION['error_password']);
                              }
                            ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-form-label">Nama Lengkap</label>
                          <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group mb-0">
                          <button class="btn btn-primary btn-block w-100" type="submit">Create Account</button>
                        </div>
                        <p class="mt-4 mb-0">Already have an account?<a class="ms-2" href="index.php">Sign in</a></p>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- latest jquery-->
            <script src="assets/js/jquery-3.5.1.min.js"></script>
            <!-- Bootstrap js-->
            <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
            <!-- feather icon js-->
            <script src="assets/js/icons/feather-icon/feather.min.js"></script>
            <script src="assets/js/icons/feather-icon/feather-icon.js"></script>
            <!-- scrollbar js-->
            <!-- Sidebar jquery-->
            <script src="assets/js/config.js"></script>
            <!-- Plugins JS start-->
            <!-- Plugins JS Ends-->
            <!-- Theme js-->
            <script src="assets/js/script.js"></script>
            <!-- login js-->
            <!-- Plugin used-->
          </div>
        </body>
      </html>
    <?php
  }
?>
